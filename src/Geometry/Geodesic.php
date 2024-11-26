<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry;

use PHPCoord\CoordinateOperation\GeographicValue;
use PHPCoord\Datum\Ellipsoid;
use PHPCoord\UnitOfMeasure\Length\Length;
use PHPCoord\UnitOfMeasure\Length\Metre;

use function abs;
use function atan2;
use function cos;
use function count;
use function deg2rad;
use function fmod;
use function hypot;
use function intdiv;
use function max;
use function min;
use function range;
use function round;
use function sin;
use function sqrt;

use const M_PI;
use const PHP_FLOAT_EPSILON;
use const PHP_FLOAT_MIN;

/**
 * This is a cut-down and "PHP native" translation of the distance calculation code found inside GeographicLib,
 * Original author/copyright Charles Karney (2011-2022) released under MIT license.
 * https://geographiclib.sourceforge.io/.
 */
class Geodesic
{
    private float $a;
    private float $b;
    private float $f;
    private float $f1;
    private float $e2;
    private float $ep2;
    private float $n;

    /**
     * @var float[]
     */
    private array $a3Coefficients;

    /**
     * @var float[]
     */
    private array $c3Coefficients;

    public function __construct(Ellipsoid $ellipsoid)
    {
        $this->a = $ellipsoid->getSemiMajorAxis()->asMetres()->getValue();
        $this->b = $ellipsoid->getSemiMinorAxis()->asMetres()->getValue();
        $this->f = $ellipsoid->getFlattening();
        $this->f1 = 1 - $this->f;
        $this->e2 = $ellipsoid->getEccentricitySquared();
        $this->ep2 = $this->e2 / $this->f1 ** 2;
        $this->n = $this->f / (2 - $this->f);
        $this->a3Coefficients = $this->a3Coefficients();
        $this->c3Coefficients = $this->c3Coefficients();
    }

    /**
     * @return float[]
     */
    private function a3Coefficients(): array
    {
        $A3x = [];
        $coeff = [
            -3, 128,
            -2, -3, 64,
            -1, -3, -1, 16,
            3, -1, -2, 8,
            1, -1, 2,
            1, 1,
        ];
        $o = 0;
        $k = 0;
        foreach (range(5, 0, -1) as $j) {
            $m = min(5 - $j, $j);
            $A3x[$k] = polyVal($m, $coeff, $o, $this->n) / $coeff[$o + $m + 1];
            ++$k;
            $o += $m + 2;
        }

        return $A3x;
    }

    /**
     * @return float[]
     */
    private function c3Coefficients(): array
    {
        $C3x = [];

        $coeff = [
            3, 128,
            2, 5, 128,
            -1, 3, 3, 64,
            -1, 0, 1, 8,
            -1, 1, 4,
            5, 256,
            1, 3, 128,
            -3, -2, 3, 64,
            1, -3, 2, 32,
            7, 512,
            -10, 9, 384,
            5, -9, 5, 192,
            7, 512,
            -14, 7, 512,
            21, 2560,
        ];
        $o = 0;
        $k = 0;
        foreach (range(1, 5) as $l) {
            foreach (range(5, $l, -1) as $j) {
                $m = min(5 - $j, $j);
                $C3x[$k] = polyVal($m, $coeff, $o, $this->n) / $coeff[$o + $m + 1]; // @phpstan-ignore binaryOp.invalid
                ++$k;
                $o += $m + 2;
            }
        }

        return $C3x;
    }

    /**
     * @return float[]
     */
    private function c3(float $eps): array
    {
        $c = [];
        $mult = 1;
        $o = 0;
        foreach (range(1, 5) as $l) {
            $m = 5 - $l;
            $mult *= $eps;
            $c[$l] = $mult * polyVal($m, $this->c3Coefficients, $o, $eps);
            $o += $m + 1;
        }

        return $c;
    }

