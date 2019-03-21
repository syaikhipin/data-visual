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
namespace Google\AdsApi\AdManager\v201808;

/**
 * This file was generated from WSDL. DO NOT EDIT.
 */
class Location
{
    /**
     * @var int $id
     */
    protected $id = null;
    /**
     * @var string $type
     */
    protected $type = null;
    /**
     * @var int $canonicalParentId
     */
    protected $canonicalParentId = null;
    /**
     * @var string $displayName
     */
    protected $displayName = null;
    /**
     * @param int $id
     * @param string $type
     * @param int $canonicalParentId
     * @param string $displayName
     */
    public function __construct($id = null, $type = null, $canonicalParentId = null, $displayName = null)
    {
        $this->id = $id;
        $this->type = $type;
        $this->canonicalParentId = $canonicalParentId;
        $this->displayName = $displayName;
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
     * @return \Google\AdsApi\AdManager\v201808\Location
     */
    public function setId($id)
    {
        $this->id = !is_null($id) && PHP_INT_SIZE === 4 ? floatval($id) : $id;
        return $this;
    }
    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }
    /**
     * @param string $type
     * @return \Google\AdsApi\AdManager\v201808\Location
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }
    /**
     * @return int
     */
    public function getCanonicalParentId()
    {
        return $this->canonicalParentId;
    }
    /**
     * @param int $canonicalParentId
     * @return \Google\AdsApi\AdManager\v201808\Location
     */
    public function setCanonicalParentId($canonicalParentId)
    {
        $this->canonicalParentId = $canonicalParentId;
        return $this;
    }
    /**
     * @return string
     */
    public function getDisplayName()
    {
        return $this->displayName;
    }
    /**
     * @param string $displayName
     * @return \Google\AdsApi\AdManager\v201808\Location
     */
    public function setDisplayName($displayName)
    {
        $this->displayName = $displayName;
        return $this;
    }
}

?>