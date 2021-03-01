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
use PHPCoord\Geometry\GeographicPolygon;

class Geographic2D extends Geographic
{
    /**
     * AGD66
     * Extent: Australia - onshore and offshore. Papua New Guinea - onshore.
     */
    public const EPSG_AGD66 = 'urn:ogc:def:crs:EPSG::4202';

    /**
     * AGD84
     * Extent: Australia - Queensland, South Australia, Western Australia, federal areas offshore west of 129°E.
     * National system replacing AGD 66 but officially adopted only in Queensland, South Australia and Western
     * Australia. Replaced by GDA94.
     */
    public const EPSG_AGD84 = 'urn:ogc:def:crs:EPSG::4203';

    /**
     * ATF (Paris)
     * Extent: France - mainland onshore.
     * ProjCRS covering all mainland France based on this datum used Bonne projection. In Alsace, suspected to be an
     * extension of core network based on transformation of old German system.
     */
    public const EPSG_ATF_PARIS = 'urn:ogc:def:crs:EPSG::4901';

    /**
     * ATRF2014
     * Extent: Australia including Lord Howe Island, Macquarie Islands, Ashmore and Cartier Islands, Christmas Island,
     * Cocos (Keeling) Islands, Norfolk Island. All onshore and offshore.
     */
    public const EPSG_ATRF2014 = 'urn:ogc:def:crs:EPSG::9309';

    /**
     * ATS77
     * Extent: Canada - New Brunswick; Nova Scotia; Prince Edward Island.
     * In use from 1979. To be phased out in late 1990's.
     */
    public const EPSG_ATS77 = 'urn:ogc:def:crs:EPSG::4122';

    /**
     * AbInvA96_2020-IRF
     * Extent: UK - on or related to the A96 highway from Aberdeen to Inverness.
     * Intermediate CRS created in 2020 to assist the emulation of the ETRS89 / AbInvA96_2020 SnakeGrid projected CRS
     * through transformation ETRS89 to AbInvA96_2020-IRF (1) (code 9386) used in conjunction with the AbInvA96_2020-TM
     * map projection (code 9385).
     */
    public const EPSG_ABINVA96_2020_IRF = 'urn:ogc:def:crs:EPSG::9384';

    /**
     * Abidjan 1987
     * Extent: Côte d'Ivoire (Ivory Coast) - onshore and offshore.
     * Replaces Locodjo 1965 (EPSG code 4142).
     */
    public const EPSG_ABIDJAN_1987 = 'urn:ogc:def:crs:EPSG::4143';

    /**
     * Accra
     * Extent: Ghana - onshore and offshore.
     * Ellipsoid semi-major axis (a)=20926201 exactly Gold Coast feet.
     * Replaced by Leigon (code 4250) in 1978.
     */
    public const EPSG_ACCRA = 'urn:ogc:def:crs:EPSG::4168';

    /**
     * Aden 1925
     * Extent: Yemen - South Yemen onshore mainland.
     */
    public const EPSG_ADEN_1925 = 'urn:ogc:def:crs:EPSG::6881';

    /**
     * Adindan
     * Extent: Eritrea; Ethiopia; South Sudan; Sudan.
     * The 12th parallel traverse of 1966-70 (geogCRS Point 58, code 4620) is connected to the Blue Nile 1958 network
     * in western Sudan. This has given rise to misconceptions that the Blue Nile 1958 network is used in west Africa.
     */
    public const EPSG_ADINDAN = 'urn:ogc:def:crs:EPSG::4201';

    /**
     * Afgooye
     * Extent: Somalia - onshore.
     */
    public const EPSG_AFGOOYE = 'urn:ogc:def:crs:EPSG::4205';

    /**
     * Agadez
     * Extent: Niger.
     */
    public const EPSG_AGADEZ = 'urn:ogc:def:crs:EPSG::4206';

    /**
     * Ain el Abd
     * Extent: Bahrain, Kuwait and Saudi Arabia - onshore.
     */
    public const EPSG_AIN_EL_ABD = 'urn:ogc:def:crs:EPSG::4204';

    /**
     * Albanian 1987
     * Extent: Albania - onshore.
     * Replaced by KRGJSH-2010.
     */
    public const EPSG_ALBANIAN_1987 = 'urn:ogc:def:crs:EPSG::4191';

    /**
     * American Samoa 1962
     * Extent: American Samoa - Tutuila, Aunu'u, Ofu, Olesega and Ta'u islands.
     */
    public const EPSG_AMERICAN_SAMOA_1962 = 'urn:ogc:def:crs:EPSG::4169';

    /**
     * Amersfoort
     * Extent: Netherlands - onshore, including Waddenzee, Dutch Wadden Islands and 12-mile offshore coastal zone.
     * Use of geographic2D CRS Amersfoort (code 4289) for spatial referencing is discouraged. Use projected CRS
     * Amersfoort / RD New (code 28992).
     */
    public const EPSG_AMERSFOORT = 'urn:ogc:def:crs:EPSG::4289';

    /**
     * Ammassalik 1958
     * Extent: Greenland - Ammassalik area onshore.
     */
    public const EPSG_AMMASSALIK_1958 = 'urn:ogc:def:crs:EPSG::4196';

    /**
     * Anguilla 1957
     * Extent: Anguilla - onshore.
     */
    public const EPSG_ANGUILLA_1957 = 'urn:ogc:def:crs:EPSG::4600';

    /**
     * Antigua 1943
     * Extent: Antigua island - onshore.
     */
    public const EPSG_ANTIGUA_1943 = 'urn:ogc:def:crs:EPSG::4601';

    /**
     * Aratu
     * Extent: Brazil - offshore south and east of a line intersecting the coast at 2°55'S; onshore Tucano basin.
     */
    public const EPSG_ARATU = 'urn:ogc:def:crs:EPSG::4208';

    /**
     * Arc 1950
     * Extent: Botswana; Malawi; Zambia; Zimbabwe.
     */
    public const EPSG_ARC_1950 = 'urn:ogc:def:crs:EPSG::4209';

    /**
     * Arc 1960
     * Extent: Burundi, Kenya, Rwanda, Tanzania and Uganda.
     */
    public const EPSG_ARC_1960 = 'urn:ogc:def:crs:EPSG::4210';

    /**
     * Ascension Island 1958
     * Extent: St Helena, Ascension and Tristan da Cunha - Ascension Island - onshore.
     */
    public const EPSG_ASCENSION_ISLAND_1958 = 'urn:ogc:def:crs:EPSG::4712';

    /**
     * Astro DOS 71
     * Extent: St Helena, Ascension and Tristan da Cunha - St Helena Island - onshore.
     * Used between 1972 and 2015. Replaced by SHGD2015 (CRS code 7886) from 2015.
     */
    public const EPSG_ASTRO_DOS_71 = 'urn:ogc:def:crs:EPSG::4710';

    /**
     * Australian Antarctic
     * Extent: Antarctica between 45°E and 136°E and between 142°E and 160°E - Australian sector.
     */
    public const EPSG_AUSTRALIAN_ANTARCTIC = 'urn:ogc:def:crs:EPSG::4176';

    /**
     * Ayabelle Lighthouse
     * Extent: Djibouti - onshore and offshore.
     */
    public const EPSG_AYABELLE_LIGHTHOUSE = 'urn:ogc:def:crs:EPSG::4713';

    /**
     * Azores Central 1948
     * Extent: Portugal - central Azores onshore - Faial, Graciosa, Pico, Sao Jorge, Terceira.
     * Replaced by 1995 system (CRS code 4665).
     */
    public const EPSG_AZORES_CENTRAL_1948 = 'urn:ogc:def:crs:EPSG::4183';

    /**
     * Azores Central 1995
     * Extent: Portugal - central Azores onshore - Faial, Graciosa, Pico, Sao Jorge, Terceira.
     * Replaces 1948 system (CRS code 4183). Replaced by PTRA08 (CRS code 5013).
     */
    public const EPSG_AZORES_CENTRAL_1995 = 'urn:ogc:def:crs:EPSG::4665';

    /**
     * Azores Occidental 1939
     * Extent: Portugal - western Azores onshore - Flores, Corvo.
     * Replaced by PTRA08 (CRS code 5013).
     */
    public const EPSG_AZORES_OCCIDENTAL_1939 = 'urn:ogc:def:crs:EPSG::4182';

    /**
     * Azores Oriental 1940
     * Extent: Portugal - eastern Azores onshore - Sao Miguel, Santa Maria, Formigas.
     * Replaced by 1995 system (CRS code 4664).
     */
    public const EPSG_AZORES_ORIENTAL_1940 = 'urn:ogc:def:crs:EPSG::4184';

    /**
     * Azores Oriental 1995
     * Extent: Portugal - eastern Azores onshore - Sao Miguel, Santa Maria, Formigas.
     * Replaces 1948 system (CRS code 4184). Replaced by PTRA08 (CRS code 5013).
     */
    public const EPSG_AZORES_ORIENTAL_1995 = 'urn:ogc:def:crs:EPSG::4664';

    /**
     * BDA2000
     * Extent: Bermuda - onshore and offshore.
     * Replaces Bermuda 1957 (CRS code 4216).
     */
    public const EPSG_BDA2000 = 'urn:ogc:def:crs:EPSG::4762';

    /**
     * BGS2005
     * Extent: Bulgaria - onshore and offshore.
     * Adopted 2010-07-29. Replaces earlier systems.
     */
    public const EPSG_BGS2005 = 'urn:ogc:def:crs:EPSG::7798';

    /**
     * Barbados 1938
     * Extent: Barbados - onshore.
     */
    public const EPSG_BARBADOS_1938 = 'urn:ogc:def:crs:EPSG::4212';

    /**
     * Batavia
     * Extent: Indonesia - Bali, Java and western Sumatra onshore, offshore southern Java Sea, Madura Strait and
     * western Bali Sea.
     */
    public const EPSG_BATAVIA = 'urn:ogc:def:crs:EPSG::4211';

    /**
     * Batavia (Jakarta)
     * Extent: Indonesia - onshore - Bali, Java and western Sumatra.
     */
    public const EPSG_BATAVIA_JAKARTA = 'urn:ogc:def:crs:EPSG::4813';

    /**
     * Beduaram
     * Extent: Niger - southeast.
     */
    public const EPSG_BEDUARAM = 'urn:ogc:def:crs:EPSG::4213';

    /**
     * Beijing 1954
     * Extent: China - onshore and offshore.
     * In 1982 replaced by Xian 1980 (CRS code 4610) and New Beijing (CRS code 4555).
     */
    public const EPSG_BEIJING_1954 = 'urn:ogc:def:crs:EPSG::4214';

    /**
     * Bekaa Valley 1920
     * Extent: Lebanon - onshore.
     */
    public const EPSG_BEKAA_VALLEY_1920 = 'urn:ogc:def:crs:EPSG::6882';

    /**
     * Belge 1950
     * Extent: Belgium - onshore.
     */
    public const EPSG_BELGE_1950 = 'urn:ogc:def:crs:EPSG::4215';

    /**
     * Belge 1950 (Brussels)
     * Extent: Belgium - onshore.
     */
    public const EPSG_BELGE_1950_BRUSSELS = 'urn:ogc:def:crs:EPSG::4809';

    /**
     * Belge 1972
     * Extent: Belgium - onshore.
     */
    public const EPSG_BELGE_1972 = 'urn:ogc:def:crs:EPSG::4313';

    /**
     * Bellevue
     * Extent: Vanuatu - southern islands - Aneityum, Efate, Erromango and Tanna.
     */
    public const EPSG_BELLEVUE = 'urn:ogc:def:crs:EPSG::4714';

    /**
     * Bermuda 1957
     * Extent: Bermuda - onshore.
     * Replaced by BDA2000 (CRS code 4762).
     */
    public const EPSG_BERMUDA_1957 = 'urn:ogc:def:crs:EPSG::4216';

    /**
     * Bern 1898 (Bern)
     * Extent: Liechtenstein; Switzerland.
     */
    public const EPSG_BERN_1898_BERN = 'urn:ogc:def:crs:EPSG::4801';

    /**
     * Bern 1938
     * Extent: Liechtenstein; Switzerland.
     * Used for the geographic coordinates overprinted on topographic maps constructed on the CH1903 / LV03 projected
     * CS (code 21781).
     */
    public const EPSG_BERN_1938 = 'urn:ogc:def:crs:EPSG::4306';

    /**
     * Bioko
     * Extent: Equatorial Guinea - Bioko onshore.
     */
    public const EPSG_BIOKO = 'urn:ogc:def:crs:EPSG::6883';

    /**
     * Bissau
     * Extent: Guinea-Bissau - onshore.
     */
    public const EPSG_BISSAU = 'urn:ogc:def:crs:EPSG::4165';

    /**
     * Bogota 1975
     * Extent: Colombia - mainland and offshore Caribbean.
     * Replaces earlier 3 adjustments of 1951, 1944 and 1941. Replaced by MAGNA-SIRGAS (CRS code 4685).
     */
    public const EPSG_BOGOTA_1975 = 'urn:ogc:def:crs:EPSG::4218';

    /**
     * Bogota 1975 (Bogota)
     * Extent: Colombia - mainland onshore.
     * Replaces earlier 3 adjustments of 1951, 1944 and 1941.
     */
    public const EPSG_BOGOTA_1975_BOGOTA = 'urn:ogc:def:crs:EPSG::4802';

    /**
     * Bukit Rimpah
     * Extent: Indonesia - Banga and Belitung Islands.
     */
    public const EPSG_BUKIT_RIMPAH = 'urn:ogc:def:crs:EPSG::4219';

    /**
     * CGRS93
     * Extent: Cyprus - onshore.
     * Adopted by DLS in 1993 for new survey plans and maps.
     */
    public const EPSG_CGRS93 = 'urn:ogc:def:crs:EPSG::6311';

    /**
     * CH1903
     * Extent: Liechtenstein; Switzerland.
     * Replaced by CH1903+.
     */
    public const EPSG_CH1903 = 'urn:ogc:def:crs:EPSG::4149';

    /**
     * CH1903+
     * Extent: Liechtenstein; Switzerland.
     * Replaces CH1903.
     */
    public const EPSG_CH1903_PLUS = 'urn:ogc:def:crs:EPSG::4150';

    /**
     * CHTRF95
     * Extent: Liechtenstein; Switzerland.
     */
    public const EPSG_CHTRF95 = 'urn:ogc:def:crs:EPSG::4151';

    /**
     * CIGD11
     * Extent: Cayman Islands - onshore and offshore. Includes Grand Cayman, Little Cayman and Cayman Brac.
     */
    public const EPSG_CIGD11 = 'urn:ogc:def:crs:EPSG::6135';

    /**
     * CR-SIRGAS
     * Extent: Costa Rica - onshore and offshore.
     * Replaces CR05 (CRS code 5365) from April 2018.
     */
    public const EPSG_CR_SIRGAS = 'urn:ogc:def:crs:EPSG::8907';

    /**
     * CR05
     * Extent: Costa Rica - onshore and offshore.
     * Replaces Ocotepeque (CRS code 5451) in Costa Rica from March 2007. Replaced by CR-SIRGAS (CRS code 8907) from
     * April 2018.
     */
    public const EPSG_CR05 = 'urn:ogc:def:crs:EPSG::5365';

    /**
     * CSG67
     * Extent: French Guiana - coastal area.
     */
    public const EPSG_CSG67 = 'urn:ogc:def:crs:EPSG::4623';

    /**
     * Cadastre 1997
     * Extent: Mayotte - onshore.
     * Replaces Combani 1950 (CRS code 4632) for cadastral purposes only. For other purposes see RGM04 (CRS code 4470).
     */
    public const EPSG_CADASTRE_1997 = 'urn:ogc:def:crs:EPSG::4475';

    /**
     * Camacupa 1948
     * Extent: Angola - Angola proper - onshore and offshore.
     * Provisional adjustment. Coastal stations used for offshore radio-navigation positioning and determination of
     * transformations to WGS. Differs from second adjustment (Camacupa 2015, CRS code 8694), which is not used for
     * offshore E&P, by up to 25m.
     */
    public const EPSG_CAMACUPA_1948 = 'urn:ogc:def:crs:EPSG::4220';

    /**
     * Camacupa 2015
     * Extent: Angola - onshore and offshore.
     * Camacupa 1948 (CRS code 4220) is used for offshore oil and gas exploration and production. Camacupa 2015 differs
     * from Camacupa 1948 by up to 25m.
     */
    public const EPSG_CAMACUPA_2015 = 'urn:ogc:def:crs:EPSG::8694';

    /**
     * Camp Area Astro
     * Extent: Antarctica - McMurdo Sound, Camp McMurdo area.
     * Replaced by RSRGD2000 (CRS code 4764). The relationship to this is variable. See Land Information New Zealand
     * LINZS25001.
     */
    public const EPSG_CAMP_AREA_ASTRO = 'urn:ogc:def:crs:EPSG::4715';

    /**
     * Campo Inchauspe
     * Extent: Argentina - mainland onshore and Atlantic offshore Tierra del Fuego.
     */
    public const EPSG_CAMPO_INCHAUSPE = 'urn:ogc:def:crs:EPSG::4221';

    /**
     * Cape
     * Extent: Botswana; Eswatini (Swaziland); Lesotho; South Africa - mainland.
     * Replaced by Hartbeesthoek94 from 1999.
     */
    public const EPSG_CAPE = 'urn:ogc:def:crs:EPSG::4222';

    /**
     * Cape Canaveral
     * Extent: North America - onshore - Bahamas and USA - Florida (east).
     */
    public const EPSG_CAPE_CANAVERAL = 'urn:ogc:def:crs:EPSG::4717';

    /**
     * Carthage
     * Extent: Tunisia - onshore and offshore.
     */
    public const EPSG_CARTHAGE = 'urn:ogc:def:crs:EPSG::4223';

    /**
     * Carthage (Paris)
     * Extent: Tunisia - onshore.
     * Replaced by Greenwich-based Carthage geogCRS.
     */
    public const EPSG_CARTHAGE_PARIS = 'urn:ogc:def:crs:EPSG::4816';

    /**
     * Chatham Islands 1971
     * Extent: New Zealand - Chatham Islands group - onshore.
     * Replaced by CI1979.
     */
    public const EPSG_CHATHAM_ISLANDS_1971 = 'urn:ogc:def:crs:EPSG::4672';

    /**
     * Chatham Islands 1979
     * Extent: New Zealand - Chatham Islands group - onshore.
     * Replaces CI1971. Replaced by NZGD2000 from March 2000.
     */
    public const EPSG_CHATHAM_ISLANDS_1979 = 'urn:ogc:def:crs:EPSG::4673';

    /**
     * China Geodetic Coordinate System 2000
     * Extent: China - onshore and offshore.
     * Adopted July 2008. Replaces Xian 1980 (CRS code 4610).
     */
    public const EPSG_CHINA_GEODETIC_COORDINATE_SYSTEM_2000 = 'urn:ogc:def:crs:EPSG::4490';

    /**
     * Chos Malal 1914
     * Extent: Argentina - Mendoza province, Neuquen province, western La Pampa province and western Rio Negro
     * province.
     * Replaced by Campo Inchauspe (geogCRS code 4221) for topographic mapping, use for oil exploration and production
     * continues.
     */
    public const EPSG_CHOS_MALAL_1914 = 'urn:ogc:def:crs:EPSG::4160';

    /**
     * Chua
     * Extent: Brazil - south of 18°S and west of 54°W, plus Distrito Federal. Paraguay - north.
     * The Chua origin and associated network is in Brazil with a connecting traverse through northern Paraguay. In
     * Brazil used only as input into the Corrego Allegre adjustment (CRS code 4225), except for government work
     * including SICAD in Distrito Federal.
     */
    public const EPSG_CHUA = 'urn:ogc:def:crs:EPSG::4224';

    /**
     * Cocos Islands 1965
     * Extent: Cocos (Keeling) Islands - onshore.
     */
    public const EPSG_COCOS_ISLANDS_1965 = 'urn:ogc:def:crs:EPSG::4708';

    /**
     * Combani 1950
     * Extent: Mayotte - onshore.
     * Replaced by Cadastre 1997 (CRS code 4475) for cadastral purposes only and by RGM04 (CRS code 4470) for all other
     * purposes.
     */
    public const EPSG_COMBANI_1950 = 'urn:ogc:def:crs:EPSG::4632';

    /**
     * Conakry 1905
     * Extent: Guinea - onshore.
     * Replaced by Dabola 1981 (EPSG code 4155).
     */
    public const EPSG_CONAKRY_1905 = 'urn:ogc:def:crs:EPSG::4315';

    /**
     * Corrego Alegre 1961
     * Extent: Brazil - onshore - between 18°S and 27°30'S, also east of 54°W between 15°S and 18°S.
     * Replaced by Corrego Alegre 1970-72 (CRS code 4225).
     */
    public const EPSG_CORREGO_ALEGRE_1961 = 'urn:ogc:def:crs:EPSG::5524';

    /**
     * Corrego Alegre 1970-72
     * Extent: Brazil - onshore - west of 54°W and south of 18°S; also south of 15°S between 54°W and 42°W; also
     * east of 42°W.
     * Replaces 1961 adjustment (CRS code 5524). Replaced by SAD69 (CRS code 4291).
     */
    public const EPSG_CORREGO_ALEGRE_1970_72 = 'urn:ogc:def:crs:EPSG::4225';

    /**
     * DB_REF
     * Extent: Germany - onshore - states of Baden-Wurtemberg, Bayern, Berlin, Brandenburg, Bremen, Hamburg, Hessen,
     * Mecklenburg-Vorpommern, Niedersachsen, Nordrhein-Westfalen, Rheinland-Pfalz, Saarland, Sachsen, Sachsen-Anhalt,
     * Schleswig-Holstein, Thuringen.
     * Differs from DHDN by 0.5-1m in former West Germany and by a maximum of 3m in former East Germany.
     */
    public const EPSG_DB_REF = 'urn:ogc:def:crs:EPSG::5681';

    /**
     * DGN95
     * Extent: Indonesia - onshore and offshore.
     * Replaces ID74.
     */
    public const EPSG_DGN95 = 'urn:ogc:def:crs:EPSG::4755';

    /**
     * DHDN
     * Extent: Germany - states of former West Germany onshore - Baden-Wurtemberg, Bayern, Bremen, Hamburg, Hessen,
     * Niedersachsen, Nordrhein-Westfalen, Rheinland-Pfalz, Saarland, Schleswig-Holstein.
     * See also RD/83 for Saxony and PD/83 for Thuringen. For national digital cartographic purposes used across all
     * German states.
     */
    public const EPSG_DHDN = 'urn:ogc:def:crs:EPSG::4314';

    /**
     * DRUKREF 03
     * Extent: Bhutan.
     */
    public const EPSG_DRUKREF_03 = 'urn:ogc:def:crs:EPSG::5264';

    /**
     * Dabola 1981
     * Extent: Guinea - onshore.
     * Replaces Conakry 1905 (EPSG code 4315).
     */
    public const EPSG_DABOLA_1981 = 'urn:ogc:def:crs:EPSG::4155';

    /**
     * Datum 73
     * Extent: Portugal - mainland - onshore.
     */
    public const EPSG_DATUM_73 = 'urn:ogc:def:crs:EPSG::4274';

    /**
     * Dealul Piscului 1930
     * Extent: Romania - onshore.
     * Replaced by Pulkovo 1942(58) (geogCRS code 4179).
     */
    public const EPSG_DEALUL_PISCULUI_1930 = 'urn:ogc:def:crs:EPSG::4316';

    /**
     * Deception Island
     * Extent: Antarctica - South Shetland Islands - Deception Island.
     */
    public const EPSG_DECEPTION_ISLAND = 'urn:ogc:def:crs:EPSG::4736';

    /**
     * Deir ez Zor
     * Extent: Lebanon - onshore. Syrian Arab Republic - onshore.
     */
    public const EPSG_DEIR_EZ_ZOR = 'urn:ogc:def:crs:EPSG::4227';

    /**
     * Diego Garcia 1969
     * Extent: British Indian Ocean Territory - Chagos Archipelago - Diego Garcia.
     */
    public const EPSG_DIEGO_GARCIA_1969 = 'urn:ogc:def:crs:EPSG::4724';

    /**
     * Dominica 1945
     * Extent: Dominica - onshore.
     */
    public const EPSG_DOMINICA_1945 = 'urn:ogc:def:crs:EPSG::4602';

    /**
     * Douala 1948
     * Extent: Cameroon - coastal area.
     * Replaced by Manoca 1962 (code 4193).
     */
    public const EPSG_DOUALA_1948 = 'urn:ogc:def:crs:EPSG::4192';

    /**
     * ED50
     * Extent: Europe - west: Andorra; Cyprus; Denmark - onshore and offshore; Faroe Islands - onshore; France -
     * offshore; Germany - offshore North Sea; Gibraltar; Greece - offshore; Israel - offshore; Italy including San
     * Marino and Vatican City State; Ireland offshore; Malta; Netherlands - offshore; North Sea; Norway including
     * Svalbard - onshore and offshore; Portugal - mainland - offshore; Spain - onshore; Turkey - onshore and offshore;
     * United Kingdom UKCS offshore east of 6°W including Channel Islands (Guernsey and Jersey). Egypt - Western
     * Desert; Iraq - onshore; Jordan.
     */
    public const EPSG_ED50 = 'urn:ogc:def:crs:EPSG::4230';

    /**
     * ED50(ED77)
     * Extent: Iran - onshore and offshore.
     */
    public const EPSG_ED50_ED77 = 'urn:ogc:def:crs:EPSG::4154';

    /**
     * ED79
     * Extent: Europe - west.
     */
    public const EPSG_ED79 = 'urn:ogc:def:crs:EPSG::4668';

    /**
     * ED87
     * Extent: Europe - west.
     */
    public const EPSG_ED87 = 'urn:ogc:def:crs:EPSG::4231';

    /**
     * ELD79
     * Extent: Libya - onshore and offshore.
     */
    public const EPSG_ELD79 = 'urn:ogc:def:crs:EPSG::4159';

    /**
     * EST92
     * Extent: Estonia - onshore.
     * This name is also used for a projected CRS (see projCRS code 3300). Replaced by EST97 (code 4180).
     */
    public const EPSG_EST92 = 'urn:ogc:def:crs:EPSG::4133';

    /**
     * EST97
     * Extent: Estonia - onshore and offshore.
     * This name is also used for a projected CRS (see projCRS code 3301). Replaces EST92 (code 4133).
     */
    public const EPSG_EST97 = 'urn:ogc:def:crs:EPSG::4180';

    /**
     * ETRF2000
     * Extent: Europe - onshore and offshore: Albania; Andorra; Austria; Belgium; Bosnia and Herzegovina; Bulgaria;
     * Croatia; Cyprus; Czechia; Denmark; Estonia; Faroe Islands; Finland; France; Germany; Gibraltar; Greece; Hungary;
     * Ireland; Italy; Kosovo; Latvia; Liechtenstein; Lithuania; Luxembourg; Malta; Moldova; Monaco; Montenegro;
     * Netherlands; North Macedonia; Norway including Svalbard and Jan Mayen; Poland; Portugal; Romania; San Marino;
     * Serbia; Slovakia; Slovenia; Spain; Sweden; Switzerland; United Kingdom (UK) including Channel Islands and Isle
     * of Man; Vatican City State.
     * Replaces ETRF97 (code 9066). On the publication of ETRF2005 (code 9068),  the EUREF Technical Working Group
     * recommended that ETRF2000 be the realization of ETRS89. ETRF2014 (code 9069) is technically superior to all
     * earlier realizations of ETRS89.
     */
    public const EPSG_ETRF2000 = 'urn:ogc:def:crs:EPSG::9067';

    /**
     * ETRF2005
     * Extent: Europe - onshore and offshore: Albania; Andorra; Austria; Belgium; Bosnia and Herzegovina; Bulgaria;
     * Croatia; Cyprus; Czechia; Denmark; Estonia; Faroe Islands; Finland; France; Germany; Gibraltar; Greece; Hungary;
     * Ireland; Italy; Kosovo; Latvia; Liechtenstein; Lithuania; Luxembourg; Malta; Moldova; Monaco; Montenegro;
     * Netherlands; North Macedonia; Norway including Svalbard and Jan Mayen; Poland; Portugal; Romania; San Marino;
     * Serbia; Slovakia; Slovenia; Spain; Sweden; Switzerland; United Kingdom (UK) including Channel Islands and Isle
     * of Man; Vatican City State.
     * On publication in 2007 of this CRS, the EUREF Technical Working Group recommended that ETRF2000 (EPSG code 9067)
     * remained as the preferred realization of ETRS89. Replaced by ETRF2014 (code 9069).
     */
    public const EPSG_ETRF2005 = 'urn:ogc:def:crs:EPSG::9068';

    /**
     * ETRF2014
     * Extent: Europe - onshore and offshore: Albania; Andorra; Austria; Belgium; Bosnia and Herzegovina; Bulgaria;
     * Croatia; Cyprus; Czechia; Denmark; Estonia; Faroe Islands; Finland; France; Germany; Gibraltar; Greece; Hungary;
     * Ireland; Italy; Kosovo; Latvia; Liechtenstein; Lithuania; Luxembourg; Malta; Moldova; Monaco; Montenegro;
     * Netherlands; North Macedonia; Norway including Svalbard and Jan Mayen; Poland; Portugal; Romania; San Marino;
     * Serbia; Slovakia; Slovenia; Spain; Sweden; Switzerland; United Kingdom (UK) including Channel Islands and Isle
     * of Man; Vatican City State.
     * Replaces ETRF2005 (code 9068). ETRF2014 is technically superior to ETRF2000 but ETRF2000 and other previous
     * realizations may be preferred for backward compatibility reasons. Differences between ETRF2014 and ETRF2000 can
     * reach 7cm.
     */
    public const EPSG_ETRF2014 = 'urn:ogc:def:crs:EPSG::9069';

    /**
     * ETRF89
     * Extent: Europe - onshore and offshore: Albania; Andorra; Austria; Belgium; Bosnia and Herzegovina; Bulgaria;
     * Croatia; Cyprus; Czechia; Denmark; Estonia; Faroe Islands; Finland; France; Germany; Gibraltar; Greece; Hungary;
     * Ireland; Italy; Kosovo; Latvia; Liechtenstein; Lithuania; Luxembourg; Malta; Moldova; Monaco; Montenegro;
     * Netherlands; North Macedonia; Norway including Svalbard and Jan Mayen; Poland; Portugal; Romania; San Marino;
     * Serbia; Slovakia; Slovenia; Spain; Sweden; Switzerland; United Kingdom (UK) including Channel Islands and Isle
     * of Man; Vatican City State.
     * Replaced by ETRF90 (code 9060).
     */
    public const EPSG_ETRF89 = 'urn:ogc:def:crs:EPSG::9059';

    /**
     * ETRF90
     * Extent: Europe - onshore and offshore: Albania; Andorra; Austria; Belgium; Bosnia and Herzegovina; Bulgaria;
     * Croatia; Cyprus; Czechia; Denmark; Estonia; Faroe Islands; Finland; France; Germany; Gibraltar; Greece; Hungary;
     * Ireland; Italy; Kosovo; Latvia; Liechtenstein; Lithuania; Luxembourg; Malta; Moldova; Monaco; Montenegro;
     * Netherlands; North Macedonia; Norway including Svalbard and Jan Mayen; Poland; Portugal; Romania; San Marino;
     * Serbia; Slovakia; Slovenia; Spain; Sweden; Switzerland; United Kingdom (UK) including Channel Islands and Isle
     * of Man; Vatican City State.
     * Replaces ETRF89 (code 9059). Replaced by ETRF91 (code 9061).
     */
    public const EPSG_ETRF90 = 'urn:ogc:def:crs:EPSG::9060';

    /**
     * ETRF91
     * Extent: Europe - onshore and offshore: Albania; Andorra; Austria; Belgium; Bosnia and Herzegovina; Bulgaria;
     * Croatia; Cyprus; Czechia; Denmark; Estonia; Faroe Islands; Finland; France; Germany; Gibraltar; Greece; Hungary;
     * Ireland; Italy; Kosovo; Latvia; Liechtenstein; Lithuania; Luxembourg; Malta; Moldova; Monaco; Montenegro;
     * Netherlands; North Macedonia; Norway including Svalbard and Jan Mayen; Poland; Portugal; Romania; San Marino;
     * Serbia; Slovakia; Slovenia; Spain; Sweden; Switzerland; United Kingdom (UK) including Channel Islands and Isle
     * of Man; Vatican City State.
     * Replaces ETRF90 (code 9060). Replaced by ETRF92 (code 9062).
     */
    public const EPSG_ETRF91 = 'urn:ogc:def:crs:EPSG::9061';

    /**
     * ETRF92
     * Extent: Europe - onshore and offshore: Albania; Andorra; Austria; Belgium; Bosnia and Herzegovina; Bulgaria;
     * Croatia; Cyprus; Czechia; Denmark; Estonia; Faroe Islands; Finland; France; Germany; Gibraltar; Greece; Hungary;
     * Ireland; Italy; Kosovo; Latvia; Liechtenstein; Lithuania; Luxembourg; Malta; Moldova; Monaco; Montenegro;
     * Netherlands; North Macedonia; Norway including Svalbard and Jan Mayen; Poland; Portugal; Romania; San Marino;
     * Serbia; Slovakia; Slovenia; Spain; Sweden; Switzerland; United Kingdom (UK) including Channel Islands and Isle
     * of Man; Vatican City State.
     * Replaces ETRF91 (code 9061). Replaced by ETRF93 (code 9063).
     */
    public const EPSG_ETRF92 = 'urn:ogc:def:crs:EPSG::9062';

    /**
     * ETRF93
     * Extent: Europe - onshore and offshore: Albania; Andorra; Austria; Belgium; Bosnia and Herzegovina; Bulgaria;
     * Croatia; Cyprus; Czechia; Denmark; Estonia; Faroe Islands; Finland; France; Germany; Gibraltar; Greece; Hungary;
     * Ireland; Italy; Kosovo; Latvia; Liechtenstein; Lithuania; Luxembourg; Malta; Moldova; Monaco; Montenegro;
     * Netherlands; North Macedonia; Norway including Svalbard and Jan Mayen; Poland; Portugal; Romania; San Marino;
     * Serbia; Slovakia; Slovenia; Spain; Sweden; Switzerland; United Kingdom (UK) including Channel Islands and Isle
     * of Man; Vatican City State.
     * Replaces ETRF92 (code 9062). Replaced by ETRF94 (code 9064).
     */
    public const EPSG_ETRF93 = 'urn:ogc:def:crs:EPSG::9063';

