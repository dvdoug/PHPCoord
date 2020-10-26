<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\CoordinateReferenceSystem;

use PHPCoord\CoordinateSystem\CoordinateSystem;
use PHPCoord\Datum\Datum;

class Geographic3D extends Geographic
{
    /**
     * ATRF2014
     * Extent: Australia including Lord Howe Island, Macquarie Islands, Ashmore and Cartier Islands, Christmas Island,
     * Cocos (Keeling) Islands, Norfolk Island. All onshore and offshore.
     * Scope: Location-based services, Intelligent Transport Services, navigation, positioning.
     */
    public const EPSG_ATRF2014 = 9308;

    /**
     * Australian Antarctic
     * Extent: Antarctica between 45°E and 136°E and between 142°E and 160°E - Australian sector.
     * Scope: Geodesy.
     */
    public const EPSG_AUSTRALIAN_ANTARCTIC = 4931;

    /**
     * BDA2000
     * Extent: Bermuda - onshore and offshore.
     * Scope: Geodesy.
     */
    public const EPSG_BDA2000 = 4887;

    /**
     * BGS2005
     * Extent: Bulgaria - onshore and offshore.
     * Scope: Geodesy.
     * Adopted 2010-07-29.
     */
    public const EPSG_BGS2005 = 7797;

    /**
     * CGRS93
     * Extent: Cyprus - onshore.
     * Scope: Geodesy.
     */
    public const EPSG_CGRS93 = 6310;

    /**
     * CHTRF95
     * Extent: Liechtenstein; Switzerland.
     * Scope: Geodesy.
     * Referenced to ETRS89 at epoch 1993.0. For CRS used for topographic and cadastral purposes see CH1903+ (CRS code
     * 4150).
     */
    public const EPSG_CHTRF95 = 4933;

    /**
     * CIGD11
     * Extent: Cayman Islands - onshore and offshore. Includes Grand Cayman, Little Cayman and Cayman Brac.
     * Scope: Geodesy.
     */
    public const EPSG_CIGD11 = 6134;

    /**
     * CR-SIRGAS
     * Extent: Costa Rica - onshore and offshore.
     * Scope: Geodesy.
     * Replaces CR05 (CRS code 5364) from April 2018.
     */
    public const EPSG_CR_SIRGAS = 8906;

    /**
     * CR05
     * Extent: Costa Rica - onshore and offshore.
     * Scope: Geodesy.
     * Replaced by CR-SIRGAS (CRS code 8906) from April 2018.
     */
    public const EPSG_CR05 = 5364;

    /**
     * Cadastre 1997
     * Extent: Mayotte - onshore.
     * Scope: Geodesy.
     */
    public const EPSG_CADASTRE_1997 = 4472;

    /**
     * China Geodetic Coordinate System 2000
     * Extent: China - onshore and offshore.
     * Scope: Geodesy.
     */
    public const EPSG_CHINA_GEODETIC_COORDINATE_SYSTEM_2000 = 4480;

    /**
     * DB_REF
     * Extent: Germany - onshore - states of Baden-Wurtemberg, Bayern, Berlin, Brandenburg, Bremen, Hamburg, Hessen,
     * Mecklenburg-Vorpommern, Niedersachsen, Nordrhein-Westfalen, Rheinland-Pfalz, Saarland, Sachsen, Sachsen-Anhalt,
     * Schleswig-Holstein, Thuringen.
     * Scope: Geodesy.
     */
    public const EPSG_DB_REF = 5830;

    /**
     * DGN95
     * Extent: Indonesia - onshore and offshore.
     * Scope: Geodesy.
     */
    public const EPSG_DGN95 = 4898;

    /**
     * DRUKREF 03
     * Extent: Bhutan.
     * Scope: Geodesy.
     */
    public const EPSG_DRUKREF_03 = 5263;

    /**
     * EST97
     * Extent: Estonia - onshore and offshore.
     * Scope: Geodesy.
     */
    public const EPSG_EST97 = 4935;

    /**
     * ETRF2000
     * Extent: Europe - onshore and offshore: Albania; Andorra; Austria; Belgium; Bosnia and Herzegovina; Bulgaria;
     * Croatia; Cyprus; Czechia; Denmark; Estonia; Faroe Islands; Finland; France; Germany; Gibraltar; Greece; Hungary;
     * Ireland; Italy; Kosovo; Latvia; Liechtenstein; Lithuania; Luxembourg; Malta; Moldova; Monaco; Montenegro;
     * Netherlands; North Macedonia; Norway including Svalbard and Jan Mayen; Poland; Portugal; Romania; San Marino;
     * Serbia; Slovakia; Slovenia; Spain; Sweden; Switzerland; United Kingdom (UK) including Channel Islands and Isle
     * of Man; Vatican City State.
     * Scope: Geodesy.
     * Replaces ETRF97 (code 7929). On the publication of ETRF2005 (code 8399),  the EUREF Technical Working Group
     * recommended that ETRF2000 be the realization of ETRS89. ETRF2014 (code 8403) is technically superior to all
     * earlier realizations of ETRS89.
     */
    public const EPSG_ETRF2000 = 7931;

    /**
     * ETRF2005
     * Extent: Europe - onshore and offshore: Albania; Andorra; Austria; Belgium; Bosnia and Herzegovina; Bulgaria;
     * Croatia; Cyprus; Czechia; Denmark; Estonia; Faroe Islands; Finland; France; Germany; Gibraltar; Greece; Hungary;
     * Ireland; Italy; Kosovo; Latvia; Liechtenstein; Lithuania; Luxembourg; Malta; Moldova; Monaco; Montenegro;
     * Netherlands; North Macedonia; Norway including Svalbard and Jan Mayen; Poland; Portugal; Romania; San Marino;
     * Serbia; Slovakia; Slovenia; Spain; Sweden; Switzerland; United Kingdom (UK) including Channel Islands and Isle
     * of Man; Vatican City State.
     * Scope: Geodesy.
     * On publication in 2007 of this CRS, the EUREF Technical Working Group recommended that ETRF2000 (EPSG code 7931)
     * remained as the preferred realization of ETRS89. Replaced by ETRF2014 (code 8403).
     */
    public const EPSG_ETRF2005 = 8399;

    /**
     * ETRF2014
     * Extent: Europe - onshore and offshore: Albania; Andorra; Austria; Belgium; Bosnia and Herzegovina; Bulgaria;
     * Croatia; Cyprus; Czechia; Denmark; Estonia; Faroe Islands; Finland; France; Germany; Gibraltar; Greece; Hungary;
     * Ireland; Italy; Kosovo; Latvia; Liechtenstein; Lithuania; Luxembourg; Malta; Moldova; Monaco; Montenegro;
     * Netherlands; North Macedonia; Norway including Svalbard and Jan Mayen; Poland; Portugal; Romania; San Marino;
     * Serbia; Slovakia; Slovenia; Spain; Sweden; Switzerland; United Kingdom (UK) including Channel Islands and Isle
     * of Man; Vatican City State.
     * Scope: Geodesy.
     * Replaces ETRF2005 (code 8399). ETRF2014 is technically superior to ETRF2000 but ETRF2000 and other previous
     * realizations may be preferred for backward compatibility reasons. Differences between ETRF2014 and ETRF2000 can
     * reach 7cm.
     */
    public const EPSG_ETRF2014 = 8403;

    /**
     * ETRF89
     * Extent: Europe - onshore and offshore: Albania; Andorra; Austria; Belgium; Bosnia and Herzegovina; Bulgaria;
     * Croatia; Cyprus; Czechia; Denmark; Estonia; Faroe Islands; Finland; France; Germany; Gibraltar; Greece; Hungary;
     * Ireland; Italy; Kosovo; Latvia; Liechtenstein; Lithuania; Luxembourg; Malta; Moldova; Monaco; Montenegro;
     * Netherlands; North Macedonia; Norway including Svalbard and Jan Mayen; Poland; Portugal; Romania; San Marino;
     * Serbia; Slovakia; Slovenia; Spain; Sweden; Switzerland; United Kingdom (UK) including Channel Islands and Isle
     * of Man; Vatican City State.
     * Scope: Geodesy.
     * Replaced by ETRF90 (code 7917).
     */
    public const EPSG_ETRF89 = 7915;

    /**
     * ETRF90
     * Extent: Europe - onshore and offshore: Albania; Andorra; Austria; Belgium; Bosnia and Herzegovina; Bulgaria;
     * Croatia; Cyprus; Czechia; Denmark; Estonia; Faroe Islands; Finland; France; Germany; Gibraltar; Greece; Hungary;
     * Ireland; Italy; Kosovo; Latvia; Liechtenstein; Lithuania; Luxembourg; Malta; Moldova; Monaco; Montenegro;
     * Netherlands; North Macedonia; Norway including Svalbard and Jan Mayen; Poland; Portugal; Romania; San Marino;
     * Serbia; Slovakia; Slovenia; Spain; Sweden; Switzerland; United Kingdom (UK) including Channel Islands and Isle
     * of Man; Vatican City State.
     * Scope: Geodesy.
     * Replaces ETRF89 (code 7915). Replaced by ETRF91 (code 7919).
     */
    public const EPSG_ETRF90 = 7917;

