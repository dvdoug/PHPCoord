<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\UnitOfMeasure;

/**
 * THIS FILE IS AUTO-GENERATED.
 */
interface UnitOfMeasureIds
{
    /**
     * 1/60th degree = ((pi/180) / 60) radians.
     */
    public const EPSG_ANGLE_ARC_MINUTE = 9103;

    /**
     * 1/60th arc-minute = ((pi/180) / 3600) radians.
     */
    public const EPSG_ANGLE_ARC_SECOND = 9104;

    /**
     * =((pi/180) / 3600) radians per year. Year taken to be IUGS definition of 31556925.445 seconds; see UoM code
     * 1029.
     */
    public const EPSG_ANGLE_ARC_SECONDS_PER_YEAR = 1043;

    /**
     * 1/100 of a grad and gon = ((pi/200) / 100) radians.
     */
    public const EPSG_ANGLE_CENTESIMAL_MINUTE = 9112;

    /**
     * 1/100 of a centesimal minute or 1/10,000th of a grad and gon = ((pi/200) / 10000) radians.
     */
    public const EPSG_ANGLE_CENTESIMAL_SECOND = 9113;

    /**
     * = pi/180 radians.
     */
    public const EPSG_ANGLE_DEGREE = 9102;

    /**
     * = pi/180 radians. The degree representation (e.g. decimal, DMSH, etc.) must be clarified by suppliers of data
     * associated with this code.
     */
    public const EPSG_ANGLE_DEGREE_SUPPLIER_TO_DEFINE_REPRESENTATION = 9122;

    /**
     * Degree representation. Format: degrees (real, any precision) - hemisphere abbreviation (single character N S E
     * or W). Convert to degrees using algorithm.
     */
    public const EPSG_ANGLE_DEGREE_HEMISPHERE = 9116;

    /**
     * Degree representation. Format: signed degrees (integer)  - arc-minutes (real, any precision). Different symbol
     * sets are in use as field separators, for example º '. Convert to degrees using algorithm.
     */
    public const EPSG_ANGLE_DEGREE_MINUTE = 9115;

    /**
     * Degree representation. Format: degrees (integer) - arc-minutes (real, any precision) - hemisphere abbreviation
     * (single character N S E or W). Different symbol sets are in use as field separators, for example º '. Convert
     * to degrees using algorithm.
     */
    public const EPSG_ANGLE_DEGREE_MINUTE_HEMISPHERE = 9118;

    /**
     * Degree representation. Format: signed degrees (integer) - arc-minutes (integer) - arc-seconds (real, any
     * precision). Different symbol sets are in use as field separators, for example º ' ". Convert to degrees using
     * algorithm.
     */
    public const EPSG_ANGLE_DEGREE_MINUTE_SECOND = 9107;

    /**
     * Degree representation. Format: degrees (integer) - arc-minutes (integer) - arc-seconds (real) - hemisphere
     * abbreviation (single character N S E or W). Different symbol sets are in use as field separators for example º
     * ' ". Convert to deg using algorithm.
     */
    public const EPSG_ANGLE_DEGREE_MINUTE_SECOND_HEMISPHERE = 9108;

    /**
     * =pi/200 radians.
     */
    public const EPSG_ANGLE_GRAD = 9105;

    /**
     * Degree representation. Format: hemisphere abbreviation (single character N S E or W) - degrees (real, any
     * precision). Convert to degrees using algorithm.
     */
    public const EPSG_ANGLE_HEMISPHERE_DEGREE = 9117;

    /**
     * Degree representation. Format:  hemisphere abbreviation (single character N S E or W) - degrees (integer) -
     * arc-minutes (real, any precision). Different symbol sets are in use as field separators, for example º '.
     * Convert to degrees using algorithm.
     */
    public const EPSG_ANGLE_HEMISPHERE_DEGREE_MINUTE = 9119;

    /**
     * Degree representation. Format: hemisphere abbreviation (single character N S E or W) - degrees (integer) -
     * arc-minutes (integer) - arc-seconds (real). Different symbol sets are in use as field separators for example º
     * ' ". Convert to deg using algorithm.
     */
    public const EPSG_ANGLE_HEMISPHERE_DEGREE_MINUTE_SECOND = 9120;

