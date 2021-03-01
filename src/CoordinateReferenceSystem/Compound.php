<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\CoordinateReferenceSystem;

use PHPCoord\Exception\UnknownCoordinateReferenceSystemException;
use PHPCoord\Geometry\GeographicPolygon;

class Compound extends CoordinateReferenceSystem
{
    /**
     * AbInvA96_2020 Grid + ODN height
     * Extent: UK - on or related to the A96 highway from Aberdeen to Inverness.
     */
    public const EPSG_ABINVA96_2020_GRID_PLUS_ODN_HEIGHT = 'urn:ogc:def:crs:EPSG::9388';

    /**
     * Amersfoort / RD New + NAP height
     * Extent: Netherlands - onshore, including Waddenzee, Dutch Wadden Islands and 12-mile offshore coastal zone.
     */
    public const EPSG_AMERSFOORT_RD_NEW_PLUS_NAP_HEIGHT = 'urn:ogc:def:crs:EPSG::7415';

    /**
     * Astro DOS 71 / UTM zone 30S + Jamestown 1971 height
     * Extent: St Helena, Ascension and Tristan da Cunha - St Helena Island - onshore.
     */
    public const EPSG_ASTRO_DOS_71_UTM_ZONE_30S_PLUS_JAMESTOWN_1971_HEIGHT = 'urn:ogc:def:crs:EPSG::7954';

    /**
     * Belge 1972 / Belgian Lambert 72 + Ostend height
     * Extent: Belgium - onshore.
     */
    public const EPSG_BELGE_1972_BELGIAN_LAMBERT_72_PLUS_OSTEND_HEIGHT = 'urn:ogc:def:crs:EPSG::6190';

    /**
     * CIGD11 + CBVD61 height (ft)
     * Extent: Cayman Islands - Cayman Brac.
     */
    public const EPSG_CIGD11_PLUS_CBVD61_HEIGHT_FT = 'urn:ogc:def:crs:EPSG::9502';

    /**
     * CIGD11 + GCVD54 height (ft)
     * Extent: Cayman Islands - Grand Cayman.
     */
    public const EPSG_CIGD11_PLUS_GCVD54_HEIGHT_FT = 'urn:ogc:def:crs:EPSG::9503';

    /**
     * CIGD11 + LCVD61 height (ft)
     * Extent: Cayman Islands - Little Cayman.
     */
    public const EPSG_CIGD11_PLUS_LCVD61_HEIGHT_FT = 'urn:ogc:def:crs:EPSG::9504';

    /**
     * CR-SIRGAS / CRTM05 + DACR52 height
     * Extent: Costa Rica - onshore.
     * With geoid model and gravity, part of official national dynamic geodetic framework from April 2018.
     */
    public const EPSG_CR_SIRGAS_CRTM05_PLUS_DACR52_HEIGHT = 'urn:ogc:def:crs:EPSG::8912';

    /**
     * DB_REF / 3-degree Gauss-Kruger zone 2 (E-N) + DHHN92 height
     * Extent: Germany - former West Germany onshore west of 7°30'E - states of Niedersachsen, Nordrhein-Westfalen,
     * Rheinland-Pfalz, Saarland.
     */
    public const EPSG_DB_REF_3_DEGREE_GAUSS_KRUGER_ZONE_2_E_N_PLUS_DHHN92_HEIGHT = 'urn:ogc:def:crs:EPSG::5832';

    /**
     * DB_REF / 3-degree Gauss-Kruger zone 3 (E-N) + DHHN92 height
     * Extent: Germany - onshore between 7°30'E and 10°30'E.
     */
    public const EPSG_DB_REF_3_DEGREE_GAUSS_KRUGER_ZONE_3_E_N_PLUS_DHHN92_HEIGHT = 'urn:ogc:def:crs:EPSG::5833';

    /**
     * DB_REF / 3-degree Gauss-Kruger zone 4 (E-N) + DHHN92 height
     * Extent: Germany - onshore between 10°30'E and 13°30'E.
     */
    public const EPSG_DB_REF_3_DEGREE_GAUSS_KRUGER_ZONE_4_E_N_PLUS_DHHN92_HEIGHT = 'urn:ogc:def:crs:EPSG::5834';

    /**
     * DB_REF / 3-degree Gauss-Kruger zone 5 (E-N) + DHHN92 height
     * Extent: Germany - onshore east of 13°30'E.
     */
    public const EPSG_DB_REF_3_DEGREE_GAUSS_KRUGER_ZONE_5_E_N_PLUS_DHHN92_HEIGHT = 'urn:ogc:def:crs:EPSG::5835';

    /**
     * ETRS89 + Alicante height
     * Extent: Gibraltar - onshore; Spain - mainland onshore.
     */
    public const EPSG_ETRS89_PLUS_ALICANTE_HEIGHT = 'urn:ogc:def:crs:EPSG::9505';

    /**
     * ETRS89 + BI height
     * Extent: United Kingdom (UK) - offshore to boundary of UKCS within 49°45'N to 61°N and 9°W to 2°E; onshore
     * Great Britain (England, Wales and Scotland) and Northern Ireland. Ireland onshore. Isle of Man onshore.
     */
    public const EPSG_ETRS89_PLUS_BI_HEIGHT = 'urn:ogc:def:crs:EPSG::9452';

    /**
     * ETRS89 + Baltic 1957 height
     * Extent: Czechia; Slovakia.
     */
    public const EPSG_ETRS89_PLUS_BALTIC_1957_HEIGHT = 'urn:ogc:def:crs:EPSG::8360';

    /**
     * ETRS89 + Belfast height
     * Extent: United Kingdom (UK) - Northern Ireland (Ulster) - onshore.
     */
    public const EPSG_ETRS89_PLUS_BELFAST_HEIGHT = 'urn:ogc:def:crs:EPSG::9450';

    /**
     * ETRS89 + Ceuta 2 height
     * Extent: Spain - Ceuta onshore.
     */
    public const EPSG_ETRS89_PLUS_CEUTA_2_HEIGHT = 'urn:ogc:def:crs:EPSG::9506';

    /**
     * ETRS89 + Douglas height
     * Extent: Isle of Man - onshore.
     */
    public const EPSG_ETRS89_PLUS_DOUGLAS_HEIGHT = 'urn:ogc:def:crs:EPSG::9429';

    /**
     * ETRS89 + EVRF2000 Austria height
     * Extent: Austria.
     */
    public const EPSG_ETRS89_PLUS_EVRF2000_AUSTRIA_HEIGHT = 'urn:ogc:def:crs:EPSG::9500';

    /**
     * ETRS89 + EVRF2000 height
     * Extent: Europe - onshore - Andorra; Austria; Belgium; Bosnia and Herzegovina; Croatia; Czechia; Denmark;
     * Estonia; Finland; France - mainland; Germany; Gibraltar; Hungary; Italy - mainland and Sicily; Latvia;
     * Liechtenstein; Lithuania; Luxembourg; Netherlands; Norway; Poland; Portugal - mainland; Romania; San Marino;
     * Slovakia; Slovenia; Spain - mainland; Sweden; Switzerland; United Kingdom (UK) - Great Britain mainland; Vatican
     * City State.
     * Replaced by ETRS89 + EVRF2007 height (CRS code 7423).
     */
    public const EPSG_ETRS89_PLUS_EVRF2000_HEIGHT = 'urn:ogc:def:crs:EPSG::7409';

    /**
     * ETRS89 + EVRF2007 height
     * Extent: Europe - onshore - Andorra; Austria; Belgium; Bosnia and Herzegovina; Bulgaria; Croatia; Czechia;
     * Denmark; Estonia; Finland; France - mainland; Germany; Gibraltar, Hungary; Italy - mainland and Sicily; Latvia;
     * Liechtenstein; Lithuania; Luxembourg; Netherlands; Norway; Poland; Portugal - mainland; Romania; San Marino;
     * Slovakia; Slovenia; Spain - mainland; Sweden; Switzerland; United Kingdom (UK) - Great Britain mainland; Vatican
     * City State.
     * Replaces ETRS89 + EVRF2000 height (CRS code 7409).
     */
    public const EPSG_ETRS89_PLUS_EVRF2007_HEIGHT = 'urn:ogc:def:crs:EPSG::7423';

    /**
     * ETRS89 + EVRF2019 height
     * Extent: Europe - onshore - Andorra; Austria; Belgium; Bosnia and Herzegovina; Bulgaria; Croatia; Czechia;
     * Denmark; Estonia; Finland; France - mainland; Germany; Gibraltar, Hungary; Italy - mainland and Sicily; Latvia;
     * Liechtenstein; Lithuania; Luxembourg; Netherlands; North Macedonia; Norway; Poland; Portugal - mainland;
     * Romania; San Marino; Slovakia; Slovenia; Spain - mainland; Sweden; Switzerland; United Kingdom (UK) - Great
     * Britain mainland; Vatican City State.
     * Replaces ETRS89 + EVRF2007 height (CRS code 7423). See also ETRS89 + EVRF2019 mean-tide height (CRS code 9423).
     */
    public const EPSG_ETRS89_PLUS_EVRF2019_HEIGHT = 'urn:ogc:def:crs:EPSG::9422';

    /**
     * ETRS89 + EVRF2019 mean-tide height
     * Extent: Europe - onshore - Andorra; Austria; Belgium; Bosnia and Herzegovina; Bulgaria; Croatia; Czechia;
     * Denmark; Estonia; Finland; France - mainland; Germany; Gibraltar, Hungary; Italy - mainland and Sicily; Latvia;
     * Liechtenstein; Lithuania; Luxembourg; Netherlands; North Macedonia; Norway; Poland; Portugal - mainland;
     * Romania; San Marino; Slovakia; Slovenia; Spain - mainland; Sweden; Switzerland; United Kingdom (UK) - Great
     * Britain mainland; Vatican City State.
     * See also ETRS89 + EVRF2019 (CRS code 9422).
     */
    public const EPSG_ETRS89_PLUS_EVRF2019_MEAN_TIDE_HEIGHT = 'urn:ogc:def:crs:EPSG::9423';

    /**
     * ETRS89 + Ibiza height
     * Extent: Spain - Balearic Islands - Ibiza and Formentera - onshore.
     */
    public const EPSG_ETRS89_PLUS_IBIZA_HEIGHT = 'urn:ogc:def:crs:EPSG::9507';

    /**
     * ETRS89 + LAT NL depth
     * Extent: Netherlands - offshore North Sea.
     */
    public const EPSG_ETRS89_PLUS_LAT_NL_DEPTH = 'urn:ogc:def:crs:EPSG::9289';

    /**
     * ETRS89 + Lerwick height
     * Extent: United Kingdom (UK) - Great Britain - Scotland - Shetland Islands onshore.
     */
    public const EPSG_ETRS89_PLUS_LERWICK_HEIGHT = 'urn:ogc:def:crs:EPSG::9427';

    /**
     * ETRS89 + MSL NL depth
     * Extent: Netherlands - offshore North Sea.
     */
    public const EPSG_ETRS89_PLUS_MSL_NL_DEPTH = 'urn:ogc:def:crs:EPSG::9290';

    /**
     * ETRS89 + Malin Head height
     * Extent: Ireland - onshore. United Kingdom (UK) - Northern Ireland (Ulster) - onshore.
     */
    public const EPSG_ETRS89_PLUS_MALIN_HEAD_HEIGHT = 'urn:ogc:def:crs:EPSG::9449';

    /**
     * ETRS89 + Mallorca height
     * Extent: Spain - Balearic Islands - Mallorca onshore.
     */
    public const EPSG_ETRS89_PLUS_MALLORCA_HEIGHT = 'urn:ogc:def:crs:EPSG::9508';

    /**
     * ETRS89 + Menorca height
     * Extent: Spain - Balearic Islands - Menorca onshore.
     */
    public const EPSG_ETRS89_PLUS_MENORCA_HEIGHT = 'urn:ogc:def:crs:EPSG::9509';

    /**
     * ETRS89 + NAP height
     * Extent: Netherlands - onshore and offshore.
     */
    public const EPSG_ETRS89_PLUS_NAP_HEIGHT = 'urn:ogc:def:crs:EPSG::9286';

    /**
     * ETRS89 + NN2000 height
     * Extent: Norway - onshore.
     */
    public const EPSG_ETRS89_PLUS_NN2000_HEIGHT = 'urn:ogc:def:crs:EPSG::5942';

    /**
     * ETRS89 + NN54 height
     * Extent: Norway - onshore.
     * Replaced by ETRS89 + NN2000 height (compound CRS code 5942).
     */
    public const EPSG_ETRS89_PLUS_NN54_HEIGHT = 'urn:ogc:def:crs:EPSG::6144';

    /**
     * ETRS89 + ODN (Offshore) height
     * Extent: United Kingdom (UK) - offshore between 2km from shore and boundary of UKCS within 49°46'N to 61°01'N
     * and 7°33'W to 3°33'E.
     */
    public const EPSG_ETRS89_PLUS_ODN_OFFSHORE_HEIGHT = 'urn:ogc:def:crs:EPSG::9425';

    /**
     * ETRS89 + ODN Orkney height
     * Extent: United Kingdom (UK) - Great Britain - Scotland - Orkney Islands onshore.
     */
    public const EPSG_ETRS89_PLUS_ODN_ORKNEY_HEIGHT = 'urn:ogc:def:crs:EPSG::9426';

    /**
     * ETRS89 + ODN height
     * Extent: United Kingdom (UK) - Great Britain onshore - England and Wales - mainland; Scotland - mainland and
     * Inner Hebrides.
     */
    public const EPSG_ETRS89_PLUS_ODN_HEIGHT = 'urn:ogc:def:crs:EPSG::9424';

    /**
     * ETRS89 + St. Marys height
     * Extent: United Kingdom (UK) - Great Britain - England - Isles of Scilly onshore.
     */
    public const EPSG_ETRS89_PLUS_ST_MARYS_HEIGHT = 'urn:ogc:def:crs:EPSG::9430';

    /**
     * ETRS89 + Stornoway height
     * Extent: United Kingdom (UK) - Great Britain - Scotland - Outer Hebrides onshore.
     */
    public const EPSG_ETRS89_PLUS_STORNOWAY_HEIGHT = 'urn:ogc:def:crs:EPSG::9428';

    /**
     * ETRS89 / Belgian Lambert 2008 + Ostend height
     * Extent: Belgium - onshore.
     */
    public const EPSG_ETRS89_BELGIAN_LAMBERT_2008_PLUS_OSTEND_HEIGHT = 'urn:ogc:def:crs:EPSG::8370';

    /**
     * ETRS89 / DKTM1 + DVR90 height
     * Extent: Denmark - Jutland onshore west of 10°E.
     */
    public const EPSG_ETRS89_DKTM1_PLUS_DVR90_HEIGHT = 'urn:ogc:def:crs:EPSG::4097';

    /**
     * ETRS89 / DKTM2 + DVR90 height
     * Extent: Denmark - onshore - Jutland east of 9°E and Funen.
     */
    public const EPSG_ETRS89_DKTM2_PLUS_DVR90_HEIGHT = 'urn:ogc:def:crs:EPSG::4098';

    /**
     * ETRS89 / DKTM3 + DVR90 height
     * Extent: Denmark - Zealand and Lolland (onshore).
     */
    public const EPSG_ETRS89_DKTM3_PLUS_DVR90_HEIGHT = 'urn:ogc:def:crs:EPSG::4099';

    /**
     * ETRS89 / DKTM4 + DVR90 height
     * Extent: Denmark - Bornholm onshore.
     */
    public const EPSG_ETRS89_DKTM4_PLUS_DVR90_HEIGHT = 'urn:ogc:def:crs:EPSG::4100';

    /**
     * ETRS89 / Faroe TM + FVR09 height
     * Extent: Faroe Islands - onshore.
     * Introduced in 2010.
     */
    public const EPSG_ETRS89_FAROE_TM_PLUS_FVR09_HEIGHT = 'urn:ogc:def:crs:EPSG::5318';

    /**
     * ETRS89 / Kp2000 Bornholm + DVR90 height
     * Extent: Denmark - Bornholm onshore.
     */
    public const EPSG_ETRS89_KP2000_BORNHOLM_PLUS_DVR90_HEIGHT = 'urn:ogc:def:crs:EPSG::7420';

    /**
     * ETRS89 / Kp2000 Jutland + DVR90 height
     * Extent: Denmark - Jutland and Funen - onshore.
     */
    public const EPSG_ETRS89_KP2000_JUTLAND_PLUS_DVR90_HEIGHT = 'urn:ogc:def:crs:EPSG::7418';

    /**
     * ETRS89 / Kp2000 Zealand + DVR90 height
     * Extent: Denmark - Zealand and Lolland (onshore).
     */
    public const EPSG_ETRS89_KP2000_ZEALAND_PLUS_DVR90_HEIGHT = 'urn:ogc:def:crs:EPSG::7419';

    /**
     * ETRS89 / NTM zone 10 + NN2000 height
     * Extent: Norway - onshore - between 10°E and 11°E.
     */
    public const EPSG_ETRS89_NTM_ZONE_10_PLUS_NN2000_HEIGHT = 'urn:ogc:def:crs:EPSG::5950';

    /**
     * ETRS89 / NTM zone 10 + NN54 height
     * Extent: Norway - onshore - between 10°E and 11°E.
     * Replaced by ETRS89 / NTM zone 10 + NN2000 height (compound CRS code 5950).
     */
    public const EPSG_ETRS89_NTM_ZONE_10_PLUS_NN54_HEIGHT = 'urn:ogc:def:crs:EPSG::6150';

    /**
     * ETRS89 / NTM zone 11 + NN2000 height
     * Extent: Norway - onshore - between 11°E and 12°E.
     */
    public const EPSG_ETRS89_NTM_ZONE_11_PLUS_NN2000_HEIGHT = 'urn:ogc:def:crs:EPSG::5951';

    /**
     * ETRS89 / NTM zone 11 + NN54 height
     * Extent: Norway - onshore - between 11°E and 12°E.
     * Replaced by ETRS89 / NTM zone 11 + NN2000 height (compound CRS code 5951).
     */
    public const EPSG_ETRS89_NTM_ZONE_11_PLUS_NN54_HEIGHT = 'urn:ogc:def:crs:EPSG::6151';

    /**
     * ETRS89 / NTM zone 12 + NN2000 height
     * Extent: Norway - onshore - between 12°E and 13°E.
     */
    public const EPSG_ETRS89_NTM_ZONE_12_PLUS_NN2000_HEIGHT = 'urn:ogc:def:crs:EPSG::5952';

    /**
     * ETRS89 / NTM zone 12 + NN54 height
     * Extent: Norway - onshore - between 12°E and 13°E.
     * Replaced by ETRS89 / NTM zone 12 + NN2000 height (compound CRS code 5952).
     */
    public const EPSG_ETRS89_NTM_ZONE_12_PLUS_NN54_HEIGHT = 'urn:ogc:def:crs:EPSG::6152';

    /**
     * ETRS89 / NTM zone 13 + NN2000 height
     * Extent: Norway - onshore - between 13°E and 14°E.
     */
    public const EPSG_ETRS89_NTM_ZONE_13_PLUS_NN2000_HEIGHT = 'urn:ogc:def:crs:EPSG::5953';

    /**
     * ETRS89 / NTM zone 13 + NN54 height
     * Extent: Norway - onshore - between 13°E and 14°E.
     * Replaced by ETRS89 / NTM zone 13 + NN2000 height (compound CRS code 5953).
     */
    public const EPSG_ETRS89_NTM_ZONE_13_PLUS_NN54_HEIGHT = 'urn:ogc:def:crs:EPSG::6153';

    /**
     * ETRS89 / NTM zone 14 + NN2000 height
     * Extent: Norway - onshore - between 14°E and 15°E.
     */
    public const EPSG_ETRS89_NTM_ZONE_14_PLUS_NN2000_HEIGHT = 'urn:ogc:def:crs:EPSG::5954';

    /**
     * ETRS89 / NTM zone 14 + NN54 height
     * Extent: Norway - onshore - between 14°E and 15°E.
     * Replaced by ETRS89 / NTM zone 14 + NN2000 height (compound CRS code 5954).
     */
    public const EPSG_ETRS89_NTM_ZONE_14_PLUS_NN54_HEIGHT = 'urn:ogc:def:crs:EPSG::6154';

    /**
     * ETRS89 / NTM zone 15 + NN2000 height
     * Extent: Norway - onshore - between 15°E and 16°E.
     */
    public const EPSG_ETRS89_NTM_ZONE_15_PLUS_NN2000_HEIGHT = 'urn:ogc:def:crs:EPSG::5955';

    /**
     * ETRS89 / NTM zone 15 + NN54 height
     * Extent: Norway - onshore - between 15°E and 16°E.
     * Replaced by ETRS89 / NTM zone 15 + NN2000 height (compound CRS code 5955).
     */
    public const EPSG_ETRS89_NTM_ZONE_15_PLUS_NN54_HEIGHT = 'urn:ogc:def:crs:EPSG::6155';

    /**
     * ETRS89 / NTM zone 16 + NN2000 height
     * Extent: Norway - onshore - between 16°E and 17°E.
     */
    public const EPSG_ETRS89_NTM_ZONE_16_PLUS_NN2000_HEIGHT = 'urn:ogc:def:crs:EPSG::5956';

    /**
     * ETRS89 / NTM zone 16 + NN54 height
     * Extent: Norway - onshore - between 16°E and 17°E.
     * Replaced by ETRS89 / NTM zone 16 + NN2000 height (compound CRS code 5956).
     */
    public const EPSG_ETRS89_NTM_ZONE_16_PLUS_NN54_HEIGHT = 'urn:ogc:def:crs:EPSG::6156';

    /**
     * ETRS89 / NTM zone 17 + NN2000 height
     * Extent: Norway - onshore - between 17°E and 18°E.
     */
    public const EPSG_ETRS89_NTM_ZONE_17_PLUS_NN2000_HEIGHT = 'urn:ogc:def:crs:EPSG::5957';

    /**
     * ETRS89 / NTM zone 17 + NN54 height
     * Extent: Norway - onshore - between 17°E and 18°E.
     * Replaced by ETRS89 / NTM zone 17 + NN2000 height (compound CRS code 5957).
     */
    public const EPSG_ETRS89_NTM_ZONE_17_PLUS_NN54_HEIGHT = 'urn:ogc:def:crs:EPSG::6157';

    /**
     * ETRS89 / NTM zone 18 + NN2000 height
     * Extent: Norway - onshore - between 18°E and 19°E.
     */
    public const EPSG_ETRS89_NTM_ZONE_18_PLUS_NN2000_HEIGHT = 'urn:ogc:def:crs:EPSG::5958';

    /**
     * ETRS89 / NTM zone 18 + NN54 height
     * Extent: Norway - onshore - between 18°E and 19°E.
     * Replaced by ETRS89 / NTM zone 18 + NN2000 height (compound CRS code 5958).
     */
    public const EPSG_ETRS89_NTM_ZONE_18_PLUS_NN54_HEIGHT = 'urn:ogc:def:crs:EPSG::6158';

    /**
     * ETRS89 / NTM zone 19 + NN2000 height
     * Extent: Norway - onshore - between 19°E and 20°E.
     */
    public const EPSG_ETRS89_NTM_ZONE_19_PLUS_NN2000_HEIGHT = 'urn:ogc:def:crs:EPSG::5959';

    /**
     * ETRS89 / NTM zone 19 + NN54 height
     * Extent: Norway - onshore - between 19°E and 20°E.
     * Replaced by ETRS89 / NTM zone 19 + NN2000 height (compound CRS code 5959).
     */
    public const EPSG_ETRS89_NTM_ZONE_19_PLUS_NN54_HEIGHT = 'urn:ogc:def:crs:EPSG::6159';

    /**
     * ETRS89 / NTM zone 20 + NN2000 height
     * Extent: Norway - onshore - between 20°E and 21°E.
     */
    public const EPSG_ETRS89_NTM_ZONE_20_PLUS_NN2000_HEIGHT = 'urn:ogc:def:crs:EPSG::5960';

    /**
     * ETRS89 / NTM zone 20 + NN54 height
     * Extent: Norway - onshore - between 20°E and 21°E.
     * Replaced by ETRS89 / NTM zone 20 + NN2000 height (compound CRS code 5960).
     */
    public const EPSG_ETRS89_NTM_ZONE_20_PLUS_NN54_HEIGHT = 'urn:ogc:def:crs:EPSG::6160';

    /**
     * ETRS89 / NTM zone 21 + NN2000 height
     * Extent: Norway - onshore - between 21°E and 22°E.
     */
    public const EPSG_ETRS89_NTM_ZONE_21_PLUS_NN2000_HEIGHT = 'urn:ogc:def:crs:EPSG::5961';

    /**
     * ETRS89 / NTM zone 21 + NN54 height
     * Extent: Norway - onshore - between 21°E and 22°E.
     * Replaced by ETRS89 / NTM zone 21 + NN2000 height (compound CRS code 5961).
     */
    public const EPSG_ETRS89_NTM_ZONE_21_PLUS_NN54_HEIGHT = 'urn:ogc:def:crs:EPSG::6161';

    /**
     * ETRS89 / NTM zone 22 + NN2000 height
     * Extent: Norway - onshore - between 22°E and 23°E.
     */
    public const EPSG_ETRS89_NTM_ZONE_22_PLUS_NN2000_HEIGHT = 'urn:ogc:def:crs:EPSG::5962';

    /**
     * ETRS89 / NTM zone 22 + NN54 height
     * Extent: Norway - onshore - between 22°E and 23°E.
     * Replaced by ETRS89 / NTM zone 22 + NN2000 height (compound CRS code 5962).
     */
    public const EPSG_ETRS89_NTM_ZONE_22_PLUS_NN54_HEIGHT = 'urn:ogc:def:crs:EPSG::6162';

    /**
     * ETRS89 / NTM zone 23 + NN2000 height
     * Extent: Norway - onshore - between 23°E and 24°E.
     */
    public const EPSG_ETRS89_NTM_ZONE_23_PLUS_NN2000_HEIGHT = 'urn:ogc:def:crs:EPSG::5963';

    /**
     * ETRS89 / NTM zone 23 + NN54 height
     * Extent: Norway - onshore - between 23°E and 24°E.
     * Replaced by ETRS89 / NTM zone 23 + NN2000 height (compound CRS code 5963).
     */
    public const EPSG_ETRS89_NTM_ZONE_23_PLUS_NN54_HEIGHT = 'urn:ogc:def:crs:EPSG::6163';

    /**
     * ETRS89 / NTM zone 24 + NN2000 height
     * Extent: Norway - onshore - between 24°E and 25°E.
     */
    public const EPSG_ETRS89_NTM_ZONE_24_PLUS_NN2000_HEIGHT = 'urn:ogc:def:crs:EPSG::5964';

    /**
     * ETRS89 / NTM zone 24 + NN54 height
     * Extent: Norway - onshore - between 24°E and 25°E.
     * Replaced by ETRS89 / NTM zone 24 + NN2000 height (compound CRS code 5964).
     */
    public const EPSG_ETRS89_NTM_ZONE_24_PLUS_NN54_HEIGHT = 'urn:ogc:def:crs:EPSG::6164';

    /**
     * ETRS89 / NTM zone 25 + NN2000 height
     * Extent: Norway - onshore - between 25°E and 26°E.
     */
    public const EPSG_ETRS89_NTM_ZONE_25_PLUS_NN2000_HEIGHT = 'urn:ogc:def:crs:EPSG::5965';

    /**
     * ETRS89 / NTM zone 25 + NN54 height
     * Extent: Norway - onshore - between 25°E and 26°E.
     * Replaced by ETRS89 / NTM zone 25 + NN2000 height (compound CRS code 5965).
     */
    public const EPSG_ETRS89_NTM_ZONE_25_PLUS_NN54_HEIGHT = 'urn:ogc:def:crs:EPSG::6165';

    /**
     * ETRS89 / NTM zone 26 + NN2000 height
     * Extent: Norway - onshore - between 26°E and 27°E.
     */
    public const EPSG_ETRS89_NTM_ZONE_26_PLUS_NN2000_HEIGHT = 'urn:ogc:def:crs:EPSG::5966';

    /**
     * ETRS89 / NTM zone 26 + NN54 height
     * Extent: Norway - onshore - between 26°E and 27°E.
     * Replaced by ETRS89 / NTM zone 26 + NN2000 height (compound CRS code 5966).
     */
    public const EPSG_ETRS89_NTM_ZONE_26_PLUS_NN54_HEIGHT = 'urn:ogc:def:crs:EPSG::6166';

    /**
     * ETRS89 / NTM zone 27 + NN2000 height
     * Extent: Norway - onshore - between 27°E and 28°E.
     */
    public const EPSG_ETRS89_NTM_ZONE_27_PLUS_NN2000_HEIGHT = 'urn:ogc:def:crs:EPSG::5967';

