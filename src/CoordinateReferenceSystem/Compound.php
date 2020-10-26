<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\CoordinateReferenceSystem;

class Compound extends CoordinateReferenceSystem
{
    /**
     * AbInvA96_2020 Grid + ODN height
     * Extent: UK - on or related to the A96 highway from Aberdeen to Inverness.
     * Scope: Highway engineering.
     */
    public const EPSG_ABINVA96_2020_GRID_PLUS_ODN_HEIGHT = 9388;

    /**
     * Amersfoort / RD New + NAP height
     * Extent: Netherlands - onshore, including Waddenzee, Dutch Wadden Islands and 12-mile offshore coastal zone.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_AMERSFOORT_RD_NEW_PLUS_NAP_HEIGHT = 7415;

    /**
     * Astro DOS 71 / UTM zone 30S + Jamestown 1971 height
     * Extent: St Helena, Ascension and Tristan da Cunha - St Helena Island - onshore.
     * Scope: Topographic mapping.
     */
    public const EPSG_ASTRO_DOS_71_UTM_ZONE_30S_PLUS_JAMESTOWN_1971_HEIGHT = 7954;

    /**
     * Belge 1972 / Belgian Lambert 72 + Ostend height
     * Extent: Belgium - onshore.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_BELGE_1972_BELGIAN_LAMBERT_72_PLUS_OSTEND_HEIGHT = 6190;

    /**
     * CR-SIRGAS / CRTM05 + DACR52 height
     * Extent: Costa Rica - onshore.
     * Scope: Engineering survey, topographic mapping.
     * With geoid model and gravity, part of official national dynamic geodetic framework from April 2018.
     */
    public const EPSG_CR_SIRGAS_CRTM05_PLUS_DACR52_HEIGHT = 8912;

    /**
     * DB_REF / 3-degree Gauss-Kruger zone 2 (E-N) + DHHN92 height
     * Extent: Germany - former West Germany onshore west of 7°30'E - states of Niedersachsen, Nordrhein-Westfalen,
     * Rheinland-Pfalz, Saarland.
     * Scope: Engineering survey and topographic mapping for railway applications.
     */
    public const EPSG_DB_REF_3_DEGREE_GAUSS_KRUGER_ZONE_2_E_N_PLUS_DHHN92_HEIGHT = 5832;

    /**
     * DB_REF / 3-degree Gauss-Kruger zone 3 (E-N) + DHHN92 height
     * Extent: Germany - onshore between 7°30'E and 10°30'E.
     * Scope: Engineering survey and topographic mapping for railway applications.
     */
    public const EPSG_DB_REF_3_DEGREE_GAUSS_KRUGER_ZONE_3_E_N_PLUS_DHHN92_HEIGHT = 5833;

    /**
     * DB_REF / 3-degree Gauss-Kruger zone 4 (E-N) + DHHN92 height
     * Extent: Germany - onshore between 10°30'E and 13°30'E.
     * Scope: Engineering survey and topographic mapping for railway applications.
     */
    public const EPSG_DB_REF_3_DEGREE_GAUSS_KRUGER_ZONE_4_E_N_PLUS_DHHN92_HEIGHT = 5834;

    /**
     * DB_REF / 3-degree Gauss-Kruger zone 5 (E-N) + DHHN92 height
     * Extent: Germany - onshore east of 13°30'E.
     * Scope: Engineering survey and topographic mapping for railway applications.
     */
    public const EPSG_DB_REF_3_DEGREE_GAUSS_KRUGER_ZONE_5_E_N_PLUS_DHHN92_HEIGHT = 5835;

    /**
     * ETRS89 + BI height
     * Extent: United Kingdom (UK) - offshore to boundary of UKCS within 49°45'N to 61°N and 9°W to 2°E; onshore
     * Great Britain (England, Wales and Scotland) and Northern Ireland. Ireland onshore. Isle of Man onshore.
     * Scope: Spatial referencing.
     */
    public const EPSG_ETRS89_PLUS_BI_HEIGHT = 9452;

    /**
     * ETRS89 + Baltic 1957 height
     * Extent: Czechia; Slovakia.
     * Scope: Intermediate stage in transformations - not used otherwise.
     */
    public const EPSG_ETRS89_PLUS_BALTIC_1957_HEIGHT = 8360;

    /**
     * ETRS89 + Belfast height
     * Extent: United Kingdom (UK) - Northern Ireland (Ulster) - onshore.
     * Scope: Spatial referencing.
     */
    public const EPSG_ETRS89_PLUS_BELFAST_HEIGHT = 9450;

    /**
     * ETRS89 + Douglas height
     * Extent: Isle of Man - onshore.
     * Scope: Spatial referencing.
     */
    public const EPSG_ETRS89_PLUS_DOUGLAS_HEIGHT = 9429;

    /**
     * ETRS89 + EVRF2000 height
     * Extent: Europe - onshore - Andorra; Austria; Belgium; Bosnia and Herzegovina; Croatia; Czechia; Denmark;
     * Estonia; Finland; France - mainland; Germany; Gibraltar; Hungary; Italy - mainland and Sicily; Latvia;
     * Liechtenstein; Lithuania; Luxembourg; Netherlands; Norway; Poland; Portugal - mainland; Romania; San Marino;
     * Slovakia; Slovenia; Spain - mainland; Sweden; Switzerland; United Kingdom (UK) - Great Britain mainland; Vatican
     * City State.
     * Scope: Pan-European spatial positioning.
     * Replaced by ETRS89 + EVRF2007 height (CRS code 7423).
     */
    public const EPSG_ETRS89_PLUS_EVRF2000_HEIGHT = 7409;

    /**
     * ETRS89 + EVRF2007 height
     * Extent: Europe - onshore - Andorra; Austria; Belgium; Bosnia and Herzegovina; Bulgaria; Croatia; Czechia;
     * Denmark; Estonia; Finland; France - mainland; Germany; Gibraltar, Hungary; Italy - mainland and Sicily; Latvia;
     * Liechtenstein; Lithuania; Luxembourg; Netherlands; Norway; Poland; Portugal - mainland; Romania; San Marino;
     * Slovakia; Slovenia; Spain - mainland; Sweden; Switzerland; United Kingdom (UK) - Great Britain mainland; Vatican
     * City State.
     * Scope: Pan-European spatial positioning.
     * Replaces ETRS89 + EVRF2000 height (CRS code 7409).
     */
    public const EPSG_ETRS89_PLUS_EVRF2007_HEIGHT = 7423;

    /**
     * ETRS89 + EVRF2019 height
     * Extent: Europe - onshore - Andorra; Austria; Belgium; Bosnia and Herzegovina; Bulgaria; Croatia; Czechia;
     * Denmark; Estonia; Finland; France - mainland; Germany; Gibraltar, Hungary; Italy - mainland and Sicily; Latvia;
     * Liechtenstein; Lithuania; Luxembourg; Netherlands; North Macedonia; Norway; Poland; Portugal - mainland;
     * Romania; San Marino; Slovakia; Slovenia; Spain - mainland; Sweden; Switzerland; United Kingdom (UK) - Great
     * Britain mainland; Vatican City State.
     * Scope: Geodesy (gravity).
     * Replaces ETRS89 + EVRF2007 height (CRS code 7423). See also ETRS89 + EVRF2019 mean-tide height (CRS code 9423).
     */
    public const EPSG_ETRS89_PLUS_EVRF2019_HEIGHT = 9422;

    /**
     * ETRS89 + EVRF2019 mean-tide height
     * Extent: Europe - onshore - Andorra; Austria; Belgium; Bosnia and Herzegovina; Bulgaria; Croatia; Czechia;
     * Denmark; Estonia; Finland; France - mainland; Germany; Gibraltar, Hungary; Italy - mainland and Sicily; Latvia;
     * Liechtenstein; Lithuania; Luxembourg; Netherlands; North Macedonia; Norway; Poland; Portugal - mainland;
     * Romania; San Marino; Slovakia; Slovenia; Spain - mainland; Sweden; Switzerland; United Kingdom (UK) - Great
     * Britain mainland; Vatican City State.
     * Scope: Geodesy (GNSS), oceanography.
     * See also ETRS89 + EVRF2019 (CRS code 9422).
     */
    public const EPSG_ETRS89_PLUS_EVRF2019_MEAN_TIDE_HEIGHT = 9423;

    /**
     * ETRS89 + LAT NL depth
     * Extent: Netherlands - offshore North Sea.
     * Scope: Hydrography and nautical charting.
     */
    public const EPSG_ETRS89_PLUS_LAT_NL_DEPTH = 9289;

    /**
     * ETRS89 + Lerwick height
     * Extent: United Kingdom (UK) - Great Britain - Scotland - Shetland Islands onshore.
     * Scope: Spatial referencing.
     */
    public const EPSG_ETRS89_PLUS_LERWICK_HEIGHT = 9427;

    /**
     * ETRS89 + MSL NL depth
     * Extent: Netherlands - offshore North Sea.
     * Scope: Hydrography, drilling, offshore engineering.
     */
    public const EPSG_ETRS89_PLUS_MSL_NL_DEPTH = 9290;

    /**
     * ETRS89 + Malin Head height
     * Extent: Ireland - onshore. United Kingdom (UK) - Northern Ireland (Ulster) - onshore.
     * Scope: Spatial referencing.
     */
    public const EPSG_ETRS89_PLUS_MALIN_HEAD_HEIGHT = 9449;

    /**
     * ETRS89 + NAP height
     * Extent: Netherlands - onshore and offshore.
     * Scope: Spatial referencing.
     */
    public const EPSG_ETRS89_PLUS_NAP_HEIGHT = 9286;

    /**
     * ETRS89 + NN2000 height
     * Extent: Norway - onshore.
     * Scope: Geodesy.
     */
    public const EPSG_ETRS89_PLUS_NN2000_HEIGHT = 5942;

    /**
     * ETRS89 + NN54 height
     * Extent: Norway - onshore.
     * Scope: Geodesy.
     * Replaced by ETRS89 + NN2000 height (compound CRS code 5942).
     */
    public const EPSG_ETRS89_PLUS_NN54_HEIGHT = 6144;

    /**
     * ETRS89 + ODN (Offshore) height
     * Extent: United Kingdom (UK) - offshore between 2km from shore and boundary of UKCS within 49°46'N to 61°01'N
     * and 7°33'W to 3°33'E.
     * Scope: Spatial referencing.
     */
    public const EPSG_ETRS89_PLUS_ODN_OFFSHORE_HEIGHT = 9425;

    /**
     * ETRS89 + ODN Orkney height
     * Extent: United Kingdom (UK) - Great Britain - Scotland - Orkney Islands onshore.
     * Scope: Spatial referencing.
     */
    public const EPSG_ETRS89_PLUS_ODN_ORKNEY_HEIGHT = 9426;

    /**
     * ETRS89 + ODN height
     * Extent: United Kingdom (UK) - Great Britain onshore - England and Wales - mainland; Scotland - mainland and
     * Inner Hebrides.
     * Scope: Spatial referencing.
     */
    public const EPSG_ETRS89_PLUS_ODN_HEIGHT = 9424;

    /**
     * ETRS89 + St. Marys height
     * Extent: United Kingdom (UK) - Great Britain - England - Isles of Scilly onshore.
     * Scope: Spatial referencing.
     */
    public const EPSG_ETRS89_PLUS_ST_MARYS_HEIGHT = 9430;

    /**
     * ETRS89 + Stornoway height
     * Extent: United Kingdom (UK) - Great Britain - Scotland - Outer Hebrides onshore.
     * Scope: Spatial referencing.
     */
    public const EPSG_ETRS89_PLUS_STORNOWAY_HEIGHT = 9428;

    /**
     * ETRS89 / Belgian Lambert 2008 + Ostend height
     * Extent: Belgium - onshore.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_ETRS89_BELGIAN_LAMBERT_2008_PLUS_OSTEND_HEIGHT = 8370;

    /**
     * ETRS89 / DKTM1 + DVR90 height
     * Extent: Denmark - Jutland onshore west of 10°E.
     * Scope: Engineering survey.
     */
    public const EPSG_ETRS89_DKTM1_PLUS_DVR90_HEIGHT = 4097;

    /**
     * ETRS89 / DKTM2 + DVR90 height
     * Extent: Denmark - onshore - Jutland east of 9°E and Funen.
     * Scope: Engineering survey.
     */
    public const EPSG_ETRS89_DKTM2_PLUS_DVR90_HEIGHT = 4098;

    /**
     * ETRS89 / DKTM3 + DVR90 height
     * Extent: Denmark - Zealand and Lolland (onshore).
     * Scope: Engineering survey.
     */
    public const EPSG_ETRS89_DKTM3_PLUS_DVR90_HEIGHT = 4099;

    /**
     * ETRS89 / DKTM4 + DVR90 height
     * Extent: Denmark - Bornholm onshore.
     * Scope: Engineering survey.
     */
    public const EPSG_ETRS89_DKTM4_PLUS_DVR90_HEIGHT = 4100;

    /**
     * ETRS89 / Faroe TM + FVR09 height
     * Extent: Faroe Islands - onshore.
     * Scope: Engineering survey.
     * Introduced in 2010.
     */
    public const EPSG_ETRS89_FAROE_TM_PLUS_FVR09_HEIGHT = 5318;

    /**
     * ETRS89 / Kp2000 Bornholm + DVR90 height
     * Extent: Denmark - Bornholm onshore.
     * Scope: Topographic mapping (large scale).
     */
    public const EPSG_ETRS89_KP2000_BORNHOLM_PLUS_DVR90_HEIGHT = 7420;

    /**
     * ETRS89 / Kp2000 Jutland + DVR90 height
     * Extent: Denmark - Jutland and Funen - onshore.
     * Scope: Topographic mapping (large scale).
     */
    public const EPSG_ETRS89_KP2000_JUTLAND_PLUS_DVR90_HEIGHT = 7418;

    /**
     * ETRS89 / Kp2000 Zealand + DVR90 height
     * Extent: Denmark - Zealand and Lolland (onshore).
     * Scope: Topographic mapping (large scale).
     */
    public const EPSG_ETRS89_KP2000_ZEALAND_PLUS_DVR90_HEIGHT = 7419;

    /**
     * ETRS89 / NTM zone 10 + NN2000 height
     * Extent: Norway - onshore - between 10°E and 11°E.
     * Scope: Engineering survey.
     */
    public const EPSG_ETRS89_NTM_ZONE_10_PLUS_NN2000_HEIGHT = 5950;

    /**
     * ETRS89 / NTM zone 10 + NN54 height
     * Extent: Norway - onshore - between 10°E and 11°E.
     * Scope: Engineering survey.
     * Replaced by ETRS89 / NTM zone 10 + NN2000 height (compound CRS code 5950).
     */
    public const EPSG_ETRS89_NTM_ZONE_10_PLUS_NN54_HEIGHT = 6150;

    /**
     * ETRS89 / NTM zone 11 + NN2000 height
     * Extent: Norway - onshore - between 11°E and 12°E.
     * Scope: Engineering survey.
     */
    public const EPSG_ETRS89_NTM_ZONE_11_PLUS_NN2000_HEIGHT = 5951;

