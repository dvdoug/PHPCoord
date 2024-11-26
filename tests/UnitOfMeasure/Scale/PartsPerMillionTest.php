<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\UnitOfMeasure\Scale;

use PHPUnit\Framework\TestCase;

class PartsPerMillionTest extends TestCase
{
    public function testAsUnity(): void
    {
        $original = new PartsPerMillion(0.12);
        $asUnity = $original->asUnity();
        self::assertInstanceOf(Unity::class, $asUnity);
        self::assertEquals(1.2E-7, $asUnity->getValue());
    }

    public function testGetValue(): void
    {
        $original = new PartsPerMillion(0.12);
        self::assertEquals(0.12, $original->getValue());
    }

    public function testGetUnitName(): void
    {
        $original = new PartsPerMillion(0.12);
        self::assertEquals('parts per million', $original->getUnitName());
    }
}
