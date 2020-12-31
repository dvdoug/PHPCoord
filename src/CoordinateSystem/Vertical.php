<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\CoordinateSystem;

class Vertical extends CoordinateSystem
{
    /**
     * Vertical CS. Axis: depth (D). Orientation: down. UoM: ft.
     * Type: vertical
     * Used in vertical coordinate reference systems.
     */
    public const EPSG_AXIS_DEPTH_D_ORIENTATION_DOWN_UOM_FT = 'urn:ogc:def:cs:EPSG::6495';

    /**
     * Vertical CS. Axis: depth (D). Orientation: down. UoM: ftUS.
     * Type: vertical
     * Used in US vertical coordinate reference systems.
     */
    public const EPSG_AXIS_DEPTH_D_ORIENTATION_DOWN_UOM_FTUS = 'urn:ogc:def:cs:EPSG::1043';

    /**
     * Vertical CS. Axis: depth (D). Orientation: down. UoM: m.
     * Type: vertical
     * Used in vertical coordinate reference systems.
     */
    public const EPSG_AXIS_DEPTH_D_ORIENTATION_DOWN_UOM_M = 'urn:ogc:def:cs:EPSG::6498';

    /**
     * Vertical CS. Axis: height (H). Orientation: up. UoM: ft(Br36).
     * Type: vertical
     * Used in vertical coordinate reference systems.
     */
    public const EPSG_AXIS_HEIGHT_H_ORIENTATION_UP_UOM_FT_BR36 = 'urn:ogc:def:cs:EPSG::6496';

    /**
     * Vertical CS. Axis: height (H). Orientation: up. UoM: ft.
     * Type: vertical
     * Used in vertical coordinate reference systems.
     */
    public const EPSG_AXIS_HEIGHT_H_ORIENTATION_UP_UOM_FT = 'urn:ogc:def:cs:EPSG::1030';

    /**
     * Vertical CS. Axis: height (H). Orientation: up. UoM: ftUS.
     * Type: vertical
     * Used in vertical coordinate reference systems.
     */
    public const EPSG_AXIS_HEIGHT_H_ORIENTATION_UP_UOM_FTUS = 'urn:ogc:def:cs:EPSG::6497';

    /**
     * Vertical CS. Axis: height (H). Orientation: up. UoM: m.
     * Type: vertical
     * Used in vertical coordinate reference systems.
     */
    public const EPSG_AXIS_HEIGHT_H_ORIENTATION_UP_UOM_M = 'urn:ogc:def:cs:EPSG::6499';
}