    /**
     * ETRF91
     * Extent: Europe - onshore and offshore: Albania; Andorra; Austria; Belgium; Bosnia and Herzegovina; Bulgaria;
     * Croatia; Cyprus; Czechia; Denmark; Estonia; Faroe Islands; Finland; France; Germany; Gibraltar; Greece; Hungary;
     * Ireland; Italy; Kosovo; Latvia; Liechtenstein; Lithuania; Luxembourg; Malta; Moldova; Monaco; Montenegro;
     * Netherlands; North Macedonia; Norway including Svalbard and Jan Mayen; Poland; Portugal; Romania; San Marino;
     * Serbia; Slovakia; Slovenia; Spain; Sweden; Switzerland; United Kingdom (UK) including Channel Islands and Isle
     * of Man; Vatican City State.
     * Scope: Geodesy.
     * Replaces ETRF90 (code 7917). Replaced by ETRF92 (code 7921).
     */
    public const EPSG_ETRF91 = 7919;

    /**
     * ETRF92
     * Extent: Europe - onshore and offshore: Albania; Andorra; Austria; Belgium; Bosnia and Herzegovina; Bulgaria;
     * Croatia; Cyprus; Czechia; Denmark; Estonia; Faroe Islands; Finland; France; Germany; Gibraltar; Greece; Hungary;
     * Ireland; Italy; Kosovo; Latvia; Liechtenstein; Lithuania; Luxembourg; Malta; Moldova; Monaco; Montenegro;
     * Netherlands; North Macedonia; Norway including Svalbard and Jan Mayen; Poland; Portugal; Romania; San Marino;
     * Serbia; Slovakia; Slovenia; Spain; Sweden; Switzerland; United Kingdom (UK) including Channel Islands and Isle
     * of Man; Vatican City State.
     * Scope: Geodesy.
     * Replaces ETRF91 (code 7919). Replaced by ETRF93 (code 7923).
     */
    public const EPSG_ETRF92 = 7921;

    /**
     * ETRF93
     * Extent: Europe - onshore and offshore: Albania; Andorra; Austria; Belgium; Bosnia and Herzegovina; Bulgaria;
     * Croatia; Cyprus; Czechia; Denmark; Estonia; Faroe Islands; Finland; France; Germany; Gibraltar; Greece; Hungary;
     * Ireland; Italy; Kosovo; Latvia; Liechtenstein; Lithuania; Luxembourg; Malta; Moldova; Monaco; Montenegro;
     * Netherlands; North Macedonia; Norway including Svalbard and Jan Mayen; Poland; Portugal; Romania; San Marino;
     * Serbia; Slovakia; Slovenia; Spain; Sweden; Switzerland; United Kingdom (UK) including Channel Islands and Isle
     * of Man; Vatican City State.
     * Scope: Geodesy.
     * Replaces ETRF92 (code 7921). Replaced by ETRF94 (code 7925).
     */
    public const EPSG_ETRF93 = 7923;

    /**
     * ETRF94
     * Extent: Europe - onshore and offshore: Albania; Andorra; Austria; Belgium; Bosnia and Herzegovina; Bulgaria;
     * Croatia; Cyprus; Czechia; Denmark; Estonia; Faroe Islands; Finland; France; Germany; Gibraltar; Greece; Hungary;
     * Ireland; Italy; Kosovo; Latvia; Liechtenstein; Lithuania; Luxembourg; Malta; Moldova; Monaco; Montenegro;
     * Netherlands; North Macedonia; Norway including Svalbard and Jan Mayen; Poland; Portugal; Romania; San Marino;
     * Serbia; Slovakia; Slovenia; Spain; Sweden; Switzerland; United Kingdom (UK) including Channel Islands and Isle
     * of Man; Vatican City State.
     * Scope: Geodesy.
     * Replaces ETRF93 (code 7923). Replaced by ETRF96 (code 7927).
     */
    public const EPSG_ETRF94 = 7925;

    /**
     * ETRF96
     * Extent: Europe - onshore and offshore: Albania; Andorra; Austria; Belgium; Bosnia and Herzegovina; Bulgaria;
     * Croatia; Cyprus; Czechia; Denmark; Estonia; Faroe Islands; Finland; France; Germany; Gibraltar; Greece; Hungary;
     * Ireland; Italy; Kosovo; Latvia; Liechtenstein; Lithuania; Luxembourg; Malta; Moldova; Monaco; Montenegro;
     * Netherlands; North Macedonia; Norway including Svalbard and Jan Mayen; Poland; Portugal; Romania; San Marino;
     * Serbia; Slovakia; Slovenia; Spain; Sweden; Switzerland; United Kingdom (UK) including Channel Islands and Isle
     * of Man; Vatican City State.
     * Scope: Geodesy.
     * Replaces ETRF94 (code 7925). Replaced by ETRF97 (code 7929).
     */
    public const EPSG_ETRF96 = 7927;

    /**
     * ETRF97
     * Extent: Europe - onshore and offshore: Albania; Andorra; Austria; Belgium; Bosnia and Herzegovina; Bulgaria;
     * Croatia; Cyprus; Czechia; Denmark; Estonia; Faroe Islands; Finland; France; Germany; Gibraltar; Greece; Hungary;
     * Ireland; Italy; Kosovo; Latvia; Liechtenstein; Lithuania; Luxembourg; Malta; Moldova; Monaco; Montenegro;
     * Netherlands; North Macedonia; Norway including Svalbard and Jan Mayen; Poland; Portugal; Romania; San Marino;
     * Serbia; Slovakia; Slovenia; Spain; Sweden; Switzerland; United Kingdom (UK) including Channel Islands and Isle
     * of Man; Vatican City State.
     * Scope: Geodesy.
     * Replaces ETRF96 (code 7927). Replaced by ETRF2000 (code 7931).
     */
    public const EPSG_ETRF97 = 7929;

    /**
     * ETRS89
     * Extent: Europe - onshore and offshore: Albania; Andorra; Austria; Belgium; Bosnia and Herzegovina; Bulgaria;
     * Croatia; Cyprus; Czechia; Denmark; Estonia; Faroe Islands; Finland; France; Germany; Gibraltar; Greece; Hungary;
     * Ireland; Italy; Kosovo; Latvia; Liechtenstein; Lithuania; Luxembourg; Malta; Moldova; Monaco; Montenegro;
     * Netherlands; North Macedonia; Norway including Svalbard and Jan Mayen; Poland; Portugal; Romania; San Marino;
     * Serbia; Slovakia; Slovenia; Spain; Sweden; Switzerland; United Kingdom (UK) including Channel Islands and Isle
     * of Man; Vatican City State.
     * Scope: Spatial referencing.
     * Has been realized through ETRF89, ETRF90, ETRF91, ETRF92, ETRF93, ETRF94, ETRF96, ETRF97, ETRF2000, ETRF2005 and
     * ETRF2014. This 'ensemble' covers any or all of these realizations without distinction.
     */
    public const EPSG_ETRS89 = 4937;

    /**
     * FEH2010
     * Extent: Fehmarnbelt area of Denmark and Germany.
     * Scope: Engineering survey and construction for Fehmarnbelt tunnel.
     */
    public const EPSG_FEH2010 = 5592;

    /**
     * GDA2020
     * Extent: Australia including Lord Howe Island, Macquarie Islands, Ashmore and Cartier Islands, Christmas Island,
     * Cocos (Keeling) Islands, Norfolk Island. All onshore and offshore.
     * Scope: Geodesy, cadastre, engineering survey, topographic mapping.
     */
    public const EPSG_GDA2020 = 7843;

    /**
     * GDA94
     * Extent: Australia including Lord Howe Island, Macquarie Islands, Ashmore and Cartier Islands, Christmas Island,
     * Cocos (Keeling) Islands, Norfolk Island. All onshore and offshore.
     * Scope: Geodesy.
     */
    public const EPSG_GDA94 = 4939;

    /**
     * GDBD2009
     * Extent: Brunei Darussalam - onshore and offshore.
     * Scope: Geodesy.
     */
    public const EPSG_GDBD2009 = 5245;

    /**
     * GDM2000
     * Extent: Malaysia - onshore and offshore. Includes peninsular Malayasia, Sabah and Sarawak.
     * Scope: Geodesy.
     */
    public const EPSG_GDM2000 = 4921;

    /**
     * GR96
     * Extent: Greenland - onshore and offshore.
     * Scope: Geodesy.
     */
    public const EPSG_GR96 = 4909;

    /**
     * GSK-2011
     * Extent: Russian Federation - onshore and offshore.
     * Scope: Geodesy.
     */
    public const EPSG_GSK_2011 = 7682;

    /**
     * HTRS96
     * Extent: Croatia - onshore and offshore.
     * Scope: Geodesy.
     */
    public const EPSG_HTRS96 = 4889;

