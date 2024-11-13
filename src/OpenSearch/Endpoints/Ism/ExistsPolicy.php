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

namespace OpenSearch\Endpoints\Ism;

use OpenSearch\Common\Exceptions\RuntimeException;
use OpenSearch\Endpoints\AbstractEndpoint;

/**
 * NOTE: This file is autogenerated using util/GenerateEndpoints.php
 */
class ExistsPolicy extends AbstractEndpoint
{
    protected $policy_id;

    public function getURI(): string
    {
        if (isset($this->policy_id) !== true) {
            throw new RuntimeException(
                'policy_id is required for exists_policy'
            );
        }
        $policy_id = $this->policy_id;
        return "/_plugins/_ism/policies/$policy_id";
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
        return 'HEAD';
    }

    public function setPolicyId($policy_id): ExistsPolicy
    {
        if (isset($policy_id) !== true) {
            return $this;
        }
        $this->policy_id = $policy_id;

        return $this;
    }
}