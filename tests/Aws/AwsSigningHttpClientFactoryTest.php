<?php

declare(strict_types=1);

namespace OpenSearch\Tests\Aws;

use OpenSearch\Aws\AwsSigningHttpClientFactory;
use OpenSearch\HttpClient\SymfonyHttpClientFactory;
use PHPUnit\Framework\TestCase;
use Psr\Http\Client\ClientInterface;

/**
 * @coversDefaultClass \OpenSearch\Aws\AwsSigningHttpClientFactory
 */
class AwsSigningHttpClientFactoryTest extends TestCase
{
    /**
     * @covers ::create
     */
    public function testCreate(): void
    {
        $symfonyClient = (new SymfonyHttpClientFactory())->create([
            'base_uri' => 'http://localhost:9200',
        ]);
        $factory = new AwsSigningHttpClientFactory($symfonyClient);
        $client = $factory->create([
            'base_uri' => 'http://localhost:9200',
            'access_key' => 'foo',
            'secret_key' => 'bar',
            'region' => 'us-east-1',
        ]);

        // Check we get a client back.
        $this->assertInstanceOf(ClientInterface::class, $client);
    }

    /**
     * @covers ::create
     */
    public function testValidateService(): void
    {
        $symfonyClient = (new SymfonyHttpClientFactory())->create([
            'base_uri' => 'http://localhost:9200',
        ]);
        $factory = new AwsSigningHttpClientFactory($symfonyClient);

        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('The service option must be either "es" or "aoss".');

        $factory->create([
            'base_uri' => 'http://localhost:9200',
            'access_key' => 'foo',
            'secret_key' => 'bar',
            'region' => 'us-east-1',
            'service' => 'foo',
        ]);
    }
}
