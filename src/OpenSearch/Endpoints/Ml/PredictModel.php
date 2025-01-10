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
class PredictModel extends AbstractEndpoint
{
    protected $model_id;

    public function getURI(): string
    {
        $model_id = $this->model_id ?? null;
        if (isset($model_id)) {
            return "/_plugins/_ml/models/$model_id/_predict";
        }
        throw new RuntimeException('Missing parameter for the endpoint ml.predict_model');
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

    public function setModelId($model_id): static
    {
        if (is_null($model_id)) {
            return $this;
        }
        $this->model_id = $model_id;

        return $this;
    }
}
