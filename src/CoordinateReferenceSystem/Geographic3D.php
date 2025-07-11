<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\CoordinateReferenceSystem;

use PHPCoord\CoordinateSystem\CoordinateSystem;
use PHPCoord\CoordinateSystem\Ellipsoidal;
use PHPCoord\Datum\Datum;
use PHPCoord\Exception\UnknownCoordinateReferenceSystemException;
use PHPCoord\Geometry\BoundingArea;

use function assert;
use function count;
use function array_map;

class Geographic3D extends Geographic
{
    use Geographic3DSRIDData;
    /**
     * ATRF2014
     * Extent: Australia including Lord Howe Island, Macquarie Island, Ashmore and Cartier Islands, Christmas Island,
     * Cocos (Keeling) Islands, Norfolk Island.
     */
    public const EPSG_ATRF2014 = 'urn:ogc:def:crs:EPSG::9308';

    /**
     * Australian Antarctic
     * Extent: Antarctica between 45°E and 136°E and between 142°E and 160°E - Australian sector.
     */
    public const EPSG_AUSTRALIAN_ANTARCTIC = 'urn:ogc:def:crs:EPSG::4931';

    /**
     * BBT2000
     * Extent: Austria and Italy - on or related to the Brenner Base Tunnel rail route from Innsbruck to Fortezza
     * (Franzensfeste).
     */
    public const EPSG_BBT2000 = 'urn:ogc:def:crs:EPSG::10474';

    /**
     * BDA2000
     * Extent: Bermuda.
     */
    public const EPSG_BDA2000 = 'urn:ogc:def:crs:EPSG::4887';

    /**
     * BES2020 Saba
     * Extent: Bonaire, Sint Eustatius and Saba (BES Islands or Caribbean Netherlands) - Saba - onshore.
     */
    public const EPSG_BES2020_SABA = 'urn:ogc:def:crs:EPSG::10638';

    /**
     * BES2020 Sint Eustatius
     * Extent: Bonaire, Sint Eustatius and Saba (BES Islands or Caribbean Netherlands) - Sint Eustatius - onshore.
     */
    public const EPSG_BES2020_SINT_EUSTATIUS = 'urn:ogc:def:crs:EPSG::10738';

    /**
     * BGS2005
     * Extent: Bulgaria
     * Adopted 2010-07-29.
     */
    public const EPSG_BGS2005 = 'urn:ogc:def:crs:EPSG::7797';

    /**
     * BH_ETRS89
     * Extent: Bosnia and Herzegovina.
     */
    public const EPSG_BH_ETRS89 = 'urn:ogc:def:crs:EPSG::10327';

    /**
     * Bonaire 2004
     * Extent: Bonaire, Sint Eustatius and Saba (BES Islands or Caribbean Netherlands) - Bonaire - onshore.
     */
    public const EPSG_BONAIRE_2004 = 'urn:ogc:def:crs:EPSG::10761';

    /**
     * CGRS93
     * Extent: Cyprus - onshore.
     */
    public const EPSG_CGRS93 = 'urn:ogc:def:crs:EPSG::6310';

    /**
     * CHTRS95
     * Extent: Liechtenstein; Switzerland
     * Referenced to ETRS89 at epoch 1993.0. For CRS used for topographic and cadastral purposes see CH1903+ (CRS code
     * 4150).
     */
    public const EPSG_CHTRS95 = 'urn:ogc:def:crs:EPSG::4933';

    /**
     * CIGD11
     * Extent: Cayman Islands. Includes Grand Cayman, Little Cayman and Cayman Brac.
     */
    public const EPSG_CIGD11 = 'urn:ogc:def:crs:EPSG::6134';

    /**
     * CR-SIRGAS
     * Extent: Costa Rica
     * Replaces CR05 (CRS code 5364) from April 2018.
     */
    public const EPSG_CR_SIRGAS = 'urn:ogc:def:crs:EPSG::8906';

    /**
     * CR05
     * Extent: Costa Rica
     * Replaced by CR-SIRGAS (CRS code 8906) from April 2018.
     */
    public const EPSG_CR05 = 'urn:ogc:def:crs:EPSG::5364';

    /**
     * Cadastre 1997
     * Extent: Mayotte - onshore.
     */
    public const EPSG_CADASTRE_1997 = 'urn:ogc:def:crs:EPSG::4472';

    /**
     * China Geodetic Coordinate System 2000
     * Extent: China.
     */
    public const EPSG_CHINA_GEODETIC_COORDINATE_SYSTEM_2000 = 'urn:ogc:def:crs:EPSG::4480';

    /**
     * DB_REF
     * Extent: Germany - onshore - states of Baden-Wurtemberg, Bayern, Berlin, Brandenburg, Bremen, Hamburg, Hessen,
     * Mecklenburg-Vorpommern, Niedersachsen, Nordrhein-Westfalen, Rheinland-Pfalz, Saarland, Sachsen, Sachsen-Anhalt,
     * Schleswig-Holstein, Thuringen
     * Geometric component of both DB_REF2003 and DB_REF2016 systems.
     */
    public const EPSG_DB_REF = 'urn:ogc:def:crs:EPSG::5830';

    /**
     * DGN95
     * Extent: Indonesia.
     */
    public const EPSG_DGN95 = 'urn:ogc:def:crs:EPSG::4898';

    /**
     * DRUKREF 03
     * Extent: Bhutan.
     */
    public const EPSG_DRUKREF_03 = 'urn:ogc:def:crs:EPSG::5263';

    /**
     * EST97
     * Extent: Estonia.
     */
    public const EPSG_EST97 = 'urn:ogc:def:crs:EPSG::4935';

    /**
     * ETRF2000
     * Extent: Europe - ETRF extent - approximately 16°W to 33°E and 33°N to 84°N
     * Replaces ETRF97 (code 7929). On the publication of ETRF2005 the EUREF Technical Working Group recommended
     * ETRF2000 be the realization of ETRS89. ETRF2014 and ETRF2020 (codes 8403 and 10570) are technically superior to
     * all earlier realizations of ETRS89.
     */
    public const EPSG_ETRF2000 = 'urn:ogc:def:crs:EPSG::7931';

    /**
     * ETRF2000-PL
     * Extent: Poland
     * Adopted from 2012-12-01.
     */
    public const EPSG_ETRF2000_PL = 'urn:ogc:def:crs:EPSG::9701';

    /**
     * ETRF2005
     * Extent: Europe - ETRF extent - approximately 16°W to 33°E and 33°N to 84°N
     * On publication in 2007 of this CRS, the EUREF Technical Working Group recommended that ETRF2000 (EPSG code 7931)
     * remained as the preferred realization of ETRS89. Replaced by ETRF2014 (code 8403).
     */
    public const EPSG_ETRF2005 = 'urn:ogc:def:crs:EPSG::8399';

    /**
     * ETRF2014
     * Extent: Europe - ETRF extent - approximately 16°W to 33°E and 33°N to 84°N
     * Replaces ETRF2005 (code 8399). ETRF2014 is technically superior to ETRF2000 but ETRF2000 and other previous
     * realizations may be preferred for backward compatibility reasons. Differences between ETRF2014 and ETRF2000 can
     * reach 7cm.
     */
    public const EPSG_ETRF2014 = 'urn:ogc:def:crs:EPSG::8403';

    /**
     * ETRF2020
     * Extent: Europe - ETRF extent - approximately 16°W to 33°E and 33°N to 84°N
     * Replaces ETRF2014 (code 8403). ETRF2020 is technically superior to ETRF2000 but ETRF2000 and other previous
     * realizations may be preferred for backward compatibility reasons. Differences between ETRF2020 and ETRF2000 can
     * reach 7cm.
     */
    public const EPSG_ETRF2020 = 'urn:ogc:def:crs:EPSG::10570';

    /**
     * ETRF89
     * Extent: Europe - ETRF extent - approximately 16°W to 33°E and 33°N to 84°N
     * Replaced by ETRF90 (code 7917).
     */
    public const EPSG_ETRF89 = 'urn:ogc:def:crs:EPSG::7915';

    /**
     * ETRF90
     * Extent: Europe - ETRF extent - approximately 16°W to 33°E and 33°N to 84°N
     * Replaces ETRF89 (code 7915). Replaced by ETRF91 (code 7919).
     */
    public const EPSG_ETRF90 = 'urn:ogc:def:crs:EPSG::7917';

    /**
     * ETRF91
     * Extent: Europe - ETRF extent - approximately 16°W to 33°E and 33°N to 84°N
     * Replaces ETRF90 (code 7917). Replaced by ETRF92 (code 7921).
     */
    public const EPSG_ETRF91 = 'urn:ogc:def:crs:EPSG::7919';

    /**
     * ETRF92
     * Extent: Europe - ETRF extent - approximately 16°W to 33°E and 33°N to 84°N
     * Replaces ETRF91 (code 7919). Replaced by ETRF93 (code 7923).
     */
    public const EPSG_ETRF92 = 'urn:ogc:def:crs:EPSG::7921';

    /**
     * ETRF93
     * Extent: Europe - ETRF extent - approximately 16°W to 33°E and 33°N to 84°N
     * Replaces ETRF92 (code 7921). Replaced by ETRF94 (code 7925).
     */
    public const EPSG_ETRF93 = 'urn:ogc:def:crs:EPSG::7923';

    /**
     * ETRF94
     * Extent: Europe - ETRF extent - approximately 16°W to 33°E and 33°N to 84°N
     * Replaces ETRF93 (code 7923). Replaced by ETRF96 (code 7927).
     */
    public const EPSG_ETRF94 = 'urn:ogc:def:crs:EPSG::7925';

    /**
     * ETRF96
     * Extent: Europe - ETRF extent - approximately 16°W to 33°E and 33°N to 84°N
     * Replaces ETRF94 (code 7925). Replaced by ETRF97 (code 7929).
     */
    public const EPSG_ETRF96 = 'urn:ogc:def:crs:EPSG::7927';

    /**
     * ETRF97
     * Extent: Europe - ETRF extent - approximately 16°W to 33°E and 33°N to 84°N
     * Replaces ETRF96 (code 7927). Replaced by ETRF2000 (code 7931).
     */
    public const EPSG_ETRF97 = 'urn:ogc:def:crs:EPSG::7929';

