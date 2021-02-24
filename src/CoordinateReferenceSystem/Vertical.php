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
use PHPCoord\CoordinateSystem\Vertical as VerticalCS;
use PHPCoord\Datum\Datum;
use PHPCoord\Exception\UnknownCoordinateReferenceSystemException;
use PHPCoord\Geometry\GeographicPolygon;

class Vertical extends CoordinateReferenceSystem
{
    /**
     * AHD (Tasmania) height
     * Extent: Australia - Tasmania mainland - onshore.
     */
    public const EPSG_AHD_TASMANIA_HEIGHT = 'urn:ogc:def:crs:EPSG::5712';

    /**
     * AHD height
     * Extent: Australia - Australian Capital Territory, New South Wales, Northern Territory, Queensland, South
     * Australia, Tasmania, Western Australia and Victoria - onshore. Christmas Island - onshore. Cocos and Keeling
     * Islands - onshore.
     * Appropriate for cadastral and local engineering survey including construction or mining. Only suitable onshore.
     * AVWS height (CRS code 9458) is more accurate than AHD height for applications over distances greater than 10 km
     * and also extends offshore.
     */
    public const EPSG_AHD_HEIGHT = 'urn:ogc:def:crs:EPSG::5711';

    /**
     * AIOC95 depth
     * Extent: Azerbaijan - Caspian offshore and onshore Sangachal terminal.
     * Also used by AIOC and BP as a height system for engineering survey at Sangachal terminal (see CRS code 5797).
     * AIOC95 datum is 1.7m above Caspian datum and 26.3m below Baltic datum.
     */
    public const EPSG_AIOC95_DEPTH = 'urn:ogc:def:crs:EPSG::5734';

    /**
     * AIOC95 height
     * Extent: Azerbaijan - Caspian offshore and onshore Sangachal terminal.
     * AIOC95 datum is 1.7m above Caspian datum and 26.3m below Baltic datum. Also used by AIOC and BP as the depth
     * system for all offshore Azerbaijan activities (see CRS code 5734).
     */
    public const EPSG_AIOC95_HEIGHT = 'urn:ogc:def:crs:EPSG::5797';

    /**
     * ASVD02 height
     * Extent: American Samoa - Tutuila island.
     * Replaces Tutuila 1962 height (CRS code 6638). Replaced by Pago Pago 2020 height after ASVD02 benchmarks
     * destroyed by earthquake activity.
     */
    public const EPSG_ASVD02_HEIGHT = 'urn:ogc:def:crs:EPSG::6643';

    /**
     * AVWS height
     * Extent: Australia including Lord Howe Island, Macquarie Islands, Ashmore and Cartier Islands, Christmas Island,
     * Cocos (Keeling) Islands, Norfolk Island. All onshore and offshore.
     * For cadastral and local engineering applications see AHD height (CRS code 5711). AVWS is more accurate than AHD
     * for applications over distances greater than 10 km.
     */
    public const EPSG_AVWS_HEIGHT = 'urn:ogc:def:crs:EPSG::9458';

    /**
     * Alicante height
     * Extent: Gibraltar - onshore; Spain - mainland onshore.
     */
    public const EPSG_ALICANTE_HEIGHT = 'urn:ogc:def:crs:EPSG::5782';

    /**
     * Antalya height
     * Extent: Turkey - onshore.
     */
    public const EPSG_ANTALYA_HEIGHT = 'urn:ogc:def:crs:EPSG::5775';

    /**
     * Auckland 1946 height
     * Extent: New Zealand - North Island - Auckland vertical CRS area.
     */
    public const EPSG_AUCKLAND_1946_HEIGHT = 'urn:ogc:def:crs:EPSG::5759';

    /**
     * BGS2005 height
     * Extent: Bulgaria - onshore.
     * Adopted 2010-07-29 as official Bulgarian reference datum through decree 153, replacing Baltic 1982 system (CRS
     * code 5786).
     */
    public const EPSG_BGS2005_HEIGHT = 'urn:ogc:def:crs:EPSG::9669';

    /**
     * BI height
     * Extent: United Kingdom (UK) - offshore to boundary of UKCS within 49°45'N to 61°N and 9°W to 2°E; onshore
     * Great Britain (England, Wales and Scotland) and Northern Ireland. Ireland onshore. Isle of Man onshore.
     */
    public const EPSG_BI_HEIGHT = 'urn:ogc:def:crs:EPSG::9451';

    /**
     * Baltic 1957 depth
     * Extent: Czechia; Slovakia.
     */
    public const EPSG_BALTIC_1957_DEPTH = 'urn:ogc:def:crs:EPSG::8358';

    /**
     * Baltic 1957 height
     * Extent: Czechia; Slovakia.
     */
    public const EPSG_BALTIC_1957_HEIGHT = 'urn:ogc:def:crs:EPSG::8357';

    /**
     * Baltic 1977 depth
     * Extent: Armenia; Azerbaijan; Belarus; Estonia - onshore; Georgia - onshore; Kazakhstan; Kyrgyzstan; Latvia -
     * onshore; Lithuania - onshore; Moldova; Russian Federation - onshore; Tajikistan; Turkmenistan; Ukraine -
     * onshore; Uzbekistan.
     */
    public const EPSG_BALTIC_1977_DEPTH = 'urn:ogc:def:crs:EPSG::5612';

    /**
     * Baltic 1977 height
     * Extent: Armenia; Azerbaijan; Belarus; Estonia - onshore; Georgia - onshore; Kazakhstan; Kyrgyzstan; Latvia -
     * onshore; Lithuania - onshore; Moldova; Russian Federation - onshore; Tajikistan; Turkmenistan; Ukraine -
     * onshore; Uzbekistan.
     * The adjustment also included the Czech and Slovak Republics but not adopted there, with earlier 1957 adjustment
     * remaining in use: see CRS code 8357.
     */
    public const EPSG_BALTIC_1977_HEIGHT = 'urn:ogc:def:crs:EPSG::5705';

    /**
     * Baltic 1982 height
     * Extent: Bulgaria - onshore.
     */
    public const EPSG_BALTIC_1982_HEIGHT = 'urn:ogc:def:crs:EPSG::5786';

    /**
     * Bandar Abbas height
     * Extent: Iran - onshore.
     * Replaces Fao height (CRS code 5751) for national map agency work in Iran. At time of record creation NIOC data
     * still generally referenced to Fao.
     */
    public const EPSG_BANDAR_ABBAS_HEIGHT = 'urn:ogc:def:crs:EPSG::5752';

    /**
     * Belfast height
     * Extent: United Kingdom (UK) - Northern Ireland (Ulster) - onshore.
     * Malin Head height (CRS code 5731) used for medium and small scale topographic mapping.
     */
    public const EPSG_BELFAST_HEIGHT = 'urn:ogc:def:crs:EPSG::5732';

    /**
     * Black Sea depth
     * Extent: Georgia - onshore.
     * Black Sea datum is 0.4m below Baltic datum.
     */
    public const EPSG_BLACK_SEA_DEPTH = 'urn:ogc:def:crs:EPSG::5336';

    /**
     * Black Sea height
     * Extent: Georgia - onshore.
     * Black Sea datum is 0.4m below Baltic datum.
     */
    public const EPSG_BLACK_SEA_HEIGHT = 'urn:ogc:def:crs:EPSG::5735';

    /**
     * Bluff 1955 height
     * Extent: New Zealand - South Island - Bluff vertical CRS area.
     */
    public const EPSG_BLUFF_1955_HEIGHT = 'urn:ogc:def:crs:EPSG::5760';

    /**
     * Bora Bora SAU 2001 height
     * Extent: French Polynesia - Society Islands - Bora Bora.
     * Part of NGPF (CRS code 5600).
     */
    public const EPSG_BORA_BORA_SAU_2001_HEIGHT = 'urn:ogc:def:crs:EPSG::5607';

    /**
     * CBVD61 height (ft)
     * Extent: Cayman Islands - Cayman Brac.
     */
    public const EPSG_CBVD61_HEIGHT_FT = 'urn:ogc:def:crs:EPSG::6132';

    /**
     * CD Norway depth
     * Extent: Norway (offshore) and Svalbard and Jan Mayen (offshore).
     */
    public const EPSG_CD_NORWAY_DEPTH = 'urn:ogc:def:crs:EPSG::9672';

    /**
     * CGVD2013(CGG2013) height
     * Extent: Canada - onshore and offshore - Alberta; British Columbia; Manitoba; New Brunswick; Newfoundland and
     * Labrador; Northwest Territories; Nova Scotia; Nunavut; Ontario; Prince Edward Island; Quebec; Saskatchewan;
     * Yukon.
     * Replaces CGVD28 height (CRS code 5713). CGVD2013(CGG2013) height is realized by geoid model CGG2013 (CT code
     * 9246). Replaced by CGVD2013(CGG2013a) height (CRS code 9245).
     */
    public const EPSG_CGVD2013_CGG2013_HEIGHT = 'urn:ogc:def:crs:EPSG::6647';

    /**
     * CGVD2013(CGG2013a) height
     * Extent: Canada - onshore and offshore - Alberta; British Columbia; Manitoba; New Brunswick; Newfoundland and
     * Labrador; Northwest Territories; Nova Scotia; Nunavut; Ontario; Prince Edward Island; Quebec; Saskatchewan;
     * Yukon.
     * Replaces CGVD2013(CGG2013) height (CRS code 6647). CGVD2013(CGG2013a) height is realized by Canadian gravimetric
     * geoid model CGG2013a (CT code 9247).
     */
    public const EPSG_CGVD2013_CGG2013A_HEIGHT = 'urn:ogc:def:crs:EPSG::9245';

    /**
     * CGVD28 height
     * Extent: Canada - onshore - Alberta; British Columbia; Manitoba south of 57°N; New Brunswick; Northwest
     * Territories south west of a line between 60°N, 110°W and the coast at 132°W; Nova Scotia; Ontario south of
     * 52°N; Prince Edward Island; Quebec - mainland west of 66°W and south of 55°N; Saskatchewan south of 55°N;
     * Yukon.
     * From November 2013 replaced by CGVD2013 height (CRS code 6647).
     */
    public const EPSG_CGVD28_HEIGHT = 'urn:ogc:def:crs:EPSG::5713';

    /**
     * Cais da Figueirinha - Angra do Heroismo height
     * Extent: Portugal - central Azores - Terceira island onshore.
     */
    public const EPSG_CAIS_DA_FIGUEIRINHA_ANGRA_DO_HEROISMO_HEIGHT = 'urn:ogc:def:crs:EPSG::6184';

    /**
     * Cais da Madalena height
     * Extent: Portugal - central Azores - Pico island onshore.
     */
    public const EPSG_CAIS_DA_MADALENA_HEIGHT = 'urn:ogc:def:crs:EPSG::6182';

    /**
     * Cais da Pontinha - Funchal height
     * Extent: Portugal - Madeira and Desertas islands - onshore.
     */
    public const EPSG_CAIS_DA_PONTINHA_FUNCHAL_HEIGHT = 'urn:ogc:def:crs:EPSG::6178';

    /**
     * Cais da Vila - Porto Santo height
     * Extent: Portugal - Porto Santo island (Madeira archipelago) onshore.
     */
    public const EPSG_CAIS_DA_VILA_PORTO_SANTO_HEIGHT = 'urn:ogc:def:crs:EPSG::6179';

    /**
     * Cais da Vila do Porto height
     * Extent: Portugal - eastern Azores onshore - Santa Maria, Formigas.
     */
    public const EPSG_CAIS_DA_VILA_DO_PORTO_HEIGHT = 'urn:ogc:def:crs:EPSG::6186';

    /**
     * Cais das Velas height
     * Extent: Portugal - central Azores - Sao Jorge island onshore.
     */
    public const EPSG_CAIS_DAS_VELAS_HEIGHT = 'urn:ogc:def:crs:EPSG::6180';

    /**
     * Cascais height
     * Extent: Portugal - mainland - onshore.
     */
    public const EPSG_CASCAIS_HEIGHT = 'urn:ogc:def:crs:EPSG::5780';

    /**
     * Caspian depth
     * Extent: Azerbaijan - offshore; Kazakhstan - offshore; Russian Federation - Caspian Sea; Turkmenistan - offshore.
     * Caspian Sea water levels are now offset appreciably from this datum.
     */
    public const EPSG_CASPIAN_DEPTH = 'urn:ogc:def:crs:EPSG::5706';

    /**
     * Caspian height
     * Extent: Azerbaijan - offshore; Kazakhstan - offshore; Russian Federation - Caspian Sea; Turkmenistan - offshore.
     * Caspian Sea water levels are now offset appreciably from this datum.
     */
    public const EPSG_CASPIAN_HEIGHT = 'urn:ogc:def:crs:EPSG::5611';

    /**
     * Ceuta 2 height
     * Extent: Spain - Ceuta onshore.
     */
    public const EPSG_CEUTA_2_HEIGHT = 'urn:ogc:def:crs:EPSG::9402';

    /**
     * Chatham Island 1959 height
     * Extent: New Zealand - Chatham Island - onshore.
     */
    public const EPSG_CHATHAM_ISLAND_1959_HEIGHT = 'urn:ogc:def:crs:EPSG::5771';

    /**
     * Constanta height
     * Extent: Romania - onshore.
     */
    public const EPSG_CONSTANTA_HEIGHT = 'urn:ogc:def:crs:EPSG::5781';

    /**
     * DACR52 height
     * Extent: Costa Rica - onshore.
     */
    public const EPSG_DACR52_HEIGHT = 'urn:ogc:def:crs:EPSG::8911';

    /**
     * DHHN12 height
     * Extent: Germany - onshore - states of Baden-Wurtemberg, Bayern, Berlin, Brandenburg, Bremen, Hamburg, Hessen,
     * Mecklenburg-Vorpommern, Niedersachsen, Nordrhein-Westfalen, Rheinland-Pfalz, Saarland, Sachsen, Sachsen-Anhalt,
     * Schleswig-Holstein, Thuringen.
     * Replaced by SNN56 and then SNN76 in East Germany and by DHHN85 in West Germany.
     */
    public const EPSG_DHHN12_HEIGHT = 'urn:ogc:def:crs:EPSG::7699';

    /**
     * DHHN2016 height
     * Extent: Germany - onshore - states of Baden-Wurtemberg, Bayern, Berlin, Brandenburg, Bremen, Hamburg, Hessen,
     * Mecklenburg-Vorpommern, Niedersachsen, Nordrhein-Westfalen, Rheinland-Pfalz, Saarland, Sachsen, Sachsen-Anhalt,
     * Schleswig-Holstein, Thuringen.
     * Replaces DHHN92 height (CRS code 5783).
     */
    public const EPSG_DHHN2016_HEIGHT = 'urn:ogc:def:crs:EPSG::7837';

    /**
     * DHHN85 height
     * Extent: Germany - states of former West Germany onshore - Baden-Wurtemberg, Bayern, Bremen, Hamburg, Hessen,
     * Niedersachsen, Nordrhein-Westfalen, Rheinland-Pfalz, Saarland, Schleswig-Holstein.
     * Replaced by DNNH92 height (CRS code 5783).
     */
    public const EPSG_DHHN85_HEIGHT = 'urn:ogc:def:crs:EPSG::5784';

    /**
     * DHHN92 height
     * Extent: Germany - onshore - states of Baden-Wurtemberg, Bayern, Berlin, Brandenburg, Bremen, Hamburg, Hessen,
     * Mecklenburg-Vorpommern, Niedersachsen, Nordrhein-Westfalen, Rheinland-Pfalz, Saarland, Sachsen, Sachsen-Anhalt,
     * Schleswig-Holstein, Thuringen.
     * Replaces SNN76 height (CRS code 5785) and DHHN85 height (CRS code 5784). Replaced by DHHN2016 height (CRS code
     * 7837).
     */
    public const EPSG_DHHN92_HEIGHT = 'urn:ogc:def:crs:EPSG::5783';

    /**
     * DNN height
     * Extent: Denmark - onshore.
     * Replaced by DVR90 height (CRS code 5799).
     */
    public const EPSG_DNN_HEIGHT = 'urn:ogc:def:crs:EPSG::5733';

    /**
     * DVR90 height
     * Extent: Denmark - onshore.
     * Replaces Dansk Normal Null height (CRS code 5733).
     */
    public const EPSG_DVR90_HEIGHT = 'urn:ogc:def:crs:EPSG::5799';

    /**
     * Danger 1950 height
     * Extent: St Pierre and Miquelon - onshore.
     */
    public const EPSG_DANGER_1950_HEIGHT = 'urn:ogc:def:crs:EPSG::5792';