    /**
     * Hartebeesthoek94
     * Extent: Eswatini (Swaziland); Lesotho; South Africa - onshore and offshore.
     * Scope: Geodesy.
     */
    public const EPSG_HARTEBEESTHOEK94 = 4941;

    /**
     * Hong Kong Geodetic CS
     * Extent: China - Hong Kong - onshore and offshore.
     * Scope: Geodesy.
     * Locally sometimes referred to as ITRF96 or WGS 84, these are not strictly correct.
     */
    public const EPSG_HONG_KONG_GEODETIC_CS = 8426;

    /**
     * IG05 Intermediate CRS
     * Extent: Israel - onshore; Palestine Territory - onshore.
     * Scope: Intermediate stage in transformations - not used otherwise.
     * Intermediate system not used for spatial referencing - use IGD05 (CRS code 6979).
     */
    public const EPSG_IG05_INTERMEDIATE_CRS = 6982;

    /**
     * IG05/12 Intermediate CRS
     * Extent: Israel - onshore; Palestine Territory - onshore.
     * Scope: Intermediate stage in transformations - not used otherwise.
     * Intermediate system not used for spatial referencing - use IGD05/12 (CRS code 6986).
     */
    public const EPSG_IG05_12_INTERMEDIATE_CRS = 6989;

    /**
     * IGD05
     * Extent: Israel - onshore and offshore.
     * Scope: Geodesy.
     * Replaced by IGD05/12 (CRS code 7138).
     */
    public const EPSG_IGD05 = 7135;

    /**
     * IGD05/12
     * Extent: Israel - onshore and offshore.
     * Scope: Geodesy.
     * Replaces IGD05 (CRS code 7135).
     */
    public const EPSG_IGD05_12 = 7138;

    /**
     * IGM95
     * Extent: Italy - onshore and offshore; San Marino, Vatican City State.
     * Scope: Geodesy.
     * Replaced by RDN2008 (CRS code 6705) from 2011-11-10.
     */
    public const EPSG_IGM95 = 4983;

    /**
     * IGRS
     * Extent: Iraq - onshore and offshore.
     * Scope: Geodesy.
     */
    public const EPSG_IGRS = 3888;

    /**
     * IGS00
     * Extent: World.
     * Scope: Geodesy.
     * Adopted by the International GNSS Service (IGS) from 2001-12-02 through 2004-01-10. Replaces IGS97, replaced by
     * IGb00 (CRS codes 9002 and 9008). For all practical purposes IGS00 is equivalent to ITRF2000.
     */
    public const EPSG_IGS00 = 9005;

    /**
     * IGS05
     * Extent: World.
     * Scope: Geodesy.
     * Adopted by the International GNSS Service (IGS) from 2006-11-05 through 2011-04-16. Replaces IGb00, replaced by
     * IGS08 (CRS codes 9008 and 9013). For all practical purposes IGS05 is equivalent to ITRF2005.
     */
    public const EPSG_IGS05 = 9011;

    /**
     * IGS08
     * Extent: World.
     * Scope: Geodesy.
     * Used for products from International GNSS Service (IGS) analysis centres from 2011-04-17 through 2012-10-06.
     * Replaces IGS05 (code 9011). Replaced by IGb08 (code 9016). For most practical purposes IGS08 is equivalent to
     * ITRF2008.
     */
    public const EPSG_IGS08 = 9013;

    /**
     * IGS14
     * Extent: World.
     * Scope: Geodesy.
     * Used for products from the International GNSS Service (IGS) from 2017-01-29 to 2020-05-16. Replaces IGb08 (code
     * 9016), replaced by IGb14 (code 9379). For most practical purposes IGS14 is equivalent to ITRF2014.
     */
    public const EPSG_IGS14 = 9018;

    /**
     * IGS97
     * Extent: World.
     * Scope: Geodesy.
     * Adopted by the International GNSS Service (IGS) from 2000-06-04 through 2001-12-01. Replaced by IGS00 (CRS code
     * 9005). For all practical purposes IGS97 is equivalent to ITRF97.
     */
    public const EPSG_IGS97 = 9002;

    /**
     * IGb00
     * Extent: World.
     * Scope: Geodesy.
     * Adopted by the International GNSS Service (IGS) from 2004-01-11 through 2006-11-04. Replaces IGS00, replaced by
     * IGS05 (CRS codes 9005 and 9011). For all practical purposes IGb00 is equivalent to ITRF2000.
     */
    public const EPSG_IGB00 = 9008;

    /**
     * IGb08
     * Extent: World.
     * Scope: Geodesy.
     * Adopted by the International GNSS Service (IGS) from 2012-10-07 through 2017-01-28. Replaces IGS08, replaced by
     * IGS14 (CRS codes 9013 and 9018). For all practical purposes IGb08 is equivalent to ITRF2008.
     */
    public const EPSG_IGB08 = 9016;

    /**
     * IGb14
     * Extent: World.
     * Scope: Geodesy.
     * Used for products from the International GNSS Service (IGS) from 2020-05-17. Replaces IGS14 (code 9018). For
     * most practical purposes IGb14 is equivalent to ITRF2014.
     */
    public const EPSG_IGB14 = 9379;

    /**
     * IRENET95
     * Extent: Ireland - onshore. United Kingdom (UK) - Northern Ireland (Ulster) - onshore.
     * Scope: Geodesy.
     */
    public const EPSG_IRENET95 = 4943;

    /**
     * ISN2004
     * Extent: Iceland - onshore and offshore.
     * Scope: Geodesy.
     * Replaces ISN93 (CRS code 4945).
     */
    public const EPSG_ISN2004 = 5323;

    /**
     * ISN2016
     * Extent: Iceland - onshore and offshore.
     * Scope: Geodesy.
     * Replaces ISN2004 (CRS code 5323) from September 2017.
     */
    public const EPSG_ISN2016 = 8085;

    /**
     * ISN93
     * Extent: Iceland - onshore and offshore.
     * Scope: Geodesy.
     * Replaced by ISN2004 (CRS code 5323).
     */
    public const EPSG_ISN93 = 4945;

    /**
     * ITRF2000
     * Extent: World.
     * Scope: Geodesy.
     * Replaces ITRF97 (code 7908). Replaced by ITRF2005 (code 7910).
     */
    public const EPSG_ITRF2000 = 7909;

    /**
     * ITRF2005
     * Extent: World.
     * Scope: Geodesy.
     * Replaces ITRF2000 (code 7909). Replaced by ITRF2008 (code 7911).
     */
    public const EPSG_ITRF2005 = 7910;

    /**
     * ITRF2008
     * Extent: World.
     * Scope: Geodesy.
     * Replaces ITRF2005 (code 7910). Replaced by ITRF2014 (code 7912).
     */
    public const EPSG_ITRF2008 = 7911;

    /**
     * ITRF2014
     * Extent: World.
     * Scope: Geodesy.
     * Replaces ITRF2008 (code 7911).
     */
    public const EPSG_ITRF2014 = 7912;

    /**
     * ITRF88
     * Extent: World.
     * Scope: Geodesy.
     * Replaced by ITRF89 (code 7901).
     */
    public const EPSG_ITRF88 = 7900;

    /**
     * ITRF89
     * Extent: World.
     * Scope: Geodesy.
     * Replaces ITRF88 (code 7900). Replaced by ITRF90 (code 7902).
     */
    public const EPSG_ITRF89 = 7901;

    /**
     * ITRF90
     * Extent: World.
     * Scope: Geodesy.
     * Replaces ITRF89 (code 7901). Replaced by ITRF91 (code 7903).
     */
    public const EPSG_ITRF90 = 7902;

    /**
     * ITRF91
     * Extent: World.
     * Scope: Geodesy.
     * Replaces ITRF90 (code 7902). Replaced by ITRF92 (code 7904).
     */
    public const EPSG_ITRF91 = 7903;

    /**
     * ITRF92
     * Extent: World.
     * Scope: Geodesy.
     * Replaces ITRF91 (code 7903). Replaced by ITRF93 (code 7905).
     */
    public const EPSG_ITRF92 = 7904;

    /**
     * ITRF93
     * Extent: World.
     * Scope: Geodesy.
     * Replaces ITRF92 (code 7904). Replaced by ITRF94 (code 7906).
     */
    public const EPSG_ITRF93 = 7905;

    /**
     * ITRF94
     * Extent: World.
     * Scope: Geodesy.
     * Replaces ITRF93 (code 7905). Replaced by ITRF96 (code 7907).
     */
    public const EPSG_ITRF94 = 7906;

    /**
     * ITRF96
     * Extent: World.
     * Scope: Geodesy.
     * Replaces ITRF94 (code 7906). Replaced by ITRF97 (code 7908).
     */
    public const EPSG_ITRF96 = 7907;

    /**
     * ITRF97
     * Extent: World.
     * Scope: Geodesy.
     * Replaces ITRF96 (code 7907). Replaced by ITRF2000 (code 7909).
     */
    public const EPSG_ITRF97 = 7908;

    /**
     * JAD2001
     * Extent: Jamaica - onshore and offshore. Includes Morant Cays and Pedro Cays.
     * Scope: Geodesy.
     */
    public const EPSG_JAD2001 = 4895;