    /**
     * ETRS89
     * Extent: Europe: Albania; Andorra; Austria; Belgium; Bosnia and Herzegovina; Bulgaria; Croatia; Czechia; Denmark;
     * Estonia; Faroe Islands; Finland; France; Germany; Gibraltar; Greece; Hungary; Ireland; Italy; Kosovo; Latvia;
     * Liechtenstein; Lithuania; Luxembourg; Malta; Moldova; Monaco; Montenegro; Netherlands; North Macedonia; Norway
     * including Svalbard and Jan Mayen; Poland; Portugal - mainland; Romania; San Marino; Serbia; Slovakia; Slovenia;
     * Spain - mainland and Balearic islands; Sweden; Switzerland; UK including Channel Islands and Isle of Man;
     * Vatican City State
     * Has been realized through ETRF89, ETRF90, ETRF91, ETRF92, ETRF93, ETRF94, ETRF96, ETRF97, ETRF2000, ETRF2005 and
     * ETRF2014. This 'ensemble' covers any or all of these realizations without distinction.
     */
    public const EPSG_ETRS89 = 'urn:ogc:def:crs:EPSG::4937';

    /**
     * ETRS89/DREF91/2016
     * Extent: Germany
     * German national realization of ETRS89. Replaces ETRS89/DREF91 Realization 2002 from 2016-12-01.
     */
    public const EPSG_ETRS89_DREF91_2016 = 'urn:ogc:def:crs:EPSG::10283';

    /**
     * EUREF-FIN
     * Extent: Finland
     * EUREF-FIN is the national realization of ETRS89 in Finland.
     */
    public const EPSG_EUREF_FIN = 'urn:ogc:def:crs:EPSG::10689';

    /**
     * FEH2010
     * Extent: Fehmarnbelt area of Denmark and Germany.
     */
    public const EPSG_FEH2010 = 'urn:ogc:def:crs:EPSG::5592';

    /**
     * GDA2020
     * Extent: Australia including Lord Howe Island, Macquarie Island, Ashmore and Cartier Islands, Christmas Island,
     * Cocos (Keeling) Islands, Norfolk Island.
     */
    public const EPSG_GDA2020 = 'urn:ogc:def:crs:EPSG::7843';

    /**
     * GDA94
     * Extent: Australia including Lord Howe Island, Macquarie Island, Ashmore and Cartier Islands, Christmas Island,
     * Cocos (Keeling) Islands, Norfolk Island.
     */
    public const EPSG_GDA94 = 'urn:ogc:def:crs:EPSG::4939';

    /**
     * GDBD2009
     * Extent: Brunei Darussalam.
     */
    public const EPSG_GDBD2009 = 'urn:ogc:def:crs:EPSG::5245';

    /**
     * GDM2000
     * Extent: Malaysia. Includes peninsular Malayasia, Sabah and Sarawak.
     */
    public const EPSG_GDM2000 = 'urn:ogc:def:crs:EPSG::4921';

    /**
     * GR96
     * Extent: Greenland.
     */
    public const EPSG_GR96 = 'urn:ogc:def:crs:EPSG::4909';

    /**
     * GSK-2011
     * Extent: Russia.
     */
    public const EPSG_GSK_2011 = 'urn:ogc:def:crs:EPSG::7682';

    /**
     * HTRS96
     * Extent: Croatia.
     */
    public const EPSG_HTRS96 = 'urn:ogc:def:crs:EPSG::4889';

    /**
     * Hartebeesthoek94
     * Extent: Eswatini (Swaziland); Lesotho; South Africa.
     */
    public const EPSG_HARTEBEESTHOEK94 = 'urn:ogc:def:crs:EPSG::4941';

    /**
     * Hong Kong Geodetic CS
     * Extent: Hong Kong
     * Locally sometimes referred to as ITRF96 or WGS 84, these are not strictly correct.
     */
    public const EPSG_HONG_KONG_GEODETIC_CS = 'urn:ogc:def:crs:EPSG::8426';

    /**
     * IG05 Intermediate CRS
     * Extent: Israel - onshore; Palestine onshore
     * Intermediate system not used for spatial referencing - use IGD05 (CRS code 6979).
     */
    public const EPSG_IG05_INTERMEDIATE_CRS = 'urn:ogc:def:crs:EPSG::6982';

    /**
     * IG05/12 Intermediate CRS
     * Extent: Israel - onshore; Palestine onshore
     * Intermediate system not used for spatial referencing - use IGD05/12 (CRS code 6986).
     */
    public const EPSG_IG05_12_INTERMEDIATE_CRS = 'urn:ogc:def:crs:EPSG::6989';

    /**
     * IGD05
     * Extent: Israel
     * Replaced by IGD05/12 (CRS code 7138).
     */
    public const EPSG_IGD05 = 'urn:ogc:def:crs:EPSG::7135';

    /**
     * IGD05/12
     * Extent: Israel
     * Replaces IGD05 (CRS code 7135).
     */
    public const EPSG_IGD05_12 = 'urn:ogc:def:crs:EPSG::7138';

    /**
     * IGM95
     * Extent: Italy; San Marino, Vatican City State
     * Replaced by RDN2008 (CRS code 6705) from 2011-11-10.
     */
    public const EPSG_IGM95 = 'urn:ogc:def:crs:EPSG::4983';

    /**
     * IGRS
     * Extent: Iraq.
     */
    public const EPSG_IGRS = 'urn:ogc:def:crs:EPSG::3888';

    /**
     * IGS00
     * Extent: World
     * Adopted by the International GNSS Service (IGS) from 2001-12-02 through 2004-01-10. Replaces IGS97, replaced by
     * IGb00 (CRS codes 9002 and 9008). For all practical purposes IGS00 is equivalent to ITRF2000.
     */
    public const EPSG_IGS00 = 'urn:ogc:def:crs:EPSG::9005';

    /**
     * IGS05
     * Extent: World
     * Adopted by the International GNSS Service (IGS) from 2006-11-05 through 2011-04-16. Replaces IGb00, replaced by
     * IGS08 (CRS codes 9008 and 9013). For all practical purposes IGS05 is equivalent to ITRF2005.
     */
    public const EPSG_IGS05 = 'urn:ogc:def:crs:EPSG::9011';

    /**
     * IGS08
     * Extent: World
     * Used for products from International GNSS Service (IGS) analysis centres from 2011-04-17 through 2012-10-06.
     * Replaces IGS05 (code 9011). Replaced by IGb08 (code 9016). For most practical purposes IGS08 is equivalent to
     * ITRF2008.
     */
    public const EPSG_IGS08 = 'urn:ogc:def:crs:EPSG::9013';

    /**
     * IGS14
     * Extent: World
     * Used for products from the International GNSS Service (IGS) from 2017-01-29 to 2020-05-16. Replaces IGb08 (code
     * 9016), replaced by IGb14 (code 9379). For most practical purposes IGS14 is equivalent to ITRF2014.
     */
    public const EPSG_IGS14 = 'urn:ogc:def:crs:EPSG::9018';

    /**
     * IGS20
     * Extent: World
     * Used for products from the International GNSS Service (IGS) from 2022-11-27 to 2025-02-01. Replaces IGb14 (code
     * 9379). Replaced by IGb20 (code 10784). For most practical purposes IGS20 is equivalent to ITRF2020.
     */
    public const EPSG_IGS20 = 'urn:ogc:def:crs:EPSG::10177';

    /**
     * IGS97
     * Extent: World
     * Adopted by the International GNSS Service (IGS) from 2000-06-04 through 2001-12-01. Replaced by IGS00 (CRS code
     * 9005). For all practical purposes IGS97 is equivalent to ITRF97.
     */
    public const EPSG_IGS97 = 'urn:ogc:def:crs:EPSG::9002';

    /**
     * IGb00
     * Extent: World
     * Adopted by the International GNSS Service (IGS) from 2004-01-11 through 2006-11-04. Replaces IGS00, replaced by
     * IGS05 (CRS codes 9005 and 9011). For all practical purposes IGb00 is equivalent to ITRF2000.
     */
    public const EPSG_IGB00 = 'urn:ogc:def:crs:EPSG::9008';

    /**
     * IGb08
     * Extent: World
     * Adopted by the International GNSS Service (IGS) from 2012-10-07 through 2017-01-28. Replaces IGS08, replaced by
     * IGS14 (CRS codes 9013 and 9018). For all practical purposes IGb08 is equivalent to ITRF2008.
     */
    public const EPSG_IGB08 = 'urn:ogc:def:crs:EPSG::9016';

    /**
     * IGb14
     * Extent: World
     * Used for products from the International GNSS Service (IGS) from 2020-05-17. Replaces IGS14 (code 9018),
     * replaced by IGS20 (code 10177). For most practical purposes IGb14 is equivalent to ITRF2014.
     */
    public const EPSG_IGB14 = 'urn:ogc:def:crs:EPSG::9379';

    /**
     * IGb20
     * Extent: World
     * Used for products from the International GNSS Service (IGS) from 2025-02-02. Replaces IGS20 (code 10177). For
     * most practical purposes IGb20 is equivalent to ITRF2020-u2023.
     */
    public const EPSG_IGB20 = 'urn:ogc:def:crs:EPSG::10784';

    /**
     * IRENET95
     * Extent: Ireland - onshore. UK - Northern Ireland (Ulster) - onshore.
     */
    public const EPSG_IRENET95 = 'urn:ogc:def:crs:EPSG::4943';

    /**
     * ISN2004
     * Extent: Iceland
     * Replaces ISN93 (CRS code 4945). Replaced by ISN2016 (CRS code 8085).
     */
    public const EPSG_ISN2004 = 'urn:ogc:def:crs:EPSG::5323';

    /**
     * ISN2016
     * Extent: Iceland
     * Replaces ISN2004 (CRS code 5323) from September 2017.
     */
    public const EPSG_ISN2016 = 'urn:ogc:def:crs:EPSG::8085';

    /**
     * ISN93
     * Extent: Iceland
     * Replaced by ISN2004 (CRS code 5323).
     */
    public const EPSG_ISN93 = 'urn:ogc:def:crs:EPSG::4945';

