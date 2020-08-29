<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\UnitOfMeasure\Scale;

use PHPCoord\UnitOfMeasure\UnitOfMeasure;

interface Scale extends UnitOfMeasure
{
    public function asUnity(): Unity;
}
