<?php
/**
 * PHPCoord
 * @package PHPCoord
 * @author Doug Wright
 */
namespace PHPCoord;

/**
 * ECEF Cartesian coordinate
 * @author Doug Wright
 * @package PHPCoord
 */
class Cartesian
{

    /**
     * X
     * @var float
     */
    protected $x;

    /**
     * Y
     * @var float
     */
    protected $y;

    /**
     * Z
     * @var float
     */
    protected $z;

    /**
     * Reference ellipsoid used in this datum
     * @var RefEll
     */
    protected $refEll;

    /**
     * Cartesian constructor.
     * @param float $x
     * @param float $y
     * @param float $z
     * @param RefEll $refEll
     */
    public function __construct($x, $y, $z, RefEll $refEll)
    {
        $this->setX($x);
        $this->setY($y);
        $this->setZ($z);
        $this->setRefEll($refEll);
    }

    /**
     * String version of coordinate.
     * @return string
     */
    public function __toString()
    {
        return "({$this->x}, {$this->y}, {$this->z})";
    }

    /**
     * @return float
     */
    public function getX()
    {
        return $this->x;
    }

    /**
     * @param float $x
     */
    public function setX($x)
    {
        $this->x = $x;
    }

    /**
     * @return float
     */
    public function getY()
    {
        return $this->y;
    }

    /**
     * @param float $y
     */
    public function setY($y)
    {
        $this->y = $y;
    }

    /**
     * @return float
     */
    public function getZ()
    {
        return $this->z;
    }

    /**
     * @param float $z
     */
    public function setZ($z)
    {
        $this->z = $z;
    }

    /**
     * @return RefEll
     */
    public function getRefEll()
    {
        return $this->refEll;
    }

    /**
     * @param RefEll $refEll
     */
    public function setRefEll($refEll)
    {
        $this->refEll = $refEll;
    }

    /**
     * Convert these coordinates into a latitude, longitude
     * Formula for transformation is taken from OS document
     * "A Guide to Coordinate Systems in Great Britain"
     *
     * @return LatLng
     */
    public function toLatitudeLongitude()
    {

        $lambda = rad2deg(atan2($this->y, $this->x));

        $p = sqrt(pow($this->x, 2) + pow($this->y, 2));

        $phi = atan($this->z / ($p * (1 - $this->refEll->getEcc())));

        do {
            $phi1 = $phi;
            $v = $this->refEll->getMaj() / (sqrt(1 - $this->refEll->getEcc() * pow(sin($phi), 2)));
            $phi = atan(($this->z + ($this->refEll->getEcc() * $v * sin($phi))) / $p);
        } while (abs($phi - $phi1) >= 0.00001);

        $h = $p / cos($phi) - $v;

        $phi = rad2deg($phi);

        return new LatLng($phi, $lambda, $h, $this->refEll);
    }

    /**
     * Convert a latitude, longitude height to x, y, z
     * Formula for transformation is taken from OS document
     * "A Guide to Coordinate Systems in Great Britain"
     *
     * @param LatLng $latLng
     * @return Cartesian
     */
    public static function fromLatLong(LatLng $latLng)
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
     * Transform the datum used for these coordinates by using a Helmert Transform
     * @param RefEll $toRefEll
     * @param float $tranX
     * @param float $tranY
     * @param float $tranZ
     * @param float $scale
     * @param float $rotX  rotation about x-axis in radians
     * @param float $rotY  rotation about y-axis in radians
     * @param float $rotZ  rotation about z-axis in radians
     * @return mixed
     */
    public function transformDatum(RefEll $toRefEll, $tranX, $tranY, $tranZ, $scale, $rotX, $rotY, $rotZ)
    {

        $x = $tranX + ($this->getX() * (1 + $scale)) - ($this->getY() * $rotZ) + ($this->getZ() * $rotY);
        $y = $tranY + ($this->getX() * $rotZ) + ($this->getY() * (1 + $scale)) - ($this->getZ() * $rotX);
        $z = $tranZ - ($this->getX() * $rotY) + ($this->getY() * $rotX) + ($this->getZ() * (1 + $scale));

        $this->setX($x);
        $this->setY($y);
        $this->setZ($z);
        $this->setRefEll($toRefEll);
    }
}
