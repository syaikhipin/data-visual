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
class AdGroupLabel
{
    /**
     * @var int $adGroupId
     */
    protected $adGroupId = null;
    /**
     * @var int $labelId
     */
    protected $labelId = null;
    /**
     * @param int $adGroupId
     * @param int $labelId
     */
    public function __construct($adGroupId = null, $labelId = null)
    {
        $this->adGroupId = $adGroupId;
        $this->labelId = $labelId;
    }
    /**
     * @return int
     */
    public function getAdGroupId()
    {
        return $this->adGroupId;
    }
    /**
     * @param int $adGroupId
     * @return \Google\AdsApi\AdWords\v201806\cm\AdGroupLabel
     */
    public function setAdGroupId($adGroupId)
    {
        $this->adGroupId = !is_null($adGroupId) && PHP_INT_SIZE === 4 ? floatval($adGroupId) : $adGroupId;
        return $this;
    }
    /**
     * @return int
     */
    public function getLabelId()
    {
        return $this->labelId;
    }
    /**
     * @param int $labelId
     * @return \Google\AdsApi\AdWords\v201806\cm\AdGroupLabel
     */
    public function setLabelId($labelId)
    {
        $this->labelId = !is_null($labelId) && PHP_INT_SIZE === 4 ? floatval($labelId) : $labelId;
        return $this;
    }
}

?>