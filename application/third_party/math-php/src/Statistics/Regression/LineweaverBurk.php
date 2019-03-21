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

use MathPHP\Functions\Map\Single;
/**
 * Use the Lineweaver-Burk method to fit an equation of the form
 *       V * x
 * y = ----------
 *       K + x
 *
 * The equation is linearized and fit using Least Squares
 */
class LineweaverBurk extends ParametricRegression
{
    use Models\MichaelisMenten, Methods\LeastSquares;
    /**
     * Calculate the regression parameters by least squares on linearized data
     * y⁻¹ = K * V⁻¹ * x⁻¹ + V⁻¹
     */
    public function calculate()
    {
        // Linearize the relationship by taking the inverse of both x and y
        $x’ = Single::pow($this->xs, -1);
        $y’ = Single::pow($this->ys, -1);
        // Perform Least Squares Fit
        $linearized_parameters = $this->leastSquares($y’, $x’)->getColumn(0);
        // Translate the linearized parameters back.
        $V = 1 / $linearized_parameters[0];
        $K = $linearized_parameters[1] * $V;
        $this->parameters = [$V, $K];
    }
}

?>