    /**
     * Douglas height
     * Extent: Isle of Man - onshore.
     */
    public const EPSG_DOUGLAS_HEIGHT = 'urn:ogc:def:crs:EPSG::5750';

    /**
     * Dunedin 1958 height
     * Extent: New Zealand - South Island - between approximately 44°S and 46°S - Dunedin vertical CRS area.
     */
    public const EPSG_DUNEDIN_1958_HEIGHT = 'urn:ogc:def:crs:EPSG::5761';

    /**
     * Dunedin-Bluff 1960 height
     * Extent: New Zealand - South Island - Dunedin-Bluff vertical CRS area.
     */
    public const EPSG_DUNEDIN_BLUFF_1960_HEIGHT = 'urn:ogc:def:crs:EPSG::4458';

    /**
     * Durres height
     * Extent: Albania - onshore.
     */
    public const EPSG_DURRES_HEIGHT = 'urn:ogc:def:crs:EPSG::5777';

    /**
     * EGM2008 height
     * Extent: World.
     * Zero-height surface resulting from the application of the EGM2008 geoid model to the WGS 84 ellipsoid. Replaces
     * EGM96 height (CRS code 5773).
     */
    public const EPSG_EGM2008_HEIGHT = 'urn:ogc:def:crs:EPSG::3855';

    /**
     * EGM84 height
     * Extent: World.
     * Zero-height surface resulting from the application of the EGM84 geoid model to the WGS 84 ellipsoid. Replaced by
     * EGM96 height (CRS code 5773).
     */
    public const EPSG_EGM84_HEIGHT = 'urn:ogc:def:crs:EPSG::5798';

    /**
     * EGM96 height
     * Extent: World.
     * Zero-height surface resulting from the application of the EGM96 geoid model to the WGS 84 ellipsoid. Replaces
     * EGM84 height (CRS code 5798). Replaced by EGM2008 height (CRS code 3855).
     */
    public const EPSG_EGM96_HEIGHT = 'urn:ogc:def:crs:EPSG::5773';

    /**
     * EH2000 height
     * Extent: Estonia - onshore.
     * In Estonia replaces Baltic 1977 system (CRS code 5705) from January 2018.
     */
    public const EPSG_EH2000_HEIGHT = 'urn:ogc:def:crs:EPSG::9663';

    /**
     * EOMA 1980 height
     * Extent: Hungary.
     */
    public const EPSG_EOMA_1980_HEIGHT = 'urn:ogc:def:crs:EPSG::5787';

    /**
     * EVRF2000 Austria height
     * Extent: Austria.
     * Austria-specific version of EVRF using orthometric heights instead of the Normal heights used in EVRF2000 (CRS
     * code 5730). Used for scientific purposes. See GHA height (CRS code 5778) for cadastral and other land survey
     * purposes.
     */
    public const EPSG_EVRF2000_AUSTRIA_HEIGHT = 'urn:ogc:def:crs:EPSG::9274';

    /**
     * EVRF2000 height
     * Extent: Europe - onshore - Andorra; Austria; Belgium; Bosnia and Herzegovina; Croatia; Czechia; Denmark;
     * Estonia; Finland; France - mainland; Germany; Gibraltar; Hungary; Italy - mainland and Sicily; Latvia;
     * Liechtenstein; Lithuania; Luxembourg; Netherlands; Norway; Poland; Portugal - mainland; Romania; San Marino;
     * Slovakia; Slovenia; Spain - mainland; Sweden; Switzerland; United Kingdom (UK) - Great Britain mainland; Vatican
     * City State.
     * Uses Normal heights. Replaced by EVRF2007 height (CRS code 5621). In Austria, orthometric heights used instead -
     * see CRS code 9274.
     */
    public const EPSG_EVRF2000_HEIGHT = 'urn:ogc:def:crs:EPSG::5730';

    /**
     * EVRF2007 height
     * Extent: Europe - onshore - Andorra; Austria; Belgium; Bosnia and Herzegovina; Bulgaria; Croatia; Czechia;
     * Denmark; Estonia; Finland; France - mainland; Germany; Gibraltar, Hungary; Italy - mainland and Sicily; Latvia;
     * Liechtenstein; Lithuania; Luxembourg; Netherlands; Norway; Poland; Portugal - mainland; Romania; San Marino;
     * Slovakia; Slovenia; Spain - mainland; Sweden; Switzerland; United Kingdom (UK) - Great Britain mainland; Vatican
     * City State.
     * Uses Normal heights. Replaces EVRF2000 height (CRS code 5730). Replaced by EVRF2019 height (CRS code 9389).
     */
    public const EPSG_EVRF2007_HEIGHT = 'urn:ogc:def:crs:EPSG::5621';

    /**
     * EVRF2019 height
     * Extent: Europe - onshore - Andorra; Austria; Belarus; Belgium; Bosnia and Herzegovina; Bulgaria; Croatia;
     * Czechia; Denmark; Estonia; Finland; France - mainland; Germany; Gibraltar, Hungary; Italy - mainland and Sicily;
     * Latvia; Liechtenstein; Lithuania; Luxembourg; Netherlands; North Macedonia; Norway; Poland; Portugal - mainland;
     * Romania; Russia – west of approximately 60°E; San Marino; Slovakia; Slovenia; Spain - mainland; Sweden;
     * Switzerland; United Kingdom (UK) - Great Britain mainland; Ukraine; Vatican City State.
     * September 2020 adjustment. Replaces 2019 adjustment and EVRF2007 height (CRS code 5621). Uses Normal heights.
     * Zero-tide solution. See EVRF2019 mean-tide height (CRS code 9390) for solution more appropriate for oceanography
     * and GNSS-related activities.
     */
    public const EPSG_EVRF2019_HEIGHT = 'urn:ogc:def:crs:EPSG::9389';

    /**
     * EVRF2019 mean-tide height
     * Extent: Europe - onshore - Andorra; Austria; Belarus; Belgium; Bosnia and Herzegovina; Bulgaria; Croatia;
     * Czechia; Denmark; Estonia; Finland; France - mainland; Germany; Gibraltar, Hungary; Italy - mainland and Sicily;
     * Latvia; Liechtenstein; Lithuania; Luxembourg; Netherlands; North Macedonia; Norway; Poland; Portugal - mainland;
     * Romania; Russia – west of approximately 60°E; San Marino; Slovakia; Slovenia; Spain - mainland; Sweden;
     * Switzerland; United Kingdom (UK) - Great Britain mainland; Ukraine; Vatican City State.
     * September 2020 adjustment. Replaces 2019 adjustment. Uses Normal heights. Mean-tide solution. See EVRF2019
     * height (CRS code 9389) for zero-tide solution more appropriate for gravity-related activities.
     */
    public const EPSG_EVRF2019_MEAN_TIDE_HEIGHT = 'urn:ogc:def:crs:EPSG::9390';

    /**
     * El Hierro height
     * Extent: Spain - Canary Islands - El Hierro onshore.
     */
    public const EPSG_EL_HIERRO_HEIGHT = 'urn:ogc:def:crs:EPSG::9401';

    /**
     * FCSVR10 height
     * Extent: Fehmarnbelt area of Denmark and Germany.
     */
    public const EPSG_FCSVR10_HEIGHT = 'urn:ogc:def:crs:EPSG::5597';

    /**
     * FVR09 height
     * Extent: Faroe Islands - onshore.
     * Introduced in 2010.
     */
    public const EPSG_FVR09_HEIGHT = 'urn:ogc:def:crs:EPSG::5317';

    /**
     * Fahud HD height
     * Extent: Oman - mainland onshore.
     * Replaced by PHD93 height (CRS code 5724) from 1993.
     */
    public const EPSG_FAHUD_HD_HEIGHT = 'urn:ogc:def:crs:EPSG::5725';

    /**
     * Fair Isle height
     * Extent: United Kingdom (UK) - Great Britain - Scotland - Fair Isle onshore.
     * Replaced by ODN (Offshore) height (CRS code 7707) in 2016.
     */
    public const EPSG_FAIR_ISLE_HEIGHT = 'urn:ogc:def:crs:EPSG::5741';

    /**
     * Famagusta 1960 height
     * Extent: Cyprus - onshore.
     */
    public const EPSG_FAMAGUSTA_1960_HEIGHT = 'urn:ogc:def:crs:EPSG::7446';

    /**
     * Fao 1979 height
     * Extent: Iraq - onshore.
     * Replaces Fao height (CRS code 5751) for national map agency work in Iraq. At time of record creation some
     * irrigation project data still referenced to Fao. Usage in oil industry is uncertain.
     */
    public const EPSG_FAO_1979_HEIGHT = 'urn:ogc:def:crs:EPSG::3886';

    /**
     * Fao height
     * Extent: Iraq - onshore southeast; Iran - onshore northern Gulf coast and west bordering southeast Iraq.
     * Replaced by Bandar Abbas (CRS code 5752) in Iran and Fao 1979 (code 3886) in Iraq. At time of record creation
     * NIOC data in Ahwaz area of Iran and some irrigation project data in Iraq still usually referenced to Fao. Usage
     * in Iraqi oil industry uncertain.
     */
    public const EPSG_FAO_HEIGHT = 'urn:ogc:def:crs:EPSG::5751';

    /**
     * Flannan Isles height
     * Extent: United Kingdom (UK) - Great Britain - Scotland - Flannan Isles onshore.
     * Replaced by ODN (Offshore) height (CRS code 7707) in 2016.
     */
    public const EPSG_FLANNAN_ISLES_HEIGHT = 'urn:ogc:def:crs:EPSG::5748';

    /**
     * Foula height
     * Extent: United Kingdom (UK) - Great Britain - Scotland - Foula onshore.
     * Replaced by ODN (Offshore) height (CRS code 7707) in 2016.
     */
    public const EPSG_FOULA_HEIGHT = 'urn:ogc:def:crs:EPSG::5743';

    /**
     * Fuerteventura height
     * Extent: Spain - Canary Islands - Fuerteventura onshore.
     */
    public const EPSG_FUERTEVENTURA_HEIGHT = 'urn:ogc:def:crs:EPSG::9396';

    /**
     * GCVD54 height (ft)
     * Extent: Cayman Islands - Grand Cayman.
     */
    public const EPSG_GCVD54_HEIGHT_FT = 'urn:ogc:def:crs:EPSG::6130';

    /**
     * GHA height
     * Extent: Austria.
     * For scientific purposes see EVRF2000 Austria height (CRS code 9274).
     */
    public const EPSG_GHA_HEIGHT = 'urn:ogc:def:crs:EPSG::5778';

    /**
     * GUVD04 height
     * Extent: Guam - onshore.
     * Replaces Guam 1963 height (CRS code 6639).
     */
    public const EPSG_GUVD04_HEIGHT = 'urn:ogc:def:crs:EPSG::6644';

    /**
     * GVR2000 height
     * Extent: Greenland - onshore and offshore between 59°N and 84°N and west of 10°W.
     * Replaced by GVR2016 height (CRS code 8267). GVR2000 is realized by gravimetric geoid model 2000 (transformation
     * code 8268) applied to GR96 (CRS code 4909).
     */
    public const EPSG_GVR2000_HEIGHT = 'urn:ogc:def:crs:EPSG::8266';

    /**
     * GVR2016 height
     * Extent: Greenland - onshore and offshore between 58°N and 85°N and west of 7°W.
     * Replaces GVR2000 height (CRS code 8266). GVR2016 is realized by gravimetric geoid model 2016 (transformation
     * code 8269) applied to GR96 (CRS code 4909).
     */
    public const EPSG_GVR2016_HEIGHT = 'urn:ogc:def:crs:EPSG::8267';

    /**
     * Genoa height
     * Extent: Italy - mainland (including San Marino and Vatican City State) and Sicily.
     */
    public const EPSG_GENOA_HEIGHT = 'urn:ogc:def:crs:EPSG::5214';

    /**
     * Gisborne 1926 height
     * Extent: New Zealand - North Island - Gisborne vertical CRS area.
     */
    public const EPSG_GISBORNE_1926_HEIGHT = 'urn:ogc:def:crs:EPSG::5762';

    /**
     * Gran Canaria height
     * Extent: Spain - Canary Islands - Gran Canaria onshore.
     */
    public const EPSG_GRAN_CANARIA_HEIGHT = 'urn:ogc:def:crs:EPSG::9397';

    /**
     * Guadeloupe 1951 height
     * Extent: Guadeloupe - onshore - Basse-Terre and Grande-Terre.
     * Replaced by Guadeloupe 1988 height (CRS code 5757).
     */
    public const EPSG_GUADELOUPE_1951_HEIGHT = 'urn:ogc:def:crs:EPSG::5795';

    /**
     * Guadeloupe 1988 height
     * Extent: Guadeloupe - onshore - Basse-Terre and Grande-Terre.
     * Replaces Guadeloupe 1951 height (CRS code 5795).
     */
    public const EPSG_GUADELOUPE_1988_HEIGHT = 'urn:ogc:def:crs:EPSG::5757';

    /**
     * Guam 1963 height
     * Extent: Guam - onshore.
     * Replaced by GUVD04 height (CRS code 6644).
     */
    public const EPSG_GUAM_1963_HEIGHT = 'urn:ogc:def:crs:EPSG::6639';

    /**
     * HAT height
     * Extent: World.
     * Not specific to any location or epoch.
     */
    public const EPSG_HAT_HEIGHT = 'urn:ogc:def:crs:EPSG::5872';

    /**
     * HHWLT height
     * Extent: World.
     * Not specific to any location or epoch.
     */
    public const EPSG_HHWLT_HEIGHT = 'urn:ogc:def:crs:EPSG::5871';

    /**
     * HKCD depth
     * Extent: China - Hong Kong - offshore.
     * Chart datum is 0.15 metres below Hong Kong Principal Datum (CRS code 5738) and 1.38m below MSL at Quarry Bay.
     */
    public const EPSG_HKCD_DEPTH = 'urn:ogc:def:crs:EPSG::5739';

    /**
     * HKPD depth
     * Extent: China - Hong Kong - onshore.
     */
    public const EPSG_HKPD_DEPTH = 'urn:ogc:def:crs:EPSG::7976';

    /**
     * HKPD height
     * Extent: China - Hong Kong - onshore.
     */
    public const EPSG_HKPD_HEIGHT = 'urn:ogc:def:crs:EPSG::5738';

    /**
     * HS2-VRF height
     * Extent: UK - HS2 phases 1 and 2a railway corridor from London to Birmingham, Lichfield and Crewe.
     * HS2-VRF height is equivalent to ODN height as historically realised through OSNet v2001 and OSGM02. After the
     * ODN realization was updated to be through OSNet v2009 and OSGM15, HS2-VRF height was introduced for backward
     * consistency.
     */
    public const EPSG_HS2_VRF_HEIGHT = 'urn:ogc:def:crs:EPSG::9303';

    /**
     * HVRS71 height
     * Extent: Croatia - onshore.
     * Replaces Trieste height (CRS code 5195).
     */
    public const EPSG_HVRS71_HEIGHT = 'urn:ogc:def:crs:EPSG::5610';

    /**
     * Ha Tien 1960 height
     * Extent: Cambodia - mainland onshore; Vietnam - mainland onshore.
     * In Vietnam replaced by Hon Dau height (CRS code 5727) from 1992.
     */
    public const EPSG_HA_TIEN_1960_HEIGHT = 'urn:ogc:def:crs:EPSG::5726';

    /**
     * High Water height
     * Extent: World.
     * Not specific to any location or epoch.
     */
    public const EPSG_HIGH_WATER_HEIGHT = 'urn:ogc:def:crs:EPSG::5874';

    /**
     * Hon Dau 1992 height
     * Extent: Vietnam - mainland onshore.
     * In Vietnam replaces Ha Tien height (CRS code 5726) from 1992.
     */
    public const EPSG_HON_DAU_1992_HEIGHT = 'urn:ogc:def:crs:EPSG::5727';

    /**
     * Horta height
     * Extent: Portugal - central Azores - Faial island onshore.
     */
    public const EPSG_HORTA_HEIGHT = 'urn:ogc:def:crs:EPSG::6181';

    /**
     * Huahine SAU 2001 height
     * Extent: French Polynesia - Society Islands - Huahine.
     * Part of NGPF (CRS code 5600).
     */
    public const EPSG_HUAHINE_SAU_2001_HEIGHT = 'urn:ogc:def:crs:EPSG::5605';

    /**
     * IGLD 1955 height
     * Extent: Canada and United States (USA) - Great Lakes basin and St Lawrence Seaway.
     * Replaces several earlier systems. Replaced by IGLD 1985 (CRS code 5609).
     */
    public const EPSG_IGLD_1955_HEIGHT = 'urn:ogc:def:crs:EPSG::5608';

