<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Exception;

class UnknownUnitOfMeasureException extends \Exception
{
    public function __construct(int $epsgCode)
    {
        parent::__construct('Unknown EPSG code: ' . $epsgCode, $epsgCode);
    }
}
