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
class NumberRuleItem
{
    /**
     * @var \Google\AdsApi\AdWords\v201806\rm\NumberKey $key
     */
    protected $key = null;
    /**
     * @var string $op
     */
    protected $op = null;
    /**
     * @var float $value
     */
    protected $value = null;
    /**
     * @param \Google\AdsApi\AdWords\v201806\rm\NumberKey $key
     * @param string $op
     * @param float $value
     */
    public function __construct($key = null, $op = null, $value = null)
    {
        $this->key = $key;
        $this->op = $op;
        $this->value = $value;
    }
    /**
     * @return \Google\AdsApi\AdWords\v201806\rm\NumberKey
     */
    public function getKey()
    {
        return $this->key;
    }
    /**
     * @param \Google\AdsApi\AdWords\v201806\rm\NumberKey $key
     * @return \Google\AdsApi\AdWords\v201806\rm\NumberRuleItem
     */
    public function setKey($key)
    {
        $this->key = $key;
        return $this;
    }
    /**
     * @return string
     */
    public function getOp()
    {
        return $this->op;
    }
    /**
     * @param string $op
     * @return \Google\AdsApi\AdWords\v201806\rm\NumberRuleItem
     */
    public function setOp($op)
    {
        $this->op = $op;
        return $this;
    }
    /**
     * @return float
     */
    public function getValue()
    {
        return $this->value;
    }
    /**
     * @param float $value
     * @return \Google\AdsApi\AdWords\v201806\rm\NumberRuleItem
     */
    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }
}

?>