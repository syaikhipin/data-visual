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
namespace Docker\API\Normalizer;

use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
class VolumesPrunePostResponse200Normalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    public function supportsDenormalization($data, $type, $format = null)
    {
        return $type === 'Docker\\API\\Model\\VolumesPrunePostResponse200';
    }
    public function supportsNormalization($data, $format = null)
    {
        return $data instanceof \Docker\API\Model\VolumesPrunePostResponse200;
    }
    public function denormalize($data, $class, $format = null, array $context = [])
    {
        if (!is_object($data)) {
            return null;
        }
        $object = new \Docker\API\Model\VolumesPrunePostResponse200();
        if (property_exists($data, 'VolumesDeleted') && $data->{'VolumesDeleted'} !== null) {
            $values = [];
            foreach ($data->{'VolumesDeleted'} as $value) {
                $values[] = $value;
            }
            $object->setVolumesDeleted($values);
        }
        if (property_exists($data, 'SpaceReclaimed') && $data->{'SpaceReclaimed'} !== null) {
            $object->setSpaceReclaimed($data->{'SpaceReclaimed'});
        }
        return $object;
    }
    public function normalize($object, $format = null, array $context = [])
    {
        $data = new \stdClass();
        if (null !== $object->getVolumesDeleted()) {
            $values = [];
            foreach ($object->getVolumesDeleted() as $value) {
                $values[] = $value;
            }
            $data->{'VolumesDeleted'} = $values;
        }
        if (null !== $object->getSpaceReclaimed()) {
            $data->{'SpaceReclaimed'} = $object->getSpaceReclaimed();
        }
        return $data;
    }
}

?>