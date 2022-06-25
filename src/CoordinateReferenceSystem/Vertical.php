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
use PHPCoord\Geometry\BoundingArea;

class Vertical extends CoordinateReferenceSystem
{
    use VerticalSRIDData;
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
     * Extent: Australia including Lord Howe Island, Macquarie Island, Ashmore and Cartier Islands, Christmas Island,
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
     * Baltic 1986 height
     * Extent: Poland - onshore.
     * Initially valid until 2019-12-31, but that extended to 2023-12-31. Will be replaced by EVRF2007-PL height (CRS
     * 9651) after 2023-12-31.
     */
    public const EPSG_BALTIC_1986_HEIGHT = 'urn:ogc:def:crs:EPSG::9650';

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
     * Extent: Georgia - onshore and offshore.
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
     * Replaces CGVD2013(CGG2013) height (CRS code 6647). CGG2013a is identical to CGG2013 except in the western sector
     * of Lake of the Woods. CGVD2013(CGG2013a) height is realized by Canadian gravimetric geoid model CGG2013a (CT
     * code 9247).
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
     * Cagliari 1956 height
     * Extent: Italy - Sardinia onshore.
     */
    public const EPSG_CAGLIARI_1956_HEIGHT = 'urn:ogc:def:crs:EPSG::9722';

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
     * Catania 1965 height
     * Extent: Italy - Sicily onshore.
     */
    public const EPSG_CATANIA_1965_HEIGHT = 'urn:ogc:def:crs:EPSG::9721';

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
     * EVRF2007-PL height
     * Extent: Poland - onshore.
     * Replaces Baltic 1986 height (CRS 9650) after 2023-12-31.
     */
    public const EPSG_EVRF2007_PL_HEIGHT = 'urn:ogc:def:crs:EPSG::9651';

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
     * GNTRANS height
     * Extent: Germany - onshore - states of Baden-Wurtemberg, Bayern, Berlin, Brandenburg, Bremen, Hamburg, Hessen,
     * Mecklenburg-Vorpommern, Niedersachsen, Nordrhein-Westfalen, Rheinland-Pfalz, Saarland, Sachsen, Sachsen-Anhalt,
     * Schleswig-Holstein, Thuringen.
     * Introduced in 2003. Replaces DB Netz use of DHHN12, SNN76, DHHN85 and DHHN92 as variously adopted by German
     * states but which DB Netz used with smoothing across boundary discontinuity. Replaced by GNTRANS2016 height (CRS
     * code 9927).
     */
    public const EPSG_GNTRANS_HEIGHT = 'urn:ogc:def:crs:EPSG::9923';

    /**
     * GNTRANS2016 height
     * Extent: Germany - onshore - states of Baden-Wurtemberg, Bayern, Berlin, Brandenburg, Bremen, Hamburg, Hessen,
     * Mecklenburg-Vorpommern, Niedersachsen, Nordrhein-Westfalen, Rheinland-Pfalz, Saarland, Sachsen, Sachsen-Anhalt,
     * Schleswig-Holstein, Thuringen.
     * Replaces GNTRANS height [also called GNTRANS2003 height] (CRS code 9923). Approximates national DHHN2016 height
     * system (CRS code 7837) to around 1cm in lowlands and 2cm in high mountains.
     */
    public const EPSG_GNTRANS2016_HEIGHT = 'urn:ogc:def:crs:EPSG::9927';

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
     * Genoa 1942 height
     * Extent: Italy - mainland (including San Marino and Vatican City State) and Sicily.
     */
    public const EPSG_GENOA_1942_HEIGHT = 'urn:ogc:def:crs:EPSG::5214';

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
     * Extent: United Kingdom (UK) - HS2 phases 1 and 2a railway corridor from London to Birmingham, Lichfield and
     * Crewe.
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
     * Referred to as 'SHOM 1953' in government regulations but confirmed by IGN as being the Mayotte 1950 system.
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
     * NG95 height
     * Extent: Luxembourg.
     */
    public const EPSG_NG95_HEIGHT = 'urn:ogc:def:crs:EPSG::5774';

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
     * SVD2006 height
     * Extent: Arctic (Norway (Svalbard) onshore and offshore) - between 81°10'N and 76°10'N.
     * Defined through the arcgp-2006-sk geoid model.
     */
    public const EPSG_SVD2006_HEIGHT = 'urn:ogc:def:crs:EPSG::20000';

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

    /**
     * @deprecated use EPSG_GENOA_1942_HEIGHT instead
     */
    public const EPSG_GENOA_HEIGHT = 'urn:ogc:def:crs:EPSG::5214';

    /**
     * @deprecated use EPSG_NG95_HEIGHT instead
     */
    public const EPSG_NG_L_HEIGHT = 'urn:ogc:def:crs:EPSG::5774';

    private static array $cachedObjects = [];

    private static array $supportedCache = [];

    public function __construct(
        string $srid,
        CoordinateSystem $coordinateSystem,
        Datum $datum,
        BoundingArea $boundingArea
    ) {
        $this->srid = $srid;
        $this->coordinateSystem = $coordinateSystem;
        $this->datum = $datum;
        $this->boundingArea = $boundingArea;

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
                BoundingArea::createFromExtentCodes($data['extent_code']),
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
