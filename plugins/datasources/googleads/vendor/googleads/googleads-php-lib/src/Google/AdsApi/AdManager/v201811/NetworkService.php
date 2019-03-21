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
namespace Google\AdsApi\AdManager\v201811;

/**
 * This file was generated from WSDL. DO NOT EDIT.
 */
class NetworkService extends \Google\AdsApi\Common\AdsSoapClient
{
    /**
     * @var array $classmap The defined classes
     */
    private static $classmap = array('ApiError' => 'Google\\AdsApi\\AdManager\\v201811\\ApiError', 'ApiException' => 'Google\\AdsApi\\AdManager\\v201811\\ApiException', 'ApiVersionError' => 'Google\\AdsApi\\AdManager\\v201811\\ApiVersionError', 'ApplicationException' => 'Google\\AdsApi\\AdManager\\v201811\\ApplicationException', 'AuthenticationError' => 'Google\\AdsApi\\AdManager\\v201811\\AuthenticationError', 'CollectionSizeError' => 'Google\\AdsApi\\AdManager\\v201811\\CollectionSizeError', 'CommonError' => 'Google\\AdsApi\\AdManager\\v201811\\CommonError', 'ExchangeRateError' => 'Google\\AdsApi\\AdManager\\v201811\\ExchangeRateError', 'FeatureError' => 'Google\\AdsApi\\AdManager\\v201811\\FeatureError', 'FieldPathElement' => 'Google\\AdsApi\\AdManager\\v201811\\FieldPathElement', 'InternalApiError' => 'Google\\AdsApi\\AdManager\\v201811\\InternalApiError', 'InvalidEmailError' => 'Google\\AdsApi\\AdManager\\v201811\\InvalidEmailError', 'Network' => 'Google\\AdsApi\\AdManager\\v201811\\Network', 'NetworkError' => 'Google\\AdsApi\\AdManager\\v201811\\NetworkError', 'NotNullError' => 'Google\\AdsApi\\AdManager\\v201811\\NotNullError', 'ParseError' => 'Google\\AdsApi\\AdManager\\v201811\\ParseError', 'PermissionError' => 'Google\\AdsApi\\AdManager\\v201811\\PermissionError', 'PrecisionError' => 'Google\\AdsApi\\AdManager\\v201811\\PrecisionError', 'PublisherQueryLanguageContextError' => 'Google\\AdsApi\\AdManager\\v201811\\PublisherQueryLanguageContextError', 'PublisherQueryLanguageSyntaxError' => 'Google\\AdsApi\\AdManager\\v201811\\PublisherQueryLanguageSyntaxError', 'QuotaError' => 'Google\\AdsApi\\AdManager\\v201811\\QuotaError', 'RequestError' => 'Google\\AdsApi\\AdManager\\v201811\\RequestError', 'RequiredCollectionError' => 'Google\\AdsApi\\AdManager\\v201811\\RequiredCollectionError', 'RequiredError' => 'Google\\AdsApi\\AdManager\\v201811\\RequiredError', 'RequiredNumberError' => 'Google\\AdsApi\\AdManager\\v201811\\RequiredNumberError', 'ServerError' => 'Google\\AdsApi\\AdManager\\v201811\\ServerError', 'SetTopBoxCreativeError' => 'Google\\AdsApi\\AdManager\\v201811\\SetTopBoxCreativeError', 'SoapRequestHeader' => 'Google\\AdsApi\\AdManager\\v201811\\SoapRequestHeader', 'SoapResponseHeader' => 'Google\\AdsApi\\AdManager\\v201811\\SoapResponseHeader', 'StatementError' => 'Google\\AdsApi\\AdManager\\v201811\\StatementError', 'StringFormatError' => 'Google\\AdsApi\\AdManager\\v201811\\StringFormatError', 'StringLengthError' => 'Google\\AdsApi\\AdManager\\v201811\\StringLengthError', 'TypeError' => 'Google\\AdsApi\\AdManager\\v201811\\TypeError', 'UniqueError' => 'Google\\AdsApi\\AdManager\\v201811\\UniqueError', 'getAllNetworksResponse' => 'Google\\AdsApi\\AdManager\\v201811\\getAllNetworksResponse', 'getCurrentNetworkResponse' => 'Google\\AdsApi\\AdManager\\v201811\\getCurrentNetworkResponse', 'makeTestNetworkResponse' => 'Google\\AdsApi\\AdManager\\v201811\\makeTestNetworkResponse', 'updateNetworkResponse' => 'Google\\AdsApi\\AdManager\\v201811\\updateNetworkResponse');
    /**
     * @param array $options A array of config values
     * @param string $wsdl The wsdl file to use
     */
    public function __construct(array $options = array(), $wsdl = 'https://ads.google.com/apis/ads/publisher/v201811/NetworkService?wsdl')
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
     * Returns the list of {@link Network} objects to which the current login has
     * access.
     * <p>
     * Intended to be used without a network code in the SOAP header when the
     * login may have more than one network associated with it.
     * </p>
     *
     * @return \Google\AdsApi\AdManager\v201811\Network[]
     * @throws \Google\AdsApi\AdManager\v201811\ApiException
     */
    public function getAllNetworks()
    {
        return $this->__soapCall('getAllNetworks', array(array()))->getRval();
    }
    /**
     * Returns the current network for which requests are being made.
     *
     * @return \Google\AdsApi\AdManager\v201811\Network
     * @throws \Google\AdsApi\AdManager\v201811\ApiException
     */
    public function getCurrentNetwork()
    {
        return $this->__soapCall('getCurrentNetwork', array(array()))->getRval();
    }
    /**
     * Creates a new blank network for testing purposes using the current login.
     * <p>
     * Each login(i.e. email address) can only have one test network. Data from
     * any of your existing networks will not be transferred to the new test network.
     * Once the test network is created, the test network can be used in the API
     * by supplying the {@link Network#networkCode} in the SOAP header or by
     * logging into the Ad Manager UI.
     * <p>
     * Test networks are limited in the following ways:
     * <ul>
     * <li>Test networks cannot serve ads.</li>
     * <li>Because test networks cannot serve ads, reports will always come
     * back without data.</li>
     * <li>Since forecasting requires serving history, forecast service results
     * will be faked. See {@link ForecastService} for more info.</li>
     * <li>Test networks are, by default, Ad Manager networks and don't have any features
     * from Ad Manager 360. To have additional features turned on, please contact your
     * account manager. </li>
     * <li>Test networks are limited to 10,000 objects per entity type.</li>
     * </ul>
     * </p>
     *
     * @return \Google\AdsApi\AdManager\v201811\Network
     * @throws \Google\AdsApi\AdManager\v201811\ApiException
     */
    public function makeTestNetwork()
    {
        return $this->__soapCall('makeTestNetwork', array(array()))->getRval();
    }
    /**
     * Updates the specified network. Currently, only the network display name can
     * be updated.
     *
     * @param \Google\AdsApi\AdManager\v201811\Network $network
     * @return \Google\AdsApi\AdManager\v201811\Network
     * @throws \Google\AdsApi\AdManager\v201811\ApiException
     */
    public function updateNetwork(\Google\AdsApi\AdManager\v201811\Network $network)
    {
        return $this->__soapCall('updateNetwork', array(array('network' => $network)))->getRval();
    }
}

?>