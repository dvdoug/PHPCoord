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
     * @param string $aLngZone
     */
    public function __construct($aEasting, $aNorthing, $aLatZone, $aLngZone) {
      $this->easting  = $aEasting;
      $this->northing = $aNorthing;
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
     * Convert this UTM reference to a latitude and longitude
     * @return LatLng
     */
    public function toLatLng() {
      $wgs84 = new RefEll(6378137, 6356752.314);
      $UTM_F0   = 0.9996;
      $a = $wgs84->maj;
      $eSquared = $wgs84->ecc;
      $ePrimeSquared = $eSquared / (1.0 - $eSquared);
      $e1 = (1 - sqrt(1 - $eSquared)) / (1 + sqrt(1 - $eSquared));
      $x = $this->easting - 500000.0;;
      $y = $this->northing;
      $zoneNumber = $this->lngZone;
      $zoneLetter = $this->latZone;

      $longitudeOrigin = ($zoneNumber - 1.0) * 6.0 - 180.0 + 3.0;

      // Correct y for southern hemisphere      if ((ord($zoneLetter) - ord("N")) < 0) {
        $y -= 10000000.0;
      }

      $m = $y / $UTM_F0;
      $mu =
        $m
          / ($a
            * (1.0
              - $eSquared / 4.0
              - 3.0 * $eSquared * $eSquared / 64.0
              - 5.0
                * pow($eSquared, 3.0)
                / 256.0));

      $phi1Rad =
        $mu
          + (3.0 * $e1 / 2.0 - 27.0 * pow($e1, 3.0) / 32.0) * sin(2.0 * $mu)
          + (21.0 * $e1 * $e1 / 16.0 - 55.0 * pow($e1, 4.0) / 32.0)
            * sin(4.0 * $mu)
          + (151.0 * pow($e1, 3.0) / 96.0) * sin(6.0 * $mu);

      $n =
        $a
          / sqrt(1.0 - $eSquared * sin($phi1Rad) * sin($phi1Rad));
      $t = tan($phi1Rad) * tan($phi1Rad);
      $c = $ePrimeSquared * cos($phi1Rad) * cos($phi1Rad);
      $r =
        $a
          * (1.0 - $eSquared)
          / pow(
            1.0 - $eSquared * sin($phi1Rad) * sin($phi1Rad),
            1.5);
      $d = $x / ($n * $UTM_F0);

      $latitude = (
        $phi1Rad
          - ($n * tan($phi1Rad) / $r)
            * ($d * $d / 2.0
              - (5.0
                + (3.0 * $t)
                + (10.0 * $c)
                - (4.0 * $c * $c)
                - (9.0 * $ePrimeSquared))
                * pow($d, 4.0)
                / 24.0
              + (61.0
                + (90.0 * $t)
                + (298.0 * $c)
                + (45.0 * $t * $t)
                - (252.0 * $ePrimeSquared)
                - (3.0 * $c * $c))
                * pow($d, 6.0)
                / 720.0)) * (180.0 / pi());

      $longitude = $longitudeOrigin + (
        ($d
          - (1.0 + 2.0 * $t + $c) * pow($d, 3.0) / 6.0
          + (5.0
            - (2.0 * $c)
            + (28.0 * $t)
            - (3.0 * $c * $c)
            + (8.0 * $ePrimeSquared)
            + (24.0 * $t * $t))
            * pow($d, 5.0)
            / 120.0)
          / cos($phi1Rad)) * (180.0 / pi());

      return new LatLng($latitude, $longitude);
    }
  }
