<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\UnitOfMeasure\Angle;

use function in_array;
use InvalidArgumentException;
use function preg_match;
use function str_pad;
use function str_replace;
use function strpos;

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
        $angle = str_pad($angle, $decimalPosition + 5, '0', STR_PAD_RIGHT);
        $regex = '/^(?P<negative>[−-])?(?P<degrees>\d+)\.(?P<arcminutes>\d{2})(?P<arcseconds>\d{2})(?P<fractionarcseconds>\d+)?$/u';

        return self::fromRegex($angle, $regex);
    }

    public static function fromSexagesimalDM(string $angle): self
    {
        $decimalPosition = strpos($angle, '.');
        $angle = str_pad($angle, $decimalPosition + 5, '0', STR_PAD_RIGHT);
        $regex = '/^(?P<negative>[−-])?(?P<degrees>\d+)\.(?P<arcminutes>\d{2})(?P<fractionarcminutes>\d+)?$/u';

        return self::fromRegex($angle, $regex);
    }

    private static function fromRegex(string $angle, string $regex): self
    {
        $angle = str_replace(' ', '', $angle);
        $foundAngle = preg_match($regex, $angle, $angleParts, PREG_UNMATCHED_AS_NULL);

        if (!$foundAngle) {
            throw new InvalidArgumentException("Could not find angle in '{$angle}'");
        }

        $degrees = ($angleParts['degrees'] * 1);
        $degrees += (($angleParts['arcminutes'] ?? 0) / 60);
        $degrees += (($angleParts['fractionarcminutes'] ?? 0) / 60 / 100);
        $degrees += (($angleParts['arcseconds'] ?? 0) / 3600);
        $degrees += (($angleParts['fractionarcseconds'] ?? 0) / 3600 / 100);

        if ($angleParts['negative'] ?? '' || in_array($angleParts['hemisphere'] ?? [], ['S', 'W'], true)) {
            $degrees *= -1;
        }

        return new static($degrees);
    }
}
