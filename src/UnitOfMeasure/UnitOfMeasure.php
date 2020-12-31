<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\UnitOfMeasure;

use Stringable;

interface UnitOfMeasure extends Stringable
{
    /**
     * arc-minute
     * 1/60th degree = ((pi/180) / 60) radians.
     */
    public const EPSG_ANGLE_ARC_MINUTE = 'urn:ogc:def:uom:EPSG::9103';

    /**
     * arc-second
     * 1/60th arc-minute = ((pi/180) / 3600) radians.
     */
    public const EPSG_ANGLE_ARC_SECOND = 'urn:ogc:def:uom:EPSG::9104';

    /**
     * arc-seconds per year
     * =((pi/180) / 3600) radians per year. Year taken to be IUGS definition of 31556925.445 seconds; see UoM code
     * 1029.
     */
    public const EPSG_ANGLE_ARC_SECONDS_PER_YEAR = 'urn:ogc:def:uom:EPSG::1043';

    /**
     * centesimal minute
     * 1/100 of a grad and gon = ((pi/200) / 100) radians.
     */
    public const EPSG_ANGLE_CENTESIMAL_MINUTE = 'urn:ogc:def:uom:EPSG::9112';

    /**
     * centesimal second
     * 1/100 of a centesimal minute or 1/10,000th of a grad and gon = ((pi/200) / 10000) radians.
     */
    public const EPSG_ANGLE_CENTESIMAL_SECOND = 'urn:ogc:def:uom:EPSG::9113';

    /**
     * degree
     * = pi/180 radians.
     */
    public const EPSG_ANGLE_DEGREE = 'urn:ogc:def:uom:EPSG::9102';

    /**
     * degree (supplier to define representation)
     * = pi/180 radians. The degree representation (e.g. decimal, DMSH, etc.) must be clarified by suppliers of data
     * associated with this code.
     */
    public const EPSG_ANGLE_DEGREE_SUPPLIER_TO_DEFINE_REPRESENTATION = 'urn:ogc:def:uom:EPSG::9122';

    /**
     * degree hemisphere
     * Degree representation. Format: degrees (real, any precision) - hemisphere abbreviation (single character N S E
     * or W). Convert to degrees using algorithm.
     */
    public const EPSG_ANGLE_DEGREE_HEMISPHERE = 'urn:ogc:def:uom:EPSG::9116';

    /**
     * degree minute
     * Degree representation. Format: signed degrees (integer)  - arc-minutes (real, any precision). Different symbol
     * sets are in use as field separators, for example º '. Convert to degrees using algorithm.
     */
    public const EPSG_ANGLE_DEGREE_MINUTE = 'urn:ogc:def:uom:EPSG::9115';

    /**
     * degree minute hemisphere
     * Degree representation. Format: degrees (integer) - arc-minutes (real, any precision) - hemisphere abbreviation
     * (single character N S E or W). Different symbol sets are in use as field separators, for example º '. Convert
     * to degrees using algorithm.
     */
    public const EPSG_ANGLE_DEGREE_MINUTE_HEMISPHERE = 'urn:ogc:def:uom:EPSG::9118';

    /**
     * degree minute second
     * Degree representation. Format: signed degrees (integer) - arc-minutes (integer) - arc-seconds (real, any
     * precision). Different symbol sets are in use as field separators, for example º ' ". Convert to degrees using
     * algorithm.
     */
    public const EPSG_ANGLE_DEGREE_MINUTE_SECOND = 'urn:ogc:def:uom:EPSG::9107';

    /**
     * degree minute second hemisphere
     * Degree representation. Format: degrees (integer) - arc-minutes (integer) - arc-seconds (real) - hemisphere
     * abbreviation (single character N S E or W). Different symbol sets are in use as field separators for example º
     * ' ". Convert to deg using algorithm.
     */
    public const EPSG_ANGLE_DEGREE_MINUTE_SECOND_HEMISPHERE = 'urn:ogc:def:uom:EPSG::9108';

    /**
     * grad
     * =pi/200 radians.
     */
    public const EPSG_ANGLE_GRAD = 'urn:ogc:def:uom:EPSG::9105';

    /**
     * hemisphere degree
     * Degree representation. Format: hemisphere abbreviation (single character N S E or W) - degrees (real, any
     * precision). Convert to degrees using algorithm.
     */
    public const EPSG_ANGLE_HEMISPHERE_DEGREE = 'urn:ogc:def:uom:EPSG::9117';

