<?php
/*
 * @ PHP 5.6
 * @ Decoder version : 1.0.0.1
 * @ Release on : 24.03.2018
 * @ Website    : http://EasyToYou.eu
 */

namespace Google\AdsApi\AdWords\v201806\o;

/**
 * This file was generated from WSDL. DO NOT EDIT.
 */
class SearchVolumeSearchParameter extends \Google\AdsApi\AdWords\v201806\o\SearchParameter
{
    /**
     * @var \Google\AdsApi\AdWords\v201806\o\LongComparisonOperation $operation
     */
    protected $operation = null;
    /**
     * @param string $SearchParameterType
     * @param \Google\AdsApi\AdWords\v201806\o\LongComparisonOperation $operation
     */
    public function __construct($SearchParameterType = null, $operation = null)
    {
        parent::__construct($SearchParameterType);
        $this->operation = $operation;
    }
    /**
     * @return \Google\AdsApi\AdWords\v201806\o\LongComparisonOperation
     */
    public function getOperation()
    {
        return $this->operation;
    }
    /**
     * @param \Google\AdsApi\AdWords\v201806\o\LongComparisonOperation $operation
     * @return \Google\AdsApi\AdWords\v201806\o\SearchVolumeSearchParameter
     */
    public function setOperation($operation)
    {
        $this->operation = $operation;
        return $this;
    }
}

?>