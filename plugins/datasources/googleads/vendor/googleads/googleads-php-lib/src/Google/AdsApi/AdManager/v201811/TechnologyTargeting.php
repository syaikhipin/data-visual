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
class TechnologyTargeting
{
    /**
     * @var \Google\AdsApi\AdManager\v201811\BandwidthGroupTargeting $bandwidthGroupTargeting
     */
    protected $bandwidthGroupTargeting = null;
    /**
     * @var \Google\AdsApi\AdManager\v201811\BrowserTargeting $browserTargeting
     */
    protected $browserTargeting = null;
    /**
     * @var \Google\AdsApi\AdManager\v201811\BrowserLanguageTargeting $browserLanguageTargeting
     */
    protected $browserLanguageTargeting = null;
    /**
     * @var \Google\AdsApi\AdManager\v201811\DeviceCapabilityTargeting $deviceCapabilityTargeting
     */
    protected $deviceCapabilityTargeting = null;
    /**
     * @var \Google\AdsApi\AdManager\v201811\DeviceCategoryTargeting $deviceCategoryTargeting
     */
    protected $deviceCategoryTargeting = null;
    /**
     * @var \Google\AdsApi\AdManager\v201811\DeviceManufacturerTargeting $deviceManufacturerTargeting
     */
    protected $deviceManufacturerTargeting = null;
    /**
     * @var \Google\AdsApi\AdManager\v201811\MobileCarrierTargeting $mobileCarrierTargeting
     */
    protected $mobileCarrierTargeting = null;
    /**
     * @var \Google\AdsApi\AdManager\v201811\MobileDeviceTargeting $mobileDeviceTargeting
     */
    protected $mobileDeviceTargeting = null;
    /**
     * @var \Google\AdsApi\AdManager\v201811\MobileDeviceSubmodelTargeting $mobileDeviceSubmodelTargeting
     */
    protected $mobileDeviceSubmodelTargeting = null;
    /**
     * @var \Google\AdsApi\AdManager\v201811\OperatingSystemTargeting $operatingSystemTargeting
     */
    protected $operatingSystemTargeting = null;
    /**
     * @var \Google\AdsApi\AdManager\v201811\OperatingSystemVersionTargeting $operatingSystemVersionTargeting
     */
    protected $operatingSystemVersionTargeting = null;
    /**
     * @param \Google\AdsApi\AdManager\v201811\BandwidthGroupTargeting $bandwidthGroupTargeting
     * @param \Google\AdsApi\AdManager\v201811\BrowserTargeting $browserTargeting
     * @param \Google\AdsApi\AdManager\v201811\BrowserLanguageTargeting $browserLanguageTargeting
     * @param \Google\AdsApi\AdManager\v201811\DeviceCapabilityTargeting $deviceCapabilityTargeting
     * @param \Google\AdsApi\AdManager\v201811\DeviceCategoryTargeting $deviceCategoryTargeting
     * @param \Google\AdsApi\AdManager\v201811\DeviceManufacturerTargeting $deviceManufacturerTargeting
     * @param \Google\AdsApi\AdManager\v201811\MobileCarrierTargeting $mobileCarrierTargeting
     * @param \Google\AdsApi\AdManager\v201811\MobileDeviceTargeting $mobileDeviceTargeting
     * @param \Google\AdsApi\AdManager\v201811\MobileDeviceSubmodelTargeting $mobileDeviceSubmodelTargeting
     * @param \Google\AdsApi\AdManager\v201811\OperatingSystemTargeting $operatingSystemTargeting
     * @param \Google\AdsApi\AdManager\v201811\OperatingSystemVersionTargeting $operatingSystemVersionTargeting
     */
    public function __construct($bandwidthGroupTargeting = null, $browserTargeting = null, $browserLanguageTargeting = null, $deviceCapabilityTargeting = null, $deviceCategoryTargeting = null, $deviceManufacturerTargeting = null, $mobileCarrierTargeting = null, $mobileDeviceTargeting = null, $mobileDeviceSubmodelTargeting = null, $operatingSystemTargeting = null, $operatingSystemVersionTargeting = null)
    {
        $this->bandwidthGroupTargeting = $bandwidthGroupTargeting;
        $this->browserTargeting = $browserTargeting;
        $this->browserLanguageTargeting = $browserLanguageTargeting;
        $this->deviceCapabilityTargeting = $deviceCapabilityTargeting;
        $this->deviceCategoryTargeting = $deviceCategoryTargeting;
        $this->deviceManufacturerTargeting = $deviceManufacturerTargeting;
        $this->mobileCarrierTargeting = $mobileCarrierTargeting;
        $this->mobileDeviceTargeting = $mobileDeviceTargeting;
        $this->mobileDeviceSubmodelTargeting = $mobileDeviceSubmodelTargeting;
        $this->operatingSystemTargeting = $operatingSystemTargeting;
        $this->operatingSystemVersionTargeting = $operatingSystemVersionTargeting;
    }
    /**
     * @return \Google\AdsApi\AdManager\v201811\BandwidthGroupTargeting
     */
    public function getBandwidthGroupTargeting()
    {
        return $this->bandwidthGroupTargeting;
    }
    /**
     * @param \Google\AdsApi\AdManager\v201811\BandwidthGroupTargeting $bandwidthGroupTargeting
     * @return \Google\AdsApi\AdManager\v201811\TechnologyTargeting
     */
    public function setBandwidthGroupTargeting($bandwidthGroupTargeting)
    {
        $this->bandwidthGroupTargeting = $bandwidthGroupTargeting;
        return $this;
    }
    /**
     * @return \Google\AdsApi\AdManager\v201811\BrowserTargeting
     */
    public function getBrowserTargeting()
    {
        return $this->browserTargeting;
    }
    /**
     * @param \Google\AdsApi\AdManager\v201811\BrowserTargeting $browserTargeting
     * @return \Google\AdsApi\AdManager\v201811\TechnologyTargeting
     */
    public function setBrowserTargeting($browserTargeting)
    {
        $this->browserTargeting = $browserTargeting;
        return $this;
    }
    /**
     * @return \Google\AdsApi\AdManager\v201811\BrowserLanguageTargeting
     */
    public function getBrowserLanguageTargeting()
    {
        return $this->browserLanguageTargeting;
    }
    /**
     * @param \Google\AdsApi\AdManager\v201811\BrowserLanguageTargeting $browserLanguageTargeting
     * @return \Google\AdsApi\AdManager\v201811\TechnologyTargeting
     */
    public function setBrowserLanguageTargeting($browserLanguageTargeting)
    {
        $this->browserLanguageTargeting = $browserLanguageTargeting;
        return $this;
    }
    /**
     * @return \Google\AdsApi\AdManager\v201811\DeviceCapabilityTargeting
     */
    public function getDeviceCapabilityTargeting()
    {
        return $this->deviceCapabilityTargeting;
    }
    /**
     * @param \Google\AdsApi\AdManager\v201811\DeviceCapabilityTargeting $deviceCapabilityTargeting
     * @return \Google\AdsApi\AdManager\v201811\TechnologyTargeting
     */
    public function setDeviceCapabilityTargeting($deviceCapabilityTargeting)
    {
        $this->deviceCapabilityTargeting = $deviceCapabilityTargeting;
        return $this;
    }
    /**
     * @return \Google\AdsApi\AdManager\v201811\DeviceCategoryTargeting
     */
    public function getDeviceCategoryTargeting()
    {
        return $this->deviceCategoryTargeting;
    }
    /**
     * @param \Google\AdsApi\AdManager\v201811\DeviceCategoryTargeting $deviceCategoryTargeting
     * @return \Google\AdsApi\AdManager\v201811\TechnologyTargeting
     */
    public function setDeviceCategoryTargeting($deviceCategoryTargeting)
    {
        $this->deviceCategoryTargeting = $deviceCategoryTargeting;
        return $this;
    }
    /**
     * @return \Google\AdsApi\AdManager\v201811\DeviceManufacturerTargeting
     */
    public function getDeviceManufacturerTargeting()
    {
        return $this->deviceManufacturerTargeting;
    }
    /**
     * @param \Google\AdsApi\AdManager\v201811\DeviceManufacturerTargeting $deviceManufacturerTargeting
     * @return \Google\AdsApi\AdManager\v201811\TechnologyTargeting
     */
    public function setDeviceManufacturerTargeting($deviceManufacturerTargeting)
    {
        $this->deviceManufacturerTargeting = $deviceManufacturerTargeting;
        return $this;
    }
    /**
     * @return \Google\AdsApi\AdManager\v201811\MobileCarrierTargeting
     */
    public function getMobileCarrierTargeting()
    {
        return $this->mobileCarrierTargeting;
    }
    /**
     * @param \Google\AdsApi\AdManager\v201811\MobileCarrierTargeting $mobileCarrierTargeting
     * @return \Google\AdsApi\AdManager\v201811\TechnologyTargeting
     */
    public function setMobileCarrierTargeting($mobileCarrierTargeting)
    {
        $this->mobileCarrierTargeting = $mobileCarrierTargeting;
        return $this;
    }
    /**
     * @return \Google\AdsApi\AdManager\v201811\MobileDeviceTargeting
     */
    public function getMobileDeviceTargeting()
    {
        return $this->mobileDeviceTargeting;
    }
    /**
     * @param \Google\AdsApi\AdManager\v201811\MobileDeviceTargeting $mobileDeviceTargeting
     * @return \Google\AdsApi\AdManager\v201811\TechnologyTargeting
     */
    public function setMobileDeviceTargeting($mobileDeviceTargeting)
    {
        $this->mobileDeviceTargeting = $mobileDeviceTargeting;
        return $this;
    }
    /**
     * @return \Google\AdsApi\AdManager\v201811\MobileDeviceSubmodelTargeting
     */
    public function getMobileDeviceSubmodelTargeting()
    {
        return $this->mobileDeviceSubmodelTargeting;
    }
    /**
     * @param \Google\AdsApi\AdManager\v201811\MobileDeviceSubmodelTargeting $mobileDeviceSubmodelTargeting
     * @return \Google\AdsApi\AdManager\v201811\TechnologyTargeting
     */
    public function setMobileDeviceSubmodelTargeting($mobileDeviceSubmodelTargeting)
    {
        $this->mobileDeviceSubmodelTargeting = $mobileDeviceSubmodelTargeting;
        return $this;
    }
    /**
     * @return \Google\AdsApi\AdManager\v201811\OperatingSystemTargeting
     */
    public function getOperatingSystemTargeting()
    {
        return $this->operatingSystemTargeting;
    }
    /**
     * @param \Google\AdsApi\AdManager\v201811\OperatingSystemTargeting $operatingSystemTargeting
     * @return \Google\AdsApi\AdManager\v201811\TechnologyTargeting
     */
    public function setOperatingSystemTargeting($operatingSystemTargeting)
    {
        $this->operatingSystemTargeting = $operatingSystemTargeting;
        return $this;
    }
    /**
     * @return \Google\AdsApi\AdManager\v201811\OperatingSystemVersionTargeting
     */
    public function getOperatingSystemVersionTargeting()
    {
        return $this->operatingSystemVersionTargeting;
    }
    /**
     * @param \Google\AdsApi\AdManager\v201811\OperatingSystemVersionTargeting $operatingSystemVersionTargeting
     * @return \Google\AdsApi\AdManager\v201811\TechnologyTargeting
     */
    public function setOperatingSystemVersionTargeting($operatingSystemVersionTargeting)
    {
        $this->operatingSystemVersionTargeting = $operatingSystemVersionTargeting;
        return $this;
    }
}

?>