    /**
     * hemisphere degree minute
     * Degree representation. Format:  hemisphere abbreviation (single character N S E or W) - degrees (integer) -
     * arc-minutes (real, any precision). Different symbol sets are in use as field separators, for example º '.
     * Convert to degrees using algorithm.
     */
    public const EPSG_ANGLE_HEMISPHERE_DEGREE_MINUTE = 'urn:ogc:def:uom:EPSG::9119';

    /**
     * hemisphere degree minute second
     * Degree representation. Format: hemisphere abbreviation (single character N S E or W) - degrees (integer) -
     * arc-minutes (integer) - arc-seconds (real). Different symbol sets are in use as field separators for example º
     * ' ". Convert to deg using algorithm.
     */
    public const EPSG_ANGLE_HEMISPHERE_DEGREE_MINUTE_SECOND = 'urn:ogc:def:uom:EPSG::9120';

    /**
     * microradian
     * rad * 10E-6.
     */
    public const EPSG_ANGLE_MICRORADIAN = 'urn:ogc:def:uom:EPSG::9109';

    /**
     * mil_6400
     * Angle subtended by 1/6400 part of a circle.  Approximates to 1/1000th radian.  Note that other approximations
     * (notably 1/6300 circle and 1/6000 circle) also exist.
     */
    public const EPSG_ANGLE_MIL_6400 = 'urn:ogc:def:uom:EPSG::9114';

    /**
     * milliarc-second
     * = ((pi/180) / 3600 / 1000) radians.
     */
    public const EPSG_ANGLE_MILLIARC_SECOND = 'urn:ogc:def:uom:EPSG::1031';

    /**
     * milliarc-seconds per year
     * = ((pi/180) / 3600 / 1000) radians per year. Year taken to be IUGS definition of 31556925.445 seconds; see UoM
     * code 1029.
     */
    public const EPSG_ANGLE_MILLIARC_SECONDS_PER_YEAR = 'urn:ogc:def:uom:EPSG::1032';

    /**
     * radian
     * SI coherent derived unit (standard unit) for plane angle.
     */
    public const EPSG_ANGLE_RADIAN = 'urn:ogc:def:uom:EPSG::9101';

    /**
     * radian per second
     * SI coherent derived unit (standard unit) for angular velocity.
     */
    public const EPSG_ANGLE_RADIAN_PER_SECOND = 'urn:ogc:def:uom:EPSG::1035';

    /**
     * sexagesimal DM
     * Pseudo unit. Format: signed degrees - period - integer minutes (2 digits) - fraction of minutes (any precision).
     * Must include leading zero in minutes and exclude decimal point for minutes. Convert to degree using algorithm.
     */
    public const EPSG_ANGLE_SEXAGESIMAL_DM = 'urn:ogc:def:uom:EPSG::9111';

    /**
     * sexagesimal DMS
     * Pseudo unit. Format: signed degrees - period - minutes (2 digits) - integer seconds (2 digits) - fraction of
     * seconds (any precision). Must include leading zero in minutes and seconds and exclude decimal point for seconds.
     * Convert to deg using algorithm.
     */
    public const EPSG_ANGLE_SEXAGESIMAL_DMS = 'urn:ogc:def:uom:EPSG::9110';

    /**
     * sexagesimal DMS.s
     * Pseudo unit. Format: signed degrees - minutes (2 digits) - integer seconds (2 digits) - period - fraction of
     * seconds (any precision). Must include leading zero in minutes and seconds and include decimal point for seconds.
     * Convert to deg using algorithm.
     */
    public const EPSG_ANGLE_SEXAGESIMAL_DMS_S = 'urn:ogc:def:uom:EPSG::9121';

    /**
     * British chain (Benoit 1895 A)
     * Uses Benoit's 1895 British yard-metre ratio as given by Clark as 0.9143992 metres per yard.  Used for deriving
     * metric size of ellipsoid in Palestine.
     */
    public const EPSG_LENGTH_BRITISH_CHAIN_BENOIT_1895_A = 'urn:ogc:def:uom:EPSG::9052';

    /**
     * British chain (Benoit 1895 B)
     * Uses Benoit's 1895 British yard-metre ratio as given by Bomford as 39.370113 inches per metre.  Used in West
     * Malaysian mapping.
     */
    public const EPSG_LENGTH_BRITISH_CHAIN_BENOIT_1895_B = 'urn:ogc:def:uom:EPSG::9062';