    /**
     * ETRS89 / NTM zone 27 + NN54 height
     * Extent: Norway - onshore - between 27°E and 28°E.
     * Replaced by ETRS89 / NTM zone 27 + NN2000 height (compound CRS code 5967).
     */
    public const EPSG_ETRS89_NTM_ZONE_27_PLUS_NN54_HEIGHT = 'urn:ogc:def:crs:EPSG::6167';

    /**
     * ETRS89 / NTM zone 28 + NN2000 height
     * Extent: Norway - onshore - between 28°E and 29°E.
     */
    public const EPSG_ETRS89_NTM_ZONE_28_PLUS_NN2000_HEIGHT = 'urn:ogc:def:crs:EPSG::5968';

    /**
     * ETRS89 / NTM zone 28 + NN54 height
     * Extent: Norway - onshore - between 28°E and 29°E.
     * Replaced by ETRS89 / NTM zone 28 + NN2000 height (compound CRS code 5968).
     */
    public const EPSG_ETRS89_NTM_ZONE_28_PLUS_NN54_HEIGHT = 'urn:ogc:def:crs:EPSG::6168';

    /**
     * ETRS89 / NTM zone 29 + NN2000 height
     * Extent: Norway - onshore - between 29°E and 30°E.
     */
    public const EPSG_ETRS89_NTM_ZONE_29_PLUS_NN2000_HEIGHT = 'urn:ogc:def:crs:EPSG::5969';

    /**
     * ETRS89 / NTM zone 29 + NN54 height
     * Extent: Norway - onshore - between 29°E and 30°E.
     * Replaced by ETRS89 / NTM zone 29 + NN2000 height (compound CRS code 5969).
     */
    public const EPSG_ETRS89_NTM_ZONE_29_PLUS_NN54_HEIGHT = 'urn:ogc:def:crs:EPSG::6169';

    /**
     * ETRS89 / NTM zone 30 + NN2000 height
     * Extent: Norway - onshore - east of 30°E.
     */
    public const EPSG_ETRS89_NTM_ZONE_30_PLUS_NN2000_HEIGHT = 'urn:ogc:def:crs:EPSG::5970';

    /**
     * ETRS89 / NTM zone 30 + NN54 height
     * Extent: Norway - onshore - east of 30°E.
     * Replaced by ETRS89 / NTM zone 30 + NN2000 height (compound CRS code 5970).
     */
    public const EPSG_ETRS89_NTM_ZONE_30_PLUS_NN54_HEIGHT = 'urn:ogc:def:crs:EPSG::6170';

    /**
     * ETRS89 / NTM zone 5 + NN2000 height
     * Extent: Norway - onshore - west of 6°E.
     */
    public const EPSG_ETRS89_NTM_ZONE_5_PLUS_NN2000_HEIGHT = 'urn:ogc:def:crs:EPSG::5945';

    /**
     * ETRS89 / NTM zone 5 + NN54 height
     * Extent: Norway - onshore - west of 6°E.
     * Replaced by ETRS89 / NTM zone 5 + NN2000 height (compound CRS code 5945).
     */
    public const EPSG_ETRS89_NTM_ZONE_5_PLUS_NN54_HEIGHT = 'urn:ogc:def:crs:EPSG::6145';

    /**
     * ETRS89 / NTM zone 6 + NN2000 height
     * Extent: Norway - onshore - between 6°E and 7°E.
     */
    public const EPSG_ETRS89_NTM_ZONE_6_PLUS_NN2000_HEIGHT = 'urn:ogc:def:crs:EPSG::5946';

    /**
     * ETRS89 / NTM zone 6 + NN54 height
     * Extent: Norway - onshore - between 6°E and 7°E.
     * Replaced by ETRS89 / NTM zone 6 + NN2000 height (compound CRS code 5946).
     */
    public const EPSG_ETRS89_NTM_ZONE_6_PLUS_NN54_HEIGHT = 'urn:ogc:def:crs:EPSG::6146';

    /**
     * ETRS89 / NTM zone 7 + NN2000 height
     * Extent: Norway - onshore - between 7°E and 8°E.
     */
    public const EPSG_ETRS89_NTM_ZONE_7_PLUS_NN2000_HEIGHT = 'urn:ogc:def:crs:EPSG::5947';

    /**
     * ETRS89 / NTM zone 7 + NN54 height
     * Extent: Norway - onshore - between 7°E and 8°E.
     * Replaced by ETRS89 / NTM zone 7 + NN2000 height (compound CRS code 5947).
     */
    public const EPSG_ETRS89_NTM_ZONE_7_PLUS_NN54_HEIGHT = 'urn:ogc:def:crs:EPSG::6147';

    /**
     * ETRS89 / NTM zone 8 + NN2000 height
     * Extent: Norway - onshore - between 8°E and 9°E.
     */
    public const EPSG_ETRS89_NTM_ZONE_8_PLUS_NN2000_HEIGHT = 'urn:ogc:def:crs:EPSG::5948';

    /**
     * ETRS89 / NTM zone 8 + NN54 height
     * Extent: Norway - onshore - between 8°E and 9°E.
     * Replaced by ETRS89 / NTM zone 8 + NN2000 height (compound CRS code 5948).
     */
    public const EPSG_ETRS89_NTM_ZONE_8_PLUS_NN54_HEIGHT = 'urn:ogc:def:crs:EPSG::6148';

    /**
     * ETRS89 / NTM zone 9 + NN2000 height
     * Extent: Norway - onshore - between 9°E and 10°E.
     */
    public const EPSG_ETRS89_NTM_ZONE_9_PLUS_NN2000_HEIGHT = 'urn:ogc:def:crs:EPSG::5949';

    /**
     * ETRS89 / NTM zone 9 + NN54 height
     * Extent: Norway - onshore - between 9°E and 10°E.
     * Replaced by ETRS89 / NTM zone 9 + NN2000 height (compound CRS code 5949).
     */
    public const EPSG_ETRS89_NTM_ZONE_9_PLUS_NN54_HEIGHT = 'urn:ogc:def:crs:EPSG::6149';

    /**
     * ETRS89 / TM35FIN(N,E) + N2000 height
     * Extent: Finland - onshore.
     * Replaces ETRS89 / TM35FIN(N,E) + N60 height (CRS code 3902).
     */
    public const EPSG_ETRS89_TM35FIN_N_E_PLUS_N2000_HEIGHT = 'urn:ogc:def:crs:EPSG::3903';

    /**
     * ETRS89 / TM35FIN(N,E) + N60 height
     * Extent: Finland - onshore.
     * Replaces YKJ/N60 (CRS code 3901). Replaced by ETRS89-TM35FIN(N,E)/N2000 (CRS code 3903).
     */
    public const EPSG_ETRS89_TM35FIN_N_E_PLUS_N60_HEIGHT = 'urn:ogc:def:crs:EPSG::3902';

    /**
     * ETRS89 / UTM zone 31N + DHHN92 height
     * Extent: Germany - onshore west of 6°E.
     */
    public const EPSG_ETRS89_UTM_ZONE_31N_PLUS_DHHN92_HEIGHT = 'urn:ogc:def:crs:EPSG::5554';

    /**
     * ETRS89 / UTM zone 31N + NN2000 height
     * Extent: Norway - onshore - west of 6°E.
     */
    public const EPSG_ETRS89_UTM_ZONE_31N_PLUS_NN2000_HEIGHT = 'urn:ogc:def:crs:EPSG::5971';

    /**
     * ETRS89 / UTM zone 31N + NN54 height
     * Extent: Norway - onshore - west of 6°E.
     * Replaced by ETRS89 / UTM zone 31N + NN2000 height (compound CRS code 5971).
     */
    public const EPSG_ETRS89_UTM_ZONE_31N_PLUS_NN54_HEIGHT = 'urn:ogc:def:crs:EPSG::6171';

    /**
     * ETRS89 / UTM zone 32N + DHHN92 height
     * Extent: Germany - onshore between 6°E and 12°E.
     */
    public const EPSG_ETRS89_UTM_ZONE_32N_PLUS_DHHN92_HEIGHT = 'urn:ogc:def:crs:EPSG::5555';

    /**
     * ETRS89 / UTM zone 32N + DVR90 height
     * Extent: Denmark - onshore west of 12°E - Zealand, Jutland, Fuen and Lolland.
     */
    public const EPSG_ETRS89_UTM_ZONE_32N_PLUS_DVR90_HEIGHT = 'urn:ogc:def:crs:EPSG::7416';

    /**
     * ETRS89 / UTM zone 32N + NN2000 height
     * Extent: Norway - onshore - between 6°E and 12°E.
     */
    public const EPSG_ETRS89_UTM_ZONE_32N_PLUS_NN2000_HEIGHT = 'urn:ogc:def:crs:EPSG::5972';

    /**
     * ETRS89 / UTM zone 32N + NN54 height
     * Extent: Norway - onshore - between 6°E and 12°E.
     * Replaced by ETRS89 / UTM zone 32N + NN2000 height (compound CRS code 5972).
     */
    public const EPSG_ETRS89_UTM_ZONE_32N_PLUS_NN54_HEIGHT = 'urn:ogc:def:crs:EPSG::6172';

    /**
     * ETRS89 / UTM zone 33N + DHHN92 height
     * Extent: Germany - onshore east of 12°E.
     */
    public const EPSG_ETRS89_UTM_ZONE_33N_PLUS_DHHN92_HEIGHT = 'urn:ogc:def:crs:EPSG::5556';

    /**
     * ETRS89 / UTM zone 33N + DVR90 height
     * Extent: Denmark - onshore east of 12°E - Zealand and Falster, Bornholm.
     */
    public const EPSG_ETRS89_UTM_ZONE_33N_PLUS_DVR90_HEIGHT = 'urn:ogc:def:crs:EPSG::7417';

    /**
     * ETRS89 / UTM zone 33N + NN2000 height
     * Extent: Norway - onshore - between 12°E and 18°E.
     */
    public const EPSG_ETRS89_UTM_ZONE_33N_PLUS_NN2000_HEIGHT = 'urn:ogc:def:crs:EPSG::5973';

    /**
     * ETRS89 / UTM zone 33N + NN54 height
     * Extent: Norway - onshore - between 12°E and 18°E.
     * Replaced by ETRS89 / UTM zone 33N + NN2000 height (compound CRS code 5973).
     */
    public const EPSG_ETRS89_UTM_ZONE_33N_PLUS_NN54_HEIGHT = 'urn:ogc:def:crs:EPSG::6173';

    /**
     * ETRS89 / UTM zone 34N + NN2000 height
     * Extent: Norway - onshore - between 18°E and 24°E.
     */
    public const EPSG_ETRS89_UTM_ZONE_34N_PLUS_NN2000_HEIGHT = 'urn:ogc:def:crs:EPSG::5974';

    /**
     * ETRS89 / UTM zone 34N + NN54 height
     * Extent: Norway - onshore - between 18°E and 24°E.
     * Replaced by ETRS89 / UTM zone 34N + NN2000 height (compound CRS code 5974).
     */
    public const EPSG_ETRS89_UTM_ZONE_34N_PLUS_NN54_HEIGHT = 'urn:ogc:def:crs:EPSG::6174';

    /**
     * ETRS89 / UTM zone 35N + NN2000 height
     * Extent: Norway - onshore - between 24°E and 30°E.
     */
    public const EPSG_ETRS89_UTM_ZONE_35N_PLUS_NN2000_HEIGHT = 'urn:ogc:def:crs:EPSG::5975';

    /**
     * ETRS89 / UTM zone 35N + NN54 height
     * Extent: Norway - onshore - between 24°E and 30°E.
     * Replaced by ETRS89 / UTM zone 35N + NN2000 height (compound CRS code 5975).
     */
    public const EPSG_ETRS89_UTM_ZONE_35N_PLUS_NN54_HEIGHT = 'urn:ogc:def:crs:EPSG::6175';

    /**
     * ETRS89 / UTM zone 36N + NN2000 height
     * Extent: Norway - onshore - east of 30°E.
     */
    public const EPSG_ETRS89_UTM_ZONE_36N_PLUS_NN2000_HEIGHT = 'urn:ogc:def:crs:EPSG::5976';

    /**
     * ETRS89 / UTM zone 36N + NN54 height
     * Extent: Norway - onshore - east of 30°E.
     * Replaced by ETRS89 / UTM zone 36N + NN2000 height (compound CRS code 5976).
     */
    public const EPSG_ETRS89_UTM_ZONE_36N_PLUS_NN54_HEIGHT = 'urn:ogc:def:crs:EPSG::6176';

    /**
     * FEH2010 + FCSVR10 height
     * Extent: Fehmarnbelt area of Denmark and Germany.
     */
    public const EPSG_FEH2010_PLUS_FCSVR10_HEIGHT = 'urn:ogc:def:crs:EPSG::9519';

    /**
     * FEH2010 / Fehmarnbelt TM + FCSVR10 height
     * Extent: Fehmarnbelt area of Denmark and Germany.
     */
    public const EPSG_FEH2010_FEHMARNBELT_TM_PLUS_FCSVR10_HEIGHT = 'urn:ogc:def:crs:EPSG::5598';

    /**
     * GBK19 Grid + ODN height
     * Extent: UK - on or related to the rail route from Glasgow via Barrhead to Kilmarnock and the branch to East
     * Kilbride.
     */
    public const EPSG_GBK19_GRID_PLUS_ODN_HEIGHT = 'urn:ogc:def:crs:EPSG::9457';

    /**
     * GDA2020 + AHD height
     * Extent: Australia - Australian Capital Territory, New South Wales, Northern Territory, Queensland, South
     * Australia, Tasmania, Western Australia and Victoria - onshore. Christmas Island - onshore. Cocos and Keeling
     * Islands - onshore.
     */
    public const EPSG_GDA2020_PLUS_AHD_HEIGHT = 'urn:ogc:def:crs:EPSG::9463';

    /**
     * GDA2020 + AVWS height
     * Extent: Australia including Lord Howe Island, Macquarie Islands, Ashmore and Cartier Islands, Christmas Island,
     * Cocos (Keeling) Islands, Norfolk Island. All onshore and offshore.
     */
    public const EPSG_GDA2020_PLUS_AVWS_HEIGHT = 'urn:ogc:def:crs:EPSG::9462';

    /**
     * GDA94 + AHD height
     * Extent: Australia - Australian Capital Territory, New South Wales, Northern Territory, Queensland, South
     * Australia, Tasmania, Western Australia and Victoria - onshore. Christmas Island - onshore. Cocos and Keeling
     * Islands - onshore.
     */
    public const EPSG_GDA94_PLUS_AHD_HEIGHT = 'urn:ogc:def:crs:EPSG::9464';

    /**
     * GR96 + GVR2000 height
     * Extent: Greenland - onshore and offshore between 59°N and 84°N and west of 10°W.
     * Replaced by GR96 + GVR2016 height (CRS code 8350).
     */
    public const EPSG_GR96_PLUS_GVR2000_HEIGHT = 'urn:ogc:def:crs:EPSG::8349';

    /**
     * GR96 + GVR2016 height
     * Extent: Greenland - onshore and offshore between 58°N and 85°N and west of 7°W.
     * Replaces GR96 + GVR2000 height (CRS code 8349).
     */
    public const EPSG_GR96_PLUS_GVR2016_HEIGHT = 'urn:ogc:def:crs:EPSG::8350';

    /**
     * HS2 Survey Grid + HS2-VRF height
     * Extent: UK - HS2 phases 1 and 2a railway corridor from London to Birmingham, Lichfield and Crewe.
     * Realized by use of HS2TN15 transformation and HS2GM15 geoid model from ETRS89 OSNet v2009.
     */
    public const EPSG_HS2_SURVEY_GRID_PLUS_HS2_VRF_HEIGHT = 'urn:ogc:def:crs:EPSG::9306';

    /**
     * ITRF2005 + SA LLD height
     * Extent: South Africa - mainland onshore.
     */
    public const EPSG_ITRF2005_PLUS_SA_LLD_HEIGHT = 'urn:ogc:def:crs:EPSG::9543';

    /**
     * JGD2000 + JGD2000 (vertical) height
     * Extent: Japan - onshore mainland - Hokkaido, Honshu, Shikoku, Kyushu.
     * Replaces Tokyo + JSLD69 height and Tokyo + JSLD72 height (CRS codes 7414 and 6700) from April 2002. Replaced by
     * JGD2011 + JGD2011 (vertical) height (CRS code 6697) with effect from 21st October 2011.
     */
    public const EPSG_JGD2000_PLUS_JGD2000_VERTICAL_HEIGHT = 'urn:ogc:def:crs:EPSG::6696';

    /**
     * JGD2011 + JGD2011 (vertical) height
     * Extent: Japan - onshore mainland - Hokkaido, Honshu, Shikoku, Kyushu.
     * Replaces JGD2000 + JGD2000 (vertical) height (CRS code 6696) with effect from 21st October 2011.
     */
    public const EPSG_JGD2011_PLUS_JGD2011_VERTICAL_HEIGHT = 'urn:ogc:def:crs:EPSG::6697';

    /**
     * KKJ / Finland Uniform Coordinate System + N60 height
     * Extent: Finland - onshore.
     * Replaced by ETRS89 / TM35FIN(N,E) + N60 height (CRS code 3902).
     */
    public const EPSG_KKJ_FINLAND_UNIFORM_COORDINATE_SYSTEM_PLUS_N60_HEIGHT = 'urn:ogc:def:crs:EPSG::3901';

    /**
     * KSA-GRF17 + KSA-VRF14 height
     * Extent: Saudi Arabia - onshore.
     */
    public const EPSG_KSA_GRF17_PLUS_KSA_VRF14_HEIGHT = 'urn:ogc:def:crs:EPSG::9520';

    /**
     * MGI + EVRF2000 Austria height
     * Extent: Austria.
     */
    public const EPSG_MGI_PLUS_EVRF2000_AUSTRIA_HEIGHT = 'urn:ogc:def:crs:EPSG::9501';

    /**
     * MML07 Grid + ODN height
     * Extent: UK - on or related to the Midland Mainline rail route from Sheffield to London.
     */
    public const EPSG_MML07_GRID_PLUS_ODN_HEIGHT = 'urn:ogc:def:crs:EPSG::9374';

    /**
     * NAD27 + NGVD29 height (ftUS)
     * Extent: United States (USA) - CONUS onshore - Alabama; Arizona; Arkansas; California; Colorado; Connecticut;
     * Delaware; Florida; Georgia; Idaho; Illinois; Indiana; Iowa; Kansas; Kentucky; Louisiana; Maine; Maryland;
     * Massachusetts; Michigan; Minnesota; Mississippi; Missouri; Montana; Nebraska; Nevada; New Hampshire; New Jersey;
     * New Mexico; New York; North Carolina; North Dakota; Ohio; Oklahoma; Oregon; Pennsylvania; Rhode Island; South
     * Carolina; South Dakota; Tennessee; Texas; Utah; Vermont; Virginia; Washington; West Virginia; Wisconsin;
     * Wyoming.
     */
    public const EPSG_NAD27_PLUS_NGVD29_HEIGHT_FTUS = 'urn:ogc:def:crs:EPSG::7406';

    /**
     * NAD27 / Texas North + NGVD29 height (ftUS)
     * Extent: United States (USA) - Texas - counties of: Armstrong; Briscoe; Carson; Castro; Childress; Collingsworth;
     * Dallam; Deaf Smith; Donley; Gray; Hall; Hansford; Hartley; Hemphill; Hutchinson; Lipscomb; Moore; Ochiltree;
     * Oldham; Parmer; Potter; Randall; Roberts; Sherman; Swisher; Wheeler.
     */
    public const EPSG_NAD27_TEXAS_NORTH_PLUS_NGVD29_HEIGHT_FTUS = 'urn:ogc:def:crs:EPSG::7407';

    /**
     * NAD83 + NAVD88 height
     * Extent: United States (USA) - CONUS and Alaska - onshore - Alabama; Alaska mainland; Arizona; Arkansas;
     * California; Colorado; Connecticut; Delaware; Florida; Georgia; Idaho; Illinois; Indiana; Iowa; Kansas; Kentucky;
     * Louisiana; Maine; Maryland; Massachusetts; Michigan; Minnesota; Mississippi; Missouri; Montana; Nebraska;
     * Nevada; New Hampshire; New Jersey; New Mexico; New York; North Carolina; North Dakota; Ohio; Oklahoma; Oregon;
     * Pennsylvania; Rhode Island; South Carolina; South Dakota; Tennessee; Texas; Utah; Vermont; Virginia; Washington;
     * West Virginia; Wisconsin; Wyoming.
     */
    public const EPSG_NAD83_PLUS_NAVD88_HEIGHT = 'urn:ogc:def:crs:EPSG::5498';

    /**
     * NAD83 / Alabama East + NAVD88 height
     * Extent: United States (USA) - Alabama east of approximately 86°37'W - counties Barbour; Bullock; Calhoun;
     * Chambers; Cherokee; Clay; Cleburne; Coffee; Coosa; Covington; Crenshaw; Dale; De Kalb; Elmore; Etowah; Geneva;
     * Henry; Houston; Jackson; Lee; Macon; Madison; Marshall; Montgomery; Pike; Randolph; Russell; StClair; Talladega;
     * Tallapoosa.
     */
    public const EPSG_NAD83_ALABAMA_EAST_PLUS_NAVD88_HEIGHT = 'urn:ogc:def:crs:EPSG::8801';

    /**
     * NAD83 / Alabama West + NAVD88 height
     * Extent: United States (USA) - Alabama west of approximately 86°37'W - counties Autauga; Baldwin; Bibb; Blount;
     * Butler; Chilton; Choctaw; Clarke; Colbert; Conecuh; Cullman; Dallas; Escambia; Fayette; Franklin; Greene; Hale;
     * Jefferson; Lamar; Lauderdale; Lawrence; Limestone; Lowndes; Marengo; Marion; Mobile; Monroe; Morgan; Perry;
     * Pickens; Shelby; Sumter; Tuscaloosa; Walker; Washington; Wilcox; Winston.
     */
    public const EPSG_NAD83_ALABAMA_WEST_PLUS_NAVD88_HEIGHT = 'urn:ogc:def:crs:EPSG::8802';

    /**
     * NAD83 / Alaska zone 1 + NAVD88 height
     * Extent: United States (USA) - Alaska - east of 141°W; i.e. Panhandle.
     */
    public const EPSG_NAD83_ALASKA_ZONE_1_PLUS_NAVD88_HEIGHT = 'urn:ogc:def:crs:EPSG::8803';

    /**
     * NAD83 / Alaska zone 10 + NAVD88 height
     * Extent: United States (USA) - Alaska - Aleutian Islands onshore.
     */
    public const EPSG_NAD83_ALASKA_ZONE_10_PLUS_NAVD88_HEIGHT = 'urn:ogc:def:crs:EPSG::8812';

    /**
     * NAD83 / Alaska zone 2 + NAVD88 height
     * Extent: United States (USA) - Alaska - between 144°W and 141°W, onshore.
     */
    public const EPSG_NAD83_ALASKA_ZONE_2_PLUS_NAVD88_HEIGHT = 'urn:ogc:def:crs:EPSG::8804';

    /**
     * NAD83 / Alaska zone 3 + NAVD88 height
     * Extent: United States (USA) - Alaska - between 148°W and 144°W.
     */
    public const EPSG_NAD83_ALASKA_ZONE_3_PLUS_NAVD88_HEIGHT = 'urn:ogc:def:crs:EPSG::8805';

    /**
     * NAD83 / Alaska zone 4 + NAVD88 height
     * Extent: United States (USA) - Alaska - between 152°W and 148°W, onshore.
     */
    public const EPSG_NAD83_ALASKA_ZONE_4_PLUS_NAVD88_HEIGHT = 'urn:ogc:def:crs:EPSG::8806';

    /**
     * NAD83 / Alaska zone 5 + NAVD88 height
     * Extent: United States (USA) - Alaska - between 156°W and 152°W.
     */
    public const EPSG_NAD83_ALASKA_ZONE_5_PLUS_NAVD88_HEIGHT = 'urn:ogc:def:crs:EPSG::8807';

    /**
     * NAD83 / Alaska zone 6 + NAVD88 height
     * Extent: United States (USA) - Alaska - between 160°W and 156°W, onshore.
     */
    public const EPSG_NAD83_ALASKA_ZONE_6_PLUS_NAVD88_HEIGHT = 'urn:ogc:def:crs:EPSG::8808';

    /**
     * NAD83 / Alaska zone 7 + NAVD88 height
     * Extent: United States (USA) - Alaska - between 164°W and 160°W, onshore.
     */
    public const EPSG_NAD83_ALASKA_ZONE_7_PLUS_NAVD88_HEIGHT = 'urn:ogc:def:crs:EPSG::8809';

    /**
     * NAD83 / Alaska zone 8 + NAVD88 height
     * Extent: United States (USA) - Alaska onshore north of 54°30'N and between 168°W and 164°W.
     */
    public const EPSG_NAD83_ALASKA_ZONE_8_PLUS_NAVD88_HEIGHT = 'urn:ogc:def:crs:EPSG::8810';

    /**
     * NAD83 / Alaska zone 9 + NAVD88 height
     * Extent: United States (USA) - Alaska onshore north of 54°30'N and west of 168°W.
     */
    public const EPSG_NAD83_ALASKA_ZONE_9_PLUS_NAVD88_HEIGHT = 'urn:ogc:def:crs:EPSG::8811';

    /**
     * NAD83 / Arizona Central (ft) + NAVD88 height (ft)
     * Extent: United States (USA) - Arizona - counties Coconino; Maricopa; Pima; Pinal; Santa Cruz; Yavapai.
     */
    public const EPSG_NAD83_ARIZONA_CENTRAL_FT_PLUS_NAVD88_HEIGHT_FT = 'urn:ogc:def:crs:EPSG::8701';

    /**
     * NAD83 / Arizona East (ft) + NAVD88 height (ft)
     * Extent: United States (USA) - Arizona - counties Apache; Cochise; Gila; Graham; Greenlee; Navajo.
     */
    public const EPSG_NAD83_ARIZONA_EAST_FT_PLUS_NAVD88_HEIGHT_FT = 'urn:ogc:def:crs:EPSG::8700';

    /**
     * NAD83 / Arizona West (ft) + NAVD88 height (ft)
     * Extent: United States (USA) - Arizona - counties of La Paz; Mohave; Yuma.
     */
    public const EPSG_NAD83_ARIZONA_WEST_FT_PLUS_NAVD88_HEIGHT_FT = 'urn:ogc:def:crs:EPSG::8702';

    /**
     * NAD83 / Arkansas North (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Arkansas - counties of Baxter; Benton; Boone; Carroll; Clay; Cleburne; Conway;
     * Craighead; Crawford; Crittenden; Cross; Faulkner; Franklin; Fulton; Greene; Independence; Izard; Jackson;
     * Johnson; Lawrence; Logan; Madison; Marion; Mississippi; Newton; Perry; Poinsett; Pope; Randolph; Scott; Searcy;
     * Sebastian; Sharp; St Francis; Stone; Van Buren; Washington; White; Woodruff; Yell.
     */
    public const EPSG_NAD83_ARKANSAS_NORTH_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 'urn:ogc:def:crs:EPSG::8712';

    /**
     * NAD83 / Arkansas South (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Arkansas - counties Arkansas; Ashley; Bradley; Calhoun; Chicot; Clark; Cleveland;
     * Columbia; Dallas; Desha; Drew; Garland; Grant; Hempstead; Hot Spring; Howard; Jefferson; Lafayette; Lee;
     * Lincoln; Little River; Lonoke; Miller; Monroe; Montgomery; Nevada; Ouachita; Phillips; Pike; Polk; Prairie;
     * Pulaski; Saline; Sevier; Union.
     */
    public const EPSG_NAD83_ARKANSAS_SOUTH_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 'urn:ogc:def:crs:EPSG::8713';

    /**
     * NAD83 / California zone 1 (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - California - counties Del Norte; Humboldt; Lassen; Modoc; Plumas; Shasta;
     * Siskiyou; Tehama; Trinity.
     */
    public const EPSG_NAD83_CALIFORNIA_ZONE_1_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 'urn:ogc:def:crs:EPSG::8714';

    /**
     * NAD83 / California zone 2 (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - California - counties of Alpine; Amador; Butte; Colusa; El Dorado; Glenn; Lake;
     * Mendocino; Napa; Nevada; Placer; Sacramento; Sierra; Solano; Sonoma; Sutter; Yolo; Yuba.
     */
    public const EPSG_NAD83_CALIFORNIA_ZONE_2_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 'urn:ogc:def:crs:EPSG::8715';

    /**
     * NAD83 / California zone 3 (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - California - counties Alameda; Calaveras; Contra Costa; Madera; Marin; Mariposa;
     * Merced; Mono; San Francisco; San Joaquin; San Mateo; Santa Clara; Santa Cruz; Stanislaus; Tuolumne.
     */
    public const EPSG_NAD83_CALIFORNIA_ZONE_3_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 'urn:ogc:def:crs:EPSG::8716';

