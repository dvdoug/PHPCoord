<?php
/**
 * PHPCoord
 * @package PHPCoord
 * @author Jonathan Stott
 * @author Doug Wright
 */
namespace PHPCoord;

/**
 * Abstract class representing a Tranverse Mercator Projection
 * @author Doug Wright
 * @package PHPCoord
 */
abstract class TransverseMercator
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
     * h
     * @var float
     */
    protected $h;

    /**
     * Reference ellipsoid used in this datum
     * @var RefEll
     */
    protected $refEll;

    /**
     * Cartesian constructor.
     * @param float $x
     * @param float $y
     * @param float $h
     * @param RefEll $refEll
     */
    public function __construct($x, $y, $h, RefEll $refEll)
    {
        $this->setX($x);
        $this->setY($y);
        $this->setH($h);
        $this->setRefEll($refEll);
    }

    /**
     * String version of coordinate.
     * @return string
     */
    public function __toString()
    {
        return "({$this->x}, {$this->y}, {$this->h})";
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
    public function getH()
    {
        return $this->h;
    }

    /**
     * @param float $h
     */
    public function setH($h)
    {
        $this->h = $h;
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
    public function setRefEll(RefEll $refEll)
    {
        $this->refEll = $refEll;
    }


    /**
     * Reference ellipsoid used by this projection
     * @return RefEll
     */
    abstract public function getReferenceEllipsoid();

    /**
     * Scale factor at central meridian
     * @return float
     */
    abstract public function getScaleFactor();

    /**
     * Northing of true origin
     * @return float
     */
    abstract public function getOriginNorthing();

    /**
     * Easting of true origin
     * @return float
     */
    abstract public function getOriginEasting();

    /**
     * Latitude of true origin
     * @return float
     */
    abstract public function getOriginLatitude();

    /**
     * Longitude of true origin
     * @return float
     */
    abstract public function getOriginLongitude();

    /**
     * Convert this grid reference into a latitude and longitude
     * Formula for transformation is taken from OS document
     * "A Guide to Coordinate Systems in Great Britain"
     *
     * @param float $N map coordinate (northing) of point to convert
     * @param float $E map coordinate (easting) of point to convert
     * @param float $N0 map coordinate (northing) of true origin
     * @param float $E0 map coordinate (easting) of true origin
     * @param float $phi0 map coordinate (latitude) of true origin
     * @param float $lambda0 map coordinate (longitude) of true origin and central meridian
     * @return LatLng
     */
    public function convertToLatitudeLongitude($N, $E, $N0, $E0, $phi0, $lambda0)
    {

        $phi0 = deg2rad($phi0);
        $lambda0 = deg2rad($lambda0);

        $refEll = $this->getReferenceEllipsoid();
        $F0 = $this->getScaleFactor();

        $a = $refEll->getMaj();
        $b = $refEll->getMin();
        $eSquared = $refEll->getEcc();
        $n = ($a - $b) / ($a + $b);
        $phiPrime = (($N - $N0) / ($a * $F0)) + $phi0;

        do {
            $M =
                ($b * $F0)
                * (((1 + $n + ((5 / 4) * $n * $n) + ((5 / 4) * $n * $n * $n))
                        * ($phiPrime - $phi0))
                    - (((3 * $n) + (3 * $n * $n) + ((21 / 8) * $n * $n * $n))
                        * sin($phiPrime - $phi0)
                        * cos($phiPrime + $phi0))
                    + ((((15 / 8) * $n * $n) + ((15 / 8) * $n * $n * $n))
                        * sin(2 * ($phiPrime - $phi0))
                        * cos(2 * ($phiPrime + $phi0)))
                    - (((35 / 24) * $n * $n * $n)
                        * sin(3 * ($phiPrime - $phi0))
                        * cos(3 * ($phiPrime + $phi0))));
            $phiPrime += ($N - $N0 - $M) / ($a * $F0);
        } while (($N - $N0 - $M) >= 0.00001);
        $v = $a * $F0 * pow(1 - $eSquared * pow(sin($phiPrime), 2), -0.5);
        $rho =
            $a
            * $F0
            * (1 - $eSquared)
            * pow(1 - $eSquared * pow(sin($phiPrime), 2), -1.5);
        $etaSquared = ($v / $rho) - 1;
        $VII = tan($phiPrime) / (2 * $rho * $v);
        $VIII =
            (tan($phiPrime) / (24 * $rho * pow($v, 3)))
            * (5
                + (3 * pow(tan($phiPrime), 2))
                + $etaSquared
                - (9 * pow(tan($phiPrime), 2) * $etaSquared));
        $IX =
            (tan($phiPrime) / (720 * $rho * pow($v, 5)))
            * (61
                + (90 * pow(tan($phiPrime), 2))
                + (45 * pow(tan($phiPrime), 2) * pow(tan($phiPrime), 2)));
        $X = (1 / cos($phiPrime)) / $v;
        $XI =
            ((1 / cos($phiPrime)) / (6 * $v * $v * $v))
            * (($v / $rho) + (2 * pow(tan($phiPrime), 2)));
        $XII =
            ((1 / cos($phiPrime)) / (120 * pow($v, 5)))
            * (5
                + (28 * pow(tan($phiPrime), 2))
                + (24 * pow(tan($phiPrime), 4)));
        $XIIA =
            ((1 / cos($phiPrime)) / (5040 * pow($v, 7)))
            * (61
                + (662 * pow(tan($phiPrime), 2))
                + (1320 * pow(tan($phiPrime), 4))
                + (720
                    * pow(tan($phiPrime), 6)));
        $phi =
            $phiPrime
            - ($VII * pow($E - $E0, 2))
            + ($VIII * pow($E - $E0, 4))
            - ($IX * pow($E - $E0, 6));
        $lambda =
            $lambda0
            + ($X * ($E - $E0))
            - ($XI * pow($E - $E0, 3))
            + ($XII * pow($E - $E0, 5))
            - ($XIIA * pow($E - $E0, 7));

        return new LatLng(rad2deg($phi), rad2deg($lambda), 0, $refEll);
    }

    /**
     * Calculate the surface distance between this object and the one
     * passed in as a parameter.
     *
     * @param self $to object to measure the distance to
     * @return float
     */
    public function distance(self $to) {

        if ($this->refEll != $to->refEll) {
            throw new \RuntimeException('Source and destination co-ordinates are not using the same ellipsoid');
        }

        //Because this is a 2D grid, we can use simple Pythagoras
        $distanceX = $to->getX()-$this->getX();
        $distanceY = $to->getY()-$this->getY();

        return pow(pow($distanceX, 2) + pow($distanceY, 2), 0.5);

    }
}
