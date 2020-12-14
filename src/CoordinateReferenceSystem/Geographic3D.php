<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\CoordinateReferenceSystem;

use function assert;
use function count;
use PHPCoord\CoordinateSystem\CoordinateSystem;
use PHPCoord\CoordinateSystem\Ellipsoidal;
use PHPCoord\Datum\Datum;
use PHPCoord\Exception\UnknownCoordinateReferenceSystemException;

class Geographic3D extends Geographic
{
    /**
     * ATRF2014
     * Extent: Australia including Lord Howe Island, Macquarie Islands, Ashmore and Cartier Islands, Christmas Island,
     * Cocos (Keeling) Islands, Norfolk Island. All onshore and offshore.
     */
    public const EPSG_ATRF2014 = 'urn:ogc:def:crs:EPSG::9308';

    /**
     * Australian Antarctic
     * Extent: Antarctica between 45°E and 136°E and between 142°E and 160°E - Australian sector.
     */
    public const EPSG_AUSTRALIAN_ANTARCTIC = 'urn:ogc:def:crs:EPSG::4931';

    /**
     * BDA2000
     * Extent: Bermuda - onshore and offshore.
     */
    public const EPSG_BDA2000 = 'urn:ogc:def:crs:EPSG::4887';

    /**
     * BGS2005
     * Extent: Bulgaria - onshore and offshore.
     * Adopted 2010-07-29.
     */
    public const EPSG_BGS2005 = 'urn:ogc:def:crs:EPSG::7797';

    /**
     * CGRS93
     * Extent: Cyprus - onshore.
     */
    public const EPSG_CGRS93 = 'urn:ogc:def:crs:EPSG::6310';

    /**
     * CHTRF95
     * Extent: Liechtenstein; Switzerland.
     * Referenced to ETRS89 at epoch 1993.0. For CRS used for topographic and cadastral purposes see CH1903+ (CRS code
     * 4150).
     */
    public const EPSG_CHTRF95 = 'urn:ogc:def:crs:EPSG::4933';

    /**
     * CIGD11
     * Extent: Cayman Islands - onshore and offshore. Includes Grand Cayman, Little Cayman and Cayman Brac.
     */
    public const EPSG_CIGD11 = 'urn:ogc:def:crs:EPSG::6134';

    /**
     * CR-SIRGAS
     * Extent: Costa Rica - onshore and offshore.
     * Replaces CR05 (CRS code 5364) from April 2018.
     */
    public const EPSG_CR_SIRGAS = 'urn:ogc:def:crs:EPSG::8906';

    /**
     * CR05
     * Extent: Costa Rica - onshore and offshore.
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
     * Extent: China - onshore and offshore.
     */
    public const EPSG_CHINA_GEODETIC_COORDINATE_SYSTEM_2000 = 'urn:ogc:def:crs:EPSG::4480';

    /**
     * DB_REF
     * Extent: Germany - onshore - states of Baden-Wurtemberg, Bayern, Berlin, Brandenburg, Bremen, Hamburg, Hessen,
     * Mecklenburg-Vorpommern, Niedersachsen, Nordrhein-Westfalen, Rheinland-Pfalz, Saarland, Sachsen, Sachsen-Anhalt,
     * Schleswig-Holstein, Thuringen.
     */
    public const EPSG_DB_REF = 'urn:ogc:def:crs:EPSG::5830';

    /**
     * DGN95
     * Extent: Indonesia - onshore and offshore.
     */
    public const EPSG_DGN95 = 'urn:ogc:def:crs:EPSG::4898';

    /**
     * DRUKREF 03
     * Extent: Bhutan.
     */
    public const EPSG_DRUKREF_03 = 'urn:ogc:def:crs:EPSG::5263';

    /**
     * EST97
     * Extent: Estonia - onshore and offshore.
     */
    public const EPSG_EST97 = 'urn:ogc:def:crs:EPSG::4935';

    /**
     * ETRF2000
     * Extent: Europe - onshore and offshore: Albania; Andorra; Austria; Belgium; Bosnia and Herzegovina; Bulgaria;
     * Croatia; Cyprus; Czechia; Denmark; Estonia; Faroe Islands; Finland; France; Germany; Gibraltar; Greece; Hungary;
     * Ireland; Italy; Kosovo; Latvia; Liechtenstein; Lithuania; Luxembourg; Malta; Moldova; Monaco; Montenegro;
     * Netherlands; North Macedonia; Norway including Svalbard and Jan Mayen; Poland; Portugal; Romania; San Marino;
     * Serbia; Slovakia; Slovenia; Spain; Sweden; Switzerland; United Kingdom (UK) including Channel Islands and Isle
     * of Man; Vatican City State.
     * Replaces ETRF97 (code 7929). On the publication of ETRF2005 (code 8399),  the EUREF Technical Working Group
     * recommended that ETRF2000 be the realization of ETRS89. ETRF2014 (code 8403) is technically superior to all
     * earlier realizations of ETRS89.
     */
    public const EPSG_ETRF2000 = 'urn:ogc:def:crs:EPSG::7931';

    /**
     * ETRF2005
     * Extent: Europe - onshore and offshore: Albania; Andorra; Austria; Belgium; Bosnia and Herzegovina; Bulgaria;
     * Croatia; Cyprus; Czechia; Denmark; Estonia; Faroe Islands; Finland; France; Germany; Gibraltar; Greece; Hungary;
     * Ireland; Italy; Kosovo; Latvia; Liechtenstein; Lithuania; Luxembourg; Malta; Moldova; Monaco; Montenegro;
     * Netherlands; North Macedonia; Norway including Svalbard and Jan Mayen; Poland; Portugal; Romania; San Marino;
     * Serbia; Slovakia; Slovenia; Spain; Sweden; Switzerland; United Kingdom (UK) including Channel Islands and Isle
     * of Man; Vatican City State.
     * On publication in 2007 of this CRS, the EUREF Technical Working Group recommended that ETRF2000 (EPSG code 7931)
     * remained as the preferred realization of ETRS89. Replaced by ETRF2014 (code 8403).
     */
    public const EPSG_ETRF2005 = 'urn:ogc:def:crs:EPSG::8399';

    /**
     * ETRF2014
     * Extent: Europe - onshore and offshore: Albania; Andorra; Austria; Belgium; Bosnia and Herzegovina; Bulgaria;
     * Croatia; Cyprus; Czechia; Denmark; Estonia; Faroe Islands; Finland; France; Germany; Gibraltar; Greece; Hungary;
     * Ireland; Italy; Kosovo; Latvia; Liechtenstein; Lithuania; Luxembourg; Malta; Moldova; Monaco; Montenegro;
     * Netherlands; North Macedonia; Norway including Svalbard and Jan Mayen; Poland; Portugal; Romania; San Marino;
     * Serbia; Slovakia; Slovenia; Spain; Sweden; Switzerland; United Kingdom (UK) including Channel Islands and Isle
     * of Man; Vatican City State.
     * Replaces ETRF2005 (code 8399). ETRF2014 is technically superior to ETRF2000 but ETRF2000 and other previous
     * realizations may be preferred for backward compatibility reasons. Differences between ETRF2014 and ETRF2000 can
     * reach 7cm.
     */
    public const EPSG_ETRF2014 = 'urn:ogc:def:crs:EPSG::8403';

    /**
     * ETRF89
     * Extent: Europe - onshore and offshore: Albania; Andorra; Austria; Belgium; Bosnia and Herzegovina; Bulgaria;
     * Croatia; Cyprus; Czechia; Denmark; Estonia; Faroe Islands; Finland; France; Germany; Gibraltar; Greece; Hungary;
     * Ireland; Italy; Kosovo; Latvia; Liechtenstein; Lithuania; Luxembourg; Malta; Moldova; Monaco; Montenegro;
     * Netherlands; North Macedonia; Norway including Svalbard and Jan Mayen; Poland; Portugal; Romania; San Marino;
     * Serbia; Slovakia; Slovenia; Spain; Sweden; Switzerland; United Kingdom (UK) including Channel Islands and Isle
     * of Man; Vatican City State.
     * Replaced by ETRF90 (code 7917).
     */
    public const EPSG_ETRF89 = 'urn:ogc:def:crs:EPSG::7915';

    /**
     * ETRF90
     * Extent: Europe - onshore and offshore: Albania; Andorra; Austria; Belgium; Bosnia and Herzegovina; Bulgaria;
     * Croatia; Cyprus; Czechia; Denmark; Estonia; Faroe Islands; Finland; France; Germany; Gibraltar; Greece; Hungary;
     * Ireland; Italy; Kosovo; Latvia; Liechtenstein; Lithuania; Luxembourg; Malta; Moldova; Monaco; Montenegro;
     * Netherlands; North Macedonia; Norway including Svalbard and Jan Mayen; Poland; Portugal; Romania; San Marino;
     * Serbia; Slovakia; Slovenia; Spain; Sweden; Switzerland; United Kingdom (UK) including Channel Islands and Isle
     * of Man; Vatican City State.
     * Replaces ETRF89 (code 7915). Replaced by ETRF91 (code 7919).
     */
    public const EPSG_ETRF90 = 'urn:ogc:def:crs:EPSG::7917';

    /**
     * ETRF91
     * Extent: Europe - onshore and offshore: Albania; Andorra; Austria; Belgium; Bosnia and Herzegovina; Bulgaria;
     * Croatia; Cyprus; Czechia; Denmark; Estonia; Faroe Islands; Finland; France; Germany; Gibraltar; Greece; Hungary;
     * Ireland; Italy; Kosovo; Latvia; Liechtenstein; Lithuania; Luxembourg; Malta; Moldova; Monaco; Montenegro;
     * Netherlands; North Macedonia; Norway including Svalbard and Jan Mayen; Poland; Portugal; Romania; San Marino;
     * Serbia; Slovakia; Slovenia; Spain; Sweden; Switzerland; United Kingdom (UK) including Channel Islands and Isle
     * of Man; Vatican City State.
     * Replaces ETRF90 (code 7917). Replaced by ETRF92 (code 7921).
     */
    public const EPSG_ETRF91 = 'urn:ogc:def:crs:EPSG::7919';

    /**
     * ETRF92
     * Extent: Europe - onshore and offshore: Albania; Andorra; Austria; Belgium; Bosnia and Herzegovina; Bulgaria;
     * Croatia; Cyprus; Czechia; Denmark; Estonia; Faroe Islands; Finland; France; Germany; Gibraltar; Greece; Hungary;
     * Ireland; Italy; Kosovo; Latvia; Liechtenstein; Lithuania; Luxembourg; Malta; Moldova; Monaco; Montenegro;
     * Netherlands; North Macedonia; Norway including Svalbard and Jan Mayen; Poland; Portugal; Romania; San Marino;
     * Serbia; Slovakia; Slovenia; Spain; Sweden; Switzerland; United Kingdom (UK) including Channel Islands and Isle
     * of Man; Vatican City State.
     * Replaces ETRF91 (code 7919). Replaced by ETRF93 (code 7923).
     */
    public const EPSG_ETRF92 = 'urn:ogc:def:crs:EPSG::7921';

    /**
     * ETRF93
     * Extent: Europe - onshore and offshore: Albania; Andorra; Austria; Belgium; Bosnia and Herzegovina; Bulgaria;
     * Croatia; Cyprus; Czechia; Denmark; Estonia; Faroe Islands; Finland; France; Germany; Gibraltar; Greece; Hungary;
     * Ireland; Italy; Kosovo; Latvia; Liechtenstein; Lithuania; Luxembourg; Malta; Moldova; Monaco; Montenegro;
     * Netherlands; North Macedonia; Norway including Svalbard and Jan Mayen; Poland; Portugal; Romania; San Marino;
     * Serbia; Slovakia; Slovenia; Spain; Sweden; Switzerland; United Kingdom (UK) including Channel Islands and Isle
     * of Man; Vatican City State.
     * Replaces ETRF92 (code 7921). Replaced by ETRF94 (code 7925).
     */
    public const EPSG_ETRF93 = 'urn:ogc:def:crs:EPSG::7923';

    /**
     * ETRF94
     * Extent: Europe - onshore and offshore: Albania; Andorra; Austria; Belgium; Bosnia and Herzegovina; Bulgaria;
     * Croatia; Cyprus; Czechia; Denmark; Estonia; Faroe Islands; Finland; France; Germany; Gibraltar; Greece; Hungary;
     * Ireland; Italy; Kosovo; Latvia; Liechtenstein; Lithuania; Luxembourg; Malta; Moldova; Monaco; Montenegro;
     * Netherlands; North Macedonia; Norway including Svalbard and Jan Mayen; Poland; Portugal; Romania; San Marino;
     * Serbia; Slovakia; Slovenia; Spain; Sweden; Switzerland; United Kingdom (UK) including Channel Islands and Isle
     * of Man; Vatican City State.
     * Replaces ETRF93 (code 7923). Replaced by ETRF96 (code 7927).
     */
    public const EPSG_ETRF94 = 'urn:ogc:def:crs:EPSG::7925';

    /**
     * ETRF96
     * Extent: Europe - onshore and offshore: Albania; Andorra; Austria; Belgium; Bosnia and Herzegovina; Bulgaria;
     * Croatia; Cyprus; Czechia; Denmark; Estonia; Faroe Islands; Finland; France; Germany; Gibraltar; Greece; Hungary;
     * Ireland; Italy; Kosovo; Latvia; Liechtenstein; Lithuania; Luxembourg; Malta; Moldova; Monaco; Montenegro;
     * Netherlands; North Macedonia; Norway including Svalbard and Jan Mayen; Poland; Portugal; Romania; San Marino;
     * Serbia; Slovakia; Slovenia; Spain; Sweden; Switzerland; United Kingdom (UK) including Channel Islands and Isle
     * of Man; Vatican City State.
     * Replaces ETRF94 (code 7925). Replaced by ETRF97 (code 7929).
     */
    public const EPSG_ETRF96 = 'urn:ogc:def:crs:EPSG::7927';

    /**
     * ETRF97
     * Extent: Europe - onshore and offshore: Albania; Andorra; Austria; Belgium; Bosnia and Herzegovina; Bulgaria;
     * Croatia; Cyprus; Czechia; Denmark; Estonia; Faroe Islands; Finland; France; Germany; Gibraltar; Greece; Hungary;
     * Ireland; Italy; Kosovo; Latvia; Liechtenstein; Lithuania; Luxembourg; Malta; Moldova; Monaco; Montenegro;
     * Netherlands; North Macedonia; Norway including Svalbard and Jan Mayen; Poland; Portugal; Romania; San Marino;
     * Serbia; Slovakia; Slovenia; Spain; Sweden; Switzerland; United Kingdom (UK) including Channel Islands and Isle
     * of Man; Vatican City State.
     * Replaces ETRF96 (code 7927). Replaced by ETRF2000 (code 7931).
     */
    public const EPSG_ETRF97 = 'urn:ogc:def:crs:EPSG::7929';

    /**
     * ETRS89
     * Extent: Europe - onshore and offshore: Albania; Andorra; Austria; Belgium; Bosnia and Herzegovina; Bulgaria;
     * Croatia; Cyprus; Czechia; Denmark; Estonia; Faroe Islands; Finland; France; Germany; Gibraltar; Greece; Hungary;
     * Ireland; Italy; Kosovo; Latvia; Liechtenstein; Lithuania; Luxembourg; Malta; Moldova; Monaco; Montenegro;
     * Netherlands; North Macedonia; Norway including Svalbard and Jan Mayen; Poland; Portugal; Romania; San Marino;
     * Serbia; Slovakia; Slovenia; Spain; Sweden; Switzerland; United Kingdom (UK) including Channel Islands and Isle
     * of Man; Vatican City State.
     * Has been realized through ETRF89, ETRF90, ETRF91, ETRF92, ETRF93, ETRF94, ETRF96, ETRF97, ETRF2000, ETRF2005 and
     * ETRF2014. This 'ensemble' covers any or all of these realizations without distinction.
     */
    public const EPSG_ETRS89 = 'urn:ogc:def:crs:EPSG::4937';

    /**
     * FEH2010
     * Extent: Fehmarnbelt area of Denmark and Germany.
     */
    public const EPSG_FEH2010 = 'urn:ogc:def:crs:EPSG::5592';