    /**
     * NAD83 / California zone 4 (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - California - counties Fresno; Inyo; Kings; Monterey; San Benito; Tulare.
     */
    public const EPSG_NAD83_CALIFORNIA_ZONE_4_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 'urn:ogc:def:crs:EPSG::8717';

    /**
     * NAD83 / California zone 5 (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - California - counties Kern; Los Angeles; San Bernardino; San Luis Obispo; Santa
     * Barbara; Ventura.
     */
    public const EPSG_NAD83_CALIFORNIA_ZONE_5_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 'urn:ogc:def:crs:EPSG::8718';

    /**
     * NAD83 / California zone 6 (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - California - counties Imperial; Orange; Riverside; San Diego.
     */
    public const EPSG_NAD83_CALIFORNIA_ZONE_6_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 'urn:ogc:def:crs:EPSG::8719';

    /**
     * NAD83 / Colorado Central (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Colorado - counties Arapahoe; Chaffee; Cheyenne; Clear Creek; Delta; Denver;
     * Douglas; Eagle; El Paso; Elbert; Fremont; Garfield; Gunnison; Jefferson; Kit Carson; Lake; Lincoln; Mesa; Park;
     * Pitkin; Summit; Teller.
     */
    public const EPSG_NAD83_COLORADO_CENTRAL_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 'urn:ogc:def:crs:EPSG::8721';

    /**
     * NAD83 / Colorado North (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Colorado - counties Adams; Boulder; Gilpin; Grand; Jackson; Larimer; Logan;
     * Moffat; Morgan; Phillips; Rio Blanco; Routt; Sedgwick; Washington; Weld; Yuma.
     */
    public const EPSG_NAD83_COLORADO_NORTH_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 'urn:ogc:def:crs:EPSG::8720';

    /**
     * NAD83 / Colorado South (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Colorado - counties Alamosa; Archuleta; Baca; Bent; Conejos; Costilla; Crowley;
     * Custer; Dolores; Hinsdale; Huerfano; Kiowa; La Plata; Las Animas; Mineral; Montezuma; Montrose; Otero; Ouray;
     * Prowers; Pueblo; Rio Grande; Saguache; San Juan; San Miguel.
     */
    public const EPSG_NAD83_COLORADO_SOUTH_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 'urn:ogc:def:crs:EPSG::8722';

    /**
     * NAD83 / Connecticut (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Connecticut - counties of Fairfield; Hartford; Litchfield; Middlesex; New Haven;
     * New London; Tolland; Windham.
     */
    public const EPSG_NAD83_CONNECTICUT_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 'urn:ogc:def:crs:EPSG::8723';

    /**
     * NAD83 / Delaware (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Delaware - counties of Kent; New Castle; Sussex.
     */
    public const EPSG_NAD83_DELAWARE_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 'urn:ogc:def:crs:EPSG::8724';

    /**
     * NAD83 / Florida East (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Florida - counties of Brevard; Broward; Clay; Collier; Dade; Duval; Flagler;
     * Glades; Hendry; Highlands; Indian River; Lake; Martin; Monroe; Nassau; Okeechobee; Orange; Osceola; Palm Beach;
     * Putnam; Seminole; St Johns; St Lucie; Volusia.
     */
    public const EPSG_NAD83_FLORIDA_EAST_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 'urn:ogc:def:crs:EPSG::8726';

    /**
     * NAD83 / Florida North (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Florida - counties of Alachua; Baker; Bay; Bradford; Calhoun; Columbia; Dixie;
     * Escambia; Franklin; Gadsden; Gilchrist; Gulf; Hamilton; Holmes; Jackson; Jefferson; Lafayette; Leon; Liberty;
     * Madison; Okaloosa; Santa Rosa; Suwannee; Taylor; Union; Wakulla; Walton; Washington.
     */
    public const EPSG_NAD83_FLORIDA_NORTH_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 'urn:ogc:def:crs:EPSG::8725';

    /**
     * NAD83 / Florida West (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Florida - counties of Charlotte; Citrus; De Soto; Hardee; Hernando; Hillsborough;
     * Lee; Levy; Manatee; Marion; Pasco; Pinellas; Polk; Sarasota; Sumter.
     */
    public const EPSG_NAD83_FLORIDA_WEST_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 'urn:ogc:def:crs:EPSG::8727';

    /**
     * NAD83 / Georgia East (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Georgia - counties of Appling; Atkinson; Bacon; Baldwin; Brantley; Bryan; Bulloch;
     * Burke; Camden; Candler; Charlton; Chatham; Clinch; Coffee; Columbia; Dodge; Echols; Effingham; Elbert; Emanuel;
     * Evans; Franklin; Glascock; Glynn; Greene; Hancock; Hart; Jeff Davis; Jefferson; Jenkins; Johnson; Lanier;
     * Laurens; Liberty; Lincoln; Long; Madison; McDuffie; McIntosh; Montgomery; Oglethorpe; Pierce; Richmond; Screven;
     * Stephens; Taliaferro; Tattnall; Telfair; Toombs; Treutlen; Ware; Warren; Washington; Wayne; Wheeler; Wilkes;
     * Wilkinson.
     */
    public const EPSG_NAD83_GEORGIA_EAST_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 'urn:ogc:def:crs:EPSG::8728';

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
     */
    public const EPSG_NAD83_GEORGIA_WEST_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 'urn:ogc:def:crs:EPSG::8729';

    /**
     * NAD83 / Idaho Central (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Idaho - counties of Blaine; Butte; Camas; Cassia; Custer; Gooding; Jerome; Lemhi;
     * Lincoln; Minidoka; Twin Falls.
     */
    public const EPSG_NAD83_IDAHO_CENTRAL_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 'urn:ogc:def:crs:EPSG::8731';

    /**
     * NAD83 / Idaho East (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Idaho - counties of Bannock; Bear Lake; Bingham; Bonneville; Caribou; Clark;
     * Franklin; Fremont; Jefferson; Madison; Oneida; Power; Teton.
     */
    public const EPSG_NAD83_IDAHO_EAST_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 'urn:ogc:def:crs:EPSG::8730';

    /**
     * NAD83 / Idaho West (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Idaho - counties of Ada; Adams; Benewah; Boise; Bonner; Boundary; Canyon;
     * Clearwater; Elmore; Gem; Idaho; Kootenai; Latah; Lewis; Nez Perce; Owyhee; Payette; Shoshone; Valley;
     * Washington.
     */
    public const EPSG_NAD83_IDAHO_WEST_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 'urn:ogc:def:crs:EPSG::8732';

    /**
     * NAD83 / Illinois East (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Illinois - counties of Boone; Champaign; Clark; Clay; Coles; Cook; Crawford;
     * Cumberland; De Kalb; De Witt; Douglas; Du Page; Edgar; Edwards; Effingham; Fayette; Ford; Franklin; Gallatin;
     * Grundy; Hamilton; Hardin; Iroquois; Jasper; Jefferson; Johnson; Kane; Kankakee; Kendall; La Salle; Lake;
     * Lawrence; Livingston; Macon; Marion; Massac; McHenry; McLean; Moultrie; Piatt; Pope; Richland; Saline; Shelby;
     * Vermilion; Wabash; Wayne; White; Will; Williamson.
     */
    public const EPSG_NAD83_ILLINOIS_EAST_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 'urn:ogc:def:crs:EPSG::8733';

    /**
     * NAD83 / Illinois West (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Illinois - counties of Adams; Alexander; Bond; Brown; Bureau; Calhoun; Carroll;
     * Cass; Christian; Clinton; Fulton; Greene; Hancock; Henderson; Henry; Jackson; Jersey; Jo Daviess; Knox; Lee;
     * Logan; Macoupin; Madison; Marshall; Mason; McDonough; Menard; Mercer; Monroe; Montgomery; Morgan; Ogle; Peoria;
     * Perry; Pike; Pulaski; Putnam; Randolph; Rock Island; Sangamon; Schuyler; Scott; St Clair; Stark; Stephenson;
     * Tazewell; Union; Warren; Washington; Whiteside; Winnebago; Woodford.
     */
    public const EPSG_NAD83_ILLINOIS_WEST_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 'urn:ogc:def:crs:EPSG::8734';

    /**
     * NAD83 / Indiana East (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Indiana - counties of Adams; Allen; Bartholomew; Blackford; Brown; Cass; Clark; De
     * Kalb; Dearborn; Decatur; Delaware; Elkhart; Fayette; Floyd; Franklin; Fulton; Grant; Hamilton; Hancock;
     * Harrison; Henry; Howard; Huntington; Jackson; Jay; Jefferson; Jennings; Johnson; Kosciusko; Lagrange; Madison;
     * Marion; Marshall; Miami; Noble; Ohio; Randolph; Ripley; Rush; Scott; Shelby; St Joseph; Steuben; Switzerland;
     * Tipton; Union; Wabash; Washington; Wayne; Wells; Whitley.
     */
    public const EPSG_NAD83_INDIANA_EAST_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 'urn:ogc:def:crs:EPSG::8735';

    /**
     * NAD83 / Indiana West (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Indiana - counties of Benton; Boone; Carroll; Clay; Clinton; Crawford; Daviess;
     * Dubois; Fountain; Gibson; Greene; Hendricks; Jasper; Knox; La Porte; Lake; Lawrence; Martin; Monroe; Montgomery;
     * Morgan; Newton; Orange; Owen; Parke; Perry; Pike; Porter; Posey; Pulaski; Putnam; Spencer; Starke; Sullivan;
     * Tippecanoe; Vanderburgh; Vermillion; Vigo; Warren; Warrick; White.
     */
    public const EPSG_NAD83_INDIANA_WEST_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 'urn:ogc:def:crs:EPSG::8736';

    /**
     * NAD83 / Iowa North (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Iowa - counties of Allamakee; Benton; Black Hawk; Boone; Bremer; Buchanan; Buena
     * Vista; Butler; Calhoun; Carroll; Cerro Gordo; Cherokee; Chickasaw; Clay; Clayton; Crawford; Delaware; Dickinson;
     * Dubuque; Emmet; Fayette; Floyd; Franklin; Greene; Grundy; Hamilton; Hancock; Hardin; Howard; Humboldt; Ida;
     * Jackson; Jones; Kossuth; Linn; Lyon; Marshall; Mitchell; Monona; O'Brien; Osceola; Palo Alto; Plymouth;
     * Pocahontas; Sac; Sioux; Story; Tama; Webster; Winnebago; Winneshiek; Woodbury; Worth; Wright.
     */
    public const EPSG_NAD83_IOWA_NORTH_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 'urn:ogc:def:crs:EPSG::8737';

    /**
     * NAD83 / Iowa South (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Iowa - counties of Adair; Adams; Appanoose; Audubon; Cass; Cedar; Clarke; Clinton;
     * Dallas; Davis; Decatur; Des Moines; Fremont; Guthrie; Harrison; Henry; Iowa; Jasper; Jefferson; Johnson; Keokuk;
     * Lee; Louisa; Lucas; Madison; Mahaska; Marion; Mills; Monroe; Montgomery; Muscatine; Page; Polk; Pottawattamie;
     * Poweshiek; Ringgold; Scott; Shelby; Taylor; Union; Van Buren; Wapello; Warren; Washington; Wayne.
     */
    public const EPSG_NAD83_IOWA_SOUTH_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 'urn:ogc:def:crs:EPSG::8738';

    /**
     * NAD83 / Kansas North (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Kansas - counties of Atchison; Brown; Cheyenne; Clay; Cloud; Decatur; Dickinson;
     * Doniphan; Douglas; Ellis; Ellsworth; Geary; Gove; Graham; Jackson; Jefferson; Jewell; Johnson; Leavenworth;
     * Lincoln; Logan; Marshall; Mitchell; Morris; Nemaha; Norton; Osborne; Ottawa; Phillips; Pottawatomie; Rawlins;
     * Republic; Riley; Rooks; Russell; Saline; Shawnee; Sheridan; Sherman; Smith; Thomas; Trego; Wabaunsee; Wallace;
     * Washington; Wyandotte.
     */
    public const EPSG_NAD83_KANSAS_NORTH_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 'urn:ogc:def:crs:EPSG::8739';

    /**
     * NAD83 / Kansas South (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Kansas - counties of Allen; Anderson; Barber; Barton; Bourbon; Butler; Chase;
     * Chautauqua; Cherokee; Clark; Coffey; Comanche; Cowley; Crawford; Edwards; Elk; Finney; Ford; Franklin; Grant;
     * Gray; Greeley; Greenwood; Hamilton; Harper; Harvey; Haskell; Hodgeman; Kearny; Kingman; Kiowa; Labette; Lane;
     * Linn; Lyon; Marion; McPherson; Meade; Miami; Montgomery; Morton; Neosho; Ness; Osage; Pawnee; Pratt; Reno; Rice;
     * Rush; Scott; Sedgwick; Seward; Stafford; Stanton; Stevens; Sumner; Wichita; Wilson; Woodson.
     */
    public const EPSG_NAD83_KANSAS_SOUTH_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 'urn:ogc:def:crs:EPSG::8740';

    /**
     * NAD83 / Kentucky North (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Kentucky - counties of Anderson; Bath; Boone; Bourbon; Boyd; Bracken; Bullitt;
     * Campbell; Carroll; Carter; Clark; Elliott; Fayette; Fleming; Franklin; Gallatin; Grant; Greenup; Harrison;
     * Henry; Jefferson; Jessamine; Kenton; Lawrence; Lewis; Mason; Menifee; Montgomery; Morgan; Nicholas; Oldham;
     * Owen; Pendleton; Robertson; Rowan; Scott; Shelby; Spencer; Trimble; Woodford.
     */
    public const EPSG_NAD83_KENTUCKY_NORTH_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 'urn:ogc:def:crs:EPSG::8741';

    /**
     * NAD83 / Kentucky South (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Kentucky - counties of Adair; Allen; Ballard; Barren; Bell; Boyle; Breathitt;
     * Breckinridge; Butler; Caldwell; Calloway; Carlisle; Casey; Christian; Clay; Clinton; Crittenden; Cumberland;
     * Daviess; Edmonson; Estill; Floyd; Fulton; Garrard; Graves; Grayson; Green; Hancock; Hardin; Harlan; Hart;
     * Henderson; Hickman; Hopkins; Jackson; Johnson; Knott; Knox; Larue; Laurel; Lee; Leslie; Letcher; Lincoln;
     * Livingston; Logan; Lyon; Madison; Magoffin; Marion; Marshall; Martin; McCracken; McCreary; McLean; Meade;
     * Mercer; Metcalfe; Monroe; Muhlenberg; Nelson; Ohio; Owsley; Perry; Pike; Powell; Pulaski; Rockcastle; Russell;
     * Simpson; Taylor; Todd; Trigg; Union; Warren; Washington; Wayne; Webster; Whitley; Wolfe.
     */
    public const EPSG_NAD83_KENTUCKY_SOUTH_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 'urn:ogc:def:crs:EPSG::8742';

    /**
     * NAD83 / Louisiana North (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Louisiana - counties of Avoyelles; Bienville; Bossier; Caddo; Caldwell; Catahoula;
     * Claiborne; Concordia; De Soto; East Carroll; Franklin; Grant; Jackson; La Salle; Lincoln; Madison; Morehouse;
     * Natchitoches; Ouachita; Rapides; Red River; Richland; Sabine; Tensas; Union; Vernon; Webster; West Carroll;
     * Winn.
     */
    public const EPSG_NAD83_LOUISIANA_NORTH_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 'urn:ogc:def:crs:EPSG::8743';

    /**
     * NAD83 / Louisiana South (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Louisiana - counties of Acadia; Allen; Ascension; Assumption; Beauregard;
     * Calcasieu; Cameron; East Baton Rouge; East Feliciana; Evangeline; Iberia; Iberville; Jefferson; Jefferson Davis;
     * Lafayette; LaFourche; Livingston; Orleans; Plaquemines; Pointe Coupee; St Bernard; St Charles; St Helena; St
     * James; St John the Baptist; St Landry; St Martin; St Mary; St Tammany; Tangipahoa; Terrebonne; Vermilion;
     * Washington; West Baton Rouge; West Feliciana.
     */
    public const EPSG_NAD83_LOUISIANA_SOUTH_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 'urn:ogc:def:crs:EPSG::8744';

    /**
     * NAD83 / Maine East (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Maine - counties of Aroostook; Hancock; Knox; Penobscot; Piscataquis; Waldo;
     * Washington.
     */
    public const EPSG_NAD83_MAINE_EAST_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 'urn:ogc:def:crs:EPSG::8745';

    /**
     * NAD83 / Maine West (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Maine - counties of Androscoggin; Cumberland; Franklin; Kennebec; Lincoln; Oxford;
     * Sagadahoc; Somerset; York.
     */
    public const EPSG_NAD83_MAINE_WEST_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 'urn:ogc:def:crs:EPSG::8746';

    /**
     * NAD83 / Maryland (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Maryland - counties of Allegany; Anne Arundel; Baltimore; Calvert; Caroline;
     * Carroll; Cecil; Charles; Dorchester; Frederick; Garrett; Harford; Howard; Kent; Montgomery; Prince Georges;
     * Queen Annes; Somerset; St Marys; Talbot; Washington; Wicomico; Worcester.
     */
    public const EPSG_NAD83_MARYLAND_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 'urn:ogc:def:crs:EPSG::8747';

    /**
     * NAD83 / Massachusetts Island (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Massachusetts offshore - counties of Dukes; Nantucket.
     */
    public const EPSG_NAD83_MASSACHUSETTS_ISLAND_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 'urn:ogc:def:crs:EPSG::8749';

    /**
     * NAD83 / Massachusetts Mainland (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Massachusetts onshore - counties of Barnstable; Berkshire; Bristol; Essex;
     * Franklin; Hampden; Hampshire; Middlesex; Norfolk; Plymouth; Suffolk; Worcester.
     */
    public const EPSG_NAD83_MASSACHUSETTS_MAINLAND_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 'urn:ogc:def:crs:EPSG::8748';

    /**
     * NAD83 / Michigan Central (ft) + NAVD88 height (ft)
     * Extent: United States (USA) - Michigan - counties of Alcona; Alpena; Antrim; Arenac; Benzie; Charlevoix;
     * Cheboygan; Clare; Crawford; Emmet; Gladwin; Grand Traverse; Iosco; Kalkaska; Lake; Leelanau; Manistee; Mason;
     * Missaukee; Montmorency; Ogemaw; Osceola; Oscoda; Otsego; Presque Isle; Roscommon; Wexford.
     */
    public const EPSG_NAD83_MICHIGAN_CENTRAL_FT_PLUS_NAVD88_HEIGHT_FT = 'urn:ogc:def:crs:EPSG::8704';

    /**
     * NAD83 / Michigan North (ft) + NAVD88 height (ft)
     * Extent: United States (USA) - Michigan north of approximately 45°45'N - counties of Alger; Baraga; Chippewa;
     * Delta; Dickinson; Gogebic; Houghton; Iron; Keweenaw; Luce; Mackinac; Marquette; Menominee; Ontonagon;
     * Schoolcraft.
     */
    public const EPSG_NAD83_MICHIGAN_NORTH_FT_PLUS_NAVD88_HEIGHT_FT = 'urn:ogc:def:crs:EPSG::8703';

    /**
     * NAD83 / Michigan South (ft) + NAVD88 height (ft)
     * Extent: United States (USA) - Michigan - counties of Allegan; Barry; Bay; Berrien; Branch; Calhoun; Cass;
     * Clinton; Eaton; Genesee; Gratiot; Hillsdale; Huron; Ingham; Ionia; Isabella; Jackson; Kalamazoo; Kent; Lapeer;
     * Lenawee; Livingston; Macomb; Mecosta; Midland; Monroe; Montcalm; Muskegon; Newaygo; Oakland; Oceana; Ottawa;
     * Saginaw; Sanilac; Shiawassee; St Clair; St Joseph; Tuscola; Van Buren; Washtenaw; Wayne.
     */
    public const EPSG_NAD83_MICHIGAN_SOUTH_FT_PLUS_NAVD88_HEIGHT_FT = 'urn:ogc:def:crs:EPSG::8705';

    /**
     * NAD83 / Minnesota Central (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Minnesota - counties of Aitkin; Becker; Benton; Carlton; Cass; Chisago; Clay; Crow
     * Wing; Douglas; Grant; Hubbard; Isanti; Kanabec; Mille Lacs; Morrison; Otter Tail; Pine; Pope; Stearns; Stevens;
     * Todd; Traverse; Wadena; Wilkin.
     */
    public const EPSG_NAD83_MINNESOTA_CENTRAL_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 'urn:ogc:def:crs:EPSG::8751';

    /**
     * NAD83 / Minnesota North (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Minnesota - counties of Beltrami; Clearwater; Cook; Itasca; Kittson; Koochiching;
     * Lake; Lake of the Woods; Mahnomen; Marshall; Norman; Pennington; Polk; Red Lake; Roseau; St Louis.
     */
    public const EPSG_NAD83_MINNESOTA_NORTH_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 'urn:ogc:def:crs:EPSG::8750';

    /**
     * NAD83 / Minnesota South (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Minnesota - counties of Anoka; Big Stone; Blue Earth; Brown; Carver; Chippewa;
     * Cottonwood; Dakota; Dodge; Faribault; Fillmore; Freeborn; Goodhue; Hennepin; Houston; Jackson; Kandiyohi; Lac
     * Qui Parle; Le Sueur; Lincoln; Lyon; Martin; McLeod; Meeker; Mower; Murray; Nicollet; Nobles; Olmsted; Pipestone;
     * Ramsey; Redwood; Renville; Rice; Rock; Scott; Sherburne; Sibley; Steele; Swift; Wabasha; Waseca; Washington;
     * Watonwan; Winona; Wright; Yellow Medicine.
     */
    public const EPSG_NAD83_MINNESOTA_SOUTH_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 'urn:ogc:def:crs:EPSG::8752';

    /**
     * NAD83 / Mississippi East (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Mississippi - counties of Alcorn; Attala; Benton; Calhoun; Chickasaw; Choctaw;
     * Clarke; Clay; Covington; Forrest; George; Greene; Hancock; Harrison; Itawamba; Jackson; Jasper; Jones; Kemper;
     * Lafayette; Lamar; Lauderdale; Leake; Lee; Lowndes; Marshall; Monroe; Neshoba; Newton; Noxubee; Oktibbeha; Pearl
     * River; Perry; Pontotoc; Prentiss; Scott; Smith; Stone; Tippah; Tishomingo; Union; Wayne; Webster; Winston.
     */
    public const EPSG_NAD83_MISSISSIPPI_EAST_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 'urn:ogc:def:crs:EPSG::8753';

    /**
     * NAD83 / Mississippi West (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Mississippi - counties of Adams; Amite; Bolivar; Carroll; Claiborne; Coahoma;
     * Copiah; De Soto; Franklin; Grenada; Hinds; Holmes; Humphreys; Issaquena; Jefferson; Jefferson Davis; Lawrence;
     * Leflore; Lincoln; Madison; Marion; Montgomery; Panola; Pike; Quitman; Rankin; Sharkey; Simpson; Sunflower;
     * Tallahatchie; Tate; Tunica; Walthall; Warren; Washington; Wilkinson; Yalobusha; Yazoo.
     */
    public const EPSG_NAD83_MISSISSIPPI_WEST_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 'urn:ogc:def:crs:EPSG::8754';

    /**
     * NAD83 / Missouri Central + NAVD88 height
     * Extent: United States (USA) - Missouri - counties of Adair; Audrain; Benton; Boone; Callaway; Camden; Carroll;
     * Chariton; Christian; Cole; Cooper; Dallas; Douglas; Greene; Grundy; Hickory; Howard; Howell; Knox; Laclede;
     * Linn; Livingston; Macon; Maries; Mercer; Miller; Moniteau; Monroe; Morgan; Osage; Ozark; Pettis; Phelps; Polk;
     * Pulaski; Putnam; Randolph; Saline; Schuyler; Scotland; Shelby; Stone; Sullivan; Taney; Texas; Webster; Wright.
     */
    public const EPSG_NAD83_MISSOURI_CENTRAL_PLUS_NAVD88_HEIGHT = 'urn:ogc:def:crs:EPSG::8814';

    /**
     * NAD83 / Missouri East + NAVD88 height
     * Extent: United States (USA) - Missouri - counties of Bollinger; Butler; Cape Girardeau; Carter; Clark; Crawford;
     * Dent; Dunklin; Franklin; Gasconade; Iron; Jefferson; Lewis; Lincoln; Madison; Marion; Mississippi; Montgomery;
     * New Madrid; Oregon; Pemiscot; Perry; Pike; Ralls; Reynolds; Ripley; Scott; Shannon; St Charles; St Francois; St
     * Louis; Ste. Genevieve; Stoddard; Warren; Washington; Wayne.
     */
    public const EPSG_NAD83_MISSOURI_EAST_PLUS_NAVD88_HEIGHT = 'urn:ogc:def:crs:EPSG::8813';

    /**
     * NAD83 / Missouri West + NAVD88 height
     * Extent: United States (USA) - Missouri - counties of Andrew; Atchison; Barry; Barton; Bates; Buchanan; Caldwell;
     * Cass; Cedar; Clay; Clinton; Dade; Daviess; De Kalb; Gentry; Harrison; Henry; Holt; Jackson; Jasper; Johnson;
     * Lafayette; Lawrence; McDonald; Newton; Nodaway; Platte; Ray; St Clair; Vernon; Worth.
     */
    public const EPSG_NAD83_MISSOURI_WEST_PLUS_NAVD88_HEIGHT = 'urn:ogc:def:crs:EPSG::8815';

    /**
     * NAD83 / Montana (ft) + NAVD88 height (ft)
     * Extent: United States (USA) - Montana - counties of Beaverhead; Big Horn; Blaine; Broadwater; Carbon; Carter;
     * Cascade; Chouteau; Custer; Daniels; Dawson; Deer Lodge; Fallon; Fergus; Flathead; Gallatin; Garfield; Glacier;
     * Golden Valley; Granite; Hill; Jefferson; Judith Basin; Lake; Lewis and Clark; Liberty; Lincoln; Madison; McCone;
     * Meagher; Mineral; Missoula; Musselshell; Park; Petroleum; Phillips; Pondera; Powder River; Powell; Prairie;
     * Ravalli; Richland; Roosevelt; Rosebud; Sanders; Sheridan; Silver Bow; Stillwater; Sweet Grass; Teton; Toole;
     * Treasure; Valley; Wheatland; Wibaux; Yellowstone.
     */
    public const EPSG_NAD83_MONTANA_FT_PLUS_NAVD88_HEIGHT_FT = 'urn:ogc:def:crs:EPSG::8706';

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
     */
    public const EPSG_NAD83_NEBRASKA_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 'urn:ogc:def:crs:EPSG::8755';

    /**
     * NAD83 / Nevada Central (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Nevada - counties of Lander; Nye.
     */
    public const EPSG_NAD83_NEVADA_CENTRAL_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 'urn:ogc:def:crs:EPSG::8757';

    /**
     * NAD83 / Nevada East (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Nevada - counties of Clark; Elko; Eureka; Lincoln; White Pine.
     */
    public const EPSG_NAD83_NEVADA_EAST_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 'urn:ogc:def:crs:EPSG::8756';

    /**
     * NAD83 / Nevada West (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Nevada - counties of Churchill; Douglas; Esmeralda; Humboldt; Lyon; Mineral;
     * Pershing; Storey; Washoe.
     */
    public const EPSG_NAD83_NEVADA_WEST_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 'urn:ogc:def:crs:EPSG::8758';

    /**
     * NAD83 / New Hampshire (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - New Hampshire - counties of Belknap; Carroll; Cheshire; Coos; Grafton;
     * Hillsborough; Merrimack; Rockingham; Strafford; Sullivan.
     */
    public const EPSG_NAD83_NEW_HAMPSHIRE_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 'urn:ogc:def:crs:EPSG::8759';

    /**
     * NAD83 / New Jersey (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - New Jersey - counties of Atlantic; Bergen; Burlington; Camden; Cape May;
     * Cumberland; Essex; Gloucester; Hudson; Hunterdon; Mercer; Middlesex; Monmouth; Morris; Ocean; Passaic; Salem;
     * Somerset; Sussex; Union; Warren.
     */
    public const EPSG_NAD83_NEW_JERSEY_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 'urn:ogc:def:crs:EPSG::8760';

    /**
     * NAD83 / New Mexico Central (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - New Mexico - counties of Bernalillo; Dona Ana; Lincoln; Los Alamos; Otero; Rio
     * Arriba; Sandoval; Santa Fe; Socorro; Taos; Torrance; Valencia.
     */
    public const EPSG_NAD83_NEW_MEXICO_CENTRAL_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 'urn:ogc:def:crs:EPSG::8762';

    /**
     * NAD83 / New Mexico East (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - New Mexico - counties of Chaves; Colfax; Curry; De Baca; Eddy; Guadalupe; Harding;
     * Lea; Mora; Quay; Roosevelt; San Miguel; Union.
     */
    public const EPSG_NAD83_NEW_MEXICO_EAST_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 'urn:ogc:def:crs:EPSG::8761';

