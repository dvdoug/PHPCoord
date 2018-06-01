<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord;

/**
 * ECEF Cartesian coordinate.
 *
 * @author Doug Wright
 */
class Cartesian
{
    /**
     * X co-ordinate in metres.
     *
     * @var float
     */
    protected $x;

    /**
     * Y co-ordinate in metres.
     *
     * @var float
     */
    protected $y;

    /**
     * Z co-ordinate in metres.
     *
     * @var float
     */
    protected $z;

    /**
     * Reference ellipsoid used in this datum.
     *
     * @var RefEll
     */
    protected $refEll;

    /**
     * Cartesian constructor.
     *
     * @param int    $x
     * @param int    $y
     * @param int    $z
     * @param RefEll $refEll
     */
    public function __construct(float $x, float $y, float $z, RefEll $refEll)
    {
        $this->x = $x;
        $this->y = $y;
        $this->z = $z;
        $this->refEll = $refEll;
    }

    /**
     * String version of coordinate.
     *
     * @return string
     */
    public function __toString(): string
    {
        return "({$this->x}, {$this->y}, {$this->z})";
    }

    /**
     * @return float
     */
    public function getX(): float
    {
        return $this->x;
    }

    /**
     * @return float
     */
    public function getY(): float
    {
        return $this->y;
    }

    /**
     * @return float
     */
    public function getZ(): float
    {
        return $this->z;
    }

    /**
     * @return RefEll
     */
    public function getRefEll(): RefEll
    {
        return $this->refEll;
    }

    /**
     * Convert these coordinates into a latitude, longitude
     * Formula for transformation is taken from OS document
     * "A Guide to Coordinate Systems in Great Britain".
     *
     * @return LatLng
     */
    public function toLatitudeLongitude(): LatLng
    {
        $lambda = rad2deg(atan2($this->y, $this->x));

        $p = sqrt(pow($this->x, 2) + pow($this->y, 2));

        $phi = atan($this->z / ($p * (1 - $this->refEll->getEcc())));

        do {
            $phi1 = $phi;
            $v = $this->refEll->getMaj() / (sqrt(1 - $this->refEll->getEcc() * pow(sin($phi), 2)));
            $phi = atan(($this->z + ($this->refEll->getEcc() * $v * sin($phi))) / $p);
        } while (abs($phi - $phi1) >= 0.00001);

        $h = (int) round($p / cos($phi) - $v);

        $phi = rad2deg($phi);

        return new LatLng($phi, $lambda, $h, $this->refEll);
    }

    /**
     * Convert a latitude, longitude height to x, y, z
     * Formula for transformation is taken from OS document
     * "A Guide to Coordinate Systems in Great Britain".
     *
     * @param LatLng $latLng
     *
     * @return Cartesian
     */
    public static function fromLatLong(LatLng $latLng): self
    {
        $a = $latLng->getRefEll()->getMaj();
        $eSquared = $latLng->getRefEll()->getEcc();
        $phi = deg2rad($latLng->getLat());
        $lambda = deg2rad($latLng->getLng());

        $v = $a / (sqrt(1 - $eSquared * pow(sin($phi), 2)));
        $x = ($v + $latLng->getH()) * cos($phi) * cos($lambda);
        $y = ($v + $latLng->getH()) * cos($phi) * sin($lambda);
        $z = ((1 - $eSquared) * $v + $latLng->getH()) * sin($phi);

        return new static($x, $y, $z, $latLng->getRefEll());
    }

    /**
     * Transform the datum used for these coordinates by using a Helmert Transform.
     *
     * @param RefEll $toRefEll
     * @param float  $tranX
     * @param float  $tranY
     * @param float  $tranZ
     * @param float  $scale
     * @param float  $rotX     rotation about x-axis in radians
     * @param float  $rotY     rotation about y-axis in radians
     * @param float  $rotZ     rotation about z-axis in radians
     *
     * @return Cartesian
     */
    public function transformDatum(
        RefEll $toRefEll,
        float $tranX,
        float $tranY,
        float $tranZ,
        float $scale,
        float $rotX,
        float $rotY,
        float $rotZ): self
    {
        $x = $tranX + ($this->getX() * (1 + $scale)) - ($this->getY() * $rotZ) + ($this->getZ() * $rotY);
        $y = $tranY + ($this->getX() * $rotZ) + ($this->getY() * (1 + $scale)) - ($this->getZ() * $rotX);
        $z = $tranZ - ($this->getX() * $rotY) + ($this->getY() * $rotX) + ($this->getZ() * (1 + $scale));

        return new static($x, $y, $z, $toRefEll);
    }
}
