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
class VideoPositionTargeting
{
    /**
     * @var \Google\AdsApi\AdManager\v201802\VideoPositionTarget[] $targetedPositions
     */
    protected $targetedPositions = null;
    /**
     * @param \Google\AdsApi\AdManager\v201802\VideoPositionTarget[] $targetedPositions
     */
    public function __construct(array $targetedPositions = null)
    {
        $this->targetedPositions = $targetedPositions;
    }
    /**
     * @return \Google\AdsApi\AdManager\v201802\VideoPositionTarget[]
     */
    public function getTargetedPositions()
    {
        return $this->targetedPositions;
    }
    /**
     * @param \Google\AdsApi\AdManager\v201802\VideoPositionTarget[] $targetedPositions
     * @return \Google\AdsApi\AdManager\v201802\VideoPositionTargeting
     */
    public function setTargetedPositions(array $targetedPositions)
    {
        $this->targetedPositions = $targetedPositions;
        return $this;
    }
}

?>