    /**
     * JGD2000
     * Extent: Japan - onshore and offshore.
     * Scope: Geodesy.
     * From 21st October 2011 replaced by JGD2011 (CRS code 6667).
     */
    public const EPSG_JGD2000 = 4947;

    /**
     * JGD2011
     * Extent: Japan - onshore and offshore.
     * Scope: Geodesy.
     * Replaces JGD2000 (CRS code 4947) with effect from 21st October 2011.
     */
    public const EPSG_JGD2011 = 6667;

    /**
     * KOSOVAREF01
     * Extent: Kosovo.
     * Scope: Geodesy.
     */
    public const EPSG_KOSOVAREF01 = 9139;

    /**
     * KSA-GRF17
     * Extent: Saudi Arabia - onshore and offshore.
     * Scope: Geodesy, cadastre, engineering survey, topographic mapping.
     */
    public const EPSG_KSA_GRF17 = 9332;

    /**
     * Korea 2000
     * Extent: Republic of Korea (South Korea) - onshore and offshore.
     * Scope: Geodesy.
     */
    public const EPSG_KOREA_2000 = 4927;

    /**
     * Kyrg-06
     * Extent: Kyrgyzstan.
     * Scope: Geodesy.
     */
    public const EPSG_KYRG_06 = 7685;

    /**
     * LGD2006
     * Extent: Libya - onshore and offshore.
     * Scope: Geodesy.
     */
    public const EPSG_LGD2006 = 4900;

    /**
     * LKS92
     * Extent: Latvia - onshore and offshore.
     * Scope: Geodesy.
     */
    public const EPSG_LKS92 = 4949;

    /**
     * LKS94
     * Extent: Lithuania - onshore and offshore.
     * Scope: Geodesy.
     */
    public const EPSG_LKS94 = 4951;

    /**
     * Lao 1993
     * Extent: Laos.
     * Scope: Geodesy.
     * Replaced by Lao 1997. Lao 1993 coordinate values are within 1m of Lao 1997 values.
     */
    public const EPSG_LAO_1993 = 4991;

    /**
     * Lao 1997
     * Extent: Laos.
     * Scope: Geodesy.
     * Replaces Lao 1993. Lao 1993 coordinate values are within 1m of Lao 1997 values.
     */
    public const EPSG_LAO_1997 = 4993;

    /**
     * MACARIO SOLIS
     * Extent: Panama - onshore and offshore.
     * Scope: Geodesy.
     * Densification of SIRGAS 2000 within Panama.
     */
    public const EPSG_MACARIO_SOLIS = 5370;

    /**
     * MAGNA-SIRGAS
     * Extent: Colombia - onshore and offshore. Includes San Andres y Providencia, Malpelo Islands, Roncador Bank,
     * Serrana Bank and Serranilla Bank.
     * Scope: Geodesy.
     */
    public const EPSG_MAGNA_SIRGAS = 4997;

    /**
     * MARGEN
     * Extent: Bolivia.
     * Scope: Geodesy.
     */
    public const EPSG_MARGEN = 5353;

    /**
     * MGI
     * Extent: Austria.
     * Scope: Geodesy.
     * Created retrospectively to support geoid model based on Bessel ellipsoid.
     */
    public const EPSG_MGI = 9267;

    /**
     * MOLDREF99
     * Extent: Moldova.
     * Scope: Geodesy.
     */
    public const EPSG_MOLDREF99 = 4017;

    /**
     * MTRF-2000
     * Extent: Saudi Arabia - onshore and offshore.
     * Scope: Geodesy.
     */
    public const EPSG_MTRF_2000 = 8817;

    /**
     * Macao 2008
     * Extent: China - Macao - onshore and offshore.
     * Scope: Geodesy.
     * Locally sometimes referred to as ITRF2005, this is not strictly correct.
     */
    public const EPSG_MACAO_2008 = 8430;

    /**
     * Mauritania 1999
     * Extent: Mauritania - onshore and offshore.
     * Scope: Geodesy.
     */
    public const EPSG_MAURITANIA_1999 = 4925;

    /**
     * Mexico ITRF2008
     * Extent: Mexico - onshore and offshore.
     * Scope: Geodesy.
     * Replaces Mexico ITRF92 (CRS code 4482) from December 2010.
     */
    public const EPSG_MEXICO_ITRF2008 = 6364;

    /**
     * Mexico ITRF92
     * Extent: Mexico - onshore and offshore.
     * Scope: Geodesy.
     * Replaced by Mexico ITRF2008 (CRS code 6364) from December 2010.
     */
    public const EPSG_MEXICO_ITRF92 = 4482;

    /**
     * Moznet
     * Extent: Mozambique - onshore and offshore.
     * Scope: Geodesy.
     */
    public const EPSG_MOZNET = 4953;

    /**
     * NAD83(2011)
     * Extent: Puerto Rico - onshore and offshore. United States (USA) onshore and offshore - Alabama; Alaska; Arizona;
     * Arkansas; California; Colorado; Connecticut; Delaware; Florida; Georgia; Idaho; Illinois; Indiana; Iowa; Kansas;
     * Kentucky; Louisiana; Maine; Maryland; Massachusetts; Michigan; Minnesota; Mississippi; Missouri; Montana;
     * Nebraska; Nevada; New Hampshire; New Jersey; New Mexico; New York; North Carolina; North Dakota; Ohio; Oklahoma;
     * Oregon; Pennsylvania; Rhode Island; South Carolina; South Dakota; Tennessee; Texas; Utah; Vermont; Virginia;
     * Washington; West Virginia; Wisconsin; Wyoming. US Virgin Islands - onshore and offshore.
     * Scope: Geodesy.
     * Note: this CRS includes longitudes which are POSITIVE EAST. Replaces NAD83(CORS96) and NAD83(NSRS2007) (CRS
     * codes 6782 and 4893).
     */
    public const EPSG_NAD83_2011 = 6319;

    /**
     * NAD83(CORS96)
     * Extent: Puerto Rico - onshore and offshore. United States (USA) onshore and offshore - Alabama; Alaska; Arizona;
     * Arkansas; California; Colorado; Connecticut; Delaware; Florida; Georgia; Idaho; Illinois; Indiana; Iowa; Kansas;
     * Kentucky; Louisiana; Maine; Maryland; Massachusetts; Michigan; Minnesota; Mississippi; Missouri; Montana;
     * Nebraska; Nevada; New Hampshire; New Jersey; New Mexico; New York; North Carolina; North Dakota; Ohio; Oklahoma;
     * Oregon; Pennsylvania; Rhode Island; South Carolina; South Dakota; Tennessee; Texas; Utah; Vermont; Virginia;
     * Washington; West Virginia; Wisconsin; Wyoming. US Virgin Islands - onshore and offshore.
     * Scope: Geodesy.
     * Note: this CRS includes POSITIVE EAST longitudes. Replaced by NAD83(2011) (CRS code 6319) from 2011-09-06.
     */
    public const EPSG_NAD83_CORS96 = 6782;

    /**
     * NAD83(CSRS)
     * Extent: Canada - onshore and offshore - Alberta; British Columbia; Manitoba; New Brunswick; Newfoundland and
     * Labrador; Northwest Territories; Nova Scotia; Nunavut; Ontario; Prince Edward Island; Quebec; Saskatchewan;
     * Yukon.
     * Scope: Geodesy.
     * Includes all versions of NAD83(CSRS) from v2 [CSRS98] onwards without specific identification. As such it has an
     * accuracy of approximately 1m. Note: this CRS includes longitudes which are POSITIVE EAST.
     */
    public const EPSG_NAD83_CSRS = 4955;

    /**
     * NAD83(CSRS)v2
     * Extent: Canada - onshore and offshore - Alberta; British Columbia; Manitoba; New Brunswick; Newfoundland and
     * Labrador; Northwest Territories; Nova Scotia; Nunavut; Ontario; Prince Edward Island; Quebec; Saskatchewan;
     * Yukon.
     * Scope: Geodesy.
     * Adopted by the Canadian federal government from 1998-01-01 and by the provincial governments of British
     * Columbia, New Brunswick, Prince Edward Island and Quebec. Replaces NAD83(CSRS96). Replaced by NAD83(CSRS)v3
     * (code 8239). Longitudes are POSITIVE EAST.
     */
    public const EPSG_NAD83_CSRS_V2 = 8235;

    /**
     * NAD83(CSRS)v3
     * Extent: Canada - onshore and offshore - Alberta; British Columbia; Manitoba; New Brunswick; Newfoundland and
     * Labrador; Northwest Territories; Nova Scotia; Nunavut; Ontario; Prince Edward Island; Quebec; Saskatchewan;
     * Yukon.
     * Scope: Geodesy.
     * Adopted by the Canadian federal government from 1999-01-01 and by the provincial governments of Alberta, British
     * Columbia, Manitoba, Newfoundland and Labrador, Nova Scotia, Ontario and Saskatchewan. Replaces NAD83(CSRS)v2.
     * Replaced by NAD83(CSRS)v4.
     */
    public const EPSG_NAD83_CSRS_V3 = 8239;

