<?php
/**
 * PHPCoord
 * @package PHPCoord
 * @author Jonathan Stott
 * @author Doug Wright
 */
  namespace PHPCoord;

  /**
   * Ordnance Survey grid reference
   * @author Jonathan Stott
   * @author Doug Wright
   * @package PHPCoord
   */
  // References given with OSRef are accurate to 1m.
  class OSRef {

    var $easting;
    var $northing;


    /**
     * Create a new OSRef object representing an OSGB grid reference. Note
     * that the parameters for this constructor require eastings and
     * northings with 1m accuracy and need to be absolute with respect to
     * the whole of the British Grid. For example, to create an OSRef
     * object from the six-figure grid reference TG514131, the easting would
     * be 651400 and the northing would be 313100.
     *
     * Grid references with accuracy greater than 1m can be represented
     * using floating point values for the easting and northing. For example,
     * a value representing an easting or northing accurate to 1mm would be
     * given as 651400.0001.
     *
     * @param easting the easting of the reference (with 1m accuracy)
     * @param northing the northing of the reference (with 1m accuracy)
     */
    function OSRef($easting, $northing) {
      $this->easting  = $easting;
      $this->northing = $northing;
    }


    /**
     * Convert this grid reference into a string showing the exact values
     * of the easting and northing.
     *
     * @return
     */
    function toString() {
      return "(" . $this->easting . ", " . $this->northing . ")";
    }


    /**
     * Convert this grid reference into a string using a standard six-figure
     * grid reference including the two-character designation for the 100km
     * square. e.g. TG514131.
     *
     * @return
     */
    function toSixFigureString() {
      $hundredkmE = floor($this->easting / 100000);
      $hundredkmN = floor($this->northing / 100000);
      $firstLetter = "";
      if ($hundredkmN < 5) {
        if ($hundredkmE < 5) {
          $firstLetter = "S";
        } else {
          $firstLetter = "T";
        }
      } else if ($hundredkmN < 10) {
        if ($hundredkmE < 5) {
          $firstLetter = "N";
        } else {
          $firstLetter = "O";
        }
      } else {
        $firstLetter = "H";
      }

      $secondLetter = "";
      $index = 65 + ((4 - ($hundredkmN % 5)) * 5) + ($hundredkmE % 5);
      $ti = $index;
      if ($index >= 73) $index++;
      $secondLetter = chr($index);

      $e = round(($this->easting - (100000 * $hundredkmE)) / 100);
      $n = round(($this->northing - (100000 * $hundredkmN)) / 100);

      return sprintf("%s%s%03d%03d", $firstLetter, $secondLetter, $e, $n);
    }


    /**
     * Convert this grid reference into a latitude and longitude
     *
     * @return
     */
    function toLatLng() {
      $airy1830 = new RefEll(6377563.396, 6356256.909);
      $OSGB_F0  = 0.9996012717;
      $N0       = -100000.0;
      $E0       = 400000.0;
      $phi0     = deg2rad(49.0);
      $lambda0  = deg2rad(-2.0);
      $a        = $airy1830->maj;
      $b        = $airy1830->min;
      $eSquared = $airy1830->ecc;
      $phi      = 0.0;
      $lambda   = 0.0;
      $E        = $this->easting;
      $N        = $this->northing;
      $n        = ($a - $b) / ($a + $b);
      $M        = 0.0;
      $phiPrime = (($N - $N0) / ($a * $OSGB_F0)) + $phi0;
      do {
        $M =
          ($b * $OSGB_F0)
            * (((1 + $n + ((5.0 / 4.0) * $n * $n) + ((5.0 / 4.0) * $n * $n * $n))
              * ($phiPrime - $phi0))
              - (((3 * $n) + (3 * $n * $n) + ((21.0 / 8.0) * $n * $n * $n))
                * sin($phiPrime - $phi0)
                * cos($phiPrime + $phi0))
              + ((((15.0 / 8.0) * $n * $n) + ((15.0 / 8.0) * $n * $n * $n))
                * sin(2.0 * ($phiPrime - $phi0))
                * cos(2.0 * ($phiPrime + $phi0)))
              - (((35.0 / 24.0) * $n * $n * $n)
                * sin(3.0 * ($phiPrime - $phi0))
                * cos(3.0 * ($phiPrime + $phi0))));
        $phiPrime += ($N - $N0 - $M) / ($a * $OSGB_F0);
      } while (($N - $N0 - $M) >= 0.001);
      $v = $a * $OSGB_F0 * pow(1.0 - $eSquared * sinSquared($phiPrime), -0.5);
      $rho =
        $a
          * $OSGB_F0
          * (1.0 - $eSquared)
          * pow(1.0 - $eSquared * sinSquared($phiPrime), -1.5);
      $etaSquared = ($v / $rho) - 1.0;
      $VII = tan($phiPrime) / (2 * $rho * $v);
      $VIII =
        (tan($phiPrime) / (24.0 * $rho * pow($v, 3.0)))
          * (5.0
            + (3.0 * tanSquared($phiPrime))
            + $etaSquared
            - (9.0 * tanSquared($phiPrime) * $etaSquared));
      $IX =
        (tan($phiPrime) / (720.0 * $rho * pow($v, 5.0)))
          * (61.0
            + (90.0 * tanSquared($phiPrime))
            + (45.0 * tanSquared($phiPrime) * tanSquared($phiPrime)));
      $X = sec($phiPrime) / $v;
      $XI =
        (sec($phiPrime) / (6.0 * $v * $v * $v))
          * (($v / $rho) + (2 * tanSquared($phiPrime)));
      $XII =
        (sec($phiPrime) / (120.0 * pow($v, 5.0)))
          * (5.0
            + (28.0 * tanSquared($phiPrime))
            + (24.0 * tanSquared($phiPrime) * tanSquared($phiPrime)));
      $XIIA =
        (sec($phiPrime) / (5040.0 * pow($v, 7.0)))
          * (61.0
            + (662.0 * tanSquared($phiPrime))
            + (1320.0 * tanSquared($phiPrime) * tanSquared($phiPrime))
            + (720.0
              * tanSquared($phiPrime)
              * tanSquared($phiPrime)
              * tanSquared($phiPrime)));
      $phi =
        $phiPrime
          - ($VII * pow($E - $E0, 2.0))
          + ($VIII * pow($E - $E0, 4.0))
          - ($IX * pow($E - $E0, 6.0));
      $lambda =
        $lambda0
          + ($X * ($E - $E0))
          - ($XI * pow($E - $E0, 3.0))
          + ($XII * pow($E - $E0, 5.0))
          - ($XIIA * pow($E - $E0, 7.0));

      return new LatLng(rad2deg($phi), rad2deg($lambda));
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