    /**
     * @return float[]
     */
    private function lengths(
        float $eps,
        float $sig12,
        float $ssig1,
        float $csig1,
        float $dn1,
        float $ssig2,
        float $csig2,
        float $dn2,
    ): array {
        $C1a = c1($eps);
        $C2a = c2($eps);
        $A1 = a1($eps);
        $A1 = 1 + $A1;
        $A2 = a2($eps);
        $A2 = 1 + $A2;
        $m0x = $A1 - $A2;
        $B1 = (sinCosSeries($ssig2, $csig2, $C1a) - sinCosSeries($ssig1, $csig1, $C1a));
        $B2 = (sinCosSeries($ssig2, $csig2, $C2a) - sinCosSeries($ssig1, $csig1, $C2a));
        $J12 = $m0x * $sig12 + ($A1 * $B1 - $A2 * $B2);
        $s12b = $A1 * ($sig12 + $B1);
        $m12b = ($dn2 * ($csig1 * $ssig2) - $dn1 * ($ssig1 * $csig2) - $csig1 * $csig2 * $J12);

        return [$s12b, $m12b];
    }

    /**
     * @return float[]
     */
    private function inverseStart(
        float $sbet1,
        float $cbet1,
        float $sbet2,
        float $cbet2,
        float $lam12,
        float $slam12,
        float $clam12,
    ): array {
        $sig12 = -1;
        $dnm = 1;
        $sbet12 = $sbet2 * $cbet1 - $cbet2 * $sbet1;
        $cbet12 = $cbet2 * $cbet1 + $sbet2 * $sbet1;
        $sbet12a = $sbet2 * $cbet1;
        $sbet12a += $cbet2 * $sbet1;

        $shortline = ($cbet12 >= 0 && $sbet12 < 0.5 && $cbet2 * $lam12 < 0.5);
        if ($shortline) {
            $sbetm2 = ($sbet1 + $sbet2) ** 2;
            $sbetm2 /= $sbetm2 + ($cbet1 + $cbet2) ** 2;
            $dnm = sqrt(1 + $this->ep2 * $sbetm2);
            $omg12 = $lam12 / ($this->f1 * $dnm);
            $somg12 = sin($omg12);
            $comg12 = cos($omg12);
        } else {
            $somg12 = $slam12;
            $comg12 = $clam12;
        }
        $salp1 = $cbet2 * $somg12;
        $calp1 = $comg12 >= 0 ?
          $sbet12 + $cbet2 * $sbet1 * $somg12 ** 2 / (1 + $comg12) : $sbet12a - $cbet2 * $sbet1 * $somg12 ** 2 / (1 - $comg12);

        $ssig12 = hypot($salp1, $calp1);
        $csig12 = $sbet1 * $sbet2 + $cbet1 * $cbet2 * $comg12;

        if ($shortline && $ssig12 < PHP_FLOAT_EPSILON) {
            $sig12 = atan2($ssig12, $csig12);
        } elseif (!(abs($this->n) >= 0.1 || $csig12 >= 0 || $ssig12 >= 6 * abs($this->n) * M_PI * $cbet1 ** 2)) {
            $lam12x = atan2(-$slam12, -$clam12);
            $k2 = $sbet1 ** 2 * $this->ep2;
            $eps = $k2 / (2 * (1 + sqrt(1 + $k2)) + $k2);
            $lamscale = $this->f * $cbet1 * polyVal(5, $this->a3Coefficients, 0, $eps) * M_PI;
            $betscale = $lamscale * $cbet1;
            $x = $lam12x / $lamscale;
            $y = $sbet12a / $betscale;

            if ($y > -PHP_FLOAT_EPSILON && $x > -1 - PHP_FLOAT_EPSILON) {
                $salp1 = min(1.0, -$x);
                $calp1 = -sqrt(1 - $salp1 ** 2);
            } else {
                $k = astroid($x, $y);
                $omg12a = $lamscale * ($this->f >= 0 ? -$x * $k / (1 + $k) : -$y * (1 + $k) / $k);
                $somg12 = sin($omg12a);
                $comg12 = -cos($omg12a);
                $salp1 = $cbet2 * $somg12;
                $calp1 = $sbet12a - $cbet2 * $sbet1 * $somg12 ** 2 / (1 - $comg12);
            }
        }
        if (!($salp1 <= 0)) {
            [$salp1, $calp1] = normalise($salp1, $calp1);
        } else {
            $salp1 = 1;
            $calp1 = 0;
        }

        return [$sig12, $salp1, $calp1, $dnm];
    }