    /**
     * rad * 10E-6.
     */
    public const EPSG_ANGLE_MICRORADIAN = 9109;

    /**
     * Angle subtended by 1/6400 part of a circle.  Approximates to 1/1000th radian.  Note that other approximations
     * (notably 1/6300 circle and 1/6000 circle) also exist.
     */
    public const EPSG_ANGLE_MIL_6400 = 9114;

    /**
     * = ((pi/180) / 3600 / 1000) radians.
     */
    public const EPSG_ANGLE_MILLIARC_SECOND = 1031;

    /**
     * = ((pi/180) / 3600 / 1000) radians per year. Year taken to be IUGS definition of 31556925.445 seconds; see UoM
     * code 1029.
     */
    public const EPSG_ANGLE_MILLIARC_SECONDS_PER_YEAR = 1032;

    /**
     * SI coherent derived unit (standard unit) for plane angle.
     */
    public const EPSG_ANGLE_RADIAN = 9101;

    /**
     * SI coherent derived unit (standard unit) for angular velocity.
     */
    public const EPSG_ANGLE_RADIAN_PER_SECOND = 1035;

    /**
     * Pseudo unit. Format: signed degrees - period - integer minutes (2 digits) - fraction of minutes (any precision).
     * Must include leading zero in minutes and exclude decimal point for minutes. Convert to degree using algorithm.
     */
    public const EPSG_ANGLE_SEXAGESIMAL_DM = 9111;

    /**
     * Pseudo unit. Format: signed degrees - period - minutes (2 digits) - integer seconds (2 digits) - fraction of
     * seconds (any precision). Must include leading zero in minutes and seconds and exclude decimal point for seconds.
     * Convert to deg using algorithm.
     */
    public const EPSG_ANGLE_SEXAGESIMAL_DMS = 9110;

    /**
     * Pseudo unit. Format: signed degrees - minutes (2 digits) - integer seconds (2 digits) - period - fraction of
     * seconds (any precision). Must include leading zero in minutes and seconds and include decimal point for seconds.
     * Convert to deg using algorithm.
     */
    public const EPSG_ANGLE_SEXAGESIMAL_DMS_S = 9121;

    /**
     * Uses Benoit's 1895 British yard-metre ratio as given by Clark as 0.9143992 metres per yard.  Used for deriving
     * metric size of ellipsoid in Palestine.
     */
    public const EPSG_LENGTH_BRITISH_CHAIN_BENOIT_1895_A = 9052;

    /**
     * Uses Benoit's 1895 British yard-metre ratio as given by Bomford as 39.370113 inches per metre.  Used in West
     * Malaysian mapping.
     */
    public const EPSG_LENGTH_BRITISH_CHAIN_BENOIT_1895_B = 9062;

    /**
     * Uses Sear's 1922 British yard-metre ratio (UoM code 9040) truncated to 6 significant figures; this truncated
     * ratio (0.914398, UoM code 9099) then converted to other imperial units. 1 chSe(T) = 22 ydSe(T). Used in
     * metrication of Malaya RSO grid.
     */
    public const EPSG_LENGTH_BRITISH_CHAIN_SEARS_1922_TRUNCATED = 9301;

    /**
     * Uses Sear's 1922 British yard-metre ratio as given by Bomford as 39.370147 inches per metre.  Used in East
     * Malaysian and older New Zealand mapping.
     */
    public const EPSG_LENGTH_BRITISH_CHAIN_SEARS_1922 = 9042;

    /**
     * Uses Clark's estimate of 1853-1865 British foot-metre ratio of 0.9144025 metres per yard.  Used in 1962 and 1975
     * estimates of Indian foot.
     */
    public const EPSG_LENGTH_BRITISH_FOOT_1865 = 9070;

    /**
     * For the 1936 retriangulation OSGB defines the relationship of 10 feet of 1796 to the International metre through
     * the logarithmic relationship (10^0.48401603 exactly). 1 ft = 0.3048007491…m. Also used for metric conversions
     * in Ireland.
     */
    public const EPSG_LENGTH_BRITISH_FOOT_1936 = 9095;