    /**
     * British chain (Sears 1922 truncated)
     * Uses Sear's 1922 British yard-metre ratio (UoM code 9040) truncated to 6 significant figures; this truncated
     * ratio (0.914398, UoM code 9099) then converted to other imperial units. 1 chSe(T) = 22 ydSe(T). Used in
     * metrication of Malaya RSO grid.
     */
    public const EPSG_LENGTH_BRITISH_CHAIN_SEARS_1922_TRUNCATED = 'urn:ogc:def:uom:EPSG::9301';

    /**
     * British chain (Sears 1922)
     * Uses Sear's 1922 British yard-metre ratio as given by Bomford as 39.370147 inches per metre.  Used in East
     * Malaysian and older New Zealand mapping.
     */
    public const EPSG_LENGTH_BRITISH_CHAIN_SEARS_1922 = 'urn:ogc:def:uom:EPSG::9042';

    /**
     * British foot (1865)
     * Uses Clark's estimate of 1853-1865 British foot-metre ratio of 0.9144025 metres per yard.  Used in 1962 and 1975
     * estimates of Indian foot.
     */
    public const EPSG_LENGTH_BRITISH_FOOT_1865 = 'urn:ogc:def:uom:EPSG::9070';

    /**
     * British foot (1936)
     * For the 1936 retriangulation OSGB defines the relationship of 10 feet of 1796 to the International metre through
     * the logarithmic relationship (10^0.48401603 exactly). 1 ft = 0.3048007491…m. Also used for metric conversions
     * in Ireland.
     */
    public const EPSG_LENGTH_BRITISH_FOOT_1936 = 'urn:ogc:def:uom:EPSG::9095';

    /**
     * British foot (Benoit 1895 A)
     * Uses Benoit's 1895 British yard-metre ratio as given by Clark as 0.9143992 metres per yard.  Used for deriving
     * metric size of ellipsoid in Palestine.
     */
    public const EPSG_LENGTH_BRITISH_FOOT_BENOIT_1895_A = 'urn:ogc:def:uom:EPSG::9051';

    /**
     * British foot (Benoit 1895 B)
     * Uses Benoit's 1895 British yard-metre ratio as given by Bomford as 39.370113 inches per metre.  Used in West
     * Malaysian mapping.
     */
    public const EPSG_LENGTH_BRITISH_FOOT_BENOIT_1895_B = 'urn:ogc:def:uom:EPSG::9061';

    /**
     * British foot (Sears 1922 truncated)
     * Uses Sear's 1922 British yard-metre ratio (UoM code 9040) truncated to 6 significant figures; this truncated
     * ratio (0.914398, UoM code 9099) then converted to other imperial units. 3 ftSe(T) = 1 ydSe(T).
     */
    public const EPSG_LENGTH_BRITISH_FOOT_SEARS_1922_TRUNCATED = 'urn:ogc:def:uom:EPSG::9300';

    /**
     * British foot (Sears 1922)
     * Uses Sear's 1922 British yard-metre ratio as given by Bomford as 39.370147 inches per metre.  Used in East
     * Malaysian and older New Zealand mapping.
     */
    public const EPSG_LENGTH_BRITISH_FOOT_SEARS_1922 = 'urn:ogc:def:uom:EPSG::9041';

    /**
     * British link (Benoit 1895 A)
     * Uses Benoit's 1895 British yard-metre ratio as given by Clark as 0.9143992 metres per yard.  Used for deriving
     * metric size of ellipsoid in Palestine.
     */
    public const EPSG_LENGTH_BRITISH_LINK_BENOIT_1895_A = 'urn:ogc:def:uom:EPSG::9053';

    /**
     * British link (Benoit 1895 B)
     * Uses Benoit's 1895 British yard-metre ratio as given by Bomford as 39.370113 inches per metre.  Used in West
     * Malaysian mapping.
     */
    public const EPSG_LENGTH_BRITISH_LINK_BENOIT_1895_B = 'urn:ogc:def:uom:EPSG::9063';

    /**
     * British link (Sears 1922 truncated)
     * Uses Sear's 1922 British yard-metre ratio (UoM code 9040) truncated to 6 significant figures; this truncated
     * ratio (0.914398, UoM code 9099) then converted to other imperial units. 100 lkSe(T) = 1 chSe(T).
     */
    public const EPSG_LENGTH_BRITISH_LINK_SEARS_1922_TRUNCATED = 'urn:ogc:def:uom:EPSG::9302';