    /**
     * ETRS89 / NTM zone 11 + NN54 height
     * Extent: Norway - onshore - between 11°E and 12°E.
     * Scope: Engineering survey.
     * Replaced by ETRS89 / NTM zone 11 + NN2000 height (compound CRS code 5951).
     */
    public const EPSG_ETRS89_NTM_ZONE_11_PLUS_NN54_HEIGHT = 6151;

    /**
     * ETRS89 / NTM zone 12 + NN2000 height
     * Extent: Norway - onshore - between 12°E and 13°E.
     * Scope: Engineering survey.
     */
    public const EPSG_ETRS89_NTM_ZONE_12_PLUS_NN2000_HEIGHT = 5952;

    /**
     * ETRS89 / NTM zone 12 + NN54 height
     * Extent: Norway - onshore - between 12°E and 13°E.
     * Scope: Engineering survey.
     * Replaced by ETRS89 / NTM zone 12 + NN2000 height (compound CRS code 5952).
     */
    public const EPSG_ETRS89_NTM_ZONE_12_PLUS_NN54_HEIGHT = 6152;

    /**
     * ETRS89 / NTM zone 13 + NN2000 height
     * Extent: Norway - onshore - between 13°E and 14°E.
     * Scope: Engineering survey.
     */
    public const EPSG_ETRS89_NTM_ZONE_13_PLUS_NN2000_HEIGHT = 5953;

    /**
     * ETRS89 / NTM zone 13 + NN54 height
     * Extent: Norway - onshore - between 13°E and 14°E.
     * Scope: Engineering survey.
     * Replaced by ETRS89 / NTM zone 13 + NN2000 height (compound CRS code 5953).
     */
    public const EPSG_ETRS89_NTM_ZONE_13_PLUS_NN54_HEIGHT = 6153;

    /**
     * ETRS89 / NTM zone 14 + NN2000 height
     * Extent: Norway - onshore - between 14°E and 15°E.
     * Scope: Engineering survey.
     */
    public const EPSG_ETRS89_NTM_ZONE_14_PLUS_NN2000_HEIGHT = 5954;

    /**
     * ETRS89 / NTM zone 14 + NN54 height
     * Extent: Norway - onshore - between 14°E and 15°E.
     * Scope: Engineering survey.
     * Replaced by ETRS89 / NTM zone 14 + NN2000 height (compound CRS code 5954).
     */
    public const EPSG_ETRS89_NTM_ZONE_14_PLUS_NN54_HEIGHT = 6154;

    /**
     * ETRS89 / NTM zone 15 + NN2000 height
     * Extent: Norway - onshore - between 15°E and 16°E.
     * Scope: Engineering survey.
     */
    public const EPSG_ETRS89_NTM_ZONE_15_PLUS_NN2000_HEIGHT = 5955;

    /**
     * ETRS89 / NTM zone 15 + NN54 height
     * Extent: Norway - onshore - between 15°E and 16°E.
     * Scope: Engineering survey.
     * Replaced by ETRS89 / NTM zone 15 + NN2000 height (compound CRS code 5955).
     */
    public const EPSG_ETRS89_NTM_ZONE_15_PLUS_NN54_HEIGHT = 6155;

    /**
     * ETRS89 / NTM zone 16 + NN2000 height
     * Extent: Norway - onshore - between 16°E and 17°E.
     * Scope: Engineering survey.
     */
    public const EPSG_ETRS89_NTM_ZONE_16_PLUS_NN2000_HEIGHT = 5956;

    /**
     * ETRS89 / NTM zone 16 + NN54 height
     * Extent: Norway - onshore - between 16°E and 17°E.
     * Scope: Engineering survey.
     * Replaced by ETRS89 / NTM zone 16 + NN2000 height (compound CRS code 5956).
     */
    public const EPSG_ETRS89_NTM_ZONE_16_PLUS_NN54_HEIGHT = 6156;

    /**
     * ETRS89 / NTM zone 17 + NN2000 height
     * Extent: Norway - onshore - between 17°E and 18°E.
     * Scope: Engineering survey.
     */
    public const EPSG_ETRS89_NTM_ZONE_17_PLUS_NN2000_HEIGHT = 5957;

    /**
     * ETRS89 / NTM zone 17 + NN54 height
     * Extent: Norway - onshore - between 17°E and 18°E.
     * Scope: Engineering survey.
     * Replaced by ETRS89 / NTM zone 17 + NN2000 height (compound CRS code 5957).
     */
    public const EPSG_ETRS89_NTM_ZONE_17_PLUS_NN54_HEIGHT = 6157;

    /**
     * ETRS89 / NTM zone 18 + NN2000 height
     * Extent: Norway - onshore - between 18°E and 19°E.
     * Scope: Engineering survey.
     */
    public const EPSG_ETRS89_NTM_ZONE_18_PLUS_NN2000_HEIGHT = 5958;

    /**
     * ETRS89 / NTM zone 18 + NN54 height
     * Extent: Norway - onshore - between 18°E and 19°E.
     * Scope: Engineering survey.
     * Replaced by ETRS89 / NTM zone 18 + NN2000 height (compound CRS code 5958).
     */
    public const EPSG_ETRS89_NTM_ZONE_18_PLUS_NN54_HEIGHT = 6158;

    /**
     * ETRS89 / NTM zone 19 + NN2000 height
     * Extent: Norway - onshore - between 19°E and 20°E.
     * Scope: Engineering survey.
     */
    public const EPSG_ETRS89_NTM_ZONE_19_PLUS_NN2000_HEIGHT = 5959;

    /**
     * ETRS89 / NTM zone 19 + NN54 height
     * Extent: Norway - onshore - between 19°E and 20°E.
     * Scope: Engineering survey.
     * Replaced by ETRS89 / NTM zone 19 + NN2000 height (compound CRS code 5959).
     */
    public const EPSG_ETRS89_NTM_ZONE_19_PLUS_NN54_HEIGHT = 6159;

    /**
     * ETRS89 / NTM zone 20 + NN2000 height
     * Extent: Norway - onshore - between 20°E and 21°E.
     * Scope: Engineering survey.
     */
    public const EPSG_ETRS89_NTM_ZONE_20_PLUS_NN2000_HEIGHT = 5960;

    /**
     * ETRS89 / NTM zone 20 + NN54 height
     * Extent: Norway - onshore - between 20°E and 21°E.
     * Scope: Engineering survey.
     * Replaced by ETRS89 / NTM zone 20 + NN2000 height (compound CRS code 5960).
     */
    public const EPSG_ETRS89_NTM_ZONE_20_PLUS_NN54_HEIGHT = 6160;

    /**
     * ETRS89 / NTM zone 21 + NN2000 height
     * Extent: Norway - onshore - between 21°E and 22°E.
     * Scope: Engineering survey.
     */
    public const EPSG_ETRS89_NTM_ZONE_21_PLUS_NN2000_HEIGHT = 5961;

    /**
     * ETRS89 / NTM zone 21 + NN54 height
     * Extent: Norway - onshore - between 21°E and 22°E.
     * Scope: Engineering survey.
     * Replaced by ETRS89 / NTM zone 21 + NN2000 height (compound CRS code 5961).
     */
    public const EPSG_ETRS89_NTM_ZONE_21_PLUS_NN54_HEIGHT = 6161;

    /**
     * ETRS89 / NTM zone 22 + NN2000 height
     * Extent: Norway - onshore - between 22°E and 23°E.
     * Scope: Engineering survey.
     */
    public const EPSG_ETRS89_NTM_ZONE_22_PLUS_NN2000_HEIGHT = 5962;

    /**
     * ETRS89 / NTM zone 22 + NN54 height
     * Extent: Norway - onshore - between 22°E and 23°E.
     * Scope: Engineering survey.
     * Replaced by ETRS89 / NTM zone 22 + NN2000 height (compound CRS code 5962).
     */
    public const EPSG_ETRS89_NTM_ZONE_22_PLUS_NN54_HEIGHT = 6162;

    /**
     * ETRS89 / NTM zone 23 + NN2000 height
     * Extent: Norway - onshore - between 23°E and 24°E.
     * Scope: Engineering survey.
     */
    public const EPSG_ETRS89_NTM_ZONE_23_PLUS_NN2000_HEIGHT = 5963;

    /**
     * ETRS89 / NTM zone 23 + NN54 height
     * Extent: Norway - onshore - between 23°E and 24°E.
     * Scope: Engineering survey.
     * Replaced by ETRS89 / NTM zone 23 + NN2000 height (compound CRS code 5963).
     */
    public const EPSG_ETRS89_NTM_ZONE_23_PLUS_NN54_HEIGHT = 6163;

    /**
     * ETRS89 / NTM zone 24 + NN2000 height
     * Extent: Norway - onshore - between 24°E and 25°E.
     * Scope: Engineering survey.
     */
    public const EPSG_ETRS89_NTM_ZONE_24_PLUS_NN2000_HEIGHT = 5964;

    /**
     * ETRS89 / NTM zone 24 + NN54 height
     * Extent: Norway - onshore - between 24°E and 25°E.
     * Scope: Engineering survey.
     * Replaced by ETRS89 / NTM zone 24 + NN2000 height (compound CRS code 5964).
     */
    public const EPSG_ETRS89_NTM_ZONE_24_PLUS_NN54_HEIGHT = 6164;

    /**
     * ETRS89 / NTM zone 25 + NN2000 height
     * Extent: Norway - onshore - between 25°E and 26°E.
     * Scope: Engineering survey.
     */
    public const EPSG_ETRS89_NTM_ZONE_25_PLUS_NN2000_HEIGHT = 5965;

    /**
     * ETRS89 / NTM zone 25 + NN54 height
     * Extent: Norway - onshore - between 25°E and 26°E.
     * Scope: Engineering survey.
     * Replaced by ETRS89 / NTM zone 25 + NN2000 height (compound CRS code 5965).
     */
    public const EPSG_ETRS89_NTM_ZONE_25_PLUS_NN54_HEIGHT = 6165;

    /**
     * ETRS89 / NTM zone 26 + NN2000 height
     * Extent: Norway - onshore - between 26°E and 27°E.
     * Scope: Engineering survey.
     */
    public const EPSG_ETRS89_NTM_ZONE_26_PLUS_NN2000_HEIGHT = 5966;

    /**
     * ETRS89 / NTM zone 26 + NN54 height
     * Extent: Norway - onshore - between 26°E and 27°E.
     * Scope: Engineering survey.
     * Replaced by ETRS89 / NTM zone 26 + NN2000 height (compound CRS code 5966).
     */
    public const EPSG_ETRS89_NTM_ZONE_26_PLUS_NN54_HEIGHT = 6166;

    /**
     * ETRS89 / NTM zone 27 + NN2000 height
     * Extent: Norway - onshore - between 27°E and 28°E.
     * Scope: Engineering survey.
     */
    public const EPSG_ETRS89_NTM_ZONE_27_PLUS_NN2000_HEIGHT = 5967;

    /**
     * ETRS89 / NTM zone 27 + NN54 height
     * Extent: Norway - onshore - between 27°E and 28°E.
     * Scope: Engineering survey.
     * Replaced by ETRS89 / NTM zone 27 + NN2000 height (compound CRS code 5967).
     */
    public const EPSG_ETRS89_NTM_ZONE_27_PLUS_NN54_HEIGHT = 6167;

    /**
     * ETRS89 / NTM zone 28 + NN2000 height
     * Extent: Norway - onshore - between 28°E and 29°E.
     * Scope: Engineering survey.
     */
    public const EPSG_ETRS89_NTM_ZONE_28_PLUS_NN2000_HEIGHT = 5968;

    /**
     * ETRS89 / NTM zone 28 + NN54 height
     * Extent: Norway - onshore - between 28°E and 29°E.
     * Scope: Engineering survey.
     * Replaced by ETRS89 / NTM zone 28 + NN2000 height (compound CRS code 5968).
     */
    public const EPSG_ETRS89_NTM_ZONE_28_PLUS_NN54_HEIGHT = 6168;

    /**
     * ETRS89 / NTM zone 29 + NN2000 height
     * Extent: Norway - onshore - between 29°E and 30°E.
     * Scope: Engineering survey.
     */
    public const EPSG_ETRS89_NTM_ZONE_29_PLUS_NN2000_HEIGHT = 5969;

    /**
     * ETRS89 / NTM zone 29 + NN54 height
     * Extent: Norway - onshore - between 29°E and 30°E.
     * Scope: Engineering survey.
     * Replaced by ETRS89 / NTM zone 29 + NN2000 height (compound CRS code 5969).
     */
    public const EPSG_ETRS89_NTM_ZONE_29_PLUS_NN54_HEIGHT = 6169;

    /**
     * ETRS89 / NTM zone 30 + NN2000 height
     * Extent: Norway - onshore - east of 30°E.
     * Scope: Engineering survey.
     */
    public const EPSG_ETRS89_NTM_ZONE_30_PLUS_NN2000_HEIGHT = 5970;

    /**
     * ETRS89 / NTM zone 30 + NN54 height
     * Extent: Norway - onshore - east of 30°E.
     * Scope: Engineering survey.
     * Replaced by ETRS89 / NTM zone 30 + NN2000 height (compound CRS code 5970).
     */
    public const EPSG_ETRS89_NTM_ZONE_30_PLUS_NN54_HEIGHT = 6170;

    /**
     * ETRS89 / NTM zone 5 + NN2000 height
     * Extent: Norway - onshore - west of 6°E.
     * Scope: Engineering survey.
     */
    public const EPSG_ETRS89_NTM_ZONE_5_PLUS_NN2000_HEIGHT = 5945;

    /**
     * ETRS89 / NTM zone 5 + NN54 height
     * Extent: Norway - onshore - west of 6°E.
     * Scope: Engineering survey.
     * Replaced by ETRS89 / NTM zone 5 + NN2000 height (compound CRS code 5945).
     */
    public const EPSG_ETRS89_NTM_ZONE_5_PLUS_NN54_HEIGHT = 6145;

    /**
     * ETRS89 / NTM zone 6 + NN2000 height
     * Extent: Norway - onshore - between 6°E and 7°E.
     * Scope: Engineering survey.
     */
    public const EPSG_ETRS89_NTM_ZONE_6_PLUS_NN2000_HEIGHT = 5946;

    /**
     * ETRS89 / NTM zone 6 + NN54 height
     * Extent: Norway - onshore - between 6°E and 7°E.
     * Scope: Engineering survey.
     * Replaced by ETRS89 / NTM zone 6 + NN2000 height (compound CRS code 5946).
     */
    public const EPSG_ETRS89_NTM_ZONE_6_PLUS_NN54_HEIGHT = 6146;

    /**
     * ETRS89 / NTM zone 7 + NN2000 height
     * Extent: Norway - onshore - between 7°E and 8°E.
     * Scope: Engineering survey.
     */
    public const EPSG_ETRS89_NTM_ZONE_7_PLUS_NN2000_HEIGHT = 5947;

