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
namespace Google\AdsApi\AdManager\v201811;

/**
 * This file was generated from WSDL. DO NOT EDIT.
 */
class getExchangeRatesByStatementResponse
{
    /**
     * @var \Google\AdsApi\AdManager\v201811\ExchangeRatePage $rval
     */
    protected $rval = null;
    /**
     * @param \Google\AdsApi\AdManager\v201811\ExchangeRatePage $rval
     */
    public function __construct($rval = null)
    {
        $this->rval = $rval;
    }
    /**
     * @return \Google\AdsApi\AdManager\v201811\ExchangeRatePage
     */
    public function getRval()
    {
        return $this->rval;
    }
    /**
     * @param \Google\AdsApi\AdManager\v201811\ExchangeRatePage $rval
     * @return \Google\AdsApi\AdManager\v201811\getExchangeRatesByStatementResponse
     */
    public function setRval($rval)
    {
        $this->rval = $rval;
        return $this;
    }
}

?>