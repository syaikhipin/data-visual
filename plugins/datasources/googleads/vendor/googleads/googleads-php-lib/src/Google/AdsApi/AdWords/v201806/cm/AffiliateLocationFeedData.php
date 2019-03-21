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
class AffiliateLocationFeedData extends \Google\AdsApi\AdWords\v201806\cm\SystemFeedGenerationData
{
    /**
     * @var \Google\AdsApi\AdWords\v201806\cm\Chain[] $chains
     */
    protected $chains = null;
    /**
     * @var string $relationshipType
     */
    protected $relationshipType = null;
    /**
     * @param string $SystemFeedGenerationDataType
     * @param \Google\AdsApi\AdWords\v201806\cm\Chain[] $chains
     * @param string $relationshipType
     */
    public function __construct($SystemFeedGenerationDataType = null, array $chains = null, $relationshipType = null)
    {
        parent::__construct($SystemFeedGenerationDataType);
        $this->chains = $chains;
        $this->relationshipType = $relationshipType;
    }
    /**
     * @return \Google\AdsApi\AdWords\v201806\cm\Chain[]
     */
    public function getChains()
    {
        return $this->chains;
    }
    /**
     * @param \Google\AdsApi\AdWords\v201806\cm\Chain[] $chains
     * @return \Google\AdsApi\AdWords\v201806\cm\AffiliateLocationFeedData
     */
    public function setChains(array $chains)
    {
        $this->chains = $chains;
        return $this;
    }
    /**
     * @return string
     */
    public function getRelationshipType()
    {
        return $this->relationshipType;
    }
    /**
     * @param string $relationshipType
     * @return \Google\AdsApi\AdWords\v201806\cm\AffiliateLocationFeedData
     */
    public function setRelationshipType($relationshipType)
    {
        $this->relationshipType = $relationshipType;
        return $this;
    }
}

?>