    /**
     * ETRS89 / NTM zone 7 + NN54 height
     * Extent: Norway - onshore - between 7°E and 8°E.
     * Scope: Engineering survey.
     * Replaced by ETRS89 / NTM zone 7 + NN2000 height (compound CRS code 5947).
     */
    public const EPSG_ETRS89_NTM_ZONE_7_PLUS_NN54_HEIGHT = 6147;

    /**
     * ETRS89 / NTM zone 8 + NN2000 height
     * Extent: Norway - onshore - between 8°E and 9°E.
     * Scope: Engineering survey.
     */
    public const EPSG_ETRS89_NTM_ZONE_8_PLUS_NN2000_HEIGHT = 5948;

    /**
     * ETRS89 / NTM zone 8 + NN54 height
     * Extent: Norway - onshore - between 8°E and 9°E.
     * Scope: Engineering survey.
     * Replaced by ETRS89 / NTM zone 8 + NN2000 height (compound CRS code 5948).
     */
    public const EPSG_ETRS89_NTM_ZONE_8_PLUS_NN54_HEIGHT = 6148;

    /**
     * ETRS89 / NTM zone 9 + NN2000 height
     * Extent: Norway - onshore - between 9°E and 10°E.
     * Scope: Engineering survey.
     */
    public const EPSG_ETRS89_NTM_ZONE_9_PLUS_NN2000_HEIGHT = 5949;

    /**
     * ETRS89 / NTM zone 9 + NN54 height
     * Extent: Norway - onshore - between 9°E and 10°E.
     * Scope: Engineering survey.
     * Replaced by ETRS89 / NTM zone 9 + NN2000 height (compound CRS code 5949).
     */
    public const EPSG_ETRS89_NTM_ZONE_9_PLUS_NN54_HEIGHT = 6149;

    /**
     * ETRS89 / TM35FIN(N,E) + N2000 height
     * Extent: Finland - onshore.
     * Scope: Engineering survey, topographic mapping.
     * Replaces ETRS89 / TM35FIN(N,E) + N60 height (CRS code 3902).
     */
    public const EPSG_ETRS89_TM35FIN_N_E_PLUS_N2000_HEIGHT = 3903;

    /**
     * ETRS89 / TM35FIN(N,E) + N60 height
     * Extent: Finland - onshore.
     * Scope: Engineering survey, topographic mapping.
     * Replaces YKJ/N60 (CRS code 3901). Replaced by ETRS89-TM35FIN(N,E)/N2000 (CRS code 3903).
     */
    public const EPSG_ETRS89_TM35FIN_N_E_PLUS_N60_HEIGHT = 3902;

    /**
     * ETRS89 / UTM zone 31N + DHHN92 height
     * Extent: Germany - onshore west of 6°E.
     * Scope: Geological analysis.
     */
    public const EPSG_ETRS89_UTM_ZONE_31N_PLUS_DHHN92_HEIGHT = 5554;

    /**
     * ETRS89 / UTM zone 31N + NN2000 height
     * Extent: Norway - onshore - west of 6°E.
     * Scope: Topographic mapping.
     */
    public const EPSG_ETRS89_UTM_ZONE_31N_PLUS_NN2000_HEIGHT = 5971;

    /**
     * ETRS89 / UTM zone 31N + NN54 height
     * Extent: Norway - onshore - west of 6°E.
     * Scope: Topographic mapping.
     * Replaced by ETRS89 / UTM zone 31N + NN2000 height (compound CRS code 5971).
     */
    public const EPSG_ETRS89_UTM_ZONE_31N_PLUS_NN54_HEIGHT = 6171;

    /**
     * ETRS89 / UTM zone 32N + DHHN92 height
     * Extent: Germany - onshore between 6°E and 12°E.
     * Scope: Geological analysis.
     */
    public const EPSG_ETRS89_UTM_ZONE_32N_PLUS_DHHN92_HEIGHT = 5555;

    /**
     * ETRS89 / UTM zone 32N + DVR90 height
     * Extent: Denmark - onshore west of 12°E - Zealand, Jutland, Fuen and Lolland.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_ETRS89_UTM_ZONE_32N_PLUS_DVR90_HEIGHT = 7416;

    /**
     * ETRS89 / UTM zone 32N + NN2000 height
     * Extent: Norway - onshore - between 6°E and 12°E.
     * Scope: Topographic mapping.
     */
    public const EPSG_ETRS89_UTM_ZONE_32N_PLUS_NN2000_HEIGHT = 5972;

    /**
     * ETRS89 / UTM zone 32N + NN54 height
     * Extent: Norway - onshore - between 6°E and 12°E.
     * Scope: Topographic mapping.
     * Replaced by ETRS89 / UTM zone 32N + NN2000 height (compound CRS code 5972).
     */
    public const EPSG_ETRS89_UTM_ZONE_32N_PLUS_NN54_HEIGHT = 6172;

    /**
     * ETRS89 / UTM zone 33N + DHHN92 height
     * Extent: Germany - onshore east of 12°E.
     * Scope: Geological analysis.
     */
    public const EPSG_ETRS89_UTM_ZONE_33N_PLUS_DHHN92_HEIGHT = 5556;

    /**
     * ETRS89 / UTM zone 33N + DVR90 height
     * Extent: Denmark - onshore east of 12°E - Zealand and Falster, Bornholm.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_ETRS89_UTM_ZONE_33N_PLUS_DVR90_HEIGHT = 7417;

    /**
     * ETRS89 / UTM zone 33N + NN2000 height
     * Extent: Norway - onshore - between 12°E and 18°E.
     * Scope: Topographic mapping.
     */
    public const EPSG_ETRS89_UTM_ZONE_33N_PLUS_NN2000_HEIGHT = 5973;

    /**
     * ETRS89 / UTM zone 33N + NN54 height
     * Extent: Norway - onshore - between 12°E and 18°E.
     * Scope: Topographic mapping.
     * Replaced by ETRS89 / UTM zone 33N + NN2000 height (compound CRS code 5973).
     */
    public const EPSG_ETRS89_UTM_ZONE_33N_PLUS_NN54_HEIGHT = 6173;

    /**
     * ETRS89 / UTM zone 34N + NN2000 height
     * Extent: Norway - onshore - between 18°E and 24°E.
     * Scope: Topographic mapping.
     */
    public const EPSG_ETRS89_UTM_ZONE_34N_PLUS_NN2000_HEIGHT = 5974;

    /**
     * ETRS89 / UTM zone 34N + NN54 height
     * Extent: Norway - onshore - between 18°E and 24°E.
     * Scope: Topographic mapping.
     * Replaced by ETRS89 / UTM zone 34N + NN2000 height (compound CRS code 5974).
     */
    public const EPSG_ETRS89_UTM_ZONE_34N_PLUS_NN54_HEIGHT = 6174;

    /**
     * ETRS89 / UTM zone 35N + NN2000 height
     * Extent: Norway - onshore - between 24°E and 30°E.
     * Scope: Topographic mapping.
     */
    public const EPSG_ETRS89_UTM_ZONE_35N_PLUS_NN2000_HEIGHT = 5975;

    /**
     * ETRS89 / UTM zone 35N + NN54 height
     * Extent: Norway - onshore - between 24°E and 30°E.
     * Scope: Topographic mapping.
     * Replaced by ETRS89 / UTM zone 35N + NN2000 height (compound CRS code 5975).
     */
    public const EPSG_ETRS89_UTM_ZONE_35N_PLUS_NN54_HEIGHT = 6175;

    /**
     * ETRS89 / UTM zone 36N + NN2000 height
     * Extent: Norway - onshore - east of 30°E.
     * Scope: Topographic mapping.
     */
    public const EPSG_ETRS89_UTM_ZONE_36N_PLUS_NN2000_HEIGHT = 5976;

    /**
     * ETRS89 / UTM zone 36N + NN54 height
     * Extent: Norway - onshore - east of 30°E.
     * Scope: Topographic mapping.
     * Replaced by ETRS89 / UTM zone 36N + NN2000 height (compound CRS code 5976).
     */
    public const EPSG_ETRS89_UTM_ZONE_36N_PLUS_NN54_HEIGHT = 6176;

    /**
     * FEH2010 / Fehmarnbelt TM + FCSVR10 height
     * Extent: Fehmarnbelt area of Denmark and Germany.
     * Scope: Engineering survey and construction for Fehmarnbelt tunnel.
     */
    public const EPSG_FEH2010_FEHMARNBELT_TM_PLUS_FCSVR10_HEIGHT = 5598;

    /**
     * GBK19 Grid + ODN height
     * Extent: UK - on or related to the rail route from Glasgow via Barrhead to Kilmarnock and the branch to East
     * Kilbride.
     * Scope: Engineering survey and topographic mapping for railway applications.
     */
    public const EPSG_GBK19_GRID_PLUS_ODN_HEIGHT = 9457;

    /**
     * GDA2020 + AHD height
     * Extent: Australia - Australian Capital Territory, New South Wales, Northern Territory, Queensland, South
     * Australia, Tasmania, Western Australia and Victoria - onshore. Christmas Island - onshore. Cocos and Keeling
     * Islands - onshore.
     * Scope: Cadastre, engineering surveying applications over distances up to 10km.
     */
    public const EPSG_GDA2020_PLUS_AHD_HEIGHT = 9463;

    /**
     * GDA2020 + AVWS height
     * Extent: Australia including Lord Howe Island, Macquarie Islands, Ashmore and Cartier Islands, Christmas Island,
     * Cocos (Keeling) Islands, Norfolk Island. All onshore and offshore.
     * Scope: Location-based services, Intelligent Transport Services, navigation, positioning.
     */
    public const EPSG_GDA2020_PLUS_AVWS_HEIGHT = 9462;

    /**
     * GDA94 + AHD height
     * Extent: Australia - Australian Capital Territory, New South Wales, Northern Territory, Queensland, South
     * Australia, Tasmania, Western Australia and Victoria - onshore. Christmas Island - onshore. Cocos and Keeling
     * Islands - onshore.
     * Scope: Cadastre, engineering surveying applications over distances up to 10km.
     */
    public const EPSG_GDA94_PLUS_AHD_HEIGHT = 9464;

    /**
     * GR96 + GVR2000 height
     * Extent: Greenland - onshore and offshore between 59°N and 84°N and west of 10°W.
     * Scope: Topographic mapping.
     * Replaced by GR96 + GVR2016 height (CRS code 8350).
     */
    public const EPSG_GR96_PLUS_GVR2000_HEIGHT = 8349;

    /**
     * GR96 + GVR2016 height
     * Extent: Greenland - onshore and offshore between 58°N and 85°N and west of 7°W.
     * Scope: Topographic mapping.
     * Replaces GR96 + GVR2000 height (CRS code 8349).
     */
    public const EPSG_GR96_PLUS_GVR2016_HEIGHT = 8350;

    /**
     * HS2 Survey Grid + HS2-VRF height
     * Extent: UK - HS2 phases 1 and 2a railway corridor from London to Birmingham, Lichfield and Crewe.
     * Scope: Engineering survey for HS2 project phases 1 and 2a.
     * Realized by use of HS2TN15 transformation and HS2GM15 geoid model from ETRS89 OSNet v2009.
     */
    public const EPSG_HS2_SURVEY_GRID_PLUS_HS2_VRF_HEIGHT = 9306;

    /**
     * JGD2000 + JGD2000 (vertical) height
     * Extent: Japan - onshore mainland - Hokkaido, Honshu, Shikoku, Kyushu.
     * Scope: Engineering survey, topographic mapping.
     * Replaces Tokyo + JSLD69 height and Tokyo + JSLD72 height (CRS codes 7414 and 6700) from April 2002. Replaced by
     * JGD2011 + JGD2011 (vertical) height (CRS code 6697) with effect from 21st October 2011.
     */
    public const EPSG_JGD2000_PLUS_JGD2000_VERTICAL_HEIGHT = 6696;

    /**
     * JGD2011 + JGD2011 (vertical) height
     * Extent: Japan - onshore mainland - Hokkaido, Honshu, Shikoku, Kyushu.
     * Scope: Engineering survey, topographic mapping.
     * Replaces JGD2000 + JGD2000 (vertical) height (CRS code 6696) with effect from 21st October 2011.
     */
    public const EPSG_JGD2011_PLUS_JGD2011_VERTICAL_HEIGHT = 6697;

    /**
     * KKJ / Finland Uniform Coordinate System + N60 height
     * Extent: Finland - onshore.
     * Scope: Engineering survey, topographic mapping.
     * Replaced by ETRS89 / TM35FIN(N,E) + N60 height (CRS code 3902).
     */
    public const EPSG_KKJ_FINLAND_UNIFORM_COORDINATE_SYSTEM_PLUS_N60_HEIGHT = 3901;

    /**
     * MML07 Grid + ODN height
     * Extent: UK - on or related to the Midland Mainline rail route from Sheffield to London.
     * Scope: Engineering survey and topographic mapping for railway applications.
     */
    public const EPSG_MML07_GRID_PLUS_ODN_HEIGHT = 9374;

