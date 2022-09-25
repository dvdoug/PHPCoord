<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Datum;

use DateTimeInterface;
use PHPCoord\Exception\UnknownDatumException;
use PHPCoord\UnitOfMeasure\Time\Year;

use function end;

class Datum
{
    /**
     * AIOC 1995
     * Type: Vertical
     * Extent: Azerbaijan - Caspian offshore and onshore Sangachal terminal.
     * Average level of Caspian Sea at the Oil Rocks tide gauge June-September 1995.
     * AIOC 1995 datum is 1.7m above Caspian datum and 26.3m below Baltic datum.
     */
    public const EPSG_AIOC_1995 = 'urn:ogc:def:datum:EPSG::5133';

    /**
     * AbInvA96_2020 Intermediate Reference Frame
     * Type: Geodetic
     * Extent: United Kingdom (UK) - on or related to the A96 highway from Aberdeen to Inverness.
     * Defined through the application of the AbInvA96_2000 NTv2 transformation (code 9386) to ETRS89 as realized
     * through OSNet v2009 CORS.
     * Created in 2020 to support intermediate CRS "AbInvA96_2020-IRF" in the emulation of the AbInvA96_2020 Snake map
     * projection.
     */
    public const EPSG_ABINVA96_2020_INTERMEDIATE_REFERENCE_FRAME = 'urn:ogc:def:datum:EPSG::1273';

    /**
     * Abidjan 1987
     * Type: Geodetic
     * Extent: Côte d'Ivoire (Ivory Coast) - onshore and offshore.
     * Fundamental point: Abidjan I. Latitude: 5°18'51.01"N, longitude: 4°02'06.04"W (of Greenwich).
     */
    public const EPSG_ABIDJAN_1987 = 'urn:ogc:def:datum:EPSG::6143';

    /**
     * Accra
     * Type: Geodetic
     * Extent: Ghana - onshore and offshore.
     * Fundamental point: GCS Station 547. Latitude: 5°23'43.3"N, longitude: 0°11'52.3"W (of Greenwich).
     * Replaced in 1978 by Leigon datum (code 6250).
     */
    public const EPSG_ACCRA = 'urn:ogc:def:datum:EPSG::6168';

    /**
     * Aden 1925
     * Type: Geodetic
     * Extent: Yemen - South Yemen onshore mainland.
     */
    public const EPSG_ADEN_1925 = 'urn:ogc:def:datum:EPSG::1135';

    /**
     * Adindan
     * Type: Geodetic
     * Extent: Eritrea; Ethiopia; South Sudan; Sudan.
     * Fundamental point: Station 15; Adindan. Latitude: 22°10'07.110"N, longitude: 31°29'21.608"E (of Greenwich).
     * The 12th parallel traverse of 1966-70 (Point 58 datum, code 6620) is connected to the Blue Nile 1958 network in
     * western Sudan. This has given rise to misconceptions that the Blue Nile network is used in west Africa.
     */
    public const EPSG_ADINDAN = 'urn:ogc:def:datum:EPSG::6201';

    /**
     * Afgooye
     * Type: Geodetic
     * Extent: Somalia - onshore.
     */
    public const EPSG_AFGOOYE = 'urn:ogc:def:datum:EPSG::6205';

    /**
     * Agadez
     * Type: Geodetic
     * Extent: Niger.
     */
    public const EPSG_AGADEZ = 'urn:ogc:def:datum:EPSG::6206';

    /**
     * Ain el Abd 1970
     * Type: Geodetic
     * Extent: Bahrain, Kuwait and Saudi Arabia - onshore.
     * Fundamental point: Ain El Abd.  Latitude: 28°14'06.171"N, longitude: 48°16'20.906"E (of Greenwich).
     */
    public const EPSG_AIN_EL_ABD_1970 = 'urn:ogc:def:datum:EPSG::6204';

    /**
     * Albanian 1987
     * Type: Geodetic
     * Extent: Albania - onshore.
     */
    public const EPSG_ALBANIAN_1987 = 'urn:ogc:def:datum:EPSG::6191';

    /**
     * Alicante
     * Type: Vertical
     * Extent: Gibraltar - onshore; Spain - mainland onshore.
     * Mean Sea Level at Alicante between 1870 and 1872.
     * Orthometric heights.
     */
    public const EPSG_ALICANTE = 'urn:ogc:def:datum:EPSG::5180';

    /**
     * American Samoa 1962
     * Type: Geodetic
     * Extent: American Samoa - Tutuila, Aunu'u, Ofu, Olesega and Ta'u islands.
     * Fundamental point: Betty 13 eccentric. Latitude: 14°20'08.34"S, longitude: 170°42'52.25"W (of Greenwich).
     */
    public const EPSG_AMERICAN_SAMOA_1962 = 'urn:ogc:def:datum:EPSG::6169';

    /**
     * American Samoa Vertical Datum of 2002
     * Type: Vertical
     * Extent: American Samoa - Tutuila island.
     * Mean sea level at Pago Pago harbor, Tutuila. Benchmark 1770000 S TIDAL = 1.364m relative to National Tidal Datum
     * Epoch 1983-2001.
     * Replaces Tutuila vertical datum of 1962 (datum code 1121). Replaced by Pago Pago local tidal datum (datum code
     * 1302) in March 2020 after ASVD02 benchmarks destroyed by earthquake activity.
     */
    public const EPSG_AMERICAN_SAMOA_VERTICAL_DATUM_OF_2002 = 'urn:ogc:def:datum:EPSG::1125';

    /**
     * Amersfoort
     * Type: Geodetic
     * Extent: Netherlands - onshore, including Waddenzee, Dutch Wadden Islands and 12-mile offshore coastal zone.
     * Originally defined through fundamental point Amersfoort, latitude 52°09'22.178"N, longitude 5°23'15.478"E (of
     * Greenwich). Since 2000-10-01 has been redefined as derived from ETRS89 by application of the official
     * transformation RDNAPTRANS(TM).
     */
    public const EPSG_AMERSFOORT = 'urn:ogc:def:datum:EPSG::6289';

    /**
     * Ammassalik 1958
     * Type: Geodetic
     * Extent: Greenland - Ammassalik area onshore.
     */
    public const EPSG_AMMASSALIK_1958 = 'urn:ogc:def:datum:EPSG::6196';

    /**
     * Ancienne Triangulation Francaise (Paris)
     * Type: Geodetic
     * Extent: France - mainland onshore.
     * Uses the RGS value for the Paris meridian.  In Alsace, data suspected to be transformation of German network
     * into ATF. Replaced by Nouvelle Triangulation Francaise (Paris) (code 6807) which uses the 1936 IGN value for the
     * Paris meridian.
     */
    public const EPSG_ANCIENNE_TRIANGULATION_FRANCAISE_PARIS = 'urn:ogc:def:datum:EPSG::6901';

    /**
     * Anguilla 1957
     * Type: Geodetic
     * Extent: Anguilla - onshore.
     * Fundamental point: station A4, Police.
     */
    public const EPSG_ANGUILLA_1957 = 'urn:ogc:def:datum:EPSG::6600';

    /**
     * Antalya
     * Type: Vertical
     * Extent: Türkiye (Turkey) - onshore.
     * Mean sea Level at Antalya 1936-71.
     * Orthometric heights.
     */
    public const EPSG_ANTALYA = 'urn:ogc:def:datum:EPSG::5173';

    /**
     * Antigua 1943
     * Type: Geodetic
     * Extent: Antigua island - onshore.
     * Fundamental point: station A14.
     */
    public const EPSG_ANTIGUA_1943 = 'urn:ogc:def:datum:EPSG::6601';

    /**
     * Aratu
     * Type: Geodetic
     * Extent: Brazil - offshore south and east of a line intersecting the coast at 2°55'S; onshore Tucano basin.
     */
    public const EPSG_ARATU = 'urn:ogc:def:datum:EPSG::6208';

    /**
     * Arc 1950
     * Type: Geodetic
     * Extent: Botswana; Malawi; Zambia; Zimbabwe.
     * Fundamental point: Buffelsfontein. Latitude: 33°59'32.000"S, longitude: 25°30'44.622"E (of Greenwich).
     */
    public const EPSG_ARC_1950 = 'urn:ogc:def:datum:EPSG::6209';

    /**
     * Arc 1960
     * Type: Geodetic
     * Extent: Burundi, Kenya, Rwanda, Tanzania and Uganda.
     * Fundamental point: Buffelsfontein. Latitude: 33°59'32.000"S, longitude: 25°30'44.622"E (of Greenwich).
     */
    public const EPSG_ARC_1960 = 'urn:ogc:def:datum:EPSG::6210';

    /**
     * Ascension Island 1958
     * Type: Geodetic
     * Extent: St Helena, Ascension and Tristan da Cunha - Ascension Island - onshore.
     */
    public const EPSG_ASCENSION_ISLAND_1958 = 'urn:ogc:def:datum:EPSG::6712';

    /**
     * Astro DOS 71
     * Type: Geodetic
     * Extent: St Helena, Ascension and Tristan da Cunha - St Helena Island - onshore.
     * Fundamental point: DOS 71/4, Ladder Hill Fort, latitude: 15°55'30"S, longitude: 5°43'25"W (of Greenwich).
     */
    public const EPSG_ASTRO_DOS_71 = 'urn:ogc:def:datum:EPSG::6710';

    /**
     * Auckland 1946
     * Type: Vertical
     * Extent: New Zealand - North Island - Auckland vertical CRS area.
     * MSL at Auckland harbour 1909-1923.
     */
    public const EPSG_AUCKLAND_1946 = 'urn:ogc:def:datum:EPSG::5157';

    /**
     * Australian Antarctic Datum 1998
     * Type: Geodetic
     * Extent: Antarctica between 45°E and 136°E and between 142°E and 160°E - Australian sector.
     */
    public const EPSG_AUSTRALIAN_ANTARCTIC_DATUM_1998 = 'urn:ogc:def:datum:EPSG::6176';

    /**
     * Australian Geodetic Datum 1966
     * Type: Geodetic
     * Extent: Australia - onshore and offshore. Papua New Guinea - onshore.
     * Fundamental point: Johnson Memorial Cairn. Latitude: 25°56'54.5515"S, longitude: 133°12'30.0771"E (of
     * Greenwich).
     */
    public const EPSG_AUSTRALIAN_GEODETIC_DATUM_1966 = 'urn:ogc:def:datum:EPSG::6202';

    /**
     * Australian Geodetic Datum 1984
     * Type: Geodetic
     * Extent: Australia - Queensland, South Australia, Western Australia, federal areas offshore west of 129°E.
     * Fundamental point: Johnson Memorial Cairn. Latitude: 25°56'54.5515"S, longitude: 133°12'30.0771"E (of
     * Greenwich).
     * Uses all data from 1966 adjustment with additional observations, improved software and a geoid model.
     */
    public const EPSG_AUSTRALIAN_GEODETIC_DATUM_1984 = 'urn:ogc:def:datum:EPSG::6203';

    /**
     * Australian Height Datum
     * Type: Vertical
     * Extent: Australia - Australian Capital Territory, New South Wales, Northern Territory, Queensland, South
     * Australia, Tasmania, Western Australia and Victoria - onshore. Christmas Island - onshore. Cocos and Keeling
     * Islands - onshore.
     * Mainland: MSL 1966-68 at 30 gauges around coast. Tasmania: MSL 1972 at Hobart and Burnie. Christmas Island: MSL
     * (details unspecified). Cocos and Keeling Islands: MSL (details unspecified).
     * Normal-orthometric heights. Initially defined for mainland only, with independent height datums for Australian
     * mainland, Tasmania, Christmas Island and Cocos and Keeling Islands. With introduction of AUSGeoid2020 in 2017,
     * all considered to be AHD.
     */
    public const EPSG_AUSTRALIAN_HEIGHT_DATUM = 'urn:ogc:def:datum:EPSG::5111';

    /**
     * Australian Height Datum (Tasmania)
     * Type: Vertical
     * Extent: Australia - Tasmania mainland - onshore.
     * MSL 1972 at Hobart and Burnie.
     */
    public const EPSG_AUSTRALIAN_HEIGHT_DATUM_TASMANIA = 'urn:ogc:def:datum:EPSG::5112';

    /**
     * Australian Terrestrial Reference Frame 2014
     * Type: Dynamic geodetic
     * Extent: Australia including Lord Howe Island, Macquarie Island, Ashmore and Cartier Islands, Christmas Island,
     * Cocos (Keeling) Islands, Norfolk Island. All onshore and offshore.
     * ITRF2014 at epoch 2020.0.
     * Densification of ITRF2014 in the Australian region.
     */
    public const EPSG_AUSTRALIAN_TERRESTRIAL_REFERENCE_FRAME_2014 = 'urn:ogc:def:datum:EPSG::1291';

    /**
     * Australian Vertical Working Surface
     * Type: Vertical
     * Extent: Australia including Lord Howe Island, Macquarie Island, Ashmore and Cartier Islands, Christmas Island,
     * Cocos (Keeling) Islands, Norfolk Island. All onshore and offshore.
     * Realized by the Australian gravimetric quasi-geoid (AGQG).
     * Normal heights. Extends gravity-related heights to offshore. See AHD (datum code 5111) for cadastral survey or
     * local engineering survey including construction or mining.
     */
    public const EPSG_AUSTRALIAN_VERTICAL_WORKING_SURFACE = 'urn:ogc:def:datum:EPSG::1292';

    /**
     * Autonomous Regions of Portugal 2008
     * Type: Geodetic
     * Extent: Portugal - Azores and Madeira island groups and surrounding EEZ - Flores, Corvo; Graciosa, Terceira, Sao
     * Jorge, Pico, Faial; Sao Miguel, Santa Maria; Madeira, Porto Santo, Desertas; Selvagens.
     * ITRF93 as derived from the 1994 TransAtlantic Network for Geodynamics and Oceanography (TANGO) project.
     * Replaces older classical datums for Azores and Madeira archipelagos.
     */
    public const EPSG_AUTONOMOUS_REGIONS_OF_PORTUGAL_2008 = 'urn:ogc:def:datum:EPSG::1041';

    /**
     * Average Terrestrial System 1977
     * Type: Geodetic
     * Extent: Canada - New Brunswick; Nova Scotia; Prince Edward Island.
     * In use from 1979.  To be phased out in late 1990's.
     */
    public const EPSG_AVERAGE_TERRESTRIAL_SYSTEM_1977 = 'urn:ogc:def:datum:EPSG::6122';

    /**
     * Ayabelle Lighthouse
     * Type: Geodetic
     * Extent: Djibouti - onshore and offshore.
     * Fundamental point: Ayabelle Lighthouse.
     */
    public const EPSG_AYABELLE_LIGHTHOUSE = 'urn:ogc:def:datum:EPSG::6713';

    /**
     * Azores Central Islands 1948
     * Type: Geodetic
     * Extent: Portugal - central Azores onshore - Faial, Graciosa, Pico, Sao Jorge, Terceira.
     * Fundamental point: Graciosa south west base. Latitude: 39°03'54.934"N, longitude: 28°02'23.882"W (of
     * Greenwich).
     * Replaced by 1995 adjustment (datum code 6665).
     */
    public const EPSG_AZORES_CENTRAL_ISLANDS_1948 = 'urn:ogc:def:datum:EPSG::6183';

    /**
     * Azores Central Islands 1995
     * Type: Geodetic
     * Extent: Portugal - central Azores onshore - Faial, Graciosa, Pico, Sao Jorge, Terceira.
     * Fundamental point: Graciosa south west base. Origin and orientation constrained to those of the 1948 adjustment.
     * Classical and GPS observations. Replaces 1948 adjustment (datum code 6183).
     */
    public const EPSG_AZORES_CENTRAL_ISLANDS_1995 = 'urn:ogc:def:datum:EPSG::6665';

    /**
     * Azores Occidental Islands 1939
     * Type: Geodetic
     * Extent: Portugal - western Azores onshore - Flores, Corvo.
     * Fundamental point: Observatario Meteorologico Flores.
     */
    public const EPSG_AZORES_OCCIDENTAL_ISLANDS_1939 = 'urn:ogc:def:datum:EPSG::6182';

    /**
     * Azores Oriental Islands 1940
     * Type: Geodetic
     * Extent: Portugal - eastern Azores onshore - Sao Miguel, Santa Maria, Formigas.
     * Fundamental point: Forte de São Bras.
     * Replaced by 1995 adjustment (datum code 6664).
     */
    public const EPSG_AZORES_ORIENTAL_ISLANDS_1940 = 'urn:ogc:def:datum:EPSG::6184';

    /**
     * Azores Oriental Islands 1995
     * Type: Geodetic
     * Extent: Portugal - eastern Azores onshore - Sao Miguel, Santa Maria, Formigas.
     * Fundamental point: Forte de São Bras. Origin and orientation constrained to those of the 1940 adjustment.
     * Classical and GPS observations. Replaces 1940 adjustment (datum code 6184).
     */
    public const EPSG_AZORES_ORIENTAL_ISLANDS_1995 = 'urn:ogc:def:datum:EPSG::6664';

    /**
     * Baltic 1957
     * Type: Vertical
     * Extent: Czechia; Slovakia.
     * Datum: average water level at Kronstadt 1833. Network adjusted in 1957 as Uniform Precise Leveling Network of
     * Eastern Europe (EPNN).
     * Uses Normal heights.
     */
    public const EPSG_BALTIC_1957 = 'urn:ogc:def:datum:EPSG::1202';

    /**
     * Baltic 1977
     * Type: Vertical
     * Extent: Armenia; Azerbaijan; Belarus; Estonia - onshore; Georgia - onshore; Kazakhstan; Kyrgyzstan; Latvia -
     * onshore; Lithuania - onshore; Moldova; Russian Federation - onshore; Tajikistan; Turkmenistan; Ukraine -
     * onshore; Uzbekistan.
     * Datum: average water level at Kronstadt 1833. Network adjusted in 1974-78 as Uniform Precise Leveling Network of
     * Eastern Europe (EPNN).
     * Uses Normal heights. Adjustment also included former Czechoslovakia but was not adopted there, the 1957
     * adjustment being retained instead.
     */
    public const EPSG_BALTIC_1977 = 'urn:ogc:def:datum:EPSG::5105';

    /**
     * Baltic 1980
     * Type: Vertical
     * Extent: Hungary.
     * Uses Normal heights.
     */
    public const EPSG_BALTIC_1980 = 'urn:ogc:def:datum:EPSG::5185';

    /**
     * Baltic 1982
     * Type: Vertical
     * Extent: Bulgaria - onshore.
     * Network adjusted in 1982. Height at reference point Varna defined as 1958 value from the UPLN adjustment. Datum
     * at Kronstadt is mean sea level of Baltic in 1833.
     * Uses Normal heights.
     */
    public const EPSG_BALTIC_1982 = 'urn:ogc:def:datum:EPSG::5184';

    /**
     * Baltic 1986
     * Type: Vertical
     * Extent: Poland - onshore.
     * Mean sea level of Baltic at Kronstadt in 1833. Network adjusted in 1982.
     *
     * Uses Normal heights. Adopted in 1986.
     */
    public const EPSG_BALTIC_1986 = 'urn:ogc:def:datum:EPSG::1296';

    /**
     * Bandar Abbas
     * Type: Vertical
     * Extent: Iran - onshore.
     * Average sea level at Bandar Abbas 1995-2001.
     * Replaces Fao (datum code 5149) in Iran.
     */
    public const EPSG_BANDAR_ABBAS = 'urn:ogc:def:datum:EPSG::5150';

    /**
     * Barbados 1938
     * Type: Geodetic
     * Extent: Barbados - onshore.
     * Fundamental point: HMS Challenger astro station M1, St. Anne's Tower. Latitude 13°04'32.53"N, longitude
     * 59°36'29.34"W (of Greenwich).
     */
    public const EPSG_BARBADOS_1938 = 'urn:ogc:def:datum:EPSG::6212';

    /**
     * Batavia
     * Type: Geodetic
     * Extent: Indonesia - Bali, Java and western Sumatra onshore, offshore southern Java Sea, Madura Strait and
     * western Bali Sea.
     * Fundamental point: Longitude at Batavia Astro. Station. Latitude: 6°07'39.522"S, longitude: 106°48'27.790"E
     * (of Greenwich). Latitude and azimuth at Genuk.
     */
    public const EPSG_BATAVIA = 'urn:ogc:def:datum:EPSG::6211';

    /**
     * Batavia (Jakarta)
     * Type: Geodetic
     * Extent: Indonesia - onshore - Bali, Java and western Sumatra.
     * Fundamental point: Longitude at Batavia astronomical station. Latitude: 6°07'39.522"S, longitude: 0°00'00.0"E
     * (of Jakarta). Latitude and azimuth at Genuk.
     */
    public const EPSG_BATAVIA_JAKARTA = 'urn:ogc:def:datum:EPSG::6813';

    /**
     * Beduaram
     * Type: Geodetic
     * Extent: Niger - southeast.
     */
    public const EPSG_BEDUARAM = 'urn:ogc:def:datum:EPSG::6213';

    /**
     * Beijing 1954
     * Type: Geodetic
     * Extent: China - onshore and offshore.
     * Pulkovo, transferred through Russian triangulation.
     * Scale determined through three baselines in northeast China. Discontinuities at boundaries of adjustment blocks.
     * From 1982 replaced by Xian 1980 and New Beijing.
     */
    public const EPSG_BEIJING_1954 = 'urn:ogc:def:datum:EPSG::6214';

    /**
     * Bekaa Valley 1920
     * Type: Geodetic
     * Extent: Lebanon - onshore.
     */
    public const EPSG_BEKAA_VALLEY_1920 = 'urn:ogc:def:datum:EPSG::1137';

    /**
     * Belfast Lough
     * Type: Vertical
     * Extent: United Kingdom (UK) - Northern Ireland (Ulster) - onshore.
     * Mean sea level between 1951 and 1956 at Clarendon Dock, Belfast. Initially realised through levelling network
     * adjustment, from 2002 redefined to be realised through OSGM geoid model.
     * Orthometric heights. Malin Head (datum code 5130) used for 1:50,000 and smaller mapping.
     */
    public const EPSG_BELFAST_LOUGH = 'urn:ogc:def:datum:EPSG::5131';

    /**
     * Bellevue
     * Type: Geodetic
     * Extent: Vanuatu - southern islands - Aneityum, Efate, Erromango and Tanna.
     * Datum covers all the major islands of Vanuatu in two different adjustment blocks, but practical usage is as
     * given in the area of use.
     */
    public const EPSG_BELLEVUE = 'urn:ogc:def:datum:EPSG::6714';

    /**
     * Bermuda 1957
     * Type: Geodetic
     * Extent: Bermuda - onshore.
     * Fundamental point: Fort George base. Latitude 32°22'44.36"N, longitude 64°40'58.11"W (of Greenwich).
     */
    public const EPSG_BERMUDA_1957 = 'urn:ogc:def:datum:EPSG::6216';

    /**
     * Bermuda 2000
     * Type: Geodetic
     * Extent: Bermuda - onshore and offshore.
     * ITRF96 at epoch 2000.0.
     */
    public const EPSG_BERMUDA_2000 = 'urn:ogc:def:datum:EPSG::6762';

    /**
     * Bern 1938
     * Type: Geodetic
     * Extent: Liechtenstein; Switzerland.
     * Fundamental point: Old Bern observatory. Latitude: 46°57'07.890"N, longitude: 7°26'22.335"E (of Greenwich).
     * This redetermination of the coordinates of fundamental point is used for scientific purposes and as the
     * graticule overprinted on topographic maps constructed on the CH1903 / LV03 projected CS (code 21781).
     */
    public const EPSG_BERN_1938 = 'urn:ogc:def:datum:EPSG::6306';

    /**
     * Bhutan National Geodetic Datum
     * Type: Geodetic
     * Extent: Bhutan.
     * ITRF2000 at epoch 2003.87.
     */
    public const EPSG_BHUTAN_NATIONAL_GEODETIC_DATUM = 'urn:ogc:def:datum:EPSG::1058';

    /**
     * Bioko
     * Type: Geodetic
     * Extent: Equatorial Guinea - Bioko onshore.
     */
    public const EPSG_BIOKO = 'urn:ogc:def:datum:EPSG::1136';

    /**
     * Bissau
     * Type: Geodetic
     * Extent: Guinea-Bissau - onshore.
     */
    public const EPSG_BISSAU = 'urn:ogc:def:datum:EPSG::6165';

    /**
     * Black Sea
     * Type: Vertical
     * Extent: Georgia - onshore and offshore.
     * Black Sea datum is 0.4m below Baltic datum.
     */
    public const EPSG_BLACK_SEA = 'urn:ogc:def:datum:EPSG::5134';

    /**
     * Bluff 1955
     * Type: Vertical
     * Extent: New Zealand - South Island - Bluff vertical CRS area.
     * MSL at Invercargill harbour over 8 years between 1918 and 1934.
     */
    public const EPSG_BLUFF_1955 = 'urn:ogc:def:datum:EPSG::5158';

    /**
     * Bogota 1975
     * Type: Geodetic
     * Extent: Colombia - mainland and offshore Caribbean.
     * Fundamental point: Bogota observatory. Latitude: 4°35'56.570"N, longitude: 74°04'51.300"W (of Greenwich).
     * Replaces 1951 adjustment. Replaced by MAGNA-SIRGAS (datum code 6685).
     */
    public const EPSG_BOGOTA_1975 = 'urn:ogc:def:datum:EPSG::6218';

    /**
     * Bogota 1975 (Bogota)
     * Type: Geodetic
     * Extent: Colombia - mainland onshore.
     * Fundamental point: Bogota observatory. Latitude: 4°35'56.570"N, longitude: 0°E (of Bogota).
     */
    public const EPSG_BOGOTA_1975_BOGOTA = 'urn:ogc:def:datum:EPSG::6802';

    /**
     * Bora Bora SAU 2001
     * Type: Vertical
     * Extent: French Polynesia - Society Islands - Bora Bora.
     * Fundamental benchmark: Vaitape quay SHOM benchmark B.
     * Included as part of NGPF - see datum code 5195.
     */
    public const EPSG_BORA_BORA_SAU_2001 = 'urn:ogc:def:datum:EPSG::5202';

    /**
     * British Isles height ensemble
     * Type: Ensemble
     * Extent: United Kingdom (UK) - offshore to boundary of UKCS within 49°45'N to 61°N and 9°W to 2°E; onshore
     * Great Britain (England, Wales and Scotland) and Northern Ireland. Ireland onshore. Isle of Man onshore.
     * Ensemble of 9 independent vertical datums now all defined through OS geoid model OSGM15.
     * Orthometric heights.
     */
    public const EPSG_BRITISH_ISLES_HEIGHT_ENSEMBLE = 'urn:ogc:def:datum:EPSG::1288';

    /**
     * Bukit Rimpah
     * Type: Geodetic
     * Extent: Indonesia - Banga and Belitung Islands.
     * 2°00'40.16"S, 105°51'39.76"E (of Greenwich).
     */
    public const EPSG_BUKIT_RIMPAH = 'urn:ogc:def:datum:EPSG::6219';

    /**
     * Bulgaria Geodetic System 2005
     * Type: Geodetic
     * Extent: Bulgaria - onshore and offshore.
     * Densification of ETRS89 realised through network of 112 permanent GNSS reference stations in ETRF2000@2005.0.
     * Adopted as official Bulgarian reference datum through decree 153 of 2010-07-29.
     */
    public const EPSG_BULGARIA_GEODETIC_SYSTEM_2005 = 'urn:ogc:def:datum:EPSG::1167';

    /**
     * Bulgarian Height System 2005
     * Type: Vertical
     * Extent: Bulgaria - onshore.
     * Bulgarian realisation of EVRF2007. EVRF2007 heights of 58 points in Bulgaria held fixed.
     * Uses Normal heights. Adopted as official Bulgarian height reference datum through decree 153 of 2010-07-29.
     */
    public const EPSG_BULGARIAN_HEIGHT_SYSTEM_2005 = 'urn:ogc:def:datum:EPSG::1300';

    /**
     * CH1903
     * Type: Geodetic
     * Extent: Liechtenstein; Switzerland.
     * Fundamental point: Old Bern observatory. Latitude: 46°57'08.660"N, longitude: 7°26'22.500"E (of Greenwich).
     */
    public const EPSG_CH1903 = 'urn:ogc:def:datum:EPSG::6149';

    /**
     * CH1903 (Bern)
     * Type: Geodetic
     * Extent: Liechtenstein; Switzerland.
     * Fundamental point: Old Bern observatory. Latitude: 46°57'08.660"N, longitude: 0°E (of Bern).
     */
    public const EPSG_CH1903_BERN = 'urn:ogc:def:datum:EPSG::6801';

    /**
     * CH1903+
     * Type: Geodetic
     * Extent: Liechtenstein; Switzerland.
     * Fundamental point: Zimmerwald observatory.
     */
    public const EPSG_CH1903_PLUS = 'urn:ogc:def:datum:EPSG::6150';

    /**
     * CR-SIRGAS
     * Type: Geodetic
     * Extent: Costa Rica - onshore and offshore.
     * ITRF2008 (IGb08) at epoch 2014.59. Network of 42 GNSS stations of the passive and active reference system.
     * Replaces CR05 from April 2018.
     */
    public const EPSG_CR_SIRGAS = 'urn:ogc:def:datum:EPSG::1225';

    /**
     * Cadastre 1997
     * Type: Geodetic
     * Extent: Mayotte - onshore.
     * Coordinates of 1 station of Combani 1950 adjustment held fixed.
     * Derived by adjustment of GPS-observed network which was constrained to Combani 1950 coordinates of one station.
     */
    public const EPSG_CADASTRE_1997 = 'urn:ogc:def:datum:EPSG::1037';

    /**
     * Cagliari 1956
     * Type: Vertical
     * Extent: Italy - Sardinia onshore.
     * Mean Sea Level at Cagliari 1955-1957.
     * Orthometric heights.
     */
    public const EPSG_CAGLIARI_1956 = 'urn:ogc:def:datum:EPSG::1307';

    /**
     * Cais da Figueirinha - Angra do Heroismo
     * Type: Vertical
     * Extent: Portugal - central Azores - Terceira island onshore.
     * Mean Sea Level during 1951 at Cais da Figueirinha - Angra do Heroísmo.
     * Orthometric heights.
     */
    public const EPSG_CAIS_DA_FIGUEIRINHA_ANGRA_DO_HEROISMO = 'urn:ogc:def:datum:EPSG::1107';

    /**
     * Cais da Madalena
     * Type: Vertical
     * Extent: Portugal - central Azores - Pico island onshore.
     * Mean Sea Level during 1937 at Cais da Madalena.
     * Orthometric heights.
     */
    public const EPSG_CAIS_DA_MADALENA = 'urn:ogc:def:datum:EPSG::1105';

    /**
     * Cais da Pontinha - Funchal
     * Type: Vertical
     * Extent: Portugal - Madeira and Desertas islands - onshore.
     * Mean Sea Level during 1913 at Cais da Pontinha, Funchal.
     * Orthometric heights.
     */
    public const EPSG_CAIS_DA_PONTINHA_FUNCHAL = 'urn:ogc:def:datum:EPSG::1101';

    /**
     * Cais da Vila - Porto Santo
     * Type: Vertical
     * Extent: Portugal - Porto Santo island (Madeira archipelago) onshore.
     * Mean Sea Level during 1936 at Cais da Vila, Porto Santo.
     * Orthometric heights.
     */
    public const EPSG_CAIS_DA_VILA_PORTO_SANTO = 'urn:ogc:def:datum:EPSG::1102';

    /**
     * Cais da Vila do Porto
     * Type: Vertical
     * Extent: Portugal - eastern Azores onshore - Santa Maria, Formigas.
     * Mean Sea Level during 1965 at Cais da Vila, Porto.
     * Orthometric heights.
     */
    public const EPSG_CAIS_DA_VILA_DO_PORTO = 'urn:ogc:def:datum:EPSG::1109';

    /**
     * Cais das Velas
     * Type: Vertical
     * Extent: Portugal - central Azores - Sao Jorge island onshore.
     * Mean Sea Level during 1937 at Cais das Velas.
     * Orthometric heights.
     */
    public const EPSG_CAIS_DAS_VELAS = 'urn:ogc:def:datum:EPSG::1103';

    /**
     * Camacupa 1948
     * Type: Geodetic
     * Extent: Angola - Angola proper - onshore and offshore.
     * Fundamental point: Campo de Aviaçao. Latitude: 12°01'09.070"S, Longitude = 17°27'19.800"E (of Greenwich).
     * Provisional adjustment, replaced in 2015 for onshore use by Camacupa 2015.
     */
    public const EPSG_CAMACUPA_1948 = 'urn:ogc:def:datum:EPSG::6220';

    /**
     * Camacupa 2015
     * Type: Geodetic
     * Extent: Angola - onshore and offshore.
     * Fundamental point: Campo de Aviaçao. Latitude: 12°01'08.702"S, Longitude = 17°27'19.515"E (of Greenwich).
     * Second adjustment. Not used for offshore oil and gas exploration and production.
     */
    public const EPSG_CAMACUPA_2015 = 'urn:ogc:def:datum:EPSG::1217';

    /**
     * Camp Area Astro
     * Type: Geodetic
     * Extent: Antarctica - McMurdo Sound, Camp McMurdo area.
     */
    public const EPSG_CAMP_AREA_ASTRO = 'urn:ogc:def:datum:EPSG::6715';

    /**
     * Campo Inchauspe
     * Type: Geodetic
     * Extent: Argentina - mainland onshore and Atlantic offshore Tierra del Fuego.
     * Fundamental point: Campo Inchauspe. Latitude: 35°58'16.56"S, longitude: 62°10'12.03"W (of Greenwich).
     */
    public const EPSG_CAMPO_INCHAUSPE = 'urn:ogc:def:datum:EPSG::6221';

    /**
     * Canadian Geodetic Vertical Datum of 1928
     * Type: Vertical
     * Extent: Canada - onshore - Alberta; British Columbia; Manitoba south of 57°N; New Brunswick; Northwest
     * Territories south west of a line between 60°N, 110°W and the coast at 132°W; Nova Scotia; Ontario south of
     * 52°N; Prince Edward Island; Quebec - mainland west of 66°W and south of 55°N; Saskatchewan south of 55°N;
     * Yukon.
     * Based on the mean sea level determined from several tidal gauges located in strategic areas of the country.
     * From November 2013 replaced by CGVD2013 (datum code 1127).
     */
    public const EPSG_CANADIAN_GEODETIC_VERTICAL_DATUM_OF_1928 = 'urn:ogc:def:datum:EPSG::5114';

    /**
     * Canadian Geodetic Vertical Datum of 2013 (CGG2013)
     * Type: Vertical
     * Extent: Canada - onshore and offshore - Alberta; British Columbia; Manitoba; New Brunswick; Newfoundland and
     * Labrador; Northwest Territories; Nova Scotia; Nunavut; Ontario; Prince Edward Island; Quebec; Saskatchewan;
     * Yukon.
     * Defined by the equipotential surface W0 = 62,636,856.0 m^2s^-2, which by convention represents the coastal mean
     * sea level for North America, realized through the Canadian gravimetric geoid (CGG) 2013 at epoch 2010.0.
     * Replaces CGVD28 from November 2013. Replaced by CGVD2013(CGG2013a) epoch 2010 from December 2015, supplemented
     * from February 2021 by snapshots of CGVD2013(CGG2013a) at epochs 1997.0 and 2002.0 (aligned with NAD83(CSRS)
     * realization epochs).
     */
    public const EPSG_CANADIAN_GEODETIC_VERTICAL_DATUM_OF_2013_CGG2013 = 'urn:ogc:def:datum:EPSG::1127';

    /**
     * Canadian Geodetic Vertical Datum of 2013 (CGG2013a) epoch 1997
     * Type: Vertical
     * Extent: Canada - onshore and offshore - Alberta; British Columbia; Manitoba; New Brunswick; Newfoundland and
     * Labrador; Northwest Territories; Nova Scotia; Nunavut; Ontario; Prince Edward Island; Quebec; Saskatchewan;
     * Yukon.
     * Defined by the equipotential surface W0 = 62,636,856.0 m^2s^-2, which by convention represents the coastal mean
     * sea level for North America, realized through the Canadian gravimetric geoid 2013a applied at epoch 1997.0.
     * CGVD2013(CGG2013a) is a static datum; however, heights referenced to it change with time, primarily due to
     * glacial isostasy. This datum supports CGVD2013(CGG2013a) heights at epoch 1997.0. Other snapshots are at epochs
     * 2002.0 and 2010.0.
     */
    public const EPSG_CANADIAN_GEODETIC_VERTICAL_DATUM_OF_2013_CGG2013A_EPOCH_1997 = 'urn:ogc:def:datum:EPSG::1326';

    /**
     * Canadian Geodetic Vertical Datum of 2013 (CGG2013a) epoch 2002
     * Type: Vertical
     * Extent: Canada - onshore and offshore - Alberta; British Columbia; Manitoba; New Brunswick; Newfoundland and
     * Labrador; Northwest Territories; Nova Scotia; Nunavut; Ontario; Prince Edward Island; Quebec; Saskatchewan;
     * Yukon.
     * Defined by the equipotential surface W0 = 62,636,856.0 m^2s^-2, which by convention represents the coastal mean
     * sea level for North America, realized through the Canadian gravimetric geoid 2013a applied at epoch 2002.
     * CGVD2013(CGG2013a) is a static datum; however, heights referenced to it change with time, primarily due to
     * glacial isostasy. This datum supports CGVD2013(CGG2013a) heights at epoch 2002.0. Other snapshots are at epochs
     * 1997.0 and 2010.0.
     */
    public const EPSG_CANADIAN_GEODETIC_VERTICAL_DATUM_OF_2013_CGG2013A_EPOCH_2002 = 'urn:ogc:def:datum:EPSG::1325';

    /**
     * Canadian Geodetic Vertical Datum of 2013 (CGG2013a) epoch 2010
     * Type: Vertical
     * Extent: Canada - onshore and offshore - Alberta; British Columbia; Manitoba; New Brunswick; Newfoundland and
     * Labrador; Northwest Territories; Nova Scotia; Nunavut; Ontario; Prince Edward Island; Quebec; Saskatchewan;
     * Yukon.
     * Defined by the equipotential surface W0 = 62,636,856.0 m^2s^-2, which by convention represents the coastal mean
     * sea level for North America, realized through CGG2013a at epoch 2010.0. Geoid velocity defined as zero with
     * respect to NAD83(CSRS).
     * Replaces CGVD2013(CGG2013). CGVD2013(CGG2013a) is a static datum. However heights referenced to it change with
     * time, primarily due to glacial isostasy. In practice static snapshots are used at epochs 2010.0 (this datum),
     * 2002.0 and 1997.0.
     */
    public const EPSG_CANADIAN_GEODETIC_VERTICAL_DATUM_OF_2013_CGG2013A_EPOCH_2010 = 'urn:ogc:def:datum:EPSG::1256';

    /**
     * Cape
     * Type: Geodetic
     * Extent: Botswana; Eswatini (Swaziland); Lesotho; South Africa - mainland.
     * Fundamental point: Buffelsfontein. Latitude: 33°59'32.000"S, longitude: 25°30'44.622"E (of Greenwich).
     */
    public const EPSG_CAPE = 'urn:ogc:def:datum:EPSG::6222';

    /**
     * Cape Canaveral
     * Type: Geodetic
     * Extent: North America - onshore - Bahamas and USA - Florida (east).
     * Fundamental point: Central 1950.  Latitude: 28°29'32.36555"N, longitude 80°34'38.77362"W (of Greenwich).
     */
    public const EPSG_CAPE_CANAVERAL = 'urn:ogc:def:datum:EPSG::6717';

    /**
     * Carthage
     * Type: Geodetic
     * Extent: Tunisia - onshore and offshore.
     * Fundamental point: Carthage. Latitude: 40.9464506g = 36°51'06.50"N, longitude: 8.8724368g E of Paris =
     * 10°19'20.72"E (of Greenwich).
     * Fundamental point astronomic coordinates determined in 1878.
     */
    public const EPSG_CARTHAGE = 'urn:ogc:def:datum:EPSG::6223';

    /**
     * Carthage (Paris)
     * Type: Geodetic
     * Extent: Tunisia - onshore.
     * Fundamental point: Carthage. Latitude: 40.9464506g N, longitude: 8.8724368g E (of Paris).
     * Fundamental point astronomic coordinates determined in 1878.
     */
    public const EPSG_CARTHAGE_PARIS = 'urn:ogc:def:datum:EPSG::6816';

    /**
     * Cascais
     * Type: Vertical
     * Extent: Portugal - mainland - onshore.
     * Mean Sea Level at Cascais 1938.
     * Orthometric heights.
     */
    public const EPSG_CASCAIS = 'urn:ogc:def:datum:EPSG::5178';

    /**
     * Caspian Sea
     * Type: Vertical
     * Extent: Azerbaijan - offshore; Kazakhstan - offshore; Russian Federation - Caspian Sea; Turkmenistan - offshore.
     * Defined as -28.0m Baltic datum.
     */
    public const EPSG_CASPIAN_SEA = 'urn:ogc:def:datum:EPSG::5106';

    /**
     * Catania 1965
     * Type: Vertical
     * Extent: Italy - Sicily onshore.
     * Mean Sea Level at Catania in 1965.
     * Orthometric heights.
     */
    public const EPSG_CATANIA_1965 = 'urn:ogc:def:datum:EPSG::1306';

    /**
     * Cayman Brac Vertical Datum 1961
     * Type: Vertical
     * Extent: Cayman Islands - Cayman Brac.
     */
    public const EPSG_CAYMAN_BRAC_VERTICAL_DATUM_1961 = 'urn:ogc:def:datum:EPSG::1099';

    /**
     * Cayman Islands Geodetic Datum 2011
     * Type: Geodetic
     * Extent: Cayman Islands - onshore and offshore. Includes Grand Cayman, Little Cayman and Cayman Brac.
     * ITRF2005 at epoch 2011.0
     * Replaces GCGD59 (datum code 6723) and SIGD61 (datum code 6726).
     */
    public const EPSG_CAYMAN_ISLANDS_GEODETIC_DATUM_2011 = 'urn:ogc:def:datum:EPSG::1100';

    /**
     * Centre Spatial Guyanais 1967
     * Type: Geodetic
     * Extent: French Guiana - coastal area.
     * Fundamental point: Kourou-Diane. Latitude: 5°15'53.699"N, longitude: 52°48'09.149"W (of Greenwich).
     * Replaced by RGFG95 (code 6624).
     */
    public const EPSG_CENTRE_SPATIAL_GUYANAIS_1967 = 'urn:ogc:def:datum:EPSG::6623';

    /**
     * Ceuta 2
     * Type: Vertical
     * Extent: Spain - Ceuta onshore.
     * Mean Sea Level at Ceuta harbour between March 1944 and December 2006.
     * Orthometric heights. Replaces an earlier vertical datum in Ceuta harbour measured between 1908 and 1927.
     */
    public const EPSG_CEUTA_2 = 'urn:ogc:def:datum:EPSG::1285';

    /**
     * Chatham Islands Datum 1971
     * Type: Geodetic
     * Extent: New Zealand - Chatham Islands group - onshore.
     * Replaced by Chatham Islands Datum 1979 (code 6673).
     */
    public const EPSG_CHATHAM_ISLANDS_DATUM_1971 = 'urn:ogc:def:datum:EPSG::6672';

    /**
     * Chatham Islands Datum 1979
     * Type: Geodetic
     * Extent: New Zealand - Chatham Islands group - onshore.
     * Fundamental point: station Astro. Latitude: 43°57'23.60"S, longitude: 176°34'28.65"W (of Greenwich).
     * Replaces Chatham Islands Datum 1971 (code 6672). Replaced by New Zealand Geodetic Datum 2000 (code 6167) from
     * March 2000.
     */
    public const EPSG_CHATHAM_ISLANDS_DATUM_1979 = 'urn:ogc:def:datum:EPSG::6673';

    /**
     * China 2000
     * Type: Geodetic
     * Extent: China - onshore and offshore.
     * ITRF97 at epoch 2000.0
     * Combined adjustment of astro-geodetic observations as used for Xian 1980 and GPS control network observed
     * 2000-2003. Adopted July 2008.
     */
    public const EPSG_CHINA_2000 = 'urn:ogc:def:datum:EPSG::1043';

    /**
     * Chos Malal 1914
     * Type: Geodetic
     * Extent: Argentina - Mendoza province, Neuquen province, western La Pampa province and western Rio Negro
     * province.
     * Chos Malal police station.
     * Also known as Quini-Huao.  Replaced by Campo Inchauspe (code 6221) for topographic mapping, use for oil
     * exploration and production continues.
     */
    public const EPSG_CHOS_MALAL_1914 = 'urn:ogc:def:datum:EPSG::6160';

    /**
     * Chua
     * Type: Geodetic
     * Extent: Brazil - south of 18°S and west of 54°W, plus Distrito Federal. Paraguay - north.
     * Fundamental point: Chua. Latitude: 19°45'41.160"S, longitude: 48°06'07.560"W (of Greenwich).
     * The Chua origin and associated network is in Brazil with a connecting traverse through northern Paraguay. It was
     * used in Brazil only as input into the Corrego Allegre adjustment and for government work in Distrito Federal.
     */
    public const EPSG_CHUA = 'urn:ogc:def:datum:EPSG::6224';

    /**
     * Cocos Islands 1965
     * Type: Geodetic
     * Extent: Cocos (Keeling) Islands - onshore.
     * Fundamental point: Anna 1.
     */
    public const EPSG_COCOS_ISLANDS_1965 = 'urn:ogc:def:datum:EPSG::6708';

    /**
     * Combani 1950
     * Type: Geodetic
     * Extent: Mayotte - onshore.
     * Combani South Base.
     * Replaced by RGM04 and Cadastre 1997 (datum codes 1036-37).
     */
    public const EPSG_COMBANI_1950 = 'urn:ogc:def:datum:EPSG::6632';

    /**
     * Conakry 1905
     * Type: Geodetic
     * Extent: Guinea - onshore.
     * Fundamental point: Conakry. Latitude: 10.573766g N, longitude: 17.833682g W (of Paris).
     */
    public const EPSG_CONAKRY_1905 = 'urn:ogc:def:datum:EPSG::6315';

    /**
     * Congo 1960 Pointe Noire
     * Type: Geodetic
     * Extent: Congo - onshore and offshore.
     * Fundamental point: Point Noire Astro. Latitude: 4°47'00.10"S, longitude: 11°51'01.55"E (of Greenwich).
     */
    public const EPSG_CONGO_1960_POINTE_NOIRE = 'urn:ogc:def:datum:EPSG::6282';

    /**
     * Constanta
     * Type: Vertical
     * Extent: Romania - onshore.
     * Mean Sea Level at Constanta.
     * Normal-orthometric heights.
     */
    public const EPSG_CONSTANTA = 'urn:ogc:def:datum:EPSG::5179';

    /**
     * Corrego Alegre 1961
     * Type: Geodetic
     * Extent: Brazil - onshore - between 18°S and 27°30'S, also east of 54°W between 15°S and 18°S.
     * Fundamental point: Corrego Alegre. Latitude: 19°50'14.91"S, longitude: 48°57'41.98"W (of Greenwich).
     * Replaced by Corrego Alegre 1970-72 (datum code 6225). NIMA gives coordinates of origin as latitude:
     * 19°50'15.14"S, longitude: 48°57'42.75"W.
     */
    public const EPSG_CORREGO_ALEGRE_1961 = 'urn:ogc:def:datum:EPSG::1074';

    /**
     * Corrego Alegre 1970-72
     * Type: Geodetic
     * Extent: Brazil - onshore - west of 54°W and south of 18°S; also south of 15°S between 54°W and 42°W; also
     * east of 42°W.
     * Fundamental point: Corrego Alegre. Latitude: 19°50'14.91"S, longitude: 48°57'41.98"W (of Greenwich).
     * Replaces 1961 adjustment (datum code 1074). Superseded by SAD69. NIMA gives coordinates of origin as latitude:
     * 19°50'15.14"S, longitude: 48°57'42.75"W; these may refer to 1961 adjustment.
     */
    public const EPSG_CORREGO_ALEGRE_1970_72 = 'urn:ogc:def:datum:EPSG::6225';

    /**
     * Costa Rica 2005
     * Type: Geodetic
     * Extent: Costa Rica - onshore and offshore.
     * ITRF2000 at epoch 2005.83.  Network of 34 GPS stations throughout the country, five of which were connected to
     * four Caribbean area ITRF stations.
     * Replaces Ocotepeque (datum code 1070) in Costa Rica from March 2007.
     */
    public const EPSG_COSTA_RICA_2005 = 'urn:ogc:def:datum:EPSG::1065';

    /**
     * Croatian Terrestrial Reference System
     * Type: Geodetic
     * Extent: Croatia - onshore and offshore.
     * Densification of ETRS89 in Croatia at epoch 1995.55.
     * Based on 78 control points with coordinates determined in ETRS89.
     */
    public const EPSG_CROATIAN_TERRESTRIAL_REFERENCE_SYSTEM = 'urn:ogc:def:datum:EPSG::6761';

    /**
     * Croatian Vertical Reference Datum 1971
     * Type: Vertical
     * Extent: Croatia - onshore.
     * Mean sea level at five tide gauges in Dubrovnik, Split, Bakar, Rovinj and Kopar at epoch 1971.5
     * Replaces Trieste (datum code 1050).
     */
    public const EPSG_CROATIAN_VERTICAL_REFERENCE_DATUM_1971 = 'urn:ogc:def:datum:EPSG::5207';

    /**
     * Cyprus Geodetic Reference System 1993
     * Type: Geodetic
     * Extent: Cyprus - onshore.
     * Station Chionistra (Mount Troodos). Network scale and orientation determined by connection of six stations to
     * ITRF91 in Europe at epoch 1993.1.
     * Survey plans and maps produced by DLS after 1993.
     */
    public const EPSG_CYPRUS_GEODETIC_REFERENCE_SYSTEM_1993 = 'urn:ogc:def:datum:EPSG::1112';

    /**
     * Dabola 1981
     * Type: Geodetic
     * Extent: Guinea - onshore.
     */
    public const EPSG_DABOLA_1981 = 'urn:ogc:def:datum:EPSG::6155';

    /**
     * Danger 1950
     * Type: Vertical
     * Extent: St Pierre and Miquelon - onshore.
     * Marker near tide gauge at port of Saint Pierre. Height is 1.26 metres above zero of tide gauge.
     */
    public const EPSG_DANGER_1950 = 'urn:ogc:def:datum:EPSG::5190';

    /**
     * Dansk Normal Nul
     * Type: Vertical
     * Extent: Denmark - onshore.
     * Mean Sea Level at 10 gauges.
     * Orthometric heights.
     */
    public const EPSG_DANSK_NORMAL_NUL = 'urn:ogc:def:datum:EPSG::5132';

    /**
     * Dansk Vertikal Reference 1990
     * Type: Vertical
     * Extent: Denmark - onshore.
     * Benchmark at Århus cathedral referenced to mean sea level determined during 1990 at 10 tide gauges: Esbjerg,
     * Fredericia, Frederikshavn, Gedser, Hirtshals, Hornbæk, Korsør, København, Slipshavn and Århus.
     * Normal Orthometric heights.
     */
    public const EPSG_DANSK_VERTIKAL_REFERENCE_1990 = 'urn:ogc:def:datum:EPSG::5206';

    /**
     * Datum 73
     * Type: Geodetic
     * Extent: Portugal - mainland - onshore.
     * Fundamental point:  TF4, Melrica. Latitude: 39°41'37.30"N, longitude: 8°07'53.31"W (of Greenwich).
     */
    public const EPSG_DATUM_73 = 'urn:ogc:def:datum:EPSG::6274';

    /**
     * Datum Altimetrico de Costa Rica 1952
     * Type: Vertical
     * Extent: Costa Rica - onshore.
     * Mean Sea Level 1941-1952 at Puntarenas.
     * Orthometric heights.
     */
    public const EPSG_DATUM_ALTIMETRICO_DE_COSTA_RICA_1952 = 'urn:ogc:def:datum:EPSG::1226';

    /**
     * Datum Geodesi Nasional 1995
     * Type: Geodetic
     * Extent: Indonesia - onshore and offshore.
     * ITRF91at epoch 1992.0.
     * Replaces ID74 and all older datums.
     */
    public const EPSG_DATUM_GEODESI_NASIONAL_1995 = 'urn:ogc:def:datum:EPSG::6755';

    /**
     * Dealul Piscului 1930
     * Type: Geodetic
     * Extent: Romania - onshore.
     * Fundamental point: latitude 44°24'33.9606"N, longitude 26°06'44.8772"E (of Greenwich).
     * Replaced by Pulkovo 1942(58) (datum code 6179).
     */
    public const EPSG_DEALUL_PISCULUI_1930 = 'urn:ogc:def:datum:EPSG::6316';

    /**
     * Deception Island
     * Type: Geodetic
     * Extent: Antarctica - South Shetland Islands - Deception Island.
     */
    public const EPSG_DECEPTION_ISLAND = 'urn:ogc:def:datum:EPSG::6736';

    /**
     * Deir ez Zor
     * Type: Geodetic
     * Extent: Lebanon - onshore. Syrian Arab Republic - onshore.
     * Fundamental point: Trig. 254 Deir. Latitude: 35°21'49.975"N, longitude: 40°05'46.770"E (of Greenwich).
     */
    public const EPSG_DEIR_EZ_ZOR = 'urn:ogc:def:datum:EPSG::6227';

    /**
     * Deutsche Bahn Reference System
     * Type: Geodetic
     * Extent: Germany - onshore - states of Baden-Wurtemberg, Bayern, Berlin, Brandenburg, Bremen, Hamburg, Hessen,
     * Mecklenburg-Vorpommern, Niedersachsen, Nordrhein-Westfalen, Rheinland-Pfalz, Saarland, Sachsen, Sachsen-Anhalt,
     * Schleswig-Holstein, Thuringen.
     * Defined by transformation from ETRS89 (transformation code 5826) to be an average of DHDN realizations across
     * all German states.
     */
    public const EPSG_DEUTSCHE_BAHN_REFERENCE_SYSTEM = 'urn:ogc:def:datum:EPSG::1081';

    /**
     * Deutsches Hauptdreiecksnetz
     * Type: Geodetic
     * Extent: Germany - states of former West Germany onshore - Baden-Wurtemberg, Bayern, Bremen, Hamburg, Hessen,
     * Niedersachsen, Nordrhein-Westfalen, Rheinland-Pfalz, Saarland, Schleswig-Holstein.
     * Fundamental point: Rauenberg. Latitude: 52°27'12.021"N, longitude: 13°22'04.928"E (of Greenwich).  This
     * station was destroyed in 1910 and the station at Potsdam substituted as the fundamental point.
     */
    public const EPSG_DEUTSCHES_HAUPTDREIECKSNETZ = 'urn:ogc:def:datum:EPSG::6314';

    /**
     * Deutsches Haupthoehennetz 1912
     * Type: Vertical
     * Extent: Germany - onshore - states of Baden-Wurtemberg, Bayern, Berlin, Brandenburg, Bremen, Hamburg, Hessen,
     * Mecklenburg-Vorpommern, Niedersachsen, Nordrhein-Westfalen, Rheinland-Pfalz, Saarland, Sachsen, Sachsen-Anhalt,
     * Schleswig-Holstein, Thuringen.
     * Height of reference point "Normalnullpunkt" at Berlin Observatory defined as 37.000m above MSL in 1879
     * (transferred to benchmarks near Hoppegarten in Müncheberg in 1912). Datum at Normaal Amsterdams Peil (NAP) is
     * mean high tide in 1684.
     * Uses Normal-orthometric heights.
     */
    public const EPSG_DEUTSCHES_HAUPTHOEHENNETZ_1912 = 'urn:ogc:def:datum:EPSG::1161';

    /**
     * Deutsches Haupthoehennetz 1985
     * Type: Vertical
     * Extent: Germany - states of former West Germany onshore - Baden-Wurtemberg, Bayern, Bremen, Hamburg, Hessen,
     * Niedersachsen, Nordrhein-Westfalen, Rheinland-Pfalz, Saarland, Schleswig-Holstein.
     * Network adjusted in 1985. Height of reference point Wallenhorst defined as value from 1928 adjustment. Datum at
     * Normaal Amsterdams Peil (NAP) is mean high tide in 1684.
     * Replaced by DHHN92. Uses Normal-orthometric heights.
     */
    public const EPSG_DEUTSCHES_HAUPTHOEHENNETZ_1985 = 'urn:ogc:def:datum:EPSG::5182';

    /**
     * Deutsches Haupthoehennetz 1992
     * Type: Vertical
     * Extent: Germany - onshore - states of Baden-Wurtemberg, Bayern, Berlin, Brandenburg, Bremen, Hamburg, Hessen,
     * Mecklenburg-Vorpommern, Niedersachsen, Nordrhein-Westfalen, Rheinland-Pfalz, Saarland, Sachsen, Sachsen-Anhalt,
     * Schleswig-Holstein, Thuringen.
     * Network adjusted in 1992. Geopotential number at reference point Wallenhorst defined as value from the
     * UELN-73/86 adjustment. Datum at Normaal Amsterdams Peil (NAP) is mean high tide in 1684.
     * Replaces DHHN85 in West Germany and SNN76 in East Germany. Uses Normal heights.
     */
    public const EPSG_DEUTSCHES_HAUPTHOEHENNETZ_1992 = 'urn:ogc:def:datum:EPSG::5181';

    /**
     * Deutsches Haupthoehennetz 2016
     * Type: Vertical
     * Extent: Germany - onshore - states of Baden-Wurtemberg, Bayern, Berlin, Brandenburg, Bremen, Hamburg, Hessen,
     * Mecklenburg-Vorpommern, Niedersachsen, Nordrhein-Westfalen, Rheinland-Pfalz, Saarland, Sachsen, Sachsen-Anhalt,
     * Schleswig-Holstein, Thuringen.
     * 2006-2012 levelling network adjusted to 72 points of the DHHN92. Datum at Normaal Amsterdams Peil (NAP) is mean
     * high tide in 1684.
     * Uses Normal heights in the mean tidal system.
     */
    public const EPSG_DEUTSCHES_HAUPTHOEHENNETZ_2016 = 'urn:ogc:def:datum:EPSG::1170';

    /**
     * Diego Garcia 1969
     * Type: Geodetic
     * Extent: British Indian Ocean Territory - Chagos Archipelago - Diego Garcia.
     * Fundamental point: ISTS 073.
     */
    public const EPSG_DIEGO_GARCIA_1969 = 'urn:ogc:def:datum:EPSG::6724';

    /**
     * Dominica 1945
     * Type: Geodetic
     * Extent: Dominica - onshore.
     * Fundamental point: station M12.
     */
    public const EPSG_DOMINICA_1945 = 'urn:ogc:def:datum:EPSG::6602';

    /**
     * Douala 1948
     * Type: Geodetic
     * Extent: Cameroon - coastal area.
     * South pillar of Douala base; 4°00'40.64"N, 9°42'30.41"E (of Greenwich).
     * Replaced  by Manoca 1962 datum (code 6193).
     */
    public const EPSG_DOUALA_1948 = 'urn:ogc:def:datum:EPSG::6192';

    /**
     * Douglas
     * Type: Vertical
     * Extent: Isle of Man - onshore.
     * Mean Sea Level at Douglas 1865. Initially realised through levelling network adjustment, from 2002 redefined to
     * be realised through OSGM geoid model.
     * Orthometric heights.
     */
    public const EPSG_DOUGLAS = 'urn:ogc:def:datum:EPSG::5148';

    /**
     * Dunedin 1958
     * Type: Vertical
     * Extent: New Zealand - South Island - between approximately 44°S and 46°S - Dunedin vertical CRS area.
     * MSL at Dunedin harbour 1918-1937.
     */
    public const EPSG_DUNEDIN_1958 = 'urn:ogc:def:datum:EPSG::5159';

    /**
     * Dunedin-Bluff 1960
     * Type: Vertical
     * Extent: New Zealand - South Island - Dunedin-Bluff vertical CRS area.
     * Common adjustment of Dunedin 1958 and Bluff 1955 networks.
     */
    public const EPSG_DUNEDIN_BLUFF_1960 = 'urn:ogc:def:datum:EPSG::1040';

    /**
     * Durres
     * Type: Vertical
     * Extent: Albania - onshore.
     * Mean Sea Level at Durres.
     * Normal-orthometric heights.
     */
    public const EPSG_DURRES = 'urn:ogc:def:datum:EPSG::5175';

    /**
     * EBBWV14 Intermediate Reference Frame
     * Type: Geodetic
     * Extent: United Kingdom (UK) - on or related to the rail route from Newport (Park Junction) to Ebbw Vale.
     * Defined through the application of the EBBWV14 NTv2 transformation to ETRS89 as realized through OSNet v2009
     * CORS.
     * Created in 2022 to support intermediate CRS "EBBWV14-IRF" in the emulation of the EBBWV14 Snake map projection.
     */
    public const EPSG_EBBWV14_INTERMEDIATE_REFERENCE_FRAME = 'urn:ogc:def:datum:EPSG::1319';

    /**
     * ECML14_NB Intermediate Reference Frame
     * Type: Geodetic
     * Extent: United Kingdom (UK) - on or related to rail routes from Newcastle Central to Ashington via Benton North
     * Junction, and the section from Bedlington to Morpeth.
     * Defined through the application of the ECML14_NB NTv2 transformation (code 9759) to ETRS89 as realized through
     * OSNet v2009 CORS.
     * Created in 2021 to support intermediate CRS "ECML14_NB-IRF" in the emulation of the ECML14_NB Snake map
     * projection.
     */
    public const EPSG_ECML14_NB_INTERMEDIATE_REFERENCE_FRAME = 'urn:ogc:def:datum:EPSG::1310';

    /**
     * EGM2008 geoid
     * Type: Vertical
     * Extent: World.
     * Derived through EGM2008 geoid undulation model consisting of spherical harmonic coefficients to degree 2190 and
     * order 2159 applied to the WGS 84 ellipsoid.
     * Replaces EGM96 geoid (datum code 5171). See transformation codes 3858 and 3859 for 2.5x2.5 and 1x1 arc minute
     * geoid undulation grid files derived from the spherical harmonic coefficients.
     */
    public const EPSG_EGM2008_GEOID = 'urn:ogc:def:datum:EPSG::1027';

    /**
     * EGM84 geoid
     * Type: Vertical
     * Extent: World.
     * Derived through EGM84 geoid undulation model consisting of spherical harmonic coefficients to degree and order
     * 180 applied to the WGS 84 ellipsoid.
     * Replaced by EGM96 geoid (datum code 5171).
     */
    public const EPSG_EGM84_GEOID = 'urn:ogc:def:datum:EPSG::5203';

    /**
     * EGM96 geoid
     * Type: Vertical
     * Extent: World.
     * Derived through EGM84 geoid undulation model consisting of spherical harmonic coefficients to degree and order
     * 360 applied to the WGS 84 ellipsoid.
     * Replaces EGM84 geoid (datum code 5203). Replaced by EGM2008 geoid (datum code 1027).
     */
    public const EPSG_EGM96_GEOID = 'urn:ogc:def:datum:EPSG::5171';

    /**
     * EOS21 Intermediate Reference Frame
     * Type: Geodetic
     * Extent: United Kingdom (UK) - on or related to the complex of rail routes in the East of Scotland, incorporating
     * the route from Tweedbank through the Borders to Edinburgh; the line from Edinburgh to Aberdeen; routes via
     * Kirkaldy and Cowdenbeath; and routes via Leuchars and Perth to Dundee.
     * Defined through the application of the EOS21 NTv2 transformation (code 9740) to ETRS89 as realized through OSNet
     * v2009 CORS.
     * Created in 2021 to support intermediate CRS "EOS21-IRF" in the emulation of the EOS21 Snake map projection.
     */
    public const EPSG_EOS21_INTERMEDIATE_REFERENCE_FRAME = 'urn:ogc:def:datum:EPSG::1308';

    /**
     * ETRF2000 Poland
     * Type: Geodetic
     * Extent: Poland - onshore and offshore.
     * Polish densification of ETRS89 realized through adjustment of ASG-EUPOS network constrained to 35 EPN stations
     * in ETRF2000@2011.0.
     * Adopted as official Polish reference frame from 2012-12-01 through Ordinance of the Council of Ministers of 15th
     * November 2012 on the state system of spatial reference system.
     */
    public const EPSG_ETRF2000_POLAND = 'urn:ogc:def:datum:EPSG::1305';

    /**
     * EWR2 Intermediate Reference Frame
     * Type: Geodetic
     * Extent: United Kingdom (UK) - on or related to East West Rail (Phase 2) routes from Oxford to Bicester,
     * Bletchley and Bedford, and from Claydon Junction to Aylesbury and Princes Risborough.
     * Defined through the application of the EWR2 NTv2 transformation (code 9763) to ETRS89 as realized through OSNet
     * v2009 CORS.
     * Created in 2021 to support intermediate CRS "EWR2-IRF" in the emulation of the EWR2 Snake map projection.
     */
    public const EPSG_EWR2_INTERMEDIATE_REFERENCE_FRAME = 'urn:ogc:def:datum:EPSG::1311';

    /**
     * Easter Island 1967
     * Type: Geodetic
     * Extent: Chile - Easter Island onshore.
     */
    public const EPSG_EASTER_ISLAND_1967 = 'urn:ogc:def:datum:EPSG::6719';

    /**
     * Egypt 1907
     * Type: Geodetic
     * Extent: Egypt - onshore and offshore.
     * Fundamental point: Station F1 (Venus). Latitude: 30°01'42.86"N, longitude: 31°16'33.60"E (of Greenwich).
     */
    public const EPSG_EGYPT_1907 = 'urn:ogc:def:datum:EPSG::6229';

    /**
     * Egypt 1930
     * Type: Geodetic
     * Extent: Egypt - onshore.
     * Fundamental point: Station F1 (Venus). Latitude: 30°01'42.86"N, longitude: 31°16'37.05"E (of Greenwich).
     * Note that Egypt 1930 uses the International 1924 ellipsoid, unlike the Egypt 1907 datum (code 6229) which uses
     * the Helmert ellipsoid. Oil industry references to the Egypt 1930 datum name and the Helmert ellipsoid probably
     * mean Egypt 1907 datum.
     */
    public const EPSG_EGYPT_1930 = 'urn:ogc:def:datum:EPSG::6199';

    /**
     * Egypt Gulf of Suez S-650 TL
     * Type: Geodetic
     * Extent: Egypt - Gulf of Suez.
     * Fundamental point: Station S-650 DMX. Adopted coordinates: latitude: 28°19'02.1907"N, longitude:
     * 33°06'36.6344"E (of Greenwich). The proper Egypt 1907 coordinates for S-650 differ from these by about 20m.
     * A coherent set of stations bordering the Gulf of Suez coordinated by Transit translocation ("TL") between 1980
     * and 1984. Based on incorrect Egypt 1907 values for origin station S-650. Differs from true Egypt 1907 by
     * approximately 20m.
     */
    public const EPSG_EGYPT_GULF_OF_SUEZ_S_650_TL = 'urn:ogc:def:datum:EPSG::6706';

    /**
     * El Hierro
     * Type: Vertical
     * Extent: Spain - Canary Islands - El Hierro onshore.
     * Mean Sea Level at La Estaca harbour in 2000.
     * Orthometric heights.
     */
    public const EPSG_EL_HIERRO = 'urn:ogc:def:datum:EPSG::1284';

    /**
     * Estonia 1992
     * Type: Geodetic
     * Extent: Estonia - onshore.
     * Densification from 4 ETRS89 points.
     * Based on ETRS89 as established during the 1992 Baltic campaign. Replaced by Estonia 1997 adjustment (code 6180).
     */
    public const EPSG_ESTONIA_1992 = 'urn:ogc:def:datum:EPSG::6133';

    /**
     * Estonia 1997
     * Type: Geodetic
     * Extent: Estonia - onshore and offshore.
     * Densification of ETRS89 during EUREF-ESTONIA97 campaign through transformation from ITRF96 at epoch 1997.56.
     * Replaces Estonia 1992 adjustment (code 6133).
     */
    public const EPSG_ESTONIA_1997 = 'urn:ogc:def:datum:EPSG::6180';

    /**
     * Estonian Height System 2000
     * Type: Vertical
     * Extent: Estonia - onshore.
     * Estonian realisation of EVRF2007. Relevelling observed  2004-2013 and reduced to epoch 2000 using the NKG2005LU
     * empirical land uplift model. EVRF2007 height of Poltsamaa fundamental bench mark (H=55.2114m) held fixed.
     * Uses Normal heights.
     */
    public const EPSG_ESTONIAN_HEIGHT_SYSTEM_2000 = 'urn:ogc:def:datum:EPSG::1298';

    /**
     * European Datum 1950
     * Type: Geodetic
     * Extent: Europe - west: Andorra; Cyprus; Denmark - onshore and offshore; Faroe Islands - onshore; France -
     * offshore; Germany - offshore North Sea; Gibraltar; Greece - offshore; Israel - offshore; Italy including San
     * Marino and Vatican City State; Ireland offshore; Malta; Netherlands - offshore; North Sea; Norway including
     * Svalbard - onshore and offshore; Portugal - mainland - offshore; Spain - onshore; Türkiye (Turkey) - onshore
     * and offshore; United Kingdom - UKCS offshore east of 6°W including Channel Islands (Guernsey and Jersey). Egypt
     * - Western Desert; Iraq - onshore; Jordan.
     * Fundamental point: Potsdam (Helmert Tower). Latitude: 52°22'51.4456"N, longitude: 13°03'58.9283"E (of
     * Greenwich).
     */
    public const EPSG_EUROPEAN_DATUM_1950 = 'urn:ogc:def:datum:EPSG::6230';

    /**
     * European Datum 1950(1977)
     * Type: Geodetic
     * Extent: Iran - onshore and offshore.
     * Extension of ED50 over Iran.
     * Sometimes referred to as ED50-ED77.
     */
    public const EPSG_EUROPEAN_DATUM_1950_1977 = 'urn:ogc:def:datum:EPSG::6154';

    /**
     * European Datum 1979
     * Type: Geodetic
     * Extent: Europe - west.
     * Fundamental point: Potsdam (Helmert Tower). Latitude: 52°22'51.4456"N, longitude: 13°03'58.9283"E (of
     * Greenwich).
     * Replaced by 1987 adjustment.
     */
    public const EPSG_EUROPEAN_DATUM_1979 = 'urn:ogc:def:datum:EPSG::6668';

    /**
     * European Datum 1987
     * Type: Geodetic
     * Extent: Europe - west.
     * Fundamental point: Potsdam (Helmert Tower). Latitude: 52°22'51.4456"N, longitude: 13°03'58.9283"E (of
     * Greenwich).
     */
    public const EPSG_EUROPEAN_DATUM_1987 = 'urn:ogc:def:datum:EPSG::6231';

    /**
     * European Libyan Datum 1979
     * Type: Geodetic
     * Extent: Libya - onshore and offshore.
     * Extension of ED50 over Libya.
     */
    public const EPSG_EUROPEAN_LIBYAN_DATUM_1979 = 'urn:ogc:def:datum:EPSG::6159';

    /**
     * European Terrestrial Reference Frame 1989
     * Type: Geodetic
     * Extent: Europe - onshore and offshore: Albania; Andorra; Austria; Belgium; Bosnia and Herzegovina; Bulgaria;
     * Croatia; Cyprus; Czechia; Denmark; Estonia; Faroe Islands; Finland; France; Germany; Gibraltar; Greece; Hungary;
     * Ireland; Italy; Kosovo; Latvia; Liechtenstein; Lithuania; Luxembourg; Malta; Moldova; Monaco; Montenegro;
     * Netherlands; North Macedonia; Norway including Svalbard and Jan Mayen; Poland; Portugal; Romania; San Marino;
     * Serbia; Slovakia; Slovenia; Spain; Sweden; Switzerland; United Kingdom (UK) including Channel Islands and Isle
     * of Man; Vatican City State.
     * Coincides with ITRF89 at epoch 1989.0. Fixed to the stable part of the Eurasian tectonic plate through 3
     * rotation rates derived from the AM02 geophysical model.
     * Defined by transformation from ITRF89 (CT code 7932). Replaced by ETRF90 (datum code 1179).
     */
    public const EPSG_EUROPEAN_TERRESTRIAL_REFERENCE_FRAME_1989 = 'urn:ogc:def:datum:EPSG::1178';

    /**
     * European Terrestrial Reference Frame 1990
     * Type: Geodetic
     * Extent: Europe - onshore and offshore: Albania; Andorra; Austria; Belgium; Bosnia and Herzegovina; Bulgaria;
     * Croatia; Cyprus; Czechia; Denmark; Estonia; Faroe Islands; Finland; France; Germany; Gibraltar; Greece; Hungary;
     * Ireland; Italy; Kosovo; Latvia; Liechtenstein; Lithuania; Luxembourg; Malta; Moldova; Monaco; Montenegro;
     * Netherlands; North Macedonia; Norway including Svalbard and Jan Mayen; Poland; Portugal; Romania; San Marino;
     * Serbia; Slovakia; Slovenia; Spain; Sweden; Switzerland; United Kingdom (UK) including Channel Islands and Isle
     * of Man; Vatican City State.
     * Coincides with ITRF90 in orientation and scale at epoch 1989.0 realigned to ITRF89 at epoch 1989.0 using 3
     * translations. Fixed to the stable part of the Eurasian tectonic plate through 3 rotation rates derived from the
     * AM02 geophysical model.
     * Defined by transformation from ITRF90 (CT code 7933). Replaces ETRF89 (datum code 1178). Replaced by ETRF91
     * (datum code 1180).
     */
    public const EPSG_EUROPEAN_TERRESTRIAL_REFERENCE_FRAME_1990 = 'urn:ogc:def:datum:EPSG::1179';

    /**
     * European Terrestrial Reference Frame 1991
     * Type: Geodetic
     * Extent: Europe - onshore and offshore: Albania; Andorra; Austria; Belgium; Bosnia and Herzegovina; Bulgaria;
     * Croatia; Cyprus; Czechia; Denmark; Estonia; Faroe Islands; Finland; France; Germany; Gibraltar; Greece; Hungary;
     * Ireland; Italy; Kosovo; Latvia; Liechtenstein; Lithuania; Luxembourg; Malta; Moldova; Monaco; Montenegro;
     * Netherlands; North Macedonia; Norway including Svalbard and Jan Mayen; Poland; Portugal; Romania; San Marino;
     * Serbia; Slovakia; Slovenia; Spain; Sweden; Switzerland; United Kingdom (UK) including Channel Islands and Isle
     * of Man; Vatican City State.
     * Coincides with ITRF91 in orientation and scale at epoch 1989.0 realigned to ITRF89 at epoch 1989.0 using 3
     * translations. Fixed to the stable part of the Eurasian tectonic plate through 3 rotation rates derived from the
     * AM02 geophysical model.
     * Defined by transformation from ITRF91 (CT code 7934). Replaces ETRF90 (datum code 1179). Replaced by ETRF92
     * (datum code 1181).
     */
    public const EPSG_EUROPEAN_TERRESTRIAL_REFERENCE_FRAME_1991 = 'urn:ogc:def:datum:EPSG::1180';

    /**
     * European Terrestrial Reference Frame 1992
     * Type: Geodetic
     * Extent: Europe - onshore and offshore: Albania; Andorra; Austria; Belgium; Bosnia and Herzegovina; Bulgaria;
     * Croatia; Cyprus; Czechia; Denmark; Estonia; Faroe Islands; Finland; France; Germany; Gibraltar; Greece; Hungary;
     * Ireland; Italy; Kosovo; Latvia; Liechtenstein; Lithuania; Luxembourg; Malta; Moldova; Monaco; Montenegro;
     * Netherlands; North Macedonia; Norway including Svalbard and Jan Mayen; Poland; Portugal; Romania; San Marino;
     * Serbia; Slovakia; Slovenia; Spain; Sweden; Switzerland; United Kingdom (UK) including Channel Islands and Isle
     * of Man; Vatican City State.
     * Coincides with ITRF92 in orientation and scale at epoch 1989.0 realigned to ITRF89 at epoch 1989.0 using 3
     * translations. Fixed to the stable part of the Eurasian tectonic plate through 3 rotation rates derived from the
     * NNR-NUVEL-1 geophysical model.
     * Defined by transformation from ITRF92 (CT code 7935). Replaces ETRF91 (datum code 1180). Replaced by ETRF93
     * (datum code 1182).
     */
    public const EPSG_EUROPEAN_TERRESTRIAL_REFERENCE_FRAME_1992 = 'urn:ogc:def:datum:EPSG::1181';

    /**
     * European Terrestrial Reference Frame 1993
     * Type: Geodetic
     * Extent: Europe - onshore and offshore: Albania; Andorra; Austria; Belgium; Bosnia and Herzegovina; Bulgaria;
     * Croatia; Cyprus; Czechia; Denmark; Estonia; Faroe Islands; Finland; France; Germany; Gibraltar; Greece; Hungary;
     * Ireland; Italy; Kosovo; Latvia; Liechtenstein; Lithuania; Luxembourg; Malta; Moldova; Monaco; Montenegro;
     * Netherlands; North Macedonia; Norway including Svalbard and Jan Mayen; Poland; Portugal; Romania; San Marino;
     * Serbia; Slovakia; Slovenia; Spain; Sweden; Switzerland; United Kingdom (UK) including Channel Islands and Isle
     * of Man; Vatican City State.
     * Coincides with ITRF93 in orientation and scale at epoch 1989.0 realigned to ITRF89 at epoch 1989.0 using 3
     * translations. Fixed to the stable part of the Eurasian tectonic plate through 3 rotation rates derived from the
     * ITRF93 velocity field.
     * Defined by transformation from ITRF93 (CT code 7936). Replaces ETRF92 (datum code 1181). Replaced by ETRF94
     * (datum code 1183).
     */
    public const EPSG_EUROPEAN_TERRESTRIAL_REFERENCE_FRAME_1993 = 'urn:ogc:def:datum:EPSG::1182';

    /**
     * European Terrestrial Reference Frame 1994
     * Type: Geodetic
     * Extent: Europe - onshore and offshore: Albania; Andorra; Austria; Belgium; Bosnia and Herzegovina; Bulgaria;
     * Croatia; Cyprus; Czechia; Denmark; Estonia; Faroe Islands; Finland; France; Germany; Gibraltar; Greece; Hungary;
     * Ireland; Italy; Kosovo; Latvia; Liechtenstein; Lithuania; Luxembourg; Malta; Moldova; Monaco; Montenegro;
     * Netherlands; North Macedonia; Norway including Svalbard and Jan Mayen; Poland; Portugal; Romania; San Marino;
     * Serbia; Slovakia; Slovenia; Spain; Sweden; Switzerland; United Kingdom (UK) including Channel Islands and Isle
     * of Man; Vatican City State.
     * Coincides with ITRF94 in orientation and scale at epoch 1989.0 realigned to ITRF89 at epoch 1989.0 using 3
     * translations. Fixed to the stable part of the Eurasian tectonic plate through 3 rotation rates derived from the
     * NNR-NUVEL-1A geophysical model.
     * Defined by transformation from ITRF94 (CT code 7937). Replaces ETRF93 (datum code 1182). Replaced by ETRF96
     * (datum code 1184).
     */
    public const EPSG_EUROPEAN_TERRESTRIAL_REFERENCE_FRAME_1994 = 'urn:ogc:def:datum:EPSG::1183';

    /**
     * European Terrestrial Reference Frame 1996
     * Type: Geodetic
     * Extent: Europe - onshore and offshore: Albania; Andorra; Austria; Belgium; Bosnia and Herzegovina; Bulgaria;
     * Croatia; Cyprus; Czechia; Denmark; Estonia; Faroe Islands; Finland; France; Germany; Gibraltar; Greece; Hungary;
     * Ireland; Italy; Kosovo; Latvia; Liechtenstein; Lithuania; Luxembourg; Malta; Moldova; Monaco; Montenegro;
     * Netherlands; North Macedonia; Norway including Svalbard and Jan Mayen; Poland; Portugal; Romania; San Marino;
     * Serbia; Slovakia; Slovenia; Spain; Sweden; Switzerland; United Kingdom (UK) including Channel Islands and Isle
     * of Man; Vatican City State.
     * Coincides with ITRF96 in orientation and scale at epoch 1989.0 realigned to ITRF89 at epoch 1989.0 using 3
     * translations. Fixed to the stable part of the Eurasian tectonic plate through 3 rotation rates derived from the
     * NNR-NUVEL-1A geophysical model.
     * Defined by transformation from ITRF96 (CT code 7938). Replaces ETRF94 (datum code 1183). Replaced by ETRF97
     * (datum code 1185).
     */
    public const EPSG_EUROPEAN_TERRESTRIAL_REFERENCE_FRAME_1996 = 'urn:ogc:def:datum:EPSG::1184';

    /**
     * European Terrestrial Reference Frame 1997
     * Type: Geodetic
     * Extent: Europe - onshore and offshore: Albania; Andorra; Austria; Belgium; Bosnia and Herzegovina; Bulgaria;
     * Croatia; Cyprus; Czechia; Denmark; Estonia; Faroe Islands; Finland; France; Germany; Gibraltar; Greece; Hungary;
     * Ireland; Italy; Kosovo; Latvia; Liechtenstein; Lithuania; Luxembourg; Malta; Moldova; Monaco; Montenegro;
     * Netherlands; North Macedonia; Norway including Svalbard and Jan Mayen; Poland; Portugal; Romania; San Marino;
     * Serbia; Slovakia; Slovenia; Spain; Sweden; Switzerland; United Kingdom (UK) including Channel Islands and Isle
     * of Man; Vatican City State.
     * Coincides with ITRF97 in orientation and scale at epoch 1989.0 realigned to ITRF89 at epoch 1989.0 using 3
     * translations. Fixed to the stable part of the Eurasian tectonic plate through 3 rotation rates derived from the
     * NNR-NUVEL-1A geophysical model.
     * Defined by transformation from ITRF97 (CT code 7939). Replaces ETRF96 (datum code 1184). Replaced by ETRF2000
     * (datum code 1186).
     */
    public const EPSG_EUROPEAN_TERRESTRIAL_REFERENCE_FRAME_1997 = 'urn:ogc:def:datum:EPSG::1185';

    /**
     * European Terrestrial Reference Frame 2000
     * Type: Geodetic
     * Extent: Europe - onshore and offshore: Albania; Andorra; Austria; Belgium; Bosnia and Herzegovina; Bulgaria;
     * Croatia; Cyprus; Czechia; Denmark; Estonia; Faroe Islands; Finland; France; Germany; Gibraltar; Greece; Hungary;
     * Ireland; Italy; Kosovo; Latvia; Liechtenstein; Lithuania; Luxembourg; Malta; Moldova; Monaco; Montenegro;
     * Netherlands; North Macedonia; Norway including Svalbard and Jan Mayen; Poland; Portugal; Romania; San Marino;
     * Serbia; Slovakia; Slovenia; Spain; Sweden; Switzerland; United Kingdom (UK) including Channel Islands and Isle
     * of Man; Vatican City State.
     * Coincides with ITRF2000 in orientation and scale at epoch 1989.0 realigned to ITRF89 at epoch 1989.0 using 3
     * translations. Fixed to the stable part of the Eurasian tectonic plate through 3 rotation rates derived from the
     * ITRF2000 velocity field.
     * Defined by transformation from ITRF2000 (CT 7940). Replaces ETRF97. On the publication of ETRF2005 the EUREF TWG
     * recommended that ETRF2000 be the realization of ETRS89. ETRF2014 (code 1206) is technically superior to all
     * earlier realizations of ETRS89.
     */
    public const EPSG_EUROPEAN_TERRESTRIAL_REFERENCE_FRAME_2000 = 'urn:ogc:def:datum:EPSG::1186';

    /**
     * European Terrestrial Reference Frame 2005
     * Type: Geodetic
     * Extent: Europe - onshore and offshore: Albania; Andorra; Austria; Belgium; Bosnia and Herzegovina; Bulgaria;
     * Croatia; Cyprus; Czechia; Denmark; Estonia; Faroe Islands; Finland; France; Germany; Gibraltar; Greece; Hungary;
     * Ireland; Italy; Kosovo; Latvia; Liechtenstein; Lithuania; Luxembourg; Malta; Moldova; Monaco; Montenegro;
     * Netherlands; North Macedonia; Norway including Svalbard and Jan Mayen; Poland; Portugal; Romania; San Marino;
     * Serbia; Slovakia; Slovenia; Spain; Sweden; Switzerland; United Kingdom (UK) including Channel Islands and Isle
     * of Man; Vatican City State.
     * Coincides with ITRF2005 in orientation and scale at epoch 1989.0 realigned to ITRF89 at epoch 1989.0 using 3
     * translations. Fixed to the stable part of the Eurasian tectonic plate through 3 rotation rates derived from the
     * ITRF2005 velocity field.
     * Defined by transformation from ITRF2005 (CT 5900). On publication in 2007 of this reference frame, the EUREF TWG
     * recommended that ETRF2000 rather than this reference frame remained as the preferred realization of ETRS89.
     * Replaced by ETRF2014 (code 1206).
     */
    public const EPSG_EUROPEAN_TERRESTRIAL_REFERENCE_FRAME_2005 = 'urn:ogc:def:datum:EPSG::1204';

    /**
     * European Terrestrial Reference Frame 2014
     * Type: Geodetic
     * Extent: Europe - onshore and offshore: Albania; Andorra; Austria; Belgium; Bosnia and Herzegovina; Bulgaria;
     * Croatia; Cyprus; Czechia; Denmark; Estonia; Faroe Islands; Finland; France; Germany; Gibraltar; Greece; Hungary;
     * Ireland; Italy; Kosovo; Latvia; Liechtenstein; Lithuania; Luxembourg; Malta; Moldova; Monaco; Montenegro;
     * Netherlands; North Macedonia; Norway including Svalbard and Jan Mayen; Poland; Portugal; Romania; San Marino;
     * Serbia; Slovakia; Slovenia; Spain; Sweden; Switzerland; United Kingdom (UK) including Channel Islands and Isle
     * of Man; Vatican City State.
     * Coincides with ITRF2014 at epoch 1989.0. Fixed to the stable part of the Eurasian tectonic plate through 3
     * rotation rates derived from the ITRF2014 velocity field.
     * Defined by transformation from ITRF2014 (CT code 8366). Replaces ETRF2005 (datum code 1204). Technically
     * superior to ETRF2000 (datum code 1186).
     */
    public const EPSG_EUROPEAN_TERRESTRIAL_REFERENCE_FRAME_2014 = 'urn:ogc:def:datum:EPSG::1206';

    /**
     * European Terrestrial Reference System 1989 ensemble
     * Type: Ensemble
     * Extent: Europe - onshore and offshore: Albania; Andorra; Austria; Belgium; Bosnia and Herzegovina; Bulgaria;
     * Croatia; Cyprus; Czechia; Denmark; Estonia; Faroe Islands; Finland; France; Germany; Gibraltar; Greece; Hungary;
     * Ireland; Italy; Kosovo; Latvia; Liechtenstein; Lithuania; Luxembourg; Malta; Moldova; Monaco; Montenegro;
     * Netherlands; North Macedonia; Norway including Svalbard and Jan Mayen; Poland; Portugal; Romania; San Marino;
     * Serbia; Slovakia; Slovenia; Spain; Sweden; Switzerland; United Kingdom (UK) including Channel Islands and Isle
     * of Man; Vatican City State.
     * Has been realized through ETRF89, ETRF90, ETRF91, ETRF92, ETRF93, ETRF94, ETRF96, ETRF97, ETRF2000, ETRF2005 and
     * ETRF2014. This 'ensemble' covers any or all of these realizations without distinction.
     */
    public const EPSG_EUROPEAN_TERRESTRIAL_REFERENCE_SYSTEM_1989_ENSEMBLE = 'urn:ogc:def:datum:EPSG::6258';

    /**
     * European Vertical Reference Frame 2000
     * Type: Vertical
     * Extent: Europe - onshore - Andorra; Austria; Belgium; Bosnia and Herzegovina; Croatia; Czechia; Denmark;
     * Estonia; Finland; France - mainland; Germany; Gibraltar; Hungary; Italy - mainland and Sicily; Latvia;
     * Liechtenstein; Lithuania; Luxembourg; Netherlands; Norway; Poland; Portugal - mainland; Romania; San Marino;
     * Slovakia; Slovenia; Spain - mainland; Sweden; Switzerland; United Kingdom (UK) - Great Britain mainland; Vatican
     * City State.
     * Height at Normaal Amsterdams Peil (NAP) is zero, defined through height at UELN bench mark 13600 (52°22'53"N
     * 4°54'34"E) of 0.71599m. Datum at NAP is mean high tide in 1684.
     * Realized by geopotential numbers and Normal heights of the United European Levelling Network. Replaced by
     * EVRF2007 (datum code 5215).
     */
    public const EPSG_EUROPEAN_VERTICAL_REFERENCE_FRAME_2000 = 'urn:ogc:def:datum:EPSG::5129';

    /**
     * European Vertical Reference Frame 2000 Austria
     * Type: Vertical
     * Extent: Austria.
     * Geopotential numbers of the EVRF2000 (UELN95/98) node points in Austria converted to orthometric heights using a
     * digital surface model.
     * Geoid surface is smoother than the EVRF2000 quasigeoid.
     */
    public const EPSG_EUROPEAN_VERTICAL_REFERENCE_FRAME_2000_AUSTRIA = 'urn:ogc:def:datum:EPSG::1261';

    /**
     * European Vertical Reference Frame 2007
     * Type: Vertical
     * Extent: Europe - onshore - Andorra; Austria; Belgium; Bosnia and Herzegovina; Bulgaria; Croatia; Czechia;
     * Denmark; Estonia; Finland; France - mainland; Germany; Gibraltar, Hungary; Italy - mainland and Sicily; Latvia;
     * Liechtenstein; Lithuania; Luxembourg; Netherlands; Norway; Poland; Portugal - mainland; Romania; San Marino;
     * Slovakia; Slovenia; Spain - mainland; Sweden; Switzerland; United Kingdom (UK) - Great Britain mainland; Vatican
     * City State.
     * Least squares fit to 13 stations of the EVRF2000 solution. Reduced to epoch 2000.0 for Nordic countries using
     * the NKG2005LU uplift model.
     * Realized by geopotential numbers and Normal heights of the United European Levelling Network. Replaces EVRF2000
     * (datum code 5129). Replaced by EVRF2019 (datum code 1274).
     */
    public const EPSG_EUROPEAN_VERTICAL_REFERENCE_FRAME_2007 = 'urn:ogc:def:datum:EPSG::5215';

    /**
     * European Vertical Reference Frame 2007 Poland
     * Type: Vertical
     * Extent: Poland - onshore.
     * Origin: Mean North Sea Level at Amsterdam tide gauge. Normal heights obtained from adjustment of precise
     * leveling campaigns conducted during 1998 - 2012 reduced to epoch 2008.00.
     *
     * Uses Normal heights.
     */
    public const EPSG_EUROPEAN_VERTICAL_REFERENCE_FRAME_2007_POLAND = 'urn:ogc:def:datum:EPSG::1297';

    /**
     * European Vertical Reference Frame 2019
     * Type: Vertical
     * Extent: Europe - onshore - Andorra; Austria; Belarus; Belgium; Bosnia and Herzegovina; Bulgaria; Croatia;
     * Czechia; Denmark; Estonia; Finland; France - mainland; Germany; Gibraltar, Hungary; Italy - mainland and Sicily;
     * Latvia; Liechtenstein; Lithuania; Luxembourg; Netherlands; North Macedonia; Norway; Poland; Portugal - mainland;
     * Romania; Russia – west of approximately 60°E; San Marino; Slovakia; Slovenia; Spain - mainland; Sweden;
     * Switzerland; United Kingdom (UK) - Great Britain mainland; Ukraine; Vatican City State.
     * Fixed to geopotential values of 12 stable stations of the EVRF2007 solution. Re-adjusted in September 2020.
     * Reduced to epoch 2000.0 for Nordic countries and Russia using the NKG2016LU_lev uplift model and for Switzerland
     * using CHVRF15 velocities.
     * Following EVRS conventions, EVRF2019 is a zero-tide surface. Replaces EVRF2007 (datum code 5215).
     */
    public const EPSG_EUROPEAN_VERTICAL_REFERENCE_FRAME_2019 = 'urn:ogc:def:datum:EPSG::1274';

    /**
     * European Vertical Reference Frame 2019 mean tide
     * Type: Vertical
     * Extent: Europe - onshore - Andorra; Austria; Belarus; Belgium; Bosnia and Herzegovina; Bulgaria; Croatia;
     * Czechia; Denmark; Estonia; Finland; France - mainland; Germany; Gibraltar, Hungary; Italy - mainland and Sicily;
     * Latvia; Liechtenstein; Lithuania; Luxembourg; Netherlands; North Macedonia; Norway; Poland; Portugal - mainland;
     * Romania; Russia – west of approximately 60°E; San Marino; Slovakia; Slovenia; Spain - mainland; Sweden;
     * Switzerland; United Kingdom (UK) - Great Britain mainland; Ukraine; Vatican City State.
     * Derived from 2020-09 zero-tide EVRF2019 adjustment by Cmean = Czero + (0.28841*sin^2(phi)) +
     * (0.00195*sin^4(phi)) - 0.09722 - 0.08432 kgal.m. The offset of 0.08432 forces the mean-tide height to the
     * zero-tide height at the EVRF2000 origin in Amsterdam.
     * Mean-tide surface, describing how water flows. See EVRF2019 (datum code 1274) for zero-tide surface which is
     * consistent with ETRS conventions.
     */
    public const EPSG_EUROPEAN_VERTICAL_REFERENCE_FRAME_2019_MEAN_TIDE = 'urn:ogc:def:datum:EPSG::1287';

    /**
     * FNL22 Intermediate Reference Frame
     * Type: Geodetic
     * Extent: United Kingdom (UK) - on or related to the rail route from Inverness to Thurso and Wick.
     * Defined through the application of the FNL22 NTv2 transformation to ETRS89 as realized through OSNet v2009 CORS.
     * Created in 2022 to support intermediate CRS "FNL22" in the emulation of the FNL22 Snake map projection.
     */
    public const EPSG_FNL22_INTERMEDIATE_REFERENCE_FRAME = 'urn:ogc:def:datum:EPSG::1321';

    /**
     * Fahud
     * Type: Geodetic
     * Extent: Oman - mainland onshore.
     * Fundamental point: Station NO68-024 Fahud. Latitude: 22°17'31.182"N, longitude: 56°29'18.820"E (of Greenwich).
     * Replaced by PSD93 (code 6134).
     */
    public const EPSG_FAHUD = 'urn:ogc:def:datum:EPSG::6232';

    /**
     * Fahud Height Datum
     * Type: Vertical
     * Extent: Oman - mainland onshore.
     * Single MSL determination at Mina Al Fahal.
     * Based on reciprocal trigonometric heighting. Replaced by PHD93 Datum (code 5123) in 1993.
     */
    public const EPSG_FAHUD_HEIGHT_DATUM = 'urn:ogc:def:datum:EPSG::5124';

    /**
     * Fair Isle
     * Type: Vertical
     * Extent: United Kingdom (UK) - Great Britain - Scotland - Fair Isle onshore.
     * Orthometric heights.
     */
    public const EPSG_FAIR_ISLE = 'urn:ogc:def:datum:EPSG::5139';

    /**
     * Famagusta 1960
     * Type: Vertical
     * Extent: Cyprus - onshore.
     * Mean sea level at Famagusta Harbour.
     * Orthometric heights.
     */
    public const EPSG_FAMAGUSTA_1960 = 'urn:ogc:def:datum:EPSG::1148';

    /**
     * Fao
     * Type: Vertical
     * Extent: Iraq - onshore southeast; Iran - onshore northern Gulf coast and west bordering southeast Iraq.
     * Established by Hunting Surveys for IPC. In Iran replaced by Bandar Abbas (code 5150). At time of record creation
     * NIOC data in Ahwaz area still usually referenced to Fao. In Iraq replaced by Fao 1979 (code 1028).
     */
    public const EPSG_FAO = 'urn:ogc:def:datum:EPSG::5149';

    /**
     * Fao 1979
     * Type: Vertical
     * Extent: Iraq - onshore.
     * Average sea level at Fao during two-year period in mid/late 1970s.
     * Levelling network established by Polservice consortium.  Replaces Fao (datum code 5149) in Iraq.
     */
    public const EPSG_FAO_1979 = 'urn:ogc:def:datum:EPSG::1028';

    /**
     * Faroe Datum 1954
     * Type: Geodetic
     * Extent: Faroe Islands - onshore.
     * Astronomical observations at 3 points.
     * Replaced by ED50 in late 1970's for all purposes other than cadastre. Replaced by fk89 for cadastre.
     */
    public const EPSG_FAROE_DATUM_1954 = 'urn:ogc:def:datum:EPSG::6741';

    /**
     * Faroe Islands Vertical Reference 2009
     * Type: Vertical
     * Extent: Faroe Islands - onshore.
     * Mean Tidal Height System.
     */
    public const EPSG_FAROE_ISLANDS_VERTICAL_REFERENCE_2009 = 'urn:ogc:def:datum:EPSG::1059';

    /**
     * Fatu Iva 72
     * Type: Geodetic
     * Extent: French Polynesia - Marquesas Islands - Fatu Hiva.
     * Fundamental point: Latitude: 9°25'58.00"S, longitude: 138°55'06.25"W (of Greenwich).
     * Recomputed by IGN in 1972 using origin and observations of 1953-1955 Mission Hydrographique des Establissements
     * Francais d'Oceanie (MHEFO 55). Replaced by RGPF (datum code 6687).
     */
    public const EPSG_FATU_IVA_72 = 'urn:ogc:def:datum:EPSG::6688';

    /**
     * Fehmarnbelt Datum 2010
     * Type: Geodetic
     * Extent: Fehmarnbelt area of Denmark and Germany.
     * ITRF2005 at epoch 2010.14.
     * Defined through coordinates of four permanant GNSS stations.
     */
    public const EPSG_FEHMARNBELT_DATUM_2010 = 'urn:ogc:def:datum:EPSG::1078';

    /**
     * Fehmarnbelt Vertical Reference 2010
     * Type: Vertical
     * Extent: Fehmarnbelt area of Denmark and Germany.
     * Realised by precise levelling between tide gauges at Marienleuchte (Germany), Rodbyhavn (Denmark) and four
     * Fehmarnbelt project GNSS stations.
     */
    public const EPSG_FEHMARNBELT_VERTICAL_REFERENCE_2010 = 'urn:ogc:def:datum:EPSG::1079';

    /**
     * Fiji 1956
     * Type: Geodetic
     * Extent: Fiji - onshore - Vanua Levu, Taveuni, Viti Levu and and immediately adjacent smaller islands of Yasawa
     * and Kandavu groups.
     * Latitude origin was obtained astronomically at station Rasusuva = 17°49'03.13"S,  longitude origin was obtained
     * astronomically at station Suva = 178°25'35.835"E (of Greenwich).
     * For topographic mapping replaces Viti Levu 1912 and Vanua Levu 1915. Replaced by Fiji Geodetic Datum 1986.
     */
    public const EPSG_FIJI_1956 = 'urn:ogc:def:datum:EPSG::6721';

    /**
     * Fiji Geodetic Datum 1986
     * Type: Geodetic
     * Extent: Fiji - onshore. Includes Viti Levu, Vanua Levu, Taveuni, the Yasawa Group, the Kadavu Group, the Lau
     * Islands and Rotuma Islands.
     * NWL 9D coordinates of 6 stations on Vitu Levu and Vanua Levu.
     * Replaces Viti Levu 1912, Vanua Levu 1915 and Fiji 1956.
     */
    public const EPSG_FIJI_GEODETIC_DATUM_1986 = 'urn:ogc:def:datum:EPSG::6720';

    /**
     * Final Datum 1958
     * Type: Geodetic
     * Extent: Iran - Arwaz area and onshore Gulf coast west of 54°E, Lavan Island, offshore Balal field and South
     * Pars blocks 2 and 3.
     * Fundamental point: Maniyur.  Latitude: 31°23'59.19"N, longitude: 48°32'31.38"E (of Greenwich).
     * Network included in Nahrwan 1967 adjustment.
     */
    public const EPSG_FINAL_DATUM_1958 = 'urn:ogc:def:datum:EPSG::6132';

    /**
     * Flannan Isles
     * Type: Vertical
     * Extent: United Kingdom (UK) - Great Britain - Scotland - Flannan Isles onshore.
     * Orthometric heights.
     */
    public const EPSG_FLANNAN_ISLES = 'urn:ogc:def:datum:EPSG::5146';

    /**
     * Fort Marigot
     * Type: Geodetic
     * Extent: Guadeloupe - onshore - St Martin and St Barthélemy islands.
     * Replaced by RRAF 1991 (datum code 1047).
     */
    public const EPSG_FORT_MARIGOT = 'urn:ogc:def:datum:EPSG::6621';

    /**
     * Foula
     * Type: Vertical
     * Extent: United Kingdom (UK) - Great Britain - Scotland - Foula onshore.
     * Orthometric heights.
     */
    public const EPSG_FOULA = 'urn:ogc:def:datum:EPSG::5141';

    /**
     * Fuerteventura
     * Type: Vertical
     * Extent: Spain - Canary Islands - Fuerteventura onshore.
     * Mean Sea Level at Puerto del Rosario harbour between 1999-09-08 and 2000-12-31.
     * Orthometric heights.
     */
    public const EPSG_FUERTEVENTURA = 'urn:ogc:def:datum:EPSG::1279';

    /**
     * GBK19 Intermediate Reference Frame
     * Type: Geodetic
     * Extent: United Kingdom (UK) - on or related to the rail route from Glasgow to Kilmarnock via Barrhead and the
     * branch to East Kilbride.
     * Defined through the application of the GBK19 NTv2 transformation (code 9454) to ETRS89 as realized through OSNet
     * v2009 CORS.
     * Created in 2020 to support intermediate CRS "GBK19-IRF" in the emulation of the combined GBK19 Snake map
     * projection.
     */
    public const EPSG_GBK19_INTERMEDIATE_REFERENCE_FRAME = 'urn:ogc:def:datum:EPSG::1289';

    /**
     * GNTRANS
     * Type: Vertical
     * Extent: Germany - onshore - states of Baden-Wurtemberg, Bayern, Berlin, Brandenburg, Bremen, Hamburg, Hessen,
     * Mecklenburg-Vorpommern, Niedersachsen, Nordrhein-Westfalen, Rheinland-Pfalz, Saarland, Sachsen, Sachsen-Anhalt,
     * Schleswig-Holstein, Thuringen.
     * Surface defined by the EGG97 quasi-geoid model modified in GNTRANS to achieve absolute position optimised for
     * use with DB_REF.
     * Implemented in GNTRANS. The GNTRANS height surface is available only through the GNTRANS application. Replaced
     * by the GNTRANS2016 height surface (datum code 1318).
     */
    public const EPSG_GNTRANS = 'urn:ogc:def:datum:EPSG::1316';

    /**
     * GNTRANS2016
     * Type: Vertical
     * Extent: Germany - onshore - states of Baden-Wurtemberg, Bayern, Berlin, Brandenburg, Bremen, Hamburg, Hessen,
     * Mecklenburg-Vorpommern, Niedersachsen, Nordrhein-Westfalen, Rheinland-Pfalz, Saarland, Sachsen, Sachsen-Anhalt,
     * Schleswig-Holstein, Thuringen.
     * Surface defined by the GCG2016 quasi-geoid model applied to ETRS89.
     * Approximates the national DHHN2016 levelling surface to around 1cm in lowlands and 2cm in high mountains, but
     * unlike DHHN2016 it is defined by the GCG2016 geoid model. Like DHHN2016, uses Normal heights in the mean tide
     * system.
     */
    public const EPSG_GNTRANS2016 = 'urn:ogc:def:datum:EPSG::1318';

    /**
     * Gambia
     * Type: Geodetic
     * Extent: Gambia - onshore.
     */
    public const EPSG_GAMBIA = 'urn:ogc:def:datum:EPSG::1139';

    /**
     * Gan 1970
     * Type: Geodetic
     * Extent: Maldives - onshore.
     * In some references incorrectly named "Gandajika 1970". See datum code 6685.
     */
    public const EPSG_GAN_1970 = 'urn:ogc:def:datum:EPSG::6684';

    /**
     * Garoua
     * Type: Geodetic
     * Extent: Cameroon - Garoua area.
     * Fundamental point: IGN astronomical station and benchmark no. 16 at Tongo. Latitude 8°55'08.74"N, longitude
     * 13°30'43.19"E (of Greenwich).
     */
    public const EPSG_GAROUA = 'urn:ogc:def:datum:EPSG::6197';

    /**
     * Gebrauchshohen ADRIA
     * Type: Vertical
     * Extent: Austria.
     * Reference point Hutbiegl defined relative to mean sea level at Trieste in 1875.
     * Normal-orthometric heights.
     */
    public const EPSG_GEBRAUCHSHOHEN_ADRIA = 'urn:ogc:def:datum:EPSG::5176';

    /**
     * Genoa 1942
     * Type: Vertical
     * Extent: Italy - mainland (including San Marino and Vatican City State) and Sicily.
     * Mean Sea Level at Genoa (Ponte Morosini) 1937-1946.
     * Orthometric heights.
     */
    public const EPSG_GENOA_1942 = 'urn:ogc:def:datum:EPSG::1051';

    /**
     * Geocentric Datum Brunei Darussalam 2009
     * Type: Geodetic
     * Extent: Brunei Darussalam - onshore and offshore.
     * ITRF2005 at epoch 2009.45
     * Replaces use of Timbalai from July 2009.
     */
    public const EPSG_GEOCENTRIC_DATUM_BRUNEI_DARUSSALAM_2009 = 'urn:ogc:def:datum:EPSG::1056';

    /**
     * Geocentric Datum of Australia 1994
     * Type: Geodetic
     * Extent: Australia including Lord Howe Island, Macquarie Island, Ashmore and Cartier Islands, Christmas Island,
     * Cocos (Keeling) Islands, Norfolk Island. All onshore and offshore.
     * ITRF92 at epoch 1994.0.
     */
    public const EPSG_GEOCENTRIC_DATUM_OF_AUSTRALIA_1994 = 'urn:ogc:def:datum:EPSG::6283';

    /**
     * Geocentric Datum of Australia 2020
     * Type: Geodetic
     * Extent: Australia including Lord Howe Island, Macquarie Island, Ashmore and Cartier Islands, Christmas Island,
     * Cocos (Keeling) Islands, Norfolk Island. All onshore and offshore.
     * ITRF2014 at epoch 2020.0.
     */
    public const EPSG_GEOCENTRIC_DATUM_OF_AUSTRALIA_2020 = 'urn:ogc:def:datum:EPSG::1168';

    /**
     * Geocentric datum of Korea
     * Type: Geodetic
     * Extent: Republic of Korea (South Korea) - onshore and offshore.
     * ITRF2000 at epoch 2002.0.
     */
    public const EPSG_GEOCENTRIC_DATUM_OF_KOREA = 'urn:ogc:def:datum:EPSG::6737';

    /**
     * Geodetic Datum of 1965
     * Type: Geodetic
     * Extent: Ireland - onshore. United Kingdom (UK) - Northern Ireland (Ulster) - onshore.
     * Adjusted to best mean fit 9 stations of the OSNI 1952 primary adjustment in Northern Ireland plus the 1965
     * values of 3 stations in the Republic of Ireland.
     * Differences from the 1965 adjustment (datum code 6299) are: average difference in Eastings 0.092m; average
     * difference in Northings 0.108m; maximum vector difference 0.548m.
     */
    public const EPSG_GEODETIC_DATUM_OF_1965 = 'urn:ogc:def:datum:EPSG::6300';

    /**
     * Geodetic Datum of Malaysia 2000
     * Type: Geodetic
     * Extent: Malaysia - onshore and offshore. Includes peninsular Malayasia, Sabah and Sarawak.
     * ITRF2000, epoch 2000.0.
     * Replaces all older Malaysian datums.
     */
    public const EPSG_GEODETIC_DATUM_OF_MALAYSIA_2000 = 'urn:ogc:def:datum:EPSG::6742';

    /**
     * Geodezicheskaya Sistema Koordinat 2011
     * Type: Geodetic
     * Extent: Russian Federation - onshore and offshore.
     * Coordinates of the Russian fundamental astronomic-geodetic network (about 50 stations) at epoch 2011.0.
     */
    public const EPSG_GEODEZICHESKAYA_SISTEMA_KOORDINAT_2011 = 'urn:ogc:def:datum:EPSG::1159';

    /**
     * Gisborne 1926
     * Type: Vertical
     * Extent: New Zealand - North Island - Gisborne vertical CRS area.
     * MSL at Gisborne harbour 1926.
     */
    public const EPSG_GISBORNE_1926 = 'urn:ogc:def:datum:EPSG::5160';

    /**
     * Gran Canaria
     * Type: Vertical
     * Extent: Spain - Canary Islands - Gran Canaria onshore.
     * Mean Sea Level at Las Palmas de Gran Canaria harbour between 1992 and 1997.
     * Orthometric heights.
     */
    public const EPSG_GRAN_CANARIA = 'urn:ogc:def:datum:EPSG::1280';

    /**
     * Grand Cayman Geodetic Datum 1959
     * Type: Geodetic
     * Extent: Cayman Islands - Grand Cayman.
     * Fundamental point: GC1. Latitude: 19°17'54.43"N, longitude: 81°22'37.17"W (of Greenwich).
     * Replaced by CIGD11 (datum code 1100).
     */
    public const EPSG_GRAND_CAYMAN_GEODETIC_DATUM_1959 = 'urn:ogc:def:datum:EPSG::6723';

    /**
     * Grand Cayman Vertical Datum 1954
     * Type: Vertical
     * Extent: Cayman Islands - Grand Cayman.
     */
    public const EPSG_GRAND_CAYMAN_VERTICAL_DATUM_1954 = 'urn:ogc:def:datum:EPSG::1097';

    /**
     * Grand Comoros
     * Type: Geodetic
     * Extent: Comoros - Njazidja (Grande Comore).
     * Fundamental point: M'Tsaoueni.  Latitude: 11°28'32.200"S, longitude: 43°15'42.315"E (of Greenwich).
     */
    public const EPSG_GRAND_COMOROS = 'urn:ogc:def:datum:EPSG::6646';

    /**
     * Greek
     * Type: Geodetic
     * Extent: Greece - onshore.
     * Fundamental point: Athens Observatory. Latitude 37°58'20.132"N, longitude 23°42'58.815"E (of Greenwich)
     * See geodetic datum alias 6404.  Used as basis of topographic mapping based on Hatt projection. Replaced by
     * GGRS87 (code 6121).
     */
    public const EPSG_GREEK = 'urn:ogc:def:datum:EPSG::6120';

    /**
     * Greek (Athens)
     * Type: Geodetic
     * Extent: Greece - onshore.
     * Fundamental point: Athens Observatory. Latitude 37°58'20.132"N, longitude 0°E (of Athens).
     * See geodetic datum alias 6404.  Used as basis of topographic mapping based on Hatt projection.
     */
    public const EPSG_GREEK_ATHENS = 'urn:ogc:def:datum:EPSG::6815';

    /**
     * Greek Geodetic Reference System 1987
     * Type: Geodetic
     * Extent: Greece - onshore.
     * Fundamental point: Dionysos. Latitude 38°04'33.8"N, longitude 23°55'51.0"E of Greenwich; geoid height 7.0 m.
     * Replaced (old) Greek datum.  Oil industry work based on ED50.
     */
    public const EPSG_GREEK_GEODETIC_REFERENCE_SYSTEM_1987 = 'urn:ogc:def:datum:EPSG::6121';

    /**
     * Greenland 1996
     * Type: Geodetic
     * Extent: Greenland - onshore and offshore.
     * ITRF94 at epoch 1996.62
     * Replaces Ammassalik 1958, Qornoq 1927 and Scoresbysund 1952.
     */
    public const EPSG_GREENLAND_1996 = 'urn:ogc:def:datum:EPSG::6747';

    /**
     * Greenland Vertical Reference 2000
     * Type: Vertical
     * Extent: Greenland - onshore and offshore between 59°N and 84°N and west of 10°W.
     * Defined through the gravimetric geoid 2000 model locally aligned with MSL at a number of sites.
     * Orthometric heights. Replaced by GVR2016.
     */
    public const EPSG_GREENLAND_VERTICAL_REFERENCE_2000 = 'urn:ogc:def:datum:EPSG::1199';

    /**
     * Greenland Vertical Reference 2016
     * Type: Vertical
     * Extent: Greenland - onshore and offshore between 58°N and 85°N and west of 7°W.
     * Defined through the gravimetric geoid 2016 model locally aligned to MSL as measured at Nuuk during the 1960s.
     * Orthometric heights. Replaces GVR2000.
     */
    public const EPSG_GREENLAND_VERTICAL_REFERENCE_2016 = 'urn:ogc:def:datum:EPSG::1200';

    /**
     * Grenada 1953
     * Type: Geodetic
     * Extent: Grenada and southern Grenadine Islands - onshore.
     * Fundamental point: station GS8, Sante Marie.
     */
    public const EPSG_GRENADA_1953 = 'urn:ogc:def:datum:EPSG::6603';

    /**
     * Guadeloupe 1948
     * Type: Geodetic
     * Extent: Guadeloupe - onshore - Basse-Terre, Grande-Terre, La Desirade, Marie-Galante, Les Saintes.
     * Replaced by RRAF 1991 (datum code 1047).
     */
    public const EPSG_GUADELOUPE_1948 = 'urn:ogc:def:datum:EPSG::6622';

    /**
     * Guadeloupe 1951
     * Type: Vertical
     * Extent: Guadeloupe - onshore - Basse-Terre and Grande-Terre.
     * Mean sea level July 1947 to June 1948 at Pointe-Fouillole (Pointe-à-Pitre harbour). Origin = marker AO'-12 with
     * height of 1.917m above msl.
     * Orthometric heights. Replaced by Guadeloupe 1988 (datum code 5155). Guadeloupe 1951 height 0.00m is 0.629m above
     * 1947-48 sounding datum.
     */
    public const EPSG_GUADELOUPE_1951 = 'urn:ogc:def:datum:EPSG::5193';

    /**
     * Guadeloupe 1988
     * Type: Vertical
     * Extent: Guadeloupe - onshore - Basse-Terre and Grande-Terre.
     * Mean sea level July 1947 to June 1948 at Pointe-Fouillole (Pointe-à-Pitre harbour). Origin = marker GO-7
     * (formerly AO'-5) with defined height of 2.67m above msl adopted from 1951 value. Guadeloupe 1988 height 0.00m is
     * 0.46m above 1984 sounding datum.
     * Orthometric heights. Replaces Guadeloupe 1951 (datum code 5193).
     */
    public const EPSG_GUADELOUPE_1988 = 'urn:ogc:def:datum:EPSG::5155';

    /**
     * Guam 1963
     * Type: Geodetic
     * Extent: Guam - onshore. Northern Mariana Islands - onshore.
     * Fundamental point: Tagcha. Latitude: 13°22'38.49"N, longitude: 144°45'51.56"E (of Greenwich).
     * Replaced by NAD83(HARN).
     */
    public const EPSG_GUAM_1963 = 'urn:ogc:def:datum:EPSG::6675';

    /**
     * Guam Vertical Datum of 1963
     * Type: Vertical
     * Extent: Guam - onshore.
     * Mean sea level at Apra harbor, Guam, 1949-1962. Benchmark NO 5 1949 = 0.599m.
     * Replaced by Guam vertical datum of 2004 (datum code 1126).
     */
    public const EPSG_GUAM_VERTICAL_DATUM_OF_1963 = 'urn:ogc:def:datum:EPSG::1122';

    /**
     * Guam Vertical Datum of 2004
     * Type: Vertical
     * Extent: Guam - onshore.
     * Mean sea level at Apra harbor, Guam. Benchmark 1630000 TIDAL 4 = 2.170m relative to US National Tidal Datum
     * Epoch 1983-2001. MSL is 0.419m above MLLW and the BM is 2.589m above MLLW.
     * Replaces Guam Vertical Datum of 1963 (datum code 1122).
     */
    public const EPSG_GUAM_VERTICAL_DATUM_OF_2004 = 'urn:ogc:def:datum:EPSG::1126';

    /**
     * Gulshan 303
     * Type: Geodetic
     * Extent: Bangladesh - onshore and offshore.
     * Gulshan garden, Dhaka.
     * Network of more than 140 control points observed and adjusted in 1995 by Japan International Cooperation Agency
     * (JICA).
     */
    public const EPSG_GULSHAN_303 = 'urn:ogc:def:datum:EPSG::6682';

    /**
     * Gunung Segara
     * Type: Geodetic
     * Extent: Indonesia - Kalimantan - onshore east coastal area including Mahakam delta coastal and offshore shelf
     * areas.
     * Station P5 (Gunung Segara). Latitude 0°32'12.83"S, longitude 117°08'48.47"E (of Greenwich).
     */
    public const EPSG_GUNUNG_SEGARA = 'urn:ogc:def:datum:EPSG::6613';

    /**
     * Gunung Segara (Jakarta)
     * Type: Geodetic
     * Extent: Indonesia - Kalimantan - onshore east coastal area including Mahakam delta coastal and offshore shelf
     * areas.
     * Station P5 (Gunung Segara) 0°32'12.83"S, 117°08'48.47"E (of Greenwich). Longitude 8°20'20.68"E (of Jakarta).
     */
    public const EPSG_GUNUNG_SEGARA_JAKARTA = 'urn:ogc:def:datum:EPSG::6820';

    /**
     * Gusterberg (Ferro)
     * Type: Geodetic
     * Extent: Austria - Upper Austria and Salzburg provinces. Czechia - Bohemia.
     * Fundamental point: Gusterberg. Latitude: 48°02'18.47"N, longitude: 31°48'15.05"E (of Ferro).
     */
    public const EPSG_GUSTERBERG_FERRO = 'urn:ogc:def:datum:EPSG::1188';

    /**
     * HS2 Intermediate Reference Frame
     * Type: Geodetic
     * Extent: United Kingdom (UK) - HS2 phases 1 and 2a railway corridor from London to Birmingham, Lichfield and
     * Crewe.
     * Defined through application of the HS2TN02 transformation to ETRS89 as realized through OSNet v2001 CORS.
     * Subsequently realized through application of the HS2TN15 transformation to ETRS89 as realized through OSNet
     * v2009 CORS.
     * Created to support intermediate CRS "HS2-IRF" in the emulation of the HS2P1+14 Snake map projection.
     */
    public const EPSG_HS2_INTERMEDIATE_REFERENCE_FRAME = 'urn:ogc:def:datum:EPSG::1264';

    /**
     * HS2 Vertical Reference Frame
     * Type: Vertical
     * Extent: United Kingdom (UK) - HS2 phases 1 and 2a railway corridor from London to Birmingham, Lichfield and
     * Crewe.
     * Equivalent to Ordnance Datum Newlyn as realized through OSNet v2001 and OSGM02.
     * After introduction of OSNet v2009 CORS, OSTN15 and the OSGM15 geoid model, the HS2 VRF is maintained equivalent
     * to OSNet v2001 and OSGM02 through HS2GM15 (code 9304).
     */
    public const EPSG_HS2_VERTICAL_REFERENCE_FRAME = 'urn:ogc:def:datum:EPSG::1265';

    /**
     * HULLEE13 Intermediate Reference Frame
     * Type: Geodetic
     * Extent: United Kingdom (UK) - on or related to the rail route from the Morley tunnel through Leeds to Hull.
     * Defined through the application of the HULLEE13 NTv2 transformation to ETRS89 as realized through OSNet v2009
     * CORS.
     * Created in 2022 to support intermediate CRS "HULLEE13-IRF" in the emulation of the HULLEE13 Snake map
     * projection.
     */
    public const EPSG_HULLEE13_INTERMEDIATE_REFERENCE_FRAME = 'urn:ogc:def:datum:EPSG::1317';

    /**
     * Ha Tien 1960
     * Type: Vertical
     * Extent: Cambodia - mainland onshore; Vietnam - mainland onshore.
     * In Vietnam replaced by Hon Dau in 1992.
     */
    public const EPSG_HA_TIEN_1960 = 'urn:ogc:def:datum:EPSG::5125';

    /**
     * Hanoi 1972
     * Type: Geodetic
     * Extent: Vietnam - onshore.
     */
    public const EPSG_HANOI_1972 = 'urn:ogc:def:datum:EPSG::6147';

    /**
     * Hartebeesthoek94
     * Type: Geodetic
     * Extent: Eswatini (Swaziland); Lesotho; South Africa - onshore and offshore.
     * Coincident with ITRF91 at epoch 1994.0 at Hartebeesthoek astronomical observatory near Pretoria.
     * Replaces Cape datum (code 6222).
     */
    public const EPSG_HARTEBEESTHOEK94 = 'urn:ogc:def:datum:EPSG::6148';

    /**
     * Helle 1954
     * Type: Geodetic
     * Extent: Jan Mayen - onshore.
     */
    public const EPSG_HELLE_1954 = 'urn:ogc:def:datum:EPSG::6660';

    /**
     * Helsinki 1943
     * Type: Vertical
     * Extent: Finland - onshore mainland south of approximately 66°N.
     * MSL at Helsinki during 1943.
     * Uses orthometric heights. Effect of the land uplift during the 2nd national  levelling was not taken into
     * account. Replaced by N60 (datum code 5116).
     */
    public const EPSG_HELSINKI_1943 = 'urn:ogc:def:datum:EPSG::1213';

    /**
     * Helsinki 1960
     * Type: Vertical
     * Extent: Finland - onshore.
     * MSL at Helsinki during 1960.
     * Uses orthometric heights. Replaced by N2000 (datum code 1030).
     */
    public const EPSG_HELSINKI_1960 = 'urn:ogc:def:datum:EPSG::5116';

    /**
     * Herat North
     * Type: Geodetic
     * Extent: Afghanistan.
     * Fundamental point: Herat North. Latitude: 34°23'09.08"N, longitude: 64°10'58.94"E (of Greenwich).
     */
    public const EPSG_HERAT_NORTH = 'urn:ogc:def:datum:EPSG::6255';

    /**
     * High Water
     * Type: Vertical
     * Extent: World.
     * The highest level reached at a place by the water surface in one tidal cycle. When used on inland (non-tidal)
     * waters it is generally defined as a level which the daily mean water level exceeds less than 5% of the time.
     * Users are advised to not use this generic vertical datum but to define explicit realizations of high water by
     * specifying location and epoch, for instance "High water at xxx during yyyy-yyyy".
     */
    public const EPSG_HIGH_WATER = 'urn:ogc:def:datum:EPSG::1094';

    /**
     * Higher High Water Large Tide
     * Type: Vertical
     * Extent: World.
     * The average of the highest high waters, one from each of 19 years of observations.
     * Users are advised to not use this generic vertical datum but to define explicit realizations of HHWLT by
     * specifying location and epoch, for instance "HHWLT at xxx during yyyy-yyyy".
     */
    public const EPSG_HIGHER_HIGH_WATER_LARGE_TIDE = 'urn:ogc:def:datum:EPSG::1084';

    /**
     * Highest Astronomical Tide
     * Type: Vertical
     * Extent: World.
     * The highest tide level which can be predicted to occur under average meteorological conditions and under any
     * combination of astronomical conditions.
     * Users are advised to not use this generic vertical datum but to define explicit realizations of HAT by
     * specifying location and epoch, for instance "HAT at xxx during yyyy-yyyy".
     */
    public const EPSG_HIGHEST_ASTRONOMICAL_TIDE = 'urn:ogc:def:datum:EPSG::1082';

    /**
     * Hito XVIII 1963
     * Type: Geodetic
     * Extent: Chile - Tierra del Fuego, onshore; Argentina - Tierra del Fuego, onshore and offshore Atlantic west of
     * 66°W.
     * Chile-Argentina boundary survey.
     * Used in Tierra del Fuego.
     */
    public const EPSG_HITO_XVIII_1963 = 'urn:ogc:def:datum:EPSG::6254';

    /**
     * Hjorsey 1955
     * Type: Geodetic
     * Extent: Iceland - mainland.
     * Fundamental point:  Latitude: 64°31'29.26"N, longitude: 22°22'05.84"W (of Greenwich).
     */
    public const EPSG_HJORSEY_1955 = 'urn:ogc:def:datum:EPSG::6658';

    /**
     * Hon Dau 1992
     * Type: Vertical
     * Extent: Vietnam - mainland onshore.
     * Replaces Ha Tien in Vietnam.
     */
    public const EPSG_HON_DAU_1992 = 'urn:ogc:def:datum:EPSG::5126';

    /**
     * Hong Kong 1963
     * Type: Geodetic
     * Extent: China - Hong Kong - onshore and offshore.
     * Fundamental point: Trig "Zero", 38.4 feet south along the transit circle of the Kowloon Observatory. Latitude
     * 22°18'12.82"N, longitude 114°10'18.75"E (of Greenwich).
     * Replaced by Hong Kong 1963(67) for military purposes only in 1967.  Replaced by Hong Kong 1980.
     */
    public const EPSG_HONG_KONG_1963 = 'urn:ogc:def:datum:EPSG::6738';

    /**
     * Hong Kong 1963(67)
     * Type: Geodetic
     * Extent: China - Hong Kong - onshore and offshore.
     * Fundamental point: Trig "Zero", 38.4 feet south along the transit circle of the Kowloon Observatory. Latitude
     * 22°18'12.82"N, longitude 114°10'18.75"E (of Greenwich).
     * Replaces Hong Kong 1963 for military purposes only in 1967.  Replaced by Hong Kong 1980.
     */
    public const EPSG_HONG_KONG_1963_67 = 'urn:ogc:def:datum:EPSG::6739';

    /**
     * Hong Kong 1980
     * Type: Geodetic
     * Extent: China - Hong Kong - onshore and offshore.
     * Fundamental point: Trig "Zero", 38.4 feet south along the transit circle of the Kowloon Observatory. Latitude
     * 22°18'12.82"N, longitude 114°10'18.75"E (of Greenwich).
     * Replaces Hong Kong 1963 and Hong Kong 1963(67).
     */
    public const EPSG_HONG_KONG_1980 = 'urn:ogc:def:datum:EPSG::6611';

    /**
     * Hong Kong Chart Datum
     * Type: Vertical
     * Extent: China - Hong Kong - offshore.
     * Approximates to Lowest Astronomic Tide level (LAT).
     * Chart datum is 0.15 metres below Hong Kong Principal Datum (code 5135) and 1.38m below MSL at Quarry Bay.
     */
    public const EPSG_HONG_KONG_CHART_DATUM = 'urn:ogc:def:datum:EPSG::5136';

    /**
     * Hong Kong Geodetic
     * Type: Geodetic
     * Extent: China - Hong Kong - onshore and offshore.
     * ITRF96 at epoch 1998.121
     * Locally sometimes referred to as ITRF96 or WGS 84, these are not strictly correct as it applies only at epoch
     * 1998.121 and ignores subsequent tectonic plate motion.
     */
    public const EPSG_HONG_KONG_GEODETIC = 'urn:ogc:def:datum:EPSG::1209';

    /**
     * Hong Kong Principal Datum
     * Type: Vertical
     * Extent: China - Hong Kong - onshore.
     * 1.23m below the mean of 19 years (1965-83) observations of tide levels at North Point, Victoria Harbour.
     */
    public const EPSG_HONG_KONG_PRINCIPAL_DATUM = 'urn:ogc:def:datum:EPSG::5135';

    /**
     * Horta
     * Type: Vertical
     * Extent: Portugal - central Azores - Faial island onshore.
     * Mean Sea Level during 1935 at Horta.
     * Orthometric heights.
     */
    public const EPSG_HORTA = 'urn:ogc:def:datum:EPSG::1104';

    /**
     * Hu Tzu Shan 1950
     * Type: Geodetic
     * Extent: Taiwan, Republic of China - onshore - Taiwan Island, Penghu (Pescadores) Islands.
     * Fundamental point: Hu Tzu Shan. Latitude: 23°58'32.34"N, longitude: 120°58'25.975"E (of Greenwich).
     */
    public const EPSG_HU_TZU_SHAN_1950 = 'urn:ogc:def:datum:EPSG::6236';

    /**
     * Huahine SAU 2001
     * Type: Vertical
     * Extent: French Polynesia - Society Islands - Huahine.
     * Fundamental benchmark: SHOM B3
     * Included as part of NGPF - see datum code 5195.
     */
    public const EPSG_HUAHINE_SAU_2001 = 'urn:ogc:def:datum:EPSG::5200';

    /**
     * Hungarian Datum 1909
     * Type: Geodetic
     * Extent: Hungary.
     * Fundamental point not given in information source, but presumably Szolohegy which is origin of later HD72.
     * Replaced earlier HD1863 adjustment also on Bessel ellipsoid. Both HD1863 and HD1909 were originally on Ferro
     * Prime Meridian but subsequently converted to Greenwich. Replaced by HD72 (datum code 6237).
     */
    public const EPSG_HUNGARIAN_DATUM_1909 = 'urn:ogc:def:datum:EPSG::1024';

    /**
     * Hungarian Datum 1972
     * Type: Geodetic
     * Extent: Hungary.
     * Fundamental point: Szolohegy. Latitude: 47°17'32,6156"N, longitude 19°36'09.9865"E (of Greenwich); geoid
     * height 6.56m.
     * Replaced Hungarian Datum 1909 (EPSG datum code 1024).
     */
    public const EPSG_HUNGARIAN_DATUM_1972 = 'urn:ogc:def:datum:EPSG::6237';

    /**
     * IG05 Intermediate Datum
     * Type: Geodetic
     * Extent: Israel - onshore; Palestine Territory - onshore.
     * Defined by transformation from IGD05 at epoch 2004.75.
     */
    public const EPSG_IG05_INTERMEDIATE_DATUM = 'urn:ogc:def:datum:EPSG::1142';

    /**
     * IG05/12 Intermediate Datum
     * Type: Geodetic
     * Extent: Israel - onshore; Palestine Territory - onshore.
     * Defined by transformation from IGD05/12 at epoch 2012.00.
     */
    public const EPSG_IG05_12_INTERMEDIATE_DATUM = 'urn:ogc:def:datum:EPSG::1144';

    /**
     * IGC 1962 Arc of the 6th Parallel South
     * Type: Geodetic
     * Extent: The Democratic Republic of the Congo (Zaire) - adjacent to 6th parallel south traverse.
     * Coordinates of 3 stations determined with respect to Arc 1950: Mulungu 4°47'39.2325"S, 29°59'37.5864"E;
     * Nyakawembe 4°14'57.3618"S, 29°42'52.8032"E; Kavula 4°35'15.8634"S, 29°41'14.2693"E (all longitude w.r.t.
     * Greenwich).
     */
    public const EPSG_IGC_1962_ARC_OF_THE_6TH_PARALLEL_SOUTH = 'urn:ogc:def:datum:EPSG::6697';

    /**
     * IGN 1962 Kerguelen
     * Type: Geodetic
     * Extent: French Southern Territories - Kerguelen onshore.
     * K0 1949.
     */
    public const EPSG_IGN_1962_KERGUELEN = 'urn:ogc:def:datum:EPSG::6698';

    /**
     * IGN 1966
     * Type: Vertical
     * Extent: French Polynesia - Society Islands - Tahiti.
     * Fundamental benchmark: RN501
     * Included as part of NGPF - see datum code 5195.
     */
    public const EPSG_IGN_1966 = 'urn:ogc:def:datum:EPSG::5196';

    /**
     * IGN 1988 LS
     * Type: Vertical
     * Extent: Guadeloupe - onshore - Les Saintes.
     * Mean sea level 1984 at Terre de Haut. Origin = marker O de -5 with defined height of 1.441m above msl. IGN 1988
     * LS height 0.00m is 0.46m above 1987 sounding datum; this approximately corresponds with msl at Pointe-à-Pitre
     * (see datum code 5155, CRS 5757).
     * Orthometric heights.
     */
    public const EPSG_IGN_1988_LS = 'urn:ogc:def:datum:EPSG::5210';

    /**
     * IGN 1988 MG
     * Type: Vertical
     * Extent: Guadeloupe - onshore - Marie-Galante.
     * Mean sea level 1987 at Grand-Bourg. Origin = marker M0-I with defined height of 0.832m above msl. IGN 1988 MG
     * height 0.00m is 0.46m above 1987 sounding datum; this approximately corresponds with msl at Pointe-à-Pitre (see
     * datum code 5155, CRS code 5757).
     * Orthometric heights.
     */
    public const EPSG_IGN_1988_MG = 'urn:ogc:def:datum:EPSG::5211';

    /**
     * IGN 1988 SB
     * Type: Vertical
     * Extent: Guadeloupe - onshore - St Barthelemy island.
     * Mean sea level 1988 at port of Gustavia. Origin = marker A.ef-2 with defined height of 0.621m above msl. IGN
     * 1988 SB height 0.00m deduced to be 0.201m above mean sea level at Pointe-à-Pitre.
     * Orthometric heights.
     */
    public const EPSG_IGN_1988_SB = 'urn:ogc:def:datum:EPSG::5213';

    /**
     * IGN 1988 SM
     * Type: Vertical
     * Extent: Guadeloupe - onshore - St Martin island.
     * Mean sea level 1949-1950 deduced at Fort Marigot. Origin = marker AS-13 with defined height of 6.990m above msl.
     * IGN 1988 SM height 0.00m deduced to be 0.41m above sounding datum.
     * Orthometric heights.
     */
    public const EPSG_IGN_1988_SM = 'urn:ogc:def:datum:EPSG::5214';

    /**
     * IGN 1992 LD
     * Type: Vertical
     * Extent: Guadeloupe - onshore - La Desirade.
     * Mean sea level at Pointe-à-Pitre. Origin = marker A with defined height of 0.792m above msl. IGN 1992 LD height
     * 0.00m is 0.629m above sounding datum at Pointe-à-Pitre.
     * Orthometric heights. Replaced by IGN 2008 LD (datum code 1250).
     */
    public const EPSG_IGN_1992_LD = 'urn:ogc:def:datum:EPSG::5212';

    /**
     * IGN 2008 LD
     * Type: Vertical
     * Extent: Guadeloupe - onshore - La Desirade.
     * Mean sea level at Pointe-à-Pitre. Origin = IGN Marker 20A with defined height of 0.50 m above msl of 1987.
     * Orthometric heights. Replaces IGN 1992 LD (datum code 5212).
     */
    public const EPSG_IGN_2008_LD = 'urn:ogc:def:datum:EPSG::1250';

    /**
     * IGN Astro 1960
     * Type: Geodetic
     * Extent: Mauritania - onshore.
     * Realised through a set of independent astronomically-positioned points.
     * Observed during 1959-1960. Independent points not connected through a network. Relative accuracy estimated at
     * 50-100m. Replaced by Mauritania 1999 (datum code 6702).
     */
    public const EPSG_IGN_ASTRO_1960 = 'urn:ogc:def:datum:EPSG::6700';

    /**
     * IGN53 Mare
     * Type: Geodetic
     * Extent: New Caledonia - Loyalty Islands - Mare.
     * South-east end of the La Roche base.
     */
    public const EPSG_IGN53_MARE = 'urn:ogc:def:datum:EPSG::6641';

    /**
     * IGN56 Lifou
     * Type: Geodetic
     * Extent: New Caledonia - Loyalty Islands - Lifou.
     * South end of the Goume base.
     */
    public const EPSG_IGN56_LIFOU = 'urn:ogc:def:datum:EPSG::6633';

    /**
     * IGN63 Hiva Oa
     * Type: Geodetic
     * Extent: French Polynesia - Marquesas Islands - Hiva Oa and Tahuata.
     * Fundamental point: Atuona. Latitude: 9°48'27.20"S, longitude: 139°02'15.45"W (of Greenwich).
     * Replaced by RGPF (datum code 6687).
     */
    public const EPSG_IGN63_HIVA_OA = 'urn:ogc:def:datum:EPSG::6689';

    /**
     * IGN72 Grande Terre
     * Type: Geodetic
     * Extent: New Caledonia - Grande Terre.
     * North end of Gomen base.
     */
    public const EPSG_IGN72_GRANDE_TERRE = 'urn:ogc:def:datum:EPSG::6634';

    /**
     * IGN72 Nuku Hiva
     * Type: Geodetic
     * Extent: French Polynesia - Marquesas Islands - Nuku Hiva, Ua Huka and Ua Pou.
     * Fundamental point: Taiohae. Latitude: 8°55'03.97"S, longitude: 140°05'36.24"W (of Greenwich).
     * Replaced by RGPF (datum code 6687).
     */
    public const EPSG_IGN72_NUKU_HIVA = 'urn:ogc:def:datum:EPSG::6630';

    /**
     * IGS00
     * Type: Dynamic geodetic
     * Extent: World.
     * Derived from ITRF2000 at epoch 1998.00 through a subset of 54 stable IGS station coordinates. Preserves the ITRF
     * origin, orientation and scale, but without any distortions introduced from non-GNSS space-geodetic techniques.
     * Used for IGS products from GPS week 1143 through GPS week 1252 (2001-12-02 through 2004-01-10). Replaces IGS97,
     * replaced by IGb00. For all practical purposes coincident with ITRF2000.
     */
    public const EPSG_IGS00 = 'urn:ogc:def:datum:EPSG::1245';

    /**
     * IGS05
     * Type: Dynamic geodetic
     * Extent: World.
     * Derived from ITRF2005 at epoch 2000.00 through a subset of 139 stable IGS station coordinates. Preserves the
     * ITRF origin, orientation and scale, but without any distortions introduced from non-GNSS space-geodetic
     * techniques.
     * Used for IGS products from GPS week 1400 through GPS week 1631 (2006-11-05 to 2011-04-16). Replaces IGb00,
     * replaced by IGb08. For all practical purposes coincident with ITRF2005.
     */
    public const EPSG_IGS05 = 'urn:ogc:def:datum:EPSG::1247';

    /**
     * IGS08
     * Type: Dynamic geodetic
     * Extent: World.
     * Derived from ITRF2008 at epoch 2005.00 through a subset of 232 stable IGS station coordinates. Preserves the
     * ITRF origin, orientation and scale, but without any distortions introduced from non-GNSS space-geodetic
     * techniques.
     * Used for IGS products from GPS week 1632 through GPS week 1708 (2011-04-17 through 2012-10-06). Replaces IGS05.
     * Replaced by IGb08. For all practical purposes coincident with ITRF2008.
     */
    public const EPSG_IGS08 = 'urn:ogc:def:datum:EPSG::1141';

    /**
     * IGS14
     * Type: Dynamic geodetic
     * Extent: World.
     * Derived from ITRF2014 at epoch 2010.00 through a subset of 252 stable IGS station coordinates. Preserves the
     * ITRF origin, orientation and scale, but without any distortions introduced from non-GNSS space-geodetic
     * techniques.
     * Used for IGS products from GPS week 1934 (2017-01-29) through GPS week 2105 (2020-05-16). Replaces IGb08,
     * replaced by IGb14. For all practical purposes coincident with ITRF2014.
     */
    public const EPSG_IGS14 = 'urn:ogc:def:datum:EPSG::1191';

    /**
     * IGS97
     * Type: Dynamic geodetic
     * Extent: World.
     * Derived from ITRF97 at epoch 1997.00 through a subset of stable IGS station coordinates. Preserves the ITRF
     * origin, orientation and scale, but without any distortions introduced from non-GNSS space-geodetic techniques.
     * Used for IGS products from GPS week 1065 through GPS week 1142 (2000-06-04 to 2001-12-01). Replaced by IGS00.
     * For all practical purposes coincident with ITRF97.
     */
    public const EPSG_IGS97 = 'urn:ogc:def:datum:EPSG::1244';

    /**
     * IGb00
     * Type: Dynamic geodetic
     * Extent: World.
     * Derived from ITRF2000 at epoch 1998.00 through a subset of 99 stable IGS station coordinates. Preserves the ITRF
     * origin, orientation and scale, but without any distortions introduced from non-GNSS space-geodetic techniques.
     * Used for IGS products from GPS week 1253 through GPS week 1399 (2004-01-11 to 2006-11-04). Replaces IGS00,
     * replaced by IGS05. For all practical purposes coincident with ITRF2000.
     */
    public const EPSG_IGB00 = 'urn:ogc:def:datum:EPSG::1246';

    /**
     * IGb08
     * Type: Dynamic geodetic
     * Extent: World.
     * Derived from ITRF2008 at epoch 2005.00 through a subset of 232 stable IGS station coordinates. Preserves the
     * ITRF origin, orientation and scale, but without any distortions introduced from non-GNSS space-geodetic
     * techniques.
     * Used for IGS products from GPS week 1709 through GPS week 1933 (2012-10-07 to 2017-01-28). Replaces IGS08,
     * replaced by IGS14. For all practical purposes coincident with ITRF2008.
     */
    public const EPSG_IGB08 = 'urn:ogc:def:datum:EPSG::1248';

    /**
     * IGb14
     * Type: Dynamic geodetic
     * Extent: World.
     * Daily IGS combined operational solutions of GPS weeks 730 to 2092. IGb14 is aligned in origin, scale and
     * orientation to IGS14 via a subset of 233 selected stations. As IGS14 is aligned to ITRF2014, IGb14 is also
     * aligned to ITRF2014.
     * Used for IGS products from GPS week 2106 (2020-05-17). Replaces IGS14. Compared to IGS14, IGb14 benefits from 5
     * more years of input data, a revised discontinuity list and 9 additional stations. For all practical purposes
     * coincident with ITRF2014.
     */
    public const EPSG_IGB14 = 'urn:ogc:def:datum:EPSG::1272';

    /**
     * IRENET95
     * Type: Geodetic
     * Extent: Ireland - onshore. United Kingdom (UK) - Northern Ireland (Ulster) - onshore.
     * ETRS89 stations in Ireland
     * Densification of ETRS89.
     */
    public const EPSG_IRENET95 = 'urn:ogc:def:datum:EPSG::6173';

    /**
     * Ibiza
     * Type: Vertical
     * Extent: Spain - Balearic Islands - Ibiza and Formentera - onshore.
     * Mean Sea Level at Ibiza harbour between January 2003 and December 2005.
     * Orthometric heights.
     */
    public const EPSG_IBIZA = 'urn:ogc:def:datum:EPSG::1277';

    /**
     * Incheon
     * Type: Vertical
     * Extent: Republic of Korea (South Korea) - mainland onshore.
     * MSL 1913-1916 at Incheon Bay.
     */
    public const EPSG_INCHEON = 'urn:ogc:def:datum:EPSG::1049';

    /**
     * Indian 1954
     * Type: Geodetic
     * Extent: Myanmar (Burma) - onshore; Thailand - onshore.
     * Extension of Kalianpur 1937 over Myanmar and Thailand.
     */
    public const EPSG_INDIAN_1954 = 'urn:ogc:def:datum:EPSG::6239';

    /**
     * Indian 1960
     * Type: Geodetic
     * Extent: Cambodia - onshore; Vietnam - onshore and offshore Cuu Long basin.
     * DMA extension over IndoChina of the Indian 1954 network adjusted  to better fit local geoid.
     * Also known as Indian (DMA Reduced).
     */
    public const EPSG_INDIAN_1960 = 'urn:ogc:def:datum:EPSG::6131';

    /**
     * Indian 1975
     * Type: Geodetic
     * Extent: Thailand - onshore plus offshore Gulf of Thailand.
     * Fundamental point: Khau Sakaerang.
     */
    public const EPSG_INDIAN_1975 = 'urn:ogc:def:datum:EPSG::6240';

    /**
     * Indian Spring Low Water
     * Type: Vertical
     * Extent: World.
     * The level below MSL equal to the sum of the amplitudes of the harmonic constituents M2, S2, K1 and O1. It
     * approximates mean lower low water spring tides (MLLWS).
     * Users are advised to not use this generic vertical datum but to define explicit realizations of ISLW by
     * specifying location and epoch, for instance "ISLW at xxx during yyyy-yyyy".
     */
    public const EPSG_INDIAN_SPRING_LOW_WATER = 'urn:ogc:def:datum:EPSG::1085';

    /**
     * Indonesian Datum 1974
     * Type: Geodetic
     * Extent: Indonesia - onshore.
     * Fundamental point: Padang. Latitude: 0°56'38.414"S, longitude: 100°22' 8.804"E (of Greenwich). Ellipsoidal
     * height 3.190m, gravity-related height 14.0m above mean sea level.
     * Replaced by DGN95.
     */
    public const EPSG_INDONESIAN_DATUM_1974 = 'urn:ogc:def:datum:EPSG::6238';

    /**
     * Indonesian Geoid 2020 version 1
     * Type: Vertical
     * Extent: Indonesia - onshore and offshore.
     * Defined by INAGeoid2020 gravimetric geoid model v1 applied to SRGI2013.
     * Uses gravity data observed to 2019 fitted to control points on Java and Bali.
     */
    public const EPSG_INDONESIAN_GEOID_2020_VERSION_1 = 'urn:ogc:def:datum:EPSG::1294';

    /**
     * Indonesian Geoid 2020 version 2
     * Type: Vertical
     * Extent: Indonesia - onshore and offshore.
     * Defined by INAGeoid2020 gravimetric geoid model v2 applied to SRGI2013.
     * Uses gravity data observed to 2021 fitted to tide gauge benchmarks across Indonesia.
     */
    public const EPSG_INDONESIAN_GEOID_2020_VERSION_2 = 'urn:ogc:def:datum:EPSG::1328';

    /**
     * Instantaneous Water Level
     * Type: Vertical
     * Extent: World.
     * Instantaneous water level uncorrected for tide.
     * Not specific to any location or epoch.
     */
    public const EPSG_INSTANTANEOUS_WATER_LEVEL = 'urn:ogc:def:datum:EPSG::5113';

    /**
     * Institut Geographique du Congo Belge 1955
     * Type: Geodetic
     * Extent: The Democratic Republic of the Congo (Zaire) - Lower Congo (Bas Congo)
     * Fundamental point: Yella east base. Latitude: 6°00'53.139"S, longitude: 12°58'29.287"E (of Greenwich).
     * Replaced by IGC 1962 Arc of the 6th Parallel South, except for oil industry activities.
     */
    public const EPSG_INSTITUT_GEOGRAPHIQUE_DU_CONGO_BELGE_1955 = 'urn:ogc:def:datum:EPSG::6701';

    /**
     * International Great Lakes Datum 1955
     * Type: Vertical
     * Extent: Canada and United States (USA) - Great Lakes basin and St Lawrence Seaway.
     * Mean water level 1941-1956 at Pointe-au-Père (Father's Point), Quebec. Benchmark 1248-G = 3.794m.
     * Dynamic heights. Adopted in 1962. Replaced by IGLD 1985 in January 1992.
     */
    public const EPSG_INTERNATIONAL_GREAT_LAKES_DATUM_1955 = 'urn:ogc:def:datum:EPSG::5204';

    /**
     * International Great Lakes Datum 1985
     * Type: Vertical
     * Extent: Canada and United States (USA) - Great Lakes basin and St Lawrence Seaway.
     * Mean water level 1970-1983 at Pointe-au-Père (Father's Point) and 1984-1988 at Rimouski, Quebec. Benchmark
     * 1250-G = 6.273m.
     * Dynamic heights. Replaces IGLD 1955 from January 1992.
     */
    public const EPSG_INTERNATIONAL_GREAT_LAKES_DATUM_1985 = 'urn:ogc:def:datum:EPSG::5205';

    /**
     * International Terrestrial Reference Frame 1988
     * Type: Dynamic geodetic
     * Extent: World.
     * Origin at geocentre, orientated to the BIH Terrestrial System at epoch 1984.0. Datum defined by a set of
     * 3-dimensional Cartesian station coordinates (SCS).
     * Realization of the IERS Terrestrial Reference System (ITRS) at epoch 1988.0. Replaced by ITRF89 (code 6648).
     */
    public const EPSG_INTERNATIONAL_TERRESTRIAL_REFERENCE_FRAME_1988 = 'urn:ogc:def:datum:EPSG::6647';

    /**
     * International Terrestrial Reference Frame 1989
     * Type: Dynamic geodetic
     * Extent: World.
     * Origin at geocentre, orientated to the BIH Terrestrial System at epoch 1984.0. Datum defined by a set of
     * 3-dimensional Cartesian station coordinates (SCS) for epoch 1988.0.
     * Realization of the IERS Terrestrial Reference System (ITRS) from April 1991. Replaces ITRF88 (code 6647).
     * Replaced by ITRF90 (code 6649).
     */
    public const EPSG_INTERNATIONAL_TERRESTRIAL_REFERENCE_FRAME_1989 = 'urn:ogc:def:datum:EPSG::6648';

    /**
     * International Terrestrial Reference Frame 1990
     * Type: Dynamic geodetic
     * Extent: World.
     * Origin at geocentre, orientated to the BIH Terrestrial System at epoch 1984.0. Datum defined by a set of
     * 3-dimensional Cartesian station coordinates (SCS) for epoch 1988.0.
     * Realization of the IERS Terrestrial Reference System (ITRS) from December 1991. Replaces ITRF89 (code 6648).
     * Replaced by ITRF91 (code 6650).
     */
    public const EPSG_INTERNATIONAL_TERRESTRIAL_REFERENCE_FRAME_1990 = 'urn:ogc:def:datum:EPSG::6649';

    /**
     * International Terrestrial Reference Frame 1991
     * Type: Dynamic geodetic
     * Extent: World.
     * Origin at geocentre, orientated to the BIH Terrestrial System at epoch 1984.0. Datum defined by a set of
     * 3-dimensional Cartesian station coordinates (SCS) for epoch 1988.0.
     * Realization of the IERS Terrestrial Reference System (ITRS) from October 1992. Replaces ITRF90 (code 6649).
     * Replaced by ITRF92 (code 6651).
     */
    public const EPSG_INTERNATIONAL_TERRESTRIAL_REFERENCE_FRAME_1991 = 'urn:ogc:def:datum:EPSG::6650';

    /**
     * International Terrestrial Reference Frame 1992
     * Type: Dynamic geodetic
     * Extent: World.
     * Origin at geocentre, orientated to the BIH Terrestrial System at epoch 1984.0. Datum defined by a set of 287
     * 3-dimensional Cartesian station coordinates (SCS) for epoch 1988.0.
     * Realization of the IERS Terrestrial Reference System (ITRS) from October 1993. Replaces ITRF91 (code 6650).
     * Replaced by ITRF93 (code 6652).
     */
    public const EPSG_INTERNATIONAL_TERRESTRIAL_REFERENCE_FRAME_1992 = 'urn:ogc:def:datum:EPSG::6651';

    /**
     * International Terrestrial Reference Frame 1993
     * Type: Dynamic geodetic
     * Extent: World.
     * Origin at geocentre, orientated to the BIH Terrestrial System at epoch 1984.0. Datum defined by a set of
     * 3-dimensional Cartesian station coordinates (SCS) for epoch 1993.0.
     * Realization of the IERS Terrestrial Reference System (ITRS) from October 1994. Replaces ITRF92 (code 6651).
     * Replaced by ITRF94 (code 6653).
     */
    public const EPSG_INTERNATIONAL_TERRESTRIAL_REFERENCE_FRAME_1993 = 'urn:ogc:def:datum:EPSG::6652';

    /**
     * International Terrestrial Reference Frame 1994
     * Type: Dynamic geodetic
     * Extent: World.
     * Origin at geocentre, orientated to the BIH Terrestrial System at epoch 1984.0. Datum defined by a set of
     * 3-dimensional Cartesian station coordinates (SCS) for epoch 1993.0.
     * Realization of the IERS Terrestrial Reference System (ITRS) from March 1996. Replaces ITRF93 (code 6652).
     * Replaced by ITRF96 (code 6654).
     */
    public const EPSG_INTERNATIONAL_TERRESTRIAL_REFERENCE_FRAME_1994 = 'urn:ogc:def:datum:EPSG::6653';

    /**
     * International Terrestrial Reference Frame 1996
     * Type: Dynamic geodetic
     * Extent: World.
     * Origin at geocentre, orientated to the BIH Terrestrial System at epoch 1984.0. Datum defined by a set of
     * 3-dimensional Cartesian station coordinates (SCS) for epoch 1997.0.
     * Realization of the IERS Terrestrial Reference System (ITRS) from May 1998. Replaces ITRF94 (code 6653). Replaced
     * by ITRF97 (code 6655).
     */
    public const EPSG_INTERNATIONAL_TERRESTRIAL_REFERENCE_FRAME_1996 = 'urn:ogc:def:datum:EPSG::6654';

    /**
     * International Terrestrial Reference Frame 1997
     * Type: Dynamic geodetic
     * Extent: World.
     * Origin at geocentre, orientated to the BIH Terrestrial System at epoch 1984.0. Datum defined by a set of
     * 3-dimensional Cartesian station coordinates (SCS) for epoch 1997.0.
     * Realization of the IERS Terrestrial Reference System (ITRS) from May 1999. Replaces ITRF96 (code 6654). Replaced
     * by ITRF2000 (code 6656).
     */
    public const EPSG_INTERNATIONAL_TERRESTRIAL_REFERENCE_FRAME_1997 = 'urn:ogc:def:datum:EPSG::6655';

    /**
     * International Terrestrial Reference Frame 2000
     * Type: Dynamic geodetic
     * Extent: World.
     * Origin at geocentre, orientated to the BIH Terrestrial System at epoch 1984.0. Datum defined by a set of
     * 3-dimensional Cartesian station coordinates (SCS) for epoch 1997.0.
     * Realization of the IERS Terrestrial Reference System (ITRS) from 2004. Replaces ITRF97 (code 6655). Replaced by
     * ITRF2005 (code 6896).
     */
    public const EPSG_INTERNATIONAL_TERRESTRIAL_REFERENCE_FRAME_2000 = 'urn:ogc:def:datum:EPSG::6656';

    /**
     * International Terrestrial Reference Frame 2005
     * Type: Dynamic geodetic
     * Extent: World.
     * Origin at geocentre, originally orientated to the BIH Terrestrial System at epoch 1984.0 then adjusted to ensure
     * zero net rotation to earth's overall tectonic motion. Defined by time series of Cartesian station coordinates
     * for epoch 2000.0.
     * Realization of the IERS Terrestrial Reference System (ITRS) from September 2007. Replaces ITRF2000 (code 6656).
     * Replaced by ITRF2008 (datum code 1061).
     */
    public const EPSG_INTERNATIONAL_TERRESTRIAL_REFERENCE_FRAME_2005 = 'urn:ogc:def:datum:EPSG::6896';

    /**
     * International Terrestrial Reference Frame 2008
     * Type: Dynamic geodetic
     * Extent: World.
     * Origin at geocentre. The ITRF2008 origin is defined in such a way that there are null translation parameters at
     * epoch 2005.0 and null translation rates between the ITRF2008 and the ILRS SLR time series.
     * Realization of the IERS Terrestrial Reference System (ITRS) from 2012. Replaces ITRF2005 (code 6896).
     */
    public const EPSG_INTERNATIONAL_TERRESTRIAL_REFERENCE_FRAME_2008 = 'urn:ogc:def:datum:EPSG::1061';

    /**
     * International Terrestrial Reference Frame 2014
     * Type: Dynamic geodetic
     * Extent: World.
     * Origin at geocentre. Origin = ILRS SLR long-term solution at epoch 2010.0. Zero scale and scale rate between
     * ITRF2014 and the average of VLBI and SLR scales/rates. Orientation = ITRF2008@ 2010.0 with zero rotation rates
     * between the ITRF2014 and ITRF2008.
     * Realization of the IERS Terrestrial Reference System (ITRS). Replaces ITRF2008 (datum code 1061) from January
     * 2016. Replaced by ITRF2020 (datum code 1322) from April 2022.
     */
    public const EPSG_INTERNATIONAL_TERRESTRIAL_REFERENCE_FRAME_2014 = 'urn:ogc:def:datum:EPSG::1165';

    /**
     * International Terrestrial Reference Frame 2020
     * Type: Dynamic geodetic
     * Extent: World.
     * Origin at geocentre. Origin = ILRS SLR long-term solution at epoch 2015.0. Zero scale and scale rate between
     * ITRF2020 and the average of VLBI and SLR scales/rates. Orientation = ITRF2014@ 2015.0 with zero rotation rates
     * between the ITRF2020 and ITRF2014.
     * Realization of the IERS Terrestrial Reference System (ITRS). Replaces ITRF2014 (datum code 1165) from April
     * 2022.
     */
    public const EPSG_INTERNATIONAL_TERRESTRIAL_REFERENCE_FRAME_2020 = 'urn:ogc:def:datum:EPSG::1322';

    /**
     * Iraq-Kuwait Boundary Datum 1992
     * Type: Geodetic
     * Extent: Iraq - Kuwait boundary.
     * Four stations established between September and December 1991 determined by GPS and Doppler observations.
     */
    public const EPSG_IRAQ_KUWAIT_BOUNDARY_DATUM_1992 = 'urn:ogc:def:datum:EPSG::6667';

    /**
     * Iraqi Geospatial Reference System
     * Type: Geodetic
     * Extent: Iraq - onshore and offshore.
     * ITRF2000 at epoch 1997.0.
     */
    public const EPSG_IRAQI_GEOSPATIAL_REFERENCE_SYSTEM = 'urn:ogc:def:datum:EPSG::1029';

    /**
     * Islands Net 1993
     * Type: Geodetic
     * Extent: Iceland - onshore and offshore.
     * ITRF93 at epoch 1993.6.
     * Replaced by ISN2004 (datum code 1060).
     */
    public const EPSG_ISLANDS_NET_1993 = 'urn:ogc:def:datum:EPSG::6659';

    /**
     * Islands Net 2004
     * Type: Geodetic
     * Extent: Iceland - onshore and offshore.
     * ITRF2000 at epoch 2004.6.
     * Replaces ISN93 (datum code 6659). Replaced by ISN2016 (datum code 1087).
     */
    public const EPSG_ISLANDS_NET_2004 = 'urn:ogc:def:datum:EPSG::1060';

    /**
     * Islands Net 2016
     * Type: Geodetic
     * Extent: Iceland - onshore and offshore.
     * ITRF2014 at epoch 2016.5.
     * Replaces ISN2004 from September 2017.
     */
    public const EPSG_ISLANDS_NET_2016 = 'urn:ogc:def:datum:EPSG::1187';

    /**
     * Israel 1993
     * Type: Geodetic
     * Extent: Israel - onshore; Palestine Territory - onshore.
     * Fundamental point:  Latitude: 31°44'03.817"N, longitude: 35°12'16.261"E (of Greenwich).
     * Replaces Palestine 1923 (datum code 6281). Replaced by IGD05 (datum code 1143).
     */
    public const EPSG_ISRAEL_1993 = 'urn:ogc:def:datum:EPSG::6141';

    /**
     * Israeli Geodetic Datum 2005
     * Type: Geodetic
     * Extent: Israel - onshore and offshore.
     * Defined by coordinates of 13 Active Positioning Network (APN) stations in ITRF2000 at epoch 2004.75. A further
     * five APN stations were added in 2006.
     * Replaces Israel 1993 (datum code 6141). Replaced by IGD05/12 (datum code 1115).
     */
    public const EPSG_ISRAELI_GEODETIC_DATUM_2005 = 'urn:ogc:def:datum:EPSG::1114';

    /**
     * Israeli Geodetic Datum 2005(2012)
     * Type: Geodetic
     * Extent: Israel - onshore and offshore.
     * Datum updated in 2012 with four APN stations removed from definition. Coordinate epoch remains ITRF2000 at epoch
     * 2004.75.
     * Replaces IGD05 (datum code 1114).
     */
    public const EPSG_ISRAELI_GEODETIC_DATUM_2005_2012 = 'urn:ogc:def:datum:EPSG::1115';

    /**
     * Istituto Geografico Militaire 1995
     * Type: Geodetic
     * Extent: Italy - onshore and offshore; San Marino, Vatican City State.
     * Densification of ETRF89 in Italy. Network of 1296 points observed 1992-1995 adjusted in 1996 constrained to 9
     * ETRF89 points at epoch 1989.0. By April 2021 the framework was composed of 3104 points of the fundamental
     * network and 3819 densification points.
     * Replaced by RDN2008 (datum code 1132) from 2011-11-10.
     */
    public const EPSG_ISTITUTO_GEOGRAFICO_MILITAIRE_1995 = 'urn:ogc:def:datum:EPSG::6670';

    /**
     * Iwo Jima 1945
     * Type: Geodetic
     * Extent: Japan - Iwo Jima island.
     * Fundamental point: Beacon "E".
     */
    public const EPSG_IWO_JIMA_1945 = 'urn:ogc:def:datum:EPSG::6709';

    /**
     * Jamaica 1875
     * Type: Geodetic
     * Extent: Jamaica - onshore.
     * Fundamental point: Fort Charles Flagstaff. Latitude: 17°55'55.800"N, longitude: 76°56'37.260"W (of Greenwich).
     */
    public const EPSG_JAMAICA_1875 = 'urn:ogc:def:datum:EPSG::6241';

    /**
     * Jamaica 1969
     * Type: Geodetic
     * Extent: Jamaica - onshore.
     * Fundamental point: Fort Charles Flagstaff. Latitude: 17°55'55.800"N, longitude: 76°56'37.260"W (of Greenwich).
     */
    public const EPSG_JAMAICA_1969 = 'urn:ogc:def:datum:EPSG::6242';

    /**
     * Jamaica 2001
     * Type: Geodetic
     * Extent: Jamaica - onshore and offshore. Includes Morant Cays and Pedro Cays.
     * Aligned to WGS 84.
     */
    public const EPSG_JAMAICA_2001 = 'urn:ogc:def:datum:EPSG::6758';

    /**
     * Jamestown 1971
     * Type: Vertical
     * Extent: St Helena, Ascension and Tristan da Cunha - St Helena Island - onshore.
     * MSL at Jamestown 1971 defined through elevation of triangulation station Astro DOS 71/4 Ladder Hill Fort being
     * 267.858 metres above MSL.
     */
    public const EPSG_JAMESTOWN_1971 = 'urn:ogc:def:datum:EPSG::1175';

    /**
     * Japanese Geodetic Datum 2000
     * Type: Geodetic
     * Extent: Japan - onshore and offshore.
     * ITRF94 at epoch 1997.0. Fundamental point: Tokyo-Taisho, latitude: 35°39'29.1572"N, longitude:
     * 139°44'28.8759"E (of Greenwich).
     * Instigated under amendment to the Japanese Surveying Law with effect from April 2002. Replaces Tokyo datum (code
     * 6301). Replaced by JGD2011 (datum code 1128) with effect from 21st October 2011.
     */
    public const EPSG_JAPANESE_GEODETIC_DATUM_2000 = 'urn:ogc:def:datum:EPSG::6612';

    /**
     * Japanese Geodetic Datum 2000 (vertical)
     * Type: Vertical
     * Extent: Japan - onshore mainland - Hokkaido, Honshu, Shikoku, Kyushu.
     * 24.4140 metres above mean sea level Tokyo Bay.
     * Orthometric heights. Replaces JSLD69 and JSLD72 with effect from April 2002. Replaced by JGD2011 (vertical)
     * (datum code 1131) with effect from 21st October 2011.
     */
    public const EPSG_JAPANESE_GEODETIC_DATUM_2000_VERTICAL = 'urn:ogc:def:datum:EPSG::1130';

    /**
     * Japanese Geodetic Datum 2011
     * Type: Geodetic
     * Extent: Japan - onshore and offshore.
     * ITRF94 at epoch 1997.0 except for northern Honshu area impacted by 2011 Tohoku earthquake which is ITRF2008 at
     * epoch 2011.395. Fundamental point: Tokyo-Taisho, latitude: 35°39'29.1572"N, longitude: 139°44'28.8869"E (of
     * Greenwich).
     * Instigated under amendment to the Japanese Surveying Law with effect from 21st October 2011. Replaces JGD2000
     * (datum code 6612).
     */
    public const EPSG_JAPANESE_GEODETIC_DATUM_2011 = 'urn:ogc:def:datum:EPSG::1128';

    /**
     * Japanese Geodetic Datum 2011 (vertical)
     * Type: Vertical
     * Extent: Japan - onshore mainland - Hokkaido, Honshu, Shikoku, Kyushu.
     * 24.3900 metres above mean sea level Tokyo Bay.
     * Orthometric heights. Replaces JGD2000 (vertical) (datum code 1130) with effect from 21st October 2011.
     */
    public const EPSG_JAPANESE_GEODETIC_DATUM_2011_VERTICAL = 'urn:ogc:def:datum:EPSG::1131';

    /**
     * Japanese Standard Levelling Datum 1969
     * Type: Vertical
     * Extent: Japan - onshore mainland - Honshu, Shikoku, Kyushu.
     * 24.4140 metres above mean sea level Tokyo Bay.
     * Normal-orthometric heights. Replaces JSLD49. Replaced by JGD2000 (vertical) (datum code 1130) from April 2002.
     */
    public const EPSG_JAPANESE_STANDARD_LEVELLING_DATUM_1969 = 'urn:ogc:def:datum:EPSG::5122';

    /**
     * Japanese Standard Levelling Datum 1972
     * Type: Vertical
     * Extent: Japan - onshore mainland - Hokkaido.
     * Mean sea level Oshoro 1963-72.
     * Normal-orthometric heights. Replaced by JGD2000 (vertical) (datum code 1130) with effect from April 2002.
     */
    public const EPSG_JAPANESE_STANDARD_LEVELLING_DATUM_1972 = 'urn:ogc:def:datum:EPSG::1129';

    /**
     * Johnston Island 1961
     * Type: Geodetic
     * Extent: United States Minor Outlying Islands - Johnston Island.
     */
    public const EPSG_JOHNSTON_ISLAND_1961 = 'urn:ogc:def:datum:EPSG::6725';

    /**
     * Jouik 1961
     * Type: Geodetic
     * Extent: Mauritania - coastal area north of Cape Timiris.
     * Replaced by Mauritania 1999 (datum code 6702).
     */
    public const EPSG_JOUIK_1961 = 'urn:ogc:def:datum:EPSG::6679';

    /**
     * KOC Construction Datum
     * Type: Vertical
     * Extent: Kuwait - onshore.
     * Approximately 1.52m below MSL. Created for the construction of the Mina al Ahmadi refinery.
     */
    public const EPSG_KOC_CONSTRUCTION_DATUM = 'urn:ogc:def:datum:EPSG::5188';

    /**
     * KOC Well Datum
     * Type: Vertical
     * Extent: Kuwait - onshore.
     * Approximately 3.22m above MSL.
     */
    public const EPSG_KOC_WELL_DATUM = 'urn:ogc:def:datum:EPSG::5187';

    /**
     * Kalianpur 1880
     * Type: Geodetic
     * Extent: Bangladesh - onshore; India - mainland onshore; Myanmar (Burma) - onshore; Pakistan - onshore.
     * Fundamental point: Kalianpur. Latitude: 24°07'11.260"N, longitude: 77°39'17.570"E (of Greenwich).
     * Includes 1916 extension into Burma (Myanmar).  Replaced by 1937 adjustment.
     */
    public const EPSG_KALIANPUR_1880 = 'urn:ogc:def:datum:EPSG::6243';

    /**
     * Kalianpur 1937
     * Type: Geodetic
     * Extent: Bangladesh - onshore; India - mainland onshore; Myanmar - onshore and Moattama area offshore; Pakistan -
     * onshore.
     * Fundamental point: Kalianpur. Latitude: 24° 07'11.260"N, longitude: 77°39'17.570"E (of Greenwich).
     * Replaces 1880 adjustment except for topographic mapping.  Replaced in Bangladesh and Pakistan by 1962
     * metrication conversion and in India by 1975 metrication conversion.
     */
    public const EPSG_KALIANPUR_1937 = 'urn:ogc:def:datum:EPSG::6144';

    /**
     * Kalianpur 1962
     * Type: Geodetic
     * Extent: Pakistan - onshore and offshore.
     * Fundamental point: Kalianpur. Latitude: 24° 07'11.260"N, longitude: 77°39'17.570"E (of Greenwich).
     * 1937 adjustment rescaled by ratio metric conversions of Indian foot (1937) to Indian foot (1962).
     */
    public const EPSG_KALIANPUR_1962 = 'urn:ogc:def:datum:EPSG::6145';

    /**
     * Kalianpur 1975
     * Type: Geodetic
     * Extent: India - mainland onshore.
     * Fundamental point: Kalianpur. Latitude: 24° 07'11.260"N, longitude: 77°39'17.570"E (of Greenwich).
     * 1937 adjustment rescaled by ratio metric conversions of Indian foot (1937) to Indian foot (1975).
     */
    public const EPSG_KALIANPUR_1975 = 'urn:ogc:def:datum:EPSG::6146';

    /**
     * Kandawala
     * Type: Geodetic
     * Extent: Sri Lanka - onshore.
     * Fundamental point: Kandawala. Latitude: 7°14'06.838"N, longitude: 79°52'36.670"E.
     */
    public const EPSG_KANDAWALA = 'urn:ogc:def:datum:EPSG::6244';

    /**
     * Karbala 1979
     * Type: Geodetic
     * Extent: Iraq - onshore.
     * Fundamental point: Karbala. Latitude: 32°34'14.4941"N, longitude: 44°00'49.6379"E.
     * National geodetic network established by Polservice consortium.
     */
    public const EPSG_KARBALA_1979 = 'urn:ogc:def:datum:EPSG::6743';

    /**
     * Kartastokoordinaattijarjestelma (1966)
     * Type: Geodetic
     * Extent: Finland - onshore.
     * Adjustment with fundamental point SF31 based on ED50 transformed to best fit the older VVJ adjustment.
     * Adopted in 1970.
     */
    public const EPSG_KARTASTOKOORDINAATTIJARJESTELMA_1966 = 'urn:ogc:def:datum:EPSG::6123';

    /**
     * Kasai 1953
     * Type: Geodetic
     * Extent: The Democratic Republic of the Congo (Zaire) - Kasai - south of 5°S and east of 21°30'E.
     * Two stations of the Katanga triangulation with ellipsoid change applied: Kabila, latitude 6°58'34.023"S,
     * longitude 23°50'24.028"E (of Greenwich); and Gandajika NW base, latitude 6°45'01.057"S, longitude
     * 23°57'03.038"E (of Greenwich).
     * Replaced by IGC 1962 Arc of the 6th Parallel South.
     */
    public const EPSG_KASAI_1953 = 'urn:ogc:def:datum:EPSG::6696';

    /**
     * Katanga 1955
     * Type: Geodetic
     * Extent: The Democratic Republic of the Congo (Zaire) - Katanga.
     * Fundamental point: Tshinsenda A. Latitude: 12°30'31.568"S, longitude: 28°01'02.971"E (of Greenwich).
     * Replaces earlier adjustments.
     */
    public const EPSG_KATANGA_1955 = 'urn:ogc:def:datum:EPSG::6695';

    /**
     * Kertau (RSO)
     * Type: Geodetic
     * Extent: Malaysia - West Malaysia; Singapore.
     * Adopts metric conversion of 0.914398 metres per yard exactly. This is a truncation of the Sears 1922 ratio.
     */
    public const EPSG_KERTAU_RSO = 'urn:ogc:def:datum:EPSG::6751';

    /**
     * Kertau 1968
     * Type: Geodetic
     * Extent: Malaysia - West Malaysia onshore and offshore east coast; Singapore - onshore and offshore.
     * Fundamental point: Kertau. Latitude: 3°27'50.710"N, longitude: 102°37'24.550"E (of Greenwich).
     * Replaces MRT48 and earlier adjustments. Adopts metric conversion of 39.370113 inches per metre. Not used for
     * 1969 metrication of RSO grid - see Kertau (RSO) (code 6751).
     */
    public const EPSG_KERTAU_1968 = 'urn:ogc:def:datum:EPSG::6245';

    /**
     * Kingdom of Saudi Arabia Geodetic Reference Frame 2017
     * Type: Geodetic
     * Extent: Saudi Arabia - onshore and offshore.
     * ITRF2014 at epoch 2017.00.
     * Realized by 333 GNSS stations in Saudi Arabia aligned to ITRF2014 through core network of 46 stations adjusted
     * to 15 IGS stations.
     */
    public const EPSG_KINGDOM_OF_SAUDI_ARABIA_GEODETIC_REFERENCE_FRAME_2017 = 'urn:ogc:def:datum:EPSG::1268';

    /**
     * Kingdom of Saudi Arabia Vertical Reference Frame Jeddah 2014
     * Type: Vertical
     * Extent: Saudi Arabia - onshore.
     * Jeddah tide gauge bench mark TGBM-B height of 1.7446m at 2014.75.
     */
    public const EPSG_KINGDOM_OF_SAUDI_ARABIA_VERTICAL_REFERENCE_FRAME_JEDDAH_2014 = 'urn:ogc:def:datum:EPSG::1269';

    /**
     * Kiunga
     * Type: Vertical
     * Extent: Papua New Guinea - onshore south of 5°S and west of 144°E.
     * PSM 9465 at Kiunga Airport. Propagated through bilinear interpolation of EGM2008 geoid model (transformation
     * code 3858) reduced to PSM 9465 by offset of -3.0m.
     */
    public const EPSG_KIUNGA = 'urn:ogc:def:datum:EPSG::1151';

    /**
     * Korean Datum 1985
     * Type: Geodetic
     * Extent: Republic of Korea (South Korea) - onshore.
     * Fundamental point: Suwon. Latitude 37°16'31.9034"N, longitude 127°03'05.1451"E of Greenwich. This is
     * consistent with the Tokyo 1918 datum latitude and longitude.
     * Replaces Tokyo 1918 (datum code 6301). Replaced by Korea 2000 (datum code 6737).
     */
    public const EPSG_KOREAN_DATUM_1985 = 'urn:ogc:def:datum:EPSG::6162';

    /**
     * Korean Datum 1995
     * Type: Geodetic
     * Extent: Republic of Korea (South Korea) - onshore.
     */
    public const EPSG_KOREAN_DATUM_1995 = 'urn:ogc:def:datum:EPSG::6166';

    /**
     * Kosovo Reference System 2001
     * Type: Geodetic
     * Extent: Kosovo.
     * Densification of ETRF97 in Kosovo at epoch 2001.25.
     * First order network of 32 stations connected to 8 EUREF Permanant Network (EPN) stations observed march-April
     * 2001. Densified in 2012.
     */
    public const EPSG_KOSOVO_REFERENCE_SYSTEM_2001 = 'urn:ogc:def:datum:EPSG::1251';

    /**
     * Kousseri
     * Type: Geodetic
     * Extent: Cameroon - N'Djamena area.
     * IGN astronomical station Dabanga; 11°55'05.9"N  14°38'40.8"E (of Greenwich).
     */
    public const EPSG_KOUSSERI = 'urn:ogc:def:datum:EPSG::6198';

    /**
     * Kumul 34
     * Type: Vertical
     * Extent: Papua New Guinea - Papuan fold and thrust belt.
     * Kumul Platform Station 34. Propagated through bilinear interpolation of EGM96 geoid model (transformation code
     * 10084) reduced to Kumul 34 by offset of -0.87m.
     */
    public const EPSG_KUMUL_34 = 'urn:ogc:def:datum:EPSG::1150';

    /**
     * Kusaie 1951
     * Type: Geodetic
     * Extent: Federated States of Micronesia - Kosrae (Kusaie).
     */
    public const EPSG_KUSAIE_1951 = 'urn:ogc:def:datum:EPSG::6735';

    /**
     * Kuwait Oil Company
     * Type: Geodetic
     * Extent: Kuwait - onshore.
     * Fundamental point: K28.  Latitude: 29°03'42.348"N, longitude: 48°08'42.558"E (of Greenwich).
     */
    public const EPSG_KUWAIT_OIL_COMPANY = 'urn:ogc:def:datum:EPSG::6246';

    /**
     * Kuwait PWD
     * Type: Vertical
     * Extent: Kuwait - onshore.
     * Mean Low Low Water (MLLW) at Kuwait City.
     * Approximately 1.03m below MSL.
     */
    public const EPSG_KUWAIT_PWD = 'urn:ogc:def:datum:EPSG::5186';

    /**
     * Kuwait Utility
     * Type: Geodetic
     * Extent: Kuwait - Kuwait City.
     */
    public const EPSG_KUWAIT_UTILITY = 'urn:ogc:def:datum:EPSG::6319';

    /**
     * Kyrgyzstan Geodetic Datum 2006
     * Type: Geodetic
     * Extent: Kyrgyzstan.
     * 6 stations of the Kyrgyzstan zero-order network tied to ITRF2005 at epoch 2006.70.
     * The accuracy in the connection to ITRF2005 is estimated to be 5 mm in horizontal and 10-20 mm in height (95%
     * confidence).
     */
    public const EPSG_KYRGYZSTAN_GEODETIC_DATUM_2006 = 'urn:ogc:def:datum:EPSG::1160';

    /**
     * La Canoa
     * Type: Geodetic
     * Extent: Venezuela - onshore.
     * Fundamental point: La Canoa. Latitude: 8°34'17.170"N, longitude: 63°51'34.880"W (of Greenwich).
     * Origin and network incorporated within PSAD56 (datum code 6248).
     */
    public const EPSG_LA_CANOA = 'urn:ogc:def:datum:EPSG::6247';

    /**
     * La Gomera
     * Type: Vertical
     * Extent: Spain - Canary Islands - La Gomera onshore.
     * Mean Sea Level at San Sebastian de la Gomera harbour.
     * Orthometric heights.
     */
    public const EPSG_LA_GOMERA = 'urn:ogc:def:datum:EPSG::1282';

    /**
     * La Palma
     * Type: Vertical
     * Extent: Spain - Canary Islands - La Palma onshore.
     * Mean Sea Level at Santa Cruz de la Palma harbour in 1997.
     * Orthometric heights.
     */
    public const EPSG_LA_PALMA = 'urn:ogc:def:datum:EPSG::1283';

    /**
     * Lagos 1955
     * Type: Vertical
     * Extent: Nigeria - onshore.
     * Mean sea level at Lagos, 1912-1928.
     */
    public const EPSG_LAGOS_1955 = 'urn:ogc:def:datum:EPSG::5194';

    /**
     * Lake
     * Type: Geodetic
     * Extent: Venezuela - Lake Maracaibo area, onshore and offshore in lake.
     * Fundamental point: Maracaibo Cathedral. Latitude: 10°38'34.678"N, longitude: 71°36'20.224"W (of Greenwich).
     */
    public const EPSG_LAKE = 'urn:ogc:def:datum:EPSG::6249';

    /**
     * Landeshohennetz 1995
     * Type: Vertical
     * Extent: Liechtenstein; Switzerland.
     * Origin at Repere Pierre du Niton (RPN) defined as 373.6 metres above msl. This value derived from msl at
     * Marseille in 1897 through the French Lallemand network.
     * Orthometric heights. For scientific purposes only, replaces LN02.
     */
    public const EPSG_LANDESHOHENNETZ_1995 = 'urn:ogc:def:datum:EPSG::5128';

    /**
     * Landesnivellement 1902
     * Type: Vertical
     * Extent: Liechtenstein; Switzerland.
     * Origin at Repere Pierre du Niton (RPN) defined as 373.6 metres above msl. This value derived from msl at
     * Marseille in 1897 through the French Lallemand network.
     * Levelling observations not corrected for gravity field. For scientific purposes, replaced by LHHN95.
     */
    public const EPSG_LANDESNIVELLEMENT_1902 = 'urn:ogc:def:datum:EPSG::5127';

    /**
     * Landshaedarkerfi Islands 2004
     * Type: Vertical
     * Extent: Iceland - onshore.
     * Adjustment is referenced to mean sea level at Reykjavík epoch 2004.6.
     */
    public const EPSG_LANDSHAEDARKERFI_ISLANDS_2004 = 'urn:ogc:def:datum:EPSG::1190';

    /**
     * Lanzarote
     * Type: Vertical
     * Extent: Spain - Canary Islands - Lanzarote onshore.
     * Mean Sea Level at Naos harbour, Arrecife, between 1994 and 1995.
     * Orthometric heights.
     */
    public const EPSG_LANZAROTE = 'urn:ogc:def:datum:EPSG::1278';

    /**
     * Lao 1993
     * Type: Geodetic
     * Extent: Laos.
     * Fundamental point: Lao 1982 coordinates of Pakxa pillar. Latitude: 18°23'57.0056"N, longitude:
     * 103°38'41.8020"E (of Greenwich). Orientation parallel with WGS 84.
     * Replaces Vientiane 1982. Replaced by Lao 1997.
     */
    public const EPSG_LAO_1993 = 'urn:ogc:def:datum:EPSG::6677';

    /**
     * Lao National Datum 1997
     * Type: Geodetic
     * Extent: Laos.
     * Fundamental point: Vientiane (Nongteng) Astro Pillar. Latitude: 18°01'31.3480"N, longitude: 102°30'57.1376"E
     * (of Greenwich).
     * Replaces Lao 1993.
     */
    public const EPSG_LAO_NATIONAL_DATUM_1997 = 'urn:ogc:def:datum:EPSG::6678';

    /**
     * Latvia 1992
     * Type: Geodetic
     * Extent: Latvia - onshore and offshore.
     * Constrained to 4 ETRS89 points in Latvia from the EUREF Baltic 1992 campaign.
     * Densification of ETRS89 during the 1992 Baltic campaign.
     */
    public const EPSG_LATVIA_1992 = 'urn:ogc:def:datum:EPSG::6661';

    /**
     * Latvian Height System 2000
     * Type: Vertical
     * Extent: Latvia - onshore.
     * Latvian realisation of EVRF2007. Observed from 2000-2010 and reduced to epoch 2000.5 using empirical land uplift
     * model of Latvia. EVRF2007 heights of 16 points around Latvia held fixed.
     * Uses Normal heights.
     */
    public const EPSG_LATVIAN_HEIGHT_SYSTEM_2000 = 'urn:ogc:def:datum:EPSG::1162';

    /**
     * Le Pouce 1934
     * Type: Geodetic
     * Extent: Mauritius - mainland onshore.
     * Fundamental point: Le Pouce. Latitude: 20°11'42.25"S, longitude: 57°31'18.58"E (of Greenwich).
     */
    public const EPSG_LE_POUCE_1934 = 'urn:ogc:def:datum:EPSG::6699';

    /**
     * Leigon
     * Type: Geodetic
     * Extent: Ghana - onshore and offshore.
     * Fundamental point: GCS Station 121, Leigon. Latitude: 5°38'52.27"N, longitude: 0°11'46.08"W (of Greenwich).
     * Replaced Accra datum (code 6168) from 1978.  Coordinates at Leigon fundamental point defined as Accra datum
     * values for that point.
     */
    public const EPSG_LEIGON = 'urn:ogc:def:datum:EPSG::6250';

    /**
     * Lerwick
     * Type: Vertical
     * Extent: United Kingdom (UK) - Great Britain - Scotland - Shetland Islands onshore.
     * Mean Sea Level at Lerwick 1979 correlated to pre-1900. Initially realised through levelling network adjustment,
     * from 2002 redefined to be realised through OSGM geoid model.
     * Orthometric heights.
     */
    public const EPSG_LERWICK = 'urn:ogc:def:datum:EPSG::5140';

    /**
     * Liberia 1964
     * Type: Geodetic
     * Extent: Liberia - onshore.
     * Fundamental point: Robertsfield. Latitude: 6°13'53.02"N, longitude: 10°21'35.44"W (of Greenwich).
     */
    public const EPSG_LIBERIA_1964 = 'urn:ogc:def:datum:EPSG::6251';

    /**
     * Libyan Geodetic Datum 2006
     * Type: Geodetic
     * Extent: Libya - onshore and offshore.
     * 5 stations tied to ITRF2000 through 8 days of continuous observations in May 2006.
     * Replaces ELD79.
     */
    public const EPSG_LIBYAN_GEODETIC_DATUM_2006 = 'urn:ogc:def:datum:EPSG::6754';

    /**
     * Lisbon 1890
     * Type: Geodetic
     * Extent: Portugal - mainland - onshore.
     * Fundamental point: Castelo Sao Jorge, Lisbon. Latitude: 38°42'43.631"N, longitude: 9°07'54.862"W of Greenwich.
     * Replaced by Lisbon 1937 adjustment (which uses International 1924 ellipsoid).
     */
    public const EPSG_LISBON_1890 = 'urn:ogc:def:datum:EPSG::6666';

    /**
     * Lisbon 1890 (Lisbon)
     * Type: Geodetic
     * Extent: Portugal - mainland - onshore.
     * Fundamental point: Castelo Sao Jorge, Lisbon. Latitude: 38°42'43.631"N, longitude: 0°E (of Lisbon).
     * Replaced by Lisbon 1937 adjustment (which uses International 1924 ellipsoid).
     */
    public const EPSG_LISBON_1890_LISBON = 'urn:ogc:def:datum:EPSG::6904';

    /**
     * Lisbon 1937
     * Type: Geodetic
     * Extent: Portugal - mainland - onshore.
     * Fundamental point: Castelo Sao Jorge, Lisbon. Latitude: 38°42'43.631"N, longitude: 9°07'54.862"W (of
     * Greenwich).
     * Replaces Lisbon 1890 adjustment (which used Bessel 1841 ellipsoid).
     */
    public const EPSG_LISBON_1937 = 'urn:ogc:def:datum:EPSG::6207';

    /**
     * Lisbon 1937 (Lisbon)
     * Type: Geodetic
     * Extent: Portugal - mainland - onshore.
     * Fundamental point: Castelo Sao Jorge, Lisbon. Latitude: 38°42'43.631"N, longitude: 0°E (of Lisbon).
     * Replaces Lisbon 1890 adjustment (which used Bessel 1841 ellipsoid).
     */
    public const EPSG_LISBON_1937_LISBON = 'urn:ogc:def:datum:EPSG::6803';

    /**
     * Lithuania 1994 (ETRS89)
     * Type: Geodetic
     * Extent: Lithuania - onshore and offshore.
     * Constrained to 4 ETRS89 points in Lithuania from the EUREF Baltic 1992 campaign.
     * Densification of ETRS89 during the 1992 Baltic campaign.
     */
    public const EPSG_LITHUANIA_1994_ETRS89 = 'urn:ogc:def:datum:EPSG::6126';

    /**
     * Lithuanian Height System 2007
     * Type: Vertical
     * Extent: Lithuania - onshore.
     * Lithuanian realisation of EVRF2007. EVRF2007 heights of 10 points in Lithuania held fixed.
     * Uses Normal heights.
     */
    public const EPSG_LITHUANIAN_HEIGHT_SYSTEM_2007 = 'urn:ogc:def:datum:EPSG::1299';

    /**
     * Little Cayman Vertical Datum 1961
     * Type: Vertical
     * Extent: Cayman Islands - Little Cayman.
     */
    public const EPSG_LITTLE_CAYMAN_VERTICAL_DATUM_1961 = 'urn:ogc:def:datum:EPSG::1098';

    /**
     * Local Tidal Datum at Pago Pago 2020
     * Type: Vertical
     * Extent: American Samoa - Tutuila island.
     * MSL at Pago Pago 2011–2016.
     * Normal-orthometric heights. Replaces ASVD02 (datum code 1125) in March 2020 after the ASVD02 benchmarks were
     * destroyed by earthquake activity.
     */
    public const EPSG_LOCAL_TIDAL_DATUM_AT_PAGO_PAGO_2020 = 'urn:ogc:def:datum:EPSG::1302';

    /**
     * Locodjo 1965
     * Type: Geodetic
     * Extent: Côte d'Ivoire (Ivory Coast) - onshore and offshore.
     * Fundamental point: T5 Banco. Latitude: 5°18'50.5"N, longitude: 4°02'05.1"W (of Greenwich).
     */
    public const EPSG_LOCODJO_1965 = 'urn:ogc:def:datum:EPSG::6142';

    /**
     * Loma Quintana
     * Type: Geodetic
     * Extent: Venezuela - onshore north of approximately 7°45'N.
     * Fundamental point: Loma Quintana.
     * Replaced by La Canoa (code 6247).
     */
    public const EPSG_LOMA_QUINTANA = 'urn:ogc:def:datum:EPSG::6288';

    /**
     * Lome
     * Type: Geodetic
     * Extent: Togo - onshore and offshore.
     */
    public const EPSG_LOME = 'urn:ogc:def:datum:EPSG::6252';

    /**
     * Low Water
     * Type: Vertical
     * Extent: World.
     * The lowest level reached by the water surface in one tidal cycle. When used in inland (non-tidal) waters it is
     * generally defined as a level which the daily mean water level would fall below less than 5% of the time.
     * On a river it is a sloping surface. Users are advised to not use this generic vertical datum but to define
     * explicit realizations of low water by specifying location and epoch, for instance "Low water at xxx during
     * yyyy-yyyy".
     */
    public const EPSG_LOW_WATER = 'urn:ogc:def:datum:EPSG::1093';

    /**
     * Lower Low Water Large Tide
     * Type: Vertical
     * Extent: World.
     * The average of the lowest low waters, one from each of 19 years of observations.
     * Users are advised to not use this generic vertical datum but to define explicit realizations of LLWLT by
     * specifying location and epoch, for instance "LLWLT at xxx during yyyy-yyyy".
     */
    public const EPSG_LOWER_LOW_WATER_LARGE_TIDE = 'urn:ogc:def:datum:EPSG::1083';

    /**
     * Lowest Astronomical Tide
     * Type: Vertical
     * Extent: World.
     * The lowest tide level which can be predicted to occur under average meteorological conditions and under any
     * combination of astronomical conditions.
     * Users are advised to not use this generic vertical datum but to define explicit realizations of LAT by
     * specifying location and epoch, for instance "LAT at xxx during yyyy-yyyy".
     */
    public const EPSG_LOWEST_ASTRONOMICAL_TIDE = 'urn:ogc:def:datum:EPSG::1080';

    /**
     * Lowest Astronomical Tide Netherlands
     * Type: Vertical
     * Extent: Netherlands - offshore North Sea.
     * Surface defined through the nllat hydroid model applied to ETRS89.
     * The lowest tide level which can be predicted to occur under average meteorological conditions and under any
     * combination of astronomical conditions.
     */
    public const EPSG_LOWEST_ASTRONOMICAL_TIDE_NETHERLANDS = 'urn:ogc:def:datum:EPSG::1290';

    /**
     * Luxembourg Reference Frame
     * Type: Geodetic
     * Extent: Luxembourg.
     * Fundamental point of 1930 triangulation: northern station of Habay-la-Neuve baseline in Belgium. Latitude:
     * 49°43'24.408"N, longitude: 5°38'22.470"E (of Greenwich). Since 2006 LUREF has been realized by GNSS station
     * positions and transformation from ETRF.
     * The transformation from ETRF 2000 first defining LUREF in 2006 has been recomputed in 2014 and 2020.
     */
    public const EPSG_LUXEMBOURG_REFERENCE_FRAME = 'urn:ogc:def:datum:EPSG::6181';

    /**
     * Luzon 1911
     * Type: Geodetic
     * Extent: Philippines - onshore.
     * Fundamental point: Balacan. Latitude: 13°33'41.000"N, longitude: 121°52'03.000"E (of Greenwich).
     * Replaced by Philippine Reference system of 1992 (datum code 6683).
     */
    public const EPSG_LUZON_1911 = 'urn:ogc:def:datum:EPSG::6253';

    /**
     * Lyon Turin Ferroviaire 2004
     * Type: Geodetic
     * Extent: France and Italy - on or related to the rail route from Lyon to Turin.
     * Densification of ETRS89 realised through network of 40 stations adjusted to 7 EUREF reference stations in
     * ETRF2000@2002.0.
     */
    public const EPSG_LYON_TURIN_FERROVIAIRE_2004 = 'urn:ogc:def:datum:EPSG::1295';

    /**
     * Lyttelton 1937
     * Type: Vertical
     * Extent: New Zealand - South Island - between approximately 41°20'S and 45°S - Lyttleton vertical CRS area.
     * MSL at Lyttelton harbour over 9 years between 1918 and 1933.
     */
    public const EPSG_LYTTELTON_1937 = 'urn:ogc:def:datum:EPSG::5161';

    /**
     * M'poraloko
     * Type: Geodetic
     * Extent: Gabon - onshore and offshore.
     */
    public const EPSG_MPORALOKO = 'urn:ogc:def:datum:EPSG::6266';

    /**
     * MGI 1901
     * Type: Geodetic
     * Extent: Bosnia and Herzegovina; Croatia - onshore; Kosovo; Montenegro - onshore; North Macedonia; Serbia;
     * Slovenia - onshore.
     * Fundamental point: Hermannskogel. Latitude: 48°16'15.29"N, longitude: 16°17'55.04"E (of Greenwich).
     * The longitude of the datum origin equates to the Albrecht 1902 value for the Ferro meridian of 17°39'46.02"
     * west of Greenwich. Densified in 1948.
     */
    public const EPSG_MGI_1901 = 'urn:ogc:def:datum:EPSG::1031';

    /**
     * MML07 Intermediate Reference Frame
     * Type: Geodetic
     * Extent: United Kingdom (UK) - on or related to the Midland Mainline rail route from Sheffield to London.
     * Defined through the application of the MML07 NTv2 transformation (code 9369) to ETRS89 as realized through OSNet
     * v2009 CORS.
     * Created in 2020 to support intermediate CRS "MML07-IRF" in the emulation of the MML07 Snake map projection.
     */
    public const EPSG_MML07_INTERMEDIATE_REFERENCE_FRAME = 'urn:ogc:def:datum:EPSG::1271';

    /**
     * MOLDOR11 Intermediate Reference Frame
     * Type: Geodetic
     * Extent: United Kingdom (UK) - on or related to the rail route from Manchester via Ordsall Lane and the Hope
     * Valley to Dore Junction.
     * Defined through the application of the MOLDOR11 NTv2 transformation (code 9878) to ETRS89 as realized through
     * OSNet v2009 CORS.
     * Created in 2021 to support intermediate CRS "MOLDOR11-IRF" in the emulation of the MOLDOR11 Snake map
     * projection.
     */
    public const EPSG_MOLDOR11_INTERMEDIATE_REFERENCE_FRAME = 'urn:ogc:def:datum:EPSG::1315';

    /**
     * MOLDREF99
     * Type: Geodetic
     * Extent: Moldova.
     * Densification of ETRS89.
     */
    public const EPSG_MOLDREF99 = 'urn:ogc:def:datum:EPSG::1032';

    /**
     * MOMRA Terrestrial Reference Frame 2000
     * Type: Geodetic
     * Extent: Saudi Arabia - onshore and offshore.
     * ITRF2000 at epoch 2004.00.
     * 13 CORS Fiducial Stations linked to 7 IGS stations by 10-day long GPS survey.
     */
    public const EPSG_MOMRA_TERRESTRIAL_REFERENCE_FRAME_2000 = 'urn:ogc:def:datum:EPSG::1218';

    /**
     * MOMRA Vertical Geodetic Control
     * Type: Vertical
     * Extent: Saudi Arabia - onshore.
     * Mean sea level Jeddah 1969.
     */
    public const EPSG_MOMRA_VERTICAL_GEODETIC_CONTROL = 'urn:ogc:def:datum:EPSG::1219';

    /**
     * MOP78
     * Type: Geodetic
     * Extent: Wallis and Futuna - Wallis.
     */
    public const EPSG_MOP78 = 'urn:ogc:def:datum:EPSG::6639';

    /**
     * MRH21 Intermediate Reference Frame
     * Type: Geodetic
     * Extent: United Kingdom (UK) - on or related to Midland Rail Hub, covering routes through Cardiff, Bristol,
     * Gloucester, Derby, Birmingham, Leicester, and Lincoln.
     * Defined through the application of the MRH21 NTv2 transformation to ETRS89 as realized through OSNet v2009 CORS.
     * Created in 2021 to support intermediate CRS "MRH21-IRF" in the emulation of the MRH21 Snake map projection.
     */
    public const EPSG_MRH21_INTERMEDIATE_REFERENCE_FRAME = 'urn:ogc:def:datum:EPSG::1314';

    /**
     * MWC18 Intermediate Reference Frame
     * Type: Geodetic
     * Extent: United Kingdom (UK) - on or related to the rail route from Manchester via Wigan and Liverpool to
     * Chester.
     * Defined through the application of the MWC18 NTv2 transformation to ETRS89 as realized through OSNet v2009 CORS.
     * Created in 2022 to support intermediate CRS "MWC18" in the emulation of the MWC18 Snake map projection.
     */
    public const EPSG_MWC18_INTERMEDIATE_REFERENCE_FRAME = 'urn:ogc:def:datum:EPSG::1324';

    /**
     * Macao 1920
     * Type: Geodetic
     * Extent: China - Macao - onshore and offshore.
     * Fundamental point: Avenida Conselheiro Borja base A, later transferred to Monte da Barra, latitude
     * 22°11'03.139"N, longitude 113°31'43.625"E (of Greenwich).
     * Replaces Macao 1907. In 1955 an adjustment made in 1940 was assessed to have unresolvable conflicts and the 1920
     * adjustment was reinstated.
     */
    public const EPSG_MACAO_1920 = 'urn:ogc:def:datum:EPSG::1207';

    /**
     * Macao Geodetic Datum 2008
     * Type: Geodetic
     * Extent: China - Macao - onshore and offshore.
     * ITRF2005 at epoch 2008.38.
     * Locally sometimes referred to as ITRF2005, this is not strictly correct as it applies only at epoch 2008.38 and
     * ignores subsequent tectonic plate motion.
     */
    public const EPSG_MACAO_GEODETIC_DATUM_2008 = 'urn:ogc:def:datum:EPSG::1208';

    /**
     * Macao Height Datum
     * Type: Vertical
     * Extent: China - Macao - onshore and offshore.
     * Mean sea level Ma Kau Seak 1925-1964.
     */
    public const EPSG_MACAO_HEIGHT_DATUM = 'urn:ogc:def:datum:EPSG::1210';

    /**
     * Madrid 1870 (Madrid)
     * Type: Geodetic
     * Extent: Spain - mainland onshore.
     * Fundamental point: Retiro observatory, Madrid.
     * Replaced by ED50.
     */
    public const EPSG_MADRID_1870_MADRID = 'urn:ogc:def:datum:EPSG::6903';

    /**
     * Madzansua
     * Type: Geodetic
     * Extent: Mozambique - west - Tete province.
     * Fundamental point: Madzansua.
     * Replaced by transformation to Tete datum (datum code 6127).
     */
    public const EPSG_MADZANSUA = 'urn:ogc:def:datum:EPSG::6128';

    /**
     * Mahe 1971
     * Type: Geodetic
     * Extent: Seychelles - Mahe Island.
     * Fundamental point: Station SITE. Latitude: 4°40'14.644"S, longitude: 55°28'44.488"E (of Greenwich).
     * South East Island 1943 (datum code 1138) used for topographic mapping, cadastral and hydrographic survey.
     */
    public const EPSG_MAHE_1971 = 'urn:ogc:def:datum:EPSG::6256';

    /**
     * Makassar
     * Type: Geodetic
     * Extent: Indonesia - south west Sulawesi.
     * Fundamental point: station P1, Moncongloe. Latitude: 5°08'41.42"S, long 119°24'14.94"E (of Greenwich).
     */
    public const EPSG_MAKASSAR = 'urn:ogc:def:datum:EPSG::6257';

    /**
     * Makassar (Jakarta)
     * Type: Geodetic
     * Extent: Indonesia - south west Sulawesi.
     * Fundamental point: station P1, Moncongloe. Latitude 5°08'41.42"S, longitude 12°35'47.15"E (of Jakarta).
     */
    public const EPSG_MAKASSAR_JAKARTA = 'urn:ogc:def:datum:EPSG::6804';

    /**
     * Malin Head
     * Type: Vertical
     * Extent: Ireland - onshore. United Kingdom (UK) - Northern Ireland (Ulster) - onshore.
     * Mean sea level between January 1960 and December 1969. Initially realised through levelling network adjustment,
     * from 2002 redefined to be realised through OSGM geoid model.
     * Orthometric heights.
     */
    public const EPSG_MALIN_HEAD = 'urn:ogc:def:datum:EPSG::5130';

    /**
     * Mallorca
     * Type: Vertical
     * Extent: Spain - Balearic Islands - Mallorca onshore.
     * Mean Sea Level at Palma de Mallorca harbour between April 1997 and December 2006.
     * Orthometric heights.
     */
    public const EPSG_MALLORCA = 'urn:ogc:def:datum:EPSG::1275';

    /**
     * Malongo 1987
     * Type: Geodetic
     * Extent: Angola (Cabinda) - offshore; The Democratic Republic of the Congo (Zaire) - offshore.
     * Fundamental point: Station Y at Malongo base camp. Latitude: 5°23'30.810"S, longitude: 12°12'01.590"E (of
     * Greenwich).
     * Replaced Mhast (offshore) (code 6705) in 1987. Origin coordinates constrained to those of Mhast (offshore) but
     * other station coordinates differ. References to "Mhast" since 1987 often should have stated "Malongo 1987".
     */
    public const EPSG_MALONGO_1987 = 'urn:ogc:def:datum:EPSG::6259';

    /**
     * Manoca 1962
     * Type: Geodetic
     * Extent: Cameroon - coastal area.
     * Reservoir centre at the  Manoca tower ("tube Suel"), 3°51'49.896"N, 9°36'49.347"E (of Greenwich).
     * The intent of the Bukavu 1953 conference was to adopt the Clarke 1880 (RGS) ellipsoid (code 7012) but in
     * practice this datum has used the IGN version.  Replaces Douala 1948 (code 6192).
     */
    public const EPSG_MANOCA_1962 = 'urn:ogc:def:datum:EPSG::6193';

    /**
     * Maputo
     * Type: Vertical
     * Extent: Mozambique - onshore.
     * Mean sea level at Maputo.
     */
    public const EPSG_MAPUTO = 'urn:ogc:def:datum:EPSG::5121';

    /**
     * Marco Geocentrico Nacional de Referencia
     * Type: Geodetic
     * Extent: Colombia - onshore and offshore. Includes San Andres y Providencia, Malpelo Islands, Roncador Bank,
     * Serrana Bank and Serranilla Bank.
     * Densification of SIRGAS95 (ITRF94 at epoch 1995.4) in Colombia. Bogota observatory coordinates: Latitude:
     * 4°35'46.3215"N, longitude: 74°04'39.0285"W (of Greenwich).
     * Densification of SIRGAS 1995 within Colombia. Replaces Bogota 1975 (datum code 6218).
     */
    public const EPSG_MARCO_GEOCENTRICO_NACIONAL_DE_REFERENCIA = 'urn:ogc:def:datum:EPSG::6686';

    /**
     * Marco Geodesico Nacional de Bolivia
     * Type: Geodetic
     * Extent: Bolivia.
     * IGS05 (ITRF2005) at epoch 2010.2.  Densification of SIRGAS95 network in Bolivia, consisting of 125 passive
     * geodetic stations and 8 continuous recording GPS stations.
     * Densification of SIRGAS 1995 within Bolivia. Replaces PSAD56 (datum code 6248) in Bolivia.
     */
    public const EPSG_MARCO_GEODESICO_NACIONAL_DE_BOLIVIA = 'urn:ogc:def:datum:EPSG::1063';

    /**
     * Marcus Island 1952
     * Type: Geodetic
     * Extent: Japan - onshore - Tokyo-to south of 28°N and east of 143°E - Minamitori-shima (Marcus Island).
     * Marcus Island Astronomic Station.
     */
    public const EPSG_MARCUS_ISLAND_1952 = 'urn:ogc:def:datum:EPSG::6711';

    /**
     * Marshall Islands 1960
     * Type: Geodetic
     * Extent: Marshall Islands - onshore. Wake atoll onshore.
     */
    public const EPSG_MARSHALL_ISLANDS_1960 = 'urn:ogc:def:datum:EPSG::6732';

    /**
     * Martinique 1938
     * Type: Geodetic
     * Extent: Martinique - onshore.
     * Fundamental point: Fort Desaix. Latitude: 14°36'54.090"N, longitude: 61°04'04.030"W (of Greenwich).
     * Replaced by RRAF 1991 (datum code 1047).
     */
    public const EPSG_MARTINIQUE_1938 = 'urn:ogc:def:datum:EPSG::6625';

    /**
     * Martinique 1955
     * Type: Vertical
     * Extent: Martinique - onshore.
     * Mean sea level at Fort de France 1939. Marker DO-4-II on quay wall with elevation of 1.38m above msl.
     * Orthometric heights. Replaced by Martinique 1987 (datum code 5154).
     */
    public const EPSG_MARTINIQUE_1955 = 'urn:ogc:def:datum:EPSG::5192';

    /**
     * Martinique 1987
     * Type: Vertical
     * Extent: Martinique - onshore.
     * Mean sea level 1939 at Fort de France. Origin = marker Nbc2 on rebuilt quay wall with defined elevation of 1.38m
     * above msl. Martinique 1987 height 0.00m is 0.56m above SHOM sounding datum.
     * Orthometric heights. Replaces Martinique 1955 (datum code 5192).
     */
    public const EPSG_MARTINIQUE_1987 = 'urn:ogc:def:datum:EPSG::5154';

    /**
     * Massawa
     * Type: Geodetic
     * Extent: Eritrea - onshore and offshore.
     */
    public const EPSG_MASSAWA = 'urn:ogc:def:datum:EPSG::6262';

    /**
     * Maupiti 83
     * Type: Geodetic
     * Extent: French Polynesia - Society Islands - Maupiti.
     * Fundamental point: Pitiahe South Base. Latitude: 16°28'28.942"S, longitude: 152°14'55.059"W (of Greenwich).
     * Replaced by RGPF (datum code 6687).
     */
    public const EPSG_MAUPITI_83 = 'urn:ogc:def:datum:EPSG::6692';

    /**
     * Maupiti SAU 2001
     * Type: Vertical
     * Extent: French Polynesia - Society Islands - Maupiti.
     * Fundamental benchmark: RN11
     * Included as part of NGPF - see datum code 5195.
     */
    public const EPSG_MAUPITI_SAU_2001 = 'urn:ogc:def:datum:EPSG::5199';

    /**
     * Mauritania 1999
     * Type: Geodetic
     * Extent: Mauritania - onshore and offshore.
     * ITRF96 at epoch 1997.0
     * A network of 36 GPS stations tied to ITRF96, 8 of which are IGN 1962 astronomic points.
     */
    public const EPSG_MAURITANIA_1999 = 'urn:ogc:def:datum:EPSG::6702';

    /**
     * Mayotte 1950
     * Type: Vertical
     * Extent: Mayotte - onshore.
     * IGN 1950 marker (height 0.0m) on southwest jetty at Dzaoudzi (Petite-Terre) is 2.18m above zero of tide gauge.
     * SHOM 1953 marker on east (Issoufali) jetty at Dzaoudzi (height 4.74m) is the base for Mayotte heights.
     * Datum transferred to benchmark RN0 with height of 2.774m above tide gauge on eastern jetty at Mamoudzou
     * (Grand-Terre) in 1979.
     */
    public const EPSG_MAYOTTE_1950 = 'urn:ogc:def:datum:EPSG::5191';

    /**
     * Mean High Water
     * Type: Vertical
     * Extent: World.
     * The average height of the high waters at a place over a 19-year period.
     * Users are advised to not use this generic vertical datum but to define explicit realizations of MHW by
     * specifying location and epoch, for instance "MHW at xxx during yyyy-yyyy".
     */
    public const EPSG_MEAN_HIGH_WATER = 'urn:ogc:def:datum:EPSG::1092';

    /**
     * Mean High Water Spring Tides
     * Type: Vertical
     * Extent: World.
     * The average height of the high waters of spring tides.
     * Users are advised to not use this generic vertical datum but to define explicit realizations of MHWS by
     * specifying location and epoch, for instance "MHWS at xxx during yyyy-yyyy".
     */
    public const EPSG_MEAN_HIGH_WATER_SPRING_TIDES = 'urn:ogc:def:datum:EPSG::1088';

    /**
     * Mean Higher High Water
     * Type: Vertical
     * Extent: World.
     * The average height of the higher high waters at a place over a 19-year period.
     * Users are advised to not use this generic vertical datum but to define explicit realizations of MHHW by
     * specifying location and epoch, for instance "MHHW at xxx during yyyy-yyyy".
     */
    public const EPSG_MEAN_HIGHER_HIGH_WATER = 'urn:ogc:def:datum:EPSG::1090';

    /**
     * Mean Low Water
     * Type: Vertical
     * Extent: World.
     * The average height of all low waters at a place over a 19-year period.
     * Users are advised to not use this generic vertical datum but to define explicit realizations of MLW by
     * specifying location and epoch, for instance "MLW at xxx during yyyy-yyyy".
     */
    public const EPSG_MEAN_LOW_WATER = 'urn:ogc:def:datum:EPSG::1091';

    /**
     * Mean Low Water Spring Tides
     * Type: Vertical
     * Extent: World.
     * The average height of the low waters of spring tides.
     * Users are advised to not use this generic vertical datum but to define explicit realizations of MLWS by
     * specifying location and epoch, for instance "MLWS at xxx during yyyy-yyyy".
     */
    public const EPSG_MEAN_LOW_WATER_SPRING_TIDES = 'urn:ogc:def:datum:EPSG::1087';

    /**
     * Mean Lower Low Water
     * Type: Vertical
     * Extent: World.
     * The average height of the lower low waters at a place over a 19-year period.
     * Users are advised to not use this generic vertical datum but to define explicit realizations of MLLW by
     * specifying location and epoch, for instance "MLLW at xxx during yyyy-yyyy".
     */
    public const EPSG_MEAN_LOWER_LOW_WATER = 'urn:ogc:def:datum:EPSG::1089';

    /**
     * Mean Lower Low Water Spring Tides
     * Type: Vertical
     * Extent: World.
     * The average height of the lower low water spring tides at a place.
     * Users are advised to not use this generic vertical datum but to define explicit realizations of MLLWS by
     * specifying location and epoch, for instance "MLLWS at xxx during yyyy-yyyy".
     */
    public const EPSG_MEAN_LOWER_LOW_WATER_SPRING_TIDES = 'urn:ogc:def:datum:EPSG::1086';

    /**
     * Mean Sea Level
     * Type: Vertical
     * Extent: World.
     * The average height of the surface of the sea at a tide station for all stages of the tide over a 19-year period,
     * usually determined from hourly height readings measured from a fixed predetermined reference level.
     * Approximates geoid. Users are advised to not use this generic vertical datum but to define explicit realizations
     * of MSL by specifying location and epoch, for instance "MSL at xxx during yyyy-yyyy".
     */
    public const EPSG_MEAN_SEA_LEVEL = 'urn:ogc:def:datum:EPSG::5100';

    /**
     * Mean Sea Level Netherlands
     * Type: Vertical
     * Extent: Netherlands - offshore North Sea.
     * Surface defined through the nlgeo geoid model applied to ETRS89.
     * Coincides with NAP datum plane. Approximates physical mean sea surface to a few decimetres.
     */
    public const EPSG_MEAN_SEA_LEVEL_NETHERLANDS = 'urn:ogc:def:datum:EPSG::1270';

    /**
     * Menorca
     * Type: Vertical
     * Extent: Spain - Balearic Islands - Menorca onshore.
     * Mean Sea Level at Ciutadella harbour between June 2007 and June 2008.
     * Orthometric heights.
     */
    public const EPSG_MENORCA = 'urn:ogc:def:datum:EPSG::1276';

    /**
     * Merchich
     * Type: Geodetic
     * Extent: Africa - Morocco and Western Sahara - onshore.
     * Fundamental point: Merchich. Latitude: 33°26'59.672"N, longitude: 7°33'27.295"W (of Greenwich).
     */
    public const EPSG_MERCHICH = 'urn:ogc:def:datum:EPSG::6261';

    /**
     * Mexico ITRF2008
     * Type: Geodetic
     * Extent: Mexico - onshore and offshore.
     * ITRF2008 at epoch 2010.00.
     * Realised by a frame of 15 active GPS stations observed and adjusted in the ITRF2008. Includes ties to tide
     * gauges. Replaces Mexico ITRF92 (datum code 1042).
     */
    public const EPSG_MEXICO_ITRF2008 = 'urn:ogc:def:datum:EPSG::1120';

    /**
     * Mexico ITRF92
     * Type: Geodetic
     * Extent: Mexico - onshore and offshore.
     * ITRF1992 at epoch 1988.00.
     * Realized by a frame of 15 active GPS stations observed and adjusted in the ITRF1992. Includes ties to tide
     * gauges. Replaces NAD27 (datum code 6267). Replaced by Mexico ITRF2008 (datum code 1120) from December 2010.
     */
    public const EPSG_MEXICO_ITRF92 = 'urn:ogc:def:datum:EPSG::1042';

    /**
     * Mhast (offshore)
     * Type: Geodetic
     * Extent: Angola (Cabinda) - offshore; The Democratic Republic of the Congo (Zaire) - offshore.
     * Fundamental point: Station Y at Malongo base camp. Latitude: 5°23'30.810"S, longitude: 12°12'01.590"E (of
     * Greenwich).
     * Origin coordinates determined by Transit single point position using 32 passes and transformed from WGS72BE
     * using transformation code 15790. Differs from Mhast (onshore) by approximately 10m. Replaced in 1987 by Malongo
     * 1987 (code 6259).
     */
    public const EPSG_MHAST_OFFSHORE = 'urn:ogc:def:datum:EPSG::6705';

    /**
     * Mhast (onshore)
     * Type: Geodetic
     * Extent: Angola (Cabinda) - onshore and offshore; The Democratic Republic of the Congo (Zaire) - onshore coastal
     * area and offshore.
     * Probably adopted a Mhast 1951 coordinate set but associated an incorrect ellipsoid with it.
     * Adopted by oil industry with intention of being Mhast 1951 (code 6703) but incorrectly (for Mhast 1951) used the
     * International 1924 ellipsoid. This datum differs by about 400 metres from the Portuguese Mhast 1951 and Camacupa
     * datums.
     */
    public const EPSG_MHAST_ONSHORE = 'urn:ogc:def:datum:EPSG::6704';

    /**
     * Midway 1961
     * Type: Geodetic
     * Extent: United States Minor Outlying Islands - Midway Islands - Sand Island and Eastern Island.
     */
    public const EPSG_MIDWAY_1961 = 'urn:ogc:def:datum:EPSG::6727';

    /**
     * Militar-Geographische Institut
     * Type: Geodetic
     * Extent: Austria.
     * Fundamental point: Hermannskogel. Latitude: 48°16'15.29"N, longitude: 16°17'41.06"E (of Greenwich).
     * The longitude of the datum origin equates to a value for the Ferro meridian of 17°40' exactly west of
     * Greenwich.
     */
    public const EPSG_MILITAR_GEOGRAPHISCHE_INSTITUT = 'urn:ogc:def:datum:EPSG::6312';

    /**
     * Militar-Geographische Institut (Ferro)
     * Type: Geodetic
     * Extent: Austria. Bosnia and Herzegovina. Croatia - onshore. Kosovo. Montenegro - onshore. North Macedonia.
     * Serbia. Slovenia - onshore.
     * Fundamental point: Hermannskogel. Latitude: 48°16'15.29"N, longitude: 33°57'41.06"E (of Ferro).
     * Replaced by MGI in Austria and MGI 1901 in former Yugoslavia.
     */
    public const EPSG_MILITAR_GEOGRAPHISCHE_INSTITUT_FERRO = 'urn:ogc:def:datum:EPSG::6805';

    /**
     * Ministerio de Marina Norte
     * Type: Geodetic
     * Extent: Argentina - Tierra del Fuego onshore.
     * Developed by the Servicio de Hidrografia Naval.
     */
    public const EPSG_MINISTERIO_DE_MARINA_NORTE = 'urn:ogc:def:datum:EPSG::1258';

    /**
     * Ministerio de Marina Sur
     * Type: Geodetic
     * Extent: Argentina - Tierra del Fuego onshore.
     * Developed by the Servicio de Hidrografia Naval.
     */
    public const EPSG_MINISTERIO_DE_MARINA_SUR = 'urn:ogc:def:datum:EPSG::1259';

    /**
     * Minna
     * Type: Geodetic
     * Extent: Nigeria - onshore and offshore.
     * Fundamental point: Minna base station L40. Latitude: 9°38'08.87"N, longitude: 6°30'58.76"E (of Greenwich).
     */
    public const EPSG_MINNA = 'urn:ogc:def:datum:EPSG::6263';

    /**
     * Missao Hidrografico Angola y Sao Tome 1951
     * Type: Geodetic
     * Extent: Angola - Cabinda.
     * Extension of Camacupa datum into Cabinda.
     * A variation of this datum has been adopted by the oil industry but incorrectly using the International 1924
     * ellipsoid and not tied to the official Portuguese triangulation - see Mhast (onshore) and Mhast (offshore)
     * (codes 6704 and 6705).
     */
    public const EPSG_MISSAO_HIDROGRAFICO_ANGOLA_Y_SAO_TOME_1951 = 'urn:ogc:def:datum:EPSG::6703';

    /**
     * Monte Mario
     * Type: Geodetic
     * Extent: Italy - onshore and offshore; San Marino, Vatican City State.
     * Fundamental point: Monte Mario. Latitude: 41°55'25.51"N, longitude: 12°27'08.4"E (of Greenwich).
     * Replaced Genova datum, Bessel 1841 ellipsoid, from 1940.
     */
    public const EPSG_MONTE_MARIO = 'urn:ogc:def:datum:EPSG::6265';

    /**
     * Monte Mario (Rome)
     * Type: Geodetic
     * Extent: Italy - onshore and offshore; San Marino, Vatican City State.
     * Fundamental point: Monte Mario. Latitude: 41°55'25.51"N, longitude: 0°00' 00.00"E (of Rome).
     * Replaced Genova datum, Bessel 1841 ellipsoid, from 1940.
     */
    public const EPSG_MONTE_MARIO_ROME = 'urn:ogc:def:datum:EPSG::6806';

    /**
     * Montserrat 1958
     * Type: Geodetic
     * Extent: Montserrat - onshore.
     * Fundamental point: station M36.
     */
    public const EPSG_MONTSERRAT_1958 = 'urn:ogc:def:datum:EPSG::6604';

    /**
     * Moorea 87
     * Type: Geodetic
     * Extent: French Polynesia - Society Islands - Moorea.
     * Two stations on Tahiti whose coordinates from the Tahiti 1979 adjustment were held fixed.
     * Replaces Tahiti 52 (datum code 6628) in Moorea. Replaced by RGPF (datum code 6687).
     */
    public const EPSG_MOOREA_87 = 'urn:ogc:def:datum:EPSG::6691';

    /**
     * Moorea SAU 1981
     * Type: Vertical
     * Extent: French Polynesia - Society Islands - Moorea.
     * Fundamental benchmark: RN225
     * Included as part of NGPF - see datum code 5195.
     */
    public const EPSG_MOOREA_SAU_1981 = 'urn:ogc:def:datum:EPSG::5197';

    /**
     * Moturiki 1953
     * Type: Vertical
     * Extent: New Zealand - North Island - Moturiki vertical CRS area.
     * MSL at Moturiki Island February 1949 to December 1952.
     */
    public const EPSG_MOTURIKI_1953 = 'urn:ogc:def:datum:EPSG::5162';

    /**
     * Mount Dillon
     * Type: Geodetic
     * Extent: Trinidad and Tobago - Tobago - onshore.
     * Fundamental point: Mount Dillon triangulation station. Latitude: 11°15'07.843"N, longitude: 60°41'09.632"W (of
     * Greenwich).
     */
    public const EPSG_MOUNT_DILLON = 'urn:ogc:def:datum:EPSG::6157';

    /**
     * Moznet (ITRF94)
     * Type: Geodetic
     * Extent: Mozambique - onshore and offshore.
     * ITRF94 at epoch 1996.9.
     */
    public const EPSG_MOZNET_ITRF94 = 'urn:ogc:def:datum:EPSG::6130';

    /**
     * N2000
     * Type: Vertical
     * Extent: Finland - onshore.
     * Height at Metsaahovi (latitude 60.21762°N, longitude 24.39517°E) of 54.4233m related to EVRF2000 origin
     * through Baltic Levelling Ring adjustment at epoch 2000.0.
     * Realized through the third precise levelling network. Uses normal heights. Replaces N43 and N60 (datum codes
     * 1213 and 5116). To account for isostatic land uplift use NKG2005 model.
     */
    public const EPSG_N2000 = 'urn:ogc:def:datum:EPSG::1030';

    /**
     * NAD83 (Continuously Operating Reference Station 1996)
     * Type: Geodetic
     * Extent: Puerto Rico - onshore and offshore. United States (USA) onshore and offshore - Alabama; Alaska; Arizona;
     * Arkansas; California; Colorado; Connecticut; Delaware; Florida; Georgia; Idaho; Illinois; Indiana; Iowa; Kansas;
     * Kentucky; Louisiana; Maine; Maryland; Massachusetts; Michigan; Minnesota; Mississippi; Missouri; Montana;
     * Nebraska; Nevada; New Hampshire; New Jersey; New Mexico; New York; North Carolina; North Dakota; Ohio; Oklahoma;
     * Oregon; Pennsylvania; Rhode Island; South Carolina; South Dakota; Tennessee; Texas; Utah; Vermont; Virginia;
     * Washington; West Virginia; Wisconsin; Wyoming. US Virgin Islands - onshore and offshore.
     * Defined by time-dependent transformations from ITRF (see CT codes 6864-6866). The ITRF realization used has been
     * changed periodically; ITRF96 in years 1997 through 1999, ITRF97 in 2000 and 2001 and ITRF2000 from 2002.
     * Replaced by NAD83(2011) from 2011-09-06.
     */
    public const EPSG_NAD83_CONTINUOUSLY_OPERATING_REFERENCE_STATION_1996 = 'urn:ogc:def:datum:EPSG::1133';

    /**
     * NAD83 (Federal Base Network)
     * Type: Geodetic
     * Extent: American Samoa - Tutuila, Aunu'u, Ofu, Olesega, Ta'u and Rose islands - onshore. Guam - onshore.
     * Northern Mariana Islands - onshore. Puerto Rico - onshore. United States (USA) - CONUS - Alabama; Arizona;
     * Arkansas; California; Colorado; Connecticut; Delaware; Florida; Georgia; Idaho; Illinois; Indiana; Iowa; Kansas;
     * Kentucky; Louisiana; Maine; Maryland; Massachusetts; Michigan; Minnesota; Mississippi; Missouri; Montana;
     * Nebraska; Nevada; New Hampshire; New Jersey; New Mexico; New York; North Carolina; North Dakota; Ohio; Oklahoma;
     * Oregon; Pennsylvania; Rhode Island; South Carolina; South Dakota; Tennessee; Texas; Utah; Vermont; Virginia;
     * Washington; West Virginia; Wisconsin; Wyoming - onshore plus Gulf of Mexico offshore continental shelf (GoM
     * OCS). US Virgin Islands - onshore.
     * A collection of individual state-wide adjustments including GPS observations made between 1997 and 2004.
     * In CA CT FL ID MA ME MT NC NH NJ NV NY OR RI SC TN VT WA and WI, replaces the early 1990s HARN adjustment. In
     * rest of CONUS the difference between the HARN and FBN adjustments was under 5cm and the original HARN
     * adjustments were adopted as NAD83(FBN).
     */
    public const EPSG_NAD83_FEDERAL_BASE_NETWORK = 'urn:ogc:def:datum:EPSG::1211';

    /**
     * NAD83 (High Accuracy Reference Network - Corrected)
     * Type: Geodetic
     * Extent: Puerto Rico and US Virgin Islands - onshore.
     * In PRVI replaces NAD83(HARN) to correct errors. Replaced by NAD83(FBN).
     */
    public const EPSG_NAD83_HIGH_ACCURACY_REFERENCE_NETWORK_CORRECTED = 'urn:ogc:def:datum:EPSG::1212';

    /**
     * NAD83 (High Accuracy Reference Network)
     * Type: Geodetic
     * Extent: American Samoa - onshore - Tutuila, Aunu'u, Ofu, Olesega, Ta'u and Rose islands. Guam - onshore.
     * Northern Mariana Islands - onshore. Puerto Rico - onshore. United States (USA) - onshore Alabama, Alaska,
     * Arizona, Arkansas, California, Colorado, Connecticut, Delaware, Florida, Georgia, Hawaii, Idaho, Illinois,
     * Indiana, Iowa, Kansas, Kentucky, Louisiana, Maine, Maryland, Massachusetts, Michigan, Minnesota, Mississippi,
     * Missouri, Montana, Nebraska, Nevada, New Hampshire, New Jersey, New Mexico, New York, North Carolina, North
     * Dakota, Ohio, Oklahoma, Oregon, Pennsylvania, Rhode Island, South Carolina, South Dakota, Tennessee, Texas,
     * Utah, Vermont, Virginia, Washington, West Virginia, Wisconsin and Wyoming; offshore Gulf of Mexico continental
     * shelf (GoM OCS). US Virgin Islands - onshore.
     * A collection of individual state-wide adjustments including GPS observations made between 1991 and 1996.
     * In CONUS, American Samoa and Guam replaced by NAD83(FBN). In Alaska replaced by NAD83(NSRS2007). In Hawaii
     * replaced by NAD83(PA11). In Puerto Rico and US Virgin Islands replaced by NAD83(HARN Corrected).
     */
    public const EPSG_NAD83_HIGH_ACCURACY_REFERENCE_NETWORK = 'urn:ogc:def:datum:EPSG::6152';

    /**
     * NAD83 (National Spatial Reference System 2007)
     * Type: Geodetic
     * Extent: Puerto Rico - onshore and offshore. United States (USA) onshore and offshore - Alabama; Alaska; Arizona;
     * Arkansas; California; Colorado; Connecticut; Delaware; Florida; Georgia; Idaho; Illinois; Indiana; Iowa; Kansas;
     * Kentucky; Louisiana; Maine; Maryland; Massachusetts; Michigan; Minnesota; Mississippi; Missouri; Montana;
     * Nebraska; Nevada; New Hampshire; New Jersey; New Mexico; New York; North Carolina; North Dakota; Ohio; Oklahoma;
     * Oregon; Pennsylvania; Rhode Island; South Carolina; South Dakota; Tennessee; Texas; Utah; Vermont; Virginia;
     * Washington; West Virginia; Wisconsin; Wyoming. US Virgin Islands - onshore and offshore.
     * Coordinates of 486 national continually operating reference system (CORS) and 195 collaborative GPS (CGPS) sites
     * constrained to their CORS96 values, ITRF2000 at epoch 2002.0.
     * Replaced by NAD83 (National Spatial Reference System 2011), datum code 1116.
     */
    public const EPSG_NAD83_NATIONAL_SPATIAL_REFERENCE_SYSTEM_2007 = 'urn:ogc:def:datum:EPSG::6759';

    /**
     * NAD83 (National Spatial Reference System 2011)
     * Type: Geodetic
     * Extent: Puerto Rico - onshore and offshore. United States (USA) onshore and offshore - Alabama; Alaska; Arizona;
     * Arkansas; California; Colorado; Connecticut; Delaware; Florida; Georgia; Idaho; Illinois; Indiana; Iowa; Kansas;
     * Kentucky; Louisiana; Maine; Maryland; Massachusetts; Michigan; Minnesota; Mississippi; Missouri; Montana;
     * Nebraska; Nevada; New Hampshire; New Jersey; New Mexico; New York; North Carolina; North Dakota; Ohio; Oklahoma;
     * Oregon; Pennsylvania; Rhode Island; South Carolina; South Dakota; Tennessee; Texas; Utah; Vermont; Virginia;
     * Washington; West Virginia; Wisconsin; Wyoming. US Virgin Islands - onshore and offshore.
     * Coordinates of a nationwide adjustment of 79,546 NGS "passive" control stations in CONUS and Alaska, constrained
     * to 1,171 current CORS station coordinates at epoch 2010.0.
     * Replaces NAD83(NSRS2007). Transformaton code 7807 from ITRF2008 is understood to underlay the  CORS station
     * coordinates.
     */
    public const EPSG_NAD83_NATIONAL_SPATIAL_REFERENCE_SYSTEM_2011 = 'urn:ogc:def:datum:EPSG::1116';

    /**
     * NAD83 (National Spatial Reference System MA11)
     * Type: Geodetic
     * Extent: Guam, Northern Mariana Islands and Palau; onshore and offshore.
     * Coordinates of a nationwide adjustment including 171 NGS "passive" control stations constrained to 24 current
     * Pacific CORS station coordinates at epoch 2010.0.
     * Replaces NAD83(HARN) (GGN93) and NAD83(FBN) in Guam. ITRF2008 is understood to underlay the latest CORS station
     * coordinates.
     */
    public const EPSG_NAD83_NATIONAL_SPATIAL_REFERENCE_SYSTEM_MA11 = 'urn:ogc:def:datum:EPSG::1118';

    /**
     * NAD83 (National Spatial Reference System PA11)
     * Type: Geodetic
     * Extent: American Samoa, Marshall Islands, United States (USA) - Hawaii, United States minor outlying islands;
     * onshore and offshore.
     * Coordinates of a nationwide adjustment including 345 NGS "passive" control stations constrained to 24 current
     * Pacific CORS station coordinates at epoch 2010.0.
     * Replaces NAD83(HARN) and NAD83(FBN) in Hawaii and American Samoa. ITRF2008 is understood to underlay the latest
     * CORS station coordinates.
     */
    public const EPSG_NAD83_NATIONAL_SPATIAL_REFERENCE_SYSTEM_PA11 = 'urn:ogc:def:datum:EPSG::1117';

    /**
     * NAD83 Canadian Spatial Reference System
     * Type: Geodetic
     * Extent: Canada - onshore and offshore - Alberta; British Columbia; Manitoba; New Brunswick; Newfoundland and
     * Labrador; Northwest Territories; Nova Scotia; Nunavut; Ontario; Prince Edward Island; Quebec; Saskatchewan;
     * Yukon.
     * Includes all versions of NAD83(CSRS) from v2 [CSRS98] onwards without specific identification. As such it has an
     * accuracy of approximately 1m.
     */
    public const EPSG_NAD83_CANADIAN_SPATIAL_REFERENCE_SYSTEM = 'urn:ogc:def:datum:EPSG::6140';

    /**
     * NEA74 Noumea
     * Type: Geodetic
     * Extent: New Caledonia - Grande Terre - Noumea district.
     * Noumea old signal station.
     */
    public const EPSG_NEA74_NOUMEA = 'urn:ogc:def:datum:EPSG::6644';

    /**
     * NGO 1948
     * Type: Geodetic
     * Extent: Norway - onshore.
     * Fundamental point: Oslo observatory. Latitude: 59°54'43.7"N, longitude: 10°43'22.5"E (of Greenwich).
     */
    public const EPSG_NGO_1948 = 'urn:ogc:def:datum:EPSG::6273';

    /**
     * NGO 1948 (Oslo)
     * Type: Geodetic
     * Extent: Norway - onshore.
     * Fundamental point: Oslo observatory. Latitude: 59°54'43.7"N, longitude: 0°00'00.0"E (of Oslo).
     */
    public const EPSG_NGO_1948_OSLO = 'urn:ogc:def:datum:EPSG::6817';

    /**
     * NSWC 9Z-2
     * Type: Geodetic
     * Extent: World.
     * Transit precise ephemeris before 1991.
     */
    public const EPSG_NSWC_9Z_2 = 'urn:ogc:def:datum:EPSG::6276';

    /**
     * Nahrwan 1934
     * Type: Geodetic
     * Extent: Iraq - onshore; Iran - onshore northern Gulf coast and west bordering southeast Iraq.
     * Fundamental point: Nahrwan south base.  Latitude: 33°19'10.87"N, longitude: 44°43'25.54"E (of Greenwich).
     * This adjustment later discovered to have a significant orientation error. In Iran replaced by FD58. In Iraq,
     * replaced by Karbala 1979.
     */
    public const EPSG_NAHRWAN_1934 = 'urn:ogc:def:datum:EPSG::6744';

    /**
     * Nahrwan 1967
     * Type: Geodetic
     * Extent: Arabian Gulf; Qatar - offshore; United Arab Emirates (UAE) - Abu Dhabi; Dubai; Sharjah; Ajman; Fujairah;
     * Ras Al Kaimah; Umm Al Qaiwain - onshore and offshore.
     * Fundamental point: Nahrwan south base.  Latitude: 33°19'10.87"N, longitude: 44°43'25.54"E (of Greenwich).
     */
    public const EPSG_NAHRWAN_1967 = 'urn:ogc:def:datum:EPSG::6270';

    /**
     * Nakhl-e Ghanem
     * Type: Geodetic
     * Extent: Iran - Kangan district.
     * Coordinates of two stations determined with respect to ITRF 2000 at epoch 2005.2: BMT1 latitude
     * 27°42'09.8417"N, longitude 52°12'11.0362"E (of Greenwich); Total1 latitude 27°31'03.8896"N, longitude
     * 52°36'13.1312"E (of Greenwich).
     */
    public const EPSG_NAKHL_E_GHANEM = 'urn:ogc:def:datum:EPSG::6693';

    /**
     * Naparima 1955
     * Type: Geodetic
     * Extent: Trinidad and Tobago - Trinidad - onshore.
     * Fundamental point: Naparima. Latitude: 10°16'44.860"N, longitude: 61°27'34.620"W (of Greenwich).
     * Extended to Tobago as Naparima 1972. (Note: Naparima 1972 is not used in Trinidad).
     */
    public const EPSG_NAPARIMA_1955 = 'urn:ogc:def:datum:EPSG::6158';

    /**
     * Naparima 1972
     * Type: Geodetic
     * Extent: Trinidad and Tobago - Tobago - onshore.
     * Fundamental point: Naparima. Latitude: 10°16'44.860"N, longitude: 61°27'34.620"W (of Greenwich).
     * Naparima 1972 is an extension to Tobago of the Naparima 1955 network of Trinidad.
     */
    public const EPSG_NAPARIMA_1972 = 'urn:ogc:def:datum:EPSG::6271';

    /**
     * Napier 1962
     * Type: Vertical
     * Extent: New Zealand - North Island - Hawkes Bay meridional circuit and Napier vertical crs area.
     * MSL at Napier harbour. Period of derivation unknown.
     */
    public const EPSG_NAPIER_1962 = 'urn:ogc:def:datum:EPSG::5163';

    /**
     * National Geodetic Network
     * Type: Geodetic
     * Extent: Kuwait - onshore.
     * Replaces 1984 adjustment which used the WGS72 ellipsoid.
     */
    public const EPSG_NATIONAL_GEODETIC_NETWORK = 'urn:ogc:def:datum:EPSG::6318';

    /**
     * National Geodetic Vertical Datum 1929
     * Type: Vertical
     * Extent: United States (USA) - CONUS onshore - Alabama; Arizona; Arkansas; California; Colorado; Connecticut;
     * Delaware; Florida; Georgia; Idaho; Illinois; Indiana; Iowa; Kansas; Kentucky; Louisiana; Maine; Maryland;
     * Massachusetts; Michigan; Minnesota; Mississippi; Missouri; Montana; Nebraska; Nevada; New Hampshire; New Jersey;
     * New Mexico; New York; North Carolina; North Dakota; Ohio; Oklahoma; Oregon; Pennsylvania; Rhode Island; South
     * Carolina; South Dakota; Tennessee; Texas; Utah; Vermont; Virginia; Washington; West Virginia; Wisconsin;
     * Wyoming.
     * 26 tide gauges in the US and Canada.
     * Normal orthometric heights.
     */
    public const EPSG_NATIONAL_GEODETIC_VERTICAL_DATUM_1929 = 'urn:ogc:def:datum:EPSG::5102';

    /**
     * National Vertical Datum 1992
     * Type: Vertical
     * Extent: Bangladesh - onshore.
     * Mean Sea Level 1992-1994 at tidal station at Rangadia, Chittagong.
     */
    public const EPSG_NATIONAL_VERTICAL_DATUM_1992 = 'urn:ogc:def:datum:EPSG::1303';

    /**
     * Nelson 1955
     * Type: Vertical
     * Extent: New Zealand - South Island - north of approximately 42°20'S - Nelson vertical CRS area.
     * MSL at Nelson harbour 1939-1942.
     */
    public const EPSG_NELSON_1955 = 'urn:ogc:def:datum:EPSG::5164';

    /**
     * Nepal 1981
     * Type: Geodetic
     * Extent: Nepal.
     * Fundamental point: Station 12/157 Nagarkot. Latitude: 27°41'31.04"N, longitude: 85°31'20.23"E (of Greenwich).
     */
    public const EPSG_NEPAL_1981 = 'urn:ogc:def:datum:EPSG::1111';

    /**
     * New Beijing
     * Type: Geodetic
     * Extent: China - onshore.
     * Derived by conformal transformation of Xian 1980 adjustment onto Krassowsky ellipsoid.
     * From 1982 replaces Beijing 1954.
     */
    public const EPSG_NEW_BEIJING = 'urn:ogc:def:datum:EPSG::1045';

    /**
     * New Zealand Geodetic Datum 1949
     * Type: Geodetic
     * Extent: New Zealand - North Island, South Island, Stewart Island - onshore and nearshore.
     * Fundamental point: Papatahi. Latitude: 41°19' 8.900"S, longitude: 175°02'51.000"E (of Greenwich).
     * Replaced by New Zealand Geodetic Datum 2000 (code 6167) from March 2000.
     */
    public const EPSG_NEW_ZEALAND_GEODETIC_DATUM_1949 = 'urn:ogc:def:datum:EPSG::6272';

    /**
     * New Zealand Geodetic Datum 2000
     * Type: Geodetic
     * Extent: New Zealand - onshore and offshore. Includes Antipodes Islands, Auckland Islands, Bounty Islands,
     * Chatham Islands, Cambell Island, Kermadec Islands, Raoul Island and Snares Islands.
     * Based on ITRF96 at epoch 2000.0
     * Replaces New Zealand Geodetic Datum 1949 (code 6272) and Chatham Islands Datum 1979 (code 6673) from March 2000.
     */
    public const EPSG_NEW_ZEALAND_GEODETIC_DATUM_2000 = 'urn:ogc:def:datum:EPSG::6167';

    /**
     * New Zealand Vertical Datum 2009
     * Type: Vertical
     * Extent: New Zealand - onshore and offshore. Includes Antipodes Islands, Auckland Islands, Bounty Islands,
     * Chatham Islands, Cambell Island, Kermadec Islands, Raoul Island and Snares Islands.
     * New Zealand Quasigeoid 2009 which is defined by the application of the NZ geoid 2009 grid to NZGD2000
     * ellipsoidal heights. See transformation code 4459.
     */
    public const EPSG_NEW_ZEALAND_VERTICAL_DATUM_2009 = 'urn:ogc:def:datum:EPSG::1039';

    /**
     * New Zealand Vertical Datum 2016
     * Type: Vertical
     * Extent: New Zealand - onshore and offshore. Includes Antipodes Islands, Auckland Islands, Bounty Islands,
     * Chatham Islands, Cambell Island, Kermadec Islands, Raoul Island and Snares Islands.
     * New Zealand quasigeoid 2016 which is defined by the application of the NZ geoid 2016 grid to NZGD2000
     * ellipsoidal heights. See transformation code 7840.
     */
    public const EPSG_NEW_ZEALAND_VERTICAL_DATUM_2016 = 'urn:ogc:def:datum:EPSG::1169';

    /**
     * Nivellement General Guyanais 1977
     * Type: Vertical
     * Extent: French Guiana - onshore.
     * Mean sea level 1936 at Cayenne. Origin = marker BM35 on stone on St Francois battery, Cayenne, with defined
     * elevation of 1.64m above msl. NGG1977 height 0.00m is 1.96m above sounding datum defined at Cayenne in 1936 by
     * SHM.
     * Orthometric heights.
     */
    public const EPSG_NIVELLEMENT_GENERAL_GUYANAIS_1977 = 'urn:ogc:def:datum:EPSG::5153';

    /**
     * Nivellement General de Nouvelle Caledonie
     * Type: Vertical
     * Extent: New Caledonia - Grande Terre.
     * Rivet AB01 established by SHOM (Service Hydrographique de la Marine)  in 1937 on the Quai des Volontaires in
     * Noumea. Height i: 1.885 metre above mean sea level.
     * Orthometric heights.
     */
    public const EPSG_NIVELLEMENT_GENERAL_DE_NOUVELLE_CALEDONIE = 'urn:ogc:def:datum:EPSG::5151';

    /**
     * Nivellement General de Nouvelle Caledonie 2008
     * Type: Vertical
     * Extent: New Caledonia - Belep, Grande Terre, Ile des Pins, Loyalty Islands (Lifou, Mare, Ouvea).
     * Normal heights.
     */
    public const EPSG_NIVELLEMENT_GENERAL_DE_NOUVELLE_CALEDONIE_2008 = 'urn:ogc:def:datum:EPSG::1255';

    /**
     * Nivellement General de Polynesie Francaise
     * Type: Vertical
     * Extent: French Polynesia - Society Islands - Bora Bora, Huahine, Maupiti, Moorea, Raiatea, Tahaa and Tahiti.
     * The collection of heterogeneous levelling networks throughout the Society Islands of French Polynesia.
     */
    public const EPSG_NIVELLEMENT_GENERAL_DE_POLYNESIE_FRANCAISE = 'urn:ogc:def:datum:EPSG::5195';

    /**
     * Nivellement General de la Corse 1948
     * Type: Vertical
     * Extent: France - Corsica onshore.
     * Mean sea level at Ajaccio between 1912 and 1937.
     * Replaced by IGN78 Corsica (datum 5120).
     */
    public const EPSG_NIVELLEMENT_GENERAL_DE_LA_CORSE_1948 = 'urn:ogc:def:datum:EPSG::5189';

    /**
     * Nivellement General de la France - IGN69
     * Type: Vertical
     * Extent: France - mainland onshore.
     * Rivet number M.ac O-VIII on the Marseille tide gauge site, with the height fixed in 1897 at 1.661 metre above
     * mean sea level between February 2nd 1885 and January 1st 1897.
     * Uses Normal heights.
     */
    public const EPSG_NIVELLEMENT_GENERAL_DE_LA_FRANCE_IGN69 = 'urn:ogc:def:datum:EPSG::5119';

    /**
     * Nivellement General de la France - IGN78
     * Type: Vertical
     * Extent: France - Corsica onshore.
     * Marker MM3 situated on the tide gauge site of Ajaccio. Height is 3.640 metre above mean sea level.
     * Uses Normal heights. Replaces NGC (datum code 5189).
     */
    public const EPSG_NIVELLEMENT_GENERAL_DE_LA_FRANCE_IGN78 = 'urn:ogc:def:datum:EPSG::5120';

    /**
     * Nivellement General de la France - Lallemand
     * Type: Vertical
     * Extent: France - mainland onshore.
     * Rivet number M.ac O-VIII on the Marseille tide gauge site, with the height fixed in 1897 at 1.661 metre above
     * mean sea level between February 2nd 1885 and January 1st 1897.
     * Orthometric heights.
     */
    public const EPSG_NIVELLEMENT_GENERAL_DE_LA_FRANCE_LALLEMAND = 'urn:ogc:def:datum:EPSG::5118';

    /**
     * Nivellement General du Luxembourg 1995
     * Type: Vertical
     * Extent: Luxembourg.
     * Reference point Wemperhardt defined as 528.030m above Normaal Amsterdams Peil (NAP). Datum at NAP is mean high
     * tide in 1684. Network adjusted in 1995.
     * Pseudo-orthometric heights.
     */
    public const EPSG_NIVELLEMENT_GENERAL_DU_LUXEMBOURG_1995 = 'urn:ogc:def:datum:EPSG::5172';

    /**
     * Nord Sahara 1959
     * Type: Geodetic
     * Extent: Algeria - onshore and offshore.
     * Coordinates of primary network readjusted on ED50 datum and then transformed conformally to Clarke 1880 (RGS)
     * ellipsoid.
     * Adjustment includes Morocco and Tunisia but use only in Algeria. Within Algeria the adjustment is north of 32°N
     * but use has been extended southwards in many disconnected projects, some based on independent astro stations
     * rather than the geodetic network.
     */
    public const EPSG_NORD_SAHARA_1959 = 'urn:ogc:def:datum:EPSG::6307';

    /**
     * Normaal Amsterdams Peil
     * Type: Vertical
     * Extent: Netherlands - onshore and offshore.
     * Mean high tide at Amsterdam in 1684. Onshore NAP is defined by the published heights of benchmarks and since
     * 2018 extended offshore defined by the application of the official transformation from ETRS89, RDNAPTRANS(TM).
     * Orthometric heights. From 2018, use has been extended from Netherlands onshore to Netherlands onshore and
     * offshore.
     */
    public const EPSG_NORMAAL_AMSTERDAMS_PEIL = 'urn:ogc:def:datum:EPSG::5109';

    /**
     * North American Datum 1927
     * Type: Geodetic
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
     * Fundamental point: Meade's Ranch. Latitude: 39°13'26.686"N, longitude: 98°32'30.506"W (of Greenwich).
     * In United States (USA) and Canada, replaced by North American Datum 1983 (NAD83) (code 6269) ; in Mexico,
     * replaced by Mexican Datum of 1993 (code 1042).
     */
    public const EPSG_NORTH_AMERICAN_DATUM_1927 = 'urn:ogc:def:datum:EPSG::6267';

    /**
     * North American Datum 1927 (1976)
     * Type: Geodetic
     * Extent: Canada - Ontario.
     * Fundamental point: Meade's Ranch. Latitude: 39°13'26.686"N, longitude: 98°32'30.506"W (of Greenwich).
     * NAD27(76) used in Ontario for all maps at scale 1/20 000 and larger; elsewhere in Canada for selected purposes.
     */
    public const EPSG_NORTH_AMERICAN_DATUM_1927_1976 = 'urn:ogc:def:datum:EPSG::6608';

    /**
     * North American Datum 1927 (CGQ77)
     * Type: Geodetic
     * Extent: Canada - Quebec.
     * Fundamental point: Meade's Ranch. Latitude: 39°13'26.686"N, longitude: 98°32'30.506"W (of Greenwich).
     * NAD27 (CGQ77) used in Quebec for all maps at scale 1/20 000 and larger; generally for maps issued by the Quebec
     * cartography office whose reference system is CGQ77.
     */
    public const EPSG_NORTH_AMERICAN_DATUM_1927_CGQ77 = 'urn:ogc:def:datum:EPSG::6609';

    /**
     * North American Datum 1983
     * Type: Geodetic
     * Extent: North America - onshore and offshore: Canada - Alberta; British Columbia; Manitoba; New Brunswick;
     * Newfoundland and Labrador; Northwest Territories; Nova Scotia; Nunavut; Ontario; Prince Edward Island; Quebec;
     * Saskatchewan; Yukon. Puerto Rico. United States (USA) - Alabama; Alaska; Arizona; Arkansas; California;
     * Colorado; Connecticut; Delaware; Florida; Georgia; Hawaii; Idaho; Illinois; Indiana; Iowa; Kansas; Kentucky;
     * Louisiana; Maine; Maryland; Massachusetts; Michigan; Minnesota; Mississippi; Missouri; Montana; Nebraska;
     * Nevada; New Hampshire; New Jersey; New Mexico; New York; North Carolina; North Dakota; Ohio; Oklahoma; Oregon;
     * Pennsylvania; Rhode Island; South Carolina; South Dakota; Tennessee; Texas; Utah; Vermont; Virginia; Washington;
     * West Virginia; Wisconsin; Wyoming. US Virgin Islands. British Virgin Islands.
     * NAD83 Doppler Transit stations in NWL 9D were aligned with the BIH Conventional Terrestrial Reference Frame
     * (BTS) at epoch 1984.0 using an internationally adopted transformation. NAD83 is now known to be non-geocentric
     * by about 2.2 meters.
     * Although the 1986 adjustment included connections to Greenland and Mexico, it has not been adopted there. In
     * Canada and US, replaced NAD27.
     */
    public const EPSG_NORTH_AMERICAN_DATUM_1983 = 'urn:ogc:def:datum:EPSG::6269';

    /**
     * North American Datum of 1983 (CSRS) version 2
     * Type: Geodetic
     * Extent: Canada - onshore and offshore - Alberta; British Columbia; Manitoba; New Brunswick; Newfoundland and
     * Labrador; Northwest Territories; Nova Scotia; Nunavut; Ontario; Prince Edward Island; Quebec; Saskatchewan;
     * Yukon.
     * Defined at reference epoch 1997.0 by a transformation from ITRF96 (see transformation code 8259). The frame is
     * kept aligned with the North American tectonic plate at other epochs using the NNR-Nuvel 1A model.
     * Published 1998-01-01; adopted by the Canadian federal government and the provincial governments of Alberta,
     * Saskatchewan, Manitoba, Quebec, New Brunswick and Prince Edward Island. Replaces NAD83(CSRS96). Replaced by
     * NAD83(CSRS)v3.
     */
    public const EPSG_NORTH_AMERICAN_DATUM_OF_1983_CSRS_VERSION_2 = 'urn:ogc:def:datum:EPSG::1193';

    /**
     * North American Datum of 1983 (CSRS) version 3
     * Type: Geodetic
     * Extent: Canada - onshore and offshore - Alberta; British Columbia; Manitoba; New Brunswick; Newfoundland and
     * Labrador; Northwest Territories; Nova Scotia; Nunavut; Ontario; Prince Edward Island; Quebec; Saskatchewan;
     * Yukon.
     * Defined at reference epoch 1997.0 by a transformation from ITRF97 (see transformation code 8260). The frame is
     * kept aligned with the North American tectonic plate at other epochs using the NNR-Nuvel 1A model.
     * Published 1999-01-01; adopted by the Canadian federal government (2000) and the provincial governments of
     * British Columbia (CRD in 2000, all Victoria Island 2005), Ontario (2008) and Nova Scotia (2000). Replaces
     * NAD83(CSRS)v2. Replaced by NAD83(CSRS)v4.
     */
    public const EPSG_NORTH_AMERICAN_DATUM_OF_1983_CSRS_VERSION_3 = 'urn:ogc:def:datum:EPSG::1194';

    /**
     * North American Datum of 1983 (CSRS) version 4
     * Type: Geodetic
     * Extent: Canada - onshore and offshore - Alberta; British Columbia; Manitoba; New Brunswick; Newfoundland and
     * Labrador; Northwest Territories; Nova Scotia; Nunavut; Ontario; Prince Edward Island; Quebec; Saskatchewan;
     * Yukon.
     * Defined at reference epoch 2002.0 by a transformation from ITRF2000 (see transformation code 8261). The frame is
     * kept aligned with the North American tectonic plate at other epochs using the NNR-Nuvel 1A model.
     * Published 2002-01-01; adopted by the Canadian federal government (2002) and the provincial governments of
     * British Columbia (for mainland only, not Victoria Island) (2005) and Alberta (2004). Replaces NAD83(CSRS)v3.
     * Replaced by NAD83(CSRS)v5.
     */
    public const EPSG_NORTH_AMERICAN_DATUM_OF_1983_CSRS_VERSION_4 = 'urn:ogc:def:datum:EPSG::1195';

    /**
     * North American Datum of 1983 (CSRS) version 5
     * Type: Geodetic
     * Extent: Canada - onshore and offshore - Alberta; British Columbia; Manitoba; New Brunswick; Newfoundland and
     * Labrador; Northwest Territories; Nova Scotia; Nunavut; Ontario; Prince Edward Island; Quebec; Saskatchewan;
     * Yukon.
     * Defined at reference epoch 2006.0 by a transformation from ITRF2005 (see transformation code 9227). The frame is
     * kept aligned with the North American tectonic plate at other epochs using the NNR-Nuvel 1A model.
     * Published 2007-01-01; adopted by the Canadian federal government in 2007. Replaces NAD83(CSRS)v4. Replaced by
     * NAD83(CSRS)v6.
     */
    public const EPSG_NORTH_AMERICAN_DATUM_OF_1983_CSRS_VERSION_5 = 'urn:ogc:def:datum:EPSG::1196';

    /**
     * North American Datum of 1983 (CSRS) version 6
     * Type: Geodetic
     * Extent: Canada - onshore and offshore - Alberta; British Columbia; Manitoba; New Brunswick; Newfoundland and
     * Labrador; Northwest Territories; Nova Scotia; Nunavut; Ontario; Prince Edward Island; Quebec; Saskatchewan;
     * Yukon.
     * Defined at reference epoch 2010.0 by a transformation from ITRF2008 (see transformation code 8264). The frame is
     * kept aligned with the North American tectonic plate at other epochs using the NNR-Nuvel 1A model.
     * Published 2010-01-01; adopted by the Canadian government (2012) and the provincial governments of Manitoba
     * (2014), Ontario (2013), Prince Edward Island (2014), Nova Scotia (2014) and Newfoundland (2012). Replaces
     * NAD83(CSRSv5). Replaced by NAD83(CSRS)v7.
     */
    public const EPSG_NORTH_AMERICAN_DATUM_OF_1983_CSRS_VERSION_6 = 'urn:ogc:def:datum:EPSG::1197';

    /**
     * North American Datum of 1983 (CSRS) version 7
     * Type: Geodetic
     * Extent: Canada - onshore and offshore - Alberta; British Columbia; Manitoba; New Brunswick; Newfoundland and
     * Labrador; Northwest Territories; Nova Scotia; Nunavut; Ontario; Prince Edward Island; Quebec; Saskatchewan;
     * Yukon.
     * Defined at reference epoch 2010.0 by a transformation from ITRF2014 (see transformation code 8265). The frame is
     * kept aligned with the North American tectonic plate at other epochs using the NNR-Nuvel 1A model.
     * Published 2017-05-01; adopted by the Canadian federal government (2017) and the provincial governments of
     * Alberta (2021) and Prince Edward Island (2020). Replaces NAD83(CSRS)v6.
     */
    public const EPSG_NORTH_AMERICAN_DATUM_OF_1983_CSRS_VERSION_7 = 'urn:ogc:def:datum:EPSG::1198';

    /**
     * North American Datum of 1983 (CSRS96)
     * Type: Geodetic
     * Extent: Canada - onshore and offshore - Alberta; British Columbia; Manitoba; New Brunswick; Newfoundland and
     * Labrador; Northwest Territories; Nova Scotia; Nunavut; Ontario; Prince Edward Island; Quebec; Saskatchewan;
     * Yukon.
     * Defined at epoch 1988.0 by a transformation from ITRF92, the definition superseded by a transformation from
     * ITRF93 and then by a transformation from ITRF94. (See transformation codes 8256-58).
     * Adopted by the Canadian federal government from 1996-01-01. Replaces NAD83 [sometimes called NAD83(Original)].
     * Replaced by NAD83(CSRS)v2.
     */
    public const EPSG_NORTH_AMERICAN_DATUM_OF_1983_CSRS96 = 'urn:ogc:def:datum:EPSG::1192';

    /**
     * North American Datum of 1983 (MARP00)
     * Type: Geodetic
     * Extent: Guam, Northern Mariana Islands and Palau; onshore and offshore.
     * Defined by a time-dependent seven parameter transformation of ITRF2000 3D geocentric Cartesian coordinates and
     * velocities at reference epoch 1993.62, aligned to the Mariana plate at other epochs based on an Euler pole
     * rotation.
     * Replaces NAD83(HARN) (GGN93) and NAD83(FBN) in Guam. Replaced by NAD83(MA11).
     */
    public const EPSG_NORTH_AMERICAN_DATUM_OF_1983_MARP00 = 'urn:ogc:def:datum:EPSG::1221';

    /**
     * North American Datum of 1983 (PACP00)
     * Type: Geodetic
     * Extent: American Samoa, Marshall Islands, United States (USA) - Hawaii, United States minor outlying islands;
     * onshore and offshore.
     * Defined by a time-dependent seven parameter transformation of ITRF2000 3D geocentric Cartesian coordinates and
     * velocities at reference epoch 1993.62, aligned to the Pacific plate at other epochs based on an Euler pole
     * rotation.
     * Replaces NAD83(HARN) and NAD83(FBN) in Hawaii and American Samoa. Replaced by NAD83(PA11).
     */
    public const EPSG_NORTH_AMERICAN_DATUM_OF_1983_PACP00 = 'urn:ogc:def:datum:EPSG::1249';

    /**
     * North American Vertical Datum 1988
     * Type: Vertical
     * Extent: Mexico - onshore. United States (USA) - CONUS and Alaska - onshore - Alabama; Alaska; Arizona; Arkansas;
     * California; Colorado; Connecticut; Delaware; Florida; Georgia; Idaho; Illinois; Indiana; Iowa; Kansas; Kentucky;
     * Louisiana; Maine; Maryland; Massachusetts; Michigan; Minnesota; Mississippi; Missouri; Montana; Nebraska;
     * Nevada; New Hampshire; New Jersey; New Mexico; New York; North Carolina; North Dakota; Ohio; Oklahoma; Oregon;
     * Pennsylvania; Rhode Island; South Carolina; South Dakota; Tennessee; Texas; Utah; Vermont; Virginia; Washington;
     * West Virginia; Wisconsin; Wyoming.
     * Mean water level 1970-1983 at Pointe-au-Père (Father's Point) and 1984-1988 at Rimouski, Quebec. Benchmark
     * 1250-G = 6.273m.
     * Helmert orthometric heights.
     */
    public const EPSG_NORTH_AMERICAN_VERTICAL_DATUM_1988 = 'urn:ogc:def:datum:EPSG::5103';

    /**
     * North Rona
     * Type: Vertical
     * Extent: United Kingdom (UK) - Great Britain - Scotland - North Rona onshore.
     * Orthometric heights.
     */
    public const EPSG_NORTH_RONA = 'urn:ogc:def:datum:EPSG::5143';

    /**
     * Northern Marianas Vertical Datum of 2003
     * Type: Vertical
     * Extent: Northern Mariana Islands - onshore - Rota, Saipan and Tinian.
     * Mean sea level at Tanapag harbor, Saipan. Benchmark 1633227 TIDAL UH-2C = 1.657m relative to National Tidal
     * Datum Epoch 1983-2001. Transferred to Rota (East Harbor, BM TIDAL 3 = 1.482m) and Tinian (Harbor BM TIDAL 1 =
     * 2.361m).
     * Replaces all earlier vertical datums on these islands.
     */
    public const EPSG_NORTHERN_MARIANAS_VERTICAL_DATUM_OF_2003 = 'urn:ogc:def:datum:EPSG::1119';

    /**
     * Norway Normal Null 1954
     * Type: Vertical
     * Extent: Norway - onshore.
     * MSL defined by regression at 7 gauges with between 17 and 67 years observations.
     * Includes initial NN1954 system and NNN1957 system. Former name retained. Normal-orthometric heights. Replaced by
     * NN2000.
     */
    public const EPSG_NORWAY_NORMAL_NULL_1954 = 'urn:ogc:def:datum:EPSG::5174';

    /**
     * Norway Normal Null 2000
     * Type: Vertical
     * Extent: Norway - onshore.
     * Adjustment is referenced to mean high tide at Amsterdams Peil in 1684. To account for land level movements
     * caused by isostatic rebound, heights are reduced to epoch 2000.0 using values computed from the NKG2005LU uplift
     * model.
     * Replaces NN54. Uses Normal heights.
     */
    public const EPSG_NORWAY_NORMAL_NULL_2000 = 'urn:ogc:def:datum:EPSG::1096';

    /**
     * Norwegian Chart Datum
     * Type: Vertical
     * Extent: Norway (offshore) and Svalbard and Jan Mayen (offshore).
     * LAT (sum of all harmonic constituents) with an added safety margin in areas where low water levels frequently
     * deviate from LAT. The safety margin is 20 cm from Utsira to the Swedish border and 30 cm in the inner part of
     * the Oslofjord (north of Drøbak).
     * Prior to 2000-01-01 the definition of chart datum was Z0 = M2 + S2 + N2 + K2 + K1 + ½Sa plus safety margins (10
     * cm north of Hordaland, 20 cm in Hordaland, 30 cm from Rogaland to the Swedish border and 40 cm in the inner
     * parts of the Oslofjord).
     */
    public const EPSG_NORWEGIAN_CHART_DATUM = 'urn:ogc:def:datum:EPSG::1301';

    /**
     * Not specified (based on Airy 1830 ellipsoid)
     * Type: Geodetic
     * Extent: World.
     * Included for coordinate reference systems where datum is unknown.
     */
    public const EPSG_NOT_SPECIFIED_BASED_ON_AIRY_1830_ELLIPSOID = 'urn:ogc:def:datum:EPSG::6001';

    /**
     * Not specified (based on Airy Modified 1849 ellipsoid)
     * Type: Geodetic
     * Extent: World.
     * Included for coordinate reference systems where datum is unknown.
     */
    public const EPSG_NOT_SPECIFIED_BASED_ON_AIRY_MODIFIED_1849_ELLIPSOID = 'urn:ogc:def:datum:EPSG::6002';

    /**
     * Not specified (based on Australian National Spheroid)
     * Type: Geodetic
     * Extent: World.
     * Included for coordinate reference systems where datum is unknown.
     */
    public const EPSG_NOT_SPECIFIED_BASED_ON_AUSTRALIAN_NATIONAL_SPHEROID = 'urn:ogc:def:datum:EPSG::6003';

    /**
     * Not specified (based on Average Terrestrial System 1977 ellipsoid)
     * Type: Geodetic
     * Extent: World.
     * Included for coordinate reference systems where datum is unknown.
     */
    public const EPSG_NOT_SPECIFIED_BASED_ON_AVERAGE_TERRESTRIAL_SYSTEM_1977_ELLIPSOID = 'urn:ogc:def:datum:EPSG::6041';

    /**
     * Not specified (based on Bessel 1841 ellipsoid)
     * Type: Geodetic
     * Extent: World.
     * Included for coordinate reference systems where datum is unknown.
     */
    public const EPSG_NOT_SPECIFIED_BASED_ON_BESSEL_1841_ELLIPSOID = 'urn:ogc:def:datum:EPSG::6004';

    /**
     * Not specified (based on Bessel Modified ellipsoid)
     * Type: Geodetic
     * Extent: World.
     * Included for coordinate reference systems where datum is unknown.
     */
    public const EPSG_NOT_SPECIFIED_BASED_ON_BESSEL_MODIFIED_ELLIPSOID = 'urn:ogc:def:datum:EPSG::6005';

    /**
     * Not specified (based on Bessel Namibia ellipsoid)
     * Type: Geodetic
     * Extent: World.
     * Included for coordinate reference systems where datum is unknown.
     */
    public const EPSG_NOT_SPECIFIED_BASED_ON_BESSEL_NAMIBIA_ELLIPSOID = 'urn:ogc:def:datum:EPSG::6006';

    /**
     * Not specified (based on Clarke 1858 ellipsoid)
     * Type: Geodetic
     * Extent: World.
     * Included for coordinate reference systems where datum is unknown.
     */
    public const EPSG_NOT_SPECIFIED_BASED_ON_CLARKE_1858_ELLIPSOID = 'urn:ogc:def:datum:EPSG::6007';

    /**
     * Not specified (based on Clarke 1866 Authalic Sphere)
     * Type: Geodetic
     * Extent: World.
     * Included for coordinate reference systems where datum is unknown.
     */
    public const EPSG_NOT_SPECIFIED_BASED_ON_CLARKE_1866_AUTHALIC_SPHERE = 'urn:ogc:def:datum:EPSG::6052';

    /**
     * Not specified (based on Clarke 1866 ellipsoid)
     * Type: Geodetic
     * Extent: World.
     * Included for coordinate reference systems where datum is unknown.
     */
    public const EPSG_NOT_SPECIFIED_BASED_ON_CLARKE_1866_ELLIPSOID = 'urn:ogc:def:datum:EPSG::6008';

    /**
     * Not specified (based on Clarke 1880 (Arc) ellipsoid)
     * Type: Geodetic
     * Extent: World.
     * Included for coordinate reference systems where datum is unknown.
     */
    public const EPSG_NOT_SPECIFIED_BASED_ON_CLARKE_1880_ARC_ELLIPSOID = 'urn:ogc:def:datum:EPSG::6013';

    /**
     * Not specified (based on Clarke 1880 (Benoit) ellipsoid)
     * Type: Geodetic
     * Extent: World.
     * Included for coordinate reference systems where datum is unknown.
     */
    public const EPSG_NOT_SPECIFIED_BASED_ON_CLARKE_1880_BENOIT_ELLIPSOID = 'urn:ogc:def:datum:EPSG::6010';

    /**
     * Not specified (based on Clarke 1880 (IGN) ellipsoid)
     * Type: Geodetic
     * Extent: World.
     * Included for coordinate reference systems where datum is unknown.
     */
    public const EPSG_NOT_SPECIFIED_BASED_ON_CLARKE_1880_IGN_ELLIPSOID = 'urn:ogc:def:datum:EPSG::6011';

    /**
     * Not specified (based on Clarke 1880 (RGS) ellipsoid)
     * Type: Geodetic
     * Extent: World.
     * Included for coordinate reference systems where datum is unknown.
     */
    public const EPSG_NOT_SPECIFIED_BASED_ON_CLARKE_1880_RGS_ELLIPSOID = 'urn:ogc:def:datum:EPSG::6012';

    /**
     * Not specified (based on Clarke 1880 (SGA 1922) ellipsoid)
     * Type: Geodetic
     * Extent: World.
     * Included for coordinate reference systems where datum is unknown.
     */
    public const EPSG_NOT_SPECIFIED_BASED_ON_CLARKE_1880_SGA_1922_ELLIPSOID = 'urn:ogc:def:datum:EPSG::6014';

    /**
     * Not specified (based on Clarke 1880 ellipsoid)
     * Type: Geodetic
     * Extent: World.
     * Included for coordinate reference systems where datum is unknown.
     */
    public const EPSG_NOT_SPECIFIED_BASED_ON_CLARKE_1880_ELLIPSOID = 'urn:ogc:def:datum:EPSG::6034';

    /**
     * Not specified (based on Everest (1830 Definition) ellipsoid)
     * Type: Geodetic
     * Extent: World.
     * Included for coordinate reference systems where datum is unknown.
     */
    public const EPSG_NOT_SPECIFIED_BASED_ON_EVEREST_1830_DEFINITION_ELLIPSOID = 'urn:ogc:def:datum:EPSG::6042';

    /**
     * Not specified (based on Everest 1830 (1937 Adjustment) ellipsoid)
     * Type: Geodetic
     * Extent: World.
     * Included for coordinate reference systems where datum is unknown.
     */
    public const EPSG_NOT_SPECIFIED_BASED_ON_EVEREST_1830_1937_ADJUSTMENT_ELLIPSOID = 'urn:ogc:def:datum:EPSG::6015';

    /**
     * Not specified (based on Everest 1830 (1962 Definition) ellipsoid)
     * Type: Geodetic
     * Extent: World.
     * Included for coordinate reference systems where datum is unknown.
     */
    public const EPSG_NOT_SPECIFIED_BASED_ON_EVEREST_1830_1962_DEFINITION_ELLIPSOID = 'urn:ogc:def:datum:EPSG::6044';

    /**
     * Not specified (based on Everest 1830 (1967 Definition) ellipsoid)
     * Type: Geodetic
     * Extent: World.
     * Included for coordinate reference systems where datum is unknown.
     */
    public const EPSG_NOT_SPECIFIED_BASED_ON_EVEREST_1830_1967_DEFINITION_ELLIPSOID = 'urn:ogc:def:datum:EPSG::6016';

    /**
     * Not specified (based on Everest 1830 (1975 Definition) ellipsoid)
     * Type: Geodetic
     * Extent: World.
     * Included for coordinate reference systems where datum is unknown.
     */
    public const EPSG_NOT_SPECIFIED_BASED_ON_EVEREST_1830_1975_DEFINITION_ELLIPSOID = 'urn:ogc:def:datum:EPSG::6045';

    /**
     * Not specified (based on Everest 1830 Modified ellipsoid)
     * Type: Geodetic
     * Extent: World.
     * Included for coordinate reference systems where datum is unknown.
     */
    public const EPSG_NOT_SPECIFIED_BASED_ON_EVEREST_1830_MODIFIED_ELLIPSOID = 'urn:ogc:def:datum:EPSG::6018';

    /**
     * Not specified (based on GEM 10C ellipsoid)
     * Type: Geodetic
     * Extent: World.
     * Included for coordinate reference systems where datum is unknown.
     */
    public const EPSG_NOT_SPECIFIED_BASED_ON_GEM_10C_ELLIPSOID = 'urn:ogc:def:datum:EPSG::6031';

    /**
     * Not specified (based on GRS 1967 ellipsoid)
     * Type: Geodetic
     * Extent: World.
     * Included for coordinate reference systems where datum is unknown.
     */
    public const EPSG_NOT_SPECIFIED_BASED_ON_GRS_1967_ELLIPSOID = 'urn:ogc:def:datum:EPSG::6036';

    /**
     * Not specified (based on GRS 1980 Authalic Sphere)
     * Type: Geodetic
     * Extent: World.
     * Included for coordinate reference systems where datum is unknown.
     */
    public const EPSG_NOT_SPECIFIED_BASED_ON_GRS_1980_AUTHALIC_SPHERE = 'urn:ogc:def:datum:EPSG::6047';

    /**
     * Not specified (based on GRS 1980 ellipsoid)
     * Type: Geodetic
     * Extent: World.
     * Included for coordinate reference systems where datum is unknown.
     */
    public const EPSG_NOT_SPECIFIED_BASED_ON_GRS_1980_ELLIPSOID = 'urn:ogc:def:datum:EPSG::6019';

    /**
     * Not specified (based on Helmert 1906 ellipsoid)
     * Type: Geodetic
     * Extent: World.
     * Included for coordinate reference systems where datum is unknown.
     */
    public const EPSG_NOT_SPECIFIED_BASED_ON_HELMERT_1906_ELLIPSOID = 'urn:ogc:def:datum:EPSG::6020';

    /**
     * Not specified (based on Hughes 1980 ellipsoid)
     * Type: Geodetic
     * Extent: World.
     * Included for coordinate reference systems where datum is unknown.
     */
    public const EPSG_NOT_SPECIFIED_BASED_ON_HUGHES_1980_ELLIPSOID = 'urn:ogc:def:datum:EPSG::6054';

    /**
     * Not specified (based on Indonesian National Spheroid)
     * Type: Geodetic
     * Extent: World.
     * Included for coordinate reference systems where datum is unknown.
     */
    public const EPSG_NOT_SPECIFIED_BASED_ON_INDONESIAN_NATIONAL_SPHEROID = 'urn:ogc:def:datum:EPSG::6021';

    /**
     * Not specified (based on International 1924 Authalic Sphere)
     * Type: Geodetic
     * Extent: World.
     * Included for coordinate reference systems where datum is unknown.
     */
    public const EPSG_NOT_SPECIFIED_BASED_ON_INTERNATIONAL_1924_AUTHALIC_SPHERE = 'urn:ogc:def:datum:EPSG::6053';

    /**
     * Not specified (based on International 1924 ellipsoid)
     * Type: Geodetic
     * Extent: World.
     * Included for coordinate reference systems where datum is unknown.
     */
    public const EPSG_NOT_SPECIFIED_BASED_ON_INTERNATIONAL_1924_ELLIPSOID = 'urn:ogc:def:datum:EPSG::6022';

    /**
     * Not specified (based on Krassowsky 1940 ellipsoid)
     * Type: Geodetic
     * Extent: World.
     * Included for coordinate reference systems where datum is unknown.
     */
    public const EPSG_NOT_SPECIFIED_BASED_ON_KRASSOWSKY_1940_ELLIPSOID = 'urn:ogc:def:datum:EPSG::6024';

    /**
     * Not specified (based on NWL 9D ellipsoid)
     * Type: Geodetic
     * Extent: World.
     * Included for coordinate reference systems where datum is unknown.
     */
    public const EPSG_NOT_SPECIFIED_BASED_ON_NWL_9D_ELLIPSOID = 'urn:ogc:def:datum:EPSG::6025';

    /**
     * Not specified (based on OSU86F ellipsoid)
     * Type: Geodetic
     * Extent: World.
     * Included for coordinate reference systems where datum is unknown.
     */
    public const EPSG_NOT_SPECIFIED_BASED_ON_OSU86F_ELLIPSOID = 'urn:ogc:def:datum:EPSG::6032';

    /**
     * Not specified (based on OSU91A ellipsoid)
     * Type: Geodetic
     * Extent: World.
     * Included for coordinate reference systems where datum is unknown.
     */
    public const EPSG_NOT_SPECIFIED_BASED_ON_OSU91A_ELLIPSOID = 'urn:ogc:def:datum:EPSG::6033';

    /**
     * Not specified (based on Plessis 1817 ellipsoid)
     * Type: Geodetic
     * Extent: World.
     * Included for coordinate reference systems where datum is unknown.
     */
    public const EPSG_NOT_SPECIFIED_BASED_ON_PLESSIS_1817_ELLIPSOID = 'urn:ogc:def:datum:EPSG::6027';

    /**
     * Not specified (based on Struve 1860 ellipsoid)
     * Type: Geodetic
     * Extent: World.
     * Included for coordinate reference systems where datum is unknown.
     */
    public const EPSG_NOT_SPECIFIED_BASED_ON_STRUVE_1860_ELLIPSOID = 'urn:ogc:def:datum:EPSG::6028';

    /**
     * Not specified (based on WGS 72 ellipsoid)
     * Type: Geodetic
     * Extent: World.
     * Included for coordinate reference systems where datum is unknown.
     */
    public const EPSG_NOT_SPECIFIED_BASED_ON_WGS_72_ELLIPSOID = 'urn:ogc:def:datum:EPSG::6043';

    /**
     * Not specified (based on WGS 84 ellipsoid)
     * Type: Geodetic
     * Extent: World.
     * Included for coordinate reference systems where datum is unknown.
     */
    public const EPSG_NOT_SPECIFIED_BASED_ON_WGS_84_ELLIPSOID = 'urn:ogc:def:datum:EPSG::6030';

    /**
     * Not specified (based on War Office ellipsoid)
     * Type: Geodetic
     * Extent: World.
     * Included for coordinate reference systems where datum is unknown.
     */
    public const EPSG_NOT_SPECIFIED_BASED_ON_WAR_OFFICE_ELLIPSOID = 'urn:ogc:def:datum:EPSG::6029';

    /**
     * Nouakchott 1965
     * Type: Geodetic
     * Extent: Mauritania - coastal area south of Cape Timiris.
     * Nouakchott astronomical point.
     * Triangulation limited to environs of Nouakchott. Extended in 1982 by satellite translocation from a single
     * station "Ruines" to support Syledis chain for offshore operations. Replaced by Mauritania 1999 (datum code
     * 6602).
     */
    public const EPSG_NOUAKCHOTT_1965 = 'urn:ogc:def:datum:EPSG::6680';

    /**
     * Nouvelle Triangulation Francaise
     * Type: Geodetic
     * Extent: France - onshore - mainland and Corsica.
     * Fundamental point: Pantheon. Latitude: 48°50'46.522"N, longitude: 2°20'48.667"E (of Greenwich).
     */
    public const EPSG_NOUVELLE_TRIANGULATION_FRANCAISE = 'urn:ogc:def:datum:EPSG::6275';

    /**
     * Nouvelle Triangulation Francaise (Paris)
     * Type: Geodetic
     * Extent: France - onshore - mainland and Corsica.
     * Fundamental point: Pantheon. Latitude: 54.273618g N, longitude: 0.0106921g E (of Paris).
     */
    public const EPSG_NOUVELLE_TRIANGULATION_FRANCAISE_PARIS = 'urn:ogc:def:datum:EPSG::6807';

    /**
     * OS (SN) 1980
     * Type: Geodetic
     * Extent: Ireland - onshore. United Kingdom (UK) - onshore - England; Scotland; Wales; Northern Ireland. Isle of
     * Man.
     * Fundamental point: Herstmonceux. Latitude: 50°51'55.271"N, longitude: 0°20'45.882"E (of Greenwich).
     */
    public const EPSG_OS_SN_1980 = 'urn:ogc:def:datum:EPSG::6279';

    /**
     * OSGB 1970 (SN)
     * Type: Geodetic
     * Extent: United Kingdom (UK) - Great Britain - England and Wales onshore, Scotland onshore and Western Isles
     * nearshore including Sea of the Hebrides and The Minch; Isle of Man onshore.
     * Fundamental point: Herstmonceux. Latitude: 50°51'55.271"N, longitude: 0°20'45.882"E (of Greenwich).
     */
    public const EPSG_OSGB_1970_SN = 'urn:ogc:def:datum:EPSG::6278';

    /**
     * OSNI 1952
     * Type: Geodetic
     * Extent: United Kingdom (UK) - Northern Ireland (Ulster) - onshore.
     * Position fixed to the coordinates from the 19th century Principle Triangulation of station Divis. Scale and
     * orientation controlled by position of Principle Triangulation stations Knocklayd and Trostan.
     * Replaced by Geodetic Datum of 1965 alias 1975 Mapping Adjustment or TM75 (datum code 6300).
     */
    public const EPSG_OSNI_1952 = 'urn:ogc:def:datum:EPSG::6188';

    /**
     * Observatario
     * Type: Geodetic
     * Extent: Mozambique - south.
     * Fundamental point: Campos Rodrigues observatory, Maputo.
     * Replaced by transformation to Tete datum (datum code 6127).
     */
    public const EPSG_OBSERVATARIO = 'urn:ogc:def:datum:EPSG::6129';

    /**
     * Ocotepeque 1935
     * Type: Geodetic
     * Extent: Costa Rica; El Salvador; Guatemala; Honduras; Nicaragua.
     * Fundamental point: Base Norte. Latitude: 14°26'20.168"N, longitude: 89°11'33.964"W.
     * Replaced in Costa Rica by Costa Rica 2005 (CR05) from March 2007 and replaced in El Salvador by SIRGAS_ES2007
     * from August 2007.
     */
    public const EPSG_OCOTEPEQUE_1935 = 'urn:ogc:def:datum:EPSG::1070';

    /**
     * Old Hawaiian
     * Type: Geodetic
     * Extent: United States (USA) - Hawaii - main islands onshore.
     * Fundamental point: Oahu West Base Astro.  Latitude: 21°18'13.89"N, longitude 157°50'55.79"W (of Greenwich)
     * Hawaiian Islands were never on NAD27 but rather on Old Hawaiian Datum.  NADCON conversion program provides
     * transformation from Old Hawaiian Datum to NAD83 (original 1986 realization) but making the transformation appear
     * to user as if from NAD27.
     */
    public const EPSG_OLD_HAWAIIAN = 'urn:ogc:def:datum:EPSG::6135';

    /**
     * Oman National Geodetic Datum 2014
     * Type: Geodetic
     * Extent: Oman - onshore and offshore.
     * 20 stations of the Oman primary network tied to ITRF2008 at epoch 2013.15.
     * Replaces WGS 84 (G873). Replaced by ONGD17.
     */
    public const EPSG_OMAN_NATIONAL_GEODETIC_DATUM_2014 = 'urn:ogc:def:datum:EPSG::1147';

    /**
     * Oman National Geodetic Datum 2017
     * Type: Geodetic
     * Extent: Oman - onshore and offshore.
     * Oman primary network of 39 stations tied to ITRF2014 at epoch 2017.24.
     * Replaces ONGD14 from March 2019.
     */
    public const EPSG_OMAN_NATIONAL_GEODETIC_DATUM_2017 = 'urn:ogc:def:datum:EPSG::1263';

    /**
     * One Tree Point 1964
     * Type: Vertical
     * Extent: New Zealand - North Island - One Tree Point vertical CRS area.
     * MSL at Whangarei harbour 1960-1963.
     */
    public const EPSG_ONE_TREE_POINT_1964 = 'urn:ogc:def:datum:EPSG::5165';

    /**
     * Ordnance Datum Newlyn
     * Type: Vertical
     * Extent: United Kingdom (UK) - Great Britain onshore - England and Wales - mainland; Scotland - mainland and
     * Inner Hebrides.
     * Mean Sea Level at Newlyn between 1915 and 1921. Initially realised through 1921 and then 1956 levelling network
     * adjustments. From 2002 redefined to be realised through OSGM geoid models.
     * Orthometric heights.
     */
    public const EPSG_ORDNANCE_DATUM_NEWLYN = 'urn:ogc:def:datum:EPSG::5101';

    /**
     * Ordnance Datum Newlyn (Offshore)
     * Type: Vertical
     * Extent: United Kingdom (UK) - offshore between 2km from shore and boundary of UKCS within 49°46'N to 61°01'N
     * and 7°33'W to 3°33'E.
     * Defined by OSGM geoid model.
     * Extension of Ordnance Datum Newlyn offshore through geoid model. Orthometric heights.
     */
    public const EPSG_ORDNANCE_DATUM_NEWLYN_OFFSHORE = 'urn:ogc:def:datum:EPSG::1164';

    /**
     * Ordnance Datum Newlyn (Orkney Isles)
     * Type: Vertical
     * Extent: United Kingdom (UK) - Great Britain - Scotland - Orkney Islands onshore.
     * Connected to Newlyn datum by triangulation from the British mainland. Initially realised through levelling
     * network adjustment, from 2002 redefined to be realised through OSGM geoid model.
     * Considered as separate from Newlyn because the accuracy of the trigonometric connection across the Pentland
     * Firth does not meet geodetic levelling specifications. Orthometric heights.
     */
    public const EPSG_ORDNANCE_DATUM_NEWLYN_ORKNEY_ISLES = 'urn:ogc:def:datum:EPSG::5138';

    /**
     * Ordnance Survey of Great Britain 1936
     * Type: Geodetic
     * Extent: United Kingdom (UK) - offshore to boundary of UKCS within 49°45'N to 61°N and 9°W to 2°E; onshore
     * Great Britain (England, Wales and Scotland). Isle of Man onshore.
     * Prior to 2002 fundamental point: Herstmonceux, Latitude: 50°51'55.271"N, longitude: 0°20'45.882"E,
     * triangulation adjustment started 1936, completed 1962. From April 2002 the datum is defined through the
     * application of the OSTN transformation from ETRS89.
     * The average accuracy of OSTN compared to the old triangulation network (down to 3rd order) is 0.1m. With the
     * introduction of OSTN15, the area for OGSB36 has effectively been extended from Britain to cover the adjacent UK
     * Continental Shelf.
     */
    public const EPSG_ORDNANCE_SURVEY_OF_GREAT_BRITAIN_1936 = 'urn:ogc:def:datum:EPSG::6277';

    /**
     * Ostend
     * Type: Vertical
     * Extent: Belgium - onshore.
     * Mean low water at Ostend 1855-78 transferred to benchmark GIKMN at Uccle.
     * Realized through the second general levelling (DNG or TAW) 1981-1999.
     */
    public const EPSG_OSTEND = 'urn:ogc:def:datum:EPSG::5110';

    /**
     * PDO Height Datum 1993
     * Type: Vertical
     * Extent: Oman - onshore. Includes Musandam and the Kuria Muria (Al Hallaniyah) islands.
     * Misclosure between Muscat and Salalah less than .5 meters with differences from of up to 5 meters from old Fahud
     * Datum.  The PHD93 adjustment was initially known as the Spine.  Replaces Fahud Vertical Datum (code 5124) from
     * 1993.
     */
    public const EPSG_PDO_HEIGHT_DATUM_1993 = 'urn:ogc:def:datum:EPSG::5123';

    /**
     * PDO Survey Datum 1993
     * Type: Geodetic
     * Extent: Oman - onshore. Includes Musandam and the Kuria Muria (Al Hallaniyah) islands.
     * Adjustment best fitted to Fahud network.
     * Replaces Fahud datum (code 6232). Maximum differences to Fahud adjustment are 20 metres.
     */
    public const EPSG_PDO_SURVEY_DATUM_1993 = 'urn:ogc:def:datum:EPSG::6134';

    /**
     * PNG08
     * Type: Vertical
     * Extent: Papua New Guinea - between 0°N and 12°S and 140°E and 158°E - onshore and offshore.
     * Mean sea level at 8 tide gauges around PNG, defined through application of PNG08 geoid model (transformation
     * code 7655) to PNG94 (CRS code 5545).
     */
    public const EPSG_PNG08 = 'urn:ogc:def:datum:EPSG::1149';

    /**
     * Palestine 1923
     * Type: Geodetic
     * Extent: Israel - onshore; Jordan; Palestine Territory - onshore.
     * Fundamental point: Point 82'M  Jerusalem. Latitude: 31°44' 2.749"N, longitude: 35°12'43.490"E (of Greenwich).
     */
    public const EPSG_PALESTINE_1923 = 'urn:ogc:def:datum:EPSG::6281';

    /**
     * Pampa del Castillo
     * Type: Geodetic
     * Extent: Argentina - Chibut province south of approximately 42°30'S and Santa Cruz province north of
     * approximately 50°20'S.
     * Replaced by Campo Inchauspe (code 6221) for topographic mapping, use for oil exploration and production in Golfo
     * San Jorge basin (44°S to 47.5°S) continues.
     */
    public const EPSG_PAMPA_DEL_CASTILLO = 'urn:ogc:def:datum:EPSG::6161';

    /**
     * Panama-Colon 1911
     * Type: Geodetic
     * Extent: Panama - onshore.
     * Fundamental point: Balboa Hill. Latitude: 09°04'57.637"N, longtitude: 79°43'50.313"W.
     * Reports of the existence of an Ancon datum are probably erroneous, considering that the origin of the
     * Panamá-Colón Datum of 1911 is at Balboa Hill and the access road up the hill is from the town of Ancon, Canal
     * Zone.
     */
    public const EPSG_PANAMA_COLON_1911 = 'urn:ogc:def:datum:EPSG::1072';

    /**
     * Papua New Guinea Geodetic Datum 1994
     * Type: Geodetic
     * Extent: Papua New Guinea - onshore and offshore. Includes Bismark archipelago, Louisade archipelago, Admiralty
     * Islands, d'Entrecasteaux Islands, northern Solomon Islands, Trobriand Islands, New Britain, New Ireland,
     * Woodlark, and associated islands.
     * ITRF92 at epoch 1994.0.
     * Adopted 1996. Coincident with WGS 84 in 1994 but rapidly divergent due to significant tectonic motion in PNG.
     */
    public const EPSG_PAPUA_NEW_GUINEA_GEODETIC_DATUM_1994 = 'urn:ogc:def:datum:EPSG::1076';

    /**
     * Parametry Zemli 1990
     * Type: Dynamic geodetic
     * Extent: World.
     * Defined through coordinates of stations of the satellite geodetic network (SGN) in Russia at epoch 1990.0.
     * Replaced by PZ-90.02 from 2007-09-20.
     */
    public const EPSG_PARAMETRY_ZEMLI_1990 = 'urn:ogc:def:datum:EPSG::6740';

    /**
     * Parametry Zemli 1990.02
     * Type: Dynamic geodetic
     * Extent: World.
     * Defined through coordinates of 33 stations of the satellite geodetic network (SGN) in Russia and Antarctica
     * adjusted to a subset of 14 IGS stations in Russia at epoch 2002.0. The IGS station coordinates are considered to
     * be equivalent to ITRF2000.
     * Replaces PZ-90 from 2007-09-20. Replaced by PZ-90.11 from 2014-01-15.
     */
    public const EPSG_PARAMETRY_ZEMLI_1990_02 = 'urn:ogc:def:datum:EPSG::1157';

    /**
     * Parametry Zemli 1990.11
     * Type: Dynamic geodetic
     * Extent: World.
     * Defined through coordinates of 33 stations of the satellite geodetic network (SGN) in Russia and Antarctica
     * adjusted to a subset of 14 IGS stations in Russia at epoch 2010.0. The IGS station coordinates are considered to
     * be equivalent to ITRF2008.
     * Replaces PZ-90.02 from 2014-01-15.
     */
    public const EPSG_PARAMETRY_ZEMLI_1990_11 = 'urn:ogc:def:datum:EPSG::1158';

    /**
     * Peru96
     * Type: Geodetic
     * Extent: Peru - onshore and offshore.
     * Densification of SIRGAS95 network (ITRF94 at epoch 1995.4) in Peru, consisting of 47 passive geodetic stations
     * and 3 continuous recording GPS stations.
     * Densification of SIRGAS 1995 within Peru. Replaces PSAD56 (datum code 6248) in Peru.
     */
    public const EPSG_PERU96 = 'urn:ogc:def:datum:EPSG::1067';

    /**
     * Petrels 1972
     * Type: Geodetic
     * Extent: Antarctica - Adelie Land - Petrels island.
     * Fundamental point: Astro station DZ on Ile de Petrels. Latitude: 66°40'00"S, longitude: 140°00'46"E (of
     * Greenwich).
     */
    public const EPSG_PETRELS_1972 = 'urn:ogc:def:datum:EPSG::6636';

    /**
     * Philippine Reference System 1992
     * Type: Geodetic
     * Extent: Philippines - onshore and offshore.
     * Fundamental point: Balacan. Latitude: 13°33'41.000"N, longitude: 121°52'03.000"E (of Greenwich),
     * geoid-ellipsoid separation 0.34m.
     * Replaces Luzon 1911 datum (code 6253).
     */
    public const EPSG_PHILIPPINE_REFERENCE_SYSTEM_1992 = 'urn:ogc:def:datum:EPSG::6683';

    /**
     * Phoenix Islands 1966
     * Type: Geodetic
     * Extent: Kiribati - Phoenix Islands: Kanton, Orona, McKean Atoll, Birnie Atoll, Phoenix Seamounts.
     */
    public const EPSG_PHOENIX_ISLANDS_1966 = 'urn:ogc:def:datum:EPSG::6716';

    /**
     * Pico de las Nieves 1968
     * Type: Geodetic
     * Extent: Spain - Canary Islands onshore.
     * Pico de las Nieves mountain, Gran Canaria. The fundamental point is a different station to that for PN84.
     * Replaced by PN84 only on western islands (El Hierro, La Gomera, La Palma and Tenerife). Both PN68 and PN84
     * replaced by REGCAN95.
     */
    public const EPSG_PICO_DE_LAS_NIEVES_1968 = 'urn:ogc:def:datum:EPSG::1286';

    /**
     * Pico de las Nieves 1984
     * Type: Geodetic
     * Extent: Spain - Canary Islands - El Hierro, La Gomera, La Palma and Tenerife - onshore.
     * Pico de las Nieves mountain, Gran Canaria. The fundamental point is a different station to that for PN68.
     * Replaces Pico de las Nieves 1968 (PN68) only on western islands (El Hierro, La Gomera, La Palma and Tenerife).
     * Replaced by REGCAN95.
     */
    public const EPSG_PICO_DE_LAS_NIEVES_1984 = 'urn:ogc:def:datum:EPSG::6728';

    /**
     * Piraeus Harbour 1986
     * Type: Vertical
     * Extent: Greece - onshore.
     * MSL determined during 1986.
     */
    public const EPSG_PIRAEUS_HARBOUR_1986 = 'urn:ogc:def:datum:EPSG::5115';

    /**
     * Pitcairn 1967
     * Type: Geodetic
     * Extent: Pitcairn - Pitcairn Island.
     * Fundamental point: Pitcairn Astro. Latitude: 25°04'06.87"S, longitude: 130°06'47.83"W (of Greenwich).
     * Replaced by Pitcairn 2006.
     */
    public const EPSG_PITCAIRN_1967 = 'urn:ogc:def:datum:EPSG::6729';

    /**
     * Pitcairn 2006
     * Type: Geodetic
     * Extent: Pitcairn - Pitcairn Island.
     * Fundamental point: Pitcairn Astro. Latitude: 25°04'06.7894"S, longitude: 130°06'46.6816"W (of Greenwich),
     * derived by single point GPS oberservations.
     * Replaces Pitcairn 1967.
     */
    public const EPSG_PITCAIRN_2006 = 'urn:ogc:def:datum:EPSG::6763';

    /**
     * Point 58
     * Type: Geodetic
     * Extent: Senegal - central, Mali - southwest, Burkina Faso - central, Niger - southwest, Nigeria - north, Chad -
     * central. All in proximity to the parallel of latitude of 12°N.
     * Fundamental point: Point 58. Latitude: 12°52'44.045"N, longitude: 3°58'37.040"E (of Greenwich).
     * Used as the basis for computation of the 12th Parallel traverse conducted 1966-70 from Senegal to Chad and
     * connecting to the Blue Nile 1958 (Adindan) triangulation in Sudan.
     */
    public const EPSG_POINT_58 = 'urn:ogc:def:datum:EPSG::6620';

    /**
     * Pointe Geologie Perroud 1950
     * Type: Geodetic
     * Extent: Antarctica - Adelie Land - coastal area between 136°E and 142°E.
     * Fundamental point: Astro station G.0 on Pointe Geologie. Latitude: 66°39'30"S, longitude: 140°01'00"E (of
     * Greenwich).
     */
    public const EPSG_POINTE_GEOLOGIE_PERROUD_1950 = 'urn:ogc:def:datum:EPSG::6637';

    /**
     * Ponta Delgada
     * Type: Vertical
     * Extent: Portugal - eastern Azores - Sao Miguel island onshore.
     * Mean Sea Level during 1991 at Ponta Delgada.
     * Orthometric heights.
     */
    public const EPSG_PONTA_DELGADA = 'urn:ogc:def:datum:EPSG::1110';

    /**
     * Poolbeg
     * Type: Vertical
     * Extent: Ireland - onshore. United Kingdom (UK) - Northern Ireland (Ulster) - onshore.
     * Low water mark of the spring tide on the 8 April 1837 at Poolbeg Lighthouse, Dublin.
     * Topographic mapping before 1956 in Northern Ireland and 1970 in the Republic of Ireland. Replaced by Belfast
     * Lough and Malin Head (datum codes 5130-31).
     */
    public const EPSG_POOLBEG = 'urn:ogc:def:datum:EPSG::5152';

    /**
     * Port Moresby 1996
     * Type: Vertical
     * Extent: Papua New Guinea - onshore - Gulf province east of 144°24'E, Central province and National Capital
     * District.
     * BM198 (adjacent to the Port Moresby tide gauge) height of 3.02 above MSL as determined by CSIRO in 1990.
     * Propagated through bilinear interpolation of EGM96 geoid model (transformation code 10084) reduced by offset of
     * -1.58m.
     * Offset has been determined by static GNSS estimation of ellipsoid height of BM198.
     */
    public const EPSG_PORT_MORESBY_1996 = 'urn:ogc:def:datum:EPSG::1171';

    /**
     * Port Moresby 2008
     * Type: Vertical
     * Extent: Papua New Guinea - onshore - Gulf province east of 144°24'E, Central province and National Capital
     * District.
     * BM198 (adjacent to the Port Moresby tide gauge) height of 3.02 above MSL as determined by CSIRO in 1990.
     * Propagated through bilinear interpolation of EGM2008 geoid model (transformation code 3858 or 3859) reduced by
     * offset of -0.93m.
     * Offset has been determined by static GNSS estimation of ellipsoid height of BM198 validated to a precision of 10
     * cm by short period tidal observations at Kerema wharf in 2010.
     */
    public const EPSG_PORT_MORESBY_2008 = 'urn:ogc:def:datum:EPSG::1172';

    /**
     * Porto Santo 1936
     * Type: Geodetic
     * Extent: Portugal - Madeira, Porto Santo and Desertas islands - onshore.
     * SE Base on Porto Santo island.
     * Replaced by 1995 adjustment (datum code 6663). For Selvagens see Selvagem Grande (code 6616).
     */
    public const EPSG_PORTO_SANTO_1936 = 'urn:ogc:def:datum:EPSG::6615';

    /**
     * Porto Santo 1995
     * Type: Geodetic
     * Extent: Portugal - Madeira, Porto Santo and Desertas islands - onshore.
     * SE Base on Porto Santo island. Origin and orientation constrained to those of the 1936 adjustment.
     * Classical and GPS observations. Replaces 1936 adjustment (datum code 6615).
     * For Selvagens see Selvagem Grande (datum code 6616).
     */
    public const EPSG_PORTO_SANTO_1995 = 'urn:ogc:def:datum:EPSG::6663';

    /**
     * Posiciones Geodesicas Argentinas 1994
     * Type: Geodetic
     * Extent: Argentina - onshore and offshore.
     * A geodetic network of 127 high accuracy surveyed points based on WGS 84 coordinates at time of survey that
     * define the National Geodetic System (Sistema Geodésico Nacional). Surveyed between February and April 1993 and
     * between March and May 1994.
     * Defined the National Geodetic Reference Network from 9th May 1997. Technically, but not legally, replaced by
     * POSGAR 98 (datum code 6190) until May 2009, when POSGAR 2007 (datum code 1062) was officially replaced POSGAR
     * 94.
     */
    public const EPSG_POSICIONES_GEODESICAS_ARGENTINAS_1994 = 'urn:ogc:def:datum:EPSG::6694';

    /**
     * Posiciones Geodesicas Argentinas 1998
     * Type: Geodetic
     * Extent: Argentina - onshore and offshore.
     * A geodetic network of 136 high accuracy surveyed points. Densification of SIRGAS 1995; ITRF94 at epoch 1995.4.
     * Technically, but not legally, this datum replaced the 1994 POSGAR adjustment (code 6694) until adoption of the
     * 2007 POSGAR adjustment (code 1062) in May 2009.
     */
    public const EPSG_POSICIONES_GEODESICAS_ARGENTINAS_1998 = 'urn:ogc:def:datum:EPSG::6190';

    /**
     * Posiciones Geodesicas Argentinas 2007
     * Type: Geodetic
     * Extent: Argentina - onshore and offshore.
     * A geodetic network of 211 high accuracy surveyed points (178 passive and 33 continuous operating) based on
     * ITRF2005, Epoch 2006.632, that define the National Geodetic System (Sistema Geodésico Nacional) effective 15
     * May 2009.
     * POSGAR 07 has been adopted by order of the Director of the National Geographic Institute on 15th May 2009 as the
     * new National Geodetic Reference Frame and replaces the pre-existing POSGAR 94.
     */
    public const EPSG_POSICIONES_GEODESICAS_ARGENTINAS_2007 = 'urn:ogc:def:datum:EPSG::1062';

    /**
     * Potsdam Datum/83
     * Type: Geodetic
     * Extent: Germany - Thuringen.
     * Fundamental point: Rauenberg. Latitude: 52°27'12.021"N, longitude: 13°22'04.928"E (of Greenwich). This station
     * was destroyed in 1910 and the station at Potsdam substituted as the fundamental point.
     * PD/83 is the realization of DHDN in Thuringen. It is the resultant of applying a transformation derived at 13
     * points on the border between East and West Germany to Pulkovo 1942/83 points in Thuringen.
     */
    public const EPSG_POTSDAM_DATUM_83 = 'urn:ogc:def:datum:EPSG::6746';

    /**
     * Principe
     * Type: Geodetic
     * Extent: Sao Tome and Principe - onshore - Principe.
     * Fundamental point: Morro do Papagaio. Latitude: 1°36'46.87"N, longitude: 7°23'39.65"E (of Greenwich).
     */
    public const EPSG_PRINCIPE = 'urn:ogc:def:datum:EPSG::1046';

    /**
     * Provisional South American Datum 1956
     * Type: Geodetic
     * Extent: Aruba - onshore; Bolivia; Bonaire - onshore; Brazil - offshore - Amazon Cone shelf; Chile - onshore
     * north of 43°30'S; Curacao - onshore; Ecuador - mainland onshore; Guyana - onshore; Peru - onshore; Venezuela -
     * onshore.
     * Fundamental point: La Canoa. Latitude: 8°34'17.170"N, longitude: 63°51'34.880"W (of Greenwich).
     * Same origin as La Canoa datum.
     */
    public const EPSG_PROVISIONAL_SOUTH_AMERICAN_DATUM_1956 = 'urn:ogc:def:datum:EPSG::6248';

    /**
     * Puerto Rico
     * Type: Geodetic
     * Extent: Puerto Rico, US Virgin Islands and British Virgin Islands - onshore.
     * Fundamental point: Cardona Island Lighthouse. Latitude:17°57'31.40"N, longitude: 66°38'07.53"W (of Greenwich).
     * NADCON conversion program provides transformation from Puerto Rico Datum to NAD83 (original 1986 realization)
     * but making the transformation appear to user as if from NAD27.
     */
    public const EPSG_PUERTO_RICO = 'urn:ogc:def:datum:EPSG::6139';

    /**
     * Puerto Rico Vertical Datum of 2002
     * Type: Vertical
     * Extent: Puerto Rico - onshore.
     * Mean sea level at San Juan. Benchmark 9756371 A TIDAL = 1.334m relative to National Tidal Datum Epoch 1960-1978.
     * Replaces all earlier vertical datums for Puerto Rico.
     */
    public const EPSG_PUERTO_RICO_VERTICAL_DATUM_OF_2002 = 'urn:ogc:def:datum:EPSG::1123';

    /**
     * Pulkovo 1942
     * Type: Geodetic
     * Extent: Armenia; Azerbaijan; Belarus; Estonia - onshore; Georgia - onshore; Kazakhstan; Kyrgyzstan; Latvia -
     * onshore; Lithuania - onshore; Moldova; Russian Federation - onshore; Tajikistan; Turkmenistan; Ukraine -
     * onshore; Uzbekistan.
     * Fundamental point: Pulkovo observatory. Latitude: 59°46'18.550"N, longitude: 30°19'42.090"E (of Greenwich).
     */
    public const EPSG_PULKOVO_1942 = 'urn:ogc:def:datum:EPSG::6284';

    /**
     * Pulkovo 1942(58)
     * Type: Geodetic
     * Extent: Onshore: Bulgaria, Czechia, Germany (former DDR), Hungary, Poland and Slovakia. Onshore and offshore:
     * Albania and Romania.
     * Fundamental point: Pulkovo observatory. Latitude: 59°46'18.550"N, longitude: 30°19'42.090"E (of Greenwich).
     * 1956 international adjustment of Uniform Astro-Geodetic Network of countries of central and eastern Europe.
     * Locally densified during 1957 and 1958.
     */
    public const EPSG_PULKOVO_1942_58 = 'urn:ogc:def:datum:EPSG::6179';

    /**
     * Pulkovo 1942(83)
     * Type: Geodetic
     * Extent: Onshore Bulgaria, Czechia, Germany (former DDR), Hungary and Slovakia.
     * Fundamental point: Pulkovo observatory. Latitude: 59°46'18.550"N, longitude: 30°19'42.090"E (of Greenwich).
     * 1983 international adjustment of Uniform Astro-Geodetic Network of countries of central and eastern Europe.
     */
    public const EPSG_PULKOVO_1942_83 = 'urn:ogc:def:datum:EPSG::6178';

    /**
     * Pulkovo 1995
     * Type: Geodetic
     * Extent: Russian Federation - onshore and offshore.
     * Fundamental point: Pulkovo observatory. Latitude: 59°46'15.359"N, longitude: 30°19'28.318"E (of Greenwich).
     */
    public const EPSG_PULKOVO_1995 = 'urn:ogc:def:datum:EPSG::6200';

    /**
     * Qatar 1948
     * Type: Geodetic
     * Extent: Qatar - onshore.
     * Fundamental point: Sokey 0 M. Latitude: 25°22'56.500"N, longitude: 50°45'41.000"E (of Greenwich).
     */
    public const EPSG_QATAR_1948 = 'urn:ogc:def:datum:EPSG::6286';

    /**
     * Qatar 1974
     * Type: Geodetic
     * Extent: Qatar - onshore and offshore.
     * Fundamental point: Station G3.
     */
    public const EPSG_QATAR_1974 = 'urn:ogc:def:datum:EPSG::6285';

    /**
     * Qatar National Datum 1995
     * Type: Geodetic
     * Extent: Qatar - onshore.
     * Defined by transformation from WGS 84 - see coordinate operation code 1840.
     */
    public const EPSG_QATAR_NATIONAL_DATUM_1995 = 'urn:ogc:def:datum:EPSG::6614';

    /**
     * Qornoq 1927
     * Type: Geodetic
     * Extent: Greenland - west coast onshore.
     * Fundamental point: Station 7008. Latitude: 64°31'06.27"N, longitude: 51°12'24.86"W (of Greenwich).
     */
    public const EPSG_QORNOQ_1927 = 'urn:ogc:def:datum:EPSG::6194';

    /**
     * Raiatea SAU 2001
     * Type: Vertical
     * Extent: French Polynesia - Society Islands - Raiatea.
     * Fundamental benchmark: RN1
     * Included as part of NGPF - see datum code 5195.
     */
    public const EPSG_RAIATEA_SAU_2001 = 'urn:ogc:def:datum:EPSG::5198';

    /**
     * Ras Ghumays
     * Type: Vertical
     * Extent: United Arab Emirates (UAE) - Abu Dhabi onshore.
     * Mean Sea Level at Ras Ghumays 1978 and 1979.
     * Orthometric heights.
     */
    public const EPSG_RAS_GHUMAYS = 'urn:ogc:def:datum:EPSG::1146';

    /**
     * Rassadiran
     * Type: Geodetic
     * Extent: Iran - Taheri refinery site.
     * Fundamental point: Total1. Latitude: 27°31'07.784"N, longitude: 52°36'12.741"E (of Greenwich).
     */
    public const EPSG_RASSADIRAN = 'urn:ogc:def:datum:EPSG::6153';

    /**
     * Rauenberg Datum/83
     * Type: Geodetic
     * Extent: Germany - Sachsen.
     * Fundamental point: Rauenberg. Latitude: 52°27'12.021"N, longitude: 13°22'04.928"E (of Greenwich). This station
     * was destroyed in 1910 and the station at Potsdam substituted as the fundamental point.
     * RD/83 is the realization of DHDN in Saxony. It is the resultant of applying a transformation derived at 106
     * points throughout former East Germany to Pulkovo 1942/83 points in Saxony.
     */
    public const EPSG_RAUENBERG_DATUM_83 = 'urn:ogc:def:datum:EPSG::6745';

    /**
     * Red Geodesica Para Mineria en Chile
     * Type: Dynamic geodetic
     * Extent: Chile - onshore and offshore. Includes Easter Island, Juan Fernandez Islands, San Felix, and Sala y
     * Gomez.
     * Realized through 26 stations in the IGS (SIRGAS-CON) active reference station network in Chile.
     */
    public const EPSG_RED_GEODESICA_PARA_MINERIA_EN_CHILE = 'urn:ogc:def:datum:EPSG::1304';

    /**
     * Red Geodesica Venezolana
     * Type: Geodetic
     * Extent: Venezuela - onshore and offshore.
     * Realised by a frame of 67 stations observed in 1995 as a densification of the SIRGAS campaign and adjusted in
     * the ITRF94 at epoch 1995.4.
     */
    public const EPSG_RED_GEODESICA_VENEZOLANA = 'urn:ogc:def:datum:EPSG::6189';

    /**
     * Red Geodesica de Canarias 1995
     * Type: Geodetic
     * Extent: Spain - Canary Islands onshore and offshore.
     * ITRF93 at epoch 1994.9 at VLBI station INTA at the Canary Spatial Centre (CEC) at Maspalomas on Grand Canary.
     * Replaces Pico de las Nieves 1968 (PN68) and Pico de las Nieves 1984 (PN84).
     */
    public const EPSG_RED_GEODESICA_DE_CANARIAS_1995 = 'urn:ogc:def:datum:EPSG::1035';

    /**
     * Reference System de Angola 2013
     * Type: Geodetic
     * Extent: Angola - onshore and offshore.
     * Network of 18 stations throughout Angola referenced to ITRF2008 @ 2010.90.
     * Established through daily PPP solutions in GPS week G1610.
     */
    public const EPSG_REFERENCE_SYSTEM_DE_ANGOLA_2013 = 'urn:ogc:def:datum:EPSG::1220';

    /**
     * Reseau Geodesique Francais 1993 v1
     * Type: Geodetic
     * Extent: France - onshore and offshore, mainland and Corsica (France métropolitaine including Corsica).
     * Coincident with ETRS89 at epoch 1993.0. Derived from long-term GNSS observations at 23 points aligned to ETRF93.
     * @ 1993.0 through fundamental points at Grasse, Toulouse and Brest. Network supplemented in 1994 and 1995 by
     * approx. 1000 additional stations.
     * RGF93 v1 is a realization of ETRS89. Replaced by RGF93 v2 (datum code 1312) from 2010-06-18.
     */
    public const EPSG_RESEAU_GEODESIQUE_FRANCAIS_1993_V1 = 'urn:ogc:def:datum:EPSG::6171';

    /**
     * Reseau Geodesique Francais 1993 v2
     * Type: Geodetic
     * Extent: France - onshore and offshore, mainland and Corsica (France métropolitaine including Corsica).
     * Aligned with ETRF2000 at epoch 2009.0. Based on the French GNSS permanent network (RGP) from 1998 to 2009, and
     * the re-observation of the geodetic points of the French Reference Network (RRF) and French Base Network
     * (RBF) from 2000 to 2011.
     * RGF93 v2 is a realization of ETRS89. Replaces RGF93 v1 (datum code 6171) from 2010-06-18. Replaced by RGF93 v2b
     * (datum code 1313) from 2021-01-05.
     */
    public const EPSG_RESEAU_GEODESIQUE_FRANCAIS_1993_V2 = 'urn:ogc:def:datum:EPSG::1312';

    /**
     * Reseau Geodesique Francais 1993 v2b
     * Type: Geodetic
     * Extent: France - onshore and offshore, mainland and Corsica (France métropolitaine including Corsica).
     * Aligned with ETRF2000 at epoch 2019.0. Derived through reprocessing of the French GNSS permanent network (RGP)
     * in IGS14.
     * RGF93 v2b is a realization of ETRS89. Third realization of RGF93. Replaces RGF93 v2 (datum code 1312) from
     * 2021-01-05.
     */
    public const EPSG_RESEAU_GEODESIQUE_FRANCAIS_1993_V2B = 'urn:ogc:def:datum:EPSG::1313';

    /**
     * Reseau Geodesique Francais Guyane 1995
     * Type: Geodetic
     * Extent: French Guiana - onshore and offshore.
     * ITRF93 at epoch 1995.0
     * Replaces CSG67 (datum code 6623).
     */
    public const EPSG_RESEAU_GEODESIQUE_FRANCAIS_GUYANE_1995 = 'urn:ogc:def:datum:EPSG::6624';

    /**
     * Reseau Geodesique de Mayotte 2004
     * Type: Geodetic
     * Extent: Mayotte - onshore and offshore.
     * ITRF2000 at epoch 2004.0
     * Replaces Combani 1950 (datum code 6632) except for cadastral purposes. (Cadastre 1997 (datum code 1037) used for
     * cadastral purposes).
     */
    public const EPSG_RESEAU_GEODESIQUE_DE_MAYOTTE_2004 = 'urn:ogc:def:datum:EPSG::1036';

    /**
     * Reseau Geodesique de Nouvelle Caledonie 91-93
     * Type: Geodetic
     * Extent: New Caledonia - onshore and offshore. Isle de Pins, Loyalty Islands, Huon Islands, Belep archipelago,
     * Chesterfield Islands, and Walpole.
     * ITRF90 at epoch 1989.0.
     */
    public const EPSG_RESEAU_GEODESIQUE_DE_NOUVELLE_CALEDONIE_91_93 = 'urn:ogc:def:datum:EPSG::6749';

    /**
     * Reseau Geodesique de Saint Pierre et Miquelon 2006
     * Type: Geodetic
     * Extent: St Pierre and Miquelon - onshore and offshore.
     * ITRF2000 at epoch 2006.0
     * Replaces Saint Pierre et Miquelon 1950 (datum code 6638).
     */
    public const EPSG_RESEAU_GEODESIQUE_DE_SAINT_PIERRE_ET_MIQUELON_2006 = 'urn:ogc:def:datum:EPSG::1038';

    /**
     * Reseau Geodesique de Wallis et Futuna 1996
     * Type: Geodetic
     * Extent: Wallis and Futuna - onshore and offshore - Uvea, Futuna, and Alofi.
     * Coincident with ITRF94 at epoch 1993.00.
     */
    public const EPSG_RESEAU_GEODESIQUE_DE_WALLIS_ET_FUTUNA_1996 = 'urn:ogc:def:datum:EPSG::1223';

    /**
     * Reseau Geodesique de la Polynesie Francaise
     * Type: Geodetic
     * Extent: French Polynesia - onshore and offshore. Includes Society archipelago, Tuamotu archipelago, Marquesas
     * Islands, Gambier Islands and Austral Islands.
     * ITRF92 at epoch 1993.0. Densification by GPS of the Reference Network of French Polynesia, a coordinate set of
     * 13 stations determined through DORIS observations.
     * Replaces Tahaa 54 (datum code 6629), IGN 63 Hiva Oa (6689), IGN 72 Nuku Hiva (6630), Maupiti 83 (6692), MHEFO 55
     * (6688), Moorea 87 (6691) and Tahiti 79 (6690).
     */
    public const EPSG_RESEAU_GEODESIQUE_DE_LA_POLYNESIE_FRANCAISE = 'urn:ogc:def:datum:EPSG::6687';

    /**
     * Reseau Geodesique de la RDC 2005
     * Type: Geodetic
     * Extent: The Democratic Republic of the Congo (Zaire) - south of a line through Bandundu, Seke and Pweto -
     * onshore and offshore.
     * ITRF2000 at epoch 2005.4.
     */
    public const EPSG_RESEAU_GEODESIQUE_DE_LA_RDC_2005 = 'urn:ogc:def:datum:EPSG::1033';

    /**
     * Reseau Geodesique de la Reunion 1992
     * Type: Geodetic
     * Extent: Reunion - onshore and offshore.
     * ITRF91 at epoch 1993.0
     * Replaces Piton des Neiges (code 6626).
     */
    public const EPSG_RESEAU_GEODESIQUE_DE_LA_REUNION_1992 = 'urn:ogc:def:datum:EPSG::6627';

    /**
     * Reseau Geodesique des Antilles Francaises 2009
     * Type: Geodetic
     * Extent: French Antilles onshore and offshore - Guadeloupe (including Grande Terre, Basse Terre, Marie Galante,
     * Les Saintes, Iles de la Petite Terre, La Desirade); Martinique; St Barthélemy; St Martin.
     * ITRF2005 at epoch 2009.0
     * Replaces RRAF91 in Martinique and Guadeloupe.
     */
    public const EPSG_RESEAU_GEODESIQUE_DES_ANTILLES_FRANCAISES_2009 = 'urn:ogc:def:datum:EPSG::1073';

    /**
     * Reseau Geodesique des Terres Australes et Antarctiques Francaises 2007
     * Type: Geodetic
     * Extent: French Southern Territories - onshore and offshore: Amsterdam and St Paul, Crozet, Europa and Kerguelen.
     * Antarctica - Adelie Land coastal area.
     * ITRF2005 at epoch 2007.274
     * Replaces IGN 1963-64 on Amsterdam, Saint-Paul 1969 on St Paul, IGN64 on Crozet, MHM 1954 on Europa, IGN 1962 on
     * Kerguelen, and Petrels 1972 and Perroud 1950 in Adelie Land.
     */
    public const EPSG_RESEAU_GEODESIQUE_DES_TERRES_AUSTRALES_ET_ANTARCTIQUES_FRANCAISES_2007 = 'urn:ogc:def:datum:EPSG::1113';

    /**
     * Reseau National Belge 1950
     * Type: Geodetic
     * Extent: Belgium - onshore.
     * Fundamental point: Lommel (tower). Latitude: 51°13'47.334"N, longitude: 5°18'49.483"E (of Greenwich).
     */
    public const EPSG_RESEAU_NATIONAL_BELGE_1950 = 'urn:ogc:def:datum:EPSG::6215';

    /**
     * Reseau National Belge 1950 (Brussels)
     * Type: Geodetic
     * Extent: Belgium - onshore.
     * Fundamental point: Lommel (tower). Latitude: 51°13'47.334"N, longitude: 0°56'44.773"E (of Brussels).
     */
    public const EPSG_RESEAU_NATIONAL_BELGE_1950_BRUSSELS = 'urn:ogc:def:datum:EPSG::6809';

    /**
     * Reseau National Belge 1972
     * Type: Geodetic
     * Extent: Belgium - onshore.
     * Fundamental point: Uccle observatory. Latitude: 50°47'57.704"N, longitude: 4°21'24.983"E (of Greenwich).
     */
    public const EPSG_RESEAU_NATIONAL_BELGE_1972 = 'urn:ogc:def:datum:EPSG::6313';

    /**
     * Reseau de Reference des Antilles Francaises 1991
     * Type: Geodetic
     * Extent: French Antilles onshore and offshore - Guadeloupe (including Grande Terre, Basse Terre, Marie Galante,
     * Les Saintes, Iles de la Petite Terre, La Desirade); Martinique; St Barthélemy; St Martin.
     * WGS 84 coordinates of a single station determined during the 1988 Tango mission.
     * Replaces Fort Marigot and Sainte Anne (datum codes 6621-22) in Guadeloupe and Fort Desaix (datum code 6625) in
     * Martinique. Replaced by Reseau Geodesique des Antilles Francaises 2009 (datum code 1073).
     */
    public const EPSG_RESEAU_DE_REFERENCE_DES_ANTILLES_FRANCAISES_1991 = 'urn:ogc:def:datum:EPSG::1047';

    /**
     * Rete Dinamica Nazionale 2008
     * Type: Geodetic
     * Extent: Italy - onshore and offshore; San Marino, Vatican City State.
     * Italian densification of ETRS89 realised through network of 99 permanent reference stations in ETRF2000@2008.0.
     * Adopted as official Italian reference datum 10/11/2011. Replaces IGM95 (datum code 6670).
     */
    public const EPSG_RETE_DINAMICA_NAZIONALE_2008 = 'urn:ogc:def:datum:EPSG::1132';

    /**
     * Reunion 1947
     * Type: Geodetic
     * Extent: Reunion - onshore.
     * Fundamental point: Piton des Neiges (Borne). Latitude: 21°05'13.119"S, longitude: 55°29'09.193"E (of
     * Greenwich).
     * Replaced by RGR92 (datum code 6627).
     */
    public const EPSG_REUNION_1947 = 'urn:ogc:def:datum:EPSG::6626';

    /**
     * Reunion 1989
     * Type: Vertical
     * Extent: Reunion - onshore.
     * Mean sea level during part of November 1949 at port of Saint-Pierre. Origin = marker AB-100 with defined
     * elevation of 13.808m above msl.
     * Orthometric heights. Replaces Reunion IGN58. Value of marker AB-100 retains height from 1958 adjustment.
     */
    public const EPSG_REUNION_1989 = 'urn:ogc:def:datum:EPSG::5156';

    /**
     * Reykjavik 1900
     * Type: Geodetic
     * Extent: Iceland - mainland.
     * Fundamental point:  Latitude: 64°08'31.88"N, longitude: 21°55'51.15"W (of Greenwich).
     */
    public const EPSG_REYKJAVIK_1900 = 'urn:ogc:def:datum:EPSG::6657';

    /**
     * Rikets hojdsystem 1900
     * Type: Vertical
     * Extent: Sweden - onshore.
     * Adjustment is referenced to mean sea level at Slussen, Stockholm.
     * Realized through the first precise levelling network of 1886-1905. Replaced by RH70.
     */
    public const EPSG_RIKETS_HOJDSYSTEM_1900 = 'urn:ogc:def:datum:EPSG::5209';

    /**
     * Rikets hojdsystem 1970
     * Type: Vertical
     * Extent: Sweden - onshore.
     * Adjustment is referenced to mean high tide at Amsterdams Peil in 1684. To account for land level movements
     * caused by isostatic rebound, heights are reduced to epoch 1970.0 using uplift values computed from repeated
     * levelling observations.
     * Realized through the second precise levelling network of 1951-1967. Uses Normal heights. Replaces RH00. Replaced
     * in 2005 by RH2000.
     */
    public const EPSG_RIKETS_HOJDSYSTEM_1970 = 'urn:ogc:def:datum:EPSG::5117';

    /**
     * Rikets hojdsystem 2000
     * Type: Vertical
     * Extent: Sweden - onshore.
     * Adjustment is referenced to mean high tide at Amsterdams Peil in 1684. To account for land level movements
     * caused by isostatic rebound, heights are reduced to epoch 2000.0 using values computed from the RH 2000 LU
     * (=NKG2005LU) uplift model.
     * Realized through the third precise levelling network of 1979-2003. Adopted in 2005, replacing RH70. Uses Normal
     * heights.
     */
    public const EPSG_RIKETS_HOJDSYSTEM_2000 = 'urn:ogc:def:datum:EPSG::5208';

    /**
     * Rikets koordinatsystem 1990
     * Type: Geodetic
     * Extent: Sweden - onshore and offshore.
     * Replaces RT38 adjustment (datum code 6308).
     */
    public const EPSG_RIKETS_KOORDINATSYSTEM_1990 = 'urn:ogc:def:datum:EPSG::6124';

    /**
     * Ross Sea Region Geodetic Datum 2000
     * Type: Geodetic
     * Extent: Antarctica - Ross Sea Region - nominally between 160°E and 150°W but includes buffer on eastern
     * hemisphere margin to include Transantarctic Mountains
     * Based on ITRF96 at epoch 2000.0.
     */
    public const EPSG_ROSS_SEA_REGION_GEODETIC_DATUM_2000 = 'urn:ogc:def:datum:EPSG::6764';

    /**
     * SCM22 Intermediate Reference Frame
     * Type: Geodetic
     * Extent: United Kingdom (UK) - on or related to the Scottish central mainline rail route from Motherwell through
     * Perth and Pitlochry to Inverness.
     * Defined through the application of the SCM22 NTv2 transformation to ETRS89 as realized through OSNet v2009 CORS.
     * Created in 2022 to support intermediate CRS "SCM22-IRF" in the emulation of the SCM22 Snake map projection.
     */
    public const EPSG_SCM22_INTERMEDIATE_REFERENCE_FRAME = 'urn:ogc:def:datum:EPSG::1320';

    /**
     * SIRGAS Continuously Operating Network DGF00P01
     * Type: Dynamic geodetic
     * Extent: Latin America - Central America and South America, onshore and offshore.
     * Aligned to ITRF97 at epoch 2000.40. Realized by a frame of 31 continuously operating stations using GPS
     * observations from June 1996 to February 2000. Velocity model VEMOS2003 used to propagate coordinates to the
     * frame reference epoch.
     * DGF00P01 is included in ITRF2000 as a regional densification for South America. Replaced by DGF01P01 (datum code
     * 1228).
     */
    public const EPSG_SIRGAS_CONTINUOUSLY_OPERATING_NETWORK_DGF00P01 = 'urn:ogc:def:datum:EPSG::1227';

    /**
     * SIRGAS Continuously Operating Network DGF01P01
     * Type: Dynamic geodetic
     * Extent: Latin America - Central America and South America, onshore and offshore.
     * Aligned to ITRF2000 at epoch 2000.00. Realized by a frame of 48 continuously operating stations using GPS
     * observations from June 1996 to April 2001. Velocity model VEMOS2003 used to propagate coordinates to the frame
     * reference epoch.
     * Replaces DGF00P01 (datum code 1227). Replaced by DGF01P02 (datum code 1229).
     */
    public const EPSG_SIRGAS_CONTINUOUSLY_OPERATING_NETWORK_DGF01P01 = 'urn:ogc:def:datum:EPSG::1228';

    /**
     * SIRGAS Continuously Operating Network DGF01P02
     * Type: Dynamic geodetic
     * Extent: Latin America - Central America and South America, onshore and offshore.
     * Aligned to ITRF2000 at epoch 1998.40. Realized by a frame of 49 continuously operating stations using GPS
     * observations from June 1996 to October 2001. Velocity model VEMOS2003 used to propagate coordinates to the frame
     * reference epoch.
     * Replaces DGF01P01 (datum code 1228). Replaced by DGF02P01 (datum code 1230).
     */
    public const EPSG_SIRGAS_CONTINUOUSLY_OPERATING_NETWORK_DGF01P02 = 'urn:ogc:def:datum:EPSG::1229';

    /**
     * SIRGAS Continuously Operating Network DGF02P01
     * Type: Dynamic geodetic
     * Extent: Latin America - Central America and South America, onshore and offshore.
     * Aligned to ITRF2000 at epoch 2000.00. Realized by a frame of 53 continuously operating stations using GPS
     * observations from June 1996 to July 2002. Velocity model VEMOS2003 used to propagate coordinates to the frame
     * reference epoch.
     * Replaces DGF01P02 (datum code 1229). Replaced by DGF04P01 (datum code 1331).
     */
    public const EPSG_SIRGAS_CONTINUOUSLY_OPERATING_NETWORK_DGF02P01 = 'urn:ogc:def:datum:EPSG::1230';

    /**
     * SIRGAS Continuously Operating Network DGF04P01
     * Type: Dynamic geodetic
     * Extent: Latin America - Central America and South America, onshore and offshore.
     * Aligned to ITRF2000 at epoch 2003.00. Realized by a frame of 69 continuously operating stations using GPS
     * observations from June 1996 to July 2004. Velocity model VEMOS2003 used to propagate coordinates to the frame
     * reference epoch.
     * Replaces DGF02P01 (datum code 1230). Replaced by DGF05P01 (datum code 1232).
     */
    public const EPSG_SIRGAS_CONTINUOUSLY_OPERATING_NETWORK_DGF04P01 = 'urn:ogc:def:datum:EPSG::1231';

    /**
     * SIRGAS Continuously Operating Network DGF05P01
     * Type: Dynamic geodetic
     * Extent: Latin America - Central America and South America, onshore and offshore.
     * Aligned to ITRF2000 at epoch 2004.00. Realized by a frame of 95 continuously operating stations using GPS
     * observations from June 1996 to September 2005. Velocity model VEMOS2003 used to propagate coordinates to the
     * frame reference epoch.
     * Replaces DGF04P01 (datum code 1231). Replaced by DGF06P01 (datum code 1233).
     */
    public const EPSG_SIRGAS_CONTINUOUSLY_OPERATING_NETWORK_DGF05P01 = 'urn:ogc:def:datum:EPSG::1232';

    /**
     * SIRGAS Continuously Operating Network DGF06P01
     * Type: Dynamic geodetic
     * Extent: Latin America - Central America and South America, onshore and offshore.
     * Aligned to ITRF2000 at epoch 2004.00. Realized by a frame of 94 continuously operating stations using GPS
     * observations from June 1996 to June 2006. Velocity model VEMOS2003 used to propagate coordinates to the frame
     * reference epoch.
     * Replaces DGF05P01 (datum code 1232). Replaced by DGF07P01 (datum code 1234).
     */
    public const EPSG_SIRGAS_CONTINUOUSLY_OPERATING_NETWORK_DGF06P01 = 'urn:ogc:def:datum:EPSG::1233';

    /**
     * SIRGAS Continuously Operating Network DGF07P01
     * Type: Dynamic geodetic
     * Extent: Latin America - Central America and South America, onshore and offshore.
     * Aligned to IGS05 at epoch 2004.50. Realized by a frame of 106 continuously operating stations using GPS
     * observations in 3 periods between December 2001 and October 2007. Velocity model VEMOS2003 used to propagate
     * coordinates to the frame reference epoch.
     * Replaces DGF06P01 (datum code 1233). Replaced by DGF08P01 (datum code 1235).
     */
    public const EPSG_SIRGAS_CONTINUOUSLY_OPERATING_NETWORK_DGF07P01 = 'urn:ogc:def:datum:EPSG::1234';

    /**
     * SIRGAS Continuously Operating Network DGF08P01
     * Type: Dynamic geodetic
     * Extent: Latin America - Central America and South America, onshore and offshore.
     * Aligned to IGS05 at epoch 2004.50. Realized by a frame of 126 continuously operating stations using GPS
     * observations from December 2002 to March 2008. Velocity model VEMOS2003 used to propagate coordinates to the
     * frame reference epoch.
     * Replaces DGF07P01 (datum code 1234). Replaced by SIR09P01  (datum code 1236).
     */
    public const EPSG_SIRGAS_CONTINUOUSLY_OPERATING_NETWORK_DGF08P01 = 'urn:ogc:def:datum:EPSG::1235';

    /**
     * SIRGAS Continuously Operating Network SIR09P01
     * Type: Dynamic geodetic
     * Extent: Latin America - Central America and South America, onshore and offshore.
     * Aligned to IGS05 at epoch 2005.00. Realized by a frame of 128 continuously operating stations using GPS
     * observations from January 2000 to January 2009. Velocity model VEMOS2009 used to propagate coordinates to the
     * frame reference epoch.
     * Replaces DGF08P01 (datum code 1235). Replaced by SIR10P01 (datum code 1237).
     */
    public const EPSG_SIRGAS_CONTINUOUSLY_OPERATING_NETWORK_SIR09P01 = 'urn:ogc:def:datum:EPSG::1236';

    /**
     * SIRGAS Continuously Operating Network SIR10P01
     * Type: Dynamic geodetic
     * Extent: Latin America - Central America and South America, onshore and offshore.
     * Aligned to ITRF08 at epoch 2005.00. Realized by a frame of 183 continuously operating stations using GPS
     * observations from January 2000 to June 2010. Velocity model VEMOS2009 used to propagate coordinates to the frame
     * reference epoch.
     * Replaces SIR09P01 (datum code 1236). Replaced by SIR11P01 (datum code 1238).
     */
    public const EPSG_SIRGAS_CONTINUOUSLY_OPERATING_NETWORK_SIR10P01 = 'urn:ogc:def:datum:EPSG::1237';

    /**
     * SIRGAS Continuously Operating Network SIR11P01
     * Type: Dynamic geodetic
     * Extent: Latin America - Central America and South America, onshore and offshore.
     * Aligned to ITRF08 at epoch 2005.00. Realized by a frame of 230 continuously operating stations using GPS
     * observations from January 2000 to April 2011. Velocity model VEMOS2009 used to propagate coordinates to the
     * frame reference epoch.
     * Replaces SIR10P01 (datum code 1237). Replaced by SIR13P01 (datum code 1239). Last multi-year solution without
     * the effects of the El Maule earthquake in February 2010.
     */
    public const EPSG_SIRGAS_CONTINUOUSLY_OPERATING_NETWORK_SIR11P01 = 'urn:ogc:def:datum:EPSG::1238';

    /**
     * SIRGAS Continuously Operating Network SIR13P01
     * Type: Dynamic geodetic
     * Extent: Latin America - Central America and South America, onshore and offshore.
     * Aligned to IGb08 at epoch 2012.00. Realized by a frame of 108 continuously operating stations using GPS
     * observations from April 2010 to June 2013. Velocity model VEMOS2009 used to propagate coordinates to the frame
     * reference epoch.
     * Replaces SIR11P01 (datum code 1238). Replaced by SIR14P01 (datum code 1240). First multi-year solution after the
     * El Maule earthquake of February 2010.
     */
    public const EPSG_SIRGAS_CONTINUOUSLY_OPERATING_NETWORK_SIR13P01 = 'urn:ogc:def:datum:EPSG::1239';

    /**
     * SIRGAS Continuously Operating Network SIR14P01
     * Type: Dynamic geodetic
     * Extent: Latin America - Central America and South America, onshore and offshore.
     * Aligned to IGb08 at epoch 2013.00. Realized by a frame of 242 continuously operating stations using GNSS
     * observations from April 2010 to July 2014. Velocity model VEMOS2009 used to propagate coordinates to the frame
     * reference epoch.
     * Replaces SIR13P01 (datum code 1239). Replaced by SIR15P01 (datum code 1241).
     */
    public const EPSG_SIRGAS_CONTINUOUSLY_OPERATING_NETWORK_SIR14P01 = 'urn:ogc:def:datum:EPSG::1240';

    /**
     * SIRGAS Continuously Operating Network SIR15P01
     * Type: Dynamic geodetic
     * Extent: Latin America - Central America and South America, onshore and offshore.
     * Aligned to IGb08 at epoch 2013.00. Realized by a frame of 303 continuously operating stations using GNSS
     * observations from March 2010 to April 2015. Velocity model VEMOS2015 used to propagate coordinates to the frame
     * reference epoch.
     * Replaces SIR14P01 (datum code 1240). Replaced by SIR17P01 (datum code 1242).
     */
    public const EPSG_SIRGAS_CONTINUOUSLY_OPERATING_NETWORK_SIR15P01 = 'urn:ogc:def:datum:EPSG::1241';

    /**
     * SIRGAS Continuously Operating Network SIR17P01
     * Type: Dynamic geodetic
     * Extent: Latin America - Central America and South America, onshore and offshore.
     * Aligned to IGS14 at epoch 2015.00. Realized by a frame of 345 continuously operating stations using GNSS
     * observations from April 2011 to January 2017. Velocity model VEMOS2017 used to propagate coordinates to the
     * frame reference epoch.
     * Replaces SIR15P01 (datum code 1241).
     */
    public const EPSG_SIRGAS_CONTINUOUSLY_OPERATING_NETWORK_SIR17P01 = 'urn:ogc:def:datum:EPSG::1242';

    /**
     * SIRGAS-Chile realization 1 epoch 2002
     * Type: Geodetic
     * Extent: Chile - onshore and offshore. Includes Easter Island, Juan Fernandez Islands, San Felix, and Sala y
     * Gomez.
     * ITRF2000 at epoch 2002.0.  Densification of SIRGAS 2000 network in Chile, consisting of 650 monumented stations.
     * Densification of SIRGAS 2000 within Chile. Replaces PSAD56 (datum code 6248) in Chile, HITO XVIII (datum code
     * 6254) in Chilean Tierra del Fuego and Easter Island 1967 (datum code 6719) in Easter Island. Replaced by
     * SIRGAS-Chile 2010 (datum code 1243).
     */
    public const EPSG_SIRGAS_CHILE_REALIZATION_1_EPOCH_2002 = 'urn:ogc:def:datum:EPSG::1064';

    /**
     * SIRGAS-Chile realization 2 epoch 2010
     * Type: Geodetic
     * Extent: Chile - onshore and offshore. Includes Easter Island, Juan Fernandez Islands, San Felix, and Sala y
     * Gomez.
     * IGS08 at epoch 2010.00. Densification of SIRGAS-CON network in Chile, consisting of 120 monumented stations.
     * Replaces SIRGAS-Chile realization 1 epoch 2002, following significant tectonic deformation. Replaced by
     * SIRGAS-Chile realization 3 epoch 2013.
     */
    public const EPSG_SIRGAS_CHILE_REALIZATION_2_EPOCH_2010 = 'urn:ogc:def:datum:EPSG::1243';

    /**
     * SIRGAS-Chile realization 3 epoch 2013
     * Type: Geodetic
     * Extent: Chile - onshore and offshore. Includes Easter Island, Juan Fernandez Islands, San Felix, and Sala y
     * Gomez.
     * IGb08 at epoch 2013.00. Densification of SIRGAS-CON network in Chile, consisting of 130 monumented stations.
     * Replaces SIRGAS-Chile realization 2 epoch 2010, following significant tectonic deformation. Replaced by
     * SIRGAS-Chile realization 4 epoch 2016.
     */
    public const EPSG_SIRGAS_CHILE_REALIZATION_3_EPOCH_2013 = 'urn:ogc:def:datum:EPSG::1252';

    /**
     * SIRGAS-Chile realization 4 epoch 2016
     * Type: Geodetic
     * Extent: Chile - onshore and offshore. Includes Easter Island, Juan Fernandez Islands, San Felix, and Sala y
     * Gomez.
     * IGb08 at epoch 2016.00. Densification of SIRGAS-CON network in Chile, consisting of 200 monumented stations.
     * Replaces SIRGAS-Chile realization 3 epoch 2013. Replaced by SIRGAS-Chile realization 5 epoch 2021 due to
     * significant tectonic deformation.
     */
    public const EPSG_SIRGAS_CHILE_REALIZATION_4_EPOCH_2016 = 'urn:ogc:def:datum:EPSG::1253';

    /**
     * SIRGAS-Chile realization 5 epoch 2021
     * Type: Geodetic
     * Extent: Chile - onshore and offshore. Includes Easter Island, Juan Fernandez Islands, San Felix, and Sala y
     * Gomez.
     * Densification of SIRGAS-CON network in Chile, consisting of 97 stations forming the active CORS network (RGN)
     * referenced to IGb2014 (ITRF2014) at epoch 2021.00. Passive stations used in previous realizations have been
     * removed from this solution.
     * Replaces SIRGAS-Chile realization 4 epoch 2016 from August 2021 due to significant tectonic deformation. 24
     * additional active CORS used in this realization compared to that of 2016.
     */
    public const EPSG_SIRGAS_CHILE_REALIZATION_5_EPOCH_2021 = 'urn:ogc:def:datum:EPSG::1327';

    /**
     * SIRGAS-ROU98
     * Type: Geodetic
     * Extent: Uruguay - onshore and offshore.
     * Densification of SIRGAS95 network in Uruguay, consisting of 17 passive geodetic stations and 3 continuous
     * recording GPS stations. ITRF94 at epoch 1995.4.
     * Densification of SIRGAS 1995 within Uruguay. Replaces Yacare (datum code 6309) in Uruguay. Uruguay documentation
     * clearly states use of WGS 84 reference ellipsoid.
     */
    public const EPSG_SIRGAS_ROU98 = 'urn:ogc:def:datum:EPSG::1068';

    /**
     * SIRGAS_ES2007.8
     * Type: Geodetic
     * Extent: El Salvador - onshore and offshore.
     * ITRF2005 at epoch 2007.85.  Densification of SIRGAS-CON network in El Salvador, consisting of 38 monumented
     * stations.
     * SIRGAS-ES2007.8 is the national SIRGAS densification.
     */
    public const EPSG_SIRGAS_ES2007_8 = 'urn:ogc:def:datum:EPSG::1069';

    /**
     * ST71 Belep
     * Type: Geodetic
     * Extent: New Caledonia - Belep.
     */
    public const EPSG_ST71_BELEP = 'urn:ogc:def:datum:EPSG::6643';

    /**
     * ST84 Ile des Pins
     * Type: Geodetic
     * Extent: New Caledonia - Ile des Pins.
     * Fundamental point: Pic Nga.
     */
    public const EPSG_ST84_ILE_DES_PINS = 'urn:ogc:def:datum:EPSG::6642';

    /**
     * ST87 Ouvea
     * Type: Geodetic
     * Extent: New Caledonia - Loyalty Islands - Ouvea.
     * Ouloup.
     */
    public const EPSG_ST87_OUVEA = 'urn:ogc:def:datum:EPSG::6750';

    /**
     * SVY21
     * Type: Geodetic
     * Extent: Singapore - onshore and offshore.
     * Fundamental point: Base 7 at Pierce Reservoir. Latitude: 1°22'02.9154"N, longitude: 103°49'31.9752"E (of
     * Greenwich).
     * Replaces Kertau 1968 for cadastral purposes from August 2004.
     */
    public const EPSG_SVY21 = 'urn:ogc:def:datum:EPSG::6757';

    /**
     * SWEREF99
     * Type: Geodetic
     * Extent: Sweden - onshore and offshore.
     * Densification of ETRS89.
     * The solution was calculated in ITRF97 epoch 1999.5, and has subsequently been corrected to ETRS89 in accordance
     * with guidelines given by EUREF.
     */
    public const EPSG_SWEREF99 = 'urn:ogc:def:datum:EPSG::6619';

    /**
     * Saint Pierre et Miquelon 1950
     * Type: Geodetic
     * Extent: St Pierre and Miquelon - onshore.
     * Replaced by RGSPM06 (datum code 1038).
     */
    public const EPSG_SAINT_PIERRE_ET_MIQUELON_1950 = 'urn:ogc:def:datum:EPSG::6638';

    /**
     * Santa Cruz da Graciosa
     * Type: Vertical
     * Extent: Portugal - central Azores - Graciosa island onshore.
     * Mean Sea Level during 1938 at Santa Cruz da Graciosa.
     * Orthometric heights.
     */
    public const EPSG_SANTA_CRUZ_DA_GRACIOSA = 'urn:ogc:def:datum:EPSG::1106';

    /**
     * Santa Cruz das Flores
     * Type: Vertical
     * Extent: Portugal - western Azores onshore - Flores, Corvo.
     * Mean Sea Level during 1965 at Santa Cruz das Flores.
     * Orthometric heights.
     */
    public const EPSG_SANTA_CRUZ_DAS_FLORES = 'urn:ogc:def:datum:EPSG::1108';

    /**
     * Santo 1965
     * Type: Geodetic
     * Extent: Vanuatu - northern islands - Aese, Ambrym, Aoba, Epi, Espiritu Santo, Maewo, Malo, Malkula, Paama,
     * Pentecost, Shepherd and Tutuba.
     * Datum covers all the major islands of Vanuatu in two different adjustment blocks, but practical usage is as
     * given in the area of use.
     */
    public const EPSG_SANTO_1965 = 'urn:ogc:def:datum:EPSG::6730';

    /**
     * Sao Tome
     * Type: Geodetic
     * Extent: Sao Tome and Principe - onshore - Sao Tome.
     * Fundamental point: Fortaleza. Latitude: 0°20'49.02"N, longitude: 6°44'41.85"E (of Greenwich).
     */
    public const EPSG_SAO_TOME = 'urn:ogc:def:datum:EPSG::1044';

    /**
     * Sapper Hill 1943
     * Type: Geodetic
     * Extent: Falkland Islands (Malvinas) - onshore.
     */
    public const EPSG_SAPPER_HILL_1943 = 'urn:ogc:def:datum:EPSG::6292';

    /**
     * Schwarzeck
     * Type: Geodetic
     * Extent: Namibia - onshore and offshore.
     * Fundamental point: Schwarzeck. Latitude: 22°45'35.820"S, longitude: 18°40'34.549"E (of Greenwich). Fixed
     * during German South West Africa-British Bechuanaland boundary survey of 1898-1903.
     */
    public const EPSG_SCHWARZECK = 'urn:ogc:def:datum:EPSG::6293';

    /**
     * Scoresbysund 1952
     * Type: Geodetic
     * Extent: Greenland - Scoresbysund area onshore.
     */
    public const EPSG_SCORESBYSUND_1952 = 'urn:ogc:def:datum:EPSG::6195';

    /**
     * Selvagem Grande
     * Type: Geodetic
     * Extent: Portugal - Selvagens islands (Madeira province) - onshore.
     */
    public const EPSG_SELVAGEM_GRANDE = 'urn:ogc:def:datum:EPSG::6616';

    /**
     * Serbian Reference Network 1998
     * Type: Geodetic
     * Extent: Serbia including Vojvodina.
     * Densification of ETRS89 in Serbia at epoch 1998.7 based on coordinates of 6 stations in Serbia of Yugoslav
     * Reference Frame (YUREF) 1998 campaign.
     * Observed 1998-2003.
     */
    public const EPSG_SERBIAN_REFERENCE_NETWORK_1998 = 'urn:ogc:def:datum:EPSG::1034';

    /**
     * Serbian Spatial Reference System 2000
     * Type: Geodetic
     * Extent: Serbia including Vojvodina.
     * Densification of ETRF2000 in Serbia at epoch 2010.63.
     * Replaces SREF98.
     */
    public const EPSG_SERBIAN_SPATIAL_REFERENCE_SYSTEM_2000 = 'urn:ogc:def:datum:EPSG::1214';

    /**
     * Serbian Vertical Reference System 2012
     * Type: Vertical
     * Extent: Serbia including Vojvodina.
     * Mean sea level of Adriatic Sea in 1971.
     * Normal heights above quasi-geoid. In Serbia replaces Trieste (datum code 1050).
     */
    public const EPSG_SERBIAN_VERTICAL_REFERENCE_SYSTEM_2012 = 'urn:ogc:def:datum:EPSG::1216';

    /**
     * Serindung
     * Type: Geodetic
     * Extent: Indonesia - west Kalimantan - onshore coastal area.
     * Fundamental point: Ep A. Latitude: 1°06'10.60"N, longitude: 105°00'59.82"E (of Greenwich).
     */
    public const EPSG_SERINDUNG = 'urn:ogc:def:datum:EPSG::6295';

    /**
     * Sibun Gorge 1922
     * Type: Geodetic
     * Extent: Belize - onshore.
     * Latitude: 17º03'40.471"N, longitude: 88º37'54.687"W.
     */
    public const EPSG_SIBUN_GORGE_1922 = 'urn:ogc:def:datum:EPSG::1071';

    /**
     * Sierra Leone 1968
     * Type: Geodetic
     * Extent: Sierra Leone - onshore.
     * Fundamental point: SLX2 Astro. Latitude: 8°27'17.567"N, longitude: 12°49'40.186"W (of Greenwich).
     * Extension and readjustment with additional observations of 1960 network.  Coordinates of 1960 stations change by
     * less than 3 metres.
     */
    public const EPSG_SIERRA_LEONE_1968 = 'urn:ogc:def:datum:EPSG::6175';

    /**
     * Sierra Leone Colony 1924
     * Type: Geodetic
     * Extent: Sierra Leone - Freetown Peninsula.
     * Fundamental point: Kortright. Latitude: 8°28'44.4"N, longitude: 13°13'03.81"W (of Greenwich).
     */
    public const EPSG_SIERRA_LEONE_COLONY_1924 = 'urn:ogc:def:datum:EPSG::6174';

    /**
     * Singapore Height Datum
     * Type: Vertical
     * Extent: Singapore - onshore and offshore.
     * Mean sea level determined at Victoria Dock tide gauge 1935-1937.
     * Orthometric heights. Network readjusted in 2009.
     */
    public const EPSG_SINGAPORE_HEIGHT_DATUM = 'urn:ogc:def:datum:EPSG::1140';

    /**
     * Sistem Referensi Geospasial Indonesia 2013
     * Type: Dynamic geodetic
     * Extent: Indonesia - onshore and offshore.
     * ITRF2008 at epoch 2012.0.
     * Semi-dynamic datum. Geometric element of geodetic control network (JKG). Replaces DGN95 and all older datums.
     */
    public const EPSG_SISTEM_REFERENSI_GEOSPASIAL_INDONESIA_2013 = 'urn:ogc:def:datum:EPSG::1293';

    /**
     * Sistema Geodesico Nacional de Panama MACARIO SOLIS
     * Type: Geodetic
     * Extent: Panama - onshore and offshore.
     * ITRF2000 at epoch 2000.0. Densification of SIRGAS 2000 network in Panama, consisting of 20 GPS stations
     * throughout the country.
     */
    public const EPSG_SISTEMA_GEODESICO_NACIONAL_DE_PANAMA_MACARIO_SOLIS = 'urn:ogc:def:datum:EPSG::1066';

    /**
     * Sistema de Referencia Geocentrico para America del Sur 1995
     * Type: Geodetic
     * Extent: South America - onshore and offshore. Ecuador (mainland and Galapagos) - onshore and offshore.
     * ITRF94 at epoch 1995.4.
     * Realized by a frame of 58 stations observed in 1995 and adjusted in ITRF94. Provisional NIMA adjustment
     * reference epoch was 1995.42 but final report accepted value is 1995.40.  Replaced by SIRGAS 2000.
     */
    public const EPSG_SISTEMA_DE_REFERENCIA_GEOCENTRICO_PARA_AMERICA_DEL_SUR_1995 = 'urn:ogc:def:datum:EPSG::6170';

    /**
     * Sistema de Referencia Geocentrico para las AmericaS 2000
     * Type: Geodetic
     * Extent: Latin America - Central America and South America - onshore and offshore. Brazil - onshore and offshore.
     * ITRF2000 at epoch 2000.40.
     * Realized by a frame of 184 stations observed in 2000 and adjusted in the ITRF2000. Includes ties to tide gauges.
     * Replaces SIRGAS 1995 system for South America; expands SIRGAS to Central America.  Name changed in 2001 for use
     * in all of Latin America.
     */
    public const EPSG_SISTEMA_DE_REFERENCIA_GEOCENTRICO_PARA_LAS_AMERICAS_2000 = 'urn:ogc:def:datum:EPSG::6674';

    /**
     * Sistema de Referencia Vertical Nacional 2016
     * Type: Vertical
     * Extent: Argentina - onshore.
     * Mean Sea Level 1923 at Mar del Plata defined at station 71 (C = 121.64978 m^2s^-2) = 12.43m for mainland,
     * Ushuaia station PF1N(383) (C = 38.427 m^2s^-2) =  3.915m for Tierra del Fuego. These geopotential numbers
     * correspond with historic values.
     * Replaces SRVN71.
     */
    public const EPSG_SISTEMA_DE_REFERENCIA_VERTICAL_NACIONAL_2016 = 'urn:ogc:def:datum:EPSG::1260';

    /**
     * Sister Islands Geodetic Datum 1961
     * Type: Geodetic
     * Extent: Cayman Islands - Little Cayman and Cayman Brac.
     * Fundamental point: LC5. Latitude: 19°39'46.324"N, longitude: 80°03'47.910"W (of Greenwich).
     * Replaced by CIGD11 (datum code 1100).
     */
    public const EPSG_SISTER_ISLANDS_GEODETIC_DATUM_1961 = 'urn:ogc:def:datum:EPSG::6726';

    /**
     * Slovenia Geodetic Datum 1996
     * Type: Geodetic
     * Extent: Slovenia - onshore and offshore.
     * Densification of ETRS89, based on ITRS89 at epoch 1995.55.
     */
    public const EPSG_SLOVENIA_GEODETIC_DATUM_1996 = 'urn:ogc:def:datum:EPSG::6765';

    /**
     * Slovenian Vertical System 2000
     * Type: Vertical
     * Extent: Slovenia - onshore.
     * Reference point Ruse defined relative to mean sea level at Trieste in 1875.
     * Normal-orthometric heights. Promulgated through the National Vertical Network adjustment of 1999.
     */
    public const EPSG_SLOVENIAN_VERTICAL_SYSTEM_2000 = 'urn:ogc:def:datum:EPSG::5177';

    /**
     * Slovenian Vertical System 2010
     * Type: Vertical
     * Extent: Slovenia - onshore.
     * Mean sea level at Koper over 18.6 years, selected epoch is 2010-10-10.
     * Normal heights. Replaces SVS2000 from 2019-01.
     */
    public const EPSG_SLOVENIAN_VERTICAL_SYSTEM_2010 = 'urn:ogc:def:datum:EPSG::1215';

    /**
     * Solomon 1968
     * Type: Geodetic
     * Extent: Solomon Islands - onshore southern Solomon Islands, primarily Guadalcanal, Malaita, San Cristobel, Santa
     * Isobel, Choiseul, Makira-Ulawa.
     * Fundamental point: GUX 1.
     */
    public const EPSG_SOLOMON_1968 = 'urn:ogc:def:datum:EPSG::6718';

    /**
     * South Africa Land Levelling Datum
     * Type: Vertical
     * Extent: South Africa - mainland onshore.
     * Mean Sea Level at Cape Town harbour 1900 and 1907, referred to Datum Benchmark BM1.
     * Orthometric heights.
     */
    public const EPSG_SOUTH_AFRICA_LAND_LEVELLING_DATUM = 'urn:ogc:def:datum:EPSG::1262';

    /**
     * South American Datum 1969
     * Type: Geodetic
     * Extent: Brazil - onshore and offshore. In rest of South America - onshore north of approximately 45°S and
     * Tierra del Fuego.
     * Fundamental point: Chua. Geodetic latitude: 19°45'41.6527"S; geodetic longitude: 48°06'04.0639"W (of
     * Greenwich). (Astronomic coordinates: Latitude 19°45'41.34"S +/- 0.05", longitude 48°06'07.80"W +/- 0.08").
     * SAD69 uses GRS 1967 ellipsoid but with 1/f to exactly 2 decimal places. In Brazil only, replaced by SAD69(96)
     * (datum code 1075).
     */
    public const EPSG_SOUTH_AMERICAN_DATUM_1969 = 'urn:ogc:def:datum:EPSG::6618';

    /**
     * South American Datum 1969(96)
     * Type: Geodetic
     * Extent: Brazil - onshore and offshore. Includes Rocas, Fernando de Noronha archipelago, Trindade, Ihlas Martim
     * Vaz and Sao Pedro e Sao Paulo.
     * Fundamental point: Chua. Geodetic latitude: 19°45'41.6527"S; geodetic longitude: 48°06'04.0639"W (of
     * Greenwich). (Astronomic coordinates: Latitude 19°45'41.34"S +/- 0.05", longitude 48°06'07.80"W +/- 0.08").
     * SAD69 uses GRS 1967 ellipsoid but with 1/f to exactly 2 decimal places. Replaces original 1969 adjustment (datum
     * code 6618) in Brazil.
     */
    public const EPSG_SOUTH_AMERICAN_DATUM_1969_96 = 'urn:ogc:def:datum:EPSG::1075';

    /**
     * South East Island 1943
     * Type: Geodetic
     * Extent: Seychelles - Mahe, Silhouette, North, Aride Island, Praslin, La Digue and Frigate islands including
     * adjacent smaller granitic islands on the Seychelles Bank, Bird Island and Denis Island.
     * Fundamental point: Challenger Astro near Port Victoria lighthouse. Latitude: 4°40'39.460"S, longitude:
     * 55°32'00.166"E (of Greenwich).
     * Network readjusted in 1958-59 and extended to Bird and Denis islands in 1975.
     */
    public const EPSG_SOUTH_EAST_ISLAND_1943 = 'urn:ogc:def:datum:EPSG::1138';

    /**
     * South Georgia 1968
     * Type: Geodetic
     * Extent: South Georgia and the South Sandwich Islands - South Georgia onshore.
     * Fundamental point: ISTS 061.
     */
    public const EPSG_SOUTH_GEORGIA_1968 = 'urn:ogc:def:datum:EPSG::6722';

    /**
     * South Yemen
     * Type: Geodetic
     * Extent: Yemen - South Yemen onshore mainland.
     */
    public const EPSG_SOUTH_YEMEN = 'urn:ogc:def:datum:EPSG::6164';

    /**
     * Sri Lanka Datum 1999
     * Type: Geodetic
     * Extent: Sri Lanka - onshore.
     * Fundamental point: ISM Diyatalawa. Latitude: 6°49'02.687"N, longitude: 80°57'40.880"E.
     * Introduced in 2000.
     */
    public const EPSG_SRI_LANKA_DATUM_1999 = 'urn:ogc:def:datum:EPSG::1053';

    /**
     * Sri Lanka Vertical Datum
     * Type: Vertical
     * Extent: Sri Lanka - onshore.
     * MSL at Colombo 1884-1889.
     * Normal-orthometric heights, but often referred to as "orthometric".
     */
    public const EPSG_SRI_LANKA_VERTICAL_DATUM = 'urn:ogc:def:datum:EPSG::1054';

    /**
     * St. George Island
     * Type: Geodetic
     * Extent: United States (USA) - Alaska - Pribilof Islands - St George Island.
     * Fundamental point latitude: 56°36'11.31"N, longitude: 169°32'36.00"W (of Greenwich).
     * Many Alaskan islands were never on NAD27 but rather on independent datums.  NADCON conversion program provides
     * transformation from St. George Island Datum to NAD83 (original 1986 realization) - making the transformation
     * appear to user as if from NAD27.
     */
    public const EPSG_ST_GEORGE_ISLAND = 'urn:ogc:def:datum:EPSG::6138';

    /**
     * St. Helena Geodetic Datum 2015
     * Type: Geodetic
     * Extent: St Helena, Ascension and Tristan da Cunha - St Helena Island - onshore.
     * ITRF2008 at epoch 2015.0. ITRF2008 coordinates (15°56'33.1198"S, 5°40'02.4412"W, 453.183m ellipsoid height) of
     * Longwood IGS CORS station STHL on 1st January 2015.
     * Developed by Richard Stanaway, Quickclose Pty Ltd, superseding Astro DOS 71 from 1st January 2016.
     */
    public const EPSG_ST_HELENA_GEODETIC_DATUM_2015 = 'urn:ogc:def:datum:EPSG::1174';

    /**
     * St. Helena Tritan
     * Type: Geodetic
     * Extent: St Helena, Ascension and Tristan da Cunha - St Helena Island - onshore.
     * WGS 84(G1150) at epoch 2011.773. WGS 84 coordinates (15°56'33.1217"S, 5°40'02.4436"W, 453.288m ellipsoid
     * height) of Longwood IGS CORS station STHL on 9th October 2011.
     */
    public const EPSG_ST_HELENA_TRITAN = 'urn:ogc:def:datum:EPSG::1173';

    /**
     * St. Helena Tritan Vertical Datum 2011
     * Type: Vertical
     * Extent: St Helena, Ascension and Tristan da Cunha - St Helena Island - onshore.
     * MSL defined by Longwood IGS station STHL reference level of 436.215m.
     * Defined by offset of -17.073m applied to St. Helena Tritan ellipsiodal height (CRS code 7880).
     */
    public const EPSG_ST_HELENA_TRITAN_VERTICAL_DATUM_2011 = 'urn:ogc:def:datum:EPSG::1176';

    /**
     * St. Helena Vertical Datum 2015
     * Type: Vertical
     * Extent: St Helena, Ascension and Tristan da Cunha - St Helena Island - onshore.
     * Longwood IGS station STHL reference level of 436.312m.
     * Defined by SHGEOID15 geoid model (transformation code 7891) applied to SHGD2015 (CRS code 7885).
     */
    public const EPSG_ST_HELENA_VERTICAL_DATUM_2015 = 'urn:ogc:def:datum:EPSG::1177';

    /**
     * St. Kilda
     * Type: Vertical
     * Extent: United Kingdom (UK) - Great Britain - Scotland - St Kilda onshore.
     * Orthometric heights.
     */
    public const EPSG_ST_KILDA = 'urn:ogc:def:datum:EPSG::5145';

    /**
     * St. Kitts 1955
     * Type: Geodetic
     * Extent: St Kitts and Nevis - onshore.
     * Fundamental point: station K12.
     */
    public const EPSG_ST_KITTS_1955 = 'urn:ogc:def:datum:EPSG::6605';

    /**
     * St. Lawrence Island
     * Type: Geodetic
     * Extent: United States (USA) - Alaska - St Lawrence Island.
     * Many Alaskan islands were never on NAD27 but rather on independent datums.  NADCON conversion program provides
     * transformation from St. Lawrence Island Datum to NAD83 (original 1986 realization) - making the transformation
     * appear to user as if from NAD27.
     */
    public const EPSG_ST_LAWRENCE_ISLAND = 'urn:ogc:def:datum:EPSG::6136';

    /**
     * St. Lucia 1955
     * Type: Geodetic
     * Extent: St Lucia - onshore.
     * Fundamental point: station DCS3.
     */
    public const EPSG_ST_LUCIA_1955 = 'urn:ogc:def:datum:EPSG::6606';

    /**
     * St. Marys
     * Type: Vertical
     * Extent: United Kingdom (UK) - Great Britain - England - Isles of Scilly onshore.
     * Mean Sea Level at St. Marys 1887. Initially realised through levelling network adjustment, from 2002 redefined
     * to be realised through OSGM geoid model.
     * Orthometric heights.
     */
    public const EPSG_ST_MARYS = 'urn:ogc:def:datum:EPSG::5147';

    /**
     * St. Paul Island
     * Type: Geodetic
     * Extent: United States (USA) - Alaska - Pribilof Islands - St Paul Island.
     * Fundamental point latitude: 57°07'16.86"N, longitude: 170°16'24.00"W (of Greenwich).
     * Many Alaskan islands were never on NAD27 but rather on independent datums.  NADCON conversion program provides
     * transformation from St. Paul Island Datum to NAD83 (original 1986 realization) - making the transformation
     * appear to user as if from NAD27.
     */
    public const EPSG_ST_PAUL_ISLAND = 'urn:ogc:def:datum:EPSG::6137';

    /**
     * St. Stephen (Ferro)
     * Type: Geodetic
     * Extent: Austria - Lower Austria. Czechia - Moravia and Czech Silesia.
     * Fundamental point: St. Stephen's cathedral, Vienna. Latitude: 48°12'31.54"N, longitude: 34°02'27.32"E (of
     * Ferro).
     */
    public const EPSG_ST_STEPHEN_FERRO = 'urn:ogc:def:datum:EPSG::1189';

    /**
     * St. Vincent 1945
     * Type: Geodetic
     * Extent: St Vincent and the northern Grenadine Islands - onshore.
     * Fundamental point: station V1, Fort Charlotte.
     */
    public const EPSG_ST_VINCENT_1945 = 'urn:ogc:def:datum:EPSG::6607';

    /**
     * Staatlichen Nivellementnetzes 1976
     * Type: Vertical
     * Extent: Germany - states of former East Germany - Berlin, Brandenburg; Mecklenburg-Vorpommern; Sachsen;
     * Sachsen-Anhalt; Thuringen.
     * Network adjusted in 1976. Height at reference point Hoppegarten defined as 1957 value from the UPLN adjustment.
     * Datum at Kronstadt is mean sea level of Baltic in 1833.
     * Introduced in 1979. Uses Normal heights. Replaced by DHHN92.
     */
    public const EPSG_STAATLICHEN_NIVELLEMENTNETZES_1976 = 'urn:ogc:def:datum:EPSG::5183';

    /**
     * Stewart Island 1977
     * Type: Vertical
     * Extent: New Zealand - Stewart Island.
     * MSL at 3-5 high and low tides at two different locations.
     */
    public const EPSG_STEWART_ISLAND_1977 = 'urn:ogc:def:datum:EPSG::5170';

    /**
     * Stockholm 1938
     * Type: Geodetic
     * Extent: Sweden - onshore.
     * Fundamental point: Stockholm observatory.
     * Replaced by RT90 adjustment (datum code 6124).
     */
    public const EPSG_STOCKHOLM_1938 = 'urn:ogc:def:datum:EPSG::6308';

    /**
     * Stockholm 1938 (Stockholm)
     * Type: Geodetic
     * Extent: Sweden - onshore.
     * Fundamental point: Stockholm observatory
     * Replaced by RT90 adjustment (datum code 6124).
     */
    public const EPSG_STOCKHOLM_1938_STOCKHOLM = 'urn:ogc:def:datum:EPSG::6814';

    /**
     * Stornoway
     * Type: Vertical
     * Extent: United Kingdom (UK) - Great Britain - Scotland - Outer Hebrides onshore.
     * Mean Sea Level at Stornoway 1977 correlated to pre-1900. Initially realised through levelling network
     * adjustment, from 2002 redefined to be realised through OSGM geoid model.
     * Orthometric heights.
     */
    public const EPSG_STORNOWAY = 'urn:ogc:def:datum:EPSG::5144';

    /**
     * Sule Skerry
     * Type: Vertical
     * Extent: United Kingdom (UK) - Great Britain - Scotland - Sule Skerry onshore.
     * Orthometric heights.
     */
    public const EPSG_SULE_SKERRY = 'urn:ogc:def:datum:EPSG::5142';

    /**
     * Svalbard vertical datum 2006
     * Type: Vertical
     * Extent: Arctic (Norway (Svalbard) onshore and offshore) - between 81°10'N and 76°10'N.
     * Mean Sea Level (MSL) at Ny-Ålesund. The SVD2006 surface (arcgp-2006-sk) is the Arctic Gravity Project 2006
     * (arcgp-2006) surface adjusted to two benchmarks tied to the Ny-Ålesund tide gauge. arcgp-2006-sk=arcgp-2006 -
     * 0.8986m.
     */
    public const EPSG_SVALBARD_VERTICAL_DATUM_2006 = 'urn:ogc:def:datum:EPSG::1323';

    /**
     * Swiss Terrestrial Reference System 1995
     * Type: Geodetic
     * Extent: Liechtenstein; Switzerland.
     * ETRF89 at epoch 1993.0.
     * First realized through CHTRF95 and subsequently CHTRF98, 2004, 2010 and 2016 with an aim to re-measure every 6
     * years.
     */
    public const EPSG_SWISS_TERRESTRIAL_REFERENCE_SYSTEM_1995 = 'urn:ogc:def:datum:EPSG::6151';

    /**
     * System of the Unified Trigonometrical Cadastral Network
     * Type: Geodetic
     * Extent: Czechia; Slovakia.
     * Modification of Austrian MGI datum, code 6312.
     */
    public const EPSG_SYSTEM_OF_THE_UNIFIED_TRIGONOMETRICAL_CADASTRAL_NETWORK = 'urn:ogc:def:datum:EPSG::6156';

    /**
     * System of the Unified Trigonometrical Cadastral Network (Ferro)
     * Type: Geodetic
     * Extent: Czechia; Slovakia.
     * Modification of Austrian MGI (Ferro) datum.
     */
    public const EPSG_SYSTEM_OF_THE_UNIFIED_TRIGONOMETRICAL_CADASTRAL_NETWORK_FERRO = 'urn:ogc:def:datum:EPSG::6818';

    /**
     * System of the Unified Trigonometrical Cadastral Network [JTSK03]
     * Type: Geodetic
     * Extent: Slovakia.
     */
    public const EPSG_SYSTEM_OF_THE_UNIFIED_TRIGONOMETRICAL_CADASTRAL_NETWORK_JTSK03 = 'urn:ogc:def:datum:EPSG::1201';

    /**
     * System of the Unified Trigonometrical Cadastral Network/05
     * Type: Geodetic
     * Extent: Czechia.
     * Constrained to S-JTSK but realised through readjustment in projected CRS domain. Related to ETRS89 R05
     * realisation through transformation code 5226.
     */
    public const EPSG_SYSTEM_OF_THE_UNIFIED_TRIGONOMETRICAL_CADASTRAL_NETWORK_05 = 'urn:ogc:def:datum:EPSG::1052';

    /**
     * System of the Unified Trigonometrical Cadastral Network/05 (Ferro)
     * Type: Geodetic
     * Extent: Czechia.
     * Constrained to S-JTSK but realised through readjustment in projected CRS domain.
     */
    public const EPSG_SYSTEM_OF_THE_UNIFIED_TRIGONOMETRICAL_CADASTRAL_NETWORK_05_FERRO = 'urn:ogc:def:datum:EPSG::1055';

    /**
     * TM65
     * Type: Geodetic
     * Extent: Ireland - onshore. United Kingdom (UK) - Northern Ireland (Ulster) - onshore.
     * Adjusted to best mean fit 12 stations of the OSNI 1952 primary adjustment.
     * Differences between OSNI 1952 and TM65 at these stations are RMS 0.25m east, 0.23m north, maximum vector 0.57m.
     * TM65 replaced by and not to be confused with Geodetic Datum of 1965 alias 1975 Mapping Adjustment or TM75 (datum
     * code 6300).
     */
    public const EPSG_TM65 = 'urn:ogc:def:datum:EPSG::6299';

    /**
     * TPEN11 Intermediate Reference Frame
     * Type: Geodetic
     * Extent: United Kingdom (UK) - on or related to the Trans-Pennine rail route from Liverpool via Manchester to
     * Bradford and Leeds.
     * Defined through the application of the TPEN11 NTv2 transformation (code 9365) to ETRS89 as realized through
     * OSNet v2009 CORS.
     * Created in 2020 to support intermediate CRS "TPEN11-IRF" in the emulation of the combined TPEN11 Snake and
     * TPEN11ext Snake map projections.
     */
    public const EPSG_TPEN11_INTERMEDIATE_REFERENCE_FRAME = 'urn:ogc:def:datum:EPSG::1266';

    /**
     * Tahaa 54
     * Type: Geodetic
     * Extent: French Polynesia - Society Islands - Bora Bora, Huahine, Raiatea and Tahaa.
     * Fundamental point: Tahaa East Base. Latitude: 16°33'20.97"S, longitude: 151°29'06.25"W (of Greenwich).
     * Replaced by RGPF (datum code 6687).
     */
    public const EPSG_TAHAA_54 = 'urn:ogc:def:datum:EPSG::6629';

    /**
     * Tahaa SAU 2001
     * Type: Vertical
     * Extent: French Polynesia - Society Islands - Tahaa.
     * Fundamental benchmark: RN16
     * Included as part of NGPF - see datum code 5195.
     */
    public const EPSG_TAHAA_SAU_2001 = 'urn:ogc:def:datum:EPSG::5201';

    /**
     * Tahiti 52
     * Type: Geodetic
     * Extent: French Polynesia - Society Islands - Moorea and Tahiti.
     * Fundamental point: Tahiti North Base. Latitude: 17°38'10.0"S, longitude: 149°36'57.8"W (of Greenwich).
     * Replaced by Tahiti 79 (datum code 6690) in Tahiti and Moorea 87 (code 6691) in Moorea.
     */
    public const EPSG_TAHITI_52 = 'urn:ogc:def:datum:EPSG::6628';

    /**
     * Tahiti 79
     * Type: Geodetic
     * Extent: French Polynesia - Society Islands - Tahiti.
     * Fundamental point: Tahiti North Base. Latitude: 17°38'10.0"S, longitude: 149°36'57.8"W (of Greenwich).
     * Replaces Tahiti 52 (datum code 6628) in Tahiti. Replaced by RGPF (datum code 6687).
     */
    public const EPSG_TAHITI_79 = 'urn:ogc:def:datum:EPSG::6690';

    /**
     * Taiwan Datum 1967
     * Type: Geodetic
     * Extent: Taiwan, Republic of China - onshore - Taiwan Island, Penghu (Pescadores) Islands.
     * Fundamental point: Hu Tzu Shan. Latitude: 23°58'32.34"N, longitude: 120°58'25.975"E (of Greenwich).
     * Adopted in 1980. TWD67 uses the GRS 1967 ellipsoid but with 1/f to exactly 2 decimal places.
     */
    public const EPSG_TAIWAN_DATUM_1967 = 'urn:ogc:def:datum:EPSG::1025';

    /**
     * Taiwan Datum 1997
     * Type: Geodetic
     * Extent: Taiwan, Republic of China - onshore and offshore - Taiwan Island, Penghu (Pescadores) Islands.
     * ITRF94 at epoch 1997.0
     * Adopted in 1998.
     */
    public const EPSG_TAIWAN_DATUM_1997 = 'urn:ogc:def:datum:EPSG::1026';

    /**
     * Taiwan Vertical Datum 2001
     * Type: Vertical
     * Extent: Taiwan, Republic of China - onshore - Taiwan Island.
     * Mean Sea Level at Keelung between 1957 and 1991.
     * Orthometric heights.
     */
    public const EPSG_TAIWAN_VERTICAL_DATUM_2001 = 'urn:ogc:def:datum:EPSG::1224';

    /**
     * Tananarive 1925
     * Type: Geodetic
     * Extent: Madagascar - onshore and nearshore.
     * Fundamental point: Tananarive observatory. Latitude: 18°55'02.10"S, longitude: 47°33'06.75"E (of Greenwich).
     */
    public const EPSG_TANANARIVE_1925 = 'urn:ogc:def:datum:EPSG::6297';

    /**
     * Tananarive 1925 (Paris)
     * Type: Geodetic
     * Extent: Madagascar - onshore.
     * Fundamental point: Tananarive observatory. Latitude: 21.0191667g S, longitude: 50.23849537g E (of Paris).
     */
    public const EPSG_TANANARIVE_1925_PARIS = 'urn:ogc:def:datum:EPSG::6810';

    /**
     * Tapi Aike
     * Type: Geodetic
     * Extent: Argentina - Santa Cruz province south of approximately 50°20'S.
     * Replaced by Campo Inchauspe (code 6221) for topographic mapping, use for oil exploration and production
     * continues.
     */
    public const EPSG_TAPI_AIKE = 'urn:ogc:def:datum:EPSG::1257';

    /**
     * Taranaki 1970
     * Type: Vertical
     * Extent: New Zealand - North Island - Taranaki vertical CRS area.
     * MSL at Taranaki harbour 1918-1921.
     */
    public const EPSG_TARANAKI_1970 = 'urn:ogc:def:datum:EPSG::5167';

    /**
     * Tararu 1952
     * Type: Vertical
     * Extent: New Zealand - North Island - Tararu vertical CRS area.
     * MSL at Tararu Point 1922-1923.
     */
    public const EPSG_TARARU_1952 = 'urn:ogc:def:datum:EPSG::5166';

    /**
     * Tenerife
     * Type: Vertical
     * Extent: Spain - Canary Islands - Tenerife onshore.
     * Mean Sea Level at Santa Cruz de Tenerife harbour between 1960 and 1970.
     * Orthometric heights.
     */
    public const EPSG_TENERIFE = 'urn:ogc:def:datum:EPSG::1281';

    /**
     * Tern Island 1961
     * Type: Geodetic
     * Extent: United States (USA) - Hawaii - Tern Island and Sorel Atoll.
     * Fundamental point: station FRIG on tern island, station B4 on Sorol Atoll.
     * Two independent astronomic determinations considered to be consistent through adoption of common transformation
     * to WGS 84 (see tfm code 15795).
     */
    public const EPSG_TERN_ISLAND_1961 = 'urn:ogc:def:datum:EPSG::6707';

    /**
     * Tete
     * Type: Geodetic
     * Extent: Mozambique - onshore.
     * Fundamental point: Tete.
     */
    public const EPSG_TETE = 'urn:ogc:def:datum:EPSG::6127';

    /**
     * Timbalai 1948
     * Type: Geodetic
     * Extent: Brunei - onshore and offshore; Malaysia - East Malaysia (Sabah; Sarawak) - onshore and offshore.
     * Fundamental point: Station P85 at Timbalai. Latitude: 5°17' 3.548"N, longitude: 115°10'56.409"E (of
     * Greenwich).
     * In 1968, the original adjustment was densified in Sarawak and extended to Sabah.
     */
    public const EPSG_TIMBALAI_1948 = 'urn:ogc:def:datum:EPSG::6298';

    /**
     * Tokyo
     * Type: Geodetic
     * Extent: Japan - onshore; North Korea - onshore; South Korea - onshore.
     * Fundamental point: Nikon-Keido-Genten. Latitude: 35°39'17.5148"N, longitude: 139°44'40.5020"E (of Greenwich).
     * Longitude derived in 1918.
     * In Japan, replaces Tokyo 1892 (code 1048) and replaced by Japanese Geodetic Datum 2000 (code 6611). In Korea
     * used only for geodetic applications before being replaced by Korean 1985 (code 6162).
     */
    public const EPSG_TOKYO = 'urn:ogc:def:datum:EPSG::6301';

    /**
     * Tokyo 1892
     * Type: Geodetic
     * Extent: Japan - onshore; North Korea - onshore; South Korea - onshore.
     * Fundamental point: Nikon-Keido-Genten. Latitude: 35°39'17.5148"N, longitude: 139°44'30.0970"E (of Greenwich).
     * Longitude derived in 1892.
     * Extended from Japan to Korea in 1898. In Japan replaced by Tokyo 1918 (datum code 6301). In South Korea replaced
     * by Tokyo 1918 (code 6301) only for geodetic purposes; for all other purposes replaced by Korean 1985 (code
     * 6162).
     */
    public const EPSG_TOKYO_1892 = 'urn:ogc:def:datum:EPSG::1048';

    /**
     * Tonga Geodetic Datum 2005
     * Type: Geodetic
     * Extent: Tonga - onshore and offshore.
     * Based on ITRF2000 at epoch 2005.0.
     */
    public const EPSG_TONGA_GEODETIC_DATUM_2005 = 'urn:ogc:def:datum:EPSG::1095';

    /**
     * Trieste
     * Type: Vertical
     * Extent: Bosnia and Herzegovina; Croatia - onshore; Kosovo; Montenegro - onshore; North Macedonia; Serbia;
     * Slovenia - onshore.
     * Reference point HM1(BV1)-Trieste defined relative to mean sea level at Trieste in 1875.
     * Normal-orthometric heights. In Croatia replaced by HVRS71 (datum code 5207).
     */
    public const EPSG_TRIESTE = 'urn:ogc:def:datum:EPSG::1050';

    /**
     * Trinidad 1903
     * Type: Geodetic
     * Extent: Trinidad and Tobago - Trinidad - onshore and offshore.
     * Station 00, Harbour Master's Flagstaff, Port of Spain.
     * Trinidad 1903 / Trinidad Grid coordinates (Clarke's links): 333604.30 E, 436366.91 N (Latitude: 10°38'39.01"N,
     * Longitude: 61°30'38.00"W of Greenwich).
     */
    public const EPSG_TRINIDAD_1903 = 'urn:ogc:def:datum:EPSG::6302';

    /**
     * Tristan 1968
     * Type: Geodetic
     * Extent: St Helena, Ascension and Tristan da Cunha - Tristan da Cunha island group including Tristan,
     * Inaccessible, Nightingale, Middle and Stoltenhoff Islands.
     */
    public const EPSG_TRISTAN_1968 = 'urn:ogc:def:datum:EPSG::6734';

    /**
     * Trucial Coast 1948
     * Type: Geodetic
     * Extent: United Arab Emirates (UAE) - Abu Dhabi onshore and Dubai onshore.
     * Fundamental point: TC1. Latitude: 25°23'50.190"N, longitude: 55°26'43.950"E (of Greenwich).
     */
    public const EPSG_TRUCIAL_COAST_1948 = 'urn:ogc:def:datum:EPSG::6303';

    /**
     * Turkish National Reference Frame
     * Type: Geodetic
     * Extent: Türkiye (Turkey) - onshore and offshore.
     * ITRF96 at epoch 2005.0.
     */
    public const EPSG_TURKISH_NATIONAL_REFERENCE_FRAME = 'urn:ogc:def:datum:EPSG::1057';

    /**
     * Tutuila Vertical Datum of 1962
     * Type: Vertical
     * Extent: American Samoa - Tutuila island.
     * Mean sea level at Pago Pago harbor, Tutuila, over 10 years 1949-1955 and 1957-1959. Benchmark NO 2 1948 =
     * 7.67ftUS.
     * Replaced by American Samoa Vertical Datum of 2002 (datum code 1125).
     */
    public const EPSG_TUTUILA_VERTICAL_DATUM_OF_1962 = 'urn:ogc:def:datum:EPSG::1121';

    /**
     * Ukraine 2000
     * Type: Geodetic
     * Extent: Ukraine - onshore and offshore.
     * Orientation and scale constrained to be same as ITRF2000 at epoch 2005.0. Position is minimised deviation
     * between reference ellipsoid and quasigeoid in territory of Ukraine.
     */
    public const EPSG_UKRAINE_2000 = 'urn:ogc:def:datum:EPSG::1077';

    /**
     * Vanua Levu 1915
     * Type: Geodetic
     * Extent: Fiji - Vanua Levu and Taveuni.
     * Latitude origin was obtained astronomically at station Numuiloa = 16°23'38.36"S, longitude origin was obtained
     * astronomically at station Suva = 178°25'35.835"E.
     * For topographic mapping, replaced by Fiji 1956. For other purposes, replaced by Fiji 1986.
     */
    public const EPSG_VANUA_LEVU_1915 = 'urn:ogc:def:datum:EPSG::6748';

    /**
     * Vientiane 1982
     * Type: Geodetic
     * Extent: Laos.
     * Fundamental point: Vientiane (Nongteng) Astro Pillar. Latitude: 18°01'31.6301"N, longitude: 102°30'56.6999"E
     * (of Greenwich).
     * Replaced by Lao 1993.
     */
    public const EPSG_VIENTIANE_1982 = 'urn:ogc:def:datum:EPSG::6676';

    /**
     * Vietnam 2000
     * Type: Geodetic
     * Extent: Vietnam - onshore.
     * Point N00, located in the premises of the Land Administration Research Institute, Hoang Quoc Viet Street, Hanoi.
     * Replaces Hanoi 1972.
     */
    public const EPSG_VIETNAM_2000 = 'urn:ogc:def:datum:EPSG::6756';

    /**
     * Virgin Islands Vertical Datum of 2009
     * Type: Vertical
     * Extent: US Virgin Islands - onshore - St Croix, St John, and St Thomas.
     * Mean sea level for National Tidal Datum Epoch 1983–2001 at (i) Lime Tree Bay, St. Croix (BM 9751401 M =
     * 3.111m) , (ii) Lameshur Bay, St. John (BM 9751381 TIDAL A = 1.077m) , and (iii) Charlotte Amalie, St. Thomas (BM
     * 9751639 F = 1.552m).
     * Replaces all earlier vertical datums on these islands.
     */
    public const EPSG_VIRGIN_ISLANDS_VERTICAL_DATUM_OF_2009 = 'urn:ogc:def:datum:EPSG::1124';

    /**
     * Viti Levu 1912
     * Type: Geodetic
     * Extent: Fiji - Viti Levu island.
     * Latitude origin was obtained astronomically at station Monavatu = 17°53'28.285"S, longitude origin was obtained
     * astronomically at station Suva = 178°25'35.835"E.
     * For topographic mapping, replaced by Fiji 1956. For other purposes, replaced by Fiji 1986.
     */
    public const EPSG_VITI_LEVU_1912 = 'urn:ogc:def:datum:EPSG::6752';

    /**
     * Voirol 1875
     * Type: Geodetic
     * Extent: Algeria - onshore north of 32°N.
     * Fundamental point: Voirol. Latitude: 36°45'07.927"N, longitude: 3°02'49.435"E of Greenwich. Uses RGS (and old
     * IGN) value of 2°20'13.95"for Greenwich-Paris meridian difference.
     * Replaced by Voirol 1879 (code 6671).
     */
    public const EPSG_VOIROL_1875 = 'urn:ogc:def:datum:EPSG::6304';

    /**
     * Voirol 1875 (Paris)
     * Type: Geodetic
     * Extent: Algeria - onshore north of 32°N.
     * Fundamental point: Voirol. Latitude: 40.83578 grads N, longitude: 0.78873 grads E (of Paris).
     */
    public const EPSG_VOIROL_1875_PARIS = 'urn:ogc:def:datum:EPSG::6811';

    /**
     * Voirol 1879
     * Type: Geodetic
     * Extent: Algeria - onshore north of 32°N.
     * Fundamental point: Voirol. Latitude: 36°45'08.199"N, longitude: 3°02'49.435"E (of Greenwich). Uses RGS (and
     * old IGN) value of 2°20'13.95"for Greenwich-Paris meridian difference.
     * Replaces Voirol 1875 (code 6304).
     */
    public const EPSG_VOIROL_1879 = 'urn:ogc:def:datum:EPSG::6671';

    /**
     * Voirol 1879 (Paris)
     * Type: Geodetic
     * Extent: Algeria - onshore north of 32°N.
     * Fundamental point: Voirol. Latitude: 40.835864 grads N, longitude: 0.788735 grads E (of Paris).
     * Replaces Voirol 1875 (Paris) (code 6811).
     */
    public const EPSG_VOIROL_1879_PARIS = 'urn:ogc:def:datum:EPSG::6821';

    /**
     * WGS 72 Transit Broadcast Ephemeris
     * Type: Dynamic geodetic
     * Extent: World.
     * Alleged datum for use with Transit broadcast ephemeris prior to 1989. Relationship to WGS 72 has changed over
     * time.
     */
    public const EPSG_WGS_72_TRANSIT_BROADCAST_EPHEMERIS = 'urn:ogc:def:datum:EPSG::6324';

    /**
     * Waitangi (Chatham Island) 1959
     * Type: Vertical
     * Extent: New Zealand - Chatham Island - onshore.
     * MSL at Waitangi harbour collected in 1959.
     */
    public const EPSG_WAITANGI_CHATHAM_ISLAND_1959 = 'urn:ogc:def:datum:EPSG::5169';

    /**
     * Wake Island 1952
     * Type: Geodetic
     * Extent: Wake atoll - onshore.
     */
    public const EPSG_WAKE_ISLAND_1952 = 'urn:ogc:def:datum:EPSG::6733';

    /**
     * Wellington 1953
     * Type: Vertical
     * Extent: New Zealand - North Island - Wellington vertical CRS area.
     * MSL at Wellington harbour 1909-1946.
     */
    public const EPSG_WELLINGTON_1953 = 'urn:ogc:def:datum:EPSG::5168';

    /**
     * Wiener Null
     * Type: Vertical
     * Extent: Austria - Vienna city state.
     * Historic benchmark on the Schwedenbrücke over an artificial channel of River Danube (Donaukanal) with GHA
     * height of 156.680m.
     */
    public const EPSG_WIENER_NULL = 'urn:ogc:def:datum:EPSG::1267';

    /**
     * World Geodetic System 1966
     * Type: Dynamic geodetic
     * Extent: World.
     * Developed from a worldwide distribution of terrestrial and geodetic satellite observations and defined through a
     * set of station coordinates.
     * A worldwide 5° × 5° mean free air gravity anomaly field provided the basic data for producing the WGS 66
     * gravimetric geoid. Replaced by WGS 72.
     */
    public const EPSG_WORLD_GEODETIC_SYSTEM_1966 = 'urn:ogc:def:datum:EPSG::6760';

    /**
     * World Geodetic System 1972
     * Type: Dynamic geodetic
     * Extent: World.
     * Developed from a worldwide distribution of terrestrial and geodetic satellite observations and defined through a
     * set of station coordinates.
     * Used by GPS before 1987. For Transit satellite positioning see also WGS 72BE.
     */
    public const EPSG_WORLD_GEODETIC_SYSTEM_1972 = 'urn:ogc:def:datum:EPSG::6322';

    /**
     * World Geodetic System 1984 (G1150)
     * Type: Dynamic geodetic
     * Extent: World.
     * Defined through coordinates of 17 GPS tracking stations adjusted to a subset of 49 IGS stations. Observations
     * made in February 2001. The reference epoch for ITRF2000 is 1997.0; station coordinates were transformed to
     * 2001.0 using IERS station velocities.
     * Replaces World Geodetic System 1984 (G873) from 2002-01-20. Replaced by World Geodetic System 1984 (G1674) from
     * 2012-02-08.
     */
    public const EPSG_WORLD_GEODETIC_SYSTEM_1984_G1150 = 'urn:ogc:def:datum:EPSG::1154';

    /**
     * World Geodetic System 1984 (G1674)
     * Type: Dynamic geodetic
     * Extent: World.
     * Defined through coordinates of 15 GPS tracking stations adjusted to a subset of IGS stations at epoch 2005.0.
     * The IGS station coordinates are considered to be equivalent to ITRF2008.
     * Replaces World Geodetic System 1984 (G1150) from 2012-02-08. Replaced by World Geodetic System 1984 (G1762) from
     * 2013-10-16.
     */
    public const EPSG_WORLD_GEODETIC_SYSTEM_1984_G1674 = 'urn:ogc:def:datum:EPSG::1155';

    /**
     * World Geodetic System 1984 (G1762)
     * Type: Dynamic geodetic
     * Extent: World.
     * Defined through coordinates of 19 GPS tracking stations adjusted to a subset of IGb08 stations at epoch 2005.0
     * using observations made in May 2013. The IGb08 coordinates are considered to be equivalent to ITRF2008.
     * Replaces WGS 84 (G1674) from 2013-10-16. Frame was redesignated WGS 84 (G1762') after coordinates of 7 NGA
     * tracking stations were changed following station moves and antenna updates 2014-08 to 2015-06. Replaced by WGS
     * 84 (G2139) from 2021-01-03.
     */
    public const EPSG_WORLD_GEODETIC_SYSTEM_1984_G1762 = 'urn:ogc:def:datum:EPSG::1156';

    /**
     * World Geodetic System 1984 (G2139)
     * Type: Dynamic geodetic
     * Extent: World.
     * Defined through coordinates of 19 GPS tracking stations aligned with a subset of IGb14 stations at epoch 2016.0.
     * The IGb14 station coordinates are considered to be equivalent to ITRF2014.
     * Replaces World Geodetic System 1984 (G1762) from 2021-01-03. Tracking station coordinate changes on 2021-03-28
     * when NGA implemented IGS definition of antenna phase centre offset.
     */
    public const EPSG_WORLD_GEODETIC_SYSTEM_1984_G2139 = 'urn:ogc:def:datum:EPSG::1309';

    /**
     * World Geodetic System 1984 (G730)
     * Type: Dynamic geodetic
     * Extent: World.
     * Defined through coordinates of 10 GPS tracking stations adjusted to a subset of ITRF92 stations at epoch 1994.0.
     * The reference epoch for ITRF92 is 1988.0; the ITRF92 station coordinates were transformed to 1994.0 using the
     * NNR-NUVEL1 plate motion model.
     * Replaces the original Transit-derived World Geodetic System 1984 from 1994-06-29. Replaced by World Geodetic
     * System 1984 (G873) from 1997-01-29.
     */
    public const EPSG_WORLD_GEODETIC_SYSTEM_1984_G730 = 'urn:ogc:def:datum:EPSG::1152';

    /**
     * World Geodetic System 1984 (G873)
     * Type: Dynamic geodetic
     * Extent: World.
     * Defined through coordinates of 13 GPS tracking stations adjusted to a subset of ITRF94 stations at epoch 1997.0.
     * The reference epoch for the adjustment was 1994.0 and the coordinates were propagated to 1997.0 using the
     * NNR-NUVEL-1A plate motion model.
     * Replaces World Geodetic System 1984 (G730) from 1997-01-29. Replaced by World Geodetic System 1984 (G1150) from
     * 2002-01-20.
     */
    public const EPSG_WORLD_GEODETIC_SYSTEM_1984_G873 = 'urn:ogc:def:datum:EPSG::1153';

    /**
     * World Geodetic System 1984 (Transit)
     * Type: Dynamic geodetic
     * Extent: World.
     * Defined through coordinates of 5 GPS tracking stations in the Transit doppler positioning NSWC 9Z-2 reference
     * frame transformed to be aligned to the BIH Conventional Terrestrial Reference Frame (BTS) at epoch 1984.0.
     * The NSWC 9Z-2 origin shifted by -4.5 m along the Z-axis, scale changed by -0.6 x 10E-6 and the reference
     * meridian rotated westward by 0.814" to be aligned to the BTS at epoch 1984.0. Replaced by World Geodetic System
     * 1984 (G730) from 1994-06-29.
     */
    public const EPSG_WORLD_GEODETIC_SYSTEM_1984_TRANSIT = 'urn:ogc:def:datum:EPSG::1166';

    /**
     * World Geodetic System 1984 ensemble
     * Type: Ensemble
     * Extent: World.
     * EPSG::6326 has been the then current realization. No distinction is made between the original and subsequent
     * (G730, G873, G1150, G1674, G1762 and G2139) WGS 84 frames. Since 1997, WGS 84 has been maintained within 10cm of
     * the then current ITRF.
     */
    public const EPSG_WORLD_GEODETIC_SYSTEM_1984_ENSEMBLE = 'urn:ogc:def:datum:EPSG::6326';

    /**
     * Xian 1980
     * Type: Geodetic
     * Extent: China - onshore.
     * Xian observatory.
     */
    public const EPSG_XIAN_1980 = 'urn:ogc:def:datum:EPSG::6610';

    /**
     * Yacare
     * Type: Geodetic
     * Extent: Uruguay - onshore.
     * Fundamental point: Yacare. Latitude: 30°35'53.68"S, longitude: 57°25'01.30"W (of Greenwich).
     */
    public const EPSG_YACARE = 'urn:ogc:def:datum:EPSG::6309';

    /**
     * Yellow Sea 1956
     * Type: Vertical
     * Extent: China - onshore.
     * 2 years tide readings at Qingdao.
     * Replaced by Yellow Sea 1985 datum.
     */
    public const EPSG_YELLOW_SEA_1956 = 'urn:ogc:def:datum:EPSG::5104';

    /**
     * Yellow Sea 1985
     * Type: Vertical
     * Extent: China - onshore.
     * 20 years tide readings at Qingdao.
     * Replaces Yellow Sea 1956 datum.
     */
    public const EPSG_YELLOW_SEA_1985 = 'urn:ogc:def:datum:EPSG::5137';

    /**
     * Yemen National Geodetic Network 1996
     * Type: Geodetic
     * Extent: Yemen - onshore and offshore.
     * Sana'a IGN reference marker.
     */
    public const EPSG_YEMEN_NATIONAL_GEODETIC_NETWORK_1996 = 'urn:ogc:def:datum:EPSG::6163';

    /**
     * Yoff
     * Type: Geodetic
     * Extent: Senegal - onshore and offshore.
     * Fundamental point: Yoff. Latitude: 14°44'41.62"N, longitude: 17°29'07.02"W (of Greenwich).
     */
    public const EPSG_YOFF = 'urn:ogc:def:datum:EPSG::6310';

    /**
     * Zanderij
     * Type: Geodetic
     * Extent: Suriname - onshore and offshore.
     */
    public const EPSG_ZANDERIJ = 'urn:ogc:def:datum:EPSG::6311';

    /**
     * Fk89
     * Type: Geodetic
     * Extent: Faroe Islands - onshore.
     * Replaces FD54 for cadastre.
     */
    public const EPSG_FK89 = 'urn:ogc:def:datum:EPSG::6753';

    /**
     * @deprecated use EPSG_LUXEMBOURG_REFERENCE_FRAME instead
     */
    public const EPSG_LUXEMBOURG_1930 = 'urn:ogc:def:datum:EPSG::6181';

    /**
     * @deprecated use EPSG_NIVELLEMENT_GENERAL_DU_LUXEMBOURG_1995 instead
     */
    public const EPSG_NIVELLEMENT_GENERAL_DU_LUXEMBOURG = 'urn:ogc:def:datum:EPSG::5172';

    /**
     * @deprecated use EPSG_CANADIAN_GEODETIC_VERTICAL_DATUM_OF_2013_CGG2013A_EPOCH_2010 instead
     */
    public const EPSG_CANADIAN_GEODETIC_VERTICAL_DATUM_OF_2013_CGG2013A = 'urn:ogc:def:datum:EPSG::1256';

    /**
     * @deprecated use EPSG_INDONESIAN_GEOID_2020_VERSION_1 instead
     */
    public const EPSG_INDONESIAN_GEOID_2020 = 'urn:ogc:def:datum:EPSG::1294';

    protected static array $sridData = [
        'urn:ogc:def:datum:EPSG::1024' => [
            'name' => 'Hungarian Datum 1909',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7004',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1025' => [
            'name' => 'Taiwan Datum 1967',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7050',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1026' => [
            'name' => 'Taiwan Datum 1997',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1027' => [
            'name' => 'EGM2008 geoid',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1028' => [
            'name' => 'Fao 1979',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1029' => [
            'name' => 'Iraqi Geospatial Reference System',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1030' => [
            'name' => 'N2000',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1031' => [
            'name' => 'MGI 1901',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7004',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1032' => [
            'name' => 'MOLDREF99',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1033' => [
            'name' => 'Reseau Geodesique de la RDC 2005',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1034' => [
            'name' => 'Serbian Reference Network 1998',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1035' => [
            'name' => 'Red Geodesica de Canarias 1995',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1036' => [
            'name' => 'Reseau Geodesique de Mayotte 2004',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1037' => [
            'name' => 'Cadastre 1997',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7022',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1038' => [
            'name' => 'Reseau Geodesique de Saint Pierre et Miquelon 2006',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1039' => [
            'name' => 'New Zealand Vertical Datum 2009',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1040' => [
            'name' => 'Dunedin-Bluff 1960',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1041' => [
            'name' => 'Autonomous Regions of Portugal 2008',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1042' => [
            'name' => 'Mexico ITRF92',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1043' => [
            'name' => 'China 2000',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::1024',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1044' => [
            'name' => 'Sao Tome',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7022',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1045' => [
            'name' => 'New Beijing',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7024',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1046' => [
            'name' => 'Principe',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7022',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1047' => [
            'name' => 'Reseau de Reference des Antilles Francaises 1991',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1048' => [
            'name' => 'Tokyo 1892',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7004',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1049' => [
            'name' => 'Incheon',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1050' => [
            'name' => 'Trieste',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1051' => [
            'name' => 'Genoa 1942',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1052' => [
            'name' => 'System of the Unified Trigonometrical Cadastral Network/05',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7004',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1053' => [
            'name' => 'Sri Lanka Datum 1999',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7015',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1054' => [
            'name' => 'Sri Lanka Vertical Datum',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1055' => [
            'name' => 'System of the Unified Trigonometrical Cadastral Network/05 (Ferro)',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7004',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8909',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1056' => [
            'name' => 'Geocentric Datum Brunei Darussalam 2009',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1057' => [
            'name' => 'Turkish National Reference Frame',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1058' => [
            'name' => 'Bhutan National Geodetic Datum',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1059' => [
            'name' => 'Faroe Islands Vertical Reference 2009',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1060' => [
            'name' => 'Islands Net 2004',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1061' => [
            'name' => 'International Terrestrial Reference Frame 2008',
            'type' => 'dynamic geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => 2005.0,
        ],
        'urn:ogc:def:datum:EPSG::1062' => [
            'name' => 'Posiciones Geodesicas Argentinas 2007',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7030',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1063' => [
            'name' => 'Marco Geodesico Nacional de Bolivia',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1064' => [
            'name' => 'SIRGAS-Chile realization 1 epoch 2002',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1065' => [
            'name' => 'Costa Rica 2005',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7030',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1066' => [
            'name' => 'Sistema Geodesico Nacional de Panama MACARIO SOLIS',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1067' => [
            'name' => 'Peru96',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1068' => [
            'name' => 'SIRGAS-ROU98',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7030',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1069' => [
            'name' => 'SIRGAS_ES2007.8',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1070' => [
            'name' => 'Ocotepeque 1935',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7008',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1071' => [
            'name' => 'Sibun Gorge 1922',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7007',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1072' => [
            'name' => 'Panama-Colon 1911',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7008',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1073' => [
            'name' => 'Reseau Geodesique des Antilles Francaises 2009',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1074' => [
            'name' => 'Corrego Alegre 1961',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7022',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1075' => [
            'name' => 'South American Datum 1969(96)',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7050',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1076' => [
            'name' => 'Papua New Guinea Geodetic Datum 1994',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1077' => [
            'name' => 'Ukraine 2000',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7024',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1078' => [
            'name' => 'Fehmarnbelt Datum 2010',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1079' => [
            'name' => 'Fehmarnbelt Vertical Reference 2010',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1080' => [
            'name' => 'Lowest Astronomical Tide',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1081' => [
            'name' => 'Deutsche Bahn Reference System',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7004',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1082' => [
            'name' => 'Highest Astronomical Tide',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1083' => [
            'name' => 'Lower Low Water Large Tide',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1084' => [
            'name' => 'Higher High Water Large Tide',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1085' => [
            'name' => 'Indian Spring Low Water',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1086' => [
            'name' => 'Mean Lower Low Water Spring Tides',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1087' => [
            'name' => 'Mean Low Water Spring Tides',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1088' => [
            'name' => 'Mean High Water Spring Tides',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1089' => [
            'name' => 'Mean Lower Low Water',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1090' => [
            'name' => 'Mean Higher High Water',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1091' => [
            'name' => 'Mean Low Water',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1092' => [
            'name' => 'Mean High Water',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1093' => [
            'name' => 'Low Water',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1094' => [
            'name' => 'High Water',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1095' => [
            'name' => 'Tonga Geodetic Datum 2005',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1096' => [
            'name' => 'Norway Normal Null 2000',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => 2000.0,
        ],
        'urn:ogc:def:datum:EPSG::1097' => [
            'name' => 'Grand Cayman Vertical Datum 1954',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1098' => [
            'name' => 'Little Cayman Vertical Datum 1961',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1099' => [
            'name' => 'Cayman Brac Vertical Datum 1961',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1100' => [
            'name' => 'Cayman Islands Geodetic Datum 2011',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1101' => [
            'name' => 'Cais da Pontinha - Funchal',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1102' => [
            'name' => 'Cais da Vila - Porto Santo',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1103' => [
            'name' => 'Cais das Velas',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1104' => [
            'name' => 'Horta',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1105' => [
            'name' => 'Cais da Madalena',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1106' => [
            'name' => 'Santa Cruz da Graciosa',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1107' => [
            'name' => 'Cais da Figueirinha - Angra do Heroismo',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1108' => [
            'name' => 'Santa Cruz das Flores',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1109' => [
            'name' => 'Cais da Vila do Porto',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1110' => [
            'name' => 'Ponta Delgada',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1111' => [
            'name' => 'Nepal 1981',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7015',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1112' => [
            'name' => 'Cyprus Geodetic Reference System 1993',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7030',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1113' => [
            'name' => 'Reseau Geodesique des Terres Australes et Antarctiques Francaises 2007',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1114' => [
            'name' => 'Israeli Geodetic Datum 2005',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7030',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1115' => [
            'name' => 'Israeli Geodetic Datum 2005(2012)',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7030',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1116' => [
            'name' => 'NAD83 (National Spatial Reference System 2011)',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1117' => [
            'name' => 'NAD83 (National Spatial Reference System PA11)',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1118' => [
            'name' => 'NAD83 (National Spatial Reference System MA11)',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1119' => [
            'name' => 'Northern Marianas Vertical Datum of 2003',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1120' => [
            'name' => 'Mexico ITRF2008',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1121' => [
            'name' => 'Tutuila Vertical Datum of 1962',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1122' => [
            'name' => 'Guam Vertical Datum of 1963',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1123' => [
            'name' => 'Puerto Rico Vertical Datum of 2002',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1124' => [
            'name' => 'Virgin Islands Vertical Datum of 2009',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1125' => [
            'name' => 'American Samoa Vertical Datum of 2002',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1126' => [
            'name' => 'Guam Vertical Datum of 2004',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1127' => [
            'name' => 'Canadian Geodetic Vertical Datum of 2013 (CGG2013)',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1128' => [
            'name' => 'Japanese Geodetic Datum 2011',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1129' => [
            'name' => 'Japanese Standard Levelling Datum 1972',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1130' => [
            'name' => 'Japanese Geodetic Datum 2000 (vertical)',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1131' => [
            'name' => 'Japanese Geodetic Datum 2011 (vertical)',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1132' => [
            'name' => 'Rete Dinamica Nazionale 2008',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1133' => [
            'name' => 'NAD83 (Continuously Operating Reference Station 1996)',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1135' => [
            'name' => 'Aden 1925',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7012',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1136' => [
            'name' => 'Bioko',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7022',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1137' => [
            'name' => 'Bekaa Valley 1920',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7012',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1138' => [
            'name' => 'South East Island 1943',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7012',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1139' => [
            'name' => 'Gambia',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7012',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1140' => [
            'name' => 'Singapore Height Datum',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1141' => [
            'name' => 'IGS08',
            'type' => 'dynamic geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => 2005.0,
        ],
        'urn:ogc:def:datum:EPSG::1142' => [
            'name' => 'IG05 Intermediate Datum',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1144' => [
            'name' => 'IG05/12 Intermediate Datum',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1146' => [
            'name' => 'Ras Ghumays',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1147' => [
            'name' => 'Oman National Geodetic Datum 2014',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1148' => [
            'name' => 'Famagusta 1960',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1149' => [
            'name' => 'PNG08',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1150' => [
            'name' => 'Kumul 34',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1151' => [
            'name' => 'Kiunga',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1152' => [
            'name' => 'World Geodetic System 1984 (G730)',
            'type' => 'dynamic geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7030',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => 1024,
            'frame_reference_epoch' => 1994.0,
        ],
        'urn:ogc:def:datum:EPSG::1153' => [
            'name' => 'World Geodetic System 1984 (G873)',
            'type' => 'dynamic geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7030',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => 1024,
            'frame_reference_epoch' => 1997.0,
        ],
        'urn:ogc:def:datum:EPSG::1154' => [
            'name' => 'World Geodetic System 1984 (G1150)',
            'type' => 'dynamic geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7030',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => 1024,
            'frame_reference_epoch' => 2001.0,
        ],
        'urn:ogc:def:datum:EPSG::1155' => [
            'name' => 'World Geodetic System 1984 (G1674)',
            'type' => 'dynamic geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7030',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => 1024,
            'frame_reference_epoch' => 2005.0,
        ],
        'urn:ogc:def:datum:EPSG::1156' => [
            'name' => 'World Geodetic System 1984 (G1762)',
            'type' => 'dynamic geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7030',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => 1024,
            'frame_reference_epoch' => 2005.0,
        ],
        'urn:ogc:def:datum:EPSG::1157' => [
            'name' => 'Parametry Zemli 1990.02',
            'type' => 'dynamic geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7054',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => 2002.0,
        ],
        'urn:ogc:def:datum:EPSG::1158' => [
            'name' => 'Parametry Zemli 1990.11',
            'type' => 'dynamic geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7054',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => 2010.0,
        ],
        'urn:ogc:def:datum:EPSG::1159' => [
            'name' => 'Geodezicheskaya Sistema Koordinat 2011',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::1025',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1160' => [
            'name' => 'Kyrgyzstan Geodetic Datum 2006',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1161' => [
            'name' => 'Deutsches Haupthoehennetz 1912',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1162' => [
            'name' => 'Latvian Height System 2000',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1164' => [
            'name' => 'Ordnance Datum Newlyn (Offshore)',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => 1026,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1165' => [
            'name' => 'International Terrestrial Reference Frame 2014',
            'type' => 'dynamic geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => 2010.0,
        ],
        'urn:ogc:def:datum:EPSG::1166' => [
            'name' => 'World Geodetic System 1984 (Transit)',
            'type' => 'dynamic geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7030',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => 1024,
            'frame_reference_epoch' => 1984.0,
        ],
        'urn:ogc:def:datum:EPSG::1167' => [
            'name' => 'Bulgaria Geodetic System 2005',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1168' => [
            'name' => 'Geocentric Datum of Australia 2020',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1169' => [
            'name' => 'New Zealand Vertical Datum 2016',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1170' => [
            'name' => 'Deutsches Haupthoehennetz 2016',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1171' => [
            'name' => 'Port Moresby 1996',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1172' => [
            'name' => 'Port Moresby 2008',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1173' => [
            'name' => 'St. Helena Tritan',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7030',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1174' => [
            'name' => 'St. Helena Geodetic Datum 2015',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1175' => [
            'name' => 'Jamestown 1971',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1176' => [
            'name' => 'St. Helena Tritan Vertical Datum 2011',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1177' => [
            'name' => 'St. Helena Vertical Datum 2015',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1178' => [
            'name' => 'European Terrestrial Reference Frame 1989',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => 1025,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1179' => [
            'name' => 'European Terrestrial Reference Frame 1990',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => 1025,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1180' => [
            'name' => 'European Terrestrial Reference Frame 1991',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => 1025,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1181' => [
            'name' => 'European Terrestrial Reference Frame 1992',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => 1025,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1182' => [
            'name' => 'European Terrestrial Reference Frame 1993',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => 1025,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1183' => [
            'name' => 'European Terrestrial Reference Frame 1994',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => 1025,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1184' => [
            'name' => 'European Terrestrial Reference Frame 1996',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => 1025,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1185' => [
            'name' => 'European Terrestrial Reference Frame 1997',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => 1025,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1186' => [
            'name' => 'European Terrestrial Reference Frame 2000',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => 1025,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1187' => [
            'name' => 'Islands Net 2016',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1188' => [
            'name' => 'Gusterberg (Ferro)',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::1026',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8909',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1189' => [
            'name' => 'St. Stephen (Ferro)',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::1026',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8909',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1190' => [
            'name' => 'Landshaedarkerfi Islands 2004',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1191' => [
            'name' => 'IGS14',
            'type' => 'dynamic geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => 2010.0,
        ],
        'urn:ogc:def:datum:EPSG::1192' => [
            'name' => 'North American Datum of 1983 (CSRS96)',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1193' => [
            'name' => 'North American Datum of 1983 (CSRS) version 2',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1194' => [
            'name' => 'North American Datum of 1983 (CSRS) version 3',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1195' => [
            'name' => 'North American Datum of 1983 (CSRS) version 4',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1196' => [
            'name' => 'North American Datum of 1983 (CSRS) version 5',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1197' => [
            'name' => 'North American Datum of 1983 (CSRS) version 6',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1198' => [
            'name' => 'North American Datum of 1983 (CSRS) version 7',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1199' => [
            'name' => 'Greenland Vertical Reference 2000',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1200' => [
            'name' => 'Greenland Vertical Reference 2016',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1201' => [
            'name' => 'System of the Unified Trigonometrical Cadastral Network [JTSK03]',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7004',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1202' => [
            'name' => 'Baltic 1957',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1204' => [
            'name' => 'European Terrestrial Reference Frame 2005',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => 1025,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1206' => [
            'name' => 'European Terrestrial Reference Frame 2014',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => 1025,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1207' => [
            'name' => 'Macao 1920',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7022',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1208' => [
            'name' => 'Macao Geodetic Datum 2008',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1209' => [
            'name' => 'Hong Kong Geodetic',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1210' => [
            'name' => 'Macao Height Datum',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1211' => [
            'name' => 'NAD83 (Federal Base Network)',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1212' => [
            'name' => 'NAD83 (High Accuracy Reference Network - Corrected)',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1213' => [
            'name' => 'Helsinki 1943',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1214' => [
            'name' => 'Serbian Spatial Reference System 2000',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1215' => [
            'name' => 'Slovenian Vertical System 2010',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1216' => [
            'name' => 'Serbian Vertical Reference System 2012',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1217' => [
            'name' => 'Camacupa 2015',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7012',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1218' => [
            'name' => 'MOMRA Terrestrial Reference Frame 2000',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1219' => [
            'name' => 'MOMRA Vertical Geodetic Control',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1220' => [
            'name' => 'Reference System de Angola 2013',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1221' => [
            'name' => 'North American Datum of 1983 (MARP00)',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1223' => [
            'name' => 'Reseau Geodesique de Wallis et Futuna 1996',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1224' => [
            'name' => 'Taiwan Vertical Datum 2001',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1225' => [
            'name' => 'CR-SIRGAS',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1226' => [
            'name' => 'Datum Altimetrico de Costa Rica 1952',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1227' => [
            'name' => 'SIRGAS Continuously Operating Network DGF00P01',
            'type' => 'dynamic geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => 2000.4,
        ],
        'urn:ogc:def:datum:EPSG::1228' => [
            'name' => 'SIRGAS Continuously Operating Network DGF01P01',
            'type' => 'dynamic geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => 2000.0,
        ],
        'urn:ogc:def:datum:EPSG::1229' => [
            'name' => 'SIRGAS Continuously Operating Network DGF01P02',
            'type' => 'dynamic geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => 1998.4,
        ],
        'urn:ogc:def:datum:EPSG::1230' => [
            'name' => 'SIRGAS Continuously Operating Network DGF02P01',
            'type' => 'dynamic geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => 2000.0,
        ],
        'urn:ogc:def:datum:EPSG::1231' => [
            'name' => 'SIRGAS Continuously Operating Network DGF04P01',
            'type' => 'dynamic geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => 2003.0,
        ],
        'urn:ogc:def:datum:EPSG::1232' => [
            'name' => 'SIRGAS Continuously Operating Network DGF05P01',
            'type' => 'dynamic geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => 2004.0,
        ],
        'urn:ogc:def:datum:EPSG::1233' => [
            'name' => 'SIRGAS Continuously Operating Network DGF06P01',
            'type' => 'dynamic geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => 2004.0,
        ],
        'urn:ogc:def:datum:EPSG::1234' => [
            'name' => 'SIRGAS Continuously Operating Network DGF07P01',
            'type' => 'dynamic geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => 2004.5,
        ],
        'urn:ogc:def:datum:EPSG::1235' => [
            'name' => 'SIRGAS Continuously Operating Network DGF08P01',
            'type' => 'dynamic geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => 2004.5,
        ],
        'urn:ogc:def:datum:EPSG::1236' => [
            'name' => 'SIRGAS Continuously Operating Network SIR09P01',
            'type' => 'dynamic geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => 2005.0,
        ],
        'urn:ogc:def:datum:EPSG::1237' => [
            'name' => 'SIRGAS Continuously Operating Network SIR10P01',
            'type' => 'dynamic geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => 2005.0,
        ],
        'urn:ogc:def:datum:EPSG::1238' => [
            'name' => 'SIRGAS Continuously Operating Network SIR11P01',
            'type' => 'dynamic geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => 2005.0,
        ],
        'urn:ogc:def:datum:EPSG::1239' => [
            'name' => 'SIRGAS Continuously Operating Network SIR13P01',
            'type' => 'dynamic geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => 2012.0,
        ],
        'urn:ogc:def:datum:EPSG::1240' => [
            'name' => 'SIRGAS Continuously Operating Network SIR14P01',
            'type' => 'dynamic geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => 2013.0,
        ],
        'urn:ogc:def:datum:EPSG::1241' => [
            'name' => 'SIRGAS Continuously Operating Network SIR15P01',
            'type' => 'dynamic geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => 2013.0,
        ],
        'urn:ogc:def:datum:EPSG::1242' => [
            'name' => 'SIRGAS Continuously Operating Network SIR17P01',
            'type' => 'dynamic geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => 2015.0,
        ],
        'urn:ogc:def:datum:EPSG::1243' => [
            'name' => 'SIRGAS-Chile realization 2 epoch 2010',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1244' => [
            'name' => 'IGS97',
            'type' => 'dynamic geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => 1997.0,
        ],
        'urn:ogc:def:datum:EPSG::1245' => [
            'name' => 'IGS00',
            'type' => 'dynamic geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => 1998.0,
        ],
        'urn:ogc:def:datum:EPSG::1246' => [
            'name' => 'IGb00',
            'type' => 'dynamic geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => 1998.0,
        ],
        'urn:ogc:def:datum:EPSG::1247' => [
            'name' => 'IGS05',
            'type' => 'dynamic geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => 2000.0,
        ],
        'urn:ogc:def:datum:EPSG::1248' => [
            'name' => 'IGb08',
            'type' => 'dynamic geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => 2005.0,
        ],
        'urn:ogc:def:datum:EPSG::1249' => [
            'name' => 'North American Datum of 1983 (PACP00)',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1250' => [
            'name' => 'IGN 2008 LD',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1251' => [
            'name' => 'Kosovo Reference System 2001',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1252' => [
            'name' => 'SIRGAS-Chile realization 3 epoch 2013',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1253' => [
            'name' => 'SIRGAS-Chile realization 4 epoch 2016',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1255' => [
            'name' => 'Nivellement General de Nouvelle Caledonie 2008',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1256' => [
            'name' => 'Canadian Geodetic Vertical Datum of 2013 (CGG2013a) epoch 2010',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1257' => [
            'name' => 'Tapi Aike',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7022',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1258' => [
            'name' => 'Ministerio de Marina Norte',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7022',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1259' => [
            'name' => 'Ministerio de Marina Sur',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7022',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1260' => [
            'name' => 'Sistema de Referencia Vertical Nacional 2016',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1261' => [
            'name' => 'European Vertical Reference Frame 2000 Austria',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1262' => [
            'name' => 'South Africa Land Levelling Datum',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1263' => [
            'name' => 'Oman National Geodetic Datum 2017',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1264' => [
            'name' => 'HS2 Intermediate Reference Frame',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1265' => [
            'name' => 'HS2 Vertical Reference Frame',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1266' => [
            'name' => 'TPEN11 Intermediate Reference Frame',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1267' => [
            'name' => 'Wiener Null',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1268' => [
            'name' => 'Kingdom of Saudi Arabia Geodetic Reference Frame 2017',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1269' => [
            'name' => 'Kingdom of Saudi Arabia Vertical Reference Frame Jeddah 2014',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1270' => [
            'name' => 'Mean Sea Level Netherlands',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1271' => [
            'name' => 'MML07 Intermediate Reference Frame',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1272' => [
            'name' => 'IGb14',
            'type' => 'dynamic geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => 2010.0,
        ],
        'urn:ogc:def:datum:EPSG::1273' => [
            'name' => 'AbInvA96_2020 Intermediate Reference Frame',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1274' => [
            'name' => 'European Vertical Reference Frame 2019',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1275' => [
            'name' => 'Mallorca',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1276' => [
            'name' => 'Menorca',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1277' => [
            'name' => 'Ibiza',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1278' => [
            'name' => 'Lanzarote',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1279' => [
            'name' => 'Fuerteventura',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1280' => [
            'name' => 'Gran Canaria',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1281' => [
            'name' => 'Tenerife',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1282' => [
            'name' => 'La Gomera',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1283' => [
            'name' => 'La Palma',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1284' => [
            'name' => 'El Hierro',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1285' => [
            'name' => 'Ceuta 2',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1286' => [
            'name' => 'Pico de las Nieves 1968',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7022',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1287' => [
            'name' => 'European Vertical Reference Frame 2019 mean tide',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1288' => [
            'name' => 'British Isles height ensemble',
            'type' => 'ensemble',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
            'ensemble' => [
                'urn:ogc:def:datum:EPSG::5130',
                'urn:ogc:def:datum:EPSG::5131',
                'urn:ogc:def:datum:EPSG::5101',
                'urn:ogc:def:datum:EPSG::1164',
                'urn:ogc:def:datum:EPSG::5138',
                'urn:ogc:def:datum:EPSG::5140',
                'urn:ogc:def:datum:EPSG::5144',
                'urn:ogc:def:datum:EPSG::5148',
                'urn:ogc:def:datum:EPSG::5147',
            ],
        ],
        'urn:ogc:def:datum:EPSG::1289' => [
            'name' => 'GBK19 Intermediate Reference Frame',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1290' => [
            'name' => 'Lowest Astronomical Tide Netherlands',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1291' => [
            'name' => 'Australian Terrestrial Reference Frame 2014',
            'type' => 'dynamic geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => 2020.0,
        ],
        'urn:ogc:def:datum:EPSG::1292' => [
            'name' => 'Australian Vertical Working Surface',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1293' => [
            'name' => 'Sistem Referensi Geospasial Indonesia 2013',
            'type' => 'dynamic geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7030',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => 2012.0,
        ],
        'urn:ogc:def:datum:EPSG::1294' => [
            'name' => 'Indonesian Geoid 2020 version 1',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1295' => [
            'name' => 'Lyon Turin Ferroviaire 2004',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1296' => [
            'name' => 'Baltic 1986',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1297' => [
            'name' => 'European Vertical Reference Frame 2007 Poland',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1298' => [
            'name' => 'Estonian Height System 2000',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1299' => [
            'name' => 'Lithuanian Height System 2007',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1300' => [
            'name' => 'Bulgarian Height System 2005',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1301' => [
            'name' => 'Norwegian Chart Datum',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1302' => [
            'name' => 'Local Tidal Datum at Pago Pago 2020',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1303' => [
            'name' => 'National Vertical Datum 1992',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1304' => [
            'name' => 'Red Geodesica Para Mineria en Chile',
            'type' => 'dynamic geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => 2019.0,
        ],
        'urn:ogc:def:datum:EPSG::1305' => [
            'name' => 'ETRF2000 Poland',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1306' => [
            'name' => 'Catania 1965',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1307' => [
            'name' => 'Cagliari 1956',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1308' => [
            'name' => 'EOS21 Intermediate Reference Frame',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1309' => [
            'name' => 'World Geodetic System 1984 (G2139)',
            'type' => 'dynamic geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7030',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => 1024,
            'frame_reference_epoch' => 2016.0,
        ],
        'urn:ogc:def:datum:EPSG::1310' => [
            'name' => 'ECML14_NB Intermediate Reference Frame',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1311' => [
            'name' => 'EWR2 Intermediate Reference Frame',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1312' => [
            'name' => 'Reseau Geodesique Francais 1993 v2',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1313' => [
            'name' => 'Reseau Geodesique Francais 1993 v2b',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1314' => [
            'name' => 'MRH21 Intermediate Reference Frame',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1315' => [
            'name' => 'MOLDOR11 Intermediate Reference Frame',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1316' => [
            'name' => 'GNTRANS',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1317' => [
            'name' => 'HULLEE13 Intermediate Reference Frame',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1318' => [
            'name' => 'GNTRANS2016',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1319' => [
            'name' => 'EBBWV14 Intermediate Reference Frame',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1320' => [
            'name' => 'SCM22 Intermediate Reference Frame',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1321' => [
            'name' => 'FNL22 Intermediate Reference Frame',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1322' => [
            'name' => 'International Terrestrial Reference Frame 2020',
            'type' => 'dynamic geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => 2015.0,
        ],
        'urn:ogc:def:datum:EPSG::1323' => [
            'name' => 'Svalbard vertical datum 2006',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1324' => [
            'name' => 'MWC18 Intermediate Reference Frame',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1325' => [
            'name' => 'Canadian Geodetic Vertical Datum of 2013 (CGG2013a) epoch 2002',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1326' => [
            'name' => 'Canadian Geodetic Vertical Datum of 2013 (CGG2013a) epoch 1997',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1327' => [
            'name' => 'SIRGAS-Chile realization 5 epoch 2021',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::1328' => [
            'name' => 'Indonesian Geoid 2020 version 2',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::5100' => [
            'name' => 'Mean Sea Level',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::5101' => [
            'name' => 'Ordnance Datum Newlyn',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => 1026,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::5102' => [
            'name' => 'National Geodetic Vertical Datum 1929',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::5103' => [
            'name' => 'North American Vertical Datum 1988',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::5104' => [
            'name' => 'Yellow Sea 1956',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::5105' => [
            'name' => 'Baltic 1977',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::5106' => [
            'name' => 'Caspian Sea',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::5109' => [
            'name' => 'Normaal Amsterdams Peil',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::5110' => [
            'name' => 'Ostend',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::5111' => [
            'name' => 'Australian Height Datum',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::5112' => [
            'name' => 'Australian Height Datum (Tasmania)',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::5113' => [
            'name' => 'Instantaneous Water Level',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::5114' => [
            'name' => 'Canadian Geodetic Vertical Datum of 1928',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::5115' => [
            'name' => 'Piraeus Harbour 1986',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::5116' => [
            'name' => 'Helsinki 1960',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::5117' => [
            'name' => 'Rikets hojdsystem 1970',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::5118' => [
            'name' => 'Nivellement General de la France - Lallemand',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::5119' => [
            'name' => 'Nivellement General de la France - IGN69',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::5120' => [
            'name' => 'Nivellement General de la France - IGN78',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::5121' => [
            'name' => 'Maputo',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::5122' => [
            'name' => 'Japanese Standard Levelling Datum 1969',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::5123' => [
            'name' => 'PDO Height Datum 1993',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::5124' => [
            'name' => 'Fahud Height Datum',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::5125' => [
            'name' => 'Ha Tien 1960',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::5126' => [
            'name' => 'Hon Dau 1992',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::5127' => [
            'name' => 'Landesnivellement 1902',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::5128' => [
            'name' => 'Landeshohennetz 1995',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::5129' => [
            'name' => 'European Vertical Reference Frame 2000',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::5130' => [
            'name' => 'Malin Head',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => 1026,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::5131' => [
            'name' => 'Belfast Lough',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => 1026,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::5132' => [
            'name' => 'Dansk Normal Nul',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::5133' => [
            'name' => 'AIOC 1995',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::5134' => [
            'name' => 'Black Sea',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::5135' => [
            'name' => 'Hong Kong Principal Datum',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::5136' => [
            'name' => 'Hong Kong Chart Datum',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::5137' => [
            'name' => 'Yellow Sea 1985',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::5138' => [
            'name' => 'Ordnance Datum Newlyn (Orkney Isles)',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => 1026,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::5139' => [
            'name' => 'Fair Isle',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::5140' => [
            'name' => 'Lerwick',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => 1026,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::5141' => [
            'name' => 'Foula',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::5142' => [
            'name' => 'Sule Skerry',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::5143' => [
            'name' => 'North Rona',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::5144' => [
            'name' => 'Stornoway',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => 1026,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::5145' => [
            'name' => 'St. Kilda',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::5146' => [
            'name' => 'Flannan Isles',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::5147' => [
            'name' => 'St. Marys',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => 1026,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::5148' => [
            'name' => 'Douglas',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => 1026,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::5149' => [
            'name' => 'Fao',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::5150' => [
            'name' => 'Bandar Abbas',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::5151' => [
            'name' => 'Nivellement General de Nouvelle Caledonie',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::5152' => [
            'name' => 'Poolbeg',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::5153' => [
            'name' => 'Nivellement General Guyanais 1977',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::5154' => [
            'name' => 'Martinique 1987',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::5155' => [
            'name' => 'Guadeloupe 1988',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::5156' => [
            'name' => 'Reunion 1989',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::5157' => [
            'name' => 'Auckland 1946',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::5158' => [
            'name' => 'Bluff 1955',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::5159' => [
            'name' => 'Dunedin 1958',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::5160' => [
            'name' => 'Gisborne 1926',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::5161' => [
            'name' => 'Lyttelton 1937',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::5162' => [
            'name' => 'Moturiki 1953',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::5163' => [
            'name' => 'Napier 1962',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::5164' => [
            'name' => 'Nelson 1955',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::5165' => [
            'name' => 'One Tree Point 1964',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::5166' => [
            'name' => 'Tararu 1952',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::5167' => [
            'name' => 'Taranaki 1970',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::5168' => [
            'name' => 'Wellington 1953',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::5169' => [
            'name' => 'Waitangi (Chatham Island) 1959',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::5170' => [
            'name' => 'Stewart Island 1977',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::5171' => [
            'name' => 'EGM96 geoid',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::5172' => [
            'name' => 'Nivellement General du Luxembourg 1995',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::5173' => [
            'name' => 'Antalya',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::5174' => [
            'name' => 'Norway Normal Null 1954',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::5175' => [
            'name' => 'Durres',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::5176' => [
            'name' => 'Gebrauchshohen ADRIA',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::5177' => [
            'name' => 'Slovenian Vertical System 2000',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::5178' => [
            'name' => 'Cascais',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::5179' => [
            'name' => 'Constanta',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::5180' => [
            'name' => 'Alicante',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::5181' => [
            'name' => 'Deutsches Haupthoehennetz 1992',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::5182' => [
            'name' => 'Deutsches Haupthoehennetz 1985',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::5183' => [
            'name' => 'Staatlichen Nivellementnetzes 1976',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::5184' => [
            'name' => 'Baltic 1982',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::5185' => [
            'name' => 'Baltic 1980',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::5186' => [
            'name' => 'Kuwait PWD',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::5187' => [
            'name' => 'KOC Well Datum',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::5188' => [
            'name' => 'KOC Construction Datum',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::5189' => [
            'name' => 'Nivellement General de la Corse 1948',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::5190' => [
            'name' => 'Danger 1950',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::5191' => [
            'name' => 'Mayotte 1950',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::5192' => [
            'name' => 'Martinique 1955',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::5193' => [
            'name' => 'Guadeloupe 1951',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::5194' => [
            'name' => 'Lagos 1955',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::5195' => [
            'name' => 'Nivellement General de Polynesie Francaise',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::5196' => [
            'name' => 'IGN 1966',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::5197' => [
            'name' => 'Moorea SAU 1981',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::5198' => [
            'name' => 'Raiatea SAU 2001',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::5199' => [
            'name' => 'Maupiti SAU 2001',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::5200' => [
            'name' => 'Huahine SAU 2001',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::5201' => [
            'name' => 'Tahaa SAU 2001',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::5202' => [
            'name' => 'Bora Bora SAU 2001',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::5203' => [
            'name' => 'EGM84 geoid',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::5204' => [
            'name' => 'International Great Lakes Datum 1955',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::5205' => [
            'name' => 'International Great Lakes Datum 1985',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::5206' => [
            'name' => 'Dansk Vertikal Reference 1990',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::5207' => [
            'name' => 'Croatian Vertical Reference Datum 1971',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::5208' => [
            'name' => 'Rikets hojdsystem 2000',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => 2000.0,
        ],
        'urn:ogc:def:datum:EPSG::5209' => [
            'name' => 'Rikets hojdsystem 1900',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::5210' => [
            'name' => 'IGN 1988 LS',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::5211' => [
            'name' => 'IGN 1988 MG',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::5212' => [
            'name' => 'IGN 1992 LD',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::5213' => [
            'name' => 'IGN 1988 SB',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::5214' => [
            'name' => 'IGN 1988 SM',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::5215' => [
            'name' => 'European Vertical Reference Frame 2007',
            'type' => 'vertical',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6001' => [
            'name' => 'Not specified (based on Airy 1830 ellipsoid)',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7001',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6002' => [
            'name' => 'Not specified (based on Airy Modified 1849 ellipsoid)',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7002',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6003' => [
            'name' => 'Not specified (based on Australian National Spheroid)',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7003',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6004' => [
            'name' => 'Not specified (based on Bessel 1841 ellipsoid)',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7004',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6005' => [
            'name' => 'Not specified (based on Bessel Modified ellipsoid)',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7005',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6006' => [
            'name' => 'Not specified (based on Bessel Namibia ellipsoid)',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7046',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6007' => [
            'name' => 'Not specified (based on Clarke 1858 ellipsoid)',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7007',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6008' => [
            'name' => 'Not specified (based on Clarke 1866 ellipsoid)',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7008',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6010' => [
            'name' => 'Not specified (based on Clarke 1880 (Benoit) ellipsoid)',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7010',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6011' => [
            'name' => 'Not specified (based on Clarke 1880 (IGN) ellipsoid)',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7011',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6012' => [
            'name' => 'Not specified (based on Clarke 1880 (RGS) ellipsoid)',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7012',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6013' => [
            'name' => 'Not specified (based on Clarke 1880 (Arc) ellipsoid)',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7013',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6014' => [
            'name' => 'Not specified (based on Clarke 1880 (SGA 1922) ellipsoid)',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7014',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6015' => [
            'name' => 'Not specified (based on Everest 1830 (1937 Adjustment) ellipsoid)',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7015',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6016' => [
            'name' => 'Not specified (based on Everest 1830 (1967 Definition) ellipsoid)',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7016',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6018' => [
            'name' => 'Not specified (based on Everest 1830 Modified ellipsoid)',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7018',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6019' => [
            'name' => 'Not specified (based on GRS 1980 ellipsoid)',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6020' => [
            'name' => 'Not specified (based on Helmert 1906 ellipsoid)',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7020',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6021' => [
            'name' => 'Not specified (based on Indonesian National Spheroid)',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7021',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6022' => [
            'name' => 'Not specified (based on International 1924 ellipsoid)',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7022',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6024' => [
            'name' => 'Not specified (based on Krassowsky 1940 ellipsoid)',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7024',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6025' => [
            'name' => 'Not specified (based on NWL 9D ellipsoid)',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7025',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6027' => [
            'name' => 'Not specified (based on Plessis 1817 ellipsoid)',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7027',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6028' => [
            'name' => 'Not specified (based on Struve 1860 ellipsoid)',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7028',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6029' => [
            'name' => 'Not specified (based on War Office ellipsoid)',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7029',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6030' => [
            'name' => 'Not specified (based on WGS 84 ellipsoid)',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7030',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6031' => [
            'name' => 'Not specified (based on GEM 10C ellipsoid)',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7031',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6032' => [
            'name' => 'Not specified (based on OSU86F ellipsoid)',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7032',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6033' => [
            'name' => 'Not specified (based on OSU91A ellipsoid)',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7033',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6034' => [
            'name' => 'Not specified (based on Clarke 1880 ellipsoid)',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7034',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6036' => [
            'name' => 'Not specified (based on GRS 1967 ellipsoid)',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7036',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6041' => [
            'name' => 'Not specified (based on Average Terrestrial System 1977 ellipsoid)',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7041',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6042' => [
            'name' => 'Not specified (based on Everest (1830 Definition) ellipsoid)',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7042',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6043' => [
            'name' => 'Not specified (based on WGS 72 ellipsoid)',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7043',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6044' => [
            'name' => 'Not specified (based on Everest 1830 (1962 Definition) ellipsoid)',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7044',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6045' => [
            'name' => 'Not specified (based on Everest 1830 (1975 Definition) ellipsoid)',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7045',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6047' => [
            'name' => 'Not specified (based on GRS 1980 Authalic Sphere)',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7048',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6052' => [
            'name' => 'Not specified (based on Clarke 1866 Authalic Sphere)',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7052',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6053' => [
            'name' => 'Not specified (based on International 1924 Authalic Sphere)',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7057',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6054' => [
            'name' => 'Not specified (based on Hughes 1980 ellipsoid)',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7058',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6120' => [
            'name' => 'Greek',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7004',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6121' => [
            'name' => 'Greek Geodetic Reference System 1987',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6122' => [
            'name' => 'Average Terrestrial System 1977',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7041',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6123' => [
            'name' => 'Kartastokoordinaattijarjestelma (1966)',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7022',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6124' => [
            'name' => 'Rikets koordinatsystem 1990',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7004',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6126' => [
            'name' => 'Lithuania 1994 (ETRS89)',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6127' => [
            'name' => 'Tete',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7008',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6128' => [
            'name' => 'Madzansua',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7008',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6129' => [
            'name' => 'Observatario',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7008',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6130' => [
            'name' => 'Moznet (ITRF94)',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7030',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6131' => [
            'name' => 'Indian 1960',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7015',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6132' => [
            'name' => 'Final Datum 1958',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7012',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6133' => [
            'name' => 'Estonia 1992',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6134' => [
            'name' => 'PDO Survey Datum 1993',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7012',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6135' => [
            'name' => 'Old Hawaiian',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7008',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6136' => [
            'name' => 'St. Lawrence Island',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7008',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6137' => [
            'name' => 'St. Paul Island',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7008',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6138' => [
            'name' => 'St. George Island',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7008',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6139' => [
            'name' => 'Puerto Rico',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7008',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6140' => [
            'name' => 'NAD83 Canadian Spatial Reference System',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6141' => [
            'name' => 'Israel 1993',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6142' => [
            'name' => 'Locodjo 1965',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7012',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6143' => [
            'name' => 'Abidjan 1987',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7012',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6144' => [
            'name' => 'Kalianpur 1937',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7015',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6145' => [
            'name' => 'Kalianpur 1962',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7044',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6146' => [
            'name' => 'Kalianpur 1975',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7045',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6147' => [
            'name' => 'Hanoi 1972',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7024',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6148' => [
            'name' => 'Hartebeesthoek94',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7030',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6149' => [
            'name' => 'CH1903',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7004',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6150' => [
            'name' => 'CH1903+',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7004',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6151' => [
            'name' => 'Swiss Terrestrial Reference System 1995',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6152' => [
            'name' => 'NAD83 (High Accuracy Reference Network)',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6153' => [
            'name' => 'Rassadiran',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7022',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6154' => [
            'name' => 'European Datum 1950(1977)',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7022',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6155' => [
            'name' => 'Dabola 1981',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7011',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6156' => [
            'name' => 'System of the Unified Trigonometrical Cadastral Network',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7004',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6157' => [
            'name' => 'Mount Dillon',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7007',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6158' => [
            'name' => 'Naparima 1955',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7022',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6159' => [
            'name' => 'European Libyan Datum 1979',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7022',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6160' => [
            'name' => 'Chos Malal 1914',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7022',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6161' => [
            'name' => 'Pampa del Castillo',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7022',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6162' => [
            'name' => 'Korean Datum 1985',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7004',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6163' => [
            'name' => 'Yemen National Geodetic Network 1996',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7030',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6164' => [
            'name' => 'South Yemen',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7024',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6165' => [
            'name' => 'Bissau',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7022',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6166' => [
            'name' => 'Korean Datum 1995',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7030',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6167' => [
            'name' => 'New Zealand Geodetic Datum 2000',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6168' => [
            'name' => 'Accra',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7029',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6169' => [
            'name' => 'American Samoa 1962',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7008',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6170' => [
            'name' => 'Sistema de Referencia Geocentrico para America del Sur 1995',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6171' => [
            'name' => 'Reseau Geodesique Francais 1993 v1',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6173' => [
            'name' => 'IRENET95',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6174' => [
            'name' => 'Sierra Leone Colony 1924',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7029',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6175' => [
            'name' => 'Sierra Leone 1968',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7012',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6176' => [
            'name' => 'Australian Antarctic Datum 1998',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6178' => [
            'name' => 'Pulkovo 1942(83)',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7024',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6179' => [
            'name' => 'Pulkovo 1942(58)',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7024',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6180' => [
            'name' => 'Estonia 1997',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6181' => [
            'name' => 'Luxembourg Reference Frame',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7022',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6182' => [
            'name' => 'Azores Occidental Islands 1939',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7022',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6183' => [
            'name' => 'Azores Central Islands 1948',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7022',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6184' => [
            'name' => 'Azores Oriental Islands 1940',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7022',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6188' => [
            'name' => 'OSNI 1952',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7001',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6189' => [
            'name' => 'Red Geodesica Venezolana',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6190' => [
            'name' => 'Posiciones Geodesicas Argentinas 1998',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6191' => [
            'name' => 'Albanian 1987',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7024',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6192' => [
            'name' => 'Douala 1948',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7022',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6193' => [
            'name' => 'Manoca 1962',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7011',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6194' => [
            'name' => 'Qornoq 1927',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7022',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6195' => [
            'name' => 'Scoresbysund 1952',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7022',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6196' => [
            'name' => 'Ammassalik 1958',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7022',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6197' => [
            'name' => 'Garoua',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7012',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6198' => [
            'name' => 'Kousseri',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7012',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6199' => [
            'name' => 'Egypt 1930',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7022',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6200' => [
            'name' => 'Pulkovo 1995',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7024',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6201' => [
            'name' => 'Adindan',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7012',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6202' => [
            'name' => 'Australian Geodetic Datum 1966',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7003',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6203' => [
            'name' => 'Australian Geodetic Datum 1984',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7003',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6204' => [
            'name' => 'Ain el Abd 1970',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7022',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6205' => [
            'name' => 'Afgooye',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7024',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6206' => [
            'name' => 'Agadez',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7011',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6207' => [
            'name' => 'Lisbon 1937',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7022',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6208' => [
            'name' => 'Aratu',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7022',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6209' => [
            'name' => 'Arc 1950',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7013',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6210' => [
            'name' => 'Arc 1960',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7012',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6211' => [
            'name' => 'Batavia',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7004',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6212' => [
            'name' => 'Barbados 1938',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7012',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6213' => [
            'name' => 'Beduaram',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7011',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6214' => [
            'name' => 'Beijing 1954',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7024',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6215' => [
            'name' => 'Reseau National Belge 1950',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7022',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6216' => [
            'name' => 'Bermuda 1957',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7008',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6218' => [
            'name' => 'Bogota 1975',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7022',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6219' => [
            'name' => 'Bukit Rimpah',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7004',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6220' => [
            'name' => 'Camacupa 1948',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7012',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6221' => [
            'name' => 'Campo Inchauspe',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7022',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6222' => [
            'name' => 'Cape',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7013',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6223' => [
            'name' => 'Carthage',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7011',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6224' => [
            'name' => 'Chua',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7022',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6225' => [
            'name' => 'Corrego Alegre 1970-72',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7022',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6227' => [
            'name' => 'Deir ez Zor',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7011',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6229' => [
            'name' => 'Egypt 1907',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7020',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6230' => [
            'name' => 'European Datum 1950',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7022',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6231' => [
            'name' => 'European Datum 1987',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7022',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6232' => [
            'name' => 'Fahud',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7012',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6236' => [
            'name' => 'Hu Tzu Shan 1950',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7022',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6237' => [
            'name' => 'Hungarian Datum 1972',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7036',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6238' => [
            'name' => 'Indonesian Datum 1974',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7021',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6239' => [
            'name' => 'Indian 1954',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7015',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6240' => [
            'name' => 'Indian 1975',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7015',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6241' => [
            'name' => 'Jamaica 1875',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7034',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6242' => [
            'name' => 'Jamaica 1969',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7008',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6243' => [
            'name' => 'Kalianpur 1880',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7042',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6244' => [
            'name' => 'Kandawala',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7015',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6245' => [
            'name' => 'Kertau 1968',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7018',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6246' => [
            'name' => 'Kuwait Oil Company',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7012',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6247' => [
            'name' => 'La Canoa',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7022',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6248' => [
            'name' => 'Provisional South American Datum 1956',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7022',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6249' => [
            'name' => 'Lake',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7022',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6250' => [
            'name' => 'Leigon',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7012',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6251' => [
            'name' => 'Liberia 1964',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7012',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6252' => [
            'name' => 'Lome',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7011',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6253' => [
            'name' => 'Luzon 1911',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7008',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6254' => [
            'name' => 'Hito XVIII 1963',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7022',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6255' => [
            'name' => 'Herat North',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7022',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6256' => [
            'name' => 'Mahe 1971',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7012',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6257' => [
            'name' => 'Makassar',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7004',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6258' => [
            'name' => 'European Terrestrial Reference System 1989 ensemble',
            'type' => 'ensemble',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
            'ensemble' => [
                'urn:ogc:def:datum:EPSG::1178',
                'urn:ogc:def:datum:EPSG::1179',
                'urn:ogc:def:datum:EPSG::1180',
                'urn:ogc:def:datum:EPSG::1181',
                'urn:ogc:def:datum:EPSG::1182',
                'urn:ogc:def:datum:EPSG::1183',
                'urn:ogc:def:datum:EPSG::1184',
                'urn:ogc:def:datum:EPSG::1185',
                'urn:ogc:def:datum:EPSG::1186',
                'urn:ogc:def:datum:EPSG::1204',
                'urn:ogc:def:datum:EPSG::1206',
            ],
        ],
        'urn:ogc:def:datum:EPSG::6259' => [
            'name' => 'Malongo 1987',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7022',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6261' => [
            'name' => 'Merchich',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7011',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6262' => [
            'name' => 'Massawa',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7004',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6263' => [
            'name' => 'Minna',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7012',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6265' => [
            'name' => 'Monte Mario',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7022',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6266' => [
            'name' => 'M\'poraloko',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7011',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6267' => [
            'name' => 'North American Datum 1927',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7008',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6269' => [
            'name' => 'North American Datum 1983',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6270' => [
            'name' => 'Nahrwan 1967',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7012',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6271' => [
            'name' => 'Naparima 1972',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7022',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6272' => [
            'name' => 'New Zealand Geodetic Datum 1949',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7022',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6273' => [
            'name' => 'NGO 1948',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7005',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6274' => [
            'name' => 'Datum 73',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7022',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6275' => [
            'name' => 'Nouvelle Triangulation Francaise',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7011',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6276' => [
            'name' => 'NSWC 9Z-2',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7025',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6277' => [
            'name' => 'Ordnance Survey of Great Britain 1936',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7001',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6278' => [
            'name' => 'OSGB 1970 (SN)',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7001',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6279' => [
            'name' => 'OS (SN) 1980',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7001',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6281' => [
            'name' => 'Palestine 1923',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7010',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6282' => [
            'name' => 'Congo 1960 Pointe Noire',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7011',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6283' => [
            'name' => 'Geocentric Datum of Australia 1994',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6284' => [
            'name' => 'Pulkovo 1942',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7024',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6285' => [
            'name' => 'Qatar 1974',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7022',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6286' => [
            'name' => 'Qatar 1948',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7020',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6288' => [
            'name' => 'Loma Quintana',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7022',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6289' => [
            'name' => 'Amersfoort',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7004',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6292' => [
            'name' => 'Sapper Hill 1943',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7022',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6293' => [
            'name' => 'Schwarzeck',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7046',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6295' => [
            'name' => 'Serindung',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7004',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6297' => [
            'name' => 'Tananarive 1925',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7022',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6298' => [
            'name' => 'Timbalai 1948',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7016',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6299' => [
            'name' => 'TM65',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7002',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6300' => [
            'name' => 'Geodetic Datum of 1965',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7002',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6301' => [
            'name' => 'Tokyo',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7004',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6302' => [
            'name' => 'Trinidad 1903',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7007',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6303' => [
            'name' => 'Trucial Coast 1948',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7020',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6304' => [
            'name' => 'Voirol 1875',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7011',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6306' => [
            'name' => 'Bern 1938',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7004',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6307' => [
            'name' => 'Nord Sahara 1959',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7012',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6308' => [
            'name' => 'Stockholm 1938',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7004',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6309' => [
            'name' => 'Yacare',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7022',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6310' => [
            'name' => 'Yoff',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7011',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6311' => [
            'name' => 'Zanderij',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7022',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6312' => [
            'name' => 'Militar-Geographische Institut',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7004',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6313' => [
            'name' => 'Reseau National Belge 1972',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7022',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6314' => [
            'name' => 'Deutsches Hauptdreiecksnetz',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7004',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6315' => [
            'name' => 'Conakry 1905',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7011',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6316' => [
            'name' => 'Dealul Piscului 1930',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7022',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6318' => [
            'name' => 'National Geodetic Network',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7030',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6319' => [
            'name' => 'Kuwait Utility',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6322' => [
            'name' => 'World Geodetic System 1972',
            'type' => 'dynamic geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7043',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => 1972.0,
        ],
        'urn:ogc:def:datum:EPSG::6324' => [
            'name' => 'WGS 72 Transit Broadcast Ephemeris',
            'type' => 'dynamic geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7043',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => 1972.0,
        ],
        'urn:ogc:def:datum:EPSG::6326' => [
            'name' => 'World Geodetic System 1984 ensemble',
            'type' => 'ensemble',
            'ellipsoid' => null,
            'prime_meridian' => null,
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
            'ensemble' => [
                'urn:ogc:def:datum:EPSG::1166',
                'urn:ogc:def:datum:EPSG::1152',
                'urn:ogc:def:datum:EPSG::1153',
                'urn:ogc:def:datum:EPSG::1154',
                'urn:ogc:def:datum:EPSG::1155',
                'urn:ogc:def:datum:EPSG::1156',
                'urn:ogc:def:datum:EPSG::1309',
            ],
        ],
        'urn:ogc:def:datum:EPSG::6600' => [
            'name' => 'Anguilla 1957',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7012',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6601' => [
            'name' => 'Antigua 1943',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7012',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6602' => [
            'name' => 'Dominica 1945',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7012',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6603' => [
            'name' => 'Grenada 1953',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7012',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6604' => [
            'name' => 'Montserrat 1958',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7012',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6605' => [
            'name' => 'St. Kitts 1955',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7012',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6606' => [
            'name' => 'St. Lucia 1955',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7012',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6607' => [
            'name' => 'St. Vincent 1945',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7012',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6608' => [
            'name' => 'North American Datum 1927 (1976)',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7008',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6609' => [
            'name' => 'North American Datum 1927 (CGQ77)',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7008',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6610' => [
            'name' => 'Xian 1980',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7049',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6611' => [
            'name' => 'Hong Kong 1980',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7022',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6612' => [
            'name' => 'Japanese Geodetic Datum 2000',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6613' => [
            'name' => 'Gunung Segara',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7004',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6614' => [
            'name' => 'Qatar National Datum 1995',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7022',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6615' => [
            'name' => 'Porto Santo 1936',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7022',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6616' => [
            'name' => 'Selvagem Grande',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7022',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6618' => [
            'name' => 'South American Datum 1969',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7050',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6619' => [
            'name' => 'SWEREF99',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6620' => [
            'name' => 'Point 58',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7012',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6621' => [
            'name' => 'Fort Marigot',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7022',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6622' => [
            'name' => 'Guadeloupe 1948',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7022',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6623' => [
            'name' => 'Centre Spatial Guyanais 1967',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7022',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6624' => [
            'name' => 'Reseau Geodesique Francais Guyane 1995',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6625' => [
            'name' => 'Martinique 1938',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7022',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6626' => [
            'name' => 'Reunion 1947',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7022',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6627' => [
            'name' => 'Reseau Geodesique de la Reunion 1992',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6628' => [
            'name' => 'Tahiti 52',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7022',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6629' => [
            'name' => 'Tahaa 54',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7022',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6630' => [
            'name' => 'IGN72 Nuku Hiva',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7022',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6632' => [
            'name' => 'Combani 1950',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7022',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6633' => [
            'name' => 'IGN56 Lifou',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7022',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6634' => [
            'name' => 'IGN72 Grande Terre',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7022',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6636' => [
            'name' => 'Petrels 1972',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7022',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6637' => [
            'name' => 'Pointe Geologie Perroud 1950',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7022',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6638' => [
            'name' => 'Saint Pierre et Miquelon 1950',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7008',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6639' => [
            'name' => 'MOP78',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7022',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6641' => [
            'name' => 'IGN53 Mare',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7022',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6642' => [
            'name' => 'ST84 Ile des Pins',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7022',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6643' => [
            'name' => 'ST71 Belep',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7022',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6644' => [
            'name' => 'NEA74 Noumea',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7022',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6646' => [
            'name' => 'Grand Comoros',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7022',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6647' => [
            'name' => 'International Terrestrial Reference Frame 1988',
            'type' => 'dynamic geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => 1988.0,
        ],
        'urn:ogc:def:datum:EPSG::6648' => [
            'name' => 'International Terrestrial Reference Frame 1989',
            'type' => 'dynamic geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => 1988.0,
        ],
        'urn:ogc:def:datum:EPSG::6649' => [
            'name' => 'International Terrestrial Reference Frame 1990',
            'type' => 'dynamic geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => 1988.0,
        ],
        'urn:ogc:def:datum:EPSG::6650' => [
            'name' => 'International Terrestrial Reference Frame 1991',
            'type' => 'dynamic geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => 1988.0,
        ],
        'urn:ogc:def:datum:EPSG::6651' => [
            'name' => 'International Terrestrial Reference Frame 1992',
            'type' => 'dynamic geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => 1988.0,
        ],
        'urn:ogc:def:datum:EPSG::6652' => [
            'name' => 'International Terrestrial Reference Frame 1993',
            'type' => 'dynamic geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => 1993.0,
        ],
        'urn:ogc:def:datum:EPSG::6653' => [
            'name' => 'International Terrestrial Reference Frame 1994',
            'type' => 'dynamic geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => 1993.0,
        ],
        'urn:ogc:def:datum:EPSG::6654' => [
            'name' => 'International Terrestrial Reference Frame 1996',
            'type' => 'dynamic geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => 1997.0,
        ],
        'urn:ogc:def:datum:EPSG::6655' => [
            'name' => 'International Terrestrial Reference Frame 1997',
            'type' => 'dynamic geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => 1997.0,
        ],
        'urn:ogc:def:datum:EPSG::6656' => [
            'name' => 'International Terrestrial Reference Frame 2000',
            'type' => 'dynamic geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => 1997.0,
        ],
        'urn:ogc:def:datum:EPSG::6657' => [
            'name' => 'Reykjavik 1900',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7051',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6658' => [
            'name' => 'Hjorsey 1955',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7022',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6659' => [
            'name' => 'Islands Net 1993',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6660' => [
            'name' => 'Helle 1954',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7022',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6661' => [
            'name' => 'Latvia 1992',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6663' => [
            'name' => 'Porto Santo 1995',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7022',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6664' => [
            'name' => 'Azores Oriental Islands 1995',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7022',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6665' => [
            'name' => 'Azores Central Islands 1995',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7022',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6666' => [
            'name' => 'Lisbon 1890',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7004',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6667' => [
            'name' => 'Iraq-Kuwait Boundary Datum 1992',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7030',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6668' => [
            'name' => 'European Datum 1979',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7022',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6670' => [
            'name' => 'Istituto Geografico Militaire 1995',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6671' => [
            'name' => 'Voirol 1879',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7011',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6672' => [
            'name' => 'Chatham Islands Datum 1971',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7022',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6673' => [
            'name' => 'Chatham Islands Datum 1979',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7022',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6674' => [
            'name' => 'Sistema de Referencia Geocentrico para las AmericaS 2000',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6675' => [
            'name' => 'Guam 1963',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7008',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6676' => [
            'name' => 'Vientiane 1982',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7024',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6677' => [
            'name' => 'Lao 1993',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7024',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6678' => [
            'name' => 'Lao National Datum 1997',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7024',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6679' => [
            'name' => 'Jouik 1961',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7012',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6680' => [
            'name' => 'Nouakchott 1965',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7012',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6682' => [
            'name' => 'Gulshan 303',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7015',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6683' => [
            'name' => 'Philippine Reference System 1992',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7008',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6684' => [
            'name' => 'Gan 1970',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7022',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6686' => [
            'name' => 'Marco Geocentrico Nacional de Referencia',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6687' => [
            'name' => 'Reseau Geodesique de la Polynesie Francaise',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6688' => [
            'name' => 'Fatu Iva 72',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7022',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6689' => [
            'name' => 'IGN63 Hiva Oa',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7022',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6690' => [
            'name' => 'Tahiti 79',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7022',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6691' => [
            'name' => 'Moorea 87',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7022',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6692' => [
            'name' => 'Maupiti 83',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7022',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6693' => [
            'name' => 'Nakhl-e Ghanem',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7030',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6694' => [
            'name' => 'Posiciones Geodesicas Argentinas 1994',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7030',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6695' => [
            'name' => 'Katanga 1955',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7008',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6696' => [
            'name' => 'Kasai 1953',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7012',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6697' => [
            'name' => 'IGC 1962 Arc of the 6th Parallel South',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7012',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6698' => [
            'name' => 'IGN 1962 Kerguelen',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7022',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6699' => [
            'name' => 'Le Pouce 1934',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7012',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6700' => [
            'name' => 'IGN Astro 1960',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7012',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6701' => [
            'name' => 'Institut Geographique du Congo Belge 1955',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7012',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6702' => [
            'name' => 'Mauritania 1999',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6703' => [
            'name' => 'Missao Hidrografico Angola y Sao Tome 1951',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7012',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6704' => [
            'name' => 'Mhast (onshore)',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7022',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6705' => [
            'name' => 'Mhast (offshore)',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7022',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6706' => [
            'name' => 'Egypt Gulf of Suez S-650 TL',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7020',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6707' => [
            'name' => 'Tern Island 1961',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7022',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6708' => [
            'name' => 'Cocos Islands 1965',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7003',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6709' => [
            'name' => 'Iwo Jima 1945',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7022',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6710' => [
            'name' => 'Astro DOS 71',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7022',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6711' => [
            'name' => 'Marcus Island 1952',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7022',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6712' => [
            'name' => 'Ascension Island 1958',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7022',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6713' => [
            'name' => 'Ayabelle Lighthouse',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7012',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6714' => [
            'name' => 'Bellevue',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7022',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6715' => [
            'name' => 'Camp Area Astro',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7022',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6716' => [
            'name' => 'Phoenix Islands 1966',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7022',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6717' => [
            'name' => 'Cape Canaveral',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7008',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6718' => [
            'name' => 'Solomon 1968',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7022',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6719' => [
            'name' => 'Easter Island 1967',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7022',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6720' => [
            'name' => 'Fiji Geodetic Datum 1986',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7043',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6721' => [
            'name' => 'Fiji 1956',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7022',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6722' => [
            'name' => 'South Georgia 1968',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7022',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6723' => [
            'name' => 'Grand Cayman Geodetic Datum 1959',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7008',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6724' => [
            'name' => 'Diego Garcia 1969',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7022',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6725' => [
            'name' => 'Johnston Island 1961',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7022',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6726' => [
            'name' => 'Sister Islands Geodetic Datum 1961',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7008',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6727' => [
            'name' => 'Midway 1961',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7022',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6728' => [
            'name' => 'Pico de las Nieves 1984',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7022',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6729' => [
            'name' => 'Pitcairn 1967',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7022',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6730' => [
            'name' => 'Santo 1965',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7022',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6732' => [
            'name' => 'Marshall Islands 1960',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7053',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6733' => [
            'name' => 'Wake Island 1952',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7022',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6734' => [
            'name' => 'Tristan 1968',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7022',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6735' => [
            'name' => 'Kusaie 1951',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7022',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6736' => [
            'name' => 'Deception Island',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7012',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6737' => [
            'name' => 'Geocentric datum of Korea',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6738' => [
            'name' => 'Hong Kong 1963',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7007',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6739' => [
            'name' => 'Hong Kong 1963(67)',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7022',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6740' => [
            'name' => 'Parametry Zemli 1990',
            'type' => 'dynamic geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7054',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => 1990.0,
        ],
        'urn:ogc:def:datum:EPSG::6741' => [
            'name' => 'Faroe Datum 1954',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7022',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6742' => [
            'name' => 'Geodetic Datum of Malaysia 2000',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6743' => [
            'name' => 'Karbala 1979',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7012',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6744' => [
            'name' => 'Nahrwan 1934',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7012',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6745' => [
            'name' => 'Rauenberg Datum/83',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7004',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6746' => [
            'name' => 'Potsdam Datum/83',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7004',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6747' => [
            'name' => 'Greenland 1996',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6748' => [
            'name' => 'Vanua Levu 1915',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7055',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6749' => [
            'name' => 'Reseau Geodesique de Nouvelle Caledonie 91-93',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6750' => [
            'name' => 'ST87 Ouvea',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7030',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6751' => [
            'name' => 'Kertau (RSO)',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7056',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6752' => [
            'name' => 'Viti Levu 1912',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7055',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6753' => [
            'name' => 'fk89',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7022',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6754' => [
            'name' => 'Libyan Geodetic Datum 2006',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7022',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6755' => [
            'name' => 'Datum Geodesi Nasional 1995',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7030',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6756' => [
            'name' => 'Vietnam 2000',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7030',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6757' => [
            'name' => 'SVY21',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7030',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6758' => [
            'name' => 'Jamaica 2001',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7030',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6759' => [
            'name' => 'NAD83 (National Spatial Reference System 2007)',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6760' => [
            'name' => 'World Geodetic System 1966',
            'type' => 'dynamic geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7025',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => 1966.0,
        ],
        'urn:ogc:def:datum:EPSG::6761' => [
            'name' => 'Croatian Terrestrial Reference System',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6762' => [
            'name' => 'Bermuda 2000',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7030',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6763' => [
            'name' => 'Pitcairn 2006',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7030',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6764' => [
            'name' => 'Ross Sea Region Geodetic Datum 2000',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6765' => [
            'name' => 'Slovenia Geodetic Datum 1996',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6801' => [
            'name' => 'CH1903 (Bern)',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7004',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8907',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6802' => [
            'name' => 'Bogota 1975 (Bogota)',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7022',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8904',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6803' => [
            'name' => 'Lisbon 1937 (Lisbon)',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7022',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8902',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6804' => [
            'name' => 'Makassar (Jakarta)',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7004',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8908',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6805' => [
            'name' => 'Militar-Geographische Institut (Ferro)',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7004',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8909',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6806' => [
            'name' => 'Monte Mario (Rome)',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7022',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8906',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6807' => [
            'name' => 'Nouvelle Triangulation Francaise (Paris)',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7011',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8903',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6809' => [
            'name' => 'Reseau National Belge 1950 (Brussels)',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7022',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8910',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6810' => [
            'name' => 'Tananarive 1925 (Paris)',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7022',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8903',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6811' => [
            'name' => 'Voirol 1875 (Paris)',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7011',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8903',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6813' => [
            'name' => 'Batavia (Jakarta)',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7004',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8908',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6814' => [
            'name' => 'Stockholm 1938 (Stockholm)',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7004',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8911',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6815' => [
            'name' => 'Greek (Athens)',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7004',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8912',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6816' => [
            'name' => 'Carthage (Paris)',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7011',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8903',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6817' => [
            'name' => 'NGO 1948 (Oslo)',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7005',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8913',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6818' => [
            'name' => 'System of the Unified Trigonometrical Cadastral Network (Ferro)',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7004',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8909',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6820' => [
            'name' => 'Gunung Segara (Jakarta)',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7004',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8908',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6821' => [
            'name' => 'Voirol 1879 (Paris)',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7011',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8903',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6896' => [
            'name' => 'International Terrestrial Reference Frame 2005',
            'type' => 'dynamic geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7019',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8901',
            'conventional_rs' => null,
            'frame_reference_epoch' => 2000.0,
        ],
        'urn:ogc:def:datum:EPSG::6901' => [
            'name' => 'Ancienne Triangulation Francaise (Paris)',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7027',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8914',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6903' => [
            'name' => 'Madrid 1870 (Madrid)',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7028',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8905',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
        'urn:ogc:def:datum:EPSG::6904' => [
            'name' => 'Lisbon 1890 (Lisbon)',
            'type' => 'geodetic',
            'ellipsoid' => 'urn:ogc:def:ellipsoid:EPSG::7004',
            'prime_meridian' => 'urn:ogc:def:meridian:EPSG::8902',
            'conventional_rs' => null,
            'frame_reference_epoch' => null,
        ],
    ];

    public const DATUM_TYPE_GEODETIC = 'geodetic';

    public const DATUM_TYPE_VERTICAL = 'vertical';

    public const DATUM_TYPE_DYNAMIC_GEODETIC = 'dynamic_geodetic';

    public const DATUM_TYPE_DYNAMIC_VERTICAL = 'dynamic_vertical';

    public const DATUM_TYPE_ENGINEERING = 'engineering';

    public const DATUM_TYPE_ENSEMBLE = 'ensemble';

    private static array $cachedObjects = [];

    protected string $datumType;

    protected ?Ellipsoid $ellipsoid;

    protected ?PrimeMeridian $primeMeridian;

    protected ?DateTimeInterface $frameReferenceEpoch;

    protected string $name;

    protected string $srid;

    public function __construct(
        string $datumType,
        ?Ellipsoid $ellipsoid,
        ?PrimeMeridian $primeMeridian,
        ?DateTimeInterface $frameReferenceEpoch,
        string $name = '',
        string $srid = ''
    ) {
        $this->datumType = $datumType;
        $this->ellipsoid = $ellipsoid;
        $this->primeMeridian = $primeMeridian;
        $this->frameReferenceEpoch = $frameReferenceEpoch;
        $this->name = $name;
        $this->srid = $srid;
    }

    public function getDatumType(): string
    {
        return $this->datumType;
    }

    public function getEllipsoid(): Ellipsoid
    {
        return $this->ellipsoid;
    }

    public function getPrimeMeridian(): PrimeMeridian
    {
        return $this->primeMeridian;
    }

    public function getFrameReferenceEpoch(): ?DateTimeInterface
    {
        return $this->frameReferenceEpoch;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSRID(): string
    {
        return $this->srid;
    }

    public static function fromSRID(string $srid): self
    {
        if (!isset(static::$sridData[$srid])) {
            throw new UnknownDatumException($srid);
        }

        if (!isset(self::$cachedObjects[$srid])) {
            $data = static::$sridData[$srid];
            $frameReferenceEpoch = null;
            if ($data['frame_reference_epoch'] instanceof DateTimeInterface) {
                $frameReferenceEpoch = $data['frame_reference_epoch'];
            } elseif ($data['frame_reference_epoch']) {
                $frameReferenceEpoch = (new Year($data['frame_reference_epoch']))->asDateTime();
            }

            if ($data['type'] === self::DATUM_TYPE_ENSEMBLE) { // if ensemble, use latest realisation for data
                $latest = static::$sridData[end(static::$sridData[$srid]['ensemble'])];
                self::$cachedObjects[$srid] = new static(
                    $data['type'],
                    $latest['ellipsoid'] ? Ellipsoid::fromSRID($latest['ellipsoid']) : null,
                    $latest['prime_meridian'] ? PrimeMeridian::fromSRID($latest['prime_meridian']) : null,
                    $frameReferenceEpoch,
                    $data['name'],
                    $srid,
                );
            } elseif ($data['ellipsoid']) {
                self::$cachedObjects[$srid] = new static(
                    $data['type'],
                    Ellipsoid::fromSRID($data['ellipsoid']),
                    PrimeMeridian::fromSRID($data['prime_meridian']),
                    $frameReferenceEpoch,
                    $data['name'],
                    $srid,
                );
            } else {
                self::$cachedObjects[$srid] = new static(
                    $data['type'],
                    null,
                    null,
                    $frameReferenceEpoch,
                    $data['name'],
                    $srid,
                );
            }
        }

        return self::$cachedObjects[$srid];
    }

    public static function getSupportedSRIDs(): array
    {
        $supported = [];
        foreach (static::$sridData as $srid => $data) {
            $supported[$srid] = $data['name'];
        }

        return $supported;
    }

    public static function registerCustomDatum(string $srid, string $name, string $type, ?string $ellipsoidSrid, ?string $primeMeridianSrid, ?DateTimeInterface $frameReferenceEpoch): void
    {
        self::$sridData[$srid] = ['name' => $name, 'type' => $type, 'ellipsoid' => $ellipsoidSrid, 'prime_meridian' => $primeMeridianSrid, 'frame_reference_epoch' => $frameReferenceEpoch];
    }
}
