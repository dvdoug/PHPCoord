<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\UnitOfMeasure;

interface UnitOfMeasureIds
{
    public const EPSG_ANGLE_ARC_MINUTE = 9103;

    public const EPSG_ANGLE_ARC_SECOND = 9104;

    public const EPSG_ANGLE_ARC_SECONDS_PER_YEAR = 1043;

    public const EPSG_ANGLE_CENTESIMAL_MINUTE = 9112;

    public const EPSG_ANGLE_CENTESIMAL_SECOND = 9113;

    public const EPSG_ANGLE_DEGREE = 9102;

    public const EPSG_ANGLE_DEGREE_SUPPLIER_TO_DEFINE_REPRESENTATION = 9122;

    public const EPSG_ANGLE_DEGREE_HEMISPHERE = 9116;

    public const EPSG_ANGLE_DEGREE_MINUTE = 9115;

    public const EPSG_ANGLE_DEGREE_MINUTE_HEMISPHERE = 9118;

    public const EPSG_ANGLE_DEGREE_MINUTE_SECOND = 9107;

    public const EPSG_ANGLE_DEGREE_MINUTE_SECOND_HEMISPHERE = 9108;

    /** @deprecated */
    public const EPSG_ANGLE_GON = 9106;

    public const EPSG_ANGLE_GRAD = 9105;

    public const EPSG_ANGLE_HEMISPHERE_DEGREE = 9117;

    public const EPSG_ANGLE_HEMISPHERE_DEGREE_MINUTE = 9119;

    public const EPSG_ANGLE_HEMISPHERE_DEGREE_MINUTE_SECOND = 9120;

    public const EPSG_ANGLE_MICRORADIAN = 9109;

    public const EPSG_ANGLE_MIL_6400 = 9114;

    public const EPSG_ANGLE_MILLIARC_SECOND = 1031;

    public const EPSG_ANGLE_MILLIARC_SECONDS_PER_YEAR = 1032;

    public const EPSG_ANGLE_RADIAN = 9101;

    public const EPSG_ANGLE_RADIAN_PER_SECOND = 1035;

    public const EPSG_ANGLE_SEXAGESIMAL_DM = 9111;

    public const EPSG_ANGLE_SEXAGESIMAL_DMS = 9110;

    public const EPSG_ANGLE_SEXAGESIMAL_DMS_S = 9121;

    /** @deprecated */
    public const EPSG_LENGTH_BIN_WIDTH_12_5_METRES = 9209;

    /** @deprecated */
    public const EPSG_LENGTH_BIN_WIDTH_165_US_SURVEY_FEET = 9205;

    /** @deprecated */
    public const EPSG_LENGTH_BIN_WIDTH_25_METRES = 9208;

    /** @deprecated */
    public const EPSG_LENGTH_BIN_WIDTH_3_125_METRES = 9211;

    /** @deprecated */
    public const EPSG_LENGTH_BIN_WIDTH_330_US_SURVEY_FEET = 9204;

    /** @deprecated */
    public const EPSG_LENGTH_BIN_WIDTH_37_5_METRES = 9207;

    /** @deprecated */
    public const EPSG_LENGTH_BIN_WIDTH_6_25_METRES = 9210;

    /** @deprecated */
    public const EPSG_LENGTH_BIN_WIDTH_82_5_US_SURVEY_FEET = 9206;

    public const EPSG_LENGTH_BRITISH_CHAIN_BENOIT_1895_A = 9052;

    public const EPSG_LENGTH_BRITISH_CHAIN_BENOIT_1895_B = 9062;

    public const EPSG_LENGTH_BRITISH_CHAIN_SEARS_1922_TRUNCATED = 9301;

    public const EPSG_LENGTH_BRITISH_CHAIN_SEARS_1922 = 9042;

    public const EPSG_LENGTH_BRITISH_FOOT_1865 = 9070;

    public const EPSG_LENGTH_BRITISH_FOOT_1936 = 9095;

    public const EPSG_LENGTH_BRITISH_FOOT_BENOIT_1895_A = 9051;

    public const EPSG_LENGTH_BRITISH_FOOT_BENOIT_1895_B = 9061;

    public const EPSG_LENGTH_BRITISH_FOOT_SEARS_1922_TRUNCATED = 9300;

