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
namespace Phpml\CrossValidation;

use Phpml\Dataset\Dataset;
use Phpml\Exception\InvalidArgumentException;
abstract class Split
{
    /**
     * @var array
     */
    protected $trainSamples = [];
    /**
     * @var array
     */
    protected $testSamples = [];
    /**
     * @var array
     */
    protected $trainLabels = [];
    /**
     * @var array
     */
    protected $testLabels = [];
    public function __construct(Dataset $dataset, float $testSize = 0.3, ?int $seed = null)
    {
        if ($testSize <= 0 || $testSize >= 1) {
            throw InvalidArgumentException::percentNotInRange('testSize');
        }
        $this->seedGenerator($seed);
        $this->splitDataset($dataset, $testSize);
    }
    public function getTrainSamples() : array
    {
        return $this->trainSamples;
    }
    public function getTestSamples() : array
    {
        return $this->testSamples;
    }
    public function getTrainLabels() : array
    {
        return $this->trainLabels;
    }
    public function getTestLabels() : array
    {
        return $this->testLabels;
    }
    protected abstract function splitDataset(Dataset $dataset, float $testSize);
    protected function seedGenerator(?int $seed = null) : void
    {
        if ($seed === null) {
            mt_srand();
        } else {
            mt_srand($seed);
        }
    }
}

?>