    /**
     * GDA2020
     * Extent: Australia including Lord Howe Island, Macquarie Islands, Ashmore and Cartier Islands, Christmas Island,
     * Cocos (Keeling) Islands, Norfolk Island. All onshore and offshore.
     */
    public const EPSG_GDA2020 = 'urn:ogc:def:crs:EPSG::7843';

    /**
     * GDA94
     * Extent: Australia including Lord Howe Island, Macquarie Islands, Ashmore and Cartier Islands, Christmas Island,
     * Cocos (Keeling) Islands, Norfolk Island. All onshore and offshore.
     */
    public const EPSG_GDA94 = 'urn:ogc:def:crs:EPSG::4939';

    /**
     * GDBD2009
     * Extent: Brunei Darussalam - onshore and offshore.
     */
    public const EPSG_GDBD2009 = 'urn:ogc:def:crs:EPSG::5245';

    /**
     * GDM2000
     * Extent: Malaysia - onshore and offshore. Includes peninsular Malayasia, Sabah and Sarawak.
     */
    public const EPSG_GDM2000 = 'urn:ogc:def:crs:EPSG::4921';

    /**
     * GR96
     * Extent: Greenland - onshore and offshore.
     */
    public const EPSG_GR96 = 'urn:ogc:def:crs:EPSG::4909';

    /**
     * GSK-2011
     * Extent: Russian Federation - onshore and offshore.
     */
    public const EPSG_GSK_2011 = 'urn:ogc:def:crs:EPSG::7682';

    /**
     * HTRS96
     * Extent: Croatia - onshore and offshore.
     */
    public const EPSG_HTRS96 = 'urn:ogc:def:crs:EPSG::4889';

    /**
     * Hartebeesthoek94
     * Extent: Eswatini (Swaziland); Lesotho; South Africa - onshore and offshore.
     */
    public const EPSG_HARTEBEESTHOEK94 = 'urn:ogc:def:crs:EPSG::4941';

    /**
     * Hong Kong Geodetic CS
     * Extent: China - Hong Kong - onshore and offshore.
     * Locally sometimes referred to as ITRF96 or WGS 84, these are not strictly correct.
     */
    public const EPSG_HONG_KONG_GEODETIC_CS = 'urn:ogc:def:crs:EPSG::8426';

    /**
     * IG05 Intermediate CRS
     * Extent: Israel - onshore; Palestine Territory - onshore.
     * Intermediate system not used for spatial referencing - use IGD05 (CRS code 6979).
     */
    public const EPSG_IG05_INTERMEDIATE_CRS = 'urn:ogc:def:crs:EPSG::6982';

    /**
     * IG05/12 Intermediate CRS
     * Extent: Israel - onshore; Palestine Territory - onshore.
     * Intermediate system not used for spatial referencing - use IGD05/12 (CRS code 6986).
     */
    public const EPSG_IG05_12_INTERMEDIATE_CRS = 'urn:ogc:def:crs:EPSG::6989';

    /**
     * IGD05
     * Extent: Israel - onshore and offshore.
     * Replaced by IGD05/12 (CRS code 7138).
     */
    public const EPSG_IGD05 = 'urn:ogc:def:crs:EPSG::7135';

    /**
     * IGD05/12
     * Extent: Israel - onshore and offshore.
     * Replaces IGD05 (CRS code 7135).
     */
    public const EPSG_IGD05_12 = 'urn:ogc:def:crs:EPSG::7138';

    /**
     * IGM95
     * Extent: Italy - onshore and offshore; San Marino, Vatican City State.
     * Replaced by RDN2008 (CRS code 6705) from 2011-11-10.
     */
    public const EPSG_IGM95 = 'urn:ogc:def:crs:EPSG::4983';

    /**
     * IGRS
     * Extent: Iraq - onshore and offshore.
     */
    public const EPSG_IGRS = 'urn:ogc:def:crs:EPSG::3888';

    /**
     * IGS00
     * Extent: World.
     * Adopted by the International GNSS Service (IGS) from 2001-12-02 through 2004-01-10. Replaces IGS97, replaced by
     * IGb00 (CRS codes 9002 and 9008). For all practical purposes IGS00 is equivalent to ITRF2000.
     */
    public const EPSG_IGS00 = 'urn:ogc:def:crs:EPSG::9005';

    /**
     * IGS05
     * Extent: World.
     * Adopted by the International GNSS Service (IGS) from 2006-11-05 through 2011-04-16. Replaces IGb00, replaced by
     * IGS08 (CRS codes 9008 and 9013). For all practical purposes IGS05 is equivalent to ITRF2005.
     */
    public const EPSG_IGS05 = 'urn:ogc:def:crs:EPSG::9011';

    /**
     * IGS08
     * Extent: World.
     * Used for products from International GNSS Service (IGS) analysis centres from 2011-04-17 through 2012-10-06.
     * Replaces IGS05 (code 9011). Replaced by IGb08 (code 9016). For most practical purposes IGS08 is equivalent to
     * ITRF2008.
     */
    public const EPSG_IGS08 = 'urn:ogc:def:crs:EPSG::9013';

    /**
     * IGS14
     * Extent: World.
     * Used for products from the International GNSS Service (IGS) from 2017-01-29 to 2020-05-16. Replaces IGb08 (code
     * 9016), replaced by IGb14 (code 9379). For most practical purposes IGS14 is equivalent to ITRF2014.
     */
    public const EPSG_IGS14 = 'urn:ogc:def:crs:EPSG::9018';

    /**
     * IGS97
     * Extent: World.
     * Adopted by the International GNSS Service (IGS) from 2000-06-04 through 2001-12-01. Replaced by IGS00 (CRS code
     * 9005). For all practical purposes IGS97 is equivalent to ITRF97.
     */
    public const EPSG_IGS97 = 'urn:ogc:def:crs:EPSG::9002';

    /**
     * IGb00
     * Extent: World.
     * Adopted by the International GNSS Service (IGS) from 2004-01-11 through 2006-11-04. Replaces IGS00, replaced by
     * IGS05 (CRS codes 9005 and 9011). For all practical purposes IGb00 is equivalent to ITRF2000.
     */
    public const EPSG_IGB00 = 'urn:ogc:def:crs:EPSG::9008';

    /**
     * IGb08
     * Extent: World.
     * Adopted by the International GNSS Service (IGS) from 2012-10-07 through 2017-01-28. Replaces IGS08, replaced by
     * IGS14 (CRS codes 9013 and 9018). For all practical purposes IGb08 is equivalent to ITRF2008.
     */
    public const EPSG_IGB08 = 'urn:ogc:def:crs:EPSG::9016';

    /**
     * IGb14
     * Extent: World.
     * Used for products from the International GNSS Service (IGS) from 2020-05-17. Replaces IGS14 (code 9018). For
     * most practical purposes IGb14 is equivalent to ITRF2014.
     */
    public const EPSG_IGB14 = 'urn:ogc:def:crs:EPSG::9379';

    /**
     * IRENET95
     * Extent: Ireland - onshore. United Kingdom (UK) - Northern Ireland (Ulster) - onshore.
     */
    public const EPSG_IRENET95 = 'urn:ogc:def:crs:EPSG::4943';

    /**
     * ISN2004
     * Extent: Iceland - onshore and offshore.
     * Replaces ISN93 (CRS code 4945).
     */
    public const EPSG_ISN2004 = 'urn:ogc:def:crs:EPSG::5323';

    /**
     * ISN2016
     * Extent: Iceland - onshore and offshore.
     * Replaces ISN2004 (CRS code 5323) from September 2017.
     */
    public const EPSG_ISN2016 = 'urn:ogc:def:crs:EPSG::8085';

    /**
     * ISN93
     * Extent: Iceland - onshore and offshore.
     * Replaced by ISN2004 (CRS code 5323).
     */
    public const EPSG_ISN93 = 'urn:ogc:def:crs:EPSG::4945';

    /**
     * ITRF2000
     * Extent: World.
     * Replaces ITRF97 (code 7908). Replaced by ITRF2005 (code 7910).
     */
    public const EPSG_ITRF2000 = 'urn:ogc:def:crs:EPSG::7909';

    /**
     * ITRF2005
     * Extent: World.
     * Replaces ITRF2000 (code 7909). Replaced by ITRF2008 (code 7911).
     */
    public const EPSG_ITRF2005 = 'urn:ogc:def:crs:EPSG::7910';

    /**
     * ITRF2008
     * Extent: World.
     * Replaces ITRF2005 (code 7910). Replaced by ITRF2014 (code 7912).
     */
    public const EPSG_ITRF2008 = 'urn:ogc:def:crs:EPSG::7911';

    /**
     * ITRF2014
     * Extent: World.
     * Replaces ITRF2008 (code 7911).
     */
    public const EPSG_ITRF2014 = 'urn:ogc:def:crs:EPSG::7912';

    /**
     * ITRF88
     * Extent: World.
     * Replaced by ITRF89 (code 7901).
     */
    public const EPSG_ITRF88 = 'urn:ogc:def:crs:EPSG::7900';

    /**
     * ITRF89
     * Extent: World.
     * Replaces ITRF88 (code 7900). Replaced by ITRF90 (code 7902).
     */
    public const EPSG_ITRF89 = 'urn:ogc:def:crs:EPSG::7901';

    /**
     * ITRF90
     * Extent: World.
     * Replaces ITRF89 (code 7901). Replaced by ITRF91 (code 7903).
     */
    public const EPSG_ITRF90 = 'urn:ogc:def:crs:EPSG::7902';

    /**
     * ITRF91
     * Extent: World.
     * Replaces ITRF90 (code 7902). Replaced by ITRF92 (code 7904).
     */
    public const EPSG_ITRF91 = 'urn:ogc:def:crs:EPSG::7903';

    /**
     * ITRF92
     * Extent: World.
     * Replaces ITRF91 (code 7903). Replaced by ITRF93 (code 7905).
     */
    public const EPSG_ITRF92 = 'urn:ogc:def:crs:EPSG::7904';

    /**
     * ITRF93
     * Extent: World.
     * Replaces ITRF92 (code 7904). Replaced by ITRF94 (code 7906).
     */
    public const EPSG_ITRF93 = 'urn:ogc:def:crs:EPSG::7905';

    /**
     * ITRF94
     * Extent: World.
     * Replaces ITRF93 (code 7905). Replaced by ITRF96 (code 7907).
     */
    public const EPSG_ITRF94 = 'urn:ogc:def:crs:EPSG::7906';

    /**
     * ITRF96
     * Extent: World.
     * Replaces ITRF94 (code 7906). Replaced by ITRF97 (code 7908).
     */
    public const EPSG_ITRF96 = 'urn:ogc:def:crs:EPSG::7907';

    /**
     * ITRF97
     * Extent: World.
     * Replaces ITRF96 (code 7907). Replaced by ITRF2000 (code 7909).
     */
    public const EPSG_ITRF97 = 'urn:ogc:def:crs:EPSG::7908';

    /**
     * JAD2001
     * Extent: Jamaica - onshore and offshore. Includes Morant Cays and Pedro Cays.
     */
    public const EPSG_JAD2001 = 'urn:ogc:def:crs:EPSG::4895';

    /**
     * JGD2000
     * Extent: Japan - onshore and offshore.
     * From 21st October 2011 replaced by JGD2011 (CRS code 6667).
     */
    public const EPSG_JGD2000 = 'urn:ogc:def:crs:EPSG::4947';

    /**
     * JGD2011
     * Extent: Japan - onshore and offshore.
     * Replaces JGD2000 (CRS code 4947) with effect from 21st October 2011.
     */
    public const EPSG_JGD2011 = 'urn:ogc:def:crs:EPSG::6667';

    /**
     * KOSOVAREF01
     * Extent: Kosovo.
     */
    public const EPSG_KOSOVAREF01 = 'urn:ogc:def:crs:EPSG::9139';

    /**
     * KSA-GRF17
     * Extent: Saudi Arabia - onshore and offshore.
     */
    public const EPSG_KSA_GRF17 = 'urn:ogc:def:crs:EPSG::9332';

    /**
     * Korea 2000
     * Extent: Republic of Korea (South Korea) - onshore and offshore.
     */
    public const EPSG_KOREA_2000 = 'urn:ogc:def:crs:EPSG::4927';

    /**
     * Kyrg-06
     * Extent: Kyrgyzstan.
     */
    public const EPSG_KYRG_06 = 'urn:ogc:def:crs:EPSG::7685';

    /**
     * LGD2006
     * Extent: Libya - onshore and offshore.
     */
    public const EPSG_LGD2006 = 'urn:ogc:def:crs:EPSG::4900';

    /**
     * LKS92
     * Extent: Latvia - onshore and offshore.
     */
    public const EPSG_LKS92 = 'urn:ogc:def:crs:EPSG::4949';

    /**
     * LKS94
     * Extent: Lithuania - onshore and offshore.
     */
    public const EPSG_LKS94 = 'urn:ogc:def:crs:EPSG::4951';

    /**
     * Lao 1993
     * Extent: Laos.
     * Replaced by Lao 1997. Lao 1993 coordinate values are within 1m of Lao 1997 values.
     */
    public const EPSG_LAO_1993 = 'urn:ogc:def:crs:EPSG::4991';

    /**
     * Lao 1997
     * Extent: Laos.
     * Replaces Lao 1993. Lao 1993 coordinate values are within 1m of Lao 1997 values.
     */
    public const EPSG_LAO_1997 = 'urn:ogc:def:crs:EPSG::4993';

    /**
     * MACARIO SOLIS
     * Extent: Panama - onshore and offshore.
     * Densification of SIRGAS 2000 within Panama.
     */
    public const EPSG_MACARIO_SOLIS = 'urn:ogc:def:crs:EPSG::5370';

    /**
     * MAGNA-SIRGAS
     * Extent: Colombia - onshore and offshore. Includes San Andres y Providencia, Malpelo Islands, Roncador Bank,
     * Serrana Bank and Serranilla Bank.
     */
    public const EPSG_MAGNA_SIRGAS = 'urn:ogc:def:crs:EPSG::4997';

    /**
     * MARGEN
     * Extent: Bolivia.
     */
    public const EPSG_MARGEN = 'urn:ogc:def:crs:EPSG::5353';

    /**
     * MGI
     * Extent: Austria.
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
     * Extent: Saudi Arabia - onshore and offshore.
     */
    public const EPSG_MTRF_2000 = 'urn:ogc:def:crs:EPSG::8817';

    /**
     * Macao 2008
     * Extent: China - Macao - onshore and offshore.
     * Locally sometimes referred to as ITRF2005, this is not strictly correct.
     */
    public const EPSG_MACAO_2008 = 'urn:ogc:def:crs:EPSG::8430';

    /**
     * Mauritania 1999
     * Extent: Mauritania - onshore and offshore.
     */
    public const EPSG_MAURITANIA_1999 = 'urn:ogc:def:crs:EPSG::4925';

    /**
     * Mexico ITRF2008
     * Extent: Mexico - onshore and offshore.
     * Replaces Mexico ITRF92 (CRS code 4482) from December 2010.
     */
    public const EPSG_MEXICO_ITRF2008 = 'urn:ogc:def:crs:EPSG::6364';

    /**
     * Mexico ITRF92
     * Extent: Mexico - onshore and offshore.
     * Replaced by Mexico ITRF2008 (CRS code 6364) from December 2010.
     */
    public const EPSG_MEXICO_ITRF92 = 'urn:ogc:def:crs:EPSG::4482';

    /**
     * Moznet
     * Extent: Mozambique - onshore and offshore.
     */
    public const EPSG_MOZNET = 'urn:ogc:def:crs:EPSG::4953';

    /**
     * NAD83(2011)
     * Extent: Puerto Rico - onshore and offshore. United States (USA) onshore and offshore - Alabama; Alaska; Arizona;
     * Arkansas; California; Colorado; Connecticut; Delaware; Florida; Georgia; Idaho; Illinois; Indiana; Iowa; Kansas;
     * Kentucky; Louisiana; Maine; Maryland; Massachusetts; Michigan; Minnesota; Mississippi; Missouri; Montana;
     * Nebraska; Nevada; New Hampshire; New Jersey; New Mexico; New York; North Carolina; North Dakota; Ohio; Oklahoma;
     * Oregon; Pennsylvania; Rhode Island; South Carolina; South Dakota; Tennessee; Texas; Utah; Vermont; Virginia;
     * Washington; West Virginia; Wisconsin; Wyoming. US Virgin Islands - onshore and offshore.
     * Note: this CRS includes longitudes which are POSITIVE EAST. Replaces NAD83(CORS96) and NAD83(NSRS2007) (CRS
     * codes 6782 and 4893).
     */
    public const EPSG_NAD83_2011 = 'urn:ogc:def:crs:EPSG::6319';

