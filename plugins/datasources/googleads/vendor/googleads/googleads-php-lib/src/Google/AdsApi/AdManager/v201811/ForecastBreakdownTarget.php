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
class ForecastBreakdownTarget
{
    /**
     * @var string $name
     */
    protected $name = null;
    /**
     * @var \Google\AdsApi\AdManager\v201811\Targeting $targeting
     */
    protected $targeting = null;
    /**
     * @var \Google\AdsApi\AdManager\v201811\CreativePlaceholder $creative
     */
    protected $creative = null;
    /**
     * @param string $name
     * @param \Google\AdsApi\AdManager\v201811\Targeting $targeting
     * @param \Google\AdsApi\AdManager\v201811\CreativePlaceholder $creative
     */
    public function __construct($name = null, $targeting = null, $creative = null)
    {
        $this->name = $name;
        $this->targeting = $targeting;
        $this->creative = $creative;
    }
    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
    /**
     * @param string $name
     * @return \Google\AdsApi\AdManager\v201811\ForecastBreakdownTarget
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }
    /**
     * @return \Google\AdsApi\AdManager\v201811\Targeting
     */
    public function getTargeting()
    {
        return $this->targeting;
    }
    /**
     * @param \Google\AdsApi\AdManager\v201811\Targeting $targeting
     * @return \Google\AdsApi\AdManager\v201811\ForecastBreakdownTarget
     */
    public function setTargeting($targeting)
    {
        $this->targeting = $targeting;
        return $this;
    }
    /**
     * @return \Google\AdsApi\AdManager\v201811\CreativePlaceholder
     */
    public function getCreative()
    {
        return $this->creative;
    }
    /**
     * @param \Google\AdsApi\AdManager\v201811\CreativePlaceholder $creative
     * @return \Google\AdsApi\AdManager\v201811\ForecastBreakdownTarget
     */
    public function setCreative($creative)
    {
        $this->creative = $creative;
        return $this;
    }
}

?>