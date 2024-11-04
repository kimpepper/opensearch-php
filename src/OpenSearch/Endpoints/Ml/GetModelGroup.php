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
class GetModelGroup extends AbstractEndpoint
{
    protected $model_group_id;

    public function getURI(): string
    {
        $model_group_id = $this->model_group_id ?? null;
        if (isset($model_group_id)) {
            return "/_plugins/_ml/model_groups/$model_group_id";
        }
        throw new RuntimeException('Missing parameter for the endpoint ml.get_model_group');
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

    public function setModelGroupId($model_group_id): GetModelGroup
    {
        if (isset($model_group_id) !== true) {
            return $this;
        }
        $this->model_group_id = $model_group_id;

        return $this;
    }
}
