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
        error_log(E_WARNING, 'Source and destination co-ordinates are not using the same ellipsoid');
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
        error_log(E_WARNING, 'Current co-ordinates are not using the Airy ellipsoid');
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
        error_log(E_WARNING, 'Current co-ordinates are not using the WGS84 ellipsoid');
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
        error_log(E_WARNING, 'Current co-ordinates are not using the WGS84 ellipsoid');
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
        error_log(E_WARNING, 'Current co-ordinates are not using the Heyford ellipsoid');
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
        error_log(E_WARNING, 'Current co-ordinates are not using the WGS84 ellipsoid');
      }

      $wgs84 = RefEll::WGS84();
      $clarke1866 = RefEll::Clarke1866();

      $tx =         8;
      $ty =       −160;
      $tz =       −176;
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
        error_log(E_WARNING, 'Current co-ordinates are not using the Clarke ellipsoid');
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

      $lambdaB = rad2deg(atan($yB / $xB));
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
     * @return OSRef
     */
    public function toOSRef() {
      $airy1830 = RefEll::Airy1830();
      $OSGB_F0  = 0.9996012717;
      $N0       = -100000;
      $E0       = 400000;
      $phi0     = deg2rad(49);
      $lambda0  = deg2rad(-2);
      $a        = $airy1830->maj;
      $b        = $airy1830->min;
      $eSquared = $airy1830->ecc;
      $phi = deg2rad($this->lat);
      $lambda = deg2rad($this->lng);
      $E = 0;
      $N = 0;
      $n = ($a - $b) / ($a + $b);
      $v = $a * $OSGB_F0 * pow(1 - $eSquared * pow(sin($phi), 2), -0.5);
      $rho =
        $a * $OSGB_F0 * (1 - $eSquared) * pow(1 - $eSquared * pow(sin($phi), 2), -1.5);
      $etaSquared = ($v / $rho) - 1;
      $M =
        ($b * $OSGB_F0)
          * (((1 + $n + ((5 / 4) * $n * $n) + ((5 / 4) * $n * $n * $n))
            * ($phi - $phi0))
            - (((3 * $n) + (3 * $n * $n) + ((21 / 8) * $n * $n * $n))
              * sin($phi - $phi0)
              * cos($phi + $phi0))
            + ((((15 / 8) * $n * $n) + ((15 / 8) * $n * $n * $n))
              * sin(2 * ($phi - $phi0))
              * cos(2 * ($phi + $phi0)))
            - (((35 / 24) * $n * $n * $n)
              * sin(3 * ($phi - $phi0))
              * cos(3 * ($phi + $phi0))));
      $I = $M + $N0;
      $II = ($v / 2) * sin($phi) * cos($phi);
      $III =
        ($v / 24)
          * sin($phi)
          * pow(cos($phi), 3)
          * (5 - pow(tan($phi), 2) + (9 * $etaSquared));
      $IIIA =
        ($v / 720)
          * sin($phi)
          * pow(cos($phi), 5)
          * (61 - (58 * pow(tan($phi), 2)) + pow(tan($phi), 4));
      $IV = $v * cos($phi);
      $V = ($v / 6) * pow(cos($phi), 3) * (($v / $rho) - pow(tan($phi), 2));
      $VI =
        ($v / 120)
          * pow(cos($phi), 5)
          * (5
            - (18 * pow(tan($phi), 2))
            + (pow(tan($phi), 4))
            + (14 * $etaSquared)
            - (58 * pow(tan($phi), 2) * $etaSquared));

      $N =
        $I
          + ($II * pow($lambda - $lambda0, 2))
          + ($III * pow($lambda - $lambda0, 4))
          + ($IIIA * pow($lambda - $lambda0, 6));
      $E =
        $E0
          + ($IV * ($lambda - $lambda0))
          + ($V * pow($lambda - $lambda0, 3))
          + ($VI * pow($lambda - $lambda0, 5));

      return new OSRef($E, $N);
    }


    /**
     * Convert a WGS84 latitude and longitude to an UTM reference
     * @return UTMRef
     */
    public function toUTMRef() {
      $wgs84 = RefEll::WGS84();
      $UTM_F0   = 0.9996;
      $a = $wgs84->maj;
      $eSquared = $wgs84->ecc;
      $longitude = $this->lng;
      $latitude = $this->lat;

      $latitudeRad = $latitude * (pi() / 180);
      $longitudeRad = $longitude * (pi() / 180);
      $longitudeZone = (int) (($longitude + 180) / 6) + 1;

      // Special zone for Norway
      if ($latitude >= 56 && $latitude < 64 && $longitude >= 3 && $longitude < 12) {
        $longitudeZone = 32;
      }

      // Special zones for Svalbard
      if ($latitude >= 72 && $latitude < 84) {
        if ($longitude >= 0 && $longitude < 9) {
          $longitudeZone = 31;
        }
        else if ($longitude >= 9 && $longitude < 21) {
          $longitudeZone = 33;
        }
        else if ($longitude >= 21 && $longitude < 33) {
          $longitudeZone = 35;
        }
        else if ($longitude >= 33 && $longitude < 42) {
          $longitudeZone = 37;
        }
      }

      $longitudeOrigin = ($longitudeZone - 1) * 6 - 180 + 3;
      $longitudeOriginRad = $longitudeOrigin * (pi() / 180);

      $UTMZone = $this->getUTMLatitudeZoneLetter($latitude);

      $ePrimeSquared = ($eSquared) / (1 - $eSquared);

      $n = $a / sqrt(1 - $eSquared * sin($latitudeRad) * sin($latitudeRad));
      $t = tan($latitudeRad) * tan($latitudeRad);
      $c = $ePrimeSquared * cos($latitudeRad) * cos($latitudeRad);
      $A = cos($latitudeRad) * ($longitudeRad - $longitudeOriginRad);

      $M =
        $a
          * ((1
            - $eSquared / 4
            - 3 * $eSquared * $eSquared / 64
            - 5 * $eSquared * $eSquared * $eSquared / 256)
            * $latitudeRad
            - (3 * $eSquared / 8
              + 3 * $eSquared * $eSquared / 32
              + 45 * $eSquared * $eSquared * $eSquared / 1024)
              * sin(2 * $latitudeRad)
            + (15 * $eSquared * $eSquared / 256
              + 45 * $eSquared * $eSquared * $eSquared / 1024)
              * sin(4 * $latitudeRad)
            - (35 * $eSquared * $eSquared * $eSquared / 3072)
              * sin(6 * $latitudeRad));

      $UTMEasting =
        (double) ($UTM_F0
          * $n
          * ($A
            + (1 - $t + $c) * pow($A, 3) / 6
            + (5 - 18 * $t + $t * $t + 72 * $c - 58 * $ePrimeSquared)
              * pow($A, 5)
              / 120)
          + 500000);

      $UTMNorthing =
        (double) ($UTM_F0
          * ($M
            + $n
              * tan($latitudeRad)
              * ($A * $A / 2
                + (5 - $t + (9 * $c) + (4 * $c * $c)) * pow($A, 4) / 24
                + (61 - (58 * $t) + ($t * $t) + (600 * $c) - (330 * $ePrimeSquared))
                  * pow($A, 6)
                  / 720)));

      // Adjust for the southern hemisphere
      if ($latitude < 0) {
        $UTMNorthing += 10000000;
      }

      return new UTMRef($UTMEasting, $UTMNorthing, $UTMZone, $longitudeZone);
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
  }
