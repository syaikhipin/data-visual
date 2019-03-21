<?php
/*
 * @ PHP 5.6
 * @ Decoder version : 1.0.0.1
 * @ Release on : 24.03.2018
 * @ Website    : http://EasyToYou.eu
 */

namespace Google\AdsApi\AdWords\v201806\rm;

/**
 * This file was generated from WSDL. DO NOT EDIT.
 */
class OfflineDataUploadOperation extends \Google\AdsApi\AdWords\v201806\cm\Operation
{
    /**
     * @var \Google\AdsApi\AdWords\v201806\rm\OfflineDataUpload $operand
     */
    protected $operand = null;
    /**
     * @param string $operator
     * @param string $OperationType
     * @param \Google\AdsApi\AdWords\v201806\rm\OfflineDataUpload $operand
     */
    public function __construct($operator = null, $OperationType = null, $operand = null)
    {
        parent::__construct($operator, $OperationType);
        $this->operand = $operand;
    }
    /**
     * @return \Google\AdsApi\AdWords\v201806\rm\OfflineDataUpload
     */
    public function getOperand()
    {
        return $this->operand;
    }
    /**
     * @param \Google\AdsApi\AdWords\v201806\rm\OfflineDataUpload $operand
     * @return \Google\AdsApi\AdWords\v201806\rm\OfflineDataUploadOperation
     */
    public function setOperand($operand)
    {
        $this->operand = $operand;
        return $this;
    }
}

?>