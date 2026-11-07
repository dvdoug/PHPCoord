<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\UnitOfMeasure\Angle;

use Composer\Pcre\Preg;
use InvalidArgumentException;

use function abs;
use function in_array;
use function intdiv;
use function log10;
use function round;
use function rtrim;
use function sprintf;
use function str_contains;
use function str_pad;
use function str_replace;
use function strlen;
use function strpos;
use function max;

use const M_PI;
use const STR_PAD_RIGHT;

class Degree extends Angle
{
    private float $angle;

    public function __construct(float $angle)
    {
        $this->angle = $angle;
    }

    public function asRadians(): Radian
    {
        return new Radian($this->angle * M_PI / 180);
    }

    public function asDegrees(): self
    {
        return $this;
    }

    public function getValue(): float
    {
        return $this->angle;
    }

    public function getUnitName(): string
    {
        return 'degree';
    }

    public static function fromDegreeMinuteSecond(string $angle): self
    {
        $regex = '/^(?P<negative>[−-])?(?P<degrees>\d+)[°º]?((?P<arcminutes>\d+)[′\'])?((?P<arcseconds>\d+\.?\d*)[″"])?$/u';

        return self::fromRegex($angle, $regex);
    }

    public static function fromDegreeMinuteSecondHemisphere(string $angle): self
    {
        $regex = '/^(?P<degrees>\d+)[°º]?((?P<arcminutes>\d+)[′\'])?((?P<arcseconds>\d+\.?\d*)[″"])?(?P<hemisphere>[NSEW])$/u';

        return self::fromRegex($angle, $regex);
    }

    public static function fromHemisphereDegreeMinuteSecond(string $angle): self
    {
        $regex = '/^(?P<hemisphere>[NSEW])(?P<degrees>\d+)[°º]?((?P<arcminutes>\d+)[′\'])?((?P<arcseconds>\d+\.?\d*)[″"])?$/u';

        return self::fromRegex($angle, $regex);
    }

    public static function fromDegreeMinute(string $angle): self
    {
        $regex = '/^(?P<negative>[−-])?(?P<degrees>\d+)[°º]?((?P<arcminutes>\d+\.?\d*)[′\'])?$/u';

        return self::fromRegex($angle, $regex);
    }

    public static function fromDegreeMinuteHemisphere(string $angle): self
    {
        $regex = '/^(?P<degrees>\d+)[°º]?((?P<arcminutes>\d+\.?\d*)[′\'])?(?P<hemisphere>[NSEW])$/u';

        return self::fromRegex($angle, $regex);
    }

    public static function fromHemisphereDegreeMinute(string $angle): self
    {
        $regex = '/^(?P<hemisphere>[NSEW])(?P<degrees>\d+)[°º]?((?P<arcminutes>\d+\.?\d*)[′\'])?$/u';

        return self::fromRegex($angle, $regex);
    }

    public static function fromDegreeHemisphere(string $angle): self
    {
        $regex = '/^(?P<degrees>\d+\.?\d*)[°º]?(?P<hemisphere>[NSEW])$/u';

        return self::fromRegex($angle, $regex);
    }

    public static function fromHemisphereDegree(string $angle): self
    {
        $regex = '/^(?P<hemisphere>[NSEW])(?P<degrees>\d+\.?\d*)[°º]?$/u';

        return self::fromRegex($angle, $regex);
    }

    public static function fromSexagesimalDMSS(string $angle): self
    {
        $regex = '/^(?P<negative>[−-])?(?P<degrees>\d+)(?P<arcminutes>\d{2})(?P<arcseconds>\d{2}\.\d*)$/u';

        return self::fromRegex($angle, $regex);
    }

    public static function fromSexagesimalDMS(string $angle): self
    {
        $decimalPosition = strpos($angle, '.');
        if ($decimalPosition) {
            $angle = str_pad($angle, $decimalPosition + 5, '0', STR_PAD_RIGHT);
        } else {
            $angle .= '.0000';
        }
        $regex = '/^(?P<negative>[−-])?(?P<degrees>\d+)\.(?P<arcminutes>\d{2})(?P<arcseconds>\d{2})(?P<fractionarcseconds>\d+)?$/u';

        return self::fromRegex($angle, $regex);
    }

    public static function fromSexagesimalDM(string $angle): self
    {
        $decimalPosition = strpos($angle, '.');
        if ($decimalPosition) {
            $angle = str_pad($angle, $decimalPosition + 5, '0', STR_PAD_RIGHT);
        } else {
            $angle .= '.0000';
        }
        $regex = '/^(?P<negative>[−-])?(?P<degrees>\d+)\.(?P<arcminutes>\d{2})(?P<fractionarcminutes>\d+)?$/u';

        return self::fromRegex($angle, $regex);
    }

    /**
     * @param non-empty-string $regex
     */
    private static function fromRegex(string $angle, string $regex): self
    {
        /** @var non-empty-string $angle */
        $angle = str_replace(' ', '', $angle);
        $foundAngle = Preg::match($regex, $angle, $angleParts);

        if (!$foundAngle) {
            throw new InvalidArgumentException("Could not find angle in '{$angle}'");
        }

        $degrees = (float) $angleParts['degrees'];
        $degrees += ((float) ($angleParts['arcminutes'] ?? 0) / 60);
        $degrees += isset($angleParts['fractionarcminutes']) ? ((float) $angleParts['fractionarcminutes'] / 60 / 10 ** strlen($angleParts['fractionarcminutes'])) : 0;
        $degrees += ((float) ($angleParts['arcseconds'] ?? 0) / 3600);
        $degrees += isset($angleParts['fractionarcseconds']) ? ((float) $angleParts['fractionarcseconds'] / 3600 / 10 ** strlen($angleParts['fractionarcseconds'])) : 0;

        if (($angleParts['negative'] ?? '') || in_array($angleParts['hemisphere'] ?? [], ['S', 'W'], true)) {
            $degrees *= -1;
        }

        return new static($degrees);
    }

