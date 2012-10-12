<?php

  // ================================================================== UTMRef

  class UTMRef {

    var $easting;
    var $northing;
    var $latZone;
    var $lngZone;


    /**
     * Create a new object representing a UTM reference.
     *
     * @param easting
     * @param northing
     * @param latZone
     * @param lngZone
     */
    function UTMRef($easting, $northing, $latZone, $lngZone) {
      $this->easting  = $easting;
      $this->northing = $northing;
      $this->latZone  = $latZone;
      $this->lngZone  = $lngZone;
    }


    /**
     * Return a string representation of this UTM reference
     *
     * @return
     */
    function toString() {
      return $this->lngZone . $this->latZone . " " .
             $this->easting . " " . $this->northing;
    }


    /**
     * Convert this UTM reference to a latitude and longitude
     *
     * @return the converted latitude and longitude
     */
    function toLatLng() {
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


  // ================================================================== RefEll

  class RefEll {

    var $maj;
    var $min;
    var $ecc;


    /**
     * Create a new RefEll object to represent a reference ellipsoid
     *
     * @param maj the major axis
     * @param min the minor axis
     */
    function RefEll($maj, $min) {
      $this->maj = $maj;
      $this->min = $min;
      $this->ecc = (($maj * $maj) - ($min * $min)) / ($maj * $maj);
    }
  }


  // ================================================== Mathematical Functions

  function sinSquared($x) {
    return sin($x) * sin($x);
  }

  function cosSquared($x) {
    return cos($x) * cos($x);
  }

  function tanSquared($x) {
    return tan($x) * tan($x);
  }

  function sec($x) {
    return 1.0 / cos($x);
  }


  /**
   * Take a string formatted as a six-figure OS grid reference (e.g.
   * "TG514131") and return a reference to an OSRef object that represents
   * that grid reference. The first character must be H, N, S, O or T.
   * The second character can be any uppercase character from A through Z
   * excluding I.
   *
   * @param ref
   * @return
   * @since 2.1
   */
  function getOSRefFromSixFigureReference($ref) {
    $char1 = substr($ref, 0, 1);
    $char2 = substr($ref, 1, 1);
    $east  = substr($ref, 2, 3) * 100;
    $north = substr($ref, 5, 3) * 100;
    if ($char1 == 'H') {
      $north += 1000000;
    } else if ($char1 == 'N') {
      $north += 500000;
    } else if ($char1 == 'O') {
      $north += 500000;
      $east  += 500000;
    } else if ($char1 == 'T') {
      $east += 500000;
    }
    $char2ord = ord($char2);
    if ($char2ord > 73) $char2ord--; // Adjust for no I
    $nx = (($char2ord - 65) % 5) * 100000;
    $ny = (4 - floor(($char2ord - 65) / 5)) * 100000;
    return new OSRef($east + $nx, $north + $ny);
  }


  /**
   *  Work out the UTM latitude zone from the latitude
   *
   * @param latitude
   * @return
   */
  function getUTMLatitudeZoneLetter($latitude) {
    if ((84 >= $latitude) && ($latitude >= 72)) return "X";
    else if (( 72 > $latitude) && ($latitude >=  64)) return "W";
    else if (( 64 > $latitude) && ($latitude >=  56)) return "V";
    else if (( 56 > $latitude) && ($latitude >=  48)) return "U";
    else if (( 48 > $latitude) && ($latitude >=  40)) return "T";
    else if (( 40 > $latitude) && ($latitude >=  32)) return "S";
    else if (( 32 > $latitude) && ($latitude >=  24)) return "R";
    else if (( 24 > $latitude) && ($latitude >=  16)) return "Q";
    else if (( 16 > $latitude) && ($latitude >=   8)) return "P";
    else if ((  8 > $latitude) && ($latitude >=   0)) return "N";
    else if ((  0 > $latitude) && ($latitude >=  -8)) return "M";
    else if (( -8 > $latitude) && ($latitude >= -16)) return "L";
    else if ((-16 > $latitude) && ($latitude >= -24)) return "K";
    else if ((-24 > $latitude) && ($latitude >= -32)) return "J";
    else if ((-32 > $latitude) && ($latitude >= -40)) return "H";
    else if ((-40 > $latitude) && ($latitude >= -48)) return "G";
    else if ((-48 > $latitude) && ($latitude >= -56)) return "F";
    else if ((-56 > $latitude) && ($latitude >= -64)) return "E";
    else if ((-64 > $latitude) && ($latitude >= -72)) return "D";
    else if ((-72 > $latitude) && ($latitude >= -80)) return "C";
    else return 'Z';
  }

?>