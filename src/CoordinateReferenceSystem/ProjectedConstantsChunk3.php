<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\CoordinateReferenceSystem;

trait ProjectedConstantsChunk3
{
    /**
     * NAD83(CSRS) / Teranet Ontario Lambert
     * Extent: Canada - Ontario
     * This CRS may sometimes be called "NAD83 / Teranet Ontario Lambert". That is the name of a different system (see
     * CRS code 5320) but at the scales involved the positional difference of under 2 metres may not be significant.
     */
    public const EPSG_NAD83_CSRS_TERANET_ONTARIO_LAMBERT = 'urn:ogc:def:crs:EPSG::5321';

    /**
     * NAD83(CSRS) / UTM zone 10N
     * Extent: Canada between 126°W and 120°W,  south of 84°N - British Columbia, Northwest Territories, Yukon.
     */
    public const EPSG_NAD83_CSRS_UTM_ZONE_10N = 'urn:ogc:def:crs:EPSG::3157';

    /**
     * NAD83(CSRS) / UTM zone 11N
     * Extent: Canada between 120°W and 114°W - Alberta, British Columbia, Northwest Territories, Nunavut
     * In use from 2000.
     */
    public const EPSG_NAD83_CSRS_UTM_ZONE_11N = 'urn:ogc:def:crs:EPSG::2955';

    /**
     * NAD83(CSRS) / UTM zone 12N
     * Extent: Canada between 114°W and 108°W - Alberta, Northwest Territories, Nunavut, Saskatchewan
     * In use from 2000.
     */
    public const EPSG_NAD83_CSRS_UTM_ZONE_12N = 'urn:ogc:def:crs:EPSG::2956';

    /**
     * NAD83(CSRS) / UTM zone 13N
     * Extent: Canada between 108°W and 102°W - Northwest Territories, Nunavut, Saskatchewan
     * In use from 2000.
     */
    public const EPSG_NAD83_CSRS_UTM_ZONE_13N = 'urn:ogc:def:crs:EPSG::2957';

    /**
     * NAD83(CSRS) / UTM zone 14N
     * Extent: Canada between 102°W and 96°W,  south of 84°N - Manitoba, Nunavut, Saskatchewan.
     */
    public const EPSG_NAD83_CSRS_UTM_ZONE_14N = 'urn:ogc:def:crs:EPSG::3158';

    /**
     * NAD83(CSRS) / UTM zone 15N
     * Extent: Canada between 96°W and 90°W,  south of 84°N - Manitoba, Nunavut, Ontario.
     */
    public const EPSG_NAD83_CSRS_UTM_ZONE_15N = 'urn:ogc:def:crs:EPSG::3159';

    /**
     * NAD83(CSRS) / UTM zone 16N
     * Extent: Canada between 90°W and 84°W,  south of 84°N - Manitoba, Nunavut, Ontario.
     */
    public const EPSG_NAD83_CSRS_UTM_ZONE_16N = 'urn:ogc:def:crs:EPSG::3160';

    /**
     * NAD83(CSRS) / UTM zone 17N
     * Extent: Canada between 84°W and 78°W,  south of 84°N - Nunavut, Ontario and Quebec
     * In use from 2000.
     */
    public const EPSG_NAD83_CSRS_UTM_ZONE_17N = 'urn:ogc:def:crs:EPSG::2958';

    /**
     * NAD83(CSRS) / UTM zone 18N
     * Extent: Canada between 78°W and 72°W,  south of 84°N - Nunavut, Ontario and Quebec
     * In use from 2000.
     */
    public const EPSG_NAD83_CSRS_UTM_ZONE_18N = 'urn:ogc:def:crs:EPSG::2959';

    /**
     * NAD83(CSRS) / UTM zone 19N
     * Extent: Canada between 72°W and 66°W - New Brunswick, Labrador, Nova Scotia, Nunavut, Quebec
     * In use from 1999.
     */
    public const EPSG_NAD83_CSRS_UTM_ZONE_19N = 'urn:ogc:def:crs:EPSG::2960';

    /**
     * NAD83(CSRS) / UTM zone 20N
     * Extent: Canada between 66°W and 60°W - New Brunswick, Labrador, Nova Scotia, Nunavut, Prince Edward Island,
     * Quebec
     * In use from 1999.
     */
    public const EPSG_NAD83_CSRS_UTM_ZONE_20N = 'urn:ogc:def:crs:EPSG::2961';

    /**
     * NAD83(CSRS) / UTM zone 21N
     * Extent: Canada between 60°W and 54°W - Newfoundland and Labrador; Nunavut; Quebec
     * In use from 2000.
     */
    public const EPSG_NAD83_CSRS_UTM_ZONE_21N = 'urn:ogc:def:crs:EPSG::2962';

    /**
     * NAD83(CSRS) / UTM zone 22N
     * Extent: Canada between 54°W and 48°W - Newfoundland and Labrador.
     */
    public const EPSG_NAD83_CSRS_UTM_ZONE_22N = 'urn:ogc:def:crs:EPSG::3761';

    /**
     * NAD83(CSRS) / UTM zone 23N
     * Extent: Canada offshore Atlantic - 48°W to 42°W.
     */
    public const EPSG_NAD83_CSRS_UTM_ZONE_23N = 'urn:ogc:def:crs:EPSG::9709';

    /**
     * NAD83(CSRS) / UTM zone 24N
     * Extent: Canada offshore Atlantic - east of 42°W.
     */
    public const EPSG_NAD83_CSRS_UTM_ZONE_24N = 'urn:ogc:def:crs:EPSG::9713';

    /**
     * NAD83(CSRS) / UTM zone 7N
     * Extent: Canada west of 138°W,  south of 84°N - British Columbia, Yukon.
     */
    public const EPSG_NAD83_CSRS_UTM_ZONE_7N = 'urn:ogc:def:crs:EPSG::3154';

    /**
     * NAD83(CSRS) / UTM zone 8N
     * Extent: Canada between 138°W and 132°W,  south of 84°N - British Columbia, Northwest Territories, Yukon.
     */
    public const EPSG_NAD83_CSRS_UTM_ZONE_8N = 'urn:ogc:def:crs:EPSG::3155';

    /**
     * NAD83(CSRS) / UTM zone 9N
     * Extent: Canada - between 132°W and 126°W,  south of 84°N - British Columbia, Northwest Territories, Yukon.
     */
    public const EPSG_NAD83_CSRS_UTM_ZONE_9N = 'urn:ogc:def:crs:EPSG::3156';

    /**
     * NAD83(CSRS) / Yukon Albers
     * Extent: Canada - Yukon
     * This CRS may sometimes be called "NAD83 / Yukon Albers". That is the name of a different system (see CRS code
     * 3578) but at the scales involved the positional difference of under 2 metres may not be significant.
     */
    public const EPSG_NAD83_CSRS_YUKON_ALBERS = 'urn:ogc:def:crs:EPSG::3579';

    /**
     * NAD83(CSRS)v2 / Alberta 3TM ref merid 111 W
     * Extent: Canada - Alberta - east of 112°30'W
     * If used for rural area control markers, area of use is amended to east of 112°W; however use of NAD83(CSRS)v2 /
     * UTM zone 12N (CRS code 22212) is encouraged in these rural areas.
     */
    public const EPSG_NAD83_CSRS_V2_ALBERTA_3TM_REF_MERID_111_W = 'urn:ogc:def:crs:EPSG::22262';

    /**
     * NAD83(CSRS)v2 / Alberta 3TM ref merid 114 W
     * Extent: Canada - Alberta - between 115°30'W and 112°30'W
     * If used for rural area control markers, area of use is amended to between 116°W and 112°W; however use of
     * NAD83(CSRS)v2 / UTM zones 11N and 12N (CRS codes 22211 and 22212) is encouraged in these rural areas.
     */
    public const EPSG_NAD83_CSRS_V2_ALBERTA_3TM_REF_MERID_114_W = 'urn:ogc:def:crs:EPSG::22263';

    /**
     * NAD83(CSRS)v2 / Alberta 3TM ref merid 117 W
     * Extent: Canada - Alberta - between 118°30'W and 115°30' W
     * If used for rural area control markers, area of use is amended to between 118°W and 116°W; however use of
     * NAD83(CSRS)v2 / UTM zone 11N (CRS code 22211) is encouraged in these rural areas.
     */
    public const EPSG_NAD83_CSRS_V2_ALBERTA_3TM_REF_MERID_117_W = 'urn:ogc:def:crs:EPSG::22264';

    /**
     * NAD83(CSRS)v2 / Alberta 3TM ref merid 120 W
     * Extent: Canada - Alberta - west of 118°30' W
     * If used for rural area control markers, area of use is amended to west of 118°W; however use of NAD83(CSRS)v2 /
     * UTM zone 11N (CRS code 22211) is encouraged in these rural areas.
     */
    public const EPSG_NAD83_CSRS_V2_ALBERTA_3TM_REF_MERID_120_W = 'urn:ogc:def:crs:EPSG::22265';

    /**
     * NAD83(CSRS)v2 / NB Stereographic
     * Extent: Canada - New Brunswick
     * In use from 1999.
     */
    public const EPSG_NAD83_CSRS_V2_NB_STEREOGRAPHIC = 'urn:ogc:def:crs:EPSG::22240';

    /**
     * NAD83(CSRS)v2 / PEI Stereographic
     * Extent: Canada - Prince Edward Island.
     */
    public const EPSG_NAD83_CSRS_V2_PEI_STEREOGRAPHIC = 'urn:ogc:def:crs:EPSG::22239';

    /**
     * NAD83(CSRS)v2 / Quebec Albers
     * Extent: Canada - Quebec.
     */
    public const EPSG_NAD83_CSRS_V2_QUEBEC_ALBERS = 'urn:ogc:def:crs:EPSG::6624';

    /**
     * NAD83(CSRS)v2 / Quebec Lambert
     * Extent: Canada - Quebec.
     */
    public const EPSG_NAD83_CSRS_V2_QUEBEC_LAMBERT = 'urn:ogc:def:crs:EPSG::6622';

    /**
     * NAD83(CSRS)v2 / SCoPQ zone 10
     * Extent: Canada - Quebec - west of 78°W.
     */
    public const EPSG_NAD83_CSRS_V2_SCOPQ_ZONE_10 = 'urn:ogc:def:crs:EPSG::22250';

    /**
     * NAD83(CSRS)v2 / SCoPQ zone 3
     * Extent: Canada - Quebec - east of 60°W.
     */
    public const EPSG_NAD83_CSRS_V2_SCOPQ_ZONE_3 = 'urn:ogc:def:crs:EPSG::22243';

    /**
     * NAD83(CSRS)v2 / SCoPQ zone 4
     * Extent: Canada - Quebec - between 63°W and 60°W.
     */
    public const EPSG_NAD83_CSRS_V2_SCOPQ_ZONE_4 = 'urn:ogc:def:crs:EPSG::22244';

    /**
     * NAD83(CSRS)v2 / SCoPQ zone 5
     * Extent: Canada - Quebec - between 66°W and 63°W.
     */
    public const EPSG_NAD83_CSRS_V2_SCOPQ_ZONE_5 = 'urn:ogc:def:crs:EPSG::22245';

    /**
     * NAD83(CSRS)v2 / SCoPQ zone 6
     * Extent: Canada - Quebec - between 69°W and 66°W.
     */
    public const EPSG_NAD83_CSRS_V2_SCOPQ_ZONE_6 = 'urn:ogc:def:crs:EPSG::22246';

    /**
     * NAD83(CSRS)v2 / SCoPQ zone 7
     * Extent: Canada - Quebec - between 72°W and 69°W.
     */
    public const EPSG_NAD83_CSRS_V2_SCOPQ_ZONE_7 = 'urn:ogc:def:crs:EPSG::22247';

    /**
     * NAD83(CSRS)v2 / SCoPQ zone 8
     * Extent: Canada - Quebec - between 75°W and 72°W.
     */
    public const EPSG_NAD83_CSRS_V2_SCOPQ_ZONE_8 = 'urn:ogc:def:crs:EPSG::22248';

    /**
     * NAD83(CSRS)v2 / SCoPQ zone 9
     * Extent: Canada - Quebec - between 78°W and 75°W.
     */
    public const EPSG_NAD83_CSRS_V2_SCOPQ_ZONE_9 = 'urn:ogc:def:crs:EPSG::22249';

    /**
     * NAD83(CSRS)v2 / UTM zone 10N
     * Extent: Canada between 126°W and 120°W,  south of 84°N - British Columbia, Northwest Territories, Yukon
     * Adopted by the Canadian federal government in 1998.
     */
    public const EPSG_NAD83_CSRS_V2_UTM_ZONE_10N = 'urn:ogc:def:crs:EPSG::22210';

    /**
     * NAD83(CSRS)v2 / UTM zone 11N
     * Extent: Canada between 120°W and 114°W - Alberta, British Columbia, Northwest Territories, Nunavut
     * Adopted by the Canadian federal government in 1998 and the provincial government of Alberta in 1999.
     */
    public const EPSG_NAD83_CSRS_V2_UTM_ZONE_11N = 'urn:ogc:def:crs:EPSG::22211';

    /**
     * NAD83(CSRS)v2 / UTM zone 12N
     * Extent: Canada between 114°W and 108°W - Alberta, Northwest Territories, Nunavut, Saskatchewan
     * Adopted by the Canadian federal government in 1998 and the provincial governments of Alberta in 1999 and
     * Saskatchewan in 2000. Note: SK uses zone 13 (CRS code 22213) for province-wide mapping and spatial referencing.
     */
    public const EPSG_NAD83_CSRS_V2_UTM_ZONE_12N = 'urn:ogc:def:crs:EPSG::22212';

    /**
     * NAD83(CSRS)v2 / UTM zone 13N
     * Extent: Canada - Saskatchewan, Canada between 108°W and 102°W - Northwest Territories, Nunavut, Saskatchewan
     * Adopted by the Canadian federal government in 1998 and the provincial government of Saskatchewan in 2000. This
     * zone used throughout all SK for province-wide mapping and spatial referencing.
     */
    public const EPSG_NAD83_CSRS_V2_UTM_ZONE_13N = 'urn:ogc:def:crs:EPSG::22213';

    /**
     * NAD83(CSRS)v2 / UTM zone 14N
     * Extent: Canada between 102°W and 96°W,  south of 84°N - Manitoba, Nunavut, Saskatchewan
     * Adopted by the Canadian federal government in 1998 and the provincial governments of Saskatchewan in 2000 and
     * Manitoba in 2001. Note: SK uses zone 13 (CRS code 22213) for province-wide mapping and spatial referencing.
     */
    public const EPSG_NAD83_CSRS_V2_UTM_ZONE_14N = 'urn:ogc:def:crs:EPSG::22214';

    /**
     * NAD83(CSRS)v2 / UTM zone 15N
     * Extent: Canada between 96°W and 90°W,  south of 84°N - Manitoba, Nunavut, Ontario
     * Adopted by the Canadian federal government in 1998 and the provincial government of Manitoba in 2001.
     */
    public const EPSG_NAD83_CSRS_V2_UTM_ZONE_15N = 'urn:ogc:def:crs:EPSG::22215';

    /**
     * NAD83(CSRS)v2 / UTM zone 16N
     * Extent: Canada between 90°W and 84°W,  south of 84°N - Manitoba, Nunavut, Ontario
     * Adopted by the Canadian federal government in 1998 and the provincial government of Manitoba in 2001.
     */
    public const EPSG_NAD83_CSRS_V2_UTM_ZONE_16N = 'urn:ogc:def:crs:EPSG::22216';

    /**
     * NAD83(CSRS)v2 / UTM zone 17N
     * Extent: Canada between 84°W and 78°W,  south of 84°N - Nunavut, Ontario and Quebec
     * Adopted by the Canadian federal government in 1998 and the provincial government of Quebec in 2004.
     */
    public const EPSG_NAD83_CSRS_V2_UTM_ZONE_17N = 'urn:ogc:def:crs:EPSG::22217';

    /**
     * NAD83(CSRS)v2 / UTM zone 18N
     * Extent: Canada between 78°W and 72°W,  south of 84°N - Nunavut, Ontario and Quebec
     * Adopted by the Canadian federal government in 1998 and the provincial government of Quebec in 2004.
     */
    public const EPSG_NAD83_CSRS_V2_UTM_ZONE_18N = 'urn:ogc:def:crs:EPSG::22218';

    /**
     * NAD83(CSRS)v2 / UTM zone 19N
     * Extent: Canada between 72°W and 66°W - New Brunswick, Labrador, Nova Scotia, Nunavut, Quebec
     * Adopted by the Canadian federal government in 1998 and the provincial governments of Quebec in 2004 and New
     * Brunswick in 1999.
     */
    public const EPSG_NAD83_CSRS_V2_UTM_ZONE_19N = 'urn:ogc:def:crs:EPSG::22219';

    /**
     * NAD83(CSRS)v2 / UTM zone 20N
     * Extent: Canada between 66°W and 60°W - New Brunswick, Labrador, Nova Scotia, Nunavut, Prince Edward Island,
     * Quebec
     * Adopted by the Canadian federal government in 1998 and the provincial governments of Quebec in 2004, New
     * Brunswick in 1999 and Prince Edward Island in 2000.
     */
    public const EPSG_NAD83_CSRS_V2_UTM_ZONE_20N = 'urn:ogc:def:crs:EPSG::22220';

    /**
     * NAD83(CSRS)v2 / UTM zone 21N
     * Extent: Canada between 60°W and 54°W - Newfoundland and Labrador; Nunavut; Quebec
     * Adopted by the Canadian federal government in 1998 and the provincial government of Quebec in 2004.
     */
    public const EPSG_NAD83_CSRS_V2_UTM_ZONE_21N = 'urn:ogc:def:crs:EPSG::22221';

    /**
     * NAD83(CSRS)v2 / UTM zone 22N
     * Extent: Canada between 54°W and 48°W - Newfoundland and Labrador
     * Adopted by the Canadian federal government in 1998.
     */
    public const EPSG_NAD83_CSRS_V2_UTM_ZONE_22N = 'urn:ogc:def:crs:EPSG::22222';

    /**
     * NAD83(CSRS)v2 / UTM zone 7N
     * Extent: Canada west of 138°W,  south of 84°N - British Columbia, Yukon
     * Adopted by the Canadian federal government in 1998.
     */
    public const EPSG_NAD83_CSRS_V2_UTM_ZONE_7N = 'urn:ogc:def:crs:EPSG::22207';

    /**
     * NAD83(CSRS)v2 / UTM zone 8N
     * Extent: Canada between 138°W and 132°W,  south of 84°N - British Columbia, Northwest Territories, Yukon
     * Adopted by the Canadian federal government in 1998.
     */
    public const EPSG_NAD83_CSRS_V2_UTM_ZONE_8N = 'urn:ogc:def:crs:EPSG::22208';

    /**
     * NAD83(CSRS)v2 / UTM zone 9N
     * Extent: Canada - between 132°W and 126°W,  south of 84°N - British Columbia, Northwest Territories, Yukon
     * Adopted by the Canadian federal government in 1998.
     */
    public const EPSG_NAD83_CSRS_V2_UTM_ZONE_9N = 'urn:ogc:def:crs:EPSG::22209';

    /**
     * NAD83(CSRS)v3 / MTM NS 1997 zone 4
     * Extent: Canada - Nova Scotia - east of 63°W
     * Replaced by NAD83(CSRS)v6 / MTM NS 2010 zone 4 (code 8082) from 2015.
     */
    public const EPSG_NAD83_CSRS_V3_MTM_NS_1997_ZONE_4 = 'urn:ogc:def:crs:EPSG::22338';

    /**
     * NAD83(CSRS)v3 / MTM NS 1997 zone 5
     * Extent: Canada - Nova Scotia - west of 63°W
     * Replaced by NAD83(CSRS)v6 / MTM NS 2010 zone 5 (code 8083) from 2015.
     */
    public const EPSG_NAD83_CSRS_V3_MTM_NS_1997_ZONE_5 = 'urn:ogc:def:crs:EPSG::22337';

    /**
     * NAD83(CSRS)v3 / MTM zone 10
     * Extent: Canada - Ontario - between 81°W and 78°W: south of 46°N in area to west of 80°15'W, south of 47°N
     * in area between 80°15'W and 79°30'W, entire province between 79°30'W and 78°W.
     */
    public const EPSG_NAD83_CSRS_V3_MTM_ZONE_10 = 'urn:ogc:def:crs:EPSG::22350';

    /**
     * NAD83(CSRS)v3 / MTM zone 11
     * Extent: Canada - Ontario - south of 46°N and west of 81°W.
     */
    public const EPSG_NAD83_CSRS_V3_MTM_ZONE_11 = 'urn:ogc:def:crs:EPSG::22351';

    /**
     * NAD83(CSRS)v3 / MTM zone 12
     * Extent: Canada - Ontario - between 82°30'W and 79°30'W: north of 46°N in area between 82°30'W and 80°15'W,
     * north of 47°N in area between 80°15'W and 79°30'W.
     */
    public const EPSG_NAD83_CSRS_V3_MTM_ZONE_12 = 'urn:ogc:def:crs:EPSG::22352';

    /**
     * NAD83(CSRS)v3 / MTM zone 13
     * Extent: Canada - Ontario - between 85°30'W and 82°30'W and north of 46°N.
     */
    public const EPSG_NAD83_CSRS_V3_MTM_ZONE_13 = 'urn:ogc:def:crs:EPSG::22353';

    /**
     * NAD83(CSRS)v3 / MTM zone 14
     * Extent: Canada - Ontario - between 88°30'W and 85°30'W.
     */
    public const EPSG_NAD83_CSRS_V3_MTM_ZONE_14 = 'urn:ogc:def:crs:EPSG::22354';

    /**
     * NAD83(CSRS)v3 / MTM zone 15
     * Extent: Canada - Ontario - between 91°30'W and 88°30'W.
     */
    public const EPSG_NAD83_CSRS_V3_MTM_ZONE_15 = 'urn:ogc:def:crs:EPSG::22355';

    /**
     * NAD83(CSRS)v3 / MTM zone 16
     * Extent: Canada - Ontario - between 94°30'W and 91°30'W.
     */
    public const EPSG_NAD83_CSRS_V3_MTM_ZONE_16 = 'urn:ogc:def:crs:EPSG::22356';

    /**
     * NAD83(CSRS)v3 / MTM zone 17
     * Extent: Canada - Ontario - west of 94°30'W.
     */
    public const EPSG_NAD83_CSRS_V3_MTM_ZONE_17 = 'urn:ogc:def:crs:EPSG::22357';

    /**
     * NAD83(CSRS)v3 / MTM zone 8
     * Extent: Canada - Ontario - east of 75°W.
     */
    public const EPSG_NAD83_CSRS_V3_MTM_ZONE_8 = 'urn:ogc:def:crs:EPSG::22348';

    /**
     * NAD83(CSRS)v3 / MTM zone 9
     * Extent: Canada - Ontario - between 78°W and 75°W.
     */
    public const EPSG_NAD83_CSRS_V3_MTM_ZONE_9 = 'urn:ogc:def:crs:EPSG::22349';

    /**
     * NAD83(CSRS)v3 / UTM zone 10N
     * Extent: Canada between 126°W and 120°W,  south of 84°N - British Columbia, Northwest Territories, Yukon
     * Adopted by the Canadian federal government in 2000 and the provincial government of British Columbia for CRD
     * only in 2000 and all Victoria Island in 2005.
     */
    public const EPSG_NAD83_CSRS_V3_UTM_ZONE_10N = 'urn:ogc:def:crs:EPSG::22310';

    /**
     * NAD83(CSRS)v3 / UTM zone 11N
     * Extent: Canada between 120°W and 114°W - Alberta, British Columbia, Northwest Territories, Nunavut
     * Adopted by the Canadian federal government in 2000.
     */
    public const EPSG_NAD83_CSRS_V3_UTM_ZONE_11N = 'urn:ogc:def:crs:EPSG::22311';

    /**
     * NAD83(CSRS)v3 / UTM zone 12N
     * Extent: Canada between 114°W and 108°W - Alberta, Northwest Territories, Nunavut, Saskatchewan
     * Adopted by the Canadian federal government in 2000.
     */
    public const EPSG_NAD83_CSRS_V3_UTM_ZONE_12N = 'urn:ogc:def:crs:EPSG::22312';

    /**
     * NAD83(CSRS)v3 / UTM zone 13N
     * Extent: Canada between 108°W and 102°W - Northwest Territories, Nunavut, Saskatchewan
     * Adopted by the Canadian federal government in 2000.
     */
    public const EPSG_NAD83_CSRS_V3_UTM_ZONE_13N = 'urn:ogc:def:crs:EPSG::22313';

    /**
     * NAD83(CSRS)v3 / UTM zone 14N
     * Extent: Canada between 102°W and 96°W,  south of 84°N - Manitoba, Nunavut, Saskatchewan
     * Adopted by the Canadian federal government in 2000.
     */
    public const EPSG_NAD83_CSRS_V3_UTM_ZONE_14N = 'urn:ogc:def:crs:EPSG::22314';

    /**
     * NAD83(CSRS)v3 / UTM zone 15N
     * Extent: Canada between 96°W and 90°W,  south of 84°N - Manitoba, Nunavut, Ontario
     * Adopted by the Canadian federal government in 2000 and the provincial government of Ontario in 2008.
     */
    public const EPSG_NAD83_CSRS_V3_UTM_ZONE_15N = 'urn:ogc:def:crs:EPSG::22315';

    /**
     * NAD83(CSRS)v3 / UTM zone 16N
     * Extent: Canada between 90°W and 84°W,  south of 84°N - Manitoba, Nunavut, Ontario
     * Adopted by the Canadian federal government in 2000 and the provincial government of Ontario in 2008.
     */
    public const EPSG_NAD83_CSRS_V3_UTM_ZONE_16N = 'urn:ogc:def:crs:EPSG::22316';

    /**
     * NAD83(CSRS)v3 / UTM zone 17N
     * Extent: Canada between 84°W and 78°W,  south of 84°N - Nunavut, Ontario and Quebec
     * Adopted by the Canadian federal government in 2000 and the provincial government of Ontario in 2008.
     */
    public const EPSG_NAD83_CSRS_V3_UTM_ZONE_17N = 'urn:ogc:def:crs:EPSG::22317';

    /**
     * NAD83(CSRS)v3 / UTM zone 18N
     * Extent: Canada between 78°W and 72°W,  south of 84°N - Nunavut, Ontario and Quebec
     * Adopted by the Canadian federal government in 2000 and the provincial government of Ontario in 2008.
     */
    public const EPSG_NAD83_CSRS_V3_UTM_ZONE_18N = 'urn:ogc:def:crs:EPSG::22318';

    /**
     * NAD83(CSRS)v3 / UTM zone 19N
     * Extent: Canada between 72°W and 66°W - New Brunswick, Labrador, Nova Scotia, Nunavut, Quebec
     * Adopted by the Canadian federal government in 2000 and the provincial government of Nova Scotia in 2000.
     */
    public const EPSG_NAD83_CSRS_V3_UTM_ZONE_19N = 'urn:ogc:def:crs:EPSG::22319';

    /**
     * NAD83(CSRS)v3 / UTM zone 20N
     * Extent: Canada between 66°W and 60°W - New Brunswick, Labrador, Nova Scotia, Nunavut, Prince Edward Island,
     * Quebec
     * Adopted by the Canadian federal government in 1998 and the provincial government of Nova Scotia in 2000.
     */
    public const EPSG_NAD83_CSRS_V3_UTM_ZONE_20N = 'urn:ogc:def:crs:EPSG::22320';

    /**
     * NAD83(CSRS)v3 / UTM zone 21N
     * Extent: Canada between 60°W and 54°W - Newfoundland and Labrador; Nunavut; Quebec
     * Adopted by the Canadian federal government in 2000 and the provincial government of Nova Scotia in 2000.
     */
    public const EPSG_NAD83_CSRS_V3_UTM_ZONE_21N = 'urn:ogc:def:crs:EPSG::22321';

    /**
     * NAD83(CSRS)v3 / UTM zone 22N
     * Extent: Canada between 54°W and 48°W - Newfoundland and Labrador
     * Adopted by the Canadian federal government in 2000.
     */
    public const EPSG_NAD83_CSRS_V3_UTM_ZONE_22N = 'urn:ogc:def:crs:EPSG::22322';

    /**
     * NAD83(CSRS)v3 / UTM zone 7N
     * Extent: Canada west of 138°W,  south of 84°N - British Columbia, Yukon
     * Adopted by the Canadian federal government in 2000.
     */
    public const EPSG_NAD83_CSRS_V3_UTM_ZONE_7N = 'urn:ogc:def:crs:EPSG::22307';

    /**
     * NAD83(CSRS)v3 / UTM zone 8N
     * Extent: Canada between 138°W and 132°W,  south of 84°N - British Columbia, Northwest Territories, Yukon
     * Adopted by the Canadian federal government in 2000.
     */
    public const EPSG_NAD83_CSRS_V3_UTM_ZONE_8N = 'urn:ogc:def:crs:EPSG::22308';

    /**
     * NAD83(CSRS)v3 / UTM zone 9N
     * Extent: Canada - between 132°W and 126°W,  south of 84°N - British Columbia, Northwest Territories, Yukon
     * Adopted by the Canadian federal government in 2000 and the provincial government of British Columbia for
     * Victoria Island (but not mainland) in 2005.
     */
    public const EPSG_NAD83_CSRS_V3_UTM_ZONE_9N = 'urn:ogc:def:crs:EPSG::22309';

    /**
     * NAD83(CSRS)v4 / Alberta 3TM ref merid 111 W
     * Extent: Canada - Alberta - east of 112°30'W
     * If used for rural area control markers, area of use is amended to east of 112°W; however use of NAD83(CSRS)v4 /
     * UTM zone 12N (CRS code 22412) is encouraged in these rural areas.
     */
    public const EPSG_NAD83_CSRS_V4_ALBERTA_3TM_REF_MERID_111_W = 'urn:ogc:def:crs:EPSG::22462';

    /**
     * NAD83(CSRS)v4 / Alberta 3TM ref merid 114 W
     * Extent: Canada - Alberta - between 115°30'W and 112°30'W
     * If used for rural area control markers, area of use is amended to between 116°W and 112°W; however use of
     * NAD83(CSRS)v4 / UTM zones 11N and 12N (CRS codes 22411 and 22412) is encouraged in these rural areas.
     */
    public const EPSG_NAD83_CSRS_V4_ALBERTA_3TM_REF_MERID_114_W = 'urn:ogc:def:crs:EPSG::22463';

    /**
     * NAD83(CSRS)v4 / Alberta 3TM ref merid 117 W
     * Extent: Canada - Alberta - between 118°30'W and 115°30' W
     * If used for rural area control markers, area of use is amended to between 118°W and 116°W; however use of
     * NAD83(CSRS)v4 / UTM zone 11N (CRS code 22411) is encouraged in these rural areas.
     */
    public const EPSG_NAD83_CSRS_V4_ALBERTA_3TM_REF_MERID_117_W = 'urn:ogc:def:crs:EPSG::22464';

    /**
     * NAD83(CSRS)v4 / Alberta 3TM ref merid 120 W
     * Extent: Canada - Alberta - west of 118°30' W
     * If used for rural area control markers, area of use is amended to west of 118°W; however use of NAD83(CSRS)v4 /
     * UTM zone 11N (CRS code 22411) is encouraged in these rural areas.
     */
    public const EPSG_NAD83_CSRS_V4_ALBERTA_3TM_REF_MERID_120_W = 'urn:ogc:def:crs:EPSG::22465';

    /**
     * NAD83(CSRS)v4 / UTM zone 10N
     * Extent: Canada between 126°W and 120°W,  south of 84°N - British Columbia, Northwest Territories, Yukon
     * Adopted by the Canadian federal government in 2002 and the provincial government of British Columbia for
     * mainland only (not Victoria Island) in 2005.
     */
    public const EPSG_NAD83_CSRS_V4_UTM_ZONE_10N = 'urn:ogc:def:crs:EPSG::22410';

    /**
     * NAD83(CSRS)v4 / UTM zone 11N
     * Extent: Canada between 120°W and 114°W - Alberta, British Columbia, Northwest Territories, Nunavut
     * Adopted by the Canadian federal government in 2002 and the provincial governments of British Columbia (for
     * mainland only, not Victoria Island) in 2005 and Alberta in 2004.
     */
    public const EPSG_NAD83_CSRS_V4_UTM_ZONE_11N = 'urn:ogc:def:crs:EPSG::22411';

    /**
     * NAD83(CSRS)v4 / UTM zone 12N
     * Extent: Canada between 114°W and 108°W - Alberta, Northwest Territories, Nunavut, Saskatchewan
     * Adopted by the Canadian federal government in 2002 and the provincial government of Alberta in 2004.
     */
    public const EPSG_NAD83_CSRS_V4_UTM_ZONE_12N = 'urn:ogc:def:crs:EPSG::22412';

    /**
     * NAD83(CSRS)v4 / UTM zone 13N
     * Extent: Canada between 108°W and 102°W - Northwest Territories, Nunavut, Saskatchewan
     * Adopted by the Canadian federal government in 2002.
     */
    public const EPSG_NAD83_CSRS_V4_UTM_ZONE_13N = 'urn:ogc:def:crs:EPSG::22413';

    /**
     * NAD83(CSRS)v4 / UTM zone 14N
     * Extent: Canada between 102°W and 96°W,  south of 84°N - Manitoba, Nunavut, Saskatchewan
     * Adopted by the Canadian federal government in 2002.
     */
    public const EPSG_NAD83_CSRS_V4_UTM_ZONE_14N = 'urn:ogc:def:crs:EPSG::22414';

    /**
     * NAD83(CSRS)v4 / UTM zone 15N
     * Extent: Canada between 96°W and 90°W,  south of 84°N - Manitoba, Nunavut, Ontario
     * Adopted by the Canadian federal government in 2002.
     */
    public const EPSG_NAD83_CSRS_V4_UTM_ZONE_15N = 'urn:ogc:def:crs:EPSG::22415';

    /**
     * NAD83(CSRS)v4 / UTM zone 16N
     * Extent: Canada between 90°W and 84°W,  south of 84°N - Manitoba, Nunavut, Ontario
     * Adopted by the Canadian federal government in 2002.
     */
    public const EPSG_NAD83_CSRS_V4_UTM_ZONE_16N = 'urn:ogc:def:crs:EPSG::22416';

    /**
     * NAD83(CSRS)v4 / UTM zone 17N
     * Extent: Canada between 84°W and 78°W,  south of 84°N - Nunavut, Ontario and Quebec
     * Adopted by the Canadian federal government in 2002.
     */
    public const EPSG_NAD83_CSRS_V4_UTM_ZONE_17N = 'urn:ogc:def:crs:EPSG::22417';

    /**
     * NAD83(CSRS)v4 / UTM zone 18N
     * Extent: Canada between 78°W and 72°W,  south of 84°N - Nunavut, Ontario and Quebec
     * Adopted by the Canadian federal government in 2002.
     */
    public const EPSG_NAD83_CSRS_V4_UTM_ZONE_18N = 'urn:ogc:def:crs:EPSG::22418';

    /**
     * NAD83(CSRS)v4 / UTM zone 19N
     * Extent: Canada between 72°W and 66°W - New Brunswick, Labrador, Nova Scotia, Nunavut, Quebec
     * Adopted by the Canadian federal government in 2002.
     */
    public const EPSG_NAD83_CSRS_V4_UTM_ZONE_19N = 'urn:ogc:def:crs:EPSG::22419';

    /**
     * NAD83(CSRS)v4 / UTM zone 20N
     * Extent: Canada between 66°W and 60°W - New Brunswick, Labrador, Nova Scotia, Nunavut, Prince Edward Island,
     * Quebec
     * Adopted by the Canadian federal government in 2002.
     */
    public const EPSG_NAD83_CSRS_V4_UTM_ZONE_20N = 'urn:ogc:def:crs:EPSG::22420';

    /**
     * NAD83(CSRS)v4 / UTM zone 21N
     * Extent: Canada between 60°W and 54°W - Newfoundland and Labrador; Nunavut; Quebec
     * Adopted by the Canadian federal government in 2002.
     */
    public const EPSG_NAD83_CSRS_V4_UTM_ZONE_21N = 'urn:ogc:def:crs:EPSG::22421';

    /**
     * NAD83(CSRS)v4 / UTM zone 22N
     * Extent: Canada between 54°W and 48°W - Newfoundland and Labrador
     * Adopted by the Canadian federal government in 2002.
     */
    public const EPSG_NAD83_CSRS_V4_UTM_ZONE_22N = 'urn:ogc:def:crs:EPSG::22422';

    /**
     * NAD83(CSRS)v4 / UTM zone 7N
     * Extent: Canada west of 138°W,  south of 84°N - British Columbia, Yukon
     * Adopted by the Canadian federal government in 2002 and the provincial government of British Columbia for
     * mainland only (not Victoria Island) in 2005.
     */
    public const EPSG_NAD83_CSRS_V4_UTM_ZONE_7N = 'urn:ogc:def:crs:EPSG::22407';

    /**
     * NAD83(CSRS)v4 / UTM zone 8N
     * Extent: Canada between 138°W and 132°W,  south of 84°N - British Columbia, Northwest Territories, Yukon
     * Adopted by the Canadian federal government in 2002 and the provincial government of British Columbia for
     * mainland only (not Victoria Island) in 2005.
     */
    public const EPSG_NAD83_CSRS_V4_UTM_ZONE_8N = 'urn:ogc:def:crs:EPSG::22408';

    /**
     * NAD83(CSRS)v4 / UTM zone 9N
     * Extent: Canada - between 132°W and 126°W,  south of 84°N - British Columbia, Northwest Territories, Yukon
     * Adopted by the Canadian federal government in 2002 and the provincial government of British Columbia for
     * mainland only (not Victoria Island) in 2005.
     */
    public const EPSG_NAD83_CSRS_V4_UTM_ZONE_9N = 'urn:ogc:def:crs:EPSG::22409';

    /**
     * NAD83(CSRS)v6 / MTM NS 2010 zone 4
     * Extent: Canada - Nova Scotia - east of 63°W
     * In use from 2015.
     */
    public const EPSG_NAD83_CSRS_V6_MTM_NS_2010_ZONE_4 = 'urn:ogc:def:crs:EPSG::8082';

    /**
     * NAD83(CSRS)v6 / MTM NS 2010 zone 5
     * Extent: Canada - Nova Scotia - west of 63°W
     * In use from 2015.
     */
    public const EPSG_NAD83_CSRS_V6_MTM_NS_2010_ZONE_5 = 'urn:ogc:def:crs:EPSG::8083';

    /**
     * NAD83(CSRS)v6 / MTM zone 1
     * Extent: Canada - Newfoundland - onshore east of 54°30'W.
     */
    public const EPSG_NAD83_CSRS_V6_MTM_ZONE_1 = 'urn:ogc:def:crs:EPSG::22641';

    /**
     * NAD83(CSRS)v6 / MTM zone 10
     * Extent: Canada - Ontario - between 81°W and 78°W: south of 46°N in area to west of 80°15'W, south of 47°N
     * in area between 80°15'W and 79°30'W, entire province between 79°30'W and 78°W.
     */
    public const EPSG_NAD83_CSRS_V6_MTM_ZONE_10 = 'urn:ogc:def:crs:EPSG::22650';

    /**
     * NAD83(CSRS)v6 / MTM zone 11
     * Extent: Canada - Ontario - south of 46°N and west of 81°W.
     */
    public const EPSG_NAD83_CSRS_V6_MTM_ZONE_11 = 'urn:ogc:def:crs:EPSG::22651';

    /**
     * NAD83(CSRS)v6 / MTM zone 12
     * Extent: Canada - Ontario - between 82°30'W and 79°30'W: north of 46°N in area between 82°30'W and 80°15'W,
     * north of 47°N in area between 80°15'W and 79°30'W.
     */
    public const EPSG_NAD83_CSRS_V6_MTM_ZONE_12 = 'urn:ogc:def:crs:EPSG::22652';

    /**
     * NAD83(CSRS)v6 / MTM zone 13
     * Extent: Canada - Ontario - between 85°30'W and 82°30'W and north of 46°N.
     */
    public const EPSG_NAD83_CSRS_V6_MTM_ZONE_13 = 'urn:ogc:def:crs:EPSG::22653';

    /**
     * NAD83(CSRS)v6 / MTM zone 14
     * Extent: Canada - Ontario - between 88°30'W and 85°30'W.
     */
    public const EPSG_NAD83_CSRS_V6_MTM_ZONE_14 = 'urn:ogc:def:crs:EPSG::22654';

    /**
     * NAD83(CSRS)v6 / MTM zone 15
     * Extent: Canada - Ontario - between 91°30'W and 88°30'W.
     */
    public const EPSG_NAD83_CSRS_V6_MTM_ZONE_15 = 'urn:ogc:def:crs:EPSG::22655';

    /**
     * NAD83(CSRS)v6 / MTM zone 16
     * Extent: Canada - Ontario - between 94°30'W and 91°30'W.
     */
    public const EPSG_NAD83_CSRS_V6_MTM_ZONE_16 = 'urn:ogc:def:crs:EPSG::22656';

    /**
     * NAD83(CSRS)v6 / MTM zone 17
     * Extent: Canada - Ontario - west of 94°30'W.
     */
    public const EPSG_NAD83_CSRS_V6_MTM_ZONE_17 = 'urn:ogc:def:crs:EPSG::22657';

    /**
     * NAD83(CSRS)v6 / MTM zone 2
     * Extent: Canada - Newfoundland and Labrador between 57°30'W and 54°30'W.
     */
    public const EPSG_NAD83_CSRS_V6_MTM_ZONE_2 = 'urn:ogc:def:crs:EPSG::22642';

    /**
     * NAD83(CSRS)v6 / MTM zone 3
     * Extent: Canada - Newfoundland west of 57°30'W.
     */
    public const EPSG_NAD83_CSRS_V6_MTM_ZONE_3 = 'urn:ogc:def:crs:EPSG::22643';

    /**
     * NAD83(CSRS)v6 / MTM zone 4
     * Extent: Canada - Labrador between 63°W and 60°W.
     */
    public const EPSG_NAD83_CSRS_V6_MTM_ZONE_4 = 'urn:ogc:def:crs:EPSG::22644';

    /**
     * NAD83(CSRS)v6 / MTM zone 5
     * Extent: Canada - Labrador - 66°W to 63°W.
     */
    public const EPSG_NAD83_CSRS_V6_MTM_ZONE_5 = 'urn:ogc:def:crs:EPSG::22645';

    /**
     * NAD83(CSRS)v6 / MTM zone 6
     * Extent: Canada - Labrador - west of 66°W.
     */
    public const EPSG_NAD83_CSRS_V6_MTM_ZONE_6 = 'urn:ogc:def:crs:EPSG::22646';

    /**
     * NAD83(CSRS)v6 / MTM zone 8
     * Extent: Canada - Ontario - east of 75°W.
     */
    public const EPSG_NAD83_CSRS_V6_MTM_ZONE_8 = 'urn:ogc:def:crs:EPSG::22648';

    /**
     * NAD83(CSRS)v6 / MTM zone 9
     * Extent: Canada - Ontario - between 78°W and 75°W.
     */
    public const EPSG_NAD83_CSRS_V6_MTM_ZONE_9 = 'urn:ogc:def:crs:EPSG::22649';

    /**
     * NAD83(CSRS)v6 / PEI Stereographic
     * Extent: Canada - Prince Edward Island.
     */
    public const EPSG_NAD83_CSRS_V6_PEI_STEREOGRAPHIC = 'urn:ogc:def:crs:EPSG::22639';

    /**
     * NAD83(CSRS)v6 / UTM zone 10N
     * Extent: Canada between 126°W and 120°W,  south of 84°N - British Columbia, Northwest Territories, Yukon
     * Adopted by the Canadian federal government in 2012.
     */
    public const EPSG_NAD83_CSRS_V6_UTM_ZONE_10N = 'urn:ogc:def:crs:EPSG::22610';

    /**
     * NAD83(CSRS)v6 / UTM zone 11N
     * Extent: Canada between 120°W and 114°W - Alberta, British Columbia, Northwest Territories, Nunavut
     * Adopted by the Canadian federal government in 2012.
     */
    public const EPSG_NAD83_CSRS_V6_UTM_ZONE_11N = 'urn:ogc:def:crs:EPSG::22611';

    /**
     * NAD83(CSRS)v6 / UTM zone 12N
     * Extent: Canada between 114°W and 108°W - Alberta, Northwest Territories, Nunavut, Saskatchewan
     * Adopted by the Canadian federal government in 2012.
     */
    public const EPSG_NAD83_CSRS_V6_UTM_ZONE_12N = 'urn:ogc:def:crs:EPSG::22612';

    /**
     * NAD83(CSRS)v6 / UTM zone 13N
     * Extent: Canada between 108°W and 102°W - Northwest Territories, Nunavut, Saskatchewan
     * Adopted by the Canadian federal government in 2012.
     */
    public const EPSG_NAD83_CSRS_V6_UTM_ZONE_13N = 'urn:ogc:def:crs:EPSG::22613';

    /**
     * NAD83(CSRS)v6 / UTM zone 14N
     * Extent: Canada between 102°W and 96°W,  south of 84°N - Manitoba, Nunavut, Saskatchewan
     * Adopted by the Canadian federal government in 2012 and the provincial government of Manitoba in 2014.
     */
    public const EPSG_NAD83_CSRS_V6_UTM_ZONE_14N = 'urn:ogc:def:crs:EPSG::22614';

    /**
     * NAD83(CSRS)v6 / UTM zone 15N
     * Extent: Canada between 96°W and 90°W,  south of 84°N - Manitoba, Nunavut, Ontario
     * Adopted by the Canadian federal government in 2012 and the provincial governments of Manitoba in 2014 and
     * Ontario in 2013.
     */
    public const EPSG_NAD83_CSRS_V6_UTM_ZONE_15N = 'urn:ogc:def:crs:EPSG::22615';

    /**
     * NAD83(CSRS)v6 / UTM zone 16N
     * Extent: Canada between 90°W and 84°W,  south of 84°N - Manitoba, Nunavut, Ontario
     * Adopted by the Canadian federal government in 2012 and the provincial governments of Manitoba in 2014 and
     * Ontario in 2013.
     */
    public const EPSG_NAD83_CSRS_V6_UTM_ZONE_16N = 'urn:ogc:def:crs:EPSG::22616';

    /**
     * NAD83(CSRS)v6 / UTM zone 17N
     * Extent: Canada between 84°W and 78°W,  south of 84°N - Nunavut, Ontario and Quebec
     * Adopted by the Canadian federal government in 2012 and the provincial government of Ontario in 2013.
     */
    public const EPSG_NAD83_CSRS_V6_UTM_ZONE_17N = 'urn:ogc:def:crs:EPSG::22617';

    /**
     * NAD83(CSRS)v6 / UTM zone 18N
     * Extent: Canada between 78°W and 72°W,  south of 84°N - Nunavut, Ontario and Quebec
     * Adopted by the Canadian federal government in 2012 and the provincial government of Ontario in 2013.
     */
    public const EPSG_NAD83_CSRS_V6_UTM_ZONE_18N = 'urn:ogc:def:crs:EPSG::22618';

    /**
     * NAD83(CSRS)v6 / UTM zone 19N
     * Extent: Canada between 72°W and 66°W - New Brunswick, Labrador, Nova Scotia, Nunavut, Quebec
     * Adopted by the Canadian federal government in 2012 and the provincial governments of Nova Scotia in 2014 and
     * Newfoundland in 2012.
     */
    public const EPSG_NAD83_CSRS_V6_UTM_ZONE_19N = 'urn:ogc:def:crs:EPSG::22619';

    /**
     * NAD83(CSRS)v6 / UTM zone 20N
     * Extent: Canada between 66°W and 60°W - New Brunswick, Labrador, Nova Scotia, Nunavut, Prince Edward Island,
     * Quebec
     * Adopted by the Canadian federal government in 2012 and the provincial governments of Prince Edward Island in
     * 2014, Nova Scotia in 2014 and Newfoundland in 2012.
     */
    public const EPSG_NAD83_CSRS_V6_UTM_ZONE_20N = 'urn:ogc:def:crs:EPSG::22620';

    /**
     * NAD83(CSRS)v6 / UTM zone 21N
     * Extent: Canada between 60°W and 54°W - Newfoundland and Labrador; Nunavut; Quebec
     * Adopted by the Canadian federal government in 2012 and the provincial governments of Nova Scotia in 2014 and
     * Newfoundland in 2012.
     */
    public const EPSG_NAD83_CSRS_V6_UTM_ZONE_21N = 'urn:ogc:def:crs:EPSG::22621';

    /**
     * NAD83(CSRS)v6 / UTM zone 22N
     * Extent: Canada between 54°W and 48°W - Newfoundland and Labrador
     * Adopted by the Canadian federal government in 2012 and the provincial government of Newfoundland in 2012.
     */
    public const EPSG_NAD83_CSRS_V6_UTM_ZONE_22N = 'urn:ogc:def:crs:EPSG::22622';

    /**
     * NAD83(CSRS)v6 / UTM zone 7N
     * Extent: Canada west of 138°W,  south of 84°N - British Columbia, Yukon
     * Adopted by the Canadian federal government in 2012.
     */
    public const EPSG_NAD83_CSRS_V6_UTM_ZONE_7N = 'urn:ogc:def:crs:EPSG::22607';

    /**
     * NAD83(CSRS)v6 / UTM zone 8N
     * Extent: Canada between 138°W and 132°W,  south of 84°N - British Columbia, Northwest Territories, Yukon
     * Adopted by the Canadian federal government in 2012.
     */
    public const EPSG_NAD83_CSRS_V6_UTM_ZONE_8N = 'urn:ogc:def:crs:EPSG::22608';

    /**
     * NAD83(CSRS)v6 / UTM zone 9N
     * Extent: Canada - between 132°W and 126°W,  south of 84°N - British Columbia, Northwest Territories, Yukon
     * Adopted by the Canadian federal government in 2012.
     */
    public const EPSG_NAD83_CSRS_V6_UTM_ZONE_9N = 'urn:ogc:def:crs:EPSG::22609';

    /**
     * NAD83(CSRS)v7 / Alberta 3TM ref merid 111 W
     * Extent: Canada - Alberta - east of 112°30'W
     * If used for rural area control markers, area of use is amended to east of 112°W; however use of NAD83(CSRS)v7 /
     * UTM zone 12N (CRS code 22712) is encouraged in these rural areas.
     */
    public const EPSG_NAD83_CSRS_V7_ALBERTA_3TM_REF_MERID_111_W = 'urn:ogc:def:crs:EPSG::22762';

    /**
     * NAD83(CSRS)v7 / Alberta 3TM ref merid 114 W
     * Extent: Canada - Alberta - between 115°30'W and 112°30'W
     * If used for rural area control markers, area of use is amended to between 116°W and 112°W; however use of
     * NAD83(CSRS)v7 / UTM zones 11N and 12N (CRS codes 22711 and 22712) is encouraged in these rural areas.
     */
    public const EPSG_NAD83_CSRS_V7_ALBERTA_3TM_REF_MERID_114_W = 'urn:ogc:def:crs:EPSG::22763';

    /**
     * NAD83(CSRS)v7 / Alberta 3TM ref merid 117 W
     * Extent: Canada - Alberta - between 118°30'W and 115°30' W
     * If used for rural area control markers, area of use is amended to between 118°W and 116°W; however use of
     * NAD83(CSRS)v7 / UTM zone 11N (CRS code 22711) is encouraged in these rural areas.
     */
    public const EPSG_NAD83_CSRS_V7_ALBERTA_3TM_REF_MERID_117_W = 'urn:ogc:def:crs:EPSG::22764';

    /**
     * NAD83(CSRS)v7 / Alberta 3TM ref merid 120 W
     * Extent: Canada - Alberta - west of 118°30' W
     * If used for rural area control markers, area of use is amended to west of 118°W; however use of NAD83(CSRS)v7 /
     * UTM zone 11N (CRS code 22711) is encouraged in these rural areas.
     */
    public const EPSG_NAD83_CSRS_V7_ALBERTA_3TM_REF_MERID_120_W = 'urn:ogc:def:crs:EPSG::22765';

    /**
     * NAD83(CSRS)v7 / PEI Stereographic
     * Extent: Canada - Prince Edward Island.
     */
    public const EPSG_NAD83_CSRS_V7_PEI_STEREOGRAPHIC = 'urn:ogc:def:crs:EPSG::22739';

    /**
     * NAD83(CSRS)v7 / UTM zone 10N
     * Extent: Canada between 126°W and 120°W,  south of 84°N - British Columbia, Northwest Territories, Yukon
     * Adopted by the Canadian federal government in 2017.
     */
    public const EPSG_NAD83_CSRS_V7_UTM_ZONE_10N = 'urn:ogc:def:crs:EPSG::22710';

    /**
     * NAD83(CSRS)v7 / UTM zone 11N
     * Extent: Canada between 120°W and 114°W - Alberta, British Columbia, Northwest Territories, Nunavut
     * Adopted by the Canadian federal government in 2017 and the provincial government of Alberta in 2021.
     */
    public const EPSG_NAD83_CSRS_V7_UTM_ZONE_11N = 'urn:ogc:def:crs:EPSG::22711';

    /**
     * NAD83(CSRS)v7 / UTM zone 12N
     * Extent: Canada between 114°W and 108°W - Alberta, Northwest Territories, Nunavut, Saskatchewan
     * Adopted by the Canadian federal government in 2017 and the provincial government of Alberta in 2021.
     */
    public const EPSG_NAD83_CSRS_V7_UTM_ZONE_12N = 'urn:ogc:def:crs:EPSG::22712';

    /**
     * NAD83(CSRS)v7 / UTM zone 13N
     * Extent: Canada between 108°W and 102°W - Northwest Territories, Nunavut, Saskatchewan
     * Adopted by the Canadian federal government in 2017.
     */
    public const EPSG_NAD83_CSRS_V7_UTM_ZONE_13N = 'urn:ogc:def:crs:EPSG::22713';

    /**
     * NAD83(CSRS)v7 / UTM zone 14N
     * Extent: Canada between 102°W and 96°W,  south of 84°N - Manitoba, Nunavut, Saskatchewan
     * Adopted by the Canadian federal government in 2017.
     */
    public const EPSG_NAD83_CSRS_V7_UTM_ZONE_14N = 'urn:ogc:def:crs:EPSG::22714';

    /**
     * NAD83(CSRS)v7 / UTM zone 15N
     * Extent: Canada between 96°W and 90°W,  south of 84°N - Manitoba, Nunavut, Ontario
     * Adopted by the Canadian federal government in 2017.
     */
    public const EPSG_NAD83_CSRS_V7_UTM_ZONE_15N = 'urn:ogc:def:crs:EPSG::22715';

    /**
     * NAD83(CSRS)v7 / UTM zone 16N
     * Extent: Canada between 90°W and 84°W,  south of 84°N - Manitoba, Nunavut, Ontario
     * Adopted by the Canadian federal government in 2017.
     */
    public const EPSG_NAD83_CSRS_V7_UTM_ZONE_16N = 'urn:ogc:def:crs:EPSG::22716';

    /**
     * NAD83(CSRS)v7 / UTM zone 17N
     * Extent: Canada between 84°W and 78°W,  south of 84°N - Nunavut, Ontario and Quebec
     * Adopted by the Canadian federal government in 2017.
     */
    public const EPSG_NAD83_CSRS_V7_UTM_ZONE_17N = 'urn:ogc:def:crs:EPSG::22717';

    /**
     * NAD83(CSRS)v7 / UTM zone 18N
     * Extent: Canada between 78°W and 72°W,  south of 84°N - Nunavut, Ontario and Quebec
     * Adopted by the Canadian federal government in 2017.
     */
    public const EPSG_NAD83_CSRS_V7_UTM_ZONE_18N = 'urn:ogc:def:crs:EPSG::22718';

    /**
     * NAD83(CSRS)v7 / UTM zone 19N
     * Extent: Canada between 72°W and 66°W - New Brunswick, Labrador, Nova Scotia, Nunavut, Quebec
     * Adopted by the Canadian federal government in 2017.
     */
    public const EPSG_NAD83_CSRS_V7_UTM_ZONE_19N = 'urn:ogc:def:crs:EPSG::22719';

    /**
     * NAD83(CSRS)v7 / UTM zone 20N
     * Extent: Canada between 66°W and 60°W - New Brunswick, Labrador, Nova Scotia, Nunavut, Prince Edward Island,
     * Quebec
     * Adopted by the Canadian federal government in 2017 and the provincial government of Prince Edward Island in
     * 2020.
     */
    public const EPSG_NAD83_CSRS_V7_UTM_ZONE_20N = 'urn:ogc:def:crs:EPSG::22720';

    /**
     * NAD83(CSRS)v7 / UTM zone 21N
     * Extent: Canada between 60°W and 54°W - Newfoundland and Labrador; Nunavut; Quebec
     * Adopted by the Canadian federal government in 2017.
     */
    public const EPSG_NAD83_CSRS_V7_UTM_ZONE_21N = 'urn:ogc:def:crs:EPSG::22721';

    /**
     * NAD83(CSRS)v7 / UTM zone 22N
     * Extent: Canada between 54°W and 48°W - Newfoundland and Labrador
     * Adopted by the Canadian federal government in 2017.
     */
    public const EPSG_NAD83_CSRS_V7_UTM_ZONE_22N = 'urn:ogc:def:crs:EPSG::22722';

    /**
     * NAD83(CSRS)v7 / UTM zone 7N
     * Extent: Canada west of 138°W,  south of 84°N - British Columbia, Yukon
     * Adopted by the Canadian federal government in 2017.
     */
    public const EPSG_NAD83_CSRS_V7_UTM_ZONE_7N = 'urn:ogc:def:crs:EPSG::22707';

    /**
     * NAD83(CSRS)v7 / UTM zone 8N
     * Extent: Canada between 138°W and 132°W,  south of 84°N - British Columbia, Northwest Territories, Yukon
     * Adopted by the Canadian federal government in 2017.
     */
    public const EPSG_NAD83_CSRS_V7_UTM_ZONE_8N = 'urn:ogc:def:crs:EPSG::22708';

    /**
     * NAD83(CSRS)v7 / UTM zone 9N
     * Extent: Canada - between 132°W and 126°W,  south of 84°N - British Columbia, Northwest Territories, Yukon
     * Adopted by the Canadian federal government in 2017.
     */
    public const EPSG_NAD83_CSRS_V7_UTM_ZONE_9N = 'urn:ogc:def:crs:EPSG::22709';

    /**
     * NAD83(CSRS)v8 / UTM zone 10N
     * Extent: Canada between 126°W and 120°W,  south of 84°N - British Columbia, Northwest Territories, Yukon
     * Adopted by the Canadian federal government in 2023.
     */
    public const EPSG_NAD83_CSRS_V8_UTM_ZONE_10N = 'urn:ogc:def:crs:EPSG::22810';

    /**
     * NAD83(CSRS)v8 / UTM zone 11N
     * Extent: Canada between 120°W and 114°W - Alberta, British Columbia, Northwest Territories, Nunavut
     * Adopted by the Canadian federal government in 2023.
     */
    public const EPSG_NAD83_CSRS_V8_UTM_ZONE_11N = 'urn:ogc:def:crs:EPSG::22811';

    /**
     * NAD83(CSRS)v8 / UTM zone 12N
     * Extent: Canada between 114°W and 108°W - Alberta, Northwest Territories, Nunavut, Saskatchewan
     * Adopted by the Canadian federal government in 2023.
     */
    public const EPSG_NAD83_CSRS_V8_UTM_ZONE_12N = 'urn:ogc:def:crs:EPSG::22812';

    /**
     * NAD83(CSRS)v8 / UTM zone 13N
     * Extent: Canada between 108°W and 102°W - Northwest Territories, Nunavut, Saskatchewan
     * Adopted by the Canadian federal government in 2023.
     */
    public const EPSG_NAD83_CSRS_V8_UTM_ZONE_13N = 'urn:ogc:def:crs:EPSG::22813';

    /**
     * NAD83(CSRS)v8 / UTM zone 14N
     * Extent: Canada between 102°W and 96°W,  south of 84°N - Manitoba, Nunavut, Saskatchewan
     * Adopted by the Canadian federal government in 2023.
     */
    public const EPSG_NAD83_CSRS_V8_UTM_ZONE_14N = 'urn:ogc:def:crs:EPSG::22814';

    /**
     * NAD83(CSRS)v8 / UTM zone 15N
     * Extent: Canada between 96°W and 90°W,  south of 84°N - Manitoba, Nunavut, Ontario
     * Adopted by the Canadian federal government in 2023.
     */
    public const EPSG_NAD83_CSRS_V8_UTM_ZONE_15N = 'urn:ogc:def:crs:EPSG::22815';

    /**
     * NAD83(CSRS)v8 / UTM zone 16N
     * Extent: Canada between 90°W and 84°W,  south of 84°N - Manitoba, Nunavut, Ontario
     * Adopted by the Canadian federal government in 2023.
     */
    public const EPSG_NAD83_CSRS_V8_UTM_ZONE_16N = 'urn:ogc:def:crs:EPSG::22816';

    /**
     * NAD83(CSRS)v8 / UTM zone 17N
     * Extent: Canada between 84°W and 78°W,  south of 84°N - Nunavut, Ontario and Quebec
     * Adopted by the Canadian federal government in 2023.
     */
    public const EPSG_NAD83_CSRS_V8_UTM_ZONE_17N = 'urn:ogc:def:crs:EPSG::22817';

    /**
     * NAD83(CSRS)v8 / UTM zone 18N
     * Extent: Canada between 78°W and 72°W,  south of 84°N - Nunavut, Ontario and Quebec
     * Adopted by the Canadian federal government in 2023.
     */
    public const EPSG_NAD83_CSRS_V8_UTM_ZONE_18N = 'urn:ogc:def:crs:EPSG::22818';

    /**
     * NAD83(CSRS)v8 / UTM zone 19N
     * Extent: Canada between 72°W and 66°W - New Brunswick, Labrador, Nova Scotia, Nunavut, Quebec
     * Adopted by the Canadian federal government in 2023.
     */
    public const EPSG_NAD83_CSRS_V8_UTM_ZONE_19N = 'urn:ogc:def:crs:EPSG::22819';

    /**
     * NAD83(CSRS)v8 / UTM zone 20N
     * Extent: Canada between 66°W and 60°W - New Brunswick, Labrador, Nova Scotia, Nunavut, Prince Edward Island,
     * Quebec
     * Adopted by the Canadian federal government in 2023.
     */
    public const EPSG_NAD83_CSRS_V8_UTM_ZONE_20N = 'urn:ogc:def:crs:EPSG::22820';

    /**
     * NAD83(CSRS)v8 / UTM zone 21N
     * Extent: Canada between 60°W and 54°W - Newfoundland and Labrador; Nunavut; Quebec
     * Adopted by the Canadian federal government in 2023.
     */
    public const EPSG_NAD83_CSRS_V8_UTM_ZONE_21N = 'urn:ogc:def:crs:EPSG::22821';

    /**
     * NAD83(CSRS)v8 / UTM zone 22N
     * Extent: Canada between 54°W and 48°W - Newfoundland and Labrador
     * Adopted by the Canadian federal government in 2023.
     */
    public const EPSG_NAD83_CSRS_V8_UTM_ZONE_22N = 'urn:ogc:def:crs:EPSG::22822';

    /**
     * NAD83(CSRS)v8 / UTM zone 7N
     * Extent: Canada west of 138°W,  south of 84°N - British Columbia, Yukon
     * Adopted by the Canadian federal government in 2023.
     */
    public const EPSG_NAD83_CSRS_V8_UTM_ZONE_7N = 'urn:ogc:def:crs:EPSG::22807';

    /**
     * NAD83(CSRS)v8 / UTM zone 8N
     * Extent: Canada between 138°W and 132°W,  south of 84°N - British Columbia, Northwest Territories, Yukon
     * Adopted by the Canadian federal government in 2023.
     */
    public const EPSG_NAD83_CSRS_V8_UTM_ZONE_8N = 'urn:ogc:def:crs:EPSG::22808';

    /**
     * NAD83(CSRS)v8 / UTM zone 9N
     * Extent: Canada - between 132°W and 126°W,  south of 84°N - British Columbia, Northwest Territories, Yukon
     * Adopted by the Canadian federal government in 2023.
     */
    public const EPSG_NAD83_CSRS_V8_UTM_ZONE_9N = 'urn:ogc:def:crs:EPSG::22809';

    /**
     * NAD83(HARN) / Alabama East
     * Extent: USA - Alabama east of approximately 86°37'W - counties Barbour; Bullock; Calhoun; Chambers; Cherokee;
     * Clay; Cleburne; Coffee; Coosa; Covington; Crenshaw; Dale; De Kalb; Elmore; Etowah; Geneva; Henry; Houston;
     * Jackson; Lee; Macon; Madison; Marshall; Montgomery; Pike; Randolph; Russell; St Clair; Talladega; Tallapoosa
     * Replaces NAD83 / SPCS for applications with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_ALABAMA_EAST = 'urn:ogc:def:crs:EPSG::2759';

    /**
     * NAD83(HARN) / Alabama West
     * Extent: USA - Alabama west of approximately 86°37'W - counties Autauga; Baldwin; Bibb; Blount; Butler; Chilton;
     * Choctaw; Clarke; Colbert; Conecuh; Cullman; Dallas; Escambia; Fayette; Franklin; Greene; Hale; Jefferson; Lamar;
     * Lauderdale; Lawrence; Limestone; Lowndes; Marengo; Marion; Mobile; Monroe; Morgan; Perry; Pickens; Shelby;
     * Sumter; Tuscaloosa; Walker; Washington; Wilcox; Winston
     * Replaces NAD83 / SPCS for applications with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_ALABAMA_WEST = 'urn:ogc:def:crs:EPSG::2760';

    /**
     * NAD83(HARN) / Arizona Central
     * Extent: USA - Arizona - counties Coconino; Maricopa; Pima; Pinal; Santa Cruz; Yavapai
     * State law defines system in International feet (note: not US survey feet). See code 2868 for equivalent
     * non-metric definition. Replaces NAD83 / SPCS for applications with an accuracy of better than 1m. Replaced by
     * NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_ARIZONA_CENTRAL = 'urn:ogc:def:crs:EPSG::2762';

    /**
     * NAD83(HARN) / Arizona Central (ft)
     * Extent: USA - Arizona - counties Coconino; Maricopa; Pima; Pinal; Santa Cruz; Yavapai
     * State law defines system in International feet (note: not US survey feet). Federal definition is metric - see
     * code 2762. Replaces NAD83 / SPCS for applications with an accuracy of better than 3ft. Replaced by
     * NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_ARIZONA_CENTRAL_FT = 'urn:ogc:def:crs:EPSG::2868';

    /**
     * NAD83(HARN) / Arizona East
     * Extent: USA - Arizona - counties Apache; Cochise; Gila; Graham; Greenlee; Navajo
     * State law defines system in International feet (note: not US survey feet). See code 2867 for equivalent
     * non-metric definition. Replaces NAD83 / SPCS for applications with an accuracy of better than 1m. Replaced by
     * NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_ARIZONA_EAST = 'urn:ogc:def:crs:EPSG::2761';

    /**
     * NAD83(HARN) / Arizona East (ft)
     * Extent: USA - Arizona - counties Apache; Cochise; Gila; Graham; Greenlee; Navajo
     * State law defines system in International feet (note: not US survey feet). Federal definition is metric - see
     * code 2761. Replaces NAD83 / SPCS for applications with an accuracy of better than 3ft. Replaced by
     * NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_ARIZONA_EAST_FT = 'urn:ogc:def:crs:EPSG::2867';

    /**
     * NAD83(HARN) / Arizona West
     * Extent: USA - Arizona - counties of La Paz; Mohave; Yuma
     * State law defines system in International feet (note: not US survey feet). See code 2869 for equivalent
     * non-metric definition. Replaces NAD83 / SPCS for applications with an accuracy of better than 1m. Replaced by
     * NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_ARIZONA_WEST = 'urn:ogc:def:crs:EPSG::2763';

    /**
     * NAD83(HARN) / Arizona West (ft)
     * Extent: USA - Arizona - counties of La Paz; Mohave; Yuma
     * State law defines system in International feet (note: not US survey feet). Federal definition is metric - see
     * code 2763. Replaces NAD83 / SPCS for applications with an accuracy of better than 3ft. Replaced by
     * NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_ARIZONA_WEST_FT = 'urn:ogc:def:crs:EPSG::2869';

    /**
     * NAD83(HARN) / Arkansas North
     * Extent: USA - Arkansas - counties of Baxter; Benton; Boone; Carroll; Clay; Cleburne; Conway; Craighead;
     * Crawford; Crittenden; Cross; Faulkner; Franklin; Fulton; Greene; Independence; Izard; Jackson; Johnson;
     * Lawrence; Logan; Madison; Marion; Mississippi; Newton; Perry; Poinsett; Pope; Randolph; Scott; Searcy;
     * Sebastian; Sharp; St Francis; Stone; Van Buren; Washington; White; Woodruff; Yell
     * State law defines system in US survey feet. See code 3441 for equivalent non-metric definition. Replaces NAD83 /
     * SPCS for applications with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_ARKANSAS_NORTH = 'urn:ogc:def:crs:EPSG::2764';

    /**
     * NAD83(HARN) / Arkansas North (ftUS)
     * Extent: USA - Arkansas - counties of Baxter; Benton; Boone; Carroll; Clay; Cleburne; Conway; Craighead;
     * Crawford; Crittenden; Cross; Faulkner; Franklin; Fulton; Greene; Independence; Izard; Jackson; Johnson;
     * Lawrence; Logan; Madison; Marion; Mississippi; Newton; Perry; Poinsett; Pope; Randolph; Scott; Searcy;
     * Sebastian; Sharp; St Francis; Stone; Van Buren; Washington; White; Woodruff; Yell
     * State law defines system in US survey feet. Federal definition is metric - see code 2764. Replaces NAD83 / SPCS
     * for applications with an accuracy of better than 3 feet. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_ARKANSAS_NORTH_FTUS = 'urn:ogc:def:crs:EPSG::3441';

    /**
     * NAD83(HARN) / Arkansas South
     * Extent: USA - Arkansas - counties Arkansas; Ashley; Bradley; Calhoun; Chicot; Clark; Cleveland; Columbia;
     * Dallas; Desha; Drew; Garland; Grant; Hempstead; Hot Spring; Howard; Jefferson; Lafayette; Lee; Lincoln; Little
     * River; Lonoke; Miller; Monroe; Montgomery; Nevada; Ouachita; Phillips; Pike; Polk; Prairie; Pulaski; Saline;
     * Sevier; Union
     * State law defines system in US survey feet. See code 3442 for equivalent non-metric definition. Replaces NAD83 /
     * SPCS for applications with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_ARKANSAS_SOUTH = 'urn:ogc:def:crs:EPSG::2765';

    /**
     * NAD83(HARN) / Arkansas South (ftUS)
     * Extent: USA - Arkansas - counties Arkansas; Ashley; Bradley; Calhoun; Chicot; Clark; Cleveland; Columbia;
     * Dallas; Desha; Drew; Garland; Grant; Hempstead; Hot Spring; Howard; Jefferson; Lafayette; Lee; Lincoln; Little
     * River; Lonoke; Miller; Monroe; Montgomery; Nevada; Ouachita; Phillips; Pike; Polk; Prairie; Pulaski; Saline;
     * Sevier; Union
     * State law defines system in US survey feet. Federal definition is metric - see code 2765. Replaces NAD83 / SPCS
     * for applications with an accuracy of better than 3 feet. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_ARKANSAS_SOUTH_FTUS = 'urn:ogc:def:crs:EPSG::3442';

    /**
     * NAD83(HARN) / California Albers
     * Extent: USA - California
     * Replaces NAD83 / California Albers for applications with an accuracy of better than 1m. Replaced by
     * NAD83(NSRS2007) / California Albers.
     */
    public const EPSG_NAD83_HARN_CALIFORNIA_ALBERS = 'urn:ogc:def:crs:EPSG::3311';

    /**
     * NAD83(HARN) / California zone 1
     * Extent: USA - California - counties Del Norte; Humboldt; Lassen; Modoc; Plumas; Shasta; Siskiyou; Tehama;
     * Trinity
     * State law defines system in US survey feet. See code 2870 for equivalent non-metric definition. Replaces NAD83 /
     * SPCS for applications with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_CALIFORNIA_ZONE_1 = 'urn:ogc:def:crs:EPSG::2766';

    /**
     * NAD83(HARN) / California zone 1 (ftUS)
     * Extent: USA - California - counties Del Norte; Humboldt; Lassen; Modoc; Plumas; Shasta; Siskiyou; Tehama;
     * Trinity
     * State law defines system in US survey feet. Federal definition is metric - see code 2766. Replaces NAD83 / SPCS
     * for applications with an accuracy of better than 3 feet. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_CALIFORNIA_ZONE_1_FTUS = 'urn:ogc:def:crs:EPSG::2870';

    /**
     * NAD83(HARN) / California zone 2
     * Extent: USA - California - counties of Alpine; Amador; Butte; Colusa; El Dorado; Glenn; Lake; Mendocino; Napa;
     * Nevada; Placer; Sacramento; Sierra; Solano; Sonoma; Sutter; Yolo; Yuba
     * State law defines system in US survey feet. See code 2871 for equivalent non-metric definition. Replaces NAD83 /
     * SPCS for applications with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_CALIFORNIA_ZONE_2 = 'urn:ogc:def:crs:EPSG::2767';

    /**
     * NAD83(HARN) / California zone 2 (ftUS)
     * Extent: USA - California - counties of Alpine; Amador; Butte; Colusa; El Dorado; Glenn; Lake; Mendocino; Napa;
     * Nevada; Placer; Sacramento; Sierra; Solano; Sonoma; Sutter; Yolo; Yuba
     * State law defines system in US survey feet. Federal definition is metric - see code 2767. Replaces NAD83 / SPCS
     * for applications with an accuracy of better than 3 feet. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_CALIFORNIA_ZONE_2_FTUS = 'urn:ogc:def:crs:EPSG::2871';

    /**
     * NAD83(HARN) / California zone 3
     * Extent: USA - California - counties Alameda; Calaveras; Contra Costa; Madera; Marin; Mariposa; Merced; Mono; San
     * Francisco; San Joaquin; San Mateo; Santa Clara; Santa Cruz; Stanislaus; Tuolumne
     * State law defines system in US survey feet. See code 2872 for equivalent non-metric definition. Replaces NAD83 /
     * SPCS for applications with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_CALIFORNIA_ZONE_3 = 'urn:ogc:def:crs:EPSG::2768';

    /**
     * NAD83(HARN) / California zone 3 (ftUS)
     * Extent: USA - California - counties Alameda; Calaveras; Contra Costa; Madera; Marin; Mariposa; Merced; Mono; San
     * Francisco; San Joaquin; San Mateo; Santa Clara; Santa Cruz; Stanislaus; Tuolumne
     * State law defines system in US survey feet. Federal definition is metric - see code 2768. Replaces NAD83 / SPCS
     * for applications with an accuracy of better than 3 feet. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_CALIFORNIA_ZONE_3_FTUS = 'urn:ogc:def:crs:EPSG::2872';

    /**
     * NAD83(HARN) / California zone 4
     * Extent: USA - California - counties Fresno; Inyo; Kings; Monterey; San Benito; Tulare
     * State law defines system in US survey feet. See code 2873 for equivalent non-metric definition. Replaces NAD83 /
     * SPCS for applications with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_CALIFORNIA_ZONE_4 = 'urn:ogc:def:crs:EPSG::2769';

    /**
     * NAD83(HARN) / California zone 4 (ftUS)
     * Extent: USA - California - counties Fresno; Inyo; Kings; Monterey; San Benito; Tulare
     * State law defines system in US survey feet. Federal definition is metric - see code 2769. Replaces NAD83 / SPCS
     * for applications with an accuracy of better than 3 feet. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_CALIFORNIA_ZONE_4_FTUS = 'urn:ogc:def:crs:EPSG::2873';

    /**
     * NAD83(HARN) / California zone 5
     * Extent: USA - California - counties Kern; Los Angeles; San Bernardino; San Luis Obispo; Santa Barbara; Ventura
     * State law defines system in US survey feet. See code 2874 for equivalent non-metric definition. Replaces NAD83 /
     * SPCS for applications with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_CALIFORNIA_ZONE_5 = 'urn:ogc:def:crs:EPSG::2770';

    /**
     * NAD83(HARN) / California zone 5 (ftUS)
     * Extent: USA - California - counties Kern; Los Angeles; San Bernardino; San Luis Obispo; Santa Barbara; Ventura
     * State law defines system in US survey feet. Federal definition is metric - see code 2770. Replaces NAD83 / SPCS
     * for applications with an accuracy of better than 3 feet. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_CALIFORNIA_ZONE_5_FTUS = 'urn:ogc:def:crs:EPSG::2874';

    /**
     * NAD83(HARN) / California zone 6
     * Extent: USA - California - counties Imperial; Orange; Riverside; San Diego
     * State law defines system in US survey feet. See code 2875 for equivalent non-metric definition. Replaces NAD83 /
     * SPCS for applications with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_CALIFORNIA_ZONE_6 = 'urn:ogc:def:crs:EPSG::2771';

    /**
     * NAD83(HARN) / California zone 6 (ftUS)
     * Extent: USA - California - counties Imperial; Orange; Riverside; San Diego
     * State law defines system in US survey feet. Federal definition is metric - see code 2771. Replaces NAD83 / SPCS
     * for applications with an accuracy of better than 3 feet. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_CALIFORNIA_ZONE_6_FTUS = 'urn:ogc:def:crs:EPSG::2875';

    /**
     * NAD83(HARN) / Colorado Central
     * Extent: USA - Colorado - counties Arapahoe; Chaffee; Cheyenne; Clear Creek; Delta; Denver; Douglas; Eagle; El
     * Paso; Elbert; Fremont; Garfield; Gunnison; Jefferson; Kit Carson; Lake; Lincoln; Mesa; Park; Pitkin; Summit;
     * Teller
     * State law defines system in US survey feet. See code 2877 for equivalent non-metric definition. Replaces NAD83 /
     * SPCS for applications with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_COLORADO_CENTRAL = 'urn:ogc:def:crs:EPSG::2773';

    /**
     * NAD83(HARN) / Colorado Central (ftUS)
     * Extent: USA - Colorado - counties Arapahoe; Chaffee; Cheyenne; Clear Creek; Delta; Denver; Douglas; Eagle; El
     * Paso; Elbert; Fremont; Garfield; Gunnison; Jefferson; Kit Carson; Lake; Lincoln; Mesa; Park; Pitkin; Summit;
     * Teller
     * State law defines system in US survey feet. Federal definition is metric - see code 2773. Replaces NAD83 / SPCS
     * for applications with an accuracy of better than 3 feet. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_COLORADO_CENTRAL_FTUS = 'urn:ogc:def:crs:EPSG::2877';

    /**
     * NAD83(HARN) / Colorado North
     * Extent: USA - Colorado - counties Adams; Boulder; Gilpin; Grand; Jackson; Larimer; Logan; Moffat; Morgan;
     * Phillips; Rio Blanco; Routt; Sedgwick; Washington; Weld; Yuma
     * State law defines system in US survey feet. See code 2876 for equivalent non-metric definition. Replaces NAD83 /
     * SPCS for applications with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_COLORADO_NORTH = 'urn:ogc:def:crs:EPSG::2772';

    /**
     * NAD83(HARN) / Colorado North (ftUS)
     * Extent: USA - Colorado - counties Adams; Boulder; Gilpin; Grand; Jackson; Larimer; Logan; Moffat; Morgan;
     * Phillips; Rio Blanco; Routt; Sedgwick; Washington; Weld; Yuma
     * State law defines system in US survey feet. Federal definition is metric - see code 2772. Replaces NAD83 / SPCS
     * for applications with an accuracy of better than 3 feet. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_COLORADO_NORTH_FTUS = 'urn:ogc:def:crs:EPSG::2876';

    /**
     * NAD83(HARN) / Colorado South
     * Extent: USA - Colorado - counties Alamosa; Archuleta; Baca; Bent; Conejos; Costilla; Crowley; Custer; Dolores;
     * Hinsdale; Huerfano; Kiowa; La Plata; Las Animas; Mineral; Montezuma; Montrose; Otero; Ouray; Prowers; Pueblo;
     * Rio Grande; Saguache; San Juan; San Miguel
     * State law defines system in US survey feet. See code 2878 for equivalent non-metric definition. Replaces NAD83 /
     * SPCS for applications with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_COLORADO_SOUTH = 'urn:ogc:def:crs:EPSG::2774';

    /**
     * NAD83(HARN) / Colorado South (ftUS)
     * Extent: USA - Colorado - counties Alamosa; Archuleta; Baca; Bent; Conejos; Costilla; Crowley; Custer; Dolores;
     * Hinsdale; Huerfano; Kiowa; La Plata; Las Animas; Mineral; Montezuma; Montrose; Otero; Ouray; Prowers; Pueblo;
     * Rio Grande; Saguache; San Juan; San Miguel
     * State law defines system in US survey feet. Federal definition is metric - see code 2774. Replaces NAD83 / SPCS
     * for applications with an accuracy of better than 3 feet. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_COLORADO_SOUTH_FTUS = 'urn:ogc:def:crs:EPSG::2878';

    /**
     * NAD83(HARN) / Connecticut
     * Extent: USA - Connecticut - counties of Fairfield; Hartford; Litchfield; Middlesex; New Haven; New London;
     * Tolland; Windham
     * State law defines system in US survey feet. See code 2879 for equivalent non-metric definition. Replaces NAD83 /
     * SPCS for applications with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_CONNECTICUT = 'urn:ogc:def:crs:EPSG::2775';

    /**
     * NAD83(HARN) / Connecticut (ftUS)
     * Extent: USA - Connecticut - counties of Fairfield; Hartford; Litchfield; Middlesex; New Haven; New London;
     * Tolland; Windham
     * State law defines system in US survey feet. Federal definition is metric - see code 2775. Replaces NAD83 / SPCS
     * for applications with an accuracy of better than 3 feet. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_CONNECTICUT_FTUS = 'urn:ogc:def:crs:EPSG::2879';

    /**
     * NAD83(HARN) / Conus Albers
     * Extent: USA - CONUS onshore - Alabama; Arizona; Arkansas; California; Colorado; Connecticut; Delaware; Florida;
     * Georgia; Idaho; Illinois; Indiana; Iowa; Kansas; Kentucky; Louisiana; Maine; Maryland; Massachusetts; Michigan;
     * Minnesota; Mississippi; Missouri; Montana; Nebraska; Nevada; New Hampshire; New Jersey; New Mexico; New York;
     * North Carolina; North Dakota; Ohio; Oklahoma; Oregon; Pennsylvania; Rhode Island; South Carolina; South Dakota;
     * Tennessee; Texas; Utah; Vermont; Virginia; Washington; West Virginia; Wisconsin; Wyoming
     * Replaces NAD83 / Conus Albers (CRS code 5070) for applications with an accuracy of better than 1m. Replaced by
     * NAD83(NSRS2007) / Conus Albers (CRS code 5072).
     */
    public const EPSG_NAD83_HARN_CONUS_ALBERS = 'urn:ogc:def:crs:EPSG::5071';

    /**
     * NAD83(HARN) / Delaware
     * Extent: USA - Delaware - counties of Kent; New Castle; Sussex
     * State law defines system in US survey feet. See code 2880 for equivalent non-metric definition. Replaces NAD83 /
     * SPCS for applications with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_DELAWARE = 'urn:ogc:def:crs:EPSG::2776';

    /**
     * NAD83(HARN) / Delaware (ftUS)
     * Extent: USA - Delaware - counties of Kent; New Castle; Sussex
     * State law defines system in US survey feet. Federal definition is metric - see code 2776. Replaces NAD83 / SPCS
     * for applications with an accuracy of better than 3 feet. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_DELAWARE_FTUS = 'urn:ogc:def:crs:EPSG::2880';

    /**
     * NAD83(HARN) / Florida East
     * Extent: USA - Florida - counties of Brevard; Broward; Clay; Collier; Dade; Duval; Flagler; Glades; Hendry;
     * Highlands; Indian River; Lake; Martin; Monroe; Nassau; Okeechobee; Orange; Osceola; Palm Beach; Putnam;
     * Seminole; St Johns; St Lucie; Volusia
     * State law defines system in US survey feet. See code 2881 for equivalent non-metric definition. Replaces NAD83 /
     * SPCS for applications with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_FLORIDA_EAST = 'urn:ogc:def:crs:EPSG::2777';

    /**
     * NAD83(HARN) / Florida East (ftUS)
     * Extent: USA - Florida - counties of Brevard; Broward; Clay; Collier; Dade; Duval; Flagler; Glades; Hendry;
     * Highlands; Indian River; Lake; Martin; Monroe; Nassau; Okeechobee; Orange; Osceola; Palm Beach; Putnam;
     * Seminole; St Johns; St Lucie; Volusia
     * State law defines system in US survey feet. Federal definition is metric - see code 2777. Replaces NAD83 / SPCS
     * for applications with an accuracy of better than 3 feet. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_FLORIDA_EAST_FTUS = 'urn:ogc:def:crs:EPSG::2881';

    /**
     * NAD83(HARN) / Florida GDL Albers
     * Extent: USA - Florida
     * Replaces NAD83 / Florida GDL Albers for applications with an accuracy of better than 1m. Replaced by
     * NAD83(NSRS2007) / Florida GDL Albers.
     */
    public const EPSG_NAD83_HARN_FLORIDA_GDL_ALBERS = 'urn:ogc:def:crs:EPSG::3087';

    /**
     * NAD83(HARN) / Florida North
     * Extent: USA - Florida - counties of Alachua; Baker; Bay; Bradford; Calhoun; Columbia; Dixie; Escambia; Franklin;
     * Gadsden; Gilchrist; Gulf; Hamilton; Holmes; Jackson; Jefferson; Lafayette; Leon; Liberty; Madison; Okaloosa;
     * Santa Rosa; Suwannee; Taylor; Union; Wakulla; Walton; Washington
     * State law defines system in US survey feet. See code 2883 for equivalent non-metric definition. Replaces NAD83 /
     * SPCS for applications with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_FLORIDA_NORTH = 'urn:ogc:def:crs:EPSG::2779';

    /**
     * NAD83(HARN) / Florida North (ftUS)
     * Extent: USA - Florida - counties of Alachua; Baker; Bay; Bradford; Calhoun; Columbia; Dixie; Escambia; Franklin;
     * Gadsden; Gilchrist; Gulf; Hamilton; Holmes; Jackson; Jefferson; Lafayette; Leon; Liberty; Madison; Okaloosa;
     * Santa Rosa; Suwannee; Taylor; Union; Wakulla; Walton; Washington
     * State law defines system in US survey feet. Federal definition is metric - see code 2779. Replaces NAD83 / SPCS
     * for applications with an accuracy of better than 3 feet. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_FLORIDA_NORTH_FTUS = 'urn:ogc:def:crs:EPSG::2883';

    /**
     * NAD83(HARN) / Florida West
     * Extent: USA - Florida - counties of Charlotte; Citrus; De Soto; Hardee; Hernando; Hillsborough; Lee; Levy;
     * Manatee; Marion; Pasco; Pinellas; Polk; Sarasota; Sumter
     * State law defines system in US survey feet. See code 2882 for equivalent non-metric definition. Replaces NAD83 /
     * SPCS for applications with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_FLORIDA_WEST = 'urn:ogc:def:crs:EPSG::2778';

    /**
     * NAD83(HARN) / Florida West (ftUS)
     * Extent: USA - Florida - counties of Charlotte; Citrus; De Soto; Hardee; Hernando; Hillsborough; Lee; Levy;
     * Manatee; Marion; Pasco; Pinellas; Polk; Sarasota; Sumter
     * State law defines system in US survey feet. Federal definition is metric - see code 2778. Replaces NAD83 / SPCS
     * for applications with an accuracy of better than 3 feet. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_FLORIDA_WEST_FTUS = 'urn:ogc:def:crs:EPSG::2882';

    /**
     * NAD83(HARN) / Georgia East
     * Extent: USA - Georgia - counties of Appling; Atkinson; Bacon; Baldwin; Brantley; Bryan; Bulloch; Burke; Camden;
     * Candler; Charlton; Chatham; Clinch; Coffee; Columbia; Dodge; Echols; Effingham; Elbert; Emanuel; Evans;
     * Franklin; Glascock; Glynn; Greene; Hancock; Hart; Jeff Davis; Jefferson; Jenkins; Johnson; Lanier; Laurens;
     * Liberty; Lincoln; Long; Madison; McDuffie; McIntosh; Montgomery; Oglethorpe; Pierce; Richmond; Screven;
     * Stephens; Taliaferro; Tattnall; Telfair; Toombs; Treutlen; Ware; Warren; Washington; Wayne; Wheeler; Wilkes;
     * Wilkinson
     * State law defines system in US survey feet. See code 2884 for equivalent non-metric definition. Replaces NAD83 /
     * SPCS for applications with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_GEORGIA_EAST = 'urn:ogc:def:crs:EPSG::2780';

    /**
     * NAD83(HARN) / Georgia East (ftUS)
     * Extent: USA - Georgia - counties of Appling; Atkinson; Bacon; Baldwin; Brantley; Bryan; Bulloch; Burke; Camden;
     * Candler; Charlton; Chatham; Clinch; Coffee; Columbia; Dodge; Echols; Effingham; Elbert; Emanuel; Evans;
     * Franklin; Glascock; Glynn; Greene; Hancock; Hart; Jeff Davis; Jefferson; Jenkins; Johnson; Lanier; Laurens;
     * Liberty; Lincoln; Long; Madison; McDuffie; McIntosh; Montgomery; Oglethorpe; Pierce; Richmond; Screven;
     * Stephens; Taliaferro; Tattnall; Telfair; Toombs; Treutlen; Ware; Warren; Washington; Wayne; Wheeler; Wilkes;
     * Wilkinson
     * State law defines system in US survey feet. Federal definition is metric - see code 2780. Replaces NAD83 / SPCS
     * for applications with an accuracy of better than 3 feet. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_GEORGIA_EAST_FTUS = 'urn:ogc:def:crs:EPSG::2884';

    /**
     * NAD83(HARN) / Georgia West
     * Extent: USA - Georgia - counties of Baker; Banks; Barrow; Bartow; Ben Hill; Berrien; Bibb; Bleckley; Brooks;
     * Butts; Calhoun; Carroll; Catoosa; Chattahoochee; Chattooga; Cherokee; Clarke; Clay; Clayton; Cobb; Colquitt;
     * Cook; Coweta; Crawford; Crisp; Dade; Dawson; De Kalb; Decatur; Dooly; Dougherty; Douglas; Early; Fannin;
     * Fayette; Floyd; Forsyth; Fulton; Gilmer; Gordon; Grady; Gwinnett; Habersham; Hall; Haralson; Harris; Heard;
     * Henry; Houston; Irwin; Jackson; Jasper; Jones; Lamar; Lee; Lowndes; Lumpkin; Macon; Marion; Meriwether; Miller;
     * Mitchell; Monroe; Morgan; Murray; Muscogee; Newton; Oconee; Paulding; Peach; Pickens; Pike; Polk; Pulaski;
     * Putnam; Quitman; Rabun; Randolph; Rockdale; Schley; Seminole; Spalding; Stewart; Sumter; Talbot; Taylor;
     * Terrell; Thomas; Tift; Towns; Troup; Turner; Twiggs; Union; Upson; Walker; Walton; Webster; White; Whitfield;
     * Wilcox; Worth
     * State law defines system in US survey feet. See code 2885 for equivalent non-metric definition. Replaces NAD83 /
     * SPCS for applications with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_GEORGIA_WEST = 'urn:ogc:def:crs:EPSG::2781';

    /**
     * NAD83(HARN) / Georgia West (ftUS)
     * Extent: USA - Georgia - counties of Baker; Banks; Barrow; Bartow; Ben Hill; Berrien; Bibb; Bleckley; Brooks;
     * Butts; Calhoun; Carroll; Catoosa; Chattahoochee; Chattooga; Cherokee; Clarke; Clay; Clayton; Cobb; Colquitt;
     * Cook; Coweta; Crawford; Crisp; Dade; Dawson; De Kalb; Decatur; Dooly; Dougherty; Douglas; Early; Fannin;
     * Fayette; Floyd; Forsyth; Fulton; Gilmer; Gordon; Grady; Gwinnett; Habersham; Hall; Haralson; Harris; Heard;
     * Henry; Houston; Irwin; Jackson; Jasper; Jones; Lamar; Lee; Lowndes; Lumpkin; Macon; Marion; Meriwether; Miller;
     * Mitchell; Monroe; Morgan; Murray; Muscogee; Newton; Oconee; Paulding; Peach; Pickens; Pike; Polk; Pulaski;
     * Putnam; Quitman; Rabun; Randolph; Rockdale; Schley; Seminole; Spalding; Stewart; Sumter; Talbot; Taylor;
     * Terrell; Thomas; Tift; Towns; Troup; Turner; Twiggs; Union; Upson; Walker; Walton; Webster; White; Whitfield;
     * Wilcox; Worth
     * State law defines system in US survey feet. Federal definition is metric - see code 2781. Replaces NAD83 / SPCS
     * for applications with an accuracy of better than 3 feet. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_GEORGIA_WEST_FTUS = 'urn:ogc:def:crs:EPSG::2885';

    /**
     * NAD83(HARN) / Guam Map Grid
     * Extent: Guam - onshore
     * Replaces Guam 1963 / SPCS (CRS code 3993) from 1995. Guam Public Law 23-31 uses the name "NAD83" for
     * NAD83(HARN). NAD83 is a system realized only in North America and different to NAD83(HARN).
     */
    public const EPSG_NAD83_HARN_GUAM_MAP_GRID = 'urn:ogc:def:crs:EPSG::4414';

    /**
     * NAD83(HARN) / Hawaii zone 1
     * Extent: USA - Hawaii - island of Hawaii - onshore
     * Replaces NAD83 / SPCS for applications with an accuracy of better than 1m.
     */
    public const EPSG_NAD83_HARN_HAWAII_ZONE_1 = 'urn:ogc:def:crs:EPSG::2782';

    /**
     * NAD83(HARN) / Hawaii zone 2
     * Extent: USA - Hawaii - Maui; Kahoolawe; Lanai; Molokai - onshore
     * Replaces NAD83 / SPCS for applications with an accuracy of better than 1m.
     */
    public const EPSG_NAD83_HARN_HAWAII_ZONE_2 = 'urn:ogc:def:crs:EPSG::2783';

    /**
     * NAD83(HARN) / Hawaii zone 3
     * Extent: USA - Hawaii - Oahu - onshore
     * Replaces NAD83 / SPCS for applications with an accuracy of better than 1m.
     */
    public const EPSG_NAD83_HARN_HAWAII_ZONE_3 = 'urn:ogc:def:crs:EPSG::2784';

    /**
     * NAD83(HARN) / Hawaii zone 3 (ftUS)
     * Extent: USA - Hawaii - Oahu - onshore
     * State has no law defining grid unit; system therefore not recognised by Federal authorities. Replaces NAD83 /
     * SPCS for applications with an accuracy of better than 3ft.
     */
    public const EPSG_NAD83_HARN_HAWAII_ZONE_3_FTUS = 'urn:ogc:def:crs:EPSG::3760';

    /**
     * NAD83(HARN) / Hawaii zone 4
     * Extent: USA - Hawaii - Kauai - onshore
     * Replaces NAD83 / SPCS for applications with an accuracy of better than 1m.
     */
    public const EPSG_NAD83_HARN_HAWAII_ZONE_4 = 'urn:ogc:def:crs:EPSG::2785';

    /**
     * NAD83(HARN) / Hawaii zone 5
     * Extent: USA - Hawaii - Niihau - onshore
     * Replaces NAD83 / SPCS for applications with an accuracy of better than 1m.
     */
    public const EPSG_NAD83_HARN_HAWAII_ZONE_5 = 'urn:ogc:def:crs:EPSG::2786';

    /**
     * NAD83(HARN) / Idaho Central
     * Extent: USA - Idaho - counties of Blaine; Butte; Camas; Cassia; Custer; Gooding; Jerome; Lemhi; Lincoln;
     * Minidoka; Twin Falls
     * State law defines system in US survey feet. See code 2887 for equivalent non-metric definition. Replaces NAD83 /
     * SPCS for applications with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_IDAHO_CENTRAL = 'urn:ogc:def:crs:EPSG::2788';

    /**
     * NAD83(HARN) / Idaho Central (ftUS)
     * Extent: USA - Idaho - counties of Blaine; Butte; Camas; Cassia; Custer; Gooding; Jerome; Lemhi; Lincoln;
     * Minidoka; Twin Falls
     * State law defines system in US survey feet. Federal definition is metric - see code 2788. Replaces NAD83 / SPCS
     * for applications with an accuracy of better than 3 feet. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_IDAHO_CENTRAL_FTUS = 'urn:ogc:def:crs:EPSG::2887';

    /**
     * NAD83(HARN) / Idaho East
     * Extent: USA - Idaho - counties of Bannock; Bear Lake; Bingham; Bonneville; Caribou; Clark; Franklin; Fremont;
     * Jefferson; Madison; Oneida; Power; Teton
     * State law defines system in US survey feet. See code 2886 for equivalent non-metric definition. Replaces NAD83 /
     * SPCS for applications with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_IDAHO_EAST = 'urn:ogc:def:crs:EPSG::2787';

    /**
     * NAD83(HARN) / Idaho East (ftUS)
     * Extent: USA - Idaho - counties of Bannock; Bear Lake; Bingham; Bonneville; Caribou; Clark; Franklin; Fremont;
     * Jefferson; Madison; Oneida; Power; Teton
     * State law defines system in US survey feet. Federal definition is metric - see code 2787. Replaces NAD83 / SPCS
     * for applications with an accuracy of better than 3 feet. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_IDAHO_EAST_FTUS = 'urn:ogc:def:crs:EPSG::2886';

    /**
     * NAD83(HARN) / Idaho West
     * Extent: USA - Idaho - counties of Ada; Adams; Benewah; Boise; Bonner; Boundary; Canyon; Clearwater; Elmore; Gem;
     * Idaho; Kootenai; Latah; Lewis; Nez Perce; Owyhee; Payette; Shoshone; Valley; Washington
     * State law defines system in US survey feet. See code 2888 for equivalent non-metric definition. Replaces NAD83 /
     * SPCS for applications with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_IDAHO_WEST = 'urn:ogc:def:crs:EPSG::2789';

    /**
     * NAD83(HARN) / Idaho West (ftUS)
     * Extent: USA - Idaho - counties of Ada; Adams; Benewah; Boise; Bonner; Boundary; Canyon; Clearwater; Elmore; Gem;
     * Idaho; Kootenai; Latah; Lewis; Nez Perce; Owyhee; Payette; Shoshone; Valley; Washington
     * State law defines system in US survey feet. Federal definition is metric - see code 2789. Replaces NAD83 / SPCS
     * for applications with an accuracy of better than 3 feet. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_IDAHO_WEST_FTUS = 'urn:ogc:def:crs:EPSG::2888';

    /**
     * NAD83(HARN) / Illinois East
     * Extent: USA - Illinois - counties of Boone; Champaign; Clark; Clay; Coles; Cook; Crawford; Cumberland; De Kalb;
     * De Witt; Douglas; Du Page; Edgar; Edwards; Effingham; Fayette; Ford; Franklin; Gallatin; Grundy; Hamilton;
     * Hardin; Iroquois; Jasper; Jefferson; Johnson; Kane; Kankakee; Kendall; La Salle; Lake; Lawrence; Livingston;
     * Macon; Marion; Massac; McHenry; McLean; Moultrie; Piatt; Pope; Richland; Saline; Shelby; Vermilion; Wabash;
     * Wayne; White; Will; Williamson
     * State law defines system in US survey feet. See code 3443 for equivalent non-metric definition. Replaces NAD83 /
     * SPCS for applications with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_ILLINOIS_EAST = 'urn:ogc:def:crs:EPSG::2790';

    /**
     * NAD83(HARN) / Illinois East (ftUS)
     * Extent: USA - Illinois - counties of Boone; Champaign; Clark; Clay; Coles; Cook; Crawford; Cumberland; De Kalb;
     * De Witt; Douglas; Du Page; Edgar; Edwards; Effingham; Fayette; Ford; Franklin; Gallatin; Grundy; Hamilton;
     * Hardin; Iroquois; Jasper; Jefferson; Johnson; Kane; Kankakee; Kendall; La Salle; Lake; Lawrence; Livingston;
     * Macon; Marion; Massac; McHenry; McLean; Moultrie; Piatt; Pope; Richland; Saline; Shelby; Vermilion; Wabash;
     * Wayne; White; Will; Williamson
     * State law defines system in US survey feet. Federal definition is metric - see code 2790. Replaces NAD83 / SPCS
     * for applications with an accuracy of better than 3 feet. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_ILLINOIS_EAST_FTUS = 'urn:ogc:def:crs:EPSG::3443';

    /**
     * NAD83(HARN) / Illinois West
     * Extent: USA - Illinois - counties of Adams; Alexander; Bond; Brown; Bureau; Calhoun; Carroll; Cass; Christian;
     * Clinton; Fulton; Greene; Hancock; Henderson; Henry; Jackson; Jersey; Jo Daviess; Knox; Lee; Logan; Macoupin;
     * Madison; Marshall; Mason; McDonough; Menard; Mercer; Monroe; Montgomery; Morgan; Ogle; Peoria; Perry; Pike;
     * Pulaski; Putnam; Randolph; Rock Island; Sangamon; Schuyler; Scott; St Clair; Stark; Stephenson; Tazewell; Union;
     * Warren; Washington; Whiteside; Winnebago; Woodford
     * State law defines system in US survey feet. See code 3444 for equivalent non-metric definition. Replaces NAD83 /
     * SPCS for applications with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_ILLINOIS_WEST = 'urn:ogc:def:crs:EPSG::2791';

    /**
     * NAD83(HARN) / Illinois West (ftUS)
     * Extent: USA - Illinois - counties of Adams; Alexander; Bond; Brown; Bureau; Calhoun; Carroll; Cass; Christian;
     * Clinton; Fulton; Greene; Hancock; Henderson; Henry; Jackson; Jersey; Jo Daviess; Knox; Lee; Logan; Macoupin;
     * Madison; Marshall; Mason; McDonough; Menard; Mercer; Monroe; Montgomery; Morgan; Ogle; Peoria; Perry; Pike;
     * Pulaski; Putnam; Randolph; Rock Island; Sangamon; Schuyler; Scott; St Clair; Stark; Stephenson; Tazewell; Union;
     * Warren; Washington; Whiteside; Winnebago; Woodford
     * State law defines system in US survey feet. Federal definition is metric - see code 2791. Replaces NAD83 / SPCS
     * for applications with an accuracy of better than 3 feet. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_ILLINOIS_WEST_FTUS = 'urn:ogc:def:crs:EPSG::3444';

    /**
     * NAD83(HARN) / Indiana East
     * Extent: USA - Indiana - counties of Adams; Allen; Bartholomew; Blackford; Brown; Cass; Clark; De Kalb; Dearborn;
     * Decatur; Delaware; Elkhart; Fayette; Floyd; Franklin; Fulton; Grant; Hamilton; Hancock; Harrison; Henry; Howard;
     * Huntington; Jackson; Jay; Jefferson; Jennings; Johnson; Kosciusko; Lagrange; Madison; Marion; Marshall; Miami;
     * Noble; Ohio; Randolph; Ripley; Rush; Scott; Shelby; St Joseph; Steuben; Switzerland; Tipton; Union; Wabash;
     * Washington; Wayne; Wells; Whitley
     * State law defines system in US survey feet. See code 2967 for equivalent non-metric definition. Replaces NAD83 /
     * SPCS for applications with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_INDIANA_EAST = 'urn:ogc:def:crs:EPSG::2792';

    /**
     * NAD83(HARN) / Indiana East (ftUS)
     * Extent: USA - Indiana - counties of Adams; Allen; Bartholomew; Blackford; Brown; Cass; Clark; De Kalb; Dearborn;
     * Decatur; Delaware; Elkhart; Fayette; Floyd; Franklin; Fulton; Grant; Hamilton; Hancock; Harrison; Henry; Howard;
     * Huntington; Jackson; Jay; Jefferson; Jennings; Johnson; Kosciusko; Lagrange; Madison; Marion; Marshall; Miami;
     * Noble; Ohio; Randolph; Ripley; Rush; Scott; Shelby; St Joseph; Steuben; Switzerland; Tipton; Union; Wabash;
     * Washington; Wayne; Wells; Whitley
     * State law defines system in US survey feet. Federal definition is metric - see code 2792. Replaces NAD83 / SPCS
     * for applications with an accuracy of better than 3 feet. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_INDIANA_EAST_FTUS = 'urn:ogc:def:crs:EPSG::2967';

    /**
     * NAD83(HARN) / Indiana West
     * Extent: USA - Indiana - counties of Benton; Boone; Carroll; Clay; Clinton; Crawford; Daviess; Dubois; Fountain;
     * Gibson; Greene; Hendricks; Jasper; Knox; La Porte; Lake; Lawrence; Martin; Monroe; Montgomery; Morgan; Newton;
     * Orange; Owen; Parke; Perry; Pike; Porter; Posey; Pulaski; Putnam; Spencer; Starke; Sullivan; Tippecanoe;
     * Vanderburgh; Vermillion; Vigo; Warren; Warrick; White
     * State law defines system in US survey feet. See code 2968 for equivalent non-metric definition. Replaces NAD83 /
     * SPCS for applications with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_INDIANA_WEST = 'urn:ogc:def:crs:EPSG::2793';

    /**
     * NAD83(HARN) / Indiana West (ftUS)
     * Extent: USA - Indiana - counties of Benton; Boone; Carroll; Clay; Clinton; Crawford; Daviess; Dubois; Fountain;
     * Gibson; Greene; Hendricks; Jasper; Knox; La Porte; Lake; Lawrence; Martin; Monroe; Montgomery; Morgan; Newton;
     * Orange; Owen; Parke; Perry; Pike; Porter; Posey; Pulaski; Putnam; Spencer; Starke; Sullivan; Tippecanoe;
     * Vanderburgh; Vermillion; Vigo; Warren; Warrick; White
     * State law defines system in US survey feet. Federal definition is metric - see code 2793. Replaces NAD83 / SPCS
     * for applications with an accuracy of better than 3 feet. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_INDIANA_WEST_FTUS = 'urn:ogc:def:crs:EPSG::2968';

    /**
     * NAD83(HARN) / Iowa North
     * Extent: USA - Iowa - counties of Allamakee; Benton; Black Hawk; Boone; Bremer; Buchanan; Buena Vista; Butler;
     * Calhoun; Carroll; Cerro Gordo; Cherokee; Chickasaw; Clay; Clayton; Crawford; Delaware; Dickinson; Dubuque;
     * Emmet; Fayette; Floyd; Franklin; Greene; Grundy; Hamilton; Hancock; Hardin; Howard; Humboldt; Ida; Jackson;
     * Jones; Kossuth; Linn; Lyon; Marshall; Mitchell; Monona; O'Brien; Osceola; Palo Alto; Plymouth; Pocahontas; Sac;
     * Sioux; Story; Tama; Webster; Winnebago; Winneshiek; Woodbury; Worth; Wright
     * State law defines system in US survey feet. See code 3425 for equivalent non-metric definition. Replaces NAD83 /
     * SPCS for applications with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_IOWA_NORTH = 'urn:ogc:def:crs:EPSG::2794';

    /**
     * NAD83(HARN) / Iowa North (ftUS)
     * Extent: USA - Iowa - counties of Allamakee; Benton; Black Hawk; Boone; Bremer; Buchanan; Buena Vista; Butler;
     * Calhoun; Carroll; Cerro Gordo; Cherokee; Chickasaw; Clay; Clayton; Crawford; Delaware; Dickinson; Dubuque;
     * Emmet; Fayette; Floyd; Franklin; Greene; Grundy; Hamilton; Hancock; Hardin; Howard; Humboldt; Ida; Jackson;
     * Jones; Kossuth; Linn; Lyon; Marshall; Mitchell; Monona; O'Brien; Osceola; Palo Alto; Plymouth; Pocahontas; Sac;
     * Sioux; Story; Tama; Webster; Winnebago; Winneshiek; Woodbury; Worth; Wright
     * State law defines system in US survey feet. Federal definition is metric - see code 2794. Replaces NAD83 / SPCS
     * for applications with an accuracy of better than 3 feet. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_IOWA_NORTH_FTUS = 'urn:ogc:def:crs:EPSG::3425';

    /**
     * NAD83(HARN) / Iowa South
     * Extent: USA - Iowa - counties of Adair; Adams; Appanoose; Audubon; Cass; Cedar; Clarke; Clinton; Dallas; Davis;
     * Decatur; Des Moines; Fremont; Guthrie; Harrison; Henry; Iowa; Jasper; Jefferson; Johnson; Keokuk; Lee; Louisa;
     * Lucas; Madison; Mahaska; Marion; Mills; Monroe; Montgomery; Muscatine; Page; Polk; Pottawattamie; Poweshiek;
     * Ringgold; Scott; Shelby; Taylor; Union; Van Buren; Wapello; Warren; Washington; Wayne
     * State law defines system in US survey feet. See code 3426 for equivalent non-metric definition. Replaces NAD83 /
     * SPCS for applications with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_IOWA_SOUTH = 'urn:ogc:def:crs:EPSG::2795';

    /**
     * NAD83(HARN) / Iowa South (ftUS)
     * Extent: USA - Iowa - counties of Adair; Adams; Appanoose; Audubon; Cass; Cedar; Clarke; Clinton; Dallas; Davis;
     * Decatur; Des Moines; Fremont; Guthrie; Harrison; Henry; Iowa; Jasper; Jefferson; Johnson; Keokuk; Lee; Louisa;
     * Lucas; Madison; Mahaska; Marion; Mills; Monroe; Montgomery; Muscatine; Page; Polk; Pottawattamie; Poweshiek;
     * Ringgold; Scott; Shelby; Taylor; Union; Van Buren; Wapello; Warren; Washington; Wayne
     * State law defines system in US survey feet. Federal definition is metric - see code 2795. Replaces NAD83 / SPCS
     * for applications with an accuracy of better than 3 feet. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_IOWA_SOUTH_FTUS = 'urn:ogc:def:crs:EPSG::3426';

    /**
     * NAD83(HARN) / Kansas North
     * Extent: USA - Kansas - counties of Atchison; Brown; Cheyenne; Clay; Cloud; Decatur; Dickinson; Doniphan;
     * Douglas; Ellis; Ellsworth; Geary; Gove; Graham; Jackson; Jefferson; Jewell; Johnson; Leavenworth; Lincoln;
     * Logan; Marshall; Mitchell; Morris; Nemaha; Norton; Osborne; Ottawa; Phillips; Pottawatomie; Rawlins; Republic;
     * Riley; Rooks; Russell; Saline; Shawnee; Sheridan; Sherman; Smith; Thomas; Trego; Wabaunsee; Wallace; Washington;
     * Wyandotte
     * State law defines system in US survey feet. See code 3427 for equivalent non-metric definition. Replaces NAD83 /
     * SPCS for applications with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_KANSAS_NORTH = 'urn:ogc:def:crs:EPSG::2796';

    /**
     * NAD83(HARN) / Kansas North (ftUS)
     * Extent: USA - Kansas - counties of Atchison; Brown; Cheyenne; Clay; Cloud; Decatur; Dickinson; Doniphan;
     * Douglas; Ellis; Ellsworth; Geary; Gove; Graham; Jackson; Jefferson; Jewell; Johnson; Leavenworth; Lincoln;
     * Logan; Marshall; Mitchell; Morris; Nemaha; Norton; Osborne; Ottawa; Phillips; Pottawatomie; Rawlins; Republic;
     * Riley; Rooks; Russell; Saline; Shawnee; Sheridan; Sherman; Smith; Thomas; Trego; Wabaunsee; Wallace; Washington;
     * Wyandotte
     * State law defines system in US survey feet. Federal definition is metric - see code 2796. Replaces NAD83 / SPCS
     * for applications with an accuracy of better than 3 feet. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_KANSAS_NORTH_FTUS = 'urn:ogc:def:crs:EPSG::3427';

    /**
     * NAD83(HARN) / Kansas South
     * Extent: USA - Kansas - counties of Allen; Anderson; Barber; Barton; Bourbon; Butler; Chase; Chautauqua;
     * Cherokee; Clark; Coffey; Comanche; Cowley; Crawford; Edwards; Elk; Finney; Ford; Franklin; Grant; Gray; Greeley;
     * Greenwood; Hamilton; Harper; Harvey; Haskell; Hodgeman; Kearny; Kingman; Kiowa; Labette; Lane; Linn; Lyon;
     * Marion; McPherson; Meade; Miami; Montgomery; Morton; Neosho; Ness; Osage; Pawnee; Pratt; Reno; Rice; Rush;
     * Scott; Sedgwick; Seward; Stafford; Stanton; Stevens; Sumner; Wichita; Wilson; Woodson
     * State law defines system in US survey feet. See code 3428 for equivalent non-metric definition. Replaces NAD83 /
     * SPCS for applications with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_KANSAS_SOUTH = 'urn:ogc:def:crs:EPSG::2797';

    /**
     * NAD83(HARN) / Kansas South (ftUS)
     * Extent: USA - Kansas - counties of Allen; Anderson; Barber; Barton; Bourbon; Butler; Chase; Chautauqua;
     * Cherokee; Clark; Coffey; Comanche; Cowley; Crawford; Edwards; Elk; Finney; Ford; Franklin; Grant; Gray; Greeley;
     * Greenwood; Hamilton; Harper; Harvey; Haskell; Hodgeman; Kearny; Kingman; Kiowa; Labette; Lane; Linn; Lyon;
     * Marion; McPherson; Meade; Miami; Montgomery; Morton; Neosho; Ness; Osage; Pawnee; Pratt; Reno; Rice; Rush;
     * Scott; Sedgwick; Seward; Stafford; Stanton; Stevens; Sumner; Wichita; Wilson; Woodson
     * State law defines system in US survey feet. Federal definition is metric - see code 2797. Replaces NAD83 / SPCS
     * for applications with an accuracy of better than 3 feet. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_KANSAS_SOUTH_FTUS = 'urn:ogc:def:crs:EPSG::3428';

    /**
     * NAD83(HARN) / Kentucky North
     * Extent: USA - Kentucky - counties of Anderson; Bath; Boone; Bourbon; Boyd; Bracken; Bullitt; Campbell; Carroll;
     * Carter; Clark; Elliott; Fayette; Fleming; Franklin; Gallatin; Grant; Greenup; Harrison; Henry; Jefferson;
     * Jessamine; Kenton; Lawrence; Lewis; Mason; Menifee; Montgomery; Morgan; Nicholas; Oldham; Owen; Pendleton;
     * Robertson; Rowan; Scott; Shelby; Spencer; Trimble; Woodford
     * State law defines system in US survey feet. See code 2891 for equivalent non-metric definition. Replaces NAD83 /
     * SPCS for applications with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_KENTUCKY_NORTH = 'urn:ogc:def:crs:EPSG::2798';

    /**
     * NAD83(HARN) / Kentucky North (ftUS)
     * Extent: USA - Kentucky - counties of Anderson; Bath; Boone; Bourbon; Boyd; Bracken; Bullitt; Campbell; Carroll;
     * Carter; Clark; Elliott; Fayette; Fleming; Franklin; Gallatin; Grant; Greenup; Harrison; Henry; Jefferson;
     * Jessamine; Kenton; Lawrence; Lewis; Mason; Menifee; Montgomery; Morgan; Nicholas; Oldham; Owen; Pendleton;
     * Robertson; Rowan; Scott; Shelby; Spencer; Trimble; Woodford
     * State law defines system in US survey feet. Federal definition is metric - see code 2798. Replaces NAD83 / SPCS
     * for applications with an accuracy of better than 3 feet. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_KENTUCKY_NORTH_FTUS = 'urn:ogc:def:crs:EPSG::2891';

    /**
     * NAD83(HARN) / Kentucky Single Zone
     * Extent: USA - Kentucky
     * State law defines system in US survey feet. See code 3091 for equivalent non-metric definition. Replaces NAD83 /
     * KY1Z for applications with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) / KY1Z.
     */
    public const EPSG_NAD83_HARN_KENTUCKY_SINGLE_ZONE = 'urn:ogc:def:crs:EPSG::3090';

    /**
     * NAD83(HARN) / Kentucky Single Zone (ftUS)
     * Extent: USA - Kentucky
     * State law defines system in US survey feet. See code 3090 for equivalent metric definition. Replaces NAD83 /
     * KY1Z (ft) for applications with an accuracy of better than 3 feet. Replaced by NAD83(NSRS2007) / KY1Z(ft).
     */
    public const EPSG_NAD83_HARN_KENTUCKY_SINGLE_ZONE_FTUS = 'urn:ogc:def:crs:EPSG::3091';

    /**
     * NAD83(HARN) / Kentucky South
     * Extent: USA - Kentucky - counties of Adair; Allen; Ballard; Barren; Bell; Boyle; Breathitt; Breckinridge;
     * Butler; Caldwell; Calloway; Carlisle; Casey; Christian; Clay; Clinton; Crittenden; Cumberland; Daviess;
     * Edmonson; Estill; Floyd; Fulton; Garrard; Graves; Grayson; Green; Hancock; Hardin; Harlan; Hart; Henderson;
     * Hickman; Hopkins; Jackson; Johnson; Knott; Knox; Larue; Laurel; Lee; Leslie; Letcher; Lincoln; Livingston;
     * Logan; Lyon; Madison; Magoffin; Marion; Marshall; Martin; McCracken; McCreary; McLean; Meade; Mercer; Metcalfe;
     * Monroe; Muhlenberg; Nelson; Ohio; Owsley; Perry; Pike; Powell; Pulaski; Rockcastle; Russell; Simpson; Taylor;
     * Todd; Trigg; Union; Warren; Washington; Wayne; Webster; Whitley; Wolfe
     * State law defines system in US survey feet. See code 2892 for equivalent non-metric definition. Replaces NAD83 /
     * SPCS for applications with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_KENTUCKY_SOUTH = 'urn:ogc:def:crs:EPSG::2799';

    /**
     * NAD83(HARN) / Kentucky South (ftUS)
     * Extent: USA - Kentucky - counties of Adair; Allen; Ballard; Barren; Bell; Boyle; Breathitt; Breckinridge;
     * Butler; Caldwell; Calloway; Carlisle; Casey; Christian; Clay; Clinton; Crittenden; Cumberland; Daviess;
     * Edmonson; Estill; Floyd; Fulton; Garrard; Graves; Grayson; Green; Hancock; Hardin; Harlan; Hart; Henderson;
     * Hickman; Hopkins; Jackson; Johnson; Knott; Knox; Larue; Laurel; Lee; Leslie; Letcher; Lincoln; Livingston;
     * Logan; Lyon; Madison; Magoffin; Marion; Marshall; Martin; McCracken; McCreary; McLean; Meade; Mercer; Metcalfe;
     * Monroe; Muhlenberg; Nelson; Ohio; Owsley; Perry; Pike; Powell; Pulaski; Rockcastle; Russell; Simpson; Taylor;
     * Todd; Trigg; Union; Warren; Washington; Wayne; Webster; Whitley; Wolfe
     * State law defines system in US survey feet. Federal definition is metric - see code 2799. Replaces NAD83 / SPCS
     * for applications with an accuracy of better than 3 feet. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_KENTUCKY_SOUTH_FTUS = 'urn:ogc:def:crs:EPSG::2892';

    /**
     * NAD83(HARN) / Louisiana North
     * Extent: USA - Louisiana - counties of Avoyelles; Bienville; Bossier; Caddo; Caldwell; Catahoula; Claiborne;
     * Concordia; De Soto; East Carroll; Franklin; Grant; Jackson; La Salle; Lincoln; Madison; Morehouse; Natchitoches;
     * Ouachita; Rapides; Red River; Richland; Sabine; Tensas; Union; Vernon; Webster; West Carroll; Winn
     * State law defines system in US survey feet. See code 3456 for equivalent non-metric definition. Replaces NAD83 /
     * SPCS for applications with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_LOUISIANA_NORTH = 'urn:ogc:def:crs:EPSG::2800';

    /**
     * NAD83(HARN) / Louisiana North (ftUS)
     * Extent: USA - Louisiana - counties of Avoyelles; Bienville; Bossier; Caddo; Caldwell; Catahoula; Claiborne;
     * Concordia; De Soto; East Carroll; Franklin; Grant; Jackson; La Salle; Lincoln; Madison; Morehouse; Natchitoches;
     * Ouachita; Rapides; Red River; Richland; Sabine; Tensas; Union; Vernon; Webster; West Carroll; Winn
     * State law defines system in US survey feet. Federal definition is metric - see code 2800. Replaces NAD83 / SPCS
     * for applications with an accuracy of better than 3 feet. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_LOUISIANA_NORTH_FTUS = 'urn:ogc:def:crs:EPSG::3456';

    /**
     * NAD83(HARN) / Louisiana South
     * Extent: USA - Louisiana - counties of Acadia; Allen; Ascension; Assumption; Beauregard; Calcasieu; Cameron; East
     * Baton Rouge; East Feliciana; Evangeline; Iberia; Iberville; Jefferson; Jefferson Davis; Lafayette; LaFourche;
     * Livingston; Orleans; Plaquemines; Pointe Coupee; St Bernard; St Charles; St Helena; St James; St John the
     * Baptist; St Landry; St Martin; St Mary; St Tammany; Tangipahoa; Terrebonne; Vermilion; Washington; West Baton
     * Rouge; West Feliciana
     * Not applicable to offshore areas. State law defines system in US survey feet. See code 3457 for equivalent
     * non-metric definition. Replaces NAD83 / SPCS for applications with an accuracy of better than 1m. Replaced by
     * NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_LOUISIANA_SOUTH = 'urn:ogc:def:crs:EPSG::2801';

    /**
     * NAD83(HARN) / Louisiana South (ftUS)
     * Extent: USA - Louisiana - counties of Acadia; Allen; Ascension; Assumption; Beauregard; Calcasieu; Cameron; East
     * Baton Rouge; East Feliciana; Evangeline; Iberia; Iberville; Jefferson; Jefferson Davis; Lafayette; LaFourche;
     * Livingston; Orleans; Plaquemines; Pointe Coupee; St Bernard; St Charles; St Helena; St James; St John the
     * Baptist; St Landry; St Martin; St Mary; St Tammany; Tangipahoa; Terrebonne; Vermilion; Washington; West Baton
     * Rouge; West Feliciana
     * Not applicable to offshore areas. State law defines system in US survey feet. Federal definition is metric - see
     * code 2801. Replaces NAD83 / SPCS for applications with an accuracy of better than 3 feet. Replaced by
     * NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_LOUISIANA_SOUTH_FTUS = 'urn:ogc:def:crs:EPSG::3457';

    /**
     * NAD83(HARN) / Maine CS2000 Central
     * Extent: USA - Maine between approximately 69°40'W and 68°25'W. The area is bounded by the following: Beginning
     * at the point determined by the intersection of the Maine State line and the County Line between Aroostook and
     * Somerset Counties, thence northeasterly along the state line to the intersection of the Fort Kent - Frenchville
     * town line, thence southerly along this town line to the intersection with the New Canada Plantation - T17 R5
     * WELS town line, thence continuing southerly along town lines to the northeast corner of Penobscot County, thence
     * continuing southerly along the Penobscot County line to the intersection of the Woodville - Mattawamkeag town
     * line (being determined by the Penobscot River), thence along the Penobscot River to the Enfield - Lincoln town
     * line, thence southeasterly along the Enfield - Lincoln town line and the Enfield - Lowell town line to the
     * Passadumkeag - Edinburg town line, thence south-southeasterly along town lines to the intersection of the
     * Hancock County line, thence southerly along the county line to the intersection of the Otis - Mariaville town
     * line, thence southerly along the Otis - Mariaville town line to the Ellsworth city line, thence southerly along
     * the Ellsworth city line to the intersection of the Surry - Trenton town line, thence southerly along the
     * easterly town lines of Surry, Blue Hill, Brooklin, Deer Isle, and Stonington to the Knox County line, thence
     * following the Knox County line to the boundary of the State of Maine as determined by Maritime law, thence
     * following the State boundary westerly to the intersection of the Sagadahoc - Lincoln county line, thence
     * northerly along the easterly boundary of the Maine 2000 West Zone, as defined, to the point of beginning
     * Replaces NAD83 / SPCS for applications with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_MAINE_CS2000_CENTRAL = 'urn:ogc:def:crs:EPSG::3464';

    /**
     * NAD83(HARN) / Maine CS2000 East
     * Extent: USA - Maine east of approximately 68°25'W. The area is bounded by the following: Beginning at the point
     * determined by the intersection of the Maine State line and the Fort Kent - Frenchville town line, thence
     * continuing easterly and then southerly along the state line to the boundary of the State of Maine as determined
     * by Maritime law, thence following the State boundary westerly to the intersection of the Knox and Hancock County
     * line, thence northerly along the easterly boundary of the Maine 2000 Central Zone, as defined, to the point of
     * beginning
     * Replaces NAD83 / SPCS for applications with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_MAINE_CS2000_EAST = 'urn:ogc:def:crs:EPSG::3075';

    /**
     * NAD83(HARN) / Maine CS2000 West
     * Extent: USA - Maine west of approximately 69°40'W. The area is bounded by the following: Beginning at the point
     * determined by the intersection of the Maine State line and the County Line between Aroostook and Somerset
     * Counties, thence following the Somerset County line Easterly to the Northwest corner of the Somerset and
     * Piscataquis county line, thence Southerly along this county line to the northeast corner of the Athens town
     * line, thence westerly along the town line between Brighton Plantation and Athens to the westerly corner of
     * Athens, and continuing southerly to the southwest corner of the town of Athens where it meets the Cornville town
     * line, thence westerly along the Cornville - Solon town line to the intersection of the Cornville - Madison town
     * line, thence southerly and westerly following the Madison town line to the intersection of the Norridgewock -
     * Skowhegan town line, thence southerly along the Skowhegan town line to the Fairfield town line, thence easterly
     * along the Fairfield town line to the Clinton town line (being determined by the Kennebec River), thence
     * southerly along the Kennebec River to the Augusta city line, thence easterly along the city line to the Windsor
     * town line, thence southerly along the Augusta - Windsor town line to the northwest corner of the Lincoln County
     * line, thence southerly along the westerly Lincoln county line to the boundary of the State of Maine as
     * determined by Maritime law, thence following the State boundary on the westerly side of the state to the point
     * of beginning
     * Replaces NAD83 / SPCS for applications with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_MAINE_CS2000_WEST = 'urn:ogc:def:crs:EPSG::3077';

    /**
     * NAD83(HARN) / Maine East
     * Extent: USA - Maine - counties of Aroostook; Hancock; Knox; Penobscot; Piscataquis; Waldo; Washington
     * State law defines system in US survey feet. See code 26855 for equivalent non-metric definition. Replaces NAD83
     * / SPCS for applications with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_MAINE_EAST = 'urn:ogc:def:crs:EPSG::2802';

    /**
     * NAD83(HARN) / Maine East (ftUS)
     * Extent: USA - Maine - counties of Aroostook; Hancock; Knox; Penobscot; Piscataquis; Waldo; Washington
     * State law defines use of US survey feet. Federal definition is metric - see code 2802. Replaces NAD83 / SPCS for
     * applications with an accuracy of better than 3ft. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_MAINE_EAST_FTUS = 'urn:ogc:def:crs:EPSG::26855';

    /**
     * NAD83(HARN) / Maine West
     * Extent: USA - Maine - counties of Androscoggin; Cumberland; Franklin; Kennebec; Lincoln; Oxford; Sagadahoc;
     * Somerset; York
     * State law defines system in US survey feet. See code 26856 for equivalent non-metric definition. Replaces NAD83
     * / SPCS for applications with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_MAINE_WEST = 'urn:ogc:def:crs:EPSG::2803';

    /**
     * NAD83(HARN) / Maine West (ftUS)
     * Extent: USA - Maine - counties of Androscoggin; Cumberland; Franklin; Kennebec; Lincoln; Oxford; Sagadahoc;
     * Somerset; York
     * State law defines use of US survey feet. Federal definition is metric - see code 2803. Replaces NAD83 / SPCS for
     * applications with an accuracy of better than 3ft. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_MAINE_WEST_FTUS = 'urn:ogc:def:crs:EPSG::26856';

    /**
     * NAD83(HARN) / Maryland
     * Extent: USA - Maryland - counties of Allegany; Anne Arundel; Baltimore; Calvert; Caroline; Carroll; Cecil;
     * Charles; Dorchester; Frederick; Garrett; Harford; Howard; Kent; Montgomery; Prince Georges; Queen Annes;
     * Somerset; St Marys; Talbot; Washington; Wicomico; Worcester
     * State law defines system in US survey feet. See code 2893 for equivalent non-metric definition. Replaces NAD83 /
     * SPCS for applications with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_MARYLAND = 'urn:ogc:def:crs:EPSG::2804';

    /**
     * NAD83(HARN) / Maryland (ftUS)
     * Extent: USA - Maryland - counties of Allegany; Anne Arundel; Baltimore; Calvert; Caroline; Carroll; Cecil;
     * Charles; Dorchester; Frederick; Garrett; Harford; Howard; Kent; Montgomery; Prince Georges; Queen Annes;
     * Somerset; St Marys; Talbot; Washington; Wicomico; Worcester
     * State law defines system in US survey feet. Federal definition is metric - see code 2804. Replaces NAD83 / SPCS
     * for applications with an accuracy of better than 3 feet. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_MARYLAND_FTUS = 'urn:ogc:def:crs:EPSG::2893';

    /**
     * NAD83(HARN) / Massachusetts Island
     * Extent: USA - Massachusetts offshore - counties of Dukes; Nantucket
     * State law defines system in US survey feet. See code 2895 for equivalent non-metric definition. Replaces NAD83 /
     * SPCS for applications with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_MASSACHUSETTS_ISLAND = 'urn:ogc:def:crs:EPSG::2806';

    /**
     * NAD83(HARN) / Massachusetts Island (ftUS)
     * Extent: USA - Massachusetts offshore - counties of Dukes; Nantucket
     * State law defines system in US survey feet. Federal definition is metric - see code 2806. Replaces NAD83 / SPCS
     * for applications with an accuracy of better than 3 feet. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_MASSACHUSETTS_ISLAND_FTUS = 'urn:ogc:def:crs:EPSG::2895';

    /**
     * NAD83(HARN) / Massachusetts Mainland
     * Extent: USA - Massachusetts onshore - counties of Barnstable; Berkshire; Bristol; Essex; Franklin; Hampden;
     * Hampshire; Middlesex; Norfolk; Plymouth; Suffolk; Worcester
     * State law defines system in US survey feet. See code 2894 for equivalent non-metric definition. Replaces NAD83 /
     * SPCS for applications with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_MASSACHUSETTS_MAINLAND = 'urn:ogc:def:crs:EPSG::2805';

    /**
     * NAD83(HARN) / Massachusetts Mainland (ftUS)
     * Extent: USA - Massachusetts onshore - counties of Barnstable; Berkshire; Bristol; Essex; Franklin; Hampden;
     * Hampshire; Middlesex; Norfolk; Plymouth; Suffolk; Worcester
     * State law defines system in US survey feet. Federal definition is metric - see code 2805. Replaces NAD83 / SPCS
     * for applications with an accuracy of better than 3 feet. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_MASSACHUSETTS_MAINLAND_FTUS = 'urn:ogc:def:crs:EPSG::2894';

    /**
     * NAD83(HARN) / Michigan Central
     * Extent: USA - Michigan - counties of Alcona; Alpena; Antrim; Arenac; Benzie; Charlevoix; Cheboygan; Clare;
     * Crawford; Emmet; Gladwin; Grand Traverse; Iosco; Kalkaska; Lake; Leelanau; Manistee; Mason; Missaukee;
     * Montmorency; Ogemaw; Osceola; Oscoda; Otsego; Presque Isle; Roscommon; Wexford
     * State law defines system in International feet (note: not US survey feet). See code 2897 for equivalent
     * non-metric definition. Replaces NAD83 / SPCS for applications with an accuracy of better than 1m. Replaced by
     * NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_MICHIGAN_CENTRAL = 'urn:ogc:def:crs:EPSG::2808';

    /**
     * NAD83(HARN) / Michigan Central (ft)
     * Extent: USA - Michigan - counties of Alcona; Alpena; Antrim; Arenac; Benzie; Charlevoix; Cheboygan; Clare;
     * Crawford; Emmet; Gladwin; Grand Traverse; Iosco; Kalkaska; Lake; Leelanau; Manistee; Mason; Missaukee;
     * Montmorency; Ogemaw; Osceola; Oscoda; Otsego; Presque Isle; Roscommon; Wexford
     * State law defines system in International feet (note: not US survey feet). Federal definition is metric - see
     * code 2808. Replaces NAD83 / SPCS for applications with an accuracy of better than 3 ft. Replaced by
     * NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_MICHIGAN_CENTRAL_FT = 'urn:ogc:def:crs:EPSG::2897';

    /**
     * NAD83(HARN) / Michigan North
     * Extent: USA - Michigan north of approximately 45°45'N - counties of Alger; Baraga; Chippewa; Delta; Dickinson;
     * Gogebic; Houghton; Iron; Keweenaw; Luce; Mackinac; Marquette; Menominee; Ontonagon; Schoolcraft
     * State law defines system in International feet (note: not US survey feet). See code 2896 for equivalent
     * non-metric definition. Replaces NAD83 / SPCS for applications with an accuracy of better than 1m. Replaced by
     * NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_MICHIGAN_NORTH = 'urn:ogc:def:crs:EPSG::2807';

    /**
     * NAD83(HARN) / Michigan North (ft)
     * Extent: USA - Michigan north of approximately 45°45'N - counties of Alger; Baraga; Chippewa; Delta; Dickinson;
     * Gogebic; Houghton; Iron; Keweenaw; Luce; Mackinac; Marquette; Menominee; Ontonagon; Schoolcraft
     * State law defines system in International feet (note: not US survey feet). Federal definition is metric - see
     * code 2807. Replaces NAD83 / SPCS for applications with an accuracy of better than 3 ft. Replaced by
     * NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_MICHIGAN_NORTH_FT = 'urn:ogc:def:crs:EPSG::2896';

    /**
     * NAD83(HARN) / Michigan Oblique Mercator
     * Extent: USA - Michigan
     * Replaces NAD83 / Michigan Oblique Mercator for applications with an accuracy of better than 1m. Replaced by
     * NAD83(NSRS2007) / Michigan Oblique Mercator.
     */
    public const EPSG_NAD83_HARN_MICHIGAN_OBLIQUE_MERCATOR = 'urn:ogc:def:crs:EPSG::3079';

    /**
     * NAD83(HARN) / Michigan South
     * Extent: USA - Michigan - counties of Allegan; Barry; Bay; Berrien; Branch; Calhoun; Cass; Clinton; Eaton;
     * Genesee; Gratiot; Hillsdale; Huron; Ingham; Ionia; Isabella; Jackson; Kalamazoo; Kent; Lapeer; Lenawee;
     * Livingston; Macomb; Mecosta; Midland; Monroe; Montcalm; Muskegon; Newaygo; Oakland; Oceana; Ottawa; Saginaw;
     * Sanilac; Shiawassee; St Clair; St Joseph; Tuscola; Van Buren; Washtenaw; Wayne
     * State law defines system in International feet (note: not US survey feet). See code 2898 for equivalent
     * non-metric definition. Replaces NAD83 / SPCS for applications with an accuracy of better than 1m. Replaced by
     * NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_MICHIGAN_SOUTH = 'urn:ogc:def:crs:EPSG::2809';

    /**
     * NAD83(HARN) / Michigan South (ft)
     * Extent: USA - Michigan - counties of Allegan; Barry; Bay; Berrien; Branch; Calhoun; Cass; Clinton; Eaton;
     * Genesee; Gratiot; Hillsdale; Huron; Ingham; Ionia; Isabella; Jackson; Kalamazoo; Kent; Lapeer; Lenawee;
     * Livingston; Macomb; Mecosta; Midland; Monroe; Montcalm; Muskegon; Newaygo; Oakland; Oceana; Ottawa; Saginaw;
     * Sanilac; Shiawassee; St Clair; St Joseph; Tuscola; Van Buren; Washtenaw; Wayne
     * State law defines system in International feet (note: not US survey feet). Federal definition is metric - see
     * code 2809. Replaces NAD83 / SPCS for applications with an accuracy of better than 3 feet. Replaced by
     * NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_MICHIGAN_SOUTH_FT = 'urn:ogc:def:crs:EPSG::2898';

    /**
     * NAD83(HARN) / Minnesota Central
     * Extent: USA - Minnesota - counties of Aitkin; Becker; Benton; Carlton; Cass; Chisago; Clay; Crow Wing; Douglas;
     * Grant; Hubbard; Isanti; Kanabec; Mille Lacs; Morrison; Otter Tail; Pine; Pope; Stearns; Stevens; Todd; Traverse;
     * Wadena; Wilkin
     * State law defines system in US survey feet. See code 26858 for equivalent non-metric definition. Replaces NAD83
     * / SPCS for applications with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_MINNESOTA_CENTRAL = 'urn:ogc:def:crs:EPSG::2811';

    /**
     * NAD83(HARN) / Minnesota Central (ftUS)
     * Extent: USA - Minnesota - counties of Aitkin; Becker; Benton; Carlton; Cass; Chisago; Clay; Crow Wing; Douglas;
     * Grant; Hubbard; Isanti; Kanabec; Mille Lacs; Morrison; Otter Tail; Pine; Pope; Stearns; Stevens; Todd; Traverse;
     * Wadena; Wilkin
     * State law defines use of US survey feet. Federal definition is metric - see code 2811. Replaces NAD83 / SPCS for
     * applications with an accuracy of better than 3ft. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_MINNESOTA_CENTRAL_FTUS = 'urn:ogc:def:crs:EPSG::26858';

    /**
     * NAD83(HARN) / Minnesota North
     * Extent: USA - Minnesota - counties of Beltrami; Clearwater; Cook; Itasca; Kittson; Koochiching; Lake; Lake of
     * the Woods; Mahnomen; Marshall; Norman; Pennington; Polk; Red Lake; Roseau; St Louis
     * State law defines system in US survey feet. See code 26857 for equivalent non-metric definition. Replaces NAD83
     * / SPCS for applications with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_MINNESOTA_NORTH = 'urn:ogc:def:crs:EPSG::2810';

    /**
     * NAD83(HARN) / Minnesota North (ftUS)
     * Extent: USA - Minnesota - counties of Beltrami; Clearwater; Cook; Itasca; Kittson; Koochiching; Lake; Lake of
     * the Woods; Mahnomen; Marshall; Norman; Pennington; Polk; Red Lake; Roseau; St Louis
     * State law defines use of US survey feet. Federal definition is metric - see code 2810. Replaces NAD83 / SPCS for
     * applications with an accuracy of better than 3ft. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_MINNESOTA_NORTH_FTUS = 'urn:ogc:def:crs:EPSG::26857';

    /**
     * NAD83(HARN) / Minnesota South
     * Extent: USA - Minnesota - counties of Anoka; Big Stone; Blue Earth; Brown; Carver; Chippewa; Cottonwood; Dakota;
     * Dodge; Faribault; Fillmore; Freeborn; Goodhue; Hennepin; Houston; Jackson; Kandiyohi; Lac Qui Parle; Le Sueur;
     * Lincoln; Lyon; Martin; McLeod; Meeker; Mower; Murray; Nicollet; Nobles; Olmsted; Pipestone; Ramsey; Redwood;
     * Renville; Rice; Rock; Scott; Sherburne; Sibley; Steele; Swift; Wabasha; Waseca; Washington; Watonwan; Winona;
     * Wright; Yellow Medicine
     * State law defines system in US survey feet. See code 26859 for equivalent non-metric definition. Replaces NAD83
     * / SPCS for applications with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_MINNESOTA_SOUTH = 'urn:ogc:def:crs:EPSG::2812';

    /**
     * NAD83(HARN) / Minnesota South (ftUS)
     * Extent: USA - Minnesota - counties of Anoka; Big Stone; Blue Earth; Brown; Carver; Chippewa; Cottonwood; Dakota;
     * Dodge; Faribault; Fillmore; Freeborn; Goodhue; Hennepin; Houston; Jackson; Kandiyohi; Lac Qui Parle; Le Sueur;
     * Lincoln; Lyon; Martin; McLeod; Meeker; Mower; Murray; Nicollet; Nobles; Olmsted; Pipestone; Ramsey; Redwood;
     * Renville; Rice; Rock; Scott; Sherburne; Sibley; Steele; Swift; Wabasha; Waseca; Washington; Watonwan; Winona;
     * Wright; Yellow Medicine
     * State law defines use of US survey feet. Federal definition is metric - see code 2812. Replaces NAD83 / SPCS for
     * applications with an accuracy of better than 3ft. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_MINNESOTA_SOUTH_FTUS = 'urn:ogc:def:crs:EPSG::26859';

    /**
     * NAD83(HARN) / Mississippi East
     * Extent: USA - Mississippi - counties of Alcorn; Attala; Benton; Calhoun; Chickasaw; Choctaw; Clarke; Clay;
     * Covington; Forrest; George; Greene; Hancock; Harrison; Itawamba; Jackson; Jasper; Jones; Kemper; Lafayette;
     * Lamar; Lauderdale; Leake; Lee; Lowndes; Marshall; Monroe; Neshoba; Newton; Noxubee; Oktibbeha; Pearl River;
     * Perry; Pontotoc; Prentiss; Scott; Smith; Stone; Tippah; Tishomingo; Union; Wayne; Webster; Winston
     * State law defines system in US survey feet. See code 2899 for equivalent non-metric definition. Replaces NAD83 /
     * SPCS for applications with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_MISSISSIPPI_EAST = 'urn:ogc:def:crs:EPSG::2813';

    /**
     * NAD83(HARN) / Mississippi East (ftUS)
     * Extent: USA - Mississippi - counties of Alcorn; Attala; Benton; Calhoun; Chickasaw; Choctaw; Clarke; Clay;
     * Covington; Forrest; George; Greene; Hancock; Harrison; Itawamba; Jackson; Jasper; Jones; Kemper; Lafayette;
     * Lamar; Lauderdale; Leake; Lee; Lowndes; Marshall; Monroe; Neshoba; Newton; Noxubee; Oktibbeha; Pearl River;
     * Perry; Pontotoc; Prentiss; Scott; Smith; Stone; Tippah; Tishomingo; Union; Wayne; Webster; Winston
     * State law defines system in US survey feet. Federal definition is metric - see code 2813. Replaces NAD83 / SPCS
     * for applications with an accuracy of better than 3 feet. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_MISSISSIPPI_EAST_FTUS = 'urn:ogc:def:crs:EPSG::2899';

    /**
     * NAD83(HARN) / Mississippi TM
     * Extent: USA - Mississippi
     * For applications with an accuracy of better than 1m, replaced by NAD83 / Mississippi TM (code 3814). Replaced by
     * NAD83(CSRS2007) / Mississippi TM (CRS code 3816).
     */
    public const EPSG_NAD83_HARN_MISSISSIPPI_TM = 'urn:ogc:def:crs:EPSG::3815';

    /**
     * NAD83(HARN) / Mississippi West
     * Extent: USA - Mississippi - counties of Adams; Amite; Bolivar; Carroll; Claiborne; Coahoma; Copiah; De Soto;
     * Franklin; Grenada; Hinds; Holmes; Humphreys; Issaquena; Jefferson; Jefferson Davis; Lawrence; Leflore; Lincoln;
     * Madison; Marion; Montgomery; Panola; Pike; Quitman; Rankin; Sharkey; Simpson; Sunflower; Tallahatchie; Tate;
     * Tunica; Walthall; Warren; Washington; Wilkinson; Yalobusha; Yazoo
     * State law defines system in US survey feet. See code 2900 for equivalent non-metric definition. Replaces NAD83 /
     * SPCS for applications with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_MISSISSIPPI_WEST = 'urn:ogc:def:crs:EPSG::2814';

    /**
     * NAD83(HARN) / Mississippi West (ftUS)
     * Extent: USA - Mississippi - counties of Adams; Amite; Bolivar; Carroll; Claiborne; Coahoma; Copiah; De Soto;
     * Franklin; Grenada; Hinds; Holmes; Humphreys; Issaquena; Jefferson; Jefferson Davis; Lawrence; Leflore; Lincoln;
     * Madison; Marion; Montgomery; Panola; Pike; Quitman; Rankin; Sharkey; Simpson; Sunflower; Tallahatchie; Tate;
     * Tunica; Walthall; Warren; Washington; Wilkinson; Yalobusha; Yazoo
     * State law defines system in US survey feet. Federal definition is metric - see code 2814. Replaces NAD83 / SPCS
     * for applications with an accuracy of better than 3 feet. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_MISSISSIPPI_WEST_FTUS = 'urn:ogc:def:crs:EPSG::2900';

    /**
     * NAD83(HARN) / Missouri Central
     * Extent: USA - Missouri - counties of Adair; Audrain; Benton; Boone; Callaway; Camden; Carroll; Chariton;
     * Christian; Cole; Cooper; Dallas; Douglas; Greene; Grundy; Hickory; Howard; Howell; Knox; Laclede; Linn;
     * Livingston; Macon; Maries; Mercer; Miller; Moniteau; Monroe; Morgan; Osage; Ozark; Pettis; Phelps; Polk;
     * Pulaski; Putnam; Randolph; Saline; Schuyler; Scotland; Shelby; Stone; Sullivan; Taney; Texas; Webster; Wright
     * Replaces NAD83 / SPCS for applications with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_MISSOURI_CENTRAL = 'urn:ogc:def:crs:EPSG::2816';

    /**
     * NAD83(HARN) / Missouri East
     * Extent: USA - Missouri - counties of Bollinger; Butler; Cape Girardeau; Carter; Clark; Crawford; Dent; Dunklin;
     * Franklin; Gasconade; Iron; Jefferson; Lewis; Lincoln; Madison; Marion; Mississippi; Montgomery; New Madrid;
     * Oregon; Pemiscot; Perry; Pike; Ralls; Reynolds; Ripley; Scott; Shannon; St Charles; St Francois; St Louis; Ste.
     * Genevieve; Stoddard; Warren; Washington; Wayne
     * Replaces NAD83 / SPCS for applications with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_MISSOURI_EAST = 'urn:ogc:def:crs:EPSG::2815';

    /**
     * NAD83(HARN) / Missouri West
     * Extent: USA - Missouri - counties of Andrew; Atchison; Barry; Barton; Bates; Buchanan; Caldwell; Cass; Cedar;
     * Clay; Clinton; Dade; Daviess; De Kalb; Gentry; Harrison; Henry; Holt; Jackson; Jasper; Johnson; Lafayette;
     * Lawrence; McDonald; Newton; Nodaway; Platte; Ray; St Clair; Vernon; Worth
     * Replaces NAD83 / SPCS for applications with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_MISSOURI_WEST = 'urn:ogc:def:crs:EPSG::2817';

    /**
     * NAD83(HARN) / Montana
     * Extent: USA - Montana - counties of Beaverhead; Big Horn; Blaine; Broadwater; Carbon; Carter; Cascade; Chouteau;
     * Custer; Daniels; Dawson; Deer Lodge; Fallon; Fergus; Flathead; Gallatin; Garfield; Glacier; Golden Valley;
     * Granite; Hill; Jefferson; Judith Basin; Lake; Lewis and Clark; Liberty; Lincoln; Madison; McCone; Meagher;
     * Mineral; Missoula; Musselshell; Park; Petroleum; Phillips; Pondera; Powder River; Powell; Prairie; Ravalli;
     * Richland; Roosevelt; Rosebud; Sanders; Sheridan; Silver Bow; Stillwater; Sweet Grass; Teton; Toole; Treasure;
     * Valley; Wheatland; Wibaux; Yellowstone
     * State law defines system in International feet (note: not US survey feet). See code 2901 for equivalent
     * non-metric definition. Replaces NAD83 / SPCS for applications with an accuracy of better than 1m. Replaced by
     * NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_MONTANA = 'urn:ogc:def:crs:EPSG::2818';

    /**
     * NAD83(HARN) / Montana (ft)
     * Extent: USA - Montana - counties of Beaverhead; Big Horn; Blaine; Broadwater; Carbon; Carter; Cascade; Chouteau;
     * Custer; Daniels; Dawson; Deer Lodge; Fallon; Fergus; Flathead; Gallatin; Garfield; Glacier; Golden Valley;
     * Granite; Hill; Jefferson; Judith Basin; Lake; Lewis and Clark; Liberty; Lincoln; Madison; McCone; Meagher;
     * Mineral; Missoula; Musselshell; Park; Petroleum; Phillips; Pondera; Powder River; Powell; Prairie; Ravalli;
     * Richland; Roosevelt; Rosebud; Sanders; Sheridan; Silver Bow; Stillwater; Sweet Grass; Teton; Toole; Treasure;
     * Valley; Wheatland; Wibaux; Yellowstone
     * State law defines system in International feet (note: not US survey feet). Federal definition is metric - see
     * code 2818. Replaces NAD83 / SPCS for applications with an accuracy of better than 3 feet. Replaced by
     * NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_MONTANA_FT = 'urn:ogc:def:crs:EPSG::2901';

    /**
     * NAD83(HARN) / Nebraska
     * Extent: USA - Nebraska - counties of Adams; Antelope; Arthur; Banner; Blaine; Boone; Box Butte; Boyd; Brown;
     * Buffalo; Burt; Butler; Cass; Cedar; Chase; Cherry; Cheyenne; Clay; Colfax; Cuming; Custer; Dakota; Dawes;
     * Dawson; Deuel; Dixon; Dodge; Douglas; Dundy; Fillmore; Franklin; Frontier; Furnas; Gage; Garden; Garfield;
     * Gosper; Grant; Greeley; Hall; Hamilton; Harlan; Hayes; Hitchcock; Holt; Hooker; Howard; Jefferson; Johnson;
     * Kearney; Keith; Keya Paha; Kimball; Knox; Lancaster; Lincoln; Logan; Loup; Madison; McPherson; Merrick; Morrill;
     * Nance; Nemaha; Nuckolls; Otoe; Pawnee; Perkins; Phelps; Pierce; Platte; Polk; Red Willow; Richardson; Rock;
     * Saline; Sarpy; Saunders; Scotts Bluff; Seward; Sheridan; Sherman; Sioux; Stanton; Thayer; Thomas; Thurston;
     * Valley; Washington; Wayne; Webster; Wheeler; York
     * State law defines system in US survey feet. See CRS code 26860 for equivalent non-metric definition. Replaces
     * NAD83 / SPCS for applications with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_NEBRASKA = 'urn:ogc:def:crs:EPSG::2819';

    /**
     * NAD83(HARN) / Nebraska (ftUS)
     * Extent: USA - Nebraska - counties of Adams; Antelope; Arthur; Banner; Blaine; Boone; Box Butte; Boyd; Brown;
     * Buffalo; Burt; Butler; Cass; Cedar; Chase; Cherry; Cheyenne; Clay; Colfax; Cuming; Custer; Dakota; Dawes;
     * Dawson; Deuel; Dixon; Dodge; Douglas; Dundy; Fillmore; Franklin; Frontier; Furnas; Gage; Garden; Garfield;
     * Gosper; Grant; Greeley; Hall; Hamilton; Harlan; Hayes; Hitchcock; Holt; Hooker; Howard; Jefferson; Johnson;
     * Kearney; Keith; Keya Paha; Kimball; Knox; Lancaster; Lincoln; Logan; Loup; Madison; McPherson; Merrick; Morrill;
     * Nance; Nemaha; Nuckolls; Otoe; Pawnee; Perkins; Phelps; Pierce; Platte; Polk; Red Willow; Richardson; Rock;
     * Saline; Sarpy; Saunders; Scotts Bluff; Seward; Sheridan; Sherman; Sioux; Stanton; Thayer; Thomas; Thurston;
     * Valley; Washington; Wayne; Webster; Wheeler; York
     * State law defines use of US survey feet. Federal definition is metric - see code 2819. Replaces NAD83 / SPCS for
     * applications with an accuracy of better than 3ft. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_NEBRASKA_FTUS = 'urn:ogc:def:crs:EPSG::26860';

    /**
     * NAD83(HARN) / Nevada Central
     * Extent: USA - Nevada - counties of Lander; Nye
     * State law defines system in US survey feet. See code 3430 for equivalent non-metric definition. Replaces NAD83 /
     * SPCS for applications with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_NEVADA_CENTRAL = 'urn:ogc:def:crs:EPSG::2821';

    /**
     * NAD83(HARN) / Nevada Central (ftUS)
     * Extent: USA - Nevada - counties of Lander; Nye
     * State law defines system in US survey feet. Federal definition is metric - see code 2821. Replaces NAD83 / SPCS
     * for applications with an accuracy of better than 3 feet. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_NEVADA_CENTRAL_FTUS = 'urn:ogc:def:crs:EPSG::3430';

    /**
     * NAD83(HARN) / Nevada East
     * Extent: USA - Nevada - counties of Clark; Elko; Eureka; Lincoln; White Pine
     * State law defines system in US survey feet. See code 3429 for equivalent non-metric definition. Replaces NAD83 /
     * SPCS for applications with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_NEVADA_EAST = 'urn:ogc:def:crs:EPSG::2820';

    /**
     * NAD83(HARN) / Nevada East (ftUS)
     * Extent: USA - Nevada - counties of Clark; Elko; Eureka; Lincoln; White Pine
     * State law defines system in US survey feet. Federal definition is metric - see code 2820. Replaces NAD83 / SPCS
     * for applications with an accuracy of better than 3 feet. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_NEVADA_EAST_FTUS = 'urn:ogc:def:crs:EPSG::3429';

    /**
     * NAD83(HARN) / Nevada West
     * Extent: USA - Nevada - counties of Churchill; Douglas; Esmeralda; Humboldt; Lyon; Mineral; Pershing; Storey;
     * Washoe
     * State law defines system in US survey feet. See code 3431 for equivalent non-metric definition. Replaces NAD83 /
     * SPCS for applications with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_NEVADA_WEST = 'urn:ogc:def:crs:EPSG::2822';

    /**
     * NAD83(HARN) / Nevada West (ftUS)
     * Extent: USA - Nevada - counties of Churchill; Douglas; Esmeralda; Humboldt; Lyon; Mineral; Pershing; Storey;
     * Washoe
     * State law defines system in US survey feet. Federal definition is metric - see code 2822. Replaces NAD83 / SPCS
     * for applications with an accuracy of better than 3 feet. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_NEVADA_WEST_FTUS = 'urn:ogc:def:crs:EPSG::3431';

    /**
     * NAD83(HARN) / New Hampshire
     * Extent: USA - New Hampshire - counties of Belknap; Carroll; Cheshire; Coos; Grafton; Hillsborough; Merrimack;
     * Rockingham; Strafford; Sullivan
     * State law defines system in US survey feet. See code 3445 for equivalent non-metric definition. Replaces NAD83 /
     * SPCS for applications with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_NEW_HAMPSHIRE = 'urn:ogc:def:crs:EPSG::2823';

    /**
     * NAD83(HARN) / New Hampshire (ftUS)
     * Extent: USA - New Hampshire - counties of Belknap; Carroll; Cheshire; Coos; Grafton; Hillsborough; Merrimack;
     * Rockingham; Strafford; Sullivan
     * State law defines system in US survey feet. Federal definition is metric - see code 2823. Replaces NAD83 / SPCS
     * for applications with an accuracy of better than 3 feet. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_NEW_HAMPSHIRE_FTUS = 'urn:ogc:def:crs:EPSG::3445';

    /**
     * NAD83(HARN) / New Jersey
     * Extent: USA - New Jersey - counties of Atlantic; Bergen; Burlington; Camden; Cape May; Cumberland; Essex;
     * Gloucester; Hudson; Hunterdon; Mercer; Middlesex; Monmouth; Morris; Ocean; Passaic; Salem; Somerset; Sussex;
     * Union; Warren
     * State law defines system in US survey feet. See code 3432 for equivalent non-metric definition. Replaces NAD83 /
     * SPCS for applications with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_NEW_JERSEY = 'urn:ogc:def:crs:EPSG::2824';

    /**
     * NAD83(HARN) / New Jersey (ftUS)
     * Extent: USA - New Jersey - counties of Atlantic; Bergen; Burlington; Camden; Cape May; Cumberland; Essex;
     * Gloucester; Hudson; Hunterdon; Mercer; Middlesex; Monmouth; Morris; Ocean; Passaic; Salem; Somerset; Sussex;
     * Union; Warren
     * State law defines system in US survey feet. Federal definition is metric - see code 2824. Replaces NAD83 / SPCS
     * for applications with an accuracy of better than 3 feet. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_NEW_JERSEY_FTUS = 'urn:ogc:def:crs:EPSG::3432';

    /**
     * NAD83(HARN) / New Mexico Central
     * Extent: USA - New Mexico - counties of Bernalillo; Dona Ana; Lincoln; Los Alamos; Otero; Rio Arriba; Sandoval;
     * Santa Fe; Socorro; Taos; Torrance; Valencia
     * State law defines system in US survey feet. See code 2903 for equivalent non-metric definition. Replaces NAD83 /
     * SPCS for applications with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_NEW_MEXICO_CENTRAL = 'urn:ogc:def:crs:EPSG::2826';

    /**
     * NAD83(HARN) / New Mexico Central (ftUS)
     * Extent: USA - New Mexico - counties of Bernalillo; Dona Ana; Lincoln; Los Alamos; Otero; Rio Arriba; Sandoval;
     * Santa Fe; Socorro; Taos; Torrance; Valencia
     * State law defines system in US survey feet. Federal definition is metric - see code 2826. Replaces NAD83 / SPCS
     * for applications with an accuracy of better than 3 feet. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_NEW_MEXICO_CENTRAL_FTUS = 'urn:ogc:def:crs:EPSG::2903';

    /**
     * NAD83(HARN) / New Mexico East
     * Extent: USA - New Mexico - counties of Chaves; Colfax; Curry; De Baca; Eddy; Guadalupe; Harding; Lea; Mora;
     * Quay; Roosevelt; San Miguel; Union
     * State law defines system in US survey feet. See code 2902 for equivalent non-metric definition. Replaces NAD83 /
     * SPCS for applications with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_NEW_MEXICO_EAST = 'urn:ogc:def:crs:EPSG::2825';

    /**
     * NAD83(HARN) / New Mexico East (ftUS)
     * Extent: USA - New Mexico - counties of Chaves; Colfax; Curry; De Baca; Eddy; Guadalupe; Harding; Lea; Mora;
     * Quay; Roosevelt; San Miguel; Union
     * State law defines system in US survey feet. Federal definition is metric - see code 2825. Replaces NAD83 / SPCS
     * for applications with an accuracy of better than 3 feet. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_NEW_MEXICO_EAST_FTUS = 'urn:ogc:def:crs:EPSG::2902';

    /**
     * NAD83(HARN) / New Mexico West
     * Extent: USA - New Mexico - counties of Catron; Cibola; Grant; Hidalgo; Luna; McKinley; San Juan; Sierra
     * State law defines system in US survey feet. See code 2904 for equivalent non-metric definition. Replaces NAD83 /
     * SPCS for applications with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_NEW_MEXICO_WEST = 'urn:ogc:def:crs:EPSG::2827';

    /**
     * NAD83(HARN) / New Mexico West (ftUS)
     * Extent: USA - New Mexico - counties of Catron; Cibola; Grant; Hidalgo; Luna; McKinley; San Juan; Sierra
     * State law defines system in US survey feet. Federal definition is metric - see code 2827. Replaces NAD83 / SPCS
     * for applications with an accuracy of better than 3 feet. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_NEW_MEXICO_WEST_FTUS = 'urn:ogc:def:crs:EPSG::2904';

    /**
     * NAD83(HARN) / New York Central
     * Extent: USA - New York - counties of Broome; Cayuga; Chemung; Chenango; Cortland; Jefferson; Lewis; Madison;
     * Oneida; Onondaga; Ontario; Oswego; Schuyler; Seneca; Steuben; Tioga; Tompkins; Wayne; Yates
     * State law defines system in US survey feet. See code 2906 for equivalent non-metric definition. Replaces NAD83 /
     * SPCS for applications with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_NEW_YORK_CENTRAL = 'urn:ogc:def:crs:EPSG::2829';

    /**
     * NAD83(HARN) / New York Central (ftUS)
     * Extent: USA - New York - counties of Broome; Cayuga; Chemung; Chenango; Cortland; Jefferson; Lewis; Madison;
     * Oneida; Onondaga; Ontario; Oswego; Schuyler; Seneca; Steuben; Tioga; Tompkins; Wayne; Yates
     * State law defines system in US survey feet. Federal definition is metric - see code 2829. Replaces NAD83 / SPCS
     * for applications with an accuracy of better than 3 feet. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_NEW_YORK_CENTRAL_FTUS = 'urn:ogc:def:crs:EPSG::2906';

    /**
     * NAD83(HARN) / New York East
     * Extent: USA - New York mainland - counties of Albany; Clinton; Columbia; Delaware; Dutchess; Essex; Franklin;
     * Fulton; Greene; Hamilton; Herkimer; Montgomery; Orange; Otsego; Putnam; Rensselaer; Rockland; Saratoga;
     * Schenectady; Schoharie; St Lawrence; Sullivan; Ulster; Warren; Washington; Westchester
     * State law defines system in US survey feet. See code 2905 for equivalent non-metric definition. Replaces NAD83 /
     * SPCS for applications with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_NEW_YORK_EAST = 'urn:ogc:def:crs:EPSG::2828';

    /**
     * NAD83(HARN) / New York East (ftUS)
     * Extent: USA - New York mainland - counties of Albany; Clinton; Columbia; Delaware; Dutchess; Essex; Franklin;
     * Fulton; Greene; Hamilton; Herkimer; Montgomery; Orange; Otsego; Putnam; Rensselaer; Rockland; Saratoga;
     * Schenectady; Schoharie; St Lawrence; Sullivan; Ulster; Warren; Washington; Westchester
     * State law defines system in US survey feet. Federal definition is metric - see code 2828. Replaces NAD83 / SPCS
     * for applications with an accuracy of better than 3 feet. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_NEW_YORK_EAST_FTUS = 'urn:ogc:def:crs:EPSG::2905';

    /**
     * NAD83(HARN) / New York Long Island
     * Extent: USA - New York - counties of Bronx; Kings; Nassau; New York; Queens; Richmond; Suffolk
     * State law defines system in US survey feet. See code 2908 for equivalent non-metric definition. Replaces NAD83 /
     * SPCS for applications with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_NEW_YORK_LONG_ISLAND = 'urn:ogc:def:crs:EPSG::2831';

    /**
     * NAD83(HARN) / New York Long Island (ftUS)
     * Extent: USA - New York - counties of Bronx; Kings; Nassau; New York; Queens; Richmond; Suffolk
     * State law defines system in US survey feet. Federal definition is metric - see code 2831. Replaces NAD83 / SPCS
     * for applications with an accuracy of better than 3 feet. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_NEW_YORK_LONG_ISLAND_FTUS = 'urn:ogc:def:crs:EPSG::2908';

    /**
     * NAD83(HARN) / New York West
     * Extent: USA - New York - counties of Allegany; Cattaraugus; Chautauqua; Erie; Genesee; Livingston; Monroe;
     * Niagara; Orleans; Wyoming
     * State law defines system in US survey feet. See code 2907 for equivalent non-metric definition. Replaces NAD83 /
     * SPCS for applications with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_NEW_YORK_WEST = 'urn:ogc:def:crs:EPSG::2830';

    /**
     * NAD83(HARN) / New York West (ftUS)
     * Extent: USA - New York - counties of Allegany; Cattaraugus; Chautauqua; Erie; Genesee; Livingston; Monroe;
     * Niagara; Orleans; Wyoming
     * State law defines system in US survey feet. Federal definition is metric - see code 2830. Replaces NAD83 / SPCS
     * for applications with an accuracy of better than 3 feet. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_NEW_YORK_WEST_FTUS = 'urn:ogc:def:crs:EPSG::2907';

    /**
     * NAD83(HARN) / North Carolina
     * Extent: USA - North Carolina - counties of Alamance; Alexander; Alleghany; Anson; Ashe; Avery; Beaufort; Bertie;
     * Bladen; Brunswick; Buncombe; Burke; Cabarrus; Caldwell; Camden; Carteret; Caswell; Catawba; Chatham; Cherokee;
     * Chowan; Clay; Cleveland; Columbus; Craven; Cumberland; Currituck; Dare; Davidson; Davie; Duplin; Durham;
     * Edgecombe; Forsyth; Franklin; Gaston; Gates; Graham; Granville; Greene; Guilford; Halifax; Harnett; Haywood;
     * Henderson; Hertford; Hoke; Hyde; Iredell; Jackson; Johnston; Jones; Lee; Lenoir; Lincoln; Macon; Madison;
     * Martin; McDowell; Mecklenburg; Mitchell; Montgomery; Moore; Nash; New Hanover; Northampton; Onslow; Orange;
     * Pamlico; Pasquotank; Pender; Perquimans; Person; Pitt; Polk; Randolph; Richmond; Robeson; Rockingham; Rowan;
     * Rutherford; Sampson; Scotland; Stanly; Stokes; Surry; Swain; Transylvania; Tyrrell; Union; Vance; Wake; Warren;
     * Washington; Watauga; Wayne; Wilkes; Wilson; Yadkin; Yancey
     * State law defines system in US survey feet. See CRS code 3404 for equivalent non-metric definition. Replaces
     * NAD83 / SPCS for applications with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_NORTH_CAROLINA = 'urn:ogc:def:crs:EPSG::3358';

    /**
     * NAD83(HARN) / North Carolina (ftUS)
     * Extent: USA - North Carolina - counties of Alamance; Alexander; Alleghany; Anson; Ashe; Avery; Beaufort; Bertie;
     * Bladen; Brunswick; Buncombe; Burke; Cabarrus; Caldwell; Camden; Carteret; Caswell; Catawba; Chatham; Cherokee;
     * Chowan; Clay; Cleveland; Columbus; Craven; Cumberland; Currituck; Dare; Davidson; Davie; Duplin; Durham;
     * Edgecombe; Forsyth; Franklin; Gaston; Gates; Graham; Granville; Greene; Guilford; Halifax; Harnett; Haywood;
     * Henderson; Hertford; Hoke; Hyde; Iredell; Jackson; Johnston; Jones; Lee; Lenoir; Lincoln; Macon; Madison;
     * Martin; McDowell; Mecklenburg; Mitchell; Montgomery; Moore; Nash; New Hanover; Northampton; Onslow; Orange;
     * Pamlico; Pasquotank; Pender; Perquimans; Person; Pitt; Polk; Randolph; Richmond; Robeson; Rockingham; Rowan;
     * Rutherford; Sampson; Scotland; Stanly; Stokes; Surry; Swain; Transylvania; Tyrrell; Union; Vance; Wake; Warren;
     * Washington; Watauga; Wayne; Wilkes; Wilson; Yadkin; Yancey
     * State law defines system in US survey feet. Federal definition is metric - see CRS code 3358. Replaces NAD83 /
     * SPCS for applications with an accuracy of better than 3 feet. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_NORTH_CAROLINA_FTUS = 'urn:ogc:def:crs:EPSG::3404';

    /**
     * NAD83(HARN) / North Dakota North
     * Extent: USA - North Dakota - counties of Benson; Bottineau; Burke; Cavalier; Divide; Eddy; Foster; Grand Forks;
     * Griggs; McHenry; McKenzie; McLean; Mountrial; Nelson; Pembina; Pierce; Ramsey; Renville; Rolette; Sheridan;
     * Steele; Towner; Traill; Walsh; Ward; Wells; Williams
     * State law defines system in International feet (note: not US survey feet). See code 2909 for equivalent
     * non-metric definition. Replaces NAD83 / SPCS for applications with an accuracy of better than 1m. Replaced by
     * NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_NORTH_DAKOTA_NORTH = 'urn:ogc:def:crs:EPSG::2832';

    /**
     * NAD83(HARN) / North Dakota North (ft)
     * Extent: USA - North Dakota - counties of Benson; Bottineau; Burke; Cavalier; Divide; Eddy; Foster; Grand Forks;
     * Griggs; McHenry; McKenzie; McLean; Mountrial; Nelson; Pembina; Pierce; Ramsey; Renville; Rolette; Sheridan;
     * Steele; Towner; Traill; Walsh; Ward; Wells; Williams
     * State law defines system in International feet (note: not US survey feet). Federal definition is metric - see
     * code 2832. Replaces NAD83 / SPCS for applications with an accuracy of better than 3 feet. Replaced by
     * NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_NORTH_DAKOTA_NORTH_FT = 'urn:ogc:def:crs:EPSG::2909';

    /**
     * NAD83(HARN) / North Dakota South
     * Extent: USA - North Dakota - counties of Adams; Barnes; Billings; Bowman; Burleigh; Cass; Dickey; Dunn; Emmons;
     * Golden Valley; Grant; Hettinger; Kidder; La Moure; Logan; McIntosh; Mercer; Morton; Oliver; Ransom; Richland;
     * Sargent; Sioux; Slope; Stark; Stutsman
     * State law defines system in International feet (note: not US survey feet). See code 2910 for equivalent
     * non-metric definition. Replaces NAD83 / SPCS for applications with an accuracy of better than 1m. Replaced by
     * NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_NORTH_DAKOTA_SOUTH = 'urn:ogc:def:crs:EPSG::2833';

    /**
     * NAD83(HARN) / North Dakota South (ft)
     * Extent: USA - North Dakota - counties of Adams; Barnes; Billings; Bowman; Burleigh; Cass; Dickey; Dunn; Emmons;
     * Golden Valley; Grant; Hettinger; Kidder; La Moure; Logan; McIntosh; Mercer; Morton; Oliver; Ransom; Richland;
     * Sargent; Sioux; Slope; Stark; Stutsman
     * State law defines system in International feet (note: not US survey feet). Federal definition is metric - see
     * code 2833. Replaces NAD83 / SPCS for applications with an accuracy of better than 3 feet. Replaced by
     * NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_NORTH_DAKOTA_SOUTH_FT = 'urn:ogc:def:crs:EPSG::2910';

    /**
     * NAD83(HARN) / Ohio North
     * Extent: USA - Ohio - counties of Allen;Ashland; Ashtabula; Auglaize; Carroll; Columbiana; Coshocton; Crawford;
     * Cuyahoga; Defiance; Delaware; Erie; Fulton; Geauga; Hancock; Hardin; Harrison; Henry; Holmes; Huron; Jefferson;
     * Knox; Lake; Logan; Lorain; Lucas; Mahoning; Marion; Medina; Mercer; Morrow; Ottawa; Paulding; Portage; Putnam;
     * Richland; Sandusky; Seneca; Shelby; Stark; Summit; Trumbull; Tuscarawas; Union; Van Wert; Wayne; Williams; Wood;
     * Wyandot
     * State law defines use of US survey feet. See code 3753 for equivalent non-metric definition. Replaces NAD83 /
     * SPCS for applications with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_OHIO_NORTH = 'urn:ogc:def:crs:EPSG::2834';

    /**
     * NAD83(HARN) / Ohio North (ftUS)
     * Extent: USA - Ohio - counties of Allen;Ashland; Ashtabula; Auglaize; Carroll; Columbiana; Coshocton; Crawford;
     * Cuyahoga; Defiance; Delaware; Erie; Fulton; Geauga; Hancock; Hardin; Harrison; Henry; Holmes; Huron; Jefferson;
     * Knox; Lake; Logan; Lorain; Lucas; Mahoning; Marion; Medina; Mercer; Morrow; Ottawa; Paulding; Portage; Putnam;
     * Richland; Sandusky; Seneca; Shelby; Stark; Summit; Trumbull; Tuscarawas; Union; Van Wert; Wayne; Williams; Wood;
     * Wyandot
     * State law defines use of US survey feet. Federal definition is metric - see code 2834. Replaces NAD83 / SPCS for
     * applications with an accuracy of better than 3 feet. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_OHIO_NORTH_FTUS = 'urn:ogc:def:crs:EPSG::3753';

    /**
     * NAD83(HARN) / Ohio South
     * Extent: USA - Ohio - counties of Adams; Athens; Belmont; Brown; Butler; Champaign; Clark; Clermont; Clinton;
     * Darke; Fairfield; Fayette; Franklin; Gallia; Greene; Guernsey; Hamilton; Highland; Hocking; Jackson; Lawrence;
     * Licking; Madison; Meigs; Miami; Monroe; Montgomery; Morgan; Muskingum; Noble; Perry; Pickaway; Pike; Preble;
     * Ross; Scioto; Vinton; Warren; Washington
     * State law defines use of US survey feet. See code 3754 for equivalent non-metric definition. Replaces NAD83 /
     * SPCS for applications with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_OHIO_SOUTH = 'urn:ogc:def:crs:EPSG::2835';

    /**
     * NAD83(HARN) / Ohio South (ftUS)
     * Extent: USA - Ohio - counties of Adams; Athens; Belmont; Brown; Butler; Champaign; Clark; Clermont; Clinton;
     * Darke; Fairfield; Fayette; Franklin; Gallia; Greene; Guernsey; Hamilton; Highland; Hocking; Jackson; Lawrence;
     * Licking; Madison; Meigs; Miami; Monroe; Montgomery; Morgan; Muskingum; Noble; Perry; Pickaway; Pike; Preble;
     * Ross; Scioto; Vinton; Warren; Washington
     * State law defines use of US survey feet. Federal definition is metric - see code 2835. Replaces NAD83 / SPCS for
     * applications with an accuracy of better than 3 feet. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_OHIO_SOUTH_FTUS = 'urn:ogc:def:crs:EPSG::3754';

    /**
     * NAD83(HARN) / Oklahoma North
     * Extent: USA - Oklahoma - counties of Adair; Alfalfa; Beaver; Blaine; Canadian; Cherokee; Cimarron; Craig; Creek;
     * Custer; Delaware; Dewey; Ellis; Garfield; Grant; Harper; Kay; Kingfisher; Lincoln; Logan; Major; Mayes;
     * Muskogee; Noble; Nowata; Okfuskee; Oklahoma; Okmulgee; Osage; Ottawa; Pawnee; Payne; Roger Mills; Rogers;
     * Sequoyah; Texas; Tulsa; Wagoner; Washington; Woods; Woodward
     * State law defines system in US survey feet. See code 2911 for equivalent non-metric definition. Replaces NAD83 /
     * SPCS for applications with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_OKLAHOMA_NORTH = 'urn:ogc:def:crs:EPSG::2836';

    /**
     * NAD83(HARN) / Oklahoma North (ftUS)
     * Extent: USA - Oklahoma - counties of Adair; Alfalfa; Beaver; Blaine; Canadian; Cherokee; Cimarron; Craig; Creek;
     * Custer; Delaware; Dewey; Ellis; Garfield; Grant; Harper; Kay; Kingfisher; Lincoln; Logan; Major; Mayes;
     * Muskogee; Noble; Nowata; Okfuskee; Oklahoma; Okmulgee; Osage; Ottawa; Pawnee; Payne; Roger Mills; Rogers;
     * Sequoyah; Texas; Tulsa; Wagoner; Washington; Woods; Woodward
     * State law defines system in US survey feet. Federal definition is metric - see code 2836. Replaces NAD83 / SPCS
     * for applications with an accuracy of better than 3 feet. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_OKLAHOMA_NORTH_FTUS = 'urn:ogc:def:crs:EPSG::2911';

    /**
     * NAD83(HARN) / Oklahoma South
     * Extent: USA - Oklahoma - counties of Atoka; Beckham; Bryan; Caddo; Carter; Choctaw; Cleveland; Coal; Comanche;
     * Cotton; Garvin; Grady; Greer; Harmon; Haskell; Hughes; Jackson; Jefferson; Johnston; Kiowa; Latimer; Le Flore;
     * Love; Marshall; McClain; McCurtain; McIntosh; Murray; Pittsburg; Pontotoc; Pottawatomie; Pushmataha; Seminole;
     * Stephens; Tillman; Washita
     * State law defines system in US survey feet. See code 2912 for equivalent non-metric definition. Replaces NAD83 /
     * SPCS for applications with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_OKLAHOMA_SOUTH = 'urn:ogc:def:crs:EPSG::2837';

    /**
     * NAD83(HARN) / Oklahoma South (ftUS)
     * Extent: USA - Oklahoma - counties of Atoka; Beckham; Bryan; Caddo; Carter; Choctaw; Cleveland; Coal; Comanche;
     * Cotton; Garvin; Grady; Greer; Harmon; Haskell; Hughes; Jackson; Jefferson; Johnston; Kiowa; Latimer; Le Flore;
     * Love; Marshall; McClain; McCurtain; McIntosh; Murray; Pittsburg; Pontotoc; Pottawatomie; Pushmataha; Seminole;
     * Stephens; Tillman; Washita
     * State law defines system in US survey feet. Federal definition is metric - see code 2837. Replaces NAD83 / SPCS
     * for applications with an accuracy of better than 3 feet. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_OKLAHOMA_SOUTH_FTUS = 'urn:ogc:def:crs:EPSG::2912';

    /**
     * NAD83(HARN) / Oregon GIC Lambert (ft)
     * Extent: USA - Oregon
     * State law defines use of International feet (note: not US survey feet). Replaces NAD83 / Oregon GIC Lambert (ft)
     * (CRS code 2992) for applications with an accuracy of better than 3 feet. Replaced by NAD83(NSRS2007) / Oregon
     * GIC Lambert (ft) (code 3644).
     */
    public const EPSG_NAD83_HARN_OREGON_GIC_LAMBERT_FT = 'urn:ogc:def:crs:EPSG::2994';

    /**
     * NAD83(HARN) / Oregon LCC (m)
     * Extent: USA - Oregon
     * See CRS code 2994 for non-metric definition used by state agencies. Replaces NAD83 / Oregon LCC (m) (CRS code
     * 2991) for applications with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) / Oregon LCC (m) (CRS
     * code 3643).
     */
    public const EPSG_NAD83_HARN_OREGON_LCC_M = 'urn:ogc:def:crs:EPSG::2993';

    /**
     * NAD83(HARN) / Oregon North
     * Extent: USA - Oregon - counties of Baker; Benton; Clackamas; Clatsop; Columbia; Gilliam; Grant; Hood River;
     * Jefferson; Lincoln; Linn; Marion; Morrow; Multnomah; Polk; Sherman; Tillamook; Umatilla; Union; Wallowa; Wasco;
     * Washington; Wheeler; Yamhill
     * State law defines system in International feet (note: not US survey feet). See code 2913 for equivalent
     * non-metric definition. Replaces NAD83 / SPCS for applications with an accuracy of better than 1m. Replaced by
     * NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_OREGON_NORTH = 'urn:ogc:def:crs:EPSG::2838';

    /**
     * NAD83(HARN) / Oregon North (ft)
     * Extent: USA - Oregon - counties of Baker; Benton; Clackamas; Clatsop; Columbia; Gilliam; Grant; Hood River;
     * Jefferson; Lincoln; Linn; Marion; Morrow; Multnomah; Polk; Sherman; Tillamook; Umatilla; Union; Wallowa; Wasco;
     * Washington; Wheeler; Yamhill
     * State law defines system in International feet (note: not US survey feet). Federal definition is metric - see
     * code 2838. Replaces NAD83 / SPCS for applications with an accuracy of better than 3 ft. Replaced by
     * NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_OREGON_NORTH_FT = 'urn:ogc:def:crs:EPSG::2913';

    /**
     * NAD83(HARN) / Oregon South
     * Extent: USA - Oregon - counties of Coos; Crook; Curry; Deschutes; Douglas; Harney; Jackson; Josephine; Klamath;
     * Lake; Lane; Malheur
     * State law defines system in International feet (note: not US survey feet). See code 2914 for equivalent
     * non-metric definition. Replaces NAD83 / SPCS for applications with an accuracy of better than 1m. Replaced by
     * NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_OREGON_SOUTH = 'urn:ogc:def:crs:EPSG::2839';

    /**
     * NAD83(HARN) / Oregon South (ft)
     * Extent: USA - Oregon - counties of Coos; Crook; Curry; Deschutes; Douglas; Harney; Jackson; Josephine; Klamath;
     * Lake; Lane; Malheur
     * State law defines system in International feet (note: not US survey feet). Federal definition is metric - see
     * code 2839. Replaces NAD83 / SPCS for applications with an accuracy of better than 3 ft. Replaced by
     * NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_OREGON_SOUTH_FT = 'urn:ogc:def:crs:EPSG::2914';

    /**
     * NAD83(HARN) / Pennsylvania North
     * Extent: USA - Pennsylvania - counties of Bradford; Cameron; Carbon; Centre; Clarion; Clearfield; Clinton;
     * Columbia; Crawford; Elk; Erie; Forest; Jefferson; Lackawanna; Luzerne; Lycoming; McKean; Mercer; Monroe;
     * Montour; Northumberland; Pike; Potter; Sullivan; Susquehanna; Tioga; Union; Venango; Warren; Wayne; Wyoming
     * State law defines system in US survey feet. See code 3363 for equivalent non-metric definition. Replaces NAD83 /
     * SPCS for applications with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_PENNSYLVANIA_NORTH = 'urn:ogc:def:crs:EPSG::3362';

    /**
     * NAD83(HARN) / Pennsylvania North (ftUS)
     * Extent: USA - Pennsylvania - counties of Bradford; Cameron; Carbon; Centre; Clarion; Clearfield; Clinton;
     * Columbia; Crawford; Elk; Erie; Forest; Jefferson; Lackawanna; Luzerne; Lycoming; McKean; Mercer; Monroe;
     * Montour; Northumberland; Pike; Potter; Sullivan; Susquehanna; Tioga; Union; Venango; Warren; Wayne; Wyoming
     * State law defines system in US survey feet. Federal definition is metric - see code 3362. Replaces NAD83 / SPCS
     * for applications with an accuracy of better than 3 feet. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_PENNSYLVANIA_NORTH_FTUS = 'urn:ogc:def:crs:EPSG::3363';

    /**
     * NAD83(HARN) / Pennsylvania South
     * Extent: USA - Pennsylvania - counties of Adams; Allegheny; Armstrong; Beaver; Bedford; Berks; Blair; Bucks;
     * Butler; Cambria; Chester; Cumberland; Dauphin; Delaware; Fayette; Franklin; Fulton; Greene; Huntingdon; Indiana;
     * Juniata; Lancaster; Lawrence; Lebanon; Lehigh; Mifflin; Montgomery; Northampton; Perry; Philadelphia;
     * Schuylkill; Snyder; Somerset; Washington; Westmoreland; York
     * State law defines system in US survey feet. See code 3365 for equivalent non-metric definition. Replaces NAD83 /
     * SPCS for applications with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_PENNSYLVANIA_SOUTH = 'urn:ogc:def:crs:EPSG::3364';

    /**
     * NAD83(HARN) / Pennsylvania South (ftUS)
     * Extent: USA - Pennsylvania - counties of Adams; Allegheny; Armstrong; Beaver; Bedford; Berks; Blair; Bucks;
     * Butler; Cambria; Chester; Cumberland; Dauphin; Delaware; Fayette; Franklin; Fulton; Greene; Huntingdon; Indiana;
     * Juniata; Lancaster; Lawrence; Lebanon; Lehigh; Mifflin; Montgomery; Northampton; Perry; Philadelphia;
     * Schuylkill; Snyder; Somerset; Washington; Westmoreland; York
     * State law defines system in US survey feet. Federal definition is metric - see code 3364. Replaces NAD83 / SPCS
     * for applications with an accuracy of better than 3 feet. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_PENNSYLVANIA_SOUTH_FTUS = 'urn:ogc:def:crs:EPSG::3365';

    /**
     * NAD83(HARN) / Puerto Rico and Virgin Is.
     * Extent: Puerto Rico and US Virgin Islands - onshore
     * Replaces NAD83 / SPCS (CRS code 32161) for applications with an accuracy of better than 1m. Replaced by
     * NAD83(NSRS2007) / SPCS (CRS code 4437).
     */
    public const EPSG_NAD83_HARN_PUERTO_RICO_AND_VIRGIN_IS = 'urn:ogc:def:crs:EPSG::2866';

    /**
     * NAD83(HARN) / Rhode Island
     * Extent: USA - Rhode Island - counties of Bristol; Kent; Newport; Providence; Washington
     * State law defines system in US survey feet. See code 3446 for equivalent non-metric definition. Replaces NAD83 /
     * SPCS for applications with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_RHODE_ISLAND = 'urn:ogc:def:crs:EPSG::2840';

    /**
     * NAD83(HARN) / Rhode Island (ftUS)
     * Extent: USA - Rhode Island - counties of Bristol; Kent; Newport; Providence; Washington
     * State law defines system in US survey feet. Federal definition is metric - see code 2840. Replaces NAD83 / SPCS
     * for applications with an accuracy of better than 3 feet. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_RHODE_ISLAND_FTUS = 'urn:ogc:def:crs:EPSG::3446';

    /**
     * NAD83(HARN) / South Carolina
     * Extent: USA - South Carolina - counties of Abbeville; Aiken; Allendale; Anderson; Bamberg; Barnwell; Beaufort;
     * Berkeley; Calhoun; Charleston; Cherokee; Chester; Chesterfield; Clarendon; Colleton; Darlington; Dillon;
     * Dorchester; Edgefield; Fairfield; Florence; Georgetown; Greenville; Greenwood; Hampton; Horry; Jasper; Kershaw;
     * Lancaster; Laurens; Lee; Lexington; Marion; Marlboro; McCormick; Newberry; Oconee; Orangeburg; Pickens;
     * Richland; Saluda; Spartanburg; Sumter; Union; Williamsburg; York
     * State law defines system in International feet (note: not US survey feet). See code 3361 for equivalent
     * non-metric definition. Replaces NAD83 / SPCS for applications with an accuracy of better than 1m. Replaced by
     * NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_SOUTH_CAROLINA = 'urn:ogc:def:crs:EPSG::3360';

    /**
     * NAD83(HARN) / South Carolina (ft)
     * Extent: USA - South Carolina - counties of Abbeville; Aiken; Allendale; Anderson; Bamberg; Barnwell; Beaufort;
     * Berkeley; Calhoun; Charleston; Cherokee; Chester; Chesterfield; Clarendon; Colleton; Darlington; Dillon;
     * Dorchester; Edgefield; Fairfield; Florence; Georgetown; Greenville; Greenwood; Hampton; Horry; Jasper; Kershaw;
     * Lancaster; Laurens; Lee; Lexington; Marion; Marlboro; McCormick; Newberry; Oconee; Orangeburg; Pickens;
     * Richland; Saluda; Spartanburg; Sumter; Union; Williamsburg; York
     * State law defines system in International feet (note: not US survey feet). Federal definition is metric - see
     * code 3360. Replaces NAD83 / SPCS for applications with an accuracy of better than 3 feet. Replaced by
     * NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_SOUTH_CAROLINA_FT = 'urn:ogc:def:crs:EPSG::3361';

    /**
     * NAD83(HARN) / South Dakota North
     * Extent: USA - South Dakota - counties of Beadle; Brookings; Brown; Butte; Campbell; Clark; Codington; Corson;
     * Day; Deuel; Dewey; Edmunds; Faulk; Grant; Hamlin; Hand; Harding; Hyde; Kingsbury; Lawrence; Marshall; McPherson;
     * Meade; Perkins; Potter; Roberts; Spink; Sully; Walworth; Ziebach
     * State law defines system in US survey feet. See code 3458 for equivalent non-metric definition. Replaces NAD83 /
     * SPCS for applications with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_SOUTH_DAKOTA_NORTH = 'urn:ogc:def:crs:EPSG::2841';

    /**
     * NAD83(HARN) / South Dakota North (ftUS)
     * Extent: USA - South Dakota - counties of Beadle; Brookings; Brown; Butte; Campbell; Clark; Codington; Corson;
     * Day; Deuel; Dewey; Edmunds; Faulk; Grant; Hamlin; Hand; Harding; Hyde; Kingsbury; Lawrence; Marshall; McPherson;
     * Meade; Perkins; Potter; Roberts; Spink; Sully; Walworth; Ziebach
     * State law defines system in US survey feet. Federal definition is metric - see code 2841. Replaces NAD83 / SPCS
     * for applications with an accuracy of better than 3 feet. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_SOUTH_DAKOTA_NORTH_FTUS = 'urn:ogc:def:crs:EPSG::3458';

    /**
     * NAD83(HARN) / South Dakota South
     * Extent: USA - South Dakota - counties of Aurora; Bennett; Bon Homme; Brule; Buffalo; Charles Mix; Clay; Custer;
     * Davison; Douglas; Fall River; Gregory; Haakon; Hanson; Hughes; Hutchinson; Jackson; Jerauld; Jones; Lake;
     * Lincoln; Lyman; McCook; Mellette; Miner; Minnehaha; Moody; Pennington; Sanborn; Shannon; Stanley; Todd; Tripp;
     * Turner; Union; Yankton
     * State law defines system in US survey feet. See code 3459 for equivalent non-metric definition. Replaces NAD83 /
     * SPCS for applications with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_SOUTH_DAKOTA_SOUTH = 'urn:ogc:def:crs:EPSG::2842';

    /**
     * NAD83(HARN) / South Dakota South (ftUS)
     * Extent: USA - South Dakota - counties of Aurora; Bennett; Bon Homme; Brule; Buffalo; Charles Mix; Clay; Custer;
     * Davison; Douglas; Fall River; Gregory; Haakon; Hanson; Hughes; Hutchinson; Jackson; Jerauld; Jones; Lake;
     * Lincoln; Lyman; McCook; Mellette; Miner; Minnehaha; Moody; Pennington; Sanborn; Shannon; Stanley; Todd; Tripp;
     * Turner; Union; Yankton
     * State law defines system in US survey feet. Federal definition is metric - see code 2842. Replaces NAD83 / SPCS
     * for applications with an accuracy of better than 3 feet. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_SOUTH_DAKOTA_SOUTH_FTUS = 'urn:ogc:def:crs:EPSG::3459';

    /**
     * NAD83(HARN) / Tennessee
     * Extent: USA - Tennessee - counties of Anderson; Bedford; Benton; Bledsoe; Blount; Bradley; Campbell; Cannon;
     * Carroll; Carter; Cheatham; Chester; Claiborne; Clay; Cocke; Coffee; Crockett; Cumberland; Davidson; De Kalb;
     * Decatur; Dickson; Dyer; Fayette; Fentress; Franklin; Gibson; Giles; Grainger; Greene; Grundy; Hamblen; Hamilton;
     * Hancock; Hardeman; Hardin; Hawkins; Haywood; Henderson; Henry; Hickman; Houston; Humphreys; Jackson; Jefferson;
     * Johnson; Knox; Lake; Lauderdale; Lawrence; Lewis; Lincoln; Loudon; Macon; Madison; Marion; Marshall; Maury;
     * McMinn; McNairy; Meigs; Monroe; Montgomery; Moore; Morgan; Obion; Overton; Perry; Pickett; Polk; Putnam; Rhea;
     * Roane; Robertson; Rutherford; Scott; Sequatchie; Sevier; Shelby; Smith; Stewart; Sullivan; Sumner; Tipton;
     * Trousdale; Unicoi; Union; Van Buren; Warren; Washington; Wayne; Weakley; White; Williamson; Wilson
     * State law defines system in US survey feet. See code 2915 for equivalent non-metric definition. Replaces NAD83 /
     * SPCS for applications with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_TENNESSEE = 'urn:ogc:def:crs:EPSG::2843';

    /**
     * NAD83(HARN) / Tennessee (ftUS)
     * Extent: USA - Tennessee - counties of Anderson; Bedford; Benton; Bledsoe; Blount; Bradley; Campbell; Cannon;
     * Carroll; Carter; Cheatham; Chester; Claiborne; Clay; Cocke; Coffee; Crockett; Cumberland; Davidson; De Kalb;
     * Decatur; Dickson; Dyer; Fayette; Fentress; Franklin; Gibson; Giles; Grainger; Greene; Grundy; Hamblen; Hamilton;
     * Hancock; Hardeman; Hardin; Hawkins; Haywood; Henderson; Henry; Hickman; Houston; Humphreys; Jackson; Jefferson;
     * Johnson; Knox; Lake; Lauderdale; Lawrence; Lewis; Lincoln; Loudon; Macon; Madison; Marion; Marshall; Maury;
     * McMinn; McNairy; Meigs; Monroe; Montgomery; Moore; Morgan; Obion; Overton; Perry; Pickett; Polk; Putnam; Rhea;
     * Roane; Robertson; Rutherford; Scott; Sequatchie; Sevier; Shelby; Smith; Stewart; Sullivan; Sumner; Tipton;
     * Trousdale; Unicoi; Union; Van Buren; Warren; Washington; Wayne; Weakley; White; Williamson; Wilson
     * State law defines system in US survey feet. Federal definition is metric - see code 2843. Replaces NAD83 / SPCS
     * for applications with an accuracy of better than 3 feet. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_TENNESSEE_FTUS = 'urn:ogc:def:crs:EPSG::2915';

    /**
     * NAD83(HARN) / Texas Central
     * Extent: USA - Texas - counties of Anderson; Angelina; Bastrop; Bell; Blanco; Bosque; Brazos; Brown; Burleson;
     * Burnet; Cherokee; Coke; Coleman; Comanche; Concho; Coryell; Crane; Crockett; Culberson; Ector; El Paso; Falls;
     * Freestone; Gillespie; Glasscock; Grimes; Hamilton; Hardin; Houston; Hudspeth; Irion; Jasper; Jeff Davis; Kimble;
     * Lampasas; Lee; Leon; Liberty; Limestone; Llano; Loving; Madison; Mason; McCulloch; McLennan; Menard; Midland;
     * Milam; Mills; Montgomery; Nacogdoches; Newton; Orange; Pecos; Polk; Reagan; Reeves; Robertson; Runnels; Sabine;
     * San Augustine; San Jacinto; San Saba; Schleicher; Shelby; Sterling; Sutton; Tom Green; Travis; Trinity; Tyler;
     * Upton; Walker; Ward; Washington; Williamson; Winkler
     * State law defines system in US survey feet. See code 2918 for equivalent non-metric definition. Replaces NAD83 /
     * SPCS for applications with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_TEXAS_CENTRAL = 'urn:ogc:def:crs:EPSG::2846';

    /**
     * NAD83(HARN) / Texas Central (ftUS)
     * Extent: USA - Texas - counties of Anderson; Angelina; Bastrop; Bell; Blanco; Bosque; Brazos; Brown; Burleson;
     * Burnet; Cherokee; Coke; Coleman; Comanche; Concho; Coryell; Crane; Crockett; Culberson; Ector; El Paso; Falls;
     * Freestone; Gillespie; Glasscock; Grimes; Hamilton; Hardin; Houston; Hudspeth; Irion; Jasper; Jeff Davis; Kimble;
     * Lampasas; Lee; Leon; Liberty; Limestone; Llano; Loving; Madison; Mason; McCulloch; McLennan; Menard; Midland;
     * Milam; Mills; Montgomery; Nacogdoches; Newton; Orange; Pecos; Polk; Reagan; Reeves; Robertson; Runnels; Sabine;
     * San Augustine; San Jacinto; San Saba; Schleicher; Shelby; Sterling; Sutton; Tom Green; Travis; Trinity; Tyler;
     * Upton; Walker; Ward; Washington; Williamson; Winkler
     * State law defines system in US survey feet. Federal definition is metric - see code 2846. Replaces NAD83 / SPCS
     * for applications with an accuracy of better than 3 feet. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_TEXAS_CENTRAL_FTUS = 'urn:ogc:def:crs:EPSG::2918';

    /**
     * NAD83(HARN) / Texas Centric Albers Equal Area
     * Extent: USA - Texas
     * Replaces NAD83 / TX Albers (code 3083) for applications with an accuracy of better than 1m. Replaced by
     * NAD83(NSRS2007) / TX Albers (code 3665). For state-wide spatial data presentation requiring shape preservation
     * use NAD83(HARN) / TX LC (code 3084).
     */
    public const EPSG_NAD83_HARN_TEXAS_CENTRIC_ALBERS_EQUAL_AREA = 'urn:ogc:def:crs:EPSG::3085';

    /**
     * NAD83(HARN) / Texas Centric Lambert Conformal
     * Extent: USA - Texas
     * Replaces NAD83 / TX LC (code 3082) for applications with an accuracy of better than 1m. Replaced by
     * NAD83(NSRS2007) / TX  LC (code 3666). For state-wide spatial data presentation requiring true area measurements
     * use NAD83(HARN) / TX Albers (code 3085).
     */
    public const EPSG_NAD83_HARN_TEXAS_CENTRIC_LAMBERT_CONFORMAL = 'urn:ogc:def:crs:EPSG::3084';

    /**
     * NAD83(HARN) / Texas North
     * Extent: USA - Texas - counties of: Armstrong; Briscoe; Carson; Castro; Childress; Collingsworth; Dallam; Deaf
     * Smith; Donley; Gray; Hall; Hansford; Hartley; Hemphill; Hutchinson; Lipscomb; Moore; Ochiltree; Oldham; Parmer;
     * Potter; Randall; Roberts; Sherman; Swisher; Wheeler
     * State law defines system in US survey feet. See code 2916 for equivalent non-metric definition. Replaces NAD83 /
     * SPCS for applications with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_TEXAS_NORTH = 'urn:ogc:def:crs:EPSG::2844';

    /**
     * NAD83(HARN) / Texas North (ftUS)
     * Extent: USA - Texas - counties of: Armstrong; Briscoe; Carson; Castro; Childress; Collingsworth; Dallam; Deaf
     * Smith; Donley; Gray; Hall; Hansford; Hartley; Hemphill; Hutchinson; Lipscomb; Moore; Ochiltree; Oldham; Parmer;
     * Potter; Randall; Roberts; Sherman; Swisher; Wheeler
     * State law defines system in US survey feet. Federal definition is metric - see code 2844. Replaces NAD83 / SPCS
     * for applications with an accuracy of better than 3 feet. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_TEXAS_NORTH_FTUS = 'urn:ogc:def:crs:EPSG::2916';

    /**
     * NAD83(HARN) / Texas North Central
     * Extent: USA - Texas - counties of: Andrews; Archer; Bailey; Baylor; Borden; Bowie; Callahan; Camp; Cass; Clay;
     * Cochran; Collin; Cooke; Cottle; Crosby; Dallas; Dawson; Delta; Denton; Dickens; Eastland; Ellis; Erath; Fannin;
     * Fisher; Floyd; Foard; Franklin; Gaines; Garza; Grayson; Gregg; Hale; Hardeman; Harrison; Haskell; Henderson;
     * Hill; Hockley; Hood; Hopkins; Howard; Hunt; Jack; Johnson; Jones; Kaufman; Kent; King; Knox; Lamar; Lamb;
     * Lubbock; Lynn; Marion; Martin; Mitchell; Montague; Morris; Motley; Navarro; Nolan; Palo Pinto; Panola; Parker;
     * Rains; Red River; Rockwall; Rusk; Scurry; Shackelford; Smith; Somervell; Stephens; Stonewall; Tarrant; Taylor;
     * Terry; Throckmorton; Titus; Upshur; Van Zandt; Wichita; Wilbarger; Wise; Wood; Yoakum; Young
     * State law defines system in US survey feet. See code 2917 for equivalent non-metric definition. Replaces NAD83 /
     * SPCS for applications with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_TEXAS_NORTH_CENTRAL = 'urn:ogc:def:crs:EPSG::2845';

    /**
     * NAD83(HARN) / Texas North Central (ftUS)
     * Extent: USA - Texas - counties of: Andrews; Archer; Bailey; Baylor; Borden; Bowie; Callahan; Camp; Cass; Clay;
     * Cochran; Collin; Cooke; Cottle; Crosby; Dallas; Dawson; Delta; Denton; Dickens; Eastland; Ellis; Erath; Fannin;
     * Fisher; Floyd; Foard; Franklin; Gaines; Garza; Grayson; Gregg; Hale; Hardeman; Harrison; Haskell; Henderson;
     * Hill; Hockley; Hood; Hopkins; Howard; Hunt; Jack; Johnson; Jones; Kaufman; Kent; King; Knox; Lamar; Lamb;
     * Lubbock; Lynn; Marion; Martin; Mitchell; Montague; Morris; Motley; Navarro; Nolan; Palo Pinto; Panola; Parker;
     * Rains; Red River; Rockwall; Rusk; Scurry; Shackelford; Smith; Somervell; Stephens; Stonewall; Tarrant; Taylor;
     * Terry; Throckmorton; Titus; Upshur; Van Zandt; Wichita; Wilbarger; Wise; Wood; Yoakum; Young
     * State law defines system in US survey feet. Federal definition is metric - see code 2845. Replaces NAD83 / SPCS
     * for applications with an accuracy of better than 3 feet. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_TEXAS_NORTH_CENTRAL_FTUS = 'urn:ogc:def:crs:EPSG::2917';

    /**
     * NAD83(HARN) / Texas South
     * Extent: USA - Texas - counties of Brooks; Cameron; Duval; Hidalgo; Jim Hogg; Jim Wells; Kenedy; Kleberg; Nueces;
     * San Patricio; Starr; Webb; Willacy; Zapata
     * State law defines system in US survey feet. See code 2920 for equivalent non-metric definition. Replaces NAD83 /
     * SPCS for applications with an accuracy of better than 1m. Not applicable to offshore areas. Replaced by
     * NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_TEXAS_SOUTH = 'urn:ogc:def:crs:EPSG::2848';

    /**
     * NAD83(HARN) / Texas South (ftUS)
     * Extent: USA - Texas - counties of Brooks; Cameron; Duval; Hidalgo; Jim Hogg; Jim Wells; Kenedy; Kleberg; Nueces;
     * San Patricio; Starr; Webb; Willacy; Zapata
     * State law defines system in US survey feet. Federal definition is metric - see code 2848. Replaces NAD83 / SPCS
     * for applications with an accuracy of better than 3 feet. Not applicable to offshore areas. Replaced by
     * NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_TEXAS_SOUTH_FTUS = 'urn:ogc:def:crs:EPSG::2920';

    /**
     * NAD83(HARN) / Texas South Central
     * Extent: USA - Texas - counties of Aransas; Atascosa; Austin; Bandera; Bee; Bexar; Brazoria; Brewster; Caldwell;
     * Calhoun; Chambers; Colorado; Comal; De Witt; Dimmit; Edwards; Fayette; Fort Bend; Frio; Galveston; Goliad;
     * Gonzales; Guadalupe; Harris; Hays; Jackson; Jefferson; Karnes; Kendall; Kerr; Kinney; La Salle; Lavaca; Live
     * Oak; Matagorda; Maverick; McMullen; Medina; Presidio; Real; Refugio; Terrell; Uvalde; Val Verde; Victoria;
     * Waller; Wharton; Wilson; Zavala
     * State law defines system in US survey feet. See code 2919 for equivalent non-metric definition. Replaces NAD83 /
     * SPCS for applications with an accuracy of better than 1m. Not applicable to offshore areas. Replaced by
     * NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_TEXAS_SOUTH_CENTRAL = 'urn:ogc:def:crs:EPSG::2847';

    /**
     * NAD83(HARN) / Texas South Central (ftUS)
     * Extent: USA - Texas - counties of Aransas; Atascosa; Austin; Bandera; Bee; Bexar; Brazoria; Brewster; Caldwell;
     * Calhoun; Chambers; Colorado; Comal; De Witt; Dimmit; Edwards; Fayette; Fort Bend; Frio; Galveston; Goliad;
     * Gonzales; Guadalupe; Harris; Hays; Jackson; Jefferson; Karnes; Kendall; Kerr; Kinney; La Salle; Lavaca; Live
     * Oak; Matagorda; Maverick; McMullen; Medina; Presidio; Real; Refugio; Terrell; Uvalde; Val Verde; Victoria;
     * Waller; Wharton; Wilson; Zavala
     * State law defines system in US survey feet. Federal definition is metric - see code 2847. Replaces NAD83 / SPCS
     * for applications with an accuracy of better than 3 feet. Not applicable to offshore areas. Replaced by
     * NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_TEXAS_SOUTH_CENTRAL_FTUS = 'urn:ogc:def:crs:EPSG::2919';

    /**
     * NAD83(HARN) / UTM zone 10N
     * Extent: USA - between 126°W and 120°W - onshore - California; Oregon; Washington
     * Replaces NAD83 / UTM zone 10N for applications with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) /
     * UTM zone 10N.
     */
    public const EPSG_NAD83_HARN_UTM_ZONE_10N = 'urn:ogc:def:crs:EPSG::3740';

    /**
     * NAD83(HARN) / UTM zone 11N
     * Extent: USA - between 120°W and 114°W - onshore - Arizona; California; Idaho; Montana; Nevada; Oregon; Utah;
     * Washington
     * Replaces NAD83 / UTM zone 11N for applications with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) /
     * UTM zone 11N.
     */
    public const EPSG_NAD83_HARN_UTM_ZONE_11N = 'urn:ogc:def:crs:EPSG::3741';

    /**
     * NAD83(HARN) / UTM zone 12N
     * Extent: USA - between 114°W and 108°W - Arizona; Colorado; Idaho; Montana; New Mexico; Utah; Wyoming
     * Replaces NAD83 / UTM zone 12N for applications with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) /
     * UTM zone 12N.
     */
    public const EPSG_NAD83_HARN_UTM_ZONE_12N = 'urn:ogc:def:crs:EPSG::3742';

    /**
     * NAD83(HARN) / UTM zone 13N
     * Extent: USA - between 108°W and 102°W - Colorado; Montana; Nebraska; New Mexico; North Dakota; Oklahoma; South
     * Dakota; Texas; Wyoming
     * Replaces NAD83 / UTM zone 13N for applications with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) /
     * UTM zone 13N.
     */
    public const EPSG_NAD83_HARN_UTM_ZONE_13N = 'urn:ogc:def:crs:EPSG::3743';

    /**
     * NAD83(HARN) / UTM zone 14N
     * Extent: USA - between 102°W and 96°W - onshore - Iowa; Kansas; Minnesota; Nebraska; North Dakota; Oklahoma;
     * South Dakota; Texas
     * Replaces NAD83 / UTM zone 14N for applications with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) /
     * UTM zone 14N.
     */
    public const EPSG_NAD83_HARN_UTM_ZONE_14N = 'urn:ogc:def:crs:EPSG::3744';

    /**
     * NAD83(HARN) / UTM zone 15N
     * Extent: USA - between 96°W and 90°W - onshore - Arkansas; Illinois; Iowa; Kansas; Louisiana; Michigan;
     * Minnesota; Mississippi; Missouri; Nebraska; Oklahoma; Tennessee; Texas; Wisconsin
     * Replaces NAD83 / UTM zone 15N for applications with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) /
     * UTM zone 15N.
     */
    public const EPSG_NAD83_HARN_UTM_ZONE_15N = 'urn:ogc:def:crs:EPSG::3745';

    /**
     * NAD83(HARN) / UTM zone 16N
     * Extent: USA - between 90°W and 84°W - onshore - Alabama; Arkansas; Florida; Georgia; Indiana; Illinois;
     * Kentucky; Louisiana; Michigan; Minnesota; Mississippi; Missouri; North Carolina; Ohio; Tennessee; Wisconsin
     * Replaces NAD83 / UTM zone 16N for applications with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) /
     * UTM zone 16N.
     */
    public const EPSG_NAD83_HARN_UTM_ZONE_16N = 'urn:ogc:def:crs:EPSG::3746';

    /**
     * NAD83(HARN) / UTM zone 17N
     * Extent: USA - between 84°W and 78°W - onshore - Florida; Georgia; Maryland; Michigan; New York; North
     * Carolina; Ohio; Pennsylvania; South Carolina; Tennessee; Virginia; West Virginia
     * Replaces NAD83 / UTM zone 17N for applications with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) /
     * UTM zone 17N.
     */
    public const EPSG_NAD83_HARN_UTM_ZONE_17N = 'urn:ogc:def:crs:EPSG::3747';

    /**
     * NAD83(HARN) / UTM zone 18N
     * Extent: USA - between 78°W and 72°W - onshore - Connecticut; Delaware; Maryland; Massachusetts; New Hampshire;
     * New Jersey; New York; North Carolina; Pennsylvania; Virginia; Vermont
     * Replaces NAD83 / UTM zone 18N for applications with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) /
     * UTM zone 18N.
     */
    public const EPSG_NAD83_HARN_UTM_ZONE_18N = 'urn:ogc:def:crs:EPSG::3748';

    /**
     * NAD83(HARN) / UTM zone 19N
     * Extent: USA - between 72°W and 66°W - onshore - Connecticut; Maine; Massachusetts; New Hampshire; New York
     * (Long Island); Rhode Island; Vermont
     * Replaces NAD83 / UTM zone 19N for applications with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) /
     * UTM zone 19N.
     */
    public const EPSG_NAD83_HARN_UTM_ZONE_19N = 'urn:ogc:def:crs:EPSG::3749';

    /**
     * NAD83(HARN) / UTM zone 2S
     * Extent: American Samoa - Tutuila, Aunu'u, Ofu, Olesega, Ta'u and Rose islands
     * Replaces American Samoa 1962 / American Samoa Lambert (projCRS 3102) effective from 2000.
     */
    public const EPSG_NAD83_HARN_UTM_ZONE_2S = 'urn:ogc:def:crs:EPSG::2195';

    /**
     * NAD83(HARN) / UTM zone 4N
     * Extent: USA - between 162°W and 156°W onshore - Hawaii.
     */
    public const EPSG_NAD83_HARN_UTM_ZONE_4N = 'urn:ogc:def:crs:EPSG::3750';

    /**
     * NAD83(HARN) / UTM zone 5N
     * Extent: USA - between 156°W and 150°W onshore - Hawaii.
     */
    public const EPSG_NAD83_HARN_UTM_ZONE_5N = 'urn:ogc:def:crs:EPSG::3751';

    /**
     * NAD83(HARN) / Utah Central
     * Extent: USA - Utah - counties of Carbon; Duchesne; Emery; Grand; Juab; Millard; Salt Lake; Sanpete; Sevier;
     * Tooele; Uintah; Utah; Wasatch
     * State law of 2009 defines system in US survey feet: see CRS code 3569. State law of 1988 defining International
     * feet was withdrawn in 2001. Replaces NAD83 / SPCS for applications with an accuracy of better than 1m. Replaced
     * by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_UTAH_CENTRAL = 'urn:ogc:def:crs:EPSG::2850';

    /**
     * NAD83(HARN) / Utah Central (ft)
     * Extent: USA - Utah - counties of Carbon; Duchesne; Emery; Grand; Juab; Millard; Salt Lake; Sanpete; Sevier;
     * Tooele; Uintah; Utah; Wasatch
     * 1988 state law defining system in International feet withdrawn 2001, replaced in 2009 by ftUS. Federal
     * definition is metric: see CRS code 2850. Replaces NAD83 / SPCS for applications of an accuracy of better than 3
     * ft. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_UTAH_CENTRAL_FT = 'urn:ogc:def:crs:EPSG::2922';

    /**
     * NAD83(HARN) / Utah Central (ftUS)
     * Extent: USA - Utah - counties of Carbon; Duchesne; Emery; Grand; Juab; Millard; Salt Lake; Sanpete; Sevier;
     * Tooele; Uintah; Utah; Wasatch
     * State law defines system in International feet (note: not US survey feet). Federal definition is metric - see
     * code 2850. Replaces NAD83 / SPCS for applications with an accuracy of better than 3 ft. Replaced by
     * NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_UTAH_CENTRAL_FTUS = 'urn:ogc:def:crs:EPSG::3569';

    /**
     * NAD83(HARN) / Utah North
     * Extent: USA - Utah - counties of Box Elder; Cache; Daggett; Davis; Morgan; Rich; Summit; Weber
     * State law of 2009 defines system in US survey feet: see CRS code 3568. State law of 1988 defining International
     * feet was withdrawn in 2001. Replaces NAD83 / SPCS for applications with an accuracy of better than 1m. Replaced
     * by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_UTAH_NORTH = 'urn:ogc:def:crs:EPSG::2849';

    /**
     * NAD83(HARN) / Utah North (ft)
     * Extent: USA - Utah - counties of Box Elder; Cache; Daggett; Davis; Morgan; Rich; Summit; Weber
     * 1988 state law defining system in International feet withdrawn 2001, replaced in 2009 by ftUS. Federal
     * definition is metric: see CRS code 2849. Replaces NAD83 / SPCS for applications of an accuracy of better than 3
     * ft. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_UTAH_NORTH_FT = 'urn:ogc:def:crs:EPSG::2921';

    /**
     * NAD83(HARN) / Utah North (ftUS)
     * Extent: USA - Utah - counties of Box Elder; Cache; Daggett; Davis; Morgan; Rich; Summit; Weber
     * State law defines system in International feet (note: not US survey feet). Federal definition is metric - see
     * code 2849. Replaces NAD83 / SPCS for applications with an accuracy of better than 3 ft. Replaced by
     * NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_UTAH_NORTH_FTUS = 'urn:ogc:def:crs:EPSG::3568';

    /**
     * NAD83(HARN) / Utah South
     * Extent: USA - Utah - counties of Beaver; Garfield; Iron; Kane; Piute; San Juan; Washington; Wayne
     * State law of 2009 defines system in US survey feet: see CRS code 3570. State law of 1988 defining International
     * feet was withdrawn in 2001. Replaces NAD83 / SPCS for applications with an accuracy of better than 1m. Replaced
     * by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_UTAH_SOUTH = 'urn:ogc:def:crs:EPSG::2851';

    /**
     * NAD83(HARN) / Utah South (ft)
     * Extent: USA - Utah - counties of Beaver; Garfield; Iron; Kane; Piute; San Juan; Washington; Wayne
     * 1988 state law defining system in International feet withdrawn 2001, replaced in 2009 by ftUS. Federal
     * definition is metric: see CRS code 2851. Replaces NAD83 / SPCS for applications of an accuracy of better than 3
     * ft. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_UTAH_SOUTH_FT = 'urn:ogc:def:crs:EPSG::2923';

    /**
     * NAD83(HARN) / Utah South (ftUS)
     * Extent: USA - Utah - counties of Beaver; Garfield; Iron; Kane; Piute; San Juan; Washington; Wayne
     * State law defines system in International feet (note: not US survey feet). Federal definition is metric - see
     * code 2851. Replaces NAD83 / SPCS for applications with an accuracy of better than 3 ft. Replaced by
     * NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_UTAH_SOUTH_FTUS = 'urn:ogc:def:crs:EPSG::3570';

    /**
     * NAD83(HARN) / Vermont
     * Extent: USA - Vermont - counties of Addison; Bennington; Caledonia; Chittenden; Essex; Franklin; Grand Isle;
     * Lamoille; Orange; Orleans; Rutland; Washington; Windham; Windsor
     * State law defines system in US survey feet. See code 5654 for equivalent non-metric definition. Replaces NAD83 /
     * SPCS for applications with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_VERMONT = 'urn:ogc:def:crs:EPSG::2852';

    /**
     * NAD83(HARN) / Vermont (ftUS)
     * Extent: USA - Vermont - counties of Addison; Bennington; Caledonia; Chittenden; Essex; Franklin; Grand Isle;
     * Lamoille; Orange; Orleans; Rutland; Washington; Windham; Windsor
     * State law defines system in US survey feet. Federal definition is metric - see code 2852. Replaces NAD83 / SPCS
     * for applications with an accuracy of better than 3 feet. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_VERMONT_FTUS = 'urn:ogc:def:crs:EPSG::5654';

    /**
     * NAD83(HARN) / Virginia Lambert
     * Extent: USA - Virginia
     * Replaces NAD83 / Virginia Lambert (CRS code 3968) for applications with an accuracy of better than 1m. Replaced
     * by NAD83(NSRS2007) / Virginia Lambert (CRS code 3970).
     */
    public const EPSG_NAD83_HARN_VIRGINIA_LAMBERT = 'urn:ogc:def:crs:EPSG::3969';

    /**
     * NAD83(HARN) / Virginia North
     * Extent: USA - Virginia - counties of Arlington; Augusta; Bath; Caroline; Clarke; Culpeper; Fairfax; Fauquier;
     * Frederick; Greene; Highland; King George; Loudoun; Madison; Orange; Page; Prince William; Rappahannock;
     * Rockingham; Shenandoah; Spotsylvania; Stafford; Warren; Westmoreland
     * State law defines system in US survey feet. See code 2924 for equivalent non-metric definition. Replaces NAD83 /
     * SPCS for applications with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_VIRGINIA_NORTH = 'urn:ogc:def:crs:EPSG::2853';

    /**
     * NAD83(HARN) / Virginia North (ftUS)
     * Extent: USA - Virginia - counties of Arlington; Augusta; Bath; Caroline; Clarke; Culpeper; Fairfax; Fauquier;
     * Frederick; Greene; Highland; King George; Loudoun; Madison; Orange; Page; Prince William; Rappahannock;
     * Rockingham; Shenandoah; Spotsylvania; Stafford; Warren; Westmoreland
     * State law defines system in US survey feet. Federal definition is metric - see code 2853. Replaces NAD83 / SPCS
     * for applications with an accuracy of better than 3 feet. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_VIRGINIA_NORTH_FTUS = 'urn:ogc:def:crs:EPSG::2924';

    /**
     * NAD83(HARN) / Virginia South
     * Extent: USA - Virginia - counties of Accomack; Albemarle; Alleghany; Amelia; Amherst; Appomattox; Bedford;
     * Bland; Botetourt; Bristol; Brunswick; Buchanan; Buckingham; Campbell; Carroll; Charles City; Charlotte;
     * Chesapeake; Chesterfield; Colonial Heights; Craig; Cumberland; Dickenson; Dinwiddie; Essex; Floyd; Fluvanna;
     * Franklin; Giles; Gloucester; Goochland; Grayson; Greensville; Halifax; Hampton; Hanover; Henrico; Henry; Isle of
     * Wight; James City; King and Queen; King William; Lancaster; Lee; Louisa; Lunenburg; Lynchburg; Mathews;
     * Mecklenburg; Middlesex; Montgomery; Nelson; New Kent; Newport News; Norfolk; Northampton; Northumberland;
     * Norton; Nottoway; Patrick; Petersburg; Pittsylvania; Portsmouth; Powhatan; Prince Edward; Prince George;
     * Pulaski; Richmond; Roanoke; Rockbridge; Russell; Scott; Smyth; Southampton; Suffolk; Surry; Sussex; Tazewell;
     * Washington; Wise; Wythe; York
     * State law defines system in US survey feet. See code 2925 for equivalent non-metric definition. Replaces NAD83 /
     * SPCS for applications with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_VIRGINIA_SOUTH = 'urn:ogc:def:crs:EPSG::2854';

    /**
     * NAD83(HARN) / Virginia South (ftUS)
     * Extent: USA - Virginia - counties of Accomack; Albemarle; Alleghany; Amelia; Amherst; Appomattox; Bedford;
     * Bland; Botetourt; Bristol; Brunswick; Buchanan; Buckingham; Campbell; Carroll; Charles City; Charlotte;
     * Chesapeake; Chesterfield; Colonial Heights; Craig; Cumberland; Dickenson; Dinwiddie; Essex; Floyd; Fluvanna;
     * Franklin; Giles; Gloucester; Goochland; Grayson; Greensville; Halifax; Hampton; Hanover; Henrico; Henry; Isle of
     * Wight; James City; King and Queen; King William; Lancaster; Lee; Louisa; Lunenburg; Lynchburg; Mathews;
     * Mecklenburg; Middlesex; Montgomery; Nelson; New Kent; Newport News; Norfolk; Northampton; Northumberland;
     * Norton; Nottoway; Patrick; Petersburg; Pittsylvania; Portsmouth; Powhatan; Prince Edward; Prince George;
     * Pulaski; Richmond; Roanoke; Rockbridge; Russell; Scott; Smyth; Southampton; Suffolk; Surry; Sussex; Tazewell;
     * Washington; Wise; Wythe; York
     * State law defines system in US survey feet. Federal definition is metric - see code 2854. Replaces NAD83 / SPCS
     * for applications with an accuracy of better than 3 feet. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_VIRGINIA_SOUTH_FTUS = 'urn:ogc:def:crs:EPSG::2925';

    /**
     * NAD83(HARN) / WISCRS Adams and Juneau (ftUS)
     * Extent: USA - Wisconsin - counties of Adams and Juneau
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined as separate zones for each county these
     * having identical parameter values: see info source. Defined in meters - see CRS code 8225.
     */
    public const EPSG_NAD83_HARN_WISCRS_ADAMS_AND_JUNEAU_FTUS = 'urn:ogc:def:crs:EPSG::8226';

    /**
     * NAD83(HARN) / WISCRS Adams and Juneau (m)
     * Extent: USA - Wisconsin - counties of Adams and Juneau
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined as separate zones for each county these
     * having identical parameter values: see info source. Working units are feet - see CRS code 8226.
     */
    public const EPSG_NAD83_HARN_WISCRS_ADAMS_AND_JUNEAU_M = 'urn:ogc:def:crs:EPSG::8225';

    /**
     * NAD83(HARN) / WISCRS Ashland (ftUS)
     * Extent: USA - Wisconsin - Ashland county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined in meters - see CRS code 8222.
     */
    public const EPSG_NAD83_HARN_WISCRS_ASHLAND_FTUS = 'urn:ogc:def:crs:EPSG::8224';

    /**
     * NAD83(HARN) / WISCRS Ashland (m)
     * Extent: USA - Wisconsin - Ashland county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Working units are feet - see CRS code 8224.
     */
    public const EPSG_NAD83_HARN_WISCRS_ASHLAND_M = 'urn:ogc:def:crs:EPSG::8222';

    /**
     * NAD83(HARN) / WISCRS Barron (ftUS)
     * Extent: USA - Wisconsin - Barron county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined in meters - see CRS code 8218.
     */
    public const EPSG_NAD83_HARN_WISCRS_BARRON_FTUS = 'urn:ogc:def:crs:EPSG::8220';

    /**
     * NAD83(HARN) / WISCRS Barron (m)
     * Extent: USA - Wisconsin - Barron county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Working units are feet - see CRS code 8220.
     */
    public const EPSG_NAD83_HARN_WISCRS_BARRON_M = 'urn:ogc:def:crs:EPSG::8218';

    /**
     * NAD83(HARN) / WISCRS Bayfield (ftUS)
     * Extent: USA - Wisconsin - Bayfield county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined in meters - see CRS code 8214.
     */
    public const EPSG_NAD83_HARN_WISCRS_BAYFIELD_FTUS = 'urn:ogc:def:crs:EPSG::8216';

    /**
     * NAD83(HARN) / WISCRS Bayfield (m)
     * Extent: USA - Wisconsin - Bayfield county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Working units are feet - see CRS code 8216.
     */
    public const EPSG_NAD83_HARN_WISCRS_BAYFIELD_M = 'urn:ogc:def:crs:EPSG::8214';

    /**
     * NAD83(HARN) / WISCRS Brown (ftUS)
     * Extent: USA - Wisconsin - Brown county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined in meters - see CRS code 8212.
     */
    public const EPSG_NAD83_HARN_WISCRS_BROWN_FTUS = 'urn:ogc:def:crs:EPSG::8213';

    /**
     * NAD83(HARN) / WISCRS Brown (m)
     * Extent: USA - Wisconsin - Brown county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Working units are feet - see CRS code 8213.
     */
    public const EPSG_NAD83_HARN_WISCRS_BROWN_M = 'urn:ogc:def:crs:EPSG::8212';

    /**
     * NAD83(HARN) / WISCRS Buffalo (ftUS)
     * Extent: USA - Wisconsin - Buffalo county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined in meters - see CRS code 8209.
     */
    public const EPSG_NAD83_HARN_WISCRS_BUFFALO_FTUS = 'urn:ogc:def:crs:EPSG::8210';

    /**
     * NAD83(HARN) / WISCRS Buffalo (m)
     * Extent: USA - Wisconsin - Buffalo county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Working units are feet - see CRS code 8210.
     */
    public const EPSG_NAD83_HARN_WISCRS_BUFFALO_M = 'urn:ogc:def:crs:EPSG::8209';

    /**
     * NAD83(HARN) / WISCRS Burnett (ftUS)
     * Extent: USA - Wisconsin - Burnett county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined in meters - see CRS code 8207.
     */
    public const EPSG_NAD83_HARN_WISCRS_BURNETT_FTUS = 'urn:ogc:def:crs:EPSG::8208';

    /**
     * NAD83(HARN) / WISCRS Burnett (m)
     * Extent: USA - Wisconsin - Burnett county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Working units are feet - see CRS code 8208.
     */
    public const EPSG_NAD83_HARN_WISCRS_BURNETT_M = 'urn:ogc:def:crs:EPSG::8207';

    /**
     * NAD83(HARN) / WISCRS Calumet, Fond du Lac, Outagamie and Winnebago (ftUS)
     * Extent: USA - Wisconsin - counties of Calumet, Fond du Lac, Outagamie and Winnebago
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined as separate zones for each county these
     * having identical parameter values: see info source. Defined in meters - see CRS code 8205.
     */
    public const EPSG_NAD83_HARN_WISCRS_CALUMET_FOND_DU_LAC_OUTAGAMIE_AND_WINNEBAGO_FTUS = 'urn:ogc:def:crs:EPSG::8206';

    /**
     * NAD83(HARN) / WISCRS Calumet, Fond du Lac, Outagamie and Winnebago (m)
     * Extent: USA - Wisconsin - counties of Calumet, Fond du Lac, Outagamie and Winnebago
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined as separate zones for each county these
     * having identical parameter values: see info source. Working units are feet - see CRS code 8206.
     */
    public const EPSG_NAD83_HARN_WISCRS_CALUMET_FOND_DU_LAC_OUTAGAMIE_AND_WINNEBAGO_M = 'urn:ogc:def:crs:EPSG::8205';

    /**
     * NAD83(HARN) / WISCRS Chippewa (ftUS)
     * Extent: USA - Wisconsin - Chippewa county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined in meters - see CRS code 8203.
     */
    public const EPSG_NAD83_HARN_WISCRS_CHIPPEWA_FTUS = 'urn:ogc:def:crs:EPSG::8204';

    /**
     * NAD83(HARN) / WISCRS Chippewa (m)
     * Extent: USA - Wisconsin - Chippewa county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Working units are feet - see CRS code 8204.
     */
    public const EPSG_NAD83_HARN_WISCRS_CHIPPEWA_M = 'urn:ogc:def:crs:EPSG::8203';

    /**
     * NAD83(HARN) / WISCRS Clark (ftUS)
     * Extent: USA - Wisconsin - Clark county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined in meters - see CRS code 8201.
     */
    public const EPSG_NAD83_HARN_WISCRS_CLARK_FTUS = 'urn:ogc:def:crs:EPSG::8202';

    /**
     * NAD83(HARN) / WISCRS Clark (m)
     * Extent: USA - Wisconsin - Clark county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Working units are feet - see CRS code 8202.
     */
    public const EPSG_NAD83_HARN_WISCRS_CLARK_M = 'urn:ogc:def:crs:EPSG::8201';

    /**
     * NAD83(HARN) / WISCRS Columbia (ftUS)
     * Extent: USA - Wisconsin - Columbia county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined in meters - see CRS code 8198.
     */
    public const EPSG_NAD83_HARN_WISCRS_COLUMBIA_FTUS = 'urn:ogc:def:crs:EPSG::8200';

    /**
     * NAD83(HARN) / WISCRS Columbia (m)
     * Extent: USA - Wisconsin - Columbia county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Working units are feet - see CRS code 8200.
     */
    public const EPSG_NAD83_HARN_WISCRS_COLUMBIA_M = 'urn:ogc:def:crs:EPSG::8198';

    /**
     * NAD83(HARN) / WISCRS Crawford (ftUS)
     * Extent: USA - Wisconsin - Crawford county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined in meters - see CRS code 8196.
     */
    public const EPSG_NAD83_HARN_WISCRS_CRAWFORD_FTUS = 'urn:ogc:def:crs:EPSG::8197';

    /**
     * NAD83(HARN) / WISCRS Crawford (m)
     * Extent: USA - Wisconsin - Crawford county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Working units are feet - see CRS code 8197.
     */
    public const EPSG_NAD83_HARN_WISCRS_CRAWFORD_M = 'urn:ogc:def:crs:EPSG::8196';

    /**
     * NAD83(HARN) / WISCRS Dane (ftUS)
     * Extent: USA - Wisconsin - Dane county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined in meters - see CRS code 8191.
     */
    public const EPSG_NAD83_HARN_WISCRS_DANE_FTUS = 'urn:ogc:def:crs:EPSG::8193';

    /**
     * NAD83(HARN) / WISCRS Dane (m)
     * Extent: USA - Wisconsin - Dane county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Working units are feet - see CRS code 8193.
     */
    public const EPSG_NAD83_HARN_WISCRS_DANE_M = 'urn:ogc:def:crs:EPSG::8191';

    /**
     * NAD83(HARN) / WISCRS Dodge and Jefferson (ftUS)
     * Extent: USA - Wisconsin - counties of Dodge and Jefferson
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined as separate zones for each county these
     * having identical parameter values: see info source. Defined in meters - see CRS code 8187.
     */
    public const EPSG_NAD83_HARN_WISCRS_DODGE_AND_JEFFERSON_FTUS = 'urn:ogc:def:crs:EPSG::8189';

    /**
     * NAD83(HARN) / WISCRS Dodge and Jefferson (m)
     * Extent: USA - Wisconsin - counties of Dodge and Jefferson
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined as separate zones for each county these
     * having identical parameter values: see info source. Working units are feet - see CRS code 8189.
     */
    public const EPSG_NAD83_HARN_WISCRS_DODGE_AND_JEFFERSON_M = 'urn:ogc:def:crs:EPSG::8187';

    /**
     * NAD83(HARN) / WISCRS Door (ftUS)
     * Extent: USA - Wisconsin - Door county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined in meters - see CRS code 8184.
     */
    public const EPSG_NAD83_HARN_WISCRS_DOOR_FTUS = 'urn:ogc:def:crs:EPSG::8185';

    /**
     * NAD83(HARN) / WISCRS Door (m)
     * Extent: USA - Wisconsin - Door county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Working units are feet - see CRS code 8185.
     */
    public const EPSG_NAD83_HARN_WISCRS_DOOR_M = 'urn:ogc:def:crs:EPSG::8184';

    /**
     * NAD83(HARN) / WISCRS Douglas (ftUS)
     * Extent: USA - Wisconsin - Douglas county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined in meters - see CRS code 8181.
     */
    public const EPSG_NAD83_HARN_WISCRS_DOUGLAS_FTUS = 'urn:ogc:def:crs:EPSG::8182';

    /**
     * NAD83(HARN) / WISCRS Douglas (m)
     * Extent: USA - Wisconsin - Douglas county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Working units are feet - see CRS code 8182.
     */
    public const EPSG_NAD83_HARN_WISCRS_DOUGLAS_M = 'urn:ogc:def:crs:EPSG::8181';

    /**
     * NAD83(HARN) / WISCRS Dunn (ftUS)
     * Extent: USA - Wisconsin - Dunn county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined in meters - see CRS code 8179.
     */
    public const EPSG_NAD83_HARN_WISCRS_DUNN_FTUS = 'urn:ogc:def:crs:EPSG::8180';

    /**
     * NAD83(HARN) / WISCRS Dunn (m)
     * Extent: USA - Wisconsin - Dunn county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Working units are feet - see CRS code 8180.
     */
    public const EPSG_NAD83_HARN_WISCRS_DUNN_M = 'urn:ogc:def:crs:EPSG::8179';

    /**
     * NAD83(HARN) / WISCRS Eau Claire (ftUS)
     * Extent: USA - Wisconsin - Eau Claire county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined in meters - see CRS code 8092.
     */
    public const EPSG_NAD83_HARN_WISCRS_EAU_CLAIRE_FTUS = 'urn:ogc:def:crs:EPSG::8093';

    /**
     * NAD83(HARN) / WISCRS Eau Claire (m)
     * Extent: USA - Wisconsin - Eau Claire county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Working units are feet - see CRS code 8093.
     */
    public const EPSG_NAD83_HARN_WISCRS_EAU_CLAIRE_M = 'urn:ogc:def:crs:EPSG::8092';

    /**
     * NAD83(HARN) / WISCRS Florence (ftUS)
     * Extent: USA - Wisconsin - Florence county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined in meters - see CRS code 8090.
     */
    public const EPSG_NAD83_HARN_WISCRS_FLORENCE_FTUS = 'urn:ogc:def:crs:EPSG::8091';

    /**
     * NAD83(HARN) / WISCRS Florence (m)
     * Extent: USA - Wisconsin - Florence county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Working units are feet - see CRS code 8091.
     */
    public const EPSG_NAD83_HARN_WISCRS_FLORENCE_M = 'urn:ogc:def:crs:EPSG::8090';

    /**
     * NAD83(HARN) / WISCRS Forest (ftUS)
     * Extent: USA - Wisconsin - Forest county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined in meters - see CRS code 8173.
     */
    public const EPSG_NAD83_HARN_WISCRS_FOREST_FTUS = 'urn:ogc:def:crs:EPSG::8177';

    /**
     * NAD83(HARN) / WISCRS Forest (m)
     * Extent: USA - Wisconsin - Forest county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Working units are feet - see CRS code 8177.
     */
    public const EPSG_NAD83_HARN_WISCRS_FOREST_M = 'urn:ogc:def:crs:EPSG::8173';

    /**
     * NAD83(HARN) / WISCRS Grant (ftUS)
     * Extent: USA - Wisconsin - Grant county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined in meters - see CRS code 8171.
     */
    public const EPSG_NAD83_HARN_WISCRS_GRANT_FTUS = 'urn:ogc:def:crs:EPSG::8172';

    /**
     * NAD83(HARN) / WISCRS Grant (m)
     * Extent: USA - Wisconsin - Grant county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Working units are feet - see CRS code 8172.
     */
    public const EPSG_NAD83_HARN_WISCRS_GRANT_M = 'urn:ogc:def:crs:EPSG::8171';

    /**
     * NAD83(HARN) / WISCRS Green Lake and Marquette (ftUS)
     * Extent: USA - Wisconsin - counties of Green Lake and Marquette
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined as separate zones for each county these
     * having identical parameter values: see info source. Defined in meters - see CRS code 8167.
     */
    public const EPSG_NAD83_HARN_WISCRS_GREEN_LAKE_AND_MARQUETTE_FTUS = 'urn:ogc:def:crs:EPSG::8168';

    /**
     * NAD83(HARN) / WISCRS Green Lake and Marquette (m)
     * Extent: USA - Wisconsin - counties of Green Lake and Marquette
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined as separate zones for each county these
     * having identical parameter values: see info source. Working units are feet - see CRS code 8168.
     */
    public const EPSG_NAD83_HARN_WISCRS_GREEN_LAKE_AND_MARQUETTE_M = 'urn:ogc:def:crs:EPSG::8167';

    /**
     * NAD83(HARN) / WISCRS Green and Lafayette (ftUS)
     * Extent: USA - Wisconsin - counties of Green and Lafayette
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined as separate zones for each county these
     * having identical parameter values: see info source. Defined in meters - see CRS code 8169.
     */
    public const EPSG_NAD83_HARN_WISCRS_GREEN_AND_LAFAYETTE_FTUS = 'urn:ogc:def:crs:EPSG::8170';

    /**
     * NAD83(HARN) / WISCRS Green and Lafayette (m)
     * Extent: USA - Wisconsin - counties of Green and Lafayette
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined as separate zones for each county these
     * having identical parameter values: see info source. Working units are feet - see CRS code 8170.
     */
    public const EPSG_NAD83_HARN_WISCRS_GREEN_AND_LAFAYETTE_M = 'urn:ogc:def:crs:EPSG::8169';

    /**
     * NAD83(HARN) / WISCRS Iowa (ftUS)
     * Extent: USA - Wisconsin - Iowa county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined in meters - see CRS code 8165.
     */
    public const EPSG_NAD83_HARN_WISCRS_IOWA_FTUS = 'urn:ogc:def:crs:EPSG::8166';

    /**
     * NAD83(HARN) / WISCRS Iowa (m)
     * Extent: USA - Wisconsin - Iowa county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Working units are feet - see CRS code 8166.
     */
    public const EPSG_NAD83_HARN_WISCRS_IOWA_M = 'urn:ogc:def:crs:EPSG::8165';

    /**
     * NAD83(HARN) / WISCRS Iron (ftUS)
     * Extent: USA - Wisconsin - Iron county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined in meters - see CRS code 8163.
     */
    public const EPSG_NAD83_HARN_WISCRS_IRON_FTUS = 'urn:ogc:def:crs:EPSG::8164';

    /**
     * NAD83(HARN) / WISCRS Iron (m)
     * Extent: USA - Wisconsin - Iron county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Working units are feet - see CRS code 8164.
     */
    public const EPSG_NAD83_HARN_WISCRS_IRON_M = 'urn:ogc:def:crs:EPSG::8163';

    /**
     * NAD83(HARN) / WISCRS Jackson (ftUS)
     * Extent: USA - Wisconsin - Jackson county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined in meters - see CRS code 8161. When using
     * the WISCORS network referenced to NAD83(2011) this CRS may be emulated through NAD83(2011) / Adjusted Jackson
     * (ftUS) (CRS code 10516).
     */
    public const EPSG_NAD83_HARN_WISCRS_JACKSON_FTUS = 'urn:ogc:def:crs:EPSG::8162';

    /**
     * NAD83(HARN) / WISCRS Jackson (m)
     * Extent: USA - Wisconsin - Jackson county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Working units are feet - see CRS code 8162.
     */
    public const EPSG_NAD83_HARN_WISCRS_JACKSON_M = 'urn:ogc:def:crs:EPSG::8161';

    /**
     * NAD83(HARN) / WISCRS Kenosha, Milwaukee, Ozaukee and Racine (ftUS)
     * Extent: USA - Wisconsin - counties of Kenosha, Milwaukee, Ozaukee and Racine
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined as separate zones for each county these
     * having identical parameter values: see info source. Defined in meters - see CRS code 8159.
     */
    public const EPSG_NAD83_HARN_WISCRS_KENOSHA_MILWAUKEE_OZAUKEE_AND_RACINE_FTUS = 'urn:ogc:def:crs:EPSG::8160';

    /**
     * NAD83(HARN) / WISCRS Kenosha, Milwaukee, Ozaukee and Racine (m)
     * Extent: USA - Wisconsin - counties of Kenosha, Milwaukee, Ozaukee and Racine
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined as separate zones for each county these
     * having identical parameter values: see info source. Working units are feet - see CRS code 8160.
     */
    public const EPSG_NAD83_HARN_WISCRS_KENOSHA_MILWAUKEE_OZAUKEE_AND_RACINE_M = 'urn:ogc:def:crs:EPSG::8159';

    /**
     * NAD83(HARN) / WISCRS Kewaunee, Manitowoc and Sheboygan (ftUS)
     * Extent: USA - Wisconsin - counties of Kewaunee, Manitowoc and Sheboygan
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined as separate zones for each county these
     * having identical parameter values: see info source. Defined in meters - see CRS code 8157.
     */
    public const EPSG_NAD83_HARN_WISCRS_KEWAUNEE_MANITOWOC_AND_SHEBOYGAN_FTUS = 'urn:ogc:def:crs:EPSG::8158';

    /**
     * NAD83(HARN) / WISCRS Kewaunee, Manitowoc and Sheboygan (m)
     * Extent: USA - Wisconsin - counties of Kewaunee, Manitowoc and Sheboygan
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined as separate zones for each county these
     * having identical parameter values: see info source. Working units are feet - see CRS code 8158.
     */
    public const EPSG_NAD83_HARN_WISCRS_KEWAUNEE_MANITOWOC_AND_SHEBOYGAN_M = 'urn:ogc:def:crs:EPSG::8157';

    /**
     * NAD83(HARN) / WISCRS La Crosse (ftUS)
     * Extent: USA - Wisconsin - La Crosse county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined in meters - see CRS code 8155.
     */
    public const EPSG_NAD83_HARN_WISCRS_LA_CROSSE_FTUS = 'urn:ogc:def:crs:EPSG::8156';

    /**
     * NAD83(HARN) / WISCRS La Crosse (m)
     * Extent: USA - Wisconsin - La Crosse county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Working units are feet - see CRS code 8156.
     */
    public const EPSG_NAD83_HARN_WISCRS_LA_CROSSE_M = 'urn:ogc:def:crs:EPSG::8155';

    /**
     * NAD83(HARN) / WISCRS Langlade (ftUS)
     * Extent: USA - Wisconsin - Langlade county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined in meters - see CRS code 8153.
     */
    public const EPSG_NAD83_HARN_WISCRS_LANGLADE_FTUS = 'urn:ogc:def:crs:EPSG::8154';

    /**
     * NAD83(HARN) / WISCRS Langlade (m)
     * Extent: USA - Wisconsin - Langlade county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Working units are feet - see CRS code 8154.
     */
    public const EPSG_NAD83_HARN_WISCRS_LANGLADE_M = 'urn:ogc:def:crs:EPSG::8153';

    /**
     * NAD83(HARN) / WISCRS Lincoln (ftUS)
     * Extent: USA - Wisconsin - Lincoln county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined in meters - see CRS code 8151.
     */
    public const EPSG_NAD83_HARN_WISCRS_LINCOLN_FTUS = 'urn:ogc:def:crs:EPSG::8152';

    /**
     * NAD83(HARN) / WISCRS Lincoln (m)
     * Extent: USA - Wisconsin - Lincoln county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Working units are feet - see CRS code 8152.
     */
    public const EPSG_NAD83_HARN_WISCRS_LINCOLN_M = 'urn:ogc:def:crs:EPSG::8151';

    /**
     * NAD83(HARN) / WISCRS Marathon (ftUS)
     * Extent: USA - Wisconsin - Marathon county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined in meters - see CRS code 8149.
     */
    public const EPSG_NAD83_HARN_WISCRS_MARATHON_FTUS = 'urn:ogc:def:crs:EPSG::8150';

    /**
     * NAD83(HARN) / WISCRS Marathon (m)
     * Extent: USA - Wisconsin - Marathon county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Working units are feet - see CRS code 8150.
     */
    public const EPSG_NAD83_HARN_WISCRS_MARATHON_M = 'urn:ogc:def:crs:EPSG::8149';

    /**
     * NAD83(HARN) / WISCRS Marinette (ftUS)
     * Extent: USA - Wisconsin - Marinette county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined in meters - see CRS code 8147.
     */
    public const EPSG_NAD83_HARN_WISCRS_MARINETTE_FTUS = 'urn:ogc:def:crs:EPSG::8148';

    /**
     * NAD83(HARN) / WISCRS Marinette (m)
     * Extent: USA - Wisconsin - Marinette county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Working units are feet - see CRS code 8148.
     */
    public const EPSG_NAD83_HARN_WISCRS_MARINETTE_M = 'urn:ogc:def:crs:EPSG::8147';

    /**
     * NAD83(HARN) / WISCRS Menominee (ftUS)
     * Extent: USA - Wisconsin - Menominee county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined in meters - see CRS code 8145.
     */
    public const EPSG_NAD83_HARN_WISCRS_MENOMINEE_FTUS = 'urn:ogc:def:crs:EPSG::8146';

    /**
     * NAD83(HARN) / WISCRS Menominee (m)
     * Extent: USA - Wisconsin - Menominee county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Working units are feet - see CRS code 8146.
     */
    public const EPSG_NAD83_HARN_WISCRS_MENOMINEE_M = 'urn:ogc:def:crs:EPSG::8145';

    /**
     * NAD83(HARN) / WISCRS Monroe (ftUS)
     * Extent: USA - Wisconsin - Monroe county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined in meters - see CRS code 8143.
     */
    public const EPSG_NAD83_HARN_WISCRS_MONROE_FTUS = 'urn:ogc:def:crs:EPSG::8144';

    /**
     * NAD83(HARN) / WISCRS Monroe (m)
     * Extent: USA - Wisconsin - Monroe county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Working units are feet - see CRS code 8144.
     */
    public const EPSG_NAD83_HARN_WISCRS_MONROE_M = 'urn:ogc:def:crs:EPSG::8143';

    /**
     * NAD83(HARN) / WISCRS Oconto (ftUS)
     * Extent: USA - Wisconsin - Oconto county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined in meters - see CRS code 8141.
     */
    public const EPSG_NAD83_HARN_WISCRS_OCONTO_FTUS = 'urn:ogc:def:crs:EPSG::8142';

    /**
     * NAD83(HARN) / WISCRS Oconto (m)
     * Extent: USA - Wisconsin - Oconto county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Working units are feet - see CRS code 8142.
     */
    public const EPSG_NAD83_HARN_WISCRS_OCONTO_M = 'urn:ogc:def:crs:EPSG::8141';

    /**
     * NAD83(HARN) / WISCRS Oneida (ftUS)
     * Extent: USA - Wisconsin - Oneida county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined in meters - see CRS code 8139.
     */
    public const EPSG_NAD83_HARN_WISCRS_ONEIDA_FTUS = 'urn:ogc:def:crs:EPSG::8140';

    /**
     * NAD83(HARN) / WISCRS Oneida (m)
     * Extent: USA - Wisconsin - Oneida county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Working units are feet - see CRS code 8140.
     */
    public const EPSG_NAD83_HARN_WISCRS_ONEIDA_M = 'urn:ogc:def:crs:EPSG::8139';

    /**
     * NAD83(HARN) / WISCRS Pepin and Pierce (ftUS)
     * Extent: USA - Wisconsin - counties of Pepin and Pierce
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined as separate zones for each county these
     * having identical parameter values: see info source. Defined in meters - see CRS code 8137.
     */
    public const EPSG_NAD83_HARN_WISCRS_PEPIN_AND_PIERCE_FTUS = 'urn:ogc:def:crs:EPSG::8138';

    /**
     * NAD83(HARN) / WISCRS Pepin and Pierce (m)
     * Extent: USA - Wisconsin - counties of Pepin and Pierce
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined as separate zones for each county these
     * having identical parameter values: see info source. Working units are feet - see CRS code 8138.
     */
    public const EPSG_NAD83_HARN_WISCRS_PEPIN_AND_PIERCE_M = 'urn:ogc:def:crs:EPSG::8137';

    /**
     * NAD83(HARN) / WISCRS Polk (ftUS)
     * Extent: USA - Wisconsin - Polk county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined in meters - see CRS code 8135.
     */
    public const EPSG_NAD83_HARN_WISCRS_POLK_FTUS = 'urn:ogc:def:crs:EPSG::8136';

    /**
     * NAD83(HARN) / WISCRS Polk (m)
     * Extent: USA - Wisconsin - Polk county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Working units are feet - see CRS code 8136.
     */
    public const EPSG_NAD83_HARN_WISCRS_POLK_M = 'urn:ogc:def:crs:EPSG::8135';

    /**
     * NAD83(HARN) / WISCRS Portage (ftUS)
     * Extent: USA - Wisconsin - Portage county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined in meters - see CRS code 8133.
     */
    public const EPSG_NAD83_HARN_WISCRS_PORTAGE_FTUS = 'urn:ogc:def:crs:EPSG::8134';

    /**
     * NAD83(HARN) / WISCRS Portage (m)
     * Extent: USA - Wisconsin - Portage county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Working units are feet - see CRS code 8134.
     */
    public const EPSG_NAD83_HARN_WISCRS_PORTAGE_M = 'urn:ogc:def:crs:EPSG::8133';

    /**
     * NAD83(HARN) / WISCRS Price (ftUS)
     * Extent: USA - Wisconsin - Price county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined in meters - see CRS code 8131.
     */
    public const EPSG_NAD83_HARN_WISCRS_PRICE_FTUS = 'urn:ogc:def:crs:EPSG::8132';

    /**
     * NAD83(HARN) / WISCRS Price (m)
     * Extent: USA - Wisconsin - Price county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Working units are feet - see CRS code 8132.
     */
    public const EPSG_NAD83_HARN_WISCRS_PRICE_M = 'urn:ogc:def:crs:EPSG::8131';

    /**
     * NAD83(HARN) / WISCRS Richland (ftUS)
     * Extent: USA - Wisconsin - Richland county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined in meters - see CRS code 8129.
     */
    public const EPSG_NAD83_HARN_WISCRS_RICHLAND_FTUS = 'urn:ogc:def:crs:EPSG::8130';

    /**
     * NAD83(HARN) / WISCRS Richland (m)
     * Extent: USA - Wisconsin - Richland county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Working units are feet - see CRS code 8130.
     */
    public const EPSG_NAD83_HARN_WISCRS_RICHLAND_M = 'urn:ogc:def:crs:EPSG::8129';

    /**
     * NAD83(HARN) / WISCRS Rock (ftUS)
     * Extent: USA - Wisconsin - Rock county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined in meters - see CRS code 8127.
     */
    public const EPSG_NAD83_HARN_WISCRS_ROCK_FTUS = 'urn:ogc:def:crs:EPSG::8128';

    /**
     * NAD83(HARN) / WISCRS Rock (m)
     * Extent: USA - Wisconsin - Rock county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Working units are feet - see CRS code 8128.
     */
    public const EPSG_NAD83_HARN_WISCRS_ROCK_M = 'urn:ogc:def:crs:EPSG::8127';

    /**
     * NAD83(HARN) / WISCRS Rusk (ftUS)
     * Extent: USA - Wisconsin - Rusk county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined in meters - see CRS code 8125.
     */
    public const EPSG_NAD83_HARN_WISCRS_RUSK_FTUS = 'urn:ogc:def:crs:EPSG::8126';

    /**
     * NAD83(HARN) / WISCRS Rusk (m)
     * Extent: USA - Wisconsin - Rusk county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Working units are feet - see CRS code 8126.
     */
    public const EPSG_NAD83_HARN_WISCRS_RUSK_M = 'urn:ogc:def:crs:EPSG::8125';

    /**
     * NAD83(HARN) / WISCRS Sauk (ftUS)
     * Extent: USA - Wisconsin - Sauk county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined in meters - see CRS code 8123.
     */
    public const EPSG_NAD83_HARN_WISCRS_SAUK_FTUS = 'urn:ogc:def:crs:EPSG::8124';

    /**
     * NAD83(HARN) / WISCRS Sauk (m)
     * Extent: USA - Wisconsin - Sauk county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Working units are feet - see CRS code 8124.
     */
    public const EPSG_NAD83_HARN_WISCRS_SAUK_M = 'urn:ogc:def:crs:EPSG::8123';

    /**
     * NAD83(HARN) / WISCRS Sawyer (ftUS)
     * Extent: USA - Wisconsin - Sawyer county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined in meters - see CRS code 8121.
     */
    public const EPSG_NAD83_HARN_WISCRS_SAWYER_FTUS = 'urn:ogc:def:crs:EPSG::8122';

    /**
     * NAD83(HARN) / WISCRS Sawyer (m)
     * Extent: USA - Wisconsin - Sawyer county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Working units are feet - see CRS code 8122.
     */
    public const EPSG_NAD83_HARN_WISCRS_SAWYER_M = 'urn:ogc:def:crs:EPSG::8121';

    /**
     * NAD83(HARN) / WISCRS Shawano (ftUS)
     * Extent: USA - Wisconsin - Shawano county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined in meters - see CRS code 8119.
     */
    public const EPSG_NAD83_HARN_WISCRS_SHAWANO_FTUS = 'urn:ogc:def:crs:EPSG::8120';

    /**
     * NAD83(HARN) / WISCRS Shawano (m)
     * Extent: USA - Wisconsin - Shawano county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Working units are feet - see CRS code 8120.
     */
    public const EPSG_NAD83_HARN_WISCRS_SHAWANO_M = 'urn:ogc:def:crs:EPSG::8119';

    /**
     * NAD83(HARN) / WISCRS St. Croix (ftUS)
     * Extent: USA - Wisconsin - St. Croix county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined in meters - see CRS code 8117.
     */
    public const EPSG_NAD83_HARN_WISCRS_ST_CROIX_FTUS = 'urn:ogc:def:crs:EPSG::8118';

    /**
     * NAD83(HARN) / WISCRS St. Croix (m)
     * Extent: USA - Wisconsin - St. Croix county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Working units are feet - see CRS code 8118.
     */
    public const EPSG_NAD83_HARN_WISCRS_ST_CROIX_M = 'urn:ogc:def:crs:EPSG::8117';

    /**
     * NAD83(HARN) / WISCRS Taylor (ftUS)
     * Extent: USA - Wisconsin - Taylor county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined in meters - see CRS code 8115.
     */
    public const EPSG_NAD83_HARN_WISCRS_TAYLOR_FTUS = 'urn:ogc:def:crs:EPSG::8116';

    /**
     * NAD83(HARN) / WISCRS Taylor (m)
     * Extent: USA - Wisconsin - Taylor county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Working units are feet - see CRS code 8116.
     */
    public const EPSG_NAD83_HARN_WISCRS_TAYLOR_M = 'urn:ogc:def:crs:EPSG::8115';

    /**
     * NAD83(HARN) / WISCRS Trempealeau (ftUS)
     * Extent: USA - Wisconsin - Trempealeau county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined in meters - see CRS code 8113.
     */
    public const EPSG_NAD83_HARN_WISCRS_TREMPEALEAU_FTUS = 'urn:ogc:def:crs:EPSG::8114';

    /**
     * NAD83(HARN) / WISCRS Trempealeau (m)
     * Extent: USA - Wisconsin - Trempealeau county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Working units are feet - see CRS code 8114.
     */
    public const EPSG_NAD83_HARN_WISCRS_TREMPEALEAU_M = 'urn:ogc:def:crs:EPSG::8113';

    /**
     * NAD83(HARN) / WISCRS Vernon (ftUS)
     * Extent: USA - Wisconsin - Vernon county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined in meters - see CRS code 8111.
     */
    public const EPSG_NAD83_HARN_WISCRS_VERNON_FTUS = 'urn:ogc:def:crs:EPSG::8112';

    /**
     * NAD83(HARN) / WISCRS Vernon (m)
     * Extent: USA - Wisconsin - Vernon county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Working units are feet - see CRS code 8112.
     */
    public const EPSG_NAD83_HARN_WISCRS_VERNON_M = 'urn:ogc:def:crs:EPSG::8111';

    /**
     * NAD83(HARN) / WISCRS Vilas (ftUS)
     * Extent: USA - Wisconsin - Vilas county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined in meters - see CRS code 8109.
     */
    public const EPSG_NAD83_HARN_WISCRS_VILAS_FTUS = 'urn:ogc:def:crs:EPSG::8110';

    /**
     * NAD83(HARN) / WISCRS Vilas (m)
     * Extent: USA - Wisconsin - Vilas county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Working units are feet - see CRS code 8110.
     */
    public const EPSG_NAD83_HARN_WISCRS_VILAS_M = 'urn:ogc:def:crs:EPSG::8109';

    /**
     * NAD83(HARN) / WISCRS Walworth (ftUS)
     * Extent: USA - Wisconsin - Walworth county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined in meters - see CRS code 8107.
     */
    public const EPSG_NAD83_HARN_WISCRS_WALWORTH_FTUS = 'urn:ogc:def:crs:EPSG::8108';

    /**
     * NAD83(HARN) / WISCRS Walworth (m)
     * Extent: USA - Wisconsin - Walworth county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Working units are feet - see CRS code 8108.
     */
    public const EPSG_NAD83_HARN_WISCRS_WALWORTH_M = 'urn:ogc:def:crs:EPSG::8107';

    /**
     * NAD83(HARN) / WISCRS Washburn (ftUS)
     * Extent: USA - Wisconsin - Washburn county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined in meters - see CRS code 8105.
     */
    public const EPSG_NAD83_HARN_WISCRS_WASHBURN_FTUS = 'urn:ogc:def:crs:EPSG::8106';

    /**
     * NAD83(HARN) / WISCRS Washburn (m)
     * Extent: USA - Wisconsin - Washburn county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Working units are feet - see CRS code 8106.
     */
    public const EPSG_NAD83_HARN_WISCRS_WASHBURN_M = 'urn:ogc:def:crs:EPSG::8105';

    /**
     * NAD83(HARN) / WISCRS Washington (ftUS)
     * Extent: USA - Wisconsin - Washington county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined in meters - see CRS code 8103.
     */
    public const EPSG_NAD83_HARN_WISCRS_WASHINGTON_FTUS = 'urn:ogc:def:crs:EPSG::8104';

    /**
     * NAD83(HARN) / WISCRS Washington (m)
     * Extent: USA - Wisconsin - Washington county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Working units are feet - see CRS code 8104.
     */
    public const EPSG_NAD83_HARN_WISCRS_WASHINGTON_M = 'urn:ogc:def:crs:EPSG::8103';

    /**
     * NAD83(HARN) / WISCRS Waukesha (ftUS)
     * Extent: USA - Wisconsin - Waukesha county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined in meters - see CRS code 8101.
     */
    public const EPSG_NAD83_HARN_WISCRS_WAUKESHA_FTUS = 'urn:ogc:def:crs:EPSG::8102';

    /**
     * NAD83(HARN) / WISCRS Waukesha (m)
     * Extent: USA - Wisconsin - Waukesha county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Working units are feet - see CRS code 8102.
     */
    public const EPSG_NAD83_HARN_WISCRS_WAUKESHA_M = 'urn:ogc:def:crs:EPSG::8101';

    /**
     * NAD83(HARN) / WISCRS Waupaca (ftUS)
     * Extent: USA - Wisconsin - Waupaca county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined in meters - see CRS code 8099.
     */
    public const EPSG_NAD83_HARN_WISCRS_WAUPACA_FTUS = 'urn:ogc:def:crs:EPSG::8100';

    /**
     * NAD83(HARN) / WISCRS Waupaca (m)
     * Extent: USA - Wisconsin - Waupaca county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Working units are feet - see CRS code 8100.
     */
    public const EPSG_NAD83_HARN_WISCRS_WAUPACA_M = 'urn:ogc:def:crs:EPSG::8099';

    /**
     * NAD83(HARN) / WISCRS Waushara (ftUS)
     * Extent: USA - Wisconsin - Waushara county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined in meters - see CRS code 8097.
     */
    public const EPSG_NAD83_HARN_WISCRS_WAUSHARA_FTUS = 'urn:ogc:def:crs:EPSG::8098';

    /**
     * NAD83(HARN) / WISCRS Waushara (m)
     * Extent: USA - Wisconsin - Waushara county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Working units are feet - see CRS code 8098.
     */
    public const EPSG_NAD83_HARN_WISCRS_WAUSHARA_M = 'urn:ogc:def:crs:EPSG::8097';

    /**
     * NAD83(HARN) / WISCRS Wood (ftUS)
     * Extent: USA - Wisconsin - Wood county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined in meters - see CRS code 8095.
     */
    public const EPSG_NAD83_HARN_WISCRS_WOOD_FTUS = 'urn:ogc:def:crs:EPSG::8096';

    /**
     * NAD83(HARN) / WISCRS Wood (m)
     * Extent: USA - Wisconsin - Wood county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Working units are feet - see CRS code 8096.
     */
    public const EPSG_NAD83_HARN_WISCRS_WOOD_M = 'urn:ogc:def:crs:EPSG::8095';

    /**
     * NAD83(HARN) / Washington North
     * Extent: USA - Washington - counties of Chelan; Clallam; Douglas; Ferry; Grant north of approximately 47°30'N;
     * Island; Jefferson; King; Kitsap; Lincoln; Okanogan; Pend Oreille; San Juan; Skagit; Snohomish; Spokane; Stevens;
     * Whatcom
     * State law defines system in US survey feet. See code 2926 for equivalent non-metric definition. Replaces NAD83 /
     * SPCS for applications with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_WASHINGTON_NORTH = 'urn:ogc:def:crs:EPSG::2855';

    /**
     * NAD83(HARN) / Washington North (ftUS)
     * Extent: USA - Washington - counties of Chelan; Clallam; Douglas; Ferry; Grant north of approximately 47°30'N;
     * Island; Jefferson; King; Kitsap; Lincoln; Okanogan; Pend Oreille; San Juan; Skagit; Snohomish; Spokane; Stevens;
     * Whatcom
     * State law defines system in US survey feet. Federal definition is metric - see code 2855. Replaces NAD83 / SPCS
     * for applications with an accuracy of better than 3 feet. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_WASHINGTON_NORTH_FTUS = 'urn:ogc:def:crs:EPSG::2926';

    /**
     * NAD83(HARN) / Washington South
     * Extent: USA - Washington - counties of Adams; Asotin; Benton; Clark; Columbia; Cowlitz; Franklin; Garfield;
     * Grant south of approximately 47°30'N; Grays Harbor; Kittitas; Klickitat; Lewis; Mason; Pacific; Pierce;
     * Skamania; Thurston; Wahkiakum; Walla Walla; Whitman; Yakima
     * State law defines system in US survey feet. See code 2927 for equivalent non-metric definition. Replaces NAD83 /
     * SPCS for applications with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_WASHINGTON_SOUTH = 'urn:ogc:def:crs:EPSG::2856';

    /**
     * NAD83(HARN) / Washington South (ftUS)
     * Extent: USA - Washington - counties of Adams; Asotin; Benton; Clark; Columbia; Cowlitz; Franklin; Garfield;
     * Grant south of approximately 47°30'N; Grays Harbor; Kittitas; Klickitat; Lewis; Mason; Pacific; Pierce;
     * Skamania; Thurston; Wahkiakum; Walla Walla; Whitman; Yakima
     * State law defines system in US survey feet. Federal definition is metric - see code 2856. Replaces NAD83 / SPCS
     * for applications with an accuracy of better than 3 feet. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_WASHINGTON_SOUTH_FTUS = 'urn:ogc:def:crs:EPSG::2927';

    /**
     * NAD83(HARN) / West Virginia North
     * Extent: USA - West Virginia - counties of Barbour; Berkeley; Brooke; Doddridge; Grant; Hampshire; Hancock;
     * Hardy; Harrison; Jefferson; Marion; Marshall; Mineral; Monongalia; Morgan; Ohio; Pleasants; Preston; Ritchie;
     * Taylor; Tucker; Tyler; Wetzel; Wirt; Wood
     * State law defines system in US survey feet. See CRS code 26861 for equivalent non-metric definition. Replaces
     * NAD83 / SPCS for applications with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_WEST_VIRGINIA_NORTH = 'urn:ogc:def:crs:EPSG::2857';

    /**
     * NAD83(HARN) / West Virginia North (ftUS)
     * Extent: USA - West Virginia - counties of Barbour; Berkeley; Brooke; Doddridge; Grant; Hampshire; Hancock;
     * Hardy; Harrison; Jefferson; Marion; Marshall; Mineral; Monongalia; Morgan; Ohio; Pleasants; Preston; Ritchie;
     * Taylor; Tucker; Tyler; Wetzel; Wirt; Wood
     * State law defines use of US survey feet. Federal definition is metric - see code 2857. Replaces NAD83 / SPCS for
     * applications with an accuracy of better than 3ft. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_WEST_VIRGINIA_NORTH_FTUS = 'urn:ogc:def:crs:EPSG::26861';

    /**
     * NAD83(HARN) / West Virginia South
     * Extent: USA - West Virginia - counties of Boone; Braxton; Cabell; Calhoun; Clay; Fayette; Gilmer; Greenbrier;
     * Jackson; Kanawha; Lewis; Lincoln; Logan; Mason; McDowell; Mercer; Mingo; Monroe; Nicholas; Pendleton;
     * Pocahontas; Putnam; Raleigh; Randolph; Roane; Summers; Upshur; Wayne; Webster; Wyoming
     * State law defines system in US survey feet. See CRS code 26862 for equivalent non-metric definition. Replaces
     * NAD83 / SPCS for applications with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_WEST_VIRGINIA_SOUTH = 'urn:ogc:def:crs:EPSG::2858';

    /**
     * NAD83(HARN) / West Virginia South (ftUS)
     * Extent: USA - West Virginia - counties of Boone; Braxton; Cabell; Calhoun; Clay; Fayette; Gilmer; Greenbrier;
     * Jackson; Kanawha; Lewis; Lincoln; Logan; Mason; McDowell; Mercer; Mingo; Monroe; Nicholas; Pendleton;
     * Pocahontas; Putnam; Raleigh; Randolph; Roane; Summers; Upshur; Wayne; Webster; Wyoming
     * State law defines use of US survey feet. Federal definition is metric - see code 2858. Replaces NAD83 / SPCS for
     * applications with an accuracy of better than 3ft. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_WEST_VIRGINIA_SOUTH_FTUS = 'urn:ogc:def:crs:EPSG::26862';

    /**
     * NAD83(HARN) / Wisconsin Central
     * Extent: USA - Wisconsin - counties of Barron; Brown; Buffalo; Chippewa; Clark; Door; Dunn; Eau Claire; Jackson;
     * Kewaunee; Langlade; Lincoln; Marathon; Marinette; Menominee; Oconto; Outagamie; Pepin; Pierce; Polk; Portage;
     * Rusk; Shawano; St Croix; Taylor; Trempealeau; Waupaca; Wood
     * State law defines system in US survey feet. See code 2929 for equivalent non-metric definition. Replaces NAD83 /
     * SPCS for applications with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_WISCONSIN_CENTRAL = 'urn:ogc:def:crs:EPSG::2860';

    /**
     * NAD83(HARN) / Wisconsin Central (ftUS)
     * Extent: USA - Wisconsin - counties of Barron; Brown; Buffalo; Chippewa; Clark; Door; Dunn; Eau Claire; Jackson;
     * Kewaunee; Langlade; Lincoln; Marathon; Marinette; Menominee; Oconto; Outagamie; Pepin; Pierce; Polk; Portage;
     * Rusk; Shawano; St Croix; Taylor; Trempealeau; Waupaca; Wood
     * State law defines system in US survey feet. Federal definition is metric - see code 2860. Replaces NAD83 / SPCS
     * for applications with an accuracy of better than 3 feet. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_WISCONSIN_CENTRAL_FTUS = 'urn:ogc:def:crs:EPSG::2929';

    /**
     * NAD83(HARN) / Wisconsin North
     * Extent: USA - Wisconsin - counties of Ashland; Bayfield; Burnett; Douglas; Florence; Forest; Iron; Oneida;
     * Price; Sawyer; Vilas; Washburn
     * State law defines system in US survey feet. See code 2928 for equivalent non-metric definition. Replaces NAD83 /
     * SPCS for applications with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_WISCONSIN_NORTH = 'urn:ogc:def:crs:EPSG::2859';

    /**
     * NAD83(HARN) / Wisconsin North (ftUS)
     * Extent: USA - Wisconsin - counties of Ashland; Bayfield; Burnett; Douglas; Florence; Forest; Iron; Oneida;
     * Price; Sawyer; Vilas; Washburn
     * State law defines system in US survey feet. Federal definition is metric - see code 2859. Replaces NAD83 / SPCS
     * for applications with an accuracy of better than 3 feet. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_WISCONSIN_NORTH_FTUS = 'urn:ogc:def:crs:EPSG::2928';

    /**
     * NAD83(HARN) / Wisconsin South
     * Extent: USA - Wisconsin - counties of Adams; Calumet; Columbia; Crawford; Dane; Dodge; Fond Du Lac; Grant;
     * Green; Green Lake; Iowa; Jefferson; Juneau; Kenosha; La Crosse; Lafayette; Manitowoc; Marquette; Milwaukee;
     * Monroe; Ozaukee; Racine; Richland; Rock; Sauk; Sheboygan; Vernon; Walworth; Washington; Waukesha; Waushara;
     * Winnebago
     * State law defines system in US survey feet. See code 2930 for equivalent non-metric definition. Replaces NAD83 /
     * SPCS for applications with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_WISCONSIN_SOUTH = 'urn:ogc:def:crs:EPSG::2861';

    /**
     * NAD83(HARN) / Wisconsin South (ftUS)
     * Extent: USA - Wisconsin - counties of Adams; Calumet; Columbia; Crawford; Dane; Dodge; Fond Du Lac; Grant;
     * Green; Green Lake; Iowa; Jefferson; Juneau; Kenosha; La Crosse; Lafayette; Manitowoc; Marquette; Milwaukee;
     * Monroe; Ozaukee; Racine; Richland; Rock; Sauk; Sheboygan; Vernon; Walworth; Washington; Waukesha; Waushara;
     * Winnebago
     * State law defines system in US survey feet. Federal definition is metric - see code 2861. Replaces NAD83 / SPCS
     * for applications with an accuracy of better than 3 feet. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_WISCONSIN_SOUTH_FTUS = 'urn:ogc:def:crs:EPSG::2930';

    /**
     * NAD83(HARN) / Wisconsin Transverse Mercator
     * Extent: USA - Wisconsin
     * Designed as a single zone for the whole state. Replaces NAD83 / Wisconsin Transverse Mercator for applications
     * with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) / Wisconsin Transverse Mercator.
     */
    public const EPSG_NAD83_HARN_WISCONSIN_TRANSVERSE_MERCATOR = 'urn:ogc:def:crs:EPSG::3071';

    /**
     * NAD83(HARN) / Wyoming East
     * Extent: USA - Wyoming - counties of Albany; Campbell; Converse; Crook; Goshen; Laramie; Niobrara; Platte; Weston
     * State law defines system in US survey feet. See code 3755 for equivalent non-metric definition. Replaces NAD83 /
     * SPCS for applications with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_WYOMING_EAST = 'urn:ogc:def:crs:EPSG::2862';

    /**
     * NAD83(HARN) / Wyoming East (ftUS)
     * Extent: USA - Wyoming - counties of Albany; Campbell; Converse; Crook; Goshen; Laramie; Niobrara; Platte; Weston
     * State law defines system in US survey feet. Federal definition is metric - see code 2862. Replaces NAD83 / SPCS
     * for applications with an accuracy of better than 3 feet. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_WYOMING_EAST_FTUS = 'urn:ogc:def:crs:EPSG::3755';

    /**
     * NAD83(HARN) / Wyoming East Central
     * Extent: USA - Wyoming - counties of Big Horn; Carbon; Johnson; Natrona; Sheridan; Washakie
     * State law defines system in US survey feet. See code 3756 for equivalent non-metric definition. Replaces NAD83 /
     * SPCS for applications with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_WYOMING_EAST_CENTRAL = 'urn:ogc:def:crs:EPSG::2863';

    /**
     * NAD83(HARN) / Wyoming East Central (ftUS)
     * Extent: USA - Wyoming - counties of Big Horn; Carbon; Johnson; Natrona; Sheridan; Washakie
     * State law defines system in US survey feet. Federal definition is metric - see code 2863. Replaces NAD83 / SPCS
     * for applications with an accuracy of better than 3 feet. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_WYOMING_EAST_CENTRAL_FTUS = 'urn:ogc:def:crs:EPSG::3756';

    /**
     * NAD83(HARN) / Wyoming West
     * Extent: USA - Wyoming - counties of Lincoln; Sublette; Teton; Uinta
     * State law defines system in US survey feet. See code 3758 for equivalent non-metric definition. Replaces NAD83 /
     * SPCS for applications with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_WYOMING_WEST = 'urn:ogc:def:crs:EPSG::2865';

    /**
     * NAD83(HARN) / Wyoming West (ftUS)
     * Extent: USA - Wyoming - counties of Lincoln; Sublette; Teton; Uinta
     * State law defines system in US survey feet. Federal definition is metric - see code 2865. Replaces NAD83 / SPCS
     * for applications with an accuracy of better than 3 feet. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_WYOMING_WEST_FTUS = 'urn:ogc:def:crs:EPSG::3758';

    /**
     * NAD83(HARN) / Wyoming West Central
     * Extent: USA - Wyoming - counties of Fremont; Hot Springs; Park; Sweetwater
     * State law defines system in US survey feet. See code 3757 for equivalent non-metric definition. Replaces NAD83 /
     * SPCS for applications with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_WYOMING_WEST_CENTRAL = 'urn:ogc:def:crs:EPSG::2864';

    /**
     * NAD83(HARN) / Wyoming West Central (ftUS)
     * Extent: USA - Wyoming - counties of Fremont; Hot Springs; Park; Sweetwater
     * State law defines system in US survey feet. Federal definition is metric - see code 2864. Replaces NAD83 / SPCS
     * for applications with an accuracy of better than 3 feet. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_WYOMING_WEST_CENTRAL_FTUS = 'urn:ogc:def:crs:EPSG::3757';

    /**
     * NAD83(MA11) / Guam Map Grid
     * Extent: Guam - onshore
     * Replaces NAD83(HARN) / Guam Map Grid (CRS code 4414).
     */
    public const EPSG_NAD83_MA11_GUAM_MAP_GRID = 'urn:ogc:def:crs:EPSG::6637';

    /**
     * NAD83(MA11) / UTM zone 54N
     * Extent: Guam and Northern Mariana Islands; offshore west of 144°E
     * Guam Public Law 23-131 uses the name "NAD83" for NAD83(MA11). NAD83 is a system realized only in North America
     * and different to NAD83(MA11).
     */
    public const EPSG_NAD83_MA11_UTM_ZONE_54N = 'urn:ogc:def:crs:EPSG::8692';

    /**
     * NAD83(MA11) / UTM zone 55N
     * Extent: Guam and Northern Mariana Islands; east of 144°E
     * Guam Public Law 23-131 uses the name "NAD83" for NAD83(MA11). NAD83 is a system realized only in North America
     * and different to NAD83(MA11).
     */
    public const EPSG_NAD83_MA11_UTM_ZONE_55N = 'urn:ogc:def:crs:EPSG::8693';

    /**
     * NAD83(NSRS2007) / Alabama East
     * Extent: USA - Alabama east of approximately 86°37'W - counties Barbour; Bullock; Calhoun; Chambers; Cherokee;
     * Clay; Cleburne; Coffee; Coosa; Covington; Crenshaw; Dale; De Kalb; Elmore; Etowah; Geneva; Henry; Houston;
     * Jackson; Lee; Macon; Madison; Marshall; Montgomery; Pike; Randolph; Russell; St Clair; Talladega; Tallapoosa
     * Replaces NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_ALABAMA_EAST = 'urn:ogc:def:crs:EPSG::3465';

    /**
     * NAD83(NSRS2007) / Alabama West
     * Extent: USA - Alabama west of approximately 86°37'W - counties Autauga; Baldwin; Bibb; Blount; Butler; Chilton;
     * Choctaw; Clarke; Colbert; Conecuh; Cullman; Dallas; Escambia; Fayette; Franklin; Greene; Hale; Jefferson; Lamar;
     * Lauderdale; Lawrence; Limestone; Lowndes; Marengo; Marion; Mobile; Monroe; Morgan; Perry; Pickens; Shelby;
     * Sumter; Tuscaloosa; Walker; Washington; Wilcox; Winston
     * Replaces NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_ALABAMA_WEST = 'urn:ogc:def:crs:EPSG::3466';

    /**
     * NAD83(NSRS2007) / Alaska Albers
     * Extent: USA - Alaska
     * Replaces NAD83 / Alaska Albers for applications with an accuracy of better than 1m.
     */
    public const EPSG_NAD83_NSRS2007_ALASKA_ALBERS = 'urn:ogc:def:crs:EPSG::3467';

    /**
     * NAD83(NSRS2007) / Alaska zone 1
     * Extent: USA - Alaska - east of 141°W; i.e. Panhandle
     * Replaces NAD83 / SPCS for applications with an accuracy of better than 1m.
     */
    public const EPSG_NAD83_NSRS2007_ALASKA_ZONE_1 = 'urn:ogc:def:crs:EPSG::3468';

    /**
     * NAD83(NSRS2007) / Alaska zone 10
     * Extent: USA - Alaska - Aleutian Islands onshore
     * Replaces NAD83 / SPCS for applications with an accuracy of better than 1m.
     */
    public const EPSG_NAD83_NSRS2007_ALASKA_ZONE_10 = 'urn:ogc:def:crs:EPSG::3477';

    /**
     * NAD83(NSRS2007) / Alaska zone 2
     * Extent: USA - Alaska - between 144°W and 141°W, onshore
     * Replaces NAD83 / SPCS for applications with an accuracy of better than 1m.
     */
    public const EPSG_NAD83_NSRS2007_ALASKA_ZONE_2 = 'urn:ogc:def:crs:EPSG::3469';

    /**
     * NAD83(NSRS2007) / Alaska zone 3
     * Extent: USA - Alaska - between 148°W and 144°W
     * Replaces NAD83 / SPCS for applications with an accuracy of better than 1m.
     */
    public const EPSG_NAD83_NSRS2007_ALASKA_ZONE_3 = 'urn:ogc:def:crs:EPSG::3470';

    /**
     * NAD83(NSRS2007) / Alaska zone 4
     * Extent: USA - Alaska - between 152°W and 148°W, onshore
     * Replaces NAD83 / SPCS for applications with an accuracy of better than 1m.
     */
    public const EPSG_NAD83_NSRS2007_ALASKA_ZONE_4 = 'urn:ogc:def:crs:EPSG::3471';

    /**
     * NAD83(NSRS2007) / Alaska zone 5
     * Extent: USA - Alaska - between 156°W and 152°W
     * Replaces NAD83 / SPCS for applications with an accuracy of better than 1m.
     */
    public const EPSG_NAD83_NSRS2007_ALASKA_ZONE_5 = 'urn:ogc:def:crs:EPSG::3472';

    /**
     * NAD83(NSRS2007) / Alaska zone 6
     * Extent: USA - Alaska - between 160°W and 156°W, onshore
     * Replaces NAD83 / SPCS for applications with an accuracy of better than 1m.
     */
    public const EPSG_NAD83_NSRS2007_ALASKA_ZONE_6 = 'urn:ogc:def:crs:EPSG::3473';

    /**
     * NAD83(NSRS2007) / Alaska zone 7
     * Extent: USA - Alaska - between 164°W and 160°W, onshore
     * Replaces NAD83 / SPCS for applications with an accuracy of better than 1m.
     */
    public const EPSG_NAD83_NSRS2007_ALASKA_ZONE_7 = 'urn:ogc:def:crs:EPSG::3474';

    /**
     * NAD83(NSRS2007) / Alaska zone 8
     * Extent: USA - Alaska onshore north of 54°30'N and between 168°W and 164°W
     * Replaces NAD83 / SPCS for applications with an accuracy of better than 1m.
     */
    public const EPSG_NAD83_NSRS2007_ALASKA_ZONE_8 = 'urn:ogc:def:crs:EPSG::3475';

    /**
     * NAD83(NSRS2007) / Alaska zone 9
     * Extent: USA - Alaska onshore north of 54°30'N and west of 168°W
     * Replaces NAD83 / SPCS for applications with an accuracy of better than 1m.
     */
    public const EPSG_NAD83_NSRS2007_ALASKA_ZONE_9 = 'urn:ogc:def:crs:EPSG::3476';

    /**
     * NAD83(NSRS2007) / Arizona Central
     * Extent: USA - Arizona - counties Coconino; Maricopa; Pima; Pinal; Santa Cruz; Yavapai
     * State law defines use of International feet (note: not US survey feet). See code 3479 for equivalent non-metric
     * definition. Replaces NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_ARIZONA_CENTRAL = 'urn:ogc:def:crs:EPSG::3478';

    /**
     * NAD83(NSRS2007) / Arizona Central (ft)
     * Extent: USA - Arizona - counties Coconino; Maricopa; Pima; Pinal; Santa Cruz; Yavapai
     * State law defines use of International feet (note: not US survey feet). Federal definition is metric - see code
     * 3478. Replaces NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_ARIZONA_CENTRAL_FT = 'urn:ogc:def:crs:EPSG::3479';

    /**
     * NAD83(NSRS2007) / Arizona East
     * Extent: USA - Arizona - counties Apache; Cochise; Gila; Graham; Greenlee; Navajo
     * State law defines use of International feet (note: not US survey feet). See code 3481 for equivalent non-metric
     * definition. Replaces NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_ARIZONA_EAST = 'urn:ogc:def:crs:EPSG::3480';

    /**
     * NAD83(NSRS2007) / Arizona East (ft)
     * Extent: USA - Arizona - counties Apache; Cochise; Gila; Graham; Greenlee; Navajo
     * State law defines use of International feet (note: not US survey feet). Federal definition is metric - see code
     * 3480. Replaces NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_ARIZONA_EAST_FT = 'urn:ogc:def:crs:EPSG::3481';

    /**
     * NAD83(NSRS2007) / Arizona West
     * Extent: USA - Arizona - counties of La Paz; Mohave; Yuma
     * State law defines use of International feet (note: not US survey feet). See code 3483 for equivalent non-metric
     * definition. Replaces NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_ARIZONA_WEST = 'urn:ogc:def:crs:EPSG::3482';

    /**
     * NAD83(NSRS2007) / Arizona West (ft)
     * Extent: USA - Arizona - counties of La Paz; Mohave; Yuma
     * State law defines use of International feet (note: not US survey feet). Federal definition is metric - see code
     * 3482. Replaces NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_ARIZONA_WEST_FT = 'urn:ogc:def:crs:EPSG::3483';

    /**
     * NAD83(NSRS2007) / Arkansas North
     * Extent: USA - Arkansas - counties of Baxter; Benton; Boone; Carroll; Clay; Cleburne; Conway; Craighead;
     * Crawford; Crittenden; Cross; Faulkner; Franklin; Fulton; Greene; Independence; Izard; Jackson; Johnson;
     * Lawrence; Logan; Madison; Marion; Mississippi; Newton; Perry; Poinsett; Pope; Randolph; Scott; Searcy;
     * Sebastian; Sharp; St Francis; Stone; Van Buren; Washington; White; Woodruff; Yell
     * State law defines use of US survey feet. See code 3485 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_ARKANSAS_NORTH = 'urn:ogc:def:crs:EPSG::3484';

    /**
     * NAD83(NSRS2007) / Arkansas North (ftUS)
     * Extent: USA - Arkansas - counties of Baxter; Benton; Boone; Carroll; Clay; Cleburne; Conway; Craighead;
     * Crawford; Crittenden; Cross; Faulkner; Franklin; Fulton; Greene; Independence; Izard; Jackson; Johnson;
     * Lawrence; Logan; Madison; Marion; Mississippi; Newton; Perry; Poinsett; Pope; Randolph; Scott; Searcy;
     * Sebastian; Sharp; St Francis; Stone; Van Buren; Washington; White; Woodruff; Yell
     * State law defines use of US survey feet. Federal definition is metric - see code 3484. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_ARKANSAS_NORTH_FTUS = 'urn:ogc:def:crs:EPSG::3485';

    /**
     * NAD83(NSRS2007) / Arkansas South
     * Extent: USA - Arkansas - counties Arkansas; Ashley; Bradley; Calhoun; Chicot; Clark; Cleveland; Columbia;
     * Dallas; Desha; Drew; Garland; Grant; Hempstead; Hot Spring; Howard; Jefferson; Lafayette; Lee; Lincoln; Little
     * River; Lonoke; Miller; Monroe; Montgomery; Nevada; Ouachita; Phillips; Pike; Polk; Prairie; Pulaski; Saline;
     * Sevier; Union
     * State law defines use of US survey feet. See code 3487 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_ARKANSAS_SOUTH = 'urn:ogc:def:crs:EPSG::3486';

    /**
     * NAD83(NSRS2007) / Arkansas South (ftUS)
     * Extent: USA - Arkansas - counties Arkansas; Ashley; Bradley; Calhoun; Chicot; Clark; Cleveland; Columbia;
     * Dallas; Desha; Drew; Garland; Grant; Hempstead; Hot Spring; Howard; Jefferson; Lafayette; Lee; Lincoln; Little
     * River; Lonoke; Miller; Monroe; Montgomery; Nevada; Ouachita; Phillips; Pike; Polk; Prairie; Pulaski; Saline;
     * Sevier; Union
     * State law defines use of US survey feet. Federal definition is metric - see code 3486. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_ARKANSAS_SOUTH_FTUS = 'urn:ogc:def:crs:EPSG::3487';

    /**
     * NAD83(NSRS2007) / California Albers
     * Extent: USA - California
     * Replaces NAD83(HARN) / California Albers.
     */
    public const EPSG_NAD83_NSRS2007_CALIFORNIA_ALBERS = 'urn:ogc:def:crs:EPSG::3488';

    /**
     * NAD83(NSRS2007) / California zone 1
     * Extent: USA - California - counties Del Norte; Humboldt; Lassen; Modoc; Plumas; Shasta; Siskiyou; Tehama;
     * Trinity
     * State law defines use of US survey feet. See code 3490 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_CALIFORNIA_ZONE_1 = 'urn:ogc:def:crs:EPSG::3489';

    /**
     * NAD83(NSRS2007) / California zone 1 (ftUS)
     * Extent: USA - California - counties Del Norte; Humboldt; Lassen; Modoc; Plumas; Shasta; Siskiyou; Tehama;
     * Trinity
     * State law defines use of US survey feet. Federal definition is metric - see code 3489. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_CALIFORNIA_ZONE_1_FTUS = 'urn:ogc:def:crs:EPSG::3490';

    /**
     * NAD83(NSRS2007) / California zone 2
     * Extent: USA - California - counties of Alpine; Amador; Butte; Colusa; El Dorado; Glenn; Lake; Mendocino; Napa;
     * Nevada; Placer; Sacramento; Sierra; Solano; Sonoma; Sutter; Yolo; Yuba
     * State law defines use of US survey feet. See code 3492 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_CALIFORNIA_ZONE_2 = 'urn:ogc:def:crs:EPSG::3491';

    /**
     * NAD83(NSRS2007) / California zone 2 (ftUS)
     * Extent: USA - California - counties of Alpine; Amador; Butte; Colusa; El Dorado; Glenn; Lake; Mendocino; Napa;
     * Nevada; Placer; Sacramento; Sierra; Solano; Sonoma; Sutter; Yolo; Yuba
     * State law defines use of US survey feet. Federal definition is metric - see code 3491. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_CALIFORNIA_ZONE_2_FTUS = 'urn:ogc:def:crs:EPSG::3492';

    /**
     * NAD83(NSRS2007) / California zone 3
     * Extent: USA - California - counties Alameda; Calaveras; Contra Costa; Madera; Marin; Mariposa; Merced; Mono; San
     * Francisco; San Joaquin; San Mateo; Santa Clara; Santa Cruz; Stanislaus; Tuolumne
     * State law defines use of US survey feet. See code 3494 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_CALIFORNIA_ZONE_3 = 'urn:ogc:def:crs:EPSG::3493';

    /**
     * NAD83(NSRS2007) / California zone 3 (ftUS)
     * Extent: USA - California - counties Alameda; Calaveras; Contra Costa; Madera; Marin; Mariposa; Merced; Mono; San
     * Francisco; San Joaquin; San Mateo; Santa Clara; Santa Cruz; Stanislaus; Tuolumne
     * State law defines use of US survey feet. Federal definition is metric - see code 3493. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_CALIFORNIA_ZONE_3_FTUS = 'urn:ogc:def:crs:EPSG::3494';

    /**
     * NAD83(NSRS2007) / California zone 4
     * Extent: USA - California - counties Fresno; Inyo; Kings; Monterey; San Benito; Tulare
     * State law defines use of US survey feet. See code 3496 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_CALIFORNIA_ZONE_4 = 'urn:ogc:def:crs:EPSG::3495';

    /**
     * NAD83(NSRS2007) / California zone 4 (ftUS)
     * Extent: USA - California - counties Fresno; Inyo; Kings; Monterey; San Benito; Tulare
     * State law defines use of US survey feet. Federal definition is metric - see code 3495. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_CALIFORNIA_ZONE_4_FTUS = 'urn:ogc:def:crs:EPSG::3496';

    /**
     * NAD83(NSRS2007) / California zone 5
     * Extent: USA - California - counties Kern; Los Angeles; San Bernardino; San Luis Obispo; Santa Barbara; Ventura
     * State law defines use of US survey feet. See code 3498 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_CALIFORNIA_ZONE_5 = 'urn:ogc:def:crs:EPSG::3497';

    /**
     * NAD83(NSRS2007) / California zone 5 (ftUS)
     * Extent: USA - California - counties Kern; Los Angeles; San Bernardino; San Luis Obispo; Santa Barbara; Ventura
     * State law defines use of US survey feet. Federal definition is metric - see code 3497. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_CALIFORNIA_ZONE_5_FTUS = 'urn:ogc:def:crs:EPSG::3498';

    /**
     * NAD83(NSRS2007) / California zone 6
     * Extent: USA - California - counties Imperial; Orange; Riverside; San Diego
     * State law defines use of US survey feet. See code 3500 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_CALIFORNIA_ZONE_6 = 'urn:ogc:def:crs:EPSG::3499';

    /**
     * NAD83(NSRS2007) / California zone 6 (ftUS)
     * Extent: USA - California - counties Imperial; Orange; Riverside; San Diego
     * State law defines use of US survey feet. Federal definition is metric - see code 3499. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_CALIFORNIA_ZONE_6_FTUS = 'urn:ogc:def:crs:EPSG::3500';

    /**
     * NAD83(NSRS2007) / Colorado Central
     * Extent: USA - Colorado - counties Arapahoe; Chaffee; Cheyenne; Clear Creek; Delta; Denver; Douglas; Eagle; El
     * Paso; Elbert; Fremont; Garfield; Gunnison; Jefferson; Kit Carson; Lake; Lincoln; Mesa; Park; Pitkin; Summit;
     * Teller
     * State law defines use of US survey feet. See code 3502 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_COLORADO_CENTRAL = 'urn:ogc:def:crs:EPSG::3501';

    /**
     * NAD83(NSRS2007) / Colorado Central (ftUS)
     * Extent: USA - Colorado - counties Arapahoe; Chaffee; Cheyenne; Clear Creek; Delta; Denver; Douglas; Eagle; El
     * Paso; Elbert; Fremont; Garfield; Gunnison; Jefferson; Kit Carson; Lake; Lincoln; Mesa; Park; Pitkin; Summit;
     * Teller
     * State law defines use of US survey feet. Federal definition is metric - see code 3501. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_COLORADO_CENTRAL_FTUS = 'urn:ogc:def:crs:EPSG::3502';

    /**
     * NAD83(NSRS2007) / Colorado North
     * Extent: USA - Colorado - counties Adams; Boulder; Gilpin; Grand; Jackson; Larimer; Logan; Moffat; Morgan;
     * Phillips; Rio Blanco; Routt; Sedgwick; Washington; Weld; Yuma
     * State law defines use of US survey feet. See code 3504 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_COLORADO_NORTH = 'urn:ogc:def:crs:EPSG::3503';

    /**
     * NAD83(NSRS2007) / Colorado North (ftUS)
     * Extent: USA - Colorado - counties Adams; Boulder; Gilpin; Grand; Jackson; Larimer; Logan; Moffat; Morgan;
     * Phillips; Rio Blanco; Routt; Sedgwick; Washington; Weld; Yuma
     * State law defines use of US survey feet. Federal definition is metric - see code 3503. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_COLORADO_NORTH_FTUS = 'urn:ogc:def:crs:EPSG::3504';

    /**
     * NAD83(NSRS2007) / Colorado South
     * Extent: USA - Colorado - counties Alamosa; Archuleta; Baca; Bent; Conejos; Costilla; Crowley; Custer; Dolores;
     * Hinsdale; Huerfano; Kiowa; La Plata; Las Animas; Mineral; Montezuma; Montrose; Otero; Ouray; Prowers; Pueblo;
     * Rio Grande; Saguache; San Juan; San Miguel
     * State law defines use of US survey feet. See code 3506 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_COLORADO_SOUTH = 'urn:ogc:def:crs:EPSG::3505';

    /**
     * NAD83(NSRS2007) / Colorado South (ftUS)
     * Extent: USA - Colorado - counties Alamosa; Archuleta; Baca; Bent; Conejos; Costilla; Crowley; Custer; Dolores;
     * Hinsdale; Huerfano; Kiowa; La Plata; Las Animas; Mineral; Montezuma; Montrose; Otero; Ouray; Prowers; Pueblo;
     * Rio Grande; Saguache; San Juan; San Miguel
     * State law defines use of US survey feet. Federal definition is metric - see code 3505. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_COLORADO_SOUTH_FTUS = 'urn:ogc:def:crs:EPSG::3506';

    /**
     * NAD83(NSRS2007) / Connecticut
     * Extent: USA - Connecticut - counties of Fairfield; Hartford; Litchfield; Middlesex; New Haven; New London;
     * Tolland; Windham
     * State law defines use of US survey feet. See code 3508 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_CONNECTICUT = 'urn:ogc:def:crs:EPSG::3507';

    /**
     * NAD83(NSRS2007) / Connecticut (ftUS)
     * Extent: USA - Connecticut - counties of Fairfield; Hartford; Litchfield; Middlesex; New Haven; New London;
     * Tolland; Windham
     * State law defines use of US survey feet. Federal definition is metric - see code 3507. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_CONNECTICUT_FTUS = 'urn:ogc:def:crs:EPSG::3508';

    /**
     * NAD83(NSRS2007) / Conus Albers
     * Extent: USA - CONUS onshore - Alabama; Arizona; Arkansas; California; Colorado; Connecticut; Delaware; Florida;
     * Georgia; Idaho; Illinois; Indiana; Iowa; Kansas; Kentucky; Louisiana; Maine; Maryland; Massachusetts; Michigan;
     * Minnesota; Mississippi; Missouri; Montana; Nebraska; Nevada; New Hampshire; New Jersey; New Mexico; New York;
     * North Carolina; North Dakota; Ohio; Oklahoma; Oregon; Pennsylvania; Rhode Island; South Carolina; South Dakota;
     * Tennessee; Texas; Utah; Vermont; Virginia; Washington; West Virginia; Wisconsin; Wyoming
     * Replaces NAD83(HARN) / Conus Albers (CRS code 5071).
     */
    public const EPSG_NAD83_NSRS2007_CONUS_ALBERS = 'urn:ogc:def:crs:EPSG::5072';

    /**
     * NAD83(NSRS2007) / Delaware
     * Extent: USA - Delaware - counties of Kent; New Castle; Sussex
     * State law defines use of US survey feet. See code 3510 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_DELAWARE = 'urn:ogc:def:crs:EPSG::3509';

    /**
     * NAD83(NSRS2007) / Delaware (ftUS)
     * Extent: USA - Delaware - counties of Kent; New Castle; Sussex
     * State law defines use of US survey feet. Federal definition is metric - see code 3509. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_DELAWARE_FTUS = 'urn:ogc:def:crs:EPSG::3510';

    /**
     * NAD83(NSRS2007) / EPSG Arctic zone 5-29
     * Extent: Arctic - between 74°30'N and 69°30'N, approximately 173°W to approximately 153°W. May be extended
     * eastwards within the latitude limits.
     */
    public const EPSG_NAD83_NSRS2007_EPSG_ARCTIC_ZONE_5_29 = 'urn:ogc:def:crs:EPSG::6094';

    /**
     * NAD83(NSRS2007) / EPSG Arctic zone 5-31
     * Extent: Arctic - between 74°30'N and 69°30'N, approximately 157°W to approximately 137°W. May be extended
     * westwards within the latitude limits.
     */
    public const EPSG_NAD83_NSRS2007_EPSG_ARCTIC_ZONE_5_31 = 'urn:ogc:def:crs:EPSG::6095';

    /**
     * NAD83(NSRS2007) / EPSG Arctic zone 6-14
     * Extent: Arctic - between 71°10'N and 66°10'N, approximately 174°W to approximately 156°W. May be extended
     * eastwards within the latitude limits.
     */
    public const EPSG_NAD83_NSRS2007_EPSG_ARCTIC_ZONE_6_14 = 'urn:ogc:def:crs:EPSG::6096';

    /**
     * NAD83(NSRS2007) / EPSG Arctic zone 6-16
     * Extent: Arctic - between 71°10'N and 66°10'N, approximately 156°W to approximately 138°W. May be extended
     * westwards within the latitude limits.
     */
    public const EPSG_NAD83_NSRS2007_EPSG_ARCTIC_ZONE_6_16 = 'urn:ogc:def:crs:EPSG::6097';

    /**
     * NAD83(NSRS2007) / Florida East
     * Extent: USA - Florida - counties of Brevard; Broward; Clay; Collier; Dade; Duval; Flagler; Glades; Hendry;
     * Highlands; Indian River; Lake; Martin; Monroe; Nassau; Okeechobee; Orange; Osceola; Palm Beach; Putnam;
     * Seminole; St Johns; St Lucie; Volusia
     * State law defines use of US survey feet. See code 3512 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_FLORIDA_EAST = 'urn:ogc:def:crs:EPSG::3511';

    /**
     * NAD83(NSRS2007) / Florida East (ftUS)
     * Extent: USA - Florida - counties of Brevard; Broward; Clay; Collier; Dade; Duval; Flagler; Glades; Hendry;
     * Highlands; Indian River; Lake; Martin; Monroe; Nassau; Okeechobee; Orange; Osceola; Palm Beach; Putnam;
     * Seminole; St Johns; St Lucie; Volusia
     * State law defines use of US survey feet. Federal definition is metric - see code 3511. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_FLORIDA_EAST_FTUS = 'urn:ogc:def:crs:EPSG::3512';

    /**
     * NAD83(NSRS2007) / Florida GDL Albers
     * Extent: USA - Florida
     * Replaces NAD83(HARN) / Florida GDL Albers.
     */
    public const EPSG_NAD83_NSRS2007_FLORIDA_GDL_ALBERS = 'urn:ogc:def:crs:EPSG::3513';

    /**
     * NAD83(NSRS2007) / Florida North
     * Extent: USA - Florida - counties of Alachua; Baker; Bay; Bradford; Calhoun; Columbia; Dixie; Escambia; Franklin;
     * Gadsden; Gilchrist; Gulf; Hamilton; Holmes; Jackson; Jefferson; Lafayette; Leon; Liberty; Madison; Okaloosa;
     * Santa Rosa; Suwannee; Taylor; Union; Wakulla; Walton; Washington
     * State law defines use of US survey feet. See code 3515 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_FLORIDA_NORTH = 'urn:ogc:def:crs:EPSG::3514';

    /**
     * NAD83(NSRS2007) / Florida North (ftUS)
     * Extent: USA - Florida - counties of Alachua; Baker; Bay; Bradford; Calhoun; Columbia; Dixie; Escambia; Franklin;
     * Gadsden; Gilchrist; Gulf; Hamilton; Holmes; Jackson; Jefferson; Lafayette; Leon; Liberty; Madison; Okaloosa;
     * Santa Rosa; Suwannee; Taylor; Union; Wakulla; Walton; Washington
     * State law defines use of US survey feet. Federal definition is metric - see code 3514. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_FLORIDA_NORTH_FTUS = 'urn:ogc:def:crs:EPSG::3515';

    /**
     * NAD83(NSRS2007) / Florida West
     * Extent: USA - Florida - counties of Charlotte; Citrus; De Soto; Hardee; Hernando; Hillsborough; Lee; Levy;
     * Manatee; Marion; Pasco; Pinellas; Polk; Sarasota; Sumter
     * State law defines use of US survey feet. See code 3517 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_FLORIDA_WEST = 'urn:ogc:def:crs:EPSG::3516';

    /**
     * NAD83(NSRS2007) / Florida West (ftUS)
     * Extent: USA - Florida - counties of Charlotte; Citrus; De Soto; Hardee; Hernando; Hillsborough; Lee; Levy;
     * Manatee; Marion; Pasco; Pinellas; Polk; Sarasota; Sumter
     * State law defines use of US survey feet. Federal definition is metric - see code 3516. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_FLORIDA_WEST_FTUS = 'urn:ogc:def:crs:EPSG::3517';

    /**
     * NAD83(NSRS2007) / Georgia East
     * Extent: USA - Georgia - counties of Appling; Atkinson; Bacon; Baldwin; Brantley; Bryan; Bulloch; Burke; Camden;
     * Candler; Charlton; Chatham; Clinch; Coffee; Columbia; Dodge; Echols; Effingham; Elbert; Emanuel; Evans;
     * Franklin; Glascock; Glynn; Greene; Hancock; Hart; Jeff Davis; Jefferson; Jenkins; Johnson; Lanier; Laurens;
     * Liberty; Lincoln; Long; Madison; McDuffie; McIntosh; Montgomery; Oglethorpe; Pierce; Richmond; Screven;
     * Stephens; Taliaferro; Tattnall; Telfair; Toombs; Treutlen; Ware; Warren; Washington; Wayne; Wheeler; Wilkes;
     * Wilkinson
     * State law defines use of US survey feet. See code 3519 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_GEORGIA_EAST = 'urn:ogc:def:crs:EPSG::3518';

    /**
     * NAD83(NSRS2007) / Georgia East (ftUS)
     * Extent: USA - Georgia - counties of Appling; Atkinson; Bacon; Baldwin; Brantley; Bryan; Bulloch; Burke; Camden;
     * Candler; Charlton; Chatham; Clinch; Coffee; Columbia; Dodge; Echols; Effingham; Elbert; Emanuel; Evans;
     * Franklin; Glascock; Glynn; Greene; Hancock; Hart; Jeff Davis; Jefferson; Jenkins; Johnson; Lanier; Laurens;
     * Liberty; Lincoln; Long; Madison; McDuffie; McIntosh; Montgomery; Oglethorpe; Pierce; Richmond; Screven;
     * Stephens; Taliaferro; Tattnall; Telfair; Toombs; Treutlen; Ware; Warren; Washington; Wayne; Wheeler; Wilkes;
     * Wilkinson
     * State law defines use of US survey feet. Federal definition is metric - see code 3518. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_GEORGIA_EAST_FTUS = 'urn:ogc:def:crs:EPSG::3519';

    /**
     * NAD83(NSRS2007) / Georgia West
     * Extent: USA - Georgia - counties of Baker; Banks; Barrow; Bartow; Ben Hill; Berrien; Bibb; Bleckley; Brooks;
     * Butts; Calhoun; Carroll; Catoosa; Chattahoochee; Chattooga; Cherokee; Clarke; Clay; Clayton; Cobb; Colquitt;
     * Cook; Coweta; Crawford; Crisp; Dade; Dawson; De Kalb; Decatur; Dooly; Dougherty; Douglas; Early; Fannin;
     * Fayette; Floyd; Forsyth; Fulton; Gilmer; Gordon; Grady; Gwinnett; Habersham; Hall; Haralson; Harris; Heard;
     * Henry; Houston; Irwin; Jackson; Jasper; Jones; Lamar; Lee; Lowndes; Lumpkin; Macon; Marion; Meriwether; Miller;
     * Mitchell; Monroe; Morgan; Murray; Muscogee; Newton; Oconee; Paulding; Peach; Pickens; Pike; Polk; Pulaski;
     * Putnam; Quitman; Rabun; Randolph; Rockdale; Schley; Seminole; Spalding; Stewart; Sumter; Talbot; Taylor;
     * Terrell; Thomas; Tift; Towns; Troup; Turner; Twiggs; Union; Upson; Walker; Walton; Webster; White; Whitfield;
     * Wilcox; Worth
     * State law defines use of US survey feet. See code 3521 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_GEORGIA_WEST = 'urn:ogc:def:crs:EPSG::3520';

    /**
     * NAD83(NSRS2007) / Georgia West (ftUS)
     * Extent: USA - Georgia - counties of Baker; Banks; Barrow; Bartow; Ben Hill; Berrien; Bibb; Bleckley; Brooks;
     * Butts; Calhoun; Carroll; Catoosa; Chattahoochee; Chattooga; Cherokee; Clarke; Clay; Clayton; Cobb; Colquitt;
     * Cook; Coweta; Crawford; Crisp; Dade; Dawson; De Kalb; Decatur; Dooly; Dougherty; Douglas; Early; Fannin;
     * Fayette; Floyd; Forsyth; Fulton; Gilmer; Gordon; Grady; Gwinnett; Habersham; Hall; Haralson; Harris; Heard;
     * Henry; Houston; Irwin; Jackson; Jasper; Jones; Lamar; Lee; Lowndes; Lumpkin; Macon; Marion; Meriwether; Miller;
     * Mitchell; Monroe; Morgan; Murray; Muscogee; Newton; Oconee; Paulding; Peach; Pickens; Pike; Polk; Pulaski;
     * Putnam; Quitman; Rabun; Randolph; Rockdale; Schley; Seminole; Spalding; Stewart; Sumter; Talbot; Taylor;
     * Terrell; Thomas; Tift; Towns; Troup; Turner; Twiggs; Union; Upson; Walker; Walton; Webster; White; Whitfield;
     * Wilcox; Worth
     * State law defines use of US survey feet. Federal definition is metric - see code 3520. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_GEORGIA_WEST_FTUS = 'urn:ogc:def:crs:EPSG::3521';

    /**
     * NAD83(NSRS2007) / Idaho Central
     * Extent: USA - Idaho - counties of Blaine; Butte; Camas; Cassia; Custer; Gooding; Jerome; Lemhi; Lincoln;
     * Minidoka; Twin Falls
     * State law defines use of US survey feet. See code 3523 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_IDAHO_CENTRAL = 'urn:ogc:def:crs:EPSG::3522';

    /**
     * NAD83(NSRS2007) / Idaho Central (ftUS)
     * Extent: USA - Idaho - counties of Blaine; Butte; Camas; Cassia; Custer; Gooding; Jerome; Lemhi; Lincoln;
     * Minidoka; Twin Falls
     * State law defines use of US survey feet. Federal definition is metric - see code 3522. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_IDAHO_CENTRAL_FTUS = 'urn:ogc:def:crs:EPSG::3523';

    /**
     * NAD83(NSRS2007) / Idaho East
     * Extent: USA - Idaho - counties of Bannock; Bear Lake; Bingham; Bonneville; Caribou; Clark; Franklin; Fremont;
     * Jefferson; Madison; Oneida; Power; Teton
     * State law defines use of US survey feet. See code 3525 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_IDAHO_EAST = 'urn:ogc:def:crs:EPSG::3524';

    /**
     * NAD83(NSRS2007) / Idaho East (ftUS)
     * Extent: USA - Idaho - counties of Bannock; Bear Lake; Bingham; Bonneville; Caribou; Clark; Franklin; Fremont;
     * Jefferson; Madison; Oneida; Power; Teton
     * State law defines use of US survey feet. Federal definition is metric - see code 3524. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_IDAHO_EAST_FTUS = 'urn:ogc:def:crs:EPSG::3525';

    /**
     * NAD83(NSRS2007) / Idaho West
     * Extent: USA - Idaho - counties of Ada; Adams; Benewah; Boise; Bonner; Boundary; Canyon; Clearwater; Elmore; Gem;
     * Idaho; Kootenai; Latah; Lewis; Nez Perce; Owyhee; Payette; Shoshone; Valley; Washington
     * State law defines use of US survey feet. See code 3527 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_IDAHO_WEST = 'urn:ogc:def:crs:EPSG::3526';

    /**
     * NAD83(NSRS2007) / Idaho West (ftUS)
     * Extent: USA - Idaho - counties of Ada; Adams; Benewah; Boise; Bonner; Boundary; Canyon; Clearwater; Elmore; Gem;
     * Idaho; Kootenai; Latah; Lewis; Nez Perce; Owyhee; Payette; Shoshone; Valley; Washington
     * State law defines use of US survey feet. Federal definition is metric - see code 3526. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_IDAHO_WEST_FTUS = 'urn:ogc:def:crs:EPSG::3527';

    /**
     * NAD83(NSRS2007) / Illinois East
     * Extent: USA - Illinois - counties of Boone; Champaign; Clark; Clay; Coles; Cook; Crawford; Cumberland; De Kalb;
     * De Witt; Douglas; Du Page; Edgar; Edwards; Effingham; Fayette; Ford; Franklin; Gallatin; Grundy; Hamilton;
     * Hardin; Iroquois; Jasper; Jefferson; Johnson; Kane; Kankakee; Kendall; La Salle; Lake; Lawrence; Livingston;
     * Macon; Marion; Massac; McHenry; McLean; Moultrie; Piatt; Pope; Richland; Saline; Shelby; Vermilion; Wabash;
     * Wayne; White; Will; Williamson
     * State law defines use of US survey feet. See code 3529 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_ILLINOIS_EAST = 'urn:ogc:def:crs:EPSG::3528';

    /**
     * NAD83(NSRS2007) / Illinois East (ftUS)
     * Extent: USA - Illinois - counties of Boone; Champaign; Clark; Clay; Coles; Cook; Crawford; Cumberland; De Kalb;
     * De Witt; Douglas; Du Page; Edgar; Edwards; Effingham; Fayette; Ford; Franklin; Gallatin; Grundy; Hamilton;
     * Hardin; Iroquois; Jasper; Jefferson; Johnson; Kane; Kankakee; Kendall; La Salle; Lake; Lawrence; Livingston;
     * Macon; Marion; Massac; McHenry; McLean; Moultrie; Piatt; Pope; Richland; Saline; Shelby; Vermilion; Wabash;
     * Wayne; White; Will; Williamson
     * State law defines use of US survey feet. Federal definition is metric - see code 3528. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_ILLINOIS_EAST_FTUS = 'urn:ogc:def:crs:EPSG::3529';

    /**
     * NAD83(NSRS2007) / Illinois West
     * Extent: USA - Illinois - counties of Adams; Alexander; Bond; Brown; Bureau; Calhoun; Carroll; Cass; Christian;
     * Clinton; Fulton; Greene; Hancock; Henderson; Henry; Jackson; Jersey; Jo Daviess; Knox; Lee; Logan; Macoupin;
     * Madison; Marshall; Mason; McDonough; Menard; Mercer; Monroe; Montgomery; Morgan; Ogle; Peoria; Perry; Pike;
     * Pulaski; Putnam; Randolph; Rock Island; Sangamon; Schuyler; Scott; St Clair; Stark; Stephenson; Tazewell; Union;
     * Warren; Washington; Whiteside; Winnebago; Woodford
     * State law defines use of US survey feet. See code 3531 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_ILLINOIS_WEST = 'urn:ogc:def:crs:EPSG::3530';

    /**
     * NAD83(NSRS2007) / Illinois West (ftUS)
     * Extent: USA - Illinois - counties of Adams; Alexander; Bond; Brown; Bureau; Calhoun; Carroll; Cass; Christian;
     * Clinton; Fulton; Greene; Hancock; Henderson; Henry; Jackson; Jersey; Jo Daviess; Knox; Lee; Logan; Macoupin;
     * Madison; Marshall; Mason; McDonough; Menard; Mercer; Monroe; Montgomery; Morgan; Ogle; Peoria; Perry; Pike;
     * Pulaski; Putnam; Randolph; Rock Island; Sangamon; Schuyler; Scott; St Clair; Stark; Stephenson; Tazewell; Union;
     * Warren; Washington; Whiteside; Winnebago; Woodford
     * State law defines use of US survey feet. Federal definition is metric - see code 3530. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_ILLINOIS_WEST_FTUS = 'urn:ogc:def:crs:EPSG::3531';

    /**
     * NAD83(NSRS2007) / Indiana East
     * Extent: USA - Indiana - counties of Adams; Allen; Bartholomew; Blackford; Brown; Cass; Clark; De Kalb; Dearborn;
     * Decatur; Delaware; Elkhart; Fayette; Floyd; Franklin; Fulton; Grant; Hamilton; Hancock; Harrison; Henry; Howard;
     * Huntington; Jackson; Jay; Jefferson; Jennings; Johnson; Kosciusko; Lagrange; Madison; Marion; Marshall; Miami;
     * Noble; Ohio; Randolph; Ripley; Rush; Scott; Shelby; St Joseph; Steuben; Switzerland; Tipton; Union; Wabash;
     * Washington; Wayne; Wells; Whitley
     * State law defines use of US survey feet. See code 3533 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_INDIANA_EAST = 'urn:ogc:def:crs:EPSG::3532';

    /**
     * NAD83(NSRS2007) / Indiana East (ftUS)
     * Extent: USA - Indiana - counties of Adams; Allen; Bartholomew; Blackford; Brown; Cass; Clark; De Kalb; Dearborn;
     * Decatur; Delaware; Elkhart; Fayette; Floyd; Franklin; Fulton; Grant; Hamilton; Hancock; Harrison; Henry; Howard;
     * Huntington; Jackson; Jay; Jefferson; Jennings; Johnson; Kosciusko; Lagrange; Madison; Marion; Marshall; Miami;
     * Noble; Ohio; Randolph; Ripley; Rush; Scott; Shelby; St Joseph; Steuben; Switzerland; Tipton; Union; Wabash;
     * Washington; Wayne; Wells; Whitley
     * State law defines use of US survey feet. Federal definition is metric - see code 3532. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_INDIANA_EAST_FTUS = 'urn:ogc:def:crs:EPSG::3533';

    /**
     * NAD83(NSRS2007) / Indiana West
     * Extent: USA - Indiana - counties of Benton; Boone; Carroll; Clay; Clinton; Crawford; Daviess; Dubois; Fountain;
     * Gibson; Greene; Hendricks; Jasper; Knox; La Porte; Lake; Lawrence; Martin; Monroe; Montgomery; Morgan; Newton;
     * Orange; Owen; Parke; Perry; Pike; Porter; Posey; Pulaski; Putnam; Spencer; Starke; Sullivan; Tippecanoe;
     * Vanderburgh; Vermillion; Vigo; Warren; Warrick; White
     * State law defines use of US survey feet. See code 3535 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_INDIANA_WEST = 'urn:ogc:def:crs:EPSG::3534';

    /**
     * NAD83(NSRS2007) / Indiana West (ftUS)
     * Extent: USA - Indiana - counties of Benton; Boone; Carroll; Clay; Clinton; Crawford; Daviess; Dubois; Fountain;
     * Gibson; Greene; Hendricks; Jasper; Knox; La Porte; Lake; Lawrence; Martin; Monroe; Montgomery; Morgan; Newton;
     * Orange; Owen; Parke; Perry; Pike; Porter; Posey; Pulaski; Putnam; Spencer; Starke; Sullivan; Tippecanoe;
     * Vanderburgh; Vermillion; Vigo; Warren; Warrick; White
     * State law defines use of US survey feet. Federal definition is metric - see code 3534. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_INDIANA_WEST_FTUS = 'urn:ogc:def:crs:EPSG::3535';

    /**
     * NAD83(NSRS2007) / Iowa North
     * Extent: USA - Iowa - counties of Allamakee; Benton; Black Hawk; Boone; Bremer; Buchanan; Buena Vista; Butler;
     * Calhoun; Carroll; Cerro Gordo; Cherokee; Chickasaw; Clay; Clayton; Crawford; Delaware; Dickinson; Dubuque;
     * Emmet; Fayette; Floyd; Franklin; Greene; Grundy; Hamilton; Hancock; Hardin; Howard; Humboldt; Ida; Jackson;
     * Jones; Kossuth; Linn; Lyon; Marshall; Mitchell; Monona; O'Brien; Osceola; Palo Alto; Plymouth; Pocahontas; Sac;
     * Sioux; Story; Tama; Webster; Winnebago; Winneshiek; Woodbury; Worth; Wright
     * State law defines use of US survey feet. See code 3537 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_IOWA_NORTH = 'urn:ogc:def:crs:EPSG::3536';

    /**
     * NAD83(NSRS2007) / Iowa North (ftUS)
     * Extent: USA - Iowa - counties of Allamakee; Benton; Black Hawk; Boone; Bremer; Buchanan; Buena Vista; Butler;
     * Calhoun; Carroll; Cerro Gordo; Cherokee; Chickasaw; Clay; Clayton; Crawford; Delaware; Dickinson; Dubuque;
     * Emmet; Fayette; Floyd; Franklin; Greene; Grundy; Hamilton; Hancock; Hardin; Howard; Humboldt; Ida; Jackson;
     * Jones; Kossuth; Linn; Lyon; Marshall; Mitchell; Monona; O'Brien; Osceola; Palo Alto; Plymouth; Pocahontas; Sac;
     * Sioux; Story; Tama; Webster; Winnebago; Winneshiek; Woodbury; Worth; Wright
     * State law defines use of US survey feet. Federal definition is metric - see code 3536. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_IOWA_NORTH_FTUS = 'urn:ogc:def:crs:EPSG::3537';

    /**
     * NAD83(NSRS2007) / Iowa South
     * Extent: USA - Iowa - counties of Adair; Adams; Appanoose; Audubon; Cass; Cedar; Clarke; Clinton; Dallas; Davis;
     * Decatur; Des Moines; Fremont; Guthrie; Harrison; Henry; Iowa; Jasper; Jefferson; Johnson; Keokuk; Lee; Louisa;
     * Lucas; Madison; Mahaska; Marion; Mills; Monroe; Montgomery; Muscatine; Page; Polk; Pottawattamie; Poweshiek;
     * Ringgold; Scott; Shelby; Taylor; Union; Van Buren; Wapello; Warren; Washington; Wayne
     * State law defines use of US survey feet. See code 3539 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_IOWA_SOUTH = 'urn:ogc:def:crs:EPSG::3538';

    /**
     * NAD83(NSRS2007) / Iowa South (ftUS)
     * Extent: USA - Iowa - counties of Adair; Adams; Appanoose; Audubon; Cass; Cedar; Clarke; Clinton; Dallas; Davis;
     * Decatur; Des Moines; Fremont; Guthrie; Harrison; Henry; Iowa; Jasper; Jefferson; Johnson; Keokuk; Lee; Louisa;
     * Lucas; Madison; Mahaska; Marion; Mills; Monroe; Montgomery; Muscatine; Page; Polk; Pottawattamie; Poweshiek;
     * Ringgold; Scott; Shelby; Taylor; Union; Van Buren; Wapello; Warren; Washington; Wayne
     * State law defines use of US survey feet. Federal definition is metric - see code 3538. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_IOWA_SOUTH_FTUS = 'urn:ogc:def:crs:EPSG::3539';

    /**
     * NAD83(NSRS2007) / Kansas North
     * Extent: USA - Kansas - counties of Atchison; Brown; Cheyenne; Clay; Cloud; Decatur; Dickinson; Doniphan;
     * Douglas; Ellis; Ellsworth; Geary; Gove; Graham; Jackson; Jefferson; Jewell; Johnson; Leavenworth; Lincoln;
     * Logan; Marshall; Mitchell; Morris; Nemaha; Norton; Osborne; Ottawa; Phillips; Pottawatomie; Rawlins; Republic;
     * Riley; Rooks; Russell; Saline; Shawnee; Sheridan; Sherman; Smith; Thomas; Trego; Wabaunsee; Wallace; Washington;
     * Wyandotte
     * State law defines use of US survey feet. See code 3541 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_KANSAS_NORTH = 'urn:ogc:def:crs:EPSG::3540';

    /**
     * NAD83(NSRS2007) / Kansas North (ftUS)
     * Extent: USA - Kansas - counties of Atchison; Brown; Cheyenne; Clay; Cloud; Decatur; Dickinson; Doniphan;
     * Douglas; Ellis; Ellsworth; Geary; Gove; Graham; Jackson; Jefferson; Jewell; Johnson; Leavenworth; Lincoln;
     * Logan; Marshall; Mitchell; Morris; Nemaha; Norton; Osborne; Ottawa; Phillips; Pottawatomie; Rawlins; Republic;
     * Riley; Rooks; Russell; Saline; Shawnee; Sheridan; Sherman; Smith; Thomas; Trego; Wabaunsee; Wallace; Washington;
     * Wyandotte
     * State law defines use of US survey feet. Federal definition is metric - see code 3540. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_KANSAS_NORTH_FTUS = 'urn:ogc:def:crs:EPSG::3541';

    /**
     * NAD83(NSRS2007) / Kansas South
     * Extent: USA - Kansas - counties of Allen; Anderson; Barber; Barton; Bourbon; Butler; Chase; Chautauqua;
     * Cherokee; Clark; Coffey; Comanche; Cowley; Crawford; Edwards; Elk; Finney; Ford; Franklin; Grant; Gray; Greeley;
     * Greenwood; Hamilton; Harper; Harvey; Haskell; Hodgeman; Kearny; Kingman; Kiowa; Labette; Lane; Linn; Lyon;
     * Marion; McPherson; Meade; Miami; Montgomery; Morton; Neosho; Ness; Osage; Pawnee; Pratt; Reno; Rice; Rush;
     * Scott; Sedgwick; Seward; Stafford; Stanton; Stevens; Sumner; Wichita; Wilson; Woodson
     * State law defines use of US survey feet. See code 3543 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_KANSAS_SOUTH = 'urn:ogc:def:crs:EPSG::3542';

    /**
     * NAD83(NSRS2007) / Kansas South (ftUS)
     * Extent: USA - Kansas - counties of Allen; Anderson; Barber; Barton; Bourbon; Butler; Chase; Chautauqua;
     * Cherokee; Clark; Coffey; Comanche; Cowley; Crawford; Edwards; Elk; Finney; Ford; Franklin; Grant; Gray; Greeley;
     * Greenwood; Hamilton; Harper; Harvey; Haskell; Hodgeman; Kearny; Kingman; Kiowa; Labette; Lane; Linn; Lyon;
     * Marion; McPherson; Meade; Miami; Montgomery; Morton; Neosho; Ness; Osage; Pawnee; Pratt; Reno; Rice; Rush;
     * Scott; Sedgwick; Seward; Stafford; Stanton; Stevens; Sumner; Wichita; Wilson; Woodson
     * State law defines use of US survey feet. Federal definition is metric - see code 3542. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_KANSAS_SOUTH_FTUS = 'urn:ogc:def:crs:EPSG::3543';

    /**
     * NAD83(NSRS2007) / Kentucky North
     * Extent: USA - Kentucky - counties of Anderson; Bath; Boone; Bourbon; Boyd; Bracken; Bullitt; Campbell; Carroll;
     * Carter; Clark; Elliott; Fayette; Fleming; Franklin; Gallatin; Grant; Greenup; Harrison; Henry; Jefferson;
     * Jessamine; Kenton; Lawrence; Lewis; Mason; Menifee; Montgomery; Morgan; Nicholas; Oldham; Owen; Pendleton;
     * Robertson; Rowan; Scott; Shelby; Spencer; Trimble; Woodford
     * State law defines use of US survey feet. See code 3545 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_KENTUCKY_NORTH = 'urn:ogc:def:crs:EPSG::3544';

    /**
     * NAD83(NSRS2007) / Kentucky North (ftUS)
     * Extent: USA - Kentucky - counties of Anderson; Bath; Boone; Bourbon; Boyd; Bracken; Bullitt; Campbell; Carroll;
     * Carter; Clark; Elliott; Fayette; Fleming; Franklin; Gallatin; Grant; Greenup; Harrison; Henry; Jefferson;
     * Jessamine; Kenton; Lawrence; Lewis; Mason; Menifee; Montgomery; Morgan; Nicholas; Oldham; Owen; Pendleton;
     * Robertson; Rowan; Scott; Shelby; Spencer; Trimble; Woodford
     * State law defines use of US survey feet. Federal definition is metric - see code 3544. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_KENTUCKY_NORTH_FTUS = 'urn:ogc:def:crs:EPSG::3545';

    /**
     * NAD83(NSRS2007) / Kentucky Single Zone
     * Extent: USA - Kentucky
     * State law defines use of US survey feet. See code 3547 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / Kentucky Single Zone.
     */
    public const EPSG_NAD83_NSRS2007_KENTUCKY_SINGLE_ZONE = 'urn:ogc:def:crs:EPSG::3546';

    /**
     * NAD83(NSRS2007) / Kentucky Single Zone (ftUS)
     * Extent: USA - Kentucky
     * State law defines use of US survey feet. See code 3546 for equivalent metric definition. Replaces NAD83(HARN) /
     * Kentucky Single Zone (ftUS).
     */
    public const EPSG_NAD83_NSRS2007_KENTUCKY_SINGLE_ZONE_FTUS = 'urn:ogc:def:crs:EPSG::3547';

    /**
     * NAD83(NSRS2007) / Kentucky South
     * Extent: USA - Kentucky - counties of Adair; Allen; Ballard; Barren; Bell; Boyle; Breathitt; Breckinridge;
     * Butler; Caldwell; Calloway; Carlisle; Casey; Christian; Clay; Clinton; Crittenden; Cumberland; Daviess;
     * Edmonson; Estill; Floyd; Fulton; Garrard; Graves; Grayson; Green; Hancock; Hardin; Harlan; Hart; Henderson;
     * Hickman; Hopkins; Jackson; Johnson; Knott; Knox; Larue; Laurel; Lee; Leslie; Letcher; Lincoln; Livingston;
     * Logan; Lyon; Madison; Magoffin; Marion; Marshall; Martin; McCracken; McCreary; McLean; Meade; Mercer; Metcalfe;
     * Monroe; Muhlenberg; Nelson; Ohio; Owsley; Perry; Pike; Powell; Pulaski; Rockcastle; Russell; Simpson; Taylor;
     * Todd; Trigg; Union; Warren; Washington; Wayne; Webster; Whitley; Wolfe
     * State law defines use of US survey feet. See code 3549 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_KENTUCKY_SOUTH = 'urn:ogc:def:crs:EPSG::3548';

    /**
     * NAD83(NSRS2007) / Kentucky South (ftUS)
     * Extent: USA - Kentucky - counties of Adair; Allen; Ballard; Barren; Bell; Boyle; Breathitt; Breckinridge;
     * Butler; Caldwell; Calloway; Carlisle; Casey; Christian; Clay; Clinton; Crittenden; Cumberland; Daviess;
     * Edmonson; Estill; Floyd; Fulton; Garrard; Graves; Grayson; Green; Hancock; Hardin; Harlan; Hart; Henderson;
     * Hickman; Hopkins; Jackson; Johnson; Knott; Knox; Larue; Laurel; Lee; Leslie; Letcher; Lincoln; Livingston;
     * Logan; Lyon; Madison; Magoffin; Marion; Marshall; Martin; McCracken; McCreary; McLean; Meade; Mercer; Metcalfe;
     * Monroe; Muhlenberg; Nelson; Ohio; Owsley; Perry; Pike; Powell; Pulaski; Rockcastle; Russell; Simpson; Taylor;
     * Todd; Trigg; Union; Warren; Washington; Wayne; Webster; Whitley; Wolfe
     * State law defines use of US survey feet. Federal definition is metric - see code 3548. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_KENTUCKY_SOUTH_FTUS = 'urn:ogc:def:crs:EPSG::3549';

    /**
     * NAD83(NSRS2007) / Louisiana North
     * Extent: USA - Louisiana - counties of Avoyelles; Bienville; Bossier; Caddo; Caldwell; Catahoula; Claiborne;
     * Concordia; De Soto; East Carroll; Franklin; Grant; Jackson; La Salle; Lincoln; Madison; Morehouse; Natchitoches;
     * Ouachita; Rapides; Red River; Richland; Sabine; Tensas; Union; Vernon; Webster; West Carroll; Winn
     * State law defines use of US survey feet. See code 3551 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_LOUISIANA_NORTH = 'urn:ogc:def:crs:EPSG::3550';

    /**
     * NAD83(NSRS2007) / Louisiana North (ftUS)
     * Extent: USA - Louisiana - counties of Avoyelles; Bienville; Bossier; Caddo; Caldwell; Catahoula; Claiborne;
     * Concordia; De Soto; East Carroll; Franklin; Grant; Jackson; La Salle; Lincoln; Madison; Morehouse; Natchitoches;
     * Ouachita; Rapides; Red River; Richland; Sabine; Tensas; Union; Vernon; Webster; West Carroll; Winn
     * State law defines use of US survey feet. Federal definition is metric - see code 3550. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_LOUISIANA_NORTH_FTUS = 'urn:ogc:def:crs:EPSG::3551';

    /**
     * NAD83(NSRS2007) / Louisiana South
     * Extent: USA - Louisiana - counties of Acadia; Allen; Ascension; Assumption; Beauregard; Calcasieu; Cameron; East
     * Baton Rouge; East Feliciana; Evangeline; Iberia; Iberville; Jefferson; Jefferson Davis; Lafayette; LaFourche;
     * Livingston; Orleans; Plaquemines; Pointe Coupee; St Bernard; St Charles; St Helena; St James; St John the
     * Baptist; St Landry; St Martin; St Mary; St Tammany; Tangipahoa; Terrebonne; Vermilion; Washington; West Baton
     * Rouge; West Feliciana
     * Not applicable to offshore areas. State law defines use of US survey feet. See code 3553 for equivalent
     * non-metric definition. Replaces NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_LOUISIANA_SOUTH = 'urn:ogc:def:crs:EPSG::3552';

    /**
     * NAD83(NSRS2007) / Louisiana South (ftUS)
     * Extent: USA - Louisiana - counties of Acadia; Allen; Ascension; Assumption; Beauregard; Calcasieu; Cameron; East
     * Baton Rouge; East Feliciana; Evangeline; Iberia; Iberville; Jefferson; Jefferson Davis; Lafayette; LaFourche;
     * Livingston; Orleans; Plaquemines; Pointe Coupee; St Bernard; St Charles; St Helena; St James; St John the
     * Baptist; St Landry; St Martin; St Mary; St Tammany; Tangipahoa; Terrebonne; Vermilion; Washington; West Baton
     * Rouge; West Feliciana
     * Not applicable to offshore areas. State law defines use of US survey feet. Federal definition is metric - see
     * code 3552. Replaces NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_LOUISIANA_SOUTH_FTUS = 'urn:ogc:def:crs:EPSG::3553';

    /**
     * NAD83(NSRS2007) / Maine CS2000 Central
     * Extent: USA - Maine between approximately 69°40'W and 68°25'W. The area is bounded by the following: Beginning
     * at the point determined by the intersection of the Maine State line and the County Line between Aroostook and
     * Somerset Counties, thence northeasterly along the state line to the intersection of the Fort Kent - Frenchville
     * town line, thence southerly along this town line to the intersection with the New Canada Plantation - T17 R5
     * WELS town line, thence continuing southerly along town lines to the northeast corner of Penobscot County, thence
     * continuing southerly along the Penobscot County line to the intersection of the Woodville - Mattawamkeag town
     * line (being determined by the Penobscot River), thence along the Penobscot River to the Enfield - Lincoln town
     * line, thence southeasterly along the Enfield - Lincoln town line and the Enfield - Lowell town line to the
     * Passadumkeag - Edinburg town line, thence south-southeasterly along town lines to the intersection of the
     * Hancock County line, thence southerly along the county line to the intersection of the Otis - Mariaville town
     * line, thence southerly along the Otis - Mariaville town line to the Ellsworth city line, thence southerly along
     * the Ellsworth city line to the intersection of the Surry - Trenton town line, thence southerly along the
     * easterly town lines of Surry, Blue Hill, Brooklin, Deer Isle, and Stonington to the Knox County line, thence
     * following the Knox County line to the boundary of the State of Maine as determined by Maritime law, thence
     * following the State boundary westerly to the intersection of the Sagadahoc - Lincoln county line, thence
     * northerly along the easterly boundary of the Maine 2000 West Zone, as defined, to the point of beginning
     * Replaces NAD83(HARN) / CS2000.
     */
    public const EPSG_NAD83_NSRS2007_MAINE_CS2000_CENTRAL = 'urn:ogc:def:crs:EPSG::3554';

    /**
     * NAD83(NSRS2007) / Maine CS2000 East
     * Extent: USA - Maine east of approximately 68°25'W. The area is bounded by the following: Beginning at the point
     * determined by the intersection of the Maine State line and the Fort Kent - Frenchville town line, thence
     * continuing easterly and then southerly along the state line to the boundary of the State of Maine as determined
     * by Maritime law, thence following the State boundary westerly to the intersection of the Knox and Hancock County
     * line, thence northerly along the easterly boundary of the Maine 2000 Central Zone, as defined, to the point of
     * beginning
     * Replaces NAD83(HARN) / CS2000.
     */
    public const EPSG_NAD83_NSRS2007_MAINE_CS2000_EAST = 'urn:ogc:def:crs:EPSG::3555';

    /**
     * NAD83(NSRS2007) / Maine CS2000 West
     * Extent: USA - Maine west of approximately 69°40'W. The area is bounded by the following: Beginning at the point
     * determined by the intersection of the Maine State line and the County Line between Aroostook and Somerset
     * Counties, thence following the Somerset County line Easterly to the Northwest corner of the Somerset and
     * Piscataquis county line, thence Southerly along this county line to the northeast corner of the Athens town
     * line, thence westerly along the town line between Brighton Plantation and Athens to the westerly corner of
     * Athens, and continuing southerly to the southwest corner of the town of Athens where it meets the Cornville town
     * line, thence westerly along the Cornville - Solon town line to the intersection of the Cornville - Madison town
     * line, thence southerly and westerly following the Madison town line to the intersection of the Norridgewock -
     * Skowhegan town line, thence southerly along the Skowhegan town line to the Fairfield town line, thence easterly
     * along the Fairfield town line to the Clinton town line (being determined by the Kennebec River), thence
     * southerly along the Kennebec River to the Augusta city line, thence easterly along the city line to the Windsor
     * town line, thence southerly along the Augusta - Windsor town line to the northwest corner of the Lincoln County
     * line, thence southerly along the westerly Lincoln county line to the boundary of the State of Maine as
     * determined by Maritime law, thence following the State boundary on the westerly side of the state to the point
     * of beginning
     * Replaces NAD83(HARN) / CS2000.
     */
    public const EPSG_NAD83_NSRS2007_MAINE_CS2000_WEST = 'urn:ogc:def:crs:EPSG::3556';

    /**
     * NAD83(NSRS2007) / Maine East
     * Extent: USA - Maine - counties of Aroostook; Hancock; Knox; Penobscot; Piscataquis; Waldo; Washington
     * State law defines system in US survey feet. See code 26863 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_MAINE_EAST = 'urn:ogc:def:crs:EPSG::3557';

    /**
     * NAD83(NSRS2007) / Maine East (ftUS)
     * Extent: USA - Maine - counties of Aroostook; Hancock; Knox; Penobscot; Piscataquis; Waldo; Washington
     * State law defines use of US survey feet. Federal definition is metric - see code 3557. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_MAINE_EAST_FTUS = 'urn:ogc:def:crs:EPSG::26863';

    /**
     * NAD83(NSRS2007) / Maine West
     * Extent: USA - Maine - counties of Androscoggin; Cumberland; Franklin; Kennebec; Lincoln; Oxford; Sagadahoc;
     * Somerset; York
     * State law defines system in US survey feet. See code 26864 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_MAINE_WEST = 'urn:ogc:def:crs:EPSG::3558';

    /**
     * NAD83(NSRS2007) / Maine West (ftUS)
     * Extent: USA - Maine - counties of Androscoggin; Cumberland; Franklin; Kennebec; Lincoln; Oxford; Sagadahoc;
     * Somerset; York
     * State law defines use of US survey feet. Federal definition is metric - see code 3558. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_MAINE_WEST_FTUS = 'urn:ogc:def:crs:EPSG::26864';

    /**
     * NAD83(NSRS2007) / Maryland
     * Extent: USA - Maryland - counties of Allegany; Anne Arundel; Baltimore; Calvert; Caroline; Carroll; Cecil;
     * Charles; Dorchester; Frederick; Garrett; Harford; Howard; Kent; Montgomery; Prince Georges; Queen Annes;
     * Somerset; St Marys; Talbot; Washington; Wicomico; Worcester
     * State law defines use of US survey feet. See code 3582 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_MARYLAND = 'urn:ogc:def:crs:EPSG::3559';

    /**
     * NAD83(NSRS2007) / Maryland (ftUS)
     * Extent: USA - Maryland - counties of Allegany; Anne Arundel; Baltimore; Calvert; Caroline; Carroll; Cecil;
     * Charles; Dorchester; Frederick; Garrett; Harford; Howard; Kent; Montgomery; Prince Georges; Queen Annes;
     * Somerset; St Marys; Talbot; Washington; Wicomico; Worcester
     * State law defines use of US survey feet. Federal definition is metric - see code 3559. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_MARYLAND_FTUS = 'urn:ogc:def:crs:EPSG::3582';

    /**
     * NAD83(NSRS2007) / Massachusetts Island
     * Extent: USA - Massachusetts offshore - counties of Dukes; Nantucket
     * State law defines use of US survey feet. See code 3584 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_MASSACHUSETTS_ISLAND = 'urn:ogc:def:crs:EPSG::3583';

    /**
     * NAD83(NSRS2007) / Massachusetts Island (ftUS)
     * Extent: USA - Massachusetts offshore - counties of Dukes; Nantucket
     * State law defines use of US survey feet. Federal definition is metric - see code 3583. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_MASSACHUSETTS_ISLAND_FTUS = 'urn:ogc:def:crs:EPSG::3584';

    /**
     * NAD83(NSRS2007) / Massachusetts Mainland
     * Extent: USA - Massachusetts onshore - counties of Barnstable; Berkshire; Bristol; Essex; Franklin; Hampden;
     * Hampshire; Middlesex; Norfolk; Plymouth; Suffolk; Worcester
     * State law defines use of US survey feet. See code 3586 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_MASSACHUSETTS_MAINLAND = 'urn:ogc:def:crs:EPSG::3585';

    /**
     * NAD83(NSRS2007) / Massachusetts Mainland (ftUS)
     * Extent: USA - Massachusetts onshore - counties of Barnstable; Berkshire; Bristol; Essex; Franklin; Hampden;
     * Hampshire; Middlesex; Norfolk; Plymouth; Suffolk; Worcester
     * State law defines use of US survey feet. Federal definition is metric - see code 3585. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_MASSACHUSETTS_MAINLAND_FTUS = 'urn:ogc:def:crs:EPSG::3586';

    /**
     * NAD83(NSRS2007) / Michigan Central
     * Extent: USA - Michigan - counties of Alcona; Alpena; Antrim; Arenac; Benzie; Charlevoix; Cheboygan; Clare;
     * Crawford; Emmet; Gladwin; Grand Traverse; Iosco; Kalkaska; Lake; Leelanau; Manistee; Mason; Missaukee;
     * Montmorency; Ogemaw; Osceola; Oscoda; Otsego; Presque Isle; Roscommon; Wexford
     * State law defines use of International feet (note: not US survey feet). See code 3588 for equivalent non-metric
     * definition. Replaces NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_MICHIGAN_CENTRAL = 'urn:ogc:def:crs:EPSG::3587';

    /**
     * NAD83(NSRS2007) / Michigan Central (ft)
     * Extent: USA - Michigan - counties of Alcona; Alpena; Antrim; Arenac; Benzie; Charlevoix; Cheboygan; Clare;
     * Crawford; Emmet; Gladwin; Grand Traverse; Iosco; Kalkaska; Lake; Leelanau; Manistee; Mason; Missaukee;
     * Montmorency; Ogemaw; Osceola; Oscoda; Otsego; Presque Isle; Roscommon; Wexford
     * State law defines use of International feet (note: not US survey feet). Federal definition is metric - see code
     * 3587. Replaces NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_MICHIGAN_CENTRAL_FT = 'urn:ogc:def:crs:EPSG::3588';

    /**
     * NAD83(NSRS2007) / Michigan North
     * Extent: USA - Michigan north of approximately 45°45'N - counties of Alger; Baraga; Chippewa; Delta; Dickinson;
     * Gogebic; Houghton; Iron; Keweenaw; Luce; Mackinac; Marquette; Menominee; Ontonagon; Schoolcraft
     * State law defines use of International feet (note: not US survey feet). See code 3590 for equivalent non-metric
     * definition. Replaces NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_MICHIGAN_NORTH = 'urn:ogc:def:crs:EPSG::3589';

    /**
     * NAD83(NSRS2007) / Michigan North (ft)
     * Extent: USA - Michigan north of approximately 45°45'N - counties of Alger; Baraga; Chippewa; Delta; Dickinson;
     * Gogebic; Houghton; Iron; Keweenaw; Luce; Mackinac; Marquette; Menominee; Ontonagon; Schoolcraft
     * State law defines use of International feet (note: not US survey feet). Federal definition is metric - see code
     * 3589. Replaces NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_MICHIGAN_NORTH_FT = 'urn:ogc:def:crs:EPSG::3590';

    /**
     * NAD83(NSRS2007) / Michigan Oblique Mercator
     * Extent: USA - Michigan
     * Replaces NAD83(HARN) / Michigan Oblique Mercator.
     */
    public const EPSG_NAD83_NSRS2007_MICHIGAN_OBLIQUE_MERCATOR = 'urn:ogc:def:crs:EPSG::3591';

    /**
     * NAD83(NSRS2007) / Michigan South
     * Extent: USA - Michigan - counties of Allegan; Barry; Bay; Berrien; Branch; Calhoun; Cass; Clinton; Eaton;
     * Genesee; Gratiot; Hillsdale; Huron; Ingham; Ionia; Isabella; Jackson; Kalamazoo; Kent; Lapeer; Lenawee;
     * Livingston; Macomb; Mecosta; Midland; Monroe; Montcalm; Muskegon; Newaygo; Oakland; Oceana; Ottawa; Saginaw;
     * Sanilac; Shiawassee; St Clair; St Joseph; Tuscola; Van Buren; Washtenaw; Wayne
     * State law defines use of International feet (note: not US survey feet). See code 3593 for equivalent non-metric
     * definition. Replaces NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_MICHIGAN_SOUTH = 'urn:ogc:def:crs:EPSG::3592';

    /**
     * NAD83(NSRS2007) / Michigan South (ft)
     * Extent: USA - Michigan - counties of Allegan; Barry; Bay; Berrien; Branch; Calhoun; Cass; Clinton; Eaton;
     * Genesee; Gratiot; Hillsdale; Huron; Ingham; Ionia; Isabella; Jackson; Kalamazoo; Kent; Lapeer; Lenawee;
     * Livingston; Macomb; Mecosta; Midland; Monroe; Montcalm; Muskegon; Newaygo; Oakland; Oceana; Ottawa; Saginaw;
     * Sanilac; Shiawassee; St Clair; St Joseph; Tuscola; Van Buren; Washtenaw; Wayne
     * State law defines use of International feet (note: not US survey feet). Federal definition is metric - see code
     * 3592. Replaces NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_MICHIGAN_SOUTH_FT = 'urn:ogc:def:crs:EPSG::3593';

    /**
     * NAD83(NSRS2007) / Minnesota Central
     * Extent: USA - Minnesota - counties of Aitkin; Becker; Benton; Carlton; Cass; Chisago; Clay; Crow Wing; Douglas;
     * Grant; Hubbard; Isanti; Kanabec; Mille Lacs; Morrison; Otter Tail; Pine; Pope; Stearns; Stevens; Todd; Traverse;
     * Wadena; Wilkin
     * State law defines system in US survey feet. See code 26866 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_MINNESOTA_CENTRAL = 'urn:ogc:def:crs:EPSG::3594';

    /**
     * NAD83(NSRS2007) / Minnesota Central (ftUS)
     * Extent: USA - Minnesota - counties of Aitkin; Becker; Benton; Carlton; Cass; Chisago; Clay; Crow Wing; Douglas;
     * Grant; Hubbard; Isanti; Kanabec; Mille Lacs; Morrison; Otter Tail; Pine; Pope; Stearns; Stevens; Todd; Traverse;
     * Wadena; Wilkin
     * State law defines use of US survey feet. Federal definition is metric - see code 3594. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_MINNESOTA_CENTRAL_FTUS = 'urn:ogc:def:crs:EPSG::26866';

    /**
     * NAD83(NSRS2007) / Minnesota North
     * Extent: USA - Minnesota - counties of Beltrami; Clearwater; Cook; Itasca; Kittson; Koochiching; Lake; Lake of
     * the Woods; Mahnomen; Marshall; Norman; Pennington; Polk; Red Lake; Roseau; St Louis
     * State law defines system in US survey feet. See code 26865 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_MINNESOTA_NORTH = 'urn:ogc:def:crs:EPSG::3595';

    /**
     * NAD83(NSRS2007) / Minnesota North (ftUS)
     * Extent: USA - Minnesota - counties of Beltrami; Clearwater; Cook; Itasca; Kittson; Koochiching; Lake; Lake of
     * the Woods; Mahnomen; Marshall; Norman; Pennington; Polk; Red Lake; Roseau; St Louis
     * State law defines use of US survey feet. Federal definition is metric - see code 3595. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_MINNESOTA_NORTH_FTUS = 'urn:ogc:def:crs:EPSG::26865';

    /**
     * NAD83(NSRS2007) / Minnesota South
     * Extent: USA - Minnesota - counties of Anoka; Big Stone; Blue Earth; Brown; Carver; Chippewa; Cottonwood; Dakota;
     * Dodge; Faribault; Fillmore; Freeborn; Goodhue; Hennepin; Houston; Jackson; Kandiyohi; Lac Qui Parle; Le Sueur;
     * Lincoln; Lyon; Martin; McLeod; Meeker; Mower; Murray; Nicollet; Nobles; Olmsted; Pipestone; Ramsey; Redwood;
     * Renville; Rice; Rock; Scott; Sherburne; Sibley; Steele; Swift; Wabasha; Waseca; Washington; Watonwan; Winona;
     * Wright; Yellow Medicine
     * State law defines system in US survey feet. See code 26867 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_MINNESOTA_SOUTH = 'urn:ogc:def:crs:EPSG::3596';

    /**
     * NAD83(NSRS2007) / Minnesota South (ftUS)
     * Extent: USA - Minnesota - counties of Anoka; Big Stone; Blue Earth; Brown; Carver; Chippewa; Cottonwood; Dakota;
     * Dodge; Faribault; Fillmore; Freeborn; Goodhue; Hennepin; Houston; Jackson; Kandiyohi; Lac Qui Parle; Le Sueur;
     * Lincoln; Lyon; Martin; McLeod; Meeker; Mower; Murray; Nicollet; Nobles; Olmsted; Pipestone; Ramsey; Redwood;
     * Renville; Rice; Rock; Scott; Sherburne; Sibley; Steele; Swift; Wabasha; Waseca; Washington; Watonwan; Winona;
     * Wright; Yellow Medicine
     * State law defines use of US survey feet. Federal definition is metric - see code 3596. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_MINNESOTA_SOUTH_FTUS = 'urn:ogc:def:crs:EPSG::26867';

    /**
     * NAD83(NSRS2007) / Mississippi East
     * Extent: USA - Mississippi - counties of Alcorn; Attala; Benton; Calhoun; Chickasaw; Choctaw; Clarke; Clay;
     * Covington; Forrest; George; Greene; Hancock; Harrison; Itawamba; Jackson; Jasper; Jones; Kemper; Lafayette;
     * Lamar; Lauderdale; Leake; Lee; Lowndes; Marshall; Monroe; Neshoba; Newton; Noxubee; Oktibbeha; Pearl River;
     * Perry; Pontotoc; Prentiss; Scott; Smith; Stone; Tippah; Tishomingo; Union; Wayne; Webster; Winston
     * State law defines use of US survey feet. See code 3598 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_MISSISSIPPI_EAST = 'urn:ogc:def:crs:EPSG::3597';

    /**
     * NAD83(NSRS2007) / Mississippi East (ftUS)
     * Extent: USA - Mississippi - counties of Alcorn; Attala; Benton; Calhoun; Chickasaw; Choctaw; Clarke; Clay;
     * Covington; Forrest; George; Greene; Hancock; Harrison; Itawamba; Jackson; Jasper; Jones; Kemper; Lafayette;
     * Lamar; Lauderdale; Leake; Lee; Lowndes; Marshall; Monroe; Neshoba; Newton; Noxubee; Oktibbeha; Pearl River;
     * Perry; Pontotoc; Prentiss; Scott; Smith; Stone; Tippah; Tishomingo; Union; Wayne; Webster; Winston
     * State law defines use of US survey feet. Federal definition is metric - see code 3597. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_MISSISSIPPI_EAST_FTUS = 'urn:ogc:def:crs:EPSG::3598';

    /**
     * NAD83(NSRS2007) / Mississippi TM
     * Extent: USA - Mississippi
     * Replaces NAD83(HARN) / Mississippi TM (CRS code 3815).
     */
    public const EPSG_NAD83_NSRS2007_MISSISSIPPI_TM = 'urn:ogc:def:crs:EPSG::3816';

    /**
     * NAD83(NSRS2007) / Mississippi West
     * Extent: USA - Mississippi - counties of Adams; Amite; Bolivar; Carroll; Claiborne; Coahoma; Copiah; De Soto;
     * Franklin; Grenada; Hinds; Holmes; Humphreys; Issaquena; Jefferson; Jefferson Davis; Lawrence; Leflore; Lincoln;
     * Madison; Marion; Montgomery; Panola; Pike; Quitman; Rankin; Sharkey; Simpson; Sunflower; Tallahatchie; Tate;
     * Tunica; Walthall; Warren; Washington; Wilkinson; Yalobusha; Yazoo
     * State law defines use of US survey feet. See code 3600 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_MISSISSIPPI_WEST = 'urn:ogc:def:crs:EPSG::3599';

    /**
     * NAD83(NSRS2007) / Mississippi West (ftUS)
     * Extent: USA - Mississippi - counties of Adams; Amite; Bolivar; Carroll; Claiborne; Coahoma; Copiah; De Soto;
     * Franklin; Grenada; Hinds; Holmes; Humphreys; Issaquena; Jefferson; Jefferson Davis; Lawrence; Leflore; Lincoln;
     * Madison; Marion; Montgomery; Panola; Pike; Quitman; Rankin; Sharkey; Simpson; Sunflower; Tallahatchie; Tate;
     * Tunica; Walthall; Warren; Washington; Wilkinson; Yalobusha; Yazoo
     * State law defines use of US survey feet. Federal definition is metric - see code 3599. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_MISSISSIPPI_WEST_FTUS = 'urn:ogc:def:crs:EPSG::3600';

    /**
     * NAD83(NSRS2007) / Missouri Central
     * Extent: USA - Missouri - counties of Adair; Audrain; Benton; Boone; Callaway; Camden; Carroll; Chariton;
     * Christian; Cole; Cooper; Dallas; Douglas; Greene; Grundy; Hickory; Howard; Howell; Knox; Laclede; Linn;
     * Livingston; Macon; Maries; Mercer; Miller; Moniteau; Monroe; Morgan; Osage; Ozark; Pettis; Phelps; Polk;
     * Pulaski; Putnam; Randolph; Saline; Schuyler; Scotland; Shelby; Stone; Sullivan; Taney; Texas; Webster; Wright
     * Replaces NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_MISSOURI_CENTRAL = 'urn:ogc:def:crs:EPSG::3601';

    /**
     * NAD83(NSRS2007) / Missouri East
     * Extent: USA - Missouri - counties of Bollinger; Butler; Cape Girardeau; Carter; Clark; Crawford; Dent; Dunklin;
     * Franklin; Gasconade; Iron; Jefferson; Lewis; Lincoln; Madison; Marion; Mississippi; Montgomery; New Madrid;
     * Oregon; Pemiscot; Perry; Pike; Ralls; Reynolds; Ripley; Scott; Shannon; St Charles; St Francois; St Louis; Ste.
     * Genevieve; Stoddard; Warren; Washington; Wayne
     * Replaces NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_MISSOURI_EAST = 'urn:ogc:def:crs:EPSG::3602';

    /**
     * NAD83(NSRS2007) / Missouri West
     * Extent: USA - Missouri - counties of Andrew; Atchison; Barry; Barton; Bates; Buchanan; Caldwell; Cass; Cedar;
     * Clay; Clinton; Dade; Daviess; De Kalb; Gentry; Harrison; Henry; Holt; Jackson; Jasper; Johnson; Lafayette;
     * Lawrence; McDonald; Newton; Nodaway; Platte; Ray; St Clair; Vernon; Worth
     * Replaces NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_MISSOURI_WEST = 'urn:ogc:def:crs:EPSG::3603';

    /**
     * NAD83(NSRS2007) / Montana
     * Extent: USA - Montana - counties of Beaverhead; Big Horn; Blaine; Broadwater; Carbon; Carter; Cascade; Chouteau;
     * Custer; Daniels; Dawson; Deer Lodge; Fallon; Fergus; Flathead; Gallatin; Garfield; Glacier; Golden Valley;
     * Granite; Hill; Jefferson; Judith Basin; Lake; Lewis and Clark; Liberty; Lincoln; Madison; McCone; Meagher;
     * Mineral; Missoula; Musselshell; Park; Petroleum; Phillips; Pondera; Powder River; Powell; Prairie; Ravalli;
     * Richland; Roosevelt; Rosebud; Sanders; Sheridan; Silver Bow; Stillwater; Sweet Grass; Teton; Toole; Treasure;
     * Valley; Wheatland; Wibaux; Yellowstone
     * State law defines use of International feet (note: not US survey feet). See code 3605 for equivalent non-metric
     * definition. Replaces NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_MONTANA = 'urn:ogc:def:crs:EPSG::3604';

    /**
     * NAD83(NSRS2007) / Montana (ft)
     * Extent: USA - Montana - counties of Beaverhead; Big Horn; Blaine; Broadwater; Carbon; Carter; Cascade; Chouteau;
     * Custer; Daniels; Dawson; Deer Lodge; Fallon; Fergus; Flathead; Gallatin; Garfield; Glacier; Golden Valley;
     * Granite; Hill; Jefferson; Judith Basin; Lake; Lewis and Clark; Liberty; Lincoln; Madison; McCone; Meagher;
     * Mineral; Missoula; Musselshell; Park; Petroleum; Phillips; Pondera; Powder River; Powell; Prairie; Ravalli;
     * Richland; Roosevelt; Rosebud; Sanders; Sheridan; Silver Bow; Stillwater; Sweet Grass; Teton; Toole; Treasure;
     * Valley; Wheatland; Wibaux; Yellowstone
     * State law defines use of International feet (note: not US survey feet). Federal definition is metric - see code
     * 3604. Replaces NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_MONTANA_FT = 'urn:ogc:def:crs:EPSG::3605';

    /**
     * NAD83(NSRS2007) / Nebraska
     * Extent: USA - Nebraska - counties of Adams; Antelope; Arthur; Banner; Blaine; Boone; Box Butte; Boyd; Brown;
     * Buffalo; Burt; Butler; Cass; Cedar; Chase; Cherry; Cheyenne; Clay; Colfax; Cuming; Custer; Dakota; Dawes;
     * Dawson; Deuel; Dixon; Dodge; Douglas; Dundy; Fillmore; Franklin; Frontier; Furnas; Gage; Garden; Garfield;
     * Gosper; Grant; Greeley; Hall; Hamilton; Harlan; Hayes; Hitchcock; Holt; Hooker; Howard; Jefferson; Johnson;
     * Kearney; Keith; Keya Paha; Kimball; Knox; Lancaster; Lincoln; Logan; Loup; Madison; McPherson; Merrick; Morrill;
     * Nance; Nemaha; Nuckolls; Otoe; Pawnee; Perkins; Phelps; Pierce; Platte; Polk; Red Willow; Richardson; Rock;
     * Saline; Sarpy; Saunders; Scotts Bluff; Seward; Sheridan; Sherman; Sioux; Stanton; Thayer; Thomas; Thurston;
     * Valley; Washington; Wayne; Webster; Wheeler; York
     * State law defines system in US survey feet. See CRS code 26868 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_NEBRASKA = 'urn:ogc:def:crs:EPSG::3606';

    /**
     * NAD83(NSRS2007) / Nebraska (ftUS)
     * Extent: USA - Nebraska - counties of Adams; Antelope; Arthur; Banner; Blaine; Boone; Box Butte; Boyd; Brown;
     * Buffalo; Burt; Butler; Cass; Cedar; Chase; Cherry; Cheyenne; Clay; Colfax; Cuming; Custer; Dakota; Dawes;
     * Dawson; Deuel; Dixon; Dodge; Douglas; Dundy; Fillmore; Franklin; Frontier; Furnas; Gage; Garden; Garfield;
     * Gosper; Grant; Greeley; Hall; Hamilton; Harlan; Hayes; Hitchcock; Holt; Hooker; Howard; Jefferson; Johnson;
     * Kearney; Keith; Keya Paha; Kimball; Knox; Lancaster; Lincoln; Logan; Loup; Madison; McPherson; Merrick; Morrill;
     * Nance; Nemaha; Nuckolls; Otoe; Pawnee; Perkins; Phelps; Pierce; Platte; Polk; Red Willow; Richardson; Rock;
     * Saline; Sarpy; Saunders; Scotts Bluff; Seward; Sheridan; Sherman; Sioux; Stanton; Thayer; Thomas; Thurston;
     * Valley; Washington; Wayne; Webster; Wheeler; York
     * State law defines use of US survey feet. Federal definition is metric - see code 3606. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_NEBRASKA_FTUS = 'urn:ogc:def:crs:EPSG::26868';

    /**
     * NAD83(NSRS2007) / Nevada Central
     * Extent: USA - Nevada - counties of Lander; Nye
     * State law defines use of US survey feet. See code 3608 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_NEVADA_CENTRAL = 'urn:ogc:def:crs:EPSG::3607';

    /**
     * NAD83(NSRS2007) / Nevada Central (ftUS)
     * Extent: USA - Nevada - counties of Lander; Nye
     * State law defines use of US survey feet. Federal definition is metric - see code 3607. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_NEVADA_CENTRAL_FTUS = 'urn:ogc:def:crs:EPSG::3608';

    /**
     * NAD83(NSRS2007) / Nevada East
     * Extent: USA - Nevada - counties of Clark; Elko; Eureka; Lincoln; White Pine
     * State law defines use of US survey feet. See code 3610 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_NEVADA_EAST = 'urn:ogc:def:crs:EPSG::3609';

    /**
     * NAD83(NSRS2007) / Nevada East (ftUS)
     * Extent: USA - Nevada - counties of Clark; Elko; Eureka; Lincoln; White Pine
     * State law defines use of US survey feet. Federal definition is metric - see code 3609. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_NEVADA_EAST_FTUS = 'urn:ogc:def:crs:EPSG::3610';

    /**
     * NAD83(NSRS2007) / Nevada West
     * Extent: USA - Nevada - counties of Churchill; Douglas; Esmeralda; Humboldt; Lyon; Mineral; Pershing; Storey;
     * Washoe
     * State law defines use of US survey feet. See code 3612 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_NEVADA_WEST = 'urn:ogc:def:crs:EPSG::3611';

    /**
     * NAD83(NSRS2007) / Nevada West (ftUS)
     * Extent: USA - Nevada - counties of Churchill; Douglas; Esmeralda; Humboldt; Lyon; Mineral; Pershing; Storey;
     * Washoe
     * State law defines use of US survey feet. Federal definition is metric - see code 3611. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_NEVADA_WEST_FTUS = 'urn:ogc:def:crs:EPSG::3612';

    /**
     * NAD83(NSRS2007) / New Hampshire
     * Extent: USA - New Hampshire - counties of Belknap; Carroll; Cheshire; Coos; Grafton; Hillsborough; Merrimack;
     * Rockingham; Strafford; Sullivan
     * State law defines use of US survey feet. See code 3614 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_NEW_HAMPSHIRE = 'urn:ogc:def:crs:EPSG::3613';

    /**
     * NAD83(NSRS2007) / New Hampshire (ftUS)
     * Extent: USA - New Hampshire - counties of Belknap; Carroll; Cheshire; Coos; Grafton; Hillsborough; Merrimack;
     * Rockingham; Strafford; Sullivan
     * State law defines use of US survey feet. Federal definition is metric - see code 3613. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_NEW_HAMPSHIRE_FTUS = 'urn:ogc:def:crs:EPSG::3614';

    /**
     * NAD83(NSRS2007) / New Jersey
     * Extent: USA - New Jersey - counties of Atlantic; Bergen; Burlington; Camden; Cape May; Cumberland; Essex;
     * Gloucester; Hudson; Hunterdon; Mercer; Middlesex; Monmouth; Morris; Ocean; Passaic; Salem; Somerset; Sussex;
     * Union; Warren
     * State law defines use of US survey feet. See code 3616 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_NEW_JERSEY = 'urn:ogc:def:crs:EPSG::3615';

    /**
     * NAD83(NSRS2007) / New Jersey (ftUS)
     * Extent: USA - New Jersey - counties of Atlantic; Bergen; Burlington; Camden; Cape May; Cumberland; Essex;
     * Gloucester; Hudson; Hunterdon; Mercer; Middlesex; Monmouth; Morris; Ocean; Passaic; Salem; Somerset; Sussex;
     * Union; Warren
     * State law defines use of US survey feet. Federal definition is metric - see code 3615. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_NEW_JERSEY_FTUS = 'urn:ogc:def:crs:EPSG::3616';

    /**
     * NAD83(NSRS2007) / New Mexico Central
     * Extent: USA - New Mexico - counties of Bernalillo; Dona Ana; Lincoln; Los Alamos; Otero; Rio Arriba; Sandoval;
     * Santa Fe; Socorro; Taos; Torrance; Valencia
     * State law defines use of US survey feet. See code 3618 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_NEW_MEXICO_CENTRAL = 'urn:ogc:def:crs:EPSG::3617';

    /**
     * NAD83(NSRS2007) / New Mexico Central (ftUS)
     * Extent: USA - New Mexico - counties of Bernalillo; Dona Ana; Lincoln; Los Alamos; Otero; Rio Arriba; Sandoval;
     * Santa Fe; Socorro; Taos; Torrance; Valencia
     * State law defines use of US survey feet. Federal definition is metric - see code 3617. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_NEW_MEXICO_CENTRAL_FTUS = 'urn:ogc:def:crs:EPSG::3618';

    /**
     * NAD83(NSRS2007) / New Mexico East
     * Extent: USA - New Mexico - counties of Chaves; Colfax; Curry; De Baca; Eddy; Guadalupe; Harding; Lea; Mora;
     * Quay; Roosevelt; San Miguel; Union
     * State law defines use of US survey feet. See code 3620 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_NEW_MEXICO_EAST = 'urn:ogc:def:crs:EPSG::3619';

    /**
     * NAD83(NSRS2007) / New Mexico East (ftUS)
     * Extent: USA - New Mexico - counties of Chaves; Colfax; Curry; De Baca; Eddy; Guadalupe; Harding; Lea; Mora;
     * Quay; Roosevelt; San Miguel; Union
     * State law defines use of US survey feet. Federal definition is metric - see code 3619. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_NEW_MEXICO_EAST_FTUS = 'urn:ogc:def:crs:EPSG::3620';

    /**
     * NAD83(NSRS2007) / New Mexico West
     * Extent: USA - New Mexico - counties of Catron; Cibola; Grant; Hidalgo; Luna; McKinley; San Juan; Sierra
     * State law defines use of US survey feet. See code 3622 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_NEW_MEXICO_WEST = 'urn:ogc:def:crs:EPSG::3621';

    /**
     * NAD83(NSRS2007) / New Mexico West (ftUS)
     * Extent: USA - New Mexico - counties of Catron; Cibola; Grant; Hidalgo; Luna; McKinley; San Juan; Sierra
     * State law defines use of US survey feet. Federal definition is metric - see code 3621. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_NEW_MEXICO_WEST_FTUS = 'urn:ogc:def:crs:EPSG::3622';

    /**
     * NAD83(NSRS2007) / New York Central
     * Extent: USA - New York - counties of Broome; Cayuga; Chemung; Chenango; Cortland; Jefferson; Lewis; Madison;
     * Oneida; Onondaga; Ontario; Oswego; Schuyler; Seneca; Steuben; Tioga; Tompkins; Wayne; Yates
     * State law defines use of US survey feet. See code 3624 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_NEW_YORK_CENTRAL = 'urn:ogc:def:crs:EPSG::3623';

    /**
     * NAD83(NSRS2007) / New York Central (ftUS)
     * Extent: USA - New York - counties of Broome; Cayuga; Chemung; Chenango; Cortland; Jefferson; Lewis; Madison;
     * Oneida; Onondaga; Ontario; Oswego; Schuyler; Seneca; Steuben; Tioga; Tompkins; Wayne; Yates
     * State law defines use of US survey feet. Federal definition is metric - see code 3623. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_NEW_YORK_CENTRAL_FTUS = 'urn:ogc:def:crs:EPSG::3624';

    /**
     * NAD83(NSRS2007) / New York East
     * Extent: USA - New York mainland - counties of Albany; Clinton; Columbia; Delaware; Dutchess; Essex; Franklin;
     * Fulton; Greene; Hamilton; Herkimer; Montgomery; Orange; Otsego; Putnam; Rensselaer; Rockland; Saratoga;
     * Schenectady; Schoharie; St Lawrence; Sullivan; Ulster; Warren; Washington; Westchester
     * State law defines use of US survey feet. See code 3626 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_NEW_YORK_EAST = 'urn:ogc:def:crs:EPSG::3625';

    /**
     * NAD83(NSRS2007) / New York East (ftUS)
     * Extent: USA - New York mainland - counties of Albany; Clinton; Columbia; Delaware; Dutchess; Essex; Franklin;
     * Fulton; Greene; Hamilton; Herkimer; Montgomery; Orange; Otsego; Putnam; Rensselaer; Rockland; Saratoga;
     * Schenectady; Schoharie; St Lawrence; Sullivan; Ulster; Warren; Washington; Westchester
     * State law defines use of US survey feet. Federal definition is metric - see code 3625. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_NEW_YORK_EAST_FTUS = 'urn:ogc:def:crs:EPSG::3626';

    /**
     * NAD83(NSRS2007) / New York Long Island
     * Extent: USA - New York - counties of Bronx; Kings; Nassau; New York; Queens; Richmond; Suffolk
     * State law defines use of US survey feet. See code 3628 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_NEW_YORK_LONG_ISLAND = 'urn:ogc:def:crs:EPSG::3627';

    /**
     * NAD83(NSRS2007) / New York Long Island (ftUS)
     * Extent: USA - New York - counties of Bronx; Kings; Nassau; New York; Queens; Richmond; Suffolk
     * State law defines use of US survey feet. Federal definition is metric - see code 3627. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_NEW_YORK_LONG_ISLAND_FTUS = 'urn:ogc:def:crs:EPSG::3628';

    /**
     * NAD83(NSRS2007) / New York West
     * Extent: USA - New York - counties of Allegany; Cattaraugus; Chautauqua; Erie; Genesee; Livingston; Monroe;
     * Niagara; Orleans; Wyoming
     * State law defines use of US survey feet. See code 3630 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_NEW_YORK_WEST = 'urn:ogc:def:crs:EPSG::3629';

    /**
     * NAD83(NSRS2007) / New York West (ftUS)
     * Extent: USA - New York - counties of Allegany; Cattaraugus; Chautauqua; Erie; Genesee; Livingston; Monroe;
     * Niagara; Orleans; Wyoming
     * State law defines use of US survey feet. Federal definition is metric - see code 3629. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_NEW_YORK_WEST_FTUS = 'urn:ogc:def:crs:EPSG::3630';

    /**
     * NAD83(NSRS2007) / North Carolina
     * Extent: USA - North Carolina - counties of Alamance; Alexander; Alleghany; Anson; Ashe; Avery; Beaufort; Bertie;
     * Bladen; Brunswick; Buncombe; Burke; Cabarrus; Caldwell; Camden; Carteret; Caswell; Catawba; Chatham; Cherokee;
     * Chowan; Clay; Cleveland; Columbus; Craven; Cumberland; Currituck; Dare; Davidson; Davie; Duplin; Durham;
     * Edgecombe; Forsyth; Franklin; Gaston; Gates; Graham; Granville; Greene; Guilford; Halifax; Harnett; Haywood;
     * Henderson; Hertford; Hoke; Hyde; Iredell; Jackson; Johnston; Jones; Lee; Lenoir; Lincoln; Macon; Madison;
     * Martin; McDowell; Mecklenburg; Mitchell; Montgomery; Moore; Nash; New Hanover; Northampton; Onslow; Orange;
     * Pamlico; Pasquotank; Pender; Perquimans; Person; Pitt; Polk; Randolph; Richmond; Robeson; Rockingham; Rowan;
     * Rutherford; Sampson; Scotland; Stanly; Stokes; Surry; Swain; Transylvania; Tyrrell; Union; Vance; Wake; Warren;
     * Washington; Watauga; Wayne; Wilkes; Wilson; Yadkin; Yancey
     * State law defines use of US survey feet. See CRS code 3632 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_NORTH_CAROLINA = 'urn:ogc:def:crs:EPSG::3631';

    /**
     * NAD83(NSRS2007) / North Carolina (ftUS)
     * Extent: USA - North Carolina - counties of Alamance; Alexander; Alleghany; Anson; Ashe; Avery; Beaufort; Bertie;
     * Bladen; Brunswick; Buncombe; Burke; Cabarrus; Caldwell; Camden; Carteret; Caswell; Catawba; Chatham; Cherokee;
     * Chowan; Clay; Cleveland; Columbus; Craven; Cumberland; Currituck; Dare; Davidson; Davie; Duplin; Durham;
     * Edgecombe; Forsyth; Franklin; Gaston; Gates; Graham; Granville; Greene; Guilford; Halifax; Harnett; Haywood;
     * Henderson; Hertford; Hoke; Hyde; Iredell; Jackson; Johnston; Jones; Lee; Lenoir; Lincoln; Macon; Madison;
     * Martin; McDowell; Mecklenburg; Mitchell; Montgomery; Moore; Nash; New Hanover; Northampton; Onslow; Orange;
     * Pamlico; Pasquotank; Pender; Perquimans; Person; Pitt; Polk; Randolph; Richmond; Robeson; Rockingham; Rowan;
     * Rutherford; Sampson; Scotland; Stanly; Stokes; Surry; Swain; Transylvania; Tyrrell; Union; Vance; Wake; Warren;
     * Washington; Watauga; Wayne; Wilkes; Wilson; Yadkin; Yancey
     * State law defines use of US survey feet. Federal definition is metric - see CRS code 3631. Replaces NAD83(HARN)
     * / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_NORTH_CAROLINA_FTUS = 'urn:ogc:def:crs:EPSG::3632';

    /**
     * NAD83(NSRS2007) / North Dakota North
     * Extent: USA - North Dakota - counties of Benson; Bottineau; Burke; Cavalier; Divide; Eddy; Foster; Grand Forks;
     * Griggs; McHenry; McKenzie; McLean; Mountrial; Nelson; Pembina; Pierce; Ramsey; Renville; Rolette; Sheridan;
     * Steele; Towner; Traill; Walsh; Ward; Wells; Williams
     * State law defines use of International feet (note: not US survey feet). See code 3634 for equivalent non-metric
     * definition. Replaces NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_NORTH_DAKOTA_NORTH = 'urn:ogc:def:crs:EPSG::3633';

    /**
     * NAD83(NSRS2007) / North Dakota North (ft)
     * Extent: USA - North Dakota - counties of Benson; Bottineau; Burke; Cavalier; Divide; Eddy; Foster; Grand Forks;
     * Griggs; McHenry; McKenzie; McLean; Mountrial; Nelson; Pembina; Pierce; Ramsey; Renville; Rolette; Sheridan;
     * Steele; Towner; Traill; Walsh; Ward; Wells; Williams
     * State law defines use of International feet (note: not US survey feet). Federal definition is metric - see code
     * 3633. Replaces NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_NORTH_DAKOTA_NORTH_FT = 'urn:ogc:def:crs:EPSG::3634';

    /**
     * NAD83(NSRS2007) / North Dakota South
     * Extent: USA - North Dakota - counties of Adams; Barnes; Billings; Bowman; Burleigh; Cass; Dickey; Dunn; Emmons;
     * Golden Valley; Grant; Hettinger; Kidder; La Moure; Logan; McIntosh; Mercer; Morton; Oliver; Ransom; Richland;
     * Sargent; Sioux; Slope; Stark; Stutsman
     * State law defines use of International feet (note: not US survey feet). See code 3636 for equivalent non-metric
     * definition. Replaces NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_NORTH_DAKOTA_SOUTH = 'urn:ogc:def:crs:EPSG::3635';

    /**
     * NAD83(NSRS2007) / North Dakota South (ft)
     * Extent: USA - North Dakota - counties of Adams; Barnes; Billings; Bowman; Burleigh; Cass; Dickey; Dunn; Emmons;
     * Golden Valley; Grant; Hettinger; Kidder; La Moure; Logan; McIntosh; Mercer; Morton; Oliver; Ransom; Richland;
     * Sargent; Sioux; Slope; Stark; Stutsman
     * State law defines use of International feet (note: not US survey feet). Federal definition is metric - see code
     * 3635. Replaces NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_NORTH_DAKOTA_SOUTH_FT = 'urn:ogc:def:crs:EPSG::3636';

    /**
     * NAD83(NSRS2007) / Ohio North
     * Extent: USA - Ohio - counties of Allen;Ashland; Ashtabula; Auglaize; Carroll; Columbiana; Coshocton; Crawford;
     * Cuyahoga; Defiance; Delaware; Erie; Fulton; Geauga; Hancock; Hardin; Harrison; Henry; Holmes; Huron; Jefferson;
     * Knox; Lake; Logan; Lorain; Lucas; Mahoning; Marion; Medina; Mercer; Morrow; Ottawa; Paulding; Portage; Putnam;
     * Richland; Sandusky; Seneca; Shelby; Stark; Summit; Trumbull; Tuscarawas; Union; Van Wert; Wayne; Williams; Wood;
     * Wyandot
     * State law defines use of US survey feet. See code 3728 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_OHIO_NORTH = 'urn:ogc:def:crs:EPSG::3637';

    /**
     * NAD83(NSRS2007) / Ohio North (ftUS)
     * Extent: USA - Ohio - counties of Allen;Ashland; Ashtabula; Auglaize; Carroll; Columbiana; Coshocton; Crawford;
     * Cuyahoga; Defiance; Delaware; Erie; Fulton; Geauga; Hancock; Hardin; Harrison; Henry; Holmes; Huron; Jefferson;
     * Knox; Lake; Logan; Lorain; Lucas; Mahoning; Marion; Medina; Mercer; Morrow; Ottawa; Paulding; Portage; Putnam;
     * Richland; Sandusky; Seneca; Shelby; Stark; Summit; Trumbull; Tuscarawas; Union; Van Wert; Wayne; Williams; Wood;
     * Wyandot
     * State law defines use of US survey feet. Federal definition is metric - see code 3637. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_OHIO_NORTH_FTUS = 'urn:ogc:def:crs:EPSG::3728';

    /**
     * NAD83(NSRS2007) / Ohio South
     * Extent: USA - Ohio - counties of Adams; Athens; Belmont; Brown; Butler; Champaign; Clark; Clermont; Clinton;
     * Darke; Fairfield; Fayette; Franklin; Gallia; Greene; Guernsey; Hamilton; Highland; Hocking; Jackson; Lawrence;
     * Licking; Madison; Meigs; Miami; Monroe; Montgomery; Morgan; Muskingum; Noble; Perry; Pickaway; Pike; Preble;
     * Ross; Scioto; Vinton; Warren; Washington
     * State law defines use of US survey feet. See code 3729 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_OHIO_SOUTH = 'urn:ogc:def:crs:EPSG::3638';

    /**
     * NAD83(NSRS2007) / Ohio South (ftUS)
     * Extent: USA - Ohio - counties of Adams; Athens; Belmont; Brown; Butler; Champaign; Clark; Clermont; Clinton;
     * Darke; Fairfield; Fayette; Franklin; Gallia; Greene; Guernsey; Hamilton; Highland; Hocking; Jackson; Lawrence;
     * Licking; Madison; Meigs; Miami; Monroe; Montgomery; Morgan; Muskingum; Noble; Perry; Pickaway; Pike; Preble;
     * Ross; Scioto; Vinton; Warren; Washington
     * State law defines use of US survey feet. Federal definition is metric - see code 3638. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_OHIO_SOUTH_FTUS = 'urn:ogc:def:crs:EPSG::3729';

    /**
     * NAD83(NSRS2007) / Oklahoma North
     * Extent: USA - Oklahoma - counties of Adair; Alfalfa; Beaver; Blaine; Canadian; Cherokee; Cimarron; Craig; Creek;
     * Custer; Delaware; Dewey; Ellis; Garfield; Grant; Harper; Kay; Kingfisher; Lincoln; Logan; Major; Mayes;
     * Muskogee; Noble; Nowata; Okfuskee; Oklahoma; Okmulgee; Osage; Ottawa; Pawnee; Payne; Roger Mills; Rogers;
     * Sequoyah; Texas; Tulsa; Wagoner; Washington; Woods; Woodward
     * State law defines use of US survey feet. See code 3640 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_OKLAHOMA_NORTH = 'urn:ogc:def:crs:EPSG::3639';

    /**
     * NAD83(NSRS2007) / Oklahoma North (ftUS)
     * Extent: USA - Oklahoma - counties of Adair; Alfalfa; Beaver; Blaine; Canadian; Cherokee; Cimarron; Craig; Creek;
     * Custer; Delaware; Dewey; Ellis; Garfield; Grant; Harper; Kay; Kingfisher; Lincoln; Logan; Major; Mayes;
     * Muskogee; Noble; Nowata; Okfuskee; Oklahoma; Okmulgee; Osage; Ottawa; Pawnee; Payne; Roger Mills; Rogers;
     * Sequoyah; Texas; Tulsa; Wagoner; Washington; Woods; Woodward
     * State law defines use of US survey feet. Federal definition is metric - see code 3639. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_OKLAHOMA_NORTH_FTUS = 'urn:ogc:def:crs:EPSG::3640';

    /**
     * NAD83(NSRS2007) / Oklahoma South
     * Extent: USA - Oklahoma - counties of Atoka; Beckham; Bryan; Caddo; Carter; Choctaw; Cleveland; Coal; Comanche;
     * Cotton; Garvin; Grady; Greer; Harmon; Haskell; Hughes; Jackson; Jefferson; Johnston; Kiowa; Latimer; Le Flore;
     * Love; Marshall; McClain; McCurtain; McIntosh; Murray; Pittsburg; Pontotoc; Pottawatomie; Pushmataha; Seminole;
     * Stephens; Tillman; Washita
     * State law defines use of US survey feet. See code 3642 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_OKLAHOMA_SOUTH = 'urn:ogc:def:crs:EPSG::3641';

    /**
     * NAD83(NSRS2007) / Oklahoma South (ftUS)
     * Extent: USA - Oklahoma - counties of Atoka; Beckham; Bryan; Caddo; Carter; Choctaw; Cleveland; Coal; Comanche;
     * Cotton; Garvin; Grady; Greer; Harmon; Haskell; Hughes; Jackson; Jefferson; Johnston; Kiowa; Latimer; Le Flore;
     * Love; Marshall; McClain; McCurtain; McIntosh; Murray; Pittsburg; Pontotoc; Pottawatomie; Pushmataha; Seminole;
     * Stephens; Tillman; Washita
     * State law defines use of US survey feet. Federal definition is metric - see code 3641. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_OKLAHOMA_SOUTH_FTUS = 'urn:ogc:def:crs:EPSG::3642';

    /**
     * NAD83(NSRS2007) / Oregon GIC Lambert (ft)
     * Extent: USA - Oregon
     * State law defines use of International feet (note: not US survey feet). Replaces NAD83(HARN) / Oregon GIC
     * Lambert (ft) (CRS code 2994). Replaced by NAD83(2011) / Oregon GIC Lambert (ft) (CRS code 6557).
     */
    public const EPSG_NAD83_NSRS2007_OREGON_GIC_LAMBERT_FT = 'urn:ogc:def:crs:EPSG::3644';

    /**
     * NAD83(NSRS2007) / Oregon LCC (m)
     * Extent: USA - Oregon
     * See CRS code 3644 for non-metric definition used by state agencies. Replaces NAD83(HARN) / Oregon LCC (m) (CRS
     * code 2993). Replaced by NAD83(2011) / Oregon LCC (m) (CRS code 6556).
     */
    public const EPSG_NAD83_NSRS2007_OREGON_LCC_M = 'urn:ogc:def:crs:EPSG::3643';

    /**
     * NAD83(NSRS2007) / Oregon North
     * Extent: USA - Oregon - counties of Baker; Benton; Clackamas; Clatsop; Columbia; Gilliam; Grant; Hood River;
     * Jefferson; Lincoln; Linn; Marion; Morrow; Multnomah; Polk; Sherman; Tillamook; Umatilla; Union; Wallowa; Wasco;
     * Washington; Wheeler; Yamhill
     * State law defines use of International feet (note: not US survey feet). See code 3646 for equivalent non-metric
     * definition. Replaces NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_OREGON_NORTH = 'urn:ogc:def:crs:EPSG::3645';

    /**
     * NAD83(NSRS2007) / Oregon North (ft)
     * Extent: USA - Oregon - counties of Baker; Benton; Clackamas; Clatsop; Columbia; Gilliam; Grant; Hood River;
     * Jefferson; Lincoln; Linn; Marion; Morrow; Multnomah; Polk; Sherman; Tillamook; Umatilla; Union; Wallowa; Wasco;
     * Washington; Wheeler; Yamhill
     * State law defines use of International feet (note: not US survey feet). Federal definition is metric - see code
     * 3645. Replaces NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_OREGON_NORTH_FT = 'urn:ogc:def:crs:EPSG::3646';

    /**
     * NAD83(NSRS2007) / Oregon South
     * Extent: USA - Oregon - counties of Coos; Crook; Curry; Deschutes; Douglas; Harney; Jackson; Josephine; Klamath;
     * Lake; Lane; Malheur
     * State law defines use of International feet (note: not US survey feet). See code 3648 for equivalent non-metric
     * definition. Replaces NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_OREGON_SOUTH = 'urn:ogc:def:crs:EPSG::3647';

    /**
     * NAD83(NSRS2007) / Oregon South (ft)
     * Extent: USA - Oregon - counties of Coos; Crook; Curry; Deschutes; Douglas; Harney; Jackson; Josephine; Klamath;
     * Lake; Lane; Malheur
     * State law defines use of International feet (note: not US survey feet). Federal definition is metric - see code
     * 3647. Replaces NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_OREGON_SOUTH_FT = 'urn:ogc:def:crs:EPSG::3648';

    /**
     * NAD83(NSRS2007) / Pennsylvania North
     * Extent: USA - Pennsylvania - counties of Bradford; Cameron; Carbon; Centre; Clarion; Clearfield; Clinton;
     * Columbia; Crawford; Elk; Erie; Forest; Jefferson; Lackawanna; Luzerne; Lycoming; McKean; Mercer; Monroe;
     * Montour; Northumberland; Pike; Potter; Sullivan; Susquehanna; Tioga; Union; Venango; Warren; Wayne; Wyoming
     * State law defines use of US survey feet. See code 3650 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_PENNSYLVANIA_NORTH = 'urn:ogc:def:crs:EPSG::3649';

    /**
     * NAD83(NSRS2007) / Pennsylvania North (ftUS)
     * Extent: USA - Pennsylvania - counties of Bradford; Cameron; Carbon; Centre; Clarion; Clearfield; Clinton;
     * Columbia; Crawford; Elk; Erie; Forest; Jefferson; Lackawanna; Luzerne; Lycoming; McKean; Mercer; Monroe;
     * Montour; Northumberland; Pike; Potter; Sullivan; Susquehanna; Tioga; Union; Venango; Warren; Wayne; Wyoming
     * State law defines use of US survey feet. Federal definition is metric - see code 3649. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_PENNSYLVANIA_NORTH_FTUS = 'urn:ogc:def:crs:EPSG::3650';

    /**
     * NAD83(NSRS2007) / Pennsylvania South
     * Extent: USA - Pennsylvania - counties of Adams; Allegheny; Armstrong; Beaver; Bedford; Berks; Blair; Bucks;
     * Butler; Cambria; Chester; Cumberland; Dauphin; Delaware; Fayette; Franklin; Fulton; Greene; Huntingdon; Indiana;
     * Juniata; Lancaster; Lawrence; Lebanon; Lehigh; Mifflin; Montgomery; Northampton; Perry; Philadelphia;
     * Schuylkill; Snyder; Somerset; Washington; Westmoreland; York
     * State law defines use of US survey feet. See code 3652 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_PENNSYLVANIA_SOUTH = 'urn:ogc:def:crs:EPSG::3651';

    /**
     * NAD83(NSRS2007) / Pennsylvania South (ftUS)
     * Extent: USA - Pennsylvania - counties of Adams; Allegheny; Armstrong; Beaver; Bedford; Berks; Blair; Bucks;
     * Butler; Cambria; Chester; Cumberland; Dauphin; Delaware; Fayette; Franklin; Fulton; Greene; Huntingdon; Indiana;
     * Juniata; Lancaster; Lawrence; Lebanon; Lehigh; Mifflin; Montgomery; Northampton; Perry; Philadelphia;
     * Schuylkill; Snyder; Somerset; Washington; Westmoreland; York
     * State law defines use of US survey feet. Federal definition is metric - see code 3651. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_PENNSYLVANIA_SOUTH_FTUS = 'urn:ogc:def:crs:EPSG::3652';

    /**
     * NAD83(NSRS2007) / Puerto Rico and Virgin Is.
     * Extent: Puerto Rico and US Virgin Islands - onshore
     * Replaces NAD83(HARN) / SPCS (CRS code 2866).
     */
    public const EPSG_NAD83_NSRS2007_PUERTO_RICO_AND_VIRGIN_IS = 'urn:ogc:def:crs:EPSG::4437';

    /**
     * NAD83(NSRS2007) / Rhode Island
     * Extent: USA - Rhode Island - counties of Bristol; Kent; Newport; Providence; Washington
     * State law defines use of US survey feet. See code 3654 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_RHODE_ISLAND = 'urn:ogc:def:crs:EPSG::3653';

    /**
     * NAD83(NSRS2007) / Rhode Island (ftUS)
     * Extent: USA - Rhode Island - counties of Bristol; Kent; Newport; Providence; Washington
     * State law defines use of US survey feet. Federal definition is metric - see code 3653. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_RHODE_ISLAND_FTUS = 'urn:ogc:def:crs:EPSG::3654';

    /**
     * NAD83(NSRS2007) / South Carolina
     * Extent: USA - South Carolina - counties of Abbeville; Aiken; Allendale; Anderson; Bamberg; Barnwell; Beaufort;
     * Berkeley; Calhoun; Charleston; Cherokee; Chester; Chesterfield; Clarendon; Colleton; Darlington; Dillon;
     * Dorchester; Edgefield; Fairfield; Florence; Georgetown; Greenville; Greenwood; Hampton; Horry; Jasper; Kershaw;
     * Lancaster; Laurens; Lee; Lexington; Marion; Marlboro; McCormick; Newberry; Oconee; Orangeburg; Pickens;
     * Richland; Saluda; Spartanburg; Sumter; Union; Williamsburg; York
     * State law defines use of International feet (note: not US survey feet). See code 3656 for equivalent non-metric
     * definition. Replaces NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_SOUTH_CAROLINA = 'urn:ogc:def:crs:EPSG::3655';

    /**
     * NAD83(NSRS2007) / South Carolina (ft)
     * Extent: USA - South Carolina - counties of Abbeville; Aiken; Allendale; Anderson; Bamberg; Barnwell; Beaufort;
     * Berkeley; Calhoun; Charleston; Cherokee; Chester; Chesterfield; Clarendon; Colleton; Darlington; Dillon;
     * Dorchester; Edgefield; Fairfield; Florence; Georgetown; Greenville; Greenwood; Hampton; Horry; Jasper; Kershaw;
     * Lancaster; Laurens; Lee; Lexington; Marion; Marlboro; McCormick; Newberry; Oconee; Orangeburg; Pickens;
     * Richland; Saluda; Spartanburg; Sumter; Union; Williamsburg; York
     * State law defines use of International feet (note: not US survey feet). Federal definition is metric - see code
     * 3655. Replaces NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_SOUTH_CAROLINA_FT = 'urn:ogc:def:crs:EPSG::3656';

    /**
     * NAD83(NSRS2007) / South Dakota North
     * Extent: USA - South Dakota - counties of Beadle; Brookings; Brown; Butte; Campbell; Clark; Codington; Corson;
     * Day; Deuel; Dewey; Edmunds; Faulk; Grant; Hamlin; Hand; Harding; Hyde; Kingsbury; Lawrence; Marshall; McPherson;
     * Meade; Perkins; Potter; Roberts; Spink; Sully; Walworth; Ziebach
     * State law defines use of US survey feet. See code 3658 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_SOUTH_DAKOTA_NORTH = 'urn:ogc:def:crs:EPSG::3657';

    /**
     * NAD83(NSRS2007) / South Dakota North (ftUS)
     * Extent: USA - South Dakota - counties of Beadle; Brookings; Brown; Butte; Campbell; Clark; Codington; Corson;
     * Day; Deuel; Dewey; Edmunds; Faulk; Grant; Hamlin; Hand; Harding; Hyde; Kingsbury; Lawrence; Marshall; McPherson;
     * Meade; Perkins; Potter; Roberts; Spink; Sully; Walworth; Ziebach
     * State law defines use of US survey feet. Federal definition is metric - see code 3657. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_SOUTH_DAKOTA_NORTH_FTUS = 'urn:ogc:def:crs:EPSG::3658';

    /**
     * NAD83(NSRS2007) / South Dakota South
     * Extent: USA - South Dakota - counties of Aurora; Bennett; Bon Homme; Brule; Buffalo; Charles Mix; Clay; Custer;
     * Davison; Douglas; Fall River; Gregory; Haakon; Hanson; Hughes; Hutchinson; Jackson; Jerauld; Jones; Lake;
     * Lincoln; Lyman; McCook; Mellette; Miner; Minnehaha; Moody; Pennington; Sanborn; Shannon; Stanley; Todd; Tripp;
     * Turner; Union; Yankton
     * State law defines use of US survey feet. See code 3660 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_SOUTH_DAKOTA_SOUTH = 'urn:ogc:def:crs:EPSG::3659';

    /**
     * NAD83(NSRS2007) / South Dakota South (ftUS)
     * Extent: USA - South Dakota - counties of Aurora; Bennett; Bon Homme; Brule; Buffalo; Charles Mix; Clay; Custer;
     * Davison; Douglas; Fall River; Gregory; Haakon; Hanson; Hughes; Hutchinson; Jackson; Jerauld; Jones; Lake;
     * Lincoln; Lyman; McCook; Mellette; Miner; Minnehaha; Moody; Pennington; Sanborn; Shannon; Stanley; Todd; Tripp;
     * Turner; Union; Yankton
     * State law defines use of US survey feet. Federal definition is metric - see code 3659. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_SOUTH_DAKOTA_SOUTH_FTUS = 'urn:ogc:def:crs:EPSG::3660';

    /**
     * NAD83(NSRS2007) / Tennessee
     * Extent: USA - Tennessee - counties of Anderson; Bedford; Benton; Bledsoe; Blount; Bradley; Campbell; Cannon;
     * Carroll; Carter; Cheatham; Chester; Claiborne; Clay; Cocke; Coffee; Crockett; Cumberland; Davidson; De Kalb;
     * Decatur; Dickson; Dyer; Fayette; Fentress; Franklin; Gibson; Giles; Grainger; Greene; Grundy; Hamblen; Hamilton;
     * Hancock; Hardeman; Hardin; Hawkins; Haywood; Henderson; Henry; Hickman; Houston; Humphreys; Jackson; Jefferson;
     * Johnson; Knox; Lake; Lauderdale; Lawrence; Lewis; Lincoln; Loudon; Macon; Madison; Marion; Marshall; Maury;
     * McMinn; McNairy; Meigs; Monroe; Montgomery; Moore; Morgan; Obion; Overton; Perry; Pickett; Polk; Putnam; Rhea;
     * Roane; Robertson; Rutherford; Scott; Sequatchie; Sevier; Shelby; Smith; Stewart; Sullivan; Sumner; Tipton;
     * Trousdale; Unicoi; Union; Van Buren; Warren; Washington; Wayne; Weakley; White; Williamson; Wilson
     * State law defines use of US survey feet. See code 3662 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_TENNESSEE = 'urn:ogc:def:crs:EPSG::3661';

    /**
     * NAD83(NSRS2007) / Tennessee (ftUS)
     * Extent: USA - Tennessee - counties of Anderson; Bedford; Benton; Bledsoe; Blount; Bradley; Campbell; Cannon;
     * Carroll; Carter; Cheatham; Chester; Claiborne; Clay; Cocke; Coffee; Crockett; Cumberland; Davidson; De Kalb;
     * Decatur; Dickson; Dyer; Fayette; Fentress; Franklin; Gibson; Giles; Grainger; Greene; Grundy; Hamblen; Hamilton;
     * Hancock; Hardeman; Hardin; Hawkins; Haywood; Henderson; Henry; Hickman; Houston; Humphreys; Jackson; Jefferson;
     * Johnson; Knox; Lake; Lauderdale; Lawrence; Lewis; Lincoln; Loudon; Macon; Madison; Marion; Marshall; Maury;
     * McMinn; McNairy; Meigs; Monroe; Montgomery; Moore; Morgan; Obion; Overton; Perry; Pickett; Polk; Putnam; Rhea;
     * Roane; Robertson; Rutherford; Scott; Sequatchie; Sevier; Shelby; Smith; Stewart; Sullivan; Sumner; Tipton;
     * Trousdale; Unicoi; Union; Van Buren; Warren; Washington; Wayne; Weakley; White; Williamson; Wilson
     * State law defines use of US survey feet. Federal definition is metric - see code 3661. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_TENNESSEE_FTUS = 'urn:ogc:def:crs:EPSG::3662';

    /**
     * NAD83(NSRS2007) / Texas Central
     * Extent: USA - Texas - counties of Anderson; Angelina; Bastrop; Bell; Blanco; Bosque; Brazos; Brown; Burleson;
     * Burnet; Cherokee; Coke; Coleman; Comanche; Concho; Coryell; Crane; Crockett; Culberson; Ector; El Paso; Falls;
     * Freestone; Gillespie; Glasscock; Grimes; Hamilton; Hardin; Houston; Hudspeth; Irion; Jasper; Jeff Davis; Kimble;
     * Lampasas; Lee; Leon; Liberty; Limestone; Llano; Loving; Madison; Mason; McCulloch; McLennan; Menard; Midland;
     * Milam; Mills; Montgomery; Nacogdoches; Newton; Orange; Pecos; Polk; Reagan; Reeves; Robertson; Runnels; Sabine;
     * San Augustine; San Jacinto; San Saba; Schleicher; Shelby; Sterling; Sutton; Tom Green; Travis; Trinity; Tyler;
     * Upton; Walker; Ward; Washington; Williamson; Winkler
     * State law defines use of US survey feet. See code 3664 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_TEXAS_CENTRAL = 'urn:ogc:def:crs:EPSG::3663';

    /**
     * NAD83(NSRS2007) / Texas Central (ftUS)
     * Extent: USA - Texas - counties of Anderson; Angelina; Bastrop; Bell; Blanco; Bosque; Brazos; Brown; Burleson;
     * Burnet; Cherokee; Coke; Coleman; Comanche; Concho; Coryell; Crane; Crockett; Culberson; Ector; El Paso; Falls;
     * Freestone; Gillespie; Glasscock; Grimes; Hamilton; Hardin; Houston; Hudspeth; Irion; Jasper; Jeff Davis; Kimble;
     * Lampasas; Lee; Leon; Liberty; Limestone; Llano; Loving; Madison; Mason; McCulloch; McLennan; Menard; Midland;
     * Milam; Mills; Montgomery; Nacogdoches; Newton; Orange; Pecos; Polk; Reagan; Reeves; Robertson; Runnels; Sabine;
     * San Augustine; San Jacinto; San Saba; Schleicher; Shelby; Sterling; Sutton; Tom Green; Travis; Trinity; Tyler;
     * Upton; Walker; Ward; Washington; Williamson; Winkler
     * State law defines use of US survey feet. Federal definition is metric - see code 3663. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_TEXAS_CENTRAL_FTUS = 'urn:ogc:def:crs:EPSG::3664';

    /**
     * NAD83(NSRS2007) / Texas Centric Albers Equal Area
     * Extent: USA - Texas
     * Replaces NAD83(HARN) / TX Albers (CRS code 3085). Replaced by NAD83(2011) / TX Albers (CRS code 6579). For
     * state-wide spatial data presentation requiring shape preservation use NAD83(NSRS2007) / TX LC (CRS code 3666).
     */
    public const EPSG_NAD83_NSRS2007_TEXAS_CENTRIC_ALBERS_EQUAL_AREA = 'urn:ogc:def:crs:EPSG::3665';

    /**
     * NAD83(NSRS2007) / Texas Centric Lambert Conformal
     * Extent: USA - Texas
     * Replaces NAD83(HARN) / TX LC (CRS code 3084). Replaced by NAD83(2011) / TX  LC (CRS code 3666). For state-wide
     * spatial data presentation requiring true area measurements use NAD83(NSRS2007) / TX Albers (CRS code 3665).
     */
    public const EPSG_NAD83_NSRS2007_TEXAS_CENTRIC_LAMBERT_CONFORMAL = 'urn:ogc:def:crs:EPSG::3666';

    /**
     * NAD83(NSRS2007) / Texas North
     * Extent: USA - Texas - counties of: Armstrong; Briscoe; Carson; Castro; Childress; Collingsworth; Dallam; Deaf
     * Smith; Donley; Gray; Hall; Hansford; Hartley; Hemphill; Hutchinson; Lipscomb; Moore; Ochiltree; Oldham; Parmer;
     * Potter; Randall; Roberts; Sherman; Swisher; Wheeler
     * State law defines use of US survey feet. See code 3668 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_TEXAS_NORTH = 'urn:ogc:def:crs:EPSG::3667';

    /**
     * NAD83(NSRS2007) / Texas North (ftUS)
     * Extent: USA - Texas - counties of: Armstrong; Briscoe; Carson; Castro; Childress; Collingsworth; Dallam; Deaf
     * Smith; Donley; Gray; Hall; Hansford; Hartley; Hemphill; Hutchinson; Lipscomb; Moore; Ochiltree; Oldham; Parmer;
     * Potter; Randall; Roberts; Sherman; Swisher; Wheeler
     * State law defines use of US survey feet. Federal definition is metric - see code 3667. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_TEXAS_NORTH_FTUS = 'urn:ogc:def:crs:EPSG::3668';

    /**
     * NAD83(NSRS2007) / Texas North Central
     * Extent: USA - Texas - counties of: Andrews; Archer; Bailey; Baylor; Borden; Bowie; Callahan; Camp; Cass; Clay;
     * Cochran; Collin; Cooke; Cottle; Crosby; Dallas; Dawson; Delta; Denton; Dickens; Eastland; Ellis; Erath; Fannin;
     * Fisher; Floyd; Foard; Franklin; Gaines; Garza; Grayson; Gregg; Hale; Hardeman; Harrison; Haskell; Henderson;
     * Hill; Hockley; Hood; Hopkins; Howard; Hunt; Jack; Johnson; Jones; Kaufman; Kent; King; Knox; Lamar; Lamb;
     * Lubbock; Lynn; Marion; Martin; Mitchell; Montague; Morris; Motley; Navarro; Nolan; Palo Pinto; Panola; Parker;
     * Rains; Red River; Rockwall; Rusk; Scurry; Shackelford; Smith; Somervell; Stephens; Stonewall; Tarrant; Taylor;
     * Terry; Throckmorton; Titus; Upshur; Van Zandt; Wichita; Wilbarger; Wise; Wood; Yoakum; Young
     * State law defines use of US survey feet. See code 3670 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_TEXAS_NORTH_CENTRAL = 'urn:ogc:def:crs:EPSG::3669';

    /**
     * NAD83(NSRS2007) / Texas North Central (ftUS)
     * Extent: USA - Texas - counties of: Andrews; Archer; Bailey; Baylor; Borden; Bowie; Callahan; Camp; Cass; Clay;
     * Cochran; Collin; Cooke; Cottle; Crosby; Dallas; Dawson; Delta; Denton; Dickens; Eastland; Ellis; Erath; Fannin;
     * Fisher; Floyd; Foard; Franklin; Gaines; Garza; Grayson; Gregg; Hale; Hardeman; Harrison; Haskell; Henderson;
     * Hill; Hockley; Hood; Hopkins; Howard; Hunt; Jack; Johnson; Jones; Kaufman; Kent; King; Knox; Lamar; Lamb;
     * Lubbock; Lynn; Marion; Martin; Mitchell; Montague; Morris; Motley; Navarro; Nolan; Palo Pinto; Panola; Parker;
     * Rains; Red River; Rockwall; Rusk; Scurry; Shackelford; Smith; Somervell; Stephens; Stonewall; Tarrant; Taylor;
     * Terry; Throckmorton; Titus; Upshur; Van Zandt; Wichita; Wilbarger; Wise; Wood; Yoakum; Young
     * State law defines use of US survey feet. Federal definition is metric - see code 3669. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_TEXAS_NORTH_CENTRAL_FTUS = 'urn:ogc:def:crs:EPSG::3670';

    /**
     * NAD83(NSRS2007) / Texas South
     * Extent: USA - Texas - counties of Brooks; Cameron; Duval; Hidalgo; Jim Hogg; Jim Wells; Kenedy; Kleberg; Nueces;
     * San Patricio; Starr; Webb; Willacy; Zapata
     * State law defines use of US survey feet. See code 3672 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_TEXAS_SOUTH = 'urn:ogc:def:crs:EPSG::3671';

    /**
     * NAD83(NSRS2007) / Texas South (ftUS)
     * Extent: USA - Texas - counties of Brooks; Cameron; Duval; Hidalgo; Jim Hogg; Jim Wells; Kenedy; Kleberg; Nueces;
     * San Patricio; Starr; Webb; Willacy; Zapata
     * State law defines use of US survey feet. Federal definition is metric - see code 3671. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_TEXAS_SOUTH_FTUS = 'urn:ogc:def:crs:EPSG::3672';

    /**
     * NAD83(NSRS2007) / Texas South Central
     * Extent: USA - Texas - counties of Aransas; Atascosa; Austin; Bandera; Bee; Bexar; Brazoria; Brewster; Caldwell;
     * Calhoun; Chambers; Colorado; Comal; De Witt; Dimmit; Edwards; Fayette; Fort Bend; Frio; Galveston; Goliad;
     * Gonzales; Guadalupe; Harris; Hays; Jackson; Jefferson; Karnes; Kendall; Kerr; Kinney; La Salle; Lavaca; Live
     * Oak; Matagorda; Maverick; McMullen; Medina; Presidio; Real; Refugio; Terrell; Uvalde; Val Verde; Victoria;
     * Waller; Wharton; Wilson; Zavala
     * State law defines use of US survey feet. See code 3764 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_TEXAS_SOUTH_CENTRAL = 'urn:ogc:def:crs:EPSG::3673';

    /**
     * NAD83(NSRS2007) / Texas South Central (ftUS)
     * Extent: USA - Texas - counties of Aransas; Atascosa; Austin; Bandera; Bee; Bexar; Brazoria; Brewster; Caldwell;
     * Calhoun; Chambers; Colorado; Comal; De Witt; Dimmit; Edwards; Fayette; Fort Bend; Frio; Galveston; Goliad;
     * Gonzales; Guadalupe; Harris; Hays; Jackson; Jefferson; Karnes; Kendall; Kerr; Kinney; La Salle; Lavaca; Live
     * Oak; Matagorda; Maverick; McMullen; Medina; Presidio; Real; Refugio; Terrell; Uvalde; Val Verde; Victoria;
     * Waller; Wharton; Wilson; Zavala
     * State law defines use of US survey feet. Federal definition is metric - see code 3673. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_TEXAS_SOUTH_CENTRAL_FTUS = 'urn:ogc:def:crs:EPSG::3674';

    /**
     * NAD83(NSRS2007) / UTM zone 10N
     * Extent: USA - between 126°W and 120°W - California; Oregon; Washington
     * Replaces NAD83(HARN) / UTM zone 10N.
     */
    public const EPSG_NAD83_NSRS2007_UTM_ZONE_10N = 'urn:ogc:def:crs:EPSG::3717';

    /**
     * NAD83(NSRS2007) / UTM zone 11N
     * Extent: USA - between 120°W and 114°W - California, Idaho, Nevada, Oregon, Washington
     * Replaces NAD83(HARN) / UTM zone 11N.
     */
    public const EPSG_NAD83_NSRS2007_UTM_ZONE_11N = 'urn:ogc:def:crs:EPSG::3718';

    /**
     * NAD83(NSRS2007) / UTM zone 12N
     * Extent: USA - between 114°W and 108°W - Arizona; Colorado; Idaho; Montana; New Mexico; Utah; Wyoming
     * Replaces NAD83(HARN) / UTM zone 12N.
     */
    public const EPSG_NAD83_NSRS2007_UTM_ZONE_12N = 'urn:ogc:def:crs:EPSG::3719';

    /**
     * NAD83(NSRS2007) / UTM zone 13N
     * Extent: USA - between 108°W and 102°W - Colorado; Montana; Nebraska; New Mexico; North Dakota; Oklahoma; South
     * Dakota; Texas; Wyoming
     * Replaces NAD83(HARN) / UTM zone 13N.
     */
    public const EPSG_NAD83_NSRS2007_UTM_ZONE_13N = 'urn:ogc:def:crs:EPSG::3720';

    /**
     * NAD83(NSRS2007) / UTM zone 14N
     * Extent: USA - between 102°W and 96°W - Iowa; Kansas; Minnesota; Nebraska; North Dakota; Oklahoma; South
     * Dakota; Texas
     * Replaces NAD83(HARN) / UTM zone 14N.
     */
    public const EPSG_NAD83_NSRS2007_UTM_ZONE_14N = 'urn:ogc:def:crs:EPSG::3721';

    /**
     * NAD83(NSRS2007) / UTM zone 15N
     * Extent: USA - between 96°W and 90°W - Arkansas; Illinois; Iowa; Kansas; Louisiana; Michigan; Minnesota;
     * Mississippi; Missouri; Nebraska; Oklahoma; Tennessee; Texas; Wisconsin
     * Replaces NAD83(HARN) / UTM zone 15N.
     */
    public const EPSG_NAD83_NSRS2007_UTM_ZONE_15N = 'urn:ogc:def:crs:EPSG::3722';

    /**
     * NAD83(NSRS2007) / UTM zone 16N
     * Extent: USA - between 90°W and 84°W - Alabama; Arkansas; Florida; Georgia; Indiana; Illinois; Kentucky;
     * Louisiana; Michigan; Minnesota; Mississippi; Missouri; North Carolina; Ohio; Tennessee; Wisconsin
     * Replaces NAD83(HARN) / UTM zone 16N.
     */
    public const EPSG_NAD83_NSRS2007_UTM_ZONE_16N = 'urn:ogc:def:crs:EPSG::3723';

    /**
     * NAD83(NSRS2007) / UTM zone 17N
     * Extent: USA - between 84°W and 78°W - Florida; Georgia; Kentucky; Maryland; Michigan; New York; North
     * Carolina; Ohio; Pennsylvania; South Carolina; Tennessee; Virginia; West Virginia
     * Replaces NAD83(HARN) / UTM zone 17N.
     */
    public const EPSG_NAD83_NSRS2007_UTM_ZONE_17N = 'urn:ogc:def:crs:EPSG::3724';

    /**
     * NAD83(NSRS2007) / UTM zone 18N
     * Extent: USA - between 78°W and 72°W - Connecticut; Delaware; Maryland; Massachusetts; New Hampshire; New
     * Jersey; New York; North Carolina; Pennsylvania; Virginia; Vermont
     * Replaces NAD83(HARN) / UTM zone 18N.
     */
    public const EPSG_NAD83_NSRS2007_UTM_ZONE_18N = 'urn:ogc:def:crs:EPSG::3725';

    /**
     * NAD83(NSRS2007) / UTM zone 19N
     * Extent: USA - between 72°W and 66°W - Connecticut; Maine; Massachusetts; New Hampshire; New York (Long
     * Island); Rhode Island; Vermont
     * Replaces NAD83(HARN) / UTM zone 19N.
     */
    public const EPSG_NAD83_NSRS2007_UTM_ZONE_19N = 'urn:ogc:def:crs:EPSG::3726';

    /**
     * NAD83(NSRS2007) / UTM zone 1N
     * Extent: USA - between 180°W and 174°W - Alaska and offshore continental shelf (OCS)
     * For applications with an accuracy of better than 1m, replaces NAD83 / UTM zone 1N.
     */
    public const EPSG_NAD83_NSRS2007_UTM_ZONE_1N = 'urn:ogc:def:crs:EPSG::3708';

    /**
     * NAD83(NSRS2007) / UTM zone 2N
     * Extent: USA - between 174°W and 168°W - Alaska and offshore continental shelf (OCS)
     * For applications with an accuracy of better than 1m, replaces NAD83 / UTM zone 2N.
     */
    public const EPSG_NAD83_NSRS2007_UTM_ZONE_2N = 'urn:ogc:def:crs:EPSG::3709';

    /**
     * NAD83(NSRS2007) / UTM zone 3N
     * Extent: USA - between 168°W and 162°W - Alaska and offshore continental shelf (OCS)
     * For applications with an accuracy of better than 1m, replaces NAD83 / UTM zone 3N.
     */
    public const EPSG_NAD83_NSRS2007_UTM_ZONE_3N = 'urn:ogc:def:crs:EPSG::3710';

    /**
     * NAD83(NSRS2007) / UTM zone 4N
     * Extent: USA - between 162°W and 156°W - Alaska and offshore continental shelf (OCS)
     * For applications with an accuracy of better than 1m, replaces NAD83 / UTM zone 4N.
     */
    public const EPSG_NAD83_NSRS2007_UTM_ZONE_4N = 'urn:ogc:def:crs:EPSG::3711';

    /**
     * NAD83(NSRS2007) / UTM zone 59N
     * Extent: USA - west of 174°E. Alaska and offshore continental shelf (OCS)
     * For applications with an accuracy of better than 1m, replaces NAD83 / UTM zone 59N.
     */
    public const EPSG_NAD83_NSRS2007_UTM_ZONE_59N = 'urn:ogc:def:crs:EPSG::3706';

    /**
     * NAD83(NSRS2007) / UTM zone 5N
     * Extent: USA - between 156°W and 150°W - Alaska and offshore continental shelf (OCS)
     * For applications with an accuracy of better than 1m, replaces NAD83 / UTM zone 5N.
     */
    public const EPSG_NAD83_NSRS2007_UTM_ZONE_5N = 'urn:ogc:def:crs:EPSG::3712';

    /**
     * NAD83(NSRS2007) / UTM zone 60N
     * Extent: USA - between 174°E and 180°E - Alaska and offshore continental shelf (OCS)
     * For applications with an accuracy of better than 1m, replaces NAD83 / UTM zone 60N.
     */
    public const EPSG_NAD83_NSRS2007_UTM_ZONE_60N = 'urn:ogc:def:crs:EPSG::3707';

    /**
     * NAD83(NSRS2007) / UTM zone 6N
     * Extent: USA - between 150°W and 144°W - Alaska and offshore continental shelf (OCS)
     * For applications with an accuracy of better than 1m, replaces NAD83 / UTM zone 6N.
     */
    public const EPSG_NAD83_NSRS2007_UTM_ZONE_6N = 'urn:ogc:def:crs:EPSG::3713';

    /**
     * NAD83(NSRS2007) / UTM zone 7N
     * Extent: USA - between 144°W and 138°W - Alaska
     * For applications with an accuracy of better than 1m, replaces NAD83 / UTM zone 7N.
     */
    public const EPSG_NAD83_NSRS2007_UTM_ZONE_7N = 'urn:ogc:def:crs:EPSG::3714';

    /**
     * NAD83(NSRS2007) / UTM zone 8N
     * Extent: USA - between 138°W and 132°W - Alaska
     * For applications with an accuracy of better than 1m, replaces NAD83 / UTM zone 8N.
     */
    public const EPSG_NAD83_NSRS2007_UTM_ZONE_8N = 'urn:ogc:def:crs:EPSG::3715';

    /**
     * NAD83(NSRS2007) / UTM zone 9N
     * Extent: USA - between 132°W and 126°W - Alaska
     * For applications with an accuracy of better than 1m, replaces NAD83 / UTM zone 9N.
     */
    public const EPSG_NAD83_NSRS2007_UTM_ZONE_9N = 'urn:ogc:def:crs:EPSG::3716';

    /**
     * NAD83(NSRS2007) / Utah Central
     * Extent: USA - Utah - counties of Carbon; Duchesne; Emery; Grand; Juab; Millard; Salt Lake; Sanpete; Sevier;
     * Tooele; Uintah; Utah; Wasatch
     * State law of 2009 defines use of US survey feet: see CRS code 3677 for equivalent non-metric definition. An
     * earlier law of 1988 defining use of International foot was withdrawn in 2001. Replaces NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_UTAH_CENTRAL = 'urn:ogc:def:crs:EPSG::3675';

    /**
     * NAD83(NSRS2007) / Utah Central (ft)
     * Extent: USA - Utah - counties of Carbon; Duchesne; Emery; Grand; Juab; Millard; Salt Lake; Sanpete; Sevier;
     * Tooele; Uintah; Utah; Wasatch
     * State law of 1988 defining use of International feet was withdrawn in 2001. State law of 2009 defines use of US
     * survey feet: see CRS code 3677. Federal definition is metric - see code 3675. Replaces NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_UTAH_CENTRAL_FT = 'urn:ogc:def:crs:EPSG::3676';

    /**
     * NAD83(NSRS2007) / Utah Central (ftUS)
     * Extent: USA - Utah - counties of Carbon; Duchesne; Emery; Grand; Juab; Millard; Salt Lake; Sanpete; Sevier;
     * Tooele; Uintah; Utah; Wasatch
     * State law defining use of International feet (note: not US survey feet) has been withdrawn. Federal definition
     * is metric - see code 3675. Replaces NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_UTAH_CENTRAL_FTUS = 'urn:ogc:def:crs:EPSG::3677';

    /**
     * NAD83(NSRS2007) / Utah North
     * Extent: USA - Utah - counties of Box Elder; Cache; Daggett; Davis; Morgan; Rich; Summit; Weber
     * State law of 2009 defines use of US survey feet: see CRS code 3680 for equivalent non-metric definition. An
     * earlier law of 1988 defining use of International foot was withdrawn in 2001. Replaces NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_UTAH_NORTH = 'urn:ogc:def:crs:EPSG::3678';

    /**
     * NAD83(NSRS2007) / Utah North (ft)
     * Extent: USA - Utah - counties of Box Elder; Cache; Daggett; Davis; Morgan; Rich; Summit; Weber
     * State law of 1988 defining use of International feet was withdrawn in 2001. State law of 2009 defines use of US
     * survey feet: see CRS code 3680. Federal definition is metric - see code 3678. Replaces NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_UTAH_NORTH_FT = 'urn:ogc:def:crs:EPSG::3679';

    /**
     * NAD83(NSRS2007) / Utah North (ftUS)
     * Extent: USA - Utah - counties of Box Elder; Cache; Daggett; Davis; Morgan; Rich; Summit; Weber
     * State law defining use of International feet (note: not US survey feet) has been withdrawn. Federal definition
     * is metric - see code 3678. Replaces NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_UTAH_NORTH_FTUS = 'urn:ogc:def:crs:EPSG::3680';

    /**
     * NAD83(NSRS2007) / Utah South
     * Extent: USA - Utah - counties of Beaver; Garfield; Iron; Kane; Piute; San Juan; Washington; Wayne
     * State law of 2009 defines use of US survey feet: see CRS code 3683 for equivalent non-metric definition. An
     * earlier law of 1988 defining use of International foot was withdrawn in 2001. Replaces NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_UTAH_SOUTH = 'urn:ogc:def:crs:EPSG::3681';

    /**
     * NAD83(NSRS2007) / Utah South (ft)
     * Extent: USA - Utah - counties of Beaver; Garfield; Iron; Kane; Piute; San Juan; Washington; Wayne
     * State law of 1988 defining use of International feet was withdrawn in 2001. State law of 2009 defines use of US
     * survey feet: see CRS code 3683. Federal definition is metric - see code 3681. Replaces NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_UTAH_SOUTH_FT = 'urn:ogc:def:crs:EPSG::3682';

    /**
     * NAD83(NSRS2007) / Utah South (ftUS)
     * Extent: USA - Utah - counties of Beaver; Garfield; Iron; Kane; Piute; San Juan; Washington; Wayne
     * State law defining use of International feet (note: not US survey feet) has been withdrawn. Federal definition
     * is metric - see code 3681. Replaces NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_UTAH_SOUTH_FTUS = 'urn:ogc:def:crs:EPSG::3683';

    /**
     * NAD83(NSRS2007) / Vermont
     * Extent: USA - Vermont - counties of Addison; Bennington; Caledonia; Chittenden; Essex; Franklin; Grand Isle;
     * Lamoille; Orange; Orleans; Rutland; Washington; Windham; Windsor
     * State law defines use of US survey feet. See code 5655 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_VERMONT = 'urn:ogc:def:crs:EPSG::3684';

    /**
     * NAD83(NSRS2007) / Vermont (ftUS)
     * Extent: USA - Vermont - counties of Addison; Bennington; Caledonia; Chittenden; Essex; Franklin; Grand Isle;
     * Lamoille; Orange; Orleans; Rutland; Washington; Windham; Windsor
     * State law defines use of US survey feet. Federal definition is metric - see code 3684. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_VERMONT_FTUS = 'urn:ogc:def:crs:EPSG::5655';

    /**
     * NAD83(NSRS2007) / Virginia Lambert
     * Extent: USA - Virginia
     * Replaces NAD83(HARN) / Virginia Lambert (CRS code 3969).
     */
    public const EPSG_NAD83_NSRS2007_VIRGINIA_LAMBERT = 'urn:ogc:def:crs:EPSG::3970';

    /**
     * NAD83(NSRS2007) / Virginia North
     * Extent: USA - Virginia - counties of Arlington; Augusta; Bath; Caroline; Clarke; Culpeper; Fairfax; Fauquier;
     * Frederick; Greene; Highland; King George; Loudoun; Madison; Orange; Page; Prince William; Rappahannock;
     * Rockingham; Shenandoah; Spotsylvania; Stafford; Warren; Westmoreland
     * State law defines use of US survey feet. See code 3686 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_VIRGINIA_NORTH = 'urn:ogc:def:crs:EPSG::3685';

    /**
     * NAD83(NSRS2007) / Virginia North (ftUS)
     * Extent: USA - Virginia - counties of Arlington; Augusta; Bath; Caroline; Clarke; Culpeper; Fairfax; Fauquier;
     * Frederick; Greene; Highland; King George; Loudoun; Madison; Orange; Page; Prince William; Rappahannock;
     * Rockingham; Shenandoah; Spotsylvania; Stafford; Warren; Westmoreland
     * State law defines use of US survey feet. Federal definition is metric - see code 3685. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_VIRGINIA_NORTH_FTUS = 'urn:ogc:def:crs:EPSG::3686';

    /**
     * NAD83(NSRS2007) / Virginia South
     * Extent: USA - Virginia - counties of Accomack; Albemarle; Alleghany; Amelia; Amherst; Appomattox; Bedford;
     * Bland; Botetourt; Bristol; Brunswick; Buchanan; Buckingham; Campbell; Carroll; Charles City; Charlotte;
     * Chesapeake; Chesterfield; Colonial Heights; Craig; Cumberland; Dickenson; Dinwiddie; Essex; Floyd; Fluvanna;
     * Franklin; Giles; Gloucester; Goochland; Grayson; Greensville; Halifax; Hampton; Hanover; Henrico; Henry; Isle of
     * Wight; James City; King and Queen; King William; Lancaster; Lee; Louisa; Lunenburg; Lynchburg; Mathews;
     * Mecklenburg; Middlesex; Montgomery; Nelson; New Kent; Newport News; Norfolk; Northampton; Northumberland;
     * Norton; Nottoway; Patrick; Petersburg; Pittsylvania; Portsmouth; Powhatan; Prince Edward; Prince George;
     * Pulaski; Richmond; Roanoke; Rockbridge; Russell; Scott; Smyth; Southampton; Suffolk; Surry; Sussex; Tazewell;
     * Washington; Wise; Wythe; York
     * State law defines use of US survey feet. See code 3688 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_VIRGINIA_SOUTH = 'urn:ogc:def:crs:EPSG::3687';

    /**
     * NAD83(NSRS2007) / Virginia South (ftUS)
     * Extent: USA - Virginia - counties of Accomack; Albemarle; Alleghany; Amelia; Amherst; Appomattox; Bedford;
     * Bland; Botetourt; Bristol; Brunswick; Buchanan; Buckingham; Campbell; Carroll; Charles City; Charlotte;
     * Chesapeake; Chesterfield; Colonial Heights; Craig; Cumberland; Dickenson; Dinwiddie; Essex; Floyd; Fluvanna;
     * Franklin; Giles; Gloucester; Goochland; Grayson; Greensville; Halifax; Hampton; Hanover; Henrico; Henry; Isle of
     * Wight; James City; King and Queen; King William; Lancaster; Lee; Louisa; Lunenburg; Lynchburg; Mathews;
     * Mecklenburg; Middlesex; Montgomery; Nelson; New Kent; Newport News; Norfolk; Northampton; Northumberland;
     * Norton; Nottoway; Patrick; Petersburg; Pittsylvania; Portsmouth; Powhatan; Prince Edward; Prince George;
     * Pulaski; Richmond; Roanoke; Rockbridge; Russell; Scott; Smyth; Southampton; Suffolk; Surry; Sussex; Tazewell;
     * Washington; Wise; Wythe; York
     * State law defines use of US survey feet. Federal definition is metric - see code 3687. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_VIRGINIA_SOUTH_FTUS = 'urn:ogc:def:crs:EPSG::3688';

    /**
     * NAD83(NSRS2007) / Washington North
     * Extent: USA - Washington - counties of Chelan; Clallam; Douglas; Ferry; Grant north of approximately 47°30'N;
     * Island; Jefferson; King; Kitsap; Lincoln; Okanogan; Pend Oreille; San Juan; Skagit; Snohomish; Spokane; Stevens;
     * Whatcom
     * State law defines use of US survey feet. See code 3690 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_WASHINGTON_NORTH = 'urn:ogc:def:crs:EPSG::3689';

    /**
     * NAD83(NSRS2007) / Washington North (ftUS)
     * Extent: USA - Washington - counties of Chelan; Clallam; Douglas; Ferry; Grant north of approximately 47°30'N;
     * Island; Jefferson; King; Kitsap; Lincoln; Okanogan; Pend Oreille; San Juan; Skagit; Snohomish; Spokane; Stevens;
     * Whatcom
     * State law defines use of US survey feet. Federal definition is metric - see code 3689. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_WASHINGTON_NORTH_FTUS = 'urn:ogc:def:crs:EPSG::3690';

    /**
     * NAD83(NSRS2007) / Washington South
     * Extent: USA - Washington - counties of Adams; Asotin; Benton; Clark; Columbia; Cowlitz; Franklin; Garfield;
     * Grant south of approximately 47°30'N; Grays Harbor; Kittitas; Klickitat; Lewis; Mason; Pacific; Pierce;
     * Skamania; Thurston; Wahkiakum; Walla Walla; Whitman; Yakima
     * State law defines use of US survey feet. See code 3692 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_WASHINGTON_SOUTH = 'urn:ogc:def:crs:EPSG::3691';

    /**
     * NAD83(NSRS2007) / Washington South (ftUS)
     * Extent: USA - Washington - counties of Adams; Asotin; Benton; Clark; Columbia; Cowlitz; Franklin; Garfield;
     * Grant south of approximately 47°30'N; Grays Harbor; Kittitas; Klickitat; Lewis; Mason; Pacific; Pierce;
     * Skamania; Thurston; Wahkiakum; Walla Walla; Whitman; Yakima
     * State law defines use of US survey feet. Federal definition is metric - see code 3691. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_WASHINGTON_SOUTH_FTUS = 'urn:ogc:def:crs:EPSG::3692';

    /**
     * NAD83(NSRS2007) / West Virginia North
     * Extent: USA - West Virginia - counties of Barbour; Berkeley; Brooke; Doddridge; Grant; Hampshire; Hancock;
     * Hardy; Harrison; Jefferson; Marion; Marshall; Mineral; Monongalia; Morgan; Ohio; Pleasants; Preston; Ritchie;
     * Taylor; Tucker; Tyler; Wetzel; Wirt; Wood
     * State law defines system in US survey feet. See CRS code 26869 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_WEST_VIRGINIA_NORTH = 'urn:ogc:def:crs:EPSG::3693';

    /**
     * NAD83(NSRS2007) / West Virginia North (ftUS)
     * Extent: USA - West Virginia - counties of Barbour; Berkeley; Brooke; Doddridge; Grant; Hampshire; Hancock;
     * Hardy; Harrison; Jefferson; Marion; Marshall; Mineral; Monongalia; Morgan; Ohio; Pleasants; Preston; Ritchie;
     * Taylor; Tucker; Tyler; Wetzel; Wirt; Wood
     * State law defines use of US survey feet. Federal definition is metric - see code 3693. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_WEST_VIRGINIA_NORTH_FTUS = 'urn:ogc:def:crs:EPSG::26869';

    /**
     * NAD83(NSRS2007) / West Virginia South
     * Extent: USA - West Virginia - counties of Boone; Braxton; Cabell; Calhoun; Clay; Fayette; Gilmer; Greenbrier;
     * Jackson; Kanawha; Lewis; Lincoln; Logan; Mason; McDowell; Mercer; Mingo; Monroe; Nicholas; Pendleton;
     * Pocahontas; Putnam; Raleigh; Randolph; Roane; Summers; Upshur; Wayne; Webster; Wyoming
     * State law defines system in US survey feet. See CRS code 26870 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_WEST_VIRGINIA_SOUTH = 'urn:ogc:def:crs:EPSG::3694';

    /**
     * NAD83(NSRS2007) / West Virginia South (ftUS)
     * Extent: USA - West Virginia - counties of Boone; Braxton; Cabell; Calhoun; Clay; Fayette; Gilmer; Greenbrier;
     * Jackson; Kanawha; Lewis; Lincoln; Logan; Mason; McDowell; Mercer; Mingo; Monroe; Nicholas; Pendleton;
     * Pocahontas; Putnam; Raleigh; Randolph; Roane; Summers; Upshur; Wayne; Webster; Wyoming
     * State law defines use of US survey feet. Federal definition is metric - see code 3694. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_WEST_VIRGINIA_SOUTH_FTUS = 'urn:ogc:def:crs:EPSG::26870';

    /**
     * NAD83(NSRS2007) / Wisconsin Central
     * Extent: USA - Wisconsin - counties of Barron; Brown; Buffalo; Chippewa; Clark; Door; Dunn; Eau Claire; Jackson;
     * Kewaunee; Langlade; Lincoln; Marathon; Marinette; Menominee; Oconto; Outagamie; Pepin; Pierce; Polk; Portage;
     * Rusk; Shawano; St Croix; Taylor; Trempealeau; Waupaca; Wood
     * State law defines use of US survey feet. See code 3696 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_WISCONSIN_CENTRAL = 'urn:ogc:def:crs:EPSG::3695';

    /**
     * NAD83(NSRS2007) / Wisconsin Central (ftUS)
     * Extent: USA - Wisconsin - counties of Barron; Brown; Buffalo; Chippewa; Clark; Door; Dunn; Eau Claire; Jackson;
     * Kewaunee; Langlade; Lincoln; Marathon; Marinette; Menominee; Oconto; Outagamie; Pepin; Pierce; Polk; Portage;
     * Rusk; Shawano; St Croix; Taylor; Trempealeau; Waupaca; Wood
     * State law defines use of US survey feet. Federal definition is metric - see code 3695. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_WISCONSIN_CENTRAL_FTUS = 'urn:ogc:def:crs:EPSG::3696';

    /**
     * NAD83(NSRS2007) / Wisconsin North
     * Extent: USA - Wisconsin - counties of Ashland; Bayfield; Burnett; Douglas; Florence; Forest; Iron; Oneida;
     * Price; Sawyer; Vilas; Washburn
     * State law defines use of US survey feet. See code 3698 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_WISCONSIN_NORTH = 'urn:ogc:def:crs:EPSG::3697';

    /**
     * NAD83(NSRS2007) / Wisconsin North (ftUS)
     * Extent: USA - Wisconsin - counties of Ashland; Bayfield; Burnett; Douglas; Florence; Forest; Iron; Oneida;
     * Price; Sawyer; Vilas; Washburn
     * State law defines use of US survey feet. Federal definition is metric - see code 3607. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_WISCONSIN_NORTH_FTUS = 'urn:ogc:def:crs:EPSG::3698';

    /**
     * NAD83(NSRS2007) / Wisconsin South
     * Extent: USA - Wisconsin - counties of Adams; Calumet; Columbia; Crawford; Dane; Dodge; Fond Du Lac; Grant;
     * Green; Green Lake; Iowa; Jefferson; Juneau; Kenosha; La Crosse; Lafayette; Manitowoc; Marquette; Milwaukee;
     * Monroe; Ozaukee; Racine; Richland; Rock; Sauk; Sheboygan; Vernon; Walworth; Washington; Waukesha; Waushara;
     * Winnebago
     * State law defines use of US survey feet. See code 3700 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_WISCONSIN_SOUTH = 'urn:ogc:def:crs:EPSG::3699';

    /**
     * NAD83(NSRS2007) / Wisconsin South (ftUS)
     * Extent: USA - Wisconsin - counties of Adams; Calumet; Columbia; Crawford; Dane; Dodge; Fond Du Lac; Grant;
     * Green; Green Lake; Iowa; Jefferson; Juneau; Kenosha; La Crosse; Lafayette; Manitowoc; Marquette; Milwaukee;
     * Monroe; Ozaukee; Racine; Richland; Rock; Sauk; Sheboygan; Vernon; Walworth; Washington; Waukesha; Waushara;
     * Winnebago
     * State law defines use of US survey feet. Federal definition is metric - see code 3699. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_WISCONSIN_SOUTH_FTUS = 'urn:ogc:def:crs:EPSG::3700';

    /**
     * NAD83(NSRS2007) / Wisconsin Transverse Mercator
     * Extent: USA - Wisconsin
     * Designed as a single zone for the whole state. Replaces NAD83(HARN) / Wisconsin Transverse Mercator.
     */
    public const EPSG_NAD83_NSRS2007_WISCONSIN_TRANSVERSE_MERCATOR = 'urn:ogc:def:crs:EPSG::3701';

    /**
     * NAD83(NSRS2007) / Wyoming East
     * Extent: USA - Wyoming - counties of Albany; Campbell; Converse; Crook; Goshen; Laramie; Niobrara; Platte; Weston
     * State law defines use of US survey feet. See code 3730 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_WYOMING_EAST = 'urn:ogc:def:crs:EPSG::3702';

    /**
     * NAD83(NSRS2007) / Wyoming East (ftUS)
     * Extent: USA - Wyoming - counties of Albany; Campbell; Converse; Crook; Goshen; Laramie; Niobrara; Platte; Weston
     * State law defines use of US survey feet. Federal definition is metric - see code 3702. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_WYOMING_EAST_FTUS = 'urn:ogc:def:crs:EPSG::3730';

    /**
     * NAD83(NSRS2007) / Wyoming East Central
     * Extent: USA - Wyoming - counties of Big Horn; Carbon; Johnson; Natrona; Sheridan; Washakie
     * State law defines use of US survey feet. See code 3731 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_WYOMING_EAST_CENTRAL = 'urn:ogc:def:crs:EPSG::3703';

    /**
     * NAD83(NSRS2007) / Wyoming East Central (ftUS)
     * Extent: USA - Wyoming - counties of Big Horn; Carbon; Johnson; Natrona; Sheridan; Washakie
     * State law defines use of US survey feet. Federal definition is metric - see code 3703. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_WYOMING_EAST_CENTRAL_FTUS = 'urn:ogc:def:crs:EPSG::3731';

    /**
     * NAD83(NSRS2007) / Wyoming West
     * Extent: USA - Wyoming - counties of Lincoln; Sublette; Teton; Uinta
     * State law defines use of US survey feet. See code 3733 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_WYOMING_WEST = 'urn:ogc:def:crs:EPSG::3705';

    /**
     * NAD83(NSRS2007) / Wyoming West (ftUS)
     * Extent: USA - Wyoming - counties of Lincoln; Sublette; Teton; Uinta
     * State law defines use of US survey feet. Federal definition is metric - see code 3705. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_WYOMING_WEST_FTUS = 'urn:ogc:def:crs:EPSG::3733';

    /**
     * NAD83(NSRS2007) / Wyoming West Central
     * Extent: USA - Wyoming - counties of Fremont; Hot Springs; Park; Sweetwater
     * State law defines use of US survey feet. See code 3732 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_WYOMING_WEST_CENTRAL = 'urn:ogc:def:crs:EPSG::3704';

    /**
     * NAD83(NSRS2007) / Wyoming West Central (ftUS)
     * Extent: USA - Wyoming - counties of Fremont; Hot Springs; Park; Sweetwater
     * State law defines use of US survey feet. Federal definition is metric - see code 3704. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_WYOMING_WEST_CENTRAL_FTUS = 'urn:ogc:def:crs:EPSG::3732';

    /**
     * NAD83(PA11) / Hawaii zone 1
     * Extent: USA - Hawaii - island of Hawaii - onshore
     * Replaces NAD83(HARN) / Hawaii zone 1 (CRS code 2782).
     */
    public const EPSG_NAD83_PA11_HAWAII_ZONE_1 = 'urn:ogc:def:crs:EPSG::6628';

    /**
     * NAD83(PA11) / Hawaii zone 2
     * Extent: USA - Hawaii - Maui; Kahoolawe; Lanai; Molokai - onshore
     * Replaces NAD83(HARN) / Hawaii zone 2 (CRS code 2783).
     */
    public const EPSG_NAD83_PA11_HAWAII_ZONE_2 = 'urn:ogc:def:crs:EPSG::6629';

    /**
     * NAD83(PA11) / Hawaii zone 3
     * Extent: USA - Hawaii - Oahu - onshore
     * Replaces NAD83(HARN) / Hawaii zone 3 (CRS code 2784).
     */
    public const EPSG_NAD83_PA11_HAWAII_ZONE_3 = 'urn:ogc:def:crs:EPSG::6630';

    /**
     * NAD83(PA11) / Hawaii zone 3 (ftUS)
     * Extent: USA - Hawaii - Oahu - onshore
     * State has no law defining grid unit; system therefore not recognised by Federal authorities. Replaces
     * NAD83(HARN) / Hawaii zone 3 (ftUS) (CRS code 3760).
     */
    public const EPSG_NAD83_PA11_HAWAII_ZONE_3_FTUS = 'urn:ogc:def:crs:EPSG::6633';

    /**
     * NAD83(PA11) / Hawaii zone 4
     * Extent: USA - Hawaii - Kauai - onshore
     * Replaces NAD83(HARN) / Hawaii zone 4 (CRS code 2785).
     */
    public const EPSG_NAD83_PA11_HAWAII_ZONE_4 = 'urn:ogc:def:crs:EPSG::6631';

    /**
     * NAD83(PA11) / Hawaii zone 5
     * Extent: USA - Hawaii - Niihau - onshore
     * Replaces NAD83(HARN) / Hawaii zone 5 (CRS code 2786).
     */
    public const EPSG_NAD83_PA11_HAWAII_ZONE_5 = 'urn:ogc:def:crs:EPSG::6632';

    /**
     * NAD83(PA11) / UTM zone 2S
     * Extent: American Samoa - Tutuila, Aunu'u, Ofu, Olesega, Ta'u and Rose islands
     * Replaces NAD83(HARN) / UTM zone 2S (CRS code 2195).
     */
    public const EPSG_NAD83_PA11_UTM_ZONE_2S = 'urn:ogc:def:crs:EPSG::6636';

    /**
     * NAD83(PA11) / UTM zone 4N
     * Extent: USA - between 162°W and 156°W onshore - Hawaii
     * Replaces NAD83(HARN) / UTM zone 4N (CRS code 3750).
     */
    public const EPSG_NAD83_PA11_UTM_ZONE_4N = 'urn:ogc:def:crs:EPSG::6634';

    /**
     * NAD83(PA11) / UTM zone 5N
     * Extent: USA - between 156°W and 150°W onshore - Hawaii
     * Replaces NAD83(HARN) / UTM zone 5N (CRS code 3751).
     */
    public const EPSG_NAD83_PA11_UTM_ZONE_5N = 'urn:ogc:def:crs:EPSG::6635';

    /**
     * NEA74 Noumea / Noumea Lambert
     * Extent: New Caledonia - Grande Terre - Noumea district
     * Replaced by RGNC91-93 / Lambert Caledonie (CRS code 3163). Gives identical conversion results as NEA74 Noumea /
     * Noumea Lambert 2 (CRS code 3166).
     */
    public const EPSG_NEA74_NOUMEA_NOUMEA_LAMBERT = 'urn:ogc:def:crs:EPSG::3165';

    /**
     * NEA74 Noumea / Noumea Lambert 2
     * Extent: New Caledonia - Grande Terre - Noumea district
     * Replaced by RGNC91-93 / Lambert Caledonie (CRS code 3163). Variant of NEA74 Noumea / Noumea Lambert (CRS code
     * 3166) with defining parameters at integer seconds: gives identical conversion results.
     */
    public const EPSG_NEA74_NOUMEA_NOUMEA_LAMBERT_2 = 'urn:ogc:def:crs:EPSG::3166';

    /**
     * NEA74 Noumea / UTM zone 58S
     * Extent: New Caledonia - Grande Terre - Noumea district
     * Replaced by RGNC91-93 / Lambert Caledonie (CRS code 3163).
     */
    public const EPSG_NEA74_NOUMEA_UTM_ZONE_58S = 'urn:ogc:def:crs:EPSG::2998';

    /**
     * NGN / UTM zone 38N
     * Extent: Kuwait - onshore west of 48°E.
     */
    public const EPSG_NGN_UTM_ZONE_38N = 'urn:ogc:def:crs:EPSG::31838';

    /**
     * NGN / UTM zone 39N
     * Extent: Kuwait - onshore east of 48°E.
     */
    public const EPSG_NGN_UTM_ZONE_39N = 'urn:ogc:def:crs:EPSG::31839';

    /**
     * NGO 1948 (Oslo) / NGO zone I
     * Extent: Norway - west of 3°30'W of Oslo (7°13'22.5"E of Greenwich)
     * To be phased out and replaced by ETRF89 / UTM zone 32N.
     */
    public const EPSG_NGO_1948_OSLO_NGO_ZONE_I = 'urn:ogc:def:crs:EPSG::27391';

    /**
     * NGO 1948 (Oslo) / NGO zone II
     * Extent: Norway - between 3°30'W and 1°10' W of Oslo (7°13'22.5"E and 9°33'22.5"E of Greenwich)
     * To be phased out and replaced by ETRF89 / UTM zone 32N.
     */
    public const EPSG_NGO_1948_OSLO_NGO_ZONE_II = 'urn:ogc:def:crs:EPSG::27392';

    /**
     * NGO 1948 (Oslo) / NGO zone III
     * Extent: Norway - between 1°10'W and 1°15'E of Oslo (9°33'22.5"E and 11°58'22.5"E of Greenwich)
     * To be phased out and replaced by ETRF89 / UTM zone 32N.
     */
    public const EPSG_NGO_1948_OSLO_NGO_ZONE_III = 'urn:ogc:def:crs:EPSG::27393';

    /**
     * NGO 1948 (Oslo) / NGO zone IV
     * Extent: Norway - between 1°15'E and 4°20'E of Oslo (11°58'22.5"E and 15°03'22.5"E of Greenwich)
     * To be phased out and replaced by ETRF89 / UTM zone 32N and ETRF89 / UTM zone 33N.
     */
    public const EPSG_NGO_1948_OSLO_NGO_ZONE_IV = 'urn:ogc:def:crs:EPSG::27394';

    /**
     * NGO 1948 (Oslo) / NGO zone V
     * Extent: Norway - between 4°20'E and 8°10'E of Oslo (15°03'22.5"E and 18°53'22.5"E of Greenwich)
     * To be phased out and replaced by ETRF89 / UTM zone 33N and ETRF89 / UTM zone 34N.
     */
    public const EPSG_NGO_1948_OSLO_NGO_ZONE_V = 'urn:ogc:def:crs:EPSG::27395';

    /**
     * NGO 1948 (Oslo) / NGO zone VI
     * Extent: Norway - between 8°10'E and 12°10'E of Oslo (18°53'22.5"E and 22°53'22.5"E of Greenwich)
     * To be phased out and replaced by ETRF89 / UTM zone 34N.
     */
    public const EPSG_NGO_1948_OSLO_NGO_ZONE_VI = 'urn:ogc:def:crs:EPSG::27396';

    /**
     * NGO 1948 (Oslo) / NGO zone VII
     * Extent: Norway - between 12°10'E and 16°15'E of Oslo (22°53'22.5"E and 26°58'22.5"E of Greenwich)
     * To be phased out and replaced by ETRF89 / UTM zone 34N and ETRF89 / UTM zone 35N.
     */
    public const EPSG_NGO_1948_OSLO_NGO_ZONE_VII = 'urn:ogc:def:crs:EPSG::27397';

    /**
     * NGO 1948 (Oslo) / NGO zone VIII
     * Extent: Norway - east of 16°15'E of Oslo (26°58'22.5"E of Greenwich)
     * To be phased out and replaced by ETRF89 / UTM zone 35N.
     */
    public const EPSG_NGO_1948_OSLO_NGO_ZONE_VIII = 'urn:ogc:def:crs:EPSG::27398';

    /**
     * NSIDC EASE-Grid Global
     * Extent: World between 86°S and 86°N
     * Used as basis for Equal-Area Scalable Earth Grid (EASE-Grid). See information source for equations to define
     * EASE-Grid overlay. Superseded by WGS 84 / NSIDC EASE-Grid 2.0 Global (CRS code 6933), which should be preferred
     * for new data.
     */
    public const EPSG_NSIDC_EASE_GRID_GLOBAL = 'urn:ogc:def:crs:EPSG::3410';

    /**
     * NSIDC EASE-Grid North
     * Extent: Northern hemisphere
     * Used as basis for Equal-Area Scalable Earth Grid (EASE-Grid). See information source for equations to define
     * EASE-Grid overlay. Superseded by WGS 84 / NSIDC EASE-Grid 2.0 North (CRS code 6931), which should be preferred
     * for new data.
     */
    public const EPSG_NSIDC_EASE_GRID_NORTH = 'urn:ogc:def:crs:EPSG::3408';

    /**
     * NSIDC EASE-Grid South
     * Extent: Southern hemisphere
     * Used as basis for Equal-Area Scalable Earth Grid (EASE-Grid). See information source for equations to define
     * EASE-Grid overlay. Superseded by WGS 84 / NSIDC EASE-Grid 2.0 South (CRS code 6932), which should be preferred
     * for new data.
     */
    public const EPSG_NSIDC_EASE_GRID_SOUTH = 'urn:ogc:def:crs:EPSG::3409';

    /**
     * NSIDC Sea Ice Polar Stereographic North
     * Extent: Northern hemisphere - north of 60°N, including Arctic
     * The datum is unspecified. Uncertainty in location of over 1 km may result; at the coarse resolution and very
     * small scales for which this system should be used this uncertainty may be insignificant. See CRS 3413 for
     * geodetically preferred alternative.
     */
    public const EPSG_NSIDC_SEA_ICE_POLAR_STEREOGRAPHIC_NORTH = 'urn:ogc:def:crs:EPSG::3411';

    /**
     * NSIDC Sea Ice Polar Stereographic South
     * Extent: Southern hemisphere - south of 60°S - Antarctica
     * The datum is unspecified. Uncertainty in location of over 1 km may result; at the coarse resolution and very
     * small scales for which this system should be used this uncertainty may be insignificant. See CRS 3976 for
     * geodetically preferred alternative.
     */
    public const EPSG_NSIDC_SEA_ICE_POLAR_STEREOGRAPHIC_SOUTH = 'urn:ogc:def:crs:EPSG::3412';

    /**
     * NTF (Paris) / Lambert Centre France
     * Extent: France mainland onshore between 50.5 grads and 53.5 grads North (45°27'N to 48°09'N)
     * Replaced by NTF (Paris) / France zone II (code 27572) from 1972.
     */
    public const EPSG_NTF_PARIS_LAMBERT_CENTRE_FRANCE = 'urn:ogc:def:crs:EPSG::27562';

    /**
     * NTF (Paris) / Lambert Corse
     * Extent: France - Corsica onshore
     * Replaced by NTF (Paris) / France zone IV (code 27574) from 1972.
     */
    public const EPSG_NTF_PARIS_LAMBERT_CORSE = 'urn:ogc:def:crs:EPSG::27564';

    /**
     * NTF (Paris) / Lambert Nord France
     * Extent: France mainland onshore north of 53.5 grads North (48°09'N)
     * Replaced by NTF (Paris) / France zone I (code 27571) from 1972.
     */
    public const EPSG_NTF_PARIS_LAMBERT_NORD_FRANCE = 'urn:ogc:def:crs:EPSG::27561';

    /**
     * NTF (Paris) / Lambert Sud France
     * Extent: France - mainland onshore south of 50.5 grads North (45°27'N)
     * Replaced by NTF (Paris) / France zone III (code 27573) from 1972.
     */
    public const EPSG_NTF_PARIS_LAMBERT_SUD_FRANCE = 'urn:ogc:def:crs:EPSG::27563';

    /**
     * NTF (Paris) / Lambert zone I
     * Extent: France mainland onshore north of 53.5 grads North (48°09'N)
     * Introduced 1972. Replaces NTF (Paris) / Lambert Nord France (code 27561).
     */
    public const EPSG_NTF_PARIS_LAMBERT_ZONE_I = 'urn:ogc:def:crs:EPSG::27571';

    /**
     * NTF (Paris) / Lambert zone II
     * Extent: France mainland onshore between 50.5 grads and 53.5 grads North (45°27'N to 48°09'N). Also used over
     * all onshore mainland France
     * Introduced 1972. Replaces NTF (Paris) / Lambert Centre France (code 27562).
     */
    public const EPSG_NTF_PARIS_LAMBERT_ZONE_II = 'urn:ogc:def:crs:EPSG::27572';

    /**
     * NTF (Paris) / Lambert zone III
     * Extent: France - mainland onshore south of 50.5 grads North (45°27'N)
     * Introduced 1972. Replaces NTF (Paris) / Lambert Sud France (code 27563).
     */
    public const EPSG_NTF_PARIS_LAMBERT_ZONE_III = 'urn:ogc:def:crs:EPSG::27573';

    /**
     * NTF (Paris) / Lambert zone IV
     * Extent: France - Corsica onshore
     * Introduced 1972. Replaces NTF (Paris) / Lambert Corse (code 27564).
     */
    public const EPSG_NTF_PARIS_LAMBERT_ZONE_IV = 'urn:ogc:def:crs:EPSG::27574';

    /**
     * NZGD2000 / Amuri 2000
     * Extent: New Zealand - South Island - Amuri meridional circuit area
     * Replaced NZGD49 / Amuri Circuit (code 27219) from March 2000.
     */
    public const EPSG_NZGD2000_AMURI_2000 = 'urn:ogc:def:crs:EPSG::2119';

    /**
     * NZGD2000 / Antipodes Islands TM 2000
     * Extent: New Zealand - Antipodes Island, Bounty Islands.
     */
    public const EPSG_NZGD2000_ANTIPODES_ISLANDS_TM_2000 = 'urn:ogc:def:crs:EPSG::3790';

    /**
     * NZGD2000 / Auckland Islands TM 2000
     * Extent: New Zealand - Snares Island, Auckland Island - onshore.
     */
    public const EPSG_NZGD2000_AUCKLAND_ISLANDS_TM_2000 = 'urn:ogc:def:crs:EPSG::3788';

    /**
     * NZGD2000 / Bay of Plenty 2000
     * Extent: New Zealand - North Island - Bay of Plenty meridional circuit area
     * Replaced NZGD49 / Bay of Plenty Circuit (code 27206) from March 2000.
     */
    public const EPSG_NZGD2000_BAY_OF_PLENTY_2000 = 'urn:ogc:def:crs:EPSG::2106';

    /**
     * NZGD2000 / Bluff 2000
     * Extent: New Zealand - Stewart Island; South Island - Bluff meridional circuit area
     * Replaced NZGD49 / Bluff Circuit (code 27232) from March 2000.
     */
    public const EPSG_NZGD2000_BLUFF_2000 = 'urn:ogc:def:crs:EPSG::2132';

    /**
     * NZGD2000 / Buller 2000
     * Extent: New Zealand - South Island - Buller meridional circuit area
     * Replaced NZGD49 / Buller Circuit (code 27217) from March 2000.
     */
    public const EPSG_NZGD2000_BULLER_2000 = 'urn:ogc:def:crs:EPSG::2117';

    /**
     * NZGD2000 / Campbell Island TM 2000
     * Extent: New Zealand - Campbell Island.
     */
    public const EPSG_NZGD2000_CAMPBELL_ISLAND_TM_2000 = 'urn:ogc:def:crs:EPSG::3789';

    /**
     * NZGD2000 / Chatham Island Circuit 2000
     * Extent: New Zealand - Chatham Islands group - onshore
     * Officially withdrawn on 6 June 2006. Should not be used for new datasets. Replaced by NZGD2000 / Chatham Island
     * TM 2000 (CRS code 3793).
     */
    public const EPSG_NZGD2000_CHATHAM_ISLAND_CIRCUIT_2000 = 'urn:ogc:def:crs:EPSG::3764';

    /**
     * NZGD2000 / Chatham Islands TM 2000
     * Extent: New Zealand - Chatham Islands group - onshore
     * Replaces CI1979 / Chatham Islands Map Grid (CRS code 5519) and NZGD2000 / Chatham Islands Circuit 2000 (CRS code
     * 3764).
     */
    public const EPSG_NZGD2000_CHATHAM_ISLANDS_TM_2000 = 'urn:ogc:def:crs:EPSG::3793';

    /**
     * NZGD2000 / Collingwood 2000
     * Extent: New Zealand - South Island - Collingwood meridional circuit area
     * Replaced NZGD49 / Collingwood Circuit (code 27214) from March 2000.
     */
    public const EPSG_NZGD2000_COLLINGWOOD_2000 = 'urn:ogc:def:crs:EPSG::2114';

    /**
     * NZGD2000 / Gawler 2000
     * Extent: New Zealand - South Island - Gawler meridional circuit area
     * Replaced NZGD49 / Gawler Circuit (code 27225) from March 2000.
     */
    public const EPSG_NZGD2000_GAWLER_2000 = 'urn:ogc:def:crs:EPSG::2125';

    /**
     * NZGD2000 / Grey 2000
     * Extent: New Zealand - South Island - Grey meridional circuit area
     * Replaced NZGD49 / Grey Circuit (code 27218) from March 2000.
     */
    public const EPSG_NZGD2000_GREY_2000 = 'urn:ogc:def:crs:EPSG::2118';

    /**
     * NZGD2000 / Hawkes Bay 2000
     * Extent: New Zealand - North Island - Hawkes Bay meridional circuit and Napier vertical crs area
     * Replaced NZGD49 / Hawkes Bay Circuit (code 27208) from March 2000.
     */
    public const EPSG_NZGD2000_HAWKES_BAY_2000 = 'urn:ogc:def:crs:EPSG::2108';

    /**
     * NZGD2000 / Hokitika 2000
     * Extent: New Zealand - South Island - Hokitika meridional circuit area
     * Replaced NZGD49 / Hokitika Circuit (code 27221) from March 2000.
     */
    public const EPSG_NZGD2000_HOKITIKA_2000 = 'urn:ogc:def:crs:EPSG::2121';

    /**
     * NZGD2000 / Jacksons Bay 2000
     * Extent: New Zealand - South Island - Jacksons Bay meridional circuit area
     * Replaced NZGD49 / Jacksons Bay Circuit (code 27223) from March 2000.
     */
    public const EPSG_NZGD2000_JACKSONS_BAY_2000 = 'urn:ogc:def:crs:EPSG::2123';

    /**
     * NZGD2000 / Karamea 2000
     * Extent: New Zealand - South Island - Karamea meridional circuit area
     * Replaced NZGD49 / Karamea Circuit (code 27216) from March 2000.
     */
    public const EPSG_NZGD2000_KARAMEA_2000 = 'urn:ogc:def:crs:EPSG::2116';

    /**
     * NZGD2000 / Lindis Peak 2000
     * Extent: New Zealand - South Island - Lindis Peak meridional circuit area
     * Replaced NZGD49 / Lindis Peak Circuit (code 27227) from March 2000.
     */
    public const EPSG_NZGD2000_LINDIS_PEAK_2000 = 'urn:ogc:def:crs:EPSG::2127';

    /**
     * NZGD2000 / Marlborough 2000
     * Extent: New Zealand - South Island - Marlborough meridional circuit area
     * Replaced NZGD49 / Marlborough Circuit (code 27220) from March 2000.
     */
    public const EPSG_NZGD2000_MARLBOROUGH_2000 = 'urn:ogc:def:crs:EPSG::2120';

    /**
     * NZGD2000 / Mount Eden 2000
     * Extent: New Zealand - North Island - Mount Eden meridional circuit area
     * Replaced NZGD49 / Mount Eden Circuit (code 27205) from March 2000.
     */
    public const EPSG_NZGD2000_MOUNT_EDEN_2000 = 'urn:ogc:def:crs:EPSG::2105';

    /**
     * NZGD2000 / Mount Nicholas 2000
     * Extent: New Zealand - South Island - Mount Nicholas meridional circuit area
     * Replaced NZGD49 / Mount Nicholas Circuit (code 27228) from March 2000.
     */
    public const EPSG_NZGD2000_MOUNT_NICHOLAS_2000 = 'urn:ogc:def:crs:EPSG::2128';

    /**
     * NZGD2000 / Mount Pleasant 2000
     * Extent: New Zealand - South Island - Mount Pleasant meridional circuit area
     * Replaced NZGD49 / Mount Pleasant Circuit (code 27224) from March 2000.
     */
    public const EPSG_NZGD2000_MOUNT_PLEASANT_2000 = 'urn:ogc:def:crs:EPSG::2124';

    /**
     * NZGD2000 / Mount York 2000
     * Extent: New Zealand - South Island - Mount York meridional circuit area
     * Replaced NZGD49 / Mount York Circuit (code 27229) from March 2000.
     */
    public const EPSG_NZGD2000_MOUNT_YORK_2000 = 'urn:ogc:def:crs:EPSG::2129';

    /**
     * NZGD2000 / NZCS2000
     * Extent: New Zealand - offshore
     * See WGS 84 / NIWA Albers (CRS code 9191) for oceanic data statistical analysis.
     */
    public const EPSG_NZGD2000_NZCS2000 = 'urn:ogc:def:crs:EPSG::3851';

    /**
     * NZGD2000 / Nelson 2000
     * Extent: New Zealand - South Island - Nelson meridional circuit area
     * Replaced NZGD49 / Nelson Circuit (code 27215) from March 2000.
     */
    public const EPSG_NZGD2000_NELSON_2000 = 'urn:ogc:def:crs:EPSG::2115';

    /**
     * NZGD2000 / New Zealand Transverse Mercator 2000
     * Extent: New Zealand - North Island, South Island, Stewart Island - onshore
     * Replaces NZGD49 / New Zealand Map Grid (code 27200) from July 2001.
     */
    public const EPSG_NZGD2000_NEW_ZEALAND_TRANSVERSE_MERCATOR_2000 = 'urn:ogc:def:crs:EPSG::2193';

    /**
     * NZGD2000 / North Taieri 2000
     * Extent: New Zealand - South Island - North Taieri meridional circuit area
     * Replaced NZGD49 / North Taieri Circuit (code 27231) from March 2000.
     */
    public const EPSG_NZGD2000_NORTH_TAIERI_2000 = 'urn:ogc:def:crs:EPSG::2131';

    /**
     * NZGD2000 / Observation Point 2000
     * Extent: New Zealand - South Island - Observation Point meridional circuit area
     * Replaced NZGD49 / Observation Point Circuit (code 27230) from March 2000.
     */
    public const EPSG_NZGD2000_OBSERVATION_POINT_2000 = 'urn:ogc:def:crs:EPSG::2130';

    /**
     * NZGD2000 / Okarito 2000
     * Extent: New Zealand - South Island - Okarito meridional circuit area
     * Replaced NZGD49 / Okarito Circuit (code 27222) from March 2000.
     */
    public const EPSG_NZGD2000_OKARITO_2000 = 'urn:ogc:def:crs:EPSG::2122';

    /**
     * NZGD2000 / Poverty Bay 2000
     * Extent: New Zealand - North Island - Poverty Bay meridional circuit area
     * Replaced NZGD49 / Poverty Bay Circuit (code 27207) from March 2000.
     */
    public const EPSG_NZGD2000_POVERTY_BAY_2000 = 'urn:ogc:def:crs:EPSG::2107';

    /**
     * NZGD2000 / Raoul Island TM 2000
     * Extent: New Zealand - Raoul Island, Kermadec Islands.
     */
    public const EPSG_NZGD2000_RAOUL_ISLAND_TM_2000 = 'urn:ogc:def:crs:EPSG::3791';

    /**
     * NZGD2000 / Taranaki 2000
     * Extent: New Zealand - North Island - Taranaki meridional circuit area
     * Replaced NZGD49 / Taranaki Circuit (code 27209) from March 2000.
     */
    public const EPSG_NZGD2000_TARANAKI_2000 = 'urn:ogc:def:crs:EPSG::2109';

    /**
     * NZGD2000 / Timaru 2000
     * Extent: New Zealand - South Island - Timaru meridional circuit area
     * Replaced NZGD49 / Timaru Circuit (code 27226) from March 2000.
     */
    public const EPSG_NZGD2000_TIMARU_2000 = 'urn:ogc:def:crs:EPSG::2126';

    /**
     * NZGD2000 / Tuhirangi 2000
     * Extent: New Zealand - North Island - Tuhirangi meridional circuit area
     * Replaced NZGD49 / Tuhirangi Circuit (code 27210) from March 2000.
     */
    public const EPSG_NZGD2000_TUHIRANGI_2000 = 'urn:ogc:def:crs:EPSG::2110';

    /**
     * NZGD2000 / UTM zone 1S
     * Extent: New Zealand - offshore between 180°W and 174°W.
     */
    public const EPSG_NZGD2000_UTM_ZONE_1S = 'urn:ogc:def:crs:EPSG::5700';

    /**
     * NZGD2000 / UTM zone 58S
     * Extent: New Zealand - offshore between 162°E and 168°E
     * Replaces NZGD49 / UTM zone 58S (code 27258) from March 2000.
     */
    public const EPSG_NZGD2000_UTM_ZONE_58S = 'urn:ogc:def:crs:EPSG::2133';

    /**
     * NZGD2000 / UTM zone 59S
     * Extent: New Zealand - offshore between 168°E and 174°E
     * Replaces NZGD49 / UTM zone 59S (code 27259) from March 2000.
     */
    public const EPSG_NZGD2000_UTM_ZONE_59S = 'urn:ogc:def:crs:EPSG::2134';

    /**
     * NZGD2000 / UTM zone 60S
     * Extent: New Zealand - offshore between 174°E and 180°E
     * Replaces NZGD49 / UTM zone 60S (code 27260) from March 2000.
     */
    public const EPSG_NZGD2000_UTM_ZONE_60S = 'urn:ogc:def:crs:EPSG::2135';

    /**
     * NZGD2000 / Wairarapa 2000
     * Extent: New Zealand - North Island - Wairarapa meridional circuit area
     * Replaced NZGD49 / Wairarapa Circuit (code 27212) from March 2000.
     */
    public const EPSG_NZGD2000_WAIRARAPA_2000 = 'urn:ogc:def:crs:EPSG::2112';

    /**
     * NZGD2000 / Wanganui 2000
     * Extent: New Zealand - North Island - Wanganui meridional circuit area
     * Replaced NZGD49 / Wanganui Circuit (code 27211) from March 2000.
     */
    public const EPSG_NZGD2000_WANGANUI_2000 = 'urn:ogc:def:crs:EPSG::2111';

    /**
     * NZGD2000 / Wellington 2000
     * Extent: New Zealand - North Island - Wellington meridional circuit area
     * Replaced NZGD49 / Wellington Circuit (code 27213) from March 2000.
     */
    public const EPSG_NZGD2000_WELLINGTON_2000 = 'urn:ogc:def:crs:EPSG::2113';

    /**
     * NZGD49 / Amuri Circuit
     * Extent: New Zealand - South Island - Amuri meridional circuit area
     * Replaced Imperial measure version in 1972. Replaced by NZGD2000 / Amuri 2000 (code 2119) from March 2000.
     */
    public const EPSG_NZGD49_AMURI_CIRCUIT = 'urn:ogc:def:crs:EPSG::27219';

    /**
     * NZGD49 / Bay of Plenty Circuit
     * Extent: New Zealand - North Island - Bay of Plenty meridional circuit area
     * Replaced Imperial measure version in 1972. Replaced by NZGD2000 / Bay of Plenty 2000 (code 2106) from March
     * 2000.
     */
    public const EPSG_NZGD49_BAY_OF_PLENTY_CIRCUIT = 'urn:ogc:def:crs:EPSG::27206';

    /**
     * NZGD49 / Bluff Circuit
     * Extent: New Zealand - Stewart Island; South Island - Bluff meridional circuit area
     * Replaced Imperial measure version in 1972. Replaced by NZGD2000 / Bluff 2000 (code 2132) from March 2000.
     */
    public const EPSG_NZGD49_BLUFF_CIRCUIT = 'urn:ogc:def:crs:EPSG::27232';

    /**
     * NZGD49 / Buller Circuit
     * Extent: New Zealand - South Island - Buller meridional circuit area
     * Replaced Imperial measure version in 1972. Replaced by NZGD2000 / Buller 2000 (code 2117) from March 2000.
     */
    public const EPSG_NZGD49_BULLER_CIRCUIT = 'urn:ogc:def:crs:EPSG::27217';

    /**
     * NZGD49 / Collingwood Circuit
     * Extent: New Zealand - South Island - Collingwood meridional circuit area
     * Replaced Imperial measure version in 1972. Replaced by NZGD2000 / Collingwood 2000 (code 2114) from March 2000.
     */
    public const EPSG_NZGD49_COLLINGWOOD_CIRCUIT = 'urn:ogc:def:crs:EPSG::27214';

    /**
     * NZGD49 / Gawler Circuit
     * Extent: New Zealand - South Island - Gawler meridional circuit area
     * Replaced Imperial measure version in 1972. Replaced by NZGD2000 / Gawler 2000 (code 2125) from March 2000.
     */
    public const EPSG_NZGD49_GAWLER_CIRCUIT = 'urn:ogc:def:crs:EPSG::27225';

    /**
     * NZGD49 / Grey Circuit
     * Extent: New Zealand - South Island - Grey meridional circuit area
     * Replaced Imperial measure version in 1972. Replaced by NZGD2000 / Grey 2000 (code 2118) from March 2000.
     */
    public const EPSG_NZGD49_GREY_CIRCUIT = 'urn:ogc:def:crs:EPSG::27218';

    /**
     * NZGD49 / Hawkes Bay Circuit
     * Extent: New Zealand - North Island - Hawkes Bay meridional circuit and Napier vertical crs area
     * Replaced Hawkes Bay 1931 datum with Imperial measure version of projection in 1972. Replaced by NZGD2000 /
     * Hawkes Bay 2000 (code 2108) from March 2000.
     */
    public const EPSG_NZGD49_HAWKES_BAY_CIRCUIT = 'urn:ogc:def:crs:EPSG::27208';

    /**
     * NZGD49 / Hokitika Circuit
     * Extent: New Zealand - South Island - Hokitika meridional circuit area
     * Replaced Imperial measure version in 1972. Replaced by NZGD2000 / Hokitika 2000 (code 2121) from March 2000.
     */
    public const EPSG_NZGD49_HOKITIKA_CIRCUIT = 'urn:ogc:def:crs:EPSG::27221';

    /**
     * NZGD49 / Jacksons Bay Circuit
     * Extent: New Zealand - South Island - Jacksons Bay meridional circuit area
     * Replaced Imperial measure version in 1972. Replaced by NZGD2000 / Jacksons Bay 2000 (code 2123) from March 2000.
     */
    public const EPSG_NZGD49_JACKSONS_BAY_CIRCUIT = 'urn:ogc:def:crs:EPSG::27223';

    /**
     * NZGD49 / Karamea Circuit
     * Extent: New Zealand - South Island - Karamea meridional circuit area
     * Replaced Imperial measure version in 1972. Replaced by NZGD2000 / Karamea 2000 (code 2116) from March 2000.
     */
    public const EPSG_NZGD49_KARAMEA_CIRCUIT = 'urn:ogc:def:crs:EPSG::27216';

    /**
     * NZGD49 / Lindis Peak Circuit
     * Extent: New Zealand - South Island - Lindis Peak meridional circuit area
     * Replaced Imperial measure version in 1972. Replaced by NZGD2000 / Lindis Peak 2000 (code 2127) from March 2000.
     */
    public const EPSG_NZGD49_LINDIS_PEAK_CIRCUIT = 'urn:ogc:def:crs:EPSG::27227';

    /**
     * NZGD49 / Marlborough Circuit
     * Extent: New Zealand - South Island - Marlborough meridional circuit area
     * Replaced Imperial measure version in 1972. Replaced by NZGD2000 / Marlborough 2000 (code 2120) from March 2000.
     */
    public const EPSG_NZGD49_MARLBOROUGH_CIRCUIT = 'urn:ogc:def:crs:EPSG::27220';

    /**
     * NZGD49 / Mount Eden Circuit
     * Extent: New Zealand - North Island - Mount Eden meridional circuit area
     * Replaced Imperial measure version in 1972. Replaced by NZGD2000 / Mount Eden 2000 (code 2105) from March 2000.
     */
    public const EPSG_NZGD49_MOUNT_EDEN_CIRCUIT = 'urn:ogc:def:crs:EPSG::27205';

    /**
     * NZGD49 / Mount Nicholas Circuit
     * Extent: New Zealand - South Island - Mount Nicholas meridional circuit area
     * Replaced Imperial measure version in 1972. Replaced by NZGD2000 / Mount Nicholas 2000 (code 2128) from March
     * 2000.
     */
    public const EPSG_NZGD49_MOUNT_NICHOLAS_CIRCUIT = 'urn:ogc:def:crs:EPSG::27228';

    /**
     * NZGD49 / Mount Pleasant Circuit
     * Extent: New Zealand - South Island - Mount Pleasant meridional circuit area
     * Replaced Imperial measure version in 1972. Replaced by NZGD2000 / Mount Pleasant 2000 (code 2124) from March
     * 2000.
     */
    public const EPSG_NZGD49_MOUNT_PLEASANT_CIRCUIT = 'urn:ogc:def:crs:EPSG::27224';

    /**
     * NZGD49 / Mount York Circuit
     * Extent: New Zealand - South Island - Mount York meridional circuit area
     * Replaced Imperial measure version in 1972. Replaced by NZGD2000 / Mount York 2000 (code 2129) from March 2000.
     */
    public const EPSG_NZGD49_MOUNT_YORK_CIRCUIT = 'urn:ogc:def:crs:EPSG::27229';

    /**
     * NZGD49 / Nelson Circuit
     * Extent: New Zealand - South Island - Nelson meridional circuit area
     * Replaced Imperial measure version in 1972. Replaced by NZGD2000 / Nelson 2000 (code 2115) from March 2000.
     */
    public const EPSG_NZGD49_NELSON_CIRCUIT = 'urn:ogc:def:crs:EPSG::27215';

    /**
     * NZGD49 / New Zealand Map Grid
     * Extent: New Zealand - North Island, South Island, Stewart Island - onshore
     * Replaces 27291 (NZGD49 / North Island Grid) and 27292 (NZGD49 / South Island Grid) from 1972. Replaced by
     * NZGD2000 / New Zealand Transverse Mercator 2000 from July 2001.
     */
    public const EPSG_NZGD49_NEW_ZEALAND_MAP_GRID = 'urn:ogc:def:crs:EPSG::27200';

    /**
     * NZGD49 / North Island Grid
     * Extent: New Zealand - North Island
     * Sears 1922 British foot-metre conversion factor applied to ellipsoid. Replaced by 27200 (GD49 / New Zealand Map
     * Grid) in 1972.
     */
    public const EPSG_NZGD49_NORTH_ISLAND_GRID = 'urn:ogc:def:crs:EPSG::27291';

    /**
     * NZGD49 / North Taieri Circuit
     * Extent: New Zealand - South Island - North Taieri meridional circuit area
     * Replaced Imperial measure version in 1972. Replaced by NZGD2000 / North Taieri 2000 (code 2131) from March 2000.
     */
    public const EPSG_NZGD49_NORTH_TAIERI_CIRCUIT = 'urn:ogc:def:crs:EPSG::27231';

    /**
     * NZGD49 / Observation Point Circuit
     * Extent: New Zealand - South Island - Observation Point meridional circuit area
     * Replaced Imperial measure version in 1972. Replaced by NZGD2000 / Observation Point 2000 (code 2130) from March
     * 2000.
     */
    public const EPSG_NZGD49_OBSERVATION_POINT_CIRCUIT = 'urn:ogc:def:crs:EPSG::27230';

    /**
     * NZGD49 / Okarito Circuit
     * Extent: New Zealand - South Island - Okarito meridional circuit area
     * Replaced Imperial measure version in 1972. Replaced by NZGD2000 / Okarito 2000 (code 2122) from March 2000.
     */
    public const EPSG_NZGD49_OKARITO_CIRCUIT = 'urn:ogc:def:crs:EPSG::27222';

    /**
     * NZGD49 / Poverty Bay Circuit
     * Extent: New Zealand - North Island - Poverty Bay meridional circuit area
     * Replaced Imperial measure version in 1972. Replaced by NZGD2000 / Poverty Bay 2000 (code 2107) from March 2000.
     */
    public const EPSG_NZGD49_POVERTY_BAY_CIRCUIT = 'urn:ogc:def:crs:EPSG::27207';

    /**
     * NZGD49 / South Island Grid
     * Extent: New Zealand - South Island, Stewart Island
     * Sears 1922 British foot-metre conversion factor applied to ellipsoid. Replaced by 27200 (GD49 / New Zealand Map
     * Grid) in 1972.
     */
    public const EPSG_NZGD49_SOUTH_ISLAND_GRID = 'urn:ogc:def:crs:EPSG::27292';

    /**
     * NZGD49 / Taranaki Circuit
     * Extent: New Zealand - North Island - Taranaki meridional circuit area
     * Replaced Imperial measure version in 1972. Replaced by NZGD2000 / Taranaki 2000 (code 2109) from March 2000.
     */
    public const EPSG_NZGD49_TARANAKI_CIRCUIT = 'urn:ogc:def:crs:EPSG::27209';

    /**
     * NZGD49 / Timaru Circuit
     * Extent: New Zealand - South Island - Timaru meridional circuit area
     * Replaced Imperial measure version in 1972. Replaced by NZGD2000 / Timaru 2000 (code 2126) from March 2000.
     */
    public const EPSG_NZGD49_TIMARU_CIRCUIT = 'urn:ogc:def:crs:EPSG::27226';

    /**
     * NZGD49 / Tuhirangi Circuit
     * Extent: New Zealand - North Island - Tuhirangi meridional circuit area
     * Replaced Imperial measure version in 1972. Replaced by NZGD2000 / Tuhirangi 2000 (code 2110) from March 2000.
     */
    public const EPSG_NZGD49_TUHIRANGI_CIRCUIT = 'urn:ogc:def:crs:EPSG::27210';

    /**
     * NZGD49 / UTM zone 58S
     * Extent: New Zealand - nearshore west of 168°E
     * Replaced by NZGD2000 / UTM zone 58S (code 2133) from March 2000.
     */
    public const EPSG_NZGD49_UTM_ZONE_58S = 'urn:ogc:def:crs:EPSG::27258';

    /**
     * NZGD49 / UTM zone 59S
     * Extent: New Zealand - nearshore between 168°E and 174°E
     * Replaced by NZGD2000 / UTM zone 59S (code 2134) from March 2000.
     */
    public const EPSG_NZGD49_UTM_ZONE_59S = 'urn:ogc:def:crs:EPSG::27259';

    /**
     * NZGD49 / UTM zone 60S
     * Extent: New Zealand - nearshore east of 174°E
     * Replaced by NZGD2000 / UTM zone 60S (code 2135) from March 2000.
     */
    public const EPSG_NZGD49_UTM_ZONE_60S = 'urn:ogc:def:crs:EPSG::27260';

    /**
     * NZGD49 / Wairarapa Circuit
     * Extent: New Zealand - North Island - Wairarapa meridional circuit area
     * Replaced Imperial measure version in 1972. Replaced by NZGD2000 / Wairarapa 2000 (code 2112) from March 2000.
     */
    public const EPSG_NZGD49_WAIRARAPA_CIRCUIT = 'urn:ogc:def:crs:EPSG::27212';

    /**
     * NZGD49 / Wanganui Circuit
     * Extent: New Zealand - North Island - Wanganui meridional circuit area
     * Replaced Imperial measure version in 1972. Replaced by NZGD2000 / Wanganui 2000 (code 2111) from March 2000.
     */
    public const EPSG_NZGD49_WANGANUI_CIRCUIT = 'urn:ogc:def:crs:EPSG::27211';

    /**
     * NZGD49 / Wellington Circuit
     * Extent: New Zealand - North Island - Wellington meridional circuit area
     * Replaced Imperial measure version in 1972. Replaced by NZGD2000 / Wellington 2000 (code 2113) from March 2000.
     */
    public const EPSG_NZGD49_WELLINGTON_CIRCUIT = 'urn:ogc:def:crs:EPSG::27213';

    /**
     * Nahrwan 1934 / Iraq zone
     * Extent: Iraq - onshore; Iran - onshore northern Gulf coast and west bordering southeast Iraq
     * In Iran, replaced by FD58 / Iraq zone (CRS code 3200). In Iraq, replaced by Karbala 1979 / UTM (CRS codes
     * 3391-93).
     */
    public const EPSG_NAHRWAN_1934_IRAQ_ZONE = 'urn:ogc:def:crs:EPSG::3394';

    /**
     * Nahrwan 1934 / UTM zone 37N
     * Extent: Iraq - west of 42°E
     * Replaced by Karbala 1979 (Polservice) / UTM zone 37N (projCRS code 3391).
     */
    public const EPSG_NAHRWAN_1934_UTM_ZONE_37N = 'urn:ogc:def:crs:EPSG::7005';

    /**
     * Nahrwan 1934 / UTM zone 38N
     * Extent: Iraq - between 42°E and 48°E
     * Replaced by Karbala 1979 (Polservice) / UTM zone 38N (projCRS code 3392).
     */
    public const EPSG_NAHRWAN_1934_UTM_ZONE_38N = 'urn:ogc:def:crs:EPSG::7006';

    /**
     * Nahrwan 1934 / UTM zone 39N
     * Extent: Iraq - east of 48°E
     * Replaced by Karbala 1979 (Polservice) / UTM zone 39N (projCRS code 3393).
     */
    public const EPSG_NAHRWAN_1934_UTM_ZONE_39N = 'urn:ogc:def:crs:EPSG::7007';

    /**
     * Nahrwan 1967 / UTM zone 39N
     * Extent: Qatar - offshore. UAE - Abu Dhabi west of 54°E.
     */
    public const EPSG_NAHRWAN_1967_UTM_ZONE_39N = 'urn:ogc:def:crs:EPSG::27039';

    /**
     * Nahrwan 1967 / UTM zone 40N
     * Extent: UAE east of 54°E - Abu Dhabi; Dubai; Sharjah; Ajman; Fujairah; Ras Al Kaimah; Umm Al Qaiwain.
     */
    public const EPSG_NAHRWAN_1967_UTM_ZONE_40N = 'urn:ogc:def:crs:EPSG::27040';

    /**
     * Nakhl-e Ghanem / UTM zone 39N
     * Extent: Iran - Kangan district.
     */
    public const EPSG_NAKHL_E_GHANEM_UTM_ZONE_39N = 'urn:ogc:def:crs:EPSG::3307';

    /**
     * Naparima 1955 / UTM zone 20N
     * Extent: Trinidad and Tobago - Trinidad - onshore.
     */
    public const EPSG_NAPARIMA_1955_UTM_ZONE_20N = 'urn:ogc:def:crs:EPSG::2067';

    /**
     * Naparima 1972 / UTM zone 20N
     * Extent: Trinidad and Tobago - Tobago - onshore.
     */
    public const EPSG_NAPARIMA_1972_UTM_ZONE_20N = 'urn:ogc:def:crs:EPSG::27120';

    /**
     * New Beijing / 3-degree Gauss-Kruger CM 102E
     * Extent: China - between 100°30'E and 103°30'E
     * Truncated form of New Beijing / 3-degree Gauss-Kruger zone 34 (code 4770).
     */
    public const EPSG_NEW_BEIJING_3_DEGREE_GAUSS_KRUGER_CM_102E = 'urn:ogc:def:crs:EPSG::4791';

    /**
     * New Beijing / 3-degree Gauss-Kruger CM 105E
     * Extent: China - between 103°30'E and 106°30'E
     * Truncated form of New Beijing / 3-degree Gauss-Kruger zone 35 (code 4771).
     */
    public const EPSG_NEW_BEIJING_3_DEGREE_GAUSS_KRUGER_CM_105E = 'urn:ogc:def:crs:EPSG::4792';

    /**
     * New Beijing / 3-degree Gauss-Kruger CM 108E
     * Extent: China - onshore between 106°30'E and 109°30'E
     * Truncated form of New Beijing / 3-degree Gauss-Kruger zone 36 (code 4772).
     */
    public const EPSG_NEW_BEIJING_3_DEGREE_GAUSS_KRUGER_CM_108E = 'urn:ogc:def:crs:EPSG::4793';

    /**
     * New Beijing / 3-degree Gauss-Kruger CM 111E
     * Extent: China - onshore between 109°30'E and 112°30'E
     * Truncated form of New Beijing / 3-degree Gauss-Kruger zone 37 (code 4773).
     */
    public const EPSG_NEW_BEIJING_3_DEGREE_GAUSS_KRUGER_CM_111E = 'urn:ogc:def:crs:EPSG::4794';

    /**
     * New Beijing / 3-degree Gauss-Kruger CM 114E
     * Extent: China - onshore between 112°30'E and 115°30'E
     * Truncated form of New Beijing / 3-degree Gauss-Kruger zone 38 (code 4774).
     */
    public const EPSG_NEW_BEIJING_3_DEGREE_GAUSS_KRUGER_CM_114E = 'urn:ogc:def:crs:EPSG::4795';

    /**
     * New Beijing / 3-degree Gauss-Kruger CM 117E
     * Extent: China - onshore between 115°30'E and 118°30'E
     * Truncated form of New Beijing / 3-degree Gauss-Kruger zone 39 (code 4775).
     */
    public const EPSG_NEW_BEIJING_3_DEGREE_GAUSS_KRUGER_CM_117E = 'urn:ogc:def:crs:EPSG::4796';

    /**
     * New Beijing / 3-degree Gauss-Kruger CM 120E
     * Extent: China - onshore between 118°30'E and 121°30'E
     * Truncated form of New Beijing / 3-degree Gauss-Kruger zone 40 (code 4776).
     */
    public const EPSG_NEW_BEIJING_3_DEGREE_GAUSS_KRUGER_CM_120E = 'urn:ogc:def:crs:EPSG::4797';

    /**
     * New Beijing / 3-degree Gauss-Kruger CM 123E
     * Extent: China - onshore between 121°30'E and 124°30'E
     * Truncated form of New Beijing / 3-degree Gauss-Kruger zone 41 (code 4777).
     */
    public const EPSG_NEW_BEIJING_3_DEGREE_GAUSS_KRUGER_CM_123E = 'urn:ogc:def:crs:EPSG::4798';

    /**
     * New Beijing / 3-degree Gauss-Kruger CM 126E
     * Extent: China - onshore between 124°30'E and 127°30'E
     * Truncated form of New Beijing / 3-degree Gauss-Kruger zone 42 (code 4778).
     */
    public const EPSG_NEW_BEIJING_3_DEGREE_GAUSS_KRUGER_CM_126E = 'urn:ogc:def:crs:EPSG::4799';

    /**
     * New Beijing / 3-degree Gauss-Kruger CM 129E
     * Extent: China - between 127°30'E and 130°30'E
     * Truncated form of New Beijing / 3-degree Gauss-Kruger zone 43 (code 4779).
     */
    public const EPSG_NEW_BEIJING_3_DEGREE_GAUSS_KRUGER_CM_129E = 'urn:ogc:def:crs:EPSG::4800';

    /**
     * New Beijing / 3-degree Gauss-Kruger CM 132E
     * Extent: China - between 130°30'E and 133°30'E
     * Truncated form of New Beijing / 3-degree Gauss-Kruger zone 44 (code 4780).
     */
    public const EPSG_NEW_BEIJING_3_DEGREE_GAUSS_KRUGER_CM_132E = 'urn:ogc:def:crs:EPSG::4812';

    /**
     * New Beijing / 3-degree Gauss-Kruger CM 135E
     * Extent: China - east of 133°30'E
     * Truncated form of New Beijing / 3-degree Gauss-Kruger zone 45 (code 4781).
     */
    public const EPSG_NEW_BEIJING_3_DEGREE_GAUSS_KRUGER_CM_135E = 'urn:ogc:def:crs:EPSG::4822';

    /**
     * New Beijing / 3-degree Gauss-Kruger CM 75E
     * Extent: China - west of 76°30'E
     * Truncated form of New Beijing / 3-degree Gauss-Kruger zone 25 (code 4652).
     */
    public const EPSG_NEW_BEIJING_3_DEGREE_GAUSS_KRUGER_CM_75E = 'urn:ogc:def:crs:EPSG::4782';

    /**
     * New Beijing / 3-degree Gauss-Kruger CM 78E
     * Extent: China - between 76°30'E and 79°30'E
     * Truncated form of New Beijing / 3-degree Gauss-Kruger zone 26 (code 4653).
     */
    public const EPSG_NEW_BEIJING_3_DEGREE_GAUSS_KRUGER_CM_78E = 'urn:ogc:def:crs:EPSG::4783';

    /**
     * New Beijing / 3-degree Gauss-Kruger CM 81E
     * Extent: China - between 79°30'E and 82°30'E
     * Truncated form of New Beijing / 3-degree Gauss-Kruger zone 27 (code 4654).
     */
    public const EPSG_NEW_BEIJING_3_DEGREE_GAUSS_KRUGER_CM_81E = 'urn:ogc:def:crs:EPSG::4784';

    /**
     * New Beijing / 3-degree Gauss-Kruger CM 84E
     * Extent: China - between 82°30'E and 85°30'E
     * Truncated form of New Beijing / 3-degree Gauss-Kruger zone 28 (code 4655).
     */
    public const EPSG_NEW_BEIJING_3_DEGREE_GAUSS_KRUGER_CM_84E = 'urn:ogc:def:crs:EPSG::4785';

    /**
     * New Beijing / 3-degree Gauss-Kruger CM 87E
     * Extent: China - between 85°30'E and 88°30'E
     * Truncated form of New Beijing / 3-degree Gauss-Kruger zone 29 (code 4656).
     */
    public const EPSG_NEW_BEIJING_3_DEGREE_GAUSS_KRUGER_CM_87E = 'urn:ogc:def:crs:EPSG::4786';

    /**
     * New Beijing / 3-degree Gauss-Kruger CM 90E
     * Extent: China - between 88°30'E and 91°30'E
     * Truncated form of New Beijing / 3-degree Gauss-Kruger zone 30 (code 4766).
     */
    public const EPSG_NEW_BEIJING_3_DEGREE_GAUSS_KRUGER_CM_90E = 'urn:ogc:def:crs:EPSG::4787';

    /**
     * New Beijing / 3-degree Gauss-Kruger CM 93E
     * Extent: China - between 91°30'E and 94°30'E
     * Truncated form of New Beijing / 3-degree Gauss-Kruger zone 31 (code 4767).
     */
    public const EPSG_NEW_BEIJING_3_DEGREE_GAUSS_KRUGER_CM_93E = 'urn:ogc:def:crs:EPSG::4788';

    /**
     * New Beijing / 3-degree Gauss-Kruger CM 96E
     * Extent: China - between 94°30'E and 97°30'E
     * Truncated form of New Beijing / 3-degree Gauss-Kruger zone 32 (code 4768).
     */
    public const EPSG_NEW_BEIJING_3_DEGREE_GAUSS_KRUGER_CM_96E = 'urn:ogc:def:crs:EPSG::4789';

    /**
     * New Beijing / 3-degree Gauss-Kruger CM 99E
     * Extent: China - between 97°30'E and 100°30'E
     * Truncated form of New Beijing / 3-degree Gauss-Kruger zone 33 (code 4769).
     */
    public const EPSG_NEW_BEIJING_3_DEGREE_GAUSS_KRUGER_CM_99E = 'urn:ogc:def:crs:EPSG::4790';

    /**
     * New Beijing / 3-degree Gauss-Kruger zone 25
     * Extent: China - west of 76°30'E
     * Also found with truncated false easting - see New Beijing / 3-degree Gauss-Kruger CM 75E (code 4782).
     */
    public const EPSG_NEW_BEIJING_3_DEGREE_GAUSS_KRUGER_ZONE_25 = 'urn:ogc:def:crs:EPSG::4652';

    /**
     * New Beijing / 3-degree Gauss-Kruger zone 26
     * Extent: China - between 76°30'E and 79°30'E
     * Also found with truncated false easting - see New Beijing / 3-degree Gauss-Kruger CM 78E (code 4783).
     */
    public const EPSG_NEW_BEIJING_3_DEGREE_GAUSS_KRUGER_ZONE_26 = 'urn:ogc:def:crs:EPSG::4653';

    /**
     * New Beijing / 3-degree Gauss-Kruger zone 27
     * Extent: China - between 79°30'E and 82°30'E
     * Also found with truncated false easting - see New Beijing / 3-degree Gauss-Kruger CM 81E (code 4784).
     */
    public const EPSG_NEW_BEIJING_3_DEGREE_GAUSS_KRUGER_ZONE_27 = 'urn:ogc:def:crs:EPSG::4654';

    /**
     * New Beijing / 3-degree Gauss-Kruger zone 28
     * Extent: China - between 82°30'E and 85°30'E
     * Also found with truncated false easting - see New Beijing / 3-degree Gauss-Kruger CM 84E (code 4785).
     */
    public const EPSG_NEW_BEIJING_3_DEGREE_GAUSS_KRUGER_ZONE_28 = 'urn:ogc:def:crs:EPSG::4655';

    /**
     * New Beijing / 3-degree Gauss-Kruger zone 29
     * Extent: China - between 85°30'E and 88°30'E
     * Also found with truncated false easting - see New Beijing / 3-degree Gauss-Kruger CM 87E (code 4786).
     */
    public const EPSG_NEW_BEIJING_3_DEGREE_GAUSS_KRUGER_ZONE_29 = 'urn:ogc:def:crs:EPSG::4656';

    /**
     * New Beijing / 3-degree Gauss-Kruger zone 30
     * Extent: China - between 88°30'E and 91°30'E
     * Also found with truncated false easting - see New Beijing / 3-degree Gauss-Kruger CM 90E (code 4787).
     */
    public const EPSG_NEW_BEIJING_3_DEGREE_GAUSS_KRUGER_ZONE_30 = 'urn:ogc:def:crs:EPSG::4766';

    /**
     * New Beijing / 3-degree Gauss-Kruger zone 31
     * Extent: China - between 91°30'E and 94°30'E
     * Also found with truncated false easting - see New Beijing / 3-degree Gauss-Kruger CM 93E (code 4788).
     */
    public const EPSG_NEW_BEIJING_3_DEGREE_GAUSS_KRUGER_ZONE_31 = 'urn:ogc:def:crs:EPSG::4767';

    /**
     * New Beijing / 3-degree Gauss-Kruger zone 32
     * Extent: China - between 94°30'E and 97°30'E
     * Also found with truncated false easting - see New Beijing / 3-degree Gauss-Kruger CM 96E (code 4789).
     */
    public const EPSG_NEW_BEIJING_3_DEGREE_GAUSS_KRUGER_ZONE_32 = 'urn:ogc:def:crs:EPSG::4768';

    /**
     * New Beijing / 3-degree Gauss-Kruger zone 33
     * Extent: China - between 97°30'E and 100°30'E
     * Also found with truncated false easting - see New Beijing / 3-degree Gauss-Kruger CM 99E (code 4790).
     */
    public const EPSG_NEW_BEIJING_3_DEGREE_GAUSS_KRUGER_ZONE_33 = 'urn:ogc:def:crs:EPSG::4769';

    /**
     * New Beijing / 3-degree Gauss-Kruger zone 34
     * Extent: China - between 100°30'E and 103°30'E
     * Also found with truncated false easting - see New Beijing / 3-degree Gauss-Kruger CM 102E (code 4791).
     */
    public const EPSG_NEW_BEIJING_3_DEGREE_GAUSS_KRUGER_ZONE_34 = 'urn:ogc:def:crs:EPSG::4770';

    /**
     * New Beijing / 3-degree Gauss-Kruger zone 35
     * Extent: China - between 103°30'E and 106°30'E
     * Also found with truncated false easting - see New Beijing / 3-degree Gauss-Kruger CM 105E (code 4792).
     */
    public const EPSG_NEW_BEIJING_3_DEGREE_GAUSS_KRUGER_ZONE_35 = 'urn:ogc:def:crs:EPSG::4771';

    /**
     * New Beijing / 3-degree Gauss-Kruger zone 36
     * Extent: China - onshore between 106°30'E and 109°30'E
     * Also found with truncated false easting - see New Beijing / 3-degree Gauss-Kruger CM 108E (code 4793).
     */
    public const EPSG_NEW_BEIJING_3_DEGREE_GAUSS_KRUGER_ZONE_36 = 'urn:ogc:def:crs:EPSG::4772';

    /**
     * New Beijing / 3-degree Gauss-Kruger zone 37
     * Extent: China - onshore between 109°30'E and 112°30'E
     * Also found with truncated false easting - see New Beijing / 3-degree Gauss-Kruger CM 111E (code 4794).
     */
    public const EPSG_NEW_BEIJING_3_DEGREE_GAUSS_KRUGER_ZONE_37 = 'urn:ogc:def:crs:EPSG::4773';

    /**
     * New Beijing / 3-degree Gauss-Kruger zone 38
     * Extent: China - onshore between 112°30'E and 115°30'E
     * Also found with truncated false easting - see New Beijing / 3-degree Gauss-Kruger CM 114E (code 4795).
     */
    public const EPSG_NEW_BEIJING_3_DEGREE_GAUSS_KRUGER_ZONE_38 = 'urn:ogc:def:crs:EPSG::4774';

    /**
     * New Beijing / 3-degree Gauss-Kruger zone 39
     * Extent: China - onshore between 115°30'E and 118°30'E
     * Also found with truncated false easting - see New Beijing / 3-degree Gauss-Kruger CM 117E (code 4796).
     */
    public const EPSG_NEW_BEIJING_3_DEGREE_GAUSS_KRUGER_ZONE_39 = 'urn:ogc:def:crs:EPSG::4775';

    /**
     * New Beijing / 3-degree Gauss-Kruger zone 40
     * Extent: China - onshore between 118°30'E and 121°30'E
     * Also found with truncated false easting - see New Beijing / 3-degree Gauss-Kruger CM 120E (code 4797).
     */
    public const EPSG_NEW_BEIJING_3_DEGREE_GAUSS_KRUGER_ZONE_40 = 'urn:ogc:def:crs:EPSG::4776';

    /**
     * New Beijing / 3-degree Gauss-Kruger zone 41
     * Extent: China - onshore between 121°30'E and 124°30'E
     * Also found with truncated false easting - see New Beijing / 3-degree Gauss-Kruger CM 123E (code 4798).
     */
    public const EPSG_NEW_BEIJING_3_DEGREE_GAUSS_KRUGER_ZONE_41 = 'urn:ogc:def:crs:EPSG::4777';

    /**
     * New Beijing / 3-degree Gauss-Kruger zone 42
     * Extent: China - onshore between 124°30'E and 127°30'E
     * Also found with truncated false easting - see New Beijing / 3-degree Gauss-Kruger CM 126E (code 4799).
     */
    public const EPSG_NEW_BEIJING_3_DEGREE_GAUSS_KRUGER_ZONE_42 = 'urn:ogc:def:crs:EPSG::4778';

    /**
     * New Beijing / 3-degree Gauss-Kruger zone 43
     * Extent: China - between 127°30'E and 130°30'E
     * Also found with truncated false easting - see New Beijing / 3-degree Gauss-Kruger CM 129E (code 4800).
     */
    public const EPSG_NEW_BEIJING_3_DEGREE_GAUSS_KRUGER_ZONE_43 = 'urn:ogc:def:crs:EPSG::4779';

    /**
     * New Beijing / 3-degree Gauss-Kruger zone 44
     * Extent: China - between 130°30'E and 133°30'E
     * Also found with truncated false easting - see New Beijing / 3-degree Gauss-Kruger CM 132E (code 4812).
     */
    public const EPSG_NEW_BEIJING_3_DEGREE_GAUSS_KRUGER_ZONE_44 = 'urn:ogc:def:crs:EPSG::4780';

    /**
     * New Beijing / 3-degree Gauss-Kruger zone 45
     * Extent: China - east of 133°30'E
     * Also found with truncated false easting - see New Beijing / 3-degree Gauss-Kruger CM 135E (code 4822).
     */
    public const EPSG_NEW_BEIJING_3_DEGREE_GAUSS_KRUGER_ZONE_45 = 'urn:ogc:def:crs:EPSG::4781';

    /**
     * New Beijing / Gauss-Kruger CM 105E
     * Extent: China - onshore between 102°E and 108°E
     * Truncated form of New Beijing / [6-degree] Gauss-Kruger zone 18 (code 4573).
     */
    public const EPSG_NEW_BEIJING_GAUSS_KRUGER_CM_105E = 'urn:ogc:def:crs:EPSG::4584';

    /**
     * New Beijing / Gauss-Kruger CM 111E
     * Extent: China - onshore between 108°E and 114°E
     * Truncated form of New Beijing / [6-degree] Gauss-Kruger zone 19 (code 4574).
     */
    public const EPSG_NEW_BEIJING_GAUSS_KRUGER_CM_111E = 'urn:ogc:def:crs:EPSG::4585';

    /**
     * New Beijing / Gauss-Kruger CM 117E
     * Extent: China - onshore between 114°E and 120°E
     * Truncated form of New Beijing / [6-degree] Gauss-Kruger zone 20 (code 4575).
     */
    public const EPSG_NEW_BEIJING_GAUSS_KRUGER_CM_117E = 'urn:ogc:def:crs:EPSG::4586';

    /**
     * New Beijing / Gauss-Kruger CM 123E
     * Extent: China - onshore between 120°E and 126°E
     * Truncated form of New Beijing / [6-degree] Gauss-Kruger zone 21 (code 4576).
     */
    public const EPSG_NEW_BEIJING_GAUSS_KRUGER_CM_123E = 'urn:ogc:def:crs:EPSG::4587';

    /**
     * New Beijing / Gauss-Kruger CM 129E
     * Extent: China - onshore between 126°E and 132°E
     * Truncated form of New Beijing / [6-degree] Gauss-Kruger zone 22 (code 4577).
     */
    public const EPSG_NEW_BEIJING_GAUSS_KRUGER_CM_129E = 'urn:ogc:def:crs:EPSG::4588';

    /**
     * New Beijing / Gauss-Kruger CM 135E
     * Extent: China - east of 132°E
     * Truncated form of New Beijing / [6-degree] Gauss-Kruger zone 23 (code 4578).
     */
    public const EPSG_NEW_BEIJING_GAUSS_KRUGER_CM_135E = 'urn:ogc:def:crs:EPSG::4589';

    /**
     * New Beijing / Gauss-Kruger CM 75E
     * Extent: China - west of 78°E
     * Truncated form of New Beijing / [6-degree] Gauss-Kruger zone 13 (code 4568).
     */
    public const EPSG_NEW_BEIJING_GAUSS_KRUGER_CM_75E = 'urn:ogc:def:crs:EPSG::4579';

    /**
     * New Beijing / Gauss-Kruger CM 81E
     * Extent: China - between 78°E and 84°E
     * Truncated form of New Beijing / [6-degree] Gauss-Kruger zone 14 (code 4569).
     */
    public const EPSG_NEW_BEIJING_GAUSS_KRUGER_CM_81E = 'urn:ogc:def:crs:EPSG::4580';

    /**
     * New Beijing / Gauss-Kruger CM 87E
     * Extent: China - between 84°E and 90°E
     * Truncated form of New Beijing / [6-degree] Gauss-Kruger zone 15 (code 4570).
     */
    public const EPSG_NEW_BEIJING_GAUSS_KRUGER_CM_87E = 'urn:ogc:def:crs:EPSG::4581';

    /**
     * New Beijing / Gauss-Kruger CM 93E
     * Extent: China - between 90°E and 96°E
     * Truncated form of New Beijing / [6-degree] Gauss-Kruger zone 16 (code 4571).
     */
    public const EPSG_NEW_BEIJING_GAUSS_KRUGER_CM_93E = 'urn:ogc:def:crs:EPSG::4582';

    /**
     * New Beijing / Gauss-Kruger CM 99E
     * Extent: China - between 96°E and 102°E
     * Truncated form of New Beijing / [6-degree] Gauss-Kruger zone 17 (code 4572).
     */
    public const EPSG_NEW_BEIJING_GAUSS_KRUGER_CM_99E = 'urn:ogc:def:crs:EPSG::4583';

    /**
     * New Beijing / Gauss-Kruger zone 13
     * Extent: China - west of 78°E
     * Also found with truncated false easting - see New Beijing / [6-degree] Gauss-Kruger CM 75E (code 4579).
     */
    public const EPSG_NEW_BEIJING_GAUSS_KRUGER_ZONE_13 = 'urn:ogc:def:crs:EPSG::4568';

    /**
     * New Beijing / Gauss-Kruger zone 14
     * Extent: China - between 78°E and 84°E
     * Also found with truncated false easting - see New Beijing / [6-degree] Gauss-Kruger CM 81E (code 4580).
     */
    public const EPSG_NEW_BEIJING_GAUSS_KRUGER_ZONE_14 = 'urn:ogc:def:crs:EPSG::4569';

    /**
     * New Beijing / Gauss-Kruger zone 15
     * Extent: China - between 84°E and 90°E
     * Also found with truncated false easting - see New Beijing / [6-degree] Gauss-Kruger CM 87E (code 4581).
     */
    public const EPSG_NEW_BEIJING_GAUSS_KRUGER_ZONE_15 = 'urn:ogc:def:crs:EPSG::4570';

    /**
     * New Beijing / Gauss-Kruger zone 16
     * Extent: China - between 90°E and 96°E
     * Also found with truncated false easting - see New Beijing / [6-degree] Gauss-Kruger CM 93E (code 4582).
     */
    public const EPSG_NEW_BEIJING_GAUSS_KRUGER_ZONE_16 = 'urn:ogc:def:crs:EPSG::4571';

    /**
     * New Beijing / Gauss-Kruger zone 17
     * Extent: China - between 96°E and 102°E
     * Also found with truncated false easting - see New Beijing / [6-degree] Gauss-Kruger CM 99E (code 4583).
     */
    public const EPSG_NEW_BEIJING_GAUSS_KRUGER_ZONE_17 = 'urn:ogc:def:crs:EPSG::4572';

    /**
     * New Beijing / Gauss-Kruger zone 18
     * Extent: China - onshore between 102°E and 108°E
     * Also found with truncated false easting - see New Beijing / [6-degree] Gauss-Kruger CM 105E (code 4584).
     */
    public const EPSG_NEW_BEIJING_GAUSS_KRUGER_ZONE_18 = 'urn:ogc:def:crs:EPSG::4573';

    /**
     * New Beijing / Gauss-Kruger zone 19
     * Extent: China - onshore between 108°E and 114°E
     * Also found with truncated false easting - see New Beijing / G-K zone 19 / [6-degree] Gauss-Kruger CM 111E (code
     * 4585).
     */
    public const EPSG_NEW_BEIJING_GAUSS_KRUGER_ZONE_19 = 'urn:ogc:def:crs:EPSG::4574';

    /**
     * New Beijing / Gauss-Kruger zone 20
     * Extent: China - onshore between 114°E and 120°E
     * Also found with truncated false easting - see New Beijing / [6-degree] Gauss-Kruger CM 117E (code 4586).
     */
    public const EPSG_NEW_BEIJING_GAUSS_KRUGER_ZONE_20 = 'urn:ogc:def:crs:EPSG::4575';

    /**
     * New Beijing / Gauss-Kruger zone 21
     * Extent: China - onshore between 120°E and 126°E
     * Also found with truncated false easting - see New Beijing / [6-degree] Gauss-Kruger CM 123E (code 4587).
     */
    public const EPSG_NEW_BEIJING_GAUSS_KRUGER_ZONE_21 = 'urn:ogc:def:crs:EPSG::4576';

    /**
     * New Beijing / Gauss-Kruger zone 22
     * Extent: China - onshore between 126°E and 132°E
     * Also found with truncated false easting - see New Beijing / [6-degree] Gauss-Kruger CM 129E (code 4588).
     */
    public const EPSG_NEW_BEIJING_GAUSS_KRUGER_ZONE_22 = 'urn:ogc:def:crs:EPSG::4577';

    /**
     * New Beijing / Gauss-Kruger zone 23
     * Extent: China - east of 132°E
     * Also found with truncated false easting - see New Beijing / [6-degree] Gauss-Kruger CM 135E (code 4589).
     */
    public const EPSG_NEW_BEIJING_GAUSS_KRUGER_ZONE_23 = 'urn:ogc:def:crs:EPSG::4578';

    /**
     * Nord Sahara 1959 / Nord Algerie
     * Extent: Algeria - onshore north of 38.5 grads North (34°39'N)
     * Replaces Voirol 1879 / Nord Algerie ancienne (code 30493). Grid coordinates on average across Algeria are
     * unchanged although local differences reach 30 metres; geographic coordinate equivalents do change.
     */
    public const EPSG_NORD_SAHARA_1959_NORD_ALGERIE = 'urn:ogc:def:crs:EPSG::30791';

    /**
     * Nord Sahara 1959 / Sud Algerie
     * Extent: Algeria - 35 grads to 38.5 grads North (31°30'N to 34°39'N)
     * Replaces Voirol 1879 / Sud Algerie ancienne (code 30494). Grid coordinates on average across Algeria are
     * unchanged although local differences reach 30 metres; geographic coordinate equivalents do change. INCT uses to
     * south of 31°30'N; OGP recommends UTM.
     */
    public const EPSG_NORD_SAHARA_1959_SUD_ALGERIE = 'urn:ogc:def:crs:EPSG::30792';

    /**
     * Nord Sahara 1959 / UTM zone 29N
     * Extent: Algeria - west of 6°W (of Greenwich).
     */
    public const EPSG_NORD_SAHARA_1959_UTM_ZONE_29N = 'urn:ogc:def:crs:EPSG::30729';

    /**
     * Nord Sahara 1959 / UTM zone 30N
     * Extent: Algeria - between 6°W and 0°W (of Greenwich).
     */
    public const EPSG_NORD_SAHARA_1959_UTM_ZONE_30N = 'urn:ogc:def:crs:EPSG::30730';

    /**
     * Nord Sahara 1959 / UTM zone 31N
     * Extent: Algeria - between 0°E and 6°E (of Greenwich).
     */
    public const EPSG_NORD_SAHARA_1959_UTM_ZONE_31N = 'urn:ogc:def:crs:EPSG::30731';

    /**
     * Nord Sahara 1959 / UTM zone 32N
     * Extent: Algeria - east of 6°E (of Greenwich).
     */
    public const EPSG_NORD_SAHARA_1959_UTM_ZONE_32N = 'urn:ogc:def:crs:EPSG::30732';

    /**
     * ONGD14 / UTM zone 39N
     * Extent: Oman west of 54°E
     * In Oman replaced usage of WGS 84 / UTM zone 39N projCRS (code 32639) in 2014. Replaced by ONGD17 / UTM zone 39N
     * (code 9295) in 2019.
     */
    public const EPSG_ONGD14_UTM_ZONE_39N = 'urn:ogc:def:crs:EPSG::7374';

    /**
     * ONGD14 / UTM zone 40N
     * Extent: Oman between 54°E and 60°E
     * In Oman replaced usage of WGS 84 / UTM zone 40N projCRS (code 32640) in 2014. Replaced by ONGD17 / UTM zone 40N
     * (code 9296) in 2019.
     */
    public const EPSG_ONGD14_UTM_ZONE_40N = 'urn:ogc:def:crs:EPSG::7375';

    /**
     * ONGD14 / UTM zone 41N
     * Extent: Oman - offshore east of 60°E
     * Replaced by ONGD17 / UTM zone 41N (code 9296) in 2019.
     */
    public const EPSG_ONGD14_UTM_ZONE_41N = 'urn:ogc:def:crs:EPSG::7376';

    /**
     * ONGD17 / UTM zone 39N
     * Extent: Oman west of 54°E
     * Replaces ONGD14 / UTM zone 39N projCRS (code 7374) from March 2019.
     */
    public const EPSG_ONGD17_UTM_ZONE_39N = 'urn:ogc:def:crs:EPSG::9295';

    /**
     * ONGD17 / UTM zone 40N
     * Extent: Oman between 54°E and 60°E
     * Replaced ONGD14 / UTM zone 40N projCRS (code 7375) from March 2019.
     */
    public const EPSG_ONGD17_UTM_ZONE_40N = 'urn:ogc:def:crs:EPSG::9296';

    /**
     * ONGD17 / UTM zone 41N
     * Extent: Oman - offshore east of 60°E
     * Replaced ONGD14 / UTM zone 41N projCRS (code 7376) from March 2019.
     */
    public const EPSG_ONGD17_UTM_ZONE_41N = 'urn:ogc:def:crs:EPSG::9297';

    /**
     * OSGB36 / British National Grid
     * Extent: UK - offshore to boundary of UKCS within 49°45'N to 61°N and 9°W to 2°E; onshore Great Britain
     * (England, Wales and Scotland). Isle of Man onshore.
     */
    public const EPSG_OSGB36_BRITISH_NATIONAL_GRID = 'urn:ogc:def:crs:EPSG::27700';

    /**
     * OSNI 1952 / Irish National Grid
     * Extent: UK - Northern Ireland (Ulster) - onshore
     * Not used in Republic of Ireland. Replaced in 1975 by TM75 / Irish Grid (CRS code 29903).
     */
    public const EPSG_OSNI_1952_IRISH_NATIONAL_GRID = 'urn:ogc:def:crs:EPSG::29901';

    /**
     * Ocotepeque 1935 / Costa Rica Norte
     * Extent: Costa Rica - onshore north of 9°32'N
     * Replaced by Costa Rica 2005 / CTM05 from March 2007.
     */
    public const EPSG_OCOTEPEQUE_1935_COSTA_RICA_NORTE = 'urn:ogc:def:crs:EPSG::5456';

    /**
     * Ocotepeque 1935 / Costa Rica Sur
     * Extent: Costa Rica - onshore south of 9°56'N
     * Replaced by Costa Rica 2005 / CTM05 from March 2007.
     */
    public const EPSG_OCOTEPEQUE_1935_COSTA_RICA_SUR = 'urn:ogc:def:crs:EPSG::5457';

    /**
     * Ocotepeque 1935 / El Salvador Lambert
     * Extent: El Salvador - onshore
     * Replaced in El Salvador by SIRGAS_ES2007 from August 2007.
     */
    public const EPSG_OCOTEPEQUE_1935_EL_SALVADOR_LAMBERT = 'urn:ogc:def:crs:EPSG::5460';

    /**
     * Ocotepeque 1935 / Guatemala Norte
     * Extent: Guatemala - north of 15°51'30"N.
     */
    public const EPSG_OCOTEPEQUE_1935_GUATEMALA_NORTE = 'urn:ogc:def:crs:EPSG::5559';

    /**
     * Ocotepeque 1935 / Guatemala Sur
     * Extent: Guatemala - south of 15°51'30"N.
     */
    public const EPSG_OCOTEPEQUE_1935_GUATEMALA_SUR = 'urn:ogc:def:crs:EPSG::5459';

    /**
     * Ocotepeque 1935 / Nicaragua Norte
     * Extent: Nicaragua - onshore north of 12°48'N.
     */
    public const EPSG_OCOTEPEQUE_1935_NICARAGUA_NORTE = 'urn:ogc:def:crs:EPSG::5461';

    /**
     * Ocotepeque 1935 / Nicaragua Sur
     * Extent: Nicaragua - onshore south of 12°48'N.
     */
    public const EPSG_OCOTEPEQUE_1935_NICARAGUA_SUR = 'urn:ogc:def:crs:EPSG::5462';

    /**
     * Old Hawaiian / Hawaii zone 1
     * Extent: USA - Hawaii - island of Hawaii - onshore
     * Sometimes erroneously referred to as NAD27 / Hawaii zone 1.
     */
    public const EPSG_OLD_HAWAIIAN_HAWAII_ZONE_1 = 'urn:ogc:def:crs:EPSG::3561';

    /**
     * Old Hawaiian / Hawaii zone 2
     * Extent: USA - Hawaii - Maui; Kahoolawe; Lanai; Molokai - onshore
     * Sometimes erroneously referred to as NAD27 / Hawaii zone 2.
     */
    public const EPSG_OLD_HAWAIIAN_HAWAII_ZONE_2 = 'urn:ogc:def:crs:EPSG::3562';

    /**
     * Old Hawaiian / Hawaii zone 3
     * Extent: USA - Hawaii - Oahu - onshore
     * Sometimes erroneously referred to as NAD27 / Hawaii zone 3.
     */
    public const EPSG_OLD_HAWAIIAN_HAWAII_ZONE_3 = 'urn:ogc:def:crs:EPSG::3563';

    /**
     * Old Hawaiian / Hawaii zone 4
     * Extent: USA - Hawaii - Kauai - onshore
     * Sometimes erroneously referred to as NAD27 / Hawaii zone 4.
     */
    public const EPSG_OLD_HAWAIIAN_HAWAII_ZONE_4 = 'urn:ogc:def:crs:EPSG::3564';

    /**
     * Old Hawaiian / Hawaii zone 5
     * Extent: USA - Hawaii - Niihau - onshore
     * Sometimes erroneously referred to as NAD27 / Hawaii zone 5.
     */
    public const EPSG_OLD_HAWAIIAN_HAWAII_ZONE_5 = 'urn:ogc:def:crs:EPSG::3565';

    /**
     * Ostenfeld reconstruction
     * Extent: Denmark - onshore northern Schleswig and surrounding islands (i.e. Jutland south of the pre-1920 border
     * near the Kongea river)
     * A reconstruction in modern terms of the Prussian system Ostenfeld, as it was realized in the post-1920 Danish
     * areas. Defined through transformation ETRS89 to Ostenfeld-IRF (1) (code 10271) together with projection
     * Ostenfeld-reconstruction (code 10269).
     */
    public const EPSG_OSTENFELD_RECONSTRUCTION = 'urn:ogc:def:crs:EPSG::10270';

    /**
     * OxWo08 Grid
     * Extent: UK - on or related to the rail route from Oxford to Worcester
     * Defined through transformation ETRS89 to OxWo08-IRF (1) (code 10230) and map projection OxWo08-TM (code 10234).
     * Emulates the OxWo08 Snake projection applied to ETRS89 as realized through OSNet 2009.
     */
    public const EPSG_OXWO08_GRID = 'urn:ogc:def:crs:EPSG::10235';

    /**
     * PD/83 / 3-degree Gauss-Kruger zone 3
     * Extent: Germany - Thuringen - west of 10°30'E
     * Consistent with DHDN (CRS code 4314) at the 1-metre level. For low accuracy applications PD/83 can be considered
     * the same as DHDN. See CRS code 5666 for variant with axes order reversed to easting before northing for use in
     * GIS applications.
     */
    public const EPSG_PD_83_3_DEGREE_GAUSS_KRUGER_ZONE_3 = 'urn:ogc:def:crs:EPSG::3396';

    /**
     * PD/83 / 3-degree Gauss-Kruger zone 3 (E-N)
     * Extent: Germany - Thuringen - west of 10°30'E
     * PD/83 / 3-degree Gauss-Kruger zone 3 (CRS code 3396) but with axis order reversed (and axis abbreviations
     * changed) for GIS applications.
     */
    public const EPSG_PD_83_3_DEGREE_GAUSS_KRUGER_ZONE_3_E_N = 'urn:ogc:def:crs:EPSG::5666';

    /**
     * PD/83 / 3-degree Gauss-Kruger zone 4
     * Extent: Germany - Thuringen - east of 10°30'E
     * Consistent with DHDN (CRS code 4314) at the 1-metre level. For low accuracy applications PD/83 can be considered
     * the same as DHDN. See CRS code 5667 for variant with axes order reversed to easting before northing for use in
     * GIS applications.
     */
    public const EPSG_PD_83_3_DEGREE_GAUSS_KRUGER_ZONE_4 = 'urn:ogc:def:crs:EPSG::3397';

    /**
     * PD/83 / 3-degree Gauss-Kruger zone 4 (E-N)
     * Extent: Germany - Thuringen - east of 10°30'E
     * PD/83 / 3-degree Gauss-Kruger zone 4 (CRS code 3397) but with axis order reversed (and axis abbreviations
     * changed) for GIS applications.
     */
    public const EPSG_PD_83_3_DEGREE_GAUSS_KRUGER_ZONE_4_E_N = 'urn:ogc:def:crs:EPSG::5667';

    /**
     * PN68 / UTM zone 27N
     * Extent: Spain - Canary Islands - El Hierro onshore west of 18°W
     * Replaced by PN84 / UTM zone 27N and then by REGCAN95 / UTM zone 27N (CRS code 3629).
     */
    public const EPSG_PN68_UTM_ZONE_27N = 'urn:ogc:def:crs:EPSG::9404';

    /**
     * PN68 / UTM zone 28N
     * Extent: Spain - Canary Islands onshore - El Hierro east of 18°W, Fuerteventura, Gran Canaria, La Gomera, La
     * Palma, Lanzarote and Tenerife
     * Replaced by PN84 / UTM zone 28N only on western islands (El Hierro, La Gomera, La Palma and Tenerife). PN84
     * later replaced by REGCAN95. On eastern islands (Fuerteventura, Gran Canaria and Lanzarote) replaced by REGCAN95
     * / UTM zone 28N (CRS code 3630).
     */
    public const EPSG_PN68_UTM_ZONE_28N = 'urn:ogc:def:crs:EPSG::9405';

    /**
     * PN84 / UTM zone 27N
     * Extent: Spain - Canary Islands - El Hierro onshore west of 18°W
     * Replaces PN68 / UTM zone 27N (CRS code 9404). Replaced by REGCAN95 / UTM zone 27N (CRS code 3629).
     */
    public const EPSG_PN84_UTM_ZONE_27N = 'urn:ogc:def:crs:EPSG::9406';

    /**
     * PN84 / UTM zone 28N
     * Extent: Spain - Canary Islands onshore - El Hierro east of 18°W, La Gomera, La Palma and Tenerife
     * Replaces PN68 / UTM zone 28N (CRS code 9405). Replaced by REGCAN95 / UTM zone 28N (CRS code 3630).
     */
    public const EPSG_PN84_UTM_ZONE_28N = 'urn:ogc:def:crs:EPSG::9407';

    /**
     * PNG94 / PNGMG94 zone 54
     * Extent: Papua New Guinea - west of 144°E.
     */
    public const EPSG_PNG94_PNGMG94_ZONE_54 = 'urn:ogc:def:crs:EPSG::5550';

    /**
     * PNG94 / PNGMG94 zone 55
     * Extent: Papua New Guinea - between 144°E and 150°E.
     */
    public const EPSG_PNG94_PNGMG94_ZONE_55 = 'urn:ogc:def:crs:EPSG::5551';

    /**
     * PNG94 / PNGMG94 zone 56
     * Extent: Papua New Guinea - between 150°E and 156°E.
     */
    public const EPSG_PNG94_PNGMG94_ZONE_56 = 'urn:ogc:def:crs:EPSG::5552';

    /**
     * PNG94 / PNGMG94 zone 57
     * Extent: Papua New Guinea - between 156°E and 162°E.
     */
    public const EPSG_PNG94_PNGMG94_ZONE_57 = 'urn:ogc:def:crs:EPSG::9874';

    /**
     * PNG94 / PNGMG94 zone 58
     * Extent: Papua New Guinea - east of 162°E to EEZ limit.
     */
    public const EPSG_PNG94_PNGMG94_ZONE_58 = 'urn:ogc:def:crs:EPSG::9875';

    /**
     * POSGAR 2007 / Argentina 1
     * Extent: Argentina - west of 70°30'W
     * Adopted as official replacement of POSGAR 94 / Argentina 1 in May 2009. Also replaces de facto use of POSGAR 98
     * / Argentina 1 as of same date.
     */
    public const EPSG_POSGAR_2007_ARGENTINA_1 = 'urn:ogc:def:crs:EPSG::5343';

    /**
     * POSGAR 2007 / Argentina 2
     * Extent: Argentina - between 70°30'W and 67°30'W, onshore
     * Adopted as official replacement of POSGAR 94 / Argentina 2 in May 2009. Also replaces de facto use of POSGAR 98
     * / Argentina 2 as of same date.
     */
    public const EPSG_POSGAR_2007_ARGENTINA_2 = 'urn:ogc:def:crs:EPSG::5344';

    /**
     * POSGAR 2007 / Argentina 3
     * Extent: Argentina - between 67°30'W and 64°30'W, onshore
     * Adopted as official replacement of POSGAR 94 / Argentina 3 in May 2009. Also replaces de facto use of POSGAR 98
     * / Argentina 3 as of same date.
     */
    public const EPSG_POSGAR_2007_ARGENTINA_3 = 'urn:ogc:def:crs:EPSG::5345';

    /**
     * POSGAR 2007 / Argentina 4
     * Extent: Argentina - between 64°30'W and 61°30'W, onshore
     * Adopted as official replacement of POSGAR 94 / Argentina 4 in May 2009. Also replaces de facto use of POSGAR 98
     * / Argentina 4 as of same date.
     */
    public const EPSG_POSGAR_2007_ARGENTINA_4 = 'urn:ogc:def:crs:EPSG::5346';

    /**
     * POSGAR 2007 / Argentina 5
     * Extent: Argentina - between 61°30'W and 58°30'W onshore
     * Adopted as official replacement of POSGAR 94 / Argentina 5 in May 2009. Also replaces de facto use of POSGAR 98
     * / Argentina 5 as of same date.
     */
    public const EPSG_POSGAR_2007_ARGENTINA_5 = 'urn:ogc:def:crs:EPSG::5347';

    /**
     * POSGAR 2007 / Argentina 6
     * Extent: Argentina - between 58°30'W and 55°30'W, onshore
     * Adopted as official replacement of POSGAR 94 / Argentina 6 in May 2009. Also replaces de facto use of POSGAR 98
     * / Argentina 6 as of same date.
     */
    public const EPSG_POSGAR_2007_ARGENTINA_6 = 'urn:ogc:def:crs:EPSG::5348';

    /**
     * POSGAR 2007 / Argentina 7
     * Extent: Argentina - east of 55°30'W, onshore
     * Adopted as official replacement of POSGAR 94 / Argentina 7 in May 2009. Also replaces de facto use of POSGAR 98
     * / Argentina 7 as of same date.
     */
    public const EPSG_POSGAR_2007_ARGENTINA_7 = 'urn:ogc:def:crs:EPSG::5349';

    /**
     * POSGAR 2007 / CABA 2019
     * Extent: Argentina - autonomous city of Buenos Aires
     * Replaces the "0 de Flores" plane grid of 1919 from May 2020.
     */
    public const EPSG_POSGAR_2007_CABA_2019 = 'urn:ogc:def:crs:EPSG::9498';

    /**
     * POSGAR 2007 / UTM zone 19S
     * Extent: Argentina - Tierra del Fuego offshore Atlantic west of 66°W.
     */
    public const EPSG_POSGAR_2007_UTM_ZONE_19S = 'urn:ogc:def:crs:EPSG::9265';

    /**
     * POSGAR 94 / Argentina 1
     * Extent: Argentina - west of 70°30'W
     * Legally adopted in May 1997. Replaced by POSGAR 98 / Argentina 1 for scientific and many practical purposes
     * until May 2009. Officially replaced by POSGAR 2007 / Argentina 1 in May 2009.
     */
    public const EPSG_POSGAR_94_ARGENTINA_1 = 'urn:ogc:def:crs:EPSG::22181';

    /**
     * POSGAR 94 / Argentina 2
     * Extent: Argentina - between 70°30'W and 67°30'W, onshore
     * Legally adopted in May 1997. Replaced by POSGAR 98 / Argentina 2 for scientific and many practical purposes
     * until May 2009. Officially replaced by POSGAR 2007 / Argentina 2 in May 2009.
     */
    public const EPSG_POSGAR_94_ARGENTINA_2 = 'urn:ogc:def:crs:EPSG::22182';

    /**
     * POSGAR 94 / Argentina 3
     * Extent: Argentina - between 67°30'W and 64°30'W, onshore
     * Legally adopted in May 1997. Replaced by POSGAR 98 / Argentina 3 for scientific and many practical purposes
     * until May 2009. Officially replaced by POSGAR 2007 / Argentina 3 in May 2009.
     */
    public const EPSG_POSGAR_94_ARGENTINA_3 = 'urn:ogc:def:crs:EPSG::22183';

    /**
     * POSGAR 94 / Argentina 4
     * Extent: Argentina - between 64°30'W and 61°30'W, onshore
     * Legally adopted in May 1997. Replaced by POSGAR 98 / Argentina 4 for scientific and many practical purposes
     * until May 2009. Officially replaced by POSGAR 2007 / Argentina 4 in May 2009.
     */
    public const EPSG_POSGAR_94_ARGENTINA_4 = 'urn:ogc:def:crs:EPSG::22184';

    /**
     * POSGAR 94 / Argentina 5
     * Extent: Argentina - between 61°30'W and 58°30'W onshore
     * Legally adopted in May 1997. Replaced by POSGAR 98 / Argentina 5 for scientific and many practical purposes
     * until May 2009. Officially replaced by POSGAR 2007 / Argentina 5 in May 2009.
     */
    public const EPSG_POSGAR_94_ARGENTINA_5 = 'urn:ogc:def:crs:EPSG::22185';

    /**
     * POSGAR 94 / Argentina 6
     * Extent: Argentina - between 58°30'W and 55°30'W, onshore
     * Legally adopted in May 1997. Replaced by POSGAR 98 / Argentina 6 for scientific and many practical purposes
     * until May 2009. Officially replaced by POSGAR 2007 / Argentina 6 in May 2009.
     */
    public const EPSG_POSGAR_94_ARGENTINA_6 = 'urn:ogc:def:crs:EPSG::22186';

    /**
     * POSGAR 94 / Argentina 7
     * Extent: Argentina - east of 55°30'W, onshore
     * Legally adopted in May 1997. Replaced by POSGAR 98 / Argentina 7 for scientific and many practical purposes
     * until May 2009. Officially replaced by POSGAR 2007 / Argentina 7 in May 2009.
     */
    public const EPSG_POSGAR_94_ARGENTINA_7 = 'urn:ogc:def:crs:EPSG::22187';

    /**
     * POSGAR 98 / Argentina 1
     * Extent: Argentina - west of 70°30'W
     * Replaced POSGAR 94 / Argentina 1 for many practical purposes (but not as the legal system) until May 2009.
     * POSGAR 94 / Argentina 1 was officially replaced by POSGAR 2007 / Argentina 1 in May 2009.
     */
    public const EPSG_POSGAR_98_ARGENTINA_1 = 'urn:ogc:def:crs:EPSG::22171';

    /**
     * POSGAR 98 / Argentina 2
     * Extent: Argentina - between 70°30'W and 67°30'W, onshore
     * Replaced POSGAR 94 / Argentina 2 for many practical purposes (but not as the legal system) until May 2009.
     * POSGAR 94 / Argentina 2 was officially replaced by POSGAR 2007 / Argentina 2 in May 2009.
     */
    public const EPSG_POSGAR_98_ARGENTINA_2 = 'urn:ogc:def:crs:EPSG::22172';

    /**
     * POSGAR 98 / Argentina 3
     * Extent: Argentina - between 67°30'W and 64°30'W, onshore
     * Replaced POSGAR 94 / Argentina 3 for many practical purposes (but not as the legal system) until May 2009.
     * POSGAR 94 / Argentina 3 was officially replaced by POSGAR 2007 / Argentina 3 in May 2009.
     */
    public const EPSG_POSGAR_98_ARGENTINA_3 = 'urn:ogc:def:crs:EPSG::22173';

    /**
     * POSGAR 98 / Argentina 4
     * Extent: Argentina - between 64°30'W and 61°30'W, onshore
     * Replaced POSGAR 94 / Argentina 4 for many practical purposes (but not as the legal system) until May 2009.
     * POSGAR 94 / Argentina 4 was officially replaced by POSGAR 2007 / Argentina 4 in May 2009.
     */
    public const EPSG_POSGAR_98_ARGENTINA_4 = 'urn:ogc:def:crs:EPSG::22174';

    /**
     * POSGAR 98 / Argentina 5
     * Extent: Argentina - between 61°30'W and 58°30'W onshore
     * Replaced POSGAR 94 / Argentina 5 for many practical purposes (but not as the legal system) until May 2009.
     * POSGAR 94 / Argentina 5 was officially replaced by POSGAR 2007 / Argentina 5 in May 2009.
     */
    public const EPSG_POSGAR_98_ARGENTINA_5 = 'urn:ogc:def:crs:EPSG::22175';

    /**
     * POSGAR 98 / Argentina 6
     * Extent: Argentina - between 58°30'W and 55°30'W, onshore
     * Replaced POSGAR 94 / Argentina 6 for many practical purposes (but not as the legal system) until May 2009.
     * POSGAR 94 / Argentina 6 was officially replaced by POSGAR 2007 / Argentina 6 in May 2009.
     */
    public const EPSG_POSGAR_98_ARGENTINA_6 = 'urn:ogc:def:crs:EPSG::22176';

    /**
     * POSGAR 98 / Argentina 7
     * Extent: Argentina - east of 55°30'W, onshore
     * Replaced POSGAR 94 / Argentina 7 for many practical purposes (but not as the legal system) until May 2009.
     * POSGAR 94 / Argentina 7 was officially replaced by POSGAR 2007 / Argentina 7 in May 2009.
     */
    public const EPSG_POSGAR_98_ARGENTINA_7 = 'urn:ogc:def:crs:EPSG::22177';

    /**
     * PRS92 / Philippines zone 1
     * Extent: Philippines - west of 118°E
     * Replaces Luzon 1911 / Philippines zone I (CRS code 25391).
     */
    public const EPSG_PRS92_PHILIPPINES_ZONE_1 = 'urn:ogc:def:crs:EPSG::3121';

    /**
     * PRS92 / Philippines zone 2
     * Extent: Philippines - approximately between 118°E and 120°E - Palawan; Calamian Islands
     * Replaces Luzon 1911 / Philippines zone II (CRS code 25392).
     */
    public const EPSG_PRS92_PHILIPPINES_ZONE_2 = 'urn:ogc:def:crs:EPSG::3122';

    /**
     * PRS92 / Philippines zone 3
     * Extent: Philippines - approximately between 120°E and 122°E. Luzon (west of 122°E); Mindoro
     * Replaces Luzon 1911 / Philippines zone III (CRS code 25393).
     */
    public const EPSG_PRS92_PHILIPPINES_ZONE_3 = 'urn:ogc:def:crs:EPSG::3123';

    /**
     * PRS92 / Philippines zone 4
     * Extent: Philippines - approximately between 122°E and 124°E - southeast Luzon (east of 122°E); Tablas;
     * Masbate; Panay; Cebu; Negros; west Mindanao (west of 122°E)
     * Replaces Luzon 1911 / Philippines zone IV (CRS code 25394).
     */
    public const EPSG_PRS92_PHILIPPINES_ZONE_4 = 'urn:ogc:def:crs:EPSG::3124';

    /**
     * PRS92 / Philippines zone 5
     * Extent: Philippines - approximately between 124°E and 126°E, - east Mindanao (east of 124°E); Bohol; Samar
     * Replaces Luzon 1911 / Philippines zone V (CRS code 25395).
     */
    public const EPSG_PRS92_PHILIPPINES_ZONE_5 = 'urn:ogc:def:crs:EPSG::3125';

    /**
     * PSAD56 / ICN Regional
     * Extent: Venezuela - onshore.
     */
    public const EPSG_PSAD56_ICN_REGIONAL = 'urn:ogc:def:crs:EPSG::2317';

    /**
     * PSAD56 / Peru central zone
     * Extent: Peru - between 79°W and 73°W, onshore.
     */
    public const EPSG_PSAD56_PERU_CENTRAL_ZONE = 'urn:ogc:def:crs:EPSG::24892';

    /**
     * PSAD56 / Peru east zone
     * Extent: Peru - east of 73°W, onshore.
     */
    public const EPSG_PSAD56_PERU_EAST_ZONE = 'urn:ogc:def:crs:EPSG::24893';

    /**
     * PSAD56 / Peru west zone
     * Extent: Peru - west of 79°W.
     */
    public const EPSG_PSAD56_PERU_WEST_ZONE = 'urn:ogc:def:crs:EPSG::24891';

    /**
     * PSAD56 / UTM zone 17N
     * Extent: South America (Ecuador) between 84°W and 78°W, northern hemisphere, onshore.
     */
    public const EPSG_PSAD56_UTM_ZONE_17N = 'urn:ogc:def:crs:EPSG::24817';

    /**
     * PSAD56 / UTM zone 17S
     * Extent: South America (Ecuador and Peru) between 84°W and 78°W, southern hemisphere, onshore.
     */
    public const EPSG_PSAD56_UTM_ZONE_17S = 'urn:ogc:def:crs:EPSG::24877';

    /**
     * PSAD56 / UTM zone 18N
     * Extent: South America (Ecuador; Venezuela) between 78°W and 72°W, northern hemisphere, onshore
     * In Venezuela also known as La Canoa / UTM zone 18N.
     */
    public const EPSG_PSAD56_UTM_ZONE_18N = 'urn:ogc:def:crs:EPSG::24818';

    /**
     * PSAD56 / UTM zone 18S
     * Extent: South America (Chile - north of 45°S; Ecuador; Peru) between 78°W and 72°W, southern hemisphere,
     * onshore.
     */
    public const EPSG_PSAD56_UTM_ZONE_18S = 'urn:ogc:def:crs:EPSG::24878';

    /**
     * PSAD56 / UTM zone 19N
     * Extent: South America (Aruba; Bonaire; Curacao; Venezuela) between 72°W and 66°W, northern hemisphere, onshore
     * In Venezuela also known as La Canoa / UTM zone 19N.
     */
    public const EPSG_PSAD56_UTM_ZONE_19N = 'urn:ogc:def:crs:EPSG::24819';

    /**
     * PSAD56 / UTM zone 19S
     * Extent: South America (Bolivia; Chile - north of 45°S; Peru) between 72°W and 66°W, southern hemisphere,
     * onshore.
     */
    public const EPSG_PSAD56_UTM_ZONE_19S = 'urn:ogc:def:crs:EPSG::24879';

    /**
     * PSAD56 / UTM zone 20N
     * Extent: South America (Guyana; Venezuela) onshore between 66°W and 60°W, northern hemisphere
     * In Venezuela also known as La Canoa / UTM zone 20N.
     */
    public const EPSG_PSAD56_UTM_ZONE_20N = 'urn:ogc:def:crs:EPSG::24820';

    /**
     * PSAD56 / UTM zone 20S
     * Extent: Bolivia between 66°W and 60°W.
     */
    public const EPSG_PSAD56_UTM_ZONE_20S = 'urn:ogc:def:crs:EPSG::24880';

    /**
     * PSAD56 / UTM zone 21N
     * Extent: South America (Guyana) onshore between 60°W and 54°W, northern hemisphere.
     */
    public const EPSG_PSAD56_UTM_ZONE_21N = 'urn:ogc:def:crs:EPSG::24821';

    /**
     * PSAD56 / UTM zone 21S
     * Extent: Bolivia - east of 60°W.
     */
    public const EPSG_PSAD56_UTM_ZONE_21S = 'urn:ogc:def:crs:EPSG::24881';

    /**
     * PSAD56 / UTM zone 22S
     * Extent: Brazil - offshore shelf - Amazon cone.
     */
    public const EPSG_PSAD56_UTM_ZONE_22S = 'urn:ogc:def:crs:EPSG::24882';

    /**
     * PSD93 / UTM zone 39N
     * Extent: Oman - onshore west of 54°E
     * Replaced Fahud / UTM zone 39N projCRS (code 23239) in 1993. Maximum differences to Fahud adjustment are 20
     * metres.
     */
    public const EPSG_PSD93_UTM_ZONE_39N = 'urn:ogc:def:crs:EPSG::3439';

    /**
     * PSD93 / UTM zone 40N
     * Extent: Oman - onshore east of 54°E. Includes Musandam and the Kuria Muria (Al Hallaniyah) islands
     * Replaced Fahud / UTM zone 40N projCRS (code 23240) in 1993. Maximum differences to Fahud adjustment are 20
     * metres.
     */
    public const EPSG_PSD93_UTM_ZONE_40N = 'urn:ogc:def:crs:EPSG::3440';

    /**
     * PTRA08 / LAEA Europe
     * Extent: Portugal - Azores and Madeira island groups and surrounding EEZ - Flores, Corvo; Graciosa, Terceira, Sao
     * Jorge, Pico, Faial; Sao Miguel, Santa Maria; Madeira, Porto Santo, Desertas; Selvagens
     * At applicable scales and usages, may be considered consistent with ETRS89-extended / LAEA Europe (CRS code
     * 3035): see CT 9045.
     */
    public const EPSG_PTRA08_LAEA_EUROPE = 'urn:ogc:def:crs:EPSG::5633';

    /**
     * PTRA08 / LCC Europe
     * Extent: Portugal - Azores and Madeira island groups and surrounding EEZ - Flores, Corvo; Graciosa, Terceira, Sao
     * Jorge, Pico, Faial; Sao Miguel, Santa Maria; Madeira, Porto Santo, Desertas; Selvagens
     * At applicable scales (1:500,000 and smaller) may be considered consistent with ETRS89-extended / LCC Europe (CRS
     * code 3034): see CT 9046.
     */
    public const EPSG_PTRA08_LCC_EUROPE = 'urn:ogc:def:crs:EPSG::5632';

    /**
     * PTRA08 / UTM zone 25N
     * Extent: Portugal - west of 30°W - western Azores - Flores and Corvo islands and surrounding EEZ
     * Replaces Azores Occidental 1939 / UTM zone 25N (CRS code 2188).
     */
    public const EPSG_PTRA08_UTM_ZONE_25N = 'urn:ogc:def:crs:EPSG::5014';

    /**
     * PTRA08 / UTM zone 26N
     * Extent: Portugal - between 30°W and 24°W - central and eastern Azores - Graciosa, Terceira, Sao Jorge, Pico,
     * Faial; Sao Miguel and Santa Maria islands and surrounding EEZ
     * Replaces Azores Oriental 1995 / UTM zone 26N and Azores Central 1995 / UTM zone 26N (CRS codes 3062-63).
     */
    public const EPSG_PTRA08_UTM_ZONE_26N = 'urn:ogc:def:crs:EPSG::5015';

    /**
     * PTRA08 / UTM zone 28N
     * Extent: Portugal - Madeira, Porto Santo, Desertas and Selvagens islands and surrounding EEZ east of 18°W
     * Replaces Porto Santo 1995 / UTM zone 28N (CRS code 3061).
     */
    public const EPSG_PTRA08_UTM_ZONE_28N = 'urn:ogc:def:crs:EPSG::5016';

    /**
     * Palestine 1923 / Israeli CS Grid
     * Extent: Israel - onshore; Palestine onshore
     * See projection remarks. Replaced by Israeli TM Grid (EPSG code 2039).
     */
    public const EPSG_PALESTINE_1923_ISRAELI_CS_GRID = 'urn:ogc:def:crs:EPSG::28193';

    /**
     * Palestine 1923 / Palestine Belt
     * Extent: Israel - onshore; Jordan; Palestine - onshore
     * See projection remarks. Also found without 1 million added to FN: see CRS code 7142.
     */
    public const EPSG_PALESTINE_1923_PALESTINE_BELT = 'urn:ogc:def:crs:EPSG::28192';

    /**
     * Palestine 1923 / Palestine Grid
     * Extent: Israel - onshore; Jordan; Palestine - onshore
     * Replaced by CRS 28192 (AMS use) and 28193 (in Israel).
     */
    public const EPSG_PALESTINE_1923_PALESTINE_GRID = 'urn:ogc:def:crs:EPSG::28191';

    /**
     * Palestine 1923 / Palestine Grid modified
     * Extent: Israel - onshore; Jordan; Palestine - onshore
     * See projection remarks. Also found with 1 million added to FN: see CRS code 28192.
     */
    public const EPSG_PALESTINE_1923_PALESTINE_GRID_MODIFIED = 'urn:ogc:def:crs:EPSG::7142';

    /**
     * Pampa del Castillo / Argentina 1
     * Extent: Argentina - Chibut province west of 70°30'W and south of approximately 44°55'S and Santa Cruz province
     * west of 70°30'W and north of approximately 50°20'S
     * Replaced by Campo Inchauspe / Argentina 1 (CRS code 22191) for topographic mapping, but use continues for oil
     * exploration and production in Golfo San Jorge basin (44°S to 47.5°S).
     */
    public const EPSG_PAMPA_DEL_CASTILLO_ARGENTINA_1 = 'urn:ogc:def:crs:EPSG::9284';

    /**
     * Pampa del Castillo / Argentina 2
     * Extent: Argentina - Chibut province between 70°30'W and 67°30'W and south of approximately 42°30'S and Santa
     * Cruz province between 70°30'W and 67°30'W and north of approximately 50°20'S
     * Replaced by Campo Inchauspe / Argentina 2 (CRS code 22192) for topographic mapping, but use continues for oil
     * exploration and production in Golfo San Jorge basin (44°S to 47.5°S).
     */
    public const EPSG_PAMPA_DEL_CASTILLO_ARGENTINA_2 = 'urn:ogc:def:crs:EPSG::2082';

    /**
     * Pampa del Castillo / Argentina 3
     * Extent: Argentina - Chibut province east of 67°30'W and south of approximately 43°35'S and Santa Cruz province
     * east of 67°30'W and north of approximately 49°23'S
     * Replaced by Campo Inchauspe / Argentina 3 (CRS code 22193) for topographic mapping, but use continues for oil
     * exploration and production in Golfo San Jorge basin (44°S to 47.5°S).
     */
    public const EPSG_PAMPA_DEL_CASTILLO_ARGENTINA_3 = 'urn:ogc:def:crs:EPSG::9285';

    /**
     * Panama-Colon 1911 / Panama Lambert
     * Extent: Panama - onshore
     * Replaces Panama-Colon / Panama Polyconic from 1940s.
     */
    public const EPSG_PANAMA_COLON_1911_PANAMA_LAMBERT = 'urn:ogc:def:crs:EPSG::5469';

    /**
     * Panama-Colon 1911 / Panama Polyconic
     * Extent: Panama - onshore
     * Replaced by Panama-Colon / Panama Lambert from 1940s.
     */
    public const EPSG_PANAMA_COLON_1911_PANAMA_POLYCONIC = 'urn:ogc:def:crs:EPSG::5472';

    /**
     * Perroud 1950 / Terre Adelie Polar Stereographic
     * Extent: Antarctica - Adelie Land - coastal area between 136°E and 142°E
     * Replaced by RGTAAF07 / Terre Adelie Polar Stereographic (CRS code 7082).
     */
    public const EPSG_PERROUD_1950_TERRE_ADELIE_POLAR_STEREOGRAPHIC = 'urn:ogc:def:crs:EPSG::2986';

    /**
     * Peru96 / UTM zone 17S
     * Extent: Peru - between 84°W and 78°W.
     */
    public const EPSG_PERU96_UTM_ZONE_17S = 'urn:ogc:def:crs:EPSG::5839';

    /**
     * Peru96 / UTM zone 18S
     * Extent: Peru - between 78°W and 72°W.
     */
    public const EPSG_PERU96_UTM_ZONE_18S = 'urn:ogc:def:crs:EPSG::5387';

    /**
     * Peru96 / UTM zone 19S
     * Extent: Peru - east of 72°W.
     */
    public const EPSG_PERU96_UTM_ZONE_19S = 'urn:ogc:def:crs:EPSG::5389';

    /**
     * Petrels 1972 / Terre Adelie Polar Stereographic
     * Extent: Antarctica - Adelie Land - Petrels island
     * Replaced by RGTAAF07 / Terre Adelie Polar Stereographic (CRS code 7082).
     */
    public const EPSG_PETRELS_1972_TERRE_ADELIE_POLAR_STEREOGRAPHIC = 'urn:ogc:def:crs:EPSG::2985';

    /**
     * Pitcairn 1967 / UTM zone 9S
     * Extent: Pitcairn - Pitcairn Island
     * Replaced by Pitcairn 2006 / Pitcairn TM 2006 (CRS code 3783).
     */
    public const EPSG_PITCAIRN_1967_UTM_ZONE_9S = 'urn:ogc:def:crs:EPSG::3784';

    /**
     * Pitcairn 2006 / Pitcairn TM 2006
     * Extent: Pitcairn - Pitcairn Island
     * Replaces Pitcairn 1967 / UTM zone 9S (CRS code 3784). For practical purposes may be considered to be WGS 84 /
     * Pitcairn TM 2006.
     */
    public const EPSG_PITCAIRN_2006_PITCAIRN_TM_2006 = 'urn:ogc:def:crs:EPSG::3783';

    /**
     * Pointe Noire / UTM zone 32S
     * Extent: Congo.
     */
    public const EPSG_POINTE_NOIRE_UTM_ZONE_32S = 'urn:ogc:def:crs:EPSG::28232';

    /**
     * Porto Santo / UTM zone 28N
     * Extent: Portugal - Madeira, Porto Santo and Desertas islands - onshore.
     */
    public const EPSG_PORTO_SANTO_UTM_ZONE_28N = 'urn:ogc:def:crs:EPSG::2942';

    /**
     * Porto Santo 1995 / UTM zone 28N
     * Extent: Portugal - Madeira, Porto Santo and Desertas islands - onshore
     * Replaced by PTRA08 / UTM zone 28N (CRS code 5016).
     */
    public const EPSG_PORTO_SANTO_1995_UTM_ZONE_28N = 'urn:ogc:def:crs:EPSG::3061';

    /**
     * Puerto Rico / St. Croix
     * Extent: US Virgin Islands - onshore - St Croix, St John, and St Thomas
     * Sometimes erroneously referred to as NAD27 / St. Croix State Plane CS.
     */
    public const EPSG_PUERTO_RICO_ST_CROIX = 'urn:ogc:def:crs:EPSG::3992';

    /**
     * Puerto Rico / UTM zone 20N
     * Extent: British Virgin Islands - onshore - Anegada, Jost Van Dyke, Tortola, and Virgin Gorda
     * NAD27 / UTM zone 20N (code 26720) used for military purposes. In 2002 replaced by NAD83 / UTM zone 20N (CRS code
     * 26920).
     */
    public const EPSG_PUERTO_RICO_UTM_ZONE_20N = 'urn:ogc:def:crs:EPSG::3920';

    /**
     * Puerto Rico State Plane CS of 1927
     * Extent: Puerto Rico - onshore
     * Sometimes erroneously referred to as NAD27 / Puerto Rico State Plane CS.
     */
    public const EPSG_PUERTO_RICO_STATE_PLANE_CS_OF_1927 = 'urn:ogc:def:crs:EPSG::3991';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger CM 102E
     * Extent: Russia - onshore between 100°30'E and 103°30'E
     * Truncated form of Pulkovo 1942 / 3-degree Gauss-Kruger zone 34 (code 2551).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_CM_102E = 'urn:ogc:def:crs:EPSG::2610';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger CM 105E
     * Extent: Russia - onshore between 103°30'E and 106°30'E
     * Truncated form of Pulkovo 1942 / 3-degree Gauss-Kruger zone 35 (code 2552).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_CM_105E = 'urn:ogc:def:crs:EPSG::2611';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger CM 108E
     * Extent: Russia - onshore between 106°30'E and 109°30'E
     * Truncated form of Pulkovo 1942 / 3-degree Gauss-Kruger zone 36 (code 2553).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_CM_108E = 'urn:ogc:def:crs:EPSG::2612';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger CM 111E
     * Extent: Russia - onshore between 109°30'E and 112°30'E
     * Truncated form of Pulkovo 1942 / 3-degree Gauss-Kruger zone 37 (code 2554).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_CM_111E = 'urn:ogc:def:crs:EPSG::2613';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger CM 114E
     * Extent: Russia - onshore between 112°30'E and 115°30'E
     * Truncated form of Pulkovo 1942 / 3-degree Gauss-Kruger zone 38 (code 2555).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_CM_114E = 'urn:ogc:def:crs:EPSG::2614';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger CM 117E
     * Extent: Russia - onshore between 115°30'E and 118°30'E
     * Truncated form of Pulkovo 1942 / 3-degree Gauss-Kruger zone 39 (code 2556).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_CM_117E = 'urn:ogc:def:crs:EPSG::2615';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger CM 120E
     * Extent: Russia - onshore between 118°30'E and 121°30'E
     * Truncated form of Pulkovo 1942 / 3-degree Gauss-Kruger zone 40 (code 2557).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_CM_120E = 'urn:ogc:def:crs:EPSG::2616';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger CM 123E
     * Extent: Russia - onshore between 121°30'E and 124°30'E
     * Truncated form of Pulkovo 1942 / 3-degree Gauss-Kruger zone 41 (code 2558).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_CM_123E = 'urn:ogc:def:crs:EPSG::2617';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger CM 126E
     * Extent: Russia - onshore between 124°30'E and 127°30'E
     * Truncated form of Pulkovo 1942 / 3-degree Gauss-Kruger zone 42 (code 2559).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_CM_126E = 'urn:ogc:def:crs:EPSG::2618';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger CM 129E
     * Extent: Russia - onshore between 127°30'E and 130°30'E
     * Truncated form of Pulkovo 1942 / 3-degree Gauss-Kruger zone 43 (code 2560).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_CM_129E = 'urn:ogc:def:crs:EPSG::2619';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger CM 132E
     * Extent: Russia - onshore between 130°30'E and 133°30'E
     * Truncated form of Pulkovo 1942 / 3-degree Gauss-Kruger zone 44 (code 2561).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_CM_132E = 'urn:ogc:def:crs:EPSG::2620';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger CM 135E
     * Extent: Russia - onshore between 133°30'E and 136°30'E
     * Truncated form of Pulkovo 1942 / 3-degree Gauss-Kruger zone 45 (code 2562).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_CM_135E = 'urn:ogc:def:crs:EPSG::2621';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger CM 138E
     * Extent: Russia - onshore between 136°30'E and 139°30'E
     * Truncated form of Pulkovo 1942 / 3-degree Gauss-Kruger zone 46 (code 2563).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_CM_138E = 'urn:ogc:def:crs:EPSG::2622';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger CM 141E
     * Extent: Russia - onshore between 139°30'E and 142°30'E
     * Truncated form of Pulkovo 1942 / 3-degree Gauss-Kruger zone 47 (code 2564).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_CM_141E = 'urn:ogc:def:crs:EPSG::2623';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger CM 144E
     * Extent: Russia - onshore between 142°30'E and 145°30'E
     * Truncated form of Pulkovo 1942 / 3-degree Gauss-Kruger zone 48 (code 2565).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_CM_144E = 'urn:ogc:def:crs:EPSG::2624';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger CM 147E
     * Extent: Russia - onshore between 145°30'E and 148°30'E
     * Truncated form of Pulkovo 1942 / 3-degree Gauss-Kruger zone 49 (code 2566).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_CM_147E = 'urn:ogc:def:crs:EPSG::2625';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger CM 150E
     * Extent: Russia - onshore between 148°30'E and 151°30'E
     * Truncated form of Pulkovo 1942 / 3-degree Gauss-Kruger zone 50 (code 2567).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_CM_150E = 'urn:ogc:def:crs:EPSG::2626';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger CM 153E
     * Extent: Russia - onshore between 151°30'E and 154°30'E
     * Truncated form of Pulkovo 1942 / 3-degree Gauss-Kruger zone 51 (code 2568).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_CM_153E = 'urn:ogc:def:crs:EPSG::2627';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger CM 156E
     * Extent: Russia - onshore between 154°30'E and 157°30'E
     * Truncated form of Pulkovo 1942 / 3-degree Gauss-Kruger zone 52 (code 2569).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_CM_156E = 'urn:ogc:def:crs:EPSG::2628';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger CM 159E
     * Extent: Russia - onshore between 157°30'E and 160°30'E
     * Truncated form of Pulkovo 1942 / 3-degree Gauss-Kruger zone 53 (code 2570).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_CM_159E = 'urn:ogc:def:crs:EPSG::2629';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger CM 162E
     * Extent: Russia - onshore between 160°30'E and 163°30'E
     * Truncated form of Pulkovo 1942 / 3-degree Gauss-Kruger zone 54 (code 2571).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_CM_162E = 'urn:ogc:def:crs:EPSG::2630';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger CM 165E
     * Extent: Russia - onshore between 163°30'E and 166°30'E
     * Truncated form of Pulkovo 1942 / 3-degree Gauss-Kruger zone 55 (code 2572).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_CM_165E = 'urn:ogc:def:crs:EPSG::2631';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger CM 168E
     * Extent: Russia - onshore between 166°30'E and 169°30'E
     * Truncated form of Pulkovo 1942 / 3-degree Gauss-Kruger zone 56 (code 2573).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_CM_168E = 'urn:ogc:def:crs:EPSG::2632';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger CM 168W
     * Extent: Russia - onshore between 169°30'W and 166°30'W
     * Truncated form of Pulkovo 1942 / 3-degree Gauss-Kruger zone 64 (code 2581).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_CM_168W = 'urn:ogc:def:crs:EPSG::2640';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger CM 171E
     * Extent: Russia - onshore between 169°30'E and 172°30'E
     * Truncated form of Pulkovo 1942 / 3-degree Gauss-Kruger zone 57 (code 2574).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_CM_171E = 'urn:ogc:def:crs:EPSG::2633';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger CM 171W
     * Extent: Russia - onshore between 172°30'W and 169°30'W
     * Truncated form of Pulkovo 1942 / 3-degree Gauss-Kruger zone 63 (code 2580).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_CM_171W = 'urn:ogc:def:crs:EPSG::2639';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger CM 174E
     * Extent: Russia - onshore between 172°30'E and 175°30'E
     * Truncated form of Pulkovo 1942 / 3-degree Gauss-Kruger zone 58 (code 2575).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_CM_174E = 'urn:ogc:def:crs:EPSG::2634';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger CM 174W
     * Extent: Russia - onshore between 175°30'W and 172°30'W
     * Truncated form of Pulkovo 1942 / 3-degree Gauss-Kruger zone 62 (code 2579).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_CM_174W = 'urn:ogc:def:crs:EPSG::2638';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger CM 177E
     * Extent: Russia - onshore between 175°30'E and 178°30'E
     * Truncated form of Pulkovo 1942 / 3-degree Gauss-Kruger zone 59 (code 2576).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_CM_177E = 'urn:ogc:def:crs:EPSG::2635';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger CM 177W
     * Extent: Russia - onshore between 178°30'W and 175°30'W
     * Truncated form of Pulkovo 1942 / 3-degree Gauss-Kruger zone 61 (code 2578).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_CM_177W = 'urn:ogc:def:crs:EPSG::2637';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger CM 180E
     * Extent: Russia - onshore between 178°30'E and 178°30'W
     * Truncated form of Pulkovo 1942 / 3-degree Gauss-Kruger zone 60 (code 3389).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_CM_180E = 'urn:ogc:def:crs:EPSG::2636';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger CM 21E
     * Extent: Estonia, Latvia, Lithuania, Russia (Kaliningrad) and Ukraine - onshore between 19°30'E and 22°30'E
     * Truncated form of Pulkovo 1942 / 3-degree Gauss-Kruger zone 7 (code 2523).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_CM_21E = 'urn:ogc:def:crs:EPSG::2582';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger CM 24E
     * Extent: Belarus, Estonia, Latvia, Lithuania, Russia (Kaliningrad) and Ukraine - onshore between 22°30'E and
     * 25°30'E
     * Truncated form of Pulkovo 1942 / 3-degree Gauss-Kruger zone 8 (code 2524).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_CM_24E = 'urn:ogc:def:crs:EPSG::2583';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger CM 27E
     * Extent: Belarus, Estonia, Latvia, Lithuania, Moldova, Russia and Ukraine - onshore between 25°30'E and 28°30'E
     * Truncated form of Pulkovo 1942 / 3-degree Gauss-Kruger zone 9 (code 2525).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_CM_27E = 'urn:ogc:def:crs:EPSG::2584';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger CM 30E
     * Extent: Belarus, Moldova, Russia and Ukraine - onshore between 28°30'E and 31°30'E
     * Truncated form of Pulkovo 1942 / 3-degree Gauss-Kruger zone 10 (code 2526).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_CM_30E = 'urn:ogc:def:crs:EPSG::2585';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger CM 33E
     * Extent: Belarus, Russia and Ukraine - onshore between 31°30'E and 34°30'E
     * Truncated form of Pulkovo 1942 / 3-degree Gauss-Kruger zone 11 (code 2527).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_CM_33E = 'urn:ogc:def:crs:EPSG::2586';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger CM 36E
     * Extent: Russia and Ukraine - onshore between 34°30'E and 37°30'E
     * Truncated form of Pulkovo 1942 / 3-degree Gauss-Kruger zone 12 (code 2528).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_CM_36E = 'urn:ogc:def:crs:EPSG::2587';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger CM 39E
     * Extent: Georgia, Russia and Ukraine - onshore between 37°30'E and 40°30'E
     * Truncated form of Pulkovo 1942 / 3-degree Gauss-Kruger zone 13 (code 2529).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_CM_39E = 'urn:ogc:def:crs:EPSG::2588';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger CM 42E
     * Extent: Georgia, Russia - onshore between 40°30'E and 43°30'E
     * Truncated form of Pulkovo 1942 / 3-degree Gauss-Kruger zone 14 (code 2530).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_CM_42E = 'urn:ogc:def:crs:EPSG::2589';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger CM 45E
     * Extent: Armenia, Azerbaijan, Georgia and Russia onshore - between 43°30'E and 46°30'E
     * Truncated form of Pulkovo 1942 / 3-degree Gauss-Kruger zone 15 (code 2531).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_CM_45E = 'urn:ogc:def:crs:EPSG::2590';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger CM 48E
     * Extent: Azerbaijan, Georgia, Kazakhstan and Russia onshore - between 46°30'E and 49°30'E
     * Truncated form of Pulkovo 1942 / 3-degree Gauss-Kruger zone 16 (code 2532).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_CM_48E = 'urn:ogc:def:crs:EPSG::2591';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger CM 51E
     * Extent: Azerbaijan, Kazakhstan and Russia onshore - between 49°30'E and 52°30'E
     * Truncated form of Pulkovo 1942 / 3-degree Gauss-Kruger zone 17 (code 2533).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_CM_51E = 'urn:ogc:def:crs:EPSG::2592';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger CM 54E
     * Extent: Kazakhstan, Russia onshore and Turkmenistan - between 52°30'E and 55°30'E
     * Truncated form of Pulkovo 1942 / 3-degree Gauss-Kruger zone 18 (code 2534).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_CM_54E = 'urn:ogc:def:crs:EPSG::2593';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger CM 57E
     * Extent: Kazakhstan, Russia onshore, Turkmenistan and Uzbekistan - between 55°30'E and 58°30'E
     * Truncated form of Pulkovo 1942 / 3-degree Gauss-Kruger zone 19 (code 2535).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_CM_57E = 'urn:ogc:def:crs:EPSG::2594';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger CM 60E
     * Extent: Kazakhstan, Russia onshore, Turkmenistan and Uzbekistan - between 58°30'E and 61°30'E
     * Truncated form of Pulkovo 1942 / 3-degree Gauss-Kruger zone 20 (code 2536).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_CM_60E = 'urn:ogc:def:crs:EPSG::2595';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger CM 63E
     * Extent: Kazakhstan, Russia onshore, Turkmenistan and Uzbekistan - between 61°30'E and 64°30'E
     * Truncated form of Pulkovo 1942 / 3-degree Gauss-Kruger zone 21 (code 2537).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_CM_63E = 'urn:ogc:def:crs:EPSG::2596';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger CM 66E
     * Extent: Kazakhstan, Russia onshore, Tajikistan, Turkmenistan and Uzbekistan - between 64°30'E and 67°30'E
     * Truncated form of Pulkovo 1942 / 3-degree Gauss-Kruger zone 22 (code 2538).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_CM_66E = 'urn:ogc:def:crs:EPSG::2597';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger CM 69E
     * Extent: Kazakhstan, Kyrgyzstan, Russia onshore, Tajikistan and Uzbekistan - between 67°30'E and 70°30'E
     * Truncated form of Pulkovo 1942 / 3-degree Gauss-Kruger zone 23 (code 2539).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_CM_69E = 'urn:ogc:def:crs:EPSG::2598';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger CM 72E
     * Extent: Kazakhstan, Kyrgyzstan, Russia onshore, Tajikistan and Uzbekistan - between 70°30'E and 73°30'E
     * Truncated form of Pulkovo 1942 / 3-degree Gauss-Kruger zone 24 (code 2540).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_CM_72E = 'urn:ogc:def:crs:EPSG::2599';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger CM 75E
     * Extent: Kazakhstan, Kyrgyzstan, Russia onshore and Tajikistan - between 73°30'E and 76°30'E
     * Truncated form of Pulkovo 1942 / 3-degree Gauss-Kruger zone 25 (code 2541).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_CM_75E = 'urn:ogc:def:crs:EPSG::2601';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger CM 78E
     * Extent: Kazakhstan, Kyrgyzstan and Russia onshore - between 76°30'E and 79°30'E
     * Truncated form of Pulkovo 1942 / 3-degree Gauss-Kruger zone 26 (code 2542).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_CM_78E = 'urn:ogc:def:crs:EPSG::2602';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger CM 81E
     * Extent: Kazakhstan, Kyrgyzstan and Russia onshore - between 79°30'E and 82°30'E
     * Truncated form of Pulkovo 1942 / 3-degree Gauss-Kruger zone 27 (code 2543).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_CM_81E = 'urn:ogc:def:crs:EPSG::2603';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger CM 84E
     * Extent: Kazakhstan and Russia onshore - between 82°30'E and 85°30'E
     * Truncated form of Pulkovo 1942 / 3-degree Gauss-Kruger zone 28 (code 2544).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_CM_84E = 'urn:ogc:def:crs:EPSG::2604';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger CM 87E
     * Extent: Kazakhstan and Russia onshore - between 85°30'E and 88°30'E
     * Truncated form of Pulkovo 1942 / 3-degree Gauss-Kruger zone 29 (code 2545).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_CM_87E = 'urn:ogc:def:crs:EPSG::2605';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger CM 90E
     * Extent: Russia - onshore between 88°30'E and 91°30'E
     * Truncated form of Pulkovo 1942 / 3-degree Gauss-Kruger zone 30 (code 2546).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_CM_90E = 'urn:ogc:def:crs:EPSG::2606';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger CM 93E
     * Extent: Russia - onshore between 91°30'E and 94°30'E
     * Truncated form of Pulkovo 1942 / 3-degree Gauss-Kruger zone 31 (code 2547).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_CM_93E = 'urn:ogc:def:crs:EPSG::2607';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger CM 96E
     * Extent: Russia - onshore between 94°30'E and 97°30'E
     * Truncated form of Pulkovo 1942 / 3-degree Gauss-Kruger zone 32 (code 2548).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_CM_96E = 'urn:ogc:def:crs:EPSG::2608';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger CM 99E
     * Extent: Russia - onshore between 97°30'E and 100°30'E
     * Truncated form of Pulkovo 1942 / 3-degree Gauss-Kruger zone 33 (code 2549).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_CM_99E = 'urn:ogc:def:crs:EPSG::2609';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger zone 10
     * Extent: Belarus, Moldova, Russia and Ukraine - onshore between 28°30'E and 31°30'E
     * Also found with truncated false easting - see Pulkovo 1942 / 3-degree Gauss-Kruger CM 30E (code 2585).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_ZONE_10 = 'urn:ogc:def:crs:EPSG::2526';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger zone 11
     * Extent: Belarus, Russia and Ukraine - onshore between 31°30'E and 34°30'E
     * Also found with truncated false easting - see Pulkovo 1942 / 3-degree Gauss-Kruger CM 33E (code 2586).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_ZONE_11 = 'urn:ogc:def:crs:EPSG::2527';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger zone 12
     * Extent: Russia and Ukraine - onshore between 34°30'E and 37°30'E
     * Also found with truncated false easting - see Pulkovo 1942 / 3-degree Gauss-Kruger CM 36E (code 2587).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_ZONE_12 = 'urn:ogc:def:crs:EPSG::2528';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger zone 13
     * Extent: Georgia, Russia and Ukraine - onshore between 37°30'E and 40°30'E
     * Also found with truncated false easting - see Pulkovo 1942 / 3-degree Gauss-Kruger CM 39E (code 2588).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_ZONE_13 = 'urn:ogc:def:crs:EPSG::2529';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger zone 14
     * Extent: Georgia, Russia - onshore between 40°30'E and 43°30'E
     * Also found with truncated false easting - see Pulkovo 1942 / 3-degree Gauss-Kruger CM 42E (code 2589).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_ZONE_14 = 'urn:ogc:def:crs:EPSG::2530';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger zone 15
     * Extent: Armenia, Azerbaijan, Georgia and Russia onshore - between 43°30'E and 46°30'E
     * Also found with truncated false easting - see Pulkovo 1942 / 3-degree Gauss-Kruger CM 45E (code 2590).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_ZONE_15 = 'urn:ogc:def:crs:EPSG::2531';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger zone 16
     * Extent: Azerbaijan, Georgia, Kazakhstan and Russia onshore - between 46°30'E and 49°30'E
     * Also found with truncated false easting - see Pulkovo 1942 / 3-degree Gauss-Kruger CM 48E (code 2591).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_ZONE_16 = 'urn:ogc:def:crs:EPSG::2532';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger zone 17
     * Extent: Azerbaijan, Kazakhstan and Russia onshore - between 49°30'E and 52°30'E
     * Also found with truncated false easting - see Pulkovo 1942 / 3-degree Gauss-Kruger CM 51E (code 2592).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_ZONE_17 = 'urn:ogc:def:crs:EPSG::2533';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger zone 18
     * Extent: Kazakhstan, Russia onshore and Turkmenistan - between 52°30'E and 55°30'E
     * Also found with truncated false easting - see Pulkovo 1942 / 3-degree Gauss-Kruger CM 54E (code 2593).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_ZONE_18 = 'urn:ogc:def:crs:EPSG::2534';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger zone 19
     * Extent: Kazakhstan, Russia onshore, Turkmenistan and Uzbekistan - between 55°30'E and 58°30'E
     * Also found with truncated false easting - see Pulkovo 1942 / 3-degree Gauss-Kruger CM 57E (code 2594).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_ZONE_19 = 'urn:ogc:def:crs:EPSG::2535';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger zone 20
     * Extent: Kazakhstan, Russia onshore, Turkmenistan and Uzbekistan - between 58°30'E and 61°30'E
     * Also found with truncated false easting - see Pulkovo 1942 / 3-degree Gauss-Kruger CM 60E (code 2595).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_ZONE_20 = 'urn:ogc:def:crs:EPSG::2536';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger zone 21
     * Extent: Kazakhstan, Russia onshore, Turkmenistan and Uzbekistan - between 61°30'E and 64°30'E
     * Also found with truncated false easting - see Pulkovo 1942 / 3-degree Gauss-Kruger CM 63E (code 2596).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_ZONE_21 = 'urn:ogc:def:crs:EPSG::2537';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger zone 22
     * Extent: Kazakhstan, Russia onshore, Tajikistan, Turkmenistan and Uzbekistan - between 64°30'E and 67°30'E
     * Also found with truncated false easting - see Pulkovo 1942 / 3-degree Gauss-Kruger CM 66E (code 2597).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_ZONE_22 = 'urn:ogc:def:crs:EPSG::2538';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger zone 23
     * Extent: Kazakhstan, Kyrgyzstan, Russia onshore, Tajikistan and Uzbekistan - between 67°30'E and 70°30'E
     * Also found with truncated false easting - see Pulkovo 1942 / 3-degree Gauss-Kruger CM 69E (code 2598).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_ZONE_23 = 'urn:ogc:def:crs:EPSG::2539';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger zone 24
     * Extent: Kazakhstan, Kyrgyzstan, Russia onshore, Tajikistan and Uzbekistan - between 70°30'E and 73°30'E
     * Also found with truncated false easting - see Pulkovo 1942 / 3-degree Gauss-Kruger CM 72E (code 2599).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_ZONE_24 = 'urn:ogc:def:crs:EPSG::2540';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger zone 25
     * Extent: Kazakhstan, Kyrgyzstan, Russia onshore and Tajikistan - between 73°30'E and 76°30'E
     * Also found with truncated false easting - see Pulkovo 1942 / 3-degree Gauss-Kruger CM 75E (code 2601).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_ZONE_25 = 'urn:ogc:def:crs:EPSG::2541';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger zone 26
     * Extent: Kazakhstan, Kyrgyzstan and Russia onshore - between 76°30'E and 79°30'E
     * Also found with truncated false easting - see Pulkovo 1942 / 3-degree Gauss-Kruger CM 78E (code 2602).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_ZONE_26 = 'urn:ogc:def:crs:EPSG::2542';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger zone 27
     * Extent: Kazakhstan, Kyrgyzstan and Russia onshore - between 79°30'E and 82°30'E
     * Also found with truncated false easting - see Pulkovo 1942 / 3-degree Gauss-Kruger CM 81E (code 2603).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_ZONE_27 = 'urn:ogc:def:crs:EPSG::2543';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger zone 28
     * Extent: Kazakhstan and Russia onshore - between 82°30'E and 85°30'E
     * Also found with truncated false easting - see Pulkovo 1942 / 3-degree Gauss-Kruger CM 84E (code 2604).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_ZONE_28 = 'urn:ogc:def:crs:EPSG::2544';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger zone 29
     * Extent: Kazakhstan and Russia onshore - between 85°30'E and 88°30'E
     * Also found with truncated false easting - see Pulkovo 1942 / 3-degree Gauss-Kruger CM 87E (code 2605).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_ZONE_29 = 'urn:ogc:def:crs:EPSG::2545';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger zone 30
     * Extent: Russia - onshore between 88°30'E and 91°30'E
     * Also found with truncated false easting - see Pulkovo 1942 / 3-degree Gauss-Kruger CM 90E (code 2606).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_ZONE_30 = 'urn:ogc:def:crs:EPSG::2546';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger zone 31
     * Extent: Russia - onshore between 91°30'E and 94°30'E
     * Also found with truncated false easting - see Pulkovo 1942 / 3-degree Gauss-Kruger CM 93E (code 2607).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_ZONE_31 = 'urn:ogc:def:crs:EPSG::2547';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger zone 32
     * Extent: Russia - onshore between 94°30'E and 97°30'E
     * Also found with truncated false easting - see Pulkovo 1942 / 3-degree Gauss-Kruger CM 96E (code 2608).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_ZONE_32 = 'urn:ogc:def:crs:EPSG::2548';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger zone 33
     * Extent: Russia - onshore between 97°30'E and 100°30'E
     * Also found with truncated false easting - see Pulkovo 1942 / 3-degree Gauss-Kruger CM 99E (code 2609).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_ZONE_33 = 'urn:ogc:def:crs:EPSG::2549';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger zone 34
     * Extent: Russia - onshore between 100°30'E and 103°30'E
     * Also found with truncated false easting - see Pulkovo 1942 / 3-degree Gauss-Kruger CM 102E (code 2610).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_ZONE_34 = 'urn:ogc:def:crs:EPSG::2551';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger zone 35
     * Extent: Russia - onshore between 103°30'E and 106°30'E
     * Also found with truncated false easting - see Pulkovo 1942 / 3-degree Gauss-Kruger CM 105E (code 2611).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_ZONE_35 = 'urn:ogc:def:crs:EPSG::2552';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger zone 36
     * Extent: Russia - onshore between 106°30'E and 109°30'E
     * Also found with truncated false easting - see Pulkovo 1942 / 3-degree Gauss-Kruger CM 108E (code 2612).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_ZONE_36 = 'urn:ogc:def:crs:EPSG::2553';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger zone 37
     * Extent: Russia - onshore between 109°30'E and 112°30'E
     * Also found with truncated false easting - see Pulkovo 1942 / 3-degree Gauss-Kruger CM 111E (code 2613).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_ZONE_37 = 'urn:ogc:def:crs:EPSG::2554';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger zone 38
     * Extent: Russia - onshore between 112°30'E and 115°30'E
     * Also found with truncated false easting - see Pulkovo 1942 / 3-degree Gauss-Kruger CM 114E (code 2614).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_ZONE_38 = 'urn:ogc:def:crs:EPSG::2555';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger zone 39
     * Extent: Russia - onshore between 115°30'E and 118°30'E
     * Also found with truncated false easting - see Pulkovo 1942 / 3-degree Gauss-Kruger CM 117E (code 2615).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_ZONE_39 = 'urn:ogc:def:crs:EPSG::2556';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger zone 40
     * Extent: Russia - onshore between 118°30'E and 121°30'E
     * Also found with truncated false easting - see Pulkovo 1942 / 3-degree Gauss-Kruger CM 120E (code 2616).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_ZONE_40 = 'urn:ogc:def:crs:EPSG::2557';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger zone 41
     * Extent: Russia - onshore between 121°30'E and 124°30'E
     * Also found with truncated false easting - see Pulkovo 1942 / 3-degree Gauss-Kruger CM 123E (code 2617).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_ZONE_41 = 'urn:ogc:def:crs:EPSG::2558';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger zone 42
     * Extent: Russia - onshore between 124°30'E and 127°30'E
     * Also found with truncated false easting - see Pulkovo 1942 / 3-degree Gauss-Kruger CM 126E (code 2618).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_ZONE_42 = 'urn:ogc:def:crs:EPSG::2559';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger zone 43
     * Extent: Russia - onshore between 127°30'E and 130°30'E
     * Also found with truncated false easting - see Pulkovo 1942 / 3-degree Gauss-Kruger CM 129E (code 2619).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_ZONE_43 = 'urn:ogc:def:crs:EPSG::2560';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger zone 44
     * Extent: Russia - onshore between 130°30'E and 133°30'E
     * Also found with truncated false easting - see Pulkovo 1942 / 3-degree Gauss-Kruger CM 132E (code 2620).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_ZONE_44 = 'urn:ogc:def:crs:EPSG::2561';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger zone 45
     * Extent: Russia - onshore between 133°30'E and 136°30'E
     * Also found with truncated false easting - see Pulkovo 1942 / 3-degree Gauss-Kruger CM 135E (code 2621).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_ZONE_45 = 'urn:ogc:def:crs:EPSG::2562';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger zone 46
     * Extent: Russia - onshore between 136°30'E and 139°30'E
     * Also found with truncated false easting - see Pulkovo 1942 / 3-degree Gauss-Kruger CM 138E (code 2622).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_ZONE_46 = 'urn:ogc:def:crs:EPSG::2563';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger zone 47
     * Extent: Russia - onshore between 139°30'E and 142°30'E
     * Also found with truncated false easting - see Pulkovo 1942 / 3-degree Gauss-Kruger CM 141E (code 2623).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_ZONE_47 = 'urn:ogc:def:crs:EPSG::2564';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger zone 48
     * Extent: Russia - onshore between 142°30'E and 145°30'E
     * Also found with truncated false easting - see Pulkovo 1942 / 3-degree Gauss-Kruger CM 144E (code 2624).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_ZONE_48 = 'urn:ogc:def:crs:EPSG::2565';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger zone 49
     * Extent: Russia - onshore between 145°30'E and 148°30'E
     * Also found with truncated false easting - see Pulkovo 1942 / 3-degree Gauss-Kruger CM 147E (code 2625).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_ZONE_49 = 'urn:ogc:def:crs:EPSG::2566';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger zone 50
     * Extent: Russia - onshore between 148°30'E and 151°30'E
     * Also found with truncated false easting - see Pulkovo 1942 / 3-degree Gauss-Kruger CM 150E (code 2626).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_ZONE_50 = 'urn:ogc:def:crs:EPSG::2567';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger zone 51
     * Extent: Russia - onshore between 151°30'E and 154°30'E
     * Also found with truncated false easting - see Pulkovo 1942 / 3-degree Gauss-Kruger CM 153E (code 2627).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_ZONE_51 = 'urn:ogc:def:crs:EPSG::2568';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger zone 52
     * Extent: Russia - onshore between 154°30'E and 157°30'E
     * Also found with truncated false easting - see Pulkovo 1942 / 3-degree Gauss-Kruger CM 156E (code 2628).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_ZONE_52 = 'urn:ogc:def:crs:EPSG::2569';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger zone 53
     * Extent: Russia - onshore between 157°30'E and 160°30'E
     * Also found with truncated false easting - see Pulkovo 1942 / 3-degree Gauss-Kruger CM 159E (code 2629).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_ZONE_53 = 'urn:ogc:def:crs:EPSG::2570';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger zone 54
     * Extent: Russia - onshore between 160°30'E and 163°30'E
     * Also found with truncated false easting - see Pulkovo 1942 / 3-degree Gauss-Kruger CM 162E (code 2630).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_ZONE_54 = 'urn:ogc:def:crs:EPSG::2571';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger zone 55
     * Extent: Russia - onshore between 163°30'E and 166°30'E
     * Also found with truncated false easting - see Pulkovo 1942 / 3-degree Gauss-Kruger CM 165E (code 2631).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_ZONE_55 = 'urn:ogc:def:crs:EPSG::2572';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger zone 56
     * Extent: Russia - onshore between 166°30'E and 169°30'E
     * Also found with truncated false easting - see Pulkovo 1942 / 3-degree Gauss-Kruger CM 168E (code 2632).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_ZONE_56 = 'urn:ogc:def:crs:EPSG::2573';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger zone 57
     * Extent: Russia - onshore between 169°30'E and 172°30'E
     * Also found with truncated false easting - see Pulkovo 1942 / 3-degree Gauss-Kruger CM 171E (code 2633).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_ZONE_57 = 'urn:ogc:def:crs:EPSG::2574';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger zone 58
     * Extent: Russia - onshore between 172°30'E and 175°30'E
     * Also found with truncated false easting - see Pulkovo 1942 / 3-degree Gauss-Kruger CM 174E (code 2634).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_ZONE_58 = 'urn:ogc:def:crs:EPSG::2575';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger zone 59
     * Extent: Russia - onshore between 175°30'E and 178°30'E
     * Also found with truncated false easting - see Pulkovo 1942 / 3-degree Gauss-Kruger CM 177E (code 2635).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_ZONE_59 = 'urn:ogc:def:crs:EPSG::2576';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger zone 60
     * Extent: Russia - onshore between 178°30'E and 178°30'W
     * Also found with truncated false easting - see Pulkovo 1942 / 3-degree Gauss-Kruger CM 180E (code 2636).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_ZONE_60 = 'urn:ogc:def:crs:EPSG::3389';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger zone 61
     * Extent: Russia - onshore between 178°30'W and 175°30'W
     * Also found with truncated false easting - see Pulkovo 1942 / 3-degree Gauss-Kruger CM 177W (code 2637).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_ZONE_61 = 'urn:ogc:def:crs:EPSG::2578';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger zone 62
     * Extent: Russia - onshore between 175°30'W and 172°30'W
     * Also found with truncated false easting - see Pulkovo 1942 / 3-degree Gauss-Kruger CM 174W (code 2638).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_ZONE_62 = 'urn:ogc:def:crs:EPSG::2579';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger zone 63
     * Extent: Russia - onshore between 172°30'W and 169°30'W
     * Also found with truncated false easting - see Pulkovo 1942 / 3-degree Gauss-Kruger CM 171W (code 2639).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_ZONE_63 = 'urn:ogc:def:crs:EPSG::2580';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger zone 64
     * Extent: Russia - onshore between 169°30'W and 166°30'W
     * Also found with truncated false easting - see Pulkovo 1942 / 3-degree Gauss-Kruger CM 168W (code 2640).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_ZONE_64 = 'urn:ogc:def:crs:EPSG::2581';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger zone 7
     * Extent: Estonia, Latvia, Lithuania, Russia (Kaliningrad) and Ukraine - onshore between 19°30'E and 22°30'E
     * Also found with truncated false easting - see Pulkovo 1942 / 3-degree Gauss-Kruger CM 21E (code 2582).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_ZONE_7 = 'urn:ogc:def:crs:EPSG::2523';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger zone 8
     * Extent: Belarus, Estonia, Latvia, Lithuania, Russia (Kaliningrad) and Ukraine - onshore between 22°30'E and
     * 25°30'E
     * Also found with truncated false easting - see Pulkovo 1942 / 3-degree Gauss-Kruger CM 24E (code 2583).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_ZONE_8 = 'urn:ogc:def:crs:EPSG::2524';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger zone 9
     * Extent: Belarus, Estonia, Latvia, Lithuania, Moldova, Russia and Ukraine - onshore between 25°30'E and 28°30'E
     * Also found with truncated false easting - see Pulkovo 1942 / 3-degree Gauss-Kruger CM 27E (code 2584).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_ZONE_9 = 'urn:ogc:def:crs:EPSG::2525';

    /**
     * Pulkovo 1942 / CS63 zone A1
     * Extent: Armenia and Georgia onshore west of 43°02'E.
     */
    public const EPSG_PULKOVO_1942_CS63_ZONE_A1 = 'urn:ogc:def:crs:EPSG::2935';

    /**
     * Pulkovo 1942 / CS63 zone A2
     * Extent: Armenia and Georgia between 43°02'E and 46°02'E; Azerbaijan west of 46°02'E.
     */
    public const EPSG_PULKOVO_1942_CS63_ZONE_A2 = 'urn:ogc:def:crs:EPSG::2936';

    /**
     * Pulkovo 1942 / CS63 zone A3
     * Extent: Armenia and Georgia east of 46°02'E; Azerbaijan between 46°02' and 49°02'E.
     */
    public const EPSG_PULKOVO_1942_CS63_ZONE_A3 = 'urn:ogc:def:crs:EPSG::2937';

    /**
     * Pulkovo 1942 / CS63 zone A4
     * Extent: Azerbaijan east of 49°02'E.
     */
    public const EPSG_PULKOVO_1942_CS63_ZONE_A4 = 'urn:ogc:def:crs:EPSG::2938';

    /**
     * Pulkovo 1942 / CS63 zone C0
     * Extent: Estonia, Latvia and Lithuania - onshore west of 23°27'E. Russia - Kaliningrad onshore.
     */
    public const EPSG_PULKOVO_1942_CS63_ZONE_C0 = 'urn:ogc:def:crs:EPSG::3350';

    /**
     * Pulkovo 1942 / CS63 zone C1
     * Extent: Estonia, Latvia and Lithuania - onshore between 23°27'E and 26°27'E.
     */
    public const EPSG_PULKOVO_1942_CS63_ZONE_C1 = 'urn:ogc:def:crs:EPSG::3351';

    /**
     * Pulkovo 1942 / CS63 zone C2
     * Extent: Estonia, Latvia and Lithuania - onshore east of 26°27'E.
     */
    public const EPSG_PULKOVO_1942_CS63_ZONE_C2 = 'urn:ogc:def:crs:EPSG::3352';

    /**
     * Pulkovo 1942 / CS63 zone K2
     * Extent: Kazakhstan between 49°16'E and 52°16'E.
     */
    public const EPSG_PULKOVO_1942_CS63_ZONE_K2 = 'urn:ogc:def:crs:EPSG::2939';

    /**
     * Pulkovo 1942 / CS63 zone K3
     * Extent: Kazakhstan between 52°16'E and 55°16'E.
     */
    public const EPSG_PULKOVO_1942_CS63_ZONE_K3 = 'urn:ogc:def:crs:EPSG::2940';

    /**
     * Pulkovo 1942 / CS63 zone K4
     * Extent: Kazakhstan between 55°16'E and 58°16'E.
     */
    public const EPSG_PULKOVO_1942_CS63_ZONE_K4 = 'urn:ogc:def:crs:EPSG::2941';

    /**
     * Pulkovo 1942 / CS63 zone X1
     * Extent: Ukraine - west of 25°E.
     */
    public const EPSG_PULKOVO_1942_CS63_ZONE_X1 = 'urn:ogc:def:crs:EPSG::7825';

    /**
     * Pulkovo 1942 / CS63 zone X2
     * Extent: Ukraine - between 25°E and 28°E.
     */
    public const EPSG_PULKOVO_1942_CS63_ZONE_X2 = 'urn:ogc:def:crs:EPSG::7826';

    /**
     * Pulkovo 1942 / CS63 zone X3
     * Extent: Ukraine - between 28°E and 31°E, onshore.
     */
    public const EPSG_PULKOVO_1942_CS63_ZONE_X3 = 'urn:ogc:def:crs:EPSG::7827';

    /**
     * Pulkovo 1942 / CS63 zone X4
     * Extent: Ukraine - between 31°E and 34°E, onshore.
     */
    public const EPSG_PULKOVO_1942_CS63_ZONE_X4 = 'urn:ogc:def:crs:EPSG::7828';

    /**
     * Pulkovo 1942 / CS63 zone X5
     * Extent: Ukraine - between 34°E and 37°E, onshore.
     */
    public const EPSG_PULKOVO_1942_CS63_ZONE_X5 = 'urn:ogc:def:crs:EPSG::7829';

    /**
     * Pulkovo 1942 / CS63 zone X6
     * Extent: Ukraine - between 37°E and 40°E, onshore.
     */
    public const EPSG_PULKOVO_1942_CS63_ZONE_X6 = 'urn:ogc:def:crs:EPSG::7830';

    /**
     * Pulkovo 1942 / CS63 zone X7
     * Extent: Ukraine - east of 40°E.
     */
    public const EPSG_PULKOVO_1942_CS63_ZONE_X7 = 'urn:ogc:def:crs:EPSG::7831';

    /**
     * Pulkovo 1942 / Caspian Sea Mercator
     * Extent: Azerbaijan - offshore; Kazakhstan - offshore; Russia - Caspian Sea; Turkmenistan - offshore.
     */
    public const EPSG_PULKOVO_1942_CASPIAN_SEA_MERCATOR = 'urn:ogc:def:crs:EPSG::3388';

    /**
     * Pulkovo 1942 / Gauss-Kruger CM 105E
     * Extent: Russia - onshore between 102°E and 108°E
     * Truncated form of Pulkovo 1942 / Gauss-Kruger zone 18 (code 28418).
     */
    public const EPSG_PULKOVO_1942_GAUSS_KRUGER_CM_105E = 'urn:ogc:def:crs:EPSG::2508';

    /**
     * Pulkovo 1942 / Gauss-Kruger CM 111E
     * Extent: Russia - onshore between 108°E and 114°E
     * Truncated form of Pulkovo 1942 / Gauss-Kruger zone 19 (code 28419).
     */
    public const EPSG_PULKOVO_1942_GAUSS_KRUGER_CM_111E = 'urn:ogc:def:crs:EPSG::2509';

    /**
     * Pulkovo 1942 / Gauss-Kruger CM 117E
     * Extent: Russia - onshore between 114°E and 120°E
     * Truncated form of Pulkovo 1942 / Gauss-Kruger zone 20 (code 28420).
     */
    public const EPSG_PULKOVO_1942_GAUSS_KRUGER_CM_117E = 'urn:ogc:def:crs:EPSG::2510';

    /**
     * Pulkovo 1942 / Gauss-Kruger CM 123E
     * Extent: Russia - onshore between 120°E and 126°E
     * Truncated form of Pulkovo 1942 / Gauss-Kruger zone 21 (code 28421).
     */
    public const EPSG_PULKOVO_1942_GAUSS_KRUGER_CM_123E = 'urn:ogc:def:crs:EPSG::2511';

    /**
     * Pulkovo 1942 / Gauss-Kruger CM 129E
     * Extent: Russia - onshore between 126°E and 132°E
     * Truncated form of Pulkovo 1942 / Gauss-Kruger zone 22 (code 28422).
     */
    public const EPSG_PULKOVO_1942_GAUSS_KRUGER_CM_129E = 'urn:ogc:def:crs:EPSG::2512';

    /**
     * Pulkovo 1942 / Gauss-Kruger CM 135E
     * Extent: Russia - onshore between 132°E and 138°E
     * Truncated form of Pulkovo 1942 / Gauss-Kruger zone 23 (code 28423).
     */
    public const EPSG_PULKOVO_1942_GAUSS_KRUGER_CM_135E = 'urn:ogc:def:crs:EPSG::2513';

    /**
     * Pulkovo 1942 / Gauss-Kruger CM 141E
     * Extent: Russia - onshore between 138°E and 144°E
     * Truncated form of Pulkovo 1942 / Gauss-Kruger zone 24 (code 28424).
     */
    public const EPSG_PULKOVO_1942_GAUSS_KRUGER_CM_141E = 'urn:ogc:def:crs:EPSG::2514';

    /**
     * Pulkovo 1942 / Gauss-Kruger CM 147E
     * Extent: Russia - onshore between 144°E and 150°E
     * Truncated form of Pulkovo 1942 / Gauss-Kruger zone 25 (code 28425).
     */
    public const EPSG_PULKOVO_1942_GAUSS_KRUGER_CM_147E = 'urn:ogc:def:crs:EPSG::2515';

    /**
     * Pulkovo 1942 / Gauss-Kruger CM 153E
     * Extent: Russia - onshore between 150°E and 156°E
     * Truncated form of Pulkovo 1942 / Gauss-Kruger zone 26 (code 28426).
     */
    public const EPSG_PULKOVO_1942_GAUSS_KRUGER_CM_153E = 'urn:ogc:def:crs:EPSG::2516';

    /**
     * Pulkovo 1942 / Gauss-Kruger CM 159E
     * Extent: Russia - onshore between 156°E and 162°E
     * Truncated form of Pulkovo 1942 / Gauss-Kruger zone 27 (code 28427).
     */
    public const EPSG_PULKOVO_1942_GAUSS_KRUGER_CM_159E = 'urn:ogc:def:crs:EPSG::2517';

    /**
     * Pulkovo 1942 / Gauss-Kruger CM 165E
     * Extent: Russia - onshore between 162°E and 168°E
     * Truncated form of Pulkovo 1942 / Gauss-Kruger zone 28 (code 28428).
     */
    public const EPSG_PULKOVO_1942_GAUSS_KRUGER_CM_165E = 'urn:ogc:def:crs:EPSG::2518';

    /**
     * Pulkovo 1942 / Gauss-Kruger CM 171E
     * Extent: Russia - onshore between 168°E and 174°E
     * Truncated form of Pulkovo 1942 / Gauss-Kruger zone 29 (code 28429).
     */
    public const EPSG_PULKOVO_1942_GAUSS_KRUGER_CM_171E = 'urn:ogc:def:crs:EPSG::2519';

    /**
     * Pulkovo 1942 / Gauss-Kruger CM 171W
     * Extent: Russia - onshore east of 174°W
     * Truncated form of Pulkovo 1942 / Gauss-Kruger zone 32 (code 28432).
     */
    public const EPSG_PULKOVO_1942_GAUSS_KRUGER_CM_171W = 'urn:ogc:def:crs:EPSG::2522';

    /**
     * Pulkovo 1942 / Gauss-Kruger CM 177E
     * Extent: Russia - onshore between 174°E and 180°E
     * Truncated form of Pulkovo 1942 / Gauss-Kruger zone 30 (code 28430).
     */
    public const EPSG_PULKOVO_1942_GAUSS_KRUGER_CM_177E = 'urn:ogc:def:crs:EPSG::2520';

    /**
     * Pulkovo 1942 / Gauss-Kruger CM 177W
     * Extent: Russia - onshore between 180°E and 174°W
     * Truncated form of Pulkovo 1942 / Gauss-Kruger zone 31 (code 28431).
     */
    public const EPSG_PULKOVO_1942_GAUSS_KRUGER_CM_177W = 'urn:ogc:def:crs:EPSG::2521';

    /**
     * Pulkovo 1942 / Gauss-Kruger CM 21E
     * Extent: Belarus, Estonia, Latvia, Lithuania and Ukraine - onshore west of 24°E. Russia - Kaliningrad onshore
     * Truncated form of Pulkovo 1942 / Gauss-Kruger zone 4 (code 28404).
     */
    public const EPSG_PULKOVO_1942_GAUSS_KRUGER_CM_21E = 'urn:ogc:def:crs:EPSG::2494';

    /**
     * Pulkovo 1942 / Gauss-Kruger CM 27E
     * Extent: Estonia; Latvia and Lithuania - onshore east of 24°E; Belarus, Moldova, Russia and Ukraine - onshore
     * 24°E to 30°E
     * Truncated form of Pulkovo 1942 / Gauss-Kruger zone 5 (code 28405).
     */
    public const EPSG_PULKOVO_1942_GAUSS_KRUGER_CM_27E = 'urn:ogc:def:crs:EPSG::2495';

    /**
     * Pulkovo 1942 / Gauss-Kruger CM 33E
     * Extent: Belarus and Moldova - east of 30°E; Russia and Ukraine - onshore 30°E to 36°E
     * Truncated form of Pulkovo 1942 / Gauss-Kruger zone 6 (code 28406).
     */
    public const EPSG_PULKOVO_1942_GAUSS_KRUGER_CM_33E = 'urn:ogc:def:crs:EPSG::2496';

    /**
     * Pulkovo 1942 / Gauss-Kruger CM 39E
     * Extent: Georgia - onshore west of 36°E; Russia - onshore 36°E to 42°E; Ukraine - onshore east of 36°E
     * Truncated form of Pulkovo 1942 / Gauss-Kruger zone 7 (code 28407).
     */
    public const EPSG_PULKOVO_1942_GAUSS_KRUGER_CM_39E = 'urn:ogc:def:crs:EPSG::2497';

    /**
     * Pulkovo 1942 / Gauss-Kruger CM 45E
     * Extent: Armenia - west of 48°E; Azerbaijan - west of 48°E; Georgia - east of 42°E; Kazakhstan - west of
     * 48°E; Russia - onshore 42°E to 48°E
     * Truncated form of Pulkovo 1942 / Gauss-Kruger zone 8 (code 28408).
     */
    public const EPSG_PULKOVO_1942_GAUSS_KRUGER_CM_45E = 'urn:ogc:def:crs:EPSG::2498';

    /**
     * Pulkovo 1942 / Gauss-Kruger CM 51E
     * Extent: Azerbaijan - east of 48°E; Kazakhstan - 48°E to 54°E; Russia - 48°E to 54°E; Turkmenistan - west of
     * 54°E. Includes Caspian Sea (considered a lake rather than offshore)
     * Truncated form of Pulkovo 1942 / Gauss-Kruger zone 9 (code 28409).
     */
    public const EPSG_PULKOVO_1942_GAUSS_KRUGER_CM_51E = 'urn:ogc:def:crs:EPSG::2499';

    /**
     * Pulkovo 1942 / Gauss-Kruger CM 57E
     * Extent: Kazakhstan; Russia - onshore; Turkmenistan - 54°E to 60°E; Uzbekistan - west of 60°E
     * Truncated form of Pulkovo 1942 / Gauss-Kruger zone 10 (code 28410).
     */
    public const EPSG_PULKOVO_1942_GAUSS_KRUGER_CM_57E = 'urn:ogc:def:crs:EPSG::2500';

    /**
     * Pulkovo 1942 / Gauss-Kruger CM 63E
     * Extent: Kazakhstan; Russia - onshore; Uzbekistan - 60°E to 66°E; Turkmenistan - east of 60°E
     * Truncated form of Pulkovo 1942 / Gauss-Kruger zone 11 (code 28411).
     */
    public const EPSG_PULKOVO_1942_GAUSS_KRUGER_CM_63E = 'urn:ogc:def:crs:EPSG::2501';

    /**
     * Pulkovo 1942 / Gauss-Kruger CM 69E
     * Extent: Kazakhstan, Russia onshore and Uzbekistan - 66°E to 72°E; Kyrgyzstan and Tajikistan - west of 72°E
     * Truncated form of Pulkovo 1942 / Gauss-Kruger zone 12 (code 28412).
     */
    public const EPSG_PULKOVO_1942_GAUSS_KRUGER_CM_69E = 'urn:ogc:def:crs:EPSG::2502';

    /**
     * Pulkovo 1942 / Gauss-Kruger CM 75E
     * Extent: Kazakhstan; Kyrgyzstan; Russia onshore - 72°E to 78°E; Tajikistan and Uzbekistan - east of 72°E
     * Truncated form of Pulkovo 1942 / Gauss-Kruger zone 13 (code 28413).
     */
    public const EPSG_PULKOVO_1942_GAUSS_KRUGER_CM_75E = 'urn:ogc:def:crs:EPSG::2503';

    /**
     * Pulkovo 1942 / Gauss-Kruger CM 81E
     * Extent: Kazakhstan and Russia onshore - 78°E to 84°E; Kyrgyzstan - east of 78°E
     * Truncated form of Pulkovo 1942 / Gauss-Kruger zone 14 (code 28414).
     */
    public const EPSG_PULKOVO_1942_GAUSS_KRUGER_CM_81E = 'urn:ogc:def:crs:EPSG::2504';

    /**
     * Pulkovo 1942 / Gauss-Kruger CM 87E
     * Extent: Kazakhstan - east of 84°E; Russia - onshore 84°E to 90°E
     * Truncated form of Pulkovo 1942 / Gauss-Kruger zone 15 (code 28415).
     */
    public const EPSG_PULKOVO_1942_GAUSS_KRUGER_CM_87E = 'urn:ogc:def:crs:EPSG::2505';

    /**
     * Pulkovo 1942 / Gauss-Kruger CM 93E
     * Extent: Russia - onshore between 90°E and 96°E
     * Truncated form of Pulkovo 1942 / Gauss-Kruger zone 16 (code 28416).
     */
    public const EPSG_PULKOVO_1942_GAUSS_KRUGER_CM_93E = 'urn:ogc:def:crs:EPSG::2506';

    /**
     * Pulkovo 1942 / Gauss-Kruger CM 99E
     * Extent: Russia - onshore between 96°E and 102°E
     * Truncated form of Pulkovo 1942 / Gauss-Kruger zone 17 (code 28417).
     */
    public const EPSG_PULKOVO_1942_GAUSS_KRUGER_CM_99E = 'urn:ogc:def:crs:EPSG::2507';

    /**
     * Pulkovo 1942 / Gauss-Kruger zone 10
     * Extent: Kazakhstan; Russia - onshore; Turkmenistan - 54°E to 60°E; Uzbekistan - west of 60°E
     * Also found with truncated false easting - see Pulkovo 1942 / Gauss-Kruger CM 57E (code 2500).
     */
    public const EPSG_PULKOVO_1942_GAUSS_KRUGER_ZONE_10 = 'urn:ogc:def:crs:EPSG::28410';

    /**
     * Pulkovo 1942 / Gauss-Kruger zone 11
     * Extent: Kazakhstan; Russia - onshore; Uzbekistan - 60°E to 66°E; Turkmenistan - east of 60°E
     * Also found with truncated false easting - see Pulkovo 1942 / Gauss-Kruger CM 63E (code 2501).
     */
    public const EPSG_PULKOVO_1942_GAUSS_KRUGER_ZONE_11 = 'urn:ogc:def:crs:EPSG::28411';

    /**
     * Pulkovo 1942 / Gauss-Kruger zone 12
     * Extent: Kazakhstan, Russia onshore and Uzbekistan - 66°E to 72°E; Kyrgyzstan and Tajikistan - west of 72°E
     * Also found with truncated false easting - see Pulkovo 1942 / Gauss-Kruger CM 69E (code 2502).
     */
    public const EPSG_PULKOVO_1942_GAUSS_KRUGER_ZONE_12 = 'urn:ogc:def:crs:EPSG::28412';

    /**
     * Pulkovo 1942 / Gauss-Kruger zone 13
     * Extent: Kazakhstan; Kyrgyzstan; Russia onshore - 72°E to 78°E; Tajikistan and Uzbekistan - east of 72°E
     * Also found with truncated false easting - see Pulkovo 1942 / Gauss-Kruger CM 75E (code 2503).
     */
    public const EPSG_PULKOVO_1942_GAUSS_KRUGER_ZONE_13 = 'urn:ogc:def:crs:EPSG::28413';

    /**
     * Pulkovo 1942 / Gauss-Kruger zone 14
     * Extent: Kazakhstan and Russia onshore - 78°E to 84°E; Kyrgyzstan - east of 78°E
     * Also found with truncated false easting - see Pulkovo 1942 / Gauss-Kruger CM 81E (code 2504).
     */
    public const EPSG_PULKOVO_1942_GAUSS_KRUGER_ZONE_14 = 'urn:ogc:def:crs:EPSG::28414';

    /**
     * Pulkovo 1942 / Gauss-Kruger zone 15
     * Extent: Kazakhstan - east of 84°E; Russia - onshore 84°E to 90°E
     * Also found with truncated false easting - see Pulkovo 1942 / Gauss-Kruger CM 87E (code 2505).
     */
    public const EPSG_PULKOVO_1942_GAUSS_KRUGER_ZONE_15 = 'urn:ogc:def:crs:EPSG::28415';

    /**
     * Pulkovo 1942 / Gauss-Kruger zone 16
     * Extent: Russia - onshore between 90°E and 96°E
     * Also found with truncated false easting - see Pulkovo 1942 / Gauss-Kruger CM 93E (code 2506).
     */
    public const EPSG_PULKOVO_1942_GAUSS_KRUGER_ZONE_16 = 'urn:ogc:def:crs:EPSG::28416';

    /**
     * Pulkovo 1942 / Gauss-Kruger zone 17
     * Extent: Russia - onshore between 96°E and 102°E
     * Also found with truncated false easting - see Pulkovo 1942 / Gauss-Kruger CM 99E (code 2507).
     */
    public const EPSG_PULKOVO_1942_GAUSS_KRUGER_ZONE_17 = 'urn:ogc:def:crs:EPSG::28417';

    /**
     * Pulkovo 1942 / Gauss-Kruger zone 18
     * Extent: Russia - onshore between 102°E and 108°E
     * Also found with truncated false easting - see Pulkovo 1942 / Gauss-Kruger CM 105E (code 2508).
     */
    public const EPSG_PULKOVO_1942_GAUSS_KRUGER_ZONE_18 = 'urn:ogc:def:crs:EPSG::28418';

    /**
     * Pulkovo 1942 / Gauss-Kruger zone 19
     * Extent: Russia - onshore between 108°E and 114°E
     * Also found with truncated false easting - see Pulkovo 1942 / Gauss-Kruger CM 111E (code 2509).
     */
    public const EPSG_PULKOVO_1942_GAUSS_KRUGER_ZONE_19 = 'urn:ogc:def:crs:EPSG::28419';

    /**
     * Pulkovo 1942 / Gauss-Kruger zone 20
     * Extent: Russia - onshore between 114°E and 120°E
     * Also found with truncated false easting - see Pulkovo 1942 / Gauss-Kruger CM 117E (code 2510).
     */
    public const EPSG_PULKOVO_1942_GAUSS_KRUGER_ZONE_20 = 'urn:ogc:def:crs:EPSG::28420';

    /**
     * Pulkovo 1942 / Gauss-Kruger zone 21
     * Extent: Russia - onshore between 120°E and 126°E
     * Also found with truncated false easting - see Pulkovo 1942 / Gauss-Kruger CM 123E (code 2511).
     */
    public const EPSG_PULKOVO_1942_GAUSS_KRUGER_ZONE_21 = 'urn:ogc:def:crs:EPSG::28421';

    /**
     * Pulkovo 1942 / Gauss-Kruger zone 22
     * Extent: Russia - onshore between 126°E and 132°E
     * Also found with truncated false easting - see Pulkovo 1942 / Gauss-Kruger CM 129E (code 2512).
     */
    public const EPSG_PULKOVO_1942_GAUSS_KRUGER_ZONE_22 = 'urn:ogc:def:crs:EPSG::28422';

    /**
     * Pulkovo 1942 / Gauss-Kruger zone 23
     * Extent: Russia - onshore between 132°E and 138°E
     * Also found with truncated false easting - see Pulkovo 1942 / Gauss-Kruger CM 135E (code 2513).
     */
    public const EPSG_PULKOVO_1942_GAUSS_KRUGER_ZONE_23 = 'urn:ogc:def:crs:EPSG::28423';

    /**
     * Pulkovo 1942 / Gauss-Kruger zone 24
     * Extent: Russia - onshore between 138°E and 144°E
     * Also found with truncated false easting - see Pulkovo 1942 / Gauss-Kruger CM 141E (code 2514).
     */
    public const EPSG_PULKOVO_1942_GAUSS_KRUGER_ZONE_24 = 'urn:ogc:def:crs:EPSG::28424';

    /**
     * Pulkovo 1942 / Gauss-Kruger zone 25
     * Extent: Russia - onshore between 144°E and 150°E
     * Also found with truncated false easting - see Pulkovo 1942 / Gauss-Kruger CM 147E (code 2515).
     */
    public const EPSG_PULKOVO_1942_GAUSS_KRUGER_ZONE_25 = 'urn:ogc:def:crs:EPSG::28425';

    /**
     * Pulkovo 1942 / Gauss-Kruger zone 26
     * Extent: Russia - onshore between 150°E and 156°E
     * Also found with truncated false easting - see Pulkovo 1942 / Gauss-Kruger CM 153E (code 2516).
     */
    public const EPSG_PULKOVO_1942_GAUSS_KRUGER_ZONE_26 = 'urn:ogc:def:crs:EPSG::28426';

    /**
     * Pulkovo 1942 / Gauss-Kruger zone 27
     * Extent: Russia - onshore between 156°E and 162°E
     * Also found with truncated false easting - see Pulkovo 1942 / Gauss-Kruger CM 159E (code 2517).
     */
    public const EPSG_PULKOVO_1942_GAUSS_KRUGER_ZONE_27 = 'urn:ogc:def:crs:EPSG::28427';

    /**
     * Pulkovo 1942 / Gauss-Kruger zone 28
     * Extent: Russia - onshore between 162°E and 168°E
     * Also found with truncated false easting - see Pulkovo 1942 / Gauss-Kruger CM 165E (code 2518).
     */
    public const EPSG_PULKOVO_1942_GAUSS_KRUGER_ZONE_28 = 'urn:ogc:def:crs:EPSG::28428';

    /**
     * Pulkovo 1942 / Gauss-Kruger zone 29
     * Extent: Russia - onshore between 168°E and 174°E
     * Also found with truncated false easting - see Pulkovo 1942 / Gauss-Kruger CM 171E (code 2519).
     */
    public const EPSG_PULKOVO_1942_GAUSS_KRUGER_ZONE_29 = 'urn:ogc:def:crs:EPSG::28429';

    /**
     * Pulkovo 1942 / Gauss-Kruger zone 30
     * Extent: Russia - onshore between 174°E and 180°E
     * Also found with truncated false easting - see Pulkovo 1942 / Gauss-Kruger CM 177E (code 2520).
     */
    public const EPSG_PULKOVO_1942_GAUSS_KRUGER_ZONE_30 = 'urn:ogc:def:crs:EPSG::28430';

    /**
     * Pulkovo 1942 / Gauss-Kruger zone 31
     * Extent: Russia - onshore between 180°E and 174°W
     * Also found with truncated false easting - see Pulkovo 1942 / Gauss-Kruger CM 177W (code 2521).
     */
    public const EPSG_PULKOVO_1942_GAUSS_KRUGER_ZONE_31 = 'urn:ogc:def:crs:EPSG::28431';

    /**
     * Pulkovo 1942 / Gauss-Kruger zone 32
     * Extent: Russia - onshore east of 174°W
     * Also found with truncated false easting - see Pulkovo 1942 / Gauss-Kruger CM 171W (code 2522).
     */
    public const EPSG_PULKOVO_1942_GAUSS_KRUGER_ZONE_32 = 'urn:ogc:def:crs:EPSG::28432';

    /**
     * Pulkovo 1942 / Gauss-Kruger zone 4
     * Extent: Belarus, Estonia, Latvia, Lithuania and Ukraine - onshore west of 24°E. Russia - Kaliningrad onshore
     * Also found with truncated false easting - see Pulkovo 1942 / Gauss-Kruger CM 21E (code 2494).
     */
    public const EPSG_PULKOVO_1942_GAUSS_KRUGER_ZONE_4 = 'urn:ogc:def:crs:EPSG::28404';

    /**
     * Pulkovo 1942 / Gauss-Kruger zone 5
     * Extent: Estonia; Latvia and Lithuania - onshore east of 24°E; Belarus, Moldova, Russia and Ukraine - onshore
     * 24°E to 30°E
     * Also found with truncated false easting - see Pulkovo 1942 / Gauss-Kruger CM 27E (code 2495).
     */
    public const EPSG_PULKOVO_1942_GAUSS_KRUGER_ZONE_5 = 'urn:ogc:def:crs:EPSG::28405';

    /**
     * Pulkovo 1942 / Gauss-Kruger zone 6
     * Extent: Belarus and Moldova - east of 30°E; Russia and Ukraine - onshore 30°E to 36°E
     * Also found with truncated false easting - see Pulkovo 1942 / Gauss-Kruger CM 33E (code 2496).
     */
    public const EPSG_PULKOVO_1942_GAUSS_KRUGER_ZONE_6 = 'urn:ogc:def:crs:EPSG::28406';

    /**
     * Pulkovo 1942 / Gauss-Kruger zone 7
     * Extent: Georgia - onshore west of 36°E; Russia - onshore 36°E to 42°E; Ukraine - onshore east of 36°E
     * Also found with truncated false easting - see Pulkovo 1942 / Gauss-Kruger CM 39E (code 2497).
     */
    public const EPSG_PULKOVO_1942_GAUSS_KRUGER_ZONE_7 = 'urn:ogc:def:crs:EPSG::28407';

    /**
     * Pulkovo 1942 / Gauss-Kruger zone 8
     * Extent: Armenia - west of 48°E; Azerbaijan - west of 48°E; Georgia - east of 42°E; Kazakhstan - west of
     * 48°E; Russia - onshore 42°E to 48°E
     * Also found with truncated false easting - see Pulkovo 1942 / Gauss-Kruger CM 45E (code 2498).
     */
    public const EPSG_PULKOVO_1942_GAUSS_KRUGER_ZONE_8 = 'urn:ogc:def:crs:EPSG::28408';

    /**
     * Pulkovo 1942 / Gauss-Kruger zone 9
     * Extent: Azerbaijan - east of 48°E; Kazakhstan - 48°E to 54°E; Russia - 48°E to 54°E; Turkmenistan - west of
     * 54°E. Includes Caspian Sea (considered a lake rather than offshore)
     * Also found with truncated false easting - see Pulkovo 1942 / Gauss-Kruger CM 51E (code 2499).
     */
    public const EPSG_PULKOVO_1942_GAUSS_KRUGER_ZONE_9 = 'urn:ogc:def:crs:EPSG::28409';

    /**
     * Pulkovo 1942(58) / 3-degree Gauss-Kruger zone 10
     * Extent: Bulgaria and Romania - onshore east of 28°30'E.
     */
    public const EPSG_PULKOVO_1942_58_3_DEGREE_GAUSS_KRUGER_ZONE_10 = 'urn:ogc:def:crs:EPSG::3840';

    /**
     * Pulkovo 1942(58) / 3-degree Gauss-Kruger zone 3
     * Extent: Germany - states of former East Germany - west of 10°30'E - Thuringen
     * Replaced by Pulkovo 1942(83) / 3-degree Gauss-Kruger zone 3 (CRS code 2397). See CRS code 5670 for variant with
     * axes order reversed to easting before northing for use in GIS applications.
     */
    public const EPSG_PULKOVO_1942_58_3_DEGREE_GAUSS_KRUGER_ZONE_3 = 'urn:ogc:def:crs:EPSG::3837';

    /**
     * Pulkovo 1942(58) / 3-degree Gauss-Kruger zone 3 (E-N)
     * Extent: Germany - states of former East Germany - west of 10°30'E - Thuringen
     * Pulkovo 1942(58) / 3-degree Gauss-Kruger zone 3 (CRS code 3837) but with axis order reversed (and axis
     * abbreviations changed) for GIS applications.
     */
    public const EPSG_PULKOVO_1942_58_3_DEGREE_GAUSS_KRUGER_ZONE_3_E_N = 'urn:ogc:def:crs:EPSG::5670';

    /**
     * Pulkovo 1942(58) / 3-degree Gauss-Kruger zone 4
     * Extent: Czechia - west of 13°30'E. Germany - states of former East Germany onshore - between 10°30'E and
     * 13°30'E - Brandenburg; Mecklenburg-Vorpommern; Sachsen; Sachsen-Anhalt; Thuringen
     * Replaced by Pulkovo 1942(83) / 3-degree Gauss-Kruger zone 4 (CRS code 2398). See CRS code 5671 for variant with
     * axes order reversed to easting before northing for use in GIS applications.
     */
    public const EPSG_PULKOVO_1942_58_3_DEGREE_GAUSS_KRUGER_ZONE_4 = 'urn:ogc:def:crs:EPSG::3838';

    /**
     * Pulkovo 1942(58) / 3-degree Gauss-Kruger zone 4 (E-N)
     * Extent: Czechia - west of 13°30'E. Germany - states of former East Germany onshore - between 10°30'E and
     * 13°30'E - Brandenburg; Mecklenburg-Vorpommern; Sachsen; Sachsen-Anhalt; Thuringen
     * Pulkovo 1942(58) / 3-degree Gauss-Kruger zone 4 (CRS code 3838) but with axis order reversed (and axis
     * abbreviations changed) for GIS applications.
     */
    public const EPSG_PULKOVO_1942_58_3_DEGREE_GAUSS_KRUGER_ZONE_4_E_N = 'urn:ogc:def:crs:EPSG::5671';

    /**
     * Pulkovo 1942(58) / 3-degree Gauss-Kruger zone 5
     * Extent: Czechia - between 13°30'E and 16°30'E. Germany - states of former East Germany onshore - east of
     * 13°30'E - Brandenburg; Mecklenburg-Vorpommern; Sachsen. Hungary and Poland - onshore west of 16°30'E
     * In Czech Republic, Germany and Hungary, replaced by Pulkovo 1942(83) / 3-degree Gauss-Kruger zone 5 (CRS code
     * 2399). See CRS code 5672 for variant with axes order reversed to easting before northing for use in GIS
     * applications.
     */
    public const EPSG_PULKOVO_1942_58_3_DEGREE_GAUSS_KRUGER_ZONE_5 = 'urn:ogc:def:crs:EPSG::3329';

    /**
     * Pulkovo 1942(58) / 3-degree Gauss-Kruger zone 5 (E-N)
     * Extent: Czechia - between 13°30'E and 16°30'E. Germany - states of former East Germany onshore - east of
     * 13°30'E - Brandenburg; Mecklenburg-Vorpommern; Sachsen. Hungary and Poland - onshore west of 16°30'E
     * Pulkovo 1942(58) / 3-degree Gauss-Kruger zone 5 (CRS code 3329) but with axis order reversed (and axis
     * abbreviations changed) for GIS applications.
     */
    public const EPSG_PULKOVO_1942_58_3_DEGREE_GAUSS_KRUGER_ZONE_5_E_N = 'urn:ogc:def:crs:EPSG::5672';

    /**
     * Pulkovo 1942(58) / 3-degree Gauss-Kruger zone 6
     * Extent: Albania - onshore west of 19°30'E. Czechia - east of 16°30'E. Hungary and Poland - onshore between
     * 16°30'E and 19°30'E. Slovakia - west of 19°30'E
     * In Czech Republic, Hungary and Slovakia, replaced by Pulkovo 1942(83) / 3-degree Gauss-Kruger zone 6 (CRS code
     * 3841).
     */
    public const EPSG_PULKOVO_1942_58_3_DEGREE_GAUSS_KRUGER_ZONE_6 = 'urn:ogc:def:crs:EPSG::3330';

    /**
     * Pulkovo 1942(58) / 3-degree Gauss-Kruger zone 7
     * Extent: Albania - east of 19°30'E. Bulgaria and Romania - west of 22°30'E. Hungary, Poland and Slovakia -
     * between 19°30'E and 22°30'E
     * In Hungary and Slovakia, replaced by Pulkovo 1942(83) / 3-degree Gauss-Kruger zone 7 (CRS code 4417).
     */
    public const EPSG_PULKOVO_1942_58_3_DEGREE_GAUSS_KRUGER_ZONE_7 = 'urn:ogc:def:crs:EPSG::3331';

    /**
     * Pulkovo 1942(58) / 3-degree Gauss-Kruger zone 8
     * Extent: Bulgaria and Romania - between 22°30'E and 25°30'E. Hungary, Poland and Slovakia - east of 22°30'E
     * In Hungary and Slovakia, replaced by Pulkovo 1942(83) / 3-degree Gauss-Kruger zone 8 (CRS code 4434).
     */
    public const EPSG_PULKOVO_1942_58_3_DEGREE_GAUSS_KRUGER_ZONE_8 = 'urn:ogc:def:crs:EPSG::3332';

    /**
     * Pulkovo 1942(58) / 3-degree Gauss-Kruger zone 9
     * Extent: Bulgaria and Romania - onshore between 25°30'E and 28°30'E.
     */
    public const EPSG_PULKOVO_1942_58_3_DEGREE_GAUSS_KRUGER_ZONE_9 = 'urn:ogc:def:crs:EPSG::3839';

    /**
     * Pulkovo 1942(58) / GUGiK-80
     * Extent: Poland - onshore.
     */
    public const EPSG_PULKOVO_1942_58_GUGIK_80 = 'urn:ogc:def:crs:EPSG::3328';

    /**
     * Pulkovo 1942(58) / Gauss-Kruger zone 2
     * Extent: Germany - states of former East Germany - west of 12°E
     * Replaced by Pulkovo 1942(83) / Gauss-Kruger zone 2 (CRS code 3834). See CRS code 5631 for variant with axes
     * order reversed to easting before northing for use in GIS applications.
     */
    public const EPSG_PULKOVO_1942_58_GAUSS_KRUGER_ZONE_2 = 'urn:ogc:def:crs:EPSG::3833';

    /**
     * Pulkovo 1942(58) / Gauss-Kruger zone 2 (E-N)
     * Extent: Germany - states of former East Germany - west of 12°E
     * Pulkovo 1942(58) / Gauss-Kruger zone 2 (CRS code 3833) but with axis order reversed (and axis abbreviations
     * changed) for GIS applications.
     */
    public const EPSG_PULKOVO_1942_58_GAUSS_KRUGER_ZONE_2_E_N = 'urn:ogc:def:crs:EPSG::5631';

    /**
     * Pulkovo 1942(58) / Gauss-Kruger zone 3
     * Extent: Germany (former DDR) - onshore east of 12°E. Poland - onshore west of 18°E. Czechia, Hungary and
     * Slovakia - west of 18°E
     * In Germany, Czech Republic, Hungary and Slovakia, replaced by Pulkovo 1942(83) / Gauss-Kruger zone 3 (CRS code
     * 3835). See CRS code 5663 for variant with axes order reversed to easting before northing for use in GIS
     * applications.
     */
    public const EPSG_PULKOVO_1942_58_GAUSS_KRUGER_ZONE_3 = 'urn:ogc:def:crs:EPSG::3333';

    /**
     * Pulkovo 1942(58) / Gauss-Kruger zone 3 (E-N)
     * Extent: Germany (former DDR) - onshore east of 12°E. Poland - onshore west of 18°E. Czechia, Hungary and
     * Slovakia - west of 18°E
     * Pulkovo 1942(58) / Gauss-Kruger zone 3 (CRS code 3333) but with axis order reversed (and axis abbreviations
     * changed) for GIS applications.
     */
    public const EPSG_PULKOVO_1942_58_GAUSS_KRUGER_ZONE_3_E_N = 'urn:ogc:def:crs:EPSG::5663';

    /**
     * Pulkovo 1942(58) / Gauss-Kruger zone 4
     * Extent: Albania - onshore east of 18°E. Czechia, Hungary and Slovakia - east of 18°E. Poland - onshore between
     * 18°E and 24°E. Bulgaria and Romania - onshore west of 24°E
     * In Czech Republic, Hungary and Slovakia, replaced by Pulkovo 1942(83) / Gauss-Kruger zone 4 (CRS code3836).
     */
    public const EPSG_PULKOVO_1942_58_GAUSS_KRUGER_ZONE_4 = 'urn:ogc:def:crs:EPSG::3334';

    /**
     * Pulkovo 1942(58) / Gauss-Kruger zone 5
     * Extent: Bulgaria, Poland and Romania - onshore east of 24°E.
     */
    public const EPSG_PULKOVO_1942_58_GAUSS_KRUGER_ZONE_5 = 'urn:ogc:def:crs:EPSG::3335';

    /**
     * Pulkovo 1942(58) / Poland zone I
     * Extent: Poland - southeast - south of 52°20'N and east of 18°E
     * To be phased out after 2009. Replaced by ETRS89 / Poland CS2000 zones 7 and 8 (codes 2178-79).
     */
    public const EPSG_PULKOVO_1942_58_POLAND_ZONE_I = 'urn:ogc:def:crs:EPSG::3120';

    /**
     * Pulkovo 1942(58) / Poland zone II
     * Extent: Poland - northeast - onshore north of 51°20'N and east of 19°E
     * To be phased out after 2009. Replaced by ETRS89 / Poland CS2000 zones 7 and 8 (codes 2178-79).
     */
    public const EPSG_PULKOVO_1942_58_POLAND_ZONE_II = 'urn:ogc:def:crs:EPSG::2172';

    /**
     * Pulkovo 1942(58) / Poland zone III
     * Extent: Poland - northwest - onshore north of 52°10'N and west of 20°E
     * To be phased out after 2009. Replaced by ETRS89 / Poland CS2000 zones 5 and 6 (codes 2176-77).
     */
    public const EPSG_PULKOVO_1942_58_POLAND_ZONE_III = 'urn:ogc:def:crs:EPSG::2173';

    /**
     * Pulkovo 1942(58) / Poland zone IV
     * Extent: Poland - southwest - south of 53°20'N and west of 19°05'E
     * To be phased out after 2009. Replaced by ETRS89 / Poland CS2000 zones 5 and 6 (codes 2176-77).
     */
    public const EPSG_PULKOVO_1942_58_POLAND_ZONE_IV = 'urn:ogc:def:crs:EPSG::2174';

    /**
     * Pulkovo 1942(58) / Poland zone V
     * Extent: Poland - south central - between 49°20'N and 51°20'N, 18°20'E and 19°40'E
     * To be phased out after 2009. Replaced by ETRS89 / Poland CS2000 zone 6 (code 2177).
     */
    public const EPSG_PULKOVO_1942_58_POLAND_ZONE_V = 'urn:ogc:def:crs:EPSG::2175';

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
     * @deprecated use EPSG_NAD83_CSRS_V6_MTM_NS_2010_ZONE_4 instead
     */
    public const EPSG_NAD83_CSRS_V6_MTM_NOVA_SCOTIA_ZONE_4 = 'urn:ogc:def:crs:EPSG::8082';

    /**
     * @deprecated use EPSG_NAD83_CSRS_V6_MTM_NS_2010_ZONE_5 instead
     */
    public const EPSG_NAD83_CSRS_V6_MTM_NOVA_SCOTIA_ZONE_5 = 'urn:ogc:def:crs:EPSG::8083';

    /**
     * @deprecated use EPSG_NAD83_CSRS_V2_QUEBEC_ALBERS instead
     */
    public const EPSG_NAD83_CSRS_QUEBEC_ALBERS = 'urn:ogc:def:crs:EPSG::6624';

    /**
     * @deprecated use EPSG_NAD83_CSRS_V2_QUEBEC_LAMBERT instead
     */
    public const EPSG_NAD83_CSRS_QUEBEC_LAMBERT = 'urn:ogc:def:crs:EPSG::6622';
}