    /**
     * ITRF2000
     * Extent: World
     * Replaces ITRF97 (code 7908). Replaced by ITRF2005 (code 7910).
     */
    public const EPSG_ITRF2000 = 'urn:ogc:def:crs:EPSG::7909';

    /**
     * ITRF2005
     * Extent: World
     * Replaces ITRF2000 (code 7909). Replaced by ITRF2008 (code 7911).
     */
    public const EPSG_ITRF2005 = 'urn:ogc:def:crs:EPSG::7910';

    /**
     * ITRF2008
     * Extent: World
     * Replaces ITRF2005 (code 7910). Replaced by ITRF2014 (code 7912).
     */
    public const EPSG_ITRF2008 = 'urn:ogc:def:crs:EPSG::7911';

    /**
     * ITRF2014
     * Extent: World
     * Replaces ITRF2008 (code 7911). Replaced by ITRF2020 (CRS code 9989).
     */
    public const EPSG_ITRF2014 = 'urn:ogc:def:crs:EPSG::7912';

    /**
     * ITRF2020
     * Extent: World
     * Replaces ITRF2014 (code 7912).  Replaced by ITRF2020-u2023 (CRS code 10780).
     */
    public const EPSG_ITRF2020 = 'urn:ogc:def:crs:EPSG::9989';

    /**
     * ITRF2020-u2023
     * Extent: World
     * Replaces ITRF2020 (code 9989).
     */
    public const EPSG_ITRF2020_U2023 = 'urn:ogc:def:crs:EPSG::10780';

    /**
     * ITRF88
     * Extent: World
     * Replaced by ITRF89 (code 7901).
     */
    public const EPSG_ITRF88 = 'urn:ogc:def:crs:EPSG::7900';

    /**
     * ITRF89
     * Extent: World
     * Replaces ITRF88 (code 7900). Replaced by ITRF90 (code 7902).
     */
    public const EPSG_ITRF89 = 'urn:ogc:def:crs:EPSG::7901';

    /**
     * ITRF90
     * Extent: World
     * Replaces ITRF89 (code 7901). Replaced by ITRF91 (code 7903).
     */
    public const EPSG_ITRF90 = 'urn:ogc:def:crs:EPSG::7902';

    /**
     * ITRF91
     * Extent: World
     * Replaces ITRF90 (code 7902). Replaced by ITRF92 (code 7904).
     */
    public const EPSG_ITRF91 = 'urn:ogc:def:crs:EPSG::7903';

    /**
     * ITRF92
     * Extent: World
     * Replaces ITRF91 (code 7903). Replaced by ITRF93 (code 7905).
     */
    public const EPSG_ITRF92 = 'urn:ogc:def:crs:EPSG::7904';

    /**
     * ITRF93
     * Extent: World
     * Replaces ITRF92 (code 7904). Replaced by ITRF94 (code 7906).
     */
    public const EPSG_ITRF93 = 'urn:ogc:def:crs:EPSG::7905';

    /**
     * ITRF94
     * Extent: World
     * Replaces ITRF93 (code 7905). Replaced by ITRF96 (code 7907).
     */
    public const EPSG_ITRF94 = 'urn:ogc:def:crs:EPSG::7906';

    /**
     * ITRF96
     * Extent: World
     * Replaces ITRF94 (code 7906). Replaced by ITRF97 (code 7908).
     */
    public const EPSG_ITRF96 = 'urn:ogc:def:crs:EPSG::7907';

    /**
     * ITRF97
     * Extent: World
     * Replaces ITRF96 (code 7907). Replaced by ITRF2000 (code 7909).
     */
    public const EPSG_ITRF97 = 'urn:ogc:def:crs:EPSG::7908';

    /**
     * JAD2001
     * Extent: Jamaica. Includes Morant Cays and Pedro Cays.
     */
    public const EPSG_JAD2001 = 'urn:ogc:def:crs:EPSG::4895';

    /**
     * JGD2000
     * Extent: Japan
     * From 21st October 2011 replaced by JGD2011 (CRS code 6667).
     */
    public const EPSG_JGD2000 = 'urn:ogc:def:crs:EPSG::4947';

    /**
     * JGD2011
     * Extent: Japan
     * Replaces JGD2000 (CRS code 4947) with effect from 21st October 2011.
     */
    public const EPSG_JGD2011 = 'urn:ogc:def:crs:EPSG::6667';

    /**
     * KGD2002
     * Extent: Republic of Korea (South Korea).
     */
    public const EPSG_KGD2002 = 'urn:ogc:def:crs:EPSG::4927';

    /**
     * KOSOVAREF01
     * Extent: Kosovo.
     */
    public const EPSG_KOSOVAREF01 = 'urn:ogc:def:crs:EPSG::9139';

    /**
     * KSA-GRF17
     * Extent: Saudi Arabia.
     */
    public const EPSG_KSA_GRF17 = 'urn:ogc:def:crs:EPSG::9332';

    /**
     * Kyrg-06
     * Extent: Kyrgyzstan.
     */
    public const EPSG_KYRG_06 = 'urn:ogc:def:crs:EPSG::7685';

    /**
     * LGD2006
     * Extent: Libya.
     */
    public const EPSG_LGD2006 = 'urn:ogc:def:crs:EPSG::4900';

    /**
     * LKS-2020
     * Extent: Latvia
     * Replaces LKS-92 (CRS code 4949) from 2025-10-01.
     */
    public const EPSG_LKS_2020 = 'urn:ogc:def:crs:EPSG::10304';

    /**
     * LKS-92
     * Extent: Latvia
     * Replaced by LKS-2020 (CRS code 10304) from 2025-10-01.
     */
    public const EPSG_LKS_92 = 'urn:ogc:def:crs:EPSG::4949';

    /**
     * LKS94
     * Extent: Lithuania.
     */
    public const EPSG_LKS94 = 'urn:ogc:def:crs:EPSG::4951';

    /**
     * LTF2004(G)
     * Extent: France and Italy - on or related to the rail route from Lyon to Turin.
     */
    public const EPSG_LTF2004_G = 'urn:ogc:def:crs:EPSG::9546';

    /**
     * LUREF
     * Extent: Luxembourg
     * Ellipsoidal height approximates to NG95 gravity-related heights to within 5-15cm. For accurate heighting use
     * compound CRS LUREF / Luxembourg TM + NG95 height (code 9897).
     */
    public const EPSG_LUREF = 'urn:ogc:def:crs:EPSG::9893';

    /**
     * Lao 1993
     * Extent: Laos
     * Replaced by Lao 1997. Lao 1993 coordinate values are within 1m of Lao 1997 values.
     */
    public const EPSG_LAO_1993 = 'urn:ogc:def:crs:EPSG::4991';

    /**
     * Lao 1997
     * Extent: Laos
     * Replaces Lao 1993. Lao 1993 coordinate values are within 1m of Lao 1997 values.
     */
    public const EPSG_LAO_1997 = 'urn:ogc:def:crs:EPSG::4993';

    /**
     * LibRef21
     * Extent: Liberia.
     */
    public const EPSG_LIBREF21 = 'urn:ogc:def:crs:EPSG::10799';

    /**
     * MACARIO SOLIS
     * Extent: Panama
     * Densification of SIRGAS 2000 within Panama.
     */
    public const EPSG_MACARIO_SOLIS = 'urn:ogc:def:crs:EPSG::5370';

    /**
     * MAGNA-SIRGAS
     * Extent: Colombia. Includes San Andres y Providencia, Malpelo Islands, Roncador Bank, Serrana Bank and Serranilla
     * Bank
     * For high accuracy purposes replaced by MAGNA-SIRGAS 2018 (code 20045).
     */
    public const EPSG_MAGNA_SIRGAS = 'urn:ogc:def:crs:EPSG::4997';

    /**
     * MAGNA-SIRGAS 2018
     * Extent: Colombia. Includes San Andres y Providencia, Malpelo Islands, Roncador Bank, Serrana Bank and Serranilla
     * Bank.
     */
    public const EPSG_MAGNA_SIRGAS_2018 = 'urn:ogc:def:crs:EPSG::20045';

    /**
     * MARGEN
     * Extent: Bolivia.
     */
    public const EPSG_MARGEN = 'urn:ogc:def:crs:EPSG::5353';

    /**
     * MGI
     * Extent: Austria
     * Created retrospectively to support geoid model based on Bessel ellipsoid.
     */
    public const EPSG_MGI = 'urn:ogc:def:crs:EPSG::9267';

    /**
     * MOLDREF99
     * Extent: Moldova.
     */
    public const EPSG_MOLDREF99 = 'urn:ogc:def:crs:EPSG::4017';

    /**
     * MTRF-2000
     * Extent: Saudi Arabia.
     */
    public const EPSG_MTRF_2000 = 'urn:ogc:def:crs:EPSG::8817';

    /**
     * Macao 2008
     * Extent: Macao
     * Locally sometimes referred to as ITRF2005, this is not strictly correct.
     */
    public const EPSG_MACAO_2008 = 'urn:ogc:def:crs:EPSG::8430';

    /**
     * Mauritania 1999
     * Extent: Mauritania.
     */
    public const EPSG_MAURITANIA_1999 = 'urn:ogc:def:crs:EPSG::4925';

    /**
     * Mexico ITRF2008
     * Extent: Mexico
     * Replaces Mexico ITRF92 (CRS code 4482) from December 2010.
     */
    public const EPSG_MEXICO_ITRF2008 = 'urn:ogc:def:crs:EPSG::6364';

    /**
     * Mexico ITRF92
     * Extent: Mexico
     * Replaced by Mexico ITRF2008 (CRS code 6364) from December 2010.
     */
    public const EPSG_MEXICO_ITRF92 = 'urn:ogc:def:crs:EPSG::4482';

    /**
     * Moznet
     * Extent: Mozambique.
     */
    public const EPSG_MOZNET = 'urn:ogc:def:crs:EPSG::4953';

