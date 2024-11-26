<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\CoordinateOperation;

use PHPUnit\Framework\TestCase;

class ComplexNumberTest extends TestCase
{
    public function testAdd(): void
    {
        $first = new ComplexNumber(3, 2);
        $second = new ComplexNumber(1, 7);
        $result = $first->add($second);

        self::assertEquals(4, $result->getReal());
        self::assertEquals(9, $result->getImaginary());
    }

    public function testSubtract(): void
    {
        $first = new ComplexNumber(4, 9);
        $second = new ComplexNumber(1, 7);
        $result = $first->subtract($second);

        self::assertEquals(3, $result->getReal());
        self::assertEquals(2, $result->getImaginary());
    }

    public function testMultiply(): void
    {
        $first = new ComplexNumber(3, 2);
        $second = new ComplexNumber(1, 7);
        $result = $first->multiply($second);

        self::assertEquals(-11, $result->getReal());
        self::assertEquals(23, $result->getImaginary());
    }

    public function testDivide(): void
    {
        $first = new ComplexNumber(-11, 23);
        $second = new ComplexNumber(3, 2);
        $result = $first->divide($second);

        self::assertEquals(1, $result->getReal());
        self::assertEquals(7, $result->getImaginary());
    }

    public function testPow(): void
    {
        $first = new ComplexNumber(7, 0);
        $result = $first->pow(2);

        self::assertEquals(49, $result->getReal());
        self::assertEquals(0, $result->getImaginary());
    }

    public function testPow2(): void
    {
        $first = new ComplexNumber(3, 0);
        $result = $first->pow(3);

        self::assertEquals(27, $result->getReal());
        self::assertEquals(0, $result->getImaginary());
    }

    public function testPow3(): void
    {
        $first = new ComplexNumber(3, 0);
        $result = $first->pow(4);

        self::assertEquals(81, $result->getReal());
        self::assertEquals(0, $result->getImaginary());
    }
}
