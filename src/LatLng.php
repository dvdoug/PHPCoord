<?php

declare(strict_types=1);

namespace PHPCoord;

/**
 * Latitude/Longitude reference.
 *
 * @author Jonathan Stott
 * @author Doug Wright
 */
class LatLng
{
    /**
     * Latitude.
     *
     * @var float
     */
    protected $lat;

    /**
     * Longitude.
     *
     * @var float
     */
    protected $lng;

    /**
     * Height.
     *
     * @var float
     */
    protected $h;

    /**
     * Reference ellipsoid the co-ordinates are from.
     *
     * @var RefEll
     */
    protected $refEll;

    /**
     * Create a new LatLng object from the given latitude and longitude.
     */
    public function __construct(float $lat, float $lng, int $height, RefEll $refEll)
    {
        $this->lat = $lat;
        $this->lng = $lng;
        $this->h = $height;
        $this->refEll = $refEll;
    }

    /**
     * Return a string representation of this LatLng object.
     */
    public function __toString(): string
    {
        return "({$this->getLat()}, {$this->getLng()})";
    }

    public function getLat(): float
    {
        return round($this->lat, 5);
    }

    public function getLng(): float
    {
        return round($this->lng, 5);
    }

    public function getH(): int
    {
        return $this->h;
    }

    public function getRefEll(): RefEll
    {
        return $this->refEll;
    }

    /**
     * Calculate the surface distance between this LatLng object and the one
     * passed in as a parameter.
     *
     * @param LatLng $to a LatLng object to measure the surface distance to
     *
     * @return int distance in metres
     */
    public function distance(self $to): int
    {
        if ($this->refEll != $to->refEll) {
            throw new \RuntimeException('Source and destination co-ordinates are not using the same ellipsoid');
        }

        //Mean radius definition taken from Wikipedia
        $er = ((2 * $this->refEll->getMaj()) + $this->refEll->getMin()) / 3;

        $latFrom = deg2rad($this->lat);
        $latTo = deg2rad($to->lat);
        $lngFrom = deg2rad($this->lng);
        $lngTo = deg2rad($to->lng);

        $d = acos(sin($latFrom) * sin($latTo) + cos($latFrom) * cos($latTo) * cos($lngTo - $lngFrom)) * $er;

        return (int) round($d);
    }

    /**
     * Convert this LatLng object to OSGB36 datum.
     * Reference values for transformation are taken from OS document
     * "A Guide to Coordinate Systems in Great Britain".
     */
    public function toOSGB36(): self
    {
        if ($this->refEll == RefEll::airy1830()) {
            return $this;
        }

        $asWGS84 = $this->toWGS84();

        $tx = -446.448;
        $ty = 125.157;
        $tz = -542.060;
        $s = 0.0000204894;
        $rx = deg2rad(-0.1502 / 3600);
        $ry = deg2rad(-0.2470 / 3600);
        $rz = deg2rad(-0.8421 / 3600);

        return $asWGS84->transformDatum(RefEll::airy1830(), $tx, $ty, $tz, $s, $rx, $ry, $rz);
    }

    /**
     * Convert this LatLng object to ED50 datum.
     * Reference values for transformation are taken from http://www.globalmapper.com/helpv9/datum_list.htm .
     */
    public function toED50(): self
    {
        if ($this->refEll == RefEll::international1924()) {
            return $this;
        }

        $asWGS84 = $this->toWGS84();

        $tx = 87;
        $ty = 98;
        $tz = 121;
        $s = 0;
        $rx = deg2rad(0);
        $ry = deg2rad(0);
        $rz = deg2rad(0);

        return $asWGS84->transformDatum(RefEll::international1924(), $tx, $ty, $tz, $s, $rx, $ry, $rz);
    }

    /**
     * Convert this LatLng object to NAD27 datum.
     * Reference values for transformation are taken from Wikipedia.
     */
    public function toNAD27(): self
    {
        if ($this->refEll == RefEll::clarke1866()) {
            return $this;
        }

        $asWGS84 = $this->toWGS84();

        $tx = 8;
        $ty = -160;
        $tz = -176;
        $s = 0;
        $rx = deg2rad(0);
        $ry = deg2rad(0);
        $rz = deg2rad(0);

        return $asWGS84->transformDatum(RefEll::clarke1866(), $tx, $ty, $tz, $s, $rx, $ry, $rz);
    }

    /**
     * Convert this LatLng object to Ireland 1975 datum.
     * Reference values for transformation are taken from OSI document
     * "Making maps compatible with GPS".
     */
    public function toIreland1975(): self
    {
        if ($this->refEll == RefEll::airyModified()) {
            return $this;
        }

        $asWGS84 = $this->toWGS84();

        $tx = -482.530;
        $ty = 130.596;
        $tz = -564.557;
        $s = -0.00000815;
        $rx = deg2rad(-1.042 / 3600);
        $ry = deg2rad(-0.214 / 3600);
        $rz = deg2rad(-0.631 / 3600);

        return $asWGS84->transformDatum(RefEll::airyModified(), $tx, $ty, $tz, $s, $rx, $ry, $rz);
    }

