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
class CpcBid extends \Google\AdsApi\AdWords\v201806\cm\Bids
{
    /**
     * @var \Google\AdsApi\AdWords\v201806\cm\Money $bid
     */
    protected $bid = null;
    /**
     * @var string $cpcBidSource
     */
    protected $cpcBidSource = null;
    /**
     * @param string $BidsType
     * @param \Google\AdsApi\AdWords\v201806\cm\Money $bid
     * @param string $cpcBidSource
     */
    public function __construct($BidsType = null, $bid = null, $cpcBidSource = null)
    {
        parent::__construct($BidsType);
        $this->bid = $bid;
        $this->cpcBidSource = $cpcBidSource;
    }
    /**
     * @return \Google\AdsApi\AdWords\v201806\cm\Money
     */
    public function getBid()
    {
        return $this->bid;
    }
    /**
     * @param \Google\AdsApi\AdWords\v201806\cm\Money $bid
     * @return \Google\AdsApi\AdWords\v201806\cm\CpcBid
     */
    public function setBid($bid)
    {
        $this->bid = $bid;
        return $this;
    }
    /**
     * @return string
     */
    public function getCpcBidSource()
    {
        return $this->cpcBidSource;
    }
    /**
     * @param string $cpcBidSource
     * @return \Google\AdsApi\AdWords\v201806\cm\CpcBid
     */
    public function setCpcBidSource($cpcBidSource)
    {
        $this->cpcBidSource = $cpcBidSource;
        return $this;
    }
}

?>