    /**
     * ETRF94
     * Extent: Europe - onshore and offshore: Albania; Andorra; Austria; Belgium; Bosnia and Herzegovina; Bulgaria;
     * Croatia; Cyprus; Czechia; Denmark; Estonia; Faroe Islands; Finland; France; Germany; Gibraltar; Greece; Hungary;
     * Ireland; Italy; Kosovo; Latvia; Liechtenstein; Lithuania; Luxembourg; Malta; Moldova; Monaco; Montenegro;
     * Netherlands; North Macedonia; Norway including Svalbard and Jan Mayen; Poland; Portugal; Romania; San Marino;
     * Serbia; Slovakia; Slovenia; Spain; Sweden; Switzerland; United Kingdom (UK) including Channel Islands and Isle
     * of Man; Vatican City State.
     * Replaces ETRF93 (code 9063). Replaced by ETRF96 (code 9065).
     */
    public const EPSG_ETRF94 = 'urn:ogc:def:crs:EPSG::9064';

    /**
     * ETRF96
     * Extent: Europe - onshore and offshore: Albania; Andorra; Austria; Belgium; Bosnia and Herzegovina; Bulgaria;
     * Croatia; Cyprus; Czechia; Denmark; Estonia; Faroe Islands; Finland; France; Germany; Gibraltar; Greece; Hungary;
     * Ireland; Italy; Kosovo; Latvia; Liechtenstein; Lithuania; Luxembourg; Malta; Moldova; Monaco; Montenegro;
     * Netherlands; North Macedonia; Norway including Svalbard and Jan Mayen; Poland; Portugal; Romania; San Marino;
     * Serbia; Slovakia; Slovenia; Spain; Sweden; Switzerland; United Kingdom (UK) including Channel Islands and Isle
     * of Man; Vatican City State.
     * Replaces ETRF94 (code 9064). Replaced by ETRF97 (code 9066).
     */
    public const EPSG_ETRF96 = 'urn:ogc:def:crs:EPSG::9065';

    /**
     * ETRF97
     * Extent: Europe - onshore and offshore: Albania; Andorra; Austria; Belgium; Bosnia and Herzegovina; Bulgaria;
     * Croatia; Cyprus; Czechia; Denmark; Estonia; Faroe Islands; Finland; France; Germany; Gibraltar; Greece; Hungary;
     * Ireland; Italy; Kosovo; Latvia; Liechtenstein; Lithuania; Luxembourg; Malta; Moldova; Monaco; Montenegro;
     * Netherlands; North Macedonia; Norway including Svalbard and Jan Mayen; Poland; Portugal; Romania; San Marino;
     * Serbia; Slovakia; Slovenia; Spain; Sweden; Switzerland; United Kingdom (UK) including Channel Islands and Isle
     * of Man; Vatican City State.
     * Replaces ETRF96 (code 9065). Replaced by ETRF2000 (code 9067).
     */
    public const EPSG_ETRF97 = 'urn:ogc:def:crs:EPSG::9066';

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
    public const EPSG_ETRS89 = 'urn:ogc:def:crs:EPSG::4258';

    /**
     * Easter Island 1967
     * Extent: Chile - Easter Island onshore.
     */
    public const EPSG_EASTER_ISLAND_1967 = 'urn:ogc:def:crs:EPSG::4719';

    /**
     * Egypt 1907
     * Extent: Egypt - onshore and offshore.
     */
    public const EPSG_EGYPT_1907 = 'urn:ogc:def:crs:EPSG::4229';

    /**
     * Egypt 1930
     * Extent: Egypt - onshore.
     * Note that Egypt 1930 uses the International 1924 ellipsoid, unlike the Egypt 1907 CRS (code 4229) which uses the
     * Helmert ellipsoid. Oil industry references to the Egypt 1930 name and the Helmert ellipsoid probably mean Egypt
     * 1907.
     */
    public const EPSG_EGYPT_1930 = 'urn:ogc:def:crs:EPSG::4199';

    /**
     * Egypt Gulf of Suez S-650 TL
     * Extent: Egypt - Gulf of Suez.
     * Differs from Egypt 1907 (CRS code 4229) by approximately 20m.
     */
    public const EPSG_EGYPT_GULF_OF_SUEZ_S_650_TL = 'urn:ogc:def:crs:EPSG::4706';

    /**
     * FD54
     * Extent: Faroe Islands - onshore.
     * Except for cadastral survey, replaced by ED50 in the late 1970's. For cadastral survey, replaced by fk89 (CRS
     * code 4753).
     */
    public const EPSG_FD54 = 'urn:ogc:def:crs:EPSG::4741';

    /**
     * FD58
     * Extent: Iran - Arwaz area and onshore Gulf coast west of 54°E, Lavan Island, offshore Balal field and South
     * Pars blocks 2 and 3.
     */
    public const EPSG_FD58 = 'urn:ogc:def:crs:EPSG::4132';

    /**
     * FEH2010
     * Extent: Fehmarnbelt area of Denmark and Germany.
     * Created for engineering survey and construction of Fehmarnbelt tunnel.
     */
    public const EPSG_FEH2010 = 'urn:ogc:def:crs:EPSG::5593';

    /**
     * Fahud
     * Extent: Oman - mainland onshore.
     * Since 1993 replaced by PSD93 geogCRS (code 4134). Maximum differences to Fahud adjustment are 20 metres.
     */
    public const EPSG_FAHUD = 'urn:ogc:def:crs:EPSG::4232';

    /**
     * Fatu Iva 72
     * Extent: French Polynesia - Marquesas Islands - Fatu Hiva.
     * Recomputed by IGN in 1972 using origin and observations of 1953-1955 Mission Hydrographique des Etablissement
     * Francais d'Oceanie (MHEFO 55). Replaced by RGPF, CRS code 4687.
     */
    public const EPSG_FATU_IVA_72 = 'urn:ogc:def:crs:EPSG::4688';

    /**
     * Fiji 1956
     * Extent: Fiji - onshore - Vanua Levu, Taveuni, Viti Levu and and immediately adjacent smaller islands of Yasawa
     * and Kandavu groups.
     * For topographic mapping replaces Viti Levu 1912 (CRS code 4752) and Vanua Levu 1915 (CRS code 4748). Replaced by
     * Fiji 1986 (CRS code 4720).
     */
    public const EPSG_FIJI_1956 = 'urn:ogc:def:crs:EPSG::4721';

    /**
     * Fiji 1986
     * Extent: Fiji - onshore. Includes Viti Levu, Vanua Levu, Taveuni, the Yasawa Group, the Kadavu Group, the Lau
     * Islands and Rotuma Islands.
     * Replaces Viti Levu 1912 (CRS code 4752), Vanua Levu 1915 (CRS code 4748) and Fiji 1956 (CRS code 4721).
     */
    public const EPSG_FIJI_1986 = 'urn:ogc:def:crs:EPSG::4720';

    /**
     * Fort Marigot
     * Extent: Guadeloupe - onshore - St Martin and St Barthélemy islands.
     * Replaced by RRAF 1991 (CRS code 4558).
     */
    public const EPSG_FORT_MARIGOT = 'urn:ogc:def:crs:EPSG::4621';

    /**
     * GBK19-IRF
     * Extent: UK - on or related to the rail route from Glasgow via Barrhead to Kilmarnock and the branch to East
     * Kilbride.
     * Intermediate CRS created in 2020 to assist the emulation of the ETRS89 / GBK19 SnakeGrid projected CRS through
     * transformation ETRS89 to GBK19-IRF (1) (code 9454) used in conjunction with the GBK19-TM map projection (code
     * 9455).
     */
    public const EPSG_GBK19_IRF = 'urn:ogc:def:crs:EPSG::9453';

    /**
     * GCGD59
     * Extent: Cayman Islands - Grand Cayman.
     * Superseded by CIGD11 (CRS code 6135).
     */
    public const EPSG_GCGD59 = 'urn:ogc:def:crs:EPSG::4723';

    /**
     * GDA2020
     * Extent: Australia including Lord Howe Island, Macquarie Islands, Ashmore and Cartier Islands, Christmas Island,
     * Cocos (Keeling) Islands, Norfolk Island. All onshore and offshore.
     */
    public const EPSG_GDA2020 = 'urn:ogc:def:crs:EPSG::7844';

    /**
     * GDA94
     * Extent: Australia including Lord Howe Island, Macquarie Islands, Ashmore and Cartier Islands, Christmas Island,
     * Cocos (Keeling) Islands, Norfolk Island. All onshore and offshore.
     */
    public const EPSG_GDA94 = 'urn:ogc:def:crs:EPSG::4283';

    /**
     * GDBD2009
     * Extent: Brunei Darussalam - onshore and offshore.
     * Introduced from July 2009 to replace Timbalai 1948 (CRS code 4298) for government purposes.
     */
    public const EPSG_GDBD2009 = 'urn:ogc:def:crs:EPSG::5246';

    /**
     * GDM2000
     * Extent: Malaysia - onshore and offshore. Includes peninsular Malayasia, Sabah and Sarawak.
     * Replaces all earlier Malaysian geographic CRSs.
     */
    public const EPSG_GDM2000 = 'urn:ogc:def:crs:EPSG::4742';

    /**
     * GGRS87
     * Extent: Greece - onshore.
     */
    public const EPSG_GGRS87 = 'urn:ogc:def:crs:EPSG::4121';

    /**
     * GR96
     * Extent: Greenland - onshore and offshore.
     * Replaces all earlier Greenland geographic CRSs.
     */
    public const EPSG_GR96 = 'urn:ogc:def:crs:EPSG::4747';

    /**
     * GSK-2011
     * Extent: Russian Federation - onshore and offshore.
     * Replaces Pulkovo 1995 (CRS code 4200) with effect from 21st October 2011.
     */
    public const EPSG_GSK_2011 = 'urn:ogc:def:crs:EPSG::7683';

    /**
     * Gambia
     * Extent: Gambia - onshore.
     */
    public const EPSG_GAMBIA = 'urn:ogc:def:crs:EPSG::6894';

    /**
     * Gan 1970
     * Extent: Maldives - onshore.
     * In some references incorrectly named "Gandajika 1970". See CRS "Gandajika", code 4685, from the Democratic
     * Republic of the Congo (Zaire).
     */
    public const EPSG_GAN_1970 = 'urn:ogc:def:crs:EPSG::4684';

    /**
     * Garoua
     * Extent: Cameroon - Garoua area.
     */
    public const EPSG_GAROUA = 'urn:ogc:def:crs:EPSG::4197';

    /**
     * Grand Comoros
     * Extent: Comoros - Njazidja (Grande Comore).
     */
    public const EPSG_GRAND_COMOROS = 'urn:ogc:def:crs:EPSG::4646';

    /**
     * Greek
     * Extent: Greece - onshore.
     */
    public const EPSG_GREEK = 'urn:ogc:def:crs:EPSG::4120';

    /**
     * Greek (Athens)
     * Extent: Greece - onshore.
     */
    public const EPSG_GREEK_ATHENS = 'urn:ogc:def:crs:EPSG::4815';

    /**
     * Grenada 1953
     * Extent: Grenada and southern Grenadine Islands - onshore.
     */
    public const EPSG_GRENADA_1953 = 'urn:ogc:def:crs:EPSG::4603';

    /**
     * Guadeloupe 1948
     * Extent: Guadeloupe - onshore - Basse-Terre, Grande-Terre, La Desirade, Marie-Galante, Les Saintes.
     * Replaced by RRAF 1991 (CRS code 4558).
     */
    public const EPSG_GUADELOUPE_1948 = 'urn:ogc:def:crs:EPSG::4622';

    /**
     * Guam 1963
     * Extent: Guam - onshore. Northern Mariana Islands - onshore.
     * Replaced by NAD83(HARN) alias Guam Geodetic Network 1993 (CRS code 4152) from 1995.
     */
    public const EPSG_GUAM_1963 = 'urn:ogc:def:crs:EPSG::4675';

    /**
     * Gulshan 303
     * Extent: Bangladesh - onshore and offshore.
     */
    public const EPSG_GULSHAN_303 = 'urn:ogc:def:crs:EPSG::4682';

    /**
     * Gusterberg (Ferro)
     * Extent: Austria - Upper Austria and Salzburg provinces. Czechia - Bohemia.
     */
    public const EPSG_GUSTERBERG_FERRO = 'urn:ogc:def:crs:EPSG::8042';

    /**
     * HD1909
     * Extent: Hungary.
     * Replaced earlier HD1863 adjustment also on Bessel ellipsoid. Both HD1863 and HD1909 were originally on Ferro
     * Prime Meridian but subsequently converted to Greenwich. Replaced by HD72 (CRS code 4237).
     */
    public const EPSG_HD1909 = 'urn:ogc:def:crs:EPSG::3819';

    /**
     * HD72
     * Extent: Hungary.
     * Replaced HD1909 (EPSG CRS code 3819).
     */
    public const EPSG_HD72 = 'urn:ogc:def:crs:EPSG::4237';

    /**
     * HS2-IRF
     * Extent: UK - HS2 phases 1 and 2a railway corridor from London to Birmingham, Lichfield and Crewe.
     * Intermediate CRS created to assist the emulation of the ETRS89 / HS2P1+14 SnakeGrid projected CRS through
     * transformation HS2-IRF to ETRS89 (1) (code 9302) used in conjunction with the HS2-TM map projection (code 9301).
     */
    public const EPSG_HS2_IRF = 'urn:ogc:def:crs:EPSG::9299';

    /**
     * HTRS96
     * Extent: Croatia - onshore and offshore.
     */
    public const EPSG_HTRS96 = 'urn:ogc:def:crs:EPSG::4761';

    /**
     * Hanoi 1972
     * Extent: Vietnam - onshore.
     * Replaces use of Indian 1960. Replaced by VN-2000 (CRS code 4756).
     */
    public const EPSG_HANOI_1972 = 'urn:ogc:def:crs:EPSG::4147';

    /**
     * Hartebeesthoek94
     * Extent: Eswatini (Swaziland); Lesotho; South Africa - onshore and offshore.
     * Replaces Cape (code 4222) from 1999.
     */
    public const EPSG_HARTEBEESTHOEK94 = 'urn:ogc:def:crs:EPSG::4148';

    /**
     * Helle 1954
     * Extent: Jan Mayen - onshore.
     */
    public const EPSG_HELLE_1954 = 'urn:ogc:def:crs:EPSG::4660';

    /**
     * Herat North
     * Extent: Afghanistan.
     */
    public const EPSG_HERAT_NORTH = 'urn:ogc:def:crs:EPSG::4255';

    /**
     * Hito XVIII 1963
     * Extent: Chile - Tierra del Fuego, onshore; Argentina - Tierra del Fuego, onshore and offshore Atlantic west of
     * 66°W.
     */
    public const EPSG_HITO_XVIII_1963 = 'urn:ogc:def:crs:EPSG::4254';

    /**
     * Hjorsey 1955
     * Extent: Iceland - onshore.
     */
    public const EPSG_HJORSEY_1955 = 'urn:ogc:def:crs:EPSG::4658';

    /**
     * Hong Kong 1963
     * Extent: China - Hong Kong - onshore and offshore.
     * Replaced by Hong Kong 1963(67) (CRS code 4839) for military purposes only. For all purposes, replaced by Hong
     * Kong 1980 (CRS code 4611).
     */
    public const EPSG_HONG_KONG_1963 = 'urn:ogc:def:crs:EPSG::4738';

    /**
     * Hong Kong 1963(67)
     * Extent: China - Hong Kong - onshore and offshore.
     * For military purposes only, replaces Hong Kong 1963. Replaced by Hong Kong 1980 (CRS code 4611).
     */
    public const EPSG_HONG_KONG_1963_67 = 'urn:ogc:def:crs:EPSG::4739';

    /**
     * Hong Kong 1980
     * Extent: China - Hong Kong - onshore and offshore.
     * Replaces Hong Kong 1963 and Hong Kong 1963(67).
     */
    public const EPSG_HONG_KONG_1980 = 'urn:ogc:def:crs:EPSG::4611';

    /**
     * Hong Kong Geodetic CS
     * Extent: China - Hong Kong - onshore and offshore.
     * Locally sometimes referred to as ITRF96 or WGS 84, these are not strictly correct.
     */
    public const EPSG_HONG_KONG_GEODETIC_CS = 'urn:ogc:def:crs:EPSG::8427';

    /**
     * Hu Tzu Shan 1950
     * Extent: Taiwan, Republic of China - onshore - Taiwan Island, Penghu (Pescadores) Islands.
     */
    public const EPSG_HU_TZU_SHAN_1950 = 'urn:ogc:def:crs:EPSG::4236';

    /**
     * ID74
     * Extent: Indonesia - onshore.
     * Replaced by DGN95.
     */
    public const EPSG_ID74 = 'urn:ogc:def:crs:EPSG::4238';

    /**
     * IG05 Intermediate CRS
     * Extent: Israel - onshore; Palestine Territory - onshore.
     * Intermediate system not used for spatial referencing - use IGD05 (CRS code 6980). Referred to in Israeli
     * documentation as "in GRS80".
     */
    public const EPSG_IG05_INTERMEDIATE_CRS = 'urn:ogc:def:crs:EPSG::6983';

    /**
     * IG05/12 Intermediate CRS
     * Extent: Israel - onshore; Palestine Territory - onshore.
     * Intermediate system not used for spatial referencing - use IGD05/12 (CRS code 6987). Referred to in Israeli
     * documentation as "in GRS80".
     */
    public const EPSG_IG05_12_INTERMEDIATE_CRS = 'urn:ogc:def:crs:EPSG::6990';

    /**
     * IGC 1962 6th Parallel South
     * Extent: The Democratic Republic of the Congo (Zaire) - adjacent to 6th parallel south traverse.
     */
    public const EPSG_IGC_1962_6TH_PARALLEL_SOUTH = 'urn:ogc:def:crs:EPSG::4697';

    /**
     * IGCB 1955
     * Extent: The Democratic Republic of the Congo (Zaire) - Lower Congo (Bas Congo)
     * Replaced by IGC 1962 Arc of the 6th Parallel South, except for oil industry activities.
     */
    public const EPSG_IGCB_1955 = 'urn:ogc:def:crs:EPSG::4701';

    /**
     * IGD05
     * Extent: Israel - onshore and offshore.
     * Replaces Israel 1993 (CRS code 4141) from January 2005. Replaced by IGD05/12 (CRS code 7139) from March 2012.
     */
    public const EPSG_IGD05 = 'urn:ogc:def:crs:EPSG::7136';

    /**
     * IGD05/12
     * Extent: Israel - onshore and offshore.
     * Replaces IGD05 (CRS code 7136) from March 2012.
     */
    public const EPSG_IGD05_12 = 'urn:ogc:def:crs:EPSG::7139';

    /**
     * IGM95
     * Extent: Italy - onshore and offshore; San Marino, Vatican City State.
     * Replaced by RDN2008 (CRS code 6706) from 2011-11-10.
     */
    public const EPSG_IGM95 = 'urn:ogc:def:crs:EPSG::4670';

    /**
     * IGN 1962 Kerguelen
     * Extent: French Southern Territories - Kerguelen onshore.
     * Replaced by RGTAAF07 (CRS code 7073).
     */
    public const EPSG_IGN_1962_KERGUELEN = 'urn:ogc:def:crs:EPSG::4698';

    /**
     * IGN Astro 1960
     * Extent: Mauritania - onshore.
     * Mining title descriptions referring only to "Clarke 1880 ellipsoid" should be assumed to be referenced to this
     * CRS. Oil industry considers Mining Cadastre 1999 to be exactly defined through tfm codes 15857-9. Replaced by
     * Mauritania 1999 (code 4702).
     */
    public const EPSG_IGN_ASTRO_1960 = 'urn:ogc:def:crs:EPSG::4700';

    /**
     * IGN53 Mare
     * Extent: New Caledonia - Loyalty Islands - Mare.
     * Replaced by RGNC91-93 (CRS code 4749).
     */
    public const EPSG_IGN53_MARE = 'urn:ogc:def:crs:EPSG::4641';

    /**
     * IGN56 Lifou
     * Extent: New Caledonia - Loyalty Islands - Lifou.
     * Replaced by RGNC91-93 (CRS code 4749).
     */
    public const EPSG_IGN56_LIFOU = 'urn:ogc:def:crs:EPSG::4633';

    /**
     * IGN63 Hiva Oa
     * Extent: French Polynesia - Marquesas Islands - Hiva Oa and Tahuata.
     * Replaced by RGPF, CRS code 4687.
     */
    public const EPSG_IGN63_HIVA_OA = 'urn:ogc:def:crs:EPSG::4689';

    /**
     * IGN72 Grande Terre
     * Extent: New Caledonia - Grande Terre.
     * Replaced by RGNC91-93 (CRS code 4749).
     */
    public const EPSG_IGN72_GRANDE_TERRE = 'urn:ogc:def:crs:EPSG::4662';

    /**
     * IGN72 Nuku Hiva
     * Extent: French Polynesia - Marquesas Islands - Nuku Hiva, Ua Huka and Ua Pou.
     * Replaced by RGPF, CRS code 4687.
     */
    public const EPSG_IGN72_NUKU_HIVA = 'urn:ogc:def:crs:EPSG::4630';

    /**
     * IGRS
     * Extent: Iraq - onshore and offshore.
     */
    public const EPSG_IGRS = 'urn:ogc:def:crs:EPSG::3889';

    /**
     * IGS00
     * Extent: World.
     * Adopted by the International GNSS Service (IGS) from 2001-12-02 through 2004-01-10. Replaces IGS97, replaced by
     * IGb00 (CRS codes 9003 and 9009). For all practical purposes IGS00 is equivalent to ITRF2000.
     */
    public const EPSG_IGS00 = 'urn:ogc:def:crs:EPSG::9006';

    /**
     * IGS05
     * Extent: World.
     * Adopted by the International GNSS Service (IGS) from 2006-11-05 through 2011-04-16. Replaces IGb00, replaced by
     * IGS08 (CRS codes 9009 and 9014). For all practical purposes IGS05 is equivalent to ITRF2005.
     */
    public const EPSG_IGS05 = 'urn:ogc:def:crs:EPSG::9012';

    /**
     * IGS08
     * Extent: World.
     * Used for products from International GNSS Service (IGS) analysis centres from 2011-04-17 through 2012-10-06.
     * Replaces IGS05 (code 9012). Replaced by IGb08 (code 9017). For most practical purposes IGS08 is equivalent to
     * ITRF2008.
     */
    public const EPSG_IGS08 = 'urn:ogc:def:crs:EPSG::9014';

    /**
     * IGS14
     * Extent: World.
     * Used for products from the International GNSS Service (IGS) from 2017-01-29 to 2020-05-16. Replaces IGb08 (code
     * 9017), replaced by IGb14 (code 9380). For most practical purposes IGS14 is equivalent to ITRF2014.
     */
    public const EPSG_IGS14 = 'urn:ogc:def:crs:EPSG::9019';

    /**
     * IGS97
     * Extent: World.
     * Adopted by the International GNSS Service (IGS) from 2000-06-04 through 2001-12-01. Replaced by IGS00 (CRS code
     * 9006). For all practical purposes IGS97 is equivalent to ITRF97.
     */
    public const EPSG_IGS97 = 'urn:ogc:def:crs:EPSG::9003';

    /**
     * IGb00
     * Extent: World.
     * Adopted by the International GNSS Service (IGS) from 2004-01-11 through 2006-11-04. Replaces IGS00, replaced by
     * IGS05 (CRS codes 9006 and 9012). For all practical purposes IGb00 is equivalent to ITRF2000.
     */
    public const EPSG_IGB00 = 'urn:ogc:def:crs:EPSG::9009';

    /**
     * IGb08
     * Extent: World.
     * Adopted by the International GNSS Service (IGS) from 2012-10-07 through 2017-01-28. Replaces IGS08, replaced by
     * IGS14 (CRS codes 9014 and 9019). For all practical purposes IGb08 is equivalent to ITRF2008.
     */
    public const EPSG_IGB08 = 'urn:ogc:def:crs:EPSG::9017';

    /**
     * IGb14
     * Extent: World.
     * Used for products from the International GNSS Service (IGS) from 2020-05-17. Replaces IGS14 (code 9019). For
     * most practical purposes IGb14 is equivalent to ITRF2014.
     */
    public const EPSG_IGB14 = 'urn:ogc:def:crs:EPSG::9380';

    /**
     * IKBD-92
     * Extent: Iraq - Kuwait boundary.
     */
    public const EPSG_IKBD_92 = 'urn:ogc:def:crs:EPSG::4667';

    /**
     * IRENET95
     * Extent: Ireland - onshore. United Kingdom (UK) - Northern Ireland (Ulster) - onshore.
     */
    public const EPSG_IRENET95 = 'urn:ogc:def:crs:EPSG::4173';

    /**
     * ISN2004
     * Extent: Iceland - onshore and offshore.
     * Replaces ISN93 (CRS code 4659).
     */
    public const EPSG_ISN2004 = 'urn:ogc:def:crs:EPSG::5324';

    /**
     * ISN2016
     * Extent: Iceland - onshore and offshore.
     * Replaces ISN2004 (CRS code 5324) from September 2017.
     */
    public const EPSG_ISN2016 = 'urn:ogc:def:crs:EPSG::8086';

    /**
     * ISN93
     * Extent: Iceland - onshore and offshore.
     * Replaced by ISN2004 (CRS code 5324).
     */
    public const EPSG_ISN93 = 'urn:ogc:def:crs:EPSG::4659';

    /**
     * ITRF2000
     * Extent: World.
     * Replaces ITRF97 (code 8996). Replaced by ITRF2005 (code 8998).
     */
    public const EPSG_ITRF2000 = 'urn:ogc:def:crs:EPSG::8997';

    /**
     * ITRF2005
     * Extent: World.
     * Replaces ITRF2000 (code 8997). Replaced by ITRF2008 (code 8999).
     */
    public const EPSG_ITRF2005 = 'urn:ogc:def:crs:EPSG::8998';

    /**
     * ITRF2008
     * Extent: World.
     * Replaces ITRF2005 (code 8998). Replaced by ITRF2014 (code 9000).
     */
    public const EPSG_ITRF2008 = 'urn:ogc:def:crs:EPSG::8999';

    /**
     * ITRF2014
     * Extent: World.
     * Replaces ITRF2008 (code 8999).
     */
    public const EPSG_ITRF2014 = 'urn:ogc:def:crs:EPSG::9000';

    /**
     * ITRF88
     * Extent: World.
     * Replaced by ITRF89 (code 8989).
     */
    public const EPSG_ITRF88 = 'urn:ogc:def:crs:EPSG::8988';

    /**
     * ITRF89
     * Extent: World.
     * Replaces ITRF88 (code 8988). Replaced by ITRF90 (code 8990).
     */
    public const EPSG_ITRF89 = 'urn:ogc:def:crs:EPSG::8989';

    /**
     * ITRF90
     * Extent: World.
     * Replaces ITRF89 (code 8989). Replaced by ITRF91 (code 8991).
     */
    public const EPSG_ITRF90 = 'urn:ogc:def:crs:EPSG::8990';

    /**
     * ITRF91
     * Extent: World.
     * Replaces ITRF90 (code 8990). Replaced by ITRF92 (code 8992).
     */
    public const EPSG_ITRF91 = 'urn:ogc:def:crs:EPSG::8991';

    /**
     * ITRF92
     * Extent: World.
     * Replaces ITRF91 (code 8991). Replaced by ITRF93 (code 8993).
     */
    public const EPSG_ITRF92 = 'urn:ogc:def:crs:EPSG::8992';

    /**
     * ITRF93
     * Extent: World.
     * Replaces ITRF92 (code 8992). Replaced by ITRF94 (code 8994).
     */
    public const EPSG_ITRF93 = 'urn:ogc:def:crs:EPSG::8993';

    /**
     * ITRF94
     * Extent: World.
     * Replaces ITRF93 (code 8993). Replaced by ITRF96 (code 8995).
     */
    public const EPSG_ITRF94 = 'urn:ogc:def:crs:EPSG::8994';

    /**
     * ITRF96
     * Extent: World.
     * Replaces ITRF94 (code 8994). Replaced by ITRF97 (code 8996).
     */
    public const EPSG_ITRF96 = 'urn:ogc:def:crs:EPSG::8995';

    /**
     * ITRF97
     * Extent: World.
     * Replaces ITRF96 (code 8995). Replaced by ITRF2000 (code 8997).
     */
    public const EPSG_ITRF97 = 'urn:ogc:def:crs:EPSG::8996';

    /**
     * Indian 1954
     * Extent: Myanmar (Burma) - onshore; Thailand - onshore.
     */
    public const EPSG_INDIAN_1954 = 'urn:ogc:def:crs:EPSG::4239';

    /**
     * Indian 1960
     * Extent: Cambodia - onshore; Vietnam - onshore and offshore Cuu Long basin.
     */
    public const EPSG_INDIAN_1960 = 'urn:ogc:def:crs:EPSG::4131';

    /**
     * Indian 1975
     * Extent: Thailand - onshore plus offshore Gulf of Thailand.
     */
    public const EPSG_INDIAN_1975 = 'urn:ogc:def:crs:EPSG::4240';

    /**
     * Israel 1993
     * Extent: Israel - onshore; Palestine Territory - onshore.
     * Replaces Palestine 1923 (CRS code 4281) from June 1998. Replaced by IGD05 (CRS code 6980) from January 2005.
     */
    public const EPSG_ISRAEL_1993 = 'urn:ogc:def:crs:EPSG::4141';

    /**
     * Iwo Jima 1945
     * Extent: Japan - Iwo Jima island.
     */
    public const EPSG_IWO_JIMA_1945 = 'urn:ogc:def:crs:EPSG::4709';

    /**
     * JAD2001
     * Extent: Jamaica - onshore and offshore. Includes Morant Cays and Pedro Cays.
     * Replaces JAD69 (CRS code 4242).
     */
    public const EPSG_JAD2001 = 'urn:ogc:def:crs:EPSG::4758';

    /**
     * JAD69
     * Extent: Jamaica - onshore.
     * Replaced by JAD2001 (CRS code 4758).
     */
    public const EPSG_JAD69 = 'urn:ogc:def:crs:EPSG::4242';

    /**
     * JGD2000
     * Extent: Japan - onshore and offshore.
     * Replaces Tokyo (CRS code 4301) from April 2002. From 21st October 2011 replaced by JGD2011 (CRS code 6668).
     */
    public const EPSG_JGD2000 = 'urn:ogc:def:crs:EPSG::4612';

    /**
     * JGD2011
     * Extent: Japan - onshore and offshore.
     * Replaces JGD2000 (CRS code 4612) with effect from 21st October 2011.
     */
    public const EPSG_JGD2011 = 'urn:ogc:def:crs:EPSG::6668';

    /**
     * Jamaica 1875
     * Extent: Jamaica - onshore.
     */
    public const EPSG_JAMAICA_1875 = 'urn:ogc:def:crs:EPSG::4241';

    /**
     * Johnston Island 1961
     * Extent: United States Minor Outlying Islands - Johnston Island.
     */
    public const EPSG_JOHNSTON_ISLAND_1961 = 'urn:ogc:def:crs:EPSG::4725';

    /**
     * Jouik 1961
     * Extent: Mauritania - coastal area north of Cape Timiris.
     * Replaced by Mauritania 1999 (CRS code 4702).
     */
    public const EPSG_JOUIK_1961 = 'urn:ogc:def:crs:EPSG::4679';

    /**
     * KKJ
     * Extent: Finland - onshore.
     */
    public const EPSG_KKJ = 'urn:ogc:def:crs:EPSG::4123';

    /**
     * KOC
     * Extent: Kuwait - onshore.
     */
    public const EPSG_KOC = 'urn:ogc:def:crs:EPSG::4246';

    /**
     * KOSOVAREF01
     * Extent: Kosovo.
     * In Kosovo replaces MGI 1901 (CRS code 3906).
     */
    public const EPSG_KOSOVAREF01 = 'urn:ogc:def:crs:EPSG::9140';

    /**
     * KSA-GRF17
     * Extent: Saudi Arabia - onshore and offshore.
     */
    public const EPSG_KSA_GRF17 = 'urn:ogc:def:crs:EPSG::9333';

    /**
     * KUDAMS
     * Extent: Kuwait - Kuwait City.
     */
    public const EPSG_KUDAMS = 'urn:ogc:def:crs:EPSG::4319';

    /**
     * Kalianpur 1880
     * Extent: Bangladesh - onshore; India - mainland onshore; Myanmar (Burma) - onshore; Pakistan - onshore.
     */
    public const EPSG_KALIANPUR_1880 = 'urn:ogc:def:crs:EPSG::4243';

    /**
     * Kalianpur 1937
     * Extent: Bangladesh - onshore; India - mainland onshore; Myanmar - onshore and Moattama area offshore; Pakistan -
     * onshore.
     * Adopts 1937 metric conversion of 0.30479841 metres per Indian foot.
     */
    public const EPSG_KALIANPUR_1937 = 'urn:ogc:def:crs:EPSG::4144';

    /**
     * Kalianpur 1962
     * Extent: Pakistan - onshore and offshore.
     * Adopts 1962 metric conversion of 0.3047996 metres per Indian foot.
     */
    public const EPSG_KALIANPUR_1962 = 'urn:ogc:def:crs:EPSG::4145';

    /**
     * Kalianpur 1975
     * Extent: India - mainland onshore.
     * Adopts 1975 metric conversion of 0.3047995 metres per Indian foot.
     */
    public const EPSG_KALIANPUR_1975 = 'urn:ogc:def:crs:EPSG::4146';

    /**
     * Kandawala
     * Extent: Sri Lanka - onshore.
     */
    public const EPSG_KANDAWALA = 'urn:ogc:def:crs:EPSG::4244';

    /**
     * Karbala 1979
     * Extent: Iraq - onshore.
     * Geodetic network established by Polservice consortium. Replaces Nahrwan 1934 (CRS code 4744). Replaced by IGRS
     * (CRS code 3889). At time of record population, information regarding usage within oil sector is not available.
     */
    public const EPSG_KARBALA_1979 = 'urn:ogc:def:crs:EPSG::4743';

    /**
     * Kasai 1953
     * Extent: The Democratic Republic of the Congo (Zaire) - Kasai - south of 5°S and east of 21°30'E.
     */
    public const EPSG_KASAI_1953 = 'urn:ogc:def:crs:EPSG::4696';

    /**
     * Katanga 1955
     * Extent: The Democratic Republic of the Congo (Zaire) - Katanga.
     */
    public const EPSG_KATANGA_1955 = 'urn:ogc:def:crs:EPSG::4695';

    /**
     * Kertau (RSO)
     * Extent: Malaysia - West Malaysia; Singapore.
     * Used only for metrication of RSO grid. See Kertau 1968 (CRS code 4245) for other purposes. Replaced by GDM2000
     * (CRS code 4742).
     */
    public const EPSG_KERTAU_RSO = 'urn:ogc:def:crs:EPSG::4751';

    /**
     * Kertau 1968
     * Extent: Malaysia - West Malaysia onshore and offshore east coast; Singapore - onshore and offshore.
     * Not used for metrication of RSO grid - see Kertau (RSO) (CRS code 4751). Replaced by GDM2000 (CRS code 4742).
     */
    public const EPSG_KERTAU_1968 = 'urn:ogc:def:crs:EPSG::4245';