    public static function convert(Angle $angle, string $targetSRID): Angle
    {
        if ($targetSRID === self::EPSG_DEGREE) {
            return $angle;
        }

        return parent::convert($angle, $targetSRID);
    }

    public function formatAs(string $srid, bool $latitude, ?int $decimalPlaces = null): string
    {
        $decimal = $this->formatDecimal(abs($this->angle), $decimalPlaces);
        $hemisphere = $this->hemisphereLetter($latitude, $decimalPlaces);

        return match ($srid) {
            self::EPSG_DEGREE => $this->formatDecimal($this->angle, $decimalPlaces),
            self::EPSG_DEGREE_HEMISPHERE => $decimal . '°' . $hemisphere,
            self::EPSG_HEMISPHERE_DEGREE => $hemisphere . $decimal . '°',
            self::EPSG_DEGREE_MINUTE_SECOND => $this->formatDegreeMinuteSecond($latitude, false, false, $decimalPlaces),
            self::EPSG_DEGREE_MINUTE_SECOND_HEMISPHERE => $this->formatDegreeMinuteSecond($latitude, true, false, $decimalPlaces),
            self::EPSG_HEMISPHERE_DEGREE_MINUTE_SECOND => $this->formatDegreeMinuteSecond($latitude, true, true, $decimalPlaces),
            self::EPSG_SEXAGESIMAL_DMS => $this->formatSexagesimalDms($decimalPlaces),
            default => throw new InvalidArgumentException('No degree format for ' . $srid),
        };
    }

    private function formatDegreeMinuteSecond(bool $latitude, bool $hemisphere, bool $leadingHemisphere, ?int $decimalPlaces): string
    {
        [$negative, $degrees, $minutes, $seconds, $fraction, $width] = $this->sexagesimalParts($decimalPlaces);
        $secondsText = $width === 0 ? (string) $seconds : sprintf('%d.%0' . $width . 'd', $seconds, $fraction);
        $body = $degrees . '°' . $minutes . '′' . $secondsText . '″';
        if (!$hemisphere) {
            return ($negative ? '-' : '') . $body;
        }
        $letter = $this->hemisphereLetterFromSign($negative, $latitude);

        return $leadingHemisphere ? $letter . $body : $body . $letter;
    }

    private function formatSexagesimalDms(?int $decimalPlaces): string
    {
        [$negative, $degrees, $minutes, $seconds, $fraction, $width] = $this->sexagesimalParts($decimalPlaces);
        $fractionText = $width === 0 ? '' : sprintf('%0' . $width . 'd', $fraction);

        return ($negative ? '-' : '') . $degrees . '.' . sprintf('%02d%02d', $minutes, $seconds) . $fractionText;
    }

    /**
     * @return array{0: bool, 1: int, 2: int, 3: int, 4: int, 5: int}
     */
    private function sexagesimalParts(?int $decimalPlaces): array
    {
        // Round in integer space so a value just below 60 seconds carries into
        // the next minute instead of printing 59.99996″.
        $width = $this->secondDecimals($decimalPlaces);
        $scale = 10 ** $width;
        $negative = $this->angle < 0;
        $scaled = (int) round(abs($this->angle) * 3600 * $scale);
        if ($scaled === 0) {
            $negative = false;
        }
        $fraction = $scaled % $scale;
        $wholeSeconds = intdiv($scaled, $scale);
        $seconds = $wholeSeconds % 60;
        $minutesTotal = intdiv($wholeSeconds, 60);

        return [$negative, intdiv($minutesTotal, 60), $minutesTotal % 60, $seconds, $fraction, $width];
    }

    /**
     * Fraction-of-a-second digits whose step is nearest one degree digit.
     */
    private function secondDecimals(?int $decimalPlaces): int
    {
        if ($decimalPlaces === null) {
            return 4;
        }
        if ($decimalPlaces <= 0) {
            return 0;
        }
        $seconds = 3600 * (10 ** (-$decimalPlaces));

        return max(0, (int) round(-log10($seconds)));
    }

    private function hemisphereLetter(bool $latitude, ?int $decimalPlaces): string
    {
        $shown = $this->formatDecimal(abs($this->angle), $decimalPlaces);
        $negative = $this->angle < 0 && (float) $shown !== 0.0;

        return $this->hemisphereLetterFromSign($negative, $latitude);
    }

    private function hemisphereLetterFromSign(bool $negative, bool $latitude): string
    {
        if ($latitude) {
            return $negative ? 'S' : 'N';
        }

        return $negative ? 'W' : 'E';
    }

    private function formatDecimal(float $value, ?int $places): string
    {
        $digits = $places ?? 8;
        if ($digits <= 0) {
            $text = sprintf('%.0F', round($value, $digits));
        } else {
            $text = sprintf('%.' . $digits . 'F', round($value, $digits));
        }
        if ($places === null && str_contains($text, '.')) {
            $text = rtrim(rtrim($text, '0'), '.');
        }

        return $text === '-0' ? '0' : $text;
    }
}