    /**
     * NAD83(CSRS)v4
     * Extent: Canada - onshore and offshore - Alberta; British Columbia; Manitoba; New Brunswick; Newfoundland and
     * Labrador; Northwest Territories; Nova Scotia; Nunavut; Ontario; Prince Edward Island; Quebec; Saskatchewan;
     * Yukon.
     * Scope: Geodesy.
     * Adopted by the Canadian federal government from 2002-01-01 and by the provincial governments of Alberta and
     * British Columbia. Replaces NAD83(CSRS)v3. Replaced by NAD83(CSRS)v5 (CRS code 8248). Longitudes are POSITIVE
     * EAST.
     */
    public const EPSG_NAD83_CSRS_V4 = 8244;

    /**
     * NAD83(CSRS)v5
     * Extent: Canada - onshore and offshore - Alberta; British Columbia; Manitoba; New Brunswick; Newfoundland and
     * Labrador; Northwest Territories; Nova Scotia; Nunavut; Ontario; Prince Edward Island; Quebec; Saskatchewan;
     * Yukon.
     * Scope: Geodesy.
     * Adopted by the Canadian federal government from 2006-01-01. Replaces NAD83(CSRS)v4. Replaced by NAD83(CSRS)v6.
     * Longitudes are POSITIVE EAST.
     */
    public const EPSG_NAD83_CSRS_V5 = 8248;

    /**
     * NAD83(CSRS)v6
     * Extent: Canada - onshore and offshore - Alberta; British Columbia; Manitoba; New Brunswick; Newfoundland and
     * Labrador; Northwest Territories; Nova Scotia; Nunavut; Ontario; Prince Edward Island; Quebec; Saskatchewan;
     * Yukon.
     * Scope: Geodesy.
     * Adopted by the Canadian federal government from 2010-01-01 and the provincial governments of Alberta, British
     * Columbia, Manitoba, Newfoundland and Labrador, Nova Scotia, Ontario and Prince Edward Island. Replaces
     * NAD83(CSRS)v5. Replaced by NAD83(CSRS)v7.
     */
    public const EPSG_NAD83_CSRS_V6 = 8251;

    /**
     * NAD83(CSRS)v7
     * Extent: Canada - onshore and offshore - Alberta; British Columbia; Manitoba; New Brunswick; Newfoundland and
     * Labrador; Northwest Territories; Nova Scotia; Nunavut; Ontario; Prince Edward Island; Quebec; Saskatchewan;
     * Yukon.
     * Scope: Geodesy.
     * Adopted by the Canadian federal government from 2017-05-01. Replaces NAD83(CSRS)v6. Longitudes are POSITIVE
     * EAST.
     */
    public const EPSG_NAD83_CSRS_V7 = 8254;

    /**
     * NAD83(CSRS96)
     * Extent: Canada - onshore and offshore - Alberta; British Columbia; Manitoba; New Brunswick; Newfoundland and
     * Labrador; Northwest Territories; Nova Scotia; Nunavut; Ontario; Prince Edward Island; Quebec; Saskatchewan;
     * Yukon.
     * Scope: Geodesy.
     * Adopted by the Canadian federal government from 1996-01-01. Replaced by NAD83(CSRS)v2 (CRS code 8235). Note:
     * this CRS includes longitudes which are POSITIVE EAST.
     */
    public const EPSG_NAD83_CSRS96 = 8231;

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
     * Scope: Geodesy.
     * Continental US, American Samoa, Guam/NMI and PRVI, replaces NAD83(HARN). In Continental US, Puerto Rico and US
     * Virgin Islands replaced by NAD83(NSRS2007). In American Samoa and Hawaii replaced by NAD83(PA11). In Guam/NMI
     * replaced by NAD83(MA11).
     */
    public const EPSG_NAD83_FBN = 8542;

    /**
     * NAD83(HARN Corrected)
     * Extent: Puerto Rico and US Virgin Islands - onshore.
     * Scope: Geodesy.
     * Note: this CRS includes POSITIVE EAST longitudes. In PRVI replaces NAD83(HARN) = NAD83(1993 PRVI) to correct
     * errors. Replaced by NAD83(FBN) = NAD83(2002 PRVI).
     */
    public const EPSG_NAD83_HARN_CORRECTED = 8544;

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
     * Scope: Geodesy.
     * In CONUS and Hawaii replaces NAD83 for applications with an accuracy of better than 1m. Replaced by NAD83(FBN)
     * in CONUS, American Samoa and Guam / NMI, by NAD83(NSRS2007) in Alaska, by NAD83(PA11) in Hawaii and by
     * NAD83(HARN Corrected) in PRVI.
     */
    public const EPSG_NAD83_HARN = 4957;

    /**
     * NAD83(MA11)
     * Extent: Guam, Northern Mariana Islands and Palau; onshore and offshore.
     * Scope: Geodesy.
     * Note: this CRS includes longitudes which are POSITIVE EAST. Replaces NAD83(HARN) (GGN93) and NAD83(FBN) in Guam.
     */
    public const EPSG_NAD83_MA11 = 6324;

    /**
     * NAD83(MARP00)
     * Extent: Guam, Northern Mariana Islands and Palau; onshore and offshore.
     * Scope: Geodesy.
     * Replaces NAD83(HARN) (GGN93) and NAD83(FBN) in Guam. Replaced by NAD83(MA11).
     */
    public const EPSG_NAD83_MARP00 = 9071;

    /**
     * NAD83(NSRS2007)
     * Extent: Puerto Rico - onshore and offshore. United States (USA) onshore and offshore - Alabama; Alaska; Arizona;
     * Arkansas; California; Colorado; Connecticut; Delaware; Florida; Georgia; Idaho; Illinois; Indiana; Iowa; Kansas;
     * Kentucky; Louisiana; Maine; Maryland; Massachusetts; Michigan; Minnesota; Mississippi; Missouri; Montana;
     * Nebraska; Nevada; New Hampshire; New Jersey; New Mexico; New York; North Carolina; North Dakota; Ohio; Oklahoma;
     * Oregon; Pennsylvania; Rhode Island; South Carolina; South Dakota; Tennessee; Texas; Utah; Vermont; Virginia;
     * Washington; West Virginia; Wisconsin; Wyoming. US Virgin Islands - onshore and offshore.
     * Scope: Geodesy.
     * Note: this CRS includes longitudes which are POSITIVE EAST. Replaces NAD83(HARN) and NAD83(FBN). Replaced by
     * NAD83(2011).
     */
    public const EPSG_NAD83_NSRS2007 = 4893;

    /**
     * NAD83(PA11)
     * Extent: American Samoa, Marshall Islands, United States (USA) - Hawaii, United States minor outlying islands;
     * onshore and offshore.
     * Scope: Geodesy.
     * Note: this CRS includes longitudes which are POSITIVE EAST. Replaces NAD83(HARN) and NAD83(FBN) in Hawaii and
     * American Samoa.
     */
    public const EPSG_NAD83_PA11 = 6321;

    /**
     * NAD83(PACP00)
     * Extent: American Samoa, Marshall Islands, United States (USA) - Hawaii, United States minor outlying islands;
     * onshore and offshore.
     * Scope: Geodesy.
     * Replaces NAD83(HARN) and NAD83(FBN) in Hawaii and American Samoa. Replaced by NAD83(PA11).
     */
    public const EPSG_NAD83_PACP00 = 9074;

    /**
     * NZGD2000
     * Extent: New Zealand - onshore and offshore. Includes Antipodes Islands, Auckland Islands, Bounty Islands,
     * Chatham Islands, Cambell Island, Kermadec Islands, Raoul Island and Snares Islands.
     * Scope: Geodesy.
     */
    public const EPSG_NZGD2000 = 4959;

    /**
     * ONGD14
     * Extent: Oman - onshore and offshore.
     * Scope: Geodesy.
     * In Oman replaces usage of WGS 84 (G873) from 2014. Replaced by ONGD17 (CRS code 9293) from March 2019.
     */
    public const EPSG_ONGD14 = 7372;

    /**
     * ONGD17
     * Extent: Oman - onshore and offshore.
     * Scope: Geodesy.
     * Replaces ONGD14 (CRS code 7372) from March 2019.
     */
    public const EPSG_ONGD17 = 9293;

    /**
     * PNG94
     * Extent: Papua New Guinea - onshore and offshore. Includes Bismark archipelago, Louisade archipelago, Admiralty
     * Islands, d'Entrecasteaux Islands, northern Solomon Islands, Trobriand Islands, New Britain, New Ireland,
     * Woodlark, and associated islands.
     * Scope: Geodesy.
     */
    public const EPSG_PNG94 = 5545;

    /**
     * POSGAR 2007
     * Extent: Argentina - onshore and offshore.
     * Scope: Geodesy.
     * Adopted as official replacement of POSGAR 94 in May 2009.   Also replaces de facto use of POSGAR 98 as of same
     * date.
     */
    public const EPSG_POSGAR_2007 = 5342;

