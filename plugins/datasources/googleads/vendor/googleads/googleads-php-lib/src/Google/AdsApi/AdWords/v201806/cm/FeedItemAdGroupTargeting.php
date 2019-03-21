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
namespace Google\AdsApi\AdWords\v201806\cm;

/**
 * This file was generated from WSDL. DO NOT EDIT.
 */
class FeedItemAdGroupTargeting
{
    /**
     * @var int $TargetingAdGroupId
     */
    protected $TargetingAdGroupId = null;
    /**
     * @param int $TargetingAdGroupId
     */
    public function __construct($TargetingAdGroupId = null)
    {
        $this->TargetingAdGroupId = $TargetingAdGroupId;
    }
    /**
     * @return int
     */
    public function getTargetingAdGroupId()
    {
        return $this->TargetingAdGroupId;
    }
    /**
     * @param int $TargetingAdGroupId
     * @return \Google\AdsApi\AdWords\v201806\cm\FeedItemAdGroupTargeting
     */
    public function setTargetingAdGroupId($TargetingAdGroupId)
    {
        $this->TargetingAdGroupId = !is_null($TargetingAdGroupId) && PHP_INT_SIZE === 4 ? floatval($TargetingAdGroupId) : $TargetingAdGroupId;
        return $this;
    }
}

?>