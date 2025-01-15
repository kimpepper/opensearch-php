<?php

declare(strict_types=1);

namespace OpenSearch\Exception;

use OpenSearch\Serializers\SerializerInterface;

/**
 * Extracts an error message from the response body.
 */
class ErrorMessageExtractor
{
    public function __construct(
        private readonly SerializerInterface $serializer,
    ) {
    }

    public function extractErrorMessage(mixed $body, array $headers): ?string
    {
        if (!is_string($body)) {
            // Convert non-string response body to string message.
            return json_encode($body);
        }

        $error = $this->serializer->deserialize($body, $headers);

        if (is_string($error)) {
            return $error;
        }

        if (!isset($error['error'])) {
            // <2.0 "i just blew up" non-structured exception.
            // $error is an array, but we don't know the format, so we reuse the response body instead
            // added json_encode to convert into a string
            return json_encode($body);
        }

        // 2.0 structured exceptions
        if (is_array($error['error']) && array_key_exists('reason', $error['error'])) {
            // Try to use root cause first (only grabs the first root cause)
            $info = $error['error']['root_cause'][0] ?? $error['error'];
            $cause = $info['reason'];
            $type = $info['type'];

            return "$type: $cause";
        }

        // <2.0 semi-structured exceptions
        $legacyError = $error['error'];
        if (is_array($error['error'])) {
            return json_encode($legacyError);
        }
        return $legacyError;
    }
}
