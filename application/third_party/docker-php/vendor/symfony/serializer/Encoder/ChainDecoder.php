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
namespace Symfony\Component\Serializer\Encoder;

use Symfony\Component\Serializer\Exception\RuntimeException;
/**
 * Decoder delegating the decoding to a chain of decoders.
 *
 * @author Jordi Boggiano <j.boggiano@seld.be>
 * @author Johannes M. Schmitt <schmittjoh@gmail.com>
 * @author Lukas Kahwe Smith <smith@pooteeweet.org>
 *
 * @final
 */
class ChainDecoder implements ContextAwareDecoderInterface
{
    protected $decoders = array();
    protected $decoderByFormat = array();
    public function __construct(array $decoders = array())
    {
        $this->decoders = $decoders;
    }
    /**
     * {@inheritdoc}
     */
    public final function decode($data, $format, array $context = array())
    {
        return $this->getDecoder($format, $context)->decode($data, $format, $context);
    }
    /**
     * {@inheritdoc}
     */
    public function supportsDecoding($format, array $context = array())
    {
        try {
            $this->getDecoder($format, $context);
        } catch (RuntimeException $e) {
            return false;
        }
        return true;
    }
    /**
     * Gets the decoder supporting the format.
     *
     * @throws RuntimeException if no decoder is found
     */
    private function getDecoder(string $format, array $context) : DecoderInterface
    {
        if (isset($this->decoderByFormat[$format]) && isset($this->decoders[$this->decoderByFormat[$format]])) {
            return $this->decoders[$this->decoderByFormat[$format]];
        }
        foreach ($this->decoders as $i => $decoder) {
            if ($decoder->supportsDecoding($format, $context)) {
                $this->decoderByFormat[$format] = $i;
                return $decoder;
            }
        }
        throw new RuntimeException(sprintf('No decoder found for format "%s".', $format));
    }
}

?>