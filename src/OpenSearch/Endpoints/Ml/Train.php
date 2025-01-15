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

namespace OpenSearch\Endpoints\Ml;

use OpenSearch\Common\Exceptions\RuntimeException;
use OpenSearch\Endpoints\AbstractEndpoint;

/**
 * NOTE: This file is autogenerated using util/GenerateEndpoints.php
 */
class Train extends AbstractEndpoint
{
    protected $algorithm_name;

    public function getURI(): string
    {
        $algorithm_name = $this->algorithm_name ?? null;
        if (isset($algorithm_name)) {
            return "/_plugins/_ml/_train/$algorithm_name";
        }
        throw new RuntimeException('Missing parameter for the endpoint ml.train');
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
        return 'POST';
    }

    public function setBody($body): static
    {
        if (is_null($body)) {
            return $this;
        }
        $this->body = $body;

        return $this;
    }

    public function setAlgorithmName($algorithm_name): static
    {
        if (is_null($algorithm_name)) {
            return $this;
        }
        $this->algorithm_name = $algorithm_name;

        return $this;
    }
}