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
class ClickTrackingCreative extends \Google\AdsApi\AdManager\v201805\Creative
{
    /**
     * @var string $clickTrackingUrl
     */
    protected $clickTrackingUrl = null;
    /**
     * @param int $advertiserId
     * @param int $id
     * @param string $name
     * @param \Google\AdsApi\AdManager\v201805\Size $size
     * @param string $previewUrl
     * @param string[] $policyViolations
     * @param \Google\AdsApi\AdManager\v201805\AppliedLabel[] $appliedLabels
     * @param \Google\AdsApi\AdManager\v201805\DateTime $lastModifiedDateTime
     * @param \Google\AdsApi\AdManager\v201805\BaseCustomFieldValue[] $customFieldValues
     * @param string $clickTrackingUrl
     */
    public function __construct($advertiserId = null, $id = null, $name = null, $size = null, $previewUrl = null, array $policyViolations = null, array $appliedLabels = null, $lastModifiedDateTime = null, array $customFieldValues = null, $clickTrackingUrl = null)
    {
        parent::__construct($advertiserId, $id, $name, $size, $previewUrl, $policyViolations, $appliedLabels, $lastModifiedDateTime, $customFieldValues);
        $this->clickTrackingUrl = $clickTrackingUrl;
    }
    /**
     * @return string
     */
    public function getClickTrackingUrl()
    {
        return $this->clickTrackingUrl;
    }
    /**
     * @param string $clickTrackingUrl
     * @return \Google\AdsApi\AdManager\v201805\ClickTrackingCreative
     */
    public function setClickTrackingUrl($clickTrackingUrl)
    {
        $this->clickTrackingUrl = $clickTrackingUrl;
        return $this;
    }
}

?>