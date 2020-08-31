<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\UnitOfMeasure\Scale;

use PHPCoord\UnitOfMeasure\Factory;
use PHPUnit\Framework\TestCase;

class ExoticScaleTest extends TestCase
{
    public function testAsUnitys(): void
    {
        $original = Factory::makeUnit(120000, 9202); //parts per million
        $asUnity = $original->asUnity();
        self::assertInstanceOf(Unity::class, $asUnity);
        self::assertEquals(0.12, $asUnity->getValue());
    }

    public function testGetValue(): void
    {
        $original = Factory::makeUnit(120000, 9202); //parts per million
        self::assertEquals(120000, $original->getValue());
    }

    public function testGetFormattedValue(): void
    {
        $original = Factory::makeUnit(120000, 9202); //parts per million
        self::assertEquals('120000 parts per million', $original->getFormattedValue());
    }

    public function testGetUnitName(): void
    {
        $original = Factory::makeUnit(120000, 9202); //parts per million
        self::assertEquals('parts per million', $original->getUnitName());
    }
}