    /**
     * Convert this LatLng object to WGS84 datum.
     */
    public function toWGS84(): self
    {
        switch ($this->refEll) {
            case RefEll::wgs84():
                return $this; //do nothing

            case RefEll::airy1830(): // values from OSGB document "A Guide to Coordinate Systems in Great Britain"
                $tx = 446.448;
                $ty = -125.157;
                $tz = 542.060;
                $s = -0.0000204894;
                $rx = deg2rad(0.1502 / 3600);
                $ry = deg2rad(0.2470 / 3600);
                $rz = deg2rad(0.8421 / 3600);
                break;

            case RefEll::airyModified(): // values from OSI document "Making maps compatible with GPS"
                $tx = 482.530;
                $ty = -130.596;
                $tz = 564.557;
                $s = 0.00000815;
                $rx = deg2rad(1.042 / 3600);
                $ry = deg2rad(0.214 / 3600);
                $rz = deg2rad(0.631 / 3600);
                break;

            case RefEll::clarke1866(): // assumes NAD27, values from Wikipedia
                $tx = -8;
                $ty = 160;
                $tz = 176;
                $s = 0;
                $rx = deg2rad(0);
                $ry = deg2rad(0);
                $rz = deg2rad(0);
                break;

            case RefEll::international1924(): // assumes ED50, values from http://www.globalmapper.com/helpv9/datum_list.htm
                $tx = -87;
                $ty = -98;
                $tz = -121;
                $s = 0;
                $rx = deg2rad(0);
                $ry = deg2rad(0);
                $rz = deg2rad(0);
                break;

            case RefEll::bessel1841(): // assumes Germany, values from Wikipedia
                $tx = 582;
                $ty = -105;
                $tz = -414;
                $s = 0.0000083;
                $rx = deg2rad(1.04 / 3600);
                $ry = deg2rad(0.35 / 3600);
                $rz = deg2rad(-3.08 / 3600);
                break;

            default:
                throw new \RuntimeException('Transform parameters not known for this ellipsoid');
        }

        return $this->transformDatum(RefEll::wgs84(), $tx, $ty, $tz, $s, $rx, $ry, $rz);
    }

    /**
     * Transform co-ordinates from one datum to another using a Helmert transformation.
     *
     * @param float $rotX rotation about x-axis in seconds
     * @param float $rotY rotation about y-axis in seconds
     * @param float $rotZ rotation about z-axis in seconds
     */
    public function transformDatum(RefEll $toRefEll, float $tranX, float $tranY, float $tranZ, float $scale, float $rotX, float $rotY, float $rotZ): self
    {
        if ($this->refEll == $toRefEll) {
            return $this;
        }

        $cartesian = Cartesian::fromLatLong($this);
        $newCartesian = $cartesian->transformDatum($toRefEll, $tranX, $tranY, $tranZ, $scale, $rotX, $rotY, $rotZ);

        return $newCartesian->toLatitudeLongitude();
    }

    /**
     * Convert this LatLng object into an OSGB grid reference. Note that this
     * function does not take into account the bounds of the OSGB grid -
     * beyond the bounds of the OSGB grid, the resulting OSRef object has no
     * meaning.
     *
     * Reference values for transformation are taken from OS document
     * "A Guide to Coordinate Systems in Great Britain".
     */
    public function toOSRef(): OSRef
    {
        $asOSGB36 = $this->toOSGB36();

        $OSGB = new OSRef(0, 0); //dummy to get reference data
        $scale = $OSGB->getScaleFactor();
        $N0 = $OSGB->getOriginNorthing();
        $E0 = $OSGB->getOriginEasting();
        $phi0 = $OSGB->getOriginLatitude();
        $lambda0 = $OSGB->getOriginLongitude();

        $coords = $asOSGB36->toTransverseMercatorEastingNorthing($scale, $E0, $N0, $phi0, $lambda0);

        return new OSRef($coords['E'], $coords['N'], $this->h);
    }

    /**
     * Convert this LatLng object into an ITM grid reference.
     *
     * @return ITMRef
     */
    public function toITMRef()
    {
        $asWGS84 = $this->toWGS84();

        $ITM = new ITMRef(0, 0); //dummy to get reference data
        $scale = $ITM->getScaleFactor();
        $N0 = $ITM->getOriginNorthing();
        $E0 = $ITM->getOriginEasting();
        $phi0 = $ITM->getOriginLatitude();
        $lambda0 = $ITM->getOriginLongitude();

        $coords = $asWGS84->toTransverseMercatorEastingNorthing($scale, $E0, $N0, $phi0, $lambda0);

        return new ITMRef($coords['E'], $coords['N'], $this->h);
    }

