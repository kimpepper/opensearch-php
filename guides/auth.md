- [Authentication](#authentication)
  - [Basic Auth](#basic-auth)
    - [Using `\OpenSearch\ClientBuilder`](#using-opensearchclientbuilder)
    - [Using a Psr Client](#using-a-psr-client)
  - [IAM Authentication](#iam-authentication)
    - [Using `\OpenSearch\ClientBuilder`](#using-opensearchclientbuilder-1)
    - [Using a Psr Client](#using-a-psr-client-1)

# Authentication

OpenSearch allows you to use different methods for the authentication.

## Basic Auth

```php
$endpoint = "https://localhost:9200"
$username = "admin"
$password = "..."
```

### Using `\OpenSearch\ClientBuilder`

```php
$client = (new \OpenSearch\ClientBuilder())
    ->setBasicAuthentication($username, $password) 
    ->setHosts([$endpoint])
    ->setSSLVerification(false) // for testing only
    ->build();
```

### Using a Psr Client

```php
$symfonyPsr18Client = (new \Symfony\Component\HttpClient\Psr18Client())->withOptions([
    'base_uri' => $endpoint,
    'auth_basic' => [$username, $password],
    'verify_peer' => false, // for testing only
    'headers' => [
        'Accept' => 'application/json',
        'Content-Type' => 'application/json',
    ],
]);
```

## IAM Authentication

This library supports IAM-based authentication when communicating with OpenSearch clusters running in Amazon Managed OpenSearch and OpenSearch Serverless.

```php
$endpoint = "https://search-....us-west-2.es.amazonaws.com"
$region = "us-west-2"
$service = "es"
$aws_access_key_id = ...
$aws_secret_access_key = ...
$aws_session_token = ...
```

### Using `\OpenSearch\ClientBuilder`

```php
$client = (new \OpenSearch\ClientBuilder())
  ->setHosts([$endpoint])
  ->setSigV4Region($region)    
  ->setSigV4Service('es')
  ->setSigV4CredentialProvider([
      'key' => $aws_access_key_id,
      'secret' => $aws_secret_access_key,
      'token' => $aws_session_token
    ])
  ->build();
```

### Using a Psr Client

We can use the `AwsSigningHttpClientFactory` to create an HTTP Client to sign the requests using the AWS SDK for PHP.

Require a PSR-18 client (e.g. Symfony) and the AWS SDK for PHP:

```bash
composer require symfony/http-client aws/aws-sdk-php
```

Create a PSR HTTP Client (e.g. Symfony):

```php
$endpoint = 'https://search-example.us-west-2.es.amazonaws.com';

$symfonyClient = (new \OpenSearch\HttpClient\SymfonyHttpClientFactory()->create([
    'base_uri' => $endpoint, // required.
]);
```

Use the `AwsSigningHttpClientFactory` to create a signing HTTP client:
```php
$signingHttpClient = (new \OpenSearch\Aws\AwsSigningHttpClientFactory($symfonyClient))->create([
    'access_key' => '...', // optional. Will fallback to AWS SDK credential discovery.
    'secret_key' => '...', // optional. Will fallback to AWS SDK credential discovery.
    'base_uri' => $endpoint, // required for signing.
    'region' => 'us-west-2', // required for signing.
    'session_token' => '...', // optional.
    'service' => 'es', // optional. Allowed values are: 'es', 'aoss'. Defaults to 'es'.
  ],
]);
```

Create a request factory:
```php
$serializer = new \OpenSearch\Serializers\SmartSerializer();

$requestFactory = new \OpenSearch\RequestFactory(
    $symfonyClient,
    $symfonyClient,
    $symfonyClient,
    $serializer,
);
```

Create a transport:
```php
$transport = (new \OpenSearch\TransportFactory())
    ->setHttpClient($signingHttpClient)
    ->setRequestFactory($requestFactory)
    ->create();
```

Create the OpenSearch client:
```php
$client = new \OpenSearch\Client($transport, new \OpenSearch\EndpointFactory());
```
