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

class ServicesCreatePostResponse201
{
    /**
     * The ID of the created service.
     *
     * @var string
     */
    protected $iD;
    /**
     * Optional warning message.
     *
     * @var string
     */
    protected $warning;
    /**
     * The ID of the created service.
     *
     * @return string
     */
    public function getID() : ?string
    {
        return $this->iD;
    }
    /**
     * The ID of the created service.
     *
     * @param string $iD
     *
     * @return self
     */
    public function setID(?string $iD) : self
    {
        $this->iD = $iD;
        return $this;
    }
    /**
     * Optional warning message.
     *
     * @return string
     */
    public function getWarning() : ?string
    {
        return $this->warning;
    }
    /**
     * Optional warning message.
     *
     * @param string $warning
     *
     * @return self
     */
    public function setWarning(?string $warning) : self
    {
        $this->warning = $warning;
        return $this;
    }
}

?>