    /**
     * @return float[]
     */
    private function lambda(
        float $sbet1,
        float $cbet1,
        float $dn1,
        float $sbet2,
        float $cbet2,
        float $dn2,
        float $salp1,
        float $calp1,
        float $slam120,
        float $clam120,
    ): array {
        if ($sbet1 == 0 && $calp1 == 0) {
            $calp1 = -PHP_FLOAT_MIN;
        }

        $salp0 = $salp1 * $cbet1;
        $calp0 = hypot($calp1, $salp1 * $sbet1);

        $ssig1 = $sbet1;
        $somg1 = $salp0 * $sbet1;
        $csig1 = $comg1 = $calp1 * $cbet1;
        [$ssig1, $csig1] = normalise($ssig1, $csig1);

        $calp2 = $cbet2 !== $cbet1 || abs($sbet2) !== -$sbet1 ?
            sqrt(($calp1 * $cbet1) ** 2 + ($cbet1 < -$sbet1 ?
                    ($cbet2 - $cbet1) * ($cbet1 + $cbet2) :
                    ($sbet1 - $sbet2) * ($sbet1 + $sbet2))) /
            $cbet2 : abs($calp1);

        $ssig2 = $sbet2;
        $somg2 = $salp0 * $sbet2;
        $csig2 = $comg2 = $calp2 * $cbet2;
        [$ssig2, $csig2] = normalise($ssig2, $csig2);

        $sig12 = atan2(
            max(0.0, $csig1 * $ssig2 - $ssig1 * $csig2),
            $csig1 * $csig2 + $ssig1 * $ssig2
        );

        $somg12 = max(0.0, $comg1 * $somg2 - $somg1 * $comg2);
        $comg12 = $comg1 * $comg2 + $somg1 * $somg2;
        $eta = atan2(
            $somg12 * $clam120 - $comg12 * $slam120,
            $comg12 * $clam120 + $somg12 * $slam120
        );

        $k2 = $calp0 ** 2 * $this->ep2;
        $eps = $k2 / (2 * (1 + sqrt(1 + $k2)) + $k2);
        $C3a = $this->c3($eps);
        $B312 = (sinCosSeries($ssig2, $csig2, $C3a) - sinCosSeries($ssig1, $csig1, $C3a));
        $domg12 = -$this->f * polyVal(5, $this->a3Coefficients, 0, $eps) * $salp0 * ($sig12 + $B312);
        $lam12 = $eta + $domg12;

        if ($calp2 == 0) {
            $dlam12 = -2 * $this->f1 * $dn1 / $sbet1;
        } else {
            [, $dlam12] = $this->lengths(
                $eps,
                $sig12,
                $ssig1,
                $csig1,
                $dn1,
                $ssig2,
                $csig2,
                $dn2,
            );
            $dlam12 *= $this->f1 / ($calp2 * $cbet2);
        }

        return [$lam12, $sig12, $ssig1, $csig1, $ssig2, $csig2, $eps, $dlam12];
    }

