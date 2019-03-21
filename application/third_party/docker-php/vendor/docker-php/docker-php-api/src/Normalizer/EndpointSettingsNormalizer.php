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
class EndpointSettingsNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    public function supportsDenormalization($data, $type, $format = null)
    {
        return $type === 'Docker\\API\\Model\\EndpointSettings';
    }
    public function supportsNormalization($data, $format = null)
    {
        return $data instanceof \Docker\API\Model\EndpointSettings;
    }
    public function denormalize($data, $class, $format = null, array $context = [])
    {
        if (!is_object($data)) {
            return null;
        }
        $object = new \Docker\API\Model\EndpointSettings();
        if (property_exists($data, 'IPAMConfig') && $data->{'IPAMConfig'} !== null) {
            $object->setIPAMConfig($this->denormalizer->denormalize($data->{'IPAMConfig'}, 'Docker\\API\\Model\\EndpointIPAMConfig', 'json', $context));
        }
        if (property_exists($data, 'Links') && $data->{'Links'} !== null) {
            $values = [];
            foreach ($data->{'Links'} as $value) {
                $values[] = $value;
            }
            $object->setLinks($values);
        }
        if (property_exists($data, 'Aliases') && $data->{'Aliases'} !== null) {
            $values_1 = [];
            foreach ($data->{'Aliases'} as $value_1) {
                $values_1[] = $value_1;
            }
            $object->setAliases($values_1);
        }
        if (property_exists($data, 'NetworkID') && $data->{'NetworkID'} !== null) {
            $object->setNetworkID($data->{'NetworkID'});
        }
        if (property_exists($data, 'EndpointID') && $data->{'EndpointID'} !== null) {
            $object->setEndpointID($data->{'EndpointID'});
        }
        if (property_exists($data, 'Gateway') && $data->{'Gateway'} !== null) {
            $object->setGateway($data->{'Gateway'});
        }
        if (property_exists($data, 'IPAddress') && $data->{'IPAddress'} !== null) {
            $object->setIPAddress($data->{'IPAddress'});
        }
        if (property_exists($data, 'IPPrefixLen') && $data->{'IPPrefixLen'} !== null) {
            $object->setIPPrefixLen($data->{'IPPrefixLen'});
        }
        if (property_exists($data, 'IPv6Gateway') && $data->{'IPv6Gateway'} !== null) {
            $object->setIPv6Gateway($data->{'IPv6Gateway'});
        }
        if (property_exists($data, 'GlobalIPv6Address') && $data->{'GlobalIPv6Address'} !== null) {
            $object->setGlobalIPv6Address($data->{'GlobalIPv6Address'});
        }
        if (property_exists($data, 'GlobalIPv6PrefixLen') && $data->{'GlobalIPv6PrefixLen'} !== null) {
            $object->setGlobalIPv6PrefixLen($data->{'GlobalIPv6PrefixLen'});
        }
        if (property_exists($data, 'MacAddress') && $data->{'MacAddress'} !== null) {
            $object->setMacAddress($data->{'MacAddress'});
        }
        if (property_exists($data, 'DriverOpts') && $data->{'DriverOpts'} !== null) {
            $values_2 = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data->{'DriverOpts'} as $key => $value_2) {
                $values_2[$key] = $value_2;
            }
            $object->setDriverOpts($values_2);
        }
        return $object;
    }
    public function normalize($object, $format = null, array $context = [])
    {
        $data = new \stdClass();
        if (null !== $object->getIPAMConfig()) {
            $data->{'IPAMConfig'} = $this->normalizer->normalize($object->getIPAMConfig(), 'json', $context);
        }
        if (null !== $object->getLinks()) {
            $values = [];
            foreach ($object->getLinks() as $value) {
                $values[] = $value;
            }
            $data->{'Links'} = $values;
        }
        if (null !== $object->getAliases()) {
            $values_1 = [];
            foreach ($object->getAliases() as $value_1) {
                $values_1[] = $value_1;
            }
            $data->{'Aliases'} = $values_1;
        }
        if (null !== $object->getNetworkID()) {
            $data->{'NetworkID'} = $object->getNetworkID();
        }
        if (null !== $object->getEndpointID()) {
            $data->{'EndpointID'} = $object->getEndpointID();
        }
        if (null !== $object->getGateway()) {
            $data->{'Gateway'} = $object->getGateway();
        }
        if (null !== $object->getIPAddress()) {
            $data->{'IPAddress'} = $object->getIPAddress();
        }
        if (null !== $object->getIPPrefixLen()) {
            $data->{'IPPrefixLen'} = $object->getIPPrefixLen();
        }
        if (null !== $object->getIPv6Gateway()) {
            $data->{'IPv6Gateway'} = $object->getIPv6Gateway();
        }
        if (null !== $object->getGlobalIPv6Address()) {
            $data->{'GlobalIPv6Address'} = $object->getGlobalIPv6Address();
        }
        if (null !== $object->getGlobalIPv6PrefixLen()) {
            $data->{'GlobalIPv6PrefixLen'} = $object->getGlobalIPv6PrefixLen();
        }
        if (null !== $object->getMacAddress()) {
            $data->{'MacAddress'} = $object->getMacAddress();
        }
        if (null !== $object->getDriverOpts()) {
            $values_2 = new \stdClass();
            foreach ($object->getDriverOpts() as $key => $value_2) {
                $values_2->{$key} = $value_2;
            }
            $data->{'DriverOpts'} = $values_2;
        }
        return $data;
    }
}

?>