    /**
     * IGLD 1985 height
     * Extent: Canada and United States (USA) - Great Lakes basin and St Lawrence Seaway.
     * Replaces IGLD 1955 (CRS code 5608).
     */
    public const EPSG_IGLD_1985_HEIGHT = 'urn:ogc:def:crs:EPSG::5609';

    /**
     * IGN 1966 height
     * Extent: French Polynesia - Society Islands - Tahiti.
     * Part of NGPF (CRS code 5600).
     */
    public const EPSG_IGN_1966_HEIGHT = 'urn:ogc:def:crs:EPSG::5601';

    /**
     * IGN 1988 LS height
     * Extent: Guadeloupe - onshore - Les Saintes.
     */
    public const EPSG_IGN_1988_LS_HEIGHT = 'urn:ogc:def:crs:EPSG::5616';

    /**
     * IGN 1988 MG height
     * Extent: Guadeloupe - onshore - Marie-Galante.
     */
    public const EPSG_IGN_1988_MG_HEIGHT = 'urn:ogc:def:crs:EPSG::5617';

    /**
     * IGN 1988 SB height
     * Extent: Guadeloupe - onshore - St Barthelemy island.
     */
    public const EPSG_IGN_1988_SB_HEIGHT = 'urn:ogc:def:crs:EPSG::5619';

    /**
     * IGN 1988 SM height
     * Extent: Guadeloupe - onshore - St Martin island.
     */
    public const EPSG_IGN_1988_SM_HEIGHT = 'urn:ogc:def:crs:EPSG::5620';

    /**
     * IGN 1992 LD height
     * Extent: Guadeloupe - onshore - La Desirade.
     * Replaced by IGN 2008 LD height (CRS code 9130).
     */
    public const EPSG_IGN_1992_LD_HEIGHT = 'urn:ogc:def:crs:EPSG::5618';

    /**
     * IGN 2008 LD height
     * Extent: Guadeloupe - onshore - La Desirade.
     * Replaces IGN 1992 LD height (CRS code 5618).
     */
    public const EPSG_IGN_2008_LD_HEIGHT = 'urn:ogc:def:crs:EPSG::9130';

    /**
     * INAGeoid2020 height
     * Extent: Indonesia - onshore and offshore.
     * Physical height component of national vertical control network (JKVN). Orthometric heights.
     */
    public const EPSG_INAGEOID2020_HEIGHT = 'urn:ogc:def:crs:EPSG::9471';

    /**
     * ISH2004 height
     * Extent: Iceland - onshore.
     * National system replacing older local systems from March 2011.
     */
    public const EPSG_ISH2004_HEIGHT = 'urn:ogc:def:crs:EPSG::8089';

    /**
     * ISLW depth
     * Extent: World.
     * Not specific to any location or epoch.
     */
    public const EPSG_ISLW_DEPTH = 'urn:ogc:def:crs:EPSG::5863';

    /**
     * Ibiza height
     * Extent: Spain - Balearic Islands - Ibiza and Formentera - onshore.
     */
    public const EPSG_IBIZA_HEIGHT = 'urn:ogc:def:crs:EPSG::9394';

    /**
     * Incheon height
     * Extent: Republic of Korea (South Korea) - mainland onshore.
     */
    public const EPSG_INCHEON_HEIGHT = 'urn:ogc:def:crs:EPSG::5193';

    /**
     * Instantaneous Water Level depth
     * Extent: World.
     * Depth relative to instantaneous water level uncorrected for tide. Not specific to any location or epoch.
     */
    public const EPSG_INSTANTANEOUS_WATER_LEVEL_DEPTH = 'urn:ogc:def:crs:EPSG::5831';

    /**
     * Instantaneous Water Level height
     * Extent: World.
     * Height relative to instantaneous water level uncorrected for tide. Not specific to any location or epoch.
     */
    public const EPSG_INSTANTANEOUS_WATER_LEVEL_HEIGHT = 'urn:ogc:def:crs:EPSG::5829';

    /**
     * JGD2000 (vertical) height
     * Extent: Japan - onshore mainland - Hokkaido, Honshu, Shikoku, Kyushu.
     * Replaced JSLD69 and JSLD72 (CRS codes 5723 and 6693) from April 2002. Replaced by JGD2011 (vertical) (CRS code
     * 6695) with effect from 21st October 2011.
     */
    public const EPSG_JGD2000_VERTICAL_HEIGHT = 'urn:ogc:def:crs:EPSG::6694';

    /**
     * JGD2011 (vertical) height
     * Extent: Japan - onshore mainland - Hokkaido, Honshu, Shikoku, Kyushu.
     * Replaces JGD2000 (vertical) (CRS code 6694) with effect from 21st October 2011.
     */
    public const EPSG_JGD2011_VERTICAL_HEIGHT = 'urn:ogc:def:crs:EPSG::6695';

    /**
     * JSLD69 height
     * Extent: Japan - onshore mainland - Honshu, Shikoku, Kyushu.
     * Replaces JSLD49. Replaced by JGD2000 (vertical) (CRS code 6694) with effect from April 2002.
     */
    public const EPSG_JSLD69_HEIGHT = 'urn:ogc:def:crs:EPSG::5723';

    /**
     * JSLD72 height
     * Extent: Japan - onshore mainland - Hokkaido.
     * Replaced by JGD2000 (vertical) (CRS code 6694) with effect from April 2002.
     */
    public const EPSG_JSLD72_HEIGHT = 'urn:ogc:def:crs:EPSG::6693';

    /**
     * Jamestown 1971 height
     * Extent: St Helena, Ascension and Tristan da Cunha - St Helena Island - onshore.
     * Replaced by SHVD2016 (CRS code 7890) from 2016.
     */
    public const EPSG_JAMESTOWN_1971_HEIGHT = 'urn:ogc:def:crs:EPSG::7888';

    /**
     * KOC CD height
     * Extent: Kuwait - onshore.
     */
    public const EPSG_KOC_CD_HEIGHT = 'urn:ogc:def:crs:EPSG::5790';

    /**
     * KOC WD depth
     * Extent: Kuwait - onshore.
     * See CRS code 5614 for equivalent system in feet.
     */
    public const EPSG_KOC_WD_DEPTH = 'urn:ogc:def:crs:EPSG::5789';

    /**
     * KOC WD depth (ft)
     * Extent: Kuwait - onshore.
     * See CRS code 5789 for equivalent system in feet.
     */
    public const EPSG_KOC_WD_DEPTH_FT = 'urn:ogc:def:crs:EPSG::5614';

    /**
     * KOC WD height
     * Extent: Kuwait - onshore.
     * See CRS code 5789 for equivalent depth system.
     */
    public const EPSG_KOC_WD_HEIGHT = 'urn:ogc:def:crs:EPSG::7979';

    /**
     * KSA-VRF14 height
     * Extent: Saudi Arabia - onshore.
     * Orthometric heights.
     */
    public const EPSG_KSA_VRF14_HEIGHT = 'urn:ogc:def:crs:EPSG::9335';

    /**
     * Kiunga height
     * Extent: Papua New Guinea - onshore south of 5°S and west of 144°E.
     * Kiunga height = WGS 84 ellipsoid height - value of geoid undulation derived by bilinear interpolation of EGM2008
     * geoid model - 3.0m = EGM2008 height - 3.0m.  See CRS code 3855 and transformation code 3858.
     */
    public const EPSG_KIUNGA_HEIGHT = 'urn:ogc:def:crs:EPSG::7652';

    /**
     * Kumul 34 height
     * Extent: Papua New Guinea - Papuan fold and thrust belt.
     * Kumul 34 height = WGS 84 ellipsoid height - value of geoid undulation derived by bilinear interpolation of EGM96
     * geoid model - 0.87m = EGM96 height - 0.87m. See CRS code 5773 and transformation code 10084.
     */
    public const EPSG_KUMUL_34_HEIGHT = 'urn:ogc:def:crs:EPSG::7651';

    /**
     * Kuwait PWD height
     * Extent: Kuwait - onshore.
     */
    public const EPSG_KUWAIT_PWD_HEIGHT = 'urn:ogc:def:crs:EPSG::5788';

    /**
     * LAS07 height
     * Extent: Lithuania - onshore.
     * In Lithuania replaces Baltic 1977 system (CRS code 5705) from January 2016.
     */
    public const EPSG_LAS07_HEIGHT = 'urn:ogc:def:crs:EPSG::9666';

    /**
     * LAT NL depth
     * Extent: Netherlands - offshore North Sea.
     */
    public const EPSG_LAT_NL_DEPTH = 'urn:ogc:def:crs:EPSG::9287';

    /**
     * LAT depth
     * Extent: World.
     * Not specific to any location or epoch.
     */
    public const EPSG_LAT_DEPTH = 'urn:ogc:def:crs:EPSG::5861';

    /**
     * LCVD61 height (ft)
     * Extent: Cayman Islands - Little Cayman.
     */
    public const EPSG_LCVD61_HEIGHT_FT = 'urn:ogc:def:crs:EPSG::6131';

    /**
     * LHN95 height
     * Extent: Liechtenstein; Switzerland.
     * Replaces LN02 height (CRS code 5728).
     */
    public const EPSG_LHN95_HEIGHT = 'urn:ogc:def:crs:EPSG::5729';

    /**
     * LLWLT depth
     * Extent: World.
     * Not specific to any location or epoch.
     */
    public const EPSG_LLWLT_DEPTH = 'urn:ogc:def:crs:EPSG::5862';

    /**
     * LN02 height
     * Extent: Liechtenstein; Switzerland.
     * Replaced by LHN95 height (CRS code 5729).
     */
    public const EPSG_LN02_HEIGHT = 'urn:ogc:def:crs:EPSG::5728';

    /**
     * La Gomera height
     * Extent: Spain - Canary Islands - La Gomera onshore.
     */
    public const EPSG_LA_GOMERA_HEIGHT = 'urn:ogc:def:crs:EPSG::9399';

    /**
     * La Palma height
     * Extent: Spain - Canary Islands - La Palma onshore.
     */
    public const EPSG_LA_PALMA_HEIGHT = 'urn:ogc:def:crs:EPSG::9400';

    /**
     * Lagos 1955 height
     * Extent: Nigeria - onshore.
     */
    public const EPSG_LAGOS_1955_HEIGHT = 'urn:ogc:def:crs:EPSG::5796';

    /**
     * Lanzarote height
     * Extent: Spain - Canary Islands - Lanzarote onshore.
     */
    public const EPSG_LANZAROTE_HEIGHT = 'urn:ogc:def:crs:EPSG::9395';

    /**
     * Latvia 2000 height
     * Extent: Latvia - onshore.
     * In Latvia replaces Baltic 1977 system (CRS code 5705) from December 2014.
     */
    public const EPSG_LATVIA_2000_HEIGHT = 'urn:ogc:def:crs:EPSG::7700';

    /**
     * Lerwick height
     * Extent: United Kingdom (UK) - Great Britain - Scotland - Shetland Islands onshore.
     */
    public const EPSG_LERWICK_HEIGHT = 'urn:ogc:def:crs:EPSG::5742';

    /**
     * Low Water depth
     * Extent: World.
     * Not specific to any location or epoch.
     */
    public const EPSG_LOW_WATER_DEPTH = 'urn:ogc:def:crs:EPSG::5873';

    /**
     * Lyttelton 1937 height
     * Extent: New Zealand - South Island - between approximately 41°20'S and 45°S - Lyttleton vertical CRS area.
     */
    public const EPSG_LYTTELTON_1937_HEIGHT = 'urn:ogc:def:crs:EPSG::5763';

    /**
     * MHHW height
     * Extent: World.
     * Not specific to any location or epoch.
     */
    public const EPSG_MHHW_HEIGHT = 'urn:ogc:def:crs:EPSG::5869';

    /**
     * MHW height
     * Extent: World.
     * Not specific to any location or epoch.
     */
    public const EPSG_MHW_HEIGHT = 'urn:ogc:def:crs:EPSG::5868';

    /**
     * MHWS height
     * Extent: World.
     * Not specific to any location or epoch.
     */
    public const EPSG_MHWS_HEIGHT = 'urn:ogc:def:crs:EPSG::5870';

    /**
     * MLLW depth
     * Extent: World.
     * Not specific to any location or epoch.
     */
    public const EPSG_MLLW_DEPTH = 'urn:ogc:def:crs:EPSG::5866';

    /**
     * MLLWS depth
     * Extent: World.
     * Not specific to any location or epoch.
     */
    public const EPSG_MLLWS_DEPTH = 'urn:ogc:def:crs:EPSG::5864';

    /**
     * MLW depth
     * Extent: World.
     * Not specific to any location or epoch.
     */
    public const EPSG_MLW_DEPTH = 'urn:ogc:def:crs:EPSG::5867';

    /**
     * MLWS depth
     * Extent: World.
     * Not specific to any location or epoch.
     */
    public const EPSG_MLWS_DEPTH = 'urn:ogc:def:crs:EPSG::5865';

    /**
     * MSL NL depth
     * Extent: Netherlands - offshore North Sea.
     */
    public const EPSG_MSL_NL_DEPTH = 'urn:ogc:def:crs:EPSG::9288';

    /**
     * MSL depth
     * Extent: World.
     * Not specific to any location or epoch.
     */
    public const EPSG_MSL_DEPTH = 'urn:ogc:def:crs:EPSG::5715';

    /**
     * MSL depth (ft)
     * Extent: World.
     * Not specific to any location or epoch.
     */
    public const EPSG_MSL_DEPTH_FT = 'urn:ogc:def:crs:EPSG::8051';

    /**
     * MSL depth (ftUS)
     * Extent: United States (USA) - onshore and offshore.
     * Not specific to any location or epoch.
     */
    public const EPSG_MSL_DEPTH_FTUS = 'urn:ogc:def:crs:EPSG::8053';

    /**
     * MSL height
     * Extent: World.
     * Not specific to any location or epoch.
     */
    public const EPSG_MSL_HEIGHT = 'urn:ogc:def:crs:EPSG::5714';

    /**
     * MSL height (ft)
     * Extent: World.
     * Not specific to any location or epoch.
     */
    public const EPSG_MSL_HEIGHT_FT = 'urn:ogc:def:crs:EPSG::8050';

    /**
     * MSL height (ftUS)
     * Extent: United States (USA) - onshore and offshore.
     * Not specific to any location or epoch.
     */
    public const EPSG_MSL_HEIGHT_FTUS = 'urn:ogc:def:crs:EPSG::8052';

    /**
     * MVGC height
     * Extent: Saudi Arabia - onshore.
     */
    public const EPSG_MVGC_HEIGHT = 'urn:ogc:def:crs:EPSG::8841';

    /**
     * Macao height
     * Extent: China - Macao - onshore and offshore.
     */
    public const EPSG_MACAO_HEIGHT = 'urn:ogc:def:crs:EPSG::8434';

    /**
     * Malin Head height
     * Extent: Ireland - onshore. United Kingdom (UK) - Northern Ireland (Ulster) - onshore.
     * Topographic mapping at all scales in Republic and medium and small scales in Northern Ireland. Belfast Lough
     * height (CRS code 5732) used for large scale topographic mapping in Northern Ireland.
     */
    public const EPSG_MALIN_HEAD_HEIGHT = 'urn:ogc:def:crs:EPSG::5731';

    /**
     * Mallorca height
     * Extent: Spain - Balearic Islands - Mallorca onshore.
     */
    public const EPSG_MALLORCA_HEIGHT = 'urn:ogc:def:crs:EPSG::9392';

    /**
     * Maputo height
     * Extent: Mozambique - onshore.
     */
    public const EPSG_MAPUTO_HEIGHT = 'urn:ogc:def:crs:EPSG::5722';

    /**
     * Martinique 1955 height
     * Extent: Martinique - onshore.
     * Replaced by Martinique 1987 height (CRS code 5756).
     */
    public const EPSG_MARTINIQUE_1955_HEIGHT = 'urn:ogc:def:crs:EPSG::5794';

    /**
     * Martinique 1987 height
     * Extent: Martinique - onshore.
     * Replaces Martinique 1955 height (CRS code 5794).
     */
    public const EPSG_MARTINIQUE_1987_HEIGHT = 'urn:ogc:def:crs:EPSG::5756';

    /**
     * Maupiti SAU 2001 height
     * Extent: French Polynesia - Society Islands - Maupiti.
     * Part of NGPF (CRS code 5600).
     */
    public const EPSG_MAUPITI_SAU_2001_HEIGHT = 'urn:ogc:def:crs:EPSG::5604';