    /**
     * Korea 2000
     * Extent: Republic of Korea (South Korea) - onshore and offshore.
     */
    public const EPSG_KOREA_2000 = 'urn:ogc:def:crs:EPSG::4737';

    /**
     * Korean 1985
     * Extent: Republic of Korea (South Korea) - onshore.
     * Replaces use of Tokyo datum.
     */
    public const EPSG_KOREAN_1985 = 'urn:ogc:def:crs:EPSG::4162';

    /**
     * Korean 1995
     * Extent: Republic of Korea (South Korea) - onshore.
     */
    public const EPSG_KOREAN_1995 = 'urn:ogc:def:crs:EPSG::4166';

    /**
     * Kousseri
     * Extent: Cameroon - N'Djamena area.
     */
    public const EPSG_KOUSSERI = 'urn:ogc:def:crs:EPSG::4198';

    /**
     * Kusaie 1951
     * Extent: Federated States of Micronesia - Kosrae (Kusaie).
     */
    public const EPSG_KUSAIE_1951 = 'urn:ogc:def:crs:EPSG::4735';

    /**
     * Kyrg-06
     * Extent: Kyrgyzstan.
     * Replaces usage of Pulkovo 1942 in Kyrgyzstan from 7th October 2010.
     */
    public const EPSG_KYRG_06 = 'urn:ogc:def:crs:EPSG::7686';

    /**
     * LGD2006
     * Extent: Libya - onshore and offshore.
     * Replaces ELD79.
     */
    public const EPSG_LGD2006 = 'urn:ogc:def:crs:EPSG::4754';

    /**
     * LKS92
     * Extent: Latvia - onshore and offshore.
     * This name is also used for a projected CRS (see projCRS code 3059).
     */
    public const EPSG_LKS92 = 'urn:ogc:def:crs:EPSG::4661';

    /**
     * LKS94
     * Extent: Lithuania - onshore and offshore.
     */
    public const EPSG_LKS94 = 'urn:ogc:def:crs:EPSG::4669';

    /**
     * LTF2004(G)
     * Extent: France and Italy - on or related to the rail route from Lyon to Turin.
     */
    public const EPSG_LTF2004_G = 'urn:ogc:def:crs:EPSG::9547';

    /**
     * La Canoa
     * Extent: Venezuela - onshore.
     * This CRS is incorporated within PSAD56. See CRS code 4248.
     */
    public const EPSG_LA_CANOA = 'urn:ogc:def:crs:EPSG::4247';

    /**
     * Lake
     * Extent: Venezuela - Lake Maracaibo area, onshore and offshore in lake.
     */
    public const EPSG_LAKE = 'urn:ogc:def:crs:EPSG::4249';

    /**
     * Lao 1993
     * Extent: Laos.
     * Replaces Vientiane 1982. Replaced by Lao 1997. Lao 1993 coordinate values are within 1m of Lao 1997 values.
     */
    public const EPSG_LAO_1993 = 'urn:ogc:def:crs:EPSG::4677';

    /**
     * Lao 1997
     * Extent: Laos.
     * Replaces Lao 1993 which in turn replaced Vientiane 1982. Lao 1993 coordinate values are within 1m of Lao 1997
     * values. Vientiane 1982 coordinate values are within 3m of Lao 1997 values.
     */
    public const EPSG_LAO_1997 = 'urn:ogc:def:crs:EPSG::4678';

    /**
     * Le Pouce 1934
     * Extent: Mauritius - mainland onshore.
     * Densified with a GPS-derived coordinate set for 80 stations in 1994. This 1994 coordinate set is sometimes
     * referred to as "Mauritius 1994".
     */
    public const EPSG_LE_POUCE_1934 = 'urn:ogc:def:crs:EPSG::4699';

    /**
     * Leigon
     * Extent: Ghana - onshore and offshore.
     * Replaced Accra (code 4168) from 1978.
     */
    public const EPSG_LEIGON = 'urn:ogc:def:crs:EPSG::4250';

    /**
     * Liberia 1964
     * Extent: Liberia - onshore.
     */
    public const EPSG_LIBERIA_1964 = 'urn:ogc:def:crs:EPSG::4251';

    /**
     * Lisbon
     * Extent: Portugal - mainland - onshore.
     * Replaces Lisbon 1890 system which used Bessel 1841 ellipsoid (code 4666). Replaced by Datum 73 (code 4274).
     */
    public const EPSG_LISBON = 'urn:ogc:def:crs:EPSG::4207';

    /**
     * Lisbon (Lisbon)
     * Extent: Portugal - mainland - onshore.
     * Replaces Lisbon 1890 (Lisbon) system which used Bessel 1841 ellipsoid (code 4904). Replaced by Datum 73 (code
     * 4274).
     */
    public const EPSG_LISBON_LISBON = 'urn:ogc:def:crs:EPSG::4803';

    /**
     * Lisbon 1890
     * Extent: Portugal - mainland - onshore.
     * Replaced by Lisbon 1937 system which uses International 1924 ellipsoid (code 4207).
     */
    public const EPSG_LISBON_1890 = 'urn:ogc:def:crs:EPSG::4666';

    /**
     * Lisbon 1890 (Lisbon)
     * Extent: Portugal - mainland - onshore.
     * Replaced by Lisbon 1937 system which uses International 1924 ellipsoid (code 4803).
     */
    public const EPSG_LISBON_1890_LISBON = 'urn:ogc:def:crs:EPSG::4904';

    /**
     * Locodjo 1965
     * Extent: Côte d'Ivoire (Ivory Coast) - onshore and offshore.
     * Replaced by Abidjan 1987 (EPSG code 4143).
     */
    public const EPSG_LOCODJO_1965 = 'urn:ogc:def:crs:EPSG::4142';

    /**
     * Loma Quintana
     * Extent: Venezuela - onshore north of approximately 7°45'N.
     * Replaced by La Canoa (code 4247).
     */
    public const EPSG_LOMA_QUINTANA = 'urn:ogc:def:crs:EPSG::4288';

    /**
     * Lome
     * Extent: Togo - onshore and offshore.
     */
    public const EPSG_LOME = 'urn:ogc:def:crs:EPSG::4252';

    /**
     * Luxembourg 1930
     * Extent: Luxembourg.
     */
    public const EPSG_LUXEMBOURG_1930 = 'urn:ogc:def:crs:EPSG::4181';

    /**
     * Luzon 1911
     * Extent: Philippines - onshore.
     * Replaced by PRS92 (CRS code 4683).
     */
    public const EPSG_LUZON_1911 = 'urn:ogc:def:crs:EPSG::4253';

    /**
     * M'poraloko
     * Extent: Gabon - onshore and offshore.
     */
    public const EPSG_MPORALOKO = 'urn:ogc:def:crs:EPSG::4266';

    /**
     * MACARIO SOLIS
     * Extent: Panama - onshore and offshore.
     */
    public const EPSG_MACARIO_SOLIS = 'urn:ogc:def:crs:EPSG::5371';

    /**
     * MAGNA-SIRGAS
     * Extent: Colombia - onshore and offshore. Includes San Andres y Providencia, Malpelo Islands, Roncador Bank,
     * Serrana Bank and Serranilla Bank.
     * Replaces Bogota 1975 (CRS code .4218).
     */
    public const EPSG_MAGNA_SIRGAS = 'urn:ogc:def:crs:EPSG::4686';

    /**
     * MARGEN
     * Extent: Bolivia.
     * Replaces PSAD56 (CRS code 4248) in Bolivia.
     */
    public const EPSG_MARGEN = 'urn:ogc:def:crs:EPSG::5354';

    /**
     * MGI
     * Extent: Austria.
     * Retrospectively defined as derived after the introduction of geographic 3D CRS (code 9267).
     */
    public const EPSG_MGI = 'urn:ogc:def:crs:EPSG::4312';

    /**
     * MGI (Ferro)
     * Extent: Austria. Bosnia and Herzegovina. Croatia - onshore. Kosovo. Montenegro - onshore. North Macedonia.
     * Serbia. Slovenia - onshore.
     * Replaced by MGI (CRS code 4312) in Austria and MGI 1901 (CRS code 3906) in former Yugoslavia.
     */
    public const EPSG_MGI_FERRO = 'urn:ogc:def:crs:EPSG::4805';

    /**
     * MGI 1901
     * Extent: Bosnia and Herzegovina; Croatia - onshore; Kosovo; Montenegro - onshore; North Macedonia; Serbia;
     * Slovenia - onshore.
     * Adopted in 1924 replacing MGI (Ferro) (CRS code 4805). Densified in 1948. In Slovenia replaced by D96 (CRS code
     * 4765). In Croatia replaced by HTRS96 (CRS code 4761). In Serbia replaced by SREF98 and then by SRB_ETRS89
     * (STRS00) (CRS codes 4075 and 8691).
     */
    public const EPSG_MGI_1901 = 'urn:ogc:def:crs:EPSG::3906';

    /**
     * MML07-IRF
     * Extent: UK - on or related to the Midland Mainline rail route from Sheffield to London.
     * Intermediate CRS created in 2020 to assist the emulation of the ETRS89 / MML07 SnakeGrid projected CRS t(code
     * 9373) hrough transformation ETRS89 to MML07-IRF (1) (code 9369) used in conjunction with the MML07-TM map
     * projection (code 9370).
     */
    public const EPSG_MML07_IRF = 'urn:ogc:def:crs:EPSG::9372';

    /**
     * MMN
     * Extent: Argentina - Tierra del Fuego onshore.
     */
    public const EPSG_MMN = 'urn:ogc:def:crs:EPSG::9251';

    /**
     * MMS
     * Extent: Argentina - Tierra del Fuego onshore.
     */
    public const EPSG_MMS = 'urn:ogc:def:crs:EPSG::9253';

    /**
     * MOLDREF99
     * Extent: Moldova.
     */
    public const EPSG_MOLDREF99 = 'urn:ogc:def:crs:EPSG::4023';

    /**
     * MOP78
     * Extent: Wallis and Futuna - Wallis.
     * Replaced by RGWF96 (CRS code 8900) for geodetic survey and RGWF96 (lon-lat) (CRS code 8902) for GIS.
     */
    public const EPSG_MOP78 = 'urn:ogc:def:crs:EPSG::4639';

    /**
     * MTRF-2000
     * Extent: Saudi Arabia - onshore and offshore.
     * Replaces Ain el Abd (CRS 4204) in Saudi Arabia.
     */
    public const EPSG_MTRF_2000 = 'urn:ogc:def:crs:EPSG::8818';

    /**
     * Macao 1920
     * Extent: China - Macao - onshore and offshore.
     */
    public const EPSG_MACAO_1920 = 'urn:ogc:def:crs:EPSG::8428';

    /**
     * Macao 2008
     * Extent: China - Macao - onshore and offshore.
     * Locally sometimes referred to as ITRF2005, this is not strictly correct.
     */
    public const EPSG_MACAO_2008 = 'urn:ogc:def:crs:EPSG::8431';

    /**
     * Madrid 1870 (Madrid)
     * Extent: Spain - mainland onshore.
     * Replaced by ED50 in 1970.
     */
    public const EPSG_MADRID_1870_MADRID = 'urn:ogc:def:crs:EPSG::4903';

    /**
     * Madzansua
     * Extent: Mozambique - west - Tete province.
     * Replaced by values transformed to Tete GeogCRS (code 4127).
     */
    public const EPSG_MADZANSUA = 'urn:ogc:def:crs:EPSG::4128';

    /**
     * Mahe 1971
     * Extent: Seychelles - Mahe Island.
     * This CRS has no known local application. South East Island 1943 (CRS codes 6892 and 6915) is used for
     * topographic mapping, cadastral and hydrographic survey.
     */
    public const EPSG_MAHE_1971 = 'urn:ogc:def:crs:EPSG::4256';

    /**
     * Makassar
     * Extent: Indonesia - south west Sulawesi.
     */
    public const EPSG_MAKASSAR = 'urn:ogc:def:crs:EPSG::4257';

    /**
     * Makassar (Jakarta)
     * Extent: Indonesia - south west Sulawesi.
     */
    public const EPSG_MAKASSAR_JAKARTA = 'urn:ogc:def:crs:EPSG::4804';

    /**
     * Malongo 1987
     * Extent: Angola (Cabinda) - offshore; The Democratic Republic of the Congo (Zaire) - offshore.
     * Replaced Mhast (offshore) (CRS code 4705) in 1987. References to "Mhast" since 1987 often should have stated
     * "Malongo 1987".
     */
    public const EPSG_MALONGO_1987 = 'urn:ogc:def:crs:EPSG::4259';

    /**
     * Manoca 1962
     * Extent: Cameroon - coastal area.
     * Replaces Doula 1948 (code 4192). The intent of the Bukavu 1953 conference was to adopt the Clarke 1880 (RGS)
     * ellipsoid (code 7012) but in practice this CRS has used the IGN version.
     */
    public const EPSG_MANOCA_1962 = 'urn:ogc:def:crs:EPSG::4193';

    /**
     * Marcus Island 1952
     * Extent: Japan - onshore - Tokyo-to south of 28°N and east of 143°E - Minamitori-shima (Marcus Island).
     */
    public const EPSG_MARCUS_ISLAND_1952 = 'urn:ogc:def:crs:EPSG::4711';

    /**
     * Marshall Islands 1960
     * Extent: Marshall Islands - onshore. Wake atoll onshore.
     */
    public const EPSG_MARSHALL_ISLANDS_1960 = 'urn:ogc:def:crs:EPSG::4732';

    /**
     * Martinique 1938
     * Extent: Martinique - onshore.
     * Replaced by RRAF 1991 (CRS code 4558).
     */
    public const EPSG_MARTINIQUE_1938 = 'urn:ogc:def:crs:EPSG::4625';

    /**
     * Massawa
     * Extent: Eritrea - onshore and offshore.
     */
    public const EPSG_MASSAWA = 'urn:ogc:def:crs:EPSG::4262';

    /**
     * Maupiti 83
     * Extent: French Polynesia - Society Islands - Maupiti.
     * Replaced by RGPF, CRS code 4687.
     */
    public const EPSG_MAUPITI_83 = 'urn:ogc:def:crs:EPSG::4692';

    /**
     * Mauritania 1999
     * Extent: Mauritania - onshore and offshore.
     * Replaces all earlier CRSs.
     */
    public const EPSG_MAURITANIA_1999 = 'urn:ogc:def:crs:EPSG::4702';

    /**
     * Merchich
     * Extent: Africa - Morocco and Western Sahara - onshore.
     */
    public const EPSG_MERCHICH = 'urn:ogc:def:crs:EPSG::4261';

    /**
     * Mexico ITRF2008
     * Extent: Mexico - onshore and offshore.
     * Replaces Mexico ITRF92 (CRS code 4483) from December 2010.
     */
    public const EPSG_MEXICO_ITRF2008 = 'urn:ogc:def:crs:EPSG::6365';

    /**
     * Mexico ITRF92
     * Extent: Mexico - onshore and offshore.
     * Replaces NAD27 (CRS code 4267). Replaced by Mexico ITRF2008 (CRS code 6365) from December 2010.
     */
    public const EPSG_MEXICO_ITRF92 = 'urn:ogc:def:crs:EPSG::4483';

    /**
     * Mhast (offshore)
     * Extent: Angola (Cabinda) - offshore; The Democratic Republic of the Congo (Zaire) - offshore.
     * Used by CABGOC. Differs from Mhast (onshore) by approximately 10m. Replaced by Malongo 1987 (CRS code 4259) in
     * 1987.
     */
    public const EPSG_MHAST_OFFSHORE = 'urn:ogc:def:crs:EPSG::4705';

    /**
     * Mhast (onshore)
     * Extent: Angola (Cabinda) - onshore and offshore; The Democratic Republic of the Congo (Zaire) - onshore coastal
     * area and offshore.
     * Adopted by CABGOC with intention of being Mhast 1951 (CRS code 4703) but because it uses a different ellipsoid
     * it is a different system. From 1979, offshore use replaced by Mhast (offshore) (CRS code 4705) from which this
     * CRS differes by approx. 10m.
     */
    public const EPSG_MHAST_ONSHORE = 'urn:ogc:def:crs:EPSG::4704';

    /**
     * Mhast 1951
     * Extent: Angola - Cabinda.
     * A variation of this system has been adopted by the oil industry but using the International 1924 ellipsoid - see
     * Mhast (onshore) and Mhast (offshore) (codes 4704 and 4705).
     */
    public const EPSG_MHAST_1951 = 'urn:ogc:def:crs:EPSG::4703';

    /**
     * Midway 1961
     * Extent: United States Minor Outlying Islands - Midway Islands - Sand Island and Eastern Island.
     */
    public const EPSG_MIDWAY_1961 = 'urn:ogc:def:crs:EPSG::4727';

    /**
     * Minna
     * Extent: Nigeria - onshore and offshore.
     */
    public const EPSG_MINNA = 'urn:ogc:def:crs:EPSG::4263';

    /**
     * Monte Mario
     * Extent: Italy - onshore and offshore; San Marino, Vatican City State.
     */
    public const EPSG_MONTE_MARIO = 'urn:ogc:def:crs:EPSG::4265';

    /**
     * Monte Mario (Rome)
     * Extent: Italy - onshore and offshore; San Marino, Vatican City State.
     */
    public const EPSG_MONTE_MARIO_ROME = 'urn:ogc:def:crs:EPSG::4806';

    /**
     * Montserrat 1958
     * Extent: Montserrat - onshore.
     */
    public const EPSG_MONTSERRAT_1958 = 'urn:ogc:def:crs:EPSG::4604';

    /**
     * Moorea 87
     * Extent: French Polynesia - Society Islands - Moorea.
     * Replaces Tahiti 52 (CRS code 4628) in Moorea. Replaced by RGPF (CRS code 4687).
     */
    public const EPSG_MOOREA_87 = 'urn:ogc:def:crs:EPSG::4691';

    /**
     * Mount Dillon
     * Extent: Trinidad and Tobago - Tobago - onshore.
     */
    public const EPSG_MOUNT_DILLON = 'urn:ogc:def:crs:EPSG::4157';

    /**
     * Moznet
     * Extent: Mozambique - onshore and offshore.
     */
    public const EPSG_MOZNET = 'urn:ogc:def:crs:EPSG::4130';

    /**
     * NAD27
     * Extent: North and central America: Antigua and Barbuda - onshore. Bahamas - onshore plus offshore over internal
     * continental shelf only. Belize - onshore. British Virgin Islands - onshore. Canada onshore - Alberta, British
     * Columbia, Manitoba, New Brunswick, Newfoundland and Labrador, Northwest Territories, Nova Scotia, Nunavut,
     * Ontario, Prince Edward Island, Quebec, Saskatchewan and Yukon - plus offshore east coast. Cuba - onshore and
     * offshore. El Salvador - onshore. Guatemala - onshore. Honduras - onshore. Panama - onshore. Puerto Rico -
     * onshore. Mexico - onshore plus offshore east coast. Nicaragua - onshore. United States (USA) onshore and
     * offshore - Alabama, Alaska, Arizona, Arkansas, California, Colorado, Connecticut, Delaware, Florida, Georgia,
     * Idaho, Illinois, Indiana, Iowa, Kansas, Kentucky, Louisiana, Maine, Maryland, Massachusetts, Michigan,
     * Minnesota, Mississippi, Missouri, Montana, Nebraska, Nevada, New Hampshire, New Jersey, New Mexico, New York,
     * North Carolina, North Dakota, Ohio, Oklahoma, Oregon, Pennsylvania, Rhode Island, South Carolina, South Dakota,
     * Tennessee, Texas, Utah, Vermont, Virginia, Washington, West Virginia, Wisconsin and Wyoming - plus offshore . US
     * Virgin Islands - onshore.
     * Note: this CRS includes longitudes which are POSITIVE EAST. Replaced by NAD27(76) (code 4608) in Ontario, CGQ77
     * (code 4609) in Quebec, Mexican Datum of  1993 (code 4483) in Mexico, NAD83 (code 4269) in Canada (excl. Ontario
     * & Quebec) & USA.
     */
    public const EPSG_NAD27 = 'urn:ogc:def:crs:EPSG::4267';

    /**
     * NAD27(76)
     * Extent: Canada - Ontario.
     * Note: this CRS includes longitudes which are POSITIVE EAST.
     */
    public const EPSG_NAD27_76 = 'urn:ogc:def:crs:EPSG::4608';

    /**
     * NAD27(CGQ77)
     * Extent: Canada - Quebec.
     * Note: this CRS includes longitudes which are POSITIVE EAST.
     */
    public const EPSG_NAD27_CGQ77 = 'urn:ogc:def:crs:EPSG::4609';

    /**
     * NAD83
     * Extent: North America - onshore and offshore: Canada - Alberta; British Columbia; Manitoba; New Brunswick;
     * Newfoundland and Labrador; Northwest Territories; Nova Scotia; Nunavut; Ontario; Prince Edward Island; Quebec;
     * Saskatchewan; Yukon. Puerto Rico. United States (USA) - Alabama; Alaska; Arizona; Arkansas; California;
     * Colorado; Connecticut; Delaware; Florida; Georgia; Hawaii; Idaho; Illinois; Indiana; Iowa; Kansas; Kentucky;
     * Louisiana; Maine; Maryland; Massachusetts; Michigan; Minnesota; Mississippi; Missouri; Montana; Nebraska;
     * Nevada; New Hampshire; New Jersey; New Mexico; New York; North Carolina; North Dakota; Ohio; Oklahoma; Oregon;
     * Pennsylvania; Rhode Island; South Carolina; South Dakota; Tennessee; Texas; Utah; Vermont; Virginia; Washington;
     * West Virginia; Wisconsin; Wyoming. US Virgin Islands. British Virgin Islands.
     * Longitude is POSITIVE EAST. The adjustment included connections to Greenland and Mexico but the system was not
     * adopted there. For applications with an accuracy of better than 1m replaced by NAD83(HARN) in the US and PRVI
     * and by NAD83(CSRS) in Canada.
     */
    public const EPSG_NAD83 = 'urn:ogc:def:crs:EPSG::4269';

    /**
     * NAD83(2011)
     * Extent: Puerto Rico - onshore and offshore. United States (USA) onshore and offshore - Alabama; Alaska; Arizona;
     * Arkansas; California; Colorado; Connecticut; Delaware; Florida; Georgia; Idaho; Illinois; Indiana; Iowa; Kansas;
     * Kentucky; Louisiana; Maine; Maryland; Massachusetts; Michigan; Minnesota; Mississippi; Missouri; Montana;
     * Nebraska; Nevada; New Hampshire; New Jersey; New Mexico; New York; North Carolina; North Dakota; Ohio; Oklahoma;
     * Oregon; Pennsylvania; Rhode Island; South Carolina; South Dakota; Tennessee; Texas; Utah; Vermont; Virginia;
     * Washington; West Virginia; Wisconsin; Wyoming. US Virgin Islands - onshore and offshore.
     * Note: this CRS includes longitudes which are POSITIVE EAST. Replaces NAD83(CORS96) and NAD83(NSRS2007) (CRS
     * codes 6783 and 4759).
     */
    public const EPSG_NAD83_2011 = 'urn:ogc:def:crs:EPSG::6318';

    /**
     * NAD83(CORS96)
     * Extent: Puerto Rico - onshore and offshore. United States (USA) onshore and offshore - Alabama; Alaska; Arizona;
     * Arkansas; California; Colorado; Connecticut; Delaware; Florida; Georgia; Idaho; Illinois; Indiana; Iowa; Kansas;
     * Kentucky; Louisiana; Maine; Maryland; Massachusetts; Michigan; Minnesota; Mississippi; Missouri; Montana;
     * Nebraska; Nevada; New Hampshire; New Jersey; New Mexico; New York; North Carolina; North Dakota; Ohio; Oklahoma;
     * Oregon; Pennsylvania; Rhode Island; South Carolina; South Dakota; Tennessee; Texas; Utah; Vermont; Virginia;
     * Washington; West Virginia; Wisconsin; Wyoming. US Virgin Islands - onshore and offshore.
     * Note: this CRS includes POSITIVE EAST longitudes. Replaced by NAD83(2011) (CRS code 6318) from 2011-09-06.
     */
    public const EPSG_NAD83_CORS96 = 'urn:ogc:def:crs:EPSG::6783';

    /**
     * NAD83(CSRS)
     * Extent: Canada - onshore and offshore - Alberta; British Columbia; Manitoba; New Brunswick; Newfoundland and
     * Labrador; Northwest Territories; Nova Scotia; Nunavut; Ontario; Prince Edward Island; Quebec; Saskatchewan;
     * Yukon.
     * Includes all versions of NAD83(CSRS) from v2 [CSRS98] onwards without specific identification. As such it has an
     * accuracy of approximately 1m. Note: this CRS includes longitudes which are POSITIVE EAST.
     */
    public const EPSG_NAD83_CSRS = 'urn:ogc:def:crs:EPSG::4617';

    /**
     * NAD83(CSRS)v2
     * Extent: Canada - onshore and offshore - Alberta; British Columbia; Manitoba; New Brunswick; Newfoundland and
     * Labrador; Northwest Territories; Nova Scotia; Nunavut; Ontario; Prince Edward Island; Quebec; Saskatchewan;
     * Yukon.
     * Adopted by the Canadian federal government from 1998-01-01 and by the provincial governments of British
     * Columbia, New Brunswick, Prince Edward Island and Quebec. Replaces NAD83(CSRS96). Replaced by NAD83(CSRS)v3
     * (code 8240). Longitudes are POSITIVE EAST.
     */
    public const EPSG_NAD83_CSRS_V2 = 'urn:ogc:def:crs:EPSG::8237';

    /**
     * NAD83(CSRS)v3
     * Extent: Canada - onshore and offshore - Alberta; British Columbia; Manitoba; New Brunswick; Newfoundland and
     * Labrador; Northwest Territories; Nova Scotia; Nunavut; Ontario; Prince Edward Island; Quebec; Saskatchewan;
     * Yukon.
     * Adopted by the Canadian federal government from 1999-01-01 and by the provincial governments of Alberta, British
     * Columbia, Manitoba, Newfoundland and Labrador, Nova Scotia, Ontario and Saskatchewan. Replaces NAD83(CSRS)v2.
     * Replaced by NAD83(CSRS)v4.
     */
    public const EPSG_NAD83_CSRS_V3 = 'urn:ogc:def:crs:EPSG::8240';

    /**
     * NAD83(CSRS)v4
     * Extent: Canada - onshore and offshore - Alberta; British Columbia; Manitoba; New Brunswick; Newfoundland and
     * Labrador; Northwest Territories; Nova Scotia; Nunavut; Ontario; Prince Edward Island; Quebec; Saskatchewan;
     * Yukon.
     * Adopted by the Canadian federal government from 2002-01-01 and by the provincial governments of Alberta and
     * British Columbia. Replaces NAD83(CSRS)v3. Replaced by NAD83(CSRS)v5 (CRS code 8249). Longitudes are POSITIVE
     * EAST.
     */
    public const EPSG_NAD83_CSRS_V4 = 'urn:ogc:def:crs:EPSG::8246';

    /**
     * NAD83(CSRS)v5
     * Extent: Canada - onshore and offshore - Alberta; British Columbia; Manitoba; New Brunswick; Newfoundland and
     * Labrador; Northwest Territories; Nova Scotia; Nunavut; Ontario; Prince Edward Island; Quebec; Saskatchewan;
     * Yukon.
     * Adopted by the Canadian federal government from 2006-01-01. Replaces NAD83(CSRS)v4. Replaced by NAD83(CSRS)v6
     * (CRS code 8252). Longitudes are POSITIVE EAST.
     */
    public const EPSG_NAD83_CSRS_V5 = 'urn:ogc:def:crs:EPSG::8249';

    /**
     * NAD83(CSRS)v6
     * Extent: Canada - onshore and offshore - Alberta; British Columbia; Manitoba; New Brunswick; Newfoundland and
     * Labrador; Northwest Territories; Nova Scotia; Nunavut; Ontario; Prince Edward Island; Quebec; Saskatchewan;
     * Yukon.
     * Adopted by the Canadian federal government from 2010-01-01 and the provincial governments of Alberta, British
     * Columbia, Manitoba, Newfoundland and Labrador, Nova Scotia, Ontario and Prince Edward Island. Replaces
     * NAD83(CSRS)v5. Replaced by NAD83(CSRS)v7.
     */
    public const EPSG_NAD83_CSRS_V6 = 'urn:ogc:def:crs:EPSG::8252';

    /**
     * NAD83(CSRS)v7
     * Extent: Canada - onshore and offshore - Alberta; British Columbia; Manitoba; New Brunswick; Newfoundland and
     * Labrador; Northwest Territories; Nova Scotia; Nunavut; Ontario; Prince Edward Island; Quebec; Saskatchewan;
     * Yukon.
     * Adopted by the Canadian federal government from 2017-05-01. Replaces NAD83(CSRS)v6. Longitudes are POSITIVE
     * EAST.
     */
    public const EPSG_NAD83_CSRS_V7 = 'urn:ogc:def:crs:EPSG::8255';

    /**
     * NAD83(CSRS96)
     * Extent: Canada - onshore and offshore - Alberta; British Columbia; Manitoba; New Brunswick; Newfoundland and
     * Labrador; Northwest Territories; Nova Scotia; Nunavut; Ontario; Prince Edward Island; Quebec; Saskatchewan;
     * Yukon.
     * Adopted by the Canadian federal government from 1996-01-01. Replaced by NAD83(CSRS)v2 (CRS code 8237). Note:
     * this CRS includes longitudes which are POSITIVE EAST.
     */
    public const EPSG_NAD83_CSRS96 = 'urn:ogc:def:crs:EPSG::8232';

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
     * In Continental US, American Samoa, Guam/NMI and PRVI, replaces NAD83(HARN). In Continental US, Puerto Rico and
     * US Virgin Islands replaced by NAD83(NSRS2007). In American Samoa and Hawaii replaced by NAD83(PA11). In Guam/NMI
     * replaced by NAD83(MA11).
     */
    public const EPSG_NAD83_FBN = 'urn:ogc:def:crs:EPSG::8860';

    /**
     * NAD83(HARN Corrected)
     * Extent: Puerto Rico and US Virgin Islands - onshore.
     * Note: this CRS includes POSITIVE EAST longitudes. In PRVI replaces NAD83(HARN) = NAD83(1993 PRVI) to correct
     * errors. Replaced by NAD83(FBN) = NAD83(2002 PRVI).
     */
    public const EPSG_NAD83_HARN_CORRECTED = 'urn:ogc:def:crs:EPSG::8545';

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
     * In CONUS, AK, HI and PRVI replaces NAD83 for applications with an accuracy of better than 1m. Replaced by
     * NAD83(FBN) in CONUS, American Samoa and Guam / NMI, by NAD83(NSRS2007) in Alaska, by NAD83(PA11) in Hawaii and
     * by NAD83(HARN Corrected) in PRVI.
     */
    public const EPSG_NAD83_HARN = 'urn:ogc:def:crs:EPSG::4152';

    /**
     * NAD83(MA11)
     * Extent: Guam, Northern Mariana Islands and Palau; onshore and offshore.
     * Note: this CRS includes longitudes which are POSITIVE EAST. Replaces NAD83(HARN) (GGN93) and NAD83(FBN) in Guam.
     */
    public const EPSG_NAD83_MA11 = 'urn:ogc:def:crs:EPSG::6325';

    /**
     * NAD83(MARP00)
     * Extent: Guam, Northern Mariana Islands and Palau; onshore and offshore.
     * Replaces NAD83(HARN) (GGN93) and NAD83(FBN) in Guam. Replaced by NAD83(MA11).
     */
    public const EPSG_NAD83_MARP00 = 'urn:ogc:def:crs:EPSG::9072';

    /**
     * NAD83(NSRS2007)
     * Extent: Puerto Rico - onshore and offshore. United States (USA) onshore and offshore - Alabama; Alaska; Arizona;
     * Arkansas; California; Colorado; Connecticut; Delaware; Florida; Georgia; Idaho; Illinois; Indiana; Iowa; Kansas;
     * Kentucky; Louisiana; Maine; Maryland; Massachusetts; Michigan; Minnesota; Mississippi; Missouri; Montana;
     * Nebraska; Nevada; New Hampshire; New Jersey; New Mexico; New York; North Carolina; North Dakota; Ohio; Oklahoma;
     * Oregon; Pennsylvania; Rhode Island; South Carolina; South Dakota; Tennessee; Texas; Utah; Vermont; Virginia;
     * Washington; West Virginia; Wisconsin; Wyoming. US Virgin Islands - onshore and offshore.
     * Note: this CRS includes POSITIVE EAST longitudes. Replaces NAD83(HARN) and NAD83(FBN). Replaced by NAD83(2011).
     */
    public const EPSG_NAD83_NSRS2007 = 'urn:ogc:def:crs:EPSG::4759';

    /**
     * NAD83(PA11)
     * Extent: American Samoa, Marshall Islands, United States (USA) - Hawaii, United States minor outlying islands;
     * onshore and offshore.
     * Note: this CRS includes longitudes which are POSITIVE EAST. Replaces NAD83(HARN) and NAD83(FBN) in Hawaii and
     * American Samoa.
     */
    public const EPSG_NAD83_PA11 = 'urn:ogc:def:crs:EPSG::6322';

    /**
     * NAD83(PACP00)
     * Extent: American Samoa, Marshall Islands, United States (USA) - Hawaii, United States minor outlying islands;
     * onshore and offshore.
     * Note: this CRS includes longitudes which are POSITIVE EAST. Replaces NAD83(HARN) and NAD83(FBN) in Hawaii and
     * American Samoa. Replaced by NAD83(PA11).
     */
    public const EPSG_NAD83_PACP00 = 'urn:ogc:def:crs:EPSG::9075';

    /**
     * NEA74 Noumea
     * Extent: New Caledonia - Grande Terre - Noumea district.
     * Replaced by RGNC91-93 (CRS code 4749).
     */
    public const EPSG_NEA74_NOUMEA = 'urn:ogc:def:crs:EPSG::4644';

    /**
     * NGN
     * Extent: Kuwait - onshore.
     */
    public const EPSG_NGN = 'urn:ogc:def:crs:EPSG::4318';

    /**
     * NGO 1948
     * Extent: Norway - onshore.
     */
    public const EPSG_NGO_1948 = 'urn:ogc:def:crs:EPSG::4273';

    /**
     * NGO 1948 (Oslo)
     * Extent: Norway - onshore.
     */
    public const EPSG_NGO_1948_OSLO = 'urn:ogc:def:crs:EPSG::4817';

    /**
     * NSWC 9Z-2
     * Extent: World.
     */
    public const EPSG_NSWC_9Z_2 = 'urn:ogc:def:crs:EPSG::4276';

    /**
     * NTF
     * Extent: France - onshore - mainland and Corsica.
     */
    public const EPSG_NTF = 'urn:ogc:def:crs:EPSG::4275';

