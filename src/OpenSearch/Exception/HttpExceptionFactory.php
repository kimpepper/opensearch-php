<?php

declare(strict_types=1);

namespace OpenSearch\Exception;

use OpenSearch\Serializers\SmartSerializer;

/**
 * Factory for creating HTTP exceptions.
 */
class HttpExceptionFactory
{
    private ErrorMessageExtractor $errorMessageExtractor;

    public function __construct(
        ?ErrorMessageExtractor $errorMessageExtractor = null,
    ) {
        if (!$errorMessageExtractor) {
            $errorMessageExtractor = new ErrorMessageExtractor(new SmartSerializer());
        }
        $this->errorMessageExtractor = $errorMessageExtractor;
    }

    public function create(
        int $statusCode,
        string $responseBody = '',
        array $headers = [],
        int $code = 0,
        ?\Throwable $previous = null
    ): HttpExceptionInterface {

        $errorMessage = $this->errorMessageExtractor->extractErrorMessage($responseBody, $headers);

        return match ($statusCode) {
            400 => $this->createBadRequestException($errorMessage, $previous, $code, $headers),
            401 => new UnauthorizedHttpException($errorMessage, $headers, $code, $previous),
            403 => new ForbiddenHttpException($errorMessage, $headers, $code, $previous),
            404 => new NotFoundHttpException($errorMessage, $headers, $code, $previous),
            406 => new NotAcceptableHttpException($errorMessage, $headers, $code, $previous),
            409 => new ConflictHttpException($errorMessage, $headers, $code, $previous),
            429 => new TooManyRequestsHttpException($errorMessage, $headers, $code, $previous),
            500 => $this->createInternalServerErrorException($errorMessage, $previous, $code, $headers),
            503 => new ServiceUnavailableHttpException($errorMessage, $headers, $code, $previous),
            default => new HttpException($statusCode, $errorMessage, $headers, $code, $previous),
        };
    }

    private function createBadRequestException(
        string $message = '',
        ?\Throwable $previous = null,
        int $code = 0,
        array $headers = []
    ): HttpExceptionInterface {
        if (str_contains($message, 'script_lang not supported')) {
            return new ScriptLangNotSupportedException($message);
        }
        return new BadRequestHttpException($message, $headers, $code, $previous);
    }

    /**
     * Create an InternalServerErrorHttpException from the given parameters.
     */
    private function createInternalServerErrorException(
        string $message = '',
        ?\Throwable $previous = null,
        int $code = 0,
        array $headers = []
    ): HttpExceptionInterface {
        if (str_contains($message, "RoutingMissingException")) {
            return new RoutingMissingException($message);
        }
        if (preg_match('/ActionRequestValidationException.+ no documents to get/', $message) === 1) {
            return new NoDocumentsToGetException($message);
        }
        if (str_contains($message, 'NoShardAvailableActionException')) {
            return new NoShardAvailableException($message);
        }
        return new InternalServerErrorHttpException($message, $headers, $code, $previous);
    }

}