    /**
     * Mayotte 1950 height
     * Extent: Mayotte - onshore.
     */
    public const EPSG_MAYOTTE_1950_HEIGHT = 'urn:ogc:def:crs:EPSG::5793';

    /**
     * Menorca height
     * Extent: Spain - Balearic Islands - Menorca onshore.
     */
    public const EPSG_MENORCA_HEIGHT = 'urn:ogc:def:crs:EPSG::9393';

    /**
     * Moorea SAU 1981 height
     * Extent: French Polynesia - Society Islands - Moorea.
     * Part of NGPF (CRS code 5600).
     */
    public const EPSG_MOOREA_SAU_1981_HEIGHT = 'urn:ogc:def:crs:EPSG::5602';

    /**
     * Moturiki 1953 height
     * Extent: New Zealand - North Island - Moturiki vertical CRS area.
     */
    public const EPSG_MOTURIKI_1953_HEIGHT = 'urn:ogc:def:crs:EPSG::5764';

    /**
     * N2000 height
     * Extent: Finland - onshore.
     * Replaces N43 height and N60 height (CRS codes 8675 and 5717).
     */
    public const EPSG_N2000_HEIGHT = 'urn:ogc:def:crs:EPSG::3900';

    /**
     * N43 height
     * Extent: Finland - onshore mainland south of approximately 66°N.
     * Introduced during second national precise levelling as a temporary height system (or intended to be such).
     * Replaced by N60 height (CRS code 5717).
     */
    public const EPSG_N43_HEIGHT = 'urn:ogc:def:crs:EPSG::8675';

    /**
     * N60 height
     * Extent: Finland - onshore.
     * In use since 1968. Replaced by N2000 height (CRS code 3900).
     */
    public const EPSG_N60_HEIGHT = 'urn:ogc:def:crs:EPSG::5717';

    /**
     * NAP height
     * Extent: Netherlands - onshore and offshore.
     * Use has been extended from Netherlands onshore to Netherlands onshore and offshore from 2018.
     */
    public const EPSG_NAP_HEIGHT = 'urn:ogc:def:crs:EPSG::5709';

    /**
     * NAVD88 depth
     * Extent: Mexico - onshore. United States (USA) - CONUS and Alaska - onshore - Alabama; Alaska; Arizona; Arkansas;
     * California; Colorado; Connecticut; Delaware; Florida; Georgia; Idaho; Illinois; Indiana; Iowa; Kansas; Kentucky;
     * Louisiana; Maine; Maryland; Massachusetts; Michigan; Minnesota; Mississippi; Missouri; Montana; Nebraska;
     * Nevada; New Hampshire; New Jersey; New Mexico; New York; North Carolina; North Dakota; Ohio; Oklahoma; Oregon;
     * Pennsylvania; Rhode Island; South Carolina; South Dakota; Tennessee; Texas; Utah; Vermont; Virginia; Washington;
     * West Virginia; Wisconsin; Wyoming.
     */
    public const EPSG_NAVD88_DEPTH = 'urn:ogc:def:crs:EPSG::6357';

    /**
     * NAVD88 depth (ftUS)
     * Extent: United States (USA) - CONUS and Alaska - onshore - Alabama; Alaska mainland; Arizona; Arkansas;
     * California; Colorado; Connecticut; Delaware; Florida; Georgia; Idaho; Illinois; Indiana; Iowa; Kansas; Kentucky;
     * Louisiana; Maine; Maryland; Massachusetts; Michigan; Minnesota; Mississippi; Missouri; Montana; Nebraska;
     * Nevada; New Hampshire; New Jersey; New Mexico; New York; North Carolina; North Dakota; Ohio; Oklahoma; Oregon;
     * Pennsylvania; Rhode Island; South Carolina; South Dakota; Tennessee; Texas; Utah; Vermont; Virginia; Washington;
     * West Virginia; Wisconsin; Wyoming.
     * Replaces NGVD29 depth (ftUS) (CRS code 6359).
     */
    public const EPSG_NAVD88_DEPTH_FTUS = 'urn:ogc:def:crs:EPSG::6358';

    /**
     * NAVD88 height
     * Extent: Mexico - onshore. United States (USA) - CONUS and Alaska - onshore - Alabama; Alaska; Arizona; Arkansas;
     * California; Colorado; Connecticut; Delaware; Florida; Georgia; Idaho; Illinois; Indiana; Iowa; Kansas; Kentucky;
     * Louisiana; Maine; Maryland; Massachusetts; Michigan; Minnesota; Mississippi; Missouri; Montana; Nebraska;
     * Nevada; New Hampshire; New Jersey; New Mexico; New York; North Carolina; North Dakota; Ohio; Oklahoma; Oregon;
     * Pennsylvania; Rhode Island; South Carolina; South Dakota; Tennessee; Texas; Utah; Vermont; Virginia; Washington;
     * West Virginia; Wisconsin; Wyoming.
     */
    public const EPSG_NAVD88_HEIGHT = 'urn:ogc:def:crs:EPSG::5703';

    /**
     * NAVD88 height (ft)
     * Extent: United States (USA) - onshore - Arizona; Michigan; Montana; North Dakota; Oregon; South Carolina.
     * Care: only for use as part of a compound CRS in conjunction with State Plane CS in States which have passed
     * State Plane legislation in International feet (note: not US survet feet).
     */
    public const EPSG_NAVD88_HEIGHT_FT = 'urn:ogc:def:crs:EPSG::8228';

    /**
     * NAVD88 height (ftUS)
     * Extent: United States (USA) - CONUS and Alaska - onshore - Alabama; Alaska mainland; Arizona; Arkansas;
     * California; Colorado; Connecticut; Delaware; Florida; Georgia; Idaho; Illinois; Indiana; Iowa; Kansas; Kentucky;
     * Louisiana; Maine; Maryland; Massachusetts; Michigan; Minnesota; Mississippi; Missouri; Montana; Nebraska;
     * Nevada; New Hampshire; New Jersey; New Mexico; New York; North Carolina; North Dakota; Ohio; Oklahoma; Oregon;
     * Pennsylvania; Rhode Island; South Carolina; South Dakota; Tennessee; Texas; Utah; Vermont; Virginia; Washington;
     * West Virginia; Wisconsin; Wyoming.
     * Replaces NGVD29 height (ftUS) (CRS code 5702).
     */
    public const EPSG_NAVD88_HEIGHT_FTUS = 'urn:ogc:def:crs:EPSG::6360';

    /**
     * NG-L height
     * Extent: Luxembourg.
     */
    public const EPSG_NG_L_HEIGHT = 'urn:ogc:def:crs:EPSG::5774';

    /**
     * NGC 1948 height
     * Extent: France - Corsica onshore.
     * Replaced by IGN78 height (CRS code 5721).
     */
    public const EPSG_NGC_1948_HEIGHT = 'urn:ogc:def:crs:EPSG::5791';

    /**
     * NGF Lallemand height
     * Extent: France - mainland onshore.
     * Generally but not entirely replaced by NGF IGN69 height (CRS code 5720).
     */
    public const EPSG_NGF_LALLEMAND_HEIGHT = 'urn:ogc:def:crs:EPSG::5719';

    /**
     * NGF-IGN69 height
     * Extent: France - mainland onshore.
     * Generally but not entirely replaces NGF Lallemand height (CRS code 5719).
     */
    public const EPSG_NGF_IGN69_HEIGHT = 'urn:ogc:def:crs:EPSG::5720';

    /**
     * NGF-IGN78 height
     * Extent: France - Corsica onshore.
     * Replaces NGC 1948 height (CRS code 5791).
     */
    public const EPSG_NGF_IGN78_HEIGHT = 'urn:ogc:def:crs:EPSG::5721';

    /**
     * NGG1977 height
     * Extent: French Guiana - onshore.
     */
    public const EPSG_NGG1977_HEIGHT = 'urn:ogc:def:crs:EPSG::5755';

    /**
     * NGNC08 height
     * Extent: New Caledonia - Belep, Grande Terre, Ile des Pins, Loyalty Islands (Lifou, Mare, Ouvea).
     * On Grande Terre replaces NGNC69 (CRS code 5753).
     */
    public const EPSG_NGNC08_HEIGHT = 'urn:ogc:def:crs:EPSG::9351';

    /**
     * NGNC69 height
     * Extent: New Caledonia - Grande Terre.
     * Replaced by NGNC08 height (CRS code 9351).
     */
    public const EPSG_NGNC69_HEIGHT = 'urn:ogc:def:crs:EPSG::5753';

    /**
     * NGPF height
     * Extent: French Polynesia - Society Islands - Bora Bora, Huahine, Maupiti, Moorea, Raiatea, Tahaa and Tahiti.
     * The collection of heterogeneous vertical coordinate reference systems throughout the Society Islands of French
     * Polynesia.
     */
    public const EPSG_NGPF_HEIGHT = 'urn:ogc:def:crs:EPSG::5600';

    /**
     * NGVD29 depth (ftUS)
     * Extent: United States (USA) - CONUS onshore - Alabama; Arizona; Arkansas; California; Colorado; Connecticut;
     * Delaware; Florida; Georgia; Idaho; Illinois; Indiana; Iowa; Kansas; Kentucky; Louisiana; Maine; Maryland;
     * Massachusetts; Michigan; Minnesota; Mississippi; Missouri; Montana; Nebraska; Nevada; New Hampshire; New Jersey;
     * New Mexico; New York; North Carolina; North Dakota; Ohio; Oklahoma; Oregon; Pennsylvania; Rhode Island; South
     * Carolina; South Dakota; Tennessee; Texas; Utah; Vermont; Virginia; Washington; West Virginia; Wisconsin;
     * Wyoming.
     * Replaced by NAVD88 depth (ftUS) (CRS code 6358).
     */
    public const EPSG_NGVD29_DEPTH_FTUS = 'urn:ogc:def:crs:EPSG::6359';

    /**
     * NGVD29 height (ftUS)
     * Extent: United States (USA) - CONUS onshore - Alabama; Arizona; Arkansas; California; Colorado; Connecticut;
     * Delaware; Florida; Georgia; Idaho; Illinois; Indiana; Iowa; Kansas; Kentucky; Louisiana; Maine; Maryland;
     * Massachusetts; Michigan; Minnesota; Mississippi; Missouri; Montana; Nebraska; Nevada; New Hampshire; New Jersey;
     * New Mexico; New York; North Carolina; North Dakota; Ohio; Oklahoma; Oregon; Pennsylvania; Rhode Island; South
     * Carolina; South Dakota; Tennessee; Texas; Utah; Vermont; Virginia; Washington; West Virginia; Wisconsin;
     * Wyoming.
     * Replaced by NAVD88 height (ftUS) (CRS code 6360).
     */
    public const EPSG_NGVD29_HEIGHT_FTUS = 'urn:ogc:def:crs:EPSG::5702';

    /**
     * NGVD29 height (m)
     * Extent: United States (USA) - CONUS onshore - Alabama; Arizona; Arkansas; California; Colorado; Connecticut;
     * Delaware; Florida; Georgia; Idaho; Illinois; Indiana; Iowa; Kansas; Kentucky; Louisiana; Maine; Maryland;
     * Massachusetts; Michigan; Minnesota; Mississippi; Missouri; Montana; Nebraska; Nevada; New Hampshire; New Jersey;
     * New Mexico; New York; North Carolina; North Dakota; Ohio; Oklahoma; Oregon; Pennsylvania; Rhode Island; South
     * Carolina; South Dakota; Tennessee; Texas; Utah; Vermont; Virginia; Washington; West Virginia; Wisconsin;
     * Wyoming.
     * System defined by IOGP to allow transformation of heights to and from NGVD29. See CRS code 5702 for system in US
     * survey feet in actual use.
     */
    public const EPSG_NGVD29_HEIGHT_M = 'urn:ogc:def:crs:EPSG::7968';

    /**
     * NMVD03 height
     * Extent: Northern Mariana Islands - onshore - Rota, Saipan and Tinian.
     * Replaces all earlier vertical CRSs on these islands.
     */
    public const EPSG_NMVD03_HEIGHT = 'urn:ogc:def:crs:EPSG::6640';

    /**
     * NN2000 height
     * Extent: Norway - onshore.
     * Replaces NN54 height (CRS code 5776).
     */
    public const EPSG_NN2000_HEIGHT = 'urn:ogc:def:crs:EPSG::5941';

    /**
     * NN54 height
     * Extent: Norway - onshore.
     * Replaced by NN2000 height (CRS code 5941).
     */
    public const EPSG_NN54_HEIGHT = 'urn:ogc:def:crs:EPSG::5776';

    /**
     * NVD 1992 height
     * Extent: Bangladesh - onshore.
     * Replaces PWD Datum.
     */
    public const EPSG_NVD_1992_HEIGHT = 'urn:ogc:def:crs:EPSG::9681';

    /**
     * NZVD2009 height
     * Extent: New Zealand - onshore and offshore. Includes Antipodes Islands, Auckland Islands, Bounty Islands,
     * Chatham Islands, Cambell Island, Kermadec Islands, Raoul Island and Snares Islands.
     * Replaced by NZVD2016 from 2016-06-27.
     */
    public const EPSG_NZVD2009_HEIGHT = 'urn:ogc:def:crs:EPSG::4440';

    /**
     * NZVD2016 height
     * Extent: New Zealand - onshore and offshore. Includes Antipodes Islands, Auckland Islands, Bounty Islands,
     * Chatham Islands, Cambell Island, Kermadec Islands, Raoul Island and Snares Islands.
     * Normal-orthometric heights. Replaces NZVD2009 height (CRS code 4440).
     */
    public const EPSG_NZVD2016_HEIGHT = 'urn:ogc:def:crs:EPSG::7839';

    /**
     * Napier 1962 height
     * Extent: New Zealand - North Island - Hawkes Bay meridional circuit and Napier vertical crs area.
     */
    public const EPSG_NAPIER_1962_HEIGHT = 'urn:ogc:def:crs:EPSG::5765';

    /**
     * Nelson 1955 height
     * Extent: New Zealand - South Island - north of approximately 42°20'S - Nelson vertical CRS area.
     */
    public const EPSG_NELSON_1955_HEIGHT = 'urn:ogc:def:crs:EPSG::5766';

    /**
     * North Rona height
     * Extent: United Kingdom (UK) - Great Britain - Scotland - North Rona onshore.
     * Replaced by ODN (Offshore) height (CRS code 7707) in 2016.
     */
    public const EPSG_NORTH_RONA_HEIGHT = 'urn:ogc:def:crs:EPSG::5745';

    /**
     * ODN (Offshore) height
     * Extent: United Kingdom (UK) - offshore between 2km from shore and boundary of UKCS within 49°46'N to 61°01'N
     * and 7°33'W to 3°33'E.
     * Defined through OSGM geoid model (transformation code 7713). Replaces Fair Isle height, Flannan Isles height,
     * Foula height, North Rona height, St Kilda height and Sule Skerry height (CRS codes 5741, 5748, 5743, 5745, 5747
     * and 5744) from 2016.
     */
    public const EPSG_ODN_OFFSHORE_HEIGHT = 'urn:ogc:def:crs:EPSG::7707';

    /**
     * ODN Orkney height
     * Extent: United Kingdom (UK) - Great Britain - Scotland - Orkney Islands onshore.
     */
    public const EPSG_ODN_ORKNEY_HEIGHT = 'urn:ogc:def:crs:EPSG::5740';

    /**
     * ODN height
     * Extent: United Kingdom (UK) - Great Britain onshore - England and Wales - mainland; Scotland - mainland and
     * Inner Hebrides.
     */
    public const EPSG_ODN_HEIGHT = 'urn:ogc:def:crs:EPSG::5701';

    /**
     * One Tree Point 1964 height
     * Extent: New Zealand - North Island - One Tree Point vertical CRS area.
     */
    public const EPSG_ONE_TREE_POINT_1964_HEIGHT = 'urn:ogc:def:crs:EPSG::5767';

    /**
     * Ostend height
     * Extent: Belgium - onshore.
     * No gravity corrections applied.
     */
    public const EPSG_OSTEND_HEIGHT = 'urn:ogc:def:crs:EPSG::5710';

    /**
     * PHD93 height
     * Extent: Oman - onshore. Includes Musandam and the Kuria Muria (Al Hallaniyah) islands.
     * Replaces Fahud Height Datum height (CRS code 5725) from 1993.
     */
    public const EPSG_PHD93_HEIGHT = 'urn:ogc:def:crs:EPSG::5724';

