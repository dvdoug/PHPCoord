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
  class LatLng {

    /**
     * Latitude
     * @api
     * @var float
     */
    public $lat;

    /**
     * Longitude
     * @api
     * @var float
     */
    public $lng;

    /**
     * Reference ellipsoid the co-ordinates are from
     * @api
     * @var RefEll
     */
    public $refEll;

    /**
     * Create a new LatLng object from the given latitude and longitude
     * @param float $aLat
     * @param float $aLng
     * @param RefEll $aRefEll
     */
    public function __construct($aLat, $aLng, $aRefEll = NULL) {
      $this->lat = round($aLat, 5);
      $this->lng = round($aLng, 5);
      $this->refEll = $aRefEll;
    }

    /**
     * Return a string representation of this LatLng object
     * @return string
     */
    public function __toString() {
      return "({$this->lat}, {$this->lng})";
    }

    /**
     * Calculate the surface distance between this LatLng object and the one
     * passed in as a parameter.
     *
     * @param LatLng $aTo a LatLng object to measure the surface distance to
     * @return float
     */
    public function distance(LatLng $aTo) {

      if ($this->refEll != $aTo->refEll) {
        trigger_error('Source and destination co-ordinates are not using the same ellipsoid', E_USER_WARNING);
      }

      //Mean radius definition from taken from Wikipedia
      $refEll = $this->refEll ?: RefEll::WGS84();
      $er = ((2 * $refEll->maj) + $refEll->min) / 3;

      $latFrom = deg2rad($this->lat);
      $latTo   = deg2rad($aTo->lat);
      $lngFrom = deg2rad($this->lng);
      $lngTo   = deg2rad($aTo->lng);

      $x1 = $er * cos($lngFrom) * sin($latFrom);
      $y1 = $er * sin($lngFrom) * sin($latFrom);
      $z1 = $er * cos($latFrom);

      $x2 = $er * cos($lngTo) * sin($latTo);
      $y2 = $er * sin($lngTo) * sin($latTo);
      $z2 = $er * cos($latTo);

      $d = acos(sin($latFrom)*sin($latTo) + cos($latFrom)*cos($latTo)*cos($lngTo-$lngFrom)) * $er;

      return round($d, 5);
    }


    /**
     * Convert this LatLng object from OSGB36 datum to WGS84 datum.
     * Reference values for transformation are taken from OS document
     * "A Guide to Coordinate Systems in Great Britain"
     * @return void
     */
    public function OSGB36ToWGS84() {

      if ($this->refEll && $this->refEll != RefEll::Airy1830()) {
        trigger_error('Current co-ordinates are not using the Airy ellipsoid', E_USER_WARNING);
      }

      $airy1830 = RefEll::Airy1830();
      $wgs84 = RefEll::WGS84();

      $tx =        446.448;
      $ty =       -125.157;
      $tz =        542.060;
      $s  =         -0.0000204894;
      $rx = deg2rad(0.1502/3600);
      $ry = deg2rad(0.2470/3600);
      $rz = deg2rad(0.8421/3600);

      $this->transformDatum($airy1830, $wgs84, $tx, $ty, $tz, $s, $rx, $ry, $rz);
    }


    /**
     * Convert this LatLng object from WGS84 datum to OSGB36 datum.
     * Reference values for transformation are taken from OS document
     * "A Guide to Coordinate Systems in Great Britain"
     * @return void
     */
    public function WGS84ToOSGB36() {

      if ($this->refEll && $this->refEll != RefEll::WGS84()) {
        trigger_error('Current co-ordinates are not using the WGS84 ellipsoid', E_USER_WARNING);
      }

      $wgs84 = RefEll::WGS84();
      $airy1830 = RefEll::Airy1830();

      $tx =       -446.448;
      $ty =        125.157;
      $tz =       -542.060;
      $s  =          0.0000204894;
      $rx = deg2rad(-0.1502/3600);
      $ry = deg2rad(-0.2470/3600);
      $rz = deg2rad(-0.8421/3600);

      $this->transformDatum($wgs84, $airy1830, $tx, $ty, $tz, $s, $rx, $ry, $rz);
    }

    /**
     * Convert this LatLng object from WGS84 datum to ED50 datum.
     * Reference values for transformation are taken from http://www.globalmapper.com/helpv9/datum_list.htm
     * @return void
     */
    public function WGS84ToED50() {

      if ($this->refEll && $this->refEll != RefEll::WGS84()) {
        trigger_error('Current co-ordinates are not using the WGS84 ellipsoid', E_USER_WARNING);
      }

      $wgs84 = RefEll::WGS84();
      $heyford1924 = RefEll::Heyford1924();

      $tx =        87;
      $ty =        98;
      $tz =        121;
      $s  =          0;
      $rx = deg2rad( 0);
      $ry = deg2rad( 0);
      $rz = deg2rad( 0);

      $this->transformDatum($wgs84, $heyford1924, $tx, $ty, $tz, $s, $rx, $ry, $rz);
    }

    /**
     * Convert this LatLng object from ED50 datum to WGS84 datum.
     * Reference values for transformation are taken from http://www.globalmapper.com/helpv9/datum_list.htm
     * @return void
     */
    public function ED50ToWGS84() {

      if ($this->refEll && $this->refEll != RefEll::Heyford1924()) {
        trigger_error('Current co-ordinates are not using the Heyford ellipsoid', E_USER_WARNING);
      }

      $wgs84 = RefEll::WGS84();
      $heyford1924 = RefEll::Heyford1924();

      $tx =       -87;
      $ty =       -98;
      $tz =       -121;
      $s  =          0;
      $rx = deg2rad( 0);
      $ry = deg2rad( 0);
      $rz = deg2rad( 0);

      $this->transformDatum($wgs84, $heyford1924, $tx, $ty, $tz, $s, $rx, $ry, $rz);
    }

    /**
     * Convert this LatLng object from WGS84 datum to NAD27 datum.
     * Reference values for transformation are taken from Wikipedia
     * @return void
     */
    public function WGS84ToNAD27() {

      if ($this->refEll && $this->refEll != RefEll::WGS84()) {
        trigger_error('Current co-ordinates are not using the WGS84 ellipsoid', E_USER_WARNING);
      }

      $wgs84 = RefEll::WGS84();
      $clarke1866 = RefEll::Clarke1866();

      $tx =          8;
      $ty =       -160;
      $tz =       -176;
      $s  =          0;
      $rx = deg2rad( 0);
      $ry = deg2rad( 0);
      $rz = deg2rad( 0);

      $this->transformDatum($wgs84, $clarke1866, $tx, $ty, $tz, $s, $rx, $ry, $rz);
    }

    /**
     * Convert this LatLng object from NAD27 datum to WGS84 datum.
     * Reference values for transformation are taken from Wikipedia
     * @return void
     */
    public function NAD27ToWGS84() {

      if ($this->refEll && $this->refEll != RefEll::Clarke1866()) {
        trigger_error('Current co-ordinates are not using the Clarke ellipsoid', E_USER_WARNING);
      }

      $wgs84 = RefEll::WGS84();
      $clarke1866 = RefEll::Clarke1866();

      $tx =        -8;
      $ty =        160;
      $tz =        176;
      $s  =          0;
      $rx = deg2rad( 0);
      $ry = deg2rad( 0);
      $rz = deg2rad( 0);

      $this->transformDatum($clarke1866, $wgs84, $tx, $ty, $tz, $s, $rx, $ry, $rz);
    }

    /**
     * Transform co-ordinates from one datum to another using a Helmert transformation
     * @param RefEll $aFromEllipsoid
     * @param RefEll $aToEllipsoid
     * @param float $aTranslationX translation vector x coordinate
     * @param float $aTranslationY translation vector y coordinate
     * @param float $aTranslationZ translation vector z coordinate
     * @param float $aScale  scale factor
     * @param float $aRotationX rotation x radians
     * @param float $aRotationY rotation y radians
     * @param float $aRotationZ rotation z radians
     */
    public function transformDatum(RefEll $aFromEllipsoid, RefEll $aToEllipsoid, $aTranslationX, $aTranslationY, $aTranslationZ, $aScale, $aRotationX, $aRotationY, $aRotationZ) {
      $a        = $aFromEllipsoid->maj;
      $b        = $aFromEllipsoid->min;
      $eSquared = $aFromEllipsoid->ecc;
      $phi = deg2rad($this->lat);
      $lambda = deg2rad($this->lng);
      $v = $a / (sqrt(1 - $eSquared * pow(sin($phi), 2)));
      $H = 0; // height
      $x = ($v + $H) * cos($phi) * cos($lambda);
      $y = ($v + $H) * cos($phi) * sin($lambda);
      $z = ((1 - $eSquared) * $v + $H) * sin($phi);

      $xB = $aTranslationX + ($x * (1 + $aScale)) + (-$aRotationX * $y)     + ($aRotationY * $z);
      $yB = $aTranslationY + ($aRotationZ * $x)      + ($y * (1 + $aScale)) + (-$aRotationX * $z);
      $zB = $aTranslationZ + (-$aRotationY * $x)     + ($aRotationX * $y)      + ($z * (1 + $aScale));

      $a        = $aToEllipsoid->maj;
      $b        = $aToEllipsoid->min;
      $eSquared = $aToEllipsoid->ecc;

      $lambdaB = rad2deg(atan2($yB, $xB));
      $p = sqrt(($xB * $xB) + ($yB * $yB));
      $phiN = atan($zB / ($p * (1 - $eSquared)));
      for ($i = 1; $i < 10; $i++) {
        $v = $a / (sqrt(1 - $eSquared * pow(sin($phiN), 2)));
        $phiN1 = atan(($zB + ($eSquared * $v * sin($phiN))) / $p);
        $phiN = $phiN1;
      }

      $phiB = rad2deg($phiN);

      $this->lat = round($phiB, 5);
      $this->lng = round($lambdaB, 5);
      $this->refEll = $aToEllipsoid;
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
    public function toOSRef() {

      if ($this->refEll && $this->refEll != RefEll::Airy1830()) {
        trigger_error('Current co-ordinates are in a non-OSGB datum', E_USER_WARNING);
      }
      else if (!$this->refEll) {
        $this->refEll = RefEll::Airy1830();
      }

      $scale = 0.9996012717; //scale factor on central meridian
      $N0 = -100000;         //northing of true origin
      $E0 =  400000;         //easting of true origin

      $originLat  = deg2rad(49); //latitude of true origin
      $originLong = deg2rad(-2); //longitude of true origin

      $coords = $this->toTransverseMercatorEastingNorthing(0.9996012717,400000,-100000,49,-2);

      return new OSRef($coords['E'], $coords['N']);
    }


    /**
     * Convert a WGS84 latitude and longitude to an UTM reference
     *
     * Reference values for transformation are taken from OS document
     * "A Guide to Coordinate Systems in Great Britain"
     * @return UTMRef
     */
    public function toUTMRef() {

      if ($this->refEll && $this->refEll != RefEll::WGS84()) {
        trigger_error('Current co-ordinates are in a non-WGS84 datum', E_USER_WARNING);
      }
      else if (!$this->refEll) {
        $this->refEll = RefEll::WGS84();
      }

      $longitudeZone = (int) (($this->lng + 180) / 6) + 1;

      // Special zone for Norway
      if ($this->lat >= 56 && $this->lat < 64 && $this->lng >= 3 && $this->lng < 12) {
        $longitudeZone = 32;
      }

      // Special zones for Svalbard
      if ($this->lat >= 72 && $this->lat < 84) {
        if ($this->lng >= 0 && $this->lng < 9) {
          $longitudeZone = 31;
        }
        else if ($this->lng >= 9 && $this->lng < 21) {
          $longitudeZone = 33;
        }
        else if ($this->lng >= 21 && $this->lng < 33) {
          $longitudeZone = 35;
        }
        else if ($this->lng >= 33 && $this->lng < 42) {
          $longitudeZone = 37;
        }
      }

      $longitudeOrigin = ($longitudeZone - 1) * 6 - 180 + 3;

      $UTMZone = $this->getUTMLatitudeZoneLetter($this->lat);

      $coords = $this->toTransverseMercatorEastingNorthing(0.9996, 500000, 0, 0, $longitudeOrigin);

      if ($this->lat < 0) {
        $coords['N'] += 10000000;
      }

      return new UTMRef($coords['E'], $coords['N'], $UTMZone, $longitudeZone);
    }

    /**
     * Work out the UTM latitude zone from the latitude
     * @param float $aLatitude
     * @return string
     */
    private function getUTMLatitudeZoneLetter($aLatitude) {

      if ($aLatitude < -80 || $aLatitude > 84) {
        throw new \OutOfRangeException('UTM zones do not apply in polar regions');
      }

      $zones = "CDEFGHJKLMNPQRSTUVWXX";
      $zoneIndex = (int)(($aLatitude + 80) / 8);
      return $zones[$zoneIndex];
    }


    /**
     * Convert a latitude and longitude to easting and northing using a Transverse Mercator projection
     * Formula for transformation is taken from OS document
     * "A Guide to Coordinate Systems in Great Britain"
     *
     * @param float $aScale           scale factor on central meridian
     * @param float $aOriginEasting   easting of true origin
     * @param float $aOriginNorthing  northing of true origin
     * @param float $aOriginLat       latitude of true origin
     * @param float $aOriginLong      longitude of true origin
     * @return array
     */
    public function toTransverseMercatorEastingNorthing($aScale, $aOriginEasting, $aOriginNorthing, $aOriginLat, $aOriginLong) {

      $originLat  = deg2rad($aOriginLat);
      $originLong = deg2rad($aOriginLong);

      $lat = deg2rad($this->lat);
      $sinLat = sin($lat);
      $cosLat = cos($lat);
      $tanLat = tan($lat);
      $tanLatSq = pow($tanLat, 2);
      $long = deg2rad($this->lng);

      $n = ($this->refEll->maj - $this->refEll->min) / ($this->refEll->maj + $this->refEll->min);
      $nSq = pow($n, 2);
      $nCu = pow($n, 3);

      $v = $this->refEll->maj * $aScale * pow(1 - $this->refEll->ecc * pow($sinLat, 2), -0.5);
      $p = $this->refEll->maj * $aScale * (1 - $this->refEll->ecc) * pow(1 - $this->refEll->ecc * pow($sinLat, 2), -1.5);
      $hSq = (($v / $p) - 1);

      $latPlusOrigin = $lat + $originLat;
      $latMinusOrigin = $lat - $originLat;

      $longMinusOrigin = $long - $originLong;

      $M = $this->refEll->min * $aScale
      * ((1 + $n + 1.25 * ($nSq + $nCu)) * $latMinusOrigin
          - (3 * ($n + $nSq) + 2.625 * $nCu) * sin($latMinusOrigin) * cos($latPlusOrigin)
          + 1.875 * ($nSq + $nCu) * sin(2 * $latMinusOrigin) * cos(2 * $latPlusOrigin)
          - (35 / 24 * $nCu * sin(3 * $latMinusOrigin) * cos(3 * $latPlusOrigin)));

      $I = $M + $aOriginNorthing;
      $II = $v / 2 * $sinLat * $cosLat;
      $III = $v / 24 * $sinLat * pow($cosLat, 3) * (5 - $tanLatSq + 9 * $hSq);
      $IIIA = $v / 720 * $sinLat * pow($cosLat, 5) * (61 - 58 * $tanLatSq + pow($tanLatSq, 2));
      $IV = $v * $cosLat;
      $V = $v / 6 * pow($cosLat, 3) * ($v / $p - $tanLatSq);
      $VI = $v / 120 * pow($cosLat, 5) * (5 - 18 * $tanLatSq + pow($tanLatSq, 2) + 14 * $hSq - 58 * $tanLatSq * $hSq);

      $E = $aOriginEasting + $IV * $longMinusOrigin + $V * pow($longMinusOrigin, 3) + $VI * pow($longMinusOrigin, 5);
      $N = $I + $II * pow($longMinusOrigin, 2) + $III * pow($longMinusOrigin, 4) + $IIIA * pow($longMinusOrigin, 6);

      return array('E'=> $E, 'N'=> $N);
    }
  }