    /**
     * NAD83(CORS96)
     * Extent: Puerto Rico - onshore and offshore. United States (USA) onshore and offshore - Alabama; Alaska; Arizona;
     * Arkansas; California; Colorado; Connecticut; Delaware; Florida; Georgia; Idaho; Illinois; Indiana; Iowa; Kansas;
     * Kentucky; Louisiana; Maine; Maryland; Massachusetts; Michigan; Minnesota; Mississippi; Missouri; Montana;
     * Nebraska; Nevada; New Hampshire; New Jersey; New Mexico; New York; North Carolina; North Dakota; Ohio; Oklahoma;
     * Oregon; Pennsylvania; Rhode Island; South Carolina; South Dakota; Tennessee; Texas; Utah; Vermont; Virginia;
     * Washington; West Virginia; Wisconsin; Wyoming. US Virgin Islands - onshore and offshore.
     * Note: this CRS includes POSITIVE EAST longitudes. Replaced by NAD83(2011) (CRS code 6319) from 2011-09-06.
     */
    public const EPSG_NAD83_CORS96 = 'urn:ogc:def:crs:EPSG::6782';

    /**
     * NAD83(CSRS)
     * Extent: Canada - onshore and offshore - Alberta; British Columbia; Manitoba; New Brunswick; Newfoundland and
     * Labrador; Northwest Territories; Nova Scotia; Nunavut; Ontario; Prince Edward Island; Quebec; Saskatchewan;
     * Yukon.
     * Includes all versions of NAD83(CSRS) from v2 [CSRS98] onwards without specific identification. As such it has an
     * accuracy of approximately 1m. Note: this CRS includes longitudes which are POSITIVE EAST.
     */
    public const EPSG_NAD83_CSRS = 'urn:ogc:def:crs:EPSG::4955';

    /**
     * NAD83(CSRS)v2
     * Extent: Canada - onshore and offshore - Alberta; British Columbia; Manitoba; New Brunswick; Newfoundland and
     * Labrador; Northwest Territories; Nova Scotia; Nunavut; Ontario; Prince Edward Island; Quebec; Saskatchewan;
     * Yukon.
     * Adopted by the Canadian federal government from 1998-01-01 and by the provincial governments of British
     * Columbia, New Brunswick, Prince Edward Island and Quebec. Replaces NAD83(CSRS96). Replaced by NAD83(CSRS)v3
     * (code 8239). Longitudes are POSITIVE EAST.
     */
    public const EPSG_NAD83_CSRS_V2 = 'urn:ogc:def:crs:EPSG::8235';

    /**
     * NAD83(CSRS)v3
     * Extent: Canada - onshore and offshore - Alberta; British Columbia; Manitoba; New Brunswick; Newfoundland and
     * Labrador; Northwest Territories; Nova Scotia; Nunavut; Ontario; Prince Edward Island; Quebec; Saskatchewan;
     * Yukon.
     * Adopted by the Canadian federal government from 1999-01-01 and by the provincial governments of Alberta, British
     * Columbia, Manitoba, Newfoundland and Labrador, Nova Scotia, Ontario and Saskatchewan. Replaces NAD83(CSRS)v2.
     * Replaced by NAD83(CSRS)v4.
     */
    public const EPSG_NAD83_CSRS_V3 = 'urn:ogc:def:crs:EPSG::8239';

    /**
     * NAD83(CSRS)v4
     * Extent: Canada - onshore and offshore - Alberta; British Columbia; Manitoba; New Brunswick; Newfoundland and
     * Labrador; Northwest Territories; Nova Scotia; Nunavut; Ontario; Prince Edward Island; Quebec; Saskatchewan;
     * Yukon.
     * Adopted by the Canadian federal government from 2002-01-01 and by the provincial governments of Alberta and
     * British Columbia. Replaces NAD83(CSRS)v3. Replaced by NAD83(CSRS)v5 (CRS code 8248). Longitudes are POSITIVE
     * EAST.
     */
    public const EPSG_NAD83_CSRS_V4 = 'urn:ogc:def:crs:EPSG::8244';

    /**
     * NAD83(CSRS)v5
     * Extent: Canada - onshore and offshore - Alberta; British Columbia; Manitoba; New Brunswick; Newfoundland and
     * Labrador; Northwest Territories; Nova Scotia; Nunavut; Ontario; Prince Edward Island; Quebec; Saskatchewan;
     * Yukon.
     * Adopted by the Canadian federal government from 2006-01-01. Replaces NAD83(CSRS)v4. Replaced by NAD83(CSRS)v6.
     * Longitudes are POSITIVE EAST.
     */
    public const EPSG_NAD83_CSRS_V5 = 'urn:ogc:def:crs:EPSG::8248';

    /**
     * NAD83(CSRS)v6
     * Extent: Canada - onshore and offshore - Alberta; British Columbia; Manitoba; New Brunswick; Newfoundland and
     * Labrador; Northwest Territories; Nova Scotia; Nunavut; Ontario; Prince Edward Island; Quebec; Saskatchewan;
     * Yukon.
     * Adopted by the Canadian federal government from 2010-01-01 and the provincial governments of Alberta, British
     * Columbia, Manitoba, Newfoundland and Labrador, Nova Scotia, Ontario and Prince Edward Island. Replaces
     * NAD83(CSRS)v5. Replaced by NAD83(CSRS)v7.
     */
    public const EPSG_NAD83_CSRS_V6 = 'urn:ogc:def:crs:EPSG::8251';

    /**
     * NAD83(CSRS)v7
     * Extent: Canada - onshore and offshore - Alberta; British Columbia; Manitoba; New Brunswick; Newfoundland and
     * Labrador; Northwest Territories; Nova Scotia; Nunavut; Ontario; Prince Edward Island; Quebec; Saskatchewan;
     * Yukon.
     * Adopted by the Canadian federal government from 2017-05-01. Replaces NAD83(CSRS)v6. Longitudes are POSITIVE
     * EAST.
     */
    public const EPSG_NAD83_CSRS_V7 = 'urn:ogc:def:crs:EPSG::8254';

    /**
     * NAD83(CSRS96)
     * Extent: Canada - onshore and offshore - Alberta; British Columbia; Manitoba; New Brunswick; Newfoundland and
     * Labrador; Northwest Territories; Nova Scotia; Nunavut; Ontario; Prince Edward Island; Quebec; Saskatchewan;
     * Yukon.
     * Adopted by the Canadian federal government from 1996-01-01. Replaced by NAD83(CSRS)v2 (CRS code 8235). Note:
     * this CRS includes longitudes which are POSITIVE EAST.
     */
    public const EPSG_NAD83_CSRS96 = 'urn:ogc:def:crs:EPSG::8231';

    /**
     * NAD83(FBN)
     * Extent: American Samoa - Tutuila, Aunu'u, Ofu, Olesega, Ta'u and Rose islands - onshore. Guam - onshore.
     * Northern Mariana Islands - onshore. Puerto Rico - onshore. United States (USA) - CONUS - Alabama; Arizona;
     * Arkansas; California; Colorado; Connecticut; Delaware; Florida; Georgia; Idaho; Illinois; Indiana; Iowa; Kansas;
     * Kentucky; Louisiana; Maine; Maryland; Massachusetts; Michigan; Minnesota; Mississippi; Missouri; Montana;
     * Nebraska; Nevada; New Hampshire; New Jersey; New Mexico; New York; North Carolina; North Dakota; Ohio; Oklahoma;
     * Oregon; Pennsylvania; Rhode Island; South Carolina; South Dakota; Tennessee; Texas; Utah; Vermont; Virginia;
     * Washington; West Virginia; Wisconsin; Wyoming - onshore plus Gulf of Mexico offshore continental shelf (GoM
     * OCS). US Virgin Islands - onshore.
     * Continental US, American Samoa, Guam/NMI and PRVI, replaces NAD83(HARN). In Continental US, Puerto Rico and US
     * Virgin Islands replaced by NAD83(NSRS2007). In American Samoa and Hawaii replaced by NAD83(PA11). In Guam/NMI
     * replaced by NAD83(MA11).
     */
    public const EPSG_NAD83_FBN = 'urn:ogc:def:crs:EPSG::8542';

    /**
     * NAD83(HARN Corrected)
     * Extent: Puerto Rico and US Virgin Islands - onshore.
     * Note: this CRS includes POSITIVE EAST longitudes. In PRVI replaces NAD83(HARN) = NAD83(1993 PRVI) to correct
     * errors. Replaced by NAD83(FBN) = NAD83(2002 PRVI).
     */
    public const EPSG_NAD83_HARN_CORRECTED = 'urn:ogc:def:crs:EPSG::8544';

    /**
     * NAD83(HARN)
     * Extent: American Samoa - onshore - Tutuila, Aunu'u, Ofu, Olesega, Ta'u and Rose islands. Guam - onshore.
     * Northern Mariana Islands - onshore. Puerto Rico - onshore. United States (USA) - onshore Alabama, Alaska,
     * Arizona, Arkansas, California, Colorado, Connecticut, Delaware, Florida, Georgia, Hawaii, Idaho, Illinois,
     * Indiana, Iowa, Kansas, Kentucky, Louisiana, Maine, Maryland, Massachusetts, Michigan, Minnesota, Mississippi,
     * Missouri, Montana, Nebraska, Nevada, New Hampshire, New Jersey, New Mexico, New York, North Carolina, North
     * Dakota, Ohio, Oklahoma, Oregon, Pennsylvania, Rhode Island, South Carolina, South Dakota, Tennessee, Texas,
     * Utah, Vermont, Virginia, Washington, West Virginia, Wisconsin and Wyoming; offshore Gulf of Mexico continental
     * shelf (GoM OCS). US Virgin Islands - onshore.
     * In CONUS and Hawaii replaces NAD83 for applications with an accuracy of better than 1m. Replaced by NAD83(FBN)
     * in CONUS, American Samoa and Guam / NMI, by NAD83(NSRS2007) in Alaska, by NAD83(PA11) in Hawaii and by
     * NAD83(HARN Corrected) in PRVI.
     */
    public const EPSG_NAD83_HARN = 'urn:ogc:def:crs:EPSG::4957';

    /**
     * NAD83(MA11)
     * Extent: Guam, Northern Mariana Islands and Palau; onshore and offshore.
     * Note: this CRS includes longitudes which are POSITIVE EAST. Replaces NAD83(HARN) (GGN93) and NAD83(FBN) in Guam.
     */
    public const EPSG_NAD83_MA11 = 'urn:ogc:def:crs:EPSG::6324';

    /**
     * NAD83(MARP00)
     * Extent: Guam, Northern Mariana Islands and Palau; onshore and offshore.
     * Replaces NAD83(HARN) (GGN93) and NAD83(FBN) in Guam. Replaced by NAD83(MA11).
     */
    public const EPSG_NAD83_MARP00 = 'urn:ogc:def:crs:EPSG::9071';

    /**
     * NAD83(NSRS2007)
     * Extent: Puerto Rico - onshore and offshore. United States (USA) onshore and offshore - Alabama; Alaska; Arizona;
     * Arkansas; California; Colorado; Connecticut; Delaware; Florida; Georgia; Idaho; Illinois; Indiana; Iowa; Kansas;
     * Kentucky; Louisiana; Maine; Maryland; Massachusetts; Michigan; Minnesota; Mississippi; Missouri; Montana;
     * Nebraska; Nevada; New Hampshire; New Jersey; New Mexico; New York; North Carolina; North Dakota; Ohio; Oklahoma;
     * Oregon; Pennsylvania; Rhode Island; South Carolina; South Dakota; Tennessee; Texas; Utah; Vermont; Virginia;
     * Washington; West Virginia; Wisconsin; Wyoming. US Virgin Islands - onshore and offshore.
     * Note: this CRS includes longitudes which are POSITIVE EAST. Replaces NAD83(HARN) and NAD83(FBN). Replaced by
     * NAD83(2011).
     */
    public const EPSG_NAD83_NSRS2007 = 'urn:ogc:def:crs:EPSG::4893';

    /**
     * NAD83(PA11)
     * Extent: American Samoa, Marshall Islands, United States (USA) - Hawaii, United States minor outlying islands;
     * onshore and offshore.
     * Note: this CRS includes longitudes which are POSITIVE EAST. Replaces NAD83(HARN) and NAD83(FBN) in Hawaii and
     * American Samoa.
     */
    public const EPSG_NAD83_PA11 = 'urn:ogc:def:crs:EPSG::6321';

    /**
     * NAD83(PACP00)
     * Extent: American Samoa, Marshall Islands, United States (USA) - Hawaii, United States minor outlying islands;
     * onshore and offshore.
     * Replaces NAD83(HARN) and NAD83(FBN) in Hawaii and American Samoa. Replaced by NAD83(PA11).
     */
    public const EPSG_NAD83_PACP00 = 'urn:ogc:def:crs:EPSG::9074';

    /**
     * NZGD2000
     * Extent: New Zealand - onshore and offshore. Includes Antipodes Islands, Auckland Islands, Bounty Islands,
     * Chatham Islands, Cambell Island, Kermadec Islands, Raoul Island and Snares Islands.
     */
    public const EPSG_NZGD2000 = 'urn:ogc:def:crs:EPSG::4959';

    /**
     * ONGD14
     * Extent: Oman - onshore and offshore.
     * In Oman replaces usage of WGS 84 (G873) from 2014. Replaced by ONGD17 (CRS code 9293) from March 2019.
     */
    public const EPSG_ONGD14 = 'urn:ogc:def:crs:EPSG::7372';

    /**
     * ONGD17
     * Extent: Oman - onshore and offshore.
     * Replaces ONGD14 (CRS code 7372) from March 2019.
     */
    public const EPSG_ONGD17 = 'urn:ogc:def:crs:EPSG::9293';

    /**
     * PNG94
     * Extent: Papua New Guinea - onshore and offshore. Includes Bismark archipelago, Louisade archipelago, Admiralty
     * Islands, d'Entrecasteaux Islands, northern Solomon Islands, Trobriand Islands, New Britain, New Ireland,
     * Woodlark, and associated islands.
     */
    public const EPSG_PNG94 = 'urn:ogc:def:crs:EPSG::5545';

    /**
     * POSGAR 2007
     * Extent: Argentina - onshore and offshore.
     * Adopted as official replacement of POSGAR 94 in May 2009.   Also replaces de facto use of POSGAR 98 as of same
     * date.
     */
    public const EPSG_POSGAR_2007 = 'urn:ogc:def:crs:EPSG::5342';

    /**
     * POSGAR 94
     * Extent: Argentina - onshore and offshore.
     * Legally adopted in May 1997. Replaced by POSGAR 98 for scientific and many practical purposes until May 2009.
     * Officially replaced by POSGAR 2007 in May 2009.
     */
    public const EPSG_POSGAR_94 = 'urn:ogc:def:crs:EPSG::4929';

    /**
     * POSGAR 98
     * Extent: Argentina - onshore and offshore.
     * Densification in Argentina of SIRGAS 1995. Until May 2009 replaced POSGAR 94 for many practical purposes (but
     * not as the legal system).  POSGAR 94 was officially replaced by POSGAR 2007 in May 2009.
     */
    public const EPSG_POSGAR_98 = 'urn:ogc:def:crs:EPSG::4961';

    /**
     * PRS92
     * Extent: Philippines - onshore and offshore.
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
     * Extent: World.
     * Replaced by PZ-90.02 from 2007-09-20.
     */
    public const EPSG_PZ_90 = 'urn:ogc:def:crs:EPSG::4923';

    /**
     * PZ-90.02
     * Extent: World.
     * Replaces PZ-90 (CRS code 4923) from 2007-09-20. Replaced by PZ-90.11 (CRS code 7680) from 2014-01-15.
     */
    public const EPSG_PZ_90_02 = 'urn:ogc:def:crs:EPSG::7678';

    /**
     * PZ-90.11
     * Extent: World.
     * Replaces PZ-90.02 (CRS code 7678) from 2014-01-15.
     */
    public const EPSG_PZ_90_11 = 'urn:ogc:def:crs:EPSG::7680';

