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
class PolicySummary
{
    /**
     * @var \Google\AdsApi\AdWords\v201806\cm\PolicyTopicEntry[] $policyTopicEntries
     */
    protected $policyTopicEntries = null;
    /**
     * @param \Google\AdsApi\AdWords\v201806\cm\PolicyTopicEntry[] $policyTopicEntries
     */
    public function __construct(array $policyTopicEntries = null)
    {
        $this->policyTopicEntries = $policyTopicEntries;
    }
    /**
     * @return \Google\AdsApi\AdWords\v201806\cm\PolicyTopicEntry[]
     */
    public function getPolicyTopicEntries()
    {
        return $this->policyTopicEntries;
    }
    /**
     * @param \Google\AdsApi\AdWords\v201806\cm\PolicyTopicEntry[] $policyTopicEntries
     * @return \Google\AdsApi\AdWords\v201806\cm\PolicySummary
     */
    public function setPolicyTopicEntries(array $policyTopicEntries)
    {
        $this->policyTopicEntries = $policyTopicEntries;
        return $this;
    }
}

?>