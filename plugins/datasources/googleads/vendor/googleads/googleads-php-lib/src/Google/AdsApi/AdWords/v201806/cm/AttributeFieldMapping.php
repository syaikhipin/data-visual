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
class AttributeFieldMapping
{
    /**
     * @var int $feedAttributeId
     */
    protected $feedAttributeId = null;
    /**
     * @var int $fieldId
     */
    protected $fieldId = null;
    /**
     * @param int $feedAttributeId
     * @param int $fieldId
     */
    public function __construct($feedAttributeId = null, $fieldId = null)
    {
        $this->feedAttributeId = $feedAttributeId;
        $this->fieldId = $fieldId;
    }
    /**
     * @return int
     */
    public function getFeedAttributeId()
    {
        return $this->feedAttributeId;
    }
    /**
     * @param int $feedAttributeId
     * @return \Google\AdsApi\AdWords\v201806\cm\AttributeFieldMapping
     */
    public function setFeedAttributeId($feedAttributeId)
    {
        $this->feedAttributeId = !is_null($feedAttributeId) && PHP_INT_SIZE === 4 ? floatval($feedAttributeId) : $feedAttributeId;
        return $this;
    }
    /**
     * @return int
     */
    public function getFieldId()
    {
        return $this->fieldId;
    }
    /**
     * @param int $fieldId
     * @return \Google\AdsApi\AdWords\v201806\cm\AttributeFieldMapping
     */
    public function setFieldId($fieldId)
    {
        $this->fieldId = $fieldId;
        return $this;
    }
}

?>