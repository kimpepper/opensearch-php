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

namespace OpenSearch\Namespaces;

/**
 * Class SearchPipelineNamespace
 *
 * NOTE: This file is autogenerated using util/GenerateEndpoints.php
 */
class SearchPipelineNamespace extends AbstractNamespace
{
    /**
     * Deletes the specified search pipeline.
     *
     * $params['id']                      = (string) Pipeline ID.
     * $params['cluster_manager_timeout'] = (string) Operation timeout for connection to cluster-manager node.
     * $params['timeout']                 = (string) Operation timeout.
     * $params['pretty']                  = (boolean) Whether to pretty format the returned JSON response. (Default = false)
     * $params['human']                   = (boolean) Whether to return human readable values for statistics. (Default = true)
     * $params['error_trace']             = (boolean) Whether to include the stack trace of returned errors. (Default = false)
     * $params['source']                  = (string) The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
     * $params['filter_path']             = (any) Used to reduce the response. This parameter takes a comma-separated list of filters. It supports using wildcards to match any field or part of a field’s name. You can also exclude fields with "-".
     *
     * @param array $params Associative array of parameters
     * @return array
     */
    public function delete(array $params = [])
    {
        $id = $this->extractArgument($params, 'id');

        $endpoint = $this->endpointFactory->getEndpoint(\OpenSearch\Endpoints\SearchPipeline\Delete::class);
        $endpoint->setParams($params);
        $endpoint->setId($id);

        return $this->performRequest($endpoint);
    }

    /**
     * Retrieves information about a specified search pipeline.
     *
     * $params['id']                      = (string) Comma-separated list of search pipeline ids. Wildcards supported.
     * $params['cluster_manager_timeout'] = (string) operation timeout for connection to cluster-manager node.
     * $params['pretty']                  = (boolean) Whether to pretty format the returned JSON response. (Default = false)
     * $params['human']                   = (boolean) Whether to return human readable values for statistics. (Default = true)
     * $params['error_trace']             = (boolean) Whether to include the stack trace of returned errors. (Default = false)
     * $params['source']                  = (string) The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
     * $params['filter_path']             = (any) Used to reduce the response. This parameter takes a comma-separated list of filters. It supports using wildcards to match any field or part of a field’s name. You can also exclude fields with "-".
     *
     * @param array $params Associative array of parameters
     * @return array
     */
    public function get(array $params = [])
    {
        $id = $this->extractArgument($params, 'id');

        $endpoint = $this->endpointFactory->getEndpoint(\OpenSearch\Endpoints\SearchPipeline\Get::class);
        $endpoint->setParams($params);
        $endpoint->setId($id);

        return $this->performRequest($endpoint);
    }

    /**
     * Creates or replaces the specified search pipeline.
     *
     * $params['id']                      = (string) Pipeline ID.
     * $params['cluster_manager_timeout'] = (string) operation timeout for connection to cluster-manager node.
     * $params['timeout']                 = (string) Operation timeout.
     * $params['pretty']                  = (boolean) Whether to pretty format the returned JSON response. (Default = false)
     * $params['human']                   = (boolean) Whether to return human readable values for statistics. (Default = true)
     * $params['error_trace']             = (boolean) Whether to include the stack trace of returned errors. (Default = false)
     * $params['source']                  = (string) The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
     * $params['filter_path']             = (any) Used to reduce the response. This parameter takes a comma-separated list of filters. It supports using wildcards to match any field or part of a field’s name. You can also exclude fields with "-".
     *
     * @param array $params Associative array of parameters
     * @return array
     */
    public function put(array $params = [])
    {
        $id = $this->extractArgument($params, 'id');
        $body = $this->extractArgument($params, 'body');

        $endpoint = $this->endpointFactory->getEndpoint(\OpenSearch\Endpoints\SearchPipeline\Put::class);
        $endpoint->setParams($params);
        $endpoint->setId($id);
        $endpoint->setBody($body);

        return $this->performRequest($endpoint);
    }

}
