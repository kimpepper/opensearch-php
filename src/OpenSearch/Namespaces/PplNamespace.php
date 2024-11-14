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
 * Class PplNamespace
 *
 * NOTE: This file is autogenerated using util/GenerateEndpoints.php
 */
class PplNamespace extends AbstractNamespace
{
    /**
     * Shows how a query is executed against OpenSearch.
     *
     * $params['format']      = (string) A short version of the Accept header, e.g. json, yaml.
     * $params['sanitize']    = (boolean) Specifies whether to escape special characters in the results. (Default = true)
     * $params['pretty']      = (boolean) Whether to pretty format the returned JSON response. (Default = false)
     * $params['human']       = (boolean) Whether to return human readable values for statistics. (Default = true)
     * $params['error_trace'] = (boolean) Whether to include the stack trace of returned errors. (Default = false)
     * $params['source']      = (string) The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
     * $params['filter_path'] = (any) Used to reduce the response. This parameter takes a comma-separated list of filters. It supports using wildcards to match any field or part of a field’s name. You can also exclude fields with "-".
     *
     * @param array $params Associative array of parameters
     * @return array
     */
    public function explain(array $params = [])
    {
        $body = $this->extractArgument($params, 'body');

        $endpoint = $this->endpointFactory->getEndpoint(\OpenSearch\Endpoints\Ppl\Explain::class);
        $endpoint->setParams($params);
        $endpoint->setBody($body);

        return $this->performRequest($endpoint);
    }

    /**
     * Collect metrics for the plugin within the interval.
     *
     * $params['format']      = (string) A short version of the Accept header, e.g. json, yaml.
     * $params['sanitize']    = (boolean) Specifies whether to escape special characters in the results. (Default = true)
     * $params['pretty']      = (boolean) Whether to pretty format the returned JSON response. (Default = false)
     * $params['human']       = (boolean) Whether to return human readable values for statistics. (Default = true)
     * $params['error_trace'] = (boolean) Whether to include the stack trace of returned errors. (Default = false)
     * $params['source']      = (string) The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
     * $params['filter_path'] = (any) Used to reduce the response. This parameter takes a comma-separated list of filters. It supports using wildcards to match any field or part of a field’s name. You can also exclude fields with "-".
     *
     * @param array $params Associative array of parameters
     * @return array
     */
    public function getStats(array $params = [])
    {
        $endpoint = $this->endpointFactory->getEndpoint(\OpenSearch\Endpoints\Ppl\GetStats::class);
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * By a stats endpoint, you are able to collect metrics for the plugin within the interval.
     *
     * $params['format']      = (string) A short version of the Accept header, e.g. json, yaml.
     * $params['sanitize']    = (boolean) Specifies whether to escape special characters in the results. (Default = true)
     * $params['pretty']      = (boolean) Whether to pretty format the returned JSON response. (Default = false)
     * $params['human']       = (boolean) Whether to return human readable values for statistics. (Default = true)
     * $params['error_trace'] = (boolean) Whether to include the stack trace of returned errors. (Default = false)
     * $params['source']      = (string) The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
     * $params['filter_path'] = (any) Used to reduce the response. This parameter takes a comma-separated list of filters. It supports using wildcards to match any field or part of a field’s name. You can also exclude fields with "-".
     *
     * @param array $params Associative array of parameters
     * @return array
     */
    public function postStats(array $params = [])
    {
        $body = $this->extractArgument($params, 'body');

        $endpoint = $this->endpointFactory->getEndpoint(\OpenSearch\Endpoints\Ppl\PostStats::class);
        $endpoint->setParams($params);
        $endpoint->setBody($body);

        return $this->performRequest($endpoint);
    }

    /**
     * Send a PPL query to the PPL plugin.
     *
     * $params['format']      = (string) A short version of the Accept header, e.g. json, yaml.
     * $params['sanitize']    = (boolean) Specifies whether to escape special characters in the results. (Default = true)
     * $params['pretty']      = (boolean) Whether to pretty format the returned JSON response. (Default = false)
     * $params['human']       = (boolean) Whether to return human readable values for statistics. (Default = true)
     * $params['error_trace'] = (boolean) Whether to include the stack trace of returned errors. (Default = false)
     * $params['source']      = (string) The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
     * $params['filter_path'] = (any) Used to reduce the response. This parameter takes a comma-separated list of filters. It supports using wildcards to match any field or part of a field’s name. You can also exclude fields with "-".
     *
     * @param array $params Associative array of parameters
     * @return array
     */
    public function query(array $params = [])
    {
        $body = $this->extractArgument($params, 'body');

        $endpoint = $this->endpointFactory->getEndpoint(\OpenSearch\Endpoints\Ppl\Query::class);
        $endpoint->setParams($params);
        $endpoint->setBody($body);

        return $this->performRequest($endpoint);
    }

}
