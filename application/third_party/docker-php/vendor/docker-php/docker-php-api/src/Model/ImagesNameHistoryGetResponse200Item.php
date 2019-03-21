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

class ImagesNameHistoryGetResponse200Item
{
    /**
     * @var string
     */
    protected $id;
    /**
     * @var int
     */
    protected $created;
    /**
     * @var string
     */
    protected $createdBy;
    /**
     * @var string[]
     */
    protected $tags;
    /**
     * @var int
     */
    protected $size;
    /**
     * @var string
     */
    protected $comment;
    /**
     * @return string
     */
    public function getId() : ?string
    {
        return $this->id;
    }
    /**
     * @param string $id
     *
     * @return self
     */
    public function setId(?string $id) : self
    {
        $this->id = $id;
        return $this;
    }
    /**
     * @return int
     */
    public function getCreated() : ?int
    {
        return $this->created;
    }
    /**
     * @param int $created
     *
     * @return self
     */
    public function setCreated(?int $created) : self
    {
        $this->created = $created;
        return $this;
    }
    /**
     * @return string
     */
    public function getCreatedBy() : ?string
    {
        return $this->createdBy;
    }
    /**
     * @param string $createdBy
     *
     * @return self
     */
    public function setCreatedBy(?string $createdBy) : self
    {
        $this->createdBy = $createdBy;
        return $this;
    }
    /**
     * @return string[]
     */
    public function getTags() : ?array
    {
        return $this->tags;
    }
    /**
     * @param string[] $tags
     *
     * @return self
     */
    public function setTags(?array $tags) : self
    {
        $this->tags = $tags;
        return $this;
    }
    /**
     * @return int
     */
    public function getSize() : ?int
    {
        return $this->size;
    }
    /**
     * @param int $size
     *
     * @return self
     */
    public function setSize(?int $size) : self
    {
        $this->size = $size;
        return $this;
    }
    /**
     * @return string
     */
    public function getComment() : ?string
    {
        return $this->comment;
    }
    /**
     * @param string $comment
     *
     * @return self
     */
    public function setComment(?string $comment) : self
    {
        $this->comment = $comment;
        return $this;
    }
}

?>