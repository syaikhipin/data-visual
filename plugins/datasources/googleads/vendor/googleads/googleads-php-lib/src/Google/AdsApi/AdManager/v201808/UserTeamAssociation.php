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
class UserTeamAssociation extends \Google\AdsApi\AdManager\v201808\UserRecordTeamAssociation
{
    /**
     * @var int $userId
     */
    protected $userId = null;
    /**
     * @param int $teamId
     * @param string $overriddenTeamAccessType
     * @param string $defaultTeamAccessType
     * @param int $userId
     */
    public function __construct($teamId = null, $overriddenTeamAccessType = null, $defaultTeamAccessType = null, $userId = null)
    {
        parent::__construct($teamId, $overriddenTeamAccessType, $defaultTeamAccessType);
        $this->userId = $userId;
    }
    /**
     * @return int
     */
    public function getUserId()
    {
        return $this->userId;
    }
    /**
     * @param int $userId
     * @return \Google\AdsApi\AdManager\v201808\UserTeamAssociation
     */
    public function setUserId($userId)
    {
        $this->userId = !is_null($userId) && PHP_INT_SIZE === 4 ? floatval($userId) : $userId;
        return $this;
    }
}

?>