    /**
     * NAD83 / New Mexico West (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - New Mexico - counties of Catron; Cibola; Grant; Hidalgo; Luna; McKinley; San Juan;
     * Sierra.
     */
    public const EPSG_NAD83_NEW_MEXICO_WEST_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 'urn:ogc:def:crs:EPSG::8763';

    /**
     * NAD83 / New York Central (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - New York - counties of Broome; Cayuga; Chemung; Chenango; Cortland; Jefferson;
     * Lewis; Madison; Oneida; Onondaga; Ontario; Oswego; Schuyler; Seneca; Steuben; Tioga; Tompkins; Wayne; Yates.
     */
    public const EPSG_NAD83_NEW_YORK_CENTRAL_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 'urn:ogc:def:crs:EPSG::8765';

    /**
     * NAD83 / New York East (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - New York mainland - counties of Albany; Clinton; Columbia; Delaware; Dutchess;
     * Essex; Franklin; Fulton; Greene; Hamilton; Herkimer; Montgomery; Orange; Otsego; Putnam; Rensselaer; Rockland;
     * Saratoga; Schenectady; Schoharie; St Lawrence; Sullivan; Ulster; Warren; Washington; Westchester.
     */
    public const EPSG_NAD83_NEW_YORK_EAST_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 'urn:ogc:def:crs:EPSG::8764';

    /**
     * NAD83 / New York Long Island (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - New York - counties of Bronx; Kings; Nassau; New York; Queens; Richmond; Suffolk.
     */
    public const EPSG_NAD83_NEW_YORK_LONG_ISLAND_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 'urn:ogc:def:crs:EPSG::8767';

    /**
     * NAD83 / New York West (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - New York - counties of Allegany; Cattaraugus; Chautauqua; Erie; Genesee;
     * Livingston; Monroe; Niagara; Orleans; Wyoming.
     */
    public const EPSG_NAD83_NEW_YORK_WEST_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 'urn:ogc:def:crs:EPSG::8766';

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
     */
    public const EPSG_NAD83_NORTH_CAROLINA_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 'urn:ogc:def:crs:EPSG::8768';

    /**
     * NAD83 / North Dakota North (ft) + NAVD88 height (ft)
     * Extent: United States (USA) - North Dakota - counties of Benson; Bottineau; Burke; Cavalier; Divide; Eddy;
     * Foster; Grand Forks; Griggs; McHenry; McKenzie; McLean; Mountrial; Nelson; Pembina; Pierce; Ramsey; Renville;
     * Rolette; Sheridan; Steele; Towner; Traill; Walsh; Ward; Wells; Williams.
     */
    public const EPSG_NAD83_NORTH_DAKOTA_NORTH_FT_PLUS_NAVD88_HEIGHT_FT = 'urn:ogc:def:crs:EPSG::8707';

    /**
     * NAD83 / North Dakota South (ft) + NAVD88 height (ft)
     * Extent: United States (USA) - North Dakota - counties of Adams; Barnes; Billings; Bowman; Burleigh; Cass;
     * Dickey; Dunn; Emmons; Golden Valley; Grant; Hettinger; Kidder; La Moure; Logan; McIntosh; Mercer; Morton;
     * Oliver; Ransom; Richland; Sargent; Sioux; Slope; Stark; Stutsman.
     */
    public const EPSG_NAD83_NORTH_DAKOTA_SOUTH_FT_PLUS_NAVD88_HEIGHT_FT = 'urn:ogc:def:crs:EPSG::8708';

    /**
     * NAD83 / Ohio North (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Ohio - counties of Allen;Ashland; Ashtabula; Auglaize; Carroll; Columbiana;
     * Coshocton; Crawford; Cuyahoga; Defiance; Delaware; Erie; Fulton; Geauga; Hancock; Hardin; Harrison; Henry;
     * Holmes; Huron; Jefferson; Knox; Lake; Logan; Lorain; Lucas; Mahoning; Marion; Medina; Mercer; Morrow; Ottawa;
     * Paulding; Portage; Putnam; Richland; Sandusky; Seneca; Shelby; Stark; Summit; Trumbull; Tuscarawas; Union; Van
     * Wert; Wayne; Williams; Wood; Wyandot.
     */
    public const EPSG_NAD83_OHIO_NORTH_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 'urn:ogc:def:crs:EPSG::8769';

    /**
     * NAD83 / Ohio South (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Ohio - counties of Adams; Athens; Belmont; Brown; Butler; Champaign; Clark;
     * Clermont; Clinton; Darke; Fairfield; Fayette; Franklin; Gallia; Greene; Guernsey; Hamilton; Highland; Hocking;
     * Jackson; Lawrence; Licking; Madison; Meigs; Miami; Monroe; Montgomery; Morgan; Muskingum; Noble; Perry;
     * Pickaway; Pike; Preble; Ross; Scioto; Vinton; Warren; Washington.
     */
    public const EPSG_NAD83_OHIO_SOUTH_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 'urn:ogc:def:crs:EPSG::8770';

    /**
     * NAD83 / Oklahoma North (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Oklahoma - counties of Adair; Alfalfa; Beaver; Blaine; Canadian; Cherokee;
     * Cimarron; Craig; Creek; Custer; Delaware; Dewey; Ellis; Garfield; Grant; Harper; Kay; Kingfisher; Lincoln;
     * Logan; Major; Mayes; Muskogee; Noble; Nowata; Okfuskee; Oklahoma; Okmulgee; Osage; Ottawa; Pawnee; Payne; Roger
     * Mills; Rogers; Sequoyah; Texas; Tulsa; Wagoner; Washington; Woods; Woodward.
     */
    public const EPSG_NAD83_OKLAHOMA_NORTH_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 'urn:ogc:def:crs:EPSG::8771';

    /**
     * NAD83 / Oklahoma South (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Oklahoma - counties of Atoka; Beckham; Bryan; Caddo; Carter; Choctaw; Cleveland;
     * Coal; Comanche; Cotton; Garvin; Grady; Greer; Harmon; Haskell; Hughes; Jackson; Jefferson; Johnston; Kiowa;
     * Latimer; Le Flore; Love; Marshall; McClain; McCurtain; McIntosh; Murray; Pittsburg; Pontotoc; Pottawatomie;
     * Pushmataha; Seminole; Stephens; Tillman; Washita.
     */
    public const EPSG_NAD83_OKLAHOMA_SOUTH_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 'urn:ogc:def:crs:EPSG::8772';

    /**
     * NAD83 / Oregon North (ft) + NAVD88 height (ft)
     * Extent: United States (USA) - Oregon - counties of Baker; Benton; Clackamas; Clatsop; Columbia; Gilliam; Grant;
     * Hood River; Jefferson; Lincoln; Linn; Marion; Morrow; Multnomah; Polk; Sherman; Tillamook; Umatilla; Union;
     * Wallowa; Wasco; Washington; Wheeler; Yamhill.
     */
    public const EPSG_NAD83_OREGON_NORTH_FT_PLUS_NAVD88_HEIGHT_FT = 'urn:ogc:def:crs:EPSG::8709';

    /**
     * NAD83 / Oregon South (ft) + NAVD88 height (ft)
     * Extent: United States (USA) - Oregon - counties of Coos; Crook; Curry; Deschutes; Douglas; Harney; Jackson;
     * Josephine; Klamath; Lake; Lane; Malheur.
     */
    public const EPSG_NAD83_OREGON_SOUTH_FT_PLUS_NAVD88_HEIGHT_FT = 'urn:ogc:def:crs:EPSG::8710';

    /**
     * NAD83 / Pennsylvania North (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Pennsylvania - counties of Bradford; Cameron; Carbon; Centre; Clarion; Clearfield;
     * Clinton; Columbia; Crawford; Elk; Erie; Forest; Jefferson; Lackawanna; Luzerne; Lycoming; McKean; Mercer;
     * Monroe; Montour; Northumberland; Pike; Potter; Sullivan; Susquehanna; Tioga; Union; Venango; Warren; Wayne;
     * Wyoming.
     */
    public const EPSG_NAD83_PENNSYLVANIA_NORTH_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 'urn:ogc:def:crs:EPSG::8773';

    /**
     * NAD83 / Pennsylvania South (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Pennsylvania - counties of Adams; Allegheny; Armstrong; Beaver; Bedford; Berks;
     * Blair; Bucks; Butler; Cambria; Chester; Cumberland; Dauphin; Delaware; Fayette; Franklin; Fulton; Greene;
     * Huntingdon; Indiana; Juniata; Lancaster; Lawrence; Lebanon; Lehigh; Mifflin; Montgomery; Northampton; Perry;
     * Philadelphia; Schuylkill; Snyder; Somerset; Washington; Westmoreland; York.
     */
    public const EPSG_NAD83_PENNSYLVANIA_SOUTH_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 'urn:ogc:def:crs:EPSG::8774';

    /**
     * NAD83 / Rhode Island (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Rhode Island - counties of Bristol; Kent; Newport; Providence; Washington.
     */
    public const EPSG_NAD83_RHODE_ISLAND_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 'urn:ogc:def:crs:EPSG::8775';

    /**
     * NAD83 / South Carolina (ft) + NAVD88 height (ft)
     * Extent: United States (USA) - South Carolina - counties of Abbeville; Aiken; Allendale; Anderson; Bamberg;
     * Barnwell; Beaufort; Berkeley; Calhoun; Charleston; Cherokee; Chester; Chesterfield; Clarendon; Colleton;
     * Darlington; Dillon; Dorchester; Edgefield; Fairfield; Florence; Georgetown; Greenville; Greenwood; Hampton;
     * Horry; Jasper; Kershaw; Lancaster; Laurens; Lee; Lexington; Marion; Marlboro; McCormick; Newberry; Oconee;
     * Orangeburg; Pickens; Richland; Saluda; Spartanburg; Sumter; Union; Williamsburg; York.
     */
    public const EPSG_NAD83_SOUTH_CAROLINA_FT_PLUS_NAVD88_HEIGHT_FT = 'urn:ogc:def:crs:EPSG::8711';

    /**
     * NAD83 / South Dakota North (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - South Dakota - counties of Beadle; Brookings; Brown; Butte; Campbell; Clark;
     * Codington; Corson; Day; Deuel; Dewey; Edmunds; Faulk; Grant; Hamlin; Hand; Harding; Hyde; Kingsbury; Lawrence;
     * Marshall; McPherson; Meade; Perkins; Potter; Roberts; Spink; Sully; Walworth; Ziebach.
     */
    public const EPSG_NAD83_SOUTH_DAKOTA_NORTH_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 'urn:ogc:def:crs:EPSG::8776';

    /**
     * NAD83 / South Dakota South (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - South Dakota - counties of Aurora; Bennett; Bon Homme; Brule; Buffalo; Charles
     * Mix; Clay; Custer; Davison; Douglas; Fall River; Gregory; Haakon; Hanson; Hughes; Hutchinson; Jackson; Jerauld;
     * Jones; Lake; Lincoln; Lyman; McCook; Mellette; Miner; Minnehaha; Moody; Pennington; Sanborn; Shannon; Stanley;
     * Todd; Tripp; Turner; Union; Yankton.
     */
    public const EPSG_NAD83_SOUTH_DAKOTA_SOUTH_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 'urn:ogc:def:crs:EPSG::8777';

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
     */
    public const EPSG_NAD83_TENNESSEE_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 'urn:ogc:def:crs:EPSG::8778';

    /**
     * NAD83 / Texas Central (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Texas - counties of Anderson; Angelina; Bastrop; Bell; Blanco; Bosque; Brazos;
     * Brown; Burleson; Burnet; Cherokee; Coke; Coleman; Comanche; Concho; Coryell; Crane; Crockett; Culberson; Ector;
     * El Paso; Falls; Freestone; Gillespie; Glasscock; Grimes; Hamilton; Hardin; Houston; Hudspeth; Irion; Jasper;
     * Jeff Davis; Kimble; Lampasas; Lee; Leon; Liberty; Limestone; Llano; Loving; Madison; Mason; McCulloch; McLennan;
     * Menard; Midland; Milam; Mills; Montgomery; Nacogdoches; Newton; Orange; Pecos; Polk; Reagan; Reeves; Robertson;
     * Runnels; Sabine; San Augustine; San Jacinto; San Saba; Schleicher; Shelby; Sterling; Sutton; Tom Green; Travis;
     * Trinity; Tyler; Upton; Walker; Ward; Washington; Williamson; Winkler.
     */
    public const EPSG_NAD83_TEXAS_CENTRAL_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 'urn:ogc:def:crs:EPSG::8781';

    /**
     * NAD83 / Texas North (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Texas - counties of: Armstrong; Briscoe; Carson; Castro; Childress; Collingsworth;
     * Dallam; Deaf Smith; Donley; Gray; Hall; Hansford; Hartley; Hemphill; Hutchinson; Lipscomb; Moore; Ochiltree;
     * Oldham; Parmer; Potter; Randall; Roberts; Sherman; Swisher; Wheeler.
     */
    public const EPSG_NAD83_TEXAS_NORTH_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 'urn:ogc:def:crs:EPSG::8779';

    /**
     * NAD83 / Texas North Central (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Texas - counties of: Andrews; Archer; Bailey; Baylor; Borden; Bowie; Callahan;
     * Camp; Cass; Clay; Cochran; Collin; Cooke; Cottle; Crosby; Dallas; Dawson; Delta; Denton; Dickens; Eastland;
     * Ellis; Erath; Fannin; Fisher; Floyd; Foard; Franklin; Gaines; Garza; Grayson; Gregg; Hale; Hardeman; Harrison;
     * Haskell; Henderson; Hill; Hockley; Hood; Hopkins; Howard; Hunt; Jack; Johnson; Jones; Kaufman; Kent; King; Knox;
     * Lamar; Lamb; Lubbock; Lynn; Marion; Martin; Mitchell; Montague; Morris; Motley; Navarro; Nolan; Palo Pinto;
     * Panola; Parker; Rains; Red River; Rockwall; Rusk; Scurry; Shackelford; Smith; Somervell; Stephens; Stonewall;
     * Tarrant; Taylor; Terry; Throckmorton; Titus; Upshur; Van Zandt; Wichita; Wilbarger; Wise; Wood; Yoakum; Young.
     */
    public const EPSG_NAD83_TEXAS_NORTH_CENTRAL_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 'urn:ogc:def:crs:EPSG::8780';

    /**
     * NAD83 / Texas South (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Texas - counties of Brooks; Cameron; Duval; Hidalgo; Jim Hogg; Jim Wells; Kenedy;
     * Kleberg; Nueces; San Patricio; Starr; Webb; Willacy; Zapata.
     */
    public const EPSG_NAD83_TEXAS_SOUTH_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 'urn:ogc:def:crs:EPSG::8783';

    /**
     * NAD83 / Texas South Central (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Texas - counties of Aransas; Atascosa; Austin; Bandera; Bee; Bexar; Brazoria;
     * Brewster; Caldwell; Calhoun; Chambers; Colorado; Comal; De Witt; Dimmit; Edwards; Fayette; Fort Bend; Frio;
     * Galveston; Goliad; Gonzales; Guadalupe; Harris; Hays; Jackson; Jefferson; Karnes; Kendall; Kerr; Kinney; La
     * Salle; Lavaca; Live Oak; Matagorda; Maverick; McMullen; Medina; Presidio; Real; Refugio; Terrell; Uvalde; Val
     * Verde; Victoria; Waller; Wharton; Wilson; Zavala.
     */
    public const EPSG_NAD83_TEXAS_SOUTH_CENTRAL_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 'urn:ogc:def:crs:EPSG::8782';

    /**
     * NAD83 / Utah Central (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Utah - counties of Carbon; Duchesne; Emery; Grand; Juab; Millard; Salt Lake;
     * Sanpete; Sevier; Tooele; Uintah; Utah; Wasatch.
     */
    public const EPSG_NAD83_UTAH_CENTRAL_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 'urn:ogc:def:crs:EPSG::8785';

    /**
     * NAD83 / Utah North (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Utah - counties of Box Elder; Cache; Daggett; Davis; Morgan; Rich; Summit; Weber.
     */
    public const EPSG_NAD83_UTAH_NORTH_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 'urn:ogc:def:crs:EPSG::8784';

    /**
     * NAD83 / Utah South (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Utah - counties of Beaver; Garfield; Iron; Kane; Piute; San Juan; Washington;
     * Wayne.
     */
    public const EPSG_NAD83_UTAH_SOUTH_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 'urn:ogc:def:crs:EPSG::8786';

    /**
     * NAD83 / Vermont (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Vermont - counties of Addison; Bennington; Caledonia; Chittenden; Essex; Franklin;
     * Grand Isle; Lamoille; Orange; Orleans; Rutland; Washington; Windham; Windsor.
     */
    public const EPSG_NAD83_VERMONT_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 'urn:ogc:def:crs:EPSG::8787';

    /**
     * NAD83 / Virginia North (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Virginia - counties of Arlington; Augusta; Bath; Caroline; Clarke; Culpeper;
     * Fairfax; Fauquier; Frederick; Greene; Highland; King George; Loudoun; Madison; Orange; Page; Prince William;
     * Rappahannock; Rockingham; Shenandoah; Spotsylvania; Stafford; Warren; Westmoreland.
     */
    public const EPSG_NAD83_VIRGINIA_NORTH_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 'urn:ogc:def:crs:EPSG::8788';

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
     */
    public const EPSG_NAD83_VIRGINIA_SOUTH_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 'urn:ogc:def:crs:EPSG::8789';

    /**
     * NAD83 / Washington North (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Washington - counties of Chelan; Clallam; Douglas; Ferry; Grant north of
     * approximately 47°30'N; Island; Jefferson; King; Kitsap; Lincoln; Okanogan; Pend Oreille; San Juan; Skagit;
     * Snohomish; Spokane; Stevens; Whatcom.
     */
    public const EPSG_NAD83_WASHINGTON_NORTH_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 'urn:ogc:def:crs:EPSG::8790';

    /**
     * NAD83 / Washington South (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Washington - counties of Adams; Asotin; Benton; Clark; Columbia; Cowlitz;
     * Franklin; Garfield; Grant south of approximately 47°30'N; Grays Harbor; Kittitas; Klickitat; Lewis; Mason;
     * Pacific; Pierce; Skamania; Thurston; Wahkiakum; Walla Walla; Whitman; Yakima.
     */
    public const EPSG_NAD83_WASHINGTON_SOUTH_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 'urn:ogc:def:crs:EPSG::8791';

    /**
     * NAD83 / West Virginia North (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - West Virginia - counties of Barbour; Berkeley; Brooke; Doddridge; Grant;
     * Hampshire; Hancock; Hardy; Harrison; Jefferson; Marion; Marshall; Mineral; Monongalia; Morgan; Ohio; Pleasants;
     * Preston; Ritchie; Taylor; Tucker; Tyler; Wetzel; Wirt; Wood.
     */
    public const EPSG_NAD83_WEST_VIRGINIA_NORTH_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 'urn:ogc:def:crs:EPSG::8792';

    /**
     * NAD83 / West Virginia South (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - West Virginia - counties of Boone; Braxton; Cabell; Calhoun; Clay; Fayette;
     * Gilmer; Greenbrier; Jackson; Kanawha; Lewis; Lincoln; Logan; Mason; McDowell; Mercer; Mingo; Monroe; Nicholas;
     * Pendleton; Pocahontas; Putnam; Raleigh; Randolph; Roane; Summers; Upshur; Wayne; Webster; Wyoming.
     */
    public const EPSG_NAD83_WEST_VIRGINIA_SOUTH_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 'urn:ogc:def:crs:EPSG::8793';

    /**
     * NAD83 / Wisconsin Central (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Wisconsin - counties of Barron; Brown; Buffalo; Chippewa; Clark; Door; Dunn; Eau
     * Claire; Jackson; Kewaunee; Langlade; Lincoln; Marathon; Marinette; Menominee; Oconto; Outagamie; Pepin; Pierce;
     * Polk; Portage; Rusk; Shawano; St Croix; Taylor; Trempealeau; Waupaca; Wood.
     */
    public const EPSG_NAD83_WISCONSIN_CENTRAL_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 'urn:ogc:def:crs:EPSG::8795';

    /**
     * NAD83 / Wisconsin North (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Wisconsin - counties of Ashland; Bayfield; Burnett; Douglas; Florence; Forest;
     * Iron; Oneida; Price; Sawyer; Vilas; Washburn.
     */
    public const EPSG_NAD83_WISCONSIN_NORTH_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 'urn:ogc:def:crs:EPSG::8794';

    /**
     * NAD83 / Wisconsin South (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Wisconsin - counties of Adams; Calumet; Columbia; Crawford; Dane; Dodge; Fond Du
     * Lac; Grant; Green; Green Lake; Iowa; Jefferson; Juneau; Kenosha; La Crosse; Lafayette; Manitowoc; Marquette;
     * Milwaukee; Monroe; Ozaukee; Racine; Richland; Rock; Sauk; Sheboygan; Vernon; Walworth; Washington; Waukesha;
     * Waushara; Winnebago.
     */
    public const EPSG_NAD83_WISCONSIN_SOUTH_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 'urn:ogc:def:crs:EPSG::8796';

    /**
     * NAD83 / Wyoming East (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Wyoming - counties of Albany; Campbell; Converse; Crook; Goshen; Laramie;
     * Niobrara; Platte; Weston.
     */
    public const EPSG_NAD83_WYOMING_EAST_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 'urn:ogc:def:crs:EPSG::8797';

    /**
     * NAD83 / Wyoming East Central (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Wyoming - counties of Big Horn; Carbon; Johnson; Natrona; Sheridan; Washakie.
     */
    public const EPSG_NAD83_WYOMING_EAST_CENTRAL_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 'urn:ogc:def:crs:EPSG::8798';

    /**
     * NAD83 / Wyoming West (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Wyoming - counties of Lincoln; Sublette; Teton; Uinta.
     */
    public const EPSG_NAD83_WYOMING_WEST_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 'urn:ogc:def:crs:EPSG::8800';

    /**
     * NAD83 / Wyoming West Central (ftUS) + NAVD88 height (ftUS)
     * Extent: United States (USA) - Wyoming - counties of Fremont; Hot Springs; Park; Sweetwater.
     */
    public const EPSG_NAD83_WYOMING_WEST_CENTRAL_FTUS_PLUS_NAVD88_HEIGHT_FTUS = 'urn:ogc:def:crs:EPSG::8799';

    /**
     * NAD83(2011) + NAVD88 height
     * Extent: United States (USA) - CONUS and Alaska - onshore - Alabama; Alaska mainland; Arizona; Arkansas;
     * California; Colorado; Connecticut; Delaware; Florida; Georgia; Idaho; Illinois; Indiana; Iowa; Kansas; Kentucky;
     * Louisiana; Maine; Maryland; Massachusetts; Michigan; Minnesota; Mississippi; Missouri; Montana; Nebraska;
     * Nevada; New Hampshire; New Jersey; New Mexico; New York; North Carolina; North Dakota; Ohio; Oklahoma; Oregon;
     * Pennsylvania; Rhode Island; South Carolina; South Dakota; Tennessee; Texas; Utah; Vermont; Virginia; Washington;
     * West Virginia; Wisconsin; Wyoming.
     * Replaces NAD83(NSRS2007) + NAVD88 height.
     */
    public const EPSG_NAD83_2011_PLUS_NAVD88_HEIGHT = 'urn:ogc:def:crs:EPSG::6349';

    /**
     * NAD83(2011) + PRVD02 height
     * Extent: Puerto Rico - onshore.
     */
    public const EPSG_NAD83_2011_PLUS_PRVD02_HEIGHT = 'urn:ogc:def:crs:EPSG::9522';

    /**
     * NAD83(2011) + VIVD09 height
     * Extent: US Virgin Islands - onshore - St Croix, St John, and St Thomas.
     */
    public const EPSG_NAD83_2011_PLUS_VIVD09_HEIGHT = 'urn:ogc:def:crs:EPSG::9523';

    /**
     * NAD83(CSRS) + CGVD2013 height
     * Extent: Canada - onshore and offshore - Alberta; British Columbia; Manitoba; New Brunswick; Newfoundland and
     * Labrador; Northwest Territories; Nova Scotia; Nunavut; Ontario; Prince Edward Island; Quebec; Saskatchewan;
     * Yukon.
     */
    public const EPSG_NAD83_CSRS_PLUS_CGVD2013_HEIGHT = 'urn:ogc:def:crs:EPSG::6649';

    /**
     * NAD83(CSRS) / UTM zone 10N + CGVD2013 height
     * Extent: Canada between 126°W and 120°W, onshore and offshore south of 84°N - British Columbia, Northwest
     * Territories, Yukon.
     */
    public const EPSG_NAD83_CSRS_UTM_ZONE_10N_PLUS_CGVD2013_HEIGHT = 'urn:ogc:def:crs:EPSG::6653';

    /**
     * NAD83(CSRS) / UTM zone 11N + CGVD2013 height
     * Extent: Canada between 120°W and 114°W onshore and offshore - Alberta, British Columbia, Northwest
     * Territories, Nunavut.
     */
    public const EPSG_NAD83_CSRS_UTM_ZONE_11N_PLUS_CGVD2013_HEIGHT = 'urn:ogc:def:crs:EPSG::6654';

    /**
     * NAD83(CSRS) / UTM zone 12N + CGVD2013 height
     * Extent: Canada between 114°W and 108°W onshore and offshore - Alberta, Northwest Territories, Nunavut,
     * Saskatchewan.
     */
    public const EPSG_NAD83_CSRS_UTM_ZONE_12N_PLUS_CGVD2013_HEIGHT = 'urn:ogc:def:crs:EPSG::6655';

    /**
     * NAD83(CSRS) / UTM zone 13N + CGVD2013 height
     * Extent: Canada between 108°W and 102°W onshore and offshore - Northwest Territories, Nunavut, Saskatchewan.
     */
    public const EPSG_NAD83_CSRS_UTM_ZONE_13N_PLUS_CGVD2013_HEIGHT = 'urn:ogc:def:crs:EPSG::6656';

    /**
     * NAD83(CSRS) / UTM zone 14N + CGVD2013 height
     * Extent: Canada between 102°W and 96°W, onshore and offshore south of 84°N - Manitoba, Nunavut, Saskatchewan.
     */
    public const EPSG_NAD83_CSRS_UTM_ZONE_14N_PLUS_CGVD2013_HEIGHT = 'urn:ogc:def:crs:EPSG::6657';

    /**
     * NAD83(CSRS) / UTM zone 15N + CGVD2013 height
     * Extent: Canada between 96°W and 90°W, onshore and offshore south of 84°N - Manitoba, Nunavut, Ontario.
     */
    public const EPSG_NAD83_CSRS_UTM_ZONE_15N_PLUS_CGVD2013_HEIGHT = 'urn:ogc:def:crs:EPSG::6658';

    /**
     * NAD83(CSRS) / UTM zone 16N + CGVD2013 height
     * Extent: Canada between 90°W and 84°W, onshore and offshore south of 84°N - Manitoba, Nunavut, Ontario.
     */
    public const EPSG_NAD83_CSRS_UTM_ZONE_16N_PLUS_CGVD2013_HEIGHT = 'urn:ogc:def:crs:EPSG::6659';

    /**
     * NAD83(CSRS) / UTM zone 17N + CGVD2013 height
     * Extent: Canada between 84°W and 78°W, onshore and offshore south of 84°N - Nunavut, Ontario and Quebec.
     */
    public const EPSG_NAD83_CSRS_UTM_ZONE_17N_PLUS_CGVD2013_HEIGHT = 'urn:ogc:def:crs:EPSG::6660';

    /**
     * NAD83(CSRS) / UTM zone 18N + CGVD2013 height
     * Extent: Canada between 78°W and 72°W, onshore and offshore south of 84°N - Nunavut, Ontario and Quebec.
     */
    public const EPSG_NAD83_CSRS_UTM_ZONE_18N_PLUS_CGVD2013_HEIGHT = 'urn:ogc:def:crs:EPSG::6661';

    /**
     * NAD83(CSRS) / UTM zone 19N + CGVD2013 height
     * Extent: Canada between 72°W and 66°W onshore and offshore - New Brunswick, Labrador, Nova Scotia, Nunavut,
     * Quebec.
     */
    public const EPSG_NAD83_CSRS_UTM_ZONE_19N_PLUS_CGVD2013_HEIGHT = 'urn:ogc:def:crs:EPSG::6662';

    /**
     * NAD83(CSRS) / UTM zone 20N + CGVD2013 height
     * Extent: Canada between 66°W and 60°W onshore and offshore - New Brunswick, Labrador, Nova Scotia, Nunavut,
     * Prince Edward Island, Quebec.
     */
    public const EPSG_NAD83_CSRS_UTM_ZONE_20N_PLUS_CGVD2013_HEIGHT = 'urn:ogc:def:crs:EPSG::6663';