    public const EPSG_LENGTH_BRITISH_FOOT_SEARS_1922 = 9041;

    public const EPSG_LENGTH_BRITISH_LINK_BENOIT_1895_A = 9053;

    public const EPSG_LENGTH_BRITISH_LINK_BENOIT_1895_B = 9063;

    public const EPSG_LENGTH_BRITISH_LINK_SEARS_1922_TRUNCATED = 9302;

    public const EPSG_LENGTH_BRITISH_LINK_SEARS_1922 = 9043;

    public const EPSG_LENGTH_BRITISH_YARD_BENOIT_1895_A = 9050;

    public const EPSG_LENGTH_BRITISH_YARD_BENOIT_1895_B = 9060;

    public const EPSG_LENGTH_BRITISH_YARD_SEARS_1922_TRUNCATED = 9099;

    public const EPSG_LENGTH_BRITISH_YARD_SEARS_1922 = 9040;

    public const EPSG_LENGTH_CLARKE_S_CHAIN = 9038;

    public const EPSG_LENGTH_CLARKE_S_FOOT = 9005;

    public const EPSG_LENGTH_CLARKE_S_LINK = 9039;

    public const EPSG_LENGTH_CLARKE_S_YARD = 9037;

    public const EPSG_LENGTH_GERMAN_LEGAL_METRE = 9031;

    public const EPSG_LENGTH_GOLD_COAST_FOOT = 9094;

    public const EPSG_LENGTH_INDIAN_FOOT = 9080;

    public const EPSG_LENGTH_INDIAN_FOOT_1937 = 9081;

    public const EPSG_LENGTH_INDIAN_FOOT_1962 = 9082;

    public const EPSG_LENGTH_INDIAN_FOOT_1975 = 9083;

    public const EPSG_LENGTH_INDIAN_YARD = 9084;

    public const EPSG_LENGTH_INDIAN_YARD_1937 = 9085;

    public const EPSG_LENGTH_INDIAN_YARD_1962 = 9086;

    public const EPSG_LENGTH_INDIAN_YARD_1975 = 9087;

    public const EPSG_LENGTH_STATUTE_MILE = 9093;

    public const EPSG_LENGTH_US_SURVEY_CHAIN = 9033;

    public const EPSG_LENGTH_US_SURVEY_FOOT = 9003;

    public const EPSG_LENGTH_US_SURVEY_LINK = 9034;

    public const EPSG_LENGTH_US_SURVEY_MILE = 9035;

    public const EPSG_LENGTH_CENTIMETRE = 1033;

    public const EPSG_LENGTH_CENTIMETRES_PER_YEAR = 1034;

    public const EPSG_LENGTH_CHAIN = 9097;

    public const EPSG_LENGTH_FATHOM = 9014;

    public const EPSG_LENGTH_FOOT = 9002;

    public const EPSG_LENGTH_KILOMETRE = 9036;

    public const EPSG_LENGTH_LINK = 9098;

    public const EPSG_LENGTH_METRE = 9001;

    public const EPSG_LENGTH_METRE_PER_SECOND = 1026;

    public const EPSG_LENGTH_METRES_PER_YEAR = 1042;

    public const EPSG_LENGTH_MILLIMETRE = 1025;

    public const EPSG_LENGTH_MILLIMETRES_PER_YEAR = 1027;

    public const EPSG_LENGTH_NAUTICAL_MILE = 9030;

    public const EPSG_LENGTH_YARD = 9096;

    /** @deprecated */
    public const EPSG_SCALE_BIN = 1024;

    public const EPSG_SCALE_COEFFICIENT = 9203;

    public const EPSG_SCALE_PARTS_PER_BILLION = 1028;

    public const EPSG_SCALE_PARTS_PER_BILLION_PER_YEAR = 1030;

    public const EPSG_SCALE_PARTS_PER_MILLION = 9202;

    public const EPSG_SCALE_PARTS_PER_MILLION_PER_YEAR = 1041;

    public const EPSG_SCALE_UNITY = 9201;

    public const EPSG_SCALE_UNITY_PER_SECOND = 1036;

    public const EPSG_TIME_SECOND = 1040;

    public const EPSG_TIME_YEAR = 1029;
}