    /**
     * NAD83(2011)
     * Extent: Puerto Rico. USA - Alabama; Alaska; Arizona; Arkansas; California; Colorado; Connecticut; Delaware;
     * Florida; Georgia; Idaho; Illinois; Indiana; Iowa; Kansas; Kentucky; Louisiana; Maine; Maryland; Massachusetts;
     * Michigan; Minnesota; Mississippi; Missouri; Montana; Nebraska; Nevada; New Hampshire; New Jersey; New Mexico;
     * New York; North Carolina; North Dakota; Ohio; Oklahoma; Oregon; Pennsylvania; Rhode Island; South Carolina;
     * South Dakota; Tennessee; Texas; Utah; Vermont; Virginia; Washington; West Virginia; Wisconsin; Wyoming. US
     * Virgin Islands
     * Note: this CRS includes longitudes which are POSITIVE EAST. Replaces NAD83(CORS96) and NAD83(NSRS2007) (CRS
     * codes 6782 and 4893).
     */
    public const EPSG_NAD83_2011 = 'urn:ogc:def:crs:EPSG::6319';

    /**
     * NAD83(CORS96)
     * Extent: Puerto Rico. USA - Alabama; Alaska; Arizona; Arkansas; California; Colorado; Connecticut; Delaware;
     * Florida; Georgia; Idaho; Illinois; Indiana; Iowa; Kansas; Kentucky; Louisiana; Maine; Maryland; Massachusetts;
     * Michigan; Minnesota; Mississippi; Missouri; Montana; Nebraska; Nevada; New Hampshire; New Jersey; New Mexico;
     * New York; North Carolina; North Dakota; Ohio; Oklahoma; Oregon; Pennsylvania; Rhode Island; South Carolina;
     * South Dakota; Tennessee; Texas; Utah; Vermont; Virginia; Washington; West Virginia; Wisconsin; Wyoming. US
     * Virgin Islands
     * Note: this CRS includes POSITIVE EAST longitudes. Replaced by NAD83(2011) (CRS code 6319) from 2011-09-06.
     */
    public const EPSG_NAD83_CORS96 = 'urn:ogc:def:crs:EPSG::6782';

    /**
     * NAD83(CSRS)
     * Extent: Canada - Alberta; British Columbia; Manitoba; New Brunswick; Newfoundland and Labrador; Northwest
     * Territories; Nova Scotia; Nunavut; Ontario; Prince Edward Island; Quebec; Saskatchewan; Yukon
     * Includes all versions of NAD83(CSRS) from v2 [CSRS98] onwards without specific identification. As such it has an
     * accuracy of approximately 1m. Note: this CRS includes longitudes which are POSITIVE EAST.
     */
    public const EPSG_NAD83_CSRS = 'urn:ogc:def:crs:EPSG::4955';

    /**
     * NAD83(CSRS)v2
     * Extent: Canada - Alberta; British Columbia; Manitoba; New Brunswick; Newfoundland and Labrador; Northwest
     * Territories; Nova Scotia; Nunavut; Ontario; Prince Edward Island; Quebec; Saskatchewan; Yukon
     * Adopted by the Canadian federal government from 1998-01-01 and by the provincial governments of British
     * Columbia, New Brunswick, Prince Edward Island and Quebec. Replaces NAD83(CSRS96). Replaced by NAD83(CSRS)v3
     * (code 8239). Longitudes are POSITIVE EAST.
     */
    public const EPSG_NAD83_CSRS_V2 = 'urn:ogc:def:crs:EPSG::8235';

    /**
     * NAD83(CSRS)v3
     * Extent: Canada - Alberta; British Columbia; Manitoba; New Brunswick; Newfoundland and Labrador; Northwest
     * Territories; Nova Scotia; Nunavut; Ontario; Prince Edward Island; Quebec; Saskatchewan; Yukon
     * Adopted by the Canadian federal government from 1999-01-01 and by the provincial governments of Alberta, British
     * Columbia, Manitoba, Newfoundland and Labrador, Nova Scotia, Ontario and Saskatchewan. Replaces NAD83(CSRS)v2.
     * Replaced by NAD83(CSRS)v4.
     */
    public const EPSG_NAD83_CSRS_V3 = 'urn:ogc:def:crs:EPSG::8239';

    /**
     * NAD83(CSRS)v4
     * Extent: Canada - Alberta; British Columbia; Manitoba; New Brunswick; Newfoundland and Labrador; Northwest
     * Territories; Nova Scotia; Nunavut; Ontario; Prince Edward Island; Quebec; Saskatchewan; Yukon
     * Adopted by the Canadian federal government from 2002-01-01 and by the provincial governments of Alberta and
     * British Columbia. Replaces NAD83(CSRS)v3. Replaced by NAD83(CSRS)v5 (CRS code 8248). Longitudes are POSITIVE
     * EAST.
     */
    public const EPSG_NAD83_CSRS_V4 = 'urn:ogc:def:crs:EPSG::8244';

    /**
     * NAD83(CSRS)v5
     * Extent: Canada - Alberta; British Columbia; Manitoba; New Brunswick; Newfoundland and Labrador; Northwest
     * Territories; Nova Scotia; Nunavut; Ontario; Prince Edward Island; Quebec; Saskatchewan; Yukon
     * Adopted by the Canadian federal government from 2006-01-01. Replaces NAD83(CSRS)v4. Replaced by NAD83(CSRS)v6.
     * Longitudes are POSITIVE EAST.
     */
    public const EPSG_NAD83_CSRS_V5 = 'urn:ogc:def:crs:EPSG::8248';

    /**
     * NAD83(CSRS)v6
     * Extent: Canada - Alberta; British Columbia; Manitoba; New Brunswick; Newfoundland and Labrador; Northwest
     * Territories; Nova Scotia; Nunavut; Ontario; Prince Edward Island; Quebec; Saskatchewan; Yukon
     * Adopted by the Canadian federal government from 2010-01-01 and the provincial governments of Alberta, British
     * Columbia, Manitoba, Newfoundland and Labrador, Nova Scotia, Ontario and Prince Edward Island. Replaces
     * NAD83(CSRS)v5. Replaced by NAD83(CSRS)v7.
     */
    public const EPSG_NAD83_CSRS_V6 = 'urn:ogc:def:crs:EPSG::8251';

    /**
     * NAD83(CSRS)v7
     * Extent: Canada - Alberta; British Columbia; Manitoba; New Brunswick; Newfoundland and Labrador; Northwest
     * Territories; Nova Scotia; Nunavut; Ontario; Prince Edward Island; Quebec; Saskatchewan; Yukon
     * Adopted by the Canadian federal government from 2017-05-01 and the provincial government of Alberta. Replaces
     * NAD83(CSRS)v6. Replaced by NAD83(CSRS)v8. Longitudes are POSITIVE EAST.
     */
    public const EPSG_NAD83_CSRS_V7 = 'urn:ogc:def:crs:EPSG::8254';

    /**
     * NAD83(CSRS)v8
     * Extent: Canada - Alberta; British Columbia; Manitoba; New Brunswick; Newfoundland and Labrador; Northwest
     * Territories; Nova Scotia; Nunavut; Ontario; Prince Edward Island; Quebec; Saskatchewan; Yukon
     * Adopted by the Canadian federal government from 2022-11-27. Replaces NAD83(CSRS)v7. Longitudes are POSITIVE
     * EAST.
     */
    public const EPSG_NAD83_CSRS_V8 = 'urn:ogc:def:crs:EPSG::10413';

    /**
     * NAD83(CSRS96)
     * Extent: Canada - Alberta; British Columbia; Manitoba; New Brunswick; Newfoundland and Labrador; Northwest
     * Territories; Nova Scotia; Nunavut; Ontario; Prince Edward Island; Quebec; Saskatchewan; Yukon
     * Adopted by the Canadian federal government from 1996-01-01. Replaced by NAD83(CSRS)v2 (CRS code 8235). Note:
     * this CRS includes longitudes which are POSITIVE EAST.
     */
    public const EPSG_NAD83_CSRS96 = 'urn:ogc:def:crs:EPSG::8231';

    /**
     * NAD83(FBN)
     * Extent: American Samoa - Tutuila, Aunu'u, Ofu, Olesega, Ta'u and Rose islands - onshore. Guam - onshore.
     * Northern Mariana Islands - onshore. Puerto Rico - onshore. USA - CONUS - Alabama; Arizona; Arkansas; California;
     * Colorado; Connecticut; Delaware; Florida; Georgia; Idaho; Illinois; Indiana; Iowa; Kansas; Kentucky; Louisiana;
     * Maine; Maryland; Massachusetts; Michigan; Minnesota; Mississippi; Missouri; Montana; Nebraska; Nevada; New
     * Hampshire; New Jersey; New Mexico; New York; North Carolina; North Dakota; Ohio; Oklahoma; Oregon; Pennsylvania;
     * Rhode Island; South Carolina; South Dakota; Tennessee; Texas; Utah; Vermont; Virginia; Washington; West
     * Virginia; Wisconsin; Wyoming - onshore plus Gulf of Mexico offshore continental shelf (GoM OCS). US Virgin
     * Islands - onshore
     * Continental US, American Samoa, Guam/NMI and PRVI, replaces NAD83(HARN). In Continental US, Puerto Rico and US
     * Virgin Islands replaced by NAD83(NSRS2007). In American Samoa and Hawaii replaced by NAD83(PA11). In Guam/NMI
     * replaced by NAD83(MA11).
     */
    public const EPSG_NAD83_FBN = 'urn:ogc:def:crs:EPSG::8542';

    /**
     * NAD83(HARN Corrected)
     * Extent: Puerto Rico and US Virgin Islands - onshore
     * Note: this CRS includes POSITIVE EAST longitudes. In PRVI replaces NAD83(HARN) = NAD83(1993 PRVI) to correct
     * errors. Replaced by NAD83(FBN) = NAD83(2002 PRVI).
     */
    public const EPSG_NAD83_HARN_CORRECTED = 'urn:ogc:def:crs:EPSG::8544';