    /**
     * NAD27 + NGVD29 height (ftUS)
     * Extent: United States (USA) - CONUS onshore - Alabama; Arizona; Arkansas; California; Colorado; Connecticut;
     * Delaware; Florida; Georgia; Idaho; Illinois; Indiana; Iowa; Kansas; Kentucky; Louisiana; Maine; Maryland;
     * Massachusetts; Michigan; Minnesota; Mississippi; Missouri; Montana; Nebraska; Nevada; New Hampshire; New Jersey;
     * New Mexico; New York; North Carolina; North Dakota; Ohio; Oklahoma; Oregon; Pennsylvania; Rhode Island; South
     * Carolina; South Dakota; Tennessee; Texas; Utah; Vermont; Virginia; Washington; West Virginia; Wisconsin;
     * Wyoming.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD27_PLUS_NGVD29_HEIGHT_FTUS = 7406;

    /**
     * NAD27 / Texas North + NGVD29 height (ftUS)
     * Extent: United States (USA) - Texas - counties of: Armstrong; Briscoe; Carson; Castro; Childress; Collingsworth;
     * Dallam; Deaf Smith; Donley; Gray; Hall; Hansford; Hartley; Hemphill; Hutchinson; Lipscomb; Moore; Ochiltree;
     * Oldham; Parmer; Potter; Randall; Roberts; Sherman; Swisher; Wheeler.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD27_TEXAS_NORTH_PLUS_NGVD29_HEIGHT_FTUS = 7407;

    /**
     * NAD83 + NAVD88 height
     * Extent: United States (USA) -  CONUS and Alaska - onshore - Alabama; Alaska mainland; Arizona; Arkansas;
     * California; Colorado; Connecticut; Delaware; Florida; Georgia; Idaho; Illinois; Indiana; Iowa; Kansas; Kentucky;
     * Louisiana; Maine; Maryland; Massachusetts; Michigan; Minnesota; Mississippi; Missouri; Montana; Nebraska;
     * Nevada; New Hampshire; New Jersey; New Mexico; New York; North Carolina; North Dakota; Ohio; Oklahoma; Oregon;
     * Pennsylvania; Rhode Island; South Carolina; South Dakota; Tennessee; Texas; Utah; Vermont; Virginia; Washington;
     * West Virginia; Wisconsin; Wyoming.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_PLUS_NAVD88_HEIGHT = 5498;

    /**
     * NAD83 / Alabama East + NAVD88 height
     * Extent: United States (USA) - Alabama east of approximately 86°37'W - counties Barbour; Bullock; Calhoun;
     * Chambers; Cherokee; Clay; Cleburne; Coffee; Coosa; Covington; Crenshaw; Dale; De Kalb; Elmore; Etowah; Geneva;
     * Henry; Houston; Jackson; Lee; Macon; Madison; Marshall; Montgomery; Pike; Randolph; Russell; StClair; Talladega;
     * Tallapoosa.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_ALABAMA_EAST_PLUS_NAVD88_HEIGHT = 8801;

    /**
     * NAD83 / Alabama West + NAVD88 height
     * Extent: United States (USA) - Alabama west of approximately 86°37'W - counties Autauga; Baldwin; Bibb; Blount;
     * Butler; Chilton; Choctaw; Clarke; Colbert; Conecuh; Cullman; Dallas; Escambia; Fayette; Franklin; Greene; Hale;
     * Jefferson; Lamar; Lauderdale; Lawrence; Limestone; Lowndes; Marengo; Marion; Mobile; Monroe; Morgan; Perry;
     * Pickens; Shelby; Sumter; Tuscaloosa; Walker; Washington; Wilcox; Winston.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_ALABAMA_WEST_PLUS_NAVD88_HEIGHT = 8802;

    /**
     * NAD83 / Alaska zone 1 + NAVD88 height
     * Extent: United States (USA) - Alaska - east of 141°W; i.e. Panhandle.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_ALASKA_ZONE_1_PLUS_NAVD88_HEIGHT = 8803;

    /**
     * NAD83 / Alaska zone 10 + NAVD88 height
     * Extent: United States (USA) - Alaska - Aleutian Islands onshore.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_ALASKA_ZONE_10_PLUS_NAVD88_HEIGHT = 8812;

    /**
     * NAD83 / Alaska zone 2 + NAVD88 height
     * Extent: United States (USA) - Alaska - between 144°W and 141°W, onshore.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_ALASKA_ZONE_2_PLUS_NAVD88_HEIGHT = 8804;

    /**
     * NAD83 / Alaska zone 3 + NAVD88 height
     * Extent: United States (USA) - Alaska - between 148°W and 144°W.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_ALASKA_ZONE_3_PLUS_NAVD88_HEIGHT = 8805;

    /**
     * NAD83 / Alaska zone 4 + NAVD88 height
     * Extent: United States (USA) - Alaska - between 152°W and 148°W, onshore.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_ALASKA_ZONE_4_PLUS_NAVD88_HEIGHT = 8806;

    /**
     * NAD83 / Alaska zone 5 + NAVD88 height
     * Extent: United States (USA) - Alaska - between 156°W and 152°W.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_ALASKA_ZONE_5_PLUS_NAVD88_HEIGHT = 8807;

    /**
     * NAD83 / Alaska zone 6 + NAVD88 height
     * Extent: United States (USA) - Alaska - between 160°W and 156°W, onshore.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_ALASKA_ZONE_6_PLUS_NAVD88_HEIGHT = 8808;

    /**
     * NAD83 / Alaska zone 7 + NAVD88 height
     * Extent: United States (USA) - Alaska - between 164°W and 160°W, onshore.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_ALASKA_ZONE_7_PLUS_NAVD88_HEIGHT = 8809;

    /**
     * NAD83 / Alaska zone 8 + NAVD88 height
     * Extent: United States (USA) - Alaska onshore north of 54°30'N and between 168°W and 164°W.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_ALASKA_ZONE_8_PLUS_NAVD88_HEIGHT = 8810;

    /**
     * NAD83 / Alaska zone 9 + NAVD88 height
     * Extent: United States (USA) - Alaska onshore north of 54°30'N and west of 168°W.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_ALASKA_ZONE_9_PLUS_NAVD88_HEIGHT = 8811;

    /**
     * NAD83 / Arizona Central (ft) + NAVD88 height (ft)
     * Extent: United States (USA) - Arizona - counties Coconino; Maricopa; Pima; Pinal; Santa Cruz; Yavapai.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_ARIZONA_CENTRAL_FT_PLUS_NAVD88_HEIGHT_FT = 8701;

    /**
     * NAD83 / Arizona East (ft) + NAVD88 height (ft)
     * Extent: United States (USA) - Arizona - counties Apache; Cochise; Gila; Graham; Greenlee; Navajo.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_ARIZONA_EAST_FT_PLUS_NAVD88_HEIGHT_FT = 8700;

    /**
     * NAD83 / Arizona West (ft) + NAVD88 height (ft)
     * Extent: United States (USA) - Arizona - counties of La Paz; Mohave; Yuma.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_ARIZONA_WEST_FT_PLUS_NAVD88_HEIGHT_FT = 8702;

    /**
     * NAD83 / Arkansas North (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Arkansas - counties of Baxter; Benton; Boone; Carroll; Clay; Cleburne; Conway;
     * Craighead; Crawford; Crittenden; Cross; Faulkner; Franklin; Fulton; Greene; Independence; Izard; Jackson;
     * Johnson; Lawrence; Logan; Madison; Marion; Mississippi; Newton; Perry; Poinsett; Pope; Randolph; Scott; Searcy;
     * Sebastian; Sharp; St Francis; Stone; Van Buren; Washington; White; Woodruff; Yell.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_ARKANSAS_NORTH_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 8712;

    /**
     * NAD83 / Arkansas South (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Arkansas - counties Arkansas; Ashley; Bradley; Calhoun; Chicot; Clark; Cleveland;
     * Columbia; Dallas; Desha; Drew; Garland; Grant; Hempstead; Hot Spring; Howard; Jefferson; Lafayette; Lee;
     * Lincoln; Little River; Lonoke; Miller; Monroe; Montgomery; Nevada; Ouachita; Phillips; Pike; Polk; Prairie;
     * Pulaski; Saline; Sevier; Union.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_ARKANSAS_SOUTH_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 8713;

    /**
     * NAD83 / California zone 1 (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - California - counties Del Norte; Humboldt; Lassen; Modoc; Plumas; Shasta;
     * Siskiyou; Tehama; Trinity.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_CALIFORNIA_ZONE_1_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 8714;

    /**
     * NAD83 / California zone 2 (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - California - counties of Alpine; Amador; Butte; Colusa; El Dorado; Glenn; Lake;
     * Mendocino; Napa; Nevada; Placer; Sacramento; Sierra; Solano; Sonoma; Sutter; Yolo; Yuba.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_CALIFORNIA_ZONE_2_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 8715;

    /**
     * NAD83 / California zone 3 (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - California - counties Alameda; Calaveras; Contra Costa; Madera; Marin; Mariposa;
     * Merced; Mono; San Francisco; San Joaquin; San Mateo; Santa Clara; Santa Cruz; Stanislaus; Tuolumne.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_CALIFORNIA_ZONE_3_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 8716;

    /**
     * NAD83 / California zone 4 (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - California - counties Fresno; Inyo; Kings; Monterey; San Benito; Tulare.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_CALIFORNIA_ZONE_4_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 8717;

    /**
     * NAD83 / California zone 5 (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - California - counties Kern; Los Angeles; San Bernardino; San Luis Obispo; Santa
     * Barbara; Ventura.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_CALIFORNIA_ZONE_5_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 8718;

    /**
     * NAD83 / California zone 6 (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - California - counties Imperial; Orange; Riverside; San Diego.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_CALIFORNIA_ZONE_6_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 8719;

    /**
     * NAD83 / Colorado Central (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Colorado - counties Arapahoe; Chaffee; Cheyenne; Clear Creek; Delta; Denver;
     * Douglas; Eagle; El Paso; Elbert; Fremont; Garfield; Gunnison; Jefferson; Kit Carson; Lake; Lincoln; Mesa; Park;
     * Pitkin; Summit; Teller.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_COLORADO_CENTRAL_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 8721;

    /**
     * NAD83 / Colorado North (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Colorado - counties Adams; Boulder; Gilpin; Grand; Jackson; Larimer; Logan;
     * Moffat; Morgan; Phillips; Rio Blanco; Routt; Sedgwick; Washington; Weld; Yuma.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_COLORADO_NORTH_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 8720;

    /**
     * NAD83 / Colorado South (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Colorado - counties Alamosa; Archuleta; Baca; Bent; Conejos; Costilla; Crowley;
     * Custer; Dolores; Hinsdale; Huerfano; Kiowa; La Plata; Las Animas; Mineral; Montezuma; Montrose; Otero; Ouray;
     * Prowers; Pueblo; Rio Grande; Saguache; San Juan; San Miguel.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_COLORADO_SOUTH_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 8722;

    /**
     * NAD83 / Connecticut (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Connecticut - counties of Fairfield; Hartford; Litchfield; Middlesex; New Haven;
     * New London; Tolland; Windham.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_CONNECTICUT_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 8723;

    /**
     * NAD83 / Delaware (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Delaware - counties of Kent; New Castle; Sussex.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_DELAWARE_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 8724;

    /**
     * NAD83 / Florida East (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Florida - counties of Brevard; Broward; Clay; Collier; Dade; Duval; Flagler;
     * Glades; Hendry; Highlands; Indian River; Lake; Martin; Monroe; Nassau; Okeechobee; Orange; Osceola; Palm Beach;
     * Putnam; Seminole; St Johns; St Lucie; Volusia.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_FLORIDA_EAST_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 8726;

    /**
     * NAD83 / Florida North (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Florida - counties of Alachua; Baker; Bay; Bradford; Calhoun; Columbia; Dixie;
     * Escambia; Franklin; Gadsden; Gilchrist; Gulf; Hamilton; Holmes; Jackson; Jefferson; Lafayette; Leon; Liberty;
     * Madison; Okaloosa; Santa Rosa; Suwannee; Taylor; Union; Wakulla; Walton; Washington.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_FLORIDA_NORTH_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 8725;

    /**
     * NAD83 / Florida West (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Florida - counties of Charlotte; Citrus; De Soto; Hardee; Hernando; Hillsborough;
     * Lee; Levy; Manatee; Marion; Pasco; Pinellas; Polk; Sarasota; Sumter.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_FLORIDA_WEST_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 8727;

    /**
     * NAD83 / Georgia East (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Georgia - counties of Appling; Atkinson; Bacon; Baldwin; Brantley; Bryan; Bulloch;
     * Burke; Camden; Candler; Charlton; Chatham; Clinch; Coffee; Columbia; Dodge; Echols; Effingham; Elbert; Emanuel;
     * Evans; Franklin; Glascock; Glynn; Greene; Hancock; Hart; Jeff Davis; Jefferson; Jenkins; Johnson; Lanier;
     * Laurens; Liberty; Lincoln; Long; Madison; McDuffie; McIntosh; Montgomery; Oglethorpe; Pierce; Richmond; Screven;
     * Stephens; Taliaferro; Tattnall; Telfair; Toombs; Treutlen; Ware; Warren; Washington; Wayne; Wheeler; Wilkes;
     * Wilkinson.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_GEORGIA_EAST_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 8728;

    /**
     * NAD83 / Georgia West (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Georgia - counties of Baker; Banks; Barrow; Bartow; Ben Hill; Berrien; Bibb;
     * Bleckley; Brooks; Butts; Calhoun; Carroll; Catoosa; Chattahoochee; Chattooga; Cherokee; Clarke; Clay; Clayton;
     * Cobb; Colquitt; Cook; Coweta; Crawford; Crisp; Dade; Dawson; De Kalb; Decatur; Dooly; Dougherty; Douglas; Early;
     * Fannin; Fayette; Floyd; Forsyth; Fulton; Gilmer; Gordon; Grady; Gwinnett; Habersham; Hall; Haralson; Harris;
     * Heard; Henry; Houston; Irwin; Jackson; Jasper; Jones; Lamar; Lee; Lowndes; Lumpkin; Macon; Marion; Meriwether;
     * Miller; Mitchell; Monroe; Morgan; Murray; Muscogee; Newton; Oconee; Paulding; Peach; Pickens; Pike; Polk;
     * Pulaski; Putnam; Quitman; Rabun; Randolph; Rockdale; Schley; Seminole; Spalding; Stewart; Sumter; Talbot;
     * Taylor; Terrell; Thomas; Tift; Towns; Troup; Turner; Twiggs; Union; Upson; Walker; Walton; Webster; White;
     * Whitfield; Wilcox; Worth.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_GEORGIA_WEST_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 8729;

    /**
     * NAD83 / Idaho Central (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Idaho - counties of Blaine; Butte; Camas; Cassia; Custer; Gooding; Jerome; Lemhi;
     * Lincoln; Minidoka; Twin Falls.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_IDAHO_CENTRAL_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 8731;

    /**
     * NAD83 / Idaho East (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Idaho - counties of Bannock; Bear Lake; Bingham; Bonneville; Caribou; Clark;
     * Franklin; Fremont; Jefferson; Madison; Oneida; Power; Teton.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_IDAHO_EAST_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 8730;

    /**
     * NAD83 / Idaho West (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Idaho - counties of Ada; Adams; Benewah; Boise; Bonner; Boundary; Canyon;
     * Clearwater; Elmore; Gem; Idaho; Kootenai; Latah; Lewis; Nez Perce; Owyhee; Payette; Shoshone; Valley;
     * Washington.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_IDAHO_WEST_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 8732;

    /**
     * NAD83 / Illinois East (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Illinois - counties of Boone; Champaign; Clark; Clay; Coles; Cook; Crawford;
     * Cumberland; De Kalb; De Witt; Douglas; Du Page; Edgar; Edwards; Effingham; Fayette; Ford; Franklin; Gallatin;
     * Grundy; Hamilton; Hardin; Iroquois; Jasper; Jefferson; Johnson; Kane; Kankakee; Kendall; La Salle; Lake;
     * Lawrence; Livingston; Macon; Marion; Massac; McHenry; McLean; Moultrie; Piatt; Pope; Richland; Saline; Shelby;
     * Vermilion; Wabash; Wayne; White; Will; Williamson.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_ILLINOIS_EAST_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 8733;

    /**
     * NAD83 / Illinois West (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Illinois - counties of Adams; Alexander; Bond; Brown; Bureau; Calhoun; Carroll;
     * Cass; Christian; Clinton; Fulton; Greene; Hancock; Henderson; Henry; Jackson; Jersey; Jo Daviess; Knox; Lee;
     * Logan; Macoupin; Madison; Marshall; Mason; McDonough; Menard; Mercer; Monroe; Montgomery; Morgan; Ogle; Peoria;
     * Perry; Pike; Pulaski; Putnam; Randolph; Rock Island; Sangamon; Schuyler; Scott; St Clair; Stark; Stephenson;
     * Tazewell; Union; Warren; Washington; Whiteside; Winnebago; Woodford.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_ILLINOIS_WEST_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 8734;

    /**
     * NAD83 / Indiana East (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Indiana - counties of Adams; Allen; Bartholomew; Blackford; Brown; Cass; Clark; De
     * Kalb; Dearborn; Decatur; Delaware; Elkhart; Fayette; Floyd; Franklin; Fulton; Grant; Hamilton; Hancock;
     * Harrison; Henry; Howard; Huntington; Jackson; Jay; Jefferson; Jennings; Johnson; Kosciusko; Lagrange; Madison;
     * Marion; Marshall; Miami; Noble; Ohio; Randolph; Ripley; Rush; Scott; Shelby; St Joseph; Steuben; Switzerland;
     * Tipton; Union; Wabash; Washington; Wayne; Wells; Whitley.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_INDIANA_EAST_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 8735;

    /**
     * NAD83 / Indiana West (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Indiana - counties of Benton; Boone; Carroll; Clay; Clinton; Crawford; Daviess;
     * Dubois; Fountain; Gibson; Greene; Hendricks; Jasper; Knox; La Porte; Lake; Lawrence; Martin; Monroe; Montgomery;
     * Morgan; Newton; Orange; Owen; Parke; Perry; Pike; Porter; Posey; Pulaski; Putnam; Spencer; Starke; Sullivan;
     * Tippecanoe; Vanderburgh; Vermillion; Vigo; Warren; Warrick; White.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_INDIANA_WEST_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 8736;

    /**
     * NAD83 / Iowa North (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Iowa - counties of Allamakee; Benton; Black Hawk; Boone; Bremer; Buchanan; Buena
     * Vista; Butler; Calhoun; Carroll; Cerro Gordo; Cherokee; Chickasaw; Clay; Clayton; Crawford; Delaware; Dickinson;
     * Dubuque; Emmet; Fayette; Floyd; Franklin; Greene; Grundy; Hamilton; Hancock; Hardin; Howard; Humboldt; Ida;
     * Jackson; Jones; Kossuth; Linn; Lyon; Marshall; Mitchell; Monona; O'Brien; Osceola; Palo Alto; Plymouth;
     * Pocahontas; Sac; Sioux; Story; Tama; Webster; Winnebago; Winneshiek; Woodbury; Worth; Wright.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_IOWA_NORTH_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 8737;

    /**
     * NAD83 / Iowa South (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Iowa - counties of Adair; Adams; Appanoose; Audubon; Cass; Cedar; Clarke; Clinton;
     * Dallas; Davis; Decatur; Des Moines; Fremont; Guthrie; Harrison; Henry; Iowa; Jasper; Jefferson; Johnson; Keokuk;
     * Lee; Louisa; Lucas; Madison; Mahaska; Marion; Mills; Monroe; Montgomery; Muscatine; Page; Polk; Pottawattamie;
     * Poweshiek; Ringgold; Scott; Shelby; Taylor; Union; Van Buren; Wapello; Warren; Washington; Wayne.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_IOWA_SOUTH_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 8738;

    /**
     * NAD83 / Kansas North (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Kansas - counties of Atchison; Brown; Cheyenne; Clay; Cloud; Decatur; Dickinson;
     * Doniphan; Douglas; Ellis; Ellsworth; Geary; Gove; Graham; Jackson; Jefferson; Jewell; Johnson; Leavenworth;
     * Lincoln; Logan; Marshall; Mitchell; Morris; Nemaha; Norton; Osborne; Ottawa; Phillips; Pottawatomie; Rawlins;
     * Republic; Riley; Rooks; Russell; Saline; Shawnee; Sheridan; Sherman; Smith; Thomas; Trego; Wabaunsee; Wallace;
     * Washington; Wyandotte.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_KANSAS_NORTH_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 8739;

    /**
     * NAD83 / Kansas South (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Kansas - counties of Allen; Anderson; Barber; Barton; Bourbon; Butler; Chase;
     * Chautauqua; Cherokee; Clark; Coffey; Comanche; Cowley; Crawford; Edwards; Elk; Finney; Ford; Franklin; Grant;
     * Gray; Greeley; Greenwood; Hamilton; Harper; Harvey; Haskell; Hodgeman; Kearny; Kingman; Kiowa; Labette; Lane;
     * Linn; Lyon; Marion; McPherson; Meade; Miami; Montgomery; Morton; Neosho; Ness; Osage; Pawnee; Pratt; Reno; Rice;
     * Rush; Scott; Sedgwick; Seward; Stafford; Stanton; Stevens; Sumner; Wichita; Wilson; Woodson.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_KANSAS_SOUTH_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 8740;

    /**
     * NAD83 / Kentucky North (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Kentucky - counties of Anderson; Bath; Boone; Bourbon; Boyd; Bracken; Bullitt;
     * Campbell; Carroll; Carter; Clark; Elliott; Fayette; Fleming; Franklin; Gallatin; Grant; Greenup; Harrison;
     * Henry; Jefferson; Jessamine; Kenton; Lawrence; Lewis; Mason; Menifee; Montgomery; Morgan; Nicholas; Oldham;
     * Owen; Pendleton; Robertson; Rowan; Scott; Shelby; Spencer; Trimble; Woodford.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_KENTUCKY_NORTH_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 8741;

    /**
     * NAD83 / Kentucky South (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Kentucky - counties of Adair; Allen; Ballard; Barren; Bell; Boyle; Breathitt;
     * Breckinridge; Butler; Caldwell; Calloway; Carlisle; Casey; Christian; Clay; Clinton; Crittenden; Cumberland;
     * Daviess; Edmonson; Estill; Floyd; Fulton; Garrard; Graves; Grayson; Green; Hancock; Hardin; Harlan; Hart;
     * Henderson; Hickman; Hopkins; Jackson; Johnson; Knott; Knox; Larue; Laurel; Lee; Leslie; Letcher; Lincoln;
     * Livingston; Logan; Lyon; Madison; Magoffin; Marion; Marshall; Martin; McCracken; McCreary; McLean; Meade;
     * Mercer; Metcalfe; Monroe; Muhlenberg; Nelson; Ohio; Owsley; Perry; Pike; Powell; Pulaski; Rockcastle; Russell;
     * Simpson; Taylor; Todd; Trigg; Union; Warren; Washington; Wayne; Webster; Whitley; Wolfe.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_KENTUCKY_SOUTH_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 8742;

    /**
     * NAD83 / Louisiana North (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Louisiana - counties of Avoyelles; Bienville; Bossier; Caddo; Caldwell; Catahoula;
     * Claiborne; Concordia; De Soto; East Carroll; Franklin; Grant; Jackson; La Salle; Lincoln; Madison; Morehouse;
     * Natchitoches; Ouachita; Rapides; Red River; Richland; Sabine; Tensas; Union; Vernon; Webster; West Carroll;
     * Winn.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_LOUISIANA_NORTH_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 8743;

    /**
     * NAD83 / Louisiana South (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Louisiana - counties of Acadia; Allen; Ascension; Assumption; Beauregard;
     * Calcasieu; Cameron; East Baton Rouge; East Feliciana; Evangeline; Iberia; Iberville; Jefferson; Jefferson Davis;
     * Lafayette; LaFourche; Livingston; Orleans; Plaquemines; Pointe Coupee; St Bernard; St Charles; St Helena; St
     * James; St John the Baptist; St Landry; St Martin; St Mary; St Tammany; Tangipahoa; Terrebonne; Vermilion;
     * Washington; West Baton Rouge; West Feliciana.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_LOUISIANA_SOUTH_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 8744;

    /**
     * NAD83 / Maine East (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Maine - counties of Aroostook; Hancock; Knox; Penobscot; Piscataquis; Waldo;
     * Washington.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_MAINE_EAST_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 8745;

    /**
     * NAD83 / Maine West (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Maine - counties of Androscoggin; Cumberland; Franklin; Kennebec; Lincoln; Oxford;
     * Sagadahoc; Somerset; York.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_MAINE_WEST_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 8746;

    /**
     * NAD83 / Maryland (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Maryland - counties of Allegany; Anne Arundel; Baltimore; Calvert; Caroline;
     * Carroll; Cecil; Charles; Dorchester; Frederick; Garrett; Harford; Howard; Kent; Montgomery; Prince Georges;
     * Queen Annes; Somerset; St Marys; Talbot; Washington; Wicomico; Worcester.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_MARYLAND_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 8747;

    /**
     * NAD83 / Massachusetts Island (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Massachusetts offshore - counties of Dukes; Nantucket.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_MASSACHUSETTS_ISLAND_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 8749;

    /**
     * NAD83 / Massachusetts Mainland (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Massachusetts onshore - counties of Barnstable; Berkshire; Bristol; Essex;
     * Franklin; Hampden; Hampshire; Middlesex; Norfolk; Plymouth; Suffolk; Worcester.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_MASSACHUSETTS_MAINLAND_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 8748;

    /**
     * NAD83 / Michigan Central (ft) + NAVD88 height (ft)
     * Extent: United States (USA) - Michigan - counties of Alcona; Alpena; Antrim; Arenac; Benzie; Charlevoix;
     * Cheboygan; Clare; Crawford; Emmet; Gladwin; Grand Traverse; Iosco; Kalkaska; Lake; Leelanau; Manistee; Mason;
     * Missaukee; Montmorency; Ogemaw; Osceola; Oscoda; Otsego; Presque Isle; Roscommon; Wexford.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_MICHIGAN_CENTRAL_FT_PLUS_NAVD88_HEIGHT_FT = 8704;

    /**
     * NAD83 / Michigan North (ft) + NAVD88 height (ft)
     * Extent: United States (USA) - Michigan north of approximately 45°45'N - counties of Alger; Baraga; Chippewa;
     * Delta; Dickinson; Gogebic; Houghton; Iron; Keweenaw; Luce; Mackinac; Marquette; Menominee; Ontonagon;
     * Schoolcraft.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_MICHIGAN_NORTH_FT_PLUS_NAVD88_HEIGHT_FT = 8703;

    /**
     * NAD83 / Michigan South (ft) + NAVD88 height (ft)
     * Extent: United States (USA) - Michigan - counties of Allegan; Barry; Bay; Berrien; Branch; Calhoun; Cass;
     * Clinton; Eaton; Genesee; Gratiot; Hillsdale; Huron; Ingham; Ionia; Isabella; Jackson; Kalamazoo; Kent; Lapeer;
     * Lenawee; Livingston; Macomb; Mecosta; Midland; Monroe; Montcalm; Muskegon; Newaygo; Oakland; Oceana; Ottawa;
     * Saginaw; Sanilac; Shiawassee; St Clair; St Joseph; Tuscola; Van Buren; Washtenaw; Wayne.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_MICHIGAN_SOUTH_FT_PLUS_NAVD88_HEIGHT_FT = 8705;

    /**
     * NAD83 / Minnesota Central (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Minnesota - counties of Aitkin; Becker; Benton; Carlton; Cass; Chisago; Clay; Crow
     * Wing; Douglas; Grant; Hubbard; Isanti; Kanabec; Mille Lacs; Morrison; Otter Tail; Pine; Pope; Stearns; Stevens;
     * Todd; Traverse; Wadena; Wilkin.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_MINNESOTA_CENTRAL_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 8751;

    /**
     * NAD83 / Minnesota North (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Minnesota - counties of Beltrami; Clearwater; Cook; Itasca; Kittson; Koochiching;
     * Lake; Lake of the Woods; Mahnomen; Marshall; Norman; Pennington; Polk; Red Lake; Roseau; St Louis.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_MINNESOTA_NORTH_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 8750;

    /**
     * NAD83 / Minnesota South (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Minnesota - counties of Anoka; Big Stone; Blue Earth; Brown; Carver; Chippewa;
     * Cottonwood; Dakota; Dodge; Faribault; Fillmore; Freeborn; Goodhue; Hennepin; Houston; Jackson; Kandiyohi; Lac
     * Qui Parle; Le Sueur; Lincoln; Lyon; Martin; McLeod; Meeker; Mower; Murray; Nicollet; Nobles; Olmsted; Pipestone;
     * Ramsey; Redwood; Renville; Rice; Rock; Scott; Sherburne; Sibley; Steele; Swift; Wabasha; Waseca; Washington;
     * Watonwan; Winona; Wright; Yellow Medicine.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_MINNESOTA_SOUTH_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 8752;

    /**
     * NAD83 / Mississippi East (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Mississippi - counties of Alcorn; Attala; Benton; Calhoun; Chickasaw; Choctaw;
     * Clarke; Clay; Covington; Forrest; George; Greene; Hancock; Harrison; Itawamba; Jackson; Jasper; Jones; Kemper;
     * Lafayette; Lamar; Lauderdale; Leake; Lee; Lowndes; Marshall; Monroe; Neshoba; Newton; Noxubee; Oktibbeha; Pearl
     * River; Perry; Pontotoc; Prentiss; Scott; Smith; Stone; Tippah; Tishomingo; Union; Wayne; Webster; Winston.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_MISSISSIPPI_EAST_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 8753;

    /**
     * NAD83 / Mississippi West (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Mississippi - counties of Adams; Amite; Bolivar; Carroll; Claiborne; Coahoma;
     * Copiah; De Soto; Franklin; Grenada; Hinds; Holmes; Humphreys; Issaquena; Jefferson; Jefferson Davis; Lawrence;
     * Leflore; Lincoln; Madison; Marion; Montgomery; Panola; Pike; Quitman; Rankin; Sharkey; Simpson; Sunflower;
     * Tallahatchie; Tate; Tunica; Walthall; Warren; Washington; Wilkinson; Yalobusha; Yazoo.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_MISSISSIPPI_WEST_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 8754;

    /**
     * NAD83 / Missouri Central + NAVD88 height
     * Extent: United States (USA) - Missouri - counties of Adair; Audrain; Benton; Boone; Callaway; Camden; Carroll;
     * Chariton; Christian; Cole; Cooper; Dallas; Douglas; Greene; Grundy; Hickory; Howard; Howell; Knox; Laclede;
     * Linn; Livingston; Macon; Maries; Mercer; Miller; Moniteau; Monroe; Morgan; Osage; Ozark; Pettis; Phelps; Polk;
     * Pulaski; Putnam; Randolph; Saline; Schuyler; Scotland; Shelby; Stone; Sullivan; Taney; Texas; Webster; Wright.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_MISSOURI_CENTRAL_PLUS_NAVD88_HEIGHT = 8814;

    /**
     * NAD83 / Missouri East + NAVD88 height
     * Extent: United States (USA) - Missouri - counties of Bollinger; Butler; Cape Girardeau; Carter; Clark; Crawford;
     * Dent; Dunklin; Franklin; Gasconade; Iron; Jefferson; Lewis; Lincoln; Madison; Marion; Mississippi; Montgomery;
     * New Madrid; Oregon; Pemiscot; Perry; Pike; Ralls; Reynolds; Ripley; Scott; Shannon; St Charles; St Francois; St
     * Louis; Ste. Genevieve; Stoddard; Warren; Washington; Wayne.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_MISSOURI_EAST_PLUS_NAVD88_HEIGHT = 8813;

    /**
     * NAD83 / Missouri West + NAVD88 height
     * Extent: United States (USA) - Missouri - counties of Andrew; Atchison; Barry; Barton; Bates; Buchanan; Caldwell;
     * Cass; Cedar; Clay; Clinton; Dade; Daviess; De Kalb; Gentry; Harrison; Henry; Holt; Jackson; Jasper; Johnson;
     * Lafayette; Lawrence; McDonald; Newton; Nodaway; Platte; Ray; St Clair; Vernon; Worth.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_MISSOURI_WEST_PLUS_NAVD88_HEIGHT = 8815;

    /**
     * NAD83 / Montana (ft) + NAVD88 height (ft)
     * Extent: United States (USA) - Montana - counties of Beaverhead; Big Horn; Blaine; Broadwater; Carbon; Carter;
     * Cascade; Chouteau; Custer; Daniels; Dawson; Deer Lodge; Fallon; Fergus; Flathead; Gallatin; Garfield; Glacier;
     * Golden Valley; Granite; Hill; Jefferson; Judith Basin; Lake; Lewis and Clark; Liberty; Lincoln; Madison; McCone;
     * Meagher; Mineral; Missoula; Musselshell; Park; Petroleum; Phillips; Pondera; Powder River; Powell; Prairie;
     * Ravalli; Richland; Roosevelt; Rosebud; Sanders; Sheridan; Silver Bow; Stillwater; Sweet Grass; Teton; Toole;
     * Treasure; Valley; Wheatland; Wibaux; Yellowstone.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_MONTANA_FT_PLUS_NAVD88_HEIGHT_FT = 8706;

    /**
     * NAD83 / Nebraska (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Nebraska - counties of Adams; Antelope; Arthur; Banner; Blaine; Boone; Box Butte;
     * Boyd; Brown; Buffalo; Burt; Butler; Cass; Cedar; Chase; Cherry; Cheyenne; Clay; Colfax; Cuming; Custer; Dakota;
     * Dawes; Dawson; Deuel; Dixon; Dodge; Douglas; Dundy; Fillmore; Franklin; Frontier; Furnas; Gage; Garden;
     * Garfield; Gosper; Grant; Greeley; Hall; Hamilton; Harlan; Hayes; Hitchcock; Holt; Hooker; Howard; Jefferson;
     * Johnson; Kearney; Keith; Keya Paha; Kimball; Knox; Lancaster; Lincoln; Logan; Loup; Madison; McPherson; Merrick;
     * Morrill; Nance; Nemaha; Nuckolls; Otoe; Pawnee; Perkins; Phelps; Pierce; Platte; Polk; Red Willow; Richardson;
     * Rock; Saline; Sarpy; Saunders; Scotts Bluff; Seward; Sheridan; Sherman; Sioux; Stanton; Thayer; Thomas;
     * Thurston; Valley; Washington; Wayne; Webster; Wheeler; York.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_NEBRASKA_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 8755;

    /**
     * NAD83 / Nevada Central (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Nevada - counties of Lander; Nye.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_NEVADA_CENTRAL_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 8757;

    /**
     * NAD83 / Nevada East (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Nevada - counties of Clark; Elko; Eureka; Lincoln; White Pine.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_NEVADA_EAST_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 8756;

    /**
     * NAD83 / Nevada West (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Nevada - counties of Churchill; Douglas; Esmeralda; Humboldt; Lyon; Mineral;
     * Pershing; Storey; Washoe.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_NEVADA_WEST_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 8758;

    /**
     * NAD83 / New Hampshire (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - New Hampshire - counties of Belknap; Carroll; Cheshire; Coos; Grafton;
     * Hillsborough; Merrimack; Rockingham; Strafford; Sullivan.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_NEW_HAMPSHIRE_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 8759;

    /**
     * NAD83 / New Jersey (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - New Jersey - counties of Atlantic; Bergen; Burlington; Camden; Cape May;
     * Cumberland; Essex; Gloucester; Hudson; Hunterdon; Mercer; Middlesex; Monmouth; Morris; Ocean; Passaic; Salem;
     * Somerset; Sussex; Union; Warren.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_NEW_JERSEY_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 8760;

    /**
     * NAD83 / New Mexico Central (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - New Mexico - counties of Bernalillo; Dona Ana; Lincoln; Los Alamos; Otero; Rio
     * Arriba; Sandoval; Santa Fe; Socorro; Taos; Torrance; Valencia.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_NEW_MEXICO_CENTRAL_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 8762;

    /**
     * NAD83 / New Mexico East (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - New Mexico - counties of Chaves; Colfax; Curry; De Baca; Eddy; Guadalupe; Harding;
     * Lea; Mora; Quay; Roosevelt; San Miguel; Union.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_NEW_MEXICO_EAST_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 8761;

    /**
     * NAD83 / New Mexico West (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - New Mexico - counties of Catron; Cibola; Grant; Hidalgo; Luna; McKinley; San Juan;
     * Sierra.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_NEW_MEXICO_WEST_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 8763;

    /**
     * NAD83 / New York Central (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - New York - counties of Broome; Cayuga; Chemung; Chenango; Cortland; Jefferson;
     * Lewis; Madison; Oneida; Onondaga; Ontario; Oswego; Schuyler; Seneca; Steuben; Tioga; Tompkins; Wayne; Yates.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_NEW_YORK_CENTRAL_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 8765;

    /**
     * NAD83 / New York East (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - New York mainland - counties of Albany; Clinton; Columbia; Delaware; Dutchess;
     * Essex; Franklin; Fulton; Greene; Hamilton; Herkimer; Montgomery; Orange; Otsego; Putnam; Rensselaer; Rockland;
     * Saratoga; Schenectady; Schoharie; St Lawrence; Sullivan; Ulster; Warren; Washington; Westchester.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_NEW_YORK_EAST_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 8764;

    /**
     * NAD83 / New York Long Island (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - New York - counties of Bronx; Kings; Nassau; New York; Queens; Richmond; Suffolk.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_NEW_YORK_LONG_ISLAND_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 8767;

    /**
     * NAD83 / New York West (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - New York - counties of Allegany; Cattaraugus; Chautauqua; Erie; Genesee;
     * Livingston; Monroe; Niagara; Orleans; Wyoming.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_NEW_YORK_WEST_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 8766;

    /**
     * NAD83 / North Carolina (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - North Carolina - counties of Alamance; Alexander; Alleghany; Anson; Ashe; Avery;
     * Beaufort; Bertie; Bladen; Brunswick; Buncombe; Burke; Cabarrus; Caldwell; Camden; Carteret; Caswell; Catawba;
     * Chatham; Cherokee; Chowan; Clay; Cleveland; Columbus; Craven; Cumberland; Currituck; Dare; Davidson; Davie;
     * Duplin; Durham; Edgecombe; Forsyth; Franklin; Gaston; Gates; Graham; Granville; Greene; Guilford; Halifax;
     * Harnett; Haywood; Henderson; Hertford; Hoke; Hyde; Iredell; Jackson; Johnston; Jones; Lee; Lenoir; Lincoln;
     * Macon; Madison; Martin; McDowell; Mecklenburg; Mitchell; Montgomery; Moore; Nash; New Hanover; Northampton;
     * Onslow; Orange; Pamlico; Pasquotank; Pender; Perquimans; Person; Pitt; Polk; Randolph; Richmond; Robeson;
     * Rockingham; Rowan; Rutherford; Sampson; Scotland; Stanly; Stokes; Surry; Swain; Transylvania; Tyrrell; Union;
     * Vance; Wake; Warren; Washington; Watauga; Wayne; Wilkes; Wilson; Yadkin; Yancey.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_NORTH_CAROLINA_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 8768;

    /**
     * NAD83 / North Dakota North (ft) + NAVD88 height (ft)
     * Extent: United States (USA) - North Dakota - counties of Benson; Bottineau; Burke; Cavalier; Divide; Eddy;
     * Foster; Grand Forks; Griggs; McHenry; McKenzie; McLean; Mountrial; Nelson; Pembina; Pierce; Ramsey; Renville;
     * Rolette; Sheridan; Steele; Towner; Traill; Walsh; Ward; Wells; Williams.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_NORTH_DAKOTA_NORTH_FT_PLUS_NAVD88_HEIGHT_FT = 8707;

    /**
     * NAD83 / North Dakota South (ft) + NAVD88 height (ft)
     * Extent: United States (USA) - North Dakota - counties of Adams; Barnes; Billings; Bowman; Burleigh; Cass;
     * Dickey; Dunn; Emmons; Golden Valley; Grant; Hettinger; Kidder; La Moure; Logan; McIntosh; Mercer; Morton;
     * Oliver; Ransom; Richland; Sargent; Sioux; Slope; Stark; Stutsman.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_NORTH_DAKOTA_SOUTH_FT_PLUS_NAVD88_HEIGHT_FT = 8708;

    /**
     * NAD83 / Ohio North (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Ohio - counties of Allen;Ashland; Ashtabula; Auglaize; Carroll; Columbiana;
     * Coshocton; Crawford; Cuyahoga; Defiance; Delaware; Erie; Fulton; Geauga; Hancock; Hardin; Harrison; Henry;
     * Holmes; Huron; Jefferson; Knox; Lake; Logan; Lorain; Lucas; Mahoning; Marion; Medina; Mercer; Morrow; Ottawa;
     * Paulding; Portage; Putnam; Richland; Sandusky; Seneca; Shelby; Stark; Summit; Trumbull; Tuscarawas; Union; Van
     * Wert; Wayne; Williams; Wood; Wyandot.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_OHIO_NORTH_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 8769;

    /**
     * NAD83 / Ohio South (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Ohio - counties of Adams; Athens; Belmont; Brown; Butler; Champaign; Clark;
     * Clermont; Clinton; Darke; Fairfield; Fayette; Franklin; Gallia; Greene; Guernsey; Hamilton; Highland; Hocking;
     * Jackson; Lawrence; Licking; Madison; Meigs; Miami; Monroe; Montgomery; Morgan; Muskingum; Noble; Perry;
     * Pickaway; Pike; Preble; Ross; Scioto; Vinton; Warren; Washington.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_OHIO_SOUTH_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 8770;

    /**
     * NAD83 / Oklahoma North (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Oklahoma - counties of Adair; Alfalfa; Beaver; Blaine; Canadian; Cherokee;
     * Cimarron; Craig; Creek; Custer; Delaware; Dewey; Ellis; Garfield; Grant; Harper; Kay; Kingfisher; Lincoln;
     * Logan; Major; Mayes; Muskogee; Noble; Nowata; Okfuskee; Oklahoma; Okmulgee; Osage; Ottawa; Pawnee; Payne; Roger
     * Mills; Rogers; Sequoyah; Texas; Tulsa; Wagoner; Washington; Woods; Woodward.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_OKLAHOMA_NORTH_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 8771;

    /**
     * NAD83 / Oklahoma South (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Oklahoma - counties of Atoka; Beckham; Bryan; Caddo; Carter; Choctaw; Cleveland;
     * Coal; Comanche; Cotton; Garvin; Grady; Greer; Harmon; Haskell; Hughes; Jackson; Jefferson; Johnston; Kiowa;
     * Latimer; Le Flore; Love; Marshall; McClain; McCurtain; McIntosh; Murray; Pittsburg; Pontotoc; Pottawatomie;
     * Pushmataha; Seminole; Stephens; Tillman; Washita.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_OKLAHOMA_SOUTH_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 8772;

    /**
     * NAD83 / Oregon North (ft) + NAVD88 height (ft)
     * Extent: United States (USA) - Oregon - counties of Baker; Benton; Clackamas; Clatsop; Columbia; Gilliam; Grant;
     * Hood River; Jefferson; Lincoln; Linn; Marion; Morrow; Multnomah; Polk; Sherman; Tillamook; Umatilla; Union;
     * Wallowa; Wasco; Washington; Wheeler; Yamhill.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_OREGON_NORTH_FT_PLUS_NAVD88_HEIGHT_FT = 8709;

    /**
     * NAD83 / Oregon South (ft) + NAVD88 height (ft)
     * Extent: United States (USA) - Oregon - counties of Coos; Crook; Curry; Deschutes; Douglas; Harney; Jackson;
     * Josephine; Klamath; Lake; Lane; Malheur.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_OREGON_SOUTH_FT_PLUS_NAVD88_HEIGHT_FT = 8710;

    /**
     * NAD83 / Pennsylvania North (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Pennsylvania - counties of Bradford; Cameron; Carbon; Centre; Clarion; Clearfield;
     * Clinton; Columbia; Crawford; Elk; Erie; Forest; Jefferson; Lackawanna; Luzerne; Lycoming; McKean; Mercer;
     * Monroe; Montour; Northumberland; Pike; Potter; Sullivan; Susquehanna; Tioga; Union; Venango; Warren; Wayne;
     * Wyoming.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_PENNSYLVANIA_NORTH_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 8773;

    /**
     * NAD83 / Pennsylvania South (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Pennsylvania - counties of Adams; Allegheny; Armstrong; Beaver; Bedford; Berks;
     * Blair; Bucks; Butler; Cambria; Chester; Cumberland; Dauphin; Delaware; Fayette; Franklin; Fulton; Greene;
     * Huntingdon; Indiana; Juniata; Lancaster; Lawrence; Lebanon; Lehigh; Mifflin; Montgomery; Northampton; Perry;
     * Philadelphia; Schuylkill; Snyder; Somerset; Washington; Westmoreland; York.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_PENNSYLVANIA_SOUTH_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 8774;

    /**
     * NAD83 / Rhode Island (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Rhode Island - counties of Bristol; Kent; Newport; Providence; Washington.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_RHODE_ISLAND_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 8775;

    /**
     * NAD83 / South Carolina (ft) + NAVD88 height (ft)
     * Extent: United States (USA) - South Carolina - counties of Abbeville; Aiken; Allendale; Anderson; Bamberg;
     * Barnwell; Beaufort; Berkeley; Calhoun; Charleston; Cherokee; Chester; Chesterfield; Clarendon; Colleton;
     * Darlington; Dillon; Dorchester; Edgefield; Fairfield; Florence; Georgetown; Greenville; Greenwood; Hampton;
     * Horry; Jasper; Kershaw; Lancaster; Laurens; Lee; Lexington; Marion; Marlboro; McCormick; Newberry; Oconee;
     * Orangeburg; Pickens; Richland; Saluda; Spartanburg; Sumter; Union; Williamsburg; York.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_SOUTH_CAROLINA_FT_PLUS_NAVD88_HEIGHT_FT = 8711;

    /**
     * NAD83 / South Dakota North (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - South Dakota - counties of Beadle; Brookings; Brown; Butte; Campbell; Clark;
     * Codington; Corson; Day; Deuel; Dewey; Edmunds; Faulk; Grant; Hamlin; Hand; Harding; Hyde; Kingsbury; Lawrence;
     * Marshall; McPherson; Meade; Perkins; Potter; Roberts; Spink; Sully; Walworth; Ziebach.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_SOUTH_DAKOTA_NORTH_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 8776;

    /**
     * NAD83 / South Dakota South (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - South Dakota - counties of Aurora; Bennett; Bon Homme; Brule; Buffalo; Charles
     * Mix; Clay; Custer; Davison; Douglas; Fall River; Gregory; Haakon; Hanson; Hughes; Hutchinson; Jackson; Jerauld;
     * Jones; Lake; Lincoln; Lyman; McCook; Mellette; Miner; Minnehaha; Moody; Pennington; Sanborn; Shannon; Stanley;
     * Todd; Tripp; Turner; Union; Yankton.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_SOUTH_DAKOTA_SOUTH_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 8777;

    /**
     * NAD83 / Tennessee (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Tennessee - counties of Anderson; Bedford; Benton; Bledsoe; Blount; Bradley;
     * Campbell; Cannon; Carroll; Carter; Cheatham; Chester; Claiborne; Clay; Cocke; Coffee; Crockett; Cumberland;
     * Davidson; De Kalb; Decatur; Dickson; Dyer; Fayette; Fentress; Franklin; Gibson; Giles; Grainger; Greene; Grundy;
     * Hamblen; Hamilton; Hancock; Hardeman; Hardin; Hawkins; Haywood; Henderson; Henry; Hickman; Houston; Humphreys;
     * Jackson; Jefferson; Johnson; Knox; Lake; Lauderdale; Lawrence; Lewis; Lincoln; Loudon; Macon; Madison; Marion;
     * Marshall; Maury; McMinn; McNairy; Meigs; Monroe; Montgomery; Moore; Morgan; Obion; Overton; Perry; Pickett;
     * Polk; Putnam; Rhea; Roane; Robertson; Rutherford; Scott; Sequatchie; Sevier; Shelby; Smith; Stewart; Sullivan;
     * Sumner; Tipton; Trousdale; Unicoi; Union; Van Buren; Warren; Washington; Wayne; Weakley; White; Williamson;
     * Wilson.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_TENNESSEE_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 8778;

    /**
     * NAD83 / Texas Central (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Texas - counties of Anderson; Angelina; Bastrop; Bell; Blanco; Bosque; Brazos;
     * Brown; Burleson; Burnet; Cherokee; Coke; Coleman; Comanche; Concho; Coryell; Crane; Crockett; Culberson; Ector;
     * El Paso; Falls; Freestone; Gillespie; Glasscock; Grimes; Hamilton; Hardin; Houston; Hudspeth; Irion; Jasper;
     * Jeff Davis; Kimble; Lampasas; Lee; Leon; Liberty; Limestone; Llano; Loving; Madison; Mason; McCulloch; McLennan;
     * Menard; Midland; Milam; Mills; Montgomery; Nacogdoches; Newton; Orange; Pecos; Polk; Reagan; Reeves; Robertson;
     * Runnels; Sabine; San Augustine; San Jacinto; San Saba; Schleicher; Shelby; Sterling; Sutton; Tom Green; Travis;
     * Trinity; Tyler; Upton; Walker; Ward; Washington; Williamson; Winkler.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_TEXAS_CENTRAL_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 8781;

    /**
     * NAD83 / Texas North (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Texas - counties of: Armstrong; Briscoe; Carson; Castro; Childress; Collingsworth;
     * Dallam; Deaf Smith; Donley; Gray; Hall; Hansford; Hartley; Hemphill; Hutchinson; Lipscomb; Moore; Ochiltree;
     * Oldham; Parmer; Potter; Randall; Roberts; Sherman; Swisher; Wheeler.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_TEXAS_NORTH_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 8779;

    /**
     * NAD83 / Texas North Central (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Texas - counties of: Andrews; Archer; Bailey; Baylor; Borden; Bowie; Callahan;
     * Camp; Cass; Clay; Cochran; Collin; Cooke; Cottle; Crosby; Dallas; Dawson; Delta; Denton; Dickens; Eastland;
     * Ellis; Erath; Fannin; Fisher; Floyd; Foard; Franklin; Gaines; Garza; Grayson; Gregg; Hale; Hardeman; Harrison;
     * Haskell; Henderson; Hill; Hockley; Hood; Hopkins; Howard; Hunt; Jack; Johnson; Jones; Kaufman; Kent; King; Knox;
     * Lamar; Lamb; Lubbock; Lynn; Marion; Martin; Mitchell; Montague; Morris; Motley; Navarro; Nolan; Palo Pinto;
     * Panola; Parker; Rains; Red River; Rockwall; Rusk; Scurry; Shackelford; Smith; Somervell; Stephens; Stonewall;
     * Tarrant; Taylor; Terry; Throckmorton; Titus; Upshur; Van Zandt; Wichita; Wilbarger; Wise; Wood; Yoakum; Young.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_TEXAS_NORTH_CENTRAL_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 8780;

    /**
     * NAD83 / Texas South (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Texas - counties of Brooks; Cameron; Duval; Hidalgo; Jim Hogg; Jim Wells; Kenedy;
     * Kleberg; Nueces; San Patricio; Starr; Webb; Willacy; Zapata.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_TEXAS_SOUTH_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 8783;

    /**
     * NAD83 / Texas South Central (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Texas - counties of Aransas; Atascosa; Austin; Bandera; Bee; Bexar; Brazoria;
     * Brewster; Caldwell; Calhoun; Chambers; Colorado; Comal; De Witt; Dimmit; Edwards; Fayette; Fort Bend; Frio;
     * Galveston; Goliad; Gonzales; Guadalupe; Harris; Hays; Jackson; Jefferson; Karnes; Kendall; Kerr; Kinney; La
     * Salle; Lavaca; Live Oak; Matagorda; Maverick; McMullen; Medina; Presidio; Real; Refugio; Terrell; Uvalde; Val
     * Verde; Victoria; Waller; Wharton; Wilson; Zavala.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_TEXAS_SOUTH_CENTRAL_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 8782;

    /**
     * NAD83 / Utah Central (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Utah - counties of Carbon; Duchesne; Emery; Grand; Juab; Millard; Salt Lake;
     * Sanpete; Sevier; Tooele; Uintah; Utah; Wasatch.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_UTAH_CENTRAL_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 8785;

    /**
     * NAD83 / Utah North (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Utah - counties of Box Elder; Cache; Daggett; Davis; Morgan; Rich; Summit; Weber.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_UTAH_NORTH_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 8784;

    /**
     * NAD83 / Utah South (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Utah - counties of Beaver; Garfield; Iron; Kane; Piute; San Juan; Washington;
     * Wayne.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_UTAH_SOUTH_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 8786;

    /**
     * NAD83 / Vermont (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Vermont - counties of Addison; Bennington; Caledonia; Chittenden; Essex; Franklin;
     * Grand Isle; Lamoille; Orange; Orleans; Rutland; Washington; Windham; Windsor.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_VERMONT_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 8787;

    /**
     * NAD83 / Virginia North (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Virginia - counties of Arlington; Augusta; Bath; Caroline; Clarke; Culpeper;
     * Fairfax; Fauquier; Frederick; Greene; Highland; King George; Loudoun; Madison; Orange; Page; Prince William;
     * Rappahannock; Rockingham; Shenandoah; Spotsylvania; Stafford; Warren; Westmoreland.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_VIRGINIA_NORTH_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 8788;

    /**
     * NAD83 / Virginia South (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Virginia - counties of Accomack; Albemarle; Alleghany; Amelia; Amherst;
     * Appomattox; Bedford; Bland; Botetourt; Bristol; Brunswick; Buchanan; Buckingham; Campbell; Carroll; Charles
     * City; Charlotte; Chesapeake; Chesterfield; Colonial Heights; Craig; Cumberland; Dickenson; Dinwiddie; Essex;
     * Floyd; Fluvanna; Franklin; Giles; Gloucester; Goochland; Grayson; Greensville; Halifax; Hampton; Hanover;
     * Henrico; Henry; Isle of Wight; James City; King and Queen; King William; Lancaster; Lee; Louisa; Lunenburg;
     * Lynchburg; Mathews; Mecklenburg; Middlesex; Montgomery; Nelson; New Kent; Newport News; Norfolk; Northampton;
     * Northumberland; Norton; Nottoway; Patrick; Petersburg; Pittsylvania; Portsmouth; Powhatan; Prince Edward; Prince
     * George; Pulaski; Richmond; Roanoke; Rockbridge; Russell; Scott; Smyth; Southampton; Suffolk; Surry; Sussex;
     * Tazewell; Washington; Wise; Wythe; York.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_VIRGINIA_SOUTH_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 8789;

    /**
     * NAD83 / Washington North (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Washington - counties of Chelan; Clallam; Douglas; Ferry; Grant north of
     * approximately 47°30'N; Island; Jefferson; King; Kitsap; Lincoln; Okanogan; Pend Oreille; San Juan; Skagit;
     * Snohomish; Spokane; Stevens; Whatcom.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_WASHINGTON_NORTH_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 8790;

    /**
     * NAD83 / Washington South (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Washington - counties of Adams; Asotin; Benton; Clark; Columbia; Cowlitz;
     * Franklin; Garfield; Grant south of approximately 47°30'N; Grays Harbor; Kittitas; Klickitat; Lewis; Mason;
     * Pacific; Pierce; Skamania; Thurston; Wahkiakum; Walla Walla; Whitman; Yakima.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_WASHINGTON_SOUTH_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 8791;

    /**
     * NAD83 / West Virginia North (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - West Virginia - counties of Barbour; Berkeley; Brooke; Doddridge; Grant;
     * Hampshire; Hancock; Hardy; Harrison; Jefferson; Marion; Marshall; Mineral; Monongalia; Morgan; Ohio; Pleasants;
     * Preston; Ritchie; Taylor; Tucker; Tyler; Wetzel; Wirt; Wood.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_WEST_VIRGINIA_NORTH_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 8792;

    /**
     * NAD83 / West Virginia South (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - West Virginia - counties of Boone; Braxton; Cabell; Calhoun; Clay; Fayette;
     * Gilmer; Greenbrier; Jackson; Kanawha; Lewis; Lincoln; Logan; Mason; McDowell; Mercer; Mingo; Monroe; Nicholas;
     * Pendleton; Pocahontas; Putnam; Raleigh; Randolph; Roane; Summers; Upshur; Wayne; Webster; Wyoming.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_WEST_VIRGINIA_SOUTH_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 8793;

    /**
     * NAD83 / Wisconsin Central (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Wisconsin - counties of Barron; Brown; Buffalo; Chippewa; Clark; Door; Dunn; Eau
     * Claire; Jackson; Kewaunee; Langlade; Lincoln; Marathon; Marinette; Menominee; Oconto; Outagamie; Pepin; Pierce;
     * Polk; Portage; Rusk; Shawano; St Croix; Taylor; Trempealeau; Waupaca; Wood.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_WISCONSIN_CENTRAL_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 8795;

    /**
     * NAD83 / Wisconsin North (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Wisconsin - counties of Ashland; Bayfield; Burnett; Douglas; Florence; Forest;
     * Iron; Oneida; Price; Sawyer; Vilas; Washburn.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_WISCONSIN_NORTH_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 8794;

    /**
     * NAD83 / Wisconsin South (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Wisconsin - counties of Adams; Calumet; Columbia; Crawford; Dane; Dodge; Fond Du
     * Lac; Grant; Green; Green Lake; Iowa; Jefferson; Juneau; Kenosha; La Crosse; Lafayette; Manitowoc; Marquette;
     * Milwaukee; Monroe; Ozaukee; Racine; Richland; Rock; Sauk; Sheboygan; Vernon; Walworth; Washington; Waukesha;
     * Waushara; Winnebago.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_WISCONSIN_SOUTH_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 8796;

    /**
     * NAD83 / Wyoming East (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Wyoming - counties of Albany; Campbell; Converse; Crook; Goshen; Laramie;
     * Niobrara; Platte; Weston.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_WYOMING_EAST_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 8797;

    /**
     * NAD83 / Wyoming East Central (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Wyoming - counties of Big Horn; Carbon; Johnson; Natrona; Sheridan; Washakie.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_WYOMING_EAST_CENTRAL_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 8798;

    /**
     * NAD83 / Wyoming West (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Wyoming - counties of Lincoln; Sublette; Teton; Uinta.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_WYOMING_WEST_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 8800;

    /**
     * NAD83 / Wyoming West Central (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Wyoming - counties of Fremont; Hot Springs; Park; Sweetwater.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_WYOMING_WEST_CENTRAL_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 8799;

    /**
     * NAD83(2011) + NAVD88 height
     * Extent: United States (USA) -  CONUS and Alaska - onshore - Alabama; Alaska mainland; Arizona; Arkansas;
     * California; Colorado; Connecticut; Delaware; Florida; Georgia; Idaho; Illinois; Indiana; Iowa; Kansas; Kentucky;
     * Louisiana; Maine; Maryland; Massachusetts; Michigan; Minnesota; Mississippi; Missouri; Montana; Nebraska;
     * Nevada; New Hampshire; New Jersey; New Mexico; New York; North Carolina; North Dakota; Ohio; Oklahoma; Oregon;
     * Pennsylvania; Rhode Island; South Carolina; South Dakota; Tennessee; Texas; Utah; Vermont; Virginia; Washington;
     * West Virginia; Wisconsin; Wyoming.
     * Scope: Engineering survey, topographic mapping.
     * Replaces NAD83(NSRS2007) + NAVD88 height.
     */
    public const EPSG_NAD83_2011_PLUS_NAVD88_HEIGHT = 6349;