    /**
     * POSGAR 94
     * Extent: Argentina - onshore and offshore.
     * Scope: Geodesy.
     * Legally adopted in May 1997. Replaced by POSGAR 98 for scientific and many practical purposes until May 2009.
     * Officially replaced by POSGAR 2007 in May 2009.
     */
    public const EPSG_POSGAR_94 = 4929;

    /**
     * POSGAR 98
     * Extent: Argentina - onshore and offshore.
     * Scope: Geodesy.
     * Densification in Argentina of SIRGAS 1995. Until May 2009 replaced POSGAR 94 for many practical purposes (but
     * not as the legal system).  POSGAR 94 was officially replaced by POSGAR 2007 in May 2009.
     */
    public const EPSG_POSGAR_98 = 4961;

    /**
     * PRS92
     * Extent: Philippines - onshore and offshore.
     * Scope: Geodesy.
     */
    public const EPSG_PRS92 = 4995;

    /**
     * PTRA08
     * Extent: Portugal - Azores and Madeira island groups and surrounding EEZ - Flores, Corvo; Graciosa, Terceira, Sao
     * Jorge, Pico, Faial; Sao Miguel, Santa Maria; Madeira, Porto Santo, Desertas; Selvagens.
     * Scope: Geodesy.
     */
    public const EPSG_PTRA08 = 5012;

    /**
     * PZ-90
     * Extent: World.
     * Scope: Geodesy. Navigation and positioning using Glonass satellite system.
     * Replaced by PZ-90.02 from 2007-09-20.
     */
    public const EPSG_PZ_90 = 4923;

    /**
     * PZ-90.02
     * Extent: World.
     * Scope: Geodesy. Navigation and positioning using Glonass satellite system.
     * Replaces PZ-90 (CRS code 4923) from 2007-09-20. Replaced by PZ-90.11 (CRS code 7680) from 2014-01-15.
     */
    public const EPSG_PZ_90_02 = 7678;

    /**
     * PZ-90.11
     * Extent: World.
     * Scope: Geodesy. Navigation and positioning using Glonass satellite system.
     * Replaces PZ-90.02 (CRS code 7678) from 2014-01-15.
     */
    public const EPSG_PZ_90_11 = 7680;

    /**
     * Peru96
     * Extent: Peru - onshore and offshore.
     * Scope: Geodesy.
     */
    public const EPSG_PERU96 = 5372;

    /**
     * RDN2008
     * Extent: Italy - onshore and offshore; San Marino, Vatican City State.
     * Scope: Geodesy.
     * Replaces IGM95 (CRS code 4983) from 2011-11-10.
     */
    public const EPSG_RDN2008 = 6705;

    /**
     * REGCAN95
     * Extent: Spain - Canary Islands onshore and offshore.
     * Scope: Geodesy.
     */
    public const EPSG_REGCAN95 = 4080;

    /**
     * REGVEN
     * Extent: Venezuela - onshore and offshore.
     * Scope: Geodesy.
     * Densification in Venezuela of SIRGAS.
     */
    public const EPSG_REGVEN = 4963;

    /**
     * RGAF09
     * Extent: French Antilles onshore and offshore - Guadeloupe (including Grande Terre, Basse Terre, Marie Galante,
     * Les Saintes, Iles de la Petite Terre, La Desirade, St Barthélemy, and northern St Martin) and Martinique.
     * Scope: Geodesy; air, land and sea navigation and safety of life purposes.
     * Replaces RRAF 1991 (CRS code 4557). See CRS code 7085 for alternate system with horizontal axes reversed used by
     * IGN for GIS purposes.
     */
    public const EPSG_RGAF09 = 5488;

    /**
     * RGAF09 (lon-lat)
     * Extent: French Antilles onshore and offshore - Guadeloupe (including Grande Terre, Basse Terre, Marie Galante,
     * Les Saintes, Iles de la Petite Terre, La Desirade, St Barthélemy, and northern St Martin) and Martinique.
     * Scope: GIS.
     * Replaces RRAF 1991 (CRS code 4557). See CRS code 5488 for system with horizontal axes in sequence lat-lon to be
     * used for air, land and sea navigation and safety of life purposes.
     */
    public const EPSG_RGAF09_LON_LAT = 7085;

    /**
     * RGF93
     * Extent: France - onshore and offshore, mainland and Corsica.
     * Scope: Geodesy; air, land and sea navigation and safety of life purposes.
     * See CRS code 7042 for alternate system with horizontal axes reversed used by IGN for GIS purposes.
     */
    public const EPSG_RGF93 = 4965;

    /**
     * RGF93 (lon-lat)
     * Extent: France - onshore and offshore, mainland and Corsica.
     * Scope: GIS.
     * See CRS code 4965 for system with horizontal axes in sequence lat-lon to be used for air, land and sea
     * navigation and safety of life purposes.
     */
    public const EPSG_RGF93_LON_LAT = 7042;

    /**
     * RGFG95
     * Extent: French Guiana - onshore and offshore.
     * Scope: Geodesy; air, land and sea navigation and safety of life purposes.
     * See CRS code 7040 for alternate system with horizontal axes reversed used by IGN for GIS purposes.
     */
    public const EPSG_RGFG95 = 4967;

    /**
     * RGFG95 (lon-lat)
     * Extent: French Guiana - onshore and offshore.
     * Scope: GIS.
     * See CRS code 4967 for system with horizontal axes in sequence lat-lon to be used for air, land and sea
     * navigation and safety of life purposes.
     */
    public const EPSG_RGFG95_LON_LAT = 7040;

    /**
     * RGM04
     * Extent: Mayotte - onshore and offshore.
     * Scope: Geodesy; air, land and sea navigation and safety of life purposes.
     * See CRS code 7038 for alternate system with horizontal axes reversed used by IGN for GIS purposes.
     */
    public const EPSG_RGM04 = 4469;

    /**
     * RGM04 (lon-lat)
     * Extent: Mayotte - onshore and offshore.
     * Scope: GIS.
     * See CRS code 4469 for system with horizontal axes in sequence lat-lon to be used for air, land and sea
     * navigation and safety of life purposes.
     */
    public const EPSG_RGM04_LON_LAT = 7038;

    /**
     * RGNC91-93
     * Extent: New Caledonia - onshore and offshore. Isle de Pins, Loyalty Islands, Huon Islands, Belep archipelago,
     * Chesterfield Islands, and Walpole.
     * Scope: Geodesy.
     * Replaces older local 2D systems IGN56 Lifou, IGN72 Grande Terre, ST87 Ouvea, IGN53 Mare, ST84 Ile des Pins, ST71
     * Belep and NEA74 Noumea (CRS codes 4633, 4641-44, 4662 and 4750).
     */
    public const EPSG_RGNC91_93 = 4907;

    /**
     * RGPF
     * Extent: French Polynesia - onshore and offshore. Includes Society archipelago, Tuamotu archipelago, Marquesas
     * Islands, Gambier Islands and Austral Islands.
     * Scope: Geodesy.
     */
    public const EPSG_RGPF = 4999;

    /**
     * RGR92
     * Extent: Reunion - onshore and offshore.
     * Scope: Geodesy; air, land and sea navigation and safety of life purposes.
     * See CRS code 7036 for alternate system with horizontal axes reversed used by IGN for GIS purposes.
     */
    public const EPSG_RGR92 = 4971;

    /**
     * RGR92 (lon-lat)
     * Extent: Reunion - onshore and offshore.
     * Scope: GIS.
     * See CRS code 4971 for system with horizontal axes in sequence lat-lon to be used for air, land and sea
     * navigation and safety of life purposes.
     */
    public const EPSG_RGR92_LON_LAT = 7036;

    /**
     * RGRDC 2005
     * Extent: The Democratic Republic of the Congo (Zaire) - south of a line through Bandundu, Seke and Pweto -
     * onshore and offshore.
     * Scope: Geodesy.
     */
    public const EPSG_RGRDC_2005 = 4040;

    /**
     * RGSPM06
     * Extent: St Pierre and Miquelon - onshore and offshore.
     * Scope: Geodesy; air, land and sea navigation and safety of life purposes.
     * See CRS code 7034 for alternate system with horizontal axes reversed used by IGN for GIS purposes.
     */
    public const EPSG_RGSPM06 = 4466;

    /**
     * RGSPM06 (lon-lat)
     * Extent: St Pierre and Miquelon - onshore and offshore.
     * Scope: GIS.
     * See CRS code 4466 for system with horizontal axes in sequence lat-lon to be used for air, land and sea
     * navigation and safety of life purposes.
     */
    public const EPSG_RGSPM06_LON_LAT = 7034;

    /**
     * RGTAAF07
     * Extent: French Southern Territories - onshore and offshore: Amsterdam and St Paul, Crozet, Europa and Kerguelen.
     * Antarctica - Adelie Land coastal area.
     * Scope: Geodesy; air, land and sea navigation and safety of life purposes.
     * See CRS code 7087 for alternate system with horizontal axes reversed used by IGN for GIS purposes.
     */
    public const EPSG_RGTAAF07 = 7072;

