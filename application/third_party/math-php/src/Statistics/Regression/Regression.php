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
namespace MathPHP\Statistics\Regression;

use MathPHP\Statistics\Average;
use MathPHP\Statistics\RandomVariable;
/**
 * Base class for regressions.
 */
abstract class Regression
{
    /**
     * Array of x and y points: [ [x, y], [x, y], ... ]
     * @var array
     */
    protected $points;
    /**
     * X values of the original points
     * @var array
     */
    protected $xs;
    /**
     * Y values of the original points
     * @var [type]
     */
    protected $ys;
    /**
     * Number of points
     * @var int
     */
    protected $n;
    /**
     * Constructor - Prepares the data arrays for regression analysis
     *
     * @param array $points [ [x, y], [x, y], ... ]
     */
    public function __construct(array $points)
    {
        $this->points = $points;
        $this->n = count($points);
        // Get list of x points and y points.
        // This will be fine for linear or polynomial regression, where there is only one x,
        // but if expanding to multiple linear, the format will have to change.
        $this->xs = array_map(function ($point) {
            return $point[0];
        }, $points);
        $this->ys = array_map(function ($point) {
            return $point[1];
        }, $points);
    }
    /**
     * Evaluate the regression equation at x
     * Uses the instance model's evaluateModel method.
     *
     * @param  number $x
     *
     * @return number
     */
    public function evaluate($x)
    {
        return $this->evaluateModel($x, $this->parameters);
    }
    /**
     * Get points
     *
     * @return array
     */
    public function getPoints() : array
    {
        return $this->points;
    }
    /**
     * Get Xs (x values of each point)
     *
     * @return array of x values
     */
    public function getXs() : array
    {
        return $this->xs;
    }
    /**
     * Get Ys (y values of each point)
     *
     * @return array of y values
     */
    public function getYs() : array
    {
        return $this->ys;
    }
    /**
     * Get sample size (number of points)
     *
     * @return int
     */
    public function getSampleSize() : int
    {
        return $this->n;
    }
    /**
     * Ŷ (yhat)
     * A list of the predicted values of Y given the regression.
     *
     * @return array
     */
    public function yHat()
    {
        return array_map([$this, 'evaluate'], $this->xs);
    }
}

?>