    /**
     * Peru96
     * Extent: Peru - onshore and offshore.
     */
    public const EPSG_PERU96 = 'urn:ogc:def:crs:EPSG::5372';

    /**
     * RDN2008
     * Extent: Italy - onshore and offshore; San Marino, Vatican City State.
     * Replaces IGM95 (CRS code 4983) from 2011-11-10.
     */
    public const EPSG_RDN2008 = 'urn:ogc:def:crs:EPSG::6705';

    /**
     * REGCAN95
     * Extent: Spain - Canary Islands onshore and offshore.
     */
    public const EPSG_REGCAN95 = 'urn:ogc:def:crs:EPSG::4080';

    /**
     * REGVEN
     * Extent: Venezuela - onshore and offshore.
     * Densification in Venezuela of SIRGAS.
     */
    public const EPSG_REGVEN = 'urn:ogc:def:crs:EPSG::4963';

    /**
     * RGAF09
     * Extent: French Antilles onshore and offshore - Guadeloupe (including Grande Terre, Basse Terre, Marie Galante,
     * Les Saintes, Iles de la Petite Terre, La Desirade, St Barthélemy, and northern St Martin) and Martinique.
     * Replaces RRAF 1991 (CRS code 4557). See CRS code 7085 for alternate system with horizontal axes reversed used by
     * IGN for GIS purposes.
     */
    public const EPSG_RGAF09 = 'urn:ogc:def:crs:EPSG::5488';

    /**
     * RGAF09 (lon-lat)
     * Extent: French Antilles onshore and offshore - Guadeloupe (including Grande Terre, Basse Terre, Marie Galante,
     * Les Saintes, Iles de la Petite Terre, La Desirade, St Barthélemy, and northern St Martin) and Martinique.
     * Replaces RRAF 1991 (CRS code 4557). See CRS code 5488 for system with horizontal axes in sequence lat-lon to be
     * used for air, land and sea navigation and safety of life purposes.
     */
    public const EPSG_RGAF09_LON_LAT = 'urn:ogc:def:crs:EPSG::7085';

    /**
     * RGF93
     * Extent: France - onshore and offshore, mainland and Corsica.
     * See CRS code 7042 for alternate system with horizontal axes reversed used by IGN for GIS purposes.
     */
    public const EPSG_RGF93 = 'urn:ogc:def:crs:EPSG::4965';

    /**
     * RGF93 (lon-lat)
     * Extent: France - onshore and offshore, mainland and Corsica.
     * See CRS code 4965 for system with horizontal axes in sequence lat-lon to be used for air, land and sea
     * navigation and safety of life purposes.
     */
    public const EPSG_RGF93_LON_LAT = 'urn:ogc:def:crs:EPSG::7042';

    /**
     * RGFG95
     * Extent: French Guiana - onshore and offshore.
     * See CRS code 7040 for alternate system with horizontal axes reversed used by IGN for GIS purposes.
     */
    public const EPSG_RGFG95 = 'urn:ogc:def:crs:EPSG::4967';

    /**
     * RGFG95 (lon-lat)
     * Extent: French Guiana - onshore and offshore.
     * See CRS code 4967 for system with horizontal axes in sequence lat-lon to be used for air, land and sea
     * navigation and safety of life purposes.
     */
    public const EPSG_RGFG95_LON_LAT = 'urn:ogc:def:crs:EPSG::7040';

    /**
     * RGM04
     * Extent: Mayotte - onshore and offshore.
     * See CRS code 7038 for alternate system with horizontal axes reversed used by IGN for GIS purposes.
     */
    public const EPSG_RGM04 = 'urn:ogc:def:crs:EPSG::4469';

    /**
     * RGM04 (lon-lat)
     * Extent: Mayotte - onshore and offshore.
     * See CRS code 4469 for system with horizontal axes in sequence lat-lon to be used for air, land and sea
     * navigation and safety of life purposes.
     */
    public const EPSG_RGM04_LON_LAT = 'urn:ogc:def:crs:EPSG::7038';

    /**
     * RGNC91-93
     * Extent: New Caledonia - onshore and offshore. Isle de Pins, Loyalty Islands, Huon Islands, Belep archipelago,
     * Chesterfield Islands, and Walpole.
     * Replaces older local 2D systems IGN56 Lifou, IGN72 Grande Terre, ST87 Ouvea, IGN53 Mare, ST84 Ile des Pins, ST71
     * Belep and NEA74 Noumea (CRS codes 4633, 4641-44, 4662 and 4750).
     */
    public const EPSG_RGNC91_93 = 'urn:ogc:def:crs:EPSG::4907';

    /**
     * RGPF
     * Extent: French Polynesia - onshore and offshore. Includes Society archipelago, Tuamotu archipelago, Marquesas
     * Islands, Gambier Islands and Austral Islands.
     */
    public const EPSG_RGPF = 'urn:ogc:def:crs:EPSG::4999';

    /**
     * RGR92
     * Extent: Reunion - onshore and offshore.
     * See CRS code 7036 for alternate system with horizontal axes reversed used by IGN for GIS purposes.
     */
    public const EPSG_RGR92 = 'urn:ogc:def:crs:EPSG::4971';

    /**
     * RGR92 (lon-lat)
     * Extent: Reunion - onshore and offshore.
     * See CRS code 4971 for system with horizontal axes in sequence lat-lon to be used for air, land and sea
     * navigation and safety of life purposes.
     */
    public const EPSG_RGR92_LON_LAT = 'urn:ogc:def:crs:EPSG::7036';

    /**
     * RGRDC 2005
     * Extent: The Democratic Republic of the Congo (Zaire) - south of a line through Bandundu, Seke and Pweto -
     * onshore and offshore.
     */
    public const EPSG_RGRDC_2005 = 'urn:ogc:def:crs:EPSG::4040';

    /**
     * RGSPM06
     * Extent: St Pierre and Miquelon - onshore and offshore.
     * See CRS code 7034 for alternate system with horizontal axes reversed used by IGN for GIS purposes.
     */
    public const EPSG_RGSPM06 = 'urn:ogc:def:crs:EPSG::4466';

    /**
     * RGSPM06 (lon-lat)
     * Extent: St Pierre and Miquelon - onshore and offshore.
     * See CRS code 4466 for system with horizontal axes in sequence lat-lon to be used for air, land and sea
     * navigation and safety of life purposes.
     */
    public const EPSG_RGSPM06_LON_LAT = 'urn:ogc:def:crs:EPSG::7034';

    /**
     * RGTAAF07
     * Extent: French Southern Territories - onshore and offshore: Amsterdam and St Paul, Crozet, Europa and Kerguelen.
     * Antarctica - Adelie Land coastal area.
     * See CRS code 7087 for alternate system with horizontal axes reversed used by IGN for GIS purposes.
     */
    public const EPSG_RGTAAF07 = 'urn:ogc:def:crs:EPSG::7072';

    /**
     * RGTAAF07 (lon-lat)
     * Extent: French Southern Territories - onshore and offshore: Amsterdam and St Paul, Crozet, Europa and Kerguelen.
     * Antarctica - Adelie Land coastal area.
     * See CRS code 7072 for alternate system with horizontal axes in sequence lat-lon to be used for air, land and sea
     * navigation purposes.
     */
    public const EPSG_RGTAAF07_LON_LAT = 'urn:ogc:def:crs:EPSG::7087';

    /**
     * RGWF96
     * Extent: Wallis and Futuna - onshore and offshore - Uvea, Futuna, and Alofi.
     * See CRS code 8901 for alternate system with horizontal axes reversed used by IGN for GIS purposes.
     */
    public const EPSG_RGWF96 = 'urn:ogc:def:crs:EPSG::8899';

    /**
     * RGWF96 (lon-lat)
     * Extent: Wallis and Futuna - onshore and offshore - Uvea, Futuna, and Alofi.
     * See CRS code 8899 for system with horizontal axes in sequence lat-lon to be used for air, land and sea
     * navigation and safety of life purposes.
     */
    public const EPSG_RGWF96_LON_LAT = 'urn:ogc:def:crs:EPSG::8901';

    /**
     * RRAF 1991
     * Extent: French Antilles onshore and offshore - Guadeloupe (including Grande Terre, Basse Terre, Marie Galante,
     * Les Saintes, Iles de la Petite Terre, La Desirade, St Barthélemy, and northern St Martin) and Martinique.
     * Replaces older local 2D systems Fort Marigot and Sainte Anne CRS (codes 4621-22) in Guadeloupe and Fort Desaix
     * (CRS code 4625) in Martinique. Replaced by RGAF09 (CRS code 5488).
     */
    public const EPSG_RRAF_1991 = 'urn:ogc:def:crs:EPSG::4557';

    /**
     * RSAO13
     * Extent: Angola - onshore and offshore.
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
     * Extent: St Helena, Ascension and Tristan da Cunha - St Helena Island - onshore.
     * Closely aligned to SHGD2015 (CRS code xxxx) with difference attributable to different reference epoch and 10 cm
     * difference in ellipsoid height.
     */
    public const EPSG_SHGD2015 = 'urn:ogc:def:crs:EPSG::7885';

    /**
     * SIRGAS 1995
     * Extent: South America - onshore and offshore. Ecuador (mainland and Galapagos) - onshore and offshore.
     * Replaced by SIRGAS 2000 (CRS code 4989).
     */
    public const EPSG_SIRGAS_1995 = 'urn:ogc:def:crs:EPSG::4975';

    /**
     * SIRGAS 2000
     * Extent: Latin America - Central America and South America - onshore and offshore. Brazil - onshore and offshore.
     * Replaces SIRGAS 1995 system (CRS code 4975) for South America; expands SIRGAS to Central America.
     */
    public const EPSG_SIRGAS_2000 = 'urn:ogc:def:crs:EPSG::4989';

    /**
     * SIRGAS-CON DGF00P01
     * Extent: Latin America - Central America and South America, onshore and offshore.
     * Replaced by SIRGAS-CON DGF01P01 (CRS code 8918).
     */
    public const EPSG_SIRGAS_CON_DGF00P01 = 'urn:ogc:def:crs:EPSG::8916';

    /**
     * SIRGAS-CON DGF01P01
     * Extent: Latin America - Central America and South America, onshore and offshore.
     * Replaces SIRGAS-CON DGF00P01 (CRS code 8916). Replaced by SIRGAS-CON DGF01P02 (CRS code 8920).
     */
    public const EPSG_SIRGAS_CON_DGF01P01 = 'urn:ogc:def:crs:EPSG::8918';

    /**
     * SIRGAS-CON DGF01P02
     * Extent: Latin America - Central America and South America, onshore and offshore.
     * Replaces SIRGAS-CON DGF01P01 (CRS code 8918). Replaced by SIRGAS-CON DGF02P01 (CRS code 8922).
     */
    public const EPSG_SIRGAS_CON_DGF01P02 = 'urn:ogc:def:crs:EPSG::8920';

    /**
     * SIRGAS-CON DGF02P01
     * Extent: Latin America - Central America and South America, onshore and offshore.
     * Replaces SIRGAS-CON DGF01P02 (CRS code 8920). Replaced by SIRGAS-CON DGF04P01 (CRS code 8924).
     */
    public const EPSG_SIRGAS_CON_DGF02P01 = 'urn:ogc:def:crs:EPSG::8922';

    /**
     * SIRGAS-CON DGF04P01
     * Extent: Latin America - Central America and South America, onshore and offshore.
     * Replaces SIRGAS-CON DGF02P01 (CRS code 8922). Replaced by SIRGAS-CON DGF05P01 (CRS code 8926).
     */
    public const EPSG_SIRGAS_CON_DGF04P01 = 'urn:ogc:def:crs:EPSG::8924';

    /**
     * SIRGAS-CON DGF05P01
     * Extent: Latin America - Central America and South America, onshore and offshore.
     * Replaces SIRGAS-CON DGF04P01 (CRS code 8924). Replaced by SIRGAS-CON DGF06P01 (CRS code 8928).
     */
    public const EPSG_SIRGAS_CON_DGF05P01 = 'urn:ogc:def:crs:EPSG::8926';

    /**
     * SIRGAS-CON DGF06P01
     * Extent: Latin America - Central America and South America, onshore and offshore.
     * Replaces SIRGAS-CON DGF05P01 (CRS code 8926). Replaced by SIRGAS-CON DGF07P01 (CRS code 8930).
     */
    public const EPSG_SIRGAS_CON_DGF06P01 = 'urn:ogc:def:crs:EPSG::8928';

    /**
     * SIRGAS-CON DGF07P01
     * Extent: Latin America - Central America and South America, onshore and offshore.
     * Replaces SIRGAS-CON DGF06P01 (CRS code 8928). Replaced by SIRGAS-CON DGF08P01 (CRS code 8932).
     */
    public const EPSG_SIRGAS_CON_DGF07P01 = 'urn:ogc:def:crs:EPSG::8930';

    /**
     * SIRGAS-CON DGF08P01
     * Extent: Latin America - Central America and South America, onshore and offshore.
     * Replaces SIRGAS-CON DGF07P01 (CRS code 8930). Replaced by SIRGAS-CON SIR09P01 (CRS code 8934).
     */
    public const EPSG_SIRGAS_CON_DGF08P01 = 'urn:ogc:def:crs:EPSG::8932';

    /**
     * SIRGAS-CON SIR09P01
     * Extent: Latin America - Central America and South America, onshore and offshore.
     * Replaces SIRGAS-CON DGF08P01 (CRS code 8932). Replaced by SIRGAS-CON SIR10P01 (CRS code 8936).
     */
    public const EPSG_SIRGAS_CON_SIR09P01 = 'urn:ogc:def:crs:EPSG::8934';

    /**
     * SIRGAS-CON SIR10P01
     * Extent: Latin America - Central America and South America, onshore and offshore.
     * Replaces SIRGAS-CON SIR09P01 (CRS code 8934). Replaced by SIRGAS-CON SIR11P01 (CRS code 8938).
     */
    public const EPSG_SIRGAS_CON_SIR10P01 = 'urn:ogc:def:crs:EPSG::8936';

    /**
     * SIRGAS-CON SIR11P01
     * Extent: Latin America - Central America and South America, onshore and offshore.
     * Replaces SIRGAS-CON SIR10P01 (CRS code 8936). Replaced by SIRGAS-CON SIR13P01 (CRS code 8940).
     */
    public const EPSG_SIRGAS_CON_SIR11P01 = 'urn:ogc:def:crs:EPSG::8938';

    /**
     * SIRGAS-CON SIR13P01
     * Extent: Latin America - Central America and South America, onshore and offshore.
     * Replaces SIRGAS-CON SIR11P01 (CRS code 8938). Replaced by SIRGAS-CON SIR14P01 (CRS code 8942).
     */
    public const EPSG_SIRGAS_CON_SIR13P01 = 'urn:ogc:def:crs:EPSG::8940';

    /**
     * SIRGAS-CON SIR14P01
     * Extent: Latin America - Central America and South America, onshore and offshore.
     * Replaces SIRGAS-CON SIR13P01 (CRS code 8940). Replaced by SIRGAS-CON SIR15P01 (CRS code 8944).
     */
    public const EPSG_SIRGAS_CON_SIR14P01 = 'urn:ogc:def:crs:EPSG::8942';

    /**
     * SIRGAS-CON SIR15P01
     * Extent: Latin America - Central America and South America, onshore and offshore.
     * Replaces SIRGAS-CON SIR14P01 (CRS code 8942). Replaced by SIRGAS-CON SIR17P01 (CRS code 8946).
     */
    public const EPSG_SIRGAS_CON_SIR15P01 = 'urn:ogc:def:crs:EPSG::8944';

    /**
     * SIRGAS-CON SIR17P01
     * Extent: Latin America - Central America and South America, onshore and offshore.
     * Replaces SIRGAS-CON SIR15P01 (CRS code 8944).
     */
    public const EPSG_SIRGAS_CON_SIR17P01 = 'urn:ogc:def:crs:EPSG::8946';

    /**
     * SIRGAS-Chile 2002
     * Extent: Chile - onshore and offshore. Includes Easter Island, Juan Fernandez Islands, San Felix, and Sala y
     * Gomez.
     * Densification of SIRGAS 2000 within Chile. Replaced by SIRGAS-Chile 2010 (CRS code 8948).
     */
    public const EPSG_SIRGAS_CHILE_2002 = 'urn:ogc:def:crs:EPSG::5359';

