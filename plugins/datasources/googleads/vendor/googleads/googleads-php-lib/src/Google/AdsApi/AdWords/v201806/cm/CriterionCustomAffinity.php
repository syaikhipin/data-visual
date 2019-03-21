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
class CriterionCustomAffinity extends \Google\AdsApi\AdWords\v201806\cm\Criterion
{
    /**
     * @var int $customAffinityId
     */
    protected $customAffinityId = null;
    /**
     * @param int $id
     * @param string $type
     * @param string $CriterionType
     * @param int $customAffinityId
     */
    public function __construct($id = null, $type = null, $CriterionType = null, $customAffinityId = null)
    {
        parent::__construct($id, $type, $CriterionType);
        $this->customAffinityId = $customAffinityId;
    }
    /**
     * @return int
     */
    public function getCustomAffinityId()
    {
        return $this->customAffinityId;
    }
    /**
     * @param int $customAffinityId
     * @return \Google\AdsApi\AdWords\v201806\cm\CriterionCustomAffinity
     */
    public function setCustomAffinityId($customAffinityId)
    {
        $this->customAffinityId = !is_null($customAffinityId) && PHP_INT_SIZE === 4 ? floatval($customAffinityId) : $customAffinityId;
        return $this;
    }
}

?>