    /**
     * British link (Sears 1922)
     * Uses Sear's 1922 British yard-metre ratio as given by Bomford as 39.370147 inches per metre.  Used in East
     * Malaysian and older New Zealand mapping.
     */
    public const EPSG_LENGTH_BRITISH_LINK_SEARS_1922 = 'urn:ogc:def:uom:EPSG::9043';

    /**
     * British yard (Benoit 1895 A)
     * Uses Benoit's 1895 British yard-metre ratio as given by Clark as 0.9143992 metres per yard.  Used for deriving
     * metric size of ellipsoid in Palestine.
     */
    public const EPSG_LENGTH_BRITISH_YARD_BENOIT_1895_A = 'urn:ogc:def:uom:EPSG::9050';

    /**
     * British yard (Benoit 1895 B)
     * G. Bomford "Geodesy" 2nd edition 1962; after J.S.Clark "Remeasurement of the Old Length Standards"; Empire
     * Survey Review no. 90; 1953.
     */
    public const EPSG_LENGTH_BRITISH_YARD_BENOIT_1895_B = 'urn:ogc:def:uom:EPSG::9060';

    /**
     * British yard (Sears 1922 truncated)
     * Uses Sear's 1922 British yard-metre ratio (UoM code 9040) truncated to 6 significant figures.
     */
    public const EPSG_LENGTH_BRITISH_YARD_SEARS_1922_TRUNCATED = 'urn:ogc:def:uom:EPSG::9099';

    /**
     * British yard (Sears 1922)
     * Uses Sear's 1922 British yard-metre ratio as given by Bomford as 39.370147 inches per metre.  Used in East
     * Malaysian and older New Zealand mapping.
     */
    public const EPSG_LENGTH_BRITISH_YARD_SEARS_1922 = 'urn:ogc:def:uom:EPSG::9040';

    /**
     * Clarke's chain
     * =22 Clarke's yards.  Assumes Clarke's 1865 ratio of 1 British foot = 0.3047972654 French legal metres applies to
     * the international metre.   Used in older Australian, southern African & British West Indian mapping.
     */
    public const EPSG_LENGTH_CLARKE_S_CHAIN = 'urn:ogc:def:uom:EPSG::9038';

    /**
     * Clarke's foot
     * Assumes Clarke's 1865 ratio of 1 British foot = 0.3047972654 French legal metres applies to the international
     * metre.   Used in older Australian, southern African & British West Indian mapping.
     */
    public const EPSG_LENGTH_CLARKE_S_FOOT = 'urn:ogc:def:uom:EPSG::9005';

    /**
     * Clarke's link
     * =1/100 Clarke's chain. Assumes Clarke's 1865 ratio of 1 British foot = 0.3047972654 French legal metres applies
     * to the international metre.   Used in older Australian, southern African & British West Indian mapping.
     */
    public const EPSG_LENGTH_CLARKE_S_LINK = 'urn:ogc:def:uom:EPSG::9039';

    /**
     * Clarke's yard
     * =3 Clarke's feet.  Assumes Clarke's 1865 ratio of 1 British foot = 0.3047972654 French legal metres applies to
     * the international metre.   Used in older Australian, southern African & British West Indian mapping.
     */
    public const EPSG_LENGTH_CLARKE_S_YARD = 'urn:ogc:def:uom:EPSG::9037';

    /**
     * German legal metre
     * Used in Namibia.
     */
    public const EPSG_LENGTH_GERMAN_LEGAL_METRE = 'urn:ogc:def:uom:EPSG::9031';

    /**
     * Gold Coast foot
     * Used in Ghana and some adjacent parts of British west Africa prior to metrication, except for the metrication of
     * projection defining parameters when British foot (Sears 1922) used.
     */
    public const EPSG_LENGTH_GOLD_COAST_FOOT = 'urn:ogc:def:uom:EPSG::9094';

    /**
     * Indian foot
     * Indian Foot = 0.99999566 British feet (A.R.Clarke 1865).  British yard (= 3 British feet) taken to be
     * J.S.Clark's 1865 value of 0.9144025 metres.
     */
    public const EPSG_LENGTH_INDIAN_FOOT = 'urn:ogc:def:uom:EPSG::9080';

    /**
     * Indian foot (1937)
     * Indian Foot = 0.99999566 British feet (A.R.Clarke 1865).  British foot taken to be 1895 Benoit value of
     * 12/39.370113m.  Rounded to 8 decimal places as 0.30479841. Used from Bangladesh to Vietnam.  Previously used in
     * India and Pakistan but superseded.
     */
    public const EPSG_LENGTH_INDIAN_FOOT_1937 = 'urn:ogc:def:uom:EPSG::9081';

