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
 * Class RollupsNamespace
 *
 * NOTE: This file is autogenerated using util/GenerateEndpoints.php
 */
class RollupsNamespace extends AbstractNamespace
{
    /**
     * Delete index rollup.
     *
     * $params['id']          = (string) Rollup to access (Required)
     * $params['pretty']      = (boolean) Whether to pretty format the returned JSON response. (Default = false)
     * $params['human']       = (boolean) Whether to return human readable values for statistics. (Default = true)
     * $params['error_trace'] = (boolean) Whether to include the stack trace of returned errors. (Default = false)
     * $params['source']      = (string) The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
     * $params['filter_path'] = (any) Used to reduce the response. This parameter takes a comma-separated list of filters. It supports using wildcards to match any field or part of a field’s name. You can also exclude fields with "-".
     *
     * @param array $params Associative array of parameters
     * @return array|\OpenSearch\Response
     */
    public function delete(array $params = [])
    {
        $id = $this->extractArgument($params, 'id');

        $endpoint = $this->endpointFactory->getEndpoint(\OpenSearch\Endpoints\Rollups\Delete::class);
        $endpoint->setParams($params);
        $endpoint->setId($id);

        return $this->performRequest($endpoint);
    }

    /**
     * Get a rollup's current status.
     *
     * $params['id']          = (string) Rollup to access (Required)
     * $params['pretty']      = (boolean) Whether to pretty format the returned JSON response. (Default = false)
     * $params['human']       = (boolean) Whether to return human readable values for statistics. (Default = true)
     * $params['error_trace'] = (boolean) Whether to include the stack trace of returned errors. (Default = false)
     * $params['source']      = (string) The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
     * $params['filter_path'] = (any) Used to reduce the response. This parameter takes a comma-separated list of filters. It supports using wildcards to match any field or part of a field’s name. You can also exclude fields with "-".
     *
     * @param array $params Associative array of parameters
     * @return array|\OpenSearch\Response
     */
    public function explain(array $params = [])
    {
        $id = $this->extractArgument($params, 'id');

        $endpoint = $this->endpointFactory->getEndpoint(\OpenSearch\Endpoints\Rollups\Explain::class);
        $endpoint->setParams($params);
        $endpoint->setId($id);

        return $this->performRequest($endpoint);
    }

    /**
     * Get an index rollup.
     *
     * $params['id']          = (string) Rollup to access (Required)
     * $params['pretty']      = (boolean) Whether to pretty format the returned JSON response. (Default = false)
     * $params['human']       = (boolean) Whether to return human readable values for statistics. (Default = true)
     * $params['error_trace'] = (boolean) Whether to include the stack trace of returned errors. (Default = false)
     * $params['source']      = (string) The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
     * $params['filter_path'] = (any) Used to reduce the response. This parameter takes a comma-separated list of filters. It supports using wildcards to match any field or part of a field’s name. You can also exclude fields with "-".
     *
     * @param array $params Associative array of parameters
     * @return array|\OpenSearch\Response
     */
    public function get(array $params = [])
    {
        $id = $this->extractArgument($params, 'id');

        $endpoint = $this->endpointFactory->getEndpoint(\OpenSearch\Endpoints\Rollups\Get::class);
        $endpoint->setParams($params);
        $endpoint->setId($id);

        return $this->performRequest($endpoint);
    }

    /**
     * Create or update index rollup.
     *
     * $params['id']              = (string) Rollup to access (Required)
     * $params['if_primary_term'] = (number) Only perform the operation if the document has this primary term.
     * $params['if_seq_no']       = (integer) Only perform the operation if the document has this sequence number.
     * $params['pretty']          = (boolean) Whether to pretty format the returned JSON response. (Default = false)
     * $params['human']           = (boolean) Whether to return human readable values for statistics. (Default = true)
     * $params['error_trace']     = (boolean) Whether to include the stack trace of returned errors. (Default = false)
     * $params['source']          = (string) The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
     * $params['filter_path']     = (any) Used to reduce the response. This parameter takes a comma-separated list of filters. It supports using wildcards to match any field or part of a field’s name. You can also exclude fields with "-".
     *
     * @param array $params Associative array of parameters
     * @return array|\OpenSearch\Response
     */
    public function put(array $params = [])
    {
        $id = $this->extractArgument($params, 'id');
        $body = $this->extractArgument($params, 'body');

        $endpoint = $this->endpointFactory->getEndpoint(\OpenSearch\Endpoints\Rollups\Put::class);
        $endpoint->setParams($params);
        $endpoint->setId($id);
        $endpoint->setBody($body);

        return $this->performRequest($endpoint);
    }

    /**
     * Start rollup.
     *
     * $params['id']          = (string) Rollup to access (Required)
     * $params['pretty']      = (boolean) Whether to pretty format the returned JSON response. (Default = false)
     * $params['human']       = (boolean) Whether to return human readable values for statistics. (Default = true)
     * $params['error_trace'] = (boolean) Whether to include the stack trace of returned errors. (Default = false)
     * $params['source']      = (string) The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
     * $params['filter_path'] = (any) Used to reduce the response. This parameter takes a comma-separated list of filters. It supports using wildcards to match any field or part of a field’s name. You can also exclude fields with "-".
     *
     * @param array $params Associative array of parameters
     * @return array|\OpenSearch\Response
     */
    public function start(array $params = [])
    {
        $id = $this->extractArgument($params, 'id');

        $endpoint = $this->endpointFactory->getEndpoint(\OpenSearch\Endpoints\Rollups\Start::class);
        $endpoint->setParams($params);
        $endpoint->setId($id);

        return $this->performRequest($endpoint);
    }

    /**
     * Stop rollup.
     *
     * $params['id']          = (string) Rollup to access (Required)
     * $params['pretty']      = (boolean) Whether to pretty format the returned JSON response. (Default = false)
     * $params['human']       = (boolean) Whether to return human readable values for statistics. (Default = true)
     * $params['error_trace'] = (boolean) Whether to include the stack trace of returned errors. (Default = false)
     * $params['source']      = (string) The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
     * $params['filter_path'] = (any) Used to reduce the response. This parameter takes a comma-separated list of filters. It supports using wildcards to match any field or part of a field’s name. You can also exclude fields with "-".
     *
     * @param array $params Associative array of parameters
     * @return array|\OpenSearch\Response
     */
    public function stop(array $params = [])
    {
        $id = $this->extractArgument($params, 'id');

        $endpoint = $this->endpointFactory->getEndpoint(\OpenSearch\Endpoints\Rollups\Stop::class);
        $endpoint->setParams($params);
        $endpoint->setId($id);

        return $this->performRequest($endpoint);
    }

}
