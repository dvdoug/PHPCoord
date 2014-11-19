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
   * References are accurate to 1m
   * @author Jonathan Stott
   * @author Doug Wright
   * @package PHPCoord
   */
  class OSRef {

    /**
     * Easting
     * @api
     * @var int
     */
    public $easting;

    /**
     * Northing
     * @api
     * @var int
     */
    public $northing;

    /**
     * Create a new OSRef object representing an OSGB grid reference. Note
     * that the parameters for this constructor require eastings and
     * northings with 1m accuracy and need to be absolute with respect to
     * the whole of the British Grid. For example, to create an OSRef
     * object from the six-figure grid reference TG514131, the easting would
     * be 651400 and the northing would be 313100.
     *
     * @param int $aEasting the easting of the reference (with 1m accuracy)
     * @param int $aNorthing the northing of the reference (with 1m accuracy)
     */
    public function __construct($aEasting, $aNorthing) {
      $this->easting  = round($aEasting);
      $this->northing = round($aNorthing);
    }

    /**
     * Convert this grid reference into a string showing the exact values
     * of the easting and northing.
     * @return string
     */
    public function __toString() {
      return "({$this->easting}, {$this->northing})";
    }

    /**
     * Convert this grid reference into a string using a standard six-figure
     * grid reference including the two-character designation for the 100km
     * square. e.g. TG514131.
     * @return string
     */
    public function toSixFigureString() {

      $easting = str_pad($this->easting, 6, 0, STR_PAD_LEFT);
      $northing = str_pad($this->northing, 6, 0, STR_PAD_LEFT);

      $hundredkmE = $easting[0];
      $hundredkmN = $northing[0];

      if ($hundredkmN < 5 && $hundredkmE < 5) {
        $firstLetter = 'S';
      }
      else if ($hundredkmN < 5 && $hundredkmE >= 5) {
        $firstLetter = 'T';
      }
      else if ($hundredkmN < 10 && $hundredkmE < 5) {
        $firstLetter = 'N';
      }
      else if ($hundredkmN < 10 && $hundredkmE >= 5) {
        $firstLetter = 'O';
      }
      else {
        $firstLetter = 'H';
      }

      $index = 65 + ((4 - ($hundredkmN % 5)) * 5) + ($hundredkmE % 5);
      if ($index >= 73) { //skip the letter I
        $index++;
      }
      $secondLetter = chr($index);

      return $firstLetter . $secondLetter . substr($easting, 1, 3) . substr($northing, 1, 3);
    }


    /**
     * Convert this grid reference into a latitude and longitude
     * @return LatLng
     */
    public function toLatLng() {
      $airy1830 = RefEll::Airy1830();
      $OSGB_F0  = 0.9996012717;
      $N0       = -100000;
      $E0       = 400000;
      $phi0     = deg2rad(49);
      $lambda0  = deg2rad(-2);
      $a        = $airy1830->maj;
      $b        = $airy1830->min;
      $eSquared = $airy1830->ecc;
      $phi      = 0;
      $lambda   = 0;
      $E        = $this->easting;
      $N        = $this->northing;
      $n        = ($a - $b) / ($a + $b);
      $M        = 0;
      $phiPrime = (($N - $N0) / ($a * $OSGB_F0)) + $phi0;
      do {
        $M =
          ($b * $OSGB_F0)
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
        $phiPrime += ($N - $N0 - $M) / ($a * $OSGB_F0);
      } while (($N - $N0 - $M) >= 0.001);
      $v = $a * $OSGB_F0 * pow(1 - $eSquared * pow(sin($phiPrime), 2), -0.5);
      $rho =
        $a
          * $OSGB_F0
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
      $X = (1/cos($phiPrime)) / $v;
      $XI =
        ((1/cos($phiPrime)) / (6 * $v * $v * $v))
          * (($v / $rho) + (2 * pow(tan($phiPrime), 2)));
      $XII =
        ((1/cos($phiPrime)) / (120 * pow($v, 5)))
          * (5
            + (28 * pow(tan($phiPrime), 2))
            + (24 * pow(tan($phiPrime), 2) * pow(tan($phiPrime), 2)));
      $XIIA =
        ((1/cos($phiPrime)) / (5040 * pow($v, 7)))
          * (61
            + (662 * pow(tan($phiPrime), 2))
            + (1320 * pow(tan($phiPrime), 2) * pow(tan($phiPrime), 2))
            + (720
              * pow(tan($phiPrime), 2)
              * pow(tan($phiPrime), 2)
              * pow(tan($phiPrime), 2)));
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

      return new LatLng(rad2deg($phi), rad2deg($lambda), RefEll::Airy1830());
    }

    /**
     * Take a string formatted as a six-figure OS grid reference (e.g.
     * "TG514131") and return a reference to an OSRef object that represents
     * that grid reference. The first character must be H, N, S, O or T.
     * The second character can be any uppercase character from A through Z
     * excluding I.
     *
     * @param string $aRef
     * @return OSRef
     */
    public static function getOSRefFromSixFigureReference($aRef) {
      $char1 = substr($aRef, 0, 1);
      $char2 = substr($aRef, 1, 1);
      $east  = substr($aRef, 2, 3) * 100;
      $north = substr($aRef, 5, 3) * 100;
      if ($char1 == 'H') {
        $north += 1000000;
      }
      else if ($char1 == 'N') {
        $north += 500000;
      }
      else if ($char1 == 'O') {
        $north += 500000;
        $east  += 500000;
      }
      else if ($char1 == 'T') {
        $east += 500000;
      }
      $char2ord = ord($char2);
      if ($char2ord > 73) { // Adjust for no I
        $char2ord--;
      }
      $nx = (($char2ord - 65) % 5) * 100000;
      $ny = (4 - floor(($char2ord - 65) / 5)) * 100000;
      return new OSRef($east + $nx, $north + $ny);
    }
  }