    /**
     * NAD83(HARN)
     * Extent: American Samoa - onshore - Tutuila, Aunu'u, Ofu, Olesega, Ta'u and Rose islands. Guam - onshore.
     * Northern Mariana Islands - onshore. Puerto Rico - onshore. USA - onshore Alabama, Alaska, Arizona, Arkansas,
     * California, Colorado, Connecticut, Delaware, Florida, Georgia, Hawaii, Idaho, Illinois, Indiana, Iowa, Kansas,
     * Kentucky, Louisiana, Maine, Maryland, Massachusetts, Michigan, Minnesota, Mississippi, Missouri, Montana,
     * Nebraska, Nevada, New Hampshire, New Jersey, New Mexico, New York, North Carolina, North Dakota, Ohio, Oklahoma,
     * Oregon, Pennsylvania, Rhode Island, South Carolina, South Dakota, Tennessee, Texas, Utah, Vermont, Virginia,
     * Washington, West Virginia, Wisconsin and Wyoming; offshore Gulf of Mexico continental shelf (GoM OCS). US Virgin
     * Islands - onshore
     * In CONUS and Hawaii replaces NAD83 for applications with an accuracy of better than 1m. Replaced by NAD83(FBN)
     * in CONUS, American Samoa and Guam / NMI, by NAD83(NSRS2007) in Alaska, by NAD83(PA11) in Hawaii and by
     * NAD83(HARN Corrected) in PRVI.
     */
    public const EPSG_NAD83_HARN = 'urn:ogc:def:crs:EPSG::4957';

    /**
     * NAD83(MA11)
     * Extent: Guam, Northern Mariana Islands and Palau;
     * Note: this CRS includes longitudes which are POSITIVE EAST. Replaces NAD83(HARN) (GGN93) and NAD83(FBN) in Guam.
     */
    public const EPSG_NAD83_MA11 = 'urn:ogc:def:crs:EPSG::6324';

    /**
     * NAD83(MARP00)
     * Extent: Guam, Northern Mariana Islands and Palau;
     * Replaces NAD83(HARN) (GGN93) and NAD83(FBN) in Guam. Replaced by NAD83(MA11).
     */
    public const EPSG_NAD83_MARP00 = 'urn:ogc:def:crs:EPSG::9071';

    /**
     * NAD83(NSRS2007)
     * Extent: Puerto Rico. USA - Alabama; Alaska; Arizona; Arkansas; California; Colorado; Connecticut; Delaware;
     * Florida; Georgia; Idaho; Illinois; Indiana; Iowa; Kansas; Kentucky; Louisiana; Maine; Maryland; Massachusetts;
     * Michigan; Minnesota; Mississippi; Missouri; Montana; Nebraska; Nevada; New Hampshire; New Jersey; New Mexico;
     * New York; North Carolina; North Dakota; Ohio; Oklahoma; Oregon; Pennsylvania; Rhode Island; South Carolina;
     * South Dakota; Tennessee; Texas; Utah; Vermont; Virginia; Washington; West Virginia; Wisconsin; Wyoming. US
     * Virgin Islands
     * Note: this CRS includes longitudes which are POSITIVE EAST. Replaces NAD83(HARN) and NAD83(FBN). Replaced by
     * NAD83(2011).
     */
    public const EPSG_NAD83_NSRS2007 = 'urn:ogc:def:crs:EPSG::4893';

    /**
     * NAD83(PA11)
     * Extent: American Samoa, Marshall Islands, USA - Hawaii, United States minor outlying islands;
     * Note: this CRS includes longitudes which are POSITIVE EAST. Replaces NAD83(HARN) and NAD83(FBN) in Hawaii and
     * American Samoa.
     */
    public const EPSG_NAD83_PA11 = 'urn:ogc:def:crs:EPSG::6321';

    /**
     * NAD83(PACP00)
     * Extent: American Samoa, Marshall Islands, USA - Hawaii, United States minor outlying islands;
     * Replaces NAD83(HARN) and NAD83(FBN) in Hawaii and American Samoa. Replaced by NAD83(PA11).
     */
    public const EPSG_NAD83_PACP00 = 'urn:ogc:def:crs:EPSG::9074';

    /**
     * NZGD2000
     * Extent: New Zealand. Includes Antipodes Islands, Auckland Islands, Bounty Islands, Chatham Islands, Cambell
     * Island, Kermadec Islands, Raoul Island and Snares Islands.
     */
    public const EPSG_NZGD2000 = 'urn:ogc:def:crs:EPSG::4959';

    /**
     * ONGD14
     * Extent: Oman
     * In Oman replaces usage of WGS 84 (G873) from 2014. Replaced by ONGD17 (CRS code 9293) from March 2019.
     */
    public const EPSG_ONGD14 = 'urn:ogc:def:crs:EPSG::7372';

    /**
     * ONGD17
     * Extent: Oman
     * Replaces ONGD14 (CRS code 7372) from March 2019.
     */
    public const EPSG_ONGD17 = 'urn:ogc:def:crs:EPSG::9293';

    /**
     * PNG94
     * Extent: Papua New Guinea. Includes Bismark archipelago, Louisade archipelago, Admiralty Islands, d'Entrecasteaux
     * Islands, northern Solomon Islands, Trobriand Islands, New Britain, New Ireland, Woodlark, and associated islands.
     */
    public const EPSG_PNG94 = 'urn:ogc:def:crs:EPSG::5545';

    /**
     * POSGAR 2007
     * Extent: Argentina
     * Adopted as official replacement of POSGAR 94 in May 2009. Also replaces de facto use of POSGAR 98 as of same
     * date.
     */
    public const EPSG_POSGAR_2007 = 'urn:ogc:def:crs:EPSG::5342';

    /**
     * POSGAR 94
     * Extent: Argentina
     * Legally adopted in May 1997. Replaced by POSGAR 98 for scientific and many practical purposes until May 2009.
     * Officially replaced by POSGAR 2007 in May 2009.
     */
    public const EPSG_POSGAR_94 = 'urn:ogc:def:crs:EPSG::4929';

    /**
     * POSGAR 98
     * Extent: Argentina
     * Densification in Argentina of SIRGAS 1995. Until May 2009 replaced POSGAR 94 for many practical purposes (but
     * not as the legal system). POSGAR 94 was officially replaced by POSGAR 2007 in May 2009.
     */
    public const EPSG_POSGAR_98 = 'urn:ogc:def:crs:EPSG::4961';

    /**
     * PRS92
     * Extent: Philippines.
     */
    public const EPSG_PRS92 = 'urn:ogc:def:crs:EPSG::4995';

    /**
     * PTRA08
     * Extent: Portugal - Azores and Madeira island groups and surrounding EEZ - Flores, Corvo; Graciosa, Terceira, Sao
     * Jorge, Pico, Faial; Sao Miguel, Santa Maria; Madeira, Porto Santo, Desertas; Selvagens.
     */
    public const EPSG_PTRA08 = 'urn:ogc:def:crs:EPSG::5012';

    /**
     * PZ-90
     * Extent: World
     * Replaced by PZ-90.02 from 2007-09-20.
     */
    public const EPSG_PZ_90 = 'urn:ogc:def:crs:EPSG::4923';

    /**
     * PZ-90.02
     * Extent: World
     * Replaces PZ-90 (CRS code 4923) from 2007-09-20. Replaced by PZ-90.11 (CRS code 7680) from 2014-01-15.
     */
    public const EPSG_PZ_90_02 = 'urn:ogc:def:crs:EPSG::7678';

    /**
     * PZ-90.11
     * Extent: World
     * Replaces PZ-90.02 (CRS code 7678) from 2014-01-15.
     */
    public const EPSG_PZ_90_11 = 'urn:ogc:def:crs:EPSG::7680';

    /**
     * Peru96
     * Extent: Peru.
     */
    public const EPSG_PERU96 = 'urn:ogc:def:crs:EPSG::5372';

    /**
     * RDN2008
     * Extent: Italy; San Marino, Vatican City State
     * Replaces IGM95 (CRS code 4983) from 2011-11-10.
     */
    public const EPSG_RDN2008 = 'urn:ogc:def:crs:EPSG::6705';

    /**
     * REDGEOMIN
     * Extent: Chile. Includes Easter Island, Juan Fernandez Islands, San Felix, and Sala y Gomez.
     */
    public const EPSG_REDGEOMIN = 'urn:ogc:def:crs:EPSG::9695';

    /**
     * REGCAN95
     * Extent: Spain - Canary Islands.
     */
    public const EPSG_REGCAN95 = 'urn:ogc:def:crs:EPSG::4080';

    /**
     * REGVEN
     * Extent: Venezuela
     * Densification in Venezuela of SIRGAS.
     */
    public const EPSG_REGVEN = 'urn:ogc:def:crs:EPSG::4963';

    /**
     * RGAF09
     * Extent: French Antilles - Guadeloupe (including Grande Terre, Basse Terre, Marie Galante, Les Saintes, Iles de
     * la Petite Terre, La Desirade); Martinique; St Barthélemy; St Martin
     * Replaces RRAF 1991 (CRS code 4557). See CRS code 7085 for alternate system with horizontal axes reversed used by
     * IGN for GIS purposes.
     */
    public const EPSG_RGAF09 = 'urn:ogc:def:crs:EPSG::5488';

    /**
     * RGAF09 (lon-lat)
     * Extent: French Antilles - Guadeloupe (including Grande Terre, Basse Terre, Marie Galante, Les Saintes, Iles de
     * la Petite Terre, La Desirade); Martinique; St Barthélemy; St Martin
     * Replaces RRAF 1991 (CRS code 4557). See CRS code 5488 for system with horizontal axes in sequence lat-lon to be
     * used for air, land and sea navigation and safety of life purposes.
     */
    public const EPSG_RGAF09_LON_LAT = 'urn:ogc:def:crs:EPSG::7085';

    /**
     * RGF93 v1
     * Extent: France, mainland and Corsica (France métropolitaine including Corsica)
     * See CRS code 7042 for alternate system with horizontal axes reversed used by IGN for GIS purposes. Replaced by
     * RGF93 v2 (CRS code 9776) from 2010-06-18.
     */
    public const EPSG_RGF93_V1 = 'urn:ogc:def:crs:EPSG::4965';

    /**
     * RGF93 v1 (lon-lat)
     * Extent: France, mainland and Corsica (France métropolitaine including Corsica)
     * See CRS code 4965 for system with horizontal axes in sequence lat-lon to be used for air, land and sea
     * navigation and safety of life purposes. Replaced by RGF93 v2 (lon-lat) (CRS code 9778) from 2010-06-18.
     */
    public const EPSG_RGF93_V1_LON_LAT = 'urn:ogc:def:crs:EPSG::7042';

