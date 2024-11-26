<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\CoordinateSystem;

class Axis
{
    public const DEPTH = 'Depth';

    public const EASTING = 'Easting';

    public const ELLIPSOIDAL_HEIGHT = 'Ellipsoidal height';

    public const GEOCENTRIC_X = 'Geocentric X';

    public const GEOCENTRIC_Y = 'Geocentric Y';

    public const GEOCENTRIC_Z = 'Geocentric Z';

    public const GEODETIC_LATITUDE = 'Geodetic latitude';

    public const GEODETIC_LONGITUDE = 'Geodetic longitude';

    public const GRAVITY_RELATED_HEIGHT = 'Gravity-related height';

    public const LOCAL_DEPTH = 'Local depth';

    public const NORTHING = 'Northing';

    public const SOUTHING = 'Southing';

    public const WESTING = 'Westing';

    private string $orientation;

    private string $abbreviation;

    private string $name;

    private string $unitOfMeasureId;

    public function __construct(
        string $orientation,
        string $abbreviation,
        string $name,
        string $unitOfMeasureId
    ) {
        $this->orientation = $orientation;
        $this->abbreviation = $abbreviation;
        $this->name = $name;
        $this->unitOfMeasureId = $unitOfMeasureId;
    }

    public function getOrientation(): string
    {
        return $this->orientation;
    }

    public function getAbbreviation(): string
    {
        return $this->abbreviation;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getUnitOfMeasureId(): string
    {
        return $this->unitOfMeasureId;
    }
}
