<?php
/**
 * PHPCoord
 * @package PHPCoord
 * @author Jonathan Stott
 * @author Doug Wright
 */
  namespace PHPCoord;

  /**
   * UTM reference
   * @author Jonathan Stott
   * @author Doug Wright
   * @package PHPCoord
   */
  class UTMRef {

    /**
     * Easting
     * @api
     * @var int
     */
    public $easting;
    
    /**
     * Easting
     * @api
     * @var int
     */
    public $northing;
    
    /**
     * Latitude zone
     * @api
     * @var string
     */
    public $latZone;
    
    /**
     * Longitude zone
     * @api
     * @var string
     */
    public $lngZone;

    /**
     * Create a new object representing a UTM reference.
     *
     * @param int $aEasting
     * @param int $aNorthing
     * @param string $aLatZone
     * @param int $aLngZone
     */
    public function __construct($aEasting, $aNorthing, $aLatZone, $aLngZone) {
      $this->easting  = round($aEasting);
      $this->northing = round($aNorthing);
      $this->latZone  = $aLatZone;
      $this->lngZone  = $aLngZone;
    }


    /**
     * Return a string representation of this UTM reference
     * @return string
     */
    public function __toString() {
      return "{$this->lngZone}{$this->latZone} {$this->easting} {$this->northing}";
    }


    /**
     * Convert this UTM reference to a WGS84 latitude and longitude
     * @return LatLng
     */
    public function toLatLng() {
      $wgs84 = RefEll::WGS84();
      $UTM_F0   = 0.9996;
      $a = $wgs84->maj;
      $eSquared = $wgs84->ecc;
      $ePrimeSquared = $eSquared / (1 - $eSquared);
      $e1 = (1 - sqrt(1 - $eSquared)) / (1 + sqrt(1 - $eSquared));
      $x = $this->easting - 500000;
      $y = $this->northing;
      $zoneNumber = $this->lngZone;
      $zoneLetter = $this->latZone;

      $longitudeOrigin = ($zoneNumber - 1) * 6 - 180 + 3;

      // Correct y for southern hemisphere      if ((ord($zoneLetter) - ord("N")) < 0) {
        $y -= 10000000;
      }

      $m = $y / $UTM_F0;
      $mu =
        $m
          / ($a
            * (1
              - $eSquared / 4
              - 3 * $eSquared * $eSquared / 64
              - 5
                * pow($eSquared, 3)
                / 256));

      $phi1Rad =
        $mu
          + (3 * $e1 / 2 - 27 * pow($e1, 3) / 32) * sin(2 * $mu)
          + (21 * $e1 * $e1 / 16 - 55 * pow($e1, 4) / 32)
            * sin(4 * $mu)
          + (151 * pow($e1, 3) / 96) * sin(6 * $mu);

      $n =
        $a
          / sqrt(1 - $eSquared * sin($phi1Rad) * sin($phi1Rad));
      $t = tan($phi1Rad) * tan($phi1Rad);
      $c = $ePrimeSquared * cos($phi1Rad) * cos($phi1Rad);
      $r =
        $a
          * (1 - $eSquared)
          / pow(
            1 - $eSquared * sin($phi1Rad) * sin($phi1Rad),
            1.5);
      $d = $x / ($n * $UTM_F0);

      $latitude = (
        $phi1Rad
          - ($n * tan($phi1Rad) / $r)
            * ($d * $d / 2
              - (5
                + (3 * $t)
                + (10 * $c)
                - (4 * $c * $c)
                - (9 * $ePrimeSquared))
                * pow($d, 4)
                / 24
              + (61
                + (90 * $t)
                + (298 * $c)
                + (45 * $t * $t)
                - (252 * $ePrimeSquared)
                - (3 * $c * $c))
                * pow($d, 6)
                / 720)) * (180 / pi());

      $longitude = $longitudeOrigin + (
        ($d
          - (1 + 2 * $t + $c) * pow($d, 3) / 6
          + (5
            - (2 * $c)
            + (28 * $t)
            - (3 * $c * $c)
            + (8 * $ePrimeSquared)
            + (24 * $t * $t))
            * pow($d, 5)
            / 120)
          / cos($phi1Rad)) * (180 / pi());

      return new LatLng($latitude, $longitude);
    }
  }
