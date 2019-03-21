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
class VersionGetResponse200Normalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    public function supportsDenormalization($data, $type, $format = null)
    {
        return $type === 'Docker\\API\\Model\\VersionGetResponse200';
    }
    public function supportsNormalization($data, $format = null)
    {
        return $data instanceof \Docker\API\Model\VersionGetResponse200;
    }
    public function denormalize($data, $class, $format = null, array $context = [])
    {
        if (!is_object($data)) {
            return null;
        }
        $object = new \Docker\API\Model\VersionGetResponse200();
        if (property_exists($data, 'Platform') && $data->{'Platform'} !== null) {
            $object->setPlatform($this->denormalizer->denormalize($data->{'Platform'}, 'Docker\\API\\Model\\VersionGetResponse200Platform', 'json', $context));
        }
        if (property_exists($data, 'Components') && $data->{'Components'} !== null) {
            $values = [];
            foreach ($data->{'Components'} as $value) {
                $values[] = $this->denormalizer->denormalize($value, 'Docker\\API\\Model\\VersionGetResponse200ComponentsItem', 'json', $context);
            }
            $object->setComponents($values);
        }
        if (property_exists($data, 'Version') && $data->{'Version'} !== null) {
            $object->setVersion($data->{'Version'});
        }
        if (property_exists($data, 'ApiVersion') && $data->{'ApiVersion'} !== null) {
            $object->setApiVersion($data->{'ApiVersion'});
        }
        if (property_exists($data, 'MinAPIVersion') && $data->{'MinAPIVersion'} !== null) {
            $object->setMinAPIVersion($data->{'MinAPIVersion'});
        }
        if (property_exists($data, 'GitCommit') && $data->{'GitCommit'} !== null) {
            $object->setGitCommit($data->{'GitCommit'});
        }
        if (property_exists($data, 'GoVersion') && $data->{'GoVersion'} !== null) {
            $object->setGoVersion($data->{'GoVersion'});
        }
        if (property_exists($data, 'Os') && $data->{'Os'} !== null) {
            $object->setOs($data->{'Os'});
        }
        if (property_exists($data, 'Arch') && $data->{'Arch'} !== null) {
            $object->setArch($data->{'Arch'});
        }
        if (property_exists($data, 'KernelVersion') && $data->{'KernelVersion'} !== null) {
            $object->setKernelVersion($data->{'KernelVersion'});
        }
        if (property_exists($data, 'Experimental') && $data->{'Experimental'} !== null) {
            $object->setExperimental($data->{'Experimental'});
        }
        if (property_exists($data, 'BuildTime') && $data->{'BuildTime'} !== null) {
            $object->setBuildTime($data->{'BuildTime'});
        }
        return $object;
    }
    public function normalize($object, $format = null, array $context = [])
    {
        $data = new \stdClass();
        if (null !== $object->getPlatform()) {
            $data->{'Platform'} = $this->normalizer->normalize($object->getPlatform(), 'json', $context);
        }
        if (null !== $object->getComponents()) {
            $values = [];
            foreach ($object->getComponents() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $data->{'Components'} = $values;
        }
        if (null !== $object->getVersion()) {
            $data->{'Version'} = $object->getVersion();
        }
        if (null !== $object->getApiVersion()) {
            $data->{'ApiVersion'} = $object->getApiVersion();
        }
        if (null !== $object->getMinAPIVersion()) {
            $data->{'MinAPIVersion'} = $object->getMinAPIVersion();
        }
        if (null !== $object->getGitCommit()) {
            $data->{'GitCommit'} = $object->getGitCommit();
        }
        if (null !== $object->getGoVersion()) {
            $data->{'GoVersion'} = $object->getGoVersion();
        }
        if (null !== $object->getOs()) {
            $data->{'Os'} = $object->getOs();
        }
        if (null !== $object->getArch()) {
            $data->{'Arch'} = $object->getArch();
        }
        if (null !== $object->getKernelVersion()) {
            $data->{'KernelVersion'} = $object->getKernelVersion();
        }
        if (null !== $object->getExperimental()) {
            $data->{'Experimental'} = $object->getExperimental();
        }
        if (null !== $object->getBuildTime()) {
            $data->{'BuildTime'} = $object->getBuildTime();
        }
        return $data;
    }
}

?>