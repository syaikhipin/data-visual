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
/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Symfony\Component\Serializer\Mapping;

/**
 * Stores metadata needed for serializing and deserializing attributes.
 *
 * Primarily, the metadata stores serialization groups.
 *
 * @internal
 *
 * @author Kévin Dunglas <dunglas@gmail.com>
 */
interface AttributeMetadataInterface
{
    /**
     * Gets the attribute name.
     *
     * @return string
     */
    public function getName();
    /**
     * Adds this attribute to the given group.
     *
     * @param string $group
     */
    public function addGroup($group);
    /**
     * Gets groups of this attribute.
     *
     * @return string[]
     */
    public function getGroups();
    /**
     * Sets the serialization max depth for this attribute.
     *
     * @param int|null $maxDepth
     */
    public function setMaxDepth($maxDepth);
    /**
     * Gets the serialization max depth for this attribute.
     *
     * @return int|null
     */
    public function getMaxDepth();
    /**
     * Merges an {@see AttributeMetadataInterface} with in the current one.
     */
    public function merge(self $attributeMetadata);
}

?>