    /**
     * PNG08 height
     * Extent: Papua New Guinea - between 0°N and 12°S and 140°E and 158°E - onshore and offshore.
     * PNG08 height = PNG94 ellipsoidal height - value of geoid undulation derived by bilinear interpolation of PNG08
     * geoid model (see transformation code 7655).
     */
    public const EPSG_PNG08_HEIGHT = 'urn:ogc:def:crs:EPSG::7447';

    /**
     * POM08 height
     * Extent: Papua New Guinea - onshore - Gulf province east of 144°24'E, Central province and National Capital
     * District.
     * POM08 height = WGS 84 ellipsoid height - value of geoid undulation derived by bilinear interpolation of EGM2008
     * geoid model - 0.93m = EGM2008 height - 0.93m. See CRS code 3855 and transformation codes 3858 and 3859.
     */
    public const EPSG_POM08_HEIGHT = 'urn:ogc:def:crs:EPSG::7841';

    /**
     * POM96 height
     * Extent: Papua New Guinea - onshore - Gulf province east of 144°24'E, Central province and National Capital
     * District.
     * POM96 height = WGS 84 ellipsoid height - value of geoid undulation derived by bilinear interpolation of EGM96
     * geoid model - 1.58m = EGM96 height - 1.58m. See CRS code 5773 and transformation code 10084.
     */
    public const EPSG_POM96_HEIGHT = 'urn:ogc:def:crs:EPSG::7832';

    /**
     * PRVD02 height
     * Extent: Puerto Rico - onshore.
     * Replaces all earlier vertical CRSs for Puerto Rico.
     */
    public const EPSG_PRVD02_HEIGHT = 'urn:ogc:def:crs:EPSG::6641';

    /**
     * Pago Pago 2020 height
     * Extent: American Samoa - Tutuila island.
     * Replaces ASVD02 height (CRS 6643) from March 2020.
     */
    public const EPSG_PAGO_PAGO_2020_HEIGHT = 'urn:ogc:def:crs:EPSG::9675';

    /**
     * Piraeus height
     * Extent: Greece - onshore.
     */
    public const EPSG_PIRAEUS_HEIGHT = 'urn:ogc:def:crs:EPSG::5716';

    /**
     * Ponta Delgada height
     * Extent: Portugal - eastern Azores - Sao Miguel island onshore.
     */
    public const EPSG_PONTA_DELGADA_HEIGHT = 'urn:ogc:def:crs:EPSG::6187';

    /**
     * Poolbeg height (ft(Br36))
     * Extent: Ireland - onshore. United Kingdom (UK) - Northern Ireland (Ulster) - onshore.
     * Topographic mapping before 1956 in Northern Ireland and 1970 in the Republic of Ireland. Replaced by Belfast
     * Lough height and Malin Head height (CRS codes 5732 and 5731).
     */
    public const EPSG_POOLBEG_HEIGHT_FT_BR36 = 'urn:ogc:def:crs:EPSG::5754';

    /**
     * Poolbeg height (m)
     * Extent: Ireland - onshore. United Kingdom (UK) - Northern Ireland (Ulster) - onshore.
     * CRS in metres used only for transformation of heights referenced to Poolbeg height (ft). For CRS in feet see
     * code 5754.
     */
    public const EPSG_POOLBEG_HEIGHT_M = 'urn:ogc:def:crs:EPSG::7962';

    /**
     * RH00 height
     * Extent: Sweden - onshore.
     * Replaced by RH70 (CRS code 5718).
     */
    public const EPSG_RH00_HEIGHT = 'urn:ogc:def:crs:EPSG::5615';

    /**
     * RH2000 height
     * Extent: Sweden - onshore.
     * Replaces RH70 (CRS code 5718) from 2005.
     */
    public const EPSG_RH2000_HEIGHT = 'urn:ogc:def:crs:EPSG::5613';

    /**
     * RH70 height
     * Extent: Sweden - onshore.
     * Replaces RH00 (CRS code 5615). Replaced by RH2000 (CRS code 5613) from 2005.
     */
    public const EPSG_RH70_HEIGHT = 'urn:ogc:def:crs:EPSG::5718';

    /**
     * Raiatea SAU 2001 height
     * Extent: French Polynesia - Society Islands - Raiatea.
     * Part of NGPF (CRS code 5600).
     */
    public const EPSG_RAIATEA_SAU_2001_HEIGHT = 'urn:ogc:def:crs:EPSG::5603';

    /**
     * Ras Ghumays height
     * Extent: United Arab Emirates (UAE) - Abu Dhabi onshore.
     */
    public const EPSG_RAS_GHUMAYS_HEIGHT = 'urn:ogc:def:crs:EPSG::5843';

    /**
     * Reunion 1989 height
     * Extent: Reunion - onshore.
     */
    public const EPSG_REUNION_1989_HEIGHT = 'urn:ogc:def:crs:EPSG::5758';

    /**
     * SA LLD height
     * Extent: South Africa - mainland onshore.
     */
    public const EPSG_SA_LLD_HEIGHT = 'urn:ogc:def:crs:EPSG::9279';

    /**
     * SHD height
     * Extent: Singapore - onshore and offshore.
     */
    public const EPSG_SHD_HEIGHT = 'urn:ogc:def:crs:EPSG::6916';

    /**
     * SHVD2015 height
     * Extent: St Helena, Ascension and Tristan da Cunha - St Helena Island - onshore.
     * Replaces Jamestown 1971 height and Tritan 2011 height (CRS codes 7888-89) from 2016.
     */
    public const EPSG_SHVD2015_HEIGHT = 'urn:ogc:def:crs:EPSG::7890';

    /**
     * SLVD height
     * Extent: Sri Lanka - onshore.
     */
    public const EPSG_SLVD_HEIGHT = 'urn:ogc:def:crs:EPSG::5237';

    /**
     * SNN76 height
     * Extent: Germany - states of former East Germany - Berlin, Brandenburg; Mecklenburg-Vorpommern; Sachsen;
     * Sachsen-Anhalt; Thuringen.
     * Replaced by DNNH92 height (CRS code 5783).
     */
    public const EPSG_SNN76_HEIGHT = 'urn:ogc:def:crs:EPSG::5785';

    /**
     * SRB_VRS12 height
     * Extent: Serbia including Vojvodina.
     * Replaces Trieste height (CRS code 5195) in Serbia from 2012-03.
     */
    public const EPSG_SRB_VRS12_HEIGHT = 'urn:ogc:def:crs:EPSG::8691';

    /**
     * SRVN16 height
     * Extent: Argentina - onshore.
     * Orthometric heights. Replaces SRVN71.
     */
    public const EPSG_SRVN16_HEIGHT = 'urn:ogc:def:crs:EPSG::9255';

    /**
     * SVS2000 height
     * Extent: Slovenia - onshore.
     * Replaces Trieste height (CRS code 5195) in Slovenia from 2000. Replaced by SVS2010 (CRS code 8690) from 2019-01.
     */
    public const EPSG_SVS2000_HEIGHT = 'urn:ogc:def:crs:EPSG::5779';

    /**
     * SVS2010 height
     * Extent: Slovenia - onshore.
     * Replaces SVS2000 height (CRS code 5779) from 2019-01.
     */
    public const EPSG_SVS2010_HEIGHT = 'urn:ogc:def:crs:EPSG::8690';

    /**
     * Santa Cruz da Graciosa height
     * Extent: Portugal - central Azores - Graciosa island onshore.
     */
    public const EPSG_SANTA_CRUZ_DA_GRACIOSA_HEIGHT = 'urn:ogc:def:crs:EPSG::6183';

    /**
     * Santa Cruz das Flores height
     * Extent: Portugal - western Azores onshore - Flores, Corvo.
     */
    public const EPSG_SANTA_CRUZ_DAS_FLORES_HEIGHT = 'urn:ogc:def:crs:EPSG::6185';

    /**
     * St. Helena Tritan 2011 height
     * Extent: St Helena, Ascension and Tristan da Cunha - St Helena Island - onshore.
     * Replaced by SHVD2016 (CRS code 7890) from 2016.
     */
    public const EPSG_ST_HELENA_TRITAN_2011_HEIGHT = 'urn:ogc:def:crs:EPSG::7889';

    /**
     * St. Kilda height
     * Extent: United Kingdom (UK) - Great Britain - Scotland - St Kilda onshore.
     * Replaced by ODN (Offshore) height (CRS code 7707) in 2016.
     */
    public const EPSG_ST_KILDA_HEIGHT = 'urn:ogc:def:crs:EPSG::5747';

    /**
     * St. Marys height
     * Extent: United Kingdom (UK) - Great Britain - England - Isles of Scilly onshore.
     */
    public const EPSG_ST_MARYS_HEIGHT = 'urn:ogc:def:crs:EPSG::5749';

    /**
     * Stewart Island 1977 height
     * Extent: New Zealand - Stewart Island.
     */
    public const EPSG_STEWART_ISLAND_1977_HEIGHT = 'urn:ogc:def:crs:EPSG::5772';

    /**
     * Stornoway height
     * Extent: United Kingdom (UK) - Great Britain - Scotland - Outer Hebrides onshore.
     */
    public const EPSG_STORNOWAY_HEIGHT = 'urn:ogc:def:crs:EPSG::5746';

    /**
     * Sule Skerry height
     * Extent: United Kingdom (UK) - Great Britain - Scotland - Sule Skerry onshore.
     * Replaced by ODN (Offshore) height (CRS code 7707) in 2016.
     */
    public const EPSG_SULE_SKERRY_HEIGHT = 'urn:ogc:def:crs:EPSG::5744';

    /**
     * TWVD 2001 height
     * Extent: Taiwan, Republic of China - onshore - Taiwan Island.
     * Replaces TWVD79.
     */
    public const EPSG_TWVD_2001_HEIGHT = 'urn:ogc:def:crs:EPSG::8904';

    /**
     * Tahaa SAU 2001 height
     * Extent: French Polynesia - Society Islands - Tahaa.
     * Part of NGPF (CRS code 5600).
     */
    public const EPSG_TAHAA_SAU_2001_HEIGHT = 'urn:ogc:def:crs:EPSG::5606';

    /**
     * Taranaki 1970 height
     * Extent: New Zealand - North Island - Taranaki vertical CRS area.
     */
    public const EPSG_TARANAKI_1970_HEIGHT = 'urn:ogc:def:crs:EPSG::5769';

    /**
     * Tararu 1952 height
     * Extent: New Zealand - North Island - Tararu vertical CRS area.
     */
    public const EPSG_TARARU_1952_HEIGHT = 'urn:ogc:def:crs:EPSG::5768';

    /**
     * Tenerife height
     * Extent: Spain - Canary Islands - Tenerife onshore.
     */
    public const EPSG_TENERIFE_HEIGHT = 'urn:ogc:def:crs:EPSG::9398';

    /**
     * Trieste height
     * Extent: Bosnia and Herzegovina; Croatia - onshore; Kosovo; Montenegro - onshore; North Macedonia; Serbia;
     * Slovenia - onshore.
     * In Croatia replaced by HVRS71 height (CRS code 5610). In Serbia replaced by SRB_VRS12 height (CRS code 8691). In
     * Slovenia replaced by SVS2000 height (CRS code 5779).
     */
    public const EPSG_TRIESTE_HEIGHT = 'urn:ogc:def:crs:EPSG::5195';

    /**
     * Tutuila 1962 height
     * Extent: American Samoa - Tutuila island.
     * Replaced by ASVD02 height (CRS code 6643).
     */
    public const EPSG_TUTUILA_1962_HEIGHT = 'urn:ogc:def:crs:EPSG::6638';

    /**
     * VIVD09 height
     * Extent: US Virgin Islands - onshore - St Croix, St John, and St Thomas.
     * Replaces all earlier vertical CRSs on these islands.
     */
    public const EPSG_VIVD09_HEIGHT = 'urn:ogc:def:crs:EPSG::6642';

    /**
     * Vienna height
     * Extent: Austria - Vienna city state.
     * Defined from GHA height (EPSG:5778) using a vertical offset (Wiener Null is 156.68m above GHA height).
     */
    public const EPSG_VIENNA_HEIGHT = 'urn:ogc:def:crs:EPSG::8881';

    /**
     * Wellington 1953 height
     * Extent: New Zealand - North Island - Wellington vertical CRS area.
     */
    public const EPSG_WELLINGTON_1953_HEIGHT = 'urn:ogc:def:crs:EPSG::5770';

    /**
     * Yellow Sea 1956 height
     * Extent: China - onshore.
     * Replaced by Yellow Sea 1985 height (CRS code 5737).
     */
    public const EPSG_YELLOW_SEA_1956_HEIGHT = 'urn:ogc:def:crs:EPSG::5736';

    /**
     * Yellow Sea 1985 height
     * Extent: China - onshore.
     * Replaces Yellow Sea 1956 height (CRS code 5736).
     */
    public const EPSG_YELLOW_SEA_1985_HEIGHT = 'urn:ogc:def:crs:EPSG::5737';