    /**
     * NTF (Paris)
     * Extent: France - onshore - mainland and Corsica.
     */
    public const EPSG_NTF_PARIS = 'urn:ogc:def:crs:EPSG::4807';

    /**
     * NZGD2000
     * Extent: New Zealand - onshore and offshore. Includes Antipodes Islands, Auckland Islands, Bounty Islands,
     * Chatham Islands, Cambell Island, Kermadec Islands, Raoul Island and Snares Islands.
     * Replaces NZGD49 (code 4272) and CI79 (code 4673) from March 2000.
     */
    public const EPSG_NZGD2000 = 'urn:ogc:def:crs:EPSG::4167';

    /**
     * NZGD49
     * Extent: New Zealand - North Island, South Island, Stewart Island - onshore and nearshore.
     * Replaced by NZGD2000 (CRS code 4167) in March 2000.
     */
    public const EPSG_NZGD49 = 'urn:ogc:def:crs:EPSG::4272';

    /**
     * Nahrwan 1934
     * Extent: Iraq - onshore; Iran - onshore northern Gulf coast and west bordering southeast Iraq.
     * In Iran, replaced by FD58. In Iraq, replaced by Karbala 1979.
     */
    public const EPSG_NAHRWAN_1934 = 'urn:ogc:def:crs:EPSG::4744';

    /**
     * Nahrwan 1967
     * Extent: Arabian Gulf; Qatar - offshore; United Arab Emirates (UAE) - Abu Dhabi; Dubai; Sharjah; Ajman; Fujairah;
     * Ras Al Kaimah; Umm Al Qaiwain - onshore and offshore.
     */
    public const EPSG_NAHRWAN_1967 = 'urn:ogc:def:crs:EPSG::4270';

    /**
     * Nakhl-e Ghanem
     * Extent: Iran - Kangan district.
     */
    public const EPSG_NAKHL_E_GHANEM = 'urn:ogc:def:crs:EPSG::4693';

    /**
     * Naparima 1955
     * Extent: Trinidad and Tobago - Trinidad - onshore.
     * Extended to Tobago as Naparima 1972. (Note: Naparima 1972 is not used in Trinidad).
     */
    public const EPSG_NAPARIMA_1955 = 'urn:ogc:def:crs:EPSG::4158';

    /**
     * Naparima 1972
     * Extent: Trinidad and Tobago - Tobago - onshore.
     * Naparima 1972 is an extension to Tobago of the Naparima 1955 network of Trinidad.
     */
    public const EPSG_NAPARIMA_1972 = 'urn:ogc:def:crs:EPSG::4271';

    /**
     * Nepal 1981
     * Extent: Nepal.
     * Adopts 1937 metric conversion of 0.30479841 metres per Indian foot.
     */
    public const EPSG_NEPAL_1981 = 'urn:ogc:def:crs:EPSG::6207';

    /**
     * New Beijing
     * Extent: China - onshore.
     * Replaces Beijing 1954 (CRS code 4214). Replaced by CGCS2000 (code 4490).
     */
    public const EPSG_NEW_BEIJING = 'urn:ogc:def:crs:EPSG::4555';

    /**
     * Nord Sahara 1959
     * Extent: Algeria - onshore and offshore.
     * Sometimes incorrectly referred to as Voirol Unifie 1960: this is NOT a GeogCRS but two projected CRSs based on
     * Nord Sahara 1959 (codes 30791-92). Strictly applicable only to north of 32°N but extended southwards
     * non-homogoneously by oil industry.
     */
    public const EPSG_NORD_SAHARA_1959 = 'urn:ogc:def:crs:EPSG::4307';

    /**
     * Nouakchott 1965
     * Extent: Mauritania - coastal area south of Cape Timiris.
     * Replaced by Mauritania 1999 (CRS code 4702).
     */
    public const EPSG_NOUAKCHOTT_1965 = 'urn:ogc:def:crs:EPSG::4680';

    /**
     * ONGD14
     * Extent: Oman - onshore and offshore.
     * In Oman replaces usage of WGS 84 (G873) from 2014. Replaced by ONGD17 (CRS code 9294) from March 2019.
     */
    public const EPSG_ONGD14 = 'urn:ogc:def:crs:EPSG::7373';

    /**
     * ONGD17
     * Extent: Oman - onshore and offshore.
     * Replaces ONGD14 (CRS code 7373) from March 2019.
     */
    public const EPSG_ONGD17 = 'urn:ogc:def:crs:EPSG::9294';

    /**
     * OS(SN)80
     * Extent: Ireland - onshore. United Kingdom (UK) - onshore - England; Scotland; Wales; Northern Ireland. Isle of
     * Man.
     */
    public const EPSG_OS_SN_80 = 'urn:ogc:def:crs:EPSG::4279';

    /**
     * OSGB 1936
     * Extent: United Kingdom (UK) - offshore to boundary of UKCS within 49°45'N to 61°N and 9°W to 2°E; onshore
     * Great Britain (England, Wales and Scotland). Isle of Man onshore.
     */
    public const EPSG_OSGB_1936 = 'urn:ogc:def:crs:EPSG::4277';

    /**
     * OSGB70
     * Extent: United Kingdom (UK) - Great Britain - England and Wales onshore, Scotland onshore and Western Isles
     * nearshore; Isle of Man onshore.
     */
    public const EPSG_OSGB70 = 'urn:ogc:def:crs:EPSG::4278';

    /**
     * OSNI 1952
     * Extent: United Kingdom (UK) - Northern Ireland (Ulster) - onshore.
     * Replaced by 1975 Mapping Adjustment alias TM75. See CRS code 4300.
     */
    public const EPSG_OSNI_1952 = 'urn:ogc:def:crs:EPSG::4188';

    /**
     * Observatario
     * Extent: Mozambique - south.
     * Replaced by values transformed to Tete geogCRS (code 4127).
     */
    public const EPSG_OBSERVATARIO = 'urn:ogc:def:crs:EPSG::4129';

    /**
     * Ocotepeque 1935
     * Extent: Costa Rica; El Salvador; Guatemala; Honduras; Nicaragua.
     * Replaced in Costa Rica by Costa Rica 2005 (CR05) from March 2007 and replaced in El Salvador by SIRGAS_ES2007
     * from August 2007.
     */
    public const EPSG_OCOTEPEQUE_1935 = 'urn:ogc:def:crs:EPSG::5451';

    /**
     * Old Hawaiian
     * Extent: United States (USA) - Hawaii - main islands onshore.
     * Note: this CRS includes longitudes which are POSITIVE EAST.
     */
    public const EPSG_OLD_HAWAIIAN = 'urn:ogc:def:crs:EPSG::4135';

    /**
     * PD/83
     * Extent: Germany - Thuringen.
     * Consistent with DHDN (CRS code 4314) at the 1-metre level. For low accuracy applications PD/83 can be considered
     * the same as DHDN.
     */
    public const EPSG_PD_83 = 'urn:ogc:def:crs:EPSG::4746';

    /**
     * PN68
     * Extent: Spain - Canary Islands onshore.
     * On western islands (El Hierro, La Gomera, La Palma and Tenerife) replaced by PN84 (CRS code 4728) and later by
     * REGCAN95 (CRS code 4081). On eastern islands (Fuerteventura, Gran Canaria and Lanzarote) replaced by REGCAN95
     * (CRS code 4081).
     */
    public const EPSG_PN68 = 'urn:ogc:def:crs:EPSG::9403';

    /**
     * PN84
     * Extent: Spain - Canary Islands onshore.
     * Replaces PN68 (CRS code 9403) only on western islands (El Hierro, La Gomera, La Palma and Tenerife). Replaced by
     * REGCAN95 (CRS code 4081).
     */
    public const EPSG_PN84 = 'urn:ogc:def:crs:EPSG::4728';

    /**
     * PNG94
     * Extent: Papua New Guinea - onshore and offshore. Includes Bismark archipelago, Louisade archipelago, Admiralty
     * Islands, d'Entrecasteaux Islands, northern Solomon Islands, Trobriand Islands, New Britain, New Ireland,
     * Woodlark, and associated islands.
     * Adopted 1996, replacing AGD66.
     */
    public const EPSG_PNG94 = 'urn:ogc:def:crs:EPSG::5546';

    /**
     * POSGAR 2007
     * Extent: Argentina - onshore and offshore.
     * Adopted as official replacement of POSGAR 94 in May 2009. Also replaces de facto use of POSGAR 98 as of same
     * date.
     */
    public const EPSG_POSGAR_2007 = 'urn:ogc:def:crs:EPSG::5340';

    /**
     * POSGAR 94
     * Extent: Argentina - onshore and offshore.
     * Legally adopted in May 1997. Replaced by POSGAR 98 for scientific and many practical purposes until May 2009.
     * Officially replaced by POSGAR 2007 in May 2009.
     */
    public const EPSG_POSGAR_94 = 'urn:ogc:def:crs:EPSG::4694';

    /**
     * POSGAR 98
     * Extent: Argentina - onshore and offshore.
     * Densification in Argentina of SIRGAS 1995. Until May 2009 replaced POSGAR 94 for many practical purposes (but
     * not as the legal system).  POSGAR 94 was officially replaced by POSGAR 2007 in May 2009.
     */
    public const EPSG_POSGAR_98 = 'urn:ogc:def:crs:EPSG::4190';

    /**
     * PRS92
     * Extent: Philippines - onshore and offshore.
     * Replaces Luzon 19111 (CRS code 4253).
     */
    public const EPSG_PRS92 = 'urn:ogc:def:crs:EPSG::4683';

    /**
     * PSAD56
     * Extent: Aruba - onshore; Bolivia; Bonaire - onshore; Brazil - offshore - Amazon Cone shelf; Chile - onshore
     * north of 43°30'S; Curacao - onshore; Ecuador - mainland onshore; Guyana - onshore; Peru - onshore; Venezuela -
     * onshore.
     * Incorporates La Canoa (CRS code 4247) and within Venezuela (but not beyond) the names La Canoa and PSAD56 are
     * synonymous.
     */
    public const EPSG_PSAD56 = 'urn:ogc:def:crs:EPSG::4248';

    /**
     * PSD93
     * Extent: Oman - onshore. Includes Musandam and the Kuria Muria (Al Hallaniyah) islands.
     * Replaced Fahud geogCRS (code 4232) in 1993. Maximum differences to Fahud adjustment are 20 metres.
     */
    public const EPSG_PSD93 = 'urn:ogc:def:crs:EPSG::4134';

    /**
     * PTRA08
     * Extent: Portugal - Azores and Madeira island groups and surrounding EEZ - Flores, Corvo; Graciosa, Terceira, Sao
     * Jorge, Pico, Faial; Sao Miguel, Santa Maria; Madeira, Porto Santo, Desertas; Selvagens.
     * Replaces Azores Occidental 1939, Azores Central 1995, Azores Oriental 1995 and Porto Santo 1995 (CRS codes 4182
     * and 4663-65).
     */
    public const EPSG_PTRA08 = 'urn:ogc:def:crs:EPSG::5013';

    /**
     * PZ-90
     * Extent: World.
     * Used by the Glonass satellite navigation system prior to 2007-09-20.
     */
    public const EPSG_PZ_90 = 'urn:ogc:def:crs:EPSG::4740';

    /**
     * PZ-90.02
     * Extent: World.
     * Replaces PZ-90 (CRS code 4740) from 2007-09-20. Replaced by PZ-90.11 (CRS code 9475) from 2014-01-15.
     */
    public const EPSG_PZ_90_02 = 'urn:ogc:def:crs:EPSG::9474';

    /**
     * PZ-90.11
     * Extent: World.
     * Replaces PZ-90.02 (CRS code 9474) from 2014-01-15.
     */
    public const EPSG_PZ_90_11 = 'urn:ogc:def:crs:EPSG::9475';

    /**
     * Palestine 1923
     * Extent: Israel - onshore; Jordan; Palestine Territory - onshore.
     */
    public const EPSG_PALESTINE_1923 = 'urn:ogc:def:crs:EPSG::4281';

    /**
     * Pampa del Castillo
     * Extent: Argentina - Chibut province south of approximately 42°30'S and Santa Cruz province north of
     * approximately 50°20'S.
     * Replaced by Campo Inchauspe (geogCRS code 4221) for topographic mapping, use for oil exploration and production
     * in Golfo San Jorge basin (44°S to 47.5°S) continues.
     */
    public const EPSG_PAMPA_DEL_CASTILLO = 'urn:ogc:def:crs:EPSG::4161';

    /**
     * Panama-Colon 1911
     * Extent: Panama - onshore.
     */
    public const EPSG_PANAMA_COLON_1911 = 'urn:ogc:def:crs:EPSG::5467';

    /**
     * Perroud 1950
     * Extent: Antarctica - Adelie Land - coastal area between 136°E and 142°E.
     * Replaced by RGTAAF07 (CRS code 7073).
     */
    public const EPSG_PERROUD_1950 = 'urn:ogc:def:crs:EPSG::4637';

    /**
     * Peru96
     * Extent: Peru - onshore and offshore.
     * Replaces PSAD56 (CRS code 4248) in Peru.
     */
    public const EPSG_PERU96 = 'urn:ogc:def:crs:EPSG::5373';

    /**
     * Petrels 1972
     * Extent: Antarctica - Adelie Land - Petrels island.
     * Replaced by RGTAAF07 (CRS code 7073).
     */
    public const EPSG_PETRELS_1972 = 'urn:ogc:def:crs:EPSG::4636';

    /**
     * Phoenix Islands 1966
     * Extent: Kiribati - Phoenix Islands: Kanton, Orona, McKean Atoll, Birnie Atoll, Phoenix Seamounts.
     */
    public const EPSG_PHOENIX_ISLANDS_1966 = 'urn:ogc:def:crs:EPSG::4716';

    /**
     * Pitcairn 1967
     * Extent: Pitcairn - Pitcairn Island.
     * Replced by Pitcairn 2006 (CRS code 4763).
     */
    public const EPSG_PITCAIRN_1967 = 'urn:ogc:def:crs:EPSG::4729';

    /**
     * Pitcairn 2006
     * Extent: Pitcairn - Pitcairn Island.
     * Replaces Pitcairn 1967 (CRS code 4729). For practical purposes may be considered to be WGS 84.
     */
    public const EPSG_PITCAIRN_2006 = 'urn:ogc:def:crs:EPSG::4763';

    /**
     * Point 58
     * Extent: Senegal - central, Mali - southwest, Burkina Faso - central, Niger - southwest, Nigeria - north, Chad -
     * central. All in proximity to the parallel of latitude of 12°N.
     * The 12th parallel traverse of 1966-70 is connected to the Blue Nile 1958 (Adindan) network in western Sudan
     * (geogCRS code 4201).
     */
    public const EPSG_POINT_58 = 'urn:ogc:def:crs:EPSG::4620';

    /**
     * Pointe Noire
     * Extent: Congo - onshore and offshore.
     */
    public const EPSG_POINTE_NOIRE = 'urn:ogc:def:crs:EPSG::4282';

    /**
     * Porto Santo
     * Extent: Portugal - Madeira, Porto Santo and Desertas islands - onshore.
     * Replaced by 1995 system (CRS code 4663).
     */
    public const EPSG_PORTO_SANTO = 'urn:ogc:def:crs:EPSG::4615';

    /**
     * Porto Santo 1995
     * Extent: Portugal - Madeira, Porto Santo and Desertas islands - onshore.
     * Replaces 1936 system (CRS code 4615). Replaced by PTRA08 (CRS code 5013).
     */
    public const EPSG_PORTO_SANTO_1995 = 'urn:ogc:def:crs:EPSG::4663';

    /**
     * Principe
     * Extent: Sao Tome and Principe - onshore - Principe.
     */
    public const EPSG_PRINCIPE = 'urn:ogc:def:crs:EPSG::4824';

    /**
     * Puerto Rico
     * Extent: Puerto Rico, US Virgin Islands and British Virgin Islands - onshore.
     * NAD27 (CRS code 4267) used for military purposes. Note: this CRS includes longitudes which are POSITIVE EAST.
     */
    public const EPSG_PUERTO_RICO = 'urn:ogc:def:crs:EPSG::4139';

    /**
     * Pulkovo 1942
     * Extent: Armenia; Azerbaijan; Belarus; Estonia - onshore; Georgia - onshore; Kazakhstan; Kyrgyzstan; Latvia -
     * onshore; Lithuania - onshore; Moldova; Russian Federation - onshore; Tajikistan; Turkmenistan; Ukraine -
     * onshore; Uzbekistan.
     * Extended to Eastern Europe through Uniform Astro-Geodetic Network (UAGN) of 1956 - see CRS code 4179.
     */
    public const EPSG_PULKOVO_1942 = 'urn:ogc:def:crs:EPSG::4284';

    /**
     * Pulkovo 1942(58)
     * Extent: Onshore: Bulgaria, Czechia, Germany (former DDR), Hungary, Poland and Slovakia. Onshore and offshore:
     * Albania and Romania.
     * Shares same origin definition as Pulkovo 1942 (CRS code 4284) and for low accuracy purposes these systems can be
     * considered consistent with each other. Locally densified during 1957 and 1958. Replaced by 1983 adjustment (CRS
     * code 4178).
     */
    public const EPSG_PULKOVO_1942_58 = 'urn:ogc:def:crs:EPSG::4179';

    /**
     * Pulkovo 1942(83)
     * Extent: Onshore Bulgaria, Czechia, Germany (former DDR), Hungary and Slovakia.
     * Replaces 1956 adjustment (CRS code 4179). In Brandenburg replaced by ETRS89. In Sachsen and Thuringen replaced
     * by RD83 and PD/83 which for practical purposes may be considered to be the same as DHDN.
     */
    public const EPSG_PULKOVO_1942_83 = 'urn:ogc:def:crs:EPSG::4178';

    /**
     * Pulkovo 1995
     * Extent: Russian Federation - onshore and offshore.
     * Decree #1463 of 2012-12-28 announced that S-95 to be phased out and replaced by GSK-11 (CRS code 7683) by 2017.
     */
    public const EPSG_PULKOVO_1995 = 'urn:ogc:def:crs:EPSG::4200';

    /**
     * QND95
     * Extent: Qatar - onshore.
     */
    public const EPSG_QND95 = 'urn:ogc:def:crs:EPSG::4614';

    /**
     * Qatar 1948
     * Extent: Qatar - onshore.
     */
    public const EPSG_QATAR_1948 = 'urn:ogc:def:crs:EPSG::4286';

    /**
     * Qatar 1974
     * Extent: Qatar - onshore and offshore.
     */
    public const EPSG_QATAR_1974 = 'urn:ogc:def:crs:EPSG::4285';

    /**
     * Qornoq 1927
     * Extent: Greenland - west coast onshore.
     */
    public const EPSG_QORNOQ_1927 = 'urn:ogc:def:crs:EPSG::4194';

    /**
     * RD/83
     * Extent: Germany - Sachsen.
     * Consistent with DHDN (CRS code 4314) at the 1-metre level. For low accuracy applications RD/83 can be considered
     * the same as DHDN.
     */
    public const EPSG_RD_83 = 'urn:ogc:def:crs:EPSG::4745';

    /**
     * RDN2008
     * Extent: Italy - onshore and offshore; San Marino, Vatican City State.
     * Replaces IGM95 (CRS code 4670) from 2011-11-10.
     */
    public const EPSG_RDN2008 = 'urn:ogc:def:crs:EPSG::6706';

    /**
     * REDGEOMIN
     * Extent: Chile - onshore and offshore. Includes Easter Island, Juan Fernandez Islands, San Felix, and Sala y
     * Gomez.
     */
    public const EPSG_REDGEOMIN = 'urn:ogc:def:crs:EPSG::9696';

    /**
     * REGCAN95
     * Extent: Spain - Canary Islands onshore and offshore.
     * Replaces Pico de las Nieves 1984 (PN84).
     */
    public const EPSG_REGCAN95 = 'urn:ogc:def:crs:EPSG::4081';

    /**
     * REGVEN
     * Extent: Venezuela - onshore and offshore.
     * Densification in Venezuela of SIRGAS.
     */
    public const EPSG_REGVEN = 'urn:ogc:def:crs:EPSG::4189';

    /**
     * RGAF09
     * Extent: French Antilles onshore and offshore - Guadeloupe (including Grande Terre, Basse Terre, Marie Galante,
     * Les Saintes, Iles de la Petite Terre, La Desirade, St Barthélemy, and northern St Martin) and Martinique.
     * Replaces RRAF 1991. See CRS code 7086 for alternate system with axes reversed used by IGN for GIS purposes.
     */
    public const EPSG_RGAF09 = 'urn:ogc:def:crs:EPSG::5489';

    /**
     * RGAF09 (lon-lat)
     * Extent: French Antilles onshore and offshore - Guadeloupe (including Grande Terre, Basse Terre, Marie Galante,
     * Les Saintes, Iles de la Petite Terre, La Desirade, St Barthélemy, and northern St Martin) and Martinique.
     * Replaces RRAF 1991. See CRS code 5489 for system with axes in sequence lat-lon to be used for air, land and sea
     * navigation and safety of life purposes.
     */
    public const EPSG_RGAF09_LON_LAT = 'urn:ogc:def:crs:EPSG::7086';

    /**
     * RGF93
     * Extent: France - onshore and offshore, mainland and Corsica.
     * See CRS code 7084 for alternate system with axes reversed used by IGN for GIS purposes.
     */
    public const EPSG_RGF93 = 'urn:ogc:def:crs:EPSG::4171';

    /**
     * RGF93 (lon-lat)
     * Extent: France - onshore and offshore, mainland and Corsica.
     * See CRS code 4171 for system with axes in sequence lat-lon to be used for air, land and sea navigation and
     * safety of life purposes.
     */
    public const EPSG_RGF93_LON_LAT = 'urn:ogc:def:crs:EPSG::7084';

    /**
     * RGFG95
     * Extent: French Guiana - onshore and offshore.
     * See CRS code 7041 for alternate system with axes reversed used by IGN for GIS purposes.
     */
    public const EPSG_RGFG95 = 'urn:ogc:def:crs:EPSG::4624';

    /**
     * RGFG95 (lon-lat)
     * Extent: French Guiana - onshore and offshore.
     * See CRS code 4624 for system with  axes in sequence lat-lon to be used for air, land and sea navigation and
     * safety of life purposes.
     */
    public const EPSG_RGFG95_LON_LAT = 'urn:ogc:def:crs:EPSG::7041';

    /**
     * RGM04
     * Extent: Mayotte - onshore and offshore.
     * Replaces Combani 1950 (CRS code 4632) except for cadastral purposes which uses Cadastre 1997 (CRS code 4475).
     * See CRS code 7039 for alternate system with axes reversed used by IGN for GIS purposes.
     */
    public const EPSG_RGM04 = 'urn:ogc:def:crs:EPSG::4470';

    /**
     * RGM04 (lon-lat)
     * Extent: Mayotte - onshore and offshore.
     * Replaces Combani 1950 (CRS code 4632) except for cadastral purposes which use Cadastre 1997 (CRS code 4475). See
     * CRS code 4470 for system with axes in sequence lat-lon to be used for air, land and sea navigation and safety of
     * life purposes.
     */
    public const EPSG_RGM04_LON_LAT = 'urn:ogc:def:crs:EPSG::7039';

    /**
     * RGNC91-93
     * Extent: New Caledonia - onshore and offshore. Isle de Pins, Loyalty Islands, Huon Islands, Belep archipelago,
     * Chesterfield Islands, and Walpole.
     * Replaces older local systems IGN56 Lifou, IGN72 Grande Terre, ST87 Ouvea, IGN53 Mare, ST84 Ile des Pins, ST71
     * Belep and NEA74 Noumea (CRS codes 4633, 4641-44, 4662 and 4750).
     */
    public const EPSG_RGNC91_93 = 'urn:ogc:def:crs:EPSG::4749';

    /**
     * RGPF
     * Extent: French Polynesia - onshore and offshore. Includes Society archipelago, Tuamotu archipelago, Marquesas
     * Islands, Gambier Islands and Austral Islands.
     * Replaces Tahaa 54 (CRS code 4629), IGN 63 Hiva Oa (4689), IGN 72 Nuku Hiva (4630), Maupiti 83 (4692), MHEFO 55
     * (4688), Moorea 87 (4691) and Tahiti 79 (4690).
     */
    public const EPSG_RGPF = 'urn:ogc:def:crs:EPSG::4687';

    /**
     * RGR92
     * Extent: Reunion - onshore and offshore.
     * Replaces Piton des Neiges (code 4626). See CRS code 7037 for alternate system with axes reversed used by IGN for
     * GIS purposes.
     */
    public const EPSG_RGR92 = 'urn:ogc:def:crs:EPSG::4627';

    /**
     * RGR92 (lon-lat)
     * Extent: Reunion - onshore and offshore.
     * Replaces Piton des Neiges (code 4626). See CRS code 4627 for system with axes in sequence lat-lon to be used for
     * air, land and sea navigation and safety of life purposes.
     */
    public const EPSG_RGR92_LON_LAT = 'urn:ogc:def:crs:EPSG::7037';

    /**
     * RGRDC 2005
     * Extent: The Democratic Republic of the Congo (Zaire) - south of a line through Bandundu, Seke and Pweto -
     * onshore and offshore.
     */
    public const EPSG_RGRDC_2005 = 'urn:ogc:def:crs:EPSG::4046';

    /**
     * RGSPM06
     * Extent: St Pierre and Miquelon - onshore and offshore.
     * Replaces Saint Pierre et Miquelon 1950 (CRS code 4638). See CRS code 7035 for alternate system with axes
     * reversed used by IGN for GIS purposes.
     */
    public const EPSG_RGSPM06 = 'urn:ogc:def:crs:EPSG::4463';

    /**
     * RGSPM06 (lon-lat)
     * Extent: St Pierre and Miquelon - onshore and offshore.
     * Replaces Saint Pierre et Miquelon 1950 (CRS code 4638). See CRS code 4463 for system with axes in sequence
     * lat-lon to be used for air, land and sea navigation and safety of life purposes.
     */
    public const EPSG_RGSPM06_LON_LAT = 'urn:ogc:def:crs:EPSG::7035';

    /**
     * RGTAAF07
     * Extent: French Southern Territories - onshore and offshore: Amsterdam and St Paul, Crozet, Europa and Kerguelen.
     * Antarctica - Adelie Land coastal area.
     * Replaces various local systems on several French overseas territories. See CRS code 7133 for alternate system
     * with axes reversed used by IGN for GIS purposes.
     */
    public const EPSG_RGTAAF07 = 'urn:ogc:def:crs:EPSG::7073';

    /**
     * RGTAAF07 (lon-lat)
     * Extent: French Southern Territories - onshore and offshore: Amsterdam and St Paul, Crozet, Europa and Kerguelen.
     * Antarctica - Adelie Land coastal area.
     * Replaces various local systems on several French overseas territories. See CRS code 7073 for alternate system
     * with axes in sequence lat-lon to be used for air, land and sea navigation purposes.
     */
    public const EPSG_RGTAAF07_LON_LAT = 'urn:ogc:def:crs:EPSG::7133';

    /**
     * RGWF96
     * Extent: Wallis and Futuna - onshore and offshore - Uvea, Futuna, and Alofi.
     * See CRS code 8902 for alternate system with axes reversed used by IGN for GIS purposes. On Wallis island,
     * replaces MOP78 (CRS code 4639) for geodetic purposes.
     */
    public const EPSG_RGWF96 = 'urn:ogc:def:crs:EPSG::8900';

    /**
     * RGWF96 (lon-lat)
     * Extent: Wallis and Futuna - onshore and offshore - Uvea, Futuna, and Alofi.
     * See CRS code 8900 for system with axes in sequence lat-lon to be used for air, land and sea navigation and
     * safety of life purposes. On Wallis island, replaces MOP78 (CRS code 4639) for GIS purposes.
     */
    public const EPSG_RGWF96_LON_LAT = 'urn:ogc:def:crs:EPSG::8902';

    /**
     * RRAF 1991
     * Extent: French Antilles onshore and offshore - Guadeloupe (including Grande Terre, Basse Terre, Marie Galante,
     * Les Saintes, Iles de la Petite Terre, La Desirade, St Barthélemy, and northern St Martin) and Martinique.
     * Replaces older local systems Fort Marigot and Sainte Anne CRS (codes 4621-22) in Guadeloupe and Fort Desaix (CRS
     * code 4625) in Martinique. Replaced by RGAF09 (CRS code 5489).
     */
    public const EPSG_RRAF_1991 = 'urn:ogc:def:crs:EPSG::4558';

    /**
     * RSAO13
     * Extent: Angola - onshore and offshore.
     */
    public const EPSG_RSAO13 = 'urn:ogc:def:crs:EPSG::8699';

    /**
     * RSRGD2000
     * Extent: Antarctica - Ross Sea Region - nominally between 160°E and 150°W but includes buffer on eastern
     * hemisphere margin to include Transantarctic Mountains
     * Replaces Camp Area Astro (CRS code 4715). The relationship to this is variable. See Land Information New Zealand
     * LINZS25001.
     */
    public const EPSG_RSRGD2000 = 'urn:ogc:def:crs:EPSG::4764';

    /**
     * RT38
     * Extent: Sweden - onshore.
     */
    public const EPSG_RT38 = 'urn:ogc:def:crs:EPSG::4308';

    /**
     * RT38 (Stockholm)
     * Extent: Sweden - onshore.
     */
    public const EPSG_RT38_STOCKHOLM = 'urn:ogc:def:crs:EPSG::4814';

    /**
     * RT90
     * Extent: Sweden - onshore and offshore.
     */
    public const EPSG_RT90 = 'urn:ogc:def:crs:EPSG::4124';

    /**
     * Rassadiran
     * Extent: Iran - Taheri refinery site.
     */
    public const EPSG_RASSADIRAN = 'urn:ogc:def:crs:EPSG::4153';

    /**
     * Reunion 1947
     * Extent: Reunion - onshore.
     * Replaced by RGR92 (code 4627).
     */
    public const EPSG_REUNION_1947 = 'urn:ogc:def:crs:EPSG::4626';

    /**
     * Reykjavik 1900
     * Extent: Iceland - onshore.
     * See ellipsoid remarks.
     */
    public const EPSG_REYKJAVIK_1900 = 'urn:ogc:def:crs:EPSG::4657';

    /**
     * S-JTSK
     * Extent: Czechia; Slovakia.
     * Greenwich-referenced equivalent to S-JTSK (CRS code 4818). Technically improved and replaced through JTSK/05 in
     * the Czech Republic and S-JTSK [JTSK03] in Slovakia, CRSs 5228 and 5229 (CZ) and 8351 (SK).
     */
    public const EPSG_S_JTSK = 'urn:ogc:def:crs:EPSG::4156';

    /**
     * S-JTSK (Ferro)
     * Extent: Czechia; Slovakia.
     * Initial realization, observed and calculated in projected CRS domain (CRS code 2065). Later densification
     * introduced distortion with  inaccuracy of several decimetres. In Slovakia has been deprecated and replaced by
     * Greenwich equivalent, CRS code 4156.
     */
    public const EPSG_S_JTSK_FERRO = 'urn:ogc:def:crs:EPSG::4818';

    /**
     * S-JTSK [JTSK03]
     * Extent: Slovakia.
     * Defined by transfomation from ETRS89 (ETRF2000 realization) (transformation code 8365) to improve the scale and
     * homogeneity of S-JTSK (CRS 4156) within Slovakia.
     */
    public const EPSG_S_JTSK_JTSK03 = 'urn:ogc:def:crs:EPSG::8351';

    /**
     * S-JTSK/05
     * Extent: Czechia.
     * Derived through projCRS 5515 to improve the scale and homogeneity of CRS 4156 within the Czech Republic. See CRS
     * code 5229 for Ferro-referenced alternative.
     */
    public const EPSG_S_JTSK_05 = 'urn:ogc:def:crs:EPSG::5228';

    /**
     * S-JTSK/05 (Ferro)
     * Extent: Czechia.
     * Derived through projCRS 5224 to improve the scale and homogeneity of CRS 4818 within the Czech Republic. See CRS
     * code 5228 for Greenwich-referenced alternative.
     */
    public const EPSG_S_JTSK_05_FERRO = 'urn:ogc:def:crs:EPSG::5229';

    /**
     * SAD69
     * Extent: Brazil - onshore and offshore. In rest of South America - onshore north of approximately 45°S and
     * Tierra del Fuego.
     * Uses GRS 1967 ellipsoid with 1/f to exactly 2 decimal places. In Brazil only, replaced by SAD69(96) (CRS code
     * 5527).
     */
    public const EPSG_SAD69 = 'urn:ogc:def:crs:EPSG::4618';

    /**
     * SAD69(96)
     * Extent: Brazil - onshore and offshore. Includes Rocas, Fernando de Noronha archipelago, Trindade, Ihlas Martim
     * Vaz and Sao Pedro e Sao Paulo.
     * Uses GRS 1967 ellipsoid with 1/f to exactly 2 decimal places. Replaces SAD69 original adjustment (CRS code 4618)
     * only in Brazil.
     */
    public const EPSG_SAD69_96 = 'urn:ogc:def:crs:EPSG::5527';

    /**
     * SHGD2015
     * Extent: St Helena, Ascension and Tristan da Cunha - St Helena Island - onshore.
     */
    public const EPSG_SHGD2015 = 'urn:ogc:def:crs:EPSG::7886';

    /**
     * SIGD61
     * Extent: Cayman Islands - Little Cayman and Cayman Brac.
     * Superseded by CIGD11 (CRS code 6135).
     */
    public const EPSG_SIGD61 = 'urn:ogc:def:crs:EPSG::4726';

    /**
     * SIRGAS 1995
     * Extent: South America - onshore and offshore. Ecuador (mainland and Galapagos) - onshore and offshore.
     * Replaced by SIRGAS 2000 (CRS code 4674).
     */
    public const EPSG_SIRGAS_1995 = 'urn:ogc:def:crs:EPSG::4170';

    /**
     * SIRGAS 2000
     * Extent: Latin America - Central America and South America - onshore and offshore. Brazil - onshore and offshore.
     * Replaces SIRGAS 1995 system (CRS code 4179) for South America; expands SIRGAS to Central America.
     */
    public const EPSG_SIRGAS_2000 = 'urn:ogc:def:crs:EPSG::4674';

    /**
     * SIRGAS-CON DGF00P01
     * Extent: Latin America - Central America and South America, onshore and offshore.
     * Replaced by SIRGAS-CON DGF01P01 (CRS code 8973).
     */
    public const EPSG_SIRGAS_CON_DGF00P01 = 'urn:ogc:def:crs:EPSG::8972';

    /**
     * SIRGAS-CON DGF01P01
     * Extent: Latin America - Central America and South America, onshore and offshore.
     * Replaces SIRGAS-CON DGF00P01 (CRS code 8972). Replaced by SIRGAS-CON DGF01P02 (CRS code 8974).
     */
    public const EPSG_SIRGAS_CON_DGF01P01 = 'urn:ogc:def:crs:EPSG::8973';

