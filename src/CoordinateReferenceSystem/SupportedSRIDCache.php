<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\CoordinateReferenceSystem;

/**
 * Cached name lists for SRID tables.
 * registerCustom* must forget the owning class: those tables accept new SRIDs at runtime.
 * Merged lists (Geographic, CoordinateReferenceSystem, UnitOfMeasureFactory) are not stored here,
 * so they pick up a forgotten class on the next call.
 *
 * @internal
 */
final class SupportedSRIDCache
{
    /**
     * @var array<class-string, array<string, string>>
     */
    private static array $names = [];

    /**
     * @var array<class-string, array<string, array{name: string, help: string}>>
     */
    private static array $help = [];

    /**
     * @var array<class-string, array<string, array{name: string, extent_description: string, help: string}>>
     */
    private static array $helpWithExtent = [];

    /**
     * @param  class-string                        $class
     * @param  array<string, array<string, mixed>> $sridData
     * @return array<string, string>
     */
    public static function names(string $class, array $sridData): array
    {
        if (!isset(self::$names[$class])) {
            $names = [];
            foreach ($sridData as $srid => $data) {
                $names[$srid] = self::stringField($data, 'name');
            }
            self::$names[$class] = $names;
        }

        return self::$names[$class];
    }

    /**
     * @param  class-string                                     $class
     * @param  array<string, array<string, mixed>>              $sridData
     * @return array<string, array{name: string, help: string}>
     */
    public static function help(string $class, array $sridData): array
    {
        if (!isset(self::$help[$class])) {
            $help = [];
            foreach ($sridData as $srid => $data) {
                $help[$srid] = [
                    'name' => self::stringField($data, 'name'),
                    'help' => self::stringField($data, 'help'),
                ];
            }
            self::$help[$class] = $help;
        }

        return self::$help[$class];
    }

    /**
     * @param  class-string                                                                 $class
     * @param  array<string, array<string, mixed>>                                          $sridData
     * @return array<string, array{name: string, extent_description: string, help: string}>
     */
    public static function helpWithExtent(string $class, array $sridData): array
    {
        if (!isset(self::$helpWithExtent[$class])) {
            $help = [];
            foreach ($sridData as $srid => $data) {
                $name = self::stringField($data, 'name');
                $help[$srid] = [
                    'name' => $name,
                    // The list these classes already publish uses the CRS name here.
                    'extent_description' => $name,
                    'help' => self::stringField($data, 'help'),
                ];
            }
            self::$helpWithExtent[$class] = $help;
        }

        return self::$helpWithExtent[$class];
    }

    /**
     * @param class-string $class
     */
    public static function forget(string $class): void
    {
        unset(self::$names[$class], self::$help[$class], self::$helpWithExtent[$class]);
    }

    /**
     * @param array<string, mixed> $row
     */
    private static function stringField(array $row, string $field): string
    {
        /** @var string $value */
        $value = $row[$field];

        return $value;
    }
}