    public function distance(GeographicValue $from, GeographicValue $to): Length
    {
        $lon12 = abs(angleDiff($from->getLongitude()->asDegrees()->getValue(), $to->getLongitude()->asDegrees()->getValue()));
        $lam12 = deg2rad($lon12);
        [$slam12, $clam12] = sinCos($lon12);
        $lon12s = (180 - $lon12);

        $lat1 = $from->getLatitude()->asDegrees()->getValue();
        $lat2 = $to->getLatitude()->asDegrees()->getValue();
        $swapp = abs($lat1) < abs($lat2) ? -1 : 1;
        if ($swapp < 0) {
            [$lat2, $lat1] = [$lat1, $lat2];
        }
        $latsign = copySign(1, -$lat1);
        $lat1 *= $latsign;
        $lat2 *= $latsign;

        [$sbet1, $cbet1] = sinCos($lat1);
        $sbet1 *= $this->f1;
        [$sbet1, $cbet1] = normalise($sbet1, $cbet1);
        $cbet1 = max(PHP_FLOAT_MIN, $cbet1);

        [$sbet2, $cbet2] = sinCos($lat2);
        $sbet2 *= $this->f1;
        [$sbet2, $cbet2] = normalise($sbet2, $cbet2);
        $cbet2 = max(PHP_FLOAT_MIN, $cbet2);

        $dn1 = sqrt(1 + $this->ep2 * $sbet1 ** 2);
        $dn2 = sqrt(1 + $this->ep2 * $sbet2 ** 2);

        $meridian = $lat1 == -90 || $slam12 == 0;

        if ($meridian) {
            $calp1 = $clam12;
            $calp2 = 1.0;

            $ssig1 = $sbet1;
            $csig1 = $calp1 * $cbet1;
            $ssig2 = $sbet2;
            $csig2 = $calp2 * $cbet2;

            $sig12 = atan2(
                max(0.0, $csig1 * $ssig2 - $ssig1 * $csig2),
                $csig1 * $csig2 + $ssig1 * $ssig2
            );

            [$s12x] = $this->lengths(
                $this->n,
                $sig12,
                $ssig1,
                $csig1,
                $dn1,
                $ssig2,
                $csig2,
                $dn2,
            );
        } elseif ($sbet1 == 0 && $lon12s >= $this->f * 180) {
            $s12x = $this->a * $lam12;
        } else {
            [$sig12, $salp1, $calp1, $dnm] = $this->inverseStart(
                $sbet1,
                $cbet1,
                $sbet2,
                $cbet2,
                $lam12,
                $slam12,
                $clam12,
            );

            if ($sig12 >= 0) {
                $s12x = $sig12 * $this->b * $dnm;
            } else {
                $numit = 0;
                $tripn = $tripb = false;
                $salp1a = PHP_FLOAT_MIN;
                $calp1a = 1.0;
                $salp1b = PHP_FLOAT_MIN;
                $calp1b = -1.0;

                while ($numit < 20) {
                    [$v, $sig12, $ssig1, $csig1, $ssig2, $csig2,
                        $eps, $dv] = $this->lambda(
                            $sbet1,
                            $cbet1,
                            $dn1,
                            $sbet2,
                            $cbet2,
                            $dn2,
                            $salp1,
                            $calp1,
                            $slam12,
                            $clam12,
                        );
                    if ($tripb || !(abs($v) >= ($tripn ? 8 : 1) * PHP_FLOAT_EPSILON)) {
                        break;
                    }
                    if ($v > 0 && ($calp1 / $salp1 > $calp1b / $salp1b)) {
                        $salp1b = $salp1;
                        $calp1b = $calp1;
                    } elseif ($v < 0 && ($calp1 / $salp1 < $calp1a / $salp1a)) {
                        $salp1a = $salp1;
                        $calp1a = $calp1;
                    }

                    ++$numit;
                    if ($dv > 0) {
                        $dalp1 = -$v / $dv;
                        $sdalp1 = sin($dalp1);
                        $cdalp1 = cos($dalp1);
                        $nsalp1 = $salp1 * $cdalp1 + $calp1 * $sdalp1;
                        if ($nsalp1 > 0 && abs($dalp1) < M_PI) {
                            $calp1 = $calp1 * $cdalp1 - $salp1 * $sdalp1;
                            $salp1 = $nsalp1;
                            [$salp1, $calp1] = normalise($salp1, $calp1);
                            $tripn = abs($v) <= 16 * PHP_FLOAT_EPSILON;
                            continue;
                        }
                    }
                    $salp1 = ($salp1a + $salp1b) / 2;
                    $calp1 = ($calp1a + $calp1b) / 2;
                    [$salp1, $calp1] = normalise($salp1, $calp1);
                    $tripn = false;
                    $tripb = (abs($salp1a - $salp1) + ($calp1a - $calp1) < PHP_FLOAT_EPSILON
                        || abs($salp1 - $salp1b) + ($calp1 - $calp1b) < PHP_FLOAT_EPSILON);
                }
                [$s12x] = $this->lengths(
                    $eps,
                    $sig12,
                    $ssig1,
                    $csig1,
                    $dn1,
                    $ssig2,
                    $csig2,
                    $dn2,
                );

                $s12x *= $this->b;
            }
        }

        return new Metre($s12x);
    }
}

function copySign(float $x, float $y): float
{
    if ($y >= 0) {
        return abs($x);
    } else {
        return -abs($x);
    }
}

/**
 * @return float[]
 */
function normalise(float $x, float $y): array
{
    $r = hypot($x, $y);

    return [$x / $r, $y / $r];
}

/**
 * @param float[] $p
 */
function polyVal(int $N, array $p, int $s, float $x): float
{
    $y = $p[$s];
    while ($N > 0) {
        --$N;
        ++$s;
        $y = $y * $x + $p[$s];
    }

    return $y;
}