    /**
     * RGTAAF07 (lon-lat)
     * Extent: French Southern Territories - onshore and offshore: Amsterdam and St Paul, Crozet, Europa and Kerguelen.
     * Antarctica - Adelie Land coastal area.
     * Scope: GIS.
     * See CRS code 7072 for alternate system with horizontal axes in sequence lat-lon to be used for air, land and sea
     * navigation purposes.
     */
    public const EPSG_RGTAAF07_LON_LAT = 7087;

    /**
     * RGWF96
     * Extent: Wallis and Futuna - onshore and offshore - Uvea, Futuna, and Alofi.
     * Scope: Geodesy; air, land and sea navigation and safety of life purposes.
     * See CRS code 8901 for alternate system with horizontal axes reversed used by IGN for GIS purposes.
     */
    public const EPSG_RGWF96 = 8899;

    /**
     * RGWF96 (lon-lat)
     * Extent: Wallis and Futuna - onshore and offshore - Uvea, Futuna, and Alofi.
     * Scope: GIS.
     * See CRS code 8899 for system with horizontal axes in sequence lat-lon to be used for air, land and sea
     * navigation and safety of life purposes.
     */
    public const EPSG_RGWF96_LON_LAT = 8901;

    /**
     * RRAF 1991
     * Extent: French Antilles onshore and offshore - Guadeloupe (including Grande Terre, Basse Terre, Marie Galante,
     * Les Saintes, Iles de la Petite Terre, La Desirade, St Barthélemy, and northern St Martin) and Martinique.
     * Scope: Geodesy.
     * Replaces older local 2D systems Fort Marigot and Sainte Anne CRS (codes 4621-22) in Guadeloupe and Fort Desaix
     * (CRS code 4625) in Martinique. Replaced by RGAF09 (CRS code 5488).
     */
    public const EPSG_RRAF_1991 = 4557;

    /**
     * RSAO13
     * Extent: Angola - onshore and offshore.
     * Scope: Geodesy.
     */
    public const EPSG_RSAO13 = 8698;

    /**
     * RSRGD2000
     * Extent: Antarctica - Ross Sea Region - nominally between 160°E and 150°W but includes buffer on eastern
     * hemisphere margin to include Transantarctic Mountains
     * Scope: Geodesy.
     */
    public const EPSG_RSRGD2000 = 4885;

    /**
     * SHGD2015
     * Extent: St Helena, Ascension and Tristan da Cunha - St Helena Island - onshore.
     * Scope: Engineering survey including Airport and Ruperts Wharf construction.
     * Closely aligned to SHGD2015 (CRS code xxxx) with difference attributable to different reference epoch and 10 cm
     * difference in ellipsoid height.
     */
    public const EPSG_SHGD2015 = 7885;

    /**
     * SIRGAS 1995
     * Extent: South America - onshore and offshore. Ecuador (mainland and Galapagos) - onshore and offshore.
     * Scope: Geodesy.
     * Replaced by SIRGAS 2000 (CRS code 4989).
     */
    public const EPSG_SIRGAS_1995 = 4975;

    /**
     * SIRGAS 2000
     * Extent: Latin America - Central America and South America - onshore and offshore. Brazil - onshore and offshore.
     * Scope: Geodesy.
     * Replaces SIRGAS 1995 system (CRS code 4975) for South America; expands SIRGAS to Central America.
     */
    public const EPSG_SIRGAS_2000 = 4989;

    /**
     * SIRGAS-CON DGF00P01
     * Extent: Latin America - Central America and South America, onshore and offshore.
     * Scope: Geodesy.
     * Replaced by SIRGAS-CON DGF01P01 (CRS code 8918).
     */
    public const EPSG_SIRGAS_CON_DGF00P01 = 8916;

    /**
     * SIRGAS-CON DGF01P01
     * Extent: Latin America - Central America and South America, onshore and offshore.
     * Scope: Geodesy.
     * Replaces SIRGAS-CON DGF00P01 (CRS code 8916). Replaced by SIRGAS-CON DGF01P02 (CRS code 8920).
     */
    public const EPSG_SIRGAS_CON_DGF01P01 = 8918;

    /**
     * SIRGAS-CON DGF01P02
     * Extent: Latin America - Central America and South America, onshore and offshore.
     * Scope: Geodesy.
     * Replaces SIRGAS-CON DGF01P01 (CRS code 8918). Replaced by SIRGAS-CON DGF02P01 (CRS code 8922).
     */
    public const EPSG_SIRGAS_CON_DGF01P02 = 8920;

    /**
     * SIRGAS-CON DGF02P01
     * Extent: Latin America - Central America and South America, onshore and offshore.
     * Scope: Geodesy.
     * Replaces SIRGAS-CON DGF01P02 (CRS code 8920). Replaced by SIRGAS-CON DGF04P01 (CRS code 8924).
     */
    public const EPSG_SIRGAS_CON_DGF02P01 = 8922;

    /**
     * SIRGAS-CON DGF04P01
     * Extent: Latin America - Central America and South America, onshore and offshore.
     * Scope: Geodesy.
     * Replaces SIRGAS-CON DGF02P01 (CRS code 8922). Replaced by SIRGAS-CON DGF05P01 (CRS code 8926).
     */
    public const EPSG_SIRGAS_CON_DGF04P01 = 8924;

    /**
     * SIRGAS-CON DGF05P01
     * Extent: Latin America - Central America and South America, onshore and offshore.
     * Scope: Geodesy.
     * Replaces SIRGAS-CON DGF04P01 (CRS code 8924). Replaced by SIRGAS-CON DGF06P01 (CRS code 8928).
     */
    public const EPSG_SIRGAS_CON_DGF05P01 = 8926;

    /**
     * SIRGAS-CON DGF06P01
     * Extent: Latin America - Central America and South America, onshore and offshore.
     * Scope: Geodesy.
     * Replaces SIRGAS-CON DGF05P01 (CRS code 8926). Replaced by SIRGAS-CON DGF07P01 (CRS code 8930).
     */
    public const EPSG_SIRGAS_CON_DGF06P01 = 8928;

    /**
     * SIRGAS-CON DGF07P01
     * Extent: Latin America - Central America and South America, onshore and offshore.
     * Scope: Geodesy.
     * Replaces SIRGAS-CON DGF06P01 (CRS code 8928). Replaced by SIRGAS-CON DGF08P01 (CRS code 8932).
     */
    public const EPSG_SIRGAS_CON_DGF07P01 = 8930;

    /**
     * SIRGAS-CON DGF08P01
     * Extent: Latin America - Central America and South America, onshore and offshore.
     * Scope: Geodesy.
     * Replaces SIRGAS-CON DGF07P01 (CRS code 8930). Replaced by SIRGAS-CON SIR09P01 (CRS code 8934).
     */
    public const EPSG_SIRGAS_CON_DGF08P01 = 8932;

    /**
     * SIRGAS-CON SIR09P01
     * Extent: Latin America - Central America and South America, onshore and offshore.
     * Scope: Geodesy.
     * Replaces SIRGAS-CON DGF08P01 (CRS code 8932). Replaced by SIRGAS-CON SIR10P01 (CRS code 8936).
     */
    public const EPSG_SIRGAS_CON_SIR09P01 = 8934;

    /**
     * SIRGAS-CON SIR10P01
     * Extent: Latin America - Central America and South America, onshore and offshore.
     * Scope: Geodesy.
     * Replaces SIRGAS-CON SIR09P01 (CRS code 8934). Replaced by SIRGAS-CON SIR11P01 (CRS code 8938).
     */
    public const EPSG_SIRGAS_CON_SIR10P01 = 8936;

    /**
     * SIRGAS-CON SIR11P01
     * Extent: Latin America - Central America and South America, onshore and offshore.
     * Scope: Geodesy.
     * Replaces SIRGAS-CON SIR10P01 (CRS code 8936). Replaced by SIRGAS-CON SIR13P01 (CRS code 8940).
     */
    public const EPSG_SIRGAS_CON_SIR11P01 = 8938;

    /**
     * SIRGAS-CON SIR13P01
     * Extent: Latin America - Central America and South America, onshore and offshore.
     * Scope: Geodesy.
     * Replaces SIRGAS-CON SIR11P01 (CRS code 8938). Replaced by SIRGAS-CON SIR14P01 (CRS code 8942).
     */
    public const EPSG_SIRGAS_CON_SIR13P01 = 8940;

    /**
     * SIRGAS-CON SIR14P01
     * Extent: Latin America - Central America and South America, onshore and offshore.
     * Scope: Geodesy.
     * Replaces SIRGAS-CON SIR13P01 (CRS code 8940). Replaced by SIRGAS-CON SIR15P01 (CRS code 8944).
     */
    public const EPSG_SIRGAS_CON_SIR14P01 = 8942;

    /**
     * SIRGAS-CON SIR15P01
     * Extent: Latin America - Central America and South America, onshore and offshore.
     * Scope: Geodesy.
     * Replaces SIRGAS-CON SIR14P01 (CRS code 8942). Replaced by SIRGAS-CON SIR17P01 (CRS code 8946).
     */
    public const EPSG_SIRGAS_CON_SIR15P01 = 8944;