    /**
     * NAD83(CSRS) / UTM zone 21N + CGVD2013 height
     * Extent: Canada between 60°W and 54°W - Newfoundland and Labrador; Nunavut; Quebec.
     */
    public const EPSG_NAD83_CSRS_UTM_ZONE_21N_PLUS_CGVD2013_HEIGHT = 'urn:ogc:def:crs:EPSG::6664';

    /**
     * NAD83(CSRS) / UTM zone 22N + CGVD2013 height
     * Extent: Canada between 54°W and 48°W onshore and offshore - Newfoundland and Labrador.
     */
    public const EPSG_NAD83_CSRS_UTM_ZONE_22N_PLUS_CGVD2013_HEIGHT = 'urn:ogc:def:crs:EPSG::6665';

    /**
     * NAD83(CSRS) / UTM zone 7N + CGVD2013 height
     * Extent: Canada west of 138°W, onshore and offshore south of 84°N - British Columbia, Yukon.
     */
    public const EPSG_NAD83_CSRS_UTM_ZONE_7N_PLUS_CGVD2013_HEIGHT = 'urn:ogc:def:crs:EPSG::6650';

    /**
     * NAD83(CSRS) / UTM zone 8N + CGVD2013 height
     * Extent: Canada between 138°W and 132°W, onshore and offshore south of 84°N - British Columbia, Northwest
     * Territories, Yukon.
     */
    public const EPSG_NAD83_CSRS_UTM_ZONE_8N_PLUS_CGVD2013_HEIGHT = 'urn:ogc:def:crs:EPSG::6651';

    /**
     * NAD83(CSRS) / UTM zone 9N + CGVD2013 height
     * Extent: Canada - between 132°W and 126°W, onshore and offshore south of 84°N - British Columbia, Northwest
     * Territories, Yukon.
     */
    public const EPSG_NAD83_CSRS_UTM_ZONE_9N_PLUS_CGVD2013_HEIGHT = 'urn:ogc:def:crs:EPSG::6652';

    /**
     * NAD83(CSRS)v6 + CGVD2013(CGG2013a) height
     * Extent: Canada - onshore and offshore - Alberta; British Columbia; Manitoba; New Brunswick; Newfoundland and
     * Labrador; Northwest Territories; Nova Scotia; Nunavut; Ontario; Prince Edward Island; Quebec; Saskatchewan;
     * Yukon.
     */
    public const EPSG_NAD83_CSRS_V6_PLUS_CGVD2013_CGG2013A_HEIGHT = 'urn:ogc:def:crs:EPSG::9544';

    /**
     * NAD83(HARN) + NAVD88 height
     * Extent: United States (USA) - CONUS onshore - Alabama; Arizona; Arkansas; California; Colorado; Connecticut;
     * Delaware; Florida; Georgia; Idaho; Illinois; Indiana; Iowa; Kansas; Kentucky; Louisiana; Maine; Maryland;
     * Massachusetts; Michigan; Minnesota; Mississippi; Missouri; Montana; Nebraska; Nevada; New Hampshire; New Jersey;
     * New Mexico; New York; North Carolina; North Dakota; Ohio; Oklahoma; Oregon; Pennsylvania; Rhode Island; South
     * Carolina; South Dakota; Tennessee; Texas; Utah; Vermont; Virginia; Washington; West Virginia; Wisconsin;
     * Wyoming.
     */
    public const EPSG_NAD83_HARN_PLUS_NAVD88_HEIGHT = 'urn:ogc:def:crs:EPSG::5499';

    /**
     * NAD83(MA11) + GUVD04 height
     * Extent: Guam - onshore.
     */
    public const EPSG_NAD83_MA11_PLUS_GUVD04_HEIGHT = 'urn:ogc:def:crs:EPSG::9524';

    /**
     * NAD83(MA11) + NMVD03 height
     * Extent: Northern Mariana Islands - onshore.
     */
    public const EPSG_NAD83_MA11_PLUS_NMVD03_HEIGHT = 'urn:ogc:def:crs:EPSG::9525';

    /**
     * NAD83(NSRS2007) + NAVD88 height
     * Extent: United States (USA) - CONUS onshore - Alabama; Arizona; Arkansas; California; Colorado; Connecticut;
     * Delaware; Florida; Georgia; Idaho; Illinois; Indiana; Iowa; Kansas; Kentucky; Louisiana; Maine; Maryland;
     * Massachusetts; Michigan; Minnesota; Mississippi; Missouri; Montana; Nebraska; Nevada; New Hampshire; New Jersey;
     * New Mexico; New York; North Carolina; North Dakota; Ohio; Oklahoma; Oregon; Pennsylvania; Rhode Island; South
     * Carolina; South Dakota; Tennessee; Texas; Utah; Vermont; Virginia; Washington; West Virginia; Wisconsin;
     * Wyoming.
     */
    public const EPSG_NAD83_NSRS2007_PLUS_NAVD88_HEIGHT = 'urn:ogc:def:crs:EPSG::5500';

    /**
     * NAD83(PA11) + ASVD02 height
     * Extent: American Samoa - Tutuila island.
     */
    public const EPSG_NAD83_PA11_PLUS_ASVD02_HEIGHT = 'urn:ogc:def:crs:EPSG::9526';

    /**
     * NTF (Paris) + NGF IGN69 height
     * Extent: France - mainland onshore.
     */
    public const EPSG_NTF_PARIS_PLUS_NGF_IGN69_HEIGHT = 'urn:ogc:def:crs:EPSG::7400';

    /**
     * NTF (Paris) / Lambert zone I + NGF-IGN69 height
     * Extent: France mainland onshore north of 53.5 grads North (48°09'N).
     */
    public const EPSG_NTF_PARIS_LAMBERT_ZONE_I_PLUS_NGF_IGN69_HEIGHT = 'urn:ogc:def:crs:EPSG::5707';

    /**
     * NTF (Paris) / Lambert zone II + NGF Lallemand height
     * Extent: France - mainland onshore.
     */
    public const EPSG_NTF_PARIS_LAMBERT_ZONE_II_PLUS_NGF_LALLEMAND_HEIGHT = 'urn:ogc:def:crs:EPSG::7411';

    /**
     * NTF (Paris) / Lambert zone II + NGF-IGN69 height
     * Extent: France - mainland onshore.
     */
    public const EPSG_NTF_PARIS_LAMBERT_ZONE_II_PLUS_NGF_IGN69_HEIGHT = 'urn:ogc:def:crs:EPSG::7421';

    /**
     * NTF (Paris) / Lambert zone III + NGF-IGN69 height
     * Extent: France - mainland onshore south of 50.5 grads North (45°27'N).
     */
    public const EPSG_NTF_PARIS_LAMBERT_ZONE_III_PLUS_NGF_IGN69_HEIGHT = 'urn:ogc:def:crs:EPSG::7422';

    /**
     * NTF (Paris) / Lambert zone IV + NGF-IGN78 height
     * Extent: France - Corsica onshore.
     */
    public const EPSG_NTF_PARIS_LAMBERT_ZONE_IV_PLUS_NGF_IGN78_HEIGHT = 'urn:ogc:def:crs:EPSG::5708';

    /**
     * NZGD2000 + NZVD2009 height
     * Extent: New Zealand - onshore and offshore. Includes Antipodes Islands, Auckland Islands, Bounty Islands,
     * Chatham Islands, Cambell Island, Kermadec Islands, Raoul Island and Snares Islands.
     */
    public const EPSG_NZGD2000_PLUS_NZVD2009_HEIGHT = 'urn:ogc:def:crs:EPSG::9527';

    /**
     * NZGD2000 + NZVD2016 height
     * Extent: New Zealand - onshore and offshore. Includes Antipodes Islands, Auckland Islands, Bounty Islands,
     * Chatham Islands, Cambell Island, Kermadec Islands, Raoul Island and Snares Islands.
     */
    public const EPSG_NZGD2000_PLUS_NZVD2016_HEIGHT = 'urn:ogc:def:crs:EPSG::9528';

    /**
     * OSGB 1936 / British National Grid + ODN height
     * Extent: United Kingdom (UK) - Great Britain onshore - England and Wales - mainland; Scotland - mainland and
     * Inner Hebrides.
     */
    public const EPSG_OSGB_1936_BRITISH_NATIONAL_GRID_PLUS_ODN_HEIGHT = 'urn:ogc:def:crs:EPSG::7405';

    /**
     * POSGAR 2007 + SRVN16 height
     * Extent: Argentina - onshore.
     */
    public const EPSG_POSGAR_2007_PLUS_SRVN16_HEIGHT = 'urn:ogc:def:crs:EPSG::9521';

    /**
     * PSHD93
     * Extent: Oman - onshore. Includes Musandam and the Kuria Muria (Al Hallaniyah) islands.
     */
    public const EPSG_PSHD93 = 'urn:ogc:def:crs:EPSG::7410';

    /**
     * REGCAN95 + El Hierro height
     * Extent: Spain - Canary Islands - El Hierro onshore.
     */
    public const EPSG_REGCAN95_PLUS_EL_HIERRO_HEIGHT = 'urn:ogc:def:crs:EPSG::9510';

    /**
     * REGCAN95 + Fuerteventura height
     * Extent: Spain - Canary Islands - Fuerteventura onshore.
     */
    public const EPSG_REGCAN95_PLUS_FUERTEVENTURA_HEIGHT = 'urn:ogc:def:crs:EPSG::9511';

    /**
     * REGCAN95 + Gran Canaria height
     * Extent: Spain - Canary Islands - Gran Canaria onshore.
     */
    public const EPSG_REGCAN95_PLUS_GRAN_CANARIA_HEIGHT = 'urn:ogc:def:crs:EPSG::9512';

    /**
     * REGCAN95 + La Gomera height
     * Extent: Spain - Canary Islands - La Gomera onshore.
     */
    public const EPSG_REGCAN95_PLUS_LA_GOMERA_HEIGHT = 'urn:ogc:def:crs:EPSG::9513';

    /**
     * REGCAN95 + La Palma height
     * Extent: Spain - Canary Islands - La Palma onshore.
     */
    public const EPSG_REGCAN95_PLUS_LA_PALMA_HEIGHT = 'urn:ogc:def:crs:EPSG::9514';

    /**
     * REGCAN95 + Lanzarote height
     * Extent: Spain - Canary Islands - Lanzarote onshore.
     */
    public const EPSG_REGCAN95_PLUS_LANZAROTE_HEIGHT = 'urn:ogc:def:crs:EPSG::9515';

    /**
     * REGCAN95 + Tenerife height
     * Extent: Spain - Canary Islands - Tenerife onshore.
     */
    public const EPSG_REGCAN95_PLUS_TENERIFE_HEIGHT = 'urn:ogc:def:crs:EPSG::9516';

    /**
     * RGAF09 + Guadeloupe 1988 height
     * Extent: Guadeloupe - onshore - Basse-Terre and Grande-Terre.
     */
    public const EPSG_RGAF09_PLUS_GUADELOUPE_1988_HEIGHT = 'urn:ogc:def:crs:EPSG::9531';

    /**
     * RGAF09 + IGN 1988 LS height
     * Extent: Guadeloupe - onshore - Les Saintes.
     */
    public const EPSG_RGAF09_PLUS_IGN_1988_LS_HEIGHT = 'urn:ogc:def:crs:EPSG::9532';

    /**
     * RGAF09 + IGN 1988 MG height
     * Extent: Guadeloupe - onshore - Marie-Galante.
     */
    public const EPSG_RGAF09_PLUS_IGN_1988_MG_HEIGHT = 'urn:ogc:def:crs:EPSG::9533';

    /**
     * RGAF09 + IGN 1988 SB height
     * Extent: Guadeloupe - onshore - St Barthelemy island.
     */
    public const EPSG_RGAF09_PLUS_IGN_1988_SB_HEIGHT = 'urn:ogc:def:crs:EPSG::9534';

    /**
     * RGAF09 + IGN 1988 SM height
     * Extent: Guadeloupe - onshore - St Martin island.
     */
    public const EPSG_RGAF09_PLUS_IGN_1988_SM_HEIGHT = 'urn:ogc:def:crs:EPSG::9535';

    /**
     * RGAF09 + IGN 2008 LD height
     * Extent: Guadeloupe - onshore - La Desirade.
     */
    public const EPSG_RGAF09_PLUS_IGN_2008_LD_HEIGHT = 'urn:ogc:def:crs:EPSG::9536';

    /**
     * RGAF09 + Martinique 1987 height
     * Extent: Martinique - onshore.
     */
    public const EPSG_RGAF09_PLUS_MARTINIQUE_1987_HEIGHT = 'urn:ogc:def:crs:EPSG::9537';

    /**
     * RGF93 + NGF-IGN69 height
     * Extent: France - mainland onshore.
     */
    public const EPSG_RGF93_PLUS_NGF_IGN69_HEIGHT = 'urn:ogc:def:crs:EPSG::9538';

    /**
     * RGF93 + NGF-IGN78 height
     * Extent: France - Corsica onshore.
     */
    public const EPSG_RGF93_PLUS_NGF_IGN78_HEIGHT = 'urn:ogc:def:crs:EPSG::9539';

    /**
     * RGF93 / Lambert-93 + NGF-IGN69 height
     * Extent: France - mainland onshore.
     */
    public const EPSG_RGF93_LAMBERT_93_PLUS_NGF_IGN69_HEIGHT = 'urn:ogc:def:crs:EPSG::5698';

    /**
     * RGF93 / Lambert-93 + NGF-IGN78 height
     * Extent: France - Corsica onshore.
     */
    public const EPSG_RGF93_LAMBERT_93_PLUS_NGF_IGN78_HEIGHT = 'urn:ogc:def:crs:EPSG::5699';

    /**
     * RGFG95 + NGG1977 height
     * Extent: French Guiana - onshore.
     */
    public const EPSG_RGFG95_PLUS_NGG1977_HEIGHT = 'urn:ogc:def:crs:EPSG::9530';

    /**
     * RGNC91-93 + NGNC08 height
     * Extent: New Caledonia - Belep, Grande Terre, Ile des Pins, Loyalty Islands (Lifou, Mare, Ouvea).
     */
    public const EPSG_RGNC91_93_PLUS_NGNC08_HEIGHT = 'urn:ogc:def:crs:EPSG::9540';

    /**
     * RGSPM06 + Danger 1950 height
     * Extent: St Pierre and Miquelon - onshore.
     */
    public const EPSG_RGSPM06_PLUS_DANGER_1950_HEIGHT = 'urn:ogc:def:crs:EPSG::9541';

    /**
     * RRAF 1991 + IGN 2008 LD height
     * Extent: Guadeloupe - onshore - La Desirade.
     */
    public const EPSG_RRAF_1991_PLUS_IGN_2008_LD_HEIGHT = 'urn:ogc:def:crs:EPSG::9542';

    /**
     * RT90 + RH70 height
     * Extent: Sweden - onshore.
     * When combined with geoid model RN92 forms geographic 3D CRS RR92.
     */
    public const EPSG_RT90_PLUS_RH70_HEIGHT = 'urn:ogc:def:crs:EPSG::7404';

    /**
     * SHGD2015 + SHVD2015 height
     * Extent: St Helena, Ascension and Tristan da Cunha - St Helena Island - onshore.
     */
    public const EPSG_SHGD2015_PLUS_SHVD2015_HEIGHT = 'urn:ogc:def:crs:EPSG::9517';

    /**
     * SHMG2015 + SHVD2015 height
     * Extent: St Helena, Ascension and Tristan da Cunha - St Helena Island - onshore.
     */
    public const EPSG_SHMG2015_PLUS_SHVD2015_HEIGHT = 'urn:ogc:def:crs:EPSG::7956';

    /**
     * SRGI2013 + INAGeoid2020 height
     * Extent: Indonesia - onshore and offshore.
     */
    public const EPSG_SRGI2013_PLUS_INAGEOID2020_HEIGHT = 'urn:ogc:def:crs:EPSG::9529';

    /**
     * SVY21 + SHD height
     * Extent: Singapore - onshore and offshore.
     */
    public const EPSG_SVY21_PLUS_SHD_HEIGHT = 'urn:ogc:def:crs:EPSG::6917';

    /**
     * SVY21 / Singapore TM + SHD height
     * Extent: Singapore - onshore and offshore.
     */
    public const EPSG_SVY21_SINGAPORE_TM_PLUS_SHD_HEIGHT = 'urn:ogc:def:crs:EPSG::6927';

    /**
     * SWEREF99 + RH2000 height
     * Extent: Sweden - onshore.
     */
    public const EPSG_SWEREF99_PLUS_RH2000_HEIGHT = 'urn:ogc:def:crs:EPSG::5628';

    /**
     * SWEREF99 12 00 + RH2000 height
     * Extent: Sweden - communes west of approximately 12°45'E and south of approximately 60°N. See information
     * source for map.
     */
    public const EPSG_SWEREF99_12_00_PLUS_RH2000_HEIGHT = 'urn:ogc:def:crs:EPSG::5846';

    /**
     * SWEREF99 13 30 + RH2000 height
     * Extent: Sweden - communes between approximately 12°45'E and 14°15'E and south of approximately 62°10'N. See
     * information source for map.
     */
    public const EPSG_SWEREF99_13_30_PLUS_RH2000_HEIGHT = 'urn:ogc:def:crs:EPSG::5847';

    /**
     * SWEREF99 14 15 + RH2000 height
     * Extent: Sweden - communes west of approximately 15°E and between approximately 61°35'N and 64°25'N. See
     * information source for map.
     */
    public const EPSG_SWEREF99_14_15_PLUS_RH2000_HEIGHT = 'urn:ogc:def:crs:EPSG::5851';

    /**
     * SWEREF99 15 00 + RH2000 height
     * Extent: Sweden - communes between approximately 14°15'E and 15°45'E and south of approximately 61°30'N. See
     * information source for map.
     */
    public const EPSG_SWEREF99_15_00_PLUS_RH2000_HEIGHT = 'urn:ogc:def:crs:EPSG::5848';

    /**
     * SWEREF99 15 45 + RH2000 height
     * Extent: Sweden - communes between approximately 15°E and 16°30'E and between approximately 60°30'N and 65°N.
     * See information source for map.
     */
    public const EPSG_SWEREF99_15_45_PLUS_RH2000_HEIGHT = 'urn:ogc:def:crs:EPSG::5852';

    /**
     * SWEREF99 16 30 + RH2000 height
     * Extent: Sweden - communes between approximately 15°45'E and 17°15'E and south of approximately 62°20'N. See
     * information source for map.
     */
    public const EPSG_SWEREF99_16_30_PLUS_RH2000_HEIGHT = 'urn:ogc:def:crs:EPSG::5849';

    /**
     * SWEREF99 17 15 + RH2000 height
     * Extent: Sweden - communes between approximately 14°20'E and 18°50'E and between approximately 67°10'N and
     * 62°05'N. See information source for map.
     */
    public const EPSG_SWEREF99_17_15_PLUS_RH2000_HEIGHT = 'urn:ogc:def:crs:EPSG::5853';

    /**
     * SWEREF99 18 00 + RH2000 height
     * Extent: Sweden - communes east of approximately 17°15'E between approximately 60°40'N and 58°50'N. See
     * information source for map.
     */
    public const EPSG_SWEREF99_18_00_PLUS_RH2000_HEIGHT = 'urn:ogc:def:crs:EPSG::5850';

    /**
     * SWEREF99 18 45 + RH2000 height
     * Extent: Sweden - mainland communes between approximately 18°E and 19°30'E and between approximately 62°50'N
     * and 66°N. Also Gotland. See information source for map.
     */
    public const EPSG_SWEREF99_18_45_PLUS_RH2000_HEIGHT = 'urn:ogc:def:crs:EPSG::5854';

    /**
     * SWEREF99 20 15 + RH2000 height
     * Extent: Sweden - communes in Vaasterbotten east of approximately 19°30'E and (i) north of 63°30'N and (ii)
     * south of approximately 65°05'N. Also Norbotten west of approximately 23°20'E. See information source for map.
     */
    public const EPSG_SWEREF99_20_15_PLUS_RH2000_HEIGHT = 'urn:ogc:def:crs:EPSG::5855';

    /**
     * SWEREF99 21 45 + RH2000 height
     * Extent: Sweden - communes in Norbotten east of approximately 19°30'E and south of approximately 65°50'N. See
     * information source for map.
     */
    public const EPSG_SWEREF99_21_45_PLUS_RH2000_HEIGHT = 'urn:ogc:def:crs:EPSG::5856';

    /**
     * SWEREF99 23 15 + RH2000 height
     * Extent: Sweden - communes east of approximately 21°50'E. See information source for map.
     */
    public const EPSG_SWEREF99_23_15_PLUS_RH2000_HEIGHT = 'urn:ogc:def:crs:EPSG::5857';

    /**
     * SWEREF99 TM + RH2000 height
     * Extent: Sweden - onshore.
     */
    public const EPSG_SWEREF99_TM_PLUS_RH2000_HEIGHT = 'urn:ogc:def:crs:EPSG::5845';

    /**
     * St. Helena Tritan / UTM zone 30S + Tritan 2011 height
     * Extent: St Helena, Ascension and Tristan da Cunha - St Helena Island - onshore.
     */
    public const EPSG_ST_HELENA_TRITAN_UTM_ZONE_30S_PLUS_TRITAN_2011_HEIGHT = 'urn:ogc:def:crs:EPSG::7955';

    /**
     * TPEN11 Grid + ODN height
     * Extent: UK - on or related to the Trans-Pennine rail route from Liverpool via Manchester to Bradford and Leeds.
     */
    public const EPSG_TPEN11_GRID_PLUS_ODN_HEIGHT = 'urn:ogc:def:crs:EPSG::9368';

    /**
     * Tokyo + JSLD69 height
     * Extent: Japan - onshore mainland - Honshu, Shikoku, Kyushu.
     * Replaced by JGD2000 + JGD2000 (vertical) (CRS code 6696) from April 2002).
     */
    public const EPSG_TOKYO_PLUS_JSLD69_HEIGHT = 'urn:ogc:def:crs:EPSG::7414';

    /**
     * Tokyo + JSLD72 height
     * Extent: Japan - onshore mainland - Hokkaido.
     * Replaced by JGD2000 + JGD2000 (vertical) (CRS code 6696) from April 2002).
     */
    public const EPSG_TOKYO_PLUS_JSLD72_HEIGHT = 'urn:ogc:def:crs:EPSG::6700';

    /**
     * WGS 84 + EGM2008 height
     * Extent: World.
     */
    public const EPSG_WGS_84_PLUS_EGM2008_HEIGHT = 'urn:ogc:def:crs:EPSG::9518';

    /**
     * WGS 84 + EGM96 height
     * Extent: World.
     */
    public const EPSG_WGS_84_PLUS_EGM96_HEIGHT = 'urn:ogc:def:crs:EPSG::9707';

    /**
     * WGS 84 + MSL height
     * Extent: World.
     * Component vertical CRS is not specific to any location or epoch.
     */
    public const EPSG_WGS_84_PLUS_MSL_HEIGHT = 'urn:ogc:def:crs:EPSG::9705';

    /**
     * WGS 84 / World Mercator + EGM2008 height
     * Extent: World.
     * Note: for preliminary concept visualisation only. Detailed design will require use of appropriate low-distortion
     * local projected and vertical CRSs.
     */
    public const EPSG_WGS_84_WORLD_MERCATOR_PLUS_EGM2008_HEIGHT = 'urn:ogc:def:crs:EPSG::6893';