    /**
     * RGF93 v2
     * Extent: France, mainland and Corsica (France métropolitaine including Corsica)
     * Replaces RGF93 v1 CRS code 4965) from 2010-06-18 . Replaced by RGF93 v2b (CRS code 9781) from 2021-01-05. See
     * CRS code 9778 for alternate system with horizontal axes reversed used by IGN for GIS purposes.
     */
    public const EPSG_RGF93_V2 = 'urn:ogc:def:crs:EPSG::9776';

    /**
     * RGF93 v2 (lon-lat)
     * Extent: France, mainland and Corsica (France métropolitaine including Corsica)
     * Replaces RGF93 v1 (lon-lat) from 2010-06-18. Replaced by RGF93 v2b (lon-lat) (CRS code 9783) from 2021-01-05.
     * See CRS code 9776 for system with horizontal axes in sequence lat-lon to be used for air, land and sea
     * navigation and safety of life purposes.
     */
    public const EPSG_RGF93_V2_LON_LAT = 'urn:ogc:def:crs:EPSG::9778';

    /**
     * RGF93 v2b
     * Extent: France, mainland and Corsica (France métropolitaine including Corsica)
     * Replaces RGF93 v2 (CRS code 9776) from 2021-01-05. See CRS code 9783 for alternate system with horizontal axes
     * reversed used by IGN for GIS purposes.
     */
    public const EPSG_RGF93_V2B = 'urn:ogc:def:crs:EPSG::9781';

    /**
     * RGF93 v2b (lon-lat)
     * Extent: France, mainland and Corsica (France métropolitaine including Corsica)
     * Replaces RGF93 v2 (lon-lat) (CRS code 9778) from 2021-01-05. See CRS code 9781 for system with horizontal axes
     * in sequence lat-lon to be used for air, land and sea navigation and safety of life purposes.
     */
    public const EPSG_RGF93_V2B_LON_LAT = 'urn:ogc:def:crs:EPSG::9783';

    /**
     * RGFG95
     * Extent: French Guiana
     * See CRS code 7040 for alternate system with horizontal axes reversed used by IGN for GIS purposes.
     */
    public const EPSG_RGFG95 = 'urn:ogc:def:crs:EPSG::4967';

    /**
     * RGFG95 (lon-lat)
     * Extent: French Guiana
     * See CRS code 4967 for system with horizontal axes in sequence lat-lon to be used for air, land and sea
     * navigation and safety of life purposes.
     */
    public const EPSG_RGFG95_LON_LAT = 'urn:ogc:def:crs:EPSG::7040';

    /**
     * RGM04
     * Extent: Mayotte
     * Replaced by RGM23 (CRS code 10670) from 2023-01-01. See CRS code 7038 for alternate system with horizontal axes
     * reversed used by IGN for GIS purposes.
     */
    public const EPSG_RGM04 = 'urn:ogc:def:crs:EPSG::4469';

    /**
     * RGM04 (lon-lat)
     * Extent: Mayotte
     * Replaced by RGM23 (lon-lat) (CRS code 10672) with effect from 2023-01-01. See CRS code 4469 for system with
     * horizontal axes in sequence lat-lon to be used for air, land and sea navigation and safety of life purposes.
     */
    public const EPSG_RGM04_LON_LAT = 'urn:ogc:def:crs:EPSG::7038';

    /**
     * RGM23
     * Extent: Mayotte
     * Replaces RGM04 (CRS code 4469) with effect from 2023-01-01. See CRS code 10672 for alternate system with
     * horizontal axes reversed used by IGN for GIS purposes.
     */
    public const EPSG_RGM23 = 'urn:ogc:def:crs:EPSG::10670';

    /**
     * RGM23 (lon-lat)
     * Extent: Mayotte
     * Replaces RGM04 (lon-lat) (CRS code 7038) with effect from 2023-01-01. See CRS code 10670 for system with
     * horizontal axes in sequence lat-lon to be used for air, land and sea navigation and safety of life purposes.
     */
    public const EPSG_RGM23_LON_LAT = 'urn:ogc:def:crs:EPSG::10672';

    /**
     * RGNC15
     * Extent: New Caledonia. Isle de Pins, Loyalty Islands, Huon Islands, Belep archipelago, Chesterfield Islands, and
     * Walpole
     * Replaces RGNC91-93 (CRS code 4907). See CRS code 10311 for alternate system with horizontal axes reversed used
     * by DITTT for GIS purposes.
     */
    public const EPSG_RGNC15 = 'urn:ogc:def:crs:EPSG::10309';

    /**
     * RGNC15 (lon-lat)
     * Extent: New Caledonia. Isle de Pins, Loyalty Islands, Huon Islands, Belep archipelago, Chesterfield Islands, and
     * Walpole
     * Replaces RGNC91-93 (lon-lat) (CRS code 10300). See CRS code 10309 for system with horizontal axes in sequence
     * lat-lon to be used for air, land and sea navigation and safety of life purposes.
     */
    public const EPSG_RGNC15_LON_LAT = 'urn:ogc:def:crs:EPSG::10311';

    /**
     * RGNC91-93
     * Extent: New Caledonia. Isle de Pins, Loyalty Islands, Huon Islands, Belep archipelago, Chesterfield Islands, and
     * Walpole
     * Replaces older systems IGN56 Lifou, IGN72 Grande Terre, ST87 Ouvea, IGN53 Mare, ST84 Ile des Pins, ST71 Belep
     * and NEA74 Noumea. Replaced by RGNC15 (CRS 10309). See CRS code 10300 for alternate system with axes reversed
     * used by DITTT for GIS purposes.
     */
    public const EPSG_RGNC91_93 = 'urn:ogc:def:crs:EPSG::4907';

    /**
     * RGNC91-93 (lon-lat)
     * Extent: New Caledonia. Isle de Pins, Loyalty Islands, Huon Islands, Belep archipelago, Chesterfield Islands, and
     * Walpole
     * See CRS code 4907 for system with horizontal axes in sequence lat-lon to be used for air, land and sea
     * navigation and safety of life purposes. Replaced by RGNC15 (lon-lat) (CRS code 10311).
     */
    public const EPSG_RGNC91_93_LON_LAT = 'urn:ogc:def:crs:EPSG::10300';

    /**
     * RGPF
     * Extent: French Polynesia. Includes Society archipelago, Tuamotu archipelago, Marquesas Islands, Gambier Islands
     * and Austral Islands.
     */
    public const EPSG_RGPF = 'urn:ogc:def:crs:EPSG::4999';

    /**
     * RGR92
     * Extent: Reunion
     * See CRS code 7036 for alternate system with horizontal axes reversed used by IGN for GIS purposes.
     */
    public const EPSG_RGR92 = 'urn:ogc:def:crs:EPSG::4971';

    /**
     * RGR92 (lon-lat)
     * Extent: Reunion
     * See CRS code 4971 for system with horizontal axes in sequence lat-lon to be used for air, land and sea
     * navigation and safety of life purposes.
     */
    public const EPSG_RGR92_LON_LAT = 'urn:ogc:def:crs:EPSG::7036';

    /**
     * RGRDC 2005
     * Extent: The Democratic Republic of the Congo (Zaire) - south of a line through Bandundu, Seke and Pweto.
     */
    public const EPSG_RGRDC_2005 = 'urn:ogc:def:crs:EPSG::4040';

    /**
     * RGSH2020
     * Extent: Algeria.
     */
    public const EPSG_RGSH2020 = 'urn:ogc:def:crs:EPSG::10298';

    /**
     * RGSPM06
     * Extent: St Pierre and Miquelon
     * See CRS code 7034 for alternate system with horizontal axes reversed used by IGN for GIS purposes.
     */
    public const EPSG_RGSPM06 = 'urn:ogc:def:crs:EPSG::4466';

    /**
     * RGSPM06 (lon-lat)
     * Extent: St Pierre and Miquelon
     * See CRS code 4466 for system with horizontal axes in sequence lat-lon to be used for air, land and sea
     * navigation and safety of life purposes.
     */
    public const EPSG_RGSPM06_LON_LAT = 'urn:ogc:def:crs:EPSG::7034';

    /**
     * RGTAAF07
     * Extent: French Southern Territories: Amsterdam and St Paul, Crozet, Europa and Kerguelen. Antarctica - Adelie
     * Land coastal area
     * See CRS code 7087 for alternate system with horizontal axes reversed used by IGN for GIS purposes.
     */
    public const EPSG_RGTAAF07 = 'urn:ogc:def:crs:EPSG::7072';

    /**
     * RGTAAF07 (lon-lat)
     * Extent: French Southern Territories: Amsterdam and St Paul, Crozet, Europa and Kerguelen. Antarctica - Adelie
     * Land coastal area
     * See CRS code 7072 for alternate system with horizontal axes in sequence lat-lon to be used for air, land and sea
     * navigation purposes.
     */
    public const EPSG_RGTAAF07_LON_LAT = 'urn:ogc:def:crs:EPSG::7087';

    /**
     * RGWF96
     * Extent: Wallis and Futuna - Uvea, Futuna, and Alofi
     * See CRS code 8901 for alternate system with horizontal axes reversed used by IGN for GIS purposes.
     */
    public const EPSG_RGWF96 = 'urn:ogc:def:crs:EPSG::8899';

    /**
     * RGWF96 (lon-lat)
     * Extent: Wallis and Futuna - Uvea, Futuna, and Alofi
     * See CRS code 8899 for system with horizontal axes in sequence lat-lon to be used for air, land and sea
     * navigation and safety of life purposes.
     */
    public const EPSG_RGWF96_LON_LAT = 'urn:ogc:def:crs:EPSG::8901';

    /**
     * RRAF 1991
     * Extent: French Antilles - Guadeloupe (including Grande Terre, Basse Terre, Marie Galante, Les Saintes, Iles de
     * la Petite Terre, La Desirade); Martinique; St Barthélemy; St Martin
     * Replaces older local 2D systems Fort Marigot and Sainte Anne CRS (codes 4621-22) in Guadeloupe and Fort Desaix
     * (CRS code 4625) in Martinique. Replaced by RGAF09 (CRS code 5488).
     */
    public const EPSG_RRAF_1991 = 'urn:ogc:def:crs:EPSG::4557';

