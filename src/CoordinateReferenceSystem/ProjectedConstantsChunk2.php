<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\CoordinateReferenceSystem;

trait ProjectedConstantsChunk2
{
    /**
     * Moznet / UTM zone 37S
     * Extent: Mozambique - between 36°E and 42°E.
     */
    public const EPSG_MOZNET_UTM_ZONE_37S = 'urn:ogc:def:crs:EPSG::3037';

    /**
     * Moznet / UTM zone 38S
     * Extent: Mozambique - onshore east of 36°E.
     */
    public const EPSG_MOZNET_UTM_ZONE_38S = 'urn:ogc:def:crs:EPSG::5629';

    /**
     * NAD27 / Alabama East
     * Extent: USA - Alabama east of approximately 86°37'W - counties Barbour; Bullock; Calhoun; Chambers; Cherokee;
     * Clay; Cleburne; Coffee; Coosa; Covington; Crenshaw; Dale; De Kalb; Elmore; Etowah; Geneva; Henry; Houston;
     * Jackson; Lee; Macon; Madison; Marshall; Montgomery; Pike; Randolph; Russell; St Clair; Talladega; Tallapoosa.
     */
    public const EPSG_NAD27_ALABAMA_EAST = 'urn:ogc:def:crs:EPSG::26729';

    /**
     * NAD27 / Alabama West
     * Extent: USA - Alabama west of approximately 86°37'W - counties Autauga; Baldwin; Bibb; Blount; Butler; Chilton;
     * Choctaw; Clarke; Colbert; Conecuh; Cullman; Dallas; Escambia; Fayette; Franklin; Greene; Hale; Jefferson; Lamar;
     * Lauderdale; Lawrence; Limestone; Lowndes; Marengo; Marion; Mobile; Monroe; Morgan; Perry; Pickens; Shelby;
     * Sumter; Tuscaloosa; Walker; Washington; Wilcox; Winston.
     */
    public const EPSG_NAD27_ALABAMA_WEST = 'urn:ogc:def:crs:EPSG::26730';

    /**
     * NAD27 / Alaska Albers
     * Extent: USA - Alaska.
     */
    public const EPSG_NAD27_ALASKA_ALBERS = 'urn:ogc:def:crs:EPSG::2964';

    /**
     * NAD27 / Alaska zone 1
     * Extent: USA - Alaska - east of 141°W; i.e. Panhandle.
     */
    public const EPSG_NAD27_ALASKA_ZONE_1 = 'urn:ogc:def:crs:EPSG::26731';

    /**
     * NAD27 / Alaska zone 10
     * Extent: USA - Alaska - Aleutian Islands onshore.
     */
    public const EPSG_NAD27_ALASKA_ZONE_10 = 'urn:ogc:def:crs:EPSG::26740';

    /**
     * NAD27 / Alaska zone 2
     * Extent: USA - Alaska - between 144°W and 141°W, onshore.
     */
    public const EPSG_NAD27_ALASKA_ZONE_2 = 'urn:ogc:def:crs:EPSG::26732';

    /**
     * NAD27 / Alaska zone 3
     * Extent: USA - Alaska - between 148°W and 144°W.
     */
    public const EPSG_NAD27_ALASKA_ZONE_3 = 'urn:ogc:def:crs:EPSG::26733';

    /**
     * NAD27 / Alaska zone 4
     * Extent: USA - Alaska - between 152°W and 148°W, onshore.
     */
    public const EPSG_NAD27_ALASKA_ZONE_4 = 'urn:ogc:def:crs:EPSG::26734';

    /**
     * NAD27 / Alaska zone 5
     * Extent: USA - Alaska - between 156°W and 152°W.
     */
    public const EPSG_NAD27_ALASKA_ZONE_5 = 'urn:ogc:def:crs:EPSG::26735';

    /**
     * NAD27 / Alaska zone 6
     * Extent: USA - Alaska - between 160°W and 156°W, onshore.
     */
    public const EPSG_NAD27_ALASKA_ZONE_6 = 'urn:ogc:def:crs:EPSG::26736';

    /**
     * NAD27 / Alaska zone 7
     * Extent: USA - Alaska - between 164°W and 160°W, onshore.
     */
    public const EPSG_NAD27_ALASKA_ZONE_7 = 'urn:ogc:def:crs:EPSG::26737';

    /**
     * NAD27 / Alaska zone 8
     * Extent: USA - Alaska onshore north of 54°30'N and between 168°W and 164°W.
     */
    public const EPSG_NAD27_ALASKA_ZONE_8 = 'urn:ogc:def:crs:EPSG::26738';

    /**
     * NAD27 / Alaska zone 9
     * Extent: USA - Alaska onshore north of 54°30'N and west of 168°W.
     */
    public const EPSG_NAD27_ALASKA_ZONE_9 = 'urn:ogc:def:crs:EPSG::26739';

    /**
     * NAD27 / Alberta 3TM ref merid 111 W
     * Extent: Canada - Alberta - east of 112°30'W
     * If used for rural area control markers, area of use is amended to east of 112°W; however use of NAD27 / UTM
     * zone 12N (CRS code 26712) is encouraged in these rural areas.
     */
    public const EPSG_NAD27_ALBERTA_3TM_REF_MERID_111_W = 'urn:ogc:def:crs:EPSG::3771';

    /**
     * NAD27 / Alberta 3TM ref merid 114 W
     * Extent: Canada - Alberta - between 115°30'W and 112°30'W
     * If used for rural area control markers, area of use is amended to between 116°W and 112°W; however use of
     * NAD27 / UTM zones 11N and 12N (CRS codes 26711 and 26712) is encouraged in these rural areas.
     */
    public const EPSG_NAD27_ALBERTA_3TM_REF_MERID_114_W = 'urn:ogc:def:crs:EPSG::3772';

    /**
     * NAD27 / Alberta 3TM ref merid 117 W
     * Extent: Canada - Alberta - between 118°30'W and 115°30' W
     * If used for rural area control markers, area of use is amended to between 118°W and 116°W; however use of
     * NAD27 / UTM zone 11N (CRS code 26711) is encouraged in these rural areas.
     */
    public const EPSG_NAD27_ALBERTA_3TM_REF_MERID_117_W = 'urn:ogc:def:crs:EPSG::3773';

    /**
     * NAD27 / Alberta 3TM ref merid 120 W
     * Extent: Canada - Alberta - west of 118°30' W
     * If used for rural area control markers, area of use is amended to west of 118°W; however use of NAD27 / UTM
     * zone 11N (CRS code 26711) encouraged in these rural areas.
     */
    public const EPSG_NAD27_ALBERTA_3TM_REF_MERID_120_W = 'urn:ogc:def:crs:EPSG::3800';

    /**
     * NAD27 / Arizona Central
     * Extent: USA - Arizona - counties Coconino; Maricopa; Pima; Pinal; Santa Cruz; Yavapai.
     */
    public const EPSG_NAD27_ARIZONA_CENTRAL = 'urn:ogc:def:crs:EPSG::26749';

    /**
     * NAD27 / Arizona East
     * Extent: USA - Arizona - counties Apache; Cochise; Gila; Graham; Greenlee; Navajo.
     */
    public const EPSG_NAD27_ARIZONA_EAST = 'urn:ogc:def:crs:EPSG::26748';

    /**
     * NAD27 / Arizona West
     * Extent: USA - Arizona - counties of La Paz; Mohave; Yuma.
     */
    public const EPSG_NAD27_ARIZONA_WEST = 'urn:ogc:def:crs:EPSG::26750';

    /**
     * NAD27 / Arkansas North
     * Extent: USA - Arkansas - counties of Baxter; Benton; Boone; Carroll; Clay; Cleburne; Conway; Craighead;
     * Crawford; Crittenden; Cross; Faulkner; Franklin; Fulton; Greene; Independence; Izard; Jackson; Johnson;
     * Lawrence; Logan; Madison; Marion; Mississippi; Newton; Perry; Poinsett; Pope; Randolph; Scott; Searcy;
     * Sebastian; Sharp; St Francis; Stone; Van Buren; Washington; White; Woodruff; Yell.
     */
    public const EPSG_NAD27_ARKANSAS_NORTH = 'urn:ogc:def:crs:EPSG::26751';

    /**
     * NAD27 / Arkansas South
     * Extent: USA - Arkansas - counties Arkansas; Ashley; Bradley; Calhoun; Chicot; Clark; Cleveland; Columbia;
     * Dallas; Desha; Drew; Garland; Grant; Hempstead; Hot Spring; Howard; Jefferson; Lafayette; Lee; Lincoln; Little
     * River; Lonoke; Miller; Monroe; Montgomery; Nevada; Ouachita; Phillips; Pike; Polk; Prairie; Pulaski; Saline;
     * Sevier; Union.
     */
    public const EPSG_NAD27_ARKANSAS_SOUTH = 'urn:ogc:def:crs:EPSG::26752';

    /**
     * NAD27 / BLM 10N (ftUS)
     * Extent: USA - between 126°W and 120°W - California; Oregon; Washington.
     */
    public const EPSG_NAD27_BLM_10N_FTUS = 'urn:ogc:def:crs:EPSG::4410';

    /**
     * NAD27 / BLM 11N (ftUS)
     * Extent: USA - between 120°W and 114°W - California, Idaho, Nevada, Oregon, Washington.
     */
    public const EPSG_NAD27_BLM_11N_FTUS = 'urn:ogc:def:crs:EPSG::4411';

    /**
     * NAD27 / BLM 12N (ftUS)
     * Extent: USA - between 114°W and 108°W - Arizona; Colorado; Idaho; Montana; New Mexico; Utah; Wyoming.
     */
    public const EPSG_NAD27_BLM_12N_FTUS = 'urn:ogc:def:crs:EPSG::4412';

    /**
     * NAD27 / BLM 13N (ftUS)
     * Extent: USA - between 108°W and 102°W - Colorado; Montana; Nebraska; New Mexico; North Dakota; Oklahoma; South
     * Dakota; Texas; Wyoming.
     */
    public const EPSG_NAD27_BLM_13N_FTUS = 'urn:ogc:def:crs:EPSG::4413';

    /**
     * NAD27 / BLM 14N (ftUS)
     * Extent: USA - between 102°W and 96°W. Iowa; Kansas; Minnesota; Nebraska; North Dakota; Oklahoma; South Dakota;
     * Texas; Gulf of Mexico west of approximately 96°W - leasing areas Matagorda Island, Mustang Island, North Padre
     * Island and South Padre Island; outer continental shelf (GoM OCS) protraction areas Corpus Christi, Port Isabel.
     */
    public const EPSG_NAD27_BLM_14N_FTUS = 'urn:ogc:def:crs:EPSG::32064';

    /**
     * NAD27 / BLM 15N (ftUS)
     * Extent: USA - between 96°W and 90°W - Arkansas; Illinois; Iowa; Kansas; Louisiana; Michigan; Minnesota;
     * Mississippi; Missouri; Nebraska; Oklahoma; Tennessee; Texas; Wisconsin; Gulf of Mexico outer continental shelf
     * (GoM OCS) between approximately 96°W and 90°W - leasing areas Brazos, Galveston, High Island; Sabine Pass;
     * West Cameron, East Cameron, Vermilion, South Marsh Island, Eugene Island, Ship Shoal, South Pelto, Bay Marchand,
     * South Timbalier, Grand Isle; protraction areas East Breaks, Alaminos Canyon, Garden Banks, Keathley Canyon,
     * Sigsbee Escarpment, Ewing Bank, Green Canyon, Walker Ridge, Amery Terrace.
     */
    public const EPSG_NAD27_BLM_15N_FTUS = 'urn:ogc:def:crs:EPSG::32065';

    /**
     * NAD27 / BLM 16N (ftUS)
     * Extent: USA - between 90°W and 84°W - Alabama; Arkansas; Florida; Georgia; Indiana; Illinois; Kentucky;
     * Louisiana; Michigan; Minnesota; Mississippi; Missouri; North Carolina; Ohio; Tennessee; Wisconsin; Gulf of
     * Mexico outer continental shelf (GoM OCS) between approximately 90°W and 84°W - leasing areas Grand Isle, West
     * Delta, South Pass, Breton Sound, Main Pass,  Chandeleur; protraction areas Mobile, Viosca Knoll, Mississippi
     * Canyon, Atwater Valley, Lund, Lund South, Pensacola, Destin Dome, De Soto Canyon, Lloyd Ridge, Henderson,
     * Florida Plain, Campeche Escarpment, Apalachicola, Florida Middle Ground, The Elbow, Vernon Basin, Howell Hook,
     * Rankin.
     */
    public const EPSG_NAD27_BLM_16N_FTUS = 'urn:ogc:def:crs:EPSG::32066';

    /**
     * NAD27 / BLM 17N (ftUS)
     * Extent: USA - between 84°W and 78°W - Florida; Georgia; Maryland; Michigan; New York; North Carolina; Ohio;
     * Pennsylvania; South Carolina; Tennessee; Virginia; West Virginia; Gulf of Mexico outer continental shelf (GoM
     * OCS) east of approximately 84°W - protraction areas Gainesville; Tarpon Springs; St Petersburg; Charlotte
     * Harbor; Pulley Ridge; Dry Tortugas; Tortugas Valley; Miami; Key West.
     */
    public const EPSG_NAD27_BLM_17N_FTUS = 'urn:ogc:def:crs:EPSG::32067';

    /**
     * NAD27 / BLM 18N (ftUS)
     * Extent: USA - between 78°W and 72°W - Connecticut; Delaware; Maryland; Massachusetts; New Hampshire; New
     * Jersey; New York; North Carolina; Pennsylvania; Virginia; Vermont.
     */
    public const EPSG_NAD27_BLM_18N_FTUS = 'urn:ogc:def:crs:EPSG::4418';

    /**
     * NAD27 / BLM 19N (ftUS)
     * Extent: USA - between 72°W and 66°W - Connecticut; Maine; Massachusetts; New Hampshire; New York (Long
     * Island); Rhode Island; Vermont.
     */
    public const EPSG_NAD27_BLM_19N_FTUS = 'urn:ogc:def:crs:EPSG::4419';

    /**
     * NAD27 / BLM 1N (ftUS)
     * Extent: USA - between 180°W and 174°W - Alaska and offshore continental shelf (OCS).
     */
    public const EPSG_NAD27_BLM_1N_FTUS = 'urn:ogc:def:crs:EPSG::4401';

    /**
     * NAD27 / BLM 2N (ftUS)
     * Extent: USA - between 174°W and 168°W - Alaska and offshore continental shelf (OCS).
     */
    public const EPSG_NAD27_BLM_2N_FTUS = 'urn:ogc:def:crs:EPSG::4402';

    /**
     * NAD27 / BLM 3N (ftUS)
     * Extent: USA - between 168°W and 162°W - Alaska and offshore continental shelf (OCS).
     */
    public const EPSG_NAD27_BLM_3N_FTUS = 'urn:ogc:def:crs:EPSG::4403';

    /**
     * NAD27 / BLM 4N (ftUS)
     * Extent: USA - between 162°W and 156°W - Alaska and offshore continental shelf (OCS).
     */
    public const EPSG_NAD27_BLM_4N_FTUS = 'urn:ogc:def:crs:EPSG::4404';

    /**
     * NAD27 / BLM 59N (ftUS)
     * Extent: USA - west of 174°E. Alaska and offshore continental shelf (OCS).
     */
    public const EPSG_NAD27_BLM_59N_FTUS = 'urn:ogc:def:crs:EPSG::4399';

    /**
     * NAD27 / BLM 5N (ftUS)
     * Extent: USA - between 156°W and 150°W - Alaska and offshore continental shelf (OCS).
     */
    public const EPSG_NAD27_BLM_5N_FTUS = 'urn:ogc:def:crs:EPSG::4405';

    /**
     * NAD27 / BLM 60N (ftUS)
     * Extent: USA - between 174°E and 180°E - Alaska and offshore continental shelf (OCS).
     */
    public const EPSG_NAD27_BLM_60N_FTUS = 'urn:ogc:def:crs:EPSG::4400';

    /**
     * NAD27 / BLM 6N (ftUS)
     * Extent: USA - between 150°W and 144°W - Alaska and offshore continental shelf (OCS).
     */
    public const EPSG_NAD27_BLM_6N_FTUS = 'urn:ogc:def:crs:EPSG::4406';

    /**
     * NAD27 / BLM 7N (ftUS)
     * Extent: USA - between 144°W and 138°W - Alaska.
     */
    public const EPSG_NAD27_BLM_7N_FTUS = 'urn:ogc:def:crs:EPSG::4407';

    /**
     * NAD27 / BLM 8N (ftUS)
     * Extent: USA - between 138°W and 132°W - Alaska.
     */
    public const EPSG_NAD27_BLM_8N_FTUS = 'urn:ogc:def:crs:EPSG::4408';

    /**
     * NAD27 / BLM 9N (ftUS)
     * Extent: USA - between 132°W and 126°W - Alaska.
     */
    public const EPSG_NAD27_BLM_9N_FTUS = 'urn:ogc:def:crs:EPSG::4409';

    /**
     * NAD27 / California Albers
     * Extent: USA - California.
     */
    public const EPSG_NAD27_CALIFORNIA_ALBERS = 'urn:ogc:def:crs:EPSG::3309';

    /**
     * NAD27 / California zone I
     * Extent: USA - California - counties Del Norte; Humboldt; Lassen; Modoc; Plumas; Shasta; Siskiyou; Tehama;
     * Trinity.
     */
    public const EPSG_NAD27_CALIFORNIA_ZONE_I = 'urn:ogc:def:crs:EPSG::26741';

    /**
     * NAD27 / California zone II
     * Extent: USA - California - counties of Alpine; Amador; Butte; Colusa; El Dorado; Glenn; Lake; Mendocino; Napa;
     * Nevada; Placer; Sacramento; Sierra; Solano; Sonoma; Sutter; Yolo; Yuba.
     */
    public const EPSG_NAD27_CALIFORNIA_ZONE_II = 'urn:ogc:def:crs:EPSG::26742';

    /**
     * NAD27 / California zone III
     * Extent: USA - California - counties Alameda; Calaveras; Contra Costa; Madera; Marin; Mariposa; Merced; Mono; San
     * Francisco; San Joaquin; San Mateo; Santa Clara; Santa Cruz; Stanislaus; Tuolumne.
     */
    public const EPSG_NAD27_CALIFORNIA_ZONE_III = 'urn:ogc:def:crs:EPSG::26743';

    /**
     * NAD27 / California zone IV
     * Extent: USA - California - counties Fresno; Inyo; Kings; Monterey; San Benito; Tulare.
     */
    public const EPSG_NAD27_CALIFORNIA_ZONE_IV = 'urn:ogc:def:crs:EPSG::26744';

    /**
     * NAD27 / California zone V
     * Extent: USA - California - counties of Kern; San Bernardino; San Luis Obispo; Santa Barbara; Ventura.
     */
    public const EPSG_NAD27_CALIFORNIA_ZONE_V = 'urn:ogc:def:crs:EPSG::26745';

    /**
     * NAD27 / California zone VI
     * Extent: USA - California - counties Imperial; Orange; Riverside; San Diego.
     */
    public const EPSG_NAD27_CALIFORNIA_ZONE_VI = 'urn:ogc:def:crs:EPSG::26746';

    /**
     * NAD27 / California zone VII
     * Extent: USA - California - Los Angeles county.
     */
    public const EPSG_NAD27_CALIFORNIA_ZONE_VII = 'urn:ogc:def:crs:EPSG::26799';

    /**
     * NAD27 / Colorado Central
     * Extent: USA - Colorado - counties Arapahoe; Chaffee; Cheyenne; Clear Creek; Delta; Denver; Douglas; Eagle; El
     * Paso; Elbert; Fremont; Garfield; Gunnison; Jefferson; Kit Carson; Lake; Lincoln; Mesa; Park; Pitkin; Summit;
     * Teller.
     */
    public const EPSG_NAD27_COLORADO_CENTRAL = 'urn:ogc:def:crs:EPSG::26754';

    /**
     * NAD27 / Colorado North
     * Extent: USA - Colorado - counties Adams; Boulder; Gilpin; Grand; Jackson; Larimer; Logan; Moffat; Morgan;
     * Phillips; Rio Blanco; Routt; Sedgwick; Washington; Weld; Yuma.
     */
    public const EPSG_NAD27_COLORADO_NORTH = 'urn:ogc:def:crs:EPSG::26753';

    /**
     * NAD27 / Colorado South
     * Extent: USA - Colorado - counties Alamosa; Archuleta; Baca; Bent; Conejos; Costilla; Crowley; Custer; Dolores;
     * Hinsdale; Huerfano; Kiowa; La Plata; Las Animas; Mineral; Montezuma; Montrose; Otero; Ouray; Prowers; Pueblo;
     * Rio Grande; Saguache; San Juan; San Miguel.
     */
    public const EPSG_NAD27_COLORADO_SOUTH = 'urn:ogc:def:crs:EPSG::26755';

    /**
     * NAD27 / Connecticut
     * Extent: USA - Connecticut - counties of Fairfield; Hartford; Litchfield; Middlesex; New Haven; New London;
     * Tolland; Windham.
     */
    public const EPSG_NAD27_CONNECTICUT = 'urn:ogc:def:crs:EPSG::26756';

    /**
     * NAD27 / Conus Albers
     * Extent: USA - CONUS onshore - Alabama; Arizona; Arkansas; California; Colorado; Connecticut; Delaware; Florida;
     * Georgia; Idaho; Illinois; Indiana; Iowa; Kansas; Kentucky; Louisiana; Maine; Maryland; Massachusetts; Michigan;
     * Minnesota; Mississippi; Missouri; Montana; Nebraska; Nevada; New Hampshire; New Jersey; New Mexico; New York;
     * North Carolina; North Dakota; Ohio; Oklahoma; Oregon; Pennsylvania; Rhode Island; South Carolina; South Dakota;
     * Tennessee; Texas; Utah; Vermont; Virginia; Washington; West Virginia; Wisconsin; Wyoming
     * Replaced by NAD83 / Conus Albers (CRS code 5070).
     */
    public const EPSG_NAD27_CONUS_ALBERS = 'urn:ogc:def:crs:EPSG::5069';

    /**
     * NAD27 / Cuba Norte
     * Extent: Cuba - onshore north of 21°30'N but also including all of Isla de la Juventud.
     */
    public const EPSG_NAD27_CUBA_NORTE = 'urn:ogc:def:crs:EPSG::3795';

    /**
     * NAD27 / Cuba Sur
     * Extent: Cuba - onshore south of 21°30'N and east of 80°W.
     */
    public const EPSG_NAD27_CUBA_SUR = 'urn:ogc:def:crs:EPSG::3796';

    /**
     * NAD27 / Delaware
     * Extent: USA - Delaware - counties of Kent; New Castle; Sussex.
     */
    public const EPSG_NAD27_DELAWARE = 'urn:ogc:def:crs:EPSG::26757';

    /**
     * NAD27 / Florida East
     * Extent: USA - Florida - counties of Brevard; Broward; Clay; Collier; Dade; Duval; Flagler; Glades; Hendry;
     * Highlands; Indian River; Lake; Martin; Monroe; Nassau; Okeechobee; Orange; Osceola; Palm Beach; Putnam;
     * Seminole; St Johns; St Lucie; Volusia.
     */
    public const EPSG_NAD27_FLORIDA_EAST = 'urn:ogc:def:crs:EPSG::26758';

    /**
     * NAD27 / Florida North
     * Extent: USA - Florida - counties of Alachua; Baker; Bay; Bradford; Calhoun; Columbia; Dixie; Escambia; Franklin;
     * Gadsden; Gilchrist; Gulf; Hamilton; Holmes; Jackson; Jefferson; Lafayette; Leon; Liberty; Madison; Okaloosa;
     * Santa Rosa; Suwannee; Taylor; Union; Wakulla; Walton; Washington.
     */
    public const EPSG_NAD27_FLORIDA_NORTH = 'urn:ogc:def:crs:EPSG::26760';

    /**
     * NAD27 / Florida West
     * Extent: USA - Florida - counties of Charlotte; Citrus; De Soto; Hardee; Hernando; Hillsborough; Lee; Levy;
     * Manatee; Marion; Pasco; Pinellas; Polk; Sarasota; Sumter.
     */
    public const EPSG_NAD27_FLORIDA_WEST = 'urn:ogc:def:crs:EPSG::26759';

    /**
     * NAD27 / Georgia East
     * Extent: USA - Georgia - counties of Appling; Atkinson; Bacon; Baldwin; Brantley; Bryan; Bulloch; Burke; Camden;
     * Candler; Charlton; Chatham; Clinch; Coffee; Columbia; Dodge; Echols; Effingham; Elbert; Emanuel; Evans;
     * Franklin; Glascock; Glynn; Greene; Hancock; Hart; Jeff Davis; Jefferson; Jenkins; Johnson; Lanier; Laurens;
     * Liberty; Lincoln; Long; Madison; McDuffie; McIntosh; Montgomery; Oglethorpe; Pierce; Richmond; Screven;
     * Stephens; Taliaferro; Tattnall; Telfair; Toombs; Treutlen; Ware; Warren; Washington; Wayne; Wheeler; Wilkes;
     * Wilkinson.
     */
    public const EPSG_NAD27_GEORGIA_EAST = 'urn:ogc:def:crs:EPSG::26766';

    /**
     * NAD27 / Georgia West
     * Extent: USA - Georgia - counties of Baker; Banks; Barrow; Bartow; Ben Hill; Berrien; Bibb; Bleckley; Brooks;
     * Butts; Calhoun; Carroll; Catoosa; Chattahoochee; Chattooga; Cherokee; Clarke; Clay; Clayton; Cobb; Colquitt;
     * Cook; Coweta; Crawford; Crisp; Dade; Dawson; De Kalb; Decatur; Dooly; Dougherty; Douglas; Early; Fannin;
     * Fayette; Floyd; Forsyth; Fulton; Gilmer; Gordon; Grady; Gwinnett; Habersham; Hall; Haralson; Harris; Heard;
     * Henry; Houston; Irwin; Jackson; Jasper; Jones; Lamar; Lee; Lowndes; Lumpkin; Macon; Marion; Meriwether; Miller;
     * Mitchell; Monroe; Morgan; Murray; Muscogee; Newton; Oconee; Paulding; Peach; Pickens; Pike; Polk; Pulaski;
     * Putnam; Quitman; Rabun; Randolph; Rockdale; Schley; Seminole; Spalding; Stewart; Sumter; Talbot; Taylor;
     * Terrell; Thomas; Tift; Towns; Troup; Turner; Twiggs; Union; Upson; Walker; Walton; Webster; White; Whitfield;
     * Wilcox; Worth.
     */
    public const EPSG_NAD27_GEORGIA_WEST = 'urn:ogc:def:crs:EPSG::26767';

    /**
     * NAD27 / Idaho Central
     * Extent: USA - Idaho - counties of Blaine; Butte; Camas; Cassia; Custer; Gooding; Jerome; Lemhi; Lincoln;
     * Minidoka; Twin Falls.
     */
    public const EPSG_NAD27_IDAHO_CENTRAL = 'urn:ogc:def:crs:EPSG::26769';

    /**
     * NAD27 / Idaho East
     * Extent: USA - Idaho - counties of Bannock; Bear Lake; Bingham; Bonneville; Caribou; Clark; Franklin; Fremont;
     * Jefferson; Madison; Oneida; Power; Teton.
     */
    public const EPSG_NAD27_IDAHO_EAST = 'urn:ogc:def:crs:EPSG::26768';

    /**
     * NAD27 / Idaho West
     * Extent: USA - Idaho - counties of Ada; Adams; Benewah; Boise; Bonner; Boundary; Canyon; Clearwater; Elmore; Gem;
     * Idaho; Kootenai; Latah; Lewis; Nez Perce; Owyhee; Payette; Shoshone; Valley; Washington.
     */
    public const EPSG_NAD27_IDAHO_WEST = 'urn:ogc:def:crs:EPSG::26770';

    /**
     * NAD27 / Illinois East
     * Extent: USA - Illinois - counties of Boone; Champaign; Clark; Clay; Coles; Cook; Crawford; Cumberland; De Kalb;
     * De Witt; Douglas; Du Page; Edgar; Edwards; Effingham; Fayette; Ford; Franklin; Gallatin; Grundy; Hamilton;
     * Hardin; Iroquois; Jasper; Jefferson; Johnson; Kane; Kankakee; Kendall; La Salle; Lake; Lawrence; Livingston;
     * Macon; Marion; Massac; McHenry; McLean; Moultrie; Piatt; Pope; Richland; Saline; Shelby; Vermilion; Wabash;
     * Wayne; White; Will; Williamson.
     */
    public const EPSG_NAD27_ILLINOIS_EAST = 'urn:ogc:def:crs:EPSG::26771';

    /**
     * NAD27 / Illinois West
     * Extent: USA - Illinois - counties of Adams; Alexander; Bond; Brown; Bureau; Calhoun; Carroll; Cass; Christian;
     * Clinton; Fulton; Greene; Hancock; Henderson; Henry; Jackson; Jersey; Jo Daviess; Knox; Lee; Logan; Macoupin;
     * Madison; Marshall; Mason; McDonough; Menard; Mercer; Monroe; Montgomery; Morgan; Ogle; Peoria; Perry; Pike;
     * Pulaski; Putnam; Randolph; Rock Island; Sangamon; Schuyler; Scott; St Clair; Stark; Stephenson; Tazewell; Union;
     * Warren; Washington; Whiteside; Winnebago; Woodford.
     */
    public const EPSG_NAD27_ILLINOIS_WEST = 'urn:ogc:def:crs:EPSG::26772';

    /**
     * NAD27 / Indiana East
     * Extent: USA - Indiana - counties of Adams; Allen; Bartholomew; Blackford; Brown; Cass; Clark; De Kalb; Dearborn;
     * Decatur; Delaware; Elkhart; Fayette; Floyd; Franklin; Fulton; Grant; Hamilton; Hancock; Harrison; Henry; Howard;
     * Huntington; Jackson; Jay; Jefferson; Jennings; Johnson; Kosciusko; Lagrange; Madison; Marion; Marshall; Miami;
     * Noble; Ohio; Randolph; Ripley; Rush; Scott; Shelby; St Joseph; Steuben; Switzerland; Tipton; Union; Wabash;
     * Washington; Wayne; Wells; Whitley.
     */
    public const EPSG_NAD27_INDIANA_EAST = 'urn:ogc:def:crs:EPSG::26773';

    /**
     * NAD27 / Indiana West
     * Extent: USA - Indiana - counties of Benton; Boone; Carroll; Clay; Clinton; Crawford; Daviess; Dubois; Fountain;
     * Gibson; Greene; Hendricks; Jasper; Knox; La Porte; Lake; Lawrence; Martin; Monroe; Montgomery; Morgan; Newton;
     * Orange; Owen; Parke; Perry; Pike; Porter; Posey; Pulaski; Putnam; Spencer; Starke; Sullivan; Tippecanoe;
     * Vanderburgh; Vermillion; Vigo; Warren; Warrick; White.
     */
    public const EPSG_NAD27_INDIANA_WEST = 'urn:ogc:def:crs:EPSG::26774';

    /**
     * NAD27 / Iowa North
     * Extent: USA - Iowa - counties of Allamakee; Benton; Black Hawk; Boone; Bremer; Buchanan; Buena Vista; Butler;
     * Calhoun; Carroll; Cerro Gordo; Cherokee; Chickasaw; Clay; Clayton; Crawford; Delaware; Dickinson; Dubuque;
     * Emmet; Fayette; Floyd; Franklin; Greene; Grundy; Hamilton; Hancock; Hardin; Howard; Humboldt; Ida; Jackson;
     * Jones; Kossuth; Linn; Lyon; Marshall; Mitchell; Monona; O'Brien; Osceola; Palo Alto; Plymouth; Pocahontas; Sac;
     * Sioux; Story; Tama; Webster; Winnebago; Winneshiek; Woodbury; Worth; Wright.
     */
    public const EPSG_NAD27_IOWA_NORTH = 'urn:ogc:def:crs:EPSG::26775';

    /**
     * NAD27 / Iowa South
     * Extent: USA - Iowa - counties of Adair; Adams; Appanoose; Audubon; Cass; Cedar; Clarke; Clinton; Dallas; Davis;
     * Decatur; Des Moines; Fremont; Guthrie; Harrison; Henry; Iowa; Jasper; Jefferson; Johnson; Keokuk; Lee; Louisa;
     * Lucas; Madison; Mahaska; Marion; Mills; Monroe; Montgomery; Muscatine; Page; Polk; Pottawattamie; Poweshiek;
     * Ringgold; Scott; Shelby; Taylor; Union; Van Buren; Wapello; Warren; Washington; Wayne.
     */
    public const EPSG_NAD27_IOWA_SOUTH = 'urn:ogc:def:crs:EPSG::26776';

    /**
     * NAD27 / Kansas North
     * Extent: USA - Kansas - counties of Atchison; Brown; Cheyenne; Clay; Cloud; Decatur; Dickinson; Doniphan;
     * Douglas; Ellis; Ellsworth; Geary; Gove; Graham; Jackson; Jefferson; Jewell; Johnson; Leavenworth; Lincoln;
     * Logan; Marshall; Mitchell; Morris; Nemaha; Norton; Osborne; Ottawa; Phillips; Pottawatomie; Rawlins; Republic;
     * Riley; Rooks; Russell; Saline; Shawnee; Sheridan; Sherman; Smith; Thomas; Trego; Wabaunsee; Wallace; Washington;
     * Wyandotte.
     */
    public const EPSG_NAD27_KANSAS_NORTH = 'urn:ogc:def:crs:EPSG::26777';

    /**
     * NAD27 / Kansas South
     * Extent: USA - Kansas - counties of Allen; Anderson; Barber; Barton; Bourbon; Butler; Chase; Chautauqua;
     * Cherokee; Clark; Coffey; Comanche; Cowley; Crawford; Edwards; Elk; Finney; Ford; Franklin; Grant; Gray; Greeley;
     * Greenwood; Hamilton; Harper; Harvey; Haskell; Hodgeman; Kearny; Kingman; Kiowa; Labette; Lane; Linn; Lyon;
     * Marion; McPherson; Meade; Miami; Montgomery; Morton; Neosho; Ness; Osage; Pawnee; Pratt; Reno; Rice; Rush;
     * Scott; Sedgwick; Seward; Stafford; Stanton; Stevens; Sumner; Wichita; Wilson; Woodson.
     */
    public const EPSG_NAD27_KANSAS_SOUTH = 'urn:ogc:def:crs:EPSG::26778';

    /**
     * NAD27 / Kentucky North
     * Extent: USA - Kentucky - counties of Anderson; Bath; Boone; Bourbon; Boyd; Bracken; Bullitt; Campbell; Carroll;
     * Carter; Clark; Elliott; Fayette; Fleming; Franklin; Gallatin; Grant; Greenup; Harrison; Henry; Jefferson;
     * Jessamine; Kenton; Lawrence; Lewis; Mason; Menifee; Montgomery; Morgan; Nicholas; Oldham; Owen; Pendleton;
     * Robertson; Rowan; Scott; Shelby; Spencer; Trimble; Woodford.
     */
    public const EPSG_NAD27_KENTUCKY_NORTH = 'urn:ogc:def:crs:EPSG::26779';

    /**
     * NAD27 / Kentucky South
     * Extent: USA - Kentucky - counties of Adair; Allen; Ballard; Barren; Bell; Boyle; Breathitt; Breckinridge;
     * Butler; Caldwell; Calloway; Carlisle; Casey; Christian; Clay; Clinton; Crittenden; Cumberland; Daviess;
     * Edmonson; Estill; Floyd; Fulton; Garrard; Graves; Grayson; Green; Hancock; Hardin; Harlan; Hart; Henderson;
     * Hickman; Hopkins; Jackson; Johnson; Knott; Knox; Larue; Laurel; Lee; Leslie; Letcher; Lincoln; Livingston;
     * Logan; Lyon; Madison; Magoffin; Marion; Marshall; Martin; McCracken; McCreary; McLean; Meade; Mercer; Metcalfe;
     * Monroe; Muhlenberg; Nelson; Ohio; Owsley; Perry; Pike; Powell; Pulaski; Rockcastle; Russell; Simpson; Taylor;
     * Todd; Trigg; Union; Warren; Washington; Wayne; Webster; Whitley; Wolfe.
     */
    public const EPSG_NAD27_KENTUCKY_SOUTH = 'urn:ogc:def:crs:EPSG::26780';

    /**
     * NAD27 / Louisiana North
     * Extent: USA - Louisiana - counties of Avoyelles; Bienville; Bossier; Caddo; Caldwell; Catahoula; Claiborne;
     * Concordia; De Soto; East Carroll; Franklin; Grant; Jackson; La Salle; Lincoln; Madison; Morehouse; Natchitoches;
     * Ouachita; Rapides; Red River; Richland; Sabine; Tensas; Union; Vernon; Webster; West Carroll; Winn.
     */
    public const EPSG_NAD27_LOUISIANA_NORTH = 'urn:ogc:def:crs:EPSG::26781';

    /**
     * NAD27 / Louisiana Offshore
     * Extent: USA - central Gulf of Mexico outer continental shelf (GoM OCS) planning area, deep water portion
     * This system is NOT used for oil industry purposes. Use NAD27 / Louisiana South (CRS code 26782) in state waters
     * and on LA OCS shelf and NAD27 / BLM (CRS codes 32065-66) in OCS deep water protraction areas.
     */
    public const EPSG_NAD27_LOUISIANA_OFFSHORE = 'urn:ogc:def:crs:EPSG::32099';

    /**
     * NAD27 / Louisiana South
     * Extent: USA - Louisiana - counties of Acadia; Allen; Ascension; Assumption; Beauregard; Calcasieu; Cameron; East
     * Baton Rouge; East Feliciana; Evangeline; Iberia; Iberville; Jefferson; Jefferson Davis; Lafayette; LaFourche;
     * Livingston; Orleans; Plaquemines; Pointe Coupee; St Bernard; St Charles; St Helena; St James; St John the
     * Baptist; St Landry; St Martin; St Mary; St Tammany; Tangipahoa; Terrebonne; Vermilion; Washington; West Baton
     * Rouge; West Feliciana. Also Gulf of Mexico outer continental shelf (GoM OCS) protraction areas Sabine Pass (LA);
     * West Cameron; East Cameron; Vermilion; South Marsh Island; Eugene Island; Ship Shoal; South Pelto; Bay Marchand;
     * South Timbalier; Grand Isle; West Delta; South Pass; Main Pass; Breton Sound; Chandeleur.
     */
    public const EPSG_NAD27_LOUISIANA_SOUTH = 'urn:ogc:def:crs:EPSG::26782';

    /**
     * NAD27 / MTM zone 1
     * Extent: Canada - Newfoundland - onshore east of 54°30'W.
     */
    public const EPSG_NAD27_MTM_ZONE_1 = 'urn:ogc:def:crs:EPSG::32081';

    /**
     * NAD27 / MTM zone 10
     * Extent: Canada - Ontario - between 81°W and 78°W: south of 46°N in area to west of 80°15'W, south of 47°N
     * in area between 80°15'W and 79°30'W, entire province between 79°30'W and 78°W
     * Large and medium scale topographic mapping and engineering survey within City of Toronto.
     */
    public const EPSG_NAD27_MTM_ZONE_10 = 'urn:ogc:def:crs:EPSG::7991';

    /**
     * NAD27 / MTM zone 2
     * Extent: Canada - Newfoundland and Labrador between 57°30'W and 54°30'W.
     */
    public const EPSG_NAD27_MTM_ZONE_2 = 'urn:ogc:def:crs:EPSG::32082';

    /**
     * NAD27 / MTM zone 3
     * Extent: Canada - Newfoundland west of 57°30'W.
     */
    public const EPSG_NAD27_MTM_ZONE_3 = 'urn:ogc:def:crs:EPSG::32083';

    /**
     * NAD27 / MTM zone 4
     * Extent: Canada - Labrador between 63°W and 60°W.
     */
    public const EPSG_NAD27_MTM_ZONE_4 = 'urn:ogc:def:crs:EPSG::32084';

    /**
     * NAD27 / MTM zone 5
     * Extent: Canada - Labrador - 66°W to 63°W.
     */
    public const EPSG_NAD27_MTM_ZONE_5 = 'urn:ogc:def:crs:EPSG::32085';

    /**
     * NAD27 / MTM zone 6
     * Extent: Canada - Labrador - west of 66°W.
     */
    public const EPSG_NAD27_MTM_ZONE_6 = 'urn:ogc:def:crs:EPSG::32086';

    /**
     * NAD27 / MTQ Lambert
     * Extent: Canada - Quebec
     * Replaced by NAD83 / MTQ Lambert (CRS code 3798).
     */
    public const EPSG_NAD27_MTQ_LAMBERT = 'urn:ogc:def:crs:EPSG::3797';

    /**
     * NAD27 / Maine East
     * Extent: USA - Maine - counties of Aroostook; Hancock; Knox; Penobscot; Piscataquis; Waldo; Washington
     * Replaced by Maine Coordinate System of 1983.
     */
    public const EPSG_NAD27_MAINE_EAST = 'urn:ogc:def:crs:EPSG::26783';

    /**
     * NAD27 / Maine West
     * Extent: USA - Maine - counties of Androscoggin; Cumberland; Franklin; Kennebec; Lincoln; Oxford; Sagadahoc;
     * Somerset; York
     * Replaced by Maine Coordinate System of 1983.
     */
    public const EPSG_NAD27_MAINE_WEST = 'urn:ogc:def:crs:EPSG::26784';

    /**
     * NAD27 / Maryland
     * Extent: USA - Maryland - counties of Allegany; Anne Arundel; Baltimore; Calvert; Caroline; Carroll; Cecil;
     * Charles; Dorchester; Frederick; Garrett; Harford; Howard; Kent; Montgomery; Prince Georges; Queen Annes;
     * Somerset; St Marys; Talbot; Washington; Wicomico; Worcester.
     */
    public const EPSG_NAD27_MARYLAND = 'urn:ogc:def:crs:EPSG::26785';

    /**
     * NAD27 / Massachusetts Island
     * Extent: USA - Massachusetts offshore - counties of Dukes; Nantucket.
     */
    public const EPSG_NAD27_MASSACHUSETTS_ISLAND = 'urn:ogc:def:crs:EPSG::26787';

    /**
     * NAD27 / Massachusetts Mainland
     * Extent: USA - Massachusetts onshore - counties of Barnstable; Berkshire; Bristol; Essex; Franklin; Hampden;
     * Hampshire; Middlesex; Norfolk; Plymouth; Suffolk; Worcester.
     */
    public const EPSG_NAD27_MASSACHUSETTS_MAINLAND = 'urn:ogc:def:crs:EPSG::26786';

    /**
     * NAD27 / Michigan Central
     * Extent: USA - Michigan - counties of Alcona; Alpena; Antrim; Arenac; Benzie; Charlevoix; Cheboygan; Clare;
     * Crawford; Emmet; Gladwin; Grand Traverse; Iosco; Kalkaska; Lake; Leelanau; Manistee; Mason; Missaukee;
     * Montmorency; Ogemaw; Osceola; Oscoda; Otsego; Presque Isle; Roscommon; Wexford
     * From 1964 this Lambert Conic Conformal (LCC) zone replaces the northern parts of the Transverse Mercator (TM)
     * NAD27 / Michigan East and Old Central zones (CRS codes 5623 and 5624).
     */
    public const EPSG_NAD27_MICHIGAN_CENTRAL = 'urn:ogc:def:crs:EPSG::6201';

    /**
     * NAD27 / Michigan East
     * Extent: USA - Michigan - counties of Alcona; Alpena; Arenac; Bay; Cheboygan; Chippewa; Clinton; Crawford;
     * Genesee; Gladwin; Gratiot; Hillsdale; Huron; Ingham; Iosco; Jackson; Lapeer; Lenawee; Livingston; Macomb;
     * Midland; Monroe; Montmorency; Oakland; Ogemaw; Oscoda; Otsego; Presque Isle; Roscommon; Saginaw; Sanilac;
     * Shiawassee; St Clair; Tuscola; Washtenaw; Wayne
     * Introduced 1934. After 1964, this Transverse Mercator (TM) zone replaced by NAD27 / Michigan Central and NAD27 /
     * Michigan South Lambert Conic Conformal (LCC) zones (CRS codes 6201 and 6202).
     */
    public const EPSG_NAD27_MICHIGAN_EAST = 'urn:ogc:def:crs:EPSG::5623';

    /**
     * NAD27 / Michigan North
     * Extent: USA - Michigan north of approximately 45°45'N - counties of Alger; Baraga; Chippewa; Delta; Dickinson;
     * Gogebic; Houghton; Iron; Keweenaw; Luce; Mackinac; Marquette; Menominee; Ontonagon; Schoolcraft
     * From 1964 this Lambert Conic Conformal (LCC) zone replaces the NAD27 / Michigan West Transverse Mercator (TM)
     * zone (CRS code 5625).
     */
    public const EPSG_NAD27_MICHIGAN_NORTH = 'urn:ogc:def:crs:EPSG::6966';

    /**
     * NAD27 / Michigan Old Central
     * Extent: USA - Michigan - counties of Alger; Allegan; Antrim; Barry; Benzie; Berrien; Branch; Calhoun; Cass;
     * Charlevoix; Clare; Delta; Eaton; Emmet; Grand Traverse; Ionia; Isabella; Kalamazoo; Kalkaska; Kent; Lake;
     * Leelanau; Luce; Mackinac; Manistee; Mason; Mecosta; Missaukee; Montcalm; Muskegon; Newaygo; Oceana; Osceola;
     * Ottawa; St Joseph; Schoolcraft; Van Buren; Wexford
     * Introduced 1934. After 1964, this TM zone replaced by NAD27 / Michigan North, Central and South Lambert (LCC)
     * zones (CRS codes 6966, 6201 and 6202); the NW islands area to the North zone, remainder of this zone split
     * between the Central and South zones.
     */
    public const EPSG_NAD27_MICHIGAN_OLD_CENTRAL = 'urn:ogc:def:crs:EPSG::5624';

    /**
     * NAD27 / Michigan South
     * Extent: USA - Michigan - counties of Allegan; Barry; Bay; Berrien; Branch; Calhoun; Cass; Clinton; Eaton;
     * Genesee; Gratiot; Hillsdale; Huron; Ingham; Ionia; Isabella; Jackson; Kalamazoo; Kent; Lapeer; Lenawee;
     * Livingston; Macomb; Mecosta; Midland; Monroe; Montcalm; Muskegon; Newaygo; Oakland; Oceana; Ottawa; Saginaw;
     * Sanilac; Shiawassee; St Clair; St Joseph; Tuscola; Van Buren; Washtenaw; Wayne
     * From 1964 this Lambert Conic Conformal (LCC) zone replaces the southern parts of the Transverse Mercator (TM)
     * NAD27 / Michigan East and Old Central zones (CRS codes 5623 and 5624).
     */
    public const EPSG_NAD27_MICHIGAN_SOUTH = 'urn:ogc:def:crs:EPSG::6202';

    /**
     * NAD27 / Michigan West
     * Extent: USA - Michigan - counties of Baraga; Dickinson; Gogebic; Houghton; Iron; Keweenaw; Marquette; Menominee;
     * Ontonagon
     * Introduced 1934. After 1964, this Transverse Mercator (TM) zone replaced by NAD27 / Michigan North Lambert Conic
     * Conformal (LCC) zone (CRS code 6966).
     */
    public const EPSG_NAD27_MICHIGAN_WEST = 'urn:ogc:def:crs:EPSG::5625';

    /**
     * NAD27 / Minnesota Central
     * Extent: USA - Minnesota - counties of Aitkin; Becker; Benton; Carlton; Cass; Chisago; Clay; Crow Wing; Douglas;
     * Grant; Hubbard; Isanti; Kanabec; Mille Lacs; Morrison; Otter Tail; Pine; Pope; Stearns; Stevens; Todd; Traverse;
     * Wadena; Wilkin.
     */
    public const EPSG_NAD27_MINNESOTA_CENTRAL = 'urn:ogc:def:crs:EPSG::26792';

    /**
     * NAD27 / Minnesota North
     * Extent: USA - Minnesota - counties of Beltrami; Clearwater; Cook; Itasca; Kittson; Koochiching; Lake; Lake of
     * the Woods; Mahnomen; Marshall; Norman; Pennington; Polk; Red Lake; Roseau; St Louis.
     */
    public const EPSG_NAD27_MINNESOTA_NORTH = 'urn:ogc:def:crs:EPSG::26791';

    /**
     * NAD27 / Minnesota South
     * Extent: USA - Minnesota - counties of Anoka; Big Stone; Blue Earth; Brown; Carver; Chippewa; Cottonwood; Dakota;
     * Dodge; Faribault; Fillmore; Freeborn; Goodhue; Hennepin; Houston; Jackson; Kandiyohi; Lac Qui Parle; Le Sueur;
     * Lincoln; Lyon; Martin; McLeod; Meeker; Mower; Murray; Nicollet; Nobles; Olmsted; Pipestone; Ramsey; Redwood;
     * Renville; Rice; Rock; Scott; Sherburne; Sibley; Steele; Swift; Wabasha; Waseca; Washington; Watonwan; Winona;
     * Wright; Yellow Medicine.
     */
    public const EPSG_NAD27_MINNESOTA_SOUTH = 'urn:ogc:def:crs:EPSG::26793';

    /**
     * NAD27 / Mississippi East
     * Extent: USA - Mississippi - counties of Alcorn; Attala; Benton; Calhoun; Chickasaw; Choctaw; Clarke; Clay;
     * Covington; Forrest; George; Greene; Hancock; Harrison; Itawamba; Jackson; Jasper; Jones; Kemper; Lafayette;
     * Lamar; Lauderdale; Leake; Lee; Lowndes; Marshall; Monroe; Neshoba; Newton; Noxubee; Oktibbeha; Pearl River;
     * Perry; Pontotoc; Prentiss; Scott; Smith; Stone; Tippah; Tishomingo; Union; Wayne; Webster; Winston.
     */
    public const EPSG_NAD27_MISSISSIPPI_EAST = 'urn:ogc:def:crs:EPSG::26794';

    /**
     * NAD27 / Mississippi West
     * Extent: USA - Mississippi - counties of Adams; Amite; Bolivar; Carroll; Claiborne; Coahoma; Copiah; De Soto;
     * Franklin; Grenada; Hinds; Holmes; Humphreys; Issaquena; Jefferson; Jefferson Davis; Lawrence; Leflore; Lincoln;
     * Madison; Marion; Montgomery; Panola; Pike; Quitman; Rankin; Sharkey; Simpson; Sunflower; Tallahatchie; Tate;
     * Tunica; Walthall; Warren; Washington; Wilkinson; Yalobusha; Yazoo.
     */
    public const EPSG_NAD27_MISSISSIPPI_WEST = 'urn:ogc:def:crs:EPSG::26795';

    /**
     * NAD27 / Missouri Central
     * Extent: USA - Missouri - counties of Adair; Audrain; Benton; Boone; Callaway; Camden; Carroll; Chariton;
     * Christian; Cole; Cooper; Dallas; Douglas; Greene; Grundy; Hickory; Howard; Howell; Knox; Laclede; Linn;
     * Livingston; Macon; Maries; Mercer; Miller; Moniteau; Monroe; Morgan; Osage; Ozark; Pettis; Phelps; Polk;
     * Pulaski; Putnam; Randolph; Saline; Schuyler; Scotland; Shelby; Stone; Sullivan; Taney; Texas; Webster; Wright.
     */
    public const EPSG_NAD27_MISSOURI_CENTRAL = 'urn:ogc:def:crs:EPSG::26797';

    /**
     * NAD27 / Missouri East
     * Extent: USA - Missouri - counties of Bollinger; Butler; Cape Girardeau; Carter; Clark; Crawford; Dent; Dunklin;
     * Franklin; Gasconade; Iron; Jefferson; Lewis; Lincoln; Madison; Marion; Mississippi; Montgomery; New Madrid;
     * Oregon; Pemiscot; Perry; Pike; Ralls; Reynolds; Ripley; Scott; Shannon; St Charles; St Francois; St Louis; Ste.
     * Genevieve; Stoddard; Warren; Washington; Wayne.
     */
    public const EPSG_NAD27_MISSOURI_EAST = 'urn:ogc:def:crs:EPSG::26796';

    /**
     * NAD27 / Missouri West
     * Extent: USA - Missouri - counties of Andrew; Atchison; Barry; Barton; Bates; Buchanan; Caldwell; Cass; Cedar;
     * Clay; Clinton; Dade; Daviess; De Kalb; Gentry; Harrison; Henry; Holt; Jackson; Jasper; Johnson; Lafayette;
     * Lawrence; McDonald; Newton; Nodaway; Platte; Ray; St Clair; Vernon; Worth.
     */
    public const EPSG_NAD27_MISSOURI_WEST = 'urn:ogc:def:crs:EPSG::26798';

    /**
     * NAD27 / Montana Central
     * Extent: USA - Montana - counties of Cascade; Dawson; Fergus; Garfield; Judith Basin; Lake; Lewis and Clark;
     * McCone; Meagher; Mineral; Missoula; Petroleum; Powell; Prairie; Richland; Sanders; Wibaux.
     */
    public const EPSG_NAD27_MONTANA_CENTRAL = 'urn:ogc:def:crs:EPSG::32002';

    /**
     * NAD27 / Montana North
     * Extent: USA - Montana north of approximately 47°50'N - counties of Blaine; Chouteau; Daniels; Flathead;
     * Glacier; Hill; Liberty; Lincoln; Phillips; Pondera; Roosevelt; Sheridan; Teton; Toole; Valley.
     */
    public const EPSG_NAD27_MONTANA_NORTH = 'urn:ogc:def:crs:EPSG::32001';

    /**
     * NAD27 / Montana South
     * Extent: USA - Montana - counties of Beaverhead; Big Horn; Broadwater; Carbon; Carter; Custer; Deer Lodge;
     * Fallon; Gallatin; Golden Valley; Granite; Jefferson; Madison; Musselshell; Park; Powder River; Ravalli; Rosebud;
     * Silver Bow; Stillwater; Sweet Grass; Treasure; Wheatland; Yellowstone.
     */
    public const EPSG_NAD27_MONTANA_SOUTH = 'urn:ogc:def:crs:EPSG::32003';

    /**
     * NAD27 / Nebraska North
     * Extent: USA - Nebraska - counties of Antelope; Blaine; Box Butte; Boyd; Brown; Burt; Cedar; Cherry; Cuming;
     * Dakota; Dawes; Dixon; Garfield; Grant; Holt; Hooker; Keya Paha; Knox; Loup; Madison; Pierce; Rock; Sheridan;
     * Sioux; Stanton; Thomas; Thurston; Wayne; Wheeler.
     */
    public const EPSG_NAD27_NEBRASKA_NORTH = 'urn:ogc:def:crs:EPSG::32005';

    /**
     * NAD27 / Nebraska South
     * Extent: USA - Nebraska - counties of Adams; Arthur; Banner; Boone; Buffalo; Butler; Cass; Chase; Cheyenne; Clay;
     * Colfax; Custer; Dawson; Deuel; Dodge; Douglas; Dundy; Fillmore; Franklin; Frontier; Furnas; Gage; Garden;
     * Gosper; Greeley; Hall; Hamilton; Harlan; Hayes; Hitchcock; Howard; Jefferson; Johnson; Kearney; Keith; Kimball;
     * Lancaster; Lincoln; Logan; McPherson; Merrick; Morrill; Nance; Nemaha; Nuckolls; Otoe; Pawnee; Perkins; Phelps;
     * Platte; Polk; Red Willow; Richardson; Saline; Sarpy; Saunders; Scotts Bluff; Seward; Sherman; Thayer; Valley;
     * Washington; Webster; York.
     */
    public const EPSG_NAD27_NEBRASKA_SOUTH = 'urn:ogc:def:crs:EPSG::32006';

    /**
     * NAD27 / Nevada Central
     * Extent: USA - Nevada - counties of Lander; Nye.
     */
    public const EPSG_NAD27_NEVADA_CENTRAL = 'urn:ogc:def:crs:EPSG::32008';

    /**
     * NAD27 / Nevada East
     * Extent: USA - Nevada - counties of Clark; Elko; Eureka; Lincoln; White Pine.
     */
    public const EPSG_NAD27_NEVADA_EAST = 'urn:ogc:def:crs:EPSG::32007';

    /**
     * NAD27 / Nevada West
     * Extent: USA - Nevada - counties of Churchill; Douglas; Esmeralda; Humboldt; Lyon; Mineral; Pershing; Storey;
     * Washoe.
     */
    public const EPSG_NAD27_NEVADA_WEST = 'urn:ogc:def:crs:EPSG::32009';

    /**
     * NAD27 / New Brunswick Stereographic (NAD27)
     * Extent: Canada - New Brunswick
     * In use until 1979 when replaced by ATS77 / NB Stereographic (CRS code 2200).
     */
    public const EPSG_NAD27_NEW_BRUNSWICK_STEREOGRAPHIC_NAD27 = 'urn:ogc:def:crs:EPSG::5588';

    /**
     * NAD27 / New Hampshire
     * Extent: USA - New Hampshire - counties of Belknap; Carroll; Cheshire; Coos; Grafton; Hillsborough; Merrimack;
     * Rockingham; Strafford; Sullivan.
     */
    public const EPSG_NAD27_NEW_HAMPSHIRE = 'urn:ogc:def:crs:EPSG::32010';

    /**
     * NAD27 / New Jersey
     * Extent: USA - New Jersey - counties of Atlantic; Bergen; Burlington; Camden; Cape May; Cumberland; Essex;
     * Gloucester; Hudson; Hunterdon; Mercer; Middlesex; Monmouth; Morris; Ocean; Passaic; Salem; Somerset; Sussex;
     * Union; Warren.
     */
    public const EPSG_NAD27_NEW_JERSEY = 'urn:ogc:def:crs:EPSG::32011';

    /**
     * NAD27 / New Mexico Central
     * Extent: USA - New Mexico - counties of Bernalillo; Dona Ana; Lincoln; Los Alamos; Otero; Rio Arriba; Sandoval;
     * Santa Fe; Socorro; Taos; Torrance.
     */
    public const EPSG_NAD27_NEW_MEXICO_CENTRAL = 'urn:ogc:def:crs:EPSG::32013';

    /**
     * NAD27 / New Mexico East
     * Extent: USA - New Mexico - counties of Chaves; Colfax; Curry; De Baca; Eddy; Guadalupe; Harding; Lea; Mora;
     * Quay; Roosevelt; San Miguel; Union.
     */
    public const EPSG_NAD27_NEW_MEXICO_EAST = 'urn:ogc:def:crs:EPSG::32012';

    /**
     * NAD27 / New Mexico West
     * Extent: USA - New Mexico - counties of Catron; Cibola; Grant; Hidalgo; Luna; McKinley; San Juan; Sierra;
     * Valencia.
     */
    public const EPSG_NAD27_NEW_MEXICO_WEST = 'urn:ogc:def:crs:EPSG::32014';

    /**
     * NAD27 / New York Central
     * Extent: USA - New York - counties of Broome; Cayuga; Chemung; Chenango; Cortland; Jefferson; Lewis; Madison;
     * Oneida; Onondaga; Ontario; Oswego; Schuyler; Seneca; Steuben; Tioga; Tompkins; Wayne; Yates.
     */
    public const EPSG_NAD27_NEW_YORK_CENTRAL = 'urn:ogc:def:crs:EPSG::32016';

    /**
     * NAD27 / New York East
     * Extent: USA - New York mainland - counties of Albany; Clinton; Columbia; Delaware; Dutchess; Essex; Franklin;
     * Fulton; Greene; Hamilton; Herkimer; Montgomery; Orange; Otsego; Putnam; Rensselaer; Rockland; Saratoga;
     * Schenectady; Schoharie; St Lawrence; Sullivan; Ulster; Warren; Washington; Westchester.
     */
    public const EPSG_NAD27_NEW_YORK_EAST = 'urn:ogc:def:crs:EPSG::32015';

    /**
     * NAD27 / New York Long Island
     * Extent: USA - New York - counties of Bronx; Kings; Nassau; New York; Queens; Richmond; Suffolk.
     */
    public const EPSG_NAD27_NEW_YORK_LONG_ISLAND = 'urn:ogc:def:crs:EPSG::4456';

    /**
     * NAD27 / New York West
     * Extent: USA - New York - counties of Allegany; Cattaraugus; Chautauqua; Erie; Genesee; Livingston; Monroe;
     * Niagara; Orleans; Wyoming.
     */
    public const EPSG_NAD27_NEW_YORK_WEST = 'urn:ogc:def:crs:EPSG::32017';

    /**
     * NAD27 / North Carolina
     * Extent: USA - North Carolina - counties of Alamance; Alexander; Alleghany; Anson; Ashe; Avery; Beaufort; Bertie;
     * Bladen; Brunswick; Buncombe; Burke; Cabarrus; Caldwell; Camden; Carteret; Caswell; Catawba; Chatham; Cherokee;
     * Chowan; Clay; Cleveland; Columbus; Craven; Cumberland; Currituck; Dare; Davidson; Davie; Duplin; Durham;
     * Edgecombe; Forsyth; Franklin; Gaston; Gates; Graham; Granville; Greene; Guilford; Halifax; Harnett; Haywood;
     * Henderson; Hertford; Hoke; Hyde; Iredell; Jackson; Johnston; Jones; Lee; Lenoir; Lincoln; Macon; Madison;
     * Martin; McDowell; Mecklenburg; Mitchell; Montgomery; Moore; Nash; New Hanover; Northampton; Onslow; Orange;
     * Pamlico; Pasquotank; Pender; Perquimans; Person; Pitt; Polk; Randolph; Richmond; Robeson; Rockingham; Rowan;
     * Rutherford; Sampson; Scotland; Stanly; Stokes; Surry; Swain; Transylvania; Tyrrell; Union; Vance; Wake; Warren;
     * Washington; Watauga; Wayne; Wilkes; Wilson; Yadkin; Yancey.
     */
    public const EPSG_NAD27_NORTH_CAROLINA = 'urn:ogc:def:crs:EPSG::32019';

    /**
     * NAD27 / North Dakota North
     * Extent: USA - North Dakota - counties of Benson; Bottineau; Burke; Cavalier; Divide; Eddy; Foster; Grand Forks;
     * Griggs; McHenry; McKenzie; McLean; Mountrial; Nelson; Pembina; Pierce; Ramsey; Renville; Rolette; Sheridan;
     * Steele; Towner; Traill; Walsh; Ward; Wells; Williams.
     */
    public const EPSG_NAD27_NORTH_DAKOTA_NORTH = 'urn:ogc:def:crs:EPSG::32020';

    /**
     * NAD27 / North Dakota South
     * Extent: USA - North Dakota - counties of Adams; Barnes; Billings; Bowman; Burleigh; Cass; Dickey; Dunn; Emmons;
     * Golden Valley; Grant; Hettinger; Kidder; La Moure; Logan; McIntosh; Mercer; Morton; Oliver; Ransom; Richland;
     * Sargent; Sioux; Slope; Stark; Stutsman.
     */
    public const EPSG_NAD27_NORTH_DAKOTA_SOUTH = 'urn:ogc:def:crs:EPSG::32021';

    /**
     * NAD27 / Ohio North
     * Extent: USA - Ohio - counties of Allen;Ashland; Ashtabula; Auglaize; Carroll; Columbiana; Coshocton; Crawford;
     * Cuyahoga; Defiance; Delaware; Erie; Fulton; Geauga; Hancock; Hardin; Harrison; Henry; Holmes; Huron; Jefferson;
     * Knox; Lake; Logan; Lorain; Lucas; Mahoning; Marion; Medina; Mercer; Morrow; Ottawa; Paulding; Portage; Putnam;
     * Richland; Sandusky; Seneca; Shelby; Stark; Summit; Trumbull; Tuscarawas; Union; Van Wert; Wayne; Williams; Wood;
     * Wyandot.
     */
    public const EPSG_NAD27_OHIO_NORTH = 'urn:ogc:def:crs:EPSG::32022';

    /**
     * NAD27 / Ohio South
     * Extent: USA - Ohio - counties of Adams; Athens; Belmont; Brown; Butler; Champaign; Clark; Clermont; Clinton;
     * Darke; Fairfield; Fayette; Franklin; Gallia; Greene; Guernsey; Hamilton; Highland; Hocking; Jackson; Lawrence;
     * Licking; Madison; Meigs; Miami; Monroe; Montgomery; Morgan; Muskingum; Noble; Perry; Pickaway; Pike; Preble;
     * Ross; Scioto; Vinton; Warren; Washington.
     */
    public const EPSG_NAD27_OHIO_SOUTH = 'urn:ogc:def:crs:EPSG::32023';

    /**
     * NAD27 / Oklahoma North
     * Extent: USA - Oklahoma - counties of Adair; Alfalfa; Beaver; Blaine; Canadian; Cherokee; Cimarron; Craig; Creek;
     * Custer; Delaware; Dewey; Ellis; Garfield; Grant; Harper; Kay; Kingfisher; Lincoln; Logan; Major; Mayes;
     * Muskogee; Noble; Nowata; Okfuskee; Oklahoma; Okmulgee; Osage; Ottawa; Pawnee; Payne; Roger Mills; Rogers;
     * Sequoyah; Texas; Tulsa; Wagoner; Washington; Woods; Woodward.
     */
    public const EPSG_NAD27_OKLAHOMA_NORTH = 'urn:ogc:def:crs:EPSG::32024';

    /**
     * NAD27 / Oklahoma South
     * Extent: USA - Oklahoma - counties of Atoka; Beckham; Bryan; Caddo; Carter; Choctaw; Cleveland; Coal; Comanche;
     * Cotton; Garvin; Grady; Greer; Harmon; Haskell; Hughes; Jackson; Jefferson; Johnston; Kiowa; Latimer; Le Flore;
     * Love; Marshall; McClain; McCurtain; McIntosh; Murray; Pittsburg; Pontotoc; Pottawatomie; Pushmataha; Seminole;
     * Stephens; Tillman; Washita.
     */
    public const EPSG_NAD27_OKLAHOMA_SOUTH = 'urn:ogc:def:crs:EPSG::32025';

    /**
     * NAD27 / Oregon North
     * Extent: USA - Oregon - counties of Baker; Benton; Clackamas; Clatsop; Columbia; Gilliam; Grant; Hood River;
     * Jefferson; Lincoln; Linn; Marion; Morrow; Multnomah; Polk; Sherman; Tillamook; Umatilla; Union; Wallowa; Wasco;
     * Washington; Wheeler; Yamhill.
     */
    public const EPSG_NAD27_OREGON_NORTH = 'urn:ogc:def:crs:EPSG::32026';

    /**
     * NAD27 / Oregon South
     * Extent: USA - Oregon - counties of Coos; Crook; Curry; Deschutes; Douglas; Harney; Jackson; Josephine; Klamath;
     * Lake; Lane; Malheur.
     */
    public const EPSG_NAD27_OREGON_SOUTH = 'urn:ogc:def:crs:EPSG::32027';

    /**
     * NAD27 / Pennsylvania North
     * Extent: USA - Pennsylvania - counties of Bradford; Cameron; Carbon; Centre; Clarion; Clearfield; Clinton;
     * Columbia; Crawford; Elk; Erie; Forest; Jefferson; Lackawanna; Luzerne; Lycoming; McKean; Mercer; Monroe;
     * Montour; Northumberland; Pike; Potter; Sullivan; Susquehanna; Tioga; Union; Venango; Warren; Wayne; Wyoming.
     */
    public const EPSG_NAD27_PENNSYLVANIA_NORTH = 'urn:ogc:def:crs:EPSG::32028';

    /**
     * NAD27 / Pennsylvania South
     * Extent: USA - Pennsylvania - counties of Adams; Allegheny; Armstrong; Beaver; Bedford; Berks; Blair; Bucks;
     * Butler; Cambria; Chester; Cumberland; Dauphin; Delaware; Fayette; Franklin; Fulton; Greene; Huntingdon; Indiana;
     * Juniata; Lancaster; Lawrence; Lebanon; Lehigh; Mifflin; Montgomery; Northampton; Perry; Philadelphia;
     * Schuylkill; Snyder; Somerset; Washington; Westmoreland; York.
     */
    public const EPSG_NAD27_PENNSYLVANIA_SOUTH = 'urn:ogc:def:crs:EPSG::4455';

    /**
     * NAD27 / Quebec Lambert
     * Extent: Canada - Quebec
     * Replaced by NAD27(CGQ77) / Quebec Lambert (code 2137) in 1977.
     */
    public const EPSG_NAD27_QUEBEC_LAMBERT = 'urn:ogc:def:crs:EPSG::32098';

    /**
     * NAD27 / Rhode Island
     * Extent: USA - Rhode Island - counties of Bristol; Kent; Newport; Providence; Washington.
     */
    public const EPSG_NAD27_RHODE_ISLAND = 'urn:ogc:def:crs:EPSG::32030';

    /**
     * NAD27 / Shackleford
     * Extent: USA - Texas
     * Replaced by NAD83 / TSMS. Care: survey data in Texas uses the US survey foot, not the International foot used by
     * this system.
     */
    public const EPSG_NAD27_SHACKLEFORD = 'urn:ogc:def:crs:EPSG::3080';

    /**
     * NAD27 / South Carolina North
     * Extent: USA - South Carolina - counties of Abbeville; Anderson; Calhoun; Cherokee; Chester; Chesterfield;
     * Darlington; Dillon; Edgefield; Fairfield; Florence; Greenville; Greenwood; Horry; Kershaw; Lancaster; Laurens;
     * Lee; Lexington; Marion; Marlboro; McCormick; Newberry; Oconee; Pickens; Richland; Saluda; Spartanburg; Sumter;
     * Union; York.
     */
    public const EPSG_NAD27_SOUTH_CAROLINA_NORTH = 'urn:ogc:def:crs:EPSG::32031';

    /**
     * NAD27 / South Carolina South
     * Extent: USA - South Carolina - counties of Aiken; Allendale; Bamberg; Barnwell; Beaufort; Berkeley; Charleston;
     * Clarendon; Colleton; Dorchester; Georgetown; Hampton; Jasper; Orangeburg; Williamsburg.
     */
    public const EPSG_NAD27_SOUTH_CAROLINA_SOUTH = 'urn:ogc:def:crs:EPSG::32033';

    /**
     * NAD27 / South Dakota North
     * Extent: USA - South Dakota - counties of Beadle; Brookings; Brown; Butte; Campbell; Clark; Codington; Corson;
     * Day; Deuel; Dewey; Edmunds; Faulk; Grant; Hamlin; Hand; Harding; Hyde; Kingsbury; Lawrence; Marshall; McPherson;
     * Meade; Perkins; Potter; Roberts; Spink; Sully; Walworth; Ziebach.
     */
    public const EPSG_NAD27_SOUTH_DAKOTA_NORTH = 'urn:ogc:def:crs:EPSG::32034';

    /**
     * NAD27 / South Dakota South
     * Extent: USA - South Dakota - counties of Aurora; Bennett; Bon Homme; Brule; Buffalo; Charles Mix; Clay; Custer;
     * Davison; Douglas; Fall River; Gregory; Haakon; Hanson; Hughes; Hutchinson; Jackson; Jerauld; Jones; Lake;
     * Lincoln; Lyman; McCook; Mellette; Miner; Minnehaha; Moody; Pennington; Sanborn; Shannon; Stanley; Todd; Tripp;
     * Turner; Union; Yankton.
     */
    public const EPSG_NAD27_SOUTH_DAKOTA_SOUTH = 'urn:ogc:def:crs:EPSG::32035';

    /**
     * NAD27 / Tennessee
     * Extent: USA - Tennessee - counties of Anderson; Bedford; Benton; Bledsoe; Blount; Bradley; Campbell; Cannon;
     * Carroll; Carter; Cheatham; Chester; Claiborne; Clay; Cocke; Coffee; Crockett; Cumberland; Davidson; De Kalb;
     * Decatur; Dickson; Dyer; Fayette; Fentress; Franklin; Gibson; Giles; Grainger; Greene; Grundy; Hamblen; Hamilton;
     * Hancock; Hardeman; Hardin; Hawkins; Haywood; Henderson; Henry; Hickman; Houston; Humphreys; Jackson; Jefferson;
     * Johnson; Knox; Lake; Lauderdale; Lawrence; Lewis; Lincoln; Loudon; Macon; Madison; Marion; Marshall; Maury;
     * McMinn; McNairy; Meigs; Monroe; Montgomery; Moore; Morgan; Obion; Overton; Perry; Pickett; Polk; Putnam; Rhea;
     * Roane; Robertson; Rutherford; Scott; Sequatchie; Sevier; Shelby; Smith; Stewart; Sullivan; Sumner; Tipton;
     * Trousdale; Unicoi; Union; Van Buren; Warren; Washington; Wayne; Weakley; White; Williamson; Wilson.
     */
    public const EPSG_NAD27_TENNESSEE = 'urn:ogc:def:crs:EPSG::2204';

    /**
     * NAD27 / Texas Central
     * Extent: USA - Texas - counties of Anderson; Angelina; Bastrop; Bell; Blanco; Bosque; Brazos; Brown; Burleson;
     * Burnet; Cherokee; Coke; Coleman; Comanche; Concho; Coryell; Crane; Crockett; Culberson; Ector; El Paso; Falls;
     * Freestone; Gillespie; Glasscock; Grimes; Hamilton; Hardin; Houston; Hudspeth; Irion; Jasper; Jeff Davis; Kimble;
     * Lampasas; Lee; Leon; Liberty; Limestone; Llano; Loving; Madison; Mason; McCulloch; McLennan; Menard; Midland;
     * Milam; Mills; Montgomery; Nacogdoches; Newton; Orange; Pecos; Polk; Reagan; Reeves; Robertson; Runnels; Sabine;
     * San Augustine; San Jacinto; San Saba; Schleicher; Shelby; Sterling; Sutton; Tom Green; Travis; Trinity; Tyler;
     * Upton; Walker; Ward; Washington; Williamson; Winkler.
     */
    public const EPSG_NAD27_TEXAS_CENTRAL = 'urn:ogc:def:crs:EPSG::32039';

    /**
     * NAD27 / Texas North
     * Extent: USA - Texas - counties of: Armstrong; Briscoe; Carson; Castro; Childress; Collingsworth; Dallam; Deaf
     * Smith; Donley; Gray; Hall; Hansford; Hartley; Hemphill; Hutchinson; Lipscomb; Moore; Ochiltree; Oldham; Parmer;
     * Potter; Randall; Roberts; Sherman; Swisher; Wheeler.
     */
    public const EPSG_NAD27_TEXAS_NORTH = 'urn:ogc:def:crs:EPSG::32037';

    /**
     * NAD27 / Texas North Central
     * Extent: USA - Texas - counties of: Andrews; Archer; Bailey; Baylor; Borden; Bowie; Callahan; Camp; Cass; Clay;
     * Cochran; Collin; Cooke; Cottle; Crosby; Dallas; Dawson; Delta; Denton; Dickens; Eastland; Ellis; Erath; Fannin;
     * Fisher; Floyd; Foard; Franklin; Gaines; Garza; Grayson; Gregg; Hale; Hardeman; Harrison; Haskell; Henderson;
     * Hill; Hockley; Hood; Hopkins; Howard; Hunt; Jack; Johnson; Jones; Kaufman; Kent; King; Knox; Lamar; Lamb;
     * Lubbock; Lynn; Marion; Martin; Mitchell; Montague; Morris; Motley; Navarro; Nolan; Palo Pinto; Panola; Parker;
     * Rains; Red River; Rockwall; Rusk; Scurry; Shackelford; Smith; Somervell; Stephens; Stonewall; Tarrant; Taylor;
     * Terry; Throckmorton; Titus; Upshur; Van Zandt; Wichita; Wilbarger; Wise; Wood; Yoakum; Young.
     */
    public const EPSG_NAD27_TEXAS_NORTH_CENTRAL = 'urn:ogc:def:crs:EPSG::32038';

    /**
     * NAD27 / Texas South
     * Extent: USA - Texas - counties of Brooks; Cameron; Duval; Hidalgo; Jim Hogg; Jim Wells; Kenedy; Kleberg; Nueces;
     * San Patricio; Starr; Webb; Willacy; Zapata. Gulf of Mexico outer continental shelf (GoM OCS) protraction areas:
     * South Padre Island; North Padre Island; Mustang Island.
     */
    public const EPSG_NAD27_TEXAS_SOUTH = 'urn:ogc:def:crs:EPSG::32041';

    /**
     * NAD27 / Texas South Central
     * Extent: USA - Texas - counties of Aransas; Atascosa; Austin; Bandera; Bee; Bexar; Brazoria; Brewster; Caldwell;
     * Calhoun; Chambers; Colorado; Comal; De Witt; Dimmit; Edwards; Fayette; Fort Bend; Frio; Galveston; Goliad;
     * Gonzales; Guadalupe; Harris; Hays; Jackson; Jefferson; Karnes; Kendall; Kerr; Kinney; La Salle; Lavaca; Live
     * Oak; Matagorda; Maverick; McMullen; Medina; Presidio; Real; Refugio; Terrell; Uvalde; Val Verde; Victoria;
     * Waller; Wharton; Wilson; Zavala. Gulf of Mexico outer continental shelf (GoM OCS) protraction areas: Matagorda
     * Island; Brazos; Galveston; High Island, Sabine Pass (TX).
     */
    public const EPSG_NAD27_TEXAS_SOUTH_CENTRAL = 'urn:ogc:def:crs:EPSG::32040';

    /**
     * NAD27 / US National Atlas Equal Area
     * Extent: USA
     * Uses spherical projection formulas. USGS documentation describes sphere as derived from GRS80/WGS 84 ellipsoid
     * but that actually used is Clarke 1866. For 1:1million and smaller scale maps there is no significant difference.
     */
    public const EPSG_NAD27_US_NATIONAL_ATLAS_EQUAL_AREA = 'urn:ogc:def:crs:EPSG::9311';

    /**
     * NAD27 / UTM zone 10N
     * Extent: North America - between 126°W and 120°W - onshore. Canada - British Columbia; Northwest Territories;
     * Nunavut; Yukon. USA - California; Oregon; Washington.
     */
    public const EPSG_NAD27_UTM_ZONE_10N = 'urn:ogc:def:crs:EPSG::26710';

    /**
     * NAD27 / UTM zone 11N
     * Extent: North America - between 120°W and 114°W - onshore. Canada - Alberta; British Columbia; Northwest
     * Territories; Nunavut. Mexico. USA - California; Idaho; Nevada; Oregon; Washington
     * In Mexico, replaced by Mexican Datum of 1993 / UTM zone 11N (code 4484). In Canada and USA, replaced by NAD83 /
     * UTM zone 11N (code 26911).
     */
    public const EPSG_NAD27_UTM_ZONE_11N = 'urn:ogc:def:crs:EPSG::26711';

    /**
     * NAD27 / UTM zone 12N
     * Extent: North America - between 114°W and 108°W. Canada - Alberta; Northwest Territories; Nunavut;
     * Saskatchewan. Mexico. USA - Arizona; Colorado; Idaho; Montana; New Mexico; Utah; Wyoming. Onshore for Mexican
     * Pacific and Canadian Arctic coasts
     * In Mexico, replaced by Mexican Datum of 1993 / UTM zone 12N (code 4485). In Canada and USA, replaced by NAD83 /
     * UTM zone 12N (code 26912).
     */
    public const EPSG_NAD27_UTM_ZONE_12N = 'urn:ogc:def:crs:EPSG::26712';

    /**
     * NAD27 / UTM zone 13N
     * Extent: North America - between 108°W and 102°W. Canada - Northwest Territories; Nunavut; Saskatchewan.
     * Mexico. USA - Colorado; Montana; Nebraska; New Mexico; North Dakota; Oklahoma; South Dakota; Texas; Wyoming.
     * Onshore for Mexican Pacific and Canadian Arctic coasts
     * In Mexico, replaced by Mexican Datum of 1993 / UTM zone 13N (code 4484). In Canada and USA, replaced by NAD83 /
     * UTM zone 13N (code 26913).
     */
    public const EPSG_NAD27_UTM_ZONE_13N = 'urn:ogc:def:crs:EPSG::26713';

    /**
     * NAD27 / UTM zone 14N
     * Extent: North America - between 102°W and 96°W. Canada - Manitoba; Nunavut; Saskatchewan. Mexico. USA - Iowa;
     * Kansas; Minnesota; Nebraska; North Dakota; Oklahoma; South Dakota; Texas. Onshore for Mexican Pacific coast and
     * Canadian Arctic but for US & Mexico Gulf of Mexico and Caribbean coasts
     * See NAD27 / BLM 14N (ftUS) (code 32064) for non-metric equivalent used in US Gulf of Mexico. In Mexico, replaced
     * by Mexicand Datum of 1993 / UTM zone 14N (code 4487). In Canada and USA, replaced by NAD83 / UTM zone 14N (code
     * 26914).
     */
    public const EPSG_NAD27_UTM_ZONE_14N = 'urn:ogc:def:crs:EPSG::26714';

    /**
     * NAD27 / UTM zone 15N
     * Extent: North America - between 96°W and 90°W. Canada - Manitoba; Nunavut; Ontario. Guatemala. Mexico. USA -
     * Arkansas; Illinois; Iowa; Kansas; Louisiana; Michigan; Minnesota; Mississippi; Missouri; Nebraska; Oklahoma;
     * Tennessee; Texas; Wisconsin. Onshore for Canadian Arctic and Central America,  for Gulf of Mexico (both US and
     * Mexican sectors)
     * Replaced by NAD27(76) / UTM 15N (code 2027) in Ontario, by NAD83 / UTM 15N (code 26915) elsewhere in Canada &
     * USA, & by Mexican Datum of 1993 / UTM 15N (code 4488) in Mexico. See NAD27 / BLM 15N (ftUS) (code 32065) for
     * ftUS equivalent used in US GoM.
     */
    public const EPSG_NAD27_UTM_ZONE_15N = 'urn:ogc:def:crs:EPSG::26715';

    /**
     * NAD27 / UTM zone 16N
     * Extent: North America - between 90°W and 84°W. Belize. Canada - Manitoba; Nunavut; Ontario. Costa Rica. Cuba.
     * El Salvador. Guatemala. Honduras. Mexico. Nicaragua. USA - Alabama; Arkansas; Florida; Georgia; Indiana;
     * Illinois; Kentucky; Louisiana; Michigan; Minnesota; Mississippi; Missouri; North Carolina; Ohio; Tennessee;
     * Wisconsin. Onshore for Canadian Arctic and Central America,  for Cuba and Gulf of Mexico (both US and Mexican
     * sectors)
     * Replaced by NAD27(76) / UTM 16N (code 2028) in Ontario, by NAD83 / UTM 16N (code 26916) elsewhere in Canada and
     * USA, and by Mexican Datum of 1993 / UTM 16N (code 4489) in Mexico. See NAD27 / BLM 16N (ftUS) (code 32066) for
     * ftUS equivalent used in US GoM.
     */
    public const EPSG_NAD27_UTM_ZONE_16N = 'urn:ogc:def:crs:EPSG::26716';

    /**
     * NAD27 / UTM zone 17N
     * Extent: North America - between 84°W and 78°W. Bahamas. Canada - Nunavut; Ontario; Quebec. Costa Rica. Cuba.
     * Honduras. Nicaragua. USA - Florida; Georgia; Kentucky; Maryland; Michigan; New York; North Carolina; Ohio;
     * Pennsylvania; South Carolina; Tennessee; Virginia; West Virginia. Onshore for Canadian Arctic. for US east coast
     * and Cuba, with usage in Bahamas onshore plus offshore over internal continental shelf only
     * In Ontario replaced by NAD27(76) / UTM zone 17N (code 2029). In Quebec replaced by NAD27(CGQ77) / UTM zone 17N
     * (code 2031). See NAD27 / BLM 17N (ftUS) (code 32067) for non-metric equivalent used in US Gulf of Mexico.
     */
    public const EPSG_NAD27_UTM_ZONE_17N = 'urn:ogc:def:crs:EPSG::26717';

    /**
     * NAD27 / UTM zone 18N
     * Extent: North America - between 78°W and 72°W. Bahamas. Canada - Nunavut; Ontario; Quebec. Cuba. USA -
     * Connecticut; Delaware; Maryland; Massachusetts; New Hampshire; New Jersey; New York; North Carolina;
     * Pennsylvania; Virginia; Vermont. Onshore for Canadian arctic. for US east coast and Cuba, with usage in Bahamas
     * onshore plus offshore over internal continental shelf only
     * In Ontario replaced by NAD27(76) / UTM zone 18N (code 2030). In Quebec replaced by NAD27(CGQ77) / UTM zone 18N
     * (code 2032).
     */
    public const EPSG_NAD27_UTM_ZONE_18N = 'urn:ogc:def:crs:EPSG::26718';

    /**
     * NAD27 / UTM zone 19N
     * Extent: North America - between 72°W and 66°W. Canada - New Brunswick; Labrador; Nunavut; Nova Scotia; Quebec.
     * USA - Connecticut; Maine; Massachusetts; New Hampshire; New York (Long Island); Rhode Island; Vermont. Onshore
     * and offshore for US and Canadian east coasts
     * In Quebec replaced by NAD27(CGQ77) / UTM zone 19N (code 2033).
     */
    public const EPSG_NAD27_UTM_ZONE_19N = 'urn:ogc:def:crs:EPSG::26719';

    /**
     * NAD27 / UTM zone 1N
     * Extent: USA - between 180°W and 174°W - Alaska and offshore continental shelf (OCS).
     */
    public const EPSG_NAD27_UTM_ZONE_1N = 'urn:ogc:def:crs:EPSG::26701';

    /**
     * NAD27 / UTM zone 20N
     * Extent: North America - between 66°W and 60°W. Canada - New Brunswick; Labrador; Nova Scotia; Nunavut; Prince
     * Edward Island; Quebec. USA offshore Atlantic
     * In Quebec replaced by NAD27(CGQ77) / UTM zone 20N (code 2034).
     */
    public const EPSG_NAD27_UTM_ZONE_20N = 'urn:ogc:def:crs:EPSG::26720';

    /**
     * NAD27 / UTM zone 21N
     * Extent: Canada between 60°W and 54°W, - Newfoundland and Labrador; Quebec
     * In Quebec replaced by NAD27(CGQ77) / UTM zone 21N (code 2035).
     */
    public const EPSG_NAD27_UTM_ZONE_21N = 'urn:ogc:def:crs:EPSG::26721';

    /**
     * NAD27 / UTM zone 22N
     * Extent: Canada between 54°W and 48°W - Newfoundland and Labrador.
     */
    public const EPSG_NAD27_UTM_ZONE_22N = 'urn:ogc:def:crs:EPSG::26722';

    /**
     * NAD27 / UTM zone 2N
     * Extent: USA - between 174°W and 168°W - Alaska and offshore continental shelf (OCS).
     */
    public const EPSG_NAD27_UTM_ZONE_2N = 'urn:ogc:def:crs:EPSG::26702';

    /**
     * NAD27 / UTM zone 3N
     * Extent: USA - between 168°W and 162°W - Alaska and offshore continental shelf (OCS).
     */
    public const EPSG_NAD27_UTM_ZONE_3N = 'urn:ogc:def:crs:EPSG::26703';

    /**
     * NAD27 / UTM zone 4N
     * Extent: USA - between 162°W and 156°W - Alaska and offshore continental shelf (OCS).
     */
    public const EPSG_NAD27_UTM_ZONE_4N = 'urn:ogc:def:crs:EPSG::26704';

    /**
     * NAD27 / UTM zone 59N
     * Extent: USA - west of 174°E. Alaska and offshore continental shelf (OCS).
     */
    public const EPSG_NAD27_UTM_ZONE_59N = 'urn:ogc:def:crs:EPSG::3370';

    /**
     * NAD27 / UTM zone 5N
     * Extent: USA - between 156°W and 150°W - Alaska and offshore continental shelf (OCS).
     */
    public const EPSG_NAD27_UTM_ZONE_5N = 'urn:ogc:def:crs:EPSG::26705';

    /**
     * NAD27 / UTM zone 60N
     * Extent: USA - between 174°E and 180°E - Alaska and offshore continental shelf (OCS).
     */
    public const EPSG_NAD27_UTM_ZONE_60N = 'urn:ogc:def:crs:EPSG::3371';

    /**
     * NAD27 / UTM zone 6N
     * Extent: USA - between 150°W and 144°W - Alaska and offshore continental shelf (OCS).
     */
    public const EPSG_NAD27_UTM_ZONE_6N = 'urn:ogc:def:crs:EPSG::26706';

    /**
     * NAD27 / UTM zone 7N
     * Extent: North America - between 144°W and 138°W. Canada - British Columbia; Yukon. USA - Alaska. Onshore for
     * western Canada & but for Alaska.
     */
    public const EPSG_NAD27_UTM_ZONE_7N = 'urn:ogc:def:crs:EPSG::26707';

    /**
     * NAD27 / UTM zone 8N
     * Extent: North America - between 138°W and 132°W - onshore. Canada - British Columbia; Northwest Territiories;
     * Yukon. USA - Alaska. Onshore for Canadian British Columbia & Arctic and for US Pacific coast including Alaska
     * panhandle.
     */
    public const EPSG_NAD27_UTM_ZONE_8N = 'urn:ogc:def:crs:EPSG::26708';

    /**
     * NAD27 / UTM zone 9N
     * Extent: North America - between 132°W and 126°W - onshore. Canada - British Columbia; Northwest Territories;
     * Yukon. USA - Alaska. Onshore for Canadian British Colombia & Arctic coasts and for the US Pacific coast
     * including Alaska panhandle.
     */
    public const EPSG_NAD27_UTM_ZONE_9N = 'urn:ogc:def:crs:EPSG::26709';

    /**
     * NAD27 / Utah Central
     * Extent: USA - Utah - counties of Carbon; Duchesne; Emery; Grand; Juab; Millard; Salt Lake; Sanpete; Sevier;
     * Tooele; Uintah; Utah; Wasatch.
     */
    public const EPSG_NAD27_UTAH_CENTRAL = 'urn:ogc:def:crs:EPSG::32043';

    /**
     * NAD27 / Utah North
     * Extent: USA - Utah - counties of Box Elder; Cache; Daggett; Davis; Morgan; Rich; Summit; Weber.
     */
    public const EPSG_NAD27_UTAH_NORTH = 'urn:ogc:def:crs:EPSG::32042';

    /**
     * NAD27 / Utah South
     * Extent: USA - Utah - counties of Beaver; Garfield; Iron; Kane; Piute; San Juan; Washington; Wayne.
     */
    public const EPSG_NAD27_UTAH_SOUTH = 'urn:ogc:def:crs:EPSG::32044';

    /**
     * NAD27 / Vermont
     * Extent: USA - Vermont - counties of Addison; Bennington; Caledonia; Chittenden; Essex; Franklin; Grand Isle;
     * Lamoille; Orange; Orleans; Rutland; Washington; Windham; Windsor.
     */
    public const EPSG_NAD27_VERMONT = 'urn:ogc:def:crs:EPSG::32045';

    /**
     * NAD27 / Virginia North
     * Extent: USA - Virginia - counties of Arlington; Augusta; Bath; Caroline; Clarke; Culpeper; Fairfax; Fauquier;
     * Frederick; Greene; Highland; King George; Loudoun; Madison; Orange; Page; Prince William; Rappahannock;
     * Rockingham; Shenandoah; Spotsylvania; Stafford; Warren; Westmoreland.
     */
    public const EPSG_NAD27_VIRGINIA_NORTH = 'urn:ogc:def:crs:EPSG::32046';

    /**
     * NAD27 / Virginia South
     * Extent: USA - Virginia - counties of Accomack; Albemarle; Alleghany; Amelia; Amherst; Appomattox; Bedford;
     * Bland; Botetourt; Bristol; Brunswick; Buchanan; Buckingham; Campbell; Carroll; Charles City; Charlotte;
     * Chesapeake; Chesterfield; Colonial Heights; Craig; Cumberland; Dickenson; Dinwiddie; Essex; Floyd; Fluvanna;
     * Franklin; Giles; Gloucester; Goochland; Grayson; Greensville; Halifax; Hampton; Hanover; Henrico; Henry; Isle of
     * Wight; James City; King and Queen; King William; Lancaster; Lee; Louisa; Lunenburg; Lynchburg; Mathews;
     * Mecklenburg; Middlesex; Montgomery; Nelson; New Kent; Newport News; Norfolk; Northampton; Northumberland;
     * Norton; Nottoway; Patrick; Petersburg; Pittsylvania; Portsmouth; Powhatan; Prince Edward; Prince George;
     * Pulaski; Richmond; Roanoke; Rockbridge; Russell; Scott; Smyth; Southampton; Suffolk; Surry; Sussex; Tazewell;
     * Washington; Wise; Wythe; York.
     */
    public const EPSG_NAD27_VIRGINIA_SOUTH = 'urn:ogc:def:crs:EPSG::32047';

    /**
     * NAD27 / Washington North
     * Extent: USA - Washington - counties of Chelan; Clallam; Douglas; Ferry; Island; Jefferson; King; Kitsap;
     * Lincoln; Okanogan; Pend Oreille; San Juan; Skagit; Snohomish; Spokane; Stevens; Whatcom.
     */
    public const EPSG_NAD27_WASHINGTON_NORTH = 'urn:ogc:def:crs:EPSG::32048';

    /**
     * NAD27 / Washington South
     * Extent: USA - Washington - counties of Adams; Asotin; Benton; Clark; Columbia; Cowlitz; Franklin; Garfield;
     * Grant; Grays Harbor; Kittitas; Klickitat; Lewis; Mason; Pacific; Pierce; Skamania; Thurston; Wahkiakum; Walla
     * Walla; Whitman; Yakima.
     */
    public const EPSG_NAD27_WASHINGTON_SOUTH = 'urn:ogc:def:crs:EPSG::32049';

    /**
     * NAD27 / West Virginia North
     * Extent: USA - West Virginia - counties of Barbour; Berkeley; Brooke; Doddridge; Grant; Hampshire; Hancock;
     * Hardy; Harrison; Jefferson; Marion; Marshall; Mineral; Monongalia; Morgan; Ohio; Pleasants; Preston; Ritchie;
     * Taylor; Tucker; Tyler; Wetzel; Wirt; Wood.
     */
    public const EPSG_NAD27_WEST_VIRGINIA_NORTH = 'urn:ogc:def:crs:EPSG::32050';

    /**
     * NAD27 / West Virginia South
     * Extent: USA - West Virginia - counties of Boone; Braxton; Cabell; Calhoun; Clay; Fayette; Gilmer; Greenbrier;
     * Jackson; Kanawha; Lewis; Lincoln; Logan; Mason; McDowell; Mercer; Mingo; Monroe; Nicholas; Pendleton;
     * Pocahontas; Putnam; Raleigh; Randolph; Roane; Summers; Upshur; Wayne; Webster; Wyoming.
     */
    public const EPSG_NAD27_WEST_VIRGINIA_SOUTH = 'urn:ogc:def:crs:EPSG::32051';

    /**
     * NAD27 / Wisconsin Central
     * Extent: USA - Wisconsin - counties of Barron; Brown; Buffalo; Chippewa; Clark; Door; Dunn; Eau Claire; Jackson;
     * Kewaunee; Langlade; Lincoln; Marathon; Marinette; Menominee; Oconto; Outagamie; Pepin; Pierce; Polk; Portage;
     * Rusk; Shawano; St Croix; Taylor; Trempealeau; Waupaca; Wood.
     */
    public const EPSG_NAD27_WISCONSIN_CENTRAL = 'urn:ogc:def:crs:EPSG::32053';

    /**
     * NAD27 / Wisconsin North
     * Extent: USA - Wisconsin - counties of Ashland; Bayfield; Burnett; Douglas; Florence; Forest; Iron; Oneida;
     * Price; Sawyer; Vilas; Washburn.
     */
    public const EPSG_NAD27_WISCONSIN_NORTH = 'urn:ogc:def:crs:EPSG::32052';

    /**
     * NAD27 / Wisconsin South
     * Extent: USA - Wisconsin - counties of Adams; Calumet; Columbia; Crawford; Dane; Dodge; Fond Du Lac; Grant;
     * Green; Green Lake; Iowa; Jefferson; Juneau; Kenosha; La Crosse; Lafayette; Manitowoc; Marquette; Milwaukee;
     * Monroe; Ozaukee; Racine; Richland; Rock; Sauk; Sheboygan; Vernon; Walworth; Washington; Waukesha; Waushara;
     * Winnebago.
     */
    public const EPSG_NAD27_WISCONSIN_SOUTH = 'urn:ogc:def:crs:EPSG::32054';

    /**
     * NAD27 / Wisconsin Transverse Mercator
     * Extent: USA - Wisconsin
     * Designed as a single zone for the whole state. Replaced by NAD83 / Wisconsin Transverse Mercator (CRS code
     * 3070).
     */
    public const EPSG_NAD27_WISCONSIN_TRANSVERSE_MERCATOR = 'urn:ogc:def:crs:EPSG::3069';

    /**
     * NAD27 / Wyoming East
     * Extent: USA - Wyoming - counties of Albany; Campbell; Converse; Crook; Goshen; Laramie; Niobrara; Platte; Weston.
     */
    public const EPSG_NAD27_WYOMING_EAST = 'urn:ogc:def:crs:EPSG::32055';

    /**
     * NAD27 / Wyoming East Central
     * Extent: USA - Wyoming - counties of Big Horn; Carbon; Johnson; Natrona; Sheridan; Washakie.
     */
    public const EPSG_NAD27_WYOMING_EAST_CENTRAL = 'urn:ogc:def:crs:EPSG::32056';

    /**
     * NAD27 / Wyoming West
     * Extent: USA - Wyoming - counties of Lincoln; Sublette; Teton; Uinta.
     */
    public const EPSG_NAD27_WYOMING_WEST = 'urn:ogc:def:crs:EPSG::32058';

    /**
     * NAD27 / Wyoming West Central
     * Extent: USA - Wyoming - counties of Fremont; Hot Springs; Park; Sweetwater.
     */
    public const EPSG_NAD27_WYOMING_WEST_CENTRAL = 'urn:ogc:def:crs:EPSG::32057';

    /**
     * NAD27(76) / MTM zone 10
     * Extent: Canada - Ontario - between 81°W and 78°W: south of 46°N in area to west of 80°15'W, south of 47°N
     * in area between 80°15'W and 79°30'W, entire province between 79°30'W and 78°W.
     */
    public const EPSG_NAD27_76_MTM_ZONE_10 = 'urn:ogc:def:crs:EPSG::2019';

    /**
     * NAD27(76) / MTM zone 11
     * Extent: Canada - Ontario - south of 46°N and west of 81°W.
     */
    public const EPSG_NAD27_76_MTM_ZONE_11 = 'urn:ogc:def:crs:EPSG::2020';

    /**
     * NAD27(76) / MTM zone 12
     * Extent: Canada - Ontario - between 82°30'W and 79°30'W: north of 46°N in area between 82°30'W and 80°15'W,
     * north of 47°N in area between 80°15'W and 79°30'W.
     */
    public const EPSG_NAD27_76_MTM_ZONE_12 = 'urn:ogc:def:crs:EPSG::2021';

    /**
     * NAD27(76) / MTM zone 13
     * Extent: Canada - Ontario - between 85°30'W and 82°30'W and north of 46°N.
     */
    public const EPSG_NAD27_76_MTM_ZONE_13 = 'urn:ogc:def:crs:EPSG::2022';

    /**
     * NAD27(76) / MTM zone 14
     * Extent: Canada - Ontario - between 88°30'W and 85°30'W.
     */
    public const EPSG_NAD27_76_MTM_ZONE_14 = 'urn:ogc:def:crs:EPSG::2023';

    /**
     * NAD27(76) / MTM zone 15
     * Extent: Canada - Ontario - between 91°30'W and 88°30'W.
     */
    public const EPSG_NAD27_76_MTM_ZONE_15 = 'urn:ogc:def:crs:EPSG::2024';

    /**
     * NAD27(76) / MTM zone 16
     * Extent: Canada - Ontario - between 94°30'W and 91°30'W.
     */
    public const EPSG_NAD27_76_MTM_ZONE_16 = 'urn:ogc:def:crs:EPSG::2025';

    /**
     * NAD27(76) / MTM zone 17
     * Extent: Canada - Ontario - west of 94°30'W.
     */
    public const EPSG_NAD27_76_MTM_ZONE_17 = 'urn:ogc:def:crs:EPSG::2026';

    /**
     * NAD27(76) / MTM zone 8
     * Extent: Canada - Ontario - east of 75°W.
     */
    public const EPSG_NAD27_76_MTM_ZONE_8 = 'urn:ogc:def:crs:EPSG::2017';

    /**
     * NAD27(76) / MTM zone 9
     * Extent: Canada - Ontario - between 78°W and 75°W.
     */
    public const EPSG_NAD27_76_MTM_ZONE_9 = 'urn:ogc:def:crs:EPSG::2018';

    /**
     * NAD27(76) / UTM zone 15N
     * Extent: Canada - Ontario - west of 90°W
     * Replaces NAD27 / UTM zone 15N (code 26715).
     */
    public const EPSG_NAD27_76_UTM_ZONE_15N = 'urn:ogc:def:crs:EPSG::2027';

    /**
     * NAD27(76) / UTM zone 16N
     * Extent: Canada - Ontario - between 90°W and 84°W
     * Replaces NAD27 / UTM zone 16N (code 26716).
     */
    public const EPSG_NAD27_76_UTM_ZONE_16N = 'urn:ogc:def:crs:EPSG::2028';

    /**
     * NAD27(76) / UTM zone 17N
     * Extent: Canada - Ontario - between 84°W and 78°W
     * Replaces NAD27 / UTM zone 17N (code 26717).
     */
    public const EPSG_NAD27_76_UTM_ZONE_17N = 'urn:ogc:def:crs:EPSG::2029';

    /**
     * NAD27(76) / UTM zone 18N
     * Extent: Canada - Ontario - east of 78°W
     * Replaces NAD27 / UTM zone 18N (code 26718).
     */
    public const EPSG_NAD27_76_UTM_ZONE_18N = 'urn:ogc:def:crs:EPSG::2030';

    /**
     * NAD27(CGQ77) / Quebec Lambert
     * Extent: Canada - Quebec
     * Replaced NAD27 / Quebec Lambert (code 32098) in 1977.
     */
    public const EPSG_NAD27_CGQ77_QUEBEC_LAMBERT = 'urn:ogc:def:crs:EPSG::2138';

    /**
     * NAD27(CGQ77) / SCoPQ zone 10
     * Extent: Canada - Quebec - west of 78°W.
     */
    public const EPSG_NAD27_CGQ77_SCOPQ_ZONE_10 = 'urn:ogc:def:crs:EPSG::2016';

    /**
     * NAD27(CGQ77) / SCoPQ zone 3
     * Extent: Canada - Quebec - east of 60°W.
     */
    public const EPSG_NAD27_CGQ77_SCOPQ_ZONE_3 = 'urn:ogc:def:crs:EPSG::2009';

    /**
     * NAD27(CGQ77) / SCoPQ zone 4
     * Extent: Canada - Quebec - between 63°W and 60°W.
     */
    public const EPSG_NAD27_CGQ77_SCOPQ_ZONE_4 = 'urn:ogc:def:crs:EPSG::2010';

    /**
     * NAD27(CGQ77) / SCoPQ zone 5
     * Extent: Canada - Quebec - between 66°W and 63°W.
     */
    public const EPSG_NAD27_CGQ77_SCOPQ_ZONE_5 = 'urn:ogc:def:crs:EPSG::2011';

    /**
     * NAD27(CGQ77) / SCoPQ zone 6
     * Extent: Canada - Quebec - between 69°W and 66°W.
     */
    public const EPSG_NAD27_CGQ77_SCOPQ_ZONE_6 = 'urn:ogc:def:crs:EPSG::2012';

    /**
     * NAD27(CGQ77) / SCoPQ zone 7
     * Extent: Canada - Quebec - between 72°W and 69°W.
     */
    public const EPSG_NAD27_CGQ77_SCOPQ_ZONE_7 = 'urn:ogc:def:crs:EPSG::2013';

    /**
     * NAD27(CGQ77) / SCoPQ zone 8
     * Extent: Canada - Quebec - between 75°W and 72°W.
     */
    public const EPSG_NAD27_CGQ77_SCOPQ_ZONE_8 = 'urn:ogc:def:crs:EPSG::2014';

    /**
     * NAD27(CGQ77) / SCoPQ zone 9
     * Extent: Canada - Quebec - between 78°W and 75°W.
     */
    public const EPSG_NAD27_CGQ77_SCOPQ_ZONE_9 = 'urn:ogc:def:crs:EPSG::2015';

    /**
     * NAD27(CGQ77) / UTM zone 17N
     * Extent: Canada - Quebec - west of 78°W
     * Replaces NAD27 / UTM zone 17N (code 26717).
     */
    public const EPSG_NAD27_CGQ77_UTM_ZONE_17N = 'urn:ogc:def:crs:EPSG::2031';

    /**
     * NAD27(CGQ77) / UTM zone 18N
     * Extent: Canada - Quebec - between 78°W and 72°W
     * Replaces NAD27 / UTM zone 18N (code 26718).
     */
    public const EPSG_NAD27_CGQ77_UTM_ZONE_18N = 'urn:ogc:def:crs:EPSG::2032';

    /**
     * NAD27(CGQ77) / UTM zone 19N
     * Extent: Canada - Quebec - between 72°W and 66°W
     * Replaces NAD27 / UTM zone 19N (code 26719).
     */
    public const EPSG_NAD27_CGQ77_UTM_ZONE_19N = 'urn:ogc:def:crs:EPSG::2033';

    /**
     * NAD27(CGQ77) / UTM zone 20N
     * Extent: Canada - Quebec - between 66°W and 60°W
     * Replaces NAD27 / UTM zone 20N (code 26720).
     */
    public const EPSG_NAD27_CGQ77_UTM_ZONE_20N = 'urn:ogc:def:crs:EPSG::2034';

    /**
     * NAD27(CGQ77) / UTM zone 21N
     * Extent: Canada - Quebec - east of 60°W
     * Replaces NAD27 / UTM zone 21N (code 26721).
     */
    public const EPSG_NAD27_CGQ77_UTM_ZONE_21N = 'urn:ogc:def:crs:EPSG::2035';

    /**
     * NAD83 / Alabama East
     * Extent: USA - Alabama east of approximately 86°37'W - counties Barbour; Bullock; Calhoun; Chambers; Cherokee;
     * Clay; Cleburne; Coffee; Coosa; Covington; Crenshaw; Dale; De Kalb; Elmore; Etowah; Geneva; Henry; Houston;
     * Jackson; Lee; Macon; Madison; Marshall; Montgomery; Pike; Randolph; Russell; St Clair; Talladega; Tallapoosa
     * For applications with an accuracy of better than 1m, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_ALABAMA_EAST = 'urn:ogc:def:crs:EPSG::26929';

    /**
     * NAD83 / Alabama West
     * Extent: USA - Alabama west of approximately 86°37'W - counties Autauga; Baldwin; Bibb; Blount; Butler; Chilton;
     * Choctaw; Clarke; Colbert; Conecuh; Cullman; Dallas; Escambia; Fayette; Franklin; Greene; Hale; Jefferson; Lamar;
     * Lauderdale; Lawrence; Limestone; Lowndes; Marengo; Marion; Mobile; Monroe; Morgan; Perry; Pickens; Shelby;
     * Sumter; Tuscaloosa; Walker; Washington; Wilcox; Winston
     * For applications with an accuracy of better than 1m, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_ALABAMA_WEST = 'urn:ogc:def:crs:EPSG::26930';

    /**
     * NAD83 / Alaska Albers
     * Extent: USA - Alaska.
     */
    public const EPSG_NAD83_ALASKA_ALBERS = 'urn:ogc:def:crs:EPSG::3338';

    /**
     * NAD83 / Alaska zone 1
     * Extent: USA - Alaska - east of 141°W; i.e. Panhandle.
     */
    public const EPSG_NAD83_ALASKA_ZONE_1 = 'urn:ogc:def:crs:EPSG::26931';

    /**
     * NAD83 / Alaska zone 10
     * Extent: USA - Alaska - Aleutian Islands onshore.
     */
    public const EPSG_NAD83_ALASKA_ZONE_10 = 'urn:ogc:def:crs:EPSG::26940';

    /**
     * NAD83 / Alaska zone 2
     * Extent: USA - Alaska - between 144°W and 141°W, onshore.
     */
    public const EPSG_NAD83_ALASKA_ZONE_2 = 'urn:ogc:def:crs:EPSG::26932';

    /**
     * NAD83 / Alaska zone 3
     * Extent: USA - Alaska - between 148°W and 144°W.
     */
    public const EPSG_NAD83_ALASKA_ZONE_3 = 'urn:ogc:def:crs:EPSG::26933';

    /**
     * NAD83 / Alaska zone 4
     * Extent: USA - Alaska - between 152°W and 148°W, onshore.
     */
    public const EPSG_NAD83_ALASKA_ZONE_4 = 'urn:ogc:def:crs:EPSG::26934';

    /**
     * NAD83 / Alaska zone 5
     * Extent: USA - Alaska - between 156°W and 152°W.
     */
    public const EPSG_NAD83_ALASKA_ZONE_5 = 'urn:ogc:def:crs:EPSG::26935';

    /**
     * NAD83 / Alaska zone 6
     * Extent: USA - Alaska - between 160°W and 156°W, onshore.
     */
    public const EPSG_NAD83_ALASKA_ZONE_6 = 'urn:ogc:def:crs:EPSG::26936';

    /**
     * NAD83 / Alaska zone 7
     * Extent: USA - Alaska - between 164°W and 160°W, onshore.
     */
    public const EPSG_NAD83_ALASKA_ZONE_7 = 'urn:ogc:def:crs:EPSG::26937';

    /**
     * NAD83 / Alaska zone 8
     * Extent: USA - Alaska onshore north of 54°30'N and between 168°W and 164°W.
     */
    public const EPSG_NAD83_ALASKA_ZONE_8 = 'urn:ogc:def:crs:EPSG::26938';

    /**
     * NAD83 / Alaska zone 9
     * Extent: USA - Alaska onshore north of 54°30'N and west of 168°W.
     */
    public const EPSG_NAD83_ALASKA_ZONE_9 = 'urn:ogc:def:crs:EPSG::26939';

    /**
     * NAD83 / Alberta 10-TM (Forest)
     * Extent: Canada - Alberta
     * Easting coordinates are always positive in Alberta. For an alternative with easting coordinates that may be
     * either positive or negative, see NAD83 / Alberta 10-TM (Resource) (CRS code 3401).
     */
    public const EPSG_NAD83_ALBERTA_10_TM_FOREST = 'urn:ogc:def:crs:EPSG::3400';

    /**
     * NAD83 / Alberta 10-TM (Resource)
     * Extent: Canada - Alberta
     * Has negative easting coordinates in western Alberta. For an alternative with positive coordinates see NAD83 /
     * Alberta 10-TM (Forest) (CRS code 3400).
     */
    public const EPSG_NAD83_ALBERTA_10_TM_RESOURCE = 'urn:ogc:def:crs:EPSG::3401';

    /**
     * NAD83 / Alberta 3TM ref merid 111 W
     * Extent: Canada - Alberta - east of 112°30'W
     * If used for rural area control markers, area of use is amended to east of 112°W; however use of NAD83 / UTM
     * zone 12N (CRS code 26912) is encouraged in these rural areas.
     */
    public const EPSG_NAD83_ALBERTA_3TM_REF_MERID_111_W = 'urn:ogc:def:crs:EPSG::3775';

    /**
     * NAD83 / Alberta 3TM ref merid 114 W
     * Extent: Canada - Alberta - between 115°30'W and 112°30'W
     * If used for rural area control markers, area of use is amended to between 116°W and 112°W; however use of
     * NAD83 / UTM zones 11N and 12N (CRS codes 26911 and 26912) is encouraged in these rural areas.
     */
    public const EPSG_NAD83_ALBERTA_3TM_REF_MERID_114_W = 'urn:ogc:def:crs:EPSG::3776';

    /**
     * NAD83 / Alberta 3TM ref merid 117 W
     * Extent: Canada - Alberta - between 118°30'W and 115°30' W
     * If used for rural area control markers, area of use is amended to between 118°W and 116°W; however use of
     * NAD83 / UTM zone 11N (CRS code 26911) is encouraged in these rural areas.
     */
    public const EPSG_NAD83_ALBERTA_3TM_REF_MERID_117_W = 'urn:ogc:def:crs:EPSG::3777';

    /**
     * NAD83 / Alberta 3TM ref merid 120 W
     * Extent: Canada - Alberta - west of 118°30' W
     * If used for rural area control markers, area of use is amended to west of 118°W; however use of NAD83 / UTM
     * zone 11N (CRS code 26911) encouraged in these rural areas.
     */
    public const EPSG_NAD83_ALBERTA_3TM_REF_MERID_120_W = 'urn:ogc:def:crs:EPSG::3801';

    /**
     * NAD83 / Arizona Central
     * Extent: USA - Arizona - counties Coconino; Maricopa; Pima; Pinal; Santa Cruz; Yavapai
     * State law defines system in International feet (note: not US survey feet). See code 2223 for equivalent
     * non-metric definition. For applications with an accuracy of better than 1m, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_ARIZONA_CENTRAL = 'urn:ogc:def:crs:EPSG::26949';

    /**
     * NAD83 / Arizona Central (ft)
     * Extent: USA - Arizona - counties Coconino; Maricopa; Pima; Pinal; Santa Cruz; Yavapai
     * State law defines system in International feet (note: not US survey feet). Federal definition is metric - see
     * code 26949. For applications with an accuracy of better than 3 feet, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_ARIZONA_CENTRAL_FT = 'urn:ogc:def:crs:EPSG::2223';

    /**
     * NAD83 / Arizona East
     * Extent: USA - Arizona - counties Apache; Cochise; Gila; Graham; Greenlee; Navajo
     * State law defines system in International feet (note: not US survey feet). See code 2222 for equivalent
     * non-metric definition. For applications with an accuracy of better than 1m, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_ARIZONA_EAST = 'urn:ogc:def:crs:EPSG::26948';

    /**
     * NAD83 / Arizona East (ft)
     * Extent: USA - Arizona - counties Apache; Cochise; Gila; Graham; Greenlee; Navajo
     * State law defines system in International feet (note: not US survey feet). Federal definition is metric - see
     * code 26948. For applications with an accuracy of better than 3 feet, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_ARIZONA_EAST_FT = 'urn:ogc:def:crs:EPSG::2222';

    /**
     * NAD83 / Arizona West
     * Extent: USA - Arizona - counties of La Paz; Mohave; Yuma
     * State law defines system in International feet (note: not US survey feet). See code 2224 for equivalent
     * non-metric definition. For applications with an accuracy of better than 1m, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_ARIZONA_WEST = 'urn:ogc:def:crs:EPSG::26950';

    /**
     * NAD83 / Arizona West (ft)
     * Extent: USA - Arizona - counties of La Paz; Mohave; Yuma
     * State law defines system in International feet (note: not US survey feet). Federal definition is metric - see
     * code 26950. For applications with an accuracy of better than 3 feet, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_ARIZONA_WEST_FT = 'urn:ogc:def:crs:EPSG::2224';

    /**
     * NAD83 / Arkansas North
     * Extent: USA - Arkansas - counties of Baxter; Benton; Boone; Carroll; Clay; Cleburne; Conway; Craighead;
     * Crawford; Crittenden; Cross; Faulkner; Franklin; Fulton; Greene; Independence; Izard; Jackson; Johnson;
     * Lawrence; Logan; Madison; Marion; Mississippi; Newton; Perry; Poinsett; Pope; Randolph; Scott; Searcy;
     * Sebastian; Sharp; St Francis; Stone; Van Buren; Washington; White; Woodruff; Yell
     * State law defines system in US survey feet. See code 3433 for equivalent non-metric definition. For applications
     * with an accuracy of better than 1m, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_ARKANSAS_NORTH = 'urn:ogc:def:crs:EPSG::26951';

    /**
     * NAD83 / Arkansas North (ftUS)
     * Extent: USA - Arkansas - counties of Baxter; Benton; Boone; Carroll; Clay; Cleburne; Conway; Craighead;
     * Crawford; Crittenden; Cross; Faulkner; Franklin; Fulton; Greene; Independence; Izard; Jackson; Johnson;
     * Lawrence; Logan; Madison; Marion; Mississippi; Newton; Perry; Poinsett; Pope; Randolph; Scott; Searcy;
     * Sebastian; Sharp; St Francis; Stone; Van Buren; Washington; White; Woodruff; Yell
     * State law defines system in US survey feet. Federal definition is metric - see code 26951. For applications with
     * an accuracy of better than 3 feet, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_ARKANSAS_NORTH_FTUS = 'urn:ogc:def:crs:EPSG::3433';

    /**
     * NAD83 / Arkansas South
     * Extent: USA - Arkansas - counties Arkansas; Ashley; Bradley; Calhoun; Chicot; Clark; Cleveland; Columbia;
     * Dallas; Desha; Drew; Garland; Grant; Hempstead; Hot Spring; Howard; Jefferson; Lafayette; Lee; Lincoln; Little
     * River; Lonoke; Miller; Monroe; Montgomery; Nevada; Ouachita; Phillips; Pike; Polk; Prairie; Pulaski; Saline;
     * Sevier; Union
     * State law defines system in US survey feet. See code 3434 for equivalent non-metric definition. For applications
     * with an accuracy of better than 1m, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_ARKANSAS_SOUTH = 'urn:ogc:def:crs:EPSG::26952';

    /**
     * NAD83 / Arkansas South (ftUS)
     * Extent: USA - Arkansas - counties Arkansas; Ashley; Bradley; Calhoun; Chicot; Clark; Cleveland; Columbia;
     * Dallas; Desha; Drew; Garland; Grant; Hempstead; Hot Spring; Howard; Jefferson; Lafayette; Lee; Lincoln; Little
     * River; Lonoke; Miller; Monroe; Montgomery; Nevada; Ouachita; Phillips; Pike; Polk; Prairie; Pulaski; Saline;
     * Sevier; Union
     * State law defines system in US survey feet. Federal definition is metric - see code 26952. For applications with
     * an accuracy of better than 3 feet, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_ARKANSAS_SOUTH_FTUS = 'urn:ogc:def:crs:EPSG::3434';

    /**
     * NAD83 / BC Albers
     * Extent: Canada - British Columbia
     * This CRS name may sometimes be used as an alias for NAD83(CSRS) / BC Albers. See CRS code 3153.
     */
    public const EPSG_NAD83_BC_ALBERS = 'urn:ogc:def:crs:EPSG::3005';

    /**
     * NAD83 / BLM 10N (ftUS)
     * Extent: USA - between 126°W and 120°W - California; Oregon; Washington.
     */
    public const EPSG_NAD83_BLM_10N_FTUS = 'urn:ogc:def:crs:EPSG::4430';

    /**
     * NAD83 / BLM 11N (ftUS)
     * Extent: USA - between 120°W and 114°W - California, Idaho, Nevada, Oregon, Washington.
     */
    public const EPSG_NAD83_BLM_11N_FTUS = 'urn:ogc:def:crs:EPSG::4431';

    /**
     * NAD83 / BLM 12N (ftUS)
     * Extent: USA - between 114°W and 108°W - Arizona; Colorado; Idaho; Montana; New Mexico; Utah; Wyoming.
     */
    public const EPSG_NAD83_BLM_12N_FTUS = 'urn:ogc:def:crs:EPSG::4432';

    /**
     * NAD83 / BLM 13N (ftUS)
     * Extent: USA - between 108°W and 102°W - Colorado; Montana; Nebraska; New Mexico; North Dakota; Oklahoma; South
     * Dakota; Texas; Wyoming.
     */
    public const EPSG_NAD83_BLM_13N_FTUS = 'urn:ogc:def:crs:EPSG::4433';

    /**
     * NAD83 / BLM 14N (ftUS)
     * Extent: USA - between 102°W and 96°W. Iowa; Kansas; Minnesota; Nebraska; North Dakota; Oklahoma; South Dakota;
     * Texas; Gulf of Mexico west of approximately 96°W - leasing areas Matagorda Island, Mustang Island, North Padre
     * Island and South Padre Island; outer continental shelf (GoM OCS) protraction areas Corpus Christi, Port Isabel
     * See NAD83 / UTM zone 14N (code 26914) for metric equivalent. See NAD27 / BLM 14N (ftUS) (code 32064) for system
     * used in US Gulf of Mexico oil operations.
     */
    public const EPSG_NAD83_BLM_14N_FTUS = 'urn:ogc:def:crs:EPSG::32164';

    /**
     * NAD83 / BLM 15N (ftUS)
     * Extent: USA - between 96°W and 90°W - Arkansas; Illinois; Iowa; Kansas; Louisiana; Michigan; Minnesota;
     * Mississippi; Missouri; Nebraska; Oklahoma; Tennessee; Texas; Wisconsin; Gulf of Mexico outer continental shelf
     * (GoM OCS) between approximately 96°W and 90°W - leasing areas Brazos, Galveston, High Island; Sabine Pass;
     * West Cameron, East Cameron, Vermilion, South Marsh Island, Eugene Island, Ship Shoal, South Pelto, Bay Marchand,
     * South Timbalier, Grand Isle; protraction areas East Breaks, Alaminos Canyon, Garden Banks, Keathley Canyon,
     * Sigsbee Escarpment, Ewing Bank, Green Canyon, Walker Ridge, Amery Terrace
     * See NAD83 / UTM zone 15N (code 26915) for metric equivalent. See NAD27 / BLM 14N (ftUS) (code 32065) for system
     * used in US Gulf of Mexico oil operations.
     */
    public const EPSG_NAD83_BLM_15N_FTUS = 'urn:ogc:def:crs:EPSG::32165';

    /**
     * NAD83 / BLM 16N (ftUS)
     * Extent: USA - between 90°W and 84°W - Alabama; Arkansas; Florida; Georgia; Indiana; Illinois; Kentucky;
     * Louisiana; Michigan; Minnesota; Mississippi; Missouri; North Carolina; Ohio; Tennessee; Wisconsin; Gulf of
     * Mexico outer continental shelf (GoM OCS) between approximately 90°W and 84°W - leasing areas Grand Isle, West
     * Delta, South Pass, Breton Sound, Main Pass,  Chandeleur; protraction areas Mobile, Viosca Knoll, Mississippi
     * Canyon, Atwater Valley, Lund, Lund South, Pensacola, Destin Dome, De Soto Canyon, Lloyd Ridge, Henderson,
     * Florida Plain, Campeche Escarpment, Apalachicola, Florida Middle Ground, The Elbow, Vernon Basin, Howell Hook,
     * Rankin
     * See NAD83 / UTM zone 16N (code 26916) for metric equivalent. See NAD27 / BLM 16N (ftUS) (code 32066) for system
     * used in US Gulf of Mexico oil operations.
     */
    public const EPSG_NAD83_BLM_16N_FTUS = 'urn:ogc:def:crs:EPSG::32166';

    /**
     * NAD83 / BLM 17N (ftUS)
     * Extent: USA - between 84°W and 78°W - Florida; Georgia; Maryland; Michigan; New York; North Carolina; Ohio;
     * Pennsylvania; South Carolina; Tennessee; Virginia; West Virginia; Gulf of Mexico outer continental shelf (GoM
     * OCS) east of approximately 84°W - protraction areas Gainesville; Tarpon Springs; St Petersburg; Charlotte
     * Harbor; Pulley Ridge; Dry Tortugas; Tortugas Valley; Miami; Key West
     * See NAD83 / UTM zone 17N (code 26917) for metric equivalent. See NAD27 / BLM 17N (ftUS) (code 32067) for system
     * used in US Gulf of Mexico oil operations.
     */
    public const EPSG_NAD83_BLM_17N_FTUS = 'urn:ogc:def:crs:EPSG::32167';

    /**
     * NAD83 / BLM 18N (ftUS)
     * Extent: USA - between 78°W and 72°W - Connecticut; Delaware; Maryland; Massachusetts; New Hampshire; New
     * Jersey; New York; North Carolina; Pennsylvania; Virginia; Vermont.
     */
    public const EPSG_NAD83_BLM_18N_FTUS = 'urn:ogc:def:crs:EPSG::4438';

    /**
     * NAD83 / BLM 19N (ftUS)
     * Extent: USA - between 72°W and 66°W - Connecticut; Maine; Massachusetts; New Hampshire; New York (Long
     * Island); Rhode Island; Vermont.
     */
    public const EPSG_NAD83_BLM_19N_FTUS = 'urn:ogc:def:crs:EPSG::4439';

    /**
     * NAD83 / BLM 1N (ftUS)
     * Extent: USA - between 180°W and 174°W - Alaska and offshore continental shelf (OCS).
     */
    public const EPSG_NAD83_BLM_1N_FTUS = 'urn:ogc:def:crs:EPSG::4421';

    /**
     * NAD83 / BLM 2N (ftUS)
     * Extent: USA - between 174°W and 168°W - Alaska and offshore continental shelf (OCS).
     */
    public const EPSG_NAD83_BLM_2N_FTUS = 'urn:ogc:def:crs:EPSG::4422';

    /**
     * NAD83 / BLM 3N (ftUS)
     * Extent: USA - between 168°W and 162°W - Alaska and offshore continental shelf (OCS).
     */
    public const EPSG_NAD83_BLM_3N_FTUS = 'urn:ogc:def:crs:EPSG::4423';

    /**
     * NAD83 / BLM 4N (ftUS)
     * Extent: USA - between 162°W and 156°W - Alaska and offshore continental shelf (OCS).
     */
    public const EPSG_NAD83_BLM_4N_FTUS = 'urn:ogc:def:crs:EPSG::4424';

    /**
     * NAD83 / BLM 59N (ftUS)
     * Extent: USA - west of 174°E. Alaska and offshore continental shelf (OCS).
     */
    public const EPSG_NAD83_BLM_59N_FTUS = 'urn:ogc:def:crs:EPSG::4217';

    /**
     * NAD83 / BLM 5N (ftUS)
     * Extent: USA - between 156°W and 150°W - Alaska and offshore continental shelf (OCS).
     */
    public const EPSG_NAD83_BLM_5N_FTUS = 'urn:ogc:def:crs:EPSG::4425';

    /**
     * NAD83 / BLM 60N (ftUS)
     * Extent: USA - between 174°E and 180°E - Alaska and offshore continental shelf (OCS).
     */
    public const EPSG_NAD83_BLM_60N_FTUS = 'urn:ogc:def:crs:EPSG::4420';

    /**
     * NAD83 / BLM 6N (ftUS)
     * Extent: USA - between 150°W and 144°W - Alaska and offshore continental shelf (OCS).
     */
    public const EPSG_NAD83_BLM_6N_FTUS = 'urn:ogc:def:crs:EPSG::4426';

    /**
     * NAD83 / BLM 7N (ftUS)
     * Extent: USA - between 144°W and 138°W - Alaska.
     */
    public const EPSG_NAD83_BLM_7N_FTUS = 'urn:ogc:def:crs:EPSG::4427';

    /**
     * NAD83 / BLM 8N (ftUS)
     * Extent: USA - between 138°W and 132°W - Alaska.
     */
    public const EPSG_NAD83_BLM_8N_FTUS = 'urn:ogc:def:crs:EPSG::4428';

    /**
     * NAD83 / BLM 9N (ftUS)
     * Extent: USA - between 132°W and 126°W - Alaska.
     */
    public const EPSG_NAD83_BLM_9N_FTUS = 'urn:ogc:def:crs:EPSG::4429';

    /**
     * NAD83 / California Albers
     * Extent: USA - California
     * For applications with an accuracy of better than 1m, replaced by NAD83(HARN) / California Albers.
     */
    public const EPSG_NAD83_CALIFORNIA_ALBERS = 'urn:ogc:def:crs:EPSG::3310';

    /**
     * NAD83 / California zone 1
     * Extent: USA - California - counties Del Norte; Humboldt; Lassen; Modoc; Plumas; Shasta; Siskiyou; Tehama;
     * Trinity
     * State law defines system in US survey feet. See code 2225 for equivalent non-metric definition. For applications
     * with an accuracy of better than 1m, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_CALIFORNIA_ZONE_1 = 'urn:ogc:def:crs:EPSG::26941';

    /**
     * NAD83 / California zone 1 (ftUS)
     * Extent: USA - California - counties Del Norte; Humboldt; Lassen; Modoc; Plumas; Shasta; Siskiyou; Tehama;
     * Trinity
     * State law defines system in US survey feet. Federal definition is metric - see code 26941. For applications with
     * an accuracy of better than 3 feet, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_CALIFORNIA_ZONE_1_FTUS = 'urn:ogc:def:crs:EPSG::2225';

    /**
     * NAD83 / California zone 2
     * Extent: USA - California - counties of Alpine; Amador; Butte; Colusa; El Dorado; Glenn; Lake; Mendocino; Napa;
     * Nevada; Placer; Sacramento; Sierra; Solano; Sonoma; Sutter; Yolo; Yuba
     * State law defines system in US survey feet. See code 2226 for equivalent non-metric definition. For applications
     * with an accuracy of better than 1m, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_CALIFORNIA_ZONE_2 = 'urn:ogc:def:crs:EPSG::26942';

    /**
     * NAD83 / California zone 2 (ftUS)
     * Extent: USA - California - counties of Alpine; Amador; Butte; Colusa; El Dorado; Glenn; Lake; Mendocino; Napa;
     * Nevada; Placer; Sacramento; Sierra; Solano; Sonoma; Sutter; Yolo; Yuba
     * State law defines system in US survey feet. Federal definition is metric - see code 26942. For applications with
     * an accuracy of better than 3 feet, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_CALIFORNIA_ZONE_2_FTUS = 'urn:ogc:def:crs:EPSG::2226';

    /**
     * NAD83 / California zone 3
     * Extent: USA - California - counties Alameda; Calaveras; Contra Costa; Madera; Marin; Mariposa; Merced; Mono; San
     * Francisco; San Joaquin; San Mateo; Santa Clara; Santa Cruz; Stanislaus; Tuolumne
     * State law defines system in US survey feet. See code 2227 for equivalent non-metric definition. For applications
     * with an accuracy of better than 1m, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_CALIFORNIA_ZONE_3 = 'urn:ogc:def:crs:EPSG::26943';

    /**
     * NAD83 / California zone 3 (ftUS)
     * Extent: USA - California - counties Alameda; Calaveras; Contra Costa; Madera; Marin; Mariposa; Merced; Mono; San
     * Francisco; San Joaquin; San Mateo; Santa Clara; Santa Cruz; Stanislaus; Tuolumne
     * State law defines system in US survey feet. Federal definition is metric - see code 26943. For applications with
     * an accuracy of better than 3 feet, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_CALIFORNIA_ZONE_3_FTUS = 'urn:ogc:def:crs:EPSG::2227';

    /**
     * NAD83 / California zone 4
     * Extent: USA - California - counties Fresno; Inyo; Kings; Monterey; San Benito; Tulare
     * State law defines system in US survey feet. See code 2228 for equivalent non-metric definition. For applications
     * with an accuracy of better than 1m, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_CALIFORNIA_ZONE_4 = 'urn:ogc:def:crs:EPSG::26944';

    /**
     * NAD83 / California zone 4 (ftUS)
     * Extent: USA - California - counties Fresno; Inyo; Kings; Monterey; San Benito; Tulare
     * State law defines system in US survey feet. Federal definition is metric - see code 26944. For applications with
     * an accuracy of better than 3 feet, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_CALIFORNIA_ZONE_4_FTUS = 'urn:ogc:def:crs:EPSG::2228';

    /**
     * NAD83 / California zone 5
     * Extent: USA - California - counties Kern; Los Angeles; San Bernardino; San Luis Obispo; Santa Barbara; Ventura
     * State law defines system in US survey feet. See code 2229 for equivalent non-metric definition. For applications
     * with an accuracy of better than 1m, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_CALIFORNIA_ZONE_5 = 'urn:ogc:def:crs:EPSG::26945';

    /**
     * NAD83 / California zone 5 (ftUS)
     * Extent: USA - California - counties Kern; Los Angeles; San Bernardino; San Luis Obispo; Santa Barbara; Ventura
     * State law defines system in US survey feet. Federal definition is metric - see code 26945. For applications with
     * an accuracy of better than 3 feet, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_CALIFORNIA_ZONE_5_FTUS = 'urn:ogc:def:crs:EPSG::2229';

    /**
     * NAD83 / California zone 6
     * Extent: USA - California - counties Imperial; Orange; Riverside; San Diego
     * State law defines system in US survey feet. See code 2230 for equivalent non-metric definition. For applications
     * with an accuracy of better than 1m, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_CALIFORNIA_ZONE_6 = 'urn:ogc:def:crs:EPSG::26946';

    /**
     * NAD83 / California zone 6 (ftUS)
     * Extent: USA - California - counties Imperial; Orange; Riverside; San Diego
     * State law defines system in US survey feet. Federal definition is metric - see code 26946. For applications with
     * an accuracy of better than 3 feet, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_CALIFORNIA_ZONE_6_FTUS = 'urn:ogc:def:crs:EPSG::2230';

    /**
     * NAD83 / Canada Atlas Lambert
     * Extent: Canada - Alberta; British Columbia; Manitoba; New Brunswick; Newfoundland and Labrador; Northwest
     * Territories; Nova Scotia; Nunavut; Ontario; Prince Edward Island; Quebec; Saskatchewan; Yukon
     * Data may sometimes be referenced to NAD83(CSRS) / Canada Atlas Lambert (see CRS code 3979) which is then called
     * "NAD83 / Canada Lambert". At the scales involved the difference of under 2 metres between the two CRSs may not
     * be significant.
     */
    public const EPSG_NAD83_CANADA_ATLAS_LAMBERT = 'urn:ogc:def:crs:EPSG::3978';

    /**
     * NAD83 / Colorado Central
     * Extent: USA - Colorado - counties Arapahoe; Chaffee; Cheyenne; Clear Creek; Delta; Denver; Douglas; Eagle; El
     * Paso; Elbert; Fremont; Garfield; Gunnison; Jefferson; Kit Carson; Lake; Lincoln; Mesa; Park; Pitkin; Summit;
     * Teller
     * State law defines system in US survey feet. See code 2232 for equivalent non-metric definition. For applications
     * with an accuracy of better than 1m, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_COLORADO_CENTRAL = 'urn:ogc:def:crs:EPSG::26954';

    /**
     * NAD83 / Colorado Central (ftUS)
     * Extent: USA - Colorado - counties Arapahoe; Chaffee; Cheyenne; Clear Creek; Delta; Denver; Douglas; Eagle; El
     * Paso; Elbert; Fremont; Garfield; Gunnison; Jefferson; Kit Carson; Lake; Lincoln; Mesa; Park; Pitkin; Summit;
     * Teller
     * State law defines system in US survey feet. Federal definition is metric - see code 26954. For applications with
     * an accuracy of better than 3 feet, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_COLORADO_CENTRAL_FTUS = 'urn:ogc:def:crs:EPSG::2232';

    /**
     * NAD83 / Colorado North
     * Extent: USA - Colorado - counties Adams; Boulder; Gilpin; Grand; Jackson; Larimer; Logan; Moffat; Morgan;
     * Phillips; Rio Blanco; Routt; Sedgwick; Washington; Weld; Yuma
     * State law defines system in US survey feet. See code 2231 for equivalent non-metric definition. For applications
     * with an accuracy of better than 1m, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_COLORADO_NORTH = 'urn:ogc:def:crs:EPSG::26953';

    /**
     * NAD83 / Colorado North (ftUS)
     * Extent: USA - Colorado - counties Adams; Boulder; Gilpin; Grand; Jackson; Larimer; Logan; Moffat; Morgan;
     * Phillips; Rio Blanco; Routt; Sedgwick; Washington; Weld; Yuma
     * State law defines system in US survey feet. Federal definition is metric - see code 26953. For applications with
     * an accuracy of better than 3 feet, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_COLORADO_NORTH_FTUS = 'urn:ogc:def:crs:EPSG::2231';

    /**
     * NAD83 / Colorado South
     * Extent: USA - Colorado - counties Alamosa; Archuleta; Baca; Bent; Conejos; Costilla; Crowley; Custer; Dolores;
     * Hinsdale; Huerfano; Kiowa; La Plata; Las Animas; Mineral; Montezuma; Montrose; Otero; Ouray; Prowers; Pueblo;
     * Rio Grande; Saguache; San Juan; San Miguel
     * State law defines system in US survey feet. See code 2233 for equivalent non-metric definition. For applications
     * with an accuracy of better than 1m, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_COLORADO_SOUTH = 'urn:ogc:def:crs:EPSG::26955';

    /**
     * NAD83 / Colorado South (ftUS)
     * Extent: USA - Colorado - counties Alamosa; Archuleta; Baca; Bent; Conejos; Costilla; Crowley; Custer; Dolores;
     * Hinsdale; Huerfano; Kiowa; La Plata; Las Animas; Mineral; Montezuma; Montrose; Otero; Ouray; Prowers; Pueblo;
     * Rio Grande; Saguache; San Juan; San Miguel
     * State law defines system in US survey feet. Federal definition is metric - see code 26955. For applications with
     * an accuracy of better than 3 feet, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_COLORADO_SOUTH_FTUS = 'urn:ogc:def:crs:EPSG::2233';

    /**
     * NAD83 / Connecticut
     * Extent: USA - Connecticut - counties of Fairfield; Hartford; Litchfield; Middlesex; New Haven; New London;
     * Tolland; Windham
     * State law defines system in US survey feet. See code 2234 for equivalent non-metric definition. For applications
     * with an accuracy of better than 1m, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_CONNECTICUT = 'urn:ogc:def:crs:EPSG::26956';

    /**
     * NAD83 / Connecticut (ftUS)
     * Extent: USA - Connecticut - counties of Fairfield; Hartford; Litchfield; Middlesex; New Haven; New London;
     * Tolland; Windham
     * State law defines system in US survey feet. Federal definition is metric - see code 26956. For applications with
     * an accuracy of better than 3 feet, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_CONNECTICUT_FTUS = 'urn:ogc:def:crs:EPSG::2234';

    /**
     * NAD83 / Conus Albers
     * Extent: USA - CONUS onshore - Alabama; Arizona; Arkansas; California; Colorado; Connecticut; Delaware; Florida;
     * Georgia; Idaho; Illinois; Indiana; Iowa; Kansas; Kentucky; Louisiana; Maine; Maryland; Massachusetts; Michigan;
     * Minnesota; Mississippi; Missouri; Montana; Nebraska; Nevada; New Hampshire; New Jersey; New Mexico; New York;
     * North Carolina; North Dakota; Ohio; Oklahoma; Oregon; Pennsylvania; Rhode Island; South Carolina; South Dakota;
     * Tennessee; Texas; Utah; Vermont; Virginia; Washington; West Virginia; Wisconsin; Wyoming
     * Replaces NAD27 / Conus Albers (CRS code 5069). For applications with an accuracy of better than 1m, replaced by
     * NAD83(HARN) / Conus Albers (CRS code 5071).
     */
    public const EPSG_NAD83_CONUS_ALBERS = 'urn:ogc:def:crs:EPSG::5070';

    /**
     * NAD83 / Delaware
     * Extent: USA - Delaware - counties of Kent; New Castle; Sussex
     * State law defines system in US survey feet. See code 2235 for equivalent non-metric definition. For applications
     * with an accuracy of better than 1m, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_DELAWARE = 'urn:ogc:def:crs:EPSG::26957';

    /**
     * NAD83 / Delaware (ftUS)
     * Extent: USA - Delaware - counties of Kent; New Castle; Sussex
     * State law defines system in US survey feet. Federal definition is metric - see code 26957. For applications with
     * an accuracy of better than 3 feet, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_DELAWARE_FTUS = 'urn:ogc:def:crs:EPSG::2235';

    /**
     * NAD83 / Florida East
     * Extent: USA - Florida - counties of Brevard; Broward; Clay; Collier; Dade; Duval; Flagler; Glades; Hendry;
     * Highlands; Indian River; Lake; Martin; Monroe; Nassau; Okeechobee; Orange; Osceola; Palm Beach; Putnam;
     * Seminole; St Johns; St Lucie; Volusia
     * State law defines system in US survey feet. See code 2236 for equivalent non-metric definition. For applications
     * with an accuracy of better than 1m, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_FLORIDA_EAST = 'urn:ogc:def:crs:EPSG::26958';

    /**
     * NAD83 / Florida East (ftUS)
     * Extent: USA - Florida - counties of Brevard; Broward; Clay; Collier; Dade; Duval; Flagler; Glades; Hendry;
     * Highlands; Indian River; Lake; Martin; Monroe; Nassau; Okeechobee; Orange; Osceola; Palm Beach; Putnam;
     * Seminole; St Johns; St Lucie; Volusia
     * State law defines system in US survey feet. Federal definition is metric - see code 26958. For applications with
     * an accuracy of better than 3 feet, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_FLORIDA_EAST_FTUS = 'urn:ogc:def:crs:EPSG::2236';

    /**
     * NAD83 / Florida GDL Albers
     * Extent: USA - Florida
     * For applications with an accuracy of better than 1m, replaced by NAD83(HARN) / Florida GDL Albers.
     */
    public const EPSG_NAD83_FLORIDA_GDL_ALBERS = 'urn:ogc:def:crs:EPSG::3086';

    /**
     * NAD83 / Florida North
     * Extent: USA - Florida - counties of Alachua; Baker; Bay; Bradford; Calhoun; Columbia; Dixie; Escambia; Franklin;
     * Gadsden; Gilchrist; Gulf; Hamilton; Holmes; Jackson; Jefferson; Lafayette; Leon; Liberty; Madison; Okaloosa;
     * Santa Rosa; Suwannee; Taylor; Union; Wakulla; Walton; Washington
     * State law defines system in US survey feet. See code 2238 for equivalent non-metric definition. For applications
     * with an accuracy of better than 1m, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_FLORIDA_NORTH = 'urn:ogc:def:crs:EPSG::26960';

    /**
     * NAD83 / Florida North (ftUS)
     * Extent: USA - Florida - counties of Alachua; Baker; Bay; Bradford; Calhoun; Columbia; Dixie; Escambia; Franklin;
     * Gadsden; Gilchrist; Gulf; Hamilton; Holmes; Jackson; Jefferson; Lafayette; Leon; Liberty; Madison; Okaloosa;
     * Santa Rosa; Suwannee; Taylor; Union; Wakulla; Walton; Washington
     * State law defines system in US survey feet. Federal definition is metric - see code 26960. For applications with
     * an accuracy of better than 3 feet, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_FLORIDA_NORTH_FTUS = 'urn:ogc:def:crs:EPSG::2238';

    /**
     * NAD83 / Florida West
     * Extent: USA - Florida - counties of Charlotte; Citrus; De Soto; Hardee; Hernando; Hillsborough; Lee; Levy;
     * Manatee; Marion; Pasco; Pinellas; Polk; Sarasota; Sumter
     * State law defines system in US survey feet. See code 2237 for equivalent non-metric definition. For applications
     * with an accuracy of better than 1m, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_FLORIDA_WEST = 'urn:ogc:def:crs:EPSG::26959';

    /**
     * NAD83 / Florida West (ftUS)
     * Extent: USA - Florida - counties of Charlotte; Citrus; De Soto; Hardee; Hernando; Hillsborough; Lee; Levy;
     * Manatee; Marion; Pasco; Pinellas; Polk; Sarasota; Sumter
     * State law defines system in US survey feet. Federal definition is metric - see code 26959. For applications with
     * an accuracy of better than 3 feet, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_FLORIDA_WEST_FTUS = 'urn:ogc:def:crs:EPSG::2237';

    /**
     * NAD83 / Georgia East
     * Extent: USA - Georgia - counties of Appling; Atkinson; Bacon; Baldwin; Brantley; Bryan; Bulloch; Burke; Camden;
     * Candler; Charlton; Chatham; Clinch; Coffee; Columbia; Dodge; Echols; Effingham; Elbert; Emanuel; Evans;
     * Franklin; Glascock; Glynn; Greene; Hancock; Hart; Jeff Davis; Jefferson; Jenkins; Johnson; Lanier; Laurens;
     * Liberty; Lincoln; Long; Madison; McDuffie; McIntosh; Montgomery; Oglethorpe; Pierce; Richmond; Screven;
     * Stephens; Taliaferro; Tattnall; Telfair; Toombs; Treutlen; Ware; Warren; Washington; Wayne; Wheeler; Wilkes;
     * Wilkinson
     * State law defines system in US survey feet. See code 2239 for equivalent non-metric definition. For applications
     * with an accuracy of better than 1m, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_GEORGIA_EAST = 'urn:ogc:def:crs:EPSG::26966';

    /**
     * NAD83 / Georgia East (ftUS)
     * Extent: USA - Georgia - counties of Appling; Atkinson; Bacon; Baldwin; Brantley; Bryan; Bulloch; Burke; Camden;
     * Candler; Charlton; Chatham; Clinch; Coffee; Columbia; Dodge; Echols; Effingham; Elbert; Emanuel; Evans;
     * Franklin; Glascock; Glynn; Greene; Hancock; Hart; Jeff Davis; Jefferson; Jenkins; Johnson; Lanier; Laurens;
     * Liberty; Lincoln; Long; Madison; McDuffie; McIntosh; Montgomery; Oglethorpe; Pierce; Richmond; Screven;
     * Stephens; Taliaferro; Tattnall; Telfair; Toombs; Treutlen; Ware; Warren; Washington; Wayne; Wheeler; Wilkes;
     * Wilkinson
     * State law defines system in US survey feet. Federal definition is metric - see code 26966. For applications with
     * an accuracy of better than 3 feet, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_GEORGIA_EAST_FTUS = 'urn:ogc:def:crs:EPSG::2239';

    /**
     * NAD83 / Georgia West
     * Extent: USA - Georgia - counties of Baker; Banks; Barrow; Bartow; Ben Hill; Berrien; Bibb; Bleckley; Brooks;
     * Butts; Calhoun; Carroll; Catoosa; Chattahoochee; Chattooga; Cherokee; Clarke; Clay; Clayton; Cobb; Colquitt;
     * Cook; Coweta; Crawford; Crisp; Dade; Dawson; De Kalb; Decatur; Dooly; Dougherty; Douglas; Early; Fannin;
     * Fayette; Floyd; Forsyth; Fulton; Gilmer; Gordon; Grady; Gwinnett; Habersham; Hall; Haralson; Harris; Heard;
     * Henry; Houston; Irwin; Jackson; Jasper; Jones; Lamar; Lee; Lowndes; Lumpkin; Macon; Marion; Meriwether; Miller;
     * Mitchell; Monroe; Morgan; Murray; Muscogee; Newton; Oconee; Paulding; Peach; Pickens; Pike; Polk; Pulaski;
     * Putnam; Quitman; Rabun; Randolph; Rockdale; Schley; Seminole; Spalding; Stewart; Sumter; Talbot; Taylor;
     * Terrell; Thomas; Tift; Towns; Troup; Turner; Twiggs; Union; Upson; Walker; Walton; Webster; White; Whitfield;
     * Wilcox; Worth
     * State law defines system in US survey feet. See code 2240 for equivalent non-metric definition. For applications
     * with an accuracy of better than 1m, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_GEORGIA_WEST = 'urn:ogc:def:crs:EPSG::26967';

    /**
     * NAD83 / Georgia West (ftUS)
     * Extent: USA - Georgia - counties of Baker; Banks; Barrow; Bartow; Ben Hill; Berrien; Bibb; Bleckley; Brooks;
     * Butts; Calhoun; Carroll; Catoosa; Chattahoochee; Chattooga; Cherokee; Clarke; Clay; Clayton; Cobb; Colquitt;
     * Cook; Coweta; Crawford; Crisp; Dade; Dawson; De Kalb; Decatur; Dooly; Dougherty; Douglas; Early; Fannin;
     * Fayette; Floyd; Forsyth; Fulton; Gilmer; Gordon; Grady; Gwinnett; Habersham; Hall; Haralson; Harris; Heard;
     * Henry; Houston; Irwin; Jackson; Jasper; Jones; Lamar; Lee; Lowndes; Lumpkin; Macon; Marion; Meriwether; Miller;
     * Mitchell; Monroe; Morgan; Murray; Muscogee; Newton; Oconee; Paulding; Peach; Pickens; Pike; Polk; Pulaski;
     * Putnam; Quitman; Rabun; Randolph; Rockdale; Schley; Seminole; Spalding; Stewart; Sumter; Talbot; Taylor;
     * Terrell; Thomas; Tift; Towns; Troup; Turner; Twiggs; Union; Upson; Walker; Walton; Webster; White; Whitfield;
     * Wilcox; Worth
     * State law defines system in US survey feet. Federal definition is metric - see code 26967. For applications with
     * an accuracy of better than 3 feet, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_GEORGIA_WEST_FTUS = 'urn:ogc:def:crs:EPSG::2240';

    /**
     * NAD83 / Great Lakes Albers
     * Extent: Canada and USA - Great Lakes basin.
     */
    public const EPSG_NAD83_GREAT_LAKES_ALBERS = 'urn:ogc:def:crs:EPSG::3174';

    /**
     * NAD83 / Great Lakes and St Lawrence Albers
     * Extent: Canada and USA - Great Lakes basin and St Lawrence Seaway.
     */
    public const EPSG_NAD83_GREAT_LAKES_AND_ST_LAWRENCE_ALBERS = 'urn:ogc:def:crs:EPSG::3175';

    /**
     * NAD83 / Hawaii zone 1
     * Extent: USA - Hawaii - island of Hawaii - onshore
     * For applications with an accuracy of better than 1m, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_HAWAII_ZONE_1 = 'urn:ogc:def:crs:EPSG::26961';

    /**
     * NAD83 / Hawaii zone 2
     * Extent: USA - Hawaii - Maui; Kahoolawe; Lanai; Molokai - onshore
     * For applications with an accuracy of better than 1m, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_HAWAII_ZONE_2 = 'urn:ogc:def:crs:EPSG::26962';

    /**
     * NAD83 / Hawaii zone 3
     * Extent: USA - Hawaii - Oahu - onshore
     * For applications with an accuracy of better than 1m, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_HAWAII_ZONE_3 = 'urn:ogc:def:crs:EPSG::26963';

    /**
     * NAD83 / Hawaii zone 3 (ftUS)
     * Extent: USA - Hawaii - Oahu - onshore
     * State has no law defining grid unit; system therefore not recognised by Federal authorities. For applications
     * with an accuracy of better than 3ft, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_HAWAII_ZONE_3_FTUS = 'urn:ogc:def:crs:EPSG::3759';

    /**
     * NAD83 / Hawaii zone 4
     * Extent: USA - Hawaii - Kauai - onshore
     * For applications with an accuracy of better than 1m, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_HAWAII_ZONE_4 = 'urn:ogc:def:crs:EPSG::26964';

    /**
     * NAD83 / Hawaii zone 5
     * Extent: USA - Hawaii - Niihau - onshore
     * For applications with an accuracy of better than 1m, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_HAWAII_ZONE_5 = 'urn:ogc:def:crs:EPSG::26965';

    /**
     * NAD83 / Idaho Central
     * Extent: USA - Idaho - counties of Blaine; Butte; Camas; Cassia; Custer; Gooding; Jerome; Lemhi; Lincoln;
     * Minidoka; Twin Falls
     * State law defines system in US survey feet. See code 2242 for equivalent non-metric definition. For applications
     * with an accuracy of better than 1m, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_IDAHO_CENTRAL = 'urn:ogc:def:crs:EPSG::26969';

    /**
     * NAD83 / Idaho Central (ftUS)
     * Extent: USA - Idaho - counties of Blaine; Butte; Camas; Cassia; Custer; Gooding; Jerome; Lemhi; Lincoln;
     * Minidoka; Twin Falls
     * State law defines system in US survey feet. Federal definition is metric - see code 26969. For applications with
     * an accuracy of better than 3 feet, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_IDAHO_CENTRAL_FTUS = 'urn:ogc:def:crs:EPSG::2242';

    /**
     * NAD83 / Idaho East
     * Extent: USA - Idaho - counties of Bannock; Bear Lake; Bingham; Bonneville; Caribou; Clark; Franklin; Fremont;
     * Jefferson; Madison; Oneida; Power; Teton
     * State law defines system in US survey feet. See code 2241 for equivalent non-metric definition. For applications
     * with an accuracy of better than 1m, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_IDAHO_EAST = 'urn:ogc:def:crs:EPSG::26968';

    /**
     * NAD83 / Idaho East (ftUS)
     * Extent: USA - Idaho - counties of Bannock; Bear Lake; Bingham; Bonneville; Caribou; Clark; Franklin; Fremont;
     * Jefferson; Madison; Oneida; Power; Teton
     * State law defines system in US survey feet. Federal definition is metric - see code 26968. For applications with
     * an accuracy of better than 3 feet, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_IDAHO_EAST_FTUS = 'urn:ogc:def:crs:EPSG::2241';

    /**
     * NAD83 / Idaho Transverse Mercator
     * Extent: USA - Idaho
     * Replaces IDTM27.
     */
    public const EPSG_NAD83_IDAHO_TRANSVERSE_MERCATOR = 'urn:ogc:def:crs:EPSG::8826';

    /**
     * NAD83 / Idaho West
     * Extent: USA - Idaho - counties of Ada; Adams; Benewah; Boise; Bonner; Boundary; Canyon; Clearwater; Elmore; Gem;
     * Idaho; Kootenai; Latah; Lewis; Nez Perce; Owyhee; Payette; Shoshone; Valley; Washington
     * State law defines system in US survey feet. See code 2243 for equivalent non-metric definition. For applications
     * with an accuracy of better than 1m, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_IDAHO_WEST = 'urn:ogc:def:crs:EPSG::26970';

    /**
     * NAD83 / Idaho West (ftUS)
     * Extent: USA - Idaho - counties of Ada; Adams; Benewah; Boise; Bonner; Boundary; Canyon; Clearwater; Elmore; Gem;
     * Idaho; Kootenai; Latah; Lewis; Nez Perce; Owyhee; Payette; Shoshone; Valley; Washington
     * State law defines system in US survey feet. Federal definition is metric - see code 26970. For applications with
     * an accuracy of better than 3 feet, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_IDAHO_WEST_FTUS = 'urn:ogc:def:crs:EPSG::2243';

    /**
     * NAD83 / Illinois East
     * Extent: USA - Illinois - counties of Boone; Champaign; Clark; Clay; Coles; Cook; Crawford; Cumberland; De Kalb;
     * De Witt; Douglas; Du Page; Edgar; Edwards; Effingham; Fayette; Ford; Franklin; Gallatin; Grundy; Hamilton;
     * Hardin; Iroquois; Jasper; Jefferson; Johnson; Kane; Kankakee; Kendall; La Salle; Lake; Lawrence; Livingston;
     * Macon; Marion; Massac; McHenry; McLean; Moultrie; Piatt; Pope; Richland; Saline; Shelby; Vermilion; Wabash;
     * Wayne; White; Will; Williamson
     * State law defines system in US survey feet. See code 3435 for equivalent non-metric definition. For applications
     * with an accuracy of better than 1m, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_ILLINOIS_EAST = 'urn:ogc:def:crs:EPSG::26971';

    /**
     * NAD83 / Illinois East (ftUS)
     * Extent: USA - Illinois - counties of Boone; Champaign; Clark; Clay; Coles; Cook; Crawford; Cumberland; De Kalb;
     * De Witt; Douglas; Du Page; Edgar; Edwards; Effingham; Fayette; Ford; Franklin; Gallatin; Grundy; Hamilton;
     * Hardin; Iroquois; Jasper; Jefferson; Johnson; Kane; Kankakee; Kendall; La Salle; Lake; Lawrence; Livingston;
     * Macon; Marion; Massac; McHenry; McLean; Moultrie; Piatt; Pope; Richland; Saline; Shelby; Vermilion; Wabash;
     * Wayne; White; Will; Williamson
     * State law defines system in US survey feet. Federal definition is metric - see code 26971. For applications with
     * an accuracy of better than 3 feet, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_ILLINOIS_EAST_FTUS = 'urn:ogc:def:crs:EPSG::3435';

    /**
     * NAD83 / Illinois West
     * Extent: USA - Illinois - counties of Adams; Alexander; Bond; Brown; Bureau; Calhoun; Carroll; Cass; Christian;
     * Clinton; Fulton; Greene; Hancock; Henderson; Henry; Jackson; Jersey; Jo Daviess; Knox; Lee; Logan; Macoupin;
     * Madison; Marshall; Mason; McDonough; Menard; Mercer; Monroe; Montgomery; Morgan; Ogle; Peoria; Perry; Pike;
     * Pulaski; Putnam; Randolph; Rock Island; Sangamon; Schuyler; Scott; St Clair; Stark; Stephenson; Tazewell; Union;
     * Warren; Washington; Whiteside; Winnebago; Woodford
     * State law defines system in US survey feet. See code 3436 for equivalent non-metric definition. For applications
     * with an accuracy of better than 1m, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_ILLINOIS_WEST = 'urn:ogc:def:crs:EPSG::26972';

    /**
     * NAD83 / Illinois West (ftUS)
     * Extent: USA - Illinois - counties of Adams; Alexander; Bond; Brown; Bureau; Calhoun; Carroll; Cass; Christian;
     * Clinton; Fulton; Greene; Hancock; Henderson; Henry; Jackson; Jersey; Jo Daviess; Knox; Lee; Logan; Macoupin;
     * Madison; Marshall; Mason; McDonough; Menard; Mercer; Monroe; Montgomery; Morgan; Ogle; Peoria; Perry; Pike;
     * Pulaski; Putnam; Randolph; Rock Island; Sangamon; Schuyler; Scott; St Clair; Stark; Stephenson; Tazewell; Union;
     * Warren; Washington; Whiteside; Winnebago; Woodford
     * State law defines system in US survey feet. Federal definition is metric - see code 26972. For applications with
     * an accuracy of better than 3 feet, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_ILLINOIS_WEST_FTUS = 'urn:ogc:def:crs:EPSG::3436';

    /**
     * NAD83 / Indiana East
     * Extent: USA - Indiana - counties of Adams; Allen; Bartholomew; Blackford; Brown; Cass; Clark; De Kalb; Dearborn;
     * Decatur; Delaware; Elkhart; Fayette; Floyd; Franklin; Fulton; Grant; Hamilton; Hancock; Harrison; Henry; Howard;
     * Huntington; Jackson; Jay; Jefferson; Jennings; Johnson; Kosciusko; Lagrange; Madison; Marion; Marshall; Miami;
     * Noble; Ohio; Randolph; Ripley; Rush; Scott; Shelby; St Joseph; Steuben; Switzerland; Tipton; Union; Wabash;
     * Washington; Wayne; Wells; Whitley
     * State law defines system in US survey feet. See code 2965 for equivalent non-metric definition. For applications
     * with an accuracy of better than 1m, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_INDIANA_EAST = 'urn:ogc:def:crs:EPSG::26973';

    /**
     * NAD83 / Indiana East (ftUS)
     * Extent: USA - Indiana - counties of Adams; Allen; Bartholomew; Blackford; Brown; Cass; Clark; De Kalb; Dearborn;
     * Decatur; Delaware; Elkhart; Fayette; Floyd; Franklin; Fulton; Grant; Hamilton; Hancock; Harrison; Henry; Howard;
     * Huntington; Jackson; Jay; Jefferson; Jennings; Johnson; Kosciusko; Lagrange; Madison; Marion; Marshall; Miami;
     * Noble; Ohio; Randolph; Ripley; Rush; Scott; Shelby; St Joseph; Steuben; Switzerland; Tipton; Union; Wabash;
     * Washington; Wayne; Wells; Whitley
     * State law defines system in US survey feet. Federal definition is metric - see code 26973. For applications with
     * an accuracy of better than 3 feet, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_INDIANA_EAST_FTUS = 'urn:ogc:def:crs:EPSG::2965';

    /**
     * NAD83 / Indiana West
     * Extent: USA - Indiana - counties of Benton; Boone; Carroll; Clay; Clinton; Crawford; Daviess; Dubois; Fountain;
     * Gibson; Greene; Hendricks; Jasper; Knox; La Porte; Lake; Lawrence; Martin; Monroe; Montgomery; Morgan; Newton;
     * Orange; Owen; Parke; Perry; Pike; Porter; Posey; Pulaski; Putnam; Spencer; Starke; Sullivan; Tippecanoe;
     * Vanderburgh; Vermillion; Vigo; Warren; Warrick; White
     * State law defines system in US survey feet. See code 2966 for equivalent non-metric definition. For applications
     * with an accuracy of better than 1m, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_INDIANA_WEST = 'urn:ogc:def:crs:EPSG::26974';

    /**
     * NAD83 / Indiana West (ftUS)
     * Extent: USA - Indiana - counties of Benton; Boone; Carroll; Clay; Clinton; Crawford; Daviess; Dubois; Fountain;
     * Gibson; Greene; Hendricks; Jasper; Knox; La Porte; Lake; Lawrence; Martin; Monroe; Montgomery; Morgan; Newton;
     * Orange; Owen; Parke; Perry; Pike; Porter; Posey; Pulaski; Putnam; Spencer; Starke; Sullivan; Tippecanoe;
     * Vanderburgh; Vermillion; Vigo; Warren; Warrick; White
     * State law defines system in US survey feet. Federal definition is metric - see code 26974. For applications with
     * an accuracy of better than 3 feet, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_INDIANA_WEST_FTUS = 'urn:ogc:def:crs:EPSG::2966';

    /**
     * NAD83 / Iowa North
     * Extent: USA - Iowa - counties of Allamakee; Benton; Black Hawk; Boone; Bremer; Buchanan; Buena Vista; Butler;
     * Calhoun; Carroll; Cerro Gordo; Cherokee; Chickasaw; Clay; Clayton; Crawford; Delaware; Dickinson; Dubuque;
     * Emmet; Fayette; Floyd; Franklin; Greene; Grundy; Hamilton; Hancock; Hardin; Howard; Humboldt; Ida; Jackson;
     * Jones; Kossuth; Linn; Lyon; Marshall; Mitchell; Monona; O'Brien; Osceola; Palo Alto; Plymouth; Pocahontas; Sac;
     * Sioux; Story; Tama; Webster; Winnebago; Winneshiek; Woodbury; Worth; Wright
     * State law defines system in US survey feet. See code 3417 for equivalent non-metric definition. For applications
     * with an accuracy of better than 1m, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_IOWA_NORTH = 'urn:ogc:def:crs:EPSG::26975';

    /**
     * NAD83 / Iowa North (ftUS)
     * Extent: USA - Iowa - counties of Allamakee; Benton; Black Hawk; Boone; Bremer; Buchanan; Buena Vista; Butler;
     * Calhoun; Carroll; Cerro Gordo; Cherokee; Chickasaw; Clay; Clayton; Crawford; Delaware; Dickinson; Dubuque;
     * Emmet; Fayette; Floyd; Franklin; Greene; Grundy; Hamilton; Hancock; Hardin; Howard; Humboldt; Ida; Jackson;
     * Jones; Kossuth; Linn; Lyon; Marshall; Mitchell; Monona; O'Brien; Osceola; Palo Alto; Plymouth; Pocahontas; Sac;
     * Sioux; Story; Tama; Webster; Winnebago; Winneshiek; Woodbury; Worth; Wright
     * State law defines system in US survey feet. Federal definition is metric - see code 26975. For applications with
     * an accuracy of better than 3 feet, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_IOWA_NORTH_FTUS = 'urn:ogc:def:crs:EPSG::3417';

    /**
     * NAD83 / Iowa South
     * Extent: USA - Iowa - counties of Adair; Adams; Appanoose; Audubon; Cass; Cedar; Clarke; Clinton; Dallas; Davis;
     * Decatur; Des Moines; Fremont; Guthrie; Harrison; Henry; Iowa; Jasper; Jefferson; Johnson; Keokuk; Lee; Louisa;
     * Lucas; Madison; Mahaska; Marion; Mills; Monroe; Montgomery; Muscatine; Page; Polk; Pottawattamie; Poweshiek;
     * Ringgold; Scott; Shelby; Taylor; Union; Van Buren; Wapello; Warren; Washington; Wayne
     * State law defines system in US survey feet. See code 3418 for equivalent non-metric definition. For applications
     * with an accuracy of better than 1m, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_IOWA_SOUTH = 'urn:ogc:def:crs:EPSG::26976';

    /**
     * NAD83 / Iowa South (ftUS)
     * Extent: USA - Iowa - counties of Adair; Adams; Appanoose; Audubon; Cass; Cedar; Clarke; Clinton; Dallas; Davis;
     * Decatur; Des Moines; Fremont; Guthrie; Harrison; Henry; Iowa; Jasper; Jefferson; Johnson; Keokuk; Lee; Louisa;
     * Lucas; Madison; Mahaska; Marion; Mills; Monroe; Montgomery; Muscatine; Page; Polk; Pottawattamie; Poweshiek;
     * Ringgold; Scott; Shelby; Taylor; Union; Van Buren; Wapello; Warren; Washington; Wayne
     * State law defines system in US survey feet. Federal definition is metric - see code 26976. For applications with
     * an accuracy of better than 3 feet, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_IOWA_SOUTH_FTUS = 'urn:ogc:def:crs:EPSG::3418';

    /**
     * NAD83 / Kansas LCC
     * Extent: USA - Kansas
     * KS DOT defines system in US survey feet. See code 6923 for equivalent non-metric definition. For applications
     * with an accuracy of better than 2m, use NAD83(2011) / LCC (m) (CRS code 6924).
     */
    public const EPSG_NAD83_KANSAS_LCC = 'urn:ogc:def:crs:EPSG::6922';

    /**
     * NAD83 / Kansas LCC (ftUS)
     * Extent: USA - Kansas
     * KS DOT defines system in US survey feet. See code 6922 for equivalent metric definition. For applications with
     * an accuracy of better than 5ft, use NAD83(2011) / LCC (ftUS) (CRS code 6924).
     */
    public const EPSG_NAD83_KANSAS_LCC_FTUS = 'urn:ogc:def:crs:EPSG::6923';

    /**
     * NAD83 / Kansas North
     * Extent: USA - Kansas - counties of Atchison; Brown; Cheyenne; Clay; Cloud; Decatur; Dickinson; Doniphan;
     * Douglas; Ellis; Ellsworth; Geary; Gove; Graham; Jackson; Jefferson; Jewell; Johnson; Leavenworth; Lincoln;
     * Logan; Marshall; Mitchell; Morris; Nemaha; Norton; Osborne; Ottawa; Phillips; Pottawatomie; Rawlins; Republic;
     * Riley; Rooks; Russell; Saline; Shawnee; Sheridan; Sherman; Smith; Thomas; Trego; Wabaunsee; Wallace; Washington;
     * Wyandotte
     * State law defines system in US survey feet. See code 3419 for equivalent non-metric definition. For applications
     * with an accuracy of better than 1m, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_KANSAS_NORTH = 'urn:ogc:def:crs:EPSG::26977';

    /**
     * NAD83 / Kansas North (ftUS)
     * Extent: USA - Kansas - counties of Atchison; Brown; Cheyenne; Clay; Cloud; Decatur; Dickinson; Doniphan;
     * Douglas; Ellis; Ellsworth; Geary; Gove; Graham; Jackson; Jefferson; Jewell; Johnson; Leavenworth; Lincoln;
     * Logan; Marshall; Mitchell; Morris; Nemaha; Norton; Osborne; Ottawa; Phillips; Pottawatomie; Rawlins; Republic;
     * Riley; Rooks; Russell; Saline; Shawnee; Sheridan; Sherman; Smith; Thomas; Trego; Wabaunsee; Wallace; Washington;
     * Wyandotte
     * State law defines system in US survey feet. Federal definition is metric - see code 26977. For applications with
     * an accuracy of better than 3 feet, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_KANSAS_NORTH_FTUS = 'urn:ogc:def:crs:EPSG::3419';

    /**
     * NAD83 / Kansas South
     * Extent: USA - Kansas - counties of Allen; Anderson; Barber; Barton; Bourbon; Butler; Chase; Chautauqua;
     * Cherokee; Clark; Coffey; Comanche; Cowley; Crawford; Edwards; Elk; Finney; Ford; Franklin; Grant; Gray; Greeley;
     * Greenwood; Hamilton; Harper; Harvey; Haskell; Hodgeman; Kearny; Kingman; Kiowa; Labette; Lane; Linn; Lyon;
     * Marion; McPherson; Meade; Miami; Montgomery; Morton; Neosho; Ness; Osage; Pawnee; Pratt; Reno; Rice; Rush;
     * Scott; Sedgwick; Seward; Stafford; Stanton; Stevens; Sumner; Wichita; Wilson; Woodson
     * State law defines system in US survey feet. See code 3420 for equivalent non-metric definition. For applications
     * with an accuracy of better than 1m, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_KANSAS_SOUTH = 'urn:ogc:def:crs:EPSG::26978';

    /**
     * NAD83 / Kansas South (ftUS)
     * Extent: USA - Kansas - counties of Allen; Anderson; Barber; Barton; Bourbon; Butler; Chase; Chautauqua;
     * Cherokee; Clark; Coffey; Comanche; Cowley; Crawford; Edwards; Elk; Finney; Ford; Franklin; Grant; Gray; Greeley;
     * Greenwood; Hamilton; Harper; Harvey; Haskell; Hodgeman; Kearny; Kingman; Kiowa; Labette; Lane; Linn; Lyon;
     * Marion; McPherson; Meade; Miami; Montgomery; Morton; Neosho; Ness; Osage; Pawnee; Pratt; Reno; Rice; Rush;
     * Scott; Sedgwick; Seward; Stafford; Stanton; Stevens; Sumner; Wichita; Wilson; Woodson
     * State law defines system in US survey feet. Federal definition is metric - see code 26978. For applications with
     * an accuracy of better than 3 feet, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_KANSAS_SOUTH_FTUS = 'urn:ogc:def:crs:EPSG::3420';

    /**
     * NAD83 / Kentucky North
     * Extent: USA - Kentucky - counties of Anderson; Bath; Boone; Bourbon; Boyd; Bracken; Bullitt; Campbell; Carroll;
     * Carter; Clark; Elliott; Fayette; Fleming; Franklin; Gallatin; Grant; Greenup; Harrison; Henry; Jefferson;
     * Jessamine; Kenton; Lawrence; Lewis; Mason; Menifee; Montgomery; Morgan; Nicholas; Oldham; Owen; Pendleton;
     * Robertson; Rowan; Scott; Shelby; Spencer; Trimble; Woodford
     * State law defines system in US survey feet. See code 2246 for equivalent non-metric definition. For applications
     * with an accuracy of better than 1m, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_KENTUCKY_NORTH = 'urn:ogc:def:crs:EPSG::2205';

    /**
     * NAD83 / Kentucky North (ftUS)
     * Extent: USA - Kentucky - counties of Anderson; Bath; Boone; Bourbon; Boyd; Bracken; Bullitt; Campbell; Carroll;
     * Carter; Clark; Elliott; Fayette; Fleming; Franklin; Gallatin; Grant; Greenup; Harrison; Henry; Jefferson;
     * Jessamine; Kenton; Lawrence; Lewis; Mason; Menifee; Montgomery; Morgan; Nicholas; Oldham; Owen; Pendleton;
     * Robertson; Rowan; Scott; Shelby; Spencer; Trimble; Woodford
     * State law defines system in US survey feet. Federal definition is metric - see code 2205. For applications with
     * an accuracy of better than 3 feet, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_KENTUCKY_NORTH_FTUS = 'urn:ogc:def:crs:EPSG::2246';

    /**
     * NAD83 / Kentucky Single Zone
     * Extent: USA - Kentucky
     * State law defines system in US survey feet. See code 3089 for equivalent non-metric definition. For applications
     * with an accuracy of better than 1m, replaced by NAD83(HARN) / Kentucky (m) (code 3090).
     */
    public const EPSG_NAD83_KENTUCKY_SINGLE_ZONE = 'urn:ogc:def:crs:EPSG::3088';

    /**
     * NAD83 / Kentucky Single Zone (ftUS)
     * Extent: USA - Kentucky
     * State law defines system in US survey feet. See code 3088 for equivalent metric definition. For applications
     * with an accuracy of better than 3 feet, replaced by NAD83(HARN) / Kentucky (ftUS) (code 3091).
     */
    public const EPSG_NAD83_KENTUCKY_SINGLE_ZONE_FTUS = 'urn:ogc:def:crs:EPSG::3089';

    /**
     * NAD83 / Kentucky South
     * Extent: USA - Kentucky - counties of Adair; Allen; Ballard; Barren; Bell; Boyle; Breathitt; Breckinridge;
     * Butler; Caldwell; Calloway; Carlisle; Casey; Christian; Clay; Clinton; Crittenden; Cumberland; Daviess;
     * Edmonson; Estill; Floyd; Fulton; Garrard; Graves; Grayson; Green; Hancock; Hardin; Harlan; Hart; Henderson;
     * Hickman; Hopkins; Jackson; Johnson; Knott; Knox; Larue; Laurel; Lee; Leslie; Letcher; Lincoln; Livingston;
     * Logan; Lyon; Madison; Magoffin; Marion; Marshall; Martin; McCracken; McCreary; McLean; Meade; Mercer; Metcalfe;
     * Monroe; Muhlenberg; Nelson; Ohio; Owsley; Perry; Pike; Powell; Pulaski; Rockcastle; Russell; Simpson; Taylor;
     * Todd; Trigg; Union; Warren; Washington; Wayne; Webster; Whitley; Wolfe
     * State law defines system in US survey feet. See code 2247 for equivalent non-metric definition. For applications
     * with an accuracy of better than 1m, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_KENTUCKY_SOUTH = 'urn:ogc:def:crs:EPSG::26980';

    /**
     * NAD83 / Kentucky South (ftUS)
     * Extent: USA - Kentucky - counties of Adair; Allen; Ballard; Barren; Bell; Boyle; Breathitt; Breckinridge;
     * Butler; Caldwell; Calloway; Carlisle; Casey; Christian; Clay; Clinton; Crittenden; Cumberland; Daviess;
     * Edmonson; Estill; Floyd; Fulton; Garrard; Graves; Grayson; Green; Hancock; Hardin; Harlan; Hart; Henderson;
     * Hickman; Hopkins; Jackson; Johnson; Knott; Knox; Larue; Laurel; Lee; Leslie; Letcher; Lincoln; Livingston;
     * Logan; Lyon; Madison; Magoffin; Marion; Marshall; Martin; McCracken; McCreary; McLean; Meade; Mercer; Metcalfe;
     * Monroe; Muhlenberg; Nelson; Ohio; Owsley; Perry; Pike; Powell; Pulaski; Rockcastle; Russell; Simpson; Taylor;
     * Todd; Trigg; Union; Warren; Washington; Wayne; Webster; Whitley; Wolfe
     * State law defines system in US survey feet. Federal definition is metric - see code 26980. For applications with
     * an accuracy of better than 3 feet, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_KENTUCKY_SOUTH_FTUS = 'urn:ogc:def:crs:EPSG::2247';

    /**
     * NAD83 / Louisiana North
     * Extent: USA - Louisiana - counties of Avoyelles; Bienville; Bossier; Caddo; Caldwell; Catahoula; Claiborne;
     * Concordia; De Soto; East Carroll; Franklin; Grant; Jackson; La Salle; Lincoln; Madison; Morehouse; Natchitoches;
     * Ouachita; Rapides; Red River; Richland; Sabine; Tensas; Union; Vernon; Webster; West Carroll; Winn
     * State law defines system in US survey feet. See code 3451 for equivalent non-metric definition. For applications
     * with an accuracy of better than 1m, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_LOUISIANA_NORTH = 'urn:ogc:def:crs:EPSG::26981';

    /**
     * NAD83 / Louisiana North (ftUS)
     * Extent: USA - Louisiana - counties of Avoyelles; Bienville; Bossier; Caddo; Caldwell; Catahoula; Claiborne;
     * Concordia; De Soto; East Carroll; Franklin; Grant; Jackson; La Salle; Lincoln; Madison; Morehouse; Natchitoches;
     * Ouachita; Rapides; Red River; Richland; Sabine; Tensas; Union; Vernon; Webster; West Carroll; Winn
     * State law defines system in US survey feet. Federal definition is metric - see code 26981. For applications with
     * an accuracy of better than 3 feet, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_LOUISIANA_NORTH_FTUS = 'urn:ogc:def:crs:EPSG::3451';

    /**
     * NAD83 / Louisiana Offshore
     * Extent: USA - central Gulf of Mexico outer continental shelf (GoM OCS) planning area, deep water portion
     * This system is NOT used for oil industry purposes. State law defines system in US survey feet. See code 3453 for
     * equivalent non-metric definition.
     */
    public const EPSG_NAD83_LOUISIANA_OFFSHORE = 'urn:ogc:def:crs:EPSG::32199';

    /**
     * NAD83 / Louisiana Offshore (ftUS)
     * Extent: USA - central Gulf of Mexico outer continental shelf (GoM OCS) planning area, deep water portion
     * This system is NOT used for oil industry purposes. State law defines system in US survey feet. Federal
     * definition is metric - see code 32199.
     */
    public const EPSG_NAD83_LOUISIANA_OFFSHORE_FTUS = 'urn:ogc:def:crs:EPSG::3453';

    /**
     * NAD83 / Louisiana South
     * Extent: USA - Louisiana - counties of Acadia; Allen; Ascension; Assumption; Beauregard; Calcasieu; Cameron; East
     * Baton Rouge; East Feliciana; Evangeline; Iberia; Iberville; Jefferson; Jefferson Davis; Lafayette; LaFourche;
     * Livingston; Orleans; Plaquemines; Pointe Coupee; St Bernard; St Charles; St Helena; St James; St John the
     * Baptist; St Landry; St Martin; St Mary; St Tammany; Tangipahoa; Terrebonne; Vermilion; Washington; West Baton
     * Rouge; West Feliciana
     * State law defines system in US survey feet. See code 3452 for equivalent non-metric definition. For onshore
     * applications with an accuracy of better than 1m, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_LOUISIANA_SOUTH = 'urn:ogc:def:crs:EPSG::26982';

    /**
     * NAD83 / Louisiana South (ftUS)
     * Extent: USA - Louisiana - counties of Acadia; Allen; Ascension; Assumption; Beauregard; Calcasieu; Cameron; East
     * Baton Rouge; East Feliciana; Evangeline; Iberia; Iberville; Jefferson; Jefferson Davis; Lafayette; LaFourche;
     * Livingston; Orleans; Plaquemines; Pointe Coupee; St Bernard; St Charles; St Helena; St James; St John the
     * Baptist; St Landry; St Martin; St Mary; St Tammany; Tangipahoa; Terrebonne; Vermilion; Washington; West Baton
     * Rouge; West Feliciana
     * State law defines system in US survey feet. Federal definition is metric - see code 26982. For applications with
     * an accuracy of better than 3 feet, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_LOUISIANA_SOUTH_FTUS = 'urn:ogc:def:crs:EPSG::3452';

    /**
     * NAD83 / MTM zone 1
     * Extent: Canada - Newfoundland - onshore east of 54°30'W.
     */
    public const EPSG_NAD83_MTM_ZONE_1 = 'urn:ogc:def:crs:EPSG::32181';

    /**
     * NAD83 / MTM zone 10
     * Extent: Canada - Quebec west of 78°W; Canada - Ontario - between 79°30'W and 78°W in area to north of 47°N;
     * between 80°15'W and 78°W in area between 46°N and 47°N; between 81°W and 78°W in area south of 46°N
     * Known in Quebec as "NAD83 / SCoPQ zone 10" with axis 1 and 2 abbreviations of "X" and "Y" respectively.
     */
    public const EPSG_NAD83_MTM_ZONE_10 = 'urn:ogc:def:crs:EPSG::32190';

    /**
     * NAD83 / MTM zone 11
     * Extent: Canada - Ontario - south of 46°N and west of 81°W.
     */
    public const EPSG_NAD83_MTM_ZONE_11 = 'urn:ogc:def:crs:EPSG::32191';

    /**
     * NAD83 / MTM zone 12
     * Extent: Canada - Ontario - between 82°30'W and 79°30'W: north of 46°N in area between 82°30'W and 80°15'W,
     * north of 47°N in area between 80°15'W and 79°30'W.
     */
    public const EPSG_NAD83_MTM_ZONE_12 = 'urn:ogc:def:crs:EPSG::32192';

    /**
     * NAD83 / MTM zone 13
     * Extent: Canada - Ontario - between 85°30'W and 82°30'W and north of 46°N.
     */
    public const EPSG_NAD83_MTM_ZONE_13 = 'urn:ogc:def:crs:EPSG::32193';

    /**
     * NAD83 / MTM zone 14
     * Extent: Canada - Ontario - between 88°30'W and 85°30'W.
     */
    public const EPSG_NAD83_MTM_ZONE_14 = 'urn:ogc:def:crs:EPSG::32194';

    /**
     * NAD83 / MTM zone 15
     * Extent: Canada - Ontario - between 91°30'W and 88°30'W.
     */
    public const EPSG_NAD83_MTM_ZONE_15 = 'urn:ogc:def:crs:EPSG::32195';

    /**
     * NAD83 / MTM zone 16
     * Extent: Canada - Ontario - between 94°30'W and 91°30'W.
     */
    public const EPSG_NAD83_MTM_ZONE_16 = 'urn:ogc:def:crs:EPSG::32196';

    /**
     * NAD83 / MTM zone 17
     * Extent: Canada - Ontario - west of 94°30'W.
     */
    public const EPSG_NAD83_MTM_ZONE_17 = 'urn:ogc:def:crs:EPSG::32197';

    /**
     * NAD83 / MTM zone 2
     * Extent: Canada - Newfoundland and Labrador between 57°30'W and 54°30'W.
     */
    public const EPSG_NAD83_MTM_ZONE_2 = 'urn:ogc:def:crs:EPSG::32182';

    /**
     * NAD83 / MTM zone 3
     * Extent: Canada - Newfoundland and Labrador between 60°W and 57°30'W; Canada - Quebec east of 60°W
     * Known in Quebec as "NAD83 / SCoPQ zone 3" with axis 1 and 2 abbreviations of "X" and "Y" respectively.
     */
    public const EPSG_NAD83_MTM_ZONE_3 = 'urn:ogc:def:crs:EPSG::32183';

    /**
     * NAD83 / MTM zone 4
     * Extent: Canada - Quebec and Labrador between 63°W and 60°W
     * Known in Quebec as "NAD83 / SCoPQ zone 4" with axis 1 and 2 abbreviations of "X" and "Y" respectively.
     */
    public const EPSG_NAD83_MTM_ZONE_4 = 'urn:ogc:def:crs:EPSG::32184';

    /**
     * NAD83 / MTM zone 5
     * Extent: Canada - Quebec and Labrador between 66°W and 63°W
     * Known in Quebec as "NAD83 / SCoPQ zone 5" with axis 1 and 2 abbreviations of "X" and "Y" respectively.
     */
    public const EPSG_NAD83_MTM_ZONE_5 = 'urn:ogc:def:crs:EPSG::32185';

    /**
     * NAD83 / MTM zone 6
     * Extent: Canada - Quebec and Labrador between 69°W and 66°W
     * Known in Quebec as "NAD83 / SCoPQ zone 6" with axis 1 and 2 abbreviations of "X" and "Y" respectively.
     */
    public const EPSG_NAD83_MTM_ZONE_6 = 'urn:ogc:def:crs:EPSG::32186';

    /**
     * NAD83 / MTM zone 7
     * Extent: Canada - Quebec - between 72°W and 69°W
     * Known in Quebec as "NAD83 / SCoPQ zone 7" with axis 1 and 2 abbreviations of "X" and "Y" respectively.
     */
    public const EPSG_NAD83_MTM_ZONE_7 = 'urn:ogc:def:crs:EPSG::32187';

    /**
     * NAD83 / MTM zone 8
     * Extent: Canada - Quebec between 75°W and 72°W.; Canada - Ontario - east of 75°W
     * Known in Quebec as "NAD83 / SCoPQ zone 8" with axis 1 and 2 abbreviations of "X" and "Y" respectively.
     */
    public const EPSG_NAD83_MTM_ZONE_8 = 'urn:ogc:def:crs:EPSG::32188';

    /**
     * NAD83 / MTM zone 9
     * Extent: Canada - Quebec and Ontario - between 78°W and 75°W
     * Known in Quebec as "NAD83 / SCoPQ zone 9" with axis 1 and 2 abbreviations of "X" and "Y" respectively.
     */
    public const EPSG_NAD83_MTM_ZONE_9 = 'urn:ogc:def:crs:EPSG::32189';

    /**
     * NAD83 / MTQ Lambert
     * Extent: Canada - Quebec
     * Replaces NAD27 / MTQ Lambert (CRS code 3797). For accuracies better tham 1m replaced by NAD83(CSRS) / MTQ
     * Lambert (CRS code 3799).
     */
    public const EPSG_NAD83_MTQ_LAMBERT = 'urn:ogc:def:crs:EPSG::3798';

    /**
     * NAD83 / Maine CS2000 Central
     * Extent: USA - Maine between approximately 69°40'W and 68°25'W. The area is bounded by the following: Beginning
     * at the point determined by the intersection of the Maine State line and the County Line between Aroostook and
     * Somerset Counties, thence northeasterly along the state line to the intersection of the Fort Kent - Frenchville
     * town line, thence southerly along this town line to the intersection with the New Canada Plantation - T17 R5
     * WELS town line, thence continuing southerly along town lines to the northeast corner of Penobscot County, thence
     * continuing southerly along the Penobscot County line to the intersection of the Woodville - Mattawamkeag town
     * line (being determined by the Penobscot River), thence along the Penobscot River to the Enfield - Lincoln town
     * line, thence southeasterly along the Enfield - Lincoln town line and the Enfield - Lowell town line to the
     * Passadumkeag - Edinburg town line, thence south-southeasterly along town lines to the intersection of the
     * Hancock County line, thence southerly along the county line to the intersection of the Otis - Mariaville town
     * line, thence southerly along the Otis - Mariaville town line to the Ellsworth city line, thence southerly along
     * the Ellsworth city line to the intersection of the Surry - Trenton town line, thence southerly along the
     * easterly town lines of Surry, Blue Hill, Brooklin, Deer Isle, and Stonington to the Knox County line, thence
     * following the Knox County line to the boundary of the State of Maine as determined by Maritime law, thence
     * following the State boundary westerly to the intersection of the Sagadahoc - Lincoln county line, thence
     * northerly along the easterly boundary of the Maine 2000 West Zone, as defined, to the point of beginning
     * In Maine Department of Transportation and other State agencies replaces CS27 and SPCS83 from 1/1/2001. For
     * applications with an accuracy of better than 1m, replaced by NAD83(HARN) / CS2000.
     */
    public const EPSG_NAD83_MAINE_CS2000_CENTRAL = 'urn:ogc:def:crs:EPSG::3463';

    /**
     * NAD83 / Maine CS2000 East
     * Extent: USA - Maine east of approximately 68°25'W. The area is bounded by the following: Beginning at the point
     * determined by the intersection of the Maine State line and the Fort Kent - Frenchville town line, thence
     * continuing easterly and then southerly along the state line to the boundary of the State of Maine as determined
     * by Maritime law, thence following the State boundary westerly to the intersection of the Knox and Hancock County
     * line, thence northerly along the easterly boundary of the Maine 2000 Central Zone, as defined, to the point of
     * beginning
     * In Maine Department of Transportation and other State agencies replaces CS27 and SPCS83 from 1/1/2001. For
     * applications with an accuracy of better than 1m, replaced by NAD83(HARN) / CS2000.
     */
    public const EPSG_NAD83_MAINE_CS2000_EAST = 'urn:ogc:def:crs:EPSG::3072';

    /**
     * NAD83 / Maine CS2000 West
     * Extent: USA - Maine west of approximately 69°40'W. The area is bounded by the following: Beginning at the point
     * determined by the intersection of the Maine State line and the County Line between Aroostook and Somerset
     * Counties, thence following the Somerset County line Easterly to the Northwest corner of the Somerset and
     * Piscataquis county line, thence Southerly along this county line to the northeast corner of the Athens town
     * line, thence westerly along the town line between Brighton Plantation and Athens to the westerly corner of
     * Athens, and continuing southerly to the southwest corner of the town of Athens where it meets the Cornville town
     * line, thence westerly along the Cornville - Solon town line to the intersection of the Cornville - Madison town
     * line, thence southerly and westerly following the Madison town line to the intersection of the Norridgewock -
     * Skowhegan town line, thence southerly along the Skowhegan town line to the Fairfield town line, thence easterly
     * along the Fairfield town line to the Clinton town line (being determined by the Kennebec River), thence
     * southerly along the Kennebec River to the Augusta city line, thence easterly along the city line to the Windsor
     * town line, thence southerly along the Augusta - Windsor town line to the northwest corner of the Lincoln County
     * line, thence southerly along the westerly Lincoln county line to the boundary of the State of Maine as
     * determined by Maritime law, thence following the State boundary on the westerly side of the state to the point
     * of beginning
     * In Maine Department of Transportation and other State agencies replaces CS27 and SPCS83 from 1/1/2001. For
     * applications with an accuracy of better than 1m, replaced by NAD83(HARN) / CS2000.
     */
    public const EPSG_NAD83_MAINE_CS2000_WEST = 'urn:ogc:def:crs:EPSG::3074';

    /**
     * NAD83 / Maine East
     * Extent: USA - Maine - counties of Aroostook; Hancock; Knox; Penobscot; Piscataquis; Waldo; Washington
     * State law defines system in US survey feet. See code 26847 for equivalent non-metric definition. For
     * applications with an accuracy of better than 1m, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_MAINE_EAST = 'urn:ogc:def:crs:EPSG::26983';

    /**
     * NAD83 / Maine East (ftUS)
     * Extent: USA - Maine - counties of Aroostook; Hancock; Knox; Penobscot; Piscataquis; Waldo; Washington
     * State law defines use of US survey feet. Federal definition is metric - see code 26983. For applications with an
     * accuracy of better than 3ft, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_MAINE_EAST_FTUS = 'urn:ogc:def:crs:EPSG::26847';

    /**
     * NAD83 / Maine West
     * Extent: USA - Maine - counties of Androscoggin; Cumberland; Franklin; Kennebec; Lincoln; Oxford; Sagadahoc;
     * Somerset; York
     * State law defines system in US survey feet. See code 26848 for equivalent non-metric definition. For
     * applications with an accuracy of better than 1m, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_MAINE_WEST = 'urn:ogc:def:crs:EPSG::26984';

    /**
     * NAD83 / Maine West (ftUS)
     * Extent: USA - Maine - counties of Androscoggin; Cumberland; Franklin; Kennebec; Lincoln; Oxford; Sagadahoc;
     * Somerset; York
     * State law defines use of US survey feet. Federal definition is metric - see code 26984. For applications with an
     * accuracy of better than 3ft, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_MAINE_WEST_FTUS = 'urn:ogc:def:crs:EPSG::26848';

    /**
     * NAD83 / Maryland
     * Extent: USA - Maryland - counties of Allegany; Anne Arundel; Baltimore; Calvert; Caroline; Carroll; Cecil;
     * Charles; Dorchester; Frederick; Garrett; Harford; Howard; Kent; Montgomery; Prince Georges; Queen Annes;
     * Somerset; St Marys; Talbot; Washington; Wicomico; Worcester
     * State law defines system in US survey feet. See code 2248 for equivalent non-metric definition. For applications
     * with an accuracy of better than 1m, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_MARYLAND = 'urn:ogc:def:crs:EPSG::26985';

    /**
     * NAD83 / Maryland (ftUS)
     * Extent: USA - Maryland - counties of Allegany; Anne Arundel; Baltimore; Calvert; Caroline; Carroll; Cecil;
     * Charles; Dorchester; Frederick; Garrett; Harford; Howard; Kent; Montgomery; Prince Georges; Queen Annes;
     * Somerset; St Marys; Talbot; Washington; Wicomico; Worcester
     * State law defines system in US survey feet. Federal definition is metric - see code 26985. For applications with
     * an accuracy of better than 3 feet, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_MARYLAND_FTUS = 'urn:ogc:def:crs:EPSG::2248';

    /**
     * NAD83 / Massachusetts Island
     * Extent: USA - Massachusetts offshore - counties of Dukes; Nantucket
     * State law defines system in US survey feet. See code 2250 for equivalent non-metric definition. For applications
     * with an accuracy of better than 1m, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_MASSACHUSETTS_ISLAND = 'urn:ogc:def:crs:EPSG::26987';

    /**
     * NAD83 / Massachusetts Island (ftUS)
     * Extent: USA - Massachusetts offshore - counties of Dukes; Nantucket
     * State law defines system in US survey feet. Federal definition is metric - see code 26987. For applications with
     * an accuracy of better than 3 feet, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_MASSACHUSETTS_ISLAND_FTUS = 'urn:ogc:def:crs:EPSG::2250';

    /**
     * NAD83 / Massachusetts Mainland
     * Extent: USA - Massachusetts onshore - counties of Barnstable; Berkshire; Bristol; Essex; Franklin; Hampden;
     * Hampshire; Middlesex; Norfolk; Plymouth; Suffolk; Worcester
     * State law defines system in US survey feet. See code 2249 for equivalent non-metric definition. For applications
     * with an accuracy of better than 1m, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_MASSACHUSETTS_MAINLAND = 'urn:ogc:def:crs:EPSG::26986';

    /**
     * NAD83 / Massachusetts Mainland (ftUS)
     * Extent: USA - Massachusetts onshore - counties of Barnstable; Berkshire; Bristol; Essex; Franklin; Hampden;
     * Hampshire; Middlesex; Norfolk; Plymouth; Suffolk; Worcester
     * State law defines system in US survey feet. Federal definition is metric - see code 26986. For applications with
     * an accuracy of better than 3 feet, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_MASSACHUSETTS_MAINLAND_FTUS = 'urn:ogc:def:crs:EPSG::2249';

    /**
     * NAD83 / Michigan Central
     * Extent: USA - Michigan - counties of Alcona; Alpena; Antrim; Arenac; Benzie; Charlevoix; Cheboygan; Clare;
     * Crawford; Emmet; Gladwin; Grand Traverse; Iosco; Kalkaska; Lake; Leelanau; Manistee; Mason; Missaukee;
     * Montmorency; Ogemaw; Osceola; Oscoda; Otsego; Presque Isle; Roscommon; Wexford
     * State law defines system in International feet (note: not US survey feet). See code 2252 for equivalent
     * non-metric definition. For applications with an accuracy of better than 1m, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_MICHIGAN_CENTRAL = 'urn:ogc:def:crs:EPSG::26989';

    /**
     * NAD83 / Michigan Central (ft)
     * Extent: USA - Michigan - counties of Alcona; Alpena; Antrim; Arenac; Benzie; Charlevoix; Cheboygan; Clare;
     * Crawford; Emmet; Gladwin; Grand Traverse; Iosco; Kalkaska; Lake; Leelanau; Manistee; Mason; Missaukee;
     * Montmorency; Ogemaw; Osceola; Oscoda; Otsego; Presque Isle; Roscommon; Wexford
     * State law defines system in International feet (note: not US survey feet). Federal definition is metric - see
     * code 26989. For applications with an accuracy of better than 3 feet, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_MICHIGAN_CENTRAL_FT = 'urn:ogc:def:crs:EPSG::2252';

    /**
     * NAD83 / Michigan North
     * Extent: USA - Michigan north of approximately 45°45'N - counties of Alger; Baraga; Chippewa; Delta; Dickinson;
     * Gogebic; Houghton; Iron; Keweenaw; Luce; Mackinac; Marquette; Menominee; Ontonagon; Schoolcraft
     * State law defines system in International feet (note: not US survey feet). See code 2251 for equivalent
     * non-metric definition. For applications with an accuracy of better than 1m, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_MICHIGAN_NORTH = 'urn:ogc:def:crs:EPSG::26988';

    /**
     * NAD83 / Michigan North (ft)
     * Extent: USA - Michigan north of approximately 45°45'N - counties of Alger; Baraga; Chippewa; Delta; Dickinson;
     * Gogebic; Houghton; Iron; Keweenaw; Luce; Mackinac; Marquette; Menominee; Ontonagon; Schoolcraft
     * State law defines system in International feet (note: not US survey feet). Federal definition is metric - see
     * code 26988. For applications with an accuracy of better than 3 feet, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_MICHIGAN_NORTH_FT = 'urn:ogc:def:crs:EPSG::2251';

    /**
     * NAD83 / Michigan Oblique Mercator
     * Extent: USA - Michigan
     * For applications with an accuracy of better than 1m, replaced by NAD83(HARN) / Michigan Oblique Mercator.
     */
    public const EPSG_NAD83_MICHIGAN_OBLIQUE_MERCATOR = 'urn:ogc:def:crs:EPSG::3078';

    /**
     * NAD83 / Michigan South
     * Extent: USA - Michigan - counties of Allegan; Barry; Bay; Berrien; Branch; Calhoun; Cass; Clinton; Eaton;
     * Genesee; Gratiot; Hillsdale; Huron; Ingham; Ionia; Isabella; Jackson; Kalamazoo; Kent; Lapeer; Lenawee;
     * Livingston; Macomb; Mecosta; Midland; Monroe; Montcalm; Muskegon; Newaygo; Oakland; Oceana; Ottawa; Saginaw;
     * Sanilac; Shiawassee; St Clair; St Joseph; Tuscola; Van Buren; Washtenaw; Wayne
     * State law defines system in International feet (note: not US survey feet). See code 2253 for equivalent
     * non-metric definition. For applications with an accuracy of better than 1m, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_MICHIGAN_SOUTH = 'urn:ogc:def:crs:EPSG::26990';

    /**
     * NAD83 / Michigan South (ft)
     * Extent: USA - Michigan - counties of Allegan; Barry; Bay; Berrien; Branch; Calhoun; Cass; Clinton; Eaton;
     * Genesee; Gratiot; Hillsdale; Huron; Ingham; Ionia; Isabella; Jackson; Kalamazoo; Kent; Lapeer; Lenawee;
     * Livingston; Macomb; Mecosta; Midland; Monroe; Montcalm; Muskegon; Newaygo; Oakland; Oceana; Ottawa; Saginaw;
     * Sanilac; Shiawassee; St Clair; St Joseph; Tuscola; Van Buren; Washtenaw; Wayne
     * State law defines system in International feet (note: not US survey feet). Federal definition is metric - see
     * code 26990. For applications with an accuracy of better than 3 feet, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_MICHIGAN_SOUTH_FT = 'urn:ogc:def:crs:EPSG::2253';

    /**
     * NAD83 / Minnesota Central
     * Extent: USA - Minnesota - counties of Aitkin; Becker; Benton; Carlton; Cass; Chisago; Clay; Crow Wing; Douglas;
     * Grant; Hubbard; Isanti; Kanabec; Mille Lacs; Morrison; Otter Tail; Pine; Pope; Stearns; Stevens; Todd; Traverse;
     * Wadena; Wilkin
     * State law defines system in US survey feet. See code 26850 for equivalent non-metric definition. For
     * applications with an accuracy of better than 1m, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_MINNESOTA_CENTRAL = 'urn:ogc:def:crs:EPSG::26992';

    /**
     * NAD83 / Minnesota Central (ftUS)
     * Extent: USA - Minnesota - counties of Aitkin; Becker; Benton; Carlton; Cass; Chisago; Clay; Crow Wing; Douglas;
     * Grant; Hubbard; Isanti; Kanabec; Mille Lacs; Morrison; Otter Tail; Pine; Pope; Stearns; Stevens; Todd; Traverse;
     * Wadena; Wilkin
     * State law defines use of US survey feet. Federal definition is metric - see code 26992. For applications with an
     * accuracy of better than 3ft, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_MINNESOTA_CENTRAL_FTUS = 'urn:ogc:def:crs:EPSG::26850';

    /**
     * NAD83 / Minnesota North
     * Extent: USA - Minnesota - counties of Beltrami; Clearwater; Cook; Itasca; Kittson; Koochiching; Lake; Lake of
     * the Woods; Mahnomen; Marshall; Norman; Pennington; Polk; Red Lake; Roseau; St Louis
     * State law defines system in US survey feet. See code 26849 for equivalent non-metric definition. For
     * applications with an accuracy of better than 1m, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_MINNESOTA_NORTH = 'urn:ogc:def:crs:EPSG::26991';

    /**
     * NAD83 / Minnesota North (ftUS)
     * Extent: USA - Minnesota - counties of Beltrami; Clearwater; Cook; Itasca; Kittson; Koochiching; Lake; Lake of
     * the Woods; Mahnomen; Marshall; Norman; Pennington; Polk; Red Lake; Roseau; St Louis
     * State law defines use of US survey feet. Federal definition is metric - see code 26991. For applications with an
     * accuracy of better than 3ft, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_MINNESOTA_NORTH_FTUS = 'urn:ogc:def:crs:EPSG::26849';

    /**
     * NAD83 / Minnesota South
     * Extent: USA - Minnesota - counties of Anoka; Big Stone; Blue Earth; Brown; Carver; Chippewa; Cottonwood; Dakota;
     * Dodge; Faribault; Fillmore; Freeborn; Goodhue; Hennepin; Houston; Jackson; Kandiyohi; Lac Qui Parle; Le Sueur;
     * Lincoln; Lyon; Martin; McLeod; Meeker; Mower; Murray; Nicollet; Nobles; Olmsted; Pipestone; Ramsey; Redwood;
     * Renville; Rice; Rock; Scott; Sherburne; Sibley; Steele; Swift; Wabasha; Waseca; Washington; Watonwan; Winona;
     * Wright; Yellow Medicine
     * State law defines system in US survey feet. See code 26851 for equivalent non-metric definition. For
     * applications with an accuracy of better than 1m, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_MINNESOTA_SOUTH = 'urn:ogc:def:crs:EPSG::26993';

    /**
     * NAD83 / Minnesota South (ftUS)
     * Extent: USA - Minnesota - counties of Anoka; Big Stone; Blue Earth; Brown; Carver; Chippewa; Cottonwood; Dakota;
     * Dodge; Faribault; Fillmore; Freeborn; Goodhue; Hennepin; Houston; Jackson; Kandiyohi; Lac Qui Parle; Le Sueur;
     * Lincoln; Lyon; Martin; McLeod; Meeker; Mower; Murray; Nicollet; Nobles; Olmsted; Pipestone; Ramsey; Redwood;
     * Renville; Rice; Rock; Scott; Sherburne; Sibley; Steele; Swift; Wabasha; Waseca; Washington; Watonwan; Winona;
     * Wright; Yellow Medicine
     * State law defines use of US survey feet. Federal definition is metric - see code 26993. For applications with an
     * accuracy of better than 3ft, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_MINNESOTA_SOUTH_FTUS = 'urn:ogc:def:crs:EPSG::26851';

    /**
     * NAD83 / Mississippi East
     * Extent: USA - Mississippi - counties of Alcorn; Attala; Benton; Calhoun; Chickasaw; Choctaw; Clarke; Clay;
     * Covington; Forrest; George; Greene; Hancock; Harrison; Itawamba; Jackson; Jasper; Jones; Kemper; Lafayette;
     * Lamar; Lauderdale; Leake; Lee; Lowndes; Marshall; Monroe; Neshoba; Newton; Noxubee; Oktibbeha; Pearl River;
     * Perry; Pontotoc; Prentiss; Scott; Smith; Stone; Tippah; Tishomingo; Union; Wayne; Webster; Winston
     * State law defines system in US survey feet. See code 2254 for equivalent non-metric definition. For applications
     * with an accuracy of better than 1m, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_MISSISSIPPI_EAST = 'urn:ogc:def:crs:EPSG::26994';

    /**
     * NAD83 / Mississippi East (ftUS)
     * Extent: USA - Mississippi - counties of Alcorn; Attala; Benton; Calhoun; Chickasaw; Choctaw; Clarke; Clay;
     * Covington; Forrest; George; Greene; Hancock; Harrison; Itawamba; Jackson; Jasper; Jones; Kemper; Lafayette;
     * Lamar; Lauderdale; Leake; Lee; Lowndes; Marshall; Monroe; Neshoba; Newton; Noxubee; Oktibbeha; Pearl River;
     * Perry; Pontotoc; Prentiss; Scott; Smith; Stone; Tippah; Tishomingo; Union; Wayne; Webster; Winston
     * State law defines system in US survey feet. Federal definition is metric - see code 26994. For applications with
     * an accuracy of better than 3 feet, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_MISSISSIPPI_EAST_FTUS = 'urn:ogc:def:crs:EPSG::2254';

    /**
     * NAD83 / Mississippi TM
     * Extent: USA - Mississippi
     * For applications with an accuracy of better than 1m, replaced by NAD83(HARN) / Mississippi TM (code 3815).
     */
    public const EPSG_NAD83_MISSISSIPPI_TM = 'urn:ogc:def:crs:EPSG::3814';

    /**
     * NAD83 / Mississippi West
     * Extent: USA - Mississippi - counties of Adams; Amite; Bolivar; Carroll; Claiborne; Coahoma; Copiah; De Soto;
     * Franklin; Grenada; Hinds; Holmes; Humphreys; Issaquena; Jefferson; Jefferson Davis; Lawrence; Leflore; Lincoln;
     * Madison; Marion; Montgomery; Panola; Pike; Quitman; Rankin; Sharkey; Simpson; Sunflower; Tallahatchie; Tate;
     * Tunica; Walthall; Warren; Washington; Wilkinson; Yalobusha; Yazoo
     * State law defines system in US survey feet. See code 2255 for equivalent non-metric definition. For applications
     * with an accuracy of better than 1m, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_MISSISSIPPI_WEST = 'urn:ogc:def:crs:EPSG::26995';

    /**
     * NAD83 / Mississippi West (ftUS)
     * Extent: USA - Mississippi - counties of Adams; Amite; Bolivar; Carroll; Claiborne; Coahoma; Copiah; De Soto;
     * Franklin; Grenada; Hinds; Holmes; Humphreys; Issaquena; Jefferson; Jefferson Davis; Lawrence; Leflore; Lincoln;
     * Madison; Marion; Montgomery; Panola; Pike; Quitman; Rankin; Sharkey; Simpson; Sunflower; Tallahatchie; Tate;
     * Tunica; Walthall; Warren; Washington; Wilkinson; Yalobusha; Yazoo
     * State law defines system in US survey feet. Federal definition is metric - see code 26995. For applications with
     * an accuracy of better than 3 feet, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_MISSISSIPPI_WEST_FTUS = 'urn:ogc:def:crs:EPSG::2255';

    /**
     * NAD83 / Missouri Central
     * Extent: USA - Missouri - counties of Adair; Audrain; Benton; Boone; Callaway; Camden; Carroll; Chariton;
     * Christian; Cole; Cooper; Dallas; Douglas; Greene; Grundy; Hickory; Howard; Howell; Knox; Laclede; Linn;
     * Livingston; Macon; Maries; Mercer; Miller; Moniteau; Monroe; Morgan; Osage; Ozark; Pettis; Phelps; Polk;
     * Pulaski; Putnam; Randolph; Saline; Schuyler; Scotland; Shelby; Stone; Sullivan; Taney; Texas; Webster; Wright
     * For applications with an accuracy of better than 1m, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_MISSOURI_CENTRAL = 'urn:ogc:def:crs:EPSG::26997';

    /**
     * NAD83 / Missouri East
     * Extent: USA - Missouri - counties of Bollinger; Butler; Cape Girardeau; Carter; Clark; Crawford; Dent; Dunklin;
     * Franklin; Gasconade; Iron; Jefferson; Lewis; Lincoln; Madison; Marion; Mississippi; Montgomery; New Madrid;
     * Oregon; Pemiscot; Perry; Pike; Ralls; Reynolds; Ripley; Scott; Shannon; St Charles; St Francois; St Louis; Ste.
     * Genevieve; Stoddard; Warren; Washington; Wayne
     * For applications with an accuracy of better than 1m, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_MISSOURI_EAST = 'urn:ogc:def:crs:EPSG::26996';

    /**
     * NAD83 / Missouri West
     * Extent: USA - Missouri - counties of Andrew; Atchison; Barry; Barton; Bates; Buchanan; Caldwell; Cass; Cedar;
     * Clay; Clinton; Dade; Daviess; De Kalb; Gentry; Harrison; Henry; Holt; Jackson; Jasper; Johnson; Lafayette;
     * Lawrence; McDonald; Newton; Nodaway; Platte; Ray; St Clair; Vernon; Worth
     * For applications with an accuracy of better than 1m, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_MISSOURI_WEST = 'urn:ogc:def:crs:EPSG::26998';

    /**
     * NAD83 / Montana
     * Extent: USA - Montana - counties of Beaverhead; Big Horn; Blaine; Broadwater; Carbon; Carter; Cascade; Chouteau;
     * Custer; Daniels; Dawson; Deer Lodge; Fallon; Fergus; Flathead; Gallatin; Garfield; Glacier; Golden Valley;
     * Granite; Hill; Jefferson; Judith Basin; Lake; Lewis and Clark; Liberty; Lincoln; Madison; McCone; Meagher;
     * Mineral; Missoula; Musselshell; Park; Petroleum; Phillips; Pondera; Powder River; Powell; Prairie; Ravalli;
     * Richland; Roosevelt; Rosebud; Sanders; Sheridan; Silver Bow; Stillwater; Sweet Grass; Teton; Toole; Treasure;
     * Valley; Wheatland; Wibaux; Yellowstone
     * State law defines system in International feet (note: not US survey feet). See code 2256 for equivalent
     * non-metric definition. For applications with an accuracy of better than 1m, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_MONTANA = 'urn:ogc:def:crs:EPSG::32100';

    /**
     * NAD83 / Montana (ft)
     * Extent: USA - Montana - counties of Beaverhead; Big Horn; Blaine; Broadwater; Carbon; Carter; Cascade; Chouteau;
     * Custer; Daniels; Dawson; Deer Lodge; Fallon; Fergus; Flathead; Gallatin; Garfield; Glacier; Golden Valley;
     * Granite; Hill; Jefferson; Judith Basin; Lake; Lewis and Clark; Liberty; Lincoln; Madison; McCone; Meagher;
     * Mineral; Missoula; Musselshell; Park; Petroleum; Phillips; Pondera; Powder River; Powell; Prairie; Ravalli;
     * Richland; Roosevelt; Rosebud; Sanders; Sheridan; Silver Bow; Stillwater; Sweet Grass; Teton; Toole; Treasure;
     * Valley; Wheatland; Wibaux; Yellowstone
     * State law defines system in International feet (note: not US survey feet). Federal definition is metric - see
     * code 32100. For applications with an accuracy of better than 3 feet, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_MONTANA_FT = 'urn:ogc:def:crs:EPSG::2256';

    /**
     * NAD83 / NCRS Las Vegas (ftUS)
     * Extent: USA - Nevada - Las Vegas area below approximately 3000 feet
     * Part of the Nevada Coordinate Reference System (NCRS). Defined in meters, usage is in feet. See CRS code 8379
     * for equivalent metric definition. Replaced by NAD83(2011) / NCRS Las Vegas (ftUS) (CRS code 8384).
     */
    public const EPSG_NAD83_NCRS_LAS_VEGAS_FTUS = 'urn:ogc:def:crs:EPSG::8380';

    /**
     * NAD83 / NCRS Las Vegas (m)
     * Extent: USA - Nevada - Las Vegas area below approximately 3000 feet
     * Part of the Nevada Coordinate Reference System (NCRS). Defined in meters, usage is in feet - see CRS code 8380.
     * Replaced by NAD83(2011) / NCRS Las Vegas (m) (CRS code 8383).
     */
    public const EPSG_NAD83_NCRS_LAS_VEGAS_M = 'urn:ogc:def:crs:EPSG::8379';

    /**
     * NAD83 / NCRS Las Vegas high (ftUS)
     * Extent: USA - Nevada - Las Vegas area above approximately 2850 feet
     * Part of the Nevada Coordinate Reference System (NCRS). Defined in meters, usage is in feet. See CRS code 8381
     * for equivalent metric definition. Replaced by NAD83(2011) / NCRS Las Vegas (ftUS) (CRS code 8387).
     */
    public const EPSG_NAD83_NCRS_LAS_VEGAS_HIGH_FTUS = 'urn:ogc:def:crs:EPSG::8382';

    /**
     * NAD83 / NCRS Las Vegas high (m)
     * Extent: USA - Nevada - Las Vegas area above approximately 2850 feet
     * Part of the Nevada Coordinate Reference System (NCRS). Defined in meters, usage is in feet - see CRS code 8382.
     * Replaced by NAD83(2011) / NCRS Las Vegas high (m) (CRS code 8385).
     */
    public const EPSG_NAD83_NCRS_LAS_VEGAS_HIGH_M = 'urn:ogc:def:crs:EPSG::8381';

    /**
     * NAD83 / NWT Lambert
     * Extent: Canada - Northwest Territories onshore
     * This CRS name may sometimes be used as an alias for NAD83(CSRS) / NWT Lambert. See CRS code 3581.
     */
    public const EPSG_NAD83_NWT_LAMBERT = 'urn:ogc:def:crs:EPSG::3580';

    /**
     * NAD83 / Nebraska
     * Extent: USA - Nebraska - counties of Adams; Antelope; Arthur; Banner; Blaine; Boone; Box Butte; Boyd; Brown;
     * Buffalo; Burt; Butler; Cass; Cedar; Chase; Cherry; Cheyenne; Clay; Colfax; Cuming; Custer; Dakota; Dawes;
     * Dawson; Deuel; Dixon; Dodge; Douglas; Dundy; Fillmore; Franklin; Frontier; Furnas; Gage; Garden; Garfield;
     * Gosper; Grant; Greeley; Hall; Hamilton; Harlan; Hayes; Hitchcock; Holt; Hooker; Howard; Jefferson; Johnson;
     * Kearney; Keith; Keya Paha; Kimball; Knox; Lancaster; Lincoln; Logan; Loup; Madison; McPherson; Merrick; Morrill;
     * Nance; Nemaha; Nuckolls; Otoe; Pawnee; Perkins; Phelps; Pierce; Platte; Polk; Red Willow; Richardson; Rock;
     * Saline; Sarpy; Saunders; Scotts Bluff; Seward; Sheridan; Sherman; Sioux; Stanton; Thayer; Thomas; Thurston;
     * Valley; Washington; Wayne; Webster; Wheeler; York
     * State law defines system in US survey feet. See CRS code 26852 for equivalent non-metric definition. For
     * applications with an accuracy of better than 1m, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NEBRASKA = 'urn:ogc:def:crs:EPSG::32104';

    /**
     * NAD83 / Nebraska (ftUS)
     * Extent: USA - Nebraska - counties of Adams; Antelope; Arthur; Banner; Blaine; Boone; Box Butte; Boyd; Brown;
     * Buffalo; Burt; Butler; Cass; Cedar; Chase; Cherry; Cheyenne; Clay; Colfax; Cuming; Custer; Dakota; Dawes;
     * Dawson; Deuel; Dixon; Dodge; Douglas; Dundy; Fillmore; Franklin; Frontier; Furnas; Gage; Garden; Garfield;
     * Gosper; Grant; Greeley; Hall; Hamilton; Harlan; Hayes; Hitchcock; Holt; Hooker; Howard; Jefferson; Johnson;
     * Kearney; Keith; Keya Paha; Kimball; Knox; Lancaster; Lincoln; Logan; Loup; Madison; McPherson; Merrick; Morrill;
     * Nance; Nemaha; Nuckolls; Otoe; Pawnee; Perkins; Phelps; Pierce; Platte; Polk; Red Willow; Richardson; Rock;
     * Saline; Sarpy; Saunders; Scotts Bluff; Seward; Sheridan; Sherman; Sioux; Stanton; Thayer; Thomas; Thurston;
     * Valley; Washington; Wayne; Webster; Wheeler; York
     * State law defines use of US survey feet. Federal definition is metric - see code 32104. For applications with an
     * accuracy of better than 3ft, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NEBRASKA_FTUS = 'urn:ogc:def:crs:EPSG::26852';

    /**
     * NAD83 / Nevada Central
     * Extent: USA - Nevada - counties of Lander; Nye
     * State law defines system in US survey feet. See code 3422 for equivalent non-metric definition. For applications
     * with an accuracy of better than 1m, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NEVADA_CENTRAL = 'urn:ogc:def:crs:EPSG::32108';

    /**
     * NAD83 / Nevada Central (ftUS)
     * Extent: USA - Nevada - counties of Lander; Nye
     * State law defines system in US survey feet. Federal definition is metric - see code 32108. For applications with
     * an accuracy of better than 3 feet, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NEVADA_CENTRAL_FTUS = 'urn:ogc:def:crs:EPSG::3422';

    /**
     * NAD83 / Nevada East
     * Extent: USA - Nevada - counties of Clark; Elko; Eureka; Lincoln; White Pine
     * State law defines system in US survey feet. See code 3421 for equivalent non-metric definition. For applications
     * with an accuracy of better than 1m, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NEVADA_EAST = 'urn:ogc:def:crs:EPSG::32107';

    /**
     * NAD83 / Nevada East (ftUS)
     * Extent: USA - Nevada - counties of Clark; Elko; Eureka; Lincoln; White Pine
     * State law defines system in US survey feet. Federal definition is metric - see code 32107. For applications with
     * an accuracy of better than 3 feet, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NEVADA_EAST_FTUS = 'urn:ogc:def:crs:EPSG::3421';

    /**
     * NAD83 / Nevada West
     * Extent: USA - Nevada - counties of Churchill; Douglas; Esmeralda; Humboldt; Lyon; Mineral; Pershing; Storey;
     * Washoe
     * State law defines system in US survey feet. See code 3423 for equivalent non-metric definition. For applications
     * with an accuracy of better than 1m, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NEVADA_WEST = 'urn:ogc:def:crs:EPSG::32109';

    /**
     * NAD83 / Nevada West (ftUS)
     * Extent: USA - Nevada - counties of Churchill; Douglas; Esmeralda; Humboldt; Lyon; Mineral; Pershing; Storey;
     * Washoe
     * State law defines system in US survey feet. Federal definition is metric - see code 32109. For applications with
     * an accuracy of better than 3 feet, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NEVADA_WEST_FTUS = 'urn:ogc:def:crs:EPSG::3423';

    /**
     * NAD83 / New Hampshire
     * Extent: USA - New Hampshire - counties of Belknap; Carroll; Cheshire; Coos; Grafton; Hillsborough; Merrimack;
     * Rockingham; Strafford; Sullivan
     * State law defines system in US survey feet. See code 3437 for equivalent non-metric definition. For applications
     * with an accuracy of better than 1m, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NEW_HAMPSHIRE = 'urn:ogc:def:crs:EPSG::32110';

    /**
     * NAD83 / New Hampshire (ftUS)
     * Extent: USA - New Hampshire - counties of Belknap; Carroll; Cheshire; Coos; Grafton; Hillsborough; Merrimack;
     * Rockingham; Strafford; Sullivan
     * State law defines system in US survey feet. Federal definition is metric - see code 32110. For applications with
     * an accuracy of better than 3 feet, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NEW_HAMPSHIRE_FTUS = 'urn:ogc:def:crs:EPSG::3437';

    /**
     * NAD83 / New Jersey
     * Extent: USA - New Jersey - counties of Atlantic; Bergen; Burlington; Camden; Cape May; Cumberland; Essex;
     * Gloucester; Hudson; Hunterdon; Mercer; Middlesex; Monmouth; Morris; Ocean; Passaic; Salem; Somerset; Sussex;
     * Union; Warren
     * State law defines system in US survey feet. See code 3424 for equivalent non-metric definition. For applications
     * with an accuracy of better than 1m, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NEW_JERSEY = 'urn:ogc:def:crs:EPSG::32111';

    /**
     * NAD83 / New Jersey (ftUS)
     * Extent: USA - New Jersey - counties of Atlantic; Bergen; Burlington; Camden; Cape May; Cumberland; Essex;
     * Gloucester; Hudson; Hunterdon; Mercer; Middlesex; Monmouth; Morris; Ocean; Passaic; Salem; Somerset; Sussex;
     * Union; Warren
     * State law defines system in US survey feet. Federal definition is metric - see code 32111. For applications with
     * an accuracy of better than 3 feet, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NEW_JERSEY_FTUS = 'urn:ogc:def:crs:EPSG::3424';

    /**
     * NAD83 / New Mexico Central
     * Extent: USA - New Mexico - counties of Bernalillo; Dona Ana; Lincoln; Los Alamos; Otero; Rio Arriba; Sandoval;
     * Santa Fe; Socorro; Taos; Torrance; Valencia
     * State law defines system in US survey feet. See code 2258 for equivalent non-metric definition. For applications
     * with an accuracy of better than 1m, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NEW_MEXICO_CENTRAL = 'urn:ogc:def:crs:EPSG::32113';

    /**
     * NAD83 / New Mexico Central (ftUS)
     * Extent: USA - New Mexico - counties of Bernalillo; Dona Ana; Lincoln; Los Alamos; Otero; Rio Arriba; Sandoval;
     * Santa Fe; Socorro; Taos; Torrance; Valencia
     * State law defines system in US survey feet. Federal definition is metric - see code 32113. For applications with
     * an accuracy of better than 3 feet, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NEW_MEXICO_CENTRAL_FTUS = 'urn:ogc:def:crs:EPSG::2258';

    /**
     * NAD83 / New Mexico East
     * Extent: USA - New Mexico - counties of Chaves; Colfax; Curry; De Baca; Eddy; Guadalupe; Harding; Lea; Mora;
     * Quay; Roosevelt; San Miguel; Union
     * State law defines system in US survey feet. See code 2257 for equivalent non-metric definition. For applications
     * with an accuracy of better than 1m, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NEW_MEXICO_EAST = 'urn:ogc:def:crs:EPSG::32112';

    /**
     * NAD83 / New Mexico East (ftUS)
     * Extent: USA - New Mexico - counties of Chaves; Colfax; Curry; De Baca; Eddy; Guadalupe; Harding; Lea; Mora;
     * Quay; Roosevelt; San Miguel; Union
     * State law defines system in US survey feet. Federal definition is metric - see code 32112. For applications with
     * an accuracy of better than 3 feet, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NEW_MEXICO_EAST_FTUS = 'urn:ogc:def:crs:EPSG::2257';

    /**
     * NAD83 / New Mexico West
     * Extent: USA - New Mexico - counties of Catron; Cibola; Grant; Hidalgo; Luna; McKinley; San Juan; Sierra
     * State law defines system in US survey feet. See code 2259 for equivalent non-metric definition. For applications
     * with an accuracy of better than 1m, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NEW_MEXICO_WEST = 'urn:ogc:def:crs:EPSG::32114';

    /**
     * NAD83 / New Mexico West (ftUS)
     * Extent: USA - New Mexico - counties of Catron; Cibola; Grant; Hidalgo; Luna; McKinley; San Juan; Sierra
     * State law defines system in US survey feet. Federal definition is metric - see code 32114. For applications with
     * an accuracy of better than 3 feet, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NEW_MEXICO_WEST_FTUS = 'urn:ogc:def:crs:EPSG::2259';

    /**
     * NAD83 / New York Central
     * Extent: USA - New York - counties of Broome; Cayuga; Chemung; Chenango; Cortland; Jefferson; Lewis; Madison;
     * Oneida; Onondaga; Ontario; Oswego; Schuyler; Seneca; Steuben; Tioga; Tompkins; Wayne; Yates
     * State law defines system in US survey feet. See code 2261 for equivalent non-metric definition. For applications
     * with an accuracy of better than 1m, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NEW_YORK_CENTRAL = 'urn:ogc:def:crs:EPSG::32116';

    /**
     * NAD83 / New York Central (ftUS)
     * Extent: USA - New York - counties of Broome; Cayuga; Chemung; Chenango; Cortland; Jefferson; Lewis; Madison;
     * Oneida; Onondaga; Ontario; Oswego; Schuyler; Seneca; Steuben; Tioga; Tompkins; Wayne; Yates
     * State law defines system in US survey feet. Federal definition is metric - see code 32116. For applications with
     * an accuracy of better than 3 feet, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NEW_YORK_CENTRAL_FTUS = 'urn:ogc:def:crs:EPSG::2261';

    /**
     * NAD83 / New York East
     * Extent: USA - New York mainland - counties of Albany; Clinton; Columbia; Delaware; Dutchess; Essex; Franklin;
     * Fulton; Greene; Hamilton; Herkimer; Montgomery; Orange; Otsego; Putnam; Rensselaer; Rockland; Saratoga;
     * Schenectady; Schoharie; St Lawrence; Sullivan; Ulster; Warren; Washington; Westchester
     * State law defines system in US survey feet. See code 2260 for equivalent non-metric definition. For applications
     * with an accuracy of better than 1m, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NEW_YORK_EAST = 'urn:ogc:def:crs:EPSG::32115';

    /**
     * NAD83 / New York East (ftUS)
     * Extent: USA - New York mainland - counties of Albany; Clinton; Columbia; Delaware; Dutchess; Essex; Franklin;
     * Fulton; Greene; Hamilton; Herkimer; Montgomery; Orange; Otsego; Putnam; Rensselaer; Rockland; Saratoga;
     * Schenectady; Schoharie; St Lawrence; Sullivan; Ulster; Warren; Washington; Westchester
     * State law defines system in US survey feet. Federal definition is metric - see code 32115. For applications with
     * an accuracy of better than 3 feet, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NEW_YORK_EAST_FTUS = 'urn:ogc:def:crs:EPSG::2260';

    /**
     * NAD83 / New York Long Island
     * Extent: USA - New York - counties of Bronx; Kings; Nassau; New York; Queens; Richmond; Suffolk
     * State law defines system in US survey feet. See code 2264 for equivalent non-metric definition. For applications
     * with an accuracy of better than 1m, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NEW_YORK_LONG_ISLAND = 'urn:ogc:def:crs:EPSG::32118';

    /**
     * NAD83 / New York Long Island (ftUS)
     * Extent: USA - New York - counties of Bronx; Kings; Nassau; New York; Queens; Richmond; Suffolk
     * State law defines system in US survey feet. Federal definition is metric - see code 32118. For applications with
     * an accuracy of better than 3 feet, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NEW_YORK_LONG_ISLAND_FTUS = 'urn:ogc:def:crs:EPSG::2263';

    /**
     * NAD83 / New York West
     * Extent: USA - New York - counties of Allegany; Cattaraugus; Chautauqua; Erie; Genesee; Livingston; Monroe;
     * Niagara; Orleans; Wyoming
     * State law defines system in US survey feet. See code 2263 for equivalent non-metric definition. For applications
     * with an accuracy of better than 1m, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NEW_YORK_WEST = 'urn:ogc:def:crs:EPSG::32117';

    /**
     * NAD83 / New York West (ftUS)
     * Extent: USA - New York - counties of Allegany; Cattaraugus; Chautauqua; Erie; Genesee; Livingston; Monroe;
     * Niagara; Orleans; Wyoming
     * State law defines system in US survey feet. Federal definition is metric - see code 32117. For applications with
     * an accuracy of better than 3 feet, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NEW_YORK_WEST_FTUS = 'urn:ogc:def:crs:EPSG::2262';

    /**
     * NAD83 / North Carolina
     * Extent: USA - North Carolina - counties of Alamance; Alexander; Alleghany; Anson; Ashe; Avery; Beaufort; Bertie;
     * Bladen; Brunswick; Buncombe; Burke; Cabarrus; Caldwell; Camden; Carteret; Caswell; Catawba; Chatham; Cherokee;
     * Chowan; Clay; Cleveland; Columbus; Craven; Cumberland; Currituck; Dare; Davidson; Davie; Duplin; Durham;
     * Edgecombe; Forsyth; Franklin; Gaston; Gates; Graham; Granville; Greene; Guilford; Halifax; Harnett; Haywood;
     * Henderson; Hertford; Hoke; Hyde; Iredell; Jackson; Johnston; Jones; Lee; Lenoir; Lincoln; Macon; Madison;
     * Martin; McDowell; Mecklenburg; Mitchell; Montgomery; Moore; Nash; New Hanover; Northampton; Onslow; Orange;
     * Pamlico; Pasquotank; Pender; Perquimans; Person; Pitt; Polk; Randolph; Richmond; Robeson; Rockingham; Rowan;
     * Rutherford; Sampson; Scotland; Stanly; Stokes; Surry; Swain; Transylvania; Tyrrell; Union; Vance; Wake; Warren;
     * Washington; Watauga; Wayne; Wilkes; Wilson; Yadkin; Yancey
     * State law defines system in US survey feet. See code 2264 for equivalent non-metric definition. For applications
     * with an accuracy of better than 1m, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NORTH_CAROLINA = 'urn:ogc:def:crs:EPSG::32119';

    /**
     * NAD83 / North Carolina (ftUS)
     * Extent: USA - North Carolina - counties of Alamance; Alexander; Alleghany; Anson; Ashe; Avery; Beaufort; Bertie;
     * Bladen; Brunswick; Buncombe; Burke; Cabarrus; Caldwell; Camden; Carteret; Caswell; Catawba; Chatham; Cherokee;
     * Chowan; Clay; Cleveland; Columbus; Craven; Cumberland; Currituck; Dare; Davidson; Davie; Duplin; Durham;
     * Edgecombe; Forsyth; Franklin; Gaston; Gates; Graham; Granville; Greene; Guilford; Halifax; Harnett; Haywood;
     * Henderson; Hertford; Hoke; Hyde; Iredell; Jackson; Johnston; Jones; Lee; Lenoir; Lincoln; Macon; Madison;
     * Martin; McDowell; Mecklenburg; Mitchell; Montgomery; Moore; Nash; New Hanover; Northampton; Onslow; Orange;
     * Pamlico; Pasquotank; Pender; Perquimans; Person; Pitt; Polk; Randolph; Richmond; Robeson; Rockingham; Rowan;
     * Rutherford; Sampson; Scotland; Stanly; Stokes; Surry; Swain; Transylvania; Tyrrell; Union; Vance; Wake; Warren;
     * Washington; Watauga; Wayne; Wilkes; Wilson; Yadkin; Yancey
     * State law defines system in US survey feet. Federal definition is metric - see code 32119. For applications with
     * an accuracy of better than 3 feet, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NORTH_CAROLINA_FTUS = 'urn:ogc:def:crs:EPSG::2264';

    /**
     * NAD83 / North Dakota North
     * Extent: USA - North Dakota - counties of Benson; Bottineau; Burke; Cavalier; Divide; Eddy; Foster; Grand Forks;
     * Griggs; McHenry; McKenzie; McLean; Mountrial; Nelson; Pembina; Pierce; Ramsey; Renville; Rolette; Sheridan;
     * Steele; Towner; Traill; Walsh; Ward; Wells; Williams
     * State law defines system in International feet (note: not US survey feet). See code 2265 for equivalent
     * non-metric definition. For applications with an accuracy of better than 1m, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NORTH_DAKOTA_NORTH = 'urn:ogc:def:crs:EPSG::32120';

    /**
     * NAD83 / North Dakota North (ft)
     * Extent: USA - North Dakota - counties of Benson; Bottineau; Burke; Cavalier; Divide; Eddy; Foster; Grand Forks;
     * Griggs; McHenry; McKenzie; McLean; Mountrial; Nelson; Pembina; Pierce; Ramsey; Renville; Rolette; Sheridan;
     * Steele; Towner; Traill; Walsh; Ward; Wells; Williams
     * State law defines system in International feet (note: not US survey feet). Federal definition is metric - see
     * code 32120. For applications with an accuracy of better than 3 feet, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NORTH_DAKOTA_NORTH_FT = 'urn:ogc:def:crs:EPSG::2265';

    /**
     * NAD83 / North Dakota South
     * Extent: USA - North Dakota - counties of Adams; Barnes; Billings; Bowman; Burleigh; Cass; Dickey; Dunn; Emmons;
     * Golden Valley; Grant; Hettinger; Kidder; La Moure; Logan; McIntosh; Mercer; Morton; Oliver; Ransom; Richland;
     * Sargent; Sioux; Slope; Stark; Stutsman
     * State law defines system in International feet (note: not US survey feet). See code 2266 for equivalent
     * non-metric definition. For applications with an accuracy of better than 1m, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NORTH_DAKOTA_SOUTH = 'urn:ogc:def:crs:EPSG::32121';

    /**
     * NAD83 / North Dakota South (ft)
     * Extent: USA - North Dakota - counties of Adams; Barnes; Billings; Bowman; Burleigh; Cass; Dickey; Dunn; Emmons;
     * Golden Valley; Grant; Hettinger; Kidder; La Moure; Logan; McIntosh; Mercer; Morton; Oliver; Ransom; Richland;
     * Sargent; Sioux; Slope; Stark; Stutsman
     * State law defines system in International feet (note: not US survey feet). Federal definition is metric - see
     * code 32121. For applications with an accuracy of better than 3 feet, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NORTH_DAKOTA_SOUTH_FT = 'urn:ogc:def:crs:EPSG::2266';

    /**
     * NAD83 / Ohio North
     * Extent: USA - Ohio - counties of Allen;Ashland; Ashtabula; Auglaize; Carroll; Columbiana; Coshocton; Crawford;
     * Cuyahoga; Defiance; Delaware; Erie; Fulton; Geauga; Hancock; Hardin; Harrison; Henry; Holmes; Huron; Jefferson;
     * Knox; Lake; Logan; Lorain; Lucas; Mahoning; Marion; Medina; Mercer; Morrow; Ottawa; Paulding; Portage; Putnam;
     * Richland; Sandusky; Seneca; Shelby; Stark; Summit; Trumbull; Tuscarawas; Union; Van Wert; Wayne; Williams; Wood;
     * Wyandot
     * State law defines system in US survey feet. See code 3734 for equivalent non-metric definition. For applications
     * with an accuracy of better than 1m, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_OHIO_NORTH = 'urn:ogc:def:crs:EPSG::32122';

    /**
     * NAD83 / Ohio North (ftUS)
     * Extent: USA - Ohio - counties of Allen;Ashland; Ashtabula; Auglaize; Carroll; Columbiana; Coshocton; Crawford;
     * Cuyahoga; Defiance; Delaware; Erie; Fulton; Geauga; Hancock; Hardin; Harrison; Henry; Holmes; Huron; Jefferson;
     * Knox; Lake; Logan; Lorain; Lucas; Mahoning; Marion; Medina; Mercer; Morrow; Ottawa; Paulding; Portage; Putnam;
     * Richland; Sandusky; Seneca; Shelby; Stark; Summit; Trumbull; Tuscarawas; Union; Van Wert; Wayne; Williams; Wood;
     * Wyandot
     * State law defines system in US survey feet. Federal definition is metric - see code 32122. For applications with
     * an accuracy of better than 3 feet, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_OHIO_NORTH_FTUS = 'urn:ogc:def:crs:EPSG::3734';

    /**
     * NAD83 / Ohio South
     * Extent: USA - Ohio - counties of Adams; Athens; Belmont; Brown; Butler; Champaign; Clark; Clermont; Clinton;
     * Darke; Fairfield; Fayette; Franklin; Gallia; Greene; Guernsey; Hamilton; Highland; Hocking; Jackson; Lawrence;
     * Licking; Madison; Meigs; Miami; Monroe; Montgomery; Morgan; Muskingum; Noble; Perry; Pickaway; Pike; Preble;
     * Ross; Scioto; Vinton; Warren; Washington
     * State law defines system in US survey feet. See code 3735 for equivalent non-metric definition. For applications
     * with an accuracy of better than 1m, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_OHIO_SOUTH = 'urn:ogc:def:crs:EPSG::32123';

    /**
     * NAD83 / Ohio South (ftUS)
     * Extent: USA - Ohio - counties of Adams; Athens; Belmont; Brown; Butler; Champaign; Clark; Clermont; Clinton;
     * Darke; Fairfield; Fayette; Franklin; Gallia; Greene; Guernsey; Hamilton; Highland; Hocking; Jackson; Lawrence;
     * Licking; Madison; Meigs; Miami; Monroe; Montgomery; Morgan; Muskingum; Noble; Perry; Pickaway; Pike; Preble;
     * Ross; Scioto; Vinton; Warren; Washington
     * State law defines system in US survey feet. Federal definition is metric - see code 32123. For applications with
     * an accuracy of better than 3 feet, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_OHIO_SOUTH_FTUS = 'urn:ogc:def:crs:EPSG::3735';

    /**
     * NAD83 / Oklahoma North
     * Extent: USA - Oklahoma - counties of Adair; Alfalfa; Beaver; Blaine; Canadian; Cherokee; Cimarron; Craig; Creek;
     * Custer; Delaware; Dewey; Ellis; Garfield; Grant; Harper; Kay; Kingfisher; Lincoln; Logan; Major; Mayes;
     * Muskogee; Noble; Nowata; Okfuskee; Oklahoma; Okmulgee; Osage; Ottawa; Pawnee; Payne; Roger Mills; Rogers;
     * Sequoyah; Texas; Tulsa; Wagoner; Washington; Woods; Woodward
     * State law defines system in US survey feet. See code 2267 for equivalent non-metric definition. For applications
     * with an accuracy of better than 1m, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_OKLAHOMA_NORTH = 'urn:ogc:def:crs:EPSG::32124';

    /**
     * NAD83 / Oklahoma North (ftUS)
     * Extent: USA - Oklahoma - counties of Adair; Alfalfa; Beaver; Blaine; Canadian; Cherokee; Cimarron; Craig; Creek;
     * Custer; Delaware; Dewey; Ellis; Garfield; Grant; Harper; Kay; Kingfisher; Lincoln; Logan; Major; Mayes;
     * Muskogee; Noble; Nowata; Okfuskee; Oklahoma; Okmulgee; Osage; Ottawa; Pawnee; Payne; Roger Mills; Rogers;
     * Sequoyah; Texas; Tulsa; Wagoner; Washington; Woods; Woodward
     * State law defines system in US survey feet. Federal definition is metric - see code 32124. For applications with
     * an accuracy of better than 3 feet, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_OKLAHOMA_NORTH_FTUS = 'urn:ogc:def:crs:EPSG::2267';

    /**
     * NAD83 / Oklahoma South
     * Extent: USA - Oklahoma - counties of Atoka; Beckham; Bryan; Caddo; Carter; Choctaw; Cleveland; Coal; Comanche;
     * Cotton; Garvin; Grady; Greer; Harmon; Haskell; Hughes; Jackson; Jefferson; Johnston; Kiowa; Latimer; Le Flore;
     * Love; Marshall; McClain; McCurtain; McIntosh; Murray; Pittsburg; Pontotoc; Pottawatomie; Pushmataha; Seminole;
     * Stephens; Tillman; Washita
     * State law defines system in US survey feet. See code 2268 for equivalent non-metric definition. For applications
     * with an accuracy of better than 1m, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_OKLAHOMA_SOUTH = 'urn:ogc:def:crs:EPSG::32125';

    /**
     * NAD83 / Oklahoma South (ftUS)
     * Extent: USA - Oklahoma - counties of Atoka; Beckham; Bryan; Caddo; Carter; Choctaw; Cleveland; Coal; Comanche;
     * Cotton; Garvin; Grady; Greer; Harmon; Haskell; Hughes; Jackson; Jefferson; Johnston; Kiowa; Latimer; Le Flore;
     * Love; Marshall; McClain; McCurtain; McIntosh; Murray; Pittsburg; Pontotoc; Pottawatomie; Pushmataha; Seminole;
     * Stephens; Tillman; Washita
     * State law defines system in US survey feet. Federal definition is metric - see code 32125. For applications with
     * an accuracy of better than 3 feet, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_OKLAHOMA_SOUTH_FTUS = 'urn:ogc:def:crs:EPSG::2268';

    /**
     * NAD83 / Ontario MNR Lambert
     * Extent: Canada - Ontario
     * Replaces NAD27 / Ontario MNR Lambert. One of a number of similar projected CRSs used by Ontario MNR.
     */
    public const EPSG_NAD83_ONTARIO_MNR_LAMBERT = 'urn:ogc:def:crs:EPSG::3161';

    /**
     * NAD83 / Oregon GIC Lambert (ft)
     * Extent: USA - Oregon
     * State law defines use of International feet (note: not US survey feet). For applications with an accuracy of
     * better than 3 feet, replaced by NAD83(HARN) / Oregon GIC Lambert (ft) (CRS code 2994).
     */
    public const EPSG_NAD83_OREGON_GIC_LAMBERT_FT = 'urn:ogc:def:crs:EPSG::2992';

    /**
     * NAD83 / Oregon LCC (m)
     * Extent: USA - Oregon
     * See CRS code 2992 for non-metric definition used by state agencies. For applications with an accuracy of better
     * than 1m, replaced by NAD83(HARN) / Oregon LCC (m) (code 2993).
     */
    public const EPSG_NAD83_OREGON_LCC_M = 'urn:ogc:def:crs:EPSG::2991';

    /**
     * NAD83 / Oregon North
     * Extent: USA - Oregon - counties of Baker; Benton; Clackamas; Clatsop; Columbia; Gilliam; Grant; Hood River;
     * Jefferson; Lincoln; Linn; Marion; Morrow; Multnomah; Polk; Sherman; Tillamook; Umatilla; Union; Wallowa; Wasco;
     * Washington; Wheeler; Yamhill
     * State law defines system in International feet (note: not US survey feet). See code 2269 for equivalent
     * non-metric definition. For applications with an accuracy of better than 1m, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_OREGON_NORTH = 'urn:ogc:def:crs:EPSG::32126';

    /**
     * NAD83 / Oregon North (ft)
     * Extent: USA - Oregon - counties of Baker; Benton; Clackamas; Clatsop; Columbia; Gilliam; Grant; Hood River;
     * Jefferson; Lincoln; Linn; Marion; Morrow; Multnomah; Polk; Sherman; Tillamook; Umatilla; Union; Wallowa; Wasco;
     * Washington; Wheeler; Yamhill
     * State law defines system in International feet (note: not US survey feet). Federal definition is metric - see
     * code 32126. For applications with an accuracy of better than 3 feet, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_OREGON_NORTH_FT = 'urn:ogc:def:crs:EPSG::2269';

    /**
     * NAD83 / Oregon South
     * Extent: USA - Oregon - counties of Coos; Crook; Curry; Deschutes; Douglas; Harney; Jackson; Josephine; Klamath;
     * Lake; Lane; Malheur
     * State law defines system in International feet (note: not US survey feet). See code 2270 for equivalent
     * non-metric definition. For applications with an accuracy of better than 1m, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_OREGON_SOUTH = 'urn:ogc:def:crs:EPSG::32127';

    /**
     * NAD83 / Oregon South (ft)
     * Extent: USA - Oregon - counties of Coos; Crook; Curry; Deschutes; Douglas; Harney; Jackson; Josephine; Klamath;
     * Lake; Lane; Malheur
     * State law defines system in International feet (note: not US survey feet). Federal definition is metric - see
     * code 32127. For applications with an accuracy of better than 3 feet, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_OREGON_SOUTH_FT = 'urn:ogc:def:crs:EPSG::2270';

    /**
     * NAD83 / Pennsylvania North
     * Extent: USA - Pennsylvania - counties of Bradford; Cameron; Carbon; Centre; Clarion; Clearfield; Clinton;
     * Columbia; Crawford; Elk; Erie; Forest; Jefferson; Lackawanna; Luzerne; Lycoming; McKean; Mercer; Monroe;
     * Montour; Northumberland; Pike; Potter; Sullivan; Susquehanna; Tioga; Union; Venango; Warren; Wayne; Wyoming
     * State law defines system in US survey feet. See code 2271 for equivalent non-metric definition. For applications
     * with an accuracy of better than 1m, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_PENNSYLVANIA_NORTH = 'urn:ogc:def:crs:EPSG::32128';

    /**
     * NAD83 / Pennsylvania North (ftUS)
     * Extent: USA - Pennsylvania - counties of Bradford; Cameron; Carbon; Centre; Clarion; Clearfield; Clinton;
     * Columbia; Crawford; Elk; Erie; Forest; Jefferson; Lackawanna; Luzerne; Lycoming; McKean; Mercer; Monroe;
     * Montour; Northumberland; Pike; Potter; Sullivan; Susquehanna; Tioga; Union; Venango; Warren; Wayne; Wyoming
     * State law defines system in US survey feet. Federal definition is metric - see code 32128. For applications with
     * an accuracy of better than 3 feet, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_PENNSYLVANIA_NORTH_FTUS = 'urn:ogc:def:crs:EPSG::2271';

    /**
     * NAD83 / Pennsylvania South
     * Extent: USA - Pennsylvania - counties of Adams; Allegheny; Armstrong; Beaver; Bedford; Berks; Blair; Bucks;
     * Butler; Cambria; Chester; Cumberland; Dauphin; Delaware; Fayette; Franklin; Fulton; Greene; Huntingdon; Indiana;
     * Juniata; Lancaster; Lawrence; Lebanon; Lehigh; Mifflin; Montgomery; Northampton; Perry; Philadelphia;
     * Schuylkill; Snyder; Somerset; Washington; Westmoreland; York
     * State law defines system in US survey feet. See code 2272 for equivalent non-metric definition. For applications
     * with an accuracy of better than 1m, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_PENNSYLVANIA_SOUTH = 'urn:ogc:def:crs:EPSG::32129';

    /**
     * NAD83 / Pennsylvania South (ftUS)
     * Extent: USA - Pennsylvania - counties of Adams; Allegheny; Armstrong; Beaver; Bedford; Berks; Blair; Bucks;
     * Butler; Cambria; Chester; Cumberland; Dauphin; Delaware; Fayette; Franklin; Fulton; Greene; Huntingdon; Indiana;
     * Juniata; Lancaster; Lawrence; Lebanon; Lehigh; Mifflin; Montgomery; Northampton; Perry; Philadelphia;
     * Schuylkill; Snyder; Somerset; Washington; Westmoreland; York
     * State law defines system in US survey feet. Federal definition is metric - see code 32129. For applications with
     * an accuracy of better than 3 feet, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_PENNSYLVANIA_SOUTH_FTUS = 'urn:ogc:def:crs:EPSG::2272';

    /**
     * NAD83 / Puerto Rico & Virgin Is.
     * Extent: Puerto Rico and US Virgin Islands
     * For applications with an accuracy of better than 1m, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_PUERTO_RICO_AND_VIRGIN_IS = 'urn:ogc:def:crs:EPSG::32161';

    /**
     * NAD83 / Quebec Albers
     * Extent: Canada - Quebec
     * For applications with an accuracy of better than 2 metres, replaced by NAD83(CSRS) / Quebec Albers (CRS code
     * 6624).
     */
    public const EPSG_NAD83_QUEBEC_ALBERS = 'urn:ogc:def:crs:EPSG::6623';

    /**
     * NAD83 / Quebec Lambert
     * Extent: Canada - Quebec
     * For applications with an accuracy of better than 2 metres, replaced by NAD83(CSRS) / Quebec Lambert (CRS code
     * 6622).
     */
    public const EPSG_NAD83_QUEBEC_LAMBERT = 'urn:ogc:def:crs:EPSG::32198';

    /**
     * NAD83 / Rhode Island
     * Extent: USA - Rhode Island - counties of Bristol; Kent; Newport; Providence; Washington
     * State law defines system in US survey feet. See code 3438 for equivalent non-metric definition. For applications
     * with an accuracy of better than 1m, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_RHODE_ISLAND = 'urn:ogc:def:crs:EPSG::32130';

    /**
     * NAD83 / Rhode Island (ftUS)
     * Extent: USA - Rhode Island - counties of Bristol; Kent; Newport; Providence; Washington
     * State law defines system in US survey feet. Federal definition is metric - see code 32130. For applications with
     * an accuracy of better than 3 feet, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_RHODE_ISLAND_FTUS = 'urn:ogc:def:crs:EPSG::3438';

    /**
     * NAD83 / South Carolina
     * Extent: USA - South Carolina - counties of Abbeville; Aiken; Allendale; Anderson; Bamberg; Barnwell; Beaufort;
     * Berkeley; Calhoun; Charleston; Cherokee; Chester; Chesterfield; Clarendon; Colleton; Darlington; Dillon;
     * Dorchester; Edgefield; Fairfield; Florence; Georgetown; Greenville; Greenwood; Hampton; Horry; Jasper; Kershaw;
     * Lancaster; Laurens; Lee; Lexington; Marion; Marlboro; McCormick; Newberry; Oconee; Orangeburg; Pickens;
     * Richland; Saluda; Spartanburg; Sumter; Union; Williamsburg; York
     * State law defines system in International feet (note: not US survey feet). See code 2273 for equivalent
     * non-metric definition. For applications with an accuracy of better than 1m, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_SOUTH_CAROLINA = 'urn:ogc:def:crs:EPSG::32133';

    /**
     * NAD83 / South Carolina (ft)
     * Extent: USA - South Carolina - counties of Abbeville; Aiken; Allendale; Anderson; Bamberg; Barnwell; Beaufort;
     * Berkeley; Calhoun; Charleston; Cherokee; Chester; Chesterfield; Clarendon; Colleton; Darlington; Dillon;
     * Dorchester; Edgefield; Fairfield; Florence; Georgetown; Greenville; Greenwood; Hampton; Horry; Jasper; Kershaw;
     * Lancaster; Laurens; Lee; Lexington; Marion; Marlboro; McCormick; Newberry; Oconee; Orangeburg; Pickens;
     * Richland; Saluda; Spartanburg; Sumter; Union; Williamsburg; York
     * State law defines system in International feet (note: not US survey feet). Federal definition is metric - see
     * CRS code 32133. For applications with an accuracy of better than 3 feet, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_SOUTH_CAROLINA_FT = 'urn:ogc:def:crs:EPSG::2273';

    /**
     * NAD83 / South Dakota North
     * Extent: USA - South Dakota - counties of Beadle; Brookings; Brown; Butte; Campbell; Clark; Codington; Corson;
     * Day; Deuel; Dewey; Edmunds; Faulk; Grant; Hamlin; Hand; Harding; Hyde; Kingsbury; Lawrence; Marshall; McPherson;
     * Meade; Perkins; Potter; Roberts; Spink; Sully; Walworth; Ziebach
     * State law defines system in US survey feet. See code 4457 for equivalent non-metric definition. For applications
     * with an accuracy of better than 1m, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_SOUTH_DAKOTA_NORTH = 'urn:ogc:def:crs:EPSG::32134';

    /**
     * NAD83 / South Dakota North (ftUS)
     * Extent: USA - South Dakota - counties of Beadle; Brookings; Brown; Butte; Campbell; Clark; Codington; Corson;
     * Day; Deuel; Dewey; Edmunds; Faulk; Grant; Hamlin; Hand; Harding; Hyde; Kingsbury; Lawrence; Marshall; McPherson;
     * Meade; Perkins; Potter; Roberts; Spink; Sully; Walworth; Ziebach
     * State law defines system in US survey feet. Federal definition is metric - see code 32134. For applications with
     * an accuracy of better than 3 feet, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_SOUTH_DAKOTA_NORTH_FTUS = 'urn:ogc:def:crs:EPSG::4457';

    /**
     * NAD83 / South Dakota South
     * Extent: USA - South Dakota - counties of Aurora; Bennett; Bon Homme; Brule; Buffalo; Charles Mix; Clay; Custer;
     * Davison; Douglas; Fall River; Gregory; Haakon; Hanson; Hughes; Hutchinson; Jackson; Jerauld; Jones; Lake;
     * Lincoln; Lyman; McCook; Mellette; Miner; Minnehaha; Moody; Pennington; Sanborn; Shannon; Stanley; Todd; Tripp;
     * Turner; Union; Yankton
     * State law defines system in US survey feet. See code 3455 for equivalent non-metric definition. For applications
     * with an accuracy of better than 1m, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_SOUTH_DAKOTA_SOUTH = 'urn:ogc:def:crs:EPSG::32135';

    /**
     * NAD83 / South Dakota South (ftUS)
     * Extent: USA - South Dakota - counties of Aurora; Bennett; Bon Homme; Brule; Buffalo; Charles Mix; Clay; Custer;
     * Davison; Douglas; Fall River; Gregory; Haakon; Hanson; Hughes; Hutchinson; Jackson; Jerauld; Jones; Lake;
     * Lincoln; Lyman; McCook; Mellette; Miner; Minnehaha; Moody; Pennington; Sanborn; Shannon; Stanley; Todd; Tripp;
     * Turner; Union; Yankton
     * State law defines system in US survey feet. Federal definition is metric - see code 32135. For applications with
     * an accuracy of better than 3 feet, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_SOUTH_DAKOTA_SOUTH_FTUS = 'urn:ogc:def:crs:EPSG::3455';

    /**
     * NAD83 / Statistics Canada Lambert
     * Extent: Canada - Alberta; British Columbia; Manitoba; New Brunswick; Newfoundland and Labrador; Northwest
     * Territories; Nova Scotia; Nunavut; Ontario; Prince Edward Island; Quebec; Saskatchewan; Yukon
     * Data may sometimes be referenced to NAD83(CSRS) / STC Lambert (see CRS code 3348) which is then called "NAD83 /
     * STC Lambert". At the scales involved the difference of under 2 metres between the two CRSs may not be
     * significant.
     */
    public const EPSG_NAD83_STATISTICS_CANADA_LAMBERT = 'urn:ogc:def:crs:EPSG::3347';

    /**
     * NAD83 / TWDB GM
     * Extent: USA - Texas
     * Not to be confused with the similar but different TxGIO (TNRIS) CRS, NAD83 / Texas Centric Albers Equal Area
     * (CRS code 3083).
     */
    public const EPSG_NAD83_TWDB_GM = 'urn:ogc:def:crs:EPSG::10481';

    /**
     * NAD83 / Tennessee
     * Extent: USA - Tennessee - counties of Anderson; Bedford; Benton; Bledsoe; Blount; Bradley; Campbell; Cannon;
     * Carroll; Carter; Cheatham; Chester; Claiborne; Clay; Cocke; Coffee; Crockett; Cumberland; Davidson; De Kalb;
     * Decatur; Dickson; Dyer; Fayette; Fentress; Franklin; Gibson; Giles; Grainger; Greene; Grundy; Hamblen; Hamilton;
     * Hancock; Hardeman; Hardin; Hawkins; Haywood; Henderson; Henry; Hickman; Houston; Humphreys; Jackson; Jefferson;
     * Johnson; Knox; Lake; Lauderdale; Lawrence; Lewis; Lincoln; Loudon; Macon; Madison; Marion; Marshall; Maury;
     * McMinn; McNairy; Meigs; Monroe; Montgomery; Moore; Morgan; Obion; Overton; Perry; Pickett; Polk; Putnam; Rhea;
     * Roane; Robertson; Rutherford; Scott; Sequatchie; Sevier; Shelby; Smith; Stewart; Sullivan; Sumner; Tipton;
     * Trousdale; Unicoi; Union; Van Buren; Warren; Washington; Wayne; Weakley; White; Williamson; Wilson
     * State law defines system in US survey feet. See code 2274 for equivalent non-metric definition. For applications
     * with an accuracy of better than 1m, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_TENNESSEE = 'urn:ogc:def:crs:EPSG::32136';

    /**
     * NAD83 / Tennessee (ftUS)
     * Extent: USA - Tennessee - counties of Anderson; Bedford; Benton; Bledsoe; Blount; Bradley; Campbell; Cannon;
     * Carroll; Carter; Cheatham; Chester; Claiborne; Clay; Cocke; Coffee; Crockett; Cumberland; Davidson; De Kalb;
     * Decatur; Dickson; Dyer; Fayette; Fentress; Franklin; Gibson; Giles; Grainger; Greene; Grundy; Hamblen; Hamilton;
     * Hancock; Hardeman; Hardin; Hawkins; Haywood; Henderson; Henry; Hickman; Houston; Humphreys; Jackson; Jefferson;
     * Johnson; Knox; Lake; Lauderdale; Lawrence; Lewis; Lincoln; Loudon; Macon; Madison; Marion; Marshall; Maury;
     * McMinn; McNairy; Meigs; Monroe; Montgomery; Moore; Morgan; Obion; Overton; Perry; Pickett; Polk; Putnam; Rhea;
     * Roane; Robertson; Rutherford; Scott; Sequatchie; Sevier; Shelby; Smith; Stewart; Sullivan; Sumner; Tipton;
     * Trousdale; Unicoi; Union; Van Buren; Warren; Washington; Wayne; Weakley; White; Williamson; Wilson
     * State law defines system in US survey feet. Federal definition is metric - see code 32136. For applications with
     * an accuracy of better than 3 feet, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_TENNESSEE_FTUS = 'urn:ogc:def:crs:EPSG::2274';

    /**
     * NAD83 / Teranet Ontario Lambert
     * Extent: Canada - Ontario
     * Data may sometimes be referenced to NAD83(CSRS) / Teranet Ontario Lambert (see CRS code 5321) which is then
     * called "NAD83 / Teranet Ontario Lambert". At the scales involved the difference of under 2 metres between the
     * two CRSs may not be significant.
     */
    public const EPSG_NAD83_TERANET_ONTARIO_LAMBERT = 'urn:ogc:def:crs:EPSG::5320';

    /**
     * NAD83 / Texas Central
     * Extent: USA - Texas - counties of Anderson; Angelina; Bastrop; Bell; Blanco; Bosque; Brazos; Brown; Burleson;
     * Burnet; Cherokee; Coke; Coleman; Comanche; Concho; Coryell; Crane; Crockett; Culberson; Ector; El Paso; Falls;
     * Freestone; Gillespie; Glasscock; Grimes; Hamilton; Hardin; Houston; Hudspeth; Irion; Jasper; Jeff Davis; Kimble;
     * Lampasas; Lee; Leon; Liberty; Limestone; Llano; Loving; Madison; Mason; McCulloch; McLennan; Menard; Midland;
     * Milam; Mills; Montgomery; Nacogdoches; Newton; Orange; Pecos; Polk; Reagan; Reeves; Robertson; Runnels; Sabine;
     * San Augustine; San Jacinto; San Saba; Schleicher; Shelby; Sterling; Sutton; Tom Green; Travis; Trinity; Tyler;
     * Upton; Walker; Ward; Washington; Williamson; Winkler
     * State law defines system in US survey feet. See code 2277 for equivalent non-metric definition. For applications
     * with an accuracy of better than 1m, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_TEXAS_CENTRAL = 'urn:ogc:def:crs:EPSG::32139';

    /**
     * NAD83 / Texas Central (ftUS)
     * Extent: USA - Texas - counties of Anderson; Angelina; Bastrop; Bell; Blanco; Bosque; Brazos; Brown; Burleson;
     * Burnet; Cherokee; Coke; Coleman; Comanche; Concho; Coryell; Crane; Crockett; Culberson; Ector; El Paso; Falls;
     * Freestone; Gillespie; Glasscock; Grimes; Hamilton; Hardin; Houston; Hudspeth; Irion; Jasper; Jeff Davis; Kimble;
     * Lampasas; Lee; Leon; Liberty; Limestone; Llano; Loving; Madison; Mason; McCulloch; McLennan; Menard; Midland;
     * Milam; Mills; Montgomery; Nacogdoches; Newton; Orange; Pecos; Polk; Reagan; Reeves; Robertson; Runnels; Sabine;
     * San Augustine; San Jacinto; San Saba; Schleicher; Shelby; Sterling; Sutton; Tom Green; Travis; Trinity; Tyler;
     * Upton; Walker; Ward; Washington; Williamson; Winkler
     * State law defines system in US survey feet. Federal definition is metric - see code 32139. For applications with
     * an accuracy of better than 3 feet, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_TEXAS_CENTRAL_FTUS = 'urn:ogc:def:crs:EPSG::2277';

    /**
     * NAD83 / Texas Centric Albers Equal Area
     * Extent: USA - Texas
     * For applications with an accuracy of better than 1m, replaced by NAD83(HARN) / TX Albers (CRS code 3085). See
     * also NAD83 / TWDB GM (CRS code 10481). For state-wide spatial data presentation requiring shape preservation use
     * NAD83 / TX LC (CRS code 3082).
     */
    public const EPSG_NAD83_TEXAS_CENTRIC_ALBERS_EQUAL_AREA = 'urn:ogc:def:crs:EPSG::3083';

    /**
     * NAD83 / Texas Centric Lambert Conformal
     * Extent: USA - Texas
     * For applications with an accuracy of better than 1m, replaced by NAD83(HARN) / TX LC (CRS code 3084). For
     * state-wide spatial data presentation requiring true area measurements use NAD83 / TX Albers (CRS code 3083).
     */
    public const EPSG_NAD83_TEXAS_CENTRIC_LAMBERT_CONFORMAL = 'urn:ogc:def:crs:EPSG::3082';

    /**
     * NAD83 / Texas North
     * Extent: USA - Texas - counties of: Armstrong; Briscoe; Carson; Castro; Childress; Collingsworth; Dallam; Deaf
     * Smith; Donley; Gray; Hall; Hansford; Hartley; Hemphill; Hutchinson; Lipscomb; Moore; Ochiltree; Oldham; Parmer;
     * Potter; Randall; Roberts; Sherman; Swisher; Wheeler
     * State law defines system in US survey feet. See code 2275 for equivalent non-metric definition. For applications
     * with an accuracy of better than 1m, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_TEXAS_NORTH = 'urn:ogc:def:crs:EPSG::32137';

    /**
     * NAD83 / Texas North (ftUS)
     * Extent: USA - Texas - counties of: Armstrong; Briscoe; Carson; Castro; Childress; Collingsworth; Dallam; Deaf
     * Smith; Donley; Gray; Hall; Hansford; Hartley; Hemphill; Hutchinson; Lipscomb; Moore; Ochiltree; Oldham; Parmer;
     * Potter; Randall; Roberts; Sherman; Swisher; Wheeler
     * State law defines system in US survey feet. Federal definition is metric - see code 32137. For applications with
     * an accuracy of better than 3 feet, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_TEXAS_NORTH_FTUS = 'urn:ogc:def:crs:EPSG::2275';

    /**
     * NAD83 / Texas North Central
     * Extent: USA - Texas - counties of: Andrews; Archer; Bailey; Baylor; Borden; Bowie; Callahan; Camp; Cass; Clay;
     * Cochran; Collin; Cooke; Cottle; Crosby; Dallas; Dawson; Delta; Denton; Dickens; Eastland; Ellis; Erath; Fannin;
     * Fisher; Floyd; Foard; Franklin; Gaines; Garza; Grayson; Gregg; Hale; Hardeman; Harrison; Haskell; Henderson;
     * Hill; Hockley; Hood; Hopkins; Howard; Hunt; Jack; Johnson; Jones; Kaufman; Kent; King; Knox; Lamar; Lamb;
     * Lubbock; Lynn; Marion; Martin; Mitchell; Montague; Morris; Motley; Navarro; Nolan; Palo Pinto; Panola; Parker;
     * Rains; Red River; Rockwall; Rusk; Scurry; Shackelford; Smith; Somervell; Stephens; Stonewall; Tarrant; Taylor;
     * Terry; Throckmorton; Titus; Upshur; Van Zandt; Wichita; Wilbarger; Wise; Wood; Yoakum; Young
     * State law defines system in US survey feet. See code 2276 for equivalent non-metric definition. For applications
     * with an accuracy of better than 1m, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_TEXAS_NORTH_CENTRAL = 'urn:ogc:def:crs:EPSG::32138';

    /**
     * NAD83 / Texas North Central (ftUS)
     * Extent: USA - Texas - counties of: Andrews; Archer; Bailey; Baylor; Borden; Bowie; Callahan; Camp; Cass; Clay;
     * Cochran; Collin; Cooke; Cottle; Crosby; Dallas; Dawson; Delta; Denton; Dickens; Eastland; Ellis; Erath; Fannin;
     * Fisher; Floyd; Foard; Franklin; Gaines; Garza; Grayson; Gregg; Hale; Hardeman; Harrison; Haskell; Henderson;
     * Hill; Hockley; Hood; Hopkins; Howard; Hunt; Jack; Johnson; Jones; Kaufman; Kent; King; Knox; Lamar; Lamb;
     * Lubbock; Lynn; Marion; Martin; Mitchell; Montague; Morris; Motley; Navarro; Nolan; Palo Pinto; Panola; Parker;
     * Rains; Red River; Rockwall; Rusk; Scurry; Shackelford; Smith; Somervell; Stephens; Stonewall; Tarrant; Taylor;
     * Terry; Throckmorton; Titus; Upshur; Van Zandt; Wichita; Wilbarger; Wise; Wood; Yoakum; Young
     * State law defines system in US survey feet. Federal definition is metric - see code 32138. For applications with
     * an accuracy of better than 3 feet, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_TEXAS_NORTH_CENTRAL_FTUS = 'urn:ogc:def:crs:EPSG::2276';

    /**
     * NAD83 / Texas South
     * Extent: USA - Texas - counties of Brooks; Cameron; Duval; Hidalgo; Jim Hogg; Jim Wells; Kenedy; Kleberg; Nueces;
     * San Patricio; Starr; Webb; Willacy; Zapata
     * State law defines system in US survey feet. See code 2279 for equivalent non-metric definition. For onshore
     * applications with an accuracy of better than 1m, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_TEXAS_SOUTH = 'urn:ogc:def:crs:EPSG::32141';

    /**
     * NAD83 / Texas South (ftUS)
     * Extent: USA - Texas - counties of Brooks; Cameron; Duval; Hidalgo; Jim Hogg; Jim Wells; Kenedy; Kleberg; Nueces;
     * San Patricio; Starr; Webb; Willacy; Zapata
     * State law defines system in US survey feet. Federal definition is metric - see code 32141. For onshore
     * applications with an accuracy of better than 3 feet, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_TEXAS_SOUTH_FTUS = 'urn:ogc:def:crs:EPSG::2279';

    /**
     * NAD83 / Texas South Central
     * Extent: USA - Texas - counties of Aransas; Atascosa; Austin; Bandera; Bee; Bexar; Brazoria; Brewster; Caldwell;
     * Calhoun; Chambers; Colorado; Comal; De Witt; Dimmit; Edwards; Fayette; Fort Bend; Frio; Galveston; Goliad;
     * Gonzales; Guadalupe; Harris; Hays; Jackson; Jefferson; Karnes; Kendall; Kerr; Kinney; La Salle; Lavaca; Live
     * Oak; Matagorda; Maverick; McMullen; Medina; Presidio; Real; Refugio; Terrell; Uvalde; Val Verde; Victoria;
     * Waller; Wharton; Wilson; Zavala
     * State law defines system in US survey feet. See code 2278 for equivalent non-metric definition. For onshore
     * applications with an accuracy of better than 1m, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_TEXAS_SOUTH_CENTRAL = 'urn:ogc:def:crs:EPSG::32140';

    /**
     * NAD83 / Texas South Central (ftUS)
     * Extent: USA - Texas - counties of Aransas; Atascosa; Austin; Bandera; Bee; Bexar; Brazoria; Brewster; Caldwell;
     * Calhoun; Chambers; Colorado; Comal; De Witt; Dimmit; Edwards; Fayette; Fort Bend; Frio; Galveston; Goliad;
     * Gonzales; Guadalupe; Harris; Hays; Jackson; Jefferson; Karnes; Kendall; Kerr; Kinney; La Salle; Lavaca; Live
     * Oak; Matagorda; Maverick; McMullen; Medina; Presidio; Real; Refugio; Terrell; Uvalde; Val Verde; Victoria;
     * Waller; Wharton; Wilson; Zavala
     * State law defines system in US survey feet. Federal definition is metric - see code 32140. For onshore
     * applications with an accuracy of better than 3 feet, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_TEXAS_SOUTH_CENTRAL_FTUS = 'urn:ogc:def:crs:EPSG::2278';

    /**
     * NAD83 / Texas State Mapping System
     * Extent: USA - Texas
     * Replaces NAD27 / Shackleford. From 2001 replaced by NAD83 / Texas Centric Mapping System (TCMS/LC and TCMS/AEA).
     */
    public const EPSG_NAD83_TEXAS_STATE_MAPPING_SYSTEM = 'urn:ogc:def:crs:EPSG::3081';

    /**
     * NAD83 / USFS R6 Albers
     * Extent: USA - Oregon and Washington.
     */
    public const EPSG_NAD83_USFS_R6_ALBERS = 'urn:ogc:def:crs:EPSG::9674';

    /**
     * NAD83 / UTM zone 10N
     * Extent: North America - between 126°W and 120°W. Canada - British Columbia; Northwest Territories; Yukon. USA
     * - California; Oregon; Washington
     * Replaces NAD27 / UTM zone 10N. For accuracies better than 1m replaced by NAD83(CSRS) / UTM zone 10N in Canada
     * and NAD83(HARN) / UTM zone 10N in US.
     */
    public const EPSG_NAD83_UTM_ZONE_10N = 'urn:ogc:def:crs:EPSG::26910';

    /**
     * NAD83 / UTM zone 11N
     * Extent: North America - between 120°W and 114°W. Canada - Alberta; British Columbia; Northwest Territories;
     * Nunavut. USA - California; Idaho; Nevada, Oregon; Washington
     * Replaces NAD27 / UTM zone 11N. For accuracies better than 1m replaced by NAD83(CSRS) / UTM zone 11N in Canada
     * and NAD83(HARN) / UTM zone 11N in US.
     */
    public const EPSG_NAD83_UTM_ZONE_11N = 'urn:ogc:def:crs:EPSG::26911';

    /**
     * NAD83 / UTM zone 12N
     * Extent: North America - between 114°W and 108°W. Canada - Alberta; Northwest Territories; Nunavut;
     * Saskatchewan. USA - Arizona; Colorado; Idaho; Montana; New Mexico; Utah; Wyoming
     * Replaces NAD27 / UTM zone 12N. For accuracies better than 1m replaced by NAD83(CSRS) / UTM zone 12N in Canada
     * and NAD83(HARN) / UTM zone 12N in US.
     */
    public const EPSG_NAD83_UTM_ZONE_12N = 'urn:ogc:def:crs:EPSG::26912';

    /**
     * NAD83 / UTM zone 13N
     * Extent: North America - between 108°W and 102°W. Canada - Northwest Territories; Nunavut; Saskatchewan. USA -
     * Colorado; Montana; Nebraska; New Mexico; North Dakota; Oklahoma; South Dakota; Texas; Wyoming
     * Replaces NAD27 / UTM zone 13N. For accuracies better than 1m replaced by NAD83(CSRS) / UTM zone 13N in Canada
     * and NAD83(HARN) / UTM zone 13N in US.
     */
    public const EPSG_NAD83_UTM_ZONE_13N = 'urn:ogc:def:crs:EPSG::26913';

    /**
     * NAD83 / UTM zone 14N
     * Extent: North America - between 102°W and 96°W. Canada - Manitoba; Nunavut; Saskatchewan. USA - Iowa; Kansas;
     * Minnesota; Nebraska; North Dakota; Oklahoma; South Dakota; Texas
     * Replaces NAD27 / UTM zone 14N. For accuracies better than 1m replaced by NAD83(CSRS) / UTM zone 14N in Canada
     * and NAD83(HARN) / UTM zone 14N in US.
     */
    public const EPSG_NAD83_UTM_ZONE_14N = 'urn:ogc:def:crs:EPSG::26914';

    /**
     * NAD83 / UTM zone 15N
     * Extent: North America - between 96°W and 90°W. Canada - Manitoba; Nunavut; Ontario. USA - Arkansas; Illinois;
     * Iowa; Kansas; Louisiana; Michigan; Minnesota; Mississippi; Missouri; Nebraska; Oklahoma; Tennessee; Texas;
     * Wisconsin
     * Replaces NAD27 / UTM zone 15N. For accuracies better than 1m replaced by NAD83(CSRS) / UTM zone 15N in Canada
     * and NAD83(HARN) / UTM zone 15N in US.
     */
    public const EPSG_NAD83_UTM_ZONE_15N = 'urn:ogc:def:crs:EPSG::26915';

    /**
     * NAD83 / UTM zone 16N
     * Extent: North America - between 90°W and 84°W. Canada - Manitoba; Nunavut; Ontario. USA - Alabama; Arkansas;
     * Florida; Georgia; Indiana; Illinois; Kentucky; Louisiana; Michigan; Minnesota; Mississippi; Missouri; North
     * Carolina; Ohio; Tennessee; Wisconsin
     * Replaces NAD27 / UTM zone 15N. For accuracies better than 1m replaced by NAD83(CSRS) / UTM zone 16N in Canada
     * and NAD83(HARN) / UTM zone 16N in US.
     */
    public const EPSG_NAD83_UTM_ZONE_16N = 'urn:ogc:def:crs:EPSG::26916';

    /**
     * NAD83 / UTM zone 17N
     * Extent: North America - between 84°W and 78°W. Canada - Nunavut; Ontario; Quebec. USA - Florida; Georgia;
     * Kentucky; Maryland; Michigan; New York; North Carolina; Ohio; Pennsylvania; South Carolina; Tennessee; Virginia;
     * West Virginia
     * Replaces NAD27 / UTM zone 17N. For accuracies better than 1m replaced by NAD83(CSRS) / UTM zone 17N in Canada
     * and NAD83(HARN) / UTM zone 17N in US.
     */
    public const EPSG_NAD83_UTM_ZONE_17N = 'urn:ogc:def:crs:EPSG::26917';

    /**
     * NAD83 / UTM zone 18N
     * Extent: North America - between 78°W and 72°W. Canada - Nunavut; Ontario; Quebec. USA - Connecticut; Delaware;
     * Maryland; Massachusetts; New Hampshire; New Jersey; New York; North Carolina; Pennsylvania; Virginia; Vermont
     * Replaces NAD27 / UTM zone 18N. For accuracies better than 1m replaced by NAD83(CSRS) / UTM zone 18N in Canada
     * and NAD83(HARN) / UTM zone 18N in US.
     */
    public const EPSG_NAD83_UTM_ZONE_18N = 'urn:ogc:def:crs:EPSG::26918';

    /**
     * NAD83 / UTM zone 19N
     * Extent: North America - between 72°W and 66°W. Canada - Labrador; New Brunswick; Nova Scotia; Nunavut; Quebec.
     * Puerto Rico. USA - Connecticut; Maine; Massachusetts; New Hampshire; New York (Long Island); Rhode Island;
     * Vermont
     * Replaces NAD27 / UTM zone 19N. For accuracies better than 1m replaced by NAD83(CSRS) / UTM zone 19N in Canada
     * and NAD83(HARN) / UTM zone 19N in US.
     */
    public const EPSG_NAD83_UTM_ZONE_19N = 'urn:ogc:def:crs:EPSG::26919';

    /**
     * NAD83 / UTM zone 1N
     * Extent: USA - between 180°W and 174°W - Alaska and offshore continental shelf (OCS)
     * Replaces NAD27 / UTM zone 1N. For accuracies better than 1m replaced by NAD83(NSRS) / UTM zone 1N.
     */
    public const EPSG_NAD83_UTM_ZONE_1N = 'urn:ogc:def:crs:EPSG::26901';

    /**
     * NAD83 / UTM zone 20N
     * Extent: North America - between 66°W and 60°W. British Virgin Islands. Canada - New Brunswick; Labrador;
     * Nunavut; Prince Edward Island; Quebec. Puerto Rico. US Virgin Islands. USA offshore Atlantic
     * In Canada, replaces NAD27 / UTM zone 20N (CRS code 26720); for accuracies better than 1m replaced by NAD83(CSRS)
     * / UTM zone 20N(CRS code 2961). In BVI, replaces Puerto Rico / UTM zone 20N (CRS code 3920).
     */
    public const EPSG_NAD83_UTM_ZONE_20N = 'urn:ogc:def:crs:EPSG::26920';

    /**
     * NAD83 / UTM zone 21N
     * Extent: Canada between 60°W and 54°W - Newfoundland and Labrador; Nunavut; Quebec
     * Replaces NAD27 / UTM zone 21N. For accuracies better than 1m replaced by NAD83(CSRS) / UTM zone 21N.
     */
    public const EPSG_NAD83_UTM_ZONE_21N = 'urn:ogc:def:crs:EPSG::26921';

    /**
     * NAD83 / UTM zone 22N
     * Extent: Canada between 54°W and 48°W - Newfoundland and Labrador
     * Replaces NAD27 / UTM zone 22N. For accuracies better than 1m replaced by NAD83(CSRS) / UTM zone 22N.
     */
    public const EPSG_NAD83_UTM_ZONE_22N = 'urn:ogc:def:crs:EPSG::26922';

    /**
     * NAD83 / UTM zone 23N
     * Extent: Canada offshore Atlantic - 48°W to 42°W.
     */
    public const EPSG_NAD83_UTM_ZONE_23N = 'urn:ogc:def:crs:EPSG::26923';

    /**
     * NAD83 / UTM zone 24N
     * Extent: Canada offshore Atlantic - east of 42°W.
     */
    public const EPSG_NAD83_UTM_ZONE_24N = 'urn:ogc:def:crs:EPSG::9712';

    /**
     * NAD83 / UTM zone 2N
     * Extent: USA - between 174°W and 168°W - Alaska and offshore continental shelf (OCS)
     * Replaces NAD27 / UTM zone 2N. For accuracies better than 1m replaced by NAD83(NSRS) / UTM zone 2N.
     */
    public const EPSG_NAD83_UTM_ZONE_2N = 'urn:ogc:def:crs:EPSG::26902';

    /**
     * NAD83 / UTM zone 3N
     * Extent: USA - between 168°W and 162°W - Alaska and offshore continental shelf (OCS)
     * Replaces NAD27 / UTM zone 3N. For accuracies better than 1m replaced by NAD83(NSRS) / UTM zone 3N.
     */
    public const EPSG_NAD83_UTM_ZONE_3N = 'urn:ogc:def:crs:EPSG::26903';

    /**
     * NAD83 / UTM zone 4N
     * Extent: USA - between 162°W and 156°W - Alaska, Hawaii
     * Replaces NAD27 / UTM zone 4N in Alaska and Old Hawaii / UTM zone 4N in Hawaii. For accuracies better than 1m
     * replaced by NAD83(NSRS) / UTM zone 4N in Alaska and NAD83(HARN) UTM zone 4N in Hawaii.
     */
    public const EPSG_NAD83_UTM_ZONE_4N = 'urn:ogc:def:crs:EPSG::26904';

    /**
     * NAD83 / UTM zone 59N
     * Extent: USA - west of 174°E. Alaska and offshore continental shelf (OCS)
     * Replaces NAD27 / UTM zone 59N. For accuracies better than 1m replaced by NAD83(NSRS) / UTM zone 59N.
     */
    public const EPSG_NAD83_UTM_ZONE_59N = 'urn:ogc:def:crs:EPSG::3372';

    /**
     * NAD83 / UTM zone 5N
     * Extent: USA - between 156°W and 150°W - Alaska, Hawaii
     * Replaces NAD27 / UTM zone 5N in Alaska and Old Hawaii / UTM zone 5N in Hawaii. For accuracies better than 1m
     * replaced by NAD83(NSRS) / UTM zone 5N in Alaska and NAD83(HARN) UTM zone 5N in Hawaii.
     */
    public const EPSG_NAD83_UTM_ZONE_5N = 'urn:ogc:def:crs:EPSG::26905';

    /**
     * NAD83 / UTM zone 60N
     * Extent: USA - between 174°E and 180°E - Alaska and offshore continental shelf (OCS)
     * Replaces NAD27 / UTM zone 60N. For accuracies better than 1m replaced by NAD83(NSRS) / UTM zone 60N.
     */
    public const EPSG_NAD83_UTM_ZONE_60N = 'urn:ogc:def:crs:EPSG::3373';

    /**
     * NAD83 / UTM zone 6N
     * Extent: USA - between 150°W and 144°W - Alaska and offshore continental shelf (OCS)
     * Replaces NAD27 / UTM zone 6N. For accuracies better than 1m replaced by NAD83(NSRS) / UTM zone 6N.
     */
    public const EPSG_NAD83_UTM_ZONE_6N = 'urn:ogc:def:crs:EPSG::26906';

    /**
     * NAD83 / UTM zone 7N
     * Extent: North America - between 144°W and 138°W. Canada - British Columbia; Yukon. USA - Alaska
     * Replaces NAD27 / UTM zone 7N. For accuracies better than 1m replaced by NAD83(CSRS) / UTM zone 7N in Canada and
     * NAD83(NSRS2007) / UTM zone 7N in US.
     */
    public const EPSG_NAD83_UTM_ZONE_7N = 'urn:ogc:def:crs:EPSG::26907';

    /**
     * NAD83 / UTM zone 8N
     * Extent: North America - between 138°W and 132°W. Canada - British Columbia; Northwest Territiories; Yukon. USA
     * - Alaska
     * Replaces NAD27 / UTM zone 8N. For accuracies better than 1m replaced by NAD83(CSRS) / UTM zone 8N in Canada and
     * NAD83(NSRS2007) / UTM zone 8N in US.
     */
    public const EPSG_NAD83_UTM_ZONE_8N = 'urn:ogc:def:crs:EPSG::26908';

    /**
     * NAD83 / UTM zone 9N
     * Extent: North America - between 132°W and 126°W. Canada - British Columbia; Northwest Territories; Yukon. USA
     * - Alaska
     * Replaces NAD27 / UTM zone 9N. For accuracies better than 1m replaced by NAD83(CSRS) / UTM zone 9N in Canada and
     * NAD83(NSRS2007) / UTM zone 9N in US.
     */
    public const EPSG_NAD83_UTM_ZONE_9N = 'urn:ogc:def:crs:EPSG::26909';

    /**
     * NAD83 / Utah Central
     * Extent: USA - Utah - counties of Carbon; Duchesne; Emery; Grand; Juab; Millard; Salt Lake; Sanpete; Sevier;
     * Tooele; Uintah; Utah; Wasatch
     * State law of 2009 defines system in US survey feet: see CRS code 3566. An earlier state law of 1988 defining
     * system in International feet was withdrawn in 2001. For onshore applications with an accuracy of better than 1m,
     * replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_UTAH_CENTRAL = 'urn:ogc:def:crs:EPSG::32143';

    /**
     * NAD83 / Utah Central (ft)
     * Extent: USA - Utah - counties of Carbon; Duchesne; Emery; Grand; Juab; Millard; Salt Lake; Sanpete; Sevier;
     * Tooele; Uintah; Utah; Wasatch
     * State law defining system in International feet withdrawn 2001. Replaced 2009 by US Survey feet - see CRS code
     * 3566. Federal definition is metric - see code 32143. For applications with an accuracy of better than 3 feet,
     * replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_UTAH_CENTRAL_FT = 'urn:ogc:def:crs:EPSG::2281';

    /**
     * NAD83 / Utah Central (ftUS)
     * Extent: USA - Utah - counties of Carbon; Duchesne; Emery; Grand; Juab; Millard; Salt Lake; Sanpete; Sevier;
     * Tooele; Uintah; Utah; Wasatch
     * State law defining system in International feet (note: not US survey feet) has been withdrawn. Federal
     * definition is metric - see code 32143. For applications with an accuracy of better than 3 feet, replaced by
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_UTAH_CENTRAL_FTUS = 'urn:ogc:def:crs:EPSG::3566';

    /**
     * NAD83 / Utah North
     * Extent: USA - Utah - counties of Box Elder; Cache; Daggett; Davis; Morgan; Rich; Summit; Weber
     * State law of 2009 defines system in US survey feet: see CRS code 3560. An earlier state law of 1988 defining
     * system in International feet was withdrawn in 2001. For onshore applications with an accuracy of better than 1m,
     * replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_UTAH_NORTH = 'urn:ogc:def:crs:EPSG::32142';

    /**
     * NAD83 / Utah North (ft)
     * Extent: USA - Utah - counties of Box Elder; Cache; Daggett; Davis; Morgan; Rich; Summit; Weber
     * State law defining system in International feet withdrawn 2001. Replaced 2009 by US Survey feet - see CRS code
     * 3560. Federal definition is metric - see code 32142. For applications with an accuracy of better than 3 feet,
     * replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_UTAH_NORTH_FT = 'urn:ogc:def:crs:EPSG::2280';

    /**
     * NAD83 / Utah North (ftUS)
     * Extent: USA - Utah - counties of Box Elder; Cache; Daggett; Davis; Morgan; Rich; Summit; Weber
     * State law defining system in International feet (note: not US survey feet) has been withdrawn. Federal
     * definition is metric - see code 32142. For applications with an accuracy of better than 3 feet, replaced by
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_UTAH_NORTH_FTUS = 'urn:ogc:def:crs:EPSG::3560';

    /**
     * NAD83 / Utah South
     * Extent: USA - Utah - counties of Beaver; Garfield; Iron; Kane; Piute; San Juan; Washington; Wayne
     * State law of 2009 defines system in US survey feet: see CRS code 3567. An earlier state law of 1988 defining
     * system in International feet was withdrawn in 2001. For onshore applications with an accuracy of better than 1m,
     * replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_UTAH_SOUTH = 'urn:ogc:def:crs:EPSG::32144';

    /**
     * NAD83 / Utah South (ft)
     * Extent: USA - Utah - counties of Beaver; Garfield; Iron; Kane; Piute; San Juan; Washington; Wayne
     * State law defining system in International feet withdrawn 2001. Replaced 2009 by US Survey feet - see CRS code
     * 3567. Federal definition is metric - see code 32144. For applications with an accuracy of better than 3 feet,
     * replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_UTAH_SOUTH_FT = 'urn:ogc:def:crs:EPSG::2282';

    /**
     * NAD83 / Utah South (ftUS)
     * Extent: USA - Utah - counties of Beaver; Garfield; Iron; Kane; Piute; San Juan; Washington; Wayne
     * State law defining system in International feet (note: not US survey feet) has been withdrawn. Federal
     * definition is metric - see code 32144. For applications with an accuracy of better than 3 feet, replaced by
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_UTAH_SOUTH_FTUS = 'urn:ogc:def:crs:EPSG::3567';

    /**
     * NAD83 / Vermont
     * Extent: USA - Vermont - counties of Addison; Bennington; Caledonia; Chittenden; Essex; Franklin; Grand Isle;
     * Lamoille; Orange; Orleans; Rutland; Washington; Windham; Windsor
     * State law defines system in US survey feet. See code 5646 for equivalent non-metric definition. For applications
     * with an accuracy of better than 1m, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_VERMONT = 'urn:ogc:def:crs:EPSG::32145';

    /**
     * NAD83 / Vermont (ftUS)
     * Extent: USA - Vermont - counties of Addison; Bennington; Caledonia; Chittenden; Essex; Franklin; Grand Isle;
     * Lamoille; Orange; Orleans; Rutland; Washington; Windham; Windsor
     * State law defines system in US survey feet. Federal definition is metric - see code 32145. For applications with
     * an accuracy of better than 3 feet, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_VERMONT_FTUS = 'urn:ogc:def:crs:EPSG::5646';

    /**
     * NAD83 / Virginia Lambert
     * Extent: USA - Virginia
     * For applications with an accuracy of better than 1m, replaced by NAD83(HARN) / Virginia Lambert (CRS code 3969).
     */
    public const EPSG_NAD83_VIRGINIA_LAMBERT = 'urn:ogc:def:crs:EPSG::3968';

    /**
     * NAD83 / Virginia North
     * Extent: USA - Virginia - counties of Arlington; Augusta; Bath; Caroline; Clarke; Culpeper; Fairfax; Fauquier;
     * Frederick; Greene; Highland; King George; Loudoun; Madison; Orange; Page; Prince William; Rappahannock;
     * Rockingham; Shenandoah; Spotsylvania; Stafford; Warren; Westmoreland
     * State law defines system in US survey feet. See code 2283 for equivalent non-metric definition. For applications
     * with an accuracy of better than 1m, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_VIRGINIA_NORTH = 'urn:ogc:def:crs:EPSG::32146';

    /**
     * NAD83 / Virginia North (ftUS)
     * Extent: USA - Virginia - counties of Arlington; Augusta; Bath; Caroline; Clarke; Culpeper; Fairfax; Fauquier;
     * Frederick; Greene; Highland; King George; Loudoun; Madison; Orange; Page; Prince William; Rappahannock;
     * Rockingham; Shenandoah; Spotsylvania; Stafford; Warren; Westmoreland
     * State law defines system in US survey feet. Federal definition is metric - see code 32146. For applications with
     * an accuracy of better than 3 feet, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_VIRGINIA_NORTH_FTUS = 'urn:ogc:def:crs:EPSG::2283';

    /**
     * NAD83 / Virginia South
     * Extent: USA - Virginia - counties of Accomack; Albemarle; Alleghany; Amelia; Amherst; Appomattox; Bedford;
     * Bland; Botetourt; Bristol; Brunswick; Buchanan; Buckingham; Campbell; Carroll; Charles City; Charlotte;
     * Chesapeake; Chesterfield; Colonial Heights; Craig; Cumberland; Dickenson; Dinwiddie; Essex; Floyd; Fluvanna;
     * Franklin; Giles; Gloucester; Goochland; Grayson; Greensville; Halifax; Hampton; Hanover; Henrico; Henry; Isle of
     * Wight; James City; King and Queen; King William; Lancaster; Lee; Louisa; Lunenburg; Lynchburg; Mathews;
     * Mecklenburg; Middlesex; Montgomery; Nelson; New Kent; Newport News; Norfolk; Northampton; Northumberland;
     * Norton; Nottoway; Patrick; Petersburg; Pittsylvania; Portsmouth; Powhatan; Prince Edward; Prince George;
     * Pulaski; Richmond; Roanoke; Rockbridge; Russell; Scott; Smyth; Southampton; Suffolk; Surry; Sussex; Tazewell;
     * Washington; Wise; Wythe; York
     * State law defines system in US survey feet. See code 2284 for equivalent non-metric definition. For applications
     * with an accuracy of better than 1m, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_VIRGINIA_SOUTH = 'urn:ogc:def:crs:EPSG::32147';

    /**
     * NAD83 / Virginia South (ftUS)
     * Extent: USA - Virginia - counties of Accomack; Albemarle; Alleghany; Amelia; Amherst; Appomattox; Bedford;
     * Bland; Botetourt; Bristol; Brunswick; Buchanan; Buckingham; Campbell; Carroll; Charles City; Charlotte;
     * Chesapeake; Chesterfield; Colonial Heights; Craig; Cumberland; Dickenson; Dinwiddie; Essex; Floyd; Fluvanna;
     * Franklin; Giles; Gloucester; Goochland; Grayson; Greensville; Halifax; Hampton; Hanover; Henrico; Henry; Isle of
     * Wight; James City; King and Queen; King William; Lancaster; Lee; Louisa; Lunenburg; Lynchburg; Mathews;
     * Mecklenburg; Middlesex; Montgomery; Nelson; New Kent; Newport News; Norfolk; Northampton; Northumberland;
     * Norton; Nottoway; Patrick; Petersburg; Pittsylvania; Portsmouth; Powhatan; Prince Edward; Prince George;
     * Pulaski; Richmond; Roanoke; Rockbridge; Russell; Scott; Smyth; Southampton; Suffolk; Surry; Sussex; Tazewell;
     * Washington; Wise; Wythe; York
     * State law defines system in US survey feet. Federal definition is metric - see code 32147. For applications with
     * an accuracy of better than 3 feet, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_VIRGINIA_SOUTH_FTUS = 'urn:ogc:def:crs:EPSG::2284';

    /**
     * NAD83 / Washington North
     * Extent: USA - Washington - counties of Chelan; Clallam; Douglas; Ferry; Grant north of approximately 47°30'N;
     * Island; Jefferson; King; Kitsap; Lincoln; Okanogan; Pend Oreille; San Juan; Skagit; Snohomish; Spokane; Stevens;
     * Whatcom
     * State law defines system in US survey feet. See code 2285 for equivalent non-metric definition. For applications
     * with an accuracy of better than 1m, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_WASHINGTON_NORTH = 'urn:ogc:def:crs:EPSG::32148';

    /**
     * NAD83 / Washington North (ftUS)
     * Extent: USA - Washington - counties of Chelan; Clallam; Douglas; Ferry; Grant north of approximately 47°30'N;
     * Island; Jefferson; King; Kitsap; Lincoln; Okanogan; Pend Oreille; San Juan; Skagit; Snohomish; Spokane; Stevens;
     * Whatcom
     * State law defines system in US survey feet. Federal definition is metric - see code 32148. For applications with
     * an accuracy of better than 3 feet, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_WASHINGTON_NORTH_FTUS = 'urn:ogc:def:crs:EPSG::2285';

    /**
     * NAD83 / Washington South
     * Extent: USA - Washington - counties of Adams; Asotin; Benton; Clark; Columbia; Cowlitz; Franklin; Garfield;
     * Grant south of approximately 47°30'N; Grays Harbor; Kittitas; Klickitat; Lewis; Mason; Pacific; Pierce;
     * Skamania; Thurston; Wahkiakum; Walla Walla; Whitman; Yakima
     * State law defines system in US survey feet. See code 2286 for equivalent non-metric definition. For applications
     * with an accuracy of better than 1m, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_WASHINGTON_SOUTH = 'urn:ogc:def:crs:EPSG::32149';

    /**
     * NAD83 / Washington South (ftUS)
     * Extent: USA - Washington - counties of Adams; Asotin; Benton; Clark; Columbia; Cowlitz; Franklin; Garfield;
     * Grant south of approximately 47°30'N; Grays Harbor; Kittitas; Klickitat; Lewis; Mason; Pacific; Pierce;
     * Skamania; Thurston; Wahkiakum; Walla Walla; Whitman; Yakima
     * State law defines system in US survey feet. Federal definition is metric - see code 32149. For applications with
     * an accuracy of better than 3 feet, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_WASHINGTON_SOUTH_FTUS = 'urn:ogc:def:crs:EPSG::2286';

    /**
     * NAD83 / West Virginia North
     * Extent: USA - West Virginia - counties of Barbour; Berkeley; Brooke; Doddridge; Grant; Hampshire; Hancock;
     * Hardy; Harrison; Jefferson; Marion; Marshall; Mineral; Monongalia; Morgan; Ohio; Pleasants; Preston; Ritchie;
     * Taylor; Tucker; Tyler; Wetzel; Wirt; Wood
     * State law defines system in US survey feet. See CRS code 26853 for equivalent non-metric definition. For
     * applications with an accuracy of better than 1m, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_WEST_VIRGINIA_NORTH = 'urn:ogc:def:crs:EPSG::32150';

    /**
     * NAD83 / West Virginia North (ftUS)
     * Extent: USA - West Virginia - counties of Barbour; Berkeley; Brooke; Doddridge; Grant; Hampshire; Hancock;
     * Hardy; Harrison; Jefferson; Marion; Marshall; Mineral; Monongalia; Morgan; Ohio; Pleasants; Preston; Ritchie;
     * Taylor; Tucker; Tyler; Wetzel; Wirt; Wood
     * State law defines use of US survey feet. Federal definition is metric - see code 32150. For applications with an
     * accuracy of better than 3ft, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_WEST_VIRGINIA_NORTH_FTUS = 'urn:ogc:def:crs:EPSG::26853';

    /**
     * NAD83 / West Virginia South
     * Extent: USA - West Virginia - counties of Boone; Braxton; Cabell; Calhoun; Clay; Fayette; Gilmer; Greenbrier;
     * Jackson; Kanawha; Lewis; Lincoln; Logan; Mason; McDowell; Mercer; Mingo; Monroe; Nicholas; Pendleton;
     * Pocahontas; Putnam; Raleigh; Randolph; Roane; Summers; Upshur; Wayne; Webster; Wyoming
     * State law defines system in US survey feet. See CRS code 26854 for equivalent non-metric definition. For
     * applications with an accuracy of better than 1m, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_WEST_VIRGINIA_SOUTH = 'urn:ogc:def:crs:EPSG::32151';

    /**
     * NAD83 / West Virginia South (ftUS)
     * Extent: USA - West Virginia - counties of Boone; Braxton; Cabell; Calhoun; Clay; Fayette; Gilmer; Greenbrier;
     * Jackson; Kanawha; Lewis; Lincoln; Logan; Mason; McDowell; Mercer; Mingo; Monroe; Nicholas; Pendleton;
     * Pocahontas; Putnam; Raleigh; Randolph; Roane; Summers; Upshur; Wayne; Webster; Wyoming
     * State law defines use of US survey feet. Federal definition is metric - see code 32151. For applications with an
     * accuracy of better than 3ft, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_WEST_VIRGINIA_SOUTH_FTUS = 'urn:ogc:def:crs:EPSG::26854';

    /**
     * NAD83 / Wisconsin Central
     * Extent: USA - Wisconsin - counties of Barron; Brown; Buffalo; Chippewa; Clark; Door; Dunn; Eau Claire; Jackson;
     * Kewaunee; Langlade; Lincoln; Marathon; Marinette; Menominee; Oconto; Outagamie; Pepin; Pierce; Polk; Portage;
     * Rusk; Shawano; St Croix; Taylor; Trempealeau; Waupaca; Wood
     * State law defines system in US survey feet. See code 2288 for equivalent non-metric definition. For applications
     * with an accuracy of better than 1m, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_WISCONSIN_CENTRAL = 'urn:ogc:def:crs:EPSG::32153';

    /**
     * NAD83 / Wisconsin Central (ftUS)
     * Extent: USA - Wisconsin - counties of Barron; Brown; Buffalo; Chippewa; Clark; Door; Dunn; Eau Claire; Jackson;
     * Kewaunee; Langlade; Lincoln; Marathon; Marinette; Menominee; Oconto; Outagamie; Pepin; Pierce; Polk; Portage;
     * Rusk; Shawano; St Croix; Taylor; Trempealeau; Waupaca; Wood
     * State law defines system in US survey feet. Federal definition is metric - see code 32153. For applications with
     * an accuracy of better than 3 feet, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_WISCONSIN_CENTRAL_FTUS = 'urn:ogc:def:crs:EPSG::2288';

    /**
     * NAD83 / Wisconsin North
     * Extent: USA - Wisconsin - counties of Ashland; Bayfield; Burnett; Douglas; Florence; Forest; Iron; Oneida;
     * Price; Sawyer; Vilas; Washburn
     * State law defines system in US survey feet. See code 2287 for equivalent non-metric definition. For applications
     * with an accuracy of better than 1m, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_WISCONSIN_NORTH = 'urn:ogc:def:crs:EPSG::32152';

    /**
     * NAD83 / Wisconsin North (ftUS)
     * Extent: USA - Wisconsin - counties of Ashland; Bayfield; Burnett; Douglas; Florence; Forest; Iron; Oneida;
     * Price; Sawyer; Vilas; Washburn
     * State law defines system in US survey feet. Federal definition is metric - see code 32152. For applications with
     * an accuracy of better than 3 feet, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_WISCONSIN_NORTH_FTUS = 'urn:ogc:def:crs:EPSG::2287';

    /**
     * NAD83 / Wisconsin South
     * Extent: USA - Wisconsin - counties of Adams; Calumet; Columbia; Crawford; Dane; Dodge; Fond Du Lac; Grant;
     * Green; Green Lake; Iowa; Jefferson; Juneau; Kenosha; La Crosse; Lafayette; Manitowoc; Marquette; Milwaukee;
     * Monroe; Ozaukee; Racine; Richland; Rock; Sauk; Sheboygan; Vernon; Walworth; Washington; Waukesha; Waushara;
     * Winnebago
     * State law defines system in US survey feet. See code 2289 for equivalent non-metric definition. For applications
     * with an accuracy of better than 1m, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_WISCONSIN_SOUTH = 'urn:ogc:def:crs:EPSG::32154';

    /**
     * NAD83 / Wisconsin South (ftUS)
     * Extent: USA - Wisconsin - counties of Adams; Calumet; Columbia; Crawford; Dane; Dodge; Fond Du Lac; Grant;
     * Green; Green Lake; Iowa; Jefferson; Juneau; Kenosha; La Crosse; Lafayette; Manitowoc; Marquette; Milwaukee;
     * Monroe; Ozaukee; Racine; Richland; Rock; Sauk; Sheboygan; Vernon; Walworth; Washington; Waukesha; Waushara;
     * Winnebago
     * State law defines system in US survey feet. Federal definition is metric - see code 32154. For applications with
     * an accuracy of better than 3 feet, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_WISCONSIN_SOUTH_FTUS = 'urn:ogc:def:crs:EPSG::2289';

    /**
     * NAD83 / Wisconsin Transverse Mercator
     * Extent: USA - Wisconsin
     * Designed as a single zone for the whole state. Replaces NAD27 / Wisconsin Transverse Mercator (CRS code 3069).
     * For applications with an accuracy of better than 1m, replaced by NAD83(HARN) / Wisconsin Transverse Mercator.
     */
    public const EPSG_NAD83_WISCONSIN_TRANSVERSE_MERCATOR = 'urn:ogc:def:crs:EPSG::3070';

    /**
     * NAD83 / Wyoming East
     * Extent: USA - Wyoming - counties of Albany; Campbell; Converse; Crook; Goshen; Laramie; Niobrara; Platte; Weston
     * State law defines system in US survey feet. See code 3736 for equivalent non-metric definition. For applications
     * with an accuracy of better than 1m, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_WYOMING_EAST = 'urn:ogc:def:crs:EPSG::32155';

    /**
     * NAD83 / Wyoming East (ftUS)
     * Extent: USA - Wyoming - counties of Albany; Campbell; Converse; Crook; Goshen; Laramie; Niobrara; Platte; Weston
     * State law defines use of US survey feet. Federal definition is metric - see code 32155. Replaced by NAD83(HARN)
     * / SPCS for applications with an accuracy of better than 3 feet.
     */
    public const EPSG_NAD83_WYOMING_EAST_FTUS = 'urn:ogc:def:crs:EPSG::3736';

    /**
     * NAD83 / Wyoming East Central
     * Extent: USA - Wyoming - counties of Big Horn; Carbon; Johnson; Natrona; Sheridan; Washakie
     * State law defines system in US survey feet. See code 3737 for equivalent non-metric definition. For applications
     * with an accuracy of better than 1m, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_WYOMING_EAST_CENTRAL = 'urn:ogc:def:crs:EPSG::32156';

    /**
     * NAD83 / Wyoming East Central (ftUS)
     * Extent: USA - Wyoming - counties of Big Horn; Carbon; Johnson; Natrona; Sheridan; Washakie
     * State law defines use of US survey feet. Federal definition is metric - see code 32156. Replaced by NAD83(HARN)
     * / SPCS for applications with an accuracy of better than 3 feet.
     */
    public const EPSG_NAD83_WYOMING_EAST_CENTRAL_FTUS = 'urn:ogc:def:crs:EPSG::3737';

    /**
     * NAD83 / Wyoming Lambert
     * Extent: USA - Wyoming.
     */
    public const EPSG_NAD83_WYOMING_LAMBERT = 'urn:ogc:def:crs:EPSG::32159';

    /**
     * NAD83 / Wyoming West
     * Extent: USA - Wyoming - counties of Lincoln; Sublette; Teton; Uinta
     * State law defines system in US survey feet. See code 3739 for equivalent non-metric definition. For applications
     * with an accuracy of better than 1m, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_WYOMING_WEST = 'urn:ogc:def:crs:EPSG::32158';

    /**
     * NAD83 / Wyoming West (ftUS)
     * Extent: USA - Wyoming - counties of Lincoln; Sublette; Teton; Uinta
     * State law defines use of US survey feet. Federal definition is metric - see code 32158. Replaced by NAD83(HARN)
     * / SPCS for applications with an accuracy of better than 3 feet.
     */
    public const EPSG_NAD83_WYOMING_WEST_FTUS = 'urn:ogc:def:crs:EPSG::3739';

    /**
     * NAD83 / Wyoming West Central
     * Extent: USA - Wyoming - counties of Fremont; Hot Springs; Park; Sweetwater
     * State law defines system in US survey feet. See code 3738 for equivalent non-metric definition. For applications
     * with an accuracy of better than 1m, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_WYOMING_WEST_CENTRAL = 'urn:ogc:def:crs:EPSG::32157';

    /**
     * NAD83 / Wyoming West Central (ftUS)
     * Extent: USA - Wyoming - counties of Fremont; Hot Springs; Park; Sweetwater
     * State law defines use of US survey feet. Federal definition is metric - see code 32157. Replaced by NAD83(HARN)
     * / SPCS for applications with an accuracy of better than 3 feet.
     */
    public const EPSG_NAD83_WYOMING_WEST_CENTRAL_FTUS = 'urn:ogc:def:crs:EPSG::3738';

    /**
     * NAD83 / Yukon Albers
     * Extent: Canada - Yukon
     * This CRS name may sometimes be used as an alias for NAD83(CSRS) / Yukon Albers. See CRS code 3579.
     */
    public const EPSG_NAD83_YUKON_ALBERS = 'urn:ogc:def:crs:EPSG::3578';

    /**
     * NAD83(2011) / Adjusted Jackson (ftUS)
     * Extent: USA - Wisconsin - Jackson county
     * Introduced in 2011 for use with the WISCORS network to emulate NAD83(HARN) / WISCRS Jackson (ftUS) (CRS code
     * 8162)  coordinates which remain the official CRS for the county.
     */
    public const EPSG_NAD83_2011_ADJUSTED_JACKSON_FTUS = 'urn:ogc:def:crs:EPSG::10516';

    /**
     * NAD83(2011) / Alabama East
     * Extent: USA - Alabama east of approximately 86°37'W - counties Barbour; Bullock; Calhoun; Chambers; Cherokee;
     * Clay; Cleburne; Coffee; Coosa; Covington; Crenshaw; Dale; De Kalb; Elmore; Etowah; Geneva; Henry; Houston;
     * Jackson; Lee; Macon; Madison; Marshall; Montgomery; Pike; Randolph; Russell; St Clair; Talladega; Tallapoosa
     * Replaces NAD83(NSRS2007) / Alabama East (CRS code 3465).
     */
    public const EPSG_NAD83_2011_ALABAMA_EAST = 'urn:ogc:def:crs:EPSG::6355';

    /**
     * NAD83(2011) / Alabama East (ftUS)
     * Extent: USA - Alabama east of approximately 86°37'W - counties Barbour; Bullock; Calhoun; Chambers; Cherokee;
     * Clay; Cleburne; Coffee; Coosa; Covington; Crenshaw; Dale; De Kalb; Elmore; Etowah; Geneva; Henry; Houston;
     * Jackson; Lee; Macon; Madison; Marshall; Montgomery; Pike; Randolph; Russell; St Clair; Talladega; Tallapoosa
     * The Federal government does not recognise this system because the State of Alabama has no legislation defining
     * the foot to be used for NAD83. US survey foot required by ALDOT. See NAD83(2011) / Alabama East (CRS code 6355)
     * for official metric definition.
     */
    public const EPSG_NAD83_2011_ALABAMA_EAST_FTUS = 'urn:ogc:def:crs:EPSG::9748';

    /**
     * NAD83(2011) / Alabama West
     * Extent: USA - Alabama west of approximately 86°37'W - counties Autauga; Baldwin; Bibb; Blount; Butler; Chilton;
     * Choctaw; Clarke; Colbert; Conecuh; Cullman; Dallas; Escambia; Fayette; Franklin; Greene; Hale; Jefferson; Lamar;
     * Lauderdale; Lawrence; Limestone; Lowndes; Marengo; Marion; Mobile; Monroe; Morgan; Perry; Pickens; Shelby;
     * Sumter; Tuscaloosa; Walker; Washington; Wilcox; Winston
     * Replaces NAD83(NSRS2007) / Alabama West (CRS code 3466).
     */
    public const EPSG_NAD83_2011_ALABAMA_WEST = 'urn:ogc:def:crs:EPSG::6356';

    /**
     * NAD83(2011) / Alabama West (ftUS)
     * Extent: USA - Alabama west of approximately 86°37'W - counties Autauga; Baldwin; Bibb; Blount; Butler; Chilton;
     * Choctaw; Clarke; Colbert; Conecuh; Cullman; Dallas; Escambia; Fayette; Franklin; Greene; Hale; Jefferson; Lamar;
     * Lauderdale; Lawrence; Limestone; Lowndes; Marengo; Marion; Mobile; Monroe; Morgan; Perry; Pickens; Shelby;
     * Sumter; Tuscaloosa; Walker; Washington; Wilcox; Winston
     * The Federal government does not recognise this system because the State of Alabama has no legislation defining
     * the foot to be used for NAD83. US survey foot required by ALDOT. See NAD83(2011) / Alabama West (CRS code 6356)
     * for official metric definition.
     */
    public const EPSG_NAD83_2011_ALABAMA_WEST_FTUS = 'urn:ogc:def:crs:EPSG::9749';

    /**
     * NAD83(2011) / Alaska Albers
     * Extent: USA - Alaska
     * Replaces NAD83(NSRS2007) / Alaska Albers (CRS code 3467).
     */
    public const EPSG_NAD83_2011_ALASKA_ALBERS = 'urn:ogc:def:crs:EPSG::6393';

    /**
     * NAD83(2011) / Alaska zone 1
     * Extent: USA - Alaska - east of 141°W; i.e. Panhandle
     * Replaces NAD83(NSRS2007) / Alaska zone (CRS code 3468).
     */
    public const EPSG_NAD83_2011_ALASKA_ZONE_1 = 'urn:ogc:def:crs:EPSG::6394';

    /**
     * NAD83(2011) / Alaska zone 10
     * Extent: USA - Alaska - Aleutian Islands onshore
     * Replaces NAD83(NSRS2007) / Alaska zone 10 (CRS code 3477).
     */
    public const EPSG_NAD83_2011_ALASKA_ZONE_10 = 'urn:ogc:def:crs:EPSG::6403';

    /**
     * NAD83(2011) / Alaska zone 2
     * Extent: USA - Alaska - between 144°W and 141°W, onshore
     * Replaces NAD83(NSRS2007) / Alaska zone 2 (CRS code 3469).
     */
    public const EPSG_NAD83_2011_ALASKA_ZONE_2 = 'urn:ogc:def:crs:EPSG::6395';

    /**
     * NAD83(2011) / Alaska zone 3
     * Extent: USA - Alaska - between 148°W and 144°W
     * Replaces NAD83(NSRS2007) / Alaska zone 3 (CRS code 3470).
     */
    public const EPSG_NAD83_2011_ALASKA_ZONE_3 = 'urn:ogc:def:crs:EPSG::6396';

    /**
     * NAD83(2011) / Alaska zone 4
     * Extent: USA - Alaska - between 152°W and 148°W, onshore
     * Replaces NAD83(NSRS2007) / Alaska zone 4 (CRS code 3471).
     */
    public const EPSG_NAD83_2011_ALASKA_ZONE_4 = 'urn:ogc:def:crs:EPSG::6397';

    /**
     * NAD83(2011) / Alaska zone 5
     * Extent: USA - Alaska - between 156°W and 152°W
     * Replaces NAD83(NSRS2007) / Alaska zone 5 (CRS code 3472).
     */
    public const EPSG_NAD83_2011_ALASKA_ZONE_5 = 'urn:ogc:def:crs:EPSG::6398';

    /**
     * NAD83(2011) / Alaska zone 6
     * Extent: USA - Alaska - between 160°W and 156°W, onshore
     * Replaces NAD83(NSRS2007) / Alaska zone 6 (CRS code 3473).
     */
    public const EPSG_NAD83_2011_ALASKA_ZONE_6 = 'urn:ogc:def:crs:EPSG::6399';

    /**
     * NAD83(2011) / Alaska zone 7
     * Extent: USA - Alaska - between 164°W and 160°W, onshore
     * Replaces NAD83(NSRS2007) / Alaska zone 7 (CRS code 3474).
     */
    public const EPSG_NAD83_2011_ALASKA_ZONE_7 = 'urn:ogc:def:crs:EPSG::6400';

    /**
     * NAD83(2011) / Alaska zone 8
     * Extent: USA - Alaska onshore north of 54°30'N and between 168°W and 164°W
     * Replaces NAD83(NSRS2007) / Alaska zone 8 (CRS code 3475).
     */
    public const EPSG_NAD83_2011_ALASKA_ZONE_8 = 'urn:ogc:def:crs:EPSG::6401';

    /**
     * NAD83(2011) / Alaska zone 9
     * Extent: USA - Alaska onshore north of 54°30'N and west of 168°W
     * Replaces NAD83(NSRS2007) / Alaska zone 9 (CRS code 3476).
     */
    public const EPSG_NAD83_2011_ALASKA_ZONE_9 = 'urn:ogc:def:crs:EPSG::6402';

    /**
     * NAD83(2011) / Amtrak NECCS21 (ft)
     * Extent: USA - parts of Connecticut, Delaware, District of Columbia, Maryland, Massachusetts, New Jersey, New
     * York, Pennsylvania, Rhode Island and Virginia on or related to the Amtrak northeast corridor rail route from
     * Boston to Washington DC via New York and Philadelphia.
     */
    public const EPSG_NAD83_2011_AMTRAK_NECCS21_FT = 'urn:ogc:def:crs:EPSG::20050';

    /**
     * NAD83(2011) / Arizona Central
     * Extent: USA - Arizona - counties Coconino; Maricopa; Pima; Pinal; Santa Cruz; Yavapai
     * State law defines use of International feet (note: not US survey feet). See code 6405 for equivalent non-metric
     * definition. Replaces NAD83(NSRS2007) / Arizona Central (CRS code 3478).
     */
    public const EPSG_NAD83_2011_ARIZONA_CENTRAL = 'urn:ogc:def:crs:EPSG::6404';

    /**
     * NAD83(2011) / Arizona Central (ft)
     * Extent: USA - Arizona - counties Coconino; Maricopa; Pima; Pinal; Santa Cruz; Yavapai
     * State law defines use of International feet (note: not US survey feet). Federal definition is metric - see code
     * 6404. Replaces NAD83(NSRS2007) / Arizona Central (ft) (CRS code 3479).
     */
    public const EPSG_NAD83_2011_ARIZONA_CENTRAL_FT = 'urn:ogc:def:crs:EPSG::6405';

    /**
     * NAD83(2011) / Arizona East
     * Extent: USA - Arizona - counties Apache; Cochise; Gila; Graham; Greenlee; Navajo
     * State law defines use of International feet (note: not US survey feet). See code 6407 for equivalent non-metric
     * definition. Replaces NAD83(NSRS2007) / Arizona East (CRS code 3480).
     */
    public const EPSG_NAD83_2011_ARIZONA_EAST = 'urn:ogc:def:crs:EPSG::6406';

    /**
     * NAD83(2011) / Arizona East (ft)
     * Extent: USA - Arizona - counties Apache; Cochise; Gila; Graham; Greenlee; Navajo
     * State law defines use of International feet (note: not US survey feet). Federal definition is metric - see code
     * 6406. Replaces NAD83(NSRS2007) / Arizona East (ft) (CRS code 3481).
     */
    public const EPSG_NAD83_2011_ARIZONA_EAST_FT = 'urn:ogc:def:crs:EPSG::6407';

    /**
     * NAD83(2011) / Arizona West
     * Extent: USA - Arizona - counties of La Paz; Mohave; Yuma
     * State law defines use of International feet (note: not US survey feet). See code 6409 for equivalent non-metric
     * definition. Replaces NAD83(NSRS2007) / Arizona West (CRS code 3482).
     */
    public const EPSG_NAD83_2011_ARIZONA_WEST = 'urn:ogc:def:crs:EPSG::6408';

    /**
     * NAD83(2011) / Arizona West (ft)
     * Extent: USA - Arizona - counties of La Paz; Mohave; Yuma
     * State law defines use of International feet (note: not US survey feet). Federal definition is metric - see code
     * 6408. Replaces NAD83(NSRS2007) / Arizona West (ft) (CRS code 3483).
     */
    public const EPSG_NAD83_2011_ARIZONA_WEST_FT = 'urn:ogc:def:crs:EPSG::6409';

    /**
     * NAD83(2011) / Arkansas North
     * Extent: USA - Arkansas - counties of Baxter; Benton; Boone; Carroll; Clay; Cleburne; Conway; Craighead;
     * Crawford; Crittenden; Cross; Faulkner; Franklin; Fulton; Greene; Independence; Izard; Jackson; Johnson;
     * Lawrence; Logan; Madison; Marion; Mississippi; Newton; Perry; Poinsett; Pope; Randolph; Scott; Searcy;
     * Sebastian; Sharp; St Francis; Stone; Van Buren; Washington; White; Woodruff; Yell
     * State law defines use of US survey feet. See code 6411 for equivalent non-metric definition. Replaces
     * NAD83(NSRS2007) / Arkansas North (CRS code 3484).
     */
    public const EPSG_NAD83_2011_ARKANSAS_NORTH = 'urn:ogc:def:crs:EPSG::6410';

    /**
     * NAD83(2011) / Arkansas North (ftUS)
     * Extent: USA - Arkansas - counties of Baxter; Benton; Boone; Carroll; Clay; Cleburne; Conway; Craighead;
     * Crawford; Crittenden; Cross; Faulkner; Franklin; Fulton; Greene; Independence; Izard; Jackson; Johnson;
     * Lawrence; Logan; Madison; Marion; Mississippi; Newton; Perry; Poinsett; Pope; Randolph; Scott; Searcy;
     * Sebastian; Sharp; St Francis; Stone; Van Buren; Washington; White; Woodruff; Yell
     * State law defines use of US survey feet. Federal definition is metric - see code 6410. Replaces NAD83(NSRS2007)
     * / Arkansas North (ftUS) (CRS code 3485).
     */
    public const EPSG_NAD83_2011_ARKANSAS_NORTH_FTUS = 'urn:ogc:def:crs:EPSG::6411';

    /**
     * NAD83(2011) / Arkansas South
     * Extent: USA - Arkansas - counties Arkansas; Ashley; Bradley; Calhoun; Chicot; Clark; Cleveland; Columbia;
     * Dallas; Desha; Drew; Garland; Grant; Hempstead; Hot Spring; Howard; Jefferson; Lafayette; Lee; Lincoln; Little
     * River; Lonoke; Miller; Monroe; Montgomery; Nevada; Ouachita; Phillips; Pike; Polk; Prairie; Pulaski; Saline;
     * Sevier; Union
     * State law defines use of US survey feet. See code 6413 for equivalent non-metric definition. Replaces
     * NAD83(NSRS2007) / Arkansas South (CRS code 3486).
     */
    public const EPSG_NAD83_2011_ARKANSAS_SOUTH = 'urn:ogc:def:crs:EPSG::6412';

    /**
     * NAD83(2011) / Arkansas South (ftUS)
     * Extent: USA - Arkansas - counties Arkansas; Ashley; Bradley; Calhoun; Chicot; Clark; Cleveland; Columbia;
     * Dallas; Desha; Drew; Garland; Grant; Hempstead; Hot Spring; Howard; Jefferson; Lafayette; Lee; Lincoln; Little
     * River; Lonoke; Miller; Monroe; Montgomery; Nevada; Ouachita; Phillips; Pike; Polk; Prairie; Pulaski; Saline;
     * Sevier; Union
     * State law defines use of US survey feet. Federal definition is metric - see code 6412. Replaces NAD83(NSRS2007)
     * / Arkansas South (ftUS) (CRS code 3487).
     */
    public const EPSG_NAD83_2011_ARKANSAS_SOUTH_FTUS = 'urn:ogc:def:crs:EPSG::6413';

    /**
     * NAD83(2011) / California Albers
     * Extent: USA - California
     * Replaces NAD83(NSRS2007) / California Albers (CRS code 3488).
     */
    public const EPSG_NAD83_2011_CALIFORNIA_ALBERS = 'urn:ogc:def:crs:EPSG::6414';

    /**
     * NAD83(2011) / California zone 1
     * Extent: USA - California - counties Del Norte; Humboldt; Lassen; Modoc; Plumas; Shasta; Siskiyou; Tehama;
     * Trinity
     * State law defines use of US survey feet. See code 6416 for equivalent non-metric definition. Replaces
     * NAD83(NSRS2007) / California zone 1 (CRS code 3489).
     */
    public const EPSG_NAD83_2011_CALIFORNIA_ZONE_1 = 'urn:ogc:def:crs:EPSG::6415';

    /**
     * NAD83(2011) / California zone 1 (ftUS)
     * Extent: USA - California - counties Del Norte; Humboldt; Lassen; Modoc; Plumas; Shasta; Siskiyou; Tehama;
     * Trinity
     * State law defines use of US survey feet. Federal definition is metric - see code 6415. Replaces NAD83(NSRS2007)
     * / California zone 1 (ftUS) (CRS code 3490).
     */
    public const EPSG_NAD83_2011_CALIFORNIA_ZONE_1_FTUS = 'urn:ogc:def:crs:EPSG::6416';

    /**
     * NAD83(2011) / California zone 2
     * Extent: USA - California - counties of Alpine; Amador; Butte; Colusa; El Dorado; Glenn; Lake; Mendocino; Napa;
     * Nevada; Placer; Sacramento; Sierra; Solano; Sonoma; Sutter; Yolo; Yuba
     * State law defines use of US survey feet. See code 6418 for equivalent non-metric definition. Replaces
     * NAD83(NSRS2007) / California zone 2 (CRS code 3491).
     */
    public const EPSG_NAD83_2011_CALIFORNIA_ZONE_2 = 'urn:ogc:def:crs:EPSG::6417';

    /**
     * NAD83(2011) / California zone 2 (ftUS)
     * Extent: USA - California - counties of Alpine; Amador; Butte; Colusa; El Dorado; Glenn; Lake; Mendocino; Napa;
     * Nevada; Placer; Sacramento; Sierra; Solano; Sonoma; Sutter; Yolo; Yuba
     * State law defines use of US survey feet. Federal definition is metric - see code 6417. Replaces NAD83(NSRS2007)
     * / California zone 2 (ftUS) (CRS code 3492).
     */
    public const EPSG_NAD83_2011_CALIFORNIA_ZONE_2_FTUS = 'urn:ogc:def:crs:EPSG::6418';

    /**
     * NAD83(2011) / California zone 3
     * Extent: USA - California - counties Alameda; Calaveras; Contra Costa; Madera; Marin; Mariposa; Merced; Mono; San
     * Francisco; San Joaquin; San Mateo; Santa Clara; Santa Cruz; Stanislaus; Tuolumne
     * State law defines use of US survey feet. See code 6420 for equivalent non-metric definition. Replaces
     * NAD83(NSRS2007) / California zone 3 (CRS code 3493).
     */
    public const EPSG_NAD83_2011_CALIFORNIA_ZONE_3 = 'urn:ogc:def:crs:EPSG::6419';

    /**
     * NAD83(2011) / California zone 3 (ftUS)
     * Extent: USA - California - counties Alameda; Calaveras; Contra Costa; Madera; Marin; Mariposa; Merced; Mono; San
     * Francisco; San Joaquin; San Mateo; Santa Clara; Santa Cruz; Stanislaus; Tuolumne
     * State law defines use of US survey feet. Federal definition is metric - see code 6419. Replaces NAD83(NSRS2007)
     * / California zone 3 (ftUS) (CRS code 3494).
     */
    public const EPSG_NAD83_2011_CALIFORNIA_ZONE_3_FTUS = 'urn:ogc:def:crs:EPSG::6420';

    /**
     * NAD83(2011) / California zone 4
     * Extent: USA - California - counties Fresno; Inyo; Kings; Monterey; San Benito; Tulare
     * State law defines use of US survey feet. See code 6422 for equivalent non-metric definition. Replaces
     * NAD83(NSRS2007) / California zone 4 (CRS code 3495).
     */
    public const EPSG_NAD83_2011_CALIFORNIA_ZONE_4 = 'urn:ogc:def:crs:EPSG::6421';

    /**
     * NAD83(2011) / California zone 4 (ftUS)
     * Extent: USA - California - counties Fresno; Inyo; Kings; Monterey; San Benito; Tulare
     * State law defines use of US survey feet. Federal definition is metric - see code 6421. Replaces NAD83(NSRS2007)
     * / California zone 4 (ftUS) (CRS code 3496).
     */
    public const EPSG_NAD83_2011_CALIFORNIA_ZONE_4_FTUS = 'urn:ogc:def:crs:EPSG::6422';

    /**
     * NAD83(2011) / California zone 5
     * Extent: USA - California - counties Kern; Los Angeles; San Bernardino; San Luis Obispo; Santa Barbara; Ventura
     * State law defines use of US survey feet. See code 6424 for equivalent non-metric definition. Replaces
     * NAD83(NSRS2007) / California zone 5 (CRS code 3497).
     */
    public const EPSG_NAD83_2011_CALIFORNIA_ZONE_5 = 'urn:ogc:def:crs:EPSG::6423';

    /**
     * NAD83(2011) / California zone 5 (ftUS)
     * Extent: USA - California - counties Kern; Los Angeles; San Bernardino; San Luis Obispo; Santa Barbara; Ventura
     * State law defines use of US survey feet. Federal definition is metric - see code 6423. Replaces NAD83(NSRS2007)
     * / California zone 5 (ftUS) (CRS code 3498).
     */
    public const EPSG_NAD83_2011_CALIFORNIA_ZONE_5_FTUS = 'urn:ogc:def:crs:EPSG::6424';

    /**
     * NAD83(2011) / California zone 6
     * Extent: USA - California - counties Imperial; Orange; Riverside; San Diego
     * State law defines use of US survey feet. See code 6426 for equivalent non-metric definition. Replaces
     * NAD83(NSRS2007) / California zone 6 (CRS code 3499).
     */
    public const EPSG_NAD83_2011_CALIFORNIA_ZONE_6 = 'urn:ogc:def:crs:EPSG::6425';

    /**
     * NAD83(2011) / California zone 6 (ftUS)
     * Extent: USA - California - counties Imperial; Orange; Riverside; San Diego
     * State law defines use of US survey feet. Federal definition is metric - see code 6425. Replaces NAD83(NSRS2007)
     * / California zone 6 (ftUS) (CRS code 3500).
     */
    public const EPSG_NAD83_2011_CALIFORNIA_ZONE_6_FTUS = 'urn:ogc:def:crs:EPSG::6426';

    /**
     * NAD83(2011) / Colorado Central
     * Extent: USA - Colorado - counties Arapahoe; Chaffee; Cheyenne; Clear Creek; Delta; Denver; Douglas; Eagle; El
     * Paso; Elbert; Fremont; Garfield; Gunnison; Jefferson; Kit Carson; Lake; Lincoln; Mesa; Park; Pitkin; Summit;
     * Teller
     * State law defines use of US survey feet. See code 6428 for equivalent non-metric definition. Replaces
     * NAD83(NSRS2007) / Colorado Central (CRS code 3501).
     */
    public const EPSG_NAD83_2011_COLORADO_CENTRAL = 'urn:ogc:def:crs:EPSG::6427';

    /**
     * NAD83(2011) / Colorado Central (ftUS)
     * Extent: USA - Colorado - counties Arapahoe; Chaffee; Cheyenne; Clear Creek; Delta; Denver; Douglas; Eagle; El
     * Paso; Elbert; Fremont; Garfield; Gunnison; Jefferson; Kit Carson; Lake; Lincoln; Mesa; Park; Pitkin; Summit;
     * Teller
     * State law defines use of US survey feet. Federal definition is metric - see code 6427. Replaces NAD83(NSRS2007)
     * / Colorado Central (ftUS) (CRS code 3502).
     */
    public const EPSG_NAD83_2011_COLORADO_CENTRAL_FTUS = 'urn:ogc:def:crs:EPSG::6428';

    /**
     * NAD83(2011) / Colorado North
     * Extent: USA - Colorado - counties Adams; Boulder; Gilpin; Grand; Jackson; Larimer; Logan; Moffat; Morgan;
     * Phillips; Rio Blanco; Routt; Sedgwick; Washington; Weld; Yuma
     * State law defines use of US survey feet. See code 6430 for equivalent non-metric definition. Replaces
     * NAD83(NSRS2007) / Colorado North (CRS code 3503).
     */
    public const EPSG_NAD83_2011_COLORADO_NORTH = 'urn:ogc:def:crs:EPSG::6429';

    /**
     * NAD83(2011) / Colorado North (ftUS)
     * Extent: USA - Colorado - counties Adams; Boulder; Gilpin; Grand; Jackson; Larimer; Logan; Moffat; Morgan;
     * Phillips; Rio Blanco; Routt; Sedgwick; Washington; Weld; Yuma
     * State law defines use of US survey feet. Federal definition is metric - see code 6429. Replaces NAD83(NSRS2007)
     * / Colorado North (ftUS) (CRS code 3504).
     */
    public const EPSG_NAD83_2011_COLORADO_NORTH_FTUS = 'urn:ogc:def:crs:EPSG::6430';

    /**
     * NAD83(2011) / Colorado South
     * Extent: USA - Colorado - counties Alamosa; Archuleta; Baca; Bent; Conejos; Costilla; Crowley; Custer; Dolores;
     * Hinsdale; Huerfano; Kiowa; La Plata; Las Animas; Mineral; Montezuma; Montrose; Otero; Ouray; Prowers; Pueblo;
     * Rio Grande; Saguache; San Juan; San Miguel
     * State law defines use of US survey feet. See code 6432 for equivalent non-metric definition. Replaces
     * NAD83(NSRS2007) / Colorado South (CRS code 3505).
     */
    public const EPSG_NAD83_2011_COLORADO_SOUTH = 'urn:ogc:def:crs:EPSG::6431';

    /**
     * NAD83(2011) / Colorado South (ftUS)
     * Extent: USA - Colorado - counties Alamosa; Archuleta; Baca; Bent; Conejos; Costilla; Crowley; Custer; Dolores;
     * Hinsdale; Huerfano; Kiowa; La Plata; Las Animas; Mineral; Montezuma; Montrose; Otero; Ouray; Prowers; Pueblo;
     * Rio Grande; Saguache; San Juan; San Miguel
     * State law defines use of US survey feet. Federal definition is metric - see code 6431. Replaces NAD83(NSRS2007)
     * / Colorado South (ftUS) (CRS code 3506).
     */
    public const EPSG_NAD83_2011_COLORADO_SOUTH_FTUS = 'urn:ogc:def:crs:EPSG::6432';

    /**
     * NAD83(2011) / Connecticut
     * Extent: USA - Connecticut - counties of Fairfield; Hartford; Litchfield; Middlesex; New Haven; New London;
     * Tolland; Windham
     * State law defines use of US survey feet. See code 6434 for equivalent non-metric definition. Replaces
     * NAD83(NSRS2007) / Connecticut (CRS code 3507).
     */
    public const EPSG_NAD83_2011_CONNECTICUT = 'urn:ogc:def:crs:EPSG::6433';

    /**
     * NAD83(2011) / Connecticut (ftUS)
     * Extent: USA - Connecticut - counties of Fairfield; Hartford; Litchfield; Middlesex; New Haven; New London;
     * Tolland; Windham
     * State law defines use of US survey feet. Federal definition is metric - see code 6433. Replaces NAD83(NSRS2007)
     * / Connecticut (ftUS) (CRS code 3508).
     */
    public const EPSG_NAD83_2011_CONNECTICUT_FTUS = 'urn:ogc:def:crs:EPSG::6434';

    /**
     * NAD83(2011) / Conus Albers
     * Extent: USA - CONUS onshore - Alabama; Arizona; Arkansas; California; Colorado; Connecticut; Delaware; Florida;
     * Georgia; Idaho; Illinois; Indiana; Iowa; Kansas; Kentucky; Louisiana; Maine; Maryland; Massachusetts; Michigan;
     * Minnesota; Mississippi; Missouri; Montana; Nebraska; Nevada; New Hampshire; New Jersey; New Mexico; New York;
     * North Carolina; North Dakota; Ohio; Oklahoma; Oregon; Pennsylvania; Rhode Island; South Carolina; South Dakota;
     * Tennessee; Texas; Utah; Vermont; Virginia; Washington; West Virginia; Wisconsin; Wyoming
     * Replaces NAD83(NSRS2007) / Conus Albers (CRS code 5072).
     */
    public const EPSG_NAD83_2011_CONUS_ALBERS = 'urn:ogc:def:crs:EPSG::6350';

    /**
     * NAD83(2011) / Delaware
     * Extent: USA - Delaware - counties of Kent; New Castle; Sussex
     * State law defines use of US survey feet. See code 6436 for equivalent non-metric definition. Replaces
     * NAD83(NSRS2007) / Delaware (CRS code 3509).
     */
    public const EPSG_NAD83_2011_DELAWARE = 'urn:ogc:def:crs:EPSG::6435';

    /**
     * NAD83(2011) / Delaware (ftUS)
     * Extent: USA - Delaware - counties of Kent; New Castle; Sussex
     * State law defines use of US survey feet. Federal definition is metric - see code 6435. Replaces NAD83(NSRS2007)
     * / Delaware (ftUS) (CRS code 3510).
     */
    public const EPSG_NAD83_2011_DELAWARE_FTUS = 'urn:ogc:def:crs:EPSG::6436';

    /**
     * NAD83(2011) / EPSG Arctic zone 5-29
     * Extent: Arctic - between 74°30'N and 69°30'N, approximately 173°W to approximately 153°W. May be extended
     * eastwards within the latitude limits.
     */
    public const EPSG_NAD83_2011_EPSG_ARCTIC_ZONE_5_29 = 'urn:ogc:def:crs:EPSG::6351';

    /**
     * NAD83(2011) / EPSG Arctic zone 5-31
     * Extent: Arctic - between 74°30'N and 69°30'N, approximately 157°W to approximately 137°W. May be extended
     * westwards within the latitude limits.
     */
    public const EPSG_NAD83_2011_EPSG_ARCTIC_ZONE_5_31 = 'urn:ogc:def:crs:EPSG::6352';

    /**
     * NAD83(2011) / EPSG Arctic zone 6-14
     * Extent: Arctic - between 71°10'N and 66°10'N, approximately 174°W to approximately 156°W. May be extended
     * eastwards within the latitude limits.
     */
    public const EPSG_NAD83_2011_EPSG_ARCTIC_ZONE_6_14 = 'urn:ogc:def:crs:EPSG::6353';

    /**
     * NAD83(2011) / EPSG Arctic zone 6-16
     * Extent: Arctic - between 71°10'N and 66°10'N, approximately 156°W to approximately 138°W. May be extended
     * westwards within the latitude limits.
     */
    public const EPSG_NAD83_2011_EPSG_ARCTIC_ZONE_6_16 = 'urn:ogc:def:crs:EPSG::6354';

    /**
     * NAD83(2011) / Florida East
     * Extent: USA - Florida - counties of Brevard; Broward; Clay; Collier; Dade; Duval; Flagler; Glades; Hendry;
     * Highlands; Indian River; Lake; Martin; Monroe; Nassau; Okeechobee; Orange; Osceola; Palm Beach; Putnam;
     * Seminole; St Johns; St Lucie; Volusia
     * State law defines use of US survey feet. See code 6438 for equivalent non-metric definition. Replaces
     * NAD83(NSRS2007) / Florida East (CRS code 3511).
     */
    public const EPSG_NAD83_2011_FLORIDA_EAST = 'urn:ogc:def:crs:EPSG::6437';

    /**
     * NAD83(2011) / Florida East (ftUS)
     * Extent: USA - Florida - counties of Brevard; Broward; Clay; Collier; Dade; Duval; Flagler; Glades; Hendry;
     * Highlands; Indian River; Lake; Martin; Monroe; Nassau; Okeechobee; Orange; Osceola; Palm Beach; Putnam;
     * Seminole; St Johns; St Lucie; Volusia
     * State law defines use of US survey feet. Federal definition is metric - see code 6437. Replaces NAD83(NSRS2007)
     * / Florida East (ftUS) (CRS code 3512).
     */
    public const EPSG_NAD83_2011_FLORIDA_EAST_FTUS = 'urn:ogc:def:crs:EPSG::6438';

    /**
     * NAD83(2011) / Florida GDL Albers
     * Extent: USA - Florida
     * Replaces NAD83(NSRS2007) / Florida GDL Albers (CRS code 3513).
     */
    public const EPSG_NAD83_2011_FLORIDA_GDL_ALBERS = 'urn:ogc:def:crs:EPSG::6439';

    /**
     * NAD83(2011) / Florida North
     * Extent: USA - Florida - counties of Alachua; Baker; Bay; Bradford; Calhoun; Columbia; Dixie; Escambia; Franklin;
     * Gadsden; Gilchrist; Gulf; Hamilton; Holmes; Jackson; Jefferson; Lafayette; Leon; Liberty; Madison; Okaloosa;
     * Santa Rosa; Suwannee; Taylor; Union; Wakulla; Walton; Washington
     * State law defines use of US survey feet. See code 6441 for equivalent non-metric definition. Replaces
     * NAD83(NSRS2007) / Florida North (CRS code 3514).
     */
    public const EPSG_NAD83_2011_FLORIDA_NORTH = 'urn:ogc:def:crs:EPSG::6440';

    /**
     * NAD83(2011) / Florida North (ftUS)
     * Extent: USA - Florida - counties of Alachua; Baker; Bay; Bradford; Calhoun; Columbia; Dixie; Escambia; Franklin;
     * Gadsden; Gilchrist; Gulf; Hamilton; Holmes; Jackson; Jefferson; Lafayette; Leon; Liberty; Madison; Okaloosa;
     * Santa Rosa; Suwannee; Taylor; Union; Wakulla; Walton; Washington
     * State law defines use of US survey feet. Federal definition is metric - see code 6440. Replaces NAD83(NSRS2007)
     * / Florida North (ftUS) (CRS code 3515).
     */
    public const EPSG_NAD83_2011_FLORIDA_NORTH_FTUS = 'urn:ogc:def:crs:EPSG::6441';

    /**
     * NAD83(2011) / Florida West
     * Extent: USA - Florida - counties of Charlotte; Citrus; De Soto; Hardee; Hernando; Hillsborough; Lee; Levy;
     * Manatee; Marion; Pasco; Pinellas; Polk; Sarasota; Sumter
     * State law defines use of US survey feet. See code 6443 for equivalent non-metric definition. Replaces
     * NAD83(NSRS2007) / Florida West (CRS code 3516).
     */
    public const EPSG_NAD83_2011_FLORIDA_WEST = 'urn:ogc:def:crs:EPSG::6442';

    /**
     * NAD83(2011) / Florida West (ftUS)
     * Extent: USA - Florida - counties of Charlotte; Citrus; De Soto; Hardee; Hernando; Hillsborough; Lee; Levy;
     * Manatee; Marion; Pasco; Pinellas; Polk; Sarasota; Sumter
     * State law defines use of US survey feet. Federal definition is metric - see code 6442. Replaces NAD83(NSRS2007)
     * / Florida West (ftUS) (CRS code 3517).
     */
    public const EPSG_NAD83_2011_FLORIDA_WEST_FTUS = 'urn:ogc:def:crs:EPSG::6443';

    /**
     * NAD83(2011) / Georgia East
     * Extent: USA - Georgia - counties of Appling; Atkinson; Bacon; Baldwin; Brantley; Bryan; Bulloch; Burke; Camden;
     * Candler; Charlton; Chatham; Clinch; Coffee; Columbia; Dodge; Echols; Effingham; Elbert; Emanuel; Evans;
     * Franklin; Glascock; Glynn; Greene; Hancock; Hart; Jeff Davis; Jefferson; Jenkins; Johnson; Lanier; Laurens;
     * Liberty; Lincoln; Long; Madison; McDuffie; McIntosh; Montgomery; Oglethorpe; Pierce; Richmond; Screven;
     * Stephens; Taliaferro; Tattnall; Telfair; Toombs; Treutlen; Ware; Warren; Washington; Wayne; Wheeler; Wilkes;
     * Wilkinson
     * State law defines use of US survey feet. See code 6445 for equivalent non-metric definition. Replaces
     * NAD83(NSRS2007) / Georgia East (CRS code 3518).
     */
    public const EPSG_NAD83_2011_GEORGIA_EAST = 'urn:ogc:def:crs:EPSG::6444';

    /**
     * NAD83(2011) / Georgia East (ftUS)
     * Extent: USA - Georgia - counties of Appling; Atkinson; Bacon; Baldwin; Brantley; Bryan; Bulloch; Burke; Camden;
     * Candler; Charlton; Chatham; Clinch; Coffee; Columbia; Dodge; Echols; Effingham; Elbert; Emanuel; Evans;
     * Franklin; Glascock; Glynn; Greene; Hancock; Hart; Jeff Davis; Jefferson; Jenkins; Johnson; Lanier; Laurens;
     * Liberty; Lincoln; Long; Madison; McDuffie; McIntosh; Montgomery; Oglethorpe; Pierce; Richmond; Screven;
     * Stephens; Taliaferro; Tattnall; Telfair; Toombs; Treutlen; Ware; Warren; Washington; Wayne; Wheeler; Wilkes;
     * Wilkinson
     * State law defines use of US survey feet. Federal definition is metric - see code 6444. Replaces NAD83(NSRS2007)
     * / Georgia East (ftUS) (CRS code 3519).
     */
    public const EPSG_NAD83_2011_GEORGIA_EAST_FTUS = 'urn:ogc:def:crs:EPSG::6445';

    /**
     * NAD83(2011) / Georgia West
     * Extent: USA - Georgia - counties of Baker; Banks; Barrow; Bartow; Ben Hill; Berrien; Bibb; Bleckley; Brooks;
     * Butts; Calhoun; Carroll; Catoosa; Chattahoochee; Chattooga; Cherokee; Clarke; Clay; Clayton; Cobb; Colquitt;
     * Cook; Coweta; Crawford; Crisp; Dade; Dawson; De Kalb; Decatur; Dooly; Dougherty; Douglas; Early; Fannin;
     * Fayette; Floyd; Forsyth; Fulton; Gilmer; Gordon; Grady; Gwinnett; Habersham; Hall; Haralson; Harris; Heard;
     * Henry; Houston; Irwin; Jackson; Jasper; Jones; Lamar; Lee; Lowndes; Lumpkin; Macon; Marion; Meriwether; Miller;
     * Mitchell; Monroe; Morgan; Murray; Muscogee; Newton; Oconee; Paulding; Peach; Pickens; Pike; Polk; Pulaski;
     * Putnam; Quitman; Rabun; Randolph; Rockdale; Schley; Seminole; Spalding; Stewart; Sumter; Talbot; Taylor;
     * Terrell; Thomas; Tift; Towns; Troup; Turner; Twiggs; Union; Upson; Walker; Walton; Webster; White; Whitfield;
     * Wilcox; Worth
     * State law defines use of US survey feet. See code 6447 for equivalent non-metric definition. Replaces
     * NAD83(NSRS2007) / Georgia West (CRS code 3520).
     */
    public const EPSG_NAD83_2011_GEORGIA_WEST = 'urn:ogc:def:crs:EPSG::6446';

    /**
     * NAD83(2011) / Georgia West (ftUS)
     * Extent: USA - Georgia - counties of Baker; Banks; Barrow; Bartow; Ben Hill; Berrien; Bibb; Bleckley; Brooks;
     * Butts; Calhoun; Carroll; Catoosa; Chattahoochee; Chattooga; Cherokee; Clarke; Clay; Clayton; Cobb; Colquitt;
     * Cook; Coweta; Crawford; Crisp; Dade; Dawson; De Kalb; Decatur; Dooly; Dougherty; Douglas; Early; Fannin;
     * Fayette; Floyd; Forsyth; Fulton; Gilmer; Gordon; Grady; Gwinnett; Habersham; Hall; Haralson; Harris; Heard;
     * Henry; Houston; Irwin; Jackson; Jasper; Jones; Lamar; Lee; Lowndes; Lumpkin; Macon; Marion; Meriwether; Miller;
     * Mitchell; Monroe; Morgan; Murray; Muscogee; Newton; Oconee; Paulding; Peach; Pickens; Pike; Polk; Pulaski;
     * Putnam; Quitman; Rabun; Randolph; Rockdale; Schley; Seminole; Spalding; Stewart; Sumter; Talbot; Taylor;
     * Terrell; Thomas; Tift; Towns; Troup; Turner; Twiggs; Union; Upson; Walker; Walton; Webster; White; Whitfield;
     * Wilcox; Worth
     * State law defines use of US survey feet. Federal definition is metric - see code 6446. Replaces NAD83(NSRS2007)
     * / Georgia West (ftUS) (CRS code 3521).
     */
    public const EPSG_NAD83_2011_GEORGIA_WEST_FTUS = 'urn:ogc:def:crs:EPSG::6447';

    /**
     * NAD83(2011) / ICS83-Aurora (ftUS)
     * Extent: USA - Illinois - counties of Boone, Dekalb, Kane, Kendall and McHenry
     * Part of the Illinois Coordinate System of 1983 33-zone system. State law for SPCS83 defines use of US survey
     * feet. This CRS was designed in NAD 83 ftUS but is otherwise based on the NGS guidelines for the NATRF2022
     * project.
     */
    public const EPSG_NAD83_2011_ICS83_AURORA_FTUS = 'urn:ogc:def:crs:EPSG::23303';

    /**
     * NAD83(2011) / ICS83-Belleville (ftUS)
     * Extent: USA - Illinois - counties of Madison, Monroe and St Clair
     * Part of the Illinois Coordinate System of 1983 33-zone system. State law for SPCS83 defines use of US survey
     * feet. This CRS was designed in NAD 83 ftUS but is otherwise based on the NGS guidelines for the NATRF2022
     * project.
     */
    public const EPSG_NAD83_2011_ICS83_BELLEVILLE_FTUS = 'urn:ogc:def:crs:EPSG::23329';

    /**
     * NAD83(2011) / ICS83-Bloomington (ftUS)
     * Extent: USA - Illinois - McLean county
     * Part of the Illinois Coordinate System of 1983 33-zone system. State law for SPCS83 defines use of US survey
     * feet. This CRS was designed in NAD 83 ftUS but is otherwise based on the NGS guidelines for the NATRF2022
     * project.
     */
    public const EPSG_NAD83_2011_ICS83_BLOOMINGTON_FTUS = 'urn:ogc:def:crs:EPSG::23313';

    /**
     * NAD83(2011) / ICS83-Carbondale (ftUS)
     * Extent: USA - Illinois - counties of Franklin, Gallatin, Hamilton, Jackson, Perry,  Randolph, Saline, White and
     * Williamson
     * Part of the Illinois Coordinate System of 1983 33-zone system. State law for SPCS83 defines use of US survey
     * feet. This CRS was designed in NAD 83 ftUS but is otherwise based on the NGS guidelines for the NATRF2022
     * project.
     */
    public const EPSG_NAD83_2011_ICS83_CARBONDALE_FTUS = 'urn:ogc:def:crs:EPSG::23332';

    /**
     * NAD83(2011) / ICS83-Carlinville (ftUS)
     * Extent: USA - Illinois - counties of Greene and Macoupin
     * Part of the Illinois Coordinate System of 1983 33-zone system. State law for SPCS83 defines use of US survey
     * feet. This CRS was designed in NAD 83 ftUS but is otherwise based on the NGS guidelines for the NATRF2022
     * project.
     */
    public const EPSG_NAD83_2011_ICS83_CARLINVILLE_FTUS = 'urn:ogc:def:crs:EPSG::23325';

    /**
     * NAD83(2011) / ICS83-Champaign (ftUS)
     * Extent: USA - Illinois - counties of Champaign and Vermilion
     * Part of the Illinois Coordinate System of 1983 33-zone system. State law for SPCS83 defines use of US survey
     * feet. This CRS was designed in NAD 83 ftUS but is otherwise based on the NGS guidelines for the NATRF2022
     * project.
     */
    public const EPSG_NAD83_2011_ICS83_CHAMPAIGN_FTUS = 'urn:ogc:def:crs:EPSG::23320';

    /**
     * NAD83(2011) / ICS83-Charleston (ftUS)
     * Extent: USA - Illinois - counties of Coles, Douglas and Edgar
     * Part of the Illinois Coordinate System of 1983 33-zone system. State law for SPCS83 defines use of US survey
     * feet. This CRS was designed in NAD 83 ftUS but is otherwise based on the NGS guidelines for the NATRF2022
     * project.
     */
    public const EPSG_NAD83_2011_ICS83_CHARLESTON_FTUS = 'urn:ogc:def:crs:EPSG::23323';

    /**
     * NAD83(2011) / ICS83-Chicago (ftUS)
     * Extent: USA - Illinois - counties of Cook, DuPage and Lake
     * Part of the Illinois Coordinate System of 1983 33-zone system. State law for SPCS83 defines use of US survey
     * feet. This CRS was designed in NAD 83 ftUS but is otherwise based on the NGS guidelines for the NATRF2022
     * project.
     */
    public const EPSG_NAD83_2011_ICS83_CHICAGO_FTUS = 'urn:ogc:def:crs:EPSG::23304';

    /**
     * NAD83(2011) / ICS83-Decatur (ftUS)
     * Extent: USA - Illinois - counties of Dewitt, Macon, Moultrie, Piatt and Shelby
     * Part of the Illinois Coordinate System of 1983 33-zone system. State law for SPCS83 defines use of US survey
     * feet. This CRS was designed in NAD 83 ftUS but is otherwise based on the NGS guidelines for the NATRF2022
     * project.
     */
    public const EPSG_NAD83_2011_ICS83_DECATUR_FTUS = 'urn:ogc:def:crs:EPSG::23319';

    /**
     * NAD83(2011) / ICS83-Effingham (ftUS)
     * Extent: USA - Illinois - counties of Bond, Effingham and Fayette
     * Part of the Illinois Coordinate System of 1983 33-zone system. State law for SPCS83 defines use of US survey
     * feet. This CRS was designed in NAD 83 ftUS but is otherwise based on the NGS guidelines for the NATRF2022
     * project.
     */
    public const EPSG_NAD83_2011_ICS83_EFFINGHAM_FTUS = 'urn:ogc:def:crs:EPSG::23327';

    /**
     * NAD83(2011) / ICS83-Eureka (ftUS)
     * Extent: USA - Illinois - counties of Marshall and Woodford
     * Part of the Illinois Coordinate System of 1983 33-zone system. State law for SPCS83 defines use of US survey
     * feet. This CRS was designed in NAD 83 ftUS but is otherwise based on the NGS guidelines for the NATRF2022
     * project.
     */
    public const EPSG_NAD83_2011_ICS83_EUREKA_FTUS = 'urn:ogc:def:crs:EPSG::23312';

    /**
     * NAD83(2011) / ICS83-Freeport (ftUS)
     * Extent: USA - Illinois - counties of Carroll, Jo Daviess and Stephenson
     * Part of the Illinois Coordinate System of 1983 33-zone system. State law for SPCS83 defines use of US survey
     * feet. This CRS was designed in NAD 83 ftUS but is otherwise based on the NGS guidelines for the NATRF2022
     * project.
     */
    public const EPSG_NAD83_2011_ICS83_FREEPORT_FTUS = 'urn:ogc:def:crs:EPSG::23301';

    /**
     * NAD83(2011) / ICS83-Galesburg (ftUS)
     * Extent: USA - Illinois - counties of Fulton, Knox and Stark
     * Part of the Illinois Coordinate System of 1983 33-zone system. State law for SPCS83 defines use of US survey
     * feet. This CRS was designed in NAD 83 ftUS but is otherwise based on the NGS guidelines for the NATRF2022
     * project.
     */
    public const EPSG_NAD83_2011_ICS83_GALESBURG_FTUS = 'urn:ogc:def:crs:EPSG::23310';

    /**
     * NAD83(2011) / ICS83-Jacksonville (ftUS)
     * Extent: USA - Illinois - counties of Morgan, Pike and Scott
     * Part of the Illinois Coordinate System of 1983 33-zone system. State law for SPCS83 defines use of US survey
     * feet. This CRS was designed in NAD 83 ftUS but is otherwise based on the NGS guidelines for the NATRF2022
     * project.
     */
    public const EPSG_NAD83_2011_ICS83_JACKSONVILLE_FTUS = 'urn:ogc:def:crs:EPSG::23321';

    /**
     * NAD83(2011) / ICS83-Jerseyville (ftUS)
     * Extent: USA - Illinois - counties of Calhoun and Jersey
     * Part of the Illinois Coordinate System of 1983 33-zone system. State law for SPCS83 defines use of US survey
     * feet. This CRS was designed in NAD 83 ftUS but is otherwise based on the NGS guidelines for the NATRF2022
     * project.
     */
    public const EPSG_NAD83_2011_ICS83_JERSEYVILLE_FTUS = 'urn:ogc:def:crs:EPSG::23324';

    /**
     * NAD83(2011) / ICS83-Joliet (ftUS)
     * Extent: USA - Illinois - counties of Kankakee and Will
     * Part of the Illinois Coordinate System of 1983 33-zone system. State law for SPCS83 defines use of US survey
     * feet. This CRS was designed in NAD 83 ftUS but is otherwise based on the NGS guidelines for the NATRF2022
     * project.
     */
    public const EPSG_NAD83_2011_ICS83_JOLIET_FTUS = 'urn:ogc:def:crs:EPSG::23308';

    /**
     * NAD83(2011) / ICS83-Lincoln (ftUS)
     * Extent: USA - Illinois - counties of Cass, Logan, Mason and Menard
     * Part of the Illinois Coordinate System of 1983 33-zone system. State law for SPCS83 defines use of US survey
     * feet. This CRS was designed in NAD 83 ftUS but is otherwise based on the NGS guidelines for the NATRF2022
     * project.
     */
    public const EPSG_NAD83_2011_ICS83_LINCOLN_FTUS = 'urn:ogc:def:crs:EPSG::23318';

    /**
     * NAD83(2011) / ICS83-Macomb (ftUS)
     * Extent: USA - Illinois - counties of Brown, McDonough and Schuyler
     * Part of the Illinois Coordinate System of 1983 33-zone system. State law for SPCS83 defines use of US survey
     * feet. This CRS was designed in NAD 83 ftUS but is otherwise based on the NGS guidelines for the NATRF2022
     * project.
     */
    public const EPSG_NAD83_2011_ICS83_MACOMB_FTUS = 'urn:ogc:def:crs:EPSG::23317';

    /**
     * NAD83(2011) / ICS83-Metropolis (ftUS)
     * Extent: USA - Illinois - counties of Alexander, Hardin, Johnson, Massac, Pope, Pulaski and Union
     * Part of the Illinois Coordinate System of 1983 33-zone system. State law for SPCS83 defines use of US survey
     * feet. This CRS was designed in NAD 83 ftUS but is otherwise based on the NGS guidelines for the NATRF2022
     * project.
     */
    public const EPSG_NAD83_2011_ICS83_METROPOLIS_FTUS = 'urn:ogc:def:crs:EPSG::23333';

    /**
     * NAD83(2011) / ICS83-Moline (ftUS)
     * Extent: USA - Illinois - Rock Island county
     * Part of the Illinois Coordinate System of 1983 33-zone system. State law for SPCS83 defines use of US survey
     * feet. This CRS was designed in NAD 83 ftUS but is otherwise based on the NGS guidelines for the NATRF2022
     * project.
     */
    public const EPSG_NAD83_2011_ICS83_MOLINE_FTUS = 'urn:ogc:def:crs:EPSG::23305';

    /**
     * NAD83(2011) / ICS83-Monmouth (ftUS)
     * Extent: USA - Illinois - counties of Henderson, Mercer and Warren
     * Part of the Illinois Coordinate System of 1983 33-zone system. State law for SPCS83 defines use of US survey
     * feet. This CRS was designed in NAD 83 ftUS but is otherwise based on the NGS guidelines for the NATRF2022
     * project.
     */
    public const EPSG_NAD83_2011_ICS83_MONMOUTH_FTUS = 'urn:ogc:def:crs:EPSG::23309';

    /**
     * NAD83(2011) / ICS83-Mount Vernon (ftUS)
     * Extent: USA - Illinois - counties of Clinton, Jefferson, Marion and Washington
     * Part of the Illinois Coordinate System of 1983 33-zone system. State law for SPCS83 defines use of US survey
     * feet. This CRS was designed in NAD 83 ftUS but is otherwise based on the NGS guidelines for the NATRF2022
     * project.
     */
    public const EPSG_NAD83_2011_ICS83_MOUNT_VERNON_FTUS = 'urn:ogc:def:crs:EPSG::23330';

    /**
     * NAD83(2011) / ICS83-Olney (ftUS)
     * Extent: USA - Illinois - counties of Clay, Edwards, Lawrence, Richland, Wabash and Wayne
     * Part of the Illinois Coordinate System of 1983 33-zone system. State law for SPCS83 defines use of US survey
     * feet. This CRS was designed in NAD 83 ftUS but is otherwise based on the NGS guidelines for the NATRF2022
     * project.
     */
    public const EPSG_NAD83_2011_ICS83_OLNEY_FTUS = 'urn:ogc:def:crs:EPSG::23331';

    /**
     * NAD83(2011) / ICS83-Ottawa (ftUS)
     * Extent: USA - Illinois - counties of Bureau, Grundy, LaSalle and Putnam
     * Part of the Illinois Coordinate System of 1983 33-zone system. State law for SPCS83 defines use of US survey
     * feet. This CRS was designed in NAD 83 ftUS but is otherwise based on the NGS guidelines for the NATRF2022
     * project.
     */
    public const EPSG_NAD83_2011_ICS83_OTTAWA_FTUS = 'urn:ogc:def:crs:EPSG::23307';

    /**
     * NAD83(2011) / ICS83-Peoria (ftUS)
     * Extent: USA - Illinois - counties of Peoria and Tazewell
     * Part of the Illinois Coordinate System of 1983 33-zone system. State law for SPCS83 defines use of US survey
     * feet. This CRS was designed in NAD 83 ftUS but is otherwise based on the NGS guidelines for the NATRF2022
     * project.
     */
    public const EPSG_NAD83_2011_ICS83_PEORIA_FTUS = 'urn:ogc:def:crs:EPSG::23311';

    /**
     * NAD83(2011) / ICS83-Pontiac (ftUS)
     * Extent: USA - Illinois - Livingston county
     * Part of the Illinois Coordinate System of 1983 33-zone system. State law for SPCS83 defines use of US survey
     * feet. This CRS was designed in NAD 83 ftUS but is otherwise based on the NGS guidelines for the NATRF2022
     * project.
     */
    public const EPSG_NAD83_2011_ICS83_PONTIAC_FTUS = 'urn:ogc:def:crs:EPSG::23314';

    /**
     * NAD83(2011) / ICS83-Quincy (ftUS)
     * Extent: USA - Illinois - counties of Adams and Hancock
     * Part of the Illinois Coordinate System of 1983 33-zone system. State law for SPCS83 defines use of US survey
     * feet. This CRS was designed in NAD 83 ftUS but is otherwise based on the NGS guidelines for the NATRF2022
     * project.
     */
    public const EPSG_NAD83_2011_ICS83_QUINCY_FTUS = 'urn:ogc:def:crs:EPSG::23316';

    /**
     * NAD83(2011) / ICS83-Robinson (ftUS)
     * Extent: USA - Illinois - counties of Clark, Crawford, Cumberland and Jasper
     * Part of the Illinois Coordinate System of 1983 33-zone system. State law for SPCS83 defines use of US survey
     * feet. This CRS was designed in NAD 83 ftUS but is otherwise based on the NGS guidelines for the NATRF2022
     * project.
     */
    public const EPSG_NAD83_2011_ICS83_ROBINSON_FTUS = 'urn:ogc:def:crs:EPSG::23328';

    /**
     * NAD83(2011) / ICS83-Rockford (ftUS)
     * Extent: USA - Illinois - counties of Lee, Ogle and Winnebago
     * Part of the Illinois Coordinate System of 1983 33-zone system. State law for SPCS83 defines use of US survey
     * feet. This CRS was designed in NAD 83 ftUS but is otherwise based on the NGS guidelines for the NATRF2022
     * project.
     */
    public const EPSG_NAD83_2011_ICS83_ROCKFORD_FTUS = 'urn:ogc:def:crs:EPSG::23302';

    /**
     * NAD83(2011) / ICS83-Springfield (ftUS)
     * Extent: USA - Illinois - Sangamon county
     * Part of the Illinois Coordinate System of 1983 33-zone system. State law for SPCS83 defines use of US survey
     * feet. This CRS was designed in NAD 83 ftUS but is otherwise based on the NGS guidelines for the NATRF2022
     * project.
     */
    public const EPSG_NAD83_2011_ICS83_SPRINGFIELD_FTUS = 'urn:ogc:def:crs:EPSG::23322';

    /**
     * NAD83(2011) / ICS83-Sterling (ftUS)
     * Extent: USA - Illinois - counties of Henry and Whiteside
     * Part of the Illinois Coordinate System of 1983 33-zone system. State law for SPCS83 defines use of US survey
     * feet. This CRS was designed in NAD 83 ftUS but is otherwise based on the NGS guidelines for the NATRF2022
     * project.
     */
    public const EPSG_NAD83_2011_ICS83_STERLING_FTUS = 'urn:ogc:def:crs:EPSG::23306';

    /**
     * NAD83(2011) / ICS83-Taylorville (ftUS)
     * Extent: USA - Illinois - counties of Christian and Montgomery
     * Part of the Illinois Coordinate System of 1983 33-zone system. State law for SPCS83 defines use of US survey
     * feet. This CRS was designed in NAD 83 ftUS but is otherwise based on the NGS guidelines for the NATRF2022
     * project.
     */
    public const EPSG_NAD83_2011_ICS83_TAYLORVILLE_FTUS = 'urn:ogc:def:crs:EPSG::23326';

    /**
     * NAD83(2011) / ICS83-Watseka (ftUS)
     * Extent: USA - Illinois - counties of Ford and Iroquois
     * Part of the Illinois Coordinate System of 1983 33-zone system. State law for SPCS83 defines use of US survey
     * feet. This CRS was designed in NAD 83 ftUS but is otherwise based on the NGS guidelines for the NATRF2022
     * project.
     */
    public const EPSG_NAD83_2011_ICS83_WATSEKA_FTUS = 'urn:ogc:def:crs:EPSG::23315';

    /**
     * NAD83(2011) / IaRCS zone 1
     * Extent: USA - Iowa - counties of Clay; Dickinson; Emmet; Kossuth; Lyon; O'Brien; Osceola; Palo Alto; Sioux.
     */
    public const EPSG_NAD83_2011_IARCS_ZONE_1 = 'urn:ogc:def:crs:EPSG::7057';

    /**
     * NAD83(2011) / IaRCS zone 10
     * Extent: USA - Iowa - counties of Benton; Cedar; Iowa; Johnson; Jones; Linn.
     */
    public const EPSG_NAD83_2011_IARCS_ZONE_10 = 'urn:ogc:def:crs:EPSG::7066';

    /**
     * NAD83(2011) / IaRCS zone 11
     * Extent: USA - Iowa - counties of Clinton; Dubuque; Jackson; Scott.
     */
    public const EPSG_NAD83_2011_IARCS_ZONE_11 = 'urn:ogc:def:crs:EPSG::7067';

    /**
     * NAD83(2011) / IaRCS zone 12
     * Extent: USA - Iowa - counties of Adams; Appanoose; Clarke; Davis; Decatur; Lucas; Monroe; Montgomery; Page;
     * Ringgold; Taylor; Union; Wapello; Wayne.
     */
    public const EPSG_NAD83_2011_IARCS_ZONE_12 = 'urn:ogc:def:crs:EPSG::7068';

    /**
     * NAD83(2011) / IaRCS zone 13
     * Extent: USA - Iowa - counties of Jefferson; Keokuk; Van Buren; Washington.
     */
    public const EPSG_NAD83_2011_IARCS_ZONE_13 = 'urn:ogc:def:crs:EPSG::7069';

    /**
     * NAD83(2011) / IaRCS zone 14
     * Extent: USA - Iowa - counties of Des Moines; Henry; Lee; Louisa; Muscatine.
     */
    public const EPSG_NAD83_2011_IARCS_ZONE_14 = 'urn:ogc:def:crs:EPSG::7070';

    /**
     * NAD83(2011) / IaRCS zone 2
     * Extent: USA - Iowa - counties of Cerro Gordo; Chickasaw; Floyd; Hancock; Howard; Mitchell; Winnebago;
     * Winneshiek; Worth.
     */
    public const EPSG_NAD83_2011_IARCS_ZONE_2 = 'urn:ogc:def:crs:EPSG::7058';

    /**
     * NAD83(2011) / IaRCS zone 3
     * Extent: USA - Iowa - counties of Allamakee; Clayton; Delaware.
     */
    public const EPSG_NAD83_2011_IARCS_ZONE_3 = 'urn:ogc:def:crs:EPSG::7059';

    /**
     * NAD83(2011) / IaRCS zone 4
     * Extent: USA - Iowa - counties of Buena Vista; Calhoun; Cherokee; Franklin; Hamilton; Hardin; Humboldt; Ida;
     * Plymouth; Pocahontas; Sac; Webster; Woodbury; Wright.
     */
    public const EPSG_NAD83_2011_IARCS_ZONE_4 = 'urn:ogc:def:crs:EPSG::7060';

    /**
     * NAD83(2011) / IaRCS zone 5
     * Extent: USA - Iowa - counties of Black Hawk; Bremer; Buchanan; Butler; Fayette; Grundy.
     */
    public const EPSG_NAD83_2011_IARCS_ZONE_5 = 'urn:ogc:def:crs:EPSG::7061';

    /**
     * NAD83(2011) / IaRCS zone 6
     * Extent: USA - Iowa - counties of Crawford; Fremont; Harrison; Mills; Monona; Pottawattamie; Shelby.
     */
    public const EPSG_NAD83_2011_IARCS_ZONE_6 = 'urn:ogc:def:crs:EPSG::7062';

    /**
     * NAD83(2011) / IaRCS zone 7
     * Extent: USA - Iowa - counties of Adair; Audubon; Carroll; Cass; Greene; Guthrie.
     */
    public const EPSG_NAD83_2011_IARCS_ZONE_7 = 'urn:ogc:def:crs:EPSG::7063';

    /**
     * NAD83(2011) / IaRCS zone 8
     * Extent: USA - Iowa - counties of Boone; Dallas; Madison; Polk; Story; Warren.
     */
    public const EPSG_NAD83_2011_IARCS_ZONE_8 = 'urn:ogc:def:crs:EPSG::7064';

    /**
     * NAD83(2011) / IaRCS zone 9
     * Extent: USA - Iowa - counties of Jasper; Mahaska; Marion; Marshall; Poweshiek; Tama.
     */
    public const EPSG_NAD83_2011_IARCS_ZONE_9 = 'urn:ogc:def:crs:EPSG::7065';

    /**
     * NAD83(2011) / Idaho Central
     * Extent: USA - Idaho - counties of Blaine; Butte; Camas; Cassia; Custer; Gooding; Jerome; Lemhi; Lincoln;
     * Minidoka; Twin Falls
     * State law defines use of US survey feet. See code 6449 for equivalent non-metric definition. Replaces
     * NAD83(NSRS2007) / Idaho Central (CRS code 3522).
     */
    public const EPSG_NAD83_2011_IDAHO_CENTRAL = 'urn:ogc:def:crs:EPSG::6448';

    /**
     * NAD83(2011) / Idaho Central (ftUS)
     * Extent: USA - Idaho - counties of Blaine; Butte; Camas; Cassia; Custer; Gooding; Jerome; Lemhi; Lincoln;
     * Minidoka; Twin Falls
     * State law defines use of US survey feet. Federal definition is metric - see code 6448. Replaces NAD83(NSRS2007)
     * / Idaho Central (ftUS) (CRS code 3523).
     */
    public const EPSG_NAD83_2011_IDAHO_CENTRAL_FTUS = 'urn:ogc:def:crs:EPSG::6449';

    /**
     * NAD83(2011) / Idaho East
     * Extent: USA - Idaho - counties of Bannock; Bear Lake; Bingham; Bonneville; Caribou; Clark; Franklin; Fremont;
     * Jefferson; Madison; Oneida; Power; Teton
     * State law defines use of US survey feet. See code 6451 for equivalent non-metric definition. Replaces
     * NAD83(NSRS2007) / Idaho East (CRS code 3524).
     */
    public const EPSG_NAD83_2011_IDAHO_EAST = 'urn:ogc:def:crs:EPSG::6450';

    /**
     * NAD83(2011) / Idaho East (ftUS)
     * Extent: USA - Idaho - counties of Bannock; Bear Lake; Bingham; Bonneville; Caribou; Clark; Franklin; Fremont;
     * Jefferson; Madison; Oneida; Power; Teton
     * State law defines use of US survey feet. Federal definition is metric - see code 6450. Replaces NAD83(NSRS2007)
     * / Idaho East (ftUS) (CRS code 3525).
     */
    public const EPSG_NAD83_2011_IDAHO_EAST_FTUS = 'urn:ogc:def:crs:EPSG::6451';

    /**
     * NAD83(2011) / Idaho West
     * Extent: USA - Idaho - counties of Ada; Adams; Benewah; Boise; Bonner; Boundary; Canyon; Clearwater; Elmore; Gem;
     * Idaho; Kootenai; Latah; Lewis; Nez Perce; Owyhee; Payette; Shoshone; Valley; Washington
     * State law defines use of US survey feet. See code 6453 for equivalent non-metric definition. Replaces
     * NAD83(NSRS2007) / Idaho West (CRS code 3526).
     */
    public const EPSG_NAD83_2011_IDAHO_WEST = 'urn:ogc:def:crs:EPSG::6452';

    /**
     * NAD83(2011) / Idaho West (ftUS)
     * Extent: USA - Idaho - counties of Ada; Adams; Benewah; Boise; Bonner; Boundary; Canyon; Clearwater; Elmore; Gem;
     * Idaho; Kootenai; Latah; Lewis; Nez Perce; Owyhee; Payette; Shoshone; Valley; Washington
     * State law defines use of US survey feet. Federal definition is metric - see code 6452. Replaces NAD83(NSRS2007)
     * / Idaho West (ftUS) (CRS code 3527).
     */
    public const EPSG_NAD83_2011_IDAHO_WEST_FTUS = 'urn:ogc:def:crs:EPSG::6453';

    /**
     * NAD83(2011) / Illinois East
     * Extent: USA - Illinois - counties of Boone; Champaign; Clark; Clay; Coles; Cook; Crawford; Cumberland; De Kalb;
     * De Witt; Douglas; Du Page; Edgar; Edwards; Effingham; Fayette; Ford; Franklin; Gallatin; Grundy; Hamilton;
     * Hardin; Iroquois; Jasper; Jefferson; Johnson; Kane; Kankakee; Kendall; La Salle; Lake; Lawrence; Livingston;
     * Macon; Marion; Massac; McHenry; McLean; Moultrie; Piatt; Pope; Richland; Saline; Shelby; Vermilion; Wabash;
     * Wayne; White; Will; Williamson
     * State law defines use of US survey feet. See code 6455 for equivalent non-metric definition. Replaces
     * NAD83(NSRS2007) / Illinois East (CRS code 3528).
     */
    public const EPSG_NAD83_2011_ILLINOIS_EAST = 'urn:ogc:def:crs:EPSG::6454';

    /**
     * NAD83(2011) / Illinois East (ftUS)
     * Extent: USA - Illinois - counties of Boone; Champaign; Clark; Clay; Coles; Cook; Crawford; Cumberland; De Kalb;
     * De Witt; Douglas; Du Page; Edgar; Edwards; Effingham; Fayette; Ford; Franklin; Gallatin; Grundy; Hamilton;
     * Hardin; Iroquois; Jasper; Jefferson; Johnson; Kane; Kankakee; Kendall; La Salle; Lake; Lawrence; Livingston;
     * Macon; Marion; Massac; McHenry; McLean; Moultrie; Piatt; Pope; Richland; Saline; Shelby; Vermilion; Wabash;
     * Wayne; White; Will; Williamson
     * State law defines use of US survey feet. Federal definition is metric - see code 6454. Replaces NAD83(NSRS2007)
     * / Illinois East (ftUS) (CRS code 3529).
     */
    public const EPSG_NAD83_2011_ILLINOIS_EAST_FTUS = 'urn:ogc:def:crs:EPSG::6455';

    /**
     * NAD83(2011) / Illinois West
     * Extent: USA - Illinois - counties of Adams; Alexander; Bond; Brown; Bureau; Calhoun; Carroll; Cass; Christian;
     * Clinton; Fulton; Greene; Hancock; Henderson; Henry; Jackson; Jersey; Jo Daviess; Knox; Lee; Logan; Macoupin;
     * Madison; Marshall; Mason; McDonough; Menard; Mercer; Monroe; Montgomery; Morgan; Ogle; Peoria; Perry; Pike;
     * Pulaski; Putnam; Randolph; Rock Island; Sangamon; Schuyler; Scott; St Clair; Stark; Stephenson; Tazewell; Union;
     * Warren; Washington; Whiteside; Winnebago; Woodford
     * State law defines use of US survey feet. See code 6457 for equivalent non-metric definition. Replaces
     * NAD83(NSRS2007) / Illinois West (CRS code 3530).
     */
    public const EPSG_NAD83_2011_ILLINOIS_WEST = 'urn:ogc:def:crs:EPSG::6456';

    /**
     * NAD83(2011) / Illinois West (ftUS)
     * Extent: USA - Illinois - counties of Adams; Alexander; Bond; Brown; Bureau; Calhoun; Carroll; Cass; Christian;
     * Clinton; Fulton; Greene; Hancock; Henderson; Henry; Jackson; Jersey; Jo Daviess; Knox; Lee; Logan; Macoupin;
     * Madison; Marshall; Mason; McDonough; Menard; Mercer; Monroe; Montgomery; Morgan; Ogle; Peoria; Perry; Pike;
     * Pulaski; Putnam; Randolph; Rock Island; Sangamon; Schuyler; Scott; St Clair; Stark; Stephenson; Tazewell; Union;
     * Warren; Washington; Whiteside; Winnebago; Woodford
     * State law defines use of US survey feet. Federal definition is metric - see code 6456. Replaces NAD83(NSRS2007)
     * / Illinois West (ftUS) (CRS code 3531).
     */
    public const EPSG_NAD83_2011_ILLINOIS_WEST_FTUS = 'urn:ogc:def:crs:EPSG::6457';

    /**
     * NAD83(2011) / InGCS Adams (ftUS)
     * Extent: USA - Indiana - Adams county
     * Part of the Indiana Geospatial Coordinate System (InGCS). Defining parameters are metric - see CRS code 7257.
     */
    public const EPSG_NAD83_2011_INGCS_ADAMS_FTUS = 'urn:ogc:def:crs:EPSG::7258';

    /**
     * NAD83(2011) / InGCS Adams (m)
     * Extent: USA - Indiana - Adams county
     * Part of the Indiana Geospatial Coordinate System (InGCS). Working units are feet - see CRS code 7258.
     */
    public const EPSG_NAD83_2011_INGCS_ADAMS_M = 'urn:ogc:def:crs:EPSG::7257';

    /**
     * NAD83(2011) / InGCS Allen (ftUS)
     * Extent: USA - Indiana - Allen county
     * Part of the Indiana Geospatial Coordinate System (InGCS). Defining parameters are metric - see CRS code 7259.
     */
    public const EPSG_NAD83_2011_INGCS_ALLEN_FTUS = 'urn:ogc:def:crs:EPSG::7260';

    /**
     * NAD83(2011) / InGCS Allen (m)
     * Extent: USA - Indiana - Allen county
     * Part of the Indiana Geospatial Coordinate System (InGCS). Working units are feet - see CRS code 7260.
     */
    public const EPSG_NAD83_2011_INGCS_ALLEN_M = 'urn:ogc:def:crs:EPSG::7259';

    /**
     * NAD83(2011) / InGCS Bartholomew (ftUS)
     * Extent: USA - Indiana - Bartholomew county
     * Part of the Indiana Geospatial Coordinate System (InGCS). Defining parameters are metric - see CRS code 7261.
     */
    public const EPSG_NAD83_2011_INGCS_BARTHOLOMEW_FTUS = 'urn:ogc:def:crs:EPSG::7262';

    /**
     * NAD83(2011) / InGCS Bartholomew (m)
     * Extent: USA - Indiana - Bartholomew county
     * Part of the Indiana Geospatial Coordinate System (InGCS). Working units are feet - see CRS code 7262.
     */
    public const EPSG_NAD83_2011_INGCS_BARTHOLOMEW_M = 'urn:ogc:def:crs:EPSG::7261';

    /**
     * NAD83(2011) / InGCS Benton (ftUS)
     * Extent: USA - Indiana - Benton county
     * Part of the Indiana Geospatial Coordinate System (InGCS). Defining parameters are metric - see CRS code 7263.
     */
    public const EPSG_NAD83_2011_INGCS_BENTON_FTUS = 'urn:ogc:def:crs:EPSG::7264';

    /**
     * NAD83(2011) / InGCS Benton (m)
     * Extent: USA - Indiana - Benton county
     * Part of the Indiana Geospatial Coordinate System (InGCS). Working units are feet - see CRS code 7264.
     */
    public const EPSG_NAD83_2011_INGCS_BENTON_M = 'urn:ogc:def:crs:EPSG::7263';

    /**
     * NAD83(2011) / InGCS Blackford-Delaware (ftUS)
     * Extent: USA - Indiana - counties of Blackford and Delaware
     * Part of the Indiana Geospatial Coordinate System (InGCS). Defined as separate zones for each county these having
     * identical projection parameter values: see info source. Defining parameters are metric - see CRS code 7265.
     */
    public const EPSG_NAD83_2011_INGCS_BLACKFORD_DELAWARE_FTUS = 'urn:ogc:def:crs:EPSG::7266';

    /**
     * NAD83(2011) / InGCS Blackford-Delaware (m)
     * Extent: USA - Indiana - counties of Blackford and Delaware
     * Part of the Indiana Geospatial Coordinate System (InGCS). Defined as separate zones for each county these having
     * identical projection parameter values: see info source. Working units are feet - see CRS code 7266.
     */
    public const EPSG_NAD83_2011_INGCS_BLACKFORD_DELAWARE_M = 'urn:ogc:def:crs:EPSG::7265';

    /**
     * NAD83(2011) / InGCS Boone-Hendricks (ftUS)
     * Extent: USA - Indiana - counties of Boone and Hendricks
     * Part of the Indiana Geospatial Coordinate System (InGCS). Defined as separate zones for each county these having
     * identical projection parameter values: see info source. Defining parameters are metric - see CRS code 7267.
     */
    public const EPSG_NAD83_2011_INGCS_BOONE_HENDRICKS_FTUS = 'urn:ogc:def:crs:EPSG::7268';

    /**
     * NAD83(2011) / InGCS Boone-Hendricks (m)
     * Extent: USA - Indiana - counties of Boone and Hendricks
     * Part of the Indiana Geospatial Coordinate System (InGCS). Defined as separate zones for each county these having
     * identical projection parameter values: see info source. Working units are feet - see CRS code 7268.
     */
    public const EPSG_NAD83_2011_INGCS_BOONE_HENDRICKS_M = 'urn:ogc:def:crs:EPSG::7267';

    /**
     * NAD83(2011) / InGCS Brown (ftUS)
     * Extent: USA - Indiana - Brown county
     * Part of the Indiana Geospatial Coordinate System (InGCS). Defining parameters are metric - see CRS code 7269.
     */
    public const EPSG_NAD83_2011_INGCS_BROWN_FTUS = 'urn:ogc:def:crs:EPSG::7270';

    /**
     * NAD83(2011) / InGCS Brown (m)
     * Extent: USA - Indiana - Brown county
     * Part of the Indiana Geospatial Coordinate System (InGCS). Working units are feet - see CRS code 7270.
     */
    public const EPSG_NAD83_2011_INGCS_BROWN_M = 'urn:ogc:def:crs:EPSG::7269';

    /**
     * NAD83(2011) / InGCS Carroll (ftUS)
     * Extent: USA - Indiana - Carroll county
     * Part of the Indiana Geospatial Coordinate System (InGCS). Defining parameters are metric - see CRS code 7271.
     */
    public const EPSG_NAD83_2011_INGCS_CARROLL_FTUS = 'urn:ogc:def:crs:EPSG::7272';

    /**
     * NAD83(2011) / InGCS Carroll (m)
     * Extent: USA - Indiana - Carroll county
     * Part of the Indiana Geospatial Coordinate System (InGCS). Working units are feet - see CRS code 7272.
     */
    public const EPSG_NAD83_2011_INGCS_CARROLL_M = 'urn:ogc:def:crs:EPSG::7271';

    /**
     * NAD83(2011) / InGCS Cass (ftUS)
     * Extent: USA - Indiana - Cass county
     * Part of the Indiana Geospatial Coordinate System (InGCS). Defining parameters are metric - see CRS code 7273.
     */
    public const EPSG_NAD83_2011_INGCS_CASS_FTUS = 'urn:ogc:def:crs:EPSG::7274';

    /**
     * NAD83(2011) / InGCS Cass (m)
     * Extent: USA - Indiana - Cass county
     * Part of the Indiana Geospatial Coordinate System (InGCS). Working units are feet - see CRS code 7274.
     */
    public const EPSG_NAD83_2011_INGCS_CASS_M = 'urn:ogc:def:crs:EPSG::7273';

    /**
     * NAD83(2011) / InGCS Clark-Floyd-Scott (ftUS)
     * Extent: USA - Indiana - counties of Clark, Floyd and Scott
     * Part of the Indiana Geospatial Coordinate System (InGCS). Defined as separate zones for each county these having
     * identical projection parameter values: see info source. Defining parameters are metric - see CRS code 7275.
     */
    public const EPSG_NAD83_2011_INGCS_CLARK_FLOYD_SCOTT_FTUS = 'urn:ogc:def:crs:EPSG::7276';

    /**
     * NAD83(2011) / InGCS Clark-Floyd-Scott (m)
     * Extent: USA - Indiana - counties of Clark, Floyd and Scott
     * Part of the Indiana Geospatial Coordinate System (InGCS). Defined as separate zones for each county these having
     * identical projection parameter values: see info source. Working units are feet - see CRS code 7276.
     */
    public const EPSG_NAD83_2011_INGCS_CLARK_FLOYD_SCOTT_M = 'urn:ogc:def:crs:EPSG::7275';

    /**
     * NAD83(2011) / InGCS Clay (ftUS)
     * Extent: USA - Indiana - Clay county
     * Part of the Indiana Geospatial Coordinate System (InGCS). Defining parameters are metric - see CRS code 7277.
     */
    public const EPSG_NAD83_2011_INGCS_CLAY_FTUS = 'urn:ogc:def:crs:EPSG::7278';

    /**
     * NAD83(2011) / InGCS Clay (m)
     * Extent: USA - Indiana - Clay county
     * Part of the Indiana Geospatial Coordinate System (InGCS). Working units are feet - see CRS code 7278.
     */
    public const EPSG_NAD83_2011_INGCS_CLAY_M = 'urn:ogc:def:crs:EPSG::7277';

    /**
     * NAD83(2011) / InGCS Clinton (ftUS)
     * Extent: USA - Indiana - Clinton county
     * Part of the Indiana Geospatial Coordinate System (InGCS). Defining parameters are metric - see CRS code 7279.
     */
    public const EPSG_NAD83_2011_INGCS_CLINTON_FTUS = 'urn:ogc:def:crs:EPSG::7280';

    /**
     * NAD83(2011) / InGCS Clinton (m)
     * Extent: USA - Indiana - Clinton county
     * Part of the Indiana Geospatial Coordinate System (InGCS). Working units are feet - see CRS code 7280.
     */
    public const EPSG_NAD83_2011_INGCS_CLINTON_M = 'urn:ogc:def:crs:EPSG::7279';

    /**
     * NAD83(2011) / InGCS Crawford-Lawrence-Orange (ftUS)
     * Extent: USA - Indiana - counties of Crawford, Lawrence and Orange
     * Part of the Indiana Geospatial Coordinate System (InGCS). Defined as separate zones for each county these having
     * identical projection parameter values: see info source. Defining parameters are metric - see CRS code 7281.
     */
    public const EPSG_NAD83_2011_INGCS_CRAWFORD_LAWRENCE_ORANGE_FTUS = 'urn:ogc:def:crs:EPSG::7282';

    /**
     * NAD83(2011) / InGCS Crawford-Lawrence-Orange (m)
     * Extent: USA - Indiana - counties of Crawford, Lawrence and Orange
     * Part of the Indiana Geospatial Coordinate System (InGCS). Defined as separate zones for each county these having
     * identical projection parameter values: see info source. Working units are feet - see CRS code 7282.
     */
    public const EPSG_NAD83_2011_INGCS_CRAWFORD_LAWRENCE_ORANGE_M = 'urn:ogc:def:crs:EPSG::7281';

    /**
     * NAD83(2011) / InGCS Daviess-Greene (ftUS)
     * Extent: USA - Indiana - counties of Daviess and Greene
     * Part of the Indiana Geospatial Coordinate System (InGCS). Defined as separate zones for each county these having
     * identical projection parameter values: see info source. Defining parameters are metric - see CRS code 7283.
     */
    public const EPSG_NAD83_2011_INGCS_DAVIESS_GREENE_FTUS = 'urn:ogc:def:crs:EPSG::7284';

    /**
     * NAD83(2011) / InGCS Daviess-Greene (m)
     * Extent: USA - Indiana - counties of Daviess and Greene
     * Part of the Indiana Geospatial Coordinate System (InGCS). Defined as separate zones for each county these having
     * identical projection parameter values: see info source. Working units are feet - see CRS code 7284.
     */
    public const EPSG_NAD83_2011_INGCS_DAVIESS_GREENE_M = 'urn:ogc:def:crs:EPSG::7283';

    /**
     * NAD83(2011) / InGCS DeKalb (ftUS)
     * Extent: USA - Indiana - DeKalb county
     * Part of the Indiana Geospatial Coordinate System (InGCS). Defining parameters are metric - see CRS code 7289.
     */
    public const EPSG_NAD83_2011_INGCS_DEKALB_FTUS = 'urn:ogc:def:crs:EPSG::7290';

    /**
     * NAD83(2011) / InGCS DeKalb (m)
     * Extent: USA - Indiana - DeKalb county
     * Part of the Indiana Geospatial Coordinate System (InGCS). Working units are feet - see CRS code 7290.
     */
    public const EPSG_NAD83_2011_INGCS_DEKALB_M = 'urn:ogc:def:crs:EPSG::7289';

    /**
     * NAD83(2011) / InGCS Dearborn-Ohio-Switzerland (ftUS)
     * Extent: USA - Indiana - counties of Dearborn, Ohio and Switzerland
     * Part of the Indiana Geospatial Coordinate System (InGCS). Defined as separate zones for each county these having
     * identical projection parameter values: see info source. Defining parameters are metric - see CRS code 7285.
     */
    public const EPSG_NAD83_2011_INGCS_DEARBORN_OHIO_SWITZERLAND_FTUS = 'urn:ogc:def:crs:EPSG::7286';

    /**
     * NAD83(2011) / InGCS Dearborn-Ohio-Switzerland (m)
     * Extent: USA - Indiana - counties of Dearborn, Ohio and Switzerland
     * Part of the Indiana Geospatial Coordinate System (InGCS). Defined as separate zones for each county these having
     * identical projection parameter values: see info source. Working units are feet - see CRS code 7286.
     */
    public const EPSG_NAD83_2011_INGCS_DEARBORN_OHIO_SWITZERLAND_M = 'urn:ogc:def:crs:EPSG::7285';

    /**
     * NAD83(2011) / InGCS Decatur-Rush (ftUS)
     * Extent: USA - Indiana - counties of Decatur and Rush
     * Part of the Indiana Geospatial Coordinate System (InGCS). Defined as separate zones for each county these having
     * identical projection parameter values: see info source. Defining parameters are metric - see CRS code 7287.
     */
    public const EPSG_NAD83_2011_INGCS_DECATUR_RUSH_FTUS = 'urn:ogc:def:crs:EPSG::7288';

    /**
     * NAD83(2011) / InGCS Decatur-Rush (m)
     * Extent: USA - Indiana - counties of Decatur and Rush
     * Part of the Indiana Geospatial Coordinate System (InGCS). Defined as separate zones for each county these having
     * identical projection parameter values: see info source. Working units are feet - see CRS code 7288.
     */
    public const EPSG_NAD83_2011_INGCS_DECATUR_RUSH_M = 'urn:ogc:def:crs:EPSG::7287';

    /**
     * NAD83(2011) / InGCS Dubois-Martin (ftUS)
     * Extent: USA - Indiana - counties of Dubois and Martin
     * Part of the Indiana Geospatial Coordinate System (InGCS). Defined as separate zones for each county these having
     * identical projection parameter values: see info source. Defining parameters are metric - see CRS code 7291.
     */
    public const EPSG_NAD83_2011_INGCS_DUBOIS_MARTIN_FTUS = 'urn:ogc:def:crs:EPSG::7292';

    /**
     * NAD83(2011) / InGCS Dubois-Martin (m)
     * Extent: USA - Indiana - counties of Dubois and Martin
     * Part of the Indiana Geospatial Coordinate System (InGCS). Defined as separate zones for each county these having
     * identical projection parameter values: see info source. Working units are feet - see CRS code 7292.
     */
    public const EPSG_NAD83_2011_INGCS_DUBOIS_MARTIN_M = 'urn:ogc:def:crs:EPSG::7291';

    /**
     * NAD83(2011) / InGCS Elkhart-Kosciusko-Wabash (ftUS)
     * Extent: USA - Indiana - counties of Elkhart, Kosciusko and Wabash
     * Part of the Indiana Geospatial Coordinate System (InGCS). Defined as separate zones for each county these having
     * identical projection parameter values: see info source. Defining parameters are metric - see CRS code 7293.
     */
    public const EPSG_NAD83_2011_INGCS_ELKHART_KOSCIUSKO_WABASH_FTUS = 'urn:ogc:def:crs:EPSG::7294';

    /**
     * NAD83(2011) / InGCS Elkhart-Kosciusko-Wabash (m)
     * Extent: USA - Indiana - counties of Elkhart, Kosciusko and Wabash
     * Part of the Indiana Geospatial Coordinate System (InGCS). Defined as separate zones for each county these having
     * identical projection parameter values: see info source. Working units are feet - see CRS code 7294.
     */
    public const EPSG_NAD83_2011_INGCS_ELKHART_KOSCIUSKO_WABASH_M = 'urn:ogc:def:crs:EPSG::7293';

    /**
     * NAD83(2011) / InGCS Fayette-Franklin-Union (ftUS)
     * Extent: USA - Indiana - counties of Fayette, Franklin and Union
     * Part of the Indiana Geospatial Coordinate System (InGCS). Defined as separate zones for each county these having
     * identical projection parameter values: see info source. Defining parameters are metric - see CRS code 7295.
     */
    public const EPSG_NAD83_2011_INGCS_FAYETTE_FRANKLIN_UNION_FTUS = 'urn:ogc:def:crs:EPSG::7296';

    /**
     * NAD83(2011) / InGCS Fayette-Franklin-Union (m)
     * Extent: USA - Indiana - counties of Fayette, Franklin and Union
     * Part of the Indiana Geospatial Coordinate System (InGCS). Defined as separate zones for each county these having
     * identical projection parameter values: see info source. Working units are feet - see CRS code 7296.
     */
    public const EPSG_NAD83_2011_INGCS_FAYETTE_FRANKLIN_UNION_M = 'urn:ogc:def:crs:EPSG::7295';

    /**
     * NAD83(2011) / InGCS Fountain-Warren (ftUS)
     * Extent: USA - Indiana - counties of Fountain and Warren
     * Part of the Indiana Geospatial Coordinate System (InGCS). Defined as separate zones for each county these having
     * identical projection parameter values: see info source. Defining parameters are metric - see CRS code 7297.
     */
    public const EPSG_NAD83_2011_INGCS_FOUNTAIN_WARREN_FTUS = 'urn:ogc:def:crs:EPSG::7298';

    /**
     * NAD83(2011) / InGCS Fountain-Warren (m)
     * Extent: USA - Indiana - counties of Fountain and Warren
     * Part of the Indiana Geospatial Coordinate System (InGCS). Defined as separate zones for each county these having
     * identical projection parameter values: see info source. Working units are feet - see CRS code 7298.
     */
    public const EPSG_NAD83_2011_INGCS_FOUNTAIN_WARREN_M = 'urn:ogc:def:crs:EPSG::7297';

    /**
     * NAD83(2011) / InGCS Fulton-Marshall-St. Joseph (ftUS)
     * Extent: USA - Indiana - counties of Fulton, Marshall and St Joseph
     * Part of the Indiana Geospatial Coordinate System (InGCS). Defined as separate zones for each county these having
     * identical projection parameter values: see info source. Defining parameters are metric - see CRS code 7299.
     */
    public const EPSG_NAD83_2011_INGCS_FULTON_MARSHALL_ST_JOSEPH_FTUS = 'urn:ogc:def:crs:EPSG::7300';

    /**
     * NAD83(2011) / InGCS Fulton-Marshall-St. Joseph (m)
     * Extent: USA - Indiana - counties of Fulton, Marshall and St Joseph
     * Part of the Indiana Geospatial Coordinate System (InGCS). Defined as separate zones for each county these having
     * identical projection parameter values: see info source. Working units are feet - see CRS code 7300.
     */
    public const EPSG_NAD83_2011_INGCS_FULTON_MARSHALL_ST_JOSEPH_M = 'urn:ogc:def:crs:EPSG::7299';

    /**
     * NAD83(2011) / InGCS Gibson (ftUS)
     * Extent: USA - Indiana - Gibson county
     * Part of the Indiana Geospatial Coordinate System (InGCS). Defining parameters are metric - see CRS code 7301.
     */
    public const EPSG_NAD83_2011_INGCS_GIBSON_FTUS = 'urn:ogc:def:crs:EPSG::7302';

    /**
     * NAD83(2011) / InGCS Gibson (m)
     * Extent: USA - Indiana - Gibson county
     * Part of the Indiana Geospatial Coordinate System (InGCS). Working units are feet - see CRS code 7302.
     */
    public const EPSG_NAD83_2011_INGCS_GIBSON_M = 'urn:ogc:def:crs:EPSG::7301';

    /**
     * NAD83(2011) / InGCS Grant (ftUS)
     * Extent: USA - Indiana - Grant county
     * Part of the Indiana Geospatial Coordinate System (InGCS). Defining parameters are metric - see CRS code 7303.
     */
    public const EPSG_NAD83_2011_INGCS_GRANT_FTUS = 'urn:ogc:def:crs:EPSG::7304';

    /**
     * NAD83(2011) / InGCS Grant (m)
     * Extent: USA - Indiana - Grant county
     * Part of the Indiana Geospatial Coordinate System (InGCS). Working units are feet - see CRS code 7304.
     */
    public const EPSG_NAD83_2011_INGCS_GRANT_M = 'urn:ogc:def:crs:EPSG::7303';

    /**
     * NAD83(2011) / InGCS Hamilton-Tipton (ftUS)
     * Extent: USA - Indiana - counties of Hamilton and Tipton
     * Part of the Indiana Geospatial Coordinate System (InGCS). Defined as separate zones for each county these having
     * identical projection parameter values: see info source. Defining parameters are metric - see CRS code 7305.
     */
    public const EPSG_NAD83_2011_INGCS_HAMILTON_TIPTON_FTUS = 'urn:ogc:def:crs:EPSG::7306';

    /**
     * NAD83(2011) / InGCS Hamilton-Tipton (m)
     * Extent: USA - Indiana - counties of Hamilton and Tipton
     * Part of the Indiana Geospatial Coordinate System (InGCS). Defined as separate zones for each county these having
     * identical projection parameter values: see info source. Working units are feet - see CRS code 7306.
     */
    public const EPSG_NAD83_2011_INGCS_HAMILTON_TIPTON_M = 'urn:ogc:def:crs:EPSG::7305';

    /**
     * NAD83(2011) / InGCS Hancock-Madison (ftUS)
     * Extent: USA - Indiana - counties of Hancock and Madison
     * Part of the Indiana Geospatial Coordinate System (InGCS). Defined as separate zones for each county these having
     * identical projection parameter values: see info source. Defining parameters are metric - see CRS code 7307.
     */
    public const EPSG_NAD83_2011_INGCS_HANCOCK_MADISON_FTUS = 'urn:ogc:def:crs:EPSG::7308';

    /**
     * NAD83(2011) / InGCS Hancock-Madison (m)
     * Extent: USA - Indiana - counties of Hancock and Madison
     * Part of the Indiana Geospatial Coordinate System (InGCS). Defined as separate zones for each county these having
     * identical projection parameter values: see info source. Working units are feet - see CRS code 7308.
     */
    public const EPSG_NAD83_2011_INGCS_HANCOCK_MADISON_M = 'urn:ogc:def:crs:EPSG::7307';

    /**
     * NAD83(2011) / InGCS Harrison-Washington (ftUS)
     * Extent: USA - Indiana - counties of Harrison and Washington
     * Part of the Indiana Geospatial Coordinate System (InGCS). Defined as separate zones for each county these having
     * identical projection parameter values: see info source. Defining parameters are metric - see CRS code 7309.
     */
    public const EPSG_NAD83_2011_INGCS_HARRISON_WASHINGTON_FTUS = 'urn:ogc:def:crs:EPSG::7310';

    /**
     * NAD83(2011) / InGCS Harrison-Washington (m)
     * Extent: USA - Indiana - counties of Harrison and Washington
     * Part of the Indiana Geospatial Coordinate System (InGCS). Defined as separate zones for each county these having
     * identical projection parameter values: see info source. Working units are feet - see CRS code 7310.
     */
    public const EPSG_NAD83_2011_INGCS_HARRISON_WASHINGTON_M = 'urn:ogc:def:crs:EPSG::7309';

    /**
     * NAD83(2011) / InGCS Henry (ftUS)
     * Extent: USA - Indiana - Henry county
     * Part of the Indiana Geospatial Coordinate System (InGCS). Defining parameters are metric - see CRS code 7311.
     */
    public const EPSG_NAD83_2011_INGCS_HENRY_FTUS = 'urn:ogc:def:crs:EPSG::7312';

    /**
     * NAD83(2011) / InGCS Henry (m)
     * Extent: USA - Indiana - Henry county
     * Part of the Indiana Geospatial Coordinate System (InGCS). Working units are feet - see CRS code 7312.
     */
    public const EPSG_NAD83_2011_INGCS_HENRY_M = 'urn:ogc:def:crs:EPSG::7311';

    /**
     * NAD83(2011) / InGCS Howard-Miami (ftUS)
     * Extent: USA - Indiana - counties of Howard and Miami
     * Part of the Indiana Geospatial Coordinate System (InGCS). Defined as separate zones for each county these having
     * identical projection parameter values: see info source. Defining parameters are metric - see CRS code 7313.
     */
    public const EPSG_NAD83_2011_INGCS_HOWARD_MIAMI_FTUS = 'urn:ogc:def:crs:EPSG::7314';

    /**
     * NAD83(2011) / InGCS Howard-Miami (m)
     * Extent: USA - Indiana - counties of Howard and Miami
     * Part of the Indiana Geospatial Coordinate System (InGCS). Defined as separate zones for each county these having
     * identical projection parameter values: see info source. Working units are feet - see CRS code 7314.
     */
    public const EPSG_NAD83_2011_INGCS_HOWARD_MIAMI_M = 'urn:ogc:def:crs:EPSG::7313';

    /**
     * NAD83(2011) / InGCS Huntington-Whitley (ftUS)
     * Extent: USA - Indiana - counties of Huntington and Whitley
     * Part of the Indiana Geospatial Coordinate System (InGCS). Defined as separate zones for each county these having
     * identical projection parameter values: see info source. Defining parameters are metric - see CRS code 7315.
     */
    public const EPSG_NAD83_2011_INGCS_HUNTINGTON_WHITLEY_FTUS = 'urn:ogc:def:crs:EPSG::7316';

    /**
     * NAD83(2011) / InGCS Huntington-Whitley (m)
     * Extent: USA - Indiana - counties of Huntington and Whitley
     * Part of the Indiana Geospatial Coordinate System (InGCS). Defined as separate zones for each county these having
     * identical projection parameter values: see info source. Working units are feet - see CRS code 7316.
     */
    public const EPSG_NAD83_2011_INGCS_HUNTINGTON_WHITLEY_M = 'urn:ogc:def:crs:EPSG::7315';

    /**
     * NAD83(2011) / InGCS Jackson (ftUS)
     * Extent: USA - Indiana - Jackson county
     * Part of the Indiana Geospatial Coordinate System (InGCS). Defining parameters are metric - see CRS code 7317.
     */
    public const EPSG_NAD83_2011_INGCS_JACKSON_FTUS = 'urn:ogc:def:crs:EPSG::7318';

    /**
     * NAD83(2011) / InGCS Jackson (m)
     * Extent: USA - Indiana - Jackson county
     * Part of the Indiana Geospatial Coordinate System (InGCS). Working units are feet - see CRS code 7318.
     */
    public const EPSG_NAD83_2011_INGCS_JACKSON_M = 'urn:ogc:def:crs:EPSG::7317';

    /**
     * NAD83(2011) / InGCS Jasper-Porter (ftUS)
     * Extent: USA - Indiana - counties of Jasper and Porter
     * Part of the Indiana Geospatial Coordinate System (InGCS). Defined as separate zones for each county these having
     * identical projection parameter values: see info source. Defining parameters are metric - see CRS code 7319.
     */
    public const EPSG_NAD83_2011_INGCS_JASPER_PORTER_FTUS = 'urn:ogc:def:crs:EPSG::7320';

    /**
     * NAD83(2011) / InGCS Jasper-Porter (m)
     * Extent: USA - Indiana - counties of Jasper and Porter
     * Part of the Indiana Geospatial Coordinate System (InGCS). Defined as separate zones for each county these having
     * identical projection parameter values: see info source. Working units are feet - see CRS code 7320.
     */
    public const EPSG_NAD83_2011_INGCS_JASPER_PORTER_M = 'urn:ogc:def:crs:EPSG::7319';

    /**
     * NAD83(2011) / InGCS Jay (ftUS)
     * Extent: USA - Indiana - Jay county
     * Part of the Indiana Geospatial Coordinate System (InGCS). Defining parameters are metric - see CRS code 7321.
     */
    public const EPSG_NAD83_2011_INGCS_JAY_FTUS = 'urn:ogc:def:crs:EPSG::7322';

    /**
     * NAD83(2011) / InGCS Jay (m)
     * Extent: USA - Indiana - Jay county
     * Part of the Indiana Geospatial Coordinate System (InGCS). Working units are feet - see CRS code 7322.
     */
    public const EPSG_NAD83_2011_INGCS_JAY_M = 'urn:ogc:def:crs:EPSG::7321';

    /**
     * NAD83(2011) / InGCS Jefferson (ftUS)
     * Extent: USA - Indiana - Jefferson county
     * Part of the Indiana Geospatial Coordinate System (InGCS). Defining parameters are metric - see CRS code 7323.
     */
    public const EPSG_NAD83_2011_INGCS_JEFFERSON_FTUS = 'urn:ogc:def:crs:EPSG::7324';

    /**
     * NAD83(2011) / InGCS Jefferson (m)
     * Extent: USA - Indiana - Jefferson county
     * Part of the Indiana Geospatial Coordinate System (InGCS). Working units are feet - see CRS code 7324.
     */
    public const EPSG_NAD83_2011_INGCS_JEFFERSON_M = 'urn:ogc:def:crs:EPSG::7323';

    /**
     * NAD83(2011) / InGCS Jennings (ftUS)
     * Extent: USA - Indiana - Jennings county
     * Part of the Indiana Geospatial Coordinate System (InGCS). Defining parameters are metric - see CRS code 7325.
     */
    public const EPSG_NAD83_2011_INGCS_JENNINGS_FTUS = 'urn:ogc:def:crs:EPSG::7326';

    /**
     * NAD83(2011) / InGCS Jennings (m)
     * Extent: USA - Indiana - Jennings county
     * Part of the Indiana Geospatial Coordinate System (InGCS). Working units are feet - see CRS code 7326.
     */
    public const EPSG_NAD83_2011_INGCS_JENNINGS_M = 'urn:ogc:def:crs:EPSG::7325';

    /**
     * NAD83(2011) / InGCS Johnson-Marion (ftUS)
     * Extent: USA - Indiana - counties of Johnson and Marion
     * Part of the Indiana Geospatial Coordinate System (InGCS). Defined as separate zones for each county these having
     * identical projection parameter values: see info source. Defining parameters are metric - see CRS code 7327.
     */
    public const EPSG_NAD83_2011_INGCS_JOHNSON_MARION_FTUS = 'urn:ogc:def:crs:EPSG::7328';

    /**
     * NAD83(2011) / InGCS Johnson-Marion (m)
     * Extent: USA - Indiana - counties of Johnson and Marion
     * Part of the Indiana Geospatial Coordinate System (InGCS). Defined as separate zones for each county these having
     * identical projection parameter values: see info source. Working units are feet - see CRS code 7328.
     */
    public const EPSG_NAD83_2011_INGCS_JOHNSON_MARION_M = 'urn:ogc:def:crs:EPSG::7327';

    /**
     * NAD83(2011) / InGCS Knox (ftUS)
     * Extent: USA - Indiana - Knox county
     * Part of the Indiana Geospatial Coordinate System (InGCS). Defining parameters are metric - see CRS code 7329.
     */
    public const EPSG_NAD83_2011_INGCS_KNOX_FTUS = 'urn:ogc:def:crs:EPSG::7330';

    /**
     * NAD83(2011) / InGCS Knox (m)
     * Extent: USA - Indiana - Knox county
     * Part of the Indiana Geospatial Coordinate System (InGCS). Working units are feet - see CRS code 7330.
     */
    public const EPSG_NAD83_2011_INGCS_KNOX_M = 'urn:ogc:def:crs:EPSG::7329';

    /**
     * NAD83(2011) / InGCS LaGrange-Noble (ftUS)
     * Extent: USA - Indiana - counties of LaGrange and Noble
     * Part of the Indiana Geospatial Coordinate System (InGCS). Defined as separate zones for each county these having
     * identical projection parameter values: see info source. Defining parameters are metric - see CRS code 7331.
     */
    public const EPSG_NAD83_2011_INGCS_LAGRANGE_NOBLE_FTUS = 'urn:ogc:def:crs:EPSG::7332';

    /**
     * NAD83(2011) / InGCS LaGrange-Noble (m)
     * Extent: USA - Indiana - counties of LaGrange and Noble
     * Part of the Indiana Geospatial Coordinate System (InGCS). Defined as separate zones for each county these having
     * identical projection parameter values: see info source. Working units are feet - see CRS code 7332.
     */
    public const EPSG_NAD83_2011_INGCS_LAGRANGE_NOBLE_M = 'urn:ogc:def:crs:EPSG::7331';

    /**
     * NAD83(2011) / InGCS LaPorte-Pulaski-Starke (ftUS)
     * Extent: USA - Indiana - counties of LaPorte, Pulaski and Starke
     * Part of the Indiana Geospatial Coordinate System (InGCS). Defined as separate zones for each county these having
     * identical projection parameter values: see info source. Defining parameters are metric - see CRS code 7335.
     */
    public const EPSG_NAD83_2011_INGCS_LAPORTE_PULASKI_STARKE_FTUS = 'urn:ogc:def:crs:EPSG::7336';

    /**
     * NAD83(2011) / InGCS LaPorte-Pulaski-Starke (m)
     * Extent: USA - Indiana - counties of LaPorte, Pulaski and Starke
     * Part of the Indiana Geospatial Coordinate System (InGCS). Defined as separate zones for each county these having
     * identical projection parameter values: see info source. Working units are feet - see CRS code 7336.
     */
    public const EPSG_NAD83_2011_INGCS_LAPORTE_PULASKI_STARKE_M = 'urn:ogc:def:crs:EPSG::7335';

    /**
     * NAD83(2011) / InGCS Lake-Newton (ftUS)
     * Extent: USA - Indiana - counties of Lake and Newton
     * Part of the Indiana Geospatial Coordinate System (InGCS). Defined as separate zones for each county these having
     * identical projection parameter values: see info source. Defining parameters are metric - see CRS code 7333.
     */
    public const EPSG_NAD83_2011_INGCS_LAKE_NEWTON_FTUS = 'urn:ogc:def:crs:EPSG::7334';

    /**
     * NAD83(2011) / InGCS Lake-Newton (m)
     * Extent: USA - Indiana - counties of Lake and Newton
     * Part of the Indiana Geospatial Coordinate System (InGCS). Defined as separate zones for each county these having
     * identical projection parameter values: see info source. Working units are feet - see CRS code 7334.
     */
    public const EPSG_NAD83_2011_INGCS_LAKE_NEWTON_M = 'urn:ogc:def:crs:EPSG::7333';

    /**
     * NAD83(2011) / InGCS Monroe-Morgan (ftUS)
     * Extent: USA - Indiana - counties of Monroe and Morgan
     * Part of the Indiana Geospatial Coordinate System (InGCS). Defined as separate zones for each county these having
     * identical projection parameter values: see info source. Defining parameters are metric - see CRS code 7337.
     */
    public const EPSG_NAD83_2011_INGCS_MONROE_MORGAN_FTUS = 'urn:ogc:def:crs:EPSG::7338';

    /**
     * NAD83(2011) / InGCS Monroe-Morgan (m)
     * Extent: USA - Indiana - counties of Monroe and Morgan
     * Part of the Indiana Geospatial Coordinate System (InGCS). Defined as separate zones for each county these having
     * identical projection parameter values: see info source. Working units are feet - see CRS code 7338.
     */
    public const EPSG_NAD83_2011_INGCS_MONROE_MORGAN_M = 'urn:ogc:def:crs:EPSG::7337';

    /**
     * NAD83(2011) / InGCS Montgomery-Putnam (ftUS)
     * Extent: USA - Indiana - counties of Montgomery and Putnam
     * Part of the Indiana Geospatial Coordinate System (InGCS). Defined as separate zones for each county these having
     * identical projection parameter values: see info source. Defining parameters are metric - see CRS code 7339.
     */
    public const EPSG_NAD83_2011_INGCS_MONTGOMERY_PUTNAM_FTUS = 'urn:ogc:def:crs:EPSG::7340';

    /**
     * NAD83(2011) / InGCS Montgomery-Putnam (m)
     * Extent: USA - Indiana - counties of Montgomery and Putnam
     * Part of the Indiana Geospatial Coordinate System (InGCS). Defined as separate zones for each county these having
     * identical projection parameter values: see info source. Working units are feet - see CRS code 7340.
     */
    public const EPSG_NAD83_2011_INGCS_MONTGOMERY_PUTNAM_M = 'urn:ogc:def:crs:EPSG::7339';

    /**
     * NAD83(2011) / InGCS Owen (ftUS)
     * Extent: USA - Indiana - Owen county
     * Part of the Indiana Geospatial Coordinate System (InGCS). Defining parameters are metric - see CRS code 7341.
     */
    public const EPSG_NAD83_2011_INGCS_OWEN_FTUS = 'urn:ogc:def:crs:EPSG::7342';

    /**
     * NAD83(2011) / InGCS Owen (m)
     * Extent: USA - Indiana - Owen county
     * Part of the Indiana Geospatial Coordinate System (InGCS). Working units are feet - see CRS code 7342.
     */
    public const EPSG_NAD83_2011_INGCS_OWEN_M = 'urn:ogc:def:crs:EPSG::7341';

    /**
     * NAD83(2011) / InGCS Parke-Vermillion (ftUS)
     * Extent: USA - Indiana - counties of Parke and Vermillion
     * Part of the Indiana Geospatial Coordinate System (InGCS). Defined as separate zones for each county these having
     * identical projection parameter values: see info source. Defining parameters are metric - see CRS code 7343.
     */
    public const EPSG_NAD83_2011_INGCS_PARKE_VERMILLION_FTUS = 'urn:ogc:def:crs:EPSG::7344';

    /**
     * NAD83(2011) / InGCS Parke-Vermillion (m)
     * Extent: USA - Indiana - counties of Parke and Vermillion
     * Part of the Indiana Geospatial Coordinate System (InGCS). Defined as separate zones for each county these having
     * identical projection parameter values: see info source. Working units are feet - see CRS code 7344.
     */
    public const EPSG_NAD83_2011_INGCS_PARKE_VERMILLION_M = 'urn:ogc:def:crs:EPSG::7343';

    /**
     * NAD83(2011) / InGCS Perry (ftUS)
     * Extent: USA - Indiana - Perry county
     * Part of the Indiana Geospatial Coordinate System (InGCS). Defining parameters are metric - see CRS code 7345.
     */
    public const EPSG_NAD83_2011_INGCS_PERRY_FTUS = 'urn:ogc:def:crs:EPSG::7346';

    /**
     * NAD83(2011) / InGCS Perry (m)
     * Extent: USA - Indiana - Perry county
     * Part of the Indiana Geospatial Coordinate System (InGCS). Working units are feet - see CRS code 7346.
     */
    public const EPSG_NAD83_2011_INGCS_PERRY_M = 'urn:ogc:def:crs:EPSG::7345';

    /**
     * NAD83(2011) / InGCS Pike-Warrick (ftUS)
     * Extent: USA - Indiana - counties of Pike and Warrick
     * Part of the Indiana Geospatial Coordinate System (InGCS). Defined as separate zones for each county these having
     * identical projection parameter values: see info source. Defining parameters are metric - see CRS code 7347.
     */
    public const EPSG_NAD83_2011_INGCS_PIKE_WARRICK_FTUS = 'urn:ogc:def:crs:EPSG::7348';

    /**
     * NAD83(2011) / InGCS Pike-Warrick (m)
     * Extent: USA - Indiana - counties of Pike and Warrick
     * Part of the Indiana Geospatial Coordinate System (InGCS). Defined as separate zones for each county these having
     * identical projection parameter values: see info source. Working units are feet - see CRS code 7348.
     */
    public const EPSG_NAD83_2011_INGCS_PIKE_WARRICK_M = 'urn:ogc:def:crs:EPSG::7347';

    /**
     * NAD83(2011) / InGCS Posey (ftUS)
     * Extent: USA - Indiana - Posey county
     * Part of the Indiana Geospatial Coordinate System (InGCS). Defining parameters are metric - see CRS code 7349.
     */
    public const EPSG_NAD83_2011_INGCS_POSEY_FTUS = 'urn:ogc:def:crs:EPSG::7350';

    /**
     * NAD83(2011) / InGCS Posey (m)
     * Extent: USA - Indiana - Posey county
     * Part of the Indiana Geospatial Coordinate System (InGCS). Working units are feet - see CRS code 7350.
     */
    public const EPSG_NAD83_2011_INGCS_POSEY_M = 'urn:ogc:def:crs:EPSG::7349';

    /**
     * NAD83(2011) / InGCS Randolph-Wayne (ftUS)
     * Extent: USA - Indiana - counties of Randolph and Wayne
     * Part of the Indiana Geospatial Coordinate System (InGCS). Defined as separate zones for each county these having
     * identical projection parameter values: see info source. Defining parameters are metric - see CRS code 7351.
     */
    public const EPSG_NAD83_2011_INGCS_RANDOLPH_WAYNE_FTUS = 'urn:ogc:def:crs:EPSG::7352';

    /**
     * NAD83(2011) / InGCS Randolph-Wayne (m)
     * Extent: USA - Indiana - counties of Randolph and Wayne
     * Part of the Indiana Geospatial Coordinate System (InGCS). Defined as separate zones for each county these having
     * identical projection parameter values: see info source. Working units are feet - see CRS code 7352.
     */
    public const EPSG_NAD83_2011_INGCS_RANDOLPH_WAYNE_M = 'urn:ogc:def:crs:EPSG::7351';

    /**
     * NAD83(2011) / InGCS Ripley (ftUS)
     * Extent: USA - Indiana - Ripley county
     * Part of the Indiana Geospatial Coordinate System (InGCS). Defining parameters are metric - see CRS code 7353.
     */
    public const EPSG_NAD83_2011_INGCS_RIPLEY_FTUS = 'urn:ogc:def:crs:EPSG::7354';

    /**
     * NAD83(2011) / InGCS Ripley (m)
     * Extent: USA - Indiana - Ripley county
     * Part of the Indiana Geospatial Coordinate System (InGCS). Working units are feet - see CRS code 7354.
     */
    public const EPSG_NAD83_2011_INGCS_RIPLEY_M = 'urn:ogc:def:crs:EPSG::7353';

    /**
     * NAD83(2011) / InGCS Shelby (ftUS)
     * Extent: USA - Indiana - Shelby county
     * Part of the Indiana Geospatial Coordinate System (InGCS). Defining parameters are metric - see CRS code 7355.
     */
    public const EPSG_NAD83_2011_INGCS_SHELBY_FTUS = 'urn:ogc:def:crs:EPSG::7356';

    /**
     * NAD83(2011) / InGCS Shelby (m)
     * Extent: USA - Indiana - Shelby county
     * Part of the Indiana Geospatial Coordinate System (InGCS). Working units are feet - see CRS code 7356.
     */
    public const EPSG_NAD83_2011_INGCS_SHELBY_M = 'urn:ogc:def:crs:EPSG::7355';

    /**
     * NAD83(2011) / InGCS Spencer (ftUS)
     * Extent: USA - Indiana - Spencer county
     * Part of the Indiana Geospatial Coordinate System (InGCS). Defining parameters are metric - see CRS code 7357.
     */
    public const EPSG_NAD83_2011_INGCS_SPENCER_FTUS = 'urn:ogc:def:crs:EPSG::7358';

    /**
     * NAD83(2011) / InGCS Spencer (m)
     * Extent: USA - Indiana - Spencer county
     * Part of the Indiana Geospatial Coordinate System (InGCS). Working units are feet - see CRS code 7358.
     */
    public const EPSG_NAD83_2011_INGCS_SPENCER_M = 'urn:ogc:def:crs:EPSG::7357';

    /**
     * NAD83(2011) / InGCS Steuben (ftUS)
     * Extent: USA - Indiana - Steuben county
     * Part of the Indiana Geospatial Coordinate System (InGCS). Defining parameters are metric - see CRS code 7359.
     */
    public const EPSG_NAD83_2011_INGCS_STEUBEN_FTUS = 'urn:ogc:def:crs:EPSG::7360';

    /**
     * NAD83(2011) / InGCS Steuben (m)
     * Extent: USA - Indiana - Steuben county
     * Part of the Indiana Geospatial Coordinate System (InGCS). Working units are feet - see CRS code 7360.
     */
    public const EPSG_NAD83_2011_INGCS_STEUBEN_M = 'urn:ogc:def:crs:EPSG::7359';

    /**
     * NAD83(2011) / InGCS Sullivan (ftUS)
     * Extent: USA - Indiana - Sullivan county
     * Part of the Indiana Geospatial Coordinate System (InGCS). Defining parameters are metric - see CRS code 7361.
     */
    public const EPSG_NAD83_2011_INGCS_SULLIVAN_FTUS = 'urn:ogc:def:crs:EPSG::7362';

    /**
     * NAD83(2011) / InGCS Sullivan (m)
     * Extent: USA - Indiana - Sullivan county
     * Part of the Indiana Geospatial Coordinate System (InGCS). Working units are feet - see CRS code 7362.
     */
    public const EPSG_NAD83_2011_INGCS_SULLIVAN_M = 'urn:ogc:def:crs:EPSG::7361';

    /**
     * NAD83(2011) / InGCS Tippecanoe-White (ftUS)
     * Extent: USA - Indiana - counties of Tippecanoe and White
     * Part of the Indiana Geospatial Coordinate System (InGCS). Defined as separate zones for each county these having
     * identical projection parameter values: see info source. Defining parameters are metric - see CRS code 7363.
     */
    public const EPSG_NAD83_2011_INGCS_TIPPECANOE_WHITE_FTUS = 'urn:ogc:def:crs:EPSG::7364';

    /**
     * NAD83(2011) / InGCS Tippecanoe-White (m)
     * Extent: USA - Indiana - counties of Tippecanoe and White
     * Part of the Indiana Geospatial Coordinate System (InGCS). Defined as separate zones for each county these having
     * identical projection parameter values: see info source. Working units are feet - see CRS code 7364.
     */
    public const EPSG_NAD83_2011_INGCS_TIPPECANOE_WHITE_M = 'urn:ogc:def:crs:EPSG::7363';

    /**
     * NAD83(2011) / InGCS Vanderburgh (ftUS)
     * Extent: USA - Indiana - Vanderburgh county
     * Part of the Indiana Geospatial Coordinate System (InGCS). Defining parameters are metric - see CRS code 7365.
     */
    public const EPSG_NAD83_2011_INGCS_VANDERBURGH_FTUS = 'urn:ogc:def:crs:EPSG::7366';

    /**
     * NAD83(2011) / InGCS Vanderburgh (m)
     * Extent: USA - Indiana - Vanderburgh county
     * Part of the Indiana Geospatial Coordinate System (InGCS). Working units are feet - see CRS code 7366.
     */
    public const EPSG_NAD83_2011_INGCS_VANDERBURGH_M = 'urn:ogc:def:crs:EPSG::7365';

    /**
     * NAD83(2011) / InGCS Vigo (ftUS)
     * Extent: USA - Indiana - Vigo county
     * Part of the Indiana Geospatial Coordinate System (InGCS). Defining parameters are metric - see CRS code 7367.
     */
    public const EPSG_NAD83_2011_INGCS_VIGO_FTUS = 'urn:ogc:def:crs:EPSG::7368';

    /**
     * NAD83(2011) / InGCS Vigo (m)
     * Extent: USA - Indiana - Vigo county
     * Part of the Indiana Geospatial Coordinate System (InGCS). Working units are feet - see CRS code 7368.
     */
    public const EPSG_NAD83_2011_INGCS_VIGO_M = 'urn:ogc:def:crs:EPSG::7367';

    /**
     * NAD83(2011) / InGCS Wells (ftUS)
     * Extent: USA - Indiana - Wells county
     * Part of the Indiana Geospatial Coordinate System (InGCS). Defining parameters are metric - see CRS code 7369.
     */
    public const EPSG_NAD83_2011_INGCS_WELLS_FTUS = 'urn:ogc:def:crs:EPSG::7370';

    /**
     * NAD83(2011) / InGCS Wells (m)
     * Extent: USA - Indiana - Wells county
     * Part of the Indiana Geospatial Coordinate System (InGCS). Working units are feet - see CRS code 7370.
     */
    public const EPSG_NAD83_2011_INGCS_WELLS_M = 'urn:ogc:def:crs:EPSG::7369';

    /**
     * NAD83(2011) / Indiana East
     * Extent: USA - Indiana - counties of Adams; Allen; Bartholomew; Blackford; Brown; Cass; Clark; De Kalb; Dearborn;
     * Decatur; Delaware; Elkhart; Fayette; Floyd; Franklin; Fulton; Grant; Hamilton; Hancock; Harrison; Henry; Howard;
     * Huntington; Jackson; Jay; Jefferson; Jennings; Johnson; Kosciusko; Lagrange; Madison; Marion; Marshall; Miami;
     * Noble; Ohio; Randolph; Ripley; Rush; Scott; Shelby; St Joseph; Steuben; Switzerland; Tipton; Union; Wabash;
     * Washington; Wayne; Wells; Whitley
     * State law defines use of US survey feet. See code 6459 for equivalent non-metric definition. Replaces
     * NAD83(NSRS2007) / Indiana East (CRS code 3532).
     */
    public const EPSG_NAD83_2011_INDIANA_EAST = 'urn:ogc:def:crs:EPSG::6458';

    /**
     * NAD83(2011) / Indiana East (ftUS)
     * Extent: USA - Indiana - counties of Adams; Allen; Bartholomew; Blackford; Brown; Cass; Clark; De Kalb; Dearborn;
     * Decatur; Delaware; Elkhart; Fayette; Floyd; Franklin; Fulton; Grant; Hamilton; Hancock; Harrison; Henry; Howard;
     * Huntington; Jackson; Jay; Jefferson; Jennings; Johnson; Kosciusko; Lagrange; Madison; Marion; Marshall; Miami;
     * Noble; Ohio; Randolph; Ripley; Rush; Scott; Shelby; St Joseph; Steuben; Switzerland; Tipton; Union; Wabash;
     * Washington; Wayne; Wells; Whitley
     * State law defines use of US survey feet. Federal definition is metric - see code 6458. Replaces NAD83(NSRS2007)
     * / Indiana East (ftUS) (CRS code 3533).
     */
    public const EPSG_NAD83_2011_INDIANA_EAST_FTUS = 'urn:ogc:def:crs:EPSG::6459';

    /**
     * NAD83(2011) / Indiana West
     * Extent: USA - Indiana - counties of Benton; Boone; Carroll; Clay; Clinton; Crawford; Daviess; Dubois; Fountain;
     * Gibson; Greene; Hendricks; Jasper; Knox; La Porte; Lake; Lawrence; Martin; Monroe; Montgomery; Morgan; Newton;
     * Orange; Owen; Parke; Perry; Pike; Porter; Posey; Pulaski; Putnam; Spencer; Starke; Sullivan; Tippecanoe;
     * Vanderburgh; Vermillion; Vigo; Warren; Warrick; White
     * State law defines use of US survey feet. See code 6461 for equivalent non-metric definition. Replaces
     * NAD83(NSRS2007) / Indiana West (CRS code 3534).
     */
    public const EPSG_NAD83_2011_INDIANA_WEST = 'urn:ogc:def:crs:EPSG::6460';

    /**
     * NAD83(2011) / Indiana West (ftUS)
     * Extent: USA - Indiana - counties of Benton; Boone; Carroll; Clay; Clinton; Crawford; Daviess; Dubois; Fountain;
     * Gibson; Greene; Hendricks; Jasper; Knox; La Porte; Lake; Lawrence; Martin; Monroe; Montgomery; Morgan; Newton;
     * Orange; Owen; Parke; Perry; Pike; Porter; Posey; Pulaski; Putnam; Spencer; Starke; Sullivan; Tippecanoe;
     * Vanderburgh; Vermillion; Vigo; Warren; Warrick; White
     * State law defines use of US survey feet. Federal definition is metric - see code 6460. Replaces NAD83(NSRS2007)
     * / Indiana West (ftUS) (CRS code 3535).
     */
    public const EPSG_NAD83_2011_INDIANA_WEST_FTUS = 'urn:ogc:def:crs:EPSG::6461';

    /**
     * NAD83(2011) / Iowa North
     * Extent: USA - Iowa - counties of Allamakee; Benton; Black Hawk; Boone; Bremer; Buchanan; Buena Vista; Butler;
     * Calhoun; Carroll; Cerro Gordo; Cherokee; Chickasaw; Clay; Clayton; Crawford; Delaware; Dickinson; Dubuque;
     * Emmet; Fayette; Floyd; Franklin; Greene; Grundy; Hamilton; Hancock; Hardin; Howard; Humboldt; Ida; Jackson;
     * Jones; Kossuth; Linn; Lyon; Marshall; Mitchell; Monona; O'Brien; Osceola; Palo Alto; Plymouth; Pocahontas; Sac;
     * Sioux; Story; Tama; Webster; Winnebago; Winneshiek; Woodbury; Worth; Wright
     * State law defines use of US survey feet. See code 6463 for equivalent non-metric definition. Replaces
     * NAD83(NSRS2007) / Iowa North (CRS code 3536).
     */
    public const EPSG_NAD83_2011_IOWA_NORTH = 'urn:ogc:def:crs:EPSG::6462';

    /**
     * NAD83(2011) / Iowa North (ftUS)
     * Extent: USA - Iowa - counties of Allamakee; Benton; Black Hawk; Boone; Bremer; Buchanan; Buena Vista; Butler;
     * Calhoun; Carroll; Cerro Gordo; Cherokee; Chickasaw; Clay; Clayton; Crawford; Delaware; Dickinson; Dubuque;
     * Emmet; Fayette; Floyd; Franklin; Greene; Grundy; Hamilton; Hancock; Hardin; Howard; Humboldt; Ida; Jackson;
     * Jones; Kossuth; Linn; Lyon; Marshall; Mitchell; Monona; O'Brien; Osceola; Palo Alto; Plymouth; Pocahontas; Sac;
     * Sioux; Story; Tama; Webster; Winnebago; Winneshiek; Woodbury; Worth; Wright
     * State law defines use of US survey feet. Federal definition is metric - see code 6462. Replaces NAD83(NSRS2007)
     * / Iowa North (ftUS) (CRS code 3537).
     */
    public const EPSG_NAD83_2011_IOWA_NORTH_FTUS = 'urn:ogc:def:crs:EPSG::6463';

    /**
     * NAD83(2011) / Iowa South
     * Extent: USA - Iowa - counties of Adair; Adams; Appanoose; Audubon; Cass; Cedar; Clarke; Clinton; Dallas; Davis;
     * Decatur; Des Moines; Fremont; Guthrie; Harrison; Henry; Iowa; Jasper; Jefferson; Johnson; Keokuk; Lee; Louisa;
     * Lucas; Madison; Mahaska; Marion; Mills; Monroe; Montgomery; Muscatine; Page; Polk; Pottawattamie; Poweshiek;
     * Ringgold; Scott; Shelby; Taylor; Union; Van Buren; Wapello; Warren; Washington; Wayne
     * State law defines use of US survey feet. See code 6465 for equivalent non-metric definition. Replaces
     * NAD83(NSRS2007) / Iowa South (CRS code 3538).
     */
    public const EPSG_NAD83_2011_IOWA_SOUTH = 'urn:ogc:def:crs:EPSG::6464';

    /**
     * NAD83(2011) / Iowa South (ftUS)
     * Extent: USA - Iowa - counties of Adair; Adams; Appanoose; Audubon; Cass; Cedar; Clarke; Clinton; Dallas; Davis;
     * Decatur; Des Moines; Fremont; Guthrie; Harrison; Henry; Iowa; Jasper; Jefferson; Johnson; Keokuk; Lee; Louisa;
     * Lucas; Madison; Mahaska; Marion; Mills; Monroe; Montgomery; Muscatine; Page; Polk; Pottawattamie; Poweshiek;
     * Ringgold; Scott; Shelby; Taylor; Union; Van Buren; Wapello; Warren; Washington; Wayne
     * State law defines use of US survey feet. Federal definition is metric - see code 3538. Replaces NAD83(NSRS2007)
     * / Iowa South (ftUS) (CRS code 3539).
     */
    public const EPSG_NAD83_2011_IOWA_SOUTH_FTUS = 'urn:ogc:def:crs:EPSG::6465';

    /**
     * NAD83(2011) / KS RCS zone 1
     * Extent: USA - Kansas - counties of Cheyenne; Sherman; Wallace.
     */
    public const EPSG_NAD83_2011_KS_RCS_ZONE_1 = 'urn:ogc:def:crs:EPSG::8518';

    /**
     * NAD83(2011) / KS RCS zone 10
     * Extent: USA - Kansas - counties of Atchison; Brown; Doniphan; Jackson; Marshall; Nemaha.
     */
    public const EPSG_NAD83_2011_KS_RCS_ZONE_10 = 'urn:ogc:def:crs:EPSG::8527';

    /**
     * NAD83(2011) / KS RCS zone 11
     * Extent: USA - Kansas - counties of Douglas; Jefferson; Johnson; Leavenworth; Shawnee; Wyandotte.
     */
    public const EPSG_NAD83_2011_KS_RCS_ZONE_11 = 'urn:ogc:def:crs:EPSG::8528';

    /**
     * NAD83(2011) / KS RCS zone 12
     * Extent: USA - Kansas - counties of Grant; Greeley; Hamilton; Kearny; Morton; Stanton; Stevens; Wichita.
     */
    public const EPSG_NAD83_2011_KS_RCS_ZONE_12 = 'urn:ogc:def:crs:EPSG::8529';

    /**
     * NAD83(2011) / KS RCS zone 13
     * Extent: USA - Kansas - counties of Finney; Gray; Haskell; Lane; Meade; Scott; Seward.
     */
    public const EPSG_NAD83_2011_KS_RCS_ZONE_13 = 'urn:ogc:def:crs:EPSG::8531';

    /**
     * NAD83(2011) / KS RCS zone 14
     * Extent: USA - Kansas - counties of Clark; Ford; Hodgeman; Ness.
     */
    public const EPSG_NAD83_2011_KS_RCS_ZONE_14 = 'urn:ogc:def:crs:EPSG::8533';

    /**
     * NAD83(2011) / KS RCS zone 15
     * Extent: USA - Kansas - counties of Comanche; Edwards; Kiowa; Pawnee; Rush.
     */
    public const EPSG_NAD83_2011_KS_RCS_ZONE_15 = 'urn:ogc:def:crs:EPSG::8534';

    /**
     * NAD83(2011) / KS RCS zone 16
     * Extent: USA - Kansas - counties of Barber; Pratt; Stafford.
     */
    public const EPSG_NAD83_2011_KS_RCS_ZONE_16 = 'urn:ogc:def:crs:EPSG::8535';

    /**
     * NAD83(2011) / KS RCS zone 17
     * Extent: USA - Kansas - counties of Butler; Harvey; Kingman; Reno; Sedgwick.
     */
    public const EPSG_NAD83_2011_KS_RCS_ZONE_17 = 'urn:ogc:def:crs:EPSG::8536';

    /**
     * NAD83(2011) / KS RCS zone 18
     * Extent: USA - Kansas - counties of Cowley; Harper; Sumner.
     */
    public const EPSG_NAD83_2011_KS_RCS_ZONE_18 = 'urn:ogc:def:crs:EPSG::8538';

    /**
     * NAD83(2011) / KS RCS zone 19
     * Extent: USA - Kansas - counties of Chautauqua; Coffey; Elk; Greenwood; Montgomery; Osage; Wilson; Woodson.
     */
    public const EPSG_NAD83_2011_KS_RCS_ZONE_19 = 'urn:ogc:def:crs:EPSG::8539';

    /**
     * NAD83(2011) / KS RCS zone 2
     * Extent: USA - Kansas - counties of Logan; Rawlins; Thomas.
     */
    public const EPSG_NAD83_2011_KS_RCS_ZONE_2 = 'urn:ogc:def:crs:EPSG::8519';

    /**
     * NAD83(2011) / KS RCS zone 20
     * Extent: USA - Kansas - counties of Allen; Anderson; Bourbon; Cherokee; Crawford; Franklin; Labette; Linn; Miami;
     * Neosho.
     */
    public const EPSG_NAD83_2011_KS_RCS_ZONE_20 = 'urn:ogc:def:crs:EPSG::8540';

    /**
     * NAD83(2011) / KS RCS zone 3
     * Extent: USA - Kansas - counties of Decatur; Gove; Sheridan.
     */
    public const EPSG_NAD83_2011_KS_RCS_ZONE_3 = 'urn:ogc:def:crs:EPSG::8520';

    /**
     * NAD83(2011) / KS RCS zone 4
     * Extent: USA - Kansas - counties of Ellis; Graham; Norton; Phillips; Rooks; Trego.
     */
    public const EPSG_NAD83_2011_KS_RCS_ZONE_4 = 'urn:ogc:def:crs:EPSG::8521';

    /**
     * NAD83(2011) / KS RCS zone 5
     * Extent: USA - Kansas - counties of Barton; Osborne; Russell; Smith.
     */
    public const EPSG_NAD83_2011_KS_RCS_ZONE_5 = 'urn:ogc:def:crs:EPSG::8522';

    /**
     * NAD83(2011) / KS RCS zone 6
     * Extent: USA - Kansas - counties of Ellsworth; Jewell; Lincoln; Mitchell; Rice.
     */
    public const EPSG_NAD83_2011_KS_RCS_ZONE_6 = 'urn:ogc:def:crs:EPSG::8523';

    /**
     * NAD83(2011) / KS RCS zone 7
     * Extent: USA - Kansas - counties of Clay; Cloud; Dickinson; Marion; McPherson; Ottawa; Republic; Saline;
     * Washington.
     */
    public const EPSG_NAD83_2011_KS_RCS_ZONE_7 = 'urn:ogc:def:crs:EPSG::8524';

    /**
     * NAD83(2011) / KS RCS zone 8
     * Extent: USA - Kansas - counties of Geary; Pottawatomie; Riley; Wabaunsee.
     */
    public const EPSG_NAD83_2011_KS_RCS_ZONE_8 = 'urn:ogc:def:crs:EPSG::8525';

    /**
     * NAD83(2011) / KS RCS zone 9
     * Extent: USA - Kansas - counties of Chase; Lyon; Morris.
     */
    public const EPSG_NAD83_2011_KS_RCS_ZONE_9 = 'urn:ogc:def:crs:EPSG::8526';

    /**
     * NAD83(2011) / Kansas LCC
     * Extent: USA - Kansas
     * KS DOT defines system in US survey feet. See code 6925 for equivalent non-metric definition.
     */
    public const EPSG_NAD83_2011_KANSAS_LCC = 'urn:ogc:def:crs:EPSG::6924';

    /**
     * NAD83(2011) / Kansas LCC (ftUS)
     * Extent: USA - Kansas
     * KS DOT defines system in US survey feet. See code 6924 for equivalent metric definition.
     */
    public const EPSG_NAD83_2011_KANSAS_LCC_FTUS = 'urn:ogc:def:crs:EPSG::6925';

    /**
     * NAD83(2011) / Kansas North
     * Extent: USA - Kansas - counties of Atchison; Brown; Cheyenne; Clay; Cloud; Decatur; Dickinson; Doniphan;
     * Douglas; Ellis; Ellsworth; Geary; Gove; Graham; Jackson; Jefferson; Jewell; Johnson; Leavenworth; Lincoln;
     * Logan; Marshall; Mitchell; Morris; Nemaha; Norton; Osborne; Ottawa; Phillips; Pottawatomie; Rawlins; Republic;
     * Riley; Rooks; Russell; Saline; Shawnee; Sheridan; Sherman; Smith; Thomas; Trego; Wabaunsee; Wallace; Washington;
     * Wyandotte
     * State law defines use of US survey feet. See code 6467 for equivalent non-metric definition. Replaces
     * NAD83(NSRS2007) / Kansas North (CRS code 3540).
     */
    public const EPSG_NAD83_2011_KANSAS_NORTH = 'urn:ogc:def:crs:EPSG::6466';

    /**
     * NAD83(2011) / Kansas North (ftUS)
     * Extent: USA - Kansas - counties of Atchison; Brown; Cheyenne; Clay; Cloud; Decatur; Dickinson; Doniphan;
     * Douglas; Ellis; Ellsworth; Geary; Gove; Graham; Jackson; Jefferson; Jewell; Johnson; Leavenworth; Lincoln;
     * Logan; Marshall; Mitchell; Morris; Nemaha; Norton; Osborne; Ottawa; Phillips; Pottawatomie; Rawlins; Republic;
     * Riley; Rooks; Russell; Saline; Shawnee; Sheridan; Sherman; Smith; Thomas; Trego; Wabaunsee; Wallace; Washington;
     * Wyandotte
     * State law defines use of US survey feet. Federal definition is metric - see code 6466. Replaces NAD83(NSRS2007)
     * / Kansas North (ftUS) (CRS code 3541).
     */
    public const EPSG_NAD83_2011_KANSAS_NORTH_FTUS = 'urn:ogc:def:crs:EPSG::6467';

    /**
     * NAD83(2011) / Kansas South
     * Extent: USA - Kansas - counties of Allen; Anderson; Barber; Barton; Bourbon; Butler; Chase; Chautauqua;
     * Cherokee; Clark; Coffey; Comanche; Cowley; Crawford; Edwards; Elk; Finney; Ford; Franklin; Grant; Gray; Greeley;
     * Greenwood; Hamilton; Harper; Harvey; Haskell; Hodgeman; Kearny; Kingman; Kiowa; Labette; Lane; Linn; Lyon;
     * Marion; McPherson; Meade; Miami; Montgomery; Morton; Neosho; Ness; Osage; Pawnee; Pratt; Reno; Rice; Rush;
     * Scott; Sedgwick; Seward; Stafford; Stanton; Stevens; Sumner; Wichita; Wilson; Woodson
     * State law defines use of US survey feet. See code 6467 for equivalent non-metric definition. Replaces
     * NAD83(NSRS2007) / Kansas South (CRS code 3542).
     */
    public const EPSG_NAD83_2011_KANSAS_SOUTH = 'urn:ogc:def:crs:EPSG::6468';

    /**
     * NAD83(2011) / Kansas South (ftUS)
     * Extent: USA - Kansas - counties of Allen; Anderson; Barber; Barton; Bourbon; Butler; Chase; Chautauqua;
     * Cherokee; Clark; Coffey; Comanche; Cowley; Crawford; Edwards; Elk; Finney; Ford; Franklin; Grant; Gray; Greeley;
     * Greenwood; Hamilton; Harper; Harvey; Haskell; Hodgeman; Kearny; Kingman; Kiowa; Labette; Lane; Linn; Lyon;
     * Marion; McPherson; Meade; Miami; Montgomery; Morton; Neosho; Ness; Osage; Pawnee; Pratt; Reno; Rice; Rush;
     * Scott; Sedgwick; Seward; Stafford; Stanton; Stevens; Sumner; Wichita; Wilson; Woodson
     * State law defines use of US survey feet. Federal definition is metric - see code 6468. Replaces NAD83(NSRS2007)
     * / Kansas South (ftUS) (CRS code 3543).
     */
    public const EPSG_NAD83_2011_KANSAS_SOUTH_FTUS = 'urn:ogc:def:crs:EPSG::6469';

    /**
     * NAD83(2011) / Kentucky North
     * Extent: USA - Kentucky - counties of Anderson; Bath; Boone; Bourbon; Boyd; Bracken; Bullitt; Campbell; Carroll;
     * Carter; Clark; Elliott; Fayette; Fleming; Franklin; Gallatin; Grant; Greenup; Harrison; Henry; Jefferson;
     * Jessamine; Kenton; Lawrence; Lewis; Mason; Menifee; Montgomery; Morgan; Nicholas; Oldham; Owen; Pendleton;
     * Robertson; Rowan; Scott; Shelby; Spencer; Trimble; Woodford
     * State law defines use of US survey feet. See code 6471 for equivalent non-metric definition. Replaces
     * NAD83(NSRS2007) / Kentucky North (CRS code 3544).
     */
    public const EPSG_NAD83_2011_KENTUCKY_NORTH = 'urn:ogc:def:crs:EPSG::6470';

    /**
     * NAD83(2011) / Kentucky North (ftUS)
     * Extent: USA - Kentucky - counties of Anderson; Bath; Boone; Bourbon; Boyd; Bracken; Bullitt; Campbell; Carroll;
     * Carter; Clark; Elliott; Fayette; Fleming; Franklin; Gallatin; Grant; Greenup; Harrison; Henry; Jefferson;
     * Jessamine; Kenton; Lawrence; Lewis; Mason; Menifee; Montgomery; Morgan; Nicholas; Oldham; Owen; Pendleton;
     * Robertson; Rowan; Scott; Shelby; Spencer; Trimble; Woodford
     * State law defines use of US survey feet. Federal definition is metric - see code 6470. Replaces NAD83(NSRS2007)
     * / Kentucky North (ftUS) (CRS code 3545).
     */
    public const EPSG_NAD83_2011_KENTUCKY_NORTH_FTUS = 'urn:ogc:def:crs:EPSG::6471';

    /**
     * NAD83(2011) / Kentucky Single Zone
     * Extent: USA - Kentucky
     * State law defines use of US survey feet. See code 6473 for equivalent non-metric definition. Replaces
     * NAD83(NSRS2007) / Kentucky Single Zone (CRS code 3546).
     */
    public const EPSG_NAD83_2011_KENTUCKY_SINGLE_ZONE = 'urn:ogc:def:crs:EPSG::6472';

    /**
     * NAD83(2011) / Kentucky Single Zone (ftUS)
     * Extent: USA - Kentucky
     * State law defines use of US survey feet. See code 6472 for equivalent metric definition. Replaces
     * NAD83(NSRS2007) / Kentucky Single Zone (ftUS) (CRS code 3547).
     */
    public const EPSG_NAD83_2011_KENTUCKY_SINGLE_ZONE_FTUS = 'urn:ogc:def:crs:EPSG::6473';

    /**
     * NAD83(2011) / Kentucky South
     * Extent: USA - Kentucky - counties of Adair; Allen; Ballard; Barren; Bell; Boyle; Breathitt; Breckinridge;
     * Butler; Caldwell; Calloway; Carlisle; Casey; Christian; Clay; Clinton; Crittenden; Cumberland; Daviess;
     * Edmonson; Estill; Floyd; Fulton; Garrard; Graves; Grayson; Green; Hancock; Hardin; Harlan; Hart; Henderson;
     * Hickman; Hopkins; Jackson; Johnson; Knott; Knox; Larue; Laurel; Lee; Leslie; Letcher; Lincoln; Livingston;
     * Logan; Lyon; Madison; Magoffin; Marion; Marshall; Martin; McCracken; McCreary; McLean; Meade; Mercer; Metcalfe;
     * Monroe; Muhlenberg; Nelson; Ohio; Owsley; Perry; Pike; Powell; Pulaski; Rockcastle; Russell; Simpson; Taylor;
     * Todd; Trigg; Union; Warren; Washington; Wayne; Webster; Whitley; Wolfe
     * State law defines use of US survey feet. See code 6475 for equivalent non-metric definition. Replaces
     * NAD83(NSRS2007) / Kentucky South (CRS code 3548).
     */
    public const EPSG_NAD83_2011_KENTUCKY_SOUTH = 'urn:ogc:def:crs:EPSG::6474';

    /**
     * NAD83(2011) / Kentucky South (ftUS)
     * Extent: USA - Kentucky - counties of Adair; Allen; Ballard; Barren; Bell; Boyle; Breathitt; Breckinridge;
     * Butler; Caldwell; Calloway; Carlisle; Casey; Christian; Clay; Clinton; Crittenden; Cumberland; Daviess;
     * Edmonson; Estill; Floyd; Fulton; Garrard; Graves; Grayson; Green; Hancock; Hardin; Harlan; Hart; Henderson;
     * Hickman; Hopkins; Jackson; Johnson; Knott; Knox; Larue; Laurel; Lee; Leslie; Letcher; Lincoln; Livingston;
     * Logan; Lyon; Madison; Magoffin; Marion; Marshall; Martin; McCracken; McCreary; McLean; Meade; Mercer; Metcalfe;
     * Monroe; Muhlenberg; Nelson; Ohio; Owsley; Perry; Pike; Powell; Pulaski; Rockcastle; Russell; Simpson; Taylor;
     * Todd; Trigg; Union; Warren; Washington; Wayne; Webster; Whitley; Wolfe
     * State law defines use of US survey feet. Federal definition is metric - see code 6474. Replaces NAD83(NSRS2007)
     * / Kentucky South (ftUS) (CRS code 3549).
     */
    public const EPSG_NAD83_2011_KENTUCKY_SOUTH_FTUS = 'urn:ogc:def:crs:EPSG::6475';

    /**
     * NAD83(2011) / Louisiana North
     * Extent: USA - Louisiana - counties of Avoyelles; Bienville; Bossier; Caddo; Caldwell; Catahoula; Claiborne;
     * Concordia; De Soto; East Carroll; Franklin; Grant; Jackson; La Salle; Lincoln; Madison; Morehouse; Natchitoches;
     * Ouachita; Rapides; Red River; Richland; Sabine; Tensas; Union; Vernon; Webster; West Carroll; Winn
     * State law defines use of US survey feet. See code 6477 for equivalent non-metric definition. Replaces
     * NAD83(NSRS2007) / Louisiana North (CRS code 3550).
     */
    public const EPSG_NAD83_2011_LOUISIANA_NORTH = 'urn:ogc:def:crs:EPSG::6476';

    /**
     * NAD83(2011) / Louisiana North (ftUS)
     * Extent: USA - Louisiana - counties of Avoyelles; Bienville; Bossier; Caddo; Caldwell; Catahoula; Claiborne;
     * Concordia; De Soto; East Carroll; Franklin; Grant; Jackson; La Salle; Lincoln; Madison; Morehouse; Natchitoches;
     * Ouachita; Rapides; Red River; Richland; Sabine; Tensas; Union; Vernon; Webster; West Carroll; Winn
     * State law defines use of US survey feet. Federal definition is metric - see code 6476. Replaces NAD83(NSRS2007)
     * / Louisiana North (ftUS) (CRS code 3551).
     */
    public const EPSG_NAD83_2011_LOUISIANA_NORTH_FTUS = 'urn:ogc:def:crs:EPSG::6477';

    /**
     * NAD83(2011) / Louisiana South
     * Extent: USA - Louisiana - counties of Acadia; Allen; Ascension; Assumption; Beauregard; Calcasieu; Cameron; East
     * Baton Rouge; East Feliciana; Evangeline; Iberia; Iberville; Jefferson; Jefferson Davis; Lafayette; LaFourche;
     * Livingston; Orleans; Plaquemines; Pointe Coupee; St Bernard; St Charles; St Helena; St James; St John the
     * Baptist; St Landry; St Martin; St Mary; St Tammany; Tangipahoa; Terrebonne; Vermilion; Washington; West Baton
     * Rouge; West Feliciana
     * Not applicable to offshore areas. State law defines use of US survey feet. See code 6479 for equivalent
     * non-metric definition. Replaces NAD83(NSRS2007) / Louisiana South (CRS code 3552).
     */
    public const EPSG_NAD83_2011_LOUISIANA_SOUTH = 'urn:ogc:def:crs:EPSG::6478';

    /**
     * NAD83(2011) / Louisiana South (ftUS)
     * Extent: USA - Louisiana - counties of Acadia; Allen; Ascension; Assumption; Beauregard; Calcasieu; Cameron; East
     * Baton Rouge; East Feliciana; Evangeline; Iberia; Iberville; Jefferson; Jefferson Davis; Lafayette; LaFourche;
     * Livingston; Orleans; Plaquemines; Pointe Coupee; St Bernard; St Charles; St Helena; St James; St John the
     * Baptist; St Landry; St Martin; St Mary; St Tammany; Tangipahoa; Terrebonne; Vermilion; Washington; West Baton
     * Rouge; West Feliciana
     * Not applicable to offshore areas. State law defines use of US survey feet. Federal definition is metric - see
     * code 6478. Replaces NAD83(NSRS2007) / Louisiana South (ftUS) (CRS code 3553).
     */
    public const EPSG_NAD83_2011_LOUISIANA_SOUTH_FTUS = 'urn:ogc:def:crs:EPSG::6479';

    /**
     * NAD83(2011) / Maine CS2000 Central
     * Extent: USA - Maine between approximately 69°40'W and 68°25'W. The area is bounded by the following: Beginning
     * at the point determined by the intersection of the Maine State line and the County Line between Aroostook and
     * Somerset Counties, thence northeasterly along the state line to the intersection of the Fort Kent - Frenchville
     * town line, thence southerly along this town line to the intersection with the New Canada Plantation - T17 R5
     * WELS town line, thence continuing southerly along town lines to the northeast corner of Penobscot County, thence
     * continuing southerly along the Penobscot County line to the intersection of the Woodville - Mattawamkeag town
     * line (being determined by the Penobscot River), thence along the Penobscot River to the Enfield - Lincoln town
     * line, thence southeasterly along the Enfield - Lincoln town line and the Enfield - Lowell town line to the
     * Passadumkeag - Edinburg town line, thence south-southeasterly along town lines to the intersection of the
     * Hancock County line, thence southerly along the county line to the intersection of the Otis - Mariaville town
     * line, thence southerly along the Otis - Mariaville town line to the Ellsworth city line, thence southerly along
     * the Ellsworth city line to the intersection of the Surry - Trenton town line, thence southerly along the
     * easterly town lines of Surry, Blue Hill, Brooklin, Deer Isle, and Stonington to the Knox County line, thence
     * following the Knox County line to the boundary of the State of Maine as determined by Maritime law, thence
     * following the State boundary westerly to the intersection of the Sagadahoc - Lincoln county line, thence
     * northerly along the easterly boundary of the Maine 2000 West Zone, as defined, to the point of beginning
     * Replaces NAD83(NSRS2007) / Maine CS2000 Central (CRS code 3554).
     */
    public const EPSG_NAD83_2011_MAINE_CS2000_CENTRAL = 'urn:ogc:def:crs:EPSG::6480';

    /**
     * NAD83(2011) / Maine CS2000 East
     * Extent: USA - Maine east of approximately 68°25'W. The area is bounded by the following: Beginning at the point
     * determined by the intersection of the Maine State line and the Fort Kent - Frenchville town line, thence
     * continuing easterly and then southerly along the state line to the boundary of the State of Maine as determined
     * by Maritime law, thence following the State boundary westerly to the intersection of the Knox and Hancock County
     * line, thence northerly along the easterly boundary of the Maine 2000 Central Zone, as defined, to the point of
     * beginning
     * Replaces NAD83(NSRS2007) / Maine CS2000 East (CRS code 3555).
     */
    public const EPSG_NAD83_2011_MAINE_CS2000_EAST = 'urn:ogc:def:crs:EPSG::6481';

    /**
     * NAD83(2011) / Maine CS2000 West
     * Extent: USA - Maine west of approximately 69°40'W. The area is bounded by the following: Beginning at the point
     * determined by the intersection of the Maine State line and the County Line between Aroostook and Somerset
     * Counties, thence following the Somerset County line Easterly to the Northwest corner of the Somerset and
     * Piscataquis county line, thence Southerly along this county line to the northeast corner of the Athens town
     * line, thence westerly along the town line between Brighton Plantation and Athens to the westerly corner of
     * Athens, and continuing southerly to the southwest corner of the town of Athens where it meets the Cornville town
     * line, thence westerly along the Cornville - Solon town line to the intersection of the Cornville - Madison town
     * line, thence southerly and westerly following the Madison town line to the intersection of the Norridgewock -
     * Skowhegan town line, thence southerly along the Skowhegan town line to the Fairfield town line, thence easterly
     * along the Fairfield town line to the Clinton town line (being determined by the Kennebec River), thence
     * southerly along the Kennebec River to the Augusta city line, thence easterly along the city line to the Windsor
     * town line, thence southerly along the Augusta - Windsor town line to the northwest corner of the Lincoln County
     * line, thence southerly along the westerly Lincoln county line to the boundary of the State of Maine as
     * determined by Maritime law, thence following the State boundary on the westerly side of the state to the point
     * of beginning
     * Replaces NAD83(NSRS2007) / Maine CS2000 West (CRS code 3556).
     */
    public const EPSG_NAD83_2011_MAINE_CS2000_WEST = 'urn:ogc:def:crs:EPSG::6482';

    /**
     * NAD83(2011) / Maine East
     * Extent: USA - Maine - counties of Aroostook; Hancock; Knox; Penobscot; Piscataquis; Waldo; Washington
     * State law defines system in US survey feet. See code 6484 for equivalent non-metric definition. Replaces
     * NAD83(NSRS2007) / Maine East (CRS code 3557).
     */
    public const EPSG_NAD83_2011_MAINE_EAST = 'urn:ogc:def:crs:EPSG::6483';

    /**
     * NAD83(2011) / Maine East (ftUS)
     * Extent: USA - Maine - counties of Aroostook; Hancock; Knox; Penobscot; Piscataquis; Waldo; Washington
     * State law defines use of US survey feet. Federal definition is metric - see code 6483. Replaces NAD83(NSRS2007)
     * / Maine East (ftUS) (CRS code 26863).
     */
    public const EPSG_NAD83_2011_MAINE_EAST_FTUS = 'urn:ogc:def:crs:EPSG::6484';

    /**
     * NAD83(2011) / Maine West
     * Extent: USA - Maine - counties of Androscoggin; Cumberland; Franklin; Kennebec; Lincoln; Oxford; Sagadahoc;
     * Somerset; York
     * State law defines system in US survey feet. See code 6486 for equivalent non-metric definition. Replaces
     * NAD83(NSRS2007) / Maine West (CRS code 3558).
     */
    public const EPSG_NAD83_2011_MAINE_WEST = 'urn:ogc:def:crs:EPSG::6485';

    /**
     * NAD83(2011) / Maine West (ftUS)
     * Extent: USA - Maine - counties of Androscoggin; Cumberland; Franklin; Kennebec; Lincoln; Oxford; Sagadahoc;
     * Somerset; York
     * State law defines use of US survey feet. Federal definition is metric - see code 6485. Replaces NAD83(NSRS2007)
     * / Maine West (ftUS) (CRS code 26864).
     */
    public const EPSG_NAD83_2011_MAINE_WEST_FTUS = 'urn:ogc:def:crs:EPSG::6486';

    /**
     * NAD83(2011) / Maryland
     * Extent: USA - Maryland - counties of Allegany; Anne Arundel; Baltimore; Calvert; Caroline; Carroll; Cecil;
     * Charles; Dorchester; Frederick; Garrett; Harford; Howard; Kent; Montgomery; Prince Georges; Queen Annes;
     * Somerset; St Marys; Talbot; Washington; Wicomico; Worcester
     * State law defines use of US survey feet. See code 6488 for equivalent non-metric definition. Replaces
     * NAD83(NSRS2007) / Maryland (CRS code 3559).
     */
    public const EPSG_NAD83_2011_MARYLAND = 'urn:ogc:def:crs:EPSG::6487';

    /**
     * NAD83(2011) / Maryland (ftUS)
     * Extent: USA - Maryland - counties of Allegany; Anne Arundel; Baltimore; Calvert; Caroline; Carroll; Cecil;
     * Charles; Dorchester; Frederick; Garrett; Harford; Howard; Kent; Montgomery; Prince Georges; Queen Annes;
     * Somerset; St Marys; Talbot; Washington; Wicomico; Worcester
     * State law defines use of US survey feet. Federal definition is metric - see code 6487. Replaces NAD83(NSRS2007)
     * / Maryland (ftUS) (CRS code 3582).
     */
    public const EPSG_NAD83_2011_MARYLAND_FTUS = 'urn:ogc:def:crs:EPSG::6488';

    /**
     * NAD83(2011) / Massachusetts Island
     * Extent: USA - Massachusetts offshore - counties of Dukes; Nantucket
     * State law defines use of US survey feet. See code 6490 for equivalent non-metric definition. Replaces
     * NAD83(NSRS2007) / Massachusetts Island (CRS code 3583).
     */
    public const EPSG_NAD83_2011_MASSACHUSETTS_ISLAND = 'urn:ogc:def:crs:EPSG::6489';

    /**
     * NAD83(2011) / Massachusetts Island (ftUS)
     * Extent: USA - Massachusetts offshore - counties of Dukes; Nantucket
     * State law defines use of US survey feet. Federal definition is metric - see code 6489. Replaces NAD83(NSRS2007)
     * / Massachusetts Island (ftUS) (CRS code 3584).
     */
    public const EPSG_NAD83_2011_MASSACHUSETTS_ISLAND_FTUS = 'urn:ogc:def:crs:EPSG::6490';

    /**
     * NAD83(2011) / Massachusetts Mainland
     * Extent: USA - Massachusetts onshore - counties of Barnstable; Berkshire; Bristol; Essex; Franklin; Hampden;
     * Hampshire; Middlesex; Norfolk; Plymouth; Suffolk; Worcester
     * State law defines use of US survey feet. See code 6492 for equivalent non-metric definition. Replaces
     * NAD83(NSRS2007) / Massachusetts Mainland (CRS code 3585).
     */
    public const EPSG_NAD83_2011_MASSACHUSETTS_MAINLAND = 'urn:ogc:def:crs:EPSG::6491';

    /**
     * NAD83(2011) / Massachusetts Mainland (ftUS)
     * Extent: USA - Massachusetts onshore - counties of Barnstable; Berkshire; Bristol; Essex; Franklin; Hampden;
     * Hampshire; Middlesex; Norfolk; Plymouth; Suffolk; Worcester
     * State law defines use of US survey feet. Federal definition is metric - see code 6491. Replaces NAD83(NSRS2007)
     * / Massachusetts Mainland (ftUS) (CRS code 3586).
     */
    public const EPSG_NAD83_2011_MASSACHUSETTS_MAINLAND_FTUS = 'urn:ogc:def:crs:EPSG::6492';

    /**
     * NAD83(2011) / Michigan Central
     * Extent: USA - Michigan - counties of Alcona; Alpena; Antrim; Arenac; Benzie; Charlevoix; Cheboygan; Clare;
     * Crawford; Emmet; Gladwin; Grand Traverse; Iosco; Kalkaska; Lake; Leelanau; Manistee; Mason; Missaukee;
     * Montmorency; Ogemaw; Osceola; Oscoda; Otsego; Presque Isle; Roscommon; Wexford
     * State law defines use of International feet (note: not US survey feet). See code 6494 for equivalent non-metric
     * definition. Replaces NAD83(NSRS2007) / Michigan Central (CRS code 3587).
     */
    public const EPSG_NAD83_2011_MICHIGAN_CENTRAL = 'urn:ogc:def:crs:EPSG::6493';

    /**
     * NAD83(2011) / Michigan Central (ft)
     * Extent: USA - Michigan - counties of Alcona; Alpena; Antrim; Arenac; Benzie; Charlevoix; Cheboygan; Clare;
     * Crawford; Emmet; Gladwin; Grand Traverse; Iosco; Kalkaska; Lake; Leelanau; Manistee; Mason; Missaukee;
     * Montmorency; Ogemaw; Osceola; Oscoda; Otsego; Presque Isle; Roscommon; Wexford
     * State law defines use of International feet (note: not US survey feet). Federal definition is metric - see code
     * 6493. Replaces NAD83(NSRS2007) / Michigan Central (ft) (CRS code 3588).
     */
    public const EPSG_NAD83_2011_MICHIGAN_CENTRAL_FT = 'urn:ogc:def:crs:EPSG::6494';

    /**
     * NAD83(2011) / Michigan North
     * Extent: USA - Michigan north of approximately 45°45'N - counties of Alger; Baraga; Chippewa; Delta; Dickinson;
     * Gogebic; Houghton; Iron; Keweenaw; Luce; Mackinac; Marquette; Menominee; Ontonagon; Schoolcraft
     * State law defines use of International feet (note: not US survey feet). See code 6496 for equivalent non-metric
     * definition. Replaces NAD83(NSRS2007) / Michigan North (CRS code 3589).
     */
    public const EPSG_NAD83_2011_MICHIGAN_NORTH = 'urn:ogc:def:crs:EPSG::6495';

    /**
     * NAD83(2011) / Michigan North (ft)
     * Extent: USA - Michigan north of approximately 45°45'N - counties of Alger; Baraga; Chippewa; Delta; Dickinson;
     * Gogebic; Houghton; Iron; Keweenaw; Luce; Mackinac; Marquette; Menominee; Ontonagon; Schoolcraft
     * State law defines use of International feet (note: not US survey feet). Federal definition is metric - see code
     * 6495. Replaces NAD83(NSRS2007) / Michigan North (ft) (CRS code 3590).
     */
    public const EPSG_NAD83_2011_MICHIGAN_NORTH_FT = 'urn:ogc:def:crs:EPSG::6496';

    /**
     * NAD83(2011) / Michigan Oblique Mercator
     * Extent: USA - Michigan
     * Replaces NAD83(NSRS2007) / Michigan Oblique Mercator (CRS code 3591).
     */
    public const EPSG_NAD83_2011_MICHIGAN_OBLIQUE_MERCATOR = 'urn:ogc:def:crs:EPSG::6497';

    /**
     * NAD83(2011) / Michigan South
     * Extent: USA - Michigan - counties of Allegan; Barry; Bay; Berrien; Branch; Calhoun; Cass; Clinton; Eaton;
     * Genesee; Gratiot; Hillsdale; Huron; Ingham; Ionia; Isabella; Jackson; Kalamazoo; Kent; Lapeer; Lenawee;
     * Livingston; Macomb; Mecosta; Midland; Monroe; Montcalm; Muskegon; Newaygo; Oakland; Oceana; Ottawa; Saginaw;
     * Sanilac; Shiawassee; St Clair; St Joseph; Tuscola; Van Buren; Washtenaw; Wayne
     * State law defines use of International feet (note: not US survey feet). See code 6499 for equivalent non-metric
     * definition. Replaces NAD83(NSRS2007) / Michigan South (CRS code 3592).
     */
    public const EPSG_NAD83_2011_MICHIGAN_SOUTH = 'urn:ogc:def:crs:EPSG::6498';

    /**
     * NAD83(2011) / Michigan South (ft)
     * Extent: USA - Michigan - counties of Allegan; Barry; Bay; Berrien; Branch; Calhoun; Cass; Clinton; Eaton;
     * Genesee; Gratiot; Hillsdale; Huron; Ingham; Ionia; Isabella; Jackson; Kalamazoo; Kent; Lapeer; Lenawee;
     * Livingston; Macomb; Mecosta; Midland; Monroe; Montcalm; Muskegon; Newaygo; Oakland; Oceana; Ottawa; Saginaw;
     * Sanilac; Shiawassee; St Clair; St Joseph; Tuscola; Van Buren; Washtenaw; Wayne
     * State law defines use of International feet (note: not US survey feet). Federal definition is metric - see code
     * 6498. Replaces NAD83(NSRS2007) / Michigan South (ft) (CRS code 3593).
     */
    public const EPSG_NAD83_2011_MICHIGAN_SOUTH_FT = 'urn:ogc:def:crs:EPSG::6499';

    /**
     * NAD83(2011) / Minnesota Central
     * Extent: USA - Minnesota - counties of Aitkin; Becker; Benton; Carlton; Cass; Chisago; Clay; Crow Wing; Douglas;
     * Grant; Hubbard; Isanti; Kanabec; Mille Lacs; Morrison; Otter Tail; Pine; Pope; Stearns; Stevens; Todd; Traverse;
     * Wadena; Wilkin
     * State law defines system in US survey feet. See code 6501 for equivalent non-metric definition. Replaces
     * NAD83(NSRS2007) / Minnesota Central (CRS code 3494).
     */
    public const EPSG_NAD83_2011_MINNESOTA_CENTRAL = 'urn:ogc:def:crs:EPSG::6500';

    /**
     * NAD83(2011) / Minnesota Central (ftUS)
     * Extent: USA - Minnesota - counties of Aitkin; Becker; Benton; Carlton; Cass; Chisago; Clay; Crow Wing; Douglas;
     * Grant; Hubbard; Isanti; Kanabec; Mille Lacs; Morrison; Otter Tail; Pine; Pope; Stearns; Stevens; Todd; Traverse;
     * Wadena; Wilkin
     * State law defines use of US survey feet. Federal definition is metric - see code 6500. Replaces NAD83(NSRS2007)
     * / Minnesota Central (ftUS) (CRS code 26866).
     */
    public const EPSG_NAD83_2011_MINNESOTA_CENTRAL_FTUS = 'urn:ogc:def:crs:EPSG::6501';

    /**
     * NAD83(2011) / Minnesota North
     * Extent: USA - Minnesota - counties of Beltrami; Clearwater; Cook; Itasca; Kittson; Koochiching; Lake; Lake of
     * the Woods; Mahnomen; Marshall; Norman; Pennington; Polk; Red Lake; Roseau; St Louis
     * State law defines system in US survey feet. See code 6503 for equivalent non-metric definition. Replaces
     * NAD83(NSRS2007) / Minnesota North (CRS code 3595).
     */
    public const EPSG_NAD83_2011_MINNESOTA_NORTH = 'urn:ogc:def:crs:EPSG::6502';

    /**
     * NAD83(2011) / Minnesota North (ftUS)
     * Extent: USA - Minnesota - counties of Beltrami; Clearwater; Cook; Itasca; Kittson; Koochiching; Lake; Lake of
     * the Woods; Mahnomen; Marshall; Norman; Pennington; Polk; Red Lake; Roseau; St Louis
     * State law defines use of US survey feet. Federal definition is metric - see code 6502. Replaces NAD83(NSRS2007)
     * / Minnesota North (ftUS) (CRS code 26865).
     */
    public const EPSG_NAD83_2011_MINNESOTA_NORTH_FTUS = 'urn:ogc:def:crs:EPSG::6503';

    /**
     * NAD83(2011) / Minnesota South
     * Extent: USA - Minnesota - counties of Anoka; Big Stone; Blue Earth; Brown; Carver; Chippewa; Cottonwood; Dakota;
     * Dodge; Faribault; Fillmore; Freeborn; Goodhue; Hennepin; Houston; Jackson; Kandiyohi; Lac Qui Parle; Le Sueur;
     * Lincoln; Lyon; Martin; McLeod; Meeker; Mower; Murray; Nicollet; Nobles; Olmsted; Pipestone; Ramsey; Redwood;
     * Renville; Rice; Rock; Scott; Sherburne; Sibley; Steele; Swift; Wabasha; Waseca; Washington; Watonwan; Winona;
     * Wright; Yellow Medicine
     * State law defines system in US survey feet. See code 6505 for equivalent non-metric definition. Replaces
     * NAD83(NSRS2007) / Minnesota South (CRS code 3596).
     */
    public const EPSG_NAD83_2011_MINNESOTA_SOUTH = 'urn:ogc:def:crs:EPSG::6504';

    /**
     * NAD83(2011) / Minnesota South (ftUS)
     * Extent: USA - Minnesota - counties of Anoka; Big Stone; Blue Earth; Brown; Carver; Chippewa; Cottonwood; Dakota;
     * Dodge; Faribault; Fillmore; Freeborn; Goodhue; Hennepin; Houston; Jackson; Kandiyohi; Lac Qui Parle; Le Sueur;
     * Lincoln; Lyon; Martin; McLeod; Meeker; Mower; Murray; Nicollet; Nobles; Olmsted; Pipestone; Ramsey; Redwood;
     * Renville; Rice; Rock; Scott; Sherburne; Sibley; Steele; Swift; Wabasha; Waseca; Washington; Watonwan; Winona;
     * Wright; Yellow Medicine
     * State law defines use of US survey feet. Federal definition is metric - see code 6504. Replaces NAD83(NSRS2007)
     * / Minnesota South (ftUS) (CRS code 26867).
     */
    public const EPSG_NAD83_2011_MINNESOTA_SOUTH_FTUS = 'urn:ogc:def:crs:EPSG::6505';

    /**
     * NAD83(2011) / Mississippi East
     * Extent: USA - Mississippi - counties of Alcorn; Attala; Benton; Calhoun; Chickasaw; Choctaw; Clarke; Clay;
     * Covington; Forrest; George; Greene; Hancock; Harrison; Itawamba; Jackson; Jasper; Jones; Kemper; Lafayette;
     * Lamar; Lauderdale; Leake; Lee; Lowndes; Marshall; Monroe; Neshoba; Newton; Noxubee; Oktibbeha; Pearl River;
     * Perry; Pontotoc; Prentiss; Scott; Smith; Stone; Tippah; Tishomingo; Union; Wayne; Webster; Winston
     * State law defines use of US survey feet. See code 6507 for equivalent non-metric definition. Replaces
     * NAD83(NSRS2007) / Mississippi East (CRS code 3597).
     */
    public const EPSG_NAD83_2011_MISSISSIPPI_EAST = 'urn:ogc:def:crs:EPSG::6506';

    /**
     * NAD83(2011) / Mississippi East (ftUS)
     * Extent: USA - Mississippi - counties of Alcorn; Attala; Benton; Calhoun; Chickasaw; Choctaw; Clarke; Clay;
     * Covington; Forrest; George; Greene; Hancock; Harrison; Itawamba; Jackson; Jasper; Jones; Kemper; Lafayette;
     * Lamar; Lauderdale; Leake; Lee; Lowndes; Marshall; Monroe; Neshoba; Newton; Noxubee; Oktibbeha; Pearl River;
     * Perry; Pontotoc; Prentiss; Scott; Smith; Stone; Tippah; Tishomingo; Union; Wayne; Webster; Winston
     * State law defines use of US survey feet. Federal definition is metric - see code 6506. Replaces NAD83(NSRS2007)
     * / Mississippi East (ftUS) (CRS code 3598).
     */
    public const EPSG_NAD83_2011_MISSISSIPPI_EAST_FTUS = 'urn:ogc:def:crs:EPSG::6507';

    /**
     * NAD83(2011) / Mississippi TM
     * Extent: USA - Mississippi
     * Replaces NAD83(NSRS2007) / Mississippi TM (CRS code 3816).
     */
    public const EPSG_NAD83_2011_MISSISSIPPI_TM = 'urn:ogc:def:crs:EPSG::6508';

    /**
     * NAD83(2011) / Mississippi West
     * Extent: USA - Mississippi - counties of Adams; Amite; Bolivar; Carroll; Claiborne; Coahoma; Copiah; De Soto;
     * Franklin; Grenada; Hinds; Holmes; Humphreys; Issaquena; Jefferson; Jefferson Davis; Lawrence; Leflore; Lincoln;
     * Madison; Marion; Montgomery; Panola; Pike; Quitman; Rankin; Sharkey; Simpson; Sunflower; Tallahatchie; Tate;
     * Tunica; Walthall; Warren; Washington; Wilkinson; Yalobusha; Yazoo
     * State law defines use of US survey feet. See code 6510 for equivalent non-metric definition. Replaces
     * NAD83(NSRS2007) / Mississippi West (CRS code 3599).
     */
    public const EPSG_NAD83_2011_MISSISSIPPI_WEST = 'urn:ogc:def:crs:EPSG::6509';

    /**
     * NAD83(2011) / Mississippi West (ftUS)
     * Extent: USA - Mississippi - counties of Adams; Amite; Bolivar; Carroll; Claiborne; Coahoma; Copiah; De Soto;
     * Franklin; Grenada; Hinds; Holmes; Humphreys; Issaquena; Jefferson; Jefferson Davis; Lawrence; Leflore; Lincoln;
     * Madison; Marion; Montgomery; Panola; Pike; Quitman; Rankin; Sharkey; Simpson; Sunflower; Tallahatchie; Tate;
     * Tunica; Walthall; Warren; Washington; Wilkinson; Yalobusha; Yazoo
     * State law defines use of US survey feet. Federal definition is metric - see code 6509. Replaces NAD83(NSRS2007)
     * / Mississippi West (ftUS) (CRS code 3600).
     */
    public const EPSG_NAD83_2011_MISSISSIPPI_WEST_FTUS = 'urn:ogc:def:crs:EPSG::6510';

    /**
     * NAD83(2011) / Missouri Central
     * Extent: USA - Missouri - counties of Adair; Audrain; Benton; Boone; Callaway; Camden; Carroll; Chariton;
     * Christian; Cole; Cooper; Dallas; Douglas; Greene; Grundy; Hickory; Howard; Howell; Knox; Laclede; Linn;
     * Livingston; Macon; Maries; Mercer; Miller; Moniteau; Monroe; Morgan; Osage; Ozark; Pettis; Phelps; Polk;
     * Pulaski; Putnam; Randolph; Saline; Schuyler; Scotland; Shelby; Stone; Sullivan; Taney; Texas; Webster; Wright
     * Replaces NAD83(NSRS2007) / Missouri Central (CRS code 3601).
     */
    public const EPSG_NAD83_2011_MISSOURI_CENTRAL = 'urn:ogc:def:crs:EPSG::6511';

    /**
     * NAD83(2011) / Missouri East
     * Extent: USA - Missouri - counties of Bollinger; Butler; Cape Girardeau; Carter; Clark; Crawford; Dent; Dunklin;
     * Franklin; Gasconade; Iron; Jefferson; Lewis; Lincoln; Madison; Marion; Mississippi; Montgomery; New Madrid;
     * Oregon; Pemiscot; Perry; Pike; Ralls; Reynolds; Ripley; Scott; Shannon; St Charles; St Francois; St Louis; Ste.
     * Genevieve; Stoddard; Warren; Washington; Wayne
     * Replaces NAD83(NSRS2007) / Missouri East (CRS code 3602).
     */
    public const EPSG_NAD83_2011_MISSOURI_EAST = 'urn:ogc:def:crs:EPSG::6512';

    /**
     * NAD83(2011) / Missouri West
     * Extent: USA - Missouri - counties of Andrew; Atchison; Barry; Barton; Bates; Buchanan; Caldwell; Cass; Cedar;
     * Clay; Clinton; Dade; Daviess; De Kalb; Gentry; Harrison; Henry; Holt; Jackson; Jasper; Johnson; Lafayette;
     * Lawrence; McDonald; Newton; Nodaway; Platte; Ray; St Clair; Vernon; Worth
     * Replaces NAD83(NSRS2007) / Missouri West (CRS code 3603).
     */
    public const EPSG_NAD83_2011_MISSOURI_WEST = 'urn:ogc:def:crs:EPSG::6513';

    /**
     * NAD83(2011) / Montana
     * Extent: USA - Montana - counties of Beaverhead; Big Horn; Blaine; Broadwater; Carbon; Carter; Cascade; Chouteau;
     * Custer; Daniels; Dawson; Deer Lodge; Fallon; Fergus; Flathead; Gallatin; Garfield; Glacier; Golden Valley;
     * Granite; Hill; Jefferson; Judith Basin; Lake; Lewis and Clark; Liberty; Lincoln; Madison; McCone; Meagher;
     * Mineral; Missoula; Musselshell; Park; Petroleum; Phillips; Pondera; Powder River; Powell; Prairie; Ravalli;
     * Richland; Roosevelt; Rosebud; Sanders; Sheridan; Silver Bow; Stillwater; Sweet Grass; Teton; Toole; Treasure;
     * Valley; Wheatland; Wibaux; Yellowstone
     * State law defines use of International feet (note: not US survey feet). See code 6515 for equivalent non-metric
     * definition. Replaces NAD83(NSRS2007) / Montana (CRS code 3604).
     */
    public const EPSG_NAD83_2011_MONTANA = 'urn:ogc:def:crs:EPSG::6514';

    /**
     * NAD83(2011) / Montana (ft)
     * Extent: USA - Montana - counties of Beaverhead; Big Horn; Blaine; Broadwater; Carbon; Carter; Cascade; Chouteau;
     * Custer; Daniels; Dawson; Deer Lodge; Fallon; Fergus; Flathead; Gallatin; Garfield; Glacier; Golden Valley;
     * Granite; Hill; Jefferson; Judith Basin; Lake; Lewis and Clark; Liberty; Lincoln; Madison; McCone; Meagher;
     * Mineral; Missoula; Musselshell; Park; Petroleum; Phillips; Pondera; Powder River; Powell; Prairie; Ravalli;
     * Richland; Roosevelt; Rosebud; Sanders; Sheridan; Silver Bow; Stillwater; Sweet Grass; Teton; Toole; Treasure;
     * Valley; Wheatland; Wibaux; Yellowstone
     * State law defines use of International feet (note: not US survey feet). Federal definition is metric - see code
     * 6514. Replaces NAD83(NSRS2007) / Montana (ft) (CRS code 3605).
     */
    public const EPSG_NAD83_2011_MONTANA_FT = 'urn:ogc:def:crs:EPSG::6515';

    /**
     * NAD83(2011) / NCRS Las Vegas (ftUS)
     * Extent: USA - Nevada - Las Vegas area below approximately 3000 feet
     * Part of the Nevada Coordinate Reference System (NCRS). Defined in meters, usage is in feet. See CRS code 8383
     * for equivalent metric definition. Replaces NAD83 / NCRS Las Vegas (ftUS) (CRS code 8380).
     */
    public const EPSG_NAD83_2011_NCRS_LAS_VEGAS_FTUS = 'urn:ogc:def:crs:EPSG::8384';

    /**
     * NAD83(2011) / NCRS Las Vegas (m)
     * Extent: USA - Nevada - Las Vegas area below approximately 3000 feet
     * Part of the Nevada Coordinate Reference System (NCRS). Defined in meters, usage is in feet - see CRS code 8384.
     * Replaces NAD83 / NCRS Las Vegas (m) (CRS code 8379).
     */
    public const EPSG_NAD83_2011_NCRS_LAS_VEGAS_M = 'urn:ogc:def:crs:EPSG::8383';

    /**
     * NAD83(2011) / NCRS Las Vegas high (ftUS)
     * Extent: USA - Nevada - Las Vegas area above approximately 2850 feet
     * Part of the Nevada Coordinate Reference System (NCRS). Defined in meters, usage is in feet. See CRS code 8385
     * for equivalent metric definition. Replaces NAD83 / NCRS Las Vegas high (ftUS) (CRS code 8382).
     */
    public const EPSG_NAD83_2011_NCRS_LAS_VEGAS_HIGH_FTUS = 'urn:ogc:def:crs:EPSG::8387';

    /**
     * NAD83(2011) / NCRS Las Vegas high (m)
     * Extent: USA - Nevada - Las Vegas area above approximately 2850 feet
     * Part of the Nevada Coordinate Reference System (NCRS). Defined in meters, usage is in feet - see CRS code 8387.
     * Replaces NAD83 / NCRS Las Vegas (m) (CRS code 8382).
     */
    public const EPSG_NAD83_2011_NCRS_LAS_VEGAS_HIGH_M = 'urn:ogc:def:crs:EPSG::8385';

    /**
     * NAD83(2011) / Nebraska
     * Extent: USA - Nebraska - counties of Adams; Antelope; Arthur; Banner; Blaine; Boone; Box Butte; Boyd; Brown;
     * Buffalo; Burt; Butler; Cass; Cedar; Chase; Cherry; Cheyenne; Clay; Colfax; Cuming; Custer; Dakota; Dawes;
     * Dawson; Deuel; Dixon; Dodge; Douglas; Dundy; Fillmore; Franklin; Frontier; Furnas; Gage; Garden; Garfield;
     * Gosper; Grant; Greeley; Hall; Hamilton; Harlan; Hayes; Hitchcock; Holt; Hooker; Howard; Jefferson; Johnson;
     * Kearney; Keith; Keya Paha; Kimball; Knox; Lancaster; Lincoln; Logan; Loup; Madison; McPherson; Merrick; Morrill;
     * Nance; Nemaha; Nuckolls; Otoe; Pawnee; Perkins; Phelps; Pierce; Platte; Polk; Red Willow; Richardson; Rock;
     * Saline; Sarpy; Saunders; Scotts Bluff; Seward; Sheridan; Sherman; Sioux; Stanton; Thayer; Thomas; Thurston;
     * Valley; Washington; Wayne; Webster; Wheeler; York
     * State law defines system in US survey feet. See CRS code 6517 for equivalent non-metric definition. Replaces
     * NAD83(NSRS2007) / Nebraska (CRS code 3606).
     */
    public const EPSG_NAD83_2011_NEBRASKA = 'urn:ogc:def:crs:EPSG::6516';

    /**
     * NAD83(2011) / Nebraska (ftUS)
     * Extent: USA - Nebraska - counties of Adams; Antelope; Arthur; Banner; Blaine; Boone; Box Butte; Boyd; Brown;
     * Buffalo; Burt; Butler; Cass; Cedar; Chase; Cherry; Cheyenne; Clay; Colfax; Cuming; Custer; Dakota; Dawes;
     * Dawson; Deuel; Dixon; Dodge; Douglas; Dundy; Fillmore; Franklin; Frontier; Furnas; Gage; Garden; Garfield;
     * Gosper; Grant; Greeley; Hall; Hamilton; Harlan; Hayes; Hitchcock; Holt; Hooker; Howard; Jefferson; Johnson;
     * Kearney; Keith; Keya Paha; Kimball; Knox; Lancaster; Lincoln; Logan; Loup; Madison; McPherson; Merrick; Morrill;
     * Nance; Nemaha; Nuckolls; Otoe; Pawnee; Perkins; Phelps; Pierce; Platte; Polk; Red Willow; Richardson; Rock;
     * Saline; Sarpy; Saunders; Scotts Bluff; Seward; Sheridan; Sherman; Sioux; Stanton; Thayer; Thomas; Thurston;
     * Valley; Washington; Wayne; Webster; Wheeler; York
     * State law defines use of US survey feet. Federal definition is metric - see code 6516. Replaces NAD83(NSRS2007)
     * / Nebraska (ftUS) (CRS code 26868).
     */
    public const EPSG_NAD83_2011_NEBRASKA_FTUS = 'urn:ogc:def:crs:EPSG::6880';

    /**
     * NAD83(2011) / Nevada Central
     * Extent: USA - Nevada - counties of Lander; Nye
     * State law defines use of US survey feet. See code 6519 for equivalent non-metric definition. Replaces
     * NAD83(NSRS2007) / Nevada Central (CRS code 3607).
     */
    public const EPSG_NAD83_2011_NEVADA_CENTRAL = 'urn:ogc:def:crs:EPSG::6518';

    /**
     * NAD83(2011) / Nevada Central (ftUS)
     * Extent: USA - Nevada - counties of Lander; Nye
     * State law defines use of US survey feet. Federal definition is metric - see code 6518. Replaces NAD83(NSRS2007)
     * / Nevada Central (ftUS) (CRS code 3608).
     */
    public const EPSG_NAD83_2011_NEVADA_CENTRAL_FTUS = 'urn:ogc:def:crs:EPSG::6519';

    /**
     * NAD83(2011) / Nevada East
     * Extent: USA - Nevada - counties of Clark; Elko; Eureka; Lincoln; White Pine
     * State law defines use of US survey feet. See code 6521 for equivalent non-metric definition. Replaces
     * NAD83(NSRS2007) / Nevada East (CRS code 3609).
     */
    public const EPSG_NAD83_2011_NEVADA_EAST = 'urn:ogc:def:crs:EPSG::6520';

    /**
     * NAD83(2011) / Nevada East (ftUS)
     * Extent: USA - Nevada - counties of Clark; Elko; Eureka; Lincoln; White Pine
     * State law defines use of US survey feet. Federal definition is metric - see code 6520. Replaces NAD83(NSRS2007)
     * / Nevada East (ftUS) (CRS code 3610).
     */
    public const EPSG_NAD83_2011_NEVADA_EAST_FTUS = 'urn:ogc:def:crs:EPSG::6521';

    /**
     * NAD83(2011) / Nevada West
     * Extent: USA - Nevada - counties of Churchill; Douglas; Esmeralda; Humboldt; Lyon; Mineral; Pershing; Storey;
     * Washoe
     * State law defines use of US survey feet. See code 6523 for equivalent non-metric definition. Replaces
     * NAD83(NSRS2007) / Nevada West (CRS code 3611).
     */
    public const EPSG_NAD83_2011_NEVADA_WEST = 'urn:ogc:def:crs:EPSG::6522';

    /**
     * NAD83(2011) / Nevada West (ftUS)
     * Extent: USA - Nevada - counties of Churchill; Douglas; Esmeralda; Humboldt; Lyon; Mineral; Pershing; Storey;
     * Washoe
     * State law defines use of US survey feet. Federal definition is metric - see code 6522. Replaces NAD83(NSRS2007)
     * / Nevada West (ftUS) (CRS code 3612).
     */
    public const EPSG_NAD83_2011_NEVADA_WEST_FTUS = 'urn:ogc:def:crs:EPSG::6523';

    /**
     * NAD83(2011) / New Hampshire
     * Extent: USA - New Hampshire - counties of Belknap; Carroll; Cheshire; Coos; Grafton; Hillsborough; Merrimack;
     * Rockingham; Strafford; Sullivan
     * State law defines use of US survey feet. See code 6525 for equivalent non-metric definition. Replaces
     * NAD83(NSRS2007) / New Hampshire (CRS code 3613).
     */
    public const EPSG_NAD83_2011_NEW_HAMPSHIRE = 'urn:ogc:def:crs:EPSG::6524';

    /**
     * NAD83(2011) / New Hampshire (ftUS)
     * Extent: USA - New Hampshire - counties of Belknap; Carroll; Cheshire; Coos; Grafton; Hillsborough; Merrimack;
     * Rockingham; Strafford; Sullivan
     * State law defines use of US survey feet. Federal definition is metric - see code 6524. Replaces NAD83(NSRS2007)
     * / New Hampshire (ftUS) (CRS code 3614).
     */
    public const EPSG_NAD83_2011_NEW_HAMPSHIRE_FTUS = 'urn:ogc:def:crs:EPSG::6525';

    /**
     * NAD83(2011) / New Jersey
     * Extent: USA - New Jersey - counties of Atlantic; Bergen; Burlington; Camden; Cape May; Cumberland; Essex;
     * Gloucester; Hudson; Hunterdon; Mercer; Middlesex; Monmouth; Morris; Ocean; Passaic; Salem; Somerset; Sussex;
     * Union; Warren
     * State law defines use of US survey feet. See code 6527 for equivalent non-metric definition. Replaces
     * NAD83(NSRS2007) / New Jersey (CRS code 3615).
     */
    public const EPSG_NAD83_2011_NEW_JERSEY = 'urn:ogc:def:crs:EPSG::6526';

    /**
     * NAD83(2011) / New Jersey (ftUS)
     * Extent: USA - New Jersey - counties of Atlantic; Bergen; Burlington; Camden; Cape May; Cumberland; Essex;
     * Gloucester; Hudson; Hunterdon; Mercer; Middlesex; Monmouth; Morris; Ocean; Passaic; Salem; Somerset; Sussex;
     * Union; Warren
     * State law defines use of US survey feet. Federal definition is metric - see code 6526. Replaces NAD83(NSRS2007)
     * / New Jersey (ftUS) (CRS code 3616).
     */
    public const EPSG_NAD83_2011_NEW_JERSEY_FTUS = 'urn:ogc:def:crs:EPSG::6527';

    /**
     * NAD83(2011) / New Mexico Central
     * Extent: USA - New Mexico - counties of Bernalillo; Dona Ana; Lincoln; Los Alamos; Otero; Rio Arriba; Sandoval;
     * Santa Fe; Socorro; Taos; Torrance; Valencia
     * State law defines use of US survey feet. See code 6529 for equivalent non-metric definition. Replaces
     * NAD83(NSRS2007) / New Mexico Central (CRS code 3617).
     */
    public const EPSG_NAD83_2011_NEW_MEXICO_CENTRAL = 'urn:ogc:def:crs:EPSG::6528';

    /**
     * NAD83(2011) / New Mexico Central (ftUS)
     * Extent: USA - New Mexico - counties of Bernalillo; Dona Ana; Lincoln; Los Alamos; Otero; Rio Arriba; Sandoval;
     * Santa Fe; Socorro; Taos; Torrance; Valencia
     * State law defines use of US survey feet. Federal definition is metric - see code 6528. Replaces NAD83(NSRS2007)
     * / New Mexico Central (ftUS) (CRS code 3618).
     */
    public const EPSG_NAD83_2011_NEW_MEXICO_CENTRAL_FTUS = 'urn:ogc:def:crs:EPSG::6529';

    /**
     * NAD83(2011) / New Mexico East
     * Extent: USA - New Mexico - counties of Chaves; Colfax; Curry; De Baca; Eddy; Guadalupe; Harding; Lea; Mora;
     * Quay; Roosevelt; San Miguel; Union
     * State law defines use of US survey feet. See code 6531 for equivalent non-metric definition. Replaces
     * NAD83(NSRS2007) / New Mexico East (CRS code 3619).
     */
    public const EPSG_NAD83_2011_NEW_MEXICO_EAST = 'urn:ogc:def:crs:EPSG::6530';

    /**
     * NAD83(2011) / New Mexico East (ftUS)
     * Extent: USA - New Mexico - counties of Chaves; Colfax; Curry; De Baca; Eddy; Guadalupe; Harding; Lea; Mora;
     * Quay; Roosevelt; San Miguel; Union
     * State law defines use of US survey feet. Federal definition is metric - see code 6530. Replaces NAD83(NSRS2007)
     * / New Mexico East (ftUS) (CRS code 3620).
     */
    public const EPSG_NAD83_2011_NEW_MEXICO_EAST_FTUS = 'urn:ogc:def:crs:EPSG::6531';

    /**
     * NAD83(2011) / New Mexico West
     * Extent: USA - New Mexico - counties of Catron; Cibola; Grant; Hidalgo; Luna; McKinley; San Juan; Sierra
     * State law defines use of US survey feet. See code 6533 for equivalent non-metric definition. Replaces
     * NAD83(NSRS2007) / New Mexico West (CRS code 3621).
     */
    public const EPSG_NAD83_2011_NEW_MEXICO_WEST = 'urn:ogc:def:crs:EPSG::6532';

    /**
     * NAD83(2011) / New Mexico West (ftUS)
     * Extent: USA - New Mexico - counties of Catron; Cibola; Grant; Hidalgo; Luna; McKinley; San Juan; Sierra
     * State law defines use of US survey feet. Federal definition is metric - see code 6532. Replaces NAD83(NSRS2007)
     * / New Mexico West (ftUS) (CRS code 3622).
     */
    public const EPSG_NAD83_2011_NEW_MEXICO_WEST_FTUS = 'urn:ogc:def:crs:EPSG::6533';

    /**
     * NAD83(2011) / New York Central
     * Extent: USA - New York - counties of Broome; Cayuga; Chemung; Chenango; Cortland; Jefferson; Lewis; Madison;
     * Oneida; Onondaga; Ontario; Oswego; Schuyler; Seneca; Steuben; Tioga; Tompkins; Wayne; Yates
     * State law defines use of US survey feet. See code 6535 for equivalent non-metric definition. Replaces
     * NAD83(NSRS2007) / New York Central (CRS code 3623).
     */
    public const EPSG_NAD83_2011_NEW_YORK_CENTRAL = 'urn:ogc:def:crs:EPSG::6534';

    /**
     * NAD83(2011) / New York Central (ftUS)
     * Extent: USA - New York - counties of Broome; Cayuga; Chemung; Chenango; Cortland; Jefferson; Lewis; Madison;
     * Oneida; Onondaga; Ontario; Oswego; Schuyler; Seneca; Steuben; Tioga; Tompkins; Wayne; Yates
     * State law defines use of US survey feet. Federal definition is metric - see code 6534. Replaces NAD83(NSRS2007)
     * / New York Central (ftUS) (CRS code 3624).
     */
    public const EPSG_NAD83_2011_NEW_YORK_CENTRAL_FTUS = 'urn:ogc:def:crs:EPSG::6535';

    /**
     * NAD83(2011) / New York East
     * Extent: USA - New York mainland - counties of Albany; Clinton; Columbia; Delaware; Dutchess; Essex; Franklin;
     * Fulton; Greene; Hamilton; Herkimer; Montgomery; Orange; Otsego; Putnam; Rensselaer; Rockland; Saratoga;
     * Schenectady; Schoharie; St Lawrence; Sullivan; Ulster; Warren; Washington; Westchester
     * State law defines use of US survey feet. See code 6537 for equivalent non-metric definition. Replaces
     * NAD83(NSRS2007) / New York East (CRS code 3625).
     */
    public const EPSG_NAD83_2011_NEW_YORK_EAST = 'urn:ogc:def:crs:EPSG::6536';

    /**
     * NAD83(2011) / New York East (ftUS)
     * Extent: USA - New York mainland - counties of Albany; Clinton; Columbia; Delaware; Dutchess; Essex; Franklin;
     * Fulton; Greene; Hamilton; Herkimer; Montgomery; Orange; Otsego; Putnam; Rensselaer; Rockland; Saratoga;
     * Schenectady; Schoharie; St Lawrence; Sullivan; Ulster; Warren; Washington; Westchester
     * State law defines use of US survey feet. Federal definition is metric - see code 6536. Replaces NAD83(NSRS2007)
     * / New York East (ftUS) (CRS code 3626).
     */
    public const EPSG_NAD83_2011_NEW_YORK_EAST_FTUS = 'urn:ogc:def:crs:EPSG::6537';

    /**
     * NAD83(2011) / New York Long Island
     * Extent: USA - New York - counties of Bronx; Kings; Nassau; New York; Queens; Richmond; Suffolk
     * State law defines use of US survey feet. See code 6539 for equivalent non-metric definition. Replaces
     * NAD83(NSRS2007) / New York Long Island (CRS code 3627).
     */
    public const EPSG_NAD83_2011_NEW_YORK_LONG_ISLAND = 'urn:ogc:def:crs:EPSG::6538';

    /**
     * NAD83(2011) / New York Long Island (ftUS)
     * Extent: USA - New York - counties of Bronx; Kings; Nassau; New York; Queens; Richmond; Suffolk
     * State law defines use of US survey feet. Federal definition is metric - see code 6538. Replaces NAD83(NSRS2007)
     * / New York Long Island (ftUS) (CRS code 3628).
     */
    public const EPSG_NAD83_2011_NEW_YORK_LONG_ISLAND_FTUS = 'urn:ogc:def:crs:EPSG::6539';

    /**
     * NAD83(2011) / New York West
     * Extent: USA - New York - counties of Allegany; Cattaraugus; Chautauqua; Erie; Genesee; Livingston; Monroe;
     * Niagara; Orleans; Wyoming
     * State law defines use of US survey feet. See code 6541 for equivalent non-metric definition. Replaces
     * NAD83(NSRS2007) / New York West (CRS code 3629).
     */
    public const EPSG_NAD83_2011_NEW_YORK_WEST = 'urn:ogc:def:crs:EPSG::6540';

    /**
     * NAD83(2011) / New York West (ftUS)
     * Extent: USA - New York - counties of Allegany; Cattaraugus; Chautauqua; Erie; Genesee; Livingston; Monroe;
     * Niagara; Orleans; Wyoming
     * State law defines use of US survey feet. Federal definition is metric - see code 6540. Replaces NAD83(NSRS2007)
     * / New York West (ftUS) (CRS code 3630).
     */
    public const EPSG_NAD83_2011_NEW_YORK_WEST_FTUS = 'urn:ogc:def:crs:EPSG::6541';

    /**
     * NAD83(2011) / North Carolina
     * Extent: USA - North Carolina - counties of Alamance; Alexander; Alleghany; Anson; Ashe; Avery; Beaufort; Bertie;
     * Bladen; Brunswick; Buncombe; Burke; Cabarrus; Caldwell; Camden; Carteret; Caswell; Catawba; Chatham; Cherokee;
     * Chowan; Clay; Cleveland; Columbus; Craven; Cumberland; Currituck; Dare; Davidson; Davie; Duplin; Durham;
     * Edgecombe; Forsyth; Franklin; Gaston; Gates; Graham; Granville; Greene; Guilford; Halifax; Harnett; Haywood;
     * Henderson; Hertford; Hoke; Hyde; Iredell; Jackson; Johnston; Jones; Lee; Lenoir; Lincoln; Macon; Madison;
     * Martin; McDowell; Mecklenburg; Mitchell; Montgomery; Moore; Nash; New Hanover; Northampton; Onslow; Orange;
     * Pamlico; Pasquotank; Pender; Perquimans; Person; Pitt; Polk; Randolph; Richmond; Robeson; Rockingham; Rowan;
     * Rutherford; Sampson; Scotland; Stanly; Stokes; Surry; Swain; Transylvania; Tyrrell; Union; Vance; Wake; Warren;
     * Washington; Watauga; Wayne; Wilkes; Wilson; Yadkin; Yancey
     * State law defines use of US survey feet. See CRS code 6543 for equivalent non-metric definition. Replaces
     * NAD83(NSRS2007) / North Carolina (CRS code 3631).
     */
    public const EPSG_NAD83_2011_NORTH_CAROLINA = 'urn:ogc:def:crs:EPSG::6542';

    /**
     * NAD83(2011) / North Carolina (ftUS)
     * Extent: USA - North Carolina - counties of Alamance; Alexander; Alleghany; Anson; Ashe; Avery; Beaufort; Bertie;
     * Bladen; Brunswick; Buncombe; Burke; Cabarrus; Caldwell; Camden; Carteret; Caswell; Catawba; Chatham; Cherokee;
     * Chowan; Clay; Cleveland; Columbus; Craven; Cumberland; Currituck; Dare; Davidson; Davie; Duplin; Durham;
     * Edgecombe; Forsyth; Franklin; Gaston; Gates; Graham; Granville; Greene; Guilford; Halifax; Harnett; Haywood;
     * Henderson; Hertford; Hoke; Hyde; Iredell; Jackson; Johnston; Jones; Lee; Lenoir; Lincoln; Macon; Madison;
     * Martin; McDowell; Mecklenburg; Mitchell; Montgomery; Moore; Nash; New Hanover; Northampton; Onslow; Orange;
     * Pamlico; Pasquotank; Pender; Perquimans; Person; Pitt; Polk; Randolph; Richmond; Robeson; Rockingham; Rowan;
     * Rutherford; Sampson; Scotland; Stanly; Stokes; Surry; Swain; Transylvania; Tyrrell; Union; Vance; Wake; Warren;
     * Washington; Watauga; Wayne; Wilkes; Wilson; Yadkin; Yancey
     * State law defines use of US survey feet. Federal definition is metric - see CRS code 6542. Replaces
     * NAD83(NSRS2007) / North Carolina (ftUS) (CRS code 3632).
     */
    public const EPSG_NAD83_2011_NORTH_CAROLINA_FTUS = 'urn:ogc:def:crs:EPSG::6543';

    /**
     * NAD83(2011) / North Dakota North
     * Extent: USA - North Dakota - counties of Benson; Bottineau; Burke; Cavalier; Divide; Eddy; Foster; Grand Forks;
     * Griggs; McHenry; McKenzie; McLean; Mountrial; Nelson; Pembina; Pierce; Ramsey; Renville; Rolette; Sheridan;
     * Steele; Towner; Traill; Walsh; Ward; Wells; Williams
     * State law defines use of International feet (note: not US survey feet). See code 6545 for equivalent non-metric
     * definition. Replaces NAD83(NSRS2007) / North Dakota North (CRS code 3633).
     */
    public const EPSG_NAD83_2011_NORTH_DAKOTA_NORTH = 'urn:ogc:def:crs:EPSG::6544';

    /**
     * NAD83(2011) / North Dakota North (ft)
     * Extent: USA - North Dakota - counties of Benson; Bottineau; Burke; Cavalier; Divide; Eddy; Foster; Grand Forks;
     * Griggs; McHenry; McKenzie; McLean; Mountrial; Nelson; Pembina; Pierce; Ramsey; Renville; Rolette; Sheridan;
     * Steele; Towner; Traill; Walsh; Ward; Wells; Williams
     * State law defines use of International feet (note: not US survey feet). Federal definition is metric - see code
     * 6544. Replaces NAD83(NSRS2007) / North Dakota North (ft) (CRS code 3634).
     */
    public const EPSG_NAD83_2011_NORTH_DAKOTA_NORTH_FT = 'urn:ogc:def:crs:EPSG::6545';

    /**
     * NAD83(2011) / North Dakota South
     * Extent: USA - North Dakota - counties of Adams; Barnes; Billings; Bowman; Burleigh; Cass; Dickey; Dunn; Emmons;
     * Golden Valley; Grant; Hettinger; Kidder; La Moure; Logan; McIntosh; Mercer; Morton; Oliver; Ransom; Richland;
     * Sargent; Sioux; Slope; Stark; Stutsman
     * State law defines use of International feet (note: not US survey feet). See code 6547 for equivalent non-metric
     * definition. Replaces NAD83(NSRS2007) / North Dakota South (CRS code 3635).
     */
    public const EPSG_NAD83_2011_NORTH_DAKOTA_SOUTH = 'urn:ogc:def:crs:EPSG::6546';

    /**
     * NAD83(2011) / North Dakota South (ft)
     * Extent: USA - North Dakota - counties of Adams; Barnes; Billings; Bowman; Burleigh; Cass; Dickey; Dunn; Emmons;
     * Golden Valley; Grant; Hettinger; Kidder; La Moure; Logan; McIntosh; Mercer; Morton; Oliver; Ransom; Richland;
     * Sargent; Sioux; Slope; Stark; Stutsman
     * State law defines use of International feet (note: not US survey feet). Federal definition is metric - see code
     * 6546. Replaces NAD83(NSRS2007) / North Dakota South (ft) (CRS code 3636).
     */
    public const EPSG_NAD83_2011_NORTH_DAKOTA_SOUTH_FT = 'urn:ogc:def:crs:EPSG::6547';

    /**
     * NAD83(2011) / Ohio North
     * Extent: USA - Ohio - counties of Allen;Ashland; Ashtabula; Auglaize; Carroll; Columbiana; Coshocton; Crawford;
     * Cuyahoga; Defiance; Delaware; Erie; Fulton; Geauga; Hancock; Hardin; Harrison; Henry; Holmes; Huron; Jefferson;
     * Knox; Lake; Logan; Lorain; Lucas; Mahoning; Marion; Medina; Mercer; Morrow; Ottawa; Paulding; Portage; Putnam;
     * Richland; Sandusky; Seneca; Shelby; Stark; Summit; Trumbull; Tuscarawas; Union; Van Wert; Wayne; Williams; Wood;
     * Wyandot
     * State law defines use of US survey feet. See code 6549 for equivalent non-metric definition. Replaces
     * NAD83(NSRS2007) / Ohio North (CRS code 3637).
     */
    public const EPSG_NAD83_2011_OHIO_NORTH = 'urn:ogc:def:crs:EPSG::6548';

    /**
     * NAD83(2011) / Ohio North (ftUS)
     * Extent: USA - Ohio - counties of Allen;Ashland; Ashtabula; Auglaize; Carroll; Columbiana; Coshocton; Crawford;
     * Cuyahoga; Defiance; Delaware; Erie; Fulton; Geauga; Hancock; Hardin; Harrison; Henry; Holmes; Huron; Jefferson;
     * Knox; Lake; Logan; Lorain; Lucas; Mahoning; Marion; Medina; Mercer; Morrow; Ottawa; Paulding; Portage; Putnam;
     * Richland; Sandusky; Seneca; Shelby; Stark; Summit; Trumbull; Tuscarawas; Union; Van Wert; Wayne; Williams; Wood;
     * Wyandot
     * State law defines use of US survey feet. Federal definition is metric - see code 6548. Replaces NAD83(NSRS2007)
     * / Ohio North (ftUS) (CRS code 3728).
     */
    public const EPSG_NAD83_2011_OHIO_NORTH_FTUS = 'urn:ogc:def:crs:EPSG::6549';

    /**
     * NAD83(2011) / Ohio South
     * Extent: USA - Ohio - counties of Adams; Athens; Belmont; Brown; Butler; Champaign; Clark; Clermont; Clinton;
     * Darke; Fairfield; Fayette; Franklin; Gallia; Greene; Guernsey; Hamilton; Highland; Hocking; Jackson; Lawrence;
     * Licking; Madison; Meigs; Miami; Monroe; Montgomery; Morgan; Muskingum; Noble; Perry; Pickaway; Pike; Preble;
     * Ross; Scioto; Vinton; Warren; Washington
     * State law defines use of US survey feet. See code 6551 for equivalent non-metric definition. Replaces
     * NAD83(NSRS2007) / Ohio South (CRS code 3638).
     */
    public const EPSG_NAD83_2011_OHIO_SOUTH = 'urn:ogc:def:crs:EPSG::6550';

    /**
     * NAD83(2011) / Ohio South (ftUS)
     * Extent: USA - Ohio - counties of Adams; Athens; Belmont; Brown; Butler; Champaign; Clark; Clermont; Clinton;
     * Darke; Fairfield; Fayette; Franklin; Gallia; Greene; Guernsey; Hamilton; Highland; Hocking; Jackson; Lawrence;
     * Licking; Madison; Meigs; Miami; Monroe; Montgomery; Morgan; Muskingum; Noble; Perry; Pickaway; Pike; Preble;
     * Ross; Scioto; Vinton; Warren; Washington
     * State law defines use of US survey feet. Federal definition is metric - see code 6550. Replaces NAD83(NSRS2007)
     * / Ohio South (ftUS) (CRS code 3729).
     */
    public const EPSG_NAD83_2011_OHIO_SOUTH_FTUS = 'urn:ogc:def:crs:EPSG::6551';

    /**
     * NAD83(2011) / Oklahoma North
     * Extent: USA - Oklahoma - counties of Adair; Alfalfa; Beaver; Blaine; Canadian; Cherokee; Cimarron; Craig; Creek;
     * Custer; Delaware; Dewey; Ellis; Garfield; Grant; Harper; Kay; Kingfisher; Lincoln; Logan; Major; Mayes;
     * Muskogee; Noble; Nowata; Okfuskee; Oklahoma; Okmulgee; Osage; Ottawa; Pawnee; Payne; Roger Mills; Rogers;
     * Sequoyah; Texas; Tulsa; Wagoner; Washington; Woods; Woodward
     * State law defines use of US survey feet. See code 6553 for equivalent non-metric definition. Replaces
     * NAD83(NSRS2007) / Oklahoma North (CRS code 3639).
     */
    public const EPSG_NAD83_2011_OKLAHOMA_NORTH = 'urn:ogc:def:crs:EPSG::6552';

    /**
     * NAD83(2011) / Oklahoma North (ftUS)
     * Extent: USA - Oklahoma - counties of Adair; Alfalfa; Beaver; Blaine; Canadian; Cherokee; Cimarron; Craig; Creek;
     * Custer; Delaware; Dewey; Ellis; Garfield; Grant; Harper; Kay; Kingfisher; Lincoln; Logan; Major; Mayes;
     * Muskogee; Noble; Nowata; Okfuskee; Oklahoma; Okmulgee; Osage; Ottawa; Pawnee; Payne; Roger Mills; Rogers;
     * Sequoyah; Texas; Tulsa; Wagoner; Washington; Woods; Woodward
     * State law defines use of US survey feet. Federal definition is metric - see code 6552. Replaces NAD83(NSRS2007)
     * / Oklahoma North (ftUS) (CRS code 3640).
     */
    public const EPSG_NAD83_2011_OKLAHOMA_NORTH_FTUS = 'urn:ogc:def:crs:EPSG::6553';

    /**
     * NAD83(2011) / Oklahoma South
     * Extent: USA - Oklahoma - counties of Atoka; Beckham; Bryan; Caddo; Carter; Choctaw; Cleveland; Coal; Comanche;
     * Cotton; Garvin; Grady; Greer; Harmon; Haskell; Hughes; Jackson; Jefferson; Johnston; Kiowa; Latimer; Le Flore;
     * Love; Marshall; McClain; McCurtain; McIntosh; Murray; Pittsburg; Pontotoc; Pottawatomie; Pushmataha; Seminole;
     * Stephens; Tillman; Washita
     * State law defines use of US survey feet. See code 6555 for equivalent non-metric definition. Replaces
     * NAD83(NSRS2007) / Oklahoma South (CRS code 3641).
     */
    public const EPSG_NAD83_2011_OKLAHOMA_SOUTH = 'urn:ogc:def:crs:EPSG::6554';

    /**
     * NAD83(2011) / Oklahoma South (ftUS)
     * Extent: USA - Oklahoma - counties of Atoka; Beckham; Bryan; Caddo; Carter; Choctaw; Cleveland; Coal; Comanche;
     * Cotton; Garvin; Grady; Greer; Harmon; Haskell; Hughes; Jackson; Jefferson; Johnston; Kiowa; Latimer; Le Flore;
     * Love; Marshall; McClain; McCurtain; McIntosh; Murray; Pittsburg; Pontotoc; Pottawatomie; Pushmataha; Seminole;
     * Stephens; Tillman; Washita
     * State law defines use of US survey feet. Federal definition is metric - see code 6554. Replaces NAD83(NSRS2007)
     * / Oklahoma South (ftUS) (CRS code 3642).
     */
    public const EPSG_NAD83_2011_OKLAHOMA_SOUTH_FTUS = 'urn:ogc:def:crs:EPSG::6555';

    /**
     * NAD83(2011) / Oregon Baker zone (ft)
     * Extent: USA - Oregon - Baker City area
     * State law defines use of International feet (note: not US survey feet). See NAD83(2011) / Oregon Baker (m) (CRS
     * code 6786) for metric equivalent. Replaces NAD83(CORS96) / Oregon Baker (ft) (CRS code 6785) from 2013-03-08.
     */
    public const EPSG_NAD83_2011_OREGON_BAKER_ZONE_FT = 'urn:ogc:def:crs:EPSG::6787';

    /**
     * NAD83(2011) / Oregon Baker zone (m)
     * Extent: USA - Oregon - Baker City area
     * Replaces NAD83(CORS96) / Oregon Baker (m) (CRS code 6784) from 2013-03-08. See NAD83(2011) / Oregon Baker (ft)
     * (CRS code 6787) for non-metric equivalent.
     */
    public const EPSG_NAD83_2011_OREGON_BAKER_ZONE_M = 'urn:ogc:def:crs:EPSG::6786';

    /**
     * NAD83(2011) / Oregon Bend-Burns zone (ft)
     * Extent: USA - Oregon - Bend-Burns area
     * State law defines use of International feet (note: not US survey feet). See NAD83(2011) / Oregon Bend-Burns (m)
     * (CRS code 6798) for metric equivalent. Replaces NAD83(CORS96) / Oregon Bend-Burns (ft) (CRS code 6797) from
     * 2013-03-08.
     */
    public const EPSG_NAD83_2011_OREGON_BEND_BURNS_ZONE_FT = 'urn:ogc:def:crs:EPSG::6799';

    /**
     * NAD83(2011) / Oregon Bend-Burns zone (m)
     * Extent: USA - Oregon - Bend-Burns area
     * Replaces NAD83(CORS96) / Oregon Bend-Burns (m) (CRS code 6796) from 2013-03-08. See NAD83(2011) / Oregon
     * Bend-Burns (ft) (CRS code 6799) for non-metric equivalent.
     */
    public const EPSG_NAD83_2011_OREGON_BEND_BURNS_ZONE_M = 'urn:ogc:def:crs:EPSG::6798';

    /**
     * NAD83(2011) / Oregon Bend-Klamath Falls zone (ft)
     * Extent: USA - Oregon - Bend-Klamath Falls area
     * State law defines use of International feet (note: not US survey feet). See NAD83(2011) / Oregon Bend-Klamath
     * Falls (m) (CRS code 6790) for metric equivalent. Replaces NAD83(CORS96) / Oregon Bend-Klamath Falls (ft) (CRS
     * code 6789) from 2013-03-08.
     */
    public const EPSG_NAD83_2011_OREGON_BEND_KLAMATH_FALLS_ZONE_FT = 'urn:ogc:def:crs:EPSG::6791';

    /**
     * NAD83(2011) / Oregon Bend-Klamath Falls zone (m)
     * Extent: USA - Oregon - Bend-Klamath Falls area
     * Replaces NAD83(CORS96) / Oregon Bend-Klamath Falls (m) (CRS code 6788) from 2013-03-08. See NAD83(2011) / Oregon
     * Bend-Klamath Falls (ft) (CRS code 6791) for non-metric equivalent.
     */
    public const EPSG_NAD83_2011_OREGON_BEND_KLAMATH_FALLS_ZONE_M = 'urn:ogc:def:crs:EPSG::6790';

    /**
     * NAD83(2011) / Oregon Bend-Redmond-Prineville zone (ft)
     * Extent: USA - Oregon - Bend-Redmond-Prineville area
     * State law defines use of International feet (note: not US survey feet). See NAD83(2011) / Oregon
     * Bend-Redmond-Prineville (m) (CRS code 6794) for metric equivalent. Replaces NAD83(CORS96) / Oregon
     * Bend-Redmond-Prineville (ft) (code 6793) from 2013-03-08.
     */
    public const EPSG_NAD83_2011_OREGON_BEND_REDMOND_PRINEVILLE_ZONE_FT = 'urn:ogc:def:crs:EPSG::6795';

    /**
     * NAD83(2011) / Oregon Bend-Redmond-Prineville zone (m)
     * Extent: USA - Oregon - Bend-Redmond-Prineville area
     * Replaces NAD83(CORS96) / Oregon Bend-Redmond-Prineville (m) (CRS code 6792) from 2013-03-08. See NAD83(2011) /
     * Oregon Bend-Redmond-Prineville (ft) (CRS code 6795) for non-metric equivalent.
     */
    public const EPSG_NAD83_2011_OREGON_BEND_REDMOND_PRINEVILLE_ZONE_M = 'urn:ogc:def:crs:EPSG::6794';

    /**
     * NAD83(2011) / Oregon Burns-Harper zone (ft)
     * Extent: USA - Oregon - Burns-Harper area
     * State law defines use of International feet (note: not US survey feet). See NAD83(2011) / Oregon Burns-Harper
     * zone (m) (CRS code 8311) for metric equivalent.
     */
    public const EPSG_NAD83_2011_OREGON_BURNS_HARPER_ZONE_FT = 'urn:ogc:def:crs:EPSG::8312';

    /**
     * NAD83(2011) / Oregon Burns-Harper zone (m)
     * Extent: USA - Oregon - Burns-Harper area
     * See NAD83(2011) / Oregon Burns-Harper zone (ft) (CRS code 8312) for non-metric equivalent.
     */
    public const EPSG_NAD83_2011_OREGON_BURNS_HARPER_ZONE_M = 'urn:ogc:def:crs:EPSG::8311';

    /**
     * NAD83(2011) / Oregon Canyon City-Burns zone (ft)
     * Extent: USA - Oregon - Canyon City-Burns area
     * State law defines use of International feet (note: not US survey feet). See NAD83(2011) / Oregon Canyon
     * City-Burns zone (m) (CRS code 8313) for metric equivalent.
     */
    public const EPSG_NAD83_2011_OREGON_CANYON_CITY_BURNS_ZONE_FT = 'urn:ogc:def:crs:EPSG::8314';

    /**
     * NAD83(2011) / Oregon Canyon City-Burns zone (m)
     * Extent: USA - Oregon - Canyon City-Burns area
     * See NAD83(2011) / Oregon Canyon City-Burns zone (ft) (CRS code 8314) for non-metric equivalent.
     */
    public const EPSG_NAD83_2011_OREGON_CANYON_CITY_BURNS_ZONE_M = 'urn:ogc:def:crs:EPSG::8313';

    /**
     * NAD83(2011) / Oregon Canyonville-Grants Pass zone (ft)
     * Extent: USA - Oregon - Canyonville-Grants Pass area
     * State law defines use of International feet (note: not US survey feet). See NAD83(2011) / Oregon
     * Canyonville-Grants Pass (m) (CRS code 6802) for metric equivalent. Replaces NAD83(CORS96) / Oregon
     * Canyonville-Grants Pass (ft) (code 6801) from 2013-03-08.
     */
    public const EPSG_NAD83_2011_OREGON_CANYONVILLE_GRANTS_PASS_ZONE_FT = 'urn:ogc:def:crs:EPSG::6803';

    /**
     * NAD83(2011) / Oregon Canyonville-Grants Pass zone (m)
     * Extent: USA - Oregon - Canyonville-Grants Pass area
     * Replaces NAD83(CORS96) / Oregon Canyonville-Grants Pass (m) (CRS code 6800) from 2013-03-08. See NAD83(2011) /
     * Oregon Canyonville-Grants Pass (ft) (CRS code 6803) for non-metric equivalent.
     */
    public const EPSG_NAD83_2011_OREGON_CANYONVILLE_GRANTS_PASS_ZONE_M = 'urn:ogc:def:crs:EPSG::6802';

    /**
     * NAD83(2011) / Oregon Coast Range North zone (ft)
     * Extent: USA - Oregon - Coast Range North area
     * State law defines use of International feet (note: not US survey feet). See NAD83(2011) / Oregon Coast Range
     * North zone (m) (CRS code 8315) for metric equivalent.
     */
    public const EPSG_NAD83_2011_OREGON_COAST_RANGE_NORTH_ZONE_FT = 'urn:ogc:def:crs:EPSG::8316';

    /**
     * NAD83(2011) / Oregon Coast Range North zone (m)
     * Extent: USA - Oregon - Coast Range North area
     * See NAD83(2011) / Oregon Coast Range North zone (ft) (CRS code 8316) for non-metric equivalent.
     */
    public const EPSG_NAD83_2011_OREGON_COAST_RANGE_NORTH_ZONE_M = 'urn:ogc:def:crs:EPSG::8315';

    /**
     * NAD83(2011) / Oregon Coast zone (ft)
     * Extent: USA - Oregon - coastal area
     * State law defines use of International feet (note: not US survey feet). See NAD83(2011) / Oregon Coast (m) (CRS
     * code 6842) for metric equivalent. Replaces NAD83(CORS96) / Oregon Coast (ft) (CRS code 6841) from 2013-03-08.
     */
    public const EPSG_NAD83_2011_OREGON_COAST_ZONE_FT = 'urn:ogc:def:crs:EPSG::6843';

    /**
     * NAD83(2011) / Oregon Coast zone (m)
     * Extent: USA - Oregon - coastal area
     * Replaces NAD83(CORS96) / Oregon Coast (m) (CRS code 6840) from 2013-03-08. See NAD83(2011) / Oregon Coast (ft)
     * (CRS code 6843) for non-metric equivalent.
     */
    public const EPSG_NAD83_2011_OREGON_COAST_ZONE_M = 'urn:ogc:def:crs:EPSG::6842';

    /**
     * NAD83(2011) / Oregon Columbia River East zone (ft)
     * Extent: USA - Oregon - Columbia River area between approximately 122°03'W and 118°53'W
     * State law defines use of International feet (note: not US survey feet). See NAD83(2011) / Oregon Columbia River
     * East (m) (CRS code 6806) for metric equivalent. Replaces NAD83(CORS96) / Oregon Columbia River East (ft) (CRS
     * code 6805) from 2013-03-08.
     */
    public const EPSG_NAD83_2011_OREGON_COLUMBIA_RIVER_EAST_ZONE_FT = 'urn:ogc:def:crs:EPSG::6807';

    /**
     * NAD83(2011) / Oregon Columbia River East zone (m)
     * Extent: USA - Oregon - Columbia River area between approximately 122°03'W and 118°53'W
     * Replaces NAD83(CORS96) / Oregon Columbia River East (m) (CRS code 6804) from 2013-03-08. See NAD83(2011) /
     * Oregon Columbia River East (ft) (CRS code 6807) for non-metric equivalent.
     */
    public const EPSG_NAD83_2011_OREGON_COLUMBIA_RIVER_EAST_ZONE_M = 'urn:ogc:def:crs:EPSG::6806';

    /**
     * NAD83(2011) / Oregon Columbia River West zone (ft)
     * Extent: USA - Oregon - Columbia River area west of approximately 121°30'W
     * State law defines use of International feet (note: not US survey feet). See NAD83(2011) / Oregon Columbia River
     * West (m) (CRS code 6810) for metric equivalent. Replaces NAD83(CORS96) / Oregon Columbia River West (ft) (CRS
     * code 6809) from 2013-03-08.
     */
    public const EPSG_NAD83_2011_OREGON_COLUMBIA_RIVER_WEST_ZONE_FT = 'urn:ogc:def:crs:EPSG::6811';

    /**
     * NAD83(2011) / Oregon Columbia River West zone (m)
     * Extent: USA - Oregon - Columbia River area west of approximately 121°30'W
     * Replaces NAD83(CORS96) / Oregon Columbia River West (m) (CRS code 6808) from 2013-03-08. See NAD83(2011) /
     * Oregon Columbia River West (ft) (CRS code 6811) for non-metric equivalent.
     */
    public const EPSG_NAD83_2011_OREGON_COLUMBIA_RIVER_WEST_ZONE_M = 'urn:ogc:def:crs:EPSG::6810';

    /**
     * NAD83(2011) / Oregon Cottage Grove-Canyonville zone (ft)
     * Extent: USA - Oregon - Cottage Grove-Canyonville area
     * State law defines use of International feet (note: not US survey feet). See NAD83(2011) / Oregon Cottage
     * Grove-Canyonville (m) (code 6814) for metric equivalent. Replaces NAD83(CORS96) / Oregon Cottage
     * Grove-Canyonville (ft) (code 6813) from 2013-03-08.
     */
    public const EPSG_NAD83_2011_OREGON_COTTAGE_GROVE_CANYONVILLE_ZONE_FT = 'urn:ogc:def:crs:EPSG::6815';

    /**
     * NAD83(2011) / Oregon Cottage Grove-Canyonville zone (m)
     * Extent: USA - Oregon - Cottage Grove-Canyonville area
     * Replaces NAD83(CORS96) / Oregon Cottage Grove-Canyonville (m) (CRS code 6812) from 2013-03-08. See NAD83(2011) /
     * Oregon Cottage Grove-Canyonville (ft) (CRS code 6815) for non-metric equivalent.
     */
    public const EPSG_NAD83_2011_OREGON_COTTAGE_GROVE_CANYONVILLE_ZONE_M = 'urn:ogc:def:crs:EPSG::6814';

    /**
     * NAD83(2011) / Oregon Dayville-Prairie City zone (ft)
     * Extent: USA - Oregon - Dayville-Prairie City area
     * State law defines use of International feet (note: not US survey feet). See NAD83(2011) / Oregon
     * Dayville-Prairie City zone (m) (CRS code 8317) for metric equivalent.
     */
    public const EPSG_NAD83_2011_OREGON_DAYVILLE_PRAIRIE_CITY_ZONE_FT = 'urn:ogc:def:crs:EPSG::8318';

    /**
     * NAD83(2011) / Oregon Dayville-Prairie City zone (m)
     * Extent: USA - Oregon - Dayville-Prairie City area
     * See NAD83(2011) / Oregon Dayville-Prairie City zone (ft) (CRS code 8318) for non-metric equivalent.
     */
    public const EPSG_NAD83_2011_OREGON_DAYVILLE_PRAIRIE_CITY_ZONE_M = 'urn:ogc:def:crs:EPSG::8317';

    /**
     * NAD83(2011) / Oregon Denio-Burns zone (ft)
     * Extent: USA - Oregon - Denio-Burns area
     * State law defines use of International feet (note: not US survey feet). See NAD83(2011) / Oregon Denio-Burns
     * zone (m) (CRS code 8319) for metric equivalent.
     */
    public const EPSG_NAD83_2011_OREGON_DENIO_BURNS_ZONE_FT = 'urn:ogc:def:crs:EPSG::8320';

    /**
     * NAD83(2011) / Oregon Denio-Burns zone (m)
     * Extent: USA - Oregon - Denio-Burns area
     * See NAD83(2011) / Oregon Denio-Burns zone (ft) (CRS code 8320) for non-metric equivalent.
     */
    public const EPSG_NAD83_2011_OREGON_DENIO_BURNS_ZONE_M = 'urn:ogc:def:crs:EPSG::8319';

    /**
     * NAD83(2011) / Oregon Dufur-Madras zone (ft)
     * Extent: USA - Oregon - Dufur-Madras area
     * State law defines use of International feet (note: not US survey feet). See NAD83(2011) / Oregon Dufur-Madras
     * (m) (CRS code 6818) for metric equivalent. Replaces NAD83(CORS96) / Oregon Dufur-Madras (ft) (CRS code 6817)
     * from 2013-03-08.
     */
    public const EPSG_NAD83_2011_OREGON_DUFUR_MADRAS_ZONE_FT = 'urn:ogc:def:crs:EPSG::6819';

    /**
     * NAD83(2011) / Oregon Dufur-Madras zone (m)
     * Extent: USA - Oregon - Dufur-Madras area
     * Replaces NAD83(CORS96) / Oregon Dufur-Madras (m) (CRS code 6816) from 2013-03-08. See NAD83(2011) / Oregon
     * Dufur-Madras (ft) (CRS code 6819) for non-metric equivalent.
     */
    public const EPSG_NAD83_2011_OREGON_DUFUR_MADRAS_ZONE_M = 'urn:ogc:def:crs:EPSG::6818';

    /**
     * NAD83(2011) / Oregon Eugene zone (ft)
     * Extent: USA - Oregon - Eugene area
     * State law defines use of International feet (note: not US survey feet). See NAD83(2011) / Oregon Eugene (m) (CRS
     * code 6822) for metric equivalent. Replaces NAD83(CORS96) / Oregon Eugene (ft) (CRS code 6821) from 2013-03-08.
     */
    public const EPSG_NAD83_2011_OREGON_EUGENE_ZONE_FT = 'urn:ogc:def:crs:EPSG::6823';

    /**
     * NAD83(2011) / Oregon Eugene zone (m)
     * Extent: USA - Oregon - Eugene area
     * Replaces NAD83(CORS96) / Oregon Eugene (m) (CRS code 6820) from 2013-03-08. See NAD83(2011) / Oregon Eugene (ft)
     * (CRS code 6823) for non-metric equivalent.
     */
    public const EPSG_NAD83_2011_OREGON_EUGENE_ZONE_M = 'urn:ogc:def:crs:EPSG::6822';

    /**
     * NAD83(2011) / Oregon GIC Lambert (ft)
     * Extent: USA - Oregon
     * State law defines use of International feet (note: not US survey feet). Replaces NAD83(CORS96) / Oregon GIC
     * Lambert (ft) and NAD83(NSRS2007) / Oregon GIC Lambert (ft) (CRS codes 3644 and 6868).
     */
    public const EPSG_NAD83_2011_OREGON_GIC_LAMBERT_FT = 'urn:ogc:def:crs:EPSG::6557';

    /**
     * NAD83(2011) / Oregon Grants Pass-Ashland zone (ft)
     * Extent: USA - Oregon - Grants Pass-Ashland area
     * State law defines use of International feet (note: not US survey feet). See NAD83(2011) / Oregon Grants
     * Pass-Ashland (m) (CRS code 6826) for metric equivalent. Replaces NAD83(CORS96) / Oregon Grants Pass-Ashland (ft)
     * (CRS code 6825) from 2013-03-08.
     */
    public const EPSG_NAD83_2011_OREGON_GRANTS_PASS_ASHLAND_ZONE_FT = 'urn:ogc:def:crs:EPSG::6827';

    /**
     * NAD83(2011) / Oregon Grants Pass-Ashland zone (m)
     * Extent: USA - Oregon - Grants Pass-Ashland area
     * Replaces NAD83(CORS96) / Oregon Grants Pass-Ashland (m) (CRS code 6824) from 2013-03-08. See NAD83(2011) /
     * Oregon Grants Pass-Ashland (ft) (CRS code 6827) for non-metric equivalent.
     */
    public const EPSG_NAD83_2011_OREGON_GRANTS_PASS_ASHLAND_ZONE_M = 'urn:ogc:def:crs:EPSG::6826';

    /**
     * NAD83(2011) / Oregon Gresham-Warm Springs zone (ft)
     * Extent: USA - Oregon - Gresham-Warm Springs area
     * State law defines use of International feet (note: not US survey feet). See NAD83(2011) / Oregon Gresham-Warm
     * Springs (m) (CRS code 6830) for metric equivalent. Replaces NAD83(CORS96) / Oregon Gresham-Warm Springs (ft)
     * (CRS code 6829) from 2013-03-08.
     */
    public const EPSG_NAD83_2011_OREGON_GRESHAM_WARM_SPRINGS_ZONE_FT = 'urn:ogc:def:crs:EPSG::6831';

    /**
     * NAD83(2011) / Oregon Gresham-Warm Springs zone (m)
     * Extent: USA - Oregon - Gresham-Warm Springs area
     * Replaces NAD83(CORS96) / Oregon Gresham-Warm Springs (m) (CRS code 6828) from 2013-03-08. See NAD83(2011) /
     * Oregon Gresham-Warm Springs (ft) (CRS code 6831) for non-metric equivalent.
     */
    public const EPSG_NAD83_2011_OREGON_GRESHAM_WARM_SPRINGS_ZONE_M = 'urn:ogc:def:crs:EPSG::6830';

    /**
     * NAD83(2011) / Oregon Halfway zone (ft)
     * Extent: USA - Oregon - Halfway area
     * State law defines use of International feet (note: not US survey feet). See NAD83(2011) / Oregon Halfway zone
     * (m) (CRS code 8321) for metric equivalent.
     */
    public const EPSG_NAD83_2011_OREGON_HALFWAY_ZONE_FT = 'urn:ogc:def:crs:EPSG::8322';

    /**
     * NAD83(2011) / Oregon Halfway zone (m)
     * Extent: USA - Oregon - Halfway area
     * See NAD83(2011) / Oregon Halfway zone (ft) (CRS code 8322) for non-metric equivalent.
     */
    public const EPSG_NAD83_2011_OREGON_HALFWAY_ZONE_M = 'urn:ogc:def:crs:EPSG::8321';

    /**
     * NAD83(2011) / Oregon LCC (m)
     * Extent: USA - Oregon
     * Replaces NAD83(CORS96) / Oregon LCC (m) and NAD83(NSRS2007) / Oregon LCC (m) (CRS codes 6867 and 3643). See CRS
     * code 6557 for non-metric definition used by state agencies.
     */
    public const EPSG_NAD83_2011_OREGON_LCC_M = 'urn:ogc:def:crs:EPSG::6556';

    /**
     * NAD83(2011) / Oregon La Grande zone (ft)
     * Extent: USA - Oregon - La Grande area
     * State law defines use of International feet (note: not US survey feet). See NAD83(2011) / Oregon La Grande (m)
     * (CRS code 6834) for metric equivalent. Replaces NAD83(CORS96) / Oregon La Grande (ft) (CRS code 6833) from
     * 2013-03-08.
     */
    public const EPSG_NAD83_2011_OREGON_LA_GRANDE_ZONE_FT = 'urn:ogc:def:crs:EPSG::6835';

    /**
     * NAD83(2011) / Oregon La Grande zone (m)
     * Extent: USA - Oregon - La Grande area
     * Replaces NAD83(CORS96) / Oregon La Grande (m) (CRS code 6832) from 2013-03-08. See NAD83(2011) / Oregon La
     * Grande (ft) (CRS code 6835) for non-metric equivalent.
     */
    public const EPSG_NAD83_2011_OREGON_LA_GRANDE_ZONE_M = 'urn:ogc:def:crs:EPSG::6834';

    /**
     * NAD83(2011) / Oregon Medford-Diamond Lake zone (ft)
     * Extent: USA - Oregon - Medford-Diamond Lake area
     * State law defines use of International feet (note: not US survey feet). See NAD83(2011) / Oregon Medford-Diamond
     * Lake zone (m) (CRS code 8323) for metric equivalent.
     */
    public const EPSG_NAD83_2011_OREGON_MEDFORD_DIAMOND_LAKE_ZONE_FT = 'urn:ogc:def:crs:EPSG::8324';

    /**
     * NAD83(2011) / Oregon Medford-Diamond Lake zone (m)
     * Extent: USA - Oregon - Medford-Diamond Lake area
     * See NAD83(2011) / Oregon Medford-Diamond Lake zone (ft) (CRS code 8324) for non-metric equivalent.
     */
    public const EPSG_NAD83_2011_OREGON_MEDFORD_DIAMOND_LAKE_ZONE_M = 'urn:ogc:def:crs:EPSG::8323';

    /**
     * NAD83(2011) / Oregon Mitchell zone (ft)
     * Extent: USA - Oregon - Mitchell area
     * State law defines use of International feet (note: not US survey feet). See NAD83(2011) / Oregon Mitchell zone
     * (m) (CRS code 8325) for metric equivalent.
     */
    public const EPSG_NAD83_2011_OREGON_MITCHELL_ZONE_FT = 'urn:ogc:def:crs:EPSG::8326';

    /**
     * NAD83(2011) / Oregon Mitchell zone (m)
     * Extent: USA - Oregon - Mitchell area
     * See NAD83(2011) / Oregon Mitchell zone (ft) (CRS code 8326) for non-metric equivalent.
     */
    public const EPSG_NAD83_2011_OREGON_MITCHELL_ZONE_M = 'urn:ogc:def:crs:EPSG::8325';

    /**
     * NAD83(2011) / Oregon North
     * Extent: USA - Oregon - counties of Baker; Benton; Clackamas; Clatsop; Columbia; Gilliam; Grant; Hood River;
     * Jefferson; Lincoln; Linn; Marion; Morrow; Multnomah; Polk; Sherman; Tillamook; Umatilla; Union; Wallowa; Wasco;
     * Washington; Wheeler; Yamhill
     * State law defines use of International feet (note: not US survey feet). See code 6559 for equivalent non-metric
     * definition. Replaces NAD83(CORS96) / Oregon North and NAD83(NSRS2007) / Oregon North (CRS codes 6884 and 3645).
     */
    public const EPSG_NAD83_2011_OREGON_NORTH = 'urn:ogc:def:crs:EPSG::6558';

    /**
     * NAD83(2011) / Oregon North (ft)
     * Extent: USA - Oregon - counties of Baker; Benton; Clackamas; Clatsop; Columbia; Gilliam; Grant; Hood River;
     * Jefferson; Lincoln; Linn; Marion; Morrow; Multnomah; Polk; Sherman; Tillamook; Umatilla; Union; Wallowa; Wasco;
     * Washington; Wheeler; Yamhill
     * State law defines use of International feet (note: not US survey feet). Federal definition is metric - see code
     * 6558. Replaces NAD83(CORS96) / Oregon North (ft) and NAD83(NSRS2007) / Oregon North (ft) (CRS codes 6885 and
     * 3646).
     */
    public const EPSG_NAD83_2011_OREGON_NORTH_FT = 'urn:ogc:def:crs:EPSG::6559';

    /**
     * NAD83(2011) / Oregon North Central zone (ft)
     * Extent: USA - Oregon - North Central area
     * State law defines use of International feet (note: not US survey feet). See NAD83(2011) / Oregon North Central
     * zone (m) (CRS code 8327) for metric equivalent.
     */
    public const EPSG_NAD83_2011_OREGON_NORTH_CENTRAL_ZONE_FT = 'urn:ogc:def:crs:EPSG::8328';

    /**
     * NAD83(2011) / Oregon North Central zone (m)
     * Extent: USA - Oregon - North Central area
     * See NAD83(2011) / Oregon North Central zone (ft) (CRS code 8328) for non-metric equivalent.
     */
    public const EPSG_NAD83_2011_OREGON_NORTH_CENTRAL_ZONE_M = 'urn:ogc:def:crs:EPSG::8327';

    /**
     * NAD83(2011) / Oregon Ochoco Summit zone (ft)
     * Extent: USA - Oregon - Ochoco Summit area
     * State law defines use of International feet (note: not US survey feet). See NAD83(2011) / Oregon Ochoco Summit
     * zone (m) (CRS code 8329) for metric equivalent.
     */
    public const EPSG_NAD83_2011_OREGON_OCHOCO_SUMMIT_ZONE_FT = 'urn:ogc:def:crs:EPSG::8330';

    /**
     * NAD83(2011) / Oregon Ochoco Summit zone (m)
     * Extent: USA - Oregon - Ochoco Summit area
     * See NAD83(2011) / Oregon Ochoco Summit zone (ft) (CRS code 8330) for non-metric equivalent.
     */
    public const EPSG_NAD83_2011_OREGON_OCHOCO_SUMMIT_ZONE_M = 'urn:ogc:def:crs:EPSG::8329';

    /**
     * NAD83(2011) / Oregon Ontario zone (ft)
     * Extent: USA - Oregon - Ontario area
     * State law defines use of International feet (note: not US survey feet). See NAD83(2011) / Oregon Ontario (m)
     * (CRS code 6838) for metric equivalent. Replaces NAD83(CORS96) / Oregon Ontario (ft) (CRS code 6837) from
     * 2013-03-08.
     */
    public const EPSG_NAD83_2011_OREGON_ONTARIO_ZONE_FT = 'urn:ogc:def:crs:EPSG::6839';

    /**
     * NAD83(2011) / Oregon Ontario zone (m)
     * Extent: USA - Oregon - Ontario area
     * Replaces NAD83(CORS96) / Oregon Ontario (m) (CRS code 6836) from 2013-03-08. See NAD83(2011) / Oregon Ontario
     * (ft) (CRS code 6839) for non-metric equivalent.
     */
    public const EPSG_NAD83_2011_OREGON_ONTARIO_ZONE_M = 'urn:ogc:def:crs:EPSG::6838';

    /**
     * NAD83(2011) / Oregon Owyhee zone (ft)
     * Extent: USA - Oregon - Owyhee area
     * State law defines use of International feet (note: not US survey feet). See NAD83(2011) / Oregon Owyhee zone (m)
     * (CRS code 8331) for metric equivalent.
     */
    public const EPSG_NAD83_2011_OREGON_OWYHEE_ZONE_FT = 'urn:ogc:def:crs:EPSG::8332';

    /**
     * NAD83(2011) / Oregon Owyhee zone (m)
     * Extent: USA - Oregon - Owyhee area
     * See NAD83(2011) / Oregon Owyhee zone (ft) (CRS code 8332) for non-metric equivalent.
     */
    public const EPSG_NAD83_2011_OREGON_OWYHEE_ZONE_M = 'urn:ogc:def:crs:EPSG::8331';

    /**
     * NAD83(2011) / Oregon Pendleton zone (ft)
     * Extent: USA - Oregon - Pendleton area
     * State law defines use of International feet (note: not US survey feet). See NAD83(2011) / Oregon Pendleton (m)
     * (CRS code 6846) for metric equivalent. Replaces NAD83(CORS96) / Oregon Pendleton (ft) (CRS code 6845) from
     * 2013-03-08.
     */
    public const EPSG_NAD83_2011_OREGON_PENDLETON_ZONE_FT = 'urn:ogc:def:crs:EPSG::6847';

    /**
     * NAD83(2011) / Oregon Pendleton zone (m)
     * Extent: USA - Oregon - Pendleton area
     * Replaces NAD83(CORS96) / Oregon Pendleton (m) (CRS code 6844) from 2013-03-08. See NAD83(2011) / Oregon
     * Pendleton (ft) (CRS code 6847) for non-metric equivalent.
     */
    public const EPSG_NAD83_2011_OREGON_PENDLETON_ZONE_M = 'urn:ogc:def:crs:EPSG::6846';

    /**
     * NAD83(2011) / Oregon Pendleton-La Grande zone (ft)
     * Extent: USA - Oregon - Pendleton-La Grande area
     * State law defines use of International feet (note: not US survey feet). See NAD83(2011) / Oregon Pendleton-La
     * Grande (m) (CRS code 6850) for metric equivalent. Replaces NAD83(CORS96) / Oregon Pendleton-La Grande (ft) (CRS
     * code 6849) from 2013-03-08.
     */
    public const EPSG_NAD83_2011_OREGON_PENDLETON_LA_GRANDE_ZONE_FT = 'urn:ogc:def:crs:EPSG::6851';

    /**
     * NAD83(2011) / Oregon Pendleton-La Grande zone (m)
     * Extent: USA - Oregon - Pendleton-La Grande area
     * Replaces NAD83(CORS96) / Oregon Pendleton-La Grande (m) (CRS code 6848) from 2013-03-08. See NAD83(2011) /
     * Oregon Pendleton-La Grande (ft) (CRS code 6851) for non-metric equivalent.
     */
    public const EPSG_NAD83_2011_OREGON_PENDLETON_LA_GRANDE_ZONE_M = 'urn:ogc:def:crs:EPSG::6850';

    /**
     * NAD83(2011) / Oregon Pilot Rock-Ukiah zone (ft)
     * Extent: USA - Oregon - Pilot Rock-Ukiah area
     * State law defines use of International feet (note: not US survey feet). See NAD83(2011) / Oregon Pilot
     * Rock-Ukiah zone (m) (CRS code 8333) for metric equivalent.
     */
    public const EPSG_NAD83_2011_OREGON_PILOT_ROCK_UKIAH_ZONE_FT = 'urn:ogc:def:crs:EPSG::8334';

    /**
     * NAD83(2011) / Oregon Pilot Rock-Ukiah zone (m)
     * Extent: USA - Oregon - Pilot Rock-Ukiah area
     * See NAD83(2011) / Oregon Pilot Rock-Ukiah zone (ft) (CRS code 8334) for non-metric equivalent.
     */
    public const EPSG_NAD83_2011_OREGON_PILOT_ROCK_UKIAH_ZONE_M = 'urn:ogc:def:crs:EPSG::8333';

    /**
     * NAD83(2011) / Oregon Portland zone (ft)
     * Extent: USA - Oregon - Portland area
     * State law defines use of International feet (note: not US survey feet). See NAD83(2011) / Oregon Portland (m)
     * (CRS code 6854) for metric equivalent. Replaces NAD83(CORS96) / Oregon Portland (ft) (CRS code 6853) from
     * 2013-03-08.
     */
    public const EPSG_NAD83_2011_OREGON_PORTLAND_ZONE_FT = 'urn:ogc:def:crs:EPSG::6855';

    /**
     * NAD83(2011) / Oregon Portland zone (m)
     * Extent: USA - Oregon - Portland area
     * Replaces NAD83(CORS96) / Oregon Portland (m) (CRS code 6852) from 2013-03-08. See NAD83(2011) / Oregon Portland
     * (ft) (CRS code 6855) for non-metric equivalent.
     */
    public const EPSG_NAD83_2011_OREGON_PORTLAND_ZONE_M = 'urn:ogc:def:crs:EPSG::6854';

    /**
     * NAD83(2011) / Oregon Prairie City-Brogan zone (ft)
     * Extent: USA - Oregon - Prairie City-Brogan area
     * State law defines use of International feet (note: not US survey feet). See NAD83(2011) / Oregon Prairie
     * City-Brogan zone (m) (CRS code 8335) for metric equivalent.
     */
    public const EPSG_NAD83_2011_OREGON_PRAIRIE_CITY_BROGAN_ZONE_FT = 'urn:ogc:def:crs:EPSG::8336';

    /**
     * NAD83(2011) / Oregon Prairie City-Brogan zone (m)
     * Extent: USA - Oregon - Prairie City-Brogan area
     * See NAD83(2011) / Oregon Prairie City-Brogan zone (ft) (CRS code 8336) for non-metric equivalent.
     */
    public const EPSG_NAD83_2011_OREGON_PRAIRIE_CITY_BROGAN_ZONE_M = 'urn:ogc:def:crs:EPSG::8335';

    /**
     * NAD83(2011) / Oregon Riley-Lakeview zone (ft)
     * Extent: USA - Oregon - Riley-Lakeview area
     * State law defines use of International feet (note: not US survey feet). See NAD83(2011) / Oregon Riley-Lakeview
     * zone (m) (CRS code 8337) for metric equivalent.
     */
    public const EPSG_NAD83_2011_OREGON_RILEY_LAKEVIEW_ZONE_FT = 'urn:ogc:def:crs:EPSG::8338';

    /**
     * NAD83(2011) / Oregon Riley-Lakeview zone (m)
     * Extent: USA - Oregon - Riley-Lakeview area
     * See NAD83(2011) / Oregon Riley-Lakeview zone (ft) (CRS code 8338) for non-metric equivalent.
     */
    public const EPSG_NAD83_2011_OREGON_RILEY_LAKEVIEW_ZONE_M = 'urn:ogc:def:crs:EPSG::8337';

    /**
     * NAD83(2011) / Oregon Salem zone (ft)
     * Extent: USA - Oregon - Salem area
     * State law defines use of International feet (note: not US survey feet). See NAD83(2011) / Oregon Salem (m) (CRS
     * code 6858) for metric equivalent. Replaces NAD83(CORS96) / Oregon Salem (ft) (CRS code 6857) from 2013-03-08.
     */
    public const EPSG_NAD83_2011_OREGON_SALEM_ZONE_FT = 'urn:ogc:def:crs:EPSG::6859';

    /**
     * NAD83(2011) / Oregon Salem zone (m)
     * Extent: USA - Oregon - Salem area
     * Replaces NAD83(CORS96) / Oregon Salem (m) (CRS code 6856) from 2013-03-08. See NAD83(2011) / Oregon Salem (ft)
     * (CRS code 6859) for non-metric equivalent.
     */
    public const EPSG_NAD83_2011_OREGON_SALEM_ZONE_M = 'urn:ogc:def:crs:EPSG::6858';

    /**
     * NAD83(2011) / Oregon Santiam Pass zone (ft)
     * Extent: USA - Oregon - Sweet Home-Santiam Pass-Sisters area
     * State law defines use of International feet (note: not US survey feet). See NAD83(2011) / Oregon Santiam Pass
     * (m) (CRS code 6862) for metric equivalent. Replaces NAD83(CORS96) / Oregon Santiam Pass (ft) (CRS code 6861)
     * from 2013-03-08.
     */
    public const EPSG_NAD83_2011_OREGON_SANTIAM_PASS_ZONE_FT = 'urn:ogc:def:crs:EPSG::6863';

    /**
     * NAD83(2011) / Oregon Santiam Pass zone (m)
     * Extent: USA - Oregon - Sweet Home-Santiam Pass-Sisters area
     * Replaces NAD83(CORS96) / Oregon Santiam Pass (m) (CRS code 6860) from 2013-03-08. See NAD83(2011) / Oregon
     * Santiam Pass (ft) (CRS code 6863) for non-metric equivalent.
     */
    public const EPSG_NAD83_2011_OREGON_SANTIAM_PASS_ZONE_M = 'urn:ogc:def:crs:EPSG::6862';

    /**
     * NAD83(2011) / Oregon Siskiyou Pass zone (ft)
     * Extent: USA - Oregon - Siskiyou Pass area
     * State law defines use of International feet (note: not US survey feet). See NAD83(2011) / Oregon Siskiyou Pass
     * zone (m) (CRS code 8339) for metric equivalent.
     */
    public const EPSG_NAD83_2011_OREGON_SISKIYOU_PASS_ZONE_FT = 'urn:ogc:def:crs:EPSG::8340';

    /**
     * NAD83(2011) / Oregon Siskiyou Pass zone (m)
     * Extent: USA - Oregon - Siskiyou Pass area
     * See NAD83(2011) / Oregon Siskiyou Pass zone (ft) (CRS code 8340) for non-metric equivalent.
     */
    public const EPSG_NAD83_2011_OREGON_SISKIYOU_PASS_ZONE_M = 'urn:ogc:def:crs:EPSG::8339';

    /**
     * NAD83(2011) / Oregon South
     * Extent: USA - Oregon - counties of Coos; Crook; Curry; Deschutes; Douglas; Harney; Jackson; Josephine; Klamath;
     * Lake; Lane; Malheur
     * State law defines use of International feet (note: not US survey feet). See code 6561 for equivalent non-metric
     * definition. Replaces NAD83(CORS96) / Oregon South and NAD83(NSRS2007) / Oregon South (CRS codes 6886 and 3647).
     */
    public const EPSG_NAD83_2011_OREGON_SOUTH = 'urn:ogc:def:crs:EPSG::6560';

    /**
     * NAD83(2011) / Oregon South (ft)
     * Extent: USA - Oregon - counties of Coos; Crook; Curry; Deschutes; Douglas; Harney; Jackson; Josephine; Klamath;
     * Lake; Lane; Malheur
     * State law defines use of International feet (note: not US survey feet). Federal definition is metric - see code
     * 6560. Replaces NAD83(CORS96) / Oregon South (ft) and NAD83(NSRS2007) / Oregon South (ft) (CRS codes 6887 and
     * 3648).
     */
    public const EPSG_NAD83_2011_OREGON_SOUTH_FT = 'urn:ogc:def:crs:EPSG::6561';

    /**
     * NAD83(2011) / Oregon Ukiah-Fox zone (ft)
     * Extent: USA - Oregon - Ukiah-Fox area
     * State law defines use of International feet (note: not US survey feet). See NAD83(2011) / Oregon Ukiah-Fox zone
     * (m) (CRS code 8341) for metric equivalent.
     */
    public const EPSG_NAD83_2011_OREGON_UKIAH_FOX_ZONE_FT = 'urn:ogc:def:crs:EPSG::8342';

    /**
     * NAD83(2011) / Oregon Ukiah-Fox zone (m)
     * Extent: USA - Oregon - Ukiah-Fox area
     * See NAD83(2011) / Oregon Ukiah-Fox zone (ft) (CRS code 8342) for non-metric equivalent.
     */
    public const EPSG_NAD83_2011_OREGON_UKIAH_FOX_ZONE_M = 'urn:ogc:def:crs:EPSG::8341';

    /**
     * NAD83(2011) / Oregon Wallowa zone (ft)
     * Extent: USA - Oregon - Wallowa area
     * State law defines use of International feet (note: not US survey feet). See NAD83(2011) / Oregon Wallowa zone
     * (m) (CRS code 8343) for metric equivalent.
     */
    public const EPSG_NAD83_2011_OREGON_WALLOWA_ZONE_FT = 'urn:ogc:def:crs:EPSG::8344';

    /**
     * NAD83(2011) / Oregon Wallowa zone (m)
     * Extent: USA - Oregon - Wallowa area
     * See NAD83(2011) / Oregon Wallowa zone (ft) (CRS code 8344) for non-metric equivalent.
     */
    public const EPSG_NAD83_2011_OREGON_WALLOWA_ZONE_M = 'urn:ogc:def:crs:EPSG::8343';

    /**
     * NAD83(2011) / Oregon Warner Highway zone (ft)
     * Extent: USA - Oregon - Warner Highway area
     * State law defines use of International feet (note: not US survey feet). See NAD83(2011) / Oregon Warner Highway
     * zone (m) (CRS code 8345) for metric equivalent.
     */
    public const EPSG_NAD83_2011_OREGON_WARNER_HIGHWAY_ZONE_FT = 'urn:ogc:def:crs:EPSG::8346';

    /**
     * NAD83(2011) / Oregon Warner Highway zone (m)
     * Extent: USA - Oregon - Warner Highway area
     * See NAD83(2011) / Oregon Warner Highway zone (ft) (CRS code 8346) for non-metric equivalent.
     */
    public const EPSG_NAD83_2011_OREGON_WARNER_HIGHWAY_ZONE_M = 'urn:ogc:def:crs:EPSG::8345';

    /**
     * NAD83(2011) / Oregon Willamette Pass zone (ft)
     * Extent: USA - Oregon - Willamette Pass area
     * State law defines use of International feet (note: not US survey feet). See NAD83(2011) / Oregon Willamette Pass
     * zone (m) (CRS code 8347) for metric equivalent.
     */
    public const EPSG_NAD83_2011_OREGON_WILLAMETTE_PASS_ZONE_FT = 'urn:ogc:def:crs:EPSG::8348';

    /**
     * NAD83(2011) / Oregon Willamette Pass zone (m)
     * Extent: USA - Oregon - Willamette Pass area
     * See NAD83(2011) / Oregon Willamette Pass zone (ft) (CRS code 8348) for non-metric equivalent.
     */
    public const EPSG_NAD83_2011_OREGON_WILLAMETTE_PASS_ZONE_M = 'urn:ogc:def:crs:EPSG::8347';

    /**
     * NAD83(2011) / PCCS zone 1 (ft)
     * Extent: USA - Arizona - Pima county - east of the township line between ranges R7E and R8E, Gila and Salt River
     * Meridian (east of approximately 111°34'W)
     * Grid unit is International feet (note: not US Survey feet).
     */
    public const EPSG_NAD83_2011_PCCS_ZONE_1_FT = 'urn:ogc:def:crs:EPSG::8065';

    /**
     * NAD83(2011) / PCCS zone 2 (ft)
     * Extent: USA - Arizona - Pima county - between the township line between ranges R2W and R3W and the township line
     * between ranges R7E and R8E, Gila and Salt River Meridian (between approximately 112°31'W and 111°34'W)
     * Grid unit is International feet (note: not US Survey feet).
     */
    public const EPSG_NAD83_2011_PCCS_ZONE_2_FT = 'urn:ogc:def:crs:EPSG::8066';

    /**
     * NAD83(2011) / PCCS zone 3 (ft)
     * Extent: USA - Arizona - Pima county - west of the township line between ranges R2W and R3W, Gila and Salt River
     * Meridian (west of approximately 112°31'W)
     * Grid unit is International feet (note: not US Survey feet).
     */
    public const EPSG_NAD83_2011_PCCS_ZONE_3_FT = 'urn:ogc:def:crs:EPSG::8067';

    /**
     * NAD83(2011) / PCCS zone 4 (ft)
     * Extent: USA - Arizona - Pima county - Catalina Highway corridor between Mt. Lemmon and Willow Canyon
     * Grid unit is International feet (note: not US Survey feet).
     */
    public const EPSG_NAD83_2011_PCCS_ZONE_4_FT = 'urn:ogc:def:crs:EPSG::8068';

    /**
     * NAD83(2011) / Pennsylvania North
     * Extent: USA - Pennsylvania - counties of Bradford; Cameron; Carbon; Centre; Clarion; Clearfield; Clinton;
     * Columbia; Crawford; Elk; Erie; Forest; Jefferson; Lackawanna; Luzerne; Lycoming; McKean; Mercer; Monroe;
     * Montour; Northumberland; Pike; Potter; Sullivan; Susquehanna; Tioga; Union; Venango; Warren; Wayne; Wyoming
     * State law defines use of US survey feet. See code 6563 for equivalent non-metric definition. Replaces
     * NAD83(NSRS2007) / Pennsylvania North (CRS code 3649).
     */
    public const EPSG_NAD83_2011_PENNSYLVANIA_NORTH = 'urn:ogc:def:crs:EPSG::6562';

    /**
     * NAD83(2011) / Pennsylvania North (ftUS)
     * Extent: USA - Pennsylvania - counties of Bradford; Cameron; Carbon; Centre; Clarion; Clearfield; Clinton;
     * Columbia; Crawford; Elk; Erie; Forest; Jefferson; Lackawanna; Luzerne; Lycoming; McKean; Mercer; Monroe;
     * Montour; Northumberland; Pike; Potter; Sullivan; Susquehanna; Tioga; Union; Venango; Warren; Wayne; Wyoming
     * State law defines use of US survey feet. Federal definition is metric - see code 6562. Replaces NAD83(NSRS2007)
     * / Pennsylvania North (ftUS) (CRS code 3650).
     */
    public const EPSG_NAD83_2011_PENNSYLVANIA_NORTH_FTUS = 'urn:ogc:def:crs:EPSG::6563';

    /**
     * NAD83(2011) / Pennsylvania South
     * Extent: USA - Pennsylvania - counties of Adams; Allegheny; Armstrong; Beaver; Bedford; Berks; Blair; Bucks;
     * Butler; Cambria; Chester; Cumberland; Dauphin; Delaware; Fayette; Franklin; Fulton; Greene; Huntingdon; Indiana;
     * Juniata; Lancaster; Lawrence; Lebanon; Lehigh; Mifflin; Montgomery; Northampton; Perry; Philadelphia;
     * Schuylkill; Snyder; Somerset; Washington; Westmoreland; York
     * State law defines use of US survey feet. See code 6565 for equivalent non-metric definition. Replaces
     * NAD83(NSRS2007) / Pennsylvania South (CRS code 3651).
     */
    public const EPSG_NAD83_2011_PENNSYLVANIA_SOUTH = 'urn:ogc:def:crs:EPSG::6564';

    /**
     * NAD83(2011) / Pennsylvania South (ftUS)
     * Extent: USA - Pennsylvania - counties of Adams; Allegheny; Armstrong; Beaver; Bedford; Berks; Blair; Bucks;
     * Butler; Cambria; Chester; Cumberland; Dauphin; Delaware; Fayette; Franklin; Fulton; Greene; Huntingdon; Indiana;
     * Juniata; Lancaster; Lawrence; Lebanon; Lehigh; Mifflin; Montgomery; Northampton; Perry; Philadelphia;
     * Schuylkill; Snyder; Somerset; Washington; Westmoreland; York
     * State law defines use of US survey feet. Federal definition is metric - see code 6564. Replaces NAD83(NSRS2007)
     * / Pennsylvania South (ftUS) (CRS code 3652).
     */
    public const EPSG_NAD83_2011_PENNSYLVANIA_SOUTH_FTUS = 'urn:ogc:def:crs:EPSG::6565';

    /**
     * NAD83(2011) / Puerto Rico and Virgin Is.
     * Extent: Puerto Rico and US Virgin Islands - onshore
     * Replaces NAD83(CORS96) / Puerto Rico and Virgin Is. (CRS code 6307) and NAD83(NSRS2007) / Puerto Rico and Virgin
     * Is. (CRS code 4437).
     */
    public const EPSG_NAD83_2011_PUERTO_RICO_AND_VIRGIN_IS = 'urn:ogc:def:crs:EPSG::6566';

    /**
     * NAD83(2011) / RMTCRS Billings (ft)
     * Extent: USA - Montana - Billings area
     * In area overlapping adjacent zones refer to distortion maps in RMTCRS User Guide to choose system. Working unit
     * is International feet (note: not US survey feet). See NAD83(2011) / RMTCRS Billings (m) (CRS code 7117) for
     * metric equivalent.
     */
    public const EPSG_NAD83_2011_RMTCRS_BILLINGS_FT = 'urn:ogc:def:crs:EPSG::7127';

    /**
     * NAD83(2011) / RMTCRS Billings (m)
     * Extent: USA - Montana - Billings area
     * See NAD83(2011) / RMTCRS Billings (ft) (CRS code 7127) for non-metric equivalent. In area overlapping adjacent
     * zones refer to distortion maps in RMTCRS User Guide to choose system.
     */
    public const EPSG_NAD83_2011_RMTCRS_BILLINGS_M = 'urn:ogc:def:crs:EPSG::7117';

    /**
     * NAD83(2011) / RMTCRS Blackfeet (ft)
     * Extent: USA - Montana - Blackfeet Indian Reservation
     * IIn area overlapping adjacent zones refer to distortion maps in RMTCRS User Guide to choose system. Working unit
     * is International feet (note: not US survey feet). See NAD83(2011) / RMTCRS Blackfeet (m) (CRS code 7110) for
     * metric equivalent.
     */
    public const EPSG_NAD83_2011_RMTCRS_BLACKFEET_FT = 'urn:ogc:def:crs:EPSG::7120';

    /**
     * NAD83(2011) / RMTCRS Blackfeet (m)
     * Extent: USA - Montana - Blackfeet Indian Reservation
     * See NAD83(2011) / RMTCRS Blackfeet (ft) (CRS code 7120) for non-metric equivalent. In area overlapping adjacent
     * zones refer to distortion maps in RMTCRS User Guide to choose system.
     */
    public const EPSG_NAD83_2011_RMTCRS_BLACKFEET_M = 'urn:ogc:def:crs:EPSG::7110';

    /**
     * NAD83(2011) / RMTCRS Bobcat (ft)
     * Extent: USA - Montana - Three Forks area
     * Working unit is International feet (note: not US survey feet). See NAD83(2011) / RMTCRS Bobcat (m) (CRS code
     * 7116) for metric equivalent.
     */
    public const EPSG_NAD83_2011_RMTCRS_BOBCAT_FT = 'urn:ogc:def:crs:EPSG::7126';

    /**
     * NAD83(2011) / RMTCRS Bobcat (m)
     * Extent: USA - Montana - Three Forks area
     * See NAD83(2011) / RMTCRS Bobcat (ft) (CRS code 7126) for non-metric equivalent.
     */
    public const EPSG_NAD83_2011_RMTCRS_BOBCAT_M = 'urn:ogc:def:crs:EPSG::7116';

    /**
     * NAD83(2011) / RMTCRS Crow (ft)
     * Extent: USA - Montana - Crow Indian Reservation
     * In area overlapping adjacent zones refer to distortion maps in RMTCRS User Guide to choose system. Working unit
     * is International feet (note: not US survey feet). See NAD83(2011) / RMTCRS Crow (m) (CRS code 7115) for metric
     * equivalent.
     */
    public const EPSG_NAD83_2011_RMTCRS_CROW_FT = 'urn:ogc:def:crs:EPSG::7125';

    /**
     * NAD83(2011) / RMTCRS Crow (m)
     * Extent: USA - Montana - Crow Indian Reservation
     * See NAD83(2011) / RMTCRS Crow (ft) (CRS code 7125) for non-metric equivalent. In area overlapping adjacent zones
     * refer to distortion maps in RMTCRS User Guide to choose system.
     */
    public const EPSG_NAD83_2011_RMTCRS_CROW_M = 'urn:ogc:def:crs:EPSG::7115';

    /**
     * NAD83(2011) / RMTCRS Fort Belknap (ft)
     * Extent: USA - Montana - Fort Belknap Indian Reservation area
     * In area overlapping adjacent zones refer to distortion maps in RMTCRS User Guide. Working unit is International
     * feet (note: not US survey feet). See NAD83(2011) / RMTCRS Fort Belknap (m) (CRS code 7112) for metric
     * equivalent.
     */
    public const EPSG_NAD83_2011_RMTCRS_FORT_BELKNAP_FT = 'urn:ogc:def:crs:EPSG::7122';

    /**
     * NAD83(2011) / RMTCRS Fort Belknap (m)
     * Extent: USA - Montana - Fort Belknap Indian Reservation area
     * See NAD83(2011) / RMTCRS Fort Belknap (ft) (CRS code 7122) for non-metric equivalent. In area overlapping
     * adjacent zones refer to distortion maps in RMTCRS User Guide.
     */
    public const EPSG_NAD83_2011_RMTCRS_FORT_BELKNAP_M = 'urn:ogc:def:crs:EPSG::7112';

    /**
     * NAD83(2011) / RMTCRS Fort Peck Assiniboine (ft)
     * Extent: USA - Montana - Fort Peck Indian Reservation - higher areas, notably in west and north
     * In area overlapping adjacent zones refer to distortion maps in RMTCRS User Guide to choose system. Working unit
     * is International feet (note: not US survey feet). See NAD83(2011) / RMTCRS Fort Peck Assiniboine (m) (CRS code
     * 7113) for metric equivalent.
     */
    public const EPSG_NAD83_2011_RMTCRS_FORT_PECK_ASSINIBOINE_FT = 'urn:ogc:def:crs:EPSG::7123';

    /**
     * NAD83(2011) / RMTCRS Fort Peck Assiniboine (m)
     * Extent: USA - Montana - Fort Peck Indian Reservation - higher areas, notably in west and north
     * See NAD83(2011) / RMTCRS Fort Peck Assiniboine (ft) (CRS code 7123) for non-metric equivalent. In area
     * overlapping adjacent zones refer to distortion maps in RMTCRS User Guide to choose system.
     */
    public const EPSG_NAD83_2011_RMTCRS_FORT_PECK_ASSINIBOINE_M = 'urn:ogc:def:crs:EPSG::7113';

    /**
     * NAD83(2011) / RMTCRS Fort Peck Sioux (ft)
     * Extent: USA - Montana - Fort Peck Indian Reservation - lower areas, notably in south and east
     * In area overlapping adjacent zones refer to distortion maps in RMTCRS User Guide to choose system. Working unit
     * is International feet (note: not US survey feet). See NAD83(2011) / RMTCRS Fort Peck Sioux (m) (CRS code 7114)
     * for metric equivalent.
     */
    public const EPSG_NAD83_2011_RMTCRS_FORT_PECK_SIOUX_FT = 'urn:ogc:def:crs:EPSG::7124';

    /**
     * NAD83(2011) / RMTCRS Fort Peck Sioux (m)
     * Extent: USA - Montana - Fort Peck Indian Reservation - lower areas, notably in south and east
     * See NAD83(2011) / RMTCRS Fort Peck Sioux (ft) (CRS code 7124) for non-metric equivalent. In area overlapping
     * adjacent zones refer to distortion maps in RMTCRS User Guide to choose system.
     */
    public const EPSG_NAD83_2011_RMTCRS_FORT_PECK_SIOUX_M = 'urn:ogc:def:crs:EPSG::7114';

    /**
     * NAD83(2011) / RMTCRS Milk River (ft)
     * Extent: USA - Montana - Milk River area
     * In area overlapping adjacent zones refer to distortion maps in RMTCRS User Guide to choose system. Working unit
     * is International feet (note: not US survey feet). See NAD83(2011) / RMTCRS Milk River (m) (CRS code 7111) for
     * metric equivalent.
     */
    public const EPSG_NAD83_2011_RMTCRS_MILK_RIVER_FT = 'urn:ogc:def:crs:EPSG::7121';

    /**
     * NAD83(2011) / RMTCRS Milk River (m)
     * Extent: USA - Montana - Milk River area
     * SIn area overlapping adjacent zones refer to distortion maps in RMTCRS User Guide to choose system. In area
     * overlapping adjacent zones refer to distortion maps in RMTCRS User Guide.
     */
    public const EPSG_NAD83_2011_RMTCRS_MILK_RIVER_M = 'urn:ogc:def:crs:EPSG::7111';

    /**
     * NAD83(2011) / RMTCRS St Mary (ft)
     * Extent: USA - Montana - St Mary's Valley area
     * In area overlapping adjacent zones refer to distortion maps in RMTCRS User Guide to choose system. Working unit
     * is International feet (note: not US survey feet). See NAD83(2011) / RMTCRS St Mary (m) (CRS code 7109) for
     * metric equivalent.
     */
    public const EPSG_NAD83_2011_RMTCRS_ST_MARY_FT = 'urn:ogc:def:crs:EPSG::7119';

    /**
     * NAD83(2011) / RMTCRS St Mary (m)
     * Extent: USA - Montana - St Mary's Valley area
     * See NAD83(2011) / RMTCRS St Mary (ft) (CRS code 7119) for non-metric equivalent. In area overlapping adjacent
     * zones refer to distortion maps in RMTCRS User Guide to choose system.
     */
    public const EPSG_NAD83_2011_RMTCRS_ST_MARY_M = 'urn:ogc:def:crs:EPSG::7109';

    /**
     * NAD83(2011) / RMTCRS Wind River (ftUS)
     * Extent: USA - Wyoming - Wind River Indian Reservation
     * Working unit is US survey feet. See NAD83(2011) / RMTCRS Wind River (m) (CRS code 7118) for metric equivalent.
     */
    public const EPSG_NAD83_2011_RMTCRS_WIND_RIVER_FTUS = 'urn:ogc:def:crs:EPSG::7128';

    /**
     * NAD83(2011) / RMTCRS Wind River (m)
     * Extent: USA - Wyoming - Wind River Indian Reservation
     * See NAD83(2011) / RMTCRS Wind River (ftUS) (CRS code 7128) for non-metric equivalent.
     */
    public const EPSG_NAD83_2011_RMTCRS_WIND_RIVER_M = 'urn:ogc:def:crs:EPSG::7118';

    /**
     * NAD83(2011) / Rhode Island
     * Extent: USA - Rhode Island - counties of Bristol; Kent; Newport; Providence; Washington
     * State law defines use of US survey feet. See code 6568 for equivalent non-metric definition. Replaces
     * NAD83(NSRS2007) / Rhode Island (CRS code 3653).
     */
    public const EPSG_NAD83_2011_RHODE_ISLAND = 'urn:ogc:def:crs:EPSG::6567';

    /**
     * NAD83(2011) / Rhode Island (ftUS)
     * Extent: USA - Rhode Island - counties of Bristol; Kent; Newport; Providence; Washington
     * State law defines use of US survey feet. Federal definition is metric - see code 6567. Replaces NAD83(NSRS2007)
     * / Rhode Island (ftUS) (CRS code 3654).
     */
    public const EPSG_NAD83_2011_RHODE_ISLAND_FTUS = 'urn:ogc:def:crs:EPSG::6568';

    /**
     * NAD83(2011) / San Francisco CS13
     * Extent: USA - California - San Francisco bay area - counties of Alameda, Contra Costa, Marin, Napa, San
     * Francisco, San Mateo, Santa Clara, Santa Cruz, Solano and Sonoma
     * Designed for mm precision in city and county of San Francisco, adequate for cm precision for GIS use in
     * 10-county area. State law defines use of US survey feet. See CRS code 7132 for equivalent non-metric definition.
     */
    public const EPSG_NAD83_2011_SAN_FRANCISCO_CS13 = 'urn:ogc:def:crs:EPSG::7131';

    /**
     * NAD83(2011) / San Francisco CS13 (ftUS)
     * Extent: USA - California - San Francisco bay area - counties of Alameda, Contra Costa, Marin, Napa, San
     * Francisco, San Mateo, Santa Clara, Santa Cruz, Solano and Sonoma
     * Initial definition is metric - see CRS code 7131. Designed for 0.003 ft precision in city and county of San
     * Francisco, adequate for 0.03 ft precision for GIS use in 10-county area.
     */
    public const EPSG_NAD83_2011_SAN_FRANCISCO_CS13_FTUS = 'urn:ogc:def:crs:EPSG::7132';

    /**
     * NAD83(2011) / San Francisco SFO-B18 (ftUS)
     * Extent: USA - California - San Francisco international airport.
     */
    public const EPSG_NAD83_2011_SAN_FRANCISCO_SFO_B18_FTUS = 'urn:ogc:def:crs:EPSG::10622';

    /**
     * NAD83(2011) / South Carolina
     * Extent: USA - South Carolina - counties of Abbeville; Aiken; Allendale; Anderson; Bamberg; Barnwell; Beaufort;
     * Berkeley; Calhoun; Charleston; Cherokee; Chester; Chesterfield; Clarendon; Colleton; Darlington; Dillon;
     * Dorchester; Edgefield; Fairfield; Florence; Georgetown; Greenville; Greenwood; Hampton; Horry; Jasper; Kershaw;
     * Lancaster; Laurens; Lee; Lexington; Marion; Marlboro; McCormick; Newberry; Oconee; Orangeburg; Pickens;
     * Richland; Saluda; Spartanburg; Sumter; Union; Williamsburg; York
     * State law defines use of International feet (note: not US survey feet). See code 6570 for equivalent non-metric
     * definition. Replaces NAD83(NSRS2007) / South Carolina (CRS code 3655).
     */
    public const EPSG_NAD83_2011_SOUTH_CAROLINA = 'urn:ogc:def:crs:EPSG::6569';

    /**
     * NAD83(2011) / South Carolina (ft)
     * Extent: USA - South Carolina - counties of Abbeville; Aiken; Allendale; Anderson; Bamberg; Barnwell; Beaufort;
     * Berkeley; Calhoun; Charleston; Cherokee; Chester; Chesterfield; Clarendon; Colleton; Darlington; Dillon;
     * Dorchester; Edgefield; Fairfield; Florence; Georgetown; Greenville; Greenwood; Hampton; Horry; Jasper; Kershaw;
     * Lancaster; Laurens; Lee; Lexington; Marion; Marlboro; McCormick; Newberry; Oconee; Orangeburg; Pickens;
     * Richland; Saluda; Spartanburg; Sumter; Union; Williamsburg; York
     * State law defines use of International feet (note: not US survey feet). Federal definition is metric - see code
     * 6569. Replaces NAD83(NSRS2007) / South Carolina (ft) (CRS code 3656).
     */
    public const EPSG_NAD83_2011_SOUTH_CAROLINA_FT = 'urn:ogc:def:crs:EPSG::6570';

    /**
     * NAD83(2011) / South Dakota North
     * Extent: USA - South Dakota - counties of Beadle; Brookings; Brown; Butte; Campbell; Clark; Codington; Corson;
     * Day; Deuel; Dewey; Edmunds; Faulk; Grant; Hamlin; Hand; Harding; Hyde; Kingsbury; Lawrence; Marshall; McPherson;
     * Meade; Perkins; Potter; Roberts; Spink; Sully; Walworth; Ziebach
     * State law defines use of US survey feet. See code 6572 for equivalent non-metric definition. Replaces
     * NAD83(NSRS2007) / South Dakota North (CRS code 3657).
     */
    public const EPSG_NAD83_2011_SOUTH_DAKOTA_NORTH = 'urn:ogc:def:crs:EPSG::6571';

    /**
     * NAD83(2011) / South Dakota North (ftUS)
     * Extent: USA - South Dakota - counties of Beadle; Brookings; Brown; Butte; Campbell; Clark; Codington; Corson;
     * Day; Deuel; Dewey; Edmunds; Faulk; Grant; Hamlin; Hand; Harding; Hyde; Kingsbury; Lawrence; Marshall; McPherson;
     * Meade; Perkins; Potter; Roberts; Spink; Sully; Walworth; Ziebach
     * State law defines use of US survey feet. Federal definition is metric - see code 6571. Replaces NAD83(NSRS2007)
     * / South Dakota North (ftUS) (CRS code 3658).
     */
    public const EPSG_NAD83_2011_SOUTH_DAKOTA_NORTH_FTUS = 'urn:ogc:def:crs:EPSG::6572';

    /**
     * NAD83(2011) / South Dakota South
     * Extent: USA - South Dakota - counties of Aurora; Bennett; Bon Homme; Brule; Buffalo; Charles Mix; Clay; Custer;
     * Davison; Douglas; Fall River; Gregory; Haakon; Hanson; Hughes; Hutchinson; Jackson; Jerauld; Jones; Lake;
     * Lincoln; Lyman; McCook; Mellette; Miner; Minnehaha; Moody; Pennington; Sanborn; Shannon; Stanley; Todd; Tripp;
     * Turner; Union; Yankton
     * State law defines use of US survey feet. See code 6574 for equivalent non-metric definition. Replaces
     * NAD83(NSRS2007) / South Dakota South (CRS code 3659).
     */
    public const EPSG_NAD83_2011_SOUTH_DAKOTA_SOUTH = 'urn:ogc:def:crs:EPSG::6573';

    /**
     * NAD83(2011) / South Dakota South (ftUS)
     * Extent: USA - South Dakota - counties of Aurora; Bennett; Bon Homme; Brule; Buffalo; Charles Mix; Clay; Custer;
     * Davison; Douglas; Fall River; Gregory; Haakon; Hanson; Hughes; Hutchinson; Jackson; Jerauld; Jones; Lake;
     * Lincoln; Lyman; McCook; Mellette; Miner; Minnehaha; Moody; Pennington; Sanborn; Shannon; Stanley; Todd; Tripp;
     * Turner; Union; Yankton
     * State law defines use of US survey feet. Federal definition is metric - see code 6573. Replaces NAD83(NSRS2007)
     * / South Dakota South (ftUS) (CRS code 3660).
     */
    public const EPSG_NAD83_2011_SOUTH_DAKOTA_SOUTH_FTUS = 'urn:ogc:def:crs:EPSG::6574';

    /**
     * NAD83(2011) / Tennessee
     * Extent: USA - Tennessee - counties of Anderson; Bedford; Benton; Bledsoe; Blount; Bradley; Campbell; Cannon;
     * Carroll; Carter; Cheatham; Chester; Claiborne; Clay; Cocke; Coffee; Crockett; Cumberland; Davidson; De Kalb;
     * Decatur; Dickson; Dyer; Fayette; Fentress; Franklin; Gibson; Giles; Grainger; Greene; Grundy; Hamblen; Hamilton;
     * Hancock; Hardeman; Hardin; Hawkins; Haywood; Henderson; Henry; Hickman; Houston; Humphreys; Jackson; Jefferson;
     * Johnson; Knox; Lake; Lauderdale; Lawrence; Lewis; Lincoln; Loudon; Macon; Madison; Marion; Marshall; Maury;
     * McMinn; McNairy; Meigs; Monroe; Montgomery; Moore; Morgan; Obion; Overton; Perry; Pickett; Polk; Putnam; Rhea;
     * Roane; Robertson; Rutherford; Scott; Sequatchie; Sevier; Shelby; Smith; Stewart; Sullivan; Sumner; Tipton;
     * Trousdale; Unicoi; Union; Van Buren; Warren; Washington; Wayne; Weakley; White; Williamson; Wilson
     * State law defines use of US survey feet. See code 6576 for equivalent non-metric definition. Replaces
     * NAD83(NSRS2007) / Tennessee (CRS code 3661).
     */
    public const EPSG_NAD83_2011_TENNESSEE = 'urn:ogc:def:crs:EPSG::6575';

    /**
     * NAD83(2011) / Tennessee (ftUS)
     * Extent: USA - Tennessee - counties of Anderson; Bedford; Benton; Bledsoe; Blount; Bradley; Campbell; Cannon;
     * Carroll; Carter; Cheatham; Chester; Claiborne; Clay; Cocke; Coffee; Crockett; Cumberland; Davidson; De Kalb;
     * Decatur; Dickson; Dyer; Fayette; Fentress; Franklin; Gibson; Giles; Grainger; Greene; Grundy; Hamblen; Hamilton;
     * Hancock; Hardeman; Hardin; Hawkins; Haywood; Henderson; Henry; Hickman; Houston; Humphreys; Jackson; Jefferson;
     * Johnson; Knox; Lake; Lauderdale; Lawrence; Lewis; Lincoln; Loudon; Macon; Madison; Marion; Marshall; Maury;
     * McMinn; McNairy; Meigs; Monroe; Montgomery; Moore; Morgan; Obion; Overton; Perry; Pickett; Polk; Putnam; Rhea;
     * Roane; Robertson; Rutherford; Scott; Sequatchie; Sevier; Shelby; Smith; Stewart; Sullivan; Sumner; Tipton;
     * Trousdale; Unicoi; Union; Van Buren; Warren; Washington; Wayne; Weakley; White; Williamson; Wilson
     * State law defines use of US survey feet. Federal definition is metric - see code 6575. Replaces NAD83(NSRS2007)
     * / Tennessee (ftUS) (CRS code 3662).
     */
    public const EPSG_NAD83_2011_TENNESSEE_FTUS = 'urn:ogc:def:crs:EPSG::6576';

    /**
     * NAD83(2011) / Texas Central
     * Extent: USA - Texas - counties of Anderson; Angelina; Bastrop; Bell; Blanco; Bosque; Brazos; Brown; Burleson;
     * Burnet; Cherokee; Coke; Coleman; Comanche; Concho; Coryell; Crane; Crockett; Culberson; Ector; El Paso; Falls;
     * Freestone; Gillespie; Glasscock; Grimes; Hamilton; Hardin; Houston; Hudspeth; Irion; Jasper; Jeff Davis; Kimble;
     * Lampasas; Lee; Leon; Liberty; Limestone; Llano; Loving; Madison; Mason; McCulloch; McLennan; Menard; Midland;
     * Milam; Mills; Montgomery; Nacogdoches; Newton; Orange; Pecos; Polk; Reagan; Reeves; Robertson; Runnels; Sabine;
     * San Augustine; San Jacinto; San Saba; Schleicher; Shelby; Sterling; Sutton; Tom Green; Travis; Trinity; Tyler;
     * Upton; Walker; Ward; Washington; Williamson; Winkler
     * State law defines use of US survey feet. See code 6578 for equivalent non-metric definition. Replaces
     * NAD83(NSRS2007) / Texas Central (CRS code 3663).
     */
    public const EPSG_NAD83_2011_TEXAS_CENTRAL = 'urn:ogc:def:crs:EPSG::6577';

    /**
     * NAD83(2011) / Texas Central (ftUS)
     * Extent: USA - Texas - counties of Anderson; Angelina; Bastrop; Bell; Blanco; Bosque; Brazos; Brown; Burleson;
     * Burnet; Cherokee; Coke; Coleman; Comanche; Concho; Coryell; Crane; Crockett; Culberson; Ector; El Paso; Falls;
     * Freestone; Gillespie; Glasscock; Grimes; Hamilton; Hardin; Houston; Hudspeth; Irion; Jasper; Jeff Davis; Kimble;
     * Lampasas; Lee; Leon; Liberty; Limestone; Llano; Loving; Madison; Mason; McCulloch; McLennan; Menard; Midland;
     * Milam; Mills; Montgomery; Nacogdoches; Newton; Orange; Pecos; Polk; Reagan; Reeves; Robertson; Runnels; Sabine;
     * San Augustine; San Jacinto; San Saba; Schleicher; Shelby; Sterling; Sutton; Tom Green; Travis; Trinity; Tyler;
     * Upton; Walker; Ward; Washington; Williamson; Winkler
     * State law defines use of US survey feet. Federal definition is metric - see code 6577. Replaces NAD83(NSRS2007)
     * / Texas Central (ftUS) (CRS code 3664).
     */
    public const EPSG_NAD83_2011_TEXAS_CENTRAL_FTUS = 'urn:ogc:def:crs:EPSG::6578';

    /**
     * NAD83(2011) / Texas Centric Albers Equal Area
     * Extent: USA - Texas
     * Replaces NAD83(NSRS2007) / TX Albers (CRS code 3665). For state-wide spatial data presentation requiring shape
     * preservation use NAD83(2011) / TX LC (CRS code 6580).
     */
    public const EPSG_NAD83_2011_TEXAS_CENTRIC_ALBERS_EQUAL_AREA = 'urn:ogc:def:crs:EPSG::6579';

    /**
     * NAD83(2011) / Texas Centric Lambert Conformal
     * Extent: USA - Texas
     * Replaces NAD83(NSRS2007) / TX LC (CRS code 3666). For state-wide spatial data presentation requiring true area
     * measurements use NAD83(2011) / TX Albers (CRS code 6579).
     */
    public const EPSG_NAD83_2011_TEXAS_CENTRIC_LAMBERT_CONFORMAL = 'urn:ogc:def:crs:EPSG::6580';

    /**
     * NAD83(2011) / Texas North
     * Extent: USA - Texas - counties of: Armstrong; Briscoe; Carson; Castro; Childress; Collingsworth; Dallam; Deaf
     * Smith; Donley; Gray; Hall; Hansford; Hartley; Hemphill; Hutchinson; Lipscomb; Moore; Ochiltree; Oldham; Parmer;
     * Potter; Randall; Roberts; Sherman; Swisher; Wheeler
     * State law defines use of US survey feet. See code 6582 for equivalent non-metric definition. Replaces
     * NAD83(NSRS2007) / Texas North (CRS code 3667).
     */
    public const EPSG_NAD83_2011_TEXAS_NORTH = 'urn:ogc:def:crs:EPSG::6581';

    /**
     * NAD83(2011) / Texas North (ftUS)
     * Extent: USA - Texas - counties of: Armstrong; Briscoe; Carson; Castro; Childress; Collingsworth; Dallam; Deaf
     * Smith; Donley; Gray; Hall; Hansford; Hartley; Hemphill; Hutchinson; Lipscomb; Moore; Ochiltree; Oldham; Parmer;
     * Potter; Randall; Roberts; Sherman; Swisher; Wheeler
     * State law defines use of US survey feet. Federal definition is metric - see code 6581. Replaces NAD83(NSRS2007)
     * / Texas North (ftUS) (CRS code 3668).
     */
    public const EPSG_NAD83_2011_TEXAS_NORTH_FTUS = 'urn:ogc:def:crs:EPSG::6582';

    /**
     * NAD83(2011) / Texas North Central
     * Extent: USA - Texas - counties of: Andrews; Archer; Bailey; Baylor; Borden; Bowie; Callahan; Camp; Cass; Clay;
     * Cochran; Collin; Cooke; Cottle; Crosby; Dallas; Dawson; Delta; Denton; Dickens; Eastland; Ellis; Erath; Fannin;
     * Fisher; Floyd; Foard; Franklin; Gaines; Garza; Grayson; Gregg; Hale; Hardeman; Harrison; Haskell; Henderson;
     * Hill; Hockley; Hood; Hopkins; Howard; Hunt; Jack; Johnson; Jones; Kaufman; Kent; King; Knox; Lamar; Lamb;
     * Lubbock; Lynn; Marion; Martin; Mitchell; Montague; Morris; Motley; Navarro; Nolan; Palo Pinto; Panola; Parker;
     * Rains; Red River; Rockwall; Rusk; Scurry; Shackelford; Smith; Somervell; Stephens; Stonewall; Tarrant; Taylor;
     * Terry; Throckmorton; Titus; Upshur; Van Zandt; Wichita; Wilbarger; Wise; Wood; Yoakum; Young
     * State law defines use of US survey feet. See code 6584 for equivalent non-metric definition. Replaces
     * NAD83(NSRS2007) / Texas North Central (CRS code 3669).
     */
    public const EPSG_NAD83_2011_TEXAS_NORTH_CENTRAL = 'urn:ogc:def:crs:EPSG::6583';

    /**
     * NAD83(2011) / Texas North Central (ftUS)
     * Extent: USA - Texas - counties of: Andrews; Archer; Bailey; Baylor; Borden; Bowie; Callahan; Camp; Cass; Clay;
     * Cochran; Collin; Cooke; Cottle; Crosby; Dallas; Dawson; Delta; Denton; Dickens; Eastland; Ellis; Erath; Fannin;
     * Fisher; Floyd; Foard; Franklin; Gaines; Garza; Grayson; Gregg; Hale; Hardeman; Harrison; Haskell; Henderson;
     * Hill; Hockley; Hood; Hopkins; Howard; Hunt; Jack; Johnson; Jones; Kaufman; Kent; King; Knox; Lamar; Lamb;
     * Lubbock; Lynn; Marion; Martin; Mitchell; Montague; Morris; Motley; Navarro; Nolan; Palo Pinto; Panola; Parker;
     * Rains; Red River; Rockwall; Rusk; Scurry; Shackelford; Smith; Somervell; Stephens; Stonewall; Tarrant; Taylor;
     * Terry; Throckmorton; Titus; Upshur; Van Zandt; Wichita; Wilbarger; Wise; Wood; Yoakum; Young
     * State law defines use of US survey feet. Federal definition is metric - see code 6583. Replaces NAD83(NSRS2007)
     * / Texas North Central (ftUS) (CRS code 3670).
     */
    public const EPSG_NAD83_2011_TEXAS_NORTH_CENTRAL_FTUS = 'urn:ogc:def:crs:EPSG::6584';

    /**
     * NAD83(2011) / Texas South
     * Extent: USA - Texas - counties of Brooks; Cameron; Duval; Hidalgo; Jim Hogg; Jim Wells; Kenedy; Kleberg; Nueces;
     * San Patricio; Starr; Webb; Willacy; Zapata
     * State law defines use of US survey feet. See code 6586 for equivalent non-metric definition. Replaces
     * NAD83(NSRS2007) / Texas South (CRS code 3671).
     */
    public const EPSG_NAD83_2011_TEXAS_SOUTH = 'urn:ogc:def:crs:EPSG::6585';

    /**
     * NAD83(2011) / Texas South (ftUS)
     * Extent: USA - Texas - counties of Brooks; Cameron; Duval; Hidalgo; Jim Hogg; Jim Wells; Kenedy; Kleberg; Nueces;
     * San Patricio; Starr; Webb; Willacy; Zapata
     * State law defines use of US survey feet. Federal definition is metric - see code 6585. Replaces NAD83(NSRS2007)
     * / Texas South (ftUS) (CRS code 3672).
     */
    public const EPSG_NAD83_2011_TEXAS_SOUTH_FTUS = 'urn:ogc:def:crs:EPSG::6586';

    /**
     * NAD83(2011) / Texas South Central
     * Extent: USA - Texas - counties of Aransas; Atascosa; Austin; Bandera; Bee; Bexar; Brazoria; Brewster; Caldwell;
     * Calhoun; Chambers; Colorado; Comal; De Witt; Dimmit; Edwards; Fayette; Fort Bend; Frio; Galveston; Goliad;
     * Gonzales; Guadalupe; Harris; Hays; Jackson; Jefferson; Karnes; Kendall; Kerr; Kinney; La Salle; Lavaca; Live
     * Oak; Matagorda; Maverick; McMullen; Medina; Presidio; Real; Refugio; Terrell; Uvalde; Val Verde; Victoria;
     * Waller; Wharton; Wilson; Zavala
     * State law defines use of US survey feet. See code 6588 for equivalent non-metric definition. Replaces
     * NAD83(NSRS2007) / Texas South Central (CRS code 3673).
     */
    public const EPSG_NAD83_2011_TEXAS_SOUTH_CENTRAL = 'urn:ogc:def:crs:EPSG::6587';

    /**
     * NAD83(2011) / Texas South Central (ftUS)
     * Extent: USA - Texas - counties of Aransas; Atascosa; Austin; Bandera; Bee; Bexar; Brazoria; Brewster; Caldwell;
     * Calhoun; Chambers; Colorado; Comal; De Witt; Dimmit; Edwards; Fayette; Fort Bend; Frio; Galveston; Goliad;
     * Gonzales; Guadalupe; Harris; Hays; Jackson; Jefferson; Karnes; Kendall; Kerr; Kinney; La Salle; Lavaca; Live
     * Oak; Matagorda; Maverick; McMullen; Medina; Presidio; Real; Refugio; Terrell; Uvalde; Val Verde; Victoria;
     * Waller; Wharton; Wilson; Zavala
     * State law defines use of US survey feet. Federal definition is metric - see code 6587. Replaces NAD83(NSRS2007)
     * / Texas South Central (ftUS) (CRS code 3674).
     */
    public const EPSG_NAD83_2011_TEXAS_SOUTH_CENTRAL_FTUS = 'urn:ogc:def:crs:EPSG::6588';

    /**
     * NAD83(2011) / UTM zone 10N
     * Extent: USA - between 126°W and 120°W - California; Oregon; Washington
     * Replaces NAD83(NSRS2007) / UTM zone 10N.
     */
    public const EPSG_NAD83_2011_UTM_ZONE_10N = 'urn:ogc:def:crs:EPSG::6339';

    /**
     * NAD83(2011) / UTM zone 11N
     * Extent: USA - between 120°W and 114°W - California, Idaho, Nevada, Oregon, Washington
     * Replaces NAD83(NSRS2007) / UTM zone 11N.
     */
    public const EPSG_NAD83_2011_UTM_ZONE_11N = 'urn:ogc:def:crs:EPSG::6340';

    /**
     * NAD83(2011) / UTM zone 12N
     * Extent: USA - between 114°W and 108°W - Arizona; Colorado; Idaho; Montana; New Mexico; Utah; Wyoming
     * Replaces NAD83(NSRS2007) / UTM zone 12N.
     */
    public const EPSG_NAD83_2011_UTM_ZONE_12N = 'urn:ogc:def:crs:EPSG::6341';

    /**
     * NAD83(2011) / UTM zone 13N
     * Extent: USA - between 108°W and 102°W - Colorado; Montana; Nebraska; New Mexico; North Dakota; Oklahoma; South
     * Dakota; Texas; Wyoming
     * Replaces NAD83(NSRS2007) / UTM zone 13N.
     */
    public const EPSG_NAD83_2011_UTM_ZONE_13N = 'urn:ogc:def:crs:EPSG::6342';

    /**
     * NAD83(2011) / UTM zone 14N
     * Extent: USA - between 102°W and 96°W - Iowa; Kansas; Minnesota; Nebraska; North Dakota; Oklahoma; South
     * Dakota; Texas
     * Replaces NAD83(NSRS2007) / UTM zone 14N.
     */
    public const EPSG_NAD83_2011_UTM_ZONE_14N = 'urn:ogc:def:crs:EPSG::6343';

    /**
     * NAD83(2011) / UTM zone 15N
     * Extent: USA - between 96°W and 90°W - Arkansas; Illinois; Iowa; Kansas; Louisiana; Michigan; Minnesota;
     * Mississippi; Missouri; Nebraska; Oklahoma; Tennessee; Texas; Wisconsin
     * Replaces NAD83(NSRS2007) / UTM zone 15N.
     */
    public const EPSG_NAD83_2011_UTM_ZONE_15N = 'urn:ogc:def:crs:EPSG::6344';

    /**
     * NAD83(2011) / UTM zone 16N
     * Extent: USA - between 90°W and 84°W - Alabama; Arkansas; Florida; Georgia; Indiana; Illinois; Kentucky;
     * Louisiana; Michigan; Minnesota; Mississippi; Missouri; North Carolina; Ohio; Tennessee; Wisconsin
     * Replaces NAD83(NSRS2007) / UTM zone 16N.
     */
    public const EPSG_NAD83_2011_UTM_ZONE_16N = 'urn:ogc:def:crs:EPSG::6345';

    /**
     * NAD83(2011) / UTM zone 17N
     * Extent: USA - between 84°W and 78°W - Florida; Georgia; Kentucky; Maryland; Michigan; New York; North
     * Carolina; Ohio; Pennsylvania; South Carolina; Tennessee; Virginia; West Virginia
     * Replaces NAD83(NSRS2007) / UTM zone 17N.
     */
    public const EPSG_NAD83_2011_UTM_ZONE_17N = 'urn:ogc:def:crs:EPSG::6346';

    /**
     * NAD83(2011) / UTM zone 18N
     * Extent: USA - between 78°W and 72°W - Connecticut; Delaware; Maryland; Massachusetts; New Hampshire; New
     * Jersey; New York; North Carolina; Pennsylvania; Virginia; Vermont
     * Replaces NAD83(NSRS2007) / UTM zone 18N.
     */
    public const EPSG_NAD83_2011_UTM_ZONE_18N = 'urn:ogc:def:crs:EPSG::6347';

    /**
     * NAD83(2011) / UTM zone 19N
     * Extent: USA - between 72°W and 66°W - Connecticut; Maine; Massachusetts; New Hampshire; New York (Long
     * Island); Rhode Island; Vermont
     * Replaces NAD83(NSRS2007) / UTM zone 19N.
     */
    public const EPSG_NAD83_2011_UTM_ZONE_19N = 'urn:ogc:def:crs:EPSG::6348';

    /**
     * NAD83(2011) / UTM zone 1N
     * Extent: USA - between 180°W and 174°W - Alaska and offshore continental shelf (OCS)
     * Replaces NAD83(NSRS2007) / UTM zone 1N.
     */
    public const EPSG_NAD83_2011_UTM_ZONE_1N = 'urn:ogc:def:crs:EPSG::6330';

    /**
     * NAD83(2011) / UTM zone 2N
     * Extent: USA - between 174°W and 168°W - Alaska and offshore continental shelf (OCS)
     * Replaces NAD83(NSRS2007) / UTM zone 2N.
     */
    public const EPSG_NAD83_2011_UTM_ZONE_2N = 'urn:ogc:def:crs:EPSG::6331';

    /**
     * NAD83(2011) / UTM zone 3N
     * Extent: USA - between 168°W and 162°W - Alaska and offshore continental shelf (OCS)
     * Replaces NAD83(NSRS2007) / UTM zone 3N.
     */
    public const EPSG_NAD83_2011_UTM_ZONE_3N = 'urn:ogc:def:crs:EPSG::6332';

    /**
     * NAD83(2011) / UTM zone 4N
     * Extent: USA - between 162°W and 156°W - Alaska and offshore continental shelf (OCS)
     * Replaces NAD83(NSRS2007) / UTM zone 4N.
     */
    public const EPSG_NAD83_2011_UTM_ZONE_4N = 'urn:ogc:def:crs:EPSG::6333';

    /**
     * NAD83(2011) / UTM zone 59N
     * Extent: USA - west of 174°E. Alaska and offshore continental shelf (OCS)
     * Replaces NAD83(NSRS2007) / UTM zone 59N.
     */
    public const EPSG_NAD83_2011_UTM_ZONE_59N = 'urn:ogc:def:crs:EPSG::6328';

    /**
     * NAD83(2011) / UTM zone 5N
     * Extent: USA - between 156°W and 150°W - Alaska and offshore continental shelf (OCS)
     * Replaces NAD83(NSRS2007) / UTM zone 5N.
     */
    public const EPSG_NAD83_2011_UTM_ZONE_5N = 'urn:ogc:def:crs:EPSG::6334';

    /**
     * NAD83(2011) / UTM zone 60N
     * Extent: USA - between 174°E and 180°E - Alaska and offshore continental shelf (OCS)
     * Replaces NAD83(NSRS2007) / UTM zone 60N.
     */
    public const EPSG_NAD83_2011_UTM_ZONE_60N = 'urn:ogc:def:crs:EPSG::6329';

    /**
     * NAD83(2011) / UTM zone 6N
     * Extent: USA - between 150°W and 144°W - Alaska and offshore continental shelf (OCS)
     * Replaces NAD83(NSRS2007) / UTM zone 6N.
     */
    public const EPSG_NAD83_2011_UTM_ZONE_6N = 'urn:ogc:def:crs:EPSG::6335';

    /**
     * NAD83(2011) / UTM zone 7N
     * Extent: USA - between 144°W and 138°W - Alaska
     * Replaces NAD83(NSRS2007) / UTM zone 7N.
     */
    public const EPSG_NAD83_2011_UTM_ZONE_7N = 'urn:ogc:def:crs:EPSG::6336';

    /**
     * NAD83(2011) / UTM zone 8N
     * Extent: USA - between 138°W and 132°W - Alaska
     * Replaces NAD83(NSRS2007) / UTM zone 8N.
     */
    public const EPSG_NAD83_2011_UTM_ZONE_8N = 'urn:ogc:def:crs:EPSG::6337';

    /**
     * NAD83(2011) / UTM zone 9N
     * Extent: USA - between 132°W and 126°W - Alaska
     * Replaces NAD83(NSRS2007) / UTM zone 9N.
     */
    public const EPSG_NAD83_2011_UTM_ZONE_9N = 'urn:ogc:def:crs:EPSG::6338';

    /**
     * NAD83(2011) / Utah Central
     * Extent: USA - Utah - counties of Carbon; Duchesne; Emery; Grand; Juab; Millard; Salt Lake; Sanpete; Sevier;
     * Tooele; Uintah; Utah; Wasatch
     * State law of 2009 defines use of US survey feet: see CRS code 6525 for definition. An earlier law of 1988
     * defining use of International foot was withdrawn in 2002. Replaces NAD83(NSRS2007) / Utah Central (CRS code
     * 3675).
     */
    public const EPSG_NAD83_2011_UTAH_CENTRAL = 'urn:ogc:def:crs:EPSG::6619';

    /**
     * NAD83(2011) / Utah Central (ftUS)
     * Extent: USA - Utah - counties of Carbon; Duchesne; Emery; Grand; Juab; Millard; Salt Lake; Sanpete; Sevier;
     * Tooele; Uintah; Utah; Wasatch
     * State law of 2009 defines use of US survey feet, an earlier law of 1988 defining use of International foot
     * having been withdrawn in 2002. Federal definition is metric - see CRS code 6619. Replaces NAD83(NSRS2007) / Utah
     * Central (ftUS) (CRS code 3677).
     */
    public const EPSG_NAD83_2011_UTAH_CENTRAL_FTUS = 'urn:ogc:def:crs:EPSG::6625';

    /**
     * NAD83(2011) / Utah North
     * Extent: USA - Utah - counties of Box Elder; Cache; Daggett; Davis; Morgan; Rich; Summit; Weber
     * State law of 2009 defines use of US survey feet: see CRS code 6526 for definition. An earlier law of 1988
     * defining use of International foot was withdrawn in 2002. Replaces NAD83(NSRS2007) / Utah North (CRS code 3678).
     */
    public const EPSG_NAD83_2011_UTAH_NORTH = 'urn:ogc:def:crs:EPSG::6620';

    /**
     * NAD83(2011) / Utah North (ftUS)
     * Extent: USA - Utah - counties of Box Elder; Cache; Daggett; Davis; Morgan; Rich; Summit; Weber
     * State law of 2009 defines use of US survey feet, an earlier law of 1988 defining use of International foot
     * having been withdrawn in 2002. Federal definition is metric - see CRS code 6620. Replaces NAD83(NSRS2007) / Utah
     * North (ftUS) (CRS code 3680).
     */
    public const EPSG_NAD83_2011_UTAH_NORTH_FTUS = 'urn:ogc:def:crs:EPSG::6626';

    /**
     * NAD83(2011) / Utah South
     * Extent: USA - Utah - counties of Beaver; Garfield; Iron; Kane; Piute; San Juan; Washington; Wayne
     * State law of 2009 defines use of US survey feet: see CRS code 6527 for definition. An earlier law of 1988
     * defining use of International foot was withdrawn in 2002. Replaces NAD83(NSRS2007) / Utah South (CRS code 3681).
     */
    public const EPSG_NAD83_2011_UTAH_SOUTH = 'urn:ogc:def:crs:EPSG::6621';

    /**
     * NAD83(2011) / Utah South (ftUS)
     * Extent: USA - Utah - counties of Beaver; Garfield; Iron; Kane; Piute; San Juan; Washington; Wayne
     * State law of 2009 defines use of US survey feet, an earlier law of 1988 defining use of International foot
     * having been withdrawn in 2002. Federal definition is metric - see CRS code 6621. Replaces NAD83(NSRS2007) / Utah
     * South (ftUS) (CRS code 3683).
     */
    public const EPSG_NAD83_2011_UTAH_SOUTH_FTUS = 'urn:ogc:def:crs:EPSG::6627';

    /**
     * NAD83(2011) / Vermont
     * Extent: USA - Vermont - counties of Addison; Bennington; Caledonia; Chittenden; Essex; Franklin; Grand Isle;
     * Lamoille; Orange; Orleans; Rutland; Washington; Windham; Windsor
     * State law defines use of US survey feet. See code 6590 for equivalent non-metric definition. Replaces
     * NAD83(NSRS2007) / Vermont (CRS code 3684).
     */
    public const EPSG_NAD83_2011_VERMONT = 'urn:ogc:def:crs:EPSG::6589';

    /**
     * NAD83(2011) / Vermont (ftUS)
     * Extent: USA - Vermont - counties of Addison; Bennington; Caledonia; Chittenden; Essex; Franklin; Grand Isle;
     * Lamoille; Orange; Orleans; Rutland; Washington; Windham; Windsor
     * State law defines use of US survey feet. Federal definition is metric - see code 6589. Replaces NAD83(NSRS2007)
     * / Vermont (ftUS) (CRS code 5655).
     */
    public const EPSG_NAD83_2011_VERMONT_FTUS = 'urn:ogc:def:crs:EPSG::6590';

    /**
     * NAD83(2011) / Virginia Lambert
     * Extent: USA - Virginia
     * Replaces NAD83(NSRS2007) / Virginia Lambert (CRS code 3970).
     */
    public const EPSG_NAD83_2011_VIRGINIA_LAMBERT = 'urn:ogc:def:crs:EPSG::6591';

    /**
     * NAD83(2011) / Virginia North
     * Extent: USA - Virginia - counties of Arlington; Augusta; Bath; Caroline; Clarke; Culpeper; Fairfax; Fauquier;
     * Frederick; Greene; Highland; King George; Loudoun; Madison; Orange; Page; Prince William; Rappahannock;
     * Rockingham; Shenandoah; Spotsylvania; Stafford; Warren; Westmoreland
     * State law defines use of US survey feet. See code 6593 for equivalent non-metric definition. Replaces
     * NAD83(NSRS2007) / Virginia North (CRS code 3685).
     */
    public const EPSG_NAD83_2011_VIRGINIA_NORTH = 'urn:ogc:def:crs:EPSG::6592';

    /**
     * NAD83(2011) / Virginia North (ftUS)
     * Extent: USA - Virginia - counties of Arlington; Augusta; Bath; Caroline; Clarke; Culpeper; Fairfax; Fauquier;
     * Frederick; Greene; Highland; King George; Loudoun; Madison; Orange; Page; Prince William; Rappahannock;
     * Rockingham; Shenandoah; Spotsylvania; Stafford; Warren; Westmoreland
     * State law defines use of US survey feet. Federal definition is metric - see code 6592. Replaces NAD83(NSRS2007)
     * / Virginia North (ftUS) (CRS code 3686).
     */
    public const EPSG_NAD83_2011_VIRGINIA_NORTH_FTUS = 'urn:ogc:def:crs:EPSG::6593';

    /**
     * NAD83(2011) / Virginia South
     * Extent: USA - Virginia - counties of Accomack; Albemarle; Alleghany; Amelia; Amherst; Appomattox; Bedford;
     * Bland; Botetourt; Bristol; Brunswick; Buchanan; Buckingham; Campbell; Carroll; Charles City; Charlotte;
     * Chesapeake; Chesterfield; Colonial Heights; Craig; Cumberland; Dickenson; Dinwiddie; Essex; Floyd; Fluvanna;
     * Franklin; Giles; Gloucester; Goochland; Grayson; Greensville; Halifax; Hampton; Hanover; Henrico; Henry; Isle of
     * Wight; James City; King and Queen; King William; Lancaster; Lee; Louisa; Lunenburg; Lynchburg; Mathews;
     * Mecklenburg; Middlesex; Montgomery; Nelson; New Kent; Newport News; Norfolk; Northampton; Northumberland;
     * Norton; Nottoway; Patrick; Petersburg; Pittsylvania; Portsmouth; Powhatan; Prince Edward; Prince George;
     * Pulaski; Richmond; Roanoke; Rockbridge; Russell; Scott; Smyth; Southampton; Suffolk; Surry; Sussex; Tazewell;
     * Washington; Wise; Wythe; York
     * State law defines use of US survey feet. See code 6595 for equivalent non-metric definition. Replaces
     * NAD83(NSRS2007) / Virginia South (CRS code 3687).
     */
    public const EPSG_NAD83_2011_VIRGINIA_SOUTH = 'urn:ogc:def:crs:EPSG::6594';

    /**
     * NAD83(2011) / Virginia South (ftUS)
     * Extent: USA - Virginia - counties of Accomack; Albemarle; Alleghany; Amelia; Amherst; Appomattox; Bedford;
     * Bland; Botetourt; Bristol; Brunswick; Buchanan; Buckingham; Campbell; Carroll; Charles City; Charlotte;
     * Chesapeake; Chesterfield; Colonial Heights; Craig; Cumberland; Dickenson; Dinwiddie; Essex; Floyd; Fluvanna;
     * Franklin; Giles; Gloucester; Goochland; Grayson; Greensville; Halifax; Hampton; Hanover; Henrico; Henry; Isle of
     * Wight; James City; King and Queen; King William; Lancaster; Lee; Louisa; Lunenburg; Lynchburg; Mathews;
     * Mecklenburg; Middlesex; Montgomery; Nelson; New Kent; Newport News; Norfolk; Northampton; Northumberland;
     * Norton; Nottoway; Patrick; Petersburg; Pittsylvania; Portsmouth; Powhatan; Prince Edward; Prince George;
     * Pulaski; Richmond; Roanoke; Rockbridge; Russell; Scott; Smyth; Southampton; Suffolk; Surry; Sussex; Tazewell;
     * Washington; Wise; Wythe; York
     * State law defines use of US survey feet. Federal definition is metric - see code 6594. NAD83(NSRS2007) /
     * Virginia South (ftUS) (CRS code 3688).
     */
    public const EPSG_NAD83_2011_VIRGINIA_SOUTH_FTUS = 'urn:ogc:def:crs:EPSG::6595';

    /**
     * NAD83(2011) / WISCRS Adams and Juneau (ftUS)
     * Extent: USA - Wisconsin - counties of Adams and Juneau
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined as separate zones for each county these
     * having identical parameter values: see info source. Original definition was referenced to NAD83(HARN). Defined
     * in meters - see CRS code 7528.
     */
    public const EPSG_NAD83_2011_WISCRS_ADAMS_AND_JUNEAU_FTUS = 'urn:ogc:def:crs:EPSG::7587';

    /**
     * NAD83(2011) / WISCRS Adams and Juneau (m)
     * Extent: USA - Wisconsin - counties of Adams and Juneau
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined as separate zones for each county these
     * having identical parameter values: see info source. Original definition was referenced to NAD83(HARN). Working
     * units are feet - see CRS code 7587.
     */
    public const EPSG_NAD83_2011_WISCRS_ADAMS_AND_JUNEAU_M = 'urn:ogc:def:crs:EPSG::7528';

    /**
     * NAD83(2011) / WISCRS Ashland (ftUS)
     * Extent: USA - Wisconsin - Ashland county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Original definition was referenced to NAD83(HARN).
     * Defined in meters - see CRS code 7529.
     */
    public const EPSG_NAD83_2011_WISCRS_ASHLAND_FTUS = 'urn:ogc:def:crs:EPSG::7588';

    /**
     * NAD83(2011) / WISCRS Ashland (m)
     * Extent: USA - Wisconsin - Ashland county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Original definition was referenced to NAD83(HARN).
     * Working units are feet - see CRS code 7588.
     */
    public const EPSG_NAD83_2011_WISCRS_ASHLAND_M = 'urn:ogc:def:crs:EPSG::7529';

    /**
     * NAD83(2011) / WISCRS Barron (ftUS)
     * Extent: USA - Wisconsin - Barron county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Original definition was referenced to NAD83(HARN).
     * Defined in meters - see CRS code 7530.
     */
    public const EPSG_NAD83_2011_WISCRS_BARRON_FTUS = 'urn:ogc:def:crs:EPSG::7589';

    /**
     * NAD83(2011) / WISCRS Barron (m)
     * Extent: USA - Wisconsin - Barron county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Original definition was referenced to NAD83(HARN).
     * Working units are feet - see CRS code 7589.
     */
    public const EPSG_NAD83_2011_WISCRS_BARRON_M = 'urn:ogc:def:crs:EPSG::7530';

    /**
     * NAD83(2011) / WISCRS Bayfield (ftUS)
     * Extent: USA - Wisconsin - Bayfield county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Original definition was referenced to NAD83(HARN).
     * Defined in meters - see CRS code 7531.
     */
    public const EPSG_NAD83_2011_WISCRS_BAYFIELD_FTUS = 'urn:ogc:def:crs:EPSG::7590';

    /**
     * NAD83(2011) / WISCRS Bayfield (m)
     * Extent: USA - Wisconsin - Bayfield county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Original definition was referenced to NAD83(HARN).
     * Working units are feet - see CRS code 7590.
     */
    public const EPSG_NAD83_2011_WISCRS_BAYFIELD_M = 'urn:ogc:def:crs:EPSG::7531';

    /**
     * NAD83(2011) / WISCRS Brown (ftUS)
     * Extent: USA - Wisconsin - Brown county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Original definition was referenced to NAD83(HARN).
     * Defined in meters - see CRS code 7532.
     */
    public const EPSG_NAD83_2011_WISCRS_BROWN_FTUS = 'urn:ogc:def:crs:EPSG::7591';

    /**
     * NAD83(2011) / WISCRS Brown (m)
     * Extent: USA - Wisconsin - Brown county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Original definition was referenced to NAD83(HARN).
     * Working units are feet - see CRS code 7591.
     */
    public const EPSG_NAD83_2011_WISCRS_BROWN_M = 'urn:ogc:def:crs:EPSG::7532';

    /**
     * NAD83(2011) / WISCRS Buffalo (ftUS)
     * Extent: USA - Wisconsin - Buffalo county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Original definition was referenced to NAD83(HARN).
     * Defined in meters - see CRS code 7533.
     */
    public const EPSG_NAD83_2011_WISCRS_BUFFALO_FTUS = 'urn:ogc:def:crs:EPSG::7592';

    /**
     * NAD83(2011) / WISCRS Buffalo (m)
     * Extent: USA - Wisconsin - Buffalo county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Original definition was referenced to NAD83(HARN).
     * Working units are feet - see CRS code 7592.
     */
    public const EPSG_NAD83_2011_WISCRS_BUFFALO_M = 'urn:ogc:def:crs:EPSG::7533';

    /**
     * NAD83(2011) / WISCRS Burnett (ftUS)
     * Extent: USA - Wisconsin - Burnett county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Original definition was referenced to NAD83(HARN).
     * Defined in meters - see CRS code 7534.
     */
    public const EPSG_NAD83_2011_WISCRS_BURNETT_FTUS = 'urn:ogc:def:crs:EPSG::7593';

    /**
     * NAD83(2011) / WISCRS Burnett (m)
     * Extent: USA - Wisconsin - Burnett county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Original definition was referenced to NAD83(HARN).
     * Working units are feet - see CRS code 7593.
     */
    public const EPSG_NAD83_2011_WISCRS_BURNETT_M = 'urn:ogc:def:crs:EPSG::7534';

    /**
     * NAD83(2011) / WISCRS Calumet, Fond du Lac, Outagamie and Winnebago (ftUS)
     * Extent: USA - Wisconsin - counties of Calumet, Fond du Lac, Outagamie and Winnebago
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined as separate zones for each county these
     * having identical parameter values: see info source. Original definition was referenced to NAD83(HARN). Defined
     * in meters - see CRS code 7535.
     */
    public const EPSG_NAD83_2011_WISCRS_CALUMET_FOND_DU_LAC_OUTAGAMIE_AND_WINNEBAGO_FTUS = 'urn:ogc:def:crs:EPSG::7594';

    /**
     * NAD83(2011) / WISCRS Calumet, Fond du Lac, Outagamie and Winnebago (m)
     * Extent: USA - Wisconsin - counties of Calumet, Fond du Lac, Outagamie and Winnebago
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined as separate zones for each county these
     * having identical parameter values: see info source. Original definition was referenced to NAD83(HARN). Working
     * units are feet - see CRS code 7594.
     */
    public const EPSG_NAD83_2011_WISCRS_CALUMET_FOND_DU_LAC_OUTAGAMIE_AND_WINNEBAGO_M = 'urn:ogc:def:crs:EPSG::7535';

    /**
     * NAD83(2011) / WISCRS Chippewa (ftUS)
     * Extent: USA - Wisconsin - Chippewa county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Original definition was referenced to NAD83(HARN).
     * Defined in meters - see CRS code 7536.
     */
    public const EPSG_NAD83_2011_WISCRS_CHIPPEWA_FTUS = 'urn:ogc:def:crs:EPSG::7595';

    /**
     * NAD83(2011) / WISCRS Chippewa (m)
     * Extent: USA - Wisconsin - Chippewa county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Original definition was referenced to NAD83(HARN).
     * Working units are feet - see CRS code 7595.
     */
    public const EPSG_NAD83_2011_WISCRS_CHIPPEWA_M = 'urn:ogc:def:crs:EPSG::7536';

    /**
     * NAD83(2011) / WISCRS Clark (ftUS)
     * Extent: USA - Wisconsin - Clark county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Original definition was referenced to NAD83(HARN).
     * Defined in meters - see CRS code 7537.
     */
    public const EPSG_NAD83_2011_WISCRS_CLARK_FTUS = 'urn:ogc:def:crs:EPSG::7596';

    /**
     * NAD83(2011) / WISCRS Clark (m)
     * Extent: USA - Wisconsin - Clark county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Original definition was referenced to NAD83(HARN).
     * Working units are feet - see CRS code 7596.
     */
    public const EPSG_NAD83_2011_WISCRS_CLARK_M = 'urn:ogc:def:crs:EPSG::7537';

    /**
     * NAD83(2011) / WISCRS Columbia (ftUS)
     * Extent: USA - Wisconsin - Columbia county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Original definition was referenced to NAD83(HARN).
     * Defined in meters - see CRS code 7538.
     */
    public const EPSG_NAD83_2011_WISCRS_COLUMBIA_FTUS = 'urn:ogc:def:crs:EPSG::7597';

    /**
     * NAD83(2011) / WISCRS Columbia (m)
     * Extent: USA - Wisconsin - Columbia county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Original definition was referenced to NAD83(HARN).
     * Working units are feet - see CRS code 7597.
     */
    public const EPSG_NAD83_2011_WISCRS_COLUMBIA_M = 'urn:ogc:def:crs:EPSG::7538';

    /**
     * NAD83(2011) / WISCRS Crawford (ftUS)
     * Extent: USA - Wisconsin - Crawford county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Original definition was referenced to NAD83(HARN).
     * Defined in meters - see CRS code 7539.
     */
    public const EPSG_NAD83_2011_WISCRS_CRAWFORD_FTUS = 'urn:ogc:def:crs:EPSG::7598';

    /**
     * NAD83(2011) / WISCRS Crawford (m)
     * Extent: USA - Wisconsin - Crawford county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Original definition was referenced to NAD83(HARN).
     * Working units are feet - see CRS code 7598.
     */
    public const EPSG_NAD83_2011_WISCRS_CRAWFORD_M = 'urn:ogc:def:crs:EPSG::7539';

    /**
     * NAD83(2011) / WISCRS Dane (ftUS)
     * Extent: USA - Wisconsin - Dane county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Original definition was referenced to NAD83(HARN).
     * Defined in meters - see CRS code 7540.
     */
    public const EPSG_NAD83_2011_WISCRS_DANE_FTUS = 'urn:ogc:def:crs:EPSG::7599';

    /**
     * NAD83(2011) / WISCRS Dane (m)
     * Extent: USA - Wisconsin - Dane county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Original definition was referenced to NAD83(HARN).
     * Working units are feet - see CRS code 7599.
     */
    public const EPSG_NAD83_2011_WISCRS_DANE_M = 'urn:ogc:def:crs:EPSG::7540';

    /**
     * NAD83(2011) / WISCRS Dodge and Jefferson (ftUS)
     * Extent: USA - Wisconsin - counties of Dodge and Jefferson
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined as separate zones for each county these
     * having identical parameter values: see info source. Original definition was referenced to NAD83(HARN). Defined
     * in meters - see CRS code 7541.
     */
    public const EPSG_NAD83_2011_WISCRS_DODGE_AND_JEFFERSON_FTUS = 'urn:ogc:def:crs:EPSG::7600';

    /**
     * NAD83(2011) / WISCRS Dodge and Jefferson (m)
     * Extent: USA - Wisconsin - counties of Dodge and Jefferson
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined as separate zones for each county these
     * having identical parameter values: see info source. Original definition was referenced to NAD83(HARN). Working
     * units are feet - see CRS code 7600.
     */
    public const EPSG_NAD83_2011_WISCRS_DODGE_AND_JEFFERSON_M = 'urn:ogc:def:crs:EPSG::7541';

    /**
     * NAD83(2011) / WISCRS Door (ftUS)
     * Extent: USA - Wisconsin - Door county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Original definition was referenced to NAD83(HARN).
     * Defined in meters - see CRS code 7542.
     */
    public const EPSG_NAD83_2011_WISCRS_DOOR_FTUS = 'urn:ogc:def:crs:EPSG::7601';

    /**
     * NAD83(2011) / WISCRS Door (m)
     * Extent: USA - Wisconsin - Door county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Original definition was referenced to NAD83(HARN).
     * Working units are feet - see CRS code 7601.
     */
    public const EPSG_NAD83_2011_WISCRS_DOOR_M = 'urn:ogc:def:crs:EPSG::7542';

    /**
     * NAD83(2011) / WISCRS Douglas (ftUS)
     * Extent: USA - Wisconsin - Douglas county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Original definition was referenced to NAD83(HARN).
     * Defined in meters - see CRS code 7543.
     */
    public const EPSG_NAD83_2011_WISCRS_DOUGLAS_FTUS = 'urn:ogc:def:crs:EPSG::7602';

    /**
     * NAD83(2011) / WISCRS Douglas (m)
     * Extent: USA - Wisconsin - Douglas county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Original definition was referenced to NAD83(HARN).
     * Working units are feet - see CRS code 7602.
     */
    public const EPSG_NAD83_2011_WISCRS_DOUGLAS_M = 'urn:ogc:def:crs:EPSG::7543';

    /**
     * NAD83(2011) / WISCRS Dunn (ftUS)
     * Extent: USA - Wisconsin - Dunn county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Original definition was referenced to NAD83(HARN).
     * Defined in meters - see CRS code 7544.
     */
    public const EPSG_NAD83_2011_WISCRS_DUNN_FTUS = 'urn:ogc:def:crs:EPSG::7603';

    /**
     * NAD83(2011) / WISCRS Dunn (m)
     * Extent: USA - Wisconsin - Dunn county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Original definition was referenced to NAD83(HARN).
     * Working units are feet - see CRS code 7603.
     */
    public const EPSG_NAD83_2011_WISCRS_DUNN_M = 'urn:ogc:def:crs:EPSG::7544';

    /**
     * NAD83(2011) / WISCRS Eau Claire (ftUS)
     * Extent: USA - Wisconsin - Eau Claire county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Original definition was referenced to NAD83(HARN).
     * Defined in meters - see CRS code 7545.
     */
    public const EPSG_NAD83_2011_WISCRS_EAU_CLAIRE_FTUS = 'urn:ogc:def:crs:EPSG::7604';

    /**
     * NAD83(2011) / WISCRS Eau Claire (m)
     * Extent: USA - Wisconsin - Eau Claire county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Original definition was referenced to NAD83(HARN).
     * Working units are feet - see CRS code 7604.
     */
    public const EPSG_NAD83_2011_WISCRS_EAU_CLAIRE_M = 'urn:ogc:def:crs:EPSG::7545';

    /**
     * NAD83(2011) / WISCRS Florence (ftUS)
     * Extent: USA - Wisconsin - Florence county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Original definition was referenced to NAD83(HARN).
     * Defined in meters - see CRS code 7546.
     */
    public const EPSG_NAD83_2011_WISCRS_FLORENCE_FTUS = 'urn:ogc:def:crs:EPSG::7605';

    /**
     * NAD83(2011) / WISCRS Florence (m)
     * Extent: USA - Wisconsin - Florence county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Original definition was referenced to NAD83(HARN).
     * Working units are feet - see CRS code 7605.
     */
    public const EPSG_NAD83_2011_WISCRS_FLORENCE_M = 'urn:ogc:def:crs:EPSG::7546';

    /**
     * NAD83(2011) / WISCRS Forest (ftUS)
     * Extent: USA - Wisconsin - Forest county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Original definition was referenced to NAD83(HARN).
     * Defined in meters - see CRS code 7547.
     */
    public const EPSG_NAD83_2011_WISCRS_FOREST_FTUS = 'urn:ogc:def:crs:EPSG::7606';

    /**
     * NAD83(2011) / WISCRS Forest (m)
     * Extent: USA - Wisconsin - Forest county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Original definition was referenced to NAD83(HARN).
     * Working units are feet - see CRS code 7606.
     */
    public const EPSG_NAD83_2011_WISCRS_FOREST_M = 'urn:ogc:def:crs:EPSG::7547';

    /**
     * NAD83(2011) / WISCRS Grant (ftUS)
     * Extent: USA - Wisconsin - Grant county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Original definition was referenced to NAD83(HARN).
     * Defined in meters - see CRS code 7548.
     */
    public const EPSG_NAD83_2011_WISCRS_GRANT_FTUS = 'urn:ogc:def:crs:EPSG::7607';

    /**
     * NAD83(2011) / WISCRS Grant (m)
     * Extent: USA - Wisconsin - Grant county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Original definition was referenced to NAD83(HARN).
     * Working units are feet - see CRS code 7607.
     */
    public const EPSG_NAD83_2011_WISCRS_GRANT_M = 'urn:ogc:def:crs:EPSG::7548';

    /**
     * NAD83(2011) / WISCRS Green Lake and Marquette (ftUS)
     * Extent: USA - Wisconsin - counties of Green Lake and Marquette
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined as separate zones for each county these
     * having identical parameter values: see info source. Original definition was referenced to NAD83(HARN). Defined
     * in meters - see CRS code 7550.
     */
    public const EPSG_NAD83_2011_WISCRS_GREEN_LAKE_AND_MARQUETTE_FTUS = 'urn:ogc:def:crs:EPSG::7609';

    /**
     * NAD83(2011) / WISCRS Green Lake and Marquette (m)
     * Extent: USA - Wisconsin - counties of Green Lake and Marquette
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined as separate zones for each county these
     * having identical parameter values: see info source. Original definition was referenced to NAD83(HARN). Working
     * units are feet - see CRS code 7609.
     */
    public const EPSG_NAD83_2011_WISCRS_GREEN_LAKE_AND_MARQUETTE_M = 'urn:ogc:def:crs:EPSG::7550';

    /**
     * NAD83(2011) / WISCRS Green and Lafayette (ftUS)
     * Extent: USA - Wisconsin - counties of Green and Lafayette
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined as separate zones for each county these
     * having identical parameter values: see info source. Original definition was referenced to NAD83(HARN). Defined
     * in meters - see CRS code 7549.
     */
    public const EPSG_NAD83_2011_WISCRS_GREEN_AND_LAFAYETTE_FTUS = 'urn:ogc:def:crs:EPSG::7608';

    /**
     * NAD83(2011) / WISCRS Green and Lafayette (m)
     * Extent: USA - Wisconsin - counties of Green and Lafayette
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined as separate zones for each county these
     * having identical parameter values: see info source. Original definition was referenced to NAD83(HARN). Working
     * units are feet - see CRS code 7608.
     */
    public const EPSG_NAD83_2011_WISCRS_GREEN_AND_LAFAYETTE_M = 'urn:ogc:def:crs:EPSG::7549';

    /**
     * NAD83(2011) / WISCRS Iowa (ftUS)
     * Extent: USA - Wisconsin - Iowa county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Original definition was referenced to NAD83(HARN).
     * Defined in meters - see CRS code 7551.
     */
    public const EPSG_NAD83_2011_WISCRS_IOWA_FTUS = 'urn:ogc:def:crs:EPSG::7610';

    /**
     * NAD83(2011) / WISCRS Iowa (m)
     * Extent: USA - Wisconsin - Iowa county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Original definition was referenced to NAD83(HARN).
     * Working units are feet - see CRS code 7610.
     */
    public const EPSG_NAD83_2011_WISCRS_IOWA_M = 'urn:ogc:def:crs:EPSG::7551';

    /**
     * NAD83(2011) / WISCRS Iron (ftUS)
     * Extent: USA - Wisconsin - Iron county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Original definition was referenced to NAD83(HARN).
     * Defined in meters - see CRS code 7552.
     */
    public const EPSG_NAD83_2011_WISCRS_IRON_FTUS = 'urn:ogc:def:crs:EPSG::7611';

    /**
     * NAD83(2011) / WISCRS Iron (m)
     * Extent: USA - Wisconsin - Iron county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Original definition was referenced to NAD83(HARN).
     * Working units are feet - see CRS code 7611.
     */
    public const EPSG_NAD83_2011_WISCRS_IRON_M = 'urn:ogc:def:crs:EPSG::7552';

    /**
     * NAD83(2011) / WISCRS Jackson (ftUS)
     * Extent: USA - Wisconsin - Jackson county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Original definition was referenced to NAD83(HARN).
     * Defined in meters - see CRS code 7553.
     */
    public const EPSG_NAD83_2011_WISCRS_JACKSON_FTUS = 'urn:ogc:def:crs:EPSG::7612';

    /**
     * NAD83(2011) / WISCRS Jackson (m)
     * Extent: USA - Wisconsin - Jackson county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Original definition was referenced to NAD83(HARN).
     * Working units are feet - see CRS code 7612.
     */
    public const EPSG_NAD83_2011_WISCRS_JACKSON_M = 'urn:ogc:def:crs:EPSG::7553';

    /**
     * NAD83(2011) / WISCRS Kenosha, Milwaukee, Ozaukee and Racine (ftUS)
     * Extent: USA - Wisconsin - counties of Kenosha, Milwaukee, Ozaukee and Racine
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined as separate zones for each county these
     * having identical parameter values: see info source. Original definition was referenced to NAD83(HARN). Defined
     * in meters - see CRS code 7554.
     */
    public const EPSG_NAD83_2011_WISCRS_KENOSHA_MILWAUKEE_OZAUKEE_AND_RACINE_FTUS = 'urn:ogc:def:crs:EPSG::7613';

    /**
     * NAD83(2011) / WISCRS Kenosha, Milwaukee, Ozaukee and Racine (m)
     * Extent: USA - Wisconsin - counties of Kenosha, Milwaukee, Ozaukee and Racine
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined as separate zones for each county these
     * having identical parameter values: see info source. Original definition was referenced to NAD83(HARN). Working
     * units are feet - see CRS code 7613.
     */
    public const EPSG_NAD83_2011_WISCRS_KENOSHA_MILWAUKEE_OZAUKEE_AND_RACINE_M = 'urn:ogc:def:crs:EPSG::7554';

    /**
     * NAD83(2011) / WISCRS Kewaunee, Manitowoc and Sheboygan (ftUS)
     * Extent: USA - Wisconsin - counties of Kewaunee, Manitowoc and Sheboygan
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined as separate zones for each county these
     * having identical parameter values: see info source. Original definition was referenced to NAD83(HARN). Defined
     * in meters - see CRS code 7555.
     */
    public const EPSG_NAD83_2011_WISCRS_KEWAUNEE_MANITOWOC_AND_SHEBOYGAN_FTUS = 'urn:ogc:def:crs:EPSG::7614';

    /**
     * NAD83(2011) / WISCRS Kewaunee, Manitowoc and Sheboygan (m)
     * Extent: USA - Wisconsin - counties of Kewaunee, Manitowoc and Sheboygan
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined as separate zones for each county these
     * having identical parameter values: see info source. Original definition was referenced to NAD83(HARN). Working
     * units are feet - see CRS code 7614.
     */
    public const EPSG_NAD83_2011_WISCRS_KEWAUNEE_MANITOWOC_AND_SHEBOYGAN_M = 'urn:ogc:def:crs:EPSG::7555';

    /**
     * NAD83(2011) / WISCRS La Crosse (ftUS)
     * Extent: USA - Wisconsin - La Crosse county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Original definition was referenced to NAD83(HARN).
     * Defined in meters - see CRS code 7556.
     */
    public const EPSG_NAD83_2011_WISCRS_LA_CROSSE_FTUS = 'urn:ogc:def:crs:EPSG::7615';

    /**
     * NAD83(2011) / WISCRS La Crosse (m)
     * Extent: USA - Wisconsin - La Crosse county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Original definition was referenced to NAD83(HARN).
     * Working units are feet - see CRS code 7615.
     */
    public const EPSG_NAD83_2011_WISCRS_LA_CROSSE_M = 'urn:ogc:def:crs:EPSG::7556';

    /**
     * NAD83(2011) / WISCRS Langlade (ftUS)
     * Extent: USA - Wisconsin - Langlade county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Original definition was referenced to NAD83(HARN).
     * Defined in meters - see CRS code 7557.
     */
    public const EPSG_NAD83_2011_WISCRS_LANGLADE_FTUS = 'urn:ogc:def:crs:EPSG::7616';

    /**
     * NAD83(2011) / WISCRS Langlade (m)
     * Extent: USA - Wisconsin - Langlade county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Original definition was referenced to NAD83(HARN).
     * Working units are feet - see CRS code 7616.
     */
    public const EPSG_NAD83_2011_WISCRS_LANGLADE_M = 'urn:ogc:def:crs:EPSG::7557';

    /**
     * NAD83(2011) / WISCRS Lincoln (ftUS)
     * Extent: USA - Wisconsin - Lincoln county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Original definition was referenced to NAD83(HARN).
     * Defined in meters - see CRS code 7558.
     */
    public const EPSG_NAD83_2011_WISCRS_LINCOLN_FTUS = 'urn:ogc:def:crs:EPSG::7617';

    /**
     * NAD83(2011) / WISCRS Lincoln (m)
     * Extent: USA - Wisconsin - Lincoln county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Original definition was referenced to NAD83(HARN).
     * Working units are feet - see CRS code 7617.
     */
    public const EPSG_NAD83_2011_WISCRS_LINCOLN_M = 'urn:ogc:def:crs:EPSG::7558';

    /**
     * NAD83(2011) / WISCRS Marathon (ftUS)
     * Extent: USA - Wisconsin - Marathon county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Original definition was referenced to NAD83(HARN).
     * Defined in meters - see CRS code 7559.
     */
    public const EPSG_NAD83_2011_WISCRS_MARATHON_FTUS = 'urn:ogc:def:crs:EPSG::7618';

    /**
     * NAD83(2011) / WISCRS Marathon (m)
     * Extent: USA - Wisconsin - Marathon county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Original definition was referenced to NAD83(HARN).
     * Working units are feet - see CRS code 7618.
     */
    public const EPSG_NAD83_2011_WISCRS_MARATHON_M = 'urn:ogc:def:crs:EPSG::7559';

    /**
     * NAD83(2011) / WISCRS Marinette (ftUS)
     * Extent: USA - Wisconsin - Marinette county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Original definition was referenced to NAD83(HARN).
     * Defined in meters - see CRS code 7560.
     */
    public const EPSG_NAD83_2011_WISCRS_MARINETTE_FTUS = 'urn:ogc:def:crs:EPSG::7619';

    /**
     * NAD83(2011) / WISCRS Marinette (m)
     * Extent: USA - Wisconsin - Marinette county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Original definition was referenced to NAD83(HARN).
     * Working units are feet - see CRS code 7619.
     */
    public const EPSG_NAD83_2011_WISCRS_MARINETTE_M = 'urn:ogc:def:crs:EPSG::7560';

    /**
     * NAD83(2011) / WISCRS Menominee (ftUS)
     * Extent: USA - Wisconsin - Menominee county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Original definition was referenced to NAD83(HARN).
     * Defined in meters - see CRS code 7561.
     */
    public const EPSG_NAD83_2011_WISCRS_MENOMINEE_FTUS = 'urn:ogc:def:crs:EPSG::7620';

    /**
     * NAD83(2011) / WISCRS Menominee (m)
     * Extent: USA - Wisconsin - Menominee county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Original definition was referenced to NAD83(HARN).
     * Working units are feet - see CRS code 7620.
     */
    public const EPSG_NAD83_2011_WISCRS_MENOMINEE_M = 'urn:ogc:def:crs:EPSG::7561';

    /**
     * NAD83(2011) / WISCRS Monroe (ftUS)
     * Extent: USA - Wisconsin - Monroe county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Original definition was referenced to NAD83(HARN).
     * Defined in meters - see CRS code 7562.
     */
    public const EPSG_NAD83_2011_WISCRS_MONROE_FTUS = 'urn:ogc:def:crs:EPSG::7621';

    /**
     * NAD83(2011) / WISCRS Monroe (m)
     * Extent: USA - Wisconsin - Monroe county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Original definition was referenced to NAD83(HARN).
     * Working units are feet - see CRS code 7621.
     */
    public const EPSG_NAD83_2011_WISCRS_MONROE_M = 'urn:ogc:def:crs:EPSG::7562';

    /**
     * NAD83(2011) / WISCRS Oconto (ftUS)
     * Extent: USA - Wisconsin - Oconto county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Original definition was referenced to NAD83(HARN).
     * Defined in meters - see CRS code 7563.
     */
    public const EPSG_NAD83_2011_WISCRS_OCONTO_FTUS = 'urn:ogc:def:crs:EPSG::7622';

    /**
     * NAD83(2011) / WISCRS Oconto (m)
     * Extent: USA - Wisconsin - Oconto county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Original definition was referenced to NAD83(HARN).
     * Working units are feet - see CRS code 7622.
     */
    public const EPSG_NAD83_2011_WISCRS_OCONTO_M = 'urn:ogc:def:crs:EPSG::7563';

    /**
     * NAD83(2011) / WISCRS Oneida (ftUS)
     * Extent: USA - Wisconsin - Oneida county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Original definition was referenced to NAD83(HARN).
     * Defined in meters - see CRS code 7564.
     */
    public const EPSG_NAD83_2011_WISCRS_ONEIDA_FTUS = 'urn:ogc:def:crs:EPSG::7623';

    /**
     * NAD83(2011) / WISCRS Oneida (m)
     * Extent: USA - Wisconsin - Oneida county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Original definition was referenced to NAD83(HARN).
     * Working units are feet - see CRS code 7623.
     */
    public const EPSG_NAD83_2011_WISCRS_ONEIDA_M = 'urn:ogc:def:crs:EPSG::7564';

    /**
     * NAD83(2011) / WISCRS Pepin and Pierce (ftUS)
     * Extent: USA - Wisconsin - counties of Pepin and Pierce
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined as separate zones for each county these
     * having identical parameter values: see info source. Original definition was referenced to NAD83(HARN). Defined
     * in meters - see CRS code 7565.
     */
    public const EPSG_NAD83_2011_WISCRS_PEPIN_AND_PIERCE_FTUS = 'urn:ogc:def:crs:EPSG::7624';

    /**
     * NAD83(2011) / WISCRS Pepin and Pierce (m)
     * Extent: USA - Wisconsin - counties of Pepin and Pierce
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined as separate zones for each county these
     * having identical parameter values: see info source. Original definition was referenced to NAD83(HARN). Working
     * units are feet - see CRS code 7624.
     */
    public const EPSG_NAD83_2011_WISCRS_PEPIN_AND_PIERCE_M = 'urn:ogc:def:crs:EPSG::7565';

    /**
     * NAD83(2011) / WISCRS Polk (ftUS)
     * Extent: USA - Wisconsin - Polk county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Original definition was referenced to NAD83(HARN).
     * Defined in meters - see CRS code 7566.
     */
    public const EPSG_NAD83_2011_WISCRS_POLK_FTUS = 'urn:ogc:def:crs:EPSG::7625';

    /**
     * NAD83(2011) / WISCRS Polk (m)
     * Extent: USA - Wisconsin - Polk county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Original definition was referenced to NAD83(HARN).
     * Working units are feet - see CRS code 7625.
     */
    public const EPSG_NAD83_2011_WISCRS_POLK_M = 'urn:ogc:def:crs:EPSG::7566';

    /**
     * NAD83(2011) / WISCRS Portage (ftUS)
     * Extent: USA - Wisconsin - Portage county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Original definition was referenced to NAD83(HARN).
     * Defined in meters - see CRS code 7567.
     */
    public const EPSG_NAD83_2011_WISCRS_PORTAGE_FTUS = 'urn:ogc:def:crs:EPSG::7626';

    /**
     * NAD83(2011) / WISCRS Portage (m)
     * Extent: USA - Wisconsin - Portage county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Original definition was referenced to NAD83(HARN).
     * Working units are feet - see CRS code 7626.
     */
    public const EPSG_NAD83_2011_WISCRS_PORTAGE_M = 'urn:ogc:def:crs:EPSG::7567';

    /**
     * NAD83(2011) / WISCRS Price (ftUS)
     * Extent: USA - Wisconsin - Price county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Original definition was referenced to NAD83(HARN).
     * Defined in meters - see CRS code 7568.
     */
    public const EPSG_NAD83_2011_WISCRS_PRICE_FTUS = 'urn:ogc:def:crs:EPSG::7627';

    /**
     * NAD83(2011) / WISCRS Price (m)
     * Extent: USA - Wisconsin - Price county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Original definition was referenced to NAD83(HARN).
     * Working units are feet - see CRS code 7627.
     */
    public const EPSG_NAD83_2011_WISCRS_PRICE_M = 'urn:ogc:def:crs:EPSG::7568';

    /**
     * NAD83(2011) / WISCRS Richland (ftUS)
     * Extent: USA - Wisconsin - Richland county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Original definition was referenced to NAD83(HARN).
     * Defined in meters - see CRS code 7569.
     */
    public const EPSG_NAD83_2011_WISCRS_RICHLAND_FTUS = 'urn:ogc:def:crs:EPSG::7628';

    /**
     * NAD83(2011) / WISCRS Richland (m)
     * Extent: USA - Wisconsin - Richland county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Original definition was referenced to NAD83(HARN).
     * Working units are feet - see CRS code 7628.
     */
    public const EPSG_NAD83_2011_WISCRS_RICHLAND_M = 'urn:ogc:def:crs:EPSG::7569';

    /**
     * NAD83(2011) / WISCRS Rock (ftUS)
     * Extent: USA - Wisconsin - Rock county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Original definition was referenced to NAD83(HARN).
     * Defined in meters - see CRS code 7570.
     */
    public const EPSG_NAD83_2011_WISCRS_ROCK_FTUS = 'urn:ogc:def:crs:EPSG::7629';

    /**
     * NAD83(2011) / WISCRS Rock (m)
     * Extent: USA - Wisconsin - Rock county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Original definition was referenced to NAD83(HARN).
     * Working units are feet - see CRS code 7629.
     */
    public const EPSG_NAD83_2011_WISCRS_ROCK_M = 'urn:ogc:def:crs:EPSG::7570';

    /**
     * NAD83(2011) / WISCRS Rusk (ftUS)
     * Extent: USA - Wisconsin - Rusk county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Original definition was referenced to NAD83(HARN).
     * Defined in meters - see CRS code 7571.
     */
    public const EPSG_NAD83_2011_WISCRS_RUSK_FTUS = 'urn:ogc:def:crs:EPSG::7630';

    /**
     * NAD83(2011) / WISCRS Rusk (m)
     * Extent: USA - Wisconsin - Rusk county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Original definition was referenced to NAD83(HARN).
     * Working units are feet - see CRS code 7630.
     */
    public const EPSG_NAD83_2011_WISCRS_RUSK_M = 'urn:ogc:def:crs:EPSG::7571';

    /**
     * NAD83(2011) / WISCRS Sauk (ftUS)
     * Extent: USA - Wisconsin - Sauk county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Original definition was referenced to NAD83(HARN).
     * Defined in meters - see CRS code 7572.
     */
    public const EPSG_NAD83_2011_WISCRS_SAUK_FTUS = 'urn:ogc:def:crs:EPSG::7631';

    /**
     * NAD83(2011) / WISCRS Sauk (m)
     * Extent: USA - Wisconsin - Sauk county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Original definition was referenced to NAD83(HARN).
     * Working units are feet - see CRS code 7631.
     */
    public const EPSG_NAD83_2011_WISCRS_SAUK_M = 'urn:ogc:def:crs:EPSG::7572';

    /**
     * NAD83(2011) / WISCRS Sawyer (ftUS)
     * Extent: USA - Wisconsin - Sawyer county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Original definition was referenced to NAD83(HARN).
     * Defined in meters - see CRS code 7573.
     */
    public const EPSG_NAD83_2011_WISCRS_SAWYER_FTUS = 'urn:ogc:def:crs:EPSG::7632';

    /**
     * NAD83(2011) / WISCRS Sawyer (m)
     * Extent: USA - Wisconsin - Sawyer county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Original definition was referenced to NAD83(HARN).
     * Working units are feet - see CRS code 7632.
     */
    public const EPSG_NAD83_2011_WISCRS_SAWYER_M = 'urn:ogc:def:crs:EPSG::7573';

    /**
     * NAD83(2011) / WISCRS Shawano (ftUS)
     * Extent: USA - Wisconsin - Shawano county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Original definition was referenced to NAD83(HARN).
     * Defined in meters - see CRS code 7574.
     */
    public const EPSG_NAD83_2011_WISCRS_SHAWANO_FTUS = 'urn:ogc:def:crs:EPSG::7633';

    /**
     * NAD83(2011) / WISCRS Shawano (m)
     * Extent: USA - Wisconsin - Shawano county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Original definition was referenced to NAD83(HARN).
     * Working units are feet - see CRS code 7633.
     */
    public const EPSG_NAD83_2011_WISCRS_SHAWANO_M = 'urn:ogc:def:crs:EPSG::7574';

    /**
     * NAD83(2011) / WISCRS St. Croix (ftUS)
     * Extent: USA - Wisconsin - St. Croix county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Original definition was referenced to NAD83(HARN).
     * Defined in meters - see CRS code 7575.
     */
    public const EPSG_NAD83_2011_WISCRS_ST_CROIX_FTUS = 'urn:ogc:def:crs:EPSG::7634';

    /**
     * NAD83(2011) / WISCRS St. Croix (m)
     * Extent: USA - Wisconsin - St. Croix county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Original definition was referenced to NAD83(HARN).
     * Working units are feet - see CRS code 7634.
     */
    public const EPSG_NAD83_2011_WISCRS_ST_CROIX_M = 'urn:ogc:def:crs:EPSG::7575';

    /**
     * NAD83(2011) / WISCRS Taylor (ftUS)
     * Extent: USA - Wisconsin - Taylor county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Original definition was referenced to NAD83(HARN).
     * Defined in meters - see CRS code 7576.
     */
    public const EPSG_NAD83_2011_WISCRS_TAYLOR_FTUS = 'urn:ogc:def:crs:EPSG::7635';

    /**
     * NAD83(2011) / WISCRS Taylor (m)
     * Extent: USA - Wisconsin - Taylor county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Original definition was referenced to NAD83(HARN).
     * Working units are feet - see CRS code 7635.
     */
    public const EPSG_NAD83_2011_WISCRS_TAYLOR_M = 'urn:ogc:def:crs:EPSG::7576';

    /**
     * NAD83(2011) / WISCRS Trempealeau (ftUS)
     * Extent: USA - Wisconsin - Trempealeau county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Original definition was referenced to NAD83(HARN).
     * Defined in meters - see CRS code 7577.
     */
    public const EPSG_NAD83_2011_WISCRS_TREMPEALEAU_FTUS = 'urn:ogc:def:crs:EPSG::7636';

    /**
     * NAD83(2011) / WISCRS Trempealeau (m)
     * Extent: USA - Wisconsin - Trempealeau county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Original definition was referenced to NAD83(HARN).
     * Working units are feet - see CRS code 7636.
     */
    public const EPSG_NAD83_2011_WISCRS_TREMPEALEAU_M = 'urn:ogc:def:crs:EPSG::7577';

    /**
     * NAD83(2011) / WISCRS Vernon (ftUS)
     * Extent: USA - Wisconsin - Vernon county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Original definition was referenced to NAD83(HARN).
     * Defined in meters - see CRS code 7578.
     */
    public const EPSG_NAD83_2011_WISCRS_VERNON_FTUS = 'urn:ogc:def:crs:EPSG::7637';

    /**
     * NAD83(2011) / WISCRS Vernon (m)
     * Extent: USA - Wisconsin - Vernon county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Original definition was referenced to NAD83(HARN).
     * Working units are feet - see CRS code 7637.
     */
    public const EPSG_NAD83_2011_WISCRS_VERNON_M = 'urn:ogc:def:crs:EPSG::7578';

    /**
     * NAD83(2011) / WISCRS Vilas (ftUS)
     * Extent: USA - Wisconsin - Vilas county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Original definition was referenced to NAD83(HARN).
     * Defined in meters - see CRS code 7579.
     */
    public const EPSG_NAD83_2011_WISCRS_VILAS_FTUS = 'urn:ogc:def:crs:EPSG::7638';

    /**
     * NAD83(2011) / WISCRS Vilas (m)
     * Extent: USA - Wisconsin - Vilas county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Original definition was referenced to NAD83(HARN).
     * Working units are feet - see CRS code 7638.
     */
    public const EPSG_NAD83_2011_WISCRS_VILAS_M = 'urn:ogc:def:crs:EPSG::7579';

    /**
     * NAD83(2011) / WISCRS Walworth (ftUS)
     * Extent: USA - Wisconsin - Walworth county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Original definition was referenced to NAD83(HARN).
     * Defined in meters - see CRS code 7580.
     */
    public const EPSG_NAD83_2011_WISCRS_WALWORTH_FTUS = 'urn:ogc:def:crs:EPSG::7639';

    /**
     * NAD83(2011) / WISCRS Walworth (m)
     * Extent: USA - Wisconsin - Walworth county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Original definition was referenced to NAD83(HARN).
     * Working units are feet - see CRS code 7639.
     */
    public const EPSG_NAD83_2011_WISCRS_WALWORTH_M = 'urn:ogc:def:crs:EPSG::7580';

    /**
     * NAD83(2011) / WISCRS Washburn (ftUS)
     * Extent: USA - Wisconsin - Washburn county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Original definition was referenced to NAD83(HARN).
     * Defined in meters - see CRS code 7581.
     */
    public const EPSG_NAD83_2011_WISCRS_WASHBURN_FTUS = 'urn:ogc:def:crs:EPSG::7640';

    /**
     * NAD83(2011) / WISCRS Washburn (m)
     * Extent: USA - Wisconsin - Washburn county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Original definition was referenced to NAD83(HARN).
     * Working units are feet - see CRS code 7640.
     */
    public const EPSG_NAD83_2011_WISCRS_WASHBURN_M = 'urn:ogc:def:crs:EPSG::7581';

    /**
     * NAD83(2011) / WISCRS Washington (ftUS)
     * Extent: USA - Wisconsin - Washington county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Original definition was referenced to NAD83(HARN).
     * Defined in meters - see CRS code 7582.
     */
    public const EPSG_NAD83_2011_WISCRS_WASHINGTON_FTUS = 'urn:ogc:def:crs:EPSG::7641';

    /**
     * NAD83(2011) / WISCRS Washington (m)
     * Extent: USA - Wisconsin - Washington county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Original definition was referenced to NAD83(HARN).
     * Working units are feet - see CRS code 7641.
     */
    public const EPSG_NAD83_2011_WISCRS_WASHINGTON_M = 'urn:ogc:def:crs:EPSG::7582';

    /**
     * NAD83(2011) / WISCRS Waukesha (ftUS)
     * Extent: USA - Wisconsin - Waukesha county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Original definition was referenced to NAD83(HARN).
     * Defined in meters - see CRS code 7583.
     */
    public const EPSG_NAD83_2011_WISCRS_WAUKESHA_FTUS = 'urn:ogc:def:crs:EPSG::7642';

    /**
     * NAD83(2011) / WISCRS Waukesha (m)
     * Extent: USA - Wisconsin - Waukesha county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Original definition was referenced to NAD83(HARN).
     * Working units are feet - see CRS code 7642.
     */
    public const EPSG_NAD83_2011_WISCRS_WAUKESHA_M = 'urn:ogc:def:crs:EPSG::7583';

    /**
     * NAD83(2011) / WISCRS Waupaca (ftUS)
     * Extent: USA - Wisconsin - Waupaca county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Original definition was referenced to NAD83(HARN).
     * Defined in meters - see CRS code 7584.
     */
    public const EPSG_NAD83_2011_WISCRS_WAUPACA_FTUS = 'urn:ogc:def:crs:EPSG::7643';

    /**
     * NAD83(2011) / WISCRS Waupaca (m)
     * Extent: USA - Wisconsin - Waupaca county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Original definition was referenced to NAD83(HARN).
     * Working units are feet - see CRS code 7643.
     */
    public const EPSG_NAD83_2011_WISCRS_WAUPACA_M = 'urn:ogc:def:crs:EPSG::7584';

    /**
     * NAD83(2011) / WISCRS Waushara (ftUS)
     * Extent: USA - Wisconsin - Waushara county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Original definition was referenced to NAD83(HARN).
     * Defined in meters - see CRS code 7585.
     */
    public const EPSG_NAD83_2011_WISCRS_WAUSHARA_FTUS = 'urn:ogc:def:crs:EPSG::7644';

    /**
     * NAD83(2011) / WISCRS Waushara (m)
     * Extent: USA - Wisconsin - Waushara county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Original definition was referenced to NAD83(HARN).
     * Working units are feet - see CRS code 7644.
     */
    public const EPSG_NAD83_2011_WISCRS_WAUSHARA_M = 'urn:ogc:def:crs:EPSG::7585';

    /**
     * NAD83(2011) / WISCRS Wood (ftUS)
     * Extent: USA - Wisconsin - Wood county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Original definition was referenced to NAD83(HARN).
     * Defined in meters - see CRS code 7586.
     */
    public const EPSG_NAD83_2011_WISCRS_WOOD_FTUS = 'urn:ogc:def:crs:EPSG::7645';

    /**
     * NAD83(2011) / WISCRS Wood (m)
     * Extent: USA - Wisconsin - Wood county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Original definition was referenced to NAD83(HARN).
     * Working units are feet - see CRS code 7645.
     */
    public const EPSG_NAD83_2011_WISCRS_WOOD_M = 'urn:ogc:def:crs:EPSG::7586';

    /**
     * NAD83(2011) / Washington North
     * Extent: USA - Washington - counties of Chelan; Clallam; Douglas; Ferry; Grant north of approximately 47°30'N;
     * Island; Jefferson; King; Kitsap; Lincoln; Okanogan; Pend Oreille; San Juan; Skagit; Snohomish; Spokane; Stevens;
     * Whatcom
     * State law defines use of US survey feet. See code 6597 for equivalent non-metric definition. Replaces
     * NAD83(NSRS2007) / Washington North (CRS code 3689).
     */
    public const EPSG_NAD83_2011_WASHINGTON_NORTH = 'urn:ogc:def:crs:EPSG::6596';

    /**
     * NAD83(2011) / Washington North (ftUS)
     * Extent: USA - Washington - counties of Chelan; Clallam; Douglas; Ferry; Grant north of approximately 47°30'N;
     * Island; Jefferson; King; Kitsap; Lincoln; Okanogan; Pend Oreille; San Juan; Skagit; Snohomish; Spokane; Stevens;
     * Whatcom
     * State law defines use of US survey feet. Federal definition is metric - see code 6596. Replaces NAD83(NSRS2007)
     * / Washington North (ftUS) (CRS code 3690).
     */
    public const EPSG_NAD83_2011_WASHINGTON_NORTH_FTUS = 'urn:ogc:def:crs:EPSG::6597';

    /**
     * NAD83(2011) / Washington South
     * Extent: USA - Washington - counties of Adams; Asotin; Benton; Clark; Columbia; Cowlitz; Franklin; Garfield;
     * Grant south of approximately 47°30'N; Grays Harbor; Kittitas; Klickitat; Lewis; Mason; Pacific; Pierce;
     * Skamania; Thurston; Wahkiakum; Walla Walla; Whitman; Yakima
     * State law defines use of US survey feet. See code 6599 for equivalent non-metric definition. Replaces
     * NAD83(NSRS2007) / Washington South (CRS code 3691).
     */
    public const EPSG_NAD83_2011_WASHINGTON_SOUTH = 'urn:ogc:def:crs:EPSG::6598';

    /**
     * NAD83(2011) / Washington South (ftUS)
     * Extent: USA - Washington - counties of Adams; Asotin; Benton; Clark; Columbia; Cowlitz; Franklin; Garfield;
     * Grant south of approximately 47°30'N; Grays Harbor; Kittitas; Klickitat; Lewis; Mason; Pacific; Pierce;
     * Skamania; Thurston; Wahkiakum; Walla Walla; Whitman; Yakima
     * State law defines use of US survey feet. Federal definition is metric - see code 6598. Replaces NAD83(NSRS2007)
     * / Washington South (ftUS) (CRS code 3692).
     */
    public const EPSG_NAD83_2011_WASHINGTON_SOUTH_FTUS = 'urn:ogc:def:crs:EPSG::6599';

    /**
     * NAD83(2011) / West Virginia North
     * Extent: USA - West Virginia - counties of Barbour; Berkeley; Brooke; Doddridge; Grant; Hampshire; Hancock;
     * Hardy; Harrison; Jefferson; Marion; Marshall; Mineral; Monongalia; Morgan; Ohio; Pleasants; Preston; Ritchie;
     * Taylor; Tucker; Tyler; Wetzel; Wirt; Wood
     * State law defines system in US survey feet. See CRS code 6601 for equivalent non-metric definition. Replaces
     * NAD83(NSRS2007) / West Virginia North (CRS code 3693).
     */
    public const EPSG_NAD83_2011_WEST_VIRGINIA_NORTH = 'urn:ogc:def:crs:EPSG::6600';

    /**
     * NAD83(2011) / West Virginia North (ftUS)
     * Extent: USA - West Virginia - counties of Barbour; Berkeley; Brooke; Doddridge; Grant; Hampshire; Hancock;
     * Hardy; Harrison; Jefferson; Marion; Marshall; Mineral; Monongalia; Morgan; Ohio; Pleasants; Preston; Ritchie;
     * Taylor; Tucker; Tyler; Wetzel; Wirt; Wood
     * State law defines use of US survey feet. Federal definition is metric - see code 6600. Replaces NAD83(NSRS2007)
     * / West Virginia North (ftUS) (CRS code 26869).
     */
    public const EPSG_NAD83_2011_WEST_VIRGINIA_NORTH_FTUS = 'urn:ogc:def:crs:EPSG::6601';

    /**
     * NAD83(2011) / West Virginia South
     * Extent: USA - West Virginia - counties of Boone; Braxton; Cabell; Calhoun; Clay; Fayette; Gilmer; Greenbrier;
     * Jackson; Kanawha; Lewis; Lincoln; Logan; Mason; McDowell; Mercer; Mingo; Monroe; Nicholas; Pendleton;
     * Pocahontas; Putnam; Raleigh; Randolph; Roane; Summers; Upshur; Wayne; Webster; Wyoming
     * State law defines system in US survey feet. See CRS code 6603 for equivalent non-metric definition. Replaces
     * NAD83(NSRS2007) / West Virginia South (CRS code 3694).
     */
    public const EPSG_NAD83_2011_WEST_VIRGINIA_SOUTH = 'urn:ogc:def:crs:EPSG::6602';

    /**
     * NAD83(2011) / West Virginia South (ftUS)
     * Extent: USA - West Virginia - counties of Boone; Braxton; Cabell; Calhoun; Clay; Fayette; Gilmer; Greenbrier;
     * Jackson; Kanawha; Lewis; Lincoln; Logan; Mason; McDowell; Mercer; Mingo; Monroe; Nicholas; Pendleton;
     * Pocahontas; Putnam; Raleigh; Randolph; Roane; Summers; Upshur; Wayne; Webster; Wyoming
     * State law defines use of US survey feet. Federal definition is metric - see code 6602. Replaces NAD83(NSRS2007)
     * / West Virginia South (ftUS) (CRS code 26870).
     */
    public const EPSG_NAD83_2011_WEST_VIRGINIA_SOUTH_FTUS = 'urn:ogc:def:crs:EPSG::6603';

    /**
     * NAD83(2011) / Wisconsin Central
     * Extent: USA - Wisconsin - counties of Barron; Brown; Buffalo; Chippewa; Clark; Door; Dunn; Eau Claire; Jackson;
     * Kewaunee; Langlade; Lincoln; Marathon; Marinette; Menominee; Oconto; Outagamie; Pepin; Pierce; Polk; Portage;
     * Rusk; Shawano; St Croix; Taylor; Trempealeau; Waupaca; Wood
     * State law defines use of US survey feet. See code 6605 for equivalent non-metric definition. Replaces
     * NAD83(NSRS2007) / Wisconsin Central (3695).
     */
    public const EPSG_NAD83_2011_WISCONSIN_CENTRAL = 'urn:ogc:def:crs:EPSG::6879';

    /**
     * NAD83(2011) / Wisconsin Central (ftUS)
     * Extent: USA - Wisconsin - counties of Barron; Brown; Buffalo; Chippewa; Clark; Door; Dunn; Eau Claire; Jackson;
     * Kewaunee; Langlade; Lincoln; Marathon; Marinette; Menominee; Oconto; Outagamie; Pepin; Pierce; Polk; Portage;
     * Rusk; Shawano; St Croix; Taylor; Trempealeau; Waupaca; Wood
     * State law defines use of US survey feet. Federal definition is metric - see code 6604. Replaces NAD83(NSRS2007)
     * / Wisconsin Central (ftUS) (CRS code 3696).
     */
    public const EPSG_NAD83_2011_WISCONSIN_CENTRAL_FTUS = 'urn:ogc:def:crs:EPSG::6605';

    /**
     * NAD83(2011) / Wisconsin North
     * Extent: USA - Wisconsin - counties of Ashland; Bayfield; Burnett; Douglas; Florence; Forest; Iron; Oneida;
     * Price; Sawyer; Vilas; Washburn
     * State law defines use of US survey feet. See code 6607 for equivalent non-metric definition. Replaces
     * NAD83(NSRS2007) / Wisconsin North (CRS code 3697).
     */
    public const EPSG_NAD83_2011_WISCONSIN_NORTH = 'urn:ogc:def:crs:EPSG::6606';

    /**
     * NAD83(2011) / Wisconsin North (ftUS)
     * Extent: USA - Wisconsin - counties of Ashland; Bayfield; Burnett; Douglas; Florence; Forest; Iron; Oneida;
     * Price; Sawyer; Vilas; Washburn
     * State law defines use of US survey feet. Federal definition is metric - see code 6606. Replaces NAD83(NSRS2007)
     * / Wisconsin North (ftUS) (CRS code 3698).
     */
    public const EPSG_NAD83_2011_WISCONSIN_NORTH_FTUS = 'urn:ogc:def:crs:EPSG::6607';

    /**
     * NAD83(2011) / Wisconsin South
     * Extent: USA - Wisconsin - counties of Adams; Calumet; Columbia; Crawford; Dane; Dodge; Fond Du Lac; Grant;
     * Green; Green Lake; Iowa; Jefferson; Juneau; Kenosha; La Crosse; Lafayette; Manitowoc; Marquette; Milwaukee;
     * Monroe; Ozaukee; Racine; Richland; Rock; Sauk; Sheboygan; Vernon; Walworth; Washington; Waukesha; Waushara;
     * Winnebago
     * State law defines use of US survey feet. See code 6609 for equivalent non-metric definition. Replaces
     * NAD83(NSRS2007) / Wisconsin South (CRS code 3699).
     */
    public const EPSG_NAD83_2011_WISCONSIN_SOUTH = 'urn:ogc:def:crs:EPSG::6608';

    /**
     * NAD83(2011) / Wisconsin South (ftUS)
     * Extent: USA - Wisconsin - counties of Adams; Calumet; Columbia; Crawford; Dane; Dodge; Fond Du Lac; Grant;
     * Green; Green Lake; Iowa; Jefferson; Juneau; Kenosha; La Crosse; Lafayette; Manitowoc; Marquette; Milwaukee;
     * Monroe; Ozaukee; Racine; Richland; Rock; Sauk; Sheboygan; Vernon; Walworth; Washington; Waukesha; Waushara;
     * Winnebago
     * State law defines use of US survey feet. Federal definition is metric - see code 6608. Replaces NAD83(NSRS2007)
     * / Wisconsin South (ftUS) (CRS code 3700).
     */
    public const EPSG_NAD83_2011_WISCONSIN_SOUTH_FTUS = 'urn:ogc:def:crs:EPSG::6609';

    /**
     * NAD83(2011) / Wisconsin Transverse Mercator
     * Extent: USA - Wisconsin
     * Designed as a single zone for the whole state. Replaces NAD83(NSRS2007) / Wisconsin Transverse Mercator (CRS
     * code 3701).
     */
    public const EPSG_NAD83_2011_WISCONSIN_TRANSVERSE_MERCATOR = 'urn:ogc:def:crs:EPSG::6610';

    /**
     * NAD83(2011) / Wyoming East
     * Extent: USA - Wyoming - counties of Albany; Campbell; Converse; Crook; Goshen; Laramie; Niobrara; Platte; Weston
     * State law defines use of US survey feet. See code 6612 for equivalent non-metric definition. Replaces
     * NAD83(NSRS2007) / Wyoming East (CRS code 3702).
     */
    public const EPSG_NAD83_2011_WYOMING_EAST = 'urn:ogc:def:crs:EPSG::6611';

    /**
     * NAD83(2011) / Wyoming East (ftUS)
     * Extent: USA - Wyoming - counties of Albany; Campbell; Converse; Crook; Goshen; Laramie; Niobrara; Platte; Weston
     * State law defines use of US survey feet. Federal definition is metric - see code 6611. Replaces NAD83(NSRS2007)
     * / Wyoming East (ftUS) (CRS code 3730).
     */
    public const EPSG_NAD83_2011_WYOMING_EAST_FTUS = 'urn:ogc:def:crs:EPSG::6612';

    /**
     * NAD83(2011) / Wyoming East Central
     * Extent: USA - Wyoming - counties of Big Horn; Carbon; Johnson; Natrona; Sheridan; Washakie
     * State law defines use of US survey feet. See code 6614 for equivalent non-metric definition. Replaces
     * NAD83(NSRS2007) / Wyoming East Central (CRS code 3703).
     */
    public const EPSG_NAD83_2011_WYOMING_EAST_CENTRAL = 'urn:ogc:def:crs:EPSG::6613';

    /**
     * NAD83(2011) / Wyoming East Central (ftUS)
     * Extent: USA - Wyoming - counties of Big Horn; Carbon; Johnson; Natrona; Sheridan; Washakie
     * State law defines use of US survey feet. Federal definition is metric - see code 6613. Replaces NAD83(NSRS2007)
     * / Wyoming East Central (ftUS) (CRS code 3731).
     */
    public const EPSG_NAD83_2011_WYOMING_EAST_CENTRAL_FTUS = 'urn:ogc:def:crs:EPSG::6614';

    /**
     * NAD83(2011) / Wyoming West
     * Extent: USA - Wyoming - counties of Lincoln; Sublette; Teton; Uinta
     * State law defines use of US survey feet. See code 6616 for equivalent non-metric definition. Replaces
     * NAD83(NSRS2007) / Wyoming West (CRS code 3705).
     */
    public const EPSG_NAD83_2011_WYOMING_WEST = 'urn:ogc:def:crs:EPSG::6615';

    /**
     * NAD83(2011) / Wyoming West (ftUS)
     * Extent: USA - Wyoming - counties of Lincoln; Sublette; Teton; Uinta
     * State law defines use of US survey feet. Federal definition is metric - see code 6615. Replaces NAD83(NSRS2007)
     * / Wyoming West (ftUS) (CRS code 3733).
     */
    public const EPSG_NAD83_2011_WYOMING_WEST_FTUS = 'urn:ogc:def:crs:EPSG::6616';

    /**
     * NAD83(2011) / Wyoming West Central
     * Extent: USA - Wyoming - counties of Fremont; Hot Springs; Park; Sweetwater
     * State law defines use of US survey feet. See code 6618 for equivalent non-metric definition. Replaces
     * NAD83(NSRS2007) / Wyoming West Central (CRS code 3704).
     */
    public const EPSG_NAD83_2011_WYOMING_WEST_CENTRAL = 'urn:ogc:def:crs:EPSG::6617';

    /**
     * NAD83(2011) / Wyoming West Central (ftUS)
     * Extent: USA - Wyoming - counties of Fremont; Hot Springs; Park; Sweetwater
     * State law defines use of US survey feet. Federal definition is metric - see code 6617. Replaces NAD83(NSRS2007)
     * / Wyoming West Central (ftUS) (CRS code 3732).
     */
    public const EPSG_NAD83_2011_WYOMING_WEST_CENTRAL_FTUS = 'urn:ogc:def:crs:EPSG::6618';

    /**
     * NAD83(CORS96) / Oregon Baker zone (ft)
     * Extent: USA - Oregon - Baker City area
     * State law defines use of International feet (note: not US survey feet). See NAD83(CORS96) / Oregon Baker (m)
     * (CRS code 6784) for metric equivalent. Replaced by NAD83(2011) / Oregon Baker (ft) (CRS code 6787) from
     * 2013-03-08.
     */
    public const EPSG_NAD83_CORS96_OREGON_BAKER_ZONE_FT = 'urn:ogc:def:crs:EPSG::6785';

    /**
     * NAD83(CORS96) / Oregon Baker zone (m)
     * Extent: USA - Oregon - Baker City area
     * See NAD83(CORS96) / Oregon Baker (ft) (CRS code 6785) for non-metric equivalent. Replaced by NAD83(2011) /
     * Oregon Baker (m) (CRS code 6786) from 2013-03-08.
     */
    public const EPSG_NAD83_CORS96_OREGON_BAKER_ZONE_M = 'urn:ogc:def:crs:EPSG::6784';

    /**
     * NAD83(CORS96) / Oregon Bend-Burns zone (ft)
     * Extent: USA - Oregon - Bend-Burns area
     * State law defines use of International feet (note: not US survey feet). See NAD83(CORS96) / Oregon Bend-Burns
     * (m) (CRS code 6796) for metric equivalent. Replaced by NAD83(2011) / Oregon Bend-Burns (ft) (CRS code 6799) from
     * 2013-03-08.
     */
    public const EPSG_NAD83_CORS96_OREGON_BEND_BURNS_ZONE_FT = 'urn:ogc:def:crs:EPSG::6797';

    /**
     * NAD83(CORS96) / Oregon Bend-Burns zone (m)
     * Extent: USA - Oregon - Bend-Burns area
     * See NAD83(CORS96) / Oregon Bend-Burns (ft) (CRS code 6797) for non-metric equivalent. Replaced by NAD83(2011) /
     * Oregon Bend-Burns (m) (CRS code 6798) from 2013-03-08.
     */
    public const EPSG_NAD83_CORS96_OREGON_BEND_BURNS_ZONE_M = 'urn:ogc:def:crs:EPSG::6796';

    /**
     * NAD83(CORS96) / Oregon Bend-Klamath Falls zone (ft)
     * Extent: USA - Oregon - Bend-Klamath Falls area
     * State law defines use of International feet (note: not US survey feet). See NAD83(CORS96) / Oregon Bend-Klamath
     * Falls (m) (CRS code 6788) for metric equivalent. Replaced by NAD83(2011) / Oregon Bend-Klamath Falls (ft) (CRS
     * code 6791) from 2013-03-08.
     */
    public const EPSG_NAD83_CORS96_OREGON_BEND_KLAMATH_FALLS_ZONE_FT = 'urn:ogc:def:crs:EPSG::6789';

    /**
     * NAD83(CORS96) / Oregon Bend-Klamath Falls zone (m)
     * Extent: USA - Oregon - Bend-Klamath Falls area
     * See NAD83(CORS96) / Oregon Bend-Klamath Falls (ft) (CRS code 6789) for non-metric equivalent. Replaced by
     * NAD83(2011) / Oregon Bend-Klamath Falls (m) (CRS code 6790) from 2013-03-08.
     */
    public const EPSG_NAD83_CORS96_OREGON_BEND_KLAMATH_FALLS_ZONE_M = 'urn:ogc:def:crs:EPSG::6788';

    /**
     * NAD83(CORS96) / Oregon Bend-Redmond-Prineville zone (ft)
     * Extent: USA - Oregon - Bend-Redmond-Prineville area
     * State law defines use of International feet (note: not US survey feet). See NAD83(CORS96) / Oregon
     * Bend-Redmond-Prineville (m) (code 6792) for metric equivalent. Replaced by NAD83(2011) / Oregon
     * Bend-Redmond-Prineville (ft) (code 6795) from 2013-03-08.
     */
    public const EPSG_NAD83_CORS96_OREGON_BEND_REDMOND_PRINEVILLE_ZONE_FT = 'urn:ogc:def:crs:EPSG::6793';

    /**
     * NAD83(CORS96) / Oregon Bend-Redmond-Prineville zone (m)
     * Extent: USA - Oregon - Bend-Redmond-Prineville area
     * See NAD83(CORS96) / Oregon Bend-Redmond-Prineville (ft) (CRS code 6793) for non-metric equivalent. Replaced by
     * NAD83(2011) / Oregon Bend-Redmond-Prineville (m) (CRS code 6794) from 2013-03-08.
     */
    public const EPSG_NAD83_CORS96_OREGON_BEND_REDMOND_PRINEVILLE_ZONE_M = 'urn:ogc:def:crs:EPSG::6792';

    /**
     * NAD83(CORS96) / Oregon Canyonville-Grants Pass zone (ft)
     * Extent: USA - Oregon - Canyonville-Grants Pass area
     * State law defines use of International feet (note: not US survey feet). See NAD83(CORS96) / Oregon
     * Canyonville-Grants Pass (m) (code 6800) for metric equivalent. Replaced by NAD83(2011) / Oregon
     * Canyonville-Grants Pass (ft) (code 6803) from 2013-03-08.
     */
    public const EPSG_NAD83_CORS96_OREGON_CANYONVILLE_GRANTS_PASS_ZONE_FT = 'urn:ogc:def:crs:EPSG::6801';

    /**
     * NAD83(CORS96) / Oregon Canyonville-Grants Pass zone (m)
     * Extent: USA - Oregon - Canyonville-Grants Pass area
     * See NAD83(CORS96) / Oregon Canyonville-Grants Pass (ft) (CRS code 6801) for non-metric equivalent. Replaced by
     * NAD83(2011) / Oregon Canyonville-Grants Pass (m) (CRS code 6802) from 2013-03-08.
     */
    public const EPSG_NAD83_CORS96_OREGON_CANYONVILLE_GRANTS_PASS_ZONE_M = 'urn:ogc:def:crs:EPSG::6800';

    /**
     * NAD83(CORS96) / Oregon Coast zone (ft)
     * Extent: USA - Oregon - coastal area
     * State law defines use of International feet (note: not US survey feet). See NAD83(CORS96) / Oregon Coast (m)
     * (CRS code 6840) for metric equivalent. Replaced by NAD83(2011) / Oregon Coast (ft) (CRS code 6843) from
     * 2013-03-08.
     */
    public const EPSG_NAD83_CORS96_OREGON_COAST_ZONE_FT = 'urn:ogc:def:crs:EPSG::6841';

    /**
     * NAD83(CORS96) / Oregon Coast zone (m)
     * Extent: USA - Oregon - coastal area
     * See NAD83(CORS96) / Oregon Coast (ft) (CRS code 6841) for non-metric equivalent. Replaced by NAD83(2011) /
     * Oregon Coast (m) (CRS code 6842) from 2013-03-08.
     */
    public const EPSG_NAD83_CORS96_OREGON_COAST_ZONE_M = 'urn:ogc:def:crs:EPSG::6840';

    /**
     * NAD83(CORS96) / Oregon Columbia River East zone (ft)
     * Extent: USA - Oregon - Columbia River area between approximately 122°03'W and 118°53'W
     * State law defines use of International feet (note: not US survey feet). See NAD83(CORS96) / Oregon Columbia
     * River East (m) (code 6804) for metric equivalent. Replaced by NAD83(2011) / Oregon Columbia River East (ft) (CRS
     * code 6807) from 2013-03-08.
     */
    public const EPSG_NAD83_CORS96_OREGON_COLUMBIA_RIVER_EAST_ZONE_FT = 'urn:ogc:def:crs:EPSG::6805';

    /**
     * NAD83(CORS96) / Oregon Columbia River East zone (m)
     * Extent: USA - Oregon - Columbia River area between approximately 122°03'W and 118°53'W
     * See NAD83(CORS96) / Oregon Columbia River East (ft) (CRS code 6805) for non-metric equivalent. Replaced by
     * NAD83(2011) / Oregon Columbia River East (m) (CRS code 6806) from 2013-03-08.
     */
    public const EPSG_NAD83_CORS96_OREGON_COLUMBIA_RIVER_EAST_ZONE_M = 'urn:ogc:def:crs:EPSG::6804';

    /**
     * NAD83(CORS96) / Oregon Columbia River West zone (ft)
     * Extent: USA - Oregon - Columbia River area west of approximately 121°30'W
     * State law defines use of International feet (note: not US survey feet). See NAD83(CORS96) / Oregon Columbia
     * River West (m) (code 6808) for metric equivalent. Replaced by NAD83(2011) / Oregon Columbia River West (ft) (CRS
     * code 6811) from 2013-03-08.
     */
    public const EPSG_NAD83_CORS96_OREGON_COLUMBIA_RIVER_WEST_ZONE_FT = 'urn:ogc:def:crs:EPSG::6809';

    /**
     * NAD83(CORS96) / Oregon Columbia River West zone (m)
     * Extent: USA - Oregon - Columbia River area west of approximately 121°30'W
     * See NAD83(CORS96) / Oregon Columbia River West (ft) (CRS code 6809) for non-metric equivalent. Replaced by
     * NAD83(2011) / Oregon Columbia River West (m) (CRS code 6810) from 2013-03-08.
     */
    public const EPSG_NAD83_CORS96_OREGON_COLUMBIA_RIVER_WEST_ZONE_M = 'urn:ogc:def:crs:EPSG::6808';

    /**
     * NAD83(CORS96) / Oregon Cottage Grove-Canyonville zone (ft)
     * Extent: USA - Oregon - Cottage Grove-Canyonville area
     * State law defines use of International feet (not US survey feet). See NAD83(CORS96) / Oregon Cottage
     * Grove-Canyonville (m) (code 6812) for metric equivalent. Replaced by NAD83(2011) / Oregon Cottage
     * Grove-Canyonville (ft) (code 6815) from 2013-03-08.
     */
    public const EPSG_NAD83_CORS96_OREGON_COTTAGE_GROVE_CANYONVILLE_ZONE_FT = 'urn:ogc:def:crs:EPSG::6813';

    /**
     * NAD83(CORS96) / Oregon Cottage Grove-Canyonville zone (m)
     * Extent: USA - Oregon - Cottage Grove-Canyonville area
     * See NAD83(CORS96) / Oregon Cottage Grove-Canyonville (ft) (CRS code 6813) for non-metric equivalent. Replaced by
     * NAD83(2011) / Oregon Cottage Grove-Canyonville (m) (CRS code 6814) from 2013-03-08.
     */
    public const EPSG_NAD83_CORS96_OREGON_COTTAGE_GROVE_CANYONVILLE_ZONE_M = 'urn:ogc:def:crs:EPSG::6812';

    /**
     * NAD83(CORS96) / Oregon Dufur-Madras zone (ft)
     * Extent: USA - Oregon - Dufur-Madras area
     * State law defines use of International feet (note: not US survey feet). See NAD83(CORS96) / Oregon Dufur-Madras
     * (m) (CRS code 6816) for metric equivalent. Replaced by NAD83(2011) / Oregon Dufur-Madras (ft) (CRS code 6819)
     * from 2013-03-08.
     */
    public const EPSG_NAD83_CORS96_OREGON_DUFUR_MADRAS_ZONE_FT = 'urn:ogc:def:crs:EPSG::6817';

    /**
     * NAD83(CORS96) / Oregon Dufur-Madras zone (m)
     * Extent: USA - Oregon - Dufur-Madras area
     * See NAD83(CORS96) / Oregon Dufur-Madras (ft) (CRS code 6817) for non-metric equivalent. Replaced by NAD83(2011)
     * / Oregon Dufur-Madras (m) (CRS code 6818) from 2013-03-08.
     */
    public const EPSG_NAD83_CORS96_OREGON_DUFUR_MADRAS_ZONE_M = 'urn:ogc:def:crs:EPSG::6816';

    /**
     * NAD83(CORS96) / Oregon Eugene zone (ft)
     * Extent: USA - Oregon - Eugene area
     * State law defines use of International feet (note: not US survey feet). See NAD83(CORS96) / Oregon Eugene (m)
     * (CRS code 6820) for metric equivalent. Replaced by NAD83(2011) / Oregon Eugene (ft) (CRS code 6823) from
     * 2013-03-08.
     */
    public const EPSG_NAD83_CORS96_OREGON_EUGENE_ZONE_FT = 'urn:ogc:def:crs:EPSG::6821';

    /**
     * NAD83(CORS96) / Oregon Eugene zone (m)
     * Extent: USA - Oregon - Eugene area
     * See NAD83(CORS96) / Oregon Eugene (ft) (CRS code 6821) for non-metric equivalent. Replaced by NAD83(2011) /
     * Oregon Eugene (m) (CRS code 6822) from 2013-03-08.
     */
    public const EPSG_NAD83_CORS96_OREGON_EUGENE_ZONE_M = 'urn:ogc:def:crs:EPSG::6820';

    /**
     * NAD83(CORS96) / Oregon GIC Lambert (ft)
     * Extent: USA - Oregon
     * State law defines use of International feet (note: not US survey feet). Replaced by NAD83(2011) / Oregon GIC
     * Lambert (ft) (CRS code 6577).
     */
    public const EPSG_NAD83_CORS96_OREGON_GIC_LAMBERT_FT = 'urn:ogc:def:crs:EPSG::6868';

    /**
     * NAD83(CORS96) / Oregon Grants Pass-Ashland zone (ft)
     * Extent: USA - Oregon - Grants Pass-Ashland area
     * State law defines use of International feet (note: not US survey feet). See NAD83(CORS96) / Oregon Grants
     * Pass-Ashland (m) (CRS code 6824) for metric equivalent. Replaced by NAD83(2011) / Oregon Grants Pass-Ashland
     * (ft) (CRS code 6827) from 2013-03-08.
     */
    public const EPSG_NAD83_CORS96_OREGON_GRANTS_PASS_ASHLAND_ZONE_FT = 'urn:ogc:def:crs:EPSG::6825';

    /**
     * NAD83(CORS96) / Oregon Grants Pass-Ashland zone (m)
     * Extent: USA - Oregon - Grants Pass-Ashland area
     * See NAD83(CORS96) / Oregon Grants Pass-Ashland (ft) (CRS code 6825) for non-metric equivalent. Replaced by
     * NAD83(2011) / Oregon Grants Pass-Ashland (m) (CRS code 6826) from 2013-03-08.
     */
    public const EPSG_NAD83_CORS96_OREGON_GRANTS_PASS_ASHLAND_ZONE_M = 'urn:ogc:def:crs:EPSG::6824';

    /**
     * NAD83(CORS96) / Oregon Gresham-Warm Springs zone (ft)
     * Extent: USA - Oregon - Gresham-Warm Springs area
     * State law defines use of International feet (note: not US survey feet). See NAD83(CORS96) / Oregon Gresham-Warm
     * Springs (m) (CRS code 6828) for metric equivalent. Replaced by NAD83(2011) / Oregon Gresham-Warm Springs (ft)
     * (CRS code 6831) from 2013-03-08.
     */
    public const EPSG_NAD83_CORS96_OREGON_GRESHAM_WARM_SPRINGS_ZONE_FT = 'urn:ogc:def:crs:EPSG::6829';

    /**
     * NAD83(CORS96) / Oregon Gresham-Warm Springs zone (m)
     * Extent: USA - Oregon - Gresham-Warm Springs area
     * See NAD83(CORS96) / Oregon Gresham-Warm Springs (ft) (CRS code 6829) for non-metric equivalent. Replaced by
     * NAD83(2011) / Oregon Gresham-Warm Springs (m) (CRS code 6830) from 2013-03-08.
     */
    public const EPSG_NAD83_CORS96_OREGON_GRESHAM_WARM_SPRINGS_ZONE_M = 'urn:ogc:def:crs:EPSG::6828';

    /**
     * NAD83(CORS96) / Oregon LCC (m)
     * Extent: USA - Oregon
     * See CRS code 6868 for non-metric definition used by state agencies. Replaced by NAD83(2011) / Oregon LCC (m)
     * (CRS code 6556).
     */
    public const EPSG_NAD83_CORS96_OREGON_LCC_M = 'urn:ogc:def:crs:EPSG::6867';

    /**
     * NAD83(CORS96) / Oregon La Grande zone (ft)
     * Extent: USA - Oregon - La Grande area
     * State law defines use of International feet (note: not US survey feet). See NAD83(CORS96) / Oregon La Grande (m)
     * (CRS code 6832) for metric equivalent. Replaced by NAD83(2011) / Oregon La Grande (ft) (CRS code 6835) from
     * 2013-03-08.
     */
    public const EPSG_NAD83_CORS96_OREGON_LA_GRANDE_ZONE_FT = 'urn:ogc:def:crs:EPSG::6833';

    /**
     * NAD83(CORS96) / Oregon La Grande zone (m)
     * Extent: USA - Oregon - La Grande area
     * See NAD83(CORS96) / Oregon La Grande (ft) (CRS code 6833) for non-metric equivalent. Replaced by NAD83(2011) /
     * Oregon La Grande (m) (CRS code 6834) from 2013-03-08.
     */
    public const EPSG_NAD83_CORS96_OREGON_LA_GRANDE_ZONE_M = 'urn:ogc:def:crs:EPSG::6832';

    /**
     * NAD83(CORS96) / Oregon North
     * Extent: USA - Oregon - counties of Baker; Benton; Clackamas; Clatsop; Columbia; Gilliam; Grant; Hood River;
     * Jefferson; Lincoln; Linn; Marion; Morrow; Multnomah; Polk; Sherman; Tillamook; Umatilla; Union; Wallowa; Wasco;
     * Washington; Wheeler; Yamhill
     * State law defines use of International feet (note: not US survey feet). See CRS code 6885 for equivalent
     * non-metric definition. Replaced by NAD83(2011) / Oregon North (CRS code 6558).
     */
    public const EPSG_NAD83_CORS96_OREGON_NORTH = 'urn:ogc:def:crs:EPSG::6884';

    /**
     * NAD83(CORS96) / Oregon North (ft)
     * Extent: USA - Oregon - counties of Baker; Benton; Clackamas; Clatsop; Columbia; Gilliam; Grant; Hood River;
     * Jefferson; Lincoln; Linn; Marion; Morrow; Multnomah; Polk; Sherman; Tillamook; Umatilla; Union; Wallowa; Wasco;
     * Washington; Wheeler; Yamhill
     * State law defines use of International feet (note: not US survey feet). Federal definition is metric - see CRS
     * code 6884. Replaced by NAD83(2011) / Oregon North (ft) (CRS code 6559).
     */
    public const EPSG_NAD83_CORS96_OREGON_NORTH_FT = 'urn:ogc:def:crs:EPSG::6885';

    /**
     * NAD83(CORS96) / Oregon Ontario zone (ft)
     * Extent: USA - Oregon - Ontario area
     * State law defines use of International feet (note: not US survey feet). See NAD83(CORS96) / Oregon Ontario (m)
     * (CRS code 6836) for metric equivalent. Replaced by NAD83(2011) / Oregon Ontario (ft) (CRS code 6839) from
     * 2013-03-08.
     */
    public const EPSG_NAD83_CORS96_OREGON_ONTARIO_ZONE_FT = 'urn:ogc:def:crs:EPSG::6837';

    /**
     * NAD83(CORS96) / Oregon Ontario zone (m)
     * Extent: USA - Oregon - Ontario area
     * See NAD83(CORS96) / Oregon Ontario (ft) (CRS code 6837) for non-metric equivalent. Replaced by NAD83(2011) /
     * Oregon Ontario (m) (CRS code 6838) from 2013-03-08.
     */
    public const EPSG_NAD83_CORS96_OREGON_ONTARIO_ZONE_M = 'urn:ogc:def:crs:EPSG::6836';

    /**
     * NAD83(CORS96) / Oregon Pendleton zone (ft)
     * Extent: USA - Oregon - Pendleton area
     * State law defines use of International feet (note: not US survey feet). See NAD83(CORS96) / Oregon Pendleton (m)
     * (CRS code 6844) for metric equivalent. Replaced by NAD83(2011) / Oregon Pendleton (ft) (CRS code 6847) from
     * 2013-03-08.
     */
    public const EPSG_NAD83_CORS96_OREGON_PENDLETON_ZONE_FT = 'urn:ogc:def:crs:EPSG::6845';

    /**
     * NAD83(CORS96) / Oregon Pendleton zone (m)
     * Extent: USA - Oregon - Pendleton area
     * See NAD83(CORS96) / Oregon Pendleton (ft) (CRS code 6845) for non-metric equivalent. Replaced by NAD83(2011) /
     * Oregon Pendleton (m) (CRS code 6846) from 2013-03-08.
     */
    public const EPSG_NAD83_CORS96_OREGON_PENDLETON_ZONE_M = 'urn:ogc:def:crs:EPSG::6844';

    /**
     * NAD83(CORS96) / Oregon Pendleton-La Grande zone (ft)
     * Extent: USA - Oregon - Pendleton-La Grande area
     * State law defines use of International feet (note: not US survey feet). See NAD83(CORS96) / Oregon Pendleton-La
     * Grande (m) (CRS code 6848) for metric equivalent. Replaced by NAD83(2011) / Oregon Pendleton-La Grande (ft) (CRS
     * code 6851) from 2013-03-08.
     */
    public const EPSG_NAD83_CORS96_OREGON_PENDLETON_LA_GRANDE_ZONE_FT = 'urn:ogc:def:crs:EPSG::6849';

    /**
     * NAD83(CORS96) / Oregon Pendleton-La Grande zone (m)
     * Extent: USA - Oregon - Pendleton-La Grande area
     * See NAD83(CORS96) / Oregon Pendleton-La Grande (ft) (CRS code 6849) for non-metric equivalent. Replaced by
     * NAD83(2011) / Oregon Pendleton-La Grande (m) (CRS code 6850) from 2013-03-08.
     */
    public const EPSG_NAD83_CORS96_OREGON_PENDLETON_LA_GRANDE_ZONE_M = 'urn:ogc:def:crs:EPSG::6848';

    /**
     * NAD83(CORS96) / Oregon Portland zone (ft)
     * Extent: USA - Oregon - Portland area
     * State law defines use of International feet (note: not US survey feet). See NAD83(CORS96) / Oregon Portland (m)
     * (CRS code 6852) for metric equivalent. Replaced by NAD83(2011) / Oregon Portland (ft) (CRS code 6855) from
     * 2013-03-08.
     */
    public const EPSG_NAD83_CORS96_OREGON_PORTLAND_ZONE_FT = 'urn:ogc:def:crs:EPSG::6853';

    /**
     * NAD83(CORS96) / Oregon Portland zone (m)
     * Extent: USA - Oregon - Portland area
     * See NAD83(CORS96) / Oregon Portland (ft) (CRS code 6853) for non-metric equivalent. Replaced by NAD83(2011) /
     * Oregon Portland (m) (CRS code 6854) from 2013-03-08.
     */
    public const EPSG_NAD83_CORS96_OREGON_PORTLAND_ZONE_M = 'urn:ogc:def:crs:EPSG::6852';

    /**
     * NAD83(CORS96) / Oregon Salem zone (ft)
     * Extent: USA - Oregon - Salem area
     * State law defines use of International feet (note: not US survey feet). See NAD83(CORS96) / Oregon Salem (m)
     * (CRS code 6856) for metric equivalent. Replaced by NAD83(2011) / Oregon Salem (ft) (CRS code 6859) from
     * 2013-03-08.
     */
    public const EPSG_NAD83_CORS96_OREGON_SALEM_ZONE_FT = 'urn:ogc:def:crs:EPSG::6857';

    /**
     * NAD83(CORS96) / Oregon Salem zone (m)
     * Extent: USA - Oregon - Salem area
     * See NAD83(CORS96) / Oregon Salem (ft) (CRS code 6857) for non-metric equivalent. Replaced by NAD83(2011) /
     * Oregon Salem (m) (CRS code 6858) from 2013-03-08.
     */
    public const EPSG_NAD83_CORS96_OREGON_SALEM_ZONE_M = 'urn:ogc:def:crs:EPSG::6856';

    /**
     * NAD83(CORS96) / Oregon Santiam Pass zone (ft)
     * Extent: USA - Oregon - Sweet Home-Santiam Pass-Sisters area
     * State law defines use of International feet (note: not US survey feet). See NAD83(CORS96) / Oregon Santiam Pass
     * (m) (CRS code 6860) for metric equivalent. Replaced by NAD83(2011) / Santiam Pass (ft) (CRS code 6863) from
     * 2013-03-08.
     */
    public const EPSG_NAD83_CORS96_OREGON_SANTIAM_PASS_ZONE_FT = 'urn:ogc:def:crs:EPSG::6861';

    /**
     * NAD83(CORS96) / Oregon Santiam Pass zone (m)
     * Extent: USA - Oregon - Sweet Home-Santiam Pass-Sisters area
     * See NAD83(CORS96) / Oregon Santiam Pass (ft) (CRS code 6861) for non-metric equivalent. Replaced by NAD83(2011)
     * / Oregon Santiam Pass (m) (CRS code 6862) from 2013-03-08.
     */
    public const EPSG_NAD83_CORS96_OREGON_SANTIAM_PASS_ZONE_M = 'urn:ogc:def:crs:EPSG::6860';

    /**
     * NAD83(CORS96) / Oregon South
     * Extent: USA - Oregon - counties of Coos; Crook; Curry; Deschutes; Douglas; Harney; Jackson; Josephine; Klamath;
     * Lake; Lane; Malheur
     * State law defines use of International feet (note: not US survey feet). See CRS code 6887 for equivalent
     * non-metric definition. Replaced by NAD83(2011) / Oregon South (CRS code 6560).
     */
    public const EPSG_NAD83_CORS96_OREGON_SOUTH = 'urn:ogc:def:crs:EPSG::6886';

    /**
     * NAD83(CORS96) / Oregon South (ft)
     * Extent: USA - Oregon - counties of Coos; Crook; Curry; Deschutes; Douglas; Harney; Jackson; Josephine; Klamath;
     * Lake; Lane; Malheur
     * State law defines use of International feet (note: not US survey feet). Federal definition is metric - see CRS
     * code 6886. Replaced by NAD83(2011) / Oregon South (ft) (CRS code 6561).
     */
    public const EPSG_NAD83_CORS96_OREGON_SOUTH_FT = 'urn:ogc:def:crs:EPSG::6887';

    /**
     * NAD83(CORS96) / Puerto Rico and Virgin Is.
     * Extent: Puerto Rico and US Virgin Islands - onshore
     * Replaced by NAD83(2011) / Puerto Rico and Virgin Is. (CRS code 6566).
     */
    public const EPSG_NAD83_CORS96_PUERTO_RICO_AND_VIRGIN_IS = 'urn:ogc:def:crs:EPSG::6307';

    /**
     * NAD83(CSRS) / Alberta 10-TM (Forest)
     * Extent: Canada - Alberta
     * Easting coordinates are always positive in Alberta. For an alternative with easting coordinates that may be
     * either positive or negative, see NAD83(CSRS) / Alberta 10-TM (Resource) (CRS code 3403).
     */
    public const EPSG_NAD83_CSRS_ALBERTA_10_TM_FOREST = 'urn:ogc:def:crs:EPSG::3402';

    /**
     * NAD83(CSRS) / Alberta 10-TM (Resource)
     * Extent: Canada - Alberta
     * Has negative easting coordinates in western Alberta. For an alternative with positive coordinates see
     * NAD83(CSRS) / Alberta 10-TM (Forest) (CRS code 3402).
     */
    public const EPSG_NAD83_CSRS_ALBERTA_10_TM_RESOURCE = 'urn:ogc:def:crs:EPSG::3403';

    /**
     * NAD83(CSRS) / Alberta 3TM ref merid 111 W
     * Extent: Canada - Alberta - east of 112°30'W
     * If used for rural area control markers, area of use is amended to east of 112°W; however use of NAD83(CSRS) /
     * UTM zone 12N (CRS code 2956) is encouraged in these rural areas.
     */
    public const EPSG_NAD83_CSRS_ALBERTA_3TM_REF_MERID_111_W = 'urn:ogc:def:crs:EPSG::3779';

    /**
     * NAD83(CSRS) / Alberta 3TM ref merid 114 W
     * Extent: Canada - Alberta - between 115°30'W and 112°30'W
     * If used for rural area control markers, area of use is amended to between 116°W and 112°W; however use of
     * NAD83(CSRS) / UTM zones 11N and 12N (CRS codes 2955 and 2956) is encouraged in these rural areas.
     */
    public const EPSG_NAD83_CSRS_ALBERTA_3TM_REF_MERID_114_W = 'urn:ogc:def:crs:EPSG::3780';

    /**
     * NAD83(CSRS) / Alberta 3TM ref merid 117 W
     * Extent: Canada - Alberta - between 118°30'W and 115°30' W
     * If used for rural area control markers, area of use is amended to between 118°W and 116°W; however use of
     * NAD83(CSRS) / UTM zone 11N (CRS code 2955) is encouraged in these rural areas.
     */
    public const EPSG_NAD83_CSRS_ALBERTA_3TM_REF_MERID_117_W = 'urn:ogc:def:crs:EPSG::3781';

    /**
     * NAD83(CSRS) / Alberta 3TM ref merid 120 W
     * Extent: Canada - Alberta - west of 118°30' W
     * If used for rural area control markers, area of use is amended to west of 118°W; however use of NAD83(CSRS) /
     * UTM zone 11N (CRS code 2955) encouraged in these rural areas.
     */
    public const EPSG_NAD83_CSRS_ALBERTA_3TM_REF_MERID_120_W = 'urn:ogc:def:crs:EPSG::3802';

    /**
     * NAD83(CSRS) / BC Albers
     * Extent: Canada - British Columbia.
     */
    public const EPSG_NAD83_CSRS_BC_ALBERS = 'urn:ogc:def:crs:EPSG::3153';

    /**
     * NAD83(CSRS) / Canada Atlas Lambert
     * Extent: Canada - Alberta; British Columbia; Manitoba; New Brunswick; Newfoundland and Labrador; Northwest
     * Territories; Nova Scotia; Nunavut; Ontario; Prince Edward Island; Quebec; Saskatchewan; Yukon
     * This CRS may sometimes be called "NAD83 / Canada Atlas Lambert". That is the name of a different system (see CRS
     * code 3978) but at the scales involved the positional difference of under 2 metres may not be significant.
     */
    public const EPSG_NAD83_CSRS_CANADA_ATLAS_LAMBERT = 'urn:ogc:def:crs:EPSG::3979';

    /**
     * NAD83(CSRS) / EPSG Arctic zone 1-23
     * Extent: Arctic - between 87°50'N and 82°50'N, approximately 120°W to approximately 60°W. May be extended
     * westwards or eastwards within the latitude limits.
     */
    public const EPSG_NAD83_CSRS_EPSG_ARCTIC_ZONE_1_23 = 'urn:ogc:def:crs:EPSG::6098';

    /**
     * NAD83(CSRS) / EPSG Arctic zone 2-14
     * Extent: Arctic - between 84°30'N and 79°30'N, approximately 135°W to approximately 95°W. May be extended
     * eastwards within the latitude limits.
     */
    public const EPSG_NAD83_CSRS_EPSG_ARCTIC_ZONE_2_14 = 'urn:ogc:def:crs:EPSG::6099';

    /**
     * NAD83(CSRS) / EPSG Arctic zone 2-16
     * Extent: Arctic - between 84°30'N and 79°30'N, approximately 95°W to approximately 55°W. May be extended
     * westwards within the latitude limits.
     */
    public const EPSG_NAD83_CSRS_EPSG_ARCTIC_ZONE_2_16 = 'urn:ogc:def:crs:EPSG::6100';

    /**
     * NAD83(CSRS) / EPSG Arctic zone 3-25
     * Extent: Arctic - between 81°10'N and 76°10'N, approximately 144°W to approximately 114°W. May be extended
     * eastwards within the latitude limits.
     */
    public const EPSG_NAD83_CSRS_EPSG_ARCTIC_ZONE_3_25 = 'urn:ogc:def:crs:EPSG::6101';

    /**
     * NAD83(CSRS) / EPSG Arctic zone 3-27
     * Extent: Arctic - between 81°10'N and 76°10'N, approximately 114°W to approximately 84°W. May be extended
     * westwards or eastwards within the latitude limits.
     */
    public const EPSG_NAD83_CSRS_EPSG_ARCTIC_ZONE_3_27 = 'urn:ogc:def:crs:EPSG::6102';

    /**
     * NAD83(CSRS) / EPSG Arctic zone 3-29
     * Extent: Arctic - between 81°10'N and 76°10'N, Canada east of approximately 84°W. May be extended westwards
     * within the latitude limits.
     */
    public const EPSG_NAD83_CSRS_EPSG_ARCTIC_ZONE_3_29 = 'urn:ogc:def:crs:EPSG::6103';

    /**
     * NAD83(CSRS) / EPSG Arctic zone 4-14
     * Extent: Arctic - between 77°50'N and 72°50'N, approximately 141°W to approximately 116°W. May be extended
     * westwards or eastwards within the latitude limits.
     */
    public const EPSG_NAD83_CSRS_EPSG_ARCTIC_ZONE_4_14 = 'urn:ogc:def:crs:EPSG::6104';

    /**
     * NAD83(CSRS) / EPSG Arctic zone 4-16
     * Extent: Arctic - between 77°50'N and 72°50'N, approximately 116°W to approximately 91°W. May be extended
     * westwards or eastwards within the latitude limits.
     */
    public const EPSG_NAD83_CSRS_EPSG_ARCTIC_ZONE_4_16 = 'urn:ogc:def:crs:EPSG::6105';

    /**
     * NAD83(CSRS) / EPSG Arctic zone 4-18
     * Extent: Arctic - between 77°50'N and 72°50'N, approximately 91°W to approximately 67°W. May be extended
     * westwards within the latitude limits.
     */
    public const EPSG_NAD83_CSRS_EPSG_ARCTIC_ZONE_4_18 = 'urn:ogc:def:crs:EPSG::6106';

    /**
     * NAD83(CSRS) / EPSG Arctic zone 5-33
     * Extent: Arctic - between 74°30'N and 69°30'N, approximately 141°W to approximately 121°W. May be extended
     * eastwards within the latitude limits.
     */
    public const EPSG_NAD83_CSRS_EPSG_ARCTIC_ZONE_5_33 = 'urn:ogc:def:crs:EPSG::6107';

    /**
     * NAD83(CSRS) / EPSG Arctic zone 5-35
     * Extent: Arctic - between 74°30'N and 69°30'N, approximately 121°W to approximately 101°W. May be extended
     * westwards or eastwards within the latitude limits.
     */
    public const EPSG_NAD83_CSRS_EPSG_ARCTIC_ZONE_5_35 = 'urn:ogc:def:crs:EPSG::6108';

    /**
     * NAD83(CSRS) / EPSG Arctic zone 5-37
     * Extent: Arctic - between 74°30'N and 69°30'N, approximately 101°W to approximately 81°W. May be extended
     * westwards or eastwards within the latitude limits.
     */
    public const EPSG_NAD83_CSRS_EPSG_ARCTIC_ZONE_5_37 = 'urn:ogc:def:crs:EPSG::6109';

    /**
     * NAD83(CSRS) / EPSG Arctic zone 5-39
     * Extent: Arctic - between 74°30'N and 69°30'N, approximately 81°W to approximately 61°W. May be extended
     * westwards within the latitude limits.
     */
    public const EPSG_NAD83_CSRS_EPSG_ARCTIC_ZONE_5_39 = 'urn:ogc:def:crs:EPSG::6110';

    /**
     * NAD83(CSRS) / EPSG Arctic zone 6-18
     * Extent: Arctic - between 71°10'N and 66°10'N, approximately 141°W to approximately 122°W. May be extended
     * eastwards within the latitude limits.
     */
    public const EPSG_NAD83_CSRS_EPSG_ARCTIC_ZONE_6_18 = 'urn:ogc:def:crs:EPSG::6111';

    /**
     * NAD83(CSRS) / EPSG Arctic zone 6-20
     * Extent: Arctic - between 71°10'N and 66°10'N, approximately 122°W to approximately 103°W. May be extended
     * westwards or eastwards within the latitude limits.
     */
    public const EPSG_NAD83_CSRS_EPSG_ARCTIC_ZONE_6_20 = 'urn:ogc:def:crs:EPSG::6112';

    /**
     * NAD83(CSRS) / EPSG Arctic zone 6-22
     * Extent: Arctic - between 71°10'N and 66°10'N, approximately 103°W to approximately 84°W. May be extended
     * westwards or eastwards within the latitude limits.
     */
    public const EPSG_NAD83_CSRS_EPSG_ARCTIC_ZONE_6_22 = 'urn:ogc:def:crs:EPSG::6113';

    /**
     * NAD83(CSRS) / EPSG Arctic zone 6-24
     * Extent: Arctic - between 71°10'N and 66°10'N, approximately 84°W to approximately 65°W. May be extended
     * westwards or eastwards within the latitude limits.
     */
    public const EPSG_NAD83_CSRS_EPSG_ARCTIC_ZONE_6_24 = 'urn:ogc:def:crs:EPSG::6114';

    /**
     * NAD83(CSRS) / MTM zone 1
     * Extent: Canada - Newfoundland - onshore east of 54°30'W.
     */
    public const EPSG_NAD83_CSRS_MTM_ZONE_1 = 'urn:ogc:def:crs:EPSG::26898';

    /**
     * NAD83(CSRS) / MTM zone 10
     * Extent: Canada - Quebec west of 78°W; Canada - Ontario - between 79°30'W and 78°W in area to north of 47°N;
     * between 80°15'W and 78°W in area between 46°N and 47°N; between 81°W and 78°W in area south of 46°N
     * Known in Quebec as "NAD83(CSRS) / SCoPQ zone 10" with axis 1 and 2 abbreviations of "X" and "Y" respectively.
     */
    public const EPSG_NAD83_CSRS_MTM_ZONE_10 = 'urn:ogc:def:crs:EPSG::2952';

    /**
     * NAD83(CSRS) / MTM zone 11
     * Extent: Canada - Ontario - south of 46°N and west of 81°W.
     */
    public const EPSG_NAD83_CSRS_MTM_ZONE_11 = 'urn:ogc:def:crs:EPSG::26891';

    /**
     * NAD83(CSRS) / MTM zone 12
     * Extent: Canada - Ontario - between 82°30'W and 79°30'W: north of 46°N in area between 82°30'W and 80°15'W,
     * north of 47°N in area between 80°15'W and 79°30'W.
     */
    public const EPSG_NAD83_CSRS_MTM_ZONE_12 = 'urn:ogc:def:crs:EPSG::26892';

    /**
     * NAD83(CSRS) / MTM zone 13
     * Extent: Canada - Ontario - between 85°30'W and 82°30'W and north of 46°N.
     */
    public const EPSG_NAD83_CSRS_MTM_ZONE_13 = 'urn:ogc:def:crs:EPSG::26893';

    /**
     * NAD83(CSRS) / MTM zone 14
     * Extent: Canada - Ontario - between 88°30'W and 85°30'W.
     */
    public const EPSG_NAD83_CSRS_MTM_ZONE_14 = 'urn:ogc:def:crs:EPSG::26894';

    /**
     * NAD83(CSRS) / MTM zone 15
     * Extent: Canada - Ontario - between 91°30'W and 88°30'W.
     */
    public const EPSG_NAD83_CSRS_MTM_ZONE_15 = 'urn:ogc:def:crs:EPSG::26895';

    /**
     * NAD83(CSRS) / MTM zone 16
     * Extent: Canada - Ontario - between 94°30'W and 91°30'W.
     */
    public const EPSG_NAD83_CSRS_MTM_ZONE_16 = 'urn:ogc:def:crs:EPSG::26896';

    /**
     * NAD83(CSRS) / MTM zone 17
     * Extent: Canada - Ontario - west of 94°30'W.
     */
    public const EPSG_NAD83_CSRS_MTM_ZONE_17 = 'urn:ogc:def:crs:EPSG::26897';

    /**
     * NAD83(CSRS) / MTM zone 2
     * Extent: Canada - Newfoundland and Labrador between 57°30'W and 54°30'W.
     */
    public const EPSG_NAD83_CSRS_MTM_ZONE_2 = 'urn:ogc:def:crs:EPSG::26899';

    /**
     * NAD83(CSRS) / MTM zone 3
     * Extent: Canada - Newfoundland and Labrador between 60°W and 57°30'W; Canada - Quebec east of 60°W
     * Known in Quebec as "NAD83(CSRS) / SCoPQ zone 3" with axis 1 and 2 abbreviations of "X" and "Y" respectively.
     */
    public const EPSG_NAD83_CSRS_MTM_ZONE_3 = 'urn:ogc:def:crs:EPSG::2945';

    /**
     * NAD83(CSRS) / MTM zone 4
     * Extent: Canada - Quebec and Labrador between 63°W and 60°W
     * Known in Quebec as "NAD83(CSRS) / SCoPQ zone 4" with axis 1 and 2 abbreviations of "X" and "Y" respectively.
     */
    public const EPSG_NAD83_CSRS_MTM_ZONE_4 = 'urn:ogc:def:crs:EPSG::2946';

    /**
     * NAD83(CSRS) / MTM zone 5
     * Extent: Canada - Quebec and Labrador between 66°W and 63°W
     * Known in Quebec as "NAD83(CSRS) / SCoPQ zone 5" with axis 1 and 2 abbreviations of "X" and "Y" respectively.
     */
    public const EPSG_NAD83_CSRS_MTM_ZONE_5 = 'urn:ogc:def:crs:EPSG::2947';

    /**
     * NAD83(CSRS) / MTM zone 6
     * Extent: Canada - Quebec and Labrador between 69°W and 66°W
     * Known in Quebec as "NAD83(CSRS) / SCoPQ zone 6" with axis 1 and 2 abbreviations of "X" and "Y" respectively.
     */
    public const EPSG_NAD83_CSRS_MTM_ZONE_6 = 'urn:ogc:def:crs:EPSG::2948';

    /**
     * NAD83(CSRS) / MTM zone 7
     * Extent: Canada - Quebec - between 72°W and 69°W
     * Known in Quebec as "NAD83(CSRS) / SCoPQ zone 7" with axis 1 and 2 abbreviations of "X" and "Y" respectively.
     */
    public const EPSG_NAD83_CSRS_MTM_ZONE_7 = 'urn:ogc:def:crs:EPSG::2949';

    /**
     * NAD83(CSRS) / MTM zone 8
     * Extent: Canada - Quebec between 75°W and 72°W.; Canada - Ontario - east of 75°W
     * Known in Quebec as "NAD83(CSRS) / SCoPQ zone 8" with axis 1 and 2 abbreviations of "X" and "Y" respectively.
     */
    public const EPSG_NAD83_CSRS_MTM_ZONE_8 = 'urn:ogc:def:crs:EPSG::2950';

    /**
     * NAD83(CSRS) / MTM zone 9
     * Extent: Canada - Quebec and Ontario - between 78°W and 75°W
     * Known in Quebec as "NAD83(CSRS) / SCoPQ zone 9" with axis 1 and 2 abbreviations of "X" and "Y" respectively.
     */
    public const EPSG_NAD83_CSRS_MTM_ZONE_9 = 'urn:ogc:def:crs:EPSG::2951';

    /**
     * NAD83(CSRS) / MTQ Lambert
     * Extent: Canada - Quebec
     * This CRS may sometimes be called "NAD83 / MTQ Lambert". That is the name of a different system (CRS code 3798).
     * Although the positional differences are not significant for provincial-scale mapping they may be significant for
     * data management.
     */
    public const EPSG_NAD83_CSRS_MTQ_LAMBERT = 'urn:ogc:def:crs:EPSG::3799';

    /**
     * NAD83(CSRS) / NWT Lambert
     * Extent: Canada - Northwest Territories onshore
     * This CRS may sometimes be called "NAD83 / NWT Lambert". That is the name of a different system (see CRS code
     * 3580) but at the scales involved the positional difference of under 2 metres may not be significant.
     */
    public const EPSG_NAD83_CSRS_NWT_LAMBERT = 'urn:ogc:def:crs:EPSG::3581';

    /**
     * NAD83(CSRS) / New Brunswick Stereographic
     * Extent: Canada - New Brunswick
     * In use from 1999.
     */
    public const EPSG_NAD83_CSRS_NEW_BRUNSWICK_STEREOGRAPHIC = 'urn:ogc:def:crs:EPSG::2953';

    /**
     * NAD83(CSRS) / Ontario MNR Lambert
     * Extent: Canada - Ontario
     * One of a number of similar projected CRSs used by Ontario MNR.
     */
    public const EPSG_NAD83_CSRS_ONTARIO_MNR_LAMBERT = 'urn:ogc:def:crs:EPSG::3162';

    /**
     * NAD83(CSRS) / Prince Edward Isl. Stereographic (NAD83)
     * Extent: Canada - Prince Edward Island.
     */
    public const EPSG_NAD83_CSRS_PRINCE_EDWARD_ISL_STEREOGRAPHIC_NAD83 = 'urn:ogc:def:crs:EPSG::2954';

    /**
     * NAD83(CSRS) / Statistics Canada Lambert
     * Extent: Canada - Alberta; British Columbia; Manitoba; New Brunswick; Newfoundland and Labrador; Northwest
     * Territories; Nova Scotia; Nunavut; Ontario; Prince Edward Island; Quebec; Saskatchewan; Yukon
     * This CRS may sometimes be called "NAD83 / STC Lambert". That is the name of a different system (see CRS code
     * 3347) but at the scales involved the positional difference of under 2 metres may not be significant.
     */
    public const EPSG_NAD83_CSRS_STATISTICS_CANADA_LAMBERT = 'urn:ogc:def:crs:EPSG::3348';

    /**
     * NAD83(CSRS) / Teranet Ontario Lambert
     * Extent: Canada - Ontario
     * This CRS may sometimes be called "NAD83 / Teranet Ontario Lambert". That is the name of a different system (see
     * CRS code 5320) but at the scales involved the positional difference of under 2 metres may not be significant.
     */
    public const EPSG_NAD83_CSRS_TERANET_ONTARIO_LAMBERT = 'urn:ogc:def:crs:EPSG::5321';
}