    /**
     * SIRGAS-Chile 2010
     * Extent: Chile - onshore and offshore. Includes Easter Island, Juan Fernandez Islands, San Felix, and Sala y
     * Gomez.
     * Densification of SIRGAS-CON within Chile at epoch 2010.00. Replaces SIRGAS-Chile 2002 (CRS code 5359), replaced
     * by SIRGAS-Chile 2013 (CRS code 9147) due to significant tectonic deformation.
     */
    public const EPSG_SIRGAS_CHILE_2010 = 'urn:ogc:def:crs:EPSG::8948';

    /**
     * SIRGAS-Chile 2013
     * Extent: Chile - onshore and offshore. Includes Easter Island, Juan Fernandez Islands, San Felix, and Sala y
     * Gomez.
     * Densification of SIRGAS-CON within Chile at epoch 2013.00. Replaces SIRGAS-Chile 2010 (CRS code 8948), replaced
     * by SIRGAS-Chile 2016 (CRS code 9152) due to significant tectonic deformation.
     */
    public const EPSG_SIRGAS_CHILE_2013 = 'urn:ogc:def:crs:EPSG::9147';

    /**
     * SIRGAS-Chile 2016
     * Extent: Chile - onshore and offshore. Includes Easter Island, Juan Fernandez Islands, San Felix, and Sala y
     * Gomez.
     * Densification of SIRGAS-CON within Chile at epoch 2016.00. Replaces SIRGAS-Chile 2013 (CRS code 9147) due to
     * significant tectonic deformation.
     */
    public const EPSG_SIRGAS_CHILE_2016 = 'urn:ogc:def:crs:EPSG::9152';

    /**
     * SIRGAS-ROU98
     * Extent: Uruguay - onshore and offshore.
     * Densification of SIRGAS 1995 in Uruguay.
     */
    public const EPSG_SIRGAS_ROU98 = 'urn:ogc:def:crs:EPSG::5380';

    /**
     * SIRGAS_ES2007.8
     * Extent: El Salvador - onshore and offshore.
     * Densification of SIRGAS 2000 within El Salvador.
     */
    public const EPSG_SIRGAS_ES2007_8 = 'urn:ogc:def:crs:EPSG::5392';

    /**
     * SRB_ETRS89
     * Extent: Serbia including Vojvodina.
     * Replaces SREF98 (CRS code 4074).
     */
    public const EPSG_SRB_ETRS89 = 'urn:ogc:def:crs:EPSG::8684';

    /**
     * SREF98
     * Extent: Serbia including Vojvodina.
     * Replaced by SRB_ETRS89 (STRS00) (CRS code 8684).
     */
    public const EPSG_SREF98 = 'urn:ogc:def:crs:EPSG::4074';

    /**
     * SRGI2013
     * Extent: Indonesia - onshore and offshore.
     * Supports horizontal component of national horizontal control network (JKHN). Adopted 2013-10-11. Replaces DGN95
     * and all older systems.
     */
    public const EPSG_SRGI2013 = 'urn:ogc:def:crs:EPSG::9469';

    /**
     * SWEREF99
     * Extent: Sweden - onshore and offshore.
     */
    public const EPSG_SWEREF99 = 'urn:ogc:def:crs:EPSG::4977';

    /**
     * Slovenia 1996
     * Extent: Slovenia - onshore and offshore.
     */
    public const EPSG_SLOVENIA_1996 = 'urn:ogc:def:crs:EPSG::4883';

    /**
     * St. Helena Tritan
     * Extent: St Helena, Ascension and Tristan da Cunha - St Helena Island - onshore.
     * Closely aligned to SHGD2015 (CRS code 7885) with difference attributable to different reference epoch and 10 cm
     * difference in ellipsoid height. Replaced by SHGD2015 from 2015.
     */
    public const EPSG_ST_HELENA_TRITAN = 'urn:ogc:def:crs:EPSG::7880';

    /**
     * TGD2005
     * Extent: Tonga - onshore and offshore.
     */
    public const EPSG_TGD2005 = 'urn:ogc:def:crs:EPSG::5885';

    /**
     * TUREF
     * Extent: Turkey - onshore and offshore.
     */
    public const EPSG_TUREF = 'urn:ogc:def:crs:EPSG::5251';

    /**
     * TWD97
     * Extent: Taiwan, Republic of China - onshore and offshore - Taiwan Island, Penghu (Pescadores) Islands.
     */
    public const EPSG_TWD97 = 'urn:ogc:def:crs:EPSG::3823';

    /**
     * UCS-2000
     * Extent: Ukraine - onshore and offshore.
     * Adopted 1st January 2007.
     */
    public const EPSG_UCS_2000 = 'urn:ogc:def:crs:EPSG::5560';

    /**
     * WGS 66
     * Extent: World.
     * Replaced by WGS 72.
     */
    public const EPSG_WGS_66 = 'urn:ogc:def:crs:EPSG::4891';

    /**
     * WGS 72
     * Extent: World.
     * Replaced by WGS 84.
     */
    public const EPSG_WGS_72 = 'urn:ogc:def:crs:EPSG::4985';

    /**
     * WGS 72BE
     * Extent: World.
     * Broadcast ephemeris. Replaced by WGS 84.
     */
    public const EPSG_WGS_72BE = 'urn:ogc:def:crs:EPSG::4987';

    /**
     * WGS 84
     * Extent: World: Afghanistan, Albania, Algeria, American Samoa, Andorra, Angola, Anguilla, Antarctica, Antigua and
     * Barbuda, Argentina, Armenia, Aruba, Australia, Austria, Azerbaijan, Bahamas, Bahrain, Bangladesh, Barbados,
     * Belgium, Belgium, Belize, Benin, Bermuda, Bhutan, Bolivia, Bonaire, Saint Eustasius and Saba, Bosnia and
     * Herzegovina, Botswana, Bouvet Island, Brazil, British Indian Ocean Territory, British Virgin Islands, Brunei
     * Darussalam, Bulgaria, Burkina Faso, Burundi, Cambodia, Cameroon, Canada, Cape Verde, Cayman Islands, Central
     * African Republic, Chad, Chile, China, Christmas Island, Cocos (Keeling) Islands, Comoros, Congo, Cook Islands,
     * Costa Rica, Côte d'Ivoire (Ivory Coast), Croatia, Cuba, Curacao, Cyprus, Czechia, Denmark, Djibouti, Dominica,
     * Dominican Republic, East Timor, Ecuador, Egypt, El Salvador, Equatorial Guinea, Eritrea, Estonia, Eswatini
     * (Swaziland), Ethiopia, Falkland Islands (Malvinas), Faroe Islands, Fiji, Finland, France, French Guiana, French
     * Polynesia, French Southern Territories, Gabon, Gambia, Georgia, Germany, Ghana, Gibraltar, Greece, Greenland,
     * Grenada, Guadeloupe, Guam, Guatemala, Guinea, Guinea-Bissau, Guyana, Haiti, Heard Island and McDonald Islands,
     * Holy See (Vatican City State), Honduras, China - Hong Kong, Hungary, Iceland, India, Indonesia, Islamic Republic
     * of Iran, Iraq, Ireland, Israel, Italy, Jamaica, Japan, Jordan, Kazakhstan, Kenya, Kiribati, Democratic People's
     * Republic of Korea (North Korea), Republic of Korea (South Korea), Kosovo, Kuwait, Kyrgyzstan, Lao People's
     * Democratic Republic (Laos), Latvia, Lebanon, Lesotho, Liberia, Libyan Arab Jamahiriya, Liechtenstein, Lithuania,
     * Luxembourg, China - Macao, Madagascar, Malawi, Malaysia, Maldives, Mali, Malta, Marshall Islands, Martinique,
     * Mauritania, Mauritius, Mayotte, Mexico, Federated States of Micronesia, Monaco, Mongolia, Montenegro,
     * Montserrat, Morocco, Mozambique, Myanmar (Burma), Namibia, Nauru, Nepal, Netherlands, New Caledonia, New
     * Zealand, Nicaragua, Niger, Nigeria, Niue, Norfolk Island, North Macedonia, Northern Mariana Islands, Norway,
     * Oman, Pakistan, Palau, Panama, Papua New Guinea (PNG), Paraguay, Peru, Philippines, Pitcairn, Poland, Portugal,
     * Puerto Rico, Qatar, Reunion, Romania, Russian Federation, Rwanda, Saint Kitts and Nevis, Saint Helena, Ascension
     * and Tristan da Cunha, Saint Lucia, Saint Pierre and Miquelon, Saint Vincent and the Grenadines, Samoa, San
     * Marino, Sao Tome and Principe, Saudi Arabia, Senegal, Serbia, Seychelles, Sierra Leone, Singapore, Slovakia
     * (Slovak Republic), Slovenia, Sint Maarten, Solomon Islands, Somalia, South Africa, South Georgia and the South
     * Sandwich Islands, South Sudan, Spain, Sri Lanka, Sudan, Suriname, Svalbard and Jan Mayen, Sweden, Switzerland,
     * Syrian Arab Republic, Taiwan, Tajikistan, United Republic of Tanzania, Thailand, The Democratic Republic of the
     * Congo (Zaire), Togo, Tokelau, Tonga, Trinidad and Tobago, Tunisia, Turkey, Turkmenistan, Turks and Caicos
     * Islands, Tuvalu, Uganda, Ukraine, United Arab Emirates (UAE), United Kingdom (UK), United States (USA), United
     * States Minor Outlying Islands, Uruguay, Uzbekistan, Vanuatu, Venezuela, Vietnam, US Virgin Islands, Wallis and
     * Futuna, Western Sahara, Yemen, Zambia, Zimbabwe.
     */
    public const EPSG_WGS_84 = 'urn:ogc:def:crs:EPSG::4979';

    /**
     * WGS 84 (G1150)
     * Extent: World.
     * Replaces  WGS 84 (G873) (CRS code 7659) from 2002-01-20. Replaced by WGS 84 (G1674) (CRS code 7663) from
     * 2012-02-08.
     */
    public const EPSG_WGS_84_G1150 = 'urn:ogc:def:crs:EPSG::7661';

    /**
     * WGS 84 (G1674)
     * Extent: World.
     * Replaces WGS 84 (G1150) (CRS code 7661) from 2012-02-08. Replaced by WGS 84 (G1762) (CRS code 7665) from
     * 2013-10-16.
     */
    public const EPSG_WGS_84_G1674 = 'urn:ogc:def:crs:EPSG::7663';

    /**
     * WGS 84 (G1762)
     * Extent: World.
     * Replaces WGS 84 (G1674) (CRS code 7663) from 2013-10-16.
     */
    public const EPSG_WGS_84_G1762 = 'urn:ogc:def:crs:EPSG::7665';

    /**
     * WGS 84 (G730)
     * Extent: World.
     * Replaces WGS 84 (Transit) (CRS code 7816) from 1994-06-29. Replaced by WGS84 (G873) (CRS code 7659) from
     * 1997-01-29.
     */
    public const EPSG_WGS_84_G730 = 'urn:ogc:def:crs:EPSG::7657';

    /**
     * WGS 84 (G873)
     * Extent: World.
     * Replaces WGS 84 (G730) (CRS code 7657) from 1997-01-29. Replaced by WGS 84 (G1150) (CRS code 7661) from
     * 2002-01-20.
     */
    public const EPSG_WGS_84_G873 = 'urn:ogc:def:crs:EPSG::7659';

    /**
     * WGS 84 (Transit)
     * Extent: World.
     * Replaced by WGS84 (G730) (CRS code 7657) from 1994-06-29.
     */
    public const EPSG_WGS_84_TRANSIT = 'urn:ogc:def:crs:EPSG::7816';

    /**
     * Yemen NGN96
     * Extent: Yemen - onshore and offshore.
     */
    public const EPSG_YEMEN_NGN96 = 'urn:ogc:def:crs:EPSG::4981';