    protected static array $sridData = [
        'urn:ogc:def:crs:EPSG::3855' => [
            'name' => 'EGM2008 height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::1027',
            'bounding_box' => [[-180.0, -90.0], [-180.0, 90.0], [180.0, 90.0], [180.0, -90.0]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::3886' => [
            'name' => 'Fao 1979 height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::1028',
            'bounding_box' => [[38.79, 29.06], [38.79, 37.39], [48.61, 37.39], [48.61, 29.06]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::3900' => [
            'name' => 'N2000 height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::1030',
            'bounding_box' => [[19.24, 59.75], [19.24, 70.09], [31.59, 70.09], [31.59, 59.75]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4440' => [
            'name' => 'NZVD2009 height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::1039',
            'bounding_box' => [[160.6, -55.95], [160.6, -25.88], [-171.2, -25.88], [-171.2, -55.95]],
            'bounding_box_crosses_antimeridian' => true,
        ],
        'urn:ogc:def:crs:EPSG::4458' => [
            'name' => 'Dunedin-Bluff 1960 height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::1040',
            'bounding_box' => [[166.37, -46.73], [166.37, -44.52], [169.95, -44.52], [169.95, -46.73]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5193' => [
            'name' => 'Incheon height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::1049',
            'bounding_box' => [[125.75, 33.96], [125.75, 38.64], [129.65, 38.64], [129.65, 33.96]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5195' => [
            'name' => 'Trieste height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::1050',
            'bounding_box' => [[13.383471488953, 40.855888366699], [13.383471488953, 46.876247406006], [23.030969619751, 46.876247406006], [23.030969619751, 40.855888366699]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5214' => [
            'name' => 'Genoa height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::1051',
            'bounding_box' => [[6.62, 36.59], [6.62, 47.1], [18.58, 47.1], [18.58, 36.59]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5237' => [
            'name' => 'SLVD height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::1054',
            'bounding_box' => [[79.64, 5.86], [79.64, 9.880000000000001], [81.95, 9.880000000000001], [81.95, 5.86]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5317' => [
            'name' => 'FVR09 height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::1059',
            'bounding_box' => [[-7.49, 61.33], [-7.49, 62.41], [-6.33, 62.41], [-6.33, 61.33]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5336' => [
            'name' => 'Black Sea depth',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6498',
            'datum' => 'urn:ogc:def:datum:EPSG::5134',
            'bounding_box' => [[39.99, 41.04], [39.99, 43.59], [46.72, 43.59], [46.72, 41.04]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5597' => [
            'name' => 'FCSVR10 height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::1079',
            'bounding_box' => [[11.17, 54.42], [11.17, 54.76], [11.51, 54.76], [11.51, 54.42]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5600' => [
            'name' => 'NGPF height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::5195',
            'bounding_box' => [[-152.39, -17.93], [-152.39, -16.17], [-149.09, -16.17], [-149.09, -17.93]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5601' => [
            'name' => 'IGN 1966 height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::5196',
            'bounding_box' => [[-149.7, -17.93], [-149.7, -17.44], [-149.09, -17.44], [-149.09, -17.93]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5602' => [
            'name' => 'Moorea SAU 1981 height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::5197',
            'bounding_box' => [[-150.0, -17.63], [-150.0, -17.41], [-149.73, -17.41], [-149.73, -17.63]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5603' => [
            'name' => 'Raiatea SAU 2001 height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::5198',
            'bounding_box' => [[-151.55, -16.96], [-151.55, -16.68], [-151.3, -16.68], [-151.3, -16.96]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5604' => [
            'name' => 'Maupiti SAU 2001 height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::5199',
            'bounding_box' => [[-152.39, -16.57], [-152.39, -16.34], [-152.14, -16.34], [-152.14, -16.57]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5605' => [
            'name' => 'Huahine SAU 2001 height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::5200',
            'bounding_box' => [[-151.11, -16.87], [-151.11, -16.63], [-150.89, -16.63], [-150.89, -16.87]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5606' => [
            'name' => 'Tahaa SAU 2001 height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::5201',
            'bounding_box' => [[-151.63, -16.72], [-151.63, -16.5], [-151.36, -16.5], [-151.36, -16.72]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5607' => [
            'name' => 'Bora Bora SAU 2001 height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::5202',
            'bounding_box' => [[-151.86, -16.62], [-151.86, -16.39], [-151.61, -16.39], [-151.61, -16.62]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5608' => [
            'name' => 'IGLD 1955 height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::5204',
            'bounding_box' => [[-93.17, 40.99], [-93.17, 52.22], [-54.75, 52.22], [-54.75, 40.99]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5609' => [
            'name' => 'IGLD 1985 height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::5205',
            'bounding_box' => [[-93.17, 40.99], [-93.17, 52.22], [-54.75, 52.22], [-54.75, 40.99]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5610' => [
            'name' => 'HVRS71 height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::5207',
            'bounding_box' => [[13.43, 42.34], [13.43, 46.54], [19.43, 46.54], [19.43, 42.34]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5611' => [
            'name' => 'Caspian height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::5106',
            'bounding_box' => [[46.95, 37.35], [46.95, 46.97], [53.93, 46.97], [53.93, 37.35]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5612' => [
            'name' => 'Baltic 1977 depth',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6498',
            'datum' => 'urn:ogc:def:datum:EPSG::5105',
            'bounding_box' => [[19.57, 35.14], [19.57, 81.91], [-168.97, 81.91], [-168.97, 35.14]],
            'bounding_box_crosses_antimeridian' => true,
        ],
        'urn:ogc:def:crs:EPSG::5613' => [
            'name' => 'RH2000 height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::5208',
            'bounding_box' => [[10.93, 55.28], [10.93, 69.06999999999999], [24.17, 69.06999999999999], [24.17, 55.28]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5614' => [
            'name' => 'KOC WD depth (ft)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6495',
            'datum' => 'urn:ogc:def:datum:EPSG::5187',
            'bounding_box' => [[46.54, 28.53], [46.54, 30.09], [48.48, 30.09], [48.48, 28.53]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5615' => [
            'name' => 'RH00 height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::5209',
            'bounding_box' => [[10.93, 55.28], [10.93, 69.06999999999999], [24.17, 69.06999999999999], [24.17, 55.28]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5616' => [
            'name' => 'IGN 1988 LS height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::5210',
            'bounding_box' => [[-61.68, 15.8], [-61.68, 15.94], [-61.52, 15.94], [-61.52, 15.8]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5617' => [
            'name' => 'IGN 1988 MG height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::5211',
            'bounding_box' => [[-61.39, 15.8], [-61.39, 16.05], [-61.13, 16.05], [-61.13, 15.8]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5618' => [
            'name' => 'IGN 1992 LD height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::5212',
            'bounding_box' => [[-61.13, 16.26], [-61.13, 16.38], [-60.97, 16.38], [-60.97, 16.26]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5619' => [
            'name' => 'IGN 1988 SB height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::5213',
            'bounding_box' => [[-62.92, 17.82], [-62.92, 17.98], [-62.73, 17.98], [-62.73, 17.82]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5620' => [
            'name' => 'IGN 1988 SM height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::5214',
            'bounding_box' => [[-63.21, 18.01], [-63.21, 18.17], [-62.96, 18.17], [-62.96, 18.01]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5621' => [
            'name' => 'EVRF2007 height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::5215',
            'bounding_box' => [[-9.56, 35.95], [-9.56, 71.20999999999999], [31.59, 71.20999999999999], [31.59, 35.95]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5701' => [
            'name' => 'ODN height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::5101',
            'bounding_box' => [[-7.06, 49.93], [-7.06, 58.71], [1.8, 58.71], [1.8, 49.93]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5702' => [
            'name' => 'NGVD29 height (ftUS)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6497',
            'datum' => 'urn:ogc:def:datum:EPSG::5102',
            'bounding_box' => [[-124.79, 24.41], [-124.79, 49.38], [-66.91, 49.38], [-66.91, 24.41]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5703' => [
            'name' => 'NAVD88 height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::5103',
            'bounding_box' => [[172.42871284485, 14.515261702227], [172.42871284485, 71.396817302681], [-66.91700744628901, 71.396817302681], [-66.91700744628901, 14.515261702227]],
            'bounding_box_crosses_antimeridian' => true,
        ],
        'urn:ogc:def:crs:EPSG::5705' => [
            'name' => 'Baltic 1977 height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::5105',
            'bounding_box' => [[19.57, 35.14], [19.57, 81.91], [-168.97, 81.91], [-168.97, 35.14]],
            'bounding_box_crosses_antimeridian' => true,
        ],
        'urn:ogc:def:crs:EPSG::5706' => [
            'name' => 'Caspian depth',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6498',
            'datum' => 'urn:ogc:def:datum:EPSG::5106',
            'bounding_box' => [[46.95, 37.35], [46.95, 46.97], [53.93, 46.97], [53.93, 37.35]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5709' => [
            'name' => 'NAP height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::5109',
            'bounding_box' => [[2.53, 50.75], [2.53, 55.77], [7.22, 55.77], [7.22, 50.75]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5710' => [
            'name' => 'Ostend height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::5110',
            'bounding_box' => [[2.5, 49.5], [2.5, 51.51], [6.4, 51.51], [6.4, 49.5]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5711' => [
            'name' => 'AHD height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::5111',
            'bounding_box' => [[96.76000000000001, -43.7], [96.76000000000001, -9.859999999999999], [153.69, -9.859999999999999], [153.69, -43.7]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5712' => [
            'name' => 'AHD (Tasmania) height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::5112',
            'bounding_box' => [[144.55, -43.7], [144.55, -40.24], [148.44, -40.24], [148.44, -43.7]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5713' => [
            'name' => 'CGVD28 height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::5114',
            'bounding_box' => [[-141.01, 41.67], [-141.01, 69.8], [-59.73, 69.8], [-59.73, 41.67]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5714' => [
            'name' => 'MSL height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::5100',
            'bounding_box' => [[-180.0, -90.0], [-180.0, 90.0], [180.0, 90.0], [180.0, -90.0]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5715' => [
            'name' => 'MSL depth',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6498',
            'datum' => 'urn:ogc:def:datum:EPSG::5100',
            'bounding_box' => [[-180.0, -90.0], [-180.0, 90.0], [180.0, 90.0], [180.0, -90.0]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5716' => [
            'name' => 'Piraeus height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::5115',
            'bounding_box' => [[19.57, 34.88], [19.57, 41.75], [28.3, 41.75], [28.3, 34.88]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5717' => [
            'name' => 'N60 height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::5116',
            'bounding_box' => [[19.24, 59.75], [19.24, 70.09], [31.59, 70.09], [31.59, 59.75]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5718' => [
            'name' => 'RH70 height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::5117',
            'bounding_box' => [[10.93, 55.28], [10.93, 69.06999999999999], [24.17, 69.06999999999999], [24.17, 55.28]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5719' => [
            'name' => 'NGF Lallemand height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::5118',
            'bounding_box' => [[-4.87, 42.33], [-4.87, 51.14], [8.23, 51.14], [8.23, 42.33]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5720' => [
            'name' => 'NGF-IGN69 height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::5119',
            'bounding_box' => [[-4.87, 42.33], [-4.87, 51.14], [8.23, 51.14], [8.23, 42.33]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5721' => [
            'name' => 'NGF-IGN78 height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::5120',
            'bounding_box' => [[8.5, 41.31], [8.5, 43.07], [9.630000000000001, 43.07], [9.630000000000001, 41.31]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5722' => [
            'name' => 'Maputo height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::5121',
            'bounding_box' => [[30.21, -26.87], [30.21, -10.42], [40.9, -10.42], [40.9, -26.87]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5723' => [
            'name' => 'JSLD69 height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::5122',
            'bounding_box' => [[129.3, 30.94], [129.3, 41.58], [142.14, 41.58], [142.14, 30.94]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5724' => [
            'name' => 'PHD93 height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::5123',
            'bounding_box' => [[51.99, 16.59], [51.99, 26.58], [59.91, 26.58], [59.91, 16.59]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5725' => [
            'name' => 'Fahud HD height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::5124',
            'bounding_box' => [[51.99, 16.59], [51.99, 26.42], [59.91, 26.42], [59.91, 16.59]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5726' => [
            'name' => 'Ha Tien 1960 height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::5125',
            'bounding_box' => [[102.14, 8.33], [102.14, 23.4], [109.53, 23.4], [109.53, 8.33]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5727' => [
            'name' => 'Hon Dau 1992 height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::5126',
            'bounding_box' => [[102.14, 8.33], [102.14, 23.4], [109.53, 23.4], [109.53, 8.33]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5728' => [
            'name' => 'LN02 height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::5127',
            'bounding_box' => [[5.96, 45.82], [5.96, 47.81], [10.49, 47.81], [10.49, 45.82]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5729' => [
            'name' => 'LHN95 height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::5128',
            'bounding_box' => [[5.96, 45.82], [5.96, 47.81], [10.49, 47.81], [10.49, 45.82]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5730' => [
            'name' => 'EVRF2000 height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::5129',
            'bounding_box' => [[-9.56, 35.95], [-9.56, 71.20999999999999], [31.59, 71.20999999999999], [31.59, 35.95]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5731' => [
            'name' => 'Malin Head height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::5130',
            'bounding_box' => [[-10.56, 51.39], [-10.56, 55.43], [-5.34, 55.43], [-5.34, 51.39]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5732' => [
            'name' => 'Belfast height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::5131',
            'bounding_box' => [[-8.18, 53.96], [-8.18, 55.36], [-5.34, 55.36], [-5.34, 53.96]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5733' => [
            'name' => 'DNN height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::5132',
            'bounding_box' => [[8.0, 54.51], [8.0, 57.8], [15.24, 57.8], [15.24, 54.51]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5734' => [
            'name' => 'AIOC95 depth',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6498',
            'datum' => 'urn:ogc:def:datum:EPSG::5133',
            'bounding_box' => [[48.66, 37.89], [48.66, 42.59], [51.73, 42.59], [51.73, 37.89]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5735' => [
            'name' => 'Black Sea height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::5134',
            'bounding_box' => [[39.99, 41.04], [39.99, 43.59], [46.72, 43.59], [46.72, 41.04]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5736' => [
            'name' => 'Yellow Sea 1956 height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::5104',
            'bounding_box' => [[73.62, 18.11], [73.62, 53.56], [134.77, 53.56], [134.77, 18.11]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5737' => [
            'name' => 'Yellow Sea 1985 height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::5137',
            'bounding_box' => [[73.62, 18.11], [73.62, 53.56], [134.77, 53.56], [134.77, 18.11]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5738' => [
            'name' => 'HKPD height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::5135',
            'bounding_box' => [[113.82, 22.19], [113.82, 22.56], [114.39, 22.56], [114.39, 22.19]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5739' => [
            'name' => 'HKCD depth',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6498',
            'datum' => 'urn:ogc:def:datum:EPSG::5136',
            'bounding_box' => [[113.76, 22.13], [113.76, 22.58], [114.51, 22.58], [114.51, 22.13]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5740' => [
            'name' => 'ODN Orkney height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::5138',
            'bounding_box' => [[-3.48, 58.72], [-3.48, 59.41], [-2.34, 59.41], [-2.34, 58.72]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5741' => [
            'name' => 'Fair Isle height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::5139',
            'bounding_box' => [[-1.76, 59.45], [-1.76, 59.6], [-1.5, 59.6], [-1.5, 59.45]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5742' => [
            'name' => 'Lerwick height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::5140',
            'bounding_box' => [[-1.78, 59.83], [-1.78, 60.87], [-0.67, 60.87], [-0.67, 59.83]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5743' => [
            'name' => 'Foula height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::5141',
            'bounding_box' => [[-2.21, 60.06], [-2.21, 60.2], [-1.95, 60.2], [-1.95, 60.06]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5744' => [
            'name' => 'Sule Skerry height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::5142',
            'bounding_box' => [[-4.5, 59.05], [-4.5, 59.13], [-4.3, 59.13], [-4.3, 59.05]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5745' => [
            'name' => 'North Rona height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::5143',
            'bounding_box' => [[-5.92, 59.07], [-5.92, 59.19], [-5.73, 59.19], [-5.73, 59.07]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5746' => [
            'name' => 'Stornoway height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::5144',
            'bounding_box' => [[-7.72, 56.76], [-7.72, 58.54], [-6.1, 58.54], [-6.1, 56.76]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5747' => [
            'name' => 'St. Kilda height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::5145',
            'bounding_box' => [[-8.74, 57.74], [-8.74, 57.93], [-8.41, 57.93], [-8.41, 57.74]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5748' => [
            'name' => 'Flannan Isles height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::5146',
            'bounding_box' => [[-7.75, 58.21], [-7.75, 58.35], [-7.46, 58.35], [-7.46, 58.21]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5749' => [
            'name' => 'St. Marys height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::5147',
            'bounding_box' => [[-6.41, 49.86], [-6.41, 49.99], [-6.23, 49.99], [-6.23, 49.86]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5750' => [
            'name' => 'Douglas height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::5148',
            'bounding_box' => [[-4.87, 54.02], [-4.87, 54.44], [-4.27, 54.44], [-4.27, 54.02]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5751' => [
            'name' => 'Fao height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::5149',
            'bounding_box' => [[44.3, 29.06], [44.3, 33.5], [51.06, 33.5], [51.06, 29.06]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5752' => [
            'name' => 'Bandar Abbas height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::5150',
            'bounding_box' => [[44.03, 25.02], [44.03, 39.78], [63.34, 39.78], [63.34, 25.02]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5753' => [
            'name' => 'NGNC69 height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::5151',
            'bounding_box' => [[163.92, -22.45], [163.92, -20.03], [167.09, -20.03], [167.09, -22.45]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5754' => [
            'name' => 'Poolbeg height (ft(Br36))',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6496',
            'datum' => 'urn:ogc:def:datum:EPSG::5152',
            'bounding_box' => [[-10.56, 51.39], [-10.56, 55.43], [-5.34, 55.43], [-5.34, 51.39]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5755' => [
            'name' => 'NGG1977 height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::5153',
            'bounding_box' => [[-54.61, 2.11], [-54.61, 5.81], [-51.61, 5.81], [-51.61, 2.11]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5756' => [
            'name' => 'Martinique 1987 height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::5154',
            'bounding_box' => [[-61.29, 14.35], [-61.29, 14.93], [-60.76, 14.93], [-60.76, 14.35]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5757' => [
            'name' => 'Guadeloupe 1988 height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::5155',
            'bounding_box' => [[-61.85, 15.88], [-61.85, 16.55], [-61.15, 16.55], [-61.15, 15.88]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5758' => [
            'name' => 'Reunion 1989 height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::5156',
            'bounding_box' => [[55.16, -21.42], [55.16, -20.81], [55.91, -20.81], [55.91, -21.42]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5759' => [
            'name' => 'Auckland 1946 height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::5157',
            'bounding_box' => [[174.0, -37.67], [174.0, -36.12], [176.17, -36.12], [176.17, -37.67]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5760' => [
            'name' => 'Bluff 1955 height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::5158',
            'bounding_box' => [[168.01, -46.71], [168.01, -46.26], [168.86, -46.26], [168.86, -46.71]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5761' => [
            'name' => 'Dunedin 1958 height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::5159',
            'bounding_box' => [[167.73, -46.4], [167.73, -43.82], [171.28, -43.82], [171.28, -46.4]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5762' => [
            'name' => 'Gisborne 1926 height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::5160',
            'bounding_box' => [[176.41, -39.04], [176.41, -37.49], [178.63, -37.49], [178.63, -39.04]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5763' => [
            'name' => 'Lyttelton 1937 height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::5161',
            'bounding_box' => [[168.95, -44.92], [168.95, -41.6], [173.77, -41.6], [173.77, -44.92]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5764' => [
            'name' => 'Moturiki 1953 height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::5162',
            'bounding_box' => [[174.57, -40.59], [174.57, -37.52], [177.26, -37.52], [177.26, -40.59]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5765' => [
            'name' => 'Napier 1962 height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::5163',
            'bounding_box' => [[175.8, -40.57], [175.8, -38.87], [178.07, -38.87], [178.07, -40.57]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5766' => [
            'name' => 'Nelson 1955 height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::5164',
            'bounding_box' => [[171.82, -42.44], [171.82, -40.44], [174.46, -40.44], [174.46, -42.44]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5767' => [
            'name' => 'One Tree Point 1964 height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::5165',
            'bounding_box' => [[172.61, -36.41], [172.61, -34.36], [174.83, -34.36], [174.83, -36.41]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5768' => [
            'name' => 'Tararu 1952 height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::5166',
            'bounding_box' => [[175.44, -37.21], [175.44, -36.78], [175.99, -36.78], [175.99, -37.21]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5769' => [
            'name' => 'Taranaki 1970 height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::5167',
            'bounding_box' => [[173.68, -39.92], [173.68, -38.41], [174.95, -38.41], [174.95, -39.92]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5770' => [
            'name' => 'Wellington 1953 height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::5168',
            'bounding_box' => [[174.52, -41.67], [174.52, -40.12], [176.56, -40.12], [176.56, -41.67]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5771' => [
            'name' => 'Chatham Island 1959 height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::5169',
            'bounding_box' => [[-176.92, -44.18], [-176.92, -43.67], [-176.2, -43.67], [-176.2, -44.18]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5772' => [
            'name' => 'Stewart Island 1977 height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::5170',
            'bounding_box' => [[167.29, -47.33], [167.29, -46.63], [168.34, -46.63], [168.34, -47.33]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5773' => [
            'name' => 'EGM96 height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::5171',
            'bounding_box' => [[-180.0, -90.0], [-180.0, 90.0], [180.0, 90.0], [180.0, -90.0]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5774' => [
            'name' => 'NG-L height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::5172',
            'bounding_box' => [[5.73, 49.44], [5.73, 50.19], [6.53, 50.19], [6.53, 49.44]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5775' => [
            'name' => 'Antalya height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::5173',
            'bounding_box' => [[25.62, 35.81], [25.62, 42.15], [44.83, 42.15], [44.83, 35.81]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5776' => [
            'name' => 'NN54 height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::5174',
            'bounding_box' => [[4.68, 57.93], [4.68, 71.20999999999999], [31.22, 71.20999999999999], [31.22, 57.93]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5777' => [
            'name' => 'Durres height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::5175',
            'bounding_box' => [[19.22, 39.64], [19.22, 42.67], [21.06, 42.67], [21.06, 39.64]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5778' => [
            'name' => 'GHA height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::5176',
            'bounding_box' => [[9.529999999999999, 46.4], [9.529999999999999, 49.02], [17.17, 49.02], [17.17, 46.4]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5779' => [
            'name' => 'SVS2000 height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::5177',
            'bounding_box' => [[13.38, 45.42], [13.38, 46.88], [16.61, 46.88], [16.61, 45.42]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5780' => [
            'name' => 'Cascais height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::5178',
            'bounding_box' => [[-9.56, 36.95], [-9.56, 42.16], [-6.19, 42.16], [-6.19, 36.95]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5781' => [
            'name' => 'Constanta height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::5179',
            'bounding_box' => [[20.26, 43.62], [20.26, 48.27], [29.74, 48.27], [29.74, 43.62]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5782' => [
            'name' => 'Alicante height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::5180',
            'bounding_box' => [[-9.369999999999999, 35.95], [-9.369999999999999, 43.82], [3.39, 43.82], [3.39, 35.95]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5783' => [
            'name' => 'DHHN92 height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::5181',
            'bounding_box' => [[5.86, 47.27], [5.86, 55.09], [15.04, 55.09], [15.04, 47.27]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5784' => [
            'name' => 'DHHN85 height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::5182',
            'bounding_box' => [[5.87, 47.27], [5.87, 55.09], [13.84, 55.09], [13.84, 47.27]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5785' => [
            'name' => 'SNN76 height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::5183',
            'bounding_box' => [[9.92, 50.2], [9.92, 54.74], [15.04, 54.74], [15.04, 50.2]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5786' => [
            'name' => 'Baltic 1982 height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::5184',
            'bounding_box' => [[22.36, 41.24], [22.36, 44.23], [28.68, 44.23], [28.68, 41.24]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5787' => [
            'name' => 'EOMA 1980 height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::5185',
            'bounding_box' => [[16.11, 45.74], [16.11, 48.58], [22.9, 48.58], [22.9, 45.74]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5788' => [
            'name' => 'Kuwait PWD height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::5186',
            'bounding_box' => [[46.54, 28.53], [46.54, 30.09], [48.48, 30.09], [48.48, 28.53]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5789' => [
            'name' => 'KOC WD depth',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6498',
            'datum' => 'urn:ogc:def:datum:EPSG::5187',
            'bounding_box' => [[46.54, 28.53], [46.54, 30.09], [48.48, 30.09], [48.48, 28.53]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5790' => [
            'name' => 'KOC CD height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::5188',
            'bounding_box' => [[46.54, 28.53], [46.54, 30.09], [48.48, 30.09], [48.48, 28.53]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5791' => [
            'name' => 'NGC 1948 height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::5189',
            'bounding_box' => [[8.5, 41.31], [8.5, 43.07], [9.630000000000001, 43.07], [9.630000000000001, 41.31]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5792' => [
            'name' => 'Danger 1950 height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::5190',
            'bounding_box' => [[-56.48, 46.69], [-56.48, 47.19], [-56.07, 47.19], [-56.07, 46.69]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5793' => [
            'name' => 'Mayotte 1950 height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::5191',
            'bounding_box' => [[44.98, -13.05], [44.98, -12.61], [45.35, -12.61], [45.35, -13.05]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5794' => [
            'name' => 'Martinique 1955 height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::5192',
            'bounding_box' => [[-61.29, 14.35], [-61.29, 14.93], [-60.76, 14.93], [-60.76, 14.35]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5795' => [
            'name' => 'Guadeloupe 1951 height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::5193',
            'bounding_box' => [[-61.85, 15.88], [-61.85, 16.55], [-61.15, 16.55], [-61.15, 15.88]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5796' => [
            'name' => 'Lagos 1955 height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::5194',
            'bounding_box' => [[2.69, 4.22], [2.69, 13.9], [14.65, 13.9], [14.65, 4.22]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5797' => [
            'name' => 'AIOC95 height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::5133',
            'bounding_box' => [[48.66, 37.89], [48.66, 42.59], [51.73, 42.59], [51.73, 37.89]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5798' => [
            'name' => 'EGM84 height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::5203',
            'bounding_box' => [[-180.0, -90.0], [-180.0, 90.0], [180.0, 90.0], [180.0, -90.0]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5799' => [
            'name' => 'DVR90 height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::5206',
            'bounding_box' => [[8.0, 54.51], [8.0, 57.8], [15.24, 57.8], [15.24, 54.51]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5829' => [
            'name' => 'Instantaneous Water Level height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::5113',
            'bounding_box' => [[-180.0, -90.0], [-180.0, 90.0], [180.0, 90.0], [180.0, -90.0]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5831' => [
            'name' => 'Instantaneous Water Level depth',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6498',
            'datum' => 'urn:ogc:def:datum:EPSG::5113',
            'bounding_box' => [[-180.0, -90.0], [-180.0, 90.0], [180.0, 90.0], [180.0, -90.0]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5843' => [
            'name' => 'Ras Ghumays height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::1146',
            'bounding_box' => [[51.56, 22.63], [51.56, 24.95], [56.03, 24.95], [56.03, 22.63]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5861' => [
            'name' => 'LAT depth',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6498',
            'datum' => 'urn:ogc:def:datum:EPSG::1080',
            'bounding_box' => [[-180.0, -90.0], [-180.0, 90.0], [180.0, 90.0], [180.0, -90.0]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5862' => [
            'name' => 'LLWLT depth',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6498',
            'datum' => 'urn:ogc:def:datum:EPSG::1083',
            'bounding_box' => [[-180.0, -90.0], [-180.0, 90.0], [180.0, 90.0], [180.0, -90.0]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5863' => [
            'name' => 'ISLW depth',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6498',
            'datum' => 'urn:ogc:def:datum:EPSG::1085',
            'bounding_box' => [[-180.0, -90.0], [-180.0, 90.0], [180.0, 90.0], [180.0, -90.0]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5864' => [
            'name' => 'MLLWS depth',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6498',
            'datum' => 'urn:ogc:def:datum:EPSG::1086',
            'bounding_box' => [[-180.0, -90.0], [-180.0, 90.0], [180.0, 90.0], [180.0, -90.0]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5865' => [
            'name' => 'MLWS depth',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6498',
            'datum' => 'urn:ogc:def:datum:EPSG::1087',
            'bounding_box' => [[-180.0, -90.0], [-180.0, 90.0], [180.0, 90.0], [180.0, -90.0]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5866' => [
            'name' => 'MLLW depth',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6498',
            'datum' => 'urn:ogc:def:datum:EPSG::1089',
            'bounding_box' => [[-180.0, -90.0], [-180.0, 90.0], [180.0, 90.0], [180.0, -90.0]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5867' => [
            'name' => 'MLW depth',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6498',
            'datum' => 'urn:ogc:def:datum:EPSG::1091',
            'bounding_box' => [[-180.0, -90.0], [-180.0, 90.0], [180.0, 90.0], [180.0, -90.0]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5868' => [
            'name' => 'MHW height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::1092',
            'bounding_box' => [[-180.0, -90.0], [-180.0, 90.0], [180.0, 90.0], [180.0, -90.0]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5869' => [
            'name' => 'MHHW height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::1090',
            'bounding_box' => [[-180.0, -90.0], [-180.0, 90.0], [180.0, 90.0], [180.0, -90.0]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5870' => [
            'name' => 'MHWS height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::1088',
            'bounding_box' => [[-180.0, -90.0], [-180.0, 90.0], [180.0, 90.0], [180.0, -90.0]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5871' => [
            'name' => 'HHWLT height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::1084',
            'bounding_box' => [[-180.0, -90.0], [-180.0, 90.0], [180.0, 90.0], [180.0, -90.0]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5872' => [
            'name' => 'HAT height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::1082',
            'bounding_box' => [[-180.0, -90.0], [-180.0, 90.0], [180.0, 90.0], [180.0, -90.0]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5873' => [
            'name' => 'Low Water depth',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6498',
            'datum' => 'urn:ogc:def:datum:EPSG::1093',
            'bounding_box' => [[-180.0, -90.0], [-180.0, 90.0], [180.0, 90.0], [180.0, -90.0]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5874' => [
            'name' => 'High Water height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::1094',
            'bounding_box' => [[-180.0, -90.0], [-180.0, 90.0], [180.0, 90.0], [180.0, -90.0]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5941' => [
            'name' => 'NN2000 height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::1096',
            'bounding_box' => [[4.68, 57.93], [4.68, 71.20999999999999], [31.22, 71.20999999999999], [31.22, 57.93]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::6130' => [
            'name' => 'GCVD54 height (ft)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::1030',
            'datum' => 'urn:ogc:def:datum:EPSG::1097',
            'bounding_box' => [[-81.45999999999999, 19.21], [-81.45999999999999, 19.41], [-81.04000000000001, 19.41], [-81.04000000000001, 19.21]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::6131' => [
            'name' => 'LCVD61 height (ft)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::1030',
            'datum' => 'urn:ogc:def:datum:EPSG::1098',
            'bounding_box' => [[-80.14, 19.63], [-80.14, 19.74], [-79.93000000000001, 19.74], [-79.93000000000001, 19.63]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::6132' => [
            'name' => 'CBVD61 height (ft)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::1030',
            'datum' => 'urn:ogc:def:datum:EPSG::1099',
            'bounding_box' => [[-79.92, 19.66], [-79.92, 19.78], [-79.69, 19.78], [-79.69, 19.66]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::6178' => [
            'name' => 'Cais da Pontinha - Funchal height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::1101',
            'bounding_box' => [[-17.31, 32.35], [-17.31, 32.93], [-16.4, 32.93], [-16.4, 32.35]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::6179' => [
            'name' => 'Cais da Vila - Porto Santo height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::1102',
            'bounding_box' => [[-16.44, 32.96], [-16.44, 33.15], [-16.23, 33.15], [-16.23, 32.96]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::6180' => [
            'name' => 'Cais das Velas height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::1103',
            'bounding_box' => [[-28.37, 38.48], [-28.37, 38.8], [-27.71, 38.8], [-27.71, 38.48]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::6181' => [
            'name' => 'Horta height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::1104',
            'bounding_box' => [[-28.9, 38.46], [-28.9, 38.7], [-28.54, 38.7], [-28.54, 38.46]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::6182' => [
            'name' => 'Cais da Madalena height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::1105',
            'bounding_box' => [[-28.61, 38.32], [-28.61, 38.61], [-27.98, 38.61], [-27.98, 38.32]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::6183' => [
            'name' => 'Santa Cruz da Graciosa height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::1106',
            'bounding_box' => [[-28.13, 38.97], [-28.13, 39.14], [-27.88, 39.14], [-27.88, 38.97]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::6184' => [
            'name' => 'Cais da Figueirinha - Angra do Heroismo height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::1107',
            'bounding_box' => [[-27.44, 38.57], [-27.44, 38.86], [-26.97, 38.86], [-26.97, 38.57]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::6185' => [
            'name' => 'Santa Cruz das Flores height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::1108',
            'bounding_box' => [[-31.34, 39.3], [-31.34, 39.77], [-31.02, 39.77], [-31.02, 39.3]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::6186' => [
            'name' => 'Cais da Vila do Porto height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::1109',
            'bounding_box' => [[-25.26, 36.87], [-25.26, 37.34], [-24.72, 37.34], [-24.72, 36.87]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::6187' => [
            'name' => 'Ponta Delgada height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::1110',
            'bounding_box' => [[-25.92, 37.65], [-25.92, 37.96], [-25.08, 37.96], [-25.08, 37.65]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::6357' => [
            'name' => 'NAVD88 depth',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6498',
            'datum' => 'urn:ogc:def:datum:EPSG::5103',
            'bounding_box' => [[172.42871284485, 14.515261702227], [172.42871284485, 71.396817302681], [-66.91700744628901, 71.396817302681], [-66.91700744628901, 14.515261702227]],
            'bounding_box_crosses_antimeridian' => true,
        ],
        'urn:ogc:def:crs:EPSG::6358' => [
            'name' => 'NAVD88 depth (ftUS)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::1043',
            'datum' => 'urn:ogc:def:datum:EPSG::5103',
            'bounding_box' => [[-168.25266039145, 24.410230723243], [-168.25266039145, 71.396817302681], [-66.91700744628901, 71.396817302681], [-66.91700744628901, 24.410230723243]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::6359' => [
            'name' => 'NGVD29 depth (ftUS)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::1043',
            'datum' => 'urn:ogc:def:datum:EPSG::5102',
            'bounding_box' => [[-124.79, 24.41], [-124.79, 49.38], [-66.91, 49.38], [-66.91, 24.41]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::6360' => [
            'name' => 'NAVD88 height (ftUS)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6497',
            'datum' => 'urn:ogc:def:datum:EPSG::5103',
            'bounding_box' => [[-168.25266039145, 24.410230723243], [-168.25266039145, 71.396817302681], [-66.91700744628901, 71.396817302681], [-66.91700744628901, 24.410230723243]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::6638' => [
            'name' => 'Tutuila 1962 height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::1121',
            'bounding_box' => [[-170.88, -14.43], [-170.88, -14.2], [-170.51, -14.2], [-170.51, -14.43]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::6639' => [
            'name' => 'Guam 1963 height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::1122',
            'bounding_box' => [[144.58, 13.18], [144.58, 13.7], [145.01, 13.7], [145.01, 13.18]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::6640' => [
            'name' => 'NMVD03 height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::1119',
            'bounding_box' => [[145.06, 14.06], [145.06, 15.35], [145.89, 15.35], [145.89, 14.06]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::6641' => [
            'name' => 'PRVD02 height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::1123',
            'bounding_box' => [[-67.97, 17.87], [-67.97, 18.57], [-65.19, 18.57], [-65.19, 17.87]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::6642' => [
            'name' => 'VIVD09 height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::1124',
            'bounding_box' => [[-65.09, 17.62], [-65.09, 18.44], [-64.51000000000001, 18.44], [-64.51000000000001, 17.62]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::6643' => [
            'name' => 'ASVD02 height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::1125',
            'bounding_box' => [[-170.88, -14.43], [-170.88, -14.2], [-170.51, -14.2], [-170.51, -14.43]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::6644' => [
            'name' => 'GUVD04 height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::1126',
            'bounding_box' => [[144.58, 13.18], [144.58, 13.7], [145.01, 13.7], [145.01, 13.18]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::6647' => [
            'name' => 'CGVD2013(CGG2013) height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::1127',
            'bounding_box' => [[-141.01, 40.04], [-141.01, 86.45999999999999], [-47.74, 86.45999999999999], [-47.74, 40.04]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::6693' => [
            'name' => 'JSLD72 height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::1129',
            'bounding_box' => [[139.7, 41.34], [139.7, 45.54], [145.87, 45.54], [145.87, 41.34]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::6694' => [
            'name' => 'JGD2000 (vertical) height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::1130',
            'bounding_box' => [[129.3, 30.94], [129.3, 45.54], [145.87, 45.54], [145.87, 30.94]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::6695' => [
            'name' => 'JGD2011 (vertical) height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::1131',
            'bounding_box' => [[129.3, 30.94], [129.3, 45.54], [145.87, 45.54], [145.87, 30.94]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::6916' => [
            'name' => 'SHD height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::1140',
            'bounding_box' => [[103.59, 1.13], [103.59, 1.47], [104.07, 1.47], [104.07, 1.13]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::7446' => [
            'name' => 'Famagusta 1960 height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::1148',
            'bounding_box' => [[32.2, 34.59], [32.2, 35.74], [34.65, 35.74], [34.65, 34.59]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::7447' => [
            'name' => 'PNG08 height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::1149',
            'bounding_box' => [[140.0, -12.0], [140.0, 0.01], [158.01, 0.01], [158.01, -12.0]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::7651' => [
            'name' => 'Kumul 34 height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::1150',
            'bounding_box' => [[142.24, -8.279999999999999], [142.24, -5.59], [144.75, -5.59], [144.75, -8.279999999999999]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::7652' => [
            'name' => 'Kiunga height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::1151',
            'bounding_box' => [[140.85, -9.35], [140.85, -5.0], [144.01, -5.0], [144.01, -9.35]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::7699' => [
            'name' => 'DHHN12 height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::1161',
            'bounding_box' => [[5.86, 47.27], [5.86, 55.09], [15.04, 55.09], [15.04, 47.27]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::7700' => [
            'name' => 'Latvia 2000 height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::1162',
            'bounding_box' => [[20.87, 55.67], [20.87, 58.09], [28.24, 58.09], [28.24, 55.67]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::7707' => [
            'name' => 'ODN (Offshore) height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::1164',
            'bounding_box' => [[-9.0, 49.75], [-9.0, 61.01], [2.01, 61.01], [2.01, 49.75]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::7832' => [
            'name' => 'POM96 height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::1171',
            'bounding_box' => [[144.4, -10.42], [144.4, -6.67], [149.67, -6.67], [149.67, -10.42]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::7837' => [
            'name' => 'DHHN2016 height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::1170',
            'bounding_box' => [[5.86, 47.27], [5.86, 55.09], [15.04, 55.09], [15.04, 47.27]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::7839' => [
            'name' => 'NZVD2016 height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::1169',
            'bounding_box' => [[160.6, -55.95], [160.6, -25.88], [-171.2, -25.88], [-171.2, -55.95]],
            'bounding_box_crosses_antimeridian' => true,
        ],
        'urn:ogc:def:crs:EPSG::7841' => [
            'name' => 'POM08 height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::1172',
            'bounding_box' => [[144.4, -10.42], [144.4, -6.67], [149.67, -6.67], [149.67, -10.42]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::7888' => [
            'name' => 'Jamestown 1971 height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::1175',
            'bounding_box' => [[-5.85, -16.08], [-5.85, -15.85], [-5.58, -15.85], [-5.58, -16.08]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::7889' => [
            'name' => 'St. Helena Tritan 2011 height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::1176',
            'bounding_box' => [[-5.85, -16.08], [-5.85, -15.85], [-5.58, -15.85], [-5.58, -16.08]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::7890' => [
            'name' => 'SHVD2015 height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::1177',
            'bounding_box' => [[-5.85, -16.08], [-5.85, -15.85], [-5.58, -15.85], [-5.58, -16.08]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::7962' => [
            'name' => 'Poolbeg height (m)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::5152',
            'bounding_box' => [[-10.56, 51.39], [-10.56, 55.43], [-5.34, 55.43], [-5.34, 51.39]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::7968' => [
            'name' => 'NGVD29 height (m)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::5102',
            'bounding_box' => [[-124.79, 24.41], [-124.79, 49.38], [-66.91, 49.38], [-66.91, 24.41]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::7976' => [
            'name' => 'HKPD depth',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6498',
            'datum' => 'urn:ogc:def:datum:EPSG::5135',
            'bounding_box' => [[113.82, 22.19], [113.82, 22.56], [114.39, 22.56], [114.39, 22.19]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::7979' => [
            'name' => 'KOC WD height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::5187',
            'bounding_box' => [[46.54, 28.53], [46.54, 30.09], [48.48, 30.09], [48.48, 28.53]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8050' => [
            'name' => 'MSL height (ft)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::1030',
            'datum' => 'urn:ogc:def:datum:EPSG::5100',
            'bounding_box' => [[-180.0, -90.0], [-180.0, 90.0], [180.0, 90.0], [180.0, -90.0]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8051' => [
            'name' => 'MSL depth (ft)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6495',
            'datum' => 'urn:ogc:def:datum:EPSG::5100',
            'bounding_box' => [[-180.0, -90.0], [-180.0, 90.0], [180.0, 90.0], [180.0, -90.0]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8052' => [
            'name' => 'MSL height (ftUS)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6497',
            'datum' => 'urn:ogc:def:datum:EPSG::5100',
            'bounding_box' => [[167.65, 15.56], [167.65, 74.70999999999999], [-65.69, 74.70999999999999], [-65.69, 15.56]],
            'bounding_box_crosses_antimeridian' => true,
        ],
        'urn:ogc:def:crs:EPSG::8053' => [
            'name' => 'MSL depth (ftUS)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::1043',
            'datum' => 'urn:ogc:def:datum:EPSG::5100',
            'bounding_box' => [[167.65, 15.56], [167.65, 74.70999999999999], [-65.69, 74.70999999999999], [-65.69, 15.56]],
            'bounding_box_crosses_antimeridian' => true,
        ],
        'urn:ogc:def:crs:EPSG::8089' => [
            'name' => 'ISH2004 height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::1190',
            'bounding_box' => [[-24.66, 63.34], [-24.66, 66.59], [-13.38, 66.59], [-13.38, 63.34]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8228' => [
            'name' => 'NAVD88 height (ft)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::1030',
            'datum' => 'urn:ogc:def:datum:EPSG::5103',
            'bounding_box' => [[-124.6, 31.33], [-124.6, 49.01], [-78.52, 49.01], [-78.52, 31.33]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8266' => [
            'name' => 'GVR2000 height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::1199',
            'bounding_box' => [[-75.0, 59.0], [-75.0, 84.01000000000001], [-10.0, 84.01000000000001], [-10.0, 59.0]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8267' => [
            'name' => 'GVR2016 height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::1200',
            'bounding_box' => [[-75.0, 58.0], [-75.0, 85.01000000000001], [-6.99, 85.01000000000001], [-6.99, 58.0]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8357' => [
            'name' => 'Baltic 1957 height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::1202',
            'bounding_box' => [[12.09, 47.73], [12.09, 51.06], [22.56, 51.06], [22.56, 47.73]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8358' => [
            'name' => 'Baltic 1957 depth',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6498',
            'datum' => 'urn:ogc:def:datum:EPSG::1202',
            'bounding_box' => [[12.09, 47.73], [12.09, 51.06], [22.56, 51.06], [22.56, 47.73]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8434' => [
            'name' => 'Macao height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::1210',
            'bounding_box' => [[113.52, 22.06], [113.52, 22.23], [113.68, 22.23], [113.68, 22.06]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8675' => [
            'name' => 'N43 height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::1213',
            'bounding_box' => [[20.95, 59.75], [20.95, 66.73], [31.59, 66.73], [31.59, 59.75]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8690' => [
            'name' => 'SVS2010 height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::1215',
            'bounding_box' => [[13.38, 45.42], [13.38, 46.88], [16.61, 46.88], [16.61, 45.42]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8691' => [
            'name' => 'SRB_VRS12 height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::1216',
            'bounding_box' => [[18.81702041626, 42.232494354248], [18.81702041626, 46.18111038208], [23.004997253418, 46.18111038208], [23.004997253418, 42.232494354248]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8841' => [
            'name' => 'MVGC height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::1219',
            'bounding_box' => [[34.51, 16.37], [34.51, 32.16], [55.67, 32.16], [55.67, 16.37]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8881' => [
            'name' => 'Vienna height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::1267',
            'bounding_box' => [[16.18, 48.12], [16.18, 48.34], [16.59, 48.34], [16.59, 48.12]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8904' => [
            'name' => 'TWVD 2001 height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::1224',
            'bounding_box' => [[119.99, 21.87], [119.99, 25.34], [122.06, 25.34], [122.06, 21.87]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8911' => [
            'name' => 'DACR52 height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::1226',
            'bounding_box' => [[-85.97, 7.98], [-85.97, 11.22], [-82.53, 11.22], [-82.53, 7.98]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9130' => [
            'name' => 'IGN 2008 LD height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::1250',
            'bounding_box' => [[-61.13, 16.26], [-61.13, 16.38], [-60.97, 16.38], [-60.97, 16.26]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9245' => [
            'name' => 'CGVD2013(CGG2013a) height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::1256',
            'bounding_box' => [[-141.01, 40.04], [-141.01, 86.45999999999999], [-47.74, 86.45999999999999], [-47.74, 40.04]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9255' => [
            'name' => 'SRVN16 height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::1260',
            'bounding_box' => [[-73.59, -55.11], [-73.59, -21.78], [-53.65, -21.78], [-53.65, -55.11]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9274' => [
            'name' => 'EVRF2000 Austria height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::1261',
            'bounding_box' => [[9.529999999999999, 46.4], [9.529999999999999, 49.02], [17.17, 49.02], [17.17, 46.4]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9279' => [
            'name' => 'SA LLD height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::1262',
            'bounding_box' => [[16.45, -34.88], [16.45, -22.13], [32.95, -22.13], [32.95, -34.88]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9287' => [
            'name' => 'LAT NL depth',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6498',
            'datum' => 'urn:ogc:def:datum:EPSG::1290',
            'bounding_box' => [[2.53, 51.45], [2.53, 55.77], [6.41, 55.77], [6.41, 51.45]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9288' => [
            'name' => 'MSL NL depth',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6498',
            'datum' => 'urn:ogc:def:datum:EPSG::1270',
            'bounding_box' => [[2.53, 51.45], [2.53, 55.77], [6.41, 55.77], [6.41, 51.45]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9303' => [
            'name' => 'HS2-VRF height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::1265',
            'bounding_box' => [[-2.75, 51.45], [-2.75, 53.3], [0.0, 53.3], [0.0, 51.45]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9335' => [
            'name' => 'KSA-VRF14 height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::1269',
            'bounding_box' => [[34.51, 16.37], [34.51, 32.16], [55.67, 32.16], [55.67, 16.37]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9351' => [
            'name' => 'NGNC08 height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::1255',
            'bounding_box' => [[163.54, -22.73], [163.54, -19.5], [168.19, -19.5], [168.19, -22.73]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9389' => [
            'name' => 'EVRF2019 height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::1274',
            'bounding_box' => [[-9.56, 35.95], [-9.56, 77.06999999999999], [69.15000000000001, 77.06999999999999], [69.15000000000001, 35.95]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9390' => [
            'name' => 'EVRF2019 mean-tide height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::1287',
            'bounding_box' => [[-9.56, 35.95], [-9.56, 77.06999999999999], [69.15000000000001, 77.06999999999999], [69.15000000000001, 35.95]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9392' => [
            'name' => 'Mallorca height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::1275',
            'bounding_box' => [[2.23, 39.07], [2.23, 40.02], [3.55, 40.02], [3.55, 39.07]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9393' => [
            'name' => 'Menorca height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::1276',
            'bounding_box' => [[3.73, 39.75], [3.73, 40.15], [4.39, 40.15], [4.39, 39.75]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9394' => [
            'name' => 'Ibiza height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::1277',
            'bounding_box' => [[1.12, 38.59], [1.12, 39.17], [1.68, 39.17], [1.68, 38.59]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9395' => [
            'name' => 'Lanzarote height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::1278',
            'bounding_box' => [[-13.95, 28.78], [-13.95, 29.47], [-13.37, 29.47], [-13.37, 28.78]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9396' => [
            'name' => 'Fuerteventura height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::1279',
            'bounding_box' => [[-14.58, 27.99], [-14.58, 28.81], [-13.75, 28.81], [-13.75, 27.99]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9397' => [
            'name' => 'Gran Canaria height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::1280',
            'bounding_box' => [[-15.88, 27.68], [-15.88, 28.23], [-15.31, 28.23], [-15.31, 27.68]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9398' => [
            'name' => 'Tenerife height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::1281',
            'bounding_box' => [[-16.96, 27.93], [-16.96, 28.63], [-16.08, 28.63], [-16.08, 27.93]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9399' => [
            'name' => 'La Gomera height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::1282',
            'bounding_box' => [[-17.39, 27.95], [-17.39, 28.26], [-17.03, 28.26], [-17.03, 27.95]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9400' => [
            'name' => 'La Palma height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::1283',
            'bounding_box' => [[-18.06, 28.4], [-18.06, 28.9], [-17.66, 28.9], [-17.66, 28.4]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9401' => [
            'name' => 'El Hierro height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::1284',
            'bounding_box' => [[-18.22, 27.58], [-18.22, 27.9], [-17.83, 27.9], [-17.83, 27.58]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9402' => [
            'name' => 'Ceuta 2 height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::1285',
            'bounding_box' => [[-5.4, 35.82], [-5.4, 35.97], [-5.24, 35.97], [-5.24, 35.82]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9451' => [
            'name' => 'BI height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::1288',
            'bounding_box' => [[-9.0, 49.75], [-9.0, 61.01], [2.01, 61.01], [2.01, 49.75]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9458' => [
            'name' => 'AVWS height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::1292',
            'bounding_box' => [[93.41, -60.56], [93.41, -8.470000000000001], [173.35, -8.470000000000001], [173.35, -60.56]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9471' => [
            'name' => 'INAGeoid2020 height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::1294',
            'bounding_box' => [[92.01000000000001, -13.95], [92.01000000000001, 7.79], [141.46, 7.79], [141.46, -13.95]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9663' => [
            'name' => 'EH2000 height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::1298',
            'bounding_box' => [[21.74, 57.52], [21.74, 59.75], [28.2, 59.75], [28.2, 57.52]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9666' => [
            'name' => 'LAS07 height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::1299',
            'bounding_box' => [[20.86, 53.89], [20.86, 56.45], [26.82, 56.45], [26.82, 53.89]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9669' => [
            'name' => 'BGS2005 height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::1300',
            'bounding_box' => [[22.36, 41.24], [22.36, 44.23], [28.68, 44.23], [28.68, 41.24]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9672' => [
            'name' => 'CD Norway depth',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6498',
            'datum' => 'urn:ogc:def:datum:EPSG::1301',
            'bounding_box' => [[-13.63, 56.087], [-13.63, 84.723], [38.0, 84.723], [38.0, 56.087]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9675' => [
            'name' => 'Pago Pago 2020 height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::1302',
            'bounding_box' => [[-170.88, -14.43], [-170.88, -14.2], [-170.51, -14.2], [-170.51, -14.43]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9681' => [
            'name' => 'NVD 1992 height',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6499',
            'datum' => 'urn:ogc:def:datum:EPSG::1303',
            'bounding_box' => [[88.01000000000001, 20.52], [88.01000000000001, 26.64], [92.67, 26.64], [92.67, 20.52]],
            'bounding_box_crosses_antimeridian' => false,
        ],
    ];

    private static array $cachedObjects = [];

    private static array $supportedCache = [];

    public function __construct(
        string $srid,
        CoordinateSystem $coordinateSystem,
        Datum $datum,
        GeographicPolygon $boundingBox
    ) {
        $this->srid = $srid;
        $this->coordinateSystem = $coordinateSystem;
        $this->datum = $datum;
        $this->boundingBox = $boundingBox;

        assert(count($coordinateSystem->getAxes()) === 1);
    }

    public static function fromSRID(string $srid): self
    {
        if (!isset(static::$sridData[$srid])) {
            throw new UnknownCoordinateReferenceSystemException($srid);
        }
        if (!isset(self::$cachedObjects[$srid])) {
            $data = static::$sridData[$srid];

            self::$cachedObjects[$srid] = new self(
                $srid,
                VerticalCS::fromSRID($data['coordinate_system']),
                Datum::fromSRID($data['datum']),
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
