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
declare (strict_types=1);
/*
 * This file has been auto generated by Jane,
 *
 * Do no edit it directly.
 */
namespace Docker\API\Model;

class NetworksPrunePostResponse200
{
    /**
     * Networks that were deleted.
     *
     * @var string[]
     */
    protected $networksDeleted;
    /**
     * Networks that were deleted.
     *
     * @return string[]
     */
    public function getNetworksDeleted() : ?array
    {
        return $this->networksDeleted;
    }
    /**
     * Networks that were deleted.
     *
     * @param string[] $networksDeleted
     *
     * @return self
     */
    public function setNetworksDeleted(?array $networksDeleted) : self
    {
        $this->networksDeleted = $networksDeleted;
        return $this;
    }
}

?>