    /**
     * SIRGAS-CON DGF01P02
     * Extent: Latin America - Central America and South America, onshore and offshore.
     * Replaces SIRGAS-CON DGF01P01 (CRS code 8973). Replaced by SIRGAS-CON DGF02P01 (CRS code 8975).
     */
    public const EPSG_SIRGAS_CON_DGF01P02 = 'urn:ogc:def:crs:EPSG::8974';

    /**
     * SIRGAS-CON DGF02P01
     * Extent: Latin America - Central America and South America, onshore and offshore.
     * Replaces SIRGAS-CON DGF01P02 (CRS code 8974). Replaced by SIRGAS-CON DGF04P01 (CRS code 8976).
     */
    public const EPSG_SIRGAS_CON_DGF02P01 = 'urn:ogc:def:crs:EPSG::8975';

    /**
     * SIRGAS-CON DGF04P01
     * Extent: Latin America - Central America and South America, onshore and offshore.
     * Replaces SIRGAS-CON DGF02P01 (CRS code 8975). Replaced by SIRGAS-CON DGF05P01 (CRS code 8977).
     */
    public const EPSG_SIRGAS_CON_DGF04P01 = 'urn:ogc:def:crs:EPSG::8976';

    /**
     * SIRGAS-CON DGF05P01
     * Extent: Latin America - Central America and South America, onshore and offshore.
     * Replaces SIRGAS-CON DGF04P01 (CRS code 8976). Replaced by SIRGAS-CON DGF06P01 (CRS code 8978).
     */
    public const EPSG_SIRGAS_CON_DGF05P01 = 'urn:ogc:def:crs:EPSG::8977';

    /**
     * SIRGAS-CON DGF06P01
     * Extent: Latin America - Central America and South America, onshore and offshore.
     * Replaces SIRGAS-CON DGF05P01 (CRS code 8977). Replaced by SIRGAS-CON DGF07P01 (CRS code 8979).
     */
    public const EPSG_SIRGAS_CON_DGF06P01 = 'urn:ogc:def:crs:EPSG::8978';

    /**
     * SIRGAS-CON DGF07P01
     * Extent: Latin America - Central America and South America, onshore and offshore.
     * Replaces SIRGAS-CON DGF06P01 (CRS code 8978). Replaced by SIRGAS-CON DGF08P01 (CRS code 8980).
     */
    public const EPSG_SIRGAS_CON_DGF07P01 = 'urn:ogc:def:crs:EPSG::8979';

    /**
     * SIRGAS-CON DGF08P01
     * Extent: Latin America - Central America and South America, onshore and offshore.
     * Replaces SIRGAS-CON DGF07P01 (CRS code 8979). Replaced by SIRGAS-CON SIR09P01 (CRS code 8981).
     */
    public const EPSG_SIRGAS_CON_DGF08P01 = 'urn:ogc:def:crs:EPSG::8980';

    /**
     * SIRGAS-CON SIR09P01
     * Extent: Latin America - Central America and South America, onshore and offshore.
     * Replaces SIRGAS-CON DGF08P01 (CRS code 8980). Replaced by SIRGAS-CON SIR10P01 (CRS code 8982).
     */
    public const EPSG_SIRGAS_CON_SIR09P01 = 'urn:ogc:def:crs:EPSG::8981';

    /**
     * SIRGAS-CON SIR10P01
     * Extent: Latin America - Central America and South America, onshore and offshore.
     * Replaces SIRGAS-CON SIR09P01 (CRS code 8981). Replaced by SIRGAS-CON SIR11P01 (CRS code 8983).
     */
    public const EPSG_SIRGAS_CON_SIR10P01 = 'urn:ogc:def:crs:EPSG::8982';

    /**
     * SIRGAS-CON SIR11P01
     * Extent: Latin America - Central America and South America, onshore and offshore.
     * Replaces SIRGAS-CON SIR10P01 (CRS code 8982). Replaced by SIRGAS-CON SIR13P01 (CRS code 8984).
     */
    public const EPSG_SIRGAS_CON_SIR11P01 = 'urn:ogc:def:crs:EPSG::8983';

    /**
     * SIRGAS-CON SIR13P01
     * Extent: Latin America - Central America and South America, onshore and offshore.
     * Replaces SIRGAS-CON SIR11P01 (CRS code 8983). Replaced by SIRGAS-CON SIR14P01 (CRS code 8985).
     */
    public const EPSG_SIRGAS_CON_SIR13P01 = 'urn:ogc:def:crs:EPSG::8984';

    /**
     * SIRGAS-CON SIR14P01
     * Extent: Latin America - Central America and South America, onshore and offshore.
     * Replaces SIRGAS-CON SIR13P01 (CRS code 8984). Replaced by SIRGAS-CON SIR15P01 (CRS code 8986).
     */
    public const EPSG_SIRGAS_CON_SIR14P01 = 'urn:ogc:def:crs:EPSG::8985';

    /**
     * SIRGAS-CON SIR15P01
     * Extent: Latin America - Central America and South America, onshore and offshore.
     * Replaces SIRGAS-CON SIR14P01 (CRS code 8985). Replaced by SIRGAS-CON SIR17P01 (CRS code 8987).
     */
    public const EPSG_SIRGAS_CON_SIR15P01 = 'urn:ogc:def:crs:EPSG::8986';

    /**
     * SIRGAS-CON SIR17P01
     * Extent: Latin America - Central America and South America, onshore and offshore.
     * Replaces SIRGAS-CON SIR15P01 (CRS code 8986).
     */
    public const EPSG_SIRGAS_CON_SIR17P01 = 'urn:ogc:def:crs:EPSG::8987';

    /**
     * SIRGAS-Chile 2002
     * Extent: Chile - onshore and offshore. Includes Easter Island, Juan Fernandez Islands, San Felix, and Sala y
     * Gomez.
     * Densification of SIRGAS 2000 within Chile. Replaces PSAD56 (CRS code 6248) in Chile, HITO XVIII (CRS code 6254)
     * in Chilean Tierra del Fuego and Easter Island 1967 (CRS code 6719) in Easter Island. Replaced by SIRGAS-Chile
     * 2010 (CRS code 8949).
     */
    public const EPSG_SIRGAS_CHILE_2002 = 'urn:ogc:def:crs:EPSG::5360';

    /**
     * SIRGAS-Chile 2010
     * Extent: Chile - onshore and offshore. Includes Easter Island, Juan Fernandez Islands, San Felix, and Sala y
     * Gomez.
     * Densification within Chile of SIRGAS-CON at epoch 2010.00. Replaces SIRGAS-Chile 2002 (CRS code 5360) due to
     * significant tectonic deformation. Replaced by SIRGAS-Chile 2013 (CRS code 9148).
     */
    public const EPSG_SIRGAS_CHILE_2010 = 'urn:ogc:def:crs:EPSG::8949';

    /**
     * SIRGAS-Chile 2013
     * Extent: Chile - onshore and offshore. Includes Easter Island, Juan Fernandez Islands, San Felix, and Sala y
     * Gomez.
     * Densification within Chile of SIRGAS-CON at epoch 2013.00. Replaces SIRGAS-Chile 2010 (CRS code 8949) due to
     * significant tectonic deformation. Replaced by SIRGAS-Chile 2016 (CRS code 9153).
     */
    public const EPSG_SIRGAS_CHILE_2013 = 'urn:ogc:def:crs:EPSG::9148';

    /**
     * SIRGAS-Chile 2016
     * Extent: Chile - onshore and offshore. Includes Easter Island, Juan Fernandez Islands, San Felix, and Sala y
     * Gomez.
     * Densification within Chile of SIRGAS-CON at epoch 2016.00. Replaces SIRGAS-Chile 2013 (CRS code 9148) due to
     * significant tectonic deformation.
     */
    public const EPSG_SIRGAS_CHILE_2016 = 'urn:ogc:def:crs:EPSG::9153';

    /**
     * SIRGAS-ROU98
     * Extent: Uruguay - onshore and offshore.
     * Replaces Yacare (CRS code 4309) in Uruguay.
     */
    public const EPSG_SIRGAS_ROU98 = 'urn:ogc:def:crs:EPSG::5381';

    /**
     * SIRGAS_ES2007.8
     * Extent: El Salvador - onshore and offshore.
     */
    public const EPSG_SIRGAS_ES2007_8 = 'urn:ogc:def:crs:EPSG::5393';

    /**
     * SLD99
     * Extent: Sri Lanka - onshore.
     */
    public const EPSG_SLD99 = 'urn:ogc:def:crs:EPSG::5233';

    /**
     * SRB_ETRS89
     * Extent: Serbia including Vojvodina.
     * In Serbia replaces MGI 1901 and SREF98 (CRS codes 3906 and 4075).
     */
    public const EPSG_SRB_ETRS89 = 'urn:ogc:def:crs:EPSG::8685';

    /**
     * SREF98
     * Extent: Serbia including Vojvodina.
     * Replaces MGI 1901 (CRS code 3906) in Serbia. Replaced by SRB_ETRS89 (STRS00) (CRS code 8685).
     */
    public const EPSG_SREF98 = 'urn:ogc:def:crs:EPSG::4075';

    /**
     * SRGI2013
     * Extent: Indonesia - onshore and offshore.
     * Supports horizontal component of national horizontal control network (JKHN). Adopted 2013-10-11. Replaces DGN95
     * and all older systems.
     */
    public const EPSG_SRGI2013 = 'urn:ogc:def:crs:EPSG::9470';

    /**
     * ST71 Belep
     * Extent: New Caledonia - Belep.
     * Replaced by RGNC91-93 (CRS code 4749).
     */
    public const EPSG_ST71_BELEP = 'urn:ogc:def:crs:EPSG::4643';

    /**
     * ST84 Ile des Pins
     * Extent: New Caledonia - Ile des Pins.
     * Replaced by RGNC91-93 (CRS code 4749).
     */
    public const EPSG_ST84_ILE_DES_PINS = 'urn:ogc:def:crs:EPSG::4642';

    /**
     * ST87 Ouvea
     * Extent: New Caledonia - Loyalty Islands - Ouvea.
     * Replaced by RGNC91-93 (CRS code 4749).
     */
    public const EPSG_ST87_OUVEA = 'urn:ogc:def:crs:EPSG::4750';

    /**
     * SVY21
     * Extent: Singapore - onshore and offshore.
     */
    public const EPSG_SVY21 = 'urn:ogc:def:crs:EPSG::4757';

    /**
     * SWEREF99
     * Extent: Sweden - onshore and offshore.
     */
    public const EPSG_SWEREF99 = 'urn:ogc:def:crs:EPSG::4619';

    /**
     * Saint Pierre et Miquelon 1950
     * Extent: St Pierre and Miquelon - onshore.
     * Replaced by RGSPM06 (CRS code 4463).
     */
    public const EPSG_SAINT_PIERRE_ET_MIQUELON_1950 = 'urn:ogc:def:crs:EPSG::4638';

    /**
     * Santo 1965
     * Extent: Vanuatu - northern islands - Aese, Ambrym, Aoba, Epi, Espiritu Santo, Maewo, Malo, Malkula, Paama,
     * Pentecost, Shepherd and Tutuba.
     */
    public const EPSG_SANTO_1965 = 'urn:ogc:def:crs:EPSG::4730';

    /**
     * Sao Tome
     * Extent: Sao Tome and Principe - onshore - Sao Tome.
     */
    public const EPSG_SAO_TOME = 'urn:ogc:def:crs:EPSG::4823';

    /**
     * Sapper Hill 1943
     * Extent: Falkland Islands (Malvinas) - onshore.
     */
    public const EPSG_SAPPER_HILL_1943 = 'urn:ogc:def:crs:EPSG::4292';

    /**
     * Schwarzeck
     * Extent: Namibia - onshore and offshore.
     */
    public const EPSG_SCHWARZECK = 'urn:ogc:def:crs:EPSG::4293';

    /**
     * Scoresbysund 1952
     * Extent: Greenland - Scoresbysund area onshore.
     */
    public const EPSG_SCORESBYSUND_1952 = 'urn:ogc:def:crs:EPSG::4195';

    /**
     * Segara
     * Extent: Indonesia - Kalimantan - onshore east coastal area including Mahakam delta coastal and offshore shelf
     * areas.
     */
    public const EPSG_SEGARA = 'urn:ogc:def:crs:EPSG::4613';

    /**
     * Segara (Jakarta)
     * Extent: Indonesia - Kalimantan - onshore east coastal area including Mahakam delta coastal and offshore shelf
     * areas.
     */
    public const EPSG_SEGARA_JAKARTA = 'urn:ogc:def:crs:EPSG::4820';

    /**
     * Selvagem Grande
     * Extent: Portugal - Selvagens islands (Madeira province) - onshore.
     */
    public const EPSG_SELVAGEM_GRANDE = 'urn:ogc:def:crs:EPSG::4616';

    /**
     * Serindung
     * Extent: Indonesia - west Kalimantan - onshore coastal area.
     */
    public const EPSG_SERINDUNG = 'urn:ogc:def:crs:EPSG::4295';

    /**
     * Sibun Gorge 1922
     * Extent: Belize - onshore.
     */
    public const EPSG_SIBUN_GORGE_1922 = 'urn:ogc:def:crs:EPSG::5464';

    /**
     * Sierra Leone 1924
     * Extent: Sierra Leone - Freetown Peninsula.
     * Ellipsoid semi-major axis (a)=20926201 exactly Gold Coast feet; 1 Gold Coast foot = 0.3047997101815 m.
     */
    public const EPSG_SIERRA_LEONE_1924 = 'urn:ogc:def:crs:EPSG::4174';

    /**
     * Sierra Leone 1968
     * Extent: Sierra Leone - onshore.
     * Replaces Sierra Leone 1960. The 1968 readjustment coordinates are within 3m of the 1960 provisional adjustment.
     */
    public const EPSG_SIERRA_LEONE_1968 = 'urn:ogc:def:crs:EPSG::4175';

    /**
     * Slovenia 1996
     * Extent: Slovenia - onshore and offshore.
     * Replaces MG! alias D48 (CRS code 4312).
     */
    public const EPSG_SLOVENIA_1996 = 'urn:ogc:def:crs:EPSG::4765';

    /**
     * Solomon 1968
     * Extent: Solomon Islands - onshore southern Solomon Islands, primarily Guadalcanal, Malaita, San Cristobel, Santa
     * Isobel, Choiseul, Makira-Ulawa.
     */
    public const EPSG_SOLOMON_1968 = 'urn:ogc:def:crs:EPSG::4718';

    /**
     * South East Island 1943
     * Extent: Seychelles - Mahe, Silhouette, North, Aride Island, Praslin, La Digue and Frigate islands including
     * adjacent smaller granitic islands on the Seychelles Bank, Bird Island and Denis Island.
     */
    public const EPSG_SOUTH_EAST_ISLAND_1943 = 'urn:ogc:def:crs:EPSG::6892';

    /**
     * South Georgia 1968
     * Extent: South Georgia and the South Sandwich Islands - South Georgia onshore.
     */
    public const EPSG_SOUTH_GEORGIA_1968 = 'urn:ogc:def:crs:EPSG::4722';

    /**
     * South Yemen
     * Extent: Yemen - South Yemen onshore mainland.
     */
    public const EPSG_SOUTH_YEMEN = 'urn:ogc:def:crs:EPSG::4164';

    /**
     * St. George Island
     * Extent: United States (USA) - Alaska - Pribilof Islands - St George Island.
     * Note: this CRS includes longitudes which are POSITIVE EAST.
     */
    public const EPSG_ST_GEORGE_ISLAND = 'urn:ogc:def:crs:EPSG::4138';

    /**
     * St. Helena Tritan
     * Extent: St Helena, Ascension and Tristan da Cunha - St Helena Island - onshore.
     * Replaced by SHGD2015 (CRS code 7886) from 2015.
     */
    public const EPSG_ST_HELENA_TRITAN = 'urn:ogc:def:crs:EPSG::7881';

    /**
     * St. Kitts 1955
     * Extent: St Kitts and Nevis - onshore.
     */
    public const EPSG_ST_KITTS_1955 = 'urn:ogc:def:crs:EPSG::4605';

    /**
     * St. Lawrence Island
     * Extent: United States (USA) - Alaska - St Lawrence Island.
     * Note: this CRS includes longitudes which are POSITIVE EAST.
     */
    public const EPSG_ST_LAWRENCE_ISLAND = 'urn:ogc:def:crs:EPSG::4136';

    /**
     * St. Lucia 1955
     * Extent: St Lucia - onshore.
     */
    public const EPSG_ST_LUCIA_1955 = 'urn:ogc:def:crs:EPSG::4606';

    /**
     * St. Paul Island
     * Extent: United States (USA) - Alaska - Pribilof Islands - St Paul Island.
     * Note: this CRS includes longitudes which are POSITIVE EAST.
     */
    public const EPSG_ST_PAUL_ISLAND = 'urn:ogc:def:crs:EPSG::4137';

    /**
     * St. Stephen (Ferro)
     * Extent: Austria - Lower Austria. Czechia - Moravia and Czech Silesia.
     */
    public const EPSG_ST_STEPHEN_FERRO = 'urn:ogc:def:crs:EPSG::8043';

    /**
     * St. Vincent 1945
     * Extent: St Vincent and the northern Grenadine Islands - onshore.
     */
    public const EPSG_ST_VINCENT_1945 = 'urn:ogc:def:crs:EPSG::4607';

    /**
     * TC(1948)
     * Extent: United Arab Emirates (UAE) - Abu Dhabi onshore and Dubai onshore.
     */
    public const EPSG_TC_1948 = 'urn:ogc:def:crs:EPSG::4303';

    /**
     * TGD2005
     * Extent: Tonga - onshore and offshore.
     */
    public const EPSG_TGD2005 = 'urn:ogc:def:crs:EPSG::5886';

    /**
     * TM65
     * Extent: Ireland - onshore. United Kingdom (UK) - Northern Ireland (Ulster) - onshore.
     * Replaced by 1975 Mapping Adjustment alias TM75 (CRS code 4300). Not to be confused with the Geodetic Datum of
     * 1965 (datum code 6300) which is used by TM75.
     */
    public const EPSG_TM65 = 'urn:ogc:def:crs:EPSG::4299';

    /**
     * TM75
     * Extent: Ireland - onshore. United Kingdom (UK) - Northern Ireland (Ulster) - onshore.
     * Uses Geodetic Datum of 1965 which should not be confused with the 1965 adjustment (TM65, datum code 6299 and CRS
     * code 4299). Replaces OSNI52 (CRS code 4188) and TM65 (CRS code 4299). Replaced by IRENET95 (CRS code 4173).
     */
    public const EPSG_TM75 = 'urn:ogc:def:crs:EPSG::4300';

    /**
     * TPEN11-IRF
     * Extent: UK - on or related to the Trans-Pennine rail route from Liverpool via Manchester to Bradford and Leeds.
     * Intermediate CRS created in 2020 to assist the emulation of the ETRS89 / TPEN11 SnakeGrid projected CRS through
     * transformation ETRS89 to TPEN11-IRF (1) (code 9365) used in conjunction with the TPEN11-TM map projection (code
     * 9366).
     */
    public const EPSG_TPEN11_IRF = 'urn:ogc:def:crs:EPSG::9364';

    /**
     * TUREF
     * Extent: Turkey - onshore and offshore.
     */
    public const EPSG_TUREF = 'urn:ogc:def:crs:EPSG::5252';

    /**
     * TWD67
     * Extent: Taiwan, Republic of China - onshore - Taiwan Island, Penghu (Pescadores) Islands.
     * Shares the same origin point with the earlier Hu Tzu Shan system (CRS code 4236) but away from this point
     * coordinates differ. Do not confuse!
     */
    public const EPSG_TWD67 = 'urn:ogc:def:crs:EPSG::3821';

    /**
     * TWD97
     * Extent: Taiwan, Republic of China - onshore and offshore - Taiwan Island, Penghu (Pescadores) Islands.
     */
    public const EPSG_TWD97 = 'urn:ogc:def:crs:EPSG::3824';

    /**
     * Tahaa 54
     * Extent: French Polynesia - Society Islands - Bora Bora, Huahine, Raiatea and Tahaa.
     * Replaced by RGPF, CRS code 4687.
     */
    public const EPSG_TAHAA_54 = 'urn:ogc:def:crs:EPSG::4629';

    /**
     * Tahiti 52
     * Extent: French Polynesia - Society Islands - Moorea and Tahiti.
     * Replaced by Tahiti 79 (CRS code 4690) in Tahiti and Moorea 87 (CRS code 4691) in Moorea.
     */
    public const EPSG_TAHITI_52 = 'urn:ogc:def:crs:EPSG::4628';

    /**
     * Tahiti 79
     * Extent: French Polynesia - Society Islands - Tahiti.
     * Replaces Tahiti 52 (CRS code 4628) in Tahiti. Replaced by RGPF (CRS code 4687).
     */
    public const EPSG_TAHITI_79 = 'urn:ogc:def:crs:EPSG::4690';

    /**
     * Tananarive
     * Extent: Madagascar - onshore and nearshore.
     */
    public const EPSG_TANANARIVE = 'urn:ogc:def:crs:EPSG::4297';

    /**
     * Tananarive (Paris)
     * Extent: Madagascar - onshore.
     */
    public const EPSG_TANANARIVE_PARIS = 'urn:ogc:def:crs:EPSG::4810';

    /**
     * Tapi Aike
     * Extent: Argentina - Santa Cruz province south of approximately 50°20'S.
     * Replaced by Campo Inchauspe (geogCRS code 4221) for topographic mapping, use for oil exploration and production
     * continues.
     */
    public const EPSG_TAPI_AIKE = 'urn:ogc:def:crs:EPSG::9248';

    /**
     * Tern Island 1961
     * Extent: United States (USA) - Hawaii - Tern Island and Sorel Atoll.
     */
    public const EPSG_TERN_ISLAND_1961 = 'urn:ogc:def:crs:EPSG::4707';

    /**
     * Tete
     * Extent: Mozambique - onshore.
     */
    public const EPSG_TETE = 'urn:ogc:def:crs:EPSG::4127';

    /**
     * Timbalai 1948
     * Extent: Brunei - onshore and offshore; Malaysia - East Malaysia (Sabah; Sarawak) - onshore and offshore.
     * Adopts metric conversion of 39.370147 inches per metre. Replaced by GDM2000 (CRS code 4742) in East Malaysia and
     * by GDBD2009 (CRS code 5247) in Brunei.
     */
    public const EPSG_TIMBALAI_1948 = 'urn:ogc:def:crs:EPSG::4298';

    /**
     * Tokyo
     * Extent: Japan - onshore; North Korea - onshore; South Korea - onshore.
     * In Japan, replaces Tokyo 1892 (CRS code 5132) and replaced by JGD2000 (code 4612) from April 2002. In Korea used
     * only for geodetic applications before being replaced by Korean 1985 (code 4162).
     */
    public const EPSG_TOKYO = 'urn:ogc:def:crs:EPSG::4301';

    /**
     * Tokyo 1892
     * Extent: Japan - onshore; North Korea - onshore; South Korea - onshore.
     * Extended from Japan to Korea in 1898. In Japan, replaced by Tokyo 1918 (CRS code 4301). In South Korea replaced
     * by Tokyo 1918 only for geodetic applications; for all other purposes replaced by Korean 1985 (code 4162).
     */
    public const EPSG_TOKYO_1892 = 'urn:ogc:def:crs:EPSG::5132';

    /**
     * Trinidad 1903
     * Extent: Trinidad and Tobago - Trinidad - onshore and offshore.
     */
    public const EPSG_TRINIDAD_1903 = 'urn:ogc:def:crs:EPSG::4302';

    /**
     * Tristan 1968
     * Extent: St Helena, Ascension and Tristan da Cunha - Tristan da Cunha island group including Tristan,
     * Inaccessible, Nightingale, Middle and Stoltenhoff Islands.
     */
    public const EPSG_TRISTAN_1968 = 'urn:ogc:def:crs:EPSG::4734';

    /**
     * UCS-2000
     * Extent: Ukraine - onshore and offshore.
     * Adopted 1st January 2007, replacing Pulkovo 1942 (CRS 4284).
     */
    public const EPSG_UCS_2000 = 'urn:ogc:def:crs:EPSG::5561';

    /**
     * VN-2000
     * Extent: Vietnam - onshore.
     * Replaces Hanoi 1972 (CRS code 4147).
     */
    public const EPSG_VN_2000 = 'urn:ogc:def:crs:EPSG::4756';

    /**
     * Vanua Levu 1915
     * Extent: Fiji - Vanua Levu and Taveuni.
     * For topographic mapping, replaced by Fiji 1956 (CRS code 4721). For other purposes, replaced by Fiji 1986 (CRS
     * code 4720).
     */
    public const EPSG_VANUA_LEVU_1915 = 'urn:ogc:def:crs:EPSG::4748';

    /**
     * Vientiane 1982
     * Extent: Laos.
     * Replaced by Lao 1993 and then by Lao 1997. Vientiane 1982 coordinate values are within 3m of Lao 1997 values.
     */
    public const EPSG_VIENTIANE_1982 = 'urn:ogc:def:crs:EPSG::4676';

    /**
     * Viti Levu 1912
     * Extent: Fiji - Viti Levu island.
     * For topographic mapping, replaced by Fiji 1956 (CRS code 4721). For other purposes, replaced by Fiji 1986 (CRS
     * code 4720).
     */
    public const EPSG_VITI_LEVU_1912 = 'urn:ogc:def:crs:EPSG::4752';

    /**
     * Voirol 1875
     * Extent: Algeria - onshore north of 32°N.
     * The appropriate usage of CRSs using the Voirol 1875 and 1879 datums is lost in antiquity. They differ by about 9
     * metres. Oil industry references to one could in reality be to either. All replaced by Nord Sahara 1959 (CRS code
     * 4307).
     */
    public const EPSG_VOIROL_1875 = 'urn:ogc:def:crs:EPSG::4304';

    /**
     * Voirol 1875 (Paris)
     * Extent: Algeria - onshore north of 32°N.
     * The appropriate usage of CRSs using the Voirol 1875 and 1879 datums is lost in antiquity. They differ by about 9
     * metres. Oil industry references to one could in reality be to either. All replaced by Nord Sahara 1959 (CRS code
     * 4307).
     */
    public const EPSG_VOIROL_1875_PARIS = 'urn:ogc:def:crs:EPSG::4811';

    /**
     * Voirol 1879
     * Extent: Algeria - onshore north of 32°N.
     * The appropriate usage of CRSs using the Voirol 1875 and 1879 datums is lost in antiquity. They differ by about 9
     * metres. Oil industry references to one could in reality be to either. All replaced by Nord Sahara 1959 (CRS code
     * 4307).
     */
    public const EPSG_VOIROL_1879 = 'urn:ogc:def:crs:EPSG::4671';

    /**
     * Voirol 1879 (Paris)
     * Extent: Algeria - onshore north of 32°N.
     * The appropriate usage of CRSs using the Voirol 1875 and 1879 datums is lost in antiquity. They differ by about 9
     * metres. Oil industry references to one could in reality be to either. All replaced by Nord Sahara 1959 (CRS code
     * 4307).
     */
    public const EPSG_VOIROL_1879_PARIS = 'urn:ogc:def:crs:EPSG::4821';

    /**
     * WGS 66
     * Extent: World.
     * Replaced by WGS 72.
     */
    public const EPSG_WGS_66 = 'urn:ogc:def:crs:EPSG::4760';

    /**
     * WGS 72
     * Extent: World.
     * Replaced by WGS 84.
     */
    public const EPSG_WGS_72 = 'urn:ogc:def:crs:EPSG::4322';

    /**
     * WGS 72BE
     * Extent: World.
     * Broadcast ephemeris. Replaced by WGS 84.
     */
    public const EPSG_WGS_72BE = 'urn:ogc:def:crs:EPSG::4324';

    /**
     * WGS 84
     * Extent: World.
     */
    public const EPSG_WGS_84 = 'urn:ogc:def:crs:EPSG::4326';

    /**
     * WGS 84 (G1150)
     * Extent: World.
     * Replaces  WGS 84 (G873) (CRS code 9054) from 2002-01-20. Replaced by WGS 84 (G1674) (CRS code 9056) from
     * 2012-02-08.
     */
    public const EPSG_WGS_84_G1150 = 'urn:ogc:def:crs:EPSG::9055';

    /**
     * WGS 84 (G1674)
     * Extent: World.
     * Replaces WGS 84 (G1150) (CRS code 9055) from 2012-02-08. Replaced by WGS 84 (G1762) (CRS code 9057) from
     * 2013-10-16.
     */
    public const EPSG_WGS_84_G1674 = 'urn:ogc:def:crs:EPSG::9056';

    /**
     * WGS 84 (G1762)
     * Extent: World.
     * Replaces WGS 84 (G1674) (CRS code 9056) from 2013-10-16.
     */
    public const EPSG_WGS_84_G1762 = 'urn:ogc:def:crs:EPSG::9057';

    /**
     * WGS 84 (G730)
     * Extent: World.
     * Replaces WGS 84 (Transit) (CRS code 8888) from 1994-06-29. Replaced by WGS84 (G873) (CRS code 9054) from
     * 1997-01-29.
     */
    public const EPSG_WGS_84_G730 = 'urn:ogc:def:crs:EPSG::9053';

    /**
     * WGS 84 (G873)
     * Extent: World.
     * Replaces WGS 84 (G730) (CRS code 9053) from 1997-01-29. Replaced by WGS 84 (G1150) (CRS code 9055) from
     * 2002-01-20.
     */
    public const EPSG_WGS_84_G873 = 'urn:ogc:def:crs:EPSG::9054';

    /**
     * WGS 84 (Transit)
     * Extent: World.
     * Replaced by WGS84 (G730) (CRS code 9053) from 1994-06-29.
     */
    public const EPSG_WGS_84_TRANSIT = 'urn:ogc:def:crs:EPSG::8888';

    /**
     * Wake Island 1952
     * Extent: Wake atoll - onshore.
     */
    public const EPSG_WAKE_ISLAND_1952 = 'urn:ogc:def:crs:EPSG::4733';

    /**
     * Xian 1980
     * Extent: China - onshore.
     * Replaces Beijing 1954 (CRS code 4214). Replaced by CGCS2000(CRS code 4490).
     */
    public const EPSG_XIAN_1980 = 'urn:ogc:def:crs:EPSG::4610';

    /**
     * Yacare
     * Extent: Uruguay - onshore.
     * Replaced by SIRGAS-ROU98 (CRS code 5381).
     */
    public const EPSG_YACARE = 'urn:ogc:def:crs:EPSG::4309';

    /**
     * Yemen NGN96
     * Extent: Yemen - onshore and offshore.
     */
    public const EPSG_YEMEN_NGN96 = 'urn:ogc:def:crs:EPSG::4163';

    /**
     * Yoff
     * Extent: Senegal - onshore and offshore.
     */
    public const EPSG_YOFF = 'urn:ogc:def:crs:EPSG::4310';

    /**
     * Zanderij
     * Extent: Suriname - onshore and offshore.
     * Introduced in 1975.
     */
    public const EPSG_ZANDERIJ = 'urn:ogc:def:crs:EPSG::4311';

    /**
     * fk89
     * Extent: Faroe Islands - onshore.
     * Replaces FD54 (CRS code 4741). Coordinate differences are less than 0.05 seconds (2m). The name of this system
     * is also used for the dependent projected CRS - see CRS code 3173.
     */
    public const EPSG_FK89 = 'urn:ogc:def:crs:EPSG::4753';

