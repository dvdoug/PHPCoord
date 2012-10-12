<?php
/**
 * PHPCoord
 * @package PHPCoord
 * @author Jonathan Stott
 * @author Doug Wright
 */
  namespace PHPCoord;

  /**
   * reference ellipsoid
   * @author Jonathan Stott
   * @author Doug Wright
   * @package PHPCoord
   */
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