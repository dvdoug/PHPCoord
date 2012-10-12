<?php
/**
 * PHPCoord
 * @package PHPCoord
 * @author Jonathan Stott
 * @author Doug Wright
 */
  namespace PHPCoord;

  /**
   * Latitude/Longtitude reference
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
     * Create a new LatLng object from the given latitude and longitude
     * @param int $aLat
     * @param int $aLng
     */
    public function __construct($aLat, $aLng) {
      $this->lat = $aLat;
      $this->lng = $aLng;
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
     * @param $aTo a LatLng object to measure the surface distance to
     * @return float
     */
    public function distance(LatLng $aTo) {
      $er = 6366.707;

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

      return $d;
    }


    /**
     * Convert this LatLng object from OSGB36 datum to WGS84 datum.
     */
    public function OSGB36ToWGS84() {
      $airy1830 = new RefEll(6377563.396, 6356256.909);
      $a        = $airy1830->maj;
      $b        = $airy1830->min;
      $eSquared = $airy1830->ecc;
      $phi = deg2rad($this->lat);
      $lambda = deg2rad($this->lng);
      $v = $a / (sqrt(1 - $eSquared * pow(sin($phi), 2)));
      $H = 0; // height
      $x = ($v + $H) * cos($phi) * cos($lambda);
      $y = ($v + $H) * cos($phi) * sin($lambda);
      $z = ((1 - $eSquared) * $v + $H) * sin($phi);

      $tx =        446.448;
      $ty =       -124.157;
      $tz =        542.060;
      $s  =         -0.0000204894;
      $rx = deg2rad( 0.00004172222);
      $ry = deg2rad( 0.00006861111);
      $rz = deg2rad( 0.00023391666);

      $xB = $tx + ($x * (1 + $s)) + (-$rx * $y)     + ($ry * $z);
      $yB = $ty + ($rz * $x)      + ($y * (1 + $s)) + (-$rx * $z);
      $zB = $tz + (-$ry * $x)     + ($rx * $y)      + ($z * (1 + $s));

      $wgs84 = new RefEll(6378137.000, 6356752.3141);
      $a        = $wgs84->maj;
      $b        = $wgs84->min;
      $eSquared = $wgs84->ecc;

      $lambdaB = rad2deg(atan($yB / $xB));
      $p = sqrt(($xB * $xB) + ($yB * $yB));
      $phiN = atan($zB / ($p * (1 - $eSquared)));
      for ($i = 1; $i < 10; $i++) {
        $v = $a / (sqrt(1 - $eSquared * pow(sin($phiN), 2)));
        $phiN1 = atan(($zB + ($eSquared * $v * sin($phiN))) / $p);
        $phiN = $phiN1;
      }

      $phiB = rad2deg($phiN);

      $this->lat = $phiB;
      $this->lng = $lambdaB;
    }


    /**
     * Convert this LatLng object from WGS84 datum to OSGB36 datum.
     */
    public function WGS84ToOSGB36() {
      $wgs84 = new RefEll(6378137.000, 6356752.3141);
      $a        = $wgs84->maj;
      $b        = $wgs84->min;
      $eSquared = $wgs84->ecc;
      $phi = deg2rad($this->lat);
      $lambda = deg2rad($this->lng);
      $v = $a / (sqrt(1 - $eSquared * pow(sin($phi), 2)));
      $H = 0; // height
      $x = ($v + $H) * cos($phi) * cos($lambda);
      $y = ($v + $H) * cos($phi) * sin($lambda);
      $z = ((1 - $eSquared) * $v + $H) * sin($phi);

      $tx =       -446.448;
      $ty =        124.157;
      $tz =       -542.060;
      $s  =          0.0000204894;
      $rx = deg2rad(-0.00004172222);
      $ry = deg2rad(-0.00006861111);
      $rz = deg2rad(-0.00023391666);

      $xB = $tx + ($x * (1 + $s)) + (-$rx * $y)     + ($ry * $z);
      $yB = $ty + ($rz * $x)      + ($y * (1 + $s)) + (-$rx * $z);
      $zB = $tz + (-$ry * $x)     + ($rx * $y)      + ($z * (1 + $s));

      $airy1830 = new RefEll(6377563.396, 6356256.909);
      $a        = $airy1830->maj;
      $b        = $airy1830->min;
      $eSquared = $airy1830->ecc;

      $lambdaB = rad2deg(atan($yB / $xB));
      $p = sqrt(($xB * $xB) + ($yB * $yB));
      $phiN = atan($zB / ($p * (1 - $eSquared)));
      for ($i = 1; $i < 10; $i++) {
        $v = $a / (sqrt(1 - $eSquared * pow(sin($phiN), 2)));
        $phiN1 = atan(($zB + ($eSquared * $v * sin($phiN))) / $p);
        $phiN = $phiN1;
      }

      $phiB = rad2deg($phiN);

      $this->lat = $phiB;
      $this->lng = $lambdaB;
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
      $airy1830 = new RefEll(6377563.396, 6356256.909);
      $OSGB_F0  = 0.9996012717;
      $N0       = -100000.0;
      $E0       = 400000.0;
      $phi0     = deg2rad(49.0);
      $lambda0  = deg2rad(-2.0);
      $a        = $airy1830->maj;
      $b        = $airy1830->min;
      $eSquared = $airy1830->ecc;
      $phi = deg2rad($this->lat);
      $lambda = deg2rad($this->lng);
      $E = 0.0;
      $N = 0.0;
      $n = ($a - $b) / ($a + $b);
      $v = $a * $OSGB_F0 * pow(1.0 - $eSquared * pow(sin($phi), 2), -0.5);
      $rho =
        $a * $OSGB_F0 * (1.0 - $eSquared) * pow(1.0 - $eSquared * pow(sin($phi), 2), -1.5);
      $etaSquared = ($v / $rho) - 1.0;
      $M =
        ($b * $OSGB_F0)
          * (((1 + $n + ((5.0 / 4.0) * $n * $n) + ((5.0 / 4.0) * $n * $n * $n))
            * ($phi - $phi0))
            - (((3 * $n) + (3 * $n * $n) + ((21.0 / 8.0) * $n * $n * $n))
              * sin($phi - $phi0)
              * cos($phi + $phi0))
            + ((((15.0 / 8.0) * $n * $n) + ((15.0 / 8.0) * $n * $n * $n))
              * sin(2.0 * ($phi - $phi0))
              * cos(2.0 * ($phi + $phi0)))
            - (((35.0 / 24.0) * $n * $n * $n)
              * sin(3.0 * ($phi - $phi0))
              * cos(3.0 * ($phi + $phi0))));
      $I = $M + $N0;
      $II = ($v / 2.0) * sin($phi) * cos($phi);
      $III =
        ($v / 24.0)
          * sin($phi)
          * pow(cos($phi), 3.0)
          * (5.0 - pow(tan($phi), 2) + (9.0 * $etaSquared));
      $IIIA =
        ($v / 720.0)
          * sin($phi)
          * pow(cos($phi), 5.0)
          * (61.0 - (58.0 * pow(tan($phi), 2)) + pow(tan($phi), 4.0));
      $IV = $v * cos($phi);
      $V = ($v / 6.0) * pow(cos($phi), 3.0) * (($v / $rho) - pow(tan($phi), 2));
      $VI =
        ($v / 120.0)
          * pow(cos($phi), 5.0)
          * (5.0
            - (18.0 * pow(tan($phi), 2))
            + (pow(tan($phi), 4.0))
            + (14 * $etaSquared)
            - (58 * pow(tan($phi), 2) * $etaSquared));

      $N =
        $I
          + ($II * pow($lambda - $lambda0, 2.0))
          + ($III * pow($lambda - $lambda0, 4.0))
          + ($IIIA * pow($lambda - $lambda0, 6.0));
      $E =
        $E0
          + ($IV * ($lambda - $lambda0))
          + ($V * pow($lambda - $lambda0, 3.0))
          + ($VI * pow($lambda - $lambda0, 5.0));

      return new OSRef(round($E), round($N));
    }


    /**
     * Convert a latitude and longitude to an UTM reference
     * @return UTMRef
     */
    public function toUTMRef() {
      $wgs84 = new RefEll(6378137, 6356752.314);
      $UTM_F0   = 0.9996;
      $a = $wgs84->maj;
      $eSquared = $wgs84->ecc;
      $longitude = $this->lng;
      $latitude = $this->lat;

      $latitudeRad = $latitude * (pi() / 180.0);
      $longitudeRad = $longitude * (pi() / 180.0);
      $longitudeZone = (int) (($longitude + 180.0) / 6.0) + 1;

      // Special zone for Norway
      if ($latitude >= 56.0
        && $latitude < 64.0
        && $longitude >= 3.0
        && $longitude < 12.0) {
        $longitudeZone = 32;
      }

      // Special zones for Svalbard      if ($latitude >= 72.0 && $latitude < 84.0) {
        if ($longitude >= 0.0 && $longitude < 9.0) {
          $longitudeZone = 31;
        } else if ($longitude >= 9.0 && $longitude < 21.0) {
          $longitudeZone = 33;
        } else if ($longitude >= 21.0 && $longitude < 33.0) {
          $longitudeZone = 35;
        } else if ($longitude >= 33.0 && $longitude < 42.0) {
          $longitudeZone = 37;
        }
      }

      $longitudeOrigin = ($longitudeZone - 1) * 6 - 180 + 3;
      $longitudeOriginRad = $longitudeOrigin * (pi() / 180.0);

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
            + (1 - $t + $c) * pow($A, 3.0) / 6
            + (5 - 18 * $t + $t * $t + 72 * $c - 58 * $ePrimeSquared)
              * pow($A, 5.0)
              / 120)
          + 500000.0);

      $UTMNorthing =
        (double) ($UTM_F0
          * ($M
            + $n
              * tan($latitudeRad)
              * ($A * $A / 2
                + (5 - $t + (9 * $c) + (4 * $c * $c)) * pow($A, 4.0) / 24
                + (61 - (58 * $t) + ($t * $t) + (600 * $c) - (330 * $ePrimeSquared))
                  * pow($A, 6.0)
                  / 720)));

      // Adjust for the southern hemisphere      if ($latitude < 0) {
        $UTMNorthing += 10000000.0;
      }

      return new UTMRef(round($UTMEasting), round($UTMNorthing), $UTMZone, $longitudeZone);
    }
    
    /**
     * Work out the UTM latitude zone from the latitude
     * @param float $aLatitude
     * @return string
     */
    private function getUTMLatitudeZoneLetter($aLatitude) {
      if ((84 >= $aLatitude) && ($aLatitude >= 72)) return "X";
      else if (( 72 > $aLatitude) && ($aLatitude >=  64)) return "W";
      else if (( 64 > $aLatitude) && ($aLatitude >=  56)) return "V";
      else if (( 56 > $aLatitude) && ($aLatitude >=  48)) return "U";
      else if (( 48 > $aLatitude) && ($aLatitude >=  40)) return "T";
      else if (( 40 > $aLatitude) && ($aLatitude >=  32)) return "S";
      else if (( 32 > $aLatitude) && ($aLatitude >=  24)) return "R";
      else if (( 24 > $aLatitude) && ($aLatitude >=  16)) return "Q";
      else if (( 16 > $aLatitude) && ($aLatitude >=   8)) return "P";
      else if ((  8 > $aLatitude) && ($aLatitude >=   0)) return "N";
      else if ((  0 > $aLatitude) && ($aLatitude >=  -8)) return "M";
      else if (( -8 > $aLatitude) && ($aLatitude >= -16)) return "L";
      else if ((-16 > $aLatitude) && ($aLatitude >= -24)) return "K";
      else if ((-24 > $aLatitude) && ($aLatitude >= -32)) return "J";
      else if ((-32 > $aLatitude) && ($aLatitude >= -40)) return "H";
      else if ((-40 > $aLatitude) && ($aLatitude >= -48)) return "G";
      else if ((-48 > $aLatitude) && ($aLatitude >= -56)) return "F";
      else if ((-56 > $aLatitude) && ($aLatitude >= -64)) return "E";
      else if ((-64 > $aLatitude) && ($aLatitude >= -72)) return "D";
      else if ((-72 > $aLatitude) && ($aLatitude >= -80)) return "C";
      else return 'Z';
    }
  }
