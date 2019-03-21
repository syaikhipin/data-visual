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
namespace Google\AdsApi\AdManager\v201802;

/**
 * This file was generated from WSDL. DO NOT EDIT.
 */
class LiveStreamEventService extends \Google\AdsApi\Common\AdsSoapClient
{
    /**
     * @var array $classmap The defined classes
     */
    private static $classmap = array('ObjectValue' => 'Google\\AdsApi\\AdManager\\v201802\\ObjectValue', 'ActivateLiveStreamEvents' => 'Google\\AdsApi\\AdManager\\v201802\\ActivateLiveStreamEvents', 'ApiError' => 'Google\\AdsApi\\AdManager\\v201802\\ApiError', 'ApiException' => 'Google\\AdsApi\\AdManager\\v201802\\ApiException', 'ApiVersionError' => 'Google\\AdsApi\\AdManager\\v201802\\ApiVersionError', 'ApplicationException' => 'Google\\AdsApi\\AdManager\\v201802\\ApplicationException', 'ArchiveLiveStreamEvents' => 'Google\\AdsApi\\AdManager\\v201802\\ArchiveLiveStreamEvents', 'AuthenticationError' => 'Google\\AdsApi\\AdManager\\v201802\\AuthenticationError', 'BooleanValue' => 'Google\\AdsApi\\AdManager\\v201802\\BooleanValue', 'CdnConfiguration' => 'Google\\AdsApi\\AdManager\\v201802\\CdnConfiguration', 'CollectionSizeError' => 'Google\\AdsApi\\AdManager\\v201802\\CollectionSizeError', 'CommonError' => 'Google\\AdsApi\\AdManager\\v201802\\CommonError', 'Date' => 'Google\\AdsApi\\AdManager\\v201802\\Date', 'DateTime' => 'Google\\AdsApi\\AdManager\\v201802\\DateTime', 'DateTimeValue' => 'Google\\AdsApi\\AdManager\\v201802\\DateTimeValue', 'DateValue' => 'Google\\AdsApi\\AdManager\\v201802\\DateValue', 'FeatureError' => 'Google\\AdsApi\\AdManager\\v201802\\FeatureError', 'FieldPathElement' => 'Google\\AdsApi\\AdManager\\v201802\\FieldPathElement', 'HlsSettings' => 'Google\\AdsApi\\AdManager\\v201802\\HlsSettings', 'InternalApiError' => 'Google\\AdsApi\\AdManager\\v201802\\InternalApiError', 'InvalidUrlError' => 'Google\\AdsApi\\AdManager\\v201802\\InvalidUrlError', 'LiveStreamEventAction' => 'Google\\AdsApi\\AdManager\\v201802\\LiveStreamEventAction', 'LiveStreamEventActionError' => 'Google\\AdsApi\\AdManager\\v201802\\LiveStreamEventActionError', 'LiveStreamEventCdnSettingsError' => 'Google\\AdsApi\\AdManager\\v201802\\LiveStreamEventCdnSettingsError', 'LiveStreamEventDateTimeError' => 'Google\\AdsApi\\AdManager\\v201802\\LiveStreamEventDateTimeError', 'LiveStreamEvent' => 'Google\\AdsApi\\AdManager\\v201802\\LiveStreamEvent', 'LiveStreamEventPage' => 'Google\\AdsApi\\AdManager\\v201802\\LiveStreamEventPage', 'MediaLocationSettings' => 'Google\\AdsApi\\AdManager\\v201802\\MediaLocationSettings', 'NotNullError' => 'Google\\AdsApi\\AdManager\\v201802\\NotNullError', 'NullError' => 'Google\\AdsApi\\AdManager\\v201802\\NullError', 'NumberValue' => 'Google\\AdsApi\\AdManager\\v201802\\NumberValue', 'ParseError' => 'Google\\AdsApi\\AdManager\\v201802\\ParseError', 'PauseLiveStreamEventAds' => 'Google\\AdsApi\\AdManager\\v201802\\PauseLiveStreamEventAds', 'PauseLiveStreamEvents' => 'Google\\AdsApi\\AdManager\\v201802\\PauseLiveStreamEvents', 'PermissionError' => 'Google\\AdsApi\\AdManager\\v201802\\PermissionError', 'PublisherQueryLanguageContextError' => 'Google\\AdsApi\\AdManager\\v201802\\PublisherQueryLanguageContextError', 'PublisherQueryLanguageSyntaxError' => 'Google\\AdsApi\\AdManager\\v201802\\PublisherQueryLanguageSyntaxError', 'QuotaError' => 'Google\\AdsApi\\AdManager\\v201802\\QuotaError', 'RangeError' => 'Google\\AdsApi\\AdManager\\v201802\\RangeError', 'RequiredCollectionError' => 'Google\\AdsApi\\AdManager\\v201802\\RequiredCollectionError', 'RequiredError' => 'Google\\AdsApi\\AdManager\\v201802\\RequiredError', 'SamSessionError' => 'Google\\AdsApi\\AdManager\\v201802\\SamSessionError', 'SecurityPolicySettings' => 'Google\\AdsApi\\AdManager\\v201802\\SecurityPolicySettings', 'ServerError' => 'Google\\AdsApi\\AdManager\\v201802\\ServerError', 'SetValue' => 'Google\\AdsApi\\AdManager\\v201802\\SetValue', 'SoapRequestHeader' => 'Google\\AdsApi\\AdManager\\v201802\\SoapRequestHeader', 'SoapResponseHeader' => 'Google\\AdsApi\\AdManager\\v201802\\SoapResponseHeader', 'SourceContentConfiguration' => 'Google\\AdsApi\\AdManager\\v201802\\SourceContentConfiguration', 'Statement' => 'Google\\AdsApi\\AdManager\\v201802\\Statement', 'StatementError' => 'Google\\AdsApi\\AdManager\\v201802\\StatementError', 'StringFormatError' => 'Google\\AdsApi\\AdManager\\v201802\\StringFormatError', 'StringLengthError' => 'Google\\AdsApi\\AdManager\\v201802\\StringLengthError', 'String_ValueMapEntry' => 'Google\\AdsApi\\AdManager\\v201802\\String_ValueMapEntry', 'TextValue' => 'Google\\AdsApi\\AdManager\\v201802\\TextValue', 'UniqueError' => 'Google\\AdsApi\\AdManager\\v201802\\UniqueError', 'UpdateResult' => 'Google\\AdsApi\\AdManager\\v201802\\UpdateResult', 'Value' => 'Google\\AdsApi\\AdManager\\v201802\\Value', 'createLiveStreamEventsResponse' => 'Google\\AdsApi\\AdManager\\v201802\\createLiveStreamEventsResponse', 'getLiveStreamEventsByStatementResponse' => 'Google\\AdsApi\\AdManager\\v201802\\getLiveStreamEventsByStatementResponse', 'performLiveStreamEventActionResponse' => 'Google\\AdsApi\\AdManager\\v201802\\performLiveStreamEventActionResponse', 'registerSessionsForMonitoringResponse' => 'Google\\AdsApi\\AdManager\\v201802\\registerSessionsForMonitoringResponse', 'updateLiveStreamEventsResponse' => 'Google\\AdsApi\\AdManager\\v201802\\updateLiveStreamEventsResponse');
    /**
     * @param array $options A array of config values
     * @param string $wsdl The wsdl file to use
     */
    public function __construct(array $options = array(), $wsdl = 'https://ads.google.com/apis/ads/publisher/v201802/LiveStreamEventService?wsdl')
    {
        foreach (self::$classmap as $key => $value) {
            if (!isset($options['classmap'][$key])) {
                $options['classmap'][$key] = $value;
            }
        }
        $options = array_merge(array('features' => 1), $options);
        parent::__construct($wsdl, $options);
    }
    /**
     * Creates new {@link LiveStreamEvent} objects.
     *
     * The following fields are required:
     * <ul>
     * <li>{@link LiveStreamEvent#name}</li>
     * <li>{@link LiveStreamEvent#startDateTime}</li>
     * <li>{@link LiveStreamEvent#endDateTime}</li>
     * <li>{@link LiveStreamEvent#contentUrls}</li>
     * <li>{@link LiveStreamEvent#adTags}</li>
     * </ul>
     *
     * @param \Google\AdsApi\AdManager\v201802\LiveStreamEvent[] $liveStreamEvents
     * @return \Google\AdsApi\AdManager\v201802\LiveStreamEvent[]
     * @throws \Google\AdsApi\AdManager\v201802\ApiException
     */
    public function createLiveStreamEvents(array $liveStreamEvents)
    {
        return $this->__soapCall('createLiveStreamEvents', array(array('liveStreamEvents' => $liveStreamEvents)))->getRval();
    }
    /**
     * Gets a {@link LiveStreamEventPage} of {@link LiveStreamEvent} objects that
     * satisfy the given {@link Statement#query}. The following fields are
     * supported for filtering:
     *
     * <table>
     * <tr>
     * <th scope="col">PQL Property</th> <th scope="col">Object Property</th>
     * </tr>
     * <tr>
     * <td>{@code id}</td>
     * <td>{@link LiveStreamEvent#id}</td>
     * </tr>
     * </table>
     *
     * list of live stream events
     *
     * @param \Google\AdsApi\AdManager\v201802\Statement $filterStatement
     * @return \Google\AdsApi\AdManager\v201802\LiveStreamEventPage
     * @throws \Google\AdsApi\AdManager\v201802\ApiException
     */
    public function getLiveStreamEventsByStatement(\Google\AdsApi\AdManager\v201802\Statement $filterStatement)
    {
        return $this->__soapCall('getLiveStreamEventsByStatement', array(array('filterStatement' => $filterStatement)))->getRval();
    }
    /**
     * Performs actions on {@link LiveStreamEvent} objects that match the given
     * {@link Statement#query}.
     *
     * a set of live stream events
     *
     * @param \Google\AdsApi\AdManager\v201802\LiveStreamEventAction $liveStreamEventAction
     * @param \Google\AdsApi\AdManager\v201802\Statement $filterStatement
     * @return \Google\AdsApi\AdManager\v201802\UpdateResult
     * @throws \Google\AdsApi\AdManager\v201802\ApiException
     */
    public function performLiveStreamEventAction(\Google\AdsApi\AdManager\v201802\LiveStreamEventAction $liveStreamEventAction, \Google\AdsApi\AdManager\v201802\Statement $filterStatement)
    {
        return $this->__soapCall('performLiveStreamEventAction', array(array('liveStreamEventAction' => $liveStreamEventAction, 'filterStatement' => $filterStatement)))->getRval();
    }
    /**
     * Registers the specified list of {@code sessionIds} for monitoring. Once the session IDs have
     * been registered, all logged information about the sessions will be persisted and can be viewed
     * via the Ad Manager UI.
     *
     * <p>A session ID is a unique identifier of a single user watching a live stream event.
     *
     * @param string[] $sessionIds
     * @return string[]
     * @throws \Google\AdsApi\AdManager\v201802\ApiException
     */
    public function registerSessionsForMonitoring(array $sessionIds)
    {
        return $this->__soapCall('registerSessionsForMonitoring', array(array('sessionIds' => $sessionIds)))->getRval();
    }
    /**
     * Updates the specified {@link LiveStreamEvent} objects.
     *
     * @param \Google\AdsApi\AdManager\v201802\LiveStreamEvent[] $liveStreamEvents
     * @return \Google\AdsApi\AdManager\v201802\LiveStreamEvent[]
     * @throws \Google\AdsApi\AdManager\v201802\ApiException
     */
    public function updateLiveStreamEvents(array $liveStreamEvents)
    {
        return $this->__soapCall('updateLiveStreamEvents', array(array('liveStreamEvents' => $liveStreamEvents)))->getRval();
    }
}

?>