<?php

declare(strict_types=1);

/**
 * Copyright OpenSearch Contributors
 * SPDX-License-Identifier: Apache-2.0
 *
 * OpenSearch PHP client
 *
 * @link      https://github.com/opensearch-project/opensearch-php/
 * @copyright Copyright (c) Elasticsearch B.V (https://www.elastic.co)
 * @license   http://www.apache.org/licenses/LICENSE-2.0 Apache License, Version 2.0
 * @license   https://www.gnu.org/licenses/lgpl-2.1.html GNU Lesser General Public License, Version 2.1
 *
 * Licensed to Elasticsearch B.V under one or more agreements.
 * Elasticsearch B.V licenses this file to you under the Apache 2.0 License or
 * the GNU Lesser General Public License, Version 2.1, at your option.
 * See the LICENSE file in the project root for more information.
 */

namespace OpenSearch\Namespaces;

use OpenSearch\EndpointFactoryInterface;
use OpenSearch\Endpoints\AbstractEndpoint;
use OpenSearch\LegacyEndpointFactory;
use OpenSearch\Transport;

abstract class AbstractNamespace
{
    /**
     * @var \OpenSearch\Transport
     */
    protected $transport;

    protected EndpointFactoryInterface $endpointFactory;

    /**
     * @var callable
     *
     * @deprecated in 2.3.2 and will be removed in 3.0.0. Use $endpointFactory property instead.
     */
    protected $endpoints;

    public function __construct(Transport $transport, callable|EndpointFactoryInterface $endpointFactory)
    {
        $this->transport = $transport;
        if (is_callable($endpointFactory)) {
            @trigger_error('Passing a callable as $endpointFactory param to ' . __METHOD__ . '() is deprecated in 2.3.2 and will be removed in 3.0.0. Pass an instance of \OpenSearch\EndpointFactoryInterface instead.', E_USER_DEPRECATED);
            $endpoints = $endpointFactory;
            $endpointFactory = new LegacyEndpointFactory($endpointFactory);
        } else {
            $endpoints = function ($c) use ($endpointFactory) {
                @trigger_error('The $endpoints property is deprecated in 2.3.2 and will be removed in 3.0.0.', E_USER_DEPRECATED);
                return $endpointFactory->getEndpoint('OpenSearch\\Endpoints\\' . $c);
            };
        }
        $this->endpoints = $endpoints;
        $this->endpointFactory = $endpointFactory;
    }

    /**
     * @return null|mixed
     */
    public function extractArgument(array &$params, string $arg)
    {
        if (array_key_exists($arg, $params) === true) {
            $val = $params[$arg];
            unset($params[$arg]);
            return $val;
        } else {
            return null;
        }
    }

    protected function performRequest(AbstractEndpoint $endpoint)
    {
        $response = $this->transport->performRequest(
            $endpoint->getMethod(),
            $endpoint->getURI(),
            $endpoint->getParams(),
            $endpoint->getBody(),
            $endpoint->getOptions()
        );

        return $this->transport->resultOrFuture($response, $endpoint->getOptions());
    }
}
