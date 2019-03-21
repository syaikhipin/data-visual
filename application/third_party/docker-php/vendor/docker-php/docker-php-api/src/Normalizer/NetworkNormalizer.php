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
class NetworkNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    public function supportsDenormalization($data, $type, $format = null)
    {
        return $type === 'Docker\\API\\Model\\Network';
    }
    public function supportsNormalization($data, $format = null)
    {
        return $data instanceof \Docker\API\Model\Network;
    }
    public function denormalize($data, $class, $format = null, array $context = [])
    {
        if (!is_object($data)) {
            return null;
        }
        $object = new \Docker\API\Model\Network();
        if (property_exists($data, 'Name') && $data->{'Name'} !== null) {
            $object->setName($data->{'Name'});
        }
        if (property_exists($data, 'Id') && $data->{'Id'} !== null) {
            $object->setId($data->{'Id'});
        }
        if (property_exists($data, 'Created') && $data->{'Created'} !== null) {
            $object->setCreated($data->{'Created'});
        }
        if (property_exists($data, 'Scope') && $data->{'Scope'} !== null) {
            $object->setScope($data->{'Scope'});
        }
        if (property_exists($data, 'Driver') && $data->{'Driver'} !== null) {
            $object->setDriver($data->{'Driver'});
        }
        if (property_exists($data, 'EnableIPv6') && $data->{'EnableIPv6'} !== null) {
            $object->setEnableIPv6($data->{'EnableIPv6'});
        }
        if (property_exists($data, 'IPAM') && $data->{'IPAM'} !== null) {
            $object->setIPAM($this->denormalizer->denormalize($data->{'IPAM'}, 'Docker\\API\\Model\\IPAM', 'json', $context));
        }
        if (property_exists($data, 'Internal') && $data->{'Internal'} !== null) {
            $object->setInternal($data->{'Internal'});
        }
        if (property_exists($data, 'Attachable') && $data->{'Attachable'} !== null) {
            $object->setAttachable($data->{'Attachable'});
        }
        if (property_exists($data, 'Ingress') && $data->{'Ingress'} !== null) {
            $object->setIngress($data->{'Ingress'});
        }
        if (property_exists($data, 'Containers') && $data->{'Containers'} !== null) {
            $values = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data->{'Containers'} as $key => $value) {
                $values[$key] = $this->denormalizer->denormalize($value, 'Docker\\API\\Model\\NetworkContainer', 'json', $context);
            }
            $object->setContainers($values);
        }
        if (property_exists($data, 'Options') && $data->{'Options'} !== null) {
            $values_1 = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data->{'Options'} as $key_1 => $value_1) {
                $values_1[$key_1] = $value_1;
            }
            $object->setOptions($values_1);
        }
        if (property_exists($data, 'Labels') && $data->{'Labels'} !== null) {
            $values_2 = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data->{'Labels'} as $key_2 => $value_2) {
                $values_2[$key_2] = $value_2;
            }
            $object->setLabels($values_2);
        }
        return $object;
    }
    public function normalize($object, $format = null, array $context = [])
    {
        $data = new \stdClass();
        if (null !== $object->getName()) {
            $data->{'Name'} = $object->getName();
        }
        if (null !== $object->getId()) {
            $data->{'Id'} = $object->getId();
        }
        if (null !== $object->getCreated()) {
            $data->{'Created'} = $object->getCreated();
        }
        if (null !== $object->getScope()) {
            $data->{'Scope'} = $object->getScope();
        }
        if (null !== $object->getDriver()) {
            $data->{'Driver'} = $object->getDriver();
        }
        if (null !== $object->getEnableIPv6()) {
            $data->{'EnableIPv6'} = $object->getEnableIPv6();
        }
        if (null !== $object->getIPAM()) {
            $data->{'IPAM'} = $this->normalizer->normalize($object->getIPAM(), 'json', $context);
        }
        if (null !== $object->getInternal()) {
            $data->{'Internal'} = $object->getInternal();
        }
        if (null !== $object->getAttachable()) {
            $data->{'Attachable'} = $object->getAttachable();
        }
        if (null !== $object->getIngress()) {
            $data->{'Ingress'} = $object->getIngress();
        }
        if (null !== $object->getContainers()) {
            $values = new \stdClass();
            foreach ($object->getContainers() as $key => $value) {
                $values->{$key} = $this->normalizer->normalize($value, 'json', $context);
            }
            $data->{'Containers'} = $values;
        }
        if (null !== $object->getOptions()) {
            $values_1 = new \stdClass();
            foreach ($object->getOptions() as $key_1 => $value_1) {
                $values_1->{$key_1} = $value_1;
            }
            $data->{'Options'} = $values_1;
        }
        if (null !== $object->getLabels()) {
            $values_2 = new \stdClass();
            foreach ($object->getLabels() as $key_2 => $value_2) {
                $values_2->{$key_2} = $value_2;
            }
            $data->{'Labels'} = $values_2;
        }
        return $data;
    }
}

?>