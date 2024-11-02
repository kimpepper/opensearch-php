<?php

declare(strict_types=1);

/**
 * SPDX-License-Identifier: Apache-2.0
 *
 * The OpenSearch Contributors require contributions made to
 * this file be licensed under the Apache-2.0 license or a
 * compatible open source license.
 *
 * Modifications Copyright OpenSearch Contributors. See
 * GitHub history for details.
 */

namespace OpenSearch\Endpoints\Observability;

use OpenSearch\Common\Exceptions\RuntimeException;
use OpenSearch\Endpoints\AbstractEndpoint;

/**
 * NOTE: This file is autogenerated using util/GenerateEndpoints.php
 */
class GetObject extends AbstractEndpoint
{
    protected $object_id;

    public function getURI(): string
    {
        $object_id = $this->object_id ?? null;
        if (isset($object_id)) {
            return "/_plugins/_observability/object/$object_id";
        }
        throw new RuntimeException('Missing parameter for the endpoint observability.get_object');
    }

    public function getParamWhitelist(): array
    {
        return [
            'pretty',
            'human',
            'error_trace',
            'source',
            'filter_path'
        ];
    }

    public function getMethod(): string
    {
        return 'GET';
    }

    public function setObjectId($object_id): static
    {
        if (isset($object_id) !== true) {
            return $this;
        }
        $this->object_id = $object_id;

        return $this;
    }
}
