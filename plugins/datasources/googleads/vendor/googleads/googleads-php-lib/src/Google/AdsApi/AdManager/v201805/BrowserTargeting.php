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
namespace Google\AdsApi\AdManager\v201805;

/**
 * This file was generated from WSDL. DO NOT EDIT.
 */
class BrowserTargeting
{
    /**
     * @var boolean $isTargeted
     */
    protected $isTargeted = null;
    /**
     * @var \Google\AdsApi\AdManager\v201805\Technology[] $browsers
     */
    protected $browsers = null;
    /**
     * @param boolean $isTargeted
     * @param \Google\AdsApi\AdManager\v201805\Technology[] $browsers
     */
    public function __construct($isTargeted = null, array $browsers = null)
    {
        $this->isTargeted = $isTargeted;
        $this->browsers = $browsers;
    }
    /**
     * @return boolean
     */
    public function getIsTargeted()
    {
        return $this->isTargeted;
    }
    /**
     * @param boolean $isTargeted
     * @return \Google\AdsApi\AdManager\v201805\BrowserTargeting
     */
    public function setIsTargeted($isTargeted)
    {
        $this->isTargeted = $isTargeted;
        return $this;
    }
    /**
     * @return \Google\AdsApi\AdManager\v201805\Technology[]
     */
    public function getBrowsers()
    {
        return $this->browsers;
    }
    /**
     * @param \Google\AdsApi\AdManager\v201805\Technology[] $browsers
     * @return \Google\AdsApi\AdManager\v201805\BrowserTargeting
     */
    public function setBrowsers(array $browsers)
    {
        $this->browsers = $browsers;
        return $this;
    }
}

?>