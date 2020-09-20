<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Exception;

use PHPCoord\CoordinateSystem\Axis;
use UnexpectedValueException;

class InvalidAxesException extends UnexpectedValueException
{
    /**
     * InvalidAxesException constructor.
     * @param Axis[] $allowedAxes
     */
    public function __construct(array $allowedAxes)
    {
        $axisNames = array_map(static function ($allowedAxis) {
            return $allowedAxis->getName();
        }, $allowedAxes);

        parent::__construct('This CRS has axes: ' . implode(', ', $axisNames));
    }
}
