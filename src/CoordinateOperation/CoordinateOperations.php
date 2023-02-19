<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\CoordinateOperation;

use PHPCoord\Exception\UnknownCoordinateOperationException;
use PHPCoord\Geometry\BoundingArea;

use function str_replace;

class CoordinateOperations
{
    protected static array $sridData = [
        'urn:ogc:def:coordinateOperation:EPSG::1027' => [
            'name' => 'Madrid 1870 (Madrid) to ED50 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9617',
            'extent' => ['2367'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1028' => [
            'name' => 'Madrid 1870 (Madrid) to ED50 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9617',
            'extent' => ['2368'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1041' => [
            'name' => 'TM75 to ETRS89 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9648',
            'extent' => ['1305'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1057' => [
            'name' => 'Ain el Abd to WGS 84 (5)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent' => ['2956'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1058' => [
            'name' => 'Ain el Abd to WGS 84 (6)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent' => ['2957'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1059' => [
            'name' => 'KOC to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3267'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1060' => [
            'name' => 'NGN to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3267'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1062' => [
            'name' => 'Kudams to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent' => ['1310'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1063' => [
            'name' => 'Vientiane 1982 to Lao 1997 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1138'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1064' => [
            'name' => 'Lao 1993 to Lao 1997 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1138'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1065' => [
            'name' => 'Lao 1997 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1138'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1070' => [
            'name' => 'Guam 1963 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3255'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1071' => [
            'name' => 'Palestine 1923 to Israel 1993 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['2603'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1074' => [
            'name' => 'Palestine 1923 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent' => ['2603'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1080' => [
            'name' => 'CI1971 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['2889'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1082' => [
            'name' => 'CI1979 to NZGD2000 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent' => ['2889'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1087' => [
            'name' => 'ED50 to WGS 84 (37)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1130'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1095' => [
            'name' => 'PSAD56 to WGS 84 (13)',
            'method' => 'urn:ogc:def:method:EPSG::9636',
            'extent' => ['3327'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1096' => [
            'name' => 'La Canoa to WGS 84 (13)',
            'method' => 'urn:ogc:def:method:EPSG::9636',
            'extent' => ['3327'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1098' => [
            'name' => 'IGM95 to ETRS89 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3343'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1100' => [
            'name' => 'Adindan to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1271'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1101' => [
            'name' => 'Adindan to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1057'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1102' => [
            'name' => 'Adindan to WGS 84 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3226'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1103' => [
            'name' => 'Adindan to WGS 84 (4)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1091'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1104' => [
            'name' => 'Adindan to WGS 84 (5)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1153'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1105' => [
            'name' => 'Adindan to WGS 84 (6)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3304'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1106' => [
            'name' => 'Adindan to WGS 84 (7)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3311'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1107' => [
            'name' => 'Afgooye to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3308'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1110' => [
            'name' => 'Ain el Abd to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3943'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1111' => [
            'name' => 'Ain el Abd to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3303'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1114' => [
            'name' => 'Arc 1950 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1051'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1116' => [
            'name' => 'Arc 1950 to WGS 84 (4)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1141'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1117' => [
            'name' => 'Arc 1950 to WGS 84 (5)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1150'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1118' => [
            'name' => 'Arc 1950 to WGS 84 (6)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1224'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1120' => [
            'name' => 'Arc 1950 to WGS 84 (8)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1260'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1122' => [
            'name' => 'Arc 1960 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['2311'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1126' => [
            'name' => 'Bukit Rimpah to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1287'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1129' => [
            'name' => 'Cape to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3309'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1130' => [
            'name' => 'Carthage to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1236'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1132' => [
            'name' => 'Corrego Alegre 1970-72 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1293'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1133' => [
            'name' => 'ED50 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['2420'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1134' => [
            'name' => 'ED50 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['2421'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1135' => [
            'name' => 'ED50 to WGS 84 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['2345'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1136' => [
            'name' => 'ED50 to WGS 84 (4)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1078'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1137' => [
            'name' => 'ED50 to WGS 84 (5)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['2595'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1138' => [
            'name' => 'ED50 to WGS 84 (6)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['2343'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1139' => [
            'name' => 'ED50 to WGS 84 (7)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['2344'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1140' => [
            'name' => 'ED50 to WGS 84 (8)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3254'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1141' => [
            'name' => 'ED50(ED77) to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1123'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1142' => [
            'name' => 'ED50 to WGS 84 (10)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['2339'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1143' => [
            'name' => 'ED50 to WGS 84 (11)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['2340'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1144' => [
            'name' => 'ED50 to WGS 84 (12)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3275'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1145' => [
            'name' => 'ED50 to WGS 84 (13)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['2338'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1146' => [
            'name' => 'ED87 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent' => ['2330'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1147' => [
            'name' => 'ED50 to ED87 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent' => ['2332'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1149' => [
            'name' => 'ETRS89 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1298'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1151' => [
            'name' => 'NZGD49 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3285'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1152' => [
            'name' => 'Hu Tzu Shan 1950 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3315'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1153' => [
            'name' => 'Indian 1954 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3317'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1155' => [
            'name' => 'Kalianpur 1937 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3217'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1157' => [
            'name' => 'Kandawala to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3310'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1158' => [
            'name' => 'Kertau 1968 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['4223'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1159' => [
            'name' => 'Leigon to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1104'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1160' => [
            'name' => 'Liberia 1964 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3270'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1161' => [
            'name' => 'Luzon 1911 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['2364'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1162' => [
            'name' => 'Luzon 1911 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['2365'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1164' => [
            'name' => 'Mahe 1971 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['2369'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1165' => [
            'name' => 'Massawa to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1089'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1166' => [
            'name' => 'Merchich to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3280'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1167' => [
            'name' => 'Minna to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3226'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1168' => [
            'name' => 'Minna to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1178'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1170' => [
            'name' => 'NAD27 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['2418'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1171' => [
            'name' => 'NAD27 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['2419'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1172' => [
            'name' => 'NAD27 to WGS 84 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['4517'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1173' => [
            'name' => 'NAD27 to WGS 84 (4)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1323'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1174' => [
            'name' => 'NAD27 to WGS 84 (5)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['2389'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1175' => [
            'name' => 'NAD27 to WGS 84 (6)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['2390'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1176' => [
            'name' => 'NAD27 to WGS 84 (7)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['2412'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1177' => [
            'name' => 'NAD27 to WGS 84 (8)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['2413'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1178' => [
            'name' => 'NAD27 to WGS 84 (9)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['2414'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1179' => [
            'name' => 'NAD27 to WGS 84 (10)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['2384'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1180' => [
            'name' => 'NAD27 to WGS 84 (11)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['2415'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1181' => [
            'name' => 'NAD27 to WGS 84 (12)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['2416'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1182' => [
            'name' => 'NAD27 to WGS 84 (13)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['2410'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1183' => [
            'name' => 'NAD27 to WGS 84 (14)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['2417'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1184' => [
            'name' => 'NAD27 to WGS 84 (15)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['2385'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1185' => [
            'name' => 'NAD27 to WGS 84 (16)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3235'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1186' => [
            'name' => 'NAD27 to WGS 84 (17)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['2386'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1187' => [
            'name' => 'NAD27 to WGS 84 (18)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3278'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1188' => [
            'name' => 'NAD83 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1325'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1190' => [
            'name' => 'Nahrwan 1967 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3968'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1191' => [
            'name' => 'Nahrwan 1967 to WGS 84 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1243'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1194' => [
            'name' => 'MGI to WGS 84 (8)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent' => ['1543'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1200' => [
            'name' => 'Pointe Noire to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1072'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1201' => [
            'name' => 'PSAD56 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['2399'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1202' => [
            'name' => 'PSAD56 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1049'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1205' => [
            'name' => 'PSAD56 to WGS 84 (5)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3229'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1206' => [
            'name' => 'PSAD56 to WGS 84 (6)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3241'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1207' => [
            'name' => 'PSAD56 to WGS 84 (7)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1114'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1208' => [
            'name' => 'PSAD56 to WGS 84 (8)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3292'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1209' => [
            'name' => 'PSAD56 to WGS 84 (9)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3327'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1210' => [
            'name' => 'POSGAR 94 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1033'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1225' => [
            'name' => 'Sapper Hill 1943 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['2355'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1231' => [
            'name' => 'Tokyo to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3995'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1233' => [
            'name' => 'Tokyo to WGS 84 (4)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['2408'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1235' => [
            'name' => 'Zanderij to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1222'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1237' => [
            'name' => 'WGS 72 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1238' => [
            'name' => 'WGS 72 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1239' => [
            'name' => 'WGS 72BE to WGS 72 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1240' => [
            'name' => 'WGS 72BE to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1244' => [
            'name' => 'PZ-90 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent' => ['1198'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1245' => [
            'name' => 'ED50 to WGS 84 (16)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1236'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1246' => [
            'name' => 'Herat North to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1024'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1249' => [
            'name' => 'NAD27 to WGS 84 (21)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['2387'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1250' => [
            'name' => 'NAD27 to WGS 84 (22)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['2388'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1251' => [
            'name' => 'NAD83 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['2157'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1252' => [
            'name' => 'NAD83 to WGS 84 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3883'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1254' => [
            'name' => 'Pulkovo 1942 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3296'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1257' => [
            'name' => 'Pulkovo 1995 to PZ-90 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1198'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1260' => [
            'name' => 'Makassar (Jakarta) to Makassar (1)',
            'method' => 'urn:ogc:def:method:EPSG::9601',
            'extent' => ['1316'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1262' => [
            'name' => 'Monte Mario (Rome) to Monte Mario (1)',
            'method' => 'urn:ogc:def:method:EPSG::9601',
            'extent' => ['3343'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1264' => [
            'name' => 'BD50 (Brussels) to BD50 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9601',
            'extent' => ['1347'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1265' => [
            'name' => 'Tananarive (Paris) to Tananarive (1)',
            'method' => 'urn:ogc:def:method:EPSG::9601',
            'extent' => ['3273'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1266' => [
            'name' => 'Voirol 1875 (Paris) to Voirol 1875 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9601',
            'extent' => ['1365'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1271' => [
            'name' => 'Schwarzeck to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1169'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1272' => [
            'name' => 'GGRS87 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3254'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1274' => [
            'name' => 'Pulkovo 1942 to LKS94 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent' => ['3272'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1276' => [
            'name' => 'NTF to ED50 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3694'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1278' => [
            'name' => 'AGD66 to GDA94 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['2575'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1280' => [
            'name' => 'AGD84 to GDA94 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent' => ['2576'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1284' => [
            'name' => 'Arc 1960 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3264'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1285' => [
            'name' => 'Arc 1960 to WGS 84 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3316'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1290' => [
            'name' => 'Pulkovo 1942 to WGS 84 (6)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3268'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1291' => [
            'name' => 'Pulkovo 1942 to WGS 84 (7)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1131'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1294' => [
            'name' => 'Voirol 1875 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1365'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1296' => [
            'name' => 'Trinidad 1903 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1339'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1298' => [
            'name' => 'Tete to Moznet (2)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent' => ['2350'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1299' => [
            'name' => 'Tete to Moznet (3)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent' => ['2351'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1300' => [
            'name' => 'Tete to Moznet (4)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent' => ['2352'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1301' => [
            'name' => 'Tete to Moznet (5)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent' => ['2353'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1302' => [
            'name' => 'Moznet to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent' => ['1167'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1303' => [
            'name' => 'Pulkovo 1942 to WGS 84 (10)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent' => ['2405'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1304' => [
            'name' => 'Indian 1975 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3741'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1305' => [
            'name' => 'Tokyo to WGS 84 (5)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3266'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1307' => [
            'name' => 'Naparima 1972 to WGS 84 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1322'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1311' => [
            'name' => 'ED50 to WGS 84 (18)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent' => ['2342'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1313' => [
            'name' => 'NAD27 to NAD83 (4)',
            'method' => 'urn:ogc:def:method:EPSG::9615',
            'extent' => ['4517'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1314' => [
            'name' => 'OSGB36 to WGS 84 (6)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent' => ['1264'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1317' => [
            'name' => 'Camacupa 1948 to WGS 72BE (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1604'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1331' => [
            'name' => 'EST92 to ETRS89 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent' => ['3246'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1332' => [
            'name' => 'Pulkovo 1942 to EST92 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent' => ['3246'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1334' => [
            'name' => 'Pulkovo 1942 to WGS 84 (12)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent' => ['3246'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1439' => [
            'name' => 'PSD93 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent' => ['3288'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1440' => [
            'name' => 'ED50 to WGS 84 (19)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3254'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1441' => [
            'name' => 'Antigua 1943 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1273'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1442' => [
            'name' => 'Dominica 1945 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3239'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1443' => [
            'name' => 'Grenada 1953 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3118'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1444' => [
            'name' => 'Montserrat 1958 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3279'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1445' => [
            'name' => 'St. Kitts 1955 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3297'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1447' => [
            'name' => 'Anguilla 1957 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9619',
            'extent' => ['3214'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1449' => [
            'name' => 'HD72 to ETRS89 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent' => ['1119'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1460' => [
            'name' => 'AGD66 to GDA94 (4)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent' => ['2286'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1463' => [
            'name' => 'NAD27(76) to NAD83 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9615',
            'extent' => ['1367'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1469' => [
            'name' => 'Locodjo 1965 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['2282'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1470' => [
            'name' => 'Abidjan 1987 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1075'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1504' => [
            'name' => 'Cape to Hartebeesthoek94 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3309'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1505' => [
            'name' => 'Hartebeesthoek94 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['4540'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1509' => [
            'name' => 'CH1903+ to CHTRS95 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1286'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1512' => [
            'name' => 'Rassadiran to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1338'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1513' => [
            'name' => 'FD58 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['2362'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1514' => [
            'name' => 'ED50(ED77) to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent' => ['1123'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1516' => [
            'name' => 'La Canoa to WGS 84 (18)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['2363'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1517' => [
            'name' => 'Conakry 1905 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3257'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1518' => [
            'name' => 'Dabola 1981 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3257'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1527' => [
            'name' => 'Campo Inchauspe to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['2325'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1528' => [
            'name' => 'Chos Malal 1914 to Campo Inchauspe (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['2325'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1529' => [
            'name' => 'Hito XVIII to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent' => ['2357'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1530' => [
            'name' => 'NAD27 to WGS 84 (30)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1077'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1531' => [
            'name' => 'Nahrwan 1967 to WGS 84 (4)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['2392'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1532' => [
            'name' => 'M\'poraloko to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1100'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1533' => [
            'name' => 'Kalianpur 1937 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['2361'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1539' => [
            'name' => 'South Yemen to Yemen NGN96 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1340'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1540' => [
            'name' => 'Yemen NGN96 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1257'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1541' => [
            'name' => 'Indian 1960 to WGS 72BE (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1495'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1542' => [
            'name' => 'Indian 1960 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['2359'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1543' => [
            'name' => 'Indian 1960 to WGS 84 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['2360'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1544' => [
            'name' => 'Hanoi 1972 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1494'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1545' => [
            'name' => 'Egypt 1907 to WGS 72 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1086'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1547' => [
            'name' => 'Bissau to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3258'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1555' => [
            'name' => 'Naparima 1955 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3143'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1557' => [
            'name' => 'Malongo 1987 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3180'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1558' => [
            'name' => 'Korean 1995 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3266'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1560' => [
            'name' => 'Nord Sahara 1959 to WGS 72BE (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['2393'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1563' => [
            'name' => 'Qatar 1974 to WGS 84 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1346'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1565' => [
            'name' => 'NZGD2000 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1175'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1566' => [
            'name' => 'NZGD49 to NZGD2000 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3285'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1568' => [
            'name' => 'NZGD49 to NZGD2000 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9615',
            'extent' => ['3285'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1570' => [
            'name' => 'Accra to WGS 72BE (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1505'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1573' => [
            'name' => 'NAD27 to NAD83 (6)',
            'method' => 'urn:ogc:def:method:EPSG::9615',
            'extent' => ['1368'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1575' => [
            'name' => 'NAD27(CGQ77) to NAD83 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9615',
            'extent' => ['1368'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1577' => [
            'name' => 'American Samoa 1962 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3109'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1580' => [
            'name' => 'NAD83(HARN) to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1337'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1581' => [
            'name' => 'SIRGAS 1995 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3448'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1582' => [
            'name' => 'PSAD56 to WGS 84 (10)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['2400'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1583' => [
            'name' => 'PSAD56 to WGS 84 (11)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['2401'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1584' => [
            'name' => 'Deir ez Zor to WGS 72BE (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['2329'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1587' => [
            'name' => 'Deir ez Zor to WGS 84 (4)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['2328'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1588' => [
            'name' => 'ED50 to ETRS89 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent' => ['2332'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1591' => [
            'name' => 'RGF93 v1 to ETRS89 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1096'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1594' => [
            'name' => 'AGD66 to GDA94 (8)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent' => ['1282'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1595' => [
            'name' => 'AGD66 to GDA94 (9)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent' => ['2284'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1610' => [
            'name' => 'BD72 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1347'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1611' => [
            'name' => 'IRENET95 to ETRS89 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1305'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1613' => [
            'name' => 'ED50 to WGS 84 (24)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent' => ['2334'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1614' => [
            'name' => 'Sierra Leone 1968 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3306'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1616' => [
            'name' => 'PSD93 to WGS 72 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent' => ['3288'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1617' => [
            'name' => 'PSD93 to WGS 84 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent' => ['2404'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1619' => [
            'name' => 'MGI to ETRS89 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent' => ['1037'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1626' => [
            'name' => 'ED50 to ETRS89 (4)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent' => ['3237'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1628' => [
            'name' => 'ED50 to ETRS89 (5)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1105'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1630' => [
            'name' => 'ED50 to ETRS89 (6)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent' => ['2335'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1632' => [
            'name' => 'ED50 to ETRS89 (7)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent' => ['2336'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1634' => [
            'name' => 'ED50 to ETRS89 (8)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent' => ['2337'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1644' => [
            'name' => 'Pulkovo 1942(58) to ETRS89 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent' => ['3293'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1647' => [
            'name' => 'CH1903+ to ETRS89 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1286'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1648' => [
            'name' => 'EST97 to ETRS89 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1090'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1650' => [
            'name' => 'ED50 to ETRS89 (10)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1096'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1651' => [
            'name' => 'NTF to ETRS89 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3694'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1653' => [
            'name' => 'NGO 1948 to ETRS89 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent' => ['1352'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1659' => [
            'name' => 'Monte Mario to ETRS89 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent' => ['2372'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1661' => [
            'name' => 'Monte Mario to ETRS89 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent' => ['2339'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1663' => [
            'name' => 'Monte Mario to ETRS89 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent' => ['2340'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1688' => [
            'name' => 'ATS77 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9615',
            'extent' => ['1447'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1689' => [
            'name' => 'ATS77 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9615',
            'extent' => ['1533'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1690' => [
            'name' => 'NAD27(76) to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9615',
            'extent' => ['1367'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1691' => [
            'name' => 'NAD27(CGQ77) to WGS 84 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9615',
            'extent' => ['1368'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1692' => [
            'name' => 'NAD27 to WGS 84 (34)',
            'method' => 'urn:ogc:def:method:EPSG::9615',
            'extent' => ['1368'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1693' => [
            'name' => 'NAD27 to WGS 84 (33)',
            'method' => 'urn:ogc:def:method:EPSG::9615',
            'extent' => ['4517'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1696' => [
            'name' => 'NAD83 to WGS 84 (6)',
            'method' => 'urn:ogc:def:method:EPSG::9615',
            'extent' => ['1368'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1697' => [
            'name' => 'NAD83 to WGS 84 (7)',
            'method' => 'urn:ogc:def:method:EPSG::9615',
            'extent' => ['2375'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1701' => [
            'name' => 'NZGD49 to NZGD2000 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent' => ['3285'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1702' => [
            'name' => 'NAD83 to WGS 84 (8)',
            'method' => 'urn:ogc:def:method:EPSG::9615',
            'extent' => ['2376'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1703' => [
            'name' => 'NAD27 to WGS 84 (32)',
            'method' => 'urn:ogc:def:method:EPSG::9615',
            'extent' => ['2375'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1754' => [
            'name' => 'Minna to WGS 84 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent' => ['2371'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1755' => [
            'name' => 'Bogota 1975 (Bogota) to Bogota 1975 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9601',
            'extent' => ['3229'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1756' => [
            'name' => 'Lisbon (Lisbon) to Lisbon (1)',
            'method' => 'urn:ogc:def:method:EPSG::9601',
            'extent' => ['1294'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1759' => [
            'name' => 'Batavia (Jakarta) to Batavia (1)',
            'method' => 'urn:ogc:def:method:EPSG::9601',
            'extent' => ['1285'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1760' => [
            'name' => 'RT38 (Stockholm) to RT38 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9601',
            'extent' => ['3313'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1761' => [
            'name' => 'Greek (Athens) to Greek (1)',
            'method' => 'urn:ogc:def:method:EPSG::9601',
            'extent' => ['3254'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1762' => [
            'name' => 'NGO 1948 (Oslo) to NGO1948 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9601',
            'extent' => ['1352'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1763' => [
            'name' => 'NTF (Paris) to NTF (1)',
            'method' => 'urn:ogc:def:method:EPSG::9601',
            'extent' => ['3694'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1765' => [
            'name' => 'Bern 1898 (Bern) to CH1903 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9601',
            'extent' => ['1286'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1767' => [
            'name' => 'REGVEN to SIRGAS 1995 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1251'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1768' => [
            'name' => 'REGVEN to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1251'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1769' => [
            'name' => 'PSAD56 to REGVEN (1)',
            'method' => 'urn:ogc:def:method:EPSG::9636',
            'extent' => ['3327'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1771' => [
            'name' => 'La Canoa to REGVEN (1)',
            'method' => 'urn:ogc:def:method:EPSG::9636',
            'extent' => ['3327'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1773' => [
            'name' => 'POSGAR 98 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1033'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1774' => [
            'name' => 'POSGAR 98 to SIRGAS 1995 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1033'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1775' => [
            'name' => 'Pulkovo 1942(83) to ETRS89 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent' => ['1343'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1778' => [
            'name' => 'DHDN to ETRS89 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent' => ['2543'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1779' => [
            'name' => 'DHDN to ETRS89 (4)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent' => ['2542'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1780' => [
            'name' => 'DHDN to ETRS89 (5)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent' => ['2541'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1783' => [
            'name' => 'ED50 to ETRS89 (9)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent' => ['1237'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1796' => [
            'name' => 'Manoca 1962 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['2555'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1798' => [
            'name' => 'Qornoq 1927 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent' => ['3362'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1799' => [
            'name' => 'Scoresbysund 1952 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent' => ['2570'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1800' => [
            'name' => 'Ammassalik 1958 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent' => ['2571'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1802' => [
            'name' => 'Pointe Noire to WGS 84 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent' => ['2574'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1803' => [
            'name' => 'AGD66 to GDA94 (11)',
            'method' => 'urn:ogc:def:method:EPSG::9615',
            'extent' => ['2575'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1804' => [
            'name' => 'AGD84 to GDA94 (5)',
            'method' => 'urn:ogc:def:method:EPSG::9615',
            'extent' => ['2576'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1805' => [
            'name' => 'Garoua to WGS 72BE (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['2590'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1806' => [
            'name' => 'Kousseri to WGS 72BE (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['2591'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1808' => [
            'name' => 'Pulkovo 1942 to WGS 84 (14)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent' => ['2593'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1809' => [
            'name' => 'Pulkovo 1942 to WGS 84 (15)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent' => ['2594'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1810' => [
            'name' => 'ED50 to WGS 84 (31)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent' => ['2595'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1811' => [
            'name' => 'PSAD56 to WGS 84 (12)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1754'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1812' => [
            'name' => 'Indian 1975 to WGS 84 (4)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent' => ['3317'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1826' => [
            'name' => 'JGD2000 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['4163'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1828' => [
            'name' => 'Yoff to WGS 72 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1207'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1837' => [
            'name' => 'Makassar to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1316'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1838' => [
            'name' => 'Segara to WGS 84 (4)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1328'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1839' => [
            'name' => 'Beduaram to WGS 72BE (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['2771'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1840' => [
            'name' => 'QND95 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent' => ['1346'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1842' => [
            'name' => 'NAD83(CSRS) to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1061'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1853' => [
            'name' => 'ED50 to WGS 84 (39)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['2961'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1854' => [
            'name' => 'FD58 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['2782'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1855' => [
            'name' => 'FD58 to WGS 84 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['2781'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1856' => [
            'name' => 'ED50(ED77) to WGS 84 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['2783'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1857' => [
            'name' => 'ED50(ED77) to WGS 84 (4)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['2782'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1858' => [
            'name' => 'ED50(ED77) to WGS 84 (5)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['2781'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1860' => [
            'name' => 'ELD79 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['2785'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1862' => [
            'name' => 'ELD79 to WGS 84 (4)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent' => ['2786'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1864' => [
            'name' => 'SAD69 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['4016'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1865' => [
            'name' => 'SAD69 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3215'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1866' => [
            'name' => 'SAD69 to WGS 84 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1049'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1867' => [
            'name' => 'SAD69 to WGS 84 (4)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3887'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1869' => [
            'name' => 'SAD69 to WGS 84 (6)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3229'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1870' => [
            'name' => 'SAD69 to WGS 84 (7)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3241'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1871' => [
            'name' => 'SAD69 to WGS 84 (8)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['2356'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1872' => [
            'name' => 'SAD69 to WGS 84 (9)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3259'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1873' => [
            'name' => 'SAD69 to WGS 84 (10)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1188'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1874' => [
            'name' => 'SAD69 to WGS 84 (11)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3292'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1875' => [
            'name' => 'SAD69 to WGS 84 (12)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3143'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1876' => [
            'name' => 'SAD69 to WGS 84 (13)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3327'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1877' => [
            'name' => 'SAD69 to WGS 84 (14)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1053'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1878' => [
            'name' => 'SWEREF99 to ETRS89 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1225'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1880' => [
            'name' => 'Point 58 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['2791'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1881' => [
            'name' => 'Carthage (Paris) to Carthage (1)',
            'method' => 'urn:ogc:def:method:EPSG::9601',
            'extent' => ['1618'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1883' => [
            'name' => 'Segara (Jakarta) to Segara (1)',
            'method' => 'urn:ogc:def:method:EPSG::9601',
            'extent' => ['1360'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1884' => [
            'name' => 'S-JTSK (Ferro) to S-JTSK (1)',
            'method' => 'urn:ogc:def:method:EPSG::9601',
            'extent' => ['1306'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1885' => [
            'name' => 'Azores Oriental 1940 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1345'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1886' => [
            'name' => 'Azores Central 1948 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1301'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1888' => [
            'name' => 'Porto Santo to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1314'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1890' => [
            'name' => 'Australian Antarctic to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1278'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1891' => [
            'name' => 'Greek to GGRS87 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9619',
            'extent' => ['3254'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1892' => [
            'name' => 'Hito XVIII 1963 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['2805'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1893' => [
            'name' => 'Puerto Rico to WGS 84 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1335'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1895' => [
            'name' => 'RT90 to SWEREF99 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent' => ['1225'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1897' => [
            'name' => 'Segara to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1360'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1898' => [
            'name' => 'Segara to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1359'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1899' => [
            'name' => 'Segara to WGS 84 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['2770'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1901' => [
            'name' => 'NAD83(HARN) to WGS 84 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent' => ['1323'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1902' => [
            'name' => 'Manoca 1962 to WGS 72BE (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['2555'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1905' => [
            'name' => 'Guadeloupe 1948 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent' => ['2829'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1906' => [
            'name' => 'CSG67 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3105'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1908' => [
            'name' => 'CSG67 to RGFG95 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent' => ['3105'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1912' => [
            'name' => 'RGR92 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3902'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1921' => [
            'name' => 'Petrels 1972 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['2817'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1922' => [
            'name' => 'Perroud 1950 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['2818'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1924' => [
            'name' => 'Tahiti 52 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['2811'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1926' => [
            'name' => 'Reunion 1947 to RGR92 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent' => ['3337'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1931' => [
            'name' => 'ST71 Belep to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent' => ['2821'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1946' => [
            'name' => 'NAD83(CSRS) to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent' => ['1061'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1950' => [
            'name' => 'NAD83 to NAD83(CSRS) (4)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['2831'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1952' => [
            'name' => 'ISN93 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1120'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1953' => [
            'name' => 'TM75 to ETRS89 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent' => ['1305'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1955' => [
            'name' => 'OSNI 1952 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent' => ['2530'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1957' => [
            'name' => 'Helle 1954 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent' => ['2869'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1959' => [
            'name' => 'St. Vincent 1945 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3300'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1964' => [
            'name' => 'RGR92 to Reunion 1947 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent' => ['3337'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1965' => [
            'name' => 'Selvagem Grande to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['2779'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1966' => [
            'name' => 'Porto Santo 1995 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['2870'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1967' => [
            'name' => 'Porto Santo 1995 to WGS 84 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent' => ['2870'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1985' => [
            'name' => 'ED50 to WGS 84 (33)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1294'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1987' => [
            'name' => 'Datum 73 to WGS 84 (4)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent' => ['1294'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1988' => [
            'name' => 'Lisbon to WGS 84 (4)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent' => ['1294'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1989' => [
            'name' => 'ED50 to WGS 84 (34)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent' => ['1294'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1991' => [
            'name' => 'Lisbon 1890 (Lisbon) to Lisbon 1890 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9601',
            'extent' => ['1294'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1993' => [
            'name' => 'IKBD-92 to WGS 84 (4)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['2876'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1994' => [
            'name' => 'Reykjavik 1900 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1995' => [
            'name' => 'Dealul Piscului 1930 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3295'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1998' => [
            'name' => 'ED50 to WGS 84 (36)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent' => ['2879'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3811' => [
            'name' => 'Belgian Lambert 2008',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['1347'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3813' => [
            'name' => 'Mississippi Transverse Mercator',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1393'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3817' => [
            'name' => 'HD1909 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent' => ['1119'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3818' => [
            'name' => 'Taiwan 2-degree TM zone 119',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3563'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3820' => [
            'name' => 'Taiwan 2-degree TM zone 121',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3562'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3830' => [
            'name' => 'TWD97 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1228'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3831' => [
            'name' => 'Pacific Disaster Center Mercator',
            'method' => 'urn:ogc:def:method:EPSG::9804',
            'extent' => ['3172'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3853' => [
            'name' => 'County ST74',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3608'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3856' => [
            'name' => 'Popular Visualisation Pseudo-Mercator',
            'method' => 'urn:ogc:def:method:EPSG::1024',
            'extent' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3860' => [
            'name' => 'Finland Gauss-Kruger zone 19',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3595'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3861' => [
            'name' => 'Finland Gauss-Kruger zone 20',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3596'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3862' => [
            'name' => 'Finland Gauss-Kruger zone 21',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3597'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3863' => [
            'name' => 'Finland Gauss-Kruger zone 22',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3598'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3864' => [
            'name' => 'Finland Gauss-Kruger zone 23',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3599'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3865' => [
            'name' => 'Finland Gauss-Kruger zone 24',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3600'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3866' => [
            'name' => 'Finland Gauss-Kruger zone 25',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3601'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3867' => [
            'name' => 'Finland Gauss-Kruger zone 26',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3602'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3868' => [
            'name' => 'Finland Gauss-Kruger zone 27',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3603'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3869' => [
            'name' => 'Finland Gauss-Kruger zone 28',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3604'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3870' => [
            'name' => 'Finland Gauss-Kruger zone 29',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3605'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3871' => [
            'name' => 'Finland Gauss-Kruger zone 30',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3606'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3872' => [
            'name' => 'Finland Gauss-Kruger zone 31',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3607'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3894' => [
            'name' => 'IGRS to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1124'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3895' => [
            'name' => 'MGI (Ferro) to MGI (1)',
            'method' => 'urn:ogc:def:method:EPSG::9601',
            'extent' => ['1037'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3899' => [
            'name' => 'US National Atlas Equal Area',
            'method' => 'urn:ogc:def:method:EPSG::1027',
            'extent' => ['1245'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3913' => [
            'name' => 'MGI (Ferro) to MGI 1901 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9601',
            'extent' => ['2370'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3918' => [
            'name' => 'MGI 1901 to Slovenia 1996 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent' => ['3564'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3919' => [
            'name' => 'MGI 1901 to Slovenia 1996 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent' => ['3565'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3921' => [
            'name' => 'MGI 1901 to Slovenia 1996 (4)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent' => ['3566'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3922' => [
            'name' => 'MGI 1901 to Slovenia 1996 (5)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent' => ['3567'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3923' => [
            'name' => 'MGI 1901 to Slovenia 1996 (6)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent' => ['3568'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3924' => [
            'name' => 'MGI 1901 to Slovenia 1996 (7)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent' => ['3569'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3925' => [
            'name' => 'MGI 1901 to Slovenia 1996 (8)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent' => ['3570'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3926' => [
            'name' => 'MGI 1901 to Slovenia 1996 (9)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent' => ['3571'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3927' => [
            'name' => 'MGI 1901 to Slovenia 1996 (10)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent' => ['3572'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3928' => [
            'name' => 'MGI 1901 to Slovenia 1996 (11)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent' => ['3573'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3962' => [
            'name' => 'MGI 1901 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['2370'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3963' => [
            'name' => 'MGI 1901 to ETRS89 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent' => ['3234'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3965' => [
            'name' => 'MGI 1901 to WGS 84 (6)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3536'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3967' => [
            'name' => 'Virginia Lambert Conic Conformal',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['1415'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3971' => [
            'name' => 'PSAD56 to SIRGAS 1995 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent' => ['3241'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3977' => [
            'name' => 'Canada Atlas Lambert',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['1061'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3981' => [
            'name' => 'Katanga Gauss zone A',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3612'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3982' => [
            'name' => 'Katanga Gauss zone B',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3611'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3983' => [
            'name' => 'Katanga Gauss zone C',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3610'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3984' => [
            'name' => 'Katanga Gauss zone D',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3609'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3990' => [
            'name' => 'PSAD56 to WGS 84 (14)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent' => ['3241'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3998' => [
            'name' => 'Arc 1960 to WGS 84 (4)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1058'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3999' => [
            'name' => 'Moldova Transverse Mercator',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1162'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4067' => [
            'name' => 'Katanga 1955 to RGRDC 2005 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9636',
            'extent' => ['3614'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4069' => [
            'name' => 'Chua to SIRGAS 2000 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3619'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4076' => [
            'name' => 'SREF98 to ETRS89 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['4543'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4078' => [
            'name' => 'ED87 to ETRS89 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent' => ['1297'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4084' => [
            'name' => 'REGCAN95 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3199'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4085' => [
            'name' => 'World Equidistant Cylindrical',
            'method' => 'urn:ogc:def:method:EPSG::1028',
            'extent' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4089' => [
            'name' => 'DKTM1',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3631'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4090' => [
            'name' => 'DKTM2',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3632'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4091' => [
            'name' => 'DKTM3',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2532'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4092' => [
            'name' => 'DKTM4',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2533'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4101' => [
            'name' => 'BLM zone 1N (US survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3374'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4102' => [
            'name' => 'BLM zone 2N (US survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3375'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4103' => [
            'name' => 'BLM zone 3N (US survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2133'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4104' => [
            'name' => 'BLM zone 4N (US survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2134'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4105' => [
            'name' => 'BLM zone 5N (US survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2135'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4106' => [
            'name' => 'BLM zone 6N (US survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2136'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4107' => [
            'name' => 'BLM zone 7N (US survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3494'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4108' => [
            'name' => 'BLM zone 8N (US survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3495'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4109' => [
            'name' => 'BLM zone 9N (US survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3496'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4110' => [
            'name' => 'BLM zone 10N (US survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3497'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4111' => [
            'name' => 'BLM zone 11N (US survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3498'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4112' => [
            'name' => 'BLM zone 12N (US survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3499'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4113' => [
            'name' => 'BLM zone 13N (US survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3500'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4114' => [
            'name' => 'Johor Cassini Grid',
            'method' => 'urn:ogc:def:method:EPSG::9806',
            'extent' => ['3376'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4115' => [
            'name' => 'Sembilan and Melaka Cassini Grid',
            'method' => 'urn:ogc:def:method:EPSG::9806',
            'extent' => ['3377'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4116' => [
            'name' => 'Pahang Cassini Grid',
            'method' => 'urn:ogc:def:method:EPSG::9806',
            'extent' => ['3378'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4117' => [
            'name' => 'Selangor Cassini Grid',
            'method' => 'urn:ogc:def:method:EPSG::9806',
            'extent' => ['3379'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4118' => [
            'name' => 'BLM zone 18N (US survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3505'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4119' => [
            'name' => 'BLM zone 19N (US survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3506'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4177' => [
            'name' => 'Terengganu Cassini Grid',
            'method' => 'urn:ogc:def:method:EPSG::9806',
            'extent' => ['3380'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4186' => [
            'name' => 'BLM zone 59N (US survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3372'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4187' => [
            'name' => 'BLM zone 60N (US survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3373'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4305' => [
            'name' => 'Pinang Cassini Grid',
            'method' => 'urn:ogc:def:method:EPSG::9806',
            'extent' => ['3381'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4320' => [
            'name' => 'Kedah and Perlis Cassini Grid',
            'method' => 'urn:ogc:def:method:EPSG::9806',
            'extent' => ['3382'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4321' => [
            'name' => 'Perak Revised Cassini Grid',
            'method' => 'urn:ogc:def:method:EPSG::9806',
            'extent' => ['3383'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4323' => [
            'name' => 'Kelantan Cassini Grid',
            'method' => 'urn:ogc:def:method:EPSG::9806',
            'extent' => ['3384'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4325' => [
            'name' => 'Guam Map Grid',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3255'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4416' => [
            'name' => 'Katanga Lambert',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['3147'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4436' => [
            'name' => 'Pennsylvania CS27 South zone',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2246'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4441' => [
            'name' => 'NZVD2009 height to One Tree Point 1964 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::9616',
            'extent' => ['3762'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4442' => [
            'name' => 'NZVD2009 height to Auckland 1946 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::9616',
            'extent' => ['3764'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4443' => [
            'name' => 'NZVD2009 height to Moturiki 1953 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::9616',
            'extent' => ['3768'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4444' => [
            'name' => 'NZVD2009 height to Nelson 1955 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::9616',
            'extent' => ['3802'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4445' => [
            'name' => 'NZVD2009 height to Gisborne 1926 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::9616',
            'extent' => ['3771'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4446' => [
            'name' => 'NZVD2009 height to Napier 1962 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::9616',
            'extent' => ['3772'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4447' => [
            'name' => 'NZVD2009 height to Taranaki 1970 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::9616',
            'extent' => ['3769'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4448' => [
            'name' => 'NZVD2009 height to Wellington 1953 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::9616',
            'extent' => ['3773'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4449' => [
            'name' => 'NZVD2009 height to Lyttelton 1937 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::9616',
            'extent' => ['3804'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4450' => [
            'name' => 'NZVD2009 height to Dunedin 1958 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::9616',
            'extent' => ['3803'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4451' => [
            'name' => 'NZVD2009 height to Bluff 1955 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::9616',
            'extent' => ['3801'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4452' => [
            'name' => 'NZVD2009 height to Stewart Island 1977 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::9616',
            'extent' => ['3338'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4453' => [
            'name' => 'NZVD2009 height to Dunedin-Bluff 1960 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::9616',
            'extent' => ['3806'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4454' => [
            'name' => 'New York CS27 Long Island zone',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2235'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4460' => [
            'name' => 'Australian Centre for Remote Sensing Lambert Conformal Projection',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2575'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4461' => [
            'name' => 'NAD83(HARN) to NAD83(NSRS2007) (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1323'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4476' => [
            'name' => 'RGM04 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1159'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4478' => [
            'name' => 'Cadastre 1997 to RGM04 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3340'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4648' => [
            'name' => 'UTM zone 32N with prefix',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2861'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4651' => [
            'name' => 'ODN height to EVRF2000 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1046',
            'extent' => ['2792'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4825' => [
            'name' => 'Cape Verde National',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['1062'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4832' => [
            'name' => 'Mexico ITRF92 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1160'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4838' => [
            'name' => 'LCC Germany',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['3339'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4840' => [
            'name' => 'RGFG95 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1097'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4905' => [
            'name' => 'PTRA08 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3670'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5019' => [
            'name' => 'Portugal Bonne New',
            'method' => 'urn:ogc:def:method:EPSG::9828',
            'extent' => ['1294'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5020' => [
            'name' => 'Portuguese Grid New',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1294'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5021' => [
            'name' => 'Porto Santo 1995 to PTRA08 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1314'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5022' => [
            'name' => 'Porto Santo 1995 to PTRA08 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent' => ['3679'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5023' => [
            'name' => 'Porto Santo 1995 to PTRA08 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3680'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5025' => [
            'name' => 'Azores Oriental 1995 to PTRA08 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['2871'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5026' => [
            'name' => 'Azores Oriental 1995 to PTRA08 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3683'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5028' => [
            'name' => 'Azores Central 1995 to PTRA08 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['2873'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5029' => [
            'name' => 'Azores Central 1995 to PTRA08 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3681'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5030' => [
            'name' => 'Azores Central 1995 to PTRA08 (4)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['2874'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5031' => [
            'name' => 'Azores Central 1995 to PTRA08 (5)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['2875'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5032' => [
            'name' => 'Azores Central 1995 to PTRA08 (6)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['2872'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5034' => [
            'name' => 'Azores Occidental 1939 to PTRA08 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3684'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5035' => [
            'name' => 'Azores Occidental 1939 to PTRA08 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3685'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5037' => [
            'name' => 'Datum 73 to ETRS89 (5)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent' => ['1294'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5038' => [
            'name' => 'Lisbon to ETRS89 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1294'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5039' => [
            'name' => 'Lisbon 1890 to ETRS89 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1294'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5040' => [
            'name' => 'ED50 to ETRS89 (13)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1294'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5043' => [
            'name' => 'Pulkovo 1995 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent' => ['1198'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5044' => [
            'name' => 'Pulkovo 1942 to WGS 84 (20)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent' => ['3296'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5049' => [
            'name' => 'Korea East Sea Belt',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3727'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5050' => [
            'name' => 'Aratu to SIRGAS 2000 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3700'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5052' => [
            'name' => 'Aratu to SIRGAS 2000 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['2963'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5054' => [
            'name' => 'Aratu to SIRGAS 2000 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['2964'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5056' => [
            'name' => 'Aratu to SIRGAS 2000 (4)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3699'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5058' => [
            'name' => 'Aratu to SIRGAS 2000 (5)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3692'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5060' => [
            'name' => 'Aratu to SIRGAS 2000 (6)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3693'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5062' => [
            'name' => 'Aratu to SIRGAS 2000 (7)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3696'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5064' => [
            'name' => 'Aratu to SIRGAS 2000 (8)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3697'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5066' => [
            'name' => 'Aratu to SIRGAS 2000 (9)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3698'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5068' => [
            'name' => 'Conus Albers',
            'method' => 'urn:ogc:def:method:EPSG::9822',
            'extent' => ['1323'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5077' => [
            'name' => 'Karbala 1979 to IGRS (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3625'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5100' => [
            'name' => 'Korea Unified Belt',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1135'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5101' => [
            'name' => 'Korea West Belt 2010',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1498'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5102' => [
            'name' => 'Korea Central Belt 2010',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1497'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5103' => [
            'name' => 'Korea East Belt 2010',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1496'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5104' => [
            'name' => 'Korea East Sea Belt 2010',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3720'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5131' => [
            'name' => 'Korea Central Belt Jeju',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3721'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5133' => [
            'name' => 'Tokyo 1892 to Tokyo (1)',
            'method' => 'urn:ogc:def:method:EPSG::9601',
            'extent' => ['1364'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5134' => [
            'name' => 'Tokyo 1892 to Korean 1985 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9601',
            'extent' => ['3266'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5135' => [
            'name' => 'Norway TM zone 5',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3636'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5136' => [
            'name' => 'Norway TM zone 6',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3639'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5137' => [
            'name' => 'Norway TM zone 7',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3647'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5138' => [
            'name' => 'Norway TM zone 8',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3648'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5139' => [
            'name' => 'Norway TM zone 9',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3649'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5140' => [
            'name' => 'Norway TM zone 10',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3650'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5141' => [
            'name' => 'Norway TM zone 11',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3651'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5142' => [
            'name' => 'Norway TM zone 12',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3653'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5143' => [
            'name' => 'Norway TM zone 13',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3654'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5144' => [
            'name' => 'Norway TM zone 14',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3655'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5145' => [
            'name' => 'Norway TM zone 15',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3656'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5146' => [
            'name' => 'Norway TM zone 16',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3657'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5147' => [
            'name' => 'Norway TM zone 17',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3658'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5148' => [
            'name' => 'Norway TM zone 18',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3660'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5149' => [
            'name' => 'Norway TM zone 19',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3661'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5150' => [
            'name' => 'Norway TM zone 20',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3662'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5151' => [
            'name' => 'Norway TM zone 21',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3663'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5152' => [
            'name' => 'Norway TM zone 22',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3665'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5153' => [
            'name' => 'Norway TM zone 23',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3667'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5154' => [
            'name' => 'Norway TM zone 24',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3668'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5155' => [
            'name' => 'Norway TM zone 25',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3669'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5156' => [
            'name' => 'Norway TM zone 26',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3671'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5157' => [
            'name' => 'Norway TM zone 27',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3672'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5158' => [
            'name' => 'Norway TM zone 28',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3673'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5159' => [
            'name' => 'Norway TM zone 29',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3674'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5160' => [
            'name' => 'Norway TM zone 30',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3676'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5161' => [
            'name' => 'Korea Modified West Belt',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1498'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5162' => [
            'name' => 'Korea Modified Central Belt',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1497'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5163' => [
            'name' => 'Korea Modified Central Belt Jeju',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3721'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5164' => [
            'name' => 'Korea Modified East Belt',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1496'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5165' => [
            'name' => 'Korea Modified East Sea Belt',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3720'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5189' => [
            'name' => 'Korean 1985 to Korea 2000 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9636',
            'extent' => ['3266'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5196' => [
            'name' => 'HVRS71 height to EVRF2000 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1046',
            'extent' => ['3234'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5197' => [
            'name' => 'HVRS71 height to EVRF2007 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1046',
            'extent' => ['3234'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5198' => [
            'name' => 'Ostend height to EVRF2000 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1046',
            'extent' => ['1347'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5199' => [
            'name' => 'Ostend height to EVRF2007 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1046',
            'extent' => ['1347'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5200' => [
            'name' => 'Baltic 1982 height to EVRF2007 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1046',
            'extent' => ['3224'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5201' => [
            'name' => 'Baltic 1957 height to EVRF2000 height (4)',
            'method' => 'urn:ogc:def:method:EPSG::1046',
            'extent' => ['1079'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5202' => [
            'name' => 'Baltic 1957 height to EVRF2007 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1046',
            'extent' => ['1079'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5203' => [
            'name' => 'Baltic 1977 height to EVRF2007 height (2)',
            'method' => 'urn:ogc:def:method:EPSG::1046',
            'extent' => ['3246'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5204' => [
            'name' => 'Baltic 1977 height to EVRF2007 height (3)',
            'method' => 'urn:ogc:def:method:EPSG::1046',
            'extent' => ['3272'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5205' => [
            'name' => 'Constanta height to EVRF2000 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1046',
            'extent' => ['3295'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5206' => [
            'name' => 'Constanta height to EVRF2007 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1046',
            'extent' => ['3295'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5207' => [
            'name' => 'LN02 height to EVRF2007 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1046',
            'extent' => ['1286'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5208' => [
            'name' => 'RH2000 height to EVRF2007 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1046',
            'extent' => ['3313'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5209' => [
            'name' => 'Baltic 1977 height to EVRF2000 height (5)',
            'method' => 'urn:ogc:def:method:EPSG::1046',
            'extent' => ['3268'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5210' => [
            'name' => 'Baltic 1977 height to EVRF2007 height (4)',
            'method' => 'urn:ogc:def:method:EPSG::1046',
            'extent' => ['3268'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5211' => [
            'name' => 'DHHN92 height to EVRF2007 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1046',
            'extent' => ['3339'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5212' => [
            'name' => 'DHHN85 height to EVRF2007 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1046',
            'extent' => ['2326'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5213' => [
            'name' => 'Genoa 1942 height to EVRF2000 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1046',
            'extent' => ['2372'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5215' => [
            'name' => 'Genoa 1942 height to EVRF2007 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1046',
            'extent' => ['2372'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5216' => [
            'name' => 'Genoa 1942 height to EVRF2000 height (2)',
            'method' => 'urn:ogc:def:method:EPSG::1046',
            'extent' => ['2340'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5217' => [
            'name' => 'Genoa 1942 height to EVRF2007 height (2)',
            'method' => 'urn:ogc:def:method:EPSG::1046',
            'extent' => ['2340'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5218' => [
            'name' => 'Krovak East North',
            'method' => 'urn:ogc:def:method:EPSG::1041',
            'extent' => ['1306'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5219' => [
            'name' => 'Modified Krovak',
            'method' => 'urn:ogc:def:method:EPSG::1042',
            'extent' => ['1079'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5220' => [
            'name' => 'Modified Krovak East North',
            'method' => 'urn:ogc:def:method:EPSG::1043',
            'extent' => ['1079'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5222' => [
            'name' => 'Gabon Transverse Mercator',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3249'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5226' => [
            'name' => 'S-JTSK/05 to ETRS89 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent' => ['1079'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5231' => [
            'name' => 'Sri Lanka Grid',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3310'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5232' => [
            'name' => 'Sri Lanka Grid 1999',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3310'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5236' => [
            'name' => 'SLD99 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent' => ['3310'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5238' => [
            'name' => 'S-JTSK/05 (Ferro) to S-JTSK/05 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9601',
            'extent' => ['1079'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5241' => [
            'name' => 'S-JTSK to S-JTSK/05 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9619',
            'extent' => ['1079'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5260' => [
            'name' => 'TUREF to ETRS89 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent' => ['1237'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5265' => [
            'name' => 'Bhutan National Grid',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1048'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5267' => [
            'name' => 'DRUKREF 03 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1048'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5268' => [
            'name' => 'Bumthang TM',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3734'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5276' => [
            'name' => 'Chhukha TM',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3737'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5277' => [
            'name' => 'Dagana TM',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3738'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5278' => [
            'name' => 'Gasa TM',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3740'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5279' => [
            'name' => 'Ha TM',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3742'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5280' => [
            'name' => 'Lhuentse TM',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3743'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5281' => [
            'name' => 'Mongar TM',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3745'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5282' => [
            'name' => 'Paro TM',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3746'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5283' => [
            'name' => 'Pemagatshel TM',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3747'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5284' => [
            'name' => 'Tsirang TM',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3757'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5285' => [
            'name' => 'Samdrup Jongkhar TM',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3750'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5286' => [
            'name' => 'Samtse TM',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3751'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5287' => [
            'name' => 'Sarpang TM',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3752'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5288' => [
            'name' => 'Wangdue Phodrang TM',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3758'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5289' => [
            'name' => 'Trashigang TM',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3754'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5290' => [
            'name' => 'Trongsa TM',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3755'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5291' => [
            'name' => 'Zhemgang TM',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3761'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5312' => [
            'name' => 'Thimphu TM',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3753'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5313' => [
            'name' => 'Punakha TM',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3749'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5314' => [
            'name' => 'Yangtse TM',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3760'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5315' => [
            'name' => 'Faroe Transverse Mercator',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1093'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5319' => [
            'name' => 'Teranet Ontario Lambert',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['1367'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5326' => [
            'name' => 'Iceland Lambert 2004',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['1120'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5327' => [
            'name' => 'ISN2004 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1120'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5328' => [
            'name' => 'Netherlands East Indies Equatorial Zone (Jkt)',
            'method' => 'urn:ogc:def:method:EPSG::9804',
            'extent' => ['4020'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5350' => [
            'name' => 'Campo Inchauspe to POSGAR 2007 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3215'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5366' => [
            'name' => 'Costa Rica TM 2005',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3849'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5374' => [
            'name' => 'MARGEN to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1049'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5377' => [
            'name' => 'MACARIO SOLIS to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1186'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5378' => [
            'name' => 'Peru96 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1189'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5384' => [
            'name' => 'SIRGAS-ROU98 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1247'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5385' => [
            'name' => 'Yacare to SIRGAS-ROU98 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent' => ['3326'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5386' => [
            'name' => 'Yacare to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent' => ['3326'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5390' => [
            'name' => 'Costa Rica Norte',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['3869'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5394' => [
            'name' => 'Costa Rica Sur',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['3870'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5395' => [
            'name' => 'SIRGAS_ES2007.8 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1087'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5399' => [
            'name' => 'El Salvador Lambert',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['3243'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5403' => [
            'name' => 'AIOC95 depth to Caspian depth (1)',
            'method' => 'urn:ogc:def:method:EPSG::9616',
            'extent' => ['2592'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5415' => [
            'name' => 'GHA height to EVRF2000 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1046',
            'extent' => ['1037'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5416' => [
            'name' => 'Baltic 1982 height to EVRF2000 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1046',
            'extent' => ['3224'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5417' => [
            'name' => 'DNN height to EVRF2000 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1046',
            'extent' => ['3237'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5419' => [
            'name' => 'NGF IGN69 height to EVRF2000 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::9616',
            'extent' => ['1326'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5420' => [
            'name' => 'DHHN92 height to EVRF2000 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1046',
            'extent' => ['3339'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5421' => [
            'name' => 'DHHN85 height to EVRF2000 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1046',
            'extent' => ['2326'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5422' => [
            'name' => 'SNN76 height to EVRF2000 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1046',
            'extent' => ['1343'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5424' => [
            'name' => 'EOMA height 1980 to EVRF2000 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1046',
            'extent' => ['1119'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5425' => [
            'name' => 'NAP height to EVRF2000 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::9616',
            'extent' => ['1275'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5426' => [
            'name' => 'NN54 height to EVRF2000 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1046',
            'extent' => ['1352'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5427' => [
            'name' => 'Cascais height to EVRF2000 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::9616',
            'extent' => ['1294'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5428' => [
            'name' => 'NVN99 height to EVRF2000 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1046',
            'extent' => ['3307'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5429' => [
            'name' => 'Alicante height to EVRF2000 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1046',
            'extent' => ['4188'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5430' => [
            'name' => 'RH70 height to EVRF2000 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1046',
            'extent' => ['3313'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5431' => [
            'name' => 'LN02 height to EVRF2000 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1046',
            'extent' => ['1286'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5432' => [
            'name' => 'N60 height to EVRF2000 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::9616',
            'extent' => ['3333'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5435' => [
            'name' => 'Baltic 1957 height to EVRF2000 height (3)',
            'method' => 'urn:ogc:def:method:EPSG::1046',
            'extent' => ['1211'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5436' => [
            'name' => 'Baltic 1977 height to EVRF2000 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1046',
            'extent' => ['3246'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5437' => [
            'name' => 'Baltic 1977 height to EVRF2000 height (2)',
            'method' => 'urn:ogc:def:method:EPSG::1046',
            'extent' => ['3272'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5438' => [
            'name' => 'Baltic 1977 height to Caspian height (1)',
            'method' => 'urn:ogc:def:method:EPSG::9616',
            'extent' => ['1291'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5439' => [
            'name' => 'Nicaragua Norte',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['3844'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5440' => [
            'name' => 'Baltic 1977 depth to Caspian depth (1)',
            'method' => 'urn:ogc:def:method:EPSG::9616',
            'extent' => ['1291'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5443' => [
            'name' => 'Baltic 1977 height to AIOC95 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::9616',
            'extent' => ['2592'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5444' => [
            'name' => 'Nicaragua Sur',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['3847'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5445' => [
            'name' => 'Baltic 1977 depth to AIOC95 depth (1)',
            'method' => 'urn:ogc:def:method:EPSG::9616',
            'extent' => ['2592'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5447' => [
            'name' => 'Baltic 1977 height to Black Sea height (1)',
            'method' => 'urn:ogc:def:method:EPSG::9616',
            'extent' => ['3251'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5450' => [
            'name' => 'KOC CD height to Kuwait PWD height (1)',
            'method' => 'urn:ogc:def:method:EPSG::9616',
            'extent' => ['3267'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5452' => [
            'name' => 'Belfast height to Malin Head height (1)',
            'method' => 'urn:ogc:def:method:EPSG::9616',
            'extent' => ['2530'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5465' => [
            'name' => 'Belize Colony Grid',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3219'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5468' => [
            'name' => 'Panama Lambert',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['3290'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5471' => [
            'name' => 'Panama Polyconic',
            'method' => 'urn:ogc:def:method:EPSG::9818',
            'extent' => ['3290'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5475' => [
            'name' => 'McMurdo Sound Lambert Conformal 2000',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['3853'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5476' => [
            'name' => 'Borchgrevink Coast Lambert Conformal 2000',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['3854'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5477' => [
            'name' => 'Pennell Coast Lambert Conformal 2000',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['3855'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5478' => [
            'name' => 'Ross Sea Polar Stereographic 2000',
            'method' => 'urn:ogc:def:method:EPSG::9810',
            'extent' => ['3856'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5491' => [
            'name' => 'Martinique 1938 to RGAF09 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent' => ['3276'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5492' => [
            'name' => 'Guadeloupe 1948 to RGAF09 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent' => ['2829'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5493' => [
            'name' => 'Fort Marigot to RGAF09 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent' => ['2828'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5494' => [
            'name' => 'RRAF 1991 to RGAF09 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent' => ['1156'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5495' => [
            'name' => 'RRAF 1991 to RGAF09 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent' => ['2829'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5496' => [
            'name' => 'RRAF 1991 to RGAF09 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent' => ['2828'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5497' => [
            'name' => 'POSGAR 2007 to SIRGAS 2000 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1033'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5501' => [
            'name' => 'RGAF09 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['2824'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5509' => [
            'name' => 'Krovak (Greenwich)',
            'method' => 'urn:ogc:def:method:EPSG::9819',
            'extent' => ['1306'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5510' => [
            'name' => 'Krovak East North (Greenwich)',
            'method' => 'urn:ogc:def:method:EPSG::1041',
            'extent' => ['1306'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5511' => [
            'name' => 'Modified Krovak (Greenwich)',
            'method' => 'urn:ogc:def:method:EPSG::1042',
            'extent' => ['1079'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5512' => [
            'name' => 'Modified Krovak East North (Greenwich)',
            'method' => 'urn:ogc:def:method:EPSG::1043',
            'extent' => ['1079'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5517' => [
            'name' => 'Chatham Islands Map Grid',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2889'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5521' => [
            'name' => 'Grand Comoros to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['2807'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5522' => [
            'name' => 'Gabon Transverse Mercator 2011',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1100'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5525' => [
            'name' => 'Corrego Alegre 1961 to SIRGAS 2000 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9615',
            'extent' => ['3874'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5526' => [
            'name' => 'Corrego Alegre 1970-72 to SIRGAS 2000 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9615',
            'extent' => ['1293'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5528' => [
            'name' => 'SAD69 to SIRGAS 2000 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9615',
            'extent' => ['3887'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5529' => [
            'name' => 'SAD69(96) to SIRGAS 2000 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9615',
            'extent' => ['3887'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5547' => [
            'name' => 'Papua New Guinea Map Grid 1994 zone 54',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3882'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5548' => [
            'name' => 'Papua New Guinea Map Grid 1994 zone 55',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3885'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5549' => [
            'name' => 'Papua New Guinea Map Grid 1994 zone 56',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3885'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5553' => [
            'name' => 'PNG94 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1187'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5557' => [
            'name' => 'GHA height to EVRF2007 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1046',
            'extent' => ['1037'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5584' => [
            'name' => 'MOLDREF99 to ETRS89 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1162'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5586' => [
            'name' => 'Pulkovo 1942 to UCS-2000 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1242'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5587' => [
            'name' => 'New Brunswick Stereographic (NAD27)',
            'method' => 'urn:ogc:def:method:EPSG::9809',
            'extent' => ['1447'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5595' => [
            'name' => 'Fehmarnbelt TM',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3889'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5599' => [
            'name' => 'FEH2010 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3889'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5640' => [
            'name' => 'Petrobras Mercator',
            'method' => 'urn:ogc:def:method:EPSG::9805',
            'extent' => ['3896'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5642' => [
            'name' => 'Southern Permian Basin Atlas Lambert',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['3899'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5645' => [
            'name' => 'SPCS83 Vermont zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1414'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5647' => [
            'name' => 'UTM zone 31N with prefix',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2860'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5648' => [
            'name' => 'UTM zone 33N with prefix',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2862'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5658' => [
            'name' => 'TM Emilia-Romagna',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4035'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5660' => [
            'name' => 'Nord Sahara 1959 to WGS 84 (9)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent' => ['1026'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5661' => [
            'name' => 'ED50 to ETRS89 (14)',
            'method' => 'urn:ogc:def:method:EPSG::9615',
            'extent' => ['3732'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5824' => [
            'name' => 'ACT Standard Grid',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2283'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5827' => [
            'name' => 'AGD66 to GDA94 (19)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent' => ['2283'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5841' => [
            'name' => 'AGD66 to WGS 84 (19)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['4013'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5878' => [
            'name' => 'Timbalai 1948 to GDBD2009 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent' => ['1055'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5881' => [
            'name' => 'SAD69(96) to SIRGAS 2000 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1053'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5883' => [
            'name' => 'Tonga Map Grid',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1234'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5888' => [
            'name' => 'Combani 1950 to RGM04 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent' => ['3340'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5892' => [
            'name' => 'Vietnam TM-3 zone 481',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4193'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5893' => [
            'name' => 'Vietnam TM-3 zone 482',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4215', '4547'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5894' => [
            'name' => 'Vietnam TM-3 zone 491',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4217', '4558'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5895' => [
            'name' => 'Vietnam TM-3 107-45',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4218'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5900' => [
            'name' => 'ITRF2005 to ETRF2005 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent' => ['1298'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5901' => [
            'name' => 'EPSG Alaska Polar Stereographic',
            'method' => 'urn:ogc:def:method:EPSG::9810',
            'extent' => ['1996'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5902' => [
            'name' => 'EPSG Canada Polar Stereographic',
            'method' => 'urn:ogc:def:method:EPSG::9810',
            'extent' => ['1996'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5903' => [
            'name' => 'EPSG Greenland Polar Stereographic',
            'method' => 'urn:ogc:def:method:EPSG::9810',
            'extent' => ['1996'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5904' => [
            'name' => 'EPSG Norway Polar Stereographic',
            'method' => 'urn:ogc:def:method:EPSG::9810',
            'extent' => ['1996'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5905' => [
            'name' => 'EPSG Russia Polar Stereographic',
            'method' => 'urn:ogc:def:method:EPSG::9810',
            'extent' => ['1996'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5906' => [
            'name' => 'EPSG Arctic Regional LCC zone A1',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['4019'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5907' => [
            'name' => 'EPSG Arctic Regional LCC zone A2',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['4027'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5908' => [
            'name' => 'EPSG Arctic Regional LCC zone A3',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['4028'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5909' => [
            'name' => 'EPSG Arctic Regional LCC zone A4',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['4029'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5910' => [
            'name' => 'EPSG Arctic Regional LCC zone A5',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['4031'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5911' => [
            'name' => 'EPSG Arctic Regional LCC zone B1',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['4032'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5912' => [
            'name' => 'EPSG Arctic Regional LCC zone B2',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['4033'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5913' => [
            'name' => 'EPSG Arctic Regional LCC zone B3',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['4034'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5914' => [
            'name' => 'EPSG Arctic Regional LCC zone B4',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['4037'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5915' => [
            'name' => 'EPSG Arctic Regional LCC zone B5',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['4038'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5916' => [
            'name' => 'EPSG Arctic Regional LCC zone C1',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['4040'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5917' => [
            'name' => 'EPSG Arctic Regional LCC zone C2',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['4041'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5918' => [
            'name' => 'EPSG Arctic Regional LCC zone C3',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['4042'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5919' => [
            'name' => 'EPSG Arctic Regional LCC zone C4',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['4043'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5920' => [
            'name' => 'EPSG Arctic Regional LCC zone C5',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['4045'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5943' => [
            'name' => 'EPSG Arctic LCC zone 8-20',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['4123'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5944' => [
            'name' => 'EPSG Arctic LCC zone 8-22',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['4124'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5977' => [
            'name' => 'EPSG Arctic LCC zone 1-21',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['4044'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5978' => [
            'name' => 'EPSG Arctic LCC zone 1-23',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['4047'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5979' => [
            'name' => 'EPSG Arctic LCC zone 1-25',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['4048'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5980' => [
            'name' => 'EPSG Arctic LCC zone 1-27',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['4049'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5981' => [
            'name' => 'EPSG Arctic LCC zone 1-29',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['4050'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5982' => [
            'name' => 'EPSG Arctic LCC zone 1-31',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['4051'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5983' => [
            'name' => 'EPSG Arctic LCC zone 2-10',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['4057'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5984' => [
            'name' => 'EPSG Arctic LCC zone 2-12',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['4052'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5985' => [
            'name' => 'EPSG Arctic LCC zone 2-14',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['4030'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5986' => [
            'name' => 'EPSG Arctic LCC zone 2-16',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['4036'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5987' => [
            'name' => 'EPSG Arctic LCC zone 2-18',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['4039'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5988' => [
            'name' => 'EPSG Arctic LCC zone 2-20',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['4046'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5989' => [
            'name' => 'EPSG Arctic LCC zone 2-22',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['4053'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5990' => [
            'name' => 'EPSG Arctic LCC zone 2-24',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['4054'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5991' => [
            'name' => 'EPSG Arctic LCC zone 2-26',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['4055'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5992' => [
            'name' => 'EPSG Arctic LCC zone 2-28',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['4056'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5993' => [
            'name' => 'EPSG Arctic LCC zone 3-11',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['4058'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5994' => [
            'name' => 'EPSG Arctic LCC zone 3-13',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['4059'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5995' => [
            'name' => 'EPSG Arctic LCC zone 3-15',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['4060'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5996' => [
            'name' => 'EPSG Arctic LCC zone 3-17',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['4061'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5997' => [
            'name' => 'EPSG Arctic LCC zone 3-19',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['4062'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5998' => [
            'name' => 'EPSG Arctic LCC zone 3-21',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['4063'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5999' => [
            'name' => 'EPSG Arctic LCC zone 3-23',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['4064'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6000' => [
            'name' => 'EPSG Arctic LCC zone 3-25',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['4065'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6001' => [
            'name' => 'EPSG Arctic LCC zone 3-27',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['4070'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6002' => [
            'name' => 'EPSG Arctic LCC zone 3-29',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['4071'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6003' => [
            'name' => 'EPSG Arctic LCC zone 3-31',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['4074'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6004' => [
            'name' => 'EPSG Arctic LCC zone 3-33',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['4075'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6005' => [
            'name' => 'EPSG Arctic LCC zone 4-12',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['4076'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6006' => [
            'name' => 'EPSG Arctic LCC zone 4-14',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['4077'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6007' => [
            'name' => 'EPSG Arctic LCC zone 4-16',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['4078'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6008' => [
            'name' => 'EPSG Arctic LCC zone 4-18',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['4079'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6009' => [
            'name' => 'EPSG Arctic LCC zone 4-20',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['4080'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6010' => [
            'name' => 'EPSG Arctic LCC zone 4-22',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['4081'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6011' => [
            'name' => 'EPSG Arctic LCC zone 4-24',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['4082'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6012' => [
            'name' => 'EPSG Arctic LCC zone 4-26',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['4083'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6013' => [
            'name' => 'EPSG Arctic LCC zone 4-28',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['4084'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6014' => [
            'name' => 'EPSG Arctic LCC zone 4-30',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['4085'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6015' => [
            'name' => 'EPSG Arctic LCC zone 4-32',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['4086'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6016' => [
            'name' => 'EPSG Arctic LCC zone 4-34',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['4087'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6017' => [
            'name' => 'EPSG Arctic LCC zone 4-36',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['4088'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6018' => [
            'name' => 'EPSG Arctic LCC zone 4-38',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['4089'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6019' => [
            'name' => 'EPSG Arctic LCC zone 4-40',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['4090'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6020' => [
            'name' => 'EPSG Arctic LCC zone 5-11',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['4091'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6021' => [
            'name' => 'EPSG Arctic LCC zone 5-13',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['4092'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6022' => [
            'name' => 'EPSG Arctic LCC zone 5-15',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['4093'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6023' => [
            'name' => 'EPSG Arctic LCC zone 5-17',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['4094'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6024' => [
            'name' => 'EPSG Arctic LCC zone 5-19',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['4095'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6025' => [
            'name' => 'EPSG Arctic LCC zone 5-21',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['4096'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6026' => [
            'name' => 'EPSG Arctic LCC zone 5-23',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['4097'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6027' => [
            'name' => 'EPSG Arctic LCC zone 5-25',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['4098'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6028' => [
            'name' => 'EPSG Arctic LCC zone 5-27',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['4099'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6029' => [
            'name' => 'EPSG Arctic LCC zone 5-29',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['4100'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6030' => [
            'name' => 'EPSG Arctic LCC zone 5-31',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['4101'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6031' => [
            'name' => 'EPSG Arctic LCC zone 5-33',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['4102'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6032' => [
            'name' => 'EPSG Arctic LCC zone 5-35',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['4103'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6033' => [
            'name' => 'EPSG Arctic LCC zone 5-37',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['4104'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6034' => [
            'name' => 'EPSG Arctic LCC zone 5-39',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['4105'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6035' => [
            'name' => 'EPSG Arctic LCC zone 5-41',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['4106'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6036' => [
            'name' => 'EPSG Arctic LCC zone 5-43',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['4107'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6037' => [
            'name' => 'EPSG Arctic LCC zone 5-45',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['4108'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6038' => [
            'name' => 'EPSG Arctic LCC zone 5-47',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['4109'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6039' => [
            'name' => 'EPSG Arctic LCC zone 6-14',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['4110'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6040' => [
            'name' => 'EPSG Arctic LCC zone 6-16',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['4111'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6041' => [
            'name' => 'EPSG Arctic LCC zone 6-18',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['4112'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6042' => [
            'name' => 'EPSG Arctic LCC zone 6-20',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['4113'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6043' => [
            'name' => 'EPSG Arctic LCC zone 6-22',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['4114'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6044' => [
            'name' => 'EPSG Arctic LCC zone 6-24',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['4115'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6045' => [
            'name' => 'EPSG Arctic LCC zone 6-26',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['4116'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6046' => [
            'name' => 'EPSG Arctic LCC zone 6-28',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['4117'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6047' => [
            'name' => 'EPSG Arctic LCC zone 6-30',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['4118'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6048' => [
            'name' => 'EPSG Arctic LCC zone 7-11',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['4119'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6049' => [
            'name' => 'EPSG Arctic LCC zone 7-13',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['4120'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6127' => [
            'name' => 'Cayman Islands TM (ft)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1063'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6136' => [
            'name' => 'GCGD59 to CIGD11 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent' => ['3185'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6137' => [
            'name' => 'SIGD61 to CIGD11 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent' => ['3186'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6177' => [
            'name' => 'CIGD11 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1063'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6188' => [
            'name' => 'Lisbon to ETRS89 (4)',
            'method' => 'urn:ogc:def:method:EPSG::9615',
            'extent' => ['1294'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6189' => [
            'name' => 'Datum 73 to ETRS89 (6)',
            'method' => 'urn:ogc:def:method:EPSG::9615',
            'extent' => ['1294'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6191' => [
            'name' => 'Corrego Alegre 1970-72 to SAD69 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1293'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6193' => [
            'name' => 'Corrego Alegre 1970-72 to SIRGAS 2000 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1293'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6198' => [
            'name' => 'Michigan CS27 Central zone',
            'method' => 'urn:ogc:def:method:EPSG::1051',
            'extent' => ['1724'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6199' => [
            'name' => 'Michigan CS27 South zone',
            'method' => 'urn:ogc:def:method:EPSG::1051',
            'extent' => ['1725'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6203' => [
            'name' => 'Macedonia Gauss-Kruger',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1148'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6205' => [
            'name' => 'MGI 1901 to ETRS89 (5)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent' => ['1148'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6206' => [
            'name' => 'MGI 1901 to WGS 84 (10)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent' => ['1148'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6208' => [
            'name' => 'Nepal 1981 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1171'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6212' => [
            'name' => 'Arauca urban grid',
            'method' => 'urn:ogc:def:method:EPSG::1052',
            'extent' => ['4122'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6213' => [
            'name' => 'Armenia urban grid',
            'method' => 'urn:ogc:def:method:EPSG::1052',
            'extent' => ['4132'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6214' => [
            'name' => 'Barranquilla urban grid',
            'method' => 'urn:ogc:def:method:EPSG::1052',
            'extent' => ['4134'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6215' => [
            'name' => 'Bogota urban grid',
            'method' => 'urn:ogc:def:method:EPSG::1052',
            'extent' => ['4135'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6216' => [
            'name' => 'Bucaramanga urban grid',
            'method' => 'urn:ogc:def:method:EPSG::1052',
            'extent' => ['4136'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6217' => [
            'name' => 'Cali urban grid',
            'method' => 'urn:ogc:def:method:EPSG::1052',
            'extent' => ['4137'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6218' => [
            'name' => 'Cartagena urban grid',
            'method' => 'urn:ogc:def:method:EPSG::1052',
            'extent' => ['4138'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6219' => [
            'name' => 'Cucuta urban grid',
            'method' => 'urn:ogc:def:method:EPSG::1052',
            'extent' => ['4139'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6220' => [
            'name' => 'Florencia urban grid',
            'method' => 'urn:ogc:def:method:EPSG::1052',
            'extent' => ['4140'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6221' => [
            'name' => 'Ibague urban grid',
            'method' => 'urn:ogc:def:method:EPSG::1052',
            'extent' => ['4141'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6222' => [
            'name' => 'Inirida urban grid',
            'method' => 'urn:ogc:def:method:EPSG::1052',
            'extent' => ['4142'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6223' => [
            'name' => 'Leticia urban grid',
            'method' => 'urn:ogc:def:method:EPSG::1052',
            'extent' => ['4143'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6224' => [
            'name' => 'Manizales urban grid',
            'method' => 'urn:ogc:def:method:EPSG::1052',
            'extent' => ['4144'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6225' => [
            'name' => 'Medellin urban grid',
            'method' => 'urn:ogc:def:method:EPSG::1052',
            'extent' => ['4145'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6226' => [
            'name' => 'Mitu urban grid',
            'method' => 'urn:ogc:def:method:EPSG::1052',
            'extent' => ['4146'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6227' => [
            'name' => 'Mocoa urban grid',
            'method' => 'urn:ogc:def:method:EPSG::1052',
            'extent' => ['4147'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6228' => [
            'name' => 'Monteria urban grid',
            'method' => 'urn:ogc:def:method:EPSG::1052',
            'extent' => ['4148'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6229' => [
            'name' => 'Neiva urban grid',
            'method' => 'urn:ogc:def:method:EPSG::1052',
            'extent' => ['4149'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6230' => [
            'name' => 'Pasto urban grid',
            'method' => 'urn:ogc:def:method:EPSG::1052',
            'extent' => ['4150'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6231' => [
            'name' => 'Pereira urban grid',
            'method' => 'urn:ogc:def:method:EPSG::1052',
            'extent' => ['4151'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6232' => [
            'name' => 'Popayan urban grid',
            'method' => 'urn:ogc:def:method:EPSG::1052',
            'extent' => ['4152'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6233' => [
            'name' => 'Puerto Carreno urban grid',
            'method' => 'urn:ogc:def:method:EPSG::1052',
            'extent' => ['4153'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6234' => [
            'name' => 'Quibdo urban grid',
            'method' => 'urn:ogc:def:method:EPSG::1052',
            'extent' => ['4154'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6235' => [
            'name' => 'Riohacha urban grid',
            'method' => 'urn:ogc:def:method:EPSG::1052',
            'extent' => ['4155'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6236' => [
            'name' => 'San Andres urban grid',
            'method' => 'urn:ogc:def:method:EPSG::1052',
            'extent' => ['4156'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6237' => [
            'name' => 'San Jose del Guaviare urban grid',
            'method' => 'urn:ogc:def:method:EPSG::1052',
            'extent' => ['4157'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6238' => [
            'name' => 'Santa Marta urban grid',
            'method' => 'urn:ogc:def:method:EPSG::1052',
            'extent' => ['4128'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6239' => [
            'name' => 'Sucre urban grid',
            'method' => 'urn:ogc:def:method:EPSG::1052',
            'extent' => ['4130'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6240' => [
            'name' => 'Tunja urban grid',
            'method' => 'urn:ogc:def:method:EPSG::1052',
            'extent' => ['4131'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6241' => [
            'name' => 'Valledupar urban grid',
            'method' => 'urn:ogc:def:method:EPSG::1052',
            'extent' => ['4158'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6242' => [
            'name' => 'Villavicencio urban grid',
            'method' => 'urn:ogc:def:method:EPSG::1052',
            'extent' => ['4159'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6243' => [
            'name' => 'Yopal urban grid',
            'method' => 'urn:ogc:def:method:EPSG::1052',
            'extent' => ['4160'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6276' => [
            'name' => 'ITRF2008 to GDA94 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1056',
            'extent' => ['1036'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6277' => [
            'name' => 'ITRF2005 to GDA94 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1056',
            'extent' => ['1036'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6278' => [
            'name' => 'ITRF2000 to GDA94 (2)',
            'method' => 'urn:ogc:def:method:EPSG::1056',
            'extent' => ['1036'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6279' => [
            'name' => 'ITRF97 to GDA94 (2)',
            'method' => 'urn:ogc:def:method:EPSG::1056',
            'extent' => ['1036'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6280' => [
            'name' => 'ITRF96 to GDA94 (2)',
            'method' => 'urn:ogc:def:method:EPSG::1056',
            'extent' => ['1036'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6308' => [
            'name' => 'Cyprus Transverse Mercator',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3236'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6327' => [
            'name' => 'NAD83(2011) to NAVD88 height (2)',
            'method' => 'urn:ogc:def:method:EPSG::9665',
            'extent' => ['1330'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6361' => [
            'name' => 'Mexico LCC',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['1160'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6373' => [
            'name' => 'Mexico ITRF2008 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1160'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6374' => [
            'name' => 'Ukraine TM zone 7',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3906'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6375' => [
            'name' => 'Ukraine TM zone 8',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3907'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6376' => [
            'name' => 'Ukraine TM zone 9',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3908'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6377' => [
            'name' => 'Ukraine TM zone 10',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3909'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6378' => [
            'name' => 'Ukraine TM zone 11',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3910'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6379' => [
            'name' => 'Ukraine TM zone 12',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3912'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6380' => [
            'name' => 'Ukraine TM zone 13',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3913'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6390' => [
            'name' => 'Cayman Islands LCC (ft)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['1063'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6645' => [
            'name' => 'Quebec Albers Projection',
            'method' => 'urn:ogc:def:method:EPSG::9822',
            'extent' => ['1368'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6698' => [
            'name' => 'JGD2000 to JGD2011 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['4163'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6699' => [
            'name' => 'JGD2000 (vertical) height to JGD2011 (vertical) height (1)',
            'method' => 'urn:ogc:def:method:EPSG::9616',
            'extent' => ['4165'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6701' => [
            'name' => 'GDBD2009 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1055'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6702' => [
            'name' => 'TM 60 SW',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4172'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6710' => [
            'name' => 'RDN2008 to ETRS89 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3343'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6712' => [
            'name' => 'Tokyo to JGD2000 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9615',
            'extent' => ['3957'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6713' => [
            'name' => 'JGD2000 to JGD2011 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9615',
            'extent' => ['4170'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6716' => [
            'name' => 'Christmas Island Grid 1992',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4169'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6717' => [
            'name' => 'Christmas Island Grid 1994',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4169'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6718' => [
            'name' => 'Cocos Island Grid 1992',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1069'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6719' => [
            'name' => 'Cocos Island Grid 1994',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1069'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6729' => [
            'name' => 'Map Grid of Australia zone 46',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4189'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6730' => [
            'name' => 'Map Grid of Australia zone 47',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4190'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6731' => [
            'name' => 'Map Grid of Australia zone 59',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4179'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6740' => [
            'name' => 'Tokyo to JGD2011 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9615',
            'extent' => ['4194'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6741' => [
            'name' => 'Oregon Baker zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4180'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6742' => [
            'name' => 'Oregon Baker zone (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4180'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6743' => [
            'name' => 'Oregon Bend-Klamath Falls zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4192'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6744' => [
            'name' => 'Oregon Bend-Klamath Falls zone (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4192'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6745' => [
            'name' => 'Oregon Bend-Redmond-Prineville zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['4195'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6746' => [
            'name' => 'Oregon Bend-Redmond-Prineville zone (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['4195'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6747' => [
            'name' => 'Oregon Bend-Burns zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['4182'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6748' => [
            'name' => 'Oregon Bend-Burns zone (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['4182'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6749' => [
            'name' => 'Oregon Canyonville-Grants Pass zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4199'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6750' => [
            'name' => 'Oregon Canyonville-Grants Pass zone (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4199'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6751' => [
            'name' => 'Oregon Columbia River East zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['4200'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6752' => [
            'name' => 'Oregon Columbia River East zone (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['4200'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6753' => [
            'name' => 'Oregon Columbia River West zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9812',
            'extent' => ['4202'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6754' => [
            'name' => 'Oregon Columbia River West zone (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9812',
            'extent' => ['4202'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6755' => [
            'name' => 'Oregon Cottage Grove-Canyonville zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4203'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6756' => [
            'name' => 'Oregon Cottage Grove-Canyonville zone (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4203'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6757' => [
            'name' => 'Oregon Dufur-Madras zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4204'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6758' => [
            'name' => 'Oregon Dufur-Madras zone (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4204'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6759' => [
            'name' => 'Oregon Eugene zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4197'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6760' => [
            'name' => 'Oregon Eugene zone (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4197'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6761' => [
            'name' => 'Oregon Grants Pass-Ashland zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4198'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6762' => [
            'name' => 'Oregon Grants Pass-Ashland zone (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4198'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6763' => [
            'name' => 'Oregon Gresham-Warm Springs zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4201'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6764' => [
            'name' => 'Oregon Gresham-Warm Springs zone (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4201'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6765' => [
            'name' => 'Oregon La Grande zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4206'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6766' => [
            'name' => 'Oregon La Grande zone (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4206'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6767' => [
            'name' => 'Oregon Ontario zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4207'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6768' => [
            'name' => 'Oregon Ontario zone (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4207'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6769' => [
            'name' => 'Oregon Coast zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9812',
            'extent' => ['4208'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6770' => [
            'name' => 'Oregon Coast zone (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9812',
            'extent' => ['4208'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6771' => [
            'name' => 'Oregon Pendleton zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4209'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6772' => [
            'name' => 'Oregon Pendleton zone (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4209'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6773' => [
            'name' => 'Oregon Pendleton-La Grande zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4210'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6774' => [
            'name' => 'Oregon Pendleton-La Grande zone (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4210'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6775' => [
            'name' => 'Oregon Portland zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['4211'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6776' => [
            'name' => 'Oregon Portland zone (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['4211'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6777' => [
            'name' => 'Oregon Salem zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4212'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6778' => [
            'name' => 'Oregon Salem zone (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4212'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6779' => [
            'name' => 'Oregon Santiam Pass zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4213'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6780' => [
            'name' => 'Oregon Santiam Pass zone (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4213'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6864' => [
            'name' => 'ITRF96 to NAD83(CORS96) (1)',
            'method' => 'urn:ogc:def:method:EPSG::1056',
            'extent' => ['1511'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6865' => [
            'name' => 'ITRF97 to NAD83(CORS96) (1)',
            'method' => 'urn:ogc:def:method:EPSG::1056',
            'extent' => ['1511'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6866' => [
            'name' => 'ITRF2000 to NAD83(CORS96) (1)',
            'method' => 'urn:ogc:def:method:EPSG::1056',
            'extent' => ['1511'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6869' => [
            'name' => 'Albania TM 2010',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3212'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6873' => [
            'name' => 'Tananarive to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1149'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6877' => [
            'name' => 'Italy zone',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1127'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6878' => [
            'name' => 'Italy zone 12',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1127'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6888' => [
            'name' => 'Ocotepeque 1935 to NAD27 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3876'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6890' => [
            'name' => 'Ocotepeque 1935 to CR05 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3232'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6895' => [
            'name' => 'Viti Levu 1912 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3195'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6896' => [
            'name' => 'Accra to WGS 84 (4)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3252'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6897' => [
            'name' => 'St. Lucia 1955 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3298'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6899' => [
            'name' => 'Pulkovo 1942 to WGS 84 (21)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3246'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6900' => [
            'name' => 'Observatario to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1329'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6903' => [
            'name' => 'Yoff to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1207'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6904' => [
            'name' => 'Arc 1950 to WGS 84 (11)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1150'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6905' => [
            'name' => 'AGD66 to WGS 84 (20)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['2575'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6906' => [
            'name' => 'Arc 1950 to WGS 84 (10)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1261'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6907' => [
            'name' => 'Ayabelle Lighthouse to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3238'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6908' => [
            'name' => 'Fahud to WGS 84 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['4009'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6909' => [
            'name' => 'Hjorsey 1955 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6910' => [
            'name' => 'Aden 1925 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1340'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6911' => [
            'name' => 'Bekaa Valley 1920 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3269'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6912' => [
            'name' => 'Bioko to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['4220'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6913' => [
            'name' => 'Gambia to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3250'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6920' => [
            'name' => 'Kansas DOT Lambert (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['1385'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6921' => [
            'name' => 'Kansas DOT Lambert (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['1385'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6926' => [
            'name' => 'South East Island 1943 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent' => ['4183'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6928' => [
            'name' => 'US NSIDC EASE-Grid 2.0 Global',
            'method' => 'urn:ogc:def:method:EPSG::9835',
            'extent' => ['3463'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6929' => [
            'name' => 'US NSIDC EASE-Grid 2.0 North',
            'method' => 'urn:ogc:def:method:EPSG::9820',
            'extent' => ['3475'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6930' => [
            'name' => 'US NSIDC EASE-Grid 2.0 South',
            'method' => 'urn:ogc:def:method:EPSG::9820',
            'extent' => ['3474'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6935' => [
            'name' => 'IGS08 to IGRS (1)',
            'method' => 'urn:ogc:def:method:EPSG::1061',
            'extent' => ['1124'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6936' => [
            'name' => 'IGS08 to IGRS (2)',
            'method' => 'urn:ogc:def:method:EPSG::1033',
            'extent' => ['1124'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6937' => [
            'name' => 'AGD66 to PNG94 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent' => ['4214'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6939' => [
            'name' => 'AGD66 to PNG94 (4)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent' => ['4013'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6941' => [
            'name' => 'AGD66 to PNG94 (6)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent' => ['4216'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6948' => [
            'name' => 'RD/83 to ETRS89 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9615',
            'extent' => ['2545'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6949' => [
            'name' => 'PSAD56 to SIRGAS-Chile 2002 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['4231'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6950' => [
            'name' => 'PSAD56 to SIRGAS-Chile 2002 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['4222'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6951' => [
            'name' => 'PSAD56 to SIRGAS-Chile 2002 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['4221'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6960' => [
            'name' => 'VN-2000 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent' => ['3328'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6961' => [
            'name' => 'Albania LCC 2010',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['1025'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6965' => [
            'name' => 'Michigan CS27 North zone',
            'method' => 'urn:ogc:def:method:EPSG::1051',
            'extent' => ['1723'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6968' => [
            'name' => 'SAD69 to SIRGAS-Chile 2002 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['4224'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6970' => [
            'name' => 'SAD69 to SIRGAS-Chile 2002 (4)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['2805'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6971' => [
            'name' => 'PSAD56 to WGS 84 (15)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['4231'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6972' => [
            'name' => 'PSAD56 to WGS 84 (16)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['4222'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6973' => [
            'name' => 'PSAD56 to WGS 84 (17)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['4221'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6974' => [
            'name' => 'SAD69 to WGS 84 (17)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['4232'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6975' => [
            'name' => 'SAD69 to WGS 84 (18)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['4224'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6976' => [
            'name' => 'SAD69 to WGS 84 (19)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['4221'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6977' => [
            'name' => 'SAD69 to WGS 84 (20)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['2805'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6992' => [
            'name' => 'IGD05 to IGD05/12',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent' => ['1126'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6993' => [
            'name' => 'IGD05/12 to IG05/12 Intermediate CRS',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent' => ['2603'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6999' => [
            'name' => 'Nahrwan 1967 to WGS 84 (12)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent' => ['4225'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7033' => [
            'name' => 'Nahrwan 1934 to WGS 84 (6)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3625'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7043' => [
            'name' => 'Iowa regional zone 1 Spencer',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['4164'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7044' => [
            'name' => 'Iowa regional zone 2 Mason City',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['4219'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7045' => [
            'name' => 'Iowa regional zone 3 Elkader',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4230'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7046' => [
            'name' => 'Iowa regional zone 4 Sioux City-Iowa Falls',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['4233'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7047' => [
            'name' => 'Iowa regional zone 5 Waterloo',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['4234'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7048' => [
            'name' => 'Iowa regional zone 6 Council Bluffs',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4235'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7049' => [
            'name' => 'Iowa regional zone 7 Carroll-Atlantic',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4236'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7050' => [
            'name' => 'Iowa regional zone 8 Ames-Des Moines',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4237'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7051' => [
            'name' => 'Iowa regional zone 9 Newton',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4239'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7052' => [
            'name' => 'Iowa regional zone 10 Cedar Rapids',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['4240'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7053' => [
            'name' => 'Iowa regional zone 11 Dubuque-Davenport',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4241'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7054' => [
            'name' => 'Iowa regional zone 12 Red Oak-Ottumwa',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['4242'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7055' => [
            'name' => 'Iowa regional zone 13 Fairfield',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4243'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7056' => [
            'name' => 'Iowa regional zone 14 Burlington',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4244'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7083' => [
            'name' => 'Perroud 1950 to RGTAAF07 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['2817'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7089' => [
            'name' => 'Montana Blackfeet St Mary Valley (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4310'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7090' => [
            'name' => 'Montana Blackfeet St Mary Valley (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4310'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7091' => [
            'name' => 'Montana Blackfeet (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4311'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7092' => [
            'name' => 'Montana Blackfeet (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4311'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7093' => [
            'name' => 'Montana Milk River (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['4312'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7094' => [
            'name' => 'Montana Milk River (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['4312'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7095' => [
            'name' => 'Montana Fort Belknap (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['4313'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7096' => [
            'name' => 'Montana Fort Belknap (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['4313'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7097' => [
            'name' => 'Montana Fort Peck Assiniboine (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['4314'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7098' => [
            'name' => 'Montana Fort Peck Assiniboine (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['4314'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7099' => [
            'name' => 'Montana Fort Peck Sioux (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['4315'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7100' => [
            'name' => 'Montana Fort Peck Sioux (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['4315'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7101' => [
            'name' => 'Montana Crow (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4316'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7102' => [
            'name' => 'Montana Crow (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4316'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7103' => [
            'name' => 'Montana Bobcat (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['4317'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7104' => [
            'name' => 'Montana Bobcat (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['4317'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7105' => [
            'name' => 'Montana Billings (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['4318'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7106' => [
            'name' => 'Montana Billings (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['4318'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7107' => [
            'name' => 'Wyoming Wind River (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4319'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7108' => [
            'name' => 'Wyoming Wind River (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4319'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7129' => [
            'name' => 'City and County of San Francisco CS13 (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4228'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7130' => [
            'name' => 'City and County of San Francisco CS13 (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4228'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7140' => [
            'name' => 'IGD05 to IG05 Intermediate CRS',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent' => ['2603'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7141' => [
            'name' => 'Palestine Grid modified',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1356'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7143' => [
            'name' => 'InGCS Adams (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4289'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7144' => [
            'name' => 'InGCS Adams (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4289'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7145' => [
            'name' => 'InGCS Allen (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4285'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7146' => [
            'name' => 'InGCS Allen (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4285'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7147' => [
            'name' => 'InGCS Bartholomew (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4302'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7148' => [
            'name' => 'InGCS Bartholomew (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4302'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7149' => [
            'name' => 'InGCS Benton (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4256'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7150' => [
            'name' => 'InGCS Benton (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4256'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7151' => [
            'name' => 'InGCS Blackford-Delaware (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4291'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7152' => [
            'name' => 'InGCS Blackford-Delaware (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4291'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7153' => [
            'name' => 'InGCS Boone-Hendricks (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4263'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7154' => [
            'name' => 'InGCS Boone-Hendricks (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4263'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7155' => [
            'name' => 'InGCS Brown (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4301'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7156' => [
            'name' => 'InGCS Brown (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4301'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7157' => [
            'name' => 'InGCS Carroll (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4258'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7158' => [
            'name' => 'InGCS Carroll (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4258'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7159' => [
            'name' => 'InGCS Cass (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4286'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7160' => [
            'name' => 'InGCS Cass (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4286'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7161' => [
            'name' => 'InGCS Clark-Floyd-Scott (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4308'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7162' => [
            'name' => 'InGCS Clark-Floyd-Scott (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4308'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7163' => [
            'name' => 'InGCS Clay (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4265'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7164' => [
            'name' => 'InGCS Clay (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4265'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7165' => [
            'name' => 'InGCS Clinton (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4260'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7166' => [
            'name' => 'InGCS Clinton (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4260'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7167' => [
            'name' => 'InGCS Crawford-Lawrence-Orange (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4272'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7168' => [
            'name' => 'InGCS Crawford-Lawrence-Orange (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4272'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7169' => [
            'name' => 'InGCS Daviess-Greene (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4269'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7170' => [
            'name' => 'InGCS Daviess-Greene (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4269'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7171' => [
            'name' => 'InGCS Dearborn-Ohio-Switzerland (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4306'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7172' => [
            'name' => 'InGCS Dearborn-Ohio-Switzerland (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4306'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7173' => [
            'name' => 'InGCS Decatur-Rush (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4299'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7174' => [
            'name' => 'InGCS Decatur-Rush (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4299'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7175' => [
            'name' => 'InGCS DeKalb (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4283'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7176' => [
            'name' => 'InGCS DeKalb (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4283'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7177' => [
            'name' => 'InGCS Dubois-Martin (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4271'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7178' => [
            'name' => 'InGCS Dubois-Martin (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4271'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7179' => [
            'name' => 'InGCS Elkhart-Kosciusko-Wabash (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4280'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7180' => [
            'name' => 'InGCS Elkhart-Kosciusko-Wabash (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4280'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7181' => [
            'name' => 'InGCS Fayette-Franklin-Union (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4300'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7182' => [
            'name' => 'InGCS Fayette-Franklin-Union (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4300'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7183' => [
            'name' => 'InGCS Fountain-Warren (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4259'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7184' => [
            'name' => 'InGCS Fountain-Warren (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4259'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7185' => [
            'name' => 'InGCS Fulton-Marshall-St. Joseph (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4279'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7186' => [
            'name' => 'InGCS Fulton-Marshall-St. Joseph (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4279'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7187' => [
            'name' => 'InGCS Gibson (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4273'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7188' => [
            'name' => 'InGCS Gibson (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4273'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7189' => [
            'name' => 'InGCS Grant (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4290'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7190' => [
            'name' => 'InGCS Grant (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4290'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7191' => [
            'name' => 'InGCS Hamilton-Tipton (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4293'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7192' => [
            'name' => 'InGCS Hamilton-Tipton (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4293'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7193' => [
            'name' => 'InGCS Hancock-Madison (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4294'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7194' => [
            'name' => 'InGCS Hancock-Madison (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4294'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7195' => [
            'name' => 'InGCS Harrison-Washington (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4307'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7196' => [
            'name' => 'InGCS Harrison-Washington (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4307'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7197' => [
            'name' => 'InGCS Henry (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4296'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7198' => [
            'name' => 'InGCS Henry (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4296'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7199' => [
            'name' => 'InGCS Howard-Miami (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4287'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7200' => [
            'name' => 'InGCS Howard-Miami (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4287'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7201' => [
            'name' => 'InGCS Huntington-Whitley (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4284'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7202' => [
            'name' => 'InGCS Huntington-Whitley (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4284'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7203' => [
            'name' => 'InGCS Jackson (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4303'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7204' => [
            'name' => 'InGCS Jackson (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4303'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7205' => [
            'name' => 'InGCS Jasper-Porter (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4254'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7206' => [
            'name' => 'InGCS Jasper-Porter (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4254'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7207' => [
            'name' => 'InGCS Jay (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4292'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7208' => [
            'name' => 'InGCS Jay (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4292'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7209' => [
            'name' => 'InGCS Jefferson (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4309'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7210' => [
            'name' => 'InGCS Jefferson (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4309'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7211' => [
            'name' => 'InGCS Jennings (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4304'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7212' => [
            'name' => 'InGCS Jennings (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4304'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7213' => [
            'name' => 'InGCS Johnson-Marion (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4297'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7214' => [
            'name' => 'InGCS Johnson-Marion (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4297'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7215' => [
            'name' => 'InGCS Knox (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4270'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7216' => [
            'name' => 'InGCS Knox (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4270'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7217' => [
            'name' => 'InGCS LaGrange-Noble (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4281'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7218' => [
            'name' => 'InGCS LaGrange-Noble (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4281'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7219' => [
            'name' => 'InGCS Lake-Newton (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4253'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7220' => [
            'name' => 'InGCS Lake-Newton (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4253'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7221' => [
            'name' => 'InGCS LaPorte-Pulaski-Starke (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4255'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7222' => [
            'name' => 'InGCS LaPorte-Pulaski-Starke (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4255'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7223' => [
            'name' => 'InGCS Monroe-Morgan (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4267'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7224' => [
            'name' => 'InGCS Monroe-Morgan (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4267'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7225' => [
            'name' => 'InGCS Montgomery-Putnam (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7226' => [
            'name' => 'InGCS Montgomery-Putnam (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7227' => [
            'name' => 'InGCS Owen (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4266'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7228' => [
            'name' => 'InGCS Owen (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4266'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7229' => [
            'name' => 'InGCS Parke-Vermillion (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4261'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7230' => [
            'name' => 'InGCS Parke-Vermillion (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4261'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7231' => [
            'name' => 'InGCS Perry (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4278'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7232' => [
            'name' => 'InGCS Perry (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4278'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7233' => [
            'name' => 'InGCS Pike-Warrick (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4274'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7234' => [
            'name' => 'InGCS Pike-Warrick (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4274'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7235' => [
            'name' => 'InGCS Posey (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4275'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7236' => [
            'name' => 'InGCS Posey (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4275'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7237' => [
            'name' => 'InGCS Randolph-Wayne (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4295'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7238' => [
            'name' => 'InGCS Randolph-Wayne (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4295'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7239' => [
            'name' => 'InGCS Ripley (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4305'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7240' => [
            'name' => 'InGCS Ripley (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4305'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7241' => [
            'name' => 'InGCS Shelby (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4298'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7242' => [
            'name' => 'InGCS Shelby (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4298'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7243' => [
            'name' => 'InGCS Spencer (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4277'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7244' => [
            'name' => 'InGCS Spencer (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4277'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7245' => [
            'name' => 'InGCS Steuben (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4282'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7246' => [
            'name' => 'InGCS Steuben (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4282'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7247' => [
            'name' => 'InGCS Sullivan (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4268'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7248' => [
            'name' => 'InGCS Sullivan (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4268'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7249' => [
            'name' => 'InGCS Tippecanoe-White (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4257'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7250' => [
            'name' => 'InGCS Tippecanoe-White (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4257'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7251' => [
            'name' => 'InGCS Vanderburgh (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4276'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7252' => [
            'name' => 'InGCS Vanderburgh (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4276'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7253' => [
            'name' => 'InGCS Vigo (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4264'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7254' => [
            'name' => 'InGCS Vigo (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4264'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7255' => [
            'name' => 'InGCS Wells (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4288'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7256' => [
            'name' => 'InGCS Wells (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4288'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7377' => [
            'name' => 'ONGD14 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1032',
            'extent' => ['1183'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7378' => [
            'name' => 'WISCRS Ashland County (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4320'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7379' => [
            'name' => 'WISCRS Ashland County (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4320'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7380' => [
            'name' => 'WISCRS Bayfield County (m)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['4321'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7381' => [
            'name' => 'WISCRS Bayfield County (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['4321'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7382' => [
            'name' => 'WISCRS Burnett County (m)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['4325'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7383' => [
            'name' => 'WISCRS Burnett County (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['4325'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7384' => [
            'name' => 'WISCRS Douglas County (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4326'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7385' => [
            'name' => 'WISCRS Douglas County (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4326'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7386' => [
            'name' => 'WISCRS Florence County (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4327'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7387' => [
            'name' => 'WISCRS Florence County (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4327'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7388' => [
            'name' => 'WISCRS Forest County (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4328'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7389' => [
            'name' => 'WISCRS Forest County (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4328'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7390' => [
            'name' => 'WISCRS Iron County (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4329'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7391' => [
            'name' => 'WISCRS Iron County (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4329'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7392' => [
            'name' => 'WISCRS Oneida County (m)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['4330'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7393' => [
            'name' => 'WISCRS Oneida County (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['4330'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7394' => [
            'name' => 'WISCRS Price County (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4332'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7395' => [
            'name' => 'WISCRS Price County (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4332'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7396' => [
            'name' => 'WISCRS Sawyer County (m)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['4333'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7397' => [
            'name' => 'WISCRS Sawyer County (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['4333'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7398' => [
            'name' => 'WISCRS Vilas County (m)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['4334'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7399' => [
            'name' => 'WISCRS Vilas County (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['4334'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7424' => [
            'name' => 'WISCRS Washburn County (m)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['4335'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7425' => [
            'name' => 'WISCRS Washburn County (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['4335'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7426' => [
            'name' => 'WISCRS Barron County (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4331'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7427' => [
            'name' => 'WISCRS Barron County (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4331'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7428' => [
            'name' => 'WISCRS Brown County (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4336'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7429' => [
            'name' => 'WISCRS Brown County (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4336'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7430' => [
            'name' => 'WISCRS Buffalo County (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4337'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7431' => [
            'name' => 'WISCRS Buffalo County (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4337'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7432' => [
            'name' => 'WISCRS Chippewa County (m)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['4338'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7433' => [
            'name' => 'WISCRS Chippewa County (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['4338'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7434' => [
            'name' => 'WISCRS Clark County (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4339'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7435' => [
            'name' => 'WISCRS Clark County (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4339'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7436' => [
            'name' => 'WISCRS Door County (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4340'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7437' => [
            'name' => 'WISCRS Door County (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4340'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7438' => [
            'name' => 'WISCRS Dunn County (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4341'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7439' => [
            'name' => 'WISCRS Dunn County (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4341'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7440' => [
            'name' => 'WISCRS Eau Claire County (m)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['4342'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7441' => [
            'name' => 'WISCRS Eau Claire County (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['4342'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7448' => [
            'name' => 'SAD69 to SIRGAS-Chile 2002 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['4232'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7449' => [
            'name' => 'SAD69 to SIRGAS-Chile 2002 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['4221'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7450' => [
            'name' => 'WISCRS Jackson County (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4343'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7451' => [
            'name' => 'WISCRS Jackson County (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4343'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7452' => [
            'name' => 'WISCRS Langlade County (m)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['4344'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7453' => [
            'name' => 'WISCRS Langlade County (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['4344'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7454' => [
            'name' => 'WISCRS Lincoln County (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4345'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7455' => [
            'name' => 'WISCRS Lincoln County (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4345'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7456' => [
            'name' => 'WISCRS Marathon County (m)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['4346'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7457' => [
            'name' => 'WISCRS Marathon County (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['4346'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7458' => [
            'name' => 'WISCRS Marinette County (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4347'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7459' => [
            'name' => 'WISCRS Marinette County (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4347'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7460' => [
            'name' => 'WISCRS Menominee County (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4348'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7461' => [
            'name' => 'WISCRS Menominee County (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4348'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7462' => [
            'name' => 'WISCRS Oconto County (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4349'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7463' => [
            'name' => 'WISCRS Oconto County (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4349'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7464' => [
            'name' => 'WISCRS Pepin and Pierce Counties (m)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['4350'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7465' => [
            'name' => 'WISCRS Pepin and Pierce Counties (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['4350'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7466' => [
            'name' => 'WISCRS Polk County (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4351'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7467' => [
            'name' => 'WISCRS Polk County (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4351'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7468' => [
            'name' => 'WISCRS Portage County (m)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['4352'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7469' => [
            'name' => 'WISCRS Portage County (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['4352'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7470' => [
            'name' => 'WISCRS Rusk County (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4353'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7471' => [
            'name' => 'WISCRS Rusk County (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4353'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7472' => [
            'name' => 'WISCRS Shawano County (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4354'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7473' => [
            'name' => 'WISCRS Shawano County (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4354'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7474' => [
            'name' => 'WISCRS St. Croix County (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4355'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7475' => [
            'name' => 'WISCRS St. Croix County (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4355'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7476' => [
            'name' => 'WISCRS Taylor County (m)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['4356'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7477' => [
            'name' => 'WISCRS Taylor County (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['4356'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7478' => [
            'name' => 'WISCRS Trempealeau County (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4357'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7479' => [
            'name' => 'WISCRS Trempealeau County (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4357'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7480' => [
            'name' => 'WISCRS Waupaca County (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4358'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7481' => [
            'name' => 'WISCRS Waupaca County (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4358'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7482' => [
            'name' => 'WISCRS Wood County (m)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['4359'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7483' => [
            'name' => 'WISCRS Wood County (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['4359'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7484' => [
            'name' => 'WISCRS Adams and Juneau Counties (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4360'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7485' => [
            'name' => 'WISCRS Adams and Juneau Counties (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4360'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7486' => [
            'name' => 'WISCRS Calumet, Fond du Lac, Outagamie and Winnebago Counties (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4361'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7487' => [
            'name' => 'WISCRS Calumet, Fond du Lac, Outagamie and Winnebago Counties (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4361'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7488' => [
            'name' => 'WISCRS Columbia County (m)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['4362'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7489' => [
            'name' => 'WISCRS Columbia County (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['4362'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7490' => [
            'name' => 'WISCRS Crawford County (m)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['4363'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7491' => [
            'name' => 'WISCRS Crawford County (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['4363'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7492' => [
            'name' => 'WISCRS Dane County (m)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['4364'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7493' => [
            'name' => 'WISCRS Dane County (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['4364'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7494' => [
            'name' => 'WISCRS Dodge and Jefferson Counties (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4365'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7495' => [
            'name' => 'WISCRS Dodge and Jefferson Counties (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4365'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7496' => [
            'name' => 'WISCRS Grant County (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4366'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7497' => [
            'name' => 'WISCRS Grant County (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4366'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7498' => [
            'name' => 'WISCRS Green and Lafayette Counties (m)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['4367'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7499' => [
            'name' => 'WISCRS Green and Lafayette Counties (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['4367'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7500' => [
            'name' => 'WISCRS Green Lake and Marquette Counties (m)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['4368'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7501' => [
            'name' => 'WISCRS Green Lake and Marquette Counties (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['4368'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7502' => [
            'name' => 'WISCRS Iowa County (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4369'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7503' => [
            'name' => 'WISCRS Iowa County (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4369'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7504' => [
            'name' => 'WISCRS Kenosha, Milwaukee, Ozaukee and Racine Counties (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4370'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7505' => [
            'name' => 'WISCRS Kenosha, Milwaukee, Ozaukee and Racine Counties (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4370'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7506' => [
            'name' => 'WISCRS Kewaunee, Manitowoc and Sheboygan Counties (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4371'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7507' => [
            'name' => 'WISCRS Kewaunee, Manitowoc and Sheboygan Counties (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4371'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7508' => [
            'name' => 'WISCRS La Crosse County (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4372'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7509' => [
            'name' => 'WISCRS La Crosse County (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4372'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7510' => [
            'name' => 'WISCRS Monroe County (m)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['4373'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7511' => [
            'name' => 'WISCRS Monroe County (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['4373'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7512' => [
            'name' => 'WISCRS Richland County (m)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['4374'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7513' => [
            'name' => 'WISCRS Richland County (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['4374'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7514' => [
            'name' => 'WISCRS Rock County (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4375'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7515' => [
            'name' => 'WISCRS Rock County (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4375'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7516' => [
            'name' => 'WISCRS Sauk County (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4376'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7517' => [
            'name' => 'WISCRS Sauk County (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4376'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7518' => [
            'name' => 'WISCRS Vernon County (m)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['4377'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7519' => [
            'name' => 'WISCRS Vernon County (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['4377'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7520' => [
            'name' => 'WISCRS Walworth County (m)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['4378'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7521' => [
            'name' => 'WISCRS Walworth County (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['4378'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7522' => [
            'name' => 'WISCRS Washington County (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4379'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7523' => [
            'name' => 'WISCRS Washington County (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4379'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7524' => [
            'name' => 'WISCRS Waukesha County (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4380'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7525' => [
            'name' => 'WISCRS Waukesha County (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4380'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7526' => [
            'name' => 'WISCRS Waushara County (m)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['4381'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7527' => [
            'name' => 'WISCRS Waushara County (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['4381'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7648' => [
            'name' => 'NAD83(MA11) to GUVD04 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::9665',
            'extent' => ['3255'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7649' => [
            'name' => 'NAD83(MA11) to NMVD03 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::9665',
            'extent' => ['4171'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7650' => [
            'name' => 'NAD83(PA11) to ASVD02 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::9665',
            'extent' => ['2288'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7653' => [
            'name' => 'EGM96 height to Kumul 34 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::9616',
            'extent' => ['4013'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7654' => [
            'name' => 'EGM2008 height to Kiunga height (1)',
            'method' => 'urn:ogc:def:method:EPSG::9616',
            'extent' => ['4383'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7666' => [
            'name' => 'WGS 84 (G1762) to ITRF2008 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1032',
            'extent' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7667' => [
            'name' => 'WGS 84 (G1674) to WGS 84 (G1762) (1)',
            'method' => 'urn:ogc:def:method:EPSG::1032',
            'extent' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7668' => [
            'name' => 'WGS 84 (G1150) to WGS 84 (G1762) (1)',
            'method' => 'urn:ogc:def:method:EPSG::1032',
            'extent' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7669' => [
            'name' => 'WGS 84 (G1674) to ITRF2008 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1032',
            'extent' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7670' => [
            'name' => 'WGS 84 (G1150) to ITRF2000 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1032',
            'extent' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7672' => [
            'name' => 'WGS 84 (G730) to ITRF92 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1032',
            'extent' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7673' => [
            'name' => 'CH1903 to CHTRS95 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9615',
            'extent' => ['1286'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7674' => [
            'name' => 'CH1903 to ETRS89 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9615',
            'extent' => ['1286'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7687' => [
            'name' => 'Kyrgyzstan zone 1',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4385'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7688' => [
            'name' => 'Kyrgyzstan zone 2',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4386'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7689' => [
            'name' => 'Kyrgyzstan zone 3',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4387'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7690' => [
            'name' => 'Kyrgyzstan zone 4',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4388'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7691' => [
            'name' => 'Kyrgyzstan zone 5',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4389'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7697' => [
            'name' => 'Egypt 1907 to WGS 84 (4)',
            'method' => 'urn:ogc:def:method:EPSG::9636',
            'extent' => ['1086'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7698' => [
            'name' => 'NAD27 to WGS 84 (89)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent' => ['3290'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7701' => [
            'name' => 'Latvia 2000 height to EVRF2007 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1046',
            'extent' => ['3268'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7702' => [
            'name' => 'PZ-90 to PZ-90.02 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1066',
            'extent' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7703' => [
            'name' => 'PZ-90.02 to PZ-90.11 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1066',
            'extent' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7705' => [
            'name' => 'GSK-2011 to PZ-90.11 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1066',
            'extent' => ['1198'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7711' => [
            'name' => 'ETRS89 to ODN height (2)',
            'method' => 'urn:ogc:def:method:EPSG::9663',
            'extent' => ['2792'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7712' => [
            'name' => 'ETRS89 to ODN Orkney height (2)',
            'method' => 'urn:ogc:def:method:EPSG::9663',
            'extent' => ['2793'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7713' => [
            'name' => 'ETRS89 to ODN (Offshore) height (1)',
            'method' => 'urn:ogc:def:method:EPSG::9663',
            'extent' => ['4391'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7714' => [
            'name' => 'ETRS89 to Lerwick height (2)',
            'method' => 'urn:ogc:def:method:EPSG::9663',
            'extent' => ['2795'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7715' => [
            'name' => 'ETRS89 to Stornoway height (2)',
            'method' => 'urn:ogc:def:method:EPSG::9663',
            'extent' => ['2799'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7716' => [
            'name' => 'ETRS89 to St. Marys height (2)',
            'method' => 'urn:ogc:def:method:EPSG::9663',
            'extent' => ['2802'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7717' => [
            'name' => 'ETRS89 to Douglas height (2)',
            'method' => 'urn:ogc:def:method:EPSG::9663',
            'extent' => ['2803'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7720' => [
            'name' => 'CGRS93 to ETRS89 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent' => ['3236'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7722' => [
            'name' => 'Survey of India Lambert',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['1121'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7723' => [
            'name' => 'Andhra Pradesh NSF LCC',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['4394'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7724' => [
            'name' => 'Arunachal Pradesh NSF LCC',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['4395'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7725' => [
            'name' => 'Assam NSF LCC',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['4396'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7726' => [
            'name' => 'Bihar NSF LCC',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['4397'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7727' => [
            'name' => 'Delhi NSF LCC',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['4422'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7728' => [
            'name' => 'Gujarat NSF LCC',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['4400'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7729' => [
            'name' => 'Haryana NSF LCC',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['4401'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7730' => [
            'name' => 'Himachal Pradesh NSF LCC',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['4402'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7731' => [
            'name' => 'Jammu and Kashmir NSF LCC',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['4403'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7732' => [
            'name' => 'Jharkhand NSF LCC',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['4404'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7733' => [
            'name' => 'Madhya Pradesh NSF LCC',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['4407'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7734' => [
            'name' => 'Maharashtra NSF LCC',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['4408'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7735' => [
            'name' => 'Manipur NSF LCC',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['4409'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7736' => [
            'name' => 'Meghalaya NSF LCC',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['4410'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7737' => [
            'name' => 'Nagaland NSF LCC',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['4412'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7738' => [
            'name' => 'Northeast India NSF LCC',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['4392'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7739' => [
            'name' => 'Orissa NSF LCC',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['4413'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7740' => [
            'name' => 'Punjab NSF LCC',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['4414'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7741' => [
            'name' => 'Rajasthan NSF LCC',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['4415'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7742' => [
            'name' => 'Uttar Pradesh NSF LCC',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['4419'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7743' => [
            'name' => 'Uttaranchal NSF LCC',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['4420'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7744' => [
            'name' => 'Andaman and Nicobar NSF TM',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4423'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7745' => [
            'name' => 'Chhattisgarh NSF TM',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4398'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7746' => [
            'name' => 'Goa NSF TM',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4399'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7747' => [
            'name' => 'Karnataka NSF TM',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4405'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7748' => [
            'name' => 'Kerala NSF TM',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4406'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7749' => [
            'name' => 'Lakshadweep NSF TM',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4424'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7750' => [
            'name' => 'Mizoram NSF TM',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4411'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7751' => [
            'name' => 'Sikkim NSF TM',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4416'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7752' => [
            'name' => 'Tamil Nadu NSF TM',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4417'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7753' => [
            'name' => 'Tripura NSF TM',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4418'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7754' => [
            'name' => 'West Bengal NSF TM',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4421'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7790' => [
            'name' => 'ITRF2008 to ITRF2014 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7802' => [
            'name' => 'Cadastral Coordinate System 2005',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['3224'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7806' => [
            'name' => 'Pulkovo 1942(83) to BGS2005 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1063',
            'extent' => ['3224'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7807' => [
            'name' => 'ITRF2008 to NAD83(2011) (1)',
            'method' => 'urn:ogc:def:method:EPSG::1056',
            'extent' => ['1511'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7808' => [
            'name' => 'ITRF2008 to NAD83(PA11) (1)',
            'method' => 'urn:ogc:def:method:EPSG::1056',
            'extent' => ['4162'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7809' => [
            'name' => 'ITRF2008 to NAD83(MA11) (1)',
            'method' => 'urn:ogc:def:method:EPSG::1056',
            'extent' => ['4167'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7812' => [
            'name' => 'Height <> Depth Conversion',
            'method' => 'urn:ogc:def:method:EPSG::1068',
            'extent' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7813' => [
            'name' => 'Vertical Axis Unit Conversion',
            'method' => 'urn:ogc:def:method:EPSG::1104',
            'extent' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7817' => [
            'name' => 'UCS-2000 to ITRF2000 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1031',
            'extent' => ['1242'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7818' => [
            'name' => 'CS63 zone X1',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4435'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7819' => [
            'name' => 'CS63 zone X2',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4429'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7820' => [
            'name' => 'CS63 zone X3',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4430'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7821' => [
            'name' => 'CS63 zone X4',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4431'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7822' => [
            'name' => 'CS63 zone X5',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4432'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7823' => [
            'name' => 'CS63 zone X6',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4433'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7824' => [
            'name' => 'CS63 zone X7',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4434'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7833' => [
            'name' => 'Albanian 1987 to ETRS89 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent' => ['3212'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7835' => [
            'name' => 'Pulkovo 1942(58) to WGS 84 (22)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['4446'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7836' => [
            'name' => 'Pulkovo 1942(58) to Albanian 1987 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1025'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7838' => [
            'name' => 'DHHN2016 height to EVRF2007 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1046',
            'extent' => ['3339'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7873' => [
            'name' => 'EGM96 height to POM96 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::9616',
            'extent' => ['4425'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7874' => [
            'name' => 'EGM2008 height to POM08 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::9616',
            'extent' => ['4425'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7875' => [
            'name' => 'St. Helena Local Grid 1971',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3183'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7876' => [
            'name' => 'St. Helena Local Grid (Tritan)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3183'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7892' => [
            'name' => 'SHGD2015 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3183'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7894' => [
            'name' => 'Astro DOS 71 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3183'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7895' => [
            'name' => 'Astro DOS 71 to SHGD2015 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent' => ['3183'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7897' => [
            'name' => 'St. Helena Tritan to SHGD2015 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3183'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7932' => [
            'name' => 'ITRF89 to ETRF89 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent' => ['1298'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7933' => [
            'name' => 'ITRF90 to ETRF90 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent' => ['1298'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7934' => [
            'name' => 'ITRF91 to ETRF91 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent' => ['1298'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7935' => [
            'name' => 'ITRF92 to ETRF92 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent' => ['1298'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7936' => [
            'name' => 'ITRF93 to ETRF93 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent' => ['1298'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7937' => [
            'name' => 'ITRF94 to ETRF94 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent' => ['1298'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7938' => [
            'name' => 'ITRF96 to ETRF96 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent' => ['1298'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7939' => [
            'name' => 'ITRF97 to ETRF97 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent' => ['1298'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7940' => [
            'name' => 'ITRF2000 to ETRF2000 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent' => ['1298'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7953' => [
            'name' => 'ETRS89 to OSGB36 / British National Grid (3)',
            'method' => 'urn:ogc:def:method:EPSG::9633',
            'extent' => ['4390'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7958' => [
            'name' => 'ETRS89 to Belfast height (2)',
            'method' => 'urn:ogc:def:method:EPSG::1072',
            'extent' => ['2530'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7959' => [
            'name' => 'ETRS89 to Malin Head height (2)',
            'method' => 'urn:ogc:def:method:EPSG::1072',
            'extent' => ['1305'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7960' => [
            'name' => 'PZ-90.11 to ITRF2008 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1066',
            'extent' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7961' => [
            'name' => 'WGS 84 (G1150) to PZ-90.02 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1066',
            'extent' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7964' => [
            'name' => 'Poolbeg height (m) to Malin Head height (1)',
            'method' => 'urn:ogc:def:method:EPSG::9616',
            'extent' => ['1305'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7966' => [
            'name' => 'Poolbeg height (m) to Belfast height (1)',
            'method' => 'urn:ogc:def:method:EPSG::9616',
            'extent' => ['2530'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7969' => [
            'name' => 'NGVD29 height (m) to NAVD88 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1084',
            'extent' => ['2950'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7970' => [
            'name' => 'NGVD29 height (m) to NAVD88 height (2)',
            'method' => 'urn:ogc:def:method:EPSG::1084',
            'extent' => ['2949'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7971' => [
            'name' => 'NGVD29 height (m) to NAVD88 height (3)',
            'method' => 'urn:ogc:def:method:EPSG::1084',
            'extent' => ['2948'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7977' => [
            'name' => 'HKPD depth to HKCD depth (1)',
            'method' => 'urn:ogc:def:method:EPSG::9616',
            'extent' => ['3335'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7980' => [
            'name' => 'KOC CD height to KOC WD height (1)',
            'method' => 'urn:ogc:def:method:EPSG::9616',
            'extent' => ['3267'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7981' => [
            'name' => 'Kuwait PWD height to KOC WD height (1)',
            'method' => 'urn:ogc:def:method:EPSG::9616',
            'extent' => ['3267'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7993' => [
            'name' => 'Albany Grid 2020',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4439'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7994' => [
            'name' => 'Barrow Island Grid 2020',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4438'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7995' => [
            'name' => 'Broome Grid 2020',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4441'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7996' => [
            'name' => 'Busselton Coastal Grid',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4437'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7997' => [
            'name' => 'Carnarvon Grid 2020',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4442'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7998' => [
            'name' => 'Christmas Island Grid 2020',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4169'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7999' => [
            'name' => 'Cocos Island Grid 2020',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1069'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8000' => [
            'name' => 'Collie Grid 2020',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4443'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8001' => [
            'name' => 'Esperance Grid 2020',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4445'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8002' => [
            'name' => 'Exmouth Grid 2020',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4448'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8003' => [
            'name' => 'Geraldton Coastal Grid',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4449'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8004' => [
            'name' => 'Goldfields Grid 2020',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4436'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8005' => [
            'name' => 'Jurien Coastal Grid',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4440'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8006' => [
            'name' => 'Kalbarri Grid 2020',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4444'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8007' => [
            'name' => 'Karratha Grid 2020',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4451'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8008' => [
            'name' => 'Kununurra Grid 2020',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4452'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8009' => [
            'name' => 'Lancelin Coastal Grid',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4453'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8010' => [
            'name' => 'Margaret River Coastal Grid',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4457'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8011' => [
            'name' => 'Perth Coastal Grid',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4462'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8012' => [
            'name' => 'Port Hedland Grid 2020',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4466'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8033' => [
            'name' => 'TM Zone 20N (US survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4467'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8034' => [
            'name' => 'TM Zone 21N (US survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4468'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8040' => [
            'name' => 'Gusterberg Grid',
            'method' => 'urn:ogc:def:method:EPSG::9806',
            'extent' => ['4455'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8041' => [
            'name' => 'St. Stephen Grid',
            'method' => 'urn:ogc:def:method:EPSG::9806',
            'extent' => ['4456'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8048' => [
            'name' => 'GDA94 to GDA2020 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent' => ['4177'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8049' => [
            'name' => 'ITRF2014 to GDA2020 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1056',
            'extent' => ['4177'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8061' => [
            'name' => 'Pima County zone 1 East (ft)',
            'method' => 'urn:ogc:def:method:EPSG::9815',
            'extent' => ['4472'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8062' => [
            'name' => 'Pima County zone 2 Central (ft)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4460'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8063' => [
            'name' => 'Pima County zone 3 West (ft)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4450'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8064' => [
            'name' => 'Pima County zone 4 Mt. Lemmon (ft)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['4473'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8069' => [
            'name' => 'ITRF88 to ITRF2014 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8070' => [
            'name' => 'ITRF89 to ITRF2014 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8071' => [
            'name' => 'ITRF90 to ITRF2014 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8072' => [
            'name' => 'ITRF91 to ITRF2014 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8073' => [
            'name' => 'ITRF92 to ITRF2014 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8074' => [
            'name' => 'ITRF93 to ITRF2014 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8075' => [
            'name' => 'ITRF94 to ITRF2014 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8076' => [
            'name' => 'ITRF96 to ITRF2014 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8077' => [
            'name' => 'ITRF97 to ITRF2014 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8078' => [
            'name' => 'ITRF2000 to ITRF2014 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8079' => [
            'name' => 'ITRF2005 to ITRF2014 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8080' => [
            'name' => 'MTM Nova Scotia 2010 zone 4',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1534'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8081' => [
            'name' => 'MTM Nova Scotia 2010 zone 5',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1535'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8087' => [
            'name' => 'Iceland Lambert 2016',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['1120'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8256' => [
            'name' => 'ITRF92 to NAD83(CSRS96) (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent' => ['1061'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8257' => [
            'name' => 'ITRF93 to NAD83(CSRS96) (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent' => ['1061'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8258' => [
            'name' => 'ITRF94 to NAD83(CSRS96) (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent' => ['1061'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8259' => [
            'name' => 'ITRF96 to NAD83(CSRS)v2 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent' => ['1061'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8260' => [
            'name' => 'ITRF97 to NAD83(CSRS)v3 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent' => ['1061'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8261' => [
            'name' => 'ITRF2000 to NAD83(CSRS)v4 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent' => ['1061'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8264' => [
            'name' => 'ITRF2008 to NAD83(CSRS)v6 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent' => ['1061'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8265' => [
            'name' => 'ITRF2014 to NAD83(CSRS)v7 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent' => ['1061'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8270' => [
            'name' => 'Saint Pierre et Miquelon 1950 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3299'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8273' => [
            'name' => 'Oregon Burns-Harper zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4459'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8274' => [
            'name' => 'Oregon Burns-Harper zone (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4459'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8275' => [
            'name' => 'Oregon Canyon City-Burns zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4465'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8276' => [
            'name' => 'Oregon Canyon City-Burns zone (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4465'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8277' => [
            'name' => 'Oregon Coast Range North zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['4471'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8278' => [
            'name' => 'Oregon Coast Range North zone (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['4471'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8279' => [
            'name' => 'Oregon Dayville-Prairie City zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4474'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8280' => [
            'name' => 'Oregon Dayville-Prairie City zone (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4474'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8281' => [
            'name' => 'Oregon Denio-Burns zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4475'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8282' => [
            'name' => 'Oregon Denio-Burns zone (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4475'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8283' => [
            'name' => 'Oregon Halfway zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['4476'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8284' => [
            'name' => 'Oregon Halfway zone (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['4476'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8285' => [
            'name' => 'Oregon Medford-Diamond Lake zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['4477'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8286' => [
            'name' => 'Oregon Medford-Diamond Lake zone (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['4477'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8287' => [
            'name' => 'Oregon Mitchell zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['4478'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8288' => [
            'name' => 'Oregon Mitchell zone (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['4478'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8289' => [
            'name' => 'Oregon North Central zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['4479'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8290' => [
            'name' => 'Oregon North Central zone (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['4479'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8291' => [
            'name' => 'Oregon Ochoco Summit zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['4481'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8292' => [
            'name' => 'Oregon Ochoco Summit zone (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['4481'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8293' => [
            'name' => 'Oregon Owyhee zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4482'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8294' => [
            'name' => 'Oregon Owyhee zone (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4482'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8295' => [
            'name' => 'Oregon Pilot Rock-Ukiah zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['4483'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8296' => [
            'name' => 'Oregon Pilot Rock-Ukiah zone (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['4483'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8297' => [
            'name' => 'Oregon Prairie City-Brogan zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['4484'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8298' => [
            'name' => 'Oregon Prairie City-Brogan zone (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['4484'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8299' => [
            'name' => 'Oregon Riley-Lakeview zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4458'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8300' => [
            'name' => 'Oregon Riley-Lakeview zone (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4458'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8301' => [
            'name' => 'Oregon Siskiyou Pass zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['4463'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8302' => [
            'name' => 'Oregon Siskiyou Pass zone (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['4463'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8303' => [
            'name' => 'Oregon Ukiah-Fox zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['4470'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8304' => [
            'name' => 'Oregon Ukiah-Fox zone (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['4470'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8305' => [
            'name' => 'Oregon Wallowa zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4480'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8306' => [
            'name' => 'Oregon Wallowa zone (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4480'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8307' => [
            'name' => 'Oregon Warner Highway zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['4486'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8308' => [
            'name' => 'Oregon Warner Highway zone (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['4486'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8309' => [
            'name' => 'Oregon Willamette Pass zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4488'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8310' => [
            'name' => 'Oregon Willamette Pass zone (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4488'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8361' => [
            'name' => 'ETRS89 to ETRS89 + Baltic 1957 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1088',
            'extent' => ['1211'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8362' => [
            'name' => 'ETRS89 to ETRS89 + EVRF2007 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1088',
            'extent' => ['1211'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8364' => [
            'name' => 'S-JTSK [JTSK03] to S-JTSK (1)',
            'method' => 'urn:ogc:def:method:EPSG::9615',
            'extent' => ['1211'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8365' => [
            'name' => 'ETRS89 to S-JTSK [JTSK03] (1)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent' => ['1211'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8366' => [
            'name' => 'ITRF2014 to ETRF2014 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent' => ['1298'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8367' => [
            'name' => 'S-JTSK [JTSK03] to ETRS89 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent' => ['1211'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8369' => [
            'name' => 'BD72 to ETRS89 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9615',
            'extent' => ['1347'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8372' => [
            'name' => 'RGF93 v2 to NGF-IGN78 height (2)',
            'method' => 'urn:ogc:def:method:EPSG::1073',
            'extent' => ['1327'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8373' => [
            'name' => 'NCRS Las Vegas zone (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4485'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8374' => [
            'name' => 'NCRS Las Vegas zone (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4485'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8375' => [
            'name' => 'NCRS Las Vegas high elevation zone (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4487'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8376' => [
            'name' => 'NCRS Las Vegas high elevation zone (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4487'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8389' => [
            'name' => 'WEIPA94',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4491'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8432' => [
            'name' => 'Macau Grid',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1147'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8435' => [
            'name' => 'Macao 2008 to Macao 1920 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9636',
            'extent' => ['1147'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8436' => [
            'name' => 'Macao 2008 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1147'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8438' => [
            'name' => 'Macao 1920 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9636',
            'extent' => ['1147'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8439' => [
            'name' => 'Hong Kong Geodetic CS to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1118'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8440' => [
            'name' => 'Laborde Grid (Greenwich)',
            'method' => 'urn:ogc:def:method:EPSG::9813',
            'extent' => ['1149'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8447' => [
            'name' => 'GDA94 to GDA2020 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9615',
            'extent' => ['2575'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8448' => [
            'name' => 'GDA2020 to WGS 84 (G1762) (1)',
            'method' => 'urn:ogc:def:method:EPSG::1056',
            'extent' => ['4177'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8450' => [
            'name' => 'GDA2020 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['4177'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8451' => [
            'name' => 'GDA2020 to AHD height (1)',
            'method' => 'urn:ogc:def:method:EPSG::9665',
            'extent' => ['4493'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8452' => [
            'name' => 'Batavia to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1285'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8458' => [
            'name' => 'Kansas regional zone 1 Goodland (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4495'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8459' => [
            'name' => 'Kansas regional zone 2 Colby (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4496'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8490' => [
            'name' => 'Kansas regional zone 3 Oberlin (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4497'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8491' => [
            'name' => 'Kansas regional zone 4 Hays (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4494'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8492' => [
            'name' => 'Kansas regional zone 5 Great Bend (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4498'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8493' => [
            'name' => 'Kansas regional zone 6 Beliot (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4499'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8494' => [
            'name' => 'Kansas regional zone 7 Salina (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4500'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8495' => [
            'name' => 'Kansas regional zone 8 Manhattan (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['4501'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8498' => [
            'name' => 'Kansas regional zone 9 Emporia (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['4502'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8499' => [
            'name' => 'Kansas regional zone 10 Atchison (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['4503'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8500' => [
            'name' => 'Kansas regional zone 11 Kansas City (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['4504'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8501' => [
            'name' => 'Kansas regional zone 12 Ulysses (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4505'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8502' => [
            'name' => 'Kansas regional zone 13 Garden City (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4506'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8503' => [
            'name' => 'Kansas regional zone 14 Dodge City (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4507'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8504' => [
            'name' => 'Kansas regional zone 15 Larned (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4508'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8505' => [
            'name' => 'Kansas regional zone 16 Pratt (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4509'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8506' => [
            'name' => 'Kansas regional zone 17 Wichita (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['4510'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8507' => [
            'name' => 'Kansas regional zone 18 Arkansas City (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['4511'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8515' => [
            'name' => 'Kansas regional zone 19 Coffeyville (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4512'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8516' => [
            'name' => 'Kansas regional zone 20 Pittsburg (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4513'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8546' => [
            'name' => 'St. George Island to NAD83 (2)',
            'method' => 'urn:ogc:def:method:EPSG::1074',
            'extent' => ['1331'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8547' => [
            'name' => 'St. Lawrence Island to NAD83 (2)',
            'method' => 'urn:ogc:def:method:EPSG::1074',
            'extent' => ['1332'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8548' => [
            'name' => 'St. Paul Island to NAD83 (2)',
            'method' => 'urn:ogc:def:method:EPSG::1074',
            'extent' => ['1333'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8549' => [
            'name' => 'NAD27 to NAD83 (8)',
            'method' => 'urn:ogc:def:method:EPSG::1074',
            'extent' => ['1330'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8550' => [
            'name' => 'NAD83 to NAD83(HARN) (48)',
            'method' => 'urn:ogc:def:method:EPSG::1074',
            'extent' => ['2373'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8551' => [
            'name' => 'NAD83(HARN) to NAD83(NSRS2007) (2)',
            'method' => 'urn:ogc:def:method:EPSG::1075',
            'extent' => ['2373'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8552' => [
            'name' => 'NAD83(NSRS2007) to NAD83(2011) (2)',
            'method' => 'urn:ogc:def:method:EPSG::1075',
            'extent' => ['1330'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8555' => [
            'name' => 'NAD27 to NAD83 (7)',
            'method' => 'urn:ogc:def:method:EPSG::1074',
            'extent' => ['4516'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8556' => [
            'name' => 'NAD83 to NAD83(HARN) (47)',
            'method' => 'urn:ogc:def:method:EPSG::1074',
            'extent' => ['4516'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8559' => [
            'name' => 'NAD83(NSRS2007) to NAD83(2011) (1)',
            'method' => 'urn:ogc:def:method:EPSG::1075',
            'extent' => ['4516'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8561' => [
            'name' => 'Old Hawaiian to NAD83 (2)',
            'method' => 'urn:ogc:def:method:EPSG::1074',
            'extent' => ['1334'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8660' => [
            'name' => 'NAD83 to NAD83(HARN) (49)',
            'method' => 'urn:ogc:def:method:EPSG::1074',
            'extent' => ['1334'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8661' => [
            'name' => 'NAD83(HARN) to NAD83(PA11) (1)',
            'method' => 'urn:ogc:def:method:EPSG::1075',
            'extent' => ['1334'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8662' => [
            'name' => 'American Samoa 1962 to NAD83(HARN) (3)',
            'method' => 'urn:ogc:def:method:EPSG::1074',
            'extent' => ['3109'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8665' => [
            'name' => 'Guam 1963 to NAD83(HARN) (2)',
            'method' => 'urn:ogc:def:method:EPSG::1074',
            'extent' => ['4525'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8668' => [
            'name' => 'Puerto Rico to NAD83 (2)',
            'method' => 'urn:ogc:def:method:EPSG::1074',
            'extent' => ['3634'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8669' => [
            'name' => 'NAD83 to NAD83(HARN) (50)',
            'method' => 'urn:ogc:def:method:EPSG::1074',
            'extent' => ['3634'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8673' => [
            'name' => 'NAD83(NSRS2007) to NAD83(2011) (3)',
            'method' => 'urn:ogc:def:method:EPSG::1075',
            'extent' => ['2251'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8674' => [
            'name' => 'La Canoa to PSAD56 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3327'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8680' => [
            'name' => 'MGI 1901 to ETRS89 (7)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent' => ['1050'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8689' => [
            'name' => 'MGI 1901 to Slovenia 1996 (12)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent' => ['3307'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8819' => [
            'name' => 'RSAO13 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1029'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8824' => [
            'name' => 'Ain el Abd to MTRF-2000 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent' => ['3303'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8825' => [
            'name' => 'Idaho Transverse Mercator',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1381'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8827' => [
            'name' => 'Camacupa 2015 to RSAO13 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent' => ['1029'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8829' => [
            'name' => 'Tahiti 79 to RGPF (1)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent' => ['3124'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8831' => [
            'name' => 'Moorea 87 to RGPF (2)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent' => ['3125'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8833' => [
            'name' => 'Tahaa 54 to RGPF (1)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent' => ['2812'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8835' => [
            'name' => 'Fatu Iva 72 to RGPF (1)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent' => ['3133'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8843' => [
            'name' => 'IGN63 Hiva Oa to RGPF (1)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent' => ['3131'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8845' => [
            'name' => 'IGN63 Hiva Oa to RGPF (2)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent' => ['3132'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8847' => [
            'name' => 'IGN72 Nuku Hiva to RGPF (1)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent' => ['2810'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8848' => [
            'name' => 'IGN72 Nuku Hiva to WGS 84 (5)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent' => ['2810'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8849' => [
            'name' => 'IGN72 Nuku Hiva to RGPF (2)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent' => ['3127'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8851' => [
            'name' => 'IGN72 Nuku Hiva to RGPF (3)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent' => ['3128'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8854' => [
            'name' => 'Equal Earth Greenwich',
            'method' => 'urn:ogc:def:method:EPSG::1078',
            'extent' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8855' => [
            'name' => 'Equal Earth Americas',
            'method' => 'urn:ogc:def:method:EPSG::1078',
            'extent' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8856' => [
            'name' => 'Equal Earth Asia-Pacific',
            'method' => 'urn:ogc:def:method:EPSG::1078',
            'extent' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8861' => [
            'name' => 'NAD83(HARN) to NAD83(FBN) (1)',
            'method' => 'urn:ogc:def:method:EPSG::1075',
            'extent' => ['4516'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8862' => [
            'name' => 'NAD83(FBN) to NAD83(NSRS2007) (1)',
            'method' => 'urn:ogc:def:method:EPSG::1075',
            'extent' => ['4516'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8863' => [
            'name' => 'NAD83(HARN) to NAD83(FBN) (2)',
            'method' => 'urn:ogc:def:method:EPSG::1075',
            'extent' => ['3110'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8864' => [
            'name' => 'NAD83(FBN) to NAD83(PA11) (1)',
            'method' => 'urn:ogc:def:method:EPSG::1075',
            'extent' => ['3110'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8865' => [
            'name' => 'NAD83(HARN) to NAD83(FBN) (3)',
            'method' => 'urn:ogc:def:method:EPSG::1075',
            'extent' => ['4525'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8866' => [
            'name' => 'NAD83(FBN) to NAD83(MA11) (1)',
            'method' => 'urn:ogc:def:method:EPSG::1075',
            'extent' => ['4525'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8867' => [
            'name' => 'NAD83(HARN Corrected) to NAD83(FBN) (1)',
            'method' => 'urn:ogc:def:method:EPSG::1075',
            'extent' => ['3634'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8868' => [
            'name' => 'NAD83(FBN) to NAD83(NSRS2007) (2)',
            'method' => 'urn:ogc:def:method:EPSG::1075',
            'extent' => ['3634'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8882' => [
            'name' => 'Camacupa 2015 to WGS 84 (11)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent' => ['1029'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8886' => [
            'name' => 'SVY21 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1210'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8889' => [
            'name' => 'BGS2005 to ETRS89 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1056'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8891' => [
            'name' => 'LKS92 to ETRS89 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1139'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8892' => [
            'name' => 'LKS94 to ETRS89 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1145'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8893' => [
            'name' => 'SRB_ETRS89 to ETRS89 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['4543'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8895' => [
            'name' => 'CHTRS95 to ETRS89 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1286'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8952' => [
            'name' => 'ITRF97 to SIRGAS-CON DGF00P01 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1065',
            'extent' => ['4530'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8953' => [
            'name' => 'ITRF2000 to SIRGAS-CON DGF01P01 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1065',
            'extent' => ['4530'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8954' => [
            'name' => 'ITRF2000 to SIRGAS-CON DGF01P02 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1065',
            'extent' => ['4530'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8955' => [
            'name' => 'ITRF2000 to SIRGAS-CON DGF02P01 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1065',
            'extent' => ['4530'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8956' => [
            'name' => 'ITRF2000 to SIRGAS-CON DGF04P01 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1065',
            'extent' => ['4530'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8957' => [
            'name' => 'ITRF2000 to SIRGAS-CON DGF05P01 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1065',
            'extent' => ['4530'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8958' => [
            'name' => 'ITRF2000 to SIRGAS-CON DGF06P01 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1065',
            'extent' => ['4530'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8959' => [
            'name' => 'IGS05 to SIRGAS-CON DGF07P01 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1065',
            'extent' => ['4530'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8960' => [
            'name' => 'IGS05 to SIRGAS-CON DGF08P01 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1065',
            'extent' => ['4530'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8961' => [
            'name' => 'IGS05 to SIRGAS-CON SIR09P01 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1065',
            'extent' => ['4530'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8962' => [
            'name' => 'ITRF2008 to SIRGAS-CON SIR10P01 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1065',
            'extent' => ['4530'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8963' => [
            'name' => 'ITRF2008 to SIRGAS-CON SIR11P01 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1065',
            'extent' => ['4530'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8964' => [
            'name' => 'IGb08 to SIRGAS-CON SIR13P01 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1065',
            'extent' => ['4530'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8965' => [
            'name' => 'IGb08 to SIRGAS-CON SIR14P01 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1065',
            'extent' => ['4530'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8966' => [
            'name' => 'IGb08 to SIRGAS-CON SIR15P01 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1065',
            'extent' => ['4530'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8967' => [
            'name' => 'IGS14 to SIRGAS-CON SIR17P01 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1065',
            'extent' => ['4530'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8970' => [
            'name' => 'ITRF2014 to NAD83(2011) (1)',
            'method' => 'urn:ogc:def:method:EPSG::1056',
            'extent' => ['1511'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8971' => [
            'name' => 'NAD83 to NAD83(2011) (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3357'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9028' => [
            'name' => 'ITRF97 to IGS97 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1065',
            'extent' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9029' => [
            'name' => 'ITRF2000 to IGS00 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1065',
            'extent' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9030' => [
            'name' => 'ITRF2005 to IGS05 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1065',
            'extent' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9031' => [
            'name' => 'ITRF2008 to IGS08 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1065',
            'extent' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9032' => [
            'name' => 'ITRF2014 to IGS14 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1065',
            'extent' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9033' => [
            'name' => 'IGS97 to IGS00 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9034' => [
            'name' => 'IGS00 to IGb00 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1065',
            'extent' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9035' => [
            'name' => 'IGb00 to IGS05 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9036' => [
            'name' => 'IGS05 to IGS08 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9037' => [
            'name' => 'IGS08 to IGb08 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1065',
            'extent' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9038' => [
            'name' => 'IGb08 to IGS14 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9051' => [
            'name' => 'ITRF94 to SIRGAS 1995 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1065',
            'extent' => ['3448'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9052' => [
            'name' => 'ITRF2000 to SIRGAS 2000 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1065',
            'extent' => ['3418'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9058' => [
            'name' => 'Vietnam TM-3 103-00',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4541'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9076' => [
            'name' => 'WGS 84 (G873) to ITRF94 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1032',
            'extent' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9077' => [
            'name' => 'ITRF2000 to NAD83(MARP00) (1)',
            'method' => 'urn:ogc:def:method:EPSG::1056',
            'extent' => ['4167'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9078' => [
            'name' => 'ITRF2000 to NAD83(PACP00) (1)',
            'method' => 'urn:ogc:def:method:EPSG::1056',
            'extent' => ['4162'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9105' => [
            'name' => 'ATS77 to NAD83 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9615',
            'extent' => ['2313'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9106' => [
            'name' => 'ATS77 to NAD83(CSRS)v6 (4)',
            'method' => 'urn:ogc:def:method:EPSG::9615',
            'extent' => ['2313'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9107' => [
            'name' => 'NAD27 to NAD83(CSRS)v3 (5)',
            'method' => 'urn:ogc:def:method:EPSG::9615',
            'extent' => ['4537'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9108' => [
            'name' => 'NAD27 to NAD83(CSRS)v3 (6)',
            'method' => 'urn:ogc:def:method:EPSG::9615',
            'extent' => ['4536'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9109' => [
            'name' => 'NAD27(76) to NAD83(CSRS)v3 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9615',
            'extent' => ['1367'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9110' => [
            'name' => 'NAD83 to NAD83(CSRS)v3 (5)',
            'method' => 'urn:ogc:def:method:EPSG::9615',
            'extent' => ['1367'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9111' => [
            'name' => 'NAD27 to NAD83 (9)',
            'method' => 'urn:ogc:def:method:EPSG::9615',
            'extent' => ['2375'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9113' => [
            'name' => 'NAD27 to NAD83(CSRS)v3 (8)',
            'method' => 'urn:ogc:def:method:EPSG::9615',
            'extent' => ['4533'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9115' => [
            'name' => 'NAD27 to NAD83(CSRS)v4 (10)',
            'method' => 'urn:ogc:def:method:EPSG::9615',
            'extent' => ['4535'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9117' => [
            'name' => 'NAD83 to NAD83(CSRS)v3 (7)',
            'method' => 'urn:ogc:def:method:EPSG::9615',
            'extent' => ['4533'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9118' => [
            'name' => 'NAD83 to NAD83(CSRS)v3 (8)',
            'method' => 'urn:ogc:def:method:EPSG::9615',
            'extent' => ['4534'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9119' => [
            'name' => 'NAD83 to NAD83(CSRS)v4 (9)',
            'method' => 'urn:ogc:def:method:EPSG::9615',
            'extent' => ['4535'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9125' => [
            'name' => 'ITRF2008 to CGVD2013a(2010) height (2)',
            'method' => 'urn:ogc:def:method:EPSG::1060',
            'extent' => ['1061'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9126' => [
            'name' => 'NAD83(CSRS)v2 to NAD83(CORS96) (1)',
            'method' => 'urn:ogc:def:method:EPSG::1065',
            'extent' => ['4544'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9127' => [
            'name' => 'NAD83(CSRS)v3 to NAD83(CORS96) (1)',
            'method' => 'urn:ogc:def:method:EPSG::1065',
            'extent' => ['4544'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9128' => [
            'name' => 'NAD83(CSRS)v4 to NAD83(CORS96) (1)',
            'method' => 'urn:ogc:def:method:EPSG::1065',
            'extent' => ['4544'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9129' => [
            'name' => 'NAD83(CSRS)v6 to NAD83(2011) (1)',
            'method' => 'urn:ogc:def:method:EPSG::1065',
            'extent' => ['4544'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9131' => [
            'name' => 'RGAF09 to IGN 2008 LD height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1073',
            'extent' => ['2893'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9132' => [
            'name' => 'RRAF 1991 to IGN 2008 LD height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1073',
            'extent' => ['2893'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9133' => [
            'name' => 'RGAF09 to Guadeloupe 1988 height (2)',
            'method' => 'urn:ogc:def:method:EPSG::1073',
            'extent' => ['2892'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9134' => [
            'name' => 'RGAF09 to IGN 1988 LS height (2)',
            'method' => 'urn:ogc:def:method:EPSG::1073',
            'extent' => ['2895'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9135' => [
            'name' => 'RGAF09 to IGN 1988 MG height (2)',
            'method' => 'urn:ogc:def:method:EPSG::1073',
            'extent' => ['2894'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9136' => [
            'name' => 'RGAF09 to Martinique 1987 height (2)',
            'method' => 'urn:ogc:def:method:EPSG::1073',
            'extent' => ['3276'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9142' => [
            'name' => 'MGI 1901 to KOSOVAREF01 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent' => ['4542'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9144' => [
            'name' => 'KOSOVAREF01 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['4542'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9145' => [
            'name' => 'WGS 84 (Transit) to ITRF90 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1033',
            'extent' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9177' => [
            'name' => 'SIRGAS-Chile 2002 to ITRF2000 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1065',
            'extent' => ['1066'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9178' => [
            'name' => 'SIRGAS-Chile 2010 to IGS08 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1065',
            'extent' => ['1066'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9179' => [
            'name' => 'SIRGAS-Chile 2013 to IGb08 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1065',
            'extent' => ['1066'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9180' => [
            'name' => 'SIRGAS-Chile 2016 to IGb08 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1065',
            'extent' => ['1066'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9181' => [
            'name' => 'NAD83(HARN) to NAD83(HARN Corrected) (1)',
            'method' => 'urn:ogc:def:method:EPSG::1075',
            'extent' => ['3634'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9185' => [
            'name' => 'AGD66 to GDA2020 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent' => ['2283'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9186' => [
            'name' => 'ITRF2008 to IG05/12 Intermediate CRS',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent' => ['2603'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9187' => [
            'name' => 'RGAF09 to IGN 1988 SB height (2)',
            'method' => 'urn:ogc:def:method:EPSG::1073',
            'extent' => ['2891'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9188' => [
            'name' => 'RGAF09 to IGN 1988 SM height (2)',
            'method' => 'urn:ogc:def:method:EPSG::1073',
            'extent' => ['2890'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9189' => [
            'name' => 'WGS 84 to IG05/12 Intermediate CRS',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent' => ['2603'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9190' => [
            'name' => 'NIWA Albers',
            'method' => 'urn:ogc:def:method:EPSG::9822',
            'extent' => ['3508'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9192' => [
            'name' => 'Vietnam TM-3 104-00',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4538'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9193' => [
            'name' => 'Vietnam TM-3 104-30',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4545'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9194' => [
            'name' => 'Vietnam TM-3 104-45',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4546'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9195' => [
            'name' => 'Vietnam TM-3 105-30',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4548'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9196' => [
            'name' => 'Vietnam TM-3 105-45',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4549'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9197' => [
            'name' => 'Vietnam TM-3 106-00',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4550'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9198' => [
            'name' => 'Vietnam TM-3 106-15',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4552'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9199' => [
            'name' => 'Vietnam TM-3 106-30',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4553'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9200' => [
            'name' => 'Vietnam TM-3 107-00',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4554'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9201' => [
            'name' => 'Vietnam TM-3 107-15',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4556'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9202' => [
            'name' => 'Vietnam TM-3 107-30',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4557'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9203' => [
            'name' => 'Vietnam TM-3 108-15',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4559'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9204' => [
            'name' => 'Vietnam TM-3 108-30',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4560'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9219' => [
            'name' => 'South Africa Basic Survey Unit Albers 25E',
            'method' => 'urn:ogc:def:method:EPSG::9822',
            'extent' => ['4567'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9220' => [
            'name' => 'South Africa Basic Survey Unit Albers 44E',
            'method' => 'urn:ogc:def:method:EPSG::9822',
            'extent' => ['4568'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9224' => [
            'name' => 'ED50 to ETRS89 (15)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent' => ['4566'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9225' => [
            'name' => 'WGS 84 to ETRS89 (2)',
            'method' => 'urn:ogc:def:method:EPSG::1065',
            'extent' => ['4566'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9226' => [
            'name' => 'SHGD2015 to Astro DOS 71 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent' => ['3183'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9227' => [
            'name' => 'ITRF2005 to NAD83(CSRS)v5 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent' => ['1061'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9228' => [
            'name' => 'RGSPM06 to Danger 1950 height (2)',
            'method' => 'urn:ogc:def:method:EPSG::1073',
            'extent' => ['3299'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9229' => [
            'name' => 'NAD83(2011) to NAVD88 height (3)',
            'method' => 'urn:ogc:def:method:EPSG::9665',
            'extent' => ['1323'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9230' => [
            'name' => 'NAD83(2011) to PRVD02 height (2)',
            'method' => 'urn:ogc:def:method:EPSG::9665',
            'extent' => ['3294'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9231' => [
            'name' => 'NAD83(2011) to VIVD09 height (2)',
            'method' => 'urn:ogc:def:method:EPSG::9665',
            'extent' => ['3330'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9232' => [
            'name' => 'ISN93 to ISN2016 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9615',
            'extent' => ['1120'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9233' => [
            'name' => 'ISN2004 to ISN2016 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9615',
            'extent' => ['1120'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9234' => [
            'name' => 'Kalianpur 1962 to WGS 84 (5)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent' => ['2983'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9236' => [
            'name' => 'ATS77 to NAD83(CSRS)v2 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9615',
            'extent' => ['1533'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9237' => [
            'name' => 'ATS77 to NAD83(CSRS)v2 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9615',
            'extent' => ['1447'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9238' => [
            'name' => 'NAD27 to NAD83(CSRS)v2 (4)',
            'method' => 'urn:ogc:def:method:EPSG::9615',
            'extent' => ['1447'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9239' => [
            'name' => 'NAD27 to NAD83(CSRS)v2 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9615',
            'extent' => ['1368'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9240' => [
            'name' => 'NAD27(CGQ77) to NAD83(CSRS)v2 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9615',
            'extent' => ['1368'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9241' => [
            'name' => 'NAD83 to NAD83(CSRS)v2 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9615',
            'extent' => ['1368'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9244' => [
            'name' => 'NAD83 to NAD83(CSRS)v4 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9615',
            'extent' => ['2376'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9247' => [
            'name' => 'NAD83(CSRS)v6 to CGVD2013a(2010) height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1060',
            'extent' => ['1061'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9256' => [
            'name' => 'POSGAR 2007 to SRVN16 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1047',
            'extent' => ['4573'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9257' => [
            'name' => 'Chos Malal 1914 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['4561'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9258' => [
            'name' => 'Chos Malal 1914 to WGS 84 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1292'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9259' => [
            'name' => 'Pampa del Castillo to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['4572'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9260' => [
            'name' => 'Tapi Aike to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['4569'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9261' => [
            'name' => 'MMN to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['2357'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9262' => [
            'name' => 'MMS to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['2357'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9264' => [
            'name' => 'POSGAR 2007 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1033'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9268' => [
            'name' => 'Austria West',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1706'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9269' => [
            'name' => 'Austria Central',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1707'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9270' => [
            'name' => 'Austria East',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1708'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9275' => [
            'name' => 'GHA height to EVRF2000 Austria height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1080',
            'extent' => ['1037'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9276' => [
            'name' => 'ETRS89 to EVRF2000 Austria height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1081',
            'extent' => ['1037'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9277' => [
            'name' => 'MGI to EVRF2000 Austria height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1081',
            'extent' => ['1037'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9280' => [
            'name' => 'ITRF2005 to SA LLD height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1082',
            'extent' => ['3309'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9281' => [
            'name' => 'Amersfoort to ETRS89 (8)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent' => ['1275'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9282' => [
            'name' => 'Amersfoort to ETRS89 (9)',
            'method' => 'urn:ogc:def:method:EPSG::9615',
            'extent' => ['1275'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9283' => [
            'name' => 'ETRS89 to NAP height (2)',
            'method' => 'urn:ogc:def:method:EPSG::9665',
            'extent' => ['1275'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9291' => [
            'name' => 'ISN2016 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1120'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9298' => [
            'name' => 'ONGD17 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1032',
            'extent' => ['1183'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9301' => [
            'name' => 'HS2-TM',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4582'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9310' => [
            'name' => 'DHDN to ETRS89 (10)',
            'method' => 'urn:ogc:def:method:EPSG::9615',
            'extent' => ['4584'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9312' => [
            'name' => 'NZVD2016 height to Auckland 1946 height (2)',
            'method' => 'urn:ogc:def:method:EPSG::1084',
            'extent' => ['3764'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9313' => [
            'name' => 'NZVD2016 height to Bluff 1955 height (2)',
            'method' => 'urn:ogc:def:method:EPSG::1084',
            'extent' => ['3801'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9314' => [
            'name' => 'NZVD2016 height to Dunedin 1958 height (2)',
            'method' => 'urn:ogc:def:method:EPSG::1084',
            'extent' => ['3803'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9315' => [
            'name' => 'NZVD2016 height to Dunedin-Bluff 1960 height (2)',
            'method' => 'urn:ogc:def:method:EPSG::1084',
            'extent' => ['3806'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9316' => [
            'name' => 'NZVD2016 height to Gisborne 1926 height (2)',
            'method' => 'urn:ogc:def:method:EPSG::1084',
            'extent' => ['3771'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9317' => [
            'name' => 'NZVD2016 height to Lyttelton 1937 height (2)',
            'method' => 'urn:ogc:def:method:EPSG::1084',
            'extent' => ['3804'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9318' => [
            'name' => 'NZVD2016 height to Moturiki 1953 height (2)',
            'method' => 'urn:ogc:def:method:EPSG::1084',
            'extent' => ['3768'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9319' => [
            'name' => 'NZVD2016 height to Napier 1962 height (2)',
            'method' => 'urn:ogc:def:method:EPSG::1084',
            'extent' => ['3772'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9320' => [
            'name' => 'NZVD2016 height to Nelson 1955 height (2)',
            'method' => 'urn:ogc:def:method:EPSG::1084',
            'extent' => ['3802'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9321' => [
            'name' => 'NZVD2016 height to One Tree Point 1964 height (2)',
            'method' => 'urn:ogc:def:method:EPSG::1084',
            'extent' => ['3762'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9322' => [
            'name' => 'NZVD2016 height to Stewart Island 1977 height (2)',
            'method' => 'urn:ogc:def:method:EPSG::1084',
            'extent' => ['3338'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9323' => [
            'name' => 'NZVD2016 height to Taranaki 1970 height (2)',
            'method' => 'urn:ogc:def:method:EPSG::1084',
            'extent' => ['3769'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9324' => [
            'name' => 'NZVD2016 height to Wellington 1953 height (2)',
            'method' => 'urn:ogc:def:method:EPSG::1084',
            'extent' => ['3773'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9325' => [
            'name' => 'NZGD2000 to NZVD2009 height (2)',
            'method' => 'urn:ogc:def:method:EPSG::9665',
            'extent' => ['1175'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9326' => [
            'name' => 'NZGD2000 to NZVD2016 height (2)',
            'method' => 'urn:ogc:def:method:EPSG::9665',
            'extent' => ['1175'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9327' => [
            'name' => 'NTF to RGF93 v1 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1087',
            'extent' => ['3694'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9328' => [
            'name' => 'NEA74 Noumea to RGNC91-93 (3)',
            'method' => 'urn:ogc:def:method:EPSG::1087',
            'extent' => ['2823'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9329' => [
            'name' => 'IGN72 Grande Terre to RGNC91-93 (4)',
            'method' => 'urn:ogc:def:method:EPSG::1087',
            'extent' => ['2822'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9330' => [
            'name' => 'IGN72 Grande Terre to RGNC91-93 (5)',
            'method' => 'urn:ogc:def:method:EPSG::1087',
            'extent' => ['2823'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9334' => [
            'name' => 'ITRF2014 to KSA-GRF17 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent' => ['1206'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9339' => [
            'name' => 'PSAD56 to SIRGAS-Chile 2010 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['4231'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9340' => [
            'name' => 'PSAD56 to SIRGAS-Chile 2010 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['4222'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9341' => [
            'name' => 'PSAD56 to SIRGAS-Chile 2010 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['4221'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9342' => [
            'name' => 'PSAD56 to SIRGAS-Chile 2013 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['4231'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9343' => [
            'name' => 'PSAD56 to SIRGAS-Chile 2013 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['4222'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9344' => [
            'name' => 'PSAD56 to SIRGAS-Chile 2013 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['4221'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9345' => [
            'name' => 'PSAD56 to SIRGAS-Chile 2016 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['4231'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9346' => [
            'name' => 'PSAD56 to SIRGAS-Chile 2016 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['4222'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9347' => [
            'name' => 'PSAD56 to SIRGAS-Chile 2016 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['4221'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9348' => [
            'name' => 'SAD69 to SIRGAS-Chile 2010 (4)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['2805'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9349' => [
            'name' => 'SAD69 to SIRGAS-Chile 2013 (4)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['2805'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9350' => [
            'name' => 'SAD69 to SIRGAS-Chile 2016 (4)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['2805'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9352' => [
            'name' => 'RGNC91-93 to NGNC08 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1073',
            'extent' => ['3430'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9353' => [
            'name' => 'IBCSO Polar Stereographic',
            'method' => 'urn:ogc:def:method:EPSG::9829',
            'extent' => ['4586'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9361' => [
            'name' => 'MTRF-2000 to KSA-GRF17 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent' => ['1206'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9362' => [
            'name' => 'Ain el Abd to KSA-GRF17 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3303'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9366' => [
            'name' => 'TPEN11-TM',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4583'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9370' => [
            'name' => 'MML07-TM',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4588'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9371' => [
            'name' => 'Vienna height to GHA height (1)',
            'method' => 'urn:ogc:def:method:EPSG::9616',
            'extent' => ['4585'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9376' => [
            'name' => 'Colombia Transverse Mercator',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1070'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9381' => [
            'name' => 'ITRF2014 to IGb14 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1065',
            'extent' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9382' => [
            'name' => 'IGS14 to IGb14 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1065',
            'extent' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9383' => [
            'name' => 'KSA-GRF17 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent' => ['1206'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9385' => [
            'name' => 'AbInvA96_2020-TM',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4589'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9408' => [
            'name' => 'ED50 to ETRS89 (16)',
            'method' => 'urn:ogc:def:method:EPSG::9615',
            'extent' => ['4605'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9409' => [
            'name' => 'ED50 to ETRS89 (17)',
            'method' => 'urn:ogc:def:method:EPSG::9615',
            'extent' => ['2335'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9410' => [
            'name' => 'ETRS89 to Alicante height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1025',
            'extent' => ['2366'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9411' => [
            'name' => 'ETRS89 to Mallorca height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1025',
            'extent' => ['4602'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9412' => [
            'name' => 'ETRS89 to Menorca height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1025',
            'extent' => ['4603'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9413' => [
            'name' => 'ETRS89 to Ibiza height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1025',
            'extent' => ['4604'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9414' => [
            'name' => 'ETRS89 to Ceuta 2 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1025',
            'extent' => ['4590'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9415' => [
            'name' => 'REGCAN95 to Lanzarote height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1025',
            'extent' => ['4591'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9416' => [
            'name' => 'REGCAN95 to Fuerteventura height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1025',
            'extent' => ['4592'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9417' => [
            'name' => 'REGCAN95 to Gran Canaria height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1025',
            'extent' => ['4593'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9418' => [
            'name' => 'REGCAN95 to Tenerife height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1025',
            'extent' => ['4594'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9419' => [
            'name' => 'REGCAN95 to La Gomera height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1025',
            'extent' => ['4595'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9420' => [
            'name' => 'REGCAN95 to La Palma height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1025',
            'extent' => ['4596'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9421' => [
            'name' => 'REGCAN95 to El Hierro height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1025',
            'extent' => ['4597'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9455' => [
            'name' => 'GBK19-TM',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4607'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9459' => [
            'name' => 'ATRF2014 to GDA2020 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1056',
            'extent' => ['4177'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9460' => [
            'name' => 'ITRF2014 to ATRF2014 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1032',
            'extent' => ['4177'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9466' => [
            'name' => 'GDA2020 to GDA2020 + AHD height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1088',
            'extent' => ['4493'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9467' => [
            'name' => 'GDA94 to GDA94 + AHD height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1088',
            'extent' => ['4493'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9472' => [
            'name' => 'DGN95 to SRGI2013 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent' => ['1122'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9484' => [
            'name' => 'ETRS89 to NN54 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1047',
            'extent' => ['1352'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9485' => [
            'name' => 'ETRS89 to NN2000 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1047',
            'extent' => ['1352'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9495' => [
            'name' => 'MGI 1901 to SRB-ETRS89 (8)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent' => ['4543'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9497' => [
            'name' => 'Gauss-Kruger CABA 2019',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4610'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9548' => [
            'name' => 'Lyon Turin Ferroviaire 2004 (C)',
            'method' => 'urn:ogc:def:method:EPSG::1102',
            'extent' => ['4613'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9550' => [
            'name' => 'NAD83 to NAD83(CSRS)v6 (10)',
            'method' => 'urn:ogc:def:method:EPSG::9615',
            'extent' => ['4612'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9551' => [
            'name' => 'Antalya height to EVRF2019 height (2)',
            'method' => 'urn:ogc:def:method:EPSG::9616',
            'extent' => ['3322'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9552' => [
            'name' => 'Antalya height to EVRF2019 mean-tide height (2)',
            'method' => 'urn:ogc:def:method:EPSG::9616',
            'extent' => ['3322'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9562' => [
            'name' => 'ODN height to EVRF2019 mean-tide height (2)',
            'method' => 'urn:ogc:def:method:EPSG::9616',
            'extent' => ['2792'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9584' => [
            'name' => 'ETRS89 to ETRS89 + Stornoway height (2)',
            'method' => 'urn:ogc:def:method:EPSG::1097',
            'extent' => ['2799'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9585' => [
            'name' => 'ETRS89 to ETRS89 + St. Marys height (2)',
            'method' => 'urn:ogc:def:method:EPSG::1097',
            'extent' => ['2802'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9586' => [
            'name' => 'ETRS89 to ETRS89 + ODN Orkney height (2)',
            'method' => 'urn:ogc:def:method:EPSG::1097',
            'extent' => ['2793'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9587' => [
            'name' => 'ETRS89 to ETRS89 + ODN height (2)',
            'method' => 'urn:ogc:def:method:EPSG::1097',
            'extent' => ['2792'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9588' => [
            'name' => 'ETRS89 to ETRS89 + ODN (Offshore) height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1097',
            'extent' => ['4391'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9589' => [
            'name' => 'ETRS89 to ETRS89 + Lerwick height (2)',
            'method' => 'urn:ogc:def:method:EPSG::1097',
            'extent' => ['2795'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9590' => [
            'name' => 'ETRS89 to ETRS89 + Douglas height (2)',
            'method' => 'urn:ogc:def:method:EPSG::1097',
            'extent' => ['2803'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9591' => [
            'name' => 'ETRS89 to ETRS89 + Malin Head height (2)',
            'method' => 'urn:ogc:def:method:EPSG::1096',
            'extent' => ['1305'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9592' => [
            'name' => 'ETRS89 to ETRS89 + Belfast height (2)',
            'method' => 'urn:ogc:def:method:EPSG::1096',
            'extent' => ['2530'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9593' => [
            'name' => 'ETRS89 to ETRS89 + NN2000 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1093',
            'extent' => ['1352'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9594' => [
            'name' => 'ETRS89 to ETRS89 + NN54 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1093',
            'extent' => ['1352'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9595' => [
            'name' => 'NAD83(2011) to NAD83(2011) + NAVD88 height (3)',
            'method' => 'urn:ogc:def:method:EPSG::1088',
            'extent' => ['1323'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9596' => [
            'name' => 'NAD83(2011) to NAD83(2011) + NAVD88 height (2)',
            'method' => 'urn:ogc:def:method:EPSG::1088',
            'extent' => ['1330'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9597' => [
            'name' => 'ETRS89 to ETRS89 + NAP height (2)',
            'method' => 'urn:ogc:def:method:EPSG::1088',
            'extent' => ['1275'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9600' => [
            'name' => 'ETRS89 to ETRS89 + EVRF2000 Austria height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1089',
            'extent' => ['1037'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9601' => [
            'name' => 'MGI to MGI + EVRF2000 Austria height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1089',
            'extent' => ['1037'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9605' => [
            'name' => 'ETRS89 to ETRS89 + Alicante height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1092',
            'extent' => ['2366'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9606' => [
            'name' => 'ETRS89 to ETRS89 + Ceuta 2 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1092',
            'extent' => ['4590'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9607' => [
            'name' => 'ETRS89 to ETRS89 + Ibiza height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1092',
            'extent' => ['4604'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9608' => [
            'name' => 'ETRS89 to ETRS89 + Mallorca height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1092',
            'extent' => ['4602'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9609' => [
            'name' => 'ETRS89 to ETRS89 + Menorca height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1092',
            'extent' => ['4603'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9610' => [
            'name' => 'REGCAN95 to REGCAN95 + El Hierro height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1092',
            'extent' => ['4597'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9611' => [
            'name' => 'REGCAN95 to REGCAN95 + Fuerteventura height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1092',
            'extent' => ['4592'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9612' => [
            'name' => 'REGCAN95 to REGCAN95 + Gran Canaria height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1092',
            'extent' => ['4593'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9613' => [
            'name' => 'REGCAN95 to REGCAN95 + La Gomera height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1092',
            'extent' => ['4595'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9614' => [
            'name' => 'REGCAN95 to REGCAN95 + La Palma height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1092',
            'extent' => ['4596'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9615' => [
            'name' => 'REGCAN95 to REGCAN95 + Lanzarote height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1092',
            'extent' => ['4591'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9616' => [
            'name' => 'REGCAN95 to REGCAN95 + Tenerife height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1092',
            'extent' => ['4594'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9621' => [
            'name' => 'POSGAR 2007 to POSGAR 2007 + SRVN16 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1093',
            'extent' => ['4573'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9622' => [
            'name' => 'NAD83(2011) to NAD83(2011) + PRVD02 height (2)',
            'method' => 'urn:ogc:def:method:EPSG::1088',
            'extent' => ['3294'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9623' => [
            'name' => 'NAD83(2011) to NAD83(2011) + VIVD09 height (2)',
            'method' => 'urn:ogc:def:method:EPSG::1088',
            'extent' => ['3330'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9624' => [
            'name' => 'NAD83(MA11) to NAD83(MA11) + GUVD04 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1088',
            'extent' => ['3255'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9625' => [
            'name' => 'NAD83(MA11) to NAD83(MA11) + NMVD03 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1088',
            'extent' => ['4171'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9626' => [
            'name' => 'NAD83(PA11) to NAD83(PA11) + ASVD02 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1088',
            'extent' => ['2288'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9627' => [
            'name' => 'NZGD2000 to NZGD2000 + NZVD2009 height (2)',
            'method' => 'urn:ogc:def:method:EPSG::1088',
            'extent' => ['1175'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9628' => [
            'name' => 'NZGD2000 to NZGD2000 + NZVD2016 height (2)',
            'method' => 'urn:ogc:def:method:EPSG::1088',
            'extent' => ['1175'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9631' => [
            'name' => 'RGAF09 to RGAF09 + Guadeloupe 1988 height (2)',
            'method' => 'urn:ogc:def:method:EPSG::1095',
            'extent' => ['2892'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9632' => [
            'name' => 'RGAF09 to RGAF09 + IGN 1988 LS height (2)',
            'method' => 'urn:ogc:def:method:EPSG::1095',
            'extent' => ['2895'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9633' => [
            'name' => 'RGAF09 to RGAF09 + IGN 1988 MG height (2)',
            'method' => 'urn:ogc:def:method:EPSG::1095',
            'extent' => ['2894'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9634' => [
            'name' => 'RGAF09 to RGAF09 + IGN 1988 SB height (2)',
            'method' => 'urn:ogc:def:method:EPSG::1095',
            'extent' => ['2891'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9635' => [
            'name' => 'RGAF09 to RGAF09 + IGN 1988 SM height (2)',
            'method' => 'urn:ogc:def:method:EPSG::1095',
            'extent' => ['2890'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9636' => [
            'name' => 'RGAF09 to IGN 2008 LD height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1095',
            'extent' => ['2893'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9637' => [
            'name' => 'RGAF09 to RGAF09 + Martinique 1987 height (2)',
            'method' => 'urn:ogc:def:method:EPSG::1095',
            'extent' => ['3276'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9640' => [
            'name' => 'RGNC91-93 to RGNC91-93 + NGNC08 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1095',
            'extent' => ['3430'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9641' => [
            'name' => 'RGSPM06 to RGSPM06 + Danger 1950 height (2)',
            'method' => 'urn:ogc:def:method:EPSG::1095',
            'extent' => ['3299'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9642' => [
            'name' => 'RRAF 1991 to RRAF 1991 + IGN 2008 LD height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1095',
            'extent' => ['2893'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9643' => [
            'name' => 'ITRF2005 to ITRF2005 + SA LLD height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1098',
            'extent' => ['3309'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9644' => [
            'name' => 'NAD83(CSRS)v6 to NAD83(CSRS)v6 + CGVD2013a(2010) height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1090',
            'extent' => ['1061'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9662' => [
            'name' => 'Baltic 1986 height to EVRF2007-PL height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1101',
            'extent' => ['3293'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9673' => [
            'name' => 'US Forest Service region 6 Albers',
            'method' => 'urn:ogc:def:method:EPSG::9822',
            'extent' => ['2381'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9676' => [
            'name' => 'Israel 1993 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent' => ['2603'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9677' => [
            'name' => 'Bangladesh Transverse Mercator',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3217'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9679' => [
            'name' => 'Gulshan 303 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1041'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9682' => [
            'name' => 'ITRF2014 to GDA94 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1056',
            'extent' => ['4177'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9684' => [
            'name' => 'ATRF2014 to GDA94 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1056',
            'extent' => ['4177'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9690' => [
            'name' => 'WGS 84 to GDA2020 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent' => ['4177'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9691' => [
            'name' => 'WGS 84 to GDA2020 (4)',
            'method' => 'urn:ogc:def:method:EPSG::9615',
            'extent' => ['2575'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9692' => [
            'name' => 'GDA2020 to AVWS height (2)',
            'method' => 'urn:ogc:def:method:EPSG::9665',
            'extent' => ['4177'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9693' => [
            'name' => 'GDA2020 to GDA2020 + AVWS height (2)',
            'method' => 'urn:ogc:def:method:EPSG::1088',
            'extent' => ['4177'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9703' => [
            'name' => 'ETRF2000-PL to ETRS89 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1192'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9710' => [
            'name' => 'EVRF2019 height to EVRF2019 mean-tide height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1107',
            'extent' => ['4608'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9717' => [
            'name' => 'ETRF2000-PL to Baltic 1986 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1099',
            'extent' => ['3293'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9718' => [
            'name' => 'ETRF2000-PL to ETRF2000-PL + Baltic 1986 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1100',
            'extent' => ['3293'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9719' => [
            'name' => 'ETRF2000-PL to EVRF2007-PL height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1099',
            'extent' => ['3293'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9720' => [
            'name' => 'ETRF2000-PL to ETRF2000-PL + EVRF2007-PL height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1100',
            'extent' => ['3293'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9726' => [
            'name' => 'Genoa 1942 height to Catania 1965 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::9616',
            'extent' => ['2340'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9738' => [
            'name' => 'EOS21-TM',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4620'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9743' => [
            'name' => 'PN68 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3873'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9744' => [
            'name' => 'Baltic 1957 height to EVRF2019 mean-tide height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1046',
            'extent' => ['1079'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9745' => [
            'name' => 'Baltic 1957 height to EVRF2019 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1046',
            'extent' => ['1079'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9746' => [
            'name' => 'SPCS83 Alabama East zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2154'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9747' => [
            'name' => 'SPCS83 Alabama West zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2155'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9751' => [
            'name' => 'CR05 to CR-SIRGAS (1)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent' => ['1074'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9752' => [
            'name' => 'CR05 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent' => ['1074'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9756' => [
            'name' => 'WGS 84 (G1762) to WGS 84 (G2139) (1)',
            'method' => 'urn:ogc:def:method:EPSG::1032',
            'extent' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9757' => [
            'name' => 'WGS 84 (G2139) to ITRF2014 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1032',
            'extent' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9760' => [
            'name' => 'ECML14_NB-TM',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4621'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9765' => [
            'name' => 'EWR2-TM',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4622'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9768' => [
            'name' => 'Kyrg-06 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1137'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9769' => [
            'name' => 'RGWF96 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1255'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9770' => [
            'name' => 'RGTAAF07 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['4246'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9771' => [
            'name' => 'TGD2005 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1234'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9773' => [
            'name' => 'GSK-2011 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1198'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9774' => [
            'name' => 'NAD83(2011) to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1511'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9788' => [
            'name' => 'RGF93 v2 to RGF93 v2b',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent' => ['1096'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9789' => [
            'name' => 'RGF93 v2 to ETRS89 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1096'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9790' => [
            'name' => 'RGF93 v2b to ETRS89 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1096'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9795' => [
            'name' => 'NAD83 to NAD83(CSRS)v7 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9615',
            'extent' => ['2376'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9796' => [
            'name' => 'Local coordinate system of Kyiv',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4650'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9797' => [
            'name' => 'Local coordinate system of Crimea region',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4648'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9798' => [
            'name' => 'Local coordinate system of Vinnytsia region',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4643'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9799' => [
            'name' => 'Local coordinate system of Volyn region',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4644'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9800' => [
            'name' => 'Local coordinate system of Dnipropetrovsk region',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4627'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9801' => [
            'name' => 'Local coordinate system of Donetsk region',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4628'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9802' => [
            'name' => 'Local coordinate system of Zhytomyr region',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4647'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9803' => [
            'name' => 'Local coordinate system of Zakarpattia region',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4645'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9804' => [
            'name' => 'Local coordinate system of Zaporizhzhia region',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4646'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9805' => [
            'name' => 'Local coordinate system of Ivano-Frankivsk region',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4629'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9806' => [
            'name' => 'Local coordinate system of Kirovohrad region',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4634'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9807' => [
            'name' => 'Local coordinate system of Luhansk region',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4635'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9808' => [
            'name' => 'Local coordinate system of Lviv region',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4636'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9809' => [
            'name' => 'Local coordinate system of Mykolaiv region',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4637'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9810' => [
            'name' => 'Local coordinate system of Odessa region',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4638'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9811' => [
            'name' => 'Local coordinate system of Poltava region',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4639'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9812' => [
            'name' => 'Local coordinate system of Rivne and Khmelnytsky regions',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4651'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9813' => [
            'name' => 'Local coordinate system of Sumy region',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4641'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9814' => [
            'name' => 'Local coordinate system of Ternopil region',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4642'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9815' => [
            'name' => 'Local coordinate system of Kharkiv region',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4630'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9816' => [
            'name' => 'Local coordinate system of Kherson region',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4631'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9817' => [
            'name' => 'Local coordinate system of Cherkasy region',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4624'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9818' => [
            'name' => 'Local coordinate system of Chernivtsi region',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4626'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9819' => [
            'name' => 'Local coordinate system of Chernihiv region',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4625'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9820' => [
            'name' => 'Local coordinate system of Sevastopol city',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4649'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9868' => [
            'name' => 'MRH21-TM',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4652'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9872' => [
            'name' => 'Papua New Guinea Map Grid 1994 zone 57',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4653'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9873' => [
            'name' => 'Papua New Guinea Map Grid 1994 zone 58',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4654'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9876' => [
            'name' => 'RGF93 v2b to NGF-IGN69 height (5)',
            'method' => 'urn:ogc:def:method:EPSG::1073',
            'extent' => ['1326'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9877' => [
            'name' => 'RGF93 v2b to RGF93 v2b + NGF-IGN69 height (5)',
            'method' => 'urn:ogc:def:method:EPSG::1095',
            'extent' => ['1326'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9879' => [
            'name' => 'MOLDOR11-TM',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4655'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9882' => [
            'name' => 'RGF93 v1 to RGF93 v2 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1096'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9886' => [
            'name' => 'NAD27 to NAD83(CSRS)v2 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9615',
            'extent' => ['2375'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9887' => [
            'name' => 'NAD83 to NAD83(CSRS)v2 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9615',
            'extent' => ['2375'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9888' => [
            'name' => 'NTF to RGF93 v2 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1087',
            'extent' => ['3694'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9889' => [
            'name' => 'NTF to RGF93 v2b (1)',
            'method' => 'urn:ogc:def:method:EPSG::1087',
            'extent' => ['3694'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9894' => [
            'name' => 'Luxembourg TM (3D)',
            'method' => 'urn:ogc:def:method:EPSG::1111',
            'extent' => ['1146'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9896' => [
            'name' => 'JGD2000 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9615',
            'extent' => ['4170'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9904' => [
            'name' => 'Camacupa 1948 to RSAO13 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['2319'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9905' => [
            'name' => 'Camacupa 1948 to RSAO13 (4)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent' => ['2323'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9906' => [
            'name' => 'Malongo 1987 to RSAO13 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3180'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9908' => [
            'name' => 'ETRS89 to Ostend height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1082',
            'extent' => ['1347'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9909' => [
            'name' => 'ETRS89 to ETRS89 + Ostend height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1098',
            'extent' => ['1347'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9910' => [
            'name' => 'MGI to ETRS89 (8)',
            'method' => 'urn:ogc:def:method:EPSG::9615',
            'extent' => ['1037'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9911' => [
            'name' => 'Macedonia Gauss-Kruger truncated',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1148'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9913' => [
            'name' => 'Hong Kong 1980 to Hong Kong Geodetic CS (1)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent' => ['1118'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9914' => [
            'name' => 'ETRS89 to BI height (1)',
            'method' => 'urn:ogc:def:method:EPSG::9663',
            'extent' => ['4390'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9915' => [
            'name' => 'ETRS89 to ETRS89 + BI height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1097',
            'extent' => ['4390'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9916' => [
            'name' => 'ETRS89 to BI height (2)',
            'method' => 'urn:ogc:def:method:EPSG::1072',
            'extent' => ['2530'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9917' => [
            'name' => 'ETRS89 to ETRS89 + BI height (2)',
            'method' => 'urn:ogc:def:method:EPSG::1096',
            'extent' => ['2530'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9918' => [
            'name' => 'ETRS89 to BI height (3)',
            'method' => 'urn:ogc:def:method:EPSG::1072',
            'extent' => ['1305'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9919' => [
            'name' => 'ETRS89 to ETRS89 + BI height (3)',
            'method' => 'urn:ogc:def:method:EPSG::1096',
            'extent' => ['1305'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9936' => [
            'name' => 'JGD2011 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1129'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9937' => [
            'name' => 'LUREF to ETRS89 (7)',
            'method' => 'urn:ogc:def:method:EPSG::9636',
            'extent' => ['1146'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9938' => [
            'name' => 'LUREF to ETRS89 (8)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent' => ['1146'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9942' => [
            'name' => 'EBBWV14-TM',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4661'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9946' => [
            'name' => 'Iceland Lambert Azimuthal Equal Area',
            'method' => 'urn:ogc:def:method:EPSG::9820',
            'extent' => ['1120'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9958' => [
            'name' => 'ISN2016 to ISH2004 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1047',
            'extent' => ['4662'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9959' => [
            'name' => 'ISN2016 to ISN2016 + ISH2004 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1093',
            'extent' => ['4662'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9960' => [
            'name' => 'WGS 84 (Transit) to WGS 84 (G730) (1)',
            'method' => 'urn:ogc:def:method:EPSG::1032',
            'extent' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9961' => [
            'name' => 'WGS 84 (G730) to WGS 84 (G873) (1)',
            'method' => 'urn:ogc:def:method:EPSG::1032',
            'extent' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9962' => [
            'name' => 'WGS 84 (G873) to WGS 84 (G1150) (1)',
            'method' => 'urn:ogc:def:method:EPSG::1056',
            'extent' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9963' => [
            'name' => 'WGS 84 (G1150) to WGS 84 (G1674) (1)',
            'method' => 'urn:ogc:def:method:EPSG::1056',
            'extent' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9966' => [
            'name' => 'HULLEE13-TM',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4663'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9971' => [
            'name' => 'SCM22-TM',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4665'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9976' => [
            'name' => 'FNL22-TM',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4664'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9981' => [
            'name' => 'MTM Nova Scotia 1997 zone 4',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1534'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9982' => [
            'name' => 'MTM Nova Scotia 1997 zone 5',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1535'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9983' => [
            'name' => 'NAD83(CSRS)v3 to CGVD28 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1060',
            'extent' => ['1289'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9984' => [
            'name' => 'NAD83(CSRS)v2 to CGVD28 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1060',
            'extent' => ['1289'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9985' => [
            'name' => 'NAD83(CSRS)v4 to CGVD28 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1060',
            'extent' => ['1289'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9986' => [
            'name' => 'NAD83(CSRS)v6 to CGVD28 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1060',
            'extent' => ['1289'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9987' => [
            'name' => 'NAD83(CSRS)v7 to CGVD28 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1060',
            'extent' => ['1289'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9991' => [
            'name' => 'ITRF2014 to ITRF2020 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9992' => [
            'name' => 'ITRF2008 to ITRF2020 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9993' => [
            'name' => 'ITRF2005 to ITRF2020 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9994' => [
            'name' => 'ITRF2000 to ITRF2020 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9995' => [
            'name' => 'ITRF97 to ITRF2020 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9996' => [
            'name' => 'ITRF96 to ITRF2020 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9997' => [
            'name' => 'ITRF94 to ITRF2020 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9998' => [
            'name' => 'ITRF93 to ITRF2020 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9999' => [
            'name' => 'ITRF92 to ITRF2020 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10098' => [
            'name' => 'KKJ to ETRS89 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent' => ['3333'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10100' => [
            'name' => 'ITRF91 to ITRF2020 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10101' => [
            'name' => 'Alabama CS27 East zone',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2154'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10102' => [
            'name' => 'Alabama CS27 West zone',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2155'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10103' => [
            'name' => 'ITRF90 to ITRF2020 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10104' => [
            'name' => 'ITRF89 to ITRF2020 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10105' => [
            'name' => 'ITRF88 to ITRF2020 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10109' => [
            'name' => 'NAD83(CSRS)v7 to CGVD2013a(2010) height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1060',
            'extent' => ['1061'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10110' => [
            'name' => 'NAD83(CSRS)v4 to CGVD2013a(2002) height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1060',
            'extent' => ['1061'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10111' => [
            'name' => 'NAD83(CSRS)v3 to CGVD2013a(1997) height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1060',
            'extent' => ['1061'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10112' => [
            'name' => 'NAD83(CSRS)v2 to CGVD2013a(1997) height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1060',
            'extent' => ['1061'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10113' => [
            'name' => 'CGVD28 height to CGVD2013a(1997) height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1112',
            'extent' => ['1061'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10114' => [
            'name' => 'CGVD28 height to CGVD2013a(2002) height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1112',
            'extent' => ['1061'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10115' => [
            'name' => 'CGVD28 height to CGVD2013a(2010) height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1112',
            'extent' => ['1061'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10127' => [
            'name' => 'MWC18-TM',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4666'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10128' => [
            'name' => 'NAD83(CSRS)v4 to NAD83(CSRS)v4 + CGVD2013a(2002) height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1090',
            'extent' => ['1061'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10129' => [
            'name' => 'NAD83(CSRS)v3 to NAD83(CSRS)v3 + CGVD2013a(1997) height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1090',
            'extent' => ['1061'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10131' => [
            'name' => 'SPCS83 Alabama East zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2154'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10132' => [
            'name' => 'SPCS83 Alabama West zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2155'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10134' => [
            'name' => 'SIRGAS-Chile 2021 to ITRF2014 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1065',
            'extent' => ['1066'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10135' => [
            'name' => 'PSAD56 to SIRGAS-Chile 2021 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['4231'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10136' => [
            'name' => 'PSAD56 to SIRGAS-Chile 2021 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['4222'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10137' => [
            'name' => 'PSAD56 to SIRGAS-Chile 2021 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['4221'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10138' => [
            'name' => 'SAD69 to SIRGAS-Chile 2021 (4)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['2805'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10139' => [
            'name' => 'ITRF88 to ITRF89 (2)',
            'method' => 'urn:ogc:def:method:EPSG::1033',
            'extent' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10140' => [
            'name' => 'ITRF89 to ITRF90 (2)',
            'method' => 'urn:ogc:def:method:EPSG::1033',
            'extent' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10141' => [
            'name' => 'ITRF90 to ITRF91 (2)',
            'method' => 'urn:ogc:def:method:EPSG::1033',
            'extent' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10142' => [
            'name' => 'ITRF91 to ITRF92 (2)',
            'method' => 'urn:ogc:def:method:EPSG::1033',
            'extent' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10143' => [
            'name' => 'ITRF93 to ITRF94 (2)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10147' => [
            'name' => 'Brisbane City Survey Grid 2020',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2990'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10148' => [
            'name' => 'Amtrak North East Corridor Coordinate System 2021 (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9815',
            'extent' => ['4669'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10149' => [
            'name' => 'MAGNA-SIRGAS 2018 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1070'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10179' => [
            'name' => 'ITRF2020 to IGS20 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1065',
            'extent' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10180' => [
            'name' => 'IGb14 to IGS20 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10182' => [
            'name' => 'DoPw22-TM',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4686'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10187' => [
            'name' => 'ShAb07-TM',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4687'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10193' => [
            'name' => 'CNH22-LCC',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['4677'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10198' => [
            'name' => 'CWS13-TM',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4678'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10201' => [
            'name' => 'Arizona Coordinate System East zone',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2167'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10202' => [
            'name' => 'Arizona Coordinate System Central zone',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2166'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10203' => [
            'name' => 'Arizona Coordinate System West zone',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2168'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10206' => [
            'name' => 'DIBA15-TM',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4681'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10211' => [
            'name' => 'GW22-LCC',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['4690'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10226' => [
            'name' => 'MALS09-TM',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4682'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10231' => [
            'name' => 'SPCS83 Arizona East zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2167'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10232' => [
            'name' => 'SPCS83 Arizona Central zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2166'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10233' => [
            'name' => 'SPCS83 Arizona West zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2168'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10234' => [
            'name' => 'OxWo08-TM',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4680'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10239' => [
            'name' => 'SYC20-TM',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4679'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10247' => [
            'name' => 'Slovenia 1996 to SVS2010 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1117',
            'extent' => ['3307'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10248' => [
            'name' => 'Slovenia 1996 to Slovenia 1996 + SVS2010 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1118',
            'extent' => ['3307'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10274' => [
            'name' => 'SMITB20-TM',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4688'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10279' => [
            'name' => 'RBEPP12-LCC',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['4689'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10301' => [
            'name' => 'Arkansas CS27 North',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2169'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10302' => [
            'name' => 'Arkansas CS27 South',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2170'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10331' => [
            'name' => 'SPCS83 Arkansas North zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2169'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10332' => [
            'name' => 'SPCS83 Arkansas South zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2170'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10401' => [
            'name' => 'California CS27 zone I',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2175'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10402' => [
            'name' => 'California CS27 zone II',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2176'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10403' => [
            'name' => 'California CS27 zone III',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2177'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10404' => [
            'name' => 'California CS27 zone IV',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2178'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10405' => [
            'name' => 'California CS27 zone V',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2179'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10406' => [
            'name' => 'California CS27 zone VI',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2180'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10408' => [
            'name' => 'California CS27 zone VII',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2181'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10420' => [
            'name' => 'California Albers',
            'method' => 'urn:ogc:def:method:EPSG::9822',
            'extent' => ['1375'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10431' => [
            'name' => 'SPCS83 California zone 1 (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2175'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10432' => [
            'name' => 'SPCS83 California zone 2 (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2176'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10433' => [
            'name' => 'SPCS83 California zone 3 (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2177'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10434' => [
            'name' => 'SPCS83 California zone 4 (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2178'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10435' => [
            'name' => 'SPCS83 California zone 5 (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2182'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10436' => [
            'name' => 'SPCS83 California zone 6 (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2180'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10501' => [
            'name' => 'Colorado CS27 North zone',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2184'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10502' => [
            'name' => 'Colorado CS27 Central zone',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2183'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10503' => [
            'name' => 'Colorado CS27 South zone',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2185'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10531' => [
            'name' => 'SPCS83 Colorado North zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2184'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10532' => [
            'name' => 'SPCS83 Colorado Central zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2183'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10533' => [
            'name' => 'SPCS83 Colorado South zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2185'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10600' => [
            'name' => 'Connecticut CS27',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['1377'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10630' => [
            'name' => 'SPCS83 Connecticut zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['1377'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10700' => [
            'name' => 'Delaware CS27',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1378'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10730' => [
            'name' => 'SPCS83 Delaware zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1378'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10901' => [
            'name' => 'Florida CS27 East zone',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2186'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10902' => [
            'name' => 'Florida CS27 West zone',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2188'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10903' => [
            'name' => 'Florida CS27 North zone',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2187'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10931' => [
            'name' => 'SPCS83 Florida East zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2186'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10932' => [
            'name' => 'SPCS83 Florida West zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2188'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10933' => [
            'name' => 'SPCS83 Florida North zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2187'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10934' => [
            'name' => 'Florida GDL Albers (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9822',
            'extent' => ['1379'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::11001' => [
            'name' => 'Georgia CS27 East zone',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2189'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::11002' => [
            'name' => 'Georgia CS27 West zone',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2190'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::11031' => [
            'name' => 'SPCS83 Georgia East zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2189'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::11032' => [
            'name' => 'SPCS83 Georgia West zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2190'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::11101' => [
            'name' => 'Idaho CS27 East zone',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2192'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::11102' => [
            'name' => 'Idaho CS27 Central zone',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2191'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::11103' => [
            'name' => 'Idaho CS27 West zone',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2193'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::11131' => [
            'name' => 'SPCS83 Idaho East zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2192'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::11132' => [
            'name' => 'SPCS83 Idaho Central zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2191'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::11133' => [
            'name' => 'SPCS83 Idaho West zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2193'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::11201' => [
            'name' => 'Illinois CS27 East zone',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2194'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::11202' => [
            'name' => 'Illinois CS27 West zone',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2195'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::11231' => [
            'name' => 'SPCS83 Illinois East zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2194'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::11232' => [
            'name' => 'SPCS83 Illinois West zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2195'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::11233' => [
            'name' => 'Illinois Coordinate System of 1983 Aurora zone (US survey foot)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4703'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::11234' => [
            'name' => 'Illinois Coordinate System of 1983 Chicago zone (US survey foot)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4704'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::11235' => [
            'name' => 'Illinois Coordinate System of 1983 Moline zone (US survey foot)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['4705'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::11236' => [
            'name' => 'Illinois Coordinate System of 1983 Sterling zone (US survey foot)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['4706'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::11237' => [
            'name' => 'Illinois Coordinate System of 1983 Ottawa zone (US survey foot)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['4707'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::11238' => [
            'name' => 'Illinois Coordinate System of 1983 Joliet zone (US survey foot)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4708'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::11239' => [
            'name' => 'Illinois Coordinate System of 1983 Monmouth zone (US survey foot)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4709'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::11240' => [
            'name' => 'Illinois Coordinate System of 1983 Galesburg zone (US survey foot)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4710'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::11241' => [
            'name' => 'Illinois Coordinate System of 1983 Peoria zone (US survey foot)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4711'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::11242' => [
            'name' => 'Illinois Coordinate System of 1983 Eureka zone (US survey foot)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4712'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::11243' => [
            'name' => 'Illinois Coordinate System of 1983 Bloomington zone (US survey foot)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['4713'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::11244' => [
            'name' => 'Illinois Coordinate System of 1983 Pontiac zone (US survey foot)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['4714'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::11245' => [
            'name' => 'Illinois Coordinate System of 1983 Watseka zone (US survey foot)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['4715'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::11246' => [
            'name' => 'Illinois Coordinate System of 1983 Quincy zone (US survey foot)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4716'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::11247' => [
            'name' => 'Illinois Coordinate System of 1983 Macomb zone (US survey foot)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4717'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::11248' => [
            'name' => 'Illinois Coordinate System of 1983 Lincoln zone (US survey foot)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['4718'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::11249' => [
            'name' => 'Illinois Coordinate System of 1983 Decatur zone (US survey foot)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4719'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::11250' => [
            'name' => 'Illinois Coordinate System of 1983 Champaign zone (US survey foot)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['4720'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::11251' => [
            'name' => 'Illinois Coordinate System of 1983 Jacksonville zone (US survey foot)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['4721'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::11252' => [
            'name' => 'Illinois Coordinate System of 1983 Springfield zone (US survey foot)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['4722'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::11253' => [
            'name' => 'Illinois Coordinate System of 1983 Charleston zone (US survey foot)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['4723'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::11254' => [
            'name' => 'Illinois Coordinate System of 1983 Jerseyville zone (US survey foot)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4724'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::11255' => [
            'name' => 'Illinois Coordinate System of 1983 Carlinville zone (US survey foot)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['4725'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::11256' => [
            'name' => 'Illinois Coordinate System of 1983 Taylorville zone (US survey foot)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4726'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::11257' => [
            'name' => 'Illinois Coordinate System of 1983 Effingham zone (US survey foot)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['4727'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::11258' => [
            'name' => 'Illinois Coordinate System of 1983 Robinson zone (US survey foot)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['4728'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::11259' => [
            'name' => 'Illinois Coordinate System of 1983 Belleville zone (US survey foot)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4729'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::11260' => [
            'name' => 'Illinois Coordinate System of 1983 Mount Vernon zone (US survey foot)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['4730'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::11261' => [
            'name' => 'Illinois Coordinate System of 1983 Olney zone (US survey foot)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['4731'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::11262' => [
            'name' => 'Illinois Coordinate System of 1983 Carbondale zone (US survey foot)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['4732'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::11263' => [
            'name' => 'Illinois Coordinate System of 1983 Metropolis zone (US survey foot)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['4733'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::11264' => [
            'name' => 'Illinois Coordinate System of 1983 Freeport zone (US survey foot)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['4701'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::11265' => [
            'name' => 'Illinois Coordinate System of 1983 Rockford zone (US survey foot)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4702'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::11301' => [
            'name' => 'Indiana CS27 East zone',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2196'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::11302' => [
            'name' => 'Indiana CS27 West zone',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2197'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::11331' => [
            'name' => 'SPCS83 Indiana East zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2196'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::11332' => [
            'name' => 'SPCS83 Indiana West zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2197'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::11401' => [
            'name' => 'Iowa CS27 North zone',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2198'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::11402' => [
            'name' => 'Iowa CS27 South zone',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2199'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::11431' => [
            'name' => 'SPCS83 Iowa North zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2198'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::11432' => [
            'name' => 'SPCS83 Iowa South zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2199'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::11501' => [
            'name' => 'Kansas CS27 North zone',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2200'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::11502' => [
            'name' => 'Kansas CS27 South zone',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2201'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::11531' => [
            'name' => 'SPCS83 Kansas North zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2200'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::11532' => [
            'name' => 'SPCS83 Kansas South zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2201'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::11601' => [
            'name' => 'Kentucky CS27 North zone',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2202'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::11602' => [
            'name' => 'Kentucky CS27 South zone',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2203'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::11630' => [
            'name' => 'SPCS83 Kentucky Single Zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['1386'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::11632' => [
            'name' => 'SPCS83 Kentucky South zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2203'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::11701' => [
            'name' => 'Louisiana CS27 North zone',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2204'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::11702' => [
            'name' => 'Louisiana CS27 South zone',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2205'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::11703' => [
            'name' => 'Louisiana CS27 Offshore zone',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['1387'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::11731' => [
            'name' => 'SPCS83 Louisiana North zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2204'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::11732' => [
            'name' => 'SPCS83 Louisiana South zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2529'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::11733' => [
            'name' => 'SPCS83 Louisiana Offshore zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['1387'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::11801' => [
            'name' => 'Maine CS27 East zone',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2206'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::11802' => [
            'name' => 'Maine CS27 West zone',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2207'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::11831' => [
            'name' => 'SPCS83 Maine East zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2206'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::11832' => [
            'name' => 'SPCS83 Maine West zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2207'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::11833' => [
            'name' => 'SPCS83 Maine East zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2206'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::11834' => [
            'name' => 'SPCS83 Maine West zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2207'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::11851' => [
            'name' => 'Maine CS2000 East zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2960'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::11853' => [
            'name' => 'Maine CS2000 West zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2958'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::11854' => [
            'name' => 'Maine CS2000 Central zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2959'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::11900' => [
            'name' => 'Maryland CS27',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['1389'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::11930' => [
            'name' => 'SPCS83 Maryland zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['1389'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::12001' => [
            'name' => 'Massachusetts CS27 Mainland zone',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2209'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::12002' => [
            'name' => 'Massachusetts CS27 Island zone',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2208'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::12031' => [
            'name' => 'SPCS83 Massachusetts Mainland zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2209'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::12032' => [
            'name' => 'SPCS83 Massachusetts Island zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2208'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::12101' => [
            'name' => 'Michigan State Plane East zone',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1720'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::12102' => [
            'name' => 'Michigan State Plane Old Central zone',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1721'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::12103' => [
            'name' => 'Michigan State Plane West zone',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3652'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::12141' => [
            'name' => 'SPCS83 Michigan North zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['1723'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::12142' => [
            'name' => 'SPCS83 Michigan Central zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['1724'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::12143' => [
            'name' => 'SPCS83 Michigan South zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['1725'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::12150' => [
            'name' => 'Michigan Oblique Mercator (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9812',
            'extent' => ['1391'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::12201' => [
            'name' => 'Minnesota CS27 North zone',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2214'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::12202' => [
            'name' => 'Minnesota CS27 Central zone',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2213'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::12203' => [
            'name' => 'Minnesota CS27 South zone',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2215'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::12231' => [
            'name' => 'SPCS83 Minnesota North zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2214'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::12232' => [
            'name' => 'SPCS83 Minnesota Central zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2213'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::12233' => [
            'name' => 'SPCS83 Minnesota South zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2215'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::12234' => [
            'name' => 'SPCS83 Minnesota North zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2214'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::12235' => [
            'name' => 'SPCS83 Minnesota Central zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2213'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::12236' => [
            'name' => 'SPCS83 Minnesota South zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2215'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::12301' => [
            'name' => 'Mississippi CS27 East zone',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2216'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::12302' => [
            'name' => 'Mississippi CS27 West zone',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2217'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::12331' => [
            'name' => 'SPCS83 Mississippi East zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2216'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::12332' => [
            'name' => 'SPCS83 Mississippi West zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2217'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::12401' => [
            'name' => 'Missouri CS27 East zone',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2219'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::12402' => [
            'name' => 'Missouri CS27 Central zone',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2218'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::12403' => [
            'name' => 'Missouri CS27 West zone',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2220'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::12431' => [
            'name' => 'SPCS83 Missouri East zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2219'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::12432' => [
            'name' => 'SPCS83 Missouri Central zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2218'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::12433' => [
            'name' => 'SPCS83 Missouri West zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2220'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::12501' => [
            'name' => 'Montana CS27 North zone',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2211'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::12502' => [
            'name' => 'Montana CS27 Central zone',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2210'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::12503' => [
            'name' => 'Montana CS27 South zone',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2212'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::12530' => [
            'name' => 'SPCS83 Montana zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['1395'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::12601' => [
            'name' => 'Nebraska CS27 North zone',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2221'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::12602' => [
            'name' => 'Nebraska CS27 South zone',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2222'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::12630' => [
            'name' => 'SPCS83 Nebraska zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['1396'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::12701' => [
            'name' => 'Nevada CS27 East zone',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2224'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::12702' => [
            'name' => 'Nevada CS27 Central zone',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2223'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::12703' => [
            'name' => 'Nevada CS27 West zone',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2225'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::12731' => [
            'name' => 'SPCS83 Nevada East zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2224'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::12732' => [
            'name' => 'SPCS83 Nevada Central zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2223'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::12733' => [
            'name' => 'SPCS83 Nevada West zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2225'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::12800' => [
            'name' => 'New Hampshire CS27',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1398'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::12830' => [
            'name' => 'SPCS83 New Hampshire zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1398'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::12900' => [
            'name' => 'New Jersey CS27',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1399'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::12930' => [
            'name' => 'SPCS83 New Jersey zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1399'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::13001' => [
            'name' => 'New Mexico CS27 East zone',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2228'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::13002' => [
            'name' => 'New Mexico CS27 Central zone',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2229'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::13003' => [
            'name' => 'New Mexico CS27 West zone',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2230'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::13031' => [
            'name' => 'SPCS83 New Mexico East zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2228'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::13032' => [
            'name' => 'SPCS83 New Mexico Central zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2231'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::13033' => [
            'name' => 'SPCS83 New Mexico West zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2232'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::13101' => [
            'name' => 'New York CS27 East zone',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2234'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::13102' => [
            'name' => 'New York CS27 Central zone',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2233'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::13103' => [
            'name' => 'New York CS27 West zone',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2236'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::13131' => [
            'name' => 'SPCS83 New York East zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2234'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::13132' => [
            'name' => 'SPCS83 New York Central zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2233'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::13133' => [
            'name' => 'SPCS83 New York West zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2236'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::13134' => [
            'name' => 'SPCS83 New York Long Island zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2235'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::13200' => [
            'name' => 'North Carolina CS27',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['1402'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::13230' => [
            'name' => 'SPCS83 North Carolina zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['1402'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::13301' => [
            'name' => 'North Dakota CS27 North zone',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2237'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::13302' => [
            'name' => 'North Dakota CS27 South zone',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2238'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::13331' => [
            'name' => 'SPCS83 North Dakota North zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2237'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::13332' => [
            'name' => 'SPCS83 North Dakota South zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2238'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::13401' => [
            'name' => 'Ohio CS27 North zone',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2239'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::13402' => [
            'name' => 'Ohio CS27 South zone',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2240'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::13431' => [
            'name' => 'SPCS83 Ohio North zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2239'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::13432' => [
            'name' => 'SPCS83 Ohio South zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2240'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::13433' => [
            'name' => 'SPCS83 Ohio North zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2239'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::13434' => [
            'name' => 'SPCS83 Ohio South zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2240'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::13501' => [
            'name' => 'Oklahoma CS27 North zone',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2241'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::13502' => [
            'name' => 'Oklahoma CS27 South zone',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2242'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::13531' => [
            'name' => 'SPCS83 Oklahoma North zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2241'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::13532' => [
            'name' => 'SPCS83 Oklahoma South zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2242'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::13601' => [
            'name' => 'Oregon CS27 North zone',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2243'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::13602' => [
            'name' => 'Oregon CS27 South zone',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2244'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::13631' => [
            'name' => 'SPCS83 Oregon North zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2243'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::13632' => [
            'name' => 'SPCS83 Oregon South zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2244'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::13633' => [
            'name' => 'Oregon Lambert (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['1406'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::13701' => [
            'name' => 'Pennsylvania CS27 North zone',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2245'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::13731' => [
            'name' => 'SPCS83 Pennsylvania North zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2245'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::13732' => [
            'name' => 'SPCS83 Pennsylvania South zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2246'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::13800' => [
            'name' => 'Rhode Island CS27',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1408'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::13830' => [
            'name' => 'SPCS83 Rhode Island zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1408'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::13901' => [
            'name' => 'South Carolina CS27 North zone',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2247'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::13902' => [
            'name' => 'South Carolina CS27 South zone',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2248'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::13930' => [
            'name' => 'SPCS83 South Carolina zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['1409'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::14001' => [
            'name' => 'South Dakota CS27 North zone',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2249'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::14002' => [
            'name' => 'South Dakota CS27 South zone',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2250'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::14031' => [
            'name' => 'SPCS83 South Dakota North zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2249'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::14032' => [
            'name' => 'SPCS83 South Dakota South zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2250'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::14130' => [
            'name' => 'SPCS83 Tennessee zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['1411'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::14201' => [
            'name' => 'Texas CS27 North zone',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2253'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::14202' => [
            'name' => 'Texas CS27 North Central zone',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2254'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::14203' => [
            'name' => 'Texas CS27 Central zone',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2252'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::14204' => [
            'name' => 'Texas CS27 South Central zone',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2256'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::14205' => [
            'name' => 'Texas CS27 South zone',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2255'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::14231' => [
            'name' => 'SPCS83 Texas North zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2253'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::14232' => [
            'name' => 'SPCS83 Texas North Central zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2254'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::14233' => [
            'name' => 'SPCS83 Texas Central zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2252'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::14234' => [
            'name' => 'SPCS83 Texas South Central zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2527'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::14235' => [
            'name' => 'SPCS83 Texas South zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2528'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::14251' => [
            'name' => 'Texas State Mapping System (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['1412'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::14252' => [
            'name' => 'Shackleford',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['1412'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::14253' => [
            'name' => 'Texas Centric Lambert Conformal',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['1412'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::14254' => [
            'name' => 'Texas Centric Albers Equal Area',
            'method' => 'urn:ogc:def:method:EPSG::9822',
            'extent' => ['1412'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::14301' => [
            'name' => 'Utah CS27 North zone',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2258'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::14302' => [
            'name' => 'Utah CS27 Central zone',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2257'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::14303' => [
            'name' => 'Utah CS27 South zone',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2259'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::14331' => [
            'name' => 'SPCS83 Utah North zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2258'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::14332' => [
            'name' => 'SPCS83 Utah Central zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2257'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::14333' => [
            'name' => 'SPCS83 Utah South zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2259'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::14400' => [
            'name' => 'Vermont CS27',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1414'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::14430' => [
            'name' => 'SPCS83 Vermont zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1414'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::14501' => [
            'name' => 'Virginia CS27 North zone',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2260'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::14502' => [
            'name' => 'Virginia CS27 South zone',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2261'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::14531' => [
            'name' => 'SPCS83 Virginia North zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2260'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::14532' => [
            'name' => 'SPCS83 Virginia South zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2261'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::14601' => [
            'name' => 'Washington CS27 North zone',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::14602' => [
            'name' => 'Washington CS27 South zone',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2263'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::14631' => [
            'name' => 'SPCS83 Washington North zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2273'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::14632' => [
            'name' => 'SPCS83 Washington South zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2274'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::14701' => [
            'name' => 'West Virginia CS27 North zone',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2264'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::14702' => [
            'name' => 'West Virginia CS27 South zone',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2265'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::14731' => [
            'name' => 'SPCS83 West Virginia North zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2264'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::14732' => [
            'name' => 'SPCS83 West Virginia South zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2265'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::14735' => [
            'name' => 'SPCS83 West Virginia North zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2264'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::14736' => [
            'name' => 'SPCS83 West Virginia South zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2265'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::14801' => [
            'name' => 'Wisconsin CS27 North zone',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2267'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::14802' => [
            'name' => 'Wisconsin CS27 Central zone',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2266'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::14803' => [
            'name' => 'Wisconsin CS27 South zone',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2268'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::14811' => [
            'name' => 'Wisconsin Transverse Mercator 27',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1418'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::14831' => [
            'name' => 'SPCS83 Wisconsin North zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2267'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::14832' => [
            'name' => 'SPCS83 Wisconsin Central zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2266'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::14833' => [
            'name' => 'SPCS83 Wisconsin South zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2268'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::14841' => [
            'name' => 'Wisconsin Transverse Mercator 83',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1418'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::14901' => [
            'name' => 'Wyoming CS27 East zone',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2269'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::14902' => [
            'name' => 'Wyoming CS27 East Central zone',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2270'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::14903' => [
            'name' => 'Wyoming CS27 West Central zone',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2272'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::14904' => [
            'name' => 'Wyoming CS27 West zone',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2271'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::14930' => [
            'name' => 'Wyoming Lambert',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['1419'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::14931' => [
            'name' => 'SPCS83 Wyoming East zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2269'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::14932' => [
            'name' => 'SPCS83 Wyoming East Central zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2270'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::14933' => [
            'name' => 'SPCS83 Wyoming West Central zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2272'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::14934' => [
            'name' => 'SPCS83 Wyoming West zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2271'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::14935' => [
            'name' => 'SPCS83 Wyoming East zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2269'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::14936' => [
            'name' => 'SPCS83 Wyoming East Central zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2270'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::14937' => [
            'name' => 'SPCS83 Wyoming West Central zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2272'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::14938' => [
            'name' => 'SPCS83 Wyoming West zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2271'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15001' => [
            'name' => 'Alaska CS27 zone 1',
            'method' => 'urn:ogc:def:method:EPSG::9812',
            'extent' => ['2156'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15002' => [
            'name' => 'Alaska CS27 zone 2',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2158'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15003' => [
            'name' => 'Alaska CS27 zone 3',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2159'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15004' => [
            'name' => 'Alaska CS27 zone 4',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2160'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15005' => [
            'name' => 'Alaska CS27 zone 5',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2161'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15006' => [
            'name' => 'Alaska CS27 zone 6',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2162'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15007' => [
            'name' => 'Alaska CS27 zone 7',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2163'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15008' => [
            'name' => 'Alaska CS27 zone 8',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2164'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15009' => [
            'name' => 'Alaska CS27 zone 9',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2165'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15010' => [
            'name' => 'Alaska CS27 zone 10',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2157'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15020' => [
            'name' => 'Alaska Albers',
            'method' => 'urn:ogc:def:method:EPSG::9822',
            'extent' => ['1330'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15021' => [
            'name' => 'Alaska Albers (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9822',
            'extent' => ['1330'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15031' => [
            'name' => 'SPCS83 Alaska zone 1 (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9812',
            'extent' => ['2156'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15032' => [
            'name' => 'SPCS83 Alaska zone 2 (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2158'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15033' => [
            'name' => 'SPCS83 Alaska zone 3 (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2159'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15034' => [
            'name' => 'SPCS83 Alaska zone 4 (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2160'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15035' => [
            'name' => 'SPCS83 Alaska zone 5 (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2161'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15036' => [
            'name' => 'SPCS83 Alaska zone 6 (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2162'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15037' => [
            'name' => 'SPCS83 Alaska zone 7 (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2163'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15038' => [
            'name' => 'SPCS83 Alaska zone 8 (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2164'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15039' => [
            'name' => 'SPCS83 Alaska zone 9 (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2165'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15040' => [
            'name' => 'SPCS83 Alaska zone 10 (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2157'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15101' => [
            'name' => 'Hawaii CS27 zone 1',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1546'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15102' => [
            'name' => 'Hawaii CS27 zone 2',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1547'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15103' => [
            'name' => 'Hawaii CS27 zone 3',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1548'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15104' => [
            'name' => 'Hawaii CS27 zone 4',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1549'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15105' => [
            'name' => 'Hawaii CS27 zone 5',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1550'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15131' => [
            'name' => 'SPCS83 Hawaii zone 1 (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1546'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15132' => [
            'name' => 'SPCS83 Hawaii zone 2 (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1547'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15133' => [
            'name' => 'SPCS83 Hawaii zone 3 (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1548'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15134' => [
            'name' => 'SPCS83 Hawaii zone 4 (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1549'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15135' => [
            'name' => 'SPCS83 Hawaii zone 5 (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1550'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15138' => [
            'name' => 'SPCS83 Hawaii zone 3 (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1548'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15201' => [
            'name' => 'Puerto Rico CS27',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['3294'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15202' => [
            'name' => 'St. Croix CS27',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['3330'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15230' => [
            'name' => 'SPCS83 Puerto Rico & Virgin Islands zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['3634'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15297' => [
            'name' => 'SPCS83 Utah North zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2258'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15298' => [
            'name' => 'SPCS83 Utah Central zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2257'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15299' => [
            'name' => 'SPCS83 Utah South zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2259'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15302' => [
            'name' => 'Tennessee CS27',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['1411'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15303' => [
            'name' => 'SPCS83 Kentucky North zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2202'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15304' => [
            'name' => 'SPCS83 Arizona East zone (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2167'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15305' => [
            'name' => 'SPCS83 Arizona Central zone (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2166'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15306' => [
            'name' => 'SPCS83 Arizona West zone (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2168'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15307' => [
            'name' => 'SPCS83 California zone 1 (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2175'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15308' => [
            'name' => 'SPCS83 California zone 2 (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2176'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15309' => [
            'name' => 'SPCS83 California zone 3 (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2177'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15310' => [
            'name' => 'SPCS83 California zone 4 (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2178'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15311' => [
            'name' => 'SPCS83 California zone 5 (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2182'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15312' => [
            'name' => 'SPCS83 California zone 6 (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2180'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15313' => [
            'name' => 'SPCS83 Colorado North zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2184'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15314' => [
            'name' => 'SPCS83 Colorado Central zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2183'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15315' => [
            'name' => 'SPCS83 Colorado South zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2185'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15316' => [
            'name' => 'SPCS83 Connecticut zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['1377'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15317' => [
            'name' => 'SPCS83 Delaware zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1378'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15318' => [
            'name' => 'SPCS83 Florida East zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2186'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15319' => [
            'name' => 'SPCS83 Florida West zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2188'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15320' => [
            'name' => 'SPCS83 Florida North zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2187'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15321' => [
            'name' => 'SPCS83 Georgia East zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2189'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15322' => [
            'name' => 'SPCS83 Georgia West zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2190'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15323' => [
            'name' => 'SPCS83 Idaho East zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2192'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15324' => [
            'name' => 'SPCS83 Idaho Central zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2191'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15325' => [
            'name' => 'SPCS83 Idaho West zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2193'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15328' => [
            'name' => 'SPCS83 Kentucky North zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2202'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15329' => [
            'name' => 'SPCS83 Kentucky South zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2203'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15330' => [
            'name' => 'SPCS83 Maryland zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['1389'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15331' => [
            'name' => 'SPCS83 Massachusetts Mainland zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2209'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15332' => [
            'name' => 'SPCS83 Massachusetts Island zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2208'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15333' => [
            'name' => 'SPCS83 Michigan North zone (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['1723'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15334' => [
            'name' => 'SPCS83 Michigan Central zone (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['1724'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15335' => [
            'name' => 'SPCS83 Michigan South zone (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['1725'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15336' => [
            'name' => 'SPCS83 Mississippi East zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2216'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15337' => [
            'name' => 'SPCS83 Mississippi West zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2217'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15338' => [
            'name' => 'SPCS83 Montana zone (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['1395'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15339' => [
            'name' => 'SPCS83 New Mexico East zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2228'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15340' => [
            'name' => 'SPCS83 New Mexico Central zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2231'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15341' => [
            'name' => 'SPCS83 New Mexico West zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2232'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15342' => [
            'name' => 'SPCS83 New York East zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2234'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15343' => [
            'name' => 'SPCS83 New York Central zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2233'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15344' => [
            'name' => 'SPCS83 New York West zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2236'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15345' => [
            'name' => 'SPCS83 New York Long Island zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2235'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15346' => [
            'name' => 'SPCS83 North Carolina zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['1402'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15347' => [
            'name' => 'SPCS83 North Dakota North zone (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2237'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15348' => [
            'name' => 'SPCS83 North Dakota South zone (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2238'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15349' => [
            'name' => 'SPCS83 Oklahoma North zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2241'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15350' => [
            'name' => 'SPCS83 Oklahoma South zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2242'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15351' => [
            'name' => 'SPCS83 Oregon North zone (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2243'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15352' => [
            'name' => 'SPCS83 Oregon South zone (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2244'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15353' => [
            'name' => 'SPCS83 Pennsylvania North zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2245'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15354' => [
            'name' => 'SPCS83 Pennsylvania South zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2246'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15355' => [
            'name' => 'SPCS83 South Carolina zone (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['1409'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15356' => [
            'name' => 'SPCS83 Tennessee zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['1411'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15357' => [
            'name' => 'SPCS83 Texas North zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2253'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15358' => [
            'name' => 'SPCS83 Texas North Central zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2254'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15359' => [
            'name' => 'SPCS83 Texas Central zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2252'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15360' => [
            'name' => 'SPCS83 Texas South Central zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2527'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15361' => [
            'name' => 'SPCS83 Texas South zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2528'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15362' => [
            'name' => 'SPCS83 Utah North zone (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2258'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15363' => [
            'name' => 'SPCS83 Utah Central zone (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2257'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15364' => [
            'name' => 'SPCS83 Utah South zone (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2259'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15365' => [
            'name' => 'SPCS83 Virginia North zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2260'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15366' => [
            'name' => 'SPCS83 Virginia South zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2261'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15367' => [
            'name' => 'SPCS83 Washington North zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2273'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15368' => [
            'name' => 'SPCS83 Washington South zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2274'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15369' => [
            'name' => 'SPCS83 Wisconsin North zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2267'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15370' => [
            'name' => 'SPCS83 Wisconsin Central zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2266'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15371' => [
            'name' => 'SPCS83 Wisconsin South zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2268'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15372' => [
            'name' => 'SPCS83 Indiana East zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2196'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15373' => [
            'name' => 'SPCS83 Indiana West zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2197'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15374' => [
            'name' => 'Oregon GIC Lambert (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['1406'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15375' => [
            'name' => 'SPCS83 Kentucky Single Zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['1386'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15376' => [
            'name' => 'American Samoa Lambert',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['3109'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15377' => [
            'name' => 'SPCS83 Iowa North zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2198'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15378' => [
            'name' => 'SPCS83 Iowa South zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2199'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15379' => [
            'name' => 'SPCS83 Kansas North zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2200'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15380' => [
            'name' => 'SPCS83 Kansas South zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2201'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15381' => [
            'name' => 'SPCS83 Nevada East zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2224'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15382' => [
            'name' => 'SPCS83 Nevada Central zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2223'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15383' => [
            'name' => 'SPCS83 Nevada West zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2225'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15384' => [
            'name' => 'SPCS83 New Jersey zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1399'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15385' => [
            'name' => 'SPCS83 Arkansas North zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2169'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15386' => [
            'name' => 'SPCS83 Arkansas South zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2170'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15387' => [
            'name' => 'SPCS83 Illinois East zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2194'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15388' => [
            'name' => 'SPCS83 Illinois West zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2195'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15389' => [
            'name' => 'SPCS83 New Hampshire zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1398'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15390' => [
            'name' => 'SPCS83 Rhode Island zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1408'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15391' => [
            'name' => 'SPCS83 Louisiana North zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2204'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15392' => [
            'name' => 'SPCS83 Louisiana South zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2529'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15393' => [
            'name' => 'SPCS83 Louisiana Offshore zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['1387'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15394' => [
            'name' => 'SPCS83 South Dakota North zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2249'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15395' => [
            'name' => 'SPCS83 South Dakota South zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2250'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15396' => [
            'name' => 'SPCS83 Nebraska zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['1396'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15397' => [
            'name' => 'Great Lakes Albers',
            'method' => 'urn:ogc:def:method:EPSG::9822',
            'extent' => ['3467'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15398' => [
            'name' => 'Great Lakes and St Lawrence Albers',
            'method' => 'urn:ogc:def:method:EPSG::9822',
            'extent' => ['3468'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15399' => [
            'name' => 'Yap Islands',
            'method' => 'urn:ogc:def:method:EPSG::9832',
            'extent' => ['3108'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15400' => [
            'name' => 'Guam SPCS',
            'method' => 'urn:ogc:def:method:EPSG::9831',
            'extent' => ['3255'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15483' => [
            'name' => 'Tokyo to JGD2000 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3957'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15485' => [
            'name' => 'SAD69 to SIRGAS 2000 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1053'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15486' => [
            'name' => 'CH1903 to CH1903+ (1)',
            'method' => 'urn:ogc:def:method:EPSG::9615',
            'extent' => ['1286'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15494' => [
            'name' => 'Kalianpur 1962 to WGS 84 (6)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3589'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15496' => [
            'name' => 'Pulkovo 1942(58) to WGS 84 (18)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1197'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15497' => [
            'name' => 'Pulkovo 1942(58) to WGS 84 (9)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1197'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15498' => [
            'name' => 'axis order change (2D)',
            'method' => 'urn:ogc:def:method:EPSG::9843',
            'extent' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15499' => [
            'name' => 'axis order change (geographic3D horizontal)',
            'method' => 'urn:ogc:def:method:EPSG::9844',
            'extent' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15592' => [
            'name' => 'geocentric to geographic3D',
            'method' => 'urn:ogc:def:method:EPSG::9602',
            'extent' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15593' => [
            'name' => 'geographic3D to geographic2D',
            'method' => 'urn:ogc:def:method:EPSG::9659',
            'extent' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15596' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (7)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent' => ['2426'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15597' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (8)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent' => ['2427'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15598' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (9)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent' => ['2428'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15599' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (10)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent' => ['2429'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15600' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (11)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent' => ['2430'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15601' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (12)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent' => ['2431'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15602' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (13)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent' => ['2432'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15603' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (14)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent' => ['2433'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15604' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (15)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent' => ['2434'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15605' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (16)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent' => ['2435'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15606' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (17)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent' => ['2436'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15607' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (18)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent' => ['2437'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15608' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (19)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent' => ['2438'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15609' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (20)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent' => ['2439'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15610' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (21)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent' => ['2440'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15611' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (22)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent' => ['2441'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15612' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (23)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent' => ['2442'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15613' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (24)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent' => ['2443'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15614' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (25)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent' => ['2444'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15615' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (26)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent' => ['2445'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15616' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (27)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent' => ['2446'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15617' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (28)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent' => ['2447'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15618' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (29)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent' => ['2448'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15619' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (30)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent' => ['2449'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15620' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (31)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent' => ['2450'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15621' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (32)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent' => ['2451'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15622' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (33)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent' => ['2452'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15623' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (34)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent' => ['2453'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15624' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (35)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent' => ['2454'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15625' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (36)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent' => ['2455'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15626' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (37)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent' => ['2456'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15627' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (38)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent' => ['2457'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15628' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (39)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent' => ['2458'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15629' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (40)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent' => ['2459'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15630' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (41)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent' => ['2460'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15631' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (42)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent' => ['2461'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15632' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (43)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent' => ['2462'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15633' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (44)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent' => ['2463'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15634' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (45)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent' => ['2464'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15635' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (46)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent' => ['2465'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15636' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (47)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent' => ['2466'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15637' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (48)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent' => ['2467'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15638' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (49)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent' => ['2468'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15639' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (50)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent' => ['2469'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15640' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (51)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent' => ['2470'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15641' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (52)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent' => ['2471'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15642' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (53)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent' => ['2472'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15643' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (54)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent' => ['2473'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15644' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (55)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent' => ['2474'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15645' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (56)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent' => ['2475'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15646' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (57)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent' => ['2476'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15647' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (58)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent' => ['2477'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15648' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (59)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent' => ['2478'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15649' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (60)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent' => ['2479'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15650' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (61)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent' => ['2480'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15651' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (62)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent' => ['2481'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15652' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (63)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent' => ['2482'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15653' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (64)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent' => ['2483'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15654' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (65)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent' => ['2484'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15655' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (66)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent' => ['2485'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15656' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (67)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent' => ['2486'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15657' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (68)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent' => ['2487'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15658' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (69)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent' => ['2488'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15659' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (70)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent' => ['2489'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15660' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (71)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent' => ['2490'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15661' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (72)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent' => ['2491'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15662' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (73)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent' => ['2492'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15663' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (74)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent' => ['2493'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15664' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (75)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent' => ['2494'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15665' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (76)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent' => ['2495'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15666' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (77)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent' => ['2496'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15667' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (78)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent' => ['2497'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15668' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (79)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent' => ['2498'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15669' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (80)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent' => ['2499'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15670' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (81)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent' => ['2500'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15671' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (82)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent' => ['2501'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15672' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (83)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent' => ['2502'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15673' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (84)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent' => ['2503'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15674' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (85)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent' => ['2504'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15675' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (86)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent' => ['2505'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15676' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (87)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent' => ['2506'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15677' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (88)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent' => ['2507'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15678' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (89)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent' => ['2508'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15679' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (90)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent' => ['2509'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15680' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (91)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent' => ['2510'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15681' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (92)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent' => ['2511'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15682' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (93)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent' => ['2512'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15683' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (94)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent' => ['2513'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15684' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (95)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent' => ['2514'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15685' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (96)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent' => ['2515'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15686' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (97)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent' => ['2516'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15687' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (98)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent' => ['2517'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15688' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (99)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent' => ['2518'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15689' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (100)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent' => ['2519'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15690' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (101)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent' => ['2520'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15691' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (102)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent' => ['2521'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15692' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (103)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent' => ['2522'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15693' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (104)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent' => ['2523'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15694' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (105)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent' => ['2524'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15695' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (106)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent' => ['2525'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15696' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (107)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent' => ['2526'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15697' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (6)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent' => ['2425'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15699' => [
            'name' => 'NAD27 to WGS 84 (87)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3462'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15701' => [
            'name' => 'Kalianpur 1962 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['2985'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15702' => [
            'name' => 'Kalianpur 1962 to WGS 84 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['2984'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15703' => [
            'name' => 'Kalianpur 1962 to WGS 84 (4)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['2982'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15707' => [
            'name' => 'ELD79 to WGS 84 (6)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['2987'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15708' => [
            'name' => 'PRS92 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent' => ['1190'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15709' => [
            'name' => 'Nouakchott 1965 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['2972'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15713' => [
            'name' => 'Gan 1970 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3274'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15730' => [
            'name' => 'Bogota 1975 to MAGNA-SIRGAS (9)',
            'method' => 'urn:ogc:def:method:EPSG::9636',
            'extent' => ['3082'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15731' => [
            'name' => 'Bogota 1975 to MAGNA-SIRGAS (10)',
            'method' => 'urn:ogc:def:method:EPSG::9636',
            'extent' => ['3083'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15732' => [
            'name' => 'Bogota 1975 to MAGNA-SIRGAS (11)',
            'method' => 'urn:ogc:def:method:EPSG::9636',
            'extent' => ['3084'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15733' => [
            'name' => 'Bogota 1975 to MAGNA-SIRGAS (12)',
            'method' => 'urn:ogc:def:method:EPSG::9636',
            'extent' => ['3085'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15734' => [
            'name' => 'Bogota 1975 to MAGNA-SIRGAS (13)',
            'method' => 'urn:ogc:def:method:EPSG::9636',
            'extent' => ['3086'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15735' => [
            'name' => 'Bogota 1975 to MAGNA-SIRGAS (14)',
            'method' => 'urn:ogc:def:method:EPSG::9636',
            'extent' => ['3087'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15736' => [
            'name' => 'Bogota 1975 to MAGNA-SIRGAS (15)',
            'method' => 'urn:ogc:def:method:EPSG::9636',
            'extent' => ['3088'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15737' => [
            'name' => 'Bogota 1975 to MAGNA-SIRGAS (16)',
            'method' => 'urn:ogc:def:method:EPSG::9636',
            'extent' => ['3089'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15738' => [
            'name' => 'MAGNA-SIRGAS to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1070'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15742' => [
            'name' => 'Deir ez Zor to WGS 84 (5)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3314'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15743' => [
            'name' => 'Deir ez Zor to WGS 84 (6)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent' => ['2329'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15745' => [
            'name' => 'ED50(ED77) to WGS 84 (6)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3140'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15746' => [
            'name' => 'Nakhl-e Ghanem to WGS 84 (6)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3141'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15752' => [
            'name' => 'ED79 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1297'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15753' => [
            'name' => 'ED50 to ED87 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9651',
            'extent' => ['2330'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15759' => [
            'name' => 'Maupiti 83 to RGPF (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3126'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15778' => [
            'name' => 'ELD79 to WGS 84 (7)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3142'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15782' => [
            'name' => 'Campo Inchauspe to POSGAR 94 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3215'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15784' => [
            'name' => 'Le Pouce 1934 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3209'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15787' => [
            'name' => 'IGCB 1955 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3171'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15790' => [
            'name' => 'Mhast (offshore) to WGS 72BE (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3180'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15792' => [
            'name' => 'Egypt Gulf of Suez S-650 TL to WGS 72BE (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['2341'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15793' => [
            'name' => 'Barbados 1938 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3218'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15794' => [
            'name' => 'Cocos Islands 1965 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1069'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15795' => [
            'name' => 'Tern Island 1961 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3181'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15796' => [
            'name' => 'Iwo Jima 1945 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3200'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15797' => [
            'name' => 'Ascension Island 1958 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3182'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15799' => [
            'name' => 'Marcus Island 1952 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1872'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15801' => [
            'name' => 'Bellevue to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3193'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15802' => [
            'name' => 'Camp Area Astro to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3205'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15803' => [
            'name' => 'Phoenix Islands 1966 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3196'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15804' => [
            'name' => 'Cape Canaveral to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3206'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15805' => [
            'name' => 'Solomon 1968 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3198'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15806' => [
            'name' => 'Easter Island 1967 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3188'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15807' => [
            'name' => 'Solomon 1968 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3197'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15808' => [
            'name' => 'Diego Garcia 1969 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3189'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15809' => [
            'name' => 'Johnston Island 1961 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3201'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15810' => [
            'name' => 'Kusaie 1951 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3192'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15812' => [
            'name' => 'Deception Island to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3204'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15813' => [
            'name' => 'South Georgia 1968 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3529'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15815' => [
            'name' => 'PN84 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['4598'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15816' => [
            'name' => 'Tristan 1968 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3184'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15818' => [
            'name' => 'Midway 1961 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3202'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15819' => [
            'name' => 'Pitcairn 1967 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3208'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15820' => [
            'name' => 'Santo 1965 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3194'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15822' => [
            'name' => 'Marshall Islands 1960 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3191'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15823' => [
            'name' => 'Wake Island 1952 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3190'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15824' => [
            'name' => 'Old Hawaiian to WGS 84 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1334'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15825' => [
            'name' => 'Old Hawaiian to WGS 84 (4)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1546'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15826' => [
            'name' => 'Old Hawaiian to WGS 84 (5)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1549'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15827' => [
            'name' => 'Old Hawaiian to WGS 84 (6)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1547'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15828' => [
            'name' => 'Old Hawaiian to WGS 84 (7)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1548'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15831' => [
            'name' => 'Korea 2000 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1135'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15833' => [
            'name' => 'RGPF to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1098'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15842' => [
            'name' => 'Hong Kong 1963(67) to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1118'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15843' => [
            'name' => 'PZ-90 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15844' => [
            'name' => 'Pulkovo 1942 to PZ-90 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent' => ['2423'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15846' => [
            'name' => 'Egypt Gulf of Suez S-650 TL to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['2341'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15847' => [
            'name' => 'MOP78 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['2815'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15849' => [
            'name' => 'Beduaram to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['2771'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15850' => [
            'name' => 'IGN 1962 Kerguelen to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['2816'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15855' => [
            'name' => 'NAD27 to WGS 84 (83)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3361'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15860' => [
            'name' => 'Mauritania 1999 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1157'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15865' => [
            'name' => 'Pulkovo 1942 to WGS 84 (16)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent' => ['2423'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15866' => [
            'name' => 'FD54 to ED50 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3248'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15867' => [
            'name' => 'PD/83 to ETRS89 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent' => ['2544'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15868' => [
            'name' => 'RD/83 to ETRS89 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent' => ['2545'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15870' => [
            'name' => 'Jouik 1961 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['2967'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15873' => [
            'name' => 'Douala 1948 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['2555'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15875' => [
            'name' => 'Fiji 1956 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3398'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15876' => [
            'name' => 'Fiji 1986 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent' => ['1094'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15878' => [
            'name' => 'Vanua Levu 1915 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3401'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15879' => [
            'name' => 'GR96 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1107'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15880' => [
            'name' => 'RGNC91-93 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1174'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15889' => [
            'name' => 'NEA74 Noumea to RGNC91-93 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent' => ['2823'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15892' => [
            'name' => 'ST87 Ouvea to RGNC91-93 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent' => ['2813'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15893' => [
            'name' => 'ST84 Ile des Pins to RGNC91-93 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent' => ['2820'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15894' => [
            'name' => 'SIRGAS 2000 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3418'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15896' => [
            'name' => 'Kertau (RSO) to Kertau 1968 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1309'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15899' => [
            'name' => 'Scoresbysund 1952 to GR96 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent' => ['2570'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15900' => [
            'name' => 'Ammassalik 1958 to GR96 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent' => ['2571'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15908' => [
            'name' => 'LGD2006 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1143'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15909' => [
            'name' => 'ELD79 to WGS 84 (8)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3271'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15911' => [
            'name' => 'ID74 to DGN95 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent' => ['4020'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15912' => [
            'name' => 'DGN95 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1122'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15913' => [
            'name' => 'NAD27 to WGS 84 (86)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3461'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15914' => [
            'name' => 'BLM zone 14N (US survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3637'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15915' => [
            'name' => 'BLM zone 15N (US survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3640'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15916' => [
            'name' => 'BLM zone 16N (US survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3641'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15917' => [
            'name' => 'BLM zone 17N (US survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3642'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15918' => [
            'name' => 'Beijing 1954 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3466'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15919' => [
            'name' => 'Beijing 1954 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent' => ['3469'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15920' => [
            'name' => 'Beijing 1954 to WGS 84 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent' => ['3470'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15921' => [
            'name' => 'Beijing 1954 to WGS 84 (4)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3507'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15923' => [
            'name' => 'ELD79 to WGS 84 (9)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3477'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15924' => [
            'name' => 'ELD79 to LGD2006 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3271'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15925' => [
            'name' => 'JAD2001 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1128'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15926' => [
            'name' => 'JAD69 to JAD2001 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent' => ['3342'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15928' => [
            'name' => 'BD72 to ETRS89 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent' => ['1347'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15931' => [
            'name' => 'NAD83(NSRS2007) to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1511'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15935' => [
            'name' => 'Beijing 1954 to WGS 84 (5)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent' => ['3561'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15936' => [
            'name' => 'Beijing 1954 to WGS 84 (6)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3466'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15948' => [
            'name' => 'DHDN to ETRS89 (8)',
            'method' => 'urn:ogc:def:method:EPSG::9615',
            'extent' => ['3339'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15953' => [
            'name' => 'Nahrwan 1967 to WGS 84 (10)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3531'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15957' => [
            'name' => 'Qornoq 1927 to GR96 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent' => ['3362'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15964' => [
            'name' => 'ED50 to WGS 84 (42)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3537'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15965' => [
            'name' => 'S-JTSK to WGS 84 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1306'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15966' => [
            'name' => 'HTRS96 to ETRS89 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1076'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15969' => [
            'name' => 'Bermuda 1957 to BDA2000 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent' => ['3221'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15971' => [
            'name' => 'BDA2000 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1047'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15972' => [
            'name' => 'Pitcairn 2006 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3208'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15974' => [
            'name' => 'RSRGD2000 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3558'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15977' => [
            'name' => 'Slovenia 1996 to ETRS89 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1212'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15978' => [
            'name' => 'NAD27 to WGS 84 (88)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent' => ['1077'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15979' => [
            'name' => 'AGD66 to GDA94 (12)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent' => ['3559'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15994' => [
            'name' => 'Pulkovo 1942(58) to ETRS89 (4)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent' => ['1197'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15996' => [
            'name' => 'Pulkovo 1942(83) to WGS 84 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1119'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15997' => [
            'name' => 'Pulkovo 1942(58) to WGS 84 (4)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3293'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15998' => [
            'name' => 'Pulkovo 1942(83) to WGS 84 (5)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['1306'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15999' => [
            'name' => 'Pulkovo 1942(58) to WGS 84 (8)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent' => ['3212'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16000' => [
            'name' => 'UTM grid system (northern hemisphere)',
            'method' => 'urn:ogc:def:method:EPSG::9824',
            'extent' => ['1998'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16001' => [
            'name' => 'UTM zone 1N',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1873'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16002' => [
            'name' => 'UTM zone 2N',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1875'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16003' => [
            'name' => 'UTM zone 3N',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1877'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16004' => [
            'name' => 'UTM zone 4N',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1879'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16005' => [
            'name' => 'UTM zone 5N',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1881'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16006' => [
            'name' => 'UTM zone 6N',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1883'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16007' => [
            'name' => 'UTM zone 7N',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1885'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16008' => [
            'name' => 'UTM zone 8N',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1887'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16009' => [
            'name' => 'UTM zone 9N',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1889'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16010' => [
            'name' => 'UTM zone 10N',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1891'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16011' => [
            'name' => 'UTM zone 11N',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1893'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16012' => [
            'name' => 'UTM zone 12N',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1895'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16013' => [
            'name' => 'UTM zone 13N',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1897'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16014' => [
            'name' => 'UTM zone 14N',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1899'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16015' => [
            'name' => 'UTM zone 15N',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1901'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16016' => [
            'name' => 'UTM zone 16N',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1903'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16017' => [
            'name' => 'UTM zone 17N',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1905'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16018' => [
            'name' => 'UTM zone 18N',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1907'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16019' => [
            'name' => 'UTM zone 19N',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1909'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16020' => [
            'name' => 'UTM zone 20N',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1911'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16021' => [
            'name' => 'UTM zone 21N',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1913'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16022' => [
            'name' => 'UTM zone 22N',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1915'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16023' => [
            'name' => 'UTM zone 23N',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1917'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16024' => [
            'name' => 'UTM zone 24N',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1919'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16025' => [
            'name' => 'UTM zone 25N',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1921'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16026' => [
            'name' => 'UTM zone 26N',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1923'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16027' => [
            'name' => 'UTM zone 27N',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1925'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16028' => [
            'name' => 'UTM zone 28N',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1927'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16029' => [
            'name' => 'UTM zone 29N',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1929'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16030' => [
            'name' => 'UTM zone 30N',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1931'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16031' => [
            'name' => 'UTM zone 31N',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1933'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16032' => [
            'name' => 'UTM zone 32N',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1935'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16033' => [
            'name' => 'UTM zone 33N',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1937'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16034' => [
            'name' => 'UTM zone 34N',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1939'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16035' => [
            'name' => 'UTM zone 35N',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1941'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16036' => [
            'name' => 'UTM zone 36N',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1943'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16037' => [
            'name' => 'UTM zone 37N',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1945'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16038' => [
            'name' => 'UTM zone 38N',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1947'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16039' => [
            'name' => 'UTM zone 39N',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1949'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16040' => [
            'name' => 'UTM zone 40N',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1951'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16041' => [
            'name' => 'UTM zone 41N',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1953'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16042' => [
            'name' => 'UTM zone 42N',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1955'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16043' => [
            'name' => 'UTM zone 43N',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1957'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16044' => [
            'name' => 'UTM zone 44N',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1959'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16045' => [
            'name' => 'UTM zone 45N',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1961'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16046' => [
            'name' => 'UTM zone 46N',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1963'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16047' => [
            'name' => 'UTM zone 47N',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1965'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16048' => [
            'name' => 'UTM zone 48N',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1967'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16049' => [
            'name' => 'UTM zone 49N',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1969'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16050' => [
            'name' => 'UTM zone 50N',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1971'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16051' => [
            'name' => 'UTM zone 51N',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1973'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16052' => [
            'name' => 'UTM zone 52N',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1975'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16053' => [
            'name' => 'UTM zone 53N',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1977'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16054' => [
            'name' => 'UTM zone 54N',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1979'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16055' => [
            'name' => 'UTM zone 55N',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1981'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16056' => [
            'name' => 'UTM zone 56N',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1983'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16057' => [
            'name' => 'UTM zone 57N',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1985'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16058' => [
            'name' => 'UTM zone 58N',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1987'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16059' => [
            'name' => 'UTM zone 59N',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1989'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16060' => [
            'name' => 'UTM zone 60N',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1991'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16061' => [
            'name' => 'Universal Polar Stereographic North',
            'method' => 'urn:ogc:def:method:EPSG::9810',
            'extent' => ['1996'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16065' => [
            'name' => 'TM35FIN',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1095'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16070' => [
            'name' => '3-degree Gauss-Kruger zone 40',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2628'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16071' => [
            'name' => '3-degree Gauss-Kruger zone 41',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2629'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16072' => [
            'name' => '3-degree Gauss-Kruger zone 42',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2630'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16073' => [
            'name' => '3-degree Gauss-Kruger zone 43',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2631'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16074' => [
            'name' => '3-degree Gauss-Kruger zone 44',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2632'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16075' => [
            'name' => '3-degree Gauss-Kruger zone 45',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2633'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16076' => [
            'name' => '3-degree Gauss-Kruger zone 46',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2634'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16077' => [
            'name' => '3-degree Gauss-Kruger zone 47',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2635'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16078' => [
            'name' => '3-degree Gauss-Kruger zone 48',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2636'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16079' => [
            'name' => '3-degree Gauss-Kruger zone 49',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2637'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16080' => [
            'name' => '3-degree Gauss-Kruger zone 50',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2638'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16081' => [
            'name' => '3-degree Gauss-Kruger zone 51',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2639'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16082' => [
            'name' => '3-degree Gauss-Kruger zone 52',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2640'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16083' => [
            'name' => '3-degree Gauss-Kruger zone 53',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2641'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16084' => [
            'name' => '3-degree Gauss-Kruger zone 54',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2642'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16085' => [
            'name' => '3-degree Gauss-Kruger zone 55',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2643'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16086' => [
            'name' => '3-degree Gauss-Kruger zone 56',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2644'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16087' => [
            'name' => '3-degree Gauss-Kruger zone 57',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2645'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16088' => [
            'name' => '3-degree Gauss-Kruger zone 58',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2646'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16089' => [
            'name' => '3-degree Gauss-Kruger zone 59',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2647'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16091' => [
            'name' => '3-degree Gauss-Kruger zone 61',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2649'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16092' => [
            'name' => '3-degree Gauss-Kruger zone 62',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2650'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16093' => [
            'name' => '3-degree Gauss-Kruger zone 63',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2651'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16094' => [
            'name' => '3-degree Gauss-Kruger zone 64',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2652'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16099' => [
            'name' => '3-degree Gauss-Kruger zone 60',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2648'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16100' => [
            'name' => 'UTM grid system (southern hemisphere)',
            'method' => 'urn:ogc:def:method:EPSG::9824',
            'extent' => ['1999'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16101' => [
            'name' => 'UTM zone 1S',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1874'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16102' => [
            'name' => 'UTM zone 2S',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1876'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16103' => [
            'name' => 'UTM zone 3S',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1878'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16104' => [
            'name' => 'UTM zone 4S',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1880'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16105' => [
            'name' => 'UTM zone 5S',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1882'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16106' => [
            'name' => 'UTM zone 6S',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1884'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16107' => [
            'name' => 'UTM zone 7S',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1886'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16108' => [
            'name' => 'UTM zone 8S',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1888'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16109' => [
            'name' => 'UTM zone 9S',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1890'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16110' => [
            'name' => 'UTM zone 10S',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1892'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16111' => [
            'name' => 'UTM zone 11S',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1894'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16112' => [
            'name' => 'UTM zone 12S',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1896'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16113' => [
            'name' => 'UTM zone 13S',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1898'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16114' => [
            'name' => 'UTM zone 14S',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1900'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16115' => [
            'name' => 'UTM zone 15S',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1902'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16116' => [
            'name' => 'UTM zone 16S',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1904'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16117' => [
            'name' => 'UTM zone 17S',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1906'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16118' => [
            'name' => 'UTM zone 18S',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1908'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16119' => [
            'name' => 'UTM zone 19S',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1910'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16120' => [
            'name' => 'UTM zone 20S',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1912'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16121' => [
            'name' => 'UTM zone 21S',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1914'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16122' => [
            'name' => 'UTM zone 22S',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1916'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16123' => [
            'name' => 'UTM zone 23S',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1918'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16124' => [
            'name' => 'UTM zone 24S',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1920'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16125' => [
            'name' => 'UTM zone 25S',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1922'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16126' => [
            'name' => 'UTM zone 26S',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1924'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16127' => [
            'name' => 'UTM zone 27S',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1926'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16128' => [
            'name' => 'UTM zone 28S',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1928'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16129' => [
            'name' => 'UTM zone 29S',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1930'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16130' => [
            'name' => 'UTM zone 30S',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1932'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16131' => [
            'name' => 'UTM zone 31S',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1934'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16132' => [
            'name' => 'UTM zone 32S',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1936'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16133' => [
            'name' => 'UTM zone 33S',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1938'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16134' => [
            'name' => 'UTM zone 34S',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1940'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16135' => [
            'name' => 'UTM zone 35S',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1942'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16136' => [
            'name' => 'UTM zone 36S',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1944'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16137' => [
            'name' => 'UTM zone 37S',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1946'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16138' => [
            'name' => 'UTM zone 38S',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1948'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16139' => [
            'name' => 'UTM zone 39S',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1950'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16140' => [
            'name' => 'UTM zone 40S',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1952'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16141' => [
            'name' => 'UTM zone 41S',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1954'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16142' => [
            'name' => 'UTM zone 42S',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1956'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16143' => [
            'name' => 'UTM zone 43S',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1958'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16144' => [
            'name' => 'UTM zone 44S',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1960'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16145' => [
            'name' => 'UTM zone 45S',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1962'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16146' => [
            'name' => 'UTM zone 46S',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1964'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16147' => [
            'name' => 'UTM zone 47S',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1966'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16148' => [
            'name' => 'UTM zone 48S',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1968'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16149' => [
            'name' => 'UTM zone 49S',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1970'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16150' => [
            'name' => 'UTM zone 50S',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1972'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16151' => [
            'name' => 'UTM zone 51S',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1974'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16152' => [
            'name' => 'UTM zone 52S',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1976'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16153' => [
            'name' => 'UTM zone 53S',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1978'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16154' => [
            'name' => 'UTM zone 54S',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1980'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16155' => [
            'name' => 'UTM zone 55S',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1982'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16156' => [
            'name' => 'UTM zone 56S',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1984'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16157' => [
            'name' => 'UTM zone 57S',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1986'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16158' => [
            'name' => 'UTM zone 58S',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1988'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16159' => [
            'name' => 'UTM zone 59S',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1990'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16160' => [
            'name' => 'UTM zone 60S',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1992'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16161' => [
            'name' => 'Universal Polar Stereographic South',
            'method' => 'urn:ogc:def:method:EPSG::9810',
            'extent' => ['1997'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16170' => [
            'name' => '3-degree Gauss-Kruger CM 120E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2628'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16172' => [
            'name' => '3-degree Gauss-Kruger CM 126E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2630'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16174' => [
            'name' => '3-degree Gauss-Kruger CM 132E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2632'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16176' => [
            'name' => '3-degree Gauss-Kruger CM 138E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2634'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16178' => [
            'name' => '3-degree Gauss-Kruger CM 144E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2636'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16180' => [
            'name' => '3-degree Gauss-Kruger CM 150E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2638'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16182' => [
            'name' => '3-degree Gauss-Kruger CM 156E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2640'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16184' => [
            'name' => '3-degree Gauss-Kruger CM 162E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2642'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16186' => [
            'name' => '3-degree Gauss-Kruger CM 168E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2644'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16188' => [
            'name' => '3-degree Gauss-Kruger CM 174E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2646'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16190' => [
            'name' => '3-degree Gauss-Kruger CM 180E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2648'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16192' => [
            'name' => '3-degree Gauss-Kruger CM 174W',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2650'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16194' => [
            'name' => '3-degree Gauss-Kruger CM 168W',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2652'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16202' => [
            'name' => '6-degree Gauss-Kruger zone 2',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2741'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16203' => [
            'name' => '6-degree Gauss-Kruger zone 3',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2742'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16204' => [
            'name' => '6-degree Gauss-Kruger zone 4',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2743'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16205' => [
            'name' => '6-degree Gauss-Kruger zone 5',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2744'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16206' => [
            'name' => '6-degree Gauss-Kruger zone 6',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2745'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16207' => [
            'name' => '6-degree Gauss-Kruger zone 7',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2746'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16208' => [
            'name' => '6-degree Gauss-Kruger zone 8',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1947'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16209' => [
            'name' => '6-degree Gauss-Kruger zone 9',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1949'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16210' => [
            'name' => '6-degree Gauss-Kruger zone 10',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1951'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16211' => [
            'name' => '6-degree Gauss-Kruger zone 11',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1953'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16212' => [
            'name' => '6-degree Gauss-Kruger zone 12',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1955'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16213' => [
            'name' => '6-degree Gauss-Kruger zone 13',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1957'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16214' => [
            'name' => '6-degree Gauss-Kruger zone 14',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1959'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16215' => [
            'name' => '6-degree Gauss-Kruger zone 15',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1961'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16216' => [
            'name' => '6-degree Gauss-Kruger zone 16',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1963'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16217' => [
            'name' => '6-degree Gauss-Kruger zone 17',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1965'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16218' => [
            'name' => '6-degree Gauss-Kruger zone 18',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1967'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16219' => [
            'name' => '6-degree Gauss-Kruger zone 19',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1969'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16220' => [
            'name' => '6-degree Gauss-Kruger zone 20',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1971'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16221' => [
            'name' => '6-degree Gauss-Kruger zone 21',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1973'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16222' => [
            'name' => '6-degree Gauss-Kruger zone 22',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1975'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16223' => [
            'name' => '6-degree Gauss-Kruger zone 23',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1977'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16224' => [
            'name' => '6-degree Gauss-Kruger zone 24',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1979'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16225' => [
            'name' => '6-degree Gauss-Kruger zone 25',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1981'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16226' => [
            'name' => '6-degree Gauss-Kruger zone 26',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1983'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16227' => [
            'name' => '6-degree Gauss-Kruger zone 27',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1985'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16228' => [
            'name' => '6-degree Gauss-Kruger zone 28',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1987'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16229' => [
            'name' => '6-degree Gauss-Kruger zone 29',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1989'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16230' => [
            'name' => '6-degree Gauss-Kruger zone 30',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1991'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16231' => [
            'name' => '6-degree Gauss-Kruger zone 31',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1873'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16232' => [
            'name' => '6-degree Gauss-Kruger zone 32',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1875'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16261' => [
            'name' => '3-degree Gauss-Kruger zone 1',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2299'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16262' => [
            'name' => '3-degree Gauss-Kruger zone 2',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2300'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16263' => [
            'name' => '3-degree Gauss-Kruger zone 3',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2301'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16264' => [
            'name' => '3-degree Gauss-Kruger zone 4',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2302'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16265' => [
            'name' => '3-degree Gauss-Kruger zone 5',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2303'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16266' => [
            'name' => '3-degree Gauss-Kruger zone 6',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2304'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16267' => [
            'name' => '3-degree Gauss-Kruger zone 7',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2305'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16268' => [
            'name' => '3-degree Gauss-Kruger zone 8',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2306'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16269' => [
            'name' => '3-degree Gauss-Kruger zone 9',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2534'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16270' => [
            'name' => '3-degree Gauss-Kruger zone 10',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2535'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16271' => [
            'name' => '3-degree Gauss-Kruger zone 11',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2536'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16272' => [
            'name' => '3-degree Gauss-Kruger zone 12',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2537'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16273' => [
            'name' => '3-degree Gauss-Kruger zone 13',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2538'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16274' => [
            'name' => '3-degree Gauss-Kruger zone 14',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2539'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16275' => [
            'name' => '3-degree Gauss-Kruger zone 15',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2540'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16276' => [
            'name' => '3-degree Gauss-Kruger zone 16',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2604'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16277' => [
            'name' => '3-degree Gauss-Kruger zone 17',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2605'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16278' => [
            'name' => '3-degree Gauss-Kruger zone 18',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2606'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16279' => [
            'name' => '3-degree Gauss-Kruger zone 19',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2607'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16280' => [
            'name' => '3-degree Gauss-Kruger zone 20',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2608'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16281' => [
            'name' => '3-degree Gauss-Kruger zone 21',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2609'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16282' => [
            'name' => '3-degree Gauss-Kruger zone 22',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2610'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16283' => [
            'name' => '3-degree Gauss-Kruger zone 23',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2611'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16284' => [
            'name' => '3-degree Gauss-Kruger zone 24',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2612'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16285' => [
            'name' => '3-degree Gauss-Kruger zone 25',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2613'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16286' => [
            'name' => '3-degree Gauss-Kruger zone 26',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2614'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16287' => [
            'name' => '3-degree Gauss-Kruger zone 27',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2615'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16288' => [
            'name' => '3-degree Gauss-Kruger zone 28',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2616'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16289' => [
            'name' => '3-degree Gauss-Kruger zone 29',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2617'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16290' => [
            'name' => '3-degree Gauss-Kruger zone 30',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2618'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16291' => [
            'name' => '3-degree Gauss-Kruger zone 31',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2619'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16292' => [
            'name' => '3-degree Gauss-Kruger zone 32',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2620'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16293' => [
            'name' => '3-degree Gauss-Kruger zone 33',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2621'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16294' => [
            'name' => '3-degree Gauss-Kruger zone 34',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2622'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16295' => [
            'name' => '3-degree Gauss-Kruger zone 35',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2623'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16296' => [
            'name' => '3-degree Gauss-Kruger zone 36',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2624'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16297' => [
            'name' => '3-degree Gauss-Kruger zone 37',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2625'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16298' => [
            'name' => '3-degree Gauss-Kruger zone 38',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2626'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16299' => [
            'name' => '3-degree Gauss-Kruger zone 39',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2627'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16302' => [
            'name' => 'Gauss-Kruger CM 9E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1935'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16304' => [
            'name' => 'Gauss-Kruger CM 21E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1939'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16305' => [
            'name' => 'Gauss-Kruger CM 27E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1941'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16306' => [
            'name' => 'Gauss-Kruger CM 33E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1943'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16307' => [
            'name' => 'Gauss-Kruger CM 39E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1945'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16308' => [
            'name' => 'Gauss-Kruger CM 45E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1947'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16309' => [
            'name' => 'Gauss-Kruger CM 51E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1949'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16310' => [
            'name' => 'Gauss-Kruger CM 57E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1951'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16311' => [
            'name' => 'Gauss-Kruger CM 63E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1953'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16312' => [
            'name' => 'Gauss-Kruger CM 69E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1955'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16313' => [
            'name' => 'Gauss-Kruger CM 75E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1957'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16314' => [
            'name' => 'Gauss-Kruger CM 81E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1959'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16315' => [
            'name' => 'Gauss-Kruger CM 87E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1961'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16316' => [
            'name' => 'Gauss-Kruger CM 93E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1963'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16317' => [
            'name' => 'Gauss-Kruger CM 99E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1965'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16318' => [
            'name' => 'Gauss-Kruger CM 105E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1967'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16319' => [
            'name' => 'Gauss-Kruger CM 111E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1969'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16320' => [
            'name' => 'Gauss-Kruger CM 117E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1971'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16321' => [
            'name' => 'Gauss-Kruger CM 123E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1973'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16322' => [
            'name' => 'Gauss-Kruger CM 129E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1975'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16323' => [
            'name' => 'Gauss-Kruger CM 135E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1977'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16324' => [
            'name' => 'Gauss-Kruger CM 141E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1979'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16325' => [
            'name' => 'Gauss-Kruger CM 147E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1981'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16326' => [
            'name' => 'Gauss-Kruger CM 153E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1983'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16327' => [
            'name' => 'Gauss-Kruger CM 159E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1985'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16328' => [
            'name' => 'Gauss-Kruger CM 165E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1987'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16329' => [
            'name' => 'Gauss-Kruger CM 171E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1989'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16330' => [
            'name' => 'Gauss-Kruger CM 177E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1991'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16331' => [
            'name' => 'Gauss-Kruger CM 177W',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1873'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16332' => [
            'name' => 'Gauss-Kruger CM 171W',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1875'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16368' => [
            'name' => '3-degree Gauss-Kruger CM 24E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2306'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16370' => [
            'name' => '3-degree Gauss-Kruger CM 30E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2535'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16372' => [
            'name' => '3-degree Gauss-Kruger CM 36E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2537'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16374' => [
            'name' => '3-degree Gauss-Kruger CM 42E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2539'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16376' => [
            'name' => '3-degree Gauss-Kruger CM 48E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2604'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16378' => [
            'name' => '3-degree Gauss-Kruger CM 54E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2606'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16380' => [
            'name' => '3-degree Gauss-Kruger CM 60E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2608'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16382' => [
            'name' => '3-degree Gauss-Kruger CM 66E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2610'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16384' => [
            'name' => '3-degree Gauss-Kruger CM 72E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2612'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16386' => [
            'name' => '3-degree Gauss-Kruger CM 78E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2614'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16388' => [
            'name' => '3-degree Gauss-Kruger CM 84E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2616'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16390' => [
            'name' => '3-degree Gauss-Kruger CM 90E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2618'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16392' => [
            'name' => '3-degree Gauss-Kruger CM 96E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2620'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16394' => [
            'name' => '3-degree Gauss-Kruger CM 102E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2622'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16396' => [
            'name' => '3-degree Gauss-Kruger CM 108E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2624'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16398' => [
            'name' => '3-degree Gauss-Kruger CM 114E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2626'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16400' => [
            'name' => 'TM 0 N',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1629'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16405' => [
            'name' => 'TM 5 NE',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1630'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16406' => [
            'name' => 'TM 6 NE',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3914'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16411' => [
            'name' => 'TM 11 NE',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1489'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16412' => [
            'name' => 'TM 12 NE',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1482'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16413' => [
            'name' => 'TM 13 NE',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2771'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16430' => [
            'name' => 'TM 30 NE',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2546'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16490' => [
            'name' => 'TM 90 NE',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1041', '3217'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16506' => [
            'name' => 'TM 106 NE',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1495'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16586' => [
            'name' => 'GK 106 NE',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1494'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16611' => [
            'name' => 'TM 11.30 SE',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1605'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16612' => [
            'name' => 'TM 12 SE',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1604'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16636' => [
            'name' => 'TM 36 SE',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1726'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16709' => [
            'name' => 'TM 109 SE',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2577'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16716' => [
            'name' => 'TM 116 SE',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2588'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16732' => [
            'name' => 'TM 132 SE',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2589'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16907' => [
            'name' => 'GSK 3-degree Gauss-Kruger zone 7',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2305'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16908' => [
            'name' => 'GSK 3-degree Gauss-Kruger zone 8',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2748'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16909' => [
            'name' => 'GSK 3-degree Gauss-Kruger zone 9',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2749'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16910' => [
            'name' => 'GSK 3-degree Gauss-Kruger zone 10',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2535'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16911' => [
            'name' => 'GSK 3-degree Gauss-Kruger zone 11',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2751'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16912' => [
            'name' => 'GSK 3-degree Gauss-Kruger zone 12',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2752'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16913' => [
            'name' => 'GSK 3-degree Gauss-Kruger zone 13',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2753'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16914' => [
            'name' => 'GSK 3-degree Gauss-Kruger zone 14',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2754'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16915' => [
            'name' => 'GSK 3-degree Gauss-Kruger zone 15',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2755'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16916' => [
            'name' => 'GSK 3-degree Gauss-Kruger zone 16',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2756'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16917' => [
            'name' => 'GSK 3-degree Gauss-Kruger zone 17',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2757'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16918' => [
            'name' => 'GSK 3-degree Gauss-Kruger zone 18',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2758'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16919' => [
            'name' => 'GSK 3-degree Gauss-Kruger zone 19',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2759'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16920' => [
            'name' => 'GSK 3-degree Gauss-Kruger zone 20',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2760'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16921' => [
            'name' => 'GSK 3-degree Gauss-Kruger zone 21',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2609'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16922' => [
            'name' => 'GSK 3-degree Gauss-Kruger zone 22',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2762'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16923' => [
            'name' => 'GSK 3-degree Gauss-Kruger zone 23',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2763'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16924' => [
            'name' => 'GSK 3-degree Gauss-Kruger zone 24',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2764'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16925' => [
            'name' => 'GSK 3-degree Gauss-Kruger zone 25',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2765'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16926' => [
            'name' => 'GSK 3-degree Gauss-Kruger zone 26',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2766'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16927' => [
            'name' => 'GSK 3-degree Gauss-Kruger zone 27',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2767'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16928' => [
            'name' => 'GSK 3-degree Gauss-Kruger zone 28',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2768'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16929' => [
            'name' => 'GSK 3-degree Gauss-Kruger zone 29',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2769'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16930' => [
            'name' => 'GSK 3-degree Gauss-Kruger zone 30',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2676'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16931' => [
            'name' => 'GSK 3-degree Gauss-Kruger zone 31',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2677'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16932' => [
            'name' => 'GSK 3-degree Gauss-Kruger zone 32',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2678'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16933' => [
            'name' => 'GSK 3-degree Gauss-Kruger zone 33',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2679'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16934' => [
            'name' => 'GSK 3-degree Gauss-Kruger zone 34',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2680'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16935' => [
            'name' => 'GSK 3-degree Gauss-Kruger zone 35',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2681'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16936' => [
            'name' => 'GSK 3-degree Gauss-Kruger zone 36',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2682'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16937' => [
            'name' => 'GSK 3-degree Gauss-Kruger zone 37',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2683'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16938' => [
            'name' => 'GSK 3-degree Gauss-Kruger zone 38',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2684'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16939' => [
            'name' => 'GSK 3-degree Gauss-Kruger zone 39',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2685'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16940' => [
            'name' => 'GSK 3-degree Gauss-Kruger zone 40',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2686'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16941' => [
            'name' => 'GSK 3-degree Gauss-Kruger zone 41',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2687'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16942' => [
            'name' => 'GSK 3-degree Gauss-Kruger zone 42',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2688'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16943' => [
            'name' => 'GSK 3-degree Gauss-Kruger zone 43',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2689'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16944' => [
            'name' => 'GSK 3-degree Gauss-Kruger zone 44',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2690'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16945' => [
            'name' => 'GSK 3-degree Gauss-Kruger zone 45',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2691'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16946' => [
            'name' => 'GSK 3-degree Gauss-Kruger zone 46',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2692'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16947' => [
            'name' => 'GSK 3-degree Gauss-Kruger zone 47',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2693'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16948' => [
            'name' => 'GSK 3-degree Gauss-Kruger zone 48',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2694'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16949' => [
            'name' => 'GSK 3-degree Gauss-Kruger zone 49',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2695'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16950' => [
            'name' => 'GSK 3-degree Gauss-Kruger zone 50',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2696'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16951' => [
            'name' => 'GSK 3-degree Gauss-Kruger zone 51',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2697'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16952' => [
            'name' => 'GSK 3-degree Gauss-Kruger zone 52',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2698'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16953' => [
            'name' => 'GSK 3-degree Gauss-Kruger zone 53',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2699'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16954' => [
            'name' => 'GSK 3-degree Gauss-Kruger zone 54',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2700'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16955' => [
            'name' => 'GSK 3-degree Gauss-Kruger zone 55',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2701'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16956' => [
            'name' => 'GSK 3-degree Gauss-Kruger zone 56',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2702'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16957' => [
            'name' => 'GSK 3-degree Gauss-Kruger zone 57',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2703'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16958' => [
            'name' => 'GSK 3-degree Gauss-Kruger zone 58',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2704'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16959' => [
            'name' => 'GSK 3-degree Gauss-Kruger zone 59',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2705'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16960' => [
            'name' => 'GSK 3-degree Gauss-Kruger zone 60',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2706'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16961' => [
            'name' => 'GSK 3-degree Gauss-Kruger zone 61',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2707'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16962' => [
            'name' => 'GSK 3-degree Gauss-Kruger zone 62',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2708'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16963' => [
            'name' => 'GSK 3-degree Gauss-Kruger zone 63',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2709'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16964' => [
            'name' => 'GSK 3-degree Gauss-Kruger zone 64',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2710'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17001' => [
            'name' => 'TM 1 NW',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1505'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17005' => [
            'name' => 'TM 5 NW',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2296'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17054' => [
            'name' => 'TM 54 NW',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1727'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17107' => [
            'name' => 'GSK 3-degree Gauss-Kruger CM 21E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2305'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17108' => [
            'name' => 'GSK 3-degree Gauss-Kruger CM 24E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2748'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17109' => [
            'name' => 'GSK 3-degree Gauss-Kruger CM 27E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2749'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17110' => [
            'name' => 'GSK 3-degree Gauss-Kruger CM 30E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2750'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17111' => [
            'name' => 'GSK 3-degree Gauss-Kruger CM 33E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2751'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17112' => [
            'name' => 'GSK 3-degree Gauss-Kruger CM 36E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2752'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17113' => [
            'name' => 'GSK 3-degree Gauss-Kruger CM 39E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2753'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17114' => [
            'name' => 'GSK 3-degree Gauss-Kruger CM 42E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2754'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17115' => [
            'name' => 'GSK 3-degree Gauss-Kruger CM 45E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2755'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17116' => [
            'name' => 'GSK 3-degree Gauss-Kruger CM 48E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2756'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17117' => [
            'name' => 'GSK 3-degree Gauss-Kruger CM 51E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2757'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17118' => [
            'name' => 'GSK 3-degree Gauss-Kruger CM 54E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2758'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17119' => [
            'name' => 'GSK 3-degree Gauss-Kruger CM 57E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2759'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17120' => [
            'name' => 'GSK 3-degree Gauss-Kruger CM 60E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2760'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17121' => [
            'name' => 'GSK 3-degree Gauss-Kruger CM 63E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2761'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17122' => [
            'name' => 'GSK 3-degree Gauss-Kruger CM 66E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2762'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17123' => [
            'name' => 'GSK 3-degree Gauss-Kruger CM 69E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2763'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17124' => [
            'name' => 'GSK 3-degree Gauss-Kruger CM 72E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2764'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17125' => [
            'name' => 'GSK 3-degree Gauss-Kruger CM 75E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2765'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17126' => [
            'name' => 'GSK 3-degree Gauss-Kruger CM 78E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2766'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17127' => [
            'name' => 'GSK 3-degree Gauss-Kruger CM 81E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2767'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17128' => [
            'name' => 'GSK 3-degree Gauss-Kruger CM 84E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2768'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17129' => [
            'name' => 'GSK 3-degree Gauss-Kruger CM 87E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2769'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17130' => [
            'name' => 'GSK 3-degree Gauss-Kruger CM 90E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2676'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17131' => [
            'name' => 'GSK 3-degree Gauss-Kruger CM 93E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2677'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17132' => [
            'name' => 'GSK 3-degree Gauss-Kruger CM 96E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2678'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17133' => [
            'name' => 'GSK 3-degree Gauss-Kruger CM 99E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2679'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17134' => [
            'name' => 'GSK 3-degree Gauss-Kruger CM 102E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2680'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17135' => [
            'name' => 'GSK 3-degree Gauss-Kruger CM 105E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2681'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17136' => [
            'name' => 'GSK 3-degree Gauss-Kruger CM 108E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2682'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17137' => [
            'name' => 'GSK 3-degree Gauss-Kruger CM 111E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2683'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17138' => [
            'name' => 'GSK 3-degree Gauss-Kruger CM 114E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2684'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17139' => [
            'name' => 'GSK 3-degree Gauss-Kruger CM 117E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2685'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17140' => [
            'name' => 'GSK 3-degree Gauss-Kruger CM 120E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2686'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17141' => [
            'name' => 'GSK 3-degree Gauss-Kruger CM 123E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2687'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17142' => [
            'name' => 'GSK 3-degree Gauss-Kruger CM 126E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2688'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17143' => [
            'name' => 'GSK 3-degree Gauss-Kruger CM 129E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2689'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17144' => [
            'name' => 'GSK 3-degree Gauss-Kruger CM 132E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2690'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17145' => [
            'name' => 'GSK 3-degree Gauss-Kruger CM 135E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2691'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17146' => [
            'name' => 'GSK 3-degree Gauss-Kruger CM 138E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2692'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17147' => [
            'name' => 'GSK 3-degree Gauss-Kruger CM 141E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2693'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17148' => [
            'name' => 'GSK 3-degree Gauss-Kruger CM 144E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2694'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17149' => [
            'name' => 'GSK 3-degree Gauss-Kruger CM 147E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2695'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17150' => [
            'name' => 'GSK 3-degree Gauss-Kruger CM 150E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2696'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17151' => [
            'name' => 'GSK 3-degree Gauss-Kruger CM 153E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2697'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17152' => [
            'name' => 'GSK 3-degree Gauss-Kruger CM 156E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2698'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17153' => [
            'name' => 'GSK 3-degree Gauss-Kruger CM 159E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2699'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17154' => [
            'name' => 'GSK 3-degree Gauss-Kruger CM 162E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2700'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17155' => [
            'name' => 'GSK 3-degree Gauss-Kruger CM 165E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2701'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17156' => [
            'name' => 'GSK 3-degree Gauss-Kruger CM 168E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2702'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17157' => [
            'name' => 'GSK 3-degree Gauss-Kruger CM 171E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2703'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17158' => [
            'name' => 'GSK 3-degree Gauss-Kruger CM 174E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2704'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17159' => [
            'name' => 'GSK 3-degree Gauss-Kruger CM 177E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2705'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17160' => [
            'name' => 'GSK 3-degree Gauss-Kruger CM 180E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2706'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17161' => [
            'name' => 'GSK 3-degree Gauss-Kruger CM 177W',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2707'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17162' => [
            'name' => 'GSK 3-degree Gauss-Kruger CM 174W',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2708'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17163' => [
            'name' => 'GSK 3-degree Gauss-Kruger CM 171W',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2709'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17164' => [
            'name' => 'GSK 3-degree Gauss-Kruger CM 168W',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2710'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17204' => [
            'name' => 'SCAR IMW SP19-20',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2991'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17205' => [
            'name' => 'SCAR IMW SP21-22',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2992'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17206' => [
            'name' => 'SCAR IMW SP23-24',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2993'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17207' => [
            'name' => 'SCAR IMW SQ01-02',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2994'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17208' => [
            'name' => 'SCAR IMW SQ19-20',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2995'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17209' => [
            'name' => 'SCAR IMW SQ21-22',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2996'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17210' => [
            'name' => 'SCAR IMW SQ37-38',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2997'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17211' => [
            'name' => 'SCAR IMW SQ39-40',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2998'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17212' => [
            'name' => 'SCAR IMW SQ41-42',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2999'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17213' => [
            'name' => 'SCAR IMW SQ43-44',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['3000'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17214' => [
            'name' => 'SCAR IMW SQ45-46',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['3001'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17215' => [
            'name' => 'SCAR IMW SQ47-48',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['3002'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17216' => [
            'name' => 'SCAR IMW SQ49-50',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['3003'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17217' => [
            'name' => 'SCAR IMW SQ51-52',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['3004'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17218' => [
            'name' => 'SCAR IMW SQ53-54',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['3005'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17219' => [
            'name' => 'SCAR IMW SQ55-56',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['3006'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17220' => [
            'name' => 'SCAR IMW SQ57-58',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['3007'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17221' => [
            'name' => 'SCAR IMW SR13-14',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['3008'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17222' => [
            'name' => 'SCAR IMW SR15-16',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['3009'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17223' => [
            'name' => 'SCAR IMW SR17-18',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['3010'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17224' => [
            'name' => 'SCAR IMW SR19-20',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['3011'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17225' => [
            'name' => 'SCAR IMW SR27-28',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['3012'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17226' => [
            'name' => 'SCAR IMW SR29-30',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['3013'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17227' => [
            'name' => 'SCAR IMW SR31-32',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['3014'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17228' => [
            'name' => 'SCAR IMW SR33-34',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['3015'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17229' => [
            'name' => 'SCAR IMW SR35-36',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['3016'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17230' => [
            'name' => 'SCAR IMW SR37-38',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['3017'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17231' => [
            'name' => 'SCAR IMW SR39-40',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['3018'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17232' => [
            'name' => 'SCAR IMW SR41-42',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['3019'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17233' => [
            'name' => 'SCAR IMW SR43-44',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['3020'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17234' => [
            'name' => 'SCAR IMW SR45-46',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['3021'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17235' => [
            'name' => 'SCAR IMW SR47-48',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['3022'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17236' => [
            'name' => 'SCAR IMW SR49-50',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['3023'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17237' => [
            'name' => 'SCAR IMW SR51-52',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['3024'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17238' => [
            'name' => 'SCAR IMW SR53-54',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['3025'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17239' => [
            'name' => 'SCAR IMW SR55-56',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['3026'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17240' => [
            'name' => 'SCAR IMW SR57-58',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['3027'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17241' => [
            'name' => 'SCAR IMW SR59-60',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['3028'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17242' => [
            'name' => 'SCAR IMW SS04-06',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['3029'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17243' => [
            'name' => 'SCAR IMW SS07-09',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['3030'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17244' => [
            'name' => 'SCAR IMW SS10-12',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['3031'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17245' => [
            'name' => 'SCAR IMW SS13-15',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['3032'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17246' => [
            'name' => 'SCAR IMW SS16-18',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['3033'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17247' => [
            'name' => 'SCAR IMW SS19-21',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['3034'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17248' => [
            'name' => 'SCAR IMW SS25-27',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['3035'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17249' => [
            'name' => 'SCAR IMW SS28-30',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['3036'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17250' => [
            'name' => 'SCAR IMW SS31-33',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['3037'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17251' => [
            'name' => 'SCAR IMW SS34-36',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['3038'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17252' => [
            'name' => 'SCAR IMW SS37-39',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['3039'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17253' => [
            'name' => 'SCAR IMW SS40-42',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['3040'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17254' => [
            'name' => 'SCAR IMW SS43-45',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['3041'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17255' => [
            'name' => 'SCAR IMW SS46-48',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['3042'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17256' => [
            'name' => 'SCAR IMW SS49-51',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['3043'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17257' => [
            'name' => 'SCAR IMW SS52-54',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['3044'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17258' => [
            'name' => 'SCAR IMW SS55-57',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['3045'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17259' => [
            'name' => 'SCAR IMW SS58-60',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['3046'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17260' => [
            'name' => 'SCAR IMW ST01-04',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['3047'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17261' => [
            'name' => 'SCAR IMW ST05-08',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['3048'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17262' => [
            'name' => 'SCAR IMW ST09-12',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['3049'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17263' => [
            'name' => 'SCAR IMW ST13-16',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['3050'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17264' => [
            'name' => 'SCAR IMW ST17-20',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['3051'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17265' => [
            'name' => 'SCAR IMW ST21-24',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['3052'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17266' => [
            'name' => 'SCAR IMW ST25-28',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['3053'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17267' => [
            'name' => 'SCAR IMW ST29-32',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['3054'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17268' => [
            'name' => 'SCAR IMW ST33-36',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['3055'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17269' => [
            'name' => 'SCAR IMW ST37-40',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['3056'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17270' => [
            'name' => 'SCAR IMW ST41-44',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['3057'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17271' => [
            'name' => 'SCAR IMW ST45-48',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['3058'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17272' => [
            'name' => 'SCAR IMW ST49-52',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['3059'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17273' => [
            'name' => 'SCAR IMW ST53-56',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['3060'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17274' => [
            'name' => 'SCAR IMW ST57-60',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['3061'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17275' => [
            'name' => 'SCAR IMW SU01-05',
            'method' => 'urn:ogc:def:method:EPSG::9829',
            'extent' => ['3062'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17276' => [
            'name' => 'SCAR IMW SU06-10',
            'method' => 'urn:ogc:def:method:EPSG::9829',
            'extent' => ['3063'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17277' => [
            'name' => 'SCAR IMW SU11-15',
            'method' => 'urn:ogc:def:method:EPSG::9829',
            'extent' => ['3064'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17278' => [
            'name' => 'SCAR IMW SU16-20',
            'method' => 'urn:ogc:def:method:EPSG::9829',
            'extent' => ['3065'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17279' => [
            'name' => 'SCAR IMW SU21-25',
            'method' => 'urn:ogc:def:method:EPSG::9829',
            'extent' => ['3066'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17280' => [
            'name' => 'SCAR IMW SU26-30',
            'method' => 'urn:ogc:def:method:EPSG::9829',
            'extent' => ['3067'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17281' => [
            'name' => 'SCAR IMW SU31-35',
            'method' => 'urn:ogc:def:method:EPSG::9829',
            'extent' => ['3068'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17282' => [
            'name' => 'SCAR IMW SU36-40',
            'method' => 'urn:ogc:def:method:EPSG::9829',
            'extent' => ['3069'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17283' => [
            'name' => 'SCAR IMW SU41-45',
            'method' => 'urn:ogc:def:method:EPSG::9829',
            'extent' => ['3070'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17284' => [
            'name' => 'SCAR IMW SU46-50',
            'method' => 'urn:ogc:def:method:EPSG::9829',
            'extent' => ['3071'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17285' => [
            'name' => 'SCAR IMW SU51-55',
            'method' => 'urn:ogc:def:method:EPSG::9829',
            'extent' => ['3072'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17286' => [
            'name' => 'SCAR IMW SU56-60',
            'method' => 'urn:ogc:def:method:EPSG::9829',
            'extent' => ['3073'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17287' => [
            'name' => 'SCAR IMW SV01-10',
            'method' => 'urn:ogc:def:method:EPSG::9829',
            'extent' => ['3074'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17288' => [
            'name' => 'SCAR IMW SV11-20',
            'method' => 'urn:ogc:def:method:EPSG::9829',
            'extent' => ['3075'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17289' => [
            'name' => 'SCAR IMW SV21-30',
            'method' => 'urn:ogc:def:method:EPSG::9829',
            'extent' => ['3076'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17290' => [
            'name' => 'SCAR IMW SV31-40',
            'method' => 'urn:ogc:def:method:EPSG::9829',
            'extent' => ['3077'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17291' => [
            'name' => 'SCAR IMW SV41-50',
            'method' => 'urn:ogc:def:method:EPSG::9829',
            'extent' => ['3078'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17292' => [
            'name' => 'SCAR IMW SV51-60',
            'method' => 'urn:ogc:def:method:EPSG::9829',
            'extent' => ['3079'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17293' => [
            'name' => 'SCAR IMW SW01-60',
            'method' => 'urn:ogc:def:method:EPSG::9829',
            'extent' => ['3080'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17294' => [
            'name' => 'USGS Transantarctic Mountains',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['3081'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17295' => [
            'name' => 'North Pole Lambert Azimuthal Equal Area (Bering Sea)',
            'method' => 'urn:ogc:def:method:EPSG::9820',
            'extent' => ['3480'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17296' => [
            'name' => 'North Pole Lambert Azimuthal Equal Area (Alaska)',
            'method' => 'urn:ogc:def:method:EPSG::9820',
            'extent' => ['3480'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17297' => [
            'name' => 'North Pole Lambert Azimuthal Equal Area (Canada)',
            'method' => 'urn:ogc:def:method:EPSG::9820',
            'extent' => ['3480'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17298' => [
            'name' => 'North Pole Lambert Azimuthal Equal Area (Atlantic)',
            'method' => 'urn:ogc:def:method:EPSG::9820',
            'extent' => ['3480'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17299' => [
            'name' => 'North Pole Lambert Azimuthal Equal Area (Europe)',
            'method' => 'urn:ogc:def:method:EPSG::9820',
            'extent' => ['3480'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17300' => [
            'name' => 'North Pole Lambert Azimuthal Equal Area (Russia)',
            'method' => 'urn:ogc:def:method:EPSG::9820',
            'extent' => ['3480'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17321' => [
            'name' => 'SWEREF99 12 00',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2833'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17322' => [
            'name' => 'SWEREF99 13 30',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2834'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17323' => [
            'name' => 'SWEREF99 15 00',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2835'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17324' => [
            'name' => 'SWEREF99 16 30',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2836'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17325' => [
            'name' => 'SWEREF99 18 00',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2837'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17326' => [
            'name' => 'SWEREF99 14 15',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2838'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17327' => [
            'name' => 'SWEREF99 15 45',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2839'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17328' => [
            'name' => 'SWEREF99 17 15',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2840'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17329' => [
            'name' => 'SWEREF99 18 45',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2841'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17330' => [
            'name' => 'SWEREF99 20 15',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2842'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17331' => [
            'name' => 'SWEREF99 21 45',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2843'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17332' => [
            'name' => 'SWEREF99 23 15',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2844'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17333' => [
            'name' => 'SWEREF99 TM',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1225'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17334' => [
            'name' => 'Sweden zone 7.5 gon V',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2845'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17335' => [
            'name' => 'Sweden zone 5 gon V',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2846'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17336' => [
            'name' => 'Sweden zone 0 gon',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2848'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17337' => [
            'name' => 'Sweden zone 2.5 gon O',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2849'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17338' => [
            'name' => 'Sweden zone 5 gon O',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2850'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17339' => [
            'name' => 'RT90 zone 7.5 gon V emulation',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2845'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17340' => [
            'name' => 'RT90 zone 5 gon V emulation',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2846'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17341' => [
            'name' => 'RT90 zone 2.5 gon V emulation',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2847'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17342' => [
            'name' => 'RT90 zone 0 gon emulation',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2848'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17343' => [
            'name' => 'RT90 zone 2.5 gon O emulation',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2849'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17344' => [
            'name' => 'RT90 zone 5 gon O emulation',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2850'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17348' => [
            'name' => 'Map Grid of Australia zone 48',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4191'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17349' => [
            'name' => 'Map Grid of Australia zone 49',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4176'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17350' => [
            'name' => 'Map Grid of Australia zone 50',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4178'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17351' => [
            'name' => 'Map Grid of Australia zone 51',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1559'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17352' => [
            'name' => 'Map Grid of Australia zone 52',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1560'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17353' => [
            'name' => 'Map Grid of Australia zone 53',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1561'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17354' => [
            'name' => 'Map Grid of Australia zone 54',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1562'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17355' => [
            'name' => 'Map Grid of Australia zone 55',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1563'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17356' => [
            'name' => 'Map Grid of Australia zone 56',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1564'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17357' => [
            'name' => 'Map Grid of Australia zone 57',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4196'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17358' => [
            'name' => 'Map Grid of Australia zone 58',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4175'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17359' => [
            'name' => 'South Australia Lambert',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2986'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17360' => [
            'name' => 'Vicgrid66',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2285'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17361' => [
            'name' => 'Vicgrid',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2285'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17362' => [
            'name' => 'Geoscience Australia Standard National Scale Lambert Projection',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2575'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17363' => [
            'name' => 'Brisbane City Survey Grid 02',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2990'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17364' => [
            'name' => 'New South Wales Lambert',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['3139'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17365' => [
            'name' => 'Australian Albers',
            'method' => 'urn:ogc:def:method:EPSG::9822',
            'extent' => ['2575'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17412' => [
            'name' => 'Congo Transverse Mercator zone 12',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3937'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17414' => [
            'name' => 'Congo Transverse Mercator zone 14',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3151'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17416' => [
            'name' => 'Congo Transverse Mercator zone 16',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3152'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17418' => [
            'name' => 'Congo Transverse Mercator zone 18',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3153'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17420' => [
            'name' => 'Congo Transverse Mercator zone 20',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3154'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17422' => [
            'name' => 'Congo Transverse Mercator zone 22',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3155'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17424' => [
            'name' => 'Congo Transverse Mercator zone 24',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3156'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17426' => [
            'name' => 'Congo Transverse Mercator zone 26',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3157'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17428' => [
            'name' => 'Congo Transverse Mercator zone 28',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3158'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17430' => [
            'name' => 'Congo Transverse Mercator zone 30',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3159'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17432' => [
            'name' => 'Indonesia TM-3 zone 46.2',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3976'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17433' => [
            'name' => 'Indonesia TM-3 zone 47.1',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3510'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17434' => [
            'name' => 'Indonesia TM-3 zone 47.2',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3511'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17435' => [
            'name' => 'Indonesia TM-3 zone 48.1',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3512'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17436' => [
            'name' => 'Indonesia TM-3 zone 48.2',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3513'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17437' => [
            'name' => 'Indonesia TM-3 zone 49.1',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3514'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17438' => [
            'name' => 'Indonesia TM-3 zone 49.2',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3515'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17439' => [
            'name' => 'Indonesia TM-3 zone 50.1',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3516'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17440' => [
            'name' => 'Indonesia TM-3 zone 50.2',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3517'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17441' => [
            'name' => 'Indonesia TM-3 zone 51.1',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3518'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17442' => [
            'name' => 'Indonesia TM-3 zone 51.2',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3519'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17443' => [
            'name' => 'Indonesia TM-3 zone 52.1',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3520'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17444' => [
            'name' => 'Indonesia TM-3 zone 52.2',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3521'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17445' => [
            'name' => 'Indonesia TM-3 zone 53.1',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3522'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17446' => [
            'name' => 'Indonesia TM-3 zone 53.2',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3523'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17447' => [
            'name' => 'Indonesia TM-3 zone 54.1',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3975'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17449' => [
            'name' => 'Australian Map Grid zone 49',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1557'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17450' => [
            'name' => 'Australian Map Grid zone 50',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1558'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17451' => [
            'name' => 'Australian Map Grid zone 51',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1559'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17452' => [
            'name' => 'Australian Map Grid zone 52',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1560'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17453' => [
            'name' => 'Australian Map Grid zone 53',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1561'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17454' => [
            'name' => 'Australian Map Grid zone 54',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1567'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17455' => [
            'name' => 'Australian Map Grid zone 55',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1568'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17456' => [
            'name' => 'Australian Map Grid zone 56',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2291'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17457' => [
            'name' => 'Australian Map Grid zone 57',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1565'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17458' => [
            'name' => 'Australian Map Grid zone 58',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1566'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17515' => [
            'name' => 'South African Survey Grid zone 15',
            'method' => 'urn:ogc:def:method:EPSG::9808',
            'extent' => ['1454'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17517' => [
            'name' => 'South African Survey Grid zone 17',
            'method' => 'urn:ogc:def:method:EPSG::9808',
            'extent' => ['1455'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17519' => [
            'name' => 'South African Survey Grid zone 19',
            'method' => 'urn:ogc:def:method:EPSG::9808',
            'extent' => ['1456'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17521' => [
            'name' => 'South African Survey Grid zone 21',
            'method' => 'urn:ogc:def:method:EPSG::9808',
            'extent' => ['1457'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17523' => [
            'name' => 'South African Survey Grid zone 23',
            'method' => 'urn:ogc:def:method:EPSG::9808',
            'extent' => ['1458'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17525' => [
            'name' => 'South African Survey Grid zone 25',
            'method' => 'urn:ogc:def:method:EPSG::9808',
            'extent' => ['1459'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17527' => [
            'name' => 'South African Survey Grid zone 27',
            'method' => 'urn:ogc:def:method:EPSG::9808',
            'extent' => ['1460'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17529' => [
            'name' => 'South African Survey Grid zone 29',
            'method' => 'urn:ogc:def:method:EPSG::9808',
            'extent' => ['1461'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17531' => [
            'name' => 'South African Survey Grid zone 31',
            'method' => 'urn:ogc:def:method:EPSG::9808',
            'extent' => ['1462'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17533' => [
            'name' => 'South African Survey Grid zone 33',
            'method' => 'urn:ogc:def:method:EPSG::9808',
            'extent' => ['1463'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17611' => [
            'name' => 'South West African Survey Grid zone 11',
            'method' => 'urn:ogc:def:method:EPSG::9808',
            'extent' => ['1838'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17613' => [
            'name' => 'South West African Survey Grid zone 13',
            'method' => 'urn:ogc:def:method:EPSG::9808',
            'extent' => ['1839'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17615' => [
            'name' => 'South West African Survey Grid zone 15',
            'method' => 'urn:ogc:def:method:EPSG::9808',
            'extent' => ['1840'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17617' => [
            'name' => 'South West African Survey Grid zone 17',
            'method' => 'urn:ogc:def:method:EPSG::9808',
            'extent' => ['1841'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17619' => [
            'name' => 'South West African Survey Grid zone 19',
            'method' => 'urn:ogc:def:method:EPSG::9808',
            'extent' => ['1842'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17621' => [
            'name' => 'South West African Survey Grid zone 21',
            'method' => 'urn:ogc:def:method:EPSG::9808',
            'extent' => ['1843'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17623' => [
            'name' => 'South West African Survey Grid zone 23',
            'method' => 'urn:ogc:def:method:EPSG::9808',
            'extent' => ['1844'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17625' => [
            'name' => 'South West African Survey Grid zone 25',
            'method' => 'urn:ogc:def:method:EPSG::9808',
            'extent' => ['1845'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17701' => [
            'name' => 'MTM zone 1',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2226'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17702' => [
            'name' => 'MTM zone 2',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2227'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17703' => [
            'name' => 'MTM zone 3',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2290'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17704' => [
            'name' => 'MTM zone 4',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2276'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17705' => [
            'name' => 'MTM zone 5',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2277'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17706' => [
            'name' => 'MTM zone 6',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2278'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17707' => [
            'name' => 'MTM zone 7',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1425'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17708' => [
            'name' => 'MTM zone 8',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2279'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17709' => [
            'name' => 'MTM zone 9',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2280'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17710' => [
            'name' => 'MTM zone 10',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2281'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17711' => [
            'name' => 'MTM zone 11',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1432'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17712' => [
            'name' => 'MTM zone 12',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1433'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17713' => [
            'name' => 'MTM zone 13',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1434'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17714' => [
            'name' => 'MTM zone 14',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1435'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17715' => [
            'name' => 'MTM zone 15',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1436'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17716' => [
            'name' => 'MTM zone 16',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1437'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17717' => [
            'name' => 'MTM zone 17',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1438'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17722' => [
            'name' => 'Alberta 3-degree TM reference meridian 111 W',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3543'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17723' => [
            'name' => 'Alberta 3-degree TM reference meridian 114 W',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3542'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17724' => [
            'name' => 'Alberta 3-degree TM reference meridian 117 W',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3541'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17726' => [
            'name' => 'Alberta 3-degree TM reference meridian 120 W',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3540'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17794' => [
            'name' => 'MTM Nova Scotia zone 4',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1534'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17795' => [
            'name' => 'MTM Nova Scotia zone 5',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1535'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17801' => [
            'name' => 'Japan Plane Rectangular CS zone I',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1854'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17802' => [
            'name' => 'Japan Plane Rectangular CS zone II',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1855'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17803' => [
            'name' => 'Japan Plane Rectangular CS zone III',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1856'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17804' => [
            'name' => 'Japan Plane Rectangular CS zone IV',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1857'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17805' => [
            'name' => 'Japan Plane Rectangular CS zone V',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1858'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17806' => [
            'name' => 'Japan Plane Rectangular CS zone VI',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1859'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17807' => [
            'name' => 'Japan Plane Rectangular CS zone VII',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1860'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17808' => [
            'name' => 'Japan Plane Rectangular CS zone VIII',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1861'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17809' => [
            'name' => 'Japan Plane Rectangular CS zone IX',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1862'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17810' => [
            'name' => 'Japan Plane Rectangular CS zone X',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1863'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17811' => [
            'name' => 'Japan Plane Rectangular CS zone XI',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1864'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17812' => [
            'name' => 'Japan Plane Rectangular CS zone XII',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1865'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17813' => [
            'name' => 'Japan Plane Rectangular CS zone XIII',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1866'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17814' => [
            'name' => 'Japan Plane Rectangular CS zone XIV',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1867'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17815' => [
            'name' => 'Japan Plane Rectangular CS zone XV',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1868'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17816' => [
            'name' => 'Japan Plane Rectangular CS zone XVI',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1869'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17817' => [
            'name' => 'Japan Plane Rectangular CS zone XVII',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1870'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17818' => [
            'name' => 'Japan Plane Rectangular CS zone XVIII',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1871'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17819' => [
            'name' => 'Japan Plane Rectangular CS zone XIX',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1872'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17901' => [
            'name' => 'Mount Eden Circuit',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3781'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17902' => [
            'name' => 'Bay of Plenty Circuit',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3779'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17903' => [
            'name' => 'Poverty Bay Circuit',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3780'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17904' => [
            'name' => 'Hawkes Bay Circuit',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3772'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17905' => [
            'name' => 'Taranaki Circuit',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3777'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17906' => [
            'name' => 'Tuhirangi Circuit',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3778'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17907' => [
            'name' => 'Wanganui Circuit',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3776'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17908' => [
            'name' => 'Wairarapa Circuit',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3775'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17909' => [
            'name' => 'Wellington Circuit',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3774'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17910' => [
            'name' => 'Collingwood Circuit',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3782'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17911' => [
            'name' => 'Nelson Circuit',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3784'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17912' => [
            'name' => 'Karamea Circuit',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3783'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17913' => [
            'name' => 'Buller Circuit',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3786'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17914' => [
            'name' => 'Grey Circuit',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3787'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17915' => [
            'name' => 'Amuri Circuit',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3788'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17916' => [
            'name' => 'Marlborough Circuit',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3785'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17917' => [
            'name' => 'Hokitika Circuit',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3789'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17918' => [
            'name' => 'Okarito Circuit',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3791'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17919' => [
            'name' => 'Jacksons Bay Circuit',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3794'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17920' => [
            'name' => 'Mount Pleasant Circuit',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3790'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17921' => [
            'name' => 'Gawler Circuit',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3792'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17922' => [
            'name' => 'Timaru Circuit',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3793'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17923' => [
            'name' => 'Lindis Peak Circuit',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3795'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17924' => [
            'name' => 'Mount Nicholas Circuit',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3797'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17925' => [
            'name' => 'Mount York Circuit',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3799'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17926' => [
            'name' => 'Observation Point Circuit',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3796'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17927' => [
            'name' => 'North Taieri Circuit',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3798'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17928' => [
            'name' => 'Bluff Circuit',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3800'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17931' => [
            'name' => 'Mount Eden 2000',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3781'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17932' => [
            'name' => 'Bay of Plenty 2000',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3779'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17933' => [
            'name' => 'Poverty Bay 2000',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3780'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17934' => [
            'name' => 'Hawkes Bay 2000',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3772'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17935' => [
            'name' => 'Taranaki 2000',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3777'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17936' => [
            'name' => 'Tuhirangi 2000',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3778'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17937' => [
            'name' => 'Wanganui 2000',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3776'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17938' => [
            'name' => 'Wairarapa 2000',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3775'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17939' => [
            'name' => 'Wellington 2000',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3774'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17940' => [
            'name' => 'Collingwood 2000',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3782'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17941' => [
            'name' => 'Nelson 2000',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3784'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17942' => [
            'name' => 'Karamea 2000',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3783'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17943' => [
            'name' => 'Buller 2000',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3786'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17944' => [
            'name' => 'Grey 2000',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3787'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17945' => [
            'name' => 'Amuri 2000',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3788'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17946' => [
            'name' => 'Marlborough 2000',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3785'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17947' => [
            'name' => 'Hokitika 2000',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3789'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17948' => [
            'name' => 'Okarito 2000',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3791'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17949' => [
            'name' => 'Jacksons Bay 2000',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3794'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17950' => [
            'name' => 'Mount Pleasant 2000',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3790'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17951' => [
            'name' => 'Gawler 2000',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3792'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17952' => [
            'name' => 'Timaru 2000',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3793'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17953' => [
            'name' => 'Lindis Peak 2000',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3795'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17954' => [
            'name' => 'Mount Nicholas 2000',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3797'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17955' => [
            'name' => 'Mount York 2000',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3799'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17956' => [
            'name' => 'Observation Point 2000',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3796'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17957' => [
            'name' => 'North Taieri 2000',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3798'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17958' => [
            'name' => 'Bluff 2000',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3800'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17959' => [
            'name' => 'Chatham Island Circuit 2000',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2889'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17960' => [
            'name' => 'Auckland Islands Transverse Mercator 2000',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3554'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17961' => [
            'name' => 'Campbell Island Transverse Mercator 2000',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3555'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17962' => [
            'name' => 'Antipodes Islands Transverse Mercator 2000',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3556'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17963' => [
            'name' => 'Raoul Island Transverse Mercator 2000',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3557'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17964' => [
            'name' => 'New Zealand Continental Shelf Lambert Conformal 2000',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['3593'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17965' => [
            'name' => 'Chatham Islands Transverse Mercator 2000',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2889'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17966' => [
            'name' => 'Darwin Glacier Lambert Conformal 2000',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['3592'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18001' => [
            'name' => 'Austria Gauss-Kruger West Zone',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1706'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18002' => [
            'name' => 'Austria Gauss-Kruger Central Zone',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1707'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18003' => [
            'name' => 'Austria Gauss-Kruger East Zone',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1708'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18004' => [
            'name' => 'Austria Gauss-Kruger West',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1706'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18005' => [
            'name' => 'Austria Gauss-Kruger Central',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1707'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18006' => [
            'name' => 'Austria Gauss-Kruger East',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1708'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18007' => [
            'name' => 'Austria Gauss-Kruger M28',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1706'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18008' => [
            'name' => 'Austria Gauss-Kruger M31',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1707'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18009' => [
            'name' => 'Austria Gauss-Kruger M34',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1708'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18011' => [
            'name' => 'Nord Algerie (ancienne)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['1728'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18012' => [
            'name' => 'Sud Algerie (ancienne)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['1729'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18021' => [
            'name' => 'Nord Algerie',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['1728'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18022' => [
            'name' => 'Sud Algerie',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['1729'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18031' => [
            'name' => 'Argentina zone 1',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1608'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18032' => [
            'name' => 'Argentina zone 2',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1609'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18033' => [
            'name' => 'Argentina zone 3',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1610'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18034' => [
            'name' => 'Argentina zone 4',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1611'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18035' => [
            'name' => 'Argentina zone 5',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1612'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18036' => [
            'name' => 'Argentina zone 6',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1613'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18037' => [
            'name' => 'Argentina zone 7',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1614'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18041' => [
            'name' => 'Austria West Zone',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1706'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18042' => [
            'name' => 'Austria Central Zone',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1707'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18043' => [
            'name' => 'Austria East Zone',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1708'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18044' => [
            'name' => 'Austria M28',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1706'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18045' => [
            'name' => 'Austria M31',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1707'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18046' => [
            'name' => 'Austria M34',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1708'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18047' => [
            'name' => 'Austria zone M28',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1706'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18048' => [
            'name' => 'Austria zone M31',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1707'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18049' => [
            'name' => 'Austria zone M34',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1708'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18051' => [
            'name' => 'Colombia West zone',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1598'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18052' => [
            'name' => 'Colombia Bogota zone',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1599'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18053' => [
            'name' => 'Colombia East Central zone',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1600'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18054' => [
            'name' => 'Colombia East zone',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1601'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18055' => [
            'name' => 'Colombia MAGNA Far West zone',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3091'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18056' => [
            'name' => 'Colombia MAGNA West zone',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3090'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18057' => [
            'name' => 'Colombia MAGNA Bogota zone',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1599', '3229'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18058' => [
            'name' => 'Colombia MAGNA East Central zone',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1600'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18059' => [
            'name' => 'Colombia MAGNA East zone',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1601'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18063' => [
            'name' => 'Cuba Norte',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['1487'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18064' => [
            'name' => 'Cuba Sur',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['1488'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18065' => [
            'name' => 'Colombia MAGNA 2018 Far West zone',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3091'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18066' => [
            'name' => 'Colombia MAGNA 2018 West zone',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3090'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18067' => [
            'name' => 'Colombia MAGNA 2018 Bogota zone',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1599'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18068' => [
            'name' => 'Colombia MAGNA 2018 East Central zone',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1600'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18069' => [
            'name' => 'Colombia MAGNA 2018 East zone',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1601'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18071' => [
            'name' => 'Egypt Blue Belt',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1642'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18072' => [
            'name' => 'Egypt Red Belt',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1643'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18073' => [
            'name' => 'Egypt Purple Belt',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1644'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18074' => [
            'name' => 'Egypt Extended Purple Belt',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1645'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18081' => [
            'name' => 'Lambert zone I',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['1731'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18082' => [
            'name' => 'Lambert zone II',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['1734'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18083' => [
            'name' => 'Lambert zone III',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['1733'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18084' => [
            'name' => 'Lambert zone IV',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['1327'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18085' => [
            'name' => 'Lambert-93',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['1096'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18091' => [
            'name' => 'Lambert Nord France',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['1731'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18092' => [
            'name' => 'Lambert Centre France',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['1734'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18093' => [
            'name' => 'Lambert Sud France',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['1733'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18094' => [
            'name' => 'Lambert Corse',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['1327'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18101' => [
            'name' => 'France Conic Conformal zone 1',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['3545'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18102' => [
            'name' => 'France Conic Conformal zone 2',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['3546'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18103' => [
            'name' => 'France Conic Conformal zone 3',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['3547'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18104' => [
            'name' => 'France Conic Conformal zone 4',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['3548'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18105' => [
            'name' => 'France Conic Conformal zone 5',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['3549'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18106' => [
            'name' => 'France Conic Conformal zone 6',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['3550'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18107' => [
            'name' => 'France Conic Conformal zone 7',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['3551'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18108' => [
            'name' => 'France Conic Conformal zone 8',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['3552'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18109' => [
            'name' => 'France Conic Conformal zone 9',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['3553'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18110' => [
            'name' => 'India zone 0',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['1668'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18111' => [
            'name' => 'India zone I',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['1669'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18112' => [
            'name' => 'India zone IIa',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['1670'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18113' => [
            'name' => 'India zone IIb',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['1671'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18114' => [
            'name' => 'India zone IIIa',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['1672'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18116' => [
            'name' => 'India zone IVa',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['1673'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18121' => [
            'name' => 'Italy zone 1',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1718'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18122' => [
            'name' => 'Italy zone 2',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1719'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18131' => [
            'name' => 'Nord Maroc',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['1703'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18132' => [
            'name' => 'Sud Maroc',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['2787'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18134' => [
            'name' => 'Sahara Nord',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['2788'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18135' => [
            'name' => 'Sahara Sud',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['2789'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18141' => [
            'name' => 'New Zealand North Island National Grid',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1500'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18142' => [
            'name' => 'New Zealand South Island National Grid',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3344'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18151' => [
            'name' => 'Nigeria West Belt',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1715'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18152' => [
            'name' => 'Nigeria Mid Belt',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1714'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18153' => [
            'name' => 'Nigeria East Belt',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1713'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18161' => [
            'name' => 'Peru west zone',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1753'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18162' => [
            'name' => 'Peru central zone',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1752'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18163' => [
            'name' => 'Peru east zone',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1751'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18171' => [
            'name' => 'Philippines zone I',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1698'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18172' => [
            'name' => 'Philippines zone II',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1699'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18173' => [
            'name' => 'Philippines zone III',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1700'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18174' => [
            'name' => 'Philippines zone IV',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1701'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18175' => [
            'name' => 'Philippines zone V',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1702'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18180' => [
            'name' => 'Finland zone 0',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3092'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18181' => [
            'name' => 'Nord Tunisie',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['1619'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18182' => [
            'name' => 'Sud Tunisie',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['1620'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18183' => [
            'name' => 'Finland ETRS-GK19',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3092'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18184' => [
            'name' => 'Finland ETRS-GK20',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3093'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18185' => [
            'name' => 'Finland ETRS-GK21',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3094'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18186' => [
            'name' => 'Finland ETRS-GK22',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3095'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18187' => [
            'name' => 'Finland ETRS-GK23',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3096'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18188' => [
            'name' => 'Finland ETRS-GK24',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3097'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18189' => [
            'name' => 'Finland ETRS-GK25',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3098'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18190' => [
            'name' => 'Finland ETRS-GK26',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3099'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18191' => [
            'name' => 'Finland zone 1',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1536'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18192' => [
            'name' => 'Finland zone 2',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1537'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18193' => [
            'name' => 'Finland Uniform Coordinate System',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1538', '3333'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18194' => [
            'name' => 'Finland zone 4',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1539'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18195' => [
            'name' => 'Finland ETRS-GK27',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3100'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18196' => [
            'name' => 'Finland ETRS-GK28',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3101'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18197' => [
            'name' => 'Finland ETRS-GK29',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3102'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18198' => [
            'name' => 'Finland ETRS-GK30',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3103'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18199' => [
            'name' => 'Finland ETRS-GK31',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3104'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18201' => [
            'name' => 'Palestine Grid',
            'method' => 'urn:ogc:def:method:EPSG::9806',
            'extent' => ['1356'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18202' => [
            'name' => 'Palestine Belt',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1356'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18203' => [
            'name' => 'Israeli CS',
            'method' => 'urn:ogc:def:method:EPSG::9806',
            'extent' => ['2603'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18204' => [
            'name' => 'Israeli TM',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2603'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18205' => [
            'name' => 'Finland zone 5',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3385'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18211' => [
            'name' => 'Guatemala Norte',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['2120'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18212' => [
            'name' => 'Guatemala Sur',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['2121'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18221' => [
            'name' => 'NGO zone I',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1741'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18222' => [
            'name' => 'NGO zone II',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1742'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18223' => [
            'name' => 'NGO zone III',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1743'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18224' => [
            'name' => 'NGO zone IV',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1744'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18225' => [
            'name' => 'NGO zone V',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1745'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18226' => [
            'name' => 'NGO zone VI',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1746'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18227' => [
            'name' => 'NGO zone VII',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1747'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18228' => [
            'name' => 'NGO zone VIII',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1748'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18231' => [
            'name' => 'India zone I (1975 metres)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['1676'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18232' => [
            'name' => 'India zone IIa (1975 metres)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['1677'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18233' => [
            'name' => 'India zone IIIa (1975 metres)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['1672'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18234' => [
            'name' => 'India zone IVa (1975 metres)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['1673'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18235' => [
            'name' => 'India zone IIb (1975 metres)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['1678'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18236' => [
            'name' => 'India zone I (1962 metres)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['1685'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18237' => [
            'name' => 'India zone IIa (1962 metres)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['1686'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18238' => [
            'name' => 'India zone IIb (1937 metres)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['3217'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18240' => [
            'name' => 'Libya zone 5',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1470'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18241' => [
            'name' => 'Libya zone 6',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1471'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18242' => [
            'name' => 'Libya zone 7',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1472'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18243' => [
            'name' => 'Libya zone 8',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1473'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18244' => [
            'name' => 'Libya zone 9',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1474'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18245' => [
            'name' => 'Libya zone 10',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1475'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18246' => [
            'name' => 'Libya zone 11',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1476'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18247' => [
            'name' => 'Libya zone 12',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1477'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18248' => [
            'name' => 'Libya zone 13',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1478'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18251' => [
            'name' => 'Korea East Belt',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3726'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18252' => [
            'name' => 'Korea Central Belt',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3716'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18253' => [
            'name' => 'Korea West Belt',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3713'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18260' => [
            'name' => 'Maracaibo Grid (M1)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['1319'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18261' => [
            'name' => 'Maracaibo Grid',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['1319'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18262' => [
            'name' => 'Maracaibo Grid (M3)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['1319'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18263' => [
            'name' => 'Maracaibo La Rosa Grid',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['1319'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18275' => [
            'name' => 'Balkans zone 5',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1709'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18276' => [
            'name' => 'Balkans zone 6',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1710'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18277' => [
            'name' => 'Balkans zone 7',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1148', '1711'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18278' => [
            'name' => 'Balkans zone 8',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1712'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18280' => [
            'name' => 'Poland zone I',
            'method' => 'urn:ogc:def:method:EPSG::9809',
            'extent' => ['1515'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18282' => [
            'name' => 'Poland zone II',
            'method' => 'urn:ogc:def:method:EPSG::9809',
            'extent' => ['1516'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18283' => [
            'name' => 'Poland zone III',
            'method' => 'urn:ogc:def:method:EPSG::9809',
            'extent' => ['1517'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18284' => [
            'name' => 'Poland zone IV',
            'method' => 'urn:ogc:def:method:EPSG::9809',
            'extent' => ['1518'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18285' => [
            'name' => 'Poland zone V',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1519'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18286' => [
            'name' => 'GUGiK-80',
            'method' => 'urn:ogc:def:method:EPSG::9809',
            'extent' => ['1192'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18300' => [
            'name' => 'Poland CS92',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1192'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18305' => [
            'name' => 'Poland CS2000 zone 5',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1520'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18306' => [
            'name' => 'Poland CS2000 zone 6',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1521'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18307' => [
            'name' => 'Poland CS2000 zone 7',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1522'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18308' => [
            'name' => 'Poland CS2000 zone 8',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1523'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18310' => [
            'name' => 'Libya TM zone 5',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1470'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18311' => [
            'name' => 'Libya TM zone 6',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1471'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18312' => [
            'name' => 'Libya TM zone 7',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1472'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18313' => [
            'name' => 'Libya TM zone 8',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1473'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18314' => [
            'name' => 'Libya TM zone 9',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1474'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18315' => [
            'name' => 'Libya TM zone 10',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1475'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18316' => [
            'name' => 'Libya TM zone 11',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1476'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18317' => [
            'name' => 'Libya TM zone 12',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1477'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18318' => [
            'name' => 'Libya TM zone 13',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1478'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18319' => [
            'name' => 'Libya TM',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1143'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18401' => [
            'name' => 'Kp2000 Jylland og Fyn',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2531'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18402' => [
            'name' => 'Kp2000 Sjaelland',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2532'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18403' => [
            'name' => 'Kp2000 Bornholm',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2533'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18415' => [
            'name' => 'French Equatorial Africa west zone',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2552'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18425' => [
            'name' => 'Greenland zone 5 east',
            'method' => 'urn:ogc:def:method:EPSG::9826',
            'extent' => ['2560'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18426' => [
            'name' => 'Greenland zone 6 east',
            'method' => 'urn:ogc:def:method:EPSG::9826',
            'extent' => ['2561'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18427' => [
            'name' => 'Greenland zone 7 east',
            'method' => 'urn:ogc:def:method:EPSG::9826',
            'extent' => ['2562'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18428' => [
            'name' => 'Greenland zone 8 east',
            'method' => 'urn:ogc:def:method:EPSG::9826',
            'extent' => ['2569'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18432' => [
            'name' => 'Greenland zone 2 west',
            'method' => 'urn:ogc:def:method:EPSG::9826',
            'extent' => ['2563'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18433' => [
            'name' => 'Greenland zone 3 west',
            'method' => 'urn:ogc:def:method:EPSG::9826',
            'extent' => ['2564'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18434' => [
            'name' => 'Greenland zone 4 west',
            'method' => 'urn:ogc:def:method:EPSG::9826',
            'extent' => ['2565'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18435' => [
            'name' => 'Greenland zone 5 west',
            'method' => 'urn:ogc:def:method:EPSG::9826',
            'extent' => ['2566'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18436' => [
            'name' => 'Greenland zone 6 west',
            'method' => 'urn:ogc:def:method:EPSG::9826',
            'extent' => ['2567'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18437' => [
            'name' => 'Greenland zone 7 west',
            'method' => 'urn:ogc:def:method:EPSG::9826',
            'extent' => ['2568'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18441' => [
            'name' => 'CS63 zone A1',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2772'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18442' => [
            'name' => 'CS63 zone A2',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2773'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18443' => [
            'name' => 'CS63 zone A3',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2774'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18444' => [
            'name' => 'CS63 zone A4',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2775'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18446' => [
            'name' => 'CS63 zone K2',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2776'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18447' => [
            'name' => 'CS63 zone K3',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2777'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18448' => [
            'name' => 'CS63 zone K4',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2778'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18450' => [
            'name' => 'CS63 zone C0',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3173'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18451' => [
            'name' => 'CS63 zone C1',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3174'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18452' => [
            'name' => 'CS63 zone C2',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3175'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19838' => [
            'name' => 'Rectified Skew Orthomorphic Sarawak LSD (metres)',
            'method' => 'urn:ogc:def:method:EPSG::9812',
            'extent' => ['4611'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19839' => [
            'name' => 'Dubai Local Transverse Mercator',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3531'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19840' => [
            'name' => 'IBCAO Polar Stereographic',
            'method' => 'urn:ogc:def:method:EPSG::9829',
            'extent' => ['1996'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19841' => [
            'name' => 'Swiss Oblique Mercator 1903C (Greenwich)',
            'method' => 'urn:ogc:def:method:EPSG::9815',
            'extent' => ['1144'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19842' => [
            'name' => 'Arctic Polar Stereographic',
            'method' => 'urn:ogc:def:method:EPSG::9829',
            'extent' => ['1996'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19843' => [
            'name' => 'Mercator 41',
            'method' => 'urn:ogc:def:method:EPSG::9805',
            'extent' => ['3508'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19844' => [
            'name' => 'Ministry of Transport of Quebec Lambert',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['1368'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19845' => [
            'name' => 'Slovene National Grid',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1212'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19848' => [
            'name' => 'Pitcairn TM 2006',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3208'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19849' => [
            'name' => 'Bermuda 2000 National Grid',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1047'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19851' => [
            'name' => 'Croatia Transverse Mercator',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1076'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19852' => [
            'name' => 'Croatia Lambert Conformal Conic',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['1076'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19853' => [
            'name' => 'Portugual TM06',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1294'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19854' => [
            'name' => 'South Georgia Lambert',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['3529'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19856' => [
            'name' => 'TM Reunion',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3337'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19857' => [
            'name' => 'Northwest Territories Lambert',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['3481'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19858' => [
            'name' => 'Yukon Albers',
            'method' => 'urn:ogc:def:method:EPSG::9822',
            'extent' => ['2417'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19859' => [
            'name' => 'Fiji Map Grid',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1094'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19860' => [
            'name' => 'Jamaica Metric Grid 2001',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['3342'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19861' => [
            'name' => 'Laborde Grid',
            'method' => 'urn:ogc:def:method:EPSG::9813',
            'extent' => ['1149'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19862' => [
            'name' => 'Belgian Lambert 2005',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['1347'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19863' => [
            'name' => 'South China Sea Lambert',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['3470'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19864' => [
            'name' => 'Singapore Transverse Mercator',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1210'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19865' => [
            'name' => 'US NSIDC Sea Ice polar stereographic north',
            'method' => 'urn:ogc:def:method:EPSG::9829',
            'extent' => ['1996'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19866' => [
            'name' => 'US NSIDC Sea Ice polar stereographic south',
            'method' => 'urn:ogc:def:method:EPSG::9829',
            'extent' => ['1997'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19870' => [
            'name' => 'Faroe Lambert',
            'method' => 'urn:ogc:def:method:EPSG::9826',
            'extent' => ['3248'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19871' => [
            'name' => 'Rectified Skew Orthomorphic Malaya Grid (chains)',
            'method' => 'urn:ogc:def:method:EPSG::9812',
            'extent' => ['1690'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19872' => [
            'name' => 'Rectified Skew Orthomorphic Malaya Grid (metres)',
            'method' => 'urn:ogc:def:method:EPSG::9812',
            'extent' => ['1690'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19873' => [
            'name' => 'Noumea Lambert',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2823'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19874' => [
            'name' => 'Noumea Lambert 2',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2823'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19875' => [
            'name' => 'Ontario MNR Lambert',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['1367'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19876' => [
            'name' => 'ST74',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3408'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19877' => [
            'name' => 'Faroe Lambert fk89',
            'method' => 'urn:ogc:def:method:EPSG::9826',
            'extent' => ['3248'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19878' => [
            'name' => 'Vanua Levu Grid',
            'method' => 'urn:ogc:def:method:EPSG::9833',
            'extent' => ['3401'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19879' => [
            'name' => 'Viti Levu Grid',
            'method' => 'urn:ogc:def:method:EPSG::9806',
            'extent' => ['3195'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19881' => [
            'name' => 'Alberta 10-degree TM (Forest)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2376'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19882' => [
            'name' => 'Alberta 10-degree TM (Resource)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2376'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19883' => [
            'name' => 'World Mercator',
            'method' => 'urn:ogc:def:method:EPSG::9804',
            'extent' => ['3391'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19884' => [
            'name' => 'Caspian Sea Mercator',
            'method' => 'urn:ogc:def:method:EPSG::9805',
            'extent' => ['1291'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19885' => [
            'name' => 'Kelantan Grid',
            'method' => 'urn:ogc:def:method:EPSG::9806',
            'extent' => ['3384'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19886' => [
            'name' => 'Perak Grid',
            'method' => 'urn:ogc:def:method:EPSG::9806',
            'extent' => ['3383'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19887' => [
            'name' => 'Kedah and Perlis Grid',
            'method' => 'urn:ogc:def:method:EPSG::9806',
            'extent' => ['3382'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19888' => [
            'name' => 'Pinang Grid',
            'method' => 'urn:ogc:def:method:EPSG::9806',
            'extent' => ['3381'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19889' => [
            'name' => 'Terengganu Grid',
            'method' => 'urn:ogc:def:method:EPSG::9806',
            'extent' => ['3380'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19890' => [
            'name' => 'Selangor Grid',
            'method' => 'urn:ogc:def:method:EPSG::9806',
            'extent' => ['3379'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19891' => [
            'name' => 'Pahang Grid',
            'method' => 'urn:ogc:def:method:EPSG::9806',
            'extent' => ['3378'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19892' => [
            'name' => 'Sembilan and Melaka Grid',
            'method' => 'urn:ogc:def:method:EPSG::9806',
            'extent' => ['3377'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19893' => [
            'name' => 'Johor Grid',
            'method' => 'urn:ogc:def:method:EPSG::9806',
            'extent' => ['3376'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19894' => [
            'name' => 'Borneo RSO',
            'method' => 'urn:ogc:def:method:EPSG::9812',
            'extent' => ['1362'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19895' => [
            'name' => 'Peninsular RSO',
            'method' => 'urn:ogc:def:method:EPSG::9812',
            'extent' => ['3955'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19896' => [
            'name' => 'Hong Kong 1963 Grid',
            'method' => 'urn:ogc:def:method:EPSG::9806',
            'extent' => ['1118'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19897' => [
            'name' => 'Statistics Canada Lambert',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['1061'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19899' => [
            'name' => 'Mauritius Grid',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['3209'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19900' => [
            'name' => 'Bahrain State Grid',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1040'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19901' => [
            'name' => 'Belge Lambert 50',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['1347'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19902' => [
            'name' => 'Belge Lambert 72',
            'method' => 'urn:ogc:def:method:EPSG::9803',
            'extent' => ['1347'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19903' => [
            'name' => 'Nord de Guerre',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['1369'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19904' => [
            'name' => 'Ghana Metre Grid',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1104'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19905' => [
            'name' => 'Netherlands East Indies Equatorial Zone',
            'method' => 'urn:ogc:def:method:EPSG::9804',
            'extent' => ['4020'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19906' => [
            'name' => 'Iraq zone',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['2294'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19907' => [
            'name' => 'Iraq National Grid',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3625'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19909' => [
            'name' => 'Jamaica (Old Grid)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['3342'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19910' => [
            'name' => 'Jamaica National Grid',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['3342'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19911' => [
            'name' => 'Laborde Grid approximation',
            'method' => 'urn:ogc:def:method:EPSG::9815',
            'extent' => ['1149'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19913' => [
            'name' => 'RD Old',
            'method' => 'urn:ogc:def:method:EPSG::9809',
            'extent' => ['1275'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19914' => [
            'name' => 'RD New',
            'method' => 'urn:ogc:def:method:EPSG::9809',
            'extent' => ['1275'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19916' => [
            'name' => 'British National Grid',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['4390'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19917' => [
            'name' => 'New Zealand Map Grid',
            'method' => 'urn:ogc:def:method:EPSG::9811',
            'extent' => ['3973'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19919' => [
            'name' => 'Qatar National Grid',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1195'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19920' => [
            'name' => 'Singapore Grid',
            'method' => 'urn:ogc:def:method:EPSG::9806',
            'extent' => ['1210'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19921' => [
            'name' => 'Spain',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['2366'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19922' => [
            'name' => 'Swiss Oblique Mercator 1903M',
            'method' => 'urn:ogc:def:method:EPSG::9815',
            'extent' => ['1286'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19923' => [
            'name' => 'Swiss Oblique Mercator 1903C',
            'method' => 'urn:ogc:def:method:EPSG::9815',
            'extent' => ['1286'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19924' => [
            'name' => 'Tobago Grid',
            'method' => 'urn:ogc:def:method:EPSG::9806',
            'extent' => ['1322'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19925' => [
            'name' => 'Trinidad Grid',
            'method' => 'urn:ogc:def:method:EPSG::9806',
            'extent' => ['1339'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19926' => [
            'name' => 'Stereo 70',
            'method' => 'urn:ogc:def:method:EPSG::9809',
            'extent' => ['1197'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19927' => [
            'name' => 'Stereo 33',
            'method' => 'urn:ogc:def:method:EPSG::9809',
            'extent' => ['1197'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19929' => [
            'name' => 'Sweden zone 2.5 gon V',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2847', '3313'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19930' => [
            'name' => 'Greek Grid',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3254'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19931' => [
            'name' => 'Egyseges Orszagos Vetuleti',
            'method' => 'urn:ogc:def:method:EPSG::9815',
            'extent' => ['1119'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19933' => [
            'name' => 'Prince Edward Island Stereographic (ATS77)',
            'method' => 'urn:ogc:def:method:EPSG::9809',
            'extent' => ['1533'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19934' => [
            'name' => 'Lithuania 1994',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1145'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19936' => [
            'name' => 'Portuguese National Grid',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1294'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19937' => [
            'name' => 'Tunisia Mining Grid',
            'method' => 'urn:ogc:def:method:EPSG::9816',
            'extent' => ['1618'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19938' => [
            'name' => 'Estonian National Grid',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['1090'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19939' => [
            'name' => 'TM Baltic 93',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1646'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19940' => [
            'name' => 'Levant Zone',
            'method' => 'urn:ogc:def:method:EPSG::9817',
            'extent' => ['1623'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19941' => [
            'name' => 'Brazil Polyconic',
            'method' => 'urn:ogc:def:method:EPSG::9818',
            'extent' => ['1053'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19942' => [
            'name' => 'British West Indies Grid',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2295'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19943' => [
            'name' => 'Barbados National Grid',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3218'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19944' => [
            'name' => 'Quebec Lambert Projection',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['1368'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19945' => [
            'name' => 'New Brunswick Stereographic (ATS77)',
            'method' => 'urn:ogc:def:method:EPSG::9809',
            'extent' => ['1447'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19946' => [
            'name' => 'New Brunswick Stereographic (NAD83)',
            'method' => 'urn:ogc:def:method:EPSG::9809',
            'extent' => ['1447'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19947' => [
            'name' => 'Austria Lambert',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['1037'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19948' => [
            'name' => 'Syria Lambert',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent' => ['1623'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19949' => [
            'name' => 'Levant Stereographic',
            'method' => 'urn:ogc:def:method:EPSG::9809',
            'extent' => ['1623'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19950' => [
            'name' => 'Swiss Oblique Mercator 1995',
            'method' => 'urn:ogc:def:method:EPSG::9815',
            'extent' => ['1286'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19951' => [
            'name' => 'Nakhl e Taqi Oblique Mercator',
            'method' => 'urn:ogc:def:method:EPSG::9815',
            'extent' => ['1338'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19952' => [
            'name' => 'Krovak',
            'method' => 'urn:ogc:def:method:EPSG::9819',
            'extent' => ['1306'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19953' => [
            'name' => 'Qatar Grid',
            'method' => 'urn:ogc:def:method:EPSG::9806',
            'extent' => ['1346'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19954' => [
            'name' => 'Suriname Old TM',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1222'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19955' => [
            'name' => 'Suriname TM',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1222'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19956' => [
            'name' => 'Rectified Skew Orthomorphic Borneo Grid (chains)',
            'method' => 'urn:ogc:def:method:EPSG::9815',
            'extent' => ['1362'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19957' => [
            'name' => 'Rectified Skew Orthomorphic Borneo Grid (feet)',
            'method' => 'urn:ogc:def:method:EPSG::9815',
            'extent' => ['3977'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19958' => [
            'name' => 'Rectified Skew Orthomorphic Borneo Grid (metres)',
            'method' => 'urn:ogc:def:method:EPSG::9815',
            'extent' => ['1362'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19959' => [
            'name' => 'Ghana National Grid',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1104'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19960' => [
            'name' => 'Prince Edward Isl. Stereographic (NAD83)',
            'method' => 'urn:ogc:def:method:EPSG::9809',
            'extent' => ['1533'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19961' => [
            'name' => 'Belgian Lambert 72',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['1347'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19962' => [
            'name' => 'Irish Transverse Mercator',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1305'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19963' => [
            'name' => 'Sierra Leone New Colony Grid',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1342'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19964' => [
            'name' => 'New War Office Sierra Leone Grid',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1342'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19966' => [
            'name' => 'Luxembourg TM',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1146'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19967' => [
            'name' => 'Slovenia Grid',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1212'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19969' => [
            'name' => 'Portuguese Grid',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1294'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19971' => [
            'name' => 'New Zealand Transverse Mercator 2000',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['3973'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19972' => [
            'name' => 'Irish Grid',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1305'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19973' => [
            'name' => 'Irish National Grid',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2530'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19974' => [
            'name' => 'Modified Portuguese Grid',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1294'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19975' => [
            'name' => 'Trinidad Grid (Clarke\'s feet)',
            'method' => 'urn:ogc:def:method:EPSG::9806',
            'extent' => ['1339'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19976' => [
            'name' => 'ICN Regional',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['1251'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19977' => [
            'name' => 'Aramco Lambert',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['3303'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19978' => [
            'name' => 'Hong Kong 1980 Grid',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1118'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19979' => [
            'name' => 'Portugal Bonne',
            'method' => 'urn:ogc:def:method:EPSG::9828',
            'extent' => ['1294'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19981' => [
            'name' => 'Lambert New Caledonia',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['3430'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19983' => [
            'name' => 'Terre Adelie Polar Stereographic',
            'method' => 'urn:ogc:def:method:EPSG::9830',
            'extent' => ['2818'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19984' => [
            'name' => 'British Columbia Albers',
            'method' => 'urn:ogc:def:method:EPSG::9822',
            'extent' => ['2832'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19985' => [
            'name' => 'Europe Conformal 2001',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2881'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19986' => [
            'name' => 'Europe Equal Area 2001',
            'method' => 'urn:ogc:def:method:EPSG::9820',
            'extent' => ['2881'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19987' => [
            'name' => 'Iceland Lambert 1900',
            'method' => 'urn:ogc:def:method:EPSG::9826',
            'extent' => ['3262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19988' => [
            'name' => 'Iceland Lambert 1955',
            'method' => 'urn:ogc:def:method:EPSG::9826',
            'extent' => ['3262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19989' => [
            'name' => 'Iceland Lambert 1993',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['1120'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19990' => [
            'name' => 'Latvian Transverse Mercator',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1139'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19991' => [
            'name' => 'Jan Mayen Grid',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2869'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19992' => [
            'name' => 'Antarctic Polar Stereographic',
            'method' => 'urn:ogc:def:method:EPSG::9829',
            'extent' => ['1031'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19993' => [
            'name' => 'Australian Antarctic Polar Stereographic',
            'method' => 'urn:ogc:def:method:EPSG::9829',
            'extent' => ['1278'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19994' => [
            'name' => 'Australian Antarctic Lambert',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent' => ['2880'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19995' => [
            'name' => 'Jordan Transverse Mercator',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1130'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19996' => [
            'name' => 'Soldner Berlin',
            'method' => 'urn:ogc:def:method:EPSG::9806',
            'extent' => ['2898'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19997' => [
            'name' => 'Kuwait Transverse Mercator',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['1310'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19998' => [
            'name' => 'Guernsey Grid',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2989'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19999' => [
            'name' => 'Jersey Transverse Mercator',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent' => ['2988'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::32768' => [
            'name' => 'ETRS89 to ETRF2014 (geocen)',
            'method' => 'urn:ogc:def:method:EPSG::32768',
            'extent' => ['1298'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::32769' => [
            'name' => 'ETRS89 to ETRF2014 (geog2D to geocen)',
            'method' => 'urn:ogc:def:method:EPSG::9602',
            'extent' => ['1298'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::32770' => [
            'name' => 'ETRS89 to ETRF2014 (geog3D to geocen)',
            'method' => 'urn:ogc:def:method:EPSG::9602',
            'extent' => ['1298'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::32771' => [
            'name' => 'WGS 84 to WGS 84 (G2139) (geocen)',
            'method' => 'urn:ogc:def:method:EPSG::32768',
            'extent' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::32772' => [
            'name' => 'WGS 84 to WGS 84 (G2139) (geog2D to geocen)',
            'method' => 'urn:ogc:def:method:EPSG::9602',
            'extent' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::32773' => [
            'name' => 'WGS 84 to WGS 84 (G2139) (geog3D to geocen)',
            'method' => 'urn:ogc:def:method:EPSG::9602',
            'extent' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::32774' => [
            'name' => 'ETRS89 to WGS 84 (geocen)',
            'method' => 'urn:ogc:def:method:EPSG::32768',
            'extent' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::32775' => [
            'name' => 'ETRS89 to WGS 84 (geog3D)',
            'method' => 'urn:ogc:def:method:EPSG::32768',
            'extent' => ['1262'],
        ],
    ];

    protected static array $customSridParamData = [];

    protected static array $customTransformationData = [];

    /**
     * @internal
     */
    public static function getOperationData(string $operationSrid): array
    {
        if (!isset(self::$sridData[$operationSrid])) {
            throw new UnknownCoordinateOperationException($operationSrid);
        }

        return self::$sridData[$operationSrid];
    }

    /**
     * @internal
     */
    public static function getParamData(string $operationSrid): array
    {
        if (isset(self::$customSridParamData[$operationSrid])) {
            return self::$customSridParamData[$operationSrid];
        }

        return require 'Params/' . str_replace(':', '', str_replace('urn:ogc:def:coordinateOperation:', '', $operationSrid)) . '.php';
    }

    public static function registerCustomOperation(string $srid, string $name, string $methodSrid, BoundingArea $extent, array $params): void
    {
        self::$sridData[$srid] = ['name' => $name, 'method' => $methodSrid, 'extent' => $extent, 'params' => $params];
        self::$customSridParamData[$srid] = $params;
    }

    public static function registerCustomTransformation(string $operationSrid, string $name, string $sourceCRSSrid, string $targetCRSSrid, float $accuracy): void
    {
        self::$customTransformationData[] = ['operation' => $operationSrid, 'name' => $name, 'source_crs' => $sourceCRSSrid, 'target_crs' => $targetCRSSrid, 'accuracy' => $accuracy];
    }

    /**
     * @internal
     */
    public static function getCustomTransformations(): array
    {
        return static::$customTransformationData;
    }
}
