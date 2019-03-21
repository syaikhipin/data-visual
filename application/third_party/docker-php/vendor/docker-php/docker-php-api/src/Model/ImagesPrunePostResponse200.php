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

class ImagesPrunePostResponse200
{
    /**
     * Images that were deleted.
     *
     * @var ImageDeleteResponseItem[]
     */
    protected $imagesDeleted;
    /**
     * Disk space reclaimed in bytes.
     *
     * @var int
     */
    protected $spaceReclaimed;
    /**
     * Images that were deleted.
     *
     * @return ImageDeleteResponseItem[]
     */
    public function getImagesDeleted() : ?array
    {
        return $this->imagesDeleted;
    }
    /**
     * Images that were deleted.
     *
     * @param ImageDeleteResponseItem[] $imagesDeleted
     *
     * @return self
     */
    public function setImagesDeleted(?array $imagesDeleted) : self
    {
        $this->imagesDeleted = $imagesDeleted;
        return $this;
    }
    /**
     * Disk space reclaimed in bytes.
     *
     * @return int
     */
    public function getSpaceReclaimed() : ?int
    {
        return $this->spaceReclaimed;
    }
    /**
     * Disk space reclaimed in bytes.
     *
     * @param int $spaceReclaimed
     *
     * @return self
     */
    public function setSpaceReclaimed(?int $spaceReclaimed) : self
    {
        $this->spaceReclaimed = $spaceReclaimed;
        return $this;
    }
}

?>