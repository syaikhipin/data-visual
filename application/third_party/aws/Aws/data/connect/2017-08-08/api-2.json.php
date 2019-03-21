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
// This file was auto-generated from sdk-root/src/data/connect/2017-08-08/api-2.json
return ['version' => '2.0', 'metadata' => ['apiVersion' => '2017-08-08', 'endpointPrefix' => 'connect', 'jsonVersion' => '1.1', 'protocol' => 'rest-json', 'serviceAbbreviation' => 'Amazon Connect', 'serviceFullName' => 'Amazon Connect Service', 'serviceId' => 'Connect', 'signatureVersion' => 'v4', 'signingName' => 'connect', 'uid' => 'connect-2017-08-08'], 'operations' => ['CreateUser' => ['name' => 'CreateUser', 'http' => ['method' => 'PUT', 'requestUri' => '/users/{InstanceId}'], 'input' => ['shape' => 'CreateUserRequest'], 'output' => ['shape' => 'CreateUserResponse'], 'errors' => [['shape' => 'InvalidRequestException'], ['shape' => 'InvalidParameterException'], ['shape' => 'LimitExceededException'], ['shape' => 'DuplicateResourceException'], ['shape' => 'ResourceNotFoundException'], ['shape' => 'ThrottlingException'], ['shape' => 'InternalServiceException']]], 'DeleteUser' => ['name' => 'DeleteUser', 'http' => ['method' => 'DELETE', 'requestUri' => '/users/{InstanceId}/{UserId}'], 'input' => ['shape' => 'DeleteUserRequest'], 'errors' => [['shape' => 'InvalidRequestException'], ['shape' => 'InvalidParameterException'], ['shape' => 'ResourceNotFoundException'], ['shape' => 'ThrottlingException'], ['shape' => 'InternalServiceException']]], 'DescribeUser' => ['name' => 'DescribeUser', 'http' => ['method' => 'GET', 'requestUri' => '/users/{InstanceId}/{UserId}'], 'input' => ['shape' => 'DescribeUserRequest'], 'output' => ['shape' => 'DescribeUserResponse'], 'errors' => [['shape' => 'InvalidRequestException'], ['shape' => 'InvalidParameterException'], ['shape' => 'ResourceNotFoundException'], ['shape' => 'ThrottlingException'], ['shape' => 'InternalServiceException']]], 'DescribeUserHierarchyGroup' => ['name' => 'DescribeUserHierarchyGroup', 'http' => ['method' => 'GET', 'requestUri' => '/user-hierarchy-groups/{InstanceId}/{HierarchyGroupId}'], 'input' => ['shape' => 'DescribeUserHierarchyGroupRequest'], 'output' => ['shape' => 'DescribeUserHierarchyGroupResponse'], 'errors' => [['shape' => 'InvalidRequestException'], ['shape' => 'InvalidParameterException'], ['shape' => 'ResourceNotFoundException'], ['shape' => 'ThrottlingException'], ['shape' => 'InternalServiceException']]], 'DescribeUserHierarchyStructure' => ['name' => 'DescribeUserHierarchyStructure', 'http' => ['method' => 'GET', 'requestUri' => '/user-hierarchy-structure/{InstanceId}'], 'input' => ['shape' => 'DescribeUserHierarchyStructureRequest'], 'output' => ['shape' => 'DescribeUserHierarchyStructureResponse'], 'errors' => [['shape' => 'InvalidRequestException'], ['shape' => 'InvalidParameterException'], ['shape' => 'ResourceNotFoundException'], ['shape' => 'ThrottlingException'], ['shape' => 'InternalServiceException']]], 'GetContactAttributes' => ['name' => 'GetContactAttributes', 'http' => ['method' => 'GET', 'requestUri' => '/contact/attributes/{InstanceId}/{InitialContactId}'], 'input' => ['shape' => 'GetContactAttributesRequest'], 'output' => ['shape' => 'GetContactAttributesResponse'], 'errors' => [['shape' => 'InvalidRequestException'], ['shape' => 'ResourceNotFoundException'], ['shape' => 'InternalServiceException']]], 'GetCurrentMetricData' => ['name' => 'GetCurrentMetricData', 'http' => ['method' => 'POST', 'requestUri' => '/metrics/current/{InstanceId}'], 'input' => ['shape' => 'GetCurrentMetricDataRequest'], 'output' => ['shape' => 'GetCurrentMetricDataResponse'], 'errors' => [['shape' => 'InvalidRequestException'], ['shape' => 'InvalidParameterException'], ['shape' => 'InternalServiceException'], ['shape' => 'ThrottlingException'], ['shape' => 'ResourceNotFoundException']]], 'GetFederationToken' => ['name' => 'GetFederationToken', 'http' => ['method' => 'GET', 'requestUri' => '/user/federate/{InstanceId}'], 'input' => ['shape' => 'GetFederationTokenRequest'], 'output' => ['shape' => 'GetFederationTokenResponse'], 'errors' => [['shape' => 'InvalidRequestException'], ['shape' => 'InvalidParameterException'], ['shape' => 'ResourceNotFoundException'], ['shape' => 'UserNotFoundException'], ['shape' => 'InternalServiceException'], ['shape' => 'DuplicateResourceException']]], 'GetMetricData' => ['name' => 'GetMetricData', 'http' => ['method' => 'POST', 'requestUri' => '/metrics/historical/{InstanceId}'], 'input' => ['shape' => 'GetMetricDataRequest'], 'output' => ['shape' => 'GetMetricDataResponse'], 'errors' => [['shape' => 'InvalidRequestException'], ['shape' => 'InvalidParameterException'], ['shape' => 'InternalServiceException'], ['shape' => 'ThrottlingException'], ['shape' => 'ResourceNotFoundException']]], 'ListRoutingProfiles' => ['name' => 'ListRoutingProfiles', 'http' => ['method' => 'GET', 'requestUri' => '/routing-profiles-summary/{InstanceId}'], 'input' => ['shape' => 'ListRoutingProfilesRequest'], 'output' => ['shape' => 'ListRoutingProfilesResponse'], 'errors' => [['shape' => 'InvalidRequestException'], ['shape' => 'InvalidParameterException'], ['shape' => 'ResourceNotFoundException'], ['shape' => 'ThrottlingException'], ['shape' => 'InternalServiceException']]], 'ListSecurityProfiles' => ['name' => 'ListSecurityProfiles', 'http' => ['method' => 'GET', 'requestUri' => '/security-profiles-summary/{InstanceId}'], 'input' => ['shape' => 'ListSecurityProfilesRequest'], 'output' => ['shape' => 'ListSecurityProfilesResponse'], 'errors' => [['shape' => 'InvalidRequestException'], ['shape' => 'InvalidParameterException'], ['shape' => 'ResourceNotFoundException'], ['shape' => 'ThrottlingException'], ['shape' => 'InternalServiceException']]], 'ListUserHierarchyGroups' => ['name' => 'ListUserHierarchyGroups', 'http' => ['method' => 'GET', 'requestUri' => '/user-hierarchy-groups-summary/{InstanceId}'], 'input' => ['shape' => 'ListUserHierarchyGroupsRequest'], 'output' => ['shape' => 'ListUserHierarchyGroupsResponse'], 'errors' => [['shape' => 'InvalidRequestException'], ['shape' => 'InvalidParameterException'], ['shape' => 'ResourceNotFoundException'], ['shape' => 'ThrottlingException'], ['shape' => 'InternalServiceException']]], 'ListUsers' => ['name' => 'ListUsers', 'http' => ['method' => 'GET', 'requestUri' => '/users-summary/{InstanceId}'], 'input' => ['shape' => 'ListUsersRequest'], 'output' => ['shape' => 'ListUsersResponse'], 'errors' => [['shape' => 'InvalidRequestException'], ['shape' => 'InvalidParameterException'], ['shape' => 'ResourceNotFoundException'], ['shape' => 'ThrottlingException'], ['shape' => 'InternalServiceException']]], 'StartOutboundVoiceContact' => ['name' => 'StartOutboundVoiceContact', 'http' => ['method' => 'PUT', 'requestUri' => '/contact/outbound-voice'], 'input' => ['shape' => 'StartOutboundVoiceContactRequest'], 'output' => ['shape' => 'StartOutboundVoiceContactResponse'], 'errors' => [['shape' => 'InvalidRequestException'], ['shape' => 'InvalidParameterException'], ['shape' => 'ResourceNotFoundException'], ['shape' => 'InternalServiceException'], ['shape' => 'LimitExceededException'], ['shape' => 'DestinationNotAllowedException'], ['shape' => 'OutboundContactNotPermittedException']]], 'StopContact' => ['name' => 'StopContact', 'http' => ['method' => 'POST', 'requestUri' => '/contact/stop'], 'input' => ['shape' => 'StopContactRequest'], 'output' => ['shape' => 'StopContactResponse'], 'errors' => [['shape' => 'InvalidRequestException'], ['shape' => 'ContactNotFoundException'], ['shape' => 'InvalidParameterException'], ['shape' => 'ResourceNotFoundException'], ['shape' => 'InternalServiceException']]], 'UpdateContactAttributes' => ['name' => 'UpdateContactAttributes', 'http' => ['method' => 'POST', 'requestUri' => '/contact/attributes'], 'input' => ['shape' => 'UpdateContactAttributesRequest'], 'output' => ['shape' => 'UpdateContactAttributesResponse'], 'errors' => [['shape' => 'InvalidRequestException'], ['shape' => 'InvalidParameterException'], ['shape' => 'ResourceNotFoundException'], ['shape' => 'InternalServiceException']]], 'UpdateUserHierarchy' => ['name' => 'UpdateUserHierarchy', 'http' => ['method' => 'POST', 'requestUri' => '/users/{InstanceId}/{UserId}/hierarchy'], 'input' => ['shape' => 'UpdateUserHierarchyRequest'], 'errors' => [['shape' => 'InvalidRequestException'], ['shape' => 'InvalidParameterException'], ['shape' => 'ResourceNotFoundException'], ['shape' => 'ThrottlingException'], ['shape' => 'InternalServiceException']]], 'UpdateUserIdentityInfo' => ['name' => 'UpdateUserIdentityInfo', 'http' => ['method' => 'POST', 'requestUri' => '/users/{InstanceId}/{UserId}/identity-info'], 'input' => ['shape' => 'UpdateUserIdentityInfoRequest'], 'errors' => [['shape' => 'InvalidRequestException'], ['shape' => 'InvalidParameterException'], ['shape' => 'ResourceNotFoundException'], ['shape' => 'ThrottlingException'], ['shape' => 'InternalServiceException']]], 'UpdateUserPhoneConfig' => ['name' => 'UpdateUserPhoneConfig', 'http' => ['method' => 'POST', 'requestUri' => '/users/{InstanceId}/{UserId}/phone-config'], 'input' => ['shape' => 'UpdateUserPhoneConfigRequest'], 'errors' => [['shape' => 'InvalidRequestException'], ['shape' => 'InvalidParameterException'], ['shape' => 'ResourceNotFoundException'], ['shape' => 'ThrottlingException'], ['shape' => 'InternalServiceException']]], 'UpdateUserRoutingProfile' => ['name' => 'UpdateUserRoutingProfile', 'http' => ['method' => 'POST', 'requestUri' => '/users/{InstanceId}/{UserId}/routing-profile'], 'input' => ['shape' => 'UpdateUserRoutingProfileRequest'], 'errors' => [['shape' => 'InvalidRequestException'], ['shape' => 'InvalidParameterException'], ['shape' => 'ResourceNotFoundException'], ['shape' => 'ThrottlingException'], ['shape' => 'InternalServiceException']]], 'UpdateUserSecurityProfiles' => ['name' => 'UpdateUserSecurityProfiles', 'http' => ['method' => 'POST', 'requestUri' => '/users/{InstanceId}/{UserId}/security-profiles'], 'input' => ['shape' => 'UpdateUserSecurityProfilesRequest'], 'errors' => [['shape' => 'InvalidRequestException'], ['shape' => 'InvalidParameterException'], ['shape' => 'ResourceNotFoundException'], ['shape' => 'ThrottlingException'], ['shape' => 'InternalServiceException']]]], 'shapes' => ['ARN' => ['type' => 'string'], 'AfterContactWorkTimeLimit' => ['type' => 'integer', 'min' => 0], 'AgentFirstName' => ['type' => 'string', 'max' => 100, 'min' => 1], 'AgentLastName' => ['type' => 'string', 'max' => 100, 'min' => 1], 'AgentUsername' => ['type' => 'string', 'max' => 20, 'min' => 1, 'pattern' => '[a-zA-Z0-9\\_\\-\\.]+'], 'AttributeName' => ['type' => 'string', 'max' => 32767, 'min' => 1], 'AttributeValue' => ['type' => 'string', 'max' => 32767, 'min' => 0], 'Attributes' => ['type' => 'map', 'key' => ['shape' => 'AttributeName'], 'value' => ['shape' => 'AttributeValue']], 'AutoAccept' => ['type' => 'boolean'], 'Channel' => ['type' => 'string', 'enum' => ['VOICE']], 'Channels' => ['type' => 'list', 'member' => ['shape' => 'Channel'], 'max' => 1], 'ClientToken' => ['type' => 'string', 'max' => 500], 'Comparison' => ['type' => 'string', 'enum' => ['LT']], 'ContactFlowId' => ['type' => 'string', 'max' => 500], 'ContactId' => ['type' => 'string', 'max' => 256, 'min' => 1], 'ContactNotFoundException' => ['type' => 'structure', 'members' => ['Message' => ['shape' => 'Message']], 'error' => ['httpStatusCode' => 410], 'exception' => true], 'CreateUserRequest' => ['type' => 'structure', 'required' => ['Username', 'PhoneConfig', 'SecurityProfileIds', 'RoutingProfileId', 'InstanceId'], 'members' => ['Username' => ['shape' => 'AgentUsername'], 'Password' => ['shape' => 'Password'], 'IdentityInfo' => ['shape' => 'UserIdentityInfo'], 'PhoneConfig' => ['shape' => 'UserPhoneConfig'], 'DirectoryUserId' => ['shape' => 'DirectoryUserId'], 'SecurityProfileIds' => ['shape' => 'SecurityProfileIds'], 'RoutingProfileId' => ['shape' => 'RoutingProfileId'], 'HierarchyGroupId' => ['shape' => 'HierarchyGroupId'], 'InstanceId' => ['shape' => 'InstanceId', 'location' => 'uri', 'locationName' => 'InstanceId']]], 'CreateUserResponse' => ['type' => 'structure', 'members' => ['UserId' => ['shape' => 'UserId'], 'UserArn' => ['shape' => 'ARN']]], 'Credentials' => ['type' => 'structure', 'members' => ['AccessToken' => ['shape' => 'SecurityToken'], 'AccessTokenExpiration' => ['shape' => 'timestamp'], 'RefreshToken' => ['shape' => 'SecurityToken'], 'RefreshTokenExpiration' => ['shape' => 'timestamp']]], 'CurrentMetric' => ['type' => 'structure', 'members' => ['Name' => ['shape' => 'CurrentMetricName'], 'Unit' => ['shape' => 'Unit']]], 'CurrentMetricData' => ['type' => 'structure', 'members' => ['Metric' => ['shape' => 'CurrentMetric'], 'Value' => ['shape' => 'Value', 'box' => true]]], 'CurrentMetricDataCollections' => ['type' => 'list', 'member' => ['shape' => 'CurrentMetricData']], 'CurrentMetricName' => ['type' => 'string', 'enum' => ['AGENTS_ONLINE', 'AGENTS_AVAILABLE', 'AGENTS_ON_CALL', 'AGENTS_NON_PRODUCTIVE', 'AGENTS_AFTER_CONTACT_WORK', 'AGENTS_ERROR', 'AGENTS_STAFFED', 'CONTACTS_IN_QUEUE', 'OLDEST_CONTACT_AGE', 'CONTACTS_SCHEDULED']], 'CurrentMetricResult' => ['type' => 'structure', 'members' => ['Dimensions' => ['shape' => 'Dimensions'], 'Collections' => ['shape' => 'CurrentMetricDataCollections']]], 'CurrentMetricResults' => ['type' => 'list', 'member' => ['shape' => 'CurrentMetricResult']], 'CurrentMetrics' => ['type' => 'list', 'member' => ['shape' => 'CurrentMetric']], 'DeleteUserRequest' => ['type' => 'structure', 'required' => ['InstanceId', 'UserId'], 'members' => ['InstanceId' => ['shape' => 'InstanceId', 'location' => 'uri', 'locationName' => 'InstanceId'], 'UserId' => ['shape' => 'UserId', 'location' => 'uri', 'locationName' => 'UserId']]], 'DescribeUserHierarchyGroupRequest' => ['type' => 'structure', 'required' => ['HierarchyGroupId', 'InstanceId'], 'members' => ['HierarchyGroupId' => ['shape' => 'HierarchyGroupId', 'location' => 'uri', 'locationName' => 'HierarchyGroupId'], 'InstanceId' => ['shape' => 'InstanceId', 'location' => 'uri', 'locationName' => 'InstanceId']]], 'DescribeUserHierarchyGroupResponse' => ['type' => 'structure', 'members' => ['HierarchyGroup' => ['shape' => 'HierarchyGroup']]], 'DescribeUserHierarchyStructureRequest' => ['type' => 'structure', 'required' => ['InstanceId'], 'members' => ['InstanceId' => ['shape' => 'InstanceId', 'location' => 'uri', 'locationName' => 'InstanceId']]], 'DescribeUserHierarchyStructureResponse' => ['type' => 'structure', 'members' => ['HierarchyStructure' => ['shape' => 'HierarchyStructure']]], 'DescribeUserRequest' => ['type' => 'structure', 'required' => ['UserId', 'InstanceId'], 'members' => ['UserId' => ['shape' => 'UserId', 'location' => 'uri', 'locationName' => 'UserId'], 'InstanceId' => ['shape' => 'InstanceId', 'location' => 'uri', 'locationName' => 'InstanceId']]], 'DescribeUserResponse' => ['type' => 'structure', 'members' => ['User' => ['shape' => 'User']]], 'DestinationNotAllowedException' => ['type' => 'structure', 'members' => ['Message' => ['shape' => 'Message']], 'error' => ['httpStatusCode' => 403], 'exception' => true], 'Dimensions' => ['type' => 'structure', 'members' => ['Queue' => ['shape' => 'QueueReference'], 'Channel' => ['shape' => 'Channel']]], 'DirectoryUserId' => ['type' => 'string'], 'DuplicateResourceException' => ['type' => 'structure', 'members' => ['Message' => ['shape' => 'Message']], 'error' => ['httpStatusCode' => 409], 'exception' => true], 'Email' => ['type' => 'string'], 'Filters' => ['type' => 'structure', 'members' => ['Queues' => ['shape' => 'Queues'], 'Channels' => ['shape' => 'Channels']]], 'GetContactAttributesRequest' => ['type' => 'structure', 'required' => ['InstanceId', 'InitialContactId'], 'members' => ['InstanceId' => ['shape' => 'InstanceId', 'location' => 'uri', 'locationName' => 'InstanceId'], 'InitialContactId' => ['shape' => 'ContactId', 'location' => 'uri', 'locationName' => 'InitialContactId']]], 'GetContactAttributesResponse' => ['type' => 'structure', 'members' => ['Attributes' => ['shape' => 'Attributes']]], 'GetCurrentMetricDataRequest' => ['type' => 'structure', 'required' => ['InstanceId', 'Filters', 'CurrentMetrics'], 'members' => ['InstanceId' => ['shape' => 'InstanceId', 'location' => 'uri', 'locationName' => 'InstanceId'], 'Filters' => ['shape' => 'Filters'], 'Groupings' => ['shape' => 'Groupings'], 'CurrentMetrics' => ['shape' => 'CurrentMetrics'], 'NextToken' => ['shape' => 'NextToken'], 'MaxResults' => ['shape' => 'MaxResult100', 'box' => true]]], 'GetCurrentMetricDataResponse' => ['type' => 'structure', 'members' => ['NextToken' => ['shape' => 'NextToken'], 'MetricResults' => ['shape' => 'CurrentMetricResults'], 'DataSnapshotTime' => ['shape' => 'timestamp']]], 'GetFederationTokenRequest' => ['type' => 'structure', 'required' => ['InstanceId'], 'members' => ['InstanceId' => ['shape' => 'InstanceId', 'location' => 'uri', 'locationName' => 'InstanceId']]], 'GetFederationTokenResponse' => ['type' => 'structure', 'members' => ['Credentials' => ['shape' => 'Credentials']]], 'GetMetricDataRequest' => ['type' => 'structure', 'required' => ['InstanceId', 'StartTime', 'EndTime', 'Filters', 'HistoricalMetrics'], 'members' => ['InstanceId' => ['shape' => 'InstanceId', 'location' => 'uri', 'locationName' => 'InstanceId'], 'StartTime' => ['shape' => 'timestamp'], 'EndTime' => ['shape' => 'timestamp'], 'Filters' => ['shape' => 'Filters'], 'Groupings' => ['shape' => 'Groupings'], 'HistoricalMetrics' => ['shape' => 'HistoricalMetrics'], 'NextToken' => ['shape' => 'NextToken'], 'MaxResults' => ['shape' => 'MaxResult100', 'box' => true]]], 'GetMetricDataResponse' => ['type' => 'structure', 'members' => ['NextToken' => ['shape' => 'NextToken'], 'MetricResults' => ['shape' => 'HistoricalMetricResults']]], 'Grouping' => ['type' => 'string', 'enum' => ['QUEUE', 'CHANNEL']], 'Groupings' => ['type' => 'list', 'member' => ['shape' => 'Grouping'], 'max' => 2], 'HierarchyGroup' => ['type' => 'structure', 'members' => ['Id' => ['shape' => 'HierarchyGroupId'], 'Arn' => ['shape' => 'ARN'], 'Name' => ['shape' => 'HierarchyGroupName'], 'LevelId' => ['shape' => 'HierarchyLevelId'], 'HierarchyPath' => ['shape' => 'HierarchyPath']]], 'HierarchyGroupId' => ['type' => 'string'], 'HierarchyGroupName' => ['type' => 'string'], 'HierarchyGroupSummary' => ['type' => 'structure', 'members' => ['Id' => ['shape' => 'HierarchyGroupId'], 'Arn' => ['shape' => 'ARN'], 'Name' => ['shape' => 'HierarchyGroupName']]], 'HierarchyGroupSummaryList' => ['type' => 'list', 'member' => ['shape' => 'HierarchyGroupSummary']], 'HierarchyLevel' => ['type' => 'structure', 'members' => ['Id' => ['shape' => 'HierarchyLevelId'], 'Arn' => ['shape' => 'ARN'], 'Name' => ['shape' => 'HierarchyLevelName']]], 'HierarchyLevelId' => ['type' => 'string'], 'HierarchyLevelName' => ['type' => 'string'], 'HierarchyPath' => ['type' => 'structure', 'members' => ['LevelOne' => ['shape' => 'HierarchyGroupSummary'], 'LevelTwo' => ['shape' => 'HierarchyGroupSummary'], 'LevelThree' => ['shape' => 'HierarchyGroupSummary'], 'LevelFour' => ['shape' => 'HierarchyGroupSummary'], 'LevelFive' => ['shape' => 'HierarchyGroupSummary']]], 'HierarchyStructure' => ['type' => 'structure', 'members' => ['LevelOne' => ['shape' => 'HierarchyLevel'], 'LevelTwo' => ['shape' => 'HierarchyLevel'], 'LevelThree' => ['shape' => 'HierarchyLevel'], 'LevelFour' => ['shape' => 'HierarchyLevel'], 'LevelFive' => ['shape' => 'HierarchyLevel']]], 'HistoricalMetric' => ['type' => 'structure', 'members' => ['Name' => ['shape' => 'HistoricalMetricName'], 'Threshold' => ['shape' => 'Threshold', 'box' => true], 'Statistic' => ['shape' => 'Statistic'], 'Unit' => ['shape' => 'Unit']]], 'HistoricalMetricData' => ['type' => 'structure', 'members' => ['Metric' => ['shape' => 'HistoricalMetric'], 'Value' => ['shape' => 'Value', 'box' => true]]], 'HistoricalMetricDataCollections' => ['type' => 'list', 'member' => ['shape' => 'HistoricalMetricData']], 'HistoricalMetricName' => ['type' => 'string', 'enum' => ['CONTACTS_QUEUED', 'CONTACTS_HANDLED', 'CONTACTS_ABANDONED', 'CONTACTS_CONSULTED', 'CONTACTS_AGENT_HUNG_UP_FIRST', 'CONTACTS_HANDLED_INCOMING', 'CONTACTS_HANDLED_OUTBOUND', 'CONTACTS_HOLD_ABANDONS', 'CONTACTS_TRANSFERRED_IN', 'CONTACTS_TRANSFERRED_OUT', 'CONTACTS_TRANSFERRED_IN_FROM_QUEUE', 'CONTACTS_TRANSFERRED_OUT_FROM_QUEUE', 'CONTACTS_MISSED', 'CALLBACK_CONTACTS_HANDLED', 'API_CONTACTS_HANDLED', 'OCCUPANCY', 'HANDLE_TIME', 'AFTER_CONTACT_WORK_TIME', 'QUEUED_TIME', 'ABANDON_TIME', 'QUEUE_ANSWER_TIME', 'HOLD_TIME', 'INTERACTION_TIME', 'INTERACTION_AND_HOLD_TIME', 'SERVICE_LEVEL']], 'HistoricalMetricResult' => ['type' => 'structure', 'members' => ['Dimensions' => ['shape' => 'Dimensions'], 'Collections' => ['shape' => 'HistoricalMetricDataCollections']]], 'HistoricalMetricResults' => ['type' => 'list', 'member' => ['shape' => 'HistoricalMetricResult']], 'HistoricalMetrics' => ['type' => 'list', 'member' => ['shape' => 'HistoricalMetric']], 'InstanceId' => ['type' => 'string', 'max' => 100, 'min' => 1], 'InternalServiceException' => ['type' => 'structure', 'members' => ['Message' => ['shape' => 'Message']], 'error' => ['httpStatusCode' => 500], 'exception' => true], 'InvalidParameterException' => ['type' => 'structure', 'members' => ['Message' => ['shape' => 'Message']], 'error' => ['httpStatusCode' => 400], 'exception' => true], 'InvalidRequestException' => ['type' => 'structure', 'members' => ['Message' => ['shape' => 'Message']], 'error' => ['httpStatusCode' => 400], 'exception' => true], 'LimitExceededException' => ['type' => 'structure', 'members' => ['Message' => ['shape' => 'Message']], 'error' => ['httpStatusCode' => 429], 'exception' => true], 'ListRoutingProfilesRequest' => ['type' => 'structure', 'required' => ['InstanceId'], 'members' => ['InstanceId' => ['shape' => 'InstanceId', 'location' => 'uri', 'locationName' => 'InstanceId'], 'NextToken' => ['shape' => 'NextToken', 'location' => 'querystring', 'locationName' => 'nextToken'], 'MaxResults' => ['shape' => 'MaxResult1000', 'box' => true, 'location' => 'querystring', 'locationName' => 'maxResults']]], 'ListRoutingProfilesResponse' => ['type' => 'structure', 'members' => ['RoutingProfileSummaryList' => ['shape' => 'RoutingProfileSummaryList'], 'NextToken' => ['shape' => 'NextToken']]], 'ListSecurityProfilesRequest' => ['type' => 'structure', 'required' => ['InstanceId'], 'members' => ['InstanceId' => ['shape' => 'InstanceId', 'location' => 'uri', 'locationName' => 'InstanceId'], 'NextToken' => ['shape' => 'NextToken', 'location' => 'querystring', 'locationName' => 'nextToken'], 'MaxResults' => ['shape' => 'MaxResult1000', 'box' => true, 'location' => 'querystring', 'locationName' => 'maxResults']]], 'ListSecurityProfilesResponse' => ['type' => 'structure', 'members' => ['SecurityProfileSummaryList' => ['shape' => 'SecurityProfileSummaryList'], 'NextToken' => ['shape' => 'NextToken']]], 'ListUserHierarchyGroupsRequest' => ['type' => 'structure', 'required' => ['InstanceId'], 'members' => ['InstanceId' => ['shape' => 'InstanceId', 'location' => 'uri', 'locationName' => 'InstanceId'], 'NextToken' => ['shape' => 'NextToken', 'location' => 'querystring', 'locationName' => 'nextToken'], 'MaxResults' => ['shape' => 'MaxResult1000', 'box' => true, 'location' => 'querystring', 'locationName' => 'maxResults']]], 'ListUserHierarchyGroupsResponse' => ['type' => 'structure', 'members' => ['UserHierarchyGroupSummaryList' => ['shape' => 'HierarchyGroupSummaryList'], 'NextToken' => ['shape' => 'NextToken']]], 'ListUsersRequest' => ['type' => 'structure', 'required' => ['InstanceId'], 'members' => ['InstanceId' => ['shape' => 'InstanceId', 'location' => 'uri', 'locationName' => 'InstanceId'], 'NextToken' => ['shape' => 'NextToken', 'location' => 'querystring', 'locationName' => 'nextToken'], 'MaxResults' => ['shape' => 'MaxResult1000', 'box' => true, 'location' => 'querystring', 'locationName' => 'maxResults']]], 'ListUsersResponse' => ['type' => 'structure', 'members' => ['UserSummaryList' => ['shape' => 'UserSummaryList'], 'NextToken' => ['shape' => 'NextToken']]], 'MaxResult100' => ['type' => 'integer', 'max' => 100, 'min' => 1], 'MaxResult1000' => ['type' => 'integer', 'max' => 1000, 'min' => 1], 'Message' => ['type' => 'string'], 'NextToken' => ['type' => 'string'], 'OutboundContactNotPermittedException' => ['type' => 'structure', 'members' => ['Message' => ['shape' => 'Message']], 'error' => ['httpStatusCode' => 403], 'exception' => true], 'Password' => ['type' => 'string', 'pattern' => '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\\d)[a-zA-Z\\d\\S]{8,64}$/'], 'PhoneNumber' => ['type' => 'string'], 'PhoneType' => ['type' => 'string', 'enum' => ['SOFT_PHONE', 'DESK_PHONE']], 'QueueId' => ['type' => 'string'], 'QueueReference' => ['type' => 'structure', 'members' => ['Id' => ['shape' => 'QueueId'], 'Arn' => ['shape' => 'ARN']]], 'Queues' => ['type' => 'list', 'member' => ['shape' => 'QueueId'], 'max' => 100, 'min' => 1], 'ResourceNotFoundException' => ['type' => 'structure', 'members' => ['Message' => ['shape' => 'Message']], 'error' => ['httpStatusCode' => 404], 'exception' => true], 'RoutingProfileId' => ['type' => 'string'], 'RoutingProfileName' => ['type' => 'string', 'max' => 100, 'min' => 1], 'RoutingProfileSummary' => ['type' => 'structure', 'members' => ['Id' => ['shape' => 'RoutingProfileId'], 'Arn' => ['shape' => 'ARN'], 'Name' => ['shape' => 'RoutingProfileName']]], 'RoutingProfileSummaryList' => ['type' => 'list', 'member' => ['shape' => 'RoutingProfileSummary']], 'SecurityProfileId' => ['type' => 'string'], 'SecurityProfileIds' => ['type' => 'list', 'member' => ['shape' => 'SecurityProfileId'], 'max' => 10, 'min' => 1], 'SecurityProfileName' => ['type' => 'string'], 'SecurityProfileSummary' => ['type' => 'structure', 'members' => ['Id' => ['shape' => 'SecurityProfileId'], 'Arn' => ['shape' => 'ARN'], 'Name' => ['shape' => 'SecurityProfileName']]], 'SecurityProfileSummaryList' => ['type' => 'list', 'member' => ['shape' => 'SecurityProfileSummary']], 'SecurityToken' => ['type' => 'string', 'sensitive' => true], 'StartOutboundVoiceContactRequest' => ['type' => 'structure', 'required' => ['DestinationPhoneNumber', 'ContactFlowId', 'InstanceId'], 'members' => ['DestinationPhoneNumber' => ['shape' => 'PhoneNumber'], 'ContactFlowId' => ['shape' => 'ContactFlowId'], 'InstanceId' => ['shape' => 'InstanceId'], 'ClientToken' => ['shape' => 'ClientToken', 'idempotencyToken' => true], 'SourcePhoneNumber' => ['shape' => 'PhoneNumber'], 'QueueId' => ['shape' => 'QueueId'], 'Attributes' => ['shape' => 'Attributes']]], 'StartOutboundVoiceContactResponse' => ['type' => 'structure', 'members' => ['ContactId' => ['shape' => 'ContactId']]], 'Statistic' => ['type' => 'string', 'enum' => ['SUM', 'MAX', 'AVG']], 'StopContactRequest' => ['type' => 'structure', 'required' => ['ContactId', 'InstanceId'], 'members' => ['ContactId' => ['shape' => 'ContactId'], 'InstanceId' => ['shape' => 'InstanceId']]], 'StopContactResponse' => ['type' => 'structure', 'members' => []], 'Threshold' => ['type' => 'structure', 'members' => ['Comparison' => ['shape' => 'Comparison'], 'ThresholdValue' => ['shape' => 'ThresholdValue', 'box' => true]]], 'ThresholdValue' => ['type' => 'double'], 'ThrottlingException' => ['type' => 'structure', 'members' => ['Message' => ['shape' => 'Message']], 'error' => ['httpStatusCode' => 429], 'exception' => true], 'Unit' => ['type' => 'string', 'enum' => ['SECONDS', 'COUNT', 'PERCENT']], 'UpdateContactAttributesRequest' => ['type' => 'structure', 'required' => ['InitialContactId', 'InstanceId', 'Attributes'], 'members' => ['InitialContactId' => ['shape' => 'ContactId'], 'InstanceId' => ['shape' => 'InstanceId'], 'Attributes' => ['shape' => 'Attributes']]], 'UpdateContactAttributesResponse' => ['type' => 'structure', 'members' => []], 'UpdateUserHierarchyRequest' => ['type' => 'structure', 'required' => ['UserId', 'InstanceId'], 'members' => ['HierarchyGroupId' => ['shape' => 'HierarchyGroupId'], 'UserId' => ['shape' => 'UserId', 'location' => 'uri', 'locationName' => 'UserId'], 'InstanceId' => ['shape' => 'InstanceId', 'location' => 'uri', 'locationName' => 'InstanceId']]], 'UpdateUserIdentityInfoRequest' => ['type' => 'structure', 'required' => ['IdentityInfo', 'UserId', 'InstanceId'], 'members' => ['IdentityInfo' => ['shape' => 'UserIdentityInfo'], 'UserId' => ['shape' => 'UserId', 'location' => 'uri', 'locationName' => 'UserId'], 'InstanceId' => ['shape' => 'InstanceId', 'location' => 'uri', 'locationName' => 'InstanceId']]], 'UpdateUserPhoneConfigRequest' => ['type' => 'structure', 'required' => ['PhoneConfig', 'UserId', 'InstanceId'], 'members' => ['PhoneConfig' => ['shape' => 'UserPhoneConfig'], 'UserId' => ['shape' => 'UserId', 'location' => 'uri', 'locationName' => 'UserId'], 'InstanceId' => ['shape' => 'InstanceId', 'location' => 'uri', 'locationName' => 'InstanceId']]], 'UpdateUserRoutingProfileRequest' => ['type' => 'structure', 'required' => ['RoutingProfileId', 'UserId', 'InstanceId'], 'members' => ['RoutingProfileId' => ['shape' => 'RoutingProfileId'], 'UserId' => ['shape' => 'UserId', 'location' => 'uri', 'locationName' => 'UserId'], 'InstanceId' => ['shape' => 'InstanceId', 'location' => 'uri', 'locationName' => 'InstanceId']]], 'UpdateUserSecurityProfilesRequest' => ['type' => 'structure', 'required' => ['SecurityProfileIds', 'UserId', 'InstanceId'], 'members' => ['SecurityProfileIds' => ['shape' => 'SecurityProfileIds'], 'UserId' => ['shape' => 'UserId', 'location' => 'uri', 'locationName' => 'UserId'], 'InstanceId' => ['shape' => 'InstanceId', 'location' => 'uri', 'locationName' => 'InstanceId']]], 'User' => ['type' => 'structure', 'members' => ['Id' => ['shape' => 'UserId'], 'Arn' => ['shape' => 'ARN'], 'Username' => ['shape' => 'AgentUsername'], 'IdentityInfo' => ['shape' => 'UserIdentityInfo'], 'PhoneConfig' => ['shape' => 'UserPhoneConfig'], 'DirectoryUserId' => ['shape' => 'DirectoryUserId'], 'SecurityProfileIds' => ['shape' => 'SecurityProfileIds'], 'RoutingProfileId' => ['shape' => 'RoutingProfileId'], 'HierarchyGroupId' => ['shape' => 'HierarchyGroupId']]], 'UserId' => ['type' => 'string'], 'UserIdentityInfo' => ['type' => 'structure', 'members' => ['FirstName' => ['shape' => 'AgentFirstName'], 'LastName' => ['shape' => 'AgentLastName'], 'Email' => ['shape' => 'Email']]], 'UserNotFoundException' => ['type' => 'structure', 'members' => ['Message' => ['shape' => 'Message']], 'error' => ['httpStatusCode' => 404], 'exception' => true], 'UserPhoneConfig' => ['type' => 'structure', 'required' => ['PhoneType'], 'members' => ['PhoneType' => ['shape' => 'PhoneType'], 'AutoAccept' => ['shape' => 'AutoAccept'], 'AfterContactWorkTimeLimit' => ['shape' => 'AfterContactWorkTimeLimit'], 'DeskPhoneNumber' => ['shape' => 'PhoneNumber']]], 'UserSummary' => ['type' => 'structure', 'members' => ['Id' => ['shape' => 'UserId'], 'Arn' => ['shape' => 'ARN'], 'Username' => ['shape' => 'AgentUsername']]], 'UserSummaryList' => ['type' => 'list', 'member' => ['shape' => 'UserSummary']], 'Value' => ['type' => 'double'], 'timestamp' => ['type' => 'timestamp']]];

?>