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
class ContainersIdExecPostBodyNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    public function supportsDenormalization($data, $type, $format = null)
    {
        return $type === 'Docker\\API\\Model\\ContainersIdExecPostBody';
    }
    public function supportsNormalization($data, $format = null)
    {
        return $data instanceof \Docker\API\Model\ContainersIdExecPostBody;
    }
    public function denormalize($data, $class, $format = null, array $context = [])
    {
        if (!is_object($data)) {
            return null;
        }
        $object = new \Docker\API\Model\ContainersIdExecPostBody();
        if (property_exists($data, 'AttachStdin') && $data->{'AttachStdin'} !== null) {
            $object->setAttachStdin($data->{'AttachStdin'});
        }
        if (property_exists($data, 'AttachStdout') && $data->{'AttachStdout'} !== null) {
            $object->setAttachStdout($data->{'AttachStdout'});
        }
        if (property_exists($data, 'AttachStderr') && $data->{'AttachStderr'} !== null) {
            $object->setAttachStderr($data->{'AttachStderr'});
        }
        if (property_exists($data, 'DetachKeys') && $data->{'DetachKeys'} !== null) {
            $object->setDetachKeys($data->{'DetachKeys'});
        }
        if (property_exists($data, 'Tty') && $data->{'Tty'} !== null) {
            $object->setTty($data->{'Tty'});
        }
        if (property_exists($data, 'Env') && $data->{'Env'} !== null) {
            $values = [];
            foreach ($data->{'Env'} as $value) {
                $values[] = $value;
            }
            $object->setEnv($values);
        }
        if (property_exists($data, 'Cmd') && $data->{'Cmd'} !== null) {
            $values_1 = [];
            foreach ($data->{'Cmd'} as $value_1) {
                $values_1[] = $value_1;
            }
            $object->setCmd($values_1);
        }
        if (property_exists($data, 'Privileged') && $data->{'Privileged'} !== null) {
            $object->setPrivileged($data->{'Privileged'});
        }
        if (property_exists($data, 'User') && $data->{'User'} !== null) {
            $object->setUser($data->{'User'});
        }
        if (property_exists($data, 'WorkingDir') && $data->{'WorkingDir'} !== null) {
            $object->setWorkingDir($data->{'WorkingDir'});
        }
        return $object;
    }
    public function normalize($object, $format = null, array $context = [])
    {
        $data = new \stdClass();
        if (null !== $object->getAttachStdin()) {
            $data->{'AttachStdin'} = $object->getAttachStdin();
        }
        if (null !== $object->getAttachStdout()) {
            $data->{'AttachStdout'} = $object->getAttachStdout();
        }
        if (null !== $object->getAttachStderr()) {
            $data->{'AttachStderr'} = $object->getAttachStderr();
        }
        if (null !== $object->getDetachKeys()) {
            $data->{'DetachKeys'} = $object->getDetachKeys();
        }
        if (null !== $object->getTty()) {
            $data->{'Tty'} = $object->getTty();
        }
        if (null !== $object->getEnv()) {
            $values = [];
            foreach ($object->getEnv() as $value) {
                $values[] = $value;
            }
            $data->{'Env'} = $values;
        }
        if (null !== $object->getCmd()) {
            $values_1 = [];
            foreach ($object->getCmd() as $value_1) {
                $values_1[] = $value_1;
            }
            $data->{'Cmd'} = $values_1;
        }
        if (null !== $object->getPrivileged()) {
            $data->{'Privileged'} = $object->getPrivileged();
        }
        if (null !== $object->getUser()) {
            $data->{'User'} = $object->getUser();
        }
        if (null !== $object->getWorkingDir()) {
            $data->{'WorkingDir'} = $object->getWorkingDir();
        }
        return $data;
    }
}

?>