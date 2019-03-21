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
class CdnConfigurationPage
{
    /**
     * @var int $totalResultSetSize
     */
    protected $totalResultSetSize = null;
    /**
     * @var int $startIndex
     */
    protected $startIndex = null;
    /**
     * @var \Google\AdsApi\AdManager\v201811\CdnConfiguration[] $results
     */
    protected $results = null;
    /**
     * @param int $totalResultSetSize
     * @param int $startIndex
     * @param \Google\AdsApi\AdManager\v201811\CdnConfiguration[] $results
     */
    public function __construct($totalResultSetSize = null, $startIndex = null, array $results = null)
    {
        $this->totalResultSetSize = $totalResultSetSize;
        $this->startIndex = $startIndex;
        $this->results = $results;
    }
    /**
     * @return int
     */
    public function getTotalResultSetSize()
    {
        return $this->totalResultSetSize;
    }
    /**
     * @param int $totalResultSetSize
     * @return \Google\AdsApi\AdManager\v201811\CdnConfigurationPage
     */
    public function setTotalResultSetSize($totalResultSetSize)
    {
        $this->totalResultSetSize = $totalResultSetSize;
        return $this;
    }
    /**
     * @return int
     */
    public function getStartIndex()
    {
        return $this->startIndex;
    }
    /**
     * @param int $startIndex
     * @return \Google\AdsApi\AdManager\v201811\CdnConfigurationPage
     */
    public function setStartIndex($startIndex)
    {
        $this->startIndex = $startIndex;
        return $this;
    }
    /**
     * @return \Google\AdsApi\AdManager\v201811\CdnConfiguration[]
     */
    public function getResults()
    {
        return $this->results;
    }
    /**
     * @param \Google\AdsApi\AdManager\v201811\CdnConfiguration[] $results
     * @return \Google\AdsApi\AdManager\v201811\CdnConfigurationPage
     */
    public function setResults(array $results)
    {
        $this->results = $results;
        return $this;
    }
}

?>