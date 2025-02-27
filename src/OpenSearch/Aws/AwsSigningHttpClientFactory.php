<?php

declare(strict_types=1);

namespace OpenSearch\Aws;

use Aws\Credentials\CredentialProvider;
use Aws\Credentials\Credentials;
use Aws\Exception\CredentialsException;
use Aws\Signature\SignatureInterface;
use Aws\Signature\SignatureV4;
use OpenSearch\HttpClient\HttpClientFactoryInterface;
use Psr\Http\Client\ClientInterface;
use Psr\Log\LoggerInterface;

/**
 * A decorator client that signs requests using the provided AWS credentials.
 */
class AwsSigningHttpClientFactory implements HttpClientFactoryInterface
{
    /**
     * The allowed AWS services.
     */
    public const ALLOWED_SERVICES = ['es', 'aoss'];

    public function __construct(
        protected ClientInterface $innerClient,
        protected ?SignatureInterface $signer = null,
        protected ?CredentialProvider $provider = null,
        protected ?LoggerInterface $logger = null,
    ) {
    }

    /**
     * {@inheritdoc}
     */
    public function create(array $options): ClientInterface
    {
        if (!isset($options['base_uri'])) {
            throw new \InvalidArgumentException('The base_uri option is required.');
        }

        // Get the credentials.
        $provider = $this->getCredentialProvider($options);
        $promise = $provider();
        try {
            $credentials = $promise->wait();
        } catch (CredentialsException $e) {
            $this->logger?->error('Failed to get AWS credentials: @message', ['@message' => $e->getMessage()]);
            $credentials = new Credentials('', '');
        }

        // Get the signer.
        $signer = $this->getSigner($options);

        // Host header is required.
        $host = parse_url($options['base_uri'], PHP_URL_HOST);

        return new SigningClientDecorator($this->innerClient, $credentials, $signer, ['host' => $host]);
    }

    /**
     * Gets the credential provider.
     *
     * @param array<string,mixed> $options
     *   The options array.
     */
    protected function getCredentialProvider(array $options): CredentialProvider|\Closure|null|callable
    {
        // Check for a provided credential provider.
        if ($this->provider) {
            return $this->provider;
        }

        // Check for provided access key and secret.
        if (isset($options['access_key']) && isset($options['secret_key'])) {
            return CredentialProvider::fromCredentials(
                new Credentials(
                    $options['access_key'],
                    $options['secret_key'],
                    $options['session_token'] ?? null,
                )
            );
        }

        // Fallback to the default provider.
        return CredentialProvider::defaultProvider();
    }

    /**
     * Gets the request signer.
     *
     * @param array<string,string> $options
     *   The options.
     */
    protected function getSigner(array $options): SignatureInterface
    {
        if ($this->signer) {
            return $this->signer;
        }

        if (!isset($options['region'])) {
            throw new \InvalidArgumentException('The region option is required.');
        }

        $service = $options['service'] ?? 'es';

        if (!in_array($service, self::ALLOWED_SERVICES, true)) {
            throw new \InvalidArgumentException('The service option must be either "es" or "aoss".');
        }

        return new SignatureV4($service, $options['region'], $options);
    }

}
