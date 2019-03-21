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
class SwarmJoinPostBodyNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    public function supportsDenormalization($data, $type, $format = null)
    {
        return $type === 'Docker\\API\\Model\\SwarmJoinPostBody';
    }
    public function supportsNormalization($data, $format = null)
    {
        return $data instanceof \Docker\API\Model\SwarmJoinPostBody;
    }
    public function denormalize($data, $class, $format = null, array $context = [])
    {
        if (!is_object($data)) {
            return null;
        }
        $object = new \Docker\API\Model\SwarmJoinPostBody();
        if (property_exists($data, 'ListenAddr') && $data->{'ListenAddr'} !== null) {
            $object->setListenAddr($data->{'ListenAddr'});
        }
        if (property_exists($data, 'AdvertiseAddr') && $data->{'AdvertiseAddr'} !== null) {
            $object->setAdvertiseAddr($data->{'AdvertiseAddr'});
        }
        if (property_exists($data, 'DataPathAddr') && $data->{'DataPathAddr'} !== null) {
            $object->setDataPathAddr($data->{'DataPathAddr'});
        }
        if (property_exists($data, 'RemoteAddrs') && $data->{'RemoteAddrs'} !== null) {
            $object->setRemoteAddrs($data->{'RemoteAddrs'});
        }
        if (property_exists($data, 'JoinToken') && $data->{'JoinToken'} !== null) {
            $object->setJoinToken($data->{'JoinToken'});
        }
        return $object;
    }
    public function normalize($object, $format = null, array $context = [])
    {
        $data = new \stdClass();
        if (null !== $object->getListenAddr()) {
            $data->{'ListenAddr'} = $object->getListenAddr();
        }
        if (null !== $object->getAdvertiseAddr()) {
            $data->{'AdvertiseAddr'} = $object->getAdvertiseAddr();
        }
        if (null !== $object->getDataPathAddr()) {
            $data->{'DataPathAddr'} = $object->getDataPathAddr();
        }
        if (null !== $object->getRemoteAddrs()) {
            $data->{'RemoteAddrs'} = $object->getRemoteAddrs();
        }
        if (null !== $object->getJoinToken()) {
            $data->{'JoinToken'} = $object->getJoinToken();
        }
        return $data;
    }
}

?>