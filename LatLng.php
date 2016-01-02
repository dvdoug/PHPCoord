<?php
/**
 * PHPCoord
 * @package PHPCoord
 * @author Jonathan Stott
 * @author Doug Wright
 */
namespace PHPCoord;

/**
 * Latitude/Longitude reference
 * @author Jonathan Stott
 * @author Doug Wright
 * @package PHPCoord
 */
class LatLng
{

    /**
     * Latitude
     * @var float
     */
    protected $lat;

    /**
     * Longitude
     * @var float
     */
    protected $lng;

    /**
     * Height
     * @var float
     */
    protected $h;

    /**
     * Reference ellipsoid the co-ordinates are from
     * @var RefEll
     */
    protected $refEll;

    /**
     * Create a new LatLng object from the given latitude and longitude
     * @param float $lat
     * @param float $lng
     * @param float $height
     * @param RefEll $refEll
     */
    public function __construct($lat, $lng, $height, RefEll $refEll)
    {
        $this->lat = round($lat, 5);
        $this->lng = round($lng, 5);
        $this->h = round($height);
        $this->refEll = $refEll;
    }

    /**
     * Return a string representation of this LatLng object
     * @return string
     */
    public function __toString()
    {
        return "({$this->lat}, {$this->lng})";
    }

    /**
     * @return float
     */
    public function getLat()
    {
        return $this->lat;
    }

    /**
     * @param float $lat
     */
    public function setLat($lat)
    {
        $this->lat = $lat;
    }

    /**
     * @return float
     */
    public function getLng()
    {
        return $this->lng;
    }