    protected static array $sridData = [
        'urn:ogc:def:crs:EPSG::3823' => [
            'name' => 'TWD97',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::1026',
            'base_crs' => 'urn:ogc:def:crs:EPSG::3822',
        ],
        'urn:ogc:def:crs:EPSG::3888' => [
            'name' => 'IGRS',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::1029',
            'base_crs' => 'urn:ogc:def:crs:EPSG::3887',
        ],
        'urn:ogc:def:crs:EPSG::4017' => [
            'name' => 'MOLDREF99',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::1032',
            'base_crs' => 'urn:ogc:def:crs:EPSG::4000',
        ],
        'urn:ogc:def:crs:EPSG::4040' => [
            'name' => 'RGRDC 2005',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::1033',
            'base_crs' => 'urn:ogc:def:crs:EPSG::4039',
        ],
        'urn:ogc:def:crs:EPSG::4074' => [
            'name' => 'SREF98',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::1034',
            'base_crs' => 'urn:ogc:def:crs:EPSG::4073',
        ],
        'urn:ogc:def:crs:EPSG::4080' => [
            'name' => 'REGCAN95',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::1035',
            'base_crs' => 'urn:ogc:def:crs:EPSG::4079',
        ],
        'urn:ogc:def:crs:EPSG::4327' => [
            'name' => 'WGS 84 (geographic 3D)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6401',
            'datum' => 'urn:ogc:def:datum:EPSG::6326',
        ],
        'urn:ogc:def:crs:EPSG::4329' => [
            'name' => 'WGS 84 (3D)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6401',
            'datum' => 'urn:ogc:def:datum:EPSG::6326',
        ],
        'urn:ogc:def:crs:EPSG::4339' => [
            'name' => 'Australian Antarctic (3D)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6401',
            'datum' => 'urn:ogc:def:datum:EPSG::6176',
        ],
        'urn:ogc:def:crs:EPSG::4341' => [
            'name' => 'EST97 (3D)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6401',
            'datum' => 'urn:ogc:def:datum:EPSG::6180',
        ],
        'urn:ogc:def:crs:EPSG::4343' => [
            'name' => 'CHTRF95 (3D)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6401',
            'datum' => 'urn:ogc:def:datum:EPSG::6151',
        ],
        'urn:ogc:def:crs:EPSG::4345' => [
            'name' => 'ETRS89 (3D)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6401',
            'datum' => 'urn:ogc:def:datum:EPSG::6258',
        ],
        'urn:ogc:def:crs:EPSG::4347' => [
            'name' => 'GDA94 (3D)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::6283',
        ],
        'urn:ogc:def:crs:EPSG::4349' => [
            'name' => 'Hartebeesthoek94 (3D)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6401',
            'datum' => 'urn:ogc:def:datum:EPSG::6148',
        ],
        'urn:ogc:def:crs:EPSG::4351' => [
            'name' => 'IRENET95 (3D)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6401',
            'datum' => 'urn:ogc:def:datum:EPSG::6173',
        ],
        'urn:ogc:def:crs:EPSG::4353' => [
            'name' => 'JGD2000 (3D)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6401',
            'datum' => 'urn:ogc:def:datum:EPSG::6612',
        ],
        'urn:ogc:def:crs:EPSG::4355' => [
            'name' => 'LKS94 (ETRS89) (3D)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6401',
            'datum' => 'urn:ogc:def:datum:EPSG::6126',
        ],
        'urn:ogc:def:crs:EPSG::4357' => [
            'name' => 'Moznet (3D)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6401',
            'datum' => 'urn:ogc:def:datum:EPSG::6130',
        ],
        'urn:ogc:def:crs:EPSG::4359' => [
            'name' => 'NAD83(CSRS) (3D)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6401',
            'datum' => 'urn:ogc:def:datum:EPSG::6140',
        ],
        'urn:ogc:def:crs:EPSG::4361' => [
            'name' => 'NAD83(HARN) (3D)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6401',
            'datum' => 'urn:ogc:def:datum:EPSG::6152',
        ],
        'urn:ogc:def:crs:EPSG::4363' => [
            'name' => 'NZGD2000 (3D)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6401',
            'datum' => 'urn:ogc:def:datum:EPSG::6167',
        ],
        'urn:ogc:def:crs:EPSG::4365' => [
            'name' => 'POSGAR 98 (3D)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6401',
            'datum' => 'urn:ogc:def:datum:EPSG::6190',
        ],
        'urn:ogc:def:crs:EPSG::4367' => [
            'name' => 'REGVEN (3D)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6401',
            'datum' => 'urn:ogc:def:datum:EPSG::6189',
        ],
        'urn:ogc:def:crs:EPSG::4369' => [
            'name' => 'RGF93 (3D)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6401',
            'datum' => 'urn:ogc:def:datum:EPSG::6171',
        ],
        'urn:ogc:def:crs:EPSG::4371' => [
            'name' => 'RGFG95 (3D)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6401',
            'datum' => 'urn:ogc:def:datum:EPSG::6624',
        ],
        'urn:ogc:def:crs:EPSG::4373' => [
            'name' => 'RGR92 (3D)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6401',
            'datum' => 'urn:ogc:def:datum:EPSG::6627',
        ],
        'urn:ogc:def:crs:EPSG::4375' => [
            'name' => 'SIRGAS (3D)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6401',
            'datum' => 'urn:ogc:def:datum:EPSG::6170',
        ],
        'urn:ogc:def:crs:EPSG::4377' => [
            'name' => 'SWEREF99 (3D)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6401',
            'datum' => 'urn:ogc:def:datum:EPSG::6619',
        ],
        'urn:ogc:def:crs:EPSG::4379' => [
            'name' => 'Yemen NGN96 (3D)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6401',
            'datum' => 'urn:ogc:def:datum:EPSG::6163',
        ],
        'urn:ogc:def:crs:EPSG::4381' => [
            'name' => 'RGNC 1991 (3D)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6401',
            'datum' => 'urn:ogc:def:datum:EPSG::6645',
        ],
        'urn:ogc:def:crs:EPSG::4383' => [
            'name' => 'RRAF 1991 (3D)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6401',
            'datum' => 'urn:ogc:def:datum:EPSG::6640',
        ],
        'urn:ogc:def:crs:EPSG::4386' => [
            'name' => 'ISN93 (3D)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6401',
            'datum' => 'urn:ogc:def:datum:EPSG::6659',
        ],
        'urn:ogc:def:crs:EPSG::4388' => [
            'name' => 'LKS92 (3D)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6401',
            'datum' => 'urn:ogc:def:datum:EPSG::6661',
        ],
        'urn:ogc:def:crs:EPSG::4466' => [
            'name' => 'RGSPM06',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::1038',
            'base_crs' => 'urn:ogc:def:crs:EPSG::4465',
        ],
        'urn:ogc:def:crs:EPSG::4469' => [
            'name' => 'RGM04',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::1036',
            'base_crs' => 'urn:ogc:def:crs:EPSG::4468',
        ],
        'urn:ogc:def:crs:EPSG::4472' => [
            'name' => 'Cadastre 1997',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::1037',
            'base_crs' => 'urn:ogc:def:crs:EPSG::4473',
        ],
        'urn:ogc:def:crs:EPSG::4480' => [
            'name' => 'China Geodetic Coordinate System 2000',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::1043',
            'base_crs' => 'urn:ogc:def:crs:EPSG::4479',
        ],
        'urn:ogc:def:crs:EPSG::4482' => [
            'name' => 'Mexico ITRF92',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::1042',
            'base_crs' => 'urn:ogc:def:crs:EPSG::4481',
        ],
        'urn:ogc:def:crs:EPSG::4557' => [
            'name' => 'RRAF 1991',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::1047',
            'base_crs' => 'urn:ogc:def:crs:EPSG::4556',
        ],
        'urn:ogc:def:crs:EPSG::4883' => [
            'name' => 'Slovenia 1996',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::6765',
            'base_crs' => 'urn:ogc:def:crs:EPSG::4882',
        ],
        'urn:ogc:def:crs:EPSG::4885' => [
            'name' => 'RSRGD2000',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::6764',
            'base_crs' => 'urn:ogc:def:crs:EPSG::4884',
        ],
        'urn:ogc:def:crs:EPSG::4887' => [
            'name' => 'BDA2000',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::6762',
            'base_crs' => 'urn:ogc:def:crs:EPSG::4886',
        ],
        'urn:ogc:def:crs:EPSG::4889' => [
            'name' => 'HTRS96',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::6761',
            'base_crs' => 'urn:ogc:def:crs:EPSG::4888',
        ],
        'urn:ogc:def:crs:EPSG::4891' => [
            'name' => 'WGS 66',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::6760',
            'base_crs' => 'urn:ogc:def:crs:EPSG::4890',
        ],
        'urn:ogc:def:crs:EPSG::4893' => [
            'name' => 'NAD83(NSRS2007)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::6759',
            'base_crs' => 'urn:ogc:def:crs:EPSG::4892',
        ],
        'urn:ogc:def:crs:EPSG::4895' => [
            'name' => 'JAD2001',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::6758',
            'base_crs' => 'urn:ogc:def:crs:EPSG::4894',
        ],
        'urn:ogc:def:crs:EPSG::4898' => [
            'name' => 'DGN95',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::6755',
            'base_crs' => 'urn:ogc:def:crs:EPSG::4897',
        ],
        'urn:ogc:def:crs:EPSG::4900' => [
            'name' => 'LGD2006',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::6754',
            'base_crs' => 'urn:ogc:def:crs:EPSG::4899',
        ],
        'urn:ogc:def:crs:EPSG::4907' => [
            'name' => 'RGNC91-93',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::6749',
            'base_crs' => 'urn:ogc:def:crs:EPSG::4906',
        ],
        'urn:ogc:def:crs:EPSG::4909' => [
            'name' => 'GR96',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::6747',
            'base_crs' => 'urn:ogc:def:crs:EPSG::4908',
        ],
        'urn:ogc:def:crs:EPSG::4921' => [
            'name' => 'GDM2000',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::6742',
            'base_crs' => 'urn:ogc:def:crs:EPSG::4920',
        ],
        'urn:ogc:def:crs:EPSG::4923' => [
            'name' => 'PZ-90',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::6740',
            'base_crs' => 'urn:ogc:def:crs:EPSG::4922',
        ],
        'urn:ogc:def:crs:EPSG::4925' => [
            'name' => 'Mauritania 1999',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::6702',
            'base_crs' => 'urn:ogc:def:crs:EPSG::4924',
        ],
        'urn:ogc:def:crs:EPSG::4927' => [
            'name' => 'Korea 2000',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::6737',
            'base_crs' => 'urn:ogc:def:crs:EPSG::4926',
        ],
        'urn:ogc:def:crs:EPSG::4929' => [
            'name' => 'POSGAR 94',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::6694',
            'base_crs' => 'urn:ogc:def:crs:EPSG::4928',
        ],
        'urn:ogc:def:crs:EPSG::4931' => [
            'name' => 'Australian Antarctic',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::6176',
            'base_crs' => 'urn:ogc:def:crs:EPSG::4930',
        ],
        'urn:ogc:def:crs:EPSG::4933' => [
            'name' => 'CHTRF95',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::6151',
            'base_crs' => 'urn:ogc:def:crs:EPSG::4932',
        ],
        'urn:ogc:def:crs:EPSG::4935' => [
            'name' => 'EST97',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::6180',
            'base_crs' => 'urn:ogc:def:crs:EPSG::4934',
        ],
        'urn:ogc:def:crs:EPSG::4937' => [
            'name' => 'ETRS89',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::6258',
            'base_crs' => 'urn:ogc:def:crs:EPSG::4936',
        ],
        'urn:ogc:def:crs:EPSG::4939' => [
            'name' => 'GDA94',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::6283',
            'base_crs' => 'urn:ogc:def:crs:EPSG::4938',
        ],
        'urn:ogc:def:crs:EPSG::4941' => [
            'name' => 'Hartebeesthoek94',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::6148',
            'base_crs' => 'urn:ogc:def:crs:EPSG::4940',
        ],
        'urn:ogc:def:crs:EPSG::4943' => [
            'name' => 'IRENET95',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::6173',
            'base_crs' => 'urn:ogc:def:crs:EPSG::4942',
        ],
        'urn:ogc:def:crs:EPSG::4945' => [
            'name' => 'ISN93',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::6659',
            'base_crs' => 'urn:ogc:def:crs:EPSG::4944',
        ],
        'urn:ogc:def:crs:EPSG::4947' => [
            'name' => 'JGD2000',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::6612',
            'base_crs' => 'urn:ogc:def:crs:EPSG::4946',
        ],
        'urn:ogc:def:crs:EPSG::4949' => [
            'name' => 'LKS92',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::6661',
            'base_crs' => 'urn:ogc:def:crs:EPSG::4948',
        ],
        'urn:ogc:def:crs:EPSG::4951' => [
            'name' => 'LKS94',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::6126',
            'base_crs' => 'urn:ogc:def:crs:EPSG::4950',
        ],
        'urn:ogc:def:crs:EPSG::4953' => [
            'name' => 'Moznet',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::6130',
            'base_crs' => 'urn:ogc:def:crs:EPSG::4952',
        ],
        'urn:ogc:def:crs:EPSG::4955' => [
            'name' => 'NAD83(CSRS)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::6140',
            'base_crs' => 'urn:ogc:def:crs:EPSG::4954',
        ],
        'urn:ogc:def:crs:EPSG::4957' => [
            'name' => 'NAD83(HARN)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::6152',
            'base_crs' => 'urn:ogc:def:crs:EPSG::4956',
        ],
        'urn:ogc:def:crs:EPSG::4959' => [
            'name' => 'NZGD2000',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::6167',
            'base_crs' => 'urn:ogc:def:crs:EPSG::4958',
        ],
        'urn:ogc:def:crs:EPSG::4961' => [
            'name' => 'POSGAR 98',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::6190',
            'base_crs' => 'urn:ogc:def:crs:EPSG::4960',
        ],
        'urn:ogc:def:crs:EPSG::4963' => [
            'name' => 'REGVEN',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::6189',
            'base_crs' => 'urn:ogc:def:crs:EPSG::4962',
        ],
        'urn:ogc:def:crs:EPSG::4965' => [
            'name' => 'RGF93',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::6171',
            'base_crs' => 'urn:ogc:def:crs:EPSG::4964',
        ],
        'urn:ogc:def:crs:EPSG::4967' => [
            'name' => 'RGFG95',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::6624',
            'base_crs' => 'urn:ogc:def:crs:EPSG::4966',
        ],
        'urn:ogc:def:crs:EPSG::4969' => [
            'name' => 'RGNC 1991',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::6645',
            'base_crs' => 'urn:ogc:def:crs:EPSG::4968',
        ],
        'urn:ogc:def:crs:EPSG::4971' => [
            'name' => 'RGR92',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::6627',
            'base_crs' => 'urn:ogc:def:crs:EPSG::4970',
        ],
        'urn:ogc:def:crs:EPSG::4973' => [
            'name' => 'RRAF 1991',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::6640',
            'base_crs' => 'urn:ogc:def:crs:EPSG::4972',
        ],
        'urn:ogc:def:crs:EPSG::4975' => [
            'name' => 'SIRGAS 1995',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::6170',
            'base_crs' => 'urn:ogc:def:crs:EPSG::4974',
        ],
        'urn:ogc:def:crs:EPSG::4977' => [
            'name' => 'SWEREF99',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::6619',
            'base_crs' => 'urn:ogc:def:crs:EPSG::4976',
        ],
        'urn:ogc:def:crs:EPSG::4979' => [
            'name' => 'WGS 84',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::6326',
            'base_crs' => 'urn:ogc:def:crs:EPSG::4978',
        ],
        'urn:ogc:def:crs:EPSG::4981' => [
            'name' => 'Yemen NGN96',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::6163',
            'base_crs' => 'urn:ogc:def:crs:EPSG::4980',
        ],
        'urn:ogc:def:crs:EPSG::4983' => [
            'name' => 'IGM95',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::6670',
            'base_crs' => 'urn:ogc:def:crs:EPSG::4982',
        ],
        'urn:ogc:def:crs:EPSG::4985' => [
            'name' => 'WGS 72',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::6322',
            'base_crs' => 'urn:ogc:def:crs:EPSG::4984',
        ],
        'urn:ogc:def:crs:EPSG::4987' => [
            'name' => 'WGS 72BE',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::6324',
            'base_crs' => 'urn:ogc:def:crs:EPSG::4986',
        ],
        'urn:ogc:def:crs:EPSG::4989' => [
            'name' => 'SIRGAS 2000',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::6674',
            'base_crs' => 'urn:ogc:def:crs:EPSG::4988',
        ],
        'urn:ogc:def:crs:EPSG::4991' => [
            'name' => 'Lao 1993',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::6677',
            'base_crs' => 'urn:ogc:def:crs:EPSG::4990',
        ],
        'urn:ogc:def:crs:EPSG::4993' => [
            'name' => 'Lao 1997',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::6678',
            'base_crs' => 'urn:ogc:def:crs:EPSG::4992',
        ],
        'urn:ogc:def:crs:EPSG::4995' => [
            'name' => 'PRS92',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::6683',
            'base_crs' => 'urn:ogc:def:crs:EPSG::4994',
        ],
        'urn:ogc:def:crs:EPSG::4997' => [
            'name' => 'MAGNA-SIRGAS',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::6686',
            'base_crs' => 'urn:ogc:def:crs:EPSG::4996',
        ],
        'urn:ogc:def:crs:EPSG::4999' => [
            'name' => 'RGPF',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::6687',
            'base_crs' => 'urn:ogc:def:crs:EPSG::4998',
        ],
        'urn:ogc:def:crs:EPSG::5012' => [
            'name' => 'PTRA08',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::1041',
            'base_crs' => 'urn:ogc:def:crs:EPSG::5011',
        ],
        'urn:ogc:def:crs:EPSG::5245' => [
            'name' => 'GDBD2009',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::1056',
            'base_crs' => 'urn:ogc:def:crs:EPSG::5244',
        ],
        'urn:ogc:def:crs:EPSG::5251' => [
            'name' => 'TUREF',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::1057',
            'base_crs' => 'urn:ogc:def:crs:EPSG::5250',
        ],
        'urn:ogc:def:crs:EPSG::5263' => [
            'name' => 'DRUKREF 03',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::1058',
            'base_crs' => 'urn:ogc:def:crs:EPSG::5262',
        ],
        'urn:ogc:def:crs:EPSG::5323' => [
            'name' => 'ISN2004',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::1060',
            'base_crs' => 'urn:ogc:def:crs:EPSG::5322',
        ],
        'urn:ogc:def:crs:EPSG::5342' => [
            'name' => 'POSGAR 2007',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::1062',
            'base_crs' => 'urn:ogc:def:crs:EPSG::5341',
        ],
        'urn:ogc:def:crs:EPSG::5353' => [
            'name' => 'MARGEN',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::1063',
            'base_crs' => 'urn:ogc:def:crs:EPSG::5352',
        ],
        'urn:ogc:def:crs:EPSG::5359' => [
            'name' => 'SIRGAS-Chile 2002',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::1064',
            'base_crs' => 'urn:ogc:def:crs:EPSG::5358',
        ],
        'urn:ogc:def:crs:EPSG::5364' => [
            'name' => 'CR05',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::1065',
            'base_crs' => 'urn:ogc:def:crs:EPSG::5363',
        ],
        'urn:ogc:def:crs:EPSG::5370' => [
            'name' => 'MACARIO SOLIS',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::1066',
            'base_crs' => 'urn:ogc:def:crs:EPSG::5368',
        ],
        'urn:ogc:def:crs:EPSG::5372' => [
            'name' => 'Peru96',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::1067',
            'base_crs' => 'urn:ogc:def:crs:EPSG::5369',
        ],
        'urn:ogc:def:crs:EPSG::5380' => [
            'name' => 'SIRGAS-ROU98',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::1068',
            'base_crs' => 'urn:ogc:def:crs:EPSG::5379',
        ],
        'urn:ogc:def:crs:EPSG::5392' => [
            'name' => 'SIRGAS_ES2007.8',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::1069',
            'base_crs' => 'urn:ogc:def:crs:EPSG::5391',
        ],
        'urn:ogc:def:crs:EPSG::5488' => [
            'name' => 'RGAF09',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::1073',
            'base_crs' => 'urn:ogc:def:crs:EPSG::5487',
        ],
        'urn:ogc:def:crs:EPSG::5545' => [
            'name' => 'PNG94',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::1076',
            'base_crs' => 'urn:ogc:def:crs:EPSG::5544',
        ],
        'urn:ogc:def:crs:EPSG::5560' => [
            'name' => 'UCS-2000',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::1077',
            'base_crs' => 'urn:ogc:def:crs:EPSG::5558',
        ],
        'urn:ogc:def:crs:EPSG::5592' => [
            'name' => 'FEH2010',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::1078',
            'base_crs' => 'urn:ogc:def:crs:EPSG::5591',
        ],
        'urn:ogc:def:crs:EPSG::5830' => [
            'name' => 'DB_REF',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::1081',
            'base_crs' => 'urn:ogc:def:crs:EPSG::5828',
        ],
        'urn:ogc:def:crs:EPSG::5885' => [
            'name' => 'TGD2005',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::1095',
            'base_crs' => 'urn:ogc:def:crs:EPSG::5884',
        ],
        'urn:ogc:def:crs:EPSG::61266413' => [
            'name' => 'LKS94 (ETRS89) (3D deg)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6413',
            'base_crs' => 'urn:ogc:def:crs:EPSG::4355',
        ],
        'urn:ogc:def:crs:EPSG::61306413' => [
            'name' => 'Moznet (3D deg)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6413',
            'base_crs' => 'urn:ogc:def:crs:EPSG::4357',
        ],
        'urn:ogc:def:crs:EPSG::6134' => [
            'name' => 'CIGD11',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::1100',
            'base_crs' => 'urn:ogc:def:crs:EPSG::6133',
        ],
        'urn:ogc:def:crs:EPSG::61406413' => [
            'name' => 'NAD83(CSRS) (3D deg)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6413',
            'base_crs' => 'urn:ogc:def:crs:EPSG::4359',
        ],
        'urn:ogc:def:crs:EPSG::61486413' => [
            'name' => 'Hartebeesthoek94 (3D deg)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6413',
            'base_crs' => 'urn:ogc:def:crs:EPSG::4349',
        ],
        'urn:ogc:def:crs:EPSG::61516413' => [
            'name' => 'CHTRF95 (3D deg)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6413',
            'base_crs' => 'urn:ogc:def:crs:EPSG::4343',
        ],
        'urn:ogc:def:crs:EPSG::61526413' => [
            'name' => 'NAD83(HARN) (3D deg)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6413',
            'base_crs' => 'urn:ogc:def:crs:EPSG::4361',
        ],
        'urn:ogc:def:crs:EPSG::61636413' => [
            'name' => 'Yemen NGN96 (3D deg)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6413',
            'base_crs' => 'urn:ogc:def:crs:EPSG::4379',
        ],
        'urn:ogc:def:crs:EPSG::61676413' => [
            'name' => 'NZGD2000 (3D deg)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6413',
            'base_crs' => 'urn:ogc:def:crs:EPSG::4363',
        ],
        'urn:ogc:def:crs:EPSG::61706413' => [
            'name' => 'SIRGAS (3D deg)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6413',
            'base_crs' => 'urn:ogc:def:crs:EPSG::4375',
        ],
        'urn:ogc:def:crs:EPSG::61716413' => [
            'name' => 'RGF93 (3D deg)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6413',
            'base_crs' => 'urn:ogc:def:crs:EPSG::4369',
        ],
        'urn:ogc:def:crs:EPSG::61736413' => [
            'name' => 'IRENET95 (3D deg)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6413',
            'base_crs' => 'urn:ogc:def:crs:EPSG::4351',
        ],
        'urn:ogc:def:crs:EPSG::61766413' => [
            'name' => 'Australian Antarctic (3D deg)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6413',
            'base_crs' => 'urn:ogc:def:crs:EPSG::4339',
        ],
        'urn:ogc:def:crs:EPSG::61806413' => [
            'name' => 'EST97 (3D deg)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6413',
            'base_crs' => 'urn:ogc:def:crs:EPSG::4341',
        ],
        'urn:ogc:def:crs:EPSG::61896413' => [
            'name' => 'REGVEN (3D deg)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6413',
            'base_crs' => 'urn:ogc:def:crs:EPSG::4367',
        ],
        'urn:ogc:def:crs:EPSG::61906413' => [
            'name' => 'POSGAR 98 (3D deg)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6413',
            'base_crs' => 'urn:ogc:def:crs:EPSG::4365',
        ],
        'urn:ogc:def:crs:EPSG::62586413' => [
            'name' => 'ETRS89 (3D deg)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6413',
            'base_crs' => 'urn:ogc:def:crs:EPSG::4345',
        ],
        'urn:ogc:def:crs:EPSG::62836413' => [
            'name' => 'GDA94 (3D deg)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6413',
            'base_crs' => 'urn:ogc:def:crs:EPSG::4347',
        ],
        'urn:ogc:def:crs:EPSG::6310' => [
            'name' => 'CGRS93',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::1112',
            'base_crs' => 'urn:ogc:def:crs:EPSG::6309',
        ],
        'urn:ogc:def:crs:EPSG::6319' => [
            'name' => 'NAD83(2011)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::1116',
            'base_crs' => 'urn:ogc:def:crs:EPSG::6317',
        ],
        'urn:ogc:def:crs:EPSG::6321' => [
            'name' => 'NAD83(PA11)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::1117',
            'base_crs' => 'urn:ogc:def:crs:EPSG::6320',
        ],
        'urn:ogc:def:crs:EPSG::6324' => [
            'name' => 'NAD83(MA11)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::1118',
            'base_crs' => 'urn:ogc:def:crs:EPSG::6323',
        ],
        'urn:ogc:def:crs:EPSG::63266413' => [
            'name' => 'WGS 84 (3D deg)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6413',
            'base_crs' => 'urn:ogc:def:crs:EPSG::4329',
        ],
        'urn:ogc:def:crs:EPSG::63266414' => [
            'name' => 'WGS 84 (3D degH)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6414',
            'base_crs' => 'urn:ogc:def:crs:EPSG::4329',
        ],
        'urn:ogc:def:crs:EPSG::63266415' => [
            'name' => 'WGS 84 (3D Hdeg)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6415',
            'base_crs' => 'urn:ogc:def:crs:EPSG::4329',
        ],
        'urn:ogc:def:crs:EPSG::63266416' => [
            'name' => 'WGS 84 (3D DM)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6416',
            'base_crs' => 'urn:ogc:def:crs:EPSG::4329',
        ],
        'urn:ogc:def:crs:EPSG::63266417' => [
            'name' => 'WGS 84 (3D DMH)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6417',
            'base_crs' => 'urn:ogc:def:crs:EPSG::4329',
        ],
        'urn:ogc:def:crs:EPSG::63266418' => [
            'name' => 'WGS 84 (3D HDM)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6418',
            'base_crs' => 'urn:ogc:def:crs:EPSG::4329',
        ],
        'urn:ogc:def:crs:EPSG::63266419' => [
            'name' => 'WGS 84 (3D DMS)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6419',
            'base_crs' => 'urn:ogc:def:crs:EPSG::4329',
        ],
        'urn:ogc:def:crs:EPSG::63266420' => [
            'name' => 'WGS 84 (3D HDMS)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6420',
            'base_crs' => 'urn:ogc:def:crs:EPSG::4329',
        ],
        'urn:ogc:def:crs:EPSG::6364' => [
            'name' => 'Mexico ITRF2008',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::1120',
            'base_crs' => 'urn:ogc:def:crs:EPSG::6363',
        ],
        'urn:ogc:def:crs:EPSG::66126413' => [
            'name' => 'JGD2000 (3D deg)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6413',
            'base_crs' => 'urn:ogc:def:crs:EPSG::4353',
        ],
        'urn:ogc:def:crs:EPSG::66196413' => [
            'name' => 'SWEREF99 (3D deg)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6413',
            'base_crs' => 'urn:ogc:def:crs:EPSG::4377',
        ],
        'urn:ogc:def:crs:EPSG::66246413' => [
            'name' => 'RGFG95 (3D deg)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6413',
            'base_crs' => 'urn:ogc:def:crs:EPSG::4371',
        ],
        'urn:ogc:def:crs:EPSG::66276413' => [
            'name' => 'RGR92 (3D deg)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6413',
            'base_crs' => 'urn:ogc:def:crs:EPSG::4373',
        ],
        'urn:ogc:def:crs:EPSG::66406413' => [
            'name' => 'RRAF 1991 (3D deg)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6413',
            'base_crs' => 'urn:ogc:def:crs:EPSG::4383',
        ],
        'urn:ogc:def:crs:EPSG::66456413' => [
            'name' => 'RGNC 1991 (3D deg)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6413',
            'base_crs' => 'urn:ogc:def:crs:EPSG::4381',
        ],
        'urn:ogc:def:crs:EPSG::66596413' => [
            'name' => 'ISN93 (3D deg)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6401',
            'base_crs' => 'urn:ogc:def:crs:EPSG::4386',
        ],
        'urn:ogc:def:crs:EPSG::66616413' => [
            'name' => 'LKS92 (3D deg)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6413',
            'base_crs' => 'urn:ogc:def:crs:EPSG::4388',
        ],
        'urn:ogc:def:crs:EPSG::6667' => [
            'name' => 'JGD2011',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::1128',
            'base_crs' => 'urn:ogc:def:crs:EPSG::6666',
        ],
        'urn:ogc:def:crs:EPSG::6705' => [
            'name' => 'RDN2008',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::1132',
            'base_crs' => 'urn:ogc:def:crs:EPSG::6704',
        ],
        'urn:ogc:def:crs:EPSG::6782' => [
            'name' => 'NAD83(CORS96)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::1133',
            'base_crs' => 'urn:ogc:def:crs:EPSG::6781',
        ],
        'urn:ogc:def:crs:EPSG::6979' => [
            'name' => 'IGD05',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::1143',
            'base_crs' => 'urn:ogc:def:crs:EPSG::6978',
        ],
        'urn:ogc:def:crs:EPSG::6982' => [
            'name' => 'IG05 Intermediate CRS',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::1142',
            'base_crs' => 'urn:ogc:def:crs:EPSG::6981',
        ],
        'urn:ogc:def:crs:EPSG::6986' => [
            'name' => 'IGD05/12',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::1145',
            'base_crs' => 'urn:ogc:def:crs:EPSG::6985',
        ],
        'urn:ogc:def:crs:EPSG::6989' => [
            'name' => 'IG05/12 Intermediate CRS',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::1144',
            'base_crs' => 'urn:ogc:def:crs:EPSG::6988',
        ],
        'urn:ogc:def:crs:EPSG::7034' => [
            'name' => 'RGSPM06 (lon-lat)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6426',
            'datum' => 'urn:ogc:def:datum:EPSG::1038',
            'base_crs' => 'urn:ogc:def:crs:EPSG::4466',
        ],
        'urn:ogc:def:crs:EPSG::7036' => [
            'name' => 'RGR92 (lon-lat)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6426',
            'datum' => 'urn:ogc:def:datum:EPSG::6627',
            'base_crs' => 'urn:ogc:def:crs:EPSG::4971',
        ],
        'urn:ogc:def:crs:EPSG::7038' => [
            'name' => 'RGM04 (lon-lat)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6426',
            'datum' => 'urn:ogc:def:datum:EPSG::1036',
            'base_crs' => 'urn:ogc:def:crs:EPSG::4469',
        ],
        'urn:ogc:def:crs:EPSG::7040' => [
            'name' => 'RGFG95 (lon-lat)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6426',
            'datum' => 'urn:ogc:def:datum:EPSG::6624',
            'base_crs' => 'urn:ogc:def:crs:EPSG::4967',
        ],
        'urn:ogc:def:crs:EPSG::7042' => [
            'name' => 'RGF93 (lon-lat)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6426',
            'datum' => 'urn:ogc:def:datum:EPSG::6171',
            'base_crs' => 'urn:ogc:def:crs:EPSG::4965',
        ],
        'urn:ogc:def:crs:EPSG::7072' => [
            'name' => 'RGTAAF07',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::1113',
            'base_crs' => 'urn:ogc:def:crs:EPSG::7071',
        ],
        'urn:ogc:def:crs:EPSG::7085' => [
            'name' => 'RGAF09 (lon-lat)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6426',
            'datum' => 'urn:ogc:def:datum:EPSG::1073',
            'base_crs' => 'urn:ogc:def:crs:EPSG::5488',
        ],
        'urn:ogc:def:crs:EPSG::7087' => [
            'name' => 'RGTAAF07 (lon-lat)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6426',
            'datum' => 'urn:ogc:def:datum:EPSG::1113',
            'base_crs' => 'urn:ogc:def:crs:EPSG::7072',
        ],
        'urn:ogc:def:crs:EPSG::7135' => [
            'name' => 'IGD05',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::1114',
            'base_crs' => 'urn:ogc:def:crs:EPSG::7134',
        ],
        'urn:ogc:def:crs:EPSG::7138' => [
            'name' => 'IGD05/12',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::1115',
            'base_crs' => 'urn:ogc:def:crs:EPSG::7137',
        ],
        'urn:ogc:def:crs:EPSG::7372' => [
            'name' => 'ONGD14',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::1147',
            'base_crs' => 'urn:ogc:def:crs:EPSG::7371',
        ],
        'urn:ogc:def:crs:EPSG::7657' => [
            'name' => 'WGS 84 (G730)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::1152',
            'base_crs' => 'urn:ogc:def:crs:EPSG::7656',
        ],
        'urn:ogc:def:crs:EPSG::7659' => [
            'name' => 'WGS 84 (G873)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::1153',
            'base_crs' => 'urn:ogc:def:crs:EPSG::7658',
        ],
        'urn:ogc:def:crs:EPSG::7661' => [
            'name' => 'WGS 84 (G1150)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::1154',
            'base_crs' => 'urn:ogc:def:crs:EPSG::7660',
        ],
        'urn:ogc:def:crs:EPSG::7663' => [
            'name' => 'WGS 84 (G1674)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::1155',
            'base_crs' => 'urn:ogc:def:crs:EPSG::7662',
        ],
        'urn:ogc:def:crs:EPSG::7665' => [
            'name' => 'WGS 84 (G1762)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::1156',
            'base_crs' => 'urn:ogc:def:crs:EPSG::7664',
        ],
        'urn:ogc:def:crs:EPSG::7678' => [
            'name' => 'PZ-90.02',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::1157',
            'base_crs' => 'urn:ogc:def:crs:EPSG::7677',
        ],
        'urn:ogc:def:crs:EPSG::7680' => [
            'name' => 'PZ-90.11',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::1158',
            'base_crs' => 'urn:ogc:def:crs:EPSG::7679',
        ],
        'urn:ogc:def:crs:EPSG::7682' => [
            'name' => 'GSK-2011',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::1159',
            'base_crs' => 'urn:ogc:def:crs:EPSG::7681',
        ],
        'urn:ogc:def:crs:EPSG::7685' => [
            'name' => 'Kyrg-06',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::1160',
            'base_crs' => 'urn:ogc:def:crs:EPSG::7684',
        ],
        'urn:ogc:def:crs:EPSG::7797' => [
            'name' => 'BGS2005',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::1167',
            'base_crs' => 'urn:ogc:def:crs:EPSG::7796',
        ],
        'urn:ogc:def:crs:EPSG::7816' => [
            'name' => 'WGS 84 (Transit)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::1166',
            'base_crs' => 'urn:ogc:def:crs:EPSG::7815',
        ],
        'urn:ogc:def:crs:EPSG::7843' => [
            'name' => 'GDA2020',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::1168',
            'base_crs' => 'urn:ogc:def:crs:EPSG::7842',
        ],
        'urn:ogc:def:crs:EPSG::7880' => [
            'name' => 'St. Helena Tritan',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::1173',
            'base_crs' => 'urn:ogc:def:crs:EPSG::7879',
        ],
        'urn:ogc:def:crs:EPSG::7885' => [
            'name' => 'SHGD2015',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::1174',
            'base_crs' => 'urn:ogc:def:crs:EPSG::7884',
        ],
        'urn:ogc:def:crs:EPSG::7900' => [
            'name' => 'ITRF88',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::6647',
            'base_crs' => 'urn:ogc:def:crs:EPSG::4910',
        ],
        'urn:ogc:def:crs:EPSG::7901' => [
            'name' => 'ITRF89',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::6648',
            'base_crs' => 'urn:ogc:def:crs:EPSG::4911',
        ],
        'urn:ogc:def:crs:EPSG::7902' => [
            'name' => 'ITRF90',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::6649',
            'base_crs' => 'urn:ogc:def:crs:EPSG::4912',
        ],
        'urn:ogc:def:crs:EPSG::7903' => [
            'name' => 'ITRF91',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::6650',
            'base_crs' => 'urn:ogc:def:crs:EPSG::4912',
        ],
        'urn:ogc:def:crs:EPSG::7904' => [
            'name' => 'ITRF92',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::6651',
            'base_crs' => 'urn:ogc:def:crs:EPSG::4914',
        ],
        'urn:ogc:def:crs:EPSG::7905' => [
            'name' => 'ITRF93',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::6652',
            'base_crs' => 'urn:ogc:def:crs:EPSG::4915',
        ],
        'urn:ogc:def:crs:EPSG::7906' => [
            'name' => 'ITRF94',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::6653',
            'base_crs' => 'urn:ogc:def:crs:EPSG::4916',
        ],
        'urn:ogc:def:crs:EPSG::7907' => [
            'name' => 'ITRF96',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::6654',
            'base_crs' => 'urn:ogc:def:crs:EPSG::4917',
        ],
        'urn:ogc:def:crs:EPSG::7908' => [
            'name' => 'ITRF97',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::6655',
            'base_crs' => 'urn:ogc:def:crs:EPSG::4918',
        ],
        'urn:ogc:def:crs:EPSG::7909' => [
            'name' => 'ITRF2000',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::6656',
            'base_crs' => 'urn:ogc:def:crs:EPSG::4919',
        ],
        'urn:ogc:def:crs:EPSG::7910' => [
            'name' => 'ITRF2005',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::6896',
            'base_crs' => 'urn:ogc:def:crs:EPSG::4896',
        ],
        'urn:ogc:def:crs:EPSG::7911' => [
            'name' => 'ITRF2008',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::1061',
            'base_crs' => 'urn:ogc:def:crs:EPSG::5332',
        ],
        'urn:ogc:def:crs:EPSG::7912' => [
            'name' => 'ITRF2014',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::1165',
            'base_crs' => 'urn:ogc:def:crs:EPSG::7789',
        ],
        'urn:ogc:def:crs:EPSG::7915' => [
            'name' => 'ETRF89',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::1178',
            'base_crs' => 'urn:ogc:def:crs:EPSG::7914',
        ],
        'urn:ogc:def:crs:EPSG::7917' => [
            'name' => 'ETRF90',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::1179',
            'base_crs' => 'urn:ogc:def:crs:EPSG::7916',
        ],
        'urn:ogc:def:crs:EPSG::7919' => [
            'name' => 'ETRF91',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::1180',
            'base_crs' => 'urn:ogc:def:crs:EPSG::7918',
        ],
        'urn:ogc:def:crs:EPSG::7921' => [
            'name' => 'ETRF92',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::1181',
            'base_crs' => 'urn:ogc:def:crs:EPSG::7920',
        ],
        'urn:ogc:def:crs:EPSG::7923' => [
            'name' => 'ETRF93',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::1182',
            'base_crs' => 'urn:ogc:def:crs:EPSG::7922',
        ],
        'urn:ogc:def:crs:EPSG::7925' => [
            'name' => 'ETRF94',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::1183',
            'base_crs' => 'urn:ogc:def:crs:EPSG::7924',
        ],
        'urn:ogc:def:crs:EPSG::7927' => [
            'name' => 'ETRF96',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::1184',
            'base_crs' => 'urn:ogc:def:crs:EPSG::7926',
        ],
        'urn:ogc:def:crs:EPSG::7929' => [
            'name' => 'ETRF97',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::1185',
            'base_crs' => 'urn:ogc:def:crs:EPSG::7928',
        ],
        'urn:ogc:def:crs:EPSG::7931' => [
            'name' => 'ETRF2000',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::1186',
            'base_crs' => 'urn:ogc:def:crs:EPSG::7930',
        ],
        'urn:ogc:def:crs:EPSG::8085' => [
            'name' => 'ISN2016',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::1187',
            'base_crs' => 'urn:ogc:def:crs:EPSG::8084',
        ],
        'urn:ogc:def:crs:EPSG::8231' => [
            'name' => 'NAD83(CSRS96)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::1192',
            'base_crs' => 'urn:ogc:def:crs:EPSG::8230',
        ],
        'urn:ogc:def:crs:EPSG::8235' => [
            'name' => 'NAD83(CSRS)v2',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::1193',
            'base_crs' => 'urn:ogc:def:crs:EPSG::8233',
        ],
        'urn:ogc:def:crs:EPSG::8239' => [
            'name' => 'NAD83(CSRS)v3',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::1194',
            'base_crs' => 'urn:ogc:def:crs:EPSG::8238',
        ],
        'urn:ogc:def:crs:EPSG::8244' => [
            'name' => 'NAD83(CSRS)v4',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::1195',
            'base_crs' => 'urn:ogc:def:crs:EPSG::8242',
        ],
        'urn:ogc:def:crs:EPSG::8248' => [
            'name' => 'NAD83(CSRS)v5',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::1196',
            'base_crs' => 'urn:ogc:def:crs:EPSG::8247',
        ],
        'urn:ogc:def:crs:EPSG::8251' => [
            'name' => 'NAD83(CSRS)v6',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::1197',
            'base_crs' => 'urn:ogc:def:crs:EPSG::8250',
        ],
        'urn:ogc:def:crs:EPSG::8254' => [
            'name' => 'NAD83(CSRS)v7',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::1198',
            'base_crs' => 'urn:ogc:def:crs:EPSG::8253',
        ],
        'urn:ogc:def:crs:EPSG::8399' => [
            'name' => 'ETRF2005',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::1204',
            'base_crs' => 'urn:ogc:def:crs:EPSG::8397',
        ],
        'urn:ogc:def:crs:EPSG::8403' => [
            'name' => 'ETRF2014',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::1206',
            'base_crs' => 'urn:ogc:def:crs:EPSG::8401',
        ],
        'urn:ogc:def:crs:EPSG::8426' => [
            'name' => 'Hong Kong Geodetic CS',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::1209',
            'base_crs' => 'urn:ogc:def:crs:EPSG::8425',
        ],
        'urn:ogc:def:crs:EPSG::8430' => [
            'name' => 'Macao 2008',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::1208',
            'base_crs' => 'urn:ogc:def:crs:EPSG::8429',
        ],
        'urn:ogc:def:crs:EPSG::8542' => [
            'name' => 'NAD83(FBN)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::1211',
            'base_crs' => 'urn:ogc:def:crs:EPSG::8541',
        ],
        'urn:ogc:def:crs:EPSG::8544' => [
            'name' => 'NAD83(HARN Corrected)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::1212',
            'base_crs' => 'urn:ogc:def:crs:EPSG::8543',
        ],
        'urn:ogc:def:crs:EPSG::8684' => [
            'name' => 'SRB_ETRS89',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::1214',
            'base_crs' => 'urn:ogc:def:crs:EPSG::8683',
        ],
        'urn:ogc:def:crs:EPSG::8698' => [
            'name' => 'RSAO13',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::1220',
            'base_crs' => 'urn:ogc:def:crs:EPSG::8697',
        ],
        'urn:ogc:def:crs:EPSG::8817' => [
            'name' => 'MTRF-2000',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::1218',
            'base_crs' => 'urn:ogc:def:crs:EPSG::8816',
        ],
        'urn:ogc:def:crs:EPSG::8899' => [
            'name' => 'RGWF96',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::1223',
            'base_crs' => 'urn:ogc:def:crs:EPSG::8898',
        ],
        'urn:ogc:def:crs:EPSG::8901' => [
            'name' => 'RGWF96 (lon-lat)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6426',
            'datum' => 'urn:ogc:def:datum:EPSG::1223',
            'base_crs' => 'urn:ogc:def:crs:EPSG::8899',
        ],
        'urn:ogc:def:crs:EPSG::8906' => [
            'name' => 'CR-SIRGAS',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::1225',
            'base_crs' => 'urn:ogc:def:crs:EPSG::8905',
        ],
        'urn:ogc:def:crs:EPSG::8916' => [
            'name' => 'SIRGAS-CON DGF00P01',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::1227',
            'base_crs' => 'urn:ogc:def:crs:EPSG::8915',
        ],
        'urn:ogc:def:crs:EPSG::8918' => [
            'name' => 'SIRGAS-CON DGF01P01',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::1228',
            'base_crs' => 'urn:ogc:def:crs:EPSG::8917',
        ],
        'urn:ogc:def:crs:EPSG::8920' => [
            'name' => 'SIRGAS-CON DGF01P02',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::1229',
            'base_crs' => 'urn:ogc:def:crs:EPSG::8919',
        ],
        'urn:ogc:def:crs:EPSG::8922' => [
            'name' => 'SIRGAS-CON DGF02P01',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::1230',
            'base_crs' => 'urn:ogc:def:crs:EPSG::8921',
        ],
        'urn:ogc:def:crs:EPSG::8924' => [
            'name' => 'SIRGAS-CON DGF04P01',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::1231',
            'base_crs' => 'urn:ogc:def:crs:EPSG::8923',
        ],
        'urn:ogc:def:crs:EPSG::8926' => [
            'name' => 'SIRGAS-CON DGF05P01',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::1232',
            'base_crs' => 'urn:ogc:def:crs:EPSG::8925',
        ],
        'urn:ogc:def:crs:EPSG::8928' => [
            'name' => 'SIRGAS-CON DGF06P01',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::1233',
            'base_crs' => 'urn:ogc:def:crs:EPSG::8927',
        ],
        'urn:ogc:def:crs:EPSG::8930' => [
            'name' => 'SIRGAS-CON DGF07P01',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::1234',
            'base_crs' => 'urn:ogc:def:crs:EPSG::8929',
        ],
        'urn:ogc:def:crs:EPSG::8932' => [
            'name' => 'SIRGAS-CON DGF08P01',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::1235',
            'base_crs' => 'urn:ogc:def:crs:EPSG::8931',
        ],
        'urn:ogc:def:crs:EPSG::8934' => [
            'name' => 'SIRGAS-CON SIR09P01',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::1236',
            'base_crs' => 'urn:ogc:def:crs:EPSG::8933',
        ],
        'urn:ogc:def:crs:EPSG::8936' => [
            'name' => 'SIRGAS-CON SIR10P01',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::1237',
            'base_crs' => 'urn:ogc:def:crs:EPSG::8935',
        ],
        'urn:ogc:def:crs:EPSG::8938' => [
            'name' => 'SIRGAS-CON SIR11P01',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::1238',
            'base_crs' => 'urn:ogc:def:crs:EPSG::8937',
        ],
        'urn:ogc:def:crs:EPSG::8940' => [
            'name' => 'SIRGAS-CON SIR13P01',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::1239',
            'base_crs' => 'urn:ogc:def:crs:EPSG::8939',
        ],
        'urn:ogc:def:crs:EPSG::8942' => [
            'name' => 'SIRGAS-CON SIR14P01',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::1240',
            'base_crs' => 'urn:ogc:def:crs:EPSG::8941',
        ],
        'urn:ogc:def:crs:EPSG::8944' => [
            'name' => 'SIRGAS-CON SIR15P01',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::1241',
            'base_crs' => 'urn:ogc:def:crs:EPSG::8943',
        ],
        'urn:ogc:def:crs:EPSG::8946' => [
            'name' => 'SIRGAS-CON SIR17P01',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::1242',
            'base_crs' => 'urn:ogc:def:crs:EPSG::8945',
        ],
        'urn:ogc:def:crs:EPSG::8948' => [
            'name' => 'SIRGAS-Chile 2010',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::1243',
            'base_crs' => 'urn:ogc:def:crs:EPSG::8947',
        ],
        'urn:ogc:def:crs:EPSG::9002' => [
            'name' => 'IGS97',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::1244',
            'base_crs' => 'urn:ogc:def:crs:EPSG::9001',
        ],
        'urn:ogc:def:crs:EPSG::9005' => [
            'name' => 'IGS00',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::1245',
            'base_crs' => 'urn:ogc:def:crs:EPSG::9004',
        ],
        'urn:ogc:def:crs:EPSG::9008' => [
            'name' => 'IGb00',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::1246',
            'base_crs' => 'urn:ogc:def:crs:EPSG::9007',
        ],
        'urn:ogc:def:crs:EPSG::9011' => [
            'name' => 'IGS05',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::1247',
            'base_crs' => 'urn:ogc:def:crs:EPSG::9010',
        ],
        'urn:ogc:def:crs:EPSG::9013' => [
            'name' => 'IGS08',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::1141',
            'base_crs' => 'urn:ogc:def:crs:EPSG::6934',
        ],
        'urn:ogc:def:crs:EPSG::9016' => [
            'name' => 'IGb08',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::1248',
            'base_crs' => 'urn:ogc:def:crs:EPSG::9015',
        ],
        'urn:ogc:def:crs:EPSG::9018' => [
            'name' => 'IGS14',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::1191',
            'base_crs' => 'urn:ogc:def:crs:EPSG::8227',
        ],
        'urn:ogc:def:crs:EPSG::9071' => [
            'name' => 'NAD83(MARP00)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::1221',
            'base_crs' => 'urn:ogc:def:crs:EPSG::9070',
        ],
        'urn:ogc:def:crs:EPSG::9074' => [
            'name' => 'NAD83(PACP00)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::1249',
            'base_crs' => 'urn:ogc:def:crs:EPSG::9073',
        ],
        'urn:ogc:def:crs:EPSG::9139' => [
            'name' => 'KOSOVAREF01',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::1251',
            'base_crs' => 'urn:ogc:def:crs:EPSG::9138',
        ],
        'urn:ogc:def:crs:EPSG::9147' => [
            'name' => 'SIRGAS-Chile 2013',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::1252',
            'base_crs' => 'urn:ogc:def:crs:EPSG::9146',
        ],
        'urn:ogc:def:crs:EPSG::9152' => [
            'name' => 'SIRGAS-Chile 2016',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::1253',
            'base_crs' => 'urn:ogc:def:crs:EPSG::9151',
        ],
        'urn:ogc:def:crs:EPSG::9183' => [
            'name' => 'SIRGAS-Chile',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::1254',
            'base_crs' => 'urn:ogc:def:crs:EPSG::9182',
        ],
        'urn:ogc:def:crs:EPSG::9267' => [
            'name' => 'MGI',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::6312',
            'base_crs' => 'urn:ogc:def:crs:EPSG::9266',
        ],
        'urn:ogc:def:crs:EPSG::9293' => [
            'name' => 'ONGD17',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::1263',
            'base_crs' => 'urn:ogc:def:crs:EPSG::9292',
        ],
        'urn:ogc:def:crs:EPSG::9308' => [
            'name' => 'ATRF2014',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::1291',
            'base_crs' => 'urn:ogc:def:crs:EPSG::9307',
        ],
        'urn:ogc:def:crs:EPSG::9332' => [
            'name' => 'KSA-GRF17',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::1268',
            'base_crs' => 'urn:ogc:def:crs:EPSG::9331',
        ],
        'urn:ogc:def:crs:EPSG::9379' => [
            'name' => 'IGb14',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::1272',
            'base_crs' => 'urn:ogc:def:crs:EPSG::9378',
        ],
        'urn:ogc:def:crs:EPSG::9469' => [
            'name' => 'SRGI2013',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6423',
            'datum' => 'urn:ogc:def:datum:EPSG::1293',
            'base_crs' => 'urn:ogc:def:crs:EPSG::9468',
        ],
    ];

    public function __construct(
        string $srid,
        CoordinateSystem $coordinateSystem,
        Datum $datum
    ) {
        $this->srid = $srid;
        $this->coordinateSystem = $coordinateSystem;
        $this->datum = $datum;

        assert(count($coordinateSystem->getAxes()) === 3);
    }

    public function getSRID(): string
    {
        return $this->srid;
    }

    public function getCoordinateSystem(): CoordinateSystem
    {
        return $this->coordinateSystem;
    }

    public function getDatum(): Datum
    {
        return $this->datum;
    }

    public static function fromSRID(string $srid): self
    {
        if (!isset(static::$sridData[$srid])) {
            throw new UnknownCoordinateReferenceSystemException($srid);
        }

        $data = static::$sridData[$srid];

        return new self(
            $srid,
            Ellipsoidal::fromSRID($data['coordinate_system']),
            isset($data['datum']) ? Datum::fromSRID($data['datum']) : self::fromSRID($data['base_crs'])->getDatum()
        );
    }

    public static function getSupportedSRIDs(): array
    {
        return array_map(function ($sridData) {return $sridData['name']; }, static::$sridData);
    }
}
