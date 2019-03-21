<?php
/*
 * @ PHP 5.6
 * @ Decoder version : 1.0.0.1
 * @ Release on : 24.03.2018
 * @ Website    : http://EasyToYou.eu
 */

/*
 * @ PHP 5.6
 * @ Decoder version : 1.0.0.1
 * @ Release on : 24.03.2018
 * @ Website    : http://EasyToYou.eu
 */
// This file was auto-generated from sdk-root/src/data/apigatewaymanagementapi/2018-11-29/api-2.json
return ['metadata' => ['apiVersion' => '2018-11-29', 'endpointPrefix' => 'execute-api', 'signingName' => 'execute-api', 'serviceFullName' => 'AmazonApiGatewayManagementApi', 'serviceId' => 'ApiGatewayManagementApi', 'protocol' => 'rest-json', 'jsonVersion' => '1.1', 'uid' => 'apigatewaymanagementapi-2018-11-29', 'signatureVersion' => 'v4'], 'operations' => ['PostToConnection' => ['name' => 'PostToConnection', 'http' => ['method' => 'POST', 'requestUri' => '/@connections/{connectionId}', 'responseCode' => 200], 'input' => ['shape' => 'PostToConnectionRequest'], 'errors' => [['shape' => 'GoneException'], ['shape' => 'LimitExceededException'], ['shape' => 'PayloadTooLargeException'], ['shape' => 'ForbiddenException']]]], 'shapes' => ['Data' => ['type' => 'blob', 'max' => 131072], 'ForbiddenException' => ['type' => 'structure', 'members' => [], 'exception' => true, 'error' => ['httpStatusCode' => 403]], 'GoneException' => ['type' => 'structure', 'members' => [], 'exception' => true, 'error' => ['httpStatusCode' => 410]], 'LimitExceededException' => ['type' => 'structure', 'members' => [], 'exception' => true, 'error' => ['httpStatusCode' => 429]], 'PayloadTooLargeException' => ['type' => 'structure', 'members' => ['Message' => ['shape' => '__string', 'locationName' => 'message']], 'exception' => true, 'error' => ['httpStatusCode' => 413]], 'PostToConnectionRequest' => ['type' => 'structure', 'members' => ['Data' => ['shape' => 'Data'], 'ConnectionId' => ['shape' => '__string', 'location' => 'uri', 'locationName' => 'connectionId']], 'required' => ['ConnectionId', 'Data'], 'payload' => 'Data'], '__string' => ['type' => 'string']]];

?>