    protected static $sridData = [
        'urn:ogc:def:crs:EPSG::3819' => [
            'name' => 'HD1909',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1024',
            'bounding_box' => [[16.11, 45.74], [16.11, 48.58], [22.9, 48.58], [22.9, 45.74]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::3821' => [
            'name' => 'TWD67',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1025',
            'bounding_box' => [[119.25, 21.87], [119.25, 25.34], [122.06, 25.34], [122.06, 21.87]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::3824' => [
            'name' => 'TWD97',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1026',
            'bounding_box' => [[114.32, 17.36], [114.32, 26.96], [123.61, 26.96], [123.61, 17.36]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::3889' => [
            'name' => 'IGRS',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1029',
            'bounding_box' => [[38.79, 29.06], [38.79, 37.39], [48.75, 37.39], [48.75, 29.06]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::3906' => [
            'name' => 'MGI 1901',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1031',
            'bounding_box' => [[13.383471488953, 40.855888366699], [13.383471488953, 46.876247406006], [23.030969619751, 46.876247406006], [23.030969619751, 40.855888366699]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4023' => [
            'name' => 'MOLDREF99',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1032',
            'bounding_box' => [[26.63, 45.44], [26.63, 48.47], [30.13, 48.47], [30.13, 45.44]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4046' => [
            'name' => 'RGRDC 2005',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1033',
            'bounding_box' => [[11.79, -13.46], [11.79, -3.41], [29.81, -3.41], [29.81, -13.46]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4075' => [
            'name' => 'SREF98',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1034',
            'bounding_box' => [[18.81702041626, 42.232494354248], [18.81702041626, 46.18111038208], [23.004997253418, 46.18111038208], [23.004997253418, 42.232494354248]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4081' => [
            'name' => 'REGCAN95',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1035',
            'bounding_box' => [[-21.93, 24.6], [-21.93, 32.76], [-11.75, 32.76], [-11.75, 24.6]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4120' => [
            'name' => 'Greek',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6120',
            'bounding_box' => [[19.57, 34.88], [19.57, 41.75], [28.3, 41.75], [28.3, 34.88]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4121' => [
            'name' => 'GGRS87',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6121',
            'bounding_box' => [[19.57, 34.88], [19.57, 41.75], [28.3, 41.75], [28.3, 34.88]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4122' => [
            'name' => 'ATS77',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6122',
            'bounding_box' => [[-69.05, 43.41], [-69.05, 48.07], [-59.73, 48.07], [-59.73, 43.41]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4123' => [
            'name' => 'KKJ',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6123',
            'bounding_box' => [[19.24, 59.75], [19.24, 70.09], [31.59, 70.09], [31.59, 59.75]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4124' => [
            'name' => 'RT90',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6124',
            'bounding_box' => [[10.03, 54.96], [10.03, 69.06999999999999], [24.17, 69.06999999999999], [24.17, 54.96]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4127' => [
            'name' => 'Tete',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6127',
            'bounding_box' => [[30.21, -26.87], [30.21, -10.42], [40.9, -10.42], [40.9, -26.87]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4128' => [
            'name' => 'Madzansua',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6128',
            'bounding_box' => [[30.21, -17.76], [30.21, -14.01], [35.37, -14.01], [35.37, -17.76]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4129' => [
            'name' => 'Observatario',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6129',
            'bounding_box' => [[31.29, -26.87], [31.29, -19.84], [35.65, -19.84], [35.65, -26.87]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4130' => [
            'name' => 'Moznet',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6130',
            'bounding_box' => [[30.21, -27.71], [30.21, -10.09], [43.03, -10.09], [43.03, -27.71]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4131' => [
            'name' => 'Indian 1960',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6131',
            'bounding_box' => [[102.14, 7.99], [102.14, 23.4], [110.0, 23.4], [110.0, 7.99]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4132' => [
            'name' => 'FD58',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6132',
            'bounding_box' => [[47.13, 26.21], [47.13, 33.22], [53.61, 33.22], [53.61, 26.21]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4133' => [
            'name' => 'EST92',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6133',
            'bounding_box' => [[21.74, 57.52], [21.74, 59.75], [28.2, 59.75], [28.2, 57.52]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4134' => [
            'name' => 'PSD93',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6134',
            'bounding_box' => [[51.99, 16.59], [51.99, 26.58], [59.91, 26.58], [59.91, 16.59]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4135' => [
            'name' => 'Old Hawaiian',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6135',
            'bounding_box' => [[-160.3, 18.87], [-160.3, 22.29], [-154.74, 22.29], [-154.74, 18.87]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4136' => [
            'name' => 'St. Lawrence Island',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6136',
            'bounding_box' => [[-171.97, 62.89], [-171.97, 63.84], [-168.59, 63.84], [-168.59, 62.89]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4137' => [
            'name' => 'St. Paul Island',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6137',
            'bounding_box' => [[-170.51, 57.06], [-170.51, 57.28], [-170.04, 57.28], [-170.04, 57.06]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4138' => [
            'name' => 'St. George Island',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6138',
            'bounding_box' => [[-169.88, 56.49], [-169.88, 56.67], [-169.38, 56.67], [-169.38, 56.49]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4139' => [
            'name' => 'Puerto Rico',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6139',
            'bounding_box' => [[-67.97, 17.62], [-67.97, 18.78], [-64.25, 18.78], [-64.25, 17.62]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4141' => [
            'name' => 'Israel 1993',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6141',
            'bounding_box' => [[34.17, 29.45], [34.17, 33.28], [35.69, 33.28], [35.69, 29.45]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4142' => [
            'name' => 'Locodjo 1965',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6142',
            'bounding_box' => [[-8.609999999999999, 1.02], [-8.609999999999999, 10.74], [-2.48, 10.74], [-2.48, 1.02]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4143' => [
            'name' => 'Abidjan 1987',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6143',
            'bounding_box' => [[-8.609999999999999, 1.02], [-8.609999999999999, 10.74], [-2.48, 10.74], [-2.48, 1.02]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4144' => [
            'name' => 'Kalianpur 1937',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6144',
            'bounding_box' => [[60.86, 8.02], [60.86, 37.07], [101.17, 37.07], [101.17, 8.02]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4145' => [
            'name' => 'Kalianpur 1962',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6145',
            'bounding_box' => [[60.86, 21.05], [60.86, 37.07], [77.83, 37.07], [77.83, 21.05]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4146' => [
            'name' => 'Kalianpur 1975',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6146',
            'bounding_box' => [[68.13, 8.02], [68.13, 35.51], [97.42, 35.51], [97.42, 8.02]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4147' => [
            'name' => 'Hanoi 1972',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6147',
            'bounding_box' => [[102.14, 8.33], [102.14, 23.4], [109.53, 23.4], [109.53, 8.33]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4148' => [
            'name' => 'Hartebeesthoek94',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6148',
            'bounding_box' => [[13.33, -50.32], [13.33, -22.13], [42.85, -22.13], [42.85, -50.32]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4149' => [
            'name' => 'CH1903',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6149',
            'bounding_box' => [[5.96, 45.82], [5.96, 47.81], [10.49, 47.81], [10.49, 45.82]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4150' => [
            'name' => 'CH1903+',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6150',
            'bounding_box' => [[5.96, 45.82], [5.96, 47.81], [10.49, 47.81], [10.49, 45.82]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4151' => [
            'name' => 'CHTRF95',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6151',
            'bounding_box' => [[5.96, 45.82], [5.96, 47.81], [10.49, 47.81], [10.49, 45.82]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4152' => [
            'name' => 'NAD83(HARN)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6152',
            'bounding_box' => [[144.58, -14.59], [144.58, 71.40000000000001], [-64.51000000000001, 71.40000000000001], [-64.51000000000001, -14.59]],
            'bounding_box_crosses_antimeridian' => true,
        ],
        'urn:ogc:def:crs:EPSG::4153' => [
            'name' => 'Rassadiran',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6153',
            'bounding_box' => [[52.5, 27.39], [52.5, 27.61], [52.71, 27.61], [52.71, 27.39]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4154' => [
            'name' => 'ED50(ED77)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6154',
            'bounding_box' => [[44.03, 23.34], [44.03, 39.78], [63.34, 39.78], [63.34, 23.34]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4155' => [
            'name' => 'Dabola 1981',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6155',
            'bounding_box' => [[-15.13, 7.19], [-15.13, 12.68], [-7.65, 12.68], [-7.65, 7.19]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4156' => [
            'name' => 'S-JTSK',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6156',
            'bounding_box' => [[12.09, 47.73], [12.09, 51.06], [22.56, 51.06], [22.56, 47.73]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4157' => [
            'name' => 'Mount Dillon',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6157',
            'bounding_box' => [[-60.9, 11.08], [-60.9, 11.41], [-60.44, 11.41], [-60.44, 11.08]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4158' => [
            'name' => 'Naparima 1955',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6158',
            'bounding_box' => [[-61.98, 9.99], [-61.98, 10.9], [-60.85, 10.9], [-60.85, 9.99]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4159' => [
            'name' => 'ELD79',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6159',
            'bounding_box' => [[9.31, 19.5], [9.31, 35.23], [26.21, 35.23], [26.21, 19.5]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4160' => [
            'name' => 'Chos Malal 1914',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6160',
            'bounding_box' => [[-72.14, -43.41], [-72.14, -31.91], [-65.86, -31.91], [-65.86, -43.41]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4161' => [
            'name' => 'Pampa del Castillo',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6161',
            'bounding_box' => [[-73.59, -50.34], [-73.59, -42.49], [-65.47, -42.49], [-65.47, -50.34]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4162' => [
            'name' => 'Korean 1985',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6162',
            'bounding_box' => [[124.53, 33.14], [124.53, 38.64], [131.01, 38.64], [131.01, 33.14]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4163' => [
            'name' => 'Yemen NGN96',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6163',
            'bounding_box' => [[41.08, 8.949999999999999], [41.08, 19.0], [57.96, 19.0], [57.96, 8.949999999999999]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4164' => [
            'name' => 'South Yemen',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6164',
            'bounding_box' => [[43.37, 12.54], [43.37, 19.0], [53.14, 19.0], [53.14, 12.54]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4165' => [
            'name' => 'Bissau',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6165',
            'bounding_box' => [[-16.77, 10.87], [-16.77, 12.69], [-13.64, 12.69], [-13.64, 10.87]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4166' => [
            'name' => 'Korean 1995',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6166',
            'bounding_box' => [[124.53, 33.14], [124.53, 38.64], [131.01, 38.64], [131.01, 33.14]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4167' => [
            'name' => 'NZGD2000',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6167',
            'bounding_box' => [[160.6, -55.95], [160.6, -25.88], [-171.2, -25.88], [-171.2, -55.95]],
            'bounding_box_crosses_antimeridian' => true,
        ],
        'urn:ogc:def:crs:EPSG::4168' => [
            'name' => 'Accra',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6168',
            'bounding_box' => [[-3.79, 1.4], [-3.79, 11.16], [2.1, 11.16], [2.1, 1.4]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4169' => [
            'name' => 'American Samoa 1962',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6169',
            'bounding_box' => [[-170.88, -14.43], [-170.88, -14.11], [-169.38, -14.11], [-169.38, -14.43]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4170' => [
            'name' => 'SIRGAS 1995',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6170',
            'bounding_box' => [[-113.21, -59.87], [-113.21, 16.75], [-26.0, 16.75], [-26.0, -59.87]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4171' => [
            'name' => 'RGF93',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6171',
            'bounding_box' => [[-9.859999999999999, 41.15], [-9.859999999999999, 51.56], [10.38, 51.56], [10.38, 41.15]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4173' => [
            'name' => 'IRENET95',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6173',
            'bounding_box' => [[-10.56, 51.39], [-10.56, 55.43], [-5.34, 55.43], [-5.34, 51.39]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4174' => [
            'name' => 'Sierra Leone 1924',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6174',
            'bounding_box' => [[-13.34, 8.32], [-13.34, 8.550000000000001], [-13.13, 8.550000000000001], [-13.13, 8.32]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4175' => [
            'name' => 'Sierra Leone 1968',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6175',
            'bounding_box' => [[-13.35, 6.88], [-13.35, 10.0], [-10.26, 10.0], [-10.26, 6.88]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4176' => [
            'name' => 'Australian Antarctic',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6176',
            'bounding_box' => [[45.0, -90.0], [45.0, -60.0], [160.0, -60.0], [160.0, -90.0]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4178' => [
            'name' => 'Pulkovo 1942(83)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6178',
            'bounding_box' => [[9.92, 41.24], [9.92, 54.74], [28.68, 54.74], [28.68, 41.24]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4179' => [
            'name' => 'Pulkovo 1942(58)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6179',
            'bounding_box' => [[9.92, 39.63], [9.92, 54.89], [31.41, 54.89], [31.41, 39.63]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4180' => [
            'name' => 'EST97',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6180',
            'bounding_box' => [[20.37, 57.52], [20.37, 60.0], [28.2, 60.0], [28.2, 57.52]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4181' => [
            'name' => 'Luxembourg 1930',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6181',
            'bounding_box' => [[5.73, 49.44], [5.73, 50.19], [6.53, 50.19], [6.53, 49.44]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4182' => [
            'name' => 'Azores Occidental 1939',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6182',
            'bounding_box' => [[-31.34, 39.3], [-31.34, 39.77], [-31.02, 39.77], [-31.02, 39.3]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4183' => [
            'name' => 'Azores Central 1948',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6183',
            'bounding_box' => [[-28.9, 38.32], [-28.9, 39.14], [-26.97, 39.14], [-26.97, 38.32]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4184' => [
            'name' => 'Azores Oriental 1940',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6184',
            'bounding_box' => [[-25.92, 36.87], [-25.92, 37.96], [-24.62, 37.96], [-24.62, 36.87]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4188' => [
            'name' => 'OSNI 1952',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6188',
            'bounding_box' => [[-8.18, 53.96], [-8.18, 55.36], [-5.34, 55.36], [-5.34, 53.96]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4189' => [
            'name' => 'REGVEN',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6189',
            'bounding_box' => [[-73.38, 0.64], [-73.38, 16.75], [-58.95, 16.75], [-58.95, 0.64]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4190' => [
            'name' => 'POSGAR 98',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6190',
            'bounding_box' => [[-73.59, -58.41], [-73.59, -21.78], [-52.63, -21.78], [-52.63, -58.41]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4191' => [
            'name' => 'Albanian 1987',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6191',
            'bounding_box' => [[19.22, 39.64], [19.22, 42.67], [21.06, 42.67], [21.06, 39.64]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4192' => [
            'name' => 'Douala 1948',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6192',
            'bounding_box' => [[8.449999999999999, 2.16], [8.449999999999999, 4.99], [10.4, 4.99], [10.4, 2.16]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4193' => [
            'name' => 'Manoca 1962',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6193',
            'bounding_box' => [[8.449999999999999, 2.16], [8.449999999999999, 4.99], [10.4, 4.99], [10.4, 2.16]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4194' => [
            'name' => 'Qornoq 1927',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6194',
            'bounding_box' => [[-73.29000000000001, 59.74], [-73.29000000000001, 79.0], [-42.52, 79.0], [-42.52, 59.74]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4195' => [
            'name' => 'Scoresbysund 1952',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6195',
            'bounding_box' => [[-29.69, 68.66], [-29.69, 74.58], [-19.89, 74.58], [-19.89, 68.66]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4196' => [
            'name' => 'Ammassalik 1958',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6196',
            'bounding_box' => [[-38.86, 65.52], [-38.86, 65.91], [-36.81, 65.91], [-36.81, 65.52]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4197' => [
            'name' => 'Garoua',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6197',
            'bounding_box' => [[12.9, 8.92], [12.9, 9.869999999999999], [14.19, 9.869999999999999], [14.19, 8.92]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4198' => [
            'name' => 'Kousseri',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6198',
            'bounding_box' => [[14.17, 11.7], [14.17, 12.77], [15.09, 12.77], [15.09, 11.7]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4199' => [
            'name' => 'Egypt 1930',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6199',
            'bounding_box' => [[24.7, 21.97], [24.7, 31.68], [36.95, 31.68], [36.95, 21.97]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4200' => [
            'name' => 'Pulkovo 1995',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6200',
            'bounding_box' => [[18.925748825074, 39.878541946411], [18.925748825074, 85.190134048462], [-168.97182656183, 85.190134048462], [-168.97182656183, 39.878541946411]],
            'bounding_box_crosses_antimeridian' => true,
        ],
        'urn:ogc:def:crs:EPSG::4201' => [
            'name' => 'Adindan',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6201',
            'bounding_box' => [[21.82, 3.4], [21.82, 22.24], [47.99, 22.24], [47.99, 3.4]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4202' => [
            'name' => 'AGD66',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6202',
            'bounding_box' => [[109.23, -47.2], [109.23, -1.3], [163.2, -1.3], [163.2, -47.2]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4203' => [
            'name' => 'AGD84',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6203',
            'bounding_box' => [[109.23, -38.53], [109.23, -9.369999999999999], [153.61, -9.369999999999999], [153.61, -38.53]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4204' => [
            'name' => 'Ain el Abd',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6204',
            'bounding_box' => [[34.51, 16.37], [34.51, 32.16], [55.67, 32.16], [55.67, 16.37]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4205' => [
            'name' => 'Afgooye',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6205',
            'bounding_box' => [[40.99, -1.71], [40.99, 12.03], [51.47, 12.03], [51.47, -1.71]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4206' => [
            'name' => 'Agadez',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6206',
            'bounding_box' => [[0.16, 11.69], [0.16, 23.53], [16.0, 23.53], [16.0, 11.69]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4207' => [
            'name' => 'Lisbon',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6207',
            'bounding_box' => [[-9.56, 36.95], [-9.56, 42.16], [-6.19, 42.16], [-6.19, 36.95]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4208' => [
            'name' => 'Aratu',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6208',
            'bounding_box' => [[-53.38, -35.71], [-53.38, 4.26], [-26.0, 4.26], [-26.0, -35.71]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4209' => [
            'name' => 'Arc 1950',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6209',
            'bounding_box' => [[19.99, -26.88], [19.99, -8.19], [35.93, -8.19], [35.93, -26.88]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4210' => [
            'name' => 'Arc 1960',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6210',
            'bounding_box' => [[28.85, -11.75], [28.85, 4.63], [41.91, 4.63], [41.91, -11.75]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4211' => [
            'name' => 'Batavia',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6211',
            'bounding_box' => [[95.16, -8.91], [95.16, 5.97], [117.01, 5.97], [117.01, -8.91]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4212' => [
            'name' => 'Barbados 1938',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6212',
            'bounding_box' => [[-59.71, 13.0], [-59.71, 13.39], [-59.37, 13.39], [-59.37, 13.0]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4213' => [
            'name' => 'Beduaram',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6213',
            'bounding_box' => [[7.81, 12.8], [7.81, 16.7], [14.9, 16.7], [14.9, 12.8]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4214' => [
            'name' => 'Beijing 1954',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6214',
            'bounding_box' => [[73.62, 16.7], [73.62, 53.56], [134.77, 53.56], [134.77, 16.7]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4215' => [
            'name' => 'Belge 1950',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6215',
            'bounding_box' => [[2.5, 49.5], [2.5, 51.51], [6.4, 51.51], [6.4, 49.5]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4216' => [
            'name' => 'Bermuda 1957',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6216',
            'bounding_box' => [[-64.89, 32.21], [-64.89, 32.43], [-64.61, 32.43], [-64.61, 32.21]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4218' => [
            'name' => 'Bogota 1975',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6218',
            'bounding_box' => [[-79.09999999999999, -4.23], [-79.09999999999999, 13.68], [-66.87, 13.68], [-66.87, -4.23]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4219' => [
            'name' => 'Bukit Rimpah',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6219',
            'bounding_box' => [[105.07, -3.3], [105.07, -1.44], [108.35, -1.44], [108.35, -3.3]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4220' => [
            'name' => 'Camacupa 1948',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6220',
            'bounding_box' => [[8.199999999999999, -18.02], [8.199999999999999, -5.82], [24.09, -5.82], [24.09, -18.02]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4221' => [
            'name' => 'Campo Inchauspe',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6221',
            'bounding_box' => [[-73.59, -54.93], [-73.59, -21.78], [-53.65, -21.78], [-53.65, -54.93]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4222' => [
            'name' => 'Cape',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6222',
            'bounding_box' => [[16.45, -34.88], [16.45, -17.78], [32.95, -17.78], [32.95, -34.88]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4223' => [
            'name' => 'Carthage',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6223',
            'bounding_box' => [[7.49, 30.23], [7.49, 38.41], [13.67, 38.41], [13.67, 30.23]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4224' => [
            'name' => 'Chua',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6224',
            'bounding_box' => [[-62.57, -31.91], [-62.57, -15.37], [-47.1, -15.37], [-47.1, -31.91]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4225' => [
            'name' => 'Corrego Alegre 1970-72',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6225',
            'bounding_box' => [[-58.16, -33.78], [-58.16, -2.68], [-34.74, -2.68], [-34.74, -33.78]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4227' => [
            'name' => 'Deir ez Zor',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6227',
            'bounding_box' => [[35.04, 32.31], [35.04, 37.3], [42.38, 37.3], [42.38, 32.31]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4229' => [
            'name' => 'Egypt 1907',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6229',
            'bounding_box' => [[24.7, 21.89], [24.7, 33.82], [37.91, 33.82], [37.91, 21.89]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4230' => [
            'name' => 'ED50',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6230',
            'bounding_box' => [[-16.096100515106, 25.712493202945], [-16.096100515106, 84.722623821813], [48.608653779497, 84.722623821813], [48.608653779497, 25.712493202945]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4231' => [
            'name' => 'ED87',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6231',
            'bounding_box' => [[-10.555896938101, 34.880534471998], [-10.555896938101, 84.722623821813], [38.0, 84.722623821813], [38.0, 34.880534471998]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4232' => [
            'name' => 'Fahud',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6232',
            'bounding_box' => [[51.99, 16.59], [51.99, 26.42], [59.91, 26.42], [59.91, 16.59]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4236' => [
            'name' => 'Hu Tzu Shan 1950',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6236',
            'bounding_box' => [[119.25, 21.87], [119.25, 25.34], [122.06, 25.34], [122.06, 21.87]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4237' => [
            'name' => 'HD72',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6237',
            'bounding_box' => [[16.11, 45.74], [16.11, 48.58], [22.9, 48.58], [22.9, 45.74]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4238' => [
            'name' => 'ID74',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6238',
            'bounding_box' => [[95.16, -10.98], [95.16, 5.97], [141.01, 5.97], [141.01, -10.98]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4239' => [
            'name' => 'Indian 1954',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6239',
            'bounding_box' => [[92.2, 5.63], [92.2, 28.55], [105.64, 28.55], [105.64, 5.63]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4240' => [
            'name' => 'Indian 1975',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6240',
            'bounding_box' => [[97.34, 5.63], [97.34, 20.46], [105.64, 20.46], [105.64, 5.63]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4241' => [
            'name' => 'Jamaica 1875',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6241',
            'bounding_box' => [[-78.43000000000001, 17.64], [-78.43000000000001, 18.58], [-76.17, 18.58], [-76.17, 17.64]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4242' => [
            'name' => 'JAD69',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6242',
            'bounding_box' => [[-78.43000000000001, 17.64], [-78.43000000000001, 18.58], [-76.17, 18.58], [-76.17, 17.64]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4243' => [
            'name' => 'Kalianpur 1880',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6243',
            'bounding_box' => [[60.86, 8.02], [60.86, 37.07], [101.17, 37.07], [101.17, 8.02]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4244' => [
            'name' => 'Kandawala',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6244',
            'bounding_box' => [[79.64, 5.86], [79.64, 9.880000000000001], [81.95, 9.880000000000001], [81.95, 5.86]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4245' => [
            'name' => 'Kertau 1968',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6245',
            'bounding_box' => [[99.59, 1.13], [99.59, 7.81], [105.82, 7.81], [105.82, 1.13]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4246' => [
            'name' => 'KOC',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6246',
            'bounding_box' => [[46.54, 28.53], [46.54, 30.09], [48.48, 30.09], [48.48, 28.53]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4247' => [
            'name' => 'La Canoa',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6247',
            'bounding_box' => [[-73.38, 0.64], [-73.38, 12.25], [-59.8, 12.25], [-59.8, 0.64]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4248' => [
            'name' => 'PSAD56',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6248',
            'bounding_box' => [[-81.41, -43.5], [-81.41, 12.68], [-47.99, 12.68], [-47.99, -43.5]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4249' => [
            'name' => 'Lake',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6249',
            'bounding_box' => [[-72.40000000000001, 8.720000000000001], [-72.40000000000001, 11.04], [-70.78, 11.04], [-70.78, 8.720000000000001]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4250' => [
            'name' => 'Leigon',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6250',
            'bounding_box' => [[-3.79, 1.4], [-3.79, 11.16], [2.1, 11.16], [2.1, 1.4]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4251' => [
            'name' => 'Liberia 1964',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6251',
            'bounding_box' => [[-11.52, 4.29], [-11.52, 8.52], [-7.36, 8.52], [-7.36, 4.29]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4252' => [
            'name' => 'Lome',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6252',
            'bounding_box' => [[-0.15, 2.91], [-0.15, 11.14], [2.42, 11.14], [2.42, 2.91]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4253' => [
            'name' => 'Luzon 1911',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6253',
            'bounding_box' => [[116.89, 4.99], [116.89, 19.45], [126.65, 19.45], [126.65, 4.99]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4254' => [
            'name' => 'Hito XVIII 1963',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6254',
            'bounding_box' => [[-74.83, -55.96], [-74.83, -51.65], [-63.73, -51.65], [-63.73, -55.96]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4255' => [
            'name' => 'Herat North',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6255',
            'bounding_box' => [[60.5, 29.4], [60.5, 38.48], [74.92, 38.48], [74.92, 29.4]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4256' => [
            'name' => 'Mahe 1971',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6256',
            'bounding_box' => [[55.3, -4.86], [55.3, -4.5], [55.59, -4.5], [55.59, -4.86]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4257' => [
            'name' => 'Makassar',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6257',
            'bounding_box' => [[118.71, -6.54], [118.71, -1.88], [120.78, -1.88], [120.78, -6.54]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4258' => [
            'name' => 'ETRS89',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6258',
            'bounding_box' => [[-16.096100515106, 32.884955146013], [-16.096100515106, 84.722623821813], [40.178745269776, 84.722623821813], [40.178745269776, 32.884955146013]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4259' => [
            'name' => 'Malongo 1987',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6259',
            'bounding_box' => [[10.53, -6.04], [10.53, -5.05], [12.37, -5.05], [12.37, -6.04]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4261' => [
            'name' => 'Merchich',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6261',
            'bounding_box' => [[-17.16, 20.71], [-17.16, 35.97], [-1.01, 35.97], [-1.01, 20.71]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4262' => [
            'name' => 'Massawa',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6262',
            'bounding_box' => [[36.44, 12.36], [36.44, 18.1], [43.31, 18.1], [43.31, 12.36]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4263' => [
            'name' => 'Minna',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6263',
            'bounding_box' => [[2.66, 1.92], [2.66, 13.9], [14.65, 13.9], [14.65, 1.92]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4265' => [
            'name' => 'Monte Mario',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6265',
            'bounding_box' => [[5.93, 34.76], [5.93, 47.1], [18.99, 47.1], [18.99, 34.76]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4266' => [
            'name' => 'M\'poraloko',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6266',
            'bounding_box' => [[7.03, -6.37], [7.03, 2.32], [14.52, 2.32], [14.52, -6.37]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4267' => [
            'name' => 'NAD27',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6267',
            'bounding_box' => [[167.65, 7.15], [167.65, 83.17], [-47.74, 83.17], [-47.74, 7.15]],
            'bounding_box_crosses_antimeridian' => true,
        ],
        'urn:ogc:def:crs:EPSG::4269' => [
            'name' => 'NAD83',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6269',
            'bounding_box' => [[167.65071105957, 14.928194130078], [167.65071105957, 86.453745196084], [-47.743430543984, 86.453745196084], [-47.743430543984, 14.928194130078]],
            'bounding_box_crosses_antimeridian' => true,
        ],
        'urn:ogc:def:crs:EPSG::4270' => [
            'name' => 'Nahrwan 1967',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6270',
            'bounding_box' => [[50.55, 22.63], [50.55, 27.05], [57.13, 27.05], [57.13, 22.63]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4271' => [
            'name' => 'Naparima 1972',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6271',
            'bounding_box' => [[-60.9, 11.08], [-60.9, 11.41], [-60.44, 11.41], [-60.44, 11.08]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4272' => [
            'name' => 'NZGD49',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6272',
            'bounding_box' => [[165.87, -47.65], [165.87, -33.89], [179.27, -33.89], [179.27, -47.65]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4273' => [
            'name' => 'NGO 1948',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6273',
            'bounding_box' => [[4.68, 57.93], [4.68, 71.20999999999999], [31.22, 71.20999999999999], [31.22, 57.93]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4274' => [
            'name' => 'Datum 73',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6274',
            'bounding_box' => [[-9.56, 36.95], [-9.56, 42.16], [-6.19, 42.16], [-6.19, 36.95]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4275' => [
            'name' => 'NTF',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6275',
            'bounding_box' => [[-4.87, 41.31], [-4.87, 51.14], [9.630000000000001, 51.14], [9.630000000000001, 41.31]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4276' => [
            'name' => 'NSWC 9Z-2',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6276',
            'bounding_box' => [[-180.0, -90.0], [-180.0, 90.0], [180.0, 90.0], [180.0, -90.0]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4277' => [
            'name' => 'OSGB 1936',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6277',
            'bounding_box' => [[-9.0, 49.75], [-9.0, 61.01], [2.01, 61.01], [2.01, 49.75]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4278' => [
            'name' => 'OSGB70',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6278',
            'bounding_box' => [[-8.82, 49.79], [-8.82, 60.94], [1.92, 60.94], [1.92, 49.79]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4279' => [
            'name' => 'OS(SN)80',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6279',
            'bounding_box' => [[-10.56, 49.81], [-10.56, 60.9], [1.84, 60.9], [1.84, 49.81]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4281' => [
            'name' => 'Palestine 1923',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6281',
            'bounding_box' => [[34.17, 29.18], [34.17, 33.38], [39.31, 33.38], [39.31, 29.18]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4282' => [
            'name' => 'Pointe Noire',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6282',
            'bounding_box' => [[8.84, -6.91], [8.84, 3.72], [18.65, 3.72], [18.65, -6.91]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4283' => [
            'name' => 'GDA94',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6283',
            'bounding_box' => [[93.41, -60.56], [93.41, -8.470000000000001], [173.35, -8.470000000000001], [173.35, -60.56]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4284' => [
            'name' => 'Pulkovo 1942',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6284',
            'bounding_box' => [[19.57, 35.14], [19.57, 81.91], [-168.97, 81.91], [-168.97, 35.14]],
            'bounding_box_crosses_antimeridian' => true,
        ],
        'urn:ogc:def:crs:EPSG::4285' => [
            'name' => 'Qatar 1974',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6285',
            'bounding_box' => [[50.55, 24.55], [50.55, 27.05], [53.04, 27.05], [53.04, 24.55]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4286' => [
            'name' => 'Qatar 1948',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6286',
            'bounding_box' => [[50.69, 24.55], [50.69, 26.2], [51.68, 26.2], [51.68, 24.55]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4288' => [
            'name' => 'Loma Quintana',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6288',
            'bounding_box' => [[-73.38, 7.75], [-73.38, 12.25], [-59.8, 12.25], [-59.8, 7.75]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4289' => [
            'name' => 'Amersfoort',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6289',
            'bounding_box' => [[3.2, 50.75], [3.2, 53.7], [7.22, 53.7], [7.22, 50.75]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4292' => [
            'name' => 'Sapper Hill 1943',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6292',
            'bounding_box' => [[-61.55, -52.51], [-61.55, -50.96], [-57.6, -50.96], [-57.6, -52.51]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4293' => [
            'name' => 'Schwarzeck',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6293',
            'bounding_box' => [[8.24, -30.64], [8.24, -16.95], [25.27, -16.95], [25.27, -30.64]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4295' => [
            'name' => 'Serindung',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6295',
            'bounding_box' => [[108.79, 0.06], [108.79, 2.13], [109.78, 2.13], [109.78, 0.06]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4297' => [
            'name' => 'Tananarive',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6297',
            'bounding_box' => [[42.53, -26.59], [42.53, -11.69], [51.03, -11.69], [51.03, -26.59]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4298' => [
            'name' => 'Timbalai 1948',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6298',
            'bounding_box' => [[109.31, 0.85], [109.31, 7.67], [119.61, 7.67], [119.61, 0.85]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4299' => [
            'name' => 'TM65',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6299',
            'bounding_box' => [[-10.56, 51.39], [-10.56, 55.43], [-5.34, 55.43], [-5.34, 51.39]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4300' => [
            'name' => 'TM75',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6300',
            'bounding_box' => [[-10.56, 51.39], [-10.56, 55.43], [-5.34, 55.43], [-5.34, 51.39]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4301' => [
            'name' => 'Tokyo',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6301',
            'bounding_box' => [[122.83, 20.37], [122.83, 45.54], [154.05, 45.54], [154.05, 20.37]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4302' => [
            'name' => 'Trinidad 1903',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6302',
            'bounding_box' => [[-62.09, 9.83], [-62.09, 11.51], [-60.0, 11.51], [-60.0, 9.83]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4303' => [
            'name' => 'TC(1948)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6303',
            'bounding_box' => [[51.56, 22.63], [51.56, 25.34], [56.03, 25.34], [56.03, 22.63]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4304' => [
            'name' => 'Voirol 1875',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6304',
            'bounding_box' => [[-2.95, 31.99], [-2.95, 37.14], [9.09, 37.14], [9.09, 31.99]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4306' => [
            'name' => 'Bern 1938',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6306',
            'bounding_box' => [[5.96, 45.82], [5.96, 47.81], [10.49, 47.81], [10.49, 45.82]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4307' => [
            'name' => 'Nord Sahara 1959',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6307',
            'bounding_box' => [[-8.67, 18.97], [-8.67, 38.8], [11.99, 38.8], [11.99, 18.97]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4308' => [
            'name' => 'RT38',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6308',
            'bounding_box' => [[10.93, 55.28], [10.93, 69.06999999999999], [24.17, 69.06999999999999], [24.17, 55.28]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4309' => [
            'name' => 'Yacare',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6309',
            'bounding_box' => [[-58.49, -35.0], [-58.49, -30.09], [-53.09, -30.09], [-53.09, -35.0]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4310' => [
            'name' => 'Yoff',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6310',
            'bounding_box' => [[-20.22, 10.64], [-20.22, 16.7], [-11.36, 16.7], [-11.36, 10.64]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4311' => [
            'name' => 'Zanderij',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6311',
            'bounding_box' => [[-58.08, 1.83], [-58.08, 9.35], [-52.66, 9.35], [-52.66, 1.83]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4312' => [
            'name' => 'MGI',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6312',
            'bounding_box' => [[9.529999999999999, 46.4], [9.529999999999999, 49.02], [17.17, 49.02], [17.17, 46.4]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4313' => [
            'name' => 'Belge 1972',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6313',
            'bounding_box' => [[2.5, 49.5], [2.5, 51.51], [6.4, 51.51], [6.4, 49.5]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4314' => [
            'name' => 'DHDN',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6314',
            'bounding_box' => [[5.87, 47.27], [5.87, 55.09], [13.84, 55.09], [13.84, 47.27]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4315' => [
            'name' => 'Conakry 1905',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6315',
            'bounding_box' => [[-15.13, 7.19], [-15.13, 12.68], [-7.65, 12.68], [-7.65, 7.19]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4316' => [
            'name' => 'Dealul Piscului 1930',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6316',
            'bounding_box' => [[20.26, 43.62], [20.26, 48.27], [29.74, 48.27], [29.74, 43.62]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4318' => [
            'name' => 'NGN',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6318',
            'bounding_box' => [[46.54, 28.53], [46.54, 30.09], [48.48, 30.09], [48.48, 28.53]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4319' => [
            'name' => 'KUDAMS',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6319',
            'bounding_box' => [[47.78, 29.17], [47.78, 29.45], [48.16, 29.45], [48.16, 29.17]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4322' => [
            'name' => 'WGS 72',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6322',
            'bounding_box' => [[-180.0, -90.0], [-180.0, 90.0], [180.0, 90.0], [180.0, -90.0]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4324' => [
            'name' => 'WGS 72BE',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6324',
            'bounding_box' => [[-180.0, -90.0], [-180.0, 90.0], [180.0, 90.0], [180.0, -90.0]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4326' => [
            'name' => 'WGS 84',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6326',
            'bounding_box' => [[-180.0, -90.0], [-180.0, 90.0], [180.0, 90.0], [180.0, -90.0]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4463' => [
            'name' => 'RGSPM06',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1038',
            'bounding_box' => [[-57.1, 43.41], [-57.1, 47.37], [-55.9, 47.37], [-55.9, 43.41]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4470' => [
            'name' => 'RGM04',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1036',
            'bounding_box' => [[43.68, -14.49], [43.68, -11.33], [46.7, -11.33], [46.7, -14.49]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4475' => [
            'name' => 'Cadastre 1997',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1037',
            'bounding_box' => [[44.98, -13.05], [44.98, -12.61], [45.35, -12.61], [45.35, -13.05]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4483' => [
            'name' => 'Mexico ITRF92',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1042',
            'bounding_box' => [[-122.19, 12.1], [-122.19, 32.72], [-84.64, 32.72], [-84.64, 12.1]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4490' => [
            'name' => 'China Geodetic Coordinate System 2000',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1043',
            'bounding_box' => [[73.62, 16.7], [73.62, 53.56], [134.77, 53.56], [134.77, 16.7]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4555' => [
            'name' => 'New Beijing',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1045',
            'bounding_box' => [[73.62, 18.11], [73.62, 53.56], [134.77, 53.56], [134.77, 18.11]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4558' => [
            'name' => 'RRAF 1991',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1047',
            'bounding_box' => [[-63.66, 14.08], [-63.66, 18.54], [-57.52, 18.54], [-57.52, 14.08]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4600' => [
            'name' => 'Anguilla 1957',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6600',
            'bounding_box' => [[-63.22, 18.11], [-63.22, 18.33], [-62.92, 18.33], [-62.92, 18.11]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4601' => [
            'name' => 'Antigua 1943',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6601',
            'bounding_box' => [[-61.95, 16.94], [-61.95, 17.22], [-61.61, 17.22], [-61.61, 16.94]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4602' => [
            'name' => 'Dominica 1945',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6602',
            'bounding_box' => [[-61.55, 15.14], [-61.55, 15.69], [-61.2, 15.69], [-61.2, 15.14]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4603' => [
            'name' => 'Grenada 1953',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6603',
            'bounding_box' => [[-61.84, 11.94], [-61.84, 12.57], [-61.35, 12.57], [-61.35, 11.94]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4604' => [
            'name' => 'Montserrat 1958',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6604',
            'bounding_box' => [[-62.29, 16.62], [-62.29, 16.87], [-62.08, 16.87], [-62.08, 16.62]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4605' => [
            'name' => 'St. Kitts 1955',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6605',
            'bounding_box' => [[-62.92, 17.06], [-62.92, 17.46], [-62.5, 17.46], [-62.5, 17.06]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4606' => [
            'name' => 'St. Lucia 1955',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6606',
            'bounding_box' => [[-61.13, 13.66], [-61.13, 14.16], [-60.82, 14.16], [-60.82, 13.66]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4607' => [
            'name' => 'St. Vincent 1945',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6607',
            'bounding_box' => [[-61.52, 12.54], [-61.52, 13.44], [-61.07, 13.44], [-61.07, 12.54]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4608' => [
            'name' => 'NAD27(76)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6608',
            'bounding_box' => [[-95.16, 41.67], [-95.16, 56.9], [-74.34999999999999, 56.9], [-74.34999999999999, 41.67]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4609' => [
            'name' => 'NAD27(CGQ77)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6609',
            'bounding_box' => [[-79.84999999999999, 44.99], [-79.84999999999999, 62.62], [-57.1, 62.62], [-57.1, 44.99]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4610' => [
            'name' => 'Xian 1980',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6610',
            'bounding_box' => [[73.62, 18.11], [73.62, 53.56], [134.77, 53.56], [134.77, 18.11]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4611' => [
            'name' => 'Hong Kong 1980',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6611',
            'bounding_box' => [[113.76, 22.13], [113.76, 22.58], [114.51, 22.58], [114.51, 22.13]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4612' => [
            'name' => 'JGD2000',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6612',
            'bounding_box' => [[122.38, 17.09], [122.38, 46.05], [157.65, 46.05], [157.65, 17.09]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4613' => [
            'name' => 'Segara',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6613',
            'bounding_box' => [[114.55, -4.24], [114.55, 4.29], [119.06, 4.29], [119.06, -4.24]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4614' => [
            'name' => 'QND95',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6614',
            'bounding_box' => [[50.69, 24.55], [50.69, 26.2], [51.68, 26.2], [51.68, 24.55]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4615' => [
            'name' => 'Porto Santo',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6615',
            'bounding_box' => [[-17.31, 32.35], [-17.31, 33.15], [-16.23, 33.15], [-16.23, 32.35]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4616' => [
            'name' => 'Selvagem Grande',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6616',
            'bounding_box' => [[-16.11, 29.98], [-16.11, 30.21], [-15.79, 30.21], [-15.79, 29.98]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4617' => [
            'name' => 'NAD83(CSRS)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6140',
            'bounding_box' => [[-141.01, 40.04], [-141.01, 86.45999999999999], [-47.74, 86.45999999999999], [-47.74, 40.04]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4618' => [
            'name' => 'SAD69',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6618',
            'bounding_box' => [[-91.72, -55.96], [-91.72, 12.52], [-25.28, 12.52], [-25.28, -55.96]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4619' => [
            'name' => 'SWEREF99',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6619',
            'bounding_box' => [[10.03, 54.96], [10.03, 69.06999999999999], [24.17, 69.06999999999999], [24.17, 54.96]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4620' => [
            'name' => 'Point 58',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6620',
            'bounding_box' => [[-17.19, 10.26], [-17.19, 15.7], [30.42, 15.7], [30.42, 10.26]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4621' => [
            'name' => 'Fort Marigot',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6621',
            'bounding_box' => [[-63.21, 17.82], [-63.21, 18.17], [-62.73, 18.17], [-62.73, 17.82]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4622' => [
            'name' => 'Guadeloupe 1948',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6622',
            'bounding_box' => [[-61.85, 15.8], [-61.85, 16.55], [-60.97, 16.55], [-60.97, 15.8]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4623' => [
            'name' => 'CSG67',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6623',
            'bounding_box' => [[-54.45, 3.43], [-54.45, 5.81], [-51.61, 5.81], [-51.61, 3.43]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4624' => [
            'name' => 'RGFG95',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6624',
            'bounding_box' => [[-54.61, 2.11], [-54.61, 8.880000000000001], [-49.45, 8.880000000000001], [-49.45, 2.11]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4625' => [
            'name' => 'Martinique 1938',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6625',
            'bounding_box' => [[-61.29, 14.35], [-61.29, 14.93], [-60.76, 14.93], [-60.76, 14.35]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4626' => [
            'name' => 'Reunion 1947',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6626',
            'bounding_box' => [[55.16, -21.42], [55.16, -20.81], [55.91, -20.81], [55.91, -21.42]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4627' => [
            'name' => 'RGR92',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6627',
            'bounding_box' => [[51.83, -24.72], [51.83, -18.28], [58.24, -18.28], [58.24, -24.72]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4628' => [
            'name' => 'Tahiti 52',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6628',
            'bounding_box' => [[-150.0, -17.93], [-150.0, -17.41], [-149.11, -17.41], [-149.11, -17.93]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4629' => [
            'name' => 'Tahaa 54',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6629',
            'bounding_box' => [[-151.91, -16.96], [-151.91, -16.17], [-150.89, -16.17], [-150.89, -16.96]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4630' => [
            'name' => 'IGN72 Nuku Hiva',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6630',
            'bounding_box' => [[-140.31, -9.57], [-140.31, -8.720000000000001], [-139.44, -8.720000000000001], [-139.44, -9.57]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4632' => [
            'name' => 'Combani 1950',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6632',
            'bounding_box' => [[44.98, -13.05], [44.98, -12.61], [45.35, -12.61], [45.35, -13.05]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4633' => [
            'name' => 'IGN56 Lifou',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6633',
            'bounding_box' => [[166.98, -21.24], [166.98, -20.62], [167.52, -20.62], [167.52, -21.24]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4636' => [
            'name' => 'Petrels 1972',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6636',
            'bounding_box' => [[139.44, -66.78], [139.44, -66.09999999999999], [141.5, -66.09999999999999], [141.5, -66.78]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4637' => [
            'name' => 'Perroud 1950',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6637',
            'bounding_box' => [[136.0, -67.13], [136.0, -65.61], [142.0, -65.61], [142.0, -67.13]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4638' => [
            'name' => 'Saint Pierre et Miquelon 1950',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6638',
            'bounding_box' => [[-56.48, 46.69], [-56.48, 47.19], [-56.07, 47.19], [-56.07, 46.69]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4639' => [
            'name' => 'MOP78',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6639',
            'bounding_box' => [[-176.25, -13.41], [-176.25, -13.16], [-176.07, -13.16], [-176.07, -13.41]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4641' => [
            'name' => 'IGN53 Mare',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6641',
            'bounding_box' => [[167.75, -21.71], [167.75, -21.32], [168.19, -21.32], [168.19, -21.71]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4642' => [
            'name' => 'ST84 Ile des Pins',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6642',
            'bounding_box' => [[167.36, -22.73], [167.36, -22.49], [167.61, -22.49], [167.61, -22.73]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4643' => [
            'name' => 'ST71 Belep',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6643',
            'bounding_box' => [[163.54, -19.85], [163.54, -19.5], [163.75, -19.5], [163.75, -19.85]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4644' => [
            'name' => 'NEA74 Noumea',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6644',
            'bounding_box' => [[166.35, -22.37], [166.35, -22.19], [166.54, -22.19], [166.54, -22.37]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4646' => [
            'name' => 'Grand Comoros',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6646',
            'bounding_box' => [[43.16, -11.99], [43.16, -11.31], [43.55, -11.31], [43.55, -11.99]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4657' => [
            'name' => 'Reykjavik 1900',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6657',
            'bounding_box' => [[-24.66, 63.34], [-24.66, 66.59], [-13.38, 66.59], [-13.38, 63.34]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4658' => [
            'name' => 'Hjorsey 1955',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6658',
            'bounding_box' => [[-24.66, 63.34], [-24.66, 66.59], [-13.38, 66.59], [-13.38, 63.34]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4659' => [
            'name' => 'ISN93',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6659',
            'bounding_box' => [[-30.87, 59.96], [-30.87, 69.59], [-5.55, 69.59], [-5.55, 59.96]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4660' => [
            'name' => 'Helle 1954',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6660',
            'bounding_box' => [[-9.17, 70.75], [-9.17, 71.23999999999999], [-7.87, 71.23999999999999], [-7.87, 70.75]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4661' => [
            'name' => 'LKS92',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6661',
            'bounding_box' => [[19.06, 55.67], [19.06, 58.09], [28.24, 58.09], [28.24, 55.67]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4662' => [
            'name' => 'IGN72 Grande Terre',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6634',
            'bounding_box' => [[163.92, -22.45], [163.92, -20.03], [167.09, -20.03], [167.09, -22.45]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4663' => [
            'name' => 'Porto Santo 1995',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6663',
            'bounding_box' => [[-17.31, 32.35], [-17.31, 33.15], [-16.23, 33.15], [-16.23, 32.35]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4664' => [
            'name' => 'Azores Oriental 1995',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6664',
            'bounding_box' => [[-25.92, 36.87], [-25.92, 37.96], [-24.62, 37.96], [-24.62, 36.87]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4665' => [
            'name' => 'Azores Central 1995',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6665',
            'bounding_box' => [[-28.9, 38.32], [-28.9, 39.14], [-26.97, 39.14], [-26.97, 38.32]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4666' => [
            'name' => 'Lisbon 1890',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6666',
            'bounding_box' => [[-9.56, 36.95], [-9.56, 42.16], [-6.19, 42.16], [-6.19, 36.95]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4667' => [
            'name' => 'IKBD-92',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6667',
            'bounding_box' => [[46.36, 29.06], [46.36, 30.32], [48.61, 30.32], [48.61, 29.06]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4668' => [
            'name' => 'ED79',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6668',
            'bounding_box' => [[-10.555896938101, 34.880534471998], [-10.555896938101, 84.722623821813], [38.0, 84.722623821813], [38.0, 34.880534471998]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4669' => [
            'name' => 'LKS94',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6126',
            'bounding_box' => [[19.02, 53.89], [19.02, 56.45], [26.82, 56.45], [26.82, 53.89]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4670' => [
            'name' => 'IGM95',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6670',
            'bounding_box' => [[5.93, 34.76], [5.93, 47.1], [18.99, 47.1], [18.99, 34.76]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4671' => [
            'name' => 'Voirol 1879',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6671',
            'bounding_box' => [[-2.95, 31.99], [-2.95, 37.14], [9.09, 37.14], [9.09, 31.99]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4672' => [
            'name' => 'Chatham Islands 1971',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6672',
            'bounding_box' => [[-177.25, -44.64], [-177.25, -43.3], [-175.54, -43.3], [-175.54, -44.64]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4673' => [
            'name' => 'Chatham Islands 1979',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6673',
            'bounding_box' => [[-177.25, -44.64], [-177.25, -43.3], [-175.54, -43.3], [-175.54, -44.64]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4674' => [
            'name' => 'SIRGAS 2000',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6674',
            'bounding_box' => [[-122.19, -59.87], [-122.19, 32.72], [-25.28, 32.72], [-25.28, -59.87]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4675' => [
            'name' => 'Guam 1963',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6675',
            'bounding_box' => [[144.58, 13.18], [144.58, 20.61], [146.12, 20.61], [146.12, 13.18]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4676' => [
            'name' => 'Vientiane 1982',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6676',
            'bounding_box' => [[100.09, 13.92], [100.09, 22.5], [107.64, 22.5], [107.64, 13.92]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4677' => [
            'name' => 'Lao 1993',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6677',
            'bounding_box' => [[100.09, 13.92], [100.09, 22.5], [107.64, 22.5], [107.64, 13.92]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4678' => [
            'name' => 'Lao 1997',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6678',
            'bounding_box' => [[100.09, 13.92], [100.09, 22.5], [107.64, 22.5], [107.64, 13.92]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4679' => [
            'name' => 'Jouik 1961',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6679',
            'bounding_box' => [[-17.08, 19.37], [-17.08, 21.34], [-15.88, 21.34], [-15.88, 19.37]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4680' => [
            'name' => 'Nouakchott 1965',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6680',
            'bounding_box' => [[-16.57, 16.81], [-16.57, 19.41], [-15.59, 19.41], [-15.59, 16.81]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4682' => [
            'name' => 'Gulshan 303',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6682',
            'bounding_box' => [[88.01000000000001, 18.56], [88.01000000000001, 26.64], [92.67, 26.64], [92.67, 18.56]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4683' => [
            'name' => 'PRS92',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6683',
            'bounding_box' => [[116.04, 3.0], [116.04, 22.18], [129.95, 22.18], [129.95, 3.0]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4684' => [
            'name' => 'Gan 1970',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6684',
            'bounding_box' => [[72.81, -0.6899999999999999], [72.81, 7.08], [73.69, 7.08], [73.69, -0.6899999999999999]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4686' => [
            'name' => 'MAGNA-SIRGAS',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6686',
            'bounding_box' => [[-84.77, -4.23], [-84.77, 15.51], [-66.87, 15.51], [-66.87, -4.23]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4687' => [
            'name' => 'RGPF',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6687',
            'bounding_box' => [[-158.13, -31.24], [-158.13, -4.52], [-131.97, -4.52], [-131.97, -31.24]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4688' => [
            'name' => 'Fatu Iva 72',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6688',
            'bounding_box' => [[-138.75, -10.6], [-138.75, -10.36], [-138.54, -10.36], [-138.54, -10.6]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4689' => [
            'name' => 'IGN63 Hiva Oa',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6689',
            'bounding_box' => [[-139.23, -10.08], [-139.23, -9.640000000000001], [-138.75, -9.640000000000001], [-138.75, -10.08]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4690' => [
            'name' => 'Tahiti 79',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6690',
            'bounding_box' => [[-149.7, -17.93], [-149.7, -17.44], [-149.09, -17.44], [-149.09, -17.93]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4691' => [
            'name' => 'Moorea 87',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6691',
            'bounding_box' => [[-150.0, -17.63], [-150.0, -17.41], [-149.73, -17.41], [-149.73, -17.63]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4692' => [
            'name' => 'Maupiti 83',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6692',
            'bounding_box' => [[-152.39, -16.57], [-152.39, -16.34], [-152.14, -16.34], [-152.14, -16.57]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4693' => [
            'name' => 'Nakhl-e Ghanem',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6693',
            'bounding_box' => [[51.8, 27.3], [51.8, 28.2], [53.01, 28.2], [53.01, 27.3]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4694' => [
            'name' => 'POSGAR 94',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6694',
            'bounding_box' => [[-73.59, -58.41], [-73.59, -21.78], [-52.63, -21.78], [-52.63, -58.41]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4695' => [
            'name' => 'Katanga 1955',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6695',
            'bounding_box' => [[21.74, -13.46], [21.74, -4.99], [30.78, -4.99], [30.78, -13.46]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4696' => [
            'name' => 'Kasai 1953',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6696',
            'bounding_box' => [[21.5, -7.31], [21.5, -5.01], [26.26, -5.01], [26.26, -7.31]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4697' => [
            'name' => 'IGC 1962 6th Parallel South',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6697',
            'bounding_box' => [[12.17, -7.36], [12.17, -3.29], [29.64, -3.29], [29.64, -7.36]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4698' => [
            'name' => 'IGN 1962 Kerguelen',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6698',
            'bounding_box' => [[68.69, -49.78], [68.69, -48.6], [70.62, -48.6], [70.62, -49.78]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4699' => [
            'name' => 'Le Pouce 1934',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6699',
            'bounding_box' => [[57.25, -20.57], [57.25, -19.94], [57.85, -19.94], [57.85, -20.57]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4700' => [
            'name' => 'IGN Astro 1960',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6700',
            'bounding_box' => [[-17.08, 14.72], [-17.08, 27.3], [-4.8, 27.3], [-4.8, 14.72]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4701' => [
            'name' => 'IGCB 1955',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6701',
            'bounding_box' => [[12.17, -6.04], [12.17, -4.28], [16.28, -4.28], [16.28, -6.04]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4702' => [
            'name' => 'Mauritania 1999',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6702',
            'bounding_box' => [[-20.04, 14.72], [-20.04, 27.3], [-4.8, 27.3], [-4.8, 14.72]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4703' => [
            'name' => 'Mhast 1951',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6703',
            'bounding_box' => [[10.53, -6.04], [10.53, -4.38], [13.1, -4.38], [13.1, -6.04]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4704' => [
            'name' => 'Mhast (onshore)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6704',
            'bounding_box' => [[10.53, -6.04], [10.53, -4.38], [13.1, -4.38], [13.1, -6.04]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4705' => [
            'name' => 'Mhast (offshore)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6705',
            'bounding_box' => [[10.53, -6.04], [10.53, -5.05], [12.37, -5.05], [12.37, -6.04]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4706' => [
            'name' => 'Egypt Gulf of Suez S-650 TL',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6706',
            'bounding_box' => [[32.34, 27.19], [32.34, 30.01], [34.27, 30.01], [34.27, 27.19]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4707' => [
            'name' => 'Tern Island 1961',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6707',
            'bounding_box' => [[-166.36, 23.69], [-166.36, 23.93], [-166.03, 23.93], [-166.03, 23.69]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4708' => [
            'name' => 'Cocos Islands 1965',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6708',
            'bounding_box' => [[96.76000000000001, -12.27], [96.76000000000001, -11.76], [96.98999999999999, -11.76], [96.98999999999999, -12.27]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4709' => [
            'name' => 'Iwo Jima 1945',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6709',
            'bounding_box' => [[141.2, 24.67], [141.2, 24.89], [141.42, 24.89], [141.42, 24.67]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4710' => [
            'name' => 'Astro DOS 71',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6710',
            'bounding_box' => [[-5.85, -16.08], [-5.85, -15.85], [-5.58, -15.85], [-5.58, -16.08]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4711' => [
            'name' => 'Marcus Island 1952',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6711',
            'bounding_box' => [[153.91, 24.22], [153.91, 24.35], [154.05, 24.35], [154.05, 24.22]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4712' => [
            'name' => 'Ascension Island 1958',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6712',
            'bounding_box' => [[-14.46, -8.029999999999999], [-14.46, -7.83], [-14.24, -7.83], [-14.24, -8.029999999999999]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4713' => [
            'name' => 'Ayabelle Lighthouse',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6713',
            'bounding_box' => [[41.75, 10.94], [41.75, 12.72], [44.15, 12.72], [44.15, 10.94]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4714' => [
            'name' => 'Bellevue',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6714',
            'bounding_box' => [[168.09, -20.31], [168.09, -17.37], [169.95, -17.37], [169.95, -20.31]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4715' => [
            'name' => 'Camp Area Astro',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6715',
            'bounding_box' => [[165.73, -77.94], [165.73, -77.17], [167.43, -77.17], [167.43, -77.94]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4716' => [
            'name' => 'Phoenix Islands 1966',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6716',
            'bounding_box' => [[-174.6, -4.76], [-174.6, -2.68], [-170.66, -2.68], [-170.66, -4.76]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4717' => [
            'name' => 'Cape Canaveral',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6717',
            'bounding_box' => [[-82.33, 20.86], [-82.33, 30.83], [-72.68000000000001, 30.83], [-72.68000000000001, 20.86]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4718' => [
            'name' => 'Solomon 1968',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6718',
            'bounding_box' => [[155.62, -10.9], [155.62, -6.55], [162.44, -6.55], [162.44, -10.9]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4719' => [
            'name' => 'Easter Island 1967',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6719',
            'bounding_box' => [[-109.51, -27.25], [-109.51, -27.01], [-109.16, -27.01], [-109.16, -27.25]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4720' => [
            'name' => 'Fiji 1986',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6720',
            'bounding_box' => [[176.81, -20.81], [176.81, -12.42], [-178.15, -12.42], [-178.15, -20.81]],
            'bounding_box_crosses_antimeridian' => true,
        ],
        'urn:ogc:def:crs:EPSG::4721' => [
            'name' => 'Fiji 1956',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6721',
            'bounding_box' => [[176.81, -19.22], [176.81, -16.1], [-179.77, -16.1], [-179.77, -19.22]],
            'bounding_box_crosses_antimeridian' => true,
        ],
        'urn:ogc:def:crs:EPSG::4722' => [
            'name' => 'South Georgia 1968',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6722',
            'bounding_box' => [[-38.08, -54.95], [-38.08, -53.93], [-35.74, -53.93], [-35.74, -54.95]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4723' => [
            'name' => 'GCGD59',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6723',
            'bounding_box' => [[-81.45999999999999, 19.21], [-81.45999999999999, 19.41], [-81.04000000000001, 19.41], [-81.04000000000001, 19.21]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4724' => [
            'name' => 'Diego Garcia 1969',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6724',
            'bounding_box' => [[72.3, -7.49], [72.3, -7.18], [72.55, -7.18], [72.55, -7.49]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4725' => [
            'name' => 'Johnston Island 1961',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6725',
            'bounding_box' => [[-169.59, 16.67], [-169.59, 16.79], [-169.47, 16.79], [-169.47, 16.67]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4726' => [
            'name' => 'SIGD61',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6726',
            'bounding_box' => [[-80.14, 19.63], [-80.14, 19.78], [-79.69, 19.78], [-79.69, 19.63]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4727' => [
            'name' => 'Midway 1961',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6727',
            'bounding_box' => [[-177.45, 28.13], [-177.45, 28.28], [-177.31, 28.28], [-177.31, 28.13]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4728' => [
            'name' => 'PN84',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6728',
            'bounding_box' => [[-18.22, 27.58], [-18.22, 29.47], [-13.37, 29.47], [-13.37, 27.58]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4729' => [
            'name' => 'Pitcairn 1967',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6729',
            'bounding_box' => [[-130.16, -25.14], [-130.16, -25.0], [-130.01, -25.0], [-130.01, -25.14]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4730' => [
            'name' => 'Santo 1965',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6730',
            'bounding_box' => [[166.47, -17.32], [166.47, -14.57], [168.71, -14.57], [168.71, -17.32]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4732' => [
            'name' => 'Marshall Islands 1960',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6732',
            'bounding_box' => [[162.27, 8.66], [162.27, 19.38], [167.82, 19.38], [167.82, 8.66]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4733' => [
            'name' => 'Wake Island 1952',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6733',
            'bounding_box' => [[166.55, 19.22], [166.55, 19.38], [166.72, 19.38], [166.72, 19.22]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4734' => [
            'name' => 'Tristan 1968',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6734',
            'bounding_box' => [[-12.76, -40.42], [-12.76, -37.0], [-9.800000000000001, -37.0], [-9.800000000000001, -40.42]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4735' => [
            'name' => 'Kusaie 1951',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6735',
            'bounding_box' => [[162.85, 5.21], [162.85, 5.43], [163.1, 5.43], [163.1, 5.21]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4736' => [
            'name' => 'Deception Island',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6736',
            'bounding_box' => [[-60.89, -63.08], [-60.89, -62.82], [-60.35, -62.82], [-60.35, -63.08]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4737' => [
            'name' => 'Korea 2000',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6737',
            'bounding_box' => [[122.71, 28.6], [122.71, 40.27], [134.28, 40.27], [134.28, 28.6]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4738' => [
            'name' => 'Hong Kong 1963',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6738',
            'bounding_box' => [[113.76, 22.13], [113.76, 22.58], [114.51, 22.58], [114.51, 22.13]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4739' => [
            'name' => 'Hong Kong 1963(67)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6739',
            'bounding_box' => [[113.76, 22.13], [113.76, 22.58], [114.51, 22.58], [114.51, 22.13]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4740' => [
            'name' => 'PZ-90',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6740',
            'bounding_box' => [[-180.0, -90.0], [-180.0, 90.0], [180.0, 90.0], [180.0, -90.0]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4741' => [
            'name' => 'FD54',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6741',
            'bounding_box' => [[-7.49, 61.33], [-7.49, 62.41], [-6.33, 62.41], [-6.33, 61.33]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4742' => [
            'name' => 'GDM2000',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6742',
            'bounding_box' => [[98.02, 0.85], [98.02, 7.81], [119.61, 7.81], [119.61, 0.85]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4743' => [
            'name' => 'Karbala 1979',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6743',
            'bounding_box' => [[38.79, 29.06], [38.79, 37.39], [48.61, 37.39], [48.61, 29.06]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4744' => [
            'name' => 'Nahrwan 1934',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6744',
            'bounding_box' => [[38.79, 29.06], [38.79, 37.39], [51.06, 37.39], [51.06, 29.06]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4745' => [
            'name' => 'RD/83',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6745',
            'bounding_box' => [[11.89, 50.2], [11.89, 51.66], [15.04, 51.66], [15.04, 50.2]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4746' => [
            'name' => 'PD/83',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6746',
            'bounding_box' => [[9.92, 50.2], [9.92, 51.64], [12.56, 51.64], [12.56, 50.2]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4747' => [
            'name' => 'GR96',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6747',
            'bounding_box' => [[-74.998683569945, 56.383177168], [-74.998683569945, 87.02394319699999], [7.9884162935953, 87.02394319699999], [7.9884162935953, 56.383177168]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4748' => [
            'name' => 'Vanua Levu 1915',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6748',
            'bounding_box' => [[178.42, -17.07], [178.42, -16.1], [-179.77, -16.1], [-179.77, -17.07]],
            'bounding_box_crosses_antimeridian' => true,
        ],
        'urn:ogc:def:crs:EPSG::4749' => [
            'name' => 'RGNC91-93',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6749',
            'bounding_box' => [[156.25, -26.45], [156.25, -14.83], [174.28, -14.83], [174.28, -26.45]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4750' => [
            'name' => 'ST87 Ouvea',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6750',
            'bounding_box' => [[166.44, -20.77], [166.44, -20.34], [166.71, -20.34], [166.71, -20.77]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4751' => [
            'name' => 'Kertau (RSO)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6751',
            'bounding_box' => [[99.59, 1.13], [99.59, 6.72], [104.6, 6.72], [104.6, 1.13]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4752' => [
            'name' => 'Viti Levu 1912',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6752',
            'bounding_box' => [[177.19, -18.32], [177.19, -17.25], [178.75, -17.25], [178.75, -18.32]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4753' => [
            'name' => 'fk89',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6753',
            'bounding_box' => [[-7.49, 61.33], [-7.49, 62.41], [-6.33, 62.41], [-6.33, 61.33]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4754' => [
            'name' => 'LGD2006',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6754',
            'bounding_box' => [[9.31, 19.5], [9.31, 35.23], [26.21, 35.23], [26.21, 19.5]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4755' => [
            'name' => 'DGN95',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6755',
            'bounding_box' => [[92.01000000000001, -13.95], [92.01000000000001, 7.79], [141.46, 7.79], [141.46, -13.95]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4756' => [
            'name' => 'VN-2000',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6756',
            'bounding_box' => [[102.14, 8.33], [102.14, 23.4], [109.53, 23.4], [109.53, 8.33]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4757' => [
            'name' => 'SVY21',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6757',
            'bounding_box' => [[103.59, 1.13], [103.59, 1.47], [104.07, 1.47], [104.07, 1.13]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4758' => [
            'name' => 'JAD2001',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6758',
            'bounding_box' => [[-80.59999999999999, 14.08], [-80.59999999999999, 19.36], [-74.51000000000001, 19.36], [-74.51000000000001, 14.08]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4759' => [
            'name' => 'NAD83(NSRS2007)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6759',
            'bounding_box' => [[167.65, 14.92], [167.65, 74.70999999999999], [-63.88, 74.70999999999999], [-63.88, 14.92]],
            'bounding_box_crosses_antimeridian' => true,
        ],
        'urn:ogc:def:crs:EPSG::4760' => [
            'name' => 'WGS 66',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6760',
            'bounding_box' => [[-180.0, -90.0], [-180.0, 90.0], [180.0, 90.0], [180.0, -90.0]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4761' => [
            'name' => 'HTRS96',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6761',
            'bounding_box' => [[13.0, 41.62], [13.0, 46.54], [19.43, 46.54], [19.43, 41.62]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4762' => [
            'name' => 'BDA2000',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6762',
            'bounding_box' => [[-68.83, 28.91], [-68.83, 35.73], [-60.7, 35.73], [-60.7, 28.91]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4763' => [
            'name' => 'Pitcairn 2006',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6763',
            'bounding_box' => [[-130.16, -25.14], [-130.16, -25.0], [-130.01, -25.0], [-130.01, -25.14]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4764' => [
            'name' => 'RSRGD2000',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6764',
            'bounding_box' => [[144.99, -90.0], [144.99, -59.99], [-144.99, -59.99], [-144.99, -90.0]],
            'bounding_box_crosses_antimeridian' => true,
        ],
        'urn:ogc:def:crs:EPSG::4765' => [
            'name' => 'Slovenia 1996',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6765',
            'bounding_box' => [[13.38, 45.42], [13.38, 46.88], [16.61, 46.88], [16.61, 45.42]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4801' => [
            'name' => 'Bern 1898 (Bern)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6801',
            'bounding_box' => [[5.96, 45.82], [5.96, 47.81], [10.49, 47.81], [10.49, 45.82]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4802' => [
            'name' => 'Bogota 1975 (Bogota)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6802',
            'bounding_box' => [[-79.09999999999999, -4.23], [-79.09999999999999, 12.52], [-66.87, 12.52], [-66.87, -4.23]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4803' => [
            'name' => 'Lisbon (Lisbon)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6803',
            'bounding_box' => [[-9.56, 36.95], [-9.56, 42.16], [-6.19, 42.16], [-6.19, 36.95]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4804' => [
            'name' => 'Makassar (Jakarta)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6804',
            'bounding_box' => [[118.71, -6.54], [118.71, -1.88], [120.78, -1.88], [120.78, -6.54]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4805' => [
            'name' => 'MGI (Ferro)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6805',
            'bounding_box' => [[9.529999999999999, 40.85], [9.529999999999999, 49.02], [23.04, 49.02], [23.04, 40.85]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4806' => [
            'name' => 'Monte Mario (Rome)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6806',
            'bounding_box' => [[5.93, 34.76], [5.93, 47.1], [18.99, 47.1], [18.99, 34.76]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4807' => [
            'name' => 'NTF (Paris)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6403',
            'datum' => 'urn:ogc:def:datum:EPSG::6807',
            'bounding_box' => [[-4.87, 41.31], [-4.87, 51.14], [9.630000000000001, 51.14], [9.630000000000001, 41.31]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4809' => [
            'name' => 'Belge 1950 (Brussels)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6809',
            'bounding_box' => [[2.5, 49.5], [2.5, 51.51], [6.4, 51.51], [6.4, 49.5]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4810' => [
            'name' => 'Tananarive (Paris)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6403',
            'datum' => 'urn:ogc:def:datum:EPSG::6810',
            'bounding_box' => [[43.18, -25.64], [43.18, -11.89], [50.56, -11.89], [50.56, -25.64]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4811' => [
            'name' => 'Voirol 1875 (Paris)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6403',
            'datum' => 'urn:ogc:def:datum:EPSG::6811',
            'bounding_box' => [[-2.95, 31.99], [-2.95, 37.14], [9.09, 37.14], [9.09, 31.99]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4813' => [
            'name' => 'Batavia (Jakarta)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6813',
            'bounding_box' => [[95.16, -8.91], [95.16, 5.97], [115.77, 5.97], [115.77, -8.91]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4814' => [
            'name' => 'RT38 (Stockholm)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6814',
            'bounding_box' => [[10.93, 55.28], [10.93, 69.06999999999999], [24.17, 69.06999999999999], [24.17, 55.28]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4815' => [
            'name' => 'Greek (Athens)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6815',
            'bounding_box' => [[19.57, 34.88], [19.57, 41.75], [28.3, 41.75], [28.3, 34.88]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4816' => [
            'name' => 'Carthage (Paris)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6403',
            'datum' => 'urn:ogc:def:datum:EPSG::6816',
            'bounding_box' => [[7.49, 30.23], [7.49, 37.4], [11.59, 37.4], [11.59, 30.23]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4817' => [
            'name' => 'NGO 1948 (Oslo)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6817',
            'bounding_box' => [[4.68, 57.93], [4.68, 71.20999999999999], [31.22, 71.20999999999999], [31.22, 57.93]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4818' => [
            'name' => 'S-JTSK (Ferro)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6818',
            'bounding_box' => [[12.09, 47.73], [12.09, 51.06], [22.56, 51.06], [22.56, 47.73]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4820' => [
            'name' => 'Segara (Jakarta)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6820',
            'bounding_box' => [[114.55, -4.24], [114.55, 4.29], [119.06, 4.29], [119.06, -4.24]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4821' => [
            'name' => 'Voirol 1879 (Paris)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6403',
            'datum' => 'urn:ogc:def:datum:EPSG::6821',
            'bounding_box' => [[-2.95, 31.99], [-2.95, 37.14], [9.09, 37.14], [9.09, 31.99]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4823' => [
            'name' => 'Sao Tome',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1044',
            'bounding_box' => [[6.41, -0.04], [6.41, 0.46], [6.82, 0.46], [6.82, -0.04]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4824' => [
            'name' => 'Principe',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1046',
            'bounding_box' => [[7.27, 1.48], [7.27, 1.76], [7.52, 1.76], [7.52, 1.48]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4901' => [
            'name' => 'ATF (Paris)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6403',
            'datum' => 'urn:ogc:def:datum:EPSG::6901',
            'bounding_box' => [[-4.87, 42.33], [-4.87, 51.14], [8.23, 51.14], [8.23, 42.33]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4903' => [
            'name' => 'Madrid 1870 (Madrid)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6903',
            'bounding_box' => [[-9.369999999999999, 35.95], [-9.369999999999999, 43.82], [3.39, 43.82], [3.39, 35.95]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::4904' => [
            'name' => 'Lisbon 1890 (Lisbon)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6904',
            'bounding_box' => [[-9.56, 36.95], [-9.56, 42.16], [-6.19, 42.16], [-6.19, 36.95]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5013' => [
            'name' => 'PTRA08',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1041',
            'bounding_box' => [[-35.58, 29.24], [-35.58, 43.07], [-12.48, 43.07], [-12.48, 29.24]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5132' => [
            'name' => 'Tokyo 1892',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1048',
            'bounding_box' => [[122.83, 20.37], [122.83, 45.54], [154.05, 45.54], [154.05, 20.37]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5228' => [
            'name' => 'S-JTSK/05',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1052',
            'bounding_box' => [[12.09, 48.58], [12.09, 51.06], [18.86, 51.06], [18.86, 48.58]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5229' => [
            'name' => 'S-JTSK/05 (Ferro)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1055',
            'bounding_box' => [[12.09, 48.58], [12.09, 51.06], [18.86, 51.06], [18.86, 48.58]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5233' => [
            'name' => 'SLD99',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1053',
            'bounding_box' => [[79.64, 5.86], [79.64, 9.880000000000001], [81.95, 9.880000000000001], [81.95, 5.86]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5246' => [
            'name' => 'GDBD2009',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1056',
            'bounding_box' => [[112.37, 4.01], [112.37, 6.31], [115.37, 6.31], [115.37, 4.01]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5252' => [
            'name' => 'TUREF',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1057',
            'bounding_box' => [[25.62, 34.42], [25.62, 43.45], [44.83, 43.45], [44.83, 34.42]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5264' => [
            'name' => 'DRUKREF 03',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1058',
            'bounding_box' => [[88.73999999999999, 26.7], [88.73999999999999, 28.33], [92.13, 28.33], [92.13, 26.7]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5324' => [
            'name' => 'ISN2004',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1060',
            'bounding_box' => [[-30.87, 59.96], [-30.87, 69.59], [-5.55, 69.59], [-5.55, 59.96]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5340' => [
            'name' => 'POSGAR 2007',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1062',
            'bounding_box' => [[-73.59, -58.41], [-73.59, -21.78], [-52.63, -21.78], [-52.63, -58.41]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5354' => [
            'name' => 'MARGEN',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1063',
            'bounding_box' => [[-69.66, -22.91], [-69.66, -9.67], [-57.52, -9.67], [-57.52, -22.91]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5360' => [
            'name' => 'SIRGAS-Chile 2002',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1064',
            'bounding_box' => [[-113.21, -59.87], [-113.21, -17.5], [-65.72, -17.5], [-65.72, -59.87]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5365' => [
            'name' => 'CR05',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1065',
            'bounding_box' => [[-90.45, 2.15], [-90.45, 11.77], [-81.43000000000001, 11.77], [-81.43000000000001, 2.15]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5371' => [
            'name' => 'MACARIO SOLIS',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1066',
            'bounding_box' => [[-84.31999999999999, 5.0], [-84.31999999999999, 12.51], [-77.04000000000001, 12.51], [-77.04000000000001, 5.0]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5373' => [
            'name' => 'Peru96',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1067',
            'bounding_box' => [[-84.68000000000001, -21.05], [-84.68000000000001, -0.03], [-68.67, -0.03], [-68.67, -21.05]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5381' => [
            'name' => 'SIRGAS-ROU98',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1068',
            'bounding_box' => [[-58.49, -37.77], [-58.49, -30.09], [-50.01, -30.09], [-50.01, -37.77]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5393' => [
            'name' => 'SIRGAS_ES2007.8',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1069',
            'bounding_box' => [[-91.43000000000001, 9.970000000000001], [-91.43000000000001, 14.44], [-87.65000000000001, 14.44], [-87.65000000000001, 9.970000000000001]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5451' => [
            'name' => 'Ocotepeque 1935',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1070',
            'bounding_box' => [[-92.29000000000001, 7.98], [-92.29000000000001, 17.83], [-82.53, 17.83], [-82.53, 7.98]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5464' => [
            'name' => 'Sibun Gorge 1922',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1071',
            'bounding_box' => [[-89.22, 15.88], [-89.22, 18.49], [-87.72, 18.49], [-87.72, 15.88]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5467' => [
            'name' => 'Panama-Colon 1911',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1072',
            'bounding_box' => [[-83.04000000000001, 7.15], [-83.04000000000001, 9.68], [-77.19, 9.68], [-77.19, 7.15]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5489' => [
            'name' => 'RGAF09',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1073',
            'bounding_box' => [[-63.66, 14.08], [-63.66, 18.54], [-57.52, 18.54], [-57.52, 14.08]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5524' => [
            'name' => 'Corrego Alegre 1961',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1074',
            'bounding_box' => [[-58.16, -27.5], [-58.16, -14.99], [-38.82, -14.99], [-38.82, -27.5]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5527' => [
            'name' => 'SAD69(96)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1075',
            'bounding_box' => [[-74.01000000000001, -35.71], [-74.01000000000001, 7.04], [-25.28, 7.04], [-25.28, -35.71]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5546' => [
            'name' => 'PNG94',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1076',
            'bounding_box' => [[139.2, -14.75], [139.2, 2.58], [162.81, 2.58], [162.81, -14.75]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5561' => [
            'name' => 'UCS-2000',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1077',
            'bounding_box' => [[22.15, 43.18], [22.15, 52.38], [40.18, 52.38], [40.18, 43.18]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5593' => [
            'name' => 'FEH2010',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1078',
            'bounding_box' => [[10.66, 54.33], [10.66, 54.83], [12.01, 54.83], [12.01, 54.33]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5681' => [
            'name' => 'DB_REF',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1081',
            'bounding_box' => [[5.86, 47.27], [5.86, 55.09], [15.04, 55.09], [15.04, 47.27]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::5886' => [
            'name' => 'TGD2005',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1095',
            'bounding_box' => [[-179.08, -25.68], [-179.08, -14.14], [-171.28, -14.14], [-171.28, -25.68]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::6135' => [
            'name' => 'CIGD11',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1100',
            'bounding_box' => [[-83.59999999999999, 17.58], [-83.59999999999999, 20.68], [-78.72, 20.68], [-78.72, 17.58]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::6207' => [
            'name' => 'Nepal 1981',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1111',
            'bounding_box' => [[80.06, 26.34], [80.06, 30.43], [88.20999999999999, 30.43], [88.20999999999999, 26.34]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::6311' => [
            'name' => 'CGRS93',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1112',
            'bounding_box' => [[32.2, 34.59], [32.2, 35.74], [34.65, 35.74], [34.65, 34.59]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::6318' => [
            'name' => 'NAD83(2011)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1116',
            'bounding_box' => [[167.65, 14.92], [167.65, 74.70999999999999], [-63.88, 74.70999999999999], [-63.88, 14.92]],
            'bounding_box_crosses_antimeridian' => true,
        ],
        'urn:ogc:def:crs:EPSG::6322' => [
            'name' => 'NAD83(PA11)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1117',
            'bounding_box' => [[157.47, -17.56], [157.47, 31.8], [-151.27, 31.8], [-151.27, -17.56]],
            'bounding_box_crosses_antimeridian' => true,
        ],
        'urn:ogc:def:crs:EPSG::6325' => [
            'name' => 'NAD83(MA11)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1118',
            'bounding_box' => [[129.48, 1.64], [129.48, 23.9], [149.55, 23.9], [149.55, 1.64]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::6365' => [
            'name' => 'Mexico ITRF2008',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1120',
            'bounding_box' => [[-122.19, 12.1], [-122.19, 32.72], [-84.64, 32.72], [-84.64, 12.1]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::6668' => [
            'name' => 'JGD2011',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1128',
            'bounding_box' => [[122.38, 17.09], [122.38, 46.05], [157.65, 46.05], [157.65, 17.09]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::6706' => [
            'name' => 'RDN2008',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1132',
            'bounding_box' => [[5.93, 34.76], [5.93, 47.1], [18.99, 47.1], [18.99, 34.76]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::6783' => [
            'name' => 'NAD83(CORS96)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1133',
            'bounding_box' => [[167.65, 14.92], [167.65, 74.70999999999999], [-63.88, 74.70999999999999], [-63.88, 14.92]],
            'bounding_box_crosses_antimeridian' => true,
        ],
        'urn:ogc:def:crs:EPSG::6881' => [
            'name' => 'Aden 1925',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1135',
            'bounding_box' => [[43.37, 12.54], [43.37, 19.0], [53.14, 19.0], [53.14, 12.54]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::6882' => [
            'name' => 'Bekaa Valley 1920',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1137',
            'bounding_box' => [[35.04, 33.06], [35.04, 34.65], [36.63, 34.65], [36.63, 33.06]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::6883' => [
            'name' => 'Bioko',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1136',
            'bounding_box' => [[8.369999999999999, 3.14], [8.369999999999999, 3.82], [9.02, 3.82], [9.02, 3.14]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::6892' => [
            'name' => 'South East Island 1943',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1138',
            'bounding_box' => [[55.15, -4.86], [55.15, -3.66], [56.01, -3.66], [56.01, -4.86]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::6894' => [
            'name' => 'Gambia',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1139',
            'bounding_box' => [[-16.88, 13.05], [-16.88, 13.83], [-13.79, 13.83], [-13.79, 13.05]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::6983' => [
            'name' => 'IG05 Intermediate CRS',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1142',
            'bounding_box' => [[34.17, 29.45], [34.17, 33.28], [35.69, 33.28], [35.69, 29.45]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::6990' => [
            'name' => 'IG05/12 Intermediate CRS',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1144',
            'bounding_box' => [[34.17, 29.45], [34.17, 33.28], [35.69, 33.28], [35.69, 29.45]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::7035' => [
            'name' => 'RGSPM06 (lon-lat)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6424',
            'datum' => 'urn:ogc:def:datum:EPSG::1038',
            'bounding_box' => [[-57.1, 43.41], [-57.1, 47.37], [-55.9, 47.37], [-55.9, 43.41]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::7037' => [
            'name' => 'RGR92 (lon-lat)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6424',
            'datum' => 'urn:ogc:def:datum:EPSG::6627',
            'bounding_box' => [[51.83, -24.72], [51.83, -18.28], [58.24, -18.28], [58.24, -24.72]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::7039' => [
            'name' => 'RGM04 (lon-lat)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6424',
            'datum' => 'urn:ogc:def:datum:EPSG::1036',
            'bounding_box' => [[43.68, -14.49], [43.68, -11.33], [46.7, -11.33], [46.7, -14.49]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::7041' => [
            'name' => 'RGFG95 (lon-lat)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6424',
            'datum' => 'urn:ogc:def:datum:EPSG::6624',
            'bounding_box' => [[-54.61, 2.11], [-54.61, 8.880000000000001], [-49.45, 8.880000000000001], [-49.45, 2.11]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::7073' => [
            'name' => 'RGTAAF07',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1113',
            'bounding_box' => [[37.98, -67.13], [37.98, -20.91], [142.0, -20.91], [142.0, -67.13]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::7084' => [
            'name' => 'RGF93 (lon-lat)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6424',
            'datum' => 'urn:ogc:def:datum:EPSG::6171',
            'bounding_box' => [[-9.859999999999999, 41.15], [-9.859999999999999, 51.56], [10.38, 51.56], [10.38, 41.15]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::7086' => [
            'name' => 'RGAF09 (lon-lat)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6424',
            'datum' => 'urn:ogc:def:datum:EPSG::1073',
            'bounding_box' => [[-63.66, 14.08], [-63.66, 18.54], [-57.52, 18.54], [-57.52, 14.08]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::7133' => [
            'name' => 'RGTAAF07 (lon-lat)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6424',
            'datum' => 'urn:ogc:def:datum:EPSG::1113',
            'bounding_box' => [[37.98, -67.13], [37.98, -20.91], [142.0, -20.91], [142.0, -67.13]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::7136' => [
            'name' => 'IGD05',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1114',
            'bounding_box' => [[32.99, 29.45], [32.99, 33.53], [35.69, 33.53], [35.69, 29.45]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::7139' => [
            'name' => 'IGD05/12',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1115',
            'bounding_box' => [[32.99, 29.45], [32.99, 33.53], [35.69, 33.53], [35.69, 29.45]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::7373' => [
            'name' => 'ONGD14',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1147',
            'bounding_box' => [[51.99, 14.33], [51.99, 26.74], [63.38, 26.74], [63.38, 14.33]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::7683' => [
            'name' => 'GSK-2011',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1159',
            'bounding_box' => [[18.925748825074, 39.878541946411], [18.925748825074, 85.190134048462], [-168.97182656183, 85.190134048462], [-168.97182656183, 39.878541946411]],
            'bounding_box_crosses_antimeridian' => true,
        ],
        'urn:ogc:def:crs:EPSG::7686' => [
            'name' => 'Kyrg-06',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1160',
            'bounding_box' => [[69.23999999999999, 39.19], [69.23999999999999, 43.22], [80.29000000000001, 43.22], [80.29000000000001, 39.19]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::7798' => [
            'name' => 'BGS2005',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1167',
            'bounding_box' => [[22.36, 41.24], [22.36, 44.23], [31.35, 44.23], [31.35, 41.24]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::7844' => [
            'name' => 'GDA2020',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1168',
            'bounding_box' => [[93.41, -60.56], [93.41, -8.470000000000001], [173.35, -8.470000000000001], [173.35, -60.56]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::7881' => [
            'name' => 'St. Helena Tritan',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1173',
            'bounding_box' => [[-5.85, -16.08], [-5.85, -15.85], [-5.58, -15.85], [-5.58, -16.08]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::7886' => [
            'name' => 'SHGD2015',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1174',
            'bounding_box' => [[-5.85, -16.08], [-5.85, -15.85], [-5.58, -15.85], [-5.58, -16.08]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8042' => [
            'name' => 'Gusterberg (Ferro)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1188',
            'bounding_box' => [[12.07, 46.93], [12.07, 51.06], [16.83, 51.06], [16.83, 46.93]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8043' => [
            'name' => 'St. Stephen (Ferro)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1189',
            'bounding_box' => [[14.41, 47.42], [14.41, 50.45], [18.86, 50.45], [18.86, 47.42]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8086' => [
            'name' => 'ISN2016',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1187',
            'bounding_box' => [[-30.87, 59.96], [-30.87, 69.59], [-5.55, 69.59], [-5.55, 59.96]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8232' => [
            'name' => 'NAD83(CSRS96)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1192',
            'bounding_box' => [[-141.01, 40.04], [-141.01, 86.45999999999999], [-47.74, 86.45999999999999], [-47.74, 40.04]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8237' => [
            'name' => 'NAD83(CSRS)v2',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1193',
            'bounding_box' => [[-141.01, 40.04], [-141.01, 86.45999999999999], [-47.74, 86.45999999999999], [-47.74, 40.04]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8240' => [
            'name' => 'NAD83(CSRS)v3',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1194',
            'bounding_box' => [[-141.01, 40.04], [-141.01, 86.45999999999999], [-47.74, 86.45999999999999], [-47.74, 40.04]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8246' => [
            'name' => 'NAD83(CSRS)v4',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1195',
            'bounding_box' => [[-141.01, 40.04], [-141.01, 86.45999999999999], [-47.74, 86.45999999999999], [-47.74, 40.04]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8249' => [
            'name' => 'NAD83(CSRS)v5',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1196',
            'bounding_box' => [[-141.01, 40.04], [-141.01, 86.45999999999999], [-47.74, 86.45999999999999], [-47.74, 40.04]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8252' => [
            'name' => 'NAD83(CSRS)v6',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1197',
            'bounding_box' => [[-141.01, 40.04], [-141.01, 86.45999999999999], [-47.74, 86.45999999999999], [-47.74, 40.04]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8255' => [
            'name' => 'NAD83(CSRS)v7',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1198',
            'bounding_box' => [[-141.01, 40.04], [-141.01, 86.45999999999999], [-47.74, 86.45999999999999], [-47.74, 40.04]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8351' => [
            'name' => 'S-JTSK [JTSK03]',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1201',
            'bounding_box' => [[16.84, 47.73], [16.84, 49.61], [22.56, 49.61], [22.56, 47.73]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8427' => [
            'name' => 'Hong Kong Geodetic CS',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1209',
            'bounding_box' => [[113.76, 22.13], [113.76, 22.58], [114.51, 22.58], [114.51, 22.13]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8428' => [
            'name' => 'Macao 1920',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1207',
            'bounding_box' => [[113.52, 22.06], [113.52, 22.23], [113.68, 22.23], [113.68, 22.06]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8431' => [
            'name' => 'Macao 2008',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1208',
            'bounding_box' => [[113.52, 22.06], [113.52, 22.23], [113.68, 22.23], [113.68, 22.06]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8545' => [
            'name' => 'NAD83(HARN Corrected)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1212',
            'bounding_box' => [[-67.97, 17.62], [-67.97, 18.57], [-64.51000000000001, 18.57], [-64.51000000000001, 17.62]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8685' => [
            'name' => 'SRB_ETRS89',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1214',
            'bounding_box' => [[18.81702041626, 42.232494354248], [18.81702041626, 46.18111038208], [23.004997253418, 46.18111038208], [23.004997253418, 42.232494354248]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8694' => [
            'name' => 'Camacupa 2015',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1217',
            'bounding_box' => [[8.199999999999999, -18.02], [8.199999999999999, -4.38], [24.09, -4.38], [24.09, -18.02]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8699' => [
            'name' => 'RSAO13',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1220',
            'bounding_box' => [[8.199999999999999, -18.02], [8.199999999999999, -4.38], [24.09, -4.38], [24.09, -18.02]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8818' => [
            'name' => 'MTRF-2000',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1218',
            'bounding_box' => [[34.44, 16.29], [34.44, 32.16], [55.67, 32.16], [55.67, 16.29]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8860' => [
            'name' => 'NAD83(FBN)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1211',
            'bounding_box' => [[144.58, -14.59], [144.58, 49.38], [-64.51000000000001, 49.38], [-64.51000000000001, -14.59]],
            'bounding_box_crosses_antimeridian' => true,
        ],
        'urn:ogc:def:crs:EPSG::8888' => [
            'name' => 'WGS 84 (Transit)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1166',
            'bounding_box' => [[-180.0, -90.0], [-180.0, 90.0], [180.0, 90.0], [180.0, -90.0]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8900' => [
            'name' => 'RGWF96',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1223',
            'bounding_box' => [[179.49, -15.94], [179.49, -9.84], [-174.27, -9.84], [-174.27, -15.94]],
            'bounding_box_crosses_antimeridian' => true,
        ],
        'urn:ogc:def:crs:EPSG::8902' => [
            'name' => 'RGWF96 (lon-lat)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6424',
            'datum' => 'urn:ogc:def:datum:EPSG::1223',
            'bounding_box' => [[179.49, -15.94], [179.49, -9.84], [-174.27, -9.84], [-174.27, -15.94]],
            'bounding_box_crosses_antimeridian' => true,
        ],
        'urn:ogc:def:crs:EPSG::8907' => [
            'name' => 'CR-SIRGAS',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1225',
            'bounding_box' => [[-90.45, 2.15], [-90.45, 11.77], [-81.43000000000001, 11.77], [-81.43000000000001, 2.15]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8949' => [
            'name' => 'SIRGAS-Chile 2010',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1243',
            'bounding_box' => [[-113.21, -59.87], [-113.21, -17.5], [-65.72, -17.5], [-65.72, -59.87]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8972' => [
            'name' => 'SIRGAS-CON DGF00P01',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1227',
            'bounding_box' => [[-122.19, -59.87], [-122.19, 32.72], [-25.28, 32.72], [-25.28, -59.87]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8973' => [
            'name' => 'SIRGAS-CON DGF01P01',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1228',
            'bounding_box' => [[-122.19, -59.87], [-122.19, 32.72], [-25.28, 32.72], [-25.28, -59.87]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8974' => [
            'name' => 'SIRGAS-CON DGF01P02',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1229',
            'bounding_box' => [[-122.19, -59.87], [-122.19, 32.72], [-25.28, 32.72], [-25.28, -59.87]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8975' => [
            'name' => 'SIRGAS-CON DGF02P01',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1230',
            'bounding_box' => [[-122.19, -59.87], [-122.19, 32.72], [-25.28, 32.72], [-25.28, -59.87]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8976' => [
            'name' => 'SIRGAS-CON DGF04P01',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1231',
            'bounding_box' => [[-122.19, -59.87], [-122.19, 32.72], [-25.28, 32.72], [-25.28, -59.87]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8977' => [
            'name' => 'SIRGAS-CON DGF05P01',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1232',
            'bounding_box' => [[-122.19, -59.87], [-122.19, 32.72], [-25.28, 32.72], [-25.28, -59.87]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8978' => [
            'name' => 'SIRGAS-CON DGF06P01',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1233',
            'bounding_box' => [[-122.19, -59.87], [-122.19, 32.72], [-25.28, 32.72], [-25.28, -59.87]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8979' => [
            'name' => 'SIRGAS-CON DGF07P01',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1234',
            'bounding_box' => [[-122.19, -59.87], [-122.19, 32.72], [-25.28, 32.72], [-25.28, -59.87]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8980' => [
            'name' => 'SIRGAS-CON DGF08P01',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1235',
            'bounding_box' => [[-122.19, -59.87], [-122.19, 32.72], [-25.28, 32.72], [-25.28, -59.87]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8981' => [
            'name' => 'SIRGAS-CON SIR09P01',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1236',
            'bounding_box' => [[-122.19, -59.87], [-122.19, 32.72], [-25.28, 32.72], [-25.28, -59.87]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8982' => [
            'name' => 'SIRGAS-CON SIR10P01',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1237',
            'bounding_box' => [[-122.19, -59.87], [-122.19, 32.72], [-25.28, 32.72], [-25.28, -59.87]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8983' => [
            'name' => 'SIRGAS-CON SIR11P01',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1238',
            'bounding_box' => [[-122.19, -59.87], [-122.19, 32.72], [-25.28, 32.72], [-25.28, -59.87]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8984' => [
            'name' => 'SIRGAS-CON SIR13P01',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1239',
            'bounding_box' => [[-122.19, -59.87], [-122.19, 32.72], [-25.28, 32.72], [-25.28, -59.87]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8985' => [
            'name' => 'SIRGAS-CON SIR14P01',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1240',
            'bounding_box' => [[-122.19, -59.87], [-122.19, 32.72], [-25.28, 32.72], [-25.28, -59.87]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8986' => [
            'name' => 'SIRGAS-CON SIR15P01',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1241',
            'bounding_box' => [[-122.19, -59.87], [-122.19, 32.72], [-25.28, 32.72], [-25.28, -59.87]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8987' => [
            'name' => 'SIRGAS-CON SIR17P01',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1242',
            'bounding_box' => [[-122.19, -59.87], [-122.19, 32.72], [-25.28, 32.72], [-25.28, -59.87]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8988' => [
            'name' => 'ITRF88',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6647',
            'bounding_box' => [[-180.0, -90.0], [-180.0, 90.0], [180.0, 90.0], [180.0, -90.0]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8989' => [
            'name' => 'ITRF89',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6648',
            'bounding_box' => [[-180.0, -90.0], [-180.0, 90.0], [180.0, 90.0], [180.0, -90.0]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8990' => [
            'name' => 'ITRF90',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6649',
            'bounding_box' => [[-180.0, -90.0], [-180.0, 90.0], [180.0, 90.0], [180.0, -90.0]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8991' => [
            'name' => 'ITRF91',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6650',
            'bounding_box' => [[-180.0, -90.0], [-180.0, 90.0], [180.0, 90.0], [180.0, -90.0]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8992' => [
            'name' => 'ITRF92',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6651',
            'bounding_box' => [[-180.0, -90.0], [-180.0, 90.0], [180.0, 90.0], [180.0, -90.0]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8993' => [
            'name' => 'ITRF93',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6652',
            'bounding_box' => [[-180.0, -90.0], [-180.0, 90.0], [180.0, 90.0], [180.0, -90.0]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8994' => [
            'name' => 'ITRF94',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6653',
            'bounding_box' => [[-180.0, -90.0], [-180.0, 90.0], [180.0, 90.0], [180.0, -90.0]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8995' => [
            'name' => 'ITRF96',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6654',
            'bounding_box' => [[-180.0, -90.0], [-180.0, 90.0], [180.0, 90.0], [180.0, -90.0]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8996' => [
            'name' => 'ITRF97',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6655',
            'bounding_box' => [[-180.0, -90.0], [-180.0, 90.0], [180.0, 90.0], [180.0, -90.0]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8997' => [
            'name' => 'ITRF2000',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6656',
            'bounding_box' => [[-180.0, -90.0], [-180.0, 90.0], [180.0, 90.0], [180.0, -90.0]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8998' => [
            'name' => 'ITRF2005',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::6896',
            'bounding_box' => [[-180.0, -90.0], [-180.0, 90.0], [180.0, 90.0], [180.0, -90.0]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::8999' => [
            'name' => 'ITRF2008',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1061',
            'bounding_box' => [[-180.0, -90.0], [-180.0, 90.0], [180.0, 90.0], [180.0, -90.0]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9000' => [
            'name' => 'ITRF2014',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1165',
            'bounding_box' => [[-180.0, -90.0], [-180.0, 90.0], [180.0, 90.0], [180.0, -90.0]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9003' => [
            'name' => 'IGS97',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1244',
            'bounding_box' => [[-180.0, -90.0], [-180.0, 90.0], [180.0, 90.0], [180.0, -90.0]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9006' => [
            'name' => 'IGS00',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1245',
            'bounding_box' => [[-180.0, -90.0], [-180.0, 90.0], [180.0, 90.0], [180.0, -90.0]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9009' => [
            'name' => 'IGb00',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1246',
            'bounding_box' => [[-180.0, -90.0], [-180.0, 90.0], [180.0, 90.0], [180.0, -90.0]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9012' => [
            'name' => 'IGS05',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1247',
            'bounding_box' => [[-180.0, -90.0], [-180.0, 90.0], [180.0, 90.0], [180.0, -90.0]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9014' => [
            'name' => 'IGS08',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1141',
            'bounding_box' => [[-180.0, -90.0], [-180.0, 90.0], [180.0, 90.0], [180.0, -90.0]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9017' => [
            'name' => 'IGb08',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1248',
            'bounding_box' => [[-180.0, -90.0], [-180.0, 90.0], [180.0, 90.0], [180.0, -90.0]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9019' => [
            'name' => 'IGS14',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1191',
            'bounding_box' => [[-180.0, -90.0], [-180.0, 90.0], [180.0, 90.0], [180.0, -90.0]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9053' => [
            'name' => 'WGS 84 (G730)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1152',
            'bounding_box' => [[-180.0, -90.0], [-180.0, 90.0], [180.0, 90.0], [180.0, -90.0]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9054' => [
            'name' => 'WGS 84 (G873)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1153',
            'bounding_box' => [[-180.0, -90.0], [-180.0, 90.0], [180.0, 90.0], [180.0, -90.0]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9055' => [
            'name' => 'WGS 84 (G1150)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1154',
            'bounding_box' => [[-180.0, -90.0], [-180.0, 90.0], [180.0, 90.0], [180.0, -90.0]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9056' => [
            'name' => 'WGS 84 (G1674)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1155',
            'bounding_box' => [[-180.0, -90.0], [-180.0, 90.0], [180.0, 90.0], [180.0, -90.0]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9057' => [
            'name' => 'WGS 84 (G1762)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1156',
            'bounding_box' => [[-180.0, -90.0], [-180.0, 90.0], [180.0, 90.0], [180.0, -90.0]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9059' => [
            'name' => 'ETRF89',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1178',
            'bounding_box' => [[-16.096100515106, 32.884955146013], [-16.096100515106, 84.722623821813], [40.178745269776, 84.722623821813], [40.178745269776, 32.884955146013]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9060' => [
            'name' => 'ETRF90',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1179',
            'bounding_box' => [[-16.096100515106, 32.884955146013], [-16.096100515106, 84.722623821813], [40.178745269776, 84.722623821813], [40.178745269776, 32.884955146013]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9061' => [
            'name' => 'ETRF91',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1180',
            'bounding_box' => [[-16.096100515106, 32.884955146013], [-16.096100515106, 84.722623821813], [40.178745269776, 84.722623821813], [40.178745269776, 32.884955146013]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9062' => [
            'name' => 'ETRF92',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1181',
            'bounding_box' => [[-16.096100515106, 32.884955146013], [-16.096100515106, 84.722623821813], [40.178745269776, 84.722623821813], [40.178745269776, 32.884955146013]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9063' => [
            'name' => 'ETRF93',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1182',
            'bounding_box' => [[-16.096100515106, 32.884955146013], [-16.096100515106, 84.722623821813], [40.178745269776, 84.722623821813], [40.178745269776, 32.884955146013]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9064' => [
            'name' => 'ETRF94',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1183',
            'bounding_box' => [[-16.096100515106, 32.884955146013], [-16.096100515106, 84.722623821813], [40.178745269776, 84.722623821813], [40.178745269776, 32.884955146013]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9065' => [
            'name' => 'ETRF96',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1184',
            'bounding_box' => [[-16.096100515106, 32.884955146013], [-16.096100515106, 84.722623821813], [40.178745269776, 84.722623821813], [40.178745269776, 32.884955146013]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9066' => [
            'name' => 'ETRF97',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1185',
            'bounding_box' => [[-16.096100515106, 32.884955146013], [-16.096100515106, 84.722623821813], [40.178745269776, 84.722623821813], [40.178745269776, 32.884955146013]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9067' => [
            'name' => 'ETRF2000',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1186',
            'bounding_box' => [[-16.096100515106, 32.884955146013], [-16.096100515106, 84.722623821813], [40.178745269776, 84.722623821813], [40.178745269776, 32.884955146013]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9068' => [
            'name' => 'ETRF2005',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1204',
            'bounding_box' => [[-16.096100515106, 32.884955146013], [-16.096100515106, 84.722623821813], [40.178745269776, 84.722623821813], [40.178745269776, 32.884955146013]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9069' => [
            'name' => 'ETRF2014',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1206',
            'bounding_box' => [[-16.096100515106, 32.884955146013], [-16.096100515106, 84.722623821813], [40.178745269776, 84.722623821813], [40.178745269776, 32.884955146013]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9072' => [
            'name' => 'NAD83(MARP00)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1221',
            'bounding_box' => [[129.48, 1.64], [129.48, 23.9], [149.55, 23.9], [149.55, 1.64]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9075' => [
            'name' => 'NAD83(PACP00)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1249',
            'bounding_box' => [[157.47, -17.56], [157.47, 31.8], [-151.27, 31.8], [-151.27, -17.56]],
            'bounding_box_crosses_antimeridian' => true,
        ],
        'urn:ogc:def:crs:EPSG::9140' => [
            'name' => 'KOSOVAREF01',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1251',
            'bounding_box' => [[19.97, 41.85], [19.97, 43.25], [21.8, 43.25], [21.8, 41.85]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9148' => [
            'name' => 'SIRGAS-Chile 2013',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1252',
            'bounding_box' => [[-113.21, -59.87], [-113.21, -17.5], [-65.72, -17.5], [-65.72, -59.87]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9153' => [
            'name' => 'SIRGAS-Chile 2016',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1253',
            'bounding_box' => [[-113.21, -59.87], [-113.21, -17.5], [-65.72, -17.5], [-65.72, -59.87]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9248' => [
            'name' => 'Tapi Aike',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1257',
            'bounding_box' => [[-73.28, -52.43], [-73.28, -50.33], [-68.3, -50.33], [-68.3, -52.43]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9251' => [
            'name' => 'MMN',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1258',
            'bounding_box' => [[-68.64, -55.11], [-68.64, -52.59], [-63.73, -52.59], [-63.73, -55.11]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9253' => [
            'name' => 'MMS',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1259',
            'bounding_box' => [[-68.64, -55.11], [-68.64, -52.59], [-63.73, -52.59], [-63.73, -55.11]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9294' => [
            'name' => 'ONGD17',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1263',
            'bounding_box' => [[51.99, 14.33], [51.99, 26.74], [63.38, 26.74], [63.38, 14.33]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9299' => [
            'name' => 'HS2-IRF',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1264',
            'bounding_box' => [[-2.75, 51.45], [-2.75, 53.3], [0.0, 53.3], [0.0, 51.45]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9309' => [
            'name' => 'ATRF2014',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1291',
            'bounding_box' => [[93.41, -60.56], [93.41, -8.470000000000001], [173.35, -8.470000000000001], [173.35, -60.56]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9333' => [
            'name' => 'KSA-GRF17',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1268',
            'bounding_box' => [[34.44, 16.29], [34.44, 32.16], [55.67, 32.16], [55.67, 16.29]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9364' => [
            'name' => 'TPEN11-IRF',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1266',
            'bounding_box' => [[-3.14, 53.32], [-3.14, 53.9], [-1.34, 53.9], [-1.34, 53.32]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9372' => [
            'name' => 'MML07-IRF',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1271',
            'bounding_box' => [[-1.89, 51.46], [-1.89, 53.42], [0.16, 53.42], [0.16, 51.46]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9380' => [
            'name' => 'IGb14',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1272',
            'bounding_box' => [[-180.0, -90.0], [-180.0, 90.0], [180.0, 90.0], [180.0, -90.0]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9384' => [
            'name' => 'AbInvA96_2020-IRF',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1273',
            'bounding_box' => [[-4.31, 57.1], [-4.31, 57.71], [-2.1, 57.71], [-2.1, 57.1]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9403' => [
            'name' => 'PN68',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1286',
            'bounding_box' => [[-18.22, 27.58], [-18.22, 29.47], [-13.37, 29.47], [-13.37, 27.58]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9453' => [
            'name' => 'GBK19-IRF',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1289',
            'bounding_box' => [[-4.65, 55.55], [-4.65, 55.95], [-4.05, 55.95], [-4.05, 55.55]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9470' => [
            'name' => 'SRGI2013',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1293',
            'bounding_box' => [[92.01000000000001, -13.95], [92.01000000000001, 7.79], [141.46, 7.79], [141.46, -13.95]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9474' => [
            'name' => 'PZ-90.02',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1157',
            'bounding_box' => [[-180.0, -90.0], [-180.0, 90.0], [180.0, 90.0], [180.0, -90.0]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9475' => [
            'name' => 'PZ-90.11',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1158',
            'bounding_box' => [[-180.0, -90.0], [-180.0, 90.0], [180.0, 90.0], [180.0, -90.0]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9547' => [
            'name' => 'LTF2004(G)',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1295',
            'bounding_box' => [[4.6505192204449, 44.87236950014], [4.6505192204449, 45.88320957683], [7.8772423467624, 45.88320957683], [7.8772423467624, 44.87236950014]],
            'bounding_box_crosses_antimeridian' => false,
        ],
        'urn:ogc:def:crs:EPSG::9696' => [
            'name' => 'REDGEOMIN',
            'coordinate_system' => 'urn:ogc:def:cs:EPSG::6422',
            'datum' => 'urn:ogc:def:datum:EPSG::1304',
            'bounding_box' => [[-113.21, -59.87], [-113.21, -17.5], [-65.72, -17.5], [-65.72, -59.87]],
            'bounding_box_crosses_antimeridian' => false,
        ],
    ];

    private static $cachedObjects = [];

    private static $supportedCache = [];

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

        assert(count($coordinateSystem->getAxes()) === 2);
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
                Ellipsoidal::fromSRID($data['coordinate_system']),
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
