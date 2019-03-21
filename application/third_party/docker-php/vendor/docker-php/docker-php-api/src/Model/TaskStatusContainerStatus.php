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

class TaskStatusContainerStatus
{
    /**
     * @var string
     */
    protected $containerID;
    /**
     * @var int
     */
    protected $pID;
    /**
     * @var int
     */
    protected $exitCode;
    /**
     * @return string
     */
    public function getContainerID() : ?string
    {
        return $this->containerID;
    }
    /**
     * @param string $containerID
     *
     * @return self
     */
    public function setContainerID(?string $containerID) : self
    {
        $this->containerID = $containerID;
        return $this;
    }
    /**
     * @return int
     */
    public function getPID() : ?int
    {
        return $this->pID;
    }
    /**
     * @param int $pID
     *
     * @return self
     */
    public function setPID(?int $pID) : self
    {
        $this->pID = $pID;
        return $this;
    }
    /**
     * @return int
     */
    public function getExitCode() : ?int
    {
        return $this->exitCode;
    }
    /**
     * @param int $exitCode
     *
     * @return self
     */
    public function setExitCode(?int $exitCode) : self
    {
        $this->exitCode = $exitCode;
        return $this;
    }
}

?>