function angleDiff(float $x, float $y): float
{
    $d = ($y - $x);
    if ($d < -180) {
        $d += 360;
    }

    return $d;
}

/**
 * @return float[]
 */
function sinCos(float $x): array
{
    $r = fmod($x, 360);
    $q = (int) round($r / 90);
    $r -= 90 * $q;
    $r = deg2rad($r);
    $s = sin($r);
    $c = cos($r);
    $q %= 4;
    if ($q < 0) {
        $q += 4;
    }
    if ($q == 1) {
        [$s, $c] = [$c, -$s];
    } elseif ($q == 2) {
        [$s, $c] = [-$s, -$c];
    } elseif ($q == 3) {
        [$s, $c] = [-$c, $s];
    }

    return [$s, $c];
}

/**
 * @param float[] $c
 */
function sinCosSeries(float $sinx, float $cosx, array $c): float
{
    $k = count($c);
    $n = $k - 1;
    $ar = 2 * ($cosx - $sinx) * ($cosx + $sinx);
    $y1 = 0;
    if ($n & 1) {
        --$k;
        $y0 = $c[$k];
    } else {
        $y0 = 0;
    }
    $n = intdiv($n, 2);
    while ($n--) {
        --$k;
        $y1 = $ar * $y0 - $y1 + $c[$k];
        --$k;
        $y0 = $ar * $y1 - $y0 + $c[$k];
    }

    return 2 * $sinx * $cosx * $y0;
}

function astroid(float $x, float $y): float
{
    $p = $x ** 2;
    $q = $y ** 2;
    $r = ($p + $q - 1) / 6;
    if (!($q == 0 && $r <= 0)) {
        $S = $p * $q / 4;
        $r2 = $r ** 2;
        $r3 = $r * $r2;
        $disc = $S * ($S + 2 * $r3);
        $u = $r;
        if ($disc >= 0) {
            $T3 = $S + $r3;
            $T3 += $T3 < 0 ? -sqrt($disc) : sqrt($disc);
            $T = ($T3 ** (1 / 3));
            $u += $T != 0 ? ($T + ($r2 / $T)) : 0;
        } else {
            $ang = atan2(sqrt(-$disc), -($S + $r3));
            $u += 2 * $r * cos($ang / 3);
        }
        $v = sqrt($u ** 2 + $q);
        $uv = $u < 0 ? ($q / ($v - $u)) : $u + $v;
        $w = ($uv - $q) / (2 * $v);
        $k = $uv / (sqrt($uv + $w ** 2) + $w);
    } else {
        $k = 0;
    }

    return $k;
}

function a1(float $eps): float
{
    $coeff = [
        1, 4, 64, 0, 256,
    ];
    $t = polyVal(3, $coeff, 0, $eps ** 2) / 256;

    return ($t + $eps) / (1 - $eps);
}

/**
 * @return float[]
 */
function c1(float $eps): array
{
    $c = [];
    $coeff = [
        -1, 6, -16, 32,
        -9, 64, -128, 2048,
        9, -16, 768,
        3, -5, 512,
        -7, 1280,
        -7, 2048,
    ];
    $d = $eps;
    $o = 0;
    foreach (range(1, 6) as $l) {
        $m = intdiv(6 - $l, 2);
        $c[$l] = $d * polyVal($m, $coeff, $o, $eps ** 2) / $coeff[$o + $m + 1];
        $o += $m + 2;
        $d *= $eps;
    }

    return $c;
}

function a2(float $eps): float
{
    $coeff = [
        -11, -28, -192, 0, 256,
    ];
    $t = polyVal(3, $coeff, 0, $eps ** 2) / $coeff[4];

    return ($t - $eps) / (1 + $eps);
}

/**
 * @return float[]
 */
function c2(float $eps): array
{
    $c = [];
    $coeff = [
        1, 2, 16, 32,
        35, 64, 384, 2048,
        15, 80, 768,
        7, 35, 512,
        63, 1280,
        77, 2048,
    ];
    $d = $eps;
    $o = 0;
    foreach (range(1, 6) as $l) {
        $m = intdiv(6 - $l, 2);
        $c[$l] = $d * polyVal($m, $coeff, $o, $eps ** 2) / $coeff[$o + $m + 1];
        $o += $m + 2;
        $d *= $eps;
    }

    return $c;
}