    /**
     * SIRGAS-CON SIR17P01
     * Extent: Latin America - Central America and South America, onshore and offshore.
     * Scope: Geodesy.
     * Replaces SIRGAS-CON SIR15P01 (CRS code 8944).
     */
    public const EPSG_SIRGAS_CON_SIR17P01 = 8946;

    /**
     * SIRGAS-Chile 2002
     * Extent: Chile - onshore and offshore. Includes Easter Island, Juan Fernandez Islands, San Felix, and Sala y
     * Gomez.
     * Scope: Geodesy.
     * Densification of SIRGAS 2000 within Chile. Replaced by SIRGAS-Chile 2010 (CRS code 8948).
     */
    public const EPSG_SIRGAS_CHILE_2002 = 5359;

    /**
     * SIRGAS-Chile 2010
     * Extent: Chile - onshore and offshore. Includes Easter Island, Juan Fernandez Islands, San Felix, and Sala y
     * Gomez.
     * Scope: Geodesy.
     * Densification of SIRGAS-CON within Chile at epoch 2010.00. Replaces SIRGAS-Chile 2002 (CRS code 5359), replaced
     * by SIRGAS-Chile 2013 (CRS code 9147) due to significant tectonic deformation.
     */
    public const EPSG_SIRGAS_CHILE_2010 = 8948;

    /**
     * SIRGAS-Chile 2013
     * Extent: Chile - onshore and offshore. Includes Easter Island, Juan Fernandez Islands, San Felix, and Sala y
     * Gomez.
     * Scope: Geodesy.
     * Densification of SIRGAS-CON within Chile at epoch 2013.00. Replaces SIRGAS-Chile 2010 (CRS code 8948), replaced
     * by SIRGAS-Chile 2016 (CRS code 9152) due to significant tectonic deformation.
     */
    public const EPSG_SIRGAS_CHILE_2013 = 9147;

    /**
     * SIRGAS-Chile 2016
     * Extent: Chile - onshore and offshore. Includes Easter Island, Juan Fernandez Islands, San Felix, and Sala y
     * Gomez.
     * Scope: Geodesy.
     * Densification of SIRGAS-CON within Chile at epoch 2016.00. Replaces SIRGAS-Chile 2013 (CRS code 9147) due to
     * significant tectonic deformation.
     */
    public const EPSG_SIRGAS_CHILE_2016 = 9152;

    /**
     * SIRGAS-ROU98
     * Extent: Uruguay - onshore and offshore.
     * Scope: Geodesy.
     * Densification of SIRGAS 1995 in Uruguay.
     */
    public const EPSG_SIRGAS_ROU98 = 5380;

    /**
     * SIRGAS_ES2007.8
     * Extent: El Salvador - onshore and offshore.
     * Scope: Geodesy.
     * Densification of SIRGAS 2000 within El Salvador.
     */
    public const EPSG_SIRGAS_ES2007_8 = 5392;

    /**
     * SRB_ETRS89
     * Extent: Serbia including Vojvodina.
     * Scope: Geodesy.
     * Replaces SREF98 (CRS code 4074).
     */
    public const EPSG_SRB_ETRS89 = 8684;

    /**
     * SREF98
     * Extent: Serbia including Vojvodina.
     * Scope: Geodesy.
     * Replaced by SRB_ETRS89 (STRS00) (CRS code 8684).
     */
    public const EPSG_SREF98 = 4074;

    /**
     * SRGI2013
     * Extent: Indonesia - onshore and offshore.
     * Scope: Geodesy.
     * Supports horizontal component of national horizontal control network (JKHN). Adopted 2013-10-11. Replaces DGN95
     * and all older systems.
     */
    public const EPSG_SRGI2013 = 9469;

    /**
     * SWEREF99
     * Extent: Sweden - onshore and offshore.
     * Scope: Geodesy.
     */
    public const EPSG_SWEREF99 = 4977;

    /**
     * Slovenia 1996
     * Extent: Slovenia - onshore and offshore.
     * Scope: Geodesy.
     */
    public const EPSG_SLOVENIA_1996 = 4883;

    /**
     * St. Helena Tritan
     * Extent: St Helena, Ascension and Tristan da Cunha - St Helena Island - onshore.
     * Scope: Engineering survey including Airport and Ruperts Wharf construction.
     * Closely aligned to SHGD2015 (CRS code 7885) with difference attributable to different reference epoch and 10 cm
     * difference in ellipsoid height. Replaced by SHGD2015 from 2015.
     */
    public const EPSG_ST_HELENA_TRITAN = 7880;

    /**
     * TGD2005
     * Extent: Tonga - onshore and offshore.
     * Scope: Geodesy.
     */
    public const EPSG_TGD2005 = 5885;

    /**
     * TUREF
     * Extent: Turkey - onshore and offshore.
     * Scope: Geodesy.
     */
    public const EPSG_TUREF = 5251;

    /**
     * TWD97
     * Extent: Taiwan, Republic of China - onshore and offshore - Taiwan Island, Penghu (Pescadores) Islands.
     * Scope: Geodesy.
     */
    public const EPSG_TWD97 = 3823;

    /**
     * UCS-2000
     * Extent: Ukraine - onshore and offshore.
     * Scope: Geodesy.
     * Adopted 1st January 2007.
     */
    public const EPSG_UCS_2000 = 5560;

    /**
     * WGS 66
     * Extent: World.
     * Scope: Geodesy.
     * Replaced by WGS 72.
     */
    public const EPSG_WGS_66 = 4891;

    /**
     * WGS 72
     * Extent: World.
     * Scope: Geodesy.
     * Replaced by WGS 84.
     */
    public const EPSG_WGS_72 = 4985;

    /**
     * WGS 72BE
     * Extent: World.
     * Scope: Geodesy.
     * Broadcast ephemeris. Replaced by WGS 84.
     */
    public const EPSG_WGS_72BE = 4987;

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
     * Scope: Geodesy. Navigation and positioning using GPS satellite system.
     */
    public const EPSG_WGS_84 = 4979;

    /**
     * WGS 84 (G1150)
     * Extent: World.
     * Scope: Geodesy. Navigation and positioning using GPS satellite system.
     * Replaces  WGS 84 (G873) (CRS code 7659) from 2002-01-20. Replaced by WGS 84 (G1674) (CRS code 7663) from
     * 2012-02-08.
     */
    public const EPSG_WGS_84_G1150 = 7661;

    /**
     * WGS 84 (G1674)
     * Extent: World.
     * Scope: Geodesy. Navigation and positioning using GPS satellite system.
     * Replaces WGS 84 (G1150) (CRS code 7661) from 2012-02-08. Replaced by WGS 84 (G1762) (CRS code 7665) from
     * 2013-10-16.
     */
    public const EPSG_WGS_84_G1674 = 7663;

    /**
     * WGS 84 (G1762)
     * Extent: World.
     * Scope: Geodesy. Navigation and positioning using GPS satellite system.
     * Replaces WGS 84 (G1674) (CRS code 7663) from 2013-10-16.
     */
    public const EPSG_WGS_84_G1762 = 7665;

    /**
     * WGS 84 (G730)
     * Extent: World.
     * Scope: Geodesy. Navigation and positioning using GPS satellite system.
     * Replaces WGS 84 (Transit) (CRS code 7816) from 1994-06-29. Replaced by WGS84 (G873) (CRS code 7659) from
     * 1997-01-29.
     */
    public const EPSG_WGS_84_G730 = 7657;

    /**
     * WGS 84 (G873)
     * Extent: World.
     * Scope: Geodesy. Navigation and positioning using GPS satellite system.
     * Replaces WGS 84 (G730) (CRS code 7657) from 1997-01-29. Replaced by WGS 84 (G1150) (CRS code 7661) from
     * 2002-01-20.
     */
    public const EPSG_WGS_84_G873 = 7659;

    /**
     * WGS 84 (Transit)
     * Extent: World.
     * Scope: Geodesy. Navigation and positioning using GPS satellite system.
     * Replaced by WGS84 (G730) (CRS code 7657) from 1994-06-29.
     */
    public const EPSG_WGS_84_TRANSIT = 7816;

    /**
     * Yemen NGN96
     * Extent: Yemen - onshore and offshore.
     * Scope: Geodesy.
     */
    public const EPSG_YEMEN_NGN96 = 4981;

    public function __construct(
        int $epsgCode,
        CoordinateSystem $coordinateSystem,
        Datum $datum
    ) {
        $this->epsgCode = $epsgCode;
        $this->coordinateSystem = $coordinateSystem;
        $this->datum = $datum;

        assert(count($coordinateSystem->getAxes()) === 3);
    }

    public function getEpsgCode(): int
    {
        return $this->epsgCode;
    }

    public function getCoordinateSystem(): CoordinateSystem
    {
        return $this->coordinateSystem;
    }

    public function getDatum(): Datum
    {
        return $this->datum;
    }
}