    /**
     * Uses Benoit's 1895 British yard-metre ratio as given by Clark as 0.9143992 metres per yard.  Used for deriving
     * metric size of ellipsoid in Palestine.
     */
    public const EPSG_LENGTH_BRITISH_FOOT_BENOIT_1895_A = 9051;

    /**
     * Uses Benoit's 1895 British yard-metre ratio as given by Bomford as 39.370113 inches per metre.  Used in West
     * Malaysian mapping.
     */
    public const EPSG_LENGTH_BRITISH_FOOT_BENOIT_1895_B = 9061;

    /**
     * Uses Sear's 1922 British yard-metre ratio (UoM code 9040) truncated to 6 significant figures; this truncated
     * ratio (0.914398, UoM code 9099) then converted to other imperial units. 3 ftSe(T) = 1 ydSe(T).
     */
    public const EPSG_LENGTH_BRITISH_FOOT_SEARS_1922_TRUNCATED = 9300;

    /**
     * Uses Sear's 1922 British yard-metre ratio as given by Bomford as 39.370147 inches per metre.  Used in East
     * Malaysian and older New Zealand mapping.
     */
    public const EPSG_LENGTH_BRITISH_FOOT_SEARS_1922 = 9041;

    /**
     * Uses Benoit's 1895 British yard-metre ratio as given by Clark as 0.9143992 metres per yard.  Used for deriving
     * metric size of ellipsoid in Palestine.
     */
    public const EPSG_LENGTH_BRITISH_LINK_BENOIT_1895_A = 9053;

    /**
     * Uses Benoit's 1895 British yard-metre ratio as given by Bomford as 39.370113 inches per metre.  Used in West
     * Malaysian mapping.
     */
    public const EPSG_LENGTH_BRITISH_LINK_BENOIT_1895_B = 9063;

    /**
     * Uses Sear's 1922 British yard-metre ratio (UoM code 9040) truncated to 6 significant figures; this truncated
     * ratio (0.914398, UoM code 9099) then converted to other imperial units. 100 lkSe(T) = 1 chSe(T).
     */
    public const EPSG_LENGTH_BRITISH_LINK_SEARS_1922_TRUNCATED = 9302;

    /**
     * Uses Sear's 1922 British yard-metre ratio as given by Bomford as 39.370147 inches per metre.  Used in East
     * Malaysian and older New Zealand mapping.
     */
    public const EPSG_LENGTH_BRITISH_LINK_SEARS_1922 = 9043;

    /**
     * Uses Benoit's 1895 British yard-metre ratio as given by Clark as 0.9143992 metres per yard.  Used for deriving
     * metric size of ellipsoid in Palestine.
     */
    public const EPSG_LENGTH_BRITISH_YARD_BENOIT_1895_A = 9050;

    /**
     * G. Bomford "Geodesy" 2nd edition 1962; after J.S.Clark "Remeasurement of the Old Length Standards"; Empire
     * Survey Review no. 90; 1953.
     */
    public const EPSG_LENGTH_BRITISH_YARD_BENOIT_1895_B = 9060;

    /**
     * Uses Sear's 1922 British yard-metre ratio (UoM code 9040) truncated to 6 significant figures.
     */
    public const EPSG_LENGTH_BRITISH_YARD_SEARS_1922_TRUNCATED = 9099;

    /**
     * Uses Sear's 1922 British yard-metre ratio as given by Bomford as 39.370147 inches per metre.  Used in East
     * Malaysian and older New Zealand mapping.
     */
    public const EPSG_LENGTH_BRITISH_YARD_SEARS_1922 = 9040;

    /**
     * =22 Clarke's yards.  Assumes Clarke's 1865 ratio of 1 British foot = 0.3047972654 French legal metres applies to
     * the international metre.   Used in older Australian, southern African & British West Indian mapping.
     */
    public const EPSG_LENGTH_CLARKE_S_CHAIN = 9038;

    /**
     * Assumes Clarke's 1865 ratio of 1 British foot = 0.3047972654 French legal metres applies to the international
     * metre.   Used in older Australian, southern African & British West Indian mapping.
     */
    public const EPSG_LENGTH_CLARKE_S_FOOT = 9005;

