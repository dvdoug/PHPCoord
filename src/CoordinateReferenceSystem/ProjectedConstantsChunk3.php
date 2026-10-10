<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\CoordinateReferenceSystem;

trait ProjectedConstantsChunk3
{
    /**
     * NAD83(HARN) / Texas South Central (ftUS)
     * Extent: USA - Texas - counties of Aransas; Atascosa; Austin; Bandera; Bee; Bexar; Brazoria; Brewster; Caldwell;
     * Calhoun; Chambers; Colorado; Comal; De Witt; Dimmit; Edwards; Fayette; Fort Bend; Frio; Galveston; Goliad;
     * Gonzales; Guadalupe; Harris; Hays; Jackson; Jefferson; Karnes; Kendall; Kerr; Kinney; La Salle; Lavaca; Live
     * Oak; Matagorda; Maverick; McMullen; Medina; Presidio; Real; Refugio; Terrell; Uvalde; Val Verde; Victoria;
     * Waller; Wharton; Wilson; Zavala
     * State law defines system in US survey feet. Federal definition is metric - see code 2847. Replaces NAD83 / SPCS
     * for applications with an accuracy of better than 3 feet. Not applicable to offshore areas. Replaced by
     * NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_TEXAS_SOUTH_CENTRAL_FTUS = 'urn:ogc:def:crs:EPSG::2919';

    /**
     * NAD83(HARN) / Texas South (ftUS)
     * Extent: USA - Texas - counties of Brooks; Cameron; Duval; Hidalgo; Jim Hogg; Jim Wells; Kenedy; Kleberg; Nueces;
     * San Patricio; Starr; Webb; Willacy; Zapata
     * State law defines system in US survey feet. Federal definition is metric - see code 2848. Replaces NAD83 / SPCS
     * for applications with an accuracy of better than 3 feet. Not applicable to offshore areas. Replaced by
     * NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_TEXAS_SOUTH_FTUS = 'urn:ogc:def:crs:EPSG::2920';

    /**
     * NAD83(HARN) / Utah Central
     * Extent: USA - Utah - counties of Carbon; Duchesne; Emery; Grand; Juab; Millard; Salt Lake; Sanpete; Sevier;
     * Tooele; Uintah; Utah; Wasatch
     * State law of 2009 defines system in US survey feet: see CRS code 3569. State law of 1988 defining International
     * feet was withdrawn in 2001. Replaces NAD83 / SPCS for applications with an accuracy of better than 1m. Replaced
     * by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_UTAH_CENTRAL = 'urn:ogc:def:crs:EPSG::2850';

    /**
     * NAD83(HARN) / Utah Central (ft)
     * Extent: USA - Utah - counties of Carbon; Duchesne; Emery; Grand; Juab; Millard; Salt Lake; Sanpete; Sevier;
     * Tooele; Uintah; Utah; Wasatch
     * 1988 state law defining system in International feet withdrawn 2001, replaced in 2009 by ftUS. Federal
     * definition is metric: see CRS code 2850. Replaces NAD83 / SPCS for applications of an accuracy of better than 3
     * ft. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_UTAH_CENTRAL_FT = 'urn:ogc:def:crs:EPSG::2922';

    /**
     * NAD83(HARN) / Utah Central (ftUS)
     * Extent: USA - Utah - counties of Carbon; Duchesne; Emery; Grand; Juab; Millard; Salt Lake; Sanpete; Sevier;
     * Tooele; Uintah; Utah; Wasatch
     * State law defines system in International feet (note: not US survey feet). Federal definition is metric - see
     * code 2850. Replaces NAD83 / SPCS for applications with an accuracy of better than 3 ft. Replaced by
     * NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_UTAH_CENTRAL_FTUS = 'urn:ogc:def:crs:EPSG::3569';

    /**
     * NAD83(HARN) / Utah North
     * Extent: USA - Utah - counties of Box Elder; Cache; Daggett; Davis; Morgan; Rich; Summit; Weber
     * State law of 2009 defines system in US survey feet: see CRS code 3568. State law of 1988 defining International
     * feet was withdrawn in 2001. Replaces NAD83 / SPCS for applications with an accuracy of better than 1m. Replaced
     * by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_UTAH_NORTH = 'urn:ogc:def:crs:EPSG::2849';

    /**
     * NAD83(HARN) / Utah North (ft)
     * Extent: USA - Utah - counties of Box Elder; Cache; Daggett; Davis; Morgan; Rich; Summit; Weber
     * 1988 state law defining system in International feet withdrawn 2001, replaced in 2009 by ftUS. Federal
     * definition is metric: see CRS code 2849. Replaces NAD83 / SPCS for applications of an accuracy of better than 3
     * ft. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_UTAH_NORTH_FT = 'urn:ogc:def:crs:EPSG::2921';

    /**
     * NAD83(HARN) / Utah North (ftUS)
     * Extent: USA - Utah - counties of Box Elder; Cache; Daggett; Davis; Morgan; Rich; Summit; Weber
     * State law defines system in International feet (note: not US survey feet). Federal definition is metric - see
     * code 2849. Replaces NAD83 / SPCS for applications with an accuracy of better than 3 ft. Replaced by
     * NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_UTAH_NORTH_FTUS = 'urn:ogc:def:crs:EPSG::3568';

    /**
     * NAD83(HARN) / Utah South
     * Extent: USA - Utah - counties of Beaver; Garfield; Iron; Kane; Piute; San Juan; Washington; Wayne
     * State law of 2009 defines system in US survey feet: see CRS code 3570. State law of 1988 defining International
     * feet was withdrawn in 2001. Replaces NAD83 / SPCS for applications with an accuracy of better than 1m. Replaced
     * by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_UTAH_SOUTH = 'urn:ogc:def:crs:EPSG::2851';

    /**
     * NAD83(HARN) / Utah South (ft)
     * Extent: USA - Utah - counties of Beaver; Garfield; Iron; Kane; Piute; San Juan; Washington; Wayne
     * 1988 state law defining system in International feet withdrawn 2001, replaced in 2009 by ftUS. Federal
     * definition is metric: see CRS code 2851. Replaces NAD83 / SPCS for applications of an accuracy of better than 3
     * ft. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_UTAH_SOUTH_FT = 'urn:ogc:def:crs:EPSG::2923';

    /**
     * NAD83(HARN) / Utah South (ftUS)
     * Extent: USA - Utah - counties of Beaver; Garfield; Iron; Kane; Piute; San Juan; Washington; Wayne
     * State law defines system in International feet (note: not US survey feet). Federal definition is metric - see
     * code 2851. Replaces NAD83 / SPCS for applications with an accuracy of better than 3 ft. Replaced by
     * NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_UTAH_SOUTH_FTUS = 'urn:ogc:def:crs:EPSG::3570';

    /**
     * NAD83(HARN) / UTM zone 10N
     * Extent: USA - between 126°W and 120°W - onshore - California; Oregon; Washington
     * Replaces NAD83 / UTM zone 10N for applications with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) /
     * UTM zone 10N.
     */
    public const EPSG_NAD83_HARN_UTM_ZONE_10N = 'urn:ogc:def:crs:EPSG::3740';

    /**
     * NAD83(HARN) / UTM zone 11N
     * Extent: USA - between 120°W and 114°W - onshore - Arizona; California; Idaho; Montana; Nevada; Oregon; Utah;
     * Washington
     * Replaces NAD83 / UTM zone 11N for applications with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) /
     * UTM zone 11N.
     */
    public const EPSG_NAD83_HARN_UTM_ZONE_11N = 'urn:ogc:def:crs:EPSG::3741';

    /**
     * NAD83(HARN) / UTM zone 12N
     * Extent: USA - between 114°W and 108°W - Arizona; Colorado; Idaho; Montana; New Mexico; Utah; Wyoming
     * Replaces NAD83 / UTM zone 12N for applications with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) /
     * UTM zone 12N.
     */
    public const EPSG_NAD83_HARN_UTM_ZONE_12N = 'urn:ogc:def:crs:EPSG::3742';

    /**
     * NAD83(HARN) / UTM zone 13N
     * Extent: USA - between 108°W and 102°W - Colorado; Montana; Nebraska; New Mexico; North Dakota; Oklahoma; South
     * Dakota; Texas; Wyoming
     * Replaces NAD83 / UTM zone 13N for applications with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) /
     * UTM zone 13N.
     */
    public const EPSG_NAD83_HARN_UTM_ZONE_13N = 'urn:ogc:def:crs:EPSG::3743';

    /**
     * NAD83(HARN) / UTM zone 14N
     * Extent: USA - between 102°W and 96°W - onshore - Iowa; Kansas; Minnesota; Nebraska; North Dakota; Oklahoma;
     * South Dakota; Texas
     * Replaces NAD83 / UTM zone 14N for applications with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) /
     * UTM zone 14N.
     */
    public const EPSG_NAD83_HARN_UTM_ZONE_14N = 'urn:ogc:def:crs:EPSG::3744';

    /**
     * NAD83(HARN) / UTM zone 15N
     * Extent: USA - between 96°W and 90°W - onshore - Arkansas; Illinois; Iowa; Kansas; Louisiana; Michigan;
     * Minnesota; Mississippi; Missouri; Nebraska; Oklahoma; Tennessee; Texas; Wisconsin
     * Replaces NAD83 / UTM zone 15N for applications with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) /
     * UTM zone 15N.
     */
    public const EPSG_NAD83_HARN_UTM_ZONE_15N = 'urn:ogc:def:crs:EPSG::3745';

    /**
     * NAD83(HARN) / UTM zone 16N
     * Extent: USA - between 90°W and 84°W - onshore - Alabama; Arkansas; Florida; Georgia; Indiana; Illinois;
     * Kentucky; Louisiana; Michigan; Minnesota; Mississippi; Missouri; North Carolina; Ohio; Tennessee; Wisconsin
     * Replaces NAD83 / UTM zone 16N for applications with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) /
     * UTM zone 16N.
     */
    public const EPSG_NAD83_HARN_UTM_ZONE_16N = 'urn:ogc:def:crs:EPSG::3746';

    /**
     * NAD83(HARN) / UTM zone 17N
     * Extent: USA - between 84°W and 78°W - onshore - Florida; Georgia; Maryland; Michigan; New York; North
     * Carolina; Ohio; Pennsylvania; South Carolina; Tennessee; Virginia; West Virginia
     * Replaces NAD83 / UTM zone 17N for applications with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) /
     * UTM zone 17N.
     */
    public const EPSG_NAD83_HARN_UTM_ZONE_17N = 'urn:ogc:def:crs:EPSG::3747';

    /**
     * NAD83(HARN) / UTM zone 18N
     * Extent: USA - between 78°W and 72°W - onshore - Connecticut; Delaware; District of Columbia (DC); Maryland;
     * Massachusetts; New Hampshire; New Jersey; New York; North Carolina; Pennsylvania; Virginia; Vermont
     * Replaces NAD83 / UTM zone 18N for applications with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) /
     * UTM zone 18N.
     */
    public const EPSG_NAD83_HARN_UTM_ZONE_18N = 'urn:ogc:def:crs:EPSG::3748';

    /**
     * NAD83(HARN) / UTM zone 19N
     * Extent: USA - between 72°W and 66°W - onshore - Connecticut; Maine; Massachusetts; New Hampshire; New York
     * (Long Island); Rhode Island; Vermont
     * Replaces NAD83 / UTM zone 19N for applications with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) /
     * UTM zone 19N.
     */
    public const EPSG_NAD83_HARN_UTM_ZONE_19N = 'urn:ogc:def:crs:EPSG::3749';

    /**
     * NAD83(HARN) / UTM zone 2S
     * Extent: American Samoa - Tutuila, Aunu'u, Ofu, Olesega, Ta'u and Rose islands
     * Replaces American Samoa 1962 / American Samoa Lambert (projCRS 3102) effective from 2000.
     */
    public const EPSG_NAD83_HARN_UTM_ZONE_2S = 'urn:ogc:def:crs:EPSG::2195';

    /**
     * NAD83(HARN) / UTM zone 4N
     * Extent: USA - between 162°W and 156°W onshore - Hawaii.
     */
    public const EPSG_NAD83_HARN_UTM_ZONE_4N = 'urn:ogc:def:crs:EPSG::3750';

    /**
     * NAD83(HARN) / UTM zone 5N
     * Extent: USA - between 156°W and 150°W onshore - Hawaii.
     */
    public const EPSG_NAD83_HARN_UTM_ZONE_5N = 'urn:ogc:def:crs:EPSG::3751';

    /**
     * NAD83(HARN) / Vermont
     * Extent: USA - Vermont
     * State law defines system in US survey feet. See code 5654 for equivalent non-metric definition. Replaces NAD83 /
     * SPCS for applications with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_VERMONT = 'urn:ogc:def:crs:EPSG::2852';

    /**
     * NAD83(HARN) / Vermont (ftUS)
     * Extent: USA - Vermont
     * State law defines system in US survey feet. Federal definition is metric - see code 2852. Replaces NAD83 / SPCS
     * for applications with an accuracy of better than 3 feet. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_VERMONT_FTUS = 'urn:ogc:def:crs:EPSG::5654';

    /**
     * NAD83(HARN) / Virginia Lambert
     * Extent: USA - Virginia
     * Replaces NAD83 / Virginia Lambert (CRS code 3968) for applications with an accuracy of better than 1m. Replaced
     * by NAD83(NSRS2007) / Virginia Lambert (CRS code 3970).
     */
    public const EPSG_NAD83_HARN_VIRGINIA_LAMBERT = 'urn:ogc:def:crs:EPSG::3969';

    /**
     * NAD83(HARN) / Virginia North
     * Extent: USA - Virginia - counties of Arlington; Augusta; Bath; Caroline; Clarke; Culpeper; Fairfax; Fauquier;
     * Frederick; Greene; Highland; King George; Loudoun; Madison; Orange; Page; Prince William; Rappahannock;
     * Rockingham; Shenandoah; Spotsylvania; Stafford; Warren; Westmoreland
     * State law defines system in US survey feet. See code 2924 for equivalent non-metric definition. Replaces NAD83 /
     * SPCS for applications with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_VIRGINIA_NORTH = 'urn:ogc:def:crs:EPSG::2853';

    /**
     * NAD83(HARN) / Virginia North (ftUS)
     * Extent: USA - Virginia - counties of Arlington; Augusta; Bath; Caroline; Clarke; Culpeper; Fairfax; Fauquier;
     * Frederick; Greene; Highland; King George; Loudoun; Madison; Orange; Page; Prince William; Rappahannock;
     * Rockingham; Shenandoah; Spotsylvania; Stafford; Warren; Westmoreland
     * State law defines system in US survey feet. Federal definition is metric - see code 2853. Replaces NAD83 / SPCS
     * for applications with an accuracy of better than 3 feet. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_VIRGINIA_NORTH_FTUS = 'urn:ogc:def:crs:EPSG::2924';

    /**
     * NAD83(HARN) / Virginia South
     * Extent: USA - Virginia - counties of Accomack; Albemarle; Alleghany; Amelia; Amherst; Appomattox; Bedford;
     * Bland; Botetourt; Bristol; Brunswick; Buchanan; Buckingham; Campbell; Carroll; Charles City; Charlotte;
     * Chesapeake; Chesterfield; Colonial Heights; Craig; Cumberland; Dickenson; Dinwiddie; Essex; Floyd; Fluvanna;
     * Franklin; Giles; Gloucester; Goochland; Grayson; Greensville; Halifax; Hampton; Hanover; Henrico; Henry; Isle of
     * Wight; James City; King and Queen; King William; Lancaster; Lee; Louisa; Lunenburg; Lynchburg; Mathews;
     * Mecklenburg; Middlesex; Montgomery; Nelson; New Kent; Newport News; Norfolk; Northampton; Northumberland;
     * Norton; Nottoway; Patrick; Petersburg; Pittsylvania; Portsmouth; Powhatan; Prince Edward; Prince George;
     * Pulaski; Richmond; Roanoke; Rockbridge; Russell; Scott; Smyth; Southampton; Suffolk; Surry; Sussex; Tazewell;
     * Washington; Wise; Wythe; York
     * State law defines system in US survey feet. See code 2925 for equivalent non-metric definition. Replaces NAD83 /
     * SPCS for applications with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_VIRGINIA_SOUTH = 'urn:ogc:def:crs:EPSG::2854';

    /**
     * NAD83(HARN) / Virginia South (ftUS)
     * Extent: USA - Virginia - counties of Accomack; Albemarle; Alleghany; Amelia; Amherst; Appomattox; Bedford;
     * Bland; Botetourt; Bristol; Brunswick; Buchanan; Buckingham; Campbell; Carroll; Charles City; Charlotte;
     * Chesapeake; Chesterfield; Colonial Heights; Craig; Cumberland; Dickenson; Dinwiddie; Essex; Floyd; Fluvanna;
     * Franklin; Giles; Gloucester; Goochland; Grayson; Greensville; Halifax; Hampton; Hanover; Henrico; Henry; Isle of
     * Wight; James City; King and Queen; King William; Lancaster; Lee; Louisa; Lunenburg; Lynchburg; Mathews;
     * Mecklenburg; Middlesex; Montgomery; Nelson; New Kent; Newport News; Norfolk; Northampton; Northumberland;
     * Norton; Nottoway; Patrick; Petersburg; Pittsylvania; Portsmouth; Powhatan; Prince Edward; Prince George;
     * Pulaski; Richmond; Roanoke; Rockbridge; Russell; Scott; Smyth; Southampton; Suffolk; Surry; Sussex; Tazewell;
     * Washington; Wise; Wythe; York
     * State law defines system in US survey feet. Federal definition is metric - see code 2854. Replaces NAD83 / SPCS
     * for applications with an accuracy of better than 3 feet. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_VIRGINIA_SOUTH_FTUS = 'urn:ogc:def:crs:EPSG::2925';

    /**
     * NAD83(HARN) / Washington North
     * Extent: USA - Washington - counties of Chelan; Clallam; Douglas; Ferry; Grant north of approximately 47°30'N;
     * Island; Jefferson; King; Kitsap; Lincoln; Okanogan; Pend Oreille; San Juan; Skagit; Snohomish; Spokane; Stevens;
     * Whatcom
     * State law defines system in US survey feet. See code 2926 for equivalent non-metric definition. Replaces NAD83 /
     * SPCS for applications with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_WASHINGTON_NORTH = 'urn:ogc:def:crs:EPSG::2855';

    /**
     * NAD83(HARN) / Washington North (ftUS)
     * Extent: USA - Washington - counties of Chelan; Clallam; Douglas; Ferry; Grant north of approximately 47°30'N;
     * Island; Jefferson; King; Kitsap; Lincoln; Okanogan; Pend Oreille; San Juan; Skagit; Snohomish; Spokane; Stevens;
     * Whatcom
     * State law defines system in US survey feet. Federal definition is metric - see code 2855. Replaces NAD83 / SPCS
     * for applications with an accuracy of better than 3 feet. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_WASHINGTON_NORTH_FTUS = 'urn:ogc:def:crs:EPSG::2926';

    /**
     * NAD83(HARN) / Washington South
     * Extent: USA - Washington - counties of Adams; Asotin; Benton; Clark; Columbia; Cowlitz; Franklin; Garfield;
     * Grant south of approximately 47°30'N; Grays Harbor; Kittitas; Klickitat; Lewis; Mason; Pacific; Pierce;
     * Skamania; Thurston; Wahkiakum; Walla Walla; Whitman; Yakima
     * State law defines system in US survey feet. See code 2927 for equivalent non-metric definition. Replaces NAD83 /
     * SPCS for applications with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_WASHINGTON_SOUTH = 'urn:ogc:def:crs:EPSG::2856';

    /**
     * NAD83(HARN) / Washington South (ftUS)
     * Extent: USA - Washington - counties of Adams; Asotin; Benton; Clark; Columbia; Cowlitz; Franklin; Garfield;
     * Grant south of approximately 47°30'N; Grays Harbor; Kittitas; Klickitat; Lewis; Mason; Pacific; Pierce;
     * Skamania; Thurston; Wahkiakum; Walla Walla; Whitman; Yakima
     * State law defines system in US survey feet. Federal definition is metric - see code 2856. Replaces NAD83 / SPCS
     * for applications with an accuracy of better than 3 feet. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_WASHINGTON_SOUTH_FTUS = 'urn:ogc:def:crs:EPSG::2927';

    /**
     * NAD83(HARN) / West Virginia North
     * Extent: USA - West Virginia - counties of Barbour; Berkeley; Brooke; Doddridge; Grant; Hampshire; Hancock;
     * Hardy; Harrison; Jefferson; Marion; Marshall; Mineral; Monongalia; Morgan; Ohio; Pleasants; Preston; Ritchie;
     * Taylor; Tucker; Tyler; Wetzel; Wirt; Wood
     * State law defines system in US survey feet. See CRS code 26861 for equivalent non-metric definition. Replaces
     * NAD83 / SPCS for applications with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_WEST_VIRGINIA_NORTH = 'urn:ogc:def:crs:EPSG::2857';

    /**
     * NAD83(HARN) / West Virginia North (ftUS)
     * Extent: USA - West Virginia - counties of Barbour; Berkeley; Brooke; Doddridge; Grant; Hampshire; Hancock;
     * Hardy; Harrison; Jefferson; Marion; Marshall; Mineral; Monongalia; Morgan; Ohio; Pleasants; Preston; Ritchie;
     * Taylor; Tucker; Tyler; Wetzel; Wirt; Wood
     * State law defines use of US survey feet. Federal definition is metric - see code 2857. Replaces NAD83 / SPCS for
     * applications with an accuracy of better than 3ft. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_WEST_VIRGINIA_NORTH_FTUS = 'urn:ogc:def:crs:EPSG::26861';

    /**
     * NAD83(HARN) / West Virginia South
     * Extent: USA - West Virginia - counties of Boone; Braxton; Cabell; Calhoun; Clay; Fayette; Gilmer; Greenbrier;
     * Jackson; Kanawha; Lewis; Lincoln; Logan; Mason; McDowell; Mercer; Mingo; Monroe; Nicholas; Pendleton;
     * Pocahontas; Putnam; Raleigh; Randolph; Roane; Summers; Upshur; Wayne; Webster; Wyoming
     * State law defines system in US survey feet. See CRS code 26862 for equivalent non-metric definition. Replaces
     * NAD83 / SPCS for applications with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_WEST_VIRGINIA_SOUTH = 'urn:ogc:def:crs:EPSG::2858';

    /**
     * NAD83(HARN) / West Virginia South (ftUS)
     * Extent: USA - West Virginia - counties of Boone; Braxton; Cabell; Calhoun; Clay; Fayette; Gilmer; Greenbrier;
     * Jackson; Kanawha; Lewis; Lincoln; Logan; Mason; McDowell; Mercer; Mingo; Monroe; Nicholas; Pendleton;
     * Pocahontas; Putnam; Raleigh; Randolph; Roane; Summers; Upshur; Wayne; Webster; Wyoming
     * State law defines use of US survey feet. Federal definition is metric - see code 2858. Replaces NAD83 / SPCS for
     * applications with an accuracy of better than 3ft. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_WEST_VIRGINIA_SOUTH_FTUS = 'urn:ogc:def:crs:EPSG::26862';

    /**
     * NAD83(HARN) / Wisconsin Central
     * Extent: USA - Wisconsin - counties of Barron; Brown; Buffalo; Chippewa; Clark; Door; Dunn; Eau Claire; Jackson;
     * Kewaunee; Langlade; Lincoln; Marathon; Marinette; Menominee; Oconto; Outagamie; Pepin; Pierce; Polk; Portage;
     * Rusk; Shawano; St Croix; Taylor; Trempealeau; Waupaca; Wood
     * State law defines system in US survey feet. See code 2929 for equivalent non-metric definition. Replaces NAD83 /
     * SPCS for applications with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_WISCONSIN_CENTRAL = 'urn:ogc:def:crs:EPSG::2860';

    /**
     * NAD83(HARN) / Wisconsin Central (ftUS)
     * Extent: USA - Wisconsin - counties of Barron; Brown; Buffalo; Chippewa; Clark; Door; Dunn; Eau Claire; Jackson;
     * Kewaunee; Langlade; Lincoln; Marathon; Marinette; Menominee; Oconto; Outagamie; Pepin; Pierce; Polk; Portage;
     * Rusk; Shawano; St Croix; Taylor; Trempealeau; Waupaca; Wood
     * State law defines system in US survey feet. Federal definition is metric - see code 2860. Replaces NAD83 / SPCS
     * for applications with an accuracy of better than 3 feet. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_WISCONSIN_CENTRAL_FTUS = 'urn:ogc:def:crs:EPSG::2929';

    /**
     * NAD83(HARN) / Wisconsin North
     * Extent: USA - Wisconsin - counties of Ashland; Bayfield; Burnett; Douglas; Florence; Forest; Iron; Oneida;
     * Price; Sawyer; Vilas; Washburn
     * State law defines system in US survey feet. See code 2928 for equivalent non-metric definition. Replaces NAD83 /
     * SPCS for applications with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_WISCONSIN_NORTH = 'urn:ogc:def:crs:EPSG::2859';

    /**
     * NAD83(HARN) / Wisconsin North (ftUS)
     * Extent: USA - Wisconsin - counties of Ashland; Bayfield; Burnett; Douglas; Florence; Forest; Iron; Oneida;
     * Price; Sawyer; Vilas; Washburn
     * State law defines system in US survey feet. Federal definition is metric - see code 2859. Replaces NAD83 / SPCS
     * for applications with an accuracy of better than 3 feet. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_WISCONSIN_NORTH_FTUS = 'urn:ogc:def:crs:EPSG::2928';

    /**
     * NAD83(HARN) / Wisconsin South
     * Extent: USA - Wisconsin - counties of Adams; Calumet; Columbia; Crawford; Dane; Dodge; Fond Du Lac; Grant;
     * Green; Green Lake; Iowa; Jefferson; Juneau; Kenosha; La Crosse; Lafayette; Manitowoc; Marquette; Milwaukee;
     * Monroe; Ozaukee; Racine; Richland; Rock; Sauk; Sheboygan; Vernon; Walworth; Washington; Waukesha; Waushara;
     * Winnebago
     * State law defines system in US survey feet. See code 2930 for equivalent non-metric definition. Replaces NAD83 /
     * SPCS for applications with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_WISCONSIN_SOUTH = 'urn:ogc:def:crs:EPSG::2861';

    /**
     * NAD83(HARN) / Wisconsin South (ftUS)
     * Extent: USA - Wisconsin - counties of Adams; Calumet; Columbia; Crawford; Dane; Dodge; Fond Du Lac; Grant;
     * Green; Green Lake; Iowa; Jefferson; Juneau; Kenosha; La Crosse; Lafayette; Manitowoc; Marquette; Milwaukee;
     * Monroe; Ozaukee; Racine; Richland; Rock; Sauk; Sheboygan; Vernon; Walworth; Washington; Waukesha; Waushara;
     * Winnebago
     * State law defines system in US survey feet. Federal definition is metric - see code 2861. Replaces NAD83 / SPCS
     * for applications with an accuracy of better than 3 feet. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_WISCONSIN_SOUTH_FTUS = 'urn:ogc:def:crs:EPSG::2930';

    /**
     * NAD83(HARN) / Wisconsin Transverse Mercator
     * Extent: USA - Wisconsin
     * Designed as a single zone for the whole state. Replaces NAD83 / Wisconsin Transverse Mercator for applications
     * with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) / Wisconsin Transverse Mercator.
     */
    public const EPSG_NAD83_HARN_WISCONSIN_TRANSVERSE_MERCATOR = 'urn:ogc:def:crs:EPSG::3071';

    /**
     * NAD83(HARN) / WISCRS Adams and Juneau (ftUS)
     * Extent: USA - Wisconsin - counties of Adams and Juneau
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined as separate zones for each county these
     * having identical parameter values: see info source. Defined in meters - see CRS code 8225.
     */
    public const EPSG_NAD83_HARN_WISCRS_ADAMS_AND_JUNEAU_FTUS = 'urn:ogc:def:crs:EPSG::8226';

    /**
     * NAD83(HARN) / WISCRS Adams and Juneau (m)
     * Extent: USA - Wisconsin - counties of Adams and Juneau
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined as separate zones for each county these
     * having identical parameter values: see info source. Working units are feet - see CRS code 8226.
     */
    public const EPSG_NAD83_HARN_WISCRS_ADAMS_AND_JUNEAU_M = 'urn:ogc:def:crs:EPSG::8225';

    /**
     * NAD83(HARN) / WISCRS Ashland (ftUS)
     * Extent: USA - Wisconsin - Ashland county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined in meters - see CRS code 8222.
     */
    public const EPSG_NAD83_HARN_WISCRS_ASHLAND_FTUS = 'urn:ogc:def:crs:EPSG::8224';

    /**
     * NAD83(HARN) / WISCRS Ashland (m)
     * Extent: USA - Wisconsin - Ashland county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Working units are feet - see CRS code 8224.
     */
    public const EPSG_NAD83_HARN_WISCRS_ASHLAND_M = 'urn:ogc:def:crs:EPSG::8222';

    /**
     * NAD83(HARN) / WISCRS Barron (ftUS)
     * Extent: USA - Wisconsin - Barron county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined in meters - see CRS code 8218.
     */
    public const EPSG_NAD83_HARN_WISCRS_BARRON_FTUS = 'urn:ogc:def:crs:EPSG::8220';

    /**
     * NAD83(HARN) / WISCRS Barron (m)
     * Extent: USA - Wisconsin - Barron county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Working units are feet - see CRS code 8220.
     */
    public const EPSG_NAD83_HARN_WISCRS_BARRON_M = 'urn:ogc:def:crs:EPSG::8218';

    /**
     * NAD83(HARN) / WISCRS Bayfield (ftUS)
     * Extent: USA - Wisconsin - Bayfield county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined in meters - see CRS code 8214.
     */
    public const EPSG_NAD83_HARN_WISCRS_BAYFIELD_FTUS = 'urn:ogc:def:crs:EPSG::8216';

    /**
     * NAD83(HARN) / WISCRS Bayfield (m)
     * Extent: USA - Wisconsin - Bayfield county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Working units are feet - see CRS code 8216.
     */
    public const EPSG_NAD83_HARN_WISCRS_BAYFIELD_M = 'urn:ogc:def:crs:EPSG::8214';

    /**
     * NAD83(HARN) / WISCRS Brown (ftUS)
     * Extent: USA - Wisconsin - Brown county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined in meters - see CRS code 8212.
     */
    public const EPSG_NAD83_HARN_WISCRS_BROWN_FTUS = 'urn:ogc:def:crs:EPSG::8213';

    /**
     * NAD83(HARN) / WISCRS Brown (m)
     * Extent: USA - Wisconsin - Brown county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Working units are feet - see CRS code 8213.
     */
    public const EPSG_NAD83_HARN_WISCRS_BROWN_M = 'urn:ogc:def:crs:EPSG::8212';

    /**
     * NAD83(HARN) / WISCRS Buffalo (ftUS)
     * Extent: USA - Wisconsin - Buffalo county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined in meters - see CRS code 8209.
     */
    public const EPSG_NAD83_HARN_WISCRS_BUFFALO_FTUS = 'urn:ogc:def:crs:EPSG::8210';

    /**
     * NAD83(HARN) / WISCRS Buffalo (m)
     * Extent: USA - Wisconsin - Buffalo county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Working units are feet - see CRS code 8210.
     */
    public const EPSG_NAD83_HARN_WISCRS_BUFFALO_M = 'urn:ogc:def:crs:EPSG::8209';

    /**
     * NAD83(HARN) / WISCRS Burnett (ftUS)
     * Extent: USA - Wisconsin - Burnett county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined in meters - see CRS code 8207.
     */
    public const EPSG_NAD83_HARN_WISCRS_BURNETT_FTUS = 'urn:ogc:def:crs:EPSG::8208';

    /**
     * NAD83(HARN) / WISCRS Burnett (m)
     * Extent: USA - Wisconsin - Burnett county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Working units are feet - see CRS code 8208.
     */
    public const EPSG_NAD83_HARN_WISCRS_BURNETT_M = 'urn:ogc:def:crs:EPSG::8207';

    /**
     * NAD83(HARN) / WISCRS Calumet, Fond du Lac, Outagamie and Winnebago (ftUS)
     * Extent: USA - Wisconsin - counties of Calumet, Fond du Lac, Outagamie and Winnebago
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined as separate zones for each county these
     * having identical parameter values: see info source. Defined in meters - see CRS code 8205.
     */
    public const EPSG_NAD83_HARN_WISCRS_CALUMET_FOND_DU_LAC_OUTAGAMIE_AND_WINNEBAGO_FTUS = 'urn:ogc:def:crs:EPSG::8206';

    /**
     * NAD83(HARN) / WISCRS Calumet, Fond du Lac, Outagamie and Winnebago (m)
     * Extent: USA - Wisconsin - counties of Calumet, Fond du Lac, Outagamie and Winnebago
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined as separate zones for each county these
     * having identical parameter values: see info source. Working units are feet - see CRS code 8206.
     */
    public const EPSG_NAD83_HARN_WISCRS_CALUMET_FOND_DU_LAC_OUTAGAMIE_AND_WINNEBAGO_M = 'urn:ogc:def:crs:EPSG::8205';

    /**
     * NAD83(HARN) / WISCRS Chippewa (ftUS)
     * Extent: USA - Wisconsin - Chippewa county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined in meters - see CRS code 8203.
     */
    public const EPSG_NAD83_HARN_WISCRS_CHIPPEWA_FTUS = 'urn:ogc:def:crs:EPSG::8204';

    /**
     * NAD83(HARN) / WISCRS Chippewa (m)
     * Extent: USA - Wisconsin - Chippewa county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Working units are feet - see CRS code 8204.
     */
    public const EPSG_NAD83_HARN_WISCRS_CHIPPEWA_M = 'urn:ogc:def:crs:EPSG::8203';

    /**
     * NAD83(HARN) / WISCRS Clark (ftUS)
     * Extent: USA - Wisconsin - Clark county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined in meters - see CRS code 8201.
     */
    public const EPSG_NAD83_HARN_WISCRS_CLARK_FTUS = 'urn:ogc:def:crs:EPSG::8202';

    /**
     * NAD83(HARN) / WISCRS Clark (m)
     * Extent: USA - Wisconsin - Clark county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Working units are feet - see CRS code 8202.
     */
    public const EPSG_NAD83_HARN_WISCRS_CLARK_M = 'urn:ogc:def:crs:EPSG::8201';

    /**
     * NAD83(HARN) / WISCRS Columbia (ftUS)
     * Extent: USA - Wisconsin - Columbia county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined in meters - see CRS code 8198.
     */
    public const EPSG_NAD83_HARN_WISCRS_COLUMBIA_FTUS = 'urn:ogc:def:crs:EPSG::8200';

    /**
     * NAD83(HARN) / WISCRS Columbia (m)
     * Extent: USA - Wisconsin - Columbia county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Working units are feet - see CRS code 8200.
     */
    public const EPSG_NAD83_HARN_WISCRS_COLUMBIA_M = 'urn:ogc:def:crs:EPSG::8198';

    /**
     * NAD83(HARN) / WISCRS Crawford (ftUS)
     * Extent: USA - Wisconsin - Crawford county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined in meters - see CRS code 8196.
     */
    public const EPSG_NAD83_HARN_WISCRS_CRAWFORD_FTUS = 'urn:ogc:def:crs:EPSG::8197';

    /**
     * NAD83(HARN) / WISCRS Crawford (m)
     * Extent: USA - Wisconsin - Crawford county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Working units are feet - see CRS code 8197.
     */
    public const EPSG_NAD83_HARN_WISCRS_CRAWFORD_M = 'urn:ogc:def:crs:EPSG::8196';

    /**
     * NAD83(HARN) / WISCRS Dane (ftUS)
     * Extent: USA - Wisconsin - Dane county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined in meters - see CRS code 8191.
     */
    public const EPSG_NAD83_HARN_WISCRS_DANE_FTUS = 'urn:ogc:def:crs:EPSG::8193';

    /**
     * NAD83(HARN) / WISCRS Dane (m)
     * Extent: USA - Wisconsin - Dane county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Working units are feet - see CRS code 8193.
     */
    public const EPSG_NAD83_HARN_WISCRS_DANE_M = 'urn:ogc:def:crs:EPSG::8191';

    /**
     * NAD83(HARN) / WISCRS Dodge and Jefferson (ftUS)
     * Extent: USA - Wisconsin - counties of Dodge and Jefferson
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined as separate zones for each county these
     * having identical parameter values: see info source. Defined in meters - see CRS code 8187.
     */
    public const EPSG_NAD83_HARN_WISCRS_DODGE_AND_JEFFERSON_FTUS = 'urn:ogc:def:crs:EPSG::8189';

    /**
     * NAD83(HARN) / WISCRS Dodge and Jefferson (m)
     * Extent: USA - Wisconsin - counties of Dodge and Jefferson
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined as separate zones for each county these
     * having identical parameter values: see info source. Working units are feet - see CRS code 8189.
     */
    public const EPSG_NAD83_HARN_WISCRS_DODGE_AND_JEFFERSON_M = 'urn:ogc:def:crs:EPSG::8187';

    /**
     * NAD83(HARN) / WISCRS Door (ftUS)
     * Extent: USA - Wisconsin - Door county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined in meters - see CRS code 8184.
     */
    public const EPSG_NAD83_HARN_WISCRS_DOOR_FTUS = 'urn:ogc:def:crs:EPSG::8185';

    /**
     * NAD83(HARN) / WISCRS Door (m)
     * Extent: USA - Wisconsin - Door county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Working units are feet - see CRS code 8185.
     */
    public const EPSG_NAD83_HARN_WISCRS_DOOR_M = 'urn:ogc:def:crs:EPSG::8184';

    /**
     * NAD83(HARN) / WISCRS Douglas (ftUS)
     * Extent: USA - Wisconsin - Douglas county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined in meters - see CRS code 8181.
     */
    public const EPSG_NAD83_HARN_WISCRS_DOUGLAS_FTUS = 'urn:ogc:def:crs:EPSG::8182';

    /**
     * NAD83(HARN) / WISCRS Douglas (m)
     * Extent: USA - Wisconsin - Douglas county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Working units are feet - see CRS code 8182.
     */
    public const EPSG_NAD83_HARN_WISCRS_DOUGLAS_M = 'urn:ogc:def:crs:EPSG::8181';

    /**
     * NAD83(HARN) / WISCRS Dunn (ftUS)
     * Extent: USA - Wisconsin - Dunn county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined in meters - see CRS code 8179.
     */
    public const EPSG_NAD83_HARN_WISCRS_DUNN_FTUS = 'urn:ogc:def:crs:EPSG::8180';

    /**
     * NAD83(HARN) / WISCRS Dunn (m)
     * Extent: USA - Wisconsin - Dunn county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Working units are feet - see CRS code 8180.
     */
    public const EPSG_NAD83_HARN_WISCRS_DUNN_M = 'urn:ogc:def:crs:EPSG::8179';

    /**
     * NAD83(HARN) / WISCRS Eau Claire (ftUS)
     * Extent: USA - Wisconsin - Eau Claire county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined in meters - see CRS code 8092.
     */
    public const EPSG_NAD83_HARN_WISCRS_EAU_CLAIRE_FTUS = 'urn:ogc:def:crs:EPSG::8093';

    /**
     * NAD83(HARN) / WISCRS Eau Claire (m)
     * Extent: USA - Wisconsin - Eau Claire county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Working units are feet - see CRS code 8093.
     */
    public const EPSG_NAD83_HARN_WISCRS_EAU_CLAIRE_M = 'urn:ogc:def:crs:EPSG::8092';

    /**
     * NAD83(HARN) / WISCRS Florence (ftUS)
     * Extent: USA - Wisconsin - Florence county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined in meters - see CRS code 8090.
     */
    public const EPSG_NAD83_HARN_WISCRS_FLORENCE_FTUS = 'urn:ogc:def:crs:EPSG::8091';

    /**
     * NAD83(HARN) / WISCRS Florence (m)
     * Extent: USA - Wisconsin - Florence county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Working units are feet - see CRS code 8091.
     */
    public const EPSG_NAD83_HARN_WISCRS_FLORENCE_M = 'urn:ogc:def:crs:EPSG::8090';

    /**
     * NAD83(HARN) / WISCRS Forest (ftUS)
     * Extent: USA - Wisconsin - Forest county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined in meters - see CRS code 8173.
     */
    public const EPSG_NAD83_HARN_WISCRS_FOREST_FTUS = 'urn:ogc:def:crs:EPSG::8177';

    /**
     * NAD83(HARN) / WISCRS Forest (m)
     * Extent: USA - Wisconsin - Forest county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Working units are feet - see CRS code 8177.
     */
    public const EPSG_NAD83_HARN_WISCRS_FOREST_M = 'urn:ogc:def:crs:EPSG::8173';

    /**
     * NAD83(HARN) / WISCRS Grant (ftUS)
     * Extent: USA - Wisconsin - Grant county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined in meters - see CRS code 8171.
     */
    public const EPSG_NAD83_HARN_WISCRS_GRANT_FTUS = 'urn:ogc:def:crs:EPSG::8172';

    /**
     * NAD83(HARN) / WISCRS Grant (m)
     * Extent: USA - Wisconsin - Grant county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Working units are feet - see CRS code 8172.
     */
    public const EPSG_NAD83_HARN_WISCRS_GRANT_M = 'urn:ogc:def:crs:EPSG::8171';

    /**
     * NAD83(HARN) / WISCRS Green and Lafayette (ftUS)
     * Extent: USA - Wisconsin - counties of Green and Lafayette
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined as separate zones for each county these
     * having identical parameter values: see info source. Defined in meters - see CRS code 8169.
     */
    public const EPSG_NAD83_HARN_WISCRS_GREEN_AND_LAFAYETTE_FTUS = 'urn:ogc:def:crs:EPSG::8170';

    /**
     * NAD83(HARN) / WISCRS Green and Lafayette (m)
     * Extent: USA - Wisconsin - counties of Green and Lafayette
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined as separate zones for each county these
     * having identical parameter values: see info source. Working units are feet - see CRS code 8170.
     */
    public const EPSG_NAD83_HARN_WISCRS_GREEN_AND_LAFAYETTE_M = 'urn:ogc:def:crs:EPSG::8169';

    /**
     * NAD83(HARN) / WISCRS Green Lake and Marquette (ftUS)
     * Extent: USA - Wisconsin - counties of Green Lake and Marquette
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined as separate zones for each county these
     * having identical parameter values: see info source. Defined in meters - see CRS code 8167.
     */
    public const EPSG_NAD83_HARN_WISCRS_GREEN_LAKE_AND_MARQUETTE_FTUS = 'urn:ogc:def:crs:EPSG::8168';

    /**
     * NAD83(HARN) / WISCRS Green Lake and Marquette (m)
     * Extent: USA - Wisconsin - counties of Green Lake and Marquette
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined as separate zones for each county these
     * having identical parameter values: see info source. Working units are feet - see CRS code 8168.
     */
    public const EPSG_NAD83_HARN_WISCRS_GREEN_LAKE_AND_MARQUETTE_M = 'urn:ogc:def:crs:EPSG::8167';

    /**
     * NAD83(HARN) / WISCRS Iowa (ftUS)
     * Extent: USA - Wisconsin - Iowa county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined in meters - see CRS code 8165.
     */
    public const EPSG_NAD83_HARN_WISCRS_IOWA_FTUS = 'urn:ogc:def:crs:EPSG::8166';

    /**
     * NAD83(HARN) / WISCRS Iowa (m)
     * Extent: USA - Wisconsin - Iowa county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Working units are feet - see CRS code 8166.
     */
    public const EPSG_NAD83_HARN_WISCRS_IOWA_M = 'urn:ogc:def:crs:EPSG::8165';

    /**
     * NAD83(HARN) / WISCRS Iron (ftUS)
     * Extent: USA - Wisconsin - Iron county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined in meters - see CRS code 8163.
     */
    public const EPSG_NAD83_HARN_WISCRS_IRON_FTUS = 'urn:ogc:def:crs:EPSG::8164';

    /**
     * NAD83(HARN) / WISCRS Iron (m)
     * Extent: USA - Wisconsin - Iron county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Working units are feet - see CRS code 8164.
     */
    public const EPSG_NAD83_HARN_WISCRS_IRON_M = 'urn:ogc:def:crs:EPSG::8163';

    /**
     * NAD83(HARN) / WISCRS Jackson (ftUS)
     * Extent: USA - Wisconsin - Jackson county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined in meters - see CRS code 8161. When using
     * the WISCORS network referenced to NAD83(2011) this CRS may be emulated through NAD83(2011) / Adjusted Jackson
     * (ftUS) (CRS code 10516).
     */
    public const EPSG_NAD83_HARN_WISCRS_JACKSON_FTUS = 'urn:ogc:def:crs:EPSG::8162';

    /**
     * NAD83(HARN) / WISCRS Jackson (m)
     * Extent: USA - Wisconsin - Jackson county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Working units are feet - see CRS code 8162.
     */
    public const EPSG_NAD83_HARN_WISCRS_JACKSON_M = 'urn:ogc:def:crs:EPSG::8161';

    /**
     * NAD83(HARN) / WISCRS Kenosha, Milwaukee, Ozaukee and Racine (ftUS)
     * Extent: USA - Wisconsin - counties of Kenosha, Milwaukee, Ozaukee and Racine
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined as separate zones for each county these
     * having identical parameter values: see info source. Defined in meters - see CRS code 8159.
     */
    public const EPSG_NAD83_HARN_WISCRS_KENOSHA_MILWAUKEE_OZAUKEE_AND_RACINE_FTUS = 'urn:ogc:def:crs:EPSG::8160';

    /**
     * NAD83(HARN) / WISCRS Kenosha, Milwaukee, Ozaukee and Racine (m)
     * Extent: USA - Wisconsin - counties of Kenosha, Milwaukee, Ozaukee and Racine
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined as separate zones for each county these
     * having identical parameter values: see info source. Working units are feet - see CRS code 8160.
     */
    public const EPSG_NAD83_HARN_WISCRS_KENOSHA_MILWAUKEE_OZAUKEE_AND_RACINE_M = 'urn:ogc:def:crs:EPSG::8159';

    /**
     * NAD83(HARN) / WISCRS Kewaunee, Manitowoc and Sheboygan (ftUS)
     * Extent: USA - Wisconsin - counties of Kewaunee, Manitowoc and Sheboygan
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined as separate zones for each county these
     * having identical parameter values: see info source. Defined in meters - see CRS code 8157.
     */
    public const EPSG_NAD83_HARN_WISCRS_KEWAUNEE_MANITOWOC_AND_SHEBOYGAN_FTUS = 'urn:ogc:def:crs:EPSG::8158';

    /**
     * NAD83(HARN) / WISCRS Kewaunee, Manitowoc and Sheboygan (m)
     * Extent: USA - Wisconsin - counties of Kewaunee, Manitowoc and Sheboygan
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined as separate zones for each county these
     * having identical parameter values: see info source. Working units are feet - see CRS code 8158.
     */
    public const EPSG_NAD83_HARN_WISCRS_KEWAUNEE_MANITOWOC_AND_SHEBOYGAN_M = 'urn:ogc:def:crs:EPSG::8157';

    /**
     * NAD83(HARN) / WISCRS Langlade (ftUS)
     * Extent: USA - Wisconsin - Langlade county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined in meters - see CRS code 8153.
     */
    public const EPSG_NAD83_HARN_WISCRS_LANGLADE_FTUS = 'urn:ogc:def:crs:EPSG::8154';

    /**
     * NAD83(HARN) / WISCRS Langlade (m)
     * Extent: USA - Wisconsin - Langlade county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Working units are feet - see CRS code 8154.
     */
    public const EPSG_NAD83_HARN_WISCRS_LANGLADE_M = 'urn:ogc:def:crs:EPSG::8153';

    /**
     * NAD83(HARN) / WISCRS La Crosse (ftUS)
     * Extent: USA - Wisconsin - La Crosse county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined in meters - see CRS code 8155.
     */
    public const EPSG_NAD83_HARN_WISCRS_LA_CROSSE_FTUS = 'urn:ogc:def:crs:EPSG::8156';

    /**
     * NAD83(HARN) / WISCRS La Crosse (m)
     * Extent: USA - Wisconsin - La Crosse county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Working units are feet - see CRS code 8156.
     */
    public const EPSG_NAD83_HARN_WISCRS_LA_CROSSE_M = 'urn:ogc:def:crs:EPSG::8155';

    /**
     * NAD83(HARN) / WISCRS Lincoln (ftUS)
     * Extent: USA - Wisconsin - Lincoln county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined in meters - see CRS code 8151.
     */
    public const EPSG_NAD83_HARN_WISCRS_LINCOLN_FTUS = 'urn:ogc:def:crs:EPSG::8152';

    /**
     * NAD83(HARN) / WISCRS Lincoln (m)
     * Extent: USA - Wisconsin - Lincoln county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Working units are feet - see CRS code 8152.
     */
    public const EPSG_NAD83_HARN_WISCRS_LINCOLN_M = 'urn:ogc:def:crs:EPSG::8151';

    /**
     * NAD83(HARN) / WISCRS Marathon (ftUS)
     * Extent: USA - Wisconsin - Marathon county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined in meters - see CRS code 8149.
     */
    public const EPSG_NAD83_HARN_WISCRS_MARATHON_FTUS = 'urn:ogc:def:crs:EPSG::8150';

    /**
     * NAD83(HARN) / WISCRS Marathon (m)
     * Extent: USA - Wisconsin - Marathon county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Working units are feet - see CRS code 8150.
     */
    public const EPSG_NAD83_HARN_WISCRS_MARATHON_M = 'urn:ogc:def:crs:EPSG::8149';

    /**
     * NAD83(HARN) / WISCRS Marinette (ftUS)
     * Extent: USA - Wisconsin - Marinette county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined in meters - see CRS code 8147.
     */
    public const EPSG_NAD83_HARN_WISCRS_MARINETTE_FTUS = 'urn:ogc:def:crs:EPSG::8148';

    /**
     * NAD83(HARN) / WISCRS Marinette (m)
     * Extent: USA - Wisconsin - Marinette county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Working units are feet - see CRS code 8148.
     */
    public const EPSG_NAD83_HARN_WISCRS_MARINETTE_M = 'urn:ogc:def:crs:EPSG::8147';

    /**
     * NAD83(HARN) / WISCRS Menominee (ftUS)
     * Extent: USA - Wisconsin - Menominee county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined in meters - see CRS code 8145.
     */
    public const EPSG_NAD83_HARN_WISCRS_MENOMINEE_FTUS = 'urn:ogc:def:crs:EPSG::8146';

    /**
     * NAD83(HARN) / WISCRS Menominee (m)
     * Extent: USA - Wisconsin - Menominee county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Working units are feet - see CRS code 8146.
     */
    public const EPSG_NAD83_HARN_WISCRS_MENOMINEE_M = 'urn:ogc:def:crs:EPSG::8145';

    /**
     * NAD83(HARN) / WISCRS Monroe (ftUS)
     * Extent: USA - Wisconsin - Monroe county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined in meters - see CRS code 8143.
     */
    public const EPSG_NAD83_HARN_WISCRS_MONROE_FTUS = 'urn:ogc:def:crs:EPSG::8144';

    /**
     * NAD83(HARN) / WISCRS Monroe (m)
     * Extent: USA - Wisconsin - Monroe county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Working units are feet - see CRS code 8144.
     */
    public const EPSG_NAD83_HARN_WISCRS_MONROE_M = 'urn:ogc:def:crs:EPSG::8143';

    /**
     * NAD83(HARN) / WISCRS Oconto (ftUS)
     * Extent: USA - Wisconsin - Oconto county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined in meters - see CRS code 8141.
     */
    public const EPSG_NAD83_HARN_WISCRS_OCONTO_FTUS = 'urn:ogc:def:crs:EPSG::8142';

    /**
     * NAD83(HARN) / WISCRS Oconto (m)
     * Extent: USA - Wisconsin - Oconto county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Working units are feet - see CRS code 8142.
     */
    public const EPSG_NAD83_HARN_WISCRS_OCONTO_M = 'urn:ogc:def:crs:EPSG::8141';

    /**
     * NAD83(HARN) / WISCRS Oneida (ftUS)
     * Extent: USA - Wisconsin - Oneida county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined in meters - see CRS code 8139.
     */
    public const EPSG_NAD83_HARN_WISCRS_ONEIDA_FTUS = 'urn:ogc:def:crs:EPSG::8140';

    /**
     * NAD83(HARN) / WISCRS Oneida (m)
     * Extent: USA - Wisconsin - Oneida county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Working units are feet - see CRS code 8140.
     */
    public const EPSG_NAD83_HARN_WISCRS_ONEIDA_M = 'urn:ogc:def:crs:EPSG::8139';

    /**
     * NAD83(HARN) / WISCRS Pepin and Pierce (ftUS)
     * Extent: USA - Wisconsin - counties of Pepin and Pierce
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined as separate zones for each county these
     * having identical parameter values: see info source. Defined in meters - see CRS code 8137.
     */
    public const EPSG_NAD83_HARN_WISCRS_PEPIN_AND_PIERCE_FTUS = 'urn:ogc:def:crs:EPSG::8138';

    /**
     * NAD83(HARN) / WISCRS Pepin and Pierce (m)
     * Extent: USA - Wisconsin - counties of Pepin and Pierce
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined as separate zones for each county these
     * having identical parameter values: see info source. Working units are feet - see CRS code 8138.
     */
    public const EPSG_NAD83_HARN_WISCRS_PEPIN_AND_PIERCE_M = 'urn:ogc:def:crs:EPSG::8137';

    /**
     * NAD83(HARN) / WISCRS Polk (ftUS)
     * Extent: USA - Wisconsin - Polk county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined in meters - see CRS code 8135.
     */
    public const EPSG_NAD83_HARN_WISCRS_POLK_FTUS = 'urn:ogc:def:crs:EPSG::8136';

    /**
     * NAD83(HARN) / WISCRS Polk (m)
     * Extent: USA - Wisconsin - Polk county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Working units are feet - see CRS code 8136.
     */
    public const EPSG_NAD83_HARN_WISCRS_POLK_M = 'urn:ogc:def:crs:EPSG::8135';

    /**
     * NAD83(HARN) / WISCRS Portage (ftUS)
     * Extent: USA - Wisconsin - Portage county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined in meters - see CRS code 8133.
     */
    public const EPSG_NAD83_HARN_WISCRS_PORTAGE_FTUS = 'urn:ogc:def:crs:EPSG::8134';

    /**
     * NAD83(HARN) / WISCRS Portage (m)
     * Extent: USA - Wisconsin - Portage county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Working units are feet - see CRS code 8134.
     */
    public const EPSG_NAD83_HARN_WISCRS_PORTAGE_M = 'urn:ogc:def:crs:EPSG::8133';

    /**
     * NAD83(HARN) / WISCRS Price (ftUS)
     * Extent: USA - Wisconsin - Price county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined in meters - see CRS code 8131.
     */
    public const EPSG_NAD83_HARN_WISCRS_PRICE_FTUS = 'urn:ogc:def:crs:EPSG::8132';

    /**
     * NAD83(HARN) / WISCRS Price (m)
     * Extent: USA - Wisconsin - Price county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Working units are feet - see CRS code 8132.
     */
    public const EPSG_NAD83_HARN_WISCRS_PRICE_M = 'urn:ogc:def:crs:EPSG::8131';

    /**
     * NAD83(HARN) / WISCRS Richland (ftUS)
     * Extent: USA - Wisconsin - Richland county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined in meters - see CRS code 8129.
     */
    public const EPSG_NAD83_HARN_WISCRS_RICHLAND_FTUS = 'urn:ogc:def:crs:EPSG::8130';

    /**
     * NAD83(HARN) / WISCRS Richland (m)
     * Extent: USA - Wisconsin - Richland county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Working units are feet - see CRS code 8130.
     */
    public const EPSG_NAD83_HARN_WISCRS_RICHLAND_M = 'urn:ogc:def:crs:EPSG::8129';

    /**
     * NAD83(HARN) / WISCRS Rock (ftUS)
     * Extent: USA - Wisconsin - Rock county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined in meters - see CRS code 8127.
     */
    public const EPSG_NAD83_HARN_WISCRS_ROCK_FTUS = 'urn:ogc:def:crs:EPSG::8128';

    /**
     * NAD83(HARN) / WISCRS Rock (m)
     * Extent: USA - Wisconsin - Rock county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Working units are feet - see CRS code 8128.
     */
    public const EPSG_NAD83_HARN_WISCRS_ROCK_M = 'urn:ogc:def:crs:EPSG::8127';

    /**
     * NAD83(HARN) / WISCRS Rusk (ftUS)
     * Extent: USA - Wisconsin - Rusk county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined in meters - see CRS code 8125.
     */
    public const EPSG_NAD83_HARN_WISCRS_RUSK_FTUS = 'urn:ogc:def:crs:EPSG::8126';

    /**
     * NAD83(HARN) / WISCRS Rusk (m)
     * Extent: USA - Wisconsin - Rusk county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Working units are feet - see CRS code 8126.
     */
    public const EPSG_NAD83_HARN_WISCRS_RUSK_M = 'urn:ogc:def:crs:EPSG::8125';

    /**
     * NAD83(HARN) / WISCRS Sauk (ftUS)
     * Extent: USA - Wisconsin - Sauk county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined in meters - see CRS code 8123.
     */
    public const EPSG_NAD83_HARN_WISCRS_SAUK_FTUS = 'urn:ogc:def:crs:EPSG::8124';

    /**
     * NAD83(HARN) / WISCRS Sauk (m)
     * Extent: USA - Wisconsin - Sauk county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Working units are feet - see CRS code 8124.
     */
    public const EPSG_NAD83_HARN_WISCRS_SAUK_M = 'urn:ogc:def:crs:EPSG::8123';

    /**
     * NAD83(HARN) / WISCRS Sawyer (ftUS)
     * Extent: USA - Wisconsin - Sawyer county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined in meters - see CRS code 8121.
     */
    public const EPSG_NAD83_HARN_WISCRS_SAWYER_FTUS = 'urn:ogc:def:crs:EPSG::8122';

    /**
     * NAD83(HARN) / WISCRS Sawyer (m)
     * Extent: USA - Wisconsin - Sawyer county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Working units are feet - see CRS code 8122.
     */
    public const EPSG_NAD83_HARN_WISCRS_SAWYER_M = 'urn:ogc:def:crs:EPSG::8121';

    /**
     * NAD83(HARN) / WISCRS Shawano (ftUS)
     * Extent: USA - Wisconsin - Shawano county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined in meters - see CRS code 8119.
     */
    public const EPSG_NAD83_HARN_WISCRS_SHAWANO_FTUS = 'urn:ogc:def:crs:EPSG::8120';

    /**
     * NAD83(HARN) / WISCRS Shawano (m)
     * Extent: USA - Wisconsin - Shawano county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Working units are feet - see CRS code 8120.
     */
    public const EPSG_NAD83_HARN_WISCRS_SHAWANO_M = 'urn:ogc:def:crs:EPSG::8119';

    /**
     * NAD83(HARN) / WISCRS St. Croix (ftUS)
     * Extent: USA - Wisconsin - St. Croix county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined in meters - see CRS code 8117.
     */
    public const EPSG_NAD83_HARN_WISCRS_ST_CROIX_FTUS = 'urn:ogc:def:crs:EPSG::8118';

    /**
     * NAD83(HARN) / WISCRS St. Croix (m)
     * Extent: USA - Wisconsin - St. Croix county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Working units are feet - see CRS code 8118.
     */
    public const EPSG_NAD83_HARN_WISCRS_ST_CROIX_M = 'urn:ogc:def:crs:EPSG::8117';

    /**
     * NAD83(HARN) / WISCRS Taylor (ftUS)
     * Extent: USA - Wisconsin - Taylor county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined in meters - see CRS code 8115.
     */
    public const EPSG_NAD83_HARN_WISCRS_TAYLOR_FTUS = 'urn:ogc:def:crs:EPSG::8116';

    /**
     * NAD83(HARN) / WISCRS Taylor (m)
     * Extent: USA - Wisconsin - Taylor county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Working units are feet - see CRS code 8116.
     */
    public const EPSG_NAD83_HARN_WISCRS_TAYLOR_M = 'urn:ogc:def:crs:EPSG::8115';

    /**
     * NAD83(HARN) / WISCRS Trempealeau (ftUS)
     * Extent: USA - Wisconsin - Trempealeau county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined in meters - see CRS code 8113.
     */
    public const EPSG_NAD83_HARN_WISCRS_TREMPEALEAU_FTUS = 'urn:ogc:def:crs:EPSG::8114';

    /**
     * NAD83(HARN) / WISCRS Trempealeau (m)
     * Extent: USA - Wisconsin - Trempealeau county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Working units are feet - see CRS code 8114.
     */
    public const EPSG_NAD83_HARN_WISCRS_TREMPEALEAU_M = 'urn:ogc:def:crs:EPSG::8113';

    /**
     * NAD83(HARN) / WISCRS Vernon (ftUS)
     * Extent: USA - Wisconsin - Vernon county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined in meters - see CRS code 8111.
     */
    public const EPSG_NAD83_HARN_WISCRS_VERNON_FTUS = 'urn:ogc:def:crs:EPSG::8112';

    /**
     * NAD83(HARN) / WISCRS Vernon (m)
     * Extent: USA - Wisconsin - Vernon county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Working units are feet - see CRS code 8112.
     */
    public const EPSG_NAD83_HARN_WISCRS_VERNON_M = 'urn:ogc:def:crs:EPSG::8111';

    /**
     * NAD83(HARN) / WISCRS Vilas (ftUS)
     * Extent: USA - Wisconsin - Vilas county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined in meters - see CRS code 8109.
     */
    public const EPSG_NAD83_HARN_WISCRS_VILAS_FTUS = 'urn:ogc:def:crs:EPSG::8110';

    /**
     * NAD83(HARN) / WISCRS Vilas (m)
     * Extent: USA - Wisconsin - Vilas county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Working units are feet - see CRS code 8110.
     */
    public const EPSG_NAD83_HARN_WISCRS_VILAS_M = 'urn:ogc:def:crs:EPSG::8109';

    /**
     * NAD83(HARN) / WISCRS Walworth (ftUS)
     * Extent: USA - Wisconsin - Walworth county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined in meters - see CRS code 8107.
     */
    public const EPSG_NAD83_HARN_WISCRS_WALWORTH_FTUS = 'urn:ogc:def:crs:EPSG::8108';

    /**
     * NAD83(HARN) / WISCRS Walworth (m)
     * Extent: USA - Wisconsin - Walworth county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Working units are feet - see CRS code 8108.
     */
    public const EPSG_NAD83_HARN_WISCRS_WALWORTH_M = 'urn:ogc:def:crs:EPSG::8107';

    /**
     * NAD83(HARN) / WISCRS Washburn (ftUS)
     * Extent: USA - Wisconsin - Washburn county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined in meters - see CRS code 8105.
     */
    public const EPSG_NAD83_HARN_WISCRS_WASHBURN_FTUS = 'urn:ogc:def:crs:EPSG::8106';

    /**
     * NAD83(HARN) / WISCRS Washburn (m)
     * Extent: USA - Wisconsin - Washburn county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Working units are feet - see CRS code 8106.
     */
    public const EPSG_NAD83_HARN_WISCRS_WASHBURN_M = 'urn:ogc:def:crs:EPSG::8105';

    /**
     * NAD83(HARN) / WISCRS Washington (ftUS)
     * Extent: USA - Wisconsin - Washington county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined in meters - see CRS code 8103.
     */
    public const EPSG_NAD83_HARN_WISCRS_WASHINGTON_FTUS = 'urn:ogc:def:crs:EPSG::8104';

    /**
     * NAD83(HARN) / WISCRS Washington (m)
     * Extent: USA - Wisconsin - Washington county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Working units are feet - see CRS code 8104.
     */
    public const EPSG_NAD83_HARN_WISCRS_WASHINGTON_M = 'urn:ogc:def:crs:EPSG::8103';

    /**
     * NAD83(HARN) / WISCRS Waukesha (ftUS)
     * Extent: USA - Wisconsin - Waukesha county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined in meters - see CRS code 8101.
     */
    public const EPSG_NAD83_HARN_WISCRS_WAUKESHA_FTUS = 'urn:ogc:def:crs:EPSG::8102';

    /**
     * NAD83(HARN) / WISCRS Waukesha (m)
     * Extent: USA - Wisconsin - Waukesha county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Working units are feet - see CRS code 8102.
     */
    public const EPSG_NAD83_HARN_WISCRS_WAUKESHA_M = 'urn:ogc:def:crs:EPSG::8101';

    /**
     * NAD83(HARN) / WISCRS Waupaca (ftUS)
     * Extent: USA - Wisconsin - Waupaca county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined in meters - see CRS code 8099.
     */
    public const EPSG_NAD83_HARN_WISCRS_WAUPACA_FTUS = 'urn:ogc:def:crs:EPSG::8100';

    /**
     * NAD83(HARN) / WISCRS Waupaca (m)
     * Extent: USA - Wisconsin - Waupaca county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Working units are feet - see CRS code 8100.
     */
    public const EPSG_NAD83_HARN_WISCRS_WAUPACA_M = 'urn:ogc:def:crs:EPSG::8099';

    /**
     * NAD83(HARN) / WISCRS Waushara (ftUS)
     * Extent: USA - Wisconsin - Waushara county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined in meters - see CRS code 8097.
     */
    public const EPSG_NAD83_HARN_WISCRS_WAUSHARA_FTUS = 'urn:ogc:def:crs:EPSG::8098';

    /**
     * NAD83(HARN) / WISCRS Waushara (m)
     * Extent: USA - Wisconsin - Waushara county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Working units are feet - see CRS code 8098.
     */
    public const EPSG_NAD83_HARN_WISCRS_WAUSHARA_M = 'urn:ogc:def:crs:EPSG::8097';

    /**
     * NAD83(HARN) / WISCRS Wood (ftUS)
     * Extent: USA - Wisconsin - Wood county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Defined in meters - see CRS code 8095.
     */
    public const EPSG_NAD83_HARN_WISCRS_WOOD_FTUS = 'urn:ogc:def:crs:EPSG::8096';

    /**
     * NAD83(HARN) / WISCRS Wood (m)
     * Extent: USA - Wisconsin - Wood county
     * Part of the Wisconsin Coordinate Reference System (WISCRS). Working units are feet - see CRS code 8096.
     */
    public const EPSG_NAD83_HARN_WISCRS_WOOD_M = 'urn:ogc:def:crs:EPSG::8095';

    /**
     * NAD83(HARN) / Wyoming East
     * Extent: USA - Wyoming - counties of Albany; Campbell; Converse; Crook; Goshen; Laramie; Niobrara; Platte; Weston
     * State law defines system in US survey feet. See code 3755 for equivalent non-metric definition. Replaces NAD83 /
     * SPCS for applications with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_WYOMING_EAST = 'urn:ogc:def:crs:EPSG::2862';

    /**
     * NAD83(HARN) / Wyoming East Central
     * Extent: USA - Wyoming - counties of Big Horn; Carbon; Johnson; Natrona; Sheridan; Washakie
     * State law defines system in US survey feet. See code 3756 for equivalent non-metric definition. Replaces NAD83 /
     * SPCS for applications with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_WYOMING_EAST_CENTRAL = 'urn:ogc:def:crs:EPSG::2863';

    /**
     * NAD83(HARN) / Wyoming East Central (ftUS)
     * Extent: USA - Wyoming - counties of Big Horn; Carbon; Johnson; Natrona; Sheridan; Washakie
     * State law defines system in US survey feet. Federal definition is metric - see code 2863. Replaces NAD83 / SPCS
     * for applications with an accuracy of better than 3 feet. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_WYOMING_EAST_CENTRAL_FTUS = 'urn:ogc:def:crs:EPSG::3756';

    /**
     * NAD83(HARN) / Wyoming East (ftUS)
     * Extent: USA - Wyoming - counties of Albany; Campbell; Converse; Crook; Goshen; Laramie; Niobrara; Platte; Weston
     * State law defines system in US survey feet. Federal definition is metric - see code 2862. Replaces NAD83 / SPCS
     * for applications with an accuracy of better than 3 feet. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_WYOMING_EAST_FTUS = 'urn:ogc:def:crs:EPSG::3755';

    /**
     * NAD83(HARN) / Wyoming West
     * Extent: USA - Wyoming - counties of Lincoln; Sublette; Teton; Uinta
     * State law defines system in US survey feet. See code 3758 for equivalent non-metric definition. Replaces NAD83 /
     * SPCS for applications with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_WYOMING_WEST = 'urn:ogc:def:crs:EPSG::2865';

    /**
     * NAD83(HARN) / Wyoming West Central
     * Extent: USA - Wyoming - counties of Fremont; Hot Springs; Park; Sweetwater
     * State law defines system in US survey feet. See code 3757 for equivalent non-metric definition. Replaces NAD83 /
     * SPCS for applications with an accuracy of better than 1m. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_WYOMING_WEST_CENTRAL = 'urn:ogc:def:crs:EPSG::2864';

    /**
     * NAD83(HARN) / Wyoming West Central (ftUS)
     * Extent: USA - Wyoming - counties of Fremont; Hot Springs; Park; Sweetwater
     * State law defines system in US survey feet. Federal definition is metric - see code 2864. Replaces NAD83 / SPCS
     * for applications with an accuracy of better than 3 feet. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_WYOMING_WEST_CENTRAL_FTUS = 'urn:ogc:def:crs:EPSG::3757';

    /**
     * NAD83(HARN) / Wyoming West (ftUS)
     * Extent: USA - Wyoming - counties of Lincoln; Sublette; Teton; Uinta
     * State law defines system in US survey feet. Federal definition is metric - see code 2865. Replaces NAD83 / SPCS
     * for applications with an accuracy of better than 3 feet. Replaced by NAD83(NSRS2007) / SPCS.
     */
    public const EPSG_NAD83_HARN_WYOMING_WEST_FTUS = 'urn:ogc:def:crs:EPSG::3758';

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
     * NAD83(MA11) / Guam Map Grid
     * Extent: Guam - onshore
     * Replaces NAD83(HARN) / Guam Map Grid (CRS code 4414).
     */
    public const EPSG_NAD83_MA11_GUAM_MAP_GRID = 'urn:ogc:def:crs:EPSG::6637';

    /**
     * NAD83(MA11) / UTM zone 54N
     * Extent: Guam and Northern Mariana Islands; offshore west of 144°E
     * Guam Public Law 23-131 uses the name "NAD83" for NAD83(MA11). NAD83 is a system realized only in North America
     * and different to NAD83(MA11).
     */
    public const EPSG_NAD83_MA11_UTM_ZONE_54N = 'urn:ogc:def:crs:EPSG::8692';

    /**
     * NAD83(MA11) / UTM zone 55N
     * Extent: Guam and Northern Mariana Islands; east of 144°E
     * Guam Public Law 23-131 uses the name "NAD83" for NAD83(MA11). NAD83 is a system realized only in North America
     * and different to NAD83(MA11).
     */
    public const EPSG_NAD83_MA11_UTM_ZONE_55N = 'urn:ogc:def:crs:EPSG::8693';

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
     * Somerset; St Marys; Talbot; Washington; Wicomico; Worcester. District of Columbia (DC)
     * State law defines system in US survey feet. See code 2248 for equivalent non-metric definition. For applications
     * with an accuracy of better than 1m, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_MARYLAND = 'urn:ogc:def:crs:EPSG::26985';

    /**
     * NAD83 / Maryland (ftUS)
     * Extent: USA - Maryland - counties of Allegany; Anne Arundel; Baltimore; Calvert; Caroline; Carroll; Cecil;
     * Charles; Dorchester; Frederick; Garrett; Harford; Howard; Kent; Montgomery; Prince Georges; Queen Annes;
     * Somerset; St Marys; Talbot; Washington; Wicomico; Worcester. District of Columbia (DC)
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
     * Extent: USA - Montana
     * State law defines system in International feet (note: not US survey feet). See code 2256 for equivalent
     * non-metric definition. For applications with an accuracy of better than 1m, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_MONTANA = 'urn:ogc:def:crs:EPSG::32100';

    /**
     * NAD83 / Montana (ft)
     * Extent: USA - Montana
     * State law defines system in International feet (note: not US survey feet). Federal definition is metric - see
     * code 32100. For applications with an accuracy of better than 3 feet, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_MONTANA_FT = 'urn:ogc:def:crs:EPSG::2256';

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
     * Replaces NAD27 / MTQ Lambert (CRS code 3797). For accuracies better than 1m replaced by NAD83(CSRS) / MTQ
     * Lambert (CRS code 3799).
     */
    public const EPSG_NAD83_MTQ_LAMBERT = 'urn:ogc:def:crs:EPSG::3798';

    /**
     * NAD83 / NCRS Las Vegas (ftUS)
     * Extent: USA - Nevada - Las Vegas area below approximately 3000 feet
     * Part of the Nevada Coordinate Reference System (NCRS). Defined in meters, usage is in feet. See CRS code 8379
     * for equivalent metric definition. Replaced by NAD83(2011) / NCRS Las Vegas (ftUS) (CRS code 8384).
     */
    public const EPSG_NAD83_NCRS_LAS_VEGAS_FTUS = 'urn:ogc:def:crs:EPSG::8380';

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
     * NAD83 / NCRS Las Vegas (m)
     * Extent: USA - Nevada - Las Vegas area below approximately 3000 feet
     * Part of the Nevada Coordinate Reference System (NCRS). Defined in meters, usage is in feet - see CRS code 8380.
     * Replaced by NAD83(2011) / NCRS Las Vegas (m) (CRS code 8383).
     */
    public const EPSG_NAD83_NCRS_LAS_VEGAS_M = 'urn:ogc:def:crs:EPSG::8379';

    /**
     * NAD83 / Nebraska
     * Extent: USA - Nebraska
     * State law defines system in US survey feet. See CRS code 26852 for equivalent non-metric definition. For
     * applications with an accuracy of better than 1m, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NEBRASKA = 'urn:ogc:def:crs:EPSG::32104';

    /**
     * NAD83 / Nebraska (ftUS)
     * Extent: USA - Nebraska
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
     * Extent: USA - New Hampshire
     * State law defines system in US survey feet. See code 3437 for equivalent non-metric definition. For applications
     * with an accuracy of better than 1m, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NEW_HAMPSHIRE = 'urn:ogc:def:crs:EPSG::32110';

    /**
     * NAD83 / New Hampshire (ftUS)
     * Extent: USA - New Hampshire
     * State law defines system in US survey feet. Federal definition is metric - see code 32110. For applications with
     * an accuracy of better than 3 feet, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NEW_HAMPSHIRE_FTUS = 'urn:ogc:def:crs:EPSG::3437';

    /**
     * NAD83 / New Jersey
     * Extent: USA - New Jersey
     * State law defines system in US survey feet. See code 3424 for equivalent non-metric definition. For applications
     * with an accuracy of better than 1m, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NEW_JERSEY = 'urn:ogc:def:crs:EPSG::32111';

    /**
     * NAD83 / New Jersey (ftUS)
     * Extent: USA - New Jersey
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
     * Extent: USA - North Carolina
     * State law defines system in US survey feet. See code 2264 for equivalent non-metric definition. For applications
     * with an accuracy of better than 1m, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NORTH_CAROLINA = 'urn:ogc:def:crs:EPSG::32119';

    /**
     * NAD83 / North Carolina (ftUS)
     * Extent: USA - North Carolina
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
     * NAD83(NSRS2007) / Alabama East
     * Extent: USA - Alabama east of approximately 86°37'W - counties Barbour; Bullock; Calhoun; Chambers; Cherokee;
     * Clay; Cleburne; Coffee; Coosa; Covington; Crenshaw; Dale; De Kalb; Elmore; Etowah; Geneva; Henry; Houston;
     * Jackson; Lee; Macon; Madison; Marshall; Montgomery; Pike; Randolph; Russell; St Clair; Talladega; Tallapoosa
     * Replaces NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_ALABAMA_EAST = 'urn:ogc:def:crs:EPSG::3465';

    /**
     * NAD83(NSRS2007) / Alabama West
     * Extent: USA - Alabama west of approximately 86°37'W - counties Autauga; Baldwin; Bibb; Blount; Butler; Chilton;
     * Choctaw; Clarke; Colbert; Conecuh; Cullman; Dallas; Escambia; Fayette; Franklin; Greene; Hale; Jefferson; Lamar;
     * Lauderdale; Lawrence; Limestone; Lowndes; Marengo; Marion; Mobile; Monroe; Morgan; Perry; Pickens; Shelby;
     * Sumter; Tuscaloosa; Walker; Washington; Wilcox; Winston
     * Replaces NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_ALABAMA_WEST = 'urn:ogc:def:crs:EPSG::3466';

    /**
     * NAD83(NSRS2007) / Alaska Albers
     * Extent: USA - Alaska
     * Replaces NAD83 / Alaska Albers for applications with an accuracy of better than 1m.
     */
    public const EPSG_NAD83_NSRS2007_ALASKA_ALBERS = 'urn:ogc:def:crs:EPSG::3467';

    /**
     * NAD83(NSRS2007) / Alaska zone 1
     * Extent: USA - Alaska - east of 141°W; i.e. Panhandle
     * Replaces NAD83 / SPCS for applications with an accuracy of better than 1m.
     */
    public const EPSG_NAD83_NSRS2007_ALASKA_ZONE_1 = 'urn:ogc:def:crs:EPSG::3468';

    /**
     * NAD83(NSRS2007) / Alaska zone 10
     * Extent: USA - Alaska - Aleutian Islands onshore
     * Replaces NAD83 / SPCS for applications with an accuracy of better than 1m.
     */
    public const EPSG_NAD83_NSRS2007_ALASKA_ZONE_10 = 'urn:ogc:def:crs:EPSG::3477';

    /**
     * NAD83(NSRS2007) / Alaska zone 2
     * Extent: USA - Alaska - between 144°W and 141°W, onshore
     * Replaces NAD83 / SPCS for applications with an accuracy of better than 1m.
     */
    public const EPSG_NAD83_NSRS2007_ALASKA_ZONE_2 = 'urn:ogc:def:crs:EPSG::3469';

    /**
     * NAD83(NSRS2007) / Alaska zone 3
     * Extent: USA - Alaska - between 148°W and 144°W
     * Replaces NAD83 / SPCS for applications with an accuracy of better than 1m.
     */
    public const EPSG_NAD83_NSRS2007_ALASKA_ZONE_3 = 'urn:ogc:def:crs:EPSG::3470';

    /**
     * NAD83(NSRS2007) / Alaska zone 4
     * Extent: USA - Alaska - between 152°W and 148°W, onshore
     * Replaces NAD83 / SPCS for applications with an accuracy of better than 1m.
     */
    public const EPSG_NAD83_NSRS2007_ALASKA_ZONE_4 = 'urn:ogc:def:crs:EPSG::3471';

    /**
     * NAD83(NSRS2007) / Alaska zone 5
     * Extent: USA - Alaska - between 156°W and 152°W
     * Replaces NAD83 / SPCS for applications with an accuracy of better than 1m.
     */
    public const EPSG_NAD83_NSRS2007_ALASKA_ZONE_5 = 'urn:ogc:def:crs:EPSG::3472';

    /**
     * NAD83(NSRS2007) / Alaska zone 6
     * Extent: USA - Alaska - between 160°W and 156°W, onshore
     * Replaces NAD83 / SPCS for applications with an accuracy of better than 1m.
     */
    public const EPSG_NAD83_NSRS2007_ALASKA_ZONE_6 = 'urn:ogc:def:crs:EPSG::3473';

    /**
     * NAD83(NSRS2007) / Alaska zone 7
     * Extent: USA - Alaska - between 164°W and 160°W, onshore
     * Replaces NAD83 / SPCS for applications with an accuracy of better than 1m.
     */
    public const EPSG_NAD83_NSRS2007_ALASKA_ZONE_7 = 'urn:ogc:def:crs:EPSG::3474';

    /**
     * NAD83(NSRS2007) / Alaska zone 8
     * Extent: USA - Alaska onshore north of 54°30'N and between 168°W and 164°W
     * Replaces NAD83 / SPCS for applications with an accuracy of better than 1m.
     */
    public const EPSG_NAD83_NSRS2007_ALASKA_ZONE_8 = 'urn:ogc:def:crs:EPSG::3475';

    /**
     * NAD83(NSRS2007) / Alaska zone 9
     * Extent: USA - Alaska onshore north of 54°30'N and west of 168°W
     * Replaces NAD83 / SPCS for applications with an accuracy of better than 1m.
     */
    public const EPSG_NAD83_NSRS2007_ALASKA_ZONE_9 = 'urn:ogc:def:crs:EPSG::3476';

    /**
     * NAD83(NSRS2007) / Arizona Central
     * Extent: USA - Arizona - counties Coconino; Maricopa; Pima; Pinal; Santa Cruz; Yavapai
     * State law defines use of International feet (note: not US survey feet). See code 3479 for equivalent non-metric
     * definition. Replaces NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_ARIZONA_CENTRAL = 'urn:ogc:def:crs:EPSG::3478';

    /**
     * NAD83(NSRS2007) / Arizona Central (ft)
     * Extent: USA - Arizona - counties Coconino; Maricopa; Pima; Pinal; Santa Cruz; Yavapai
     * State law defines use of International feet (note: not US survey feet). Federal definition is metric - see code
     * 3478. Replaces NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_ARIZONA_CENTRAL_FT = 'urn:ogc:def:crs:EPSG::3479';

    /**
     * NAD83(NSRS2007) / Arizona East
     * Extent: USA - Arizona - counties Apache; Cochise; Gila; Graham; Greenlee; Navajo
     * State law defines use of International feet (note: not US survey feet). See code 3481 for equivalent non-metric
     * definition. Replaces NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_ARIZONA_EAST = 'urn:ogc:def:crs:EPSG::3480';

    /**
     * NAD83(NSRS2007) / Arizona East (ft)
     * Extent: USA - Arizona - counties Apache; Cochise; Gila; Graham; Greenlee; Navajo
     * State law defines use of International feet (note: not US survey feet). Federal definition is metric - see code
     * 3480. Replaces NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_ARIZONA_EAST_FT = 'urn:ogc:def:crs:EPSG::3481';

    /**
     * NAD83(NSRS2007) / Arizona West
     * Extent: USA - Arizona - counties of La Paz; Mohave; Yuma
     * State law defines use of International feet (note: not US survey feet). See code 3483 for equivalent non-metric
     * definition. Replaces NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_ARIZONA_WEST = 'urn:ogc:def:crs:EPSG::3482';

    /**
     * NAD83(NSRS2007) / Arizona West (ft)
     * Extent: USA - Arizona - counties of La Paz; Mohave; Yuma
     * State law defines use of International feet (note: not US survey feet). Federal definition is metric - see code
     * 3482. Replaces NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_ARIZONA_WEST_FT = 'urn:ogc:def:crs:EPSG::3483';

    /**
     * NAD83(NSRS2007) / Arkansas North
     * Extent: USA - Arkansas - counties of Baxter; Benton; Boone; Carroll; Clay; Cleburne; Conway; Craighead;
     * Crawford; Crittenden; Cross; Faulkner; Franklin; Fulton; Greene; Independence; Izard; Jackson; Johnson;
     * Lawrence; Logan; Madison; Marion; Mississippi; Newton; Perry; Poinsett; Pope; Pulaski; Randolph; Scott; Searcy;
     * Sebastian; Sharp; St Francis; Stone; Van Buren; Washington; White; Woodruff; Yell
     * State law defines use of US survey feet. See code 3485 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_ARKANSAS_NORTH = 'urn:ogc:def:crs:EPSG::3484';

    /**
     * NAD83(NSRS2007) / Arkansas North (ftUS)
     * Extent: USA - Arkansas - counties of Baxter; Benton; Boone; Carroll; Clay; Cleburne; Conway; Craighead;
     * Crawford; Crittenden; Cross; Faulkner; Franklin; Fulton; Greene; Independence; Izard; Jackson; Johnson;
     * Lawrence; Logan; Madison; Marion; Mississippi; Newton; Perry; Poinsett; Pope; Pulaski; Randolph; Scott; Searcy;
     * Sebastian; Sharp; St Francis; Stone; Van Buren; Washington; White; Woodruff; Yell
     * State law defines use of US survey feet. Federal definition is metric - see code 3484. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_ARKANSAS_NORTH_FTUS = 'urn:ogc:def:crs:EPSG::3485';

    /**
     * NAD83(NSRS2007) / Arkansas South
     * Extent: USA - Arkansas - counties Arkansas; Ashley; Bradley; Calhoun; Chicot; Clark; Cleveland; Columbia;
     * Dallas; Desha; Drew; Garland; Grant; Hempstead; Hot Spring; Howard; Jefferson; Lafayette; Lee; Lincoln; Little
     * River; Lonoke; Miller; Monroe; Montgomery; Nevada; Ouachita; Phillips; Pike; Polk; Prairie; Saline; Sevier;
     * Union
     * State law defines use of US survey feet. See code 3487 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_ARKANSAS_SOUTH = 'urn:ogc:def:crs:EPSG::3486';

    /**
     * NAD83(NSRS2007) / Arkansas South (ftUS)
     * Extent: USA - Arkansas - counties Arkansas; Ashley; Bradley; Calhoun; Chicot; Clark; Cleveland; Columbia;
     * Dallas; Desha; Drew; Garland; Grant; Hempstead; Hot Spring; Howard; Jefferson; Lafayette; Lee; Lincoln; Little
     * River; Lonoke; Miller; Monroe; Montgomery; Nevada; Ouachita; Phillips; Pike; Polk; Prairie; Saline; Sevier;
     * Union
     * State law defines use of US survey feet. Federal definition is metric - see code 3486. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_ARKANSAS_SOUTH_FTUS = 'urn:ogc:def:crs:EPSG::3487';

    /**
     * NAD83(NSRS2007) / California Albers
     * Extent: USA - California
     * Replaces NAD83(HARN) / California Albers.
     */
    public const EPSG_NAD83_NSRS2007_CALIFORNIA_ALBERS = 'urn:ogc:def:crs:EPSG::3488';

    /**
     * NAD83(NSRS2007) / California zone 1
     * Extent: USA - California - counties of Del Norte; Humboldt; Lassen; Modoc; Plumas; Shasta; Siskiyou; Tehama;
     * Trinity
     * State law defines use of US survey feet. See code 3490 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_CALIFORNIA_ZONE_1 = 'urn:ogc:def:crs:EPSG::3489';

    /**
     * NAD83(NSRS2007) / California zone 1 (ftUS)
     * Extent: USA - California - counties of Del Norte; Humboldt; Lassen; Modoc; Plumas; Shasta; Siskiyou; Tehama;
     * Trinity
     * State law defines use of US survey feet. Federal definition is metric - see code 3489. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_CALIFORNIA_ZONE_1_FTUS = 'urn:ogc:def:crs:EPSG::3490';

    /**
     * NAD83(NSRS2007) / California zone 2
     * Extent: USA - California - counties of Alpine; Amador; Butte; Colusa; El Dorado; Glenn; Lake; Mendocino; Napa;
     * Nevada; Placer; Sacramento; Sierra; Solano; Sonoma; Sutter; Yolo; Yuba
     * State law defines use of US survey feet. See code 3492 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_CALIFORNIA_ZONE_2 = 'urn:ogc:def:crs:EPSG::3491';

    /**
     * NAD83(NSRS2007) / California zone 2 (ftUS)
     * Extent: USA - California - counties of Alpine; Amador; Butte; Colusa; El Dorado; Glenn; Lake; Mendocino; Napa;
     * Nevada; Placer; Sacramento; Sierra; Solano; Sonoma; Sutter; Yolo; Yuba
     * State law defines use of US survey feet. Federal definition is metric - see code 3491. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_CALIFORNIA_ZONE_2_FTUS = 'urn:ogc:def:crs:EPSG::3492';

    /**
     * NAD83(NSRS2007) / California zone 3
     * Extent: USA - California - counties of Alameda; Calaveras; Contra Costa; Madera; Marin; Mariposa; Merced; Mono;
     * San Francisco; San Joaquin; San Mateo; Santa Clara; Santa Cruz; Stanislaus; Tuolumne
     * State law defines use of US survey feet. See code 3494 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_CALIFORNIA_ZONE_3 = 'urn:ogc:def:crs:EPSG::3493';

    /**
     * NAD83(NSRS2007) / California zone 3 (ftUS)
     * Extent: USA - California - counties of Alameda; Calaveras; Contra Costa; Madera; Marin; Mariposa; Merced; Mono;
     * San Francisco; San Joaquin; San Mateo; Santa Clara; Santa Cruz; Stanislaus; Tuolumne
     * State law defines use of US survey feet. Federal definition is metric - see code 3493. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_CALIFORNIA_ZONE_3_FTUS = 'urn:ogc:def:crs:EPSG::3494';

    /**
     * NAD83(NSRS2007) / California zone 4
     * Extent: USA - California - counties of Fresno; Inyo; Kings; Monterey; San Benito; Tulare
     * State law defines use of US survey feet. See code 3496 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_CALIFORNIA_ZONE_4 = 'urn:ogc:def:crs:EPSG::3495';

    /**
     * NAD83(NSRS2007) / California zone 4 (ftUS)
     * Extent: USA - California - counties of Fresno; Inyo; Kings; Monterey; San Benito; Tulare
     * State law defines use of US survey feet. Federal definition is metric - see code 3495. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_CALIFORNIA_ZONE_4_FTUS = 'urn:ogc:def:crs:EPSG::3496';

    /**
     * NAD83(NSRS2007) / California zone 5
     * Extent: USA - California - counties of Kern; Los Angeles; San Bernardino; San Luis Obispo; Santa Barbara;
     * Ventura
     * State law defines use of US survey feet. See code 3498 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_CALIFORNIA_ZONE_5 = 'urn:ogc:def:crs:EPSG::3497';

    /**
     * NAD83(NSRS2007) / California zone 5 (ftUS)
     * Extent: USA - California - counties of Kern; Los Angeles; San Bernardino; San Luis Obispo; Santa Barbara;
     * Ventura
     * State law defines use of US survey feet. Federal definition is metric - see code 3497. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_CALIFORNIA_ZONE_5_FTUS = 'urn:ogc:def:crs:EPSG::3498';

    /**
     * NAD83(NSRS2007) / California zone 6
     * Extent: USA - California - counties of Imperial; Orange; Riverside; San Diego
     * State law defines use of US survey feet. See code 3500 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_CALIFORNIA_ZONE_6 = 'urn:ogc:def:crs:EPSG::3499';

    /**
     * NAD83(NSRS2007) / California zone 6 (ftUS)
     * Extent: USA - California - counties of Imperial; Orange; Riverside; San Diego
     * State law defines use of US survey feet. Federal definition is metric - see code 3499. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_CALIFORNIA_ZONE_6_FTUS = 'urn:ogc:def:crs:EPSG::3500';

    /**
     * NAD83(NSRS2007) / Colorado Central
     * Extent: USA - Colorado - counties Arapahoe; Chaffee; Cheyenne; Clear Creek; Delta; Denver; Douglas; Eagle; El
     * Paso; Elbert; Fremont; Garfield; Gunnison; Jefferson; Kit Carson; Lake; Lincoln; Mesa; Park; Pitkin; Summit;
     * Teller
     * State law defines use of US survey feet. See code 3502 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_COLORADO_CENTRAL = 'urn:ogc:def:crs:EPSG::3501';

    /**
     * NAD83(NSRS2007) / Colorado Central (ftUS)
     * Extent: USA - Colorado - counties Arapahoe; Chaffee; Cheyenne; Clear Creek; Delta; Denver; Douglas; Eagle; El
     * Paso; Elbert; Fremont; Garfield; Gunnison; Jefferson; Kit Carson; Lake; Lincoln; Mesa; Park; Pitkin; Summit;
     * Teller
     * State law defines use of US survey feet. Federal definition is metric - see code 3501. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_COLORADO_CENTRAL_FTUS = 'urn:ogc:def:crs:EPSG::3502';

    /**
     * NAD83(NSRS2007) / Colorado North
     * Extent: USA - Colorado - counties Adams; Boulder; Gilpin; Grand; Jackson; Larimer; Logan; Moffat; Morgan;
     * Phillips; Rio Blanco; Routt; Sedgwick; Washington; Weld; Yuma
     * State law defines use of US survey feet. See code 3504 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_COLORADO_NORTH = 'urn:ogc:def:crs:EPSG::3503';

    /**
     * NAD83(NSRS2007) / Colorado North (ftUS)
     * Extent: USA - Colorado - counties Adams; Boulder; Gilpin; Grand; Jackson; Larimer; Logan; Moffat; Morgan;
     * Phillips; Rio Blanco; Routt; Sedgwick; Washington; Weld; Yuma
     * State law defines use of US survey feet. Federal definition is metric - see code 3503. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_COLORADO_NORTH_FTUS = 'urn:ogc:def:crs:EPSG::3504';

    /**
     * NAD83(NSRS2007) / Colorado South
     * Extent: USA - Colorado - counties Alamosa; Archuleta; Baca; Bent; Conejos; Costilla; Crowley; Custer; Dolores;
     * Hinsdale; Huerfano; Kiowa; La Plata; Las Animas; Mineral; Montezuma; Montrose; Otero; Ouray; Prowers; Pueblo;
     * Rio Grande; Saguache; San Juan; San Miguel
     * State law defines use of US survey feet. See code 3506 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_COLORADO_SOUTH = 'urn:ogc:def:crs:EPSG::3505';

    /**
     * NAD83(NSRS2007) / Colorado South (ftUS)
     * Extent: USA - Colorado - counties Alamosa; Archuleta; Baca; Bent; Conejos; Costilla; Crowley; Custer; Dolores;
     * Hinsdale; Huerfano; Kiowa; La Plata; Las Animas; Mineral; Montezuma; Montrose; Otero; Ouray; Prowers; Pueblo;
     * Rio Grande; Saguache; San Juan; San Miguel
     * State law defines use of US survey feet. Federal definition is metric - see code 3505. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_COLORADO_SOUTH_FTUS = 'urn:ogc:def:crs:EPSG::3506';

    /**
     * NAD83(NSRS2007) / Connecticut
     * Extent: USA - Connecticut
     * State law defines use of US survey feet. See code 3508 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_CONNECTICUT = 'urn:ogc:def:crs:EPSG::3507';

    /**
     * NAD83(NSRS2007) / Connecticut (ftUS)
     * Extent: USA - Connecticut
     * State law defines use of US survey feet. Federal definition is metric - see code 3507. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_CONNECTICUT_FTUS = 'urn:ogc:def:crs:EPSG::3508';

    /**
     * NAD83(NSRS2007) / Conus Albers
     * Extent: USA - conterminous (contiguous) lower 48 states (CONUS) - onshore
     * Replaces NAD83(HARN) / Conus Albers (CRS code 5071).
     */
    public const EPSG_NAD83_NSRS2007_CONUS_ALBERS = 'urn:ogc:def:crs:EPSG::5072';

    /**
     * NAD83(NSRS2007) / Delaware
     * Extent: USA - Delaware
     * State law defines use of US survey feet. See code 3510 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_DELAWARE = 'urn:ogc:def:crs:EPSG::3509';

    /**
     * NAD83(NSRS2007) / Delaware (ftUS)
     * Extent: USA - Delaware
     * State law defines use of US survey feet. Federal definition is metric - see code 3509. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_DELAWARE_FTUS = 'urn:ogc:def:crs:EPSG::3510';

    /**
     * NAD83(NSRS2007) / EPSG Arctic zone 5-29
     * Extent: Arctic - between 74°30'N and 69°30'N, approximately 173°W to approximately 153°W. May be extended
     * eastwards within the latitude limits.
     */
    public const EPSG_NAD83_NSRS2007_EPSG_ARCTIC_ZONE_5_29 = 'urn:ogc:def:crs:EPSG::6094';

    /**
     * NAD83(NSRS2007) / EPSG Arctic zone 5-31
     * Extent: Arctic - between 74°30'N and 69°30'N, approximately 157°W to approximately 137°W. May be extended
     * westwards within the latitude limits.
     */
    public const EPSG_NAD83_NSRS2007_EPSG_ARCTIC_ZONE_5_31 = 'urn:ogc:def:crs:EPSG::6095';

    /**
     * NAD83(NSRS2007) / EPSG Arctic zone 6-14
     * Extent: Arctic - between 71°10'N and 66°10'N, approximately 174°W to approximately 156°W. May be extended
     * eastwards within the latitude limits.
     */
    public const EPSG_NAD83_NSRS2007_EPSG_ARCTIC_ZONE_6_14 = 'urn:ogc:def:crs:EPSG::6096';

    /**
     * NAD83(NSRS2007) / EPSG Arctic zone 6-16
     * Extent: Arctic - between 71°10'N and 66°10'N, approximately 156°W to approximately 138°W. May be extended
     * westwards within the latitude limits.
     */
    public const EPSG_NAD83_NSRS2007_EPSG_ARCTIC_ZONE_6_16 = 'urn:ogc:def:crs:EPSG::6097';

    /**
     * NAD83(NSRS2007) / Florida East
     * Extent: USA - Florida - counties of Brevard; Broward; Clay; Collier; Dade; Duval; Flagler; Glades; Hendry;
     * Highlands; Indian River; Lake; Martin; Monroe; Nassau; Okeechobee; Orange; Osceola; Palm Beach; Putnam;
     * Seminole; St Johns; St Lucie; Volusia
     * State law defines use of US survey feet. See code 3512 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_FLORIDA_EAST = 'urn:ogc:def:crs:EPSG::3511';

    /**
     * NAD83(NSRS2007) / Florida East (ftUS)
     * Extent: USA - Florida - counties of Brevard; Broward; Clay; Collier; Dade; Duval; Flagler; Glades; Hendry;
     * Highlands; Indian River; Lake; Martin; Monroe; Nassau; Okeechobee; Orange; Osceola; Palm Beach; Putnam;
     * Seminole; St Johns; St Lucie; Volusia
     * State law defines use of US survey feet. Federal definition is metric - see code 3511. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_FLORIDA_EAST_FTUS = 'urn:ogc:def:crs:EPSG::3512';

    /**
     * NAD83(NSRS2007) / Florida GDL Albers
     * Extent: USA - Florida
     * Replaces NAD83(HARN) / Florida GDL Albers.
     */
    public const EPSG_NAD83_NSRS2007_FLORIDA_GDL_ALBERS = 'urn:ogc:def:crs:EPSG::3513';

    /**
     * NAD83(NSRS2007) / Florida North
     * Extent: USA - Florida - counties of Alachua; Baker; Bay; Bradford; Calhoun; Columbia; Dixie; Escambia; Franklin;
     * Gadsden; Gilchrist; Gulf; Hamilton; Holmes; Jackson; Jefferson; Lafayette; Leon; Liberty; Madison; Okaloosa;
     * Santa Rosa; Suwannee; Taylor; Union; Wakulla; Walton; Washington
     * State law defines use of US survey feet. See code 3515 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_FLORIDA_NORTH = 'urn:ogc:def:crs:EPSG::3514';

    /**
     * NAD83(NSRS2007) / Florida North (ftUS)
     * Extent: USA - Florida - counties of Alachua; Baker; Bay; Bradford; Calhoun; Columbia; Dixie; Escambia; Franklin;
     * Gadsden; Gilchrist; Gulf; Hamilton; Holmes; Jackson; Jefferson; Lafayette; Leon; Liberty; Madison; Okaloosa;
     * Santa Rosa; Suwannee; Taylor; Union; Wakulla; Walton; Washington
     * State law defines use of US survey feet. Federal definition is metric - see code 3514. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_FLORIDA_NORTH_FTUS = 'urn:ogc:def:crs:EPSG::3515';

    /**
     * NAD83(NSRS2007) / Florida West
     * Extent: USA - Florida - counties of Charlotte; Citrus; De Soto; Hardee; Hernando; Hillsborough; Lee; Levy;
     * Manatee; Marion; Pasco; Pinellas; Polk; Sarasota; Sumter
     * State law defines use of US survey feet. See code 3517 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_FLORIDA_WEST = 'urn:ogc:def:crs:EPSG::3516';

    /**
     * NAD83(NSRS2007) / Florida West (ftUS)
     * Extent: USA - Florida - counties of Charlotte; Citrus; De Soto; Hardee; Hernando; Hillsborough; Lee; Levy;
     * Manatee; Marion; Pasco; Pinellas; Polk; Sarasota; Sumter
     * State law defines use of US survey feet. Federal definition is metric - see code 3516. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_FLORIDA_WEST_FTUS = 'urn:ogc:def:crs:EPSG::3517';

    /**
     * NAD83(NSRS2007) / Georgia East
     * Extent: USA - Georgia - counties of Appling; Atkinson; Bacon; Baldwin; Brantley; Bryan; Bulloch; Burke; Camden;
     * Candler; Charlton; Chatham; Clinch; Coffee; Columbia; Dodge; Echols; Effingham; Elbert; Emanuel; Evans;
     * Franklin; Glascock; Glynn; Greene; Hancock; Hart; Jeff Davis; Jefferson; Jenkins; Johnson; Laurens; Liberty;
     * Lincoln; Long; Madison; McDuffie; McIntosh; Montgomery; Oglethorpe; Pierce; Richmond; Screven; Stephens;
     * Taliaferro; Tattnall; Telfair; Toombs; Treutlen; Ware; Warren; Washington; Wayne; Wheeler; Wilkes; Wilkinson
     * State law defines use of US survey feet. See code 3519 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_GEORGIA_EAST = 'urn:ogc:def:crs:EPSG::3518';

    /**
     * NAD83(NSRS2007) / Georgia East (ftUS)
     * Extent: USA - Georgia - counties of Appling; Atkinson; Bacon; Baldwin; Brantley; Bryan; Bulloch; Burke; Camden;
     * Candler; Charlton; Chatham; Clinch; Coffee; Columbia; Dodge; Echols; Effingham; Elbert; Emanuel; Evans;
     * Franklin; Glascock; Glynn; Greene; Hancock; Hart; Jeff Davis; Jefferson; Jenkins; Johnson; Laurens; Liberty;
     * Lincoln; Long; Madison; McDuffie; McIntosh; Montgomery; Oglethorpe; Pierce; Richmond; Screven; Stephens;
     * Taliaferro; Tattnall; Telfair; Toombs; Treutlen; Ware; Warren; Washington; Wayne; Wheeler; Wilkes; Wilkinson
     * State law defines use of US survey feet. Federal definition is metric - see code 3518. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_GEORGIA_EAST_FTUS = 'urn:ogc:def:crs:EPSG::3519';

    /**
     * NAD83(NSRS2007) / Georgia West
     * Extent: USA - Georgia - counties of Baker; Banks; Barrow; Bartow; Ben Hill; Berrien; Bibb; Bleckley; Brooks;
     * Butts; Calhoun; Carroll; Catoosa; Chattahoochee; Chattooga; Cherokee; Clarke; Clay; Clayton; Cobb; Colquitt;
     * Cook; Coweta; Crawford; Crisp; Dade; Dawson; De Kalb; Decatur; Dooly; Dougherty; Douglas; Early; Fannin;
     * Fayette; Floyd; Forsyth; Fulton; Gilmer; Gordon; Grady; Gwinnett; Habersham; Hall; Haralson; Harris; Heard;
     * Henry; Houston; Irwin; Jackson; Jasper; Jones; Lamar; Lanier; Lee; Lowndes; Lumpkin; Macon; Marion; Meriwether;
     * Miller; Mitchell; Monroe; Morgan; Murray; Muscogee; Newton; Oconee; Paulding; Peach; Pickens; Pike; Polk;
     * Pulaski; Putnam; Quitman; Rabun; Randolph; Rockdale; Schley; Seminole; Spalding; Stewart; Sumter; Talbot;
     * Taylor; Terrell; Thomas; Tift; Towns; Troup; Turner; Twiggs; Union; Upson; Walker; Walton; Webster; White;
     * Whitfield; Wilcox; Worth
     * State law defines use of US survey feet. See code 3521 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_GEORGIA_WEST = 'urn:ogc:def:crs:EPSG::3520';

    /**
     * NAD83(NSRS2007) / Georgia West (ftUS)
     * Extent: USA - Georgia - counties of Baker; Banks; Barrow; Bartow; Ben Hill; Berrien; Bibb; Bleckley; Brooks;
     * Butts; Calhoun; Carroll; Catoosa; Chattahoochee; Chattooga; Cherokee; Clarke; Clay; Clayton; Cobb; Colquitt;
     * Cook; Coweta; Crawford; Crisp; Dade; Dawson; De Kalb; Decatur; Dooly; Dougherty; Douglas; Early; Fannin;
     * Fayette; Floyd; Forsyth; Fulton; Gilmer; Gordon; Grady; Gwinnett; Habersham; Hall; Haralson; Harris; Heard;
     * Henry; Houston; Irwin; Jackson; Jasper; Jones; Lamar; Lanier; Lee; Lowndes; Lumpkin; Macon; Marion; Meriwether;
     * Miller; Mitchell; Monroe; Morgan; Murray; Muscogee; Newton; Oconee; Paulding; Peach; Pickens; Pike; Polk;
     * Pulaski; Putnam; Quitman; Rabun; Randolph; Rockdale; Schley; Seminole; Spalding; Stewart; Sumter; Talbot;
     * Taylor; Terrell; Thomas; Tift; Towns; Troup; Turner; Twiggs; Union; Upson; Walker; Walton; Webster; White;
     * Whitfield; Wilcox; Worth
     * State law defines use of US survey feet. Federal definition is metric - see code 3520. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_GEORGIA_WEST_FTUS = 'urn:ogc:def:crs:EPSG::3521';

    /**
     * NAD83(NSRS2007) / Idaho Central
     * Extent: USA - Idaho - counties of Blaine; Butte; Camas; Cassia; Custer; Gooding; Jerome; Lemhi; Lincoln;
     * Minidoka; Twin Falls
     * State law defines use of US survey feet. See code 3523 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_IDAHO_CENTRAL = 'urn:ogc:def:crs:EPSG::3522';

    /**
     * NAD83(NSRS2007) / Idaho Central (ftUS)
     * Extent: USA - Idaho - counties of Blaine; Butte; Camas; Cassia; Custer; Gooding; Jerome; Lemhi; Lincoln;
     * Minidoka; Twin Falls
     * State law defines use of US survey feet. Federal definition is metric - see code 3522. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_IDAHO_CENTRAL_FTUS = 'urn:ogc:def:crs:EPSG::3523';

    /**
     * NAD83(NSRS2007) / Idaho East
     * Extent: USA - Idaho - counties of Bannock; Bear Lake; Bingham; Bonneville; Caribou; Clark; Franklin; Fremont;
     * Jefferson; Madison; Oneida; Power; Teton
     * State law defines use of US survey feet. See code 3525 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_IDAHO_EAST = 'urn:ogc:def:crs:EPSG::3524';

    /**
     * NAD83(NSRS2007) / Idaho East (ftUS)
     * Extent: USA - Idaho - counties of Bannock; Bear Lake; Bingham; Bonneville; Caribou; Clark; Franklin; Fremont;
     * Jefferson; Madison; Oneida; Power; Teton
     * State law defines use of US survey feet. Federal definition is metric - see code 3524. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_IDAHO_EAST_FTUS = 'urn:ogc:def:crs:EPSG::3525';

    /**
     * NAD83(NSRS2007) / Idaho West
     * Extent: USA - Idaho - counties of Ada; Adams; Benewah; Boise; Bonner; Boundary; Canyon; Clearwater; Elmore; Gem;
     * Idaho; Kootenai; Latah; Lewis; Nez Perce; Owyhee; Payette; Shoshone; Valley; Washington
     * State law defines use of US survey feet. See code 3527 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_IDAHO_WEST = 'urn:ogc:def:crs:EPSG::3526';

    /**
     * NAD83(NSRS2007) / Idaho West (ftUS)
     * Extent: USA - Idaho - counties of Ada; Adams; Benewah; Boise; Bonner; Boundary; Canyon; Clearwater; Elmore; Gem;
     * Idaho; Kootenai; Latah; Lewis; Nez Perce; Owyhee; Payette; Shoshone; Valley; Washington
     * State law defines use of US survey feet. Federal definition is metric - see code 3526. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_IDAHO_WEST_FTUS = 'urn:ogc:def:crs:EPSG::3527';

    /**
     * NAD83(NSRS2007) / Illinois East
     * Extent: USA - Illinois - counties of Boone; Champaign; Clark; Clay; Coles; Cook; Crawford; Cumberland; De Kalb;
     * De Witt; Douglas; Du Page; Edgar; Edwards; Effingham; Fayette; Ford; Franklin; Gallatin; Grundy; Hamilton;
     * Hardin; Iroquois; Jasper; Jefferson; Johnson; Kane; Kankakee; Kendall; La Salle; Lake; Lawrence; Livingston;
     * Macon; Marion; Massac; McHenry; McLean; Moultrie; Piatt; Pope; Richland; Saline; Shelby; Vermilion; Wabash;
     * Wayne; White; Will; Williamson
     * State law defines use of US survey feet. See code 3529 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_ILLINOIS_EAST = 'urn:ogc:def:crs:EPSG::3528';

    /**
     * NAD83(NSRS2007) / Illinois East (ftUS)
     * Extent: USA - Illinois - counties of Boone; Champaign; Clark; Clay; Coles; Cook; Crawford; Cumberland; De Kalb;
     * De Witt; Douglas; Du Page; Edgar; Edwards; Effingham; Fayette; Ford; Franklin; Gallatin; Grundy; Hamilton;
     * Hardin; Iroquois; Jasper; Jefferson; Johnson; Kane; Kankakee; Kendall; La Salle; Lake; Lawrence; Livingston;
     * Macon; Marion; Massac; McHenry; McLean; Moultrie; Piatt; Pope; Richland; Saline; Shelby; Vermilion; Wabash;
     * Wayne; White; Will; Williamson
     * State law defines use of US survey feet. Federal definition is metric - see code 3528. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_ILLINOIS_EAST_FTUS = 'urn:ogc:def:crs:EPSG::3529';

    /**
     * NAD83(NSRS2007) / Illinois West
     * Extent: USA - Illinois - counties of Adams; Alexander; Bond; Brown; Bureau; Calhoun; Carroll; Cass; Christian;
     * Clinton; Fulton; Greene; Hancock; Henderson; Henry; Jackson; Jersey; Jo Daviess; Knox; Lee; Logan; Macoupin;
     * Madison; Marshall; Mason; McDonough; Menard; Mercer; Monroe; Montgomery; Morgan; Ogle; Peoria; Perry; Pike;
     * Pulaski; Putnam; Randolph; Rock Island; Sangamon; Schuyler; Scott; St Clair; Stark; Stephenson; Tazewell; Union;
     * Warren; Washington; Whiteside; Winnebago; Woodford
     * State law defines use of US survey feet. See code 3531 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_ILLINOIS_WEST = 'urn:ogc:def:crs:EPSG::3530';

    /**
     * NAD83(NSRS2007) / Illinois West (ftUS)
     * Extent: USA - Illinois - counties of Adams; Alexander; Bond; Brown; Bureau; Calhoun; Carroll; Cass; Christian;
     * Clinton; Fulton; Greene; Hancock; Henderson; Henry; Jackson; Jersey; Jo Daviess; Knox; Lee; Logan; Macoupin;
     * Madison; Marshall; Mason; McDonough; Menard; Mercer; Monroe; Montgomery; Morgan; Ogle; Peoria; Perry; Pike;
     * Pulaski; Putnam; Randolph; Rock Island; Sangamon; Schuyler; Scott; St Clair; Stark; Stephenson; Tazewell; Union;
     * Warren; Washington; Whiteside; Winnebago; Woodford
     * State law defines use of US survey feet. Federal definition is metric - see code 3530. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_ILLINOIS_WEST_FTUS = 'urn:ogc:def:crs:EPSG::3531';

    /**
     * NAD83(NSRS2007) / Indiana East
     * Extent: USA - Indiana - counties of Adams; Allen; Bartholomew; Blackford; Brown; Cass; Clark; De Kalb; Dearborn;
     * Decatur; Delaware; Elkhart; Fayette; Floyd; Franklin; Fulton; Grant; Hamilton; Hancock; Harrison; Henry; Howard;
     * Huntington; Jackson; Jay; Jefferson; Jennings; Johnson; Kosciusko; Lagrange; Madison; Marion; Marshall; Miami;
     * Noble; Ohio; Randolph; Ripley; Rush; Scott; Shelby; St Joseph; Steuben; Switzerland; Tipton; Union; Wabash;
     * Washington; Wayne; Wells; Whitley
     * State law defines use of US survey feet. See code 3533 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_INDIANA_EAST = 'urn:ogc:def:crs:EPSG::3532';

    /**
     * NAD83(NSRS2007) / Indiana East (ftUS)
     * Extent: USA - Indiana - counties of Adams; Allen; Bartholomew; Blackford; Brown; Cass; Clark; De Kalb; Dearborn;
     * Decatur; Delaware; Elkhart; Fayette; Floyd; Franklin; Fulton; Grant; Hamilton; Hancock; Harrison; Henry; Howard;
     * Huntington; Jackson; Jay; Jefferson; Jennings; Johnson; Kosciusko; Lagrange; Madison; Marion; Marshall; Miami;
     * Noble; Ohio; Randolph; Ripley; Rush; Scott; Shelby; St Joseph; Steuben; Switzerland; Tipton; Union; Wabash;
     * Washington; Wayne; Wells; Whitley
     * State law defines use of US survey feet. Federal definition is metric - see code 3532. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_INDIANA_EAST_FTUS = 'urn:ogc:def:crs:EPSG::3533';

    /**
     * NAD83(NSRS2007) / Indiana West
     * Extent: USA - Indiana - counties of Benton; Boone; Carroll; Clay; Clinton; Crawford; Daviess; Dubois; Fountain;
     * Gibson; Greene; Hendricks; Jasper; Knox; La Porte; Lake; Lawrence; Martin; Monroe; Montgomery; Morgan; Newton;
     * Orange; Owen; Parke; Perry; Pike; Porter; Posey; Pulaski; Putnam; Spencer; Starke; Sullivan; Tippecanoe;
     * Vanderburgh; Vermillion; Vigo; Warren; Warrick; White
     * State law defines use of US survey feet. See code 3535 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_INDIANA_WEST = 'urn:ogc:def:crs:EPSG::3534';

    /**
     * NAD83(NSRS2007) / Indiana West (ftUS)
     * Extent: USA - Indiana - counties of Benton; Boone; Carroll; Clay; Clinton; Crawford; Daviess; Dubois; Fountain;
     * Gibson; Greene; Hendricks; Jasper; Knox; La Porte; Lake; Lawrence; Martin; Monroe; Montgomery; Morgan; Newton;
     * Orange; Owen; Parke; Perry; Pike; Porter; Posey; Pulaski; Putnam; Spencer; Starke; Sullivan; Tippecanoe;
     * Vanderburgh; Vermillion; Vigo; Warren; Warrick; White
     * State law defines use of US survey feet. Federal definition is metric - see code 3534. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_INDIANA_WEST_FTUS = 'urn:ogc:def:crs:EPSG::3535';

    /**
     * NAD83(NSRS2007) / Iowa North
     * Extent: USA - Iowa - counties of Allamakee; Benton; Black Hawk; Boone; Bremer; Buchanan; Buena Vista; Butler;
     * Calhoun; Carroll; Cerro Gordo; Cherokee; Chickasaw; Clay; Clayton; Crawford; Delaware; Dickinson; Dubuque;
     * Emmet; Fayette; Floyd; Franklin; Greene; Grundy; Hamilton; Hancock; Hardin; Howard; Humboldt; Ida; Jackson;
     * Jones; Kossuth; Linn; Lyon; Marshall; Mitchell; Monona; O'Brien; Osceola; Palo Alto; Plymouth; Pocahontas; Sac;
     * Sioux; Story; Tama; Webster; Winnebago; Winneshiek; Woodbury; Worth; Wright
     * State law defines use of US survey feet. See code 3537 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_IOWA_NORTH = 'urn:ogc:def:crs:EPSG::3536';

    /**
     * NAD83(NSRS2007) / Iowa North (ftUS)
     * Extent: USA - Iowa - counties of Allamakee; Benton; Black Hawk; Boone; Bremer; Buchanan; Buena Vista; Butler;
     * Calhoun; Carroll; Cerro Gordo; Cherokee; Chickasaw; Clay; Clayton; Crawford; Delaware; Dickinson; Dubuque;
     * Emmet; Fayette; Floyd; Franklin; Greene; Grundy; Hamilton; Hancock; Hardin; Howard; Humboldt; Ida; Jackson;
     * Jones; Kossuth; Linn; Lyon; Marshall; Mitchell; Monona; O'Brien; Osceola; Palo Alto; Plymouth; Pocahontas; Sac;
     * Sioux; Story; Tama; Webster; Winnebago; Winneshiek; Woodbury; Worth; Wright
     * State law defines use of US survey feet. Federal definition is metric - see code 3536. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_IOWA_NORTH_FTUS = 'urn:ogc:def:crs:EPSG::3537';

    /**
     * NAD83(NSRS2007) / Iowa South
     * Extent: USA - Iowa - counties of Adair; Adams; Appanoose; Audubon; Cass; Cedar; Clarke; Clinton; Dallas; Davis;
     * Decatur; Des Moines; Fremont; Guthrie; Harrison; Henry; Iowa; Jasper; Jefferson; Johnson; Keokuk; Lee; Louisa;
     * Lucas; Madison; Mahaska; Marion; Mills; Monroe; Montgomery; Muscatine; Page; Polk; Pottawattamie; Poweshiek;
     * Ringgold; Scott; Shelby; Taylor; Union; Van Buren; Wapello; Warren; Washington; Wayne
     * State law defines use of US survey feet. See code 3539 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_IOWA_SOUTH = 'urn:ogc:def:crs:EPSG::3538';

    /**
     * NAD83(NSRS2007) / Iowa South (ftUS)
     * Extent: USA - Iowa - counties of Adair; Adams; Appanoose; Audubon; Cass; Cedar; Clarke; Clinton; Dallas; Davis;
     * Decatur; Des Moines; Fremont; Guthrie; Harrison; Henry; Iowa; Jasper; Jefferson; Johnson; Keokuk; Lee; Louisa;
     * Lucas; Madison; Mahaska; Marion; Mills; Monroe; Montgomery; Muscatine; Page; Polk; Pottawattamie; Poweshiek;
     * Ringgold; Scott; Shelby; Taylor; Union; Van Buren; Wapello; Warren; Washington; Wayne
     * State law defines use of US survey feet. Federal definition is metric - see code 3538. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_IOWA_SOUTH_FTUS = 'urn:ogc:def:crs:EPSG::3539';

    /**
     * NAD83(NSRS2007) / Kansas North
     * Extent: USA - Kansas - counties of Atchison; Brown; Cheyenne; Clay; Cloud; Decatur; Dickinson; Doniphan;
     * Douglas; Ellis; Ellsworth; Geary; Gove; Graham; Jackson; Jefferson; Jewell; Johnson; Leavenworth; Lincoln;
     * Logan; Marshall; Mitchell; Morris; Nemaha; Norton; Osborne; Ottawa; Phillips; Pottawatomie; Rawlins; Republic;
     * Riley; Rooks; Russell; Saline; Shawnee; Sheridan; Sherman; Smith; Thomas; Trego; Wabaunsee; Wallace; Washington;
     * Wyandotte
     * State law defines use of US survey feet. See code 3541 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_KANSAS_NORTH = 'urn:ogc:def:crs:EPSG::3540';

    /**
     * NAD83(NSRS2007) / Kansas North (ftUS)
     * Extent: USA - Kansas - counties of Atchison; Brown; Cheyenne; Clay; Cloud; Decatur; Dickinson; Doniphan;
     * Douglas; Ellis; Ellsworth; Geary; Gove; Graham; Jackson; Jefferson; Jewell; Johnson; Leavenworth; Lincoln;
     * Logan; Marshall; Mitchell; Morris; Nemaha; Norton; Osborne; Ottawa; Phillips; Pottawatomie; Rawlins; Republic;
     * Riley; Rooks; Russell; Saline; Shawnee; Sheridan; Sherman; Smith; Thomas; Trego; Wabaunsee; Wallace; Washington;
     * Wyandotte
     * State law defines use of US survey feet. Federal definition is metric - see code 3540. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_KANSAS_NORTH_FTUS = 'urn:ogc:def:crs:EPSG::3541';

    /**
     * NAD83(NSRS2007) / Kansas South
     * Extent: USA - Kansas - counties of Allen; Anderson; Barber; Barton; Bourbon; Butler; Chase; Chautauqua;
     * Cherokee; Clark; Coffey; Comanche; Cowley; Crawford; Edwards; Elk; Finney; Ford; Franklin; Grant; Gray; Greeley;
     * Greenwood; Hamilton; Harper; Harvey; Haskell; Hodgeman; Kearny; Kingman; Kiowa; Labette; Lane; Linn; Lyon;
     * Marion; McPherson; Meade; Miami; Montgomery; Morton; Neosho; Ness; Osage; Pawnee; Pratt; Reno; Rice; Rush;
     * Scott; Sedgwick; Seward; Stafford; Stanton; Stevens; Sumner; Wichita; Wilson; Woodson
     * State law defines use of US survey feet. See code 3543 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_KANSAS_SOUTH = 'urn:ogc:def:crs:EPSG::3542';

    /**
     * NAD83(NSRS2007) / Kansas South (ftUS)
     * Extent: USA - Kansas - counties of Allen; Anderson; Barber; Barton; Bourbon; Butler; Chase; Chautauqua;
     * Cherokee; Clark; Coffey; Comanche; Cowley; Crawford; Edwards; Elk; Finney; Ford; Franklin; Grant; Gray; Greeley;
     * Greenwood; Hamilton; Harper; Harvey; Haskell; Hodgeman; Kearny; Kingman; Kiowa; Labette; Lane; Linn; Lyon;
     * Marion; McPherson; Meade; Miami; Montgomery; Morton; Neosho; Ness; Osage; Pawnee; Pratt; Reno; Rice; Rush;
     * Scott; Sedgwick; Seward; Stafford; Stanton; Stevens; Sumner; Wichita; Wilson; Woodson
     * State law defines use of US survey feet. Federal definition is metric - see code 3542. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_KANSAS_SOUTH_FTUS = 'urn:ogc:def:crs:EPSG::3543';

    /**
     * NAD83(NSRS2007) / Kentucky North
     * Extent: USA - Kentucky - counties of Anderson; Bath; Boone; Bourbon; Boyd; Bracken; Bullitt; Campbell; Carroll;
     * Carter; Clark; Elliott; Fayette; Fleming; Franklin; Gallatin; Grant; Greenup; Harrison; Henry; Jefferson;
     * Jessamine; Kenton; Lawrence; Lewis; Mason; Menifee; Montgomery; Morgan; Nicholas; Oldham; Owen; Pendleton;
     * Robertson; Rowan; Scott; Shelby; Spencer; Trimble; Woodford
     * State law defines use of US survey feet. See code 3545 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_KENTUCKY_NORTH = 'urn:ogc:def:crs:EPSG::3544';

    /**
     * NAD83(NSRS2007) / Kentucky North (ftUS)
     * Extent: USA - Kentucky - counties of Anderson; Bath; Boone; Bourbon; Boyd; Bracken; Bullitt; Campbell; Carroll;
     * Carter; Clark; Elliott; Fayette; Fleming; Franklin; Gallatin; Grant; Greenup; Harrison; Henry; Jefferson;
     * Jessamine; Kenton; Lawrence; Lewis; Mason; Menifee; Montgomery; Morgan; Nicholas; Oldham; Owen; Pendleton;
     * Robertson; Rowan; Scott; Shelby; Spencer; Trimble; Woodford
     * State law defines use of US survey feet. Federal definition is metric - see code 3544. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_KENTUCKY_NORTH_FTUS = 'urn:ogc:def:crs:EPSG::3545';

    /**
     * NAD83(NSRS2007) / Kentucky Single Zone
     * Extent: USA - Kentucky
     * State law defines use of US survey feet. See code 3547 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / Kentucky Single Zone.
     */
    public const EPSG_NAD83_NSRS2007_KENTUCKY_SINGLE_ZONE = 'urn:ogc:def:crs:EPSG::3546';

    /**
     * NAD83(NSRS2007) / Kentucky Single Zone (ftUS)
     * Extent: USA - Kentucky
     * State law defines use of US survey feet. See code 3546 for equivalent metric definition. Replaces NAD83(HARN) /
     * Kentucky Single Zone (ftUS).
     */
    public const EPSG_NAD83_NSRS2007_KENTUCKY_SINGLE_ZONE_FTUS = 'urn:ogc:def:crs:EPSG::3547';

    /**
     * NAD83(NSRS2007) / Kentucky South
     * Extent: USA - Kentucky - counties of Adair; Allen; Ballard; Barren; Bell; Boyle; Breathitt; Breckinridge;
     * Butler; Caldwell; Calloway; Carlisle; Casey; Christian; Clay; Clinton; Crittenden; Cumberland; Daviess;
     * Edmonson; Estill; Floyd; Fulton; Garrard; Graves; Grayson; Green; Hancock; Hardin; Harlan; Hart; Henderson;
     * Hickman; Hopkins; Jackson; Johnson; Knott; Knox; Larue; Laurel; Lee; Leslie; Letcher; Lincoln; Livingston;
     * Logan; Lyon; Madison; Magoffin; Marion; Marshall; Martin; McCracken; McCreary; McLean; Meade; Mercer; Metcalfe;
     * Monroe; Muhlenberg; Nelson; Ohio; Owsley; Perry; Pike; Powell; Pulaski; Rockcastle; Russell; Simpson; Taylor;
     * Todd; Trigg; Union; Warren; Washington; Wayne; Webster; Whitley; Wolfe
     * State law defines use of US survey feet. See code 3549 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_KENTUCKY_SOUTH = 'urn:ogc:def:crs:EPSG::3548';

    /**
     * NAD83(NSRS2007) / Kentucky South (ftUS)
     * Extent: USA - Kentucky - counties of Adair; Allen; Ballard; Barren; Bell; Boyle; Breathitt; Breckinridge;
     * Butler; Caldwell; Calloway; Carlisle; Casey; Christian; Clay; Clinton; Crittenden; Cumberland; Daviess;
     * Edmonson; Estill; Floyd; Fulton; Garrard; Graves; Grayson; Green; Hancock; Hardin; Harlan; Hart; Henderson;
     * Hickman; Hopkins; Jackson; Johnson; Knott; Knox; Larue; Laurel; Lee; Leslie; Letcher; Lincoln; Livingston;
     * Logan; Lyon; Madison; Magoffin; Marion; Marshall; Martin; McCracken; McCreary; McLean; Meade; Mercer; Metcalfe;
     * Monroe; Muhlenberg; Nelson; Ohio; Owsley; Perry; Pike; Powell; Pulaski; Rockcastle; Russell; Simpson; Taylor;
     * Todd; Trigg; Union; Warren; Washington; Wayne; Webster; Whitley; Wolfe
     * State law defines use of US survey feet. Federal definition is metric - see code 3548. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_KENTUCKY_SOUTH_FTUS = 'urn:ogc:def:crs:EPSG::3549';

    /**
     * NAD83(NSRS2007) / Louisiana North
     * Extent: USA - Louisiana - counties of Avoyelles; Bienville; Bossier; Caddo; Caldwell; Catahoula; Claiborne;
     * Concordia; De Soto; East Carroll; Franklin; Grant; Jackson; La Salle; Lincoln; Madison; Morehouse; Natchitoches;
     * Ouachita; Rapides; Red River; Richland; Sabine; Tensas; Union; Vernon; Webster; West Carroll; Winn
     * State law defines use of US survey feet. See code 3551 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_LOUISIANA_NORTH = 'urn:ogc:def:crs:EPSG::3550';

    /**
     * NAD83(NSRS2007) / Louisiana North (ftUS)
     * Extent: USA - Louisiana - counties of Avoyelles; Bienville; Bossier; Caddo; Caldwell; Catahoula; Claiborne;
     * Concordia; De Soto; East Carroll; Franklin; Grant; Jackson; La Salle; Lincoln; Madison; Morehouse; Natchitoches;
     * Ouachita; Rapides; Red River; Richland; Sabine; Tensas; Union; Vernon; Webster; West Carroll; Winn
     * State law defines use of US survey feet. Federal definition is metric - see code 3550. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_LOUISIANA_NORTH_FTUS = 'urn:ogc:def:crs:EPSG::3551';

    /**
     * NAD83(NSRS2007) / Louisiana South
     * Extent: USA - Louisiana - counties of Acadia; Allen; Ascension; Assumption; Beauregard; Calcasieu; Cameron; East
     * Baton Rouge; East Feliciana; Evangeline; Iberia; Iberville; Jefferson; Jefferson Davis; Lafayette; LaFourche;
     * Livingston; Orleans; Plaquemines; Pointe Coupee; St Bernard; St Charles; St Helena; St James; St John the
     * Baptist; St Landry; St Martin; St Mary; St Tammany; Tangipahoa; Terrebonne; Vermilion; Washington; West Baton
     * Rouge; West Feliciana
     * Not applicable to offshore areas. State law defines use of US survey feet. See code 3553 for equivalent
     * non-metric definition. Replaces NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_LOUISIANA_SOUTH = 'urn:ogc:def:crs:EPSG::3552';

    /**
     * NAD83(NSRS2007) / Louisiana South (ftUS)
     * Extent: USA - Louisiana - counties of Acadia; Allen; Ascension; Assumption; Beauregard; Calcasieu; Cameron; East
     * Baton Rouge; East Feliciana; Evangeline; Iberia; Iberville; Jefferson; Jefferson Davis; Lafayette; LaFourche;
     * Livingston; Orleans; Plaquemines; Pointe Coupee; St Bernard; St Charles; St Helena; St James; St John the
     * Baptist; St Landry; St Martin; St Mary; St Tammany; Tangipahoa; Terrebonne; Vermilion; Washington; West Baton
     * Rouge; West Feliciana
     * Not applicable to offshore areas. State law defines use of US survey feet. Federal definition is metric - see
     * code 3552. Replaces NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_LOUISIANA_SOUTH_FTUS = 'urn:ogc:def:crs:EPSG::3553';

    /**
     * NAD83(NSRS2007) / Maine CS2000 Central
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
     * Replaces NAD83(HARN) / CS2000.
     */
    public const EPSG_NAD83_NSRS2007_MAINE_CS2000_CENTRAL = 'urn:ogc:def:crs:EPSG::3554';

    /**
     * NAD83(NSRS2007) / Maine CS2000 East
     * Extent: USA - Maine east of approximately 68°25'W. The area is bounded by the following: Beginning at the point
     * determined by the intersection of the Maine State line and the Fort Kent - Frenchville town line, thence
     * continuing easterly and then southerly along the state line to the boundary of the State of Maine as determined
     * by Maritime law, thence following the State boundary westerly to the intersection of the Knox and Hancock County
     * line, thence northerly along the easterly boundary of the Maine 2000 Central Zone, as defined, to the point of
     * beginning
     * Replaces NAD83(HARN) / CS2000.
     */
    public const EPSG_NAD83_NSRS2007_MAINE_CS2000_EAST = 'urn:ogc:def:crs:EPSG::3555';

    /**
     * NAD83(NSRS2007) / Maine CS2000 West
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
     * Replaces NAD83(HARN) / CS2000.
     */
    public const EPSG_NAD83_NSRS2007_MAINE_CS2000_WEST = 'urn:ogc:def:crs:EPSG::3556';

    /**
     * NAD83(NSRS2007) / Maine East
     * Extent: USA - Maine - counties of Aroostook; Hancock; Knox; Penobscot; Piscataquis; Waldo; Washington
     * State law defines system in US survey feet. See code 26863 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_MAINE_EAST = 'urn:ogc:def:crs:EPSG::3557';

    /**
     * NAD83(NSRS2007) / Maine East (ftUS)
     * Extent: USA - Maine - counties of Aroostook; Hancock; Knox; Penobscot; Piscataquis; Waldo; Washington
     * State law defines use of US survey feet. Federal definition is metric - see code 3557. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_MAINE_EAST_FTUS = 'urn:ogc:def:crs:EPSG::26863';

    /**
     * NAD83(NSRS2007) / Maine West
     * Extent: USA - Maine - counties of Androscoggin; Cumberland; Franklin; Kennebec; Lincoln; Oxford; Sagadahoc;
     * Somerset; York
     * State law defines system in US survey feet. See code 26864 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_MAINE_WEST = 'urn:ogc:def:crs:EPSG::3558';

    /**
     * NAD83(NSRS2007) / Maine West (ftUS)
     * Extent: USA - Maine - counties of Androscoggin; Cumberland; Franklin; Kennebec; Lincoln; Oxford; Sagadahoc;
     * Somerset; York
     * State law defines use of US survey feet. Federal definition is metric - see code 3558. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_MAINE_WEST_FTUS = 'urn:ogc:def:crs:EPSG::26864';

    /**
     * NAD83(NSRS2007) / Maryland
     * Extent: USA - Maryland - counties of Allegany; Anne Arundel; Baltimore; Calvert; Caroline; Carroll; Cecil;
     * Charles; Dorchester; Frederick; Garrett; Harford; Howard; Kent; Montgomery; Prince Georges; Queen Annes;
     * Somerset; St Marys; Talbot; Washington; Wicomico; Worcester. District of Columbia (DC)
     * State law defines use of US survey feet. See code 3582 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_MARYLAND = 'urn:ogc:def:crs:EPSG::3559';

    /**
     * NAD83(NSRS2007) / Maryland (ftUS)
     * Extent: USA - Maryland - counties of Allegany; Anne Arundel; Baltimore; Calvert; Caroline; Carroll; Cecil;
     * Charles; Dorchester; Frederick; Garrett; Harford; Howard; Kent; Montgomery; Prince Georges; Queen Annes;
     * Somerset; St Marys; Talbot; Washington; Wicomico; Worcester. District of Columbia (DC)
     * State law defines use of US survey feet. Federal definition is metric - see code 3559. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_MARYLAND_FTUS = 'urn:ogc:def:crs:EPSG::3582';

    /**
     * NAD83(NSRS2007) / Massachusetts Island
     * Extent: USA - Massachusetts offshore - counties of Dukes; Nantucket
     * State law defines use of US survey feet. See code 3584 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_MASSACHUSETTS_ISLAND = 'urn:ogc:def:crs:EPSG::3583';

    /**
     * NAD83(NSRS2007) / Massachusetts Island (ftUS)
     * Extent: USA - Massachusetts offshore - counties of Dukes; Nantucket
     * State law defines use of US survey feet. Federal definition is metric - see code 3583. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_MASSACHUSETTS_ISLAND_FTUS = 'urn:ogc:def:crs:EPSG::3584';

    /**
     * NAD83(NSRS2007) / Massachusetts Mainland
     * Extent: USA - Massachusetts onshore - counties of Barnstable; Berkshire; Bristol; Essex; Franklin; Hampden;
     * Hampshire; Middlesex; Norfolk; Plymouth; Suffolk; Worcester
     * State law defines use of US survey feet. See code 3586 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_MASSACHUSETTS_MAINLAND = 'urn:ogc:def:crs:EPSG::3585';

    /**
     * NAD83(NSRS2007) / Massachusetts Mainland (ftUS)
     * Extent: USA - Massachusetts onshore - counties of Barnstable; Berkshire; Bristol; Essex; Franklin; Hampden;
     * Hampshire; Middlesex; Norfolk; Plymouth; Suffolk; Worcester
     * State law defines use of US survey feet. Federal definition is metric - see code 3585. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_MASSACHUSETTS_MAINLAND_FTUS = 'urn:ogc:def:crs:EPSG::3586';

    /**
     * NAD83(NSRS2007) / Michigan Central
     * Extent: USA - Michigan - counties of Alcona; Alpena; Antrim; Arenac; Benzie; Charlevoix; Cheboygan; Clare;
     * Crawford; Emmet; Gladwin; Grand Traverse; Iosco; Kalkaska; Lake; Leelanau; Manistee; Mason; Missaukee;
     * Montmorency; Ogemaw; Osceola; Oscoda; Otsego; Presque Isle; Roscommon; Wexford
     * State law defines use of International feet (note: not US survey feet). See code 3588 for equivalent non-metric
     * definition. Replaces NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_MICHIGAN_CENTRAL = 'urn:ogc:def:crs:EPSG::3587';

    /**
     * NAD83(NSRS2007) / Michigan Central (ft)
     * Extent: USA - Michigan - counties of Alcona; Alpena; Antrim; Arenac; Benzie; Charlevoix; Cheboygan; Clare;
     * Crawford; Emmet; Gladwin; Grand Traverse; Iosco; Kalkaska; Lake; Leelanau; Manistee; Mason; Missaukee;
     * Montmorency; Ogemaw; Osceola; Oscoda; Otsego; Presque Isle; Roscommon; Wexford
     * State law defines use of International feet (note: not US survey feet). Federal definition is metric - see code
     * 3587. Replaces NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_MICHIGAN_CENTRAL_FT = 'urn:ogc:def:crs:EPSG::3588';

    /**
     * NAD83(NSRS2007) / Michigan North
     * Extent: USA - Michigan north of approximately 45°45'N - counties of Alger; Baraga; Chippewa; Delta; Dickinson;
     * Gogebic; Houghton; Iron; Keweenaw; Luce; Mackinac; Marquette; Menominee; Ontonagon; Schoolcraft
     * State law defines use of International feet (note: not US survey feet). See code 3590 for equivalent non-metric
     * definition. Replaces NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_MICHIGAN_NORTH = 'urn:ogc:def:crs:EPSG::3589';

    /**
     * NAD83(NSRS2007) / Michigan North (ft)
     * Extent: USA - Michigan north of approximately 45°45'N - counties of Alger; Baraga; Chippewa; Delta; Dickinson;
     * Gogebic; Houghton; Iron; Keweenaw; Luce; Mackinac; Marquette; Menominee; Ontonagon; Schoolcraft
     * State law defines use of International feet (note: not US survey feet). Federal definition is metric - see code
     * 3589. Replaces NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_MICHIGAN_NORTH_FT = 'urn:ogc:def:crs:EPSG::3590';

    /**
     * NAD83(NSRS2007) / Michigan Oblique Mercator
     * Extent: USA - Michigan
     * Replaces NAD83(HARN) / Michigan Oblique Mercator.
     */
    public const EPSG_NAD83_NSRS2007_MICHIGAN_OBLIQUE_MERCATOR = 'urn:ogc:def:crs:EPSG::3591';

    /**
     * NAD83(NSRS2007) / Michigan South
     * Extent: USA - Michigan - counties of Allegan; Barry; Bay; Berrien; Branch; Calhoun; Cass; Clinton; Eaton;
     * Genesee; Gratiot; Hillsdale; Huron; Ingham; Ionia; Isabella; Jackson; Kalamazoo; Kent; Lapeer; Lenawee;
     * Livingston; Macomb; Mecosta; Midland; Monroe; Montcalm; Muskegon; Newaygo; Oakland; Oceana; Ottawa; Saginaw;
     * Sanilac; Shiawassee; St Clair; St Joseph; Tuscola; Van Buren; Washtenaw; Wayne
     * State law defines use of International feet (note: not US survey feet). See code 3593 for equivalent non-metric
     * definition. Replaces NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_MICHIGAN_SOUTH = 'urn:ogc:def:crs:EPSG::3592';

    /**
     * NAD83(NSRS2007) / Michigan South (ft)
     * Extent: USA - Michigan - counties of Allegan; Barry; Bay; Berrien; Branch; Calhoun; Cass; Clinton; Eaton;
     * Genesee; Gratiot; Hillsdale; Huron; Ingham; Ionia; Isabella; Jackson; Kalamazoo; Kent; Lapeer; Lenawee;
     * Livingston; Macomb; Mecosta; Midland; Monroe; Montcalm; Muskegon; Newaygo; Oakland; Oceana; Ottawa; Saginaw;
     * Sanilac; Shiawassee; St Clair; St Joseph; Tuscola; Van Buren; Washtenaw; Wayne
     * State law defines use of International feet (note: not US survey feet). Federal definition is metric - see code
     * 3592. Replaces NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_MICHIGAN_SOUTH_FT = 'urn:ogc:def:crs:EPSG::3593';

    /**
     * NAD83(NSRS2007) / Minnesota Central
     * Extent: USA - Minnesota - counties of Aitkin; Becker; Benton; Carlton; Cass; Chisago; Clay; Crow Wing; Douglas;
     * Grant; Hubbard; Isanti; Kanabec; Mille Lacs; Morrison; Otter Tail; Pine; Pope; Stearns; Stevens; Todd; Traverse;
     * Wadena; Wilkin
     * State law defines system in US survey feet. See code 26866 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_MINNESOTA_CENTRAL = 'urn:ogc:def:crs:EPSG::3594';

    /**
     * NAD83(NSRS2007) / Minnesota Central (ftUS)
     * Extent: USA - Minnesota - counties of Aitkin; Becker; Benton; Carlton; Cass; Chisago; Clay; Crow Wing; Douglas;
     * Grant; Hubbard; Isanti; Kanabec; Mille Lacs; Morrison; Otter Tail; Pine; Pope; Stearns; Stevens; Todd; Traverse;
     * Wadena; Wilkin
     * State law defines use of US survey feet. Federal definition is metric - see code 3594. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_MINNESOTA_CENTRAL_FTUS = 'urn:ogc:def:crs:EPSG::26866';

    /**
     * NAD83(NSRS2007) / Minnesota North
     * Extent: USA - Minnesota - counties of Beltrami; Clearwater; Cook; Itasca; Kittson; Koochiching; Lake; Lake of
     * the Woods; Mahnomen; Marshall; Norman; Pennington; Polk; Red Lake; Roseau; St Louis
     * State law defines system in US survey feet. See code 26865 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_MINNESOTA_NORTH = 'urn:ogc:def:crs:EPSG::3595';

    /**
     * NAD83(NSRS2007) / Minnesota North (ftUS)
     * Extent: USA - Minnesota - counties of Beltrami; Clearwater; Cook; Itasca; Kittson; Koochiching; Lake; Lake of
     * the Woods; Mahnomen; Marshall; Norman; Pennington; Polk; Red Lake; Roseau; St Louis
     * State law defines use of US survey feet. Federal definition is metric - see code 3595. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_MINNESOTA_NORTH_FTUS = 'urn:ogc:def:crs:EPSG::26865';

    /**
     * NAD83(NSRS2007) / Minnesota South
     * Extent: USA - Minnesota - counties of Anoka; Big Stone; Blue Earth; Brown; Carver; Chippewa; Cottonwood; Dakota;
     * Dodge; Faribault; Fillmore; Freeborn; Goodhue; Hennepin; Houston; Jackson; Kandiyohi; Lac Qui Parle; Le Sueur;
     * Lincoln; Lyon; Martin; McLeod; Meeker; Mower; Murray; Nicollet; Nobles; Olmsted; Pipestone; Ramsey; Redwood;
     * Renville; Rice; Rock; Scott; Sherburne; Sibley; Steele; Swift; Wabasha; Waseca; Washington; Watonwan; Winona;
     * Wright; Yellow Medicine
     * State law defines system in US survey feet. See code 26867 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_MINNESOTA_SOUTH = 'urn:ogc:def:crs:EPSG::3596';

    /**
     * NAD83(NSRS2007) / Minnesota South (ftUS)
     * Extent: USA - Minnesota - counties of Anoka; Big Stone; Blue Earth; Brown; Carver; Chippewa; Cottonwood; Dakota;
     * Dodge; Faribault; Fillmore; Freeborn; Goodhue; Hennepin; Houston; Jackson; Kandiyohi; Lac Qui Parle; Le Sueur;
     * Lincoln; Lyon; Martin; McLeod; Meeker; Mower; Murray; Nicollet; Nobles; Olmsted; Pipestone; Ramsey; Redwood;
     * Renville; Rice; Rock; Scott; Sherburne; Sibley; Steele; Swift; Wabasha; Waseca; Washington; Watonwan; Winona;
     * Wright; Yellow Medicine
     * State law defines use of US survey feet. Federal definition is metric - see code 3596. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_MINNESOTA_SOUTH_FTUS = 'urn:ogc:def:crs:EPSG::26867';

    /**
     * NAD83(NSRS2007) / Mississippi East
     * Extent: USA - Mississippi - counties of Alcorn; Attala; Benton; Calhoun; Chickasaw; Choctaw; Clarke; Clay;
     * Covington; Forrest; George; Greene; Hancock; Harrison; Itawamba; Jackson; Jasper; Jones; Kemper; Lafayette;
     * Lamar; Lauderdale; Leake; Lee; Lowndes; Marshall; Monroe; Neshoba; Newton; Noxubee; Oktibbeha; Pearl River;
     * Perry; Pontotoc; Prentiss; Scott; Smith; Stone; Tippah; Tishomingo; Union; Wayne; Webster; Winston
     * State law defines use of US survey feet. See code 3598 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_MISSISSIPPI_EAST = 'urn:ogc:def:crs:EPSG::3597';

    /**
     * NAD83(NSRS2007) / Mississippi East (ftUS)
     * Extent: USA - Mississippi - counties of Alcorn; Attala; Benton; Calhoun; Chickasaw; Choctaw; Clarke; Clay;
     * Covington; Forrest; George; Greene; Hancock; Harrison; Itawamba; Jackson; Jasper; Jones; Kemper; Lafayette;
     * Lamar; Lauderdale; Leake; Lee; Lowndes; Marshall; Monroe; Neshoba; Newton; Noxubee; Oktibbeha; Pearl River;
     * Perry; Pontotoc; Prentiss; Scott; Smith; Stone; Tippah; Tishomingo; Union; Wayne; Webster; Winston
     * State law defines use of US survey feet. Federal definition is metric - see code 3597. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_MISSISSIPPI_EAST_FTUS = 'urn:ogc:def:crs:EPSG::3598';

    /**
     * NAD83(NSRS2007) / Mississippi TM
     * Extent: USA - Mississippi
     * Replaces NAD83(HARN) / Mississippi TM (CRS code 3815).
     */
    public const EPSG_NAD83_NSRS2007_MISSISSIPPI_TM = 'urn:ogc:def:crs:EPSG::3816';

    /**
     * NAD83(NSRS2007) / Mississippi West
     * Extent: USA - Mississippi - counties of Adams; Amite; Bolivar; Carroll; Claiborne; Coahoma; Copiah; De Soto;
     * Franklin; Grenada; Hinds; Holmes; Humphreys; Issaquena; Jefferson; Jefferson Davis; Lawrence; Leflore; Lincoln;
     * Madison; Marion; Montgomery; Panola; Pike; Quitman; Rankin; Sharkey; Simpson; Sunflower; Tallahatchie; Tate;
     * Tunica; Walthall; Warren; Washington; Wilkinson; Yalobusha; Yazoo
     * State law defines use of US survey feet. See code 3600 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_MISSISSIPPI_WEST = 'urn:ogc:def:crs:EPSG::3599';

    /**
     * NAD83(NSRS2007) / Mississippi West (ftUS)
     * Extent: USA - Mississippi - counties of Adams; Amite; Bolivar; Carroll; Claiborne; Coahoma; Copiah; De Soto;
     * Franklin; Grenada; Hinds; Holmes; Humphreys; Issaquena; Jefferson; Jefferson Davis; Lawrence; Leflore; Lincoln;
     * Madison; Marion; Montgomery; Panola; Pike; Quitman; Rankin; Sharkey; Simpson; Sunflower; Tallahatchie; Tate;
     * Tunica; Walthall; Warren; Washington; Wilkinson; Yalobusha; Yazoo
     * State law defines use of US survey feet. Federal definition is metric - see code 3599. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_MISSISSIPPI_WEST_FTUS = 'urn:ogc:def:crs:EPSG::3600';

    /**
     * NAD83(NSRS2007) / Missouri Central
     * Extent: USA - Missouri - counties of Adair; Audrain; Benton; Boone; Callaway; Camden; Carroll; Chariton;
     * Christian; Cole; Cooper; Dallas; Douglas; Greene; Grundy; Hickory; Howard; Howell; Knox; Laclede; Linn;
     * Livingston; Macon; Maries; Mercer; Miller; Moniteau; Monroe; Morgan; Osage; Ozark; Pettis; Phelps; Polk;
     * Pulaski; Putnam; Randolph; Saline; Schuyler; Scotland; Shelby; Stone; Sullivan; Taney; Texas; Webster; Wright
     * Replaces NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_MISSOURI_CENTRAL = 'urn:ogc:def:crs:EPSG::3601';

    /**
     * NAD83(NSRS2007) / Missouri East
     * Extent: USA - Missouri - counties of Bollinger; Butler; Cape Girardeau; Carter; Clark; Crawford; Dent; Dunklin;
     * Franklin; Gasconade; Iron; Jefferson; Lewis; Lincoln; Madison; Marion; Mississippi; Montgomery; New Madrid;
     * Oregon; Pemiscot; Perry; Pike; Ralls; Reynolds; Ripley; Scott; Shannon; St Charles; St Francois; St Louis; Ste.
     * Genevieve; Stoddard; Warren; Washington; Wayne
     * Replaces NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_MISSOURI_EAST = 'urn:ogc:def:crs:EPSG::3602';

    /**
     * NAD83(NSRS2007) / Missouri West
     * Extent: USA - Missouri - counties of Andrew; Atchison; Barry; Barton; Bates; Buchanan; Caldwell; Cass; Cedar;
     * Clay; Clinton; Dade; Daviess; De Kalb; Gentry; Harrison; Henry; Holt; Jackson; Jasper; Johnson; Lafayette;
     * Lawrence; McDonald; Newton; Nodaway; Platte; Ray; St Clair; Vernon; Worth
     * Replaces NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_MISSOURI_WEST = 'urn:ogc:def:crs:EPSG::3603';

    /**
     * NAD83(NSRS2007) / Montana
     * Extent: USA - Montana
     * State law defines use of International feet (note: not US survey feet). See code 3605 for equivalent non-metric
     * definition. Replaces NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_MONTANA = 'urn:ogc:def:crs:EPSG::3604';

    /**
     * NAD83(NSRS2007) / Montana (ft)
     * Extent: USA - Montana
     * State law defines use of International feet (note: not US survey feet). Federal definition is metric - see code
     * 3604. Replaces NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_MONTANA_FT = 'urn:ogc:def:crs:EPSG::3605';

    /**
     * NAD83(NSRS2007) / Nebraska
     * Extent: USA - Nebraska
     * State law defines system in US survey feet. See CRS code 26868 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_NEBRASKA = 'urn:ogc:def:crs:EPSG::3606';

    /**
     * NAD83(NSRS2007) / Nebraska (ftUS)
     * Extent: USA - Nebraska
     * State law defines use of US survey feet. Federal definition is metric - see code 3606. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_NEBRASKA_FTUS = 'urn:ogc:def:crs:EPSG::26868';

    /**
     * NAD83(NSRS2007) / Nevada Central
     * Extent: USA - Nevada - counties of Lander; Nye
     * State law defines use of US survey feet. See code 3608 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_NEVADA_CENTRAL = 'urn:ogc:def:crs:EPSG::3607';

    /**
     * NAD83(NSRS2007) / Nevada Central (ftUS)
     * Extent: USA - Nevada - counties of Lander; Nye
     * State law defines use of US survey feet. Federal definition is metric - see code 3607. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_NEVADA_CENTRAL_FTUS = 'urn:ogc:def:crs:EPSG::3608';

    /**
     * NAD83(NSRS2007) / Nevada East
     * Extent: USA - Nevada - counties of Clark; Elko; Eureka; Lincoln; White Pine
     * State law defines use of US survey feet. See code 3610 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_NEVADA_EAST = 'urn:ogc:def:crs:EPSG::3609';

    /**
     * NAD83(NSRS2007) / Nevada East (ftUS)
     * Extent: USA - Nevada - counties of Clark; Elko; Eureka; Lincoln; White Pine
     * State law defines use of US survey feet. Federal definition is metric - see code 3609. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_NEVADA_EAST_FTUS = 'urn:ogc:def:crs:EPSG::3610';

    /**
     * NAD83(NSRS2007) / Nevada West
     * Extent: USA - Nevada - counties of Churchill; Douglas; Esmeralda; Humboldt; Lyon; Mineral; Pershing; Storey;
     * Washoe
     * State law defines use of US survey feet. See code 3612 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_NEVADA_WEST = 'urn:ogc:def:crs:EPSG::3611';

    /**
     * NAD83(NSRS2007) / Nevada West (ftUS)
     * Extent: USA - Nevada - counties of Churchill; Douglas; Esmeralda; Humboldt; Lyon; Mineral; Pershing; Storey;
     * Washoe
     * State law defines use of US survey feet. Federal definition is metric - see code 3611. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_NEVADA_WEST_FTUS = 'urn:ogc:def:crs:EPSG::3612';

    /**
     * NAD83(NSRS2007) / New Hampshire
     * Extent: USA - New Hampshire
     * State law defines use of US survey feet. See code 3614 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_NEW_HAMPSHIRE = 'urn:ogc:def:crs:EPSG::3613';

    /**
     * NAD83(NSRS2007) / New Hampshire (ftUS)
     * Extent: USA - New Hampshire
     * State law defines use of US survey feet. Federal definition is metric - see code 3613. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_NEW_HAMPSHIRE_FTUS = 'urn:ogc:def:crs:EPSG::3614';

    /**
     * NAD83(NSRS2007) / New Jersey
     * Extent: USA - New Jersey
     * State law defines use of US survey feet. See code 3616 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_NEW_JERSEY = 'urn:ogc:def:crs:EPSG::3615';

    /**
     * NAD83(NSRS2007) / New Jersey (ftUS)
     * Extent: USA - New Jersey
     * State law defines use of US survey feet. Federal definition is metric - see code 3615. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_NEW_JERSEY_FTUS = 'urn:ogc:def:crs:EPSG::3616';

    /**
     * NAD83(NSRS2007) / New Mexico Central
     * Extent: USA - New Mexico - counties of Bernalillo; Dona Ana; Lincoln; Los Alamos; Otero; Rio Arriba; Sandoval;
     * Santa Fe; Socorro; Taos; Torrance; Valencia
     * State law defines use of US survey feet. See code 3618 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_NEW_MEXICO_CENTRAL = 'urn:ogc:def:crs:EPSG::3617';

    /**
     * NAD83(NSRS2007) / New Mexico Central (ftUS)
     * Extent: USA - New Mexico - counties of Bernalillo; Dona Ana; Lincoln; Los Alamos; Otero; Rio Arriba; Sandoval;
     * Santa Fe; Socorro; Taos; Torrance; Valencia
     * State law defines use of US survey feet. Federal definition is metric - see code 3617. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_NEW_MEXICO_CENTRAL_FTUS = 'urn:ogc:def:crs:EPSG::3618';

    /**
     * NAD83(NSRS2007) / New Mexico East
     * Extent: USA - New Mexico - counties of Chaves; Colfax; Curry; De Baca; Eddy; Guadalupe; Harding; Lea; Mora;
     * Quay; Roosevelt; San Miguel; Union
     * State law defines use of US survey feet. See code 3620 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_NEW_MEXICO_EAST = 'urn:ogc:def:crs:EPSG::3619';

    /**
     * NAD83(NSRS2007) / New Mexico East (ftUS)
     * Extent: USA - New Mexico - counties of Chaves; Colfax; Curry; De Baca; Eddy; Guadalupe; Harding; Lea; Mora;
     * Quay; Roosevelt; San Miguel; Union
     * State law defines use of US survey feet. Federal definition is metric - see code 3619. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_NEW_MEXICO_EAST_FTUS = 'urn:ogc:def:crs:EPSG::3620';

    /**
     * NAD83(NSRS2007) / New Mexico West
     * Extent: USA - New Mexico - counties of Catron; Cibola; Grant; Hidalgo; Luna; McKinley; San Juan; Sierra
     * State law defines use of US survey feet. See code 3622 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_NEW_MEXICO_WEST = 'urn:ogc:def:crs:EPSG::3621';

    /**
     * NAD83(NSRS2007) / New Mexico West (ftUS)
     * Extent: USA - New Mexico - counties of Catron; Cibola; Grant; Hidalgo; Luna; McKinley; San Juan; Sierra
     * State law defines use of US survey feet. Federal definition is metric - see code 3621. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_NEW_MEXICO_WEST_FTUS = 'urn:ogc:def:crs:EPSG::3622';

    /**
     * NAD83(NSRS2007) / New York Central
     * Extent: USA - New York - counties of Broome; Cayuga; Chemung; Chenango; Cortland; Jefferson; Lewis; Madison;
     * Oneida; Onondaga; Ontario; Oswego; Schuyler; Seneca; Steuben; Tioga; Tompkins; Wayne; Yates
     * State law defines use of US survey feet. See code 3624 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_NEW_YORK_CENTRAL = 'urn:ogc:def:crs:EPSG::3623';

    /**
     * NAD83(NSRS2007) / New York Central (ftUS)
     * Extent: USA - New York - counties of Broome; Cayuga; Chemung; Chenango; Cortland; Jefferson; Lewis; Madison;
     * Oneida; Onondaga; Ontario; Oswego; Schuyler; Seneca; Steuben; Tioga; Tompkins; Wayne; Yates
     * State law defines use of US survey feet. Federal definition is metric - see code 3623. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_NEW_YORK_CENTRAL_FTUS = 'urn:ogc:def:crs:EPSG::3624';

    /**
     * NAD83(NSRS2007) / New York East
     * Extent: USA - New York mainland - counties of Albany; Clinton; Columbia; Delaware; Dutchess; Essex; Franklin;
     * Fulton; Greene; Hamilton; Herkimer; Montgomery; Orange; Otsego; Putnam; Rensselaer; Rockland; Saratoga;
     * Schenectady; Schoharie; St Lawrence; Sullivan; Ulster; Warren; Washington; Westchester
     * State law defines use of US survey feet. See code 3626 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_NEW_YORK_EAST = 'urn:ogc:def:crs:EPSG::3625';

    /**
     * NAD83(NSRS2007) / New York East (ftUS)
     * Extent: USA - New York mainland - counties of Albany; Clinton; Columbia; Delaware; Dutchess; Essex; Franklin;
     * Fulton; Greene; Hamilton; Herkimer; Montgomery; Orange; Otsego; Putnam; Rensselaer; Rockland; Saratoga;
     * Schenectady; Schoharie; St Lawrence; Sullivan; Ulster; Warren; Washington; Westchester
     * State law defines use of US survey feet. Federal definition is metric - see code 3625. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_NEW_YORK_EAST_FTUS = 'urn:ogc:def:crs:EPSG::3626';

    /**
     * NAD83(NSRS2007) / New York Long Island
     * Extent: USA - New York - counties of Bronx; Kings; Nassau; New York; Queens; Richmond; Suffolk
     * State law defines use of US survey feet. See code 3628 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_NEW_YORK_LONG_ISLAND = 'urn:ogc:def:crs:EPSG::3627';

    /**
     * NAD83(NSRS2007) / New York Long Island (ftUS)
     * Extent: USA - New York - counties of Bronx; Kings; Nassau; New York; Queens; Richmond; Suffolk
     * State law defines use of US survey feet. Federal definition is metric - see code 3627. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_NEW_YORK_LONG_ISLAND_FTUS = 'urn:ogc:def:crs:EPSG::3628';

    /**
     * NAD83(NSRS2007) / New York West
     * Extent: USA - New York - counties of Allegany; Cattaraugus; Chautauqua; Erie; Genesee; Livingston; Monroe;
     * Niagara; Orleans; Wyoming
     * State law defines use of US survey feet. See code 3630 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_NEW_YORK_WEST = 'urn:ogc:def:crs:EPSG::3629';

    /**
     * NAD83(NSRS2007) / New York West (ftUS)
     * Extent: USA - New York - counties of Allegany; Cattaraugus; Chautauqua; Erie; Genesee; Livingston; Monroe;
     * Niagara; Orleans; Wyoming
     * State law defines use of US survey feet. Federal definition is metric - see code 3629. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_NEW_YORK_WEST_FTUS = 'urn:ogc:def:crs:EPSG::3630';

    /**
     * NAD83(NSRS2007) / North Carolina
     * Extent: USA - North Carolina
     * State law defines use of US survey feet. See CRS code 3632 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_NORTH_CAROLINA = 'urn:ogc:def:crs:EPSG::3631';

    /**
     * NAD83(NSRS2007) / North Carolina (ftUS)
     * Extent: USA - North Carolina
     * State law defines use of US survey feet. Federal definition is metric - see CRS code 3631. Replaces NAD83(HARN)
     * / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_NORTH_CAROLINA_FTUS = 'urn:ogc:def:crs:EPSG::3632';

    /**
     * NAD83(NSRS2007) / North Dakota North
     * Extent: USA - North Dakota - counties of Benson; Bottineau; Burke; Cavalier; Divide; Eddy; Foster; Grand Forks;
     * Griggs; McHenry; McKenzie; McLean; Mountrial; Nelson; Pembina; Pierce; Ramsey; Renville; Rolette; Sheridan;
     * Steele; Towner; Traill; Walsh; Ward; Wells; Williams
     * State law defines use of International feet (note: not US survey feet). See code 3634 for equivalent non-metric
     * definition. Replaces NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_NORTH_DAKOTA_NORTH = 'urn:ogc:def:crs:EPSG::3633';

    /**
     * NAD83(NSRS2007) / North Dakota North (ft)
     * Extent: USA - North Dakota - counties of Benson; Bottineau; Burke; Cavalier; Divide; Eddy; Foster; Grand Forks;
     * Griggs; McHenry; McKenzie; McLean; Mountrial; Nelson; Pembina; Pierce; Ramsey; Renville; Rolette; Sheridan;
     * Steele; Towner; Traill; Walsh; Ward; Wells; Williams
     * State law defines use of International feet (note: not US survey feet). Federal definition is metric - see code
     * 3633. Replaces NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_NORTH_DAKOTA_NORTH_FT = 'urn:ogc:def:crs:EPSG::3634';

    /**
     * NAD83(NSRS2007) / North Dakota South
     * Extent: USA - North Dakota - counties of Adams; Barnes; Billings; Bowman; Burleigh; Cass; Dickey; Dunn; Emmons;
     * Golden Valley; Grant; Hettinger; Kidder; La Moure; Logan; McIntosh; Mercer; Morton; Oliver; Ransom; Richland;
     * Sargent; Sioux; Slope; Stark; Stutsman
     * State law defines use of International feet (note: not US survey feet). See code 3636 for equivalent non-metric
     * definition. Replaces NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_NORTH_DAKOTA_SOUTH = 'urn:ogc:def:crs:EPSG::3635';

    /**
     * NAD83(NSRS2007) / North Dakota South (ft)
     * Extent: USA - North Dakota - counties of Adams; Barnes; Billings; Bowman; Burleigh; Cass; Dickey; Dunn; Emmons;
     * Golden Valley; Grant; Hettinger; Kidder; La Moure; Logan; McIntosh; Mercer; Morton; Oliver; Ransom; Richland;
     * Sargent; Sioux; Slope; Stark; Stutsman
     * State law defines use of International feet (note: not US survey feet). Federal definition is metric - see code
     * 3635. Replaces NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_NORTH_DAKOTA_SOUTH_FT = 'urn:ogc:def:crs:EPSG::3636';

    /**
     * NAD83(NSRS2007) / Ohio North
     * Extent: USA - Ohio - counties of Allen;Ashland; Ashtabula; Auglaize; Carroll; Columbiana; Coshocton; Crawford;
     * Cuyahoga; Defiance; Delaware; Erie; Fulton; Geauga; Hancock; Hardin; Harrison; Henry; Holmes; Huron; Jefferson;
     * Knox; Lake; Logan; Lorain; Lucas; Mahoning; Marion; Medina; Mercer; Morrow; Ottawa; Paulding; Portage; Putnam;
     * Richland; Sandusky; Seneca; Shelby; Stark; Summit; Trumbull; Tuscarawas; Union; Van Wert; Wayne; Williams; Wood;
     * Wyandot
     * State law defines use of US survey feet. See code 3728 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_OHIO_NORTH = 'urn:ogc:def:crs:EPSG::3637';

    /**
     * NAD83(NSRS2007) / Ohio North (ftUS)
     * Extent: USA - Ohio - counties of Allen;Ashland; Ashtabula; Auglaize; Carroll; Columbiana; Coshocton; Crawford;
     * Cuyahoga; Defiance; Delaware; Erie; Fulton; Geauga; Hancock; Hardin; Harrison; Henry; Holmes; Huron; Jefferson;
     * Knox; Lake; Logan; Lorain; Lucas; Mahoning; Marion; Medina; Mercer; Morrow; Ottawa; Paulding; Portage; Putnam;
     * Richland; Sandusky; Seneca; Shelby; Stark; Summit; Trumbull; Tuscarawas; Union; Van Wert; Wayne; Williams; Wood;
     * Wyandot
     * State law defines use of US survey feet. Federal definition is metric - see code 3637. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_OHIO_NORTH_FTUS = 'urn:ogc:def:crs:EPSG::3728';

    /**
     * NAD83(NSRS2007) / Ohio South
     * Extent: USA - Ohio - counties of Adams; Athens; Belmont; Brown; Butler; Champaign; Clark; Clermont; Clinton;
     * Darke; Fairfield; Fayette; Franklin; Gallia; Greene; Guernsey; Hamilton; Highland; Hocking; Jackson; Lawrence;
     * Licking; Madison; Meigs; Miami; Monroe; Montgomery; Morgan; Muskingum; Noble; Perry; Pickaway; Pike; Preble;
     * Ross; Scioto; Vinton; Warren; Washington
     * State law defines use of US survey feet. See code 3729 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_OHIO_SOUTH = 'urn:ogc:def:crs:EPSG::3638';

    /**
     * NAD83(NSRS2007) / Ohio South (ftUS)
     * Extent: USA - Ohio - counties of Adams; Athens; Belmont; Brown; Butler; Champaign; Clark; Clermont; Clinton;
     * Darke; Fairfield; Fayette; Franklin; Gallia; Greene; Guernsey; Hamilton; Highland; Hocking; Jackson; Lawrence;
     * Licking; Madison; Meigs; Miami; Monroe; Montgomery; Morgan; Muskingum; Noble; Perry; Pickaway; Pike; Preble;
     * Ross; Scioto; Vinton; Warren; Washington
     * State law defines use of US survey feet. Federal definition is metric - see code 3638. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_OHIO_SOUTH_FTUS = 'urn:ogc:def:crs:EPSG::3729';

    /**
     * NAD83(NSRS2007) / Oklahoma North
     * Extent: USA - Oklahoma - counties of Adair; Alfalfa; Beaver; Blaine; Canadian; Cherokee; Cimarron; Craig; Creek;
     * Custer; Delaware; Dewey; Ellis; Garfield; Grant; Harper; Kay; Kingfisher; Lincoln; Logan; Major; Mayes;
     * Muskogee; Noble; Nowata; Okfuskee; Oklahoma; Okmulgee; Osage; Ottawa; Pawnee; Payne; Roger Mills; Rogers;
     * Sequoyah; Texas; Tulsa; Wagoner; Washington; Woods; Woodward
     * State law defines use of US survey feet. See code 3640 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_OKLAHOMA_NORTH = 'urn:ogc:def:crs:EPSG::3639';

    /**
     * NAD83(NSRS2007) / Oklahoma North (ftUS)
     * Extent: USA - Oklahoma - counties of Adair; Alfalfa; Beaver; Blaine; Canadian; Cherokee; Cimarron; Craig; Creek;
     * Custer; Delaware; Dewey; Ellis; Garfield; Grant; Harper; Kay; Kingfisher; Lincoln; Logan; Major; Mayes;
     * Muskogee; Noble; Nowata; Okfuskee; Oklahoma; Okmulgee; Osage; Ottawa; Pawnee; Payne; Roger Mills; Rogers;
     * Sequoyah; Texas; Tulsa; Wagoner; Washington; Woods; Woodward
     * State law defines use of US survey feet. Federal definition is metric - see code 3639. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_OKLAHOMA_NORTH_FTUS = 'urn:ogc:def:crs:EPSG::3640';

    /**
     * NAD83(NSRS2007) / Oklahoma South
     * Extent: USA - Oklahoma - counties of Atoka; Beckham; Bryan; Caddo; Carter; Choctaw; Cleveland; Coal; Comanche;
     * Cotton; Garvin; Grady; Greer; Harmon; Haskell; Hughes; Jackson; Jefferson; Johnston; Kiowa; Latimer; Le Flore;
     * Love; Marshall; McClain; McCurtain; McIntosh; Murray; Pittsburg; Pontotoc; Pottawatomie; Pushmataha; Seminole;
     * Stephens; Tillman; Washita
     * State law defines use of US survey feet. See code 3642 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_OKLAHOMA_SOUTH = 'urn:ogc:def:crs:EPSG::3641';

    /**
     * NAD83(NSRS2007) / Oklahoma South (ftUS)
     * Extent: USA - Oklahoma - counties of Atoka; Beckham; Bryan; Caddo; Carter; Choctaw; Cleveland; Coal; Comanche;
     * Cotton; Garvin; Grady; Greer; Harmon; Haskell; Hughes; Jackson; Jefferson; Johnston; Kiowa; Latimer; Le Flore;
     * Love; Marshall; McClain; McCurtain; McIntosh; Murray; Pittsburg; Pontotoc; Pottawatomie; Pushmataha; Seminole;
     * Stephens; Tillman; Washita
     * State law defines use of US survey feet. Federal definition is metric - see code 3641. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_OKLAHOMA_SOUTH_FTUS = 'urn:ogc:def:crs:EPSG::3642';

    /**
     * NAD83(NSRS2007) / Oregon GIC Lambert (ft)
     * Extent: USA - Oregon
     * State law defines use of International feet (note: not US survey feet). Replaces NAD83(HARN) / Oregon GIC
     * Lambert (ft) (CRS code 2994). Replaced by NAD83(2011) / Oregon GIC Lambert (ft) (CRS code 6557).
     */
    public const EPSG_NAD83_NSRS2007_OREGON_GIC_LAMBERT_FT = 'urn:ogc:def:crs:EPSG::3644';

    /**
     * NAD83(NSRS2007) / Oregon LCC (m)
     * Extent: USA - Oregon
     * See CRS code 3644 for non-metric definition used by state agencies. Replaces NAD83(HARN) / Oregon LCC (m) (CRS
     * code 2993). Replaced by NAD83(2011) / Oregon LCC (m) (CRS code 6556).
     */
    public const EPSG_NAD83_NSRS2007_OREGON_LCC_M = 'urn:ogc:def:crs:EPSG::3643';

    /**
     * NAD83(NSRS2007) / Oregon North
     * Extent: USA - Oregon - counties of Baker; Benton; Clackamas; Clatsop; Columbia; Gilliam; Grant; Hood River;
     * Jefferson; Lincoln; Linn; Marion; Morrow; Multnomah; Polk; Sherman; Tillamook; Umatilla; Union; Wallowa; Wasco;
     * Washington; Wheeler; Yamhill
     * State law defines use of International feet (note: not US survey feet). See code 3646 for equivalent non-metric
     * definition. Replaces NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_OREGON_NORTH = 'urn:ogc:def:crs:EPSG::3645';

    /**
     * NAD83(NSRS2007) / Oregon North (ft)
     * Extent: USA - Oregon - counties of Baker; Benton; Clackamas; Clatsop; Columbia; Gilliam; Grant; Hood River;
     * Jefferson; Lincoln; Linn; Marion; Morrow; Multnomah; Polk; Sherman; Tillamook; Umatilla; Union; Wallowa; Wasco;
     * Washington; Wheeler; Yamhill
     * State law defines use of International feet (note: not US survey feet). Federal definition is metric - see code
     * 3645. Replaces NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_OREGON_NORTH_FT = 'urn:ogc:def:crs:EPSG::3646';

    /**
     * NAD83(NSRS2007) / Oregon South
     * Extent: USA - Oregon - counties of Coos; Crook; Curry; Deschutes; Douglas; Harney; Jackson; Josephine; Klamath;
     * Lake; Lane; Malheur
     * State law defines use of International feet (note: not US survey feet). See code 3648 for equivalent non-metric
     * definition. Replaces NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_OREGON_SOUTH = 'urn:ogc:def:crs:EPSG::3647';

    /**
     * NAD83(NSRS2007) / Oregon South (ft)
     * Extent: USA - Oregon - counties of Coos; Crook; Curry; Deschutes; Douglas; Harney; Jackson; Josephine; Klamath;
     * Lake; Lane; Malheur
     * State law defines use of International feet (note: not US survey feet). Federal definition is metric - see code
     * 3647. Replaces NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_OREGON_SOUTH_FT = 'urn:ogc:def:crs:EPSG::3648';

    /**
     * NAD83(NSRS2007) / Pennsylvania North
     * Extent: USA - Pennsylvania - counties of Bradford; Cameron; Carbon; Centre; Clarion; Clearfield; Clinton;
     * Columbia; Crawford; Elk; Erie; Forest; Jefferson; Lackawanna; Luzerne; Lycoming; McKean; Mercer; Monroe;
     * Montour; Northumberland; Pike; Potter; Sullivan; Susquehanna; Tioga; Union; Venango; Warren; Wayne; Wyoming
     * State law defines use of US survey feet. See code 3650 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_PENNSYLVANIA_NORTH = 'urn:ogc:def:crs:EPSG::3649';

    /**
     * NAD83(NSRS2007) / Pennsylvania North (ftUS)
     * Extent: USA - Pennsylvania - counties of Bradford; Cameron; Carbon; Centre; Clarion; Clearfield; Clinton;
     * Columbia; Crawford; Elk; Erie; Forest; Jefferson; Lackawanna; Luzerne; Lycoming; McKean; Mercer; Monroe;
     * Montour; Northumberland; Pike; Potter; Sullivan; Susquehanna; Tioga; Union; Venango; Warren; Wayne; Wyoming
     * State law defines use of US survey feet. Federal definition is metric - see code 3649. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_PENNSYLVANIA_NORTH_FTUS = 'urn:ogc:def:crs:EPSG::3650';

    /**
     * NAD83(NSRS2007) / Pennsylvania South
     * Extent: USA - Pennsylvania - counties of Adams; Allegheny; Armstrong; Beaver; Bedford; Berks; Blair; Bucks;
     * Butler; Cambria; Chester; Cumberland; Dauphin; Delaware; Fayette; Franklin; Fulton; Greene; Huntingdon; Indiana;
     * Juniata; Lancaster; Lawrence; Lebanon; Lehigh; Mifflin; Montgomery; Northampton; Perry; Philadelphia;
     * Schuylkill; Snyder; Somerset; Washington; Westmoreland; York
     * State law defines use of US survey feet. See code 3652 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_PENNSYLVANIA_SOUTH = 'urn:ogc:def:crs:EPSG::3651';

    /**
     * NAD83(NSRS2007) / Pennsylvania South (ftUS)
     * Extent: USA - Pennsylvania - counties of Adams; Allegheny; Armstrong; Beaver; Bedford; Berks; Blair; Bucks;
     * Butler; Cambria; Chester; Cumberland; Dauphin; Delaware; Fayette; Franklin; Fulton; Greene; Huntingdon; Indiana;
     * Juniata; Lancaster; Lawrence; Lebanon; Lehigh; Mifflin; Montgomery; Northampton; Perry; Philadelphia;
     * Schuylkill; Snyder; Somerset; Washington; Westmoreland; York
     * State law defines use of US survey feet. Federal definition is metric - see code 3651. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_PENNSYLVANIA_SOUTH_FTUS = 'urn:ogc:def:crs:EPSG::3652';

    /**
     * NAD83(NSRS2007) / Puerto Rico and Virgin Is.
     * Extent: Puerto Rico and US Virgin Islands - onshore
     * Replaces NAD83(HARN) / SPCS (CRS code 2866).
     */
    public const EPSG_NAD83_NSRS2007_PUERTO_RICO_AND_VIRGIN_IS = 'urn:ogc:def:crs:EPSG::4437';

    /**
     * NAD83(NSRS2007) / Rhode Island
     * Extent: USA - Rhode Island
     * State law defines use of US survey feet. See code 3654 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_RHODE_ISLAND = 'urn:ogc:def:crs:EPSG::3653';

    /**
     * NAD83(NSRS2007) / Rhode Island (ftUS)
     * Extent: USA - Rhode Island
     * State law defines use of US survey feet. Federal definition is metric - see code 3653. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_RHODE_ISLAND_FTUS = 'urn:ogc:def:crs:EPSG::3654';

    /**
     * NAD83(NSRS2007) / South Carolina
     * Extent: USA - South Carolina
     * State law defines use of International feet (note: not US survey feet). See code 3656 for equivalent non-metric
     * definition. Replaces NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_SOUTH_CAROLINA = 'urn:ogc:def:crs:EPSG::3655';

    /**
     * NAD83(NSRS2007) / South Carolina (ft)
     * Extent: USA - South Carolina
     * State law defines use of International feet (note: not US survey feet). Federal definition is metric - see code
     * 3655. Replaces NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_SOUTH_CAROLINA_FT = 'urn:ogc:def:crs:EPSG::3656';

    /**
     * NAD83(NSRS2007) / South Dakota North
     * Extent: USA - South Dakota - counties of Beadle; Brookings; Brown; Butte; Campbell; Clark; Codington; Corson;
     * Day; Deuel; Dewey; Edmunds; Faulk; Grant; Hamlin; Hand; Harding; Hyde; Kingsbury; Lawrence; Marshall; McPherson;
     * Meade; Perkins; Potter; Roberts; Spink; Sully; Walworth; Ziebach
     * State law defines use of US survey feet. See code 3658 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_SOUTH_DAKOTA_NORTH = 'urn:ogc:def:crs:EPSG::3657';

    /**
     * NAD83(NSRS2007) / South Dakota North (ftUS)
     * Extent: USA - South Dakota - counties of Beadle; Brookings; Brown; Butte; Campbell; Clark; Codington; Corson;
     * Day; Deuel; Dewey; Edmunds; Faulk; Grant; Hamlin; Hand; Harding; Hyde; Kingsbury; Lawrence; Marshall; McPherson;
     * Meade; Perkins; Potter; Roberts; Spink; Sully; Walworth; Ziebach
     * State law defines use of US survey feet. Federal definition is metric - see code 3657. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_SOUTH_DAKOTA_NORTH_FTUS = 'urn:ogc:def:crs:EPSG::3658';

    /**
     * NAD83(NSRS2007) / South Dakota South
     * Extent: USA - South Dakota - counties of Aurora; Bennett; Bon Homme; Brule; Buffalo; Charles Mix; Clay; Custer;
     * Davison; Douglas; Fall River; Gregory; Haakon; Hanson; Hughes; Hutchinson; Jackson; Jerauld; Jones; Lake;
     * Lincoln; Lyman; McCook; Mellette; Miner; Minnehaha; Moody; Pennington; Sanborn; Shannon; Stanley; Todd; Tripp;
     * Turner; Union; Yankton
     * State law defines use of US survey feet. See code 3660 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_SOUTH_DAKOTA_SOUTH = 'urn:ogc:def:crs:EPSG::3659';

    /**
     * NAD83(NSRS2007) / South Dakota South (ftUS)
     * Extent: USA - South Dakota - counties of Aurora; Bennett; Bon Homme; Brule; Buffalo; Charles Mix; Clay; Custer;
     * Davison; Douglas; Fall River; Gregory; Haakon; Hanson; Hughes; Hutchinson; Jackson; Jerauld; Jones; Lake;
     * Lincoln; Lyman; McCook; Mellette; Miner; Minnehaha; Moody; Pennington; Sanborn; Shannon; Stanley; Todd; Tripp;
     * Turner; Union; Yankton
     * State law defines use of US survey feet. Federal definition is metric - see code 3659. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_SOUTH_DAKOTA_SOUTH_FTUS = 'urn:ogc:def:crs:EPSG::3660';

    /**
     * NAD83(NSRS2007) / Tennessee
     * Extent: USA - Tennessee
     * State law defines use of US survey feet. See code 3662 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_TENNESSEE = 'urn:ogc:def:crs:EPSG::3661';

    /**
     * NAD83(NSRS2007) / Tennessee (ftUS)
     * Extent: USA - Tennessee
     * State law defines use of US survey feet. Federal definition is metric - see code 3661. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_TENNESSEE_FTUS = 'urn:ogc:def:crs:EPSG::3662';

    /**
     * NAD83(NSRS2007) / Texas Central
     * Extent: USA - Texas - counties of Anderson; Angelina; Bastrop; Bell; Blanco; Bosque; Brazos; Brown; Burleson;
     * Burnet; Cherokee; Coke; Coleman; Comanche; Concho; Coryell; Crane; Crockett; Culberson; Ector; El Paso; Falls;
     * Freestone; Gillespie; Glasscock; Grimes; Hamilton; Hardin; Houston; Hudspeth; Irion; Jasper; Jeff Davis; Kimble;
     * Lampasas; Lee; Leon; Liberty; Limestone; Llano; Loving; Madison; Mason; McCulloch; McLennan; Menard; Midland;
     * Milam; Mills; Montgomery; Nacogdoches; Newton; Orange; Pecos; Polk; Reagan; Reeves; Robertson; Runnels; Sabine;
     * San Augustine; San Jacinto; San Saba; Schleicher; Shelby; Sterling; Sutton; Tom Green; Travis; Trinity; Tyler;
     * Upton; Walker; Ward; Washington; Williamson; Winkler
     * State law defines use of US survey feet. See code 3664 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_TEXAS_CENTRAL = 'urn:ogc:def:crs:EPSG::3663';

    /**
     * NAD83(NSRS2007) / Texas Central (ftUS)
     * Extent: USA - Texas - counties of Anderson; Angelina; Bastrop; Bell; Blanco; Bosque; Brazos; Brown; Burleson;
     * Burnet; Cherokee; Coke; Coleman; Comanche; Concho; Coryell; Crane; Crockett; Culberson; Ector; El Paso; Falls;
     * Freestone; Gillespie; Glasscock; Grimes; Hamilton; Hardin; Houston; Hudspeth; Irion; Jasper; Jeff Davis; Kimble;
     * Lampasas; Lee; Leon; Liberty; Limestone; Llano; Loving; Madison; Mason; McCulloch; McLennan; Menard; Midland;
     * Milam; Mills; Montgomery; Nacogdoches; Newton; Orange; Pecos; Polk; Reagan; Reeves; Robertson; Runnels; Sabine;
     * San Augustine; San Jacinto; San Saba; Schleicher; Shelby; Sterling; Sutton; Tom Green; Travis; Trinity; Tyler;
     * Upton; Walker; Ward; Washington; Williamson; Winkler
     * State law defines use of US survey feet. Federal definition is metric - see code 3663. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_TEXAS_CENTRAL_FTUS = 'urn:ogc:def:crs:EPSG::3664';

    /**
     * NAD83(NSRS2007) / Texas Centric Albers Equal Area
     * Extent: USA - Texas
     * Replaces NAD83(HARN) / TX Albers (CRS code 3085). Replaced by NAD83(2011) / TX Albers (CRS code 6579). For
     * state-wide spatial data presentation requiring shape preservation use NAD83(NSRS2007) / TX LC (CRS code 3666).
     */
    public const EPSG_NAD83_NSRS2007_TEXAS_CENTRIC_ALBERS_EQUAL_AREA = 'urn:ogc:def:crs:EPSG::3665';

    /**
     * NAD83(NSRS2007) / Texas Centric Lambert Conformal
     * Extent: USA - Texas
     * Replaces NAD83(HARN) / TX LC (CRS code 3084). Replaced by NAD83(2011) / TX  LC (CRS code 3666). For state-wide
     * spatial data presentation requiring true area measurements use NAD83(NSRS2007) / TX Albers (CRS code 3665).
     */
    public const EPSG_NAD83_NSRS2007_TEXAS_CENTRIC_LAMBERT_CONFORMAL = 'urn:ogc:def:crs:EPSG::3666';

    /**
     * NAD83(NSRS2007) / Texas North
     * Extent: USA - Texas - counties of: Armstrong; Briscoe; Carson; Castro; Childress; Collingsworth; Dallam; Deaf
     * Smith; Donley; Gray; Hall; Hansford; Hartley; Hemphill; Hutchinson; Lipscomb; Moore; Ochiltree; Oldham; Parmer;
     * Potter; Randall; Roberts; Sherman; Swisher; Wheeler
     * State law defines use of US survey feet. See code 3668 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_TEXAS_NORTH = 'urn:ogc:def:crs:EPSG::3667';

    /**
     * NAD83(NSRS2007) / Texas North Central
     * Extent: USA - Texas - counties of: Andrews; Archer; Bailey; Baylor; Borden; Bowie; Callahan; Camp; Cass; Clay;
     * Cochran; Collin; Cooke; Cottle; Crosby; Dallas; Dawson; Delta; Denton; Dickens; Eastland; Ellis; Erath; Fannin;
     * Fisher; Floyd; Foard; Franklin; Gaines; Garza; Grayson; Gregg; Hale; Hardeman; Harrison; Haskell; Henderson;
     * Hill; Hockley; Hood; Hopkins; Howard; Hunt; Jack; Johnson; Jones; Kaufman; Kent; King; Knox; Lamar; Lamb;
     * Lubbock; Lynn; Marion; Martin; Mitchell; Montague; Morris; Motley; Navarro; Nolan; Palo Pinto; Panola; Parker;
     * Rains; Red River; Rockwall; Rusk; Scurry; Shackelford; Smith; Somervell; Stephens; Stonewall; Tarrant; Taylor;
     * Terry; Throckmorton; Titus; Upshur; Van Zandt; Wichita; Wilbarger; Wise; Wood; Yoakum; Young
     * State law defines use of US survey feet. See code 3670 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_TEXAS_NORTH_CENTRAL = 'urn:ogc:def:crs:EPSG::3669';

    /**
     * NAD83(NSRS2007) / Texas North Central (ftUS)
     * Extent: USA - Texas - counties of: Andrews; Archer; Bailey; Baylor; Borden; Bowie; Callahan; Camp; Cass; Clay;
     * Cochran; Collin; Cooke; Cottle; Crosby; Dallas; Dawson; Delta; Denton; Dickens; Eastland; Ellis; Erath; Fannin;
     * Fisher; Floyd; Foard; Franklin; Gaines; Garza; Grayson; Gregg; Hale; Hardeman; Harrison; Haskell; Henderson;
     * Hill; Hockley; Hood; Hopkins; Howard; Hunt; Jack; Johnson; Jones; Kaufman; Kent; King; Knox; Lamar; Lamb;
     * Lubbock; Lynn; Marion; Martin; Mitchell; Montague; Morris; Motley; Navarro; Nolan; Palo Pinto; Panola; Parker;
     * Rains; Red River; Rockwall; Rusk; Scurry; Shackelford; Smith; Somervell; Stephens; Stonewall; Tarrant; Taylor;
     * Terry; Throckmorton; Titus; Upshur; Van Zandt; Wichita; Wilbarger; Wise; Wood; Yoakum; Young
     * State law defines use of US survey feet. Federal definition is metric - see code 3669. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_TEXAS_NORTH_CENTRAL_FTUS = 'urn:ogc:def:crs:EPSG::3670';

    /**
     * NAD83(NSRS2007) / Texas North (ftUS)
     * Extent: USA - Texas - counties of: Armstrong; Briscoe; Carson; Castro; Childress; Collingsworth; Dallam; Deaf
     * Smith; Donley; Gray; Hall; Hansford; Hartley; Hemphill; Hutchinson; Lipscomb; Moore; Ochiltree; Oldham; Parmer;
     * Potter; Randall; Roberts; Sherman; Swisher; Wheeler
     * State law defines use of US survey feet. Federal definition is metric - see code 3667. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_TEXAS_NORTH_FTUS = 'urn:ogc:def:crs:EPSG::3668';

    /**
     * NAD83(NSRS2007) / Texas South
     * Extent: USA - Texas - counties of Brooks; Cameron; Duval; Hidalgo; Jim Hogg; Jim Wells; Kenedy; Kleberg; Nueces;
     * San Patricio; Starr; Webb; Willacy; Zapata
     * State law defines use of US survey feet. See code 3672 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_TEXAS_SOUTH = 'urn:ogc:def:crs:EPSG::3671';

    /**
     * NAD83(NSRS2007) / Texas South Central
     * Extent: USA - Texas - counties of Aransas; Atascosa; Austin; Bandera; Bee; Bexar; Brazoria; Brewster; Caldwell;
     * Calhoun; Chambers; Colorado; Comal; De Witt; Dimmit; Edwards; Fayette; Fort Bend; Frio; Galveston; Goliad;
     * Gonzales; Guadalupe; Harris; Hays; Jackson; Jefferson; Karnes; Kendall; Kerr; Kinney; La Salle; Lavaca; Live
     * Oak; Matagorda; Maverick; McMullen; Medina; Presidio; Real; Refugio; Terrell; Uvalde; Val Verde; Victoria;
     * Waller; Wharton; Wilson; Zavala
     * State law defines use of US survey feet. See code 3764 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_TEXAS_SOUTH_CENTRAL = 'urn:ogc:def:crs:EPSG::3673';

    /**
     * NAD83(NSRS2007) / Texas South Central (ftUS)
     * Extent: USA - Texas - counties of Aransas; Atascosa; Austin; Bandera; Bee; Bexar; Brazoria; Brewster; Caldwell;
     * Calhoun; Chambers; Colorado; Comal; De Witt; Dimmit; Edwards; Fayette; Fort Bend; Frio; Galveston; Goliad;
     * Gonzales; Guadalupe; Harris; Hays; Jackson; Jefferson; Karnes; Kendall; Kerr; Kinney; La Salle; Lavaca; Live
     * Oak; Matagorda; Maverick; McMullen; Medina; Presidio; Real; Refugio; Terrell; Uvalde; Val Verde; Victoria;
     * Waller; Wharton; Wilson; Zavala
     * State law defines use of US survey feet. Federal definition is metric - see code 3673. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_TEXAS_SOUTH_CENTRAL_FTUS = 'urn:ogc:def:crs:EPSG::3674';

    /**
     * NAD83(NSRS2007) / Texas South (ftUS)
     * Extent: USA - Texas - counties of Brooks; Cameron; Duval; Hidalgo; Jim Hogg; Jim Wells; Kenedy; Kleberg; Nueces;
     * San Patricio; Starr; Webb; Willacy; Zapata
     * State law defines use of US survey feet. Federal definition is metric - see code 3671. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_TEXAS_SOUTH_FTUS = 'urn:ogc:def:crs:EPSG::3672';

    /**
     * NAD83(NSRS2007) / Utah Central
     * Extent: USA - Utah - counties of Carbon; Duchesne; Emery; Grand; Juab; Millard; Salt Lake; Sanpete; Sevier;
     * Tooele; Uintah; Utah; Wasatch
     * State law of 2009 defines use of US survey feet: see CRS code 3677 for equivalent non-metric definition. An
     * earlier law of 1988 defining use of International foot was withdrawn in 2001. Replaces NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_UTAH_CENTRAL = 'urn:ogc:def:crs:EPSG::3675';

    /**
     * NAD83(NSRS2007) / Utah Central (ft)
     * Extent: USA - Utah - counties of Carbon; Duchesne; Emery; Grand; Juab; Millard; Salt Lake; Sanpete; Sevier;
     * Tooele; Uintah; Utah; Wasatch
     * State law of 1988 defining use of International feet was withdrawn in 2001. State law of 2009 defines use of US
     * survey feet: see CRS code 3677. Federal definition is metric - see code 3675. Replaces NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_UTAH_CENTRAL_FT = 'urn:ogc:def:crs:EPSG::3676';

    /**
     * NAD83(NSRS2007) / Utah Central (ftUS)
     * Extent: USA - Utah - counties of Carbon; Duchesne; Emery; Grand; Juab; Millard; Salt Lake; Sanpete; Sevier;
     * Tooele; Uintah; Utah; Wasatch
     * State law defining use of International feet (note: not US survey feet) has been withdrawn. Federal definition
     * is metric - see code 3675. Replaces NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_UTAH_CENTRAL_FTUS = 'urn:ogc:def:crs:EPSG::3677';

    /**
     * NAD83(NSRS2007) / Utah North
     * Extent: USA - Utah - counties of Box Elder; Cache; Daggett; Davis; Morgan; Rich; Summit; Weber
     * State law of 2009 defines use of US survey feet: see CRS code 3680 for equivalent non-metric definition. An
     * earlier law of 1988 defining use of International foot was withdrawn in 2001. Replaces NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_UTAH_NORTH = 'urn:ogc:def:crs:EPSG::3678';

    /**
     * NAD83(NSRS2007) / Utah North (ft)
     * Extent: USA - Utah - counties of Box Elder; Cache; Daggett; Davis; Morgan; Rich; Summit; Weber
     * State law of 1988 defining use of International feet was withdrawn in 2001. State law of 2009 defines use of US
     * survey feet: see CRS code 3680. Federal definition is metric - see code 3678. Replaces NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_UTAH_NORTH_FT = 'urn:ogc:def:crs:EPSG::3679';

    /**
     * NAD83(NSRS2007) / Utah North (ftUS)
     * Extent: USA - Utah - counties of Box Elder; Cache; Daggett; Davis; Morgan; Rich; Summit; Weber
     * State law defining use of International feet (note: not US survey feet) has been withdrawn. Federal definition
     * is metric - see code 3678. Replaces NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_UTAH_NORTH_FTUS = 'urn:ogc:def:crs:EPSG::3680';

    /**
     * NAD83(NSRS2007) / Utah South
     * Extent: USA - Utah - counties of Beaver; Garfield; Iron; Kane; Piute; San Juan; Washington; Wayne
     * State law of 2009 defines use of US survey feet: see CRS code 3683 for equivalent non-metric definition. An
     * earlier law of 1988 defining use of International foot was withdrawn in 2001. Replaces NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_UTAH_SOUTH = 'urn:ogc:def:crs:EPSG::3681';

    /**
     * NAD83(NSRS2007) / Utah South (ft)
     * Extent: USA - Utah - counties of Beaver; Garfield; Iron; Kane; Piute; San Juan; Washington; Wayne
     * State law of 1988 defining use of International feet was withdrawn in 2001. State law of 2009 defines use of US
     * survey feet: see CRS code 3683. Federal definition is metric - see code 3681. Replaces NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_UTAH_SOUTH_FT = 'urn:ogc:def:crs:EPSG::3682';

    /**
     * NAD83(NSRS2007) / Utah South (ftUS)
     * Extent: USA - Utah - counties of Beaver; Garfield; Iron; Kane; Piute; San Juan; Washington; Wayne
     * State law defining use of International feet (note: not US survey feet) has been withdrawn. Federal definition
     * is metric - see code 3681. Replaces NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_UTAH_SOUTH_FTUS = 'urn:ogc:def:crs:EPSG::3683';

    /**
     * NAD83(NSRS2007) / UTM zone 10N
     * Extent: USA - between 126°W and 120°W - California; Oregon; Washington
     * Replaces NAD83(HARN) / UTM zone 10N.
     */
    public const EPSG_NAD83_NSRS2007_UTM_ZONE_10N = 'urn:ogc:def:crs:EPSG::3717';

    /**
     * NAD83(NSRS2007) / UTM zone 11N
     * Extent: USA - between 120°W and 114°W - California, Idaho, Nevada, Oregon, Washington
     * Replaces NAD83(HARN) / UTM zone 11N.
     */
    public const EPSG_NAD83_NSRS2007_UTM_ZONE_11N = 'urn:ogc:def:crs:EPSG::3718';

    /**
     * NAD83(NSRS2007) / UTM zone 12N
     * Extent: USA - between 114°W and 108°W - Arizona; Colorado; Idaho; Montana; New Mexico; Utah; Wyoming
     * Replaces NAD83(HARN) / UTM zone 12N.
     */
    public const EPSG_NAD83_NSRS2007_UTM_ZONE_12N = 'urn:ogc:def:crs:EPSG::3719';

    /**
     * NAD83(NSRS2007) / UTM zone 13N
     * Extent: USA - between 108°W and 102°W - Colorado; Montana; Nebraska; New Mexico; North Dakota; Oklahoma; South
     * Dakota; Texas; Wyoming
     * Replaces NAD83(HARN) / UTM zone 13N.
     */
    public const EPSG_NAD83_NSRS2007_UTM_ZONE_13N = 'urn:ogc:def:crs:EPSG::3720';

    /**
     * NAD83(NSRS2007) / UTM zone 14N
     * Extent: USA - between 102°W and 96°W - Iowa; Kansas; Minnesota; Nebraska; North Dakota; Oklahoma; South
     * Dakota; Texas
     * Replaces NAD83(HARN) / UTM zone 14N.
     */
    public const EPSG_NAD83_NSRS2007_UTM_ZONE_14N = 'urn:ogc:def:crs:EPSG::3721';

    /**
     * NAD83(NSRS2007) / UTM zone 15N
     * Extent: USA - between 96°W and 90°W - Arkansas; Illinois; Iowa; Kansas; Louisiana; Michigan; Minnesota;
     * Mississippi; Missouri; Nebraska; Oklahoma; Tennessee; Texas; Wisconsin
     * Replaces NAD83(HARN) / UTM zone 15N.
     */
    public const EPSG_NAD83_NSRS2007_UTM_ZONE_15N = 'urn:ogc:def:crs:EPSG::3722';

    /**
     * NAD83(NSRS2007) / UTM zone 16N
     * Extent: USA - between 90°W and 84°W - Alabama; Arkansas; Florida; Georgia; Indiana; Illinois; Kentucky;
     * Louisiana; Michigan; Minnesota; Mississippi; Missouri; North Carolina; Ohio; Tennessee; Wisconsin
     * Replaces NAD83(HARN) / UTM zone 16N.
     */
    public const EPSG_NAD83_NSRS2007_UTM_ZONE_16N = 'urn:ogc:def:crs:EPSG::3723';

    /**
     * NAD83(NSRS2007) / UTM zone 17N
     * Extent: USA - between 84°W and 78°W - Florida; Georgia; Kentucky; Maryland; Michigan; New York; North
     * Carolina; Ohio; Pennsylvania; South Carolina; Tennessee; Virginia; West Virginia
     * Replaces NAD83(HARN) / UTM zone 17N.
     */
    public const EPSG_NAD83_NSRS2007_UTM_ZONE_17N = 'urn:ogc:def:crs:EPSG::3724';

    /**
     * NAD83(NSRS2007) / UTM zone 18N
     * Extent: USA - between 78°W and 72°W - Connecticut; Delaware; District of Columbia (DC); Maryland;
     * Massachusetts; New Hampshire; New Jersey; New York; North Carolina; Pennsylvania; Virginia; Vermont
     * Replaces NAD83(HARN) / UTM zone 18N.
     */
    public const EPSG_NAD83_NSRS2007_UTM_ZONE_18N = 'urn:ogc:def:crs:EPSG::3725';

    /**
     * NAD83(NSRS2007) / UTM zone 19N
     * Extent: USA - between 72°W and 66°W - Connecticut; Maine; Massachusetts; New Hampshire; New York (Long
     * Island); Rhode Island; Vermont
     * Replaces NAD83(HARN) / UTM zone 19N.
     */
    public const EPSG_NAD83_NSRS2007_UTM_ZONE_19N = 'urn:ogc:def:crs:EPSG::3726';

    /**
     * NAD83(NSRS2007) / UTM zone 1N
     * Extent: USA - between 180°W and 174°W - Alaska and offshore continental shelf (OCS)
     * For applications with an accuracy of better than 1m, replaces NAD83 / UTM zone 1N.
     */
    public const EPSG_NAD83_NSRS2007_UTM_ZONE_1N = 'urn:ogc:def:crs:EPSG::3708';

    /**
     * NAD83(NSRS2007) / UTM zone 2N
     * Extent: USA - between 174°W and 168°W - Alaska and offshore continental shelf (OCS)
     * For applications with an accuracy of better than 1m, replaces NAD83 / UTM zone 2N.
     */
    public const EPSG_NAD83_NSRS2007_UTM_ZONE_2N = 'urn:ogc:def:crs:EPSG::3709';

    /**
     * NAD83(NSRS2007) / UTM zone 3N
     * Extent: USA - between 168°W and 162°W - Alaska and offshore continental shelf (OCS)
     * For applications with an accuracy of better than 1m, replaces NAD83 / UTM zone 3N.
     */
    public const EPSG_NAD83_NSRS2007_UTM_ZONE_3N = 'urn:ogc:def:crs:EPSG::3710';

    /**
     * NAD83(NSRS2007) / UTM zone 4N
     * Extent: USA - between 162°W and 156°W - Alaska and offshore continental shelf (OCS)
     * For applications with an accuracy of better than 1m, replaces NAD83 / UTM zone 4N.
     */
    public const EPSG_NAD83_NSRS2007_UTM_ZONE_4N = 'urn:ogc:def:crs:EPSG::3711';

    /**
     * NAD83(NSRS2007) / UTM zone 59N
     * Extent: USA - west of 174°E. Alaska and offshore continental shelf (OCS)
     * For applications with an accuracy of better than 1m, replaces NAD83 / UTM zone 59N.
     */
    public const EPSG_NAD83_NSRS2007_UTM_ZONE_59N = 'urn:ogc:def:crs:EPSG::3706';

    /**
     * NAD83(NSRS2007) / UTM zone 5N
     * Extent: USA - between 156°W and 150°W - Alaska and offshore continental shelf (OCS)
     * For applications with an accuracy of better than 1m, replaces NAD83 / UTM zone 5N.
     */
    public const EPSG_NAD83_NSRS2007_UTM_ZONE_5N = 'urn:ogc:def:crs:EPSG::3712';

    /**
     * NAD83(NSRS2007) / UTM zone 60N
     * Extent: USA - between 174°E and 180°E - Alaska and offshore continental shelf (OCS)
     * For applications with an accuracy of better than 1m, replaces NAD83 / UTM zone 60N.
     */
    public const EPSG_NAD83_NSRS2007_UTM_ZONE_60N = 'urn:ogc:def:crs:EPSG::3707';

    /**
     * NAD83(NSRS2007) / UTM zone 6N
     * Extent: USA - between 150°W and 144°W - Alaska and offshore continental shelf (OCS)
     * For applications with an accuracy of better than 1m, replaces NAD83 / UTM zone 6N.
     */
    public const EPSG_NAD83_NSRS2007_UTM_ZONE_6N = 'urn:ogc:def:crs:EPSG::3713';

    /**
     * NAD83(NSRS2007) / UTM zone 7N
     * Extent: USA - between 144°W and 138°W - Alaska
     * For applications with an accuracy of better than 1m, replaces NAD83 / UTM zone 7N.
     */
    public const EPSG_NAD83_NSRS2007_UTM_ZONE_7N = 'urn:ogc:def:crs:EPSG::3714';

    /**
     * NAD83(NSRS2007) / UTM zone 8N
     * Extent: USA - between 138°W and 132°W - Alaska
     * For applications with an accuracy of better than 1m, replaces NAD83 / UTM zone 8N.
     */
    public const EPSG_NAD83_NSRS2007_UTM_ZONE_8N = 'urn:ogc:def:crs:EPSG::3715';

    /**
     * NAD83(NSRS2007) / UTM zone 9N
     * Extent: USA - between 132°W and 126°W - Alaska
     * For applications with an accuracy of better than 1m, replaces NAD83 / UTM zone 9N.
     */
    public const EPSG_NAD83_NSRS2007_UTM_ZONE_9N = 'urn:ogc:def:crs:EPSG::3716';

    /**
     * NAD83(NSRS2007) / Vermont
     * Extent: USA - Vermont
     * State law defines use of US survey feet. See code 5655 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_VERMONT = 'urn:ogc:def:crs:EPSG::3684';

    /**
     * NAD83(NSRS2007) / Vermont (ftUS)
     * Extent: USA - Vermont
     * State law defines use of US survey feet. Federal definition is metric - see code 3684. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_VERMONT_FTUS = 'urn:ogc:def:crs:EPSG::5655';

    /**
     * NAD83(NSRS2007) / Virginia Lambert
     * Extent: USA - Virginia
     * Replaces NAD83(HARN) / Virginia Lambert (CRS code 3969).
     */
    public const EPSG_NAD83_NSRS2007_VIRGINIA_LAMBERT = 'urn:ogc:def:crs:EPSG::3970';

    /**
     * NAD83(NSRS2007) / Virginia North
     * Extent: USA - Virginia - counties of Arlington; Augusta; Bath; Caroline; Clarke; Culpeper; Fairfax; Fauquier;
     * Frederick; Greene; Highland; King George; Loudoun; Madison; Orange; Page; Prince William; Rappahannock;
     * Rockingham; Shenandoah; Spotsylvania; Stafford; Warren; Westmoreland
     * State law defines use of US survey feet. See code 3686 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_VIRGINIA_NORTH = 'urn:ogc:def:crs:EPSG::3685';

    /**
     * NAD83(NSRS2007) / Virginia North (ftUS)
     * Extent: USA - Virginia - counties of Arlington; Augusta; Bath; Caroline; Clarke; Culpeper; Fairfax; Fauquier;
     * Frederick; Greene; Highland; King George; Loudoun; Madison; Orange; Page; Prince William; Rappahannock;
     * Rockingham; Shenandoah; Spotsylvania; Stafford; Warren; Westmoreland
     * State law defines use of US survey feet. Federal definition is metric - see code 3685. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_VIRGINIA_NORTH_FTUS = 'urn:ogc:def:crs:EPSG::3686';

    /**
     * NAD83(NSRS2007) / Virginia South
     * Extent: USA - Virginia - counties of Accomack; Albemarle; Alleghany; Amelia; Amherst; Appomattox; Bedford;
     * Bland; Botetourt; Bristol; Brunswick; Buchanan; Buckingham; Campbell; Carroll; Charles City; Charlotte;
     * Chesapeake; Chesterfield; Colonial Heights; Craig; Cumberland; Dickenson; Dinwiddie; Essex; Floyd; Fluvanna;
     * Franklin; Giles; Gloucester; Goochland; Grayson; Greensville; Halifax; Hampton; Hanover; Henrico; Henry; Isle of
     * Wight; James City; King and Queen; King William; Lancaster; Lee; Louisa; Lunenburg; Lynchburg; Mathews;
     * Mecklenburg; Middlesex; Montgomery; Nelson; New Kent; Newport News; Norfolk; Northampton; Northumberland;
     * Norton; Nottoway; Patrick; Petersburg; Pittsylvania; Portsmouth; Powhatan; Prince Edward; Prince George;
     * Pulaski; Richmond; Roanoke; Rockbridge; Russell; Scott; Smyth; Southampton; Suffolk; Surry; Sussex; Tazewell;
     * Washington; Wise; Wythe; York
     * State law defines use of US survey feet. See code 3688 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_VIRGINIA_SOUTH = 'urn:ogc:def:crs:EPSG::3687';

    /**
     * NAD83(NSRS2007) / Virginia South (ftUS)
     * Extent: USA - Virginia - counties of Accomack; Albemarle; Alleghany; Amelia; Amherst; Appomattox; Bedford;
     * Bland; Botetourt; Bristol; Brunswick; Buchanan; Buckingham; Campbell; Carroll; Charles City; Charlotte;
     * Chesapeake; Chesterfield; Colonial Heights; Craig; Cumberland; Dickenson; Dinwiddie; Essex; Floyd; Fluvanna;
     * Franklin; Giles; Gloucester; Goochland; Grayson; Greensville; Halifax; Hampton; Hanover; Henrico; Henry; Isle of
     * Wight; James City; King and Queen; King William; Lancaster; Lee; Louisa; Lunenburg; Lynchburg; Mathews;
     * Mecklenburg; Middlesex; Montgomery; Nelson; New Kent; Newport News; Norfolk; Northampton; Northumberland;
     * Norton; Nottoway; Patrick; Petersburg; Pittsylvania; Portsmouth; Powhatan; Prince Edward; Prince George;
     * Pulaski; Richmond; Roanoke; Rockbridge; Russell; Scott; Smyth; Southampton; Suffolk; Surry; Sussex; Tazewell;
     * Washington; Wise; Wythe; York
     * State law defines use of US survey feet. Federal definition is metric - see code 3687. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_VIRGINIA_SOUTH_FTUS = 'urn:ogc:def:crs:EPSG::3688';

    /**
     * NAD83(NSRS2007) / Washington North
     * Extent: USA - Washington - counties of Chelan; Clallam; Douglas; Ferry; Grant north of approximately 47°30'N;
     * Island; Jefferson; King; Kitsap; Lincoln; Okanogan; Pend Oreille; San Juan; Skagit; Snohomish; Spokane; Stevens;
     * Whatcom
     * State law defines use of US survey feet. See code 3690 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_WASHINGTON_NORTH = 'urn:ogc:def:crs:EPSG::3689';

    /**
     * NAD83(NSRS2007) / Washington North (ftUS)
     * Extent: USA - Washington - counties of Chelan; Clallam; Douglas; Ferry; Grant north of approximately 47°30'N;
     * Island; Jefferson; King; Kitsap; Lincoln; Okanogan; Pend Oreille; San Juan; Skagit; Snohomish; Spokane; Stevens;
     * Whatcom
     * State law defines use of US survey feet. Federal definition is metric - see code 3689. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_WASHINGTON_NORTH_FTUS = 'urn:ogc:def:crs:EPSG::3690';

    /**
     * NAD83(NSRS2007) / Washington South
     * Extent: USA - Washington - counties of Adams; Asotin; Benton; Clark; Columbia; Cowlitz; Franklin; Garfield;
     * Grant south of approximately 47°30'N; Grays Harbor; Kittitas; Klickitat; Lewis; Mason; Pacific; Pierce;
     * Skamania; Thurston; Wahkiakum; Walla Walla; Whitman; Yakima
     * State law defines use of US survey feet. See code 3692 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_WASHINGTON_SOUTH = 'urn:ogc:def:crs:EPSG::3691';

    /**
     * NAD83(NSRS2007) / Washington South (ftUS)
     * Extent: USA - Washington - counties of Adams; Asotin; Benton; Clark; Columbia; Cowlitz; Franklin; Garfield;
     * Grant south of approximately 47°30'N; Grays Harbor; Kittitas; Klickitat; Lewis; Mason; Pacific; Pierce;
     * Skamania; Thurston; Wahkiakum; Walla Walla; Whitman; Yakima
     * State law defines use of US survey feet. Federal definition is metric - see code 3691. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_WASHINGTON_SOUTH_FTUS = 'urn:ogc:def:crs:EPSG::3692';

    /**
     * NAD83(NSRS2007) / West Virginia North
     * Extent: USA - West Virginia - counties of Barbour; Berkeley; Brooke; Doddridge; Grant; Hampshire; Hancock;
     * Hardy; Harrison; Jefferson; Marion; Marshall; Mineral; Monongalia; Morgan; Ohio; Pleasants; Preston; Ritchie;
     * Taylor; Tucker; Tyler; Wetzel; Wirt; Wood
     * State law defines system in US survey feet. See CRS code 26869 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_WEST_VIRGINIA_NORTH = 'urn:ogc:def:crs:EPSG::3693';

    /**
     * NAD83(NSRS2007) / West Virginia North (ftUS)
     * Extent: USA - West Virginia - counties of Barbour; Berkeley; Brooke; Doddridge; Grant; Hampshire; Hancock;
     * Hardy; Harrison; Jefferson; Marion; Marshall; Mineral; Monongalia; Morgan; Ohio; Pleasants; Preston; Ritchie;
     * Taylor; Tucker; Tyler; Wetzel; Wirt; Wood
     * State law defines use of US survey feet. Federal definition is metric - see code 3693. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_WEST_VIRGINIA_NORTH_FTUS = 'urn:ogc:def:crs:EPSG::26869';

    /**
     * NAD83(NSRS2007) / West Virginia South
     * Extent: USA - West Virginia - counties of Boone; Braxton; Cabell; Calhoun; Clay; Fayette; Gilmer; Greenbrier;
     * Jackson; Kanawha; Lewis; Lincoln; Logan; Mason; McDowell; Mercer; Mingo; Monroe; Nicholas; Pendleton;
     * Pocahontas; Putnam; Raleigh; Randolph; Roane; Summers; Upshur; Wayne; Webster; Wyoming
     * State law defines system in US survey feet. See CRS code 26870 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_WEST_VIRGINIA_SOUTH = 'urn:ogc:def:crs:EPSG::3694';

    /**
     * NAD83(NSRS2007) / West Virginia South (ftUS)
     * Extent: USA - West Virginia - counties of Boone; Braxton; Cabell; Calhoun; Clay; Fayette; Gilmer; Greenbrier;
     * Jackson; Kanawha; Lewis; Lincoln; Logan; Mason; McDowell; Mercer; Mingo; Monroe; Nicholas; Pendleton;
     * Pocahontas; Putnam; Raleigh; Randolph; Roane; Summers; Upshur; Wayne; Webster; Wyoming
     * State law defines use of US survey feet. Federal definition is metric - see code 3694. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_WEST_VIRGINIA_SOUTH_FTUS = 'urn:ogc:def:crs:EPSG::26870';

    /**
     * NAD83(NSRS2007) / Wisconsin Central
     * Extent: USA - Wisconsin - counties of Barron; Brown; Buffalo; Chippewa; Clark; Door; Dunn; Eau Claire; Jackson;
     * Kewaunee; Langlade; Lincoln; Marathon; Marinette; Menominee; Oconto; Outagamie; Pepin; Pierce; Polk; Portage;
     * Rusk; Shawano; St Croix; Taylor; Trempealeau; Waupaca; Wood
     * State law defines use of US survey feet. See code 3696 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_WISCONSIN_CENTRAL = 'urn:ogc:def:crs:EPSG::3695';

    /**
     * NAD83(NSRS2007) / Wisconsin Central (ftUS)
     * Extent: USA - Wisconsin - counties of Barron; Brown; Buffalo; Chippewa; Clark; Door; Dunn; Eau Claire; Jackson;
     * Kewaunee; Langlade; Lincoln; Marathon; Marinette; Menominee; Oconto; Outagamie; Pepin; Pierce; Polk; Portage;
     * Rusk; Shawano; St Croix; Taylor; Trempealeau; Waupaca; Wood
     * State law defines use of US survey feet. Federal definition is metric - see code 3695. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_WISCONSIN_CENTRAL_FTUS = 'urn:ogc:def:crs:EPSG::3696';

    /**
     * NAD83(NSRS2007) / Wisconsin North
     * Extent: USA - Wisconsin - counties of Ashland; Bayfield; Burnett; Douglas; Florence; Forest; Iron; Oneida;
     * Price; Sawyer; Vilas; Washburn
     * State law defines use of US survey feet. See code 3698 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_WISCONSIN_NORTH = 'urn:ogc:def:crs:EPSG::3697';

    /**
     * NAD83(NSRS2007) / Wisconsin North (ftUS)
     * Extent: USA - Wisconsin - counties of Ashland; Bayfield; Burnett; Douglas; Florence; Forest; Iron; Oneida;
     * Price; Sawyer; Vilas; Washburn
     * State law defines use of US survey feet. Federal definition is metric - see code 3607. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_WISCONSIN_NORTH_FTUS = 'urn:ogc:def:crs:EPSG::3698';

    /**
     * NAD83(NSRS2007) / Wisconsin South
     * Extent: USA - Wisconsin - counties of Adams; Calumet; Columbia; Crawford; Dane; Dodge; Fond Du Lac; Grant;
     * Green; Green Lake; Iowa; Jefferson; Juneau; Kenosha; La Crosse; Lafayette; Manitowoc; Marquette; Milwaukee;
     * Monroe; Ozaukee; Racine; Richland; Rock; Sauk; Sheboygan; Vernon; Walworth; Washington; Waukesha; Waushara;
     * Winnebago
     * State law defines use of US survey feet. See code 3700 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_WISCONSIN_SOUTH = 'urn:ogc:def:crs:EPSG::3699';

    /**
     * NAD83(NSRS2007) / Wisconsin South (ftUS)
     * Extent: USA - Wisconsin - counties of Adams; Calumet; Columbia; Crawford; Dane; Dodge; Fond Du Lac; Grant;
     * Green; Green Lake; Iowa; Jefferson; Juneau; Kenosha; La Crosse; Lafayette; Manitowoc; Marquette; Milwaukee;
     * Monroe; Ozaukee; Racine; Richland; Rock; Sauk; Sheboygan; Vernon; Walworth; Washington; Waukesha; Waushara;
     * Winnebago
     * State law defines use of US survey feet. Federal definition is metric - see code 3699. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_WISCONSIN_SOUTH_FTUS = 'urn:ogc:def:crs:EPSG::3700';

    /**
     * NAD83(NSRS2007) / Wisconsin Transverse Mercator
     * Extent: USA - Wisconsin
     * Designed as a single zone for the whole state. Replaces NAD83(HARN) / Wisconsin Transverse Mercator.
     */
    public const EPSG_NAD83_NSRS2007_WISCONSIN_TRANSVERSE_MERCATOR = 'urn:ogc:def:crs:EPSG::3701';

    /**
     * NAD83(NSRS2007) / Wyoming East
     * Extent: USA - Wyoming - counties of Albany; Campbell; Converse; Crook; Goshen; Laramie; Niobrara; Platte; Weston
     * State law defines use of US survey feet. See code 3730 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_WYOMING_EAST = 'urn:ogc:def:crs:EPSG::3702';

    /**
     * NAD83(NSRS2007) / Wyoming East Central
     * Extent: USA - Wyoming - counties of Big Horn; Carbon; Johnson; Natrona; Sheridan; Washakie
     * State law defines use of US survey feet. See code 3731 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_WYOMING_EAST_CENTRAL = 'urn:ogc:def:crs:EPSG::3703';

    /**
     * NAD83(NSRS2007) / Wyoming East Central (ftUS)
     * Extent: USA - Wyoming - counties of Big Horn; Carbon; Johnson; Natrona; Sheridan; Washakie
     * State law defines use of US survey feet. Federal definition is metric - see code 3703. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_WYOMING_EAST_CENTRAL_FTUS = 'urn:ogc:def:crs:EPSG::3731';

    /**
     * NAD83(NSRS2007) / Wyoming East (ftUS)
     * Extent: USA - Wyoming - counties of Albany; Campbell; Converse; Crook; Goshen; Laramie; Niobrara; Platte; Weston
     * State law defines use of US survey feet. Federal definition is metric - see code 3702. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_WYOMING_EAST_FTUS = 'urn:ogc:def:crs:EPSG::3730';

    /**
     * NAD83(NSRS2007) / Wyoming West
     * Extent: USA - Wyoming - counties of Lincoln; Sublette; Teton; Uinta
     * State law defines use of US survey feet. See code 3733 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_WYOMING_WEST = 'urn:ogc:def:crs:EPSG::3705';

    /**
     * NAD83(NSRS2007) / Wyoming West Central
     * Extent: USA - Wyoming - counties of Fremont; Hot Springs; Park; Sweetwater
     * State law defines use of US survey feet. See code 3732 for equivalent non-metric definition. Replaces
     * NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_NSRS2007_WYOMING_WEST_CENTRAL = 'urn:ogc:def:crs:EPSG::3704';

    /**
     * NAD83(NSRS2007) / Wyoming West Central (ftUS)
     * Extent: USA - Wyoming - counties of Fremont; Hot Springs; Park; Sweetwater
     * State law defines use of US survey feet. Federal definition is metric - see code 3704. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_WYOMING_WEST_CENTRAL_FTUS = 'urn:ogc:def:crs:EPSG::3732';

    /**
     * NAD83(NSRS2007) / Wyoming West (ftUS)
     * Extent: USA - Wyoming - counties of Lincoln; Sublette; Teton; Uinta
     * State law defines use of US survey feet. Federal definition is metric - see code 3705. Replaces NAD83(HARN) /
     * SPCS.
     */
    public const EPSG_NAD83_NSRS2007_WYOMING_WEST_FTUS = 'urn:ogc:def:crs:EPSG::3733';

    /**
     * NAD83 / NWT Lambert
     * Extent: Canada - Northwest Territories onshore
     * This CRS name may sometimes be used as an alias for NAD83(CSRS) / NWT Lambert. See CRS code 3581.
     */
    public const EPSG_NAD83_NWT_LAMBERT = 'urn:ogc:def:crs:EPSG::3580';

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
     * NAD83(PA11) / Hawaii zone 1
     * Extent: USA - Hawaii - island of Hawaii - onshore
     * Replaces NAD83(HARN) / Hawaii zone 1 (CRS code 2782).
     */
    public const EPSG_NAD83_PA11_HAWAII_ZONE_1 = 'urn:ogc:def:crs:EPSG::6628';

    /**
     * NAD83(PA11) / Hawaii zone 2
     * Extent: USA - Hawaii - Maui; Kahoolawe; Lanai; Molokai - onshore
     * Replaces NAD83(HARN) / Hawaii zone 2 (CRS code 2783).
     */
    public const EPSG_NAD83_PA11_HAWAII_ZONE_2 = 'urn:ogc:def:crs:EPSG::6629';

    /**
     * NAD83(PA11) / Hawaii zone 3
     * Extent: USA - Hawaii - Oahu - onshore
     * Replaces NAD83(HARN) / Hawaii zone 3 (CRS code 2784).
     */
    public const EPSG_NAD83_PA11_HAWAII_ZONE_3 = 'urn:ogc:def:crs:EPSG::6630';

    /**
     * NAD83(PA11) / Hawaii zone 3 (ftUS)
     * Extent: USA - Hawaii - Oahu - onshore
     * State has no law defining grid unit; system therefore not recognised by Federal authorities. Replaces
     * NAD83(HARN) / Hawaii zone 3 (ftUS) (CRS code 3760).
     */
    public const EPSG_NAD83_PA11_HAWAII_ZONE_3_FTUS = 'urn:ogc:def:crs:EPSG::6633';

    /**
     * NAD83(PA11) / Hawaii zone 4
     * Extent: USA - Hawaii - Kauai - onshore
     * Replaces NAD83(HARN) / Hawaii zone 4 (CRS code 2785).
     */
    public const EPSG_NAD83_PA11_HAWAII_ZONE_4 = 'urn:ogc:def:crs:EPSG::6631';

    /**
     * NAD83(PA11) / Hawaii zone 5
     * Extent: USA - Hawaii - Niihau - onshore
     * Replaces NAD83(HARN) / Hawaii zone 5 (CRS code 2786).
     */
    public const EPSG_NAD83_PA11_HAWAII_ZONE_5 = 'urn:ogc:def:crs:EPSG::6632';

    /**
     * NAD83(PA11) / UTM zone 2S
     * Extent: American Samoa - Tutuila, Aunu'u, Ofu, Olesega, Ta'u and Rose islands
     * Replaces NAD83(HARN) / UTM zone 2S (CRS code 2195).
     */
    public const EPSG_NAD83_PA11_UTM_ZONE_2S = 'urn:ogc:def:crs:EPSG::6636';

    /**
     * NAD83(PA11) / UTM zone 4N
     * Extent: USA - between 162°W and 156°W onshore - Hawaii
     * Replaces NAD83(HARN) / UTM zone 4N (CRS code 3750).
     */
    public const EPSG_NAD83_PA11_UTM_ZONE_4N = 'urn:ogc:def:crs:EPSG::6634';

    /**
     * NAD83(PA11) / UTM zone 5N
     * Extent: USA - between 156°W and 150°W onshore - Hawaii
     * Replaces NAD83(HARN) / UTM zone 5N (CRS code 3751).
     */
    public const EPSG_NAD83_PA11_UTM_ZONE_5N = 'urn:ogc:def:crs:EPSG::6635';

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
     * Extent: USA - Rhode Island
     * State law defines system in US survey feet. See code 3438 for equivalent non-metric definition. For applications
     * with an accuracy of better than 1m, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_RHODE_ISLAND = 'urn:ogc:def:crs:EPSG::32130';

    /**
     * NAD83 / Rhode Island (ftUS)
     * Extent: USA - Rhode Island
     * State law defines system in US survey feet. Federal definition is metric - see code 32130. For applications with
     * an accuracy of better than 3 feet, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_RHODE_ISLAND_FTUS = 'urn:ogc:def:crs:EPSG::3438';

    /**
     * NAD83 / South Carolina
     * Extent: USA - South Carolina
     * State law defines system in International feet (note: not US survey feet). See code 2273 for equivalent
     * non-metric definition. For applications with an accuracy of better than 1m, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_SOUTH_CAROLINA = 'urn:ogc:def:crs:EPSG::32133';

    /**
     * NAD83 / South Carolina (ft)
     * Extent: USA - South Carolina
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
     * NAD83 / Statistics Canada Statistical Ecosystem Register Albers
     * Extent: Canada - Alberta; British Columbia; Manitoba; New Brunswick; Newfoundland and Labrador; Northwest
     * Territories; Nova Scotia; Nunavut; Ontario; Prince Edward Island; Quebec; Saskatchewan; Yukon
     * Basis for the Statistical Ecosystem Register grid system. See
     * https://www150.statcan.gc.ca/n1/pub/16-510-x/16-510-x2025004-eng.htm section 5.1.
     */
    public const EPSG_NAD83_STATISTICS_CANADA_STATISTICAL_ECOSYSTEM_REGISTER_ALBERS = 'urn:ogc:def:crs:EPSG::11899';

    /**
     * NAD83 / Tennessee
     * Extent: USA - Tennessee
     * State law defines system in US survey feet. See code 2274 for equivalent non-metric definition. For applications
     * with an accuracy of better than 1m, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_TENNESSEE = 'urn:ogc:def:crs:EPSG::32136';

    /**
     * NAD83 / Tennessee (ftUS)
     * Extent: USA - Tennessee
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
     * NAD83 / Texas North (ftUS)
     * Extent: USA - Texas - counties of: Armstrong; Briscoe; Carson; Castro; Childress; Collingsworth; Dallam; Deaf
     * Smith; Donley; Gray; Hall; Hansford; Hartley; Hemphill; Hutchinson; Lipscomb; Moore; Ochiltree; Oldham; Parmer;
     * Potter; Randall; Roberts; Sherman; Swisher; Wheeler
     * State law defines system in US survey feet. Federal definition is metric - see code 32137. For applications with
     * an accuracy of better than 3 feet, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_TEXAS_NORTH_FTUS = 'urn:ogc:def:crs:EPSG::2275';

    /**
     * NAD83 / Texas South
     * Extent: USA - Texas - counties of Brooks; Cameron; Duval; Hidalgo; Jim Hogg; Jim Wells; Kenedy; Kleberg; Nueces;
     * San Patricio; Starr; Webb; Willacy; Zapata
     * State law defines system in US survey feet. See code 2279 for equivalent non-metric definition. For onshore
     * applications with an accuracy of better than 1m, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_TEXAS_SOUTH = 'urn:ogc:def:crs:EPSG::32141';

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
     * NAD83 / Texas South (ftUS)
     * Extent: USA - Texas - counties of Brooks; Cameron; Duval; Hidalgo; Jim Hogg; Jim Wells; Kenedy; Kleberg; Nueces;
     * San Patricio; Starr; Webb; Willacy; Zapata
     * State law defines system in US survey feet. Federal definition is metric - see code 32141. For onshore
     * applications with an accuracy of better than 3 feet, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_TEXAS_SOUTH_FTUS = 'urn:ogc:def:crs:EPSG::2279';

    /**
     * NAD83 / Texas State Mapping System
     * Extent: USA - Texas
     * Replaces NAD27 / Shackleford. From 2001 replaced by NAD83 / Texas Centric Mapping System (TCMS/LC and TCMS/AEA).
     */
    public const EPSG_NAD83_TEXAS_STATE_MAPPING_SYSTEM = 'urn:ogc:def:crs:EPSG::3081';

    /**
     * NAD83 / TWDB GM
     * Extent: USA - Texas
     * Not to be confused with the similar but different TxGIO (TNRIS) CRS, NAD83 / Texas Centric Albers Equal Area
     * (CRS code 3083).
     */
    public const EPSG_NAD83_TWDB_GM = 'urn:ogc:def:crs:EPSG::10481';

    /**
     * NAD83 / USFS R6 Albers
     * Extent: USA - Oregon and Washington.
     */
    public const EPSG_NAD83_USFS_R6_ALBERS = 'urn:ogc:def:crs:EPSG::9674';

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
     * District of Columbia (DC); Maryland; Massachusetts; New Hampshire; New Jersey; New York; North Carolina;
     * Pennsylvania; Virginia; Vermont
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
     * Extent: North America - between 138°W and 132°W. Canada - British Columbia; Northwest Territories; Yukon. USA
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
     * NAD83 / Vermont
     * Extent: USA - Vermont
     * State law defines system in US survey feet. See code 5646 for equivalent non-metric definition. For applications
     * with an accuracy of better than 1m, replaced by NAD83(HARN) / SPCS.
     */
    public const EPSG_NAD83_VERMONT = 'urn:ogc:def:crs:EPSG::32145';

    /**
     * NAD83 / Vermont (ftUS)
     * Extent: USA - Vermont
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
     * NAD83 / Wyoming East (ftUS)
     * Extent: USA - Wyoming - counties of Albany; Campbell; Converse; Crook; Goshen; Laramie; Niobrara; Platte; Weston
     * State law defines use of US survey feet. Federal definition is metric - see code 32155. Replaced by NAD83(HARN)
     * / SPCS for applications with an accuracy of better than 3 feet.
     */
    public const EPSG_NAD83_WYOMING_EAST_FTUS = 'urn:ogc:def:crs:EPSG::3736';

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
     * NAD83 / Wyoming West (ftUS)
     * Extent: USA - Wyoming - counties of Lincoln; Sublette; Teton; Uinta
     * State law defines use of US survey feet. Federal definition is metric - see code 32158. Replaced by NAD83(HARN)
     * / SPCS for applications with an accuracy of better than 3 feet.
     */
    public const EPSG_NAD83_WYOMING_WEST_FTUS = 'urn:ogc:def:crs:EPSG::3739';

    /**
     * NAD83 / Yukon Albers
     * Extent: Canada - Yukon
     * This CRS name may sometimes be used as an alias for NAD83(CSRS) / Yukon Albers. See CRS code 3579.
     */
    public const EPSG_NAD83_YUKON_ALBERS = 'urn:ogc:def:crs:EPSG::3578';

    /**
     * Nahrwan 1934 / Iraq zone
     * Extent: Iraq - onshore; Iran - onshore northern Gulf coast and west bordering southeast Iraq
     * In Iran, replaced by FD58 / Iraq zone (CRS code 3200). In Iraq, replaced by Karbala 1979 / UTM (CRS codes
     * 3391-93).
     */
    public const EPSG_NAHRWAN_1934_IRAQ_ZONE = 'urn:ogc:def:crs:EPSG::3394';

    /**
     * Nahrwan 1934 / UTM zone 37N
     * Extent: Iraq - west of 42°E
     * Replaced by Karbala 1979 (Polservice) / UTM zone 37N (projCRS code 3391).
     */
    public const EPSG_NAHRWAN_1934_UTM_ZONE_37N = 'urn:ogc:def:crs:EPSG::7005';

    /**
     * Nahrwan 1934 / UTM zone 38N
     * Extent: Iraq - between 42°E and 48°E
     * Replaced by Karbala 1979 (Polservice) / UTM zone 38N (projCRS code 3392).
     */
    public const EPSG_NAHRWAN_1934_UTM_ZONE_38N = 'urn:ogc:def:crs:EPSG::7006';

    /**
     * Nahrwan 1934 / UTM zone 39N
     * Extent: Iraq - east of 48°E
     * Replaced by Karbala 1979 (Polservice) / UTM zone 39N (projCRS code 3393).
     */
    public const EPSG_NAHRWAN_1934_UTM_ZONE_39N = 'urn:ogc:def:crs:EPSG::7007';

    /**
     * Nahrwan 1967 / UTM zone 39N
     * Extent: Qatar - offshore. UAE - Abu Dhabi west of 54°E.
     */
    public const EPSG_NAHRWAN_1967_UTM_ZONE_39N = 'urn:ogc:def:crs:EPSG::27039';

    /**
     * Nahrwan 1967 / UTM zone 40N
     * Extent: UAE east of 54°E - Abu Dhabi; Dubai; Sharjah; Ajman; Fujairah; Ras Al Kaimah; Umm Al Qaiwain.
     */
    public const EPSG_NAHRWAN_1967_UTM_ZONE_40N = 'urn:ogc:def:crs:EPSG::27040';

    /**
     * Nakhl-e Ghanem / UTM zone 39N
     * Extent: Iran - Kangan district.
     */
    public const EPSG_NAKHL_E_GHANEM_UTM_ZONE_39N = 'urn:ogc:def:crs:EPSG::3307';

    /**
     * Naparima 1955 / UTM zone 20N
     * Extent: Trinidad and Tobago - Trinidad - onshore.
     */
    public const EPSG_NAPARIMA_1955_UTM_ZONE_20N = 'urn:ogc:def:crs:EPSG::2067';

    /**
     * Naparima 1972 / UTM zone 20N
     * Extent: Trinidad and Tobago - Tobago - onshore.
     */
    public const EPSG_NAPARIMA_1972_UTM_ZONE_20N = 'urn:ogc:def:crs:EPSG::27120';

    /**
     * NATRF2022e2020 / Alabama
     * Extent: USA - Alabama
     * See code 21608 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_ALABAMA = 'urn:ogc:def:crs:EPSG::21607';

    /**
     * NATRF2022e2020 / Alabama (ft)
     * Extent: USA - Alabama
     * See code 21607 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_ALABAMA_FT = 'urn:ogc:def:crs:EPSG::21608';

    /**
     * NATRF2022e2020 / Alaska
     * Extent: USA - Alaska
     * See code 21642 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_ALASKA = 'urn:ogc:def:crs:EPSG::21641';

    /**
     * NATRF2022e2020 / Alaska (ft)
     * Extent: USA - Alaska
     * See code 21641 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_ALASKA_FT = 'urn:ogc:def:crs:EPSG::21642';

    /**
     * NATRF2022e2020 / Arizona
     * Extent: USA - Arizona
     * See code 21774 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_ARIZONA = 'urn:ogc:def:crs:EPSG::21773';

    /**
     * NATRF2022e2020 / Arizona (ft)
     * Extent: USA - Arizona
     * See code 21773 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_ARIZONA_FT = 'urn:ogc:def:crs:EPSG::21774';

    /**
     * NATRF2022e2020 / Arkansas
     * Extent: USA - Arkansas
     * See code 21938 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_ARKANSAS = 'urn:ogc:def:crs:EPSG::21937';

    /**
     * NATRF2022e2020 / Arkansas (ft)
     * Extent: USA - Arkansas
     * See code 21937 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_ARKANSAS_FT = 'urn:ogc:def:crs:EPSG::21938';

    /**
     * NATRF2022e2020 / California
     * Extent: USA - California
     * See code 21972 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_CALIFORNIA = 'urn:ogc:def:crs:EPSG::21971';

    /**
     * NATRF2022e2020 / California 1
     * Extent: USA - California - counties of Del Norte; Humboldt; Lassen; Modoc; Plumas; Shasta; Siskiyou; Tehama;
     * Trinity
     * See code 21974 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_CALIFORNIA_1 = 'urn:ogc:def:crs:EPSG::21973';

    /**
     * NATRF2022e2020 / California 1 (ft)
     * Extent: USA - California - counties of Del Norte; Humboldt; Lassen; Modoc; Plumas; Shasta; Siskiyou; Tehama;
     * Trinity
     * See code 21973 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_CALIFORNIA_1_FT = 'urn:ogc:def:crs:EPSG::21974';

    /**
     * NATRF2022e2020 / California 2
     * Extent: USA - California - counties of Alpine; Amador; Butte; Colusa; El Dorado; Glenn; Lake; Mendocino; Napa;
     * Nevada; Placer; Sacramento; Sierra; Solano; Sonoma; Sutter; Yolo; Yuba
     * See code 21976 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_CALIFORNIA_2 = 'urn:ogc:def:crs:EPSG::21975';

    /**
     * NATRF2022e2020 / California 2 (ft)
     * Extent: USA - California - counties of Alpine; Amador; Butte; Colusa; El Dorado; Glenn; Lake; Mendocino; Napa;
     * Nevada; Placer; Sacramento; Sierra; Solano; Sonoma; Sutter; Yolo; Yuba
     * See code 21975 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_CALIFORNIA_2_FT = 'urn:ogc:def:crs:EPSG::21976';

    /**
     * NATRF2022e2020 / California 3
     * Extent: USA - California - counties of Alameda; Calaveras; Contra Costa; Madera; Marin; Mariposa; Merced; Mono;
     * San Francisco; San Joaquin; San Mateo; Santa Clara; Santa Cruz; Stanislaus; Tuolumne
     * See code 21978 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_CALIFORNIA_3 = 'urn:ogc:def:crs:EPSG::21977';

    /**
     * NATRF2022e2020 / California 3 (ft)
     * Extent: USA - California - counties of Alameda; Calaveras; Contra Costa; Madera; Marin; Mariposa; Merced; Mono;
     * San Francisco; San Joaquin; San Mateo; Santa Clara; Santa Cruz; Stanislaus; Tuolumne
     * See code 21977 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_CALIFORNIA_3_FT = 'urn:ogc:def:crs:EPSG::21978';

    /**
     * NATRF2022e2020 / California 4
     * Extent: USA - California - counties of Fresno; Inyo; Kings; Monterey; San Benito; Tulare
     * See code 21980 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_CALIFORNIA_4 = 'urn:ogc:def:crs:EPSG::21979';

    /**
     * NATRF2022e2020 / California 4 (ft)
     * Extent: USA - California - counties of Fresno; Inyo; Kings; Monterey; San Benito; Tulare
     * See code 21979 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_CALIFORNIA_4_FT = 'urn:ogc:def:crs:EPSG::21980';

    /**
     * NATRF2022e2020 / California 5
     * Extent: USA - California - counties of Kern; Los Angeles; San Bernardino; San Luis Obispo; Santa Barbara;
     * Ventura
     * See code 21982 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_CALIFORNIA_5 = 'urn:ogc:def:crs:EPSG::21981';

    /**
     * NATRF2022e2020 / California 5 (ft)
     * Extent: USA - California - counties of Kern; Los Angeles; San Bernardino; San Luis Obispo; Santa Barbara;
     * Ventura
     * See code 21981 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_CALIFORNIA_5_FT = 'urn:ogc:def:crs:EPSG::21982';

    /**
     * NATRF2022e2020 / California 6
     * Extent: USA - California - counties of Imperial; Orange; Riverside; San Diego
     * See code 21984 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_CALIFORNIA_6 = 'urn:ogc:def:crs:EPSG::21983';

    /**
     * NATRF2022e2020 / California 6 (ft)
     * Extent: USA - California - counties of Imperial; Orange; Riverside; San Diego
     * See code 21983 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_CALIFORNIA_6_FT = 'urn:ogc:def:crs:EPSG::21984';

    /**
     * NATRF2022e2020 / California (ft)
     * Extent: USA - California
     * See code 21971 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_CALIFORNIA_FT = 'urn:ogc:def:crs:EPSG::21972';

    /**
     * NATRF2022e2020 / Colorado
     * Extent: USA - Colorado
     * See code 21990 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_COLORADO = 'urn:ogc:def:crs:EPSG::21989';

    /**
     * NATRF2022e2020 / Colorado (ft)
     * Extent: USA - Colorado
     * See code 21989 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_COLORADO_FT = 'urn:ogc:def:crs:EPSG::21990';

    /**
     * NATRF2022e2020 / Connecticut
     * Extent: USA - Connecticut
     * See code 22070 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_CONNECTICUT = 'urn:ogc:def:crs:EPSG::22069';

    /**
     * NATRF2022e2020 / Connecticut (ft)
     * Extent: USA - Connecticut
     * See code 22069 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_CONNECTICUT_FT = 'urn:ogc:def:crs:EPSG::22070';

    /**
     * NATRF2022e2020 / Delaware
     * Extent: USA - Delaware
     * See code 22072 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_DELAWARE = 'urn:ogc:def:crs:EPSG::22071';

    /**
     * NATRF2022e2020 / Delaware (ft)
     * Extent: USA - Delaware
     * See code 22071 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_DELAWARE_FT = 'urn:ogc:def:crs:EPSG::22072';

    /**
     * NATRF2022e2020 / Florida
     * Extent: USA - Florida
     * See code 22076 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_FLORIDA = 'urn:ogc:def:crs:EPSG::22075';

    /**
     * NATRF2022e2020 / Florida (ft)
     * Extent: USA - Florida
     * See code 22075 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_FLORIDA_FT = 'urn:ogc:def:crs:EPSG::22076';

    /**
     * NATRF2022e2020 / Georgia
     * Extent: USA - Georgia
     * See code 22086 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_GEORGIA = 'urn:ogc:def:crs:EPSG::22085';

    /**
     * NATRF2022e2020 / Georgia East
     * Extent: USA - Georgia - counties of Appling; Atkinson; Bacon; Baldwin; Brantley; Bryan; Bulloch; Burke; Camden;
     * Candler; Charlton; Chatham; Clinch; Coffee; Columbia; Dodge; Echols; Effingham; Elbert; Emanuel; Evans;
     * Franklin; Glascock; Glynn; Greene; Hancock; Hart; Jeff Davis; Jefferson; Jenkins; Johnson; Laurens; Liberty;
     * Lincoln; Long; Madison; McDuffie; McIntosh; Montgomery; Oglethorpe; Pierce; Richmond; Screven; Stephens;
     * Taliaferro; Tattnall; Telfair; Toombs; Treutlen; Ware; Warren; Washington; Wayne; Wheeler; Wilkes; Wilkinson
     * See code 22088 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_GEORGIA_EAST = 'urn:ogc:def:crs:EPSG::22087';

    /**
     * NATRF2022e2020 / Georgia East (ft)
     * Extent: USA - Georgia - counties of Appling; Atkinson; Bacon; Baldwin; Brantley; Bryan; Bulloch; Burke; Camden;
     * Candler; Charlton; Chatham; Clinch; Coffee; Columbia; Dodge; Echols; Effingham; Elbert; Emanuel; Evans;
     * Franklin; Glascock; Glynn; Greene; Hancock; Hart; Jeff Davis; Jefferson; Jenkins; Johnson; Laurens; Liberty;
     * Lincoln; Long; Madison; McDuffie; McIntosh; Montgomery; Oglethorpe; Pierce; Richmond; Screven; Stephens;
     * Taliaferro; Tattnall; Telfair; Toombs; Treutlen; Ware; Warren; Washington; Wayne; Wheeler; Wilkes; Wilkinson
     * See code 22087 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_GEORGIA_EAST_FT = 'urn:ogc:def:crs:EPSG::22088';

    /**
     * NATRF2022e2020 / Georgia (ft)
     * Extent: USA - Georgia
     * See code 22085 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_GEORGIA_FT = 'urn:ogc:def:crs:EPSG::22086';

    /**
     * NATRF2022e2020 / Georgia West
     * Extent: USA - Georgia - counties of Baker; Banks; Barrow; Bartow; Ben Hill; Berrien; Bibb; Bleckley; Brooks;
     * Butts; Calhoun; Carroll; Catoosa; Chattahoochee; Chattooga; Cherokee; Clarke; Clay; Clayton; Cobb; Colquitt;
     * Cook; Coweta; Crawford; Crisp; Dade; Dawson; De Kalb; Decatur; Dooly; Dougherty; Douglas; Early; Fannin;
     * Fayette; Floyd; Forsyth; Fulton; Gilmer; Gordon; Grady; Gwinnett; Habersham; Hall; Haralson; Harris; Heard;
     * Henry; Houston; Irwin; Jackson; Jasper; Jones; Lamar; Lanier; Lee; Lowndes; Lumpkin; Macon; Marion; Meriwether;
     * Miller; Mitchell; Monroe; Morgan; Murray; Muscogee; Newton; Oconee; Paulding; Peach; Pickens; Pike; Polk;
     * Pulaski; Putnam; Quitman; Rabun; Randolph; Rockdale; Schley; Seminole; Spalding; Stewart; Sumter; Talbot;
     * Taylor; Terrell; Thomas; Tift; Towns; Troup; Turner; Twiggs; Union; Upson; Walker; Walton; Webster; White;
     * Whitfield; Wilcox; Worth
     * See code 22090 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_GEORGIA_WEST = 'urn:ogc:def:crs:EPSG::22089';

    /**
     * NATRF2022e2020 / Georgia West (ft)
     * Extent: USA - Georgia - counties of Baker; Banks; Barrow; Bartow; Ben Hill; Berrien; Bibb; Bleckley; Brooks;
     * Butts; Calhoun; Carroll; Catoosa; Chattahoochee; Chattooga; Cherokee; Clarke; Clay; Clayton; Cobb; Colquitt;
     * Cook; Coweta; Crawford; Crisp; Dade; Dawson; De Kalb; Decatur; Dooly; Dougherty; Douglas; Early; Fannin;
     * Fayette; Floyd; Forsyth; Fulton; Gilmer; Gordon; Grady; Gwinnett; Habersham; Hall; Haralson; Harris; Heard;
     * Henry; Houston; Irwin; Jackson; Jasper; Jones; Lamar; Lanier; Lee; Lowndes; Lumpkin; Macon; Marion; Meriwether;
     * Miller; Mitchell; Monroe; Morgan; Murray; Muscogee; Newton; Oconee; Paulding; Peach; Pickens; Pike; Polk;
     * Pulaski; Putnam; Quitman; Rabun; Randolph; Rockdale; Schley; Seminole; Spalding; Stewart; Sumter; Talbot;
     * Taylor; Terrell; Thomas; Tift; Towns; Troup; Turner; Twiggs; Union; Upson; Walker; Walton; Webster; White;
     * Whitfield; Wilcox; Worth
     * See code 22089 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_GEORGIA_WEST_FT = 'urn:ogc:def:crs:EPSG::22090';

    /**
     * NATRF2022e2020 / Gulf
     * Extent: USA - offshore Gulf of Mexico outer continental shelf (GoM OCS) - protraction areas South Padre Island;
     * North Padre Island; Mustang Island; Matagorda Island; Brazos; Galveston; High Island; Sabine Pass; West Cameron;
     * East Cameron; Vermilion; South Marsh Island; Eugene Island; Ship Shoal; South Pelto; Bay Marchand; South
     * Timbalier; Grand Isle; West Delta; South Pass; Main Pass; Breton Sound; Chandeleur; Corpus Christi; Port Isabel;
     * East Breaks; Alaminos Canyon; Garden Banks; Keathley Canyon; Sigsbee Escarpment; Ewing Bank; Green Canyon;
     * Walker Ridge; Amery Terrace; Mobile; Viosca Knoll; Mississippi Canyon; Atwater Valley; Lund; Lund South;
     * Pensacola; Destin Dome; De Soto Canyon; Lloyd Ridge; Henderson; Florida Plain; Campeche Escarpment;
     * Apalachicola; Florida Middle Ground; The Elbow; Vernon Basin; Howell Hook; Rankin; Gainesville; Tarpon Springs;
     * St Petersburg; Charlotte Harbor; Pulley Ridge; Dry Tortugas; Tortugas Valley; Miami; Key West
     * See code 10980 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_GULF = 'urn:ogc:def:crs:EPSG::10979';

    /**
     * NATRF2022e2020 / Gulf East Central (ft)
     * Extent: USA - Gulf outer continental shelf (GoM OCS) deep water between approxinately 90°W and 84°W -
     * protraction areas Mobile, Viosca Knoll, Mississippi Canyon, Atwater Valley, Lund, Lund South, Pensacola, Destin
     * Dome, De Soto Canyon, Lloyd Ridge, Henderson, Florida Plain, Campeche Escarpment, Apalachicola, Florida Middle
     * Ground, The Elbow, Vernon Basin, Howell Hook, Rankin
     * Emulates most of offshore area of NAD27 / BLM 16N (ftUS) (CRS code 32066) to better than 6 ft, but south of
     * 26°N differences can exceed 15ft. Emulation embeds change of ellipsoid and of unit (ftUS to ft). Notes: (i) NGS
     * gives an equivalent definition in meters which is not included in the EPSG Dataset as this zone emulates SPCS27
     * for which there is no metric definition. (ii) SPCS2022 CRSs normally have axis order N-E; this emulation of
     * SPCS27 uses SPCS27 order east (X) - north (Y).
     */
    public const EPSG_NATRF2022E2020_GULF_EAST_CENTRAL_FT = 'urn:ogc:def:crs:EPSG::10986';

    /**
     * NATRF2022e2020 / Gulf East (ft)
     * Extent: USA - Gulf of Mexico outer continental shelf (GoM OCS) east of approximately 84°W - protraction areas
     * Gainesville; Tarpon Springs; St Petersburg; Charlotte Harbor; Pulley Ridge; Dry Tortugas; Tortugas Valley;
     * Miami; Key West
     * Emulates most of offshore area of NAD27 / BLM 17N (ftUS) (CRS code 32067) to better than 6 ft, but in the
     * extreme southwestern part differences can exceed 15ft. Emulation embeds change of ellipsoid and of unit (ftUS to
     * ft). Notes: (i) NGS gives an equivalent definition in meters which is not included in the EPSG Dataset as this
     * zone emulates SPCS27 for which there is no metric definition. (ii) SPCS2022 CRSs normally have axis order N-E;
     * this emulation of SPCS27 uses SPCS27 order east (X) - north (Y).
     */
    public const EPSG_NATRF2022E2020_GULF_EAST_FT = 'urn:ogc:def:crs:EPSG::10987';

    /**
     * NATRF2022e2020 / Gulf (ft)
     * Extent: USA - offshore Gulf of Mexico outer continental shelf (GoM OCS) - protraction areas South Padre Island;
     * North Padre Island; Mustang Island; Matagorda Island; Brazos; Galveston; High Island; Sabine Pass; West Cameron;
     * East Cameron; Vermilion; South Marsh Island; Eugene Island; Ship Shoal; South Pelto; Bay Marchand; South
     * Timbalier; Grand Isle; West Delta; South Pass; Main Pass; Breton Sound; Chandeleur; Corpus Christi; Port Isabel;
     * East Breaks; Alaminos Canyon; Garden Banks; Keathley Canyon; Sigsbee Escarpment; Ewing Bank; Green Canyon;
     * Walker Ridge; Amery Terrace; Mobile; Viosca Knoll; Mississippi Canyon; Atwater Valley; Lund; Lund South;
     * Pensacola; Destin Dome; De Soto Canyon; Lloyd Ridge; Henderson; Florida Plain; Campeche Escarpment;
     * Apalachicola; Florida Middle Ground; The Elbow; Vernon Basin; Howell Hook; Rankin; Gainesville; Tarpon Springs;
     * St Petersburg; Charlotte Harbor; Pulley Ridge; Dry Tortugas; Tortugas Valley; Miami; Key West
     * See code 10979 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_GULF_FT = 'urn:ogc:def:crs:EPSG::10980';

    /**
     * NATRF2022e2020 / Gulf Louisiana Shelf (ft)
     * Extent: USA - Gulf OCS - Louisiana shelf - leasing areas Sabine Pass; West Cameron, East Cameron, Vermilion,
     * South Marsh Island, Eugene Island, Ship Shoal, South Pelto, Bay Marchand, South Timbalier, Grand Isle, West
     * Delta, South Pass, Breton Sound, Main Pass, Chandeleur
     * Emulates offshore area of NAD27 / Louisiana South (CRS code 26785) to better than 6 ft. Emulation embeds change
     * of ellipsoid and of unit (ftUS to ft). Notes: (i) NGS gives an equivalent definition in meters which is not
     * included in the EPSG Dataset as this zone emulates SPCS27 for which there is no metric definition. (ii) SPCS2022
     * CRSs normally have axis order N-E; this emulation of SPCS27 uses SPCS27 order east (X) - north (Y).
     */
    public const EPSG_NATRF2022E2020_GULF_LOUISIANA_SHELF_FT = 'urn:ogc:def:crs:EPSG::10981';

    /**
     * NATRF2022e2020 / Gulf Texas Shelf North (ft)
     * Extent: USA - Gulf OCS - Texas shelf north of approximately 27°48'N - leasing areas Matagorda Island, Brazos,
     * Galveston, High Island; Sabine Pass
     * Emulates offshore area of NAD27 / Texas South Central (CRS code 32040) to better than 6 ft. Emulation embeds
     * change of ellipsoid and of unit (ftUS to ft). Notes: (i) NGS gives an equivalent definition in meters which is
     * not included in the EPSG Dataset as this zone emulates SPCS27 for which there is no metric definition. (ii)
     * SPCS2022 CRSs normally have axis order N-E; this emulation of SPCS27 uses SPCS27 order east (X) - north (Y).
     */
    public const EPSG_NATRF2022E2020_GULF_TEXAS_SHELF_NORTH_FT = 'urn:ogc:def:crs:EPSG::10982';

    /**
     * NATRF2022e2020 / Gulf Texas Shelf South (ft)
     * Extent: USA - Gulf OCS - Texas shelf south of approximately 27°50'N - leasing areas Mustang Island, North Padre
     * Island and South Padre Island
     * Emulates offshore area of NAD27 / Texas South (CRS code 32041) to better than 6 ft. Emulation embeds change of
     * ellipsoid and of unit (ftUS to ft). Notes: (i) NGS gives an equivalent definition in meters which is not
     * included in the EPSG Dataset as this zone emulates SPCS27 for which there is no metric definition. (ii) SPCS2022
     * CRSs normally have axis order N-E; this emulation of SPCS27 uses SPCS27 order east (X) - north (Y).
     */
    public const EPSG_NATRF2022E2020_GULF_TEXAS_SHELF_SOUTH_FT = 'urn:ogc:def:crs:EPSG::10983';

    /**
     * NATRF2022e2020 / Gulf West Central (ft)
     * Extent: USA - Gulf outer continental shelf (GoM OCS) deep water between approxinately 96°W and 90°W -
     * protraction areas East Breaks, Alaminos Canyon, Garden Banks, Keathley Canyon, Sigsbee Escarpment, Ewing Bank,
     * Green Canyon, Walker Ridge, Amery Terrace
     * Emulates offshore area of NAD27 / BLM 15N (ftUS) (CRS code 32065) between approximately 26°N and 28°N to
     * better than 6 ft, but south of 26°N differences can exceed 5m / 15ft. Emulation embeds change of ellipsoid and
     * of unit (ftUS to ft). Notes: (i) NGS gives an equivalent definition in meters which is not included in the EPSG
     * Dataset as this zone emulates SPCS27 for which there is no metric definition. (ii) SPCS2022 CRSs normally have
     * axis order N-E; this emulation of SPCS27 uses SPCS27 order east (X) - north (Y).
     */
    public const EPSG_NATRF2022E2020_GULF_WEST_CENTRAL_FT = 'urn:ogc:def:crs:EPSG::10985';

    /**
     * NATRF2022e2020 / Gulf West (ft)
     * Extent: USA - Gulf outer continental shelf (GoM OCS) deep water west of approxinately 96°W  - protraction areas
     * Corpus Christi, Port Isabel
     * Emulates offshore deep water area of NAD27 / BLM 14N (ftUS) (CRS code 32064) to better than 6 ft. Emulation
     * embeds change of ellipsoid and of unit (ftUS to ft). Notes: (i) NGS gives an equivalent definition in meters
     * which is not included in the EPSG Dataset as this zone emulates SPCS27 for which there is no metric definition.
     * (ii) SPCS2022 CRSs normally have axis order N-E; this emulation of SPCS27 uses SPCS27 order east (X) - north
     * (Y).
     */
    public const EPSG_NATRF2022E2020_GULF_WEST_FT = 'urn:ogc:def:crs:EPSG::10984';

    /**
     * NATRF2022e2020 / Idaho
     * Extent: USA - Idaho
     * See code 22096 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_IDAHO = 'urn:ogc:def:crs:EPSG::22095';

    /**
     * NATRF2022e2020 / Idaho (ft)
     * Extent: USA - Idaho
     * See code 22095 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_IDAHO_FT = 'urn:ogc:def:crs:EPSG::22096';

    /**
     * NATRF2022e2020 / Illinois
     * Extent: USA - Illinois
     * See code 22124 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_ILLINOIS = 'urn:ogc:def:crs:EPSG::22123';

    /**
     * NATRF2022e2020 / Illinois Aurora
     * Extent: USA - Illinois - counties of Boone, Dekalb, Kane, Kendall and McHenry
     * Part of the Illinois Coordinate System of 2022 33-zone system. See code 22130 for equivalent CRS in
     * (international) feet.
     */
    public const EPSG_NATRF2022E2020_ILLINOIS_AURORA = 'urn:ogc:def:crs:EPSG::22129';

    /**
     * NATRF2022e2020 / Illinois Aurora (ft)
     * Extent: USA - Illinois - counties of Boone, Dekalb, Kane, Kendall and McHenry
     * Part of the Illinois Coordinate System of 2022 33-zone system. See code 22129 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_ILLINOIS_AURORA_FT = 'urn:ogc:def:crs:EPSG::22130';

    /**
     * NATRF2022e2020 / Illinois Belleville
     * Extent: USA - Illinois - counties of Madison, Monroe and St Clair
     * Part of the Illinois Coordinate System of 2022 33-zone system. See code 22242 for equivalent CRS in
     * (international) feet.
     */
    public const EPSG_NATRF2022E2020_ILLINOIS_BELLEVILLE = 'urn:ogc:def:crs:EPSG::22241';

    /**
     * NATRF2022e2020 / Illinois Belleville (ft)
     * Extent: USA - Illinois - counties of Madison, Monroe and St Clair
     * Part of the Illinois Coordinate System of 2022 33-zone system. See code 22241 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_ILLINOIS_BELLEVILLE_FT = 'urn:ogc:def:crs:EPSG::22242';

    /**
     * NATRF2022e2020 / Illinois Bloomington
     * Extent: USA - Illinois - McLean county
     * Part of the Illinois Coordinate System of 2022 33-zone system. See code 22156 for equivalent CRS in
     * (international) feet.
     */
    public const EPSG_NATRF2022E2020_ILLINOIS_BLOOMINGTON = 'urn:ogc:def:crs:EPSG::22155';

    /**
     * NATRF2022e2020 / Illinois Bloomington (ft)
     * Extent: USA - Illinois - McLean county
     * Part of the Illinois Coordinate System of 2022 33-zone system. See code 22155 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_ILLINOIS_BLOOMINGTON_FT = 'urn:ogc:def:crs:EPSG::22156';

    /**
     * NATRF2022e2020 / Illinois Carbondale
     * Extent: USA - Illinois - counties of Franklin, Gallatin, Hamilton, Jackson, Perry,  Randolph, Saline, White and
     * Williamson
     * Part of the Illinois Coordinate System of 2022 33-zone system. See code 22256 for equivalent CRS in
     * (international) feet.
     */
    public const EPSG_NATRF2022E2020_ILLINOIS_CARBONDALE = 'urn:ogc:def:crs:EPSG::22255';

    /**
     * NATRF2022e2020 / Illinois Carbondale (ft)
     * Extent: USA - Illinois - counties of Franklin, Gallatin, Hamilton, Jackson, Perry,  Randolph, Saline, White and
     * Williamson
     * Part of the Illinois Coordinate System of 2022 33-zone system. See code 22255 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_ILLINOIS_CARBONDALE_FT = 'urn:ogc:def:crs:EPSG::22256';

    /**
     * NATRF2022e2020 / Illinois Carlinville
     * Extent: USA - Illinois - counties of Greene and Macoupin
     * Part of the Illinois Coordinate System of 2022 33-zone system. See code 22224 for equivalent CRS in
     * (international) feet.
     */
    public const EPSG_NATRF2022E2020_ILLINOIS_CARLINVILLE = 'urn:ogc:def:crs:EPSG::22223';

    /**
     * NATRF2022e2020 / Illinois Carlinville (ft)
     * Extent: USA - Illinois - counties of Greene and Macoupin
     * Part of the Illinois Coordinate System of 2022 33-zone system. See code 22223 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_ILLINOIS_CARLINVILLE_FT = 'urn:ogc:def:crs:EPSG::22224';

    /**
     * NATRF2022e2020 / Illinois Champaign
     * Extent: USA - Illinois - counties of Champaign and Vermilion
     * Part of the Illinois Coordinate System of 2022 33-zone system. See code 22170 for equivalent CRS in
     * (international) feet.
     */
    public const EPSG_NATRF2022E2020_ILLINOIS_CHAMPAIGN = 'urn:ogc:def:crs:EPSG::22169';

    /**
     * NATRF2022e2020 / Illinois Champaign (ft)
     * Extent: USA - Illinois - counties of Champaign and Vermilion
     * Part of the Illinois Coordinate System of 2022 33-zone system. See code 22169 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_ILLINOIS_CHAMPAIGN_FT = 'urn:ogc:def:crs:EPSG::22170';

    /**
     * NATRF2022e2020 / Illinois Charleston
     * Extent: USA - Illinois - counties of Coles, Douglas and Edgar
     * Part of the Illinois Coordinate System of 2022 33-zone system. See code 22200 for equivalent CRS in
     * (international) feet.
     */
    public const EPSG_NATRF2022E2020_ILLINOIS_CHARLESTON = 'urn:ogc:def:crs:EPSG::22199';

    /**
     * NATRF2022e2020 / Illinois Charleston (ft)
     * Extent: USA - Illinois - counties of Coles, Douglas and Edgar
     * Part of the Illinois Coordinate System of 2022 33-zone system. See code 22199 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_ILLINOIS_CHARLESTON_FT = 'urn:ogc:def:crs:EPSG::22200';

    /**
     * NATRF2022e2020 / Illinois Chicago
     * Extent: USA - Illinois - counties of Cook, DuPage and Lake
     * Part of the Illinois Coordinate System of 2022 33-zone system. See code 22132 for equivalent CRS in
     * (international) feet.
     */
    public const EPSG_NATRF2022E2020_ILLINOIS_CHICAGO = 'urn:ogc:def:crs:EPSG::22131';

    /**
     * NATRF2022e2020 / Illinois Chicago (ft)
     * Extent: USA - Illinois - counties of Cook, DuPage and Lake
     * Part of the Illinois Coordinate System of 2022 33-zone system. See code 22131 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_ILLINOIS_CHICAGO_FT = 'urn:ogc:def:crs:EPSG::22132';

    /**
     * NATRF2022e2020 / Illinois Decatur
     * Extent: USA - Illinois - counties of Dewitt, Macon, Moultrie, Piatt and Shelby
     * Part of the Illinois Coordinate System of 2022 33-zone system. See code 22168 for equivalent CRS in
     * (international) feet.
     */
    public const EPSG_NATRF2022E2020_ILLINOIS_DECATUR = 'urn:ogc:def:crs:EPSG::22167';

    /**
     * NATRF2022e2020 / Illinois Decatur (ft)
     * Extent: USA - Illinois - counties of Dewitt, Macon, Moultrie, Piatt and Shelby
     * Part of the Illinois Coordinate System of 2022 33-zone system. See code 22167 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_ILLINOIS_DECATUR_FT = 'urn:ogc:def:crs:EPSG::22168';

    /**
     * NATRF2022e2020 / Illinois Effingham
     * Extent: USA - Illinois - counties of Bond, Effingham and Fayette
     * Part of the Illinois Coordinate System of 2022 33-zone system. See code 22228 for equivalent CRS in
     * (international) feet.
     */
    public const EPSG_NATRF2022E2020_ILLINOIS_EFFINGHAM = 'urn:ogc:def:crs:EPSG::22227';

    /**
     * NATRF2022e2020 / Illinois Effingham (ft)
     * Extent: USA - Illinois - counties of Bond, Effingham and Fayette
     * Part of the Illinois Coordinate System of 2022 33-zone system. See code 22227 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_ILLINOIS_EFFINGHAM_FT = 'urn:ogc:def:crs:EPSG::22228';

    /**
     * NATRF2022e2020 / Illinois Eureka
     * Extent: USA - Illinois - counties of Marshall and Woodford
     * Part of the Illinois Coordinate System of 2022 33-zone system. See code 22154 for equivalent CRS in
     * (international) feet.
     */
    public const EPSG_NATRF2022E2020_ILLINOIS_EUREKA = 'urn:ogc:def:crs:EPSG::22153';

    /**
     * NATRF2022e2020 / Illinois Eureka (ft)
     * Extent: USA - Illinois - counties of Marshall and Woodford
     * Part of the Illinois Coordinate System of 2022 33-zone system. See code 22153 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_ILLINOIS_EUREKA_FT = 'urn:ogc:def:crs:EPSG::22154';

    /**
     * NATRF2022e2020 / Illinois Freeport
     * Extent: USA - Illinois - counties of Carroll, Jo Daviess and Stephenson
     * Part of the Illinois Coordinate System of 2022 33-zone system. See code 22126 for equivalent CRS in
     * (international) feet.
     */
    public const EPSG_NATRF2022E2020_ILLINOIS_FREEPORT = 'urn:ogc:def:crs:EPSG::22125';

    /**
     * NATRF2022e2020 / Illinois Freeport (ft)
     * Extent: USA - Illinois - counties of Carroll, Jo Daviess and Stephenson
     * Part of the Illinois Coordinate System of 2022 33-zone system. See code 22125 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_ILLINOIS_FREEPORT_FT = 'urn:ogc:def:crs:EPSG::22126';

    /**
     * NATRF2022e2020 / Illinois (ft)
     * Extent: USA - Illinois
     * See code 22123 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_ILLINOIS_FT = 'urn:ogc:def:crs:EPSG::22124';

    /**
     * NATRF2022e2020 / Illinois Galesburg
     * Extent: USA - Illinois - counties of Fulton, Knox and Stark
     * Part of the Illinois Coordinate System of 2022 33-zone system. See code 22148 for equivalent CRS in
     * (international) feet.
     */
    public const EPSG_NATRF2022E2020_ILLINOIS_GALESBURG = 'urn:ogc:def:crs:EPSG::22147';

    /**
     * NATRF2022e2020 / Illinois Galesburg (ft)
     * Extent: USA - Illinois - counties of Fulton, Knox and Stark
     * Part of the Illinois Coordinate System of 2022 33-zone system. See code 22147 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_ILLINOIS_GALESBURG_FT = 'urn:ogc:def:crs:EPSG::22148';

    /**
     * NATRF2022e2020 / Illinois Jacksonville
     * Extent: USA - Illinois - counties of Morgan, Pike and Scott
     * Part of the Illinois Coordinate System of 2022 33-zone system. See code 22180 for equivalent CRS in
     * (international) feet.
     */
    public const EPSG_NATRF2022E2020_ILLINOIS_JACKSONVILLE = 'urn:ogc:def:crs:EPSG::22179';

    /**
     * NATRF2022e2020 / Illinois Jacksonville (ft)
     * Extent: USA - Illinois - counties of Morgan, Pike and Scott
     * Part of the Illinois Coordinate System of 2022 33-zone system. See code 22179 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_ILLINOIS_JACKSONVILLE_FT = 'urn:ogc:def:crs:EPSG::22180';

    /**
     * NATRF2022e2020 / Illinois Jerseyville
     * Extent: USA - Illinois - counties of Calhoun and Jersey
     * Part of the Illinois Coordinate System of 2022 33-zone system. See code 22206 for equivalent CRS in
     * (international) feet.
     */
    public const EPSG_NATRF2022E2020_ILLINOIS_JERSEYVILLE = 'urn:ogc:def:crs:EPSG::22205';

    /**
     * NATRF2022e2020 / Illinois Jerseyville (ft)
     * Extent: USA - Illinois - counties of Calhoun and Jersey
     * Part of the Illinois Coordinate System of 2022 33-zone system. See code 22205 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_ILLINOIS_JERSEYVILLE_FT = 'urn:ogc:def:crs:EPSG::22206';

    /**
     * NATRF2022e2020 / Illinois Joliet
     * Extent: USA - Illinois - counties of Kankakee and Will
     * Part of the Illinois Coordinate System of 2022 33-zone system. See code 22140 for equivalent CRS in
     * (international) feet.
     */
    public const EPSG_NATRF2022E2020_ILLINOIS_JOLIET = 'urn:ogc:def:crs:EPSG::22139';

    /**
     * NATRF2022e2020 / Illinois Joliet (ft)
     * Extent: USA - Illinois - counties of Kankakee and Will
     * Part of the Illinois Coordinate System of 2022 33-zone system. See code 22139 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_ILLINOIS_JOLIET_FT = 'urn:ogc:def:crs:EPSG::22140';

    /**
     * NATRF2022e2020 / Illinois Lincoln
     * Extent: USA - Illinois - counties of Cass, Logan, Mason and Menard
     * Part of the Illinois Coordinate System of 2022 33-zone system. See code 22166 for equivalent CRS in
     * (international) feet.
     */
    public const EPSG_NATRF2022E2020_ILLINOIS_LINCOLN = 'urn:ogc:def:crs:EPSG::22165';

    /**
     * NATRF2022e2020 / Illinois Lincoln (ft)
     * Extent: USA - Illinois - counties of Cass, Logan, Mason and Menard
     * Part of the Illinois Coordinate System of 2022 33-zone system. See code 22165 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_ILLINOIS_LINCOLN_FT = 'urn:ogc:def:crs:EPSG::22166';

    /**
     * NATRF2022e2020 / Illinois Macomb
     * Extent: USA - Illinois - counties of Brown, McDonough and Schuyler
     * Part of the Illinois Coordinate System of 2022 33-zone system. See code 22164 for equivalent CRS in
     * (international) feet.
     */
    public const EPSG_NATRF2022E2020_ILLINOIS_MACOMB = 'urn:ogc:def:crs:EPSG::22163';

    /**
     * NATRF2022e2020 / Illinois Macomb (ft)
     * Extent: USA - Illinois - counties of Brown, McDonough and Schuyler
     * Part of the Illinois Coordinate System of 2022 33-zone system. See code 22163 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_ILLINOIS_MACOMB_FT = 'urn:ogc:def:crs:EPSG::22164';

    /**
     * NATRF2022e2020 / Illinois Metropolis
     * Extent: USA - Illinois - counties of Alexander, Hardin, Johnson, Massac, Pope, Pulaski and Union
     * Part of the Illinois Coordinate System of 2022 33-zone system. See code 22258 for equivalent CRS in
     * (international) feet.
     */
    public const EPSG_NATRF2022E2020_ILLINOIS_METROPOLIS = 'urn:ogc:def:crs:EPSG::22257';

    /**
     * NATRF2022e2020 / Illinois Metropolis (ft)
     * Extent: USA - Illinois - counties of Alexander, Hardin, Johnson, Massac, Pope, Pulaski and Union
     * Part of the Illinois Coordinate System of 2022 33-zone system. See code 22257 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_ILLINOIS_METROPOLIS_FT = 'urn:ogc:def:crs:EPSG::22258';

    /**
     * NATRF2022e2020 / Illinois Moline
     * Extent: USA - Illinois - Rock Island county
     * Part of the Illinois Coordinate System of 2022 33-zone system. See code 22134 for equivalent CRS in
     * (international) feet.
     */
    public const EPSG_NATRF2022E2020_ILLINOIS_MOLINE = 'urn:ogc:def:crs:EPSG::22133';

    /**
     * NATRF2022e2020 / Illinois Moline (ft)
     * Extent: USA - Illinois - Rock Island county
     * Part of the Illinois Coordinate System of 2022 33-zone system. See code 22133 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_ILLINOIS_MOLINE_FT = 'urn:ogc:def:crs:EPSG::22134';

    /**
     * NATRF2022e2020 / Illinois Monmouth
     * Extent: USA - Illinois - counties of Henderson, Mercer and Warren
     * Part of the Illinois Coordinate System of 2022 33-zone system. See code 22146 for equivalent CRS in
     * (international) feet.
     */
    public const EPSG_NATRF2022E2020_ILLINOIS_MONMOUTH = 'urn:ogc:def:crs:EPSG::22145';

    /**
     * NATRF2022e2020 / Illinois Monmouth (ft)
     * Extent: USA - Illinois - counties of Henderson, Mercer and Warren
     * Part of the Illinois Coordinate System of 2022 33-zone system. See code 22145 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_ILLINOIS_MONMOUTH_FT = 'urn:ogc:def:crs:EPSG::22146';

    /**
     * NATRF2022e2020 / Illinois Mount Vernon
     * Extent: USA - Illinois - counties of Clinton, Jefferson, Marion and Washington
     * Part of the Illinois Coordinate System of 2022 33-zone system. See code 22252 for equivalent CRS in
     * (international) feet.
     */
    public const EPSG_NATRF2022E2020_ILLINOIS_MOUNT_VERNON = 'urn:ogc:def:crs:EPSG::22251';

    /**
     * NATRF2022e2020 / Illinois Mount Vernon (ft)
     * Extent: USA - Illinois - counties of Clinton, Jefferson, Marion and Washington
     * Part of the Illinois Coordinate System of 2022 33-zone system. See code 22251 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_ILLINOIS_MOUNT_VERNON_FT = 'urn:ogc:def:crs:EPSG::22252';

    /**
     * NATRF2022e2020 / Illinois Olney
     * Extent: USA - Illinois - counties of Clay, Edwards, Lawrence, Richland, Wabash and Wayne
     * Part of the Illinois Coordinate System of 2022 33-zone system. See code 22254 for equivalent CRS in
     * (international) feet.
     */
    public const EPSG_NATRF2022E2020_ILLINOIS_OLNEY = 'urn:ogc:def:crs:EPSG::22253';

    /**
     * NATRF2022e2020 / Illinois Olney (ft)
     * Extent: USA - Illinois - counties of Clay, Edwards, Lawrence, Richland, Wabash and Wayne
     * Part of the Illinois Coordinate System of 2022 33-zone system. See code 22253 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_ILLINOIS_OLNEY_FT = 'urn:ogc:def:crs:EPSG::22254';

    /**
     * NATRF2022e2020 / Illinois Ottawa
     * Extent: USA - Illinois - counties of Bureau, Grundy, LaSalle and Putnam
     * Part of the Illinois Coordinate System of 2022 33-zone system. See code 22138 for equivalent CRS in
     * (international) feet.
     */
    public const EPSG_NATRF2022E2020_ILLINOIS_OTTAWA = 'urn:ogc:def:crs:EPSG::22137';

    /**
     * NATRF2022e2020 / Illinois Ottawa (ft)
     * Extent: USA - Illinois - counties of Bureau, Grundy, LaSalle and Putnam
     * Part of the Illinois Coordinate System of 2022 33-zone system. See code 22137 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_ILLINOIS_OTTAWA_FT = 'urn:ogc:def:crs:EPSG::22138';

    /**
     * NATRF2022e2020 / Illinois Peoria
     * Extent: USA - Illinois - counties of Peoria and Tazewell
     * Part of the Illinois Coordinate System of 2022 33-zone system. See code 22152 for equivalent CRS in
     * (international) feet.
     */
    public const EPSG_NATRF2022E2020_ILLINOIS_PEORIA = 'urn:ogc:def:crs:EPSG::22151';

    /**
     * NATRF2022e2020 / Illinois Peoria (ft)
     * Extent: USA - Illinois - counties of Peoria and Tazewell
     * Part of the Illinois Coordinate System of 2022 33-zone system. See code 22151 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_ILLINOIS_PEORIA_FT = 'urn:ogc:def:crs:EPSG::22152';

    /**
     * NATRF2022e2020 / Illinois Pontiac
     * Extent: USA - Illinois - Livingston county
     * Part of the Illinois Coordinate System of 2022 33-zone system. See code 22158 for equivalent CRS in
     * (international) feet.
     */
    public const EPSG_NATRF2022E2020_ILLINOIS_PONTIAC = 'urn:ogc:def:crs:EPSG::22157';

    /**
     * NATRF2022e2020 / Illinois Pontiac (ft)
     * Extent: USA - Illinois - Livingston county
     * Part of the Illinois Coordinate System of 2022 33-zone system. See code 22157 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_ILLINOIS_PONTIAC_FT = 'urn:ogc:def:crs:EPSG::22158';

    /**
     * NATRF2022e2020 / Illinois Quincy
     * Extent: USA - Illinois - counties of Adams and Hancock
     * Part of the Illinois Coordinate System of 2022 33-zone system. See code 22162 for equivalent CRS in
     * (international) feet.
     */
    public const EPSG_NATRF2022E2020_ILLINOIS_QUINCY = 'urn:ogc:def:crs:EPSG::22161';

    /**
     * NATRF2022e2020 / Illinois Quincy (ft)
     * Extent: USA - Illinois - counties of Adams and Hancock
     * Part of the Illinois Coordinate System of 2022 33-zone system. See code 22161 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_ILLINOIS_QUINCY_FT = 'urn:ogc:def:crs:EPSG::22162';

    /**
     * NATRF2022e2020 / Illinois Robinson
     * Extent: USA - Illinois - counties of Clark, Crawford, Cumberland and Jasper
     * Part of the Illinois Coordinate System of 2022 33-zone system. See code 22238 for equivalent CRS in
     * (international) feet.
     */
    public const EPSG_NATRF2022E2020_ILLINOIS_ROBINSON = 'urn:ogc:def:crs:EPSG::22237';

    /**
     * NATRF2022e2020 / Illinois Robinson (ft)
     * Extent: USA - Illinois - counties of Clark, Crawford, Cumberland and Jasper
     * Part of the Illinois Coordinate System of 2022 33-zone system. See code 22237 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_ILLINOIS_ROBINSON_FT = 'urn:ogc:def:crs:EPSG::22238';

    /**
     * NATRF2022e2020 / Illinois Rockford
     * Extent: USA - Illinois - counties of Lee, Ogle and Winnebago
     * Part of the Illinois Coordinate System of 2022 33-zone system. See code 22128 for equivalent CRS in
     * (international) feet.
     */
    public const EPSG_NATRF2022E2020_ILLINOIS_ROCKFORD = 'urn:ogc:def:crs:EPSG::22127';

    /**
     * NATRF2022e2020 / Illinois Rockford (ft)
     * Extent: USA - Illinois - counties of Lee, Ogle and Winnebago
     * Part of the Illinois Coordinate System of 2022 33-zone system. See code 22127 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_ILLINOIS_ROCKFORD_FT = 'urn:ogc:def:crs:EPSG::22128';

    /**
     * NATRF2022e2020 / Illinois Springfield
     * Extent: USA - Illinois - Sangamon county
     * Part of the Illinois Coordinate System of 2022 33-zone system. See code 22190 for equivalent CRS in
     * (international) feet.
     */
    public const EPSG_NATRF2022E2020_ILLINOIS_SPRINGFIELD = 'urn:ogc:def:crs:EPSG::22189';

    /**
     * NATRF2022e2020 / Illinois Springfield (ft)
     * Extent: USA - Illinois - Sangamon county
     * Part of the Illinois Coordinate System of 2022 33-zone system. See code 22189 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_ILLINOIS_SPRINGFIELD_FT = 'urn:ogc:def:crs:EPSG::22190';

    /**
     * NATRF2022e2020 / Illinois Sterling
     * Extent: USA - Illinois - counties of Henry and Whiteside
     * Part of the Illinois Coordinate System of 2022 33-zone system. See code 22136 for equivalent CRS in
     * (international) feet.
     */
    public const EPSG_NATRF2022E2020_ILLINOIS_STERLING = 'urn:ogc:def:crs:EPSG::22135';

    /**
     * NATRF2022e2020 / Illinois Sterling (ft)
     * Extent: USA - Illinois - counties of Henry and Whiteside
     * Part of the Illinois Coordinate System of 2022 33-zone system. See code 22135 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_ILLINOIS_STERLING_FT = 'urn:ogc:def:crs:EPSG::22136';

    /**
     * NATRF2022e2020 / Illinois Taylorville
     * Extent: USA - Illinois - counties of Christian and Montgomery
     * Part of the Illinois Coordinate System of 2022 33-zone system. See code 22226 for equivalent CRS in
     * (international) feet.
     */
    public const EPSG_NATRF2022E2020_ILLINOIS_TAYLORVILLE = 'urn:ogc:def:crs:EPSG::22225';

    /**
     * NATRF2022e2020 / Illinois Taylorville (ft)
     * Extent: USA - Illinois - counties of Christian and Montgomery
     * Part of the Illinois Coordinate System of 2022 33-zone system. See code 22225 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_ILLINOIS_TAYLORVILLE_FT = 'urn:ogc:def:crs:EPSG::22226';

    /**
     * NATRF2022e2020 / Illinois Watseka
     * Extent: USA - Illinois - counties of Ford and Iroquois
     * Part of the Illinois Coordinate System of 2022 33-zone system. See code 22160 for equivalent CRS in
     * (international) feet.
     */
    public const EPSG_NATRF2022E2020_ILLINOIS_WATSEKA = 'urn:ogc:def:crs:EPSG::22159';

    /**
     * NATRF2022e2020 / Illinois Watseka (ft)
     * Extent: USA - Illinois - counties of Ford and Iroquois
     * Part of the Illinois Coordinate System of 2022 33-zone system. See code 22159 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_ILLINOIS_WATSEKA_FT = 'urn:ogc:def:crs:EPSG::22160';

    /**
     * NATRF2022e2020 / Indiana
     * Extent: USA - Indiana
     * See code 22260 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_INDIANA = 'urn:ogc:def:crs:EPSG::22259';

    /**
     * NATRF2022e2020 / Indiana Adams
     * Extent: USA - Indiana - Adams county
     * Part of the Indiana Geospatial Coordinate System (InGCS). See code 22274 for equivalent CRS in (international)
     * feet.
     */
    public const EPSG_NATRF2022E2020_INDIANA_ADAMS = 'urn:ogc:def:crs:EPSG::22273';

    /**
     * NATRF2022e2020 / Indiana Adams (ft)
     * Extent: USA - Indiana - Adams county
     * Part of the Indiana Geospatial Coordinate System (InGCS). See code 22273 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_INDIANA_ADAMS_FT = 'urn:ogc:def:crs:EPSG::22274';

    /**
     * NATRF2022e2020 / Indiana Allen
     * Extent: USA - Indiana - Allen county
     * Part of the Indiana Geospatial Coordinate System (InGCS). See code 22272 for equivalent CRS in (international)
     * feet.
     */
    public const EPSG_NATRF2022E2020_INDIANA_ALLEN = 'urn:ogc:def:crs:EPSG::22271';

    /**
     * NATRF2022e2020 / Indiana Allen (ft)
     * Extent: USA - Indiana - Allen county
     * Part of the Indiana Geospatial Coordinate System (InGCS). See code 22271 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_INDIANA_ALLEN_FT = 'urn:ogc:def:crs:EPSG::22272';

    /**
     * NATRF2022e2020 / Indiana Bartholomew
     * Extent: USA - Indiana - Bartholomew county
     * Part of the Indiana Geospatial Coordinate System (InGCS). See code 22366 for equivalent CRS in (international)
     * feet.
     */
    public const EPSG_NATRF2022E2020_INDIANA_BARTHOLOMEW = 'urn:ogc:def:crs:EPSG::22365';

    /**
     * NATRF2022e2020 / Indiana Bartholomew (ft)
     * Extent: USA - Indiana - Bartholomew county
     * Part of the Indiana Geospatial Coordinate System (InGCS). See code 22365 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_INDIANA_BARTHOLOMEW_FT = 'urn:ogc:def:crs:EPSG::22366';

    /**
     * NATRF2022e2020 / Indiana Blackford-Delaware
     * Extent: USA - Indiana - counties of Blackford and Delaware
     * Part of the Indiana Geospatial Coordinate System (InGCS). Defined by InDoT as separate zones for each county,
     * these having identical parameter values. See code 22336 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_INDIANA_BLACKFORD_DELAWARE = 'urn:ogc:def:crs:EPSG::22335';

    /**
     * NATRF2022e2020 / Indiana Blackford-Delaware (ft)
     * Extent: USA - Indiana - counties of Blackford and Delaware
     * Part of the Indiana Geospatial Coordinate System (InGCS). Defined by InDoT as separate zones for each county,
     * these having identical parameter values. See code 22335 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_INDIANA_BLACKFORD_DELAWARE_FT = 'urn:ogc:def:crs:EPSG::22336';

    /**
     * NATRF2022e2020 / Indiana Boone-Hendricks
     * Extent: USA - Indiana - counties of Boone and Hendricks
     * Part of the Indiana Geospatial Coordinate System (InGCS). Defined by InDoT as separate zones for each county,
     * these having identical parameter values. See code 22398 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_INDIANA_BOONE_HENDRICKS = 'urn:ogc:def:crs:EPSG::22397';

    /**
     * NATRF2022e2020 / Indiana Boone-Hendricks (ft)
     * Extent: USA - Indiana - counties of Boone and Hendricks
     * Part of the Indiana Geospatial Coordinate System (InGCS). Defined by InDoT as separate zones for each county,
     * these having identical parameter values. See code 22397 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_INDIANA_BOONE_HENDRICKS_FT = 'urn:ogc:def:crs:EPSG::22398';

    /**
     * NATRF2022e2020 / Indiana Brown
     * Extent: USA - Indiana - Brown county
     * Part of the Indiana Geospatial Coordinate System (InGCS). See code 22376 for equivalent CRS in (international)
     * feet.
     */
    public const EPSG_NATRF2022E2020_INDIANA_BROWN = 'urn:ogc:def:crs:EPSG::22375';

    /**
     * NATRF2022e2020 / Indiana Brown (ft)
     * Extent: USA - Indiana - Brown county
     * Part of the Indiana Geospatial Coordinate System (InGCS). See code 22375 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_INDIANA_BROWN_FT = 'urn:ogc:def:crs:EPSG::22376';

    /**
     * NATRF2022e2020 / Indiana Carroll
     * Extent: USA - Indiana - Carroll county
     * Part of the Indiana Geospatial Coordinate System (InGCS). See code 22388 for equivalent CRS in (international)
     * feet.
     */
    public const EPSG_NATRF2022E2020_INDIANA_CARROLL = 'urn:ogc:def:crs:EPSG::22387';

    /**
     * NATRF2022e2020 / Indiana Carroll (ft)
     * Extent: USA - Indiana - Carroll county
     * Part of the Indiana Geospatial Coordinate System (InGCS). See code 22387 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_INDIANA_CARROLL_FT = 'urn:ogc:def:crs:EPSG::22388';

    /**
     * NATRF2022e2020 / Indiana Cass
     * Extent: USA - Indiana - Cass county
     * Part of the Indiana Geospatial Coordinate System (InGCS). See code 22386 for equivalent CRS in (international)
     * feet.
     */
    public const EPSG_NATRF2022E2020_INDIANA_CASS = 'urn:ogc:def:crs:EPSG::22385';

    /**
     * NATRF2022e2020 / Indiana Cass (ft)
     * Extent: USA - Indiana - Cass county
     * Part of the Indiana Geospatial Coordinate System (InGCS). See code 22385 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_INDIANA_CASS_FT = 'urn:ogc:def:crs:EPSG::22386';

    /**
     * NATRF2022e2020 / Indiana Clark-Floyd-Scott
     * Extent: USA - Indiana - counties of Clark, Floyd and Scott
     * Part of the Indiana Geospatial Coordinate System (InGCS). Defined by InDoT as separate zones for each county,
     * these having identical parameter values. See code 22370 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_INDIANA_CLARK_FLOYD_SCOTT = 'urn:ogc:def:crs:EPSG::22369';

    /**
     * NATRF2022e2020 / Indiana Clark-Floyd-Scott (ft)
     * Extent: USA - Indiana - counties of Clark, Floyd and Scott
     * Part of the Indiana Geospatial Coordinate System (InGCS). Defined by InDoT as separate zones for each county,
     * these having identical parameter values. See code 22369 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_INDIANA_CLARK_FLOYD_SCOTT_FT = 'urn:ogc:def:crs:EPSG::22370';

    /**
     * NATRF2022e2020 / Indiana Clinton
     * Extent: USA - Indiana - Clinton county
     * Part of the Indiana Geospatial Coordinate System (InGCS). See code 22390 for equivalent CRS in (international)
     * feet.
     */
    public const EPSG_NATRF2022E2020_INDIANA_CLINTON = 'urn:ogc:def:crs:EPSG::22389';

    /**
     * NATRF2022e2020 / Indiana Clinton (ft)
     * Extent: USA - Indiana - Clinton county
     * Part of the Indiana Geospatial Coordinate System (InGCS). See code 22389 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_INDIANA_CLINTON_FT = 'urn:ogc:def:crs:EPSG::22390';

    /**
     * NATRF2022e2020 / Indiana Crawford-Lawrence-Orange
     * Extent: USA - Indiana - counties of Crawford, Lawrence and Orange
     * Part of the Indiana Geospatial Coordinate System (InGCS). Defined by InDoT as separate zones for each county,
     * these having identical parameter values. See code 22406 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_INDIANA_CRAWFORD_LAWRENCE_ORANGE = 'urn:ogc:def:crs:EPSG::22405';

    /**
     * NATRF2022e2020 / Indiana Crawford-Lawrence-Orange (ft)
     * Extent: USA - Indiana - counties of Crawford, Lawrence and Orange
     * Part of the Indiana Geospatial Coordinate System (InGCS). Defined by InDoT as separate zones for each county,
     * these having identical parameter values. See code 22405 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_INDIANA_CRAWFORD_LAWRENCE_ORANGE_FT = 'urn:ogc:def:crs:EPSG::22406';

    /**
     * NATRF2022e2020 / Indiana Dearborn-Ohio-Switzerland
     * Extent: USA - Indiana - counties of Dearborn, Ohio and Switzerland
     * Part of the Indiana Geospatial Coordinate System (InGCS). Defined by InDoT as separate zones for each county,
     * these having identical parameter values. See code 22306 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_INDIANA_DEARBORN_OHIO_SWITZERLAND = 'urn:ogc:def:crs:EPSG::22305';

    /**
     * NATRF2022e2020 / Indiana Dearborn-Ohio-Switzerland (ft)
     * Extent: USA - Indiana - counties of Dearborn, Ohio and Switzerland
     * Part of the Indiana Geospatial Coordinate System (InGCS). Defined by InDoT as separate zones for each county,
     * these having identical parameter values. See code 22305 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_INDIANA_DEARBORN_OHIO_SWITZERLAND_FT = 'urn:ogc:def:crs:EPSG::22306';

    /**
     * NATRF2022e2020 / Indiana Decatur-Rush
     * Extent: USA - Indiana - counties of Decatur and Rush
     * Part of the Indiana Geospatial Coordinate System (InGCS). Defined by InDoT as separate zones for each county,
     * these having identical parameter values. See code 22328 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_INDIANA_DECATUR_RUSH = 'urn:ogc:def:crs:EPSG::22327';

    /**
     * NATRF2022e2020 / Indiana Decatur-Rush (ft)
     * Extent: USA - Indiana - counties of Decatur and Rush
     * Part of the Indiana Geospatial Coordinate System (InGCS). Defined by InDoT as separate zones for each county,
     * these having identical parameter values. See code 22327 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_INDIANA_DECATUR_RUSH_FT = 'urn:ogc:def:crs:EPSG::22328';

    /**
     * NATRF2022e2020 / Indiana DeKalb
     * Extent: USA - Indiana - DeKalb county
     * Part of the Indiana Geospatial Coordinate System (InGCS). See code 22270 for equivalent CRS in (international)
     * feet.
     */
    public const EPSG_NATRF2022E2020_INDIANA_DEKALB = 'urn:ogc:def:crs:EPSG::22269';

    /**
     * NATRF2022e2020 / Indiana DeKalb (ft)
     * Extent: USA - Indiana - DeKalb county
     * Part of the Indiana Geospatial Coordinate System (InGCS). See code 22269 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_INDIANA_DEKALB_FT = 'urn:ogc:def:crs:EPSG::22270';

    /**
     * NATRF2022e2020 / Indiana Elkhart-Kosciusko-Wabash
     * Extent: USA - Indiana - counties of Elkhart, Kosciusko and Wabash
     * Part of the Indiana Geospatial Coordinate System (InGCS). Defined by InDoT as separate zones for each county,
     * these having identical parameter values. See code 22346 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_INDIANA_ELKHART_KOSCIUSKO_WABASH = 'urn:ogc:def:crs:EPSG::22345';

    /**
     * NATRF2022e2020 / Indiana Elkhart-Kosciusko-Wabash (ft)
     * Extent: USA - Indiana - counties of Elkhart, Kosciusko and Wabash
     * Part of the Indiana Geospatial Coordinate System (InGCS). Defined by InDoT as separate zones for each county,
     * these having identical parameter values. See code 22345 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_INDIANA_ELKHART_KOSCIUSKO_WABASH_FT = 'urn:ogc:def:crs:EPSG::22346';

    /**
     * NATRF2022e2020 / Indiana Fayette-Franklin-Union
     * Extent: USA - Indiana - counties of Fayette, Franklin and Union
     * Part of the Indiana Geospatial Coordinate System (InGCS). Defined by InDoT as separate zones for each county,
     * these having identical parameter values. See code 22304 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_INDIANA_FAYETTE_FRANKLIN_UNION = 'urn:ogc:def:crs:EPSG::22303';

    /**
     * NATRF2022e2020 / Indiana Fayette-Franklin-Union (ft)
     * Extent: USA - Indiana - counties of Fayette, Franklin and Union
     * Part of the Indiana Geospatial Coordinate System (InGCS). Defined by InDoT as separate zones for each county,
     * these having identical parameter values. See code 22303 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_INDIANA_FAYETTE_FRANKLIN_UNION_FT = 'urn:ogc:def:crs:EPSG::22304';

    /**
     * NATRF2022e2020 / Indiana (ft)
     * Extent: USA - Indiana
     * See code 22259 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_INDIANA_FT = 'urn:ogc:def:crs:EPSG::22260';

    /**
     * NATRF2022e2020 / Indiana Fulton-Marshall-St Joseph
     * Extent: USA - Indiana - counties of Fulton, Marshall and St Joseph
     * Part of the Indiana Geospatial Coordinate System (InGCS). Defined by InDoT as separate zones for each county,
     * these having identical parameter values. See code 22384 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_INDIANA_FULTON_MARSHALL_ST_JOSEPH = 'urn:ogc:def:crs:EPSG::22383';

    /**
     * NATRF2022e2020 / Indiana Fulton-Marshall-St Joseph (ft)
     * Extent: USA - Indiana - counties of Fulton, Marshall and St Joseph
     * Part of the Indiana Geospatial Coordinate System (InGCS). Defined by InDoT as separate zones for each county,
     * these having identical parameter values. See code 22383 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_INDIANA_FULTON_MARSHALL_ST_JOSEPH_FT = 'urn:ogc:def:crs:EPSG::22384';

    /**
     * NATRF2022e2020 / Indiana Grant
     * Extent: USA - Indiana - Grant county
     * Part of the Indiana Geospatial Coordinate System (InGCS). See code 22360 for equivalent CRS in (international)
     * feet.
     */
    public const EPSG_NATRF2022E2020_INDIANA_GRANT = 'urn:ogc:def:crs:EPSG::22359';

    /**
     * NATRF2022e2020 / Indiana Grant (ft)
     * Extent: USA - Indiana - Grant county
     * Part of the Indiana Geospatial Coordinate System (InGCS). See code 22359 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_INDIANA_GRANT_FT = 'urn:ogc:def:crs:EPSG::22360';

    /**
     * NATRF2022e2020 / Indiana Hamilton-Tipton
     * Extent: USA - Indiana - counties of Hamilton and Tipton
     * Part of the Indiana Geospatial Coordinate System (InGCS). Defined by InDoT as separate zones for each county,
     * these having identical parameter values. See code 22380 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_INDIANA_HAMILTON_TIPTON = 'urn:ogc:def:crs:EPSG::22379';

    /**
     * NATRF2022e2020 / Indiana Hamilton-Tipton (ft)
     * Extent: USA - Indiana - counties of Hamilton and Tipton
     * Part of the Indiana Geospatial Coordinate System (InGCS). Defined by InDoT as separate zones for each county,
     * these having identical parameter values. See code 22379 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_INDIANA_HAMILTON_TIPTON_FT = 'urn:ogc:def:crs:EPSG::22380';

    /**
     * NATRF2022e2020 / Indiana Hancock-Madison
     * Extent: USA - Indiana - counties of Hancock and Madison
     * Part of the Indiana Geospatial Coordinate System (InGCS). Defined by InDoT as separate zones for each county,
     * these having identical parameter values. See code 22362 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_INDIANA_HANCOCK_MADISON = 'urn:ogc:def:crs:EPSG::22361';

    /**
     * NATRF2022e2020 / Indiana Hancock-Madison (ft)
     * Extent: USA - Indiana - counties of Hancock and Madison
     * Part of the Indiana Geospatial Coordinate System (InGCS). Defined by InDoT as separate zones for each county,
     * these having identical parameter values. See code 22361 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_INDIANA_HANCOCK_MADISON_FT = 'urn:ogc:def:crs:EPSG::22362';

    /**
     * NATRF2022e2020 / Indiana Harrison-Washington
     * Extent: USA - Indiana - counties of Harrison and Washington
     * Part of the Indiana Geospatial Coordinate System (InGCS). Defined by InDoT as separate zones for each county,
     * these having identical parameter values. See code 22372 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_INDIANA_HARRISON_WASHINGTON = 'urn:ogc:def:crs:EPSG::22371';

    /**
     * NATRF2022e2020 / Indiana Harrison-Washington (ft)
     * Extent: USA - Indiana - counties of Harrison and Washington
     * Part of the Indiana Geospatial Coordinate System (InGCS). Defined by InDoT as separate zones for each county,
     * these having identical parameter values. See code 22371 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_INDIANA_HARRISON_WASHINGTON_FT = 'urn:ogc:def:crs:EPSG::22372';

    /**
     * NATRF2022e2020 / Indiana Henry
     * Extent: USA - Indiana - Henry county
     * Part of the Indiana Geospatial Coordinate System (InGCS). See code 22334 for equivalent CRS in (international)
     * feet.
     */
    public const EPSG_NATRF2022E2020_INDIANA_HENRY = 'urn:ogc:def:crs:EPSG::22333';

    /**
     * NATRF2022e2020 / Indiana Henry (ft)
     * Extent: USA - Indiana - Henry county
     * Part of the Indiana Geospatial Coordinate System (InGCS). See code 22333 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_INDIANA_HENRY_FT = 'urn:ogc:def:crs:EPSG::22334';

    /**
     * NATRF2022e2020 / Indiana Howard-Miami
     * Extent: USA - Indiana - counties of Howard and Miami
     * Part of the Indiana Geospatial Coordinate System (InGCS). Defined by InDoT as separate zones for each county,
     * these having identical parameter values. See code 22382 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_INDIANA_HOWARD_MIAMI = 'urn:ogc:def:crs:EPSG::22381';

    /**
     * NATRF2022e2020 / Indiana Howard-Miami (ft)
     * Extent: USA - Indiana - counties of Howard and Miami
     * Part of the Indiana Geospatial Coordinate System (InGCS). Defined by InDoT as separate zones for each county,
     * these having identical parameter values. See code 22381 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_INDIANA_HOWARD_MIAMI_FT = 'urn:ogc:def:crs:EPSG::22382';

    /**
     * NATRF2022e2020 / Indiana Huntington-Whitley
     * Extent: USA - Indiana - counties of Huntington and Whitley
     * Part of the Indiana Geospatial Coordinate System (InGCS). Defined by InDoT as separate zones for each county,
     * these having identical parameter values. See code 22342 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_INDIANA_HUNTINGTON_WHITLEY = 'urn:ogc:def:crs:EPSG::22341';

    /**
     * NATRF2022e2020 / Indiana Huntington-Whitley (ft)
     * Extent: USA - Indiana - counties of Huntington and Whitley
     * Part of the Indiana Geospatial Coordinate System (InGCS). Defined by InDoT as separate zones for each county,
     * these having identical parameter values. See code 22341 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_INDIANA_HUNTINGTON_WHITLEY_FT = 'urn:ogc:def:crs:EPSG::22342';

    /**
     * NATRF2022e2020 / Indiana Jackson
     * Extent: USA - Indiana - Jackson county
     * Part of the Indiana Geospatial Coordinate System (InGCS). See code 22374 for equivalent CRS in (international)
     * feet.
     */
    public const EPSG_NATRF2022E2020_INDIANA_JACKSON = 'urn:ogc:def:crs:EPSG::22373';

    /**
     * NATRF2022e2020 / Indiana Jackson (ft)
     * Extent: USA - Indiana - Jackson county
     * Part of the Indiana Geospatial Coordinate System (InGCS). See code 22373 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_INDIANA_JACKSON_FT = 'urn:ogc:def:crs:EPSG::22374';

    /**
     * NATRF2022e2020 / Indiana Jay
     * Extent: USA - Indiana - Jay county
     * Part of the Indiana Geospatial Coordinate System (InGCS). See code 22296 for equivalent CRS in (international)
     * feet.
     */
    public const EPSG_NATRF2022E2020_INDIANA_JAY = 'urn:ogc:def:crs:EPSG::22295';

    /**
     * NATRF2022e2020 / Indiana Jay (ft)
     * Extent: USA - Indiana - Jay county
     * Part of the Indiana Geospatial Coordinate System (InGCS). See code 22295 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_INDIANA_JAY_FT = 'urn:ogc:def:crs:EPSG::22296';

    /**
     * NATRF2022e2020 / Indiana Jefferson
     * Extent: USA - Indiana - Jefferson county
     * Part of the Indiana Geospatial Coordinate System (InGCS). See code 22324 for equivalent CRS in (international)
     * feet.
     */
    public const EPSG_NATRF2022E2020_INDIANA_JEFFERSON = 'urn:ogc:def:crs:EPSG::22323';

    /**
     * NATRF2022e2020 / Indiana Jefferson (ft)
     * Extent: USA - Indiana - Jefferson county
     * Part of the Indiana Geospatial Coordinate System (InGCS). See code 22323 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_INDIANA_JEFFERSON_FT = 'urn:ogc:def:crs:EPSG::22324';

    /**
     * NATRF2022e2020 / Indiana Jennings
     * Extent: USA - Indiana - Jennings county
     * Part of the Indiana Geospatial Coordinate System (InGCS). See code 22368 for equivalent CRS in (international)
     * feet.
     */
    public const EPSG_NATRF2022E2020_INDIANA_JENNINGS = 'urn:ogc:def:crs:EPSG::22367';

    /**
     * NATRF2022e2020 / Indiana Jennings (ft)
     * Extent: USA - Indiana - Jennings county
     * Part of the Indiana Geospatial Coordinate System (InGCS). See code 22367 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_INDIANA_JENNINGS_FT = 'urn:ogc:def:crs:EPSG::22368';

    /**
     * NATRF2022e2020 / Indiana Johnson-Marion
     * Extent: USA - Indiana - counties of Johnson and Marion
     * Part of the Indiana Geospatial Coordinate System (InGCS). Defined by InDoT as separate zones for each county,
     * these having identical parameter values. See code 22378 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_INDIANA_JOHNSON_MARION = 'urn:ogc:def:crs:EPSG::22377';

    /**
     * NATRF2022e2020 / Indiana Johnson-Marion (ft)
     * Extent: USA - Indiana - counties of Johnson and Marion
     * Part of the Indiana Geospatial Coordinate System (InGCS). Defined by InDoT as separate zones for each county,
     * these having identical parameter values. See code 22377 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_INDIANA_JOHNSON_MARION_FT = 'urn:ogc:def:crs:EPSG::22378';

    /**
     * NATRF2022e2020 / Indiana LaGrange-Noble
     * Extent: USA - Indiana - counties of LaGrange and Noble
     * Part of the Indiana Geospatial Coordinate System (InGCS). Defined by InDoT as separate zones for each county,
     * these having identical parameter values. See code 22344 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_INDIANA_LAGRANGE_NOBLE = 'urn:ogc:def:crs:EPSG::22343';

    /**
     * NATRF2022e2020 / Indiana LaGrange-Noble (ft)
     * Extent: USA - Indiana - counties of LaGrange and Noble
     * Part of the Indiana Geospatial Coordinate System (InGCS). Defined by InDoT as separate zones for each county,
     * these having identical parameter values. See code 22343 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_INDIANA_LAGRANGE_NOBLE_FT = 'urn:ogc:def:crs:EPSG::22344';

    /**
     * NATRF2022e2020 / Indiana Monroe-Morgan
     * Extent: USA - Indiana - counties of Monroe and Morgan
     * Part of the Indiana Geospatial Coordinate System (InGCS). Defined by InDoT as separate zones for each county,
     * these having identical parameter values. See code 22400 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_INDIANA_MONROE_MORGAN = 'urn:ogc:def:crs:EPSG::22399';

    /**
     * NATRF2022e2020 / Indiana Monroe-Morgan (ft)
     * Extent: USA - Indiana - counties of Monroe and Morgan
     * Part of the Indiana Geospatial Coordinate System (InGCS). Defined by InDoT as separate zones for each county,
     * these having identical parameter values. See code 22399 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_INDIANA_MONROE_MORGAN_FT = 'urn:ogc:def:crs:EPSG::22400';

    /**
     * NATRF2022e2020 / Indiana Perry
     * Extent: USA - Indiana - Perry county
     * Part of the Indiana Geospatial Coordinate System (InGCS). See code 22424 for equivalent CRS in (international)
     * feet.
     */
    public const EPSG_NATRF2022E2020_INDIANA_PERRY = 'urn:ogc:def:crs:EPSG::22423';

    /**
     * NATRF2022e2020 / Indiana Perry (ft)
     * Extent: USA - Indiana - Perry county
     * Part of the Indiana Geospatial Coordinate System (InGCS). See code 22423 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_INDIANA_PERRY_FT = 'urn:ogc:def:crs:EPSG::22424';

    /**
     * NATRF2022e2020 / Indiana Pike-Warrick
     * Extent: USA - Indiana - counties of Pike and Warrick
     * Part of the Indiana Geospatial Coordinate System (InGCS). Defined by InDoT as separate zones for each county,
     * these having identical parameter values. See code 22428 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_INDIANA_PIKE_WARRICK = 'urn:ogc:def:crs:EPSG::22427';

    /**
     * NATRF2022e2020 / Indiana Pike-Warrick (ft)
     * Extent: USA - Indiana - counties of Pike and Warrick
     * Part of the Indiana Geospatial Coordinate System (InGCS). Defined by InDoT as separate zones for each county,
     * these having identical parameter values. See code 22427 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_INDIANA_PIKE_WARRICK_FT = 'urn:ogc:def:crs:EPSG::22428';

    /**
     * NATRF2022e2020 / Indiana Randolph-Wayne
     * Extent: USA - Indiana - counties of Randolph and Wayne
     * Part of the Indiana Geospatial Coordinate System (InGCS). Defined by InDoT as separate zones for each county,
     * these having identical parameter values. See code 22298 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_INDIANA_RANDOLPH_WAYNE = 'urn:ogc:def:crs:EPSG::22297';

    /**
     * NATRF2022e2020 / Indiana Randolph-Wayne (ft)
     * Extent: USA - Indiana - counties of Randolph and Wayne
     * Part of the Indiana Geospatial Coordinate System (InGCS). Defined by InDoT as separate zones for each county,
     * these having identical parameter values. See code 22297 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_INDIANA_RANDOLPH_WAYNE_FT = 'urn:ogc:def:crs:EPSG::22298';

    /**
     * NATRF2022e2020 / Indiana Ripley
     * Extent: USA - Indiana - Ripley county
     * Part of the Indiana Geospatial Coordinate System (InGCS). See code 22326 for equivalent CRS in (international)
     * feet.
     */
    public const EPSG_NATRF2022E2020_INDIANA_RIPLEY = 'urn:ogc:def:crs:EPSG::22325';

    /**
     * NATRF2022e2020 / Indiana Ripley (ft)
     * Extent: USA - Indiana - Ripley county
     * Part of the Indiana Geospatial Coordinate System (InGCS). See code 22325 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_INDIANA_RIPLEY_FT = 'urn:ogc:def:crs:EPSG::22326';

    /**
     * NATRF2022e2020 / Indiana Shelby
     * Extent: USA - Indiana - Shelby county
     * Part of the Indiana Geospatial Coordinate System (InGCS). See code 22364 for equivalent CRS in (international)
     * feet.
     */
    public const EPSG_NATRF2022E2020_INDIANA_SHELBY = 'urn:ogc:def:crs:EPSG::22363';

    /**
     * NATRF2022e2020 / Indiana Shelby (ft)
     * Extent: USA - Indiana - Shelby county
     * Part of the Indiana Geospatial Coordinate System (InGCS). See code 22363 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_INDIANA_SHELBY_FT = 'urn:ogc:def:crs:EPSG::22364';

    /**
     * NATRF2022e2020 / Indiana Spencer
     * Extent: USA - Indiana - Spencer county
     * Part of the Indiana Geospatial Coordinate System (InGCS). See code 22426 for equivalent CRS in (international)
     * feet.
     */
    public const EPSG_NATRF2022E2020_INDIANA_SPENCER = 'urn:ogc:def:crs:EPSG::22425';

    /**
     * NATRF2022e2020 / Indiana Spencer (ft)
     * Extent: USA - Indiana - Spencer county
     * Part of the Indiana Geospatial Coordinate System (InGCS). See code 22425 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_INDIANA_SPENCER_FT = 'urn:ogc:def:crs:EPSG::22426';

    /**
     * NATRF2022e2020 / Indiana Steuben
     * Extent: USA - Indiana - Steuben county
     * Part of the Indiana Geospatial Coordinate System (InGCS). See code 22268 for equivalent CRS in (international)
     * feet.
     */
    public const EPSG_NATRF2022E2020_INDIANA_STEUBEN = 'urn:ogc:def:crs:EPSG::22267';

    /**
     * NATRF2022e2020 / Indiana Steuben (ft)
     * Extent: USA - Indiana - Steuben county
     * Part of the Indiana Geospatial Coordinate System (InGCS). See code 22267 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_INDIANA_STEUBEN_FT = 'urn:ogc:def:crs:EPSG::22268';

    /**
     * NATRF2022e2020 / Indiana Wells
     * Extent: USA - Indiana - Wells county
     * Part of the Indiana Geospatial Coordinate System (InGCS). See code 22340 for equivalent CRS in (international)
     * feet.
     */
    public const EPSG_NATRF2022E2020_INDIANA_WELLS = 'urn:ogc:def:crs:EPSG::22339';

    /**
     * NATRF2022e2020 / Indiana Wells (ft)
     * Extent: USA - Indiana - Wells county
     * Part of the Indiana Geospatial Coordinate System (InGCS). See code 22339 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_INDIANA_WELLS_FT = 'urn:ogc:def:crs:EPSG::22340';

    /**
     * NATRF2022e2020 / Iowa
     * Extent: USA - Iowa
     * See code 22476 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_IOWA = 'urn:ogc:def:crs:EPSG::22475';

    /**
     * NATRF2022e2020 / Iowa Ames-Des Moines
     * Extent: USA - Iowa - counties of Boone; Dallas; Madison; Polk; Story; Warren
     * Part of the Iowa Regional Coordinate System (IaRCS). See code 22492 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_IOWA_AMES_DES_MOINES = 'urn:ogc:def:crs:EPSG::22491';

    /**
     * NATRF2022e2020 / Iowa Ames-Des Moines (ft)
     * Extent: USA - Iowa - counties of Boone; Dallas; Madison; Polk; Story; Warren
     * Part of the Iowa Regional Coordinate System (IaRCS). See code 22491 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_IOWA_AMES_DES_MOINES_FT = 'urn:ogc:def:crs:EPSG::22492';

    /**
     * NATRF2022e2020 / Iowa Burlington
     * Extent: USA - Iowa - counties of Des Moines; Henry; Lee; Louisa; Muscatine
     * Part of the Iowa Regional Coordinate System (IaRCS). See code 22510 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_IOWA_BURLINGTON = 'urn:ogc:def:crs:EPSG::22509';

    /**
     * NATRF2022e2020 / Iowa Burlington (ft)
     * Extent: USA - Iowa - counties of Des Moines; Henry; Lee; Louisa; Muscatine
     * Part of the Iowa Regional Coordinate System (IaRCS). See code 22509 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_IOWA_BURLINGTON_FT = 'urn:ogc:def:crs:EPSG::22510';

    /**
     * NATRF2022e2020 / Iowa Carroll-Atlantic
     * Extent: USA - Iowa - counties of Adair; Audubon; Carroll; Cass; Greene; Guthrie
     * Part of the Iowa Regional Coordinate System (IaRCS). See code 22490 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_IOWA_CARROLL_ATLANTIC = 'urn:ogc:def:crs:EPSG::22489';

    /**
     * NATRF2022e2020 / Iowa Carroll-Atlantic (ft)
     * Extent: USA - Iowa - counties of Adair; Audubon; Carroll; Cass; Greene; Guthrie
     * Part of the Iowa Regional Coordinate System (IaRCS). See code 22489 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_IOWA_CARROLL_ATLANTIC_FT = 'urn:ogc:def:crs:EPSG::22490';

    /**
     * NATRF2022e2020 / Iowa Cedar Rapids
     * Extent: USA - Iowa - counties of Benton; Cedar; Iowa; Johnson; Jones; Linn
     * Part of the Iowa Regional Coordinate System (IaRCS). See code 22496 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_IOWA_CEDAR_RAPIDS = 'urn:ogc:def:crs:EPSG::22495';

    /**
     * NATRF2022e2020 / Iowa Cedar Rapids (ft)
     * Extent: USA - Iowa - counties of Benton; Cedar; Iowa; Johnson; Jones; Linn
     * Part of the Iowa Regional Coordinate System (IaRCS). See code 22495 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_IOWA_CEDAR_RAPIDS_FT = 'urn:ogc:def:crs:EPSG::22496';

    /**
     * NATRF2022e2020 / Iowa Council Bluffs
     * Extent: USA - Iowa - counties of Crawford; Fremont; Harrison; Mills; Monona; Pottawattamie; Shelby
     * Part of the Iowa Regional Coordinate System (IaRCS). See code 22488 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_IOWA_COUNCIL_BLUFFS = 'urn:ogc:def:crs:EPSG::22487';

    /**
     * NATRF2022e2020 / Iowa Council Bluffs (ft)
     * Extent: USA - Iowa - counties of Crawford; Fremont; Harrison; Mills; Monona; Pottawattamie; Shelby
     * Part of the Iowa Regional Coordinate System (IaRCS). See code 22487 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_IOWA_COUNCIL_BLUFFS_FT = 'urn:ogc:def:crs:EPSG::22488';

    /**
     * NATRF2022e2020 / Iowa Dubuque-Davenport
     * Extent: USA - Iowa - counties of Clinton; Dubuque; Jackson; Scott
     * Part of the Iowa Regional Coordinate System (IaRCS). See code 22498 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_IOWA_DUBUQUE_DAVENPORT = 'urn:ogc:def:crs:EPSG::22497';

    /**
     * NATRF2022e2020 / Iowa Dubuque-Davenport (ft)
     * Extent: USA - Iowa - counties of Clinton; Dubuque; Jackson; Scott
     * Part of the Iowa Regional Coordinate System (IaRCS). See code 22497 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_IOWA_DUBUQUE_DAVENPORT_FT = 'urn:ogc:def:crs:EPSG::22498';

    /**
     * NATRF2022e2020 / Iowa Elkader
     * Extent: USA - Iowa - counties of Allamakee; Clayton; Delaware
     * Part of the Iowa Regional Coordinate System (IaRCS). See code 22482 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_IOWA_ELKADER = 'urn:ogc:def:crs:EPSG::22481';

    /**
     * NATRF2022e2020 / Iowa Elkader (ft)
     * Extent: USA - Iowa - counties of Allamakee; Clayton; Delaware
     * Part of the Iowa Regional Coordinate System (IaRCS). See code 22481 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_IOWA_ELKADER_FT = 'urn:ogc:def:crs:EPSG::22482';

    /**
     * NATRF2022e2020 / Iowa Fairfield
     * Extent: USA - Iowa - counties of Jefferson; Keokuk; Van Buren; Washington
     * Part of the Iowa Regional Coordinate System (IaRCS). See code 22508 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_IOWA_FAIRFIELD = 'urn:ogc:def:crs:EPSG::22507';

    /**
     * NATRF2022e2020 / Iowa Fairfield (ft)
     * Extent: USA - Iowa - counties of Jefferson; Keokuk; Van Buren; Washington
     * Part of the Iowa Regional Coordinate System (IaRCS). See code 22507 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_IOWA_FAIRFIELD_FT = 'urn:ogc:def:crs:EPSG::22508';

    /**
     * NATRF2022e2020 / Iowa (ft)
     * Extent: USA - Iowa
     * See code 22475 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_IOWA_FT = 'urn:ogc:def:crs:EPSG::22476';

    /**
     * NATRF2022e2020 / Iowa Mason City
     * Extent: USA - Iowa - counties of Cerro Gordo; Chickasaw; Floyd; Hancock; Howard; Mitchell; Winnebago;
     * Winneshiek; Worth
     * Part of the Iowa Regional Coordinate System (IaRCS). See code 22480 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_IOWA_MASON_CITY = 'urn:ogc:def:crs:EPSG::22479';

    /**
     * NATRF2022e2020 / Iowa Mason City (ft)
     * Extent: USA - Iowa - counties of Cerro Gordo; Chickasaw; Floyd; Hancock; Howard; Mitchell; Winnebago;
     * Winneshiek; Worth
     * Part of the Iowa Regional Coordinate System (IaRCS). See code 22479 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_IOWA_MASON_CITY_FT = 'urn:ogc:def:crs:EPSG::22480';

    /**
     * NATRF2022e2020 / Iowa Newton
     * Extent: USA - Iowa - counties of Jasper; Mahaska; Marion; Marshall; Poweshiek; Tama
     * Part of the Iowa Regional Coordinate System (IaRCS). See code 22494 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_IOWA_NEWTON = 'urn:ogc:def:crs:EPSG::22493';

    /**
     * NATRF2022e2020 / Iowa Newton (ft)
     * Extent: USA - Iowa - counties of Jasper; Mahaska; Marion; Marshall; Poweshiek; Tama
     * Part of the Iowa Regional Coordinate System (IaRCS). See code 22493 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_IOWA_NEWTON_FT = 'urn:ogc:def:crs:EPSG::22494';

    /**
     * NATRF2022e2020 / Iowa Red Oak-Ottumwa
     * Extent: USA - Iowa - counties of Adams; Appanoose; Clarke; Davis; Decatur; Lucas; Monroe; Montgomery; Page;
     * Ringgold; Taylor; Union; Wapello; Wayne
     * Part of the Iowa Regional Coordinate System (IaRCS). See code 22506 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_IOWA_RED_OAK_OTTUMWA = 'urn:ogc:def:crs:EPSG::22505';

    /**
     * NATRF2022e2020 / Iowa Red Oak-Ottumwa (ft)
     * Extent: USA - Iowa - counties of Adams; Appanoose; Clarke; Davis; Decatur; Lucas; Monroe; Montgomery; Page;
     * Ringgold; Taylor; Union; Wapello; Wayne
     * Part of the Iowa Regional Coordinate System (IaRCS). See code 22505 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_IOWA_RED_OAK_OTTUMWA_FT = 'urn:ogc:def:crs:EPSG::22506';

    /**
     * NATRF2022e2020 / Iowa Sioux City-Iowa Falls
     * Extent: USA - Iowa - counties of Buena Vista; Calhoun; Cherokee; Franklin; Hamilton; Hardin; Humboldt; Ida;
     * Plymouth; Pocahontas; Sac; Webster; Woodbury; Wright
     * Part of the Iowa Regional Coordinate System (IaRCS). See code 22484 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_IOWA_SIOUX_CITY_IOWA_FALLS = 'urn:ogc:def:crs:EPSG::22483';

    /**
     * NATRF2022e2020 / Iowa Sioux City-Iowa Falls (ft)
     * Extent: USA - Iowa - counties of Buena Vista; Calhoun; Cherokee; Franklin; Hamilton; Hardin; Humboldt; Ida;
     * Plymouth; Pocahontas; Sac; Webster; Woodbury; Wright
     * Part of the Iowa Regional Coordinate System (IaRCS). See code 22483 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_IOWA_SIOUX_CITY_IOWA_FALLS_FT = 'urn:ogc:def:crs:EPSG::22484';

    /**
     * NATRF2022e2020 / Iowa Spencer
     * Extent: USA - Iowa - counties of Clay; Dickinson; Emmet; Kossuth; Lyon; O'Brien; Osceola; Palo Alto; Sioux
     * Part of the Iowa Regional Coordinate System (IaRCS). See code 22478 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_IOWA_SPENCER = 'urn:ogc:def:crs:EPSG::22477';

    /**
     * NATRF2022e2020 / Iowa Spencer (ft)
     * Extent: USA - Iowa - counties of Clay; Dickinson; Emmet; Kossuth; Lyon; O'Brien; Osceola; Palo Alto; Sioux
     * Part of the Iowa Regional Coordinate System (IaRCS). See code 22477 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_IOWA_SPENCER_FT = 'urn:ogc:def:crs:EPSG::22478';

    /**
     * NATRF2022e2020 / Iowa Waterloo
     * Extent: USA - Iowa - counties of Black Hawk; Bremer; Buchanan; Butler; Fayette; Grundy
     * Part of the Iowa Regional Coordinate System (IaRCS). See code 22486 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_IOWA_WATERLOO = 'urn:ogc:def:crs:EPSG::22485';

    /**
     * NATRF2022e2020 / Iowa Waterloo (ft)
     * Extent: USA - Iowa - counties of Black Hawk; Bremer; Buchanan; Butler; Fayette; Grundy
     * Part of the Iowa Regional Coordinate System (IaRCS). See code 22485 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_IOWA_WATERLOO_FT = 'urn:ogc:def:crs:EPSG::22486';

    /**
     * NATRF2022e2020 / Kentucky
     * Extent: USA - Kentucky
     * See code 22562 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_KENTUCKY = 'urn:ogc:def:crs:EPSG::22561';

    /**
     * NATRF2022e2020 / Kentucky (ft)
     * Extent: USA - Kentucky
     * See code 22561 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_KENTUCKY_FT = 'urn:ogc:def:crs:EPSG::22562';

    /**
     * NATRF2022e2020 / Maine
     * Extent: USA - Maine
     * See code 22584 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_MAINE = 'urn:ogc:def:crs:EPSG::22583';

    /**
     * NATRF2022e2020 / Maine Central
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
     * See code 22588 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_MAINE_CENTRAL = 'urn:ogc:def:crs:EPSG::22587';

    /**
     * NATRF2022e2020 / Maine Central (ft)
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
     * See code 22587 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_MAINE_CENTRAL_FT = 'urn:ogc:def:crs:EPSG::22588';

    /**
     * NATRF2022e2020 / Maine East
     * Extent: USA - Maine east of approximately 68°25'W. The area is bounded by the following: Beginning at the point
     * determined by the intersection of the Maine State line and the Fort Kent - Frenchville town line, thence
     * continuing easterly and then southerly along the state line to the boundary of the State of Maine as determined
     * by Maritime law, thence following the State boundary westerly to the intersection of the Knox and Hancock County
     * line, thence northerly along the easterly boundary of the Maine 2000 Central Zone, as defined, to the point of
     * beginning
     * See code 22586 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_MAINE_EAST = 'urn:ogc:def:crs:EPSG::22585';

    /**
     * NATRF2022e2020 / Maine East (ft)
     * Extent: USA - Maine east of approximately 68°25'W. The area is bounded by the following: Beginning at the point
     * determined by the intersection of the Maine State line and the Fort Kent - Frenchville town line, thence
     * continuing easterly and then southerly along the state line to the boundary of the State of Maine as determined
     * by Maritime law, thence following the State boundary westerly to the intersection of the Knox and Hancock County
     * line, thence northerly along the easterly boundary of the Maine 2000 Central Zone, as defined, to the point of
     * beginning
     * See code 22585 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_MAINE_EAST_FT = 'urn:ogc:def:crs:EPSG::22586';

    /**
     * NATRF2022e2020 / Maine (ft)
     * Extent: USA - Maine
     * See code 22583 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_MAINE_FT = 'urn:ogc:def:crs:EPSG::22584';

    /**
     * NATRF2022e2020 / Maine West
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
     * See code 22590 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_MAINE_WEST = 'urn:ogc:def:crs:EPSG::22589';

    /**
     * NATRF2022e2020 / Maine West (ft)
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
     * See code 22589 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_MAINE_WEST_FT = 'urn:ogc:def:crs:EPSG::22590';

    /**
     * NATRF2022e2020 / Maryland
     * Extent: USA - Maryland
     * See code 22592 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_MARYLAND = 'urn:ogc:def:crs:EPSG::22591';

    /**
     * NATRF2022e2020 / Maryland (ft)
     * Extent: USA - Maryland
     * See code 22591 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_MARYLAND_FT = 'urn:ogc:def:crs:EPSG::22592';

    /**
     * NATRF2022e2020 / Massachusetts
     * Extent: USA - Massachusetts
     * See code 22594 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_MASSACHUSETTS = 'urn:ogc:def:crs:EPSG::22593';

    /**
     * NATRF2022e2020 / Massachusetts (ft)
     * Extent: USA - Massachusetts
     * See code 22593 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_MASSACHUSETTS_FT = 'urn:ogc:def:crs:EPSG::22594';

    /**
     * NATRF2022e2020 / Michigan
     * Extent: USA - Michigan
     * See code 22596 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_MICHIGAN = 'urn:ogc:def:crs:EPSG::22595';

    /**
     * NATRF2022e2020 / Michigan (ft)
     * Extent: USA - Michigan
     * See code 22595 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_MICHIGAN_FT = 'urn:ogc:def:crs:EPSG::22596';

    /**
     * NATRF2022e2020 / Minnesota
     * Extent: USA - Minnesota
     * See code 22674 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_MINNESOTA = 'urn:ogc:def:crs:EPSG::22673';

    /**
     * NATRF2022e2020 / Minnesota (ft)
     * Extent: USA - Minnesota
     * See code 22673 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_MINNESOTA_FT = 'urn:ogc:def:crs:EPSG::22674';

    /**
     * NATRF2022e2020 / Missouri
     * Extent: USA - Missouri
     * See code 22784 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_MISSOURI = 'urn:ogc:def:crs:EPSG::22783';

    /**
     * NATRF2022e2020 / Missouri (ft)
     * Extent: USA - Missouri
     * See code 22783 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_MISSOURI_FT = 'urn:ogc:def:crs:EPSG::22784';

    /**
     * NATRF2022e2020 / Montana
     * Extent: USA - Montana
     * See code 22876 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_MONTANA = 'urn:ogc:def:crs:EPSG::22875';

    /**
     * NATRF2022e2020 / Montana (ft)
     * Extent: USA - Montana
     * See code 22875 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_MONTANA_FT = 'urn:ogc:def:crs:EPSG::22876';

    /**
     * NATRF2022e2020 / Nebraska
     * Extent: USA - Nebraska
     * See code 22920 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_NEBRASKA = 'urn:ogc:def:crs:EPSG::22919';

    /**
     * NATRF2022e2020 / Nebraska (ft)
     * Extent: USA - Nebraska
     * See code 22919 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_NEBRASKA_FT = 'urn:ogc:def:crs:EPSG::22920';

    /**
     * NATRF2022e2020 / Nevada
     * Extent: USA - Nevada
     * See code 22976 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_NEVADA = 'urn:ogc:def:crs:EPSG::22975';

    /**
     * NATRF2022e2020 / Nevada Central
     * Extent: USA - Nevada - counties of Lander; Nye
     * See code 22980 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_NEVADA_CENTRAL = 'urn:ogc:def:crs:EPSG::22979';

    /**
     * NATRF2022e2020 / Nevada Central (ft)
     * Extent: USA - Nevada - counties of Lander; Nye
     * See code 22979 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_NEVADA_CENTRAL_FT = 'urn:ogc:def:crs:EPSG::22980';

    /**
     * NATRF2022e2020 / Nevada East
     * Extent: USA - Nevada - counties of Clark; Elko; Eureka; Lincoln; White Pine
     * See code 22978 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_NEVADA_EAST = 'urn:ogc:def:crs:EPSG::22977';

    /**
     * NATRF2022e2020 / Nevada East (ft)
     * Extent: USA - Nevada - counties of Clark; Elko; Eureka; Lincoln; White Pine
     * See code 22977 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_NEVADA_EAST_FT = 'urn:ogc:def:crs:EPSG::22978';

    /**
     * NATRF2022e2020 / Nevada (ft)
     * Extent: USA - Nevada
     * See code 22975 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_NEVADA_FT = 'urn:ogc:def:crs:EPSG::22976';

    /**
     * NATRF2022e2020 / Nevada West
     * Extent: USA - Nevada - counties of Churchill; Douglas; Esmeralda; Humboldt; Lyon; Mineral; Pershing; Storey;
     * Washoe
     * See code 22982 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_NEVADA_WEST = 'urn:ogc:def:crs:EPSG::22981';

    /**
     * NATRF2022e2020 / Nevada West (ft)
     * Extent: USA - Nevada - counties of Churchill; Douglas; Esmeralda; Humboldt; Lyon; Mineral; Pershing; Storey;
     * Washoe
     * See code 22981 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_NEVADA_WEST_FT = 'urn:ogc:def:crs:EPSG::22982';

    /**
     * NATRF2022e2020 / New Hampshire
     * Extent: USA - New Hampshire
     * See code 22984 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_NEW_HAMPSHIRE = 'urn:ogc:def:crs:EPSG::22983';

    /**
     * NATRF2022e2020 / New Hampshire (ft)
     * Extent: USA - New Hampshire
     * See code 22983 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_NEW_HAMPSHIRE_FT = 'urn:ogc:def:crs:EPSG::22984';

    /**
     * NATRF2022e2020 / New Jersey
     * Extent: USA - New Jersey
     * See code 22986 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_NEW_JERSEY = 'urn:ogc:def:crs:EPSG::22985';

    /**
     * NATRF2022e2020 / New Jersey (ft)
     * Extent: USA - New Jersey
     * See code 22985 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_NEW_JERSEY_FT = 'urn:ogc:def:crs:EPSG::22986';

    /**
     * NATRF2022e2020 / New Mexico
     * Extent: USA - New Mexico
     * See code 22988 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_NEW_MEXICO = 'urn:ogc:def:crs:EPSG::22987';

    /**
     * NATRF2022e2020 / New Mexico Central
     * Extent: USA - New Mexico - counties of Bernalillo; Dona Ana; Lincoln; Los Alamos; Otero; Rio Arriba; Sandoval;
     * Santa Fe; Socorro; Taos; Torrance; Valencia
     * See code 22996 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_NEW_MEXICO_CENTRAL = 'urn:ogc:def:crs:EPSG::22995';

    /**
     * NATRF2022e2020 / New Mexico Central (ft)
     * Extent: USA - New Mexico - counties of Bernalillo; Dona Ana; Lincoln; Los Alamos; Otero; Rio Arriba; Sandoval;
     * Santa Fe; Socorro; Taos; Torrance; Valencia
     * See code 22995 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_NEW_MEXICO_CENTRAL_FT = 'urn:ogc:def:crs:EPSG::22996';

    /**
     * NATRF2022e2020 / New Mexico East
     * Extent: USA - New Mexico - counties of Chaves; Colfax; Curry; De Baca; Eddy; Guadalupe; Harding; Lea; Mora;
     * Quay; Roosevelt; San Miguel; Union
     * See code 22990 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_NEW_MEXICO_EAST = 'urn:ogc:def:crs:EPSG::22989';

    /**
     * NATRF2022e2020 / New Mexico East (ft)
     * Extent: USA - New Mexico - counties of Chaves; Colfax; Curry; De Baca; Eddy; Guadalupe; Harding; Lea; Mora;
     * Quay; Roosevelt; San Miguel; Union
     * See code 22989 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_NEW_MEXICO_EAST_FT = 'urn:ogc:def:crs:EPSG::22990';

    /**
     * NATRF2022e2020 / New Mexico (ft)
     * Extent: USA - New Mexico
     * See code 22987 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_NEW_MEXICO_FT = 'urn:ogc:def:crs:EPSG::22988';

    /**
     * NATRF2022e2020 / New Mexico West
     * Extent: USA - New Mexico - counties of Catron; Cibola; Grant; Hidalgo; Luna; McKinley; San Juan; Sierra
     * See code 22998 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_NEW_MEXICO_WEST = 'urn:ogc:def:crs:EPSG::22997';

    /**
     * NATRF2022e2020 / New Mexico West (ft)
     * Extent: USA - New Mexico - counties of Catron; Cibola; Grant; Hidalgo; Luna; McKinley; San Juan; Sierra
     * See code 22997 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_NEW_MEXICO_WEST_FT = 'urn:ogc:def:crs:EPSG::22998';

    /**
     * NATRF2022e2020 / New York
     * Extent: USA - New York
     * See code 23008 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_NEW_YORK = 'urn:ogc:def:crs:EPSG::23007';

    /**
     * NATRF2022e2020 / New York Central
     * Extent: USA - New York - counties of Broome; Cayuga; Chemung; Chenango; Cortland; Jefferson; Lewis; Madison;
     * Oneida; Onondaga; Ontario; Oswego; Schuyler; Seneca; Steuben; Tioga; Tompkins; Wayne; Yates
     * See code 23012 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_NEW_YORK_CENTRAL = 'urn:ogc:def:crs:EPSG::23011';

    /**
     * NATRF2022e2020 / New York Central (ft)
     * Extent: USA - New York - counties of Broome; Cayuga; Chemung; Chenango; Cortland; Jefferson; Lewis; Madison;
     * Oneida; Onondaga; Ontario; Oswego; Schuyler; Seneca; Steuben; Tioga; Tompkins; Wayne; Yates
     * See code 23011 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_NEW_YORK_CENTRAL_FT = 'urn:ogc:def:crs:EPSG::23012';

    /**
     * NATRF2022e2020 / New York East
     * Extent: USA - New York mainland - counties of Albany; Clinton; Columbia; Delaware; Dutchess; Essex; Franklin;
     * Fulton; Greene; Hamilton; Herkimer; Montgomery; Orange; Otsego; Putnam; Rensselaer; Rockland; Saratoga;
     * Schenectady; Schoharie; St Lawrence; Sullivan; Ulster; Warren; Washington; Westchester
     * See code 23010 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_NEW_YORK_EAST = 'urn:ogc:def:crs:EPSG::23009';

    /**
     * NATRF2022e2020 / New York East (ft)
     * Extent: USA - New York mainland - counties of Albany; Clinton; Columbia; Delaware; Dutchess; Essex; Franklin;
     * Fulton; Greene; Hamilton; Herkimer; Montgomery; Orange; Otsego; Putnam; Rensselaer; Rockland; Saratoga;
     * Schenectady; Schoharie; St Lawrence; Sullivan; Ulster; Warren; Washington; Westchester
     * See code 23009 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_NEW_YORK_EAST_FT = 'urn:ogc:def:crs:EPSG::23010';

    /**
     * NATRF2022e2020 / New York (ft)
     * Extent: USA - New York
     * See code 23007 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_NEW_YORK_FT = 'urn:ogc:def:crs:EPSG::23008';

    /**
     * NATRF2022e2020 / New York Long Island
     * Extent: USA - New York - counties of Bronx; Kings; Nassau; New York; Queens; Richmond; Suffolk
     * See code 23016 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_NEW_YORK_LONG_ISLAND = 'urn:ogc:def:crs:EPSG::23015';

    /**
     * NATRF2022e2020 / New York Long Island (ft)
     * Extent: USA - New York - counties of Bronx; Kings; Nassau; New York; Queens; Richmond; Suffolk
     * See code 23015 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_NEW_YORK_LONG_ISLAND_FT = 'urn:ogc:def:crs:EPSG::23016';

    /**
     * NATRF2022e2020 / New York West
     * Extent: USA - New York - counties of Allegany; Cattaraugus; Chautauqua; Erie; Genesee; Livingston; Monroe;
     * Niagara; Orleans; Wyoming
     * See code 23014 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_NEW_YORK_WEST = 'urn:ogc:def:crs:EPSG::23013';

    /**
     * NATRF2022e2020 / New York West (ft)
     * Extent: USA - New York - counties of Allegany; Cattaraugus; Chautauqua; Erie; Genesee; Livingston; Monroe;
     * Niagara; Orleans; Wyoming
     * See code 23013 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_NEW_YORK_WEST_FT = 'urn:ogc:def:crs:EPSG::23014';

    /**
     * NATRF2022e2020 / North Carolina
     * Extent: USA - North Carolina
     * See code 23018 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_NORTH_CAROLINA = 'urn:ogc:def:crs:EPSG::23017';

    /**
     * NATRF2022e2020 / North Carolina (ft)
     * Extent: USA - North Carolina
     * See code 23017 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_NORTH_CAROLINA_FT = 'urn:ogc:def:crs:EPSG::23018';

    /**
     * NATRF2022e2020 / North Dakota
     * Extent: USA - North Dakota
     * See code 23020 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_NORTH_DAKOTA = 'urn:ogc:def:crs:EPSG::23019';

    /**
     * NATRF2022e2020 / North Dakota (ft)
     * Extent: USA - North Dakota
     * See code 23019 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_NORTH_DAKOTA_FT = 'urn:ogc:def:crs:EPSG::23020';

    /**
     * NATRF2022e2020 / Ohio
     * Extent: USA - Ohio
     * See code 23066 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_OHIO = 'urn:ogc:def:crs:EPSG::23065';

    /**
     * NATRF2022e2020 / Ohio Adams
     * Extent: USA - Ohio - Adams county
     * Part of the Ohio County Coordinate System (OCCS). See code 23068 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_OHIO_ADAMS = 'urn:ogc:def:crs:EPSG::23067';

    /**
     * NATRF2022e2020 / Ohio Adams (ft)
     * Extent: USA - Ohio - Adams county
     * Part of the Ohio County Coordinate System (OCCS). See code 23067 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_OHIO_ADAMS_FT = 'urn:ogc:def:crs:EPSG::23068';

    /**
     * NATRF2022e2020 / Ohio Allen
     * Extent: USA - Ohio - Allen county
     * Part of the Ohio County Coordinate System (OCCS). See code 23070 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_OHIO_ALLEN = 'urn:ogc:def:crs:EPSG::23069';

    /**
     * NATRF2022e2020 / Ohio Allen (ft)
     * Extent: USA - Ohio - Allen county
     * Part of the Ohio County Coordinate System (OCCS). See code 23069 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_OHIO_ALLEN_FT = 'urn:ogc:def:crs:EPSG::23070';

    /**
     * NATRF2022e2020 / Ohio Ashland
     * Extent: USA - Ohio - Ashland county
     * Part of the Ohio County Coordinate System (OCCS). See code 23072 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_OHIO_ASHLAND = 'urn:ogc:def:crs:EPSG::23071';

    /**
     * NATRF2022e2020 / Ohio Ashland (ft)
     * Extent: USA - Ohio - Ashland county
     * Part of the Ohio County Coordinate System (OCCS). See code 23071 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_OHIO_ASHLAND_FT = 'urn:ogc:def:crs:EPSG::23072';

    /**
     * NATRF2022e2020 / Ohio Ashtabula
     * Extent: USA - Ohio - Ashtabula county
     * Part of the Ohio County Coordinate System (OCCS). See code 23074 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_OHIO_ASHTABULA = 'urn:ogc:def:crs:EPSG::23073';

    /**
     * NATRF2022e2020 / Ohio Ashtabula (ft)
     * Extent: USA - Ohio - Ashtabula county
     * Part of the Ohio County Coordinate System (OCCS). See code 23073 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_OHIO_ASHTABULA_FT = 'urn:ogc:def:crs:EPSG::23074';

    /**
     * NATRF2022e2020 / Ohio Athens
     * Extent: USA - Ohio - Athens county
     * Part of the Ohio County Coordinate System (OCCS). See code 23076 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_OHIO_ATHENS = 'urn:ogc:def:crs:EPSG::23075';

    /**
     * NATRF2022e2020 / Ohio Athens (ft)
     * Extent: USA - Ohio - Athens county
     * Part of the Ohio County Coordinate System (OCCS). See code 23075 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_OHIO_ATHENS_FT = 'urn:ogc:def:crs:EPSG::23076';

    /**
     * NATRF2022e2020 / Ohio Auglaize
     * Extent: USA - Ohio - Auglaize county
     * Part of the Ohio County Coordinate System (OCCS). See code 23078 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_OHIO_AUGLAIZE = 'urn:ogc:def:crs:EPSG::23077';

    /**
     * NATRF2022e2020 / Ohio Auglaize (ft)
     * Extent: USA - Ohio - Auglaize county
     * Part of the Ohio County Coordinate System (OCCS). See code 23077 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_OHIO_AUGLAIZE_FT = 'urn:ogc:def:crs:EPSG::23078';

    /**
     * NATRF2022e2020 / Ohio Belmont
     * Extent: USA - Ohio - Belmont county
     * Part of the Ohio County Coordinate System (OCCS). See code 23080 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_OHIO_BELMONT = 'urn:ogc:def:crs:EPSG::23079';

    /**
     * NATRF2022e2020 / Ohio Belmont (ft)
     * Extent: USA - Ohio - Belmont county
     * Part of the Ohio County Coordinate System (OCCS). See code 23079 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_OHIO_BELMONT_FT = 'urn:ogc:def:crs:EPSG::23080';

    /**
     * NATRF2022e2020 / Ohio Brown
     * Extent: USA - Ohio - Brown county
     * Part of the Ohio County Coordinate System (OCCS). See code 23082 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_OHIO_BROWN = 'urn:ogc:def:crs:EPSG::23081';

    /**
     * NATRF2022e2020 / Ohio Brown (ft)
     * Extent: USA - Ohio - Brown county
     * Part of the Ohio County Coordinate System (OCCS). See code 23081 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_OHIO_BROWN_FT = 'urn:ogc:def:crs:EPSG::23082';

    /**
     * NATRF2022e2020 / Ohio Butler
     * Extent: USA - Ohio - Butler county
     * Part of the Ohio County Coordinate System (OCCS). See code 23084 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_OHIO_BUTLER = 'urn:ogc:def:crs:EPSG::23083';

    /**
     * NATRF2022e2020 / Ohio Butler (ft)
     * Extent: USA - Ohio - Butler county
     * Part of the Ohio County Coordinate System (OCCS). See code 23083 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_OHIO_BUTLER_FT = 'urn:ogc:def:crs:EPSG::23084';

    /**
     * NATRF2022e2020 / Ohio Carroll
     * Extent: USA - Ohio - Carroll county
     * Part of the Ohio County Coordinate System (OCCS). See code 23086 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_OHIO_CARROLL = 'urn:ogc:def:crs:EPSG::23085';

    /**
     * NATRF2022e2020 / Ohio Carroll (ft)
     * Extent: USA - Ohio - Carroll county
     * Part of the Ohio County Coordinate System (OCCS). See code 23085 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_OHIO_CARROLL_FT = 'urn:ogc:def:crs:EPSG::23086';

    /**
     * NATRF2022e2020 / Ohio Champaign
     * Extent: USA - Ohio - Champaign county
     * Part of the Ohio County Coordinate System (OCCS). See code 23088 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_OHIO_CHAMPAIGN = 'urn:ogc:def:crs:EPSG::23087';

    /**
     * NATRF2022e2020 / Ohio Champaign (ft)
     * Extent: USA - Ohio - Champaign county
     * Part of the Ohio County Coordinate System (OCCS). See code 23087 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_OHIO_CHAMPAIGN_FT = 'urn:ogc:def:crs:EPSG::23088';

    /**
     * NATRF2022e2020 / Ohio Clark
     * Extent: USA - Ohio - Clark county
     * Part of the Ohio County Coordinate System (OCCS). See code 23092 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_OHIO_CLARK = 'urn:ogc:def:crs:EPSG::23091';

    /**
     * NATRF2022e2020 / Ohio Clark (ft)
     * Extent: USA - Ohio - Clark county
     * Part of the Ohio County Coordinate System (OCCS). See code 23091 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_OHIO_CLARK_FT = 'urn:ogc:def:crs:EPSG::23092';

    /**
     * NATRF2022e2020 / Ohio Clermont
     * Extent: USA - Ohio - Clermont county
     * Part of the Ohio County Coordinate System (OCCS). See code 23094 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_OHIO_CLERMONT = 'urn:ogc:def:crs:EPSG::23093';

    /**
     * NATRF2022e2020 / Ohio Clermont (ft)
     * Extent: USA - Ohio - Clermont county
     * Part of the Ohio County Coordinate System (OCCS). See code 23093 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_OHIO_CLERMONT_FT = 'urn:ogc:def:crs:EPSG::23094';

    /**
     * NATRF2022e2020 / Ohio Clinton
     * Extent: USA - Ohio - Clinton county
     * Part of the Ohio County Coordinate System (OCCS). See code 23098 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_OHIO_CLINTON = 'urn:ogc:def:crs:EPSG::23097';

    /**
     * NATRF2022e2020 / Ohio Clinton (ft)
     * Extent: USA - Ohio - Clinton county
     * Part of the Ohio County Coordinate System (OCCS). See code 23097 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_OHIO_CLINTON_FT = 'urn:ogc:def:crs:EPSG::23098';

    /**
     * NATRF2022e2020 / Ohio Columbiana
     * Extent: USA - Ohio - Columbiana county
     * Part of the Ohio County Coordinate System (OCCS). See code 23100 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_OHIO_COLUMBIANA = 'urn:ogc:def:crs:EPSG::23099';

    /**
     * NATRF2022e2020 / Ohio Columbiana (ft)
     * Extent: USA - Ohio - Columbiana county
     * Part of the Ohio County Coordinate System (OCCS). See code 23099 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_OHIO_COLUMBIANA_FT = 'urn:ogc:def:crs:EPSG::23100';

    /**
     * NATRF2022e2020 / Ohio Coshocton
     * Extent: USA - Ohio - Coshocton county
     * Part of the Ohio County Coordinate System (OCCS). See code 23106 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_OHIO_COSHOCTON = 'urn:ogc:def:crs:EPSG::23105';

    /**
     * NATRF2022e2020 / Ohio Coshocton (ft)
     * Extent: USA - Ohio - Coshocton county
     * Part of the Ohio County Coordinate System (OCCS). See code 23105 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_OHIO_COSHOCTON_FT = 'urn:ogc:def:crs:EPSG::23106';

    /**
     * NATRF2022e2020 / Ohio Crawford
     * Extent: USA - Ohio - Crawford county
     * Part of the Ohio County Coordinate System (OCCS). See code 23108 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_OHIO_CRAWFORD = 'urn:ogc:def:crs:EPSG::23107';

    /**
     * NATRF2022e2020 / Ohio Crawford (ft)
     * Extent: USA - Ohio - Crawford county
     * Part of the Ohio County Coordinate System (OCCS). See code 23107 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_OHIO_CRAWFORD_FT = 'urn:ogc:def:crs:EPSG::23108';

    /**
     * NATRF2022e2020 / Ohio Cuyahoga
     * Extent: USA - Ohio - Cuyahoga county
     * Part of the Ohio County Coordinate System (OCCS). See code 23110 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_OHIO_CUYAHOGA = 'urn:ogc:def:crs:EPSG::23109';

    /**
     * NATRF2022e2020 / Ohio Cuyahoga (ft)
     * Extent: USA - Ohio - Cuyahoga county
     * Part of the Ohio County Coordinate System (OCCS). See code 23109 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_OHIO_CUYAHOGA_FT = 'urn:ogc:def:crs:EPSG::23110';

    /**
     * NATRF2022e2020 / Ohio Darke
     * Extent: USA - Ohio - Darke county
     * Part of the Ohio County Coordinate System (OCCS). See code 23112 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_OHIO_DARKE = 'urn:ogc:def:crs:EPSG::23111';

    /**
     * NATRF2022e2020 / Ohio Darke (ft)
     * Extent: USA - Ohio - Darke county
     * Part of the Ohio County Coordinate System (OCCS). See code 23111 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_OHIO_DARKE_FT = 'urn:ogc:def:crs:EPSG::23112';

    /**
     * NATRF2022e2020 / Ohio Defiance
     * Extent: USA - Ohio - Defiance county
     * Part of the Ohio County Coordinate System (OCCS). See code 23114 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_OHIO_DEFIANCE = 'urn:ogc:def:crs:EPSG::23113';

    /**
     * NATRF2022e2020 / Ohio Defiance (ft)
     * Extent: USA - Ohio - Defiance county
     * Part of the Ohio County Coordinate System (OCCS). See code 23113 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_OHIO_DEFIANCE_FT = 'urn:ogc:def:crs:EPSG::23114';

    /**
     * NATRF2022e2020 / Ohio Delaware
     * Extent: USA - Ohio - Delaware county
     * Part of the Ohio County Coordinate System (OCCS). See code 23116 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_OHIO_DELAWARE = 'urn:ogc:def:crs:EPSG::23115';

    /**
     * NATRF2022e2020 / Ohio Delaware (ft)
     * Extent: USA - Ohio - Delaware county
     * Part of the Ohio County Coordinate System (OCCS). See code 23115 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_OHIO_DELAWARE_FT = 'urn:ogc:def:crs:EPSG::23116';

    /**
     * NATRF2022e2020 / Ohio Erie
     * Extent: USA - Ohio - Erie county
     * Part of the Ohio County Coordinate System (OCCS). See code 23118 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_OHIO_ERIE = 'urn:ogc:def:crs:EPSG::23117';

    /**
     * NATRF2022e2020 / Ohio Erie (ft)
     * Extent: USA - Ohio - Erie county
     * Part of the Ohio County Coordinate System (OCCS). See code 23117 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_OHIO_ERIE_FT = 'urn:ogc:def:crs:EPSG::23118';

    /**
     * NATRF2022e2020 / Ohio Fairfield
     * Extent: USA - Ohio - Fairfield county
     * Part of the Ohio County Coordinate System (OCCS). See code 23120 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_OHIO_FAIRFIELD = 'urn:ogc:def:crs:EPSG::23119';

    /**
     * NATRF2022e2020 / Ohio Fairfield (ft)
     * Extent: USA - Ohio - Fairfield county
     * Part of the Ohio County Coordinate System (OCCS). See code 23119 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_OHIO_FAIRFIELD_FT = 'urn:ogc:def:crs:EPSG::23120';

    /**
     * NATRF2022e2020 / Ohio Fayette
     * Extent: USA - Ohio - Fayette county
     * Part of the Ohio County Coordinate System (OCCS). See code 23122 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_OHIO_FAYETTE = 'urn:ogc:def:crs:EPSG::23121';

    /**
     * NATRF2022e2020 / Ohio Fayette (ft)
     * Extent: USA - Ohio - Fayette county
     * Part of the Ohio County Coordinate System (OCCS). See code 23121 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_OHIO_FAYETTE_FT = 'urn:ogc:def:crs:EPSG::23122';

    /**
     * NATRF2022e2020 / Ohio Franklin
     * Extent: USA - Ohio - Franklin county
     * Part of the Ohio County Coordinate System (OCCS). See code 23124 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_OHIO_FRANKLIN = 'urn:ogc:def:crs:EPSG::23123';

    /**
     * NATRF2022e2020 / Ohio Franklin (ft)
     * Extent: USA - Ohio - Franklin county
     * Part of the Ohio County Coordinate System (OCCS). See code 23123 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_OHIO_FRANKLIN_FT = 'urn:ogc:def:crs:EPSG::23124';

    /**
     * NATRF2022e2020 / Ohio (ft)
     * Extent: USA - Ohio
     * See code 23065 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_OHIO_FT = 'urn:ogc:def:crs:EPSG::23066';

    /**
     * NATRF2022e2020 / Ohio Fulton
     * Extent: USA - Ohio - Fulton county
     * Part of the Ohio County Coordinate System (OCCS). See code 23126 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_OHIO_FULTON = 'urn:ogc:def:crs:EPSG::23125';

    /**
     * NATRF2022e2020 / Ohio Fulton (ft)
     * Extent: USA - Ohio - Fulton county
     * Part of the Ohio County Coordinate System (OCCS). See code 23125 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_OHIO_FULTON_FT = 'urn:ogc:def:crs:EPSG::23126';

    /**
     * NATRF2022e2020 / Ohio Gallia
     * Extent: USA - Ohio - Gallia county
     * Part of the Ohio County Coordinate System (OCCS). See code 23128 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_OHIO_GALLIA = 'urn:ogc:def:crs:EPSG::23127';

    /**
     * NATRF2022e2020 / Ohio Gallia (ft)
     * Extent: USA - Ohio - Gallia county
     * Part of the Ohio County Coordinate System (OCCS). See code 23127 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_OHIO_GALLIA_FT = 'urn:ogc:def:crs:EPSG::23128';

    /**
     * NATRF2022e2020 / Ohio Geauga
     * Extent: USA - Ohio - Geauga county
     * Part of the Ohio County Coordinate System (OCCS). See code 23130 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_OHIO_GEAUGA = 'urn:ogc:def:crs:EPSG::23129';

    /**
     * NATRF2022e2020 / Ohio Geauga (ft)
     * Extent: USA - Ohio - Geauga county
     * Part of the Ohio County Coordinate System (OCCS). See code 23129 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_OHIO_GEAUGA_FT = 'urn:ogc:def:crs:EPSG::23130';

    /**
     * NATRF2022e2020 / Ohio Greene
     * Extent: USA - Ohio - Greene county
     * Part of the Ohio County Coordinate System (OCCS). See code 23136 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_OHIO_GREENE = 'urn:ogc:def:crs:EPSG::23135';

    /**
     * NATRF2022e2020 / Ohio Greene (ft)
     * Extent: USA - Ohio - Greene county
     * Part of the Ohio County Coordinate System (OCCS). See code 23135 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_OHIO_GREENE_FT = 'urn:ogc:def:crs:EPSG::23136';

    /**
     * NATRF2022e2020 / Ohio Guernsey
     * Extent: USA - Ohio - Guernsey county
     * Part of the Ohio County Coordinate System (OCCS). See code 23138 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_OHIO_GUERNSEY = 'urn:ogc:def:crs:EPSG::23137';

    /**
     * NATRF2022e2020 / Ohio Guernsey (ft)
     * Extent: USA - Ohio - Guernsey county
     * Part of the Ohio County Coordinate System (OCCS). See code 23137 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_OHIO_GUERNSEY_FT = 'urn:ogc:def:crs:EPSG::23138';

    /**
     * NATRF2022e2020 / Ohio Hamilton
     * Extent: USA - Ohio - Hamilton county
     * Part of the Ohio County Coordinate System (OCCS). See code 23140 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_OHIO_HAMILTON = 'urn:ogc:def:crs:EPSG::23139';

    /**
     * NATRF2022e2020 / Ohio Hamilton (ft)
     * Extent: USA - Ohio - Hamilton county
     * Part of the Ohio County Coordinate System (OCCS). See code 23139 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_OHIO_HAMILTON_FT = 'urn:ogc:def:crs:EPSG::23140';

    /**
     * NATRF2022e2020 / Ohio Hancock
     * Extent: USA - Ohio - Hancock county
     * Part of the Ohio County Coordinate System (OCCS). See code 23142 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_OHIO_HANCOCK = 'urn:ogc:def:crs:EPSG::23141';

    /**
     * NATRF2022e2020 / Ohio Hancock (ft)
     * Extent: USA - Ohio - Hancock county
     * Part of the Ohio County Coordinate System (OCCS). See code 23141 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_OHIO_HANCOCK_FT = 'urn:ogc:def:crs:EPSG::23142';

    /**
     * NATRF2022e2020 / Ohio Hardin
     * Extent: USA - Ohio - Hardin county
     * Part of the Ohio County Coordinate System (OCCS). See code 23144 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_OHIO_HARDIN = 'urn:ogc:def:crs:EPSG::23143';

    /**
     * NATRF2022e2020 / Ohio Hardin (ft)
     * Extent: USA - Ohio - Hardin county
     * Part of the Ohio County Coordinate System (OCCS). See code 23143 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_OHIO_HARDIN_FT = 'urn:ogc:def:crs:EPSG::23144';

    /**
     * NATRF2022e2020 / Ohio Harrison
     * Extent: USA - Ohio - Harrison county
     * Part of the Ohio County Coordinate System (OCCS). See code 23146 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_OHIO_HARRISON = 'urn:ogc:def:crs:EPSG::23145';

    /**
     * NATRF2022e2020 / Ohio Harrison (ft)
     * Extent: USA - Ohio - Harrison county
     * Part of the Ohio County Coordinate System (OCCS). See code 23145 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_OHIO_HARRISON_FT = 'urn:ogc:def:crs:EPSG::23146';

    /**
     * NATRF2022e2020 / Ohio Henry
     * Extent: USA - Ohio - Henry county
     * Part of the Ohio County Coordinate System (OCCS). See code 23148 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_OHIO_HENRY = 'urn:ogc:def:crs:EPSG::23147';

    /**
     * NATRF2022e2020 / Ohio Henry (ft)
     * Extent: USA - Ohio - Henry county
     * Part of the Ohio County Coordinate System (OCCS). See code 23147 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_OHIO_HENRY_FT = 'urn:ogc:def:crs:EPSG::23148';

    /**
     * NATRF2022e2020 / Ohio Highland
     * Extent: USA - Ohio - Highland county
     * Part of the Ohio County Coordinate System (OCCS). See code 23150 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_OHIO_HIGHLAND = 'urn:ogc:def:crs:EPSG::23149';

    /**
     * NATRF2022e2020 / Ohio Highland (ft)
     * Extent: USA - Ohio - Highland county
     * Part of the Ohio County Coordinate System (OCCS). See code 23149 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_OHIO_HIGHLAND_FT = 'urn:ogc:def:crs:EPSG::23150';

    /**
     * NATRF2022e2020 / Ohio Hocking
     * Extent: USA - Ohio - Hocking county
     * Part of the Ohio County Coordinate System (OCCS). See code 23152 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_OHIO_HOCKING = 'urn:ogc:def:crs:EPSG::23151';

    /**
     * NATRF2022e2020 / Ohio Hocking (ft)
     * Extent: USA - Ohio - Hocking county
     * Part of the Ohio County Coordinate System (OCCS). See code 23151 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_OHIO_HOCKING_FT = 'urn:ogc:def:crs:EPSG::23152';

    /**
     * NATRF2022e2020 / Ohio Holmes
     * Extent: USA - Ohio - Holmes county
     * Part of the Ohio County Coordinate System (OCCS). See code 23154 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_OHIO_HOLMES = 'urn:ogc:def:crs:EPSG::23153';

    /**
     * NATRF2022e2020 / Ohio Holmes (ft)
     * Extent: USA - Ohio - Holmes county
     * Part of the Ohio County Coordinate System (OCCS). See code 23153 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_OHIO_HOLMES_FT = 'urn:ogc:def:crs:EPSG::23154';

    /**
     * NATRF2022e2020 / Ohio Huron
     * Extent: USA - Ohio - Huron county
     * Part of the Ohio County Coordinate System (OCCS). See code 23156 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_OHIO_HURON = 'urn:ogc:def:crs:EPSG::23155';

    /**
     * NATRF2022e2020 / Ohio Huron (ft)
     * Extent: USA - Ohio - Huron county
     * Part of the Ohio County Coordinate System (OCCS). See code 23155 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_OHIO_HURON_FT = 'urn:ogc:def:crs:EPSG::23156';

    /**
     * NATRF2022e2020 / Ohio Jackson
     * Extent: USA - Ohio - Jackson county
     * Part of the Ohio County Coordinate System (OCCS). See code 23158 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_OHIO_JACKSON = 'urn:ogc:def:crs:EPSG::23157';

    /**
     * NATRF2022e2020 / Ohio Jackson (ft)
     * Extent: USA - Ohio - Jackson county
     * Part of the Ohio County Coordinate System (OCCS). See code 23157 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_OHIO_JACKSON_FT = 'urn:ogc:def:crs:EPSG::23158';

    /**
     * NATRF2022e2020 / Ohio Jefferson
     * Extent: USA - Ohio - Jefferson county
     * Part of the Ohio County Coordinate System (OCCS). See code 23160 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_OHIO_JEFFERSON = 'urn:ogc:def:crs:EPSG::23159';

    /**
     * NATRF2022e2020 / Ohio Jefferson (ft)
     * Extent: USA - Ohio - Jefferson county
     * Part of the Ohio County Coordinate System (OCCS). See code 23159 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_OHIO_JEFFERSON_FT = 'urn:ogc:def:crs:EPSG::23160';

    /**
     * NATRF2022e2020 / Ohio Knox
     * Extent: USA - Ohio - Knox county
     * Part of the Ohio County Coordinate System (OCCS). See code 23162 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_OHIO_KNOX = 'urn:ogc:def:crs:EPSG::23161';

    /**
     * NATRF2022e2020 / Ohio Knox (ft)
     * Extent: USA - Ohio - Knox county
     * Part of the Ohio County Coordinate System (OCCS). See code 23161 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_OHIO_KNOX_FT = 'urn:ogc:def:crs:EPSG::23162';

    /**
     * NATRF2022e2020 / Ohio Lake
     * Extent: USA - Ohio - Lake county
     * Part of the Ohio County Coordinate System (OCCS). See code 23164 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_OHIO_LAKE = 'urn:ogc:def:crs:EPSG::23163';

    /**
     * NATRF2022e2020 / Ohio Lake (ft)
     * Extent: USA - Ohio - Lake county
     * Part of the Ohio County Coordinate System (OCCS). See code 23163 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_OHIO_LAKE_FT = 'urn:ogc:def:crs:EPSG::23164';

    /**
     * NATRF2022e2020 / Ohio Lawrence
     * Extent: USA - Ohio - Lawrence county
     * Part of the Ohio County Coordinate System (OCCS). See code 23166 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_OHIO_LAWRENCE = 'urn:ogc:def:crs:EPSG::23165';

    /**
     * NATRF2022e2020 / Ohio Lawrence (ft)
     * Extent: USA - Ohio - Lawrence county
     * Part of the Ohio County Coordinate System (OCCS). See code 23165 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_OHIO_LAWRENCE_FT = 'urn:ogc:def:crs:EPSG::23166';

    /**
     * NATRF2022e2020 / Ohio Licking
     * Extent: USA - Ohio - Licking county
     * Part of the Ohio County Coordinate System (OCCS). See code 23168 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_OHIO_LICKING = 'urn:ogc:def:crs:EPSG::23167';

    /**
     * NATRF2022e2020 / Ohio Licking (ft)
     * Extent: USA - Ohio - Licking county
     * Part of the Ohio County Coordinate System (OCCS). See code 23167 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_OHIO_LICKING_FT = 'urn:ogc:def:crs:EPSG::23168';

    /**
     * NATRF2022e2020 / Ohio Logan
     * Extent: USA - Ohio - Logan county
     * Part of the Ohio County Coordinate System (OCCS). See code 23170 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_OHIO_LOGAN = 'urn:ogc:def:crs:EPSG::23169';

    /**
     * NATRF2022e2020 / Ohio Logan (ft)
     * Extent: USA - Ohio - Logan county
     * Part of the Ohio County Coordinate System (OCCS). See code 23169 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_OHIO_LOGAN_FT = 'urn:ogc:def:crs:EPSG::23170';

    /**
     * NATRF2022e2020 / Ohio Lorain
     * Extent: USA - Ohio - Lorain county
     * Part of the Ohio County Coordinate System (OCCS). See code 23172 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_OHIO_LORAIN = 'urn:ogc:def:crs:EPSG::23171';

    /**
     * NATRF2022e2020 / Ohio Lorain (ft)
     * Extent: USA - Ohio - Lorain county
     * Part of the Ohio County Coordinate System (OCCS). See code 23171 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_OHIO_LORAIN_FT = 'urn:ogc:def:crs:EPSG::23172';

    /**
     * NATRF2022e2020 / Ohio Lucas
     * Extent: USA - Ohio - Lucas county
     * Part of the Ohio County Coordinate System (OCCS). See code 23174 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_OHIO_LUCAS = 'urn:ogc:def:crs:EPSG::23173';

    /**
     * NATRF2022e2020 / Ohio Lucas (ft)
     * Extent: USA - Ohio - Lucas county
     * Part of the Ohio County Coordinate System (OCCS). See code 23173 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_OHIO_LUCAS_FT = 'urn:ogc:def:crs:EPSG::23174';

    /**
     * NATRF2022e2020 / Ohio Madison
     * Extent: USA - Ohio - Madison county
     * Part of the Ohio County Coordinate System (OCCS). See code 23176 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_OHIO_MADISON = 'urn:ogc:def:crs:EPSG::23175';

    /**
     * NATRF2022e2020 / Ohio Madison (ft)
     * Extent: USA - Ohio - Madison county
     * Part of the Ohio County Coordinate System (OCCS). See code 23175 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_OHIO_MADISON_FT = 'urn:ogc:def:crs:EPSG::23176';

    /**
     * NATRF2022e2020 / Ohio Mahoning
     * Extent: USA - Ohio - Mahoning county
     * Part of the Ohio County Coordinate System (OCCS). See code 23178 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_OHIO_MAHONING = 'urn:ogc:def:crs:EPSG::23177';

    /**
     * NATRF2022e2020 / Ohio Mahoning (ft)
     * Extent: USA - Ohio - Mahoning county
     * Part of the Ohio County Coordinate System (OCCS). See code 23177 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_OHIO_MAHONING_FT = 'urn:ogc:def:crs:EPSG::23178';

    /**
     * NATRF2022e2020 / Ohio Marion
     * Extent: USA - Ohio - Marion county
     * Part of the Ohio County Coordinate System (OCCS). See code 23180 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_OHIO_MARION = 'urn:ogc:def:crs:EPSG::23179';

    /**
     * NATRF2022e2020 / Ohio Marion (ft)
     * Extent: USA - Ohio - Marion county
     * Part of the Ohio County Coordinate System (OCCS). See code 23179 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_OHIO_MARION_FT = 'urn:ogc:def:crs:EPSG::23180';

    /**
     * NATRF2022e2020 / Ohio Medina
     * Extent: USA - Ohio - Medina county
     * Part of the Ohio County Coordinate System (OCCS). See code 23182 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_OHIO_MEDINA = 'urn:ogc:def:crs:EPSG::23181';

    /**
     * NATRF2022e2020 / Ohio Medina (ft)
     * Extent: USA - Ohio - Medina county
     * Part of the Ohio County Coordinate System (OCCS). See code 23181 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_OHIO_MEDINA_FT = 'urn:ogc:def:crs:EPSG::23182';

    /**
     * NATRF2022e2020 / Ohio Meigs
     * Extent: USA - Ohio - Meigs county
     * Part of the Ohio County Coordinate System (OCCS). See code 23184 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_OHIO_MEIGS = 'urn:ogc:def:crs:EPSG::23183';

    /**
     * NATRF2022e2020 / Ohio Meigs (ft)
     * Extent: USA - Ohio - Meigs county
     * Part of the Ohio County Coordinate System (OCCS). See code 23183 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_OHIO_MEIGS_FT = 'urn:ogc:def:crs:EPSG::23184';

    /**
     * NATRF2022e2020 / Ohio Mercer
     * Extent: USA - Ohio - Mercer county
     * Part of the Ohio County Coordinate System (OCCS). See code 23186 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_OHIO_MERCER = 'urn:ogc:def:crs:EPSG::23185';

    /**
     * NATRF2022e2020 / Ohio Mercer (ft)
     * Extent: USA - Ohio - Mercer county
     * Part of the Ohio County Coordinate System (OCCS). See code 23185 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_OHIO_MERCER_FT = 'urn:ogc:def:crs:EPSG::23186';

    /**
     * NATRF2022e2020 / Ohio Miami
     * Extent: USA - Ohio - Miami county
     * Part of the Ohio County Coordinate System (OCCS). See code 23188 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_OHIO_MIAMI = 'urn:ogc:def:crs:EPSG::23187';

    /**
     * NATRF2022e2020 / Ohio Miami (ft)
     * Extent: USA - Ohio - Miami county
     * Part of the Ohio County Coordinate System (OCCS). See code 23187 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_OHIO_MIAMI_FT = 'urn:ogc:def:crs:EPSG::23188';

    /**
     * NATRF2022e2020 / Ohio Monroe
     * Extent: USA - Ohio - Monroe county
     * Part of the Ohio County Coordinate System (OCCS). See code 23190 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_OHIO_MONROE = 'urn:ogc:def:crs:EPSG::23189';

    /**
     * NATRF2022e2020 / Ohio Monroe (ft)
     * Extent: USA - Ohio - Monroe county
     * Part of the Ohio County Coordinate System (OCCS). See code 23189 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_OHIO_MONROE_FT = 'urn:ogc:def:crs:EPSG::23190';

    /**
     * NATRF2022e2020 / Ohio Montgomery
     * Extent: USA - Ohio - Montgomery county
     * Part of the Ohio County Coordinate System (OCCS). See code 23202 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_OHIO_MONTGOMERY = 'urn:ogc:def:crs:EPSG::23201';

    /**
     * NATRF2022e2020 / Ohio Montgomery (ft)
     * Extent: USA - Ohio - Montgomery county
     * Part of the Ohio County Coordinate System (OCCS). See code 23201 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_OHIO_MONTGOMERY_FT = 'urn:ogc:def:crs:EPSG::23202';

    /**
     * NATRF2022e2020 / Ohio Morgan
     * Extent: USA - Ohio - Morgan county
     * Part of the Ohio County Coordinate System (OCCS). See code 23204 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_OHIO_MORGAN = 'urn:ogc:def:crs:EPSG::23203';

    /**
     * NATRF2022e2020 / Ohio Morgan (ft)
     * Extent: USA - Ohio - Morgan county
     * Part of the Ohio County Coordinate System (OCCS). See code 23203 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_OHIO_MORGAN_FT = 'urn:ogc:def:crs:EPSG::23204';

    /**
     * NATRF2022e2020 / Ohio Morrow
     * Extent: USA - Ohio - Morrow county
     * Part of the Ohio County Coordinate System (OCCS). See code 23206 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_OHIO_MORROW = 'urn:ogc:def:crs:EPSG::23205';

    /**
     * NATRF2022e2020 / Ohio Morrow (ft)
     * Extent: USA - Ohio - Morrow county
     * Part of the Ohio County Coordinate System (OCCS). See code 23205 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_OHIO_MORROW_FT = 'urn:ogc:def:crs:EPSG::23206';

    /**
     * NATRF2022e2020 / Ohio Muskingum
     * Extent: USA - Ohio - Muskingum county
     * Part of the Ohio County Coordinate System (OCCS). See code 23208 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_OHIO_MUSKINGUM = 'urn:ogc:def:crs:EPSG::23207';

    /**
     * NATRF2022e2020 / Ohio Muskingum (ft)
     * Extent: USA - Ohio - Muskingum county
     * Part of the Ohio County Coordinate System (OCCS). See code 23207 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_OHIO_MUSKINGUM_FT = 'urn:ogc:def:crs:EPSG::23208';

    /**
     * NATRF2022e2020 / Ohio Noble
     * Extent: USA - Ohio - Noble county
     * Part of the Ohio County Coordinate System (OCCS). See code 23210 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_OHIO_NOBLE = 'urn:ogc:def:crs:EPSG::23209';

    /**
     * NATRF2022e2020 / Ohio Noble (ft)
     * Extent: USA - Ohio - Noble county
     * Part of the Ohio County Coordinate System (OCCS). See code 23209 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_OHIO_NOBLE_FT = 'urn:ogc:def:crs:EPSG::23210';

    /**
     * NATRF2022e2020 / Ohio Ottawa
     * Extent: USA - Ohio - Ottawa county
     * Part of the Ohio County Coordinate System (OCCS). See code 23212 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_OHIO_OTTAWA = 'urn:ogc:def:crs:EPSG::23211';

    /**
     * NATRF2022e2020 / Ohio Ottawa (ft)
     * Extent: USA - Ohio - Ottawa county
     * Part of the Ohio County Coordinate System (OCCS). See code 23211 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_OHIO_OTTAWA_FT = 'urn:ogc:def:crs:EPSG::23212';

    /**
     * NATRF2022e2020 / Ohio Paulding
     * Extent: USA - Ohio - Paulding county
     * Part of the Ohio County Coordinate System (OCCS). See code 23214 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_OHIO_PAULDING = 'urn:ogc:def:crs:EPSG::23213';

    /**
     * NATRF2022e2020 / Ohio Paulding (ft)
     * Extent: USA - Ohio - Paulding county
     * Part of the Ohio County Coordinate System (OCCS). See code 23213 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_OHIO_PAULDING_FT = 'urn:ogc:def:crs:EPSG::23214';

    /**
     * NATRF2022e2020 / Ohio Perry
     * Extent: USA - Ohio - Perry county
     * Part of the Ohio County Coordinate System (OCCS). See code 23216 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_OHIO_PERRY = 'urn:ogc:def:crs:EPSG::23215';

    /**
     * NATRF2022e2020 / Ohio Perry (ft)
     * Extent: USA - Ohio - Perry county
     * Part of the Ohio County Coordinate System (OCCS). See code 23215 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_OHIO_PERRY_FT = 'urn:ogc:def:crs:EPSG::23216';

    /**
     * NATRF2022e2020 / Ohio Pickaway
     * Extent: USA - Ohio - Pickaway county
     * Part of the Ohio County Coordinate System (OCCS). See code 23218 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_OHIO_PICKAWAY = 'urn:ogc:def:crs:EPSG::23217';

    /**
     * NATRF2022e2020 / Ohio Pickaway (ft)
     * Extent: USA - Ohio - Pickaway county
     * Part of the Ohio County Coordinate System (OCCS). See code 23217 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_OHIO_PICKAWAY_FT = 'urn:ogc:def:crs:EPSG::23218';

    /**
     * NATRF2022e2020 / Ohio Pike
     * Extent: USA - Ohio - Pike county
     * Part of the Ohio County Coordinate System (OCCS). See code 23220 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_OHIO_PIKE = 'urn:ogc:def:crs:EPSG::23219';

    /**
     * NATRF2022e2020 / Ohio Pike (ft)
     * Extent: USA - Ohio - Pike county
     * Part of the Ohio County Coordinate System (OCCS). See code 23219 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_OHIO_PIKE_FT = 'urn:ogc:def:crs:EPSG::23220';

    /**
     * NATRF2022e2020 / Ohio Portage
     * Extent: USA - Ohio - Portage county
     * Part of the Ohio County Coordinate System (OCCS). See code 23222 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_OHIO_PORTAGE = 'urn:ogc:def:crs:EPSG::23221';

    /**
     * NATRF2022e2020 / Ohio Portage (ft)
     * Extent: USA - Ohio - Portage county
     * Part of the Ohio County Coordinate System (OCCS). See code 23221 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_OHIO_PORTAGE_FT = 'urn:ogc:def:crs:EPSG::23222';

    /**
     * NATRF2022e2020 / Ohio Preble
     * Extent: USA - Ohio - Preble county
     * Part of the Ohio County Coordinate System (OCCS). See code 23224 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_OHIO_PREBLE = 'urn:ogc:def:crs:EPSG::23223';

    /**
     * NATRF2022e2020 / Ohio Preble (ft)
     * Extent: USA - Ohio - Preble county
     * Part of the Ohio County Coordinate System (OCCS). See code 23223 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_OHIO_PREBLE_FT = 'urn:ogc:def:crs:EPSG::23224';

    /**
     * NATRF2022e2020 / Ohio Putnam
     * Extent: USA - Ohio - Putnam county
     * Part of the Ohio County Coordinate System (OCCS). See code 23226 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_OHIO_PUTNAM = 'urn:ogc:def:crs:EPSG::23225';

    /**
     * NATRF2022e2020 / Ohio Putnam (ft)
     * Extent: USA - Ohio - Putnam county
     * Part of the Ohio County Coordinate System (OCCS). See code 23225 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_OHIO_PUTNAM_FT = 'urn:ogc:def:crs:EPSG::23226';

    /**
     * NATRF2022e2020 / Ohio Richland
     * Extent: USA - Ohio - Richland county
     * Part of the Ohio County Coordinate System (OCCS). See code 23228 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_OHIO_RICHLAND = 'urn:ogc:def:crs:EPSG::23227';

    /**
     * NATRF2022e2020 / Ohio Richland (ft)
     * Extent: USA - Ohio - Richland county
     * Part of the Ohio County Coordinate System (OCCS). See code 23227 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_OHIO_RICHLAND_FT = 'urn:ogc:def:crs:EPSG::23228';

    /**
     * NATRF2022e2020 / Ohio Ross
     * Extent: USA - Ohio - Ross county
     * Part of the Ohio County Coordinate System (OCCS). See code 23232 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_OHIO_ROSS = 'urn:ogc:def:crs:EPSG::23231';

    /**
     * NATRF2022e2020 / Ohio Ross (ft)
     * Extent: USA - Ohio - Ross county
     * Part of the Ohio County Coordinate System (OCCS). See code 23231 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_OHIO_ROSS_FT = 'urn:ogc:def:crs:EPSG::23232';

    /**
     * NATRF2022e2020 / Ohio Sandusky
     * Extent: USA - Ohio - Sandusky county
     * Part of the Ohio County Coordinate System (OCCS). See code 23234 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_OHIO_SANDUSKY = 'urn:ogc:def:crs:EPSG::23233';

    /**
     * NATRF2022e2020 / Ohio Sandusky (ft)
     * Extent: USA - Ohio - Sandusky county
     * Part of the Ohio County Coordinate System (OCCS). See code 23233 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_OHIO_SANDUSKY_FT = 'urn:ogc:def:crs:EPSG::23234';

    /**
     * NATRF2022e2020 / Ohio Scioto
     * Extent: USA - Ohio - Scioto county
     * Part of the Ohio County Coordinate System (OCCS). See code 23236 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_OHIO_SCIOTO = 'urn:ogc:def:crs:EPSG::23235';

    /**
     * NATRF2022e2020 / Ohio Scioto (ft)
     * Extent: USA - Ohio - Scioto county
     * Part of the Ohio County Coordinate System (OCCS). See code 23235 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_OHIO_SCIOTO_FT = 'urn:ogc:def:crs:EPSG::23236';

    /**
     * NATRF2022e2020 / Ohio Seneca
     * Extent: USA - Ohio - Seneca county
     * Part of the Ohio County Coordinate System (OCCS). See code 23242 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_OHIO_SENECA = 'urn:ogc:def:crs:EPSG::23241';

    /**
     * NATRF2022e2020 / Ohio Seneca (ft)
     * Extent: USA - Ohio - Seneca county
     * Part of the Ohio County Coordinate System (OCCS). See code 23241 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_OHIO_SENECA_FT = 'urn:ogc:def:crs:EPSG::23242';

    /**
     * NATRF2022e2020 / Ohio Shelby
     * Extent: USA - Ohio - Shelby county
     * Part of the Ohio County Coordinate System (OCCS). See code 23244 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_OHIO_SHELBY = 'urn:ogc:def:crs:EPSG::23243';

    /**
     * NATRF2022e2020 / Ohio Shelby (ft)
     * Extent: USA - Ohio - Shelby county
     * Part of the Ohio County Coordinate System (OCCS). See code 23243 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_OHIO_SHELBY_FT = 'urn:ogc:def:crs:EPSG::23244';

    /**
     * NATRF2022e2020 / Ohio Stark
     * Extent: USA - Ohio - Stark county
     * Part of the Ohio County Coordinate System (OCCS). See code 23246 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_OHIO_STARK = 'urn:ogc:def:crs:EPSG::23245';

    /**
     * NATRF2022e2020 / Ohio Stark (ft)
     * Extent: USA - Ohio - Stark county
     * Part of the Ohio County Coordinate System (OCCS). See code 23245 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_OHIO_STARK_FT = 'urn:ogc:def:crs:EPSG::23246';

    /**
     * NATRF2022e2020 / Ohio Summit
     * Extent: USA - Ohio - Summit county
     * Part of the Ohio County Coordinate System (OCCS). See code 23248 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_OHIO_SUMMIT = 'urn:ogc:def:crs:EPSG::23247';

    /**
     * NATRF2022e2020 / Ohio Summit (ft)
     * Extent: USA - Ohio - Summit county
     * Part of the Ohio County Coordinate System (OCCS). See code 23247 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_OHIO_SUMMIT_FT = 'urn:ogc:def:crs:EPSG::23248';

    /**
     * NATRF2022e2020 / Ohio Trumbull
     * Extent: USA - Ohio - Trumbull county
     * Part of the Ohio County Coordinate System (OCCS). See code 23250 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_OHIO_TRUMBULL = 'urn:ogc:def:crs:EPSG::23249';

    /**
     * NATRF2022e2020 / Ohio Trumbull (ft)
     * Extent: USA - Ohio - Trumbull county
     * Part of the Ohio County Coordinate System (OCCS). See code 23249 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_OHIO_TRUMBULL_FT = 'urn:ogc:def:crs:EPSG::23250';

    /**
     * NATRF2022e2020 / Ohio Tuscarawas
     * Extent: USA - Ohio - Tuscarawas county
     * Part of the Ohio County Coordinate System (OCCS). See code 23252 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_OHIO_TUSCARAWAS = 'urn:ogc:def:crs:EPSG::23251';

    /**
     * NATRF2022e2020 / Ohio Tuscarawas (ft)
     * Extent: USA - Ohio - Tuscarawas county
     * Part of the Ohio County Coordinate System (OCCS). See code 23251 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_OHIO_TUSCARAWAS_FT = 'urn:ogc:def:crs:EPSG::23252';

    /**
     * NATRF2022e2020 / Ohio Union
     * Extent: USA - Ohio - Union county
     * Part of the Ohio County Coordinate System (OCCS). See code 23254 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_OHIO_UNION = 'urn:ogc:def:crs:EPSG::23253';

    /**
     * NATRF2022e2020 / Ohio Union (ft)
     * Extent: USA - Ohio - Union county
     * Part of the Ohio County Coordinate System (OCCS). See code 23253 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_OHIO_UNION_FT = 'urn:ogc:def:crs:EPSG::23254';

    /**
     * NATRF2022e2020 / Ohio Van Wert
     * Extent: USA - Ohio - Van Wert county
     * Part of the Ohio County Coordinate System (OCCS). See code 23256 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_OHIO_VAN_WERT = 'urn:ogc:def:crs:EPSG::23255';

    /**
     * NATRF2022e2020 / Ohio Van Wert (ft)
     * Extent: USA - Ohio - Van Wert county
     * Part of the Ohio County Coordinate System (OCCS). See code 23255 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_OHIO_VAN_WERT_FT = 'urn:ogc:def:crs:EPSG::23256';

    /**
     * NATRF2022e2020 / Ohio Vinton
     * Extent: USA - Ohio - Vinton county
     * Part of the Ohio County Coordinate System (OCCS). See code 23258 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_OHIO_VINTON = 'urn:ogc:def:crs:EPSG::23257';

    /**
     * NATRF2022e2020 / Ohio Vinton (ft)
     * Extent: USA - Ohio - Vinton county
     * Part of the Ohio County Coordinate System (OCCS). See code 23257 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_OHIO_VINTON_FT = 'urn:ogc:def:crs:EPSG::23258';

    /**
     * NATRF2022e2020 / Ohio Warren
     * Extent: USA - Ohio - Warren county
     * Part of the Ohio County Coordinate System (OCCS). See code 23260 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_OHIO_WARREN = 'urn:ogc:def:crs:EPSG::23259';

    /**
     * NATRF2022e2020 / Ohio Warren (ft)
     * Extent: USA - Ohio - Warren county
     * Part of the Ohio County Coordinate System (OCCS). See code 23259 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_OHIO_WARREN_FT = 'urn:ogc:def:crs:EPSG::23260';

    /**
     * NATRF2022e2020 / Ohio Washington
     * Extent: USA - Ohio - Washington county
     * Part of the Ohio County Coordinate System (OCCS). See code 23262 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_OHIO_WASHINGTON = 'urn:ogc:def:crs:EPSG::23261';

    /**
     * NATRF2022e2020 / Ohio Washington (ft)
     * Extent: USA - Ohio - Washington county
     * Part of the Ohio County Coordinate System (OCCS). See code 23261 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_OHIO_WASHINGTON_FT = 'urn:ogc:def:crs:EPSG::23262';

    /**
     * NATRF2022e2020 / Ohio Wayne
     * Extent: USA - Ohio - Wayne county
     * Part of the Ohio County Coordinate System (OCCS). See code 23264 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_OHIO_WAYNE = 'urn:ogc:def:crs:EPSG::23263';

    /**
     * NATRF2022e2020 / Ohio Wayne (ft)
     * Extent: USA - Ohio - Wayne county
     * Part of the Ohio County Coordinate System (OCCS). See code 23263 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_OHIO_WAYNE_FT = 'urn:ogc:def:crs:EPSG::23264';

    /**
     * NATRF2022e2020 / Ohio Williams
     * Extent: USA - Ohio - Williams county
     * Part of the Ohio County Coordinate System (OCCS). See code 23266 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_OHIO_WILLIAMS = 'urn:ogc:def:crs:EPSG::23265';

    /**
     * NATRF2022e2020 / Ohio Williams (ft)
     * Extent: USA - Ohio - Williams county
     * Part of the Ohio County Coordinate System (OCCS). See code 23265 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_OHIO_WILLIAMS_FT = 'urn:ogc:def:crs:EPSG::23266';

    /**
     * NATRF2022e2020 / Ohio Wood
     * Extent: USA - Ohio - Wood county
     * Part of the Ohio County Coordinate System (OCCS). See code 23268 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_OHIO_WOOD = 'urn:ogc:def:crs:EPSG::23267';

    /**
     * NATRF2022e2020 / Ohio Wood (ft)
     * Extent: USA - Ohio - Wood county
     * Part of the Ohio County Coordinate System (OCCS). See code 23267 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_OHIO_WOOD_FT = 'urn:ogc:def:crs:EPSG::23268';

    /**
     * NATRF2022e2020 / Ohio Wyandot
     * Extent: USA - Ohio - Wyandot county
     * Part of the Ohio County Coordinate System (OCCS). See code 23270 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_OHIO_WYANDOT = 'urn:ogc:def:crs:EPSG::23269';

    /**
     * NATRF2022e2020 / Ohio Wyandot (ft)
     * Extent: USA - Ohio - Wyandot county
     * Part of the Ohio County Coordinate System (OCCS). See code 23269 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_OHIO_WYANDOT_FT = 'urn:ogc:def:crs:EPSG::23270';

    /**
     * NATRF2022e2020 / Oklahoma
     * Extent: USA - Oklahoma
     * See code 23272 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_OKLAHOMA = 'urn:ogc:def:crs:EPSG::23271';

    /**
     * NATRF2022e2020 / Oklahoma (ft)
     * Extent: USA - Oklahoma
     * See code 23271 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_OKLAHOMA_FT = 'urn:ogc:def:crs:EPSG::23272';

    /**
     * NATRF2022e2020 / Pennsylvania
     * Extent: USA - Pennsylvania
     * See code 23440 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_PENNSYLVANIA = 'urn:ogc:def:crs:EPSG::23439';

    /**
     * NATRF2022e2020 / Pennsylvania (ft)
     * Extent: USA - Pennsylvania
     * See code 23439 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_PENNSYLVANIA_FT = 'urn:ogc:def:crs:EPSG::23440';

    /**
     * NATRF2022e2020 / Rhode Island
     * Extent: USA - Rhode Island
     * See code 23450 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_RHODE_ISLAND = 'urn:ogc:def:crs:EPSG::23449';

    /**
     * NATRF2022e2020 / Rhode Island (ft)
     * Extent: USA - Rhode Island
     * See code 23449 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_RHODE_ISLAND_FT = 'urn:ogc:def:crs:EPSG::23450';

    /**
     * NATRF2022e2020 / South Carolina
     * Extent: USA - South Carolina
     * See code 23452 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_SOUTH_CAROLINA = 'urn:ogc:def:crs:EPSG::23451';

    /**
     * NATRF2022e2020 / South Carolina (ft)
     * Extent: USA - South Carolina
     * See code 23451 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_SOUTH_CAROLINA_FT = 'urn:ogc:def:crs:EPSG::23452';

    /**
     * NATRF2022e2020 / South Dakota
     * Extent: USA - South Dakota
     * See code 23454 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_SOUTH_DAKOTA = 'urn:ogc:def:crs:EPSG::23453';

    /**
     * NATRF2022e2020 / South Dakota (ft)
     * Extent: USA - South Dakota
     * See code 23453 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_SOUTH_DAKOTA_FT = 'urn:ogc:def:crs:EPSG::23454';

    /**
     * NATRF2022e2020 / Tennessee
     * Extent: USA - Tennessee
     * See code 23510 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_TENNESSEE = 'urn:ogc:def:crs:EPSG::23509';

    /**
     * NATRF2022e2020 / Tennessee (ft)
     * Extent: USA - Tennessee
     * See code 23509 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_TENNESSEE_FT = 'urn:ogc:def:crs:EPSG::23510';

    /**
     * NATRF2022e2020 / Utah
     * Extent: USA - Utah
     * See code 23630 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_UTAH = 'urn:ogc:def:crs:EPSG::23629';

    /**
     * NATRF2022e2020 / Utah (ft)
     * Extent: USA - Utah
     * See code 23629 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_UTAH_FT = 'urn:ogc:def:crs:EPSG::23630';

    /**
     * NATRF2022e2020 / UTM zone 10N
     * Extent: North America - between 126°W and 120°W. Canada - British Columbia; Northwest Territories; Yukon. USA
     * - California; Oregon; Washington.
     */
    public const EPSG_NATRF2022E2020_UTM_ZONE_10N = 'urn:ogc:def:crs:EPSG::23910';

    /**
     * NATRF2022e2020 / UTM zone 11N
     * Extent: North America - between 120°W and 114°W. Canada - Alberta; British Columbia; Northwest Territories;
     * Nunavut. USA - California; Idaho; Nevada, Oregon; Washington.
     */
    public const EPSG_NATRF2022E2020_UTM_ZONE_11N = 'urn:ogc:def:crs:EPSG::23911';

    /**
     * NATRF2022e2020 / UTM zone 12N
     * Extent: North America - between 114°W and 108°W. Canada - Alberta; Northwest Territories; Nunavut;
     * Saskatchewan. USA - Arizona; Colorado; Idaho; Montana; New Mexico; Utah; Wyoming.
     */
    public const EPSG_NATRF2022E2020_UTM_ZONE_12N = 'urn:ogc:def:crs:EPSG::23912';

    /**
     * NATRF2022e2020 / UTM zone 13N
     * Extent: North America - between 108°W and 102°W. Canada - Northwest Territories; Nunavut; Saskatchewan. USA -
     * Colorado; Montana; Nebraska; New Mexico; North Dakota; Oklahoma; South Dakota; Texas; Wyoming.
     */
    public const EPSG_NATRF2022E2020_UTM_ZONE_13N = 'urn:ogc:def:crs:EPSG::23913';

    /**
     * NATRF2022e2020 / UTM zone 14N
     * Extent: North America - between 102°W and 96°W. Canada - Manitoba; Nunavut; Saskatchewan. USA - Iowa; Kansas;
     * Minnesota; Nebraska; North Dakota; Oklahoma; South Dakota; Texas.
     */
    public const EPSG_NATRF2022E2020_UTM_ZONE_14N = 'urn:ogc:def:crs:EPSG::23914';

    /**
     * NATRF2022e2020 / UTM zone 15N
     * Extent: North America - between 96°W and 90°W. Canada - Manitoba; Nunavut; Ontario. USA - Arkansas; Illinois;
     * Iowa; Kansas; Louisiana; Michigan; Minnesota; Mississippi; Missouri; Nebraska; Oklahoma; Tennessee; Texas;
     * Wisconsin.
     */
    public const EPSG_NATRF2022E2020_UTM_ZONE_15N = 'urn:ogc:def:crs:EPSG::23915';

    /**
     * NATRF2022e2020 / UTM zone 16N
     * Extent: North America - between 90°W and 84°W. Canada - Manitoba; Nunavut; Ontario. USA - Alabama; Arkansas;
     * Florida; Georgia; Indiana; Illinois; Kentucky; Louisiana; Michigan; Minnesota; Mississippi; Missouri; North
     * Carolina; Ohio; Tennessee; Wisconsin.
     */
    public const EPSG_NATRF2022E2020_UTM_ZONE_16N = 'urn:ogc:def:crs:EPSG::23916';

    /**
     * NATRF2022e2020 / UTM zone 17N
     * Extent: North America - between 84°W and 78°W. Canada - Nunavut; Ontario; Quebec. USA - Florida; Georgia;
     * Kentucky; Maryland; Michigan; New York; North Carolina; Ohio; Pennsylvania; South Carolina; Tennessee; Virginia;
     * West Virginia.
     */
    public const EPSG_NATRF2022E2020_UTM_ZONE_17N = 'urn:ogc:def:crs:EPSG::23917';

    /**
     * NATRF2022e2020 / UTM zone 18N
     * Extent: North America - between 78°W and 72°W. Canada - Nunavut; Ontario; Quebec. USA - Connecticut; Delaware;
     * District of Columbia (DC); Maryland; Massachusetts; New Hampshire; New Jersey; New York; North Carolina;
     * Pennsylvania; Virginia; Vermont.
     */
    public const EPSG_NATRF2022E2020_UTM_ZONE_18N = 'urn:ogc:def:crs:EPSG::23918';

    /**
     * NATRF2022e2020 / UTM zone 19N
     * Extent: North America - between 72°W and 66°W. Canada - New Brunswick; Labrador; Nunavut; Nova Scotia; Quebec.
     * USA - Connecticut; Maine; Massachusetts; New Hampshire; New York (Long Island); Rhode Island; Vermont. Onshore
     * and offshore for US and Canadian east coasts.
     */
    public const EPSG_NATRF2022E2020_UTM_ZONE_19N = 'urn:ogc:def:crs:EPSG::23919';

    /**
     * NATRF2022e2020 / UTM zone 1N
     * Extent: USA - between 180°W and 174°W - Alaska and offshore continental shelf (OCS).
     */
    public const EPSG_NATRF2022E2020_UTM_ZONE_1N = 'urn:ogc:def:crs:EPSG::23901';

    /**
     * NATRF2022e2020 / UTM zone 20N
     * Extent: North America - between 66°W and 60°W. Canada - New Brunswick; Labrador; Nova Scotia; Nunavut; Prince
     * Edward Island; Quebec. USA offshore Atlantic.
     */
    public const EPSG_NATRF2022E2020_UTM_ZONE_20N = 'urn:ogc:def:crs:EPSG::23920';

    /**
     * NATRF2022e2020 / UTM zone 21N
     * Extent: Canada between 60°W and 54°W - Newfoundland and Labrador; Nunavut; Quebec.
     */
    public const EPSG_NATRF2022E2020_UTM_ZONE_21N = 'urn:ogc:def:crs:EPSG::23921';

    /**
     * NATRF2022e2020 / UTM zone 22N
     * Extent: Canada between 54°W and 48°W - Newfoundland and Labrador.
     */
    public const EPSG_NATRF2022E2020_UTM_ZONE_22N = 'urn:ogc:def:crs:EPSG::23922';

    /**
     * NATRF2022e2020 / UTM zone 23N
     * Extent: Canada offshore Atlantic - 48°W to 42°W.
     */
    public const EPSG_NATRF2022E2020_UTM_ZONE_23N = 'urn:ogc:def:crs:EPSG::23923';

    /**
     * NATRF2022e2020 / UTM zone 24N
     * Extent: Canada offshore Atlantic - east of 42°W.
     */
    public const EPSG_NATRF2022E2020_UTM_ZONE_24N = 'urn:ogc:def:crs:EPSG::23924';

    /**
     * NATRF2022e2020 / UTM zone 2N
     * Extent: USA - between 174°W and 168°W - Alaska and offshore continental shelf (OCS).
     */
    public const EPSG_NATRF2022E2020_UTM_ZONE_2N = 'urn:ogc:def:crs:EPSG::23902';

    /**
     * NATRF2022e2020 / UTM zone 3N
     * Extent: USA - between 168°W and 162°W - Alaska and offshore continental shelf (OCS).
     */
    public const EPSG_NATRF2022E2020_UTM_ZONE_3N = 'urn:ogc:def:crs:EPSG::23903';

    /**
     * NATRF2022e2020 / UTM zone 4N
     * Extent: USA - between 162°W and 156°W - Alaska and offshore continental shelf (OCS).
     */
    public const EPSG_NATRF2022E2020_UTM_ZONE_4N = 'urn:ogc:def:crs:EPSG::23904';

    /**
     * NATRF2022e2020 / UTM zone 59N
     * Extent: USA - west of 174°E. Alaska and offshore continental shelf (OCS).
     */
    public const EPSG_NATRF2022E2020_UTM_ZONE_59N = 'urn:ogc:def:crs:EPSG::23959';

    /**
     * NATRF2022e2020 / UTM zone 5N
     * Extent: USA - between 156°W and 150°W - Alaska and offshore continental shelf (OCS).
     */
    public const EPSG_NATRF2022E2020_UTM_ZONE_5N = 'urn:ogc:def:crs:EPSG::23905';

    /**
     * NATRF2022e2020 / UTM zone 60N
     * Extent: USA - between 174°E and 180°E - Alaska and offshore continental shelf (OCS).
     */
    public const EPSG_NATRF2022E2020_UTM_ZONE_60N = 'urn:ogc:def:crs:EPSG::23960';

    /**
     * NATRF2022e2020 / UTM zone 6N
     * Extent: USA - between 150°W and 144°W - Alaska and offshore continental shelf (OCS).
     */
    public const EPSG_NATRF2022E2020_UTM_ZONE_6N = 'urn:ogc:def:crs:EPSG::23906';

    /**
     * NATRF2022e2020 / UTM zone 7N
     * Extent: North America - between 144°W and 138°W. Canada - British Columbia; Yukon. USA - Alaska.
     */
    public const EPSG_NATRF2022E2020_UTM_ZONE_7N = 'urn:ogc:def:crs:EPSG::23907';

    /**
     * NATRF2022e2020 / UTM zone 8N
     * Extent: North America - between 138°W and 132°W. Canada - British Columbia; Northwest Territories; Yukon. USA
     * - Alaska.
     */
    public const EPSG_NATRF2022E2020_UTM_ZONE_8N = 'urn:ogc:def:crs:EPSG::23908';

    /**
     * NATRF2022e2020 / UTM zone 9N
     * Extent: North America - between 132°W and 126°W. Canada - British Columbia; Northwest Territories; Yukon. USA
     * - Alaska.
     */
    public const EPSG_NATRF2022E2020_UTM_ZONE_9N = 'urn:ogc:def:crs:EPSG::23909';

    /**
     * NATRF2022e2020 / Vermont
     * Extent: USA - Vermont
     * See code 24102 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_VERMONT = 'urn:ogc:def:crs:EPSG::24101';

    /**
     * NATRF2022e2020 / Vermont (ft)
     * Extent: USA - Vermont
     * See code 24101 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_VERMONT_FT = 'urn:ogc:def:crs:EPSG::24102';

    /**
     * NATRF2022e2020 / Virginia
     * Extent: USA - Virginia
     * See code 24104 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_VIRGINIA = 'urn:ogc:def:crs:EPSG::24103';

    /**
     * NATRF2022e2020 / Virginia (ft)
     * Extent: USA - Virginia
     * See code 24103 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_VIRGINIA_FT = 'urn:ogc:def:crs:EPSG::24104';

    /**
     * NATRF2022e2020 / Virginia North
     * Extent: USA - Virginia - counties of Arlington; Augusta; Bath; Caroline; Clarke; Culpeper; Fairfax; Fauquier;
     * Frederick; Greene; Highland; King George; Loudoun; Madison; Orange; Page; Prince William; Rappahannock;
     * Rockingham; Shenandoah; Spotsylvania; Stafford; Warren; Westmoreland
     * See code 24106 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_VIRGINIA_NORTH = 'urn:ogc:def:crs:EPSG::24105';

    /**
     * NATRF2022e2020 / Virginia North (ft)
     * Extent: USA - Virginia - counties of Arlington; Augusta; Bath; Caroline; Clarke; Culpeper; Fairfax; Fauquier;
     * Frederick; Greene; Highland; King George; Loudoun; Madison; Orange; Page; Prince William; Rappahannock;
     * Rockingham; Shenandoah; Spotsylvania; Stafford; Warren; Westmoreland
     * See code 24105 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_VIRGINIA_NORTH_FT = 'urn:ogc:def:crs:EPSG::24106';

    /**
     * NATRF2022e2020 / Virginia South
     * Extent: USA - Virginia - counties of Accomack; Albemarle; Alleghany; Amelia; Amherst; Appomattox; Bedford;
     * Bland; Botetourt; Bristol; Brunswick; Buchanan; Buckingham; Campbell; Carroll; Charles City; Charlotte;
     * Chesapeake; Chesterfield; Colonial Heights; Craig; Cumberland; Dickenson; Dinwiddie; Essex; Floyd; Fluvanna;
     * Franklin; Giles; Gloucester; Goochland; Grayson; Greensville; Halifax; Hampton; Hanover; Henrico; Henry; Isle of
     * Wight; James City; King and Queen; King William; Lancaster; Lee; Louisa; Lunenburg; Lynchburg; Mathews;
     * Mecklenburg; Middlesex; Montgomery; Nelson; New Kent; Newport News; Norfolk; Northampton; Northumberland;
     * Norton; Nottoway; Patrick; Petersburg; Pittsylvania; Portsmouth; Powhatan; Prince Edward; Prince George;
     * Pulaski; Richmond; Roanoke; Rockbridge; Russell; Scott; Smyth; Southampton; Suffolk; Surry; Sussex; Tazewell;
     * Washington; Wise; Wythe; York
     * See code 24108 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_VIRGINIA_SOUTH = 'urn:ogc:def:crs:EPSG::24107';

    /**
     * NATRF2022e2020 / Virginia South (ft)
     * Extent: USA - Virginia - counties of Accomack; Albemarle; Alleghany; Amelia; Amherst; Appomattox; Bedford;
     * Bland; Botetourt; Bristol; Brunswick; Buchanan; Buckingham; Campbell; Carroll; Charles City; Charlotte;
     * Chesapeake; Chesterfield; Colonial Heights; Craig; Cumberland; Dickenson; Dinwiddie; Essex; Floyd; Fluvanna;
     * Franklin; Giles; Gloucester; Goochland; Grayson; Greensville; Halifax; Hampton; Hanover; Henrico; Henry; Isle of
     * Wight; James City; King and Queen; King William; Lancaster; Lee; Louisa; Lunenburg; Lynchburg; Mathews;
     * Mecklenburg; Middlesex; Montgomery; Nelson; New Kent; Newport News; Norfolk; Northampton; Northumberland;
     * Norton; Nottoway; Patrick; Petersburg; Pittsylvania; Portsmouth; Powhatan; Prince Edward; Prince George;
     * Pulaski; Richmond; Roanoke; Rockbridge; Russell; Scott; Smyth; Southampton; Suffolk; Surry; Sussex; Tazewell;
     * Washington; Wise; Wythe; York
     * See code 24107 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_VIRGINIA_SOUTH_FT = 'urn:ogc:def:crs:EPSG::24108';

    /**
     * NATRF2022e2020 / Washington
     * Extent: USA - Washington
     * See code 24110 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_WASHINGTON = 'urn:ogc:def:crs:EPSG::24109';

    /**
     * NATRF2022e2020 / Washington (ft)
     * Extent: USA - Washington
     * See code 24109 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_WASHINGTON_FT = 'urn:ogc:def:crs:EPSG::24110';

    /**
     * NATRF2022e2020 / Washington North
     * Extent: USA - Washington - counties of Chelan; Clallam; Douglas; Ferry; Grant north of approximately 47°30'N;
     * Island; Jefferson; King; Kitsap; Lincoln; Okanogan; Pend Oreille; San Juan; Skagit; Snohomish; Spokane; Stevens;
     * Whatcom
     * See code 24112 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_WASHINGTON_NORTH = 'urn:ogc:def:crs:EPSG::24111';

    /**
     * NATRF2022e2020 / Washington North (ft)
     * Extent: USA - Washington - counties of Chelan; Clallam; Douglas; Ferry; Grant north of approximately 47°30'N;
     * Island; Jefferson; King; Kitsap; Lincoln; Okanogan; Pend Oreille; San Juan; Skagit; Snohomish; Spokane; Stevens;
     * Whatcom
     * See code 24111 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_WASHINGTON_NORTH_FT = 'urn:ogc:def:crs:EPSG::24112';

    /**
     * NATRF2022e2020 / Washington South
     * Extent: USA - Washington - counties of Adams; Asotin; Benton; Clark; Columbia; Cowlitz; Franklin; Garfield;
     * Grant south of approximately 47°30'N; Grays Harbor; Kittitas; Klickitat; Lewis; Mason; Pacific; Pierce;
     * Skamania; Thurston; Wahkiakum; Walla Walla; Whitman; Yakima
     * See code 24114 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_WASHINGTON_SOUTH = 'urn:ogc:def:crs:EPSG::24113';

    /**
     * NATRF2022e2020 / Washington South (ft)
     * Extent: USA - Washington - counties of Adams; Asotin; Benton; Clark; Columbia; Cowlitz; Franklin; Garfield;
     * Grant south of approximately 47°30'N; Grays Harbor; Kittitas; Klickitat; Lewis; Mason; Pacific; Pierce;
     * Skamania; Thurston; Wahkiakum; Walla Walla; Whitman; Yakima
     * See code 24113 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_WASHINGTON_SOUTH_FT = 'urn:ogc:def:crs:EPSG::24114';

    /**
     * NATRF2022e2020 / West Virginia
     * Extent: USA - West Virginia
     * See code 24116 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_WEST_VIRGINIA = 'urn:ogc:def:crs:EPSG::24115';

    /**
     * NATRF2022e2020 / West Virginia (ft)
     * Extent: USA - West Virginia
     * See code 24115 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_WEST_VIRGINIA_FT = 'urn:ogc:def:crs:EPSG::24116';

    /**
     * NATRF2022e2020 / Wyoming
     * Extent: USA - Wyoming
     * See code 24286 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_WYOMING = 'urn:ogc:def:crs:EPSG::24285';

    /**
     * NATRF2022e2020 / Wyoming East
     * Extent: USA - Wyoming - counties of Albany; Campbell; Converse; Crook; Goshen; Laramie; Niobrara; Platte; Weston
     * See code 24288 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_WYOMING_EAST = 'urn:ogc:def:crs:EPSG::24287';

    /**
     * NATRF2022e2020 / Wyoming East Central
     * Extent: USA - Wyoming - counties of Big Horn; Carbon; Johnson; Natrona; Sheridan; Washakie
     * See code 24290 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_WYOMING_EAST_CENTRAL = 'urn:ogc:def:crs:EPSG::24289';

    /**
     * NATRF2022e2020 / Wyoming East Central (ft)
     * Extent: USA - Wyoming - counties of Big Horn; Carbon; Johnson; Natrona; Sheridan; Washakie
     * See code 24289 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_WYOMING_EAST_CENTRAL_FT = 'urn:ogc:def:crs:EPSG::24290';

    /**
     * NATRF2022e2020 / Wyoming East (ft)
     * Extent: USA - Wyoming - counties of Albany; Campbell; Converse; Crook; Goshen; Laramie; Niobrara; Platte; Weston
     * See code 24287 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_WYOMING_EAST_FT = 'urn:ogc:def:crs:EPSG::24288';

    /**
     * NATRF2022e2020 / Wyoming (ft)
     * Extent: USA - Wyoming
     * See code 24285 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_WYOMING_FT = 'urn:ogc:def:crs:EPSG::24286';

    /**
     * NATRF2022e2020 / Wyoming West
     * Extent: USA - Wyoming - counties of Lincoln; Sublette; Teton; Uinta
     * See code 24296 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_WYOMING_WEST = 'urn:ogc:def:crs:EPSG::24295';

    /**
     * NATRF2022e2020 / Wyoming West Central
     * Extent: USA - Wyoming - counties of Fremont; Hot Springs; Park; Sweetwater
     * See code 24294 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_WYOMING_WEST_CENTRAL = 'urn:ogc:def:crs:EPSG::24293';

    /**
     * NATRF2022e2020 / Wyoming West Central (ft)
     * Extent: USA - Wyoming - counties of Fremont; Hot Springs; Park; Sweetwater
     * See code 24293 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_WYOMING_WEST_CENTRAL_FT = 'urn:ogc:def:crs:EPSG::24294';

    /**
     * NATRF2022e2020 / Wyoming West (ft)
     * Extent: USA - Wyoming - counties of Lincoln; Sublette; Teton; Uinta
     * See code 24295 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_WYOMING_WEST_FT = 'urn:ogc:def:crs:EPSG::24296';

    /**
     * NATRF2022e2020 / Wyoming Wind River Nation
     * Extent: USA - Wyoming - Wind River Indian Reservation
     * See code 24298 for equivalent CRS in (international) feet.
     */
    public const EPSG_NATRF2022E2020_WYOMING_WIND_RIVER_NATION = 'urn:ogc:def:crs:EPSG::24297';

    /**
     * NATRF2022e2020 / Wyoming Wind River Nation (ft)
     * Extent: USA - Wyoming - Wind River Indian Reservation
     * See code 24297 for equivalent CRS in meters.
     */
    public const EPSG_NATRF2022E2020_WYOMING_WIND_RIVER_NATION_FT = 'urn:ogc:def:crs:EPSG::24298';

    /**
     * @deprecated use EPSG_NATRF2022E2020_GULF instead
     */
    public const EPSG_NATRF2022_GULF = 'urn:ogc:def:crs:EPSG::10979';

    /**
     * @deprecated use EPSG_NATRF2022E2020_GULF_EAST_CENTRAL_FT instead
     */
    public const EPSG_NATRF2022_GULF_EAST_CENTRAL_FT = 'urn:ogc:def:crs:EPSG::10986';

    /**
     * @deprecated use EPSG_NATRF2022E2020_GULF_EAST_FT instead
     */
    public const EPSG_NATRF2022_GULF_EAST_FT = 'urn:ogc:def:crs:EPSG::10987';

    /**
     * @deprecated use EPSG_NATRF2022E2020_GULF_FT instead
     */
    public const EPSG_NATRF2022_GULF_FT = 'urn:ogc:def:crs:EPSG::10980';

    /**
     * @deprecated use EPSG_NATRF2022E2020_GULF_LOUISIANA_SHELF_FT instead
     */
    public const EPSG_NATRF2022_GULF_LOUISIANA_SHELF_FT = 'urn:ogc:def:crs:EPSG::10981';

    /**
     * @deprecated use EPSG_NATRF2022E2020_GULF_TEXAS_SHELF_NORTH_FT instead
     */
    public const EPSG_NATRF2022_GULF_TEXAS_SHELF_NORTH_FT = 'urn:ogc:def:crs:EPSG::10982';

    /**
     * @deprecated use EPSG_NATRF2022E2020_GULF_TEXAS_SHELF_SOUTH_FT instead
     */
    public const EPSG_NATRF2022_GULF_TEXAS_SHELF_SOUTH_FT = 'urn:ogc:def:crs:EPSG::10983';

    /**
     * @deprecated use EPSG_NATRF2022E2020_GULF_WEST_CENTRAL_FT instead
     */
    public const EPSG_NATRF2022_GULF_WEST_CENTRAL_FT = 'urn:ogc:def:crs:EPSG::10985';

    /**
     * @deprecated use EPSG_NATRF2022E2020_GULF_WEST_FT instead
     */
    public const EPSG_NATRF2022_GULF_WEST_FT = 'urn:ogc:def:crs:EPSG::10984';

    /**
     * NEA74 Noumea / Noumea Lambert
     * Extent: New Caledonia - Grande Terre - Noumea district
     * Replaced by RGNC91-93 / Lambert Caledonie (CRS code 3163). Gives identical conversion results as NEA74 Noumea /
     * Noumea Lambert 2 (CRS code 3166).
     */
    public const EPSG_NEA74_NOUMEA_NOUMEA_LAMBERT = 'urn:ogc:def:crs:EPSG::3165';

    /**
     * NEA74 Noumea / Noumea Lambert 2
     * Extent: New Caledonia - Grande Terre - Noumea district
     * Replaced by RGNC91-93 / Lambert Caledonie (CRS code 3163). Variant of NEA74 Noumea / Noumea Lambert (CRS code
     * 3166) with defining parameters at integer seconds: gives identical conversion results.
     */
    public const EPSG_NEA74_NOUMEA_NOUMEA_LAMBERT_2 = 'urn:ogc:def:crs:EPSG::3166';

    /**
     * NEA74 Noumea / UTM zone 58S
     * Extent: New Caledonia - Grande Terre - Noumea district
     * Replaced by RGNC91-93 / Lambert Caledonie (CRS code 3163).
     */
    public const EPSG_NEA74_NOUMEA_UTM_ZONE_58S = 'urn:ogc:def:crs:EPSG::2998';

    /**
     * New Beijing / 3-degree Gauss-Kruger CM 102E
     * Extent: China - between 100°30'E and 103°30'E
     * Truncated form of New Beijing / 3-degree Gauss-Kruger zone 34 (code 4770).
     */
    public const EPSG_NEW_BEIJING_3_DEGREE_GAUSS_KRUGER_CM_102E = 'urn:ogc:def:crs:EPSG::4791';

    /**
     * New Beijing / 3-degree Gauss-Kruger CM 105E
     * Extent: China - between 103°30'E and 106°30'E
     * Truncated form of New Beijing / 3-degree Gauss-Kruger zone 35 (code 4771).
     */
    public const EPSG_NEW_BEIJING_3_DEGREE_GAUSS_KRUGER_CM_105E = 'urn:ogc:def:crs:EPSG::4792';

    /**
     * New Beijing / 3-degree Gauss-Kruger CM 108E
     * Extent: China - onshore between 106°30'E and 109°30'E
     * Truncated form of New Beijing / 3-degree Gauss-Kruger zone 36 (code 4772).
     */
    public const EPSG_NEW_BEIJING_3_DEGREE_GAUSS_KRUGER_CM_108E = 'urn:ogc:def:crs:EPSG::4793';

    /**
     * New Beijing / 3-degree Gauss-Kruger CM 111E
     * Extent: China - onshore between 109°30'E and 112°30'E
     * Truncated form of New Beijing / 3-degree Gauss-Kruger zone 37 (code 4773).
     */
    public const EPSG_NEW_BEIJING_3_DEGREE_GAUSS_KRUGER_CM_111E = 'urn:ogc:def:crs:EPSG::4794';

    /**
     * New Beijing / 3-degree Gauss-Kruger CM 114E
     * Extent: China - onshore between 112°30'E and 115°30'E
     * Truncated form of New Beijing / 3-degree Gauss-Kruger zone 38 (code 4774).
     */
    public const EPSG_NEW_BEIJING_3_DEGREE_GAUSS_KRUGER_CM_114E = 'urn:ogc:def:crs:EPSG::4795';

    /**
     * New Beijing / 3-degree Gauss-Kruger CM 117E
     * Extent: China - onshore between 115°30'E and 118°30'E
     * Truncated form of New Beijing / 3-degree Gauss-Kruger zone 39 (code 4775).
     */
    public const EPSG_NEW_BEIJING_3_DEGREE_GAUSS_KRUGER_CM_117E = 'urn:ogc:def:crs:EPSG::4796';

    /**
     * New Beijing / 3-degree Gauss-Kruger CM 120E
     * Extent: China - onshore between 118°30'E and 121°30'E
     * Truncated form of New Beijing / 3-degree Gauss-Kruger zone 40 (code 4776).
     */
    public const EPSG_NEW_BEIJING_3_DEGREE_GAUSS_KRUGER_CM_120E = 'urn:ogc:def:crs:EPSG::4797';

    /**
     * New Beijing / 3-degree Gauss-Kruger CM 123E
     * Extent: China - onshore between 121°30'E and 124°30'E
     * Truncated form of New Beijing / 3-degree Gauss-Kruger zone 41 (code 4777).
     */
    public const EPSG_NEW_BEIJING_3_DEGREE_GAUSS_KRUGER_CM_123E = 'urn:ogc:def:crs:EPSG::4798';

    /**
     * New Beijing / 3-degree Gauss-Kruger CM 126E
     * Extent: China - onshore between 124°30'E and 127°30'E
     * Truncated form of New Beijing / 3-degree Gauss-Kruger zone 42 (code 4778).
     */
    public const EPSG_NEW_BEIJING_3_DEGREE_GAUSS_KRUGER_CM_126E = 'urn:ogc:def:crs:EPSG::4799';

    /**
     * New Beijing / 3-degree Gauss-Kruger CM 129E
     * Extent: China - between 127°30'E and 130°30'E
     * Truncated form of New Beijing / 3-degree Gauss-Kruger zone 43 (code 4779).
     */
    public const EPSG_NEW_BEIJING_3_DEGREE_GAUSS_KRUGER_CM_129E = 'urn:ogc:def:crs:EPSG::4800';

    /**
     * New Beijing / 3-degree Gauss-Kruger CM 132E
     * Extent: China - between 130°30'E and 133°30'E
     * Truncated form of New Beijing / 3-degree Gauss-Kruger zone 44 (code 4780).
     */
    public const EPSG_NEW_BEIJING_3_DEGREE_GAUSS_KRUGER_CM_132E = 'urn:ogc:def:crs:EPSG::4812';

    /**
     * New Beijing / 3-degree Gauss-Kruger CM 135E
     * Extent: China - east of 133°30'E
     * Truncated form of New Beijing / 3-degree Gauss-Kruger zone 45 (code 4781).
     */
    public const EPSG_NEW_BEIJING_3_DEGREE_GAUSS_KRUGER_CM_135E = 'urn:ogc:def:crs:EPSG::4822';

    /**
     * New Beijing / 3-degree Gauss-Kruger CM 75E
     * Extent: China - west of 76°30'E
     * Truncated form of New Beijing / 3-degree Gauss-Kruger zone 25 (code 4652).
     */
    public const EPSG_NEW_BEIJING_3_DEGREE_GAUSS_KRUGER_CM_75E = 'urn:ogc:def:crs:EPSG::4782';

    /**
     * New Beijing / 3-degree Gauss-Kruger CM 78E
     * Extent: China - between 76°30'E and 79°30'E
     * Truncated form of New Beijing / 3-degree Gauss-Kruger zone 26 (code 4653).
     */
    public const EPSG_NEW_BEIJING_3_DEGREE_GAUSS_KRUGER_CM_78E = 'urn:ogc:def:crs:EPSG::4783';

    /**
     * New Beijing / 3-degree Gauss-Kruger CM 81E
     * Extent: China - between 79°30'E and 82°30'E
     * Truncated form of New Beijing / 3-degree Gauss-Kruger zone 27 (code 4654).
     */
    public const EPSG_NEW_BEIJING_3_DEGREE_GAUSS_KRUGER_CM_81E = 'urn:ogc:def:crs:EPSG::4784';

    /**
     * New Beijing / 3-degree Gauss-Kruger CM 84E
     * Extent: China - between 82°30'E and 85°30'E
     * Truncated form of New Beijing / 3-degree Gauss-Kruger zone 28 (code 4655).
     */
    public const EPSG_NEW_BEIJING_3_DEGREE_GAUSS_KRUGER_CM_84E = 'urn:ogc:def:crs:EPSG::4785';

    /**
     * New Beijing / 3-degree Gauss-Kruger CM 87E
     * Extent: China - between 85°30'E and 88°30'E
     * Truncated form of New Beijing / 3-degree Gauss-Kruger zone 29 (code 4656).
     */
    public const EPSG_NEW_BEIJING_3_DEGREE_GAUSS_KRUGER_CM_87E = 'urn:ogc:def:crs:EPSG::4786';

    /**
     * New Beijing / 3-degree Gauss-Kruger CM 90E
     * Extent: China - between 88°30'E and 91°30'E
     * Truncated form of New Beijing / 3-degree Gauss-Kruger zone 30 (code 4766).
     */
    public const EPSG_NEW_BEIJING_3_DEGREE_GAUSS_KRUGER_CM_90E = 'urn:ogc:def:crs:EPSG::4787';

    /**
     * New Beijing / 3-degree Gauss-Kruger CM 93E
     * Extent: China - between 91°30'E and 94°30'E
     * Truncated form of New Beijing / 3-degree Gauss-Kruger zone 31 (code 4767).
     */
    public const EPSG_NEW_BEIJING_3_DEGREE_GAUSS_KRUGER_CM_93E = 'urn:ogc:def:crs:EPSG::4788';

    /**
     * New Beijing / 3-degree Gauss-Kruger CM 96E
     * Extent: China - between 94°30'E and 97°30'E
     * Truncated form of New Beijing / 3-degree Gauss-Kruger zone 32 (code 4768).
     */
    public const EPSG_NEW_BEIJING_3_DEGREE_GAUSS_KRUGER_CM_96E = 'urn:ogc:def:crs:EPSG::4789';

    /**
     * New Beijing / 3-degree Gauss-Kruger CM 99E
     * Extent: China - between 97°30'E and 100°30'E
     * Truncated form of New Beijing / 3-degree Gauss-Kruger zone 33 (code 4769).
     */
    public const EPSG_NEW_BEIJING_3_DEGREE_GAUSS_KRUGER_CM_99E = 'urn:ogc:def:crs:EPSG::4790';

    /**
     * New Beijing / 3-degree Gauss-Kruger zone 25
     * Extent: China - west of 76°30'E
     * Also found with truncated false easting - see New Beijing / 3-degree Gauss-Kruger CM 75E (code 4782).
     */
    public const EPSG_NEW_BEIJING_3_DEGREE_GAUSS_KRUGER_ZONE_25 = 'urn:ogc:def:crs:EPSG::4652';

    /**
     * New Beijing / 3-degree Gauss-Kruger zone 26
     * Extent: China - between 76°30'E and 79°30'E
     * Also found with truncated false easting - see New Beijing / 3-degree Gauss-Kruger CM 78E (code 4783).
     */
    public const EPSG_NEW_BEIJING_3_DEGREE_GAUSS_KRUGER_ZONE_26 = 'urn:ogc:def:crs:EPSG::4653';

    /**
     * New Beijing / 3-degree Gauss-Kruger zone 27
     * Extent: China - between 79°30'E and 82°30'E
     * Also found with truncated false easting - see New Beijing / 3-degree Gauss-Kruger CM 81E (code 4784).
     */
    public const EPSG_NEW_BEIJING_3_DEGREE_GAUSS_KRUGER_ZONE_27 = 'urn:ogc:def:crs:EPSG::4654';

    /**
     * New Beijing / 3-degree Gauss-Kruger zone 28
     * Extent: China - between 82°30'E and 85°30'E
     * Also found with truncated false easting - see New Beijing / 3-degree Gauss-Kruger CM 84E (code 4785).
     */
    public const EPSG_NEW_BEIJING_3_DEGREE_GAUSS_KRUGER_ZONE_28 = 'urn:ogc:def:crs:EPSG::4655';

    /**
     * New Beijing / 3-degree Gauss-Kruger zone 29
     * Extent: China - between 85°30'E and 88°30'E
     * Also found with truncated false easting - see New Beijing / 3-degree Gauss-Kruger CM 87E (code 4786).
     */
    public const EPSG_NEW_BEIJING_3_DEGREE_GAUSS_KRUGER_ZONE_29 = 'urn:ogc:def:crs:EPSG::4656';

    /**
     * New Beijing / 3-degree Gauss-Kruger zone 30
     * Extent: China - between 88°30'E and 91°30'E
     * Also found with truncated false easting - see New Beijing / 3-degree Gauss-Kruger CM 90E (code 4787).
     */
    public const EPSG_NEW_BEIJING_3_DEGREE_GAUSS_KRUGER_ZONE_30 = 'urn:ogc:def:crs:EPSG::4766';

    /**
     * New Beijing / 3-degree Gauss-Kruger zone 31
     * Extent: China - between 91°30'E and 94°30'E
     * Also found with truncated false easting - see New Beijing / 3-degree Gauss-Kruger CM 93E (code 4788).
     */
    public const EPSG_NEW_BEIJING_3_DEGREE_GAUSS_KRUGER_ZONE_31 = 'urn:ogc:def:crs:EPSG::4767';

    /**
     * New Beijing / 3-degree Gauss-Kruger zone 32
     * Extent: China - between 94°30'E and 97°30'E
     * Also found with truncated false easting - see New Beijing / 3-degree Gauss-Kruger CM 96E (code 4789).
     */
    public const EPSG_NEW_BEIJING_3_DEGREE_GAUSS_KRUGER_ZONE_32 = 'urn:ogc:def:crs:EPSG::4768';

    /**
     * New Beijing / 3-degree Gauss-Kruger zone 33
     * Extent: China - between 97°30'E and 100°30'E
     * Also found with truncated false easting - see New Beijing / 3-degree Gauss-Kruger CM 99E (code 4790).
     */
    public const EPSG_NEW_BEIJING_3_DEGREE_GAUSS_KRUGER_ZONE_33 = 'urn:ogc:def:crs:EPSG::4769';

    /**
     * New Beijing / 3-degree Gauss-Kruger zone 34
     * Extent: China - between 100°30'E and 103°30'E
     * Also found with truncated false easting - see New Beijing / 3-degree Gauss-Kruger CM 102E (code 4791).
     */
    public const EPSG_NEW_BEIJING_3_DEGREE_GAUSS_KRUGER_ZONE_34 = 'urn:ogc:def:crs:EPSG::4770';

    /**
     * New Beijing / 3-degree Gauss-Kruger zone 35
     * Extent: China - between 103°30'E and 106°30'E
     * Also found with truncated false easting - see New Beijing / 3-degree Gauss-Kruger CM 105E (code 4792).
     */
    public const EPSG_NEW_BEIJING_3_DEGREE_GAUSS_KRUGER_ZONE_35 = 'urn:ogc:def:crs:EPSG::4771';

    /**
     * New Beijing / 3-degree Gauss-Kruger zone 36
     * Extent: China - onshore between 106°30'E and 109°30'E
     * Also found with truncated false easting - see New Beijing / 3-degree Gauss-Kruger CM 108E (code 4793).
     */
    public const EPSG_NEW_BEIJING_3_DEGREE_GAUSS_KRUGER_ZONE_36 = 'urn:ogc:def:crs:EPSG::4772';

    /**
     * New Beijing / 3-degree Gauss-Kruger zone 37
     * Extent: China - onshore between 109°30'E and 112°30'E
     * Also found with truncated false easting - see New Beijing / 3-degree Gauss-Kruger CM 111E (code 4794).
     */
    public const EPSG_NEW_BEIJING_3_DEGREE_GAUSS_KRUGER_ZONE_37 = 'urn:ogc:def:crs:EPSG::4773';

    /**
     * New Beijing / 3-degree Gauss-Kruger zone 38
     * Extent: China - onshore between 112°30'E and 115°30'E
     * Also found with truncated false easting - see New Beijing / 3-degree Gauss-Kruger CM 114E (code 4795).
     */
    public const EPSG_NEW_BEIJING_3_DEGREE_GAUSS_KRUGER_ZONE_38 = 'urn:ogc:def:crs:EPSG::4774';

    /**
     * New Beijing / 3-degree Gauss-Kruger zone 39
     * Extent: China - onshore between 115°30'E and 118°30'E
     * Also found with truncated false easting - see New Beijing / 3-degree Gauss-Kruger CM 117E (code 4796).
     */
    public const EPSG_NEW_BEIJING_3_DEGREE_GAUSS_KRUGER_ZONE_39 = 'urn:ogc:def:crs:EPSG::4775';

    /**
     * New Beijing / 3-degree Gauss-Kruger zone 40
     * Extent: China - onshore between 118°30'E and 121°30'E
     * Also found with truncated false easting - see New Beijing / 3-degree Gauss-Kruger CM 120E (code 4797).
     */
    public const EPSG_NEW_BEIJING_3_DEGREE_GAUSS_KRUGER_ZONE_40 = 'urn:ogc:def:crs:EPSG::4776';

    /**
     * New Beijing / 3-degree Gauss-Kruger zone 41
     * Extent: China - onshore between 121°30'E and 124°30'E
     * Also found with truncated false easting - see New Beijing / 3-degree Gauss-Kruger CM 123E (code 4798).
     */
    public const EPSG_NEW_BEIJING_3_DEGREE_GAUSS_KRUGER_ZONE_41 = 'urn:ogc:def:crs:EPSG::4777';

    /**
     * New Beijing / 3-degree Gauss-Kruger zone 42
     * Extent: China - onshore between 124°30'E and 127°30'E
     * Also found with truncated false easting - see New Beijing / 3-degree Gauss-Kruger CM 126E (code 4799).
     */
    public const EPSG_NEW_BEIJING_3_DEGREE_GAUSS_KRUGER_ZONE_42 = 'urn:ogc:def:crs:EPSG::4778';

    /**
     * New Beijing / 3-degree Gauss-Kruger zone 43
     * Extent: China - between 127°30'E and 130°30'E
     * Also found with truncated false easting - see New Beijing / 3-degree Gauss-Kruger CM 129E (code 4800).
     */
    public const EPSG_NEW_BEIJING_3_DEGREE_GAUSS_KRUGER_ZONE_43 = 'urn:ogc:def:crs:EPSG::4779';

    /**
     * New Beijing / 3-degree Gauss-Kruger zone 44
     * Extent: China - between 130°30'E and 133°30'E
     * Also found with truncated false easting - see New Beijing / 3-degree Gauss-Kruger CM 132E (code 4812).
     */
    public const EPSG_NEW_BEIJING_3_DEGREE_GAUSS_KRUGER_ZONE_44 = 'urn:ogc:def:crs:EPSG::4780';

    /**
     * New Beijing / 3-degree Gauss-Kruger zone 45
     * Extent: China - east of 133°30'E
     * Also found with truncated false easting - see New Beijing / 3-degree Gauss-Kruger CM 135E (code 4822).
     */
    public const EPSG_NEW_BEIJING_3_DEGREE_GAUSS_KRUGER_ZONE_45 = 'urn:ogc:def:crs:EPSG::4781';

    /**
     * New Beijing / Gauss-Kruger CM 105E
     * Extent: China - onshore between 102°E and 108°E
     * Truncated form of New Beijing / [6-degree] Gauss-Kruger zone 18 (code 4573).
     */
    public const EPSG_NEW_BEIJING_GAUSS_KRUGER_CM_105E = 'urn:ogc:def:crs:EPSG::4584';

    /**
     * New Beijing / Gauss-Kruger CM 111E
     * Extent: China - onshore between 108°E and 114°E
     * Truncated form of New Beijing / [6-degree] Gauss-Kruger zone 19 (code 4574).
     */
    public const EPSG_NEW_BEIJING_GAUSS_KRUGER_CM_111E = 'urn:ogc:def:crs:EPSG::4585';

    /**
     * New Beijing / Gauss-Kruger CM 117E
     * Extent: China - onshore between 114°E and 120°E
     * Truncated form of New Beijing / [6-degree] Gauss-Kruger zone 20 (code 4575).
     */
    public const EPSG_NEW_BEIJING_GAUSS_KRUGER_CM_117E = 'urn:ogc:def:crs:EPSG::4586';

    /**
     * New Beijing / Gauss-Kruger CM 123E
     * Extent: China - onshore between 120°E and 126°E
     * Truncated form of New Beijing / [6-degree] Gauss-Kruger zone 21 (code 4576).
     */
    public const EPSG_NEW_BEIJING_GAUSS_KRUGER_CM_123E = 'urn:ogc:def:crs:EPSG::4587';

    /**
     * New Beijing / Gauss-Kruger CM 129E
     * Extent: China - onshore between 126°E and 132°E
     * Truncated form of New Beijing / [6-degree] Gauss-Kruger zone 22 (code 4577).
     */
    public const EPSG_NEW_BEIJING_GAUSS_KRUGER_CM_129E = 'urn:ogc:def:crs:EPSG::4588';

    /**
     * New Beijing / Gauss-Kruger CM 135E
     * Extent: China - east of 132°E
     * Truncated form of New Beijing / [6-degree] Gauss-Kruger zone 23 (code 4578).
     */
    public const EPSG_NEW_BEIJING_GAUSS_KRUGER_CM_135E = 'urn:ogc:def:crs:EPSG::4589';

    /**
     * New Beijing / Gauss-Kruger CM 75E
     * Extent: China - west of 78°E
     * Truncated form of New Beijing / [6-degree] Gauss-Kruger zone 13 (code 4568).
     */
    public const EPSG_NEW_BEIJING_GAUSS_KRUGER_CM_75E = 'urn:ogc:def:crs:EPSG::4579';

    /**
     * New Beijing / Gauss-Kruger CM 81E
     * Extent: China - between 78°E and 84°E
     * Truncated form of New Beijing / [6-degree] Gauss-Kruger zone 14 (code 4569).
     */
    public const EPSG_NEW_BEIJING_GAUSS_KRUGER_CM_81E = 'urn:ogc:def:crs:EPSG::4580';

    /**
     * New Beijing / Gauss-Kruger CM 87E
     * Extent: China - between 84°E and 90°E
     * Truncated form of New Beijing / [6-degree] Gauss-Kruger zone 15 (code 4570).
     */
    public const EPSG_NEW_BEIJING_GAUSS_KRUGER_CM_87E = 'urn:ogc:def:crs:EPSG::4581';

    /**
     * New Beijing / Gauss-Kruger CM 93E
     * Extent: China - between 90°E and 96°E
     * Truncated form of New Beijing / [6-degree] Gauss-Kruger zone 16 (code 4571).
     */
    public const EPSG_NEW_BEIJING_GAUSS_KRUGER_CM_93E = 'urn:ogc:def:crs:EPSG::4582';

    /**
     * New Beijing / Gauss-Kruger CM 99E
     * Extent: China - between 96°E and 102°E
     * Truncated form of New Beijing / [6-degree] Gauss-Kruger zone 17 (code 4572).
     */
    public const EPSG_NEW_BEIJING_GAUSS_KRUGER_CM_99E = 'urn:ogc:def:crs:EPSG::4583';

    /**
     * New Beijing / Gauss-Kruger zone 13
     * Extent: China - west of 78°E
     * Also found with truncated false easting - see New Beijing / [6-degree] Gauss-Kruger CM 75E (code 4579).
     */
    public const EPSG_NEW_BEIJING_GAUSS_KRUGER_ZONE_13 = 'urn:ogc:def:crs:EPSG::4568';

    /**
     * New Beijing / Gauss-Kruger zone 14
     * Extent: China - between 78°E and 84°E
     * Also found with truncated false easting - see New Beijing / [6-degree] Gauss-Kruger CM 81E (code 4580).
     */
    public const EPSG_NEW_BEIJING_GAUSS_KRUGER_ZONE_14 = 'urn:ogc:def:crs:EPSG::4569';

    /**
     * New Beijing / Gauss-Kruger zone 15
     * Extent: China - between 84°E and 90°E
     * Also found with truncated false easting - see New Beijing / [6-degree] Gauss-Kruger CM 87E (code 4581).
     */
    public const EPSG_NEW_BEIJING_GAUSS_KRUGER_ZONE_15 = 'urn:ogc:def:crs:EPSG::4570';

    /**
     * New Beijing / Gauss-Kruger zone 16
     * Extent: China - between 90°E and 96°E
     * Also found with truncated false easting - see New Beijing / [6-degree] Gauss-Kruger CM 93E (code 4582).
     */
    public const EPSG_NEW_BEIJING_GAUSS_KRUGER_ZONE_16 = 'urn:ogc:def:crs:EPSG::4571';

    /**
     * New Beijing / Gauss-Kruger zone 17
     * Extent: China - between 96°E and 102°E
     * Also found with truncated false easting - see New Beijing / [6-degree] Gauss-Kruger CM 99E (code 4583).
     */
    public const EPSG_NEW_BEIJING_GAUSS_KRUGER_ZONE_17 = 'urn:ogc:def:crs:EPSG::4572';

    /**
     * New Beijing / Gauss-Kruger zone 18
     * Extent: China - onshore between 102°E and 108°E
     * Also found with truncated false easting - see New Beijing / [6-degree] Gauss-Kruger CM 105E (code 4584).
     */
    public const EPSG_NEW_BEIJING_GAUSS_KRUGER_ZONE_18 = 'urn:ogc:def:crs:EPSG::4573';

    /**
     * New Beijing / Gauss-Kruger zone 19
     * Extent: China - onshore between 108°E and 114°E
     * Also found with truncated false easting - see New Beijing / G-K zone 19 / [6-degree] Gauss-Kruger CM 111E (code
     * 4585).
     */
    public const EPSG_NEW_BEIJING_GAUSS_KRUGER_ZONE_19 = 'urn:ogc:def:crs:EPSG::4574';

    /**
     * New Beijing / Gauss-Kruger zone 20
     * Extent: China - onshore between 114°E and 120°E
     * Also found with truncated false easting - see New Beijing / [6-degree] Gauss-Kruger CM 117E (code 4586).
     */
    public const EPSG_NEW_BEIJING_GAUSS_KRUGER_ZONE_20 = 'urn:ogc:def:crs:EPSG::4575';

    /**
     * New Beijing / Gauss-Kruger zone 21
     * Extent: China - onshore between 120°E and 126°E
     * Also found with truncated false easting - see New Beijing / [6-degree] Gauss-Kruger CM 123E (code 4587).
     */
    public const EPSG_NEW_BEIJING_GAUSS_KRUGER_ZONE_21 = 'urn:ogc:def:crs:EPSG::4576';

    /**
     * New Beijing / Gauss-Kruger zone 22
     * Extent: China - onshore between 126°E and 132°E
     * Also found with truncated false easting - see New Beijing / [6-degree] Gauss-Kruger CM 129E (code 4588).
     */
    public const EPSG_NEW_BEIJING_GAUSS_KRUGER_ZONE_22 = 'urn:ogc:def:crs:EPSG::4577';

    /**
     * New Beijing / Gauss-Kruger zone 23
     * Extent: China - east of 132°E
     * Also found with truncated false easting - see New Beijing / [6-degree] Gauss-Kruger CM 135E (code 4589).
     */
    public const EPSG_NEW_BEIJING_GAUSS_KRUGER_ZONE_23 = 'urn:ogc:def:crs:EPSG::4578';

    /**
     * NGN / UTM zone 38N
     * Extent: Kuwait - onshore west of 48°E.
     */
    public const EPSG_NGN_UTM_ZONE_38N = 'urn:ogc:def:crs:EPSG::31838';

    /**
     * NGN / UTM zone 39N
     * Extent: Kuwait - onshore east of 48°E.
     */
    public const EPSG_NGN_UTM_ZONE_39N = 'urn:ogc:def:crs:EPSG::31839';

    /**
     * NGO 1948 (Oslo) / NGO zone I
     * Extent: Norway - west of 3°30'W of Oslo (7°13'22.5"E of Greenwich)
     * To be phased out and replaced by ETRF89 / UTM zone 32N.
     */
    public const EPSG_NGO_1948_OSLO_NGO_ZONE_I = 'urn:ogc:def:crs:EPSG::27391';

    /**
     * NGO 1948 (Oslo) / NGO zone II
     * Extent: Norway - between 3°30'W and 1°10' W of Oslo (7°13'22.5"E and 9°33'22.5"E of Greenwich)
     * To be phased out and replaced by ETRF89 / UTM zone 32N.
     */
    public const EPSG_NGO_1948_OSLO_NGO_ZONE_II = 'urn:ogc:def:crs:EPSG::27392';

    /**
     * NGO 1948 (Oslo) / NGO zone III
     * Extent: Norway - between 1°10'W and 1°15'E of Oslo (9°33'22.5"E and 11°58'22.5"E of Greenwich)
     * To be phased out and replaced by ETRF89 / UTM zone 32N.
     */
    public const EPSG_NGO_1948_OSLO_NGO_ZONE_III = 'urn:ogc:def:crs:EPSG::27393';

    /**
     * NGO 1948 (Oslo) / NGO zone IV
     * Extent: Norway - between 1°15'E and 4°20'E of Oslo (11°58'22.5"E and 15°03'22.5"E of Greenwich)
     * To be phased out and replaced by ETRF89 / UTM zone 32N and ETRF89 / UTM zone 33N.
     */
    public const EPSG_NGO_1948_OSLO_NGO_ZONE_IV = 'urn:ogc:def:crs:EPSG::27394';

    /**
     * NGO 1948 (Oslo) / NGO zone V
     * Extent: Norway - between 4°20'E and 8°10'E of Oslo (15°03'22.5"E and 18°53'22.5"E of Greenwich)
     * To be phased out and replaced by ETRF89 / UTM zone 33N and ETRF89 / UTM zone 34N.
     */
    public const EPSG_NGO_1948_OSLO_NGO_ZONE_V = 'urn:ogc:def:crs:EPSG::27395';

    /**
     * NGO 1948 (Oslo) / NGO zone VI
     * Extent: Norway - between 8°10'E and 12°10'E of Oslo (18°53'22.5"E and 22°53'22.5"E of Greenwich)
     * To be phased out and replaced by ETRF89 / UTM zone 34N.
     */
    public const EPSG_NGO_1948_OSLO_NGO_ZONE_VI = 'urn:ogc:def:crs:EPSG::27396';

    /**
     * NGO 1948 (Oslo) / NGO zone VII
     * Extent: Norway - between 12°10'E and 16°15'E of Oslo (22°53'22.5"E and 26°58'22.5"E of Greenwich)
     * To be phased out and replaced by ETRF89 / UTM zone 34N and ETRF89 / UTM zone 35N.
     */
    public const EPSG_NGO_1948_OSLO_NGO_ZONE_VII = 'urn:ogc:def:crs:EPSG::27397';

    /**
     * NGO 1948 (Oslo) / NGO zone VIII
     * Extent: Norway - east of 16°15'E of Oslo (26°58'22.5"E of Greenwich)
     * To be phased out and replaced by ETRF89 / UTM zone 35N.
     */
    public const EPSG_NGO_1948_OSLO_NGO_ZONE_VIII = 'urn:ogc:def:crs:EPSG::27398';

    /**
     * Nord Sahara 1959 / Nord Algerie
     * Extent: Algeria - onshore north of 38.5 grads North (34°39'N)
     * Replaces Voirol 1879 / Nord Algerie ancienne (code 30493). Grid coordinates on average across Algeria are
     * unchanged although local differences reach 30 metres; geographic coordinate equivalents do change.
     */
    public const EPSG_NORD_SAHARA_1959_NORD_ALGERIE = 'urn:ogc:def:crs:EPSG::30791';

    /**
     * Nord Sahara 1959 / Sud Algerie
     * Extent: Algeria - 35 grads to 38.5 grads North (31°30'N to 34°39'N)
     * Replaces Voirol 1879 / Sud Algerie ancienne (code 30494). Grid coordinates on average across Algeria are
     * unchanged although local differences reach 30 metres; geographic coordinate equivalents do change. INCT uses to
     * south of 31°30'N; OGP recommends UTM.
     */
    public const EPSG_NORD_SAHARA_1959_SUD_ALGERIE = 'urn:ogc:def:crs:EPSG::30792';

    /**
     * Nord Sahara 1959 / UTM zone 29N
     * Extent: Algeria - west of 6°W (of Greenwich).
     */
    public const EPSG_NORD_SAHARA_1959_UTM_ZONE_29N = 'urn:ogc:def:crs:EPSG::30729';

    /**
     * Nord Sahara 1959 / UTM zone 30N
     * Extent: Algeria - between 6°W and 0°W (of Greenwich).
     */
    public const EPSG_NORD_SAHARA_1959_UTM_ZONE_30N = 'urn:ogc:def:crs:EPSG::30730';

    /**
     * Nord Sahara 1959 / UTM zone 31N
     * Extent: Algeria - between 0°E and 6°E (of Greenwich).
     */
    public const EPSG_NORD_SAHARA_1959_UTM_ZONE_31N = 'urn:ogc:def:crs:EPSG::30731';

    /**
     * Nord Sahara 1959 / UTM zone 32N
     * Extent: Algeria - east of 6°E (of Greenwich).
     */
    public const EPSG_NORD_SAHARA_1959_UTM_ZONE_32N = 'urn:ogc:def:crs:EPSG::30732';

    /**
     * NSIDC EASE-Grid Global
     * Extent: World between 86°S and 86°N
     * Used as basis for Equal-Area Scalable Earth Grid (EASE-Grid). See information source for equations to define
     * EASE-Grid overlay. Superseded by WGS 84 / NSIDC EASE-Grid 2.0 Global (CRS code 6933), which should be preferred
     * for new data.
     */
    public const EPSG_NSIDC_EASE_GRID_GLOBAL = 'urn:ogc:def:crs:EPSG::3410';

    /**
     * NSIDC EASE-Grid North
     * Extent: Northern hemisphere
     * Used as basis for Equal-Area Scalable Earth Grid (EASE-Grid). See information source for equations to define
     * EASE-Grid overlay. Superseded by WGS 84 / NSIDC EASE-Grid 2.0 North (CRS code 6931), which should be preferred
     * for new data.
     */
    public const EPSG_NSIDC_EASE_GRID_NORTH = 'urn:ogc:def:crs:EPSG::3408';

    /**
     * NSIDC EASE-Grid South
     * Extent: Southern hemisphere
     * Used as basis for Equal-Area Scalable Earth Grid (EASE-Grid). See information source for equations to define
     * EASE-Grid overlay. Superseded by WGS 84 / NSIDC EASE-Grid 2.0 South (CRS code 6932), which should be preferred
     * for new data.
     */
    public const EPSG_NSIDC_EASE_GRID_SOUTH = 'urn:ogc:def:crs:EPSG::3409';

    /**
     * NSIDC Sea Ice Polar Stereographic North
     * Extent: Northern hemisphere - north of 60°N, including Arctic
     * The datum is unspecified. Uncertainty in location of over 1 km may result; at the coarse resolution and very
     * small scales for which this system should be used this uncertainty may be insignificant. See CRS 3413 for
     * geodetically preferred alternative.
     */
    public const EPSG_NSIDC_SEA_ICE_POLAR_STEREOGRAPHIC_NORTH = 'urn:ogc:def:crs:EPSG::3411';

    /**
     * NSIDC Sea Ice Polar Stereographic South
     * Extent: Southern hemisphere - south of 60°S - Antarctica
     * The datum is unspecified. Uncertainty in location of over 1 km may result; at the coarse resolution and very
     * small scales for which this system should be used this uncertainty may be insignificant. See CRS 3976 for
     * geodetically preferred alternative.
     */
    public const EPSG_NSIDC_SEA_ICE_POLAR_STEREOGRAPHIC_SOUTH = 'urn:ogc:def:crs:EPSG::3412';

    /**
     * NTF (Paris) / Lambert Centre France
     * Extent: France mainland onshore between 50.5 grads and 53.5 grads North (45°27'N to 48°09'N)
     * Replaced by NTF (Paris) / France zone II (code 27572) from 1972.
     */
    public const EPSG_NTF_PARIS_LAMBERT_CENTRE_FRANCE = 'urn:ogc:def:crs:EPSG::27562';

    /**
     * NTF (Paris) / Lambert Corse
     * Extent: France - Corsica onshore
     * Replaced by NTF (Paris) / France zone IV (code 27574) from 1972.
     */
    public const EPSG_NTF_PARIS_LAMBERT_CORSE = 'urn:ogc:def:crs:EPSG::27564';

    /**
     * NTF (Paris) / Lambert Nord France
     * Extent: France mainland onshore north of 53.5 grads North (48°09'N)
     * Replaced by NTF (Paris) / France zone I (code 27571) from 1972.
     */
    public const EPSG_NTF_PARIS_LAMBERT_NORD_FRANCE = 'urn:ogc:def:crs:EPSG::27561';

    /**
     * NTF (Paris) / Lambert Sud France
     * Extent: France - mainland onshore south of 50.5 grads North (45°27'N)
     * Replaced by NTF (Paris) / France zone III (code 27573) from 1972.
     */
    public const EPSG_NTF_PARIS_LAMBERT_SUD_FRANCE = 'urn:ogc:def:crs:EPSG::27563';

    /**
     * NTF (Paris) / Lambert zone I
     * Extent: France mainland onshore north of 53.5 grads North (48°09'N)
     * Introduced 1972. Replaces NTF (Paris) / Lambert Nord France (code 27561).
     */
    public const EPSG_NTF_PARIS_LAMBERT_ZONE_I = 'urn:ogc:def:crs:EPSG::27571';

    /**
     * NTF (Paris) / Lambert zone II
     * Extent: France mainland onshore between 50.5 grads and 53.5 grads North (45°27'N to 48°09'N). Also used over
     * all onshore mainland France
     * Introduced 1972. Replaces NTF (Paris) / Lambert Centre France (code 27562).
     */
    public const EPSG_NTF_PARIS_LAMBERT_ZONE_II = 'urn:ogc:def:crs:EPSG::27572';

    /**
     * NTF (Paris) / Lambert zone III
     * Extent: France - mainland onshore south of 50.5 grads North (45°27'N)
     * Introduced 1972. Replaces NTF (Paris) / Lambert Sud France (code 27563).
     */
    public const EPSG_NTF_PARIS_LAMBERT_ZONE_III = 'urn:ogc:def:crs:EPSG::27573';

    /**
     * NTF (Paris) / Lambert zone IV
     * Extent: France - Corsica onshore
     * Introduced 1972. Replaces NTF (Paris) / Lambert Corse (code 27564).
     */
    public const EPSG_NTF_PARIS_LAMBERT_ZONE_IV = 'urn:ogc:def:crs:EPSG::27574';

    /**
     * NZGD2000 / Amuri 2000
     * Extent: New Zealand - South Island - Amuri meridional circuit area
     * Replaced NZGD49 / Amuri Circuit (code 27219) from March 2000.
     */
    public const EPSG_NZGD2000_AMURI_2000 = 'urn:ogc:def:crs:EPSG::2119';

    /**
     * NZGD2000 / Antipodes Islands TM 2000
     * Extent: New Zealand - Antipodes Island, Bounty Islands.
     */
    public const EPSG_NZGD2000_ANTIPODES_ISLANDS_TM_2000 = 'urn:ogc:def:crs:EPSG::3790';

    /**
     * NZGD2000 / Auckland Islands TM 2000
     * Extent: New Zealand - Snares Island, Auckland Island - onshore.
     */
    public const EPSG_NZGD2000_AUCKLAND_ISLANDS_TM_2000 = 'urn:ogc:def:crs:EPSG::3788';

    /**
     * NZGD2000 / Bay of Plenty 2000
     * Extent: New Zealand - North Island - Bay of Plenty meridional circuit area
     * Replaced NZGD49 / Bay of Plenty Circuit (code 27206) from March 2000.
     */
    public const EPSG_NZGD2000_BAY_OF_PLENTY_2000 = 'urn:ogc:def:crs:EPSG::2106';

    /**
     * NZGD2000 / Bluff 2000
     * Extent: New Zealand - Stewart Island; South Island - Bluff meridional circuit area
     * Replaced NZGD49 / Bluff Circuit (code 27232) from March 2000.
     */
    public const EPSG_NZGD2000_BLUFF_2000 = 'urn:ogc:def:crs:EPSG::2132';

    /**
     * NZGD2000 / Buller 2000
     * Extent: New Zealand - South Island - Buller meridional circuit area
     * Replaced NZGD49 / Buller Circuit (code 27217) from March 2000.
     */
    public const EPSG_NZGD2000_BULLER_2000 = 'urn:ogc:def:crs:EPSG::2117';

    /**
     * NZGD2000 / Campbell Island TM 2000
     * Extent: New Zealand - Campbell Island.
     */
    public const EPSG_NZGD2000_CAMPBELL_ISLAND_TM_2000 = 'urn:ogc:def:crs:EPSG::3789';

    /**
     * NZGD2000 / Chatham Islands TM 2000
     * Extent: New Zealand - Chatham Islands group - onshore
     * Replaces CI1979 / Chatham Islands Map Grid (CRS code 5519) and NZGD2000 / Chatham Islands Circuit 2000 (CRS code
     * 3764).
     */
    public const EPSG_NZGD2000_CHATHAM_ISLANDS_TM_2000 = 'urn:ogc:def:crs:EPSG::3793';

    /**
     * NZGD2000 / Chatham Island Circuit 2000
     * Extent: New Zealand - Chatham Islands group - onshore
     * Officially withdrawn on 6 June 2006. Should not be used for new datasets. Replaced by NZGD2000 / Chatham Island
     * TM 2000 (CRS code 3793).
     */
    public const EPSG_NZGD2000_CHATHAM_ISLAND_CIRCUIT_2000 = 'urn:ogc:def:crs:EPSG::3764';

    /**
     * NZGD2000 / Collingwood 2000
     * Extent: New Zealand - South Island - Collingwood meridional circuit area
     * Replaced NZGD49 / Collingwood Circuit (code 27214) from March 2000.
     */
    public const EPSG_NZGD2000_COLLINGWOOD_2000 = 'urn:ogc:def:crs:EPSG::2114';

    /**
     * NZGD2000 / Gawler 2000
     * Extent: New Zealand - South Island - Gawler meridional circuit area
     * Replaced NZGD49 / Gawler Circuit (code 27225) from March 2000.
     */
    public const EPSG_NZGD2000_GAWLER_2000 = 'urn:ogc:def:crs:EPSG::2125';

    /**
     * NZGD2000 / Grey 2000
     * Extent: New Zealand - South Island - Grey meridional circuit area
     * Replaced NZGD49 / Grey Circuit (code 27218) from March 2000.
     */
    public const EPSG_NZGD2000_GREY_2000 = 'urn:ogc:def:crs:EPSG::2118';

    /**
     * NZGD2000 / Hawkes Bay 2000
     * Extent: New Zealand - North Island - Hawkes Bay meridional circuit and Napier vertical crs area
     * Replaced NZGD49 / Hawkes Bay Circuit (code 27208) from March 2000.
     */
    public const EPSG_NZGD2000_HAWKES_BAY_2000 = 'urn:ogc:def:crs:EPSG::2108';

    /**
     * NZGD2000 / Hokitika 2000
     * Extent: New Zealand - South Island - Hokitika meridional circuit area
     * Replaced NZGD49 / Hokitika Circuit (code 27221) from March 2000.
     */
    public const EPSG_NZGD2000_HOKITIKA_2000 = 'urn:ogc:def:crs:EPSG::2121';

    /**
     * NZGD2000 / Jacksons Bay 2000
     * Extent: New Zealand - South Island - Jacksons Bay meridional circuit area
     * Replaced NZGD49 / Jacksons Bay Circuit (code 27223) from March 2000.
     */
    public const EPSG_NZGD2000_JACKSONS_BAY_2000 = 'urn:ogc:def:crs:EPSG::2123';

    /**
     * NZGD2000 / Karamea 2000
     * Extent: New Zealand - South Island - Karamea meridional circuit area
     * Replaced NZGD49 / Karamea Circuit (code 27216) from March 2000.
     */
    public const EPSG_NZGD2000_KARAMEA_2000 = 'urn:ogc:def:crs:EPSG::2116';

    /**
     * NZGD2000 / Lindis Peak 2000
     * Extent: New Zealand - South Island - Lindis Peak meridional circuit area
     * Replaced NZGD49 / Lindis Peak Circuit (code 27227) from March 2000.
     */
    public const EPSG_NZGD2000_LINDIS_PEAK_2000 = 'urn:ogc:def:crs:EPSG::2127';

    /**
     * NZGD2000 / Marlborough 2000
     * Extent: New Zealand - South Island - Marlborough meridional circuit area
     * Replaced NZGD49 / Marlborough Circuit (code 27220) from March 2000.
     */
    public const EPSG_NZGD2000_MARLBOROUGH_2000 = 'urn:ogc:def:crs:EPSG::2120';

    /**
     * NZGD2000 / Mount Eden 2000
     * Extent: New Zealand - North Island - Mount Eden meridional circuit area
     * Replaced NZGD49 / Mount Eden Circuit (code 27205) from March 2000.
     */
    public const EPSG_NZGD2000_MOUNT_EDEN_2000 = 'urn:ogc:def:crs:EPSG::2105';

    /**
     * NZGD2000 / Mount Nicholas 2000
     * Extent: New Zealand - South Island - Mount Nicholas meridional circuit area
     * Replaced NZGD49 / Mount Nicholas Circuit (code 27228) from March 2000.
     */
    public const EPSG_NZGD2000_MOUNT_NICHOLAS_2000 = 'urn:ogc:def:crs:EPSG::2128';

    /**
     * NZGD2000 / Mount Pleasant 2000
     * Extent: New Zealand - South Island - Mount Pleasant meridional circuit area
     * Replaced NZGD49 / Mount Pleasant Circuit (code 27224) from March 2000.
     */
    public const EPSG_NZGD2000_MOUNT_PLEASANT_2000 = 'urn:ogc:def:crs:EPSG::2124';

    /**
     * NZGD2000 / Mount York 2000
     * Extent: New Zealand - South Island - Mount York meridional circuit area
     * Replaced NZGD49 / Mount York Circuit (code 27229) from March 2000.
     */
    public const EPSG_NZGD2000_MOUNT_YORK_2000 = 'urn:ogc:def:crs:EPSG::2129';

    /**
     * NZGD2000 / Nelson 2000
     * Extent: New Zealand - South Island - Nelson meridional circuit area
     * Replaced NZGD49 / Nelson Circuit (code 27215) from March 2000.
     */
    public const EPSG_NZGD2000_NELSON_2000 = 'urn:ogc:def:crs:EPSG::2115';

    /**
     * NZGD2000 / New Zealand Transverse Mercator 2000
     * Extent: New Zealand - North Island, South Island, Stewart Island - onshore
     * Replaces NZGD49 / New Zealand Map Grid (code 27200) from July 2001.
     */
    public const EPSG_NZGD2000_NEW_ZEALAND_TRANSVERSE_MERCATOR_2000 = 'urn:ogc:def:crs:EPSG::2193';

    /**
     * NZGD2000 / North Taieri 2000
     * Extent: New Zealand - South Island - North Taieri meridional circuit area
     * Replaced NZGD49 / North Taieri Circuit (code 27231) from March 2000.
     */
    public const EPSG_NZGD2000_NORTH_TAIERI_2000 = 'urn:ogc:def:crs:EPSG::2131';

    /**
     * NZGD2000 / NZCS2000
     * Extent: New Zealand - offshore
     * See WGS 84 / NIWA Albers (CRS code 9191) for oceanic data statistical analysis.
     */
    public const EPSG_NZGD2000_NZCS2000 = 'urn:ogc:def:crs:EPSG::3851';

    /**
     * NZGD2000 / Observation Point 2000
     * Extent: New Zealand - South Island - Observation Point meridional circuit area
     * Replaced NZGD49 / Observation Point Circuit (code 27230) from March 2000.
     */
    public const EPSG_NZGD2000_OBSERVATION_POINT_2000 = 'urn:ogc:def:crs:EPSG::2130';

    /**
     * NZGD2000 / Okarito 2000
     * Extent: New Zealand - South Island - Okarito meridional circuit area
     * Replaced NZGD49 / Okarito Circuit (code 27222) from March 2000.
     */
    public const EPSG_NZGD2000_OKARITO_2000 = 'urn:ogc:def:crs:EPSG::2122';

    /**
     * NZGD2000 / Poverty Bay 2000
     * Extent: New Zealand - North Island - Poverty Bay meridional circuit area
     * Replaced NZGD49 / Poverty Bay Circuit (code 27207) from March 2000.
     */
    public const EPSG_NZGD2000_POVERTY_BAY_2000 = 'urn:ogc:def:crs:EPSG::2107';

    /**
     * NZGD2000 / Raoul Island TM 2000
     * Extent: New Zealand - Raoul Island, Kermadec Islands.
     */
    public const EPSG_NZGD2000_RAOUL_ISLAND_TM_2000 = 'urn:ogc:def:crs:EPSG::3791';

    /**
     * NZGD2000 / Taranaki 2000
     * Extent: New Zealand - North Island - Taranaki meridional circuit area
     * Replaced NZGD49 / Taranaki Circuit (code 27209) from March 2000.
     */
    public const EPSG_NZGD2000_TARANAKI_2000 = 'urn:ogc:def:crs:EPSG::2109';

    /**
     * NZGD2000 / Timaru 2000
     * Extent: New Zealand - South Island - Timaru meridional circuit area
     * Replaced NZGD49 / Timaru Circuit (code 27226) from March 2000.
     */
    public const EPSG_NZGD2000_TIMARU_2000 = 'urn:ogc:def:crs:EPSG::2126';

    /**
     * NZGD2000 / Tuhirangi 2000
     * Extent: New Zealand - North Island - Tuhirangi meridional circuit area
     * Replaced NZGD49 / Tuhirangi Circuit (code 27210) from March 2000.
     */
    public const EPSG_NZGD2000_TUHIRANGI_2000 = 'urn:ogc:def:crs:EPSG::2110';

    /**
     * NZGD2000 / UTM zone 1S
     * Extent: New Zealand - offshore between 180°W and 174°W.
     */
    public const EPSG_NZGD2000_UTM_ZONE_1S = 'urn:ogc:def:crs:EPSG::5700';

    /**
     * NZGD2000 / UTM zone 58S
     * Extent: New Zealand - offshore between 162°E and 168°E
     * Replaces NZGD49 / UTM zone 58S (code 27258) from March 2000.
     */
    public const EPSG_NZGD2000_UTM_ZONE_58S = 'urn:ogc:def:crs:EPSG::2133';

    /**
     * NZGD2000 / UTM zone 59S
     * Extent: New Zealand - offshore between 168°E and 174°E
     * Replaces NZGD49 / UTM zone 59S (code 27259) from March 2000.
     */
    public const EPSG_NZGD2000_UTM_ZONE_59S = 'urn:ogc:def:crs:EPSG::2134';

    /**
     * NZGD2000 / UTM zone 60S
     * Extent: New Zealand - offshore between 174°E and 180°E
     * Replaces NZGD49 / UTM zone 60S (code 27260) from March 2000.
     */
    public const EPSG_NZGD2000_UTM_ZONE_60S = 'urn:ogc:def:crs:EPSG::2135';

    /**
     * NZGD2000 / Wairarapa 2000
     * Extent: New Zealand - North Island - Wairarapa meridional circuit area
     * Replaced NZGD49 / Wairarapa Circuit (code 27212) from March 2000.
     */
    public const EPSG_NZGD2000_WAIRARAPA_2000 = 'urn:ogc:def:crs:EPSG::2112';

    /**
     * NZGD2000 / Wanganui 2000
     * Extent: New Zealand - North Island - Wanganui meridional circuit area
     * Replaced NZGD49 / Wanganui Circuit (code 27211) from March 2000.
     */
    public const EPSG_NZGD2000_WANGANUI_2000 = 'urn:ogc:def:crs:EPSG::2111';

    /**
     * NZGD2000 / Wellington 2000
     * Extent: New Zealand - North Island - Wellington meridional circuit area
     * Replaced NZGD49 / Wellington Circuit (code 27213) from March 2000.
     */
    public const EPSG_NZGD2000_WELLINGTON_2000 = 'urn:ogc:def:crs:EPSG::2113';

    /**
     * NZGD49 / Amuri Circuit
     * Extent: New Zealand - South Island - Amuri meridional circuit area
     * Replaced Imperial measure version in 1972. Replaced by NZGD2000 / Amuri 2000 (code 2119) from March 2000.
     */
    public const EPSG_NZGD49_AMURI_CIRCUIT = 'urn:ogc:def:crs:EPSG::27219';

    /**
     * NZGD49 / Bay of Plenty Circuit
     * Extent: New Zealand - North Island - Bay of Plenty meridional circuit area
     * Replaced Imperial measure version in 1972. Replaced by NZGD2000 / Bay of Plenty 2000 (code 2106) from March
     * 2000.
     */
    public const EPSG_NZGD49_BAY_OF_PLENTY_CIRCUIT = 'urn:ogc:def:crs:EPSG::27206';

    /**
     * NZGD49 / Bluff Circuit
     * Extent: New Zealand - Stewart Island; South Island - Bluff meridional circuit area
     * Replaced Imperial measure version in 1972. Replaced by NZGD2000 / Bluff 2000 (code 2132) from March 2000.
     */
    public const EPSG_NZGD49_BLUFF_CIRCUIT = 'urn:ogc:def:crs:EPSG::27232';

    /**
     * NZGD49 / Buller Circuit
     * Extent: New Zealand - South Island - Buller meridional circuit area
     * Replaced Imperial measure version in 1972. Replaced by NZGD2000 / Buller 2000 (code 2117) from March 2000.
     */
    public const EPSG_NZGD49_BULLER_CIRCUIT = 'urn:ogc:def:crs:EPSG::27217';

    /**
     * NZGD49 / Collingwood Circuit
     * Extent: New Zealand - South Island - Collingwood meridional circuit area
     * Replaced Imperial measure version in 1972. Replaced by NZGD2000 / Collingwood 2000 (code 2114) from March 2000.
     */
    public const EPSG_NZGD49_COLLINGWOOD_CIRCUIT = 'urn:ogc:def:crs:EPSG::27214';

    /**
     * NZGD49 / Gawler Circuit
     * Extent: New Zealand - South Island - Gawler meridional circuit area
     * Replaced Imperial measure version in 1972. Replaced by NZGD2000 / Gawler 2000 (code 2125) from March 2000.
     */
    public const EPSG_NZGD49_GAWLER_CIRCUIT = 'urn:ogc:def:crs:EPSG::27225';

    /**
     * NZGD49 / Grey Circuit
     * Extent: New Zealand - South Island - Grey meridional circuit area
     * Replaced Imperial measure version in 1972. Replaced by NZGD2000 / Grey 2000 (code 2118) from March 2000.
     */
    public const EPSG_NZGD49_GREY_CIRCUIT = 'urn:ogc:def:crs:EPSG::27218';

    /**
     * NZGD49 / Hawkes Bay Circuit
     * Extent: New Zealand - North Island - Hawkes Bay meridional circuit and Napier vertical crs area
     * Replaced Hawkes Bay 1931 datum with Imperial measure version of projection in 1972. Replaced by NZGD2000 /
     * Hawkes Bay 2000 (code 2108) from March 2000.
     */
    public const EPSG_NZGD49_HAWKES_BAY_CIRCUIT = 'urn:ogc:def:crs:EPSG::27208';

    /**
     * NZGD49 / Hokitika Circuit
     * Extent: New Zealand - South Island - Hokitika meridional circuit area
     * Replaced Imperial measure version in 1972. Replaced by NZGD2000 / Hokitika 2000 (code 2121) from March 2000.
     */
    public const EPSG_NZGD49_HOKITIKA_CIRCUIT = 'urn:ogc:def:crs:EPSG::27221';

    /**
     * NZGD49 / Jacksons Bay Circuit
     * Extent: New Zealand - South Island - Jacksons Bay meridional circuit area
     * Replaced Imperial measure version in 1972. Replaced by NZGD2000 / Jacksons Bay 2000 (code 2123) from March 2000.
     */
    public const EPSG_NZGD49_JACKSONS_BAY_CIRCUIT = 'urn:ogc:def:crs:EPSG::27223';

    /**
     * NZGD49 / Karamea Circuit
     * Extent: New Zealand - South Island - Karamea meridional circuit area
     * Replaced Imperial measure version in 1972. Replaced by NZGD2000 / Karamea 2000 (code 2116) from March 2000.
     */
    public const EPSG_NZGD49_KARAMEA_CIRCUIT = 'urn:ogc:def:crs:EPSG::27216';

    /**
     * NZGD49 / Lindis Peak Circuit
     * Extent: New Zealand - South Island - Lindis Peak meridional circuit area
     * Replaced Imperial measure version in 1972. Replaced by NZGD2000 / Lindis Peak 2000 (code 2127) from March 2000.
     */
    public const EPSG_NZGD49_LINDIS_PEAK_CIRCUIT = 'urn:ogc:def:crs:EPSG::27227';

    /**
     * NZGD49 / Marlborough Circuit
     * Extent: New Zealand - South Island - Marlborough meridional circuit area
     * Replaced Imperial measure version in 1972. Replaced by NZGD2000 / Marlborough 2000 (code 2120) from March 2000.
     */
    public const EPSG_NZGD49_MARLBOROUGH_CIRCUIT = 'urn:ogc:def:crs:EPSG::27220';

    /**
     * NZGD49 / Mount Eden Circuit
     * Extent: New Zealand - North Island - Mount Eden meridional circuit area
     * Replaced Imperial measure version in 1972. Replaced by NZGD2000 / Mount Eden 2000 (code 2105) from March 2000.
     */
    public const EPSG_NZGD49_MOUNT_EDEN_CIRCUIT = 'urn:ogc:def:crs:EPSG::27205';

    /**
     * NZGD49 / Mount Nicholas Circuit
     * Extent: New Zealand - South Island - Mount Nicholas meridional circuit area
     * Replaced Imperial measure version in 1972. Replaced by NZGD2000 / Mount Nicholas 2000 (code 2128) from March
     * 2000.
     */
    public const EPSG_NZGD49_MOUNT_NICHOLAS_CIRCUIT = 'urn:ogc:def:crs:EPSG::27228';

    /**
     * NZGD49 / Mount Pleasant Circuit
     * Extent: New Zealand - South Island - Mount Pleasant meridional circuit area
     * Replaced Imperial measure version in 1972. Replaced by NZGD2000 / Mount Pleasant 2000 (code 2124) from March
     * 2000.
     */
    public const EPSG_NZGD49_MOUNT_PLEASANT_CIRCUIT = 'urn:ogc:def:crs:EPSG::27224';

    /**
     * NZGD49 / Mount York Circuit
     * Extent: New Zealand - South Island - Mount York meridional circuit area
     * Replaced Imperial measure version in 1972. Replaced by NZGD2000 / Mount York 2000 (code 2129) from March 2000.
     */
    public const EPSG_NZGD49_MOUNT_YORK_CIRCUIT = 'urn:ogc:def:crs:EPSG::27229';

    /**
     * NZGD49 / Nelson Circuit
     * Extent: New Zealand - South Island - Nelson meridional circuit area
     * Replaced Imperial measure version in 1972. Replaced by NZGD2000 / Nelson 2000 (code 2115) from March 2000.
     */
    public const EPSG_NZGD49_NELSON_CIRCUIT = 'urn:ogc:def:crs:EPSG::27215';

    /**
     * NZGD49 / New Zealand Map Grid
     * Extent: New Zealand - North Island, South Island, Stewart Island - onshore
     * Replaces 27291 (NZGD49 / North Island Grid) and 27292 (NZGD49 / South Island Grid) from 1972. Replaced by
     * NZGD2000 / New Zealand Transverse Mercator 2000 from July 2001.
     */
    public const EPSG_NZGD49_NEW_ZEALAND_MAP_GRID = 'urn:ogc:def:crs:EPSG::27200';

    /**
     * NZGD49 / North Island Grid
     * Extent: New Zealand - North Island
     * Sears 1922 British foot-metre conversion factor applied to ellipsoid. Replaced by 27200 (GD49 / New Zealand Map
     * Grid) in 1972.
     */
    public const EPSG_NZGD49_NORTH_ISLAND_GRID = 'urn:ogc:def:crs:EPSG::27291';

    /**
     * NZGD49 / North Taieri Circuit
     * Extent: New Zealand - South Island - North Taieri meridional circuit area
     * Replaced Imperial measure version in 1972. Replaced by NZGD2000 / North Taieri 2000 (code 2131) from March 2000.
     */
    public const EPSG_NZGD49_NORTH_TAIERI_CIRCUIT = 'urn:ogc:def:crs:EPSG::27231';

    /**
     * NZGD49 / Observation Point Circuit
     * Extent: New Zealand - South Island - Observation Point meridional circuit area
     * Replaced Imperial measure version in 1972. Replaced by NZGD2000 / Observation Point 2000 (code 2130) from March
     * 2000.
     */
    public const EPSG_NZGD49_OBSERVATION_POINT_CIRCUIT = 'urn:ogc:def:crs:EPSG::27230';

    /**
     * NZGD49 / Okarito Circuit
     * Extent: New Zealand - South Island - Okarito meridional circuit area
     * Replaced Imperial measure version in 1972. Replaced by NZGD2000 / Okarito 2000 (code 2122) from March 2000.
     */
    public const EPSG_NZGD49_OKARITO_CIRCUIT = 'urn:ogc:def:crs:EPSG::27222';

    /**
     * NZGD49 / Poverty Bay Circuit
     * Extent: New Zealand - North Island - Poverty Bay meridional circuit area
     * Replaced Imperial measure version in 1972. Replaced by NZGD2000 / Poverty Bay 2000 (code 2107) from March 2000.
     */
    public const EPSG_NZGD49_POVERTY_BAY_CIRCUIT = 'urn:ogc:def:crs:EPSG::27207';

    /**
     * NZGD49 / South Island Grid
     * Extent: New Zealand - South Island, Stewart Island
     * Sears 1922 British foot-metre conversion factor applied to ellipsoid. Replaced by 27200 (GD49 / New Zealand Map
     * Grid) in 1972.
     */
    public const EPSG_NZGD49_SOUTH_ISLAND_GRID = 'urn:ogc:def:crs:EPSG::27292';

    /**
     * NZGD49 / Taranaki Circuit
     * Extent: New Zealand - North Island - Taranaki meridional circuit area
     * Replaced Imperial measure version in 1972. Replaced by NZGD2000 / Taranaki 2000 (code 2109) from March 2000.
     */
    public const EPSG_NZGD49_TARANAKI_CIRCUIT = 'urn:ogc:def:crs:EPSG::27209';

    /**
     * NZGD49 / Timaru Circuit
     * Extent: New Zealand - South Island - Timaru meridional circuit area
     * Replaced Imperial measure version in 1972. Replaced by NZGD2000 / Timaru 2000 (code 2126) from March 2000.
     */
    public const EPSG_NZGD49_TIMARU_CIRCUIT = 'urn:ogc:def:crs:EPSG::27226';

    /**
     * NZGD49 / Tuhirangi Circuit
     * Extent: New Zealand - North Island - Tuhirangi meridional circuit area
     * Replaced Imperial measure version in 1972. Replaced by NZGD2000 / Tuhirangi 2000 (code 2110) from March 2000.
     */
    public const EPSG_NZGD49_TUHIRANGI_CIRCUIT = 'urn:ogc:def:crs:EPSG::27210';

    /**
     * NZGD49 / UTM zone 58S
     * Extent: New Zealand - nearshore west of 168°E
     * Replaced by NZGD2000 / UTM zone 58S (code 2133) from March 2000.
     */
    public const EPSG_NZGD49_UTM_ZONE_58S = 'urn:ogc:def:crs:EPSG::27258';

    /**
     * NZGD49 / UTM zone 59S
     * Extent: New Zealand - nearshore between 168°E and 174°E
     * Replaced by NZGD2000 / UTM zone 59S (code 2134) from March 2000.
     */
    public const EPSG_NZGD49_UTM_ZONE_59S = 'urn:ogc:def:crs:EPSG::27259';

    /**
     * NZGD49 / UTM zone 60S
     * Extent: New Zealand - nearshore east of 174°E
     * Replaced by NZGD2000 / UTM zone 60S (code 2135) from March 2000.
     */
    public const EPSG_NZGD49_UTM_ZONE_60S = 'urn:ogc:def:crs:EPSG::27260';

    /**
     * NZGD49 / Wairarapa Circuit
     * Extent: New Zealand - North Island - Wairarapa meridional circuit area
     * Replaced Imperial measure version in 1972. Replaced by NZGD2000 / Wairarapa 2000 (code 2112) from March 2000.
     */
    public const EPSG_NZGD49_WAIRARAPA_CIRCUIT = 'urn:ogc:def:crs:EPSG::27212';

    /**
     * NZGD49 / Wanganui Circuit
     * Extent: New Zealand - North Island - Wanganui meridional circuit area
     * Replaced Imperial measure version in 1972. Replaced by NZGD2000 / Wanganui 2000 (code 2111) from March 2000.
     */
    public const EPSG_NZGD49_WANGANUI_CIRCUIT = 'urn:ogc:def:crs:EPSG::27211';

    /**
     * NZGD49 / Wellington Circuit
     * Extent: New Zealand - North Island - Wellington meridional circuit area
     * Replaced Imperial measure version in 1972. Replaced by NZGD2000 / Wellington 2000 (code 2113) from March 2000.
     */
    public const EPSG_NZGD49_WELLINGTON_CIRCUIT = 'urn:ogc:def:crs:EPSG::27213';

    /**
     * Ocotepeque 1935 / Costa Rica Norte
     * Extent: Costa Rica - onshore north of 9°32'N
     * Replaced by Costa Rica 2005 / CTM05 from March 2007.
     */
    public const EPSG_OCOTEPEQUE_1935_COSTA_RICA_NORTE = 'urn:ogc:def:crs:EPSG::5456';

    /**
     * Ocotepeque 1935 / Costa Rica Sur
     * Extent: Costa Rica - onshore south of 9°56'N
     * Replaced by Costa Rica 2005 / CTM05 from March 2007.
     */
    public const EPSG_OCOTEPEQUE_1935_COSTA_RICA_SUR = 'urn:ogc:def:crs:EPSG::5457';

    /**
     * Ocotepeque 1935 / El Salvador Lambert
     * Extent: El Salvador - onshore
     * Replaced in El Salvador by SIRGAS_ES2007 from August 2007.
     */
    public const EPSG_OCOTEPEQUE_1935_EL_SALVADOR_LAMBERT = 'urn:ogc:def:crs:EPSG::5460';

    /**
     * Ocotepeque 1935 / Guatemala Norte
     * Extent: Guatemala - north of 15°51'30"N.
     */
    public const EPSG_OCOTEPEQUE_1935_GUATEMALA_NORTE = 'urn:ogc:def:crs:EPSG::5559';

    /**
     * Ocotepeque 1935 / Guatemala Sur
     * Extent: Guatemala - south of 15°51'30"N.
     */
    public const EPSG_OCOTEPEQUE_1935_GUATEMALA_SUR = 'urn:ogc:def:crs:EPSG::5459';

    /**
     * Ocotepeque 1935 / Nicaragua Norte
     * Extent: Nicaragua - onshore north of 12°48'N.
     */
    public const EPSG_OCOTEPEQUE_1935_NICARAGUA_NORTE = 'urn:ogc:def:crs:EPSG::5461';

    /**
     * Ocotepeque 1935 / Nicaragua Sur
     * Extent: Nicaragua - onshore south of 12°48'N.
     */
    public const EPSG_OCOTEPEQUE_1935_NICARAGUA_SUR = 'urn:ogc:def:crs:EPSG::5462';

    /**
     * Old Hawaiian / Hawaii zone 1
     * Extent: USA - Hawaii - island of Hawaii - onshore
     * Sometimes erroneously referred to as NAD27 / Hawaii zone 1.
     */
    public const EPSG_OLD_HAWAIIAN_HAWAII_ZONE_1 = 'urn:ogc:def:crs:EPSG::3561';

    /**
     * Old Hawaiian / Hawaii zone 2
     * Extent: USA - Hawaii - Maui; Kahoolawe; Lanai; Molokai - onshore
     * Sometimes erroneously referred to as NAD27 / Hawaii zone 2.
     */
    public const EPSG_OLD_HAWAIIAN_HAWAII_ZONE_2 = 'urn:ogc:def:crs:EPSG::3562';

    /**
     * Old Hawaiian / Hawaii zone 3
     * Extent: USA - Hawaii - Oahu - onshore
     * Sometimes erroneously referred to as NAD27 / Hawaii zone 3.
     */
    public const EPSG_OLD_HAWAIIAN_HAWAII_ZONE_3 = 'urn:ogc:def:crs:EPSG::3563';

    /**
     * Old Hawaiian / Hawaii zone 4
     * Extent: USA - Hawaii - Kauai - onshore
     * Sometimes erroneously referred to as NAD27 / Hawaii zone 4.
     */
    public const EPSG_OLD_HAWAIIAN_HAWAII_ZONE_4 = 'urn:ogc:def:crs:EPSG::3564';

    /**
     * Old Hawaiian / Hawaii zone 5
     * Extent: USA - Hawaii - Niihau - onshore
     * Sometimes erroneously referred to as NAD27 / Hawaii zone 5.
     */
    public const EPSG_OLD_HAWAIIAN_HAWAII_ZONE_5 = 'urn:ogc:def:crs:EPSG::3565';

    /**
     * ONGD14 / UTM zone 39N
     * Extent: Oman west of 54°E
     * In Oman replaced usage of WGS 84 / UTM zone 39N projCRS (code 32639) in 2014. Replaced by ONGD17 / UTM zone 39N
     * (code 9295) in 2019.
     */
    public const EPSG_ONGD14_UTM_ZONE_39N = 'urn:ogc:def:crs:EPSG::7374';

    /**
     * ONGD14 / UTM zone 40N
     * Extent: Oman between 54°E and 60°E
     * In Oman replaced usage of WGS 84 / UTM zone 40N projCRS (code 32640) in 2014. Replaced by ONGD17 / UTM zone 40N
     * (code 9296) in 2019.
     */
    public const EPSG_ONGD14_UTM_ZONE_40N = 'urn:ogc:def:crs:EPSG::7375';

    /**
     * ONGD14 / UTM zone 41N
     * Extent: Oman - offshore east of 60°E
     * Replaced by ONGD17 / UTM zone 41N (code 9296) in 2019.
     */
    public const EPSG_ONGD14_UTM_ZONE_41N = 'urn:ogc:def:crs:EPSG::7376';

    /**
     * ONGD17 / UTM zone 39N
     * Extent: Oman west of 54°E
     * Replaces ONGD14 / UTM zone 39N projCRS (code 7374) from March 2019.
     */
    public const EPSG_ONGD17_UTM_ZONE_39N = 'urn:ogc:def:crs:EPSG::9295';

    /**
     * ONGD17 / UTM zone 40N
     * Extent: Oman between 54°E and 60°E
     * Replaced ONGD14 / UTM zone 40N projCRS (code 7375) from March 2019.
     */
    public const EPSG_ONGD17_UTM_ZONE_40N = 'urn:ogc:def:crs:EPSG::9296';

    /**
     * ONGD17 / UTM zone 41N
     * Extent: Oman - offshore east of 60°E
     * Replaced ONGD14 / UTM zone 41N projCRS (code 7376) from March 2019.
     */
    public const EPSG_ONGD17_UTM_ZONE_41N = 'urn:ogc:def:crs:EPSG::9297';

    /**
     * OSGB36 / British National Grid
     * Extent: UK - offshore to boundary of UKCS within 49°45'N to 61°N and 9°W to 2°E; onshore Great Britain
     * (England, Wales and Scotland). Isle of Man onshore.
     */
    public const EPSG_OSGB36_BRITISH_NATIONAL_GRID = 'urn:ogc:def:crs:EPSG::27700';

    /**
     * OSGB36 / Heathrow Airport GIS Grid 2026
     * Extent: UK - Heathrow airport and surrounding area
     * Heathrow Airport GIS Grid 2026 approximates Heathrow Airport Grid (HAG) (CRS code 11378) to an accuracy of
     * better than 12mm within airport area and 89 mm across full area of use (2D RMS 0.007 and 0.039 m respectively
     * derived through comparison of coordinates at 100m spacing throughout the airport area). Created for use in GIS
     * applications that do not support the true HAG definition through engineering CRS (code 11378) and similarity
     * transformation to British National Grid (code 11388). Accuracy of approximation deteriorates beyond airport
     * extent - do not use this CRS beyond that area.
     */
    public const EPSG_OSGB36_HEATHROW_AIRPORT_GIS_GRID_2026 = 'urn:ogc:def:crs:EPSG::11390';

    /**
     * OSNI 1952 / Irish National Grid
     * Extent: UK - Northern Ireland (Ulster) - onshore
     * Not used in Republic of Ireland. Replaced in 1975 by TM75 / Irish Grid (CRS code 29903).
     */
    public const EPSG_OSNI_1952_IRISH_NATIONAL_GRID = 'urn:ogc:def:crs:EPSG::29901';

    /**
     * Ostenfeld reconstruction
     * Extent: Denmark - onshore northern Schleswig and surrounding islands (i.e. Jutland south of the pre-1920 border
     * near the Kongea river)
     * A reconstruction in modern terms of the Prussian system Ostenfeld, as it was realized in the post-1920 Danish
     * areas. Defined through transformation ETRS89 to Ostenfeld-IRF (1) (code 10271) together with projection
     * Ostenfeld-reconstruction (code 10269).
     */
    public const EPSG_OSTENFELD_RECONSTRUCTION = 'urn:ogc:def:crs:EPSG::10270';

    /**
     * OxWo08 Grid
     * Extent: UK - on or related to the rail route from Oxford to Worcester
     * Defined through transformation ETRS89-GBR [OSNet v2009] to OxWo08-IRF (1) (code 10230) and map projection
     * OxWo08-TM (code 10234). Emulates the OxWo08 Snake projection applied to ETRS89 as realized through OSNet v2009.
     */
    public const EPSG_OXWO08_GRID = 'urn:ogc:def:crs:EPSG::10235';

    /**
     * Palestine 1923 / Israeli CS Grid
     * Extent: Israel - onshore; Palestine onshore
     * See projection remarks. Replaced by Israeli TM Grid (EPSG code 2039).
     */
    public const EPSG_PALESTINE_1923_ISRAELI_CS_GRID = 'urn:ogc:def:crs:EPSG::28193';

    /**
     * Palestine 1923 / Palestine Belt
     * Extent: Israel - onshore; Jordan; Palestine - onshore
     * See projection remarks. Also found without 1 million added to FN: see CRS code 7142.
     */
    public const EPSG_PALESTINE_1923_PALESTINE_BELT = 'urn:ogc:def:crs:EPSG::28192';

    /**
     * Palestine 1923 / Palestine Grid
     * Extent: Israel - onshore; Jordan; Palestine - onshore
     * Replaced by CRS 28192 (AMS use) and 28193 (in Israel).
     */
    public const EPSG_PALESTINE_1923_PALESTINE_GRID = 'urn:ogc:def:crs:EPSG::28191';

    /**
     * Palestine 1923 / Palestine Grid modified
     * Extent: Israel - onshore; Jordan; Palestine - onshore
     * See projection remarks. Also found with 1 million added to FN: see CRS code 28192.
     */
    public const EPSG_PALESTINE_1923_PALESTINE_GRID_MODIFIED = 'urn:ogc:def:crs:EPSG::7142';

    /**
     * Pampa del Castillo / Argentina 1
     * Extent: Argentina - Chibut province west of 70°30'W and south of approximately 44°55'S and Santa Cruz province
     * west of 70°30'W and north of approximately 50°20'S
     * Replaced by Campo Inchauspe / Argentina 1 (CRS code 22191) for topographic mapping, but use continues for oil
     * exploration and production in Golfo San Jorge basin (44°S to 47.5°S).
     */
    public const EPSG_PAMPA_DEL_CASTILLO_ARGENTINA_1 = 'urn:ogc:def:crs:EPSG::9284';

    /**
     * Pampa del Castillo / Argentina 2
     * Extent: Argentina - Chibut province between 70°30'W and 67°30'W and south of approximately 42°30'S and Santa
     * Cruz province between 70°30'W and 67°30'W and north of approximately 50°20'S
     * Replaced by Campo Inchauspe / Argentina 2 (CRS code 22192) for topographic mapping, but use continues for oil
     * exploration and production in Golfo San Jorge basin (44°S to 47.5°S).
     */
    public const EPSG_PAMPA_DEL_CASTILLO_ARGENTINA_2 = 'urn:ogc:def:crs:EPSG::2082';

    /**
     * Pampa del Castillo / Argentina 3
     * Extent: Argentina - Chibut province east of 67°30'W and south of approximately 43°35'S, Santa Cruz province
     * east of 67°30'W and north of approximately 49°23'S, and offshore Golfo san Jorge
     * Replaced by Campo Inchauspe / Argentina 3 (CRS code 22193) for topographic mapping, but use continues for oil
     * exploration and production in Golfo San Jorge basin (44°S to 47.5°S).
     */
    public const EPSG_PAMPA_DEL_CASTILLO_ARGENTINA_3 = 'urn:ogc:def:crs:EPSG::9285';

    /**
     * Panama-Colon 1911 / Panama Lambert
     * Extent: Panama - onshore
     * Replaces Panama-Colon / Panama Polyconic from 1940s.
     */
    public const EPSG_PANAMA_COLON_1911_PANAMA_LAMBERT = 'urn:ogc:def:crs:EPSG::5469';

    /**
     * Panama-Colon 1911 / Panama Polyconic
     * Extent: Panama - onshore
     * Replaced by Panama-Colon / Panama Lambert from 1940s.
     */
    public const EPSG_PANAMA_COLON_1911_PANAMA_POLYCONIC = 'urn:ogc:def:crs:EPSG::5472';

    /**
     * PATRF2022e2020 / American Samoa
     * Extent: American Samoa - Tutuila, Aunu'u, Ofu, Olesega and Ta'u islands
     * See code 24300 for equivalent CRS in (international) feet.
     */
    public const EPSG_PATRF2022E2020_AMERICAN_SAMOA = 'urn:ogc:def:crs:EPSG::24299';

    /**
     * PATRF2022e2020 / American Samoa (ft)
     * Extent: American Samoa - Tutuila, Aunu'u, Ofu, Olesega and Ta'u islands
     * See code 24299 for equivalent CRS in meters.
     */
    public const EPSG_PATRF2022E2020_AMERICAN_SAMOA_FT = 'urn:ogc:def:crs:EPSG::24300';

    /**
     * PATRF2022e2020 / Hawaii
     * Extent: USA - Hawaii - main islands onshore
     * See code 22094 for equivalent CRS in (international) feet.
     */
    public const EPSG_PATRF2022E2020_HAWAII = 'urn:ogc:def:crs:EPSG::22093';

    /**
     * PATRF2022e2020 / Hawaii (ft)
     * Extent: USA - Hawaii - main islands onshore
     * See code 22093 for equivalent CRS in meters.
     */
    public const EPSG_PATRF2022E2020_HAWAII_FT = 'urn:ogc:def:crs:EPSG::22094';

    /**
     * PD/83 / 3-degree Gauss-Kruger zone 3
     * Extent: Germany - Thuringen - west of 10°30'E
     * Consistent with DHDN (CRS code 4314) at the 1-metre level. For low accuracy applications PD/83 can be considered
     * the same as DHDN. See CRS code 5666 for variant with axes order reversed to easting before northing for use in
     * GIS applications.
     */
    public const EPSG_PD_83_3_DEGREE_GAUSS_KRUGER_ZONE_3 = 'urn:ogc:def:crs:EPSG::3396';

    /**
     * PD/83 / 3-degree Gauss-Kruger zone 3 (E-N)
     * Extent: Germany - Thuringen - west of 10°30'E
     * PD/83 / 3-degree Gauss-Kruger zone 3 (CRS code 3396) but with axis order reversed (and axis abbreviations
     * changed) for GIS applications.
     */
    public const EPSG_PD_83_3_DEGREE_GAUSS_KRUGER_ZONE_3_E_N = 'urn:ogc:def:crs:EPSG::5666';

    /**
     * PD/83 / 3-degree Gauss-Kruger zone 4
     * Extent: Germany - Thuringen - east of 10°30'E
     * Consistent with DHDN (CRS code 4314) at the 1-metre level. For low accuracy applications PD/83 can be considered
     * the same as DHDN. See CRS code 5667 for variant with axes order reversed to easting before northing for use in
     * GIS applications.
     */
    public const EPSG_PD_83_3_DEGREE_GAUSS_KRUGER_ZONE_4 = 'urn:ogc:def:crs:EPSG::3397';

    /**
     * PD/83 / 3-degree Gauss-Kruger zone 4 (E-N)
     * Extent: Germany - Thuringen - east of 10°30'E
     * PD/83 / 3-degree Gauss-Kruger zone 4 (CRS code 3397) but with axis order reversed (and axis abbreviations
     * changed) for GIS applications.
     */
    public const EPSG_PD_83_3_DEGREE_GAUSS_KRUGER_ZONE_4_E_N = 'urn:ogc:def:crs:EPSG::5667';

    /**
     * Perroud 1950 / Terre Adelie Polar Stereographic
     * Extent: Antarctica - Adelie Land - coastal area between 136°E and 142°E
     * Replaced by RGTAAF07 / Terre Adelie Polar Stereographic (CRS code 7082).
     */
    public const EPSG_PERROUD_1950_TERRE_ADELIE_POLAR_STEREOGRAPHIC = 'urn:ogc:def:crs:EPSG::2986';

    /**
     * Peru96 / UTM zone 17S
     * Extent: Peru - between 84°W and 78°W.
     */
    public const EPSG_PERU96_UTM_ZONE_17S = 'urn:ogc:def:crs:EPSG::5839';

    /**
     * Peru96 / UTM zone 18S
     * Extent: Peru - between 78°W and 72°W.
     */
    public const EPSG_PERU96_UTM_ZONE_18S = 'urn:ogc:def:crs:EPSG::5387';

    /**
     * Peru96 / UTM zone 19S
     * Extent: Peru - east of 72°W.
     */
    public const EPSG_PERU96_UTM_ZONE_19S = 'urn:ogc:def:crs:EPSG::5389';

    /**
     * Petrels 1972 / Terre Adelie Polar Stereographic
     * Extent: Antarctica - Adelie Land - Petrels island
     * Replaced by RGTAAF07 / Terre Adelie Polar Stereographic (CRS code 7082).
     */
    public const EPSG_PETRELS_1972_TERRE_ADELIE_POLAR_STEREOGRAPHIC = 'urn:ogc:def:crs:EPSG::2985';

    /**
     * Pitcairn 1967 / UTM zone 9S
     * Extent: Pitcairn - Pitcairn Island
     * Replaced by Pitcairn 2006 / Pitcairn TM 2006 (CRS code 3783).
     */
    public const EPSG_PITCAIRN_1967_UTM_ZONE_9S = 'urn:ogc:def:crs:EPSG::3784';

    /**
     * Pitcairn 2006 / Pitcairn TM 2006
     * Extent: Pitcairn - Pitcairn Island
     * Replaces Pitcairn 1967 / UTM zone 9S (CRS code 3784). For practical purposes may be considered to be WGS 84 /
     * Pitcairn TM 2006.
     */
    public const EPSG_PITCAIRN_2006_PITCAIRN_TM_2006 = 'urn:ogc:def:crs:EPSG::3783';

    /**
     * PN68 / UTM zone 27N
     * Extent: Spain - Canary Islands - El Hierro onshore west of 18°W
     * Replaced by PN84 / UTM zone 27N and then by REGCAN95 / UTM zone 27N (CRS code 3629).
     */
    public const EPSG_PN68_UTM_ZONE_27N = 'urn:ogc:def:crs:EPSG::9404';

    /**
     * PN68 / UTM zone 28N
     * Extent: Spain - Canary Islands onshore - El Hierro east of 18°W, Fuerteventura, Gran Canaria, La Gomera, La
     * Palma, Lanzarote and Tenerife
     * Replaced by PN84 / UTM zone 28N only on western islands (El Hierro, La Gomera, La Palma and Tenerife). PN84
     * later replaced by REGCAN95. On eastern islands (Fuerteventura, Gran Canaria and Lanzarote) replaced by REGCAN95
     * / UTM zone 28N (CRS code 3630).
     */
    public const EPSG_PN68_UTM_ZONE_28N = 'urn:ogc:def:crs:EPSG::9405';

    /**
     * PN84 / UTM zone 27N
     * Extent: Spain - Canary Islands - El Hierro onshore west of 18°W
     * Replaces PN68 / UTM zone 27N (CRS code 9404). Replaced by REGCAN95 / UTM zone 27N (CRS code 3629).
     */
    public const EPSG_PN84_UTM_ZONE_27N = 'urn:ogc:def:crs:EPSG::9406';

    /**
     * PN84 / UTM zone 28N
     * Extent: Spain - Canary Islands onshore - El Hierro east of 18°W, La Gomera, La Palma and Tenerife
     * Replaces PN68 / UTM zone 28N (CRS code 9405). Replaced by REGCAN95 / UTM zone 28N (CRS code 3630).
     */
    public const EPSG_PN84_UTM_ZONE_28N = 'urn:ogc:def:crs:EPSG::9407';

    /**
     * PNG94 / PNGMG94 zone 54
     * Extent: Papua New Guinea - west of 144°E.
     */
    public const EPSG_PNG94_PNGMG94_ZONE_54 = 'urn:ogc:def:crs:EPSG::5550';

    /**
     * PNG94 / PNGMG94 zone 55
     * Extent: Papua New Guinea - between 144°E and 150°E.
     */
    public const EPSG_PNG94_PNGMG94_ZONE_55 = 'urn:ogc:def:crs:EPSG::5551';

    /**
     * PNG94 / PNGMG94 zone 56
     * Extent: Papua New Guinea - between 150°E and 156°E.
     */
    public const EPSG_PNG94_PNGMG94_ZONE_56 = 'urn:ogc:def:crs:EPSG::5552';

    /**
     * PNG94 / PNGMG94 zone 57
     * Extent: Papua New Guinea - between 156°E and 162°E.
     */
    public const EPSG_PNG94_PNGMG94_ZONE_57 = 'urn:ogc:def:crs:EPSG::9874';

    /**
     * PNG94 / PNGMG94 zone 58
     * Extent: Papua New Guinea - east of 162°E to EEZ limit.
     */
    public const EPSG_PNG94_PNGMG94_ZONE_58 = 'urn:ogc:def:crs:EPSG::9875';

    /**
     * Pointe Noire / UTM zone 32S
     * Extent: Congo.
     */
    public const EPSG_POINTE_NOIRE_UTM_ZONE_32S = 'urn:ogc:def:crs:EPSG::28232';

    /**
     * Porto Santo 1995 / UTM zone 28N
     * Extent: Portugal - Madeira, Porto Santo and Desertas islands - onshore
     * Replaced by PTRA08 / UTM zone 28N (CRS code 5016).
     */
    public const EPSG_PORTO_SANTO_1995_UTM_ZONE_28N = 'urn:ogc:def:crs:EPSG::3061';

    /**
     * Porto Santo / UTM zone 28N
     * Extent: Portugal - Madeira, Porto Santo and Desertas islands - onshore.
     */
    public const EPSG_PORTO_SANTO_UTM_ZONE_28N = 'urn:ogc:def:crs:EPSG::2942';

    /**
     * POSGAR 2007 / Argentina 1
     * Extent: Argentina - west of 70°30'W
     * Adopted as official replacement of POSGAR 94 / Argentina 1 in May 2009. Also replaces de facto use of POSGAR 98
     * / Argentina 1 as of same date.
     */
    public const EPSG_POSGAR_2007_ARGENTINA_1 = 'urn:ogc:def:crs:EPSG::5343';

    /**
     * POSGAR 2007 / Argentina 2
     * Extent: Argentina - between 70°30'W and 67°30'W, onshore
     * Adopted as official replacement of POSGAR 94 / Argentina 2 in May 2009. Also replaces de facto use of POSGAR 98
     * / Argentina 2 as of same date.
     */
    public const EPSG_POSGAR_2007_ARGENTINA_2 = 'urn:ogc:def:crs:EPSG::5344';

    /**
     * POSGAR 2007 / Argentina 3
     * Extent: Argentina - between 67°30'W and 64°30'W, onshore
     * Adopted as official replacement of POSGAR 94 / Argentina 3 in May 2009. Also replaces de facto use of POSGAR 98
     * / Argentina 3 as of same date.
     */
    public const EPSG_POSGAR_2007_ARGENTINA_3 = 'urn:ogc:def:crs:EPSG::5345';

    /**
     * POSGAR 2007 / Argentina 4
     * Extent: Argentina - between 64°30'W and 61°30'W, onshore
     * Adopted as official replacement of POSGAR 94 / Argentina 4 in May 2009. Also replaces de facto use of POSGAR 98
     * / Argentina 4 as of same date.
     */
    public const EPSG_POSGAR_2007_ARGENTINA_4 = 'urn:ogc:def:crs:EPSG::5346';

    /**
     * POSGAR 2007 / Argentina 5
     * Extent: Argentina - between 61°30'W and 58°30'W onshore
     * Adopted as official replacement of POSGAR 94 / Argentina 5 in May 2009. Also replaces de facto use of POSGAR 98
     * / Argentina 5 as of same date.
     */
    public const EPSG_POSGAR_2007_ARGENTINA_5 = 'urn:ogc:def:crs:EPSG::5347';

    /**
     * POSGAR 2007 / Argentina 6
     * Extent: Argentina - between 58°30'W and 55°30'W, onshore
     * Adopted as official replacement of POSGAR 94 / Argentina 6 in May 2009. Also replaces de facto use of POSGAR 98
     * / Argentina 6 as of same date.
     */
    public const EPSG_POSGAR_2007_ARGENTINA_6 = 'urn:ogc:def:crs:EPSG::5348';

    /**
     * POSGAR 2007 / Argentina 7
     * Extent: Argentina - east of 55°30'W, onshore
     * Adopted as official replacement of POSGAR 94 / Argentina 7 in May 2009. Also replaces de facto use of POSGAR 98
     * / Argentina 7 as of same date.
     */
    public const EPSG_POSGAR_2007_ARGENTINA_7 = 'urn:ogc:def:crs:EPSG::5349';

    /**
     * POSGAR 2007 / CABA 2019
     * Extent: Argentina - autonomous city of Buenos Aires
     * Replaces the "0 de Flores" plane grid of 1919 from May 2020.
     */
    public const EPSG_POSGAR_2007_CABA_2019 = 'urn:ogc:def:crs:EPSG::9498';

    /**
     * POSGAR 2007 / UTM zone 19S
     * Extent: Argentina - Tierra del Fuego offshore Atlantic west of 66°W.
     */
    public const EPSG_POSGAR_2007_UTM_ZONE_19S = 'urn:ogc:def:crs:EPSG::9265';

    /**
     * POSGAR 94 / Argentina 1
     * Extent: Argentina - west of 70°30'W
     * Legally adopted in May 1997. Replaced by POSGAR 98 / Argentina 1 for scientific and many practical purposes
     * until May 2009. Officially replaced by POSGAR 2007 / Argentina 1 in May 2009.
     */
    public const EPSG_POSGAR_94_ARGENTINA_1 = 'urn:ogc:def:crs:EPSG::22181';

    /**
     * POSGAR 94 / Argentina 2
     * Extent: Argentina - between 70°30'W and 67°30'W, onshore
     * Legally adopted in May 1997. Replaced by POSGAR 98 / Argentina 2 for scientific and many practical purposes
     * until May 2009. Officially replaced by POSGAR 2007 / Argentina 2 in May 2009.
     */
    public const EPSG_POSGAR_94_ARGENTINA_2 = 'urn:ogc:def:crs:EPSG::22182';

    /**
     * POSGAR 94 / Argentina 3
     * Extent: Argentina - between 67°30'W and 64°30'W, onshore
     * Legally adopted in May 1997. Replaced by POSGAR 98 / Argentina 3 for scientific and many practical purposes
     * until May 2009. Officially replaced by POSGAR 2007 / Argentina 3 in May 2009.
     */
    public const EPSG_POSGAR_94_ARGENTINA_3 = 'urn:ogc:def:crs:EPSG::22183';

    /**
     * POSGAR 94 / Argentina 4
     * Extent: Argentina - between 64°30'W and 61°30'W, onshore
     * Legally adopted in May 1997. Replaced by POSGAR 98 / Argentina 4 for scientific and many practical purposes
     * until May 2009. Officially replaced by POSGAR 2007 / Argentina 4 in May 2009.
     */
    public const EPSG_POSGAR_94_ARGENTINA_4 = 'urn:ogc:def:crs:EPSG::22184';

    /**
     * POSGAR 94 / Argentina 5
     * Extent: Argentina - between 61°30'W and 58°30'W onshore
     * Legally adopted in May 1997. Replaced by POSGAR 98 / Argentina 5 for scientific and many practical purposes
     * until May 2009. Officially replaced by POSGAR 2007 / Argentina 5 in May 2009.
     */
    public const EPSG_POSGAR_94_ARGENTINA_5 = 'urn:ogc:def:crs:EPSG::22185';

    /**
     * POSGAR 94 / Argentina 6
     * Extent: Argentina - between 58°30'W and 55°30'W, onshore
     * Legally adopted in May 1997. Replaced by POSGAR 98 / Argentina 6 for scientific and many practical purposes
     * until May 2009. Officially replaced by POSGAR 2007 / Argentina 6 in May 2009.
     */
    public const EPSG_POSGAR_94_ARGENTINA_6 = 'urn:ogc:def:crs:EPSG::22186';

    /**
     * POSGAR 94 / Argentina 7
     * Extent: Argentina - east of 55°30'W, onshore
     * Legally adopted in May 1997. Replaced by POSGAR 98 / Argentina 7 for scientific and many practical purposes
     * until May 2009. Officially replaced by POSGAR 2007 / Argentina 7 in May 2009.
     */
    public const EPSG_POSGAR_94_ARGENTINA_7 = 'urn:ogc:def:crs:EPSG::22187';

    /**
     * POSGAR 98 / Argentina 1
     * Extent: Argentina - west of 70°30'W
     * Replaced POSGAR 94 / Argentina 1 for many practical purposes (but not as the legal system) until May 2009.
     * POSGAR 94 / Argentina 1 was officially replaced by POSGAR 2007 / Argentina 1 in May 2009.
     */
    public const EPSG_POSGAR_98_ARGENTINA_1 = 'urn:ogc:def:crs:EPSG::22171';

    /**
     * POSGAR 98 / Argentina 2
     * Extent: Argentina - between 70°30'W and 67°30'W, onshore
     * Replaced POSGAR 94 / Argentina 2 for many practical purposes (but not as the legal system) until May 2009.
     * POSGAR 94 / Argentina 2 was officially replaced by POSGAR 2007 / Argentina 2 in May 2009.
     */
    public const EPSG_POSGAR_98_ARGENTINA_2 = 'urn:ogc:def:crs:EPSG::22172';

    /**
     * POSGAR 98 / Argentina 3
     * Extent: Argentina - between 67°30'W and 64°30'W, onshore
     * Replaced POSGAR 94 / Argentina 3 for many practical purposes (but not as the legal system) until May 2009.
     * POSGAR 94 / Argentina 3 was officially replaced by POSGAR 2007 / Argentina 3 in May 2009.
     */
    public const EPSG_POSGAR_98_ARGENTINA_3 = 'urn:ogc:def:crs:EPSG::22173';

    /**
     * POSGAR 98 / Argentina 4
     * Extent: Argentina - between 64°30'W and 61°30'W, onshore
     * Replaced POSGAR 94 / Argentina 4 for many practical purposes (but not as the legal system) until May 2009.
     * POSGAR 94 / Argentina 4 was officially replaced by POSGAR 2007 / Argentina 4 in May 2009.
     */
    public const EPSG_POSGAR_98_ARGENTINA_4 = 'urn:ogc:def:crs:EPSG::22174';

    /**
     * POSGAR 98 / Argentina 5
     * Extent: Argentina - between 61°30'W and 58°30'W onshore
     * Replaced POSGAR 94 / Argentina 5 for many practical purposes (but not as the legal system) until May 2009.
     * POSGAR 94 / Argentina 5 was officially replaced by POSGAR 2007 / Argentina 5 in May 2009.
     */
    public const EPSG_POSGAR_98_ARGENTINA_5 = 'urn:ogc:def:crs:EPSG::22175';

    /**
     * POSGAR 98 / Argentina 6
     * Extent: Argentina - between 58°30'W and 55°30'W, onshore
     * Replaced POSGAR 94 / Argentina 6 for many practical purposes (but not as the legal system) until May 2009.
     * POSGAR 94 / Argentina 6 was officially replaced by POSGAR 2007 / Argentina 6 in May 2009.
     */
    public const EPSG_POSGAR_98_ARGENTINA_6 = 'urn:ogc:def:crs:EPSG::22176';

    /**
     * POSGAR 98 / Argentina 7
     * Extent: Argentina - east of 55°30'W, onshore
     * Replaced POSGAR 94 / Argentina 7 for many practical purposes (but not as the legal system) until May 2009.
     * POSGAR 94 / Argentina 7 was officially replaced by POSGAR 2007 / Argentina 7 in May 2009.
     */
    public const EPSG_POSGAR_98_ARGENTINA_7 = 'urn:ogc:def:crs:EPSG::22177';

    /**
     * PRS92 / Philippines zone 1
     * Extent: Philippines - west of 118°E
     * Replaces Luzon 1911 / Philippines zone I (CRS code 25391).
     */
    public const EPSG_PRS92_PHILIPPINES_ZONE_1 = 'urn:ogc:def:crs:EPSG::3121';

    /**
     * PRS92 / Philippines zone 2
     * Extent: Philippines - approximately between 118°E and 120°E - Palawan; Calamian Islands
     * Replaces Luzon 1911 / Philippines zone II (CRS code 25392).
     */
    public const EPSG_PRS92_PHILIPPINES_ZONE_2 = 'urn:ogc:def:crs:EPSG::3122';

    /**
     * PRS92 / Philippines zone 3
     * Extent: Philippines - approximately between 120°E and 122°E. Luzon (west of 122°E); Mindoro
     * Replaces Luzon 1911 / Philippines zone III (CRS code 25393).
     */
    public const EPSG_PRS92_PHILIPPINES_ZONE_3 = 'urn:ogc:def:crs:EPSG::3123';

    /**
     * PRS92 / Philippines zone 4
     * Extent: Philippines - approximately between 122°E and 124°E - southeast Luzon (east of 122°E); Tablas;
     * Masbate; Panay; Cebu; Negros; west Mindanao (west of 122°E)
     * Replaces Luzon 1911 / Philippines zone IV (CRS code 25394).
     */
    public const EPSG_PRS92_PHILIPPINES_ZONE_4 = 'urn:ogc:def:crs:EPSG::3124';

    /**
     * PRS92 / Philippines zone 5
     * Extent: Philippines - approximately between 124°E and 126°E, - east Mindanao (east of 124°E); Bohol; Samar
     * Replaces Luzon 1911 / Philippines zone V (CRS code 25395).
     */
    public const EPSG_PRS92_PHILIPPINES_ZONE_5 = 'urn:ogc:def:crs:EPSG::3125';

    /**
     * PSAD56 / ICN Regional
     * Extent: Venezuela - onshore.
     */
    public const EPSG_PSAD56_ICN_REGIONAL = 'urn:ogc:def:crs:EPSG::2317';

    /**
     * PSAD56 / Peru central zone
     * Extent: Peru - between 79°W and 73°W, onshore.
     */
    public const EPSG_PSAD56_PERU_CENTRAL_ZONE = 'urn:ogc:def:crs:EPSG::24892';

    /**
     * PSAD56 / Peru east zone
     * Extent: Peru - east of 73°W, onshore.
     */
    public const EPSG_PSAD56_PERU_EAST_ZONE = 'urn:ogc:def:crs:EPSG::24893';

    /**
     * PSAD56 / Peru west zone
     * Extent: Peru - west of 79°W.
     */
    public const EPSG_PSAD56_PERU_WEST_ZONE = 'urn:ogc:def:crs:EPSG::24891';

    /**
     * PSAD56 / UTM zone 17N
     * Extent: South America (Ecuador) between 84°W and 78°W, northern hemisphere, onshore.
     */
    public const EPSG_PSAD56_UTM_ZONE_17N = 'urn:ogc:def:crs:EPSG::24817';

    /**
     * PSAD56 / UTM zone 17S
     * Extent: South America (Ecuador and Peru) between 84°W and 78°W, southern hemisphere, onshore.
     */
    public const EPSG_PSAD56_UTM_ZONE_17S = 'urn:ogc:def:crs:EPSG::24877';

    /**
     * PSAD56 / UTM zone 18N
     * Extent: South America (Ecuador; Venezuela) between 78°W and 72°W, northern hemisphere, onshore
     * In Venezuela also known as La Canoa / UTM zone 18N.
     */
    public const EPSG_PSAD56_UTM_ZONE_18N = 'urn:ogc:def:crs:EPSG::24818';

    /**
     * PSAD56 / UTM zone 18S
     * Extent: South America (Chile - north of 45°S; Ecuador; Peru) between 78°W and 72°W, southern hemisphere,
     * onshore.
     */
    public const EPSG_PSAD56_UTM_ZONE_18S = 'urn:ogc:def:crs:EPSG::24878';

    /**
     * PSAD56 / UTM zone 19N
     * Extent: South America (Aruba; Bonaire; Curacao; Venezuela) between 72°W and 66°W, northern hemisphere, onshore
     * In Venezuela also known as La Canoa / UTM zone 19N.
     */
    public const EPSG_PSAD56_UTM_ZONE_19N = 'urn:ogc:def:crs:EPSG::24819';

    /**
     * PSAD56 / UTM zone 19S
     * Extent: South America (Bolivia; Chile - north of 45°S; Peru) between 72°W and 66°W, southern hemisphere,
     * onshore.
     */
    public const EPSG_PSAD56_UTM_ZONE_19S = 'urn:ogc:def:crs:EPSG::24879';

    /**
     * PSAD56 / UTM zone 20N
     * Extent: South America (Guyana; Venezuela) onshore between 66°W and 60°W, northern hemisphere
     * In Venezuela also known as La Canoa / UTM zone 20N.
     */
    public const EPSG_PSAD56_UTM_ZONE_20N = 'urn:ogc:def:crs:EPSG::24820';

    /**
     * PSAD56 / UTM zone 20S
     * Extent: Bolivia between 66°W and 60°W.
     */
    public const EPSG_PSAD56_UTM_ZONE_20S = 'urn:ogc:def:crs:EPSG::24880';

    /**
     * PSAD56 / UTM zone 21N
     * Extent: South America (Guyana) onshore between 60°W and 54°W, northern hemisphere.
     */
    public const EPSG_PSAD56_UTM_ZONE_21N = 'urn:ogc:def:crs:EPSG::24821';

    /**
     * PSAD56 / UTM zone 21S
     * Extent: Bolivia - east of 60°W.
     */
    public const EPSG_PSAD56_UTM_ZONE_21S = 'urn:ogc:def:crs:EPSG::24881';

    /**
     * PSAD56 / UTM zone 22S
     * Extent: Brazil - offshore shelf - Amazon cone.
     */
    public const EPSG_PSAD56_UTM_ZONE_22S = 'urn:ogc:def:crs:EPSG::24882';

    /**
     * PSD93 / UTM zone 39N
     * Extent: Oman - onshore west of 54°E
     * Replaced Fahud / UTM zone 39N projCRS (code 23239) in 1993. Maximum differences to Fahud adjustment are 20
     * metres.
     */
    public const EPSG_PSD93_UTM_ZONE_39N = 'urn:ogc:def:crs:EPSG::3439';

    /**
     * PSD93 / UTM zone 40N
     * Extent: Oman - onshore east of 54°E. Includes Musandam and the Kuria Muria (Al Hallaniyah) islands
     * Replaced Fahud / UTM zone 40N projCRS (code 23240) in 1993. Maximum differences to Fahud adjustment are 20
     * metres.
     */
    public const EPSG_PSD93_UTM_ZONE_40N = 'urn:ogc:def:crs:EPSG::3440';

    /**
     * PTRA08 / LAEA Europe
     * Extent: Portugal - Azores and Madeira island groups and surrounding EEZ - Flores, Corvo; Graciosa, Terceira, Sao
     * Jorge, Pico, Faial; Sao Miguel, Santa Maria; Madeira, Porto Santo, Desertas; Selvagens
     * At applicable scales and usages, may be considered consistent with ETRS89-extended / LAEA Europe (CRS code
     * 3035): see CT 9045.
     */
    public const EPSG_PTRA08_LAEA_EUROPE = 'urn:ogc:def:crs:EPSG::5633';

    /**
     * PTRA08 / LCC Europe
     * Extent: Portugal - Azores and Madeira island groups and surrounding EEZ - Flores, Corvo; Graciosa, Terceira, Sao
     * Jorge, Pico, Faial; Sao Miguel, Santa Maria; Madeira, Porto Santo, Desertas; Selvagens
     * At applicable scales (1:500,000 and smaller) may be considered consistent with ETRS89-extended / LCC Europe (CRS
     * code 3034): see CT 9046.
     */
    public const EPSG_PTRA08_LCC_EUROPE = 'urn:ogc:def:crs:EPSG::5632';

    /**
     * PTRA08 / UTM zone 25N
     * Extent: Portugal - west of 30°W - western Azores - Flores and Corvo islands and surrounding EEZ
     * Replaces Azores Occidental 1939 / UTM zone 25N (CRS code 2188).
     */
    public const EPSG_PTRA08_UTM_ZONE_25N = 'urn:ogc:def:crs:EPSG::5014';

    /**
     * PTRA08 / UTM zone 26N
     * Extent: Portugal - between 30°W and 24°W - central and eastern Azores - Graciosa, Terceira, Sao Jorge, Pico,
     * Faial; Sao Miguel and Santa Maria islands and surrounding EEZ
     * Replaces Azores Oriental 1995 / UTM zone 26N and Azores Central 1995 / UTM zone 26N (CRS codes 3062-63).
     */
    public const EPSG_PTRA08_UTM_ZONE_26N = 'urn:ogc:def:crs:EPSG::5015';

    /**
     * PTRA08 / UTM zone 28N
     * Extent: Portugal - Madeira, Porto Santo, Desertas and Selvagens islands and surrounding EEZ east of 18°W
     * Replaces Porto Santo 1995 / UTM zone 28N (CRS code 3061).
     */
    public const EPSG_PTRA08_UTM_ZONE_28N = 'urn:ogc:def:crs:EPSG::5016';

    /**
     * Puerto Rico State Plane CS of 1927
     * Extent: Puerto Rico - onshore
     * Sometimes erroneously referred to as NAD27 / Puerto Rico State Plane CS.
     */
    public const EPSG_PUERTO_RICO_STATE_PLANE_CS_OF_1927 = 'urn:ogc:def:crs:EPSG::3991';

    /**
     * Puerto Rico / St. Croix
     * Extent: US Virgin Islands - onshore - St Croix, St John, and St Thomas
     * Sometimes erroneously referred to as NAD27 / St. Croix State Plane CS.
     */
    public const EPSG_PUERTO_RICO_ST_CROIX = 'urn:ogc:def:crs:EPSG::3992';

    /**
     * Puerto Rico / UTM zone 20N
     * Extent: British Virgin Islands - onshore - Anegada, Jost Van Dyke, Tortola, and Virgin Gorda
     * NAD27 / UTM zone 20N (code 26720) used for military purposes. In 2002 replaced by NAD83 / UTM zone 20N (CRS code
     * 26920).
     */
    public const EPSG_PUERTO_RICO_UTM_ZONE_20N = 'urn:ogc:def:crs:EPSG::3920';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger CM 102E
     * Extent: Russia - onshore between 100°30'E and 103°30'E
     * Truncated form of Pulkovo 1942 / 3-degree Gauss-Kruger zone 34 (code 2551).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_CM_102E = 'urn:ogc:def:crs:EPSG::2610';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger CM 105E
     * Extent: Russia - onshore between 103°30'E and 106°30'E
     * Truncated form of Pulkovo 1942 / 3-degree Gauss-Kruger zone 35 (code 2552).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_CM_105E = 'urn:ogc:def:crs:EPSG::2611';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger CM 108E
     * Extent: Russia - onshore between 106°30'E and 109°30'E
     * Truncated form of Pulkovo 1942 / 3-degree Gauss-Kruger zone 36 (code 2553).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_CM_108E = 'urn:ogc:def:crs:EPSG::2612';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger CM 111E
     * Extent: Russia - onshore between 109°30'E and 112°30'E
     * Truncated form of Pulkovo 1942 / 3-degree Gauss-Kruger zone 37 (code 2554).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_CM_111E = 'urn:ogc:def:crs:EPSG::2613';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger CM 114E
     * Extent: Russia - onshore between 112°30'E and 115°30'E
     * Truncated form of Pulkovo 1942 / 3-degree Gauss-Kruger zone 38 (code 2555).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_CM_114E = 'urn:ogc:def:crs:EPSG::2614';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger CM 117E
     * Extent: Russia - onshore between 115°30'E and 118°30'E
     * Truncated form of Pulkovo 1942 / 3-degree Gauss-Kruger zone 39 (code 2556).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_CM_117E = 'urn:ogc:def:crs:EPSG::2615';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger CM 120E
     * Extent: Russia - onshore between 118°30'E and 121°30'E
     * Truncated form of Pulkovo 1942 / 3-degree Gauss-Kruger zone 40 (code 2557).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_CM_120E = 'urn:ogc:def:crs:EPSG::2616';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger CM 123E
     * Extent: Russia - onshore between 121°30'E and 124°30'E
     * Truncated form of Pulkovo 1942 / 3-degree Gauss-Kruger zone 41 (code 2558).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_CM_123E = 'urn:ogc:def:crs:EPSG::2617';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger CM 126E
     * Extent: Russia - onshore between 124°30'E and 127°30'E
     * Truncated form of Pulkovo 1942 / 3-degree Gauss-Kruger zone 42 (code 2559).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_CM_126E = 'urn:ogc:def:crs:EPSG::2618';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger CM 129E
     * Extent: Russia - onshore between 127°30'E and 130°30'E
     * Truncated form of Pulkovo 1942 / 3-degree Gauss-Kruger zone 43 (code 2560).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_CM_129E = 'urn:ogc:def:crs:EPSG::2619';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger CM 132E
     * Extent: Russia - onshore between 130°30'E and 133°30'E
     * Truncated form of Pulkovo 1942 / 3-degree Gauss-Kruger zone 44 (code 2561).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_CM_132E = 'urn:ogc:def:crs:EPSG::2620';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger CM 135E
     * Extent: Russia - onshore between 133°30'E and 136°30'E
     * Truncated form of Pulkovo 1942 / 3-degree Gauss-Kruger zone 45 (code 2562).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_CM_135E = 'urn:ogc:def:crs:EPSG::2621';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger CM 138E
     * Extent: Russia - onshore between 136°30'E and 139°30'E
     * Truncated form of Pulkovo 1942 / 3-degree Gauss-Kruger zone 46 (code 2563).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_CM_138E = 'urn:ogc:def:crs:EPSG::2622';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger CM 141E
     * Extent: Russia - onshore between 139°30'E and 142°30'E
     * Truncated form of Pulkovo 1942 / 3-degree Gauss-Kruger zone 47 (code 2564).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_CM_141E = 'urn:ogc:def:crs:EPSG::2623';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger CM 144E
     * Extent: Russia - onshore between 142°30'E and 145°30'E
     * Truncated form of Pulkovo 1942 / 3-degree Gauss-Kruger zone 48 (code 2565).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_CM_144E = 'urn:ogc:def:crs:EPSG::2624';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger CM 147E
     * Extent: Russia - onshore between 145°30'E and 148°30'E
     * Truncated form of Pulkovo 1942 / 3-degree Gauss-Kruger zone 49 (code 2566).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_CM_147E = 'urn:ogc:def:crs:EPSG::2625';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger CM 150E
     * Extent: Russia - onshore between 148°30'E and 151°30'E
     * Truncated form of Pulkovo 1942 / 3-degree Gauss-Kruger zone 50 (code 2567).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_CM_150E = 'urn:ogc:def:crs:EPSG::2626';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger CM 153E
     * Extent: Russia - onshore between 151°30'E and 154°30'E
     * Truncated form of Pulkovo 1942 / 3-degree Gauss-Kruger zone 51 (code 2568).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_CM_153E = 'urn:ogc:def:crs:EPSG::2627';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger CM 156E
     * Extent: Russia - onshore between 154°30'E and 157°30'E
     * Truncated form of Pulkovo 1942 / 3-degree Gauss-Kruger zone 52 (code 2569).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_CM_156E = 'urn:ogc:def:crs:EPSG::2628';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger CM 159E
     * Extent: Russia - onshore between 157°30'E and 160°30'E
     * Truncated form of Pulkovo 1942 / 3-degree Gauss-Kruger zone 53 (code 2570).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_CM_159E = 'urn:ogc:def:crs:EPSG::2629';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger CM 162E
     * Extent: Russia - onshore between 160°30'E and 163°30'E
     * Truncated form of Pulkovo 1942 / 3-degree Gauss-Kruger zone 54 (code 2571).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_CM_162E = 'urn:ogc:def:crs:EPSG::2630';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger CM 165E
     * Extent: Russia - onshore between 163°30'E and 166°30'E
     * Truncated form of Pulkovo 1942 / 3-degree Gauss-Kruger zone 55 (code 2572).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_CM_165E = 'urn:ogc:def:crs:EPSG::2631';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger CM 168E
     * Extent: Russia - onshore between 166°30'E and 169°30'E
     * Truncated form of Pulkovo 1942 / 3-degree Gauss-Kruger zone 56 (code 2573).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_CM_168E = 'urn:ogc:def:crs:EPSG::2632';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger CM 168W
     * Extent: Russia - onshore between 169°30'W and 166°30'W
     * Truncated form of Pulkovo 1942 / 3-degree Gauss-Kruger zone 64 (code 2581).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_CM_168W = 'urn:ogc:def:crs:EPSG::2640';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger CM 171E
     * Extent: Russia - onshore between 169°30'E and 172°30'E
     * Truncated form of Pulkovo 1942 / 3-degree Gauss-Kruger zone 57 (code 2574).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_CM_171E = 'urn:ogc:def:crs:EPSG::2633';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger CM 171W
     * Extent: Russia - onshore between 172°30'W and 169°30'W
     * Truncated form of Pulkovo 1942 / 3-degree Gauss-Kruger zone 63 (code 2580).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_CM_171W = 'urn:ogc:def:crs:EPSG::2639';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger CM 174E
     * Extent: Russia - onshore between 172°30'E and 175°30'E
     * Truncated form of Pulkovo 1942 / 3-degree Gauss-Kruger zone 58 (code 2575).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_CM_174E = 'urn:ogc:def:crs:EPSG::2634';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger CM 174W
     * Extent: Russia - onshore between 175°30'W and 172°30'W
     * Truncated form of Pulkovo 1942 / 3-degree Gauss-Kruger zone 62 (code 2579).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_CM_174W = 'urn:ogc:def:crs:EPSG::2638';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger CM 177E
     * Extent: Russia - onshore between 175°30'E and 178°30'E
     * Truncated form of Pulkovo 1942 / 3-degree Gauss-Kruger zone 59 (code 2576).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_CM_177E = 'urn:ogc:def:crs:EPSG::2635';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger CM 177W
     * Extent: Russia - onshore between 178°30'W and 175°30'W
     * Truncated form of Pulkovo 1942 / 3-degree Gauss-Kruger zone 61 (code 2578).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_CM_177W = 'urn:ogc:def:crs:EPSG::2637';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger CM 180E
     * Extent: Russia - onshore between 178°30'E and 178°30'W
     * Truncated form of Pulkovo 1942 / 3-degree Gauss-Kruger zone 60 (code 3389).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_CM_180E = 'urn:ogc:def:crs:EPSG::2636';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger CM 21E
     * Extent: Estonia, Latvia, Lithuania, Russia (Kaliningrad) and Ukraine - onshore between 19°30'E and 22°30'E
     * Truncated form of Pulkovo 1942 / 3-degree Gauss-Kruger zone 7 (code 2523).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_CM_21E = 'urn:ogc:def:crs:EPSG::2582';

    /**
     * Pulkovo 1942 / 3-degree Gauss-Kruger CM 24E
     * Extent: Belarus, Estonia, Latvia, Lithuania, Russia (Kaliningrad) and Ukraine - onshore between 22°30'E and
     * 25°30'E
     * Truncated form of Pulkovo 1942 / 3-degree Gauss-Kruger zone 8 (code 2524).
     */
    public const EPSG_PULKOVO_1942_3_DEGREE_GAUSS_KRUGER_CM_24E = 'urn:ogc:def:crs:EPSG::2583';
}
