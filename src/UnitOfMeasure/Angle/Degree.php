<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\UnitOfMeasure\Angle;

use InvalidArgumentException;

class Degree implements Angle
{
    /** @var float */
    private $angle;

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

    public function getFormattedValue(): string
    {
        return $this->angle . '°';
    }

    public function getUnitName(): string
    {
        return 'degree';
    }

    public static function fromDegreeMinuteSecond(string $angle): self
    {
        $angle = str_replace(' ', '', $angle);
        $foundAngle = preg_match('/^(?P<negative>[−-])?(?P<degrees>\d+)[°º]?((?P<arcminutes>\d+)[′\'])?((?P<arcseconds>\d+\.?\d*)[″"])?$/u', $angle, $angleParts);

        if (!$foundAngle) {
            throw new InvalidArgumentException("Could not find angle in '{$angle}'");
        }

        $degrees = $angleParts['degrees'] + (($angleParts['arcminutes'] ?? 0) / 60) + (($angleParts['arcseconds'] ?? 0) / 3600);

        if ($angleParts['negative']) {
            $degrees *= -1;
        }

        return new self($degrees);
    }

    public static function fromDegreeMinute(string $angle): self
    {
        $angle = str_replace(' ', '', $angle);
        $foundAngle = preg_match('/^(?P<negative>[−-])?(?P<degrees>\d+)[°º]?((?P<arcminutes>\d+\.?\d*)[′\'])?$/u', $angle, $angleParts);

        if (!$foundAngle) {
            throw new InvalidArgumentException("Could not find angle in '{$angle}'");
        }

        $degrees = $angleParts['degrees'] + (($angleParts['arcminutes'] ?? 0) / 60);

        if ($angleParts['negative']) {
            $degrees *= -1;
        }

        return new self($degrees);
    }
}
