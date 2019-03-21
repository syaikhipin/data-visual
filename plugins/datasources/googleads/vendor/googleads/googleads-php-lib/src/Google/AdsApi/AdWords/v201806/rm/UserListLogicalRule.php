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
class UserListLogicalRule
{
    /**
     * @var string $operator
     */
    protected $operator = null;
    /**
     * @var \Google\AdsApi\AdWords\v201806\rm\LogicalUserListOperand[] $ruleOperands
     */
    protected $ruleOperands = null;
    /**
     * @param string $operator
     * @param \Google\AdsApi\AdWords\v201806\rm\LogicalUserListOperand[] $ruleOperands
     */
    public function __construct($operator = null, array $ruleOperands = null)
    {
        $this->operator = $operator;
        $this->ruleOperands = $ruleOperands;
    }
    /**
     * @return string
     */
    public function getOperator()
    {
        return $this->operator;
    }
    /**
     * @param string $operator
     * @return \Google\AdsApi\AdWords\v201806\rm\UserListLogicalRule
     */
    public function setOperator($operator)
    {
        $this->operator = $operator;
        return $this;
    }
    /**
     * @return \Google\AdsApi\AdWords\v201806\rm\LogicalUserListOperand[]
     */
    public function getRuleOperands()
    {
        return $this->ruleOperands;
    }
    /**
     * @param \Google\AdsApi\AdWords\v201806\rm\LogicalUserListOperand[] $ruleOperands
     * @return \Google\AdsApi\AdWords\v201806\rm\UserListLogicalRule
     */
    public function setRuleOperands(array $ruleOperands)
    {
        $this->ruleOperands = $ruleOperands;
        return $this;
    }
}

?>