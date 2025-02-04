<?php

return <<<'EOD'

    /**
     * $params['connector_id'] = (string) The id of the connector (Required)
     *
     * @param array $params Associative array of parameters
     *
     * @return array
     *   The response.
     */
    public function deleteConnector(array $params = []): array
    {
        $connectorId = $this->extractArgument($params, 'connector_id');
        $endpoint = $this->endpointFactory->getEndpoint(\OpenSearch\Endpoints\Ml\DeleteConnector::class);
        $endpoint->setParams($params);
        $endpoint->setConnectorId($connectorId);

        return $this->performRequest($endpoint);
    }
EOD;
