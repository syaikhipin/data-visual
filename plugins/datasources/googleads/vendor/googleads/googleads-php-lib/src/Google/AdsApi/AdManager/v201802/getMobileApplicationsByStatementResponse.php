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
namespace Google\AdsApi\AdManager\v201802;

/**
 * This file was generated from WSDL. DO NOT EDIT.
 */
class getMobileApplicationsByStatementResponse
{
    /**
     * @var \Google\AdsApi\AdManager\v201802\MobileApplicationPage $rval
     */
    protected $rval = null;
    /**
     * @param \Google\AdsApi\AdManager\v201802\MobileApplicationPage $rval
     */
    public function __construct($rval = null)
    {
        $this->rval = $rval;
    }
    /**
     * @return \Google\AdsApi\AdManager\v201802\MobileApplicationPage
     */
    public function getRval()
    {
        return $this->rval;
    }
    /**
     * @param \Google\AdsApi\AdManager\v201802\MobileApplicationPage $rval
     * @return \Google\AdsApi\AdManager\v201802\getMobileApplicationsByStatementResponse
     */
    public function setRval($rval)
    {
        $this->rval = $rval;
        return $this;
    }
}

?>