    /**
     * Indian foot (1962)
     * Indian Foot = 0.99999566 British feet (A.R.Clarke 1865).  British yard (3 feet) taken to be J.S. Clark's 1865
     * value of 0.9144025m. Rounded to 7 significant figures with a small error as 1 Ind ft=0.3047996m.  Used in
     * Pakistan since metrication.
     */
    public const EPSG_LENGTH_INDIAN_FOOT_1962 = 'urn:ogc:def:uom:EPSG::9082';

    /**
     * Indian foot (1975)
     * Indian Foot = 0.99999566 British feet (A.R.Clarke 1865).  British yard (3 feet) taken to be J.S. Clark's 1865
     * value of 0.9144025m. Rounded to 7 significant figures as 1 Ind ft=0.3047995m.  Used in India since metrication.
     */
    public const EPSG_LENGTH_INDIAN_FOOT_1975 = 'urn:ogc:def:uom:EPSG::9083';

    /**
     * Indian yard
     * Indian Foot = 0.99999566 British feet (A.R.Clarke 1865).  British yard (= 3 British feet) taken to be
     * J.S.Clark's 1865 value of 0.9144025 metres.
     */
    public const EPSG_LENGTH_INDIAN_YARD = 'urn:ogc:def:uom:EPSG::9084';

    /**
     * Indian yard (1937)
     * Indian Foot = 0.99999566 British feet (A.R.Clarke 1865).  British foot taken to be 1895 Benoit value of
     * 12/39.370113m.  Rounded to 8 decimal places as 0.30479841. Used from Bangladesh to Vietnam.  Previously used in
     * India and Pakistan but superseded.
     */
    public const EPSG_LENGTH_INDIAN_YARD_1937 = 'urn:ogc:def:uom:EPSG::9085';

    /**
     * Indian yard (1962)
     * Indian Foot = 0.99999566 British feet (A.R.Clarke 1865).  British yard (3 feet) taken to be J.S. Clark's 1865
     * value of 0.9144025m. Rounded to 7 significant figures with a small error as 1 Ind ft=0.3047996m.  Used in
     * Pakistan since metrication.
     */
    public const EPSG_LENGTH_INDIAN_YARD_1962 = 'urn:ogc:def:uom:EPSG::9086';

    /**
     * Indian yard (1975)
     * Indian Foot = 0.99999566 British feet (A.R.Clarke 1865).  British yard (3 feet) taken to be J.S. Clark's 1865
     * value of 0.9144025m. Rounded to 7 significant figures as 1 Ind ft=0.3047995m.  Used in India since metrication.
     */
    public const EPSG_LENGTH_INDIAN_YARD_1975 = 'urn:ogc:def:uom:EPSG::9087';

    /**
     * Statute mile
     * =5280 feet.
     */
    public const EPSG_LENGTH_STATUTE_MILE = 'urn:ogc:def:uom:EPSG::9093';

    /**
     * US survey chain
     * Used in USA primarily for public lands cadastral work.
     */
    public const EPSG_LENGTH_US_SURVEY_CHAIN = 'urn:ogc:def:uom:EPSG::9033';

    /**
     * US survey foot
     * Used in USA.
     */
    public const EPSG_LENGTH_US_SURVEY_FOOT = 'urn:ogc:def:uom:EPSG::9003';

    /**
     * US survey link
     * Used in USA primarily for public lands cadastral work.
     */
    public const EPSG_LENGTH_US_SURVEY_LINK = 'urn:ogc:def:uom:EPSG::9034';

    /**
     * US survey mile
     * Used in USA primarily for public lands cadastral work.
     */
    public const EPSG_LENGTH_US_SURVEY_MILE = 'urn:ogc:def:uom:EPSG::9035';

    /**
     * centimetre.
     */
    public const EPSG_LENGTH_CENTIMETRE = 'urn:ogc:def:uom:EPSG::1033';

    /**
     * centimetres per year
     * Year taken to be IUGS definition of 31556925.445 seconds; see UoM code 1029.
     */
    public const EPSG_LENGTH_CENTIMETRES_PER_YEAR = 'urn:ogc:def:uom:EPSG::1034';

    /**
     * chain
     * =22 international yards or 66 international feet.
     */
    public const EPSG_LENGTH_CHAIN = 'urn:ogc:def:uom:EPSG::9097';

    /**
     * fathom
     * = 6 feet.
     */
    public const EPSG_LENGTH_FATHOM = 'urn:ogc:def:uom:EPSG::9014';