    /**
     * NAD83(CSRS) + CGVD2013 height
     * Extent: Canada - onshore and offshore - Alberta; British Columbia; Manitoba; New Brunswick; Newfoundland and
     * Labrador; Northwest Territories; Nova Scotia; Nunavut; Ontario; Prince Edward Island; Quebec; Saskatchewan;
     * Yukon.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_CSRS_PLUS_CGVD2013_HEIGHT = 6649;

    /**
     * NAD83(CSRS) / UTM zone 10N + CGVD2013 height
     * Extent: Canada between 126°W and 120°W, onshore and offshore south of 84°N - British Columbia, Northwest
     * Territories, Yukon.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_CSRS_UTM_ZONE_10N_PLUS_CGVD2013_HEIGHT = 6653;

    /**
     * NAD83(CSRS) / UTM zone 11N + CGVD2013 height
     * Extent: Canada between 120°W and 114°W onshore and offshore - Alberta, British Columbia, Northwest
     * Territories, Nunavut.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_CSRS_UTM_ZONE_11N_PLUS_CGVD2013_HEIGHT = 6654;

    /**
     * NAD83(CSRS) / UTM zone 12N + CGVD2013 height
     * Extent: Canada between 114°W and 108°W onshore and offshore - Alberta, Northwest Territories, Nunavut,
     * Saskatchewan.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_CSRS_UTM_ZONE_12N_PLUS_CGVD2013_HEIGHT = 6655;

    /**
     * NAD83(CSRS) / UTM zone 13N + CGVD2013 height
     * Extent: Canada between 108°W and 102°W onshore and offshore - Northwest Territories, Nunavut, Saskatchewan.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_CSRS_UTM_ZONE_13N_PLUS_CGVD2013_HEIGHT = 6656;

    /**
     * NAD83(CSRS) / UTM zone 14N + CGVD2013 height
     * Extent: Canada between 102°W and 96°W, onshore and offshore south of 84°N - Manitoba, Nunavut, Saskatchewan.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_CSRS_UTM_ZONE_14N_PLUS_CGVD2013_HEIGHT = 6657;

    /**
     * NAD83(CSRS) / UTM zone 15N + CGVD2013 height
     * Extent: Canada between 96°W and 90°W, onshore and offshore south of 84°N - Manitoba, Nunavut, Ontario.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_CSRS_UTM_ZONE_15N_PLUS_CGVD2013_HEIGHT = 6658;

    /**
     * NAD83(CSRS) / UTM zone 16N + CGVD2013 height
     * Extent: Canada between 90°W and 84°W, onshore and offshore south of 84°N - Manitoba, Nunavut, Ontario.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_CSRS_UTM_ZONE_16N_PLUS_CGVD2013_HEIGHT = 6659;

    /**
     * NAD83(CSRS) / UTM zone 17N + CGVD2013 height
     * Extent: Canada between 84°W and 78°W, onshore and offshore south of 84°N - Nunavut, Ontario and Quebec.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_CSRS_UTM_ZONE_17N_PLUS_CGVD2013_HEIGHT = 6660;

    /**
     * NAD83(CSRS) / UTM zone 18N + CGVD2013 height
     * Extent: Canada between 78°W and 72°W, onshore and offshore south of 84°N - Nunavut, Ontario and Quebec.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_CSRS_UTM_ZONE_18N_PLUS_CGVD2013_HEIGHT = 6661;

    /**
     * NAD83(CSRS) / UTM zone 19N + CGVD2013 height
     * Extent: Canada between 72°W and 66°W onshore and offshore - New Brunswick, Labrador, Nova Scotia, Nunavut,
     * Quebec.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_CSRS_UTM_ZONE_19N_PLUS_CGVD2013_HEIGHT = 6662;

    /**
     * NAD83(CSRS) / UTM zone 20N + CGVD2013 height
     * Extent: Canada between 66°W and 60°W onshore and offshore - New Brunswick, Labrador, Nova Scotia, Nunavut,
     * Prince Edward Island, Quebec.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_CSRS_UTM_ZONE_20N_PLUS_CGVD2013_HEIGHT = 6663;

    /**
     * NAD83(CSRS) / UTM zone 21N + CGVD2013 height
     * Extent: Canada between 60°W and 54°W - Newfoundland and Labrador; Nunavut; Quebec.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_CSRS_UTM_ZONE_21N_PLUS_CGVD2013_HEIGHT = 6664;

    /**
     * NAD83(CSRS) / UTM zone 22N + CGVD2013 height
     * Extent: Canada between 54°W and 48°W onshore and offshore - Newfoundland and Labrador.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_CSRS_UTM_ZONE_22N_PLUS_CGVD2013_HEIGHT = 6665;

    /**
     * NAD83(CSRS) / UTM zone 7N + CGVD2013 height
     * Extent: Canada west of 138°W, onshore and offshore south of 84°N - British Columbia, Yukon.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_CSRS_UTM_ZONE_7N_PLUS_CGVD2013_HEIGHT = 6650;

    /**
     * NAD83(CSRS) / UTM zone 8N + CGVD2013 height
     * Extent: Canada between 138°W and 132°W, onshore and offshore south of 84°N - British Columbia, Northwest
     * Territories, Yukon.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_CSRS_UTM_ZONE_8N_PLUS_CGVD2013_HEIGHT = 6651;

    /**
     * NAD83(CSRS) / UTM zone 9N + CGVD2013 height
     * Extent: Canada - between 132°W and 126°W, onshore and offshore south of 84°N - British Columbia, Northwest
     * Territories, Yukon.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_CSRS_UTM_ZONE_9N_PLUS_CGVD2013_HEIGHT = 6652;

    /**
     * NAD83(HARN) + NAVD88 height
     * Extent: United States (USA) - CONUS onshore - Alabama; Arizona; Arkansas; California; Colorado; Connecticut;
     * Delaware; Florida; Georgia; Idaho; Illinois; Indiana; Iowa; Kansas; Kentucky; Louisiana; Maine; Maryland;
     * Massachusetts; Michigan; Minnesota; Mississippi; Missouri; Montana; Nebraska; Nevada; New Hampshire; New Jersey;
     * New Mexico; New York; North Carolina; North Dakota; Ohio; Oklahoma; Oregon; Pennsylvania; Rhode Island; South
     * Carolina; South Dakota; Tennessee; Texas; Utah; Vermont; Virginia; Washington; West Virginia; Wisconsin;
     * Wyoming.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_HARN_PLUS_NAVD88_HEIGHT = 5499;

    /**
     * NAD83(NSRS2007) + NAVD88 height
     * Extent: United States (USA) - CONUS onshore - Alabama; Arizona; Arkansas; California; Colorado; Connecticut;
     * Delaware; Florida; Georgia; Idaho; Illinois; Indiana; Iowa; Kansas; Kentucky; Louisiana; Maine; Maryland;
     * Massachusetts; Michigan; Minnesota; Mississippi; Missouri; Montana; Nebraska; Nevada; New Hampshire; New Jersey;
     * New Mexico; New York; North Carolina; North Dakota; Ohio; Oklahoma; Oregon; Pennsylvania; Rhode Island; South
     * Carolina; South Dakota; Tennessee; Texas; Utah; Vermont; Virginia; Washington; West Virginia; Wisconsin;
     * Wyoming.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NAD83_NSRS2007_PLUS_NAVD88_HEIGHT = 5500;

    /**
     * NTF (Paris) + NGF IGN69 height
     * Extent: France - mainland onshore.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NTF_PARIS_PLUS_NGF_IGN69_HEIGHT = 7400;

    /**
     * NTF (Paris) / Lambert zone I + NGF-IGN69 height
     * Extent: France mainland onshore north of 53.5 grads North (48°09'N).
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NTF_PARIS_LAMBERT_ZONE_I_PLUS_NGF_IGN69_HEIGHT = 5707;

    /**
     * NTF (Paris) / Lambert zone II + NGF Lallemand height
     * Extent: France - mainland onshore.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NTF_PARIS_LAMBERT_ZONE_II_PLUS_NGF_LALLEMAND_HEIGHT = 7411;

    /**
     * NTF (Paris) / Lambert zone II + NGF-IGN69 height
     * Extent: France - mainland onshore.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NTF_PARIS_LAMBERT_ZONE_II_PLUS_NGF_IGN69_HEIGHT = 7421;

    /**
     * NTF (Paris) / Lambert zone III + NGF-IGN69 height
     * Extent: France - mainland onshore south of 50.5 grads North (45°27'N).
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NTF_PARIS_LAMBERT_ZONE_III_PLUS_NGF_IGN69_HEIGHT = 7422;

    /**
     * NTF (Paris) / Lambert zone IV + NGF-IGN78 height
     * Extent: France - Corsica onshore.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_NTF_PARIS_LAMBERT_ZONE_IV_PLUS_NGF_IGN78_HEIGHT = 5708;

    /**
     * OSGB 1936 / British National Grid + ODN height
     * Extent: United Kingdom (UK) - Great Britain onshore - England and Wales - mainland; Scotland - mainland and
     * Inner Hebrides.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_OSGB_1936_BRITISH_NATIONAL_GRID_PLUS_ODN_HEIGHT = 7405;

    /**
     * PSHD93
     * Extent: Oman - onshore. Includes Musandam and the Kuria Muria (Al Hallaniyah) islands.
     * Scope: Oil and gas exploration and production.
     */
    public const EPSG_PSHD93 = 7410;

