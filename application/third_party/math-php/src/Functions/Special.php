<?php

namespace MathPHP\Functions;

use MathPHP\Probability\Combinatorics;
use MathPHP\Functions\Map\Single;
use MathPHP\Exception;
class Special
{
    /**
     * Sign function (signum function) - sgn
     * Extracts the sign of a real number.
     * https://en.wikipedia.org/wiki/Sign_function
     *
     *          { -1 if x < 0
     * sgn(x) = {  0 if x = 0
     *          {  1 if x > 0
     *
     * @param float $x
     *
     * @return int
     */
    public static function signum(float $x) : int
    {
        if ($x == 0) {
            return 0;
        }
        return $x < 0 ? -1 : 1;
    }
    /**
     * Sign function (signum function) - sgn
     * Convenience wrapper for signum function.
     *
     * @param float $x
     *
     * @return int
     */
    public static function sgn(float $x) : int
    {
        return self::signum($x);
    }
    /**
     * Gamma function
     * https://en.wikipedia.org/wiki/Gamma_function
     * https://en.wikipedia.org/wiki/Particular_values_of_the_Gamma_function
     *
     * For postive integers:
     *  Γ(n) = (n - 1)!
     *
     * For half integers:
     *
     *             _   (2n)!
     * Γ(½ + n) = √π  -------
     *                 4ⁿ n!
     *
     * For real numbers: use Lanczos approximation
     *
     * @param number $n
     *
     * @return number
     */
    public static function gamma($n)
    {
        // Basic integer/factorial cases
        if ($n == 0) {
            return \INF;
        }
        // Negative integer, or negative int as a float (Ex: from beta(-0.1, -0.9) since it will call Γ(x + y))
        if ((is_int($n) || is_numeric($n) && abs($n - round($n)) < 1.0E-5) && $n < 0) {
            return -\INF;
        }
        // Positive integer, or postive int as a float (Ex: from beta(0.1, 0.9) since it will call Γ(x + y))
        if ((is_int($n) || is_numeric($n) && abs($n - round($n)) < 1.0E-5) && $n > 0) {
            return Combinatorics::factorial(round($n) - 1);
        }
        // Half integer cases (determine if int + 0.5)
        if (round($n * 2) / 2 / $n == 1) {
            // Compute parts of equation
            $π = \M_PI;
            $x = round($n - 0.5, 0);
            $√π = sqrt($π);
            if ($x == 0) {
                return $√π;
            }
            $⟮2n−1⟯‼︎ = Combinatorics::doubleFactorial(2 * $x - 1);
            /**
             * Put it all together
             *  _  (2n-1)!!
             * √π ---------
             *       2ⁿ
             */
            return $√π * ($⟮2n−1⟯‼︎ / 2 ** $x);
        }
        // Generic real number case
        return self::gammaLanczos($n);
    }
    /**
     * Gamma function convenience method
     *
     * @param number $n
     *
     * @return number
     */
    public static function Γ($n)
    {
        return self::gamma($n);
    }
    /**
     * Gamma function - Lanczos' approximation
     * https://en.wikipedia.org/wiki/Gamma_function
     * https://en.wikipedia.org/wiki/Lanczos_approximation
     *
     * For postive integers:
     *  Γ(n) = (n - 1)!
     *
     * If z is < 0.5, use reflection formula:
     *
     *                   π
     *  Γ(1 - z)Γ(z) = ------
     *                 sin πz
     *
     *  therefore:
     *
     *                π
     *  Γ(z) = -----------------
     *         sin πz * Γ(1 - z)
     *
     * otherwise:
     *              __  /        1 \ z+½
     *  Γ(z + 1) = √2π | z + g + -  |    e^-(z+g+½) A(z)
     *                  \        2 /
     *
     *  use pre-computed p coefficients: g = 7, n = 9
     *
     * @param number $z
     *
     * @return number
     */
    public static function gammaLanczos($z)
    {
        // Basic integer/factorial cases
        if ($z == 0) {
            return \INF;
        }
        // Negative integer, or negative int as a float
        if ((is_int($z) || is_numeric($z) && abs($z - round($z)) < 1.0E-5) && $z < 0) {
            return -\INF;
        }
        // Positive integer, or postive int as a float (Ex: from beta(0.1, 0.9) since it will call Γ(x + y))
        if ((is_int($z) || is_numeric($z) && abs($z - round($z)) < 1.0E-5) && $z > 0) {
            return Combinatorics::factorial(round($z) - 1);
        }
        // p coefficients: g = 7, n = 9
        $p = [0.9999999999998099, 676.5203681218851, -1259.1392167224028, 771.3234287776531, -176.6150291621406, 12.507343278686905, -0.13857109526572012, 9.984369578019572E-6, 1.5056327351493116E-7];
        $g = 7;
        $π = \M_PI;
        /**
         * Use reflection formula when z < 0.5
         *                π
         *  Γ(z) = -----------------
         *         sin πz * Γ(1 - z)
         */
        if ($z < 0.5) {
            $Γ⟮1 − z⟯ = self::gammaLanczos(1 - $z);
            return $π / (sin($π * $z) * $Γ⟮1 − z⟯);
        }
        // Standard Lanczos formula when z ≥ 0.5
        // Compute A(z)
        $z--;
        $A⟮z⟯ = $p[0];
        for ($i = 1; $i < count($p); $i++) {
            $A⟮z⟯ += $p[$i] / ($z + $i);
        }
        // Compute parts of equation
        $√2π = sqrt(2 * $π);
        $⟮z ＋ g ＋½⟯ᶻ⁺½ = pow($z + $g + 0.5, $z + 0.5);
        $ℯ＾−⟮z ＋ g ＋½⟯ = exp(-($z + $g + 0.5));
        /**
         * Put it all together:
         *   __  /        1 \ z+½
         *  √2π | z + g + -  |    e^-(z+g+½) A(z)
         *       \        2 /
         */
        return $√2π * $⟮z ＋ g ＋½⟯ᶻ⁺½ * $ℯ＾−⟮z ＋ g ＋½⟯ * $A⟮z⟯;
    }
    /**
     * Gamma function - Stirling approximation
     * https://en.wikipedia.org/wiki/Gamma_function
     * https://en.wikipedia.org/wiki/Stirling%27s_approximation
     * https://www.wolframalpha.com/input/?i=Gamma(n)&lk=3
     *
     * For postive integers:
     *  Γ(n) = (n - 1)!
     *
     * For positive real numbers -- approximation:
     *                   ___
     *         __       / 1  /         1      \ n
     *  Γ(n)≈ √2π ℯ⁻ⁿ  /  - | n + ----------- |
     *                √   n  \    12n - 1/10n /
     *
     * @param number $n
     *
     * @return number
     */
    public static function gammaStirling($n)
    {
        // Basic integer/factorial cases
        if ($n == 0) {
            return \INF;
        }
        // Negative integer, or negative int as a float
        if ((is_int($n) || is_numeric($n) && abs($n - round($n)) < 1.0E-5) && $n < 0) {
            return -\INF;
        }
        // Positive integer, or postive int as a float
        if ((is_int($n) || is_numeric($n) && abs($n - round($n)) < 1.0E-5) && $n > 0) {
            return Combinatorics::factorial(round($n) - 1);
        }
        // Compute parts of equation
        $√2π = sqrt(2 * \M_PI);
        $ℯ⁻ⁿ = exp(-$n);
        $√1／n = sqrt(1 / $n);
        $⟮n ＋ 1／⟮12n − 1／10n⟯⟯ⁿ = pow($n + 1 / (12 * $n - 1 / (10 * $n)), $n);
        /**
         * Put it all together:
         *                   ___
         *         __       / 1  /         1      \ n
         *  Γ(n)≈ √2π ℯ⁻ⁿ  /  - | n + ----------- |
         *                √   n  \    12n - 1/10n /
         */
        return $√2π * $ℯ⁻ⁿ * $√1／n * $⟮n ＋ 1／⟮12n − 1／10n⟯⟯ⁿ;
    }
    /**
     * Beta function
     *
     * https://en.wikipedia.org/wiki/Beta_function
     *
     *           Γ(x)Γ(y)
     * β(x, y) = --------
     *           Γ(x + y)
     *
     * @param  int $x
     * @param  int $y
     *
     * @return float
     */
    public static function beta($x, $y) : float
    {
        if ($x == 0 || $y == 0) {
            return \INF;
        }
        $Γ⟮x⟯Γ⟮y⟯ = self::gamma($x) * self::gamma($y);
        $Γ⟮x ＋ y⟯ = self::gamma($x + $y);
        return $Γ⟮x⟯Γ⟮y⟯ / $Γ⟮x ＋ y⟯;
    }
    /**
     * Beta function convenience method
     *
     * @param  int $x
     * @param  int $y
     *
     * @return float
     */
    public static function β($x, $y) : float
    {
        return self::beta($x, $y);
    }
    /**
     * Multivariate Beta function
     * https://en.wikipedia.org/wiki/Beta_function#Multivariate_beta_function
     *
     *                     Γ(α₁)Γ(α₂) ⋯ Γ(αn)
     * B(α₁, α₂, ... αn) = ------------------
     *                      Γ(α₁ + α₂ ⋯ αn)
     *
     * @param array float[] $αs
     *
     * @return float
     */
    public static function multivariateBeta(array $αs) : float
    {
        $∏Γ⟮α⟯ = 1;
        foreach ($αs as $α) {
            $∏Γ⟮α⟯ *= self::Γ($α);
        }
        $Γ⟮∑α⟯ = self::Γ(array_sum($αs));
        return $∏Γ⟮α⟯ / $Γ⟮∑α⟯;
    }
    /**
     * Logistic function (logistic sigmoid function)
     * A logistic function or logistic curve is a common "S" shape (sigmoid curve).
     * https://en.wikipedia.org/wiki/Logistic_function
     *
     *             L
     * f(x) = -----------
     *        1 + ℯ⁻ᵏ⁽ˣ⁻ˣ⁰⁾
     *
     *
     * @param number $x₀ x-value of the sigmoid's midpoint
     * @param number $L  the curve's maximum value
     * @param number $k  the steepness of the curve
     * @param number $x
     *
     * @return float
     */
    public static function logistic($x₀, $L, $k, $x)
    {
        $ℯ⁻ᵏ⁽ˣ⁻ˣ⁰⁾ = exp(-$k * ($x - $x₀));
        return $L / (1 + $ℯ⁻ᵏ⁽ˣ⁻ˣ⁰⁾);
    }
    /**
     * Sigmoid function
     * A sigmoid function is a mathematical function having an "S" shaped curve (sigmoid curve).
     * Often, sigmoid function refers to the special case of the logistic function
     * https://en.wikipedia.org/wiki/Sigmoid_function
     *
     *           1
     * S(t) = -------
     *        1 + ℯ⁻ᵗ
     *
     * @param  number $t
     *
     * @return float
     */
    public static function sigmoid($t)
    {
        $ℯ⁻ᵗ = exp(-$t);
        return 1 / (1 + $ℯ⁻ᵗ);
    }
    /**
     * Error function (Gauss error function)
     * https://en.wikipedia.org/wiki/Error_function
     *
     * This is an approximation of the error function (maximum error: 1.5×10−7)
     *
     * erf(x) ≈ 1 - (a₁t + a₂t² + a₃t³ + a₄t⁴ + a₅t⁵)ℯ^-x²
     *
     *       1
     * t = ------
     *     1 + px
     *
     * p = 0.3275911
     * a₁ = 0.254829592, a₂ = −0.284496736, a₃ = 1.421413741, a₄ = −1.453152027, a₅ = 1.061405429
     *
     * @param  number $x
     *
     * @return number
     */
    public static function errorFunction($x)
    {
        if ($x == 0) {
            return 0;
        }
        $p = 0.3275911;
        $t = 1 / (1 + $p * abs($x));
        $a₁ = 0.254829592;
        $a₂ = -0.284496736;
        $a₃ = 1.421413741;
        $a₄ = -1.453152027;
        $a₅ = 1.061405429;
        $error = 1 - ($a₁ * $t + $a₂ * $t ** 2 + $a₃ * $t ** 3 + $a₄ * $t ** 4 + $a₅ * $t ** 5) * exp(-abs($x) ** 2);
        return $x > 0 ? $error : -$error;
    }
    /**
     * Error function (Gauss error function)
     * Convenience method for errorFunction
     *
     * @param  number $x
     *
     * @return number
     */
    public static function erf($x)
    {
        return self::errorFunction($x);
    }
    /**
     * Complementary error function (erfc)
     * erfc(x) ≡ 1 - erf(x)
     *
     * @param  number $x
     *
     * @return number
     */
    public static function complementaryErrorFunction($x)
    {
        return 1 - self::erf($x);
    }
    /**
     * Complementary error function (erfc)
     * Convenience method for complementaryErrorFunction
     *
     * @param  number $x
     *
     * @return number
     */
    public static function erfc($x)
    {
        return 1 - self::erf($x);
    }
    /**
     * Upper Incomplete Gamma Function - Γ(s,x)
     * https://en.wikipedia.org/wiki/Incomplete_gamma_function
     *
     * @param number $s shape parameter > 0
     * @param number $x lower limit of integration
     *
     * @return number
     *
     * @throws Exception\OutOfBoundsException if s is <= 0
     */
    public static function upperIncompleteGamma($s, $x)
    {
        if ($s <= 0) {
            throw new Exception\OutOfBoundsException("S must be > 0. S = {$s}");
        }
        return self::gamma($s) - self::lowerIncompleteGamma($s, $x);
    }
    /**
     * Lower incomplete gamma function - γ(s, t)
     * https://en.wikipedia.org/wiki/Incomplete_gamma_function#Lower_incomplete_Gamma_function
     *
     * This function is exact for all integer multiples of .5
     * using the recurrance relation: γ⟮s+1,x⟯= s*γ⟮s,x⟯-xˢ*eˣ
     *
     * The function can be evaluated at other points using the series:
     *              zˢ     /      x          x²             x³            \
     * γ(s,x) =  -------- | 1 + ----- + ---------- + --------------- + ... |
     *            s * eˣ   \     s+1    (s+1)(s+2)   (s+1)(s+2)(s+3)      /
     *
     * @param  $s
     * @param  $x
     *
     * @return number
     */
    public static function lowerIncompleteGamma($s, $x)
    {
        if ($s == 1) {
            return 1 - exp(-1 * $x);
        }
        if ($s == 0.5) {
            $√π = sqrt(\M_PI);
            $√x = sqrt($x);
            return $√π * self::erf($√x);
        }
        if (round($s * 2, 0) == $s * 2) {
            return ($s - 1) * self::lowerIncompleteGamma($s - 1, $x) - $x ** ($s - 1) * exp(-1 * $x);
        }
        $tol = 1.0E-12;
        $xˢ∕s∕eˣ = $x ** $s / exp($x) / $s;
        $sum = 1;
        $fractions = [];
        $element = 1 + $tol;
        while ($element > $tol) {
            $fractions[] = $x / ++$s;
            $element = array_product($fractions);
            $sum += $element;
        }
        return $xˢ∕s∕eˣ * $sum;
    }
    /**
     * γ - Convenience method for lower incomplete gamma function
     * https://en.wikipedia.org/wiki/Incomplete_gamma_function#Lower_incomplete_Gamma_function
     *
     * @param  $s
     * @param  $x
     *
     * @return number
     */
    public static function γ($s, $x)
    {
        return self::lowerIncompleteGamma($s, $x);
    }
    /**
     * Incomplete Beta Function - B(x;a,b)
     *
     * Generalized form of the beta function
     * https://en.wikipedia.org/wiki/Beta_function#Incomplete_beta_function
     *
     * @param number $x Upper limit of the integration 0 ≦ x ≦ 1
     * @param number $a Shape parameter a > 0
     * @param number $b Shape parameter b > 0
     *
     * @return number
     */
    public static function incompleteBeta($x, $a, $b)
    {
        return self::regularizedIncompleteBeta($x, $a, $b) * self::beta($a, $b);
    }
    /**
     * Regularized incomplete beta function - Iₓ(a, b)
     *
     * A continuous fraction is used to evaluate I
     *
     *                      /      α₁       \
     *              xᵃyᵇ   |  -------------- |
     * Iₓ(a, b) = -------- |    β₁ +   α₂    |
     *             B(a,b)  |         ------  |
     *                      \        β₂ + … /
     *
     *                 (a + m - 1) * (a + b + m -1) * m * (b - m) * x²
     * α₁ = 1, αm+1 = -------------------------------------------------
     *                                (a + 2m - 1)²
     *
     *             m * (b - m) * x      (a + m) * (a - (a + b) * x + 1 + m * (2 - x))
     * βm+1 = m + ------------------ + -----------------------------------------------
     *              a + 2 * m - 1                      a + 2 * m + 1
     *
     * This algorithm is valid when both a and b are greater than 1
     *
     * @param int $m the number of α and β parameters to calculate
     * @param number $x Upper limit of the integration 0 ≦ x ≦ 1
     * @param number $a Shape parameter a > 1
     * @param number $b Shape parameter b > 1
     *
     * @return number
     */
    private static function iBetaCF(int $m, $x, $a, $b)
    {
        $limits = ['x' => '[0, 1]', 'a' => '(1,∞)', 'b' => '(1,∞)'];
        Support::checkLimits($limits, ['x' => $x, 'a' => $a, 'b' => $b]);
        $beta = self::beta($a, $b);
        $constant = $x ** $a * (1 - $x) ** $b / $beta;
        $α_array = [];
        $β_array = [];
        for ($i = 0; $i < $m; $i++) {
            if ($i == 0) {
                $α = 1;
            } else {
                $α = ($a + $i - 1) * ($a + $b + $i - 1) * $i * ($b - $i) * $x ** 2 / ($a + 2 * $i - 1) ** 2;
            }
            $β₁ = $i + $i * ($b - $i) * $x / ($a + 2 * $i - 1);
            $β₂ = ($a + $i) * ($a - ($a + $b) * $x + 1 + $i * (2 - $x)) / ($a + 2 * $i + 1);
            $β = $β₁ + $β₂;
            $α_array[] = $α;
            $β_array[] = $β;
        }
        $fraction_array = [];
        for ($i = $m - 1; $i >= 0; $i--) {
            if ($i == $m - 1) {
                $fraction_array[$i] = $α_array[$i] / $β_array[$i];
            } else {
                $fraction_array[$i] = $α_array[$i] / ($β_array[$i] + $fraction_array[$i + 1]);
            }
        }
        return $constant * $fraction_array[0];
    }
    /**
     * Regularized incomplete beta function - Iₓ(a, b)
     *
     * https://en.wikipedia.org/wiki/Beta_function#Incomplete_beta_function
     *
     * This function looks at the values of x, a, and b, and determines which algorithm is best to calculate
     * the value of Iₓ(a, b)
     *
     * http://www.boost.org/doc/libs/1_35_0/libs/math/doc/sf_and_dist/html/math_toolkit/special/sf_beta/ibeta_function.html
     * https://github.com/boostorg/math/blob/develop/include/boost/math/special_functions/beta.hpp
     *
     * @param number $x Upper limit of the integration 0 ≦ x ≦ 1
     * @param number $a Shape parameter a > 0
     * @param number $b Shape parameter b > 0
     *
     * @return number
     */
    public static function regularizedIncompleteBeta($x, $a, $b)
    {
        $limits = ['x' => '[0, 1]', 'a' => '(0,∞)', 'b' => '(0,∞)'];
        Support::checkLimits($limits, ['x' => $x, 'a' => $a, 'b' => $b]);
        if ($x == 1 || $x == 0) {
            return $x;
        }
        if ($a == 1) {
            return 1 - (1 - $x) ** $b;
        }
        if ($b == 1) {
            return $x ** $a;
        }
        if ($x > 0.9 || $b > $a && $x > 0.5) {
            $y = 1 - $x;
            return 1 - self::regularizedIncompleteBeta($y, $b, $a);
        }
        if ($a > 1 && $b > 1) {
            // Tolerance on evaluating the continued fraction.
            $tol = 1.0E-15;
            $dif = $tol + 1;
            // Initialize
            // We will calculate the continuous fraction with a minimum depth of 10.
            $m = 10;
            // Counter
            $I = 0;
            do {
                $I_new = self::iBetaCF($m, $x, $a, $b);
                if ($m > 10) {
                    $dif = abs(($I - $I_new) / $I_new);
                }
                $I = $I_new;
                $m++;
            } while ($dif > $tol);
            return $I;
        } else {
            if ($a <= 1) {
                // We shift a up by one, to the region that the continuous fraction works best.
                $offset = $x ** $a * (1 - $x) ** $b / $a / self::beta($a, $b);
                return self::regularizedIncompleteBeta($x, $a + 1, $b) + $offset;
            } else {
                // $b <= 1
                // We shift a up by one, to the region that the continuous fraction works best.
                $offset = $x ** $a * (1 - $x) ** $b / $b / self::beta($a, $b);
                return self::regularizedIncompleteBeta($x, $a, $b + 1) - $offset;
            }
        }
    }
    /**
     * Generalized Hypergeometric Function
     *
     * https://en.wikipedia.org/wiki/Generalized_hypergeometric_function
     *
     *                                       ∞
     *                                      ____
     *                                      \     ∏ap⁽ⁿ⁾ * zⁿ
     * pFq(a₁,a₂,...ap;b₁,b₂,...,bq;z)=      >    ------------
     *                                      /      ∏bq⁽ⁿ⁾ * n!
     *                                      ‾‾‾‾
     *                                       n=0
     *
     * Where a⁽ⁿ⁾ is the Pochhammer Function or Rising Factorial
     *
     * We are evaluating this as a series:
     *
     *               (a + n - 1) * z
     * ∏n = ∏n₋₁  * -----------------
     *               (b + n - 1) * n
     *
     *                  n   (a + n - 1) * z
     *   ₁F₁ = ₁F₁n₋₁ + ∏  -----------------  = ₁F₁n₋₁ + ∏n
     *                  1   (b + n - 1) * n
     *
     * @param int   $p      the number of parameters in the numerator
     * @param int   $q      the number of parameters in the denominator
     * @param array $params a collection of the a, b, and z parameters
     *
     * @return number
     *
     * @throws Exception\BadParameterException if the number of parameters is incorrect
     */
    public static function generalizedHypergeometric(int $p, int $q, ...$params)
    {
        $n = count($params);
        if ($n !== $p + $q + 1) {
            $expected_num_params = $p + $q + 1;
            throw new Exception\BadParameterException("Number of parameters is incorrect. Expected {$expected_num_params}; got {$n}");
        }
        $a = array_slice($params, 0, $p);
        $b = array_slice($params, $p, $q);
        $z = $params[$n - 1];
        $tol = 1.0E-8;
        $n = 1;
        $sum = 0;
        $product = 1;
        do {
            $sum += $product;
            $a_sum = array_product(Single::add($a, $n - 1));
            $b_sum = array_product(Single::add($b, $n - 1));
            $product *= $a_sum * $z / $b_sum / $n;
            $n++;
        } while ($product / $sum > $tol);
        return $sum;
    }
    /**
     * Confluent Hypergeometric Function
     *
     * https://en.wikipedia.org/wiki/Confluent_hypergeometric_function
     *         ∞
     *        ____
     *        \     a⁽ⁿ⁾ * zⁿ
     *  ₁F₁ =  >    ---------
     *        /     b⁽ⁿ⁾ * n!
     *        ‾‾‾‾
     *        n=0
     *
     * @param number $a the numerator value
     * @param number $b the denominator value
     * @param number $z
     *
     * @return number
     */
    public static function confluentHypergeometric($a, $b, $z)
    {
        return self::generalizedHypergeometric(1, 1, $a, $b, $z);
    }
    /**
     * Hypergeometric Function
     *
     * https://en.wikipedia.org/wiki/Hypergeometric_function
     *         ∞
     *        ____
     *        \     a⁽ⁿ⁾ * b⁽ⁿ⁾ * zⁿ
     *  ₂F₁ =  >    ----------------
     *        /         c⁽ⁿ⁾ * n!
     *        ‾‾‾‾
     *        n=0
     *
     * @param number $a the first numerator value
     * @param number $b the second numerator value
     * @param number $c the denominator value
     * @param number $z |z| < 1
     *
     * @return number
     *
     * @throws Exception\OutOfBoundsException if |z| >= 1
     */
    public static function hypergeometric($a, $b, $c, $z)
    {
        if (abs($z) >= 1) {
            throw new Exception\OutOfBoundsException('|z| must be < 1. |z| = ' . abs($z));
        }
        return self::generalizedHypergeometric(2, 1, $a, $b, $c, $z);
    }
    /**
     * Softmax (normalized exponential)
     * A generalization of the logistic function that "squashes" a K-dimensional
     * vector z of arbitrary real values to a K-dimensional vector σ(z) of real values
     * in the range (0, 1) that add up to 1.
     * https://en.wikipedia.org/wiki/Softmax_function
     *
     *           ℯᶻⱼ
     * σ(𝐳)ⱼ = ------  for j = 1 to K
     *          ᴷ
     *          ∑ ℯᶻᵢ
     *         ⁱ⁼¹
     *
     * @param  array  $𝐳
     *
     * @return array
     */
    public static function softmax(array $𝐳) : array
    {
        $ℯ = \M_E;
        $∑ᴷℯᶻᵢ = array_sum(array_map(function ($z) use($ℯ) {
            return $ℯ ** $z;
        }, $𝐳));
        $σ⟮𝐳⟯ⱼ = array_map(function ($z) use($ℯ, $∑ᴷℯᶻᵢ) {
            return $ℯ ** $z / $∑ᴷℯᶻᵢ;
        }, $𝐳);
        return $σ⟮𝐳⟯ⱼ;
    }
}

?>