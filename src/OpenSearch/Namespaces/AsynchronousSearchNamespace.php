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

use OpenSearch\Namespaces\AbstractNamespace;

/**
 * Class AsynchronousSearchNamespace
 *
 * NOTE: This file is autogenerated using util/GenerateEndpoints.php
 */
class AsynchronousSearchNamespace extends AbstractNamespace
{
    /**
     * Delete asynchronous search.
     *
     * $params['id']          = (string)  (Required)
     * $params['pretty']      = (boolean) Whether to pretty format the returned JSON response.
     * $params['human']       = (boolean) Whether to return human readable values for statistics.
     * $params['error_trace'] = (boolean) Whether to include the stack trace of returned errors.
     * $params['source']      = (string) The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
     * $params['filter_path'] = (any) Used to reduce the response. This parameter takes a comma-separated list of filters. It supports using wildcards to match any field or part of a field’s name. You can also exclude fields with "-".
     *
     * @param array $params Associative array of parameters
     * @return array
     */
    public function delete(array $params = [])
    {
        $id = $this->extractArgument($params, 'id');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('AsynchronousSearch\Delete');
        $endpoint->setParams($params);
        $endpoint->setId($id);

        return $this->performRequest($endpoint);
    }
    /**
     * Get partial responses from asynchronous search.
     *
     * $params['id']          = (string)  (Required)
     * $params['pretty']      = (boolean) Whether to pretty format the returned JSON response.
     * $params['human']       = (boolean) Whether to return human readable values for statistics.
     * $params['error_trace'] = (boolean) Whether to include the stack trace of returned errors.
     * $params['source']      = (string) The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
     * $params['filter_path'] = (any) Used to reduce the response. This parameter takes a comma-separated list of filters. It supports using wildcards to match any field or part of a field’s name. You can also exclude fields with "-".
     *
     * @param array $params Associative array of parameters
     * @return array
     */
    public function get(array $params = [])
    {
        $id = $this->extractArgument($params, 'id');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('AsynchronousSearch\Get');
        $endpoint->setParams($params);
        $endpoint->setId($id);

        return $this->performRequest($endpoint);
    }
    /**
     * Perform an asynchronous search.
     *
     * $params['index']                       = (string) The name of the index to be searched.
     * $params['keep_alive']                  = (string) The amount of time that the result is saved in the cluster.
     * $params['keep_on_completion']          = (boolean) Whether you want to save the results in the cluster after the search is complete.
     * $params['wait_for_completion_timeout'] = (string) The amount of time that you plan to wait for the results.
     * $params['pretty']                      = (boolean) Whether to pretty format the returned JSON response.
     * $params['human']                       = (boolean) Whether to return human readable values for statistics.
     * $params['error_trace']                 = (boolean) Whether to include the stack trace of returned errors.
     * $params['source']                      = (string) The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
     * $params['filter_path']                 = (any) Used to reduce the response. This parameter takes a comma-separated list of filters. It supports using wildcards to match any field or part of a field’s name. You can also exclude fields with "-".
     *
     * @param array $params Associative array of parameters
     * @return array
     */
    public function search(array $params = [])
    {
        $body = $this->extractArgument($params, 'body');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('AsynchronousSearch\Search');
        $endpoint->setParams($params);
        $endpoint->setBody($body);

        return $this->performRequest($endpoint);
    }
    /**
     * Monitoring of asynchronous searches that are running, completed, and/or persisted.
     *
     * $params['pretty']      = (boolean) Whether to pretty format the returned JSON response.
     * $params['human']       = (boolean) Whether to return human readable values for statistics.
     * $params['error_trace'] = (boolean) Whether to include the stack trace of returned errors.
     * $params['source']      = (string) The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
     * $params['filter_path'] = (any) Used to reduce the response. This parameter takes a comma-separated list of filters. It supports using wildcards to match any field or part of a field’s name. You can also exclude fields with "-".
     *
     * @param array $params Associative array of parameters
     * @return array
     */
    public function stats(array $params = [])
    {
        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('AsynchronousSearch\Stats');
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }
}