    /**
     * =1/100 Clarke's chain. Assumes Clarke's 1865 ratio of 1 British foot = 0.3047972654 French legal metres applies
     * to the international metre.   Used in older Australian, southern African & British West Indian mapping.
     */
    public const EPSG_LENGTH_CLARKE_S_LINK = 9039;

    /**
     * =3 Clarke's feet.  Assumes Clarke's 1865 ratio of 1 British foot = 0.3047972654 French legal metres applies to
     * the international metre.   Used in older Australian, southern African & British West Indian mapping.
     */
    public const EPSG_LENGTH_CLARKE_S_YARD = 9037;

    /**
     * Used in Namibia.
     */
    public const EPSG_LENGTH_GERMAN_LEGAL_METRE = 9031;

    /**
     * Used in Ghana and some adjacent parts of British west Africa prior to metrication, except for the metrication of
     * projection defining parameters when British foot (Sears 1922) used.
     */
    public const EPSG_LENGTH_GOLD_COAST_FOOT = 9094;

    /**
     * Indian Foot = 0.99999566 British feet (A.R.Clarke 1865).  British yard (= 3 British feet) taken to be
     * J.S.Clark's 1865 value of 0.9144025 metres.
     */
    public const EPSG_LENGTH_INDIAN_FOOT = 9080;

    /**
     * Indian Foot = 0.99999566 British feet (A.R.Clarke 1865).  British foot taken to be 1895 Benoit value of
     * 12/39.370113m.  Rounded to 8 decimal places as 0.30479841. Used from Bangladesh to Vietnam.  Previously used in
     * India and Pakistan but superseded.
     */
    public const EPSG_LENGTH_INDIAN_FOOT_1937 = 9081;

    /**
     * Indian Foot = 0.99999566 British feet (A.R.Clarke 1865).  British yard (3 feet) taken to be J.S. Clark's 1865
     * value of 0.9144025m. Rounded to 7 significant figures with a small error as 1 Ind ft=0.3047996m.  Used in
     * Pakistan since metrication.
     */
    public const EPSG_LENGTH_INDIAN_FOOT_1962 = 9082;

    /**
     * Indian Foot = 0.99999566 British feet (A.R.Clarke 1865).  British yard (3 feet) taken to be J.S. Clark's 1865
     * value of 0.9144025m. Rounded to 7 significant figures as 1 Ind ft=0.3047995m.  Used in India since metrication.
     */
    public const EPSG_LENGTH_INDIAN_FOOT_1975 = 9083;

    /**
     * Indian Foot = 0.99999566 British feet (A.R.Clarke 1865).  British yard (= 3 British feet) taken to be
     * J.S.Clark's 1865 value of 0.9144025 metres.
     */
    public const EPSG_LENGTH_INDIAN_YARD = 9084;

    /**
     * Indian Foot = 0.99999566 British feet (A.R.Clarke 1865).  British foot taken to be 1895 Benoit value of
     * 12/39.370113m.  Rounded to 8 decimal places as 0.30479841. Used from Bangladesh to Vietnam.  Previously used in
     * India and Pakistan but superseded.
     */
    public const EPSG_LENGTH_INDIAN_YARD_1937 = 9085;

    /**
     * Indian Foot = 0.99999566 British feet (A.R.Clarke 1865).  British yard (3 feet) taken to be J.S. Clark's 1865
     * value of 0.9144025m. Rounded to 7 significant figures with a small error as 1 Ind ft=0.3047996m.  Used in
     * Pakistan since metrication.
     */
    public const EPSG_LENGTH_INDIAN_YARD_1962 = 9086;

    /**
     * Indian Foot = 0.99999566 British feet (A.R.Clarke 1865).  British yard (3 feet) taken to be J.S. Clark's 1865
     * value of 0.9144025m. Rounded to 7 significant figures as 1 Ind ft=0.3047995m.  Used in India since metrication.
     */
    public const EPSG_LENGTH_INDIAN_YARD_1975 = 9087;

