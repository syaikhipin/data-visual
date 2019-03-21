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

class GenericResourcesItem
{
    /**
     * @var GenericResourcesItemNamedResourceSpec
     */
    protected $namedResourceSpec;
    /**
     * @var GenericResourcesItemDiscreteResourceSpec
     */
    protected $discreteResourceSpec;
    /**
     * @return GenericResourcesItemNamedResourceSpec
     */
    public function getNamedResourceSpec() : ?GenericResourcesItemNamedResourceSpec
    {
        return $this->namedResourceSpec;
    }
    /**
     * @param GenericResourcesItemNamedResourceSpec $namedResourceSpec
     *
     * @return self
     */
    public function setNamedResourceSpec(?GenericResourcesItemNamedResourceSpec $namedResourceSpec) : self
    {
        $this->namedResourceSpec = $namedResourceSpec;
        return $this;
    }
    /**
     * @return GenericResourcesItemDiscreteResourceSpec
     */
    public function getDiscreteResourceSpec() : ?GenericResourcesItemDiscreteResourceSpec
    {
        return $this->discreteResourceSpec;
    }
    /**
     * @param GenericResourcesItemDiscreteResourceSpec $discreteResourceSpec
     *
     * @return self
     */
    public function setDiscreteResourceSpec(?GenericResourcesItemDiscreteResourceSpec $discreteResourceSpec) : self
    {
        $this->discreteResourceSpec = $discreteResourceSpec;
        return $this;
    }
}

?>