    /**
     * foot.
     */
    public const EPSG_LENGTH_FOOT = 'urn:ogc:def:uom:EPSG::9002';

    /**
     * kilometre.
     */
    public const EPSG_LENGTH_KILOMETRE = 'urn:ogc:def:uom:EPSG::9036';

    /**
     * link
     * =1/100 international chain.
     */
    public const EPSG_LENGTH_LINK = 'urn:ogc:def:uom:EPSG::9098';

    /**
     * metre
     * SI base unit for length.
     */
    public const EPSG_LENGTH_METRE = 'urn:ogc:def:uom:EPSG::9001';

    /**
     * metre per second
     * SI coherent derived unit (standard unit) for velocity.
     */
    public const EPSG_LENGTH_METRE_PER_SECOND = 'urn:ogc:def:uom:EPSG::1026';

    /**
     * metres per year
     * Year taken to be IUGS definition of 31556925.445 seconds; see UoM code 1029.
     */
    public const EPSG_LENGTH_METRES_PER_YEAR = 'urn:ogc:def:uom:EPSG::1042';

    /**
     * millimetre.
     */
    public const EPSG_LENGTH_MILLIMETRE = 'urn:ogc:def:uom:EPSG::1025';

    /**
     * millimetres per year
     * Year taken to be IUGS definition of 31556925.445 seconds; see UoM code 1029.
     */
    public const EPSG_LENGTH_MILLIMETRES_PER_YEAR = 'urn:ogc:def:uom:EPSG::1027';

    /**
     * nautical mile.
     */
    public const EPSG_LENGTH_NAUTICAL_MILE = 'urn:ogc:def:uom:EPSG::9030';

    /**
     * yard
     * =3 international feet.
     */
    public const EPSG_LENGTH_YARD = 'urn:ogc:def:uom:EPSG::9096';

    /**
     * (bin)
     * Ordinal coordinate systems are sequential counts and are unitless; this is a placeholder.
     */
    public const EPSG_SCALE_BIN = 'urn:ogc:def:uom:EPSG::1024';

    /**
     * coefficient
     * Used when parameters are coefficients.  They inherently take the units which depend upon the term to which the
     * coefficient applies.
     */
    public const EPSG_SCALE_COEFFICIENT = 'urn:ogc:def:uom:EPSG::9203';

    /**
     * parts per billion
     * Billion is internationally ambiguous, in different languages being 1E+9 and 1E+12. One billion taken here to be
     * 1E+9.
     */
    public const EPSG_SCALE_PARTS_PER_BILLION = 'urn:ogc:def:uom:EPSG::1028';

    /**
     * parts per billion per year
     * Year taken to be IUGS definition of 31556925.445 seconds; see UoM code 1029. Billion is internationally
     * ambiguous, in different languages being 1E+9 and 1E+12. One billion taken here to be 1E+9.
     */
    public const EPSG_SCALE_PARTS_PER_BILLION_PER_YEAR = 'urn:ogc:def:uom:EPSG::1030';

    /**
     * parts per million.
     */
    public const EPSG_SCALE_PARTS_PER_MILLION = 'urn:ogc:def:uom:EPSG::9202';

    /**
     * parts per million per year
     * Year taken to be IUGS definition of 31556925.445 seconds; see UoM code 1029.
     */
    public const EPSG_SCALE_PARTS_PER_MILLION_PER_YEAR = 'urn:ogc:def:uom:EPSG::1041';

    /**
     * unity
     * EPSG standard unit for scale. SI coherent derived unit (standard unit) for dimensionless quantity, expressed by
     * the number one but this is not explicitly shown.
     */
    public const EPSG_SCALE_UNITY = 'urn:ogc:def:uom:EPSG::9201';

    /**
     * unity per second
     * EPSG standard unit for scale rate. SI coherent derived unit (standard unit) for dimensionless quantity velocity.
     */
    public const EPSG_SCALE_UNITY_PER_SECOND = 'urn:ogc:def:uom:EPSG::1036';

    /**
     * second
     * SI base unit for time. Not to be confused with the angle unit arc-second.
     */
    public const EPSG_TIME_SECOND = 'urn:ogc:def:uom:EPSG::1040';

    /**
     * year.
     */
    public const EPSG_TIME_YEAR = 'urn:ogc:def:uom:EPSG::1029';

    public function getValue(): float;

    public function getFormattedValue(): string;

    public function getUnitName(): string;
}