    /**
     * Convert a WGS84 latitude and longitude to an UTM reference.
     *
     * Reference values for transformation are taken from OS document
     * "A Guide to Coordinate Systems in Great Britain".
     */
    public function toUTMRef(): UTMRef
    {
        $asWGS84 = $this->toWGS84();
        $lat = $asWGS84->getLat();
        $lng = $asWGS84->getLng();

        $longitudeZone = (int) (($asWGS84->getLng() + 180) / 6) + 1;

        // Special zone for Norway
        if ($lat >= 56 && $lat < 64 && $lng >= 3 && $lng < 12) {
            $longitudeZone = 32;
        } elseif ($lat >= 72 && $lat < 84 && $lng >= 0 && $lng < 42) { // Special zones for Svalbard
            if ($lng < 9) {
                $longitudeZone = 31;
            } elseif ($lng < 21) {
                $longitudeZone = 33;
            } elseif ($lng < 33) {
                $longitudeZone = 35;
            } else {
                $longitudeZone = 37;
            }
        }

        $UTMZone = $this->getUTMLatitudeZoneLetter($asWGS84->getLat());

        $UTM = new UTMRef(0, 0, 0, $UTMZone, $longitudeZone); //dummy to get reference data
        $scale = $UTM->getScaleFactor();
        $N0 = $UTM->getOriginNorthing();
        $E0 = $UTM->getOriginEasting();
        $phi0 = $UTM->getOriginLatitude();
        $lambda0 = $UTM->getOriginLongitude();

        $coords = $asWGS84->toTransverseMercatorEastingNorthing($scale, $E0, $N0, $phi0, $lambda0);

        if ($asWGS84->getLat() < 0) {
            $coords['N'] += 10000000;
        }

        return new UTMRef($coords['E'], $coords['N'], $asWGS84->getH(), $UTMZone, $longitudeZone);
    }

    /**
     * Work out the UTM latitude zone from the latitude.
     */
    private function getUTMLatitudeZoneLetter(float $latitude): string
    {
        if ($latitude < -80 || $latitude > 84) {
            throw new \OutOfRangeException('UTM zones do not apply in polar regions');
        }

        $zones = 'CDEFGHJKLMNPQRSTUVWXX';
        $zoneIndex = (int) (($latitude + 80) / 8);

        return $zones[$zoneIndex];
    }

    /**
     * Convert a latitude and longitude to easting and northing using a Transverse Mercator projection
     * Formula for transformation is taken from OS document
     * "A Guide to Coordinate Systems in Great Britain".
     *
     * @param float $scale          scale factor on central meridian
     * @param float $originEasting  easting of true origin
     * @param float $originNorthing northing of true origin
     * @param float $originLat      latitude of true origin
     * @param float $originLong     longitude of true origin
     */
    public function toTransverseMercatorEastingNorthing(
        float $scale,
        float $originEasting,
        float $originNorthing,
        float $originLat,
        float $originLong
    ): array {
        $originLat = deg2rad($originLat);
        $originLong = deg2rad($originLong);

        $lat = deg2rad($this->lat);
        $sinLat = sin($lat);
        $cosLat = cos($lat);
        $tanLat = tan($lat);
        $tanLatSq = $tanLat ** 2;
        $long = deg2rad($this->lng);

        $n = ($this->refEll->getMaj() - $this->refEll->getMin()) / ($this->refEll->getMaj() + $this->refEll->getMin());
        $nSq = $n ** 2;
        $nCu = $n ** 3;

        $v = $this->refEll->getMaj() * $scale * ((1 - $this->refEll->getEcc() * ($sinLat ** 2)) ** -0.5);
        $p = $this->refEll->getMaj() * $scale * (1 - $this->refEll->getEcc()) * ((1 - $this->refEll->getEcc() * ($sinLat ** 2)) ** -1.5);
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
        $III = $v / 24 * $sinLat * ($cosLat ** 3) * (5 - $tanLatSq + 9 * $hSq);
        $IIIA = $v / 720 * $sinLat * ($cosLat ** 5) * (61 - 58 * $tanLatSq + ($tanLatSq ** 2));
        $IV = $v * $cosLat;
        $V = $v / 6 * ($cosLat ** 3) * ($v / $p - $tanLatSq);
        $VI = $v / 120 * ($cosLat ** 5) * (5 - 18 * $tanLatSq + ($tanLatSq ** 2) + 14 * $hSq - 58 * $tanLatSq * $hSq);

        $E = (int) round($originEasting + $IV * $longMinusOrigin + $V * ($longMinusOrigin ** 3) + $VI * ($longMinusOrigin ** 5));
        $N = (int) round($I + $II * ($longMinusOrigin ** 2) + $III * ($longMinusOrigin ** 4) + $IIIA * ($longMinusOrigin ** 6));

        return ['E' => $E, 'N' => $N];
    }
}
