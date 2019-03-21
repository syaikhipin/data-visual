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

class Volume
{
    /**
     * Name of the volume.
     *
     * @var string
     */
    protected $name;
    /**
     * Name of the volume driver used by the volume.
     *
     * @var string
     */
    protected $driver;
    /**
     * Mount path of the volume on the host.
     *
     * @var string
     */
    protected $mountpoint;
    /**
     * Date/Time the volume was created.
     *
     * @var string
     */
    protected $createdAt;
    /**
    * Low-level details about the volume, provided by the volume driver.
        Details are returned as a map with key/value pairs:
        `{"key":"value","key2":"value2"}`.
    
        The `Status` field is optional, and is omitted if the volume driver
        does not support this feature.
    
    *
    * @var mixed[]
    */
    protected $status;
    /**
     * User-defined key/value metadata.
     *
     * @var string[]
     */
    protected $labels;
    /**
     * The level at which the volume exists. Either `global` for cluster-wide, or `local` for machine level.
     *
     * @var string
     */
    protected $scope;
    /**
     * The driver specific options used when creating the volume.
     *
     * @var string[]
     */
    protected $options;
    /**
    * Usage details about the volume. This information is used by the.
        `GET /system/df` endpoint, and omitted in other endpoints.
    
    *
    * @var VolumeUsageData
    */
    protected $usageData;
    /**
     * Name of the volume.
     *
     * @return string
     */
    public function getName() : ?string
    {
        return $this->name;
    }
    /**
     * Name of the volume.
     *
     * @param string $name
     *
     * @return self
     */
    public function setName(?string $name) : self
    {
        $this->name = $name;
        return $this;
    }
    /**
     * Name of the volume driver used by the volume.
     *
     * @return string
     */
    public function getDriver() : ?string
    {
        return $this->driver;
    }
    /**
     * Name of the volume driver used by the volume.
     *
     * @param string $driver
     *
     * @return self
     */
    public function setDriver(?string $driver) : self
    {
        $this->driver = $driver;
        return $this;
    }
    /**
     * Mount path of the volume on the host.
     *
     * @return string
     */
    public function getMountpoint() : ?string
    {
        return $this->mountpoint;
    }
    /**
     * Mount path of the volume on the host.
     *
     * @param string $mountpoint
     *
     * @return self
     */
    public function setMountpoint(?string $mountpoint) : self
    {
        $this->mountpoint = $mountpoint;
        return $this;
    }
    /**
     * Date/Time the volume was created.
     *
     * @return string
     */
    public function getCreatedAt() : ?string
    {
        return $this->createdAt;
    }
    /**
     * Date/Time the volume was created.
     *
     * @param string $createdAt
     *
     * @return self
     */
    public function setCreatedAt(?string $createdAt) : self
    {
        $this->createdAt = $createdAt;
        return $this;
    }
    /**
    * Low-level details about the volume, provided by the volume driver.
        Details are returned as a map with key/value pairs:
        `{"key":"value","key2":"value2"}`.
    
        The `Status` field is optional, and is omitted if the volume driver
        does not support this feature.
    
    *
    * @return mixed[]
    */
    public function getStatus() : ?\ArrayObject
    {
        return $this->status;
    }
    /**
    * Low-level details about the volume, provided by the volume driver.
        Details are returned as a map with key/value pairs:
        `{"key":"value","key2":"value2"}`.
    
        The `Status` field is optional, and is omitted if the volume driver
        does not support this feature.
    
    *
    * @param mixed[] $status
    *
    * @return self
    */
    public function setStatus(?\ArrayObject $status) : self
    {
        $this->status = $status;
        return $this;
    }
    /**
     * User-defined key/value metadata.
     *
     * @return string[]
     */
    public function getLabels() : ?\ArrayObject
    {
        return $this->labels;
    }
    /**
     * User-defined key/value metadata.
     *
     * @param string[] $labels
     *
     * @return self
     */
    public function setLabels(?\ArrayObject $labels) : self
    {
        $this->labels = $labels;
        return $this;
    }
    /**
     * The level at which the volume exists. Either `global` for cluster-wide, or `local` for machine level.
     *
     * @return string
     */
    public function getScope() : ?string
    {
        return $this->scope;
    }
    /**
     * The level at which the volume exists. Either `global` for cluster-wide, or `local` for machine level.
     *
     * @param string $scope
     *
     * @return self
     */
    public function setScope(?string $scope) : self
    {
        $this->scope = $scope;
        return $this;
    }
    /**
     * The driver specific options used when creating the volume.
     *
     * @return string[]
     */
    public function getOptions() : ?\ArrayObject
    {
        return $this->options;
    }
    /**
     * The driver specific options used when creating the volume.
     *
     * @param string[] $options
     *
     * @return self
     */
    public function setOptions(?\ArrayObject $options) : self
    {
        $this->options = $options;
        return $this;
    }
    /**
    * Usage details about the volume. This information is used by the.
        `GET /system/df` endpoint, and omitted in other endpoints.
    
    *
    * @return VolumeUsageData
    */
    public function getUsageData() : ?VolumeUsageData
    {
        return $this->usageData;
    }
    /**
    * Usage details about the volume. This information is used by the.
        `GET /system/df` endpoint, and omitted in other endpoints.
    
    *
    * @param VolumeUsageData $usageData
    *
    * @return self
    */
    public function setUsageData(?VolumeUsageData $usageData) : self
    {
        $this->usageData = $usageData;
        return $this;
    }
}

?>