    /**
     * RSAO13
     * Extent: Angola.
     */
    public const EPSG_RSAO13 = 'urn:ogc:def:crs:EPSG::8698';

    /**
     * RSRGD2000
     * Extent: Antarctica - Ross Sea Region - nominally between 160°E and 150°W but includes buffer on eastern
     * hemisphere margin to include Transantarctic Mountains.
     */
    public const EPSG_RSRGD2000 = 'urn:ogc:def:crs:EPSG::4885';

    /**
     * SHGD2015
     * Extent: St Helena, Ascension and Tristan da Cunha - St Helena Island - onshore
     * Closely aligned to SHGD2015 (CRS code xxxx) with difference attributable to different reference epoch and 10 cm
     * difference in ellipsoid height.
     */
    public const EPSG_SHGD2015 = 'urn:ogc:def:crs:EPSG::7885';

    /**
     * SIRGAS 1995
     * Extent: South America. Ecuador (mainland and Galapagos)
     * Replaced by SIRGAS 2000 (CRS code 4989).
     */
    public const EPSG_SIRGAS_1995 = 'urn:ogc:def:crs:EPSG::4975';

    /**
     * SIRGAS 2000
     * Extent: Latin America - Central America and South America. Brazil
     * Replaces SIRGAS 1995 system (CRS code 4975) for South America; expands SIRGAS to Central America.
     */
    public const EPSG_SIRGAS_2000 = 'urn:ogc:def:crs:EPSG::4989';

    /**
     * SIRGAS-CON DGF00P01
     * Extent: Latin America - Central America and South America
     * Replaced by SIRGAS-CON DGF01P01 (CRS code 8918).
     */
    public const EPSG_SIRGAS_CON_DGF00P01 = 'urn:ogc:def:crs:EPSG::8916';

    /**
     * SIRGAS-CON DGF01P01
     * Extent: Latin America - Central America and South America
     * Replaces SIRGAS-CON DGF00P01 (CRS code 8916). Replaced by SIRGAS-CON DGF01P02 (CRS code 8920).
     */
    public const EPSG_SIRGAS_CON_DGF01P01 = 'urn:ogc:def:crs:EPSG::8918';

    /**
     * SIRGAS-CON DGF01P02
     * Extent: Latin America - Central America and South America
     * Replaces SIRGAS-CON DGF01P01 (CRS code 8918). Replaced by SIRGAS-CON DGF02P01 (CRS code 8922).
     */
    public const EPSG_SIRGAS_CON_DGF01P02 = 'urn:ogc:def:crs:EPSG::8920';

    /**
     * SIRGAS-CON DGF02P01
     * Extent: Latin America - Central America and South America
     * Replaces SIRGAS-CON DGF01P02 (CRS code 8920). Replaced by SIRGAS-CON DGF04P01 (CRS code 8924).
     */
    public const EPSG_SIRGAS_CON_DGF02P01 = 'urn:ogc:def:crs:EPSG::8922';

    /**
     * SIRGAS-CON DGF04P01
     * Extent: Latin America - Central America and South America
     * Replaces SIRGAS-CON DGF02P01 (CRS code 8922). Replaced by SIRGAS-CON DGF05P01 (CRS code 8926).
     */
    public const EPSG_SIRGAS_CON_DGF04P01 = 'urn:ogc:def:crs:EPSG::8924';

    /**
     * SIRGAS-CON DGF05P01
     * Extent: Latin America - Central America and South America
     * Replaces SIRGAS-CON DGF04P01 (CRS code 8924). Replaced by SIRGAS-CON DGF06P01 (CRS code 8928).
     */
    public const EPSG_SIRGAS_CON_DGF05P01 = 'urn:ogc:def:crs:EPSG::8926';

    /**
     * SIRGAS-CON DGF06P01
     * Extent: Latin America - Central America and South America
     * Replaces SIRGAS-CON DGF05P01 (CRS code 8926). Replaced by SIRGAS-CON DGF07P01 (CRS code 8930).
     */
    public const EPSG_SIRGAS_CON_DGF06P01 = 'urn:ogc:def:crs:EPSG::8928';

    /**
     * SIRGAS-CON DGF07P01
     * Extent: Latin America - Central America and South America
     * Replaces SIRGAS-CON DGF06P01 (CRS code 8928). Replaced by SIRGAS-CON DGF08P01 (CRS code 8932).
     */
    public const EPSG_SIRGAS_CON_DGF07P01 = 'urn:ogc:def:crs:EPSG::8930';

    /**
     * SIRGAS-CON DGF08P01
     * Extent: Latin America - Central America and South America
     * Replaces SIRGAS-CON DGF07P01 (CRS code 8930). Replaced by SIRGAS-CON SIR09P01 (CRS code 8934).
     */
    public const EPSG_SIRGAS_CON_DGF08P01 = 'urn:ogc:def:crs:EPSG::8932';

    /**
     * SIRGAS-CON SIR09P01
     * Extent: Latin America - Central America and South America
     * Replaces SIRGAS-CON DGF08P01 (CRS code 8932). Replaced by SIRGAS-CON SIR10P01 (CRS code 8936).
     */
    public const EPSG_SIRGAS_CON_SIR09P01 = 'urn:ogc:def:crs:EPSG::8934';

    /**
     * SIRGAS-CON SIR10P01
     * Extent: Latin America - Central America and South America
     * Replaces SIRGAS-CON SIR09P01 (CRS code 8934). Replaced by SIRGAS-CON SIR11P01 (CRS code 8938).
     */
    public const EPSG_SIRGAS_CON_SIR10P01 = 'urn:ogc:def:crs:EPSG::8936';

    /**
     * SIRGAS-CON SIR11P01
     * Extent: Latin America - Central America and South America
     * Replaces SIRGAS-CON SIR10P01 (CRS code 8936). Replaced by SIRGAS-CON SIR13P01 (CRS code 8940).
     */
    public const EPSG_SIRGAS_CON_SIR11P01 = 'urn:ogc:def:crs:EPSG::8938';

    /**
     * SIRGAS-CON SIR13P01
     * Extent: Latin America - Central America and South America
     * Replaces SIRGAS-CON SIR11P01 (CRS code 8938). Replaced by SIRGAS-CON SIR14P01 (CRS code 8942).
     */
    public const EPSG_SIRGAS_CON_SIR13P01 = 'urn:ogc:def:crs:EPSG::8940';

    /**
     * SIRGAS-CON SIR14P01
     * Extent: Latin America - Central America and South America
     * Replaces SIRGAS-CON SIR13P01 (CRS code 8940). Replaced by SIRGAS-CON SIR15P01 (CRS code 8944).
     */
    public const EPSG_SIRGAS_CON_SIR14P01 = 'urn:ogc:def:crs:EPSG::8942';

    /**
     * SIRGAS-CON SIR15P01
     * Extent: Latin America - Central America and South America
     * Replaces SIRGAS-CON SIR14P01 (CRS code 8942). Replaced by SIRGAS-CON SIR17P01 (CRS code 8946).
     */
    public const EPSG_SIRGAS_CON_SIR15P01 = 'urn:ogc:def:crs:EPSG::8944';

    /**
     * SIRGAS-CON SIR17P01
     * Extent: Latin America - Central America and South America
     * Replaces SIRGAS-CON SIR15P01 (CRS code 8944).
     */
    public const EPSG_SIRGAS_CON_SIR17P01 = 'urn:ogc:def:crs:EPSG::8946';

    /**
     * SIRGAS-Chile 2002
     * Extent: Chile. Includes Easter Island, Juan Fernandez Islands, San Felix, and Sala y Gomez
     * Densification of SIRGAS 2000 within Chile. Replaced by SIRGAS-Chile 2010 (CRS code 8948).
     */
    public const EPSG_SIRGAS_CHILE_2002 = 'urn:ogc:def:crs:EPSG::5359';

    /**
     * SIRGAS-Chile 2010
     * Extent: Chile. Includes Easter Island, Juan Fernandez Islands, San Felix, and Sala y Gomez
     * Densification of SIRGAS-CON within Chile at epoch 2010.00. Replaces SIRGAS-Chile 2002 (CRS code 5359), replaced
     * by SIRGAS-Chile 2013 (CRS code 9147) due to significant tectonic deformation.
     */
    public const EPSG_SIRGAS_CHILE_2010 = 'urn:ogc:def:crs:EPSG::8948';

    /**
     * SIRGAS-Chile 2013
     * Extent: Chile. Includes Easter Island, Juan Fernandez Islands, San Felix, and Sala y Gomez
     * Densification of SIRGAS-CON within Chile at epoch 2013.00. Replaces SIRGAS-Chile 2010 (CRS code 8948), replaced
     * by SIRGAS-Chile 2016 (CRS code 9152) due to significant tectonic deformation.
     */
    public const EPSG_SIRGAS_CHILE_2013 = 'urn:ogc:def:crs:EPSG::9147';

    /**
     * SIRGAS-Chile 2016
     * Extent: Chile. Includes Easter Island, Juan Fernandez Islands, San Felix, and Sala y Gomez
     * Densification of SIRGAS-CON within Chile at epoch 2016.00. Replaces SIRGAS-Chile 2013 (CRS code 9147), replaced
     * by SIRGAS-Chile 2021 (CRS code 20040) due to significant tectonic deformation.
     */
    public const EPSG_SIRGAS_CHILE_2016 = 'urn:ogc:def:crs:EPSG::9152';

    /**
     * SIRGAS-Chile 2021
     * Extent: Chile. Includes Easter Island, Juan Fernandez Islands, San Felix, and Sala y Gomez
     * Densification of SIRGAS-CON within Chile at epoch 2021.00. Replaces SIRGAS-Chile 2016 (CRS code 9152) due to
     * significant tectonic deformation.
     */
    public const EPSG_SIRGAS_CHILE_2021 = 'urn:ogc:def:crs:EPSG::20040';

    /**
     * SIRGAS-ROU98
     * Extent: Uruguay
     * Densification of SIRGAS 1995 in Uruguay.
     */
    public const EPSG_SIRGAS_ROU98 = 'urn:ogc:def:crs:EPSG::5380';

