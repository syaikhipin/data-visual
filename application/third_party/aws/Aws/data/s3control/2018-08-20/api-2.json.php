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
// This file was auto-generated from sdk-root/src/data/s3control/2018-08-20/api-2.json
return ['version' => '2.0', 'metadata' => ['apiVersion' => '2018-08-20', 'endpointPrefix' => 's3-control', 'protocol' => 'rest-xml', 'serviceFullName' => 'AWS S3 Control', 'serviceId' => 'S3 Control', 'signatureVersion' => 's3v4', 'signingName' => 's3', 'uid' => 's3control-2018-08-20'], 'operations' => ['DeletePublicAccessBlock' => ['name' => 'DeletePublicAccessBlock', 'http' => ['method' => 'DELETE', 'requestUri' => '/v20180820/configuration/publicAccessBlock'], 'input' => ['shape' => 'DeletePublicAccessBlockRequest']], 'GetPublicAccessBlock' => ['name' => 'GetPublicAccessBlock', 'http' => ['method' => 'GET', 'requestUri' => '/v20180820/configuration/publicAccessBlock'], 'input' => ['shape' => 'GetPublicAccessBlockRequest'], 'output' => ['shape' => 'GetPublicAccessBlockOutput'], 'errors' => [['shape' => 'NoSuchPublicAccessBlockConfiguration']]], 'PutPublicAccessBlock' => ['name' => 'PutPublicAccessBlock', 'http' => ['method' => 'PUT', 'requestUri' => '/v20180820/configuration/publicAccessBlock'], 'input' => ['shape' => 'PutPublicAccessBlockRequest']]], 'shapes' => ['AccountId' => ['type' => 'string'], 'DeletePublicAccessBlockRequest' => ['type' => 'structure', 'required' => ['AccountId'], 'members' => ['AccountId' => ['shape' => 'AccountId', 'location' => 'header', 'locationName' => 'x-amz-account-id']]], 'GetPublicAccessBlockOutput' => ['type' => 'structure', 'members' => ['PublicAccessBlockConfiguration' => ['shape' => 'PublicAccessBlockConfiguration']], 'payload' => 'PublicAccessBlockConfiguration'], 'GetPublicAccessBlockRequest' => ['type' => 'structure', 'required' => ['AccountId'], 'members' => ['AccountId' => ['shape' => 'AccountId', 'location' => 'header', 'locationName' => 'x-amz-account-id']]], 'NoSuchPublicAccessBlockConfiguration' => ['type' => 'structure', 'members' => ['Message' => ['shape' => 'NoSuchPublicAccessBlockConfigurationMessage']], 'error' => ['httpStatusCode' => 404], 'exception' => true], 'NoSuchPublicAccessBlockConfigurationMessage' => ['type' => 'string'], 'PublicAccessBlockConfiguration' => ['type' => 'structure', 'members' => ['BlockPublicAcls' => ['shape' => 'Setting', 'locationName' => 'BlockPublicAcls'], 'IgnorePublicAcls' => ['shape' => 'Setting', 'locationName' => 'IgnorePublicAcls'], 'BlockPublicPolicy' => ['shape' => 'Setting', 'locationName' => 'BlockPublicPolicy'], 'RestrictPublicBuckets' => ['shape' => 'Setting', 'locationName' => 'RestrictPublicBuckets']]], 'PutPublicAccessBlockRequest' => ['type' => 'structure', 'required' => ['PublicAccessBlockConfiguration', 'AccountId'], 'members' => ['PublicAccessBlockConfiguration' => ['shape' => 'PublicAccessBlockConfiguration', 'locationName' => 'PublicAccessBlockConfiguration', 'xmlNamespace' => ['uri' => 'http://awss3control.amazonaws.com/doc/2018-08-20/']], 'AccountId' => ['shape' => 'AccountId', 'location' => 'header', 'locationName' => 'x-amz-account-id']], 'payload' => 'PublicAccessBlockConfiguration'], 'Setting' => ['type' => 'boolean']]];

?>