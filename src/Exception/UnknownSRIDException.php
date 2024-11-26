<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Exception;

use Exception;

abstract class UnknownSRIDException extends Exception
{
    public function __construct(string $srid)
    {
        parent::__construct('Unknown SRID: ' . $srid);
    }
}
