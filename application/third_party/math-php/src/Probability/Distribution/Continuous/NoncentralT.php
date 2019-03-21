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
namespace MathPHP\Probability\Distribution\Continuous;

use MathPHP\Functions\Special;
use MathPHP\Functions\Support;
use MathPHP\Probability\Combinatorics;
use MathPHP\Probability\Distribution\Continuous\StandardNormal;
/**
 * Noncentral t-distribution
 * https://en.wikipedia.org/wiki/Noncentral_t-distribution
 */
class NoncentralT extends Continuous
{
    /**
     * Distribution parameter bounds limits
     * ν ∈ (0,∞)
     * μ ∈ (-∞,∞)
     * @var array
     */
    const PARAMETER_LIMITS = ['ν' => '(0,∞)', 'μ' => '(-∞,∞)'];
    /**
     * Distribution support bounds limits
     * x ∈ (-∞,∞)
     * @var array
     */
    const SUPPORT_LIMITS = ['x' => '(-∞,∞)'];
    /** @var int degrees of freedom > 0 */
    protected $ν;
    /** @var float Noncentrality parameter */
    protected $μ;
    /**
     * Constructor
     *
     * @param int    $ν degrees of freedom > 0
     * @param number $μ Noncentrality parameter
     */
    public function __construct(int $ν, $μ)
    {
        parent::__construct($ν, $μ);
    }
    /**
     * Probability density function
     *
     *   /v\                /   μ²\
     *  | - |              |-1*--- |                        / ν    3     μ²x²   \            / ν + 1    1     μ²x²   \   \
     *   \2/                \   2 /           /         ₁F₁|  - ;  - ; --------- |       ₁F₁|  ----- ;  - ; --------- |   |
     *  ν    * Γ(ν + 1) * e                  |              \ 2    2   2(ν + x²)/            \   2      2   2(ν + x²)/    |
     * ---------------------------------  *  | √2*μ*x * ---------------------------  +  --------------------------------  |
     *  ν           (ν / 2)                  |                        / ν + 1 \                         / ν    \          |
     * 2  * (ν + x²)         * Γ(ν / 2)      |           (ν + x²) * Γ|  ------ |          √(ν + x²) * Γ|  - + 1 |         |
     *                                        \                       \   2   /                         \ 2    /         /
     *
     * @param float $x percentile
     *
     * @return number
     */
    public function pdf(float $x)
    {
        Support::checkLimits(self::SUPPORT_LIMITS, ['x' => $x]);
        $ν = $this->ν;
        $μ = $this->μ;
        $part1 = $ν ** ($ν / 2) * Special::gamma($ν + 1) * exp(-1 * $μ ** 2 / 2) / 2 ** $ν / ($ν + $x ** 2) ** ($ν / 2) / Special::gamma($ν / 2);
        $F1 = $ν / 2 + 1;
        $F2 = 3 / 2;
        $F3 = $μ ** 2 * $x ** 2 / 2 / ($ν + $x ** 2);
        $inner_part1 = sqrt(2) * $μ * $x * Special::confluentHypergeometric($F1, $F2, $F3) / ($ν + $x ** 2) / Special::gamma(($ν + 1) / 2);
        $F1 = ($ν + 1) / 2;
        $F2 = 1 / 2;
        $inner_part2 = Special::confluentHypergeometric($F1, $F2, $F3) / sqrt($ν + $x ** 2) / Special::gamma($ν / 2 + 1);
        return $part1 * ($inner_part1 + $inner_part2);
    }
    /**
     * Cumulative distribution function
     *
     * Fᵥ,ᵤ(x) = Fᵥ,ᵤ(x),      if x ≥ 0
     *         = 1 - Fᵥ,₋ᵤ(x)  if x < 0
     *
     * @param float $x
     *
     * @return number
     */
    public function cdf(float $x)
    {
        Support::checkLimits(self::SUPPORT_LIMITS, ['x' => $x]);
        $ν = $this->ν;
        $μ = $this->μ;
        if ($μ == 0) {
            $studentT = new StudentT($ν);
            return $studentT->cdf($x);
        }
        if ($x >= 0) {
            return $this->f($x, $ν, $μ);
        }
        return 1 - $this->f($x, $ν, -$μ);
    }
    /**
     * F used within CDF
     *                          _                                        _
     *                   1  ∞  |        /    1  ν \          /       ν \  |
     * Fᵥ,ᵤ(x) = Φ(-μ) + -  ∑  |  pⱼIy | j + -, -  | + qⱼIy | j + 1, -  | |
     *                   2 ʲ⁼⁰ |_       \    2  2 /          \       2 / _|
     *
     *  where
     *   Φ       = cumulative distribution function of the standard normal distribution
     *   Iy(a,b) = regularized incomplete beta function
     *
     *          x²
     *   y = ------
     *       x² + ν
     *
     *        1      /  μ² \   / μ² \ʲ
     *   pⱼ = -- exp| - -   | |  -   |
     *        j!     \  2  /   \ 2  /
     *
     *              μ          /  μ² \   / μ² \ʲ
     *   qⱼ = ------------ exp| - -   | |  -   |
     *        √2Γ(j + 3/2)     \  2  /   \ 2  /
     *
     * @param number $x
     * @param int    $ν
     * @param number $μ
     *
     * @return number
     */
    private function f($x, int $ν, $μ)
    {
        $standardNormal = new StandardNormal();
        $Φ = $standardNormal->cdf(-$μ);
        $y = $x ** 2 / ($x ** 2 + $ν);
        $sum = $Φ;
        $tol = 1.0E-8;
        $j = 0;
        do {
            $exp = exp(-1 * $μ ** 2 / 2) * ($μ ** 2 / 2) ** $j;
            $pⱼ = 1 / Combinatorics::factorial($j) * $exp;
            $qⱼ = $μ / sqrt(2) / Special::gamma($j + 3 / 2) * $exp;
            $I1 = Special::regularizedIncompleteBeta($y, $j + 1 / 2, $ν / 2);
            $I2 = Special::regularizedIncompleteBeta($y, $j + 1, $ν / 2);
            $delta = $pⱼ * $I1 + $qⱼ * $I2;
            $sum += $delta / 2;
            $j += 1;
        } while ($delta / $sum > $tol || $j < 10);
        return $sum;
    }
    /**
     * Mean of the distribution
     *            _
     *           /ν Γ((ν - 1)/2)
     * E[T] = μ / - ------------    if ν > 1
     *         √  2    Γ(ν/2)
     *
     *      = Does not exist        if ν ≤ 1
     *
     * @return number
     */
    public function mean()
    {
        $ν = $this->ν;
        $μ = $this->μ;
        if ($ν == 1) {
            return \NAN;
        }
        return $μ * sqrt($ν / 2) * Special::gamma(($ν - 1) / 2) / Special::gamma($ν / 2);
    }
}

?>