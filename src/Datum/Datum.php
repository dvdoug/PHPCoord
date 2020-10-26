<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Datum;

use PHPCoord\EPSG\Repository;
use PHPCoord\Exception\UnknownDatumException;

class Datum
{
    /**
     * AIOC 1995
     * Type: vertical
     * Extent: Azerbaijan - Caspian offshore and onshore Sangachal terminal.
     * Scope: Oil and gas exploration and production.
     * Average level of Caspian Sea at the Oil Rocks tide gauge June-September 1995.
     * AIOC 1995 datum is 1.7m above Caspian datum and 26.3m below Baltic datum.
     */
    public const EPSG_AIOC_1995 = 5133;

    /**
     * AbInvA96_2020 Intermediate Reference Frame
     * Type: geodetic
     * Extent: UK - on or related to the A96 highway from Aberdeen to Inverness.
     * Scope: Highway engineering.
     * Defined through the application of the AbInvA96_2000 NTv2 transformation (code 9386) to ETRS89 as realized
     * through OSNet v2009 CORS.
     * Created in 2020 to support intermediate CRS "AbInvA96_2020-IRF" in the emulation of the AbInvA96_2020 Snake map
     * projection.
     */
    public const EPSG_ABINVA96_2020_INTERMEDIATE_REFERENCE_FRAME = 1273;

    /**
     * Abidjan 1987
     * Type: geodetic
     * Extent: Côte d'Ivoire (Ivory Coast) - onshore and offshore.
     * Scope: Topographic mapping.
     * Fundamental point: Abidjan I. Latitude: 5°18'51.01"N, longitude: 4°02'06.04"W (of Greenwich).
     */
    public const EPSG_ABIDJAN_1987 = 6143;

    /**
     * Accra
     * Type: geodetic
     * Extent: Ghana - onshore and offshore.
     * Scope: Topographic mapping.
     * Fundamental point: GCS Station 547. Latitude: 5°23'43.3"N, longitude: 0°11'52.3"W (of Greenwich).
     * Replaced in 1978 by Leigon datum (code 6250).
     */
    public const EPSG_ACCRA = 6168;

    /**
     * Aden 1925
     * Type: geodetic
     * Extent: Yemen - South Yemen onshore mainland.
     * Scope: Engineering survey, harbour hydrography.
     */
    public const EPSG_ADEN_1925 = 1135;

    /**
     * Adindan
     * Type: geodetic
     * Extent: Eritrea; Ethiopia; South Sudan; Sudan.
     * Scope: Topographic mapping.
     * Fundamental point: Station 15; Adindan. Latitude: 22°10'07.110"N, longitude: 31°29'21.608"E (of Greenwich).
     * The 12th parallel traverse of 1966-70 (Point 58 datum, code 6620) is connected to the Blue Nile 1958 network in
     * western Sudan. This has given rise to misconceptions that the Blue Nile network is used in west Africa.
     */
    public const EPSG_ADINDAN = 6201;

    /**
     * Afgooye
     * Type: geodetic
     * Extent: Somalia - onshore.
     * Scope: Topographic mapping.
     */
    public const EPSG_AFGOOYE = 6205;

    /**
     * Agadez
     * Type: geodetic
     * Extent: Niger.
     * Scope: Topographic mapping.
     */
    public const EPSG_AGADEZ = 6206;

    /**
     * Ain el Abd 1970
     * Type: geodetic
     * Extent: Bahrain, Kuwait and Saudi Arabia - onshore.
     * Scope: Topographic mapping.
     * Fundamental point: Ain El Abd.  Latitude: 28°14'06.171"N, longitude: 48°16'20.906"E (of Greenwich).
     */
    public const EPSG_AIN_EL_ABD_1970 = 6204;

    /**
     * Albanian 1987
     * Type: geodetic
     * Extent: Albania - onshore.
     * Scope: Geodesy, cadastre, engineering survey, topographic mapping.
     */
    public const EPSG_ALBANIAN_1987 = 6191;

    /**
     * Alicante
     * Type: vertical
     * Extent: Gibraltar - onshore; Spain - mainland onshore.
     * Scope: Geodesy, engineering survey, topographic mapping.
     * Mean Sea Level at Alicante between 1870 and 1872.
     * Orthometric heights.
     */
    public const EPSG_ALICANTE = 5180;

    /**
     * American Samoa 1962
     * Type: geodetic
     * Extent: American Samoa - Tutuila, Aunu'u, Ofu, Olesega and Ta'u islands.
     * Scope: Topographic mapping.
     * Fundamental point: Betty 13 eccentric. Latitude: 14°20'08.34"S, longitude: 170°42'52.25"W (of Greenwich).
     */
    public const EPSG_AMERICAN_SAMOA_1962 = 6169;

    /**
     * American Samoa Vertical Datum of 2002
     * Type: vertical
     * Extent: American Samoa - Tutuila island.
     * Scope: Geodesy, topographic mapping.
     * Mean sea level at Pago Pago harbor, Tutuila. Benchmark 1770000 S TIDAL = 1.364m relative to National Tidal Datum
     * Epoch 1983-2001.
     * Replaces Tutuila vertical datum of 1962 (datum code 1121).
     */
    public const EPSG_AMERICAN_SAMOA_VERTICAL_DATUM_OF_2002 = 1125;

    /**
     * Amersfoort
     * Type: geodetic
     * Extent: Netherlands - onshore, including Waddenzee, Dutch Wadden Islands and 12-mile offshore coastal zone.
     * Scope: Geodesy, cadastre, engineering survey, topographic mapping.
     * Originally defined through fundamental point Amersfoort, latitude 52°09'22.178"N, longitude 5°23'15.478"E (of
     * Greenwich). Since 2000-10-01 has been redefined as derived from ETRS89 by application of the official
     * transformation RDNAPTRANS(TM).
     */
    public const EPSG_AMERSFOORT = 6289;

    /**
     * Ammassalik 1958
     * Type: geodetic
     * Extent: Greenland - Ammassalik area onshore.
     * Scope: Topographic mapping.
     */
    public const EPSG_AMMASSALIK_1958 = 6196;

    /**
     * Ancienne Triangulation Francaise (Paris)
     * Type: geodetic
     * Extent: France - mainland onshore.
     * Scope: Topographic mapping.
     *
     * Uses the RGS value for the Paris meridian.  In Alsace, data suspected to be transformation of German network
     * into ATF. Replaced by Nouvelle Triangulation Francaise (Paris) (code 6807) which uses the 1936 IGN value for the
     * Paris meridian.
     */
    public const EPSG_ANCIENNE_TRIANGULATION_FRANCAISE_PARIS = 6901;

    /**
     * Anguilla 1957
     * Type: geodetic
     * Extent: Anguilla - onshore.
     * Scope: Topographic mapping.
     * Fundamental point: station A4, Police.
     */
    public const EPSG_ANGUILLA_1957 = 6600;

    /**
     * Antalya
     * Type: vertical
     * Extent: Turkey - onshore.
     * Scope: Geodesy, engineering survey, topographic mapping.
     * Mean sea Level at Antalya 1936-71.
     * Orthometric heights.
     */
    public const EPSG_ANTALYA = 5173;

    /**
     * Antigua 1943
     * Type: geodetic
     * Extent: Antigua island - onshore.
     * Scope: Topographic mapping.
     * Fundamental point: station A14.
     */
    public const EPSG_ANTIGUA_1943 = 6601;

    /**
     * Aratu
     * Type: geodetic
     * Extent: Brazil - offshore south and east of a line intersecting the coast at 2°55'S; onshore Tucano basin.
     * Scope: Oil and gas exploration.
     */
    public const EPSG_ARATU = 6208;

    /**
     * Arc 1950
     * Type: geodetic
     * Extent: Botswana; Malawi; Zambia; Zimbabwe.
     * Scope: Geodesy, topographic mapping.
     * Fundamental point: Buffelsfontein. Latitude: 33°59'32.000"S, longitude: 25°30'44.622"E (of Greenwich).
     */
    public const EPSG_ARC_1950 = 6209;

    /**
     * Arc 1960
     * Type: geodetic
     * Extent: Burundi, Kenya, Rwanda, Tanzania and Uganda.
     * Scope: Geodesy, topographic mapping.
     * Fundamental point: Buffelsfontein. Latitude: 33°59'32.000"S, longitude: 25°30'44.622"E (of Greenwich).
     */
    public const EPSG_ARC_1960 = 6210;

    /**
     * Ascension Island 1958
     * Type: geodetic
     * Extent: St Helena, Ascension and Tristan da Cunha - Ascension Island - onshore.
     * Scope: Military survey.
     */
    public const EPSG_ASCENSION_ISLAND_1958 = 6712;

    /**
     * Astro DOS 71
     * Type: geodetic
     * Extent: St Helena, Ascension and Tristan da Cunha - St Helena Island - onshore.
     * Scope: Geodesy, topographic mapping.
     * Fundamental point: DOS 71/4, Ladder Hill Fort, latitude: 15°55'30"S, longitude: 5°43'25"W (of Greenwich).
     */
    public const EPSG_ASTRO_DOS_71 = 6710;

    /**
     * Auckland 1946
     * Type: vertical
     * Extent: New Zealand - North Island - Auckland vertical CRS area.
     * Scope: Geodesy, engineering survey, topographic mapping.
     * MSL at Auckland harbour 1909-1923.
     */
    public const EPSG_AUCKLAND_1946 = 5157;

    /**
     * Australian Antarctic Datum 1998
     * Type: geodetic
     * Extent: Antarctica between 45°E and 136°E and between 142°E and 160°E - Australian sector.
     * Scope: Topographic mapping.
     */
    public const EPSG_AUSTRALIAN_ANTARCTIC_DATUM_1998 = 6176;

    /**
     * Australian Geodetic Datum 1966
     * Type: geodetic
     * Extent: Australia - onshore and offshore. Papua New Guinea - onshore.
     * Scope: Topographic mapping.
     * Fundamental point: Johnson Memorial Cairn. Latitude: 25°56'54.5515"S, longitude: 133°12'30.0771"E (of
     * Greenwich).
     */
    public const EPSG_AUSTRALIAN_GEODETIC_DATUM_1966 = 6202;

    /**
     * Australian Geodetic Datum 1984
     * Type: geodetic
     * Extent: Australia - Queensland, South Australia, Western Australia, federal areas offshore west of 129°E.
     * Scope: Topographic mapping.
     * Fundamental point: Johnson Memorial Cairn. Latitude: 25°56'54.5515"S, longitude: 133°12'30.0771"E (of
     * Greenwich).
     * Uses all data from 1966 adjustment with additional observations, improved software and a geoid model.
     */
    public const EPSG_AUSTRALIAN_GEODETIC_DATUM_1984 = 6203;

    /**
     * Australian Height Datum
     * Type: vertical
     * Extent: Australia - Australian Capital Territory, New South Wales, Northern Territory, Queensland, South
     * Australia, Tasmania, Western Australia and Victoria - onshore. Christmas Island - onshore. Cocos and Keeling
     * Islands - onshore.
     * Scope: Cadastre, engineering surveying applications over distances up to 10km.
     * Mainland: MSL 1966-68 at 30 gauges around coast. Tasmania: MSL 1972 at Hobart and Burnie. Christmas Island: MSL
     * (details unspecified). Cocos and Keeling Islands: MSL (details unspecified).
     * Normal-orthometric heights. Initially defined for mainland only, with independent height datums for Australian
     * mainland, Tasmania, Christmas Island and Cocos and Keeling Islands. With introduction of AUSGeoid2020 in 2017,
     * all considered to be AHD.
     */
    public const EPSG_AUSTRALIAN_HEIGHT_DATUM = 5111;

    /**
     * Australian Height Datum (Tasmania)
     * Type: vertical
     * Extent: Australia - Tasmania mainland - onshore.
     * Scope: Geodesy, topographic mapping.
     * MSL 1972 at Hobart and Burnie.
     */
    public const EPSG_AUSTRALIAN_HEIGHT_DATUM_TASMANIA = 5112;

    /**
     * Australian Terrestrial Reference Frame 2014
     * Type: dynamic geodetic
     * Extent: Australia including Lord Howe Island, Macquarie Islands, Ashmore and Cartier Islands, Christmas Island,
     * Cocos (Keeling) Islands, Norfolk Island. All onshore and offshore.
     * Scope: Location-based services, Intelligent Transport Services, navigation, positioning.
     * ITRF2014 at epoch 2020.0.
     * Densification of ITRF2014 in the Australian region.
     */
    public const EPSG_AUSTRALIAN_TERRESTRIAL_REFERENCE_FRAME_2014 = 1291;

    /**
     * Australian Vertical Working Surface
     * Type: vertical
     * Extent: Australia including Lord Howe Island, Macquarie Islands, Ashmore and Cartier Islands, Christmas Island,
     * Cocos (Keeling) Islands, Norfolk Island. All onshore and offshore.
     * Scope: Geodesy, hydrography, transfer of accurate heights over distances greater than 10km.
     * Realized by the Australian gravimetric quasi-geoid (AGQG).
     * Normal heights. Extends gravity-related heights to offshore. See AHD (datum code 5111) for cadastral survey or
     * local engineering survey including construction or mining.
     */
    public const EPSG_AUSTRALIAN_VERTICAL_WORKING_SURFACE = 1292;

    /**
     * Autonomous Regions of Portugal 2008
     * Type: geodetic
     * Extent: Portugal - Azores and Madeira island groups and surrounding EEZ - Flores, Corvo; Graciosa, Terceira, Sao
     * Jorge, Pico, Faial; Sao Miguel, Santa Maria; Madeira, Porto Santo, Desertas; Selvagens.
     * Scope: Geodesy.
     * ITRF93 as derived from the 1994 TransAtlantic Network for Geodynamics and Oceanography (TANGO) project.
     * Replaces older classical datums for Azores and Madeira archipelagos.
     */
    public const EPSG_AUTONOMOUS_REGIONS_OF_PORTUGAL_2008 = 1041;

    /**
     * Average Terrestrial System 1977
     * Type: geodetic
     * Extent: Canada - New Brunswick; Nova Scotia; Prince Edward Island.
     * Scope: Topographic mapping.
     *
     * In use from 1979.  To be phased out in late 1990's.
     */
    public const EPSG_AVERAGE_TERRESTRIAL_SYSTEM_1977 = 6122;

    /**
     * Ayabelle Lighthouse
     * Type: geodetic
     * Extent: Djibouti - onshore and offshore.
     * Scope: Military survey.
     * Fundamental point: Ayabelle Lighthouse.
     */
    public const EPSG_AYABELLE_LIGHTHOUSE = 6713;

    /**
     * Azores Central Islands 1948
     * Type: geodetic
     * Extent: Portugal - central Azores onshore - Faial, Graciosa, Pico, Sao Jorge, Terceira.
     * Scope: Topographic mapping.
     * Fundamental point: Graciosa south west base. Latitude: 39°03'54.934"N, longitude: 28°02'23.882"W (of
     * Greenwich).
     * Replaced by 1995 adjustment (datum code 6665).
     */
    public const EPSG_AZORES_CENTRAL_ISLANDS_1948 = 6183;

    /**
     * Azores Central Islands 1995
     * Type: geodetic
     * Extent: Portugal - central Azores onshore - Faial, Graciosa, Pico, Sao Jorge, Terceira.
     * Scope: Topographic mapping.
     * Fundamental point: Graciosa south west base. Origin and orientation constrained to those of the 1948 adjustment.
     * Classical and GPS observations. Replaces 1948 adjustment (datum code 6183).
     */
    public const EPSG_AZORES_CENTRAL_ISLANDS_1995 = 6665;

    /**
     * Azores Occidental Islands 1939
     * Type: geodetic
     * Extent: Portugal - western Azores onshore - Flores, Corvo.
     * Scope: Topographic mapping.
     * Fundamental point: Observatario Meteorologico Flores.
     */
    public const EPSG_AZORES_OCCIDENTAL_ISLANDS_1939 = 6182;

    /**
     * Azores Oriental Islands 1940
     * Type: geodetic
     * Extent: Portugal - eastern Azores onshore - Sao Miguel, Santa Maria, Formigas.
     * Scope: Topographic mapping.
     * Fundamental point: Forte de São Bras.
     * Replaced by 1995 adjustment (datum code 6664).
     */
    public const EPSG_AZORES_ORIENTAL_ISLANDS_1940 = 6184;

    /**
     * Azores Oriental Islands 1995
     * Type: geodetic
     * Extent: Portugal - eastern Azores onshore - Sao Miguel, Santa Maria, Formigas.
     * Scope: Topographic mapping.
     * Fundamental point: Forte de São Bras. Origin and orientation constrained to those of the 1940 adjustment.
     * Classical and GPS observations. Replaces 1940 adjustment (datum code 6184).
     */
    public const EPSG_AZORES_ORIENTAL_ISLANDS_1995 = 6664;

    /**
     * Baltic 1957
     * Type: vertical
     * Extent: Czechia; Slovakia.
     * Scope: Geodesy, engineering survey, topographic mapping.
     * Datum: average water level at Kronstadt 1833. Network adjusted in 1957 as Uniform Precise Leveling Network of
     * Eastern Europe (EPNN).
     * Uses Normal heights.
     */
    public const EPSG_BALTIC_1957 = 1202;

    /**
     * Baltic 1977
     * Type: vertical
     * Extent: Armenia; Azerbaijan; Belarus; Estonia - onshore; Georgia - onshore; Kazakhstan; Kyrgyzstan; Latvia -
     * onshore; Lithuania - onshore; Moldova; Russian Federation - onshore; Tajikistan; Turkmenistan; Ukraine -
     * onshore; Uzbekistan.
     * Scope: Geodesy, topographic mapping.
     * Datum: average water level at Kronstadt 1833. Network adjusted in 1974-78 as Uniform Precise Leveling Network of
     * Eastern Europe (EPNN).
     * Uses Normal heights. Adjustment also included former Czechoslovakia but was not adopted there, the 1957
     * adjustment being retained instead.
     */
    public const EPSG_BALTIC_1977 = 5105;

    /**
     * Baltic 1980
     * Type: vertical
     * Extent: Hungary.
     * Scope: Geodesy, engineering survey, topographic mapping.
     *
     * Uses Normal heights.
     */
    public const EPSG_BALTIC_1980 = 5185;

    /**
     * Baltic 1982
     * Type: vertical
     * Extent: Bulgaria - onshore.
     * Scope: Geodesy, engineering survey, topographic mapping.
     * Network adjusted in 1982. Height at reference point Varna defined as 1958 value from the UPLN adjustment. Datum
     * at Kronstadt is mean sea level of Baltic in 1833.
     * Uses Normal heights.
     */
    public const EPSG_BALTIC_1982 = 5184;

    /**
     * Bandar Abbas
     * Type: vertical
     * Extent: Iran - onshore.
     * Scope: Geodesy, topographic mapping.
     * Average sea level at Bandar Abbas 1995-2001.
     * Replaces Fao (datum code 5149) in Iran.
     */
    public const EPSG_BANDAR_ABBAS = 5150;

    /**
     * Barbados 1938
     * Type: geodetic
     * Extent: Barbados - onshore.
     * Scope: Topographic mapping.
     * Fundamental point: HMS Challenger astro station M1, St. Anne's Tower. Latitude 13°04'32.53"N, longitude
     * 59°36'29.34"W (of Greenwich).
     */
    public const EPSG_BARBADOS_1938 = 6212;

    /**
     * Batavia
     * Type: geodetic
     * Extent: Indonesia - Bali, Java and western Sumatra onshore, offshore southern Java Sea, Madura Strait and
     * western Bali Sea.
     * Scope: Topographic mapping.
     * Fundamental point: Longitude at Batavia Astro. Station. Latitude: 6°07'39.522"S, longitude: 106°48'27.790"E
     * (of Greenwich). Latitude and azimuth at Genuk.
     */
    public const EPSG_BATAVIA = 6211;

    /**
     * Batavia (Jakarta)
     * Type: geodetic
     * Extent: Indonesia - onshore - Bali, Java and western Sumatra.
     * Scope: Topographic mapping.
     * Fundamental point: Longitude at Batavia astronomical station. Latitude: 6°07'39.522"S, longitude: 0°00'00.0"E
     * (of Jakarta). Latitude and azimuth at Genuk.
     */
    public const EPSG_BATAVIA_JAKARTA = 6813;

    /**
     * Beduaram
     * Type: geodetic
     * Extent: Niger - southeast
     * Scope: Topographic mapping.
     */
    public const EPSG_BEDUARAM = 6213;

    /**
     * Beijing 1954
     * Type: geodetic
     * Extent: China - onshore and offshore.
     * Scope: Topographic mapping.
     * Pulkovo, transferred through Russian triangulation.
     * Scale determined through three baselines in northeast China. Discontinuities at boundaries of adjustment blocks.
     * From 1982 replaced by Xian 1980 and New Beijing.
     */
    public const EPSG_BEIJING_1954 = 6214;

    /**
     * Bekaa Valley 1920
     * Type: geodetic
     * Extent: Lebanon - onshore.
     * Scope: Topographic mapping.
     */
    public const EPSG_BEKAA_VALLEY_1920 = 1137;

    /**
     * Belfast Lough
     * Type: vertical
     * Extent: United Kingdom (UK) - Northern Ireland (Ulster) - onshore.
     * Scope: Topographic mapping (large scale).
     * Mean sea level between 1951 and 1956 at Clarendon Dock, Belfast. Initially realised through levelling network
     * adjustment, from 2002 redefined to be realised through OSGM geoid model.
     * Orthometric heights. Malin Head (datum code 5130) used for 1:50,000 and smaller mapping.
     */
    public const EPSG_BELFAST_LOUGH = 5131;

    /**
     * Bellevue
     * Type: geodetic
     * Extent: Vanuatu - southern islands - Aneityum, Efate, Erromango and Tanna.
     * Scope: Military survey.
     *
     * Datum covers all the major islands of Vanuatu in two different adjustment blocks, but practical usage is as
     * given in the area of use.
     */
    public const EPSG_BELLEVUE = 6714;

    /**
     * Bermuda 1957
     * Type: geodetic
     * Extent: Bermuda - onshore.
     * Scope: Topographic mapping.
     * Fundamental point: Fort George base. Latitude 32°22'44.36"N, longitude 64°40'58.11"W (of Greenwich).
     */
    public const EPSG_BERMUDA_1957 = 6216;

    /**
     * Bermuda 2000
     * Type: geodetic
     * Extent: Bermuda - onshore and offshore.
     * Scope: Cadastre, engineering survey, topographic mapping.
     * ITRF96 at epoch 2000.0.
     */
    public const EPSG_BERMUDA_2000 = 6762;

    /**
     * Bern 1938
     * Type: geodetic
     * Extent: Liechtenstein; Switzerland.
     * Scope: Topographic mapping.
     * Fundamental point: Old Bern observatory. Latitude: 46°57'07.890"N, longitude: 7°26'22.335"E (of Greenwich).
     * This redetermination of the coordinates of fundamental point is used for scientific purposes and as the
     * graticule overprinted on topographic maps constructed on the CH1903 / LV03 projected CS (code 21781).
     */
    public const EPSG_BERN_1938 = 6306;

    /**
     * Bhutan National Geodetic Datum
     * Type: geodetic
     * Extent: Bhutan.
     * Scope: Geodesy.
     * ITRF2000 at epoch 2003.87.
     */
    public const EPSG_BHUTAN_NATIONAL_GEODETIC_DATUM = 1058;

    /**
     * Bioko
     * Type: geodetic
     * Extent: Equatorial Guinea - Bioko onshore.
     * Scope: Topographic mapping.
     */
    public const EPSG_BIOKO = 1136;

    /**
     * Bissau
     * Type: geodetic
     * Extent: Guinea-Bissau - onshore.
     * Scope: Topographic mapping.
     */
    public const EPSG_BISSAU = 6165;

    /**
     * Black Sea
     * Type: vertical
     * Extent: Georgia - onshore.
     * Scope: Hydrography, topographic mapping.
     *
     * Black Sea datum is 0.4m below Baltic datum.
     */
    public const EPSG_BLACK_SEA = 5134;

    /**
     * Bluff 1955
     * Type: vertical
     * Extent: New Zealand - South Island - Bluff vertical CRS area.
     * Scope: Geodesy, engineering survey, topographic mapping.
     * MSL at Invercargill harbour over 8 years between 1918 and 1934.
     */
    public const EPSG_BLUFF_1955 = 5158;

    /**
     * Bogota 1975
     * Type: geodetic
     * Extent: Colombia - mainland and offshore Caribbean.
     * Scope: Topographic mapping.
     * Fundamental point: Bogota observatory. Latitude: 4°35'56.570"N, longitude: 74°04'51.300"W (of Greenwich).
     * Replaces 1951 adjustment. Replaced by MAGNA-SIRGAS (datum code 6685).
     */
    public const EPSG_BOGOTA_1975 = 6218;

    /**
     * Bogota 1975 (Bogota)
     * Type: geodetic
     * Extent: Colombia - mainland onshore.
     * Scope: Topographic mapping.
     * Fundamental point: Bogota observatory. Latitude: 4°35'56.570"N, longitude: 0°E (of Bogota).
     */
    public const EPSG_BOGOTA_1975_BOGOTA = 6802;

    /**
     * Bora Bora SAU 2001
     * Type: vertical
     * Extent: French Polynesia - Society Islands - Bora Bora.
     * Scope: Geodesy, engineering survey, topographic mapping.
     * Fundamental benchmark: Vaitape quay SHOM benchmark B.
     * Included as part of NGPF - see datum code 5195.
     */
    public const EPSG_BORA_BORA_SAU_2001 = 5202;

    /**
     * British Isles height ensemble
     * Type: ensemble
     * Extent: United Kingdom (UK) - offshore to boundary of UKCS within 49°45'N to 61°N and 9°W to 2°E; onshore
     * Great Britain (England, Wales and Scotland) and Northern Ireland. Ireland onshore. Isle of Man onshore.
     * Scope: Spatial referencing.
     * Ensemble of 9 independent vertical datums now all defined through OS geoid model OSGM15.
     * Orthometric heights.
     */
    public const EPSG_BRITISH_ISLES_HEIGHT_ENSEMBLE = 1288;

    /**
     * Bukit Rimpah
     * Type: geodetic
     * Extent: Indonesia - Banga and Belitung Islands.
     * Scope: Topographic mapping.
     * 2°00'40.16"S, 105°51'39.76"E (of Greenwich).
     */
    public const EPSG_BUKIT_RIMPAH = 6219;

    /**
     * Bulgaria Geodetic System 2005
     * Type: geodetic
     * Extent: Bulgaria - onshore and offshore.
     * Scope: Geodesy, cadastre, engineering survey, topographic mapping.
     * Densification of ETRS89 realised through network of 112 permanent GNSS reference stations in ETRF2000@2005.0.
     * Adopted as official Bulgarian reference datum through decree 153 of 2010-07-29.
     */
    public const EPSG_BULGARIA_GEODETIC_SYSTEM_2005 = 1167;

    /**
     * CH1903
     * Type: geodetic
     * Extent: Liechtenstein; Switzerland.
     * Scope: Topographic mapping.
     * Fundamental point: Old Bern observatory. Latitude: 46°57'08.660"N, longitude: 7°26'22.500"E (of Greenwich).
     */
    public const EPSG_CH1903 = 6149;

    /**
     * CH1903 (Bern)
     * Type: geodetic
     * Extent: Liechtenstein; Switzerland.
     * Scope: Topographic mapping.
     * Fundamental point: Old Bern observatory. Latitude: 46°57'08.660"N, longitude: 0°E (of Bern).
     */
    public const EPSG_CH1903_BERN = 6801;

    /**
     * CH1903+
     * Type: geodetic
     * Extent: Liechtenstein; Switzerland.
     * Scope: Geodesy, topographic mapping.
     * Fundamental point: Zimmerwald observatory.
     */
    public const EPSG_CH1903_PLUS = 6150;

    /**
     * CR-SIRGAS
     * Type: geodetic
     * Extent: Costa Rica - onshore and offshore.
     * Scope: Geodesy.
     * ITRF2008 (IGb08) at epoch 2014.59. Network of 42 GNSS stations of the passive and active reference system.
     * Dynamic datum (reference frame). Replaces CR05 from April 2018.
     */
    public const EPSG_CR_SIRGAS = 1225;

    /**
     * Cadastre 1997
     * Type: geodetic
     * Extent: Mayotte - onshore.
     * Scope: Cadastre.
     * Coordinates of 1 station of Combani 1950 adjustment held fixed.
     * Derived by adjustment of GPS-observed network which was constrained to Combani 1950 coordinates of one station.
     */
    public const EPSG_CADASTRE_1997 = 1037;

    /**
     * Cais da Figueirinha - Angra do Heroismo
     * Type: vertical
     * Extent: Portugal - central Azores - Terceira island onshore.
     * Scope: Geodesy, engineering survey, topographic mapping.
     * Mean Sea Level during 1951 at Cais da Figueirinha - Angra do Heroísmo.
     * Orthometric heights.
     */
    public const EPSG_CAIS_DA_FIGUEIRINHA_ANGRA_DO_HEROISMO = 1107;

    /**
     * Cais da Madalena
     * Type: vertical
     * Extent: Portugal - central Azores - Pico island onshore.
     * Scope: Geodesy, engineering survey, topographic mapping.
     * Mean Sea Level during 1937 at Cais da Madalena.
     * Orthometric heights.
     */
    public const EPSG_CAIS_DA_MADALENA = 1105;

    /**
     * Cais da Pontinha - Funchal
     * Type: vertical
     * Extent: Portugal - Madeira and Desertas islands - onshore.
     * Scope: Geodesy, engineering survey, topographic mapping.
     * Mean Sea Level during 1913 at Cais da Pontinha, Funchal.
     * Orthometric heights.
     */
    public const EPSG_CAIS_DA_PONTINHA_FUNCHAL = 1101;

    /**
     * Cais da Vila - Porto Santo
     * Type: vertical
     * Extent: Portugal - Porto Santo island (Madeira archipelago) onshore.
     * Scope: Geodesy, engineering survey, topographic mapping.
     * Mean Sea Level during 1936 at Cais da Vila, Porto Santo.
     * Orthometric heights.
     */
    public const EPSG_CAIS_DA_VILA_PORTO_SANTO = 1102;

    /**
     * Cais da Vila do Porto
     * Type: vertical
     * Extent: Portugal - eastern Azores onshore - Santa Maria, Formigas.
     * Scope: Geodesy, engineering survey, topographic mapping.
     * Mean Sea Level during 1965 at Cais da Vila, Porto.
     * Orthometric heights.
     */
    public const EPSG_CAIS_DA_VILA_DO_PORTO = 1109;

    /**
     * Cais das Velas
     * Type: vertical
     * Extent: Portugal - central Azores - Sao Jorge island onshore.
     * Scope: Geodesy, engineering survey, topographic mapping.
     * Mean Sea Level during 1937 at Cais das Velas.
     * Orthometric heights.
     */
    public const EPSG_CAIS_DAS_VELAS = 1103;

    /**
     * Camacupa 1948
     * Type: geodetic
     * Extent: Angola - Angola proper - onshore and offshore.
     * Scope: Coastal hydrography, offshore oil and gas exploration and production.
     * Fundamental point: Campo de Aviaçao. Latitude: 12°01'09.070"S, Longitude = 17°27'19.800"E (of Greenwich).
     * Provisional adjustment, replaced in 2015 for onshore use by Camacupa 2015.
     */
    public const EPSG_CAMACUPA_1948 = 6220;

    /**
     * Camacupa 2015
     * Type: geodetic
     * Extent: Angola - onshore and offshore.
     * Scope: EEZ delimitation.
     * Fundamental point: Campo de Aviaçao. Latitude: 12°01'08.702"S, Longitude = 17°27'19.515"E (of Greenwich).
     * Second adjustment. Not used for offshore oil and gas exploration and production.
     */
    public const EPSG_CAMACUPA_2015 = 1217;

    /**
     * Camp Area Astro
     * Type: geodetic
     * Extent: Antarctica - McMurdo Sound, Camp McMurdo area.
     * Scope: Geodesy, topographic mapping.
     */
    public const EPSG_CAMP_AREA_ASTRO = 6715;

    /**
     * Campo Inchauspe
     * Type: geodetic
     * Extent: Argentina - mainland onshore and Atlantic offshore Tierra del Fuego.
     * Scope: Topographic mapping.
     * Fundamental point: Campo Inchauspe. Latitude: 35°58'16.56"S, longitude: 62°10'12.03"W (of Greenwich).
     */
    public const EPSG_CAMPO_INCHAUSPE = 6221;

    /**
     * Canadian Geodetic Vertical Datum of 1928
     * Type: vertical
     * Extent: Canada - onshore - Alberta; British Columbia; Manitoba south of 57°N; New Brunswick; Northwest
     * Territories south west of a line between 60°N, 110°W and the coast at 132°W; Nova Scotia; Ontario south of
     * 52°N; Prince Edward Island; Quebec - mainland west of 66°W and south of 55°N; Saskatchewan south of 55°N;
     * Yukon.
     * Scope: Geodesy, topographic mapping.
     * Based on the mean sea level determined from several tidal gauges located in strategic areas of the country.
     * From November 2013 replaced by CGVD2013 (datum code 1127).
     */
    public const EPSG_CANADIAN_GEODETIC_VERTICAL_DATUM_OF_1928 = 5114;

    /**
     * Canadian Geodetic Vertical Datum of 2013 (CGG2013)
     * Type: vertical
     * Extent: Canada - onshore and offshore - Alberta; British Columbia; Manitoba; New Brunswick; Newfoundland and
     * Labrador; Northwest Territories; Nova Scotia; Nunavut; Ontario; Prince Edward Island; Quebec; Saskatchewan;
     * Yukon.
     * Scope: Geodesy, topographic mapping.
     * Defined by the equipotential surface W0 = 62,636,856.0 m^2s^-2, which by convention represents the coastal mean
     * sea level for North America.
     * Replaces CGVD28 (datum code 5114) from November 2013. Replaced by CGVD2013 (CGG2013a) (datum code 1256) from
     * December 2015.
     */
    public const EPSG_CANADIAN_GEODETIC_VERTICAL_DATUM_OF_2013_CGG2013 = 1127;

    /**
     * Canadian Geodetic Vertical Datum of 2013 (CGG2013a)
     * Type: vertical
     * Extent: Canada - onshore and offshore - Alberta; British Columbia; Manitoba; New Brunswick; Newfoundland and
     * Labrador; Northwest Territories; Nova Scotia; Nunavut; Ontario; Prince Edward Island; Quebec; Saskatchewan;
     * Yukon.
     * Scope: Geodesy, topographic mapping.
     * Defined by the equipotential surface W0 = 62,636,856.0 m^2s^-2, which by convention represents the coastal mean
     * sea level for North America, realized through the Canadian gravimetric geoid 2013a.
     * Replaces CGVD2013 (CGG2013) in December 2015.
     */
    public const EPSG_CANADIAN_GEODETIC_VERTICAL_DATUM_OF_2013_CGG2013A = 1256;

    /**
     * Cape
     * Type: geodetic
     * Extent: Botswana; Eswatini (Swaziland); Lesotho; South Africa - mainland.
     * Scope: Geodesy, cadastre, engineering survey, topographic mapping.
     * Fundamental point: Buffelsfontein. Latitude: 33°59'32.000"S, longitude: 25°30'44.622"E (of Greenwich).
     */
    public const EPSG_CAPE = 6222;

    /**
     * Cape Canaveral
     * Type: geodetic
     * Extent: North America - onshore - Bahamas and USA - Florida (east).
     * Scope: US space and military operations.
     * Fundamental point: Central 1950.  Latitude: 28°29'32.36555"N, longitude 80°34'38.77362"W (of Greenwich).
     */
    public const EPSG_CAPE_CANAVERAL = 6717;

    /**
     * Carthage
     * Type: geodetic
     * Extent: Tunisia - onshore and offshore.
     * Scope: Topographic mapping.
     * Fundamental point: Carthage. Latitude: 40.9464506g = 36°51'06.50"N, longitude: 8.8724368g E of Paris =
     * 10°19'20.72"E (of Greenwich).
     * Fundamental point astronomic coordinates determined in 1878.
     */
    public const EPSG_CARTHAGE = 6223;

    /**
     * Carthage (Paris)
     * Type: geodetic
     * Extent: Tunisia - onshore.
     * Scope: Topographic mapping.
     * Fundamental point: Carthage. Latitude: 40.9464506g N, longitude: 8.8724368g E (of Paris).
     * Fundamental point astronomic coordinates determined in 1878.
     */
    public const EPSG_CARTHAGE_PARIS = 6816;

    /**
     * Cascais
     * Type: vertical
     * Extent: Portugal - mainland - onshore.
     * Scope: Geodesy, engineering survey, topographic mapping.
     * Mean Sea Level at Cascais 1938.
     * Orthometric heights.
     */
    public const EPSG_CASCAIS = 5178;

    /**
     * Caspian Sea
     * Type: vertical
     * Extent: Azerbaijan - offshore; Kazakhstan - offshore; Russian Federation - Caspian Sea; Turkmenistan - offshore.
     * Scope: Hydrography and nautical charting.
     * Defined as -28.0m Baltic datum.
     */
    public const EPSG_CASPIAN_SEA = 5106;

    /**
     * Cayman Brac Vertical Datum 1961
     * Type: vertical
     * Extent: Cayman Islands - Cayman Brac.
     * Scope: Geodesy, topographic mapping.
     */
    public const EPSG_CAYMAN_BRAC_VERTICAL_DATUM_1961 = 1099;

    /**
     * Cayman Islands Geodetic Datum 2011
     * Type: geodetic
     * Extent: Cayman Islands - onshore and offshore. Includes Grand Cayman, Little Cayman and Cayman Brac.
     * Scope: Geodesy, cadastre, engineering survey, topographic mapping.
     * ITRF2005 at epoch 2011.0
     * Replaces GCGD59 (datum code 6723) and SIGD61 (datum code 6726).
     */
    public const EPSG_CAYMAN_ISLANDS_GEODETIC_DATUM_2011 = 1100;

    /**
     * Centre Spatial Guyanais 1967
     * Type: geodetic
     * Extent: French Guiana - coastal area.
     * Scope: Geodesy, cadastre, engineering survey, topographic mapping.
     * Fundamental point: Kourou-Diane. Latitude: 5°15'53.699"N, longitude: 52°48'09.149"W (of Greenwich).
     * Replaced by RGFG95 (code 6624).
     */
    public const EPSG_CENTRE_SPATIAL_GUYANAIS_1967 = 6623;

    /**
     * Ceuta 2
     * Type: vertical
     * Extent: Spain - Ceuta onshore.
     * Scope: Geodesy, engineering survey, topographic mapping.
     * Mean Sea Level at Ceuta harbour between March 1944 and December 2006.
     * Orthometric heights. Replaces an earlier vertical datum in Ceuta harbour measured between 1908 and 1927.
     */
    public const EPSG_CEUTA_2 = 1285;

    /**
     * Chatham Islands Datum 1971
     * Type: geodetic
     * Extent: New Zealand - Chatham Islands group - onshore.
     * Scope: Geodesy, engineering survey, topographic mapping.
     *
     * Replaced by Chatham Islands Datum 1979 (code 6673).
     */
    public const EPSG_CHATHAM_ISLANDS_DATUM_1971 = 6672;

    /**
     * Chatham Islands Datum 1979
     * Type: geodetic
     * Extent: New Zealand - Chatham Islands group - onshore.
     * Scope: Geodesy, engineering survey, topographic mapping.
     * Fundamental point: station Astro. Latitude: 43°57'23.60"S, longitude: 176°34'28.65"W (of Greenwich).
     * Replaces Chatham Islands Datum 1971 (code 6672). Replaced by New Zealand Geodetic Datum 2000 (code 6167) from
     * March 2000.
     */
    public const EPSG_CHATHAM_ISLANDS_DATUM_1979 = 6673;

    /**
     * China 2000
     * Type: geodetic
     * Extent: China - onshore and offshore.
     * Scope: Geodesy, engineering survey, topographic mapping.
     * ITRF97 at epoch 2000.0
     * Combined adjustment of astro-geodetic observations as used for Xian 1980 and GPS control network observed
     * 2000-2003. Adopted July 2008.
     */
    public const EPSG_CHINA_2000 = 1043;

    /**
     * Chos Malal 1914
     * Type: geodetic
     * Extent: Argentina - Mendoza province, Neuquen province, western La Pampa province and western Rio Negro
     * province.
     * Scope: Oil and gas exploration.
     * Chos Malal police station.
     * Also known as Quini-Huao.  Replaced by Campo Inchauspe (code 6221) for topographic mapping, use for oil
     * exploration and production continues.
     */
    public const EPSG_CHOS_MALAL_1914 = 6160;

    /**
     * Chua
     * Type: geodetic
     * Extent: Brazil - south of 18°S and west of 54°W, plus Distrito Federal. Paraguay - north.
     * Scope: Geodesy.
     * Fundamental point: Chua. Latitude: 19°45'41.160"S, longitude: 48°06'07.560"W (of Greenwich).
     * The Chua origin and associated network is in Brazil with a connecting traverse through northern Paraguay. It was
     * used in Brazil only as input into the Corrego Allegre adjustment and for government work in Distrito Federal.
     */
    public const EPSG_CHUA = 6224;

    /**
     * Cocos Islands 1965
     * Type: geodetic
     * Extent: Cocos (Keeling) Islands - onshore.
     * Scope: Military survey.
     * Fundamental point: Anna 1.
     */
    public const EPSG_COCOS_ISLANDS_1965 = 6708;

    /**
     * Combani 1950
     * Type: geodetic
     * Extent: Mayotte - onshore.
     * Scope: Geodesy, cadastre, engineering survey, topographic mapping.
     * Combani South Base.
     * Replaced by RGM04 and Cadastre 1997 (datum codes 1036-37).
     */
    public const EPSG_COMBANI_1950 = 6632;

    /**
     * Conakry 1905
     * Type: geodetic
     * Extent: Guinea - onshore.
     * Scope: Topographic mapping.
     * Fundamental point: Conakry. Latitude: 10.573766g N, longitude: 17.833682g W (of Paris).
     */
    public const EPSG_CONAKRY_1905 = 6315;

    /**
     * Congo 1960 Pointe Noire
     * Type: geodetic
     * Extent: Congo - onshore and offshore.
     * Scope: Topographic mapping.
     * Fundamental point: Point Noire Astro. Latitude: 4°47'00.10"S, longitude: 11°51'01.55"E (of Greenwich).
     */
    public const EPSG_CONGO_1960_POINTE_NOIRE = 6282;

    /**
     * Constanta
     * Type: vertical
     * Extent: Romania - onshore.
     * Scope: Geodesy, engineering survey, topographic mapping.
     * Mean Sea Level at Constanta.
     * Normal-orthometric heights.
     */
    public const EPSG_CONSTANTA = 5179;

    /**
     * Corrego Alegre 1961
     * Type: geodetic
     * Extent: Brazil - onshore - between 18°S and 27°30'S, also east of 54°W between 15°S and 18°S.
     * Scope: Geodesy, topographic mapping.
     * Fundamental point: Corrego Alegre. Latitude: 19°50'14.91"S, longitude: 48°57'41.98"W (of Greenwich).
     * Replaced by Corrego Alegre 1970-72 (datum code 6225). NIMA gives coordinates of origin as latitude:
     * 19°50'15.14"S, longitude: 48°57'42.75"W.
     */
    public const EPSG_CORREGO_ALEGRE_1961 = 1074;

    /**
     * Corrego Alegre 1970-72
     * Type: geodetic
     * Extent: Brazil - onshore - west of 54°W and south of 18°S; also south of 15°S between 54°W and 42°W; also
     * east of 42°W.
     * Scope: Geodesy, topographic mapping.
     * Fundamental point: Corrego Alegre. Latitude: 19°50'14.91"S, longitude: 48°57'41.98"W (of Greenwich).
     * Replaces 1961 adjustment (datum code 1074). Superseded by SAD69. NIMA gives coordinates of origin as latitude:
     * 19°50'15.14"S, longitude: 48°57'42.75"W; these may refer to 1961 adjustment.
     */
    public const EPSG_CORREGO_ALEGRE_1970_72 = 6225;

    /**
     * Costa Rica 2005
     * Type: geodetic
     * Extent: Costa Rica - onshore and offshore.
     * Scope: Geodesy.
     * ITRF2000 at epoch 2005.83.  Network of 34 GPS stations throughout the country, five of which were connected to
     * four Caribbean area ITRF stations.
     * Replaces Ocotepeque (datum code 1070) in Costa Rica from March 2007.
     */
    public const EPSG_COSTA_RICA_2005 = 1065;

    /**
     * Croatian Terrestrial Reference System
     * Type: geodetic
     * Extent: Croatia - onshore and offshore.
     * Scope: Geodesy.
     * Densification of ETRS89 in Croatia at epoch 1995.55.
     * Based on 78 control points with coordinates determined in ETRS89.
     */
    public const EPSG_CROATIAN_TERRESTRIAL_REFERENCE_SYSTEM = 6761;

    /**
     * Croatian Vertical Reference Datum 1971
     * Type: vertical
     * Extent: Croatia - onshore.
     * Scope: Geodesy.
     * Mean sea level at five tide gauges in Dubrovnik, Split, Bakar, Rovinj and Kopar at epoch 1971.5
     * Replaces Trieste (datum code 1050).
     */
    public const EPSG_CROATIAN_VERTICAL_REFERENCE_DATUM_1971 = 5207;

    /**
     * Cyprus Geodetic Reference System 1993
     * Type: geodetic
     * Extent: Cyprus - onshore.
     * Scope: Cadastre, engineering survey, topographic mapping.
     * Station Chionistra (Mount Troodos). Network scale and orientation determined by connection of six stations to
     * ITRF91 in Europe at epoch 1993.1.
     * Survey plans and maps produced by DLS after 1993.
     */
    public const EPSG_CYPRUS_GEODETIC_REFERENCE_SYSTEM_1993 = 1112;

    /**
     * Dabola 1981
     * Type: geodetic
     * Extent: Guinea - onshore.
     * Scope: Topographic mapping.
     */
    public const EPSG_DABOLA_1981 = 6155;

    /**
     * Danger 1950
     * Type: vertical
     * Extent: St Pierre and Miquelon - onshore.
     * Scope: Geodesy, engineering survey, topographic mapping.
     * Marker near tide gauge at port of Saint Pierre. Height is 1.26 metres above zero of tide gauge.
     */
    public const EPSG_DANGER_1950 = 5190;

    /**
     * Dansk Normal Nul
     * Type: vertical
     * Extent: Denmark - onshore.
     * Scope: Engineering survey, topographic mapping.
     * Mean Sea Level at 10 gauges.
     * Orthometric heights.
     */
    public const EPSG_DANSK_NORMAL_NUL = 5132;

    /**
     * Dansk Vertikal Reference 1990
     * Type: vertical
     * Extent: Denmark - onshore.
     * Scope: Engineering survey, topographic mapping.
     * Benchmark at Århus cathedral referenced to mean sea level determined during 1990 at 10 tide gauges: Esbjerg,
     * Fredericia, Frederikshavn, Gedser, Hirtshals, Hornbæk, Korsør, København, Slipshavn and Århus.
     * Normal Orthometric heights.
     */
    public const EPSG_DANSK_VERTIKAL_REFERENCE_1990 = 5206;

    /**
     * Datum 73
     * Type: geodetic
     * Extent: Portugal - mainland - onshore.
     * Scope: Topographic mapping.
     * Fundamental point:  TF4, Melrica. Latitude: 39°41'37.30"N, longitude: 8°07'53.31"W (of Greenwich).
     */
    public const EPSG_DATUM_73 = 6274;

    /**
     * Datum Altimetrico de Costa Rica 1952
     * Type: vertical
     * Extent: Costa Rica - onshore.
     * Scope: Geodesy, engineering survey, topographic mapping.
     * Mean Sea Level 1941-1952 at Puntarenas.
     * Orthometric heights.
     */
    public const EPSG_DATUM_ALTIMETRICO_DE_COSTA_RICA_1952 = 1226;

    /**
     * Datum Geodesi Nasional 1995
     * Type: geodetic
     * Extent: Indonesia - onshore and offshore.
     * Scope: Geodesy, engineering survey, topographic mapping.
     * ITRF91at epoch 1992.0.
     * Replaces ID74 and all older datums.
     */
    public const EPSG_DATUM_GEODESI_NASIONAL_1995 = 6755;

    /**
     * Dealul Piscului 1930
     * Type: geodetic
     * Extent: Romania - onshore.
     * Scope: Topographic mapping.
     * Fundamental point: latitude 44°24'33.9606"N, longitude 26°06'44.8772"E (of Greenwich).
     * Replaced by Pulkovo 1942(58) (datum code 6179).
     */
    public const EPSG_DEALUL_PISCULUI_1930 = 6316;

    /**
     * Deception Island
     * Type: geodetic
     * Extent: Antarctica - South Shetland Islands - Deception Island.
     * Scope: Military survey.
     */
    public const EPSG_DECEPTION_ISLAND = 6736;

    /**
     * Deir ez Zor
     * Type: geodetic
     * Extent: Lebanon - onshore. Syrian Arab Republic - onshore.
     * Scope: Topographic mapping.
     * Fundamental point: Trig. 254 Deir. Latitude: 35°21'49.975"N, longitude: 40°05'46.770"E (of Greenwich).
     */
    public const EPSG_DEIR_EZ_ZOR = 6227;

    /**
     * Deutsche Bahn Reference System
     * Type: geodetic
     * Extent: Germany - onshore - states of Baden-Wurtemberg, Bayern, Berlin, Brandenburg, Bremen, Hamburg, Hessen,
     * Mecklenburg-Vorpommern, Niedersachsen, Nordrhein-Westfalen, Rheinland-Pfalz, Saarland, Sachsen, Sachsen-Anhalt,
     * Schleswig-Holstein, Thuringen.
     * Scope: Engineering survey and topographic mapping for railway applications.
     * Defined by transformation from ETRS89 (transformation code 5826) to be an average of DHDN across all states of
     * Germany.
     */
    public const EPSG_DEUTSCHE_BAHN_REFERENCE_SYSTEM = 1081;

    /**
     * Deutsches Hauptdreiecksnetz
     * Type: geodetic
     * Extent: Germany - states of former West Germany onshore - Baden-Wurtemberg, Bayern, Bremen, Hamburg, Hessen,
     * Niedersachsen, Nordrhein-Westfalen, Rheinland-Pfalz, Saarland, Schleswig-Holstein.
     * Scope: Geodesy, cadastre, engineering survey, topographic mapping.
     * Fundamental point: Rauenberg. Latitude: 52°27'12.021"N, longitude: 13°22'04.928"E (of Greenwich).  This
     * station was destroyed in 1910 and the station at Potsdam substituted as the fundamental point.
     */
    public const EPSG_DEUTSCHES_HAUPTDREIECKSNETZ = 6314;

    /**
     * Deutsches Haupthoehennetz 1912
     * Type: vertical
     * Extent: Germany - onshore - states of Baden-Wurtemberg, Bayern, Berlin, Brandenburg, Bremen, Hamburg, Hessen,
     * Mecklenburg-Vorpommern, Niedersachsen, Nordrhein-Westfalen, Rheinland-Pfalz, Saarland, Sachsen, Sachsen-Anhalt,
     * Schleswig-Holstein, Thuringen.
     * Scope: Geodesy, engineering survey, topographic mapping.
     * Height of reference point "Normalnullpunkt" at Berlin Observatory defined as 37.000m above MSL in 1879
     * (transferred to benchmarks near Hoppegarten in Müncheberg in 1912). Datum at Normaal Amsterdams Peil (NAP) is
     * mean high tide in 1684.
     * Uses Normal-orthometric heights.
     */
    public const EPSG_DEUTSCHES_HAUPTHOEHENNETZ_1912 = 1161;

    /**
     * Deutsches Haupthoehennetz 1985
     * Type: vertical
     * Extent: Germany - states of former West Germany onshore - Baden-Wurtemberg, Bayern, Bremen, Hamburg, Hessen,
     * Niedersachsen, Nordrhein-Westfalen, Rheinland-Pfalz, Saarland, Schleswig-Holstein.
     * Scope: Geodesy, engineering survey, topographic mapping.
     * Network adjusted in 1985. Height of reference point Wallenhorst defined as value from 1928 adjustment. Datum at
     * Normaal Amsterdams Peil (NAP) is mean high tide in 1684.
     * Replaced by DHHN92. Uses Normal-orthometric heights.
     */
    public const EPSG_DEUTSCHES_HAUPTHOEHENNETZ_1985 = 5182;

    /**
     * Deutsches Haupthoehennetz 1992
     * Type: vertical
     * Extent: Germany - onshore - states of Baden-Wurtemberg, Bayern, Berlin, Brandenburg, Bremen, Hamburg, Hessen,
     * Mecklenburg-Vorpommern, Niedersachsen, Nordrhein-Westfalen, Rheinland-Pfalz, Saarland, Sachsen, Sachsen-Anhalt,
     * Schleswig-Holstein, Thuringen.
     * Scope: Geodesy, engineering survey, topographic mapping.
     * Network adjusted in 1992. Geopotential number at reference point Wallenhorst defined as value from the
     * UELN-73/86 adjustment. Datum at Normaal Amsterdams Peil (NAP) is mean high tide in 1684.
     * Replaces DHHN85 in West Germany and SNN76 in East Germany. Uses Normal heights.
     */
    public const EPSG_DEUTSCHES_HAUPTHOEHENNETZ_1992 = 5181;

    /**
     * Deutsches Haupthoehennetz 2016
     * Type: vertical
     * Extent: Germany - onshore - states of Baden-Wurtemberg, Bayern, Berlin, Brandenburg, Bremen, Hamburg, Hessen,
     * Mecklenburg-Vorpommern, Niedersachsen, Nordrhein-Westfalen, Rheinland-Pfalz, Saarland, Sachsen, Sachsen-Anhalt,
     * Schleswig-Holstein, Thuringen.
     * Scope: Geodesy, engineering survey, topographic mapping.
     * 2006-2012 levelling network adjusted to 72 points of the DHHN92. Datum at Normaal Amsterdams Peil (NAP) is mean
     * high tide in 1684.
     * Uses Normal heights in the mean tidal system.
     */
    public const EPSG_DEUTSCHES_HAUPTHOEHENNETZ_2016 = 1170;

    /**
     * Diego Garcia 1969
     * Type: geodetic
     * Extent: British Indian Ocean Territory - Chagos Archipelago - Diego Garcia.
     * Scope: Military survey.
     * Fundamental point: ISTS 073.
     */
    public const EPSG_DIEGO_GARCIA_1969 = 6724;

    /**
     * Dominica 1945
     * Type: geodetic
     * Extent: Dominica - onshore.
     * Scope: Topographic mapping.
     * Fundamental point: station M12.
     */
    public const EPSG_DOMINICA_1945 = 6602;

    /**
     * Douala 1948
     * Type: geodetic
     * Extent: Cameroon - coastal area.
     * Scope: Topographic mapping.
     * South pillar of Douala base; 4°00'40.64"N, 9°42'30.41"E (of Greenwich).
     * Replaced  by Manoca 1962 datum (code 6193).
     */
    public const EPSG_DOUALA_1948 = 6192;

    /**
     * Douglas
     * Type: vertical
     * Extent: Isle of Man - onshore.
     * Scope: Geodesy, topographic mapping.
     * Mean Sea Level at Douglas 1865. Initially realised through levelling network adjustment, from 2002 redefined to
     * be realised through OSGM geoid model.
     * Orthometric heights.
     */
    public const EPSG_DOUGLAS = 5148;

    /**
     * Dunedin 1958
     * Type: vertical
     * Extent: New Zealand - South Island - between approximately 44°S and 46°S - Dunedin vertical CRS area.
     * Scope: Geodesy, engineering survey, topographic mapping.
     * MSL at Dunedin harbour 1918-1937.
     */
    public const EPSG_DUNEDIN_1958 = 5159;

    /**
     * Dunedin-Bluff 1960
     * Type: vertical
     * Extent: New Zealand - South Island - Dunedin-Bluff vertical CRS area.
     * Scope: Geodesy, engineering survey, topographic mapping.
     * Common adjustment of Dunedin 1958 and Bluff 1955 networks.
     */
    public const EPSG_DUNEDIN_BLUFF_1960 = 1040;

    /**
     * Durres
     * Type: vertical
     * Extent: Albania - onshore.
     * Scope: Geodesy, engineering survey, topographic mapping.
     * Mean Sea Level at Durres.
     * Normal-orthometric heights.
     */
    public const EPSG_DURRES = 5175;

    /**
     * EGM2008 geoid
     * Type: vertical
     * Extent: World.
     * Scope: Geodesy.
     * Derived through EGM2008 geoid undulation model consisting of spherical harmonic coefficients to degree 2190 and
     * order 2159 applied to the WGS 84 ellipsoid.
     * Replaces EGM96 geoid (datum code 5171). See transformation codes 3858 and 3859 for 2.5x2.5 and 1x1 arc minute
     * geoid undulation grid files derived from the spherical harmonic coefficients.
     */
    public const EPSG_EGM2008_GEOID = 1027;

    /**
     * EGM84 geoid
     * Type: vertical
     * Extent: World.
     * Scope: Geodesy.
     * Derived through EGM84 geoid undulation model consisting of spherical harmonic coefficients to degree and order
     * 180 applied to the WGS 84 ellipsoid.
     * Replaced by EGM96 geoid (datum code 5171).
     */
    public const EPSG_EGM84_GEOID = 5203;

    /**
     * EGM96 geoid
     * Type: vertical
     * Extent: World.
     * Scope: Geodesy.
     * Derived through EGM84 geoid undulation model consisting of spherical harmonic coefficients to degree and order
     * 360 applied to the WGS 84 ellipsoid.
     * Replaces EGM84 geoid (datum code 5203). Replaced by EGM2008 geoid (datum code 1027).
     */
    public const EPSG_EGM96_GEOID = 5171;

    /**
     * EPSG example wellbore vertical datum
     * Type: vertical
     * Extent: Description of the extent of the CRS.
     * Scope: Wellbore survey.
     * (a) Description of the ZDP, e.g. "derrick floor" or "rig [name] kelly bushing". (b) To interpret local depths
     * the height or depth of the ZDP must be specified with reference to a vertical CRS, e.g. "ZDP is 3.5m above MSL
     * (EPSG CRS code 5714)".
     * Example only. Often called Zero Depth Point (ZDP) or wellbore reference elevation point, the point of 0 offset
     * and lowest vertical constraint in a wellbore survey.
     */
    public const EPSG_EPSG_EXAMPLE_WELLBORE_VERTICAL_DATUM = 1205;

    /**
     * Easter Island 1967
     * Type: geodetic
     * Extent: Chile - Easter Island onshore.
     * Scope: Military survey.
     */
    public const EPSG_EASTER_ISLAND_1967 = 6719;

    /**
     * Egypt 1907
     * Type: geodetic
     * Extent: Egypt - onshore and offshore.
     * Scope: Geodesy, cadastre, engineering survey, topographic mapping.
     * Fundamental point: Station F1 (Venus). Latitude: 30°01'42.86"N, longitude: 31°16'33.60"E (of Greenwich).
     */
    public const EPSG_EGYPT_1907 = 6229;

    /**
     * Egypt 1930
     * Type: geodetic
     * Extent: Egypt - onshore.
     * Scope: Geodesy.
     * Fundamental point: Station F1 (Venus). Latitude: 30°01'42.86"N, longitude: 31°16'37.05"E (of Greenwich).
     * Note that Egypt 1930 uses the International 1924 ellipsoid, unlike the Egypt 1907 datum (code 6229) which uses
     * the Helmert ellipsoid. Oil industry references to the Egypt 1930 datum name and the Helmert ellipsoid probably
     * mean Egypt 1907 datum.
     */
    public const EPSG_EGYPT_1930 = 6199;

    /**
     * Egypt Gulf of Suez S-650 TL
     * Type: geodetic
     * Extent: Egypt - Gulf of Suez.
     * Scope: Oil and gas exploration and production.
     * Fundamental point: Station S-650 DMX. Adopted coordinates: latitude: 28°19'02.1907"N, longitude:
     * 33°06'36.6344"E (of Greenwich). The proper Egypt 1907 coordinates for S-650 differ from these by about 20m.
     * A coherent set of stations bordering the Gulf of Suez coordinated by Transit translocation ("TL") between 1980
     * and 1984. Based on incorrect Egypt 1907 values for origin station S-650. Differs from true Egypt 1907 by
     * approximately 20m.
     */
    public const EPSG_EGYPT_GULF_OF_SUEZ_S_650_TL = 6706;

    /**
     * El Hierro
     * Type: vertical
     * Extent: Spain - Canary Islands - El Hierro onshore.
     * Scope: Geodesy, engineering survey, topographic mapping.
     * Mean Sea Level at La Estaca harbour in 2000.
     * Orthometric heights.
     */
    public const EPSG_EL_HIERRO = 1284;

    /**
     * Estonia 1992
     * Type: geodetic
     * Extent: Estonia - onshore.
     * Scope: Geodesy, topographic mapping.
     * Densification from 4 ETRS89 points.
     * Based on ETRS89 as established during the 1992 Baltic campaign. Replaced by Estonia 1997 adjustment (code 6180).
     */
    public const EPSG_ESTONIA_1992 = 6133;

    /**
     * Estonia 1997
     * Type: geodetic
     * Extent: Estonia - onshore and offshore.
     * Scope: Geodesy, cadastre, engineering survey, topographic mapping.
     * Densification of ETRS89 during EUREF-ESTONIA97 campaign through transformation from ITRF96 at epoch 1997.56.
     * Replaces Estonia 1992 adjustment (code 6133).
     */
    public const EPSG_ESTONIA_1997 = 6180;

    /**
     * European Datum 1950
     * Type: geodetic
     * Extent: Europe - west: Andorra; Cyprus; Denmark - onshore and offshore; Faroe Islands - onshore; France -
     * offshore; Germany - offshore North Sea; Gibraltar; Greece - offshore; Israel - offshore; Italy including San
     * Marino and Vatican City State; Ireland offshore; Malta; Netherlands - offshore; North Sea; Norway including
     * Svalbard - onshore and offshore; Portugal - mainland - offshore; Spain - onshore; Turkey - onshore and offshore;
     * United Kingdom UKCS offshore east of 6°W including Channel Islands (Guernsey and Jersey). Egypt - Western
     * Desert; Iraq - onshore; Jordan.
     * Scope: Geodesy, topographic mapping.
     * Fundamental point: Potsdam (Helmert Tower). Latitude: 52°22'51.4456"N, longitude: 13°03'58.9283"E (of
     * Greenwich).
     */
    public const EPSG_EUROPEAN_DATUM_1950 = 6230;

    /**
     * European Datum 1950(1977)
     * Type: geodetic
     * Extent: Iran - onshore and offshore.
     * Scope: Topographic mapping.
     * Extension of ED50 over Iran.
     * Sometimes referred to as ED50-ED77.
     */
    public const EPSG_EUROPEAN_DATUM_1950_1977 = 6154;

    /**
     * European Datum 1979
     * Type: geodetic
     * Extent: Europe - west.
     * Scope: Geodesy.
     * Fundamental point: Potsdam (Helmert Tower). Latitude: 52°22'51.4456"N, longitude: 13°03'58.9283"E (of
     * Greenwich).
     * Replaced by 1987 adjustment.
     */
    public const EPSG_EUROPEAN_DATUM_1979 = 6668;

    /**
     * European Datum 1987
     * Type: geodetic
     * Extent: Europe - west.
     * Scope: Geodesy.
     * Fundamental point: Potsdam (Helmert Tower). Latitude: 52°22'51.4456"N, longitude: 13°03'58.9283"E (of
     * Greenwich).
     */
    public const EPSG_EUROPEAN_DATUM_1987 = 6231;

    /**
     * European Libyan Datum 1979
     * Type: geodetic
     * Extent: Libya - onshore and offshore.
     * Scope: Topographic mapping.
     * Extension of ED50 over Libya.
     */
    public const EPSG_EUROPEAN_LIBYAN_DATUM_1979 = 6159;

    /**
     * European Terrestrial Reference Frame 1989
     * Type: geodetic
     * Extent: Europe - onshore and offshore: Albania; Andorra; Austria; Belgium; Bosnia and Herzegovina; Bulgaria;
     * Croatia; Cyprus; Czechia; Denmark; Estonia; Faroe Islands; Finland; France; Germany; Gibraltar; Greece; Hungary;
     * Ireland; Italy; Kosovo; Latvia; Liechtenstein; Lithuania; Luxembourg; Malta; Moldova; Monaco; Montenegro;
     * Netherlands; North Macedonia; Norway including Svalbard and Jan Mayen; Poland; Portugal; Romania; San Marino;
     * Serbia; Slovakia; Slovenia; Spain; Sweden; Switzerland; United Kingdom (UK) including Channel Islands and Isle
     * of Man; Vatican City State.
     * Scope: Geodesy.
     * Fixed to the stable part of the Eurasian continental plate at epoch 1989.0 and coincides with ITRF89 at epoch
     * 1989.0. Defined by transformation from ITRF89 - see code 7932.
     * Replaced by ETRF90 (code 1179).
     */
    public const EPSG_EUROPEAN_TERRESTRIAL_REFERENCE_FRAME_1989 = 1178;

    /**
     * European Terrestrial Reference Frame 1990
     * Type: geodetic
     * Extent: Europe - onshore and offshore: Albania; Andorra; Austria; Belgium; Bosnia and Herzegovina; Bulgaria;
     * Croatia; Cyprus; Czechia; Denmark; Estonia; Faroe Islands; Finland; France; Germany; Gibraltar; Greece; Hungary;
     * Ireland; Italy; Kosovo; Latvia; Liechtenstein; Lithuania; Luxembourg; Malta; Moldova; Monaco; Montenegro;
     * Netherlands; North Macedonia; Norway including Svalbard and Jan Mayen; Poland; Portugal; Romania; San Marino;
     * Serbia; Slovakia; Slovenia; Spain; Sweden; Switzerland; United Kingdom (UK) including Channel Islands and Isle
     * of Man; Vatican City State.
     * Scope: Geodesy.
     * Fixed to the stable part of the Eurasian continental plate at epoch 1989.0 and coincides with ITRF89 at epoch
     * 1989.0. Defined by transformation from ITRF90 - see code 7933.
     * Replaces ETRF89 (code 1178). Replaced by ETRF91 (code 1180).
     */
    public const EPSG_EUROPEAN_TERRESTRIAL_REFERENCE_FRAME_1990 = 1179;

    /**
     * European Terrestrial Reference Frame 1991
     * Type: geodetic
     * Extent: Europe - onshore and offshore: Albania; Andorra; Austria; Belgium; Bosnia and Herzegovina; Bulgaria;
     * Croatia; Cyprus; Czechia; Denmark; Estonia; Faroe Islands; Finland; France; Germany; Gibraltar; Greece; Hungary;
     * Ireland; Italy; Kosovo; Latvia; Liechtenstein; Lithuania; Luxembourg; Malta; Moldova; Monaco; Montenegro;
     * Netherlands; North Macedonia; Norway including Svalbard and Jan Mayen; Poland; Portugal; Romania; San Marino;
     * Serbia; Slovakia; Slovenia; Spain; Sweden; Switzerland; United Kingdom (UK) including Channel Islands and Isle
     * of Man; Vatican City State.
     * Scope: Geodesy.
     * Fixed to the stable part of the Eurasian continental plate at epoch 1989.0 and coincides with ITRF89 at epoch
     * 1989.0. Defined by transformation from ITRF91 - see code 7934.
     * Replaces ETRF90 (code 1179). Replaced by ETRF92 (code 1181).
     */
    public const EPSG_EUROPEAN_TERRESTRIAL_REFERENCE_FRAME_1991 = 1180;

    /**
     * European Terrestrial Reference Frame 1992
     * Type: geodetic
     * Extent: Europe - onshore and offshore: Albania; Andorra; Austria; Belgium; Bosnia and Herzegovina; Bulgaria;
     * Croatia; Cyprus; Czechia; Denmark; Estonia; Faroe Islands; Finland; France; Germany; Gibraltar; Greece; Hungary;
     * Ireland; Italy; Kosovo; Latvia; Liechtenstein; Lithuania; Luxembourg; Malta; Moldova; Monaco; Montenegro;
     * Netherlands; North Macedonia; Norway including Svalbard and Jan Mayen; Poland; Portugal; Romania; San Marino;
     * Serbia; Slovakia; Slovenia; Spain; Sweden; Switzerland; United Kingdom (UK) including Channel Islands and Isle
     * of Man; Vatican City State.
     * Scope: Geodesy.
     * Fixed to the stable part of the Eurasian continental plate at epoch 1989.0 and coincides with ITRF89 at epoch
     * 1989.0. Defined by transformation from ITRF92 - see code 7935.
     * Replaces ETRF91 (code 1180). Replaced by ETRF93 (code 1182).
     */
    public const EPSG_EUROPEAN_TERRESTRIAL_REFERENCE_FRAME_1992 = 1181;

    /**
     * European Terrestrial Reference Frame 1993
     * Type: geodetic
     * Extent: Europe - onshore and offshore: Albania; Andorra; Austria; Belgium; Bosnia and Herzegovina; Bulgaria;
     * Croatia; Cyprus; Czechia; Denmark; Estonia; Faroe Islands; Finland; France; Germany; Gibraltar; Greece; Hungary;
     * Ireland; Italy; Kosovo; Latvia; Liechtenstein; Lithuania; Luxembourg; Malta; Moldova; Monaco; Montenegro;
     * Netherlands; North Macedonia; Norway including Svalbard and Jan Mayen; Poland; Portugal; Romania; San Marino;
     * Serbia; Slovakia; Slovenia; Spain; Sweden; Switzerland; United Kingdom (UK) including Channel Islands and Isle
     * of Man; Vatican City State.
     * Scope: Geodesy.
     * Fixed to the stable part of the Eurasian continental plate at epoch 1989.0 and coincides with ITRF89 at epoch
     * 1989.0. Defined by transformation from ITRF93 - see code 7936.
     * Replaces ETRF92 (code 1181). Replaced by ETRF94 (code 1183).
     */
    public const EPSG_EUROPEAN_TERRESTRIAL_REFERENCE_FRAME_1993 = 1182;

    /**
     * European Terrestrial Reference Frame 1994
     * Type: geodetic
     * Extent: Europe - onshore and offshore: Albania; Andorra; Austria; Belgium; Bosnia and Herzegovina; Bulgaria;
     * Croatia; Cyprus; Czechia; Denmark; Estonia; Faroe Islands; Finland; France; Germany; Gibraltar; Greece; Hungary;
     * Ireland; Italy; Kosovo; Latvia; Liechtenstein; Lithuania; Luxembourg; Malta; Moldova; Monaco; Montenegro;
     * Netherlands; North Macedonia; Norway including Svalbard and Jan Mayen; Poland; Portugal; Romania; San Marino;
     * Serbia; Slovakia; Slovenia; Spain; Sweden; Switzerland; United Kingdom (UK) including Channel Islands and Isle
     * of Man; Vatican City State.
     * Scope: Geodesy.
     * Fixed to the stable part of the Eurasian continental plate at epoch 1989.0 and coincides with ITRF89 at epoch
     * 1989.0. Defined by transformation from ITRF94 - see code 7937.
     * Replaces ETRF93 (code 1182). Replaced by ETRF96 (code 1184).
     */
    public const EPSG_EUROPEAN_TERRESTRIAL_REFERENCE_FRAME_1994 = 1183;

    /**
     * European Terrestrial Reference Frame 1996
     * Type: geodetic
     * Extent: Europe - onshore and offshore: Albania; Andorra; Austria; Belgium; Bosnia and Herzegovina; Bulgaria;
     * Croatia; Cyprus; Czechia; Denmark; Estonia; Faroe Islands; Finland; France; Germany; Gibraltar; Greece; Hungary;
     * Ireland; Italy; Kosovo; Latvia; Liechtenstein; Lithuania; Luxembourg; Malta; Moldova; Monaco; Montenegro;
     * Netherlands; North Macedonia; Norway including Svalbard and Jan Mayen; Poland; Portugal; Romania; San Marino;
     * Serbia; Slovakia; Slovenia; Spain; Sweden; Switzerland; United Kingdom (UK) including Channel Islands and Isle
     * of Man; Vatican City State.
     * Scope: Geodesy.
     * Fixed to the stable part of the Eurasian continental plate at epoch 1989.0 and coincides with ITRF89 at epoch
     * 1989.0. Defined by transformation from ITRF96 - see code 7938.
     * Replaces ETRF94 (code 1183). Replaced by ETRF97 (code 1185).
     */
    public const EPSG_EUROPEAN_TERRESTRIAL_REFERENCE_FRAME_1996 = 1184;

    /**
     * European Terrestrial Reference Frame 1997
     * Type: geodetic
     * Extent: Europe - onshore and offshore: Albania; Andorra; Austria; Belgium; Bosnia and Herzegovina; Bulgaria;
     * Croatia; Cyprus; Czechia; Denmark; Estonia; Faroe Islands; Finland; France; Germany; Gibraltar; Greece; Hungary;
     * Ireland; Italy; Kosovo; Latvia; Liechtenstein; Lithuania; Luxembourg; Malta; Moldova; Monaco; Montenegro;
     * Netherlands; North Macedonia; Norway including Svalbard and Jan Mayen; Poland; Portugal; Romania; San Marino;
     * Serbia; Slovakia; Slovenia; Spain; Sweden; Switzerland; United Kingdom (UK) including Channel Islands and Isle
     * of Man; Vatican City State.
     * Scope: Geodesy.
     * Fixed to the stable part of the Eurasian continental plate at epoch 1989.0 and coincides with ITRF89 at epoch
     * 1989.0. Defined by transformation from ITRF97 - see code 7939.
     * Replaces ETRF96 (code 1184). Replaced by ETRF2000 (code 1186).
     */
    public const EPSG_EUROPEAN_TERRESTRIAL_REFERENCE_FRAME_1997 = 1185;

    /**
     * European Terrestrial Reference Frame 2000
     * Type: geodetic
     * Extent: Europe - onshore and offshore: Albania; Andorra; Austria; Belgium; Bosnia and Herzegovina; Bulgaria;
     * Croatia; Cyprus; Czechia; Denmark; Estonia; Faroe Islands; Finland; France; Germany; Gibraltar; Greece; Hungary;
     * Ireland; Italy; Kosovo; Latvia; Liechtenstein; Lithuania; Luxembourg; Malta; Moldova; Monaco; Montenegro;
     * Netherlands; North Macedonia; Norway including Svalbard and Jan Mayen; Poland; Portugal; Romania; San Marino;
     * Serbia; Slovakia; Slovenia; Spain; Sweden; Switzerland; United Kingdom (UK) including Channel Islands and Isle
     * of Man; Vatican City State.
     * Scope: Geodesy.
     * Fixed to the stable part of the Eurasian continental plate at epoch 1989.0 and coincides with ITRF89 at epoch
     * 1989.0. Defined by transformation from ITRF2000 - see code 7940.
     * Replaces ETRF97 (code 1185). On the publication of ETRF2005 (code 1204),  the EUREF Technical Working Group
     * recommended that ETRF2000 be the realization of ETRS89. ETRF2014 (code 1206) is technically superior to all
     * earlier realizations of ETRS89.
     */
    public const EPSG_EUROPEAN_TERRESTRIAL_REFERENCE_FRAME_2000 = 1186;

    /**
     * European Terrestrial Reference Frame 2005
     * Type: geodetic
     * Extent: Europe - onshore and offshore: Albania; Andorra; Austria; Belgium; Bosnia and Herzegovina; Bulgaria;
     * Croatia; Cyprus; Czechia; Denmark; Estonia; Faroe Islands; Finland; France; Germany; Gibraltar; Greece; Hungary;
     * Ireland; Italy; Kosovo; Latvia; Liechtenstein; Lithuania; Luxembourg; Malta; Moldova; Monaco; Montenegro;
     * Netherlands; North Macedonia; Norway including Svalbard and Jan Mayen; Poland; Portugal; Romania; San Marino;
     * Serbia; Slovakia; Slovenia; Spain; Sweden; Switzerland; United Kingdom (UK) including Channel Islands and Isle
     * of Man; Vatican City State.
     * Scope: Geodesy.
     * Fixed to the stable part of the Eurasian continental plate at epoch 1989.0 and coincides with ITRF89 at epoch
     * 1989.0. Defined by transformation from ITRF2005 - see code 5900.
     * On publication in 2007 of this reference frame, the EUREF Technical Working Group recommended that ETRF2000
     * (EPSG code 1186) rather than this reference frame remained as the preferred realization of ETRS89. Replaced by
     * ETRF2014 (code 1206).
     */
    public const EPSG_EUROPEAN_TERRESTRIAL_REFERENCE_FRAME_2005 = 1204;

    /**
     * European Terrestrial Reference Frame 2014
     * Type: geodetic
     * Extent: Europe - onshore and offshore: Albania; Andorra; Austria; Belgium; Bosnia and Herzegovina; Bulgaria;
     * Croatia; Cyprus; Czechia; Denmark; Estonia; Faroe Islands; Finland; France; Germany; Gibraltar; Greece; Hungary;
     * Ireland; Italy; Kosovo; Latvia; Liechtenstein; Lithuania; Luxembourg; Malta; Moldova; Monaco; Montenegro;
     * Netherlands; North Macedonia; Norway including Svalbard and Jan Mayen; Poland; Portugal; Romania; San Marino;
     * Serbia; Slovakia; Slovenia; Spain; Sweden; Switzerland; United Kingdom (UK) including Channel Islands and Isle
     * of Man; Vatican City State.
     * Scope: Geodesy.
     * Fixed to the stable part of the Eurasian continental plate at epoch 2014.0 and coincides with ITRF2014 at epoch
     * 2010.0. Defined by transformation from ITRF2014 - see code 8366.
     * Replaces ETRF2005 (code 1204). Technically superior to ETRF2000 (code 1186).
     */
    public const EPSG_EUROPEAN_TERRESTRIAL_REFERENCE_FRAME_2014 = 1206;

    /**
     * European Terrestrial Reference System 1989 ensemble
     * Type: ensemble
     * Extent: Europe - onshore and offshore: Albania; Andorra; Austria; Belgium; Bosnia and Herzegovina; Bulgaria;
     * Croatia; Cyprus; Czechia; Denmark; Estonia; Faroe Islands; Finland; France; Germany; Gibraltar; Greece; Hungary;
     * Ireland; Italy; Kosovo; Latvia; Liechtenstein; Lithuania; Luxembourg; Malta; Moldova; Monaco; Montenegro;
     * Netherlands; North Macedonia; Norway including Svalbard and Jan Mayen; Poland; Portugal; Romania; San Marino;
     * Serbia; Slovakia; Slovenia; Spain; Sweden; Switzerland; United Kingdom (UK) including Channel Islands and Isle
     * of Man; Vatican City State.
     * Scope: Spatial referencing.
     *
     * Has been realized through ETRF89, ETRF90, ETRF91, ETRF92, ETRF93, ETRF94, ETRF96, ETRF97, ETRF2000, ETRF2005 and
     * ETRF2014. This 'ensemble' covers any or all of these realizations without distinction.
     */
    public const EPSG_EUROPEAN_TERRESTRIAL_REFERENCE_SYSTEM_1989_ENSEMBLE = 6258;

    /**
     * European Vertical Reference Frame 2000
     * Type: vertical
     * Extent: Europe - onshore - Andorra; Austria; Belgium; Bosnia and Herzegovina; Croatia; Czechia; Denmark;
     * Estonia; Finland; France - mainland; Germany; Gibraltar; Hungary; Italy - mainland and Sicily; Latvia;
     * Liechtenstein; Lithuania; Luxembourg; Netherlands; Norway; Poland; Portugal - mainland; Romania; San Marino;
     * Slovakia; Slovenia; Spain - mainland; Sweden; Switzerland; United Kingdom (UK) - Great Britain mainland; Vatican
     * City State.
     * Scope: Geodesy.
     * Height at Normaal Amsterdams Peil (NAP) is zero, defined through height at UELN bench mark 13600 (52°22'53"N
     * 4°54'34"E) of 0.71599m. Datum at NAP is mean high tide in 1684.
     * Realized by geopotential numbers and Normal heights of the United European Levelling Network. Replaced by
     * EVRF2007 (datum code 5215).
     */
    public const EPSG_EUROPEAN_VERTICAL_REFERENCE_FRAME_2000 = 5129;

    /**
     * European Vertical Reference Frame 2000 Austria
     * Type: vertical
     * Extent: Austria.
     * Scope: Geodesy.
     * Geopotential numbers of the EVRF2000 (UELN95/98) node points in Austria converted to orthometric heights using a
     * digital surface model.
     * Geoid surface is smoother than the EVRF2000 quasigeoid.
     */
    public const EPSG_EUROPEAN_VERTICAL_REFERENCE_FRAME_2000_AUSTRIA = 1261;

    /**
     * European Vertical Reference Frame 2007
     * Type: vertical
     * Extent: Europe - onshore - Andorra; Austria; Belgium; Bosnia and Herzegovina; Bulgaria; Croatia; Czechia;
     * Denmark; Estonia; Finland; France - mainland; Germany; Gibraltar, Hungary; Italy - mainland and Sicily; Latvia;
     * Liechtenstein; Lithuania; Luxembourg; Netherlands; Norway; Poland; Portugal - mainland; Romania; San Marino;
     * Slovakia; Slovenia; Spain - mainland; Sweden; Switzerland; United Kingdom (UK) - Great Britain mainland; Vatican
     * City State.
     * Scope: Geodesy.
     * Least squares fit to 13 stations of the EVRF2000 solution.
     * Realized by geopotential numbers and Normal heights of the United European Levelling Network. Replaces EVRF2000
     * (datum code 5129). Replaced by EVRF2019 (datum code 1274).
     */
    public const EPSG_EUROPEAN_VERTICAL_REFERENCE_FRAME_2007 = 5215;

    /**
     * European Vertical Reference Frame 2019
     * Type: vertical
     * Extent: Europe - onshore - Andorra; Austria; Belarus; Belgium; Bosnia and Herzegovina; Bulgaria; Croatia;
     * Czechia; Denmark; Estonia; Finland; France - mainland; Germany; Gibraltar, Hungary; Italy - mainland and Sicily;
     * Latvia; Liechtenstein; Lithuania; Luxembourg; Netherlands; North Macedonia; Norway; Poland; Portugal - mainland;
     * Romania; Russia – west of approximately 60°E; San Marino; Slovakia; Slovenia; Spain - mainland; Sweden;
     * Switzerland; United Kingdom (UK) - Great Britain mainland; Ukraine; Vatican City State.
     * Scope: Geodesy (gravity).
     * Geopotential values of 12 stable stations of the EVRF2007 solution. Reduced to epoch 2000.0 for Nordic countries
     * and Russia using the NKG2016LU_lev uplift model and for Switzerland using CHVRF15 velocities.
     * Following EVRS conventions, EVRF2019 is a zero-tide surface. Replaces EVRF2007 (datum code 5215).
     */
    public const EPSG_EUROPEAN_VERTICAL_REFERENCE_FRAME_2019 = 1274;

    /**
     * European Vertical Reference Frame 2019 mean tide
     * Type: vertical
     * Extent: Europe - onshore - Andorra; Austria; Belarus; Belgium; Bosnia and Herzegovina; Bulgaria; Croatia;
     * Czechia; Denmark; Estonia; Finland; France - mainland; Germany; Gibraltar, Hungary; Italy - mainland and Sicily;
     * Latvia; Liechtenstein; Lithuania; Luxembourg; Netherlands; North Macedonia; Norway; Poland; Portugal - mainland;
     * Romania; Russia – west of approximately 60°E; San Marino; Slovakia; Slovenia; Spain - mainland; Sweden;
     * Switzerland; United Kingdom (UK) - Great Britain mainland; Ukraine; Vatican City State.
     * Scope: Geodesy (GNSS), oceanography.
     * Derived from zero-tide EVRF2019 through Cmean = Czero + (0.28841*sin^2(phi)) + (0.00195*sin^4(phi)) - 0.09722 -
     * 0.08432 kgal.m. The offset of 0.08432 is to force the mean-tide height to equal the zero-tide height at the
     * EVRF2000 origin in Amsterdam.
     * Mean-tide surface, describing how water flows. See EVRF2019 (datum code 1274) for zero-tide surface which is
     * consistent with ETRS conventions.
     */
    public const EPSG_EUROPEAN_VERTICAL_REFERENCE_FRAME_2019_MEAN_TIDE = 1287;

    /**
     * Fahud
     * Type: geodetic
     * Extent: Oman - mainland onshore.
     * Scope: Oil and gas exploration.
     * Fundamental point: Station NO68-024 Fahud. Latitude: 22°17'31.182"N, longitude: 56°29'18.820"E (of Greenwich).
     * Replaced by PSD93 (code 6134).
     */
    public const EPSG_FAHUD = 6232;

    /**
     * Fahud Height Datum
     * Type: vertical
     * Extent: Oman - mainland onshore.
     * Scope: Oil and gas exploration.
     * Single MSL determination at Mina Al Fahal.
     * Based on reciprocal trigonometric heighting. Replaced by PHD93 Datum (code 5123) in 1993.
     */
    public const EPSG_FAHUD_HEIGHT_DATUM = 5124;

    /**
     * Fair Isle
     * Type: vertical
     * Extent: United Kingdom (UK) - Great Britain - Scotland - Fair Isle onshore.
     * Scope: Geodesy, topographic mapping.
     *
     * Orthometric heights.
     */
    public const EPSG_FAIR_ISLE = 5139;

    /**
     * Famagusta 1960
     * Type: vertical
     * Extent: Cyprus - onshore.
     * Scope: Engineering survey, topographic mapping.
     * Mean sea level at Famagusta Harbour.
     * Orthometric heights.
     */
    public const EPSG_FAMAGUSTA_1960 = 1148;

    /**
     * Fao
     * Type: vertical
     * Extent: Iraq - onshore southeast; Iran - onshore northern Gulf coast and west bordering southeast Iraq.
     * Scope: Geodesy, topographic mapping.
     *
     * Established by Hunting Surveys for IPC. In Iran replaced by Bandar Abbas (code 5150). At time of record creation
     * NIOC data in Ahwaz area still usually referenced to Fao. In Iraq replaced by Fao 1979 (code 1028).
     */
    public const EPSG_FAO = 5149;

    /**
     * Fao 1979
     * Type: vertical
     * Extent: Iraq - onshore.
     * Scope: Geodesy, topographic mapping.
     * Average sea level at Fao during two-year period in mid/late 1970s.
     * Levelling network established by Polservice consortium.  Replaces Fao (datum code 5149) in Iraq.
     */
    public const EPSG_FAO_1979 = 1028;

    /**
     * Faroe Datum 1954
     * Type: geodetic
     * Extent: Faroe Islands - onshore.
     * Scope: Geodesy, cadastre, engineering survey, topographic mapping.
     * Astronomical observations at 3 points.
     * Replaced by ED50 in late 1970's for all purposes other than cadastre. Replaced by fk89 for cadastre.
     */
    public const EPSG_FAROE_DATUM_1954 = 6741;

    /**
     * Faroe Islands Vertical Reference 2009
     * Type: vertical
     * Extent: Faroe Islands - onshore.
     * Scope: Engineering survey, topographic mapping.
     *
     * Mean Tidal Height System.
     */
    public const EPSG_FAROE_ISLANDS_VERTICAL_REFERENCE_2009 = 1059;

    /**
     * Fatu Iva 72
     * Type: geodetic
     * Extent: French Polynesia - Marquesas Islands - Fatu Hiva.
     * Scope: Hydrography, topographic mapping.
     * Fundamental point: Latitude: 9°25'58.00"S, longitude: 138°55'06.25"W (of Greenwich).
     * Recomputed by IGN in 1972 using origin and observations of 1953-1955 Mission Hydrographique des Establissements
     * Francais d'Oceanie (MHEFO 55). Replaced by RGPF (datum code 6687).
     */
    public const EPSG_FATU_IVA_72 = 6688;

    /**
     * Fehmarnbelt Datum 2010
     * Type: geodetic
     * Extent: Fehmarnbelt area of Denmark and Germany.
     * Scope: Engineering survey and construction for Fehmarnbelt tunnel.
     * ITRF2005 at epoch 2010.14.
     * Defined through coordinates of four permanant GNSS stations.
     */
    public const EPSG_FEHMARNBELT_DATUM_2010 = 1078;

    /**
     * Fehmarnbelt Vertical Reference 2010
     * Type: vertical
     * Extent: Fehmarnbelt area of Denmark and Germany.
     * Scope: Engineering survey and construction for Fehmarnbelt tunnel.
     * Realised by precise levelling between tide gauges at Marienleuchte (Germany), Rodbyhavn (Denmark) and four
     * Fehmarnbelt project GNSS stations.
     */
    public const EPSG_FEHMARNBELT_VERTICAL_REFERENCE_2010 = 1079;

    /**
     * Fiji 1956
     * Type: geodetic
     * Extent: Fiji - onshore - Vanua Levu, Taveuni, Viti Levu and and immediately adjacent smaller islands of Yasawa
     * and Kandavu groups.
     * Scope: Military survey.
     * Latitude origin was obtained astronomically at station Rasusuva = 17°49'03.13"S,  longitude origin was obtained
     * astronomically at station Suva = 178°25'35.835"E (of Greenwich).
     * For topographic mapping replaces Viti Levu 1912 and Vanua Levu 1915. Replaced by Fiji Geodetic Datum 1986.
     */
    public const EPSG_FIJI_1956 = 6721;

    /**
     * Fiji Geodetic Datum 1986
     * Type: geodetic
     * Extent: Fiji - onshore. Includes Viti Levu, Vanua Levu, Taveuni, the Yasawa Group, the Kadavu Group, the Lau
     * Islands and Rotuma Islands.
     * Scope: Geodesy, cadastre, engineering survey, topographic mapping.
     * NWL 9D coordinates of 6 stations on Vitu Levu and Vanua Levu.
     * Replaces Viti Levu 1912, Vanua Levu 1915 and Fiji 1956.
     */
    public const EPSG_FIJI_GEODETIC_DATUM_1986 = 6720;

    /**
     * Final Datum 1958
     * Type: geodetic
     * Extent: Iran - Arwaz area and onshore Gulf coast west of 54°E, Lavan Island, offshore Balal field and South
     * Pars blocks 2 and 3.
     * Scope: Oil and gas exploration.
     * Fundamental point: Maniyur.  Latitude: 31°23'59.19"N, longitude: 48°32'31.38"E (of Greenwich).
     * Network included in Nahrwan 1967 adjustment.
     */
    public const EPSG_FINAL_DATUM_1958 = 6132;

    /**
     * Flannan Isles
     * Type: vertical
     * Extent: United Kingdom (UK) - Great Britain - Scotland - Flannan Isles onshore.
     * Scope: Geodesy, topographic mapping.
     *
     * Orthometric heights.
     */
    public const EPSG_FLANNAN_ISLES = 5146;

    /**
     * Fort Marigot
     * Type: geodetic
     * Extent: Guadeloupe - onshore - St Martin and St Barthélemy islands.
     * Scope: Geodesy, cadastre, engineering survey, topographic mapping.
     *
     * Replaced by RRAF 1991 (datum code 1047).
     */
    public const EPSG_FORT_MARIGOT = 6621;

    /**
     * Foula
     * Type: vertical
     * Extent: United Kingdom (UK) - Great Britain - Scotland - Foula onshore.
     * Scope: Geodesy, topographic mapping.
     *
     * Orthometric heights.
     */
    public const EPSG_FOULA = 5141;

    /**
     * Fuerteventura
     * Type: vertical
     * Extent: Spain - Canary Islands - Fuerteventura onshore.
     * Scope: Geodesy, engineering survey, topographic mapping.
     * Mean Sea Level at Puerto del Rosario harbour between 1999-09-08 and 2000-12-31.
     * Orthometric heights.
     */
    public const EPSG_FUERTEVENTURA = 1279;

    /**
     * GBK19 Intermediate Reference Frame
     * Type: geodetic
     * Extent: UK - on or related to the rail route from Glasgow via Barrhead to Kilmarnock and the branch to East
     * Kilbride.
     * Scope: Engineering survey and topographic mapping for railway applications.
     * Defined through the application of the GBK19 NTv2 transformation (code 9454) to ETRS89 as realized through OSNet
     * v2009 CORS.
     * Created in 2020 to support intermediate CRS "GBK19-IRF" in the emulation of the combined GBK19 Snake map
     * projection.
     */
    public const EPSG_GBK19_INTERMEDIATE_REFERENCE_FRAME = 1289;

    /**
     * Gambia
     * Type: geodetic
     * Extent: Gambia - onshore.
     * Scope: Topographic mapping.
     */
    public const EPSG_GAMBIA = 1139;

    /**
     * Gan 1970
     * Type: geodetic
     * Extent: Maldives - onshore.
     * Scope: Topographic mapping.
     *
     * In some references incorrectly named "Gandajika 1970". See datum code 6685.
     */
    public const EPSG_GAN_1970 = 6684;

    /**
     * Garoua
     * Type: geodetic
     * Extent: Cameroon - Garoua area.
     * Scope: Topographic mapping.
     * Fundamental point: IGN astronomical station and benchmark no. 16 at Tongo. Latitude 8°55'08.74"N, longitude
     * 13°30'43.19"E (of Greenwich).
     */
    public const EPSG_GAROUA = 6197;

    /**
     * Gebrauchshohen ADRIA
     * Type: vertical
     * Extent: Austria.
     * Scope: Geodesy, engineering survey, topographic mapping.
     * Reference point Hutbiegl defined relative to mean sea level at Trieste in 1875.
     * Normal-orthometric heights.
     */
    public const EPSG_GEBRAUCHSHOHEN_ADRIA = 5176;

    /**
     * Genoa
     * Type: vertical
     * Extent: Italy - mainland (including San Marino and Vatican City State) and Sicily.
     * Scope: Geodesy, engineering survey, topographic mapping.
     *
     * Orthometric heights.
     */
    public const EPSG_GENOA = 1051;

    /**
     * Geocentric Datum Brunei Darussalam 2009
     * Type: geodetic
     * Extent: Brunei Darussalam - onshore and offshore.
     * Scope: Geodesy.
     * ITRF2005 at epoch 2009.45
     * Replaces use of Timbalai from July 2009.
     */
    public const EPSG_GEOCENTRIC_DATUM_BRUNEI_DARUSSALAM_2009 = 1056;

    /**
     * Geocentric Datum of Australia 1994
     * Type: geodetic
     * Extent: Australia including Lord Howe Island, Macquarie Islands, Ashmore and Cartier Islands, Christmas Island,
     * Cocos (Keeling) Islands, Norfolk Island. All onshore and offshore.
     * Scope: Geodesy, topographic mapping.
     * ITRF92 at epoch 1994.0.
     * Coincident with WGS84 to within 1 metre.
     */
    public const EPSG_GEOCENTRIC_DATUM_OF_AUSTRALIA_1994 = 6283;

    /**
     * Geocentric Datum of Australia 2020
     * Type: geodetic
     * Extent: Australia including Lord Howe Island, Macquarie Islands, Ashmore and Cartier Islands, Christmas Island,
     * Cocos (Keeling) Islands, Norfolk Island. All onshore and offshore.
     * Scope: Geodesy, cadastre, engineering survey, topographic mapping.
     * ITRF2014 at epoch 2020.0.
     */
    public const EPSG_GEOCENTRIC_DATUM_OF_AUSTRALIA_2020 = 1168;

    /**
     * Geocentric datum of Korea
     * Type: geodetic
     * Extent: Republic of Korea (South Korea) - onshore and offshore.
     * Scope: Geodesy.
     * ITRF2000 at epoch 2002.0.
     */
    public const EPSG_GEOCENTRIC_DATUM_OF_KOREA = 6737;

    /**
     * Geodetic Datum of 1965
     * Type: geodetic
     * Extent: Ireland - onshore. United Kingdom (UK) - Northern Ireland (Ulster) - onshore.
     * Scope: Geodesy, engineering survey, topographic mapping.
     * Adjusted to best mean fit 9 stations of the OSNI 1952 primary adjustment in Northern Ireland plus the 1965
     * values of 3 stations in the Republic of Ireland.
     * Differences from the 1965 adjustment (datum code 6299) are: average difference in Eastings 0.092m; average
     * difference in Northings 0.108m; maximum vector difference 0.548m.
     */
    public const EPSG_GEODETIC_DATUM_OF_1965 = 6300;

    /**
     * Geodetic Datum of Malaysia 2000
     * Type: geodetic
     * Extent: Malaysia - onshore and offshore. Includes peninsular Malayasia, Sabah and Sarawak.
     * Scope: Geodesy, cadastre, engineering survey, topographic mapping.
     * ITRF2000, epoch 2000.0.
     * Replaces all older Malaysian datums.
     */
    public const EPSG_GEODETIC_DATUM_OF_MALAYSIA_2000 = 6742;

    /**
     * Geodezicheskaya Sistema Koordinat 2011
     * Type: geodetic
     * Extent: Russian Federation - onshore and offshore.
     * Scope: Geodesy.
     * Coordinates of the Russian fundamental astronomic-geodetic network (about 50 stations) at epoch 2011.0.
     */
    public const EPSG_GEODEZICHESKAYA_SISTEMA_KOORDINAT_2011 = 1159;

    /**
     * Gisborne 1926
     * Type: vertical
     * Extent: New Zealand - North Island - Gisborne vertical CRS area.
     * Scope: Geodesy, engineering survey, topographic mapping.
     * MSL at Gisborne harbour 1926.
     */
    public const EPSG_GISBORNE_1926 = 5160;

    /**
     * Gran Canaria
     * Type: vertical
     * Extent: Spain - Canary Islands - Gran Canaria onshore.
     * Scope: Geodesy, engineering survey, topographic mapping.
     * Mean Sea Level at Las Palmas de Gran Canaria harbour between 1992 and 1997.
     * Orthometric heights.
     */
    public const EPSG_GRAN_CANARIA = 1280;

    /**
     * Grand Cayman Geodetic Datum 1959
     * Type: geodetic
     * Extent: Cayman Islands - Grand Cayman.
     * Scope: Geodesy, cadastre, engineering survey, topographic mapping.
     * Fundamental point: GC1. Latitude: 19°17'54.43"N, longitude: 81°22'37.17"W (of Greenwich).
     * Replaced by CIGD11 (datum code 1100).
     */
    public const EPSG_GRAND_CAYMAN_GEODETIC_DATUM_1959 = 6723;

    /**
     * Grand Cayman Vertical Datum 1954
     * Type: vertical
     * Extent: Cayman Islands - Grand Cayman.
     * Scope: Geodesy, topographic mapping.
     */
    public const EPSG_GRAND_CAYMAN_VERTICAL_DATUM_1954 = 1097;

    /**
     * Grand Comoros
     * Type: geodetic
     * Extent: Comoros - Njazidja (Grande Comore).
     * Scope: Geodesy, cadastre, engineering survey, topographic mapping.
     * Fundamental point: M'Tsaoueni.  Latitude: 11°28'32.200"S, longitude: 43°15'42.315"E (of Greenwich).
     */
    public const EPSG_GRAND_COMOROS = 6646;

    /**
     * Greek
     * Type: geodetic
     * Extent: Greece - onshore.
     * Scope: Topographic mapping.
     * Fundamental point: Athens Observatory. Latitude 37°58'20.132"N, longitude 23°42'58.815"E (of Greenwich)
     * See geodetic datum alias 6404.  Used as basis of topographic mapping based on Hatt projection. Replaced by
     * GGRS87 (code 6121).
     */
    public const EPSG_GREEK = 6120;

    /**
     * Greek (Athens)
     * Type: geodetic
     * Extent: Greece - onshore.
     * Scope: Topographic mapping.
     * Fundamental point: Athens Observatory. Latitude 37°58'20.132"N, longitude 0°E (of Athens).
     * See geodetic datum alias 6404.  Used as basis of topographic mapping based on Hatt projection.
     */
    public const EPSG_GREEK_ATHENS = 6815;

    /**
     * Greek Geodetic Reference System 1987
     * Type: geodetic
     * Extent: Greece - onshore.
     * Scope: Topographic mapping.
     * Fundamental point: Dionysos. Latitude 38°04'33.8"N, longitude 23°55'51.0"E of Greenwich; geoid height 7.0 m.
     * Replaced (old) Greek datum.  Oil industry work based on ED50.
     */
    public const EPSG_GREEK_GEODETIC_REFERENCE_SYSTEM_1987 = 6121;

    /**
     * Greenland  Vertical Reference 2000
     * Type: vertical
     * Extent: Greenland - onshore and offshore between 59°N and 84°N and west of 10°W.
     * Scope: Topographic mapping.
     * Defined through the gravimetric geoid 2000 model locally aligned with MSL at a number of sites.
     * Orthometric heights. Replaced by GVR2016.
     */
    public const EPSG_GREENLAND_VERTICAL_REFERENCE_2000 = 1199;

    /**
     * Greenland 1996
     * Type: geodetic
     * Extent: Greenland - onshore and offshore.
     * Scope: Geodesy, cadastre, engineering survey, topographic mapping.
     * ITRF94 at epoch 1996.62
     * Replaces Ammassalik 1958, Qornoq 1927 and Scoresbysund 1952.
     */
    public const EPSG_GREENLAND_1996 = 6747;

    /**
     * Greenland Vertical Reference 2016
     * Type: vertical
     * Extent: Greenland - onshore and offshore between 58°N and 85°N and west of 7°W.
     * Scope: Topographic mapping.
     * Defined through the gravimetric geoid 2016 model locally aligned to MSL as measured at Nuuk during the 1960s.
     * Orthometric heights. Replaces GVR2000.
     */
    public const EPSG_GREENLAND_VERTICAL_REFERENCE_2016 = 1200;

    /**
     * Grenada 1953
     * Type: geodetic
     * Extent: Grenada and southern Grenadine Islands - onshore.
     * Scope: Topographic mapping.
     * Fundamental point: station GS8, Sante Marie.
     */
    public const EPSG_GRENADA_1953 = 6603;

    /**
     * Guadeloupe 1948
     * Type: geodetic
     * Extent: Guadeloupe - onshore - Basse-Terre, Grande-Terre, La Desirade, Marie-Galante, Les Saintes.
     * Scope: Geodesy, cadastre, engineering survey, topographic mapping.
     *
     * Replaced by RRAF 1991 (datum code 1047).
     */
    public const EPSG_GUADELOUPE_1948 = 6622;

    /**
     * Guadeloupe 1951
     * Type: vertical
     * Extent: Guadeloupe - onshore - Basse-Terre and Grande-Terre.
     * Scope: Geodesy, engineering survey, topographic mapping.
     * Mean sea level July 1947 to June 1948 at Pointe-Fouillole (Pointe-à-Pitre harbour). Origin = marker AO'-12 with
     * height of 1.917m above msl.
     * Orthometric heights. Replaced by Guadeloupe 1988 (datum code 5155). Guadeloupe 1951 height 0.00m is 0.629m above
     * 1947-48 sounding datum.
     */
    public const EPSG_GUADELOUPE_1951 = 5193;

    /**
     * Guadeloupe 1988
     * Type: vertical
     * Extent: Guadeloupe - onshore - Basse-Terre and Grande-Terre.
     * Scope: Geodesy, engineering survey, topographic mapping.
     * Mean sea level July 1947 to June 1948 at Pointe-Fouillole (Pointe-à-Pitre harbour). Origin = marker GO-7
     * (formerly AO'-5) with defined height of 2.67m above msl adopted from 1951 value. Guadeloupe 1988 height 0.00m is
     * 0.46m above 1984 sounding datum.
     * Orthometric heights. Replaces Guadeloupe 1951 (datum code 5193).
     */
    public const EPSG_GUADELOUPE_1988 = 5155;

    /**
     * Guam 1963
     * Type: geodetic
     * Extent: Guam - onshore. Northern Mariana Islands - onshore.
     * Scope: Topographic mapping.
     * Fundamental point: Tagcha. Latitude: 13°22'38.49"N, longitude: 144°45'51.56"E (of Greenwich).
     * Replaced by NAD83(HARN).
     */
    public const EPSG_GUAM_1963 = 6675;

    /**
     * Guam Vertical Datum of 1963
     * Type: vertical
     * Extent: Guam - onshore.
     * Scope: Geodesy, topographic mapping.
     * Mean sea level at Apra harbor, Guam, 1949-1962. Benchmark NO 5 1949 = 0.599m.
     * Replaced by Guam vertical datum of 2004 (datum code 1126).
     */
    public const EPSG_GUAM_VERTICAL_DATUM_OF_1963 = 1122;

    /**
     * Guam Vertical Datum of 2004
     * Type: vertical
     * Extent: Guam - onshore.
     * Scope: Geodesy, topographic mapping.
     * Mean sea level at Apra harbor, Guam. Benchmark 1630000 TIDAL 4 = 2.170m relative to US National Tidal Datum
     * Epoch 1983-2001. MSL is 0.419m above MLLW and the BM is 2.589m above MLLW.
     * Replaces Guam Vertical Datum of 1963 (datum code 1122).
     */
    public const EPSG_GUAM_VERTICAL_DATUM_OF_2004 = 1126;

    /**
     * Gulshan 303
     * Type: geodetic
     * Extent: Bangladesh - onshore and offshore.
     * Scope: Geodesy, cadastre, engineering survey, topographic mapping.
     * Gulshan garden, Dhaka.
     * Network of more than 140 control points observed and adjusted in 1995 by Japan International Cooperation Agency
     * (JICA).
     */
    public const EPSG_GULSHAN_303 = 6682;

    /**
     * Gunung Segara
     * Type: geodetic
     * Extent: Indonesia - Kalimantan - onshore east coastal area including Mahakam delta coastal and offshore shelf
     * areas.
     * Scope: Topographic mapping.
     * Station P5 (Gunung Segara). Latitude 0°32'12.83"S, longitude 117°08'48.47"E (of Greenwich).
     */
    public const EPSG_GUNUNG_SEGARA = 6613;

    /**
     * Gunung Segara (Jakarta)
     * Type: geodetic
     * Extent: Indonesia - Kalimantan - onshore east coastal area including Mahakam delta coastal and offshore shelf
     * areas.
     * Scope: Topographic mapping.
     * Station P5 (Gunung Segara) 0°32'12.83"S, 117°08'48.47"E (of Greenwich). Longitude 8°20'20.68"E (of Jakarta).
     */
    public const EPSG_GUNUNG_SEGARA_JAKARTA = 6820;

    /**
     * Gusterberg (Ferro)
     * Type: geodetic
     * Extent: Austria - Upper Austria and Salzburg provinces. Czechia - Bohemia.
     * Scope: Cadastre.
     * Fundamental point: Gusterberg. Latitude: 48°02'18.47"N, longitude: 31°48'15.05"E (of Ferro).
     */
    public const EPSG_GUSTERBERG_FERRO = 1188;

    /**
     * HS2 Intermediate Reference Frame
     * Type: geodetic
     * Extent: UK - HS2 phases 1 and 2a railway corridor from London to Birmingham, Lichfield and Crewe.
     * Scope: Engineering survey for HS2 project phases 1 and 2a.
     * Defined through application of the HS2TN02 transformation to ETRS89 as realized through OSNet v2001 CORS.
     * Subsequently realized through application of the HS2TN15 transformation to ETRS89 as realized through OSNet
     * v2009 CORS.
     * Created to support intermediate CRS "HS2-IRF" in the emulation of the HS2P1+14 Snake map projection.
     */
    public const EPSG_HS2_INTERMEDIATE_REFERENCE_FRAME = 1264;

    /**
     * HS2 Vertical Reference Frame
     * Type: vertical
     * Extent: UK - HS2 phases 1 and 2a railway corridor from London to Birmingham, Lichfield and Crewe.
     * Scope: Engineering survey for HS2 project phases 1 and 2a.
     * Equivalent to Ordnance Datum Newlyn as realized through OSNet v2001 and OSGM02.
     * After introduction of OSNet v2009 CORS, OSTN15 and the OSGM15 geoid model, the HS2 VRF is maintained equivalent
     * to OSNet v2001 and OSGM02 through HS2GM15 (code 9304).
     */
    public const EPSG_HS2_VERTICAL_REFERENCE_FRAME = 1265;

    /**
     * Ha Tien 1960
     * Type: vertical
     * Extent: Cambodia - mainland onshore; Vietnam - mainland onshore.
     * Scope: Geodesy, topographic mapping.
     *
     * In Vietnam replaced by Hon Dau in 1992.
     */
    public const EPSG_HA_TIEN_1960 = 5125;

    /**
     * Hanoi 1972
     * Type: geodetic
     * Extent: Vietnam - onshore.
     * Scope: Geodesy, cadastre, engineering survey, topographic mapping.
     */
    public const EPSG_HANOI_1972 = 6147;

    /**
     * Hartebeesthoek94
     * Type: geodetic
     * Extent: Eswatini (Swaziland); Lesotho; South Africa - onshore and offshore.
     * Scope: Geodesy, cadastre, engineering survey, topographic mapping.
     * Coincident with ITRF91 at epoch 1994.0 at Hartebeesthoek astronomical observatory near Pretoria.
     * Replaces Cape datum (code 6222).
     */
    public const EPSG_HARTEBEESTHOEK94 = 6148;

    /**
     * Helle 1954
     * Type: geodetic
     * Extent: Jan Mayen - onshore.
     * Scope: Geodesy, topographic mapping.
     */
    public const EPSG_HELLE_1954 = 6660;

    /**
     * Helsinki 1943
     * Type: vertical
     * Extent: Finland - onshore mainland south of approximately 66°N.
     * Scope: Geodesy, topographic mapping.
     * MSL at Helsinki during 1943.
     * Uses orthometric heights. Effect of the land uplift during the 2nd national  levelling was not taken into
     * account. Replaced by N60 (datum code 5116).
     */
    public const EPSG_HELSINKI_1943 = 1213;

    /**
     * Helsinki 1960
     * Type: vertical
     * Extent: Finland - onshore.
     * Scope: Geodesy, topographic mapping.
     * MSL at Helsinki during 1960.
     * Uses orthometric heights. Replaced by N2000 (datum code 1030).
     */
    public const EPSG_HELSINKI_1960 = 5116;

    /**
     * Herat North
     * Type: geodetic
     * Extent: Afghanistan.
     * Scope: Topographic mapping.
     * Fundamental point: Herat North. Latitude: 34°23'09.08"N, longitude: 64°10'58.94"E (of Greenwich).
     */
    public const EPSG_HERAT_NORTH = 6255;

    /**
     * High Water
     * Type: vertical
     * Extent: World.
     * Scope: Hydrography and nautical charting.
     * The highest level reached at a place by the water surface in one tidal cycle. When used on inland (non-tidal)
     * waters it is generally defined as a level which the daily mean water level exceeds less than 5% of the time.
     * Users are advised to not use this generic vertical datum but to define explicit realizations of high water by
     * specifying location and epoch, for instance "High water at xxx during yyyy-yyyy".
     */
    public const EPSG_HIGH_WATER = 1094;

    /**
     * Higher High Water Large Tide
     * Type: vertical
     * Extent: World.
     * Scope: Hydrography and nautical charting.
     * The average of the highest high waters, one from each of 19 years of observations.
     * Users are advised to not use this generic vertical datum but to define explicit realizations of HHWLT by
     * specifying location and epoch, for instance "HHWLT at xxx during yyyy-yyyy".
     */
    public const EPSG_HIGHER_HIGH_WATER_LARGE_TIDE = 1084;

    /**
     * Highest Astronomical Tide
     * Type: vertical
     * Extent: World.
     * Scope: Hydrography and nautical charting.
     * The highest tide level which can be predicted to occur under average meterological conditions and under any
     * combination of astronomical conditions.
     * Users are advised to not use this generic vertical datum but to define explicit realizations of HAT by
     * specifying location and epoch, for instance "HAT at xxx during yyyy-yyyy".
     */
    public const EPSG_HIGHEST_ASTRONOMICAL_TIDE = 1082;

    /**
     * Hito XVIII 1963
     * Type: geodetic
     * Extent: Chile - Tierra del Fuego, onshore; Argentina - Tierra del Fuego, onshore and offshore Atlantic west of
     * 66°W.
     * Scope: Geodesy.
     * Chile-Argentina boundary survey.
     * Used in Tierra del Fuego.
     */
    public const EPSG_HITO_XVIII_1963 = 6254;

    /**
     * Hjorsey 1955
     * Type: geodetic
     * Extent: Iceland - onshore.
     * Scope: Topographic mapping (1:50,000).
     * Fundamental point:  Latitude: 64°31'29.26"N, longitude: 22°22'05.84"W (of Greenwich).
     */
    public const EPSG_HJORSEY_1955 = 6658;

    /**
     * Hon Dau 1992
     * Type: vertical
     * Extent: Vietnam - mainland onshore.
     * Scope: Geodesy, topographic mapping.
     *
     * Replaces Ha Tien in Vietnam.
     */
    public const EPSG_HON_DAU_1992 = 5126;

    /**
     * Hong Kong 1963
     * Type: geodetic
     * Extent: China - Hong Kong - onshore and offshore.
     * Scope: Hydrography, topographic mapping.
     * Fundamental point: Trig "Zero", 38.4 feet south along the transit circle of the Kowloon Observatory. Latitude
     * 22°18'12.82"N, longitude 114°10'18.75"E (of Greenwich).
     * Replaced by Hong Kong 1963(67) for military purposes only in 1967.  Replaced by Hong Kong 1980.
     */
    public const EPSG_HONG_KONG_1963 = 6738;

    /**
     * Hong Kong 1963(67)
     * Type: geodetic
     * Extent: China - Hong Kong - onshore and offshore.
     * Scope: Military survey.
     * Fundamental point: Trig "Zero", 38.4 feet south along the transit circle of the Kowloon Observatory. Latitude
     * 22°18'12.82"N, longitude 114°10'18.75"E (of Greenwich).
     * Replaces Hong Kong 1963 for military purposes only in 1967.  Replaced by Hong Kong 1980.
     */
    public const EPSG_HONG_KONG_1963_67 = 6739;

    /**
     * Hong Kong 1980
     * Type: geodetic
     * Extent: China - Hong Kong - onshore and offshore.
     * Scope: Geodesy, cadastre, engineering survey, topographic mapping.
     * Fundamental point: Trig "Zero", 38.4 feet south along the transit circle of the Kowloon Observatory. Latitude
     * 22°18'12.82"N, longitude 114°10'18.75"E (of Greenwich).
     * Replaces Hong Kong 1963 and Hong Kong 1963(67).
     */
    public const EPSG_HONG_KONG_1980 = 6611;

    /**
     * Hong Kong Chart Datum
     * Type: vertical
     * Extent: China - Hong Kong - offshore.
     * Scope: Hydrography and nautical charting.
     * Approximates to Lowest Astronomic Tide level (LAT).
     * Chart datum is 0.15 metres below Hong Kong Principal Datum (code 5135) and 1.38m below MSL at Quarry Bay.
     */
    public const EPSG_HONG_KONG_CHART_DATUM = 5136;

    /**
     * Hong Kong Geodetic
     * Type: geodetic
     * Extent: China - Hong Kong - onshore and offshore.
     * Scope: Geodesy.
     * ITRF96 at epoch 1998.33
     * Locally sometimes referred to as ITRF96 or WGS 84, these are not strictly correct as it applies only at epoch
     * 1998.33 and ignores subsequent tectonic plate motion.
     */
    public const EPSG_HONG_KONG_GEODETIC = 1209;

    /**
     * Hong Kong Principal Datum
     * Type: vertical
     * Extent: China - Hong Kong - onshore.
     * Scope: Geodesy, cadastre, engineering survey.
     * 1.23m below the mean of 19 years (1965-83) observations of tide levels at North Point, Victoria Harbour.
     */
    public const EPSG_HONG_KONG_PRINCIPAL_DATUM = 5135;

    /**
     * Horta
     * Type: vertical
     * Extent: Portugal - central Azores - Faial island onshore.
     * Scope: Geodesy, engineering survey, topographic mapping.
     * Mean Sea Level during 1935 at Horta.
     * Orthometric heights.
     */
    public const EPSG_HORTA = 1104;

    /**
     * Hu Tzu Shan 1950
     * Type: geodetic
     * Extent: Taiwan, Republic of China - onshore - Taiwan Island, Penghu (Pescadores) Islands.
     * Scope: Topographic mapping.
     * Fundamental point: Hu Tzu Shan. Latitude: 23°58'32.34"N, longitude: 120°58'25.975"E (of Greenwich).
     */
    public const EPSG_HU_TZU_SHAN_1950 = 6236;

    /**
     * Huahine SAU 2001
     * Type: vertical
     * Extent: French Polynesia - Society Islands - Huahine.
     * Scope: Geodesy, engineering survey, topographic mapping.
     * Fundamental benchmark: SHOM B3
     * Included as part of NGPF - see datum code 5195.
     */
    public const EPSG_HUAHINE_SAU_2001 = 5200;

    /**
     * Hungarian Datum 1909
     * Type: geodetic
     * Extent: Hungary.
     * Scope: Topographic mapping.
     * Fundamental point not given in information source, but presumably Szolohegy which is origin of later HD72.
     * Replaced earlier HD1863 adjustment also on Bessel ellipsoid. Both HD1863 and HD1909 were originally on Ferro
     * Prime Meridian but subsequently converted to Greenwich. Replaced by HD72 (datum code 6237).
     */
    public const EPSG_HUNGARIAN_DATUM_1909 = 1024;

    /**
     * Hungarian Datum 1972
     * Type: geodetic
     * Extent: Hungary.
     * Scope: Topographic mapping.
     * Fundamental point: Szolohegy. Latitude: 47°17'32,6156"N, longitude 19°36'09.9865"E (of Greenwich); geoid
     * height 6.56m.
     * Replaced Hungarian Datum 1909 (EPSG datum code 1024).
     */
    public const EPSG_HUNGARIAN_DATUM_1972 = 6237;

    /**
     * IG05 Intermediate Datum
     * Type: geodetic
     * Extent: Israel - onshore; Palestine Territory - onshore.
     * Scope: Intermediate stage in transformations - not used otherwise.
     * Defined by transformation from IGD05 at epoch 2004.75.
     */
    public const EPSG_IG05_INTERMEDIATE_DATUM = 1142;

    /**
     * IG05/12 Intermediate Datum
     * Type: geodetic
     * Extent: Israel - onshore; Palestine Territory - onshore.
     * Scope: Intermediate stage in transformations - not used otherwise.
     * Defined by transformation from IGD05/12 at epoch 2012.00.
     */
    public const EPSG_IG05_12_INTERMEDIATE_DATUM = 1144;

    /**
     * IGC 1962 Arc of the 6th Parallel South
     * Type: geodetic
     * Extent: The Democratic Republic of the Congo (Zaire) - adjacent to 6th parallel south traverse.
     * Scope: Geodesy, cadastre, engineering survey, topographic mapping.
     * Coordinates of 3 stations determined with respect to Arc 1950: Mulungu 4°47'39.2325"S, 29°59'37.5864"E;
     * Nyakawembe 4°14'57.3618"S, 29°42'52.8032"E; Kavula 4°35'15.8634"S, 29°41'14.2693"E (all longitude w.r.t.
     * Greenwich).
     */
    public const EPSG_IGC_1962_ARC_OF_THE_6TH_PARALLEL_SOUTH = 6697;

    /**
     * IGN 1962 Kerguelen
     * Type: geodetic
     * Extent: French Southern Territories - Kerguelen onshore.
     * Scope: Geodesy, cadastre, engineering survey, topographic mapping.
     * K0 1949.
     */
    public const EPSG_IGN_1962_KERGUELEN = 6698;

    /**
     * IGN 1966
     * Type: vertical
     * Extent: French Polynesia - Society Islands - Tahiti.
     * Scope: Geodesy, engineering survey, topographic mapping.
     * Fundamental benchmark: RN501
     * Included as part of NGPF - see datum code 5195.
     */
    public const EPSG_IGN_1966 = 5196;

    /**
     * IGN 1988 LS
     * Type: vertical
     * Extent: Guadeloupe - onshore - Les Saintes.
     * Scope: Geodesy, engineering survey, topographic mapping.
     * Mean sea level 1984 at Terre de Haut. Origin = marker O de -5 with defined height of 1.441m above msl. IGN 1988
     * LS height 0.00m is 0.46m above 1987 sounding datum; this approximately corresponds with msl at Pointe-à-Pitre
     * (see datum code 5155, CRS 5757).
     * Orthometric heights.
     */
    public const EPSG_IGN_1988_LS = 5210;

    /**
     * IGN 1988 MG
     * Type: vertical
     * Extent: Guadeloupe - onshore - Marie-Galante.
     * Scope: Geodesy, engineering survey, topographic mapping.
     * Mean sea level 1987 at Grand-Bourg. Origin = marker M0-I with defined height of 0.832m above msl. IGN 1988 MG
     * height 0.00m is 0.46m above 1987 sounding datum; this approximately corresponds with msl at Pointe-à-Pitre (see
     * datum code 5155, CRS code 5757).
     * Orthometric heights.
     */
    public const EPSG_IGN_1988_MG = 5211;

    /**
     * IGN 1988 SB
     * Type: vertical
     * Extent: Guadeloupe - onshore - St Barthelemy island.
     * Scope: Geodesy, engineering survey, topographic mapping.
     * Mean sea level 1988 at port of Gustavia. Origin = marker A.ef-2 with defined height of 0.621m above msl. IGN
     * 1988 SB height 0.00m deduced to be 0.201m above mean sea level at Pointe-à-Pitre.
     * Orthometric heights.
     */
    public const EPSG_IGN_1988_SB = 5213;

    /**
     * IGN 1988 SM
     * Type: vertical
     * Extent: Guadeloupe - onshore - St Martin island.
     * Scope: Geodesy, engineering survey, topographic mapping.
     * Mean sea level 1949-1950 deduced at Fort Marigot. Origin = marker AS-13 with defined height of 6.990m above msl.
     * IGN 1988 SM height 0.00m deduced to be 0.41m above sounding datum.
     * Orthometric heights.
     */
    public const EPSG_IGN_1988_SM = 5214;

    /**
     * IGN 1992 LD
     * Type: vertical
     * Extent: Guadeloupe - onshore - La Desirade.
     * Scope: Geodesy, engineering survey, topographic mapping.
     * Mean sea level at Pointe-à-Pitre. Origin = marker A with defined height of 0.792m above msl. IGN 1992 LD height
     * 0.00m is 0.629m above sounding datum at Pointe-à-Pitre.
     * Orthometric heights. Replaced by IGN 2008 LD (datum code 1250).
     */
    public const EPSG_IGN_1992_LD = 5212;

    /**
     * IGN 2008 LD
     * Type: vertical
     * Extent: Guadeloupe - onshore - La Desirade.
     * Scope: Geodesy, engineering survey, topographic mapping.
     * Mean sea level at Pointe-à-Pitre. Origin = IGN Marker 20A with defined height of 0.50 m above msl of 1987.
     * Orthometric heights. Replaces IGN 1992 LD (datum code 5212).
     */
    public const EPSG_IGN_2008_LD = 1250;

    /**
     * IGN Astro 1960
     * Type: geodetic
     * Extent: Mauritania - onshore.
     * Scope: Topographic mapping (small scale).
     * Realised through a set of independent astronomically-positioned points.
     * Observed during 1959-1960. Independent points not connected through a network. Relative accuracy estimated at
     * 50-100m. Replaced by Mauritania 1999 (datum code 6702).
     */
    public const EPSG_IGN_ASTRO_1960 = 6700;

    /**
     * IGN53 Mare
     * Type: geodetic
     * Extent: New Caledonia - Loyalty Islands - Mare.
     * Scope: Geodesy, cadastre, engineering survey, topographic mapping.
     * South-east end of the La Roche base.
     */
    public const EPSG_IGN53_MARE = 6641;

    /**
     * IGN56 Lifou
     * Type: geodetic
     * Extent: New Caledonia - Loyalty Islands - Lifou.
     * Scope: Geodesy, cadastre, engineering survey, topographic mapping.
     * South end of the Goume base.
     */
    public const EPSG_IGN56_LIFOU = 6633;

    /**
     * IGN63 Hiva Oa
     * Type: geodetic
     * Extent: French Polynesia - Marquesas Islands - Hiva Oa and Tahuata.
     * Scope: Hydrography, topographic mapping.
     * Fundamental point: Atuona. Latitude: 9°48'27.20"S, longitude: 139°02'15.45"W (of Greenwich).
     * Replaced by RGPF (datum code 6687).
     */
    public const EPSG_IGN63_HIVA_OA = 6689;

    /**
     * IGN72 Grande Terre
     * Type: geodetic
     * Extent: New Caledonia - Grande Terre.
     * Scope: Geodesy, cadastre, engineering survey, topographic mapping.
     * North end of Gomen base.
     */
    public const EPSG_IGN72_GRANDE_TERRE = 6634;

    /**
     * IGN72 Nuku Hiva
     * Type: geodetic
     * Extent: French Polynesia - Marquesas Islands - Nuku Hiva, Ua Huka and Ua Pou.
     * Scope: Geodesy, cadastre, engineering survey, topographic mapping.
     * Fundamental point: Taiohae. Latitude: 8°55'03.97"S, longitude: 140°05'36.24"W (of Greenwich).
     * Replaced by RGPF (datum code 6687).
     */
    public const EPSG_IGN72_NUKU_HIVA = 6630;

    /**
     * IGS00
     * Type: dynamic geodetic
     * Extent: World.
     * Scope: Geodesy.
     * Derived from ITRF2000 at epoch 1998.00 through a subset of 54 stable IGS station coordinates. Preserves the ITRF
     * origin, orientation and scale, but without any distortions introduced from non-GNSS space-geodetic techniques.
     * Used for IGS products from GPS week 1143 through GPS week 1252 (2001-12-02 through 2004-01-10). Replaces IGS97,
     * replaced by IGb00. For all practical purposes coincident with ITRF2000.
     */
    public const EPSG_IGS00 = 1245;

    /**
     * IGS05
     * Type: dynamic geodetic
     * Extent: World.
     * Scope: Geodesy.
     * Derived from ITRF2005 at epoch 2000.00 through a subset of 139 stable IGS station coordinates. Preserves the
     * ITRF origin, orientation and scale, but without any distortions introduced from non-GNSS space-geodetic
     * techniques.
     * Used for IGS products from GPS week 1400 through GPS week 1631 (2006-11-05 to 2011-04-16). Replaces IGb00,
     * replaced by IGb08. For all practical purposes coincident with ITRF2005.
     */
    public const EPSG_IGS05 = 1247;

    /**
     * IGS08
     * Type: dynamic geodetic
     * Extent: World.
     * Scope: Geodesy.
     * Derived from ITRF2008 at epoch 2005.00 through a subset of 232 stable IGS station coordinates. Preserves the
     * ITRF origin, orientation and scale, but without any distortions introduced from non-GNSS space-geodetic
     * techniques.
     * Used for IGS products from GPS week 1632 through GPS week 1708 (2011-04-17 through 2012-10-06). Replaces IGS05.
     * Replaced by IGb08. For all practical purposes coincident with ITRF2008.
     */
    public const EPSG_IGS08 = 1141;

    /**
     * IGS14
     * Type: dynamic geodetic
     * Extent: World.
     * Scope: Geodesy.
     * Derived from ITRF2014 at epoch 2010.00 through a subset of 252 stable IGS station coordinates. Preserves the
     * ITRF origin, orientation and scale, but without any distortions introduced from non-GNSS space-geodetic
     * techniques.
     * Used for IGS products from GPS week 1934 (2017-01-29) through GPS week 2105 (2020-05-16). Replaces IGb08,
     * replaced by IGb14. For all practical purposes coincident with ITRF2014.
     */
    public const EPSG_IGS14 = 1191;

    /**
     * IGS97
     * Type: dynamic geodetic
     * Extent: World.
     * Scope: Geodesy.
     * Derived from ITRF97 at epoch 1997.00 through a subset of stable IGS station coordinates. Preserves the ITRF
     * origin, orientation and scale, but without any distortions introduced from non-GNSS space-geodetic techniques.
     * Used for IGS products from GPS week 1065 through GPS week 1142 (2000-06-04 to 2001-12-01). Replaced by IGS00.
     * For all practical purposes coincident with ITRF97.
     */
    public const EPSG_IGS97 = 1244;

    /**
     * IGb00
     * Type: dynamic geodetic
     * Extent: World.
     * Scope: Geodesy.
     * Derived from ITRF2000 at epoch 1998.00 through a subset of 99 stable IGS station coordinates. Preserves the ITRF
     * origin, orientation and scale, but without any distortions introduced from non-GNSS space-geodetic techniques.
     * Used for IGS products from GPS week 1253 through GPS week 1399 (2004-01-11 to 2006-11-04). Replaces IGS00,
     * replaced by IGS05. For all practical purposes coincident with ITRF2000.
     */
    public const EPSG_IGB00 = 1246;

    /**
     * IGb08
     * Type: dynamic geodetic
     * Extent: World.
     * Scope: Geodesy.
     * Derived from ITRF2008 at epoch 2005.00 through a subset of 232 stable IGS station coordinates. Preserves the
     * ITRF origin, orientation and scale, but without any distortions introduced from non-GNSS space-geodetic
     * techniques.
     * Used for IGS products from GPS week 1709 through GPS week 1933 (2012-10-07 to 2017-01-28). Replaces IGS08,
     * replaced by IGS14. For all practical purposes coincident with ITRF2008.
     */
    public const EPSG_IGB08 = 1248;

    /**
     * IGb14
     * Type: dynamic geodetic
     * Extent: World.
     * Scope: Geodesy.
     * Daily IGS combined operational solutions of GPS weeks 730 to 2092. IGb14 is aligned in origin, scale and
     * orientation to IGS14 via a subset of 233 selected stations. As IGS14 is aligned to ITRF2014, IGb14 is also
     * aligned to ITRF2014.
     * Used for IGS products from GPS week 2106 (2020-05-17). Replaces IGS14. Compared to IGS14, IGb14 benefits from 5
     * more years of input data, a revised discontinuity list and 9 additional stations. For all practical purposes
     * coincident with ITRF2014.
     */
    public const EPSG_IGB14 = 1272;

    /**
     * IRENET95
     * Type: geodetic
     * Extent: Ireland - onshore. United Kingdom (UK) - Northern Ireland (Ulster) - onshore.
     * Scope: Geodesy.
     * ETRS89 stations in Ireland
     * Densification of ETRS89.
     */
    public const EPSG_IRENET95 = 6173;

    /**
     * Ibiza
     * Type: vertical
     * Extent: Spain - Balearic Islands - Ibiza and Formentera - onshore.
     * Scope: Geodesy, engineering survey, topographic mapping.
     * Mean Sea Level at Ibiza harbour between January 2003 and December 2005.
     * Orthometric heights.
     */
    public const EPSG_IBIZA = 1277;

    /**
     * Incheon
     * Type: vertical
     * Extent: Republic of Korea (South Korea) - mainland onshore.
     * Scope: Geodesy, topographic mapping.
     * MSL 1913-1916 at Incheon Bay.
     */
    public const EPSG_INCHEON = 1049;

    /**
     * Indian 1954
     * Type: geodetic
     * Extent: Myanmar (Burma) - onshore; Thailand - onshore.
     * Scope: Topographic mapping.
     * Extension of Kalianpur 1937 over Myanmar and Thailand.
     */
    public const EPSG_INDIAN_1954 = 6239;

    /**
     * Indian 1960
     * Type: geodetic
     * Extent: Cambodia - onshore; Vietnam - onshore and offshore Cuu Long basin.
     * Scope: Topographic mapping.
     * DMA extension over IndoChina of the Indian 1954 network adjusted  to better fit local geoid.
     * Also known as Indian (DMA Reduced).
     */
    public const EPSG_INDIAN_1960 = 6131;

    /**
     * Indian 1975
     * Type: geodetic
     * Extent: Thailand - onshore plus offshore Gulf of Thailand.
     * Scope: Topographic mapping.
     * Fundamental point: Khau Sakaerang.
     */
    public const EPSG_INDIAN_1975 = 6240;

    /**
     * Indian Spring Low Water
     * Type: vertical
     * Extent: World.
     * Scope: Hydrography and nautical charting.
     * The level below MSL equal to the sum of the amplitudes of the harmonic constituents M2, S2, K1 and O1. It
     * approximates mean lower low water spring tides (MLLWS).
     * Users are advised to not use this generic vertical datum but to define explicit realizations of ISLW by
     * specifying location and epoch, for instance "ISLW at xxx during yyyy-yyyy".
     */
    public const EPSG_INDIAN_SPRING_LOW_WATER = 1085;

    /**
     * Indonesian Datum 1974
     * Type: geodetic
     * Extent: Indonesia - onshore.
     * Scope: Topographic mapping.
     * Fundamental point: Padang. Latitude: 0°56'38.414"S, longitude: 100°22' 8.804"E (of Greenwich). Ellipsoidal
     * height 3.190m, gravity-related height 14.0m above mean sea level.
     * Replaced by DGN95.
     */
    public const EPSG_INDONESIAN_DATUM_1974 = 6238;

    /**
     * Indonesian Geoid 2020
     * Type: vertical
     * Extent: Indonesia - onshore and offshore.
     * Scope: Geodesy, engineering survey, topographic mapping.
     * Defined by INAGeoid20 gravimetric geoid model applied to SRGI2013.
     */
    public const EPSG_INDONESIAN_GEOID_2020 = 1294;

    /**
     * Instantaneous Water Level
     * Type: vertical
     * Extent: World.
     * Scope: Hydrography, drilling, marine geophysics.
     * Instantaneous water level uncorrected for tide.
     * Not specific to any location or epoch.
     */
    public const EPSG_INSTANTANEOUS_WATER_LEVEL = 5113;

    /**
     * Institut Geographique du Congo Belge 1955
     * Type: geodetic
     * Extent: The Democratic Republic of the Congo (Zaire) - Lower Congo (Bas Congo)
     * Scope: Cadastre, engineering survey, topographic mapping.
     * Fundamental point: Yella east base. Latitude: 6°00'53.139"S, longitude: 12°58'29.287"E (of Greenwich).
     * Replaced by IGC 1962 Arc of the 6th Parallel South, except for oil industry activities.
     */
    public const EPSG_INSTITUT_GEOGRAPHIQUE_DU_CONGO_BELGE_1955 = 6701;

    /**
     * International Great Lakes Datum 1955
     * Type: vertical
     * Extent: Canada and United States (USA) - Great Lakes basin and St Lawrence Seaway.
     * Scope: Hydrology.
     * Mean water level 1941-1956 at Pointe-au-Père (Father's Point), Quebec. Benchmark 1248-G = 3.794m.
     * Dynamic heights. Adopted in 1962. Replaced by IGLD 1985 in January 1992.
     */
    public const EPSG_INTERNATIONAL_GREAT_LAKES_DATUM_1955 = 5204;

    /**
     * International Great Lakes Datum 1985
     * Type: vertical
     * Extent: Canada and United States (USA) - Great Lakes basin and St Lawrence Seaway.
     * Scope: Hydrology.
     * Mean water level 1970-1983 at Pointe-au-Père (Father's Point) and 1984-1988 at Rimouski, Quebec. Benchmark
     * 1250-G = 6.273m.
     * Dynamic heights. Replaces IGLD 1955 from January 1992.
     */
    public const EPSG_INTERNATIONAL_GREAT_LAKES_DATUM_1985 = 5205;

    /**
     * International Terrestrial Reference Frame 1988
     * Type: dynamic geodetic
     * Extent: World.
     * Scope: Geodesy.
     * Origin at geocentre, orientated to the BIH Terrestrial System at epoch 1984.0. Datum defined by a set of
     * 3-dimensional Cartesian station coordinates (SCS).
     * Realization of the IERS Terrestrial Reference System (ITRS) at epoch 1988.0. Replaced by ITRF89 (code 6648).
     */
    public const EPSG_INTERNATIONAL_TERRESTRIAL_REFERENCE_FRAME_1988 = 6647;

    /**
     * International Terrestrial Reference Frame 1989
     * Type: dynamic geodetic
     * Extent: World.
     * Scope: Geodesy.
     * Origin at geocentre, orientated to the BIH Terrestrial System at epoch 1984.0. Datum defined by a set of
     * 3-dimensional Cartesian station coordinates (SCS) for epoch 1988.0.
     * Realization of the IERS Terrestrial Reference System (ITRS) from April 1991. Replaces ITRF88 (code 6647).
     * Replaced by ITRF90 (code 6649).
     */
    public const EPSG_INTERNATIONAL_TERRESTRIAL_REFERENCE_FRAME_1989 = 6648;

    /**
     * International Terrestrial Reference Frame 1990
     * Type: dynamic geodetic
     * Extent: World.
     * Scope: Geodesy.
     * Origin at geocentre, orientated to the BIH Terrestrial System at epoch 1984.0. Datum defined by a set of
     * 3-dimensional Cartesian station coordinates (SCS) for epoch 1988.0.
     * Realization of the IERS Terrestrial Reference System (ITRS) from December 1991. Replaces ITRF89 (code 6648).
     * Replaced by ITRF91 (code 6650).
     */
    public const EPSG_INTERNATIONAL_TERRESTRIAL_REFERENCE_FRAME_1990 = 6649;

    /**
     * International Terrestrial Reference Frame 1991
     * Type: dynamic geodetic
     * Extent: World.
     * Scope: Geodesy.
     * Origin at geocentre, orientated to the BIH Terrestrial System at epoch 1984.0. Datum defined by a set of
     * 3-dimensional Cartesian station coordinates (SCS) for epoch 1988.0.
     * Realization of the IERS Terrestrial Reference System (ITRS) from October 1992. Replaces ITRF90 (code 6649).
     * Replaced by ITRF92 (code 6651).
     */
    public const EPSG_INTERNATIONAL_TERRESTRIAL_REFERENCE_FRAME_1991 = 6650;

    /**
     * International Terrestrial Reference Frame 1992
     * Type: dynamic geodetic
     * Extent: World.
     * Scope: Geodesy.
     * Origin at geocentre, orientated to the BIH Terrestrial System at epoch 1984.0. Datum defined by a set of 287
     * 3-dimensional Cartesian station coordinates (SCS) for epoch 1988.0.
     * Realization of the IERS Terrestrial Reference System (ITRS) from October 1993. Replaces ITRF91 (code 6650).
     * Replaced by ITRF93 (code 6652).
     */
    public const EPSG_INTERNATIONAL_TERRESTRIAL_REFERENCE_FRAME_1992 = 6651;

    /**
     * International Terrestrial Reference Frame 1993
     * Type: dynamic geodetic
     * Extent: World.
     * Scope: Geodesy.
     * Origin at geocentre, orientated to the BIH Terrestrial System at epoch 1984.0. Datum defined by a set of
     * 3-dimensional Cartesian station coordinates (SCS) for epoch 1993.0.
     * Realization of the IERS Terrestrial Reference System (ITRS) from October 1994. Replaces ITRF92 (code 6651).
     * Replaced by ITRF94 (code 6653).
     */
    public const EPSG_INTERNATIONAL_TERRESTRIAL_REFERENCE_FRAME_1993 = 6652;

    /**
     * International Terrestrial Reference Frame 1994
     * Type: dynamic geodetic
     * Extent: World.
     * Scope: Geodesy.
     * Origin at geocentre, orientated to the BIH Terrestrial System at epoch 1984.0. Datum defined by a set of
     * 3-dimensional Cartesian station coordinates (SCS) for epoch 1993.0.
     * Realization of the IERS Terrestrial Reference System (ITRS) from March 1996. Replaces ITRF93 (code 6652).
     * Replaced by ITRF96 (code 6654).
     */
    public const EPSG_INTERNATIONAL_TERRESTRIAL_REFERENCE_FRAME_1994 = 6653;

    /**
     * International Terrestrial Reference Frame 1996
     * Type: dynamic geodetic
     * Extent: World.
     * Scope: Geodesy.
     * Origin at geocentre, orientated to the BIH Terrestrial System at epoch 1984.0. Datum defined by a set of
     * 3-dimensional Cartesian station coordinates (SCS) for epoch 1997.0.
     * Realization of the IERS Terrestrial Reference System (ITRS) from May 1998. Replaces ITRF94 (code 6653). Replaced
     * by ITRF97 (code 6655).
     */
    public const EPSG_INTERNATIONAL_TERRESTRIAL_REFERENCE_FRAME_1996 = 6654;

    /**
     * International Terrestrial Reference Frame 1997
     * Type: dynamic geodetic
     * Extent: World.
     * Scope: Geodesy.
     * Origin at geocentre, orientated to the BIH Terrestrial System at epoch 1984.0. Datum defined by a set of
     * 3-dimensional Cartesian station coordinates (SCS) for epoch 1997.0.
     * Realization of the IERS Terrestrial Reference System (ITRS) from May 1999. Replaces ITRF96 (code 6654). Replaced
     * by ITRF2000 (code 6656).
     */
    public const EPSG_INTERNATIONAL_TERRESTRIAL_REFERENCE_FRAME_1997 = 6655;

    /**
     * International Terrestrial Reference Frame 2000
     * Type: dynamic geodetic
     * Extent: World.
     * Scope: Geodesy.
     * Origin at geocentre, orientated to the BIH Terrestrial System at epoch 1984.0. Datum defined by a set of
     * 3-dimensional Cartesian station coordinates (SCS) for epoch 1997.0.
     * Realization of the IERS Terrestrial Reference System (ITRS) from 2004. Replaces ITRF97 (code 6655). Replaced by
     * ITRF2005 (code 6896).
     */
    public const EPSG_INTERNATIONAL_TERRESTRIAL_REFERENCE_FRAME_2000 = 6656;

    /**
     * International Terrestrial Reference Frame 2005
     * Type: dynamic geodetic
     * Extent: World.
     * Scope: Geodesy.
     * Origin at geocentre, originally orientated to the BIH Terrestrial System at epoch 1984.0 then adjusted to ensure
     * zero net rotation to earth's overall tectonic motion. Defined by time series of Cartesian station coordinates
     * for epoch 2000.0.
     * Realization of the IERS Terrestrial Reference System (ITRS) from September 2007. Replaces ITRF2000 (code 6656).
     * Replaced by ITRF2008 (datum code 1061).
     */
    public const EPSG_INTERNATIONAL_TERRESTRIAL_REFERENCE_FRAME_2005 = 6896;

    /**
     * International Terrestrial Reference Frame 2008
     * Type: dynamic geodetic
     * Extent: World.
     * Scope: Geodesy.
     * Origin at geocentre. The ITRF2008 origin is defined in such a way that there are null translation parameters at
     * epoch 2005.0 and null translation rates between the ITRF2008 and the ILRS SLR time series.
     * Realization of the IERS Terrestrial Reference System (ITRS) from 2012. Replaces ITRF2005 (code 6896).
     */
    public const EPSG_INTERNATIONAL_TERRESTRIAL_REFERENCE_FRAME_2008 = 1061;

    /**
     * International Terrestrial Reference Frame 2014
     * Type: dynamic geodetic
     * Extent: World.
     * Scope: Geodesy.
     * Origin at geocentre. Origin = ILRS SLR long-term solution at epoch 2010.0. Zero scale and scale rate between
     * ITRF2014 and the average of VLBI and SLR scales/rates. Orientation = ITRF2008@ 2010.0 with zero rotation rates
     * between the ITRF2014 and ITRF2008.
     * Realization of the IERS Terrestrial Reference System (ITRS). Replaces ITRF2008 (datum code 1061) from January
     * 2016.
     */
    public const EPSG_INTERNATIONAL_TERRESTRIAL_REFERENCE_FRAME_2014 = 1165;

    /**
     * Iraq-Kuwait Boundary Datum 1992
     * Type: geodetic
     * Extent: Iraq - Kuwait boundary.
     * Scope: Boundary demarcation.
     * Four stations established between September and December 1991 determined by GPS and Doppler observations.
     */
    public const EPSG_IRAQ_KUWAIT_BOUNDARY_DATUM_1992 = 6667;

    /**
     * Iraqi Geospatial Reference System
     * Type: geodetic
     * Extent: Iraq - onshore and offshore.
     * Scope: Geodesy.
     * ITRF2000 at epoch 1997.0.
     */
    public const EPSG_IRAQI_GEOSPATIAL_REFERENCE_SYSTEM = 1029;

    /**
     * Islands Net 1993
     * Type: geodetic
     * Extent: Iceland - onshore and offshore.
     * Scope: Geodesy, cadastre, engineering survey, topographic mapping.
     * ITRF93 at epoch 1993.6.
     * Replaced by ISN2004 (datum code 1060).
     */
    public const EPSG_ISLANDS_NET_1993 = 6659;

    /**
     * Islands Net 2004
     * Type: geodetic
     * Extent: Iceland - onshore and offshore.
     * Scope: Geodesy, cadastre, engineering survey, topographic mapping.
     * ITRF2000 at epoch 2004.6.
     * Replaces ISN93 (datum code 6659).
     */
    public const EPSG_ISLANDS_NET_2004 = 1060;

    /**
     * Islands Net 2016
     * Type: geodetic
     * Extent: Iceland - onshore and offshore.
     * Scope: Geodesy, cadastre, engineering survey, topographic mapping.
     * ITRF2014 at epoch 2016.5.
     * Replaces ISN2004 from September 2017.
     */
    public const EPSG_ISLANDS_NET_2016 = 1187;

    /**
     * Israel 1993
     * Type: geodetic
     * Extent: Israel - onshore; Palestine Territory - onshore.
     * Scope: Topographic mapping.
     * Fundamental point:  Latitude: 31°44'03.817"N, longitude: 35°12'16.261"E (of Greenwich).
     * Replaces Palestine 1923 (datum code 6281). Replaced by IGD05 (datum code 1143).
     */
    public const EPSG_ISRAEL_1993 = 6141;

    /**
     * Israeli Geodetic Datum 2005
     * Type: geodetic
     * Extent: Israel - onshore and offshore.
     * Scope: Geodesy.
     * Defined by coordinates of 13 Active Positioning Network (APN) stations in ITRF2000 at epoch 2004.75. A further
     * five APN stations were added in 2006.
     * Replaces Israel 1993 (datum code 6141). Replaced by IGD05/12 (datum code 1115).
     */
    public const EPSG_ISRAELI_GEODETIC_DATUM_2005 = 1114;

    /**
     * Israeli Geodetic Datum 2005(2012)
     * Type: geodetic
     * Extent: Israel - onshore and offshore.
     * Scope: Geodesy.
     * Datum updated in 2012 with four APN stations removed from definition. Coordinate epoch remains ITRF2000 at epoch
     * 2004.75.
     * Replaces IGD05 (datum code 1114).
     */
    public const EPSG_ISRAELI_GEODETIC_DATUM_2005_2012 = 1115;

    /**
     * Istituto Geografico Militaire 1995
     * Type: geodetic
     * Extent: Italy - onshore and offshore; San Marino, Vatican City State.
     * Scope: Geodesy.
     * Network of 1296 points observed 1992-1995 and adjusted in 1996 constrained to 9 ETRS89 points. Densification of
     * ETRS89 in Italy.
     * Replaced by RDN2008 (datum code 1132) from 2011-11-10.
     */
    public const EPSG_ISTITUTO_GEOGRAFICO_MILITAIRE_1995 = 6670;

    /**
     * Iwo Jima 1945
     * Type: geodetic
     * Extent: Japan - Iwo Jima island.
     * Scope: Military survey.
     * Fundamental point: Beacon "E".
     */
    public const EPSG_IWO_JIMA_1945 = 6709;

    /**
     * Jamaica 1875
     * Type: geodetic
     * Extent: Jamaica - onshore.
     * Scope: Topographic mapping.
     * Fundamental point: Fort Charles Flagstaff. Latitude: 17°55'55.800"N, longitude: 76°56'37.260"W (of Greenwich).
     */
    public const EPSG_JAMAICA_1875 = 6241;

    /**
     * Jamaica 1969
     * Type: geodetic
     * Extent: Jamaica - onshore.
     * Scope: Geodesy, cadastre, engineering survey, topographic mapping.
     * Fundamental point: Fort Charles Flagstaff. Latitude: 17°55'55.800"N, longitude: 76°56'37.260"W (of Greenwich).
     */
    public const EPSG_JAMAICA_1969 = 6242;

    /**
     * Jamaica 2001
     * Type: geodetic
     * Extent: Jamaica - onshore and offshore. Includes Morant Cays and Pedro Cays.
     * Scope: Geodesy, cadastre, engineering survey, topographic mapping.
     * Aligned to WGS 84.
     */
    public const EPSG_JAMAICA_2001 = 6758;

    /**
     * Jamestown 1971
     * Type: vertical
     * Extent: St Helena, Ascension and Tristan da Cunha - St Helena Island - onshore.
     * Scope: Topographic mapping.
     * MSL at Jamestown 1971 defined through elevation of triangulation station Astro DOS 71/4 Ladder Hill Fort being
     * 267.858 metres above MSL.
     */
    public const EPSG_JAMESTOWN_1971 = 1175;

    /**
     * Japanese Geodetic Datum 2000
     * Type: geodetic
     * Extent: Japan - onshore and offshore.
     * Scope: Geodesy, engineering survey, topographic mapping.
     * ITRF94 at epoch 1997.0. Fundamental point: Tokyo-Taisho, latitude: 35°39'29.1572"N, longitude:
     * 139°44'28.8759"E (of Greenwich).
     * Instigated under amendment to the Japanese Surveying Law with effect from April 2002. Replaces Tokyo datum (code
     * 6301). Replaced by JGD2011 (datum code 1128) with effect from 21st October 2011.
     */
    public const EPSG_JAPANESE_GEODETIC_DATUM_2000 = 6612;

    /**
     * Japanese Geodetic Datum 2000 (vertical)
     * Type: vertical
     * Extent: Japan - onshore mainland - Hokkaido, Honshu, Shikoku, Kyushu.
     * Scope: Geodesy, topographic mapping.
     * 24.4140 metres above mean sea level Tokyo Bay.
     * Orthometric heights. Replaces JSLD69 and JSLD72 with effect from April 2002. Replaced by JGD2011 (vertical)
     * (datum code 1131) with effect from 21st October 2011.
     */
    public const EPSG_JAPANESE_GEODETIC_DATUM_2000_VERTICAL = 1130;

    /**
     * Japanese Geodetic Datum 2011
     * Type: geodetic
     * Extent: Japan - onshore and offshore.
     * Scope: Geodesy, engineering survey, topographic mapping.
     * ITRF94 at epoch 1997.0 except for northern Honshu area impacted by 2011 Tohoku earthquake which is ITRF2008 at
     * epoch 2011.395. Fundamental point: Tokyo-Taisho, latitude: 35°39'29.1572"N, longitude: 139°44'28.8869"E (of
     * Greenwich).
     * Instigated under amendment to the Japanese Surveying Law with effect from 21st October 2011. Replaces JGD2000
     * (datum code 6612).
     */
    public const EPSG_JAPANESE_GEODETIC_DATUM_2011 = 1128;

    /**
     * Japanese Geodetic Datum 2011 (vertical)
     * Type: vertical
     * Extent: Japan - onshore mainland - Hokkaido, Honshu, Shikoku, Kyushu.
     * Scope: Geodesy, topographic mapping.
     * 24.3900 metres above mean sea level Tokyo Bay.
     * Orthometric heights. Replaces JGD2000 (vertical) (datum code 1130) with effect from 21st October 2011.
     */
    public const EPSG_JAPANESE_GEODETIC_DATUM_2011_VERTICAL = 1131;

    /**
     * Japanese Standard Levelling Datum 1969
     * Type: vertical
     * Extent: Japan - onshore mainland - Honshu, Shikoku, Kyushu.
     * Scope: Geodesy, topographic mapping.
     * 24.4140 metres above mean sea level Tokyo Bay.
     * Normal-orthometric heights. Replaces JSLD49. Replaced by JGD2000 (vertical) (datum code 1130) from April 2002.
     */
    public const EPSG_JAPANESE_STANDARD_LEVELLING_DATUM_1969 = 5122;

    /**
     * Japanese Standard Levelling Datum 1972
     * Type: vertical
     * Extent: Japan - onshore mainland - Hokkaido.
     * Scope: Geodesy, topographic mapping.
     * Mean sea level Oshoro 1963-72.
     * Normal-orthometric heights. Replaced by JGD2000 (vertical) (datum code 1130) with effect from April 2002.
     */
    public const EPSG_JAPANESE_STANDARD_LEVELLING_DATUM_1972 = 1129;

    /**
     * Johnston Island 1961
     * Type: geodetic
     * Extent: United States Minor Outlying Islands - Johnston Island.
     * Scope: Military survey.
     */
    public const EPSG_JOHNSTON_ISLAND_1961 = 6725;

    /**
     * Jouik 1961
     * Type: geodetic
     * Extent: Mauritania - coastal area north of Cape Timiris.
     * Scope: Hydrography and nautical charting.
     *
     * Replaced by Mauritania 1999 (datum code 6702).
     */
    public const EPSG_JOUIK_1961 = 6679;

    /**
     * KOC Construction Datum
     * Type: vertical
     * Extent: Kuwait - onshore.
     * Scope: KOC survey control and facilities engineering.
     *
     * Approximately 1.52m below MSL. Created for the construction of the Mina al Ahmadi refinery.
     */
    public const EPSG_KOC_CONSTRUCTION_DATUM = 5188;

    /**
     * KOC Well Datum
     * Type: vertical
     * Extent: Kuwait - onshore.
     * Scope: KOC exploration and field development subsurface work.
     *
     * Approximately 3.22m above MSL.
     */
    public const EPSG_KOC_WELL_DATUM = 5187;

    /**
     * Kalianpur 1880
     * Type: geodetic
     * Extent: Bangladesh - onshore; India - mainland onshore; Myanmar (Burma) - onshore; Pakistan - onshore.
     * Scope: Topographic mapping.
     * Fundamental point: Kalianpur. Latitude: 24°07'11.260"N, longitude: 77°39'17.570"E (of Greenwich).
     * Includes 1916 extension into Burma (Myanmar).  Replaced by 1937 adjustment.
     */
    public const EPSG_KALIANPUR_1880 = 6243;

    /**
     * Kalianpur 1937
     * Type: geodetic
     * Extent: Bangladesh - onshore; India - mainland onshore; Myanmar - onshore and Moattama area offshore; Pakistan -
     * onshore.
     * Scope: Topographic mapping.
     * Fundamental point: Kalianpur. Latitude: 24° 07'11.260"N, longitude: 77°39'17.570"E (of Greenwich).
     * Replaces 1880 adjustment except for topographic mapping.  Replaced in Bangladesh and Pakistan by 1962
     * metrication conversion and in India by 1975 metrication conversion.
     */
    public const EPSG_KALIANPUR_1937 = 6144;

    /**
     * Kalianpur 1962
     * Type: geodetic
     * Extent: Pakistan - onshore and offshore.
     * Scope: Topographic mapping.
     * Fundamental point: Kalianpur. Latitude: 24° 07'11.260"N, longitude: 77°39'17.570"E (of Greenwich).
     * 1937 adjustment rescaled by ratio metric conversions of Indian foot (1937) to Indian foot (1962).
     */
    public const EPSG_KALIANPUR_1962 = 6145;

    /**
     * Kalianpur 1975
     * Type: geodetic
     * Extent: India - mainland onshore.
     * Scope: Topographic mapping.
     * Fundamental point: Kalianpur. Latitude: 24° 07'11.260"N, longitude: 77°39'17.570"E (of Greenwich).
     * 1937 adjustment rescaled by ratio metric conversions of Indian foot (1937) to Indian foot (1975).
     */
    public const EPSG_KALIANPUR_1975 = 6146;

    /**
     * Kandawala
     * Type: geodetic
     * Extent: Sri Lanka - onshore.
     * Scope: Topographic mapping.
     * Fundamental point: Kandawala. Latitude: 7°14'06.838"N, longitude: 79°52'36.670"E.
     */
    public const EPSG_KANDAWALA = 6244;

    /**
     * Karbala 1979
     * Type: geodetic
     * Extent: Iraq - onshore.
     * Scope: Geodesy.
     * Fundamental point: Karbala. Latitude: 32°34'14.4941"N, longitude: 44°00'49.6379"E.
     * National geodetic network established by Polservice consortium.
     */
    public const EPSG_KARBALA_1979 = 6743;

    /**
     * Kartastokoordinaattijarjestelma (1966)
     * Type: geodetic
     * Extent: Finland - onshore.
     * Scope: Geodesy, cadastre, engineering survey, topographic mapping.
     * Adjustment with fundamental point SF31 based on ED50 transformed to best fit the older VVJ adjustment.
     * Adopted in 1970.
     */
    public const EPSG_KARTASTOKOORDINAATTIJARJESTELMA_1966 = 6123;

    /**
     * Kasai 1953
     * Type: geodetic
     * Extent: The Democratic Republic of the Congo (Zaire) - Kasai - south of 5°S and east of 21°30'E.
     * Scope: Cadastre, engineering survey, topographic mapping.
     * Two stations of the Katanga triangulation with ellipsoid change applied: Kabila, latitude 6°58'34.023"S,
     * longitude 23°50'24.028"E (of Greenwich); and Gandajika NW base, latitude 6°45'01.057"S, longitude
     * 23°57'03.038"E (of Greenwich).
     * Replaced by IGC 1962 Arc of the 6th Parallel South.
     */
    public const EPSG_KASAI_1953 = 6696;

    /**
     * Katanga 1955
     * Type: geodetic
     * Extent: The Democratic Republic of the Congo (Zaire) - Katanga.
     * Scope: Cadastre, engineering survey, topographic mapping.
     * Fundamental point: Tshinsenda A. Latitude: 12°30'31.568"S, longitude: 28°01'02.971"E (of Greenwich).
     * Replaces earlier adjustments.
     */
    public const EPSG_KATANGA_1955 = 6695;

    /**
     * Kertau (RSO)
     * Type: geodetic
     * Extent: Malaysia - West Malaysia; Singapore.
     * Scope: Metrication of RSO grid.
     *
     * Adopts metric conversion of 0.914398 metres per yard exactly. This is a truncation of the Sears 1922 ratio.
     */
    public const EPSG_KERTAU_RSO = 6751;

    /**
     * Kertau 1968
     * Type: geodetic
     * Extent: Malaysia - West Malaysia onshore and offshore east coast; Singapore - onshore and offshore.
     * Scope: Geodesy, cadastre.
     * Fundamental point: Kertau. Latitude: 3°27'50.710"N, longitude: 102°37'24.550"E (of Greenwich).
     * Replaces MRT48 and earlier adjustments. Adopts metric conversion of 39.370113 inches per metre. Not used for
     * 1969 metrication of RSO grid - see Kertau (RSO) (code 6751).
     */
    public const EPSG_KERTAU_1968 = 6245;

    /**
     * Kingdom of Saudi Arabia Geodetic Reference Frame 2017
     * Type: geodetic
     * Extent: Saudi Arabia - onshore and offshore.
     * Scope: Geodesy, cadastre, engineering survey, topographic mapping.
     * ITRF2014 at epoch 2017.00.
     * Realized by 333 GNSS stations in Saudi Arabia aligned to ITRF2014 through core network of 46 stations adjusted
     * to 15 IGS stations.
     */
    public const EPSG_KINGDOM_OF_SAUDI_ARABIA_GEODETIC_REFERENCE_FRAME_2017 = 1268;

    /**
     * Kingdom of Saudi Arabia Vertical Reference Frame Jeddah 2014
     * Type: vertical
     * Extent: Saudi Arabia - onshore.
     * Scope: Geodesy, cadastre, engineering survey, topographic mapping.
     * Jeddah tide gauge bench mark TGBM-B height of 1.7446m at 2014.75.
     */
    public const EPSG_KINGDOM_OF_SAUDI_ARABIA_VERTICAL_REFERENCE_FRAME_JEDDAH_2014 = 1269;

    /**
     * Kiunga
     * Type: vertical
     * Extent: Papua New Guinea - onshore south of 5°S and west of 144°E.
     * Scope: Engineering survey.
     * PSM 9465 at Kiunga Airport. Propagated through bilinear interpolation of EGM2008 geoid model (transformation
     * code 3858) reduced to PSM 9465 by offset of -3.0m.
     */
    public const EPSG_KIUNGA = 1151;

    /**
     * Korean Datum 1985
     * Type: geodetic
     * Extent: Republic of Korea (South Korea) - onshore.
     * Scope: Geodesy, cadastre, engineering survey, topographic mapping.
     * Fundamental point: Suwon. Latitude 37°16'31.9034"N, longitude 127°03'05.1451"E of Greenwich. This is
     * consistent with the Tokyo 1918 datum latitude and longitude.
     * Replaces Tokyo 1918 (datum code 6301). Replaced by Korea 2000 (datum code 6737).
     */
    public const EPSG_KOREAN_DATUM_1985 = 6162;

    /**
     * Korean Datum 1995
     * Type: geodetic
     * Extent: Republic of Korea (South Korea) - onshore.
     * Scope: Topographic mapping.
     */
    public const EPSG_KOREAN_DATUM_1995 = 6166;

    /**
     * Kosovo Reference System 2001
     * Type: geodetic
     * Extent: Kosovo.
     * Scope: Geodesy.
     * Densification of ETRF97 in Kosovo at epoch 2001.25.
     * First order network of 32 stations connected to 8 EUREF Permanant Network (EPN) stations observed march-April
     * 2001. Densified in 2012.
     */
    public const EPSG_KOSOVO_REFERENCE_SYSTEM_2001 = 1251;

    /**
     * Kousseri
     * Type: geodetic
     * Extent: Cameroon - N'Djamena area.
     * Scope: Topographic mapping.
     * IGN astronomical station Dabanga; 11°55'05.9"N  14°38'40.8"E (of Greenwich).
     */
    public const EPSG_KOUSSERI = 6198;

    /**
     * Kumul 34
     * Type: vertical
     * Extent: Papua New Guinea - Papuan fold and thrust belt.
     * Scope: Engineering survey.
     * Kumul Platform Station 34. Propagated through bilinear interpolation of EGM96 geoid model (transformation code
     * 10084) reduced to Kumul 34 by offset of -0.87m.
     */
    public const EPSG_KUMUL_34 = 1150;

    /**
     * Kusaie 1951
     * Type: geodetic
     * Extent: Federated States of Micronesia - Kosrae (Kusaie).
     * Scope: Military survey.
     */
    public const EPSG_KUSAIE_1951 = 6735;

    /**
     * Kuwait Oil Company
     * Type: geodetic
     * Extent: Kuwait - onshore.
     * Scope: Oil and gas exploration.
     * Fundamental point: K28.  Latitude: 29°03'42.348"N, longitude: 48°08'42.558"E (of Greenwich).
     */
    public const EPSG_KUWAIT_OIL_COMPANY = 6246;

    /**
     * Kuwait PWD
     * Type: vertical
     * Extent: Kuwait - onshore.
     * Scope: Municipal spatial referencing.
     * Mean Low Low Water (MLLW) at Kuwait City.
     * Approximately 1.03m below MSL.
     */
    public const EPSG_KUWAIT_PWD = 5186;

    /**
     * Kuwait Utility
     * Type: geodetic
     * Extent: Kuwait - Kuwait City.
     * Scope: Cadastre, engineering survey.
     */
    public const EPSG_KUWAIT_UTILITY = 6319;

    /**
     * Kyrgyzstan Geodetic Datum 2006
     * Type: geodetic
     * Extent: Kyrgyzstan.
     * Scope: Geodesy.
     * 6 stations of the Kyrgyzstan zero-order network tied to ITRF2005 at epoch 2006.70.
     * The accuracy in the connection to ITRF2005 is estimated to be 5 mm in horizontal and 10-20 mm in height (95%
     * confidence).
     */
    public const EPSG_KYRGYZSTAN_GEODETIC_DATUM_2006 = 1160;

    /**
     * La Canoa
     * Type: geodetic
     * Extent: Venezuela - onshore.
     * Scope: Geodesy, engineering survey, topographic mapping.
     * Fundamental point: La Canoa. Latitude: 8°34'17.170"N, longitude: 63°51'34.880"W (of Greenwich).
     * Origin and network incorporated within PSAD56 (datum code 6248).
     */
    public const EPSG_LA_CANOA = 6247;

    /**
     * La Gomera
     * Type: vertical
     * Extent: Spain - Canary Islands - La Gomera onshore.
     * Scope: Geodesy, engineering survey, topographic mapping.
     * Mean Sea Level at San Sebastian de la Gomera harbour.
     * Orthometric heights.
     */
    public const EPSG_LA_GOMERA = 1282;

    /**
     * La Palma
     * Type: vertical
     * Extent: Spain - Canary Islands - La Palma onshore.
     * Scope: Geodesy, engineering survey, topographic mapping.
     * Mean Sea Level at Santa Cruz de la Palma harbour in 1997.
     * Orthometric heights.
     */
    public const EPSG_LA_PALMA = 1283;

    /**
     * Lagos 1955
     * Type: vertical
     * Extent: Nigeria - onshore.
     * Scope: Geodesy, engineering survey, topographic mapping.
     * Mean sea level at Lagos, 1912-1928.
     */
    public const EPSG_LAGOS_1955 = 5194;

    /**
     * Lake
     * Type: geodetic
     * Extent: Venezuela - Lake Maracaibo area, onshore and offshore in lake.
     * Scope: Oil and gas exploration.
     * Fundamental point: Maracaibo Cathedral. Latitude: 10°38'34.678"N, longitude: 71°36'20.224"W (of Greenwich).
     */
    public const EPSG_LAKE = 6249;

    /**
     * Landeshohennetz 1995
     * Type: vertical
     * Extent: Liechtenstein; Switzerland.
     * Scope: Geodesy.
     * Origin at Repere Pierre du Niton (RPN) defined as 373.6 metres above msl. This value derived from msl at
     * Marseille in 1897 through the French Lallemand network.
     * Orthometric heights. For scientific purposes only, replaces LN02.
     */
    public const EPSG_LANDESHOHENNETZ_1995 = 5128;

    /**
     * Landesnivellement 1902
     * Type: vertical
     * Extent: Liechtenstein; Switzerland.
     * Scope: Cadastre, topographic mapping.
     * Origin at Repere Pierre du Niton (RPN) defined as 373.6 metres above msl. This value derived from msl at
     * Marseille in 1897 through the French Lallemand network.
     * Levelling observations not corrected for gravity field. For scientific purposes, replaced by LHHN95.
     */
    public const EPSG_LANDESNIVELLEMENT_1902 = 5127;

    /**
     * Landshaedarkerfi Islands 2004
     * Type: vertical
     * Extent: Iceland - onshore.
     * Scope: Geodesy, topographic mapping.
     * Adjustment is referenced to mean sea level at Reykjavík epoch 2004.6.
     */
    public const EPSG_LANDSHAEDARKERFI_ISLANDS_2004 = 1190;

    /**
     * Lanzarote
     * Type: vertical
     * Extent: Spain - Canary Islands - Lanzarote onshore.
     * Scope: Geodesy, engineering survey, topographic mapping.
     * Mean Sea Level at Naos harbour, Arrecife, between 1994 and 1995.
     * Orthometric heights.
     */
    public const EPSG_LANZAROTE = 1278;

    /**
     * Lao 1993
     * Type: geodetic
     * Extent: Laos.
     * Scope: Topographic mapping.
     * Fundamental point: Lao 1982 coordinates of Pakxa pillar. Latitude: 18°23'57.0056"N, longitude:
     * 103°38'41.8020"E (of Greenwich). Orientation parallel with WGS 84.
     * Replaces Vientiane 1982. Replaced by Lao 1997.
     */
    public const EPSG_LAO_1993 = 6677;

    /**
     * Lao National Datum 1997
     * Type: geodetic
     * Extent: Laos.
     * Scope: Cadastre, engineering survey, topographic mapping.
     * Fundamental point: Vientiane (Nongteng) Astro Pillar. Latitude: 18°01'31.3480"N, longitude: 102°30'57.1376"E
     * (of Greenwich).
     * Replaces Lao 1993.
     */
    public const EPSG_LAO_NATIONAL_DATUM_1997 = 6678;

    /**
     * Latvia 1992
     * Type: geodetic
     * Extent: Latvia - onshore and offshore.
     * Scope: Geodesy, topographic mapping.
     * Constrained to 4 ETRS89 points in Latvia from the EUREF Baltic 1992 campaign.
     * Densification of ETRS89 during the 1992 Baltic campaign.
     */
    public const EPSG_LATVIA_1992 = 6661;

    /**
     * Latvian Height System 2000
     * Type: vertical
     * Extent: Latvia - onshore.
     * Scope: Geodesy, engineering survey, topographic mapping.
     * Latvian realisation of EVRF2007. Observed from 2000-2010 and reduced to epoch 2000.5 using empirical land uplift
     * model of Latvia. EVRF2007 heights of 16 points around Latvia held fixed.
     * Uses Normal heights.
     */
    public const EPSG_LATVIAN_HEIGHT_SYSTEM_2000 = 1162;

    /**
     * Le Pouce 1934
     * Type: geodetic
     * Extent: Mauritius - mainland onshore.
     * Scope: Geodesy, cadastre, engineering survey, topographic mapping.
     * Fundamental point: Le Pouce. Latitude: 20°11'42.25"S, longitude: 57°31'18.58"E (of Greenwich).
     */
    public const EPSG_LE_POUCE_1934 = 6699;

    /**
     * Leigon
     * Type: geodetic
     * Extent: Ghana - onshore and offshore.
     * Scope: Topographic mapping.
     * Fundamental point: GCS Station 121, Leigon. Latitude: 5°38'52.27"N, longitude: 0°11'46.08"W (of Greenwich).
     * Replaced Accra datum (code 6168) from 1978.  Coordinates at Leigon fundamental point defined as Accra datum
     * values for that point.
     */
    public const EPSG_LEIGON = 6250;

    /**
     * Lerwick
     * Type: vertical
     * Extent: United Kingdom (UK) - Great Britain - Scotland - Shetland Islands onshore.
     * Scope: Geodesy, topographic mapping.
     * Mean Sea Level at Lerwick 1979 correlated to pre-1900. Initially realised through levelling network adjustment,
     * from 2002 redefined to be realised through OSGM geoid model.
     * Orthometric heights.
     */
    public const EPSG_LERWICK = 5140;

    /**
     * Liberia 1964
     * Type: geodetic
     * Extent: Liberia - onshore.
     * Scope: Topographic mapping.
     * Fundamental point: Robertsfield. Latitude: 6°13'53.02"N, longitude: 10°21'35.44"W (of Greenwich).
     */
    public const EPSG_LIBERIA_1964 = 6251;

    /**
     * Libyan Geodetic Datum 2006
     * Type: geodetic
     * Extent: Libya - onshore and offshore.
     * Scope: Geodesy, engineering survey, topographic mapping.
     * 5 stations tied to ITRF2000 through 8 days of continuous observations in May 2006.
     * Replaces ELD79.
     */
    public const EPSG_LIBYAN_GEODETIC_DATUM_2006 = 6754;

    /**
     * Lisbon 1890
     * Type: geodetic
     * Extent: Portugal - mainland - onshore.
     * Scope: Topographic mapping.
     * Fundamental point: Castelo Sao Jorge, Lisbon. Latitude: 38°42'43.631"N, longitude: 9°07'54.862"W of Greenwich.
     * Replaced by Lisbon 1937 adjustment (which uses International 1924 ellipsoid).
     */
    public const EPSG_LISBON_1890 = 6666;

    /**
     * Lisbon 1890 (Lisbon)
     * Type: geodetic
     * Extent: Portugal - mainland - onshore.
     * Scope: Topographic mapping.
     * Fundamental point: Castelo Sao Jorge, Lisbon. Latitude: 38°42'43.631"N, longitude: 0°E (of Lisbon).
     * Replaced by Lisbon 1937 adjustment (which uses International 1924 ellipsoid).
     */
    public const EPSG_LISBON_1890_LISBON = 6904;

    /**
     * Lisbon 1937
     * Type: geodetic
     * Extent: Portugal - mainland - onshore.
     * Scope: Topographic mapping.
     * Fundamental point: Castelo Sao Jorge, Lisbon. Latitude: 38°42'43.631"N, longitude: 9°07'54.862"W (of
     * Greenwich).
     * Replaces Lisbon 1890 adjustment (which used Bessel 1841 ellipsoid).
     */
    public const EPSG_LISBON_1937 = 6207;

    /**
     * Lisbon 1937 (Lisbon)
     * Type: geodetic
     * Extent: Portugal - mainland - onshore.
     * Scope: Topographic mapping.
     * Fundamental point: Castelo Sao Jorge, Lisbon. Latitude: 38°42'43.631"N, longitude: 0°E (of Lisbon).
     * Replaces Lisbon 1890 adjustment (which used Bessel 1841 ellipsoid).
     */
    public const EPSG_LISBON_1937_LISBON = 6803;

    /**
     * Lithuania 1994 (ETRS89)
     * Type: geodetic
     * Extent: Lithuania - onshore and offshore.
     * Scope: Geodesy, topographic mapping.
     * Constrained to 4 ETRS89 points in Lithuania from the EUREF Baltic 1992 campaign.
     * Densification of ETRS89 during the 1992 Baltic campaign.
     */
    public const EPSG_LITHUANIA_1994_ETRS89 = 6126;

    /**
     * Little Cayman Vertical Datum 1961
     * Type: vertical
     * Extent: Cayman Islands - Little Cayman.
     * Scope: Geodesy, topographic mapping.
     */
    public const EPSG_LITTLE_CAYMAN_VERTICAL_DATUM_1961 = 1098;

    /**
     * Locodjo 1965
     * Type: geodetic
     * Extent: Côte d'Ivoire (Ivory Coast) - onshore and offshore.
     * Scope: Topographic mapping.
     * Fundamental point: T5 Banco. Latitude: 5°18'50.5"N, longitude: 4°02'05.1"W (of Greenwich).
     */
    public const EPSG_LOCODJO_1965 = 6142;

    /**
     * Loma Quintana
     * Type: geodetic
     * Extent: Venezuela - onshore north of approximately 7°45'N.
     * Scope: Topographic mapping.
     * Fundamental point: Loma Quintana.
     * Replaced by La Canoa (code 6247).
     */
    public const EPSG_LOMA_QUINTANA = 6288;

    /**
     * Lome
     * Type: geodetic
     * Extent: Togo - onshore and offshore.
     * Scope: Topographic mapping.
     */
    public const EPSG_LOME = 6252;

    /**
     * Low Water
     * Type: vertical
     * Extent: World.
     * Scope: Hydrography and nautical charting.
     * The lowest level reached by the water surface in one tidal cycle. When used in inland (non-tidal) waters it is
     * generally defined as a level which the daily mean water level would fall below less than 5% of the time.
     * On a river it is a sloping surface. Users are advised to not use this generic vertical datum but to define
     * explicit realizations of low water by specifying location and epoch, for instance "Low water at xxx during
     * yyyy-yyyy".
     */
    public const EPSG_LOW_WATER = 1093;

    /**
     * Lower Low Water Large Tide
     * Type: vertical
     * Extent: World.
     * Scope: Hydrography and nautical charting.
     * The average of the lowest low waters, one from each of 19 years of observations.
     * Users are advised to not use this generic vertical datum but to define explicit realizations of LLWLT by
     * specifying location and epoch, for instance "LLWLT at xxx during yyyy-yyyy".
     */
    public const EPSG_LOWER_LOW_WATER_LARGE_TIDE = 1083;

    /**
     * Lowest Astronomical Tide
     * Type: vertical
     * Extent: World.
     * Scope: Hydrography and nautical charting.
     * The lowest tide level which can be predicted to occur under average meterological conditions and under any
     * combination of astronomical conditions.
     * Users are advised to not use this generic vertical datum but to define explicit realizations of LAT by
     * specifying location and epoch, for instance "LAT at xxx during yyyy-yyyy".
     */
    public const EPSG_LOWEST_ASTRONOMICAL_TIDE = 1080;

    /**
     * Lowest Astronomical Tide Netherlands
     * Type: vertical
     * Extent: Netherlands - offshore North Sea.
     * Scope: Hydrography and nautical charting.
     * Surface defined through the nllat hydroid model applied to ETRS89.
     * The lowest tide level which can be predicted to occur under average meterological conditions and under any
     * combination of astronomical conditions.
     */
    public const EPSG_LOWEST_ASTRONOMICAL_TIDE_NETHERLANDS = 1290;

    /**
     * Luxembourg 1930
     * Type: geodetic
     * Extent: Luxembourg.
     * Scope: Geodesy, cadastre, engineering survey, topographic mapping.
     * Fundamental point: northern station of Habay-la-Neuve baseline in Belgium. Latitude: 49°43'24.408"N, longitude:
     * 5°38'22.470"E (of Greenwich).
     */
    public const EPSG_LUXEMBOURG_1930 = 6181;

    /**
     * Luzon 1911
     * Type: geodetic
     * Extent: Philippines - onshore.
     * Scope: Topographic mapping.
     * Fundamental point: Balacan. Latitude: 13°33'41.000"N, longitude: 121°52'03.000"E (of Greenwich).
     * Replaced by Philippine Reference system of 1992 (datum code 6683).
     */
    public const EPSG_LUZON_1911 = 6253;

    /**
     * Lyttelton 1937
     * Type: vertical
     * Extent: New Zealand - South Island - between approximately 41°20'S and 45°S - Lyttleton vertical CRS area.
     * Scope: Geodesy, engineering survey, topographic mapping.
     * MSL at Lyttelton harbour over 9 years between 1918 and 1933.
     */
    public const EPSG_LYTTELTON_1937 = 5161;

    /**
     * M'poraloko
     * Type: geodetic
     * Extent: Gabon - onshore and offshore.
     * Scope: Topographic mapping.
     */
    public const EPSG_M_PORALOKO = 6266;

    /**
     * MGI 1901
     * Type: geodetic
     * Extent: Boznia and Herzegovina; Croatia - onshore; Kosovo; Montenegro - onshore; North Macedonia; Serbia;
     * Slovenia - onshore.
     * Scope: Geodesy.
     * Fundamental point: Hermannskogel. Latitude: 48°16'15.29"N, longitude: 16°17'55.04"E (of Greenwich).
     * The longitude of the datum origin equates to the Albrecht 1902 value for the Ferro meridian of 17°39'46.02"
     * west of Greenwich. Densified in 1948.
     */
    public const EPSG_MGI_1901 = 1031;

    /**
     * MML07 Intermediate Reference Frame
     * Type: geodetic
     * Extent: UK - on or related to the Midland Mainline rail route from Sheffield to London.
     * Scope: Engineering survey and topographic mapping for railway applications.
     * Defined through the application of the MML07 NTv2 transformation (code 9369) to ETRS89 as realized through OSNet
     * v2009 CORS.
     * Created in 2020 to support intermediate CRS "MML07-IRF" in the emulation of the MML07 Snake map projection.
     */
    public const EPSG_MML07_INTERMEDIATE_REFERENCE_FRAME = 1271;

    /**
     * MOLDREF99
     * Type: geodetic
     * Extent: Moldova.
     * Scope: Geodesy, cadastre, engineering survey, topographic mapping.
     * Densification of ETRS89.
     */
    public const EPSG_MOLDREF99 = 1032;

    /**
     * MOMRA Terrestrial Reference Frame 2000
     * Type: geodetic
     * Extent: Saudi Arabia - onshore and offshore.
     * Scope: Geodesy.
     * ITRF2000 at epoch 2004.00.
     * 13 CORS Fiducial Stations linked to 7 IGS stations by 10-day long GPS survey.
     */
    public const EPSG_MOMRA_TERRESTRIAL_REFERENCE_FRAME_2000 = 1218;

    /**
     * MOMRA Vertical Geodetic Control
     * Type: vertical
     * Extent: Saudi Arabia - onshore.
     * Scope: Geodesy, topographic mapping.
     * Mean sea level Jeddah 1969.
     */
    public const EPSG_MOMRA_VERTICAL_GEODETIC_CONTROL = 1219;

    /**
     * MOP78
     * Type: geodetic
     * Extent: Wallis and Futuna - Wallis.
     * Scope: Geodesy, cadastre, engineering survey, topographic mapping.
     */
    public const EPSG_MOP78 = 6639;

    /**
     * Macao 1920
     * Type: geodetic
     * Extent: China - Macao - onshore and offshore.
     * Scope: Geodesy, cadastre, engineering survey, topographic mapping.
     * Fundamental point: Avenida Conselheiro Borja base A, later transferred to Monte da Barra, latitude
     * 22°11'03.139"N, longitude 113°31'43.625"E (of Greenwich).
     * Replaces Macao 1907. In 1955 an adjustment made in 1940 was assessed to have unresolvable conflicts and the 1920
     * adjustment was reinstated.
     */
    public const EPSG_MACAO_1920 = 1207;

    /**
     * Macao Geodetic Datum 2008
     * Type: geodetic
     * Extent: China - Macao - onshore and offshore.
     * Scope: Geodesy.
     * ITRF2005 at epoch 2008.38.
     * Locally sometimes referred to as ITRF2005, this is not strictly correct as it applies only at epoch 2008.38 and
     * ignores subsequent tectonic plate motion.
     */
    public const EPSG_MACAO_GEODETIC_DATUM_2008 = 1208;

    /**
     * Macao Height Datum
     * Type: vertical
     * Extent: China - Macao - onshore and offshore.
     * Scope: Geodesy, engineering survey, topographic mapping.
     * Mean sea level Ma Kau Seak 1925-1964.
     */
    public const EPSG_MACAO_HEIGHT_DATUM = 1210;

    /**
     * Madrid 1870 (Madrid)
     * Type: geodetic
     * Extent: Spain - mainland onshore.
     * Scope: Topographic mapping.
     * Fundamental point: Retiro observatory, Madrid.
     * Replaced by ED50.
     */
    public const EPSG_MADRID_1870_MADRID = 6903;

    /**
     * Madzansua
     * Type: geodetic
     * Extent: Mozambique - west - Tete province.
     * Scope: Topographic mapping.
     * Fundamental point: Madzansua.
     * Replaced by transformation to Tete datum (datum code 6127).
     */
    public const EPSG_MADZANSUA = 6128;

    /**
     * Mahe 1971
     * Type: geodetic
     * Extent: Seychelles - Mahe Island.
     * Scope: Military survey.
     * Fundamental point: Station SITE. Latitude: 4°40'14.644"S, longitude: 55°28'44.488"E (of Greenwich).
     * South East Island 1943 (datum code 1138) used for topographic mapping, cadastral and hydrographic survey.
     */
    public const EPSG_MAHE_1971 = 6256;

    /**
     * Makassar
     * Type: geodetic
     * Extent: Indonesia - south west Sulawesi.
     * Scope: Topographic mapping.
     * Fundamental point: station P1, Moncongloe. Latitude: 5°08'41.42"S, long 119°24'14.94"E (of Greenwich).
     */
    public const EPSG_MAKASSAR = 6257;

    /**
     * Makassar (Jakarta)
     * Type: geodetic
     * Extent: Indonesia - south west Sulawesi.
     * Scope: Topographic mapping.
     * Fundamental point: station P1, Moncongloe. Latitude 5°08'41.42"S, longitude 12°35'47.15"E (of Jakarta).
     */
    public const EPSG_MAKASSAR_JAKARTA = 6804;

    /**
     * Malin Head
     * Type: vertical
     * Extent: Ireland - onshore. United Kingdom (UK) - Northern Ireland (Ulster) - onshore.
     * Scope: Topographic mapping.
     * Mean sea level between January 1960 and December 1969. Initially realised through levelling network adjustment,
     * from 2002 redefined to be realised through OSGM geoid model.
     * Orthometric heights.
     */
    public const EPSG_MALIN_HEAD = 5130;

    /**
     * Mallorca
     * Type: vertical
     * Extent: Spain - Balearic Islands - Mallorca onshore.
     * Scope: Geodesy, engineering survey, topographic mapping.
     * Mean Sea Level at Palma de Mallorca harbour between April 1997 and December 2006.
     * Orthometric heights.
     */
    public const EPSG_MALLORCA = 1275;

    /**
     * Malongo 1987
     * Type: geodetic
     * Extent: Angola (Cabinda) - offshore; The Democratic Republic of the Congo (Zaire) - offshore.
     * Scope: Oil and gas exploration and production.
     * Fundamental point: Station Y at Malongo base camp. Latitude: 5°23'30.810"S, longitude: 12°12'01.590"E (of
     * Greenwich).
     * Replaced Mhast (offshore) (code 6705) in 1987. Origin coordinates constrained to those of Mhast (offshore) but
     * other station coordinates differ. References to "Mhast" since 1987 often should have stated "Malongo 1987".
     */
    public const EPSG_MALONGO_1987 = 6259;

    /**
     * Manoca 1962
     * Type: geodetic
     * Extent: Cameroon - coastal area.
     * Scope: Topographic mapping.
     * Reservoir centre at the  Manoca tower ("tube Suel"), 3°51'49.896"N, 9°36'49.347"E (of Greenwich).
     * The intent of the Bukavu 1953 conference was to adopt the Clarke 1880 (RGS) ellipsoid (code 7012) but in
     * practice this datum has used the IGN version.  Replaces Douala 1948 (code 6192).
     */
    public const EPSG_MANOCA_1962 = 6193;

    /**
     * Maputo
     * Type: vertical
     * Extent: Mozambique - onshore.
     * Scope: Topographic mapping.
     * Mean sea level at Maputo.
     */
    public const EPSG_MAPUTO = 5121;

    /**
     * Marco Geocentrico Nacional de Referencia
     * Type: geodetic
     * Extent: Colombia - onshore and offshore. Includes San Andres y Providencia, Malpelo Islands, Roncador Bank,
     * Serrana Bank and Serranilla Bank.
     * Scope: Geodesy.
     * Densification of SIRGAS95 (ITRF94 at epoch 1995.4) in Colombia. Bogota observatory coordinates: Latitude:
     * 4°35'46.3215"N, longitude: 74°04'39.0285"W (of Greenwich).
     * Densification of SIRGAS 1995 within Colombia. Replaces Bogota 1975 (datum code 6218).
     */
    public const EPSG_MARCO_GEOCENTRICO_NACIONAL_DE_REFERENCIA = 6686;

    /**
     * Marco Geodesico Nacional de Bolivia
     * Type: geodetic
     * Extent: Bolivia.
     * Scope: Geodesy.
     * IGS05 (ITRF2005) at epoch 2010.2.  Densification of SIRGAS95 network in Bolivia, consisting of 125 passive
     * geodetic stations and 8 continuous recording GPS stations.
     * Densification of SIRGAS 1995 within Bolivia. Replaces PSAD56 (datum code 6248) in Bolivia.
     */
    public const EPSG_MARCO_GEODESICO_NACIONAL_DE_BOLIVIA = 1063;

    /**
     * Marcus Island 1952
     * Type: geodetic
     * Extent: Japan - onshore - Tokyo-to south of 28°N and east of 143°E - Minamitori-shima (Marcus Island).
     * Scope: Military survey.
     * Marcus Island Astronomic Station.
     */
    public const EPSG_MARCUS_ISLAND_1952 = 6711;

    /**
     * Marshall Islands 1960
     * Type: geodetic
     * Extent: Marshall Islands - onshore. Wake atoll onshore.
     * Scope: Military survey.
     */
    public const EPSG_MARSHALL_ISLANDS_1960 = 6732;

    /**
     * Martinique 1938
     * Type: geodetic
     * Extent: Martinique - onshore.
     * Scope: Geodesy, cadastre, engineering survey, topographic mapping.
     * Fundamental point: Fort Desaix. Latitude: 14°36'54.090"N, longitude: 61°04'04.030"W (of Greenwich).
     * Replaced by RRAF 1991 (datum code 1047).
     */
    public const EPSG_MARTINIQUE_1938 = 6625;

    /**
     * Martinique 1955
     * Type: vertical
     * Extent: Martinique - onshore.
     * Scope: Geodesy, engineering survey, topographic mapping.
     * Mean sea level at Fort de France 1939. Marker DO-4-II on quay wall with elevation of 1.38m above msl.
     * Orthometric heights. Replaced by Martinique 1987 (datum code 5154).
     */
    public const EPSG_MARTINIQUE_1955 = 5192;

    /**
     * Martinique 1987
     * Type: vertical
     * Extent: Martinique - onshore.
     * Scope: Geodesy, engineering survey, topographic mapping.
     * Mean sea level 1939 at Fort de France. Origin = marker Nbc2 on rebuilt quay wall with defined elevation of 1.38m
     * above msl. Martinique 1987 height 0.00m is 0.56m above SHOM sounding datum.
     * Orthometric heights. Replaces Martinique 1955 (datum code 5192).
     */
    public const EPSG_MARTINIQUE_1987 = 5154;

    /**
     * Massawa
     * Type: geodetic
     * Extent: Eritrea - onshore and offshore.
     * Scope: Topographic mapping.
     */
    public const EPSG_MASSAWA = 6262;

    /**
     * Maupiti 83
     * Type: geodetic
     * Extent: French Polynesia - Society Islands - Maupiti.
     * Scope: Hydrography, topographic mapping.
     * Fundamental point: Pitiahe South Base. Latitude: 16°28'28.942"S, longitude: 152°14'55.059"W (of Greenwich).
     * Replaced by RGPF (datum code 6687).
     */
    public const EPSG_MAUPITI_83 = 6692;

    /**
     * Maupiti SAU 2001
     * Type: vertical
     * Extent: French Polynesia - Society Islands - Maupiti.
     * Scope: Geodesy, engineering survey, topographic mapping.
     * Fundamental benchmark: RN11
     * Included as part of NGPF - see datum code 5195.
     */
    public const EPSG_MAUPITI_SAU_2001 = 5199;

    /**
     * Mauritania 1999
     * Type: geodetic
     * Extent: Mauritania - onshore and offshore.
     * Scope: Geodesy.
     * ITRF96 at epoch 1997.0
     * A network of 36 GPS stations tied to ITRF96, 8 of which are IGN 1962 astronomic points.
     */
    public const EPSG_MAURITANIA_1999 = 6702;

    /**
     * Mayotte 1950
     * Type: vertical
     * Extent: Mayotte - onshore.
     * Scope: Geodesy, engineering survey, topographic mapping.
     * Marker on Issoufali jetty at Dzaoudzi. Height is 2.18m above zero of tide gauge.
     */
    public const EPSG_MAYOTTE_1950 = 5191;

    /**
     * Mean High Water
     * Type: vertical
     * Extent: World.
     * Scope: Hydrography and nautical charting.
     * The average height of the high waters at a place over a 19-year period.
     * Users are advised to not use this generic vertical datum but to define explicit realizations of MHW by
     * specifying location and epoch, for instance "MHW at xxx during yyyy-yyyy".
     */
    public const EPSG_MEAN_HIGH_WATER = 1092;

    /**
     * Mean High Water Spring Tides
     * Type: vertical
     * Extent: World.
     * Scope: Hydrography and nautical charting.
     * The average height of the high waters of spring tides.
     * Users are advised to not use this generic vertical datum but to define explicit realizations of MHWS by
     * specifying location and epoch, for instance "MHWS at xxx during yyyy-yyyy".
     */
    public const EPSG_MEAN_HIGH_WATER_SPRING_TIDES = 1088;

    /**
     * Mean Higher High Water
     * Type: vertical
     * Extent: World.
     * Scope: Hydrography and nautical charting.
     * The average height of the higher high waters at a place over a 19-year period.
     * Users are advised to not use this generic vertical datum but to define explicit realizations of MHHW by
     * specifying location and epoch, for instance "MHHW at xxx during yyyy-yyyy".
     */
    public const EPSG_MEAN_HIGHER_HIGH_WATER = 1090;

    /**
     * Mean Low Water
     * Type: vertical
     * Extent: World.
     * Scope: Hydrography and nautical charting.
     * The average height of all low waters at a place over a 19-year period.
     * Users are advised to not use this generic vertical datum but to define explicit realizations of MLW by
     * specifying location and epoch, for instance "MLW at xxx during yyyy-yyyy".
     */
    public const EPSG_MEAN_LOW_WATER = 1091;

    /**
     * Mean Low Water Spring Tides
     * Type: vertical
     * Extent: World.
     * Scope: Hydrography and nautical charting.
     * The average height of the low waters of spring tides.
     * Users are advised to not use this generic vertical datum but to define explicit realizations of MLWS by
     * specifying location and epoch, for instance "MLWS at xxx during yyyy-yyyy".
     */
    public const EPSG_MEAN_LOW_WATER_SPRING_TIDES = 1087;

    /**
     * Mean Lower Low Water
     * Type: vertical
     * Extent: World.
     * Scope: Hydrography and nautical charting.
     * The average height of the lower low waters at a place over a 19-year period.
     * Users are advised to not use this generic vertical datum but to define explicit realizations of MLLW by
     * specifying location and epoch, for instance "MLLW at xxx during yyyy-yyyy".
     */
    public const EPSG_MEAN_LOWER_LOW_WATER = 1089;

    /**
     * Mean Lower Low Water Spring Tides
     * Type: vertical
     * Extent: World.
     * Scope: Hydrography and nautical charting.
     * The average height of the lower low water spring tides at a place.
     * Users are advised to not use this generic vertical datum but to define explicit realizations of MLLWS by
     * specifying location and epoch, for instance "MLLWS at xxx during yyyy-yyyy".
     */
    public const EPSG_MEAN_LOWER_LOW_WATER_SPRING_TIDES = 1086;

    /**
     * Mean Sea Level
     * Type: vertical
     * Extent: World.
     * Scope: Hydrography, drilling.
     * The average height of the surface of the sea at a tide station for all stages of the tide over a 19-year period,
     * usually determined from hourly height readings measured from a fixed predetermined reference level.
     * Approximates geoid. Users are advised to not use this generic vertical datum but to define explicit realizations
     * of MSL by specifying location and epoch, for instance "MSL at xxx during yyyy-yyyy".
     */
    public const EPSG_MEAN_SEA_LEVEL = 5100;

    /**
     * Mean Sea Level Netherlands
     * Type: vertical
     * Extent: Netherlands - offshore North Sea.
     * Scope: Hydrography, drilling, offshore engineering.
     * Surface defined through the nlgeo geoid model applied to ETRS89.
     * Coincides with NAP datum plane. Approximates physical mean sea surface to a few decimetres.
     */
    public const EPSG_MEAN_SEA_LEVEL_NETHERLANDS = 1270;

    /**
     * Menorca
     * Type: vertical
     * Extent: Spain - Balearic Islands - Menorca onshore.
     * Scope: Geodesy, engineering survey, topographic mapping.
     * Mean Sea Level at Ciutadella harbour between June 2007 and June 2008.
     * Orthometric heights.
     */
    public const EPSG_MENORCA = 1276;

    /**
     * Merchich
     * Type: geodetic
     * Extent: Africa - Morocco and Western Sahara - onshore.
     * Scope: Topographic mapping.
     * Fundamental point: Merchich. Latitude: 33°26'59.672"N, longitude: 7°33'27.295"W (of Greenwich).
     */
    public const EPSG_MERCHICH = 6261;

    /**
     * Mexico ITRF2008
     * Type: geodetic
     * Extent: Mexico - onshore and offshore.
     * Scope: Geodesy.
     * ITRF2008 at epoch 2010.00.
     * Realised by a frame of 15 active GPS stations observed and adjusted in the ITRF2008. Includes ties to tide
     * gauges. Replaces Mexico ITRF92 (datum code 1042).
     */
    public const EPSG_MEXICO_ITRF2008 = 1120;

    /**
     * Mexico ITRF92
     * Type: geodetic
     * Extent: Mexico - onshore and offshore.
     * Scope: Geodesy.
     * ITRF1992 at epoch 1988.00.
     * Realized by a frame of 15 active GPS stations observed and adjusted in the ITRF1992. Includes ties to tide
     * gauges. Replaces NAD27 (datum code 6267). Replaced by Mexico ITRF2008 (datum code 1120) from December 2010.
     */
    public const EPSG_MEXICO_ITRF92 = 1042;

    /**
     * Mhast (offshore)
     * Type: geodetic
     * Extent: Angola (Cabinda) - offshore; The Democratic Republic of the Congo (Zaire) - offshore.
     * Scope: Oil and gas exploration and production.
     * Fundamental point: Station Y at Malongo base camp. Latitude: 5°23'30.810"S, longitude: 12°12'01.590"E (of
     * Greenwich).
     * Origin coordinates determined by Transit single point position using 32 passes and transformed from WGS72BE
     * using transformation code 15790. Differs from Mhast (onshore) by approximately 10m. Replaced in 1987 by Malongo
     * 1987 (code 6259).
     */
    public const EPSG_MHAST_OFFSHORE = 6705;

    /**
     * Mhast (onshore)
     * Type: geodetic
     * Extent: Angola (Cabinda) - onshore and offshore; The Democratic Republic of the Congo (Zaire) - onshore coastal
     * area and offshore.
     * Scope: Oil and gas exploration and production.
     * Probably adopted a Mhast 1951 coordinate set but associated an incorrect ellipsoid with it.
     * Adopted by oil industry with intention of being Mhast 1951 (code 6703) but incorrectly (for Mhast 1951) used the
     * International 1924 ellipsoid. This datum differs by about 400 metres from the Portuguese Mhast 1951 and Camacupa
     * datums.
     */
    public const EPSG_MHAST_ONSHORE = 6704;

    /**
     * Midway 1961
     * Type: geodetic
     * Extent: United States Minor Outlying Islands - Midway Islands - Sand Island and Eastern Island.
     * Scope: Military survey.
     */
    public const EPSG_MIDWAY_1961 = 6727;

    /**
     * Militar-Geographische Institut
     * Type: geodetic
     * Extent: Austria.
     * Scope: Geodesy.
     * Fundamental point: Hermannskogel. Latitude: 48°16'15.29"N, longitude: 16°17'41.06"E (of Greenwich).
     * The longitude of the datum origin equates to a value for the Ferro meridian of 17°40' exactly west of
     * Greenwich.
     */
    public const EPSG_MILITAR_GEOGRAPHISCHE_INSTITUT = 6312;

    /**
     * Militar-Geographische Institut (Ferro)
     * Type: geodetic
     * Extent: Austria. Bosnia and Herzegovina. Croatia - onshore. Kosovo. Montenegro - onshore. North Macedonia.
     * Serbia. Slovenia - onshore.
     * Scope: Geodesy.
     * Fundamental point: Hermannskogel. Latitude: 48°16'15.29"N, longitude: 33°57'41.06"E (of Ferro).
     * Replaced by MGI in Austria and MGI 1901 in former Yugoslavia.
     */
    public const EPSG_MILITAR_GEOGRAPHISCHE_INSTITUT_FERRO = 6805;

    /**
     * Ministerio de Marina Norte
     * Type: geodetic
     * Extent: Argentina - Tierra del Fuego onshore.
     * Scope: Oil and gas exploration and production.
     *
     * Developed by the Servicio de Hidrografia Naval.
     */
    public const EPSG_MINISTERIO_DE_MARINA_NORTE = 1258;

    /**
     * Ministerio de Marina Sur
     * Type: geodetic
     * Extent: Argentina - Tierra del Fuego onshore.
     * Scope: Oil and gas exploration and production.
     *
     * Developed by the Servicio de Hidrografia Naval.
     */
    public const EPSG_MINISTERIO_DE_MARINA_SUR = 1259;

    /**
     * Minna
     * Type: geodetic
     * Extent: Nigeria - onshore and offshore.
     * Scope: Topographic mapping.
     * Fundamental point: Minna base station L40. Latitude: 9°38'08.87"N, longitude: 6°30'58.76"E (of Greenwich).
     */
    public const EPSG_MINNA = 6263;

    /**
     * Missao Hidrografico Angola y Sao Tome 1951
     * Type: geodetic
     * Extent: Angola - Cabinda.
     * Scope: Coastal hydrography.
     * Extension of Camacupa datum into Cabinda.
     * A variation of this datum has been adopted by the oil industry but incorrectly using the International 1924
     * ellipsoid and not tied to the official Portuguese triangulation - see Mhast (onshore) and Mhast (offshore)
     * (codes 6704 and 6705).
     */
    public const EPSG_MISSAO_HIDROGRAFICO_ANGOLA_Y_SAO_TOME_1951 = 6703;

    /**
     * Monte Mario
     * Type: geodetic
     * Extent: Italy - onshore and offshore; San Marino, Vatican City State.
     * Scope: Topographic mapping.
     * Fundamental point: Monte Mario. Latitude: 41°55'25.51"N, longitude: 12°27'08.4"E (of Greenwich).
     * Replaced Genova datum, Bessel 1841 ellipsoid, from 1940.
     */
    public const EPSG_MONTE_MARIO = 6265;

    /**
     * Monte Mario (Rome)
     * Type: geodetic
     * Extent: Italy - onshore and offshore; San Marino, Vatican City State.
     * Scope: Topographic mapping.
     * Fundamental point: Monte Mario. Latitude: 41°55'25.51"N, longitude: 0°00' 00.00"E (of Rome).
     * Replaced Genova datum, Bessel 1841 ellipsoid, from 1940.
     */
    public const EPSG_MONTE_MARIO_ROME = 6806;

    /**
     * Montserrat 1958
     * Type: geodetic
     * Extent: Montserrat - onshore.
     * Scope: Topographic mapping.
     * Fundamental point: station M36.
     */
    public const EPSG_MONTSERRAT_1958 = 6604;

    /**
     * Moorea 87
     * Type: geodetic
     * Extent: French Polynesia - Society Islands - Moorea.
     * Scope: Hydrography, topographic mapping.
     * Two stations on Tahiti whose coordinates from the Tahiti 1979 adjustment were held fixed.
     * Replaces Tahiti 52 (datum code 6628) in Moorea. Replaced by RGPF (datum code 6687).
     */
    public const EPSG_MOOREA_87 = 6691;

    /**
     * Moorea SAU 1981
     * Type: vertical
     * Extent: French Polynesia - Society Islands - Moorea.
     * Scope: Geodesy, engineering survey, topographic mapping.
     * Fundamental benchmark: RN225
     * Included as part of NGPF - see datum code 5195.
     */
    public const EPSG_MOOREA_SAU_1981 = 5197;

    /**
     * Moturiki 1953
     * Type: vertical
     * Extent: New Zealand - North Island - Moturiki vertical CRS area.
     * Scope: Geodesy, engineering survey, topographic mapping.
     * MSL at Moturiki Island February 1949 to December 1952.
     */
    public const EPSG_MOTURIKI_1953 = 5162;

    /**
     * Mount Dillon
     * Type: geodetic
     * Extent: Trinidad and Tobago - Tobago - onshore.
     * Scope: Topographic mapping.
     * Fundamental point: Mount Dillon triangulation station. Latitude: 11°15'07.843"N, longitude: 60°41'09.632"W (of
     * Greenwich).
     */
    public const EPSG_MOUNT_DILLON = 6157;

    /**
     * Moznet (ITRF94)
     * Type: geodetic
     * Extent: Mozambique - onshore and offshore.
     * Scope: Topographic mapping.
     * ITRF94 at epoch 1996.9.
     */
    public const EPSG_MOZNET_ITRF94 = 6130;

    /**
     * N2000
     * Type: vertical
     * Extent: Finland - onshore.
     * Scope: Geodesy, topographic mapping.
     * Height at Metsaahovi (latitude 60.21762°N, longitude 24.39517°E) of 54.4233m related to EVRF2000 origin
     * through Baltic Levelling Ring adjustment at epoch 2000.0.
     * Realized through the third precise levelling network. Uses normal heights. Replaces N43 and N60 (datum codes
     * 1213 and 5116). To account for isostatic land uplift use NKG2005 model.
     */
    public const EPSG_N2000 = 1030;

    /**
     * NAD83 (Continuously Operating Reference Station 1996)
     * Type: geodetic
     * Extent: Puerto Rico - onshore and offshore. United States (USA) onshore and offshore - Alabama; Alaska; Arizona;
     * Arkansas; California; Colorado; Connecticut; Delaware; Florida; Georgia; Idaho; Illinois; Indiana; Iowa; Kansas;
     * Kentucky; Louisiana; Maine; Maryland; Massachusetts; Michigan; Minnesota; Mississippi; Missouri; Montana;
     * Nebraska; Nevada; New Hampshire; New Jersey; New Mexico; New York; North Carolina; North Dakota; Ohio; Oklahoma;
     * Oregon; Pennsylvania; Rhode Island; South Carolina; South Dakota; Tennessee; Texas; Utah; Vermont; Virginia;
     * Washington; West Virginia; Wisconsin; Wyoming. US Virgin Islands - onshore and offshore.
     * Scope: Geodesy.
     * Defined by time-dependent transformations from ITRF. The ITRF realisation and tfm used has been changed
     * periodically; ITRF96 in years 1997 through 1999, ITRF97 in 2000 and 2001 and ITRF2000 from 2002 (see tfm codes
     * 6864-6866 respectively).
     * Replaced by NAD83(2011) from 2011-09-06.
     */
    public const EPSG_NAD83_CONTINUOUSLY_OPERATING_REFERENCE_STATION_1996 = 1133;

    /**
     * NAD83 (Federal Base Network)
     * Type: geodetic
     * Extent: American Samoa - Tutuila, Aunu'u, Ofu, Olesega, Ta'u and Rose islands - onshore. Guam - onshore.
     * Northern Mariana Islands - onshore. Puerto Rico - onshore. United States (USA) - CONUS - Alabama; Arizona;
     * Arkansas; California; Colorado; Connecticut; Delaware; Florida; Georgia; Idaho; Illinois; Indiana; Iowa; Kansas;
     * Kentucky; Louisiana; Maine; Maryland; Massachusetts; Michigan; Minnesota; Mississippi; Missouri; Montana;
     * Nebraska; Nevada; New Hampshire; New Jersey; New Mexico; New York; North Carolina; North Dakota; Ohio; Oklahoma;
     * Oregon; Pennsylvania; Rhode Island; South Carolina; South Dakota; Tennessee; Texas; Utah; Vermont; Virginia;
     * Washington; West Virginia; Wisconsin; Wyoming - onshore plus Gulf of Mexico offshore continental shelf (GoM
     * OCS). US Virgin Islands - onshore.
     * Scope: Geodesy.
     * A collection of individual state-wide adjustments including GPS observations made between 1997 and 2004.
     * In CA CT FL ID MA ME MT NC NH NJ NV NY OR RI SC TN VT WA and WI, replaces the early 1990s HARN adjustment. In
     * rest of CONUS the difference between the HARN and FBN adjustments was under 5cm and the original HARN
     * adjustments were adopted as NAD83(FBN).
     */
    public const EPSG_NAD83_FEDERAL_BASE_NETWORK = 1211;

    /**
     * NAD83 (High Accuracy Reference Network - Corrected)
     * Type: geodetic
     * Extent: Puerto Rico and US Virgin Islands - onshore.
     * Scope: Geodesy.
     *
     * In PRVI replaces NAD83(HARN) to correct errors. Replaced by NAD83(FBN).
     */
    public const EPSG_NAD83_HIGH_ACCURACY_REFERENCE_NETWORK_CORRECTED = 1212;

    /**
     * NAD83 (High Accuracy Reference Network)
     * Type: geodetic
     * Extent: American Samoa - onshore - Tutuila, Aunu'u, Ofu, Olesega, Ta'u and Rose islands. Guam - onshore.
     * Northern Mariana Islands - onshore. Puerto Rico - onshore. United States (USA) - onshore Alabama, Alaska,
     * Arizona, Arkansas, California, Colorado, Connecticut, Delaware, Florida, Georgia, Hawaii, Idaho, Illinois,
     * Indiana, Iowa, Kansas, Kentucky, Louisiana, Maine, Maryland, Massachusetts, Michigan, Minnesota, Mississippi,
     * Missouri, Montana, Nebraska, Nevada, New Hampshire, New Jersey, New Mexico, New York, North Carolina, North
     * Dakota, Ohio, Oklahoma, Oregon, Pennsylvania, Rhode Island, South Carolina, South Dakota, Tennessee, Texas,
     * Utah, Vermont, Virginia, Washington, West Virginia, Wisconsin and Wyoming; offshore Gulf of Mexico continental
     * shelf (GoM OCS). US Virgin Islands - onshore.
     * Scope: Geodesy.
     * A collection of individual state-wide adjustments including GPS observations made between 1991 and 1996.
     * In CONUS, American Samoa and Guam replaced by NAD83(FBN). In Alaska replaced by NAD83(NSRS2007). In Hawaii
     * replaced by NAD83(PA11). In Puerto Rico and US Virgin Islands replaced by NAD83(HARN Corrected).
     */
    public const EPSG_NAD83_HIGH_ACCURACY_REFERENCE_NETWORK = 6152;

    /**
     * NAD83 (National Spatial Reference System 2007)
     * Type: geodetic
     * Extent: Puerto Rico - onshore and offshore. United States (USA) onshore and offshore - Alabama; Alaska; Arizona;
     * Arkansas; California; Colorado; Connecticut; Delaware; Florida; Georgia; Idaho; Illinois; Indiana; Iowa; Kansas;
     * Kentucky; Louisiana; Maine; Maryland; Massachusetts; Michigan; Minnesota; Mississippi; Missouri; Montana;
     * Nebraska; Nevada; New Hampshire; New Jersey; New Mexico; New York; North Carolina; North Dakota; Ohio; Oklahoma;
     * Oregon; Pennsylvania; Rhode Island; South Carolina; South Dakota; Tennessee; Texas; Utah; Vermont; Virginia;
     * Washington; West Virginia; Wisconsin; Wyoming. US Virgin Islands - onshore and offshore.
     * Scope: Geodesy.
     * Coordinates of 486 national continually operating reference system (CORS) and 195 collaborative GPS (CGPS) sites
     * constrained to their CORS96 values, ITRF2000 at epoch 2002.0.
     * Replaced by NAD83 (National Spatial Reference System 2011), datum code 1116.
     */
    public const EPSG_NAD83_NATIONAL_SPATIAL_REFERENCE_SYSTEM_2007 = 6759;

    /**
     * NAD83 (National Spatial Reference System 2011)
     * Type: geodetic
     * Extent: Puerto Rico - onshore and offshore. United States (USA) onshore and offshore - Alabama; Alaska; Arizona;
     * Arkansas; California; Colorado; Connecticut; Delaware; Florida; Georgia; Idaho; Illinois; Indiana; Iowa; Kansas;
     * Kentucky; Louisiana; Maine; Maryland; Massachusetts; Michigan; Minnesota; Mississippi; Missouri; Montana;
     * Nebraska; Nevada; New Hampshire; New Jersey; New Mexico; New York; North Carolina; North Dakota; Ohio; Oklahoma;
     * Oregon; Pennsylvania; Rhode Island; South Carolina; South Dakota; Tennessee; Texas; Utah; Vermont; Virginia;
     * Washington; West Virginia; Wisconsin; Wyoming. US Virgin Islands - onshore and offshore.
     * Scope: Geodesy.
     * Coordinates of a nationwide adjustment of 79,546 NGS "passive" control stations in CONUS and Alaska, constrained
     * to 1,171 current CORS station coordinates at epoch 2010.0.
     * Replaces NAD83(NSRS2007). Transformaton code 7807 from ITRF2008 is understood to underlay the  CORS station
     * coordinates.
     */
    public const EPSG_NAD83_NATIONAL_SPATIAL_REFERENCE_SYSTEM_2011 = 1116;

    /**
     * NAD83 (National Spatial Reference System MA11)
     * Type: geodetic
     * Extent: Guam, Northern Mariana Islands and Palau; onshore and offshore.
     * Scope: Geodesy.
     * Coordinates of a nationwide adjustment including 171 NGS "passive" control stations constrained to 24 current
     * Pacific CORS station coordinates at epoch 2010.0.
     * Replaces NAD83(HARN) (GGN93) and NAD83(FBN) in Guam. ITRF2008 is understood to underlay the latest CORS station
     * coordinates.
     */
    public const EPSG_NAD83_NATIONAL_SPATIAL_REFERENCE_SYSTEM_MA11 = 1118;

    /**
     * NAD83 (National Spatial Reference System PA11)
     * Type: geodetic
     * Extent: American Samoa, Marshall Islands, United States (USA) - Hawaii, United States minor outlying islands;
     * onshore and offshore.
     * Scope: Geodesy.
     * Coordinates of a nationwide adjustment including 345 NGS "passive" control stations constrained to 24 current
     * Pacific CORS station coordinates at epoch 2010.0.
     * Replaces NAD83(HARN) and NAD83(FBN) in Hawaii and American Samoa. ITRF2008 is understood to underlay the latest
     * CORS station coordinates.
     */
    public const EPSG_NAD83_NATIONAL_SPATIAL_REFERENCE_SYSTEM_PA11 = 1117;

    /**
     * NAD83 Canadian Spatial Reference System
     * Type: geodetic
     * Extent: Canada - onshore and offshore - Alberta; British Columbia; Manitoba; New Brunswick; Newfoundland and
     * Labrador; Northwest Territories; Nova Scotia; Nunavut; Ontario; Prince Edward Island; Quebec; Saskatchewan;
     * Yukon.
     * Scope: GIS.
     *
     * Includes all versions of NAD83(CSRS) from v2 [CSRS98] onwards without specific identification. As such it has an
     * accuracy of approximately 1m.
     */
    public const EPSG_NAD83_CANADIAN_SPATIAL_REFERENCE_SYSTEM = 6140;

    /**
     * NEA74 Noumea
     * Type: geodetic
     * Extent: New Caledonia - Grande Terre - Noumea district.
     * Scope: Geodesy, cadastre, engineering survey, topographic mapping.
     * Noumea old signal station.
     */
    public const EPSG_NEA74_NOUMEA = 6644;

    /**
     * NGO 1948
     * Type: geodetic
     * Extent: Norway - onshore.
     * Scope: Geodesy, cadastre, engineering survey, topographic mapping.
     * Fundamental point: Oslo observatory. Latitude: 59°54'43.7"N, longitude: 10°43'22.5"E (of Greenwich).
     */
    public const EPSG_NGO_1948 = 6273;

    /**
     * NGO 1948 (Oslo)
     * Type: geodetic
     * Extent: Norway - onshore.
     * Scope: Geodesy, cadastre, engineering survey, topographic mapping.
     * Fundamental point: Oslo observatory. Latitude: 59°54'43.7"N, longitude: 0°00'00.0"E (of Oslo).
     */
    public const EPSG_NGO_1948_OSLO = 6817;

    /**
     * NSWC 9Z-2
     * Type: geodetic
     * Extent: World.
     * Scope: Satellite navigation.
     *
     * Transit precise ephemeris before 1991.
     */
    public const EPSG_NSWC_9Z_2 = 6276;

    /**
     * Nahrwan 1934
     * Type: geodetic
     * Extent: Iraq - onshore; Iran - onshore northern Gulf coast and west bordering southeast Iraq.
     * Scope: Oil and gas exploration and production.
     * Fundamental point: Nahrwan south base.  Latitude: 33°19'10.87"N, longitude: 44°43'25.54"E (of Greenwich).
     * This adjustment later discovered to have a significant orientation error. In Iran replaced by FD58. In Iraq,
     * replaced by Karbala 1979.
     */
    public const EPSG_NAHRWAN_1934 = 6744;

    /**
     * Nahrwan 1967
     * Type: geodetic
     * Extent: Arabian Gulf; Qatar - offshore; United Arab Emirates (UAE) - Abu Dhabi; Dubai; Sharjah; Ajman; Fujairah;
     * Ras Al Kaimah; Umm Al Qaiwain - onshore and offshore.
     * Scope: Topographic mapping.
     * Fundamental point: Nahrwan south base.  Latitude: 33°19'10.87"N, longitude: 44°43'25.54"E (of Greenwich).
     */
    public const EPSG_NAHRWAN_1967 = 6270;

    /**
     * Nakhl-e Ghanem
     * Type: geodetic
     * Extent: Iran - Kangan district.
     * Scope: Engineering survey for onshore facilities for South Pars phase 11 and Pars LNG.
     * Coordinates of two stations determined with respect to ITRF 2000 at epoch 2005.2: BMT1 latitude
     * 27°42'09.8417"N, longitude 52°12'11.0362"E (of Greenwich); Total1 latitude 27°31'03.8896"N, longitude
     * 52°36'13.1312"E (of Greenwich).
     */
    public const EPSG_NAKHL_E_GHANEM = 6693;

    /**
     * Naparima 1955
     * Type: geodetic
     * Extent: Trinidad and Tobago - Trinidad - onshore.
     * Scope: Topographic mapping.
     * Fundamental point: Naparima. Latitude: 10°16'44.860"N, longitude: 61°27'34.620"W (of Greenwich).
     * Extended to Tobago as Naparima 1972. (Note: Naparima 1972 is not used in Trinidad).
     */
    public const EPSG_NAPARIMA_1955 = 6158;

    /**
     * Naparima 1972
     * Type: geodetic
     * Extent: Trinidad and Tobago - Tobago - onshore.
     * Scope: Topographic mapping.
     * Fundamental point: Naparima. Latitude: 10°16'44.860"N, longitude: 61°27'34.620"W (of Greenwich).
     * Naparima 1972 is an extension to Tobago of the Naparima 1955 network of Trinidad.
     */
    public const EPSG_NAPARIMA_1972 = 6271;

    /**
     * Napier 1962
     * Type: vertical
     * Extent: New Zealand - North Island - Hawkes Bay meridional circuit and Napier vertical crs area.
     * Scope: Geodesy, engineering survey, topographic mapping.
     * MSL at Napier harbour. Period of derivation unknown.
     */
    public const EPSG_NAPIER_1962 = 5163;

    /**
     * National Geodetic Network
     * Type: geodetic
     * Extent: Kuwait - onshore.
     * Scope: Geodesy.
     *
     * Replaces 1984 adjustment which used the WGS72 ellipsoid.
     */
    public const EPSG_NATIONAL_GEODETIC_NETWORK = 6318;

    /**
     * National Geodetic Vertical Datum 1929
     * Type: vertical
     * Extent: United States (USA) - CONUS onshore - Alabama; Arizona; Arkansas; California; Colorado; Connecticut;
     * Delaware; Florida; Georgia; Idaho; Illinois; Indiana; Iowa; Kansas; Kentucky; Louisiana; Maine; Maryland;
     * Massachusetts; Michigan; Minnesota; Mississippi; Missouri; Montana; Nebraska; Nevada; New Hampshire; New Jersey;
     * New Mexico; New York; North Carolina; North Dakota; Ohio; Oklahoma; Oregon; Pennsylvania; Rhode Island; South
     * Carolina; South Dakota; Tennessee; Texas; Utah; Vermont; Virginia; Washington; West Virginia; Wisconsin;
     * Wyoming.
     * Scope: Geodesy, topographic mapping.
     * 26 tide gauges in the US and Canada.
     * Normal orthometric heights.
     */
    public const EPSG_NATIONAL_GEODETIC_VERTICAL_DATUM_1929 = 5102;

    /**
     * Nelson 1955
     * Type: vertical
     * Extent: New Zealand - South Island - north of approximately 42°20'S - Nelson vertical CRS area.
     * Scope: Geodesy, engineering survey, topographic mapping.
     * MSL at Nelson harbour 1939-1942.
     */
    public const EPSG_NELSON_1955 = 5164;

    /**
     * Nepal 1981
     * Type: geodetic
     * Extent: Nepal.
     * Scope: Geodesy, topographic mapping.
     * Fundamental point: Station 12/157 Nagarkot. Latitude: 27°41'31.04"N, longitude: 85°31'20.23"E (of Greenwich).
     */
    public const EPSG_NEPAL_1981 = 1111;

    /**
     * New Beijing
     * Type: geodetic
     * Extent: China - onshore.
     * Scope: Topographic mapping.
     * Derived by conformal transformation of Xian 1980 adjustment onto Krassowsky ellipsoid.
     * From 1982 replaces Beijing 1954.
     */
    public const EPSG_NEW_BEIJING = 1045;

    /**
     * New Zealand Geodetic Datum 1949
     * Type: geodetic
     * Extent: New Zealand - North Island, South Island, Stewart Island - onshore and nearshore.
     * Scope: Geodesy, cadastre, engineering survey, topographic mapping.
     * Fundamental point: Papatahi. Latitude: 41°19' 8.900"S, longitude: 175°02'51.000"E (of Greenwich).
     * Replaced by New Zealand Geodetic Datum 2000 (code 6167) from March 2000.
     */
    public const EPSG_NEW_ZEALAND_GEODETIC_DATUM_1949 = 6272;

    /**
     * New Zealand Geodetic Datum 2000
     * Type: geodetic
     * Extent: New Zealand - onshore and offshore. Includes Antipodes Islands, Auckland Islands, Bounty Islands,
     * Chatham Islands, Cambell Island, Kermadec Islands, Raoul Island and Snares Islands.
     * Scope: Geodesy, cadastre, engineering survey, topographic mapping.
     * Based on ITRF96 at epoch 2000.0
     * Replaces New Zealand Geodetic Datum 1949 (code 6272) and Chatham Islands Datum 1979 (code 6673) from March 2000.
     */
    public const EPSG_NEW_ZEALAND_GEODETIC_DATUM_2000 = 6167;

    /**
     * New Zealand Vertical Datum 2009
     * Type: vertical
     * Extent: New Zealand - onshore and offshore. Includes Antipodes Islands, Auckland Islands, Bounty Islands,
     * Chatham Islands, Cambell Island, Kermadec Islands, Raoul Island and Snares Islands.
     * Scope: Geodesy, engineering survey, topographic mapping.
     * New Zealand Quasigeoid 2009 which is defined by the application of the NZ geoid 2009 grid to NZGD2000
     * ellipsoidal heights. See transformation code 4459.
     */
    public const EPSG_NEW_ZEALAND_VERTICAL_DATUM_2009 = 1039;

    /**
     * New Zealand Vertical Datum 2016
     * Type: vertical
     * Extent: New Zealand - onshore and offshore. Includes Antipodes Islands, Auckland Islands, Bounty Islands,
     * Chatham Islands, Cambell Island, Kermadec Islands, Raoul Island and Snares Islands.
     * Scope: Geodesy, engineering survey, topographic mapping.
     * New Zealand quasigeoid 2016 which is defined by the application of the NZ geoid 2016 grid to NZGD2000
     * ellipsoidal heights. See transformation code 7840.
     */
    public const EPSG_NEW_ZEALAND_VERTICAL_DATUM_2016 = 1169;

    /**
     * Nivellement General Guyanais 1977
     * Type: vertical
     * Extent: French Guiana - onshore.
     * Scope: Geodesy, engineering survey, topographic mapping.
     * Mean sea level 1936 at Cayenne. Origin = marker BM35 on stone on St Francois battery, Cayenne, with defined
     * elevation of 1.64m above msl. NGG1977 height 0.00m is 1.96m above sounding datum defined at Cayenne in 1936 by
     * SHM.
     * Orthometric heights.
     */
    public const EPSG_NIVELLEMENT_GENERAL_GUYANAIS_1977 = 5153;

    /**
     * Nivellement General de Nouvelle Caledonie
     * Type: vertical
     * Extent: New Caledonia - Grande Terre.
     * Scope: Geodesy, engineering survey, topographic mapping.
     * Rivet AB01 established by SHOM (Service Hydrographique de la Marine)  in 1937 on the Quai des Volontaires in
     * Noumea. Height i: 1.885 metre above mean sea level.
     * Orthometric heights.
     */
    public const EPSG_NIVELLEMENT_GENERAL_DE_NOUVELLE_CALEDONIE = 5151;

    /**
     * Nivellement General de Nouvelle Caledonie 2008
     * Type: vertical
     * Extent: New Caledonia - Belep, Grande Terre, Ile des Pins, Loyalty Islands (Lifou, Mare, Ouvea).
     * Scope: Spatial referencing.
     *
     * Normal heights.
     */
    public const EPSG_NIVELLEMENT_GENERAL_DE_NOUVELLE_CALEDONIE_2008 = 1255;

    /**
     * Nivellement General de Polynesie Francaise
     * Type: vertical
     * Extent: French Polynesia - Society Islands - Bora Bora, Huahine, Maupiti, Moorea, Raiatea, Tahaa and Tahiti.
     * Scope: Geodesy, engineering survey, topographic mapping.
     *
     * The collection of heterogeneous levelling networks throughout the Society Islands of French Polynesia.
     */
    public const EPSG_NIVELLEMENT_GENERAL_DE_POLYNESIE_FRANCAISE = 5195;

    /**
     * Nivellement General de la Corse 1948
     * Type: vertical
     * Extent: France - Corsica onshore.
     * Scope: Geodesy, engineering survey, topographic mapping.
     * Mean sea level at Ajaccio between 1912 and 1937.
     * Replaced by IGN78 Corsica (datum 5120).
     */
    public const EPSG_NIVELLEMENT_GENERAL_DE_LA_CORSE_1948 = 5189;

    /**
     * Nivellement General de la France - IGN69
     * Type: vertical
     * Extent: France - mainland onshore.
     * Scope: Geodesy, engineering survey, topographic mapping.
     * Rivet number M.ac O-VIII on the Marseille tide gauge site, with the height fixed in 1897 at 1.661 metre above
     * mean sea level between February 2nd 1885 and January 1st 1897.
     * Uses Normal heights.
     */
    public const EPSG_NIVELLEMENT_GENERAL_DE_LA_FRANCE_IGN69 = 5119;

    /**
     * Nivellement General de la France - IGN78
     * Type: vertical
     * Extent: France - Corsica onshore.
     * Scope: Geodesy, engineering survey, topographic mapping.
     * Marker MM3 situated on the tide gauge site of Ajaccio. Height is 3.640 metre above mean sea level.
     * Uses Normal heights. Replaces NGC (datum code 5189).
     */
    public const EPSG_NIVELLEMENT_GENERAL_DE_LA_FRANCE_IGN78 = 5120;

    /**
     * Nivellement General de la France - Lallemand
     * Type: vertical
     * Extent: France - mainland onshore.
     * Scope: Geodesy, engineering survey, topographic mapping.
     * Rivet number M.ac O-VIII on the Marseille tide gauge site, with the height fixed in 1897 at 1.661 metre above
     * mean sea level between February 2nd 1885 and January 1st 1897.
     * Orthometric heights.
     */
    public const EPSG_NIVELLEMENT_GENERAL_DE_LA_FRANCE_LALLEMAND = 5118;

    /**
     * Nivellement General du Luxembourg
     * Type: vertical
     * Extent: Luxembourg.
     * Scope: Geodesy, engineering survey, topographic mapping.
     * Reference point Wemperhardt defined as 528.030m above Normaal Amsterdams Peil (NAP). Datum at NAP is mean high
     * tide in 1684. Network adjusted in 1995.
     * Orthometric heights.
     */
    public const EPSG_NIVELLEMENT_GENERAL_DU_LUXEMBOURG = 5172;

    /**
     * Nord Sahara 1959
     * Type: geodetic
     * Extent: Algeria - onshore and offshore.
     * Scope: Topographic mapping.
     * Coordinates of primary network readjusted on ED50 datum and then transformed conformally to Clarke 1880 (RGS)
     * ellipsoid.
     * Adjustment includes Morocco and Tunisia but use only in Algeria. Within Algeria the adjustment is north of 32°N
     * but use has been extended southwards in many disconnected projects, some based on independent astro stations
     * rather than the geodetic network.
     */
    public const EPSG_NORD_SAHARA_1959 = 6307;

    /**
     * Normaal Amsterdams Peil
     * Type: vertical
     * Extent: Netherlands - onshore and offshore.
     * Scope: Geodesy, topographic mapping.
     * Mean high tide at Amsterdam in 1684. Onshore NAP is defined by the published heights of benchmarks and since
     * 2018 extended offshore defined by the application of the official transformation from ETRS89, RDNAPTRANS(TM).
     * Orthometric heights. From 2018, use has been extended from Netherlands onshore to Netherlands onshore and
     * offshore.
     */
    public const EPSG_NORMAAL_AMSTERDAMS_PEIL = 5109;

    /**
     * North American Datum 1927
     * Type: geodetic
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
     * Scope: Topographic mapping.
     * Fundamental point: Meade's Ranch. Latitude: 39°13'26.686"N, longitude: 98°32'30.506"W (of Greenwich).
     * In United States (USA) and Canada, replaced by North American Datum 1983 (NAD83) (code 6269) ; in Mexico,
     * replaced by Mexican Datum of 1993 (code 1042).
     */
    public const EPSG_NORTH_AMERICAN_DATUM_1927 = 6267;

    /**
     * North American Datum 1927 (1976)
     * Type: geodetic
     * Extent: Canada - Ontario.
     * Scope: Geodesy, cadastre, engineering survey, topographic mapping.
     * Fundamental point: Meade's Ranch. Latitude: 39°13'26.686"N, longitude: 98°32'30.506"W (of Greenwich).
     * NAD27(76) used in Ontario for all maps at scale 1/20 000 and larger; elsewhere in Canada for selected purposes.
     */
    public const EPSG_NORTH_AMERICAN_DATUM_1927_1976 = 6608;

    /**
     * North American Datum 1927 (CGQ77)
     * Type: geodetic
     * Extent: Canada - Quebec.
     * Scope: Geodesy, cadastre, engineering survey, topographic mapping.
     * Fundamental point: Meade's Ranch. Latitude: 39°13'26.686"N, longitude: 98°32'30.506"W (of Greenwich).
     * NAD27 (CGQ77) used in Quebec for all maps at scale 1/20 000 and larger; generally for maps issued by the Quebec
     * cartography office whose reference system is CGQ77.
     */
    public const EPSG_NORTH_AMERICAN_DATUM_1927_CGQ77 = 6609;

    /**
     * North American Datum 1983
     * Type: geodetic
     * Extent: North America - onshore and offshore: Canada - Alberta; British Columbia; Manitoba; New Brunswick;
     * Newfoundland and Labrador; Northwest Territories; Nova Scotia; Nunavut; Ontario; Prince Edward Island; Quebec;
     * Saskatchewan; Yukon. Puerto Rico. United States (USA) - Alabama; Alaska; Arizona; Arkansas; California;
     * Colorado; Connecticut; Delaware; Florida; Georgia; Hawaii; Idaho; Illinois; Indiana; Iowa; Kansas; Kentucky;
     * Louisiana; Maine; Maryland; Massachusetts; Michigan; Minnesota; Mississippi; Missouri; Montana; Nebraska;
     * Nevada; New Hampshire; New Jersey; New Mexico; New York; North Carolina; North Dakota; Ohio; Oklahoma; Oregon;
     * Pennsylvania; Rhode Island; South Carolina; South Dakota; Tennessee; Texas; Utah; Vermont; Virginia; Washington;
     * West Virginia; Wisconsin; Wyoming. US Virgin Islands.  British Virgin Islands.
     * Scope: Topographic mapping.
     * Origin at geocentre.
     * Although the 1986 adjustment included connections to Greenland and Mexico, it has not been adopted there. In
     * Canada and US, replaced NAD27.
     */
    public const EPSG_NORTH_AMERICAN_DATUM_1983 = 6269;

    /**
     * North American Datum of 1983 (CSRS) version 2
     * Type: geodetic
     * Extent: Canada - onshore and offshore - Alberta; British Columbia; Manitoba; New Brunswick; Newfoundland and
     * Labrador; Northwest Territories; Nova Scotia; Nunavut; Ontario; Prince Edward Island; Quebec; Saskatchewan;
     * Yukon.
     * Scope: Geodesy.
     * Defined at reference epoch 1997.0 by a transformation from ITRF96 (see transformation code 8259). The frame is
     * kept aligned with the North American tectonic plate at other epochs using the NNR-Nuvel 1A model.
     * Adopted by the Canadian federal government from 1998-01-01 and by the provincial governments of British
     * Columbia, New Brunswick, Prince Edward Island and Quebec. Replaces NAD83(CSRS96). Replaced by NAD83(CSRS)v3.
     */
    public const EPSG_NORTH_AMERICAN_DATUM_OF_1983_CSRS_VERSION_2 = 1193;

    /**
     * North American Datum of 1983 (CSRS) version 3
     * Type: geodetic
     * Extent: Canada - onshore and offshore - Alberta; British Columbia; Manitoba; New Brunswick; Newfoundland and
     * Labrador; Northwest Territories; Nova Scotia; Nunavut; Ontario; Prince Edward Island; Quebec; Saskatchewan;
     * Yukon.
     * Scope: Geodesy.
     * Defined at reference epoch 1997.0 by a transformation from ITRF97 (see transformation code 8260). The frame is
     * kept aligned with the North American tectonic plate at other epochs using the NNR-Nuvel 1A model.
     * Adopted by the Canadian federal government from 1999-01-01 and by the provincial governments of Alberta, British
     * Columbia, Manitoba, Newfoundland and Labrador, Nova Scotia, Ontario and Saskatchewan. Replaces NAD83(CSRS)v2.
     * Replaced by NAD83(CSRS)v4.
     */
    public const EPSG_NORTH_AMERICAN_DATUM_OF_1983_CSRS_VERSION_3 = 1194;

    /**
     * North American Datum of 1983 (CSRS) version 4
     * Type: geodetic
     * Extent: Canada - onshore and offshore - Alberta; British Columbia; Manitoba; New Brunswick; Newfoundland and
     * Labrador; Northwest Territories; Nova Scotia; Nunavut; Ontario; Prince Edward Island; Quebec; Saskatchewan;
     * Yukon.
     * Scope: Geodesy.
     * Defined at reference epoch 2002.0 by a transformation from ITRF2000 (see transformation code 8261). The frame is
     * kept aligned with the North American tectonic plate at other epochs using the NNR-Nuvel 1A model.
     * Adopted by the Canadian federal government from 2002-01-01 and by the provincial governments of Alberta and
     * British Columbia. Replaces NAD83(CSRS)v3. Replaced by NAD83(CSRS)v5.
     */
    public const EPSG_NORTH_AMERICAN_DATUM_OF_1983_CSRS_VERSION_4 = 1195;

    /**
     * North American Datum of 1983 (CSRS) version 5
     * Type: geodetic
     * Extent: Canada - onshore and offshore - Alberta; British Columbia; Manitoba; New Brunswick; Newfoundland and
     * Labrador; Northwest Territories; Nova Scotia; Nunavut; Ontario; Prince Edward Island; Quebec; Saskatchewan;
     * Yukon.
     * Scope: Geodesy.
     * Defined at reference epoch 2005.0 by a transformation from ITRF2005 (see transformation code 8262). The frame is
     * kept aligned with the North American tectonic plate at other epochs using the NNR-Nuvel 1A model.
     * Adopted by the Canadian federal government from 2006-01-01. Replaces NAD83(CSRS)v4. Replaced by NAD83(CSRS)v6.
     */
    public const EPSG_NORTH_AMERICAN_DATUM_OF_1983_CSRS_VERSION_5 = 1196;

    /**
     * North American Datum of 1983 (CSRS) version 6
     * Type: geodetic
     * Extent: Canada - onshore and offshore - Alberta; British Columbia; Manitoba; New Brunswick; Newfoundland and
     * Labrador; Northwest Territories; Nova Scotia; Nunavut; Ontario; Prince Edward Island; Quebec; Saskatchewan;
     * Yukon.
     * Scope: Geodesy.
     * Defined at reference epoch 2010.0 by a transformation from ITRF2008 (see transformation code 8264). The frame is
     * kept aligned with the North American tectonic plate at other epochs using the NNR-Nuvel 1A model.
     * Adopted by the Canadian federal government from 2010-01-01 and the provincial governments of Alberta, British
     * Columbia, Manitoba, Newfoundland and Labrador, Nova Scotia, Ontario and Prince Edward Island. Replaces
     * NAD83(CSRS)v5. Replaced by NAD83(CSRS)v7.
     */
    public const EPSG_NORTH_AMERICAN_DATUM_OF_1983_CSRS_VERSION_6 = 1197;

    /**
     * North American Datum of 1983 (CSRS) version 7
     * Type: geodetic
     * Extent: Canada - onshore and offshore - Alberta; British Columbia; Manitoba; New Brunswick; Newfoundland and
     * Labrador; Northwest Territories; Nova Scotia; Nunavut; Ontario; Prince Edward Island; Quebec; Saskatchewan;
     * Yukon.
     * Scope: Geodesy.
     * Defined at reference epoch 2010.0 by a transformation from ITRF2014 (see transformation code 8265). The frame is
     * kept aligned with the North American tectonic plate at other epochs using the NNR-Nuvel 1A model.
     * Adopted by the Canadian federal government from 2017-05-01. Replaces NAD83(CSRS)v6.
     */
    public const EPSG_NORTH_AMERICAN_DATUM_OF_1983_CSRS_VERSION_7 = 1198;

    /**
     * North American Datum of 1983 (CSRS96)
     * Type: geodetic
     * Extent: Canada - onshore and offshore - Alberta; British Columbia; Manitoba; New Brunswick; Newfoundland and
     * Labrador; Northwest Territories; Nova Scotia; Nunavut; Ontario; Prince Edward Island; Quebec; Saskatchewan;
     * Yukon.
     * Scope: Geodesy.
     * Defined at epoch 1988.0 by a transformation from ITRF92, the definition superseded by a transformation from
     * ITRF93 and then by a transformation from ITRF94. (See transformation codes 8256-58).
     * Adopted by the Canadian federal government from 1996-01-01. Replaces NAD83 [sometimes called NAD83(Original)].
     * Replaced by NAD83(CSRS)v2.
     */
    public const EPSG_NORTH_AMERICAN_DATUM_OF_1983_CSRS96 = 1192;

    /**
     * North American Datum of 1983 (MARP00)
     * Type: geodetic
     * Extent: Guam, Northern Mariana Islands and Palau; onshore and offshore.
     * Scope: Geodesy.
     * Defined by a time-dependent seven parameter transformation of ITRF2000 3D geocentric Cartesian coordinates and
     * velocities at reference epoch 1993.62, aligned to the Mariana plate at other epochs based on an Euler pole
     * rotation.
     * Replaces NAD83(HARN) (GGN93) and NAD83(FBN) in Guam. Replaced by NAD83(MA11).
     */
    public const EPSG_NORTH_AMERICAN_DATUM_OF_1983_MARP00 = 1221;

    /**
     * North American Datum of 1983 (PACP00)
     * Type: geodetic
     * Extent: American Samoa, Marshall Islands, United States (USA) - Hawaii, United States minor outlying islands;
     * onshore and offshore.
     * Scope: Geodesy.
     * Defined by a time-dependent seven parameter transformation of ITRF2000 3D geocentric Cartesian coordinates and
     * velocities at reference epoch 1993.62, aligned to the Pacific plate at other epochs based on an Euler pole
     * rotation.
     * Replaces NAD83(HARN) and NAD83(FBN) in Hawaii and American Samoa. Replaced by NAD83(PA11).
     */
    public const EPSG_NORTH_AMERICAN_DATUM_OF_1983_PACP00 = 1249;

    /**
     * North American Vertical Datum 1988
     * Type: vertical
     * Extent: Mexico - onshore. United States (USA) -  CONUS and Alaska - onshore - Alabama; Alaska; Arizona;
     * Arkansas; California; Colorado; Connecticut; Delaware; Florida; Georgia; Idaho; Illinois; Indiana; Iowa; Kansas;
     * Kentucky; Louisiana; Maine; Maryland; Massachusetts; Michigan; Minnesota; Mississippi; Missouri; Montana;
     * Nebraska; Nevada; New Hampshire; New Jersey; New Mexico; New York; North Carolina; North Dakota; Ohio; Oklahoma;
     * Oregon; Pennsylvania; Rhode Island; South Carolina; South Dakota; Tennessee; Texas; Utah; Vermont; Virginia;
     * Washington; West Virginia; Wisconsin; Wyoming.
     * Scope: Geodesy, topographic mapping.
     * Mean water level 1970-1983 at Pointe-au-Père (Father's Point) and 1984-1988 at Rimouski, Quebec. Benchmark
     * 1250-G = 6.273m.
     * Helmert orthometric heights.
     */
    public const EPSG_NORTH_AMERICAN_VERTICAL_DATUM_1988 = 5103;

    /**
     * North Rona
     * Type: vertical
     * Extent: United Kingdom (UK) - Great Britain - Scotland - North Rona onshore.
     * Scope: Geodesy, topographic mapping.
     *
     * Orthometric heights.
     */
    public const EPSG_NORTH_RONA = 5143;

    /**
     * Northern Marianas Vertical Datum of 2003
     * Type: vertical
     * Extent: Northern Mariana Islands - onshore - Rota, Saipan and Tinian.
     * Scope: Geodesy, topographic mapping.
     * Mean sea level at Tanapag harbor, Saipan. Benchmark 1633227 TIDAL UH-2C = 1.657m relative to National Tidal
     * Datum Epoch 1983-2001. Transferred to Rota (East Harbor, BM TIDAL 3 = 1.482m) and Tinian (Harbor BM TIDAL 1 =
     * 2.361m).
     * Replaces all earlier vertical datums on these islands.
     */
    public const EPSG_NORTHERN_MARIANAS_VERTICAL_DATUM_OF_2003 = 1119;

    /**
     * Norway Normal Null 1954
     * Type: vertical
     * Extent: Norway - onshore.
     * Scope: Geodesy, engineering survey, topographic mapping.
     * MSL defined by regression at 7 gauges with between 17 and 67 years observations.
     * Includes initial NN1954 system and NNN1957 system. Former name retained. Normal-orthometric heights. Replaced by
     * NN2000.
     */
    public const EPSG_NORWAY_NORMAL_NULL_1954 = 5174;

    /**
     * Norway Normal Null 2000
     * Type: vertical
     * Extent: Norway - onshore.
     * Scope: Geodesy, topographic mapping.
     * Adjustment is referenced to mean high tide at Amsterdams Peil in 1684. To account for land level movements
     * caused by isostatic rebound, heights are reduced to epoch 2000.0 using values computed from the NKG2005LU uplift
     * model.
     * Replaces NN54. Uses Normal heights.
     */
    public const EPSG_NORWAY_NORMAL_NULL_2000 = 1096;

    /**
     * Not specified (based on Airy 1830 ellipsoid)
     * Type: geodetic
     * Extent: Not specified.
     * Scope: Not a valid datum.
     *
     * Included for coordinate reference systems where datum is unknown.
     */
    public const EPSG_NOT_SPECIFIED_BASED_ON_AIRY_1830_ELLIPSOID = 6001;

    /**
     * Not specified (based on Airy Modified 1849 ellipsoid)
     * Type: geodetic
     * Extent: Not specified.
     * Scope: Not a valid datum.
     *
     * Included for coordinate reference systems where datum is unknown.
     */
    public const EPSG_NOT_SPECIFIED_BASED_ON_AIRY_MODIFIED_1849_ELLIPSOID = 6002;

    /**
     * Not specified (based on Australian National Spheroid)
     * Type: geodetic
     * Extent: Not specified.
     * Scope: Not a valid datum.
     *
     * Included for coordinate reference systems where datum is unknown.
     */
    public const EPSG_NOT_SPECIFIED_BASED_ON_AUSTRALIAN_NATIONAL_SPHEROID = 6003;

    /**
     * Not specified (based on Average Terrestrial System 1977 ellipsoid)
     * Type: geodetic
     * Extent: Not specified.
     * Scope: Not a valid datum.
     *
     * Included for coordinate reference systems where datum is unknown.
     */
    public const EPSG_NOT_SPECIFIED_BASED_ON_AVERAGE_TERRESTRIAL_SYSTEM_1977_ELLIPSOID = 6041;

    /**
     * Not specified (based on Bessel 1841 ellipsoid)
     * Type: geodetic
     * Extent: Not specified.
     * Scope: Not a valid datum.
     *
     * Included for coordinate reference systems where datum is unknown.
     */
    public const EPSG_NOT_SPECIFIED_BASED_ON_BESSEL_1841_ELLIPSOID = 6004;

    /**
     * Not specified (based on Bessel Modified ellipsoid)
     * Type: geodetic
     * Extent: Not specified.
     * Scope: Not a valid datum.
     *
     * Included for coordinate reference systems where datum is unknown.
     */
    public const EPSG_NOT_SPECIFIED_BASED_ON_BESSEL_MODIFIED_ELLIPSOID = 6005;

    /**
     * Not specified (based on Bessel Namibia ellipsoid)
     * Type: geodetic
     * Extent: Not specified.
     * Scope: Not a valid datum.
     *
     * Included for coordinate reference systems where datum is unknown.
     */
    public const EPSG_NOT_SPECIFIED_BASED_ON_BESSEL_NAMIBIA_ELLIPSOID = 6006;

    /**
     * Not specified (based on Clarke 1858 ellipsoid)
     * Type: geodetic
     * Extent: Not specified.
     * Scope: Not a valid datum.
     *
     * Included for coordinate reference systems where datum is unknown.
     */
    public const EPSG_NOT_SPECIFIED_BASED_ON_CLARKE_1858_ELLIPSOID = 6007;

    /**
     * Not specified (based on Clarke 1866 Authalic Sphere)
     * Type: geodetic
     * Extent: Not specified.
     * Scope: Not a valid datum.
     *
     * Included for coordinate reference systems where datum is unknown.
     */
    public const EPSG_NOT_SPECIFIED_BASED_ON_CLARKE_1866_AUTHALIC_SPHERE = 6052;

    /**
     * Not specified (based on Clarke 1866 ellipsoid)
     * Type: geodetic
     * Extent: Not specified.
     * Scope: Not a valid datum.
     *
     * Included for coordinate reference systems where datum is unknown.
     */
    public const EPSG_NOT_SPECIFIED_BASED_ON_CLARKE_1866_ELLIPSOID = 6008;

    /**
     * Not specified (based on Clarke 1880 (Arc) ellipsoid)
     * Type: geodetic
     * Extent: Not specified.
     * Scope: Not a valid datum.
     *
     * Included for coordinate reference systems where datum is unknown.
     */
    public const EPSG_NOT_SPECIFIED_BASED_ON_CLARKE_1880_ARC_ELLIPSOID = 6013;

    /**
     * Not specified (based on Clarke 1880 (Benoit) ellipsoid)
     * Type: geodetic
     * Extent: Not specified.
     * Scope: Not a valid datum.
     *
     * Included for coordinate reference systems where datum is unknown.
     */
    public const EPSG_NOT_SPECIFIED_BASED_ON_CLARKE_1880_BENOIT_ELLIPSOID = 6010;

    /**
     * Not specified (based on Clarke 1880 (IGN) ellipsoid)
     * Type: geodetic
     * Extent: Not specified.
     * Scope: Not a valid datum.
     *
     * Included for coordinate reference systems where datum is unknown.
     */
    public const EPSG_NOT_SPECIFIED_BASED_ON_CLARKE_1880_IGN_ELLIPSOID = 6011;

    /**
     * Not specified (based on Clarke 1880 (RGS) ellipsoid)
     * Type: geodetic
     * Extent: Not specified.
     * Scope: Not a valid datum.
     *
     * Included for coordinate reference systems where datum is unknown.
     */
    public const EPSG_NOT_SPECIFIED_BASED_ON_CLARKE_1880_RGS_ELLIPSOID = 6012;

    /**
     * Not specified (based on Clarke 1880 (SGA 1922) ellipsoid)
     * Type: geodetic
     * Extent: Not specified.
     * Scope: Not a valid datum.
     *
     * Included for coordinate reference systems where datum is unknown.
     */
    public const EPSG_NOT_SPECIFIED_BASED_ON_CLARKE_1880_SGA_1922_ELLIPSOID = 6014;

    /**
     * Not specified (based on Clarke 1880 ellipsoid)
     * Type: geodetic
     * Extent: Not specified.
     * Scope: Not a valid datum.
     *
     * Included for coordinate reference systems where datum is unknown.
     */
    public const EPSG_NOT_SPECIFIED_BASED_ON_CLARKE_1880_ELLIPSOID = 6034;

    /**
     * Not specified (based on Everest (1830 Definition) ellipsoid)
     * Type: geodetic
     * Extent: Not specified.
     * Scope: Not a valid datum.
     *
     * Included for coordinate reference systems where datum is unknown.
     */
    public const EPSG_NOT_SPECIFIED_BASED_ON_EVEREST_1830_DEFINITION_ELLIPSOID = 6042;

    /**
     * Not specified (based on Everest 1830 (1937 Adjustment) ellipsoid)
     * Type: geodetic
     * Extent: Not specified.
     * Scope: Not a valid datum.
     *
     * Included for coordinate reference systems where datum is unknown.
     */
    public const EPSG_NOT_SPECIFIED_BASED_ON_EVEREST_1830_1937_ADJUSTMENT_ELLIPSOID = 6015;

    /**
     * Not specified (based on Everest 1830 (1962 Definition) ellipsoid)
     * Type: geodetic
     * Extent: Not specified.
     * Scope: Not a valid datum.
     *
     * Included for coordinate reference systems where datum is unknown.
     */
    public const EPSG_NOT_SPECIFIED_BASED_ON_EVEREST_1830_1962_DEFINITION_ELLIPSOID = 6044;

    /**
     * Not specified (based on Everest 1830 (1967 Definition) ellipsoid)
     * Type: geodetic
     * Extent: Not specified.
     * Scope: Not a valid datum.
     *
     * Included for coordinate reference systems where datum is unknown.
     */
    public const EPSG_NOT_SPECIFIED_BASED_ON_EVEREST_1830_1967_DEFINITION_ELLIPSOID = 6016;

    /**
     * Not specified (based on Everest 1830 (1975 Definition) ellipsoid)
     * Type: geodetic
     * Extent: Not specified.
     * Scope: Not a valid datum.
     *
     * Included for coordinate reference systems where datum is unknown.
     */
    public const EPSG_NOT_SPECIFIED_BASED_ON_EVEREST_1830_1975_DEFINITION_ELLIPSOID = 6045;

    /**
     * Not specified (based on Everest 1830 Modified ellipsoid)
     * Type: geodetic
     * Extent: Not specified.
     * Scope: Not a valid datum.
     *
     * Included for coordinate reference systems where datum is unknown.
     */
    public const EPSG_NOT_SPECIFIED_BASED_ON_EVEREST_1830_MODIFIED_ELLIPSOID = 6018;

    /**
     * Not specified (based on GEM 10C ellipsoid)
     * Type: geodetic
     * Extent: Not specified.
     * Scope: Not a valid datum.
     *
     * Included for coordinate reference systems where datum is unknown.
     */
    public const EPSG_NOT_SPECIFIED_BASED_ON_GEM_10C_ELLIPSOID = 6031;

    /**
     * Not specified (based on GRS 1967 ellipsoid)
     * Type: geodetic
     * Extent: Not specified.
     * Scope: Not a valid datum.
     *
     * Included for coordinate reference systems where datum is unknown.
     */
    public const EPSG_NOT_SPECIFIED_BASED_ON_GRS_1967_ELLIPSOID = 6036;

    /**
     * Not specified (based on GRS 1980 Authalic Sphere)
     * Type: geodetic
     * Extent: Not specified.
     * Scope: Not a valid datum.
     *
     * Included for coordinate reference systems where datum is unknown.
     */
    public const EPSG_NOT_SPECIFIED_BASED_ON_GRS_1980_AUTHALIC_SPHERE = 6047;

    /**
     * Not specified (based on GRS 1980 ellipsoid)
     * Type: geodetic
     * Extent: Not specified.
     * Scope: Not a valid datum.
     *
     * Included for coordinate reference systems where datum is unknown.
     */
    public const EPSG_NOT_SPECIFIED_BASED_ON_GRS_1980_ELLIPSOID = 6019;

    /**
     * Not specified (based on Helmert 1906 ellipsoid)
     * Type: geodetic
     * Extent: Not specified.
     * Scope: Not a valid datum.
     *
     * Included for coordinate reference systems where datum is unknown.
     */
    public const EPSG_NOT_SPECIFIED_BASED_ON_HELMERT_1906_ELLIPSOID = 6020;

    /**
     * Not specified (based on Hughes 1980 ellipsoid)
     * Type: geodetic
     * Extent: Not specified.
     * Scope: Not a valid datum.
     *
     * Included for coordinate reference systems where datum is unknown.
     */
    public const EPSG_NOT_SPECIFIED_BASED_ON_HUGHES_1980_ELLIPSOID = 6054;

    /**
     * Not specified (based on Indonesian National Spheroid)
     * Type: geodetic
     * Extent: Not specified.
     * Scope: Not a valid datum.
     *
     * Included for coordinate reference systems where datum is unknown.
     */
    public const EPSG_NOT_SPECIFIED_BASED_ON_INDONESIAN_NATIONAL_SPHEROID = 6021;

    /**
     * Not specified (based on International 1924 Authalic Sphere)
     * Type: geodetic
     * Extent: Not specified.
     * Scope: Not a valid datum.
     *
     * Included for coordinate reference systems where datum is unknown.
     */
    public const EPSG_NOT_SPECIFIED_BASED_ON_INTERNATIONAL_1924_AUTHALIC_SPHERE = 6053;

    /**
     * Not specified (based on International 1924 ellipsoid)
     * Type: geodetic
     * Extent: Not specified.
     * Scope: Not a valid datum.
     *
     * Included for coordinate reference systems where datum is unknown.
     */
    public const EPSG_NOT_SPECIFIED_BASED_ON_INTERNATIONAL_1924_ELLIPSOID = 6022;

    /**
     * Not specified (based on Krassowsky 1940 ellipsoid)
     * Type: geodetic
     * Extent: Not specified.
     * Scope: Not a valid datum.
     *
     * Included for coordinate reference systems where datum is unknown.
     */
    public const EPSG_NOT_SPECIFIED_BASED_ON_KRASSOWSKY_1940_ELLIPSOID = 6024;

    /**
     * Not specified (based on NWL 9D ellipsoid)
     * Type: geodetic
     * Extent: Not specified.
     * Scope: Not a valid datum.
     *
     * Included for coordinate reference systems where datum is unknown.
     */
    public const EPSG_NOT_SPECIFIED_BASED_ON_NWL_9D_ELLIPSOID = 6025;

    /**
     * Not specified (based on OSU86F ellipsoid)
     * Type: geodetic
     * Extent: Not specified.
     * Scope: Not a valid datum.
     *
     * Included for coordinate reference systems where datum is unknown.
     */
    public const EPSG_NOT_SPECIFIED_BASED_ON_OSU86F_ELLIPSOID = 6032;

    /**
     * Not specified (based on OSU91A ellipsoid)
     * Type: geodetic
     * Extent: Not specified.
     * Scope: Not a valid datum.
     *
     * Included for coordinate reference systems where datum is unknown.
     */
    public const EPSG_NOT_SPECIFIED_BASED_ON_OSU91A_ELLIPSOID = 6033;

    /**
     * Not specified (based on Plessis 1817 ellipsoid)
     * Type: geodetic
     * Extent: Not specified.
     * Scope: Not a valid datum.
     *
     * Included for coordinate reference systems where datum is unknown.
     */
    public const EPSG_NOT_SPECIFIED_BASED_ON_PLESSIS_1817_ELLIPSOID = 6027;

    /**
     * Not specified (based on Struve 1860 ellipsoid)
     * Type: geodetic
     * Extent: Not specified.
     * Scope: Not a valid datum.
     *
     * Included for coordinate reference systems where datum is unknown.
     */
    public const EPSG_NOT_SPECIFIED_BASED_ON_STRUVE_1860_ELLIPSOID = 6028;

    /**
     * Not specified (based on WGS 72 ellipsoid)
     * Type: geodetic
     * Extent: Not specified.
     * Scope: Not a valid datum.
     *
     * Included for coordinate reference systems where datum is unknown.
     */
    public const EPSG_NOT_SPECIFIED_BASED_ON_WGS_72_ELLIPSOID = 6043;

    /**
     * Not specified (based on WGS 84 ellipsoid)
     * Type: geodetic
     * Extent: Not specified.
     * Scope: Not a valid datum.
     *
     * Included for coordinate reference systems where datum is unknown.
     */
    public const EPSG_NOT_SPECIFIED_BASED_ON_WGS_84_ELLIPSOID = 6030;

    /**
     * Not specified (based on War Office ellipsoid)
     * Type: geodetic
     * Extent: Not specified.
     * Scope: Not a valid datum.
     *
     * Included for coordinate reference systems where datum is unknown.
     */
    public const EPSG_NOT_SPECIFIED_BASED_ON_WAR_OFFICE_ELLIPSOID = 6029;

    /**
     * Nouakchott 1965
     * Type: geodetic
     * Extent: Mauritania - coastal area south of Cape Timiris.
     * Scope: Topographic mapping.
     * Nouakchott astronomical point.
     * Triangulation limited to environs of Nouakchott. Extended in 1982 by satellite translocation from a single
     * station "Ruines" to support Syledis chain for offshore operations. Replaced by Mauritania 1999 (datum code
     * 6602).
     */
    public const EPSG_NOUAKCHOTT_1965 = 6680;

    /**
     * Nouvelle Triangulation Francaise
     * Type: geodetic
     * Extent: France - onshore - mainland and Corsica.
     * Scope: Topographic mapping.
     * Fundamental point: Pantheon. Latitude: 48°50'46.522"N, longitude: 2°20'48.667"E (of Greenwich).
     */
    public const EPSG_NOUVELLE_TRIANGULATION_FRANCAISE = 6275;

    /**
     * Nouvelle Triangulation Francaise (Paris)
     * Type: geodetic
     * Extent: France - onshore - mainland and Corsica.
     * Scope: Topographic mapping.
     * Fundamental point: Pantheon. Latitude: 54.273618g N, longitude: 0.0106921g E (of Paris).
     */
    public const EPSG_NOUVELLE_TRIANGULATION_FRANCAISE_PARIS = 6807;

    /**
     * OS (SN) 1980
     * Type: geodetic
     * Extent: Ireland - onshore. United Kingdom (UK) - onshore - England; Scotland; Wales; Northern Ireland. Isle of
     * Man.
     * Scope: Geodesy.
     * Fundamental point: Herstmonceux. Latitude: 50°51'55.271"N, longitude: 0°20'45.882"E (of Greenwich).
     */
    public const EPSG_OS_SN_1980 = 6279;

    /**
     * OSGB 1936
     * Type: geodetic
     * Extent: United Kingdom (UK) - offshore to boundary of UKCS within 49°45'N to 61°N and 9°W to 2°E; onshore
     * Great Britain (England, Wales and Scotland). Isle of Man onshore.
     * Scope: Topographic mapping.
     * Prior to 2002, fundamental point: Herstmonceux, Latitude: 50°51'55.271"N, longitude: 0°20'45.882"E (of
     * Greenwich). From April 2002 the datum is defined through the application of the OSTN transformation from ETRS89.
     * The average accuracy of OSTN compared to the old triangulation network (down to 3rd order) is 0.1m. With the
     * introduction of OSTN15, the area for OGSB 1936 has effectively been extended from Britain to cover the adjacent
     * UK Continental Shelf.
     */
    public const EPSG_OSGB_1936 = 6277;

    /**
     * OSGB 1970 (SN)
     * Type: geodetic
     * Extent: United Kingdom (UK) - Great Britain - England and Wales onshore, Scotland onshore and Western Isles
     * nearshore; Isle of Man onshore.
     * Scope: Geodesy.
     * Fundamental point: Herstmonceux. Latitude: 50°51'55.271"N, longitude: 0°20'45.882"E (of Greenwich).
     */
    public const EPSG_OSGB_1970_SN = 6278;

    /**
     * OSNI 1952
     * Type: geodetic
     * Extent: United Kingdom (UK) - Northern Ireland (Ulster) - onshore.
     * Scope: Geodesy, topographic mapping.
     * Position fixed to the coordinates from the 19th century Principle Triangulation of station Divis. Scale and
     * orientation controlled by position of Principle Triangulation stations Knocklayd and Trostan.
     * Replaced by Geodetic Datum of 1965 alias 1975 Mapping Adjustment or TM75 (datum code 6300).
     */
    public const EPSG_OSNI_1952 = 6188;

    /**
     * Observatario
     * Type: geodetic
     * Extent: Mozambique - south.
     * Scope: Topographic mapping.
     * Fundamental point: Campos Rodrigues observatory, Maputo.
     * Replaced by transformation to Tete datum (datum code 6127).
     */
    public const EPSG_OBSERVATARIO = 6129;

    /**
     * Ocotepeque 1935
     * Type: geodetic
     * Extent: Costa Rica; El Salvador; Guatemala; Honduras; Nicaragua.
     * Scope: Engineering survey, topographic mapping.
     * Fundamental point: Base Norte. Latitude: 14°26'20.168"N, longitude: 89°11'33.964"W.
     * Replaced in Costa Rica by Costa Rica 2005 (CR05) from March 2007 and replaced in El Salvador by SIRGAS_ES2007
     * from August 2007.
     */
    public const EPSG_OCOTEPEQUE_1935 = 1070;

    /**
     * Old Hawaiian
     * Type: geodetic
     * Extent: United States (USA) - Hawaii - main islands onshore.
     * Scope: Topographic mapping.
     * Fundamental point: Oahu West Base Astro.  Latitude: 21°18'13.89"N, longitude 157°50'55.79"W (of Greenwich)
     * Hawaiian Islands were never on NAD27 but rather on Old Hawaiian Datum.  NADCON conversion program provides
     * transformation from Old Hawaiian Datum to NAD83 (original 1986 realization) but making the transformation appear
     * to user as if from NAD27.
     */
    public const EPSG_OLD_HAWAIIAN = 6135;

    /**
     * Oman National Geodetic Datum 2014
     * Type: geodetic
     * Extent: Oman - onshore and offshore.
     * Scope: Geodesy.
     * 20 stations of the Oman primary network tied to ITRF2008 at epoch 2013.15.
     * Replaces WGS 84 (G873). Replaced by ONGD17.
     */
    public const EPSG_OMAN_NATIONAL_GEODETIC_DATUM_2014 = 1147;

    /**
     * Oman National Geodetic Datum 2017
     * Type: geodetic
     * Extent: Oman - onshore and offshore.
     * Scope: Geodesy.
     * Oman primary network of 39 stations tied to ITRF2014 at epoch 2017.24.
     * Replaces ONGD14 from March 2019.
     */
    public const EPSG_OMAN_NATIONAL_GEODETIC_DATUM_2017 = 1263;

    /**
     * One Tree Point 1964
     * Type: vertical
     * Extent: New Zealand - North Island - One Tree Point vertical CRS area.
     * Scope: Geodesy, engineering survey, topographic mapping.
     * MSL at Whangarei harbour 1960-1963.
     */
    public const EPSG_ONE_TREE_POINT_1964 = 5165;

    /**
     * Ordnance Datum Newlyn
     * Type: vertical
     * Extent: United Kingdom (UK) - Great Britain onshore - England and Wales - mainland; Scotland - mainland and
     * Inner Hebrides.
     * Scope: Geodesy, topographic mapping.
     * Mean Sea Level at Newlyn between 1915 and 1921. Initially realised through 1921 and then 1956 levelling network
     * adjustments. From 2002 redefined to be realised through OSGM geoid models.
     * Orthometric heights.
     */
    public const EPSG_ORDNANCE_DATUM_NEWLYN = 5101;

    /**
     * Ordnance Datum Newlyn (Offshore)
     * Type: vertical
     * Extent: United Kingdom (UK) - offshore between 2km from shore and boundary of UKCS within 49°46'N to 61°01'N
     * and 7°33'W to 3°33'E.
     * Scope: Geodesy.
     * Defined by OSGM geoid model.
     * Extension of Ordnance Datum Newlyn offshore through geoid model. Orthometric heights.
     */
    public const EPSG_ORDNANCE_DATUM_NEWLYN_OFFSHORE = 1164;

    /**
     * Ordnance Datum Newlyn (Orkney Isles)
     * Type: vertical
     * Extent: United Kingdom (UK) - Great Britain - Scotland - Orkney Islands onshore.
     * Scope: Geodesy, topographic mapping.
     * Connected to Newlyn datum by triangulation from the British mainland. Initially realised through levelling
     * network adjustment, from 2002 redefined to be realised through OSGM geoid model.
     * Considered as separate from Newlyn because the accuracy of the trigonometric connection across the Pentland
     * Firth does not meet geodetic levelling specifications. Orthometric heights.
     */
    public const EPSG_ORDNANCE_DATUM_NEWLYN_ORKNEY_ISLES = 5138;

    /**
     * Ostend
     * Type: vertical
     * Extent: Belgium - onshore.
     * Scope: Geodesy, topographic mapping.
     * Mean low water at Ostend 1855-78 transferred to benchmark GIKMN at Uccle.
     * Realized through the second general levelling (DNG or TAW) 1981-1999.
     */
    public const EPSG_OSTEND = 5110;

    /**
     * PDO Height Datum 1993
     * Type: vertical
     * Extent: Oman - onshore. Includes Musandam and the Kuria Muria (Al Hallaniyah) islands.
     * Scope: Oil and gas exploration.
     *
     * Misclosure between Muscat and Salalah less than .5 meters with differences from of up to 5 meters from old Fahud
     * Datum.  The PHD93 adjustment was initially known as the Spine.  Replaces Fahud Vertical Datum (code 5124) from
     * 1993.
     */
    public const EPSG_PDO_HEIGHT_DATUM_1993 = 5123;

    /**
     * PDO Survey Datum 1993
     * Type: geodetic
     * Extent: Oman - onshore. Includes Musandam and the Kuria Muria (Al Hallaniyah) islands.
     * Scope: Oil and gas exploration.
     * Adjustment best fitted to Fahud network.
     * Replaces Fahud datum (code 6232). Maximum differences to Fahud adjustment are 20 metres.
     */
    public const EPSG_PDO_SURVEY_DATUM_1993 = 6134;

    /**
     * PNG08
     * Type: vertical
     * Extent: Papua New Guinea - between 0°N and 12°S and 140°E and 158°E - onshore and offshore.
     * Scope: Geodesy.
     * Mean sea level at 8 tide gauges around PNG, defined through application of PNG08 geoid model (transformation
     * code 7655) to PNG94 (CRS code 5545).
     */
    public const EPSG_PNG08 = 1149;

    /**
     * Palestine 1923
     * Type: geodetic
     * Extent: Israel - onshore; Jordan; Palestine Territory - onshore.
     * Scope: Topographic mapping.
     * Fundamental point: Point 82'M  Jerusalem. Latitude: 31°44' 2.749"N, longitude: 35°12'43.490"E (of Greenwich).
     */
    public const EPSG_PALESTINE_1923 = 6281;

    /**
     * Pampa del Castillo
     * Type: geodetic
     * Extent: Argentina - Chibut province south of approximately 42°30'S and Santa Cruz province north of
     * approximately 50°20'S.
     * Scope: Oil and gas exploration.
     *
     * Replaced by Campo Inchauspe (code 6221) for topographic mapping, use for oil exploration and production in Golfo
     * San Jorge basin (44°S to 47.5°S) continues.
     */
    public const EPSG_PAMPA_DEL_CASTILLO = 6161;

    /**
     * Panama-Colon 1911
     * Type: geodetic
     * Extent: Panama - onshore.
     * Scope: Engineering survey, topographic mapping.
     * Fundamental point: Balboa Hill. Latitude: 09°04'57.637"N, longtitude: 79°43'50.313"W.
     * Reports of the existence of an Ancon datum are probably erroneous, considering that the origin of the
     * Panamá-Colón Datum of 1911 is at Balboa Hill and the access road up the hill is from the town of Ancon, Canal
     * Zone.
     */
    public const EPSG_PANAMA_COLON_1911 = 1072;

    /**
     * Papua New Guinea Geodetic Datum 1994
     * Type: geodetic
     * Extent: Papua New Guinea - onshore and offshore. Includes Bismark archipelago, Louisade archipelago, Admiralty
     * Islands, d'Entrecasteaux Islands, northern Solomon Islands, Trobriand Islands, New Britain, New Ireland,
     * Woodlark, and associated islands.
     * Scope: Geodesy, engineering survey, topographic mapping.
     * ITRF92 at epoch 1994.0.
     * Adopted 1996. Coincident with WGS 84 in 1994 but rapidly divergent due to significant tectonic motion in PNG.
     */
    public const EPSG_PAPUA_NEW_GUINEA_GEODETIC_DATUM_1994 = 1076;

    /**
     * Parametry Zemli 1990
     * Type: dynamic geodetic
     * Extent: World.
     * Scope: Geodesy. Navigation and positioning using Glonass satellite system.
     * Defined through coordinates of stations of the satellite geodetic network (SGN) in Russia at epoch 1990.0.
     * Replaced by PZ-90.02 from 2007-09-20.
     */
    public const EPSG_PARAMETRY_ZEMLI_1990 = 6740;

    /**
     * Parametry Zemli 1990.02
     * Type: dynamic geodetic
     * Extent: World.
     * Scope: Geodesy. Navigation and positioning using Glonass satellite system.
     * Defined through coordinates of 33 stations of the satellite geodetic network (SGN) in Russia and Antarctica
     * adjusted to a subset of 14 IGS stations in Russia at epoch 2002.0. The IGS station coordinates are considered to
     * be equivalent to ITRF2000.
     * Replaces PZ-90 from 2007-09-20. Replaced by PZ-90.11 from 2014-01-15.
     */
    public const EPSG_PARAMETRY_ZEMLI_1990_02 = 1157;

    /**
     * Parametry Zemli 1990.11
     * Type: dynamic geodetic
     * Extent: World.
     * Scope: Geodesy. Navigation and positioning using Glonass satellite system.
     * Defined through coordinates of 33 stations of the satellite geodetic network (SGN) in Russia and Antarctica
     * adjusted to a subset of 14 IGS stations in Russia at epoch 2010.0. The IGS station coordinates are considered to
     * be equivalent to ITRF2008.
     * Replaces PZ-90.02 from 2014-01-15.
     */
    public const EPSG_PARAMETRY_ZEMLI_1990_11 = 1158;

    /**
     * Peru96
     * Type: geodetic
     * Extent: Peru - onshore and offshore.
     * Scope: Geodesy.
     * Densification of SIRGAS95 network (ITRF94 at epoch 1995.4) in Peru, consisting of 47 passive geodetic stations
     * and 3 continuous recording GPS stations.
     * Densification of SIRGAS 1995 within Peru. Replaces PSAD56 (datum code 6248) in Peru.
     */
    public const EPSG_PERU96 = 1067;

    /**
     * Petrels 1972
     * Type: geodetic
     * Extent: Antarctica - Adelie Land - Petrels island.
     * Scope: Geodesy, topographic mapping.
     * Fundamental point: Astro station DZ on Ile de Petrels. Latitude: 66°40'00"S, longitude: 140°00'46"E (of
     * Greenwich).
     */
    public const EPSG_PETRELS_1972 = 6636;

    /**
     * Philippine Reference System 1992
     * Type: geodetic
     * Extent: Philippines - onshore and offshore.
     * Scope: Geodesy, cadastre, engineering survey, topographic mapping.
     * Fundamental point: Balacan. Latitude: 13°33'41.000"N, longitude: 121°52'03.000"E (of Greenwich),
     * geoid-ellipsoid separation 0.34m.
     * Replaces Luzon 1911 datum (code 6253).
     */
    public const EPSG_PHILIPPINE_REFERENCE_SYSTEM_1992 = 6683;

    /**
     * Phoenix Islands 1966
     * Type: geodetic
     * Extent: Kiribati - Phoenix Islands: Kanton, Orona, McKean Atoll, Birnie Atoll, Phoenix Seamounts.
     * Scope: Military survey.
     */
    public const EPSG_PHOENIX_ISLANDS_1966 = 6716;

    /**
     * Pico de las Nieves 1968
     * Type: geodetic
     * Extent: Spain - Canary Islands onshore.
     * Scope: Geodesy, engineering survey, topographic mapping.
     * Pico de las Nieves mountain, Gran Canaria. The fundamental point is a different station to that for PN84.
     * Replaced by PN84 only on western islands (El Hierro, La Gomera, La Palma and Tenerife). Both PN68 and PN84
     * replaced by REGCAN95.
     */
    public const EPSG_PICO_DE_LAS_NIEVES_1968 = 1286;

    /**
     * Pico de las Nieves 1984
     * Type: geodetic
     * Extent: Spain - Canary Islands - El Hierro, La Gomera, La Palma and Tenerife - onshore.
     * Scope: Military survey.
     * Pico de las Nieves mountain, Gran Canaria. The fundamental point is a different station to that for PN68.
     * Replaces Pico de las Nieves 1968 (PN68) only on western islands (El Hierro, La Gomera, La Palma and Tenerife).
     * Replaced by REGCAN95.
     */
    public const EPSG_PICO_DE_LAS_NIEVES_1984 = 6728;

    /**
     * Piraeus Harbour 1986
     * Type: vertical
     * Extent: Greece - onshore.
     * Scope: Geodesy, topographic mapping.
     * MSL determined during 1986.
     */
    public const EPSG_PIRAEUS_HARBOUR_1986 = 5115;

    /**
     * Pitcairn 1967
     * Type: geodetic
     * Extent: Pitcairn - Pitcairn Island.
     * Scope: Military survey.
     * Fundamental point: Pitcairn Astro. Latitude: 25°04'06.87"S, longitude: 130°06'47.83"W (of Greenwich).
     * Replaced by Pitcairn 2006.
     */
    public const EPSG_PITCAIRN_1967 = 6729;

    /**
     * Pitcairn 2006
     * Type: geodetic
     * Extent: Pitcairn - Pitcairn Island.
     * Scope: Cadastre, engineering survey, topographic mapping.
     * Fundamental point: Pitcairn Astro. Latitude: 25°04'06.7894"S, longitude: 130°06'46.6816"W (of Greenwich),
     * derived by single point GPS oberservations.
     * Replaces Pitcairn 1967.
     */
    public const EPSG_PITCAIRN_2006 = 6763;

    /**
     * Point 58
     * Type: geodetic
     * Extent: Senegal - central, Mali - southwest, Burkina Faso - central, Niger - southwest, Nigeria - north, Chad -
     * central. All in proximity to the parallel of latitude of 12°N.
     * Scope: Geodesy.
     * Fundamental point: Point 58. Latitude: 12°52'44.045"N, longitude: 3°58'37.040"E (of Greenwich).
     * Used as the basis for computation of the 12th Parallel traverse conducted 1966-70 from Senegal to Chad and
     * connecting to the Blue Nile 1958 (Adindan) triangulation in Sudan.
     */
    public const EPSG_POINT_58 = 6620;

    /**
     * Pointe Geologie Perroud 1950
     * Type: geodetic
     * Extent: Antarctica - Adelie Land - coastal area between 136°E and 142°E.
     * Scope: Geodesy, topographic mapping.
     * Fundamental point: Astro station G.0 on Pointe Geologie. Latitude: 66°39'30"S, longitude: 140°01'00"E (of
     * Greenwich).
     */
    public const EPSG_POINTE_GEOLOGIE_PERROUD_1950 = 6637;

    /**
     * Ponta Delgada
     * Type: vertical
     * Extent: Portugal - eastern Azores - Sao Miguel island onshore.
     * Scope: Geodesy, engineering survey, topographic mapping.
     * Mean Sea Level during 1991 at Ponta Delgada.
     * Orthometric heights.
     */
    public const EPSG_PONTA_DELGADA = 1110;

    /**
     * Poolbeg
     * Type: vertical
     * Extent: Ireland - onshore. United Kingdom (UK) - Northern Ireland (Ulster) - onshore.
     * Scope: Topographic mapping.
     * Low water mark of the spring tide on the 8 April 1837 at Poolbeg Lighthouse, Dublin.
     * Topographic mapping before 1956 in Northern Ireland and 1970 in the Republic of Ireland. Replaced by Belfast
     * Lough and Malin Head (datum codes 5130-31).
     */
    public const EPSG_POOLBEG = 5152;

    /**
     * Port Moresby 1996
     * Type: vertical
     * Extent: Papua New Guinea - onshore - Gulf province east of 144°24'E, Central province and National Capital
     * District.
     * Scope: Engineering survey.
     * BM198 (adjacent to the Port Moresby tide gauge) height of 3.02 above MSL as determined by CSIRO in 1990.
     * Propagated through bilinear interpolation of EGM96 geoid model (transformation code 10084) reduced by offset of
     * -1.58m.
     * Offset has been determined by static GNSS estimation of ellipsoid height of BM198.
     */
    public const EPSG_PORT_MORESBY_1996 = 1171;

    /**
     * Port Moresby 2008
     * Type: vertical
     * Extent: Papua New Guinea - onshore - Gulf province east of 144°24'E, Central province and National Capital
     * District.
     * Scope: Engineering survey.
     * BM198 (adjacent to the Port Moresby tide gauge) height of 3.02 above MSL as determined by CSIRO in 1990.
     * Propagated through bilinear interpolation of EGM2008 geoid model (transformation code 3858 or 3859) reduced by
     * offset of -0.93m.
     * Offset has been determined by static GNSS estimation of ellipsoid height of BM198 validated to a precision of 10
     * cm by short period tidal observations at Kerema wharf in 2010.
     */
    public const EPSG_PORT_MORESBY_2008 = 1172;

    /**
     * Porto Santo 1936
     * Type: geodetic
     * Extent: Portugal - Madeira, Porto Santo and Desertas islands - onshore.
     * Scope: Topographic mapping.
     * SE Base on Porto Santo island.
     * Replaced by 1995 adjustment (datum code 6663). For Selvagens see Selvagem Grande (code 6616).
     */
    public const EPSG_PORTO_SANTO_1936 = 6615;

    /**
     * Porto Santo 1995
     * Type: geodetic
     * Extent: Portugal - Madeira, Porto Santo and Desertas islands - onshore.
     * Scope: Topographic mapping.
     * SE Base on Porto Santo island. Origin and orientation constrained to those of the 1936 adjustment.
     * Classical and GPS observations. Replaces 1936 adjustment (datum code 6615).
     * For Selvagens see Selvagem Grande (datum code 6616).
     */
    public const EPSG_PORTO_SANTO_1995 = 6663;

    /**
     * Posiciones Geodesicas Argentinas 1994
     * Type: geodetic
     * Extent: Argentina - onshore and offshore.
     * Scope: Geodesy, topographic mapping.
     * A geodetic network of 127 high accuracy surveyed points based on WGS 84 coordinates at time of survey that
     * define the National Geodetic System (Sistema Geodésico Nacional). Surveyed between Feruary and April 1993 and
     * between March and May 1994.
     * Defined the National Geodetic Reference Network from 9th May 1997. Technically, but not legally, replaced by
     * POSGAR 98 (datum code 6190) until May 2009, when POSGAR 2007 (datum code 1062) was officially replaced POSGAR
     * 94.
     */
    public const EPSG_POSICIONES_GEODESICAS_ARGENTINAS_1994 = 6694;

    /**
     * Posiciones Geodesicas Argentinas 1998
     * Type: geodetic
     * Extent: Argentina - onshore and offshore.
     * Scope: Geodesy.
     * A geodetic network of 136 high accuracy surveyed points. Densification of SIRGAS 1995; ITRF94 at epoch 1995.4.
     * Technically, but not legally, this datum replaced the 1994 POSGAR adjustment (code 6694) until adoption of the
     * 2007 POSGAR adjustment (code 1062) in May 2009.
     */
    public const EPSG_POSICIONES_GEODESICAS_ARGENTINAS_1998 = 6190;

    /**
     * Posiciones Geodesicas Argentinas 2007
     * Type: geodetic
     * Extent: Argentina - onshore and offshore.
     * Scope: Geodesy, topographic mapping.
     * A geodetic network of 211 high accuracy surveyed points (178 passive and 33 continuous operating) based on
     * ITRF2005, Epoch 2006.632, that define the National Geodetic System (Sistema Geodésico Nacional) effective 15
     * May 2009.
     * POSGAR 07 has been adopted by order of the Director of the National Geographic Institute on 15th May 2009 as the
     * new National Geodetic Reference Frame and replaces the pre-existing POSGAR 94.
     */
    public const EPSG_POSICIONES_GEODESICAS_ARGENTINAS_2007 = 1062;

    /**
     * Potsdam Datum/83
     * Type: geodetic
     * Extent: Germany - Thuringen.
     * Scope: Geodesy, cadastre, engineering survey, topographic mapping.
     * Fundamental point: Rauenberg. Latitude: 52°27'12.021"N, longitude: 13°22'04.928"E (of Greenwich). This station
     * was destroyed in 1910 and the station at Potsdam substituted as the fundamental point.
     * PD/83 is the realization of DHDN in Thuringen. It is the resultant of applying a transformation derived at 13
     * points on the border between East and West Germany to Pulkovo 1942/83 points in Thuringen.
     */
    public const EPSG_POTSDAM_DATUM_83 = 6746;

    /**
     * Principe
     * Type: geodetic
     * Extent: Sao Tome and Principe - onshore - Principe.
     * Scope: Geodesy, topographic mapping.
     * Fundamental point: Morro do Papagaio. Latitude: 1°36'46.87"N, longitude: 7°23'39.65"E (of Greenwich).
     */
    public const EPSG_PRINCIPE = 1046;

    /**
     * Provisional South American Datum 1956
     * Type: geodetic
     * Extent: Aruba - onshore; Bolivia; Bonaire - onshore; Brazil - offshore - Amazon Cone shelf; Chile - onshore
     * north of 43°30'S; Curacao - onshore; Ecuador - mainland onshore; Guyana - onshore; Peru - onshore; Venezuela -
     * onshore.
     * Scope: Topographic mapping.
     * Fundamental point: La Canoa. Latitude: 8°34'17.170"N, longitude: 63°51'34.880"W (of Greenwich).
     * Same origin as La Canoa datum.
     */
    public const EPSG_PROVISIONAL_SOUTH_AMERICAN_DATUM_1956 = 6248;

    /**
     * Puerto Rico
     * Type: geodetic
     * Extent: Puerto Rico, US Virgin Islands and British Virgin Islands - onshore.
     * Scope: Topographic mapping.
     * Fundamental point: Cardona Island Lighthouse. Latitude:17°57'31.40"N, longitude: 66°38'07.53"W (of Greenwich).
     * NADCON conversion program provides transformation from Puerto Rico Datum to NAD83 (original 1986 realization)
     * but making the transformation appear to user as if from NAD27.
     */
    public const EPSG_PUERTO_RICO = 6139;

    /**
     * Puerto Rico Vertical Datum of 2002
     * Type: vertical
     * Extent: Puerto Rico - onshore.
     * Scope: Geodesy, topographic mapping.
     * Mean sea level at San Juan. Benchmark 9756371 A TIDAL = 1.334m relative to National Tidal Datum Epoch 1960-1978.
     * Replaces all earlier vertical datums for Puerto Rico.
     */
    public const EPSG_PUERTO_RICO_VERTICAL_DATUM_OF_2002 = 1123;

    /**
     * Pulkovo 1942
     * Type: geodetic
     * Extent: Armenia; Azerbaijan; Belarus; Estonia - onshore; Georgia - onshore; Kazakhstan; Kyrgyzstan; Latvia -
     * onshore; Lithuania - onshore; Moldova; Russian Federation - onshore; Tajikistan; Turkmenistan; Ukraine -
     * onshore; Uzbekistan.
     * Scope: Topographic mapping.
     * Fundamental point: Pulkovo observatory. Latitude: 59°46'18.550"N, longitude: 30°19'42.090"E (of Greenwich).
     */
    public const EPSG_PULKOVO_1942 = 6284;

    /**
     * Pulkovo 1942(58)
     * Type: geodetic
     * Extent: Onshore: Bulgaria, Czechia, Germany (former DDR), Hungary, Poland and Slovakia. Onshore and offshore:
     * Albania and Romania.
     * Scope: Geodesy, cadastre, engineering survey, topographic mapping.
     * Fundamental point: Pulkovo observatory. Latitude: 59°46'18.550"N, longitude: 30°19'42.090"E (of Greenwich).
     * 1956 international adjustment of Uniform Astro-Geodetic Network of countries of central and eastern Europe.
     * Locally densified during 1957 and 1958.
     */
    public const EPSG_PULKOVO_1942_58 = 6179;

    /**
     * Pulkovo 1942(83)
     * Type: geodetic
     * Extent: Onshore Bulgaria, Czechia, Germany (former DDR), Hungary and Slovakia.
     * Scope: Geodesy, cadastre, engineering survey, topographic mapping.
     * Fundamental point: Pulkovo observatory. Latitude: 59°46'18.550"N, longitude: 30°19'42.090"E (of Greenwich).
     * 1983 international adjustment of Uniform Astro-Geodetic Network of countries of central and eastern Europe.
     */
    public const EPSG_PULKOVO_1942_83 = 6178;

    /**
     * Pulkovo 1995
     * Type: geodetic
     * Extent: Russian Federation - onshore and offshore.
     * Scope: Geodesy.
     * Fundamental point: Pulkovo observatory. Latitude: 59°46'15.359"N, longitude: 30°19'28.318"E (of Greenwich).
     */
    public const EPSG_PULKOVO_1995 = 6200;

    /**
     * Qatar 1948
     * Type: geodetic
     * Extent: Qatar - onshore.
     * Scope: Topographic mapping.
     * Fundamental point: Sokey 0 M. Latitude: 25°22'56.500"N, longitude: 50°45'41.000"E (of Greenwich).
     */
    public const EPSG_QATAR_1948 = 6286;

    /**
     * Qatar 1974
     * Type: geodetic
     * Extent: Qatar - onshore and offshore.
     * Scope: Topographic mapping.
     * Fundamental point: Station G3.
     */
    public const EPSG_QATAR_1974 = 6285;

    /**
     * Qatar National Datum 1995
     * Type: geodetic
     * Extent: Qatar - onshore.
     * Scope: Topographic mapping.
     * Defined by transformation from WGS 84 - see coordinate operation code 1840.
     */
    public const EPSG_QATAR_NATIONAL_DATUM_1995 = 6614;

    /**
     * Qornoq 1927
     * Type: geodetic
     * Extent: Greenland - west coast onshore.
     * Scope: Topographic mapping.
     * Fundamental point: Station 7008. Latitude: 64°31'06.27"N, longitude: 51°12'24.86"W (of Greenwich).
     */
    public const EPSG_QORNOQ_1927 = 6194;

    /**
     * Raiatea SAU 2001
     * Type: vertical
     * Extent: French Polynesia - Society Islands - Raiatea.
     * Scope: Geodesy, engineering survey, topographic mapping.
     * Fundamental benchmark: RN1
     * Included as part of NGPF - see datum code 5195.
     */
    public const EPSG_RAIATEA_SAU_2001 = 5198;

    /**
     * Ras Ghumays
     * Type: vertical
     * Extent: United Arab Emirates (UAE) - Abu Dhabi onshore.
     * Scope: Geodesy, engineering survey, topographic mapping.
     * Mean Sea Level at Ras Ghumays 1978 and 1979.
     * Orthometric heights.
     */
    public const EPSG_RAS_GHUMAYS = 1146;

    /**
     * Rassadiran
     * Type: geodetic
     * Extent: Iran - Taheri refinery site.
     * Scope: Oil and gas exploration.
     * Fundamental point: Total1. Latitude: 27°31'07.784"N, longitude: 52°36'12.741"E (of Greenwich).
     */
    public const EPSG_RASSADIRAN = 6153;

    /**
     * Rauenberg Datum/83
     * Type: geodetic
     * Extent: Germany - Sachsen.
     * Scope: Geodesy, cadastre, engineering survey, topographic mapping.
     * Fundamental point: Rauenberg. Latitude: 52°27'12.021"N, longitude: 13°22'04.928"E (of Greenwich). This station
     * was destroyed in 1910 and the station at Potsdam substituted as the fundamental point.
     * RD/83 is the realization of DHDN in Saxony. It is the resultant of applying a transformation derived at 106
     * points throughout former East Germany to Pulkovo 1942/83 points in Saxony.
     */
    public const EPSG_RAUENBERG_DATUM_83 = 6745;

    /**
     * Red Geodesica Venezolana
     * Type: geodetic
     * Extent: Venezuela - onshore and offshore.
     * Scope: Geodesy.
     * Realised by a frame of 67 stations observed in 1995 as a densification of the SIRGAS campaign and adjusted in
     * the ITRF94 at epoch 1995.4.
     */
    public const EPSG_RED_GEODESICA_VENEZOLANA = 6189;

    /**
     * Red Geodesica de Canarias 1995
     * Type: geodetic
     * Extent: Spain - Canary Islands onshore and offshore.
     * Scope: Geodesy, cadastre, engineering survey, topographic mapping.
     * ITRF93 at epoch 1994.9 at VLBI station INTA at the Canary Spatial Centre (CEC) at Maspalomas on Grand Canary.
     * Replaces Pico de las Nieves 1968 (PN68) and Pico de las Nieves 1984 (PN84).
     */
    public const EPSG_RED_GEODESICA_DE_CANARIAS_1995 = 1035;

    /**
     * Reference System de Angola 2013
     * Type: geodetic
     * Extent: Angola - onshore and offshore.
     * Scope: Geodesy.
     * Network of 18 stations throughout Angola referenced to ITRF2008 @ 2010.90.
     * Established through daily PPP solutions in GPS week G1610.
     */
    public const EPSG_REFERENCE_SYSTEM_DE_ANGOLA_2013 = 1220;

    /**
     * Reseau Geodesique Francais 1993
     * Type: geodetic
     * Extent: France - onshore and offshore, mainland and Corsica.
     * Scope: Geodesy.
     * Coincident with ETRS89 at epoch 1993.0.
     */
    public const EPSG_RESEAU_GEODESIQUE_FRANCAIS_1993 = 6171;

    /**
     * Reseau Geodesique Francais Guyane 1995
     * Type: geodetic
     * Extent: French Guiana - onshore and offshore.
     * Scope: Geodesy, cadastre, engineering survey, topographic mapping.
     * ITRF93 at epoch 1995.0
     * Replaces CSG67 (datum code 6623).
     */
    public const EPSG_RESEAU_GEODESIQUE_FRANCAIS_GUYANE_1995 = 6624;

    /**
     * Reseau Geodesique de Mayotte 2004
     * Type: geodetic
     * Extent: Mayotte - onshore and offshore.
     * Scope: Geodesy, engineering survey, topographic mapping.
     * ITRF2000 at epoch 2004.0
     * Replaces Combani 1950 (datum code 6632) except for cadastral purposes. (Cadastre 1997 (datum code 1037) used for
     * cadastral purposes).
     */
    public const EPSG_RESEAU_GEODESIQUE_DE_MAYOTTE_2004 = 1036;

    /**
     * Reseau Geodesique de Nouvelle Caledonie 91-93
     * Type: geodetic
     * Extent: New Caledonia - onshore and offshore. Isle de Pins, Loyalty Islands, Huon Islands, Belep archipelago,
     * Chesterfield Islands, and Walpole.
     * Scope: Geodesy, cadastre, engineering survey, topographic mapping.
     * ITRF90 at epoch 1989.0.
     */
    public const EPSG_RESEAU_GEODESIQUE_DE_NOUVELLE_CALEDONIE_91_93 = 6749;

    /**
     * Reseau Geodesique de Saint Pierre et Miquelon 2006
     * Type: geodetic
     * Extent: St Pierre and Miquelon - onshore and offshore.
     * Scope: Geodesy, cadastre, engineering survey, topographic mapping.
     * ITRF2000 at epoch 2006.0
     * Replaces Saint Pierre et Miquelon 1950 (datum code 6638).
     */
    public const EPSG_RESEAU_GEODESIQUE_DE_SAINT_PIERRE_ET_MIQUELON_2006 = 1038;

    /**
     * Reseau Geodesique de Wallis et Futuna 1996
     * Type: geodetic
     * Extent: Wallis and Futuna - onshore and offshore - Uvea, Futuna, and Alofi.
     * Scope: Geodesy.
     * Coincident with ITRF94 at epoch 1993.00.
     */
    public const EPSG_RESEAU_GEODESIQUE_DE_WALLIS_ET_FUTUNA_1996 = 1223;

    /**
     * Reseau Geodesique de la Polynesie Francaise
     * Type: geodetic
     * Extent: French Polynesia - onshore and offshore. Includes Society archipelago, Tuamotu archipelago, Marquesas
     * Islands, Gambier Islands and Austral Islands.
     * Scope: Geodesy.
     * ITRF92 at epoch 1993.0. Densification by GPS of the Reference Network of French Polynesia, a coordinate set of
     * 13 stations determined through DORIS observations.
     * Replaces Tahaa 54 (datum code 6629), IGN 63 Hiva Oa (6689), IGN 72 Nuku Hiva (6630), Maupiti 83 (6692), MHEFO 55
     * (6688), Moorea 87 (6691) and Tahiti 79 (6690).
     */
    public const EPSG_RESEAU_GEODESIQUE_DE_LA_POLYNESIE_FRANCAISE = 6687;

    /**
     * Reseau Geodesique de la RDC 2005
     * Type: geodetic
     * Extent: The Democratic Republic of the Congo (Zaire) - south of a line through Bandundu, Seke and Pweto -
     * onshore and offshore.
     * Scope: Geodesy.
     * ITRF2000 at epoch 2005.4.
     */
    public const EPSG_RESEAU_GEODESIQUE_DE_LA_RDC_2005 = 1033;

    /**
     * Reseau Geodesique de la Reunion 1992
     * Type: geodetic
     * Extent: Reunion - onshore and offshore.
     * Scope: Geodesy, cadastre, engineering survey, topographic mapping.
     * ITRF91 at epoch 1993.0
     * Replaces Piton des Neiges (code 6626).
     */
    public const EPSG_RESEAU_GEODESIQUE_DE_LA_REUNION_1992 = 6627;

    /**
     * Reseau Geodesique des Antilles Francaises 2009
     * Type: geodetic
     * Extent: French Antilles onshore and offshore - Guadeloupe (including Grande Terre, Basse Terre, Marie Galante,
     * Les Saintes, Iles de la Petite Terre, La Desirade, St Barthélemy, and northern St Martin) and Martinique.
     * Scope: Geodesy, cadastre, engineering survey, topographic mapping.
     * ITRF2005 at epoch 2009.0
     * Replaces RRAF91 in Martinique and Guadeloupe.
     */
    public const EPSG_RESEAU_GEODESIQUE_DES_ANTILLES_FRANCAISES_2009 = 1073;

    /**
     * Reseau Geodesique des Terres Australes et Antarctiques Francaises 2007
     * Type: geodetic
     * Extent: French Southern Territories - onshore and offshore: Amsterdam and St Paul, Crozet, Europa and Kerguelen.
     * Antarctica - Adelie Land coastal area.
     * Scope: Geodesy, engineering survey, topographic mapping.
     * ITRF2005 at epoch 2007.274
     * Replaces IGN 1963-64 on Amsterdam, Saint-Paul 1969 on St Paul, IGN64 on Crozet, MHM 1954 on Europa, IGN 1962 on
     * Kerguelen, and Petrels 1972 and Perroud 1950 in Adelie Land.
     */
    public const EPSG_RESEAU_GEODESIQUE_DES_TERRES_AUSTRALES_ET_ANTARCTIQUES_FRANCAISES_2007 = 1113;

    /**
     * Reseau National Belge 1950
     * Type: geodetic
     * Extent: Belgium - onshore.
     * Scope: Topographic mapping.
     * Fundamental point: Lommel (tower). Latitude: 51°13'47.334"N, longitude: 5°18'49.483"E (of Greenwich).
     */
    public const EPSG_RESEAU_NATIONAL_BELGE_1950 = 6215;

    /**
     * Reseau National Belge 1950 (Brussels)
     * Type: geodetic
     * Extent: Belgium - onshore.
     * Scope: Topographic mapping.
     * Fundamental point: Lommel (tower). Latitude: 51°13'47.334"N, longitude: 0°56'44.773"E (of Brussels).
     */
    public const EPSG_RESEAU_NATIONAL_BELGE_1950_BRUSSELS = 6809;

    /**
     * Reseau National Belge 1972
     * Type: geodetic
     * Extent: Belgium - onshore.
     * Scope: Topographic mapping.
     * Fundamental point: Uccle observatory. Latitude: 50°47'57.704"N, longitude: 4°21'24.983"E (of Greenwich).
     */
    public const EPSG_RESEAU_NATIONAL_BELGE_1972 = 6313;

    /**
     * Reseau de Reference des Antilles Francaises 1991
     * Type: geodetic
     * Extent: French Antilles onshore and offshore - Guadeloupe (including Grande Terre, Basse Terre, Marie Galante,
     * Les Saintes, Iles de la Petite Terre, La Desirade, St Barthélemy, and northern St Martin) and Martinique.
     * Scope: Geodesy, cadastre, engineering survey, topographic mapping.
     * WGS 84 coordinates of a single station determined during the 1988 Tango mission.
     * Replaces Fort Marigot and Sainte Anne (datum codes 6621-22) in Guadeloupe and Fort Desaix (datum code 6625) in
     * Martinique. Replaced by Reseau Geodesique des Antilles Francaises 2009 (datum code 1073).
     */
    public const EPSG_RESEAU_DE_REFERENCE_DES_ANTILLES_FRANCAISES_1991 = 1047;

    /**
     * Rete Dinamica Nazionale 2008
     * Type: geodetic
     * Extent: Italy - onshore and offshore; San Marino, Vatican City State.
     * Scope: Geodesy, topographic mapping.
     * Italian densification of ETRS89 realised through network of 99 permanent reference stations in ETRF2000@2008.0.
     * Adopted as official Italian reference datum 10/11/2011. Replaces IGM95 (datum code 6670).
     */
    public const EPSG_RETE_DINAMICA_NAZIONALE_2008 = 1132;

    /**
     * Reunion 1947
     * Type: geodetic
     * Extent: Reunion - onshore.
     * Scope: Geodesy, cadastre, engineering survey, topographic mapping.
     * Fundamental point: Piton des Neiges (Borne). Latitude: 21°05'13.119"S, longitude: 55°29'09.193"E (of
     * Greenwich).
     * Replaced by RGR92 (datum code 6627).
     */
    public const EPSG_REUNION_1947 = 6626;

    /**
     * Reunion 1989
     * Type: vertical
     * Extent: Reunion - onshore.
     * Scope: Geodesy, engineering survey, topographic mapping.
     * Mean sea level during part of November 1949 at port of Saint-Pierre. Origin = marker AB-100 with defined
     * elevation of 13.808m above msl.
     * Orthometric heights. Replaces Reunion IGN58. Value of marker AB-100 retains height from 1958 adjustment.
     */
    public const EPSG_REUNION_1989 = 5156;

    /**
     * Reykjavik 1900
     * Type: geodetic
     * Extent: Iceland - onshore.
     * Scope: Topographic mapping (medium scale).
     * Fundamental point:  Latitude: 64°08'31.88"N, longitude: 21°55'51.15"W (of Greenwich).
     */
    public const EPSG_REYKJAVIK_1900 = 6657;

    /**
     * Rikets hojdsystem 1900
     * Type: vertical
     * Extent: Sweden - onshore.
     * Scope: Engineering survey, topographic mapping.
     * Adjustment is referenced to mean sea level at Slussen, Stockholm.
     * Realized through the first precise levelling network of 1886-1905. Replaced by RH70.
     */
    public const EPSG_RIKETS_HOJDSYSTEM_1900 = 5209;

    /**
     * Rikets hojdsystem 1970
     * Type: vertical
     * Extent: Sweden - onshore.
     * Scope: Geodesy, topographic mapping.
     * Adjustment is referenced to mean high tide at Amsterdams Peil in 1684. To account for land level movements
     * caused by isostatic rebound, heights are reduced to epoch 1970.0 using uplift values computed from repeated
     * levelling observations.
     * Realized through the second precise levelling network of 1951-1967. Uses Normal heights. Replaces RH00. Replaced
     * in 2005 by RH2000.
     */
    public const EPSG_RIKETS_HOJDSYSTEM_1970 = 5117;

    /**
     * Rikets hojdsystem 2000
     * Type: vertical
     * Extent: Sweden - onshore.
     * Scope: Geodesy, topographic mapping.
     * Adjustment is referenced to mean high tide at Amsterdams Peil in 1684. To account for land level movements
     * caused by isostatic rebound, heights are reduced to epoch 2000.0 using values computed from the RH 2000 LU
     * (=NKG2005LU) uplift model.
     * Realized through the third precise levelling network of 1979-2003. Adopted in 2005, replacing RH70. Uses Normal
     * heights.
     */
    public const EPSG_RIKETS_HOJDSYSTEM_2000 = 5208;

    /**
     * Rikets koordinatsystem 1990
     * Type: geodetic
     * Extent: Sweden - onshore and offshore.
     * Scope: Geodesy, cadastre, engineering survey, topographic mapping.
     *
     * Replaces RT38 adjustment (datum code 6308)
     */
    public const EPSG_RIKETS_KOORDINATSYSTEM_1990 = 6124;

    /**
     * Ross Sea Region Geodetic Datum 2000
     * Type: geodetic
     * Extent: Antarctica - Ross Sea Region - nominally between 160°E and 150°W but includes buffer on eastern
     * hemisphere margin to include Transantarctic Mountains
     * Scope: Geodesy, topographic mapping.
     * Based on ITRF96 at epoch 2000.0.
     */
    public const EPSG_ROSS_SEA_REGION_GEODETIC_DATUM_2000 = 6764;

    /**
     * SIRGAS Continuously Operating Network DGF00P01
     * Type: dynamic geodetic
     * Extent: Latin America - Central America and South America, onshore and offshore.
     * Scope: Geodesy.
     * Aligned to ITRF97 at epoch 2000.40. Realized by a frame of 31 continuously operating stations using GPS
     * observations from June 1996 to February 2000. Velocity model VEMOS2003 used to propagate coordinates to the
     * frame reference epoch.
     * DGF00P01 is included in ITRF2000 as a regional densification for South America. Replaced by DGF01P01 (datum code
     * 1228).
     */
    public const EPSG_SIRGAS_CONTINUOUSLY_OPERATING_NETWORK_DGF00P01 = 1227;

    /**
     * SIRGAS Continuously Operating Network DGF01P01
     * Type: dynamic geodetic
     * Extent: Latin America - Central America and South America, onshore and offshore.
     * Scope: Geodesy.
     * Aligned to ITRF2000 at epoch 2000.00. Realized by a frame of 48 continuously operating stations using GPS
     * observations from June 1996 to April 2001. Velocity model VEMOS2003 used to propagate coordinates to the frame
     * reference epoch.
     * Replaces DGF00P01 (datum code 1227). Replaced by DGF01P02 (datum code 1229).
     */
    public const EPSG_SIRGAS_CONTINUOUSLY_OPERATING_NETWORK_DGF01P01 = 1228;

    /**
     * SIRGAS Continuously Operating Network DGF01P02
     * Type: dynamic geodetic
     * Extent: Latin America - Central America and South America, onshore and offshore.
     * Scope: Geodesy.
     * Aligned to ITRF2000 at epoch 1998.40. Realized by a frame of 49 continuously operating stations using GPS
     * observations from June 1996 to October 2001. Velocity model VEMOS2003 used to propagate coordinates to the frame
     * reference epoch.
     * Replaces DGF01P01 (datum code 1228). Replaced by DGF02P01 (datum code 1230).
     */
    public const EPSG_SIRGAS_CONTINUOUSLY_OPERATING_NETWORK_DGF01P02 = 1229;

    /**
     * SIRGAS Continuously Operating Network DGF02P01
     * Type: dynamic geodetic
     * Extent: Latin America - Central America and South America, onshore and offshore.
     * Scope: Geodesy.
     * Aligned to ITRF2000 at epoch 2000.00. Realized by a frame of 53 continuously operating stations using GPS
     * observations from June 1996 to July 2002. Velocity model VEMOS2003 used to propagate coordinates to the frame
     * reference epoch.
     * Replaces DGF01P02 (datum code 1229). Replaced by DGF04P01 (datum code 1331).
     */
    public const EPSG_SIRGAS_CONTINUOUSLY_OPERATING_NETWORK_DGF02P01 = 1230;

    /**
     * SIRGAS Continuously Operating Network DGF04P01
     * Type: dynamic geodetic
     * Extent: Latin America - Central America and South America, onshore and offshore.
     * Scope: Geodesy.
     * Aligned to ITRF2000 at epoch 2003.00. Realized by a frame of 69 continuously operating stations using GPS
     * observations from June 1996 to July 2004. Velocity model VEMOS2003 used to propagate coordinates to the frame
     * reference epoch.
     * Replaces DGF02P01 (datum code 1230). Replaced by DGF05P01 (datum code 1232).
     */
    public const EPSG_SIRGAS_CONTINUOUSLY_OPERATING_NETWORK_DGF04P01 = 1231;

    /**
     * SIRGAS Continuously Operating Network DGF05P01
     * Type: dynamic geodetic
     * Extent: Latin America - Central America and South America, onshore and offshore.
     * Scope: Geodesy.
     * Aligned to ITRF2000 at epoch 2004.00. Realized by a frame of 95 continuously operating stations using GPS
     * observations from June 1996 to September 2005. Velocity model VEMOS2003 used to propagate coordinates to the
     * frame reference epoch.
     * Replaces DGF04P01 (datum code 1231). Replaced by DGF06P01 (datum code 1233).
     */
    public const EPSG_SIRGAS_CONTINUOUSLY_OPERATING_NETWORK_DGF05P01 = 1232;

    /**
     * SIRGAS Continuously Operating Network DGF06P01
     * Type: dynamic geodetic
     * Extent: Latin America - Central America and South America, onshore and offshore.
     * Scope: Geodesy.
     * Aligned to ITRF2000 at epoch 2004.00. Realized by a frame of 94 continuously operating stations using GPS
     * observations from June 1996 to June 2006. Velocity model VEMOS2003 used to propagate coordinates to the frame
     * reference epoch.
     * Replaces DGF05P01 (datum code 1232). Replaced by DGF07P01 (datum code 1234).
     */
    public const EPSG_SIRGAS_CONTINUOUSLY_OPERATING_NETWORK_DGF06P01 = 1233;

    /**
     * SIRGAS Continuously Operating Network DGF07P01
     * Type: dynamic geodetic
     * Extent: Latin America - Central America and South America, onshore and offshore.
     * Scope: Geodesy.
     * Aligned to IGS05 at epoch 2004.50. Realized by a frame of 106 continuously operating stations using GPS
     * observations in 3 periods between December 2001 and October 2007. Velocity model VEMOS2003 used to propagate
     * coordinates to the frame reference epoch.
     * Replaces DGF06P01 (datum code 1233). Replaced by DGF08P01 (datum code 1235).
     */
    public const EPSG_SIRGAS_CONTINUOUSLY_OPERATING_NETWORK_DGF07P01 = 1234;

    /**
     * SIRGAS Continuously Operating Network DGF08P01
     * Type: dynamic geodetic
     * Extent: Latin America - Central America and South America, onshore and offshore.
     * Scope: Geodesy.
     * Aligned to IGS05 at epoch 2004.50. Realized by a frame of 126 continuously operating stations using GPS
     * observations from December 2002 to March 2008. Velocity model VEMOS2003 used to propagate coordinates to the
     * frame reference epoch.
     * Replaces DGF07P01 (datum code 1234). Replaced by SIR09P01  (datum code 1236).
     */
    public const EPSG_SIRGAS_CONTINUOUSLY_OPERATING_NETWORK_DGF08P01 = 1235;

    /**
     * SIRGAS Continuously Operating Network SIR09P01
     * Type: dynamic geodetic
     * Extent: Latin America - Central America and South America, onshore and offshore.
     * Scope: Geodesy.
     * Aligned to IGS05 at epoch 2005.00. Realized by a frame of 128 continuously operating stations using GPS
     * observations from January 2000 to January 2009. Velocity model VEMOS2009 used to propagate coordinates to the
     * frame reference epoch.
     * Replaces DGF08P01 (datum code 1235). Replaced by SIR10P01 (datum code 1237).
     */
    public const EPSG_SIRGAS_CONTINUOUSLY_OPERATING_NETWORK_SIR09P01 = 1236;

    /**
     * SIRGAS Continuously Operating Network SIR10P01
     * Type: dynamic geodetic
     * Extent: Latin America - Central America and South America, onshore and offshore.
     * Scope: Geodesy.
     * Aligned to ITRF08 at epoch 2005.00. Realized by a frame of 183 continuously operating stations using GPS
     * observations from January 2000 to June 2010. Velocity model VEMOS2009 used to propagate coordinates to the frame
     * reference epoch.
     * Replaces SIR09P01 (datum code 1236). Replaced by SIR11P01 (datum code 1238).
     */
    public const EPSG_SIRGAS_CONTINUOUSLY_OPERATING_NETWORK_SIR10P01 = 1237;

    /**
     * SIRGAS Continuously Operating Network SIR11P01
     * Type: dynamic geodetic
     * Extent: Latin America - Central America and South America, onshore and offshore.
     * Scope: Geodesy.
     * Aligned to ITRF08 at epoch 2005.00. Realized by a frame of 230 continuously operating stations using GPS
     * observations from January 2000 to April 2011. Velocity model VEMOS2009 used to propagate coordinates to the
     * frame reference epoch.
     * Replaces SIR10P01 (datum code 1237). Replaced by SIR13P01 (datum code 1239). Last multi-year solution without
     * the effects of the El Maule earthquake in February 2010.
     */
    public const EPSG_SIRGAS_CONTINUOUSLY_OPERATING_NETWORK_SIR11P01 = 1238;

    /**
     * SIRGAS Continuously Operating Network SIR13P01
     * Type: dynamic geodetic
     * Extent: Latin America - Central America and South America, onshore and offshore.
     * Scope: Geodesy.
     * Aligned to IGb08 at epoch 2012.00. Realized by a frame of 108 continuously operating stations using GPS
     * observations from April 2010 to June 2013. Velocity model VEMOS2009 used to propagate coordinates to the frame
     * reference epoch.
     * Replaces SIR11P01 (datum code 1238). Replaced by SIR14P01 (datum code 1240). First multi-year solution after the
     * El Maule earthquake of February 2010.
     */
    public const EPSG_SIRGAS_CONTINUOUSLY_OPERATING_NETWORK_SIR13P01 = 1239;

    /**
     * SIRGAS Continuously Operating Network SIR14P01
     * Type: dynamic geodetic
     * Extent: Latin America - Central America and South America, onshore and offshore.
     * Scope: Geodesy.
     * Aligned to IGb08 at epoch 2013.00. Realized by a frame of 242 continuously operating stations using GNSS
     * observations from April 2010 to July 2014. Velocity model VEMOS2009 used to propagate coordinates to the frame
     * reference epoch.
     * Replaces SIR13P01 (datum code 1239). Replaced by SIR15P01 (datum code 1241).
     */
    public const EPSG_SIRGAS_CONTINUOUSLY_OPERATING_NETWORK_SIR14P01 = 1240;

    /**
     * SIRGAS Continuously Operating Network SIR15P01
     * Type: dynamic geodetic
     * Extent: Latin America - Central America and South America, onshore and offshore.
     * Scope: Geodesy.
     * Aligned to IGb08 at epoch 2013.00. Realized by a frame of 303 continuously operating stations using GNSS
     * observations from March 2010 to April 2015. Velocity model VEMOS2015 used to propagate coordinates to the frame
     * reference epoch.
     * Replaces SIR14P01 (datum code 1240). Replaced by SIR17P01 (datum code 1242).
     */
    public const EPSG_SIRGAS_CONTINUOUSLY_OPERATING_NETWORK_SIR15P01 = 1241;

    /**
     * SIRGAS Continuously Operating Network SIR17P01
     * Type: dynamic geodetic
     * Extent: Latin America - Central America and South America, onshore and offshore.
     * Scope: Geodesy.
     * Aligned to IGS14 at epoch 2015.00. Realized by a frame of 345 continuously operating stations using GNSS
     * observations from April 2011 to January 2017. Velocity model VEMOS2017 used to propagate coordinates to the
     * frame reference epoch.
     * Replaces SIR15P01 (datum code 1241).
     */
    public const EPSG_SIRGAS_CONTINUOUSLY_OPERATING_NETWORK_SIR17P01 = 1242;

    /**
     * SIRGAS-Chile realization 1 epoch 2002
     * Type: geodetic
     * Extent: Chile - onshore and offshore. Includes Easter Island, Juan Fernandez Islands, San Felix, and Sala y
     * Gomez.
     * Scope: Geodesy.
     * ITRF2000 at epoch 2002.0.  Densification of SIRGAS 2000 network in Chile, consisting of 650 monumented stations.
     * Densification of SIRGAS 2000 within Chile. Replaces PSAD56 (datum code 6248) in Chile, HITO XVIII (datum code
     * 6254) in Chilean Tierra del Fuego and Easter Island 1967 (datum code 6719) in Easter Island. Replaced by
     * SIRGAS-Chile 2010 (datum code 1243).
     */
    public const EPSG_SIRGAS_CHILE_REALIZATION_1_EPOCH_2002 = 1064;

    /**
     * SIRGAS-Chile realization 2 epoch 2010
     * Type: geodetic
     * Extent: Chile - onshore and offshore. Includes Easter Island, Juan Fernandez Islands, San Felix, and Sala y
     * Gomez.
     * Scope: Geodesy.
     * IGS08 at epoch 2010.00. Densification of SIRGAS-CON network in Chile, consisting of 120 monumented stations.
     * Replaces SIRGAS-Chile realization 1 epoch 2002, following significant tectonic deformation. Replaced by
     * SIRGAS-Chile realization 3 epoch 2013.
     */
    public const EPSG_SIRGAS_CHILE_REALIZATION_2_EPOCH_2010 = 1243;

    /**
     * SIRGAS-Chile realization 3 epoch 2013
     * Type: geodetic
     * Extent: Chile - onshore and offshore. Includes Easter Island, Juan Fernandez Islands, San Felix, and Sala y
     * Gomez.
     * Scope: Geodesy.
     * IGb08 at epoch 2013.00. Densification of SIRGAS-CON network in Chile, consisting of 130 monumented stations.
     * Replaces SIRGAS-Chile realization 2 epoch 2010, following significant tectonic deformation. Replaced by
     * SIRGAS-Chile realization 4 epoch 2016.
     */
    public const EPSG_SIRGAS_CHILE_REALIZATION_3_EPOCH_2013 = 1252;

    /**
     * SIRGAS-Chile realization 4 epoch 2016
     * Type: geodetic
     * Extent: Chile - onshore and offshore. Includes Easter Island, Juan Fernandez Islands, San Felix, and Sala y
     * Gomez.
     * Scope: Geodesy.
     * IGb08 at epoch 2016.00. Densification of SIRGAS-CON network in Chile, consisting of 200 monumented stations.
     * Replaces SIRGAS-Chile realization 3 epoch 2013, following significant tectonic deformation.
     */
    public const EPSG_SIRGAS_CHILE_REALIZATION_4_EPOCH_2016 = 1253;

    /**
     * SIRGAS-ROU98
     * Type: geodetic
     * Extent: Uruguay - onshore and offshore.
     * Scope: Geodesy.
     * Densification of SIRGAS95 network in Uruguay, consisting of 17 passive geodetic stations and 3 continuous
     * recording GPS stations. ITRF94 at epoch 1995.4.
     * Densification of SIRGAS 1995 within Uruguay. Replaces Yacare (datum code 6309) in Uruguay. Uruguay documentation
     * clearly states use of WGS 84 reference ellipsoid.
     */
    public const EPSG_SIRGAS_ROU98 = 1068;

    /**
     * SIRGAS_ES2007.8
     * Type: geodetic
     * Extent: El Salvador - onshore and offshore.
     * Scope: Geodesy.
     * ITRF2005 at epoch 2007.85.  Densification of SIRGAS-CON network in El Salvador, consisting of 38 monumented
     * stations.
     * SIRGAS-ES2007.8 is the national SIRGAS densification.
     */
    public const EPSG_SIRGAS_ES2007_8 = 1069;

    /**
     * ST71 Belep
     * Type: geodetic
     * Extent: New Caledonia - Belep.
     * Scope: Geodesy, cadastre, engineering survey, topographic mapping.
     */
    public const EPSG_ST71_BELEP = 6643;

    /**
     * ST84 Ile des Pins
     * Type: geodetic
     * Extent: New Caledonia - Ile des Pins.
     * Scope: Geodesy, cadastre, engineering survey, topographic mapping.
     * Fundamental point: Pic Nga.
     */
    public const EPSG_ST84_ILE_DES_PINS = 6642;

    /**
     * ST87 Ouvea
     * Type: geodetic
     * Extent: New Caledonia - Loyalty Islands - Ouvea.
     * Scope: Geodesy, cadastre, engineering survey, topographic mapping.
     * Ouloup.
     */
    public const EPSG_ST87_OUVEA = 6750;

    /**
     * SVY21
     * Type: geodetic
     * Extent: Singapore - onshore and offshore.
     * Scope: Cadastre.
     * Fundamental point: Base 7 at Pierce Resevoir. Latitude: 1°22'02.9154"N, longitude: 103°49'31.9752"E (of
     * Greenwich).
     * Replaces Kertau 1968 for cadastral purposes from August 2004.
     */
    public const EPSG_SVY21 = 6757;

    /**
     * SWEREF99
     * Type: geodetic
     * Extent: Sweden - onshore and offshore.
     * Scope: Geodesy, cadastre, engineering survey, topographic mapping.
     * Densification of ETRS89.
     * The solution was calculated in ITRF97 epoch 1999.5, and has subsequently been corrected to ETRS89 in accordance
     * with guidelines given by EUREF.
     */
    public const EPSG_SWEREF99 = 6619;

    /**
     * Saint Pierre et Miquelon 1950
     * Type: geodetic
     * Extent: St Pierre and Miquelon - onshore.
     * Scope: Geodesy, cadastre, engineering survey, topographic mapping.
     *
     * Replaced by RGSPM06 (datum code 1038).
     */
    public const EPSG_SAINT_PIERRE_ET_MIQUELON_1950 = 6638;

    /**
     * Santa Cruz da Graciosa
     * Type: vertical
     * Extent: Portugal - central Azores - Graciosa island onshore.
     * Scope: Geodesy, engineering survey, topographic mapping.
     * Mean Sea Level during 1938 at Santa Cruz da Graciosa.
     * Orthometric heights.
     */
    public const EPSG_SANTA_CRUZ_DA_GRACIOSA = 1106;

    /**
     * Santa Cruz das Flores
     * Type: vertical
     * Extent: Portugal - western Azores onshore - Flores, Corvo.
     * Scope: Geodesy, engineering survey, topographic mapping.
     * Mean Sea Level during 1965 at Santa Cruz das Flores.
     * Orthometric heights.
     */
    public const EPSG_SANTA_CRUZ_DAS_FLORES = 1108;

    /**
     * Santo 1965
     * Type: geodetic
     * Extent: Vanuatu - northern islands - Aese, Ambrym, Aoba, Epi, Espiritu Santo, Maewo, Malo, Malkula, Paama,
     * Pentecost, Shepherd and Tutuba.
     * Scope: Military survey.
     *
     * Datum covers all the major islands of Vanuatu in two different adjustment blocks, but practical usage is as
     * given in the area of use.
     */
    public const EPSG_SANTO_1965 = 6730;

    /**
     * Sao Tome
     * Type: geodetic
     * Extent: Sao Tome and Principe - onshore - Sao Tome.
     * Scope: Geodesy, topographic mapping.
     * Fundamental point: Fortaleza. Latitude: 0°20'49.02"N, longitude: 6°44'41.85"E (of Greenwich).
     */
    public const EPSG_SAO_TOME = 1044;

    /**
     * Sapper Hill 1943
     * Type: geodetic
     * Extent: Falkland Islands (Malvinas) - onshore.
     * Scope: Topographic mapping.
     */
    public const EPSG_SAPPER_HILL_1943 = 6292;

    /**
     * Schwarzeck
     * Type: geodetic
     * Extent: Namibia - onshore and offshore.
     * Scope: Topographic mapping.
     * Fundamental point: Schwarzeck. Latitude: 22°45'35.820"S, longitude: 18°40'34.549"E (of Greenwich). Fixed
     * during German South West Africa-British Bechuanaland boundary survey of 1898-1903.
     */
    public const EPSG_SCHWARZECK = 6293;

    /**
     * Scoresbysund 1952
     * Type: geodetic
     * Extent: Greenland - Scoresbysund area onshore.
     * Scope: Topographic mapping.
     */
    public const EPSG_SCORESBYSUND_1952 = 6195;

    /**
     * Selvagem Grande
     * Type: geodetic
     * Extent: Portugal - Selvagens islands (Madeira province) - onshore.
     * Scope: Topographic mapping.
     */
    public const EPSG_SELVAGEM_GRANDE = 6616;

    /**
     * Serbian Reference Network 1998
     * Type: geodetic
     * Extent: Serbia including Vojvodina.
     * Scope: Geodesy.
     * Densification of ETRS89 in Serbia at epoch 1998.7 based on coordinates of 6 stations in Serbia of Yugoslav
     * Reference Frame (YUREF) 1998 campaign.
     * Observed 1998-2003.
     */
    public const EPSG_SERBIAN_REFERENCE_NETWORK_1998 = 1034;

    /**
     * Serbian Spatial Reference System 2000
     * Type: geodetic
     * Extent: Serbia including Vojvodina.
     * Scope: Geodesy.
     * Densification of ETRF2000 in Serbia at epoch 2010.63.
     * Replaces SREF98.
     */
    public const EPSG_SERBIAN_SPATIAL_REFERENCE_SYSTEM_2000 = 1214;

    /**
     * Serbian Vertical Reference System 2012
     * Type: vertical
     * Extent: Serbia including Vojvodina.
     * Scope: Geodesy, engineering survey, topographic mapping.
     * Mean sea level of Adriatic Sea in 1971.
     * Normal heights above quasi-geoid. In Serbia replaces Trieste (datum code 1050).
     */
    public const EPSG_SERBIAN_VERTICAL_REFERENCE_SYSTEM_2012 = 1216;

    /**
     * Serindung
     * Type: geodetic
     * Extent: Indonesia - west Kalimantan - onshore coastal area.
     * Scope: Topographic mapping.
     * Fundamental point: Ep A. Latitude: 1°06'10.60"N, longitude: 105°00'59.82"E (of Greenwich).
     */
    public const EPSG_SERINDUNG = 6295;

    /**
     * Sibun Gorge 1922
     * Type: geodetic
     * Extent: Belize - onshore.
     * Scope: Engineering survey, topographic mapping.
     * Latitude: 17º03'40.471"N, longitude: 88º37'54.687"W.
     */
    public const EPSG_SIBUN_GORGE_1922 = 1071;

    /**
     * Sierra Leone 1968
     * Type: geodetic
     * Extent: Sierra Leone - onshore.
     * Scope: Engineering survey, topographic mapping.
     * Fundamental point: SLX2 Astro. Latitude: 8°27'17.567"N, longitude: 12°49'40.186"W (of Greenwich).
     * Extension and readjustment with additional observations of 1960 network.  Coordinates of 1960 stations change by
     * less than 3 metres.
     */
    public const EPSG_SIERRA_LEONE_1968 = 6175;

    /**
     * Sierra Leone Colony 1924
     * Type: geodetic
     * Extent: Sierra Leone - Freetown Peninsula.
     * Scope: Engineering survey, topographic mapping.
     * Fundamental point: Kortright. Latitude: 8°28'44.4"N, longitude: 13°13'03.81"W (of Greenwich).
     */
    public const EPSG_SIERRA_LEONE_COLONY_1924 = 6174;

    /**
     * Singapore Height Datum
     * Type: vertical
     * Extent: Singapore - onshore and offshore.
     * Scope: Engineering survey, GIS, topographic mapping.
     * Mean sea level determined at Victoria Dock tide gauge 1935-1937.
     * Orthometric heights. Network readjusted in 2009.
     */
    public const EPSG_SINGAPORE_HEIGHT_DATUM = 1140;

    /**
     * Sistem Referensi Geospasial Indonesia 2013
     * Type: dynamic geodetic
     * Extent: Indonesia - onshore and offshore.
     * Scope: Engineering survey, topographic mapping (large and medium scale).
     * ITRF2008 at epoch 2012.0.
     * Semi-dynamic datum. Geometric element of geodetic control network (JKG). Replaces DGN95 and all older datums.
     */
    public const EPSG_SISTEM_REFERENSI_GEOSPASIAL_INDONESIA_2013 = 1293;

    /**
     * Sistema Geodesico Nacional de Panama MACARIO SOLIS
     * Type: geodetic
     * Extent: Panama - onshore and offshore.
     * Scope: Geodesy.
     * ITRF2000 at epoch 2000.0. Densification of SIRGAS 2000 network in Panama, consisting of 20 GPS stations
     * throughout the country.
     */
    public const EPSG_SISTEMA_GEODESICO_NACIONAL_DE_PANAMA_MACARIO_SOLIS = 1066;

    /**
     * Sistema de Referencia Geocentrico para America del Sur 1995
     * Type: geodetic
     * Extent: South America - onshore and offshore. Ecuador (mainland and Galapagos) - onshore and offshore.
     * Scope: Geodesy.
     * ITRF94 at epoch 1995.4.
     * Realized by a frame of 58 stations observed in 1995 and adjusted in ITRF94. Provisional NIMA adjustment
     * reference epoch was 1995.42 but final report accepted value is 1995.40.  Replaced by SIRGAS 2000.
     */
    public const EPSG_SISTEMA_DE_REFERENCIA_GEOCENTRICO_PARA_AMERICA_DEL_SUR_1995 = 6170;

    /**
     * Sistema de Referencia Geocentrico para las AmericaS 2000
     * Type: geodetic
     * Extent: Latin America - Central America and South America - onshore and offshore. Brazil - onshore and offshore.
     * Scope: Geodesy.
     * ITRF2000 at epoch 2000.40.
     * Realized by a frame of 184 stations observed in 2000 and adjusted in the ITRF2000. Includes ties to tide gauges.
     * Replaces SIRGAS 1995 system for South America; expands SIRGAS to Central America.  Name changed in 2001 for use
     * in all of Latin America.
     */
    public const EPSG_SISTEMA_DE_REFERENCIA_GEOCENTRICO_PARA_LAS_AMERICAS_2000 = 6674;

    /**
     * Sistema de Referencia Vertical Nacional 2016
     * Type: vertical
     * Extent: Argentina - onshore.
     * Scope: Geodesy, engineering survey, topographic mapping.
     * Mean Sea Level 1923 at Mar del Plata defined at station 71 (C = 121.64978 m^2s^-2) = 12.43m for mainland,
     * Ushuaia station PF1N(383) (C = 38.427 m^2s^-2) =  3.915m for Tierra del Fuego. These geopotential numbers
     * correspond with historic values.
     * Replaces SRVN71.
     */
    public const EPSG_SISTEMA_DE_REFERENCIA_VERTICAL_NACIONAL_2016 = 1260;

    /**
     * Sister Islands Geodetic Datum 1961
     * Type: geodetic
     * Extent: Cayman Islands - Little Cayman and Cayman Brac.
     * Scope: Geodesy, cadastre, engineering survey, topographic mapping.
     * Fundamental point: LC5. Latitude: 19°39'46.324"N, longitude: 80°03'47.910"W (of Greenwich).
     * Replaced by CIGD11 (datum code 1100).
     */
    public const EPSG_SISTER_ISLANDS_GEODETIC_DATUM_1961 = 6726;

    /**
     * Slovenia Geodetic Datum 1996
     * Type: geodetic
     * Extent: Slovenia - onshore and offshore.
     * Scope: Geodesy, topographic mapping.
     * Densification of ETRS89, based on ITRS89 at epoch 1995.55.
     */
    public const EPSG_SLOVENIA_GEODETIC_DATUM_1996 = 6765;

    /**
     * Slovenian Vertical System 2000
     * Type: vertical
     * Extent: Slovenia - onshore.
     * Scope: Geodesy, engineering survey, topographic mapping.
     * Reference point Ruse defined relative to mean sea level at Trieste in 1875.
     * Normal-orthometric heights. Promulgated through the National Vertical Network adjustment of 1999.
     */
    public const EPSG_SLOVENIAN_VERTICAL_SYSTEM_2000 = 5177;

    /**
     * Slovenian Vertical System 2010
     * Type: vertical
     * Extent: Slovenia - onshore.
     * Scope: Geodesy, engineering survey, topographic mapping.
     * Mean sea level at Koper over 18.6 years, selected epoch is 2010-10-10.
     * Normal heights. Replaces SVS2000 from 2019-01.
     */
    public const EPSG_SLOVENIAN_VERTICAL_SYSTEM_2010 = 1215;

    /**
     * Solomon 1968
     * Type: geodetic
     * Extent: Solomon Islands - onshore southern Solomon Islands, primarily Guadalcanal, Malaita, San Cristobel, Santa
     * Isobel, Choiseul, Makira-Ulawa.
     * Scope: Military survey.
     * Fundamental point: GUX 1.
     */
    public const EPSG_SOLOMON_1968 = 6718;

    /**
     * South Africa Land Levelling Datum
     * Type: vertical
     * Extent: South Africa - mainland onshore.
     * Scope: Geodesy, cadastre, engineering survey, topographic mapping.
     * Mean Sea Level at Cape Town harbour 1900 and 1907, referred to Datum Benchmark BM1.
     * Orthometric heights.
     */
    public const EPSG_SOUTH_AFRICA_LAND_LEVELLING_DATUM = 1262;

    /**
     * South American Datum 1969
     * Type: geodetic
     * Extent: Brazil - onshore and offshore. In rest of South America - onshore north of approximately 45°S and
     * Tierra del Fuego.
     * Scope: Topographic mapping.
     * Fundamental point: Chua. Geodetic latitude: 19°45'41.6527"S; geodetic longitude: 48°06'04.0639"W (of
     * Greenwich). (Astronomic coordinates: Latitude 19°45'41.34"S +/- 0.05", longitude 48°06'07.80"W +/- 0.08").
     * SAD69 uses GRS 1967 ellipsoid but with 1/f to exactly 2 decimal places. In Brazil only, replaced by SAD69(96)
     * (datum code 1075).
     */
    public const EPSG_SOUTH_AMERICAN_DATUM_1969 = 6618;

    /**
     * South American Datum 1969(96)
     * Type: geodetic
     * Extent: Brazil - onshore and offshore. Includes Rocas, Fernando de Noronha archipelago, Trindade, Ihlas Martim
     * Vaz and Sao Pedro e Sao Paulo.
     * Scope: Topographic mapping.
     * Fundamental point: Chua. Geodetic latitude: 19°45'41.6527"S; geodetic longitude: 48°06'04.0639"W (of
     * Greenwich). (Astronomic coordinates: Latitude 19°45'41.34"S +/- 0.05", longitude 48°06'07.80"W +/- 0.08").
     * SAD69 uses GRS 1967 ellipsoid but with 1/f to exactly 2 decimal places. Replaces original 1969 adjustment (datum
     * code 6618) in Brazil.
     */
    public const EPSG_SOUTH_AMERICAN_DATUM_1969_96 = 1075;

    /**
     * South East Island 1943
     * Type: geodetic
     * Extent: Seychelles - Mahe, Silhouette, North, Aride Island, Praslin, La Digue and Frigate islands including
     * adjacent smaller granitic islands on the Seychelles Bank, Bird Island and Denis Island.
     * Scope: Topographic mapping.
     * Fundamental point: Challenger Astro near Port Victoria lighthouse. Latitude: 4°40'39.460"S, longitude:
     * 55°32'00.166"E (of Greenwich).
     * Network readjusted in 1958-59 and extended to Bird and Denis islands in 1975.
     */
    public const EPSG_SOUTH_EAST_ISLAND_1943 = 1138;

    /**
     * South Georgia 1968
     * Type: geodetic
     * Extent: South Georgia and the South Sandwich Islands - South Georgia onshore.
     * Scope: Military survey.
     * Fundamental point: ISTS 061.
     */
    public const EPSG_SOUTH_GEORGIA_1968 = 6722;

    /**
     * South Yemen
     * Type: geodetic
     * Extent: Yemen - South Yemen onshore mainland.
     * Scope: Topographic mapping.
     */
    public const EPSG_SOUTH_YEMEN = 6164;

    /**
     * Sri Lanka Datum 1999
     * Type: geodetic
     * Extent: Sri Lanka - onshore.
     * Scope: Topographic mapping.
     * Fundamental point: ISM Diyatalawa. Latitude: 6°49'02.687"N, longitude: 80°57'40.880"E.
     * Introduced in 2000.
     */
    public const EPSG_SRI_LANKA_DATUM_1999 = 1053;

    /**
     * Sri Lanka Vertical Datum
     * Type: vertical
     * Extent: Sri Lanka - onshore.
     * Scope: Geodesy, engineering survey, topographic mapping.
     * MSL at Colombo 1884-1889.
     * Normal-orthometric heights, but often referred to as "orthometric".
     */
    public const EPSG_SRI_LANKA_VERTICAL_DATUM = 1054;

    /**
     * St. George Island
     * Type: geodetic
     * Extent: United States (USA) - Alaska - Pribilof Islands - St George Island.
     * Scope: Topographic mapping.
     * Fundamental point latitude: 56°36'11.31"N, longitude: 169°32'36.00"W (of Greenwich).
     * Many Alaskan islands were never on NAD27 but rather on independent datums.  NADCON conversion program provides
     * transformation from St. George Island Datum to NAD83 (original 1986 realization) - making the transformation
     * appear to user as if from NAD27.
     */
    public const EPSG_ST_GEORGE_ISLAND = 6138;

    /**
     * St. Helena Geodetic Datum 2015
     * Type: geodetic
     * Extent: St Helena, Ascension and Tristan da Cunha - St Helena Island - onshore.
     * Scope: Geodesy, topographic mapping.
     * ITRF2008 at epoch 2015.0. ITRF2008 coordinates (15°56'33.1198"S, 5°40'02.4412"W, 453.183m ellipsoid height) of
     * Longwood IGS CORS station STHL on 1st January 2015.
     * Developed by Richard Stanaway, Quickclose Pty Ltd, superseding Astro DOS 71 from 1st January 2016.
     */
    public const EPSG_ST_HELENA_GEODETIC_DATUM_2015 = 1174;

    /**
     * St. Helena Tritan
     * Type: geodetic
     * Extent: St Helena, Ascension and Tristan da Cunha - St Helena Island - onshore.
     * Scope: Engineering survey including Airport and Ruperts Wharf construction.
     * WGS 84(G1150) at epoch 2011.773. WGS 84 coordinates (15°56'33.1217"S, 5°40'02.4436"W, 453.288m ellipsoid
     * height) of Longwood IGS CORS station STHL on 9th October 2011.
     */
    public const EPSG_ST_HELENA_TRITAN = 1173;

    /**
     * St. Helena Tritan Vertical Datum 2011
     * Type: vertical
     * Extent: St Helena, Ascension and Tristan da Cunha - St Helena Island - onshore.
     * Scope: Engineering survey.
     * MSL defined by Longwood IGS station STHL reference level of 436.215m.
     * Defined by offset of -17.073m applied to St. Helena Tritan ellipsiodal height (CRS code 7880).
     */
    public const EPSG_ST_HELENA_TRITAN_VERTICAL_DATUM_2011 = 1176;

    /**
     * St. Helena Vertical Datum 2015
     * Type: vertical
     * Extent: St Helena, Ascension and Tristan da Cunha - St Helena Island - onshore.
     * Scope: Geodesy, engineering survey, topographic mapping.
     * Longwood IGS station STHL reference level of 436.312m.
     * Defined by SHGEOID15 geoid model (transformation code 7891) applied to SHGD2015 (CRS code 7885).
     */
    public const EPSG_ST_HELENA_VERTICAL_DATUM_2015 = 1177;

    /**
     * St. Kilda
     * Type: vertical
     * Extent: United Kingdom (UK) - Great Britain - Scotland - St Kilda onshore.
     * Scope: Geodesy, topographic mapping.
     *
     * Orthometric heights.
     */
    public const EPSG_ST_KILDA = 5145;

    /**
     * St. Kitts 1955
     * Type: geodetic
     * Extent: St Kitts and Nevis - onshore.
     * Scope: Topographic mapping.
     * Fundamental point: station K12.
     */
    public const EPSG_ST_KITTS_1955 = 6605;

    /**
     * St. Lawrence Island
     * Type: geodetic
     * Extent: United States (USA) - Alaska - St Lawrence Island.
     * Scope: Topographic mapping.
     *
     * Many Alaskan islands were never on NAD27 but rather on independent datums.  NADCON conversion program provides
     * transformation from St. Lawrence Island Datum to NAD83 (original 1986 realization) - making the transformation
     * appear to user as if from NAD27.
     */
    public const EPSG_ST_LAWRENCE_ISLAND = 6136;

    /**
     * St. Lucia 1955
     * Type: geodetic
     * Extent: St Lucia - onshore.
     * Scope: Topographic mapping.
     * Fundamental point: station DCS3.
     */
    public const EPSG_ST_LUCIA_1955 = 6606;

    /**
     * St. Marys
     * Type: vertical
     * Extent: United Kingdom (UK) - Great Britain - England - Isles of Scilly onshore.
     * Scope: Geodesy, topographic mapping.
     * Mean Sea Level at St. Marys 1887. Initially realised through levelling network adjustment, from 2002 redefined
     * to be realised through OSGM geoid model.
     * Orthometric heights.
     */
    public const EPSG_ST_MARYS = 5147;

    /**
     * St. Paul Island
     * Type: geodetic
     * Extent: United States (USA) - Alaska - Pribilof Islands - St Paul Island.
     * Scope: Topographic mapping.
     * Fundamental point latitude: 57°07'16.86"N, longitude: 170°16'24.00"W (of Greenwich).
     * Many Alaskan islands were never on NAD27 but rather on independent datums.  NADCON conversion program provides
     * transformation from St. Paul Island Datum to NAD83 (original 1986 realization) - making the transformation
     * appear to user as if from NAD27.
     */
    public const EPSG_ST_PAUL_ISLAND = 6137;

    /**
     * St. Stephen (Ferro)
     * Type: geodetic
     * Extent: Austria - Lower Austria. Czechia - Moravia and Czech Silesia.
     * Scope: Cadastre.
     * Fundamental point: St. Stephen's cathedral, Vienna. Latitude: 48°12'31.54"N, longitude: 34°02'27.32"E (of
     * Ferro).
     */
    public const EPSG_ST_STEPHEN_FERRO = 1189;

    /**
     * St. Vincent 1945
     * Type: geodetic
     * Extent: St Vincent and the northern Grenadine Islands - onshore.
     * Scope: Topographic mapping.
     * Fundamental point: station V1, Fort Charlotte.
     */
    public const EPSG_ST_VINCENT_1945 = 6607;

    /**
     * Staatlichen Nivellementnetzes 1976
     * Type: vertical
     * Extent: Germany - states of former East Germany - Berlin, Brandenburg; Mecklenburg-Vorpommern; Sachsen;
     * Sachsen-Anhalt; Thuringen.
     * Scope: Geodesy, engineering survey, topographic mapping.
     * Network adjusted in 1976. Height at reference point Hoppegarten defined as 1957 value from the UPLN adjustment.
     * Datum at Kronstadt is mean sea level of Baltic in 1833.
     * Introduced in 1979. Uses Normal heights. Replaced by DHHN92.
     */
    public const EPSG_STAATLICHEN_NIVELLEMENTNETZES_1976 = 5183;

    /**
     * Stewart Island 1977
     * Type: vertical
     * Extent: New Zealand - Stewart Island.
     * Scope: Geodesy, engineering survey, topographic mapping.
     * MSL at 3-5 high and low tides at two different locations.
     */
    public const EPSG_STEWART_ISLAND_1977 = 5170;

    /**
     * Stockholm 1938
     * Type: geodetic
     * Extent: Sweden - onshore.
     * Scope: Geodesy, cadastre, engineering survey, topographic mapping.
     * Fundamental point: Stockholm observatory.
     * Replaced by RT90 adjustment (datum code 6124).
     */
    public const EPSG_STOCKHOLM_1938 = 6308;

    /**
     * Stockholm 1938 (Stockholm)
     * Type: geodetic
     * Extent: Sweden - onshore.
     * Scope: Geodesy, cadastre, engineering survey, topographic mapping.
     * Fundamental point: Stockholm observatory
     * Replaced by RT90 adjustment (datum code 6124).
     */
    public const EPSG_STOCKHOLM_1938_STOCKHOLM = 6814;

    /**
     * Stornoway
     * Type: vertical
     * Extent: United Kingdom (UK) - Great Britain - Scotland - Outer Hebrides onshore.
     * Scope: Geodesy, topographic mapping.
     * Mean Sea Level at Stornoway 1977 correlated to pre-1900. Initially realised through levelling network
     * adjustment, from 2002 redefined to be realised through OSGM geoid model.
     * Orthometric heights.
     */
    public const EPSG_STORNOWAY = 5144;

    /**
     * Sule Skerry
     * Type: vertical
     * Extent: United Kingdom (UK) - Great Britain - Scotland - Sule Skerry onshore.
     * Scope: Geodesy, topographic mapping.
     *
     * Orthometric heights.
     */
    public const EPSG_SULE_SKERRY = 5142;

    /**
     * Swiss Terrestrial Reference Frame 1995
     * Type: geodetic
     * Extent: Liechtenstein; Switzerland.
     * Scope: Geodesy, cadastre, engineering survey, topographic mapping.
     * ETRF89 at epoch 1993.0.
     */
    public const EPSG_SWISS_TERRESTRIAL_REFERENCE_FRAME_1995 = 6151;

    /**
     * System of the Unified Trigonometrical Cadastral Network
     * Type: geodetic
     * Extent: Czechia; Slovakia.
     * Scope: Geodesy, cadastre, engineering survey, topographic mapping.
     * Modification of Austrian MGI datum, code 6312.
     */
    public const EPSG_SYSTEM_OF_THE_UNIFIED_TRIGONOMETRICAL_CADASTRAL_NETWORK = 6156;

    /**
     * System of the Unified Trigonometrical Cadastral Network (Ferro)
     * Type: geodetic
     * Extent: Czechia; Slovakia.
     * Scope: Geodesy, cadastre, engineering survey, topographic mapping.
     * Modification of Austrian MGI (Ferro) datum.
     */
    public const EPSG_SYSTEM_OF_THE_UNIFIED_TRIGONOMETRICAL_CADASTRAL_NETWORK_FERRO = 6818;

    /**
     * System of the Unified Trigonometrical Cadastral Network [JTSK03]
     * Type: geodetic
     * Extent: Slovakia.
     * Scope: Geodesy, cadastre, engineering survey, topographic mapping.
     */
    public const EPSG_SYSTEM_OF_THE_UNIFIED_TRIGONOMETRICAL_CADASTRAL_NETWORK_JTSK03 = 1201;

    /**
     * System of the Unified Trigonometrical Cadastral Network/05
     * Type: geodetic
     * Extent: Czechia.
     * Scope: Geodesy, cadastre, engineering survey, topographic mapping.
     * Constrained to S-JTSK but realised through readjustment in projected CRS domain. Related to ETRS89 R05
     * realisation through transformation code 5226.
     */
    public const EPSG_SYSTEM_OF_THE_UNIFIED_TRIGONOMETRICAL_CADASTRAL_NETWORK_05 = 1052;

    /**
     * System of the Unified Trigonometrical Cadastral Network/05 (Ferro)
     * Type: geodetic
     * Extent: Czechia.
     * Scope: Geodesy, cadastre, engineering survey, topographic mapping.
     * Constrained to S-JTSK but realised through readjustment in projected CRS domain.
     */
    public const EPSG_SYSTEM_OF_THE_UNIFIED_TRIGONOMETRICAL_CADASTRAL_NETWORK_05_FERRO = 1055;

    /**
     * TM65
     * Type: geodetic
     * Extent: Ireland - onshore. United Kingdom (UK) - Northern Ireland (Ulster) - onshore.
     * Scope: Topographic mapping.
     * Adjusted to best mean fit 12 stations of the OSNI 1952 primary adjustment.
     * Differences between OSNI 1952 and TM65 at these stations are RMS 0.25m east, 0.23m north, maximum vector 0.57m.
     * TM65 replaced by and not to be confused with Geodetic Datum of 1965 alias 1975 Mapping Adjustment or TM75 (datum
     * code 6300).
     */
    public const EPSG_TM65 = 6299;

    /**
     * TPEN11 Intermediate Reference Frame
     * Type: geodetic
     * Extent: UK - on or related to the Trans-Pennine rail route from Liverpool via Manchester to Bradford and Leeds.
     * Scope: Engineering survey and topographic mapping for railway applications.
     * Defined through the application of the TPEN11 NTv2 transformation (code 9365) to ETRS89 as realized through
     * OSNet v2009 CORS.
     * Created in 2020 to support intermediate CRS "TPEN11-IRF" in the emulation of the combined TPEN11 Snake and
     * TPEN11ext Snake map projections.
     */
    public const EPSG_TPEN11_INTERMEDIATE_REFERENCE_FRAME = 1266;

    /**
     * Tahaa 54
     * Type: geodetic
     * Extent: French Polynesia - Society Islands - Bora Bora, Huahine, Raiatea and Tahaa.
     * Scope: Geodesy, cadastre, engineering survey, topographic mapping.
     * Fundamental point: Tahaa East Base. Latitude: 16°33'20.97"S, longitude: 151°29'06.25"W (of Greenwich).
     * Replaced by RGPF (datum code 6687).
     */
    public const EPSG_TAHAA_54 = 6629;

    /**
     * Tahaa SAU 2001
     * Type: vertical
     * Extent: French Polynesia - Society Islands - Tahaa.
     * Scope: Geodesy, engineering survey, topographic mapping.
     * Fundamental benchmark: RN16
     * Included as part of NGPF - see datum code 5195.
     */
    public const EPSG_TAHAA_SAU_2001 = 5201;

    /**
     * Tahiti 52
     * Type: geodetic
     * Extent: French Polynesia - Society Islands - Moorea and Tahiti.
     * Scope: Geodesy, cadastre, engineering survey, topographic mapping.
     * Fundamental point: Tahiti North Base. Latitude: 17°38'10.0"S, longitude: 149°36'57.8"W (of Greenwich).
     * Replaced by Tahiti 79 (datum code 6690) in Tahiti and Moorea 87 (code 6691) in Moorea.
     */
    public const EPSG_TAHITI_52 = 6628;

    /**
     * Tahiti 79
     * Type: geodetic
     * Extent: French Polynesia - Society Islands - Tahiti.
     * Scope: Hydrography, topographic mapping.
     * Fundamental point: Tahiti North Base. Latitude: 17°38'10.0"S, longitude: 149°36'57.8"W (of Greenwich).
     * Replaces Tahiti 52 (datum code 6628) in Tahiti. Replaced by RGPF (datum code 6687).
     */
    public const EPSG_TAHITI_79 = 6690;

    /**
     * Taiwan Datum 1967
     * Type: geodetic
     * Extent: Taiwan, Republic of China - onshore - Taiwan Island, Penghu (Pescadores) Islands.
     * Scope: Geodesy, cadastre, engineering survey, topographic mapping.
     * Fundamental point: Hu Tzu Shan. Latitude: 23°58'32.34"N, longitude: 120°58'25.975"E (of Greenwich).
     * Adopted in 1980. TWD67 uses the GRS 1967 ellipsoid but with 1/f to exactly 2 decimal places.
     */
    public const EPSG_TAIWAN_DATUM_1967 = 1025;

    /**
     * Taiwan Datum 1997
     * Type: geodetic
     * Extent: Taiwan, Republic of China - onshore and offshore - Taiwan Island, Penghu (Pescadores) Islands.
     * Scope: Geodesy, engineering survey, topographic mapping.
     * ITRF94 at epoch 1997.0
     * Adopted in 1998.
     */
    public const EPSG_TAIWAN_DATUM_1997 = 1026;

    /**
     * Taiwan Vertical Datum 2001
     * Type: vertical
     * Extent: Taiwan, Republic of China - onshore - Taiwan Island.
     * Scope: Geodesy, engineering survey, topographic mapping.
     * Mean Sea Level at Keelung between 1957 and 1991.
     * Orthometric heights.
     */
    public const EPSG_TAIWAN_VERTICAL_DATUM_2001 = 1224;

    /**
     * Tananarive 1925
     * Type: geodetic
     * Extent: Madagascar - onshore and nearshore.
     * Scope: Topographic mapping.
     * Fundamental point: Tananarive observatory. Latitude: 18°55'02.10"S, longitude: 47°33'06.75"E (of Greenwich).
     */
    public const EPSG_TANANARIVE_1925 = 6297;

    /**
     * Tananarive 1925 (Paris)
     * Type: geodetic
     * Extent: Madagascar - onshore.
     * Scope: Topographic mapping.
     * Fundamental point: Tananarive observatory. Latitude: 21.0191667g S, longitude: 50.23849537g E (of Paris).
     */
    public const EPSG_TANANARIVE_1925_PARIS = 6810;

    /**
     * Tapi Aike
     * Type: geodetic
     * Extent: Argentina - Santa Cruz province south of approximately 50°20'S.
     * Scope: Oil and gas exploration and production.
     *
     * Replaced by Campo Inchauspe (code 6221) for topographic mapping, use for oil exploration and production
     * continues.
     */
    public const EPSG_TAPI_AIKE = 1257;

    /**
     * Taranaki 1970
     * Type: vertical
     * Extent: New Zealand - North Island - Taranaki vertical CRS area.
     * Scope: Geodesy, engineering survey, topographic mapping.
     * MSL at Taranaki harbour 1918-1921.
     */
    public const EPSG_TARANAKI_1970 = 5167;

    /**
     * Tararu 1952
     * Type: vertical
     * Extent: New Zealand - North Island - Tararu vertical CRS area.
     * Scope: Geodesy, engineering survey, topographic mapping.
     * MSL at Tararu Point 1922-1923.
     */
    public const EPSG_TARARU_1952 = 5166;

    /**
     * Tenerife
     * Type: vertical
     * Extent: Spain - Canary Islands - Tenerife onshore.
     * Scope: Geodesy, engineering survey, topographic mapping.
     * Mean Sea Level at Santa Cruz de Tenerife harbour between 1960 and 1970.
     * Orthometric heights.
     */
    public const EPSG_TENERIFE = 1281;

    /**
     * Tern Island 1961
     * Type: geodetic
     * Extent: United States (USA) - Hawaii - Tern Island and Sorel Atoll.
     * Scope: Military survey.
     * Fundamental point: station FRIG on tern island, station B4 on Sorol Atoll.
     * Two independent astronomic determinations considered to be consistent through adoption of common transformation
     * to WGS 84 (see tfm code 15795).
     */
    public const EPSG_TERN_ISLAND_1961 = 6707;

    /**
     * Tete
     * Type: geodetic
     * Extent: Mozambique - onshore.
     * Scope: Topographic mapping.
     * Fundamental point: Tete.
     */
    public const EPSG_TETE = 6127;

    /**
     * Timbalai 1948
     * Type: geodetic
     * Extent: Brunei - onshore and offshore; Malaysia - East Malaysia (Sabah; Sarawak) - onshore and offshore.
     * Scope: Topographic mapping.
     * Fundamental point: Station P85 at Timbalai. Latitude: 5°17' 3.548"N, longitude: 115°10'56.409"E (of
     * Greenwich).
     * In 1968, the original adjustment was densified in Sarawak and extended to Sabah.
     */
    public const EPSG_TIMBALAI_1948 = 6298;

    /**
     * Tokyo
     * Type: geodetic
     * Extent: Japan - onshore; North Korea - onshore; South Korea - onshore.
     * Scope: Geodesy, cadastre, engineering survey, topographic mapping.
     * Fundamental point: Nikon-Keido-Genten. Latitude: 35°39'17.5148"N, longitude: 139°44'40.5020"E (of Greenwich).
     * Longitude derived in 1918.
     * In Japan, replaces Tokyo 1892 (code 1048) and replaced by Japanese Geodetic Datum 2000 (code 6611). In Korea
     * used only for geodetic applications before being replaced by Korean 1985 (code 6162).
     */
    public const EPSG_TOKYO = 6301;

    /**
     * Tokyo 1892
     * Type: geodetic
     * Extent: Japan - onshore; North Korea - onshore; South Korea - onshore.
     * Scope: Cadastre, engineering survey, topographic mapping.
     * Fundamental point: Nikon-Keido-Genten. Latitude: 35°39'17.5148"N, longitude: 139°44'30.0970"E (of Greenwich).
     * Longitude derived in 1892.
     * Extended from Japan to Korea in 1898. In Japan replaced by Tokyo 1918 (datum code 6301). In South Korea replaced
     * by Tokyo 1918 (code 6301) only for geodetic purposes; for all other purposes replaced by Korean 1985 (code
     * 6162).
     */
    public const EPSG_TOKYO_1892 = 1048;

    /**
     * Tonga Geodetic Datum 2005
     * Type: geodetic
     * Extent: Tonga - onshore and offshore.
     * Scope: Geodesy, cadastre, engineering survey, topographic mapping.
     * Based on ITRF2000 at epoch 2005.0.
     */
    public const EPSG_TONGA_GEODETIC_DATUM_2005 = 1095;

    /**
     * Trieste
     * Type: vertical
     * Extent: Boznia and Herzegovina; Croatia - onshore; Kosovo; Montenegro - onshore; North Macedonia; Serbia;
     * Slovenia - onshore.
     * Scope: Geodesy, engineering survey, topographic mapping.
     * Reference point HM1(BV1)-Trieste defined relative to mean sea level at Trieste in 1875.
     * Normal-orthometric heights. In Croatia replaced by HVRS71 (datum code 5207).
     */
    public const EPSG_TRIESTE = 1050;

    /**
     * Trinidad 1903
     * Type: geodetic
     * Extent: Trinidad and Tobago - Trinidad - onshore and offshore.
     * Scope: Topographic mapping.
     * Station 00, Harbour Master's Flagstaff, Port of Spain.
     * Trinidad 1903 / Trinidad Grid coordinates (Clarke's links): 333604.30 E, 436366.91 N (Latitude: 10°38'39.01"N,
     * Longitude: 61°30'38.00"W of Greenwich).
     */
    public const EPSG_TRINIDAD_1903 = 6302;

    /**
     * Tristan 1968
     * Type: geodetic
     * Extent: St Helena, Ascension and Tristan da Cunha - Tristan da Cunha island group including Tristan,
     * Inaccessible, Nightingale, Middle and Stoltenhoff Islands.
     * Scope: Military survey.
     */
    public const EPSG_TRISTAN_1968 = 6734;

    /**
     * Trucial Coast 1948
     * Type: geodetic
     * Extent: United Arab Emirates (UAE) - Abu Dhabi onshore and Dubai onshore.
     * Scope: Oil and gas exploration.
     * Fundamental point: TC1. Latitude: 25°23'50.190"N, longitude: 55°26'43.950"E (of Greenwich).
     */
    public const EPSG_TRUCIAL_COAST_1948 = 6303;

    /**
     * Turkish National Reference Frame
     * Type: geodetic
     * Extent: Turkey - onshore and offshore.
     * Scope: Geodesy.
     * ITRF96 at epoch 2005.0.
     */
    public const EPSG_TURKISH_NATIONAL_REFERENCE_FRAME = 1057;

    /**
     * Tutuila Vertical Datum of 1962
     * Type: vertical
     * Extent: American Samoa - Tutuila island.
     * Scope: Geodesy, topographic mapping.
     * Mean sea level at Pago Pago harbor, Tutuila, over 10 years 1949-1955 and 1957-1959. Benchmark NO 2 1948 =
     * 7.67ftUS.
     * Replaced by American Samoa Vertical Datum of 2002 (datum code 1125).
     */
    public const EPSG_TUTUILA_VERTICAL_DATUM_OF_1962 = 1121;

    /**
     * Ukraine 2000
     * Type: geodetic
     * Extent: Ukraine - onshore and offshore.
     * Scope: Geodesy.
     * Orientation and scale constrained to be same as ITRF2000 at epoch 2005.0. Position is minimised deviation
     * between reference ellipsoid and quasigeoid in territory of Ukraine.
     */
    public const EPSG_UKRAINE_2000 = 1077;

    /**
     * Vanua Levu 1915
     * Type: geodetic
     * Extent: Fiji - Vanua Levu and Taveuni.
     * Scope: Geodesy, cadastre, engineering survey, topographic mapping.
     * Latitude origin was obtained astronomically at station Numuiloa = 16°23'38.36"S, longitude origin was obtained
     * astronomically at station Suva = 178°25'35.835"E.
     * For topographic mapping, replaced by Fiji 1956. For other purposes, replaced by Fiji 1986.
     */
    public const EPSG_VANUA_LEVU_1915 = 6748;

    /**
     * Vientiane 1982
     * Type: geodetic
     * Extent: Laos.
     * Scope: Topographic mapping.
     * Fundamental point: Vientiane (Nongteng) Astro Pillar. Latitude: 18°01'31.6301"N, longitude: 102°30'56.6999"E
     * (of Greenwich).
     * Replaced by Lao 1993.
     */
    public const EPSG_VIENTIANE_1982 = 6676;

    /**
     * Vietnam 2000
     * Type: geodetic
     * Extent: Vietnam - onshore.
     * Scope: Geodesy, engineering survey, topographic mapping.
     * Point N00, located in the premises of the Land Administration Research Institute, Hoang Quoc Viet Street, Hanoi.
     * Replaces Hanoi 1972.
     */
    public const EPSG_VIETNAM_2000 = 6756;

    /**
     * Virgin Islands Vertical Datum of 2009
     * Type: vertical
     * Extent: US Virgin Islands - onshore - St Croix, St John, and St Thomas.
     * Scope: Geodesy, topographic mapping.
     * Mean sea level for National Tidal Datum Epoch 1983–2001 at (i) Lime Tree Bay, St. Croix (BM 9751401 M =
     * 3.111m) , (ii) Lameshur Bay, St. John (BM 9751381 TIDAL A = 1.077m) , and (iii) Charlotte Amalie, St. Thomas (BM
     * 9751639 F = 1.552m).
     * Replaces all earlier vertical datums on these islands.
     */
    public const EPSG_VIRGIN_ISLANDS_VERTICAL_DATUM_OF_2009 = 1124;

    /**
     * Viti Levu 1912
     * Type: geodetic
     * Extent: Fiji - Viti Levu island.
     * Scope: Geodesy, cadastre, engineering survey, topographic mapping.
     * Latitude origin was obtained astronomically at station Monavatu = 17°53'28.285"S, longitude origin was obtained
     * astronomically at station Suva = 178°25'35.835"E.
     * For topographic mapping, replaced by Fiji 1956. For other purposes, replaced by Fiji 1986.
     */
    public const EPSG_VITI_LEVU_1912 = 6752;

    /**
     * Voirol 1875
     * Type: geodetic
     * Extent: Algeria - onshore north of 32°N.
     * Scope: Topographic mapping.
     * Fundamental point: Voirol. Latitude: 36°45'07.927"N, longitude: 3°02'49.435"E of Greenwich. Uses RGS (and old
     * IGN) value of 2°20'13.95"for Greenwich-Paris meridian difference.
     * Replaced by Voirol 1879 (code 6671).
     */
    public const EPSG_VOIROL_1875 = 6304;

    /**
     * Voirol 1875 (Paris)
     * Type: geodetic
     * Extent: Algeria - onshore north of 32°N.
     * Scope: Topographic mapping.
     * Fundamental point: Voirol. Latitude: 40.83578 grads N, longitude: 0.78873 grads E (of Paris).
     */
    public const EPSG_VOIROL_1875_PARIS = 6811;

    /**
     * Voirol 1879
     * Type: geodetic
     * Extent: Algeria - onshore north of 32°N.
     * Scope: Topographic mapping.
     * Fundamental point: Voirol. Latitude: 36°45'08.199"N, longitude: 3°02'49.435"E (of Greenwich). Uses RGS (and
     * old IGN) value of 2°20'13.95"for Greenwich-Paris meridian difference.
     * Replaces Voirol 1875 (code 6304).
     */
    public const EPSG_VOIROL_1879 = 6671;

    /**
     * Voirol 1879 (Paris)
     * Type: geodetic
     * Extent: Algeria - onshore north of 32°N.
     * Scope: Topographic mapping.
     * Fundamental point: Voirol. Latitude: 40.835864 grads N, longitude: 0.788735 grads E (of Paris).
     * Replaces Voirol 1875 (Paris) (code 6811).
     */
    public const EPSG_VOIROL_1879_PARIS = 6821;

    /**
     * WGS 72 Transit Broadcast Ephemeris
     * Type: dynamic geodetic
     * Extent: World.
     * Scope: Satellite navigation.
     *
     * Alleged datum for use with Transit broadcast ephemeris prior to 1989. Relationship to WGS 72 has changed over
     * time.
     */
    public const EPSG_WGS_72_TRANSIT_BROADCAST_EPHEMERIS = 6324;

    /**
     * Waitangi (Chatham Island) 1959
     * Type: vertical
     * Extent: New Zealand - Chatham Island - onshore.
     * Scope: Geodesy, engineering survey, topographic mapping.
     * MSL at Waitangi harbour collected in 1959.
     */
    public const EPSG_WAITANGI_CHATHAM_ISLAND_1959 = 5169;

    /**
     * Wake Island 1952
     * Type: geodetic
     * Extent: Wake atoll - onshore.
     * Scope: Military survey.
     */
    public const EPSG_WAKE_ISLAND_1952 = 6733;

    /**
     * Wellington 1953
     * Type: vertical
     * Extent: New Zealand - North Island - Wellington vertical CRS area.
     * Scope: Geodesy, engineering survey, topographic mapping.
     * MSL at Wellington harbour 1909-1946.
     */
    public const EPSG_WELLINGTON_1953 = 5168;

    /**
     * Wiener Null
     * Type: vertical
     * Extent: Austria - Vienna city state.
     * Scope: Municipal spatial referencing.
     * Historic benchmark on the Schwedenbrücke over an artificial channel of River Danube (Donaukanal) with GHA
     * height of 156.680m.
     */
    public const EPSG_WIENER_NULL = 1267;

    /**
     * World Geodetic System 1966
     * Type: dynamic geodetic
     * Extent: World.
     * Scope: Geodesy.
     * Developed from a worldwide distribution of terrestrial and geodetic satellite observations and defined through a
     * set of station coordinates.
     * A worldwide 5° × 5° mean free air gravity anomaly field provided the basic data for producing the WGS 66
     * gravimetric geoid. Replaced by WGS 72.
     */
    public const EPSG_WORLD_GEODETIC_SYSTEM_1966 = 6760;

    /**
     * World Geodetic System 1972
     * Type: dynamic geodetic
     * Extent: World.
     * Scope: Satellite navigation.
     * Developed from a worldwide distribution of terrestrial and geodetic satellite observations and defined through a
     * set of station coordinates.
     * Used by GPS before 1987. For Transit satellite positioning see also WGS 72BE.
     */
    public const EPSG_WORLD_GEODETIC_SYSTEM_1972 = 6322;

    /**
     * World Geodetic System 1984 (G1150)
     * Type: dynamic geodetic
     * Extent: World.
     * Scope: Geodesy. Navigation and positioning using GPS satellite system.
     * Defined through coordinates of 17 GPS tracking stations adjusted to a subset of 49 IGS stations. Observations
     * made in February 2001. The reference epoch for ITRF2000 is 1997.0; station coordinates were transformed to
     * 2001.0 using IERS station velocities.
     * Replaces World Geodetic System 1984 (G873) from 2002-01-20. Replaced by World Geodetic System 1984 (G1674) from
     * 2012-02-08.
     */
    public const EPSG_WORLD_GEODETIC_SYSTEM_1984_G1150 = 1154;

    /**
     * World Geodetic System 1984 (G1674)
     * Type: dynamic geodetic
     * Extent: World.
     * Scope: Geodesy. Navigation and positioning using GPS satellite system.
     * Defined through coordinates of 15 GPS tracking stations adjusted to a subset of IGS stations at epoch 2005.0.
     * The IGS station coordinates are considered to be equivalent to ITRF2008.
     * Replaces World Geodetic System 1984 (G1150) from 2012-02-08. Replaced by World Geodetic System 1984 (G1762) from
     * 2013-10-16.
     */
    public const EPSG_WORLD_GEODETIC_SYSTEM_1984_G1674 = 1155;

    /**
     * World Geodetic System 1984 (G1762)
     * Type: dynamic geodetic
     * Extent: World.
     * Scope: Geodesy. Navigation and positioning using GPS satellite system.
     * Defined through coordinates of 19 GPS tracking stations adjusted to a subset of IGb08 stations at epoch 2005.0
     * using observations made in May 2013. The IGb08 station coordinates are considered to be equivalent to ITRF2008.
     * Replaces World Geodetic System 1984 (G1674) from 2013-10-16.
     */
    public const EPSG_WORLD_GEODETIC_SYSTEM_1984_G1762 = 1156;

    /**
     * World Geodetic System 1984 (G730)
     * Type: dynamic geodetic
     * Extent: World.
     * Scope: Geodesy. Navigation and positioning using GPS satellite system.
     * Defined through coordinates of 10 GPS tracking stations adjusted to a subset of ITRF92 stations at epoch 1994.0.
     * The reference epoch for ITRF92 is 1988.0; the ITRF92 station coordinates were transformed to 1994.0 using the
     * NNR-NUVEL1 plate motion model.
     * Replaces the original Transit-derived World Geodetic System 1984 from 1994-06-29. Replaced by World Geodetic
     * System 1984 (G873) from 1997-01-29.
     */
    public const EPSG_WORLD_GEODETIC_SYSTEM_1984_G730 = 1152;

    /**
     * World Geodetic System 1984 (G873)
     * Type: dynamic geodetic
     * Extent: World.
     * Scope: Geodesy. Navigation and positioning using GPS satellite system.
     * Defined through coordinates of 15 GPS tracking stations adjusted to a subset of ITRF92 stations at epoch 1997.0.
     * The reference epoch for ITRF92 is 1988.0; the ITRF92 station coordinates were transformed to 1997.0 using the
     * NNR-NUVEL1A plate motion model.
     * Replaces World Geodetic System 1984 (G730) from 1997-01-29. Replaced by World Geodetic System 1984 (G1150) from
     * 2002-01-20.
     */
    public const EPSG_WORLD_GEODETIC_SYSTEM_1984_G873 = 1153;

    /**
     * World Geodetic System 1984 (Transit)
     * Type: dynamic geodetic
     * Extent: World.
     * Scope: Geodesy. Navigation and positioning using GPS satellite system.
     * Defined through coordinates of 5 GPS tracking stations in the Transit doppler positioning NSWC 9Z-2 reference
     * frame transformed to be aligned to the BIH Conventional Terrestrial Reference Frame (BTS) at epoch 1984.0.
     * The NSWC 9Z-2 origin shifted by -4.5 m along the Z-axis, scale changed by -0.6 x 10E-6 and the reference
     * meridian rotated westward by 0.814" to be aligned to the BTS at epoch 1984.0. Replaced by World Geodetic System
     * 1984 (G730) from 1994-06-29.
     */
    public const EPSG_WORLD_GEODETIC_SYSTEM_1984_TRANSIT = 1166;

    /**
     * World Geodetic System 1984 ensemble
     * Type: ensemble
     * Extent: World.
     * Scope: Satellite navigation.
     *
     * EPSG::6326 has been the then current realization. No distinction is made between the original and subsequent
     * (G730, G873, G1150, G1674 and G1762) WGS 84 frames. Since 1997, WGS 84 has been maintained within 10cm of the
     * then current ITRF.
     */
    public const EPSG_WORLD_GEODETIC_SYSTEM_1984_ENSEMBLE = 6326;

    /**
     * Xian 1980
     * Type: geodetic
     * Extent: China - onshore.
     * Scope: Geodesy, engineering survey, topographic mapping.
     * Xian observatory.
     */
    public const EPSG_XIAN_1980 = 6610;

    /**
     * Yacare
     * Type: geodetic
     * Extent: Uruguay - onshore.
     * Scope: Topographic mapping.
     * Fundamental point: Yacare. Latitude: 30°35'53.68"S, longitude: 57°25'01.30"W (of Greenwich).
     */
    public const EPSG_YACARE = 6309;

    /**
     * Yellow Sea 1956
     * Type: vertical
     * Extent: China - onshore.
     * Scope: Geodesy, topographic mapping.
     * 2 years tide readings at Qingdao.
     * Replaced by Yellow Sea 1985 datum.
     */
    public const EPSG_YELLOW_SEA_1956 = 5104;

    /**
     * Yellow Sea 1985
     * Type: vertical
     * Extent: China - onshore.
     * Scope: Geodesy, topographic mapping.
     * 20 years tide readings at Qingdao.
     * Replaces Yellow Sea 1956 datum.
     */
    public const EPSG_YELLOW_SEA_1985 = 5137;

    /**
     * Yemen National Geodetic Network 1996
     * Type: geodetic
     * Extent: Yemen - onshore and offshore.
     * Scope: Topographic mapping.
     * Sana'a IGN reference marker.
     */
    public const EPSG_YEMEN_NATIONAL_GEODETIC_NETWORK_1996 = 6163;

    /**
     * Yoff
     * Type: geodetic
     * Extent: Senegal - onshore and offshore.
     * Scope: Topographic mapping.
     * Fundamental point: Yoff. Latitude: 14°44'41.62"N, longitude: 17°29'07.02"W (of Greenwich).
     */
    public const EPSG_YOFF = 6310;

    /**
     * Zanderij
     * Type: geodetic
     * Extent: Suriname - onshore and offshore.
     * Scope: Topographic mapping.
     */
    public const EPSG_ZANDERIJ = 6311;

    /**
     * fk89
     * Type: geodetic
     * Extent: Faroe Islands - onshore.
     * Scope: Cadastre.
     *
     * Replaces FD54 for cadastre.
     */
    public const EPSG_FK89 = 6753;

    public const DATUM_TYPE_GEODETIC = 'geodetic';

    public const DATUM_TYPE_VERTICAL = 'vertical';

    public const DATUM_TYPE_DYNAMIC_GEODETIC = 'dynamic_geodetic';

    public const DATUM_TYPE_DYNAMIC_VERTICAL = 'dynamic_vertical';

    public const DATUM_TYPE_ENGINEERING = 'engineering';

    public const DATUM_TYPE_ENSEMBLE = 'ensemble';

    /**
     * @var Repository
     */
    private static $repository;

    /**
     * @var string
     */
    protected $datumType;

    /**
     * @var Ellipsoid
     */
    protected $ellipsoid;

    /**
     * @var PrimeMeridian
     */
    protected $primeMeridian;

    /**
     * @var ?float
     */
    protected $frameReferenceEpoch;

    public function __construct(
        string $datumType,
        ?Ellipsoid $ellipsoid,
        ?PrimeMeridian $primeMeridian,
        ?float $frameReferenceEpoch
    ) {
        $this->datumType = $datumType;
        $this->ellipsoid = $ellipsoid;
        $this->primeMeridian = $primeMeridian;
        $this->frameReferenceEpoch = $frameReferenceEpoch;
    }

    public function getDatumType(): string
    {
        return $this->datumType;
    }

    public function getEllipsoid(): ?Ellipsoid
    {
        return $this->ellipsoid;
    }

    public function getPrimeMeridian(): ?PrimeMeridian
    {
        return $this->primeMeridian;
    }

    public function getFrameReferenceEpoch(): ?float
    {
        return $this->frameReferenceEpoch;
    }

    public static function fromEPSGCode(int $epsgCode): self
    {
        $repository = static::$repository ?? new Repository();
        $allData = $repository->getDatums();

        if (!isset($allData[$epsgCode])) {
            throw new UnknownDatumException($epsgCode);
        }

        $data = $allData[$epsgCode];

        if ($data['datum_type'] === self::DATUM_TYPE_ENSEMBLE) { // if ensemble, use latest realisation
            $ensemble = $repository->getDatumEnsembles()[$epsgCode];
            $data = $allData[end($ensemble)];
        }

        return new static(
            $data['datum_type'],
            $data['ellipsoid_code'] ? Ellipsoid::fromEPSGCode($data['ellipsoid_code']) : null,
            $data['prime_meridian_code'] ? PrimeMeridian::fromEPSGCode($data['prime_meridian_code']) : null,
            $data['frame_reference_epoch'],
        );
    }
}