    protected static $sridData = [
        'urn:ogc:def:crs:EPSG::3901' => [
            'name' => 'KKJ / Finland Uniform Coordinate System + N60 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::2393',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5717',
            'bounding_box' => [[19.24, 59.75], [19.24, 70.09], [31.59, 70.09], [31.59, 59.75]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::3902' => [
            'name' => 'ETRS89 / TM35FIN(N,E) + N60 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::5048',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5717',
            'bounding_box' => [[19.24, 59.75], [19.24, 70.09], [31.59, 70.09], [31.59, 59.75]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::3903' => [
            'name' => 'ETRS89 / TM35FIN(N,E) + N2000 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::5048',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::3900',
            'bounding_box' => [[19.24, 59.75], [19.24, 70.09], [31.59, 70.09], [31.59, 59.75]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4097' => [
            'name' => 'ETRS89 / DKTM1 + DVR90 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::4093',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5799',
            'bounding_box' => [[8.0, 54.8], [8.0, 57.64], [10.0, 57.64], [10.0, 54.8]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4098' => [
            'name' => 'ETRS89 / DKTM2 + DVR90 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::4094',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5799',
            'bounding_box' => [[9.0, 54.67], [9.0, 57.8], [11.29, 57.8], [11.29, 54.67]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4099' => [
            'name' => 'ETRS89 / DKTM3 + DVR90 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::4095',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5799',
            'bounding_box' => [[10.79, 54.51], [10.79, 56.79], [12.69, 56.79], [12.69, 54.51]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4100' => [
            'name' => 'ETRS89 / DKTM4 + DVR90 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::4096',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5799',
            'bounding_box' => [[14.59, 54.94], [14.59, 55.38], [15.25, 55.38], [15.25, 54.94]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5318' => [
            'name' => 'ETRS89 / Faroe TM + FVR09 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::5316',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5317',
            'bounding_box' => [[-7.49, 61.33], [-7.49, 62.41], [-6.33, 62.41], [-6.33, 61.33]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5498' => [
            'name' => 'NAD83 + NAVD88 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::4269',
            'horizontal_crs_type' => 'geographic 2D',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5703',
            'bounding_box' => [[-168.25266039145, 24.410230723243], [-168.25266039145, 71.396817302681], [-66.91700744628901, 71.396817302681], [-66.91700744628901, 24.410230723243]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5499' => [
            'name' => 'NAD83(HARN) + NAVD88 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::4152',
            'horizontal_crs_type' => 'geographic 2D',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5703',
            'bounding_box' => [[-124.79, 24.41], [-124.79, 49.38], [-66.91, 49.38], [-66.91, 24.41]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5500' => [
            'name' => 'NAD83(NSRS2007) + NAVD88 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::4759',
            'horizontal_crs_type' => 'geographic 2D',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5703',
            'bounding_box' => [[-124.79, 24.41], [-124.79, 49.38], [-66.91, 49.38], [-66.91, 24.41]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5554' => [
            'name' => 'ETRS89 / UTM zone 31N + DHHN92 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::25831',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5783',
            'bounding_box' => [[5.87, 50.97], [5.87, 51.83], [6.0, 51.83], [6.0, 50.97]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5555' => [
            'name' => 'ETRS89 / UTM zone 32N + DHHN92 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::25832',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5783',
            'bounding_box' => [[6.0, 47.27], [6.0, 55.09], [12.0, 55.09], [12.0, 47.27]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5556' => [
            'name' => 'ETRS89 / UTM zone 33N + DHHN92 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::25833',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5783',
            'bounding_box' => [[12.0, 47.46], [12.0, 54.74], [15.04, 54.74], [15.04, 47.46]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5598' => [
            'name' => 'FEH2010 / Fehmarnbelt TM + FCSVR10 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::5596',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5597',
            'bounding_box' => [[11.17, 54.42], [11.17, 54.76], [11.51, 54.76], [11.51, 54.42]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5628' => [
            'name' => 'SWEREF99 + RH2000 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::4619',
            'horizontal_crs_type' => 'geographic 2D',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5613',
            'bounding_box' => [[10.93, 55.28], [10.93, 69.06999999999999], [24.17, 69.06999999999999], [24.17, 55.28]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5698' => [
            'name' => 'RGF93 / Lambert-93 + NGF-IGN69 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::2154',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5720',
            'bounding_box' => [[-4.87, 42.33], [-4.87, 51.14], [8.23, 51.14], [8.23, 42.33]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5699' => [
            'name' => 'RGF93 / Lambert-93 + NGF-IGN78 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::2154',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5721',
            'bounding_box' => [[8.5, 41.31], [8.5, 43.07], [9.630000000000001, 43.07], [9.630000000000001, 41.31]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5707' => [
            'name' => 'NTF (Paris) / Lambert zone I + NGF-IGN69 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::27571',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5720',
            'bounding_box' => [[-4.87, 48.14], [-4.87, 51.14], [8.23, 51.14], [8.23, 48.14]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5708' => [
            'name' => 'NTF (Paris) / Lambert zone IV + NGF-IGN78 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::27574',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5721',
            'bounding_box' => [[8.5, 41.31], [8.5, 43.07], [9.630000000000001, 43.07], [9.630000000000001, 41.31]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5832' => [
            'name' => 'DB_REF / 3-degree Gauss-Kruger zone 2 (E-N) + DHHN92 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::5682',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5783',
            'bounding_box' => [[5.86, 49.11], [5.86, 53.81], [7.5, 53.81], [7.5, 49.11]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5833' => [
            'name' => 'DB_REF / 3-degree Gauss-Kruger zone 3 (E-N) + DHHN92 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::5683',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5783',
            'bounding_box' => [[7.5, 47.27], [7.5, 55.09], [10.51, 55.09], [10.51, 47.27]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5834' => [
            'name' => 'DB_REF / 3-degree Gauss-Kruger zone 4 (E-N) + DHHN92 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::5684',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5783',
            'bounding_box' => [[10.5, 47.39], [10.5, 54.74], [13.51, 54.74], [13.51, 47.39]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5835' => [
            'name' => 'DB_REF / 3-degree Gauss-Kruger zone 5 (E-N) + DHHN92 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::5685',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5783',
            'bounding_box' => [[13.5, 48.51], [13.5, 54.72], [15.04, 54.72], [15.04, 48.51]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5845' => [
            'name' => 'SWEREF99 TM + RH2000 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::3006',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5613',
            'bounding_box' => [[10.93, 55.28], [10.93, 69.06999999999999], [24.17, 69.06999999999999], [24.17, 55.28]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5846' => [
            'name' => 'SWEREF99 12 00 + RH2000 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::3007',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5613',
            'bounding_box' => [[10.93, 56.74], [10.93, 60.13], [13.11, 60.13], [13.11, 56.74]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5847' => [
            'name' => 'SWEREF99 13 30 + RH2000 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::3008',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5613',
            'bounding_box' => [[12.12, 55.28], [12.12, 62.28], [14.79, 62.28], [14.79, 55.28]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5848' => [
            'name' => 'SWEREF99 15 00 + RH2000 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::3009',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5613',
            'bounding_box' => [[13.54, 55.95], [13.54, 61.62], [16.15, 61.62], [16.15, 55.95]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5849' => [
            'name' => 'SWEREF99 16 30 + RH2000 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::3010',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5613',
            'bounding_box' => [[15.41, 56.15], [15.41, 62.26], [17.63, 62.26], [17.63, 56.15]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5850' => [
            'name' => 'SWEREF99 18 00 + RH2000 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::3011',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5613',
            'bounding_box' => [[17.08, 58.66], [17.08, 60.7], [19.61, 60.7], [19.61, 58.66]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5851' => [
            'name' => 'SWEREF99 14 15 + RH2000 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::3012',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5613',
            'bounding_box' => [[11.93, 61.55], [11.93, 64.39], [15.55, 64.39], [15.55, 61.55]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5852' => [
            'name' => 'SWEREF99 15 45 + RH2000 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::3013',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5613',
            'bounding_box' => [[13.66, 60.44], [13.66, 65.13], [17.01, 65.13], [17.01, 60.44]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5853' => [
            'name' => 'SWEREF99 17 15 + RH2000 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::3014',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5613',
            'bounding_box' => [[14.31, 62.12], [14.31, 67.19], [19.04, 67.19], [19.04, 62.12]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5854' => [
            'name' => 'SWEREF99 18 45 + RH2000 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::3015',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5613',
            'bounding_box' => [[17.18, 56.86], [17.18, 66.17], [20.22, 66.17], [20.22, 56.86]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5855' => [
            'name' => 'SWEREF99 20 15 + RH2000 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::3016',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5613',
            'bounding_box' => [[16.08, 63.45], [16.08, 69.06999999999999], [23.28, 69.06999999999999], [23.28, 63.45]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5856' => [
            'name' => 'SWEREF99 21 45 + RH2000 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::3017',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5613',
            'bounding_box' => [[19.63, 65.01000000000001], [19.63, 66.43000000000001], [22.91, 66.43000000000001], [22.91, 65.01000000000001]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5857' => [
            'name' => 'SWEREF99 23 15 + RH2000 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::3018',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5613',
            'bounding_box' => [[21.85, 65.48999999999999], [21.85, 68.14], [24.17, 68.14], [24.17, 65.48999999999999]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5942' => [
            'name' => 'ETRS89 + NN2000 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::4258',
            'horizontal_crs_type' => 'geographic 2D',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5941',
            'bounding_box' => [[4.68, 57.93], [4.68, 71.20999999999999], [31.22, 71.20999999999999], [31.22, 57.93]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5945' => [
            'name' => 'ETRS89 / NTM zone 5 + NN2000 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::5105',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5941',
            'bounding_box' => [[4.68, 58.32], [4.68, 62.49], [6.0, 62.49], [6.0, 58.32]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5946' => [
            'name' => 'ETRS89 / NTM zone 6 + NN2000 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::5106',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5941',
            'bounding_box' => [[6.0, 57.93], [6.0, 63.02], [7.0, 63.02], [7.0, 57.93]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5947' => [
            'name' => 'ETRS89 / NTM zone 7 + NN2000 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::5107',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5941',
            'bounding_box' => [[7.0, 57.93], [7.0, 63.52], [8.0, 63.52], [8.0, 57.93]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5948' => [
            'name' => 'ETRS89 / NTM zone 8 + NN2000 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::5108',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5941',
            'bounding_box' => [[8.0, 58.03], [8.0, 63.87], [9.0, 63.87], [9.0, 58.03]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5949' => [
            'name' => 'ETRS89 / NTM zone 9 + NN2000 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::5109',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5941',
            'bounding_box' => [[9.0, 58.52], [9.0, 64.16], [10.0, 64.16], [10.0, 58.52]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5950' => [
            'name' => 'ETRS89 / NTM zone 10 + NN2000 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::5110',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5941',
            'bounding_box' => [[10.0, 58.9], [10.0, 65.04000000000001], [11.0, 65.04000000000001], [11.0, 58.9]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5951' => [
            'name' => 'ETRS89 / NTM zone 11 + NN2000 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::5111',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5941',
            'bounding_box' => [[11.0, 58.88], [11.0, 65.76000000000001], [12.0, 65.76000000000001], [12.0, 58.88]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5952' => [
            'name' => 'ETRS89 / NTM zone 12 + NN2000 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::5112',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5941',
            'bounding_box' => [[12.0, 59.88], [12.0, 68.15000000000001], [13.0, 68.15000000000001], [13.0, 59.88]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5953' => [
            'name' => 'ETRS89 / NTM zone 13 + NN2000 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::5113',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5941',
            'bounding_box' => [[13.0, 64.01000000000001], [13.0, 68.37], [14.0, 68.37], [14.0, 64.01000000000001]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5954' => [
            'name' => 'ETRS89 / NTM zone 14 + NN2000 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::5114',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5941',
            'bounding_box' => [[14.0, 64.03], [14.0, 69.05], [15.0, 69.05], [15.0, 64.03]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5955' => [
            'name' => 'ETRS89 / NTM zone 15 + NN2000 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::5115',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5941',
            'bounding_box' => [[15.0, 66.14], [15.0, 69.34999999999999], [16.0, 69.34999999999999], [16.0, 66.14]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5956' => [
            'name' => 'ETRS89 / NTM zone 16 + NN2000 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::5116',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5941',
            'bounding_box' => [[16.0, 66.88], [16.0, 69.45], [17.0, 69.45], [17.0, 66.88]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5957' => [
            'name' => 'ETRS89 / NTM zone 17 + NN2000 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::5117',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5941',
            'bounding_box' => [[17.0, 67.94], [17.0, 69.68000000000001], [18.0, 69.68000000000001], [18.0, 67.94]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5958' => [
            'name' => 'ETRS89 / NTM zone 18 + NN2000 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::5118',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5941',
            'bounding_box' => [[18.0, 68.04000000000001], [18.0, 70.27], [19.0, 70.27], [19.0, 68.04000000000001]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5959' => [
            'name' => 'ETRS89 / NTM zone 19 + NN2000 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::5119',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5941',
            'bounding_box' => [[19.0, 68.33], [19.0, 70.34], [20.0, 70.34], [20.0, 68.33]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5960' => [
            'name' => 'ETRS89 / NTM zone 20 + NN2000 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::5120',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5941',
            'bounding_box' => [[20.0, 68.37], [20.0, 70.29000000000001], [21.0, 70.29000000000001], [21.0, 68.37]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5961' => [
            'name' => 'ETRS89 / NTM zone 21 + NN2000 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::5121',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5941',
            'bounding_box' => [[21.0, 69.03], [21.0, 70.70999999999999], [22.0, 70.70999999999999], [22.0, 69.03]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5962' => [
            'name' => 'ETRS89 / NTM zone 22 + NN2000 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::5122',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5941',
            'bounding_box' => [[22.0, 68.69], [22.0, 70.81], [23.0, 70.81], [23.0, 68.69]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5963' => [
            'name' => 'ETRS89 / NTM zone 23 + NN2000 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::5123',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5941',
            'bounding_box' => [[23.0, 68.62], [23.0, 71.08], [24.0, 71.08], [24.0, 68.62]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5964' => [
            'name' => 'ETRS89 / NTM zone 24 + NN2000 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::5124',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5941',
            'bounding_box' => [[24.0, 68.58], [24.0, 71.16], [25.0, 71.16], [25.0, 68.58]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5965' => [
            'name' => 'ETRS89 / NTM zone 25 + NN2000 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::5125',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5941',
            'bounding_box' => [[25.0, 68.59], [25.0, 71.20999999999999], [26.0, 71.20999999999999], [26.0, 68.59]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5966' => [
            'name' => 'ETRS89 / NTM zone 26 + NN2000 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::5126',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5941',
            'bounding_box' => [[26.0, 69.70999999999999], [26.0, 71.17], [27.0, 71.17], [27.0, 69.70999999999999]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5967' => [
            'name' => 'ETRS89 / NTM zone 27 + NN2000 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::5127',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5941',
            'bounding_box' => [[27.0, 69.90000000000001], [27.0, 71.17], [28.0, 71.17], [28.0, 69.90000000000001]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5968' => [
            'name' => 'ETRS89 / NTM zone 28 + NN2000 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::5128',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5941',
            'bounding_box' => [[28.0, 69.03], [28.0, 71.13], [29.0, 71.13], [29.0, 69.03]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5969' => [
            'name' => 'ETRS89 / NTM zone 29 + NN2000 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::5129',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5941',
            'bounding_box' => [[29.0, 69.02], [29.0, 70.93000000000001], [30.0, 70.93000000000001], [30.0, 69.02]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5970' => [
            'name' => 'ETRS89 / NTM zone 30 + NN2000 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::5130',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5941',
            'bounding_box' => [[30.0, 69.45999999999999], [30.0, 70.77], [31.22, 70.77], [31.22, 69.45999999999999]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5971' => [
            'name' => 'ETRS89 / UTM zone 31N + NN2000 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::25831',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5941',
            'bounding_box' => [[4.68, 58.32], [4.68, 62.49], [6.0, 62.49], [6.0, 58.32]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5972' => [
            'name' => 'ETRS89 / UTM zone 32N + NN2000 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::25832',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5941',
            'bounding_box' => [[6.0, 57.93], [6.0, 65.76000000000001], [12.0, 65.76000000000001], [12.0, 57.93]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5973' => [
            'name' => 'ETRS89 / UTM zone 33N + NN2000 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::25833',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5941',
            'bounding_box' => [[12.0, 59.88], [12.0, 69.68000000000001], [18.01, 69.68000000000001], [18.01, 59.88]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5974' => [
            'name' => 'ETRS89 / UTM zone 34N + NN2000 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::25834',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5941',
            'bounding_box' => [[18.0, 68.04000000000001], [18.0, 71.08], [24.01, 71.08], [24.01, 68.04000000000001]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5975' => [
            'name' => 'ETRS89 / UTM zone 35N + NN2000 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::25835',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5941',
            'bounding_box' => [[24.0, 68.58], [24.0, 71.20999999999999], [30.0, 71.20999999999999], [30.0, 68.58]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5976' => [
            'name' => 'ETRS89 / UTM zone 36N + NN2000 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::25836',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5941',
            'bounding_box' => [[30.0, 69.45999999999999], [30.0, 70.77], [31.22, 70.77], [31.22, 69.45999999999999]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::6144' => [
            'name' => 'ETRS89 + NN54 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::4258',
            'horizontal_crs_type' => 'geographic 2D',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5776',
            'bounding_box' => [[4.68, 57.93], [4.68, 71.20999999999999], [31.22, 71.20999999999999], [31.22, 57.93]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::6145' => [
            'name' => 'ETRS89 / NTM zone 5 + NN54 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::5105',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5776',
            'bounding_box' => [[4.68, 58.32], [4.68, 62.49], [6.0, 62.49], [6.0, 58.32]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::6146' => [
            'name' => 'ETRS89 / NTM zone 6 + NN54 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::5106',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5776',
            'bounding_box' => [[6.0, 57.93], [6.0, 63.02], [7.0, 63.02], [7.0, 57.93]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::6147' => [
            'name' => 'ETRS89 / NTM zone 7 + NN54 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::5107',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5776',
            'bounding_box' => [[7.0, 57.93], [7.0, 63.52], [8.0, 63.52], [8.0, 57.93]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::6148' => [
            'name' => 'ETRS89 / NTM zone 8 + NN54 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::5108',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5776',
            'bounding_box' => [[8.0, 58.03], [8.0, 63.87], [9.0, 63.87], [9.0, 58.03]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::6149' => [
            'name' => 'ETRS89 / NTM zone 9 + NN54 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::5109',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5776',
            'bounding_box' => [[9.0, 58.52], [9.0, 64.16], [10.0, 64.16], [10.0, 58.52]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::6150' => [
            'name' => 'ETRS89 / NTM zone 10 + NN54 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::5110',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5776',
            'bounding_box' => [[10.0, 58.9], [10.0, 65.04000000000001], [11.0, 65.04000000000001], [11.0, 58.9]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::6151' => [
            'name' => 'ETRS89 / NTM zone 11 + NN54 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::5111',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5776',
            'bounding_box' => [[11.0, 58.88], [11.0, 65.76000000000001], [12.0, 65.76000000000001], [12.0, 58.88]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::6152' => [
            'name' => 'ETRS89 / NTM zone 12 + NN54 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::5112',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5776',
            'bounding_box' => [[12.0, 59.88], [12.0, 68.15000000000001], [13.0, 68.15000000000001], [13.0, 59.88]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::6153' => [
            'name' => 'ETRS89 / NTM zone 13 + NN54 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::5113',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5776',
            'bounding_box' => [[13.0, 64.01000000000001], [13.0, 68.37], [14.0, 68.37], [14.0, 64.01000000000001]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::6154' => [
            'name' => 'ETRS89 / NTM zone 14 + NN54 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::5114',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5776',
            'bounding_box' => [[14.0, 64.03], [14.0, 69.05], [15.0, 69.05], [15.0, 64.03]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::6155' => [
            'name' => 'ETRS89 / NTM zone 15 + NN54 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::5115',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5776',
            'bounding_box' => [[15.0, 66.14], [15.0, 69.34999999999999], [16.0, 69.34999999999999], [16.0, 66.14]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::6156' => [
            'name' => 'ETRS89 / NTM zone 16 + NN54 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::5116',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5776',
            'bounding_box' => [[16.0, 66.88], [16.0, 69.45], [17.0, 69.45], [17.0, 66.88]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::6157' => [
            'name' => 'ETRS89 / NTM zone 17 + NN54 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::5117',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5776',
            'bounding_box' => [[17.0, 67.94], [17.0, 69.68000000000001], [18.0, 69.68000000000001], [18.0, 67.94]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::6158' => [
            'name' => 'ETRS89 / NTM zone 18 + NN54 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::5118',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5776',
            'bounding_box' => [[18.0, 68.04000000000001], [18.0, 70.27], [19.0, 70.27], [19.0, 68.04000000000001]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::6159' => [
            'name' => 'ETRS89 / NTM zone 19 + NN54 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::5119',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5776',
            'bounding_box' => [[19.0, 68.33], [19.0, 70.34], [20.0, 70.34], [20.0, 68.33]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::6160' => [
            'name' => 'ETRS89 / NTM zone 20 + NN54 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::5120',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5776',
            'bounding_box' => [[20.0, 68.37], [20.0, 70.29000000000001], [21.0, 70.29000000000001], [21.0, 68.37]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::6161' => [
            'name' => 'ETRS89 / NTM zone 21 + NN54 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::5121',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5776',
            'bounding_box' => [[21.0, 69.03], [21.0, 70.70999999999999], [22.0, 70.70999999999999], [22.0, 69.03]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::6162' => [
            'name' => 'ETRS89 / NTM zone 22 + NN54 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::5122',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5776',
            'bounding_box' => [[22.0, 68.69], [22.0, 70.81], [23.0, 70.81], [23.0, 68.69]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::6163' => [
            'name' => 'ETRS89 / NTM zone 23 + NN54 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::5123',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5776',
            'bounding_box' => [[23.0, 68.62], [23.0, 71.08], [24.0, 71.08], [24.0, 68.62]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::6164' => [
            'name' => 'ETRS89 / NTM zone 24 + NN54 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::5124',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5776',
            'bounding_box' => [[24.0, 68.58], [24.0, 71.16], [25.0, 71.16], [25.0, 68.58]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::6165' => [
            'name' => 'ETRS89 / NTM zone 25 + NN54 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::5125',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5776',
            'bounding_box' => [[25.0, 68.59], [25.0, 71.20999999999999], [26.0, 71.20999999999999], [26.0, 68.59]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::6166' => [
            'name' => 'ETRS89 / NTM zone 26 + NN54 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::5126',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5776',
            'bounding_box' => [[26.0, 69.70999999999999], [26.0, 71.17], [27.0, 71.17], [27.0, 69.70999999999999]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::6167' => [
            'name' => 'ETRS89 / NTM zone 27 + NN54 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::5127',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5776',
            'bounding_box' => [[27.0, 69.90000000000001], [27.0, 71.17], [28.0, 71.17], [28.0, 69.90000000000001]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::6168' => [
            'name' => 'ETRS89 / NTM zone 28 + NN54 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::5128',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5776',
            'bounding_box' => [[28.0, 69.03], [28.0, 71.13], [29.0, 71.13], [29.0, 69.03]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::6169' => [
            'name' => 'ETRS89 / NTM zone 29 + NN54 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::5129',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5776',
            'bounding_box' => [[29.0, 69.02], [29.0, 70.93000000000001], [30.0, 70.93000000000001], [30.0, 69.02]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::6170' => [
            'name' => 'ETRS89 / NTM zone 30 + NN54 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::5130',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5776',
            'bounding_box' => [[30.0, 69.45999999999999], [30.0, 70.77], [31.22, 70.77], [31.22, 69.45999999999999]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::6171' => [
            'name' => 'ETRS89 / UTM zone 31N + NN54 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::25831',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5776',
            'bounding_box' => [[4.68, 58.32], [4.68, 62.49], [6.0, 62.49], [6.0, 58.32]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::6172' => [
            'name' => 'ETRS89 / UTM zone 32N + NN54 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::25832',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5776',
            'bounding_box' => [[6.0, 57.93], [6.0, 65.76000000000001], [12.0, 65.76000000000001], [12.0, 57.93]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::6173' => [
            'name' => 'ETRS89 / UTM zone 33N + NN54 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::25833',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5776',
            'bounding_box' => [[12.0, 59.88], [12.0, 69.68000000000001], [18.01, 69.68000000000001], [18.01, 59.88]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::6174' => [
            'name' => 'ETRS89 / UTM zone 34N + NN54 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::25834',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5776',
            'bounding_box' => [[18.0, 68.04000000000001], [18.0, 71.08], [24.01, 71.08], [24.01, 68.04000000000001]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::6175' => [
            'name' => 'ETRS89 / UTM zone 35N + NN54 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::25835',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5776',
            'bounding_box' => [[24.0, 68.58], [24.0, 71.20999999999999], [30.0, 71.20999999999999], [30.0, 68.58]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::6176' => [
            'name' => 'ETRS89 / UTM zone 36N + NN54 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::25836',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5776',
            'bounding_box' => [[30.0, 69.45999999999999], [30.0, 70.77], [31.22, 70.77], [31.22, 69.45999999999999]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::6190' => [
            'name' => 'Belge 1972 / Belgian Lambert 72 + Ostend height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::31370',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5710',
            'bounding_box' => [[2.5, 49.5], [2.5, 51.51], [6.4, 51.51], [6.4, 49.5]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::6349' => [
            'name' => 'NAD83(2011) + NAVD88 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::6318',
            'horizontal_crs_type' => 'geographic 2D',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5703',
            'bounding_box' => [[-168.25266039145, 24.410230723243], [-168.25266039145, 71.396817302681], [-66.91700744628901, 71.396817302681], [-66.91700744628901, 24.410230723243]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::6649' => [
            'name' => 'NAD83(CSRS) + CGVD2013 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::4617',
            'horizontal_crs_type' => 'geographic 2D',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::6647',
            'bounding_box' => [[-141.01, 40.04], [-141.01, 86.45999999999999], [-47.74, 86.45999999999999], [-47.74, 40.04]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::6650' => [
            'name' => 'NAD83(CSRS) / UTM zone 7N + CGVD2013 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::3154',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::6647',
            'bounding_box' => [[-141.01, 52.05], [-141.01, 72.53], [-138.0, 72.53], [-138.0, 52.05]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::6651' => [
            'name' => 'NAD83(CSRS) / UTM zone 8N + CGVD2013 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::3155',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::6647',
            'bounding_box' => [[-138.0, 48.06], [-138.0, 79.42], [-132.0, 79.42], [-132.0, 48.06]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::6652' => [
            'name' => 'NAD83(CSRS) / UTM zone 9N + CGVD2013 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::3156',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::6647',
            'bounding_box' => [[-132.0, 46.52], [-132.0, 80.93000000000001], [-126.0, 80.93000000000001], [-126.0, 46.52]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::6653' => [
            'name' => 'NAD83(CSRS) / UTM zone 10N + CGVD2013 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::3157',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::6647',
            'bounding_box' => [[-126.0, 48.13], [-126.0, 81.8], [-120.0, 81.8], [-120.0, 48.13]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::6654' => [
            'name' => 'NAD83(CSRS) / UTM zone 11N + CGVD2013 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::2955',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::6647',
            'bounding_box' => [[-120.0, 48.99], [-120.0, 83.5], [-114.0, 83.5], [-114.0, 48.99]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::6655' => [
            'name' => 'NAD83(CSRS) / UTM zone 12N + CGVD2013 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::2956',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::6647',
            'bounding_box' => [[-114.0, 48.99], [-114.0, 84.0], [-108.0, 84.0], [-108.0, 48.99]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::6656' => [
            'name' => 'NAD83(CSRS) / UTM zone 13N + CGVD2013 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::2957',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::6647',
            'bounding_box' => [[-108.0, 48.99], [-108.0, 84.0], [-102.0, 84.0], [-102.0, 48.99]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::6657' => [
            'name' => 'NAD83(CSRS) / UTM zone 14N + CGVD2013 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::3158',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::6647',
            'bounding_box' => [[-102.0, 48.99], [-102.0, 84.0], [-96.0, 84.0], [-96.0, 48.99]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::6658' => [
            'name' => 'NAD83(CSRS) / UTM zone 15N + CGVD2013 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::3159',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::6647',
            'bounding_box' => [[-96.0, 48.03], [-96.0, 84.0], [-90.0, 84.0], [-90.0, 48.03]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::6659' => [
            'name' => 'NAD83(CSRS) / UTM zone 16N + CGVD2013 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::3160',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::6647',
            'bounding_box' => [[-90.0, 46.11], [-90.0, 84.0], [-84.0, 84.0], [-84.0, 46.11]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::6660' => [
            'name' => 'NAD83(CSRS) / UTM zone 17N + CGVD2013 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::2958',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::6647',
            'bounding_box' => [[-84.0, 41.67], [-84.0, 84.0], [-78.0, 84.0], [-78.0, 41.67]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::6661' => [
            'name' => 'NAD83(CSRS) / UTM zone 18N + CGVD2013 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::2959',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::6647',
            'bounding_box' => [[-78.0, 43.63], [-78.0, 84.0], [-72.0, 84.0], [-72.0, 43.63]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::6662' => [
            'name' => 'NAD83(CSRS) / UTM zone 19N + CGVD2013 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::2960',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::6647',
            'bounding_box' => [[-72.0, 40.8], [-72.0, 84.0], [-66.0, 84.0], [-66.0, 40.8]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::6663' => [
            'name' => 'NAD83(CSRS) / UTM zone 20N + CGVD2013 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::2961',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::6647',
            'bounding_box' => [[-66.0, 40.04], [-66.0, 84.0], [-60.0, 84.0], [-60.0, 40.04]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::6664' => [
            'name' => 'NAD83(CSRS) / UTM zone 21N + CGVD2013 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::2962',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::6647',
            'bounding_box' => [[-60.0, 40.57], [-60.0, 84.0], [-54.0, 84.0], [-54.0, 40.57]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::6665' => [
            'name' => 'NAD83(CSRS) / UTM zone 22N + CGVD2013 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::3761',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::6647',
            'bounding_box' => [[-54.0, 43.27], [-54.0, 57.65], [-48.0, 57.65], [-48.0, 43.27]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::6696' => [
            'name' => 'JGD2000 + JGD2000 (vertical) height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::4612',
            'horizontal_crs_type' => 'geographic 2D',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::6694',
            'bounding_box' => [[129.3, 30.94], [129.3, 45.54], [145.87, 45.54], [145.87, 30.94]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::6697' => [
            'name' => 'JGD2011 + JGD2011 (vertical) height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::6668',
            'horizontal_crs_type' => 'geographic 2D',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::6695',
            'bounding_box' => [[129.3, 30.94], [129.3, 45.54], [145.87, 45.54], [145.87, 30.94]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::6700' => [
            'name' => 'Tokyo + JSLD72 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::4301',
            'horizontal_crs_type' => 'geographic 2D',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::6693',
            'bounding_box' => [[139.7, 41.34], [139.7, 45.54], [145.87, 45.54], [145.87, 41.34]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::6893' => [
            'name' => 'WGS 84 / World Mercator + EGM2008 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::3395',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::3855',
            'bounding_box' => [[-180.0, -90.0], [-180.0, 90.0], [180.0, 90.0], [180.0, -90.0]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::6917' => [
            'name' => 'SVY21 + SHD height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::4757',
            'horizontal_crs_type' => 'geographic 2D',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::6916',
            'bounding_box' => [[103.59, 1.13], [103.59, 1.47], [104.07, 1.47], [104.07, 1.13]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::6927' => [
            'name' => 'SVY21 / Singapore TM + SHD height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::3414',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::6916',
            'bounding_box' => [[103.59, 1.13], [103.59, 1.47], [104.07, 1.47], [104.07, 1.13]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::7400' => [
            'name' => 'NTF (Paris) + NGF IGN69 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::4807',
            'horizontal_crs_type' => 'geographic 2D',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5720',
            'bounding_box' => [[-4.87, 42.33], [-4.87, 51.14], [8.23, 51.14], [8.23, 42.33]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::7404' => [
            'name' => 'RT90 + RH70 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::4124',
            'horizontal_crs_type' => 'geographic 2D',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5718',
            'bounding_box' => [[10.93, 55.28], [10.93, 69.06999999999999], [24.17, 69.06999999999999], [24.17, 55.28]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::7405' => [
            'name' => 'OSGB 1936 / British National Grid + ODN height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::27700',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5701',
            'bounding_box' => [[-7.06, 49.93], [-7.06, 58.71], [1.8, 58.71], [1.8, 49.93]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::7406' => [
            'name' => 'NAD27 + NGVD29 height (ftUS)',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::4267',
            'horizontal_crs_type' => 'geographic 2D',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5702',
            'bounding_box' => [[-124.79, 24.41], [-124.79, 49.38], [-66.91, 49.38], [-66.91, 24.41]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::7407' => [
            'name' => 'NAD27 / Texas North + NGVD29 height (ftUS)',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::32037',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5702',
            'bounding_box' => [[-103.03, 34.3], [-103.03, 36.5], [-99.98999999999999, 36.5], [-99.98999999999999, 34.3]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::7409' => [
            'name' => 'ETRS89 + EVRF2000 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::4258',
            'horizontal_crs_type' => 'geographic 2D',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5730',
            'bounding_box' => [[-9.56, 35.95], [-9.56, 71.20999999999999], [31.59, 71.20999999999999], [31.59, 35.95]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::7410' => [
            'name' => 'PSHD93',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::4134',
            'horizontal_crs_type' => 'geographic 2D',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5724',
            'bounding_box' => [[51.99, 16.59], [51.99, 26.58], [59.91, 26.58], [59.91, 16.59]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::7411' => [
            'name' => 'NTF (Paris) / Lambert zone II + NGF Lallemand height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::27572',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5719',
            'bounding_box' => [[-4.87, 42.33], [-4.87, 51.14], [8.23, 51.14], [8.23, 42.33]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::7414' => [
            'name' => 'Tokyo + JSLD69 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::4301',
            'horizontal_crs_type' => 'geographic 2D',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5723',
            'bounding_box' => [[129.3, 30.94], [129.3, 41.58], [142.14, 41.58], [142.14, 30.94]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::7415' => [
            'name' => 'Amersfoort / RD New + NAP height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::28992',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5709',
            'bounding_box' => [[3.2, 50.75], [3.2, 53.7], [7.22, 53.7], [7.22, 50.75]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::7416' => [
            'name' => 'ETRS89 / UTM zone 32N + DVR90 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::25832',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5799',
            'bounding_box' => [[8.0, 54.51], [8.0, 57.8], [12.0, 57.8], [12.0, 54.51]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::7417' => [
            'name' => 'ETRS89 / UTM zone 33N + DVR90 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::25833',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5799',
            'bounding_box' => [[12.0, 54.51], [12.0, 56.18], [15.25, 56.18], [15.25, 54.51]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::7418' => [
            'name' => 'ETRS89 / Kp2000 Jutland + DVR90 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::2196',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5799',
            'bounding_box' => [[8.0, 54.67], [8.0, 57.8], [11.29, 57.8], [11.29, 54.67]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::7419' => [
            'name' => 'ETRS89 / Kp2000 Zealand + DVR90 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::2197',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5799',
            'bounding_box' => [[10.79, 54.51], [10.79, 56.79], [12.69, 56.79], [12.69, 54.51]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::7420' => [
            'name' => 'ETRS89 / Kp2000 Bornholm + DVR90 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::2198',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5799',
            'bounding_box' => [[14.59, 54.94], [14.59, 55.38], [15.25, 55.38], [15.25, 54.94]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::7421' => [
            'name' => 'NTF (Paris) / Lambert zone II + NGF-IGN69 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::27572',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5720',
            'bounding_box' => [[-4.87, 42.33], [-4.87, 51.14], [8.23, 51.14], [8.23, 42.33]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::7422' => [
            'name' => 'NTF (Paris) / Lambert zone III + NGF-IGN69 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::27573',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5720',
            'bounding_box' => [[-1.79, 42.33], [-1.79, 45.46], [7.71, 45.46], [7.71, 42.33]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::7423' => [
            'name' => 'ETRS89 + EVRF2007 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::4258',
            'horizontal_crs_type' => 'geographic 2D',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5621',
            'bounding_box' => [[-9.56, 35.95], [-9.56, 71.20999999999999], [31.59, 71.20999999999999], [31.59, 35.95]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::7954' => [
            'name' => 'Astro DOS 71 / UTM zone 30S + Jamestown 1971 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::7878',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::7888',
            'bounding_box' => [[-5.85, -16.08], [-5.85, -15.85], [-5.58, -15.85], [-5.58, -16.08]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::7955' => [
            'name' => 'St. Helena Tritan / UTM zone 30S + Tritan 2011 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::7883',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::7889',
            'bounding_box' => [[-5.85, -16.08], [-5.85, -15.85], [-5.58, -15.85], [-5.58, -16.08]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::7956' => [
            'name' => 'SHMG2015 + SHVD2015 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::7887',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::7890',
            'bounding_box' => [[-5.85, -16.08], [-5.85, -15.85], [-5.58, -15.85], [-5.58, -16.08]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8349' => [
            'name' => 'GR96 + GVR2000 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::4747',
            'horizontal_crs_type' => 'geographic 2D',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::8266',
            'bounding_box' => [[-75.0, 59.0], [-75.0, 84.01000000000001], [-10.0, 84.01000000000001], [-10.0, 59.0]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8350' => [
            'name' => 'GR96 + GVR2016 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::4747',
            'horizontal_crs_type' => 'geographic 2D',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::8267',
            'bounding_box' => [[-75.0, 58.0], [-75.0, 85.01000000000001], [-6.99, 85.01000000000001], [-6.99, 58.0]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8360' => [
            'name' => 'ETRS89 + Baltic 1957 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::4258',
            'horizontal_crs_type' => 'geographic 2D',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::8357',
            'bounding_box' => [[12.09, 47.73], [12.09, 51.06], [22.56, 51.06], [22.56, 47.73]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8370' => [
            'name' => 'ETRS89 / Belgian Lambert 2008 + Ostend height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::3812',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5710',
            'bounding_box' => [[2.5, 49.5], [2.5, 51.51], [6.4, 51.51], [6.4, 49.5]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8700' => [
            'name' => 'NAD83 / Arizona East (ft) + NAVD88 height (ft)',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::2222',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::8228',
            'bounding_box' => [[-111.71, 31.33], [-111.71, 37.01], [-109.04, 37.01], [-109.04, 31.33]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8701' => [
            'name' => 'NAD83 / Arizona Central (ft) + NAVD88 height (ft)',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::2223',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::8228',
            'bounding_box' => [[-113.35, 31.33], [-113.35, 37.01], [-110.44, 37.01], [-110.44, 31.33]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8702' => [
            'name' => 'NAD83 / Arizona West (ft) + NAVD88 height (ft)',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::2224',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::8228',
            'bounding_box' => [[-114.81, 32.05], [-114.81, 37.0], [-112.52, 37.0], [-112.52, 32.05]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8703' => [
            'name' => 'NAD83 / Michigan North (ft) + NAVD88 height (ft)',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::2251',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::8228',
            'bounding_box' => [[-90.42, 45.08], [-90.42, 48.32], [-83.44, 48.32], [-83.44, 45.08]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8704' => [
            'name' => 'NAD83 / Michigan Central (ft) + NAVD88 height (ft)',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::2252',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::8228',
            'bounding_box' => [[-87.06, 43.8], [-87.06, 45.92], [-82.27, 45.92], [-82.27, 43.8]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8705' => [
            'name' => 'NAD83 / Michigan South (ft) + NAVD88 height (ft)',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::2253',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::8228',
            'bounding_box' => [[-87.2, 41.69], [-87.2, 44.22], [-82.13, 44.22], [-82.13, 41.69]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8706' => [
            'name' => 'NAD83 / Montana (ft) + NAVD88 height (ft)',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::2256',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::8228',
            'bounding_box' => [[-116.07, 44.35], [-116.07, 49.01], [-104.04, 49.01], [-104.04, 44.35]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8707' => [
            'name' => 'NAD83 / North Dakota North (ft) + NAVD88 height (ft)',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::2265',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::8228',
            'bounding_box' => [[-104.07, 47.15], [-104.07, 49.01], [-96.83, 49.01], [-96.83, 47.15]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8708' => [
            'name' => 'NAD83 / North Dakota South (ft) + NAVD88 height (ft)',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::2266',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::8228',
            'bounding_box' => [[-104.05, 45.93], [-104.05, 47.83], [-96.55, 47.83], [-96.55, 45.93]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8709' => [
            'name' => 'NAD83 / Oregon North (ft) + NAVD88 height (ft)',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::2269',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::8228',
            'bounding_box' => [[-124.17, 43.95], [-124.17, 46.26], [-116.47, 46.26], [-116.47, 43.95]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8710' => [
            'name' => 'NAD83 / Oregon South (ft) + NAVD88 height (ft)',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::2270',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::8228',
            'bounding_box' => [[-124.6, 41.98], [-124.6, 44.56], [-116.9, 44.56], [-116.9, 41.98]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8711' => [
            'name' => 'NAD83 / South Carolina (ft) + NAVD88 height (ft)',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::2273',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::8228',
            'bounding_box' => [[-83.36, 32.05], [-83.36, 35.21], [-78.52, 35.21], [-78.52, 32.05]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8712' => [
            'name' => 'NAD83 / Arkansas North (ftUS) + NAVD88 height (ftUS)',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::3433',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::6360',
            'bounding_box' => [[-94.62, 34.67], [-94.62, 36.5], [-89.64, 36.5], [-89.64, 34.67]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8713' => [
            'name' => 'NAD83 / Arkansas South (ftUS) + NAVD88 height (ftUS)',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::3434',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::6360',
            'bounding_box' => [[-94.48, 33.01], [-94.48, 35.1], [-90.40000000000001, 35.1], [-90.40000000000001, 33.01]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8714' => [
            'name' => 'NAD83 / California zone 1 (ftUS) + NAVD88 height (ftUS)',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::2225',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::6360',
            'bounding_box' => [[-124.45, 39.59], [-124.45, 42.01], [-119.99, 42.01], [-119.99, 39.59]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8715' => [
            'name' => 'NAD83 / California zone 2 (ftUS) + NAVD88 height (ftUS)',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::2226',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::6360',
            'bounding_box' => [[-124.06, 38.02], [-124.06, 40.16], [-119.54, 40.16], [-119.54, 38.02]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8716' => [
            'name' => 'NAD83 / California zone 3 (ftUS) + NAVD88 height (ftUS)',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::2227',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::6360',
            'bounding_box' => [[-123.02, 36.73], [-123.02, 38.71], [-117.83, 38.71], [-117.83, 36.73]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8717' => [
            'name' => 'NAD83 / California zone 4 (ftUS) + NAVD88 height (ftUS)',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::2228',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::6360',
            'bounding_box' => [[-122.01, 35.78], [-122.01, 37.58], [-115.62, 37.58], [-115.62, 35.78]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8718' => [
            'name' => 'NAD83 / California zone 5 (ftUS) + NAVD88 height (ftUS)',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::2229',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::6360',
            'bounding_box' => [[-121.42, 32.76], [-121.42, 35.81], [-114.12, 35.81], [-114.12, 32.76]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8719' => [
            'name' => 'NAD83 / California zone 6 (ftUS) + NAVD88 height (ftUS)',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::2230',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::6360',
            'bounding_box' => [[-118.15, 32.53], [-118.15, 34.08], [-114.42, 34.08], [-114.42, 32.53]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8720' => [
            'name' => 'NAD83 / Colorado North (ftUS) + NAVD88 height (ftUS)',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::2231',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::6360',
            'bounding_box' => [[-109.06, 39.56], [-109.06, 41.01], [-102.04, 41.01], [-102.04, 39.56]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8721' => [
            'name' => 'NAD83 / Colorado Central (ftUS) + NAVD88 height (ftUS)',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::2232',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::6360',
            'bounding_box' => [[-109.06, 38.14], [-109.06, 40.09], [-102.04, 40.09], [-102.04, 38.14]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8722' => [
            'name' => 'NAD83 / Colorado South (ftUS) + NAVD88 height (ftUS)',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::2233',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::6360',
            'bounding_box' => [[-109.06, 36.98], [-109.06, 38.68], [-102.04, 38.68], [-102.04, 36.98]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8723' => [
            'name' => 'NAD83 / Connecticut (ftUS) + NAVD88 height (ftUS)',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::2234',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::6360',
            'bounding_box' => [[-73.73, 40.98], [-73.73, 42.05], [-71.78, 42.05], [-71.78, 40.98]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8724' => [
            'name' => 'NAD83 / Delaware (ftUS) + NAVD88 height (ftUS)',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::2235',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::6360',
            'bounding_box' => [[-75.8, 38.44], [-75.8, 39.85], [-74.97, 39.85], [-74.97, 38.44]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8725' => [
            'name' => 'NAD83 / Florida North (ftUS) + NAVD88 height (ftUS)',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::2238',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::6360',
            'bounding_box' => [[-87.63, 29.21], [-87.63, 31.01], [-82.04000000000001, 31.01], [-82.04000000000001, 29.21]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8726' => [
            'name' => 'NAD83 / Florida East (ftUS) + NAVD88 height (ftUS)',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::2236',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::6360',
            'bounding_box' => [[-82.33, 24.41], [-82.33, 30.83], [-79.97, 30.83], [-79.97, 24.41]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8727' => [
            'name' => 'NAD83 / Florida West (ftUS) + NAVD88 height (ftUS)',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::2237',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::6360',
            'bounding_box' => [[-83.34, 26.27], [-83.34, 29.6], [-81.13, 29.6], [-81.13, 26.27]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8728' => [
            'name' => 'NAD83 / Georgia East (ftUS) + NAVD88 height (ftUS)',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::2239',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::6360',
            'bounding_box' => [[-83.47, 30.36], [-83.47, 34.68], [-80.77, 34.68], [-80.77, 30.36]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8729' => [
            'name' => 'NAD83 / Georgia West (ftUS) + NAVD88 height (ftUS)',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::2240',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::6360',
            'bounding_box' => [[-85.61, 30.62], [-85.61, 35.01], [-82.98999999999999, 35.01], [-82.98999999999999, 30.62]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8730' => [
            'name' => 'NAD83 / Idaho East (ftUS) + NAVD88 height (ftUS)',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::2241',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::6360',
            'bounding_box' => [[-113.24, 41.99], [-113.24, 44.75], [-111.04, 44.75], [-111.04, 41.99]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8731' => [
            'name' => 'NAD83 / Idaho Central (ftUS) + NAVD88 height (ftUS)',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::2242',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::6360',
            'bounding_box' => [[-115.3, 41.99], [-115.3, 45.7], [-112.68, 45.7], [-112.68, 41.99]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8732' => [
            'name' => 'NAD83 / Idaho West (ftUS) + NAVD88 height (ftUS)',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::2243',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::6360',
            'bounding_box' => [[-117.24, 41.99], [-117.24, 49.01], [-114.32, 49.01], [-114.32, 41.99]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8733' => [
            'name' => 'NAD83 / Illinois East (ftUS) + NAVD88 height (ftUS)',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::3435',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::6360',
            'bounding_box' => [[-89.28, 37.06], [-89.28, 42.5], [-87.02, 42.5], [-87.02, 37.06]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8734' => [
            'name' => 'NAD83 / Illinois West (ftUS) + NAVD88 height (ftUS)',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::3436',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::6360',
            'bounding_box' => [[-91.52, 36.98], [-91.52, 42.51], [-88.93000000000001, 42.51], [-88.93000000000001, 36.98]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8735' => [
            'name' => 'NAD83 / Indiana East (ftUS) + NAVD88 height (ftUS)',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::2965',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::6360',
            'bounding_box' => [[-86.59, 37.95], [-86.59, 41.77], [-84.78, 41.77], [-84.78, 37.95]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8736' => [
            'name' => 'NAD83 / Indiana West (ftUS) + NAVD88 height (ftUS)',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::2966',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::6360',
            'bounding_box' => [[-88.06, 37.77], [-88.06, 41.77], [-86.23999999999999, 41.77], [-86.23999999999999, 37.77]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8737' => [
            'name' => 'NAD83 / Iowa North (ftUS) + NAVD88 height (ftUS)',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::3417',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::6360',
            'bounding_box' => [[-96.65000000000001, 41.85], [-96.65000000000001, 43.51], [-90.15000000000001, 43.51], [-90.15000000000001, 41.85]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8738' => [
            'name' => 'NAD83 / Iowa South (ftUS) + NAVD88 height (ftUS)',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::3418',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::6360',
            'bounding_box' => [[-96.14, 40.37], [-96.14, 42.04], [-90.14, 42.04], [-90.14, 40.37]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8739' => [
            'name' => 'NAD83 / Kansas North (ftUS) + NAVD88 height (ftUS)',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::3419',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::6360',
            'bounding_box' => [[-102.06, 38.52], [-102.06, 40.01], [-94.58, 40.01], [-94.58, 38.52]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8740' => [
            'name' => 'NAD83 / Kansas South (ftUS) + NAVD88 height (ftUS)',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::3420',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::6360',
            'bounding_box' => [[-102.05, 36.99], [-102.05, 38.88], [-94.59999999999999, 38.88], [-94.59999999999999, 36.99]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8741' => [
            'name' => 'NAD83 / Kentucky North (ftUS) + NAVD88 height (ftUS)',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::2246',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::6360',
            'bounding_box' => [[-85.95999999999999, 37.71], [-85.95999999999999, 39.15], [-82.47, 39.15], [-82.47, 37.71]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8742' => [
            'name' => 'NAD83 / Kentucky South (ftUS) + NAVD88 height (ftUS)',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::2247',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::6360',
            'bounding_box' => [[-89.56999999999999, 36.49], [-89.56999999999999, 38.17], [-81.95, 38.17], [-81.95, 36.49]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8743' => [
            'name' => 'NAD83 / Louisiana North (ftUS) + NAVD88 height (ftUS)',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::3451',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::6360',
            'bounding_box' => [[-94.05, 30.85], [-94.05, 33.03], [-90.86, 33.03], [-90.86, 30.85]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8744' => [
            'name' => 'NAD83 / Louisiana South (ftUS) + NAVD88 height (ftUS)',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::3452',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::6360',
            'bounding_box' => [[-93.94, 28.85], [-93.94, 31.07], [-88.75, 31.07], [-88.75, 28.85]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8745' => [
            'name' => 'NAD83 / Maine East (ftUS) + NAVD88 height (ftUS)',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::26847',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::6360',
            'bounding_box' => [[-70.03, 43.88], [-70.03, 47.47], [-66.91, 47.47], [-66.91, 43.88]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8746' => [
            'name' => 'NAD83 / Maine West (ftUS) + NAVD88 height (ftUS)',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::26848',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::6360',
            'bounding_box' => [[-71.09, 43.04], [-71.09, 46.58], [-69.26000000000001, 46.58], [-69.26000000000001, 43.04]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8747' => [
            'name' => 'NAD83 / Maryland (ftUS) + NAVD88 height (ftUS)',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::2248',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::6360',
            'bounding_box' => [[-79.48999999999999, 37.97], [-79.48999999999999, 39.73], [-74.97, 39.73], [-74.97, 37.97]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8748' => [
            'name' => 'NAD83 / Massachusetts Mainland (ftUS) + NAVD88 height (ftUS)',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::2249',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::6360',
            'bounding_box' => [[-73.5, 41.46], [-73.5, 42.89], [-69.86, 42.89], [-69.86, 41.46]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8749' => [
            'name' => 'NAD83 / Massachusetts Island (ftUS) + NAVD88 height (ftUS)',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::2250',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::6360',
            'bounding_box' => [[-70.91, 41.19], [-70.91, 41.51], [-69.89, 41.51], [-69.89, 41.19]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8750' => [
            'name' => 'NAD83 / Minnesota North (ftUS) + NAVD88 height (ftUS)',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::26849',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::6360',
            'bounding_box' => [[-97.22, 46.64], [-97.22, 49.38], [-89.48999999999999, 49.38], [-89.48999999999999, 46.64]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8751' => [
            'name' => 'NAD83 / Minnesota Central (ftUS) + NAVD88 height (ftUS)',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::26850',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::6360',
            'bounding_box' => [[-96.86, 45.28], [-96.86, 47.48], [-92.29000000000001, 47.48], [-92.29000000000001, 45.28]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8752' => [
            'name' => 'NAD83 / Minnesota South (ftUS) + NAVD88 height (ftUS)',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::26851',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::6360',
            'bounding_box' => [[-96.84999999999999, 43.49], [-96.84999999999999, 45.59], [-91.20999999999999, 45.59], [-91.20999999999999, 43.49]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8753' => [
            'name' => 'NAD83 / Mississippi East (ftUS) + NAVD88 height (ftUS)',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::2254',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::6360',
            'bounding_box' => [[-89.97, 30.01], [-89.97, 35.01], [-88.09, 35.01], [-88.09, 30.01]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8754' => [
            'name' => 'NAD83 / Mississippi West (ftUS) + NAVD88 height (ftUS)',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::2255',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::6360',
            'bounding_box' => [[-91.65000000000001, 31.0], [-91.65000000000001, 35.01], [-89.37, 35.01], [-89.37, 31.0]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8755' => [
            'name' => 'NAD83 / Nebraska (ftUS) + NAVD88 height (ftUS)',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::26852',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::6360',
            'bounding_box' => [[-104.06, 39.99], [-104.06, 43.01], [-95.3, 43.01], [-95.3, 39.99]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8756' => [
            'name' => 'NAD83 / Nevada East (ftUS) + NAVD88 height (ftUS)',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::3421',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::6360',
            'bounding_box' => [[-117.01, 34.99], [-117.01, 42.0], [-114.03, 42.0], [-114.03, 34.99]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8757' => [
            'name' => 'NAD83 / Nevada Central (ftUS) + NAVD88 height (ftUS)',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::3422',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::6360',
            'bounding_box' => [[-118.19, 36.0], [-118.19, 41.0], [-114.99, 41.0], [-114.99, 36.0]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8758' => [
            'name' => 'NAD83 / Nevada West (ftUS) + NAVD88 height (ftUS)',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::3423',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::6360',
            'bounding_box' => [[-120.0, 36.95], [-120.0, 42.0], [-116.99, 42.0], [-116.99, 36.95]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8759' => [
            'name' => 'NAD83 / New Hampshire (ftUS) + NAVD88 height (ftUS)',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::3437',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::6360',
            'bounding_box' => [[-72.56, 42.69], [-72.56, 45.31], [-70.63, 45.31], [-70.63, 42.69]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8760' => [
            'name' => 'NAD83 / New Jersey (ftUS) + NAVD88 height (ftUS)',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::3424',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::6360',
            'bounding_box' => [[-75.59999999999999, 38.87], [-75.59999999999999, 41.36], [-73.88, 41.36], [-73.88, 38.87]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8761' => [
            'name' => 'NAD83 / New Mexico East (ftUS) + NAVD88 height (ftUS)',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::2257',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::6360',
            'bounding_box' => [[-105.72, 32.0], [-105.72, 37.0], [-102.99, 37.0], [-102.99, 32.0]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8762' => [
            'name' => 'NAD83 / New Mexico Central (ftUS) + NAVD88 height (ftUS)',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::2258',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::6360',
            'bounding_box' => [[-107.73, 31.78], [-107.73, 37.0], [-104.84, 37.0], [-104.84, 31.78]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8763' => [
            'name' => 'NAD83 / New Mexico West (ftUS) + NAVD88 height (ftUS)',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::2259',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::6360',
            'bounding_box' => [[-109.06, 31.33], [-109.06, 37.0], [-106.32, 37.0], [-106.32, 31.33]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8764' => [
            'name' => 'NAD83 / New York East (ftUS) + NAVD88 height (ftUS)',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::2260',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::6360',
            'bounding_box' => [[-75.87, 40.88], [-75.87, 45.02], [-73.23, 45.02], [-73.23, 40.88]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8765' => [
            'name' => 'NAD83 / New York Central (ftUS) + NAVD88 height (ftUS)',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::2261',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::6360',
            'bounding_box' => [[-77.75, 41.99], [-77.75, 44.41], [-75.04000000000001, 44.41], [-75.04000000000001, 41.99]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8766' => [
            'name' => 'NAD83 / New York West (ftUS) + NAVD88 height (ftUS)',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::2262',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::6360',
            'bounding_box' => [[-79.77, 41.99], [-79.77, 43.64], [-77.36, 43.64], [-77.36, 41.99]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8767' => [
            'name' => 'NAD83 / New York Long Island (ftUS) + NAVD88 height (ftUS)',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::2263',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::6360',
            'bounding_box' => [[-74.26000000000001, 40.47], [-74.26000000000001, 41.3], [-71.8, 41.3], [-71.8, 40.47]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8768' => [
            'name' => 'NAD83 / North Carolina (ftUS) + NAVD88 height (ftUS)',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::2264',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::6360',
            'bounding_box' => [[-84.33, 33.83], [-84.33, 36.59], [-75.38, 36.59], [-75.38, 33.83]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8769' => [
            'name' => 'NAD83 / Ohio North (ftUS) + NAVD88 height (ftUS)',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::3734',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::6360',
            'bounding_box' => [[-84.81, 40.1], [-84.81, 42.33], [-80.51000000000001, 42.33], [-80.51000000000001, 40.1]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8770' => [
            'name' => 'NAD83 / Ohio South (ftUS) + NAVD88 height (ftUS)',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::3735',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::6360',
            'bounding_box' => [[-84.83, 38.4], [-84.83, 40.36], [-80.7, 40.36], [-80.7, 38.4]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8771' => [
            'name' => 'NAD83 / Oklahoma North (ftUS) + NAVD88 height (ftUS)',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::2267',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::6360',
            'bounding_box' => [[-103.0, 35.27], [-103.0, 37.01], [-94.42, 37.01], [-94.42, 35.27]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8772' => [
            'name' => 'NAD83 / Oklahoma South (ftUS) + NAVD88 height (ftUS)',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::2268',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::6360',
            'bounding_box' => [[-100.0, 33.62], [-100.0, 35.57], [-94.42, 35.57], [-94.42, 33.62]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8773' => [
            'name' => 'NAD83 / Pennsylvania North (ftUS) + NAVD88 height (ftUS)',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::2271',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::6360',
            'bounding_box' => [[-80.53, 40.6], [-80.53, 42.53], [-74.7, 42.53], [-74.7, 40.6]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8774' => [
            'name' => 'NAD83 / Pennsylvania South (ftUS) + NAVD88 height (ftUS)',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::2272',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::6360',
            'bounding_box' => [[-80.53, 39.71], [-80.53, 41.18], [-74.72, 41.18], [-74.72, 39.71]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8775' => [
            'name' => 'NAD83 / Rhode Island (ftUS) + NAVD88 height (ftUS)',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::3438',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::6360',
            'bounding_box' => [[-71.84999999999999, 41.13], [-71.84999999999999, 42.02], [-71.08, 42.02], [-71.08, 41.13]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8776' => [
            'name' => 'NAD83 / South Dakota North (ftUS) + NAVD88 height (ftUS)',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::4457',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::6360',
            'bounding_box' => [[-104.07, 44.14], [-104.07, 45.95], [-96.45, 45.95], [-96.45, 44.14]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8777' => [
            'name' => 'NAD83 / South Dakota South (ftUS) + NAVD88 height (ftUS)',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::3455',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::6360',
            'bounding_box' => [[-104.06, 42.48], [-104.06, 44.79], [-96.43000000000001, 44.79], [-96.43000000000001, 42.48]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8778' => [
            'name' => 'NAD83 / Tennessee (ftUS) + NAVD88 height (ftUS)',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::2274',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::6360',
            'bounding_box' => [[-90.31, 34.98], [-90.31, 36.68], [-81.65000000000001, 36.68], [-81.65000000000001, 34.98]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8779' => [
            'name' => 'NAD83 / Texas North (ftUS) + NAVD88 height (ftUS)',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::2275',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::6360',
            'bounding_box' => [[-103.03, 34.3], [-103.03, 36.5], [-99.98999999999999, 36.5], [-99.98999999999999, 34.3]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8780' => [
            'name' => 'NAD83 / Texas North Central (ftUS) + NAVD88 height (ftUS)',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::2276',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::6360',
            'bounding_box' => [[-103.07, 31.72], [-103.07, 34.58], [-94.0, 34.58], [-94.0, 31.72]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8781' => [
            'name' => 'NAD83 / Texas Central (ftUS) + NAVD88 height (ftUS)',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::2277',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::6360',
            'bounding_box' => [[-106.66, 29.78], [-106.66, 32.27], [-93.5, 32.27], [-93.5, 29.78]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8782' => [
            'name' => 'NAD83 / Texas South Central (ftUS) + NAVD88 height (ftUS)',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::2278',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::6360',
            'bounding_box' => [[-105.0, 27.78], [-105.0, 30.67], [-93.76000000000001, 30.67], [-93.76000000000001, 27.78]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8783' => [
            'name' => 'NAD83 / Texas South (ftUS) + NAVD88 height (ftUS)',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::2279',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::6360',
            'bounding_box' => [[-100.2, 25.83], [-100.2, 28.21], [-96.84999999999999, 28.21], [-96.84999999999999, 25.83]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8784' => [
            'name' => 'NAD83 / Utah North (ftUS) + NAVD88 height (ftUS)',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::3560',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::6360',
            'bounding_box' => [[-114.04, 40.55], [-114.04, 42.01], [-109.04, 42.01], [-109.04, 40.55]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8785' => [
            'name' => 'NAD83 / Utah Central (ftUS) + NAVD88 height (ftUS)',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::3566',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::6360',
            'bounding_box' => [[-114.05, 38.49], [-114.05, 41.08], [-109.04, 41.08], [-109.04, 38.49]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8786' => [
            'name' => 'NAD83 / Utah South (ftUS) + NAVD88 height (ftUS)',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::3567',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::6360',
            'bounding_box' => [[-114.05, 36.99], [-114.05, 38.58], [-109.04, 38.58], [-109.04, 36.99]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8787' => [
            'name' => 'NAD83 / Vermont (ftUS) + NAVD88 height (ftUS)',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::5646',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::6360',
            'bounding_box' => [[-73.44, 42.72], [-73.44, 45.03], [-71.5, 45.03], [-71.5, 42.72]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8788' => [
            'name' => 'NAD83 / Virginia North (ftUS) + NAVD88 height (ftUS)',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::2283',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::6360',
            'bounding_box' => [[-80.06, 37.77], [-80.06, 39.46], [-76.51000000000001, 39.46], [-76.51000000000001, 37.77]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8789' => [
            'name' => 'NAD83 / Virginia South (ftUS) + NAVD88 height (ftUS)',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::2284',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::6360',
            'bounding_box' => [[-83.68000000000001, 36.54], [-83.68000000000001, 38.28], [-75.31, 38.28], [-75.31, 36.54]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8790' => [
            'name' => 'NAD83 / Washington North (ftUS) + NAVD88 height (ftUS)',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::2285',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::6360',
            'bounding_box' => [[-124.79, 47.08], [-124.79, 49.05], [-117.02, 49.05], [-117.02, 47.08]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8791' => [
            'name' => 'NAD83 / Washington South (ftUS) + NAVD88 height (ftUS)',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::2286',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::6360',
            'bounding_box' => [[-124.4, 45.54], [-124.4, 47.61], [-116.91, 47.61], [-116.91, 45.54]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8792' => [
            'name' => 'NAD83 / West Virginia North (ftUS) + NAVD88 height (ftUS)',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::26853',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::6360',
            'bounding_box' => [[-81.76000000000001, 38.76], [-81.76000000000001, 40.64], [-77.72, 40.64], [-77.72, 38.76]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8793' => [
            'name' => 'NAD83 / West Virginia South (ftUS) + NAVD88 height (ftUS)',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::26854',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::6360',
            'bounding_box' => [[-82.65000000000001, 37.2], [-82.65000000000001, 39.17], [-79.05, 39.17], [-79.05, 37.2]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8794' => [
            'name' => 'NAD83 / Wisconsin North (ftUS) + NAVD88 height (ftUS)',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::2287',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::6360',
            'bounding_box' => [[-92.89, 45.37], [-92.89, 47.31], [-88.05, 47.31], [-88.05, 45.37]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8795' => [
            'name' => 'NAD83 / Wisconsin Central (ftUS) + NAVD88 height (ftUS)',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::2288',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::6360',
            'bounding_box' => [[-92.89, 43.98], [-92.89, 45.8], [-86.25, 45.8], [-86.25, 43.98]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8796' => [
            'name' => 'NAD83 / Wisconsin South (ftUS) + NAVD88 height (ftUS)',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::2289',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::6360',
            'bounding_box' => [[-91.43000000000001, 42.48], [-91.43000000000001, 44.33], [-86.95, 44.33], [-86.95, 42.48]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8797' => [
            'name' => 'NAD83 / Wyoming East (ftUS) + NAVD88 height (ftUS)',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::3736',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::6360',
            'bounding_box' => [[-106.33, 40.99], [-106.33, 45.01], [-104.05, 45.01], [-104.05, 40.99]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8798' => [
            'name' => 'NAD83 / Wyoming East Central (ftUS) + NAVD88 height (ftUS)',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::3737',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::6360',
            'bounding_box' => [[-108.63, 40.99], [-108.63, 45.01], [-106.0, 45.01], [-106.0, 40.99]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8799' => [
            'name' => 'NAD83 / Wyoming West Central (ftUS) + NAVD88 height (ftUS)',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::3738',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::6360',
            'bounding_box' => [[-111.06, 40.99], [-111.06, 45.01], [-107.5, 45.01], [-107.5, 40.99]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8800' => [
            'name' => 'NAD83 / Wyoming West (ftUS) + NAVD88 height (ftUS)',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::3739',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::6360',
            'bounding_box' => [[-111.06, 40.99], [-111.06, 44.67], [-109.04, 44.67], [-109.04, 40.99]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8801' => [
            'name' => 'NAD83 / Alabama East + NAVD88 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::26929',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5703',
            'bounding_box' => [[-86.79000000000001, 30.99], [-86.79000000000001, 35.0], [-84.89, 35.0], [-84.89, 30.99]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8802' => [
            'name' => 'NAD83 / Alabama West + NAVD88 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::26930',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5703',
            'bounding_box' => [[-88.48, 30.14], [-88.48, 35.02], [-86.3, 35.02], [-86.3, 30.14]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8803' => [
            'name' => 'NAD83 / Alaska zone 1 + NAVD88 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::26931',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5703',
            'bounding_box' => [[-141.0, 54.61], [-141.0, 60.35], [-129.99, 60.35], [-129.99, 54.61]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8804' => [
            'name' => 'NAD83 / Alaska zone 2 + NAVD88 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::26932',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5703',
            'bounding_box' => [[-144.01, 59.72], [-144.01, 70.16], [-140.98, 70.16], [-140.98, 59.72]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8805' => [
            'name' => 'NAD83 / Alaska zone 3 + NAVD88 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::26933',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5703',
            'bounding_box' => [[-148.0, 59.72], [-148.0, 70.38], [-144.0, 70.38], [-144.0, 59.72]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8806' => [
            'name' => 'NAD83 / Alaska zone 4 + NAVD88 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::26934',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5703',
            'bounding_box' => [[-152.01, 59.11], [-152.01, 70.63], [-147.99, 70.63], [-147.99, 59.11]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8807' => [
            'name' => 'NAD83 / Alaska zone 5 + NAVD88 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::26935',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5703',
            'bounding_box' => [[-156.0, 55.72], [-156.0, 71.28], [-151.86, 71.28], [-151.86, 55.72]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8808' => [
            'name' => 'NAD83 / Alaska zone 6 + NAVD88 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::26936',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5703',
            'bounding_box' => [[-160.0, 54.89], [-160.0, 71.40000000000001], [-155.99, 71.40000000000001], [-155.99, 54.89]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8809' => [
            'name' => 'NAD83 / Alaska zone 7 + NAVD88 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::26937',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5703',
            'bounding_box' => [[-164.01, 54.32], [-164.01, 70.73999999999999], [-160.0, 70.73999999999999], [-160.0, 54.32]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8810' => [
            'name' => 'NAD83 / Alaska zone 8 + NAVD88 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::26938',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5703',
            'bounding_box' => [[-168.26, 54.34], [-168.26, 69.05], [-164.0, 69.05], [-164.0, 54.34]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8811' => [
            'name' => 'NAD83 / Alaska zone 9 + NAVD88 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::26939',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5703',
            'bounding_box' => [[-173.16, 56.49], [-173.16, 65.81999999999999], [-168.0, 65.81999999999999], [-168.0, 56.49]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8812' => [
            'name' => 'NAD83 / Alaska zone 10 + NAVD88 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::26940',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5703',
            'bounding_box' => [[172.42, 51.3], [172.42, 54.34], [-164.84, 54.34], [-164.84, 51.3]],
            'bounding_box_crosses_antimeridian' => true,
        ],
        'urn:ogc:def:crs:EPSG::8813' => [
            'name' => 'NAD83 / Missouri East + NAVD88 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::26996',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5703',
            'bounding_box' => [[-91.97, 35.98], [-91.97, 40.61], [-89.09999999999999, 40.61], [-89.09999999999999, 35.98]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8814' => [
            'name' => 'NAD83 / Missouri Central + NAVD88 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::26997',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5703',
            'bounding_box' => [[-93.79000000000001, 36.48], [-93.79000000000001, 40.61], [-91.41, 40.61], [-91.41, 36.48]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8815' => [
            'name' => 'NAD83 / Missouri West + NAVD88 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::26998',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5703',
            'bounding_box' => [[-95.77, 36.48], [-95.77, 40.59], [-93.48, 40.59], [-93.48, 36.48]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8912' => [
            'name' => 'CR-SIRGAS / CRTM05 + DACR52 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::8908',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::8911',
            'bounding_box' => [[-85.97, 7.98], [-85.97, 11.22], [-82.53, 11.22], [-82.53, 7.98]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9286' => [
            'name' => 'ETRS89 + NAP height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::4258',
            'horizontal_crs_type' => 'geographic 2D',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5709',
            'bounding_box' => [[2.53, 50.75], [2.53, 55.77], [7.22, 55.77], [7.22, 50.75]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9289' => [
            'name' => 'ETRS89 + LAT NL depth',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::4258',
            'horizontal_crs_type' => 'geographic 2D',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::9287',
            'bounding_box' => [[2.53, 51.45], [2.53, 55.77], [6.41, 55.77], [6.41, 51.45]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9290' => [
            'name' => 'ETRS89 + MSL NL depth',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::4258',
            'horizontal_crs_type' => 'geographic 2D',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::9288',
            'bounding_box' => [[2.53, 51.45], [2.53, 55.77], [6.41, 55.77], [6.41, 51.45]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9306' => [
            'name' => 'HS2 Survey Grid + HS2-VRF height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::9300',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::9303',
            'bounding_box' => [[-2.75, 51.45], [-2.75, 53.3], [0.0, 53.3], [0.0, 51.45]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9368' => [
            'name' => 'TPEN11 Grid + ODN height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::9367',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5701',
            'bounding_box' => [[-3.14, 53.32], [-3.14, 53.9], [-1.34, 53.9], [-1.34, 53.32]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9374' => [
            'name' => 'MML07 Grid + ODN height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::9373',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5701',
            'bounding_box' => [[-1.89, 51.46], [-1.89, 53.42], [0.16, 53.42], [0.16, 51.46]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9388' => [
            'name' => 'AbInvA96_2020 Grid + ODN height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::9387',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5701',
            'bounding_box' => [[-4.31, 57.1], [-4.31, 57.71], [-2.1, 57.71], [-2.1, 57.1]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9422' => [
            'name' => 'ETRS89 + EVRF2019 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::4258',
            'horizontal_crs_type' => 'geographic 2D',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::9389',
            'bounding_box' => [[-9.56, 35.95], [-9.56, 71.20999999999999], [31.59, 71.20999999999999], [31.59, 35.95]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9423' => [
            'name' => 'ETRS89 + EVRF2019 mean-tide height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::4258',
            'horizontal_crs_type' => 'geographic 2D',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::9390',
            'bounding_box' => [[-9.56, 35.95], [-9.56, 71.20999999999999], [31.59, 71.20999999999999], [31.59, 35.95]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9424' => [
            'name' => 'ETRS89 + ODN height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::4258',
            'horizontal_crs_type' => 'geographic 2D',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5701',
            'bounding_box' => [[-7.06, 49.93], [-7.06, 58.71], [1.8, 58.71], [1.8, 49.93]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9425' => [
            'name' => 'ETRS89 + ODN (Offshore) height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::4258',
            'horizontal_crs_type' => 'geographic 2D',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::7707',
            'bounding_box' => [[-9.0, 49.75], [-9.0, 61.01], [2.01, 61.01], [2.01, 49.75]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9426' => [
            'name' => 'ETRS89 + ODN Orkney height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::4258',
            'horizontal_crs_type' => 'geographic 2D',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5740',
            'bounding_box' => [[-3.48, 58.72], [-3.48, 59.41], [-2.34, 59.41], [-2.34, 58.72]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9427' => [
            'name' => 'ETRS89 + Lerwick height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::4258',
            'horizontal_crs_type' => 'geographic 2D',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5742',
            'bounding_box' => [[-1.78, 59.83], [-1.78, 60.87], [-0.67, 60.87], [-0.67, 59.83]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9428' => [
            'name' => 'ETRS89 + Stornoway height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::4258',
            'horizontal_crs_type' => 'geographic 2D',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5746',
            'bounding_box' => [[-7.72, 56.76], [-7.72, 58.54], [-6.1, 58.54], [-6.1, 56.76]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9429' => [
            'name' => 'ETRS89 + Douglas height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::4258',
            'horizontal_crs_type' => 'geographic 2D',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5750',
            'bounding_box' => [[-4.87, 54.02], [-4.87, 54.44], [-4.27, 54.44], [-4.27, 54.02]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9430' => [
            'name' => 'ETRS89 + St. Marys height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::4258',
            'horizontal_crs_type' => 'geographic 2D',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5749',
            'bounding_box' => [[-6.41, 49.86], [-6.41, 49.99], [-6.23, 49.99], [-6.23, 49.86]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9449' => [
            'name' => 'ETRS89 + Malin Head height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::4258',
            'horizontal_crs_type' => 'geographic 2D',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5731',
            'bounding_box' => [[-10.56, 51.39], [-10.56, 55.43], [-5.34, 55.43], [-5.34, 51.39]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9450' => [
            'name' => 'ETRS89 + Belfast height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::4258',
            'horizontal_crs_type' => 'geographic 2D',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5732',
            'bounding_box' => [[-8.18, 53.96], [-8.18, 55.36], [-5.34, 55.36], [-5.34, 53.96]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9452' => [
            'name' => 'ETRS89 + BI height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::4258',
            'horizontal_crs_type' => 'geographic 2D',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::9451',
            'bounding_box' => [[-9.0, 49.75], [-9.0, 61.01], [2.01, 61.01], [2.01, 49.75]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9457' => [
            'name' => 'GBK19 Grid + ODN height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::9456',
            'horizontal_crs_type' => 'projected',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5701',
            'bounding_box' => [[-4.65, 55.55], [-4.65, 55.95], [-4.05, 55.95], [-4.05, 55.55]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9462' => [
            'name' => 'GDA2020 + AVWS height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::7844',
            'horizontal_crs_type' => 'geographic 2D',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::9458',
            'bounding_box' => [[93.41, -60.56], [93.41, -8.470000000000001], [173.35, -8.470000000000001], [173.35, -60.56]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9463' => [
            'name' => 'GDA2020 + AHD height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::7844',
            'horizontal_crs_type' => 'geographic 2D',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5711',
            'bounding_box' => [[96.76000000000001, -43.7], [96.76000000000001, -9.859999999999999], [153.69, -9.859999999999999], [153.69, -43.7]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9464' => [
            'name' => 'GDA94 + AHD height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::4283',
            'horizontal_crs_type' => 'geographic 2D',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5711',
            'bounding_box' => [[96.76000000000001, -43.7], [96.76000000000001, -9.859999999999999], [153.69, -9.859999999999999], [153.69, -43.7]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9500' => [
            'name' => 'ETRS89 + EVRF2000 Austria height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::4258',
            'horizontal_crs_type' => 'geographic 2D',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::9274',
            'bounding_box' => [[9.529999999999999, 46.4], [9.529999999999999, 49.02], [17.17, 49.02], [17.17, 46.4]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9501' => [
            'name' => 'MGI + EVRF2000 Austria height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::4312',
            'horizontal_crs_type' => 'geographic 2D',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::9274',
            'bounding_box' => [[9.529999999999999, 46.4], [9.529999999999999, 49.02], [17.17, 49.02], [17.17, 46.4]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9502' => [
            'name' => 'CIGD11 + CBVD61 height (ft)',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::6135',
            'horizontal_crs_type' => 'geographic 2D',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::6132',
            'bounding_box' => [[-79.92, 19.66], [-79.92, 19.78], [-79.69, 19.78], [-79.69, 19.66]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9503' => [
            'name' => 'CIGD11 + GCVD54 height (ft)',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::6135',
            'horizontal_crs_type' => 'geographic 2D',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::6130',
            'bounding_box' => [[-81.45999999999999, 19.21], [-81.45999999999999, 19.41], [-81.04000000000001, 19.41], [-81.04000000000001, 19.21]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9504' => [
            'name' => 'CIGD11 + LCVD61 height (ft)',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::6135',
            'horizontal_crs_type' => 'geographic 2D',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::6131',
            'bounding_box' => [[-80.14, 19.63], [-80.14, 19.74], [-79.93000000000001, 19.74], [-79.93000000000001, 19.63]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9505' => [
            'name' => 'ETRS89 + Alicante height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::4258',
            'horizontal_crs_type' => 'geographic 2D',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5782',
            'bounding_box' => [[-9.369999999999999, 35.95], [-9.369999999999999, 43.82], [3.39, 43.82], [3.39, 35.95]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9506' => [
            'name' => 'ETRS89 + Ceuta 2 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::4258',
            'horizontal_crs_type' => 'geographic 2D',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::9402',
            'bounding_box' => [[-5.4, 35.82], [-5.4, 35.97], [-5.24, 35.97], [-5.24, 35.82]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9507' => [
            'name' => 'ETRS89 + Ibiza height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::4258',
            'horizontal_crs_type' => 'geographic 2D',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::9394',
            'bounding_box' => [[1.12, 38.59], [1.12, 39.17], [1.68, 39.17], [1.68, 38.59]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9508' => [
            'name' => 'ETRS89 + Mallorca height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::4258',
            'horizontal_crs_type' => 'geographic 2D',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::9392',
            'bounding_box' => [[2.23, 39.07], [2.23, 40.02], [3.55, 40.02], [3.55, 39.07]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9509' => [
            'name' => 'ETRS89 + Menorca height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::4258',
            'horizontal_crs_type' => 'geographic 2D',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::9393',
            'bounding_box' => [[3.73, 39.75], [3.73, 40.15], [4.39, 40.15], [4.39, 39.75]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9510' => [
            'name' => 'REGCAN95 + El Hierro height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::4081',
            'horizontal_crs_type' => 'geographic 2D',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::9401',
            'bounding_box' => [[-18.22, 27.58], [-18.22, 27.9], [-17.83, 27.9], [-17.83, 27.58]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9511' => [
            'name' => 'REGCAN95 + Fuerteventura height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::4081',
            'horizontal_crs_type' => 'geographic 2D',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::9396',
            'bounding_box' => [[-14.58, 27.99], [-14.58, 28.81], [-13.75, 28.81], [-13.75, 27.99]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9512' => [
            'name' => 'REGCAN95 + Gran Canaria height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::4081',
            'horizontal_crs_type' => 'geographic 2D',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::9397',
            'bounding_box' => [[-15.88, 27.68], [-15.88, 28.23], [-15.31, 28.23], [-15.31, 27.68]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9513' => [
            'name' => 'REGCAN95 + La Gomera height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::4081',
            'horizontal_crs_type' => 'geographic 2D',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::9399',
            'bounding_box' => [[-17.39, 27.95], [-17.39, 28.26], [-17.03, 28.26], [-17.03, 27.95]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9514' => [
            'name' => 'REGCAN95 + La Palma height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::4081',
            'horizontal_crs_type' => 'geographic 2D',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::9400',
            'bounding_box' => [[-18.06, 28.4], [-18.06, 28.9], [-17.66, 28.9], [-17.66, 28.4]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9515' => [
            'name' => 'REGCAN95 + Lanzarote height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::4081',
            'horizontal_crs_type' => 'geographic 2D',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::9395',
            'bounding_box' => [[-13.95, 28.78], [-13.95, 29.47], [-13.37, 29.47], [-13.37, 28.78]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9516' => [
            'name' => 'REGCAN95 + Tenerife height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::4081',
            'horizontal_crs_type' => 'geographic 2D',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::9398',
            'bounding_box' => [[-16.96, 27.93], [-16.96, 28.63], [-16.08, 28.63], [-16.08, 27.93]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9517' => [
            'name' => 'SHGD2015 + SHVD2015 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::7886',
            'horizontal_crs_type' => 'geographic 2D',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::7890',
            'bounding_box' => [[-5.85, -16.08], [-5.85, -15.85], [-5.58, -15.85], [-5.58, -16.08]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9518' => [
            'name' => 'WGS 84 + EGM2008 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::4326',
            'horizontal_crs_type' => 'geographic 2D',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::3855',
            'bounding_box' => [[-180.0, -90.0], [-180.0, 90.0], [180.0, 90.0], [180.0, -90.0]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9519' => [
            'name' => 'FEH2010 + FCSVR10 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::5593',
            'horizontal_crs_type' => 'geographic 2D',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5597',
            'bounding_box' => [[11.17, 54.42], [11.17, 54.76], [11.51, 54.76], [11.51, 54.42]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9520' => [
            'name' => 'KSA-GRF17 + KSA-VRF14 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::9333',
            'horizontal_crs_type' => 'geographic 2D',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::9335',
            'bounding_box' => [[34.51, 16.37], [34.51, 32.16], [55.67, 32.16], [55.67, 16.37]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9521' => [
            'name' => 'POSGAR 2007 + SRVN16 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::5340',
            'horizontal_crs_type' => 'geographic 2D',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::9255',
            'bounding_box' => [[-73.59, -55.11], [-73.59, -21.78], [-53.65, -21.78], [-53.65, -55.11]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9522' => [
            'name' => 'NAD83(2011) + PRVD02 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::6318',
            'horizontal_crs_type' => 'geographic 2D',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::6641',
            'bounding_box' => [[-67.97, 17.87], [-67.97, 18.57], [-65.19, 18.57], [-65.19, 17.87]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9523' => [
            'name' => 'NAD83(2011) + VIVD09 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::6318',
            'horizontal_crs_type' => 'geographic 2D',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::6642',
            'bounding_box' => [[-65.09, 17.62], [-65.09, 18.44], [-64.51000000000001, 18.44], [-64.51000000000001, 17.62]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9524' => [
            'name' => 'NAD83(MA11) + GUVD04 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::6325',
            'horizontal_crs_type' => 'geographic 2D',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::6644',
            'bounding_box' => [[144.58, 13.18], [144.58, 13.7], [145.01, 13.7], [145.01, 13.18]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9525' => [
            'name' => 'NAD83(MA11) + NMVD03 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::6325',
            'horizontal_crs_type' => 'geographic 2D',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::6640',
            'bounding_box' => [[144.83, 14.06], [144.83, 20.61], [146.12, 20.61], [146.12, 14.06]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9526' => [
            'name' => 'NAD83(PA11) + ASVD02 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::6322',
            'horizontal_crs_type' => 'geographic 2D',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::6643',
            'bounding_box' => [[-170.88, -14.43], [-170.88, -14.2], [-170.51, -14.2], [-170.51, -14.43]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9527' => [
            'name' => 'NZGD2000 + NZVD2009 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::4167',
            'horizontal_crs_type' => 'geographic 2D',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::4440',
            'bounding_box' => [[160.6, -55.95], [160.6, -25.88], [-171.2, -25.88], [-171.2, -55.95]],
            'bounding_box_crosses_antimeridian' => true,
        ],
        'urn:ogc:def:crs:EPSG::9528' => [
            'name' => 'NZGD2000 + NZVD2016 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::4167',
            'horizontal_crs_type' => 'geographic 2D',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::7839',
            'bounding_box' => [[160.6, -55.95], [160.6, -25.88], [-171.2, -25.88], [-171.2, -55.95]],
            'bounding_box_crosses_antimeridian' => true,
        ],
        'urn:ogc:def:crs:EPSG::9529' => [
            'name' => 'SRGI2013 + INAGeoid2020 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::9470',
            'horizontal_crs_type' => 'geographic 2D',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::9471',
            'bounding_box' => [[92.01000000000001, -13.95], [92.01000000000001, 7.79], [141.46, 7.79], [141.46, -13.95]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9530' => [
            'name' => 'RGFG95 + NGG1977 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::4624',
            'horizontal_crs_type' => 'geographic 2D',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5755',
            'bounding_box' => [[-54.61, 2.11], [-54.61, 5.81], [-51.61, 5.81], [-51.61, 2.11]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9531' => [
            'name' => 'RGAF09 + Guadeloupe 1988 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::5489',
            'horizontal_crs_type' => 'geographic 2D',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5757',
            'bounding_box' => [[-61.85, 15.88], [-61.85, 16.55], [-61.15, 16.55], [-61.15, 15.88]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9532' => [
            'name' => 'RGAF09 + IGN 1988 LS height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::5489',
            'horizontal_crs_type' => 'geographic 2D',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5616',
            'bounding_box' => [[-61.68, 15.8], [-61.68, 15.94], [-61.52, 15.94], [-61.52, 15.8]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9533' => [
            'name' => 'RGAF09 + IGN 1988 MG height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::5489',
            'horizontal_crs_type' => 'geographic 2D',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5617',
            'bounding_box' => [[-61.39, 15.8], [-61.39, 16.05], [-61.13, 16.05], [-61.13, 15.8]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9534' => [
            'name' => 'RGAF09 + IGN 1988 SB height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::5489',
            'horizontal_crs_type' => 'geographic 2D',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5619',
            'bounding_box' => [[-62.92, 17.82], [-62.92, 17.98], [-62.73, 17.98], [-62.73, 17.82]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9535' => [
            'name' => 'RGAF09 + IGN 1988 SM height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::5489',
            'horizontal_crs_type' => 'geographic 2D',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5620',
            'bounding_box' => [[-63.21, 18.01], [-63.21, 18.17], [-62.96, 18.17], [-62.96, 18.01]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9536' => [
            'name' => 'RGAF09 + IGN 2008 LD height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::5489',
            'horizontal_crs_type' => 'geographic 2D',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::9130',
            'bounding_box' => [[-61.13, 16.26], [-61.13, 16.38], [-60.97, 16.38], [-60.97, 16.26]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9537' => [
            'name' => 'RGAF09 + Martinique 1987 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::5489',
            'horizontal_crs_type' => 'geographic 2D',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5756',
            'bounding_box' => [[-61.29, 14.35], [-61.29, 14.93], [-60.76, 14.93], [-60.76, 14.35]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9538' => [
            'name' => 'RGF93 + NGF-IGN69 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::4171',
            'horizontal_crs_type' => 'geographic 2D',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5720',
            'bounding_box' => [[-4.87, 42.33], [-4.87, 51.14], [8.23, 51.14], [8.23, 42.33]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9539' => [
            'name' => 'RGF93 + NGF-IGN78 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::4171',
            'horizontal_crs_type' => 'geographic 2D',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5721',
            'bounding_box' => [[8.5, 41.31], [8.5, 43.07], [9.630000000000001, 43.07], [9.630000000000001, 41.31]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9540' => [
            'name' => 'RGNC91-93 + NGNC08 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::4749',
            'horizontal_crs_type' => 'geographic 2D',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::9351',
            'bounding_box' => [[163.54, -22.73], [163.54, -19.5], [168.19, -19.5], [168.19, -22.73]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9541' => [
            'name' => 'RGSPM06 + Danger 1950 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::4463',
            'horizontal_crs_type' => 'geographic 2D',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5792',
            'bounding_box' => [[-56.48, 46.69], [-56.48, 47.19], [-56.07, 47.19], [-56.07, 46.69]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9542' => [
            'name' => 'RRAF 1991 + IGN 2008 LD height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::4558',
            'horizontal_crs_type' => 'geographic 2D',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::9130',
            'bounding_box' => [[-61.13, 16.26], [-61.13, 16.38], [-60.97, 16.38], [-60.97, 16.26]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9543' => [
            'name' => 'ITRF2005 + SA LLD height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::8998',
            'horizontal_crs_type' => 'geographic 2D',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::9279',
            'bounding_box' => [[16.45, -34.88], [16.45, -22.13], [32.95, -22.13], [32.95, -34.88]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9544' => [
            'name' => 'NAD83(CSRS)v6 + CGVD2013(CGG2013a) height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::8252',
            'horizontal_crs_type' => 'geographic 2D',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::9245',
            'bounding_box' => [[-141.01, 40.04], [-141.01, 86.45999999999999], [-47.74, 86.45999999999999], [-47.74, 40.04]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9705' => [
            'name' => 'WGS 84 + MSL height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::4326',
            'horizontal_crs_type' => 'geographic 2D',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5714',
            'bounding_box' => [[-180.0, -90.0], [-180.0, 90.0], [180.0, 90.0], [180.0, -90.0]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9707' => [
            'name' => 'WGS 84 + EGM96 height',
            'horizontal_crs' => 'urn:ogc:def:crs:EPSG::4326',
            'horizontal_crs_type' => 'geographic 2D',
            'vertical_crs' => 'urn:ogc:def:crs:EPSG::5773',
            'bounding_box' => [[-180.0, -90.0], [-180.0, 90.0], [180.0, 90.0], [180.0, -90.0]],
            'bounding_box_crosses_antimeridian' => false,
        ],
    ];

    private static $cachedObjects = [];

    private static $supportedCache = [];

    /**
     * @var Geocentric|Geographic|Projected
     */
    private $horizontal;

    private $vertical;

    /**
     * Compound constructor.
     * @param Geocentric|Geographic|Projected $horizontal
     */
    public function __construct(
        string $srid,
        CoordinateReferenceSystem $horizontal,
        Vertical $vertical,
        GeographicPolygon $boundingBox
    ) {
        $this->srid = $srid;
        $this->horizontal = $horizontal;
        $this->vertical = $vertical;
        $this->boundingBox = $boundingBox;
    }

    public function getSRID(): string
    {
        return $this->srid;
    }

    public function getHorizontal(): CoordinateReferenceSystem
    {
        return $this->horizontal;
    }

    public function getVertical(): Vertical
    {
        return $this->vertical;
    }

    public static function fromSRID(string $srid): self
    {
        if (!isset(static::$sridData[$srid])) {
            throw new UnknownCoordinateReferenceSystemException($srid);
        }

        if (!isset(self::$cachedObjects[$srid])) {
            $data = static::$sridData[$srid];

            if (isset(Projected::getSupportedSRIDs()[$data['horizontal_crs']])) {
                $horizontalCRS = Projected::fromSRID($data['horizontal_crs']);
            } else {
                $horizontalCRS = Geographic::fromSRID($data['horizontal_crs']);
            }

            self::$cachedObjects[$srid] = new self(
                $srid,
                $horizontalCRS,
                Vertical::fromSRID($data['vertical_crs']),
                GeographicPolygon::createFromArray($data['bounding_box'], $data['bounding_box_crosses_antimeridian']),
            );
        }

        return self::$cachedObjects[$srid];
    }

    public static function getSupportedSRIDs(): array
    {
        if (!self::$supportedCache) {
            foreach (static::$sridData as $srid => $data) {
                self::$supportedCache[$srid] = $data['name'];
            }
        }

        return self::$supportedCache;
    }
}
