<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\CoordinateReferenceSystem;

trait ProjectedConstantsChunk4
{
    /**
     * Pulkovo 1942(58) / Stereo70
     * Extent: Romania.
     */
    public const EPSG_PULKOVO_1942_58_STEREO70 = 'urn:ogc:def:crs:EPSG::3844';

    /**
     * Pulkovo 1942(83) / 3-degree Gauss-Kruger zone 3
     * Extent: Germany - states of former East Germany - west of 10°30'E - Thuringen
     * Replaces Pulkovo 1942(58) / 3-degree Gauss-Kruger zone 5 (CRS code 3837). In Thuringen replaced by PD/83 / Gauss
     * Kruger zone 3. See CRS code 5673 for variant with axes order reversed to easting before northing for use in GIS
     * applications.
     */
    public const EPSG_PULKOVO_1942_83_3_DEGREE_GAUSS_KRUGER_ZONE_3 = 'urn:ogc:def:crs:EPSG::2397';

    /**
     * Pulkovo 1942(83) / 3-degree Gauss-Kruger zone 3 (E-N)
     * Extent: Germany - states of former East Germany - west of 10°30'E - Thuringen
     * Pulkovo 1942(83) / 3-degree Gauss-Kruger zone 3 (CRS code 2397) but with axis order reversed (and axis
     * abbreviations changed) for GIS applications.
     */
    public const EPSG_PULKOVO_1942_83_3_DEGREE_GAUSS_KRUGER_ZONE_3_E_N = 'urn:ogc:def:crs:EPSG::5673';

    /**
     * Pulkovo 1942(83) / 3-degree Gauss-Kruger zone 4
     * Extent: Czechia - west of 13°30'E. Germany - states of former East Germany onshore - between 10°30'E and
     * 13°30'E - Brandenburg; Mecklenburg-Vorpommern; Sachsen; Sachsen-Anhalt; Thuringen
     * Replaces Pulkovo 1942(58) / 3-degree Gauss-Kruger zone 5 (CRS code 3838). In Brandenburg replaced by ETRS89 /
     * UTM zone 33N. In Sachsen replaced by CRS 3398. In Thuringen replaced by CRS 3397. See CRS code 5674 for variant
     * with axes order reversed.
     */
    public const EPSG_PULKOVO_1942_83_3_DEGREE_GAUSS_KRUGER_ZONE_4 = 'urn:ogc:def:crs:EPSG::2398';

    /**
     * Pulkovo 1942(83) / 3-degree Gauss-Kruger zone 4 (E-N)
     * Extent: Czechia - west of 13°30'E. Germany - states of former East Germany onshore - between 10°30'E and
     * 13°30'E - Brandenburg; Mecklenburg-Vorpommern; Sachsen; Sachsen-Anhalt; Thuringen
     * Pulkovo 1942(83) / 3-degree Gauss-Kruger zone 4 (CRS code 2398) but with axis order reversed (and axis
     * abbreviations changed) for GIS applications.
     */
    public const EPSG_PULKOVO_1942_83_3_DEGREE_GAUSS_KRUGER_ZONE_4_E_N = 'urn:ogc:def:crs:EPSG::5674';

    /**
     * Pulkovo 1942(83) / 3-degree Gauss-Kruger zone 5
     * Extent: Czechia - between 13°30'E and 16°30'E. Germany - states of former East Germany onshore east of
     * 13°30'E - Brandenburg; Mecklenburg-Vorpommern; Sachsen. Hungary - west of 16°30'E
     * Replaces Pulkovo 1942(58) / 3-degree Gauss-Kruger zone 5 (CRS code 3329). In Brandenburg replaced by ETRS89 /
     * UTM zone 33N. In Sachsen replaced by RD/83 / Gauss Kruger zone 5. See CRS code 5675 for variant with axes order
     * reversed.
     */
    public const EPSG_PULKOVO_1942_83_3_DEGREE_GAUSS_KRUGER_ZONE_5 = 'urn:ogc:def:crs:EPSG::2399';

    /**
     * Pulkovo 1942(83) / 3-degree Gauss-Kruger zone 5 (E-N)
     * Extent: Czechia - between 13°30'E and 16°30'E. Germany - states of former East Germany onshore east of
     * 13°30'E - Brandenburg; Mecklenburg-Vorpommern; Sachsen. Hungary - west of 16°30'E
     * Pulkovo 1942(83) / 3-degree Gauss-Kruger zone 5 (CRS code 2399) but with axis order reversed (and axis
     * abbreviations changed) for GIS applications.
     */
    public const EPSG_PULKOVO_1942_83_3_DEGREE_GAUSS_KRUGER_ZONE_5_E_N = 'urn:ogc:def:crs:EPSG::5675';

    /**
     * Pulkovo 1942(83) / 3-degree Gauss-Kruger zone 6
     * Extent: Czechia - east of 16°30'E. Hungary - between 16°30'E and 19°30'E. Slovakia - west of 19°30'E
     * Replaces Pulkovo 1942(58) / 3-degree Gauss-Kruger zone 6 (CRS code 3330).
     */
    public const EPSG_PULKOVO_1942_83_3_DEGREE_GAUSS_KRUGER_ZONE_6 = 'urn:ogc:def:crs:EPSG::3841';

    /**
     * Pulkovo 1942(83) / 3-degree Gauss-Kruger zone 7
     * Extent: Hungary and Slovakia - between 19°30'E and 22°30'E
     * Replaces Pulkovo 1942(58) / 3-degree Gauss-Kruger zone 7 (CRS code 3331).
     */
    public const EPSG_PULKOVO_1942_83_3_DEGREE_GAUSS_KRUGER_ZONE_7 = 'urn:ogc:def:crs:EPSG::4417';

    /**
     * Pulkovo 1942(83) / 3-degree Gauss-Kruger zone 8
     * Extent: Hungary and Slovakia - east of 22°30'E
     * Replaces Pulkovo 1942(58) / 3-degree Gauss-Kruger zone 8 (CRS code 3332).
     */
    public const EPSG_PULKOVO_1942_83_3_DEGREE_GAUSS_KRUGER_ZONE_8 = 'urn:ogc:def:crs:EPSG::4434';

    /**
     * Pulkovo 1942(83) / Gauss-Kruger zone 2
     * Extent: Germany - states of former East Germany - west of 12°E
     * Replaces Pulkovo 1942(58) / Gauss-Kruger zone 2 (CRS code 3833). See CRS code 5664 for variant with axes order
     * reversed to easting before northing for use in GIS applications.
     */
    public const EPSG_PULKOVO_1942_83_GAUSS_KRUGER_ZONE_2 = 'urn:ogc:def:crs:EPSG::3834';

    /**
     * Pulkovo 1942(83) / Gauss-Kruger zone 2 (E-N)
     * Extent: Germany - states of former East Germany - west of 12°E
     * Pulkovo 1942(83) / Gauss-Kruger zone 2 (CRS code 3834) but with axis order reversed (and axis abbreviations
     * changed) for GIS applications.
     */
    public const EPSG_PULKOVO_1942_83_GAUSS_KRUGER_ZONE_2_E_N = 'urn:ogc:def:crs:EPSG::5664';

    /**
     * Pulkovo 1942(83) / Gauss-Kruger zone 3
     * Extent: Germany (former DDR) - onshore east of 12°E. Czechia, Hungary and Slovakia - west of 18°E
     * Replaces Pulkovo 1942(58) / Gauss-Kruger zone 3 (CRS code 3333). See CRS code 5665 for variant with axes order
     * reversed to easting before northing for use in GIS applications.
     */
    public const EPSG_PULKOVO_1942_83_GAUSS_KRUGER_ZONE_3 = 'urn:ogc:def:crs:EPSG::3835';

    /**
     * Pulkovo 1942(83) / Gauss-Kruger zone 3 (E-N)
     * Extent: Germany (former DDR) - onshore east of 12°E. Czechia, Hungary and Slovakia - west of 18°E
     * Pulkovo 1942(83) / Gauss-Kruger zone 3 (CRS code 3835) but with axis order reversed (and axis abbreviations
     * changed) for GIS applications.
     */
    public const EPSG_PULKOVO_1942_83_GAUSS_KRUGER_ZONE_3_E_N = 'urn:ogc:def:crs:EPSG::5665';

    /**
     * Pulkovo 1942(83) / Gauss-Kruger zone 4
     * Extent: Czechia, Hungary and Slovakia - east of 18°E
     * Replaces Pulkovo 1942(58) / Gauss-Kruger zone 4 (CRS code 3334).
     */
    public const EPSG_PULKOVO_1942_83_GAUSS_KRUGER_ZONE_4 = 'urn:ogc:def:crs:EPSG::3836';

    /**
     * Pulkovo 1995 / 3-degree Gauss-Kruger CM 102E
     * Extent: Russia - onshore between 100°30'E and 103°30'E
     * Truncated form of Pulkovo 1995 / 3-degree Gauss-Kruger zone 34 (code 2668).
     */
    public const EPSG_PULKOVO_1995_3_DEGREE_GAUSS_KRUGER_CM_102E = 'urn:ogc:def:crs:EPSG::2726';

    /**
     * Pulkovo 1995 / 3-degree Gauss-Kruger CM 105E
     * Extent: Russia - onshore between 103°30'E and 106°30'E
     * Truncated form of Pulkovo 1995 / 3-degree Gauss-Kruger zone 35 (code 2669).
     */
    public const EPSG_PULKOVO_1995_3_DEGREE_GAUSS_KRUGER_CM_105E = 'urn:ogc:def:crs:EPSG::2727';

    /**
     * Pulkovo 1995 / 3-degree Gauss-Kruger CM 108E
     * Extent: Russia - onshore between 106°30'E and 109°30'E
     * Truncated form of Pulkovo 1995 / 3-degree Gauss-Kruger zone 36 (code 2670).
     */
    public const EPSG_PULKOVO_1995_3_DEGREE_GAUSS_KRUGER_CM_108E = 'urn:ogc:def:crs:EPSG::2728';

    /**
     * Pulkovo 1995 / 3-degree Gauss-Kruger CM 111E
     * Extent: Russia - onshore between 109°30'E and 112°30'E
     * Truncated form of Pulkovo 1995 / 3-degree Gauss-Kruger zone 37 (code 2671).
     */
    public const EPSG_PULKOVO_1995_3_DEGREE_GAUSS_KRUGER_CM_111E = 'urn:ogc:def:crs:EPSG::2729';

    /**
     * Pulkovo 1995 / 3-degree Gauss-Kruger CM 114E
     * Extent: Russia - onshore between 112°30'E and 115°30'E
     * Truncated form of Pulkovo 1995 / 3-degree Gauss-Kruger zone 38 (code 2672).
     */
    public const EPSG_PULKOVO_1995_3_DEGREE_GAUSS_KRUGER_CM_114E = 'urn:ogc:def:crs:EPSG::2730';

    /**
     * Pulkovo 1995 / 3-degree Gauss-Kruger CM 117E
     * Extent: Russia - onshore between 115°30'E and 118°30'E
     * Truncated form of Pulkovo 1995 / 3-degree Gauss-Kruger zone 39 (code 2673).
     */
    public const EPSG_PULKOVO_1995_3_DEGREE_GAUSS_KRUGER_CM_117E = 'urn:ogc:def:crs:EPSG::2731';

    /**
     * Pulkovo 1995 / 3-degree Gauss-Kruger CM 120E
     * Extent: Russia - onshore between 118°30'E and 121°30'E
     * Truncated form of Pulkovo 1995 / 3-degree Gauss-Kruger zone 40 (code 2674).
     */
    public const EPSG_PULKOVO_1995_3_DEGREE_GAUSS_KRUGER_CM_120E = 'urn:ogc:def:crs:EPSG::2732';

    /**
     * Pulkovo 1995 / 3-degree Gauss-Kruger CM 123E
     * Extent: Russia - onshore between 121°30'E and 124°30'E
     * Truncated form of Pulkovo 1995 / 3-degree Gauss-Kruger zone 41 (code 2675).
     */
    public const EPSG_PULKOVO_1995_3_DEGREE_GAUSS_KRUGER_CM_123E = 'urn:ogc:def:crs:EPSG::2733';

    /**
     * Pulkovo 1995 / 3-degree Gauss-Kruger CM 126E
     * Extent: Russia - onshore between 124°30'E and 127°30'E
     * Truncated form of Pulkovo 1995 / 3-degree Gauss-Kruger zone 42 (code 2676).
     */
    public const EPSG_PULKOVO_1995_3_DEGREE_GAUSS_KRUGER_CM_126E = 'urn:ogc:def:crs:EPSG::2734';

    /**
     * Pulkovo 1995 / 3-degree Gauss-Kruger CM 129E
     * Extent: Russia - onshore between 127°30'E and 130°30'E
     * Truncated form of Pulkovo 1995 / 3-degree Gauss-Kruger zone 43 (code 2677).
     */
    public const EPSG_PULKOVO_1995_3_DEGREE_GAUSS_KRUGER_CM_129E = 'urn:ogc:def:crs:EPSG::2735';

    /**
     * Pulkovo 1995 / 3-degree Gauss-Kruger CM 132E
     * Extent: Russia - onshore between 130°30'E and 133°30'E
     * Truncated form of Pulkovo 1995 / 3-degree Gauss-Kruger zone 44 (code 2678).
     */
    public const EPSG_PULKOVO_1995_3_DEGREE_GAUSS_KRUGER_CM_132E = 'urn:ogc:def:crs:EPSG::2738';

    /**
     * Pulkovo 1995 / 3-degree Gauss-Kruger CM 135E
     * Extent: Russia - onshore between 133°30'E and 136°30'E
     * Truncated form of Pulkovo 1995 / 3-degree Gauss-Kruger zone 45 (code 2679).
     */
    public const EPSG_PULKOVO_1995_3_DEGREE_GAUSS_KRUGER_CM_135E = 'urn:ogc:def:crs:EPSG::2739';

    /**
     * Pulkovo 1995 / 3-degree Gauss-Kruger CM 138E
     * Extent: Russia - onshore between 136°30'E and 139°30'E
     * Truncated form of Pulkovo 1995 / 3-degree Gauss-Kruger zone 46 (code 2680).
     */
    public const EPSG_PULKOVO_1995_3_DEGREE_GAUSS_KRUGER_CM_138E = 'urn:ogc:def:crs:EPSG::2740';

    /**
     * Pulkovo 1995 / 3-degree Gauss-Kruger CM 141E
     * Extent: Russia - onshore between 139°30'E and 142°30'E
     * Truncated form of Pulkovo 1995 / 3-degree Gauss-Kruger zone 47 (code 2681).
     */
    public const EPSG_PULKOVO_1995_3_DEGREE_GAUSS_KRUGER_CM_141E = 'urn:ogc:def:crs:EPSG::2741';

    /**
     * Pulkovo 1995 / 3-degree Gauss-Kruger CM 144E
     * Extent: Russia - onshore between 142°30'E and 145°30'E
     * Truncated form of Pulkovo 1995 / 3-degree Gauss-Kruger zone 48 (code 2682).
     */
    public const EPSG_PULKOVO_1995_3_DEGREE_GAUSS_KRUGER_CM_144E = 'urn:ogc:def:crs:EPSG::2742';

    /**
     * Pulkovo 1995 / 3-degree Gauss-Kruger CM 147E
     * Extent: Russia - onshore between 145°30'E and 148°30'E
     * Truncated form of Pulkovo 1995 / 3-degree Gauss-Kruger zone 49 (code 2683).
     */
    public const EPSG_PULKOVO_1995_3_DEGREE_GAUSS_KRUGER_CM_147E = 'urn:ogc:def:crs:EPSG::2743';

    /**
     * Pulkovo 1995 / 3-degree Gauss-Kruger CM 150E
     * Extent: Russia - onshore between 148°30'E and 151°30'E
     * Truncated form of Pulkovo 1995 / 3-degree Gauss-Kruger zone 50 (code 2684).
     */
    public const EPSG_PULKOVO_1995_3_DEGREE_GAUSS_KRUGER_CM_150E = 'urn:ogc:def:crs:EPSG::2744';

    /**
     * Pulkovo 1995 / 3-degree Gauss-Kruger CM 153E
     * Extent: Russia - onshore between 151°30'E and 154°30'E
     * Truncated form of Pulkovo 1995 / 3-degree Gauss-Kruger zone 51 (code 2685).
     */
    public const EPSG_PULKOVO_1995_3_DEGREE_GAUSS_KRUGER_CM_153E = 'urn:ogc:def:crs:EPSG::2745';

    /**
     * Pulkovo 1995 / 3-degree Gauss-Kruger CM 156E
     * Extent: Russia - onshore between 154°30'E and 157°30'E
     * Truncated form of Pulkovo 1995 / 3-degree Gauss-Kruger zone 52 (code 2686).
     */
    public const EPSG_PULKOVO_1995_3_DEGREE_GAUSS_KRUGER_CM_156E = 'urn:ogc:def:crs:EPSG::2746';

    /**
     * Pulkovo 1995 / 3-degree Gauss-Kruger CM 159E
     * Extent: Russia - onshore between 157°30'E and 160°30'E
     * Truncated form of Pulkovo 1995 / 3-degree Gauss-Kruger zone 53 (code 2687).
     */
    public const EPSG_PULKOVO_1995_3_DEGREE_GAUSS_KRUGER_CM_159E = 'urn:ogc:def:crs:EPSG::2747';

    /**
     * Pulkovo 1995 / 3-degree Gauss-Kruger CM 162E
     * Extent: Russia - onshore between 160°30'E and 163°30'E
     * Truncated form of Pulkovo 1995 / 3-degree Gauss-Kruger zone 54 (code 2688).
     */
    public const EPSG_PULKOVO_1995_3_DEGREE_GAUSS_KRUGER_CM_162E = 'urn:ogc:def:crs:EPSG::2748';

    /**
     * Pulkovo 1995 / 3-degree Gauss-Kruger CM 165E
     * Extent: Russia - onshore between 163°30'E and 166°30'E
     * Truncated form of Pulkovo 1995 / 3-degree Gauss-Kruger zone 55 (code 2689).
     */
    public const EPSG_PULKOVO_1995_3_DEGREE_GAUSS_KRUGER_CM_165E = 'urn:ogc:def:crs:EPSG::2749';

    /**
     * Pulkovo 1995 / 3-degree Gauss-Kruger CM 168E
     * Extent: Russia - onshore between 166°30'E and 169°30'E
     * Truncated form of Pulkovo 1995 / 3-degree Gauss-Kruger zone 56 (code 2690).
     */
    public const EPSG_PULKOVO_1995_3_DEGREE_GAUSS_KRUGER_CM_168E = 'urn:ogc:def:crs:EPSG::2750';

    /**
     * Pulkovo 1995 / 3-degree Gauss-Kruger CM 168W
     * Extent: Russia - onshore between 169°30'W and 166°30'W
     * Truncated form of Pulkovo 1995 / 3-degree Gauss-Kruger zone 64 (code 2698).
     */
    public const EPSG_PULKOVO_1995_3_DEGREE_GAUSS_KRUGER_CM_168W = 'urn:ogc:def:crs:EPSG::2758';

    /**
     * Pulkovo 1995 / 3-degree Gauss-Kruger CM 171E
     * Extent: Russia - onshore between 169°30'E and 172°30'E
     * Truncated form of Pulkovo 1995 / 3-degree Gauss-Kruger zone 57 (code 2691).
     */
    public const EPSG_PULKOVO_1995_3_DEGREE_GAUSS_KRUGER_CM_171E = 'urn:ogc:def:crs:EPSG::2751';

    /**
     * Pulkovo 1995 / 3-degree Gauss-Kruger CM 171W
     * Extent: Russia - onshore between 172°30'W and 169°30'W
     * Truncated form of Pulkovo 1995 / 3-degree Gauss-Kruger zone 63 (code 2697).
     */
    public const EPSG_PULKOVO_1995_3_DEGREE_GAUSS_KRUGER_CM_171W = 'urn:ogc:def:crs:EPSG::2757';

    /**
     * Pulkovo 1995 / 3-degree Gauss-Kruger CM 174E
     * Extent: Russia - onshore between 172°30'E and 175°30'E
     * Truncated form of Pulkovo 1995 / 3-degree Gauss-Kruger zone 58 (code 2692).
     */
    public const EPSG_PULKOVO_1995_3_DEGREE_GAUSS_KRUGER_CM_174E = 'urn:ogc:def:crs:EPSG::2752';

    /**
     * Pulkovo 1995 / 3-degree Gauss-Kruger CM 174W
     * Extent: Russia - onshore between 175°30'W and 172°30'W
     * Truncated form of Pulkovo 1995 / 3-degree Gauss-Kruger zone 62 (code 2696).
     */
    public const EPSG_PULKOVO_1995_3_DEGREE_GAUSS_KRUGER_CM_174W = 'urn:ogc:def:crs:EPSG::2756';

    /**
     * Pulkovo 1995 / 3-degree Gauss-Kruger CM 177E
     * Extent: Russia - onshore between 175°30'E and 178°30'E
     * Truncated form of Pulkovo 1995 / 3-degree Gauss-Kruger zone 59 (code 2693).
     */
    public const EPSG_PULKOVO_1995_3_DEGREE_GAUSS_KRUGER_CM_177E = 'urn:ogc:def:crs:EPSG::2753';

    /**
     * Pulkovo 1995 / 3-degree Gauss-Kruger CM 177W
     * Extent: Russia - onshore between 178°30'W and 175°30'W
     * Truncated form of Pulkovo 1995 / 3-degree Gauss-Kruger zone 61 (code 2695).
     */
    public const EPSG_PULKOVO_1995_3_DEGREE_GAUSS_KRUGER_CM_177W = 'urn:ogc:def:crs:EPSG::2755';

    /**
     * Pulkovo 1995 / 3-degree Gauss-Kruger CM 180E
     * Extent: Russia - onshore between 178°30'E and 178°30'W
     * Truncated form of Pulkovo 1995 / 3-degree Gauss-Kruger zone 60 (code 3390).
     */
    public const EPSG_PULKOVO_1995_3_DEGREE_GAUSS_KRUGER_CM_180E = 'urn:ogc:def:crs:EPSG::2754';

    /**
     * Pulkovo 1995 / 3-degree Gauss-Kruger CM 21E
     * Extent: Russia - Kaliningrad - onshore between 19°30'E and 22°30'E
     * Truncated form of Pulkovo 1995 / 3-degree Gauss-Kruger zone 7 (code 2641).
     */
    public const EPSG_PULKOVO_1995_3_DEGREE_GAUSS_KRUGER_CM_21E = 'urn:ogc:def:crs:EPSG::2699';

    /**
     * Pulkovo 1995 / 3-degree Gauss-Kruger CM 24E
     * Extent: Russia - onshore between 22°30'E and 25°30'E - Kaliningrad
     * Truncated form of Pulkovo 1995 / 3-degree Gauss-Kruger zone 8 (code 2642).
     */
    public const EPSG_PULKOVO_1995_3_DEGREE_GAUSS_KRUGER_CM_24E = 'urn:ogc:def:crs:EPSG::2700';

    /**
     * Pulkovo 1995 / 3-degree Gauss-Kruger CM 27E
     * Extent: Russia - onshore between 25°30'E and 28°30'E
     * Truncated form of Pulkovo 1995 / 3-degree Gauss-Kruger zone 9 (code 2643).
     */
    public const EPSG_PULKOVO_1995_3_DEGREE_GAUSS_KRUGER_CM_27E = 'urn:ogc:def:crs:EPSG::2701';

    /**
     * Pulkovo 1995 / 3-degree Gauss-Kruger CM 30E
     * Extent: Russia - onshore between 28°30'E and 31°30'E
     * Truncated form of Pulkovo 1995 / 3-degree Gauss-Kruger zone 10 (code 2644).
     */
    public const EPSG_PULKOVO_1995_3_DEGREE_GAUSS_KRUGER_CM_30E = 'urn:ogc:def:crs:EPSG::2702';

    /**
     * Pulkovo 1995 / 3-degree Gauss-Kruger CM 33E
     * Extent: Russia - onshore between 31°30'E and 34°30'E
     * Truncated form of Pulkovo 1995 / 3-degree Gauss-Kruger zone 11 (code 2645).
     */
    public const EPSG_PULKOVO_1995_3_DEGREE_GAUSS_KRUGER_CM_33E = 'urn:ogc:def:crs:EPSG::2703';

    /**
     * Pulkovo 1995 / 3-degree Gauss-Kruger CM 36E
     * Extent: Russia - onshore between 34°30'E and 37°30'E
     * Truncated form of Pulkovo 1995 / 3-degree Gauss-Kruger zone 12 (code 2646).
     */
    public const EPSG_PULKOVO_1995_3_DEGREE_GAUSS_KRUGER_CM_36E = 'urn:ogc:def:crs:EPSG::2704';

    /**
     * Pulkovo 1995 / 3-degree Gauss-Kruger CM 39E
     * Extent: Russia - onshore between 37°30'E and 40°30'E
     * Truncated form of Pulkovo 1995 / 3-degree Gauss-Kruger zone 13 (code 2647).
     */
    public const EPSG_PULKOVO_1995_3_DEGREE_GAUSS_KRUGER_CM_39E = 'urn:ogc:def:crs:EPSG::2705';

    /**
     * Pulkovo 1995 / 3-degree Gauss-Kruger CM 42E
     * Extent: Russia - onshore between 40°30'E and 43°30'E
     * Truncated form of Pulkovo 1995 / 3-degree Gauss-Kruger zone 14 (code 2648).
     */
    public const EPSG_PULKOVO_1995_3_DEGREE_GAUSS_KRUGER_CM_42E = 'urn:ogc:def:crs:EPSG::2706';

    /**
     * Pulkovo 1995 / 3-degree Gauss-Kruger CM 45E
     * Extent: Russia - onshore between 43°30'E and 46°30'E
     * Truncated form of Pulkovo 1995 / 3-degree Gauss-Kruger zone 15 (code 2649).
     */
    public const EPSG_PULKOVO_1995_3_DEGREE_GAUSS_KRUGER_CM_45E = 'urn:ogc:def:crs:EPSG::2707';

    /**
     * Pulkovo 1995 / 3-degree Gauss-Kruger CM 48E
     * Extent: Russia - onshore between 46°30'E and 49°30'E
     * Truncated form of Pulkovo 1995 / 3-degree Gauss-Kruger zone 16 (code 2650).
     */
    public const EPSG_PULKOVO_1995_3_DEGREE_GAUSS_KRUGER_CM_48E = 'urn:ogc:def:crs:EPSG::2708';

    /**
     * Pulkovo 1995 / 3-degree Gauss-Kruger CM 51E
     * Extent: Russia - onshore between 49°30'E and 52°30'E
     * Truncated form of Pulkovo 1995 / 3-degree Gauss-Kruger zone 17 (code 2651).
     */
    public const EPSG_PULKOVO_1995_3_DEGREE_GAUSS_KRUGER_CM_51E = 'urn:ogc:def:crs:EPSG::2709';

    /**
     * Pulkovo 1995 / 3-degree Gauss-Kruger CM 54E
     * Extent: Russia - onshore between 52°30'E and 55°30'E
     * Truncated form of Pulkovo 1995 / 3-degree Gauss-Kruger zone 18 (code 2652).
     */
    public const EPSG_PULKOVO_1995_3_DEGREE_GAUSS_KRUGER_CM_54E = 'urn:ogc:def:crs:EPSG::2710';

    /**
     * Pulkovo 1995 / 3-degree Gauss-Kruger CM 57E
     * Extent: Russia - onshore between 55°30'E and 58°30'E
     * Truncated form of Pulkovo 1995 / 3-degree Gauss-Kruger zone 19 (code 2653).
     */
    public const EPSG_PULKOVO_1995_3_DEGREE_GAUSS_KRUGER_CM_57E = 'urn:ogc:def:crs:EPSG::2711';

    /**
     * Pulkovo 1995 / 3-degree Gauss-Kruger CM 60E
     * Extent: Russia - onshore between 58°30'E and 61°30'E
     * Truncated form of Pulkovo 1995 / 3-degree Gauss-Kruger zone 20 (code 2654).
     */
    public const EPSG_PULKOVO_1995_3_DEGREE_GAUSS_KRUGER_CM_60E = 'urn:ogc:def:crs:EPSG::2712';

    /**
     * Pulkovo 1995 / 3-degree Gauss-Kruger CM 63E
     * Extent: Russia - onshore between 61°30'E and 64°30'E
     * Truncated form of Pulkovo 1995 / 3-degree Gauss-Kruger zone 21 (code 2655).
     */
    public const EPSG_PULKOVO_1995_3_DEGREE_GAUSS_KRUGER_CM_63E = 'urn:ogc:def:crs:EPSG::2713';

    /**
     * Pulkovo 1995 / 3-degree Gauss-Kruger CM 66E
     * Extent: Russia - onshore between 64°30'E and 67°30'E
     * Truncated form of Pulkovo 1995 / 3-degree Gauss-Kruger zone 22 (code 2656).
     */
    public const EPSG_PULKOVO_1995_3_DEGREE_GAUSS_KRUGER_CM_66E = 'urn:ogc:def:crs:EPSG::2714';

    /**
     * Pulkovo 1995 / 3-degree Gauss-Kruger CM 69E
     * Extent: Russia - onshore between 67°30'E and 70°30'E
     * Truncated form of Pulkovo 1995 / 3-degree Gauss-Kruger zone 23 (code 2657).
     */
    public const EPSG_PULKOVO_1995_3_DEGREE_GAUSS_KRUGER_CM_69E = 'urn:ogc:def:crs:EPSG::2715';

    /**
     * Pulkovo 1995 / 3-degree Gauss-Kruger CM 72E
     * Extent: Russia - onshore between 70°30'E and 73°30'E
     * Truncated form of Pulkovo 1995 / 3-degree Gauss-Kruger zone 24 (code 2658).
     */
    public const EPSG_PULKOVO_1995_3_DEGREE_GAUSS_KRUGER_CM_72E = 'urn:ogc:def:crs:EPSG::2716';

    /**
     * Pulkovo 1995 / 3-degree Gauss-Kruger CM 75E
     * Extent: Russia - onshore between 73°30'E and 76°30'E
     * Truncated form of Pulkovo 1995 / 3-degree Gauss-Kruger zone 25 (code 2659).
     */
    public const EPSG_PULKOVO_1995_3_DEGREE_GAUSS_KRUGER_CM_75E = 'urn:ogc:def:crs:EPSG::2717';

    /**
     * Pulkovo 1995 / 3-degree Gauss-Kruger CM 78E
     * Extent: Russia - onshore between 76°30'E and 79°30'E
     * Truncated form of Pulkovo 1995 / 3-degree Gauss-Kruger zone 26 (code 2660).
     */
    public const EPSG_PULKOVO_1995_3_DEGREE_GAUSS_KRUGER_CM_78E = 'urn:ogc:def:crs:EPSG::2718';

    /**
     * Pulkovo 1995 / 3-degree Gauss-Kruger CM 81E
     * Extent: Russia - onshore between 79°30'E and 82°30'E
     * Truncated form of Pulkovo 1995 / 3-degree Gauss-Kruger zone 27 (code 2661).
     */
    public const EPSG_PULKOVO_1995_3_DEGREE_GAUSS_KRUGER_CM_81E = 'urn:ogc:def:crs:EPSG::2719';

    /**
     * Pulkovo 1995 / 3-degree Gauss-Kruger CM 84E
     * Extent: Russia - onshore between 82°30'E and 85°30'E
     * Truncated form of Pulkovo 1995 / 3-degree Gauss-Kruger zone 28 (code 2662).
     */
    public const EPSG_PULKOVO_1995_3_DEGREE_GAUSS_KRUGER_CM_84E = 'urn:ogc:def:crs:EPSG::2720';

    /**
     * Pulkovo 1995 / 3-degree Gauss-Kruger CM 87E
     * Extent: Russia - onshore between 85°30'E and 88°30'E
     * Truncated form of Pulkovo 1995 / 3-degree Gauss-Kruger zone 29 (code 2663).
     */
    public const EPSG_PULKOVO_1995_3_DEGREE_GAUSS_KRUGER_CM_87E = 'urn:ogc:def:crs:EPSG::2721';

    /**
     * Pulkovo 1995 / 3-degree Gauss-Kruger CM 90E
     * Extent: Russia - onshore between 88°30'E and 91°30'E
     * Truncated form of Pulkovo 1995 / 3-degree Gauss-Kruger zone 30 (code 2664).
     */
    public const EPSG_PULKOVO_1995_3_DEGREE_GAUSS_KRUGER_CM_90E = 'urn:ogc:def:crs:EPSG::2722';

    /**
     * Pulkovo 1995 / 3-degree Gauss-Kruger CM 93E
     * Extent: Russia - onshore between 91°30'E and 94°30'E
     * Truncated form of Pulkovo 1995 / 3-degree Gauss-Kruger zone 31 (code 2665).
     */
    public const EPSG_PULKOVO_1995_3_DEGREE_GAUSS_KRUGER_CM_93E = 'urn:ogc:def:crs:EPSG::2723';

    /**
     * Pulkovo 1995 / 3-degree Gauss-Kruger CM 96E
     * Extent: Russia - onshore between 94°30'E and 97°30'E
     * Truncated form of Pulkovo 1995 / 3-degree Gauss-Kruger zone 32 (code 2666).
     */
    public const EPSG_PULKOVO_1995_3_DEGREE_GAUSS_KRUGER_CM_96E = 'urn:ogc:def:crs:EPSG::2724';

    /**
     * Pulkovo 1995 / 3-degree Gauss-Kruger CM 99E
     * Extent: Russia - onshore between 97°30'E and 100°30'E
     * Truncated form of Pulkovo 1995 / 3-degree Gauss-Kruger zone 33 (code 2667).
     */
    public const EPSG_PULKOVO_1995_3_DEGREE_GAUSS_KRUGER_CM_99E = 'urn:ogc:def:crs:EPSG::2725';

    /**
     * Pulkovo 1995 / 3-degree Gauss-Kruger zone 10
     * Extent: Russia - onshore between 28°30'E and 31°30'E
     * Also found with truncated false easting - see Pulkovo 1995 / 3-degree Gauss-Kruger CM 30E (code 2702).
     */
    public const EPSG_PULKOVO_1995_3_DEGREE_GAUSS_KRUGER_ZONE_10 = 'urn:ogc:def:crs:EPSG::2644';

    /**
     * Pulkovo 1995 / 3-degree Gauss-Kruger zone 11
     * Extent: Russia - onshore between 31°30'E and 34°30'E
     * Also found with truncated false easting - see Pulkovo 1995 / 3-degree Gauss-Kruger CM 33E (code 2703).
     */
    public const EPSG_PULKOVO_1995_3_DEGREE_GAUSS_KRUGER_ZONE_11 = 'urn:ogc:def:crs:EPSG::2645';

    /**
     * Pulkovo 1995 / 3-degree Gauss-Kruger zone 12
     * Extent: Russia - onshore between 34°30'E and 37°30'E
     * Also found with truncated false easting - see Pulkovo 1995 / 3-degree Gauss-Kruger CM 36E (code 2704).
     */
    public const EPSG_PULKOVO_1995_3_DEGREE_GAUSS_KRUGER_ZONE_12 = 'urn:ogc:def:crs:EPSG::2646';

    /**
     * Pulkovo 1995 / 3-degree Gauss-Kruger zone 13
     * Extent: Russia - onshore between 37°30'E and 40°30'E
     * Also found with truncated false easting - see Pulkovo 1995 / 3-degree Gauss-Kruger CM 39E (code 2705).
     */
    public const EPSG_PULKOVO_1995_3_DEGREE_GAUSS_KRUGER_ZONE_13 = 'urn:ogc:def:crs:EPSG::2647';

    /**
     * Pulkovo 1995 / 3-degree Gauss-Kruger zone 14
     * Extent: Russia - onshore between 40°30'E and 43°30'E
     * Also found with truncated false easting - see Pulkovo 1995 / 3-degree Gauss-Kruger CM 42E (code 2706).
     */
    public const EPSG_PULKOVO_1995_3_DEGREE_GAUSS_KRUGER_ZONE_14 = 'urn:ogc:def:crs:EPSG::2648';

    /**
     * Pulkovo 1995 / 3-degree Gauss-Kruger zone 15
     * Extent: Russia - onshore between 43°30'E and 46°30'E
     * Also found with truncated false easting - see Pulkovo 1995 / 3-degree Gauss-Kruger CM 45E (code 2707).
     */
    public const EPSG_PULKOVO_1995_3_DEGREE_GAUSS_KRUGER_ZONE_15 = 'urn:ogc:def:crs:EPSG::2649';

    /**
     * Pulkovo 1995 / 3-degree Gauss-Kruger zone 16
     * Extent: Russia - onshore between 46°30'E and 49°30'E
     * Also found with truncated false easting - see Pulkovo 1995 / 3-degree Gauss-Kruger CM 48E (code 2708).
     */
    public const EPSG_PULKOVO_1995_3_DEGREE_GAUSS_KRUGER_ZONE_16 = 'urn:ogc:def:crs:EPSG::2650';

    /**
     * Pulkovo 1995 / 3-degree Gauss-Kruger zone 17
     * Extent: Russia - onshore between 49°30'E and 52°30'E
     * Also found with truncated false easting - see Pulkovo 1995 / 3-degree Gauss-Kruger CM 51E (code 2709).
     */
    public const EPSG_PULKOVO_1995_3_DEGREE_GAUSS_KRUGER_ZONE_17 = 'urn:ogc:def:crs:EPSG::2651';

    /**
     * Pulkovo 1995 / 3-degree Gauss-Kruger zone 18
     * Extent: Russia - onshore between 52°30'E and 55°30'E
     * Also found with truncated false easting - see Pulkovo 1995 / 3-degree Gauss-Kruger CM 54E (code 2710).
     */
    public const EPSG_PULKOVO_1995_3_DEGREE_GAUSS_KRUGER_ZONE_18 = 'urn:ogc:def:crs:EPSG::2652';

    /**
     * Pulkovo 1995 / 3-degree Gauss-Kruger zone 19
     * Extent: Russia - onshore between 55°30'E and 58°30'E
     * Also found with truncated false easting - see Pulkovo 1995 / 3-degree Gauss-Kruger CM 57E (code 2711).
     */
    public const EPSG_PULKOVO_1995_3_DEGREE_GAUSS_KRUGER_ZONE_19 = 'urn:ogc:def:crs:EPSG::2653';

    /**
     * Pulkovo 1995 / 3-degree Gauss-Kruger zone 20
     * Extent: Russia - onshore between 58°30'E and 61°30'E
     * Also found with truncated false easting - see Pulkovo 1995 / 3-degree Gauss-Kruger CM 60E (code 2712).
     */
    public const EPSG_PULKOVO_1995_3_DEGREE_GAUSS_KRUGER_ZONE_20 = 'urn:ogc:def:crs:EPSG::2654';

    /**
     * Pulkovo 1995 / 3-degree Gauss-Kruger zone 21
     * Extent: Russia - onshore between 61°30'E and 64°30'E
     * Also found with truncated false easting - see Pulkovo 1995 / 3-degree Gauss-Kruger CM 63E (code 2713).
     */
    public const EPSG_PULKOVO_1995_3_DEGREE_GAUSS_KRUGER_ZONE_21 = 'urn:ogc:def:crs:EPSG::2655';

    /**
     * Pulkovo 1995 / 3-degree Gauss-Kruger zone 22
     * Extent: Russia - onshore between 64°30'E and 67°30'E
     * Also found with truncated false easting - see Pulkovo 1995 / 3-degree Gauss-Kruger CM 66E (code 2714).
     */
    public const EPSG_PULKOVO_1995_3_DEGREE_GAUSS_KRUGER_ZONE_22 = 'urn:ogc:def:crs:EPSG::2656';

    /**
     * Pulkovo 1995 / 3-degree Gauss-Kruger zone 23
     * Extent: Russia - onshore between 67°30'E and 70°30'E
     * Also found with truncated false easting - see Pulkovo 1995 / 3-degree Gauss-Kruger CM 69E (code 2715).
     */
    public const EPSG_PULKOVO_1995_3_DEGREE_GAUSS_KRUGER_ZONE_23 = 'urn:ogc:def:crs:EPSG::2657';

    /**
     * Pulkovo 1995 / 3-degree Gauss-Kruger zone 24
     * Extent: Russia - onshore between 70°30'E and 73°30'E
     * Also found with truncated false easting - see Pulkovo 1995 / 3-degree Gauss-Kruger CM 72E (code 2716).
     */
    public const EPSG_PULKOVO_1995_3_DEGREE_GAUSS_KRUGER_ZONE_24 = 'urn:ogc:def:crs:EPSG::2658';

    /**
     * Pulkovo 1995 / 3-degree Gauss-Kruger zone 25
     * Extent: Russia - onshore between 73°30'E and 76°30'E
     * Also found with truncated false easting - see Pulkovo 1995 / 3-degree Gauss-Kruger CM 75E (code 2717).
     */
    public const EPSG_PULKOVO_1995_3_DEGREE_GAUSS_KRUGER_ZONE_25 = 'urn:ogc:def:crs:EPSG::2659';

    /**
     * Pulkovo 1995 / 3-degree Gauss-Kruger zone 26
     * Extent: Russia - onshore between 76°30'E and 79°30'E
     * Also found with truncated false easting - see Pulkovo 1995 / 3-degree Gauss-Kruger CM 78E (code 2718).
     */
    public const EPSG_PULKOVO_1995_3_DEGREE_GAUSS_KRUGER_ZONE_26 = 'urn:ogc:def:crs:EPSG::2660';

    /**
     * Pulkovo 1995 / 3-degree Gauss-Kruger zone 27
     * Extent: Russia - onshore between 79°30'E and 82°30'E
     * Also found with truncated false easting - see Pulkovo 1995 / 3-degree Gauss-Kruger CM 81E (code 2719).
     */
    public const EPSG_PULKOVO_1995_3_DEGREE_GAUSS_KRUGER_ZONE_27 = 'urn:ogc:def:crs:EPSG::2661';

    /**
     * Pulkovo 1995 / 3-degree Gauss-Kruger zone 28
     * Extent: Russia - onshore between 82°30'E and 85°30'E
     * Also found with truncated false easting - see Pulkovo 1995 / 3-degree Gauss-Kruger CM 84E (code 2720).
     */
    public const EPSG_PULKOVO_1995_3_DEGREE_GAUSS_KRUGER_ZONE_28 = 'urn:ogc:def:crs:EPSG::2662';

    /**
     * Pulkovo 1995 / 3-degree Gauss-Kruger zone 29
     * Extent: Russia - onshore between 85°30'E and 88°30'E
     * Also found with truncated false easting - see Pulkovo 1995 / 3-degree Gauss-Kruger CM 87E (code 2721).
     */
    public const EPSG_PULKOVO_1995_3_DEGREE_GAUSS_KRUGER_ZONE_29 = 'urn:ogc:def:crs:EPSG::2663';

    /**
     * Pulkovo 1995 / 3-degree Gauss-Kruger zone 30
     * Extent: Russia - onshore between 88°30'E and 91°30'E
     * Also found with truncated false easting - see Pulkovo 1995 / 3-degree Gauss-Kruger CM 90E (code 2722).
     */
    public const EPSG_PULKOVO_1995_3_DEGREE_GAUSS_KRUGER_ZONE_30 = 'urn:ogc:def:crs:EPSG::2664';

    /**
     * Pulkovo 1995 / 3-degree Gauss-Kruger zone 31
     * Extent: Russia - onshore between 91°30'E and 94°30'E
     * Also found with truncated false easting - see Pulkovo 1995 / 3-degree Gauss-Kruger CM 93E (code 2723).
     */
    public const EPSG_PULKOVO_1995_3_DEGREE_GAUSS_KRUGER_ZONE_31 = 'urn:ogc:def:crs:EPSG::2665';

    /**
     * Pulkovo 1995 / 3-degree Gauss-Kruger zone 32
     * Extent: Russia - onshore between 94°30'E and 97°30'E
     * Also found with truncated false easting - see Pulkovo 1995 / 3-degree Gauss-Kruger CM 96E (code 2724).
     */
    public const EPSG_PULKOVO_1995_3_DEGREE_GAUSS_KRUGER_ZONE_32 = 'urn:ogc:def:crs:EPSG::2666';

    /**
     * Pulkovo 1995 / 3-degree Gauss-Kruger zone 33
     * Extent: Russia - onshore between 97°30'E and 100°30'E
     * Also found with truncated false easting - see Pulkovo 1995 / 3-degree Gauss-Kruger CM 99E (code 2725).
     */
    public const EPSG_PULKOVO_1995_3_DEGREE_GAUSS_KRUGER_ZONE_33 = 'urn:ogc:def:crs:EPSG::2667';

    /**
     * Pulkovo 1995 / 3-degree Gauss-Kruger zone 34
     * Extent: Russia - onshore between 100°30'E and 103°30'E
     * Also found with truncated false easting - see Pulkovo 1995 / 3-degree Gauss-Kruger CM 102E (code 2726).
     */
    public const EPSG_PULKOVO_1995_3_DEGREE_GAUSS_KRUGER_ZONE_34 = 'urn:ogc:def:crs:EPSG::2668';

    /**
     * Pulkovo 1995 / 3-degree Gauss-Kruger zone 35
     * Extent: Russia - onshore between 103°30'E and 106°30'E
     * Also found with truncated false easting - see Pulkovo 1995 / 3-degree Gauss-Kruger CM 105E (code 2727).
     */
    public const EPSG_PULKOVO_1995_3_DEGREE_GAUSS_KRUGER_ZONE_35 = 'urn:ogc:def:crs:EPSG::2669';

    /**
     * Pulkovo 1995 / 3-degree Gauss-Kruger zone 36
     * Extent: Russia - onshore between 106°30'E and 109°30'E
     * Also found with truncated false easting - see Pulkovo 1995 / 3-degree Gauss-Kruger CM 108E (code 2728).
     */
    public const EPSG_PULKOVO_1995_3_DEGREE_GAUSS_KRUGER_ZONE_36 = 'urn:ogc:def:crs:EPSG::2670';

    /**
     * Pulkovo 1995 / 3-degree Gauss-Kruger zone 37
     * Extent: Russia - onshore between 109°30'E and 112°30'E
     * Also found with truncated false easting - see Pulkovo 1995 / 3-degree Gauss-Kruger CM 111E (code 2729).
     */
    public const EPSG_PULKOVO_1995_3_DEGREE_GAUSS_KRUGER_ZONE_37 = 'urn:ogc:def:crs:EPSG::2671';

    /**
     * Pulkovo 1995 / 3-degree Gauss-Kruger zone 38
     * Extent: Russia - onshore between 112°30'E and 115°30'E
     * Also found with truncated false easting - see Pulkovo 1995 / 3-degree Gauss-Kruger CM 114E (code 2730).
     */
    public const EPSG_PULKOVO_1995_3_DEGREE_GAUSS_KRUGER_ZONE_38 = 'urn:ogc:def:crs:EPSG::2672';

    /**
     * Pulkovo 1995 / 3-degree Gauss-Kruger zone 39
     * Extent: Russia - onshore between 115°30'E and 118°30'E
     * Also found with truncated false easting - see Pulkovo 1995 / 3-degree Gauss-Kruger CM 117E (code 2731).
     */
    public const EPSG_PULKOVO_1995_3_DEGREE_GAUSS_KRUGER_ZONE_39 = 'urn:ogc:def:crs:EPSG::2673';

    /**
     * Pulkovo 1995 / 3-degree Gauss-Kruger zone 40
     * Extent: Russia - onshore between 118°30'E and 121°30'E
     * Also found with truncated false easting - see Pulkovo 1995 / 3-degree Gauss-Kruger CM 120E (code 2732).
     */
    public const EPSG_PULKOVO_1995_3_DEGREE_GAUSS_KRUGER_ZONE_40 = 'urn:ogc:def:crs:EPSG::2674';

    /**
     * Pulkovo 1995 / 3-degree Gauss-Kruger zone 41
     * Extent: Russia - onshore between 121°30'E and 124°30'E
     * Also found with truncated false easting - see Pulkovo 1995 / 3-degree Gauss-Kruger CM 123E (code 2733).
     */
    public const EPSG_PULKOVO_1995_3_DEGREE_GAUSS_KRUGER_ZONE_41 = 'urn:ogc:def:crs:EPSG::2675';

    /**
     * Pulkovo 1995 / 3-degree Gauss-Kruger zone 42
     * Extent: Russia - onshore between 124°30'E and 127°30'E
     * Also found with truncated false easting - see Pulkovo 1995 / 3-degree Gauss-Kruger CM 126E (code 2734).
     */
    public const EPSG_PULKOVO_1995_3_DEGREE_GAUSS_KRUGER_ZONE_42 = 'urn:ogc:def:crs:EPSG::2676';

    /**
     * Pulkovo 1995 / 3-degree Gauss-Kruger zone 43
     * Extent: Russia - onshore between 127°30'E and 130°30'E
     * Also found with truncated false easting - see Pulkovo 1995 / 3-degree Gauss-Kruger CM 129E (code 2735).
     */
    public const EPSG_PULKOVO_1995_3_DEGREE_GAUSS_KRUGER_ZONE_43 = 'urn:ogc:def:crs:EPSG::2677';

    /**
     * Pulkovo 1995 / 3-degree Gauss-Kruger zone 44
     * Extent: Russia - onshore between 130°30'E and 133°30'E
     * Also found with truncated false easting - see Pulkovo 1995 / 3-degree Gauss-Kruger CM 132E (code 2738).
     */
    public const EPSG_PULKOVO_1995_3_DEGREE_GAUSS_KRUGER_ZONE_44 = 'urn:ogc:def:crs:EPSG::2678';

    /**
     * Pulkovo 1995 / 3-degree Gauss-Kruger zone 45
     * Extent: Russia - onshore between 133°30'E and 136°30'E
     * Also found with truncated false easting - see Pulkovo 1995 / 3-degree Gauss-Kruger CM 135E (code 2739).
     */
    public const EPSG_PULKOVO_1995_3_DEGREE_GAUSS_KRUGER_ZONE_45 = 'urn:ogc:def:crs:EPSG::2679';

    /**
     * Pulkovo 1995 / 3-degree Gauss-Kruger zone 46
     * Extent: Russia - onshore between 136°30'E and 139°30'E
     * Also found with truncated false easting - see Pulkovo 1995 / 3-degree Gauss-Kruger CM 138E (code 2740).
     */
    public const EPSG_PULKOVO_1995_3_DEGREE_GAUSS_KRUGER_ZONE_46 = 'urn:ogc:def:crs:EPSG::2680';

    /**
     * Pulkovo 1995 / 3-degree Gauss-Kruger zone 47
     * Extent: Russia - onshore between 139°30'E and 142°30'E
     * Also found with truncated false easting - see Pulkovo 1995 / 3-degree Gauss-Kruger CM 141E (code 2741).
     */
    public const EPSG_PULKOVO_1995_3_DEGREE_GAUSS_KRUGER_ZONE_47 = 'urn:ogc:def:crs:EPSG::2681';

    /**
     * Pulkovo 1995 / 3-degree Gauss-Kruger zone 48
     * Extent: Russia - onshore between 142°30'E and 145°30'E
     * Also found with truncated false easting - see Pulkovo 1995 / 3-degree Gauss-Kruger CM 144E (code 2742).
     */
    public const EPSG_PULKOVO_1995_3_DEGREE_GAUSS_KRUGER_ZONE_48 = 'urn:ogc:def:crs:EPSG::2682';

    /**
     * Pulkovo 1995 / 3-degree Gauss-Kruger zone 49
     * Extent: Russia - onshore between 145°30'E and 148°30'E
     * Also found with truncated false easting - see Pulkovo 1995 / 3-degree Gauss-Kruger CM 147E (code 2743).
     */
    public const EPSG_PULKOVO_1995_3_DEGREE_GAUSS_KRUGER_ZONE_49 = 'urn:ogc:def:crs:EPSG::2683';

    /**
     * Pulkovo 1995 / 3-degree Gauss-Kruger zone 50
     * Extent: Russia - onshore between 148°30'E and 151°30'E
     * Also found with truncated false easting - see Pulkovo 1995 / 3-degree Gauss-Kruger CM 150E (code 2744).
     */
    public const EPSG_PULKOVO_1995_3_DEGREE_GAUSS_KRUGER_ZONE_50 = 'urn:ogc:def:crs:EPSG::2684';

    /**
     * Pulkovo 1995 / 3-degree Gauss-Kruger zone 51
     * Extent: Russia - onshore between 151°30'E and 154°30'E
     * Also found with truncated false easting - see Pulkovo 1995 / 3-degree Gauss-Kruger CM 153E (code 2745).
     */
    public const EPSG_PULKOVO_1995_3_DEGREE_GAUSS_KRUGER_ZONE_51 = 'urn:ogc:def:crs:EPSG::2685';

    /**
     * Pulkovo 1995 / 3-degree Gauss-Kruger zone 52
     * Extent: Russia - onshore between 154°30'E and 157°30'E
     * Also found with truncated false easting - see Pulkovo 1995 / 3-degree Gauss-Kruger CM 156E (code 2746).
     */
    public const EPSG_PULKOVO_1995_3_DEGREE_GAUSS_KRUGER_ZONE_52 = 'urn:ogc:def:crs:EPSG::2686';

    /**
     * Pulkovo 1995 / 3-degree Gauss-Kruger zone 53
     * Extent: Russia - onshore between 157°30'E and 160°30'E
     * Also found with truncated false easting - see Pulkovo 1995 / 3-degree Gauss-Kruger CM 159E (code 2747).
     */
    public const EPSG_PULKOVO_1995_3_DEGREE_GAUSS_KRUGER_ZONE_53 = 'urn:ogc:def:crs:EPSG::2687';

    /**
     * Pulkovo 1995 / 3-degree Gauss-Kruger zone 54
     * Extent: Russia - onshore between 160°30'E and 163°30'E
     * Also found with truncated false easting - see Pulkovo 1995 / 3-degree Gauss-Kruger CM 162E (code 2748).
     */
    public const EPSG_PULKOVO_1995_3_DEGREE_GAUSS_KRUGER_ZONE_54 = 'urn:ogc:def:crs:EPSG::2688';

    /**
     * Pulkovo 1995 / 3-degree Gauss-Kruger zone 55
     * Extent: Russia - onshore between 163°30'E and 166°30'E
     * Also found with truncated false easting - see Pulkovo 1995 / 3-degree Gauss-Kruger CM 165E (code 2749).
     */
    public const EPSG_PULKOVO_1995_3_DEGREE_GAUSS_KRUGER_ZONE_55 = 'urn:ogc:def:crs:EPSG::2689';

    /**
     * Pulkovo 1995 / 3-degree Gauss-Kruger zone 56
     * Extent: Russia - onshore between 166°30'E and 169°30'E
     * Also found with truncated false easting - see Pulkovo 1995 / 3-degree Gauss-Kruger CM 168E (code 2750).
     */
    public const EPSG_PULKOVO_1995_3_DEGREE_GAUSS_KRUGER_ZONE_56 = 'urn:ogc:def:crs:EPSG::2690';

    /**
     * Pulkovo 1995 / 3-degree Gauss-Kruger zone 57
     * Extent: Russia - onshore between 169°30'E and 172°30'E
     * Also found with truncated false easting - see Pulkovo 1995 / 3-degree Gauss-Kruger CM 171E (code 2751).
     */
    public const EPSG_PULKOVO_1995_3_DEGREE_GAUSS_KRUGER_ZONE_57 = 'urn:ogc:def:crs:EPSG::2691';

    /**
     * Pulkovo 1995 / 3-degree Gauss-Kruger zone 58
     * Extent: Russia - onshore between 172°30'E and 175°30'E
     * Also found with truncated false easting - see Pulkovo 1995 / 3-degree Gauss-Kruger CM 174E (code 2752).
     */
    public const EPSG_PULKOVO_1995_3_DEGREE_GAUSS_KRUGER_ZONE_58 = 'urn:ogc:def:crs:EPSG::2692';

    /**
     * Pulkovo 1995 / 3-degree Gauss-Kruger zone 59
     * Extent: Russia - onshore between 175°30'E and 178°30'E
     * Also found with truncated false easting - see Pulkovo 1995 / 3-degree Gauss-Kruger CM 177E (code 2753).
     */
    public const EPSG_PULKOVO_1995_3_DEGREE_GAUSS_KRUGER_ZONE_59 = 'urn:ogc:def:crs:EPSG::2693';

    /**
     * Pulkovo 1995 / 3-degree Gauss-Kruger zone 60
     * Extent: Russia - onshore between 178°30'E and 178°30'W
     * Also found with truncated false easting - see Pulkovo 1995 / 3-degree Gauss-Kruger CM 180E (code 2754).
     */
    public const EPSG_PULKOVO_1995_3_DEGREE_GAUSS_KRUGER_ZONE_60 = 'urn:ogc:def:crs:EPSG::3390';

    /**
     * Pulkovo 1995 / 3-degree Gauss-Kruger zone 61
     * Extent: Russia - onshore between 178°30'W and 175°30'W
     * Also found with truncated false easting - see Pulkovo 1995 / 3-degree Gauss-Kruger CM 177W (code 2755).
     */
    public const EPSG_PULKOVO_1995_3_DEGREE_GAUSS_KRUGER_ZONE_61 = 'urn:ogc:def:crs:EPSG::2695';

    /**
     * Pulkovo 1995 / 3-degree Gauss-Kruger zone 62
     * Extent: Russia - onshore between 175°30'W and 172°30'W
     * Also found with truncated false easting - see Pulkovo 1995 / 3-degree Gauss-Kruger CM 174W (code 2756).
     */
    public const EPSG_PULKOVO_1995_3_DEGREE_GAUSS_KRUGER_ZONE_62 = 'urn:ogc:def:crs:EPSG::2696';

    /**
     * Pulkovo 1995 / 3-degree Gauss-Kruger zone 63
     * Extent: Russia - onshore between 172°30'W and 169°30'W
     * Also found with truncated false easting - see Pulkovo 1995 / 3-degree Gauss-Kruger CM 171W (code 2757).
     */
    public const EPSG_PULKOVO_1995_3_DEGREE_GAUSS_KRUGER_ZONE_63 = 'urn:ogc:def:crs:EPSG::2697';

    /**
     * Pulkovo 1995 / 3-degree Gauss-Kruger zone 64
     * Extent: Russia - onshore between 169°30'W and 166°30'W
     * Also found with truncated false easting - see Pulkovo 1995 / 3-degree Gauss-Kruger CM 168W (code 2758).
     */
    public const EPSG_PULKOVO_1995_3_DEGREE_GAUSS_KRUGER_ZONE_64 = 'urn:ogc:def:crs:EPSG::2698';

    /**
     * Pulkovo 1995 / 3-degree Gauss-Kruger zone 7
     * Extent: Russia - Kaliningrad - onshore between 19°30'E and 22°30'E
     * Also found with truncated false easting - see Pulkovo 1995 / 3-degree Gauss-Kruger CM 21E (code 2699).
     */
    public const EPSG_PULKOVO_1995_3_DEGREE_GAUSS_KRUGER_ZONE_7 = 'urn:ogc:def:crs:EPSG::2641';

    /**
     * Pulkovo 1995 / 3-degree Gauss-Kruger zone 8
     * Extent: Russia - onshore between 22°30'E and 25°30'E - Kaliningrad
     * Also found with truncated false easting - see Pulkovo 1995 / 3-degree Gauss-Kruger CM 24E (code 2700).
     */
    public const EPSG_PULKOVO_1995_3_DEGREE_GAUSS_KRUGER_ZONE_8 = 'urn:ogc:def:crs:EPSG::2642';

    /**
     * Pulkovo 1995 / 3-degree Gauss-Kruger zone 9
     * Extent: Russia - onshore between 25°30'E and 28°30'E
     * Also found with truncated false easting - see Pulkovo 1995 / 3-degree Gauss-Kruger CM 27E (code 2701).
     */
    public const EPSG_PULKOVO_1995_3_DEGREE_GAUSS_KRUGER_ZONE_9 = 'urn:ogc:def:crs:EPSG::2643';

    /**
     * Pulkovo 1995 / Gauss-Kruger CM 105E
     * Extent: Russia - onshore between 102°E and 108°E
     * Truncated form of Pulkovo 1995 / Gauss-Kruger zone 18 (code 20018).
     */
    public const EPSG_PULKOVO_1995_GAUSS_KRUGER_CM_105E = 'urn:ogc:def:crs:EPSG::2477';

    /**
     * Pulkovo 1995 / Gauss-Kruger CM 111E
     * Extent: Russia - onshore between 108°E and 114°E
     * Truncated form of Pulkovo 1995 / Gauss-Kruger zone 19 (code 20019).
     */
    public const EPSG_PULKOVO_1995_GAUSS_KRUGER_CM_111E = 'urn:ogc:def:crs:EPSG::2478';

    /**
     * Pulkovo 1995 / Gauss-Kruger CM 117E
     * Extent: Russia - onshore between 114°E and 120°E
     * Truncated form of Pulkovo 1995 / Gauss-Kruger zone 20 (code 20020).
     */
    public const EPSG_PULKOVO_1995_GAUSS_KRUGER_CM_117E = 'urn:ogc:def:crs:EPSG::2479';

    /**
     * Pulkovo 1995 / Gauss-Kruger CM 123E
     * Extent: Russia - onshore between 120°E and 126°E
     * Truncated form of Pulkovo 1995 / Gauss-Kruger zone 21 (code 20021).
     */
    public const EPSG_PULKOVO_1995_GAUSS_KRUGER_CM_123E = 'urn:ogc:def:crs:EPSG::2480';

    /**
     * Pulkovo 1995 / Gauss-Kruger CM 129E
     * Extent: Russia - onshore between 126°E and 132°E
     * Truncated form of Pulkovo 1995 / Gauss-Kruger zone 22 (code 20022).
     */
    public const EPSG_PULKOVO_1995_GAUSS_KRUGER_CM_129E = 'urn:ogc:def:crs:EPSG::2481';

    /**
     * Pulkovo 1995 / Gauss-Kruger CM 135E
     * Extent: Russia - onshore between 132°E and 138°E
     * Truncated form of Pulkovo 1995 / Gauss-Kruger zone 23 (code 20023).
     */
    public const EPSG_PULKOVO_1995_GAUSS_KRUGER_CM_135E = 'urn:ogc:def:crs:EPSG::2482';

    /**
     * Pulkovo 1995 / Gauss-Kruger CM 141E
     * Extent: Russia - onshore between 138°E and 144°E
     * Truncated form of Pulkovo 1995 / Gauss-Kruger zone 24 (code 20024).
     */
    public const EPSG_PULKOVO_1995_GAUSS_KRUGER_CM_141E = 'urn:ogc:def:crs:EPSG::2483';

    /**
     * Pulkovo 1995 / Gauss-Kruger CM 147E
     * Extent: Russia - onshore between 144°E and 150°E
     * Truncated form of Pulkovo 1995 / Gauss-Kruger zone 25 (code 20025).
     */
    public const EPSG_PULKOVO_1995_GAUSS_KRUGER_CM_147E = 'urn:ogc:def:crs:EPSG::2484';

    /**
     * Pulkovo 1995 / Gauss-Kruger CM 153E
     * Extent: Russia - onshore between 150°E and 156°E
     * Truncated form of Pulkovo 1995 / Gauss-Kruger zone 26 (code 20026).
     */
    public const EPSG_PULKOVO_1995_GAUSS_KRUGER_CM_153E = 'urn:ogc:def:crs:EPSG::2485';

    /**
     * Pulkovo 1995 / Gauss-Kruger CM 159E
     * Extent: Russia - onshore between 156°E and 162°E
     * Truncated form of Pulkovo 1995 / Gauss-Kruger zone 27 (code 20027).
     */
    public const EPSG_PULKOVO_1995_GAUSS_KRUGER_CM_159E = 'urn:ogc:def:crs:EPSG::2486';

    /**
     * Pulkovo 1995 / Gauss-Kruger CM 165E
     * Extent: Russia - onshore between 162°E and 168°E
     * Truncated form of Pulkovo 1995 / Gauss-Kruger zone 28 (code 20028).
     */
    public const EPSG_PULKOVO_1995_GAUSS_KRUGER_CM_165E = 'urn:ogc:def:crs:EPSG::2487';

    /**
     * Pulkovo 1995 / Gauss-Kruger CM 171E
     * Extent: Russia - onshore between 168°E and 174°E
     * Truncated form of Pulkovo 1995 / Gauss-Kruger zone 29 (code 20029).
     */
    public const EPSG_PULKOVO_1995_GAUSS_KRUGER_CM_171E = 'urn:ogc:def:crs:EPSG::2488';

    /**
     * Pulkovo 1995 / Gauss-Kruger CM 171W
     * Extent: Russia - onshore east of 174°W
     * Truncated form of Pulkovo 1995 / Gauss-Kruger zone 32 (code 20032).
     */
    public const EPSG_PULKOVO_1995_GAUSS_KRUGER_CM_171W = 'urn:ogc:def:crs:EPSG::2491';

    /**
     * Pulkovo 1995 / Gauss-Kruger CM 177E
     * Extent: Russia - onshore between 174°E and 180°E
     * Truncated form of Pulkovo 1995 / Gauss-Kruger zone 30 (code 20030).
     */
    public const EPSG_PULKOVO_1995_GAUSS_KRUGER_CM_177E = 'urn:ogc:def:crs:EPSG::2489';

    /**
     * Pulkovo 1995 / Gauss-Kruger CM 177W
     * Extent: Russia - onshore between 180°E and 174°W
     * Truncated form of Pulkovo 1995 / Gauss-Kruger zone 31 (code 20031).
     */
    public const EPSG_PULKOVO_1995_GAUSS_KRUGER_CM_177W = 'urn:ogc:def:crs:EPSG::2490';

    /**
     * Pulkovo 1995 / Gauss-Kruger CM 21E
     * Extent: Russia - onshore west of 24°E - Kaliningrad
     * Truncated form of Pulkovo 1995 / Gauss-Kruger zone 4 (code 20004).
     */
    public const EPSG_PULKOVO_1995_GAUSS_KRUGER_CM_21E = 'urn:ogc:def:crs:EPSG::2463';

    /**
     * Pulkovo 1995 / Gauss-Kruger CM 27E
     * Extent: Russia - onshore between 24°E and 30°E
     * Truncated form of Pulkovo 1995 / Gauss-Kruger zone 5 (code 20005).
     */
    public const EPSG_PULKOVO_1995_GAUSS_KRUGER_CM_27E = 'urn:ogc:def:crs:EPSG::2464';

    /**
     * Pulkovo 1995 / Gauss-Kruger CM 33E
     * Extent: Russia - onshore between 30°E and 36°E
     * Truncated form of Pulkovo 1995 / Gauss-Kruger zone 6 (code 20006).
     */
    public const EPSG_PULKOVO_1995_GAUSS_KRUGER_CM_33E = 'urn:ogc:def:crs:EPSG::2465';

    /**
     * Pulkovo 1995 / Gauss-Kruger CM 39E
     * Extent: Russia - onshore between 36°E and 42°E
     * Truncated form of Pulkovo 1995 / Gauss-Kruger zone 7 (code 20007).
     */
    public const EPSG_PULKOVO_1995_GAUSS_KRUGER_CM_39E = 'urn:ogc:def:crs:EPSG::2466';

    /**
     * Pulkovo 1995 / Gauss-Kruger CM 45E
     * Extent: Russia - onshore between 42°E and 48°E
     * Truncated form of Pulkovo 1995 / Gauss-Kruger zone 8 (code 20008).
     */
    public const EPSG_PULKOVO_1995_GAUSS_KRUGER_CM_45E = 'urn:ogc:def:crs:EPSG::2467';

    /**
     * Pulkovo 1995 / Gauss-Kruger CM 51E
     * Extent: Russia - onshore between 48°E and 54°E
     * Truncated form of Pulkovo 1995 / Gauss-Kruger zone 9 (code 20009).
     */
    public const EPSG_PULKOVO_1995_GAUSS_KRUGER_CM_51E = 'urn:ogc:def:crs:EPSG::2468';

    /**
     * Pulkovo 1995 / Gauss-Kruger CM 57E
     * Extent: Russia - onshore between 54°E and 60°E
     * Truncated form of Pulkovo 1995 / Gauss-Kruger zone 10 (code 20010).
     */
    public const EPSG_PULKOVO_1995_GAUSS_KRUGER_CM_57E = 'urn:ogc:def:crs:EPSG::2469';

    /**
     * Pulkovo 1995 / Gauss-Kruger CM 63E
     * Extent: Russia - onshore between 60°E and 66°E
     * Truncated form of Pulkovo 1995 / Gauss-Kruger zone 11 (code 20011).
     */
    public const EPSG_PULKOVO_1995_GAUSS_KRUGER_CM_63E = 'urn:ogc:def:crs:EPSG::2470';

    /**
     * Pulkovo 1995 / Gauss-Kruger CM 69E
     * Extent: Russia - onshore between 66°E and 72°E
     * Truncated form of Pulkovo 1995 / Gauss-Kruger zone 12 (code 20012).
     */
    public const EPSG_PULKOVO_1995_GAUSS_KRUGER_CM_69E = 'urn:ogc:def:crs:EPSG::2471';

    /**
     * Pulkovo 1995 / Gauss-Kruger CM 75E
     * Extent: Russia - onshore between 72°E and 78°E
     * Truncated form of Pulkovo 1995 / Gauss-Kruger zone 13 (code 20013).
     */
    public const EPSG_PULKOVO_1995_GAUSS_KRUGER_CM_75E = 'urn:ogc:def:crs:EPSG::2472';

    /**
     * Pulkovo 1995 / Gauss-Kruger CM 81E
     * Extent: Russia - onshore between 78°E and 84°E
     * Truncated form of Pulkovo 1995 / Gauss-Kruger zone 14 (code 20014).
     */
    public const EPSG_PULKOVO_1995_GAUSS_KRUGER_CM_81E = 'urn:ogc:def:crs:EPSG::2473';

    /**
     * Pulkovo 1995 / Gauss-Kruger CM 87E
     * Extent: Russia - onshore between 84°E and 90°E
     * Truncated form of Pulkovo 1995 / Gauss-Kruger zone 15 (code 20015).
     */
    public const EPSG_PULKOVO_1995_GAUSS_KRUGER_CM_87E = 'urn:ogc:def:crs:EPSG::2474';

    /**
     * Pulkovo 1995 / Gauss-Kruger CM 93E
     * Extent: Russia - onshore between 90°E and 96°E
     * Truncated form of Pulkovo 1995 / Gauss-Kruger zone 16 (code 20016).
     */
    public const EPSG_PULKOVO_1995_GAUSS_KRUGER_CM_93E = 'urn:ogc:def:crs:EPSG::2475';

    /**
     * Pulkovo 1995 / Gauss-Kruger CM 99E
     * Extent: Russia - onshore between 96°E and 102°E
     * Truncated form of Pulkovo 1995 / Gauss-Kruger zone 17 (code 20017).
     */
    public const EPSG_PULKOVO_1995_GAUSS_KRUGER_CM_99E = 'urn:ogc:def:crs:EPSG::2476';

    /**
     * Pulkovo 1995 / Gauss-Kruger zone 10
     * Extent: Russia - onshore between 54°E and 60°E
     * Also found with truncated false easting - see Pulkovo 1995 / Gauss-Kruger CM 57E (code 2469).
     */
    public const EPSG_PULKOVO_1995_GAUSS_KRUGER_ZONE_10 = 'urn:ogc:def:crs:EPSG::20010';

    /**
     * Pulkovo 1995 / Gauss-Kruger zone 11
     * Extent: Russia - onshore between 60°E and 66°E
     * Also found with truncated false easting - see Pulkovo 1995 / Gauss-Kruger CM 63E (code 2470).
     */
    public const EPSG_PULKOVO_1995_GAUSS_KRUGER_ZONE_11 = 'urn:ogc:def:crs:EPSG::20011';

    /**
     * Pulkovo 1995 / Gauss-Kruger zone 12
     * Extent: Russia - onshore between 66°E and 72°E
     * Also found with truncated false easting - see Pulkovo 1995 / Gauss-Kruger CM 69E (code 2471).
     */
    public const EPSG_PULKOVO_1995_GAUSS_KRUGER_ZONE_12 = 'urn:ogc:def:crs:EPSG::20012';

    /**
     * Pulkovo 1995 / Gauss-Kruger zone 13
     * Extent: Russia - onshore between 72°E and 78°E
     * Also found with truncated false easting - see Pulkovo 1995 / Gauss-Kruger CM 75E (code 2472).
     */
    public const EPSG_PULKOVO_1995_GAUSS_KRUGER_ZONE_13 = 'urn:ogc:def:crs:EPSG::20013';

    /**
     * Pulkovo 1995 / Gauss-Kruger zone 14
     * Extent: Russia - onshore between 78°E and 84°E
     * Also found with truncated false easting - see Pulkovo 1995 / Gauss-Kruger CM 81E (code 2473).
     */
    public const EPSG_PULKOVO_1995_GAUSS_KRUGER_ZONE_14 = 'urn:ogc:def:crs:EPSG::20014';

    /**
     * Pulkovo 1995 / Gauss-Kruger zone 15
     * Extent: Russia - onshore between 84°E and 90°E
     * Also found with truncated false easting - see Pulkovo 1995 / Gauss-Kruger CM 87E (code 2474).
     */
    public const EPSG_PULKOVO_1995_GAUSS_KRUGER_ZONE_15 = 'urn:ogc:def:crs:EPSG::20015';

    /**
     * Pulkovo 1995 / Gauss-Kruger zone 16
     * Extent: Russia - onshore between 90°E and 96°E
     * Also found with truncated false easting - see Pulkovo 1995 / Gauss-Kruger CM 93E (code 2475).
     */
    public const EPSG_PULKOVO_1995_GAUSS_KRUGER_ZONE_16 = 'urn:ogc:def:crs:EPSG::20016';

    /**
     * Pulkovo 1995 / Gauss-Kruger zone 17
     * Extent: Russia - onshore between 96°E and 102°E
     * Also found with truncated false easting - see Pulkovo 1995 / Gauss-Kruger CM 99E (code 2476).
     */
    public const EPSG_PULKOVO_1995_GAUSS_KRUGER_ZONE_17 = 'urn:ogc:def:crs:EPSG::20017';

    /**
     * Pulkovo 1995 / Gauss-Kruger zone 18
     * Extent: Russia - onshore between 102°E and 108°E
     * Also found with truncated false easting - see Pulkovo 1995 / Gauss-Kruger CM 105E (code 2477).
     */
    public const EPSG_PULKOVO_1995_GAUSS_KRUGER_ZONE_18 = 'urn:ogc:def:crs:EPSG::20018';

    /**
     * Pulkovo 1995 / Gauss-Kruger zone 19
     * Extent: Russia - onshore between 108°E and 114°E
     * Also found with truncated false easting - see Pulkovo 1995 / Gauss-Kruger CM 111E (code 2478).
     */
    public const EPSG_PULKOVO_1995_GAUSS_KRUGER_ZONE_19 = 'urn:ogc:def:crs:EPSG::20019';

    /**
     * Pulkovo 1995 / Gauss-Kruger zone 20
     * Extent: Russia - onshore between 114°E and 120°E
     * Also found with truncated false easting - see Pulkovo 1995 / Gauss-Kruger CM 117E (code 2479).
     */
    public const EPSG_PULKOVO_1995_GAUSS_KRUGER_ZONE_20 = 'urn:ogc:def:crs:EPSG::20020';

    /**
     * Pulkovo 1995 / Gauss-Kruger zone 21
     * Extent: Russia - onshore between 120°E and 126°E
     * Also found with truncated false easting - see Pulkovo 1995 / Gauss-Kruger CM 123E (code 2480).
     */
    public const EPSG_PULKOVO_1995_GAUSS_KRUGER_ZONE_21 = 'urn:ogc:def:crs:EPSG::20021';

    /**
     * Pulkovo 1995 / Gauss-Kruger zone 22
     * Extent: Russia - onshore between 126°E and 132°E
     * Also found with truncated false easting - see Pulkovo 1995 / Gauss-Kruger CM 129E (code 2481).
     */
    public const EPSG_PULKOVO_1995_GAUSS_KRUGER_ZONE_22 = 'urn:ogc:def:crs:EPSG::20022';

    /**
     * Pulkovo 1995 / Gauss-Kruger zone 23
     * Extent: Russia - onshore between 132°E and 138°E
     * Also found with truncated false easting - see Pulkovo 1995 / Gauss-Kruger CM 135E (code 2482).
     */
    public const EPSG_PULKOVO_1995_GAUSS_KRUGER_ZONE_23 = 'urn:ogc:def:crs:EPSG::20023';

    /**
     * Pulkovo 1995 / Gauss-Kruger zone 24
     * Extent: Russia - onshore between 138°E and 144°E
     * Also found with truncated false easting - see Pulkovo 1995 / Gauss-Kruger CM 141E (code 2483).
     */
    public const EPSG_PULKOVO_1995_GAUSS_KRUGER_ZONE_24 = 'urn:ogc:def:crs:EPSG::20024';

    /**
     * Pulkovo 1995 / Gauss-Kruger zone 25
     * Extent: Russia - onshore between 144°E and 150°E
     * Also found with truncated false easting - see Pulkovo 1995 / Gauss-Kruger CM 147E (code 2484).
     */
    public const EPSG_PULKOVO_1995_GAUSS_KRUGER_ZONE_25 = 'urn:ogc:def:crs:EPSG::20025';

    /**
     * Pulkovo 1995 / Gauss-Kruger zone 26
     * Extent: Russia - onshore between 150°E and 156°E
     * Also found with truncated false easting - see Pulkovo 1995 / Gauss-Kruger CM 153E (code 2485).
     */
    public const EPSG_PULKOVO_1995_GAUSS_KRUGER_ZONE_26 = 'urn:ogc:def:crs:EPSG::20026';

    /**
     * Pulkovo 1995 / Gauss-Kruger zone 27
     * Extent: Russia - onshore between 156°E and 162°E
     * Also found with truncated false easting - see Pulkovo 1995 / Gauss-Kruger CM 159E (code 2486).
     */
    public const EPSG_PULKOVO_1995_GAUSS_KRUGER_ZONE_27 = 'urn:ogc:def:crs:EPSG::20027';

    /**
     * Pulkovo 1995 / Gauss-Kruger zone 28
     * Extent: Russia - onshore between 162°E and 168°E
     * Also found with truncated false easting - see Pulkovo 1995 / Gauss-Kruger CM 165E (code 2487).
     */
    public const EPSG_PULKOVO_1995_GAUSS_KRUGER_ZONE_28 = 'urn:ogc:def:crs:EPSG::20028';

    /**
     * Pulkovo 1995 / Gauss-Kruger zone 29
     * Extent: Russia - onshore between 168°E and 174°E
     * Also found with truncated false easting - see Pulkovo 1995 / Gauss-Kruger CM 171E (code 2488).
     */
    public const EPSG_PULKOVO_1995_GAUSS_KRUGER_ZONE_29 = 'urn:ogc:def:crs:EPSG::20029';

    /**
     * Pulkovo 1995 / Gauss-Kruger zone 30
     * Extent: Russia - onshore between 174°E and 180°E
     * Also found with truncated false easting - see Pulkovo 1995 / Gauss-Kruger CM 177E (code 2489).
     */
    public const EPSG_PULKOVO_1995_GAUSS_KRUGER_ZONE_30 = 'urn:ogc:def:crs:EPSG::20030';

    /**
     * Pulkovo 1995 / Gauss-Kruger zone 31
     * Extent: Russia - onshore between 180°E and 174°W
     * Also found with truncated false easting - see Pulkovo 1995 / Gauss-Kruger CM 177W (code 2490).
     */
    public const EPSG_PULKOVO_1995_GAUSS_KRUGER_ZONE_31 = 'urn:ogc:def:crs:EPSG::20031';

    /**
     * Pulkovo 1995 / Gauss-Kruger zone 32
     * Extent: Russia - onshore east of 174°W
     * Also found with truncated false easting - see Pulkovo 1995 / Gauss-Kruger CM 171W (code 2491).
     */
    public const EPSG_PULKOVO_1995_GAUSS_KRUGER_ZONE_32 = 'urn:ogc:def:crs:EPSG::20032';

    /**
     * Pulkovo 1995 / Gauss-Kruger zone 4
     * Extent: Russia - onshore west of 24°E - Kaliningrad
     * Also found with truncated false easting - see Pulkovo 1995 / Gauss-Kruger CM 21E (code 2463).
     */
    public const EPSG_PULKOVO_1995_GAUSS_KRUGER_ZONE_4 = 'urn:ogc:def:crs:EPSG::20004';

    /**
     * Pulkovo 1995 / Gauss-Kruger zone 5
     * Extent: Russia - onshore between 24°E and 30°E
     * Also found with truncated false easting - see Pulkovo 1995 / Gauss-Kruger CM 27E (code 2464).
     */
    public const EPSG_PULKOVO_1995_GAUSS_KRUGER_ZONE_5 = 'urn:ogc:def:crs:EPSG::20005';

    /**
     * Pulkovo 1995 / Gauss-Kruger zone 6
     * Extent: Russia - onshore between 30°E and 36°E
     * Also found with truncated false easting - see Pulkovo 1995 / Gauss-Kruger CM 33E (code 2465).
     */
    public const EPSG_PULKOVO_1995_GAUSS_KRUGER_ZONE_6 = 'urn:ogc:def:crs:EPSG::20006';

    /**
     * Pulkovo 1995 / Gauss-Kruger zone 7
     * Extent: Russia - onshore between 36°E and 42°E
     * Also found with truncated false easting - see Pulkovo 1995 / Gauss-Kruger CM 39E (code 2466).
     */
    public const EPSG_PULKOVO_1995_GAUSS_KRUGER_ZONE_7 = 'urn:ogc:def:crs:EPSG::20007';

    /**
     * Pulkovo 1995 / Gauss-Kruger zone 8
     * Extent: Russia - onshore between 42°E and 48°E
     * Also found with truncated false easting - see Pulkovo 1995 / Gauss-Kruger CM 45E (code 2467).
     */
    public const EPSG_PULKOVO_1995_GAUSS_KRUGER_ZONE_8 = 'urn:ogc:def:crs:EPSG::20008';

    /**
     * Pulkovo 1995 / Gauss-Kruger zone 9
     * Extent: Russia - onshore between 48°E and 54°E
     * Also found with truncated false easting - see Pulkovo 1995 / Gauss-Kruger CM 51E (code 2468).
     */
    public const EPSG_PULKOVO_1995_GAUSS_KRUGER_ZONE_9 = 'urn:ogc:def:crs:EPSG::20009';

    /**
     * QND95 / Qatar National Grid
     * Extent: Qatar - onshore.
     */
    public const EPSG_QND95_QATAR_NATIONAL_GRID = 'urn:ogc:def:crs:EPSG::2932';

    /**
     * Qatar 1948 / Qatar Grid
     * Extent: Qatar - onshore
     * Also known as Qatar Plane Coordinate or QPC system. Replaced by Qatar National Grid (code 28600).
     */
    public const EPSG_QATAR_1948_QATAR_GRID = 'urn:ogc:def:crs:EPSG::2099';

    /**
     * Qatar 1974 / Qatar National Grid
     * Extent: Qatar - onshore.
     */
    public const EPSG_QATAR_1974_QATAR_NATIONAL_GRID = 'urn:ogc:def:crs:EPSG::28600';

    /**
     * Qornoq 1927 / Greenland zone 2 west
     * Extent: Greenland - west coast onshore - between 78°N and 79°N
     * Historically also found with coordinate system axis abbreviations N/E (CS code 4501); second axis has
     * abbreviation E but is positive to the west.
     */
    public const EPSG_QORNOQ_1927_GREENLAND_ZONE_2_WEST = 'urn:ogc:def:crs:EPSG::2299';

    /**
     * Qornoq 1927 / Greenland zone 3 west
     * Extent: Greenland - west coast - between 75°N and 78°N
     * Historically also found with coordinate system axis abbreviations N/E (CS code 4501); second axis has
     * abbreviation E but is positive to the west.
     */
    public const EPSG_QORNOQ_1927_GREENLAND_ZONE_3_WEST = 'urn:ogc:def:crs:EPSG::2301';

    /**
     * Qornoq 1927 / Greenland zone 4 west
     * Extent: Greenland - west coast onshore - between 72°N and 75°N
     * Historically also found with coordinate system axis abbreviations N/E (CS code 4501); second axis has
     * abbreviation E but is positive to the west.
     */
    public const EPSG_QORNOQ_1927_GREENLAND_ZONE_4_WEST = 'urn:ogc:def:crs:EPSG::2303';

    /**
     * Qornoq 1927 / Greenland zone 5 west
     * Extent: Greenland - west coast onshore - between 69°N and 72°N
     * Historically also found with coordinate system axis abbreviations N/E (CS code 4501); second axis has
     * abbreviation E but is positive to the west.
     */
    public const EPSG_QORNOQ_1927_GREENLAND_ZONE_5_WEST = 'urn:ogc:def:crs:EPSG::2304';

    /**
     * Qornoq 1927 / Greenland zone 6 west
     * Extent: Greenland - west coast onshore - between 66°N and 69°N
     * Historically also found with coordinate system axis abbreviations N/E (CS code 4501); second axis has
     * abbreviation E but is positive to the west.
     */
    public const EPSG_QORNOQ_1927_GREENLAND_ZONE_6_WEST = 'urn:ogc:def:crs:EPSG::2305';

    /**
     * Qornoq 1927 / Greenland zone 7 west
     * Extent: Greenland - west coast onshore - between 63°N and 66°N
     * Historically also found with coordinate system axis abbreviations N/E (CS code 4501); second axis has
     * abbreviation E but is positive to the west.
     */
    public const EPSG_QORNOQ_1927_GREENLAND_ZONE_7_WEST = 'urn:ogc:def:crs:EPSG::2306';

    /**
     * Qornoq 1927 / Greenland zone 8 east
     * Extent: Greenland - onshore southwest coastal area south of 63°N
     * Historically also found with coordinate system axis abbreviations N/E (CS code 4501); second axis has
     * abbreviation E but is positive to the west.
     */
    public const EPSG_QORNOQ_1927_GREENLAND_ZONE_8_EAST = 'urn:ogc:def:crs:EPSG::2307';

    /**
     * Qornoq 1927 / UTM zone 22N
     * Extent: Greenland - southwest coast between 54°W and 48°W.
     */
    public const EPSG_QORNOQ_1927_UTM_ZONE_22N = 'urn:ogc:def:crs:EPSG::2216';

    /**
     * Qornoq 1927 / UTM zone 23N
     * Extent: Greenland - southwest coast east of 48°W.
     */
    public const EPSG_QORNOQ_1927_UTM_ZONE_23N = 'urn:ogc:def:crs:EPSG::2217';

    /**
     * RBEPP12 Grid
     * Extent: UK - on or related to the rail route from Reading via Newbury to Penzance
     * Defined through transformation ETRS89 to RBEPP12-IRF (1) (code 10278) and map projection RBEPP12-LCC (code
     * 10279). Emulates the RBEPP12 Snake projection applied to ETRS89 as realized through OSNet 2009.
     */
    public const EPSG_RBEPP12_GRID = 'urn:ogc:def:crs:EPSG::10280';

    /**
     * RD/83 / 3-degree Gauss-Kruger zone 4
     * Extent: Germany - Sachsen - west of 13°30'E
     * Consistent with DHDN (CRS code 4314) at the 1-metre level. For low accuracy applications RD/83 can be considered
     * the same as DHDN. See CRS code 5668 for variant with axes order reversed to easting before northing for use in
     * GIS applications.
     */
    public const EPSG_RD_83_3_DEGREE_GAUSS_KRUGER_ZONE_4 = 'urn:ogc:def:crs:EPSG::3398';

    /**
     * RD/83 / 3-degree Gauss-Kruger zone 4 (E-N)
     * Extent: Germany - Sachsen - west of 13°30'E
     * RD/83 / 3-degree Gauss-Kruger zone 4 (CRS code 3398) but with axis order reversed (and axis abbreviations
     * changed) for GIS applications.
     */
    public const EPSG_RD_83_3_DEGREE_GAUSS_KRUGER_ZONE_4_E_N = 'urn:ogc:def:crs:EPSG::5668';

    /**
     * RD/83 / 3-degree Gauss-Kruger zone 5
     * Extent: Germany - Sachsen - east of 13°30'E
     * Consistent with DHDN (CRS code 4314) at the 1-metre level. For low accuracy applications RD/83 can be considered
     * the same as DHDN. See CRS code 5669 for variant with axes order reversed to easting before northing for use in
     * GIS applications.
     */
    public const EPSG_RD_83_3_DEGREE_GAUSS_KRUGER_ZONE_5 = 'urn:ogc:def:crs:EPSG::3399';

    /**
     * RD/83 / 3-degree Gauss-Kruger zone 5 (E-N)
     * Extent: Germany - Sachsen - east of 13°30'E
     * RD/83 / 3-degree Gauss-Kruger zone 5 (CRS code 3399) but with axis order reversed (and axis abbreviations
     * changed) for GIS applications.
     */
    public const EPSG_RD_83_3_DEGREE_GAUSS_KRUGER_ZONE_5_E_N = 'urn:ogc:def:crs:EPSG::5669';

    /**
     * RDN2008 / Italy zone (E-N)
     * Extent: Italy
     * Used by public and private agencies that need a single projected CRS for all Italian territory. See RDN2008 /
     * Italy zone (N-E) (CRS code 6875) for similar CRS with north-east axis order.
     */
    public const EPSG_RDN2008_ITALY_ZONE_E_N = 'urn:ogc:def:crs:EPSG::7794';

    /**
     * RDN2008 / Italy zone (N-E)
     * Extent: Italy
     * Used by public and private agencies that need a single projected CRS for all Italian territory. See RDN2008 /
     * Italy zone (E-N) (CRS code 7794) for similar CRS with east-north axis order used for GIS purposes.
     */
    public const EPSG_RDN2008_ITALY_ZONE_N_E = 'urn:ogc:def:crs:EPSG::6875';

    /**
     * RDN2008 / UTM zone 32N
     * Extent: Italy - west of 12°E
     * Replaces IGM95 / UTM zone 32N (CRS code 3064) from 2011-11-10. See RDN2008 / UTM zone 32N (N-E) (CRS code 6707)
     * for similar CRS with north-east axis order used for topographic mapping and engineering purposes.
     */
    public const EPSG_RDN2008_UTM_ZONE_32N = 'urn:ogc:def:crs:EPSG::7791';

    /**
     * RDN2008 / UTM zone 32N (N-E)
     * Extent: Italy - west of 12°E
     * Replaces IGM95 / UTM zone 32N (CRS code 3064) from 2011-11-10. See RDN2008 / UTM zone 32N (CRS code 7791) for
     * similar CRS with east-north axis order used for GIS purposes.
     */
    public const EPSG_RDN2008_UTM_ZONE_32N_N_E = 'urn:ogc:def:crs:EPSG::6707';

    /**
     * RDN2008 / UTM zone 33N
     * Extent: Italy - between 12°E and 18°E including San Marino and Vatican City State
     * Replaces IGM95 / UTM zone 33N (CRS code 3065) west of 18°E from 2011-11-10. See RDN2008 / UTM zone 33N (N-E)
     * (CRS code 6708) for similar CRS with north-east axis order used for topographic mapping and engineering
     * purposes.
     */
    public const EPSG_RDN2008_UTM_ZONE_33N = 'urn:ogc:def:crs:EPSG::7792';

    /**
     * RDN2008 / UTM zone 33N (N-E)
     * Extent: Italy - between 12°E and 18°E including San Marino and Vatican City State
     * Replaces IGM95 / UTM zone 33N (CRS code 3065) west of 18°E from 2011-11-10. See RDN2008 / UTM zone 33N (CRS
     * code 7792) for similar CRS with east-north axis order used for GIS purposes.
     */
    public const EPSG_RDN2008_UTM_ZONE_33N_N_E = 'urn:ogc:def:crs:EPSG::6708';

    /**
     * RDN2008 / UTM zone 34N
     * Extent: Italy - east of 18°E
     * Replaces IGM95 / UTM zone 33N (CRS code 3065) east of 18°E from 2011-11-10. See RDN2008 / UTM zone 34N (N-E)
     * (CRS code 6709) for similar CRS with north-east axis order used for topographic mapping and engineering
     * purposes.
     */
    public const EPSG_RDN2008_UTM_ZONE_34N = 'urn:ogc:def:crs:EPSG::7793';

    /**
     * RDN2008 / UTM zone 34N (N-E)
     * Extent: Italy - east of 18°E
     * Replaces IGM95 / UTM zone 33N (CRS code 3065) east of 18°E from 2011-11-10. See RDN2008 / UTM zone 34N (CRS
     * code 7793) for similar CRS with east-north axis order used for GIS purposes.
     */
    public const EPSG_RDN2008_UTM_ZONE_34N_N_E = 'urn:ogc:def:crs:EPSG::6709';

    /**
     * RDN2008 / Zone 12 (E-N)
     * Extent: Italy
     * Used in some Italian Departments whose territory falls in both zones 32 and 33 (i.e. crosses the 12°E
     * meridian). See RDN2008 / Zone 12 (N-E) (CRS code 6876) for similar CRS with north-east axis order used for
     * topographic mapping and engineering purposes.
     */
    public const EPSG_RDN2008_ZONE_12_E_N = 'urn:ogc:def:crs:EPSG::7795';

    /**
     * RDN2008 / Zone 12 (N-E)
     * Extent: Italy
     * Used in some Italian Departments whose territory falls in both UTM zones 32N and 33N (i.e. crosses the meridan
     * of 12°E). See RDN2008 / Zone 12 (E-N) (CRS code 7795) for similar CRS with east-north axis order used for GIS
     * purposes.
     */
    public const EPSG_RDN2008_ZONE_12_N_E = 'urn:ogc:def:crs:EPSG::6876';

    /**
     * REDGEOMIN / UTM zone 12S
     * Extent: Chile - Easter Island onshore.
     */
    public const EPSG_REDGEOMIN_UTM_ZONE_12S = 'urn:ogc:def:crs:EPSG::9697';

    /**
     * REDGEOMIN / UTM zone 18S
     * Extent: Chile - 78°W to 72°W.
     */
    public const EPSG_REDGEOMIN_UTM_ZONE_18S = 'urn:ogc:def:crs:EPSG::9698';

    /**
     * REDGEOMIN / UTM zone 19S
     * Extent: Chile - 72°W to 66°W.
     */
    public const EPSG_REDGEOMIN_UTM_ZONE_19S = 'urn:ogc:def:crs:EPSG::9699';

    /**
     * REGCAN95 / LAEA Europe
     * Extent: Spain - Canary Islands
     * At applicable scales and usages, may be considered consistent with ETRS89-extended / LAEA Europe (CRS code
     * 3035): see CT 9047.
     */
    public const EPSG_REGCAN95_LAEA_EUROPE = 'urn:ogc:def:crs:EPSG::5635';

    /**
     * REGCAN95 / LCC Europe
     * Extent: Spain - Canary Islands
     * At applicable scales (1:500,000 and smaller) may be considered consistent with ETRS89-extended / LCC Europe (CRS
     * code 3034): see CT 9048.
     */
    public const EPSG_REGCAN95_LCC_EUROPE = 'urn:ogc:def:crs:EPSG::5634';

    /**
     * REGCAN95 / UTM zone 27N
     * Extent: Spain - Canary Islands - west of 18°W
     * Replaces PN68 / UTM zone 27N and PN84 / UTM zone 27N.
     */
    public const EPSG_REGCAN95_UTM_ZONE_27N = 'urn:ogc:def:crs:EPSG::4082';

    /**
     * REGCAN95 / UTM zone 28N
     * Extent: Spain - Canary Islands - east of 18°W
     * Replaces PN68 / UTM zone 28N and PN84 / UTM zone 28N.
     */
    public const EPSG_REGCAN95_UTM_ZONE_28N = 'urn:ogc:def:crs:EPSG::4083';

    /**
     * REGVEN / UTM zone 18N
     * Extent: Venezuela - west of 72°W.
     */
    public const EPSG_REGVEN_UTM_ZONE_18N = 'urn:ogc:def:crs:EPSG::2201';

    /**
     * REGVEN / UTM zone 19N
     * Extent: Venezuela - between 72°W and 66°W.
     */
    public const EPSG_REGVEN_UTM_ZONE_19N = 'urn:ogc:def:crs:EPSG::2202';

    /**
     * REGVEN / UTM zone 20N
     * Extent: Venezuela - east of 66°W.
     */
    public const EPSG_REGVEN_UTM_ZONE_20N = 'urn:ogc:def:crs:EPSG::2203';

    /**
     * RGAF09 / UTM zone 20N
     * Extent: French Antilles west of 60°W - Guadeloupe (including Grande Terre, Basse Terre, Marie Galante, Les
     * Saintes, Iles de la Petite Terre, La Desirade); Martinique; St Barthélemy; northern St Martin
     * Replaces RRAF 1991 / UTM zone 20N (CRS code 4559).
     */
    public const EPSG_RGAF09_UTM_ZONE_20N = 'urn:ogc:def:crs:EPSG::5490';

    /**
     * RGF93 v1 / CC42
     * Extent: France onshore - mainland south of 43°N and Corsica.
     */
    public const EPSG_RGF93_V1_CC42 = 'urn:ogc:def:crs:EPSG::3942';

    /**
     * RGF93 v1 / CC43
     * Extent: France - mainland onshore south of 44°N.
     */
    public const EPSG_RGF93_V1_CC43 = 'urn:ogc:def:crs:EPSG::3943';

    /**
     * RGF93 v1 / CC44
     * Extent: France - mainland onshore between 43°N and 45°N.
     */
    public const EPSG_RGF93_V1_CC44 = 'urn:ogc:def:crs:EPSG::3944';

    /**
     * RGF93 v1 / CC45
     * Extent: France - mainland onshore between 44°N and 46°N.
     */
    public const EPSG_RGF93_V1_CC45 = 'urn:ogc:def:crs:EPSG::3945';

    /**
     * RGF93 v1 / CC46
     * Extent: France - mainland onshore between 45°N and 47°N.
     */
    public const EPSG_RGF93_V1_CC46 = 'urn:ogc:def:crs:EPSG::3946';

    /**
     * RGF93 v1 / CC47
     * Extent: France - mainland onshore between 46°N and 48°N.
     */
    public const EPSG_RGF93_V1_CC47 = 'urn:ogc:def:crs:EPSG::3947';

    /**
     * RGF93 v1 / CC48
     * Extent: France - mainland onshore between 47°N and 49°N.
     */
    public const EPSG_RGF93_V1_CC48 = 'urn:ogc:def:crs:EPSG::3948';

    /**
     * RGF93 v1 / CC49
     * Extent: France - mainland onshore between 48°N and 50°N.
     */
    public const EPSG_RGF93_V1_CC49 = 'urn:ogc:def:crs:EPSG::3949';

    /**
     * RGF93 v1 / CC50
     * Extent: France - mainland onshore north of 49°N.
     */
    public const EPSG_RGF93_V1_CC50 = 'urn:ogc:def:crs:EPSG::3950';

    /**
     * RGF93 v1 / Lambert-93
     * Extent: France, mainland and Corsica (France métropolitaine including Corsica).
     */
    public const EPSG_RGF93_V1_LAMBERT_93 = 'urn:ogc:def:crs:EPSG::2154';

    /**
     * RGF93 v2 / CC42
     * Extent: France onshore - mainland south of 43°N and Corsica.
     */
    public const EPSG_RGF93_V2_CC42 = 'urn:ogc:def:crs:EPSG::9822';

    /**
     * RGF93 v2 / CC43
     * Extent: France - mainland onshore south of 44°N.
     */
    public const EPSG_RGF93_V2_CC43 = 'urn:ogc:def:crs:EPSG::9823';

    /**
     * RGF93 v2 / CC44
     * Extent: France - mainland onshore between 43°N and 45°N.
     */
    public const EPSG_RGF93_V2_CC44 = 'urn:ogc:def:crs:EPSG::9824';

    /**
     * RGF93 v2 / CC45
     * Extent: France - mainland onshore between 44°N and 46°N.
     */
    public const EPSG_RGF93_V2_CC45 = 'urn:ogc:def:crs:EPSG::9825';

    /**
     * RGF93 v2 / CC46
     * Extent: France - mainland onshore between 45°N and 47°N.
     */
    public const EPSG_RGF93_V2_CC46 = 'urn:ogc:def:crs:EPSG::9826';

    /**
     * RGF93 v2 / CC47
     * Extent: France - mainland onshore between 46°N and 48°N.
     */
    public const EPSG_RGF93_V2_CC47 = 'urn:ogc:def:crs:EPSG::9827';

    /**
     * RGF93 v2 / CC48
     * Extent: France - mainland onshore between 47°N and 49°N.
     */
    public const EPSG_RGF93_V2_CC48 = 'urn:ogc:def:crs:EPSG::9828';

    /**
     * RGF93 v2 / CC49
     * Extent: France - mainland onshore between 48°N and 50°N.
     */
    public const EPSG_RGF93_V2_CC49 = 'urn:ogc:def:crs:EPSG::9829';

    /**
     * RGF93 v2 / CC50
     * Extent: France - mainland onshore north of 49°N.
     */
    public const EPSG_RGF93_V2_CC50 = 'urn:ogc:def:crs:EPSG::9830';

    /**
     * RGF93 v2 / Lambert-93
     * Extent: France, mainland and Corsica (France métropolitaine including Corsica).
     */
    public const EPSG_RGF93_V2_LAMBERT_93 = 'urn:ogc:def:crs:EPSG::9793';

    /**
     * RGF93 v2b / CC42
     * Extent: France onshore - mainland south of 43°N and Corsica.
     */
    public const EPSG_RGF93_V2B_CC42 = 'urn:ogc:def:crs:EPSG::9842';

    /**
     * RGF93 v2b / CC43
     * Extent: France - mainland onshore south of 44°N.
     */
    public const EPSG_RGF93_V2B_CC43 = 'urn:ogc:def:crs:EPSG::9843';

    /**
     * RGF93 v2b / CC44
     * Extent: France - mainland onshore between 43°N and 45°N.
     */
    public const EPSG_RGF93_V2B_CC44 = 'urn:ogc:def:crs:EPSG::9844';

    /**
     * RGF93 v2b / CC45
     * Extent: France - mainland onshore between 44°N and 46°N.
     */
    public const EPSG_RGF93_V2B_CC45 = 'urn:ogc:def:crs:EPSG::9845';

    /**
     * RGF93 v2b / CC46
     * Extent: France - mainland onshore between 45°N and 47°N.
     */
    public const EPSG_RGF93_V2B_CC46 = 'urn:ogc:def:crs:EPSG::9846';

    /**
     * RGF93 v2b / CC47
     * Extent: France - mainland onshore between 46°N and 48°N.
     */
    public const EPSG_RGF93_V2B_CC47 = 'urn:ogc:def:crs:EPSG::9847';

    /**
     * RGF93 v2b / CC48
     * Extent: France - mainland onshore between 47°N and 49°N.
     */
    public const EPSG_RGF93_V2B_CC48 = 'urn:ogc:def:crs:EPSG::9848';

    /**
     * RGF93 v2b / CC49
     * Extent: France - mainland onshore between 48°N and 50°N.
     */
    public const EPSG_RGF93_V2B_CC49 = 'urn:ogc:def:crs:EPSG::9849';

    /**
     * RGF93 v2b / CC50
     * Extent: France - mainland onshore north of 49°N.
     */
    public const EPSG_RGF93_V2B_CC50 = 'urn:ogc:def:crs:EPSG::9850';

    /**
     * RGF93 v2b / Lambert-93
     * Extent: France, mainland and Corsica (France métropolitaine including Corsica).
     */
    public const EPSG_RGF93_V2B_LAMBERT_93 = 'urn:ogc:def:crs:EPSG::9794';

    /**
     * RGFG95 / UTM zone 21N
     * Extent: French Guiana - west of 54°W
     * Replaces CSG67 / UTM zone 21N (CRS code 3312).
     */
    public const EPSG_RGFG95_UTM_ZONE_21N = 'urn:ogc:def:crs:EPSG::3313';

    /**
     * RGFG95 / UTM zone 22N
     * Extent: French Guiana - east of 54°W
     * Replaces CSG67 / UTM zone 22N (CRS code 2971).
     */
    public const EPSG_RGFG95_UTM_ZONE_22N = 'urn:ogc:def:crs:EPSG::2972';

    /**
     * RGM04 / UTM zone 38S
     * Extent: Mayotte
     * Replaces Combani 1950 / UTM zone 38S (CRS code 2980) except for cadastre which uses Cadastre 1997 / UTM zone 38S
     * (CRS code 5879).
     */
    public const EPSG_RGM04_UTM_ZONE_38S = 'urn:ogc:def:crs:EPSG::4471';

    /**
     * RGNC15 / Lambert New Caledonia 2015
     * Extent: New Caledonia - Belep, Grande Terre, Ile des Pins, Loyalty Islands (Lifou, Mare, Ouvea)
     * Replaces RGNC91-93 / Lambert New Caledonia (CRS code 3163).
     */
    public const EPSG_RGNC15_LAMBERT_NEW_CALEDONIA_2015 = 'urn:ogc:def:crs:EPSG::10314';

    /**
     * RGNC15 / UTM zone 57S
     * Extent: New Caledonia - west of 162°E
     * Used for EEZ and uninhabited islands. For Grande-Terre, Isle de Pins, Belep and Loyalty Islands (Lifou, Mare,
     * Ouvea) use RGNC15 / Lambert New Caledonia 2015 (CRS code 10314) rather than this CRS. Replaces RGNC91-93 / UTM
     * zone 57S (CRS code 3169).
     */
    public const EPSG_RGNC15_UTM_ZONE_57S = 'urn:ogc:def:crs:EPSG::10315';

    /**
     * RGNC15 / UTM zone 58S
     * Extent: New Caledonia - between 162°E and 168°E
     * Used for EEZ and uninhabited islands. For Grande-Terre, Isle de Pins, Belep and Loyalty Islands (Lifou, Mare,
     * Ouvea) use RGNC15 / Lambert New Caledonia 2015 (CRS code 10314) rather than this CRS. Replaces RGNC91-93 / UTM
     * zone 58S (CRS code 3170).
     */
    public const EPSG_RGNC15_UTM_ZONE_58S = 'urn:ogc:def:crs:EPSG::10316';

    /**
     * RGNC15 / UTM zone 59S
     * Extent: New Caledonia - east of 168°E
     * Used for EEZ and uninhabited islands. For Grande-Terre, Isle de Pins, Belep and Loyalty Islands (Lifou, Mare,
     * Ouvea) use RGNC15 / Lambert New Caledonia 2015 (CRS code 10314) rather than this CRS. Replaces RGNC91-93 / UTM
     * zone 59S (CRS code 3171).
     */
    public const EPSG_RGNC15_UTM_ZONE_59S = 'urn:ogc:def:crs:EPSG::10317';

    /**
     * RGNC91-93 / Lambert New Caledonia
     * Extent: New Caledonia - Belep, Grande Terre, Ile des Pins, Loyalty Islands (Lifou, Mare, Ouvea)
     * Replaces use of UTM with older 2D systems IGN72 Grande Terre, IGN56 Lifou, ST87 Ouvea, IGN53 Mare, ST84 Ile des
     * Pins, ST71 Belep and NEA74 Noumea (CRS codes 2981, 2995-98, 3060, 3164). Replaced by RGNC15 / Lambert New
     * Caledonia 2015 (CRS code 10314).
     */
    public const EPSG_RGNC91_93_LAMBERT_NEW_CALEDONIA = 'urn:ogc:def:crs:EPSG::3163';

    /**
     * RGNC91-93 / UTM zone 57S
     * Extent: New Caledonia - west of 162°E
     * Used for EEZ and uninhabited islands. For Grande-Terre, Isle de Pins, Belep and Loyalty Islands (Lifou, Mare,
     * Ouvea) use RGNC91-93 / Lambert New Caledonia (CRS code 3163) rather than this CRS. Replaced by RGNC15 / UTM zone
     * 57S (CRS code 10315).
     */
    public const EPSG_RGNC91_93_UTM_ZONE_57S = 'urn:ogc:def:crs:EPSG::3169';

    /**
     * RGNC91-93 / UTM zone 58S
     * Extent: New Caledonia - between 162°E and 168°E
     * Used for EEZ and uninhabited islands. For Grande-Terre, Isle de Pins, Belep and Loyalty Islands (Lifou, Mare,
     * Ouvea) use RGNC91-93 / Lambert New Caledonia (CRS code 3163) rather than this CRS. Replaced by RGNC15 / UTM zone
     * 58S (CRS code 10316).
     */
    public const EPSG_RGNC91_93_UTM_ZONE_58S = 'urn:ogc:def:crs:EPSG::3170';

    /**
     * RGNC91-93 / UTM zone 59S
     * Extent: New Caledonia - east of 168°E
     * Used for EEZ and uninhabited islands. For Grande-Terre, Isle de Pins, Belep and Loyalty Islands (Lifou, Mare,
     * Ouvea) use RGNC91-93 / Lambert New Caledonia (CRS code 3163) rather than this CRS. Replaced by RGNC15 / UTM zone
     * 59S (CRS code 10317).
     */
    public const EPSG_RGNC91_93_UTM_ZONE_59S = 'urn:ogc:def:crs:EPSG::3171';

    /**
     * RGPF / UTM zone 5S
     * Extent: French Polynesia - west of 150°W
     * Replaces Tahaa 54 / UTM zone 5S (CRS code 2977) and Maupiti 83 / UTM zone 5S (code 3306).
     */
    public const EPSG_RGPF_UTM_ZONE_5S = 'urn:ogc:def:crs:EPSG::3296';

    /**
     * RGPF / UTM zone 6S
     * Extent: French Polynesia - between 150°W and 144°W
     * Replaces Moorea 87 / UTM zone 6S (CRS code 3305) and Tahiti 79 / UTM zone 6S (code 3304).
     */
    public const EPSG_RGPF_UTM_ZONE_6S = 'urn:ogc:def:crs:EPSG::3297';

    /**
     * RGPF / UTM zone 7S
     * Extent: French Polynesia - between 144°W and 138°W
     * Replaces IGN 63 Hiva Oa / UTM zone 7S (CRS code 3302), IGN 72 Nuku Hiva / UTM zone 7S (code 2978) and MHEFO 55 /
     * UTM zone 7S (code 3303).
     */
    public const EPSG_RGPF_UTM_ZONE_7S = 'urn:ogc:def:crs:EPSG::3298';

    /**
     * RGPF / UTM zone 8S
     * Extent: French Polynesia - east of 138°W.
     */
    public const EPSG_RGPF_UTM_ZONE_8S = 'urn:ogc:def:crs:EPSG::3299';

    /**
     * RGR92 / UTM zone 39S
     * Extent: Reunion - offshore - west of 54°E.
     */
    public const EPSG_RGR92_UTM_ZONE_39S = 'urn:ogc:def:crs:EPSG::5644';

    /**
     * RGR92 / UTM zone 40S
     * Extent: Reunion - east of 54°E
     * Replaces Piton des Neiges / TM Reunion (CRS code 2990).
     */
    public const EPSG_RGR92_UTM_ZONE_40S = 'urn:ogc:def:crs:EPSG::2975';

    /**
     * RGRDC 2005 / Congo TM zone 12
     * Extent: The Democratic Republic of the Congo (Zaire) - west of 13°E.
     */
    public const EPSG_RGRDC_2005_CONGO_TM_ZONE_12 = 'urn:ogc:def:crs:EPSG::4048';

    /**
     * RGRDC 2005 / Congo TM zone 14
     * Extent: The Democratic Republic of the Congo (Zaire) - between 13°E to 15°E.
     */
    public const EPSG_RGRDC_2005_CONGO_TM_ZONE_14 = 'urn:ogc:def:crs:EPSG::4049';

    /**
     * RGRDC 2005 / Congo TM zone 16
     * Extent: The Democratic Republic of the Congo (Zaire) - south of a line through Bandundu, Seke and Pweto and
     * between 15°E and 17°E.
     */
    public const EPSG_RGRDC_2005_CONGO_TM_ZONE_16 = 'urn:ogc:def:crs:EPSG::4050';

    /**
     * RGRDC 2005 / Congo TM zone 18
     * Extent: The Democratic Republic of the Congo (Zaire) - south of a line through Bandundu, Seke and Pweto and
     * between 17°E and 19°E.
     */
    public const EPSG_RGRDC_2005_CONGO_TM_ZONE_18 = 'urn:ogc:def:crs:EPSG::4051';

    /**
     * RGRDC 2005 / Congo TM zone 20
     * Extent: The Democratic Republic of the Congo (Zaire) - south of a line through Bandundu, Seke and Pweto and
     * between 19°E and 21°E.
     */
    public const EPSG_RGRDC_2005_CONGO_TM_ZONE_20 = 'urn:ogc:def:crs:EPSG::4056';

    /**
     * RGRDC 2005 / Congo TM zone 22
     * Extent: The Democratic Republic of the Congo (Zaire) - south of a line through Bandundu, Seke and Pweto and
     * between 21°E and 23°E.
     */
    public const EPSG_RGRDC_2005_CONGO_TM_ZONE_22 = 'urn:ogc:def:crs:EPSG::4057';

    /**
     * RGRDC 2005 / Congo TM zone 24
     * Extent: The Democratic Republic of the Congo (Zaire) - south of a line through Bandundu, Seke and Pweto and
     * between 23°E and 25°E.
     */
    public const EPSG_RGRDC_2005_CONGO_TM_ZONE_24 = 'urn:ogc:def:crs:EPSG::4058';

    /**
     * RGRDC 2005 / Congo TM zone 26
     * Extent: The Democratic Republic of the Congo (Zaire) - south of a line through Bandundu, Seke and Pweto and
     * between 25°E and 27°E.
     */
    public const EPSG_RGRDC_2005_CONGO_TM_ZONE_26 = 'urn:ogc:def:crs:EPSG::4059';

    /**
     * RGRDC 2005 / Congo TM zone 28
     * Extent: The Democratic Republic of the Congo (Zaire) - south of a line through Bandundu, Seke and Pweto and
     * between 27°E and 29°E.
     */
    public const EPSG_RGRDC_2005_CONGO_TM_ZONE_28 = 'urn:ogc:def:crs:EPSG::4060';

    /**
     * RGRDC 2005 / Congo TM zone 30
     * Extent: The Democratic Republic of the Congo (Zaire) - south of a line through Bandundu, Seke and Pweto and east
     * of 29°E.
     */
    public const EPSG_RGRDC_2005_CONGO_TM_ZONE_30 = 'urn:ogc:def:crs:EPSG::5844';

    /**
     * RGRDC 2005 / UTM zone 33S
     * Extent: The Democratic Republic of the Congo (Zaire) south of a line through Bandundu, Seke and Pweto and
     * between 12°E and 18°E.
     */
    public const EPSG_RGRDC_2005_UTM_ZONE_33S = 'urn:ogc:def:crs:EPSG::4061';

    /**
     * RGRDC 2005 / UTM zone 34S
     * Extent: The Democratic Republic of the Congo (Zaire) - south of a line through Bandundu, Seke and Pweto and
     * between 18°E and 24°E.
     */
    public const EPSG_RGRDC_2005_UTM_ZONE_34S = 'urn:ogc:def:crs:EPSG::4062';

    /**
     * RGRDC 2005 / UTM zone 35S
     * Extent: The Democratic Republic of the Congo (Zaire) - south of a line through Bandundu, Seke and Pweto and east
     * of 24°E.
     */
    public const EPSG_RGRDC_2005_UTM_ZONE_35S = 'urn:ogc:def:crs:EPSG::4063';

    /**
     * RGSH2020 / UTM zone 29N
     * Extent: Algeria - west of 6°W (of Greenwich).
     */
    public const EPSG_RGSH2020_UTM_ZONE_29N = 'urn:ogc:def:crs:EPSG::22229';

    /**
     * RGSH2020 / UTM zone 30N
     * Extent: Algeria - between 6°W and 0°W (of Greenwich).
     */
    public const EPSG_RGSH2020_UTM_ZONE_30N = 'urn:ogc:def:crs:EPSG::22230';

    /**
     * RGSH2020 / UTM zone 31N
     * Extent: Algeria - between 0°E and 6°E (of Greenwich).
     */
    public const EPSG_RGSH2020_UTM_ZONE_31N = 'urn:ogc:def:crs:EPSG::22231';

    /**
     * RGSH2020 / UTM zone 32N
     * Extent: Algeria - east of 6°E (of Greenwich).
     */
    public const EPSG_RGSH2020_UTM_ZONE_32N = 'urn:ogc:def:crs:EPSG::22232';

    /**
     * RGSPM06 / UTM zone 21N
     * Extent: St Pierre and Miquelon
     * Replaces Saint Pierre et Miquelon 1950 / UTM zone 21N (CRS code 2987).
     */
    public const EPSG_RGSPM06_UTM_ZONE_21N = 'urn:ogc:def:crs:EPSG::4467';

    /**
     * RGTAAF07 / UTM zone 37S
     * Extent: French Southern Territories - Europa
     * Replaces MHM 1954 / UTM zone 37S.
     */
    public const EPSG_RGTAAF07_UTM_ZONE_37S = 'urn:ogc:def:crs:EPSG::7074';

    /**
     * RGTAAF07 / UTM zone 38S
     * Extent: French Southern Territories - Crozet offshore west of 48°E.
     */
    public const EPSG_RGTAAF07_UTM_ZONE_38S = 'urn:ogc:def:crs:EPSG::7075';

    /**
     * RGTAAF07 / UTM zone 39S
     * Extent: French Southern Territories - Crozet between 48°E to 54°E
     * Replaces IGN 1963-64 / UTM zone 39S.
     */
    public const EPSG_RGTAAF07_UTM_ZONE_39S = 'urn:ogc:def:crs:EPSG::7076';

    /**
     * RGTAAF07 / UTM zone 40S
     * Extent: French Southern Territories - Crozet offshore east of 54°E.
     */
    public const EPSG_RGTAAF07_UTM_ZONE_40S = 'urn:ogc:def:crs:EPSG::7077';

    /**
     * RGTAAF07 / UTM zone 41S
     * Extent: French Southern Territories - Kerguelen offshore west of 66°E.
     */
    public const EPSG_RGTAAF07_UTM_ZONE_41S = 'urn:ogc:def:crs:EPSG::7078';

    /**
     * RGTAAF07 / UTM zone 42S
     * Extent: French Southern Territories - Kerguelen between 66°E and 72°E
     * Replaces IGN 1962 Kerguelen / UTM zone 42S (CRS code 3336).
     */
    public const EPSG_RGTAAF07_UTM_ZONE_42S = 'urn:ogc:def:crs:EPSG::7079';

    /**
     * RGTAAF07 / UTM zone 43S
     * Extent: French Southern Territories - Kerguelen offshore east of 72°E and Amsterdam & St Paul west of 78°E
     * On Amsterdam island replaces IGN 1963-64 / UTM zone 43S. On St Paul island replaces St Paul 1969 / UTM zone 43S.
     */
    public const EPSG_RGTAAF07_UTM_ZONE_43S = 'urn:ogc:def:crs:EPSG::7080';

    /**
     * RGTAAF07 / UTM zone 44S
     * Extent: French Southern Territories - Amsterdam & St Paul offshore east of 78°E.
     */
    public const EPSG_RGTAAF07_UTM_ZONE_44S = 'urn:ogc:def:crs:EPSG::7081';

    /**
     * RGTAAF07 / UTM zone 53S
     * Extent: Antarctica - Adelie Land - coastal area between 136°E and 138°E.
     */
    public const EPSG_RGTAAF07_UTM_ZONE_53S = 'urn:ogc:def:crs:EPSG::8455';

    /**
     * RGTAAF07 / UTM zone 54S
     * Extent: Antarctica - Adelie Land - coastal area between 138°E and 142°E.
     */
    public const EPSG_RGTAAF07_UTM_ZONE_54S = 'urn:ogc:def:crs:EPSG::8456';

    /**
     * RGWF96 / UTM zone 1S
     * Extent: Wallis and Futuna - Uvea, Futuna, and Alofi
     * On Wallis island, replaces MOP78 / UTM zone 1S (CRS code 2988).
     */
    public const EPSG_RGWF96_UTM_ZONE_1S = 'urn:ogc:def:crs:EPSG::8903';

    /**
     * RRAF 1991 / UTM zone 20N
     * Extent: French Antilles west of 60°W - Guadeloupe (including Grande Terre, Basse Terre, Marie Galante, Les
     * Saintes, Iles de la Petite Terre, La Desirade); Martinique; St Barthélemy; northern St Martin
     * Replaces Sainte Anne / UTM zone 20N and Fort Marigot / UTM zone 20N (CRS codes 2969-70) in Guadeloupe and Fort
     * Desaix / UTM zone 20N (CRS code 2973) in Martinique. Replaced by RGAF09 / UTM zone 20N (CRS code 5490).
     */
    public const EPSG_RRAF_1991_UTM_ZONE_20N = 'urn:ogc:def:crs:EPSG::4559';

    /**
     * RSAO13 / TM 12 SE
     * Extent: Angola - Angola proper - offshore
     * Used for exploration and production geoscience activity. Note: WGS 84 / TM 12 SE (CRS code 5842) used for Angola
     * LNG project. CRS 5842 may be considered to be consistent with this CRS to an accuracy of better than 1m.
     */
    public const EPSG_RSAO13_TM_12_SE = 'urn:ogc:def:crs:EPSG::9159';

    /**
     * RSAO13 / UTM zone 32S
     * Extent: Angola - west of 12°E.
     */
    public const EPSG_RSAO13_UTM_ZONE_32S = 'urn:ogc:def:crs:EPSG::9156';

    /**
     * RSAO13 / UTM zone 33S
     * Extent: Angola - between 12°E and 18°E.
     */
    public const EPSG_RSAO13_UTM_ZONE_33S = 'urn:ogc:def:crs:EPSG::9157';

    /**
     * RSAO13 / UTM zone 34S
     * Extent: Angola - east of 18°E.
     */
    public const EPSG_RSAO13_UTM_ZONE_34S = 'urn:ogc:def:crs:EPSG::9158';

    /**
     * RSRGD2000 / BCLC2000
     * Extent: Antarctica - Borchgrevink Coast region.
     */
    public const EPSG_RSRGD2000_BCLC2000 = 'urn:ogc:def:crs:EPSG::5480';

    /**
     * RSRGD2000 / DGLC2000
     * Extent: Antarctica - Darwin Glacier region
     * Replaced by RSRGD2000 / MSLC2000 and RSRGD2000 / RSPS2000 and (CRS codes 5479 and 5482) from March 2011. LINZ
     * S20007 withdrawn at this date.
     */
    public const EPSG_RSRGD2000_DGLC2000 = 'urn:ogc:def:crs:EPSG::3852';

    /**
     * RSRGD2000 / MSLC2000
     * Extent: Antarctica - McMurdo Sound region
     * Replaces RSRGD2000 / DGLC2000 (CRS code 3852) from March 2011.
     */
    public const EPSG_RSRGD2000_MSLC2000 = 'urn:ogc:def:crs:EPSG::5479';

    /**
     * RSRGD2000 / PCLC2000
     * Extent: Antarctica - Pennell Coast region.
     */
    public const EPSG_RSRGD2000_PCLC2000 = 'urn:ogc:def:crs:EPSG::5481';

    /**
     * RSRGD2000 / RSPS2000
     * Extent: Antarctica - Ross Ice Shelf Region.
     */
    public const EPSG_RSRGD2000_RSPS2000 = 'urn:ogc:def:crs:EPSG::5482';

    /**
     * RT38 0 gon
     * Extent: Sweden - communes between approximately 16°55'E and 19°10'E; Gotland. See information source for map
     * Replaced by RT90 0 gon (CRS code 3022).
     */
    public const EPSG_RT38_0_GON = 'urn:ogc:def:crs:EPSG::3028';

    /**
     * RT38 2.5 gon O
     * Extent: Sweden - communes between approximately 19°10'E and 21°25'E. See information source for map
     * Replaced by RT90 2.5 gon O (CRS code 3023).
     */
    public const EPSG_RT38_2_5_GON_O = 'urn:ogc:def:crs:EPSG::3029';

    /**
     * RT38 2.5 gon V
     * Extent: Sweden - communes between approximately 14°40'E and 16°55'E. See information source for map, Sweden -
     * onshore
     * Replaced by RT90 2.5 gon V (CRS code 3021).
     */
    public const EPSG_RT38_2_5_GON_V = 'urn:ogc:def:crs:EPSG::3027';

    /**
     * RT38 5 gon O
     * Extent: Sweden - east of approximately 21°26'E. See information source for map
     * Replaced by RT90 5 gon O (CRS code 3024).
     */
    public const EPSG_RT38_5_GON_O = 'urn:ogc:def:crs:EPSG::3030';

    /**
     * RT38 5 gon V
     * Extent: Sweden - communes between approximately 12°26'E and 14°40'E. See information source for map
     * Replaced by RT90 5 gon V (CRS code 3020).
     */
    public const EPSG_RT38_5_GON_V = 'urn:ogc:def:crs:EPSG::3026';

    /**
     * RT38 7.5 gon V
     * Extent: Sweden - communes west of approximately 12°26'E. See information source for map
     * Replaced by RT90 7.5 gon V (CRS code 3019).
     */
    public const EPSG_RT38_7_5_GON_V = 'urn:ogc:def:crs:EPSG::3025';

    /**
     * RT90 0 gon
     * Extent: Sweden - communes between approximately 16°55'E and 19°10'E; Gotland. See information source for map
     * Replaces RT38 0 gon (CRS code 3028) from 1990. From 2003 replaced by SWEREF systems (CRS codes 3007-3018).
     */
    public const EPSG_RT90_0_GON = 'urn:ogc:def:crs:EPSG::3022';

    /**
     * RT90 2.5 gon O
     * Extent: Sweden - communes between approximately 19°10'E and 21°25'E. See information source for map
     * Replaces RT38 2.5 gon O (CRS code 3029) from 1990. From 2003 replaced by SWEREF systems (CRS codes 3007-3018).
     */
    public const EPSG_RT90_2_5_GON_O = 'urn:ogc:def:crs:EPSG::3023';

    /**
     * RT90 2.5 gon V
     * Extent: Sweden - communes between approximately 14°40'E and 16°55'E. See information source for map, Sweden -
     * onshore
     * Replaces RT38 2.5 gon V (CRS code 3027) from 1990. From 2003 replaced by SWEREF systems (CRS codes 3006-3018).
     */
    public const EPSG_RT90_2_5_GON_V = 'urn:ogc:def:crs:EPSG::3021';

    /**
     * RT90 5 gon O
     * Extent: Sweden - east of approximately 21°26'E. See information source for map
     * Replaces RT38 5 gon O (CRS code 3030) from 1990. From 2003 replaced by SWEREF systems (CRS codes 3007-3018).
     */
    public const EPSG_RT90_5_GON_O = 'urn:ogc:def:crs:EPSG::3024';

    /**
     * RT90 5 gon V
     * Extent: Sweden - communes between approximately 12°26'E and 14°40'E. See information source for map
     * Replaces RT38 5 gon V (CRS code 3026) from 1990. From 2003 replaced by SWEREF systems (CRS codes 3007-3018).
     */
    public const EPSG_RT90_5_GON_V = 'urn:ogc:def:crs:EPSG::3020';

    /**
     * RT90 7.5 gon V
     * Extent: Sweden - communes west of approximately 12°26'E. See information source for map
     * Replaces RT38 7.5 gon V (CRS code 3025) from 1990. From 2003 replaced by SWEREF systems (CRS codes 3007-3018).
     */
    public const EPSG_RT90_7_5_GON_V = 'urn:ogc:def:crs:EPSG::3019';

    /**
     * Rassadiran / Nakhl e Taqi
     * Extent: Iran - Taheri refinery site
     * Engineering survey for terminal site only.
     */
    public const EPSG_RASSADIRAN_NAKHL_E_TAQI = 'urn:ogc:def:crs:EPSG::2057';

    /**
     * Reunion 1947 / TM Reunion
     * Extent: Reunion - onshore
     * Replaces Reunion 1947 / Gauss Laborde Reunion (alias Piton des Neiges / Gauss Laborde Reunion). Replaced by
     * RGR92 / UTM zone 40S (CRS code 2975).
     */
    public const EPSG_REUNION_1947_TM_REUNION = 'urn:ogc:def:crs:EPSG::3727';

    /**
     * Reykjavik 1900 / Lambert 1900
     * Extent: Iceland - mainland
     * Replaced by Hjorsey 1955 / Lambert 1955 (CRS code 3053). See ellipsoid remarks.
     */
    public const EPSG_REYKJAVIK_1900_LAMBERT_1900 = 'urn:ogc:def:crs:EPSG::3052';

    /**
     * S-JTSK (Ferro) / Krovak
     * Extent: Czechia; Slovakia
     * Original definition. In Slovakia, deprecated and replaced by Greenwich-meridian equivalent CRS code 5513. In
     * Czechia remains legal system, but see S-JTSK/05 (Ferro) / Modified Krovak (CRS code 5224) for a scientific
     * working system.
     */
    public const EPSG_S_JTSK_FERRO_KROVAK = 'urn:ogc:def:crs:EPSG::2065';

    /**
     * S-JTSK (Ferro) / Krovak East North
     * Extent: Czechia; Slovakia
     * North-orientated alternative for GIS purposes to the south-orientated S-JTSK / Krovak (Ferro) legal system (CRS
     * code 2065) . Coordinates are negative. In SK deprecated and replaced by equivalent CRS referenced to the
     * Greenwich meridian, CRS code 5514.
     */
    public const EPSG_S_JTSK_FERRO_KROVAK_EAST_NORTH = 'urn:ogc:def:crs:EPSG::5221';

    /**
     * S-JTSK / Krovak
     * Extent: Czechia; Slovakia
     * Equivalent to CRS code 2065 but referenced to Greenwich meridian. In Slovakia remains the legal system for
     * cadastre but for non-cadastral purposes replaced by CRS 8352. In Czechia remains the legal system but see CRS
     * 5515 for a scientific working system.
     */
    public const EPSG_S_JTSK_KROVAK = 'urn:ogc:def:crs:EPSG::5513';

    /**
     * S-JTSK / Krovak East North
     * Extent: Czechia; Slovakia
     * North-orientated alternative for GIS purposes to south-orientated S-JTSK / Krovak (CRS code 5513) which remains
     * the legal system. Coordinates are negative.
     */
    public const EPSG_S_JTSK_KROVAK_EAST_NORTH = 'urn:ogc:def:crs:EPSG::5514';

    /**
     * S-JTSK [JTSK03] / Krovak
     * Extent: Slovakia
     * Improvement upon the scale and homogineity of S-JTSK / Krovak (CRS code 5513) in Slovakia. See CRS code 8353 for
     * north-orientated alternative used for GIS purposes. For cadastre in Slovakia, use CRS code 5513.
     */
    public const EPSG_S_JTSK_JTSK03_KROVAK = 'urn:ogc:def:crs:EPSG::8352';

    /**
     * S-JTSK [JTSK03] / Krovak East North
     * Extent: Slovakia
     * North-orientated alternative to S-JTSK [JTSK03] / Krovak (CRS code 8352) for GIS purposes. Coordinates are
     * negative.
     */
    public const EPSG_S_JTSK_JTSK03_KROVAK_EAST_NORTH = 'urn:ogc:def:crs:EPSG::8353';

    /**
     * S-JTSK/05 (Ferro) / Modified Krovak
     * Extent: Czechia
     * Improves the scale and homogineity of CRS code 2065 in Czechia as a scientific working system, but 2065 remains
     * the legal system. See CRS code 5515 for Greenwich-referenced equivalent; 5225 for north-orientated alternative
     * used for GIS purposes.
     */
    public const EPSG_S_JTSK_05_FERRO_MODIFIED_KROVAK = 'urn:ogc:def:crs:EPSG::5224';

    /**
     * S-JTSK/05 (Ferro) / Modified Krovak East North
     * Extent: Czechia
     * North-orientated alternative to south-orientated S-JTSK/05 (Ferro) / Modified Krovak (CRS code 5224) for GIS
     * purposes. Coordinates are negative. See CRS code 5516 for Greenwich-referenced equivalent,.
     */
    public const EPSG_S_JTSK_05_FERRO_MODIFIED_KROVAK_EAST_NORTH = 'urn:ogc:def:crs:EPSG::5225';

    /**
     * S-JTSK/05 / Modified Krovak
     * Extent: Czechia
     * Greenwich-referenced alternative to S-JTSK/05 (Ferro) / Modified Krovak, CRS code 5224. S-JTSK / Krovak, CRS
     * code 5513, remains the legal system.
     */
    public const EPSG_S_JTSK_05_MODIFIED_KROVAK = 'urn:ogc:def:crs:EPSG::5515';

    /**
     * S-JTSK/05 / Modified Krovak East North
     * Extent: Czechia
     * North-orientated alternative to S-JTSK/05 / Modified Krovak (CRS code 5515) for GIS purposes. Coordinates are
     * negative. See CRS code 5225 for Ferro-referenced equivalent. S-JTSK / Krovak (CRS code 5513) remains the legal
     * system.
     */
    public const EPSG_S_JTSK_05_MODIFIED_KROVAK_EAST_NORTH = 'urn:ogc:def:crs:EPSG::5516';

    /**
     * S34J reconstruction east-orientated
     * Extent: Denmark - Jutland and Funen - onshore
     * Reconstruction emulating the historic S34J CRS but with axis direction flip: W (S34J) = E (S34J e-o) * -1, N
     * (S34J) = N (S34J e-o). Defined through CT ETRS89 to S34J-IRF (1) (code 10161) in conjunction with map projection
     * S34-reconstruction (code 10159).
     */
    public const EPSG_S34J_RECONSTRUCTION_EAST_ORIENTATED = 'urn:ogc:def:crs:EPSG::10160';

    /**
     * S34S reconstruction east-orientated
     * Extent: Denmark - Zealand and Lolland (onshore)
     * Reconstruction emulating the historic S34S CRS but with axis direction flip: W (S34S) = E (S34S e-o) * -1, N
     * (S34S) = N (S34S e-o). Defined through CT ETRS89 to S34S-IRF (1) (code 10251) in conjunction with map projection
     * S34-reconstruction (code 10159).
     */
    public const EPSG_S34S_RECONSTRUCTION_EAST_ORIENTATED = 'urn:ogc:def:crs:EPSG::10250';

    /**
     * S45B reconstruction east-orientated
     * Extent: Denmark - Bornholm onshore
     * Reconstruction emulating the historic S45 CRS but with axis direction flip: W (S45B) = E (S45B e-o) * -1, N
     * (S45B) = N (S45B e-o). Defined through CT ETRS89 to S45B-IRF (1) (code 10255) in conjunction with map projection
     * S45B-reconstruction (code 10253).
     */
    public const EPSG_S45B_RECONSTRUCTION_EAST_ORIENTATED = 'urn:ogc:def:crs:EPSG::10254';

    /**
     * SAD69 / Brazil Polyconic
     * Extent: Brazil. Includes Rocas, Fernando de Noronha archipelago, Trindade, Ihlas Martim Vaz and Sao Pedro e Sao
     * Paulo
     * Uses GRS 1967 ellipsoid with 1/f to exactly 2 decimal places. Replaced by SAD69(96) / Brazil Polyconic (CRS code
     * 5530).
     */
    public const EPSG_SAD69_BRAZIL_POLYCONIC = 'urn:ogc:def:crs:EPSG::29101';

    /**
     * SAD69 / UTM zone 17N
     * Extent: South America between 84°W and 78°W, northern hemisphere, onshore
     * Uses GRS 1967 ellipsoid with 1/f to exactly 2 decimal places.
     */
    public const EPSG_SAD69_UTM_ZONE_17N = 'urn:ogc:def:crs:EPSG::5463';

    /**
     * SAD69 / UTM zone 17S
     * Extent: South America between 84°W and 78°W, southern hemisphere, onshore
     * Uses GRS 1967 ellipsoid with 1/f to exactly 2 decimal places.
     */
    public const EPSG_SAD69_UTM_ZONE_17S = 'urn:ogc:def:crs:EPSG::29187';

    /**
     * SAD69 / UTM zone 18N
     * Extent: South America between 78°W and 72°W, northern hemisphere, onshore
     * Uses GRS 1967 ellipsoid with 1/f to exactly 2 decimal places.
     */
    public const EPSG_SAD69_UTM_ZONE_18N = 'urn:ogc:def:crs:EPSG::29168';

    /**
     * SAD69 / UTM zone 18S
     * Extent: Brazil - west of 72°W. In rest of South America between 78°W and 72°W, southern hemisphere onshore
     * north of 45°S
     * Uses GRS 1967 ellipsoid with 1/f to exactly 2 decimal places.
     */
    public const EPSG_SAD69_UTM_ZONE_18S = 'urn:ogc:def:crs:EPSG::29188';

    /**
     * SAD69 / UTM zone 19N
     * Extent: South America between 72°W and 66°W, northern hemisphere, onshore, but excluding the area between
     * approximately 0°N, 70°W to 2°N, 70°W to 2°N, 66°W
     * Uses GRS 1967 ellipsoid with 1/f to exactly 2 decimal places.
     */
    public const EPSG_SAD69_UTM_ZONE_19N = 'urn:ogc:def:crs:EPSG::29169';

    /**
     * SAD69 / UTM zone 19S
     * Extent: Brazil - between 72°W and 66°W, northern and southern hemispheres. In rest of South America between
     * 72°W and 66°W, southern hemisphere onshore north of 45°S
     * Uses GRS 1967 ellipsoid with 1/f to exactly 2 decimal places.
     */
    public const EPSG_SAD69_UTM_ZONE_19S = 'urn:ogc:def:crs:EPSG::29189';

    /**
     * SAD69 / UTM zone 20N
     * Extent: South America between 66°W and 60°W, northern hemisphere, onshore, but excluding most of the area
     * south of 4°N
     * Uses GRS 1967 ellipsoid with 1/f to exactly 2 decimal places.
     */
    public const EPSG_SAD69_UTM_ZONE_20N = 'urn:ogc:def:crs:EPSG::29170';

    /**
     * SAD69 / UTM zone 20S
     * Extent: Brazil - between 66°W and 60°W, northern and southern hemispheres. In rest of South America between
     * 66°W and 60°W, southern hemisphere onshore
     * Uses GRS 1967 ellipsoid with 1/f to exactly 2 decimal places.
     */
    public const EPSG_SAD69_UTM_ZONE_20S = 'urn:ogc:def:crs:EPSG::29190';

    /**
     * SAD69 / UTM zone 21N
     * Extent: South America between 60°W and 54°W, northern hemisphere onshore, but excluding most of the area south
     * of approximately 2°N
     * Uses GRS 1967 ellipsoid with 1/f to exactly 2 decimal places.
     */
    public const EPSG_SAD69_UTM_ZONE_21N = 'urn:ogc:def:crs:EPSG::29171';

    /**
     * SAD69 / UTM zone 21S
     * Extent: Brazil - between 60°W and 54°W, northern and southern hemispheres. In rest of South America between
     * 60°W and 54°W southern hemisphere, onshore
     * Uses GRS 1967 ellipsoid with 1/f to exactly 2 decimal places. In Brazil, replaced by SAD69(96) / UTM zone 21S
     * (CRS code 5531).
     */
    public const EPSG_SAD69_UTM_ZONE_21S = 'urn:ogc:def:crs:EPSG::29191';

    /**
     * SAD69 / UTM zone 22N
     * Extent: Brazil - offshore deep water - Amazon cone. In remainder of South America, between 54°W and 48°W,
     * northern hemisphere onshore but excluding most of the area southeast of a line between approximately 2°N, 54°W
     * and 4°N, 52°W
     * Uses GRS 1967 ellipsoid with 1/f to exactly 2 decimal places.
     */
    public const EPSG_SAD69_UTM_ZONE_22N = 'urn:ogc:def:crs:EPSG::29172';

    /**
     * SAD69 / UTM zone 22S
     * Extent: Brazil northern and southern hemispheres between 54°W and 48°W. In remainder of South America -
     * between 54°W and 48°W, southern hemisphere, onshore
     * Uses GRS 1967 ellipsoid with 1/f to exactly 2 decimal places. In Brazil, replaced by SAD69(96) / UTM zone 22S
     * (CRS code 5532).
     */
    public const EPSG_SAD69_UTM_ZONE_22S = 'urn:ogc:def:crs:EPSG::29192';

    /**
     * SAD69 / UTM zone 23S
     * Extent: Brazil - between 48°W and 42°W, northern and southern hemispheres
     * Uses GRS 1967 ellipsoid with 1/f to exactly 2 decimal places. Replaced by SAD69(96) / UTM zone 23S (CRS code
     * 5533).
     */
    public const EPSG_SAD69_UTM_ZONE_23S = 'urn:ogc:def:crs:EPSG::29193';

    /**
     * SAD69 / UTM zone 24S
     * Extent: Brazil - between 42°W and 36°W, northern and southern hemispheres
     * Uses GRS 1967 ellipsoid with 1/f to exactly 2 decimal places. Replaced by SAD69(96) / UTM zone 24S (CRS code
     * 5534).
     */
    public const EPSG_SAD69_UTM_ZONE_24S = 'urn:ogc:def:crs:EPSG::29194';

    /**
     * SAD69 / UTM zone 25S
     * Extent: Brazil - between 36°W and 30°W, northern and southern hemispheres
     * Uses GRS 1967 ellipsoid with 1/f to exactly 2 decimal places. Replaced by SAD69(96) / UTM zone 25S (CRS code
     * 5535).
     */
    public const EPSG_SAD69_UTM_ZONE_25S = 'urn:ogc:def:crs:EPSG::29195';

    /**
     * SAD69(96) / Brazil Polyconic
     * Extent: Brazil. Includes Rocas, Fernando de Noronha archipelago, Trindade, Ihlas Martim Vaz and Sao Pedro e Sao
     * Paulo
     * Uses GRS 1967 ellipsoid with 1/f to exactly 2 decimal places. Replaces SAD69 / Brazil Polyconic (CRS code
     * 29101).
     */
    public const EPSG_SAD69_96_BRAZIL_POLYCONIC = 'urn:ogc:def:crs:EPSG::5530';

    /**
     * SAD69(96) / UTM zone 18S
     * Extent: Brazil - west of 72°W
     * Uses GRS 1967 ellipsoid with 1/f to exactly 2 decimal places. In Brazil replaces SAD69 / UTM zone 18S (CRS code
     * 29188); replaced by SIRGAS 2000 / UTM zone 18S (CRS code 31978).
     */
    public const EPSG_SAD69_96_UTM_ZONE_18S = 'urn:ogc:def:crs:EPSG::5875';

    /**
     * SAD69(96) / UTM zone 19S
     * Extent: Brazil - between 72°W and 66°W, northern and southern hemispheres
     * Uses GRS 1967 ellipsoid with 1/f to exactly 2 decimal places. In Brazil replaces SAD69 / UTM zone 19S (CRS code
     * 29189); replaced by SIRGAS 2000 / UTM zone 19S (CRS code 31979).
     */
    public const EPSG_SAD69_96_UTM_ZONE_19S = 'urn:ogc:def:crs:EPSG::5876';

    /**
     * SAD69(96) / UTM zone 20S
     * Extent: Brazil - between 66°W and 60°W, northern and southern hemispheres
     * Uses GRS 1967 ellipsoid with 1/f to exactly 2 decimal places. In Brazil replaces SAD69 / UTM zone 20S (CRS code
     * 29190); replaced by SIRGAS 2000 / UTM zone 20S (CRS code 31980).
     */
    public const EPSG_SAD69_96_UTM_ZONE_20S = 'urn:ogc:def:crs:EPSG::5877';

    /**
     * SAD69(96) / UTM zone 21S
     * Extent: Brazil - between 60°W and 54°W, northern and southern hemispheres
     * Uses GRS 1967 ellipsoid with 1/f to exactly 2 decimal places. Replaces SAD69 / UTM zone 21S (CRS code 29191) in
     * Brazil. Replaced by SIRGAS 2000 / UTM zone 21S (CRS code 31981).
     */
    public const EPSG_SAD69_96_UTM_ZONE_21S = 'urn:ogc:def:crs:EPSG::5531';

    /**
     * SAD69(96) / UTM zone 22S
     * Extent: Brazil northern and southern hemispheres between 54°W and 48°W
     * Uses GRS 1967 ellipsoid with 1/f to exactly 2 decimal places. Replaces SAD69 / UTM zone 22S (CRS code 29192) in
     * Brazil. Replaced by SIRGAS 2000 / UTM zone 22S (CRS code 31982).
     */
    public const EPSG_SAD69_96_UTM_ZONE_22S = 'urn:ogc:def:crs:EPSG::5858';

    /**
     * SAD69(96) / UTM zone 23S
     * Extent: Brazil - between 48°W and 42°W, northern and southern hemispheres
     * Uses GRS 1967 ellipsoid with 1/f to exactly 2 decimal places. Replaces SAD69 / UTM zone 23S (CRS code 29193).
     * Replaced by SIRGAS 2000 / UTM zone 23S (CRS code 31983).
     */
    public const EPSG_SAD69_96_UTM_ZONE_23S = 'urn:ogc:def:crs:EPSG::5533';

    /**
     * SAD69(96) / UTM zone 24S
     * Extent: Brazil - between 42°W and 36°W, northern and southern hemispheres
     * Uses GRS 1967 ellipsoid with 1/f to exactly 2 decimal places. Replaces SAD69 / UTM zone 24S (CRS code 29194).
     * Replaced by SIRGAS 2000 / UTM zone 24S (CRS code 31984).
     */
    public const EPSG_SAD69_96_UTM_ZONE_24S = 'urn:ogc:def:crs:EPSG::5534';

    /**
     * SAD69(96) / UTM zone 25S
     * Extent: Brazil - between 36°W and 30°W, northern and southern hemispheres
     * Uses GRS 1967 ellipsoid with 1/f to exactly 2 decimal places. Replaces SAD69 / UTM zone 25S (CRS code 29195).
     * Replaced by SIRGAS 2000 / UTM zone 25S (CRS code 31985).
     */
    public const EPSG_SAD69_96_UTM_ZONE_25S = 'urn:ogc:def:crs:EPSG::5535';

    /**
     * SCM22 Grid
     * Extent: UK - on or related to the Scottish central mainline rail route from Motherwell through Perth and
     * Pitlochry to Inverness
     * Defined through transformation ETRS89 to SCM22-IRF (1) (code 9970) and map projection SCM22-TM (code 9971).
     * Emulates the SCM22 Snake projection applied to ETRS89 as realized through OSNet 2009.
     */
    public const EPSG_SCM22_GRID = 'urn:ogc:def:crs:EPSG::9972';

    /**
     * SHMG2015
     * Extent: St Helena, Ascension and Tristan da Cunha - St Helena Island - onshore
     * Replaces previous CRSs (codes 7877, 7878, 7882 and 7883) from 2015.
     */
    public const EPSG_SHMG2015 = 'urn:ogc:def:crs:EPSG::7887';

    /**
     * SIRGAS 1995 / UTM zone 17N
     * Extent: South America between 84°W and 78°W, northern hemisphere
     * Replaced by SIRGAS 2000 system.
     */
    public const EPSG_SIRGAS_1995_UTM_ZONE_17N = 'urn:ogc:def:crs:EPSG::31986';

    /**
     * SIRGAS 1995 / UTM zone 17S
     * Extent: Ecuador (mainland whole country including areas in northern hemisphere and east of 78°W). In remainder
     * of South America, between 84°W and 78°W, southern hemisphere
     * For scientific purposes, replaced by SIRGAS 2000 system. Remains official system in Ecuador.
     */
    public const EPSG_SIRGAS_1995_UTM_ZONE_17S = 'urn:ogc:def:crs:EPSG::31992';

    /**
     * SIRGAS 1995 / UTM zone 18N
     * Extent: South America between 78°W and 72°W, northern hemisphere
     * Replaced by SIRGAS 2000 system.
     */
    public const EPSG_SIRGAS_1995_UTM_ZONE_18N = 'urn:ogc:def:crs:EPSG::31987';

    /**
     * SIRGAS 1995 / UTM zone 18S
     * Extent: South America between 78°W and 72°W, southern hemisphere
     * Replaced by SIRGAS 2000 system.
     */
    public const EPSG_SIRGAS_1995_UTM_ZONE_18S = 'urn:ogc:def:crs:EPSG::31993';

    /**
     * SIRGAS 1995 / UTM zone 19N
     * Extent: South America between 72°W and 66°W, northern hemisphere
     * Replaced by SIRGAS 2000 system.
     */
    public const EPSG_SIRGAS_1995_UTM_ZONE_19N = 'urn:ogc:def:crs:EPSG::31988';

    /**
     * SIRGAS 1995 / UTM zone 19S
     * Extent: South America between 72°W and 66°W, southern hemisphere
     * Replaced by SIRGAS 2000 system.
     */
    public const EPSG_SIRGAS_1995_UTM_ZONE_19S = 'urn:ogc:def:crs:EPSG::31994';

    /**
     * SIRGAS 1995 / UTM zone 20N
     * Extent: South America between 66°W and 60°W, northern hemisphere
     * Replaced by SIRGAS 2000 system.
     */
    public const EPSG_SIRGAS_1995_UTM_ZONE_20N = 'urn:ogc:def:crs:EPSG::31989';

    /**
     * SIRGAS 1995 / UTM zone 20S
     * Extent: South America between 66°W and 60°W, southern hemisphere
     * Replaced by SIRGAS 2000 system.
     */
    public const EPSG_SIRGAS_1995_UTM_ZONE_20S = 'urn:ogc:def:crs:EPSG::31995';

    /**
     * SIRGAS 1995 / UTM zone 21N
     * Extent: South America between 60°W and 54°W, northern hemisphere
     * Replaced by SIRGAS 2000 system.
     */
    public const EPSG_SIRGAS_1995_UTM_ZONE_21N = 'urn:ogc:def:crs:EPSG::31990';

    /**
     * SIRGAS 1995 / UTM zone 21S
     * Extent: South America, southern hemisphere between 60°W and 54°W
     * Replaced by SIRGAS 2000 system.
     */
    public const EPSG_SIRGAS_1995_UTM_ZONE_21S = 'urn:ogc:def:crs:EPSG::31996';

    /**
     * SIRGAS 1995 / UTM zone 22N
     * Extent: South America between 54°W and 48°W, northern hemisphere
     * Replaced by SIRGAS 2000 system.
     */
    public const EPSG_SIRGAS_1995_UTM_ZONE_22N = 'urn:ogc:def:crs:EPSG::31991';

    /**
     * SIRGAS 1995 / UTM zone 22S
     * Extent: South America between 54°W and 48°W, southern hemisphere
     * Replaced by SIRGAS 2000 system.
     */
    public const EPSG_SIRGAS_1995_UTM_ZONE_22S = 'urn:ogc:def:crs:EPSG::31997';

    /**
     * SIRGAS 1995 / UTM zone 23S
     * Extent: South America - between 48°W and 42°W, southern hemisphere
     * Replaced by SIRGAS 2000 system.
     */
    public const EPSG_SIRGAS_1995_UTM_ZONE_23S = 'urn:ogc:def:crs:EPSG::31998';

    /**
     * SIRGAS 1995 / UTM zone 24S
     * Extent: South America - between 42°W and 36°W, southern hemisphere
     * Replaced by SIRGAS 2000 system.
     */
    public const EPSG_SIRGAS_1995_UTM_ZONE_24S = 'urn:ogc:def:crs:EPSG::31999';

    /**
     * SIRGAS 1995 / UTM zone 25S
     * Extent: South America - between 36°W and 30°W, southern hemisphere
     * Replaced by SIRGAS 2000 system.
     */
    public const EPSG_SIRGAS_1995_UTM_ZONE_25S = 'urn:ogc:def:crs:EPSG::32000';

    /**
     * SIRGAS 2000 / Brazil Mercator
     * Extent: Brazil - offshore - equatorial margin.
     */
    public const EPSG_SIRGAS_2000_BRAZIL_MERCATOR = 'urn:ogc:def:crs:EPSG::5641';

    /**
     * SIRGAS 2000 / Brazil Polyconic
     * Extent: Brazil. Includes Rocas, Fernando de Noronha archipelago, Trindade, Ihlas Martim Vaz and Sao Pedro e Sao
     * Paulo
     * Replaces SAD69 / Brazil Polyconic (CRS code 29101) and SAD69(96) / Brazil Polyconic (CRS code 5530).
     */
    public const EPSG_SIRGAS_2000_BRAZIL_POLYCONIC = 'urn:ogc:def:crs:EPSG::5880';

    /**
     * SIRGAS 2000 / Porto Alegre TM
     * Extent: Brazil - Porto Alegre municipality
     * Replaces the Porto Alegre Gauss-Kruger Cartographic Reference System of the Brazilian General Chart Commission
     * (SCR-CCG) from 2013-06-20.
     */
    public const EPSG_SIRGAS_2000_PORTO_ALEGRE_TM = 'urn:ogc:def:crs:EPSG::10665';

    /**
     * SIRGAS 2000 / UTM zone 11N
     * Extent: Latin America between 120°W and 114°W, northern hemisphere.
     */
    public const EPSG_SIRGAS_2000_UTM_ZONE_11N = 'urn:ogc:def:crs:EPSG::31965';

    /**
     * SIRGAS 2000 / UTM zone 12N
     * Extent: Latin America between 114°W and 108°W, northern hemisphere.
     */
    public const EPSG_SIRGAS_2000_UTM_ZONE_12N = 'urn:ogc:def:crs:EPSG::31966';

    /**
     * SIRGAS 2000 / UTM zone 13N
     * Extent: Latin America between 108°W and 102°W, northern hemisphere.
     */
    public const EPSG_SIRGAS_2000_UTM_ZONE_13N = 'urn:ogc:def:crs:EPSG::31967';

    /**
     * SIRGAS 2000 / UTM zone 14N
     * Extent: Latin America between 102°W and 96°W, northern hemisphere.
     */
    public const EPSG_SIRGAS_2000_UTM_ZONE_14N = 'urn:ogc:def:crs:EPSG::31968';

    /**
     * SIRGAS 2000 / UTM zone 15N
     * Extent: Latin America - Central and South America - between 96°W and 90°W, northern hemisphere.
     */
    public const EPSG_SIRGAS_2000_UTM_ZONE_15N = 'urn:ogc:def:crs:EPSG::31969';

    /**
     * SIRGAS 2000 / UTM zone 16N
     * Extent: Latin America - Central America and South America - between 90°W and 84°W, northern hemisphere.
     */
    public const EPSG_SIRGAS_2000_UTM_ZONE_16N = 'urn:ogc:def:crs:EPSG::31970';

    /**
     * SIRGAS 2000 / UTM zone 17N
     * Extent: Latin America - Central America and South America - between 84°W and 78°W, northern hemisphere
     * Replaces SIRGAS 1995 system.
     */
    public const EPSG_SIRGAS_2000_UTM_ZONE_17N = 'urn:ogc:def:crs:EPSG::31971';

    /**
     * SIRGAS 2000 / UTM zone 17S
     * Extent: South America between 84°W and 78°W, southern hemisphere
     * Replaces SIRGAS 1995 system.
     */
    public const EPSG_SIRGAS_2000_UTM_ZONE_17S = 'urn:ogc:def:crs:EPSG::31977';

    /**
     * SIRGAS 2000 / UTM zone 18N
     * Extent: Latin America - Central America and South America - between 78°W and 72°W, northern hemisphere
     * Replaces SIRGAS 1995 system.
     */
    public const EPSG_SIRGAS_2000_UTM_ZONE_18N = 'urn:ogc:def:crs:EPSG::31972';

    /**
     * SIRGAS 2000 / UTM zone 18S
     * Extent: Brazil west of 72°W. In remainder of South America, between 78°W and 72°W, southern hemisphere
     * Replaces SIRGAS 1995 system.
     */
    public const EPSG_SIRGAS_2000_UTM_ZONE_18S = 'urn:ogc:def:crs:EPSG::31978';

    /**
     * SIRGAS 2000 / UTM zone 19N
     * Extent: South America between 72°W and 66°W and north of approximately 2°N
     * Replaces SIRGAS 1995 system.
     */
    public const EPSG_SIRGAS_2000_UTM_ZONE_19N = 'urn:ogc:def:crs:EPSG::31973';

    /**
     * SIRGAS 2000 / UTM zone 19S
     * Extent: Brazil - between 72°W and 66°W, northern and southern hemispheres. In remainder of South America -
     * between 72°W and 66°W, southern hemisphere
     * Replaces SIRGAS 1995 system.
     */
    public const EPSG_SIRGAS_2000_UTM_ZONE_19S = 'urn:ogc:def:crs:EPSG::31979';

    /**
     * SIRGAS 2000 / UTM zone 20N
     * Extent: South America between 66°W and 60°W, north of approximately 4°N
     * Replaces SIRGAS 1995 system.
     */
    public const EPSG_SIRGAS_2000_UTM_ZONE_20N = 'urn:ogc:def:crs:EPSG::31974';

    /**
     * SIRGAS 2000 / UTM zone 20S
     * Extent: Brazil - between 66°W and 60°W, northern and southern hemispheres. In remainder of South America -
     * between 66°W and 60°W, southern hemisphere
     * Replaces SIRGAS 1995 system.
     */
    public const EPSG_SIRGAS_2000_UTM_ZONE_20S = 'urn:ogc:def:crs:EPSG::31980';

    /**
     * SIRGAS 2000 / UTM zone 21N
     * Extent: South America between 60°W and 54°W, north of approximately 2°N
     * Replaces SIRGAS 1995 system.
     */
    public const EPSG_SIRGAS_2000_UTM_ZONE_21N = 'urn:ogc:def:crs:EPSG::31975';

    /**
     * SIRGAS 2000 / UTM zone 21S
     * Extent: Brazil - between 60°W and 54°W, northern and southern hemispheres. In remainder of South America -
     * between 60°W and 54°W, southern hemisphere
     * Replaces SIRGAS 1995 system.
     */
    public const EPSG_SIRGAS_2000_UTM_ZONE_21S = 'urn:ogc:def:crs:EPSG::31981';

    /**
     * SIRGAS 2000 / UTM zone 22N
     * Extent: South America between 54°W and 48°W, northern hemisphere,  except Brazil where offshore only
     * Replaces SIRGAS 1995 system.
     */
    public const EPSG_SIRGAS_2000_UTM_ZONE_22N = 'urn:ogc:def:crs:EPSG::31976';

    /**
     * SIRGAS 2000 / UTM zone 22S
     * Extent: Brazil - between 54°W and 48°W, northern and southern hemispheres. In remainder of South America -
     * between 54°W and 48°W, southern hemisphere
     * Replaces SIRGAS 1995 system.
     */
    public const EPSG_SIRGAS_2000_UTM_ZONE_22S = 'urn:ogc:def:crs:EPSG::31982';

    /**
     * SIRGAS 2000 / UTM zone 23N
     * Extent: Brazil - offshore between 48°W and 42°W, northern hemisphere
     * The officially-recognised system for this area of offshore Brazil is SIRGAS 2000 / UTM zone 23S (CRS code
     * 31983).
     */
    public const EPSG_SIRGAS_2000_UTM_ZONE_23N = 'urn:ogc:def:crs:EPSG::6210';

    /**
     * SIRGAS 2000 / UTM zone 23S
     * Extent: Brazil - between 48°W and 42°W, northern and southern hemispheres
     * Replaces SIRGAS 1995 system.
     */
    public const EPSG_SIRGAS_2000_UTM_ZONE_23S = 'urn:ogc:def:crs:EPSG::31983';

    /**
     * SIRGAS 2000 / UTM zone 24N
     * Extent: Brazil - offshore between 42°W and 36°W, northern hemisphere
     * The officially-recognised system for this area of offshore Brazil is SIRGAS 2000 / UTM zone 24S (CRS code
     * 31984).
     */
    public const EPSG_SIRGAS_2000_UTM_ZONE_24N = 'urn:ogc:def:crs:EPSG::6211';

    /**
     * SIRGAS 2000 / UTM zone 24S
     * Extent: Brazil - between 42°W and 36°W, northern and southern hemispheres
     * Replaces SIRGAS 1995 system.
     */
    public const EPSG_SIRGAS_2000_UTM_ZONE_24S = 'urn:ogc:def:crs:EPSG::31984';

    /**
     * SIRGAS 2000 / UTM zone 25S
     * Extent: Brazil - between 36°W and 30°W, northern and southern hemispheres
     * Replaces SIRGAS 1995 system.
     */
    public const EPSG_SIRGAS_2000_UTM_ZONE_25S = 'urn:ogc:def:crs:EPSG::31985';

    /**
     * SIRGAS 2000 / UTM zone 26S
     * Extent: Brazil - east of 30°W, northern and southern hemispheres.
     */
    public const EPSG_SIRGAS_2000_UTM_ZONE_26S = 'urn:ogc:def:crs:EPSG::5396';

    /**
     * SIRGAS-Chile 2002 / UTM zone 18S
     * Extent: Chile - 78°W to 72°W
     * Replaces PSAD56 / UTM zone 18S (CRS code 24878) in Chile. Replaced by SIRGAS-Chile 2010 / UTM zone 18S (CRS code
     * 8950).
     */
    public const EPSG_SIRGAS_CHILE_2002_UTM_ZONE_18S = 'urn:ogc:def:crs:EPSG::5362';

    /**
     * SIRGAS-Chile 2002 / UTM zone 19S
     * Extent: Chile - 72°W to 66°W
     * Replaces PSAD56 / UTM zone 19S (CRS code 24879) in Chile. Replaced by SIRGAS-Chile 2010 / UTM zone 19S (CRS code
     * 8951).
     */
    public const EPSG_SIRGAS_CHILE_2002_UTM_ZONE_19S = 'urn:ogc:def:crs:EPSG::5361';

    /**
     * SIRGAS-Chile 2010 / UTM zone 18S
     * Extent: Chile - 78°W to 72°W
     * Replaces SIRGAS-Chile 2002 / UTM zone 18S (CRS code 5362). Replaced by SIRGAS-Chile 2013 / UTM zone 18S (CRS
     * code 9149).
     */
    public const EPSG_SIRGAS_CHILE_2010_UTM_ZONE_18S = 'urn:ogc:def:crs:EPSG::8950';

    /**
     * SIRGAS-Chile 2010 / UTM zone 19S
     * Extent: Chile - 72°W to 66°W
     * Replaces SIRGAS-Chile 2002 / UTM zone 19S (CRS code 5361). Replaced by SIRGAS-Chile 2013 / UTM zone 19S (CRS
     * code 9150).
     */
    public const EPSG_SIRGAS_CHILE_2010_UTM_ZONE_19S = 'urn:ogc:def:crs:EPSG::8951';

    /**
     * SIRGAS-Chile 2013 / UTM zone 18S
     * Extent: Chile - 78°W to 72°W
     * Replaces SIRGAS-Chile 2010 / UTM zone 18S (CRS code 8950). Replaced by SIRGAS-Chile 2016 / UTM zone 18S (CRS
     * code 9154).
     */
    public const EPSG_SIRGAS_CHILE_2013_UTM_ZONE_18S = 'urn:ogc:def:crs:EPSG::9149';

    /**
     * SIRGAS-Chile 2013 / UTM zone 19S
     * Extent: Chile - 72°W to 66°W
     * Replaces SIRGAS-Chile 2010 / UTM zone 19S (CRS code 8951). Replaced by SIRGAS-Chile 2016 / UTM zone 19S (CRS
     * code 9155).
     */
    public const EPSG_SIRGAS_CHILE_2013_UTM_ZONE_19S = 'urn:ogc:def:crs:EPSG::9150';

    /**
     * SIRGAS-Chile 2016 / UTM zone 18S
     * Extent: Chile - 78°W to 72°W
     * Replaces SIRGAS-Chile 2013 / UTM zone 18S (CRS code 9149).
     */
    public const EPSG_SIRGAS_CHILE_2016_UTM_ZONE_18S = 'urn:ogc:def:crs:EPSG::9154';

    /**
     * SIRGAS-Chile 2016 / UTM zone 19S
     * Extent: Chile - 72°W to 66°W
     * Replaces SIRGAS-Chile 2013 / UTM zone 19S (CRS code 9150).
     */
    public const EPSG_SIRGAS_CHILE_2016_UTM_ZONE_19S = 'urn:ogc:def:crs:EPSG::9155';

    /**
     * SIRGAS-Chile 2021 / UTM zone 12S
     * Extent: Chile - Easter Island - west of 108°W.
     */
    public const EPSG_SIRGAS_CHILE_2021_UTM_ZONE_12S = 'urn:ogc:def:crs:EPSG::20042';

    /**
     * SIRGAS-Chile 2021 / UTM zone 18S
     * Extent: Chile - 78°W to 72°W
     * Replaces SIRGAS-Chile 2021 / UTM zone 18S (CRS code 9154).
     */
    public const EPSG_SIRGAS_CHILE_2021_UTM_ZONE_18S = 'urn:ogc:def:crs:EPSG::20048';

    /**
     * SIRGAS-Chile 2021 / UTM zone 19S
     * Extent: Chile - 72°W to 66°W
     * Replaces SIRGAS-Chile 2016 / UTM zone 19S (CRS code 9155).
     */
    public const EPSG_SIRGAS_CHILE_2021_UTM_ZONE_19S = 'urn:ogc:def:crs:EPSG::20049';

    /**
     * SIRGAS-ROU98 / UTM zone 21S
     * Extent: Uruguay - west of 54°W.
     */
    public const EPSG_SIRGAS_ROU98_UTM_ZONE_21S = 'urn:ogc:def:crs:EPSG::5382';

    /**
     * SIRGAS-ROU98 / UTM zone 22S
     * Extent: Uruguay - east of 54°W.
     */
    public const EPSG_SIRGAS_ROU98_UTM_ZONE_22S = 'urn:ogc:def:crs:EPSG::5383';

    /**
     * SLD99 / Sri Lanka Grid 1999
     * Extent: Sri Lanka - onshore
     * Used in parallel with Kandawala / Sri Lanka Grid (CRS code 5234).
     */
    public const EPSG_SLD99_SRI_LANKA_GRID_1999 = 'urn:ogc:def:crs:EPSG::5235';

    /**
     * SMITB20 Grid
     * Extent: UK - on or related to the rail route from Okehampton to Penstone
     * Defined through transformation ETRS89 to SMITB20-IRF (1) (code 10273) and map projection SMITB20-TM (code
     * 10274). Emulates the SMITB20 Snake projection applied to ETRS89 as realized through OSNet 2009.
     */
    public const EPSG_SMITB20_GRID = 'urn:ogc:def:crs:EPSG::10275';

    /**
     * SRB_ETRS89 / UTM zone 34N
     * Extent: Serbia including Vojvodina
     * Between 2012 and 2017 the CS axes were sometimes labelled Y,X.
     */
    public const EPSG_SRB_ETRS89_UTM_ZONE_34N = 'urn:ogc:def:crs:EPSG::8682';

    /**
     * SRGI2013 / UTM zone 46N
     * Extent: Indonesia - north of equator and west of 96°E
     * Replaces DGN95 / UTM zone 46N.
     */
    public const EPSG_SRGI2013_UTM_ZONE_46N = 'urn:ogc:def:crs:EPSG::9476';

    /**
     * SRGI2013 / UTM zone 47N
     * Extent: Indonesia - north of equator and between 96°E and 102°E
     * Replaces DGN95 / UTM zone 47N.
     */
    public const EPSG_SRGI2013_UTM_ZONE_47N = 'urn:ogc:def:crs:EPSG::9477';

    /**
     * SRGI2013 / UTM zone 47S
     * Extent: Indonesia - south of equator and between 96°E and 102°E
     * Replaces DGN95 / UTM zone 47S.
     */
    public const EPSG_SRGI2013_UTM_ZONE_47S = 'urn:ogc:def:crs:EPSG::9487';

    /**
     * SRGI2013 / UTM zone 48N
     * Extent: Indonesia - north of equator and between 102°E and 108°E
     * Replaces DGN95 / UTM zone 48N.
     */
    public const EPSG_SRGI2013_UTM_ZONE_48N = 'urn:ogc:def:crs:EPSG::9478';

    /**
     * SRGI2013 / UTM zone 48S
     * Extent: Indonesia - south of equator and between 102°E and 108°E
     * Replaces DGN95 / UTM zone 48S.
     */
    public const EPSG_SRGI2013_UTM_ZONE_48S = 'urn:ogc:def:crs:EPSG::9488';

    /**
     * SRGI2013 / UTM zone 49N
     * Extent: Indonesia - north of equator and between 108°E and 114°E
     * Replaces DGN95 / UTM zone 49N.
     */
    public const EPSG_SRGI2013_UTM_ZONE_49N = 'urn:ogc:def:crs:EPSG::9479';

    /**
     * SRGI2013 / UTM zone 49S
     * Extent: Indonesia - south of equator and between 108°E and 114°E
     * Replaces DGN95 / UTM zone 49S.
     */
    public const EPSG_SRGI2013_UTM_ZONE_49S = 'urn:ogc:def:crs:EPSG::9489';

    /**
     * SRGI2013 / UTM zone 50N
     * Extent: Indonesia - north of equator and between 114°E and 120°E
     * Replaces DGN95 / UTM zone 50N.
     */
    public const EPSG_SRGI2013_UTM_ZONE_50N = 'urn:ogc:def:crs:EPSG::9480';

    /**
     * SRGI2013 / UTM zone 50S
     * Extent: Indonesia - south of equator and between 114°E and 120°E
     * Replaces DGN95 / UTM zone 50S.
     */
    public const EPSG_SRGI2013_UTM_ZONE_50S = 'urn:ogc:def:crs:EPSG::9490';

    /**
     * SRGI2013 / UTM zone 51N
     * Extent: Indonesia - north of equator and between 120°E and 126°E
     * Replaces DGN95 / UTM zone 51N.
     */
    public const EPSG_SRGI2013_UTM_ZONE_51N = 'urn:ogc:def:crs:EPSG::9481';

    /**
     * SRGI2013 / UTM zone 51S
     * Extent: Indonesia - south of equator and between 120°E and 126°E
     * Replaces DGN / UTM zone 51S.
     */
    public const EPSG_SRGI2013_UTM_ZONE_51S = 'urn:ogc:def:crs:EPSG::9491';

    /**
     * SRGI2013 / UTM zone 52N
     * Extent: Indonesia - north of equator and between 126°E and 132°E
     * Replaces DGN95 / UTM zone 52N.
     */
    public const EPSG_SRGI2013_UTM_ZONE_52N = 'urn:ogc:def:crs:EPSG::9482';

    /**
     * SRGI2013 / UTM zone 52S
     * Extent: Indonesia - south of equator and between 126°E and 132°E
     * Replaces DGN95 / UTM zone 52S.
     */
    public const EPSG_SRGI2013_UTM_ZONE_52S = 'urn:ogc:def:crs:EPSG::9492';

    /**
     * SRGI2013 / UTM zone 53S
     * Extent: Indonesia - south of equator and between 132°E and 138°E
     * Replaces DGN95 / UTM zone 53S.
     */
    public const EPSG_SRGI2013_UTM_ZONE_53S = 'urn:ogc:def:crs:EPSG::9493';

    /**
     * SRGI2013 / UTM zone 54S
     * Extent: Indonesia - south of equator and east of 138°E
     * Replaces DGN95 / UTM zone 54S.
     */
    public const EPSG_SRGI2013_UTM_ZONE_54S = 'urn:ogc:def:crs:EPSG::9494';

    /**
     * ST71 Belep / UTM zone 58S
     * Extent: New Caledonia - Belep
     * Replaced by RGNC91-93 / Lambert Caledonie (CRS code 3163).
     */
    public const EPSG_ST71_BELEP_UTM_ZONE_58S = 'urn:ogc:def:crs:EPSG::2997';

    /**
     * ST74
     * Extent: Sweden - Stockholm commune
     * Simulation of engineering (local) coordinate reference system through a Sweref-related projected CRS. Accuracy
     * better than 0.05m. Replaced by County ST74 (CRS code 3854).
     */
    public const EPSG_ST74 = 'urn:ogc:def:crs:EPSG::3152';

    /**
     * ST84 Ile des Pins / UTM zone 58S
     * Extent: New Caledonia - Ile des Pins
     * Replaced by RGNC91-93 / Lambert Caledonie (CRS code 3163).
     */
    public const EPSG_ST84_ILE_DES_PINS_UTM_ZONE_58S = 'urn:ogc:def:crs:EPSG::2996';

    /**
     * ST87 Ouvea / UTM zone 58S
     * Extent: New Caledonia - Loyalty Islands - Ouvea
     * Replaced by RGNC91-93 / Lambert Caledonie (CRS code 3163).
     */
    public const EPSG_ST87_OUVEA_UTM_ZONE_58S = 'urn:ogc:def:crs:EPSG::3164';

    /**
     * SVY21 / Singapore TM
     * Extent: Singapore
     * For cadastral purposes, replaces Kertau 1968 / Singapore Grid (CRS code 24500) from August 2004.
     */
    public const EPSG_SVY21_SINGAPORE_TM = 'urn:ogc:def:crs:EPSG::3414';

    /**
     * SWEREF99 / RT90 0 gon emulation
     * Extent: Sweden - communes between approximately 16°55'E and 19°10'E; Gotland. See information source for map
     * Approximates RT90 0 gon (CRS code 3022) to an accuracy of 0.2m.
     */
    public const EPSG_SWEREF99_RT90_0_GON_EMULATION = 'urn:ogc:def:crs:EPSG::3848';

    /**
     * SWEREF99 / RT90 2.5 gon O emulation
     * Extent: Sweden - communes between approximately 19°10'E and 21°25'E. See information source for map
     * Approximates RT90 2.5 gon O (CRS code 3023) to an accuracy of 0.2m.
     */
    public const EPSG_SWEREF99_RT90_2_5_GON_O_EMULATION = 'urn:ogc:def:crs:EPSG::3849';

    /**
     * SWEREF99 / RT90 2.5 gon V emulation
     * Extent: Sweden - communes between approximately 14°40'E and 16°55'E. See information source for map
     * Approximates RT90 2.5 gon V (CRS code 3021) to an accuracy of 0.2m.
     */
    public const EPSG_SWEREF99_RT90_2_5_GON_V_EMULATION = 'urn:ogc:def:crs:EPSG::3847';

    /**
     * SWEREF99 / RT90 5 gon O emulation
     * Extent: Sweden - east of approximately 21°26'E. See information source for map
     * Approximates RT90 5 gon O (CRS code 3024) to an accuracy of 0.2m.
     */
    public const EPSG_SWEREF99_RT90_5_GON_O_EMULATION = 'urn:ogc:def:crs:EPSG::3850';

    /**
     * SWEREF99 / RT90 5 gon V emulation
     * Extent: Sweden - communes between approximately 12°26'E and 14°40'E. See information source for map
     * Approximates RT90 5 gon V (CRS code 3020) to an accuracy of 0.2m.
     */
    public const EPSG_SWEREF99_RT90_5_GON_V_EMULATION = 'urn:ogc:def:crs:EPSG::3846';

    /**
     * SWEREF99 / RT90 7.5 gon V emulation
     * Extent: Sweden - communes west of approximately 12°26'E. See information source for map
     * Approximates RT90 7.5 gon V (CRS code 3019) to an accuracy of 0.2m.
     */
    public const EPSG_SWEREF99_RT90_7_5_GON_V_EMULATION = 'urn:ogc:def:crs:EPSG::3845';

    /**
     * SWEREF99 12 00
     * Extent: Sweden - communes west of approximately 12°45'E and south of approximately 60°N. See information
     * source for map
     * From 2003 replaces RT90 systems (CRS codes 3019-24). For medium and small scale applications see SWEREF 99 TM
     * (CRS code 3006).
     */
    public const EPSG_SWEREF99_12_00 = 'urn:ogc:def:crs:EPSG::3007';

    /**
     * SWEREF99 13 30
     * Extent: Sweden - communes between approximately 12°45'E and 14°15'E and south of approximately 62°10'N. See
     * information source for map
     * From 2003 replaces RT90 systems (CRS codes 3019-24). For medium and small scale applications see SWEREF 99 TM
     * (CRS code 3006).
     */
    public const EPSG_SWEREF99_13_30 = 'urn:ogc:def:crs:EPSG::3008';

    /**
     * SWEREF99 14 15
     * Extent: Sweden - communes west of approximately 15°E and between approximately 61°35'N and 64°25'N. See
     * information source for map
     * From 2003 replaces RT90 systems (CRS codes 3019-24). For medium and small scale applications see SWEREF 99 TM
     * (CRS code 3006).
     */
    public const EPSG_SWEREF99_14_15 = 'urn:ogc:def:crs:EPSG::3012';

    /**
     * SWEREF99 15 00
     * Extent: Sweden - communes between approximately 14°15'E and 15°45'E and south of approximately 61°30'N. See
     * information source for map
     * From 2003 replaces RT90 systems (CRS codes 3019-24). For medium and small scale applications see SWEREF 99 TM
     * (CRS code 3006).
     */
    public const EPSG_SWEREF99_15_00 = 'urn:ogc:def:crs:EPSG::3009';

    /**
     * SWEREF99 15 45
     * Extent: Sweden - communes between approximately 15°E and 16°30'E and between approximately 60°30'N and 65°N.
     * See information source for map
     * From 2003 replaces RT90 systems (CRS codes 3019-24). For medium and small scale applications see SWEREF 99 TM
     * (CRS code 3006).
     */
    public const EPSG_SWEREF99_15_45 = 'urn:ogc:def:crs:EPSG::3013';

    /**
     * SWEREF99 16 30
     * Extent: Sweden - communes between approximately 15°45'E and 17°15'E and south of approximately 62°20'N. See
     * information source for map
     * From 2003 replaces RT90 systems (CRS codes 3019-24). For medium and small scale applications see SWEREF 99 TM
     * (CRS code 3006).
     */
    public const EPSG_SWEREF99_16_30 = 'urn:ogc:def:crs:EPSG::3010';

    /**
     * SWEREF99 17 15
     * Extent: Sweden - communes between approximately 14°20'E and 18°50'E and between approximately 67°10'N and
     * 62°05'N. See information source for map
     * From 2003 replaces RT90 systems (CRS codes 3019-24). For medium and small scale applications see SWEREF 99 TM
     * (CRS code 3006).
     */
    public const EPSG_SWEREF99_17_15 = 'urn:ogc:def:crs:EPSG::3014';

    /**
     * SWEREF99 18 00
     * Extent: Sweden - communes east of approximately 17°15'E between approximately 60°40'N and 58°50'N. See
     * information source for map
     * From 2003 replaces RT90 systems (CRS codes 3019-24). For medium and small scale applications see SWEREF 99 TM
     * (CRS code 3006).
     */
    public const EPSG_SWEREF99_18_00 = 'urn:ogc:def:crs:EPSG::3011';

    /**
     * SWEREF99 18 45
     * Extent: Sweden - mainland communes between approximately 18°E and 19°30'E and between approximately 62°50'N
     * and 66°N. Also Gotland. See information source for map
     * From 2003 replaces RT90 systems (CRS codes 3019-24). For medium and small scale applications see SWEREF 99 TM
     * (CRS code 3006).
     */
    public const EPSG_SWEREF99_18_45 = 'urn:ogc:def:crs:EPSG::3015';

    /**
     * SWEREF99 20 15
     * Extent: Sweden - communes in Vaasterbotten east of approximately 19°30'E and (i) north of 63°30'N and (ii)
     * south of approximately 65°05'N. Also Norbotten west of approximately 23°20'E. See information source for map
     * From 2003 replaces RT90 systems (CRS codes 3019-24). For medium and small scale applications see SWEREF 99 TM
     * (CRS code 3006).
     */
    public const EPSG_SWEREF99_20_15 = 'urn:ogc:def:crs:EPSG::3016';

    /**
     * SWEREF99 21 45
     * Extent: Sweden - communes in Norbotten east of approximately 19°30'E and south of approximately 65°50'N. See
     * information source for map
     * From 2003 replaces RT90 systems (CRS codes 3019-24). For medium and small scale applications see SWEREF 99 TM
     * (CRS code 3006).
     */
    public const EPSG_SWEREF99_21_45 = 'urn:ogc:def:crs:EPSG::3017';

    /**
     * SWEREF99 23 15
     * Extent: Sweden - communes east of approximately 21°50'E. See information source for map
     * From 2003 replaces RT90 systems (CRS codes 3019-24).
     */
    public const EPSG_SWEREF99_23_15 = 'urn:ogc:def:crs:EPSG::3018';

    /**
     * SWEREF99 TM
     * Extent: Sweden
     * From 2003 replaces RT90 2.5 gon V (CRS code 3021). For large scale applications see CRS codes 3007-18.
     */
    public const EPSG_SWEREF99_TM = 'urn:ogc:def:crs:EPSG::3006';

    /**
     * SYC20 Grid
     * Extent: UK - on or related to the rail route from Shrewsbury to Crewe
     * The CRS's definition through transformation ETRS89 to SYC20-IRF (1) (code 10238) and map projection SYC20-TM
     * (code 10239) emulates the SYC20 Snake projection applied to ETRS89 as realized through OSNet 2009.
     */
    public const EPSG_SYC20_GRID = 'urn:ogc:def:crs:EPSG::10240';

    /**
     * Saint Pierre et Miquelon 1950 / UTM zone 21N
     * Extent: St Pierre and Miquelon - onshore
     * Replaced by RGSPM06 / UTM zone 21N (CRS code 4467).
     */
    public const EPSG_SAINT_PIERRE_ET_MIQUELON_1950_UTM_ZONE_21N = 'urn:ogc:def:crs:EPSG::2987';

    /**
     * Sapper Hill 1943 / UTM zone 20S
     * Extent: Falkland Islands (Malvinas) - onshore west of 60°W.
     */
    public const EPSG_SAPPER_HILL_1943_UTM_ZONE_20S = 'urn:ogc:def:crs:EPSG::29220';

    /**
     * Sapper Hill 1943 / UTM zone 21S
     * Extent: Falkland Islands (Malvinas) - onshore east of 60°W.
     */
    public const EPSG_SAPPER_HILL_1943_UTM_ZONE_21S = 'urn:ogc:def:crs:EPSG::29221';

    /**
     * Schwarzeck / Lo22/11
     * Extent: Namibia - onshore west of 12°E.
     */
    public const EPSG_SCHWARZECK_LO22_11 = 'urn:ogc:def:crs:EPSG::29371';

    /**
     * Schwarzeck / Lo22/13
     * Extent: Namibia - onshore between 12°E and 14°E.
     */
    public const EPSG_SCHWARZECK_LO22_13 = 'urn:ogc:def:crs:EPSG::29373';

    /**
     * Schwarzeck / Lo22/15
     * Extent: Namibia - onshore between 14°E and 16°E.
     */
    public const EPSG_SCHWARZECK_LO22_15 = 'urn:ogc:def:crs:EPSG::29375';

    /**
     * Schwarzeck / Lo22/17
     * Extent: Namibia - onshore between 16°E and 18°E.
     */
    public const EPSG_SCHWARZECK_LO22_17 = 'urn:ogc:def:crs:EPSG::29377';

    /**
     * Schwarzeck / Lo22/19
     * Extent: Namibia - between 18°E and 20°E.
     */
    public const EPSG_SCHWARZECK_LO22_19 = 'urn:ogc:def:crs:EPSG::29379';

    /**
     * Schwarzeck / Lo22/21
     * Extent: Namibia - between 20°E and 22°E.
     */
    public const EPSG_SCHWARZECK_LO22_21 = 'urn:ogc:def:crs:EPSG::29381';

    /**
     * Schwarzeck / Lo22/23
     * Extent: Namibia - between 22°E and 24°E.
     */
    public const EPSG_SCHWARZECK_LO22_23 = 'urn:ogc:def:crs:EPSG::29383';

    /**
     * Schwarzeck / Lo22/25
     * Extent: Namibia - east of 24°E.
     */
    public const EPSG_SCHWARZECK_LO22_25 = 'urn:ogc:def:crs:EPSG::29385';

    /**
     * Schwarzeck / UTM zone 33S
     * Extent: Namibia - offshore
     * CARE! The ellipsoid semi-major axis dimension is defined in German Legal Metres as 6377397.155 GLM but for the
     * CRS needs to9 be converted to CRS units of International metres as 6377483.865 m.
     */
    public const EPSG_SCHWARZECK_UTM_ZONE_33S = 'urn:ogc:def:crs:EPSG::29333';

    /**
     * Scoresbysund 1952 / Greenland zone 5 east
     * Extent: Greenland - east coast onshore - between 69°N and 72°N
     * Historically also found with coordinate system axis abbreviations N/E (CS code 4501); second axis has
     * abbreviation E but is positive to the west.
     */
    public const EPSG_SCORESBYSUND_1952_GREENLAND_ZONE_5_EAST = 'urn:ogc:def:crs:EPSG::2218';

    /**
     * Scoresbysund 1952 / Greenland zone 6 east
     * Extent: Greenland - east coast onshore - between 68°N and 69°N
     * Historically also found with coordinate system axis abbreviations N/E (CS code 4501); second axis has
     * abbreviation E but is positive to the west.
     */
    public const EPSG_SCORESBYSUND_1952_GREENLAND_ZONE_6_EAST = 'urn:ogc:def:crs:EPSG::2221';

    /**
     * Segara (Jakarta) / NEIEZ
     * Extent: Indonesia - Kalimantan - onshore east coastal area including Mahakam delta coastal and offshore shelf
     * areas
     * Replaced by Greenwich-based Segara / NEIEZ (CRS code 3000).
     */
    public const EPSG_SEGARA_JAKARTA_NEIEZ = 'urn:ogc:def:crs:EPSG::5329';

    /**
     * Segara / NEIEZ
     * Extent: Indonesia - Kalimantan - onshore east coastal area including Mahakam delta coastal and offshore shelf
     * areas.
     */
    public const EPSG_SEGARA_NEIEZ = 'urn:ogc:def:crs:EPSG::3000';

    /**
     * Segara / UTM zone 50S
     * Extent: Indonesia - east Kalimantan - Mahakam delta coastal and offshore shelf areas.
     */
    public const EPSG_SEGARA_UTM_ZONE_50S = 'urn:ogc:def:crs:EPSG::2933';

    /**
     * Selvagem Grande / UTM zone 28N
     * Extent: Portugal - Selvagens islands (Madeira province) - onshore.
     */
    public const EPSG_SELVAGEM_GRANDE_UTM_ZONE_28N = 'urn:ogc:def:crs:EPSG::2943';

    /**
     * ShAb07 Grid
     * Extent: UK - on or related to the rail route from Shrewsbury to Aberystwyth
     * Defined through transformation ETRS89 to ShAb07-IRF (1) (code 10186) and map projection ShAb07-TM (code 10187).
     * Emulates the ShAb07 Snake projection applied to ETRS89 as realized through OSNet 2009.
     */
    public const EPSG_SHAB07_GRID = 'urn:ogc:def:crs:EPSG::10188';

    /**
     * Sibun Gorge 1922 / Colony Grid
     * Extent: Belize - onshore.
     */
    public const EPSG_SIBUN_GORGE_1922_COLONY_GRID = 'urn:ogc:def:crs:EPSG::5589';

    /**
     * Sierra Leone 1924 / New Colony Grid
     * Extent: Sierra Leone - Freetown Peninsula
     * Replaces the Sierra Leone 1924 / Colony Grid. New grid is 422.3 ft west and 112.1 ft south of old grid.
     * Ellipsoid semi-major axis (a)=20926201 Gold Coast feet; 1 Gold Coast foot = 0.3047997101815 m.
     */
    public const EPSG_SIERRA_LEONE_1924_NEW_COLONY_GRID = 'urn:ogc:def:crs:EPSG::2159';

    /**
     * Sierra Leone 1924 / New War Office Grid
     * Extent: Sierra Leone - Freetown Peninsula
     * Replaces the Sierra Leone War Office Grid. New grid is 422.3 ft west and 112.1 ft south of old grid. Ellipsoid
     * semi-major axis (a)=20926201 Gold Coast feet; 1 Gold Coast foot = 0.3047997101815 m.
     */
    public const EPSG_SIERRA_LEONE_1924_NEW_WAR_OFFICE_GRID = 'urn:ogc:def:crs:EPSG::2160';

    /**
     * Sierra Leone 1968 / UTM zone 28N
     * Extent: Sierra Leone - onshore west of 12°W
     * Replaces Sierra Leone 1960 / UTM zone 28N. The 1968 readjustment coordinates are within 3m of the 1960
     * provisional adjustment.
     */
    public const EPSG_SIERRA_LEONE_1968_UTM_ZONE_28N = 'urn:ogc:def:crs:EPSG::2161';

    /**
     * Sierra Leone 1968 / UTM zone 29N
     * Extent: Sierra Leone - onshore east of 12°W
     * Replaces Sierra Leone 1960 / UTM zone 29N. The 1968 readjustment coordinates are within 3m of the 1960
     * provisional adjustment.
     */
    public const EPSG_SIERRA_LEONE_1968_UTM_ZONE_29N = 'urn:ogc:def:crs:EPSG::2162';

    /**
     * Sister Islands National Grid 1961
     * Extent: Cayman Islands - Little Cayman and Cayman Brac.
     */
    public const EPSG_SISTER_ISLANDS_NATIONAL_GRID_1961 = 'urn:ogc:def:crs:EPSG::6129';

    /**
     * Slovenia 1996 / Slovene National Grid
     * Extent: Slovenia
     * Replaces D48/GK (CRS code 3787).
     */
    public const EPSG_SLOVENIA_1996_SLOVENE_NATIONAL_GRID = 'urn:ogc:def:crs:EPSG::3794';

    /**
     * Slovenia 1996 / UTM zone 33N
     * Extent: Slovenia
     * May be taken as approximation for WGS 84 / UTM zone 33N for applications with 1m accuracy. D96/TM (CRS code
     * 3794) used for non-military purposes.
     */
    public const EPSG_SLOVENIA_1996_UTM_ZONE_33N = 'urn:ogc:def:crs:EPSG::8687';

    /**
     * South East Island 1943 / UTM zone 40N
     * Extent: Seychelles - Mahe, Silhouette, North, Aride Island, Praslin, La Digue and Frigate islands including
     * adjacent smaller granitic islands on the Seychelles Bank, Bird Island and Denis Island.
     */
    public const EPSG_SOUTH_EAST_ISLAND_1943_UTM_ZONE_40N = 'urn:ogc:def:crs:EPSG::6915';

    /**
     * South Yemen / Gauss-Kruger zone 8
     * Extent: Yemen - South Yemen onshore mainland west of 48°E.
     */
    public const EPSG_SOUTH_YEMEN_GAUSS_KRUGER_ZONE_8 = 'urn:ogc:def:crs:EPSG::2395';

    /**
     * South Yemen / Gauss-Kruger zone 9
     * Extent: Yemen - South Yemen onshore mainland east of 48°E.
     */
    public const EPSG_SOUTH_YEMEN_GAUSS_KRUGER_ZONE_9 = 'urn:ogc:def:crs:EPSG::2396';

    /**
     * St. Helena Tritan / SHLG(Tritan)
     * Extent: St Helena, Ascension and Tristan da Cunha - St Helena Island - onshore
     * Replaced by SHMG2015 (CRS code 7887) from 2015.
     */
    public const EPSG_ST_HELENA_TRITAN_SHLG_TRITAN = 'urn:ogc:def:crs:EPSG::7882';

    /**
     * St. Helena Tritan / UTM zone 30S
     * Extent: St Helena, Ascension and Tristan da Cunha - St Helena Island - onshore
     * Replaced by SHMG2015 (CRS code 7887) from 2015.
     */
    public const EPSG_ST_HELENA_TRITAN_UTM_ZONE_30S = 'urn:ogc:def:crs:EPSG::7883';

    /**
     * St. Kitts 1955 / British West Indies Grid
     * Extent: St Kitts and Nevis - onshore.
     */
    public const EPSG_ST_KITTS_1955_BRITISH_WEST_INDIES_GRID = 'urn:ogc:def:crs:EPSG::2005';

    /**
     * St. Lucia 1955 / British West Indies Grid
     * Extent: St Lucia - onshore.
     */
    public const EPSG_ST_LUCIA_1955_BRITISH_WEST_INDIES_GRID = 'urn:ogc:def:crs:EPSG::2006';

    /**
     * St. Stephen Grid (Ferro)
     * Extent: Austria - Lower Austria. Czechia - Moravia and Czech Silesia.
     */
    public const EPSG_ST_STEPHEN_GRID_FERRO = 'urn:ogc:def:crs:EPSG::8045';

    /**
     * St. Vincent 45 / British West Indies Grid
     * Extent: St Vincent and the northern Grenadine Islands - onshore.
     */
    public const EPSG_ST_VINCENT_45_BRITISH_WEST_INDIES_GRID = 'urn:ogc:def:crs:EPSG::2007';

    /**
     * TC(1948) / UTM zone 39N
     * Extent: UAE - Abu Dhabi onshore west of 54°E.
     */
    public const EPSG_TC_1948_UTM_ZONE_39N = 'urn:ogc:def:crs:EPSG::30339';

    /**
     * TC(1948) / UTM zone 40N
     * Extent: UAE - Abu Dhabi onshore east of 54°E; Dubai onshore.
     */
    public const EPSG_TC_1948_UTM_ZONE_40N = 'urn:ogc:def:crs:EPSG::30340';

    /**
     * TGD2005 / Tonga Map Grid
     * Extent: Tonga.
     */
    public const EPSG_TGD2005_TONGA_MAP_GRID = 'urn:ogc:def:crs:EPSG::5887';

    /**
     * TM65 / Irish Grid
     * Extent: Ireland - onshore
     * Not used in Northern Ireland. Replaced by TM75 / Irish Grid (code 29903) in 1975.
     */
    public const EPSG_TM65_IRISH_GRID = 'urn:ogc:def:crs:EPSG::29902';

    /**
     * TM75 / Irish Grid
     * Extent: Ireland - onshore. UK - Northern Ireland (Ulster) - onshore
     * Replaces both OSNI 1952 / Irish National Grid (code 29901) and TM65 / Irish Grid (code 29902) from 1975.
     * Replaced by IRENET95 / Irish Transverse Mercator (code 2157) from 1/1/2001.
     */
    public const EPSG_TM75_IRISH_GRID = 'urn:ogc:def:crs:EPSG::29903';

    /**
     * TPEN11 Grid
     * Extent: UK - on or related to the Trans-Pennine rail route from Liverpool via Manchester to Bradford and Leeds
     * The CRS's definition through transformation ETRS89 to TPEN11-IRF (1) (code 9365) and map projection TPEN11-TM
     * (code 9366) emulates the combined TPEN11 Snake and TPEN11ext Snake projections applied to ETRS89 as realized
     * through OSNet 2009 CORS.
     */
    public const EPSG_TPEN11_GRID = 'urn:ogc:def:crs:EPSG::9367';

    /**
     * TUREF / 3-degree Gauss-Kruger zone 10
     * Extent: Turkey - between 28°30'E and 31°30'E, onshore
     * Also found with truncated false easting - see TUREF / TM30 (code 5254).
     */
    public const EPSG_TUREF_3_DEGREE_GAUSS_KRUGER_ZONE_10 = 'urn:ogc:def:crs:EPSG::5270';

    /**
     * TUREF / 3-degree Gauss-Kruger zone 11
     * Extent: Turkey - between 31°30'E and 34°30'E, onshore
     * Also found with truncated false easting - see TUREF / TM33 (code 5255).
     */
    public const EPSG_TUREF_3_DEGREE_GAUSS_KRUGER_ZONE_11 = 'urn:ogc:def:crs:EPSG::5271';

    /**
     * TUREF / 3-degree Gauss-Kruger zone 12
     * Extent: Turkey - between 34°30'E and 37°30'E, onshore
     * Also found with truncated false easting - see TUREF / TM36 (code 5256).
     */
    public const EPSG_TUREF_3_DEGREE_GAUSS_KRUGER_ZONE_12 = 'urn:ogc:def:crs:EPSG::5272';

    /**
     * TUREF / 3-degree Gauss-Kruger zone 13
     * Extent: Turkey - between 37°30'E and 40°30'E, onshore
     * Also found with truncated false easting - see TUREF / TM39 (code 5257).
     */
    public const EPSG_TUREF_3_DEGREE_GAUSS_KRUGER_ZONE_13 = 'urn:ogc:def:crs:EPSG::5273';

    /**
     * TUREF / 3-degree Gauss-Kruger zone 14
     * Extent: Turkey - between 40°30'E and 43°30'E, onshore
     * Also found with truncated false easting - see TUREF / TM42 (code 5258).
     */
    public const EPSG_TUREF_3_DEGREE_GAUSS_KRUGER_ZONE_14 = 'urn:ogc:def:crs:EPSG::5274';

    /**
     * TUREF / 3-degree Gauss-Kruger zone 15
     * Extent: Turkey - east of 43°30'E
     * Also found with truncated false easting - see TUREF / TM45 (code 5259).
     */
    public const EPSG_TUREF_3_DEGREE_GAUSS_KRUGER_ZONE_15 = 'urn:ogc:def:crs:EPSG::5275';

    /**
     * TUREF / 3-degree Gauss-Kruger zone 9
     * Extent: Turkey - west of 28°30'E, onshore
     * Also found with truncated false easting - see TUREF / TM27 (code 5253).
     */
    public const EPSG_TUREF_3_DEGREE_GAUSS_KRUGER_ZONE_9 = 'urn:ogc:def:crs:EPSG::5269';

    /**
     * TUREF / LAEA Europe
     * Extent: Turkey
     * At applicable scales and usages, may be considered consistent with ETRS89-extended / LAEA Europe (CRS code
     * 3035): see CT 9049.
     */
    public const EPSG_TUREF_LAEA_EUROPE = 'urn:ogc:def:crs:EPSG::5636';

    /**
     * TUREF / LCC Europe
     * Extent: Turkey
     * At applicable scales (1:500,000 and smaller) may be considered consistent with ETRS89-extended / LCC Europe (CRS
     * code 3034): see CT 9050.
     */
    public const EPSG_TUREF_LCC_EUROPE = 'urn:ogc:def:crs:EPSG::5637';

    /**
     * TUREF / TM27
     * Extent: Turkey - west of 28°30'E, onshore
     * Also found with zone number prefix to false easting - see TUREF / 3-degree Gauss-Kruger zone 9 (code 5269).
     */
    public const EPSG_TUREF_TM27 = 'urn:ogc:def:crs:EPSG::5253';

    /**
     * TUREF / TM30
     * Extent: Turkey - between 28°30'E and 31°30'E, onshore
     * Also found with zone number prefix to false easting - see TUREF / 3-degree Gauss-Kruger zone 10 (code 5270).
     */
    public const EPSG_TUREF_TM30 = 'urn:ogc:def:crs:EPSG::5254';

    /**
     * TUREF / TM33
     * Extent: Turkey - between 31°30'E and 34°30'E, onshore
     * Also found with zone number prefix to false easting - see TUREF / 3-degree Gauss-Kruger zone 11 (code 5271).
     */
    public const EPSG_TUREF_TM33 = 'urn:ogc:def:crs:EPSG::5255';

    /**
     * TUREF / TM36
     * Extent: Turkey - between 34°30'E and 37°30'E, onshore
     * Also found with zone number prefix to false easting - see TUREF / 3-degree Gauss-Kruger zone 12 (code 5272).
     */
    public const EPSG_TUREF_TM36 = 'urn:ogc:def:crs:EPSG::5256';

    /**
     * TUREF / TM39
     * Extent: Turkey - between 37°30'E and 40°30'E, onshore
     * Also found with zone number prefix to false easting - see TUREF / 3-degree Gauss-Kruger zone 13 (code 5273).
     */
    public const EPSG_TUREF_TM39 = 'urn:ogc:def:crs:EPSG::5257';

    /**
     * TUREF / TM42
     * Extent: Turkey - between 40°30'E and 43°30'E, onshore
     * Also found with zone number prefix to false easting - see TUREF / 3-degree Gauss-Kruger zone 14 (code 5274).
     */
    public const EPSG_TUREF_TM42 = 'urn:ogc:def:crs:EPSG::5258';

    /**
     * TUREF / TM45
     * Extent: Turkey - east of 43°30'E
     * Also found with zone number prefix to false easting - see TUREF / 3-degree Gauss-Kruger zone 15 (code 5275).
     */
    public const EPSG_TUREF_TM45 = 'urn:ogc:def:crs:EPSG::5259';

    /**
     * TWD67 / TM2 zone 119
     * Extent: Taiwan, Republic of China - onshore - Penghu (Pescadores) Islands
     * Except for cadastral use, replaced by TWD97 / TM2 zone 119 (CRS code 3825).
     */
    public const EPSG_TWD67_TM2_ZONE_119 = 'urn:ogc:def:crs:EPSG::3827';

    /**
     * TWD67 / TM2 zone 121
     * Extent: Taiwan, Republic of China - onshore - Taiwan Island
     * Except for cadastral use, replaced by TWD97 / TM2 zone 121 (CRS code 3826).
     */
    public const EPSG_TWD67_TM2_ZONE_121 = 'urn:ogc:def:crs:EPSG::3828';

    /**
     * TWD97 / TM2 zone 119
     * Extent: Taiwan, Republic of China - between 118°E and 120°E, - Penghu (Pescadores) Islands
     * Except for cadastral use, replaces TWD67 / TM2 zone 119 (CRS code 3827).
     */
    public const EPSG_TWD97_TM2_ZONE_119 = 'urn:ogc:def:crs:EPSG::3825';

    /**
     * TWD97 / TM2 zone 121
     * Extent: Taiwan, Republic of China - between 120°E and 122°E, - Taiwan Island
     * Except for cadastral use, replaces TWD67 / TM2 zone 121 (CRS code 3828).
     */
    public const EPSG_TWD97_TM2_ZONE_121 = 'urn:ogc:def:crs:EPSG::3826';

    /**
     * Tahaa 54 / UTM zone 5S
     * Extent: French Polynesia - Society Islands - Bora Bora, Huahine, Raiatea and Tahaa
     * Replaced by RGPF / UTM zone 5S, CRS code 3296.
     */
    public const EPSG_TAHAA_54_UTM_ZONE_5S = 'urn:ogc:def:crs:EPSG::2977';

    /**
     * Tahiti 52 / UTM zone 6S
     * Extent: French Polynesia - Society Islands - Moorea and Tahiti
     * Replaced by Tahiti 79 / UTM zone 6S (CRS code 3304) in Tahiti and Moorea 87 / UTM zone 6S (code 3305) in Moorea.
     */
    public const EPSG_TAHITI_52_UTM_ZONE_6S = 'urn:ogc:def:crs:EPSG::2976';

    /**
     * Tahiti 79 / UTM zone 6S
     * Extent: French Polynesia - Society Islands - Tahiti
     * Replaces Tahiti 52 / UTM zone 6S (CRS code 2976) in Tahiti. Replaced by RGPF / UTM zone 6S, CRS code 3297.
     */
    public const EPSG_TAHITI_79_UTM_ZONE_6S = 'urn:ogc:def:crs:EPSG::3304';

    /**
     * Tananarive (Paris) / Laborde Grid
     * Extent: Madagascar - onshore
     * See Tananarive / Laborde Grid (CRS code 8441) for equivalent referenced to Greenwich. May be approximated by
     * Tananarive (Paris) / Laborde Grid approximation - see CRS code 29702.
     */
    public const EPSG_TANANARIVE_PARIS_LABORDE_GRID = 'urn:ogc:def:crs:EPSG::29701';

    /**
     * Tananarive (Paris) / Laborde Grid approximation
     * Extent: Madagascar - onshore
     * See projection remarks.
     */
    public const EPSG_TANANARIVE_PARIS_LABORDE_GRID_APPROXIMATION = 'urn:ogc:def:crs:EPSG::29702';

    /**
     * Tananarive / Laborde Grid
     * Extent: Madagascar - onshore
     * See Tananarive (Paris) / Laborde Grid (CRS code 29701) for original definition in grads with respect to the
     * Paris meridian. This is equivalent.
     */
    public const EPSG_TANANARIVE_LABORDE_GRID = 'urn:ogc:def:crs:EPSG::8441';

    /**
     * Tananarive / UTM zone 38S
     * Extent: Madagascar - nearshore west of 48°E.
     */
    public const EPSG_TANANARIVE_UTM_ZONE_38S = 'urn:ogc:def:crs:EPSG::29738';

    /**
     * Tananarive / UTM zone 39S
     * Extent: Madagascar - nearshore east of 48°E.
     */
    public const EPSG_TANANARIVE_UTM_ZONE_39S = 'urn:ogc:def:crs:EPSG::29739';

    /**
     * Tapi Aike / Argentina 1
     * Extent: Argentina - Santa Cruz province south of approximately 50°20'S and west of 70°30'W.
     */
    public const EPSG_TAPI_AIKE_ARGENTINA_1 = 'urn:ogc:def:crs:EPSG::9249';

    /**
     * Tapi Aike / Argentina 2
     * Extent: Argentina - Santa Cruz province south of approximately 50°20'S and east of 70°30'W.
     */
    public const EPSG_TAPI_AIKE_ARGENTINA_2 = 'urn:ogc:def:crs:EPSG::9250';

    /**
     * Tete / UTM zone 36S
     * Extent: Mozambique - onshore west of 36°E.
     */
    public const EPSG_TETE_UTM_ZONE_36S = 'urn:ogc:def:crs:EPSG::2736';

    /**
     * Tete / UTM zone 37S
     * Extent: Mozambique - onshore east of 36°E.
     */
    public const EPSG_TETE_UTM_ZONE_37S = 'urn:ogc:def:crs:EPSG::2737';

    /**
     * Timbalai 1948 / RSO Borneo (ch)
     * Extent: Brunei; Malaysia - East Malaysia (Sabah; Sarawak)
     * Adopts ellipsoid metric conversion of 39.370147 inches per metre. Replaced by metric projection version (CRS
     * code 29873). See also foot version (CRS code 29872) for Shell ops in E Malaysia.
     */
    public const EPSG_TIMBALAI_1948_RSO_BORNEO_CH = 'urn:ogc:def:crs:EPSG::29871';

    /**
     * Timbalai 1948 / RSO Borneo (ftSe)
     * Extent: Malaysia - East Malaysia (Sabah; Sarawak)
     * Used by Shell in East Malaysia. Original projection definition in chains (1 chain = 66 feet) - see CRS code
     * 29871. See also CRS code 29873 for metric version.
     */
    public const EPSG_TIMBALAI_1948_RSO_BORNEO_FTSE = 'urn:ogc:def:crs:EPSG::29872';

    /**
     * Timbalai 1948 / RSO Borneo (m)
     * Extent: Brunei; Malaysia - East Malaysia (Sabah; Sarawak)
     * Originally defined in chains of 792 inches, see CRS 29871 and 29872. Adopts Sears 1922 conversion of 39.370147
     * inches per metre. Replaced by CRS 3376 in East Malaysia and CRS 5247 in Brunei. See also CRS 29874 used by the
     * Sarawak Land and Survey Dept.
     */
    public const EPSG_TIMBALAI_1948_RSO_BORNEO_M = 'urn:ogc:def:crs:EPSG::29873';

    /**
     * Timbalai 1948 / RSO Sarawak LSD (m)
     * Extent: Malaysia - East Malaysia - Sarawak onshore
     * Used by the Land and Survey Department, Sarawak, Malaysia. Modified from Timbalai 1948 / RSO Borneo (m) CRS code
     * 29873 by adding 2 million to the false easting and 5 million to the false northing.
     */
    public const EPSG_TIMBALAI_1948_RSO_SARAWAK_LSD_M = 'urn:ogc:def:crs:EPSG::29874';

    /**
     * Timbalai 1948 / UTM zone 49N
     * Extent: Brunei - offshore west of 114°E; Malaysia - East Malaysia (Sarawak) west of 114°E).
     */
    public const EPSG_TIMBALAI_1948_UTM_ZONE_49N = 'urn:ogc:def:crs:EPSG::29849';

    /**
     * Timbalai 1948 / UTM zone 50N
     * Extent: Brunei east of 114°E; Malaysia - East Malaysia (Sabah, Sarawak) east of 114°E).
     */
    public const EPSG_TIMBALAI_1948_UTM_ZONE_50N = 'urn:ogc:def:crs:EPSG::29850';

    /**
     * Tokyo / Japan Plane Rectangular CS I
     * Extent: Japan - onshore - Kyushu west of approximately 130°E - Nagasaki-ken; islands of Kagoshima-ken between
     * 27°N and 32°N and between 128°18'E and 130°E (between 128°18'E and 30°13'E for Amami islands)
     * Replaced by JGD2000 / Japan Plane Rectangular CS I (code 2443) from April 2002.
     */
    public const EPSG_TOKYO_JAPAN_PLANE_RECTANGULAR_CS_I = 'urn:ogc:def:crs:EPSG::30161';

    /**
     * Tokyo / Japan Plane Rectangular CS II
     * Extent: Japan - onshore - Kyushu east of approximately 130°E - Fukuoka-ken; Saga-ken; Kumamoto-ken; Oita-ken;
     * Miyazaki-ken; Kagoshima-ken (except for area within Japan Plane Rectangular Coordinate System zone I)
     * Replaced by JGD2000 / Japan Plane Rectangular CS II (code 2444) from April 2002.
     */
    public const EPSG_TOKYO_JAPAN_PLANE_RECTANGULAR_CS_II = 'urn:ogc:def:crs:EPSG::30162';

    /**
     * Tokyo / Japan Plane Rectangular CS III
     * Extent: Japan - onshore - Honshu west of approximately 133°15'E - Yamaguchi-ken; Shimane-ken; Hiroshima-ken
     * Replaced by JGD2000 / Japan Plane Rectangular CS III (code 2445) from April 2002.
     */
    public const EPSG_TOKYO_JAPAN_PLANE_RECTANGULAR_CS_III = 'urn:ogc:def:crs:EPSG::30163';

    /**
     * Tokyo / Japan Plane Rectangular CS IV
     * Extent: Japan - onshore - Shikoku - Kagawa-ken; Ehime-ken; Tokushima-ken; Kochi-ken
     * Replaced by JGD2000 / Japan Plane Rectangular CS IV (code 2446) from April 2002.
     */
    public const EPSG_TOKYO_JAPAN_PLANE_RECTANGULAR_CS_IV = 'urn:ogc:def:crs:EPSG::30164';

    /**
     * Tokyo / Japan Plane Rectangular CS IX
     * Extent: Japan - onshore - Honshu - Tokyo-to. (Excludes offshore island areas of Tokyo-to covered by Japan Plane
     * Rectangular Coordinate System zones XIV, XVIII and XIX)
     * Replaced by JGD2000 / Japan Plane Rectangular CS IX (code 2451) from April 2002.
     */
    public const EPSG_TOKYO_JAPAN_PLANE_RECTANGULAR_CS_IX = 'urn:ogc:def:crs:EPSG::30169';

    /**
     * Tokyo / Japan Plane Rectangular CS V
     * Extent: Japan - onshore - Honshu between approximately 133°15'E and 135°10'E - Hyogo-ken; Tottori-ken;
     * Okayama-ken
     * Replaced by JGD2000 / Japan Plane Rectangular CS V (code 2447) from April 2002.
     */
    public const EPSG_TOKYO_JAPAN_PLANE_RECTANGULAR_CS_V = 'urn:ogc:def:crs:EPSG::30165';

    /**
     * Tokyo / Japan Plane Rectangular CS VI
     * Extent: Japan - onshore - Honshu between approximately 135°10'E and 136°45'E - Kyoto-fu; Osaka-fu; Fukui-ken;
     * Shiga-ken; Mie-ken; Nara-ken; Wakayama-ken
     * Replaced by JGD2000 / Japan Plane Rectangular CS VI (code 2448) from April 2002.
     */
    public const EPSG_TOKYO_JAPAN_PLANE_RECTANGULAR_CS_VI = 'urn:ogc:def:crs:EPSG::30166';

    /**
     * Tokyo / Japan Plane Rectangular CS VII
     * Extent: Japan - onshore - Honshu between approximately 136°15'E and 137°45'E - Ishikawa-ken; Toyama-ken;
     * Gifu-ken; Aichi-ken
     * Replaced by JGD2000 / Japan Plane Rectangular CS VII (code 2449) from April 2002.
     */
    public const EPSG_TOKYO_JAPAN_PLANE_RECTANGULAR_CS_VII = 'urn:ogc:def:crs:EPSG::30167';

    /**
     * Tokyo / Japan Plane Rectangular CS VIII
     * Extent: Japan - onshore - Honshu between approximately 137°45'E and 139°E - Niigata-ken; Nagano-ken;
     * Yamanashi-ken; Shizuoka-ken
     * Replaced by JGD2000 / Japan Plane Rectangular CS VIII (code 2450) from April 2002.
     */
    public const EPSG_TOKYO_JAPAN_PLANE_RECTANGULAR_CS_VIII = 'urn:ogc:def:crs:EPSG::30168';

    /**
     * Tokyo / Japan Plane Rectangular CS X
     * Extent: Japan - onshore - Honshu north of 38°N approximately - Aomori-ken; Akita-ken; Yamagata-ken; Iwate-ken;
     * Miyagi-ken
     * Replaced by JGD2000 / Japan Plane Rectangular CS X (code 2452) from April 2002.
     */
    public const EPSG_TOKYO_JAPAN_PLANE_RECTANGULAR_CS_X = 'urn:ogc:def:crs:EPSG::30170';

    /**
     * Tokyo / Japan Plane Rectangular CS XI
     * Extent: Japan - onshore - Hokkaido west of approximately 141°E - Otaru city; Hakodate city; Date city; Usu-gun
     * and Abuta-gun of Iburi-shicho; Hiyama-shicho; Shiribeshi-shicho; Oshima-shicho
     * Replaced by JGD2000 / Japan Plane Rectangular CS XI (code 2453) from April 2002.
     */
    public const EPSG_TOKYO_JAPAN_PLANE_RECTANGULAR_CS_XI = 'urn:ogc:def:crs:EPSG::30171';

    /**
     * Tokyo / Japan Plane Rectangular CS XII
     * Extent: Japan - onshore - Hokkaido between approximately 141°E and 143°E - Sapporo city; Asahikawa city;
     * Wakkanai city; Rumoi city; Bibai city; Yubari city; Iwamizawa city; Tomakomai city; Muroran city; Shibetsu city;
     * Nayoro city; Ashibetsu city; Akabira city; Mikasa city; Takikawa city; Sunagawa city; Ebetsu city; Chitose city;
     * Utashinai city; Fukagawa city; Monbetsu city; Furano city; Noboribetsu city; Eniwa city; Ishikari-shicho;
     * Monbetsu-gun of Abashiri-shicho; Kamikawa-shicho; Soya-shicho; Hidaka-shicho; Iburi-shicho (except Usu-gun and
     * Abuta-gun); Sorachi-shicho; Rumoi-shicho
     * Replaced by JGD2000 / Japan Plane Rectangular CS XII (code 2454) from April 2002.
     */
    public const EPSG_TOKYO_JAPAN_PLANE_RECTANGULAR_CS_XII = 'urn:ogc:def:crs:EPSG::30172';

    /**
     * Tokyo / Japan Plane Rectangular CS XIII
     * Extent: Japan - onshore - Hokkaido east of approximately 143°E - Kitami city; Obihiro city; Kushiro city;
     * Abashiri city; Nemuro city; Nemuro-shicho; Kushiro-shicho; Abashiri-shicho (except Monbetsu-gun); Tokachi-shicho
     * Replaced by JGD2000 / Japan Plane Rectangular CS XIII (code 2455) from April 2002.
     */
    public const EPSG_TOKYO_JAPAN_PLANE_RECTANGULAR_CS_XIII = 'urn:ogc:def:crs:EPSG::30173';

    /**
     * Tokyo / Japan Plane Rectangular CS XIV
     * Extent: Japan - onshore - Tokyo-to south of 28°N and between 140°30'E and 143°E
     * Although legally defined as Tokyo datum the accuracy of the geodetic connection to mainland Japan is low.
     * Replaced by JGD2000 / Japan Plane Rectangular CS XIV (code 2456) from April 2002.
     */
    public const EPSG_TOKYO_JAPAN_PLANE_RECTANGULAR_CS_XIV = 'urn:ogc:def:crs:EPSG::30174';

    /**
     * Tokyo / Japan Plane Rectangular CS XIX
     * Extent: Japan - onshore - Tokyo-to south of 28°N and east of 143°E - Minamitori-shima (Marcus Island)
     * Although legally defined as Tokyo datum the accuracy of the geodetic connection to mainland Japan is low.
     * Replaced by JGD2000 / Japan Plane Rectangular CS XIX (code 2461) from April 2002.
     */
    public const EPSG_TOKYO_JAPAN_PLANE_RECTANGULAR_CS_XIX = 'urn:ogc:def:crs:EPSG::30179';

    /**
     * Tokyo / Japan Plane Rectangular CS XV
     * Extent: Japan - onshore - Okinawa-ken between 126°E and 130°E
     * Replaced by JGD2000 / Japan Plane Rectangular CS XV (code 2457) from April 2002.
     */
    public const EPSG_TOKYO_JAPAN_PLANE_RECTANGULAR_CS_XV = 'urn:ogc:def:crs:EPSG::30175';

    /**
     * Tokyo / Japan Plane Rectangular CS XVI
     * Extent: Japan - onshore - Okinawa-ken west of 126°E
     * Replaced by JGD2000 / Japan Plane Rectangular CS XVI (code 2458) from April 2002.
     */
    public const EPSG_TOKYO_JAPAN_PLANE_RECTANGULAR_CS_XVI = 'urn:ogc:def:crs:EPSG::30176';

    /**
     * Tokyo / Japan Plane Rectangular CS XVII
     * Extent: Japan - onshore Okinawa-ken east of 130°E
     * Although legally defined as Tokyo datum the accuracy of the geodetic connection to mainland Japan is low.
     * Replaced by JGD2000 / Japan Plane Rectangular CS XVII (code 2459) from April 2002.
     */
    public const EPSG_TOKYO_JAPAN_PLANE_RECTANGULAR_CS_XVII = 'urn:ogc:def:crs:EPSG::30177';

    /**
     * Tokyo / Japan Plane Rectangular CS XVIII
     * Extent: Japan - onshore - Tokyo-to south of 28°N and west of 140°30'E
     * Although legally defined as Tokyo datum the accuracy of the geodetic connection to mainland Japan is low.
     * Replaced by JGD2000 / Japan Plane Rectangular CS XVIII (code 2460) from April 2002.
     */
    public const EPSG_TOKYO_JAPAN_PLANE_RECTANGULAR_CS_XVIII = 'urn:ogc:def:crs:EPSG::30178';

    /**
     * Tokyo / UTM zone 51N
     * Extent: Japan - onshore west of 126°E
     * Replaced by JGD2000 / UTM zone 51N (code 3097).
     */
    public const EPSG_TOKYO_UTM_ZONE_51N = 'urn:ogc:def:crs:EPSG::3092';

    /**
     * Tokyo / UTM zone 52N
     * Extent: Japan - onshore between 126°E and 132°E
     * Replaced by JGD2000 / UTM zone 52N (code 3098).
     */
    public const EPSG_TOKYO_UTM_ZONE_52N = 'urn:ogc:def:crs:EPSG::3093';

    /**
     * Tokyo / UTM zone 53N
     * Extent: Japan - onshore between 132°E and 138°E
     * Replaced by JGD2000 / UTM zone 53N (code 3099).
     */
    public const EPSG_TOKYO_UTM_ZONE_53N = 'urn:ogc:def:crs:EPSG::3094';

    /**
     * Tokyo / UTM zone 54N
     * Extent: Japan - onshore between 138°E and 144°E
     * Replaced by JGD2000 / UTM zone 54N (code 3100).
     */
    public const EPSG_TOKYO_UTM_ZONE_54N = 'urn:ogc:def:crs:EPSG::3095';

    /**
     * Tokyo / UTM zone 55N
     * Extent: Japan - onshore east of 144°E
     * Replaced by JGD2000 / UTM zone 55N (code 3101).
     */
    public const EPSG_TOKYO_UTM_ZONE_55N = 'urn:ogc:def:crs:EPSG::3096';

    /**
     * Tokyo 1892 / Korea Central Belt
     * Extent: Democratic People's Republic of Korea (North Korea) and Republic of Korea (South Korea) - onshore
     * between 126°E and 128°E
     * Sometimes incorrectly assumed to be Tokyo 1918 / Korea Central Belt, a system that was never put into use. In
     * South Korea, replaced by Korean 1985 / Central Belt and Korean 1985 / Central Belt Jeju (CRS codes 2097 and
     * 5168).
     */
    public const EPSG_TOKYO_1892_KOREA_CENTRAL_BELT = 'urn:ogc:def:crs:EPSG::5170';

    /**
     * Tokyo 1892 / Korea East Belt
     * Extent: Democratic People's Republic of Korea (North Korea) and Republic of Korea (South Korea) - onshore
     * between 128°E and 130°E
     * Sometimes incorrectly assumed to be Tokyo 1918 / Korea East Belt, a system that was never put into use. In South
     * Korea, replaced by Korean 1985 / East Belt (CRS code 2096).
     */
    public const EPSG_TOKYO_1892_KOREA_EAST_BELT = 'urn:ogc:def:crs:EPSG::5171';

    /**
     * Tokyo 1892 / Korea East Sea Belt
     * Extent: Democratic People's Republic of Korea (North Korea) and Republic of Korea (South Korea) - onshore east
     * of 130°E
     * Sometimes incorrectly assumed to be Tokyo 1918 / Korea East Sea Belt, a system that was never put into use. In
     * South Korea, replaced by Korean 1985 / East Sea Belt (CRS code 5167).
     */
    public const EPSG_TOKYO_1892_KOREA_EAST_SEA_BELT = 'urn:ogc:def:crs:EPSG::5172';

    /**
     * Tokyo 1892 / Korea West Belt
     * Extent: Democratic People's Republic of Korea (North Korea) and Republic of Korea (South Korea) - onshore west
     * of 126°E
     * Sometimes incorrectly assumed to be Tokyo 1918 / Korea West Belt, a system that was never put into use. In South
     * Korea, replaced by Korean 1985 / West Belt (CRS code 2098).
     */
    public const EPSG_TOKYO_1892_KOREA_WEST_BELT = 'urn:ogc:def:crs:EPSG::5169';

    /**
     * Trinidad 1903 / Trinidad Grid
     * Extent: Trinidad and Tobago - Trinidad.
     */
    public const EPSG_TRINIDAD_1903_TRINIDAD_GRID = 'urn:ogc:def:crs:EPSG::30200';

    /**
     * Trinidad 1903 / Trinidad Grid (ftCla)
     * Extent: Trinidad and Tobago - Trinidad
     * Foot version of Trinidad 1903 / Trinidad Grid (code 30200) used by some US-based companies including Amoco
     * Trinidad.
     */
    public const EPSG_TRINIDAD_1903_TRINIDAD_GRID_FTCLA = 'urn:ogc:def:crs:EPSG::2314';

    /**
     * UCS-2000 / Gauss-Kruger CM 21E
     * Extent: Ukraine - west of 24°E
     * Truncated form of UCS-2000 / Gauss-Kruger zone 4 (CRS code 5562).
     */
    public const EPSG_UCS_2000_GAUSS_KRUGER_CM_21E = 'urn:ogc:def:crs:EPSG::5566';

    /**
     * UCS-2000 / Gauss-Kruger CM 27E
     * Extent: Ukraine - between 24°E and 30°E
     * Truncated form of UCS-2000 / Gauss-Kruger zone 5 (CRS code 5563).
     */
    public const EPSG_UCS_2000_GAUSS_KRUGER_CM_27E = 'urn:ogc:def:crs:EPSG::5567';

    /**
     * UCS-2000 / Gauss-Kruger CM 33E
     * Extent: Ukraine - between 30°E and 36°E
     * Truncated form of UCS-2000 / Gauss-Kruger zone 6 (CRS code 5564).
     */
    public const EPSG_UCS_2000_GAUSS_KRUGER_CM_33E = 'urn:ogc:def:crs:EPSG::5568';

    /**
     * UCS-2000 / Gauss-Kruger CM 39E
     * Extent: Ukraine - east of 36°E
     * Truncated form of UCS-2000 / Gauss-Kruger zone 7 (CRS code 5565).
     */
    public const EPSG_UCS_2000_GAUSS_KRUGER_CM_39E = 'urn:ogc:def:crs:EPSG::5569';

    /**
     * UCS-2000 / Gauss-Kruger zone 4
     * Extent: Ukraine - west of 24°E
     * Adopted 1st January 2007, replacing S-42 system. Also found with truncated false easting - see UCS-2000 /
     * Gauss-Kruger CM 21E (CRS code 5566).
     */
    public const EPSG_UCS_2000_GAUSS_KRUGER_ZONE_4 = 'urn:ogc:def:crs:EPSG::5562';

    /**
     * UCS-2000 / Gauss-Kruger zone 5
     * Extent: Ukraine - between 24°E and 30°E
     * Adopted 1st January 2007, replacing S-42 system. Also found with truncated false easting - see UCS-2000 /
     * Gauss-Kruger CM 27E (CRS code 5567).
     */
    public const EPSG_UCS_2000_GAUSS_KRUGER_ZONE_5 = 'urn:ogc:def:crs:EPSG::5563';

    /**
     * UCS-2000 / Gauss-Kruger zone 6
     * Extent: Ukraine - between 30°E and 36°E
     * Adopted 1st January 2007, replacing S-42 system. Also found with truncated false easting - see UCS-2000 /
     * Gauss-Kruger CM 33E (CRS code 5568).
     */
    public const EPSG_UCS_2000_GAUSS_KRUGER_ZONE_6 = 'urn:ogc:def:crs:EPSG::5564';

    /**
     * UCS-2000 / Gauss-Kruger zone 7
     * Extent: Ukraine - east of 36°E
     * Adopted 1st January 2007, replacing S-42 system. Also found with truncated false easting - see UCS-2000 /
     * Gauss-Kruger CM 39E (code CRS 5569).
     */
    public const EPSG_UCS_2000_GAUSS_KRUGER_ZONE_7 = 'urn:ogc:def:crs:EPSG::5565';

    /**
     * UCS-2000 / LCS-01 Crimea
     * Extent: Ukraine - Crimea autonomous region.
     */
    public const EPSG_UCS_2000_LCS_01_CRIMEA = 'urn:ogc:def:crs:EPSG::9831';

    /**
     * UCS-2000 / LCS-05 Vinnytsia
     * Extent: Ukraine - Vinnytsia region (oblast).
     */
    public const EPSG_UCS_2000_LCS_05_VINNYTSIA = 'urn:ogc:def:crs:EPSG::9832';

    /**
     * UCS-2000 / LCS-07 Volyn
     * Extent: Ukraine - Volyn region (oblast).
     */
    public const EPSG_UCS_2000_LCS_07_VOLYN = 'urn:ogc:def:crs:EPSG::9833';

    /**
     * UCS-2000 / LCS-12 Dnipropetrovsk
     * Extent: Ukraine - Dnipropetrovsk region (oblast).
     */
    public const EPSG_UCS_2000_LCS_12_DNIPROPETROVSK = 'urn:ogc:def:crs:EPSG::9834';

    /**
     * UCS-2000 / LCS-14 Donetsk
     * Extent: Ukraine - Donetsk region (oblast).
     */
    public const EPSG_UCS_2000_LCS_14_DONETSK = 'urn:ogc:def:crs:EPSG::9835';

    /**
     * UCS-2000 / LCS-18 Zhytomyr
     * Extent: Ukraine - Zhytomyr region (oblast).
     */
    public const EPSG_UCS_2000_LCS_18_ZHYTOMYR = 'urn:ogc:def:crs:EPSG::9836';

    /**
     * UCS-2000 / LCS-21 Zakarpattia
     * Extent: Ukraine - Zakarpattia (Zakarpatska) region (Transcarpathia oblast).
     */
    public const EPSG_UCS_2000_LCS_21_ZAKARPATTIA = 'urn:ogc:def:crs:EPSG::9837';

    /**
     * UCS-2000 / LCS-23 Zaporizhzhia
     * Extent: Ukraine - Zaporizhzhia region (oblast).
     */
    public const EPSG_UCS_2000_LCS_23_ZAPORIZHZHIA = 'urn:ogc:def:crs:EPSG::9838';

    /**
     * UCS-2000 / LCS-26 Ivano-Frankivsk
     * Extent: Ukraine - Ivano-Frankivsk region (oblast).
     */
    public const EPSG_UCS_2000_LCS_26_IVANO_FRANKIVSK = 'urn:ogc:def:crs:EPSG::9839';

    /**
     * UCS-2000 / LCS-32 Kyiv region
     * Extent: Ukraine - Kyiv (Kiev) region (oblast)
     * Order #74 defines separate LCSs for Kyiv city and Kyiv oblast; they have different extents but the same map
     * projection. For Kyiv city see CRS code 9864.
     */
    public const EPSG_UCS_2000_LCS_32_KYIV_REGION = 'urn:ogc:def:crs:EPSG::9821';

    /**
     * UCS-2000 / LCS-35 Kirovohrad
     * Extent: Ukraine - Kirovohrad region (oblast).
     */
    public const EPSG_UCS_2000_LCS_35_KIROVOHRAD = 'urn:ogc:def:crs:EPSG::9840';

    /**
     * UCS-2000 / LCS-44 Luhansk
     * Extent: Ukraine - Luhansk region (oblast).
     */
    public const EPSG_UCS_2000_LCS_44_LUHANSK = 'urn:ogc:def:crs:EPSG::9841';

    /**
     * UCS-2000 / LCS-46 Lviv
     * Extent: Ukraine - Lviv region (oblast).
     */
    public const EPSG_UCS_2000_LCS_46_LVIV = 'urn:ogc:def:crs:EPSG::9851';

    /**
     * UCS-2000 / LCS-48 Mykolaiv
     * Extent: Ukraine - Mykolaiv region (oblast).
     */
    public const EPSG_UCS_2000_LCS_48_MYKOLAIV = 'urn:ogc:def:crs:EPSG::9852';

    /**
     * UCS-2000 / LCS-51 Odessa
     * Extent: Ukraine - Odessa region (oblast).
     */
    public const EPSG_UCS_2000_LCS_51_ODESSA = 'urn:ogc:def:crs:EPSG::9853';

    /**
     * UCS-2000 / LCS-53 Poltava
     * Extent: Ukraine - Poltava region (oblast).
     */
    public const EPSG_UCS_2000_LCS_53_POLTAVA = 'urn:ogc:def:crs:EPSG::9854';

    /**
     * UCS-2000 / LCS-56 Rivne
     * Extent: Ukraine - Rivne region (oblast)
     * Order #74 defines seperate LCSs for Rivne and Khmelnytsky oblasts; they have different extents but the same map
     * projection. For Khmelnytsky oblast see CRS code 9855.
     */
    public const EPSG_UCS_2000_LCS_56_RIVNE = 'urn:ogc:def:crs:EPSG::9855';

    /**
     * UCS-2000 / LCS-59 Sumy
     * Extent: Ukraine - Sumy region (oblast).
     */
    public const EPSG_UCS_2000_LCS_59_SUMY = 'urn:ogc:def:crs:EPSG::9856';

    /**
     * UCS-2000 / LCS-61 Ternopil
     * Extent: Ukraine - Ternopil region (oblast).
     */
    public const EPSG_UCS_2000_LCS_61_TERNOPIL = 'urn:ogc:def:crs:EPSG::9857';

    /**
     * UCS-2000 / LCS-63 Kharkiv
     * Extent: Ukraine - Kharkiv region (oblast).
     */
    public const EPSG_UCS_2000_LCS_63_KHARKIV = 'urn:ogc:def:crs:EPSG::9858';

    /**
     * UCS-2000 / LCS-65 Kherson
     * Extent: Ukraine - Kherson region (oblast).
     */
    public const EPSG_UCS_2000_LCS_65_KHERSON = 'urn:ogc:def:crs:EPSG::9859';

    /**
     * UCS-2000 / LCS-68 Khmelnytsky
     * Extent: Ukraine - Khmelnytskyi region (oblast)
     * Order #74 defines seperate LCSs for Khmelnytsky and Rivne oblasts; they have different extents but the same map
     * projection. For Rivne oblast see CRS code 9855.
     */
    public const EPSG_UCS_2000_LCS_68_KHMELNYTSKY = 'urn:ogc:def:crs:EPSG::9860';

    /**
     * UCS-2000 / LCS-71 Cherkasy
     * Extent: Ukraine - Cherkasy region (oblast).
     */
    public const EPSG_UCS_2000_LCS_71_CHERKASY = 'urn:ogc:def:crs:EPSG::9861';

    /**
     * UCS-2000 / LCS-73 Chernivtsi
     * Extent: Ukraine - Chernivtsi region (oblast).
     */
    public const EPSG_UCS_2000_LCS_73_CHERNIVTSI = 'urn:ogc:def:crs:EPSG::9862';

    /**
     * UCS-2000 / LCS-74 Chernihiv
     * Extent: Ukraine - Chernihiv region (oblast).
     */
    public const EPSG_UCS_2000_LCS_74_CHERNIHIV = 'urn:ogc:def:crs:EPSG::9863';

    /**
     * UCS-2000 / LCS-80 Kyiv city
     * Extent: Ukraine - Kyiv (Kiev) city
     * Order #74 defines separate LCSs for Kyiv city and Kyiv oblast; they have different extents but the same map
     * projection. For Kyiv region see CRS code 9821.
     */
    public const EPSG_UCS_2000_LCS_80_KYIV_CITY = 'urn:ogc:def:crs:EPSG::9864';

    /**
     * UCS-2000 / LCS-85 Sevastopol
     * Extent: Ukraine - Sevastopol (Sebastopol) city.
     */
    public const EPSG_UCS_2000_LCS_85_SEVASTOPOL = 'urn:ogc:def:crs:EPSG::9865';

    /**
     * UCS-2000 / Ukraine TM zone 10
     * Extent: Ukraine - between 28°30'E and 31°30'E.
     */
    public const EPSG_UCS_2000_UKRAINE_TM_ZONE_10 = 'urn:ogc:def:crs:EPSG::6384';

    /**
     * UCS-2000 / Ukraine TM zone 11
     * Extent: Ukraine - between 31°30'E and 34°30'E.
     */
    public const EPSG_UCS_2000_UKRAINE_TM_ZONE_11 = 'urn:ogc:def:crs:EPSG::6385';

    /**
     * UCS-2000 / Ukraine TM zone 12
     * Extent: Ukraine - between 34°30'E and 37°30'E.
     */
    public const EPSG_UCS_2000_UKRAINE_TM_ZONE_12 = 'urn:ogc:def:crs:EPSG::6386';

    /**
     * UCS-2000 / Ukraine TM zone 13
     * Extent: Ukraine - east of 37°30'E.
     */
    public const EPSG_UCS_2000_UKRAINE_TM_ZONE_13 = 'urn:ogc:def:crs:EPSG::6387';

    /**
     * UCS-2000 / Ukraine TM zone 7
     * Extent: Ukraine - west of 22°30'E.
     */
    public const EPSG_UCS_2000_UKRAINE_TM_ZONE_7 = 'urn:ogc:def:crs:EPSG::6381';

    /**
     * UCS-2000 / Ukraine TM zone 8
     * Extent: Ukraine - between 22°30'E and 25°30'E.
     */
    public const EPSG_UCS_2000_UKRAINE_TM_ZONE_8 = 'urn:ogc:def:crs:EPSG::6382';

    /**
     * UCS-2000 / Ukraine TM zone 9
     * Extent: Ukraine - between 25°30'E and 28°30'E.
     */
    public const EPSG_UCS_2000_UKRAINE_TM_ZONE_9 = 'urn:ogc:def:crs:EPSG::6383';

    /**
     * VN-2000 / TM-3 103-00
     * Extent: Vietnam - Dien Bien and Lai Chau provinces.
     */
    public const EPSG_VN_2000_TM_3_103_00 = 'urn:ogc:def:crs:EPSG::9205';

    /**
     * VN-2000 / TM-3 104-00
     * Extent: Vietnam - Son La province.
     */
    public const EPSG_VN_2000_TM_3_104_00 = 'urn:ogc:def:crs:EPSG::9206';

    /**
     * VN-2000 / TM-3 104-30
     * Extent: Vietnam - Ca Mau and Kien Giang provinces.
     */
    public const EPSG_VN_2000_TM_3_104_30 = 'urn:ogc:def:crs:EPSG::9207';

    /**
     * VN-2000 / TM-3 104-45
     * Extent: Vietnam - An Giang, Lao Cai, Nghe An, Phu Tho and Yen Bai provinces.
     */
    public const EPSG_VN_2000_TM_3_104_45 = 'urn:ogc:def:crs:EPSG::9208';

    /**
     * VN-2000 / TM-3 105-30
     * Extent: Vietnam - Bac Ninh, Ha Giang, Ha Tinh, Hai Duong, Hung Yen, Nam Dinh, Soc Trang, Tay Ninh, Thai Binh,
     * Tra Vinh and Vinh Long provinces.
     */
    public const EPSG_VN_2000_TM_3_105_30 = 'urn:ogc:def:crs:EPSG::9209';

    /**
     * VN-2000 / TM-3 105-45
     * Extent: Vietnam - Hai Phong and Ho Chi Minh cities; Ben Tre, Binh Duong, Cao Bang, Long An and Tien Giang
     * provinces.
     */
    public const EPSG_VN_2000_TM_3_105_45 = 'urn:ogc:def:crs:EPSG::9210';

    /**
     * VN-2000 / TM-3 106-00
     * Extent: Vietnam - Hoa Binh, Quang Binh and Tuyen Quang provinces.
     */
    public const EPSG_VN_2000_TM_3_106_00 = 'urn:ogc:def:crs:EPSG::9211';

    /**
     * VN-2000 / TM-3 106-15
     * Extent: Vietnam - Binh Phuoc and Quang Tri provinces.
     */
    public const EPSG_VN_2000_TM_3_106_15 = 'urn:ogc:def:crs:EPSG::9212';

    /**
     * VN-2000 / TM-3 106-30
     * Extent: Vietnam - Bac Kan and Thai Nguyen provinces.
     */
    public const EPSG_VN_2000_TM_3_106_30 = 'urn:ogc:def:crs:EPSG::9213';

    /**
     * VN-2000 / TM-3 107-00
     * Extent: Vietnam - Bac Giang and Thua Thien-Hue provinces.
     */
    public const EPSG_VN_2000_TM_3_107_00 = 'urn:ogc:def:crs:EPSG::9214';

    /**
     * VN-2000 / TM-3 107-15
     * Extent: Vietnam - Lang Son province.
     */
    public const EPSG_VN_2000_TM_3_107_15 = 'urn:ogc:def:crs:EPSG::9215';

    /**
     * VN-2000 / TM-3 107-30
     * Extent: Vietnam - Kon Tum province.
     */
    public const EPSG_VN_2000_TM_3_107_30 = 'urn:ogc:def:crs:EPSG::9216';

    /**
     * VN-2000 / TM-3 107-45
     * Extent: Vietnam - Quang Ninh province; Da Nang municipality and Quang Nam province; Ba Ria-Vung Tau, Dong Nai
     * and Lam Dong provinces.
     */
    public const EPSG_VN_2000_TM_3_107_45 = 'urn:ogc:def:crs:EPSG::5899';

    /**
     * VN-2000 / TM-3 108-15
     * Extent: Vietnam - Binh Dinh, Khanh Hoa and Ninh Thuan provinces.
     */
    public const EPSG_VN_2000_TM_3_108_15 = 'urn:ogc:def:crs:EPSG::9217';

    /**
     * VN-2000 / TM-3 108-30
     * Extent: Vietnam - Binh Thuan, Dak Lak, Dak Nong, Gia Lai and Phu Yen provinces.
     */
    public const EPSG_VN_2000_TM_3_108_30 = 'urn:ogc:def:crs:EPSG::9218';

    /**
     * VN-2000 / TM-3 zone 481
     * Extent: Vietnam - onshore west of 103°30'E.
     */
    public const EPSG_VN_2000_TM_3_ZONE_481 = 'urn:ogc:def:crs:EPSG::5896';

    /**
     * VN-2000 / TM-3 zone 482
     * Extent: Vietnam - between 103°30'E and 106°30'E, onshore, Vietnam - Ha Noi city, Ha Nam, Ha Tay, Ninh Binh,
     * Thanh Hoa and Vinh Phuc provinces; Can Tho city, Bac Lieu, Dong Thap and Hau Giang provinces.
     */
    public const EPSG_VN_2000_TM_3_ZONE_482 = 'urn:ogc:def:crs:EPSG::5897';

    /**
     * VN-2000 / TM-3 zone 491
     * Extent: Vietnam - onshore east of 106°30'E, Vietnam - Quang Ngai province.
     */
    public const EPSG_VN_2000_TM_3_ZONE_491 = 'urn:ogc:def:crs:EPSG::5898';

    /**
     * VN-2000 / UTM zone 48N
     * Extent: Vietnam - onshore west of 108°E
     * Replaces Hanoi 1972 / Gauss-Kruger zone 18 (CRS code 2044).
     */
    public const EPSG_VN_2000_UTM_ZONE_48N = 'urn:ogc:def:crs:EPSG::3405';

    /**
     * VN-2000 / UTM zone 49N
     * Extent: Vietnam - onshore east of 108°E
     * Replaces Hanoi 1972 / Gauss-Kruger zone 19 (CRS code 2045).
     */
    public const EPSG_VN_2000_UTM_ZONE_49N = 'urn:ogc:def:crs:EPSG::3406';

    /**
     * Vanua Levu 1915 / Vanua Levu Grid
     * Extent: Fiji - Vanua Levu and Taveuni
     * For topographic mapping, replaced by Fiji 1956 / UTM (CRS codes 3141-42). For other purposes, replaced by Fiji
     * 1986 / Fiji Map Grid (CRS code 3460).
     */
    public const EPSG_VANUA_LEVU_1915_VANUA_LEVU_GRID = 'urn:ogc:def:crs:EPSG::3139';

    /**
     * Viti Levu 1912 / Viti Levu Grid
     * Extent: Fiji - Viti Levu island
     * For topographic mapping, replaced by Fiji 1956 / UTM (CRS codes 3141-42). For other purposes, replaced by Fiji
     * 1986 / Fiji Map Grid (CRS code 3460).
     */
    public const EPSG_VITI_LEVU_1912_VITI_LEVU_GRID = 'urn:ogc:def:crs:EPSG::3140';

    /**
     * Voirol 1875 / Nord Algerie (ancienne)
     * Extent: Algeria - onshore north of 38.5 grads North (34°39'N)
     * Replaced by Nord Sahara 1959 / Voirol Unifie Nord (code 30791). The appropriate usage of CRSs using the Voirol
     * 1875 and 1879 datums is lost in antiquity. They differ by about 9 metres. Oil industry references to one could
     * in reality be to either.
     */
    public const EPSG_VOIROL_1875_NORD_ALGERIE_ANCIENNE = 'urn:ogc:def:crs:EPSG::30491';

    /**
     * Voirol 1875 / Sud Algerie (ancienne)
     * Extent: Algeria - 35.6 grads to 38.5 grads North (32°N to 34°39'N)
     * Replaced by Nord Sahara 1959 / Voirol Unifie Sud (code 30792). The appropriate usage of CRSs using the Voirol
     * 1875 and 1879 datums is lost in antiquity. They differ by about 9 metres. Oil industry references to one could
     * in reality be to either.
     */
    public const EPSG_VOIROL_1875_SUD_ALGERIE_ANCIENNE = 'urn:ogc:def:crs:EPSG::30492';

    /**
     * Voirol 1879 / Nord Algerie (ancienne)
     * Extent: Algeria - onshore north of 38.5 grads North (34°39'N)
     * Replaced by Nord Sahara 1959 / Voirol Unifie Nord (code 30791). The appropriate usage of CRSs using the Voirol
     * 1875 and 1879 datums is lost in antiquity. They differ by about 9 metres. Oil industry references to one could
     * in reality be to either.
     */
    public const EPSG_VOIROL_1879_NORD_ALGERIE_ANCIENNE = 'urn:ogc:def:crs:EPSG::30493';

    /**
     * Voirol 1879 / Sud Algerie (ancienne)
     * Extent: Algeria - 35.6 grads to 38.5 grads North (32°N to 34°39'N)
     * Replaced by Nord Sahara 1959 / Voirol Unifie Sud (code 30792). The appropriate usage of CRSs using the Voirol
     * 1875 and 1879 datums is lost in antiquity. They differ by about 9 metres. Oil industry references to one could
     * in reality be to either.
     */
    public const EPSG_VOIROL_1879_SUD_ALGERIE_ANCIENNE = 'urn:ogc:def:crs:EPSG::30494';

    /**
     * WC05 Grid
     * Extent: UK - on or related to the west coast mainline rail route from London (Euston) via Carlisle to Glasgow
     * Defined through transformation ETRS89 to WC05-IRF (1) (code 10629) and map projection WC05-TM (code 10631).
     * Emulates the WC05 Snake projection applied to ETRS89 as realized through OSNet 2009.
     */
    public const EPSG_WC05_GRID = 'urn:ogc:def:crs:EPSG::10632';

    /**
     * WGS 72 / UTM zone 10N
     * Extent: Between 126°W and 120°W, northern hemisphere between equator and 84°N.
     */
    public const EPSG_WGS_72_UTM_ZONE_10N = 'urn:ogc:def:crs:EPSG::32210';

    /**
     * WGS 72 / UTM zone 10S
     * Extent: Between 126°W and 120°W, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_72_UTM_ZONE_10S = 'urn:ogc:def:crs:EPSG::32310';

    /**
     * WGS 72 / UTM zone 11N
     * Extent: Between 120°W and 114°W, northern hemisphere between equator and 84°N.
     */
    public const EPSG_WGS_72_UTM_ZONE_11N = 'urn:ogc:def:crs:EPSG::32211';

    /**
     * WGS 72 / UTM zone 11S
     * Extent: Between 120°W and 114°W, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_72_UTM_ZONE_11S = 'urn:ogc:def:crs:EPSG::32311';

    /**
     * WGS 72 / UTM zone 12N
     * Extent: Between 114°W and 108°W, northern hemisphere between equator and 84°N.
     */
    public const EPSG_WGS_72_UTM_ZONE_12N = 'urn:ogc:def:crs:EPSG::32212';

    /**
     * WGS 72 / UTM zone 12S
     * Extent: Between 114°W and 108°W, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_72_UTM_ZONE_12S = 'urn:ogc:def:crs:EPSG::32312';

    /**
     * WGS 72 / UTM zone 13N
     * Extent: Between 108°W and 102°W, northern hemisphere between equator and 84°N.
     */
    public const EPSG_WGS_72_UTM_ZONE_13N = 'urn:ogc:def:crs:EPSG::32213';

    /**
     * WGS 72 / UTM zone 13S
     * Extent: Between 108°W and 102°W, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_72_UTM_ZONE_13S = 'urn:ogc:def:crs:EPSG::32313';

    /**
     * WGS 72 / UTM zone 14N
     * Extent: Between 102°W and 96°W, northern hemisphere between equator and 84°N.
     */
    public const EPSG_WGS_72_UTM_ZONE_14N = 'urn:ogc:def:crs:EPSG::32214';

    /**
     * WGS 72 / UTM zone 14S
     * Extent: Between 102°W and 96°W, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_72_UTM_ZONE_14S = 'urn:ogc:def:crs:EPSG::32314';

    /**
     * WGS 72 / UTM zone 15N
     * Extent: Between 96°W and 90°W, northern hemisphere between equator and 84°N.
     */
    public const EPSG_WGS_72_UTM_ZONE_15N = 'urn:ogc:def:crs:EPSG::32215';

    /**
     * WGS 72 / UTM zone 15S
     * Extent: Between 96°W and 90°W, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_72_UTM_ZONE_15S = 'urn:ogc:def:crs:EPSG::32315';

    /**
     * WGS 72 / UTM zone 16N
     * Extent: Between 90°W and 84°W, northern hemisphere between equator and 84°N.
     */
    public const EPSG_WGS_72_UTM_ZONE_16N = 'urn:ogc:def:crs:EPSG::32216';

    /**
     * WGS 72 / UTM zone 16S
     * Extent: Between 90°W and 84°W, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_72_UTM_ZONE_16S = 'urn:ogc:def:crs:EPSG::32316';

    /**
     * WGS 72 / UTM zone 17N
     * Extent: Between 84°W and 78°W, northern hemisphere between equator and 84°N.
     */
    public const EPSG_WGS_72_UTM_ZONE_17N = 'urn:ogc:def:crs:EPSG::32217';

    /**
     * WGS 72 / UTM zone 17S
     * Extent: Between 84°W and 78°W, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_72_UTM_ZONE_17S = 'urn:ogc:def:crs:EPSG::32317';

    /**
     * WGS 72 / UTM zone 18N
     * Extent: Between 78°W and 72°W, northern hemisphere between equator and 84°N.
     */
    public const EPSG_WGS_72_UTM_ZONE_18N = 'urn:ogc:def:crs:EPSG::32218';

    /**
     * WGS 72 / UTM zone 18S
     * Extent: Between 78°W and 72°W, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_72_UTM_ZONE_18S = 'urn:ogc:def:crs:EPSG::32318';

    /**
     * WGS 72 / UTM zone 19N
     * Extent: Between 72°W and 66°W, northern hemisphere between equator and 84°N.
     */
    public const EPSG_WGS_72_UTM_ZONE_19N = 'urn:ogc:def:crs:EPSG::32219';

    /**
     * WGS 72 / UTM zone 19S
     * Extent: Between 72°W and 66°W, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_72_UTM_ZONE_19S = 'urn:ogc:def:crs:EPSG::32319';

    /**
     * WGS 72 / UTM zone 1N
     * Extent: Between 180°W and 174°W, northern hemisphere between equator and 84°N.
     */
    public const EPSG_WGS_72_UTM_ZONE_1N = 'urn:ogc:def:crs:EPSG::32201';

    /**
     * WGS 72 / UTM zone 1S
     * Extent: Between 180°W to 174°W, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_72_UTM_ZONE_1S = 'urn:ogc:def:crs:EPSG::32301';

    /**
     * WGS 72 / UTM zone 20N
     * Extent: Between 66°W and 60°W, northern hemisphere between equator and 84°N.
     */
    public const EPSG_WGS_72_UTM_ZONE_20N = 'urn:ogc:def:crs:EPSG::32220';

    /**
     * WGS 72 / UTM zone 20S
     * Extent: Between 66°W and 60°W, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_72_UTM_ZONE_20S = 'urn:ogc:def:crs:EPSG::32320';

    /**
     * WGS 72 / UTM zone 21N
     * Extent: Between 60°W and 54°W, northern hemisphere between equator and 84°N.
     */
    public const EPSG_WGS_72_UTM_ZONE_21N = 'urn:ogc:def:crs:EPSG::32221';

    /**
     * WGS 72 / UTM zone 21S
     * Extent: Between 60°W and 54°W, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_72_UTM_ZONE_21S = 'urn:ogc:def:crs:EPSG::32321';

    /**
     * WGS 72 / UTM zone 22N
     * Extent: Between 54°W and 48°W, northern hemisphere between equator and 84°N.
     */
    public const EPSG_WGS_72_UTM_ZONE_22N = 'urn:ogc:def:crs:EPSG::32222';

    /**
     * WGS 72 / UTM zone 22S
     * Extent: Between 54°W and 48°W, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_72_UTM_ZONE_22S = 'urn:ogc:def:crs:EPSG::32322';

    /**
     * WGS 72 / UTM zone 23N
     * Extent: Between 48°W and 42°W, northern hemisphere between equator and 84°N.
     */
    public const EPSG_WGS_72_UTM_ZONE_23N = 'urn:ogc:def:crs:EPSG::32223';

    /**
     * WGS 72 / UTM zone 23S
     * Extent: Between 48°W and 42°W, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_72_UTM_ZONE_23S = 'urn:ogc:def:crs:EPSG::32323';

    /**
     * WGS 72 / UTM zone 24N
     * Extent: Between 42°W and 36°W, northern hemisphere between equator and 84°N.
     */
    public const EPSG_WGS_72_UTM_ZONE_24N = 'urn:ogc:def:crs:EPSG::32224';

    /**
     * WGS 72 / UTM zone 24S
     * Extent: Between 42°W and 36°W, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_72_UTM_ZONE_24S = 'urn:ogc:def:crs:EPSG::32324';

    /**
     * WGS 72 / UTM zone 25N
     * Extent: Between 36°W and 30°W, northern hemisphere between equator and 84°N.
     */
    public const EPSG_WGS_72_UTM_ZONE_25N = 'urn:ogc:def:crs:EPSG::32225';

    /**
     * WGS 72 / UTM zone 25S
     * Extent: Between 36°W and 30°W, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_72_UTM_ZONE_25S = 'urn:ogc:def:crs:EPSG::32325';

    /**
     * WGS 72 / UTM zone 26N
     * Extent: Between 30°W and 24°W, northern hemisphere between equator and 84°N.
     */
    public const EPSG_WGS_72_UTM_ZONE_26N = 'urn:ogc:def:crs:EPSG::32226';

    /**
     * WGS 72 / UTM zone 26S
     * Extent: Between 30°W and 24°W, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_72_UTM_ZONE_26S = 'urn:ogc:def:crs:EPSG::32326';

    /**
     * WGS 72 / UTM zone 27N
     * Extent: Between 24°W and 18°W, northern hemisphere between equator and 84°N.
     */
    public const EPSG_WGS_72_UTM_ZONE_27N = 'urn:ogc:def:crs:EPSG::32227';

    /**
     * WGS 72 / UTM zone 27S
     * Extent: Between 24°W and 18°W, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_72_UTM_ZONE_27S = 'urn:ogc:def:crs:EPSG::32327';

    /**
     * WGS 72 / UTM zone 28N
     * Extent: Between 18°W and 12°W, northern hemisphere between equator and 84°N.
     */
    public const EPSG_WGS_72_UTM_ZONE_28N = 'urn:ogc:def:crs:EPSG::32228';

    /**
     * WGS 72 / UTM zone 28S
     * Extent: Between 18°W and 12°W, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_72_UTM_ZONE_28S = 'urn:ogc:def:crs:EPSG::32328';

    /**
     * WGS 72 / UTM zone 29N
     * Extent: Between 12°W and 6°W, northern hemisphere between equator and 84°N.
     */
    public const EPSG_WGS_72_UTM_ZONE_29N = 'urn:ogc:def:crs:EPSG::32229';

    /**
     * WGS 72 / UTM zone 29S
     * Extent: Between 12°W and 6°W, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_72_UTM_ZONE_29S = 'urn:ogc:def:crs:EPSG::32329';

    /**
     * WGS 72 / UTM zone 2N
     * Extent: Between 174°W and 168°W, northern hemisphere between equator and 84°N.
     */
    public const EPSG_WGS_72_UTM_ZONE_2N = 'urn:ogc:def:crs:EPSG::32202';

    /**
     * WGS 72 / UTM zone 2S
     * Extent: Between 174°W and 168°W, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_72_UTM_ZONE_2S = 'urn:ogc:def:crs:EPSG::32302';

    /**
     * WGS 72 / UTM zone 30N
     * Extent: Between 6°W and 0°W, northern hemisphere between equator and 84°N.
     */
    public const EPSG_WGS_72_UTM_ZONE_30N = 'urn:ogc:def:crs:EPSG::32230';

    /**
     * WGS 72 / UTM zone 30S
     * Extent: Between 6°W and 0°W, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_72_UTM_ZONE_30S = 'urn:ogc:def:crs:EPSG::32330';

    /**
     * WGS 72 / UTM zone 31N
     * Extent: Between 0°E and 6°E, northern hemisphere between equator and 84°N.
     */
    public const EPSG_WGS_72_UTM_ZONE_31N = 'urn:ogc:def:crs:EPSG::32231';

    /**
     * WGS 72 / UTM zone 31S
     * Extent: Between 0°E and 6°E, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_72_UTM_ZONE_31S = 'urn:ogc:def:crs:EPSG::32331';

    /**
     * WGS 72 / UTM zone 32N
     * Extent: Between 6°E and 12°E, northern hemisphere between equator and 84°N.
     */
    public const EPSG_WGS_72_UTM_ZONE_32N = 'urn:ogc:def:crs:EPSG::32232';

    /**
     * WGS 72 / UTM zone 32S
     * Extent: Between 6°E and 12°E, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_72_UTM_ZONE_32S = 'urn:ogc:def:crs:EPSG::32332';

    /**
     * WGS 72 / UTM zone 33N
     * Extent: Between 12°E and 18°E, northern hemisphere between equator and 84°N.
     */
    public const EPSG_WGS_72_UTM_ZONE_33N = 'urn:ogc:def:crs:EPSG::32233';

    /**
     * WGS 72 / UTM zone 33S
     * Extent: Between 12°E and 18°E, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_72_UTM_ZONE_33S = 'urn:ogc:def:crs:EPSG::32333';

    /**
     * WGS 72 / UTM zone 34N
     * Extent: Between 18°E and 24°E, northern hemisphere between equator and 84°N.
     */
    public const EPSG_WGS_72_UTM_ZONE_34N = 'urn:ogc:def:crs:EPSG::32234';

    /**
     * WGS 72 / UTM zone 34S
     * Extent: Between 18°E and 24°E, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_72_UTM_ZONE_34S = 'urn:ogc:def:crs:EPSG::32334';

    /**
     * WGS 72 / UTM zone 35N
     * Extent: Between 24°E and 30°E, northern hemisphere between equator and 84°N.
     */
    public const EPSG_WGS_72_UTM_ZONE_35N = 'urn:ogc:def:crs:EPSG::32235';

    /**
     * WGS 72 / UTM zone 35S
     * Extent: Between 24°E and 30°E, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_72_UTM_ZONE_35S = 'urn:ogc:def:crs:EPSG::32335';

    /**
     * WGS 72 / UTM zone 36N
     * Extent: Between 30°E and 36°E, northern hemisphere between equator and 84°N.
     */
    public const EPSG_WGS_72_UTM_ZONE_36N = 'urn:ogc:def:crs:EPSG::32236';

    /**
     * WGS 72 / UTM zone 36S
     * Extent: Between 30°E and 36°E, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_72_UTM_ZONE_36S = 'urn:ogc:def:crs:EPSG::32336';

    /**
     * WGS 72 / UTM zone 37N
     * Extent: Between 36°E and 42°E, northern hemisphere between equator and 84°N.
     */
    public const EPSG_WGS_72_UTM_ZONE_37N = 'urn:ogc:def:crs:EPSG::32237';

    /**
     * WGS 72 / UTM zone 37S
     * Extent: Between 36°E and 42°E, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_72_UTM_ZONE_37S = 'urn:ogc:def:crs:EPSG::32337';

    /**
     * WGS 72 / UTM zone 38N
     * Extent: Between 42°E and 48°E, northern hemisphere between equator and 84°N.
     */
    public const EPSG_WGS_72_UTM_ZONE_38N = 'urn:ogc:def:crs:EPSG::32238';

    /**
     * WGS 72 / UTM zone 38S
     * Extent: Between 42°E and 48°E, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_72_UTM_ZONE_38S = 'urn:ogc:def:crs:EPSG::32338';

    /**
     * WGS 72 / UTM zone 39N
     * Extent: Between 48°E and 54°E, northern hemisphere between equator and 84°N.
     */
    public const EPSG_WGS_72_UTM_ZONE_39N = 'urn:ogc:def:crs:EPSG::32239';

    /**
     * WGS 72 / UTM zone 39S
     * Extent: Between 48°E and 54°E, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_72_UTM_ZONE_39S = 'urn:ogc:def:crs:EPSG::32339';

    /**
     * WGS 72 / UTM zone 3N
     * Extent: Between 168°W and 162°W, northern hemisphere between equator and 84°N.
     */
    public const EPSG_WGS_72_UTM_ZONE_3N = 'urn:ogc:def:crs:EPSG::32203';

    /**
     * WGS 72 / UTM zone 3S
     * Extent: Between 168°W and 162°W, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_72_UTM_ZONE_3S = 'urn:ogc:def:crs:EPSG::32303';

    /**
     * WGS 72 / UTM zone 40N
     * Extent: Between 54°E and 60°E, northern hemisphere between equator and 84°N.
     */
    public const EPSG_WGS_72_UTM_ZONE_40N = 'urn:ogc:def:crs:EPSG::32240';

    /**
     * WGS 72 / UTM zone 40S
     * Extent: Between 54°E and 60°E, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_72_UTM_ZONE_40S = 'urn:ogc:def:crs:EPSG::32340';

    /**
     * WGS 72 / UTM zone 41N
     * Extent: Between 60°E and 66°E, northern hemisphere between equator and 84°N.
     */
    public const EPSG_WGS_72_UTM_ZONE_41N = 'urn:ogc:def:crs:EPSG::32241';

    /**
     * WGS 72 / UTM zone 41S
     * Extent: Between 60°E and 66°E, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_72_UTM_ZONE_41S = 'urn:ogc:def:crs:EPSG::32341';

    /**
     * WGS 72 / UTM zone 42N
     * Extent: Between 66°E and 72°E, northern hemisphere between equator and 84°N.
     */
    public const EPSG_WGS_72_UTM_ZONE_42N = 'urn:ogc:def:crs:EPSG::32242';

    /**
     * WGS 72 / UTM zone 42S
     * Extent: Between 66°E and 72°E, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_72_UTM_ZONE_42S = 'urn:ogc:def:crs:EPSG::32342';

    /**
     * WGS 72 / UTM zone 43N
     * Extent: Between 72°E and 78°E, northern hemisphere between equator and 84°N.
     */
    public const EPSG_WGS_72_UTM_ZONE_43N = 'urn:ogc:def:crs:EPSG::32243';

    /**
     * WGS 72 / UTM zone 43S
     * Extent: Between 72°E and 78°E, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_72_UTM_ZONE_43S = 'urn:ogc:def:crs:EPSG::32343';

    /**
     * WGS 72 / UTM zone 44N
     * Extent: Between 78°E and 84°E, northern hemisphere between equator and 84°N.
     */
    public const EPSG_WGS_72_UTM_ZONE_44N = 'urn:ogc:def:crs:EPSG::32244';

    /**
     * WGS 72 / UTM zone 44S
     * Extent: Between 78°E and 84°E, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_72_UTM_ZONE_44S = 'urn:ogc:def:crs:EPSG::32344';

    /**
     * WGS 72 / UTM zone 45N
     * Extent: Between 84°E and 90°E, northern hemisphere between equator and 84°N.
     */
    public const EPSG_WGS_72_UTM_ZONE_45N = 'urn:ogc:def:crs:EPSG::32245';

    /**
     * WGS 72 / UTM zone 45S
     * Extent: Between 84°E and 90°E, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_72_UTM_ZONE_45S = 'urn:ogc:def:crs:EPSG::32345';

    /**
     * WGS 72 / UTM zone 46N
     * Extent: Between 90°E and 96°E, northern hemisphere between equator and 84°N.
     */
    public const EPSG_WGS_72_UTM_ZONE_46N = 'urn:ogc:def:crs:EPSG::32246';

    /**
     * WGS 72 / UTM zone 46S
     * Extent: Between 90°E and 96°E, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_72_UTM_ZONE_46S = 'urn:ogc:def:crs:EPSG::32346';

    /**
     * WGS 72 / UTM zone 47N
     * Extent: Between 96°E and 102°E, northern hemisphere between equator and 84°N.
     */
    public const EPSG_WGS_72_UTM_ZONE_47N = 'urn:ogc:def:crs:EPSG::32247';

    /**
     * WGS 72 / UTM zone 47S
     * Extent: Between 96°E and 102°E, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_72_UTM_ZONE_47S = 'urn:ogc:def:crs:EPSG::32347';

    /**
     * WGS 72 / UTM zone 48N
     * Extent: Between 102°E and 108°E, northern hemisphere between equator and 84°N.
     */
    public const EPSG_WGS_72_UTM_ZONE_48N = 'urn:ogc:def:crs:EPSG::32248';

    /**
     * WGS 72 / UTM zone 48S
     * Extent: Between 102°E and 108°E, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_72_UTM_ZONE_48S = 'urn:ogc:def:crs:EPSG::32348';

    /**
     * WGS 72 / UTM zone 49N
     * Extent: Between 108°E and 114°E, northern hemisphere between equator and 84°N.
     */
    public const EPSG_WGS_72_UTM_ZONE_49N = 'urn:ogc:def:crs:EPSG::32249';

    /**
     * WGS 72 / UTM zone 49S
     * Extent: Between 108°E and 114°E, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_72_UTM_ZONE_49S = 'urn:ogc:def:crs:EPSG::32349';

    /**
     * WGS 72 / UTM zone 4N
     * Extent: Between 162°W and 156°W, northern hemisphere between equator and 84°N.
     */
    public const EPSG_WGS_72_UTM_ZONE_4N = 'urn:ogc:def:crs:EPSG::32204';

    /**
     * WGS 72 / UTM zone 4S
     * Extent: Between 162°W and 156°W, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_72_UTM_ZONE_4S = 'urn:ogc:def:crs:EPSG::32304';

    /**
     * WGS 72 / UTM zone 50N
     * Extent: Between 114°E and 120°E, northern hemisphere between equator and 84°N.
     */
    public const EPSG_WGS_72_UTM_ZONE_50N = 'urn:ogc:def:crs:EPSG::32250';

    /**
     * WGS 72 / UTM zone 50S
     * Extent: Between 114°E and 120°E, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_72_UTM_ZONE_50S = 'urn:ogc:def:crs:EPSG::32350';

    /**
     * WGS 72 / UTM zone 51N
     * Extent: Between 120°E and 126°E, northern hemisphere between equator and 84°N.
     */
    public const EPSG_WGS_72_UTM_ZONE_51N = 'urn:ogc:def:crs:EPSG::32251';

    /**
     * WGS 72 / UTM zone 51S
     * Extent: Between 120°E and 126°E, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_72_UTM_ZONE_51S = 'urn:ogc:def:crs:EPSG::32351';

    /**
     * WGS 72 / UTM zone 52N
     * Extent: Between 126°E and 132°E, northern hemisphere between equator and 84°N.
     */
    public const EPSG_WGS_72_UTM_ZONE_52N = 'urn:ogc:def:crs:EPSG::32252';

    /**
     * WGS 72 / UTM zone 52S
     * Extent: Between 126°E and 132°E, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_72_UTM_ZONE_52S = 'urn:ogc:def:crs:EPSG::32352';

    /**
     * WGS 72 / UTM zone 53N
     * Extent: Between 132°E and 138°E, northern hemisphere between equator and 84°N.
     */
    public const EPSG_WGS_72_UTM_ZONE_53N = 'urn:ogc:def:crs:EPSG::32253';

    /**
     * WGS 72 / UTM zone 53S
     * Extent: Between 132°E and 138°E, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_72_UTM_ZONE_53S = 'urn:ogc:def:crs:EPSG::32353';

    /**
     * WGS 72 / UTM zone 54N
     * Extent: Between 138°E and 144°E, northern hemisphere between equator and 84°N.
     */
    public const EPSG_WGS_72_UTM_ZONE_54N = 'urn:ogc:def:crs:EPSG::32254';

    /**
     * WGS 72 / UTM zone 54S
     * Extent: Between 138°E and 144°E, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_72_UTM_ZONE_54S = 'urn:ogc:def:crs:EPSG::32354';

    /**
     * WGS 72 / UTM zone 55N
     * Extent: Between 144°E and 150°E, northern hemisphere between equator and 84°N.
     */
    public const EPSG_WGS_72_UTM_ZONE_55N = 'urn:ogc:def:crs:EPSG::32255';

    /**
     * WGS 72 / UTM zone 55S
     * Extent: Between 144°E and 150°E, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_72_UTM_ZONE_55S = 'urn:ogc:def:crs:EPSG::32355';

    /**
     * WGS 72 / UTM zone 56N
     * Extent: Between 150°E and 156°E, northern hemisphere between equator and 84°N.
     */
    public const EPSG_WGS_72_UTM_ZONE_56N = 'urn:ogc:def:crs:EPSG::32256';

    /**
     * WGS 72 / UTM zone 56S
     * Extent: Between 150°E and 156°E, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_72_UTM_ZONE_56S = 'urn:ogc:def:crs:EPSG::32356';

    /**
     * WGS 72 / UTM zone 57N
     * Extent: Between 156°E and 162°E, northern hemisphere between equator and 84°N.
     */
    public const EPSG_WGS_72_UTM_ZONE_57N = 'urn:ogc:def:crs:EPSG::32257';

    /**
     * WGS 72 / UTM zone 57S
     * Extent: Between 156°E and 162°E, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_72_UTM_ZONE_57S = 'urn:ogc:def:crs:EPSG::32357';

    /**
     * WGS 72 / UTM zone 58N
     * Extent: Between 162°E and 168°E, northern hemisphere between equator and 84°N.
     */
    public const EPSG_WGS_72_UTM_ZONE_58N = 'urn:ogc:def:crs:EPSG::32258';

    /**
     * WGS 72 / UTM zone 58S
     * Extent: Between 162°E and 168°E, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_72_UTM_ZONE_58S = 'urn:ogc:def:crs:EPSG::32358';

    /**
     * WGS 72 / UTM zone 59N
     * Extent: Between 168°E and 174°E, northern hemisphere between equator and 84°N.
     */
    public const EPSG_WGS_72_UTM_ZONE_59N = 'urn:ogc:def:crs:EPSG::32259';

    /**
     * WGS 72 / UTM zone 59S
     * Extent: Between 168°E and 174°E, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_72_UTM_ZONE_59S = 'urn:ogc:def:crs:EPSG::32359';

    /**
     * WGS 72 / UTM zone 5N
     * Extent: Between 156°W and 150°W, northern hemisphere between equator and 84°N.
     */
    public const EPSG_WGS_72_UTM_ZONE_5N = 'urn:ogc:def:crs:EPSG::32205';

    /**
     * WGS 72 / UTM zone 5S
     * Extent: Between 156°W and 150°W, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_72_UTM_ZONE_5S = 'urn:ogc:def:crs:EPSG::32305';

    /**
     * WGS 72 / UTM zone 60N
     * Extent: Between 174°E and 180°E, northern hemisphere between equator and 84°N.
     */
    public const EPSG_WGS_72_UTM_ZONE_60N = 'urn:ogc:def:crs:EPSG::32260';

    /**
     * WGS 72 / UTM zone 60S
     * Extent: Between 174°E and 180°E, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_72_UTM_ZONE_60S = 'urn:ogc:def:crs:EPSG::32360';

    /**
     * WGS 72 / UTM zone 6N
     * Extent: Between 150°W and 144°W, northern hemisphere between equator and 84°N.
     */
    public const EPSG_WGS_72_UTM_ZONE_6N = 'urn:ogc:def:crs:EPSG::32206';

    /**
     * WGS 72 / UTM zone 6S
     * Extent: Between 150°W and 144°W, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_72_UTM_ZONE_6S = 'urn:ogc:def:crs:EPSG::32306';

    /**
     * WGS 72 / UTM zone 7N
     * Extent: Between 144°W and 138°W, northern hemisphere between equator and 84°N.
     */
    public const EPSG_WGS_72_UTM_ZONE_7N = 'urn:ogc:def:crs:EPSG::32207';

    /**
     * WGS 72 / UTM zone 7S
     * Extent: Between 144°W and 138°W, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_72_UTM_ZONE_7S = 'urn:ogc:def:crs:EPSG::32307';

    /**
     * WGS 72 / UTM zone 8N
     * Extent: Between 138°W and 132°W, northern hemisphere between equator and 84°N.
     */
    public const EPSG_WGS_72_UTM_ZONE_8N = 'urn:ogc:def:crs:EPSG::32208';

    /**
     * WGS 72 / UTM zone 8S
     * Extent: Between 138°W and 132°W, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_72_UTM_ZONE_8S = 'urn:ogc:def:crs:EPSG::32308';

    /**
     * WGS 72 / UTM zone 9N
     * Extent: Between 132°W and 126°W, northern hemisphere between equator and 84°N.
     */
    public const EPSG_WGS_72_UTM_ZONE_9N = 'urn:ogc:def:crs:EPSG::32209';

    /**
     * WGS 72 / UTM zone 9S
     * Extent: Between 132°W and 126°W, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_72_UTM_ZONE_9S = 'urn:ogc:def:crs:EPSG::32309';

    /**
     * WGS 72BE / South China Sea Lambert
     * Extent: China - offshore South China Sea - Pearl River basin
     * Adopted during the 1980s by western operators of all SCS licence areas. See map projection remarks for ambiguity
     * in definition.
     */
    public const EPSG_WGS_72BE_SOUTH_CHINA_SEA_LAMBERT = 'urn:ogc:def:crs:EPSG::3415';

    /**
     * WGS 72BE / TM 106 NE
     * Extent: Vietnam - offshore - Cuu Long basin and northwestern part of Nam Con Son basin
     * Oil exploration by Total for blocks 10 and 11-1.
     */
    public const EPSG_WGS_72BE_TM_106_NE = 'urn:ogc:def:crs:EPSG::2094';

    /**
     * WGS 72BE / UTM zone 10N
     * Extent: Between 126°W and 120°W, northern hemisphere between equator and 84°N.
     */
    public const EPSG_WGS_72BE_UTM_ZONE_10N = 'urn:ogc:def:crs:EPSG::32410';

    /**
     * WGS 72BE / UTM zone 10S
     * Extent: Between 126°W and 120°W, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_72BE_UTM_ZONE_10S = 'urn:ogc:def:crs:EPSG::32510';

    /**
     * WGS 72BE / UTM zone 11N
     * Extent: Between 120°W and 114°W, northern hemisphere between equator and 84°N.
     */
    public const EPSG_WGS_72BE_UTM_ZONE_11N = 'urn:ogc:def:crs:EPSG::32411';

    /**
     * WGS 72BE / UTM zone 11S
     * Extent: Between 120°W and 114°W, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_72BE_UTM_ZONE_11S = 'urn:ogc:def:crs:EPSG::32511';

    /**
     * WGS 72BE / UTM zone 12N
     * Extent: Between 114°W and 108°W, northern hemisphere between equator and 84°N.
     */
    public const EPSG_WGS_72BE_UTM_ZONE_12N = 'urn:ogc:def:crs:EPSG::32412';

    /**
     * WGS 72BE / UTM zone 12S
     * Extent: Between 114°W and 108°W, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_72BE_UTM_ZONE_12S = 'urn:ogc:def:crs:EPSG::32512';

    /**
     * WGS 72BE / UTM zone 13N
     * Extent: Between 108°W and 102°W, northern hemisphere between equator and 84°N.
     */
    public const EPSG_WGS_72BE_UTM_ZONE_13N = 'urn:ogc:def:crs:EPSG::32413';

    /**
     * WGS 72BE / UTM zone 13S
     * Extent: Between 108°W and 102°W, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_72BE_UTM_ZONE_13S = 'urn:ogc:def:crs:EPSG::32513';

    /**
     * WGS 72BE / UTM zone 14N
     * Extent: Between 102°W and 96°W, northern hemisphere between equator and 84°N.
     */
    public const EPSG_WGS_72BE_UTM_ZONE_14N = 'urn:ogc:def:crs:EPSG::32414';

    /**
     * WGS 72BE / UTM zone 14S
     * Extent: Between 102°W and 96°W, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_72BE_UTM_ZONE_14S = 'urn:ogc:def:crs:EPSG::32514';

    /**
     * WGS 72BE / UTM zone 15N
     * Extent: Between 96°W and 90°W, northern hemisphere between equator and 84°N.
     */
    public const EPSG_WGS_72BE_UTM_ZONE_15N = 'urn:ogc:def:crs:EPSG::32415';

    /**
     * WGS 72BE / UTM zone 15S
     * Extent: Between 96°W and 90°W, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_72BE_UTM_ZONE_15S = 'urn:ogc:def:crs:EPSG::32515';

    /**
     * WGS 72BE / UTM zone 16N
     * Extent: Between 90°W and 84°W, northern hemisphere between equator and 84°N.
     */
    public const EPSG_WGS_72BE_UTM_ZONE_16N = 'urn:ogc:def:crs:EPSG::32416';

    /**
     * WGS 72BE / UTM zone 16S
     * Extent: Between 90°W and 84°W, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_72BE_UTM_ZONE_16S = 'urn:ogc:def:crs:EPSG::32516';

    /**
     * WGS 72BE / UTM zone 17N
     * Extent: Between 84°W and 78°W, northern hemisphere between equator and 84°N.
     */
    public const EPSG_WGS_72BE_UTM_ZONE_17N = 'urn:ogc:def:crs:EPSG::32417';

    /**
     * WGS 72BE / UTM zone 17S
     * Extent: Between 84°W and 78°W, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_72BE_UTM_ZONE_17S = 'urn:ogc:def:crs:EPSG::32517';

    /**
     * WGS 72BE / UTM zone 18N
     * Extent: Between 78°W and 72°W, northern hemisphere between equator and 84°N.
     */
    public const EPSG_WGS_72BE_UTM_ZONE_18N = 'urn:ogc:def:crs:EPSG::32418';

    /**
     * WGS 72BE / UTM zone 18S
     * Extent: Between 78°W and 72°W, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_72BE_UTM_ZONE_18S = 'urn:ogc:def:crs:EPSG::32518';

    /**
     * WGS 72BE / UTM zone 19N
     * Extent: Between 72°W and 66°W, northern hemisphere between equator and 84°N.
     */
    public const EPSG_WGS_72BE_UTM_ZONE_19N = 'urn:ogc:def:crs:EPSG::32419';

    /**
     * WGS 72BE / UTM zone 19S
     * Extent: Between 72°W and 66°W, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_72BE_UTM_ZONE_19S = 'urn:ogc:def:crs:EPSG::32519';

    /**
     * WGS 72BE / UTM zone 1N
     * Extent: Between 180°W and 174°W, northern hemisphere between equator and 84°N.
     */
    public const EPSG_WGS_72BE_UTM_ZONE_1N = 'urn:ogc:def:crs:EPSG::32401';

    /**
     * WGS 72BE / UTM zone 1S
     * Extent: Between 180°W to 174°W, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_72BE_UTM_ZONE_1S = 'urn:ogc:def:crs:EPSG::32501';

    /**
     * WGS 72BE / UTM zone 20N
     * Extent: Between 66°W and 60°W, northern hemisphere between equator and 84°N.
     */
    public const EPSG_WGS_72BE_UTM_ZONE_20N = 'urn:ogc:def:crs:EPSG::32420';

    /**
     * WGS 72BE / UTM zone 20S
     * Extent: Between 66°W and 60°W, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_72BE_UTM_ZONE_20S = 'urn:ogc:def:crs:EPSG::32520';

    /**
     * WGS 72BE / UTM zone 21N
     * Extent: Between 60°W and 54°W, northern hemisphere between equator and 84°N.
     */
    public const EPSG_WGS_72BE_UTM_ZONE_21N = 'urn:ogc:def:crs:EPSG::32421';

    /**
     * WGS 72BE / UTM zone 21S
     * Extent: Between 60°W and 54°W, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_72BE_UTM_ZONE_21S = 'urn:ogc:def:crs:EPSG::32521';

    /**
     * WGS 72BE / UTM zone 22N
     * Extent: Between 54°W and 48°W, northern hemisphere between equator and 84°N.
     */
    public const EPSG_WGS_72BE_UTM_ZONE_22N = 'urn:ogc:def:crs:EPSG::32422';

    /**
     * WGS 72BE / UTM zone 22S
     * Extent: Between 54°W and 48°W, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_72BE_UTM_ZONE_22S = 'urn:ogc:def:crs:EPSG::32522';

    /**
     * WGS 72BE / UTM zone 23N
     * Extent: Between 48°W and 42°W, northern hemisphere between equator and 84°N.
     */
    public const EPSG_WGS_72BE_UTM_ZONE_23N = 'urn:ogc:def:crs:EPSG::32423';

    /**
     * WGS 72BE / UTM zone 23S
     * Extent: Between 48°W and 42°W, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_72BE_UTM_ZONE_23S = 'urn:ogc:def:crs:EPSG::32523';

    /**
     * WGS 72BE / UTM zone 24N
     * Extent: Between 42°W and 36°W, northern hemisphere between equator and 84°N.
     */
    public const EPSG_WGS_72BE_UTM_ZONE_24N = 'urn:ogc:def:crs:EPSG::32424';

    /**
     * WGS 72BE / UTM zone 24S
     * Extent: Between 42°W and 36°W, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_72BE_UTM_ZONE_24S = 'urn:ogc:def:crs:EPSG::32524';

    /**
     * WGS 72BE / UTM zone 25N
     * Extent: Between 36°W and 30°W, northern hemisphere between equator and 84°N.
     */
    public const EPSG_WGS_72BE_UTM_ZONE_25N = 'urn:ogc:def:crs:EPSG::32425';

    /**
     * WGS 72BE / UTM zone 25S
     * Extent: Between 36°W and 30°W, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_72BE_UTM_ZONE_25S = 'urn:ogc:def:crs:EPSG::32525';

    /**
     * WGS 72BE / UTM zone 26N
     * Extent: Between 30°W and 24°W, northern hemisphere between equator and 84°N.
     */
    public const EPSG_WGS_72BE_UTM_ZONE_26N = 'urn:ogc:def:crs:EPSG::32426';

    /**
     * WGS 72BE / UTM zone 26S
     * Extent: Between 30°W and 24°W, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_72BE_UTM_ZONE_26S = 'urn:ogc:def:crs:EPSG::32526';

    /**
     * WGS 72BE / UTM zone 27N
     * Extent: Between 24°W and 18°W, northern hemisphere between equator and 84°N.
     */
    public const EPSG_WGS_72BE_UTM_ZONE_27N = 'urn:ogc:def:crs:EPSG::32427';

    /**
     * WGS 72BE / UTM zone 27S
     * Extent: Between 24°W and 18°W, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_72BE_UTM_ZONE_27S = 'urn:ogc:def:crs:EPSG::32527';

    /**
     * WGS 72BE / UTM zone 28N
     * Extent: Between 18°W and 12°W, northern hemisphere between equator and 84°N.
     */
    public const EPSG_WGS_72BE_UTM_ZONE_28N = 'urn:ogc:def:crs:EPSG::32428';

    /**
     * WGS 72BE / UTM zone 28S
     * Extent: Between 18°W and 12°W, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_72BE_UTM_ZONE_28S = 'urn:ogc:def:crs:EPSG::32528';

    /**
     * WGS 72BE / UTM zone 29N
     * Extent: Between 12°W and 6°W, northern hemisphere between equator and 84°N.
     */
    public const EPSG_WGS_72BE_UTM_ZONE_29N = 'urn:ogc:def:crs:EPSG::32429';

    /**
     * WGS 72BE / UTM zone 29S
     * Extent: Between 12°W and 6°W, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_72BE_UTM_ZONE_29S = 'urn:ogc:def:crs:EPSG::32529';

    /**
     * WGS 72BE / UTM zone 2N
     * Extent: Between 174°W and 168°W, northern hemisphere between equator and 84°N.
     */
    public const EPSG_WGS_72BE_UTM_ZONE_2N = 'urn:ogc:def:crs:EPSG::32402';

    /**
     * WGS 72BE / UTM zone 2S
     * Extent: Between 174°W and 168°W, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_72BE_UTM_ZONE_2S = 'urn:ogc:def:crs:EPSG::32502';

    /**
     * WGS 72BE / UTM zone 30N
     * Extent: Between 6°W and 0°W, northern hemisphere between equator and 84°N.
     */
    public const EPSG_WGS_72BE_UTM_ZONE_30N = 'urn:ogc:def:crs:EPSG::32430';

    /**
     * WGS 72BE / UTM zone 30S
     * Extent: Between 6°W and 0°W, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_72BE_UTM_ZONE_30S = 'urn:ogc:def:crs:EPSG::32530';

    /**
     * WGS 72BE / UTM zone 31N
     * Extent: Between 0°E and 6°E, northern hemisphere between equator and 84°N.
     */
    public const EPSG_WGS_72BE_UTM_ZONE_31N = 'urn:ogc:def:crs:EPSG::32431';

    /**
     * WGS 72BE / UTM zone 31S
     * Extent: Between 0°E and 6°E, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_72BE_UTM_ZONE_31S = 'urn:ogc:def:crs:EPSG::32531';

    /**
     * WGS 72BE / UTM zone 32N
     * Extent: Between 6°E and 12°E, northern hemisphere between equator and 84°N.
     */
    public const EPSG_WGS_72BE_UTM_ZONE_32N = 'urn:ogc:def:crs:EPSG::32432';

    /**
     * WGS 72BE / UTM zone 32S
     * Extent: Between 6°E and 12°E, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_72BE_UTM_ZONE_32S = 'urn:ogc:def:crs:EPSG::32532';

    /**
     * WGS 72BE / UTM zone 33N
     * Extent: Between 12°E and 18°E, northern hemisphere between equator and 84°N. Chad - west of 18°E
     * Used by ExxonMobil for exploration and production activities.
     */
    public const EPSG_WGS_72BE_UTM_ZONE_33N = 'urn:ogc:def:crs:EPSG::32433';

    /**
     * WGS 72BE / UTM zone 33S
     * Extent: Between 12°E and 18°E, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_72BE_UTM_ZONE_33S = 'urn:ogc:def:crs:EPSG::32533';

    /**
     * WGS 72BE / UTM zone 34N
     * Extent: Between 12°E and 18°E, northern hemisphere between equator and 84°N. Chad - east of 18°E
     * Used by ExxonMobil for exploration and production activities.
     */
    public const EPSG_WGS_72BE_UTM_ZONE_34N = 'urn:ogc:def:crs:EPSG::32434';

    /**
     * WGS 72BE / UTM zone 34S
     * Extent: Between 18°E and 24°E, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_72BE_UTM_ZONE_34S = 'urn:ogc:def:crs:EPSG::32534';

    /**
     * WGS 72BE / UTM zone 35N
     * Extent: Between 24°E and 30°E, northern hemisphere between equator and 84°N.
     */
    public const EPSG_WGS_72BE_UTM_ZONE_35N = 'urn:ogc:def:crs:EPSG::32435';

    /**
     * WGS 72BE / UTM zone 35S
     * Extent: Between 24°E and 30°E, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_72BE_UTM_ZONE_35S = 'urn:ogc:def:crs:EPSG::32535';

    /**
     * WGS 72BE / UTM zone 36N
     * Extent: Between 30°E and 36°E, northern hemisphere between equator and 84°N.
     */
    public const EPSG_WGS_72BE_UTM_ZONE_36N = 'urn:ogc:def:crs:EPSG::32436';

    /**
     * WGS 72BE / UTM zone 36S
     * Extent: Between 30°E and 36°E, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_72BE_UTM_ZONE_36S = 'urn:ogc:def:crs:EPSG::32536';

    /**
     * WGS 72BE / UTM zone 37N
     * Extent: Between 36°E and 42°E, northern hemisphere between equator and 84°N.
     */
    public const EPSG_WGS_72BE_UTM_ZONE_37N = 'urn:ogc:def:crs:EPSG::32437';

    /**
     * WGS 72BE / UTM zone 37S
     * Extent: Between 36°E and 42°E, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_72BE_UTM_ZONE_37S = 'urn:ogc:def:crs:EPSG::32537';

    /**
     * WGS 72BE / UTM zone 38N
     * Extent: Between 42°E and 48°E, northern hemisphere between equator and 84°N.
     */
    public const EPSG_WGS_72BE_UTM_ZONE_38N = 'urn:ogc:def:crs:EPSG::32438';

    /**
     * WGS 72BE / UTM zone 38S
     * Extent: Between 42°E and 48°E, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_72BE_UTM_ZONE_38S = 'urn:ogc:def:crs:EPSG::32538';

    /**
     * WGS 72BE / UTM zone 39N
     * Extent: Between 48°E and 54°E, northern hemisphere between equator and 84°N.
     */
    public const EPSG_WGS_72BE_UTM_ZONE_39N = 'urn:ogc:def:crs:EPSG::32439';

    /**
     * WGS 72BE / UTM zone 39S
     * Extent: Between 48°E and 54°E, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_72BE_UTM_ZONE_39S = 'urn:ogc:def:crs:EPSG::32539';

    /**
     * WGS 72BE / UTM zone 3N
     * Extent: Between 168°W and 162°W, northern hemisphere between equator and 84°N.
     */
    public const EPSG_WGS_72BE_UTM_ZONE_3N = 'urn:ogc:def:crs:EPSG::32403';

    /**
     * WGS 72BE / UTM zone 3S
     * Extent: Between 168°W and 162°W, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_72BE_UTM_ZONE_3S = 'urn:ogc:def:crs:EPSG::32503';

    /**
     * WGS 72BE / UTM zone 40N
     * Extent: Between 54°E and 60°E, northern hemisphere between equator and 84°N.
     */
    public const EPSG_WGS_72BE_UTM_ZONE_40N = 'urn:ogc:def:crs:EPSG::32440';

    /**
     * WGS 72BE / UTM zone 40S
     * Extent: Between 54°E and 60°E, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_72BE_UTM_ZONE_40S = 'urn:ogc:def:crs:EPSG::32540';

    /**
     * WGS 72BE / UTM zone 41N
     * Extent: Between 60°E and 66°E, northern hemisphere between equator and 84°N.
     */
    public const EPSG_WGS_72BE_UTM_ZONE_41N = 'urn:ogc:def:crs:EPSG::32441';

    /**
     * WGS 72BE / UTM zone 41S
     * Extent: Between 60°E and 66°E, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_72BE_UTM_ZONE_41S = 'urn:ogc:def:crs:EPSG::32541';

    /**
     * WGS 72BE / UTM zone 42N
     * Extent: Between 66°E and 72°E, northern hemisphere between equator and 84°N.
     */
    public const EPSG_WGS_72BE_UTM_ZONE_42N = 'urn:ogc:def:crs:EPSG::32442';

    /**
     * WGS 72BE / UTM zone 42S
     * Extent: Between 66°E and 72°E, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_72BE_UTM_ZONE_42S = 'urn:ogc:def:crs:EPSG::32542';

    /**
     * WGS 72BE / UTM zone 43N
     * Extent: Between 72°E and 78°E, northern hemisphere between equator and 84°N.
     */
    public const EPSG_WGS_72BE_UTM_ZONE_43N = 'urn:ogc:def:crs:EPSG::32443';

    /**
     * WGS 72BE / UTM zone 43S
     * Extent: Between 72°E and 78°E, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_72BE_UTM_ZONE_43S = 'urn:ogc:def:crs:EPSG::32543';

    /**
     * WGS 72BE / UTM zone 44N
     * Extent: Between 78°E and 84°E, northern hemisphere between equator and 84°N.
     */
    public const EPSG_WGS_72BE_UTM_ZONE_44N = 'urn:ogc:def:crs:EPSG::32444';

    /**
     * WGS 72BE / UTM zone 44S
     * Extent: Between 78°E and 84°E, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_72BE_UTM_ZONE_44S = 'urn:ogc:def:crs:EPSG::32544';

    /**
     * WGS 72BE / UTM zone 45N
     * Extent: Between 84°E and 90°E, northern hemisphere between equator and 84°N.
     */
    public const EPSG_WGS_72BE_UTM_ZONE_45N = 'urn:ogc:def:crs:EPSG::32445';

    /**
     * WGS 72BE / UTM zone 45S
     * Extent: Between 84°E and 90°E, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_72BE_UTM_ZONE_45S = 'urn:ogc:def:crs:EPSG::32545';

    /**
     * WGS 72BE / UTM zone 46N
     * Extent: Between 90°E and 96°E, northern hemisphere between equator and 84°N.
     */
    public const EPSG_WGS_72BE_UTM_ZONE_46N = 'urn:ogc:def:crs:EPSG::32446';

    /**
     * WGS 72BE / UTM zone 46S
     * Extent: Between 90°E and 96°E, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_72BE_UTM_ZONE_46S = 'urn:ogc:def:crs:EPSG::32546';

    /**
     * WGS 72BE / UTM zone 47N
     * Extent: Between 96°E and 102°E, northern hemisphere between equator and 84°N.
     */
    public const EPSG_WGS_72BE_UTM_ZONE_47N = 'urn:ogc:def:crs:EPSG::32447';

    /**
     * WGS 72BE / UTM zone 47S
     * Extent: Between 96°E and 102°E, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_72BE_UTM_ZONE_47S = 'urn:ogc:def:crs:EPSG::32547';

    /**
     * WGS 72BE / UTM zone 48N
     * Extent: Between 102°E and 108°E, northern hemisphere between equator and 84°N. Vietnam - offshore.
     */
    public const EPSG_WGS_72BE_UTM_ZONE_48N = 'urn:ogc:def:crs:EPSG::32448';

    /**
     * WGS 72BE / UTM zone 48S
     * Extent: Between 102°E and 108°E, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_72BE_UTM_ZONE_48S = 'urn:ogc:def:crs:EPSG::32548';

    /**
     * WGS 72BE / UTM zone 49N
     * Extent: Between 108°E and 114°E, northern hemisphere between equator and 84°N. Vietnam - offshore.
     */
    public const EPSG_WGS_72BE_UTM_ZONE_49N = 'urn:ogc:def:crs:EPSG::32449';

    /**
     * WGS 72BE / UTM zone 49S
     * Extent: Between 108°E and 114°E, southern hemisphere between 80°S and equator. Indonesia - offshore.
     */
    public const EPSG_WGS_72BE_UTM_ZONE_49S = 'urn:ogc:def:crs:EPSG::32549';

    /**
     * WGS 72BE / UTM zone 4N
     * Extent: Between 162°W and 156°W, northern hemisphere between equator and 84°N.
     */
    public const EPSG_WGS_72BE_UTM_ZONE_4N = 'urn:ogc:def:crs:EPSG::32404';

    /**
     * WGS 72BE / UTM zone 4S
     * Extent: Between 162°W and 156°W, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_72BE_UTM_ZONE_4S = 'urn:ogc:def:crs:EPSG::32504';

    /**
     * WGS 72BE / UTM zone 50N
     * Extent: Between 114°E and 120°E, northern hemisphere between equator and 84°N.
     */
    public const EPSG_WGS_72BE_UTM_ZONE_50N = 'urn:ogc:def:crs:EPSG::32450';

    /**
     * WGS 72BE / UTM zone 50S
     * Extent: Between 114°E and 120°E, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_72BE_UTM_ZONE_50S = 'urn:ogc:def:crs:EPSG::32550';

    /**
     * WGS 72BE / UTM zone 51N
     * Extent: Between 120°E and 126°E, northern hemisphere between equator and 84°N.
     */
    public const EPSG_WGS_72BE_UTM_ZONE_51N = 'urn:ogc:def:crs:EPSG::32451';

    /**
     * WGS 72BE / UTM zone 51S
     * Extent: Between 120°E and 126°E, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_72BE_UTM_ZONE_51S = 'urn:ogc:def:crs:EPSG::32551';

    /**
     * WGS 72BE / UTM zone 52N
     * Extent: Between 126°E and 132°E, northern hemisphere between equator and 84°N.
     */
    public const EPSG_WGS_72BE_UTM_ZONE_52N = 'urn:ogc:def:crs:EPSG::32452';

    /**
     * WGS 72BE / UTM zone 52S
     * Extent: Between 126°E and 132°E, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_72BE_UTM_ZONE_52S = 'urn:ogc:def:crs:EPSG::32552';

    /**
     * WGS 72BE / UTM zone 53N
     * Extent: Between 132°E and 138°E, northern hemisphere between equator and 84°N.
     */
    public const EPSG_WGS_72BE_UTM_ZONE_53N = 'urn:ogc:def:crs:EPSG::32453';

    /**
     * WGS 72BE / UTM zone 53S
     * Extent: Between 132°E and 138°E, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_72BE_UTM_ZONE_53S = 'urn:ogc:def:crs:EPSG::32553';

    /**
     * WGS 72BE / UTM zone 54N
     * Extent: Between 138°E and 144°E, northern hemisphere between equator and 84°N.
     */
    public const EPSG_WGS_72BE_UTM_ZONE_54N = 'urn:ogc:def:crs:EPSG::32454';

    /**
     * WGS 72BE / UTM zone 54S
     * Extent: Between 138°E and 144°E, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_72BE_UTM_ZONE_54S = 'urn:ogc:def:crs:EPSG::32554';

    /**
     * WGS 72BE / UTM zone 55N
     * Extent: Between 144°E and 150°E, northern hemisphere between equator and 84°N.
     */
    public const EPSG_WGS_72BE_UTM_ZONE_55N = 'urn:ogc:def:crs:EPSG::32455';

    /**
     * WGS 72BE / UTM zone 55S
     * Extent: Between 144°E and 150°E, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_72BE_UTM_ZONE_55S = 'urn:ogc:def:crs:EPSG::32555';

    /**
     * WGS 72BE / UTM zone 56N
     * Extent: Between 150°E and 156°E, northern hemisphere between equator and 84°N.
     */
    public const EPSG_WGS_72BE_UTM_ZONE_56N = 'urn:ogc:def:crs:EPSG::32456';

    /**
     * WGS 72BE / UTM zone 56S
     * Extent: Between 150°E and 156°E, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_72BE_UTM_ZONE_56S = 'urn:ogc:def:crs:EPSG::32556';

    /**
     * WGS 72BE / UTM zone 57N
     * Extent: Between 156°E and 162°E, northern hemisphere between equator and 84°N.
     */
    public const EPSG_WGS_72BE_UTM_ZONE_57N = 'urn:ogc:def:crs:EPSG::32457';

    /**
     * WGS 72BE / UTM zone 57S
     * Extent: Between 156°E and 162°E, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_72BE_UTM_ZONE_57S = 'urn:ogc:def:crs:EPSG::32557';

    /**
     * WGS 72BE / UTM zone 58N
     * Extent: Between 162°E and 168°E, northern hemisphere between equator and 84°N.
     */
    public const EPSG_WGS_72BE_UTM_ZONE_58N = 'urn:ogc:def:crs:EPSG::32458';

    /**
     * WGS 72BE / UTM zone 58S
     * Extent: Between 162°E and 168°E, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_72BE_UTM_ZONE_58S = 'urn:ogc:def:crs:EPSG::32558';

    /**
     * WGS 72BE / UTM zone 59N
     * Extent: Between 168°E and 174°E, northern hemisphere between equator and 84°N.
     */
    public const EPSG_WGS_72BE_UTM_ZONE_59N = 'urn:ogc:def:crs:EPSG::32459';

    /**
     * WGS 72BE / UTM zone 59S
     * Extent: Between 168°E and 174°E, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_72BE_UTM_ZONE_59S = 'urn:ogc:def:crs:EPSG::32559';

    /**
     * WGS 72BE / UTM zone 5N
     * Extent: Between 156°W and 150°W, northern hemisphere between equator and 84°N.
     */
    public const EPSG_WGS_72BE_UTM_ZONE_5N = 'urn:ogc:def:crs:EPSG::32405';

    /**
     * WGS 72BE / UTM zone 5S
     * Extent: Between 156°W and 150°W, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_72BE_UTM_ZONE_5S = 'urn:ogc:def:crs:EPSG::32505';

    /**
     * WGS 72BE / UTM zone 60N
     * Extent: Between 174°E and 180°E, northern hemisphere between equator and 84°N.
     */
    public const EPSG_WGS_72BE_UTM_ZONE_60N = 'urn:ogc:def:crs:EPSG::32460';

    /**
     * WGS 72BE / UTM zone 60S
     * Extent: Between 174°E and 180°E, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_72BE_UTM_ZONE_60S = 'urn:ogc:def:crs:EPSG::32560';

    /**
     * WGS 72BE / UTM zone 6N
     * Extent: Between 150°W and 144°W, northern hemisphere between equator and 84°N.
     */
    public const EPSG_WGS_72BE_UTM_ZONE_6N = 'urn:ogc:def:crs:EPSG::32406';

    /**
     * WGS 72BE / UTM zone 6S
     * Extent: Between 150°W and 144°W, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_72BE_UTM_ZONE_6S = 'urn:ogc:def:crs:EPSG::32506';

    /**
     * WGS 72BE / UTM zone 7N
     * Extent: Between 144°W and 138°W, northern hemisphere between equator and 84°N.
     */
    public const EPSG_WGS_72BE_UTM_ZONE_7N = 'urn:ogc:def:crs:EPSG::32407';

    /**
     * WGS 72BE / UTM zone 7S
     * Extent: Between 144°W and 138°W, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_72BE_UTM_ZONE_7S = 'urn:ogc:def:crs:EPSG::32507';

    /**
     * WGS 72BE / UTM zone 8N
     * Extent: Between 138°W and 132°W, northern hemisphere between equator and 84°N.
     */
    public const EPSG_WGS_72BE_UTM_ZONE_8N = 'urn:ogc:def:crs:EPSG::32408';

    /**
     * WGS 72BE / UTM zone 8S
     * Extent: Between 138°W and 132°W, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_72BE_UTM_ZONE_8S = 'urn:ogc:def:crs:EPSG::32508';

    /**
     * WGS 72BE / UTM zone 9N
     * Extent: Between 132°W and 126°W, northern hemisphere between equator and 84°N.
     */
    public const EPSG_WGS_72BE_UTM_ZONE_9N = 'urn:ogc:def:crs:EPSG::32409';

    /**
     * WGS 72BE / UTM zone 9S
     * Extent: Between 132°W and 126°W, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_72BE_UTM_ZONE_9S = 'urn:ogc:def:crs:EPSG::32509';

    /**
     * WGS 84 / Andaman and Nicobar
     * Extent: India - Andaman and Nicobar Islands.
     */
    public const EPSG_WGS_84_ANDAMAN_AND_NICOBAR = 'urn:ogc:def:crs:EPSG::7777';

    /**
     * WGS 84 / Andhra Pradesh
     * Extent: India - Andhra Pradesh; Telangana; Yanam area of Pudacherry territory.
     */
    public const EPSG_WGS_84_ANDHRA_PRADESH = 'urn:ogc:def:crs:EPSG::7756';

    /**
     * WGS 84 / Antarctic Polar Stereographic
     * Extent: Antarctica.
     */
    public const EPSG_WGS_84_ANTARCTIC_POLAR_STEREOGRAPHIC = 'urn:ogc:def:crs:EPSG::3031';

    /**
     * WGS 84 / Arctic Polar Stereographic
     * Extent: Northern hemisphere - north of 60°N, including Arctic
     * Used to serve the bathymetry of the Arctic Region as image tiles in a Web Mapping Service.
     */
    public const EPSG_WGS_84_ARCTIC_POLAR_STEREOGRAPHIC = 'urn:ogc:def:crs:EPSG::3995';

    /**
     * WGS 84 / Arunachal Pradesh
     * Extent: India - Arunachal Pradesh.
     */
    public const EPSG_WGS_84_ARUNACHAL_PRADESH = 'urn:ogc:def:crs:EPSG::7757';

    /**
     * WGS 84 / Assam
     * Extent: India - Assam.
     */
    public const EPSG_WGS_84_ASSAM = 'urn:ogc:def:crs:EPSG::7758';

    /**
     * WGS 84 / Australian Antarctic Lambert
     * Extent: Antarctica - north of 80°S and between 45°E and 136°E and between 142°E and 160°E - Australian
     * sector north of 80°S.
     */
    public const EPSG_WGS_84_AUSTRALIAN_ANTARCTIC_LAMBERT = 'urn:ogc:def:crs:EPSG::3033';

    /**
     * WGS 84 / Australian Antarctic Polar Stereographic
     * Extent: Antarctica between 45°E and 136°E and between 142°E and 160°E - Australian sector.
     */
    public const EPSG_WGS_84_AUSTRALIAN_ANTARCTIC_POLAR_STEREOGRAPHIC = 'urn:ogc:def:crs:EPSG::3032';

    /**
     * WGS 84 / Australian Centre for Remote Sensing Lambert
     * Extent: Australia - Australian Capital Territory; New South Wales; Northern Territory; Queensland; South
     * Australia; Tasmania; Western Australia; Victoria
     * See also GDA94 / GA LCC (CRS code 3112).
     */
    public const EPSG_WGS_84_AUSTRALIAN_CENTRE_FOR_REMOTE_SENSING_LAMBERT = 'urn:ogc:def:crs:EPSG::4462';

    /**
     * WGS 84 / BLM 14N (ftUS)
     * Extent: USA - Gulf of Mexico outer continental shelf (GoM OCS) west of approximately 96°W - protraction areas
     * Corpus Christi; Port Isabel
     * See WGS 84 / UTM zone 14N (code 32614) for metric equivalent. See NAD27 / BLM 14N (ftUS) (code 32064) for system
     * used in US Gulf of Mexico oil operations.
     */
    public const EPSG_WGS_84_BLM_14N_FTUS = 'urn:ogc:def:crs:EPSG::32664';

    /**
     * WGS 84 / BLM 15N (ftUS)
     * Extent: USA - Gulf of Mexico outer continental shelf (GoM OCS) between approximately 96°W and 90°W -
     * protraction areas East Breaks; Alaminos Canyon; Garden Banks; Keathley Canyon; Sigsbee Escarpment; Ewing Bank;
     * Green Canyon; Walker Ridge; Amery Terrace
     * See WGS 84 / UTM zone 15N (code 32615) for metric equivalent. See NAD27 / BLM 15N (ftUS) (code 32065) for system
     * used in US Gulf of Mexico oil operations.
     */
    public const EPSG_WGS_84_BLM_15N_FTUS = 'urn:ogc:def:crs:EPSG::32665';

    /**
     * WGS 84 / BLM 16N (ftUS)
     * Extent: USA - Gulf of Mexico outer continental shelf (GoM OCS) between approximately 90°W and 84°W -
     * protraction areas Mobile; Viosca Knoll; Mississippi Canyon; Atwater Valley; Lund; Lund South; Pensacola; Destin
     * Dome; De Soto Canyon; Lloyd Ridge; Henderson; Florida Plain; Campeche Escarpment; Apalachicola; Florida Middle
     * Ground; The Elbow; Vernon Basin; Howell Hook; Rankin
     * See WGS 84 / UTM zone 16N (code 32616) for metric equivalent. See NAD27 / BLM 16N (ftUS) (code 32066) for system
     * used in US Gulf of Mexico oil operations.
     */
    public const EPSG_WGS_84_BLM_16N_FTUS = 'urn:ogc:def:crs:EPSG::32666';

    /**
     * WGS 84 / BLM 17N (ftUS)
     * Extent: USA - Gulf of Mexico outer continental shelf (GoM OCS) east of approximately 84°W - protraction areas
     * Gainesville; Tarpon Springs; St Petersburg; Charlotte Harbor; Pulley Ridge; Dry Tortugas; Tortugas Valley;
     * Miami; Key West
     * See WGS 84 / UTM zone 17N (code 32617) for metric equivalent. See NAD27 / BLM 17N (ftUS) (code 32067) for system
     * used in US Gulf of Mexico oil operations.
     */
    public const EPSG_WGS_84_BLM_17N_FTUS = 'urn:ogc:def:crs:EPSG::32667';

    /**
     * WGS 84 / Bihar
     * Extent: India - Bihar.
     */
    public const EPSG_WGS_84_BIHAR = 'urn:ogc:def:crs:EPSG::7759';

    /**
     * WGS 84 / CIG92
     * Extent: Christmas Island - onshore
     * Usage restricted to areas below 270m above sea level. Replaced by GDA94 / CIG94 (CRS code 6721).
     */
    public const EPSG_WGS_84_CIG92 = 'urn:ogc:def:crs:EPSG::6720';

    /**
     * WGS 84 / CKIG92
     * Extent: Cocos (Keeling) Islands - onshore
     * Replaced by GDA94 / CKIG94 (CRS code 6723).
     */
    public const EPSG_WGS_84_CKIG92 = 'urn:ogc:def:crs:EPSG::6722';

    /**
     * WGS 84 / Cape Verde National
     * Extent: Cape Verde. Includes Boa Vista, Brava, Fogo, Maio, Sal, Santo Antao, Sao Nicolau, Sao Tiago, Sao Vicente
     * Adopted in October 2004.
     */
    public const EPSG_WGS_84_CAPE_VERDE_NATIONAL = 'urn:ogc:def:crs:EPSG::4826';

    /**
     * WGS 84 / Chhattisgarh
     * Extent: India - Chhattisgarh.
     */
    public const EPSG_WGS_84_CHHATTISGARH = 'urn:ogc:def:crs:EPSG::7778';

    /**
     * WGS 84 / Delhi
     * Extent: India - Delhi national capital territory.
     */
    public const EPSG_WGS_84_DELHI = 'urn:ogc:def:crs:EPSG::7760';

    /**
     * WGS 84 / Dubai Local TM
     * Extent: UAE - Dubai municipality.
     */
    public const EPSG_WGS_84_DUBAI_LOCAL_TM = 'urn:ogc:def:crs:EPSG::3997';

    /**
     * WGS 84 / EPSG Alaska Polar Stereographic
     * Extent: Northern hemisphere - north of 60°N, including Arctic.
     */
    public const EPSG_WGS_84_EPSG_ALASKA_POLAR_STEREOGRAPHIC = 'urn:ogc:def:crs:EPSG::5936';

    /**
     * WGS 84 / EPSG Arctic Regional zone A1
     * Extent: Arctic - 87°N to 75°N, approximately 156°W to approximately 66°W. May be extended westwards or
     * eastwards within the latitude limits.
     */
    public const EPSG_WGS_84_EPSG_ARCTIC_REGIONAL_ZONE_A1 = 'urn:ogc:def:crs:EPSG::5921';

    /**
     * WGS 84 / EPSG Arctic Regional zone A2
     * Extent: Arctic - 87°N to 75°N, approximately 84°W to approximately 6°E. May be extended westwards or
     * eastwards within the latitude limits.
     */
    public const EPSG_WGS_84_EPSG_ARCTIC_REGIONAL_ZONE_A2 = 'urn:ogc:def:crs:EPSG::5922';

    /**
     * WGS 84 / EPSG Arctic Regional zone A3
     * Extent: Arctic - 87°N to 75°N, approximately 12°W to approximately 78°E. May be extended westwards or
     * eastwards within the latitude limits.
     */
    public const EPSG_WGS_84_EPSG_ARCTIC_REGIONAL_ZONE_A3 = 'urn:ogc:def:crs:EPSG::5923';

    /**
     * WGS 84 / EPSG Arctic Regional zone A4
     * Extent: Arctic - 87°N to 75°N, approximately 60°E to approximately 150°E. May be extended westwards or
     * eastwards within the latitude limits.
     */
    public const EPSG_WGS_84_EPSG_ARCTIC_REGIONAL_ZONE_A4 = 'urn:ogc:def:crs:EPSG::5924';

    /**
     * WGS 84 / EPSG Arctic Regional zone A5
     * Extent: Arctic - 87°N to 75°N, approximately 132°E to approximately 138°W. May be extended westwards or
     * eastwards within the latitude limits.
     */
    public const EPSG_WGS_84_EPSG_ARCTIC_REGIONAL_ZONE_A5 = 'urn:ogc:def:crs:EPSG::5925';

    /**
     * WGS 84 / EPSG Arctic Regional zone B1
     * Extent: Arctic - 79°N to 67°N, approximately 156°W to approximately 66°W. May be extended westwards or
     * eastwards within the latitude limits.
     */
    public const EPSG_WGS_84_EPSG_ARCTIC_REGIONAL_ZONE_B1 = 'urn:ogc:def:crs:EPSG::5926';

    /**
     * WGS 84 / EPSG Arctic Regional zone B2
     * Extent: Arctic - 79°N to 67°N, approximately 84°W to approximately 6°E. May be extended westwards or
     * eastwards within the latitude limits.
     */
    public const EPSG_WGS_84_EPSG_ARCTIC_REGIONAL_ZONE_B2 = 'urn:ogc:def:crs:EPSG::5927';

    /**
     * WGS 84 / EPSG Arctic Regional zone B3
     * Extent: Arctic - 79°N to 67°N, approximately 12°W to approximately 78°E. May be extended westwards or
     * eastwards within the latitude limits.
     */
    public const EPSG_WGS_84_EPSG_ARCTIC_REGIONAL_ZONE_B3 = 'urn:ogc:def:crs:EPSG::5928';

    /**
     * WGS 84 / EPSG Arctic Regional zone B4
     * Extent: Arctic - 79°N to 67°N, approximately 60°E to approximately 150°E. May be extended westwards or
     * eastwards within the latitude limits.
     */
    public const EPSG_WGS_84_EPSG_ARCTIC_REGIONAL_ZONE_B4 = 'urn:ogc:def:crs:EPSG::5929';

    /**
     * WGS 84 / EPSG Arctic Regional zone B5
     * Extent: Arctic - 79°N to 67°N, approximately 132°E to approximately 138°W. May be extended westwards or
     * eastwards within the latitude limits.
     */
    public const EPSG_WGS_84_EPSG_ARCTIC_REGIONAL_ZONE_B5 = 'urn:ogc:def:crs:EPSG::5930';

    /**
     * WGS 84 / EPSG Arctic Regional zone C1
     * Extent: Arctic - 71°N to 59°N, approximately 156°W to approximately 66°W. May be extended westwards or
     * eastwards within the latitude limits.
     */
    public const EPSG_WGS_84_EPSG_ARCTIC_REGIONAL_ZONE_C1 = 'urn:ogc:def:crs:EPSG::5931';

    /**
     * WGS 84 / EPSG Arctic Regional zone C2
     * Extent: Arctic - 71°N to 59°N, approximately 84°W to approximately 6°E. May be extended westwards or
     * eastwards within the latitude limits.
     */
    public const EPSG_WGS_84_EPSG_ARCTIC_REGIONAL_ZONE_C2 = 'urn:ogc:def:crs:EPSG::5932';

    /**
     * WGS 84 / EPSG Arctic Regional zone C3
     * Extent: Arctic - 71°N to 59°N, approximately 12°W to approximately 78°E. May be extended westwards or
     * eastwards within the latitude limits.
     */
    public const EPSG_WGS_84_EPSG_ARCTIC_REGIONAL_ZONE_C3 = 'urn:ogc:def:crs:EPSG::5933';

    /**
     * WGS 84 / EPSG Arctic Regional zone C4
     * Extent: Arctic - 71°N to 59°N, approximately 60°E to approximately 150°E. May be extended westwards or
     * eastwards within the latitude limits.
     */
    public const EPSG_WGS_84_EPSG_ARCTIC_REGIONAL_ZONE_C4 = 'urn:ogc:def:crs:EPSG::5934';

    /**
     * WGS 84 / EPSG Arctic Regional zone C5
     * Extent: Arctic - 71°N to 59°N, approximately 132°E to approximately 138°W. May be extended westwards or
     * eastwards within the latitude limits.
     */
    public const EPSG_WGS_84_EPSG_ARCTIC_REGIONAL_ZONE_C5 = 'urn:ogc:def:crs:EPSG::5935';

    /**
     * WGS 84 / EPSG Arctic zone 1-21
     * Extent: Arctic - between 87°50'N and 82°50'N, approximately 180°W to approximately 120°W. May be extended
     * westwards or eastwards within the latitude limits.
     */
    public const EPSG_WGS_84_EPSG_ARCTIC_ZONE_1_21 = 'urn:ogc:def:crs:EPSG::6118';

    /**
     * WGS 84 / EPSG Arctic zone 1-27
     * Extent: Arctic - between 87°50'N and 82°50'N, approximately 0°E to approximately 60°E. May be extended
     * westwards or eastwards within the latitude limits.
     */
    public const EPSG_WGS_84_EPSG_ARCTIC_ZONE_1_27 = 'urn:ogc:def:crs:EPSG::6115';

    /**
     * WGS 84 / EPSG Arctic zone 1-29
     * Extent: Arctic - between 87°50'N and 82°50'N, approximately 60°E to approximately 120°E. May be extended
     * westwards or eastwards within the latitude limits.
     */
    public const EPSG_WGS_84_EPSG_ARCTIC_ZONE_1_29 = 'urn:ogc:def:crs:EPSG::6116';

    /**
     * WGS 84 / EPSG Arctic zone 1-31
     * Extent: Arctic - between 87°50'N and 82°50'N, approximately 120°E to approximately 180°E. May be extended
     * westwards or eastwards within the latitude limits.
     */
    public const EPSG_WGS_84_EPSG_ARCTIC_ZONE_1_31 = 'urn:ogc:def:crs:EPSG::6117';

    /**
     * WGS 84 / EPSG Arctic zone 2-10
     * Extent: Arctic - between 84°30'N and 79°30'N, approximately 146°E to approximately 174°W. May be extended
     * westwards or eastwards within the latitude limits.
     */
    public const EPSG_WGS_84_EPSG_ARCTIC_ZONE_2_10 = 'urn:ogc:def:crs:EPSG::6120';

    /**
     * WGS 84 / EPSG Arctic zone 2-12
     * Extent: Arctic - between 84°30'N and 79°30'N, approximately 174°W to approximately 135°W. May be extended
     * westwards or eastwards within the latitude limits.
     */
    public const EPSG_WGS_84_EPSG_ARCTIC_ZONE_2_12 = 'urn:ogc:def:crs:EPSG::6121';

    /**
     * WGS 84 / EPSG Arctic zone 2-24
     * Extent: Arctic - between 84°30'N and 79°30'N, approximately 33°E to approximately 73°E. May be extended
     * westwards or eastwards within the latitude limits.
     */
    public const EPSG_WGS_84_EPSG_ARCTIC_ZONE_2_24 = 'urn:ogc:def:crs:EPSG::6075';

    /**
     * WGS 84 / EPSG Arctic zone 2-26
     * Extent: Arctic - between 84°30'N and 79°30'N, approximately 73°E to approximately 113°E. May be extended
     * westwards or eastwards within the latitude limits.
     */
    public const EPSG_WGS_84_EPSG_ARCTIC_ZONE_2_26 = 'urn:ogc:def:crs:EPSG::6076';

    /**
     * WGS 84 / EPSG Arctic zone 2-28
     * Extent: Arctic - between 84°30'N and 79°30'N, approximately 113°E to approximately 153°E. May be extended
     * westwards or eastwards within the latitude limits.
     */
    public const EPSG_WGS_84_EPSG_ARCTIC_ZONE_2_28 = 'urn:ogc:def:crs:EPSG::6119';

    /**
     * WGS 84 / EPSG Arctic zone 3-13
     * Extent: Arctic (Russia) - between 81°10'N and 76°10'N, approximately 35°E to approximately 67°E. May be
     * extended eastwards within the latitude limits.
     */
    public const EPSG_WGS_84_EPSG_ARCTIC_ZONE_3_13 = 'urn:ogc:def:crs:EPSG::6077';

    /**
     * WGS 84 / EPSG Arctic zone 3-15
     * Extent: Arctic (Russia) - between 81°10'N and 76°10'N, approximately 67°E to approximately 98°E. May be
     * extended westwards or eastwards within the latitude limits.
     */
    public const EPSG_WGS_84_EPSG_ARCTIC_ZONE_3_15 = 'urn:ogc:def:crs:EPSG::6078';

    /**
     * WGS 84 / EPSG Arctic zone 3-17
     * Extent: Arctic (Russia) - between 81°10'N and 76°10'N, approximately 98°E to approximately 129°E. May be
     * extended westwards or eastwards within the latitude limits.
     */
    public const EPSG_WGS_84_EPSG_ARCTIC_ZONE_3_17 = 'urn:ogc:def:crs:EPSG::6079';

    /**
     * WGS 84 / EPSG Arctic zone 3-19
     * Extent: Arctic (Russia) - between 81°10'N and 76°10'N, approximately 129°E to approximately 160°E. May be
     * extended westwards or eastwards within the latitude limits.
     */
    public const EPSG_WGS_84_EPSG_ARCTIC_ZONE_3_19 = 'urn:ogc:def:crs:EPSG::6080';

    /**
     * WGS 84 / EPSG Arctic zone 3-21
     * Extent: Arctic - between 81°10'N and 76°10'N, approximately 160°E to approximately 169°W. May be extended
     * westwards or eastwards within the latitude limits.
     */
    public const EPSG_WGS_84_EPSG_ARCTIC_ZONE_3_21 = 'urn:ogc:def:crs:EPSG::6122';

    /**
     * WGS 84 / EPSG Arctic zone 3-23
     * Extent: Arctic - between 81°10'N and 76°10'N, approximately 169°W to approximately 138°W. May be extended
     * westwards or eastwards within the latitude limits.
     */
    public const EPSG_WGS_84_EPSG_ARCTIC_ZONE_3_23 = 'urn:ogc:def:crs:EPSG::6123';

    /**
     * WGS 84 / EPSG Arctic zone 4-12
     * Extent: Arctic - between 77°50'N and 72°50'N, approximately 169°W to approximately 141°W. May be extended
     * westwards or eastwards within the latitude limits.
     */
    public const EPSG_WGS_84_EPSG_ARCTIC_ZONE_4_12 = 'urn:ogc:def:crs:EPSG::6124';

    /**
     * WGS 84 / EPSG Arctic zone 4-30
     * Extent: Arctic - between 77°50'N and 72°50'N, approximately 46°E to approximately 70°E. May be extended
     * westwards or eastwards within the latitude limits.
     */
    public const EPSG_WGS_84_EPSG_ARCTIC_ZONE_4_30 = 'urn:ogc:def:crs:EPSG::6081';

    /**
     * WGS 84 / EPSG Arctic zone 4-32
     * Extent: Arctic - between 77°50'N and 72°50'N, approximately 70°E to approximately 94°E. May be extended
     * westwards or eastwards within the latitude limits.
     */
    public const EPSG_WGS_84_EPSG_ARCTIC_ZONE_4_32 = 'urn:ogc:def:crs:EPSG::6082';

    /**
     * WGS 84 / EPSG Arctic zone 4-34
     * Extent: Arctic - between 77°50'N and 72°50'N, approximately 94°E to approximately 118°E. May be extended
     * westwards or eastwards within the latitude limits.
     */
    public const EPSG_WGS_84_EPSG_ARCTIC_ZONE_4_34 = 'urn:ogc:def:crs:EPSG::6083';

    /**
     * WGS 84 / EPSG Arctic zone 4-36
     * Extent: Arctic - between 77°50'N and 72°50'N, approximately 118°E to approximately 142°E. May be extended
     * westwards or eastwards within the latitude limits.
     */
    public const EPSG_WGS_84_EPSG_ARCTIC_ZONE_4_36 = 'urn:ogc:def:crs:EPSG::6084';

    /**
     * WGS 84 / EPSG Arctic zone 4-38
     * Extent: Arctic - between 77°50'N and 72°50'N, approximately 142°E to approximately 166°E. May be extended
     * westwards or eastwards within the latitude limits.
     */
    public const EPSG_WGS_84_EPSG_ARCTIC_ZONE_4_38 = 'urn:ogc:def:crs:EPSG::6085';

    /**
     * WGS 84 / EPSG Arctic zone 4-40
     * Extent: Arctic - between 77°50'N and 72°50'N, approximately 166°E to approximately 169°W. May be extended
     * westwards or eastwards within the latitude limits.
     */
    public const EPSG_WGS_84_EPSG_ARCTIC_ZONE_4_40 = 'urn:ogc:def:crs:EPSG::6086';

    /**
     * WGS 84 / EPSG Arctic zone 5-15
     * Extent: Arctic - between 74°30'N and 69°30'N, approximately 44°E to approximately 64°E. May be extended
     * westwards or eastwards within the latitude limits.
     */
    public const EPSG_WGS_84_EPSG_ARCTIC_ZONE_5_15 = 'urn:ogc:def:crs:EPSG::6087';

    /**
     * WGS 84 / EPSG Arctic zone 5-17
     * Extent: Arctic - between 74°30'N and 69°30'N, approximately 64°E to approximately 85°E. May be extended
     * westwards or eastwards within the latitude limits.
     */
    public const EPSG_WGS_84_EPSG_ARCTIC_ZONE_5_17 = 'urn:ogc:def:crs:EPSG::6088';

    /**
     * WGS 84 / EPSG Arctic zone 5-19
     * Extent: Arctic - between 74°30'N and 69°30'N, approximately 85°E to approximately 106°E. May be extended
     * westwards or eastwards within the latitude limits.
     */
    public const EPSG_WGS_84_EPSG_ARCTIC_ZONE_5_19 = 'urn:ogc:def:crs:EPSG::6089';

    /**
     * WGS 84 / EPSG Arctic zone 5-21
     * Extent: Arctic - between 74°30'N and 69°30'N, approximately 106°E to approximately 127°E. May be extended
     * westwards or eastwards within the latitude limits.
     */
    public const EPSG_WGS_84_EPSG_ARCTIC_ZONE_5_21 = 'urn:ogc:def:crs:EPSG::6090';

    /**
     * WGS 84 / EPSG Arctic zone 5-23
     * Extent: Arctic - between 74°30'N and 69°30'N, approximately 127°E to approximately 148°E. May be extended
     * westwards or eastwards within the latitude limits.
     */
    public const EPSG_WGS_84_EPSG_ARCTIC_ZONE_5_23 = 'urn:ogc:def:crs:EPSG::6091';

    /**
     * WGS 84 / EPSG Arctic zone 5-25
     * Extent: Arctic - between 74°30'N and 69°30'N, approximately 148°E to approximately 169°E. May be extended
     * westwards or eastwards within the latitude limits.
     */
    public const EPSG_WGS_84_EPSG_ARCTIC_ZONE_5_25 = 'urn:ogc:def:crs:EPSG::6092';

    /**
     * WGS 84 / EPSG Arctic zone 5-27
     * Extent: Arctic - between 74°30'N and 69°30'N, approximately 169°E to approximately 169°W. May be extended
     * westwards or eastwards within the latitude limits.
     */
    public const EPSG_WGS_84_EPSG_ARCTIC_ZONE_5_27 = 'urn:ogc:def:crs:EPSG::6093';

    /**
     * WGS 84 / EPSG Canada Polar Stereographic
     * Extent: Northern hemisphere - north of 60°N, including Arctic.
     */
    public const EPSG_WGS_84_EPSG_CANADA_POLAR_STEREOGRAPHIC = 'urn:ogc:def:crs:EPSG::5937';

    /**
     * WGS 84 / EPSG Greenland Polar Stereographic
     * Extent: Northern hemisphere - north of 60°N, including Arctic.
     */
    public const EPSG_WGS_84_EPSG_GREENLAND_POLAR_STEREOGRAPHIC = 'urn:ogc:def:crs:EPSG::5938';

    /**
     * WGS 84 / EPSG Norway Polar Stereographic
     * Extent: Northern hemisphere - north of 60°N, including Arctic.
     */
    public const EPSG_WGS_84_EPSG_NORWAY_POLAR_STEREOGRAPHIC = 'urn:ogc:def:crs:EPSG::5939';

    /**
     * WGS 84 / EPSG Russia Polar Stereographic
     * Extent: Northern hemisphere - north of 60°N, including Arctic.
     */
    public const EPSG_WGS_84_EPSG_RUSSIA_POLAR_STEREOGRAPHIC = 'urn:ogc:def:crs:EPSG::5940';

    /**
     * WGS 84 / Equal Earth Americas
     * Extent: World.
     */
    public const EPSG_WGS_84_EQUAL_EARTH_AMERICAS = 'urn:ogc:def:crs:EPSG::8858';

    /**
     * WGS 84 / Equal Earth Asia-Pacific
     * Extent: World.
     */
    public const EPSG_WGS_84_EQUAL_EARTH_ASIA_PACIFIC = 'urn:ogc:def:crs:EPSG::8859';

    /**
     * WGS 84 / Equal Earth Greenwich
     * Extent: World.
     */
    public const EPSG_WGS_84_EQUAL_EARTH_GREENWICH = 'urn:ogc:def:crs:EPSG::8857';

    /**
     * WGS 84 / GLANCE Africa
     * Extent: Africa and the Arabian peninsula
     * Basis for the equal area continental tiling system for Africa used by the GLANCE land cover products.
     */
    public const EPSG_WGS_84_GLANCE_AFRICA = 'urn:ogc:def:crs:EPSG::10592';

    /**
     * WGS 84 / GLANCE Asia
     * Extent: Asia including Maldives and British Indian Ocean Territory
     * Basis for the equal area continental tiling system for Asia used by the GLANCE land cover products.
     */
    public const EPSG_WGS_84_GLANCE_ASIA = 'urn:ogc:def:crs:EPSG::10594';

    /**
     * WGS 84 / GLANCE Europe
     * Extent: Europe including Russia west of the Ural Mountains
     * Basis for the equal area continental tiling system for Europe used by the GLANCE land cover products. For
     * compatibility with EU INSPIRE regulations use ETRS89-extended / LAEA Europe (CRS code 3035).
     */
    public const EPSG_WGS_84_GLANCE_EUROPE = 'urn:ogc:def:crs:EPSG::10596';

    /**
     * WGS 84 / GLANCE North America
     * Extent: North America including Greenland, the Caribbean and Central America, together with circum-polar area
     * north of 83°40'N. Excluding the circum-polar area, the longitude extent is from 167.65° in west across the
     * 180° meridian to 15.72° in east
     * Basis for the equal area continental tiling system for North America used by the GLANCE land cover products.
     */
    public const EPSG_WGS_84_GLANCE_NORTH_AMERICA = 'urn:ogc:def:crs:EPSG::10598';

    /**
     * WGS 84 / GLANCE Oceania
     * Extent: Australasia and the western Pacific Ocean
     * Basis for the equal area continental tiling system for Oceania used by the GLANCE land cover products.
     */
    public const EPSG_WGS_84_GLANCE_OCEANIA = 'urn:ogc:def:crs:EPSG::10601';

    /**
     * WGS 84 / GLANCE South America
     * Extent: South America including Panama
     * Basis for the equal area continental tiling system for South America used by the GLANCE land cover products.
     */
    public const EPSG_WGS_84_GLANCE_SOUTH_AMERICA = 'urn:ogc:def:crs:EPSG::10603';

    /**
     * WGS 84 / Gabon TM
     * Extent: Gabon - onshore
     * For topographic mapping and surveying applications see WGS 84 / Gabon TM 2011, CRS code 5523.
     */
    public const EPSG_WGS_84_GABON_TM = 'urn:ogc:def:crs:EPSG::5223';

    /**
     * WGS 84 / Gabon TM 2011
     * Extent: Gabon
     * For forestry applications see CRS code 5223.
     */
    public const EPSG_WGS_84_GABON_TM_2011 = 'urn:ogc:def:crs:EPSG::5523';

    /**
     * WGS 84 / Goa
     * Extent: India - Goa.
     */
    public const EPSG_WGS_84_GOA = 'urn:ogc:def:crs:EPSG::7779';

    /**
     * WGS 84 / Gujarat
     * Extent: India - Gujarat and union territories of Daman, Diu, Dadra and Nagar Haveli.
     */
    public const EPSG_WGS_84_GUJARAT = 'urn:ogc:def:crs:EPSG::7761';

    /**
     * WGS 84 / Haryana
     * Extent: India - Haryana including Chandigarh.
     */
    public const EPSG_WGS_84_HARYANA = 'urn:ogc:def:crs:EPSG::7762';

    /**
     * WGS 84 / Himachal Pradesh
     * Extent: India - Himachal Pradesh.
     */
    public const EPSG_WGS_84_HIMACHAL_PRADESH = 'urn:ogc:def:crs:EPSG::7763';

    /**
     * WGS 84 / IBCAO Polar Stereographic
     * Extent: Northern hemisphere - north of 60°N, including Arctic
     * Used as the coordinate base for creation of digital terrain models (DTMs) for the International Bathymetric
     * Chart of the Arctic Ocean.
     */
    public const EPSG_WGS_84_IBCAO_POLAR_STEREOGRAPHIC = 'urn:ogc:def:crs:EPSG::3996';

    /**
     * WGS 84 / IBCSO Polar Stereographic
     * Extent: Southern hemisphere - south of 50°S, including Antarctica
     * Used as the coordinate base for creation of digital terrain models (DTMs) for the International Bathymetric
     * Chart of the Southern Ocean.
     */
    public const EPSG_WGS_84_IBCSO_POLAR_STEREOGRAPHIC = 'urn:ogc:def:crs:EPSG::9354';

    /**
     * WGS 84 / India NSF LCC
     * Extent: India. Includes Amandivis, Laccadives, Minicoy, Andaman Islands, Nicobar Islands, and Sikkim.
     */
    public const EPSG_WGS_84_INDIA_NSF_LCC = 'urn:ogc:def:crs:EPSG::7755';

    /**
     * WGS 84 / India Northeast
     * Extent: India - Arunachal Pradesh, Assam, Manipur, Meghalaya, Mizoram, Nagaland and Tripura.
     */
    public const EPSG_WGS_84_INDIA_NORTHEAST = 'urn:ogc:def:crs:EPSG::7771';

    /**
     * WGS 84 / Jammu and Kashmir
     * Extent: India - Jammu and Kashmir.
     */
    public const EPSG_WGS_84_JAMMU_AND_KASHMIR = 'urn:ogc:def:crs:EPSG::7764';

    /**
     * WGS 84 / Jharkhand
     * Extent: India - Jharkhand.
     */
    public const EPSG_WGS_84_JHARKHAND = 'urn:ogc:def:crs:EPSG::7765';

    /**
     * WGS 84 / Karnataka
     * Extent: India - Karnataka.
     */
    public const EPSG_WGS_84_KARNATAKA = 'urn:ogc:def:crs:EPSG::7780';

    /**
     * WGS 84 / Kerala
     * Extent: India - Kerala; Mayyazhi (Mahe) area of Pudacherry territory.
     */
    public const EPSG_WGS_84_KERALA = 'urn:ogc:def:crs:EPSG::7781';

    /**
     * WGS 84 / Lakshadweep
     * Extent: India - Lakshadweep (Laccadive, Minicoy, and Aminidivi Islands).
     */
    public const EPSG_WGS_84_LAKSHADWEEP = 'urn:ogc:def:crs:EPSG::7782';

    /**
     * WGS 84 / Madhya Pradesh
     * Extent: India - Madhya Pradesh.
     */
    public const EPSG_WGS_84_MADHYA_PRADESH = 'urn:ogc:def:crs:EPSG::7766';

    /**
     * WGS 84 / Maharashtra
     * Extent: India - Maharashtra.
     */
    public const EPSG_WGS_84_MAHARASHTRA = 'urn:ogc:def:crs:EPSG::7767';

    /**
     * WGS 84 / Manipur
     * Extent: India - Manipur.
     */
    public const EPSG_WGS_84_MANIPUR = 'urn:ogc:def:crs:EPSG::7768';

    /**
     * WGS 84 / Meghalaya
     * Extent: India - Meghalaya.
     */
    public const EPSG_WGS_84_MEGHALAYA = 'urn:ogc:def:crs:EPSG::7769';

    /**
     * WGS 84 / Mercator 41
     * Extent: Southwestern Pacific Ocean and Southern Ocean areas surrounding New Zealand
     * For projects extending within the 12 nautical mile line or onshore, NIWA recommends using NZCS2000 (CRS code
     * 3851). For offshore statistical analysis see WGS 84 / NIWA Albers (CRS code 9191).
     */
    public const EPSG_WGS_84_MERCATOR_41 = 'urn:ogc:def:crs:EPSG::3994';

    /**
     * WGS 84 / Mizoram
     * Extent: India - Mizoram.
     */
    public const EPSG_WGS_84_MIZORAM = 'urn:ogc:def:crs:EPSG::7783';

    /**
     * WGS 84 / NIWA Albers
     * Extent: Southwestern Pacific Ocean and Southern Ocean areas surrounding New Zealand
     * For spatial referencing and conformal mapping nearshore see NZGD2000 / NZCS2000 (CRS code 3851) and for offshore
     * see WGS 84 / Mercator 41 (CRS code 3994).
     */
    public const EPSG_WGS_84_NIWA_ALBERS = 'urn:ogc:def:crs:EPSG::9191';

    /**
     * WGS 84 / NSIDC EASE-Grid 2.0 Global
     * Extent: World between 86°S and 86°N
     * Supersedes NSIDC EASE-Grid Global, CRS code 3410. This ellipsoidal development is to be preferred for new data.
     */
    public const EPSG_WGS_84_NSIDC_EASE_GRID_2_0_GLOBAL = 'urn:ogc:def:crs:EPSG::6933';

    /**
     * WGS 84 / NSIDC EASE-Grid 2.0 North
     * Extent: Northern hemisphere
     * Supersedes NSIDC EASE-Grid North, CRS code 3408. This ellipsoidal development is to be preferred for new data.
     */
    public const EPSG_WGS_84_NSIDC_EASE_GRID_2_0_NORTH = 'urn:ogc:def:crs:EPSG::6931';

    /**
     * WGS 84 / NSIDC EASE-Grid 2.0 South
     * Extent: Southern hemisphere
     * Supersedes NSIDC EASE-Grid South, CRS code 3409. This ellipsoidal development is to be preferred for new data.
     */
    public const EPSG_WGS_84_NSIDC_EASE_GRID_2_0_SOUTH = 'urn:ogc:def:crs:EPSG::6932';

    /**
     * WGS 84 / NSIDC Sea Ice Polar Stereographic North
     * Extent: Northern hemisphere - north of 60°N, including Arctic
     * Geodetically preferred alternative to NSIDC PS North (see CRS code 3411).
     */
    public const EPSG_WGS_84_NSIDC_SEA_ICE_POLAR_STEREOGRAPHIC_NORTH = 'urn:ogc:def:crs:EPSG::3413';

    /**
     * WGS 84 / NSIDC Sea Ice Polar Stereographic South
     * Extent: Southern hemisphere - south of 60°S - Antarctica
     * Geodetically preferred alternative to NSIDC PS South (see CRS code 3412).
     */
    public const EPSG_WGS_84_NSIDC_SEA_ICE_POLAR_STEREOGRAPHIC_SOUTH = 'urn:ogc:def:crs:EPSG::3976';

    /**
     * WGS 84 / Nagaland
     * Extent: India - Nagaland.
     */
    public const EPSG_WGS_84_NAGALAND = 'urn:ogc:def:crs:EPSG::7770';

    /**
     * WGS 84 / North Pole LAEA Alaska
     * Extent: Northern hemisphere - north of 45°N, including Arctic
     * For studies of Alaskan area.
     */
    public const EPSG_WGS_84_NORTH_POLE_LAEA_ALASKA = 'urn:ogc:def:crs:EPSG::3572';

    /**
     * WGS 84 / North Pole LAEA Atlantic
     * Extent: Northern hemisphere - north of 45°N, including Arctic
     * For studies of North Atlantic and Greenland area.
     */
    public const EPSG_WGS_84_NORTH_POLE_LAEA_ATLANTIC = 'urn:ogc:def:crs:EPSG::3574';

    /**
     * WGS 84 / North Pole LAEA Bering Sea
     * Extent: Northern hemisphere - north of 45°N, including Arctic
     * For studies of Bering Sea area.
     */
    public const EPSG_WGS_84_NORTH_POLE_LAEA_BERING_SEA = 'urn:ogc:def:crs:EPSG::3571';

    /**
     * WGS 84 / North Pole LAEA Canada
     * Extent: Northern hemisphere - north of 45°N, including Arctic
     * For studies of Canadian Arctic area.
     */
    public const EPSG_WGS_84_NORTH_POLE_LAEA_CANADA = 'urn:ogc:def:crs:EPSG::3573';

    /**
     * WGS 84 / North Pole LAEA Europe
     * Extent: Northern hemisphere - north of 45°N, including Arctic
     * For studies of north European Arctic area.
     */
    public const EPSG_WGS_84_NORTH_POLE_LAEA_EUROPE = 'urn:ogc:def:crs:EPSG::3575';

    /**
     * WGS 84 / North Pole LAEA Russia
     * Extent: Northern hemisphere - north of 45°N, including Arctic
     * For studies of Russian Arctic area.
     */
    public const EPSG_WGS_84_NORTH_POLE_LAEA_RUSSIA = 'urn:ogc:def:crs:EPSG::3576';

    /**
     * WGS 84 / Orissa
     * Extent: India - Odisha (Orissa).
     */
    public const EPSG_WGS_84_ORISSA = 'urn:ogc:def:crs:EPSG::7772';

    /**
     * WGS 84 / PDC Mercator
     * Extent: Pacific Ocean - American Samoa, Antarctica, Australia, Brunei Darussalam, Cambodia, Canada, Chile,
     * China, China - Hong Kong, China - Macao, Cook Islands, Ecuador, Fiji, French Polynesia, Guam, Indonesia, Japan,
     * Kiribati, Democratic People's Republic of Korea (North Korea), Republic of Korea (South Korea), Malaysia,
     * Marshall Islands, Federated States of Micronesia, Nauru, New Caledonia, New Zealand, Niue, Norfolk Island,
     * Northern Mariana Islands, Palau, Panama, Papua New Guinea (PNG), Peru, Philippines, Pitcairn, Russia, Samoa,
     * Singapore, Solomon Islands, Taiwan, Thailand, Tokelau, Tonga, Tuvalu, USA, United States Minor Outlying Islands,
     * Vanuatu, Venezuela, Vietnam, Wallis and Futuna.
     */
    public const EPSG_WGS_84_PDC_MERCATOR = 'urn:ogc:def:crs:EPSG::3832';

    /**
     * WGS 84 / Pseudo-Mercator
     * Extent: World between 85.06°S and 85.06°N
     * Not a recognised geodetic system. Uses spherical development of ellipsoidal coordinates. Relative to WGS 84 /
     * World Mercator (CRS code 3395) gives errors of 0.7 percent in scale and differences in northing of up to 43km in
     * the map (21km on the ground).
     */
    public const EPSG_WGS_84_PSEUDO_MERCATOR = 'urn:ogc:def:crs:EPSG::3857';

    /**
     * WGS 84 / Punjab
     * Extent: India - Punjab including Chandigarh.
     */
    public const EPSG_WGS_84_PUNJAB = 'urn:ogc:def:crs:EPSG::7773';

    /**
     * WGS 84 / Rajasthan
     * Extent: India - Rajasthan.
     */
    public const EPSG_WGS_84_RAJASTHAN = 'urn:ogc:def:crs:EPSG::7774';

    /**
     * WGS 84 / SCAR IMW SP19-20
     * Extent: Antarctica - 60°S to 64°S and 72°W to 60°W.
     */
    public const EPSG_WGS_84_SCAR_IMW_SP19_20 = 'urn:ogc:def:crs:EPSG::3204';

    /**
     * WGS 84 / SCAR IMW SP21-22
     * Extent: Antarctica - 60°S to 64°S and 60°W to 48°W.
     */
    public const EPSG_WGS_84_SCAR_IMW_SP21_22 = 'urn:ogc:def:crs:EPSG::3205';

    /**
     * WGS 84 / SCAR IMW SP23-24
     * Extent: Antarctica - 60°S to 64°S and 48°W to 36°W.
     */
    public const EPSG_WGS_84_SCAR_IMW_SP23_24 = 'urn:ogc:def:crs:EPSG::3206';

    /**
     * WGS 84 / SCAR IMW SQ01-02
     * Extent: Antarctica - 64°S to 68°S and 180°W to 168°W.
     */
    public const EPSG_WGS_84_SCAR_IMW_SQ01_02 = 'urn:ogc:def:crs:EPSG::3207';

    /**
     * WGS 84 / SCAR IMW SQ19-20
     * Extent: Antarctica - 64°S to 68°S and 72°W to 60°W.
     */
    public const EPSG_WGS_84_SCAR_IMW_SQ19_20 = 'urn:ogc:def:crs:EPSG::3208';

    /**
     * WGS 84 / SCAR IMW SQ21-22
     * Extent: Antarctica - 64°S to 68°S and 60°W to 48°W.
     */
    public const EPSG_WGS_84_SCAR_IMW_SQ21_22 = 'urn:ogc:def:crs:EPSG::3209';

    /**
     * WGS 84 / SCAR IMW SQ37-38
     * Extent: Antarctica - 64°S to 68°S and 36°E to 48°E.
     */
    public const EPSG_WGS_84_SCAR_IMW_SQ37_38 = 'urn:ogc:def:crs:EPSG::3210';

    /**
     * WGS 84 / SCAR IMW SQ39-40
     * Extent: Antarctica - 64°S to 68°S and 48°E to 60°E.
     */
    public const EPSG_WGS_84_SCAR_IMW_SQ39_40 = 'urn:ogc:def:crs:EPSG::3211';

    /**
     * WGS 84 / SCAR IMW SQ41-42
     * Extent: Antarctica - 64°S to 68°S and 60°E to 72°E.
     */
    public const EPSG_WGS_84_SCAR_IMW_SQ41_42 = 'urn:ogc:def:crs:EPSG::3212';

    /**
     * WGS 84 / SCAR IMW SQ43-44
     * Extent: Antarctica - 64°S to 68°S and 72°E to 84°E.
     */
    public const EPSG_WGS_84_SCAR_IMW_SQ43_44 = 'urn:ogc:def:crs:EPSG::3213';

    /**
     * WGS 84 / SCAR IMW SQ45-46
     * Extent: Antarctica - 64°S to 68°S and 84°E to 96°E.
     */
    public const EPSG_WGS_84_SCAR_IMW_SQ45_46 = 'urn:ogc:def:crs:EPSG::3214';

    /**
     * WGS 84 / SCAR IMW SQ47-48
     * Extent: Antarctica - 64°S to 68°S and 96°E to 108°E.
     */
    public const EPSG_WGS_84_SCAR_IMW_SQ47_48 = 'urn:ogc:def:crs:EPSG::3215';

    /**
     * WGS 84 / SCAR IMW SQ49-50
     * Extent: Antarctica - 64°S to 68°S and 108°E to 120°E.
     */
    public const EPSG_WGS_84_SCAR_IMW_SQ49_50 = 'urn:ogc:def:crs:EPSG::3216';

    /**
     * WGS 84 / SCAR IMW SQ51-52
     * Extent: Antarctica - 64°S to 68°S and 120°E to 132°E.
     */
    public const EPSG_WGS_84_SCAR_IMW_SQ51_52 = 'urn:ogc:def:crs:EPSG::3217';

    /**
     * WGS 84 / SCAR IMW SQ53-54
     * Extent: Antarctica - 64°S to 68°S and 132°E to 144°E.
     */
    public const EPSG_WGS_84_SCAR_IMW_SQ53_54 = 'urn:ogc:def:crs:EPSG::3218';

    /**
     * WGS 84 / SCAR IMW SQ55-56
     * Extent: Antarctica - 64°S to 68°S and 144°E to 156°E.
     */
    public const EPSG_WGS_84_SCAR_IMW_SQ55_56 = 'urn:ogc:def:crs:EPSG::3219';

    /**
     * WGS 84 / SCAR IMW SQ57-58
     * Extent: Antarctica - 64°S to 68°S and 156°E to 168°E.
     */
    public const EPSG_WGS_84_SCAR_IMW_SQ57_58 = 'urn:ogc:def:crs:EPSG::3220';

    /**
     * WGS 84 / SCAR IMW SR13-14
     * Extent: Antarctica - 68°S to 72°S and 108°W to 96°W.
     */
    public const EPSG_WGS_84_SCAR_IMW_SR13_14 = 'urn:ogc:def:crs:EPSG::3221';

    /**
     * WGS 84 / SCAR IMW SR15-16
     * Extent: Antarctica - 68°S to 72°S and 96°W to 84°W.
     */
    public const EPSG_WGS_84_SCAR_IMW_SR15_16 = 'urn:ogc:def:crs:EPSG::3222';

    /**
     * WGS 84 / SCAR IMW SR17-18
     * Extent: Antarctica - 68°S to 72°S and 84°W to 72°W.
     */
    public const EPSG_WGS_84_SCAR_IMW_SR17_18 = 'urn:ogc:def:crs:EPSG::3223';

    /**
     * WGS 84 / SCAR IMW SR19-20
     * Extent: Antarctica - 68°S to 72°S and 72°W to 60°W.
     */
    public const EPSG_WGS_84_SCAR_IMW_SR19_20 = 'urn:ogc:def:crs:EPSG::3224';

    /**
     * WGS 84 / SCAR IMW SR27-28
     * Extent: Antarctica - 68°S to 72°S and 24°W to 12°W.
     */
    public const EPSG_WGS_84_SCAR_IMW_SR27_28 = 'urn:ogc:def:crs:EPSG::3225';

    /**
     * WGS 84 / SCAR IMW SR29-30
     * Extent: Antarctica - 68°S to 72°S and 12°W to 0°W.
     */
    public const EPSG_WGS_84_SCAR_IMW_SR29_30 = 'urn:ogc:def:crs:EPSG::3226';

    /**
     * WGS 84 / SCAR IMW SR31-32
     * Extent: Antarctica - 68°S to 72°S and 0°E to 12°E.
     */
    public const EPSG_WGS_84_SCAR_IMW_SR31_32 = 'urn:ogc:def:crs:EPSG::3227';

    /**
     * WGS 84 / SCAR IMW SR33-34
     * Extent: Antarctica - 68°S to 72°S and 12°E to 24°E.
     */
    public const EPSG_WGS_84_SCAR_IMW_SR33_34 = 'urn:ogc:def:crs:EPSG::3228';

    /**
     * WGS 84 / SCAR IMW SR35-36
     * Extent: Antarctica - 68°S to 72°S and 24°E to 36°E.
     */
    public const EPSG_WGS_84_SCAR_IMW_SR35_36 = 'urn:ogc:def:crs:EPSG::3229';

    /**
     * WGS 84 / SCAR IMW SR37-38
     * Extent: Antarctica - 68°S to 72°S and 36°E to 48°E.
     */
    public const EPSG_WGS_84_SCAR_IMW_SR37_38 = 'urn:ogc:def:crs:EPSG::3230';

    /**
     * WGS 84 / SCAR IMW SR39-40
     * Extent: Antarctica - 68°S to 72°S and 48°E to 60°E.
     */
    public const EPSG_WGS_84_SCAR_IMW_SR39_40 = 'urn:ogc:def:crs:EPSG::3231';

    /**
     * WGS 84 / SCAR IMW SR41-42
     * Extent: Antarctica - 68°S to 72°S and 60°E to 72°E.
     */
    public const EPSG_WGS_84_SCAR_IMW_SR41_42 = 'urn:ogc:def:crs:EPSG::3232';

    /**
     * WGS 84 / SCAR IMW SR43-44
     * Extent: Antarctica - 68°S to 72°S and 72°E to 84°E.
     */
    public const EPSG_WGS_84_SCAR_IMW_SR43_44 = 'urn:ogc:def:crs:EPSG::3233';

    /**
     * WGS 84 / SCAR IMW SR45-46
     * Extent: Antarctica - 68°S to 72°S and 84°E to 96°E.
     */
    public const EPSG_WGS_84_SCAR_IMW_SR45_46 = 'urn:ogc:def:crs:EPSG::3234';

    /**
     * WGS 84 / SCAR IMW SR47-48
     * Extent: Antarctica - 68°S to 72°S and 96°E to 108°E.
     */
    public const EPSG_WGS_84_SCAR_IMW_SR47_48 = 'urn:ogc:def:crs:EPSG::3235';

    /**
     * WGS 84 / SCAR IMW SR49-50
     * Extent: Antarctica - 68°S to 72°S and 108°E to 120°E.
     */
    public const EPSG_WGS_84_SCAR_IMW_SR49_50 = 'urn:ogc:def:crs:EPSG::3236';

    /**
     * WGS 84 / SCAR IMW SR51-52
     * Extent: Antarctica - 68°S to 72°S and 120°E to 132°E.
     */
    public const EPSG_WGS_84_SCAR_IMW_SR51_52 = 'urn:ogc:def:crs:EPSG::3237';

    /**
     * WGS 84 / SCAR IMW SR53-54
     * Extent: Antarctica - 68°S to 72°S and 132°E to 144°E.
     */
    public const EPSG_WGS_84_SCAR_IMW_SR53_54 = 'urn:ogc:def:crs:EPSG::3238';

    /**
     * WGS 84 / SCAR IMW SR55-56
     * Extent: Antarctica - 68°S to 72°S and 144°E to 156°E.
     */
    public const EPSG_WGS_84_SCAR_IMW_SR55_56 = 'urn:ogc:def:crs:EPSG::3239';

    /**
     * WGS 84 / SCAR IMW SR57-58
     * Extent: Antarctica - 68°S to 72°S and 156°E to 168°E.
     */
    public const EPSG_WGS_84_SCAR_IMW_SR57_58 = 'urn:ogc:def:crs:EPSG::3240';

    /**
     * WGS 84 / SCAR IMW SR59-60
     * Extent: Antarctica - 68°S to 72°S and 168°E to 180°E.
     */
    public const EPSG_WGS_84_SCAR_IMW_SR59_60 = 'urn:ogc:def:crs:EPSG::3241';

    /**
     * WGS 84 / SCAR IMW SS04-06
     * Extent: Antarctica - 72°S to 76°S and 162°W to 144°W.
     */
    public const EPSG_WGS_84_SCAR_IMW_SS04_06 = 'urn:ogc:def:crs:EPSG::3242';

    /**
     * WGS 84 / SCAR IMW SS07-09
     * Extent: Antarctica - 72°S to 76°S and 144°W to 126°W.
     */
    public const EPSG_WGS_84_SCAR_IMW_SS07_09 = 'urn:ogc:def:crs:EPSG::3243';

    /**
     * WGS 84 / SCAR IMW SS10-12
     * Extent: Antarctica - 72°S to 76°S and 126°W to 108°W.
     */
    public const EPSG_WGS_84_SCAR_IMW_SS10_12 = 'urn:ogc:def:crs:EPSG::3244';

    /**
     * WGS 84 / SCAR IMW SS13-15
     * Extent: Antarctica - 72°S to 76°S and 108°W to 90°W.
     */
    public const EPSG_WGS_84_SCAR_IMW_SS13_15 = 'urn:ogc:def:crs:EPSG::3245';

    /**
     * WGS 84 / SCAR IMW SS16-18
     * Extent: Antarctica - 72°S to 76°S and 90°W to 72°W.
     */
    public const EPSG_WGS_84_SCAR_IMW_SS16_18 = 'urn:ogc:def:crs:EPSG::3246';

    /**
     * WGS 84 / SCAR IMW SS19-21
     * Extent: Antarctica - 72°S to 76°S and 72°W to 54°W.
     */
    public const EPSG_WGS_84_SCAR_IMW_SS19_21 = 'urn:ogc:def:crs:EPSG::3247';

    /**
     * WGS 84 / SCAR IMW SS25-27
     * Extent: Antarctica - 72°S to 76°S and 36°W to 18°W.
     */
    public const EPSG_WGS_84_SCAR_IMW_SS25_27 = 'urn:ogc:def:crs:EPSG::3248';

    /**
     * WGS 84 / SCAR IMW SS28-30
     * Extent: Antarctica - 72°S to 76°S and 18°W to 0°W.
     */
    public const EPSG_WGS_84_SCAR_IMW_SS28_30 = 'urn:ogc:def:crs:EPSG::3249';

    /**
     * WGS 84 / SCAR IMW SS31-33
     * Extent: Antarctica - 72°S to 76°S and 0°E to 18°E.
     */
    public const EPSG_WGS_84_SCAR_IMW_SS31_33 = 'urn:ogc:def:crs:EPSG::3250';

    /**
     * WGS 84 / SCAR IMW SS34-36
     * Extent: Antarctica - 72°S to 76°S and 18°E to 36°E.
     */
    public const EPSG_WGS_84_SCAR_IMW_SS34_36 = 'urn:ogc:def:crs:EPSG::3251';

    /**
     * WGS 84 / SCAR IMW SS37-39
     * Extent: Antarctica - 72°S to 76°S and 36°E to 54°E.
     */
    public const EPSG_WGS_84_SCAR_IMW_SS37_39 = 'urn:ogc:def:crs:EPSG::3252';

    /**
     * WGS 84 / SCAR IMW SS40-42
     * Extent: Antarctica - 72°S to 76°S and 54°E to 72°E.
     */
    public const EPSG_WGS_84_SCAR_IMW_SS40_42 = 'urn:ogc:def:crs:EPSG::3253';

    /**
     * WGS 84 / SCAR IMW SS43-45
     * Extent: Antarctica - 72°S to 76°S and 72°E to 90°E.
     */
    public const EPSG_WGS_84_SCAR_IMW_SS43_45 = 'urn:ogc:def:crs:EPSG::3254';

    /**
     * WGS 84 / SCAR IMW SS46-48
     * Extent: Antarctica - 72°S to 76°S and 90°E to 108°E.
     */
    public const EPSG_WGS_84_SCAR_IMW_SS46_48 = 'urn:ogc:def:crs:EPSG::3255';

    /**
     * WGS 84 / SCAR IMW SS49-51
     * Extent: Antarctica - 72°S to 76°S and 108°E to 126°E.
     */
    public const EPSG_WGS_84_SCAR_IMW_SS49_51 = 'urn:ogc:def:crs:EPSG::3256';

    /**
     * WGS 84 / SCAR IMW SS52-54
     * Extent: Antarctica - 72°S to 76°S and 126°E to 144°E.
     */
    public const EPSG_WGS_84_SCAR_IMW_SS52_54 = 'urn:ogc:def:crs:EPSG::3257';

    /**
     * WGS 84 / SCAR IMW SS55-57
     * Extent: Antarctica - 72°S to 76°S and 144°E to 162°E.
     */
    public const EPSG_WGS_84_SCAR_IMW_SS55_57 = 'urn:ogc:def:crs:EPSG::3258';

    /**
     * WGS 84 / SCAR IMW SS58-60
     * Extent: Antarctica - 72°S to 76°S and 162°E to 180°E.
     */
    public const EPSG_WGS_84_SCAR_IMW_SS58_60 = 'urn:ogc:def:crs:EPSG::3259';

    /**
     * WGS 84 / SCAR IMW ST01-04
     * Extent: Antarctica - 76°S to 80°S and 180°W to 156°W.
     */
    public const EPSG_WGS_84_SCAR_IMW_ST01_04 = 'urn:ogc:def:crs:EPSG::3260';

    /**
     * WGS 84 / SCAR IMW ST05-08
     * Extent: Antarctica - 76°S to 80°S and 156°W to 132°W.
     */
    public const EPSG_WGS_84_SCAR_IMW_ST05_08 = 'urn:ogc:def:crs:EPSG::3261';

    /**
     * WGS 84 / SCAR IMW ST09-12
     * Extent: Antarctica - 76°S to 80°S and 132°W to 108°W.
     */
    public const EPSG_WGS_84_SCAR_IMW_ST09_12 = 'urn:ogc:def:crs:EPSG::3262';

    /**
     * WGS 84 / SCAR IMW ST13-16
     * Extent: Antarctica - 76°S to 80°S and 108°W to 84°W.
     */
    public const EPSG_WGS_84_SCAR_IMW_ST13_16 = 'urn:ogc:def:crs:EPSG::3263';

    /**
     * WGS 84 / SCAR IMW ST17-20
     * Extent: Antarctica - 76°S to 80°S and 84°W to 60°W.
     */
    public const EPSG_WGS_84_SCAR_IMW_ST17_20 = 'urn:ogc:def:crs:EPSG::3264';

    /**
     * WGS 84 / SCAR IMW ST21-24
     * Extent: Antarctica - 76°S to 80°S and 60°W to 36°W.
     */
    public const EPSG_WGS_84_SCAR_IMW_ST21_24 = 'urn:ogc:def:crs:EPSG::3265';

    /**
     * WGS 84 / SCAR IMW ST25-28
     * Extent: Antarctica - 76°S to 80°S and 36°W to 12°W.
     */
    public const EPSG_WGS_84_SCAR_IMW_ST25_28 = 'urn:ogc:def:crs:EPSG::3266';

    /**
     * WGS 84 / SCAR IMW ST29-32
     * Extent: Antarctica - 76°S to 80°S and 12°W to 12°E.
     */
    public const EPSG_WGS_84_SCAR_IMW_ST29_32 = 'urn:ogc:def:crs:EPSG::3267';

    /**
     * WGS 84 / SCAR IMW ST33-36
     * Extent: Antarctica - 76°S to 80°S and 12°E to 36°E.
     */
    public const EPSG_WGS_84_SCAR_IMW_ST33_36 = 'urn:ogc:def:crs:EPSG::3268';

    /**
     * WGS 84 / SCAR IMW ST37-40
     * Extent: Antarctica - 76°S to 80°S and 36°E to 60°E.
     */
    public const EPSG_WGS_84_SCAR_IMW_ST37_40 = 'urn:ogc:def:crs:EPSG::3269';

    /**
     * WGS 84 / SCAR IMW ST41-44
     * Extent: Antarctica - 76°S to 80°S and 60°E to 84°E.
     */
    public const EPSG_WGS_84_SCAR_IMW_ST41_44 = 'urn:ogc:def:crs:EPSG::3270';

    /**
     * WGS 84 / SCAR IMW ST45-48
     * Extent: Antarctica - 76°S to 80°S and 84°E to 108°E.
     */
    public const EPSG_WGS_84_SCAR_IMW_ST45_48 = 'urn:ogc:def:crs:EPSG::3271';

    /**
     * WGS 84 / SCAR IMW ST49-52
     * Extent: Antarctica - 76°S to 80°S and 108°E to 132°E.
     */
    public const EPSG_WGS_84_SCAR_IMW_ST49_52 = 'urn:ogc:def:crs:EPSG::3272';

    /**
     * WGS 84 / SCAR IMW ST53-56
     * Extent: Antarctica - 76°S to 80°S and 132°E to 156°E.
     */
    public const EPSG_WGS_84_SCAR_IMW_ST53_56 = 'urn:ogc:def:crs:EPSG::3273';

    /**
     * WGS 84 / SCAR IMW ST57-60
     * Extent: Antarctica - 76°S to 80°S and 156°E to 180°E.
     */
    public const EPSG_WGS_84_SCAR_IMW_ST57_60 = 'urn:ogc:def:crs:EPSG::3274';

    /**
     * WGS 84 / SCAR IMW SU01-05
     * Extent: Antarctica - 80°S to 84°S and 180°W to 150°W.
     */
    public const EPSG_WGS_84_SCAR_IMW_SU01_05 = 'urn:ogc:def:crs:EPSG::3275';

    /**
     * WGS 84 / SCAR IMW SU06-10
     * Extent: Antarctica - 80°S to 84°S and 150°W to 120°W.
     */
    public const EPSG_WGS_84_SCAR_IMW_SU06_10 = 'urn:ogc:def:crs:EPSG::3276';

    /**
     * WGS 84 / SCAR IMW SU11-15
     * Extent: Antarctica - 80°S to 84°S and 120°W to 90°W.
     */
    public const EPSG_WGS_84_SCAR_IMW_SU11_15 = 'urn:ogc:def:crs:EPSG::3277';

    /**
     * WGS 84 / SCAR IMW SU16-20
     * Extent: Antarctica - 80°S to 84°S and 90°W to 60°W.
     */
    public const EPSG_WGS_84_SCAR_IMW_SU16_20 = 'urn:ogc:def:crs:EPSG::3278';

    /**
     * WGS 84 / SCAR IMW SU21-25
     * Extent: Antarctica - 80°S to 84°S and 60°W to 30°W.
     */
    public const EPSG_WGS_84_SCAR_IMW_SU21_25 = 'urn:ogc:def:crs:EPSG::3279';

    /**
     * WGS 84 / SCAR IMW SU26-30
     * Extent: Antarctica - 80°S to 84°S and 30°W to 0°W.
     */
    public const EPSG_WGS_84_SCAR_IMW_SU26_30 = 'urn:ogc:def:crs:EPSG::3280';

    /**
     * WGS 84 / SCAR IMW SU31-35
     * Extent: Antarctica - 80°S to 84°S and 0°E to 30°E.
     */
    public const EPSG_WGS_84_SCAR_IMW_SU31_35 = 'urn:ogc:def:crs:EPSG::3281';

    /**
     * WGS 84 / SCAR IMW SU36-40
     * Extent: Antarctica - 80°S to 84°S and 30°E to 60°E.
     */
    public const EPSG_WGS_84_SCAR_IMW_SU36_40 = 'urn:ogc:def:crs:EPSG::3282';

    /**
     * WGS 84 / SCAR IMW SU41-45
     * Extent: Antarctica - 80°S to 84°S and 60°E to 90°E.
     */
    public const EPSG_WGS_84_SCAR_IMW_SU41_45 = 'urn:ogc:def:crs:EPSG::3283';

    /**
     * WGS 84 / SCAR IMW SU46-50
     * Extent: Antarctica - 80°S to 84°S and 90°E to 120°E.
     */
    public const EPSG_WGS_84_SCAR_IMW_SU46_50 = 'urn:ogc:def:crs:EPSG::3284';

    /**
     * WGS 84 / SCAR IMW SU51-55
     * Extent: Antarctica - 80°S to 84°S and 120°E to 150°E.
     */
    public const EPSG_WGS_84_SCAR_IMW_SU51_55 = 'urn:ogc:def:crs:EPSG::3285';

    /**
     * WGS 84 / SCAR IMW SU56-60
     * Extent: Antarctica - 80°S to 84°S and 150°E to 180°E.
     */
    public const EPSG_WGS_84_SCAR_IMW_SU56_60 = 'urn:ogc:def:crs:EPSG::3286';

    /**
     * WGS 84 / SCAR IMW SV01-10
     * Extent: Antarctica - 84°S to 88°S and 180°W to 120°W.
     */
    public const EPSG_WGS_84_SCAR_IMW_SV01_10 = 'urn:ogc:def:crs:EPSG::3287';

    /**
     * WGS 84 / SCAR IMW SV11-20
     * Extent: Antarctica - 84°S to 88°S and 120°W to 60°W.
     */
    public const EPSG_WGS_84_SCAR_IMW_SV11_20 = 'urn:ogc:def:crs:EPSG::3288';

    /**
     * WGS 84 / SCAR IMW SV21-30
     * Extent: Antarctica - 84°S to 88°S and 60°W to 0°W.
     */
    public const EPSG_WGS_84_SCAR_IMW_SV21_30 = 'urn:ogc:def:crs:EPSG::3289';

    /**
     * WGS 84 / SCAR IMW SV31-40
     * Extent: Antarctica - 84°S to 88°S and 0°E to 60°E.
     */
    public const EPSG_WGS_84_SCAR_IMW_SV31_40 = 'urn:ogc:def:crs:EPSG::3290';

    /**
     * WGS 84 / SCAR IMW SV41-50
     * Extent: Antarctica - 84°S to 88°S and 60°E to 120°E.
     */
    public const EPSG_WGS_84_SCAR_IMW_SV41_50 = 'urn:ogc:def:crs:EPSG::3291';

    /**
     * WGS 84 / SCAR IMW SV51-60
     * Extent: Antarctica - 84°S to 88°S and 120°E to 180°E.
     */
    public const EPSG_WGS_84_SCAR_IMW_SV51_60 = 'urn:ogc:def:crs:EPSG::3292';

    /**
     * WGS 84 / SCAR IMW SW01-60
     * Extent: Antarctica - 88°S to 90°S and 180°W to 180°E.
     */
    public const EPSG_WGS_84_SCAR_IMW_SW01_60 = 'urn:ogc:def:crs:EPSG::3293';

    /**
     * WGS 84 / Sikkim
     * Extent: India - Sikkim.
     */
    public const EPSG_WGS_84_SIKKIM = 'urn:ogc:def:crs:EPSG::7784';

    /**
     * WGS 84 / South Georgia Lambert
     * Extent: South Georgia and the South Sandwich Islands - South Georgia onshore.
     */
    public const EPSG_WGS_84_SOUTH_GEORGIA_LAMBERT = 'urn:ogc:def:crs:EPSG::3762';

    /**
     * WGS 84 / TM 116 SE
     * Extent: Indonesia - offshore Madura Strait and western Bali Sea
     * Used by BP for Terang-Sirasun.
     */
    public const EPSG_WGS_84_TM_116_SE = 'urn:ogc:def:crs:EPSG::2309';

    /**
     * WGS 84 / TM 12 SE
     * Extent: Angola - offshore north of 8°S - including blocks 0, 1, 2, 14, 15, 17, 18 north of 8°S and 32; onshore
     * Soyo area
     * Used for Angola LNG project. May be considered to be consistent with RSAO13 / TM 12 SE (CRS code 9159) exactly
     * at epoch 2010.90, deteriorating by 2.2cm per year. Camacupa 1948 TM 12 SE (CRS code 22092) used for geoscience
     * in blocks awarded pre-2015.
     */
    public const EPSG_WGS_84_TM_12_SE = 'urn:ogc:def:crs:EPSG::5842';

    /**
     * WGS 84 / TM 132 SE
     * Extent: Indonesia - West Papua (formerly Irian Jaya) - Tangguh.
     */
    public const EPSG_WGS_84_TM_132_SE = 'urn:ogc:def:crs:EPSG::2310';

    /**
     * WGS 84 / TM 36 SE
     * Extent: Mozambique - offshore.
     */
    public const EPSG_WGS_84_TM_36_SE = 'urn:ogc:def:crs:EPSG::32766';

    /**
     * WGS 84 / TM 6 NE
     * Extent: Nigeria - offshore
     * Used for oil exploration beyond the contintental shelf by ExxonMobil and with effect from March 2004 by Total
     * for all offshore areas.
     */
    public const EPSG_WGS_84_TM_6_NE = 'urn:ogc:def:crs:EPSG::2311';

    /**
     * WGS 84 / TM 60 SW
     * Extent: Falkland Islands (Malvinas) - offshore - between 63°W and 57°W.
     */
    public const EPSG_WGS_84_TM_60_SW = 'urn:ogc:def:crs:EPSG::6703';

    /**
     * WGS 84 / TM 90 NE
     * Extent: Bangladesh
     * Replaced use of Gulshan 303 / TM 90 NE (CRS code 3106) in Survey of Bangladesh from 2010. Not part of the global
     * UTM grid system (for which see CRSs 32645 and 32646).
     */
    public const EPSG_WGS_84_TM_90_NE = 'urn:ogc:def:crs:EPSG::9680';

    /**
     * WGS 84 / TM Zone 20N (ftUS)
     * Extent: Trinidad and Tobago - offshore west of 60°W
     * Note: this CRS uses US survet feet, not international feet.
     */
    public const EPSG_WGS_84_TM_ZONE_20N_FTUS = 'urn:ogc:def:crs:EPSG::8035';

    /**
     * WGS 84 / TM Zone 21N (ftUS)
     * Extent: Trinidad and Tobago - offshore east of 60°W
     * Note: this CRS uses US survet feet, not international feet.
     */
    public const EPSG_WGS_84_TM_ZONE_21N_FTUS = 'urn:ogc:def:crs:EPSG::8036';

    /**
     * WGS 84 / TMzn35N
     * Extent: Moldova - west of 30°E
     * In Moldova for mapping at 1:10,000 and larger and cadastre use MOLDREF99 / Moldova TM (CRS code 4026).
     */
    public const EPSG_WGS_84_TMZN35N = 'urn:ogc:def:crs:EPSG::4037';

    /**
     * WGS 84 / TMzn36N
     * Extent: Moldova - east of 30°E
     * In Moldova for mapping at 1:10,000 and larger and cadastre use MOLDREF99 / Moldova TM (CRS code 4026).
     */
    public const EPSG_WGS_84_TMZN36N = 'urn:ogc:def:crs:EPSG::4038';

    /**
     * WGS 84 / Tamil Nadu
     * Extent: India - Tamil Nadu; Pudacherry and Karaikal areas of Pudacherry territory.
     */
    public const EPSG_WGS_84_TAMIL_NADU = 'urn:ogc:def:crs:EPSG::7785';

    /**
     * WGS 84 / Tripura
     * Extent: India - Tripura.
     */
    public const EPSG_WGS_84_TRIPURA = 'urn:ogc:def:crs:EPSG::7786';

    /**
     * WGS 84 / UPS North (E,N)
     * Extent: Northern hemisphere - north of 60°N, including Arctic
     * See CRS 32661 for a similar system having axes and coordinates in the order Northing-Easting.
     */
    public const EPSG_WGS_84_UPS_NORTH_E_N = 'urn:ogc:def:crs:EPSG::5041';

    /**
     * WGS 84 / UPS North (N,E)
     * Extent: Northern hemisphere - north of 60°N, including Arctic
     * See CRS 5041 for a similar system used by NATO having axes and coordinates in the order Easting-Northing.
     */
    public const EPSG_WGS_84_UPS_NORTH_N_E = 'urn:ogc:def:crs:EPSG::32661';

    /**
     * WGS 84 / UPS South (E,N)
     * Extent: Southern hemisphere - south of 60°S - Antarctica
     * See CRS 32761 for a similar system having axes and coordinates in the order Northing-Easting.
     */
    public const EPSG_WGS_84_UPS_SOUTH_E_N = 'urn:ogc:def:crs:EPSG::5042';

    /**
     * WGS 84 / UPS South (N,E)
     * Extent: Southern hemisphere - south of 60°S - Antarctica
     * See CRS 5042 for a similar system used by NATO having axes and coordinates in the order Easting-Northing.
     */
    public const EPSG_WGS_84_UPS_SOUTH_N_E = 'urn:ogc:def:crs:EPSG::32761';

    /**
     * WGS 84 / USGS Transantarctic Mountains
     * Extent: Antarctica - Transantarctic mountains north of 80°S.
     */
    public const EPSG_WGS_84_USGS_TRANSANTARCTIC_MOUNTAINS = 'urn:ogc:def:crs:EPSG::3294';

    /**
     * WGS 84 / UTM grid system (northern hemisphere)
     * Extent: Northern hemisphere between equator and 84°N
     * Use WGS 84 / UTM zone xx N (codes 32601-32660) for use outwith zone boundary or when easting is not prefixed by
     * zone number.
     */
    public const EPSG_WGS_84_UTM_GRID_SYSTEM_NORTHERN_HEMISPHERE = 'urn:ogc:def:crs:EPSG::32600';

    /**
     * WGS 84 / UTM grid system (southern hemisphere)
     * Extent: Southern hemisphere between equator and 80°S
     * Use WGS 84 / UTM zone xx S (codes 32701-32760) for use outwith zone boundary or when easting is not prefixed by
     * zone number.
     */
    public const EPSG_WGS_84_UTM_GRID_SYSTEM_SOUTHERN_HEMISPHERE = 'urn:ogc:def:crs:EPSG::32700';

    /**
     * WGS 84 / UTM zone 10N
     * Extent: Between 126°W and 120°W, northern hemisphere between equator and 84°N. Canada - British Columbia
     * (BC); Northwest Territories (NWT); Nunavut; Yukon. USA - Alaska (AK).
     */
    public const EPSG_WGS_84_UTM_ZONE_10N = 'urn:ogc:def:crs:EPSG::32610';

    /**
     * WGS 84 / UTM zone 10S
     * Extent: Between 126°W and 120°W, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_84_UTM_ZONE_10S = 'urn:ogc:def:crs:EPSG::32710';

    /**
     * WGS 84 / UTM zone 11N
     * Extent: Between 120°W and 114°W, northern hemisphere between equator and 84°N. Canada - Alberta; British
     * Columbia (BC); Northwest Territories (NWT); Nunavut. Mexico. USA.
     */
    public const EPSG_WGS_84_UTM_ZONE_11N = 'urn:ogc:def:crs:EPSG::32611';

    /**
     * WGS 84 / UTM zone 11S
     * Extent: Between 120°W and 114°W, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_84_UTM_ZONE_11S = 'urn:ogc:def:crs:EPSG::32711';

    /**
     * WGS 84 / UTM zone 12N
     * Extent: Between 114°W and 108°W, northern hemisphere between equator and 84°N. Canada - Alberta; Northwest
     * Territories (NWT); Nunavut; Saskatchewan. Mexico. USA.
     */
    public const EPSG_WGS_84_UTM_ZONE_12N = 'urn:ogc:def:crs:EPSG::32612';

    /**
     * WGS 84 / UTM zone 12S
     * Extent: Between 114°W and 108°W, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_84_UTM_ZONE_12S = 'urn:ogc:def:crs:EPSG::32712';

    /**
     * WGS 84 / UTM zone 13N
     * Extent: Between 108°W and 102°W, northern hemisphere between equator and 84°N. Canada - Northwest Territories
     * (NWT); Nunavut; Saskatchewan. Mexico. USA.
     */
    public const EPSG_WGS_84_UTM_ZONE_13N = 'urn:ogc:def:crs:EPSG::32613';

    /**
     * WGS 84 / UTM zone 13S
     * Extent: Between 108°W and 102°W, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_84_UTM_ZONE_13S = 'urn:ogc:def:crs:EPSG::32713';

    /**
     * WGS 84 / UTM zone 14N
     * Extent: Between 102°W and 96°W, northern hemisphere between equator and 84°N. Canada - Manitoba; Nunavut;
     * Saskatchewan. Mexico. USA.
     */
    public const EPSG_WGS_84_UTM_ZONE_14N = 'urn:ogc:def:crs:EPSG::32614';

    /**
     * WGS 84 / UTM zone 14S
     * Extent: Between 102°W and 96°W, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_84_UTM_ZONE_14S = 'urn:ogc:def:crs:EPSG::32714';

    /**
     * WGS 84 / UTM zone 15N
     * Extent: Between 96°W and 90°W, northern hemisphere between equator and 84°N. Canada - Manitoba; Nunavut;
     * Ontario. Ecuador -Galapagos. Guatemala. Mexico. USA.
     */
    public const EPSG_WGS_84_UTM_ZONE_15N = 'urn:ogc:def:crs:EPSG::32615';

    /**
     * WGS 84 / UTM zone 15S
     * Extent: Between 96°W and 90°W, southern hemisphere between 80°S and equator. Ecuador - Galapagos.
     */
    public const EPSG_WGS_84_UTM_ZONE_15S = 'urn:ogc:def:crs:EPSG::32715';

    /**
     * WGS 84 / UTM zone 16N
     * Extent: Between 90°W and 84°W, northern hemisphere between equator and 84°N. Belize. Canada - Manitoba;
     * Nunavut; Ontario. Costa Rica. Cuba. Ecuador - Galapagos. El Salvador. Guatemala. Honduras. Mexico. Nicaragua.
     * USA.
     */
    public const EPSG_WGS_84_UTM_ZONE_16N = 'urn:ogc:def:crs:EPSG::32616';

    /**
     * WGS 84 / UTM zone 16S
     * Extent: Between 90°W and 84°W, southern hemisphere between 80°S and equator. Ecuador - Galapagos.
     */
    public const EPSG_WGS_84_UTM_ZONE_16S = 'urn:ogc:def:crs:EPSG::32716';

    /**
     * WGS 84 / UTM zone 17N
     * Extent: Between 84°W and 78°W, northern hemisphere between equator and 84°N. Bahamas. Ecuador - north of
     * equator. Canada - Nunavut; Ontario; Quebec. Cayman Islands. Colombia. Costa Rica. Cuba. Jamaica. Nicaragua.
     * Panama. USA.
     */
    public const EPSG_WGS_84_UTM_ZONE_17N = 'urn:ogc:def:crs:EPSG::32617';

    /**
     * WGS 84 / UTM zone 17S
     * Extent: Between 84°W and 78°W, southern hemisphere between 80°S and equator. Ecuador. Peru.
     */
    public const EPSG_WGS_84_UTM_ZONE_17S = 'urn:ogc:def:crs:EPSG::32717';

    /**
     * WGS 84 / UTM zone 18N
     * Extent: Between 78°W and 72°W, northern hemisphere between equator and 84°N. Bahamas. Canada - Nunavut;
     * Ontario; Quebec. Colombia. Cuba. Ecuador. Greenland. Haiti. Jamaica. Panama. Turks and Caicos Islands. USA.
     * Venezuela.
     */
    public const EPSG_WGS_84_UTM_ZONE_18N = 'urn:ogc:def:crs:EPSG::32618';

    /**
     * WGS 84 / UTM zone 18S
     * Extent: Between 78°W and 72°W, southern hemisphere between 80°S and equator. Argentina. Brazil. Chile.
     * Colombia. Ecuador. Peru.
     */
    public const EPSG_WGS_84_UTM_ZONE_18S = 'urn:ogc:def:crs:EPSG::32718';

    /**
     * WGS 84 / UTM zone 19N
     * Extent: Between 72°W and 66°W, northern hemisphere between equator and 84°N. Aruba. Bahamas. Brazil. Canada -
     * New Brunswick (NB); Labrador; Nunavut; Nova Scotia (NS); Quebec. Colombia. Dominican Republic. Greenland.
     * Netherlands Antilles. Puerto Rico. Turks and Caicos Islands. United States. Venezuela.
     */
    public const EPSG_WGS_84_UTM_ZONE_19N = 'urn:ogc:def:crs:EPSG::32619';

    /**
     * WGS 84 / UTM zone 19S
     * Extent: Between 72°W and 66°W, southern hemisphere between 80°S and equator. Argentina. Bolivia. Brazil.
     * Chile. Colombia. Peru.
     */
    public const EPSG_WGS_84_UTM_ZONE_19S = 'urn:ogc:def:crs:EPSG::32719';

    /**
     * WGS 84 / UTM zone 1N
     * Extent: Between 180°W and 174°W, northern hemisphere between equator and 84°N. Russia; USA - Alaska (AK).
     */
    public const EPSG_WGS_84_UTM_ZONE_1N = 'urn:ogc:def:crs:EPSG::32601';

    /**
     * WGS 84 / UTM zone 1S
     * Extent: Between 180°W and 174°W, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_84_UTM_ZONE_1S = 'urn:ogc:def:crs:EPSG::32701';

    /**
     * WGS 84 / UTM zone 20N
     * Extent: Between 66°W and 60°W, northern hemisphere between equator and 84°N. Anguilla. Antigua and Barbuda.
     * Bermuda. Brazil. British Virgin Islands. Canada - New Brunswick; Labrador; Nova Scotia; Nunavut; Prince Edward
     * Island; Quebec. Dominica. Greenland. Grenada. Guadeloupe. Guyana. Martinique. Montserrat. Puerto Rico. St Kitts
     * and Nevis. St Barthelemy. St Lucia. St Maarten, St Martin. St Vincent and the Grenadines. Trinidad and Tobago.
     * Venezuela. US Virgin Islands.
     */
    public const EPSG_WGS_84_UTM_ZONE_20N = 'urn:ogc:def:crs:EPSG::32620';

    /**
     * WGS 84 / UTM zone 20S
     * Extent: Between 66°W and 60°W, southern hemisphere between 80°S and equator. Argentina. Bolivia. Brazil.
     * Falkland Islands (Malvinas). Paraguay.
     */
    public const EPSG_WGS_84_UTM_ZONE_20S = 'urn:ogc:def:crs:EPSG::32720';

    /**
     * WGS 84 / UTM zone 21N
     * Extent: Between 60°W and 54°W, northern hemisphere between equator and 84°N. Barbados. Brazil. Canada -
     * Newfoundland and Labrador, Quebec. French Guiana. Greenland. Guyana. St Pierre and Miquelon. Suriname.
     */
    public const EPSG_WGS_84_UTM_ZONE_21N = 'urn:ogc:def:crs:EPSG::32621';

    /**
     * WGS 84 / UTM zone 21S
     * Extent: Between 60°W and 54°W, southern hemisphere between 80°S and equator. Argentina. Bolivia. Brazil.
     * Falkland Islands (Malvinas). Paraguay. Uruguay.
     */
    public const EPSG_WGS_84_UTM_ZONE_21S = 'urn:ogc:def:crs:EPSG::32721';

    /**
     * WGS 84 / UTM zone 22N
     * Extent: Between 54°W and 48°W, northern hemisphere between equator and 84°N. Brazil. Canada - Newfoundland.
     * French Guiana. Greenland.
     */
    public const EPSG_WGS_84_UTM_ZONE_22N = 'urn:ogc:def:crs:EPSG::32622';

    /**
     * WGS 84 / UTM zone 22S
     * Extent: Between 54°W and 48°W, southern hemisphere between 80°S and equator. Brazil. Uruguay.
     */
    public const EPSG_WGS_84_UTM_ZONE_22S = 'urn:ogc:def:crs:EPSG::32722';

    /**
     * WGS 84 / UTM zone 23N
     * Extent: Between 48°W and 42°W, northern hemisphere between equator and 84°N. Greenland.
     */
    public const EPSG_WGS_84_UTM_ZONE_23N = 'urn:ogc:def:crs:EPSG::32623';

    /**
     * WGS 84 / UTM zone 23S
     * Extent: Between 48°W and 42°W, southern hemisphere between 80°S and equator. Brazil.
     */
    public const EPSG_WGS_84_UTM_ZONE_23S = 'urn:ogc:def:crs:EPSG::32723';

    /**
     * WGS 84 / UTM zone 24N
     * Extent: Between 42°W and 36°W, northern hemisphere between equator and 84°N. Greenland.
     */
    public const EPSG_WGS_84_UTM_ZONE_24N = 'urn:ogc:def:crs:EPSG::32624';

    /**
     * WGS 84 / UTM zone 24S
     * Extent: Between 42°W and 36°W, southern hemisphere between 80°S and equator. Brazil. South Georgia and the
     * South Sandwich Islands.
     */
    public const EPSG_WGS_84_UTM_ZONE_24S = 'urn:ogc:def:crs:EPSG::32724';

    /**
     * WGS 84 / UTM zone 25N
     * Extent: Between 36°W and 30°W, northern hemisphere between equator and 84°N. Greenland.
     */
    public const EPSG_WGS_84_UTM_ZONE_25N = 'urn:ogc:def:crs:EPSG::32625';

    /**
     * WGS 84 / UTM zone 25S
     * Extent: Between 36°W and 30°W, southern hemisphere between 80°S and equator. Brazil.
     */
    public const EPSG_WGS_84_UTM_ZONE_25S = 'urn:ogc:def:crs:EPSG::32725';

    /**
     * WGS 84 / UTM zone 26N
     * Extent: Between 30°W and 24°W, northern hemisphere between equator and 84°N. Greenland. Iceland.
     */
    public const EPSG_WGS_84_UTM_ZONE_26N = 'urn:ogc:def:crs:EPSG::32626';

    /**
     * WGS 84 / UTM zone 26S
     * Extent: Between 30°W and 24°W, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_84_UTM_ZONE_26S = 'urn:ogc:def:crs:EPSG::32726';

    /**
     * WGS 84 / UTM zone 27N
     * Extent: Between 24°W and 18°W, northern hemisphere between equator and 84°N. Greenland. Iceland.
     */
    public const EPSG_WGS_84_UTM_ZONE_27N = 'urn:ogc:def:crs:EPSG::32627';

    /**
     * WGS 84 / UTM zone 27S
     * Extent: Between 24°W and 18°W, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_84_UTM_ZONE_27S = 'urn:ogc:def:crs:EPSG::32727';

    /**
     * WGS 84 / UTM zone 28N
     * Extent: Between 18°W and 12°W, northern hemisphere between equator and 84°N. Gambia. Greenland. Guinea.
     * Guinea-Bissau. Iceland. Ireland - offshore Porcupine Basin. Mauritania. Morocco. Senegal. Sierra Leone. Western
     * Sahara.
     */
    public const EPSG_WGS_84_UTM_ZONE_28N = 'urn:ogc:def:crs:EPSG::32628';

    /**
     * WGS 84 / UTM zone 28S
     * Extent: Between 18°W and 12°W, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_84_UTM_ZONE_28S = 'urn:ogc:def:crs:EPSG::32728';

    /**
     * WGS 84 / UTM zone 29N
     * Extent: Between 12°W and 6°W, northern hemisphere between equator and 84°N. Algeria. Côte D'Ivoire (Ivory
     * Coast). Faroe Islands. Guinea. Ireland. Jan Mayen. Liberia, Mali. Mauritania. Morocco. Portugal. Sierra Leone.
     * Spain. UK. Western Sahara.
     */
    public const EPSG_WGS_84_UTM_ZONE_29N = 'urn:ogc:def:crs:EPSG::32629';

    /**
     * WGS 84 / UTM zone 29S
     * Extent: Between 12°W and 6°W, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_84_UTM_ZONE_29S = 'urn:ogc:def:crs:EPSG::32729';

    /**
     * WGS 84 / UTM zone 2N
     * Extent: Between 174°W and 168°W, northern hemisphere between equator and 84°N. Russia; USA - Alaska (AK).
     */
    public const EPSG_WGS_84_UTM_ZONE_2N = 'urn:ogc:def:crs:EPSG::32602';

    /**
     * WGS 84 / UTM zone 2S
     * Extent: Between 174°W and 168°W, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_84_UTM_ZONE_2S = 'urn:ogc:def:crs:EPSG::32702';

    /**
     * WGS 84 / UTM zone 30N
     * Extent: Between 6°W and 0°W, northern hemisphere between equator and 84°N. Algeria. Burkina Faso. Côte'
     * Ivoire (Ivory Coast). Faroe Islands - offshore. France. Ghana. Gibraltar. Ireland - offshore Irish Sea. Mali.
     * Mauritania. Morocco. Spain. UK.
     */
    public const EPSG_WGS_84_UTM_ZONE_30N = 'urn:ogc:def:crs:EPSG::32630';

    /**
     * WGS 84 / UTM zone 30S
     * Extent: Between 6°W and 0°W, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_84_UTM_ZONE_30S = 'urn:ogc:def:crs:EPSG::32730';

    /**
     * WGS 84 / UTM zone 31N
     * Extent: Between 0°E and 6°E, northern hemisphere between equator and 84°N. Algeria. Andorra. Belgium. Benin.
     * Burkina Faso. Denmark - North Sea. France. Germany - North Sea. Ghana. Luxembourg. Mali. Netherlands. Niger.
     * Nigeria. Norway. Spain. Togo. UK - North Sea.
     */
    public const EPSG_WGS_84_UTM_ZONE_31N = 'urn:ogc:def:crs:EPSG::32631';

    /**
     * WGS 84 / UTM zone 31S
     * Extent: Between 0°E and 6°E, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_84_UTM_ZONE_31S = 'urn:ogc:def:crs:EPSG::32731';

    /**
     * WGS 84 / UTM zone 32N
     * Extent: Between 6°E and 12°E, northern hemisphere between equator and 84°N. Algeria. Austria. Cameroon.
     * Denmark. Equatorial Guinea. France. Gabon. Germany. Italy. Libya. Liechtenstein. Monaco. Netherlands. Niger.
     * Nigeria. Norway. Sao Tome and Principe. Svalbard. Sweden. Switzerland. Tunisia. Vatican City State.
     */
    public const EPSG_WGS_84_UTM_ZONE_32N = 'urn:ogc:def:crs:EPSG::32632';

    /**
     * WGS 84 / UTM zone 32S
     * Extent: Between 6°E and 12°E, southern hemisphere between 80°S and equator. Angola. Congo. Gabon. Namibia.
     */
    public const EPSG_WGS_84_UTM_ZONE_32S = 'urn:ogc:def:crs:EPSG::32732';

    /**
     * WGS 84 / UTM zone 33N
     * Extent: Between 12°E and 18°E, northern hemisphere between equator and 84°N. Austria. Bosnia and Herzegovina.
     * Cameroon. Central African Republic. Chad. Congo. Croatia. Czechia. Democratic Republic of the Congo (Zaire).
     * Gabon. Germany. Hungary. Italy. Libya. Malta. Niger. Nigeria. Norway. Poland. San Marino. Slovakia. Slovenia.
     * Svalbard. Sweden. Vatican City State.
     */
    public const EPSG_WGS_84_UTM_ZONE_33N = 'urn:ogc:def:crs:EPSG::32633';

    /**
     * WGS 84 / UTM zone 33S
     * Extent: Between 12°E and 18°E, southern hemisphere between 80°S and equator. Angola. Congo. Democratic
     * Republic of the Congo (Zaire). Gabon. Namibia. South Africa.
     */
    public const EPSG_WGS_84_UTM_ZONE_33S = 'urn:ogc:def:crs:EPSG::32733';

    /**
     * WGS 84 / UTM zone 34N
     * Extent: Between 18°E and 24°E, northern hemisphere between equator and 84°N. Albania. Belarus. Bosnia and
     * Herzegovina. Bulgaria. Central African Republic. Chad. Croatia. Democratic Republic of the Congo (Zaire).
     * Estonia. Finland. Greece. Hungary. Italy. Kosovo. Latvia. Libya. Lithuania. Montenegro. North Macedonia. Norway,
     * including Svalbard and Bjornoys. Poland. Romania. Russia. Serbia. Slovakia. Sudan. Sweden. Ukraine.
     */
    public const EPSG_WGS_84_UTM_ZONE_34N = 'urn:ogc:def:crs:EPSG::32634';

    /**
     * WGS 84 / UTM zone 34S
     * Extent: Between 18°E and 24°E, southern hemisphere between 80°S and equator. Angola. Botswana. Democratic
     * Republic of the Congo (Zaire). Namibia. South Africa. Zambia.
     */
    public const EPSG_WGS_84_UTM_ZONE_34S = 'urn:ogc:def:crs:EPSG::32734';

    /**
     * WGS 84 / UTM zone 35N
     * Extent: Between 24°E and 30°E, northern hemisphere between equator and 84°N. Belarus. Bulgaria. Central
     * African Republic. Democratic Republic of the Congo (Zaire). Egypt. Estonia. Finland. Greece. Latvia. Lesotho.
     * Libya. Lithuania. Moldova. Norway. Poland. Romania. Russia. Sudan. Svalbard. Turkey. Uganda. Ukraine
     * In Moldova used with axes reversed - use CRS code 4037.
     */
    public const EPSG_WGS_84_UTM_ZONE_35N = 'urn:ogc:def:crs:EPSG::32635';

    /**
     * WGS 84 / UTM zone 35S
     * Extent: Between 24°E and 30°E, southern hemisphere between 80°S and equator. Botswana. Burundi. Democratic
     * Republic of the Congo (Zaire). Rwanda. South Africa. Tanzania. Uganda. Zambia. Zimbabwe.
     */
    public const EPSG_WGS_84_UTM_ZONE_35S = 'urn:ogc:def:crs:EPSG::32735';

    /**
     * WGS 84 / UTM zone 36N
     * Extent: Between 30°E and 36°E, northern hemisphere between equator and 84°N. Belarus. Cyprus. Egypt.
     * Ethiopia. Finland. Israel. Jordan. Kenya. Lebanon. Moldova. Norway. Russia. Saudi Arabia. Sudan. Syria. Turkey.
     * Uganda. Ukraine
     * In Moldova used with axes reversed - use CRS code 4038.
     */
    public const EPSG_WGS_84_UTM_ZONE_36N = 'urn:ogc:def:crs:EPSG::32636';

    /**
     * WGS 84 / UTM zone 36S
     * Extent: Between 30°E and 36°E, southern hemisphere between 80°S and equator. Burundi. Eswatini (Swaziland).
     * Kenya. Malawi. Mozambique. Rwanda. South Africa. Tanzania. Uganda. Zambia. Zimbabwe.
     */
    public const EPSG_WGS_84_UTM_ZONE_36S = 'urn:ogc:def:crs:EPSG::32736';

    /**
     * WGS 84 / UTM zone 37N
     * Extent: Between 36°E and 42°E, northern hemisphere between equator and 84°N. Djibouti. Egypt. Eritrea.
     * Ethiopia. Georgia. Iraq. Jordan. Kenya. Lebanon. Russia. Saudi Arabia. Somalia. Sudan. Syria. Turkey. Ukraine.
     */
    public const EPSG_WGS_84_UTM_ZONE_37N = 'urn:ogc:def:crs:EPSG::32637';

    /**
     * WGS 84 / UTM zone 37S
     * Extent: Between 36°E and 42°E, southern hemisphere between 80°S and equator. Kenya. Mozambique. Tanzania.
     */
    public const EPSG_WGS_84_UTM_ZONE_37S = 'urn:ogc:def:crs:EPSG::32737';

    /**
     * WGS 84 / UTM zone 38N
     * Extent: Between 42°E and 48°E, northern hemisphere between equator and 84°N. Armenia. Azerbaijan. Djibouti.
     * Eritrea. Ethiopia. Georgia. Islamic Republic of Iran. Iraq. kazakhstan. Kuwait. Russia. Saudi Arabia. Somalia.
     * Turkey. Yemen.
     */
    public const EPSG_WGS_84_UTM_ZONE_38N = 'urn:ogc:def:crs:EPSG::32638';

    /**
     * WGS 84 / UTM zone 38S
     * Extent: Between 42°E and 48°E, southern hemisphere between 80°S and equator. Madagascar.
     */
    public const EPSG_WGS_84_UTM_ZONE_38S = 'urn:ogc:def:crs:EPSG::32738';

    /**
     * WGS 84 / UTM zone 39N
     * Extent: Between 48°E and 54°E, northern hemisphere between equator and 84°N. Azerbaijan. Bahrain. Islamic
     * Republic of Iran. Iraq. Kazakhstan. Kuwait. Oman. Qatar. Russia. Saudi Arabia. Somalia. Turkmenistan. United
     * Arab Emirates. Yemen.
     */
    public const EPSG_WGS_84_UTM_ZONE_39N = 'urn:ogc:def:crs:EPSG::32639';

    /**
     * WGS 84 / UTM zone 39S
     * Extent: Between 48°E and 54°E, southern hemisphere between 80°S and equator. Madagascar.
     */
    public const EPSG_WGS_84_UTM_ZONE_39S = 'urn:ogc:def:crs:EPSG::32739';

    /**
     * WGS 84 / UTM zone 3N
     * Extent: Between 168°W and 162°W, northern hemisphere between equator and 84°N. USA - Alaska (AK).
     */
    public const EPSG_WGS_84_UTM_ZONE_3N = 'urn:ogc:def:crs:EPSG::32603';

    /**
     * WGS 84 / UTM zone 3S
     * Extent: Between 168°W and 162°W, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_84_UTM_ZONE_3S = 'urn:ogc:def:crs:EPSG::32703';

    /**
     * WGS 84 / UTM zone 40N
     * Extent: Between 54°E and 60°E, northern hemisphere between equator and 84°N. Islamic Republic of Iran.
     * kazakhstan. Oman. Russia. Saudi Arabia. Turkmenistan. United Arab Emirates. Uzbekistan.
     */
    public const EPSG_WGS_84_UTM_ZONE_40N = 'urn:ogc:def:crs:EPSG::32640';

    /**
     * WGS 84 / UTM zone 40S
     * Extent: Between 54°E and 60°E, southern hemisphere between 80°S and equator. Seychelles.
     */
    public const EPSG_WGS_84_UTM_ZONE_40S = 'urn:ogc:def:crs:EPSG::32740';

    /**
     * WGS 84 / UTM zone 41N
     * Extent: Between 60°E and 66°E, northern hemisphere between equator and 84°N. Afghanistan. Islamic Republic of
     * Iran. kazakhstan. Pakistan. Russia. Turkmenistan. Uzbekistan.
     */
    public const EPSG_WGS_84_UTM_ZONE_41N = 'urn:ogc:def:crs:EPSG::32641';

    /**
     * WGS 84 / UTM zone 41S
     * Extent: Between 60°E and 66°E, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_84_UTM_ZONE_41S = 'urn:ogc:def:crs:EPSG::32741';

    /**
     * WGS 84 / UTM zone 42N
     * Extent: Between 66°E and 72°E, northern hemisphere between equator and 84°N. Afghanistan. India. Kazakhstan.
     * Kyrgyzstan. Pakistan. Russia. Tajikistan. Uzbekistan.
     */
    public const EPSG_WGS_84_UTM_ZONE_42N = 'urn:ogc:def:crs:EPSG::32642';

    /**
     * WGS 84 / UTM zone 42S
     * Extent: Between 66°E and 72°E, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_84_UTM_ZONE_42S = 'urn:ogc:def:crs:EPSG::32742';

    /**
     * WGS 84 / UTM zone 43N
     * Extent: Between 72°E and 78°E, northern hemisphere between equator and 84°N. China. India. Kazakhstan.
     * Kyrgyzstan. Maldives. Pakistan. Russia. Tajikistan.
     */
    public const EPSG_WGS_84_UTM_ZONE_43N = 'urn:ogc:def:crs:EPSG::32643';

    /**
     * WGS 84 / UTM zone 43S
     * Extent: Between 72°E and 78°E, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_84_UTM_ZONE_43S = 'urn:ogc:def:crs:EPSG::32743';

    /**
     * WGS 84 / UTM zone 44N
     * Extent: Between 78°E and 84°E, northern hemisphere between equator and 84°N. China. India. Kazakhstan.
     * Kyrgyzstan. Nepal. Russia. Sri Lanka.
     */
    public const EPSG_WGS_84_UTM_ZONE_44N = 'urn:ogc:def:crs:EPSG::32644';

    /**
     * WGS 84 / UTM zone 44S
     * Extent: Between 78°E and 84°E, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_84_UTM_ZONE_44S = 'urn:ogc:def:crs:EPSG::32744';

    /**
     * WGS 84 / UTM zone 45N
     * Extent: Between 84°E and 90°E, northern hemisphere between equator and 84°N. Bangladesh. Bhutan. China.
     * India. Kazakhstan. Mongolia. Nepal. Russia.
     */
    public const EPSG_WGS_84_UTM_ZONE_45N = 'urn:ogc:def:crs:EPSG::32645';

    /**
     * WGS 84 / UTM zone 45S
     * Extent: Between 84°E and 90°E, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_84_UTM_ZONE_45S = 'urn:ogc:def:crs:EPSG::32745';

    /**
     * WGS 84 / UTM zone 46N
     * Extent: Between 90°E and 96°E, northern hemisphere between equator and 84°N. Bangladesh. Bhutan. China.
     * Indonesia. Mongolia. Myanmar (Burma). Russia.
     */
    public const EPSG_WGS_84_UTM_ZONE_46N = 'urn:ogc:def:crs:EPSG::32646';

    /**
     * WGS 84 / UTM zone 46S
     * Extent: Between 90°E and 96°E, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_84_UTM_ZONE_46S = 'urn:ogc:def:crs:EPSG::32746';

    /**
     * WGS 84 / UTM zone 47N
     * Extent: Between 96°E and 102°E, northern hemisphere between equator and 84°N. China. Indonesia. Laos.
     * Malaysia - West Malaysia. Mongolia. Myanmar (Burma). Russia. Thailand.
     */
    public const EPSG_WGS_84_UTM_ZONE_47N = 'urn:ogc:def:crs:EPSG::32647';

    /**
     * WGS 84 / UTM zone 47S
     * Extent: Between 96°E and 102°E, southern hemisphere between 80°S and equator. Indonesia.
     */
    public const EPSG_WGS_84_UTM_ZONE_47S = 'urn:ogc:def:crs:EPSG::32747';

    /**
     * WGS 84 / UTM zone 48N
     * Extent: Between 102°E and 108°E, northern hemisphere between equator and 84°N. Cambodia. China. Indonesia.
     * Laos. Malaysia - West Malaysia. Mongolia. Russia. Singapore. Thailand. Vietnam.
     */
    public const EPSG_WGS_84_UTM_ZONE_48N = 'urn:ogc:def:crs:EPSG::32648';

    /**
     * WGS 84 / UTM zone 48S
     * Extent: Between 102°E and 108°E, southern hemisphere between 80°S and equator. Indonesia.
     */
    public const EPSG_WGS_84_UTM_ZONE_48S = 'urn:ogc:def:crs:EPSG::32748';

    /**
     * WGS 84 / UTM zone 49N
     * Extent: Between 108°E and 114°E, northern hemisphere between equator and 84°N. China. Hong Kong. Indonesia.
     * Macao. Malaysia - East Malaysia - Sarawak. Mongolia. Russia. Vietnam.
     */
    public const EPSG_WGS_84_UTM_ZONE_49N = 'urn:ogc:def:crs:EPSG::32649';

    /**
     * WGS 84 / UTM zone 49S
     * Extent: Between 108°E and 114°E, southern hemisphere between 80°S and equator. Australia. Indonesia.
     */
    public const EPSG_WGS_84_UTM_ZONE_49S = 'urn:ogc:def:crs:EPSG::32749';

    /**
     * WGS 84 / UTM zone 4N
     * Extent: Between 162°W and 156°W, northern hemisphere between equator and 84°N. USA - Alaska (AK).
     */
    public const EPSG_WGS_84_UTM_ZONE_4N = 'urn:ogc:def:crs:EPSG::32604';

    /**
     * WGS 84 / UTM zone 4S
     * Extent: Between 162°W and 156°W, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_84_UTM_ZONE_4S = 'urn:ogc:def:crs:EPSG::32704';

    /**
     * WGS 84 / UTM zone 50N
     * Extent: Between 114°E and 120°E, northern hemisphere between equator and 84°N. Brunei. China. Hong Kong.
     * Indonesia. Malaysia - East Malaysia - Sarawak. Mongolia. Philippines. Russia. Taiwan.
     */
    public const EPSG_WGS_84_UTM_ZONE_50N = 'urn:ogc:def:crs:EPSG::32650';

    /**
     * WGS 84 / UTM zone 50S
     * Extent: Between 114°E and 120°E, southern hemisphere between 80°S and equator. Australia. Indonesia.
     */
    public const EPSG_WGS_84_UTM_ZONE_50S = 'urn:ogc:def:crs:EPSG::32750';

    /**
     * WGS 84 / UTM zone 51N
     * Extent: Between 120°E and 126°E, northern hemisphere between equator and 84°N. China. Indonesia. Japan. North
     * Korea. Philippines. Russia. South Korea. Taiwan.
     */
    public const EPSG_WGS_84_UTM_ZONE_51N = 'urn:ogc:def:crs:EPSG::32651';

    /**
     * WGS 84 / UTM zone 51S
     * Extent: Between 120°E and 126°E, southern hemisphere between 80°S and equator. Australia. East Timor.
     * Indonesia.
     */
    public const EPSG_WGS_84_UTM_ZONE_51S = 'urn:ogc:def:crs:EPSG::32751';

    /**
     * WGS 84 / UTM zone 52N
     * Extent: Between 126°E and 132°E, northern hemisphere between equator and 84°N. China. Indonesia. Japan. North
     * Korea. Russia. South Korea.
     */
    public const EPSG_WGS_84_UTM_ZONE_52N = 'urn:ogc:def:crs:EPSG::32652';

    /**
     * WGS 84 / UTM zone 52S
     * Extent: Between 126°E and 132°E, southern hemisphere between 80°S and equator. Australia. East Timor.
     * Indonesia.
     */
    public const EPSG_WGS_84_UTM_ZONE_52S = 'urn:ogc:def:crs:EPSG::32752';

    /**
     * WGS 84 / UTM zone 53N
     * Extent: Between 132°E and 138°E, northern hemisphere between equator and 84°N. China. Japan. Russia.
     */
    public const EPSG_WGS_84_UTM_ZONE_53N = 'urn:ogc:def:crs:EPSG::32653';

    /**
     * WGS 84 / UTM zone 53S
     * Extent: Between 132°E and 138°E, southern hemisphere between 80°S and equator. Australia. Indonesia.
     */
    public const EPSG_WGS_84_UTM_ZONE_53S = 'urn:ogc:def:crs:EPSG::32753';

    /**
     * WGS 84 / UTM zone 54N
     * Extent: Between 138°E and 144°E, northern hemisphere between equator and 84°N. Japan. Russia.
     */
    public const EPSG_WGS_84_UTM_ZONE_54N = 'urn:ogc:def:crs:EPSG::32654';

    /**
     * WGS 84 / UTM zone 54S
     * Extent: Between 138°E and 144°E, southern hemisphere between 80°S and equator. Australia. Indonesia. Papua
     * New Guinea.
     */
    public const EPSG_WGS_84_UTM_ZONE_54S = 'urn:ogc:def:crs:EPSG::32754';

    /**
     * WGS 84 / UTM zone 55N
     * Extent: Between 144°E and 150°E, northern hemisphere between equator and 84°N. Japan. Russia.
     */
    public const EPSG_WGS_84_UTM_ZONE_55N = 'urn:ogc:def:crs:EPSG::32655';

    /**
     * WGS 84 / UTM zone 55S
     * Extent: Between 144°E and 150°E, southern hemisphere between 80°S and equator. Australia. Papua New Guinea.
     */
    public const EPSG_WGS_84_UTM_ZONE_55S = 'urn:ogc:def:crs:EPSG::32755';

    /**
     * WGS 84 / UTM zone 56N
     * Extent: Between 150°E and 156°E, northern hemisphere between equator and 84°N. Russia.
     */
    public const EPSG_WGS_84_UTM_ZONE_56N = 'urn:ogc:def:crs:EPSG::32656';

    /**
     * WGS 84 / UTM zone 56S
     * Extent: Between 150°E and 156°E, southern hemisphere between 80°S and equator. Australia. Papua New Guinea.
     */
    public const EPSG_WGS_84_UTM_ZONE_56S = 'urn:ogc:def:crs:EPSG::32756';

    /**
     * WGS 84 / UTM zone 57N
     * Extent: Between 156°E and 162°E, northern hemisphere between equator and 84°N. Russia.
     */
    public const EPSG_WGS_84_UTM_ZONE_57N = 'urn:ogc:def:crs:EPSG::32657';

    /**
     * WGS 84 / UTM zone 57S
     * Extent: Between 156°E and 162°E, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_84_UTM_ZONE_57S = 'urn:ogc:def:crs:EPSG::32757';

    /**
     * WGS 84 / UTM zone 58N
     * Extent: Between 162°E and 168°E, northern hemisphere between equator and 84°N. Russia.
     */
    public const EPSG_WGS_84_UTM_ZONE_58N = 'urn:ogc:def:crs:EPSG::32658';

    /**
     * WGS 84 / UTM zone 58S
     * Extent: Between 162°E and 168°E, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_84_UTM_ZONE_58S = 'urn:ogc:def:crs:EPSG::32758';

    /**
     * WGS 84 / UTM zone 59N
     * Extent: Between 168°E and 174°E, northern hemisphere between equator and 84°N. Russia; USA - Alaska.
     */
    public const EPSG_WGS_84_UTM_ZONE_59N = 'urn:ogc:def:crs:EPSG::32659';

    /**
     * WGS 84 / UTM zone 59S
     * Extent: Between 168°E and 174°E, southern hemisphere between 80°S and equator. New Zealand.
     */
    public const EPSG_WGS_84_UTM_ZONE_59S = 'urn:ogc:def:crs:EPSG::32759';

    /**
     * WGS 84 / UTM zone 5N
     * Extent: Between 156°W and 150°W, northern hemisphere between equator and 84°N. USA - Alaska (AK).
     */
    public const EPSG_WGS_84_UTM_ZONE_5N = 'urn:ogc:def:crs:EPSG::32605';

    /**
     * WGS 84 / UTM zone 5S
     * Extent: Between 156°W and 150°W, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_84_UTM_ZONE_5S = 'urn:ogc:def:crs:EPSG::32705';

    /**
     * WGS 84 / UTM zone 60N
     * Extent: Between 174°E and 180°E, northern hemisphere between equator and 84°N. Russia; USA - Alaska (AK).
     */
    public const EPSG_WGS_84_UTM_ZONE_60N = 'urn:ogc:def:crs:EPSG::32660';

    /**
     * WGS 84 / UTM zone 60S
     * Extent: Between 174°E and 180°E, southern hemisphere between 80°S and equator. New Zealand.
     */
    public const EPSG_WGS_84_UTM_ZONE_60S = 'urn:ogc:def:crs:EPSG::32760';

    /**
     * WGS 84 / UTM zone 6N
     * Extent: Between 150°W and 144°W, northern hemisphere between equator and 84°N. USA - Alaska (AK).
     */
    public const EPSG_WGS_84_UTM_ZONE_6N = 'urn:ogc:def:crs:EPSG::32606';

    /**
     * WGS 84 / UTM zone 6S
     * Extent: Between 150°W and 144°W, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_84_UTM_ZONE_6S = 'urn:ogc:def:crs:EPSG::32706';

    /**
     * WGS 84 / UTM zone 7N
     * Extent: Between 144°W and 138°W, northern hemisphere between equator and 84°N. Canada - British Columbia
     * (BC); Yukon. USA - Alaska (AK).
     */
    public const EPSG_WGS_84_UTM_ZONE_7N = 'urn:ogc:def:crs:EPSG::32607';

    /**
     * WGS 84 / UTM zone 7S
     * Extent: Between 144°W and 138°W, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_84_UTM_ZONE_7S = 'urn:ogc:def:crs:EPSG::32707';

    /**
     * WGS 84 / UTM zone 8N
     * Extent: Between 138°W and 132°W, northern hemisphere between equator and 84°N. Canada - British Columbia
     * (BC); Northwest Territiories (NWT); Yukon. USA - Alaska (AK).
     */
    public const EPSG_WGS_84_UTM_ZONE_8N = 'urn:ogc:def:crs:EPSG::32608';

    /**
     * WGS 84 / UTM zone 8S
     * Extent: Between 138°W and 132°W, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_84_UTM_ZONE_8S = 'urn:ogc:def:crs:EPSG::32708';

    /**
     * WGS 84 / UTM zone 9N
     * Extent: Between 132°W and 126°W, northern hemisphere between equator and 84°N. Canada - British Columbia
     * (BC); NorthW Territories (NWT); Yukon. USA - Alaska (AK).
     */
    public const EPSG_WGS_84_UTM_ZONE_9N = 'urn:ogc:def:crs:EPSG::32609';

    /**
     * WGS 84 / UTM zone 9S
     * Extent: Between 132°W and 126°W, southern hemisphere between 80°S and equator.
     */
    public const EPSG_WGS_84_UTM_ZONE_9S = 'urn:ogc:def:crs:EPSG::32709';

    /**
     * WGS 84 / Uttar Pradesh
     * Extent: India - Uttar Pradesh.
     */
    public const EPSG_WGS_84_UTTAR_PRADESH = 'urn:ogc:def:crs:EPSG::7775';

    /**
     * WGS 84 / Uttaranchal
     * Extent: India - Uttarakhand (Uttaranchal).
     */
    public const EPSG_WGS_84_UTTARANCHAL = 'urn:ogc:def:crs:EPSG::7776';

    /**
     * WGS 84 / West Bengal
     * Extent: India - West Bengal.
     */
    public const EPSG_WGS_84_WEST_BENGAL = 'urn:ogc:def:crs:EPSG::7787';

    /**
     * WGS 84 / World Equidistant Cylindrical
     * Extent: World
     * Origin is at intersection of equator and Greenwich meridian. Note: this is not the same as plotting unrectified
     * graticule coordinates on a computer display using the so-called pseudo Plate Carrée method: here the grid units
     * are metres.
     */
    public const EPSG_WGS_84_WORLD_EQUIDISTANT_CYLINDRICAL = 'urn:ogc:def:crs:EPSG::4087';

    /**
     * WGS 84 / World Mercator
     * Extent: World between 80°S and 84°N
     * Euro-centric view of world excluding polar areas.
     */
    public const EPSG_WGS_84_WORLD_MERCATOR = 'urn:ogc:def:crs:EPSG::3395';

    /**
     * Xian 1980 / 3-degree Gauss-Kruger CM 102E
     * Extent: China - between 100°30'E and 103°30'E
     * Truncated form of Xian 1980 / 3-degree Gauss-Kruger zone 34 (code 2358).
     */
    public const EPSG_XIAN_1980_3_DEGREE_GAUSS_KRUGER_CM_102E = 'urn:ogc:def:crs:EPSG::2379';

    /**
     * Xian 1980 / 3-degree Gauss-Kruger CM 105E
     * Extent: China - between 103°30'E and 106°30'E
     * Truncated form of Xian 1980 / 3-degree Gauss-Kruger zone 35 (code 2359).
     */
    public const EPSG_XIAN_1980_3_DEGREE_GAUSS_KRUGER_CM_105E = 'urn:ogc:def:crs:EPSG::2380';

    /**
     * Xian 1980 / 3-degree Gauss-Kruger CM 108E
     * Extent: China - onshore between 106°30'E and 109°30'E
     * Truncated form of Xian 1980 / 3-degree Gauss-Kruger zone 36 (code 2360).
     */
    public const EPSG_XIAN_1980_3_DEGREE_GAUSS_KRUGER_CM_108E = 'urn:ogc:def:crs:EPSG::2381';

    /**
     * Xian 1980 / 3-degree Gauss-Kruger CM 111E
     * Extent: China - onshore between 109°30'E and 112°30'E
     * Truncated form of Xian 1980 / 3-degree Gauss-Kruger zone 37 (code 2361).
     */
    public const EPSG_XIAN_1980_3_DEGREE_GAUSS_KRUGER_CM_111E = 'urn:ogc:def:crs:EPSG::2382';

    /**
     * Xian 1980 / 3-degree Gauss-Kruger CM 114E
     * Extent: China - onshore between 112°30'E and 115°30'E
     * Truncated form of Xian 1980 / 3-degree Gauss-Kruger zone 38 (code 2362).
     */
    public const EPSG_XIAN_1980_3_DEGREE_GAUSS_KRUGER_CM_114E = 'urn:ogc:def:crs:EPSG::2383';

    /**
     * Xian 1980 / 3-degree Gauss-Kruger CM 117E
     * Extent: China - onshore between 115°30'E and 118°30'E
     * Truncated form of Xian 1980 / 3-degree Gauss-Kruger zone 39 (code 2363).
     */
    public const EPSG_XIAN_1980_3_DEGREE_GAUSS_KRUGER_CM_117E = 'urn:ogc:def:crs:EPSG::2384';

    /**
     * Xian 1980 / 3-degree Gauss-Kruger CM 120E
     * Extent: China - onshore between 118°30'E and 121°30'E
     * Truncated form of Xian 1980 / 3-degree Gauss-Kruger zone 40 (code 2364).
     */
    public const EPSG_XIAN_1980_3_DEGREE_GAUSS_KRUGER_CM_120E = 'urn:ogc:def:crs:EPSG::2385';

    /**
     * Xian 1980 / 3-degree Gauss-Kruger CM 123E
     * Extent: China - onshore between 121°30'E and 124°30'E
     * Truncated form of Xian 1980 / 3-degree Gauss-Kruger zone 41 (code 2365).
     */
    public const EPSG_XIAN_1980_3_DEGREE_GAUSS_KRUGER_CM_123E = 'urn:ogc:def:crs:EPSG::2386';

    /**
     * Xian 1980 / 3-degree Gauss-Kruger CM 126E
     * Extent: China - onshore between 124°30'E and 127°30'E
     * Truncated form of Xian 1980 / 3-degree Gauss-Kruger zone 42 (code 2366).
     */
    public const EPSG_XIAN_1980_3_DEGREE_GAUSS_KRUGER_CM_126E = 'urn:ogc:def:crs:EPSG::2387';

    /**
     * Xian 1980 / 3-degree Gauss-Kruger CM 129E
     * Extent: China - between 127°30'E and 130°30'E
     * Truncated form of Xian 1980 / 3-degree Gauss-Kruger zone 43 (code 2367).
     */
    public const EPSG_XIAN_1980_3_DEGREE_GAUSS_KRUGER_CM_129E = 'urn:ogc:def:crs:EPSG::2388';

    /**
     * Xian 1980 / 3-degree Gauss-Kruger CM 132E
     * Extent: China - between 130°30'E and 133°30'E
     * Truncated form of Xian 1980 / 3-degree Gauss-Kruger zone 44 (code 2368).
     */
    public const EPSG_XIAN_1980_3_DEGREE_GAUSS_KRUGER_CM_132E = 'urn:ogc:def:crs:EPSG::2389';

    /**
     * Xian 1980 / 3-degree Gauss-Kruger CM 135E
     * Extent: China - east of 133°30'E
     * Truncated form of Xian 1980 / 3-degree Gauss-Kruger zone 45 (code 2369).
     */
    public const EPSG_XIAN_1980_3_DEGREE_GAUSS_KRUGER_CM_135E = 'urn:ogc:def:crs:EPSG::2390';

    /**
     * Xian 1980 / 3-degree Gauss-Kruger CM 75E
     * Extent: China - west of 76°30'E
     * Truncated form of Xian 1980 / 3-degree Gauss-Kruger zone 25 (code 2349).
     */
    public const EPSG_XIAN_1980_3_DEGREE_GAUSS_KRUGER_CM_75E = 'urn:ogc:def:crs:EPSG::2370';

    /**
     * Xian 1980 / 3-degree Gauss-Kruger CM 78E
     * Extent: China - between 76°30'E and 79°30'E
     * Truncated form of Xian 1980 / 3-degree Gauss-Kruger zone 26 (code 2350).
     */
    public const EPSG_XIAN_1980_3_DEGREE_GAUSS_KRUGER_CM_78E = 'urn:ogc:def:crs:EPSG::2371';

    /**
     * Xian 1980 / 3-degree Gauss-Kruger CM 81E
     * Extent: China - between 79°30'E and 82°30'E
     * Truncated form of Xian 1980 / 3-degree Gauss-Kruger zone 27 (code 2351).
     */
    public const EPSG_XIAN_1980_3_DEGREE_GAUSS_KRUGER_CM_81E = 'urn:ogc:def:crs:EPSG::2372';

    /**
     * Xian 1980 / 3-degree Gauss-Kruger CM 84E
     * Extent: China - between 82°30'E and 85°30'E
     * Truncated form of Xian 1980 / 3-degree Gauss-Kruger zone 28 (code 2352).
     */
    public const EPSG_XIAN_1980_3_DEGREE_GAUSS_KRUGER_CM_84E = 'urn:ogc:def:crs:EPSG::2373';

    /**
     * Xian 1980 / 3-degree Gauss-Kruger CM 87E
     * Extent: China - between 85°30'E and 88°30'E
     * Truncated form of Xian 1980 / 3-degree Gauss-Kruger zone 29 (code 2353).
     */
    public const EPSG_XIAN_1980_3_DEGREE_GAUSS_KRUGER_CM_87E = 'urn:ogc:def:crs:EPSG::2374';

    /**
     * Xian 1980 / 3-degree Gauss-Kruger CM 90E
     * Extent: China - between 88°30'E and 91°30'E
     * Truncated form of Xian 1980 / 3-degree Gauss-Kruger zone 30 (code 2354).
     */
    public const EPSG_XIAN_1980_3_DEGREE_GAUSS_KRUGER_CM_90E = 'urn:ogc:def:crs:EPSG::2375';

    /**
     * Xian 1980 / 3-degree Gauss-Kruger CM 93E
     * Extent: China - between 91°30'E and 94°30'E
     * Truncated form of Xian 1980 / 3-degree Gauss-Kruger zone 31 (code 2355).
     */
    public const EPSG_XIAN_1980_3_DEGREE_GAUSS_KRUGER_CM_93E = 'urn:ogc:def:crs:EPSG::2376';

    /**
     * Xian 1980 / 3-degree Gauss-Kruger CM 96E
     * Extent: China - between 94°30'E and 97°30'E
     * Truncated form of Xian 1980 / 3-degree Gauss-Kruger zone 32 (code 2356).
     */
    public const EPSG_XIAN_1980_3_DEGREE_GAUSS_KRUGER_CM_96E = 'urn:ogc:def:crs:EPSG::2377';

    /**
     * Xian 1980 / 3-degree Gauss-Kruger CM 99E
     * Extent: China - between 97°30'E and 100°30'E
     * Truncated form of Xian 1980 / 3-degree Gauss-Kruger zone 33 (code 2357).
     */
    public const EPSG_XIAN_1980_3_DEGREE_GAUSS_KRUGER_CM_99E = 'urn:ogc:def:crs:EPSG::2378';

    /**
     * Xian 1980 / 3-degree Gauss-Kruger zone 25
     * Extent: China - west of 76°30'E
     * Also found with truncated false easting - see Xian 1980 / 3-degree Gauss-Kruger CM 75E (code 2370).
     */
    public const EPSG_XIAN_1980_3_DEGREE_GAUSS_KRUGER_ZONE_25 = 'urn:ogc:def:crs:EPSG::2349';

    /**
     * Xian 1980 / 3-degree Gauss-Kruger zone 26
     * Extent: China - between 76°30'E and 79°30'E
     * Also found with truncated false easting - see Xian 1980 / 3-degree Gauss-Kruger CM 78E (code 2371).
     */
    public const EPSG_XIAN_1980_3_DEGREE_GAUSS_KRUGER_ZONE_26 = 'urn:ogc:def:crs:EPSG::2350';

    /**
     * Xian 1980 / 3-degree Gauss-Kruger zone 27
     * Extent: China - between 79°30'E and 82°30'E
     * Also found with truncated false easting - see Xian 1980 / 3-degree Gauss-Kruger CM 81E (code 2372).
     */
    public const EPSG_XIAN_1980_3_DEGREE_GAUSS_KRUGER_ZONE_27 = 'urn:ogc:def:crs:EPSG::2351';

    /**
     * Xian 1980 / 3-degree Gauss-Kruger zone 28
     * Extent: China - between 82°30'E and 85°30'E
     * Also found with truncated false easting - see Xian 1980 / 3-degree Gauss-Kruger CM 84E (code 2373).
     */
    public const EPSG_XIAN_1980_3_DEGREE_GAUSS_KRUGER_ZONE_28 = 'urn:ogc:def:crs:EPSG::2352';

    /**
     * Xian 1980 / 3-degree Gauss-Kruger zone 29
     * Extent: China - between 85°30'E and 88°30'E
     * Also found with truncated false easting - see Xian 1980 / 3-degree Gauss-Kruger CM 87E (code 2374).
     */
    public const EPSG_XIAN_1980_3_DEGREE_GAUSS_KRUGER_ZONE_29 = 'urn:ogc:def:crs:EPSG::2353';

    /**
     * Xian 1980 / 3-degree Gauss-Kruger zone 30
     * Extent: China - between 88°30'E and 91°30'E
     * Also found with truncated false easting - see Xian 1980 / 3-degree Gauss-Kruger CM 90E (code 2375).
     */
    public const EPSG_XIAN_1980_3_DEGREE_GAUSS_KRUGER_ZONE_30 = 'urn:ogc:def:crs:EPSG::2354';

    /**
     * Xian 1980 / 3-degree Gauss-Kruger zone 31
     * Extent: China - between 91°30'E and 94°30'E
     * Also found with truncated false easting - see Xian 1980 / 3-degree Gauss-Kruger CM 93E (code 2376).
     */
    public const EPSG_XIAN_1980_3_DEGREE_GAUSS_KRUGER_ZONE_31 = 'urn:ogc:def:crs:EPSG::2355';

    /**
     * Xian 1980 / 3-degree Gauss-Kruger zone 32
     * Extent: China - between 94°30'E and 97°30'E
     * Also found with truncated false easting - see Xian 1980 / 3-degree Gauss-Kruger CM 96E (code 2377).
     */
    public const EPSG_XIAN_1980_3_DEGREE_GAUSS_KRUGER_ZONE_32 = 'urn:ogc:def:crs:EPSG::2356';

    /**
     * Xian 1980 / 3-degree Gauss-Kruger zone 33
     * Extent: China - between 97°30'E and 100°30'E
     * Also found with truncated false easting - see Xian 1980 / 3-degree Gauss-Kruger CM 99E (code 2378).
     */
    public const EPSG_XIAN_1980_3_DEGREE_GAUSS_KRUGER_ZONE_33 = 'urn:ogc:def:crs:EPSG::2357';

    /**
     * Xian 1980 / 3-degree Gauss-Kruger zone 34
     * Extent: China - between 100°30'E and 103°30'E
     * Also found with truncated false easting - see Xian 1980 / 3-degree Gauss-Kruger CM 102E (code 2379).
     */
    public const EPSG_XIAN_1980_3_DEGREE_GAUSS_KRUGER_ZONE_34 = 'urn:ogc:def:crs:EPSG::2358';

    /**
     * Xian 1980 / 3-degree Gauss-Kruger zone 35
     * Extent: China - between 103°30'E and 106°30'E
     * Also found with truncated false easting - see Xian 1980 / 3-degree Gauss-Kruger CM 105E (code 2380).
     */
    public const EPSG_XIAN_1980_3_DEGREE_GAUSS_KRUGER_ZONE_35 = 'urn:ogc:def:crs:EPSG::2359';

    /**
     * Xian 1980 / 3-degree Gauss-Kruger zone 36
     * Extent: China - onshore between 106°30'E and 109°30'E
     * Also found with truncated false easting - see Xian 1980 / 3-degree Gauss-Kruger CM 108E (code 2381).
     */
    public const EPSG_XIAN_1980_3_DEGREE_GAUSS_KRUGER_ZONE_36 = 'urn:ogc:def:crs:EPSG::2360';

    /**
     * Xian 1980 / 3-degree Gauss-Kruger zone 37
     * Extent: China - onshore between 109°30'E and 112°30'E
     * Also found with truncated false easting - see Xian 1980 / 3-degree Gauss-Kruger CM 111E (code 2382).
     */
    public const EPSG_XIAN_1980_3_DEGREE_GAUSS_KRUGER_ZONE_37 = 'urn:ogc:def:crs:EPSG::2361';

    /**
     * Xian 1980 / 3-degree Gauss-Kruger zone 38
     * Extent: China - onshore between 112°30'E and 115°30'E
     * Also found with truncated false easting - see Xian 1980 / 3-degree Gauss-Kruger CM 114E (code 2383).
     */
    public const EPSG_XIAN_1980_3_DEGREE_GAUSS_KRUGER_ZONE_38 = 'urn:ogc:def:crs:EPSG::2362';

    /**
     * Xian 1980 / 3-degree Gauss-Kruger zone 39
     * Extent: China - onshore between 115°30'E and 118°30'E
     * Also found with truncated false easting - see Xian 1980 / 3-degree Gauss-Kruger CM 117E (code 2384).
     */
    public const EPSG_XIAN_1980_3_DEGREE_GAUSS_KRUGER_ZONE_39 = 'urn:ogc:def:crs:EPSG::2363';

    /**
     * Xian 1980 / 3-degree Gauss-Kruger zone 40
     * Extent: China - onshore between 118°30'E and 121°30'E
     * Also found with truncated false easting - see Xian 1980 / 3-degree Gauss-Kruger CM 123E (code 2385).
     */
    public const EPSG_XIAN_1980_3_DEGREE_GAUSS_KRUGER_ZONE_40 = 'urn:ogc:def:crs:EPSG::2364';

    /**
     * Xian 1980 / 3-degree Gauss-Kruger zone 41
     * Extent: China - onshore between 121°30'E and 124°30'E
     * Also found with truncated false easting - see Xian 1980 / 3-degree Gauss-Kruger CM 123E (code 2386).
     */
    public const EPSG_XIAN_1980_3_DEGREE_GAUSS_KRUGER_ZONE_41 = 'urn:ogc:def:crs:EPSG::2365';

    /**
     * Xian 1980 / 3-degree Gauss-Kruger zone 42
     * Extent: China - onshore between 124°30'E and 127°30'E
     * Also found with truncated false easting - see Xian 1980 / 3-degree Gauss-Kruger CM 126E (code 2387).
     */
    public const EPSG_XIAN_1980_3_DEGREE_GAUSS_KRUGER_ZONE_42 = 'urn:ogc:def:crs:EPSG::2366';

    /**
     * Xian 1980 / 3-degree Gauss-Kruger zone 43
     * Extent: China - between 127°30'E and 130°30'E
     * Also found with truncated false easting - see Xian 1980 / 3-degree Gauss-Kruger CM 129E (code 2388).
     */
    public const EPSG_XIAN_1980_3_DEGREE_GAUSS_KRUGER_ZONE_43 = 'urn:ogc:def:crs:EPSG::2367';

    /**
     * Xian 1980 / 3-degree Gauss-Kruger zone 44
     * Extent: China - between 130°30'E and 133°30'E
     * Also found with truncated false easting - see Xian 1980 / 3-degree Gauss-Kruger CM 132E (code 2389).
     */
    public const EPSG_XIAN_1980_3_DEGREE_GAUSS_KRUGER_ZONE_44 = 'urn:ogc:def:crs:EPSG::2368';

    /**
     * Xian 1980 / 3-degree Gauss-Kruger zone 45
     * Extent: China - east of 133°30'E
     * Also found with truncated false easting - see Xian 1980 / 3-degree Gauss-Kruger CM 135E (code 2390).
     */
    public const EPSG_XIAN_1980_3_DEGREE_GAUSS_KRUGER_ZONE_45 = 'urn:ogc:def:crs:EPSG::2369';

    /**
     * Xian 1980 / Gauss-Kruger CM 105E
     * Extent: China - onshore between 102°E and 108°E
     * Truncated form of Xian 1980 / [6-degree] Gauss-Kruger zone 18 (code 2332).
     */
    public const EPSG_XIAN_1980_GAUSS_KRUGER_CM_105E = 'urn:ogc:def:crs:EPSG::2343';

    /**
     * Xian 1980 / Gauss-Kruger CM 111E
     * Extent: China - onshore between 108°E and 114°E
     * Truncated form of Xian 1980 / [6-degree] Gauss-Kruger zone 19 (code 2333).
     */
    public const EPSG_XIAN_1980_GAUSS_KRUGER_CM_111E = 'urn:ogc:def:crs:EPSG::2344';

    /**
     * Xian 1980 / Gauss-Kruger CM 117E
     * Extent: China - onshore between 114°E and 120°E
     * Truncated form of Xian 1980 / [6-degree] Gauss-Kruger zone 20 (code 2334).
     */
    public const EPSG_XIAN_1980_GAUSS_KRUGER_CM_117E = 'urn:ogc:def:crs:EPSG::2345';

    /**
     * Xian 1980 / Gauss-Kruger CM 123E
     * Extent: China - onshore between 120°E and 126°E
     * Truncated form of Xian 1980 / [6-degree] Gauss-Kruger zone 21 (code 2335).
     */
    public const EPSG_XIAN_1980_GAUSS_KRUGER_CM_123E = 'urn:ogc:def:crs:EPSG::2346';

    /**
     * Xian 1980 / Gauss-Kruger CM 129E
     * Extent: China - onshore between 126°E and 132°E
     * Truncated form of Xian 1980 / [6-degree] Gauss-Kruger zone 22 (code 2336).
     */
    public const EPSG_XIAN_1980_GAUSS_KRUGER_CM_129E = 'urn:ogc:def:crs:EPSG::2347';

    /**
     * Xian 1980 / Gauss-Kruger CM 135E
     * Extent: China - east of 132°E
     * Truncated form of Xian 1980 / [6-degree] Gauss-Kruger zone 23 (code 2337).
     */
    public const EPSG_XIAN_1980_GAUSS_KRUGER_CM_135E = 'urn:ogc:def:crs:EPSG::2348';

    /**
     * Xian 1980 / Gauss-Kruger CM 75E
     * Extent: China - west of 78°E
     * Truncated form of Xian 1980 / [6-degree] Gauss-Kruger zone 13 (code 2327).
     */
    public const EPSG_XIAN_1980_GAUSS_KRUGER_CM_75E = 'urn:ogc:def:crs:EPSG::2338';

    /**
     * Xian 1980 / Gauss-Kruger CM 81E
     * Extent: China - between 78°E and 84°E
     * Truncated form of Xian 1980 / [6-degree] Gauss-Kruger zone 14 (code 2328).
     */
    public const EPSG_XIAN_1980_GAUSS_KRUGER_CM_81E = 'urn:ogc:def:crs:EPSG::2339';

    /**
     * Xian 1980 / Gauss-Kruger CM 87E
     * Extent: China - between 84°E and 90°E
     * Truncated form of Xian 1980 / [6-degree] Gauss-Kruger zone 15 (code 2329).
     */
    public const EPSG_XIAN_1980_GAUSS_KRUGER_CM_87E = 'urn:ogc:def:crs:EPSG::2340';

    /**
     * Xian 1980 / Gauss-Kruger CM 93E
     * Extent: China - between 90°E and 96°E
     * Truncated form of Xian 1980 / [6-degree] Gauss-Kruger zone 16 (code 2330).
     */
    public const EPSG_XIAN_1980_GAUSS_KRUGER_CM_93E = 'urn:ogc:def:crs:EPSG::2341';

    /**
     * Xian 1980 / Gauss-Kruger CM 99E
     * Extent: China - between 96°E and 102°E
     * Truncated form of Xian 1980 / [6-degree] Gauss-Kruger zone 17 (code 2331).
     */
    public const EPSG_XIAN_1980_GAUSS_KRUGER_CM_99E = 'urn:ogc:def:crs:EPSG::2342';

    /**
     * Xian 1980 / Gauss-Kruger zone 13
     * Extent: China - west of 78°E
     * Also found with truncated false easting - see Xian 1980 / [6-degree] Gauss-Kruger CM 75E (code 2338).
     */
    public const EPSG_XIAN_1980_GAUSS_KRUGER_ZONE_13 = 'urn:ogc:def:crs:EPSG::2327';

    /**
     * Xian 1980 / Gauss-Kruger zone 14
     * Extent: China - between 78°E and 84°E
     * Also found with truncated false easting - see Xian 1980 / [6-degree] Gauss-Kruger CM 81E (code 2339).
     */
    public const EPSG_XIAN_1980_GAUSS_KRUGER_ZONE_14 = 'urn:ogc:def:crs:EPSG::2328';

    /**
     * Xian 1980 / Gauss-Kruger zone 15
     * Extent: China - between 84°E and 90°E
     * Also found with truncated false easting - see Xian 1980 / [6-degree] Gauss-Kruger CM 87E (code 2340).
     */
    public const EPSG_XIAN_1980_GAUSS_KRUGER_ZONE_15 = 'urn:ogc:def:crs:EPSG::2329';

    /**
     * Xian 1980 / Gauss-Kruger zone 16
     * Extent: China - between 90°E and 96°E
     * Also found with truncated false easting - see Xian 1980 / [6-degree] Gauss-Kruger CM 93E (code 2341).
     */
    public const EPSG_XIAN_1980_GAUSS_KRUGER_ZONE_16 = 'urn:ogc:def:crs:EPSG::2330';

    /**
     * Xian 1980 / Gauss-Kruger zone 17
     * Extent: China - between 96°E and 102°E
     * Also found with truncated false easting - see Xian 1980 / [6-degree] Gauss-Kruger CM 99E (code 2342).
     */
    public const EPSG_XIAN_1980_GAUSS_KRUGER_ZONE_17 = 'urn:ogc:def:crs:EPSG::2331';

    /**
     * Xian 1980 / Gauss-Kruger zone 18
     * Extent: China - onshore between 102°E and 108°E
     * Also found with truncated false easting - see Xian 1980 / [6-degree] Gauss-Kruger CM 105E (code 2343).
     */
    public const EPSG_XIAN_1980_GAUSS_KRUGER_ZONE_18 = 'urn:ogc:def:crs:EPSG::2332';

    /**
     * Xian 1980 / Gauss-Kruger zone 19
     * Extent: China - onshore between 108°E and 114°E
     * Also found with truncated false easting - see Xian 1980 / [6-degree] Gauss-Kruger CM 111E (code 2344).
     */
    public const EPSG_XIAN_1980_GAUSS_KRUGER_ZONE_19 = 'urn:ogc:def:crs:EPSG::2333';

    /**
     * Xian 1980 / Gauss-Kruger zone 20
     * Extent: China - onshore between 114°E and 120°E
     * Also found with truncated false easting - see Xian 1980 / [6-degree] Gauss-Kruger CM 117E (code 2345).
     */
    public const EPSG_XIAN_1980_GAUSS_KRUGER_ZONE_20 = 'urn:ogc:def:crs:EPSG::2334';

    /**
     * Xian 1980 / Gauss-Kruger zone 21
     * Extent: China - onshore between 120°E and 126°E
     * Also found with truncated false easting - see Xian 1980 / [6-degree] Gauss-Kruger CM 123E (code 2346).
     */
    public const EPSG_XIAN_1980_GAUSS_KRUGER_ZONE_21 = 'urn:ogc:def:crs:EPSG::2335';

    /**
     * Xian 1980 / Gauss-Kruger zone 22
     * Extent: China - onshore between 126°E and 132°E
     * Also found with truncated false easting - see Xian 1980 / [6-degree] Gauss-Kruger CM 129E (code 2347).
     */
    public const EPSG_XIAN_1980_GAUSS_KRUGER_ZONE_22 = 'urn:ogc:def:crs:EPSG::2336';

    /**
     * Xian 1980 / Gauss-Kruger zone 23
     * Extent: China - east of 132°E
     * Also found with truncated false easting - see Xian 1980 / [6-degree] Gauss-Kruger CM 135E (code 2348).
     */
    public const EPSG_XIAN_1980_GAUSS_KRUGER_ZONE_23 = 'urn:ogc:def:crs:EPSG::2337';

    /**
     * Yemen NGN96 / UTM zone 37N
     * Extent: Yemen - west of 42°E.
     */
    public const EPSG_YEMEN_NGN96_UTM_ZONE_37N = 'urn:ogc:def:crs:EPSG::5836';

    /**
     * Yemen NGN96 / UTM zone 38N
     * Extent: Yemen - between 42°E and 48°E.
     */
    public const EPSG_YEMEN_NGN96_UTM_ZONE_38N = 'urn:ogc:def:crs:EPSG::2089';

    /**
     * Yemen NGN96 / UTM zone 39N
     * Extent: Yemen - between 48°E and 54°E.
     */
    public const EPSG_YEMEN_NGN96_UTM_ZONE_39N = 'urn:ogc:def:crs:EPSG::2090';

    /**
     * Yemen NGN96 / UTM zone 40N
     * Extent: Yemen - east of 54°E.
     */
    public const EPSG_YEMEN_NGN96_UTM_ZONE_40N = 'urn:ogc:def:crs:EPSG::5837';

    /**
     * Yoff / UTM zone 28N
     * Extent: Senegal.
     */
    public const EPSG_YOFF_UTM_ZONE_28N = 'urn:ogc:def:crs:EPSG::31028';

    /**
     * Zanderij / Suriname Old TM
     * Extent: Suriname - onshore
     * Introduced in 1975. Replaced by Zanderij / Suriname TM in 1979.
     */
    public const EPSG_ZANDERIJ_SURINAME_OLD_TM = 'urn:ogc:def:crs:EPSG::31170';

    /**
     * Zanderij / Suriname TM
     * Extent: Suriname - onshore
     * Replaced Zanderij / Suriname Old TM in 1979.
     */
    public const EPSG_ZANDERIJ_SURINAME_TM = 'urn:ogc:def:crs:EPSG::31171';

    /**
     * Zanderij / TM 54 NW
     * Extent: Suriname - offshore.
     */
    public const EPSG_ZANDERIJ_TM_54_NW = 'urn:ogc:def:crs:EPSG::31154';

    /**
     * Zanderij / UTM zone 21N
     * Extent: Suriname.
     */
    public const EPSG_ZANDERIJ_UTM_ZONE_21N = 'urn:ogc:def:crs:EPSG::31121';

    /**
     * Fk89 / Faroe Lambert FK89
     * Extent: Faroe Islands - onshore
     * Replaces FD54 / Faroe Lambert (fk54) (CRS code 3144) for cadastral survey.
     */
    public const EPSG_FK89_FAROE_LAMBERT_FK89 = 'urn:ogc:def:crs:EPSG::3173';
}
