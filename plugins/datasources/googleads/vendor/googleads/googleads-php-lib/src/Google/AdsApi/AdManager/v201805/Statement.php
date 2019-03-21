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
class Statement
{
    /**
     * @var string $query
     */
    protected $query = null;
    /**
     * @var \Google\AdsApi\AdManager\v201805\String_ValueMapEntry[] $values
     */
    protected $values = null;
    /**
     * @param string $query
     * @param \Google\AdsApi\AdManager\v201805\String_ValueMapEntry[] $values
     */
    public function __construct($query = null, array $values = null)
    {
        $this->query = $query;
        $this->values = $values;
    }
    /**
     * @return string
     */
    public function getQuery()
    {
        return $this->query;
    }
    /**
     * @param string $query
     * @return \Google\AdsApi\AdManager\v201805\Statement
     */
    public function setQuery($query)
    {
        $this->query = $query;
        return $this;
    }
    /**
     * @return \Google\AdsApi\AdManager\v201805\String_ValueMapEntry[]
     */
    public function getValues()
    {
        return $this->values;
    }
    /**
     * @param \Google\AdsApi\AdManager\v201805\String_ValueMapEntry[] $values
     * @return \Google\AdsApi\AdManager\v201805\Statement
     */
    public function setValues(array $values)
    {
        $this->values = $values;
        return $this;
    }
}

?>