    /**
     * SIRGAS_ES2007.8
     * Extent: El Salvador
     * Densification of SIRGAS 2000 within El Salvador.
     */
    public const EPSG_SIRGAS_ES2007_8 = 'urn:ogc:def:crs:EPSG::5392';

    /**
     * SRB_ETRS89
     * Extent: Serbia including Vojvodina
     * Replaces SREF98 (CRS code 4074).
     */
    public const EPSG_SRB_ETRS89 = 'urn:ogc:def:crs:EPSG::8684';

    /**
     * SREF98
     * Extent: Serbia including Vojvodina
     * Replaced by SRB_ETRS89 (STRS00) (CRS code 8684).
     */
    public const EPSG_SREF98 = 'urn:ogc:def:crs:EPSG::4074';

    /**
     * SRGI2013
     * Extent: Indonesia
     * Supports horizontal component of national horizontal control network (JKHN). Adopted 2013-10-11. Replaces DGN95
     * and all older systems.
     */
    public const EPSG_SRGI2013 = 'urn:ogc:def:crs:EPSG::9469';

    /**
     * SWEREF99
     * Extent: Sweden.
     */
    public const EPSG_SWEREF99 = 'urn:ogc:def:crs:EPSG::4977';

    /**
     * Saba
     * Extent: Bonaire, Sint Eustatius and Saba (BES Islands or Caribbean Netherlands) - Saba - onshore.
     */
    public const EPSG_SABA = 'urn:ogc:def:crs:EPSG::10635';

    /**
     * Sint Eustatius
     * Extent: Bonaire, Sint Eustatius and Saba (BES Islands or Caribbean Netherlands) - Sint Eustatius - onshore.
     */
    public const EPSG_SINT_EUSTATIUS = 'urn:ogc:def:crs:EPSG::10735';

    /**
     * Slovenia 1996
     * Extent: Slovenia.
     */
    public const EPSG_SLOVENIA_1996 = 'urn:ogc:def:crs:EPSG::4883';

    /**
     * St. Helena Tritan
     * Extent: St Helena, Ascension and Tristan da Cunha - St Helena Island - onshore
     * Closely aligned to SHGD2015 (CRS code 7885) with difference attributable to different reference epoch and 10 cm
     * difference in ellipsoid height. Replaced by SHGD2015 from 2015.
     */
    public const EPSG_ST_HELENA_TRITAN = 'urn:ogc:def:crs:EPSG::7880';

    /**
     * TGD2005
     * Extent: Tonga.
     */
    public const EPSG_TGD2005 = 'urn:ogc:def:crs:EPSG::5885';

    /**
     * TUREF
     * Extent: Turkey.
     */
    public const EPSG_TUREF = 'urn:ogc:def:crs:EPSG::5251';

    /**
     * TWD97
     * Extent: Taiwan, Republic of China - Taiwan Island, Penghu (Pescadores) Islands.
     */
    public const EPSG_TWD97 = 'urn:ogc:def:crs:EPSG::3823';

    /**
     * UCS-2000
     * Extent: Ukraine
     * Adopted 1st January 2007.
     */
    public const EPSG_UCS_2000 = 'urn:ogc:def:crs:EPSG::5560';

    /**
     * UGRF
     * Extent: Uganda.
     */
    public const EPSG_UGRF = 'urn:ogc:def:crs:EPSG::10790';

    /**
     * UZGD2024
     * Extent: Uzbekistan.
     */
    public const EPSG_UZGD2024 = 'urn:ogc:def:crs:EPSG::10724';

    /**
     * WGS 66
     * Extent: World
     * Replaced by WGS 72.
     */
    public const EPSG_WGS_66 = 'urn:ogc:def:crs:EPSG::4891';

    /**
     * WGS 72
     * Extent: World
     * Replaced by WGS 84.
     */
    public const EPSG_WGS_72 = 'urn:ogc:def:crs:EPSG::4985';

    /**
     * WGS 72BE
     * Extent: World
     * Broadcast ephemeris. Replaced by WGS 84.
     */
    public const EPSG_WGS_72BE = 'urn:ogc:def:crs:EPSG::4987';

    /**
     * WGS 84
     * Extent: World.
     */
    public const EPSG_WGS_84 = 'urn:ogc:def:crs:EPSG::4979';

    /**
     * WGS 84 (G1150)
     * Extent: World
     * Replaces WGS 84 (G873) (CRS code 7659) from 2002-01-20. Replaced by WGS 84 (G1674) (CRS code 7663) from
     * 2012-02-08.
     */
    public const EPSG_WGS_84_G1150 = 'urn:ogc:def:crs:EPSG::7661';

    /**
     * WGS 84 (G1674)
     * Extent: World
     * Replaces WGS 84 (G1150) (CRS code 7661) from 2012-02-08. Replaced by WGS 84 (G1762) (CRS code 7665) from
     * 2013-10-16.
     */
    public const EPSG_WGS_84_G1674 = 'urn:ogc:def:crs:EPSG::7663';

    /**
     * WGS 84 (G1762)
     * Extent: World
     * Replaces WGS 84 (G1674) (CRS code 7663) from 2013-10-16. Redesignated WGS 84 (G1762') in 2015 after changes to 7
     * NGA tracking station locations and antennas. Replaced by WGS 84 (G2139) (CRS code 9754) from 2021-01-03.
     */
    public const EPSG_WGS_84_G1762 = 'urn:ogc:def:crs:EPSG::7665';

    /**
     * WGS 84 (G2139)
     * Extent: World
     * Replaces WGS 84 (G1762) (CRS code 7665) from 2021-01-03. Replaced by WGS 84 (G2296) (CRS code 10605) from
     * 2024-01-07.
     */
    public const EPSG_WGS_84_G2139 = 'urn:ogc:def:crs:EPSG::9754';

    /**
     * WGS 84 (G2296)
     * Extent: World
     * Replaces WGS 84 (G2139) (CRS code 9754) from 2024-01-07.
     */
    public const EPSG_WGS_84_G2296 = 'urn:ogc:def:crs:EPSG::10605';

    /**
     * WGS 84 (G730)
     * Extent: World
     * Replaces WGS 84 (Transit) (CRS code 7816) from 1994-06-29. Replaced by WGS84 (G873) (CRS code 7659) from
     * 1997-01-29.
     */
    public const EPSG_WGS_84_G730 = 'urn:ogc:def:crs:EPSG::7657';

    /**
     * WGS 84 (G873)
     * Extent: World
     * Replaces WGS 84 (G730) (CRS code 7657) from 1997-01-29. Replaced by WGS 84 (G1150) (CRS code 7661) from
     * 2002-01-20.
     */
    public const EPSG_WGS_84_G873 = 'urn:ogc:def:crs:EPSG::7659';

    /**
     * WGS 84 (Transit)
     * Extent: World
     * Replaced by WGS84 (G730) (CRS code 7657) from 1994-06-29.
     */
    public const EPSG_WGS_84_TRANSIT = 'urn:ogc:def:crs:EPSG::7816';

    /**
     * Yemen NGN96
     * Extent: Yemen.
     */
    public const EPSG_YEMEN_NGN96 = 'urn:ogc:def:crs:EPSG::4981';

    /**
     * @deprecated use EPSG_LKS_92 instead
     */
    public const EPSG_LKS92 = 'urn:ogc:def:crs:EPSG::4949';

    /**
     * @deprecated use EPSG_KGD2002 instead
     */
    public const EPSG_KOREA_2000 = 'urn:ogc:def:crs:EPSG::4927';
    protected Geocentric|Geographic3D|null $baseCRS;

    /**
     * @var array<string, self>
     */
    private static array $cachedObjects = [
    ];

    public function __construct(string $srid, CoordinateSystem $coordinateSystem, Datum $datum, BoundingArea $boundingArea, string $name = '', Geocentric|self|null $baseCRS = null)
    {
        $this->srid = $srid;
        $this->coordinateSystem = $coordinateSystem;
        $this->datum = $datum;
        $this->boundingArea = $boundingArea;
        $this->name = $name;
        $this->baseCRS = $baseCRS;
        assert(count($coordinateSystem->getAxes()) === 3);
    }

    public function getBaseCRS(): Geocentric|self|null
    {
        return $this->baseCRS;
    }

    public static function fromSRID(string $srid): self
    {
        if (!isset(static::$sridData[$srid])) {
            throw new UnknownCoordinateReferenceSystemException($srid);
        }
        if (!isset(self::$cachedObjects[$srid])) {
            $data = static::$sridData[$srid];
            $baseCRS = $data['base_crs'] ? CoordinateReferenceSystem::fromSRID($data['base_crs']) : null;
            assert($baseCRS === null || $baseCRS instanceof Geocentric || $baseCRS instanceof self);
            $extent = $data['extent'] instanceof BoundingArea ? $data['extent'] : BoundingArea::createFromExtentCodes($data['extent']);
            self::$cachedObjects[$srid] = new self($srid, Ellipsoidal::fromSRID($data['coordinate_system']), Datum::fromSRID($data['datum']), $extent, $data['name'], $baseCRS);
        }

        return self::$cachedObjects[$srid];
    }

    /**
     * @return array<string, string>
     */
    public static function getSupportedSRIDs(): array
    {
        return array_map(fn (array $data) => $data['name'], static::$sridData);
    }

    /**
     * @return array<string, array{name: string, extent_description: string, help: string}>
     */
    public static function getSupportedSRIDsWithHelp(): array
    {
        return array_map(fn (array $data) => [
            'name' => $data['name'],
            'extent_description' => $data['name'],
            'help' => $data['help'],
        ], static::$sridData);
    }

    public static function registerCustomCRS(string $srid, string $name, string $coordinateSystemSrid, string $datumSrid, BoundingArea $extent, ?string $baseCRSSrid = null, string $help = ''): void
    {
        self::$sridData[$srid] = [
            'name' => $name,
            'coordinate_system' => $coordinateSystemSrid,
            'datum' => $datumSrid,
            'extent' => $extent,
            'extent_description' => '',
            'base_crs' => $baseCRSSrid,
            'help' => $help,
        ];
    }
}
