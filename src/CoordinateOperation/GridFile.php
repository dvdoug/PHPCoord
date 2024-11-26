<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\CoordinateOperation;

use SplFileObject;
use ZipArchive;

use function assert;
use function file_exists;
use function sys_get_temp_dir;
use function str_ends_with;

/**
 * @internal
 */
class GridFile extends SplFileObject
{
    public function __construct(string $filename)
    {
        if (str_ends_with($filename, '.zip')) {
            $zip = new ZipArchive();
            $zip->open($filename);
            $filename = sys_get_temp_dir() . '/' . $zip->getNameIndex(0); // only 1 file inside

            if (!file_exists($filename)) {
                $zip->extractTo(sys_get_temp_dir());
            }
        }

        parent::__construct($filename);
    }

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
