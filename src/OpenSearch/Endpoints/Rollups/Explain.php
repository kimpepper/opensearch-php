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

namespace OpenSearch\Endpoints\Rollups;

use OpenSearch\Common\Exceptions\RuntimeException;
use OpenSearch\Endpoints\AbstractEndpoint;

/**
 * NOTE: This file is autogenerated using util/GenerateEndpoints.php
 */
class Explain extends AbstractEndpoint
{
    public function getURI(): string
    {
        if (!isset($this->id) || $this->id === '') {
            throw new RuntimeException('id is required for explain');
        }
        $id = $this->id;

        return "/_plugins/_rollup/jobs/$id/_explain";
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
}
