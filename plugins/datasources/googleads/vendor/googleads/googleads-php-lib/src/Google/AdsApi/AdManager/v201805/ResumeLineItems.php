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
class ResumeLineItems extends \Google\AdsApi\AdManager\v201805\LineItemAction
{
    /**
     * @var boolean $skipInventoryCheck
     */
    protected $skipInventoryCheck = null;
    /**
     * @param boolean $skipInventoryCheck
     */
    public function __construct($skipInventoryCheck = null)
    {
        $this->skipInventoryCheck = $skipInventoryCheck;
    }
    /**
     * @return boolean
     */
    public function getSkipInventoryCheck()
    {
        return $this->skipInventoryCheck;
    }
    /**
     * @param boolean $skipInventoryCheck
     * @return \Google\AdsApi\AdManager\v201805\ResumeLineItems
     */
    public function setSkipInventoryCheck($skipInventoryCheck)
    {
        $this->skipInventoryCheck = $skipInventoryCheck;
        return $this;
    }
}

?>