    /**
     * RGF93 / Lambert-93 + NGF-IGN69 height
     * Extent: France - mainland onshore.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_RGF93_LAMBERT_93_PLUS_NGF_IGN69_HEIGHT = 5698;

    /**
     * RGF93 / Lambert-93 + NGF-IGN78 height
     * Extent: France - Corsica onshore.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_RGF93_LAMBERT_93_PLUS_NGF_IGN78_HEIGHT = 5699;

    /**
     * RT90 + RH70 height
     * Extent: Sweden - onshore.
     * Scope: Engineering survey, topographic mapping.
     * When combined with geoid model RN92 forms geographic 3D CRS RR92.
     */
    public const EPSG_RT90_PLUS_RH70_HEIGHT = 7404;

    /**
     * SHMG2015 +  SHVD2015 height
     * Extent: St Helena, Ascension and Tristan da Cunha - St Helena Island - onshore.
     * Scope: Topographic mapping.
     */
    public const EPSG_SHMG2015_PLUS_SHVD2015_HEIGHT = 7956;

    /**
     * SVY21 + SHD height
     * Extent: Singapore - onshore and offshore.
     * Scope: Engineering survey, GIS, topographic mapping.
     */
    public const EPSG_SVY21_PLUS_SHD_HEIGHT = 6917;

    /**
     * SVY21 / Singapore TM + SHD height
     * Extent: Singapore - onshore and offshore.
     * Scope: Engineering survey, GIS, topographic mapping.
     */
    public const EPSG_SVY21_SINGAPORE_TM_PLUS_SHD_HEIGHT = 6927;

    /**
     * SWEREF99 + RH2000 height
     * Extent: Sweden - onshore.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_SWEREF99_PLUS_RH2000_HEIGHT = 5628;

    /**
     * SWEREF99 12 00 + RH2000 height
     * Extent: Sweden - communes west of approximately 12°45'E and south of approximately 60°N. See information
     * source for map.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_SWEREF99_12_00_PLUS_RH2000_HEIGHT = 5846;

    /**
     * SWEREF99 13 30 + RH2000 height
     * Extent: Sweden - communes between approximately 12°45'E and 14°15'E and south of approximately 62°10'N. See
     * information source for map.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_SWEREF99_13_30_PLUS_RH2000_HEIGHT = 5847;

    /**
     * SWEREF99 14 15 + RH2000 height
     * Extent: Sweden - communes west of approximately 15°E and between approximately 61°35'N and 64°25'N. See
     * information source for map.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_SWEREF99_14_15_PLUS_RH2000_HEIGHT = 5851;

    /**
     * SWEREF99 15 00 + RH2000 height
     * Extent: Sweden - communes between approximately 14°15'E and 15°45'E and south of approximately 61°30'N. See
     * information source for map.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_SWEREF99_15_00_PLUS_RH2000_HEIGHT = 5848;

    /**
     * SWEREF99 15 45 + RH2000 height
     * Extent: Sweden - communes between approximately 15°E and 16°30'E and between approximately 60°30'N and 65°N.
     * See information source for map.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_SWEREF99_15_45_PLUS_RH2000_HEIGHT = 5852;

    /**
     * SWEREF99 16 30 + RH2000 height
     * Extent: Sweden - communes between approximately 15°45'E and 17°15'E and south of approximately 62°20'N. See
     * information source for map.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_SWEREF99_16_30_PLUS_RH2000_HEIGHT = 5849;

    /**
     * SWEREF99 17 15 + RH2000 height
     * Extent: Sweden - communes between approximately 14°20'E and 18°50'E and between approximately 67°10'N and
     * 62°05'N. See information source for map.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_SWEREF99_17_15_PLUS_RH2000_HEIGHT = 5853;

    /**
     * SWEREF99 18 00 + RH2000 height
     * Extent: Sweden - communes east of approximately 17°15'E between approximately 60°40'N and 58°50'N. See
     * information source for map.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_SWEREF99_18_00_PLUS_RH2000_HEIGHT = 5850;

    /**
     * SWEREF99 18 45 + RH2000 height
     * Extent: Sweden - mainland communes between approximately 18°E and 19°30'E and between approximately 62°50'N
     * and 66°N. Also Gotland. See information source for map.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_SWEREF99_18_45_PLUS_RH2000_HEIGHT = 5854;

    /**
     * SWEREF99 20 15 + RH2000 height
     * Extent: Sweden - communes in Vaasterbotten east of approximately 19°30'E and (i) north of 63°30'N and (ii)
     * south of approximately 65°05'N. Also Norbotten west of approximately 23°20'E. See information source for map.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_SWEREF99_20_15_PLUS_RH2000_HEIGHT = 5855;

    /**
     * SWEREF99 21 45 + RH2000 height
     * Extent: Sweden - communes in Norbotten east of approximately 19°30'E and south of approximately 65°50'N. See
     * information source for map.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_SWEREF99_21_45_PLUS_RH2000_HEIGHT = 5856;

    /**
     * SWEREF99 23 15 + RH2000 height
     * Extent: Sweden - communes east of approximately 21°50'E. See information source for map.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_SWEREF99_23_15_PLUS_RH2000_HEIGHT = 5857;

    /**
     * SWEREF99 TM + RH2000 height
     * Extent: Sweden - onshore.
     * Scope: Engineering survey, topographic mapping.
     */
    public const EPSG_SWEREF99_TM_PLUS_RH2000_HEIGHT = 5845;

    /**
     * St. Helena Tritan / UTM zone 30S +  Tritan 2011 height
     * Extent: St Helena, Ascension and Tristan da Cunha - St Helena Island - onshore.
     * Scope: Engineering survey including Airport and Ruperts Wharf construction.
     */
    public const EPSG_ST_HELENA_TRITAN_UTM_ZONE_30S_PLUS_TRITAN_2011_HEIGHT = 7955;

    /**
     * TPEN11 Grid + ODN height
     * Extent: UK - on or related to the Trans-Pennine rail route from Liverpool via Manchester to Bradford and Leeds.
     * Scope: Engineering survey and topographic mapping for railway applications.
     */
    public const EPSG_TPEN11_GRID_PLUS_ODN_HEIGHT = 9368;

    /**
     * Tokyo + JSLD69 height
     * Extent: Japan - onshore mainland - Honshu, Shikoku, Kyushu.
     * Scope: Engineering survey, topographic mapping.
     * Replaced by JGD2000 + JGD2000 (vertical) (CRS code 6696) from April 2002).
     */
    public const EPSG_TOKYO_PLUS_JSLD69_HEIGHT = 7414;

    /**
     * Tokyo + JSLD72 height
     * Extent: Japan - onshore mainland - Hokkaido.
     * Scope: Engineering survey, topographic mapping.
     * Replaced by JGD2000 + JGD2000 (vertical) (CRS code 6696) from April 2002).
     */
    public const EPSG_TOKYO_PLUS_JSLD72_HEIGHT = 6700;

    /**
     * WGS 84 / World Mercator +  EGM2008 height
     * Extent: World.
     * Scope: Engineering design concept visualisation.
     * Note: for preliminary concept visualisation only. Detailed design will require use of appropriate low-distortion
     * local projected and vertical CRSs.
     */
    public const EPSG_WGS_84_WORLD_MERCATOR_PLUS_EGM2008_HEIGHT = 6893;

    /**
     * @var Geocentric|Geographic|Projected
     */
    private $horizontal;

    /**
     * @var Vertical
     */
    private $vertical;

    /**
     * Compound constructor.
     * @param Geocentric|Geographic|Projected $horizontal
     */
    public function __construct(
        int $epsgCode,
        CoordinateReferenceSystem $horizontal,
        Vertical $vertical
    ) {
        $this->epsgCode = $epsgCode;
        $this->horizontal = $horizontal;
        $this->vertical = $vertical;
    }

    public function getEpsgCode(): int
    {
        return $this->epsgCode;
    }

    public function getHorizontal(): CoordinateReferenceSystem
    {
        return $this->horizontal;
    }

    public function getVertical(): Vertical
    {
        return $this->vertical;
    }
}