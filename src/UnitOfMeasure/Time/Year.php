<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\UnitOfMeasure\Time;

use DateTimeImmutable;
use DateTimeInterface;

class Year extends Time
{
    private float $time;

    public function __construct(float $time)
    {
        $this->time = $time;
    }

    public static function fromDateTime(DateTimeInterface $dateTime): self
    {
        return new self(round((float) $dateTime->format('Y') + ($dateTime->format('z') / 365.25), 2));
    }

    public function asSeconds(): Second
    {
        return new Second($this->time * self::SECONDS_IN_YEAR);
    }

    public function asYears(): self
    {
        return $this;
    }

    public function asDateTime(): DateTimeImmutable
    {
        $year = (int) $this->time;
        $yearPortion = $this->time - $year;
        $days = round($yearPortion * 365.25);

        return DateTimeImmutable::createFromFormat('Yz', $year . $days);
    }

    public function getValue(): float
    {
        return $this->time;
    }

    public function getFormattedValue(): string
    {
        return $this->time . ' years';
    }

    public function getUnitName(): string
    {
        return 'year';
    }

    public function __toString(): string
    {
        return (string) $this->getValue();
    }
}
