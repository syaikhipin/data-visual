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
class CountryConstraint extends \Google\AdsApi\AdWords\v201806\cm\PolicyTopicConstraint
{
    /**
     * @var int[] $constrainedCountries
     */
    protected $constrainedCountries = null;
    /**
     * @var int $totalTargetedCountries
     */
    protected $totalTargetedCountries = null;
    /**
     * @param string $constraintType
     * @param string $PolicyTopicConstraintType
     * @param int[] $constrainedCountries
     * @param int $totalTargetedCountries
     */
    public function __construct($constraintType = null, $PolicyTopicConstraintType = null, array $constrainedCountries = null, $totalTargetedCountries = null)
    {
        parent::__construct($constraintType, $PolicyTopicConstraintType);
        $this->constrainedCountries = $constrainedCountries;
        $this->totalTargetedCountries = $totalTargetedCountries;
    }
    /**
     * @return int[]
     */
    public function getConstrainedCountries()
    {
        return $this->constrainedCountries;
    }
    /**
     * @param int[] $constrainedCountries
     * @return \Google\AdsApi\AdWords\v201806\cm\CountryConstraint
     */
    public function setConstrainedCountries(array $constrainedCountries)
    {
        $this->constrainedCountries = $constrainedCountries;
        return $this;
    }
    /**
     * @return int
     */
    public function getTotalTargetedCountries()
    {
        return $this->totalTargetedCountries;
    }
    /**
     * @param int $totalTargetedCountries
     * @return \Google\AdsApi\AdWords\v201806\cm\CountryConstraint
     */
    public function setTotalTargetedCountries($totalTargetedCountries)
    {
        $this->totalTargetedCountries = $totalTargetedCountries;
        return $this;
    }
}

?>