<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\CoordinateOperation;

use SplFileObject;

use function assert;

/**
 * @internal
 */
class GridFile extends SplFileObject
{
    public function fgets(): string
    {
        $result = parent::fgets();
        assert($result !== false);

        return $result;
    }

    public function fread(int $length): string
    {
        $result = parent::fread($length);
        assert($result !== false);

        return $result;
    }
}
