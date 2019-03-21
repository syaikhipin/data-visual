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
class ReportJob
{
    /**
     * @var int $id
     */
    protected $id = null;
    /**
     * @var \Google\AdsApi\AdManager\v201805\ReportQuery $reportQuery
     */
    protected $reportQuery = null;
    /**
     * @param int $id
     * @param \Google\AdsApi\AdManager\v201805\ReportQuery $reportQuery
     */
    public function __construct($id = null, $reportQuery = null)
    {
        $this->id = $id;
        $this->reportQuery = $reportQuery;
    }
    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * @param int $id
     * @return \Google\AdsApi\AdManager\v201805\ReportJob
     */
    public function setId($id)
    {
        $this->id = !is_null($id) && PHP_INT_SIZE === 4 ? floatval($id) : $id;
        return $this;
    }
    /**
     * @return \Google\AdsApi\AdManager\v201805\ReportQuery
     */
    public function getReportQuery()
    {
        return $this->reportQuery;
    }
    /**
     * @param \Google\AdsApi\AdManager\v201805\ReportQuery $reportQuery
     * @return \Google\AdsApi\AdManager\v201805\ReportJob
     */
    public function setReportQuery($reportQuery)
    {
        $this->reportQuery = $reportQuery;
        return $this;
    }
}

?>