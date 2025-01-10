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
 * Class TransformsNamespace
 *
 * NOTE: This file is autogenerated using util/GenerateEndpoints.php
 */
class TransformsNamespace extends AbstractNamespace
{
    /**
     * Delete an index transform.
     *
     * $params['id']          = (string) Transform to delete
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

        $endpoint = $this->endpointFactory->getEndpoint(\OpenSearch\Endpoints\Transforms\Delete::class);
        $endpoint->setParams($params);
        $endpoint->setId($id);

        return $this->performRequest($endpoint);
    }

    /**
     * Returns the status and metadata of a transform job.
     *
     * $params['id']          = (string) Transform to explain
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

        $endpoint = $this->endpointFactory->getEndpoint(\OpenSearch\Endpoints\Transforms\Explain::class);
        $endpoint->setParams($params);
        $endpoint->setId($id);

        return $this->performRequest($endpoint);
    }

    /**
     * Returns the status and metadata of a transform job.
     *
     * $params['id']          = (string) Transform to access
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

        $endpoint = $this->endpointFactory->getEndpoint(\OpenSearch\Endpoints\Transforms\Get::class);
        $endpoint->setParams($params);
        $endpoint->setId($id);

        return $this->performRequest($endpoint);
    }

    /**
     * Returns a preview of what a transformed index would look like.
     *
     * $params['pretty']      = (boolean) Whether to pretty format the returned JSON response. (Default = false)
     * $params['human']       = (boolean) Whether to return human readable values for statistics. (Default = true)
     * $params['error_trace'] = (boolean) Whether to include the stack trace of returned errors. (Default = false)
     * $params['source']      = (string) The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
     * $params['filter_path'] = (any) Used to reduce the response. This parameter takes a comma-separated list of filters. It supports using wildcards to match any field or part of a field’s name. You can also exclude fields with "-".
     *
     * @param array $params Associative array of parameters
     * @return array|\OpenSearch\Response
     */
    public function preview(array $params = [])
    {
        $body = $this->extractArgument($params, 'body');

        $endpoint = $this->endpointFactory->getEndpoint(\OpenSearch\Endpoints\Transforms\Preview::class);
        $endpoint->setParams($params);
        $endpoint->setBody($body);

        return $this->performRequest($endpoint);
    }

    /**
     * Create an index transform, or update a transform if `if_seq_no` and `if_primary_term` are provided.
     *
     * $params['id']              = (string) Transform to create/update
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

        $endpoint = $this->endpointFactory->getEndpoint(\OpenSearch\Endpoints\Transforms\Put::class);
        $endpoint->setParams($params);
        $endpoint->setId($id);
        $endpoint->setBody($body);

        return $this->performRequest($endpoint);
    }

    /**
     * Returns the details of all transform jobs.
     *
     * $params['from']          = (number) The starting transform to return. Default is `0`.
     * $params['search']        = (string) The search term to use to filter results.
     * $params['size']          = (number) Specifies the number of transforms to return. Default is `10`.
     * $params['sortDirection'] = (string) Specifies the direction to sort results in. Can be `ASC` or `DESC`. Default is `ASC`.
     * $params['sortField']     = (string) The field to sort results with.
     * $params['pretty']        = (boolean) Whether to pretty format the returned JSON response. (Default = false)
     * $params['human']         = (boolean) Whether to return human readable values for statistics. (Default = true)
     * $params['error_trace']   = (boolean) Whether to include the stack trace of returned errors. (Default = false)
     * $params['source']        = (string) The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
     * $params['filter_path']   = (any) Used to reduce the response. This parameter takes a comma-separated list of filters. It supports using wildcards to match any field or part of a field’s name. You can also exclude fields with "-".
     *
     * @param array $params Associative array of parameters
     * @return array|\OpenSearch\Response
     */
    public function search(array $params = [])
    {
        $endpoint = $this->endpointFactory->getEndpoint(\OpenSearch\Endpoints\Transforms\Search::class);
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * Start transform.
     *
     * $params['id']          = (string) Transform to start
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

        $endpoint = $this->endpointFactory->getEndpoint(\OpenSearch\Endpoints\Transforms\Start::class);
        $endpoint->setParams($params);
        $endpoint->setId($id);

        return $this->performRequest($endpoint);
    }

    /**
     * Stop transform.
     *
     * $params['id']          = (string) Transform to stop
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

        $endpoint = $this->endpointFactory->getEndpoint(\OpenSearch\Endpoints\Transforms\Stop::class);
        $endpoint->setParams($params);
        $endpoint->setId($id);

        return $this->performRequest($endpoint);
    }

}
