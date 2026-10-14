<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\CoordinateOperation;

use Composer\Pcre\Preg;
use PHPCoord\Exception\UnknownConversionException;
use PHPCoord\UnitOfMeasure\Length\Metre;

use function count;
use function floor;
use function intdiv;

/**
 * PatchJGD height file: third-order mesh code and a height offset in metres.
 * The offset is at the south-west corner of that mesh. Corners are 30 arc-seconds
 * apart in latitude and 45 arc-seconds apart in longitude. A missing corner is outside the grid.
 */
class PatchJGDHeightGrid extends GeographicGeoidHeightGrid
{
    private const LATITUDE_STEP_SECONDS = 30;

    private const LONGITUDE_STEP_SECONDS = 45;

    /**
     * @var array<int, float>
     */
    private array $offsets = [];

    public function __construct(string $filename)
    {
        $this->gridFile = new GridFile($filename);

        $size = $this->gridFile->getSize();
        $contents = $size > 0 ? $this->gridFile->fread($size) : '';
        Preg::matchAll('/^(\d{8})[ \t]+(\S+)/m', $contents, $matches);
        if (!isset($matches[1], $matches[2]) || $matches[1] === []) {
            throw new UnknownConversionException('No height records in ' . $filename);
        }

        /** @var list<string> $meshCodes */
        $meshCodes = $matches[1];
        /** @var list<string> $heights */
        $heights = $matches[2];
        // Numeric-string keys are stored as ints, which is what meshCode() looks up.
        $offsets = [];
        $recordCount = count($meshCodes);
        for ($i = 0; $i < $recordCount; ++$i) {
            $offsets[(int) $meshCodes[$i]] = (float) $heights[$i];
        }
        $this->offsets = $offsets;
    }

    /**
     * @return Metre[]
     */
    public function getValues(float $x, float $y): array
    {
        $latitudeSeconds = $y * 3600;
        $longitudeSeconds = $x * 3600;
        $south = ((int) floor($latitudeSeconds / self::LATITUDE_STEP_SECONDS + 1e-9)) * self::LATITUDE_STEP_SECONDS;
        $west = ((int) floor($longitudeSeconds / self::LONGITUDE_STEP_SECONDS + 1e-9)) * self::LONGITUDE_STEP_SECONDS;
        $dy = ($latitudeSeconds - $south) / self::LATITUDE_STEP_SECONDS;
        $dx = ($longitudeSeconds - $west) / self::LONGITUDE_STEP_SECONDS;
        if ($dy < 1e-9) {
            $dy = 0.0;
        } elseif ($dy > 1) {
            $dy = 1.0;
        }
        if ($dx < 1e-9) {
            $dx = 0.0;
        } elseif ($dx > 1) {
            $dx = 1.0;
        }

        $mesh = $this->meshCode($south, $west);
        $southWest = $this->offsets[$mesh] ?? null;
        $southEast = $dx === 0.0 ? $southWest : ($this->offsets[$this->neighbour($mesh, 0, 1)] ?? null);
        $northWest = $dy === 0.0 ? $southWest : ($this->offsets[$this->neighbour($mesh, 1, 0)] ?? null);
        $northEast = $dx === 0.0 || $dy === 0.0 ? $southWest : ($this->offsets[$this->neighbour($mesh, 1, 1)] ?? null);
        if ($southWest === null || $southEast === null || $northWest === null || $northEast === null) {
            throw new UnknownConversionException('Coordinate is outside the grid');
        }

        $offset = (1 - $dx) * (1 - $dy) * $southWest
            + $dx * (1 - $dy) * $southEast
            + (1 - $dx) * $dy * $northWest
            + $dx * $dy * $northEast;

        return [new Metre($offset)];
    }

    private function meshCode(int $latitudeSeconds, int $longitudeSeconds): int
    {
        $latitudeFirst = intdiv($latitudeSeconds, 2400);
        $latitudeRemainder = $latitudeSeconds - $latitudeFirst * 2400;
        $latitudeSecond = intdiv($latitudeRemainder, 300);
        $latitudeRemainder -= $latitudeSecond * 300;
        $latitudeThird = intdiv($latitudeRemainder, self::LATITUDE_STEP_SECONDS);

        $longitudeDegrees = intdiv($longitudeSeconds, 3600);
        $longitudeRemainder = $longitudeSeconds - $longitudeDegrees * 3600;
        $longitudeSecond = intdiv($longitudeRemainder, 450);
        $longitudeRemainder -= $longitudeSecond * 450;
        $longitudeThird = intdiv($longitudeRemainder, self::LONGITUDE_STEP_SECONDS);

        return $latitudeFirst * 1000000
            + ($longitudeDegrees - 100) * 10000
            + $latitudeSecond * 1000
            + $longitudeSecond * 100
            + $latitudeThird * 10
            + $longitudeThird;
    }

    private function neighbour(int $meshCode, int $northSteps, int $eastSteps): int
    {
        $latitudeFirst = intdiv($meshCode, 1000000);
        $longitudeFirst = intdiv($meshCode % 1000000, 10000);
        $latitudeSecond = intdiv($meshCode % 10000, 1000);
        $longitudeSecond = intdiv($meshCode % 1000, 100);
        $latitudeThird = intdiv($meshCode % 100, 10);
        $longitudeThird = $meshCode % 10;

        $latitudeThird += $northSteps;
        $latitudeSecond += intdiv($latitudeThird, 10);
        $latitudeThird %= 10;
        $latitudeFirst += intdiv($latitudeSecond, 8);
        $latitudeSecond %= 8;

        $longitudeThird += $eastSteps;
        $longitudeSecond += intdiv($longitudeThird, 10);
        $longitudeThird %= 10;
        $longitudeFirst += intdiv($longitudeSecond, 8);
        $longitudeSecond %= 8;

        return $latitudeFirst * 1000000
            + $longitudeFirst * 10000
            + $latitudeSecond * 1000
            + $longitudeSecond * 100
            + $latitudeThird * 10
            + $longitudeThird;
    }
}