    /**
     * @param float $lng
     */
    public function setLng($lng)
    {
        $this->lng = $lng;
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
     * Calculate the surface distance between this LatLng object and the one
     * passed in as a parameter.
     *
     * @param LatLng $to a LatLng object to measure the surface distance to
     * @return float
     */
    public function distance(LatLng $to)
    {

        if ($this->refEll != $to->refEll) {
            trigger_error('Source and destination co-ordinates are not using the same ellipsoid', E_USER_WARNING);
        }

        //Mean radius definition from taken from Wikipedia
        $er = ((2 * $this->refEll->getMaj()) + $this->refEll->getMin()) / 3;

        $latFrom = deg2rad($this->lat);
        $latTo = deg2rad($to->lat);
        $lngFrom = deg2rad($this->lng);
        $lngTo = deg2rad($to->lng);

        $d = acos(sin($latFrom) * sin($latTo) + cos($latFrom) * cos($latTo) * cos($lngTo - $lngFrom)) * $er;

        return round($d, 5);
    }


    /**
     * Convert this LatLng object from OSGB36 datum to WGS84 datum.
     * Reference values for transformation are taken from OS document
     * "A Guide to Coordinate Systems in Great Britain"
     * @return void
     */
    public function OSGB36ToWGS84()
    {

        if ($this->refEll != RefEll::airy1830()) {
            trigger_error('Current co-ordinates are not using the Airy ellipsoid', E_USER_WARNING);
        }

        $wgs84 = RefEll::wgs84();

        $tx = 446.448;
        $ty = -125.157;
        $tz = 542.060;
        $s = -0.0000204894;
        $rx = deg2rad(0.1502 / 3600);
        $ry = deg2rad(0.2470 / 3600);
        $rz = deg2rad(0.8421 / 3600);

        $this->transformDatum($wgs84, $tx, $ty, $tz, $s, $rx, $ry, $rz);
    }


    /**
     * Convert this LatLng object from WGS84 datum to OSGB36 datum.
     * Reference values for transformation are taken from OS document
     * "A Guide to Coordinate Systems in Great Britain"
     * @return void
     */
    public function WGS84ToOSGB36()
    {

        if ($this->refEll != RefEll::wgs84()) {
            trigger_error('Current co-ordinates are not using the WGS84 ellipsoid', E_USER_WARNING);
        }

        $airy1830 = RefEll::airy1830();

        $tx = -446.448;
        $ty = 125.157;
        $tz = -542.060;
        $s = 0.0000204894;
        $rx = deg2rad(-0.1502 / 3600);
        $ry = deg2rad(-0.2470 / 3600);
        $rz = deg2rad(-0.8421 / 3600);

        $this->transformDatum($airy1830, $tx, $ty, $tz, $s, $rx, $ry, $rz);
    }

    /**
     * Convert this LatLng object from WGS84 datum to ED50 datum.
     * Reference values for transformation are taken from http://www.globalmapper.com/helpv9/datum_list.htm
     * @return void
     */
    public function WGS84ToED50()
    {

        if ($this->refEll != RefEll::wgs84()) {
            trigger_error('Current co-ordinates are not using the WGS84 ellipsoid', E_USER_WARNING);
        }

        $heyford1924 = RefEll::heyford1924();

        $tx = 87;
        $ty = 98;
        $tz = 121;
        $s = 0;
        $rx = deg2rad(0);
        $ry = deg2rad(0);
        $rz = deg2rad(0);

        $this->transformDatum($heyford1924, $tx, $ty, $tz, $s, $rx, $ry, $rz);
    }

    /**
     * Convert this LatLng object from ED50 datum to WGS84 datum.
     * Reference values for transformation are taken from http://www.globalmapper.com/helpv9/datum_list.htm
     * @return void
     */
    public function ED50ToWGS84()
    {

        if ($this->refEll != RefEll::heyford1924()) {
            trigger_error('Current co-ordinates are not using the Heyford ellipsoid', E_USER_WARNING);
        }

        $wgs84 = RefEll::wgs84();

        $tx = -87;
        $ty = -98;
        $tz = -121;
        $s = 0;
        $rx = deg2rad(0);
        $ry = deg2rad(0);
        $rz = deg2rad(0);

        $this->transformDatum($wgs84, $tx, $ty, $tz, $s, $rx, $ry, $rz);
    }

    /**
     * Convert this LatLng object from WGS84 datum to NAD27 datum.
     * Reference values for transformation are taken from Wikipedia
     * @return void
     */
    public function WGS84ToNAD27()
    {

        if ($this->refEll != RefEll::wgs84()) {
            trigger_error('Current co-ordinates are not using the WGS84 ellipsoid', E_USER_WARNING);
        }

        $clarke1866 = RefEll::clarke1866();

        $tx = 8;
        $ty = -160;
        $tz = -176;
        $s = 0;
        $rx = deg2rad(0);
        $ry = deg2rad(0);
        $rz = deg2rad(0);

        $this->transformDatum($clarke1866, $tx, $ty, $tz, $s, $rx, $ry, $rz);
    }

    /**
     * Convert this LatLng object from NAD27 datum to WGS84 datum.
     * Reference values for transformation are taken from Wikipedia
     * @return void
     */
    public function NAD27ToWGS84()
    {

        if ($this->refEll != RefEll::clarke1866()) {
            trigger_error('Current co-ordinates are not using the Clarke ellipsoid', E_USER_WARNING);
        }

        $wgs84 = RefEll::wgs84();

        $tx = -8;
        $ty = 160;
        $tz = 176;
        $s = 0;
        $rx = deg2rad(0);
        $ry = deg2rad(0);
        $rz = deg2rad(0);

        $this->transformDatum($wgs84, $tx, $ty, $tz, $s, $rx, $ry, $rz);
    }

    /**
     * Transform co-ordinates from one datum to another using a Helmert transformation
     * @param RefEll $toRefEll
     * @param float $tranX
     * @param float $tranY
     * @param float $tranZ
     * @param float $scale
     * @param float $rotX  rotation about x-axis in seconds
     * @param float $rotY  rotation about y-axis in seconds
     * @param float $rotZ  rotation about z-axis in seconds
     * @return mixed
     */
    public function transformDatum(RefEll $toRefEll, $tranX, $tranY, $tranZ, $scale, $rotX, $rotY, $rotZ)
    {

        $cartesian = Cartesian::fromLatLong($this);
        $cartesian->transformDatum($toRefEll, $tranX, $tranY, $tranZ, $scale, $rotX, $rotY, $rotZ);
        $newLatLng = $cartesian->toLatitudeLongitude();

        $this->lat = $newLatLng->getLat();
        $this->lng = $newLatLng->getLng();
        $this->h = $newLatLng->getH();
        $this->refEll = $newLatLng->getRefEll();
    }


    /**
     * Convert this LatLng object into an OSGB grid reference. Note that this
     * function does not take into account the bounds of the OSGB grid -
     * beyond the bounds of the OSGB grid, the resulting OSRef object has no
     * meaning
     *
     * Reference values for transformation are taken from OS document
     * "A Guide to Coordinate Systems in Great Britain"
     *
     * @return OSRef
     */
    public function toOSRef()
    {

        if ($this->refEll != RefEll::airy1830()) {
            trigger_error('Current co-ordinates are in a non-OSGB datum', E_USER_WARNING);
        }

        $OSGB = new OSRef(0, 0); //dummy to get reference data
        $scale = $OSGB->getScaleFactor();
        $N0 = $OSGB->getOriginNorthing();
        $E0 = $OSGB->getOriginEasting();
        $phi0 = $OSGB->getOriginLatitude();
        $lambda0 = $OSGB->getOriginLongitude();

        $coords = $this->toTransverseMercatorEastingNorthing($scale, $E0, $N0, $phi0, $lambda0);

        return new OSRef(round($coords['E']), round($coords['N']));
    }


    /**
     * Convert a WGS84 latitude and longitude to an UTM reference
     *
     * Reference values for transformation are taken from OS document
     * "A Guide to Coordinate Systems in Great Britain"
     * @return UTMRef
     */
    public function toUTMRef()
    {

        if ($this->refEll != RefEll::wgs84()) {
            trigger_error('Current co-ordinates are in a non-WGS84 datum', E_USER_WARNING);
        }

        $longitudeZone = (int)(($this->lng + 180) / 6) + 1;

        // Special zone for Norway
        if ($this->lat >= 56 && $this->lat < 64 && $this->lng >= 3 && $this->lng < 12) {
            $longitudeZone = 32;
        } elseif ($this->lat >= 72 && $this->lat < 84) { // Special zones for Svalbard
            if ($this->lng >= 0 && $this->lng < 9) {
                $longitudeZone = 31;
            } elseif ($this->lng >= 9 && $this->lng < 21) {
                $longitudeZone = 33;
            } elseif ($this->lng >= 21 && $this->lng < 33) {
                $longitudeZone = 35;
            } elseif ($this->lng >= 33 && $this->lng < 42) {
                $longitudeZone = 37;
            }
        }

        $UTMZone = $this->getUTMLatitudeZoneLetter($this->lat);

        $UTM = new UTMRef(0, 0, $UTMZone, $longitudeZone); //dummy to get reference data
        $scale = $UTM->getScaleFactor();
        $N0 = $UTM->getOriginNorthing();
        $E0 = $UTM->getOriginEasting();
        $phi0 = $UTM->getOriginLatitude();
        $lambda0 = $UTM->getOriginLongitude();

        $coords = $this->toTransverseMercatorEastingNorthing($scale, $E0, $N0, $phi0, $lambda0);

        if ($this->lat < 0) {
            $coords['N'] += 10000000;
        }

        return new UTMRef(round($coords['E']), round($coords['N']), $UTMZone, $longitudeZone);
    }

    /**
     * Work out the UTM latitude zone from the latitude
     * @param float $latitude
     * @return string
     */
    private function getUTMLatitudeZoneLetter($latitude)
    {

        if ($latitude < -80 || $latitude > 84) {
            throw new \OutOfRangeException('UTM zones do not apply in polar regions');
        }

        $zones = "CDEFGHJKLMNPQRSTUVWXX";
        $zoneIndex = (int)(($latitude + 80) / 8);
        return $zones[$zoneIndex];
    }


    /**
     * Convert a latitude and longitude to easting and northing using a Transverse Mercator projection
     * Formula for transformation is taken from OS document
     * "A Guide to Coordinate Systems in Great Britain"
     *
     * @param float $scale scale factor on central meridian
     * @param float $originEasting easting of true origin
     * @param float $originNorthing northing of true origin
     * @param float $originLat latitude of true origin
     * @param float $originLong longitude of true origin
     * @return array
     */
    public function toTransverseMercatorEastingNorthing(
        $scale,
        $originEasting,
        $originNorthing,
        $originLat,
        $originLong
    ) {

        $originLat = deg2rad($originLat);
        $originLong = deg2rad($originLong);

        $lat = deg2rad($this->lat);
        $sinLat = sin($lat);
        $cosLat = cos($lat);
        $tanLat = tan($lat);
        $tanLatSq = pow($tanLat, 2);
        $long = deg2rad($this->lng);

        $n = ($this->refEll->getMaj() - $this->refEll->getMin()) / ($this->refEll->getMaj() + $this->refEll->getMin());
        $nSq = pow($n, 2);
        $nCu = pow($n, 3);

        $v = $this->refEll->getMaj() * $scale * pow(1 - $this->refEll->getEcc() * pow($sinLat, 2), -0.5);
        $p = $this->refEll->getMaj() * $scale * (1 - $this->refEll->getEcc()) * pow(1 - $this->refEll->getEcc() * pow($sinLat, 2), -1.5);
        $hSq = (($v / $p) - 1);

        $latPlusOrigin = $lat + $originLat;
        $latMinusOrigin = $lat - $originLat;

        $longMinusOrigin = $long - $originLong;

        $M = $this->refEll->getMin() * $scale
            * ((1 + $n + 1.25 * ($nSq + $nCu)) * $latMinusOrigin
                - (3 * ($n + $nSq) + 2.625 * $nCu) * sin($latMinusOrigin) * cos($latPlusOrigin)
                + 1.875 * ($nSq + $nCu) * sin(2 * $latMinusOrigin) * cos(2 * $latPlusOrigin)
                - (35 / 24 * $nCu * sin(3 * $latMinusOrigin) * cos(3 * $latPlusOrigin)));

        $I = $M + $originNorthing;
        $II = $v / 2 * $sinLat * $cosLat;
        $III = $v / 24 * $sinLat * pow($cosLat, 3) * (5 - $tanLatSq + 9 * $hSq);
        $IIIA = $v / 720 * $sinLat * pow($cosLat, 5) * (61 - 58 * $tanLatSq + pow($tanLatSq, 2));
        $IV = $v * $cosLat;
        $V = $v / 6 * pow($cosLat, 3) * ($v / $p - $tanLatSq);
        $VI = $v / 120 * pow($cosLat, 5) * (5 - 18 * $tanLatSq + pow($tanLatSq, 2) + 14 * $hSq - 58 * $tanLatSq * $hSq);

        $E = $originEasting + $IV * $longMinusOrigin + $V * pow($longMinusOrigin, 3) + $VI * pow($longMinusOrigin, 5);
        $N = $I + $II * pow($longMinusOrigin, 2) + $III * pow($longMinusOrigin, 4) + $IIIA * pow($longMinusOrigin, 6);

        return array('E' => $E, 'N' => $N);
    }
}