    /**
     * =5280 feet.
     */
    public const EPSG_LENGTH_STATUTE_MILE = 9093;

    /**
     * Used in USA primarily for public lands cadastral work.
     */
    public const EPSG_LENGTH_US_SURVEY_CHAIN = 9033;

    /**
     * Used in USA.
     */
    public const EPSG_LENGTH_US_SURVEY_FOOT = 9003;

    /**
     * Used in USA primarily for public lands cadastral work.
     */
    public const EPSG_LENGTH_US_SURVEY_LINK = 9034;

    /**
     * Used in USA primarily for public lands cadastral work.
     */
    public const EPSG_LENGTH_US_SURVEY_MILE = 9035;

    public const EPSG_LENGTH_CENTIMETRE = 1033;

    /**
     * Year taken to be IUGS definition of 31556925.445 seconds; see UoM code 1029.
     */
    public const EPSG_LENGTH_CENTIMETRES_PER_YEAR = 1034;

    /**
     * =22 international yards or 66 international feet.
     */
    public const EPSG_LENGTH_CHAIN = 9097;

    /**
     * = 6 feet.
     */
    public const EPSG_LENGTH_FATHOM = 9014;

    public const EPSG_LENGTH_FOOT = 9002;

    public const EPSG_LENGTH_KILOMETRE = 9036;

    /**
     * =1/100 international chain.
     */
    public const EPSG_LENGTH_LINK = 9098;

    /**
     * SI base unit for length.
     */
    public const EPSG_LENGTH_METRE = 9001;

    /**
     * SI coherent derived unit (standard unit) for velocity.
     */
    public const EPSG_LENGTH_METRE_PER_SECOND = 1026;

    /**
     * Year taken to be IUGS definition of 31556925.445 seconds; see UoM code 1029.
     */
    public const EPSG_LENGTH_METRES_PER_YEAR = 1042;

    public const EPSG_LENGTH_MILLIMETRE = 1025;

    /**
     * Year taken to be IUGS definition of 31556925.445 seconds; see UoM code 1029.
     */
    public const EPSG_LENGTH_MILLIMETRES_PER_YEAR = 1027;

    public const EPSG_LENGTH_NAUTICAL_MILE = 9030;

    /**
     * =3 international feet.
     */
    public const EPSG_LENGTH_YARD = 9096;

    /**
     * Ordinal coordinate systems are sequential counts and are unitless; this is a placeholder.
     */
    public const EPSG_SCALE_BIN = 1024;

    /**
     * Used when parameters are coefficients.  They inherently take the units which depend upon the term to which the
     * coefficient applies.
     */
    public const EPSG_SCALE_COEFFICIENT = 9203;

    /**
     * Billion is internationally ambiguous, in different languages being 1E+9 and 1E+12. One billion taken here to be
     * 1E+9.
     */
    public const EPSG_SCALE_PARTS_PER_BILLION = 1028;

    /**
     * Year taken to be IUGS definition of 31556925.445 seconds; see UoM code 1029. Billion is internationally
     * ambiguous, in different languages being 1E+9 and 1E+12. One billion taken here to be 1E+9.
     */
    public const EPSG_SCALE_PARTS_PER_BILLION_PER_YEAR = 1030;

    public const EPSG_SCALE_PARTS_PER_MILLION = 9202;

    /**
     * Year taken to be IUGS definition of 31556925.445 seconds; see UoM code 1029.
     */
    public const EPSG_SCALE_PARTS_PER_MILLION_PER_YEAR = 1041;

    /**
     * EPSG standard unit for scale. SI coherent derived unit (standard unit) for dimensionless quantity, expressed by
     * the number one but this is not explicitly shown.
     */
    public const EPSG_SCALE_UNITY = 9201;

    /**
     * EPSG standard unit for scale rate. SI coherent derived unit (standard unit) for dimensionless quantity velocity.
     */
    public const EPSG_SCALE_UNITY_PER_SECOND = 1036;

    /**
     * SI base unit for time. Not to be confused with the angle unit arc-second.
     */
    public const EPSG_TIME_SECOND = 1040;

    public const EPSG_TIME_YEAR = 1029;
}
