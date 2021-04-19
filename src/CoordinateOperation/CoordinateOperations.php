<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\CoordinateOperation;

/**
 * @internal
 */
class CoordinateOperations
{
    protected static $sridData = [
        'urn:ogc:def:coordinateOperation:EPSG::1024' => [
            'name' => 'MGI to ETRS89 (4)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['1543'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1026' => [
            'name' => 'Madrid 1870 (Madrid) to ED50 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9617',
            'extent_code' => ['2366'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1027' => [
            'name' => 'Madrid 1870 (Madrid) to ED50 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9617',
            'extent_code' => ['2367'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1028' => [
            'name' => 'Madrid 1870 (Madrid) to ED50 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9617',
            'extent_code' => ['2368'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1041' => [
            'name' => 'TM75 to ETRS89 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9648',
            'extent_code' => ['1305'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1042' => [
            'name' => 'TM75 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9648',
            'extent_code' => ['1305'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1044' => [
            'name' => 'Amersfoort / RD New to ED50 / UTM zone 31N (1)',
            'method' => 'urn:ogc:def:method:EPSG::9653',
            'extent_code' => ['1275'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1046' => [
            'name' => 'Amersfoort / RD New to ED50 / UTM zone 31N (2)',
            'method' => 'urn:ogc:def:method:EPSG::9653',
            'extent_code' => ['1275'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1048' => [
            'name' => 'Belge 72 / Lambert to ED50 / UTM zone 31N (1)',
            'method' => 'urn:ogc:def:method:EPSG::9652',
            'extent_code' => ['1347'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1050' => [
            'name' => 'Amersfoort / RD New to ED50 / TM 5 NE (1)',
            'method' => 'urn:ogc:def:method:EPSG::9653',
            'extent_code' => ['1275'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1052' => [
            'name' => 'ED50 to WGS 84 (35)',
            'method' => 'urn:ogc:def:method:EPSG::9654',
            'extent_code' => ['2879'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1055' => [
            'name' => 'Ain el Abd to WGS 84 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3267'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1056' => [
            'name' => 'Ain el Abd to WGS 84 (4)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['3267'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1057' => [
            'name' => 'Ain el Abd to WGS 84 (5)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['2956'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1058' => [
            'name' => 'Ain el Abd to WGS 84 (6)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['2957'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1059' => [
            'name' => 'KOC to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3267'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1060' => [
            'name' => 'NGN to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3267'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1061' => [
            'name' => 'Kudams to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1310'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1062' => [
            'name' => 'Kudams to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['1310'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1063' => [
            'name' => 'Vientiane 1982 to Lao 1997 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1138'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1064' => [
            'name' => 'Lao 1993 to Lao 1997 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1138'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1065' => [
            'name' => 'Lao 1997 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1138'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1066' => [
            'name' => 'Amersfoort to ETRS89 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9636',
            'extent_code' => ['1275'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1067' => [
            'name' => 'Minna to WGS 84 (11)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3817'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1070' => [
            'name' => 'Guam 1963 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3255'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1071' => [
            'name' => 'Palestine 1923 to Israel 1993 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2603'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1072' => [
            'name' => 'Palestine 1923 / Israeli CS to Israel 1993 / Israeli TM (1)',
            'method' => 'urn:ogc:def:method:EPSG::9656',
            'extent_code' => ['2603'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1073' => [
            'name' => 'Israel 1993 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2603'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1074' => [
            'name' => 'Palestine 1923 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['2603'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1075' => [
            'name' => 'ED50 to WGS 84 (38)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2896'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1078' => [
            'name' => 'Luxembourg 1930 to ETRS89 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9636',
            'extent_code' => ['1146'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1079' => [
            'name' => 'Luxembourg 1930 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9636',
            'extent_code' => ['1146'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1080' => [
            'name' => 'CI1971 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2889'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1081' => [
            'name' => 'CI1979 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['2889'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1082' => [
            'name' => 'CI1979 to NZGD2000 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['2889'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1083' => [
            'name' => 'JAD69 to WGS 72 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3342'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1084' => [
            'name' => 'JAD69 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3342'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1085' => [
            'name' => 'JAD69 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3342'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1087' => [
            'name' => 'ED50 to WGS 84 (37)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1130'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1088' => [
            'name' => 'Monte Mario to WGS 84 (5)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2882'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1089' => [
            'name' => 'Monte Mario to WGS 84 (6)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2883'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1090' => [
            'name' => 'Monte Mario to WGS 84 (7)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2884'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1091' => [
            'name' => 'Monte Mario to WGS 84 (8)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2885'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1092' => [
            'name' => 'Monte Mario to WGS 84 (9)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2886'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1093' => [
            'name' => 'Monte Mario to WGS 84 (10)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2887'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1094' => [
            'name' => 'Monte Mario to WGS 84 (11)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2888'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1095' => [
            'name' => 'PSAD56 to WGS 84 (13)',
            'method' => 'urn:ogc:def:method:EPSG::9636',
            'extent_code' => ['3327'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1096' => [
            'name' => 'La Canoa to WGS 84 (13)',
            'method' => 'urn:ogc:def:method:EPSG::9636',
            'extent_code' => ['3327'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1098' => [
            'name' => 'IGM95 to ETRS89 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3343'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1099' => [
            'name' => 'IGM95 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3343'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1100' => [
            'name' => 'Adindan to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1271'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1101' => [
            'name' => 'Adindan to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1057'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1102' => [
            'name' => 'Adindan to WGS 84 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3226'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1103' => [
            'name' => 'Adindan to WGS 84 (4)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1091'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1104' => [
            'name' => 'Adindan to WGS 84 (5)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1153'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1105' => [
            'name' => 'Adindan to WGS 84 (6)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3304'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1106' => [
            'name' => 'Adindan to WGS 84 (7)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3311'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1107' => [
            'name' => 'Afgooye to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3308'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1108' => [
            'name' => 'AGD66 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2575'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1109' => [
            'name' => 'AGD84 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2576'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1110' => [
            'name' => 'Ain el Abd to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3943'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1111' => [
            'name' => 'Ain el Abd to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3303'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1112' => [
            'name' => 'Amersfoort to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['1275'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1113' => [
            'name' => 'Arc 1950 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2312'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1114' => [
            'name' => 'Arc 1950 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1051'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1116' => [
            'name' => 'Arc 1950 to WGS 84 (4)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1141'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1117' => [
            'name' => 'Arc 1950 to WGS 84 (5)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1150'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1118' => [
            'name' => 'Arc 1950 to WGS 84 (6)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1224'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1120' => [
            'name' => 'Arc 1950 to WGS 84 (8)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1260'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1121' => [
            'name' => 'Arc 1950 to WGS 84 (9)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1261'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1122' => [
            'name' => 'Arc 1960 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2311'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1124' => [
            'name' => 'Bermuda 1957 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3221'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1125' => [
            'name' => 'Bogota 1975 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3686'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1126' => [
            'name' => 'Bukit Rimpah to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1287'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1127' => [
            'name' => 'Campo Inchauspe to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3843'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1128' => [
            'name' => 'Cape to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3309'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1129' => [
            'name' => 'Cape to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3309'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1130' => [
            'name' => 'Carthage to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1236'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1131' => [
            'name' => 'Chua to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3675'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1132' => [
            'name' => 'Corrego Alegre 1970-72 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1293'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1133' => [
            'name' => 'ED50 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2420'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1134' => [
            'name' => 'ED50 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2421'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1135' => [
            'name' => 'ED50 to WGS 84 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2345'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1136' => [
            'name' => 'ED50 to WGS 84 (4)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1078'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1137' => [
            'name' => 'ED50 to WGS 84 (5)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2595'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1138' => [
            'name' => 'ED50 to WGS 84 (6)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2343'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1139' => [
            'name' => 'ED50 to WGS 84 (7)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2344'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1140' => [
            'name' => 'ED50 to WGS 84 (8)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3254'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1141' => [
            'name' => 'ED50(ED77) to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1123'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1142' => [
            'name' => 'ED50 to WGS 84 (10)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2339'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1143' => [
            'name' => 'ED50 to WGS 84 (11)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2340'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1144' => [
            'name' => 'ED50 to WGS 84 (12)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3275'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1145' => [
            'name' => 'ED50 to WGS 84 (13)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2338'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1146' => [
            'name' => 'ED87 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['2330'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1147' => [
            'name' => 'ED50 to ED87 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['2332'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1148' => [
            'name' => 'Egypt 1907 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1086'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1149' => [
            'name' => 'ETRS89 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1298'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1150' => [
            'name' => 'GDA94 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['4177'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1151' => [
            'name' => 'NZGD49 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3285'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1152' => [
            'name' => 'Hu Tzu Shan 1950 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3315'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1153' => [
            'name' => 'Indian 1954 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3317'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1154' => [
            'name' => 'Indian 1975 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3741'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1155' => [
            'name' => 'Kalianpur 1937 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3217'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1156' => [
            'name' => 'Kalianpur 1975 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2411'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1157' => [
            'name' => 'Kandawala to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3310'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1158' => [
            'name' => 'Kertau 1968 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['4223'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1159' => [
            'name' => 'Leigon to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1104'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1160' => [
            'name' => 'Liberia 1964 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3270'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1161' => [
            'name' => 'Luzon 1911 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2364'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1162' => [
            'name' => 'Luzon 1911 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2365'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1163' => [
            'name' => 'M\'poraloko to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1100'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1164' => [
            'name' => 'Mahe 1971 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2369'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1165' => [
            'name' => 'Massawa to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1089'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1166' => [
            'name' => 'Merchich to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3280'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1167' => [
            'name' => 'Minna to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3226'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1168' => [
            'name' => 'Minna to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1178'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1169' => [
            'name' => 'Monte Mario to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2339'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1170' => [
            'name' => 'NAD27 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2418'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1171' => [
            'name' => 'NAD27 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2419'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1172' => [
            'name' => 'NAD27 to WGS 84 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['4517'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1173' => [
            'name' => 'NAD27 to WGS 84 (4)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1323'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1174' => [
            'name' => 'NAD27 to WGS 84 (5)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2389'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1175' => [
            'name' => 'NAD27 to WGS 84 (6)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2390'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1176' => [
            'name' => 'NAD27 to WGS 84 (7)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2412'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1177' => [
            'name' => 'NAD27 to WGS 84 (8)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2413'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1178' => [
            'name' => 'NAD27 to WGS 84 (9)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2414'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1179' => [
            'name' => 'NAD27 to WGS 84 (10)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2384'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1180' => [
            'name' => 'NAD27 to WGS 84 (11)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2415'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1181' => [
            'name' => 'NAD27 to WGS 84 (12)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2416'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1182' => [
            'name' => 'NAD27 to WGS 84 (13)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2410'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1183' => [
            'name' => 'NAD27 to WGS 84 (14)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2417'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1184' => [
            'name' => 'NAD27 to WGS 84 (15)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2385'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1185' => [
            'name' => 'NAD27 to WGS 84 (16)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3235'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1186' => [
            'name' => 'NAD27 to WGS 84 (17)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2386'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1187' => [
            'name' => 'NAD27 to WGS 84 (18)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3278'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1188' => [
            'name' => 'NAD83 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1325'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1189' => [
            'name' => 'Nahrwan 1967 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2391'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1190' => [
            'name' => 'Nahrwan 1967 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3968'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1191' => [
            'name' => 'Nahrwan 1967 to WGS 84 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1243'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1192' => [
            'name' => 'Naparima 1972 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1322'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1193' => [
            'name' => 'NTF to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3694'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1194' => [
            'name' => 'MGI to WGS 84 (8)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['1543'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1195' => [
            'name' => 'OSGB36 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1264'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1196' => [
            'name' => 'OSGB36 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2395'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1197' => [
            'name' => 'OSGB36 to WGS 84 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2396'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1198' => [
            'name' => 'OSGB36 to WGS 84 (4)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2397'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1199' => [
            'name' => 'OSGB36 to WGS 84 (5)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2398'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1200' => [
            'name' => 'Pointe Noire to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1072'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1201' => [
            'name' => 'PSAD56 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2399'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1202' => [
            'name' => 'PSAD56 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1049'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1203' => [
            'name' => 'PSAD56 to WGS 84 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2402'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1204' => [
            'name' => 'PSAD56 to WGS 84 (4)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2403'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1205' => [
            'name' => 'PSAD56 to WGS 84 (5)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3229'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1206' => [
            'name' => 'PSAD56 to WGS 84 (6)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3241'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1207' => [
            'name' => 'PSAD56 to WGS 84 (7)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1114'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1208' => [
            'name' => 'PSAD56 to WGS 84 (8)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3292'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1209' => [
            'name' => 'PSAD56 to WGS 84 (9)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3327'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1210' => [
            'name' => 'POSGAR 94 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1033'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1225' => [
            'name' => 'Sapper Hill 1943 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2355'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1226' => [
            'name' => 'Schwarzeck to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1169'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1227' => [
            'name' => 'Tananarive to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1149'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1228' => [
            'name' => 'Timbalai 1948 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1362'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1230' => [
            'name' => 'Tokyo to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2409'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1231' => [
            'name' => 'Tokyo to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3995'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1232' => [
            'name' => 'Tokyo to WGS 84 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3266'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1233' => [
            'name' => 'Tokyo to WGS 84 (4)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2408'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1234' => [
            'name' => 'Yacare to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3326'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1235' => [
            'name' => 'Zanderij to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1222'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1236' => [
            'name' => 'AGD84 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['2576'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1237' => [
            'name' => 'WGS 72 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1238' => [
            'name' => 'WGS 72 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1239' => [
            'name' => 'WGS 72BE to WGS 72 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1240' => [
            'name' => 'WGS 72BE to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['2346'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1242' => [
            'name' => 'HD72 to WGS 84 (4)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1119'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1244' => [
            'name' => 'PZ-90 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['1198'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1245' => [
            'name' => 'ED50 to WGS 84 (16)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1236'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1246' => [
            'name' => 'Herat North to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1024'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1247' => [
            'name' => 'Kalianpur 1962 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3289'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1248' => [
            'name' => 'ID74 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['4020'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1249' => [
            'name' => 'NAD27 to WGS 84 (21)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2387'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1250' => [
            'name' => 'NAD27 to WGS 84 (22)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2388'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1251' => [
            'name' => 'NAD83 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2157'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1252' => [
            'name' => 'NAD83 to WGS 84 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3883'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1253' => [
            'name' => 'Nord Sahara 1959 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3213'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1254' => [
            'name' => 'Pulkovo 1942 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3296'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1255' => [
            'name' => 'Nord Sahara 1959 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1365'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1256' => [
            'name' => 'Fahud to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['4009'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1257' => [
            'name' => 'Pulkovo 1995 to PZ-90 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1198'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1260' => [
            'name' => 'Makassar (Jakarta) to Makassar (1)',
            'method' => 'urn:ogc:def:method:EPSG::9601',
            'extent_code' => ['1316'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1262' => [
            'name' => 'Monte Mario (Rome) to Monte Mario (1)',
            'method' => 'urn:ogc:def:method:EPSG::9601',
            'extent_code' => ['3343'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1264' => [
            'name' => 'Belge 1950 (Brussels) to Belge 1950 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9601',
            'extent_code' => ['1347'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1265' => [
            'name' => 'Tananarive (Paris) to Tananarive (1)',
            'method' => 'urn:ogc:def:method:EPSG::9601',
            'extent_code' => ['3273'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1266' => [
            'name' => 'Voirol 1875 (Paris) to Voirol 1875 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9601',
            'extent_code' => ['1365'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1267' => [
            'name' => 'Pulkovo 1942 to WGS 84 (17)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['3296'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1271' => [
            'name' => 'Schwarzeck to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1169'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1272' => [
            'name' => 'GGRS87 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3254'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1274' => [
            'name' => 'Pulkovo 1942 to LKS94 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['3272'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1275' => [
            'name' => 'ED50 to WGS 84 (17)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1096'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1276' => [
            'name' => 'NTF to ED50 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3694'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1277' => [
            'name' => 'NTF to WGS 72 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3694'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1278' => [
            'name' => 'AGD66 to GDA94 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2575'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1279' => [
            'name' => 'AGD84 to GDA94 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2576'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1280' => [
            'name' => 'AGD84 to GDA94 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['2576'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1281' => [
            'name' => 'Pulkovo 1995 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['1198'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1283' => [
            'name' => 'LKS94 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1145'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1284' => [
            'name' => 'Arc 1960 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3264'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1285' => [
            'name' => 'Arc 1960 to WGS 84 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3316'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1290' => [
            'name' => 'Pulkovo 1942 to WGS 84 (6)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3268'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1291' => [
            'name' => 'Pulkovo 1942 to WGS 84 (7)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1131'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1294' => [
            'name' => 'Voirol 1875 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1365'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1296' => [
            'name' => 'Trinidad 1903 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1339'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1297' => [
            'name' => 'Tete to Moznet (1)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['3281'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1298' => [
            'name' => 'Tete to Moznet (2)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['2350'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1299' => [
            'name' => 'Tete to Moznet (3)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['2351'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1300' => [
            'name' => 'Tete to Moznet (4)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['2352'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1301' => [
            'name' => 'Tete to Moznet (5)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['2353'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1302' => [
            'name' => 'Moznet to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['1167'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1303' => [
            'name' => 'Pulkovo 1942 to WGS 84 (10)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['2405'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1304' => [
            'name' => 'Indian 1975 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3741'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1305' => [
            'name' => 'Tokyo to WGS 84 (5)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3266'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1307' => [
            'name' => 'Naparima 1972 to WGS 84 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1322'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1309' => [
            'name' => 'DHDN to ETRS89 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['2326'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1311' => [
            'name' => 'ED50 to WGS 84 (18)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['2342'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1314' => [
            'name' => 'OSGB36 to WGS 84 (6)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['1264'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1315' => [
            'name' => 'OSGB36 to ED50 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['1264'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1317' => [
            'name' => 'Camacupa 1948 to WGS 72BE (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1604'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1318' => [
            'name' => 'Camacupa 1948 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2316'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1319' => [
            'name' => 'Camacupa 1948 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2317'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1320' => [
            'name' => 'Camacupa 1948 to WGS 84 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['2321'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1321' => [
            'name' => 'Camacupa 1948 to WGS 84 (4)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2320'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1322' => [
            'name' => 'Camacupa 1948 to WGS 84 (5)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2318'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1323' => [
            'name' => 'Camacupa 1948 to WGS 84 (6)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2319'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1324' => [
            'name' => 'Camacupa 1948 to WGS 84 (7)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2322'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1325' => [
            'name' => 'Camacupa 1948 to WGS 84 (8)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2317'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1326' => [
            'name' => 'Camacupa 1948 to WGS 84 (9)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['2323'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1327' => [
            'name' => 'Camacupa 1948 to WGS 84 (10)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2324'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1330' => [
            'name' => 'Malongo 1987 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3180'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1331' => [
            'name' => 'EST92 to ETRS89 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['3246'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1332' => [
            'name' => 'Pulkovo 1942 to EST92 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['3246'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1333' => [
            'name' => 'EST92 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['3246'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1334' => [
            'name' => 'Pulkovo 1942 to WGS 84 (12)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['3246'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1437' => [
            'name' => 'RT90 to ETRS89 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['1225'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1438' => [
            'name' => 'Fahud to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['4009'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1439' => [
            'name' => 'PSD93 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['3288'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1440' => [
            'name' => 'ED50 to WGS 84 (19)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3254'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1441' => [
            'name' => 'Antigua 1943 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1273'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1442' => [
            'name' => 'Dominica 1945 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3239'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1443' => [
            'name' => 'Grenada 1953 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3118'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1444' => [
            'name' => 'Montserrat 1958 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3279'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1445' => [
            'name' => 'St. Kitts 1955 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3297'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1446' => [
            'name' => 'St. Lucia 1955 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3298'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1447' => [
            'name' => 'Anguilla 1957 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9619',
            'extent_code' => ['3214'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1448' => [
            'name' => 'HD72 to WGS 84 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['1119'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1449' => [
            'name' => 'HD72 to ETRS89 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['1119'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1458' => [
            'name' => 'AGD66 to GDA94 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['2283'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1459' => [
            'name' => 'AGD66 to GDA94 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['1282'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1460' => [
            'name' => 'AGD66 to GDA94 (4)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['2286'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1469' => [
            'name' => 'Locodjo 1965 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2282'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1470' => [
            'name' => 'Abidjan 1987 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1075'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1504' => [
            'name' => 'Cape to Hartebeesthoek94 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3309'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1505' => [
            'name' => 'Hartebeesthoek94 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['4540'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1509' => [
            'name' => 'CH1903+ to CHTRF95 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1286'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1511' => [
            'name' => 'CHTRF95 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1286'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1512' => [
            'name' => 'Rassadiran to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1338'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1513' => [
            'name' => 'FD58 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2362'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1514' => [
            'name' => 'ED50(ED77) to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['1123'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1516' => [
            'name' => 'La Canoa to WGS 84 (18)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2363'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1517' => [
            'name' => 'Conakry 1905 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3257'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1518' => [
            'name' => 'Dabola 1981 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3257'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1527' => [
            'name' => 'Campo Inchauspe to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2325'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1528' => [
            'name' => 'Chos Malal 1914 to Campo Inchauspe (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2325'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1529' => [
            'name' => 'Hito XVIII to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['2357'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1530' => [
            'name' => 'NAD27 to WGS 84 (30)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1077'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1531' => [
            'name' => 'Nahrwan 1967 to WGS 84 (4)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2392'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1532' => [
            'name' => 'M\'poraloko to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1100'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1533' => [
            'name' => 'Kalianpur 1937 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2361'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1536' => [
            'name' => 'Nahrwan 1967 to WGS 84 (5)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2406'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1537' => [
            'name' => 'Indian 1975 to WGS 84 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2358'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1538' => [
            'name' => 'Carthage to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1489'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1539' => [
            'name' => 'South Yemen to Yemen NGN96 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1340'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1540' => [
            'name' => 'Yemen NGN96 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1257'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1541' => [
            'name' => 'Indian 1960 to WGS 72BE (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1495'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1542' => [
            'name' => 'Indian 1960 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2359'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1543' => [
            'name' => 'Indian 1960 to WGS 84 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2360'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1544' => [
            'name' => 'Hanoi 1972 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1494'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1545' => [
            'name' => 'Egypt 1907 to WGS 72 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1086'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1547' => [
            'name' => 'Bissau to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3258'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1550' => [
            'name' => 'Aratu to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2308'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1551' => [
            'name' => 'Aratu to WGS 84 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2309'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1552' => [
            'name' => 'Aratu to WGS 84 (4)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2310'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1555' => [
            'name' => 'Naparima 1955 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3143'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1556' => [
            'name' => 'Naparima 1955 to WGS 84 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3143'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1557' => [
            'name' => 'Malongo 1987 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3180'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1558' => [
            'name' => 'Korean 1995 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3266'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1560' => [
            'name' => 'Nord Sahara 1959 to WGS 72BE (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2393'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1561' => [
            'name' => 'Qatar 1974 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1346'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1562' => [
            'name' => 'Qatar 1974 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2406'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1563' => [
            'name' => 'Qatar 1974 to WGS 84 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1346'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1564' => [
            'name' => 'NZGD49 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['3285'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1565' => [
            'name' => 'NZGD2000 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1175'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1566' => [
            'name' => 'NZGD49 to NZGD2000 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3285'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1569' => [
            'name' => 'Accra to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1104'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1570' => [
            'name' => 'Accra to WGS 72BE (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1505'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1577' => [
            'name' => 'American Samoa 1962 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3109'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1580' => [
            'name' => 'NAD83(HARN) to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1337'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1581' => [
            'name' => 'SIRGAS to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3448'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1582' => [
            'name' => 'PSAD56 to WGS 84 (10)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2400'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1583' => [
            'name' => 'PSAD56 to WGS 84 (11)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2401'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1584' => [
            'name' => 'Deir ez Zor to WGS 72BE (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2329'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1586' => [
            'name' => 'Deir ez Zor to WGS 84 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['2327'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1587' => [
            'name' => 'Deir ez Zor to WGS 84 (4)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2328'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1588' => [
            'name' => 'ED50 to ETRS89 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['2332'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1591' => [
            'name' => 'RGF93 to ETRS89 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1096'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1592' => [
            'name' => 'Timbalai 1948 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1055'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1594' => [
            'name' => 'AGD66 to GDA94 (8)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['1282'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1595' => [
            'name' => 'AGD66 to GDA94 (9)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['2284'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1597' => [
            'name' => 'Bogota 1975 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2315'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1609' => [
            'name' => 'BD72 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['1347'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1610' => [
            'name' => 'BD72 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1347'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1611' => [
            'name' => 'IRENET95 to ETRS89 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1305'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1612' => [
            'name' => 'ED50 to WGS 84 (23)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['2601'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1613' => [
            'name' => 'ED50 to WGS 84 (24)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['2334'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1614' => [
            'name' => 'Sierra Leone 1968 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3306'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1615' => [
            'name' => 'Timbalai 1948 to WGS 84 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2349'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1616' => [
            'name' => 'PSD93 to WGS 72 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['3288'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1617' => [
            'name' => 'PSD93 to WGS 84 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['2404'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1618' => [
            'name' => 'MGI to WGS 84 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['1037'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1619' => [
            'name' => 'MGI to ETRS89 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['1037'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1622' => [
            'name' => 'S-JTSK to ETRS89 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['1079'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1623' => [
            'name' => 'S-JTSK to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['1079'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1626' => [
            'name' => 'ED50 to ETRS89 (4)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['3237'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1627' => [
            'name' => 'ED50 to WGS 84 (25)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['3237'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1628' => [
            'name' => 'ED50 to ETRS89 (5)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1105'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1629' => [
            'name' => 'ED50 to WGS 84 (26)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1105'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1630' => [
            'name' => 'ED50 to ETRS89 (6)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['2335'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1631' => [
            'name' => 'ED50 to WGS 84 (27)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['2335'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1632' => [
            'name' => 'ED50 to ETRS89 (7)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['2336'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1633' => [
            'name' => 'ED50 to WGS 84 (28)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['2336'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1634' => [
            'name' => 'ED50 to ETRS89 (8)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['2337'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1635' => [
            'name' => 'ED50 to WGS 84 (29)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['2337'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1638' => [
            'name' => 'KKJ to ETRS89 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['3333'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1639' => [
            'name' => 'KKJ to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['3333'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1641' => [
            'name' => 'TM65 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['1305'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1642' => [
            'name' => 'Luxembourg 1930 to ETRS89 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['1146'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1643' => [
            'name' => 'Luxembourg 1930 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['1146'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1644' => [
            'name' => 'Pulkovo 1942(58) to ETRS89 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['3293'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1645' => [
            'name' => 'Pulkovo 1942(58) to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['3293'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1646' => [
            'name' => 'CH1903 to ETRS89 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1286'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1647' => [
            'name' => 'CH1903+ to ETRS89 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1286'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1648' => [
            'name' => 'EST97 to ETRS89 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1090'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1649' => [
            'name' => 'EST97 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1090'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1650' => [
            'name' => 'ED50 to ETRS89 (10)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1096'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1651' => [
            'name' => 'NTF to ETRS89 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3694'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1652' => [
            'name' => 'BD72 to ETRS89 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['1347'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1653' => [
            'name' => 'NGO 1948 to ETRS89 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['1352'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1654' => [
            'name' => 'NGO 1948 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['1352'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1655' => [
            'name' => 'Lisbon to ETRS89 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['1294'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1656' => [
            'name' => 'Lisbon to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['1294'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1657' => [
            'name' => 'Datum 73 to ETRS89 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['1294'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1658' => [
            'name' => 'Datum 73 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['1294'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1659' => [
            'name' => 'Monte Mario to ETRS89 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['2372'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1660' => [
            'name' => 'Monte Mario to WGS 84 (4)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['2372'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1661' => [
            'name' => 'Monte Mario to ETRS89 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['2339'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1662' => [
            'name' => 'Monte Mario to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['2339'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1663' => [
            'name' => 'Monte Mario to ETRS89 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['2340'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1664' => [
            'name' => 'Monte Mario to WGS 84 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['2340'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1665' => [
            'name' => 'AGD66 to WGS 84 (12)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['2283'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1666' => [
            'name' => 'AGD66 to WGS 84 (13)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['2286'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1667' => [
            'name' => 'AGD66 to WGS 84 (14)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['1282'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1668' => [
            'name' => 'AGD66 to WGS 84 (15)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['2284'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1669' => [
            'name' => 'AGD84 to WGS 84 (7)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['2576'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1671' => [
            'name' => 'RGF93 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1096'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1672' => [
            'name' => 'Amersfoort to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['1275'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1674' => [
            'name' => 'Pulkovo 1942(83) to ETRS89 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['1343'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1675' => [
            'name' => 'Pulkovo 1942(83) to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['1343'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1676' => [
            'name' => 'CH1903+ to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1286'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1678' => [
            'name' => 'IRENET95 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1305'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1679' => [
            'name' => 'Pulkovo 1942 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['3272'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1680' => [
            'name' => 'RT90 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['1225'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1682' => [
            'name' => 'South Yemen to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1340'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1683' => [
            'name' => 'Tete to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['3281'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1684' => [
            'name' => 'Tete to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['2350'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1685' => [
            'name' => 'Tete to WGS 84 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['2351'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1686' => [
            'name' => 'Tete to WGS 84 (4)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['2352'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1687' => [
            'name' => 'Tete to WGS 84 (5)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['2353'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1701' => [
            'name' => 'NZGD49 to NZGD2000 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['3285'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1751' => [
            'name' => 'Amersfoort to ETRS89 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['1275'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1753' => [
            'name' => 'CH1903 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['1286'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1754' => [
            'name' => 'Minna to WGS 84 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['2371'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1755' => [
            'name' => 'Bogota 1975 (Bogota) to Bogota 1975 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9601',
            'extent_code' => ['3229'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1756' => [
            'name' => 'Lisbon (Lisbon) to Lisbon (1)',
            'method' => 'urn:ogc:def:method:EPSG::9601',
            'extent_code' => ['1294'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1759' => [
            'name' => 'Batavia (Jakarta) to Batavia (1)',
            'method' => 'urn:ogc:def:method:EPSG::9601',
            'extent_code' => ['1285'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1760' => [
            'name' => 'RT38 (Stockholm) to RT38 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9601',
            'extent_code' => ['3313'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1761' => [
            'name' => 'Greek (Athens) to Greek (1)',
            'method' => 'urn:ogc:def:method:EPSG::9601',
            'extent_code' => ['3254'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1762' => [
            'name' => 'NGO 1948 (Oslo) to NGO1948 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9601',
            'extent_code' => ['1352'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1763' => [
            'name' => 'NTF (Paris) to NTF (1)',
            'method' => 'urn:ogc:def:method:EPSG::9601',
            'extent_code' => ['3694'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1764' => [
            'name' => 'NTF (Paris) to NTF (2)',
            'method' => 'urn:ogc:def:method:EPSG::9601',
            'extent_code' => ['3694'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1765' => [
            'name' => 'Bern 1898 (Bern) to CH1903 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9601',
            'extent_code' => ['1286'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1766' => [
            'name' => 'CH1903 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1286'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1767' => [
            'name' => 'REGVEN to SIRGAS 1995 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1251'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1768' => [
            'name' => 'REGVEN to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1251'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1769' => [
            'name' => 'PSAD56 to REGVEN (1)',
            'method' => 'urn:ogc:def:method:EPSG::9636',
            'extent_code' => ['3327'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1771' => [
            'name' => 'La Canoa to REGVEN (1)',
            'method' => 'urn:ogc:def:method:EPSG::9636',
            'extent_code' => ['3327'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1773' => [
            'name' => 'POSGAR 98 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1033'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1774' => [
            'name' => 'POSGAR 98 to SIRGAS 1995 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1033'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1775' => [
            'name' => 'Pulkovo 1942(83) to ETRS89 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['1343'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1776' => [
            'name' => 'DHDN to ETRS89 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['2326'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1777' => [
            'name' => 'DHDN to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['2326'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1778' => [
            'name' => 'DHDN to ETRS89 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['2543'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1779' => [
            'name' => 'DHDN to ETRS89 (4)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['2542'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1780' => [
            'name' => 'DHDN to ETRS89 (5)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['2541'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1783' => [
            'name' => 'ED50 to ETRS89 (9)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['1237'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1784' => [
            'name' => 'ED50 to WGS 84 (30)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['1237'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1796' => [
            'name' => 'Manoca 1962 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2555'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1797' => [
            'name' => 'Qornoq 1927 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3362'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1798' => [
            'name' => 'Qornoq 1927 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['3362'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1799' => [
            'name' => 'Scoresbysund 1952 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['2570'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1800' => [
            'name' => 'Ammassalik 1958 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['2571'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1801' => [
            'name' => 'Pointe Noire to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2574'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1802' => [
            'name' => 'Pointe Noire to WGS 84 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['2574'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1805' => [
            'name' => 'Garoua to WGS 72BE (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2590'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1806' => [
            'name' => 'Kousseri to WGS 72BE (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2591'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1807' => [
            'name' => 'Pulkovo 1942 to WGS 84 (13)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['1038'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1808' => [
            'name' => 'Pulkovo 1942 to WGS 84 (14)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['2593'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1809' => [
            'name' => 'Pulkovo 1942 to WGS 84 (15)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['2594'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1810' => [
            'name' => 'ED50 to WGS 84 (31)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['2595'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1811' => [
            'name' => 'PSAD56 to WGS 84 (12)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1754'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1812' => [
            'name' => 'Indian 1975 to WGS 84 (4)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['3317'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1813' => [
            'name' => 'Batavia to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2577'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1814' => [
            'name' => 'Batavia to WGS 84 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2588'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1815' => [
            'name' => 'Nord Sahara 1959 to WGS 84 (4)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['2598'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1816' => [
            'name' => 'Nord Sahara 1959 to WGS 84 (5)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2599'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1817' => [
            'name' => 'Nord Sahara 1959 to WGS 84 (6)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2600'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1818' => [
            'name' => 'Minna to WGS 84 (4)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['1717'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1820' => [
            'name' => 'Minna to WGS 84 (6)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3813'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1821' => [
            'name' => 'Minna to WGS 84 (7)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3814'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1822' => [
            'name' => 'Minna to WGS 84 (8)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3815'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1823' => [
            'name' => 'Minna to WGS 84 (9)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3816'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1824' => [
            'name' => 'Minna to WGS 84 (10)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3824'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1825' => [
            'name' => 'Hong Kong 1980 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['1118'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1826' => [
            'name' => 'JGD2000 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1129'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1828' => [
            'name' => 'Yoff to WGS 72 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1207'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1829' => [
            'name' => 'HD72 to ETRS89 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['1119'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1830' => [
            'name' => 'HD72 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['1119'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1831' => [
            'name' => 'HD72 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1119'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1832' => [
            'name' => 'ID74 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['4020'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1833' => [
            'name' => 'ID74 to WGS 84 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['4020'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1837' => [
            'name' => 'Makassar to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1316'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1838' => [
            'name' => 'Segara to WGS 84 (4)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1328'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1839' => [
            'name' => 'Beduaram to WGS 72BE (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2771'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1840' => [
            'name' => 'QND95 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['1346'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1842' => [
            'name' => 'NAD83(CSRS) to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1061'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1852' => [
            'name' => 'Timbalai 1948 to WGS 84 (4)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['2780'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1853' => [
            'name' => 'ED50 to WGS 84 (39)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2961'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1854' => [
            'name' => 'FD58 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2782'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1855' => [
            'name' => 'FD58 to WGS 84 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2781'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1856' => [
            'name' => 'ED50(ED77) to WGS 84 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2783'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1857' => [
            'name' => 'ED50(ED77) to WGS 84 (4)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2782'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1858' => [
            'name' => 'ED50(ED77) to WGS 84 (5)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2781'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1859' => [
            'name' => 'ELD79 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2785'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1860' => [
            'name' => 'ELD79 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2785'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1861' => [
            'name' => 'ELD79 to WGS 84 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2786'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1862' => [
            'name' => 'ELD79 to WGS 84 (4)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['2786'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1863' => [
            'name' => 'ELD79 to WGS 84 (5)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['2786'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1864' => [
            'name' => 'SAD69 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['4016'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1865' => [
            'name' => 'SAD69 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3215'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1866' => [
            'name' => 'SAD69 to WGS 84 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1049'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1867' => [
            'name' => 'SAD69 to WGS 84 (4)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3887'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1868' => [
            'name' => 'SAD69 to WGS 84 (5)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3227'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1869' => [
            'name' => 'SAD69 to WGS 84 (6)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3229'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1870' => [
            'name' => 'SAD69 to WGS 84 (7)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3241'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1871' => [
            'name' => 'SAD69 to WGS 84 (8)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2356'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1872' => [
            'name' => 'SAD69 to WGS 84 (9)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3259'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1873' => [
            'name' => 'SAD69 to WGS 84 (10)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1188'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1874' => [
            'name' => 'SAD69 to WGS 84 (11)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3292'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1875' => [
            'name' => 'SAD69 to WGS 84 (12)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3143'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1876' => [
            'name' => 'SAD69 to WGS 84 (13)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3327'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1877' => [
            'name' => 'SAD69 to WGS 84 (14)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1053'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1878' => [
            'name' => 'SWEREF99 to ETRS89 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1225'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1879' => [
            'name' => 'SWEREF99 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1225'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1880' => [
            'name' => 'Point 58 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2791'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1881' => [
            'name' => 'Carthage (Paris) to Carthage (1)',
            'method' => 'urn:ogc:def:method:EPSG::9601',
            'extent_code' => ['1618'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1883' => [
            'name' => 'Segara (Jakarta) to Segara (1)',
            'method' => 'urn:ogc:def:method:EPSG::9601',
            'extent_code' => ['1360'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1884' => [
            'name' => 'S-JTSK (Ferro) to S-JTSK (1)',
            'method' => 'urn:ogc:def:method:EPSG::9601',
            'extent_code' => ['1306'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1885' => [
            'name' => 'Azores Oriental 1940 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1345'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1886' => [
            'name' => 'Azores Central 1948 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1301'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1887' => [
            'name' => 'Azores Occidental 1939 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1344'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1888' => [
            'name' => 'Porto Santo to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1314'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1890' => [
            'name' => 'Australian Antarctic to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1278'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1891' => [
            'name' => 'Greek to GGRS87 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9619',
            'extent_code' => ['3254'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1892' => [
            'name' => 'Hito XVIII 1963 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2805'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1893' => [
            'name' => 'Puerto Rico to WGS 84 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1335'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1895' => [
            'name' => 'RT90 to SWEREF99 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['1225'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1896' => [
            'name' => 'RT90 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['1225'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1897' => [
            'name' => 'Segara to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1360'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1898' => [
            'name' => 'Segara to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1359'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1899' => [
            'name' => 'Segara to WGS 84 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2770'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1900' => [
            'name' => 'NAD83(HARN) to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['1323'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1901' => [
            'name' => 'NAD83(HARN) to WGS 84 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['1323'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1902' => [
            'name' => 'Manoca 1962 to WGS 72BE (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2555'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1903' => [
            'name' => 'Fort Marigot to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2828'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1904' => [
            'name' => 'Guadeloupe 1948 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2829'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1905' => [
            'name' => 'Guadeloupe 1948 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['2829'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1906' => [
            'name' => 'CSG67 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3105'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1908' => [
            'name' => 'CSG67 to RGFG95 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['3105'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1909' => [
            'name' => 'Martinique 1938 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3276'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1910' => [
            'name' => 'Martinique 1938 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['3276'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1912' => [
            'name' => 'RGR92 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3902'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1913' => [
            'name' => 'Tahaa 54 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2812'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1914' => [
            'name' => 'IGN72 Nuku Hiva to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3129'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1916' => [
            'name' => 'Combani 1950 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3340'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1917' => [
            'name' => 'IGN56 Lifou to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2814'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1921' => [
            'name' => 'Petrels 1972 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2817'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1922' => [
            'name' => 'Perroud 1950 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2818'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1923' => [
            'name' => 'Saint Pierre et Miquelon 1950 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3299'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1924' => [
            'name' => 'Tahiti 52 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2811'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1926' => [
            'name' => 'Reunion 1947 to RGR92 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['3337'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1927' => [
            'name' => 'IGN56 Lifou to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['2814'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1928' => [
            'name' => 'IGN53 Mare to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['2819'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1931' => [
            'name' => 'ST71 Belep to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['2821'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1946' => [
            'name' => 'NAD83(CSRS) to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['1061'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1950' => [
            'name' => 'NAD83 to NAD83(CSRS) (4)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2831'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1951' => [
            'name' => 'Hjorsey 1955 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1952' => [
            'name' => 'ISN93 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1120'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1953' => [
            'name' => 'TM75 to ETRS89 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['1305'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1954' => [
            'name' => 'TM75 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['1305'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1955' => [
            'name' => 'OSNI 1952 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['2530'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1956' => [
            'name' => 'TM75 to WGS 84 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1305'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1957' => [
            'name' => 'Helle 1954 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['2869'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1958' => [
            'name' => 'LKS92 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1139'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1959' => [
            'name' => 'St. Vincent 1945 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3300'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1962' => [
            'name' => 'IGN72 Grande Terre to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2822'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1963' => [
            'name' => 'IGN72 Grande Terre to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['2822'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1964' => [
            'name' => 'RGR92 to Reunion 1947 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['3337'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1965' => [
            'name' => 'Selvagem Grande to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2779'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1966' => [
            'name' => 'Porto Santo 1995 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2870'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1967' => [
            'name' => 'Porto Santo 1995 to WGS 84 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['2870'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1968' => [
            'name' => 'Azores Oriental 1995 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2871'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1969' => [
            'name' => 'Azores Oriental 1995 to WGS 84 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['2871'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1970' => [
            'name' => 'Azores Oriental 1995 to WGS 84 (4)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1345'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1971' => [
            'name' => 'Azores Oriental 1995 to WGS 84 (5)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['1345'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1972' => [
            'name' => 'Azores Central 1995 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2872'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1973' => [
            'name' => 'Azores Central 1995 to WGS 84 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['2872'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1974' => [
            'name' => 'Azores Central 1995 to WGS 84 (4)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2873'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1975' => [
            'name' => 'Azores Central 1995 to WGS 84 (5)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['2873'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1976' => [
            'name' => 'Azores Central 1995 to WGS 84 (6)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2874'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1977' => [
            'name' => 'Azores Central 1995 to WGS 84 (7)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['2874'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1978' => [
            'name' => 'Azores Central 1995 to WGS 84 (8)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2875'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1979' => [
            'name' => 'Azores Central 1995 to WGS 84 (9)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['2875'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1980' => [
            'name' => 'Azores Central 1995 to WGS 84 (10)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1301'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1981' => [
            'name' => 'Azores Central 1995 to WGS 84 (11)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['1301'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1982' => [
            'name' => 'Azores Occidental 1939 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1344'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1983' => [
            'name' => 'Datum 73 to WGS 84 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1294'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1984' => [
            'name' => 'Lisbon to WGS 84 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1294'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1985' => [
            'name' => 'ED50 to WGS 84 (33)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1294'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1986' => [
            'name' => 'Lisbon 1890 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1294'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1987' => [
            'name' => 'Datum 73 to WGS 84 (4)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['1294'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1988' => [
            'name' => 'Lisbon to WGS 84 (4)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['1294'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1989' => [
            'name' => 'ED50 to WGS 84 (34)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['1294'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1990' => [
            'name' => 'Lisbon 1890 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['1294'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1991' => [
            'name' => 'Lisbon 1890 (Lisbon) to Lisbon 1890 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9601',
            'extent_code' => ['1294'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1992' => [
            'name' => 'Datum 73 to ETRS89 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['1294'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1993' => [
            'name' => 'IKBD-92 to WGS 84 (4)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2876'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1994' => [
            'name' => 'Reykjavik 1900 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1995' => [
            'name' => 'Dealul Piscului 1930 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3295'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1997' => [
            'name' => 'Lisbon to ETRS89 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['1294'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::1998' => [
            'name' => 'ED50 to WGS 84 (36)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['2879'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3811' => [
            'name' => 'Belgian Lambert 2008',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['1347'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3813' => [
            'name' => 'Mississippi Transverse Mercator',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1393'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3817' => [
            'name' => 'HD1909 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['1119'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3818' => [
            'name' => 'Taiwan 2-degree TM zone 119',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3563'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3820' => [
            'name' => 'Taiwan 2-degree TM zone 121',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3562'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3830' => [
            'name' => 'TWD97 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1228'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3831' => [
            'name' => 'Pacific Disaster Center Mercator',
            'method' => 'urn:ogc:def:method:EPSG::9804',
            'extent_code' => ['3172'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3853' => [
            'name' => 'County ST74',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3608'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3856' => [
            'name' => 'Popular Visualisation Pseudo-Mercator',
            'method' => 'urn:ogc:def:method:EPSG::1024',
            'extent_code' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3860' => [
            'name' => 'Finland Gauss-Kruger zone 19',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3595'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3861' => [
            'name' => 'Finland Gauss-Kruger zone 20',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3596'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3862' => [
            'name' => 'Finland Gauss-Kruger zone 21',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3597'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3863' => [
            'name' => 'Finland Gauss-Kruger zone 22',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3598'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3864' => [
            'name' => 'Finland Gauss-Kruger zone 23',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3599'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3865' => [
            'name' => 'Finland Gauss-Kruger zone 24',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3600'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3866' => [
            'name' => 'Finland Gauss-Kruger zone 25',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3601'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3867' => [
            'name' => 'Finland Gauss-Kruger zone 26',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3602'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3868' => [
            'name' => 'Finland Gauss-Kruger zone 27',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3603'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3869' => [
            'name' => 'Finland Gauss-Kruger zone 28',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3604'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3870' => [
            'name' => 'Finland Gauss-Kruger zone 29',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3605'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3871' => [
            'name' => 'Finland Gauss-Kruger zone 30',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3606'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3872' => [
            'name' => 'Finland Gauss-Kruger zone 31',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3607'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3894' => [
            'name' => 'IGRS to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1124'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3895' => [
            'name' => 'MGI (Ferro) to MGI (1)',
            'method' => 'urn:ogc:def:method:EPSG::9601',
            'extent_code' => ['1037'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3896' => [
            'name' => 'MGI (Ferro) to WGS 84 (2)',
            'extent_code' => ['1037'],
            'operations' => [
                [
                    'operation' => 'urn:ogc:def:coordinateOperation:EPSG::3895',
                    'source_crs' => 'urn:ogc:def:crs:EPSG::4805',
                    'target_crs' => 'urn:ogc:def:crs:EPSG::4312',
                ],
                [
                    'operation' => 'urn:ogc:def:coordinateOperation:EPSG::1618',
                    'source_crs' => 'urn:ogc:def:crs:EPSG::4312',
                    'target_crs' => 'urn:ogc:def:crs:EPSG::4326',
                ],
            ],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3899' => [
            'name' => 'US National Atlas Equal Area',
            'method' => 'urn:ogc:def:method:EPSG::1027',
            'extent_code' => ['1245'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3904' => [
            'name' => 'ED50 to WGS 84 (32)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['1630'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3905' => [
            'name' => 'ED87 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['1297'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3913' => [
            'name' => 'MGI (Ferro) to MGI 1901 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9601',
            'extent_code' => ['2370'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3914' => [
            'name' => 'MGI 1901 to ETRS89 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['3307'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3915' => [
            'name' => 'MGI 1901 to WGS 84 (5)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['3307'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3916' => [
            'name' => 'MGI 1901 to Slovenia 1996 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['3307'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3917' => [
            'name' => 'MGI 1901 to WGS 84 (9)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['3307'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3918' => [
            'name' => 'MGI 1901 to Slovenia 1996 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['3564'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3919' => [
            'name' => 'MGI 1901 to Slovenia 1996 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['3565'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3921' => [
            'name' => 'MGI 1901 to Slovenia 1996 (4)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['3566'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3922' => [
            'name' => 'MGI 1901 to Slovenia 1996 (5)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['3567'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3923' => [
            'name' => 'MGI 1901 to Slovenia 1996 (6)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['3568'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3924' => [
            'name' => 'MGI 1901 to Slovenia 1996 (7)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['3569'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3925' => [
            'name' => 'MGI 1901 to Slovenia 1996 (8)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['3570'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3926' => [
            'name' => 'MGI 1901 to Slovenia 1996 (9)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['3571'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3927' => [
            'name' => 'MGI 1901 to Slovenia 1996 (10)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['3572'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3928' => [
            'name' => 'MGI 1901 to Slovenia 1996 (11)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['3573'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3929' => [
            'name' => 'D48/GK to D96/TM (1)',
            'method' => 'urn:ogc:def:method:EPSG::9621',
            'extent_code' => ['2578'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3930' => [
            'name' => 'D48/GK to D96/TM (2)',
            'method' => 'urn:ogc:def:method:EPSG::9621',
            'extent_code' => ['2579'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3931' => [
            'name' => 'D48/GK to D96/TM (3)',
            'method' => 'urn:ogc:def:method:EPSG::9621',
            'extent_code' => ['2582'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3932' => [
            'name' => 'D48/GK to D96/TM (4)',
            'method' => 'urn:ogc:def:method:EPSG::9621',
            'extent_code' => ['2583'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3933' => [
            'name' => 'D48/GK to D96/TM (5)',
            'method' => 'urn:ogc:def:method:EPSG::9621',
            'extent_code' => ['3348'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3934' => [
            'name' => 'D48/GK to D96/TM (6)',
            'method' => 'urn:ogc:def:method:EPSG::9621',
            'extent_code' => ['2422'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3935' => [
            'name' => 'D48/GK to D96/TM (7)',
            'method' => 'urn:ogc:def:method:EPSG::9621',
            'extent_code' => ['3349'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3936' => [
            'name' => 'D48/GK to D96/TM (8)',
            'method' => 'urn:ogc:def:method:EPSG::9621',
            'extent_code' => ['3350'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3937' => [
            'name' => 'D48/GK to D96/TM (9)',
            'method' => 'urn:ogc:def:method:EPSG::9621',
            'extent_code' => ['2580'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3938' => [
            'name' => 'D48/GK to D96/TM (10)',
            'method' => 'urn:ogc:def:method:EPSG::9621',
            'extent_code' => ['3345'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3939' => [
            'name' => 'D48/GK to D96/TM (11)',
            'method' => 'urn:ogc:def:method:EPSG::9621',
            'extent_code' => ['2581'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3940' => [
            'name' => 'D48/GK to D96/TM (12)',
            'method' => 'urn:ogc:def:method:EPSG::9621',
            'extent_code' => ['3351'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3941' => [
            'name' => 'D48/GK to D96/TM (13)',
            'method' => 'urn:ogc:def:method:EPSG::9621',
            'extent_code' => ['3352'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3951' => [
            'name' => 'D48/GK to D96/TM (14)',
            'method' => 'urn:ogc:def:method:EPSG::9621',
            'extent_code' => ['3353'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3952' => [
            'name' => 'D48/GK to D96/TM (15)',
            'method' => 'urn:ogc:def:method:EPSG::9621',
            'extent_code' => ['3354'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3953' => [
            'name' => 'D48/GK to D96/TM (16)',
            'method' => 'urn:ogc:def:method:EPSG::9621',
            'extent_code' => ['3560'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3954' => [
            'name' => 'D48/GK to D96/TM (17)',
            'method' => 'urn:ogc:def:method:EPSG::9621',
            'extent_code' => ['3347'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3955' => [
            'name' => 'D48/GK to D96/TM (18)',
            'method' => 'urn:ogc:def:method:EPSG::9621',
            'extent_code' => ['2584'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3956' => [
            'name' => 'D48/GK to D96/TM (19)',
            'method' => 'urn:ogc:def:method:EPSG::9621',
            'extent_code' => ['2585'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3957' => [
            'name' => 'D48/GK to D96/TM (20)',
            'method' => 'urn:ogc:def:method:EPSG::9621',
            'extent_code' => ['2877'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3958' => [
            'name' => 'D48/GK to D96/TM (21)',
            'method' => 'urn:ogc:def:method:EPSG::9621',
            'extent_code' => ['2586'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3959' => [
            'name' => 'D48/GK to D96/TM (22)',
            'method' => 'urn:ogc:def:method:EPSG::9621',
            'extent_code' => ['2587'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3960' => [
            'name' => 'D48/GK to D96/TM (23)',
            'method' => 'urn:ogc:def:method:EPSG::9621',
            'extent_code' => ['2878'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3961' => [
            'name' => 'D48/GK to D96/TM (24)',
            'method' => 'urn:ogc:def:method:EPSG::9621',
            'extent_code' => ['3346'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3962' => [
            'name' => 'MGI 1901 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2370'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3963' => [
            'name' => 'MGI 1901 to ETRS89 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['3234'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3964' => [
            'name' => 'MGI 1901 to WGS 84 (4)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['3234'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3965' => [
            'name' => 'MGI 1901 to WGS 84 (6)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3536'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3966' => [
            'name' => 'MGI (Ferro) to WGS 84 (1)',
            'extent_code' => ['2370'],
            'operations' => [
                [
                    'operation' => 'urn:ogc:def:coordinateOperation:EPSG::3913',
                    'source_crs' => 'urn:ogc:def:crs:EPSG::4805',
                    'target_crs' => 'urn:ogc:def:crs:EPSG::3906',
                ],
                [
                    'operation' => 'urn:ogc:def:coordinateOperation:EPSG::3962',
                    'source_crs' => 'urn:ogc:def:crs:EPSG::3906',
                    'target_crs' => 'urn:ogc:def:crs:EPSG::4326',
                ],
            ],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3967' => [
            'name' => 'Virginia Lambert Conic Conformal',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['1415'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3971' => [
            'name' => 'PSAD56 to SIRGAS 1995 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['3241'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3972' => [
            'name' => 'Chua to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3619'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3977' => [
            'name' => 'Canada Atlas Lambert',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['1061'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3981' => [
            'name' => 'Katanga Gauss zone A',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3612'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3982' => [
            'name' => 'Katanga Gauss zone B',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3611'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3983' => [
            'name' => 'Katanga Gauss zone C',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3610'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3984' => [
            'name' => 'Katanga Gauss zone D',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3609'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3990' => [
            'name' => 'PSAD56 to WGS 84 (14)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['3241'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3998' => [
            'name' => 'Arc 1960 to WGS 84 (4)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1058'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::3999' => [
            'name' => 'Moldova Transverse Mercator',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1162'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4064' => [
            'name' => 'RGRDC 2005 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3613'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4065' => [
            'name' => 'Katanga 1955 to RGRDC 2005 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3614'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4066' => [
            'name' => 'Katanga 1955 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3614'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4067' => [
            'name' => 'Katanga 1955 to RGRDC 2005 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9636',
            'extent_code' => ['3614'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4068' => [
            'name' => 'Katanga 1955 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9636',
            'extent_code' => ['3614'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4069' => [
            'name' => 'Chua to SIRGAS 2000 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3619'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4072' => [
            'name' => 'Karbala 1979 / UTM zone 38N to IGRS / UTM zone 38N (1)',
            'method' => 'urn:ogc:def:method:EPSG::9656',
            'extent_code' => ['3702'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4076' => [
            'name' => 'SREF98 to ETRS89 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['4543'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4077' => [
            'name' => 'SREF98 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['4543'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4078' => [
            'name' => 'ED87 to ETRS89 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['1297'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4084' => [
            'name' => 'REGCAN95 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3199'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4085' => [
            'name' => 'World Equidistant Cylindrical',
            'method' => 'urn:ogc:def:method:EPSG::1028',
            'extent_code' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4089' => [
            'name' => 'DKTM1',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3631'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4090' => [
            'name' => 'DKTM2',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3632'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4091' => [
            'name' => 'DKTM3',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2532'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4092' => [
            'name' => 'DKTM4',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2533'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4101' => [
            'name' => 'BLM zone 1N (US survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3374'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4102' => [
            'name' => 'BLM zone 2N (US survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3375'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4103' => [
            'name' => 'BLM zone 3N (US survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2133'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4104' => [
            'name' => 'BLM zone 4N (US survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2134'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4105' => [
            'name' => 'BLM zone 5N (US survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2135'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4106' => [
            'name' => 'BLM zone 6N (US survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2136'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4107' => [
            'name' => 'BLM zone 7N (US survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3494'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4108' => [
            'name' => 'BLM zone 8N (US survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3495'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4109' => [
            'name' => 'BLM zone 9N (US survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3496'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4110' => [
            'name' => 'BLM zone 10N (US survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3497'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4111' => [
            'name' => 'BLM zone 11N (US survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3498'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4112' => [
            'name' => 'BLM zone 12N (US survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3499'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4113' => [
            'name' => 'BLM zone 13N (US survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3500'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4114' => [
            'name' => 'Johor Cassini Grid',
            'method' => 'urn:ogc:def:method:EPSG::9806',
            'extent_code' => ['3376'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4115' => [
            'name' => 'Sembilan and Melaka Cassini Grid',
            'method' => 'urn:ogc:def:method:EPSG::9806',
            'extent_code' => ['3377'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4116' => [
            'name' => 'Pahang Cassini Grid',
            'method' => 'urn:ogc:def:method:EPSG::9806',
            'extent_code' => ['3378'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4117' => [
            'name' => 'Selangor Cassini Grid',
            'method' => 'urn:ogc:def:method:EPSG::9806',
            'extent_code' => ['3379'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4118' => [
            'name' => 'BLM zone 18N (US survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3505'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4119' => [
            'name' => 'BLM zone 19N (US survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3506'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4177' => [
            'name' => 'Terengganu Cassini Grid',
            'method' => 'urn:ogc:def:method:EPSG::9806',
            'extent_code' => ['3380'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4186' => [
            'name' => 'BLM zone 59N (US survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3372'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4187' => [
            'name' => 'BLM zone 60N (US survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3373'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4290' => [
            'name' => 'Cadastre 1997 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3340'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4305' => [
            'name' => 'Pinang Cassini Grid',
            'method' => 'urn:ogc:def:method:EPSG::9806',
            'extent_code' => ['3381'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4320' => [
            'name' => 'Kedah and Perlis Cassini Grid',
            'method' => 'urn:ogc:def:method:EPSG::9806',
            'extent_code' => ['3382'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4321' => [
            'name' => 'Perak Revised Cassini Grid',
            'method' => 'urn:ogc:def:method:EPSG::9806',
            'extent_code' => ['3383'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4323' => [
            'name' => 'Kelantan Cassini Grid',
            'method' => 'urn:ogc:def:method:EPSG::9806',
            'extent_code' => ['3384'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4325' => [
            'name' => 'Guam Map Grid',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3255'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4416' => [
            'name' => 'Katanga Lambert',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['3147'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4436' => [
            'name' => 'Pennsylvania CS27 South zone',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2246'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4441' => [
            'name' => 'NZVD2009 height to One Tree Point 1964 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::9616',
            'extent_code' => ['3762'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4442' => [
            'name' => 'NZVD2009 height to Auckland 1946 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::9616',
            'extent_code' => ['3764'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4443' => [
            'name' => 'NZVD2009 height to Moturiki 1953 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::9616',
            'extent_code' => ['3768'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4444' => [
            'name' => 'NZVD2009 height to Nelson 1955 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::9616',
            'extent_code' => ['3802'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4445' => [
            'name' => 'NZVD2009 height to Gisborne 1926 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::9616',
            'extent_code' => ['3771'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4446' => [
            'name' => 'NZVD2009 height to Napier 1962 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::9616',
            'extent_code' => ['3772'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4447' => [
            'name' => 'NZVD2009 height to Taranaki 1970 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::9616',
            'extent_code' => ['3769'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4448' => [
            'name' => 'NZVD2009 height to Wellington 1953 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::9616',
            'extent_code' => ['3773'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4449' => [
            'name' => 'NZVD2009 height to Lyttelton 1937 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::9616',
            'extent_code' => ['3804'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4450' => [
            'name' => 'NZVD2009 height to Dunedin 1958 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::9616',
            'extent_code' => ['3803'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4451' => [
            'name' => 'NZVD2009 height to Bluff 1955 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::9616',
            'extent_code' => ['3801'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4452' => [
            'name' => 'NZVD2009 height to Stewart Island 1977 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::9616',
            'extent_code' => ['3338'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4453' => [
            'name' => 'NZVD2009 height to Dunedin-Bluff 1960 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::9616',
            'extent_code' => ['3806'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4454' => [
            'name' => 'New York CS27 Long Island zone',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2235'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4460' => [
            'name' => 'Australian Centre for Remote Sensing Lambert Conformal Projection',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2575'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4461' => [
            'name' => 'NAD83(HARN) to NAD83(NSRS2007) (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1323'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4476' => [
            'name' => 'RGM04 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1159'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4477' => [
            'name' => 'RGSPM06 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1220'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4478' => [
            'name' => 'Cadastre 1997 to RGM04 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3340'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4560' => [
            'name' => 'RRAF 1991 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2824'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4648' => [
            'name' => 'UTM zone 32N with prefix',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2861'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4651' => [
            'name' => 'ODN height to EVRF2000 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1046',
            'extent_code' => ['2792'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4825' => [
            'name' => 'Cape Verde National',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['1062'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4827' => [
            'name' => 'S-JTSK to ETRS89 (4)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['1211'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4829' => [
            'name' => 'S-JTSK to ETRS89 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9636',
            'extent_code' => ['1211'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4830' => [
            'name' => 'Amersfoort to ETRS89 (5)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['1275'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4831' => [
            'name' => 'Amersfoort to ETRS89 (6)',
            'method' => 'urn:ogc:def:method:EPSG::9636',
            'extent_code' => ['1275'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4832' => [
            'name' => 'Mexico ITRF92 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1160'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4833' => [
            'name' => 'Amersfoort to WGS 84 (4)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['1275'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4834' => [
            'name' => 'Chua to WGS 84 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3619'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4836' => [
            'name' => 'S-JTSK to WGS 84 (4)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['1211'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4837' => [
            'name' => 'Amersfoort to ED50 (1)',
            'extent_code' => ['1275'],
            'operations' => [
                [
                    'operation' => 'urn:ogc:def:coordinateOperation:EPSG::1672',
                    'source_crs' => 'urn:ogc:def:crs:EPSG::4289',
                    'target_crs' => 'urn:ogc:def:crs:EPSG::4326',
                ],
                [
                    'operation' => 'urn:ogc:def:coordinateOperation:EPSG::1311',
                    'source_crs' => 'urn:ogc:def:crs:EPSG::4230',
                    'target_crs' => 'urn:ogc:def:crs:EPSG::4326',
                ],
            ],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4838' => [
            'name' => 'LCC Germany',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['3339'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4840' => [
            'name' => 'RGFG95 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1097'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::4905' => [
            'name' => 'PTRA08 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3670'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5019' => [
            'name' => 'Portugal Bonne New',
            'method' => 'urn:ogc:def:method:EPSG::9828',
            'extent_code' => ['1294'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5020' => [
            'name' => 'Portuguese Grid New',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1294'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5021' => [
            'name' => 'Porto Santo 1995 to PTRA08 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1314'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5022' => [
            'name' => 'Porto Santo 1995 to PTRA08 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['3679'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5023' => [
            'name' => 'Porto Santo 1995 to PTRA08 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3680'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5024' => [
            'name' => 'Azores Oriental 1995 to PTRA08 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1345'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5025' => [
            'name' => 'Azores Oriental 1995 to PTRA08 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2871'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5026' => [
            'name' => 'Azores Oriental 1995 to PTRA08 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3683'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5027' => [
            'name' => 'Azores Central 1995 to PTRA08 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1301'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5028' => [
            'name' => 'Azores Central 1995 to PTRA08 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2873'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5029' => [
            'name' => 'Azores Central 1995 to PTRA08 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3681'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5030' => [
            'name' => 'Azores Central 1995 to PTRA08 (4)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2874'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5031' => [
            'name' => 'Azores Central 1995 to PTRA08 (5)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2875'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5032' => [
            'name' => 'Azores Central 1995 to PTRA08 (6)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2872'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5033' => [
            'name' => 'Azores Occidental 1939 to PTRA08 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1344'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5034' => [
            'name' => 'Azores Occidental 1939 to PTRA08 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3684'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5035' => [
            'name' => 'Azores Occidental 1939 to PTRA08 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3685'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5036' => [
            'name' => 'Datum 73 to ETRS89 (4)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1294'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5037' => [
            'name' => 'Datum 73 to ETRS89 (5)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['1294'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5038' => [
            'name' => 'Lisbon to ETRS89 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1294'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5039' => [
            'name' => 'Lisbon 1890 to ETRS89 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1294'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5040' => [
            'name' => 'ED50 to ETRS89 (13)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1294'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5043' => [
            'name' => 'Pulkovo 1995 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['1198'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5044' => [
            'name' => 'Pulkovo 1942 to WGS 84 (20)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['3296'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5049' => [
            'name' => 'Korea East Sea Belt',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3727'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5050' => [
            'name' => 'Aratu to SIRGAS 2000 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3700'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5051' => [
            'name' => 'Aratu to WGS 84 (13)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3700'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5052' => [
            'name' => 'Aratu to SIRGAS 2000 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2963'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5053' => [
            'name' => 'Aratu to WGS 84 (14)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2963'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5054' => [
            'name' => 'Aratu to SIRGAS 2000 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2964'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5055' => [
            'name' => 'Aratu to WGS 84 (15)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2964'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5056' => [
            'name' => 'Aratu to SIRGAS 2000 (4)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3699'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5057' => [
            'name' => 'Aratu to WGS 84 (16)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3699'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5058' => [
            'name' => 'Aratu to SIRGAS 2000 (5)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3692'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5059' => [
            'name' => 'Aratu to WGS 84 (17)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3692'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5060' => [
            'name' => 'Aratu to SIRGAS 2000 (6)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3693'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5061' => [
            'name' => 'Aratu to WGS 84 (18)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3693'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5062' => [
            'name' => 'Aratu to SIRGAS 2000 (7)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3696'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5063' => [
            'name' => 'Aratu to WGS 84 (19)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3696'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5064' => [
            'name' => 'Aratu to SIRGAS 2000 (8)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3697'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5065' => [
            'name' => 'Aratu to WGS 84 (20)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3697'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5066' => [
            'name' => 'Aratu to SIRGAS 2000 (9)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3698'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5067' => [
            'name' => 'Aratu to WGS 84 (21)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3698'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5068' => [
            'name' => 'Conus Albers',
            'method' => 'urn:ogc:def:method:EPSG::9822',
            'extent_code' => ['1323'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5077' => [
            'name' => 'Karbala 1979 to IGRS (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3625'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5078' => [
            'name' => 'Karbala 1979 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3625'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5100' => [
            'name' => 'Korea Unified Belt',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1135'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5101' => [
            'name' => 'Korea West Belt 2010',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1498'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5102' => [
            'name' => 'Korea Central Belt 2010',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1497'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5103' => [
            'name' => 'Korea East Belt 2010',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1496'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5104' => [
            'name' => 'Korea East Sea Belt 2010',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3720'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5131' => [
            'name' => 'Korea Central Belt Jeju',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3721'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5133' => [
            'name' => 'Tokyo 1892 to Tokyo (1)',
            'method' => 'urn:ogc:def:method:EPSG::9601',
            'extent_code' => ['1364'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5134' => [
            'name' => 'Tokyo 1892 to Korean 1985 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9601',
            'extent_code' => ['3266'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5135' => [
            'name' => 'Norway TM zone 5',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3636'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5136' => [
            'name' => 'Norway TM zone 6',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3639'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5137' => [
            'name' => 'Norway TM zone 7',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3647'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5138' => [
            'name' => 'Norway TM zone 8',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3648'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5139' => [
            'name' => 'Norway TM zone 9',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3649'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5140' => [
            'name' => 'Norway TM zone 10',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3650'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5141' => [
            'name' => 'Norway TM zone 11',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3651'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5142' => [
            'name' => 'Norway TM zone 12',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3653'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5143' => [
            'name' => 'Norway TM zone 13',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3654'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5144' => [
            'name' => 'Norway TM zone 14',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3655'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5145' => [
            'name' => 'Norway TM zone 15',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3656'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5146' => [
            'name' => 'Norway TM zone 16',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3657'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5147' => [
            'name' => 'Norway TM zone 17',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3658'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5148' => [
            'name' => 'Norway TM zone 18',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3660'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5149' => [
            'name' => 'Norway TM zone 19',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3661'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5150' => [
            'name' => 'Norway TM zone 20',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3662'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5151' => [
            'name' => 'Norway TM zone 21',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3663'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5152' => [
            'name' => 'Norway TM zone 22',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3665'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5153' => [
            'name' => 'Norway TM zone 23',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3667'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5154' => [
            'name' => 'Norway TM zone 24',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3668'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5155' => [
            'name' => 'Norway TM zone 25',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3669'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5156' => [
            'name' => 'Norway TM zone 26',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3671'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5157' => [
            'name' => 'Norway TM zone 27',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3672'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5158' => [
            'name' => 'Norway TM zone 28',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3673'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5159' => [
            'name' => 'Norway TM zone 29',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3674'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5160' => [
            'name' => 'Norway TM zone 30',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3676'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5161' => [
            'name' => 'Korea Modified West Belt',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1498'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5162' => [
            'name' => 'Korea Modified Central Belt',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1497'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5163' => [
            'name' => 'Korea Modified Central Belt Jeju',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3721'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5164' => [
            'name' => 'Korea Modified East Belt',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1496'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5165' => [
            'name' => 'Korea Modified East Sea Belt',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3720'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5166' => [
            'name' => 'ED50 / UTM zone 31N to ETRS89 / UTM zone 31N (1)',
            'method' => 'urn:ogc:def:method:EPSG::9621',
            'extent_code' => ['3732'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5189' => [
            'name' => 'Korean 1985 to Korea 2000 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9636',
            'extent_code' => ['3266'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5190' => [
            'name' => 'Tokyo 1892 to Korea 2000 (1)',
            'extent_code' => ['3266'],
            'operations' => [
                [
                    'operation' => 'urn:ogc:def:coordinateOperation:EPSG::5134',
                    'source_crs' => 'urn:ogc:def:crs:EPSG::5132',
                    'target_crs' => 'urn:ogc:def:crs:EPSG::4162',
                ],
                [
                    'operation' => 'urn:ogc:def:coordinateOperation:EPSG::5189',
                    'source_crs' => 'urn:ogc:def:crs:EPSG::4162',
                    'target_crs' => 'urn:ogc:def:crs:EPSG::4737',
                ],
            ],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5191' => [
            'name' => 'Korean 1985 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9636',
            'extent_code' => ['3266'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5192' => [
            'name' => 'Tokyo 1892 to WGS 84 (1)',
            'extent_code' => ['3266'],
            'operations' => [
                [
                    'operation' => 'urn:ogc:def:coordinateOperation:EPSG::5134',
                    'source_crs' => 'urn:ogc:def:crs:EPSG::5132',
                    'target_crs' => 'urn:ogc:def:crs:EPSG::4162',
                ],
                [
                    'operation' => 'urn:ogc:def:coordinateOperation:EPSG::5191',
                    'source_crs' => 'urn:ogc:def:crs:EPSG::4162',
                    'target_crs' => 'urn:ogc:def:crs:EPSG::4326',
                ],
            ],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5194' => [
            'name' => 'VN-2000 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['3770'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5196' => [
            'name' => 'HVRS71 height to EVRF2000 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1046',
            'extent_code' => ['3234'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5197' => [
            'name' => 'HVRS71 height to EVRF2007 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1046',
            'extent_code' => ['3234'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5198' => [
            'name' => 'Oostende height to EVRF2000 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1046',
            'extent_code' => ['1347'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5199' => [
            'name' => 'Oostende height to EVRF2007 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1046',
            'extent_code' => ['1347'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5200' => [
            'name' => 'Baltic 1982 height to EVRF2007 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1046',
            'extent_code' => ['3224'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5201' => [
            'name' => 'Baltic 1957 height to EVRF2000 height (4)',
            'method' => 'urn:ogc:def:method:EPSG::1046',
            'extent_code' => ['1079'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5202' => [
            'name' => 'Baltic 1957 height to EVRF2007 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1046',
            'extent_code' => ['1079'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5203' => [
            'name' => 'Baltic 1977 height to EVRF2007 height (2)',
            'method' => 'urn:ogc:def:method:EPSG::1046',
            'extent_code' => ['3246'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5204' => [
            'name' => 'Baltic 1977 height to EVRF2007 height (3)',
            'method' => 'urn:ogc:def:method:EPSG::1046',
            'extent_code' => ['3272'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5205' => [
            'name' => 'Constanta height to EVRF2000 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1046',
            'extent_code' => ['3295'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5206' => [
            'name' => 'Constanta height to EVRF2007 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1046',
            'extent_code' => ['3295'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5207' => [
            'name' => 'LN02 height to EVRF2007 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1046',
            'extent_code' => ['1286'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5208' => [
            'name' => 'RH2000 height to EVRF2007 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1046',
            'extent_code' => ['3313'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5209' => [
            'name' => 'Baltic 1977 height to EVRF2000 height (5)',
            'method' => 'urn:ogc:def:method:EPSG::1046',
            'extent_code' => ['3268'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5210' => [
            'name' => 'Baltic 1977 height to EVRF2007 height (4)',
            'method' => 'urn:ogc:def:method:EPSG::1046',
            'extent_code' => ['3268'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5211' => [
            'name' => 'DHHN92 height to EVRF2007 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1046',
            'extent_code' => ['3339'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5212' => [
            'name' => 'DHHN85 height to EVRF2007 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1046',
            'extent_code' => ['2326'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5213' => [
            'name' => 'Genoa height to EVRF2000 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1046',
            'extent_code' => ['2372'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5215' => [
            'name' => 'Genoa height to EVRF2007 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1046',
            'extent_code' => ['2372'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5216' => [
            'name' => 'Genoa height to EVRF2000 height (2)',
            'method' => 'urn:ogc:def:method:EPSG::1046',
            'extent_code' => ['2340'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5217' => [
            'name' => 'Genoa height to EVRF2007 height (2)',
            'method' => 'urn:ogc:def:method:EPSG::1046',
            'extent_code' => ['2340'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5218' => [
            'name' => 'Krovak East North',
            'method' => 'urn:ogc:def:method:EPSG::1041',
            'extent_code' => ['1306'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5219' => [
            'name' => 'Modified Krovak',
            'method' => 'urn:ogc:def:method:EPSG::1042',
            'extent_code' => ['1079'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5220' => [
            'name' => 'Modified Krovak East North',
            'method' => 'urn:ogc:def:method:EPSG::1043',
            'extent_code' => ['1079'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5222' => [
            'name' => 'Gabon Transverse Mercator',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3249'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5226' => [
            'name' => 'S-JTSK/05 to ETRS89 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['1079'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5227' => [
            'name' => 'S-JTSK/05 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['1079'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5230' => [
            'name' => 'S-JTSK (Ferro) to WGS 84 (2)',
            'extent_code' => ['1211'],
            'operations' => [
                [
                    'operation' => 'urn:ogc:def:coordinateOperation:EPSG::1884',
                    'source_crs' => 'urn:ogc:def:crs:EPSG::4818',
                    'target_crs' => 'urn:ogc:def:crs:EPSG::4156',
                ],
                [
                    'operation' => 'urn:ogc:def:coordinateOperation:EPSG::4836',
                    'source_crs' => 'urn:ogc:def:crs:EPSG::4156',
                    'target_crs' => 'urn:ogc:def:crs:EPSG::4326',
                ],
            ],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5231' => [
            'name' => 'Sri Lanka Grid',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3310'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5232' => [
            'name' => 'Sri Lanka Grid 1999',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3310'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5236' => [
            'name' => 'SLD99 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['3310'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5238' => [
            'name' => 'S-JTSK/05 (Ferro) to S-JTSK/05 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9601',
            'extent_code' => ['1079'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5239' => [
            'name' => 'S-JTSK to WGS 84 (5)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['1079'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5240' => [
            'name' => 'S-JTSK/05 (Ferro) to WGS 84 (1)',
            'extent_code' => ['1079'],
            'operations' => [
                [
                    'operation' => 'urn:ogc:def:coordinateOperation:EPSG::5238',
                    'source_crs' => 'urn:ogc:def:crs:EPSG::5229',
                    'target_crs' => 'urn:ogc:def:crs:EPSG::5228',
                ],
                [
                    'operation' => 'urn:ogc:def:coordinateOperation:EPSG::5227',
                    'source_crs' => 'urn:ogc:def:crs:EPSG::5228',
                    'target_crs' => 'urn:ogc:def:crs:EPSG::4326',
                ],
            ],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5241' => [
            'name' => 'S-JTSK to S-JTSK/05 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9619',
            'extent_code' => ['1079'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5242' => [
            'name' => 'S-JTSK (Ferro) to WGS 84 (3)',
            'extent_code' => ['1079'],
            'operations' => [
                [
                    'operation' => 'urn:ogc:def:coordinateOperation:EPSG::1884',
                    'source_crs' => 'urn:ogc:def:crs:EPSG::4818',
                    'target_crs' => 'urn:ogc:def:crs:EPSG::4156',
                ],
                [
                    'operation' => 'urn:ogc:def:coordinateOperation:EPSG::5239',
                    'source_crs' => 'urn:ogc:def:crs:EPSG::4156',
                    'target_crs' => 'urn:ogc:def:crs:EPSG::4326',
                ],
            ],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5249' => [
            'name' => 'Timbalai 1948 to WGS 84 (5)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['1055'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5260' => [
            'name' => 'TUREF to ETRS89 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['1237'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5261' => [
            'name' => 'TUREF to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1237'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5265' => [
            'name' => 'Bhutan National Grid',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1048'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5267' => [
            'name' => 'DRUKREF 03 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1048'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5268' => [
            'name' => 'Bumthang TM',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3734'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5276' => [
            'name' => 'Chhukha TM',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3737'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5277' => [
            'name' => 'Dagana TM',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3738'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5278' => [
            'name' => 'Gasa TM',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3740'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5279' => [
            'name' => 'Ha TM',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3742'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5280' => [
            'name' => 'Lhuentse TM',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3743'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5281' => [
            'name' => 'Mongar TM',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3745'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5282' => [
            'name' => 'Paro TM',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3746'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5283' => [
            'name' => 'Pemagatshel TM',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3747'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5284' => [
            'name' => 'Tsirang TM',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3757'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5285' => [
            'name' => 'Samdrup Jongkhar TM',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3750'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5286' => [
            'name' => 'Samtse TM',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3751'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5287' => [
            'name' => 'Sarpang TM',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3752'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5288' => [
            'name' => 'Wangdue Phodrang TM',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3758'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5289' => [
            'name' => 'Trashigang TM',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3754'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5290' => [
            'name' => 'Trongsa TM',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3755'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5291' => [
            'name' => 'Zhemgang TM',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3761'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5312' => [
            'name' => 'Thimphu TM',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3753'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5313' => [
            'name' => 'Punakha TM',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3749'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5314' => [
            'name' => 'Yangtse TM',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3760'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5315' => [
            'name' => 'Faroe Transverse Mercator',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1093'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5319' => [
            'name' => 'Teranet Ontario Lambert',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['1367'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5326' => [
            'name' => 'Iceland Lambert 2004',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['1120'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5327' => [
            'name' => 'ISN2004 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1120'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5328' => [
            'name' => 'Netherlands East Indies Equatorial Zone (Jkt)',
            'method' => 'urn:ogc:def:method:EPSG::9804',
            'extent_code' => ['4020'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5350' => [
            'name' => 'Campo Inchauspe to POSGAR 2007 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3215'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5351' => [
            'name' => 'POSGAR 2007 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1033'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5366' => [
            'name' => 'Costa Rica TM 2005',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3849'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5374' => [
            'name' => 'MARGEN to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1049'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5376' => [
            'name' => 'CR05 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1074'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5377' => [
            'name' => 'MACARIO SOLIS to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1186'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5378' => [
            'name' => 'Peru96 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1189'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5384' => [
            'name' => 'SIRGAS-ROU98 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1247'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5385' => [
            'name' => 'Yacare to SIRGAS-ROU98 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['3326'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5386' => [
            'name' => 'Yacare to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['3326'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5390' => [
            'name' => 'Costa Rica Norte',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['3869'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5394' => [
            'name' => 'Costa Rica Sur',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['3870'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5395' => [
            'name' => 'SIRGAS_ES2007.8 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1087'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5399' => [
            'name' => 'El Salvador Lambert',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['3243'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5403' => [
            'name' => 'AIOC95 depth to Caspian depth (1)',
            'method' => 'urn:ogc:def:method:EPSG::9616',
            'extent_code' => ['2592'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5415' => [
            'name' => 'GHA height to EVRF2000 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1046',
            'extent_code' => ['1037'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5416' => [
            'name' => 'Baltic 1982 height to EVRF2000 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1046',
            'extent_code' => ['3224'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5417' => [
            'name' => 'DNN height to EVRF2000 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1046',
            'extent_code' => ['3237'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5419' => [
            'name' => 'NGF IGN69 height to EVRF2000 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::9616',
            'extent_code' => ['1326'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5420' => [
            'name' => 'DHHN92 height to EVRF2000 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1046',
            'extent_code' => ['3339'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5421' => [
            'name' => 'DHHN85 height to EVRF2000 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1046',
            'extent_code' => ['2326'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5422' => [
            'name' => 'SNN76 height to EVRF2000 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1046',
            'extent_code' => ['1343'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5424' => [
            'name' => 'EOMA height 1980 to EVRF2000 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1046',
            'extent_code' => ['1119'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5425' => [
            'name' => 'NAP height to EVRF2000 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::9616',
            'extent_code' => ['1275'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5426' => [
            'name' => 'NN54 height to EVRF2000 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1046',
            'extent_code' => ['1352'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5427' => [
            'name' => 'Cascais height to EVRF2000 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::9616',
            'extent_code' => ['1294'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5428' => [
            'name' => 'NVN99 height to EVRF2000 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1046',
            'extent_code' => ['3307'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5429' => [
            'name' => 'Alicante height to EVRF2000 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1046',
            'extent_code' => ['4188'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5430' => [
            'name' => 'RH70 height to EVRF2000 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1046',
            'extent_code' => ['3313'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5431' => [
            'name' => 'LN02 height to EVRF2000 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1046',
            'extent_code' => ['1286'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5432' => [
            'name' => 'N60 height to EVRF2000 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::9616',
            'extent_code' => ['3333'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5435' => [
            'name' => 'Baltic 1957 height to EVRF2000 height (3)',
            'method' => 'urn:ogc:def:method:EPSG::1046',
            'extent_code' => ['1211'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5436' => [
            'name' => 'Baltic 1977 height to EVRF2000 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1046',
            'extent_code' => ['3246'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5437' => [
            'name' => 'Baltic 1977 height to EVRF2000 height (2)',
            'method' => 'urn:ogc:def:method:EPSG::1046',
            'extent_code' => ['3272'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5438' => [
            'name' => 'Baltic 1977 height to Caspian height (1)',
            'method' => 'urn:ogc:def:method:EPSG::9616',
            'extent_code' => ['1291'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5439' => [
            'name' => 'Nicaragua Norte',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['3844'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5440' => [
            'name' => 'Baltic 1977 depth to Caspian depth (1)',
            'method' => 'urn:ogc:def:method:EPSG::9616',
            'extent_code' => ['1291'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5443' => [
            'name' => 'Baltic 1977 height to AIOC95 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::9616',
            'extent_code' => ['2592'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5444' => [
            'name' => 'Nicaragua Sur',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['3847'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5445' => [
            'name' => 'Baltic 1977 depth to AIOC95 depth (1)',
            'method' => 'urn:ogc:def:method:EPSG::9616',
            'extent_code' => ['2592'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5447' => [
            'name' => 'Baltic 1977 height to Black Sea height (1)',
            'method' => 'urn:ogc:def:method:EPSG::9616',
            'extent_code' => ['3251'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5450' => [
            'name' => 'KOC CD height to Kuwait PWD height (1)',
            'method' => 'urn:ogc:def:method:EPSG::9616',
            'extent_code' => ['3267'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5452' => [
            'name' => 'Belfast height to Malin Head height (1)',
            'method' => 'urn:ogc:def:method:EPSG::9616',
            'extent_code' => ['2530'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5465' => [
            'name' => 'Belize Colony Grid',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3219'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5468' => [
            'name' => 'Panama Lambert',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['3290'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5470' => [
            'name' => 'Ocotepeque 1935 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3232'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5471' => [
            'name' => 'Panama Polyconic',
            'method' => 'urn:ogc:def:method:EPSG::9818',
            'extent_code' => ['3290'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5475' => [
            'name' => 'McMurdo Sound Lambert Conformal 2000',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['3853'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5476' => [
            'name' => 'Borchgrevink Coast Lambert Conformal 2000',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['3854'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5477' => [
            'name' => 'Pennell Coast Lambert Conformal 2000',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['3855'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5478' => [
            'name' => 'Ross Sea Polar Stereographic 2000',
            'method' => 'urn:ogc:def:method:EPSG::9810',
            'extent_code' => ['3856'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5483' => [
            'name' => 'Luxembourg 1930 to ETRS89 (4)',
            'method' => 'urn:ogc:def:method:EPSG::9636',
            'extent_code' => ['1146'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5484' => [
            'name' => 'Luxembourg 1930 to WGS 84 (4)',
            'method' => 'urn:ogc:def:method:EPSG::9636',
            'extent_code' => ['1146'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5485' => [
            'name' => 'Luxembourg 1930 to ETRS89 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['1146'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5486' => [
            'name' => 'Luxembourg 1930 to WGS 84 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['1146'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5491' => [
            'name' => 'Martinique 1938 to RGAF09 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['3276'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5492' => [
            'name' => 'Guadeloupe 1948 to RGAF09 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['2829'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5493' => [
            'name' => 'Fort Marigot to RGAF09 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['2828'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5494' => [
            'name' => 'RRAF 1991 to RGAF09 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['1156'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5495' => [
            'name' => 'RRAF 1991 to RGAF09 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['2829'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5496' => [
            'name' => 'RRAF 1991 to RGAF09 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['2828'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5497' => [
            'name' => 'POSGAR 2007 to SIRGAS 2000 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1033'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5501' => [
            'name' => 'RGAF09 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2824'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5509' => [
            'name' => 'Krovak (Greenwich)',
            'method' => 'urn:ogc:def:method:EPSG::9819',
            'extent_code' => ['1306'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5510' => [
            'name' => 'Krovak East North (Greenwich)',
            'method' => 'urn:ogc:def:method:EPSG::1041',
            'extent_code' => ['1306'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5511' => [
            'name' => 'Modified Krovak (Greenwich)',
            'method' => 'urn:ogc:def:method:EPSG::1042',
            'extent_code' => ['1079'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5512' => [
            'name' => 'Modified Krovak East North (Greenwich)',
            'method' => 'urn:ogc:def:method:EPSG::1043',
            'extent_code' => ['1079'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5517' => [
            'name' => 'Chatham Islands Map Grid',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2889'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5521' => [
            'name' => 'Grand Comoros to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2807'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5522' => [
            'name' => 'Gabon Transverse Mercator 2011',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1100'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5547' => [
            'name' => 'Papua New Guinea Map Grid 1994 zone 54',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3882'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5548' => [
            'name' => 'Papua New Guinea Map Grid 1994 zone 55',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3885'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5549' => [
            'name' => 'Papua New Guinea Map Grid 1994 zone 56',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3885'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5553' => [
            'name' => 'PNG94 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1187'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5557' => [
            'name' => 'GHA height to EVRF2007 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1046',
            'extent_code' => ['1037'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5584' => [
            'name' => 'MOLDREF99 to ETRS89 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1162'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5585' => [
            'name' => 'MOLDREF99 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1162'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5586' => [
            'name' => 'Pulkovo 1942 to UCS-2000 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1242'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5587' => [
            'name' => 'New Brunswick Stereographic (NAD27)',
            'method' => 'urn:ogc:def:method:EPSG::9809',
            'extent_code' => ['1447'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5590' => [
            'name' => 'UCS-2000 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['1242'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5595' => [
            'name' => 'Fehmarnbelt TM',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3889'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5599' => [
            'name' => 'FEH2010 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3889'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5622' => [
            'name' => 'OSGB36 to WGS 84 (8)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3893'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5630' => [
            'name' => 'Nord Sahara 1959 to WGS 84 (8)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3917'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5640' => [
            'name' => 'Petrobras Mercator',
            'method' => 'urn:ogc:def:method:EPSG::9805',
            'extent_code' => ['3896'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5642' => [
            'name' => 'Southern Permian Basin Atlas Lambert',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['3899'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5645' => [
            'name' => 'SPCS83 Vermont zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1414'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5647' => [
            'name' => 'UTM zone 31N with prefix',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2860'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5648' => [
            'name' => 'UTM zone 33N with prefix',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2862'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5658' => [
            'name' => 'TM Emilia-Romagna',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4035'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5660' => [
            'name' => 'Nord Sahara 1959 to WGS 84 (9)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['1026'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5662' => [
            'name' => 'AGD66 to PNG94 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['4013'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5824' => [
            'name' => 'ACT Standard Grid',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2283'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5826' => [
            'name' => 'DB_REF to ETRS89 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['3339'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5827' => [
            'name' => 'AGD66 to GDA94 (19)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['2283'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5838' => [
            'name' => 'Lisbon (Lisbon) to WGS 84 (2)',
            'extent_code' => ['1294'],
            'operations' => [
                [
                    'operation' => 'urn:ogc:def:coordinateOperation:EPSG::1756',
                    'source_crs' => 'urn:ogc:def:crs:EPSG::4803',
                    'target_crs' => 'urn:ogc:def:crs:EPSG::4207',
                ],
                [
                    'operation' => 'urn:ogc:def:coordinateOperation:EPSG::1988',
                    'source_crs' => 'urn:ogc:def:crs:EPSG::4207',
                    'target_crs' => 'urn:ogc:def:crs:EPSG::4326',
                ],
            ],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5840' => [
            'name' => 'UCS-2000 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1242'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5841' => [
            'name' => 'AGD66 to WGS 84 (19)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['4013'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5878' => [
            'name' => 'Timbalai 1948 to GDBD2009 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['1055'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5881' => [
            'name' => 'SAD69(96) to SIRGAS 2000 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1053'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5882' => [
            'name' => 'SAD69 to WGS 84 (16)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1053'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5883' => [
            'name' => 'Tonga Map Grid',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1234'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5888' => [
            'name' => 'Combani 1950 to RGM04 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['3340'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5892' => [
            'name' => 'Vietnam TM-3 zone 481',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4193'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5893' => [
            'name' => 'Vietnam TM-3 zone 482',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4215', 5 => '4547'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5894' => [
            'name' => 'Vietnam TM-3 zone 491',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4217', 5 => '4558'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5895' => [
            'name' => 'Vietnam TM-3 107-45',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4218'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5900' => [
            'name' => 'ITRF2005 to ETRF2005 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent_code' => ['1298'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5901' => [
            'name' => 'EPSG Alaska Polar Stereographic',
            'method' => 'urn:ogc:def:method:EPSG::9810',
            'extent_code' => ['1996'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5902' => [
            'name' => 'EPSG Canada Polar Stereographic',
            'method' => 'urn:ogc:def:method:EPSG::9810',
            'extent_code' => ['1996'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5903' => [
            'name' => 'EPSG Greenland Polar Stereographic',
            'method' => 'urn:ogc:def:method:EPSG::9810',
            'extent_code' => ['1996'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5904' => [
            'name' => 'EPSG Norway Polar Stereographic',
            'method' => 'urn:ogc:def:method:EPSG::9810',
            'extent_code' => ['1996'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5905' => [
            'name' => 'EPSG Russia Polar Stereographic',
            'method' => 'urn:ogc:def:method:EPSG::9810',
            'extent_code' => ['1996'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5906' => [
            'name' => 'EPSG Arctic Regional LCC zone A1',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['4019'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5907' => [
            'name' => 'EPSG Arctic Regional LCC zone A2',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['4027'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5908' => [
            'name' => 'EPSG Arctic Regional LCC zone A3',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['4028'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5909' => [
            'name' => 'EPSG Arctic Regional LCC zone A4',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['4029'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5910' => [
            'name' => 'EPSG Arctic Regional LCC zone A5',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['4031'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5911' => [
            'name' => 'EPSG Arctic Regional LCC zone B1',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['4032'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5912' => [
            'name' => 'EPSG Arctic Regional LCC zone B2',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['4033'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5913' => [
            'name' => 'EPSG Arctic Regional LCC zone B3',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['4034'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5914' => [
            'name' => 'EPSG Arctic Regional LCC zone B4',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['4037'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5915' => [
            'name' => 'EPSG Arctic Regional LCC zone B5',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['4038'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5916' => [
            'name' => 'EPSG Arctic Regional LCC zone C1',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['4040'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5917' => [
            'name' => 'EPSG Arctic Regional LCC zone C2',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['4041'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5918' => [
            'name' => 'EPSG Arctic Regional LCC zone C3',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['4042'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5919' => [
            'name' => 'EPSG Arctic Regional LCC zone C4',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['4043'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5920' => [
            'name' => 'EPSG Arctic Regional LCC zone C5',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['4045'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5943' => [
            'name' => 'EPSG Arctic LCC zone 8-20',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['4123'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5944' => [
            'name' => 'EPSG Arctic LCC zone 8-22',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['4124'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5977' => [
            'name' => 'EPSG Arctic LCC zone 1-21',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['4044'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5978' => [
            'name' => 'EPSG Arctic LCC zone 1-23',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['4047'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5979' => [
            'name' => 'EPSG Arctic LCC zone 1-25',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['4048'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5980' => [
            'name' => 'EPSG Arctic LCC zone 1-27',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['4049'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5981' => [
            'name' => 'EPSG Arctic LCC zone 1-29',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['4050'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5982' => [
            'name' => 'EPSG Arctic LCC zone 1-31',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['4051'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5983' => [
            'name' => 'EPSG Arctic LCC zone 2-10',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['4057'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5984' => [
            'name' => 'EPSG Arctic LCC zone 2-12',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['4052'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5985' => [
            'name' => 'EPSG Arctic LCC zone 2-14',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['4030'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5986' => [
            'name' => 'EPSG Arctic LCC zone 2-16',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['4036'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5987' => [
            'name' => 'EPSG Arctic LCC zone 2-18',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['4039'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5988' => [
            'name' => 'EPSG Arctic LCC zone 2-20',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['4046'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5989' => [
            'name' => 'EPSG Arctic LCC zone 2-22',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['4053'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5990' => [
            'name' => 'EPSG Arctic LCC zone 2-24',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['4054'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5991' => [
            'name' => 'EPSG Arctic LCC zone 2-26',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['4055'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5992' => [
            'name' => 'EPSG Arctic LCC zone 2-28',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['4056'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5993' => [
            'name' => 'EPSG Arctic LCC zone 3-11',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['4058'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5994' => [
            'name' => 'EPSG Arctic LCC zone 3-13',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['4059'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5995' => [
            'name' => 'EPSG Arctic LCC zone 3-15',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['4060'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5996' => [
            'name' => 'EPSG Arctic LCC zone 3-17',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['4061'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5997' => [
            'name' => 'EPSG Arctic LCC zone 3-19',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['4062'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5998' => [
            'name' => 'EPSG Arctic LCC zone 3-21',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['4063'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::5999' => [
            'name' => 'EPSG Arctic LCC zone 3-23',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['4064'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6000' => [
            'name' => 'EPSG Arctic LCC zone 3-25',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['4065'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6001' => [
            'name' => 'EPSG Arctic LCC zone 3-27',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['4070'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6002' => [
            'name' => 'EPSG Arctic LCC zone 3-29',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['4071'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6003' => [
            'name' => 'EPSG Arctic LCC zone 3-31',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['4074'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6004' => [
            'name' => 'EPSG Arctic LCC zone 3-33',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['4075'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6005' => [
            'name' => 'EPSG Arctic LCC zone 4-12',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['4076'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6006' => [
            'name' => 'EPSG Arctic LCC zone 4-14',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['4077'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6007' => [
            'name' => 'EPSG Arctic LCC zone 4-16',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['4078'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6008' => [
            'name' => 'EPSG Arctic LCC zone 4-18',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['4079'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6009' => [
            'name' => 'EPSG Arctic LCC zone 4-20',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['4080'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6010' => [
            'name' => 'EPSG Arctic LCC zone 4-22',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['4081'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6011' => [
            'name' => 'EPSG Arctic LCC zone 4-24',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['4082'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6012' => [
            'name' => 'EPSG Arctic LCC zone 4-26',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['4083'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6013' => [
            'name' => 'EPSG Arctic LCC zone 4-28',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['4084'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6014' => [
            'name' => 'EPSG Arctic LCC zone 4-30',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['4085'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6015' => [
            'name' => 'EPSG Arctic LCC zone 4-32',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['4086'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6016' => [
            'name' => 'EPSG Arctic LCC zone 4-34',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['4087'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6017' => [
            'name' => 'EPSG Arctic LCC zone 4-36',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['4088'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6018' => [
            'name' => 'EPSG Arctic LCC zone 4-38',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['4089'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6019' => [
            'name' => 'EPSG Arctic LCC zone 4-40',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['4090'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6020' => [
            'name' => 'EPSG Arctic LCC zone 5-11',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['4091'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6021' => [
            'name' => 'EPSG Arctic LCC zone 5-13',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['4092'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6022' => [
            'name' => 'EPSG Arctic LCC zone 5-15',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['4093'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6023' => [
            'name' => 'EPSG Arctic LCC zone 5-17',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['4094'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6024' => [
            'name' => 'EPSG Arctic LCC zone 5-19',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['4095'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6025' => [
            'name' => 'EPSG Arctic LCC zone 5-21',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['4096'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6026' => [
            'name' => 'EPSG Arctic LCC zone 5-23',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['4097'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6027' => [
            'name' => 'EPSG Arctic LCC zone 5-25',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['4098'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6028' => [
            'name' => 'EPSG Arctic LCC zone 5-27',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['4099'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6029' => [
            'name' => 'EPSG Arctic LCC zone 5-29',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['4100'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6030' => [
            'name' => 'EPSG Arctic LCC zone 5-31',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['4101'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6031' => [
            'name' => 'EPSG Arctic LCC zone 5-33',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['4102'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6032' => [
            'name' => 'EPSG Arctic LCC zone 5-35',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['4103'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6033' => [
            'name' => 'EPSG Arctic LCC zone 5-37',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['4104'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6034' => [
            'name' => 'EPSG Arctic LCC zone 5-39',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['4105'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6035' => [
            'name' => 'EPSG Arctic LCC zone 5-41',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['4106'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6036' => [
            'name' => 'EPSG Arctic LCC zone 5-43',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['4107'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6037' => [
            'name' => 'EPSG Arctic LCC zone 5-45',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['4108'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6038' => [
            'name' => 'EPSG Arctic LCC zone 5-47',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['4109'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6039' => [
            'name' => 'EPSG Arctic LCC zone 6-14',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['4110'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6040' => [
            'name' => 'EPSG Arctic LCC zone 6-16',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['4111'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6041' => [
            'name' => 'EPSG Arctic LCC zone 6-18',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['4112'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6042' => [
            'name' => 'EPSG Arctic LCC zone 6-20',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['4113'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6043' => [
            'name' => 'EPSG Arctic LCC zone 6-22',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['4114'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6044' => [
            'name' => 'EPSG Arctic LCC zone 6-24',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['4115'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6045' => [
            'name' => 'EPSG Arctic LCC zone 6-26',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['4116'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6046' => [
            'name' => 'EPSG Arctic LCC zone 6-28',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['4117'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6047' => [
            'name' => 'EPSG Arctic LCC zone 6-30',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['4118'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6048' => [
            'name' => 'EPSG Arctic LCC zone 7-11',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['4119'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6049' => [
            'name' => 'EPSG Arctic LCC zone 7-13',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['4120'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6127' => [
            'name' => 'Cayman Islands TM (ft)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1063'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6136' => [
            'name' => 'GCGD59 to CIGD11 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['3185'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6137' => [
            'name' => 'SIGD61 to CIGD11 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['3186'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6142' => [
            'name' => 'GCGD59 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['3185'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6143' => [
            'name' => 'SIGD61 to WGS 84 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['3186'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6177' => [
            'name' => 'CIGD11 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1063'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6191' => [
            'name' => 'Corrego Alegre 1970-72 to SAD69 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1293'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6192' => [
            'name' => 'Corrego Alegre 1970-72 to WGS 84 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1293'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6193' => [
            'name' => 'Corrego Alegre 1970-72 to SIRGAS 2000 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1293'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6194' => [
            'name' => 'Corrego Alegre 1970-72 to WGS 84 (4)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1293'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6195' => [
            'name' => 'SAD69(96) to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1053'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6196' => [
            'name' => 'Minna to WGS 84 (16)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['4127'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6198' => [
            'name' => 'Michigan CS27 Central zone',
            'method' => 'urn:ogc:def:method:EPSG::1051',
            'extent_code' => ['1724'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6199' => [
            'name' => 'Michigan CS27 South zone',
            'method' => 'urn:ogc:def:method:EPSG::1051',
            'extent_code' => ['1725'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6203' => [
            'name' => 'Macedonia Gauss-Kruger',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1148'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6205' => [
            'name' => 'MGI 1901 to ETRS89 (5)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['1148'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6206' => [
            'name' => 'MGI 1901 to WGS 84 (10)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['1148'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6208' => [
            'name' => 'Nepal 1981 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1171'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6212' => [
            'name' => 'Arauca urban grid',
            'method' => 'urn:ogc:def:method:EPSG::1052',
            'extent_code' => ['4122'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6213' => [
            'name' => 'Armenia urban grid',
            'method' => 'urn:ogc:def:method:EPSG::1052',
            'extent_code' => ['4132'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6214' => [
            'name' => 'Barranquilla urban grid',
            'method' => 'urn:ogc:def:method:EPSG::1052',
            'extent_code' => ['4134'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6215' => [
            'name' => 'Bogota urban grid',
            'method' => 'urn:ogc:def:method:EPSG::1052',
            'extent_code' => ['4135'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6216' => [
            'name' => 'Bucaramanga urban grid',
            'method' => 'urn:ogc:def:method:EPSG::1052',
            'extent_code' => ['4136'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6217' => [
            'name' => 'Cali urban grid',
            'method' => 'urn:ogc:def:method:EPSG::1052',
            'extent_code' => ['4137'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6218' => [
            'name' => 'Cartagena urban grid',
            'method' => 'urn:ogc:def:method:EPSG::1052',
            'extent_code' => ['4138'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6219' => [
            'name' => 'Cucuta urban grid',
            'method' => 'urn:ogc:def:method:EPSG::1052',
            'extent_code' => ['4139'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6220' => [
            'name' => 'Florencia urban grid',
            'method' => 'urn:ogc:def:method:EPSG::1052',
            'extent_code' => ['4140'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6221' => [
            'name' => 'Ibague urban grid',
            'method' => 'urn:ogc:def:method:EPSG::1052',
            'extent_code' => ['4141'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6222' => [
            'name' => 'Inirida urban grid',
            'method' => 'urn:ogc:def:method:EPSG::1052',
            'extent_code' => ['4142'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6223' => [
            'name' => 'Leticia urban grid',
            'method' => 'urn:ogc:def:method:EPSG::1052',
            'extent_code' => ['4143'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6224' => [
            'name' => 'Manizales urban grid',
            'method' => 'urn:ogc:def:method:EPSG::1052',
            'extent_code' => ['4144'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6225' => [
            'name' => 'Medellin urban grid',
            'method' => 'urn:ogc:def:method:EPSG::1052',
            'extent_code' => ['4145'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6226' => [
            'name' => 'Mitu urban grid',
            'method' => 'urn:ogc:def:method:EPSG::1052',
            'extent_code' => ['4146'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6227' => [
            'name' => 'Mocoa urban grid',
            'method' => 'urn:ogc:def:method:EPSG::1052',
            'extent_code' => ['4147'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6228' => [
            'name' => 'Monteria urban grid',
            'method' => 'urn:ogc:def:method:EPSG::1052',
            'extent_code' => ['4148'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6229' => [
            'name' => 'Neiva urban grid',
            'method' => 'urn:ogc:def:method:EPSG::1052',
            'extent_code' => ['4149'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6230' => [
            'name' => 'Pasto urban grid',
            'method' => 'urn:ogc:def:method:EPSG::1052',
            'extent_code' => ['4150'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6231' => [
            'name' => 'Pereira urban grid',
            'method' => 'urn:ogc:def:method:EPSG::1052',
            'extent_code' => ['4151'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6232' => [
            'name' => 'Popayan urban grid',
            'method' => 'urn:ogc:def:method:EPSG::1052',
            'extent_code' => ['4152'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6233' => [
            'name' => 'Puerto Carreno urban grid',
            'method' => 'urn:ogc:def:method:EPSG::1052',
            'extent_code' => ['4153'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6234' => [
            'name' => 'Quibdo urban grid',
            'method' => 'urn:ogc:def:method:EPSG::1052',
            'extent_code' => ['4154'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6235' => [
            'name' => 'Riohacha urban grid',
            'method' => 'urn:ogc:def:method:EPSG::1052',
            'extent_code' => ['4155'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6236' => [
            'name' => 'San Andres urban grid',
            'method' => 'urn:ogc:def:method:EPSG::1052',
            'extent_code' => ['4156'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6237' => [
            'name' => 'San Jose del Guaviare urban grid',
            'method' => 'urn:ogc:def:method:EPSG::1052',
            'extent_code' => ['4157'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6238' => [
            'name' => 'Santa Marta urban grid',
            'method' => 'urn:ogc:def:method:EPSG::1052',
            'extent_code' => ['4128'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6239' => [
            'name' => 'Sucre urban grid',
            'method' => 'urn:ogc:def:method:EPSG::1052',
            'extent_code' => ['4130'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6240' => [
            'name' => 'Tunja urban grid',
            'method' => 'urn:ogc:def:method:EPSG::1052',
            'extent_code' => ['4131'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6241' => [
            'name' => 'Valledupar urban grid',
            'method' => 'urn:ogc:def:method:EPSG::1052',
            'extent_code' => ['4158'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6242' => [
            'name' => 'Villavicencio urban grid',
            'method' => 'urn:ogc:def:method:EPSG::1052',
            'extent_code' => ['4159'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6243' => [
            'name' => 'Yopal urban grid',
            'method' => 'urn:ogc:def:method:EPSG::1052',
            'extent_code' => ['4160'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6276' => [
            'name' => 'ITRF2008 to GDA94 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1056',
            'extent_code' => ['1036'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6277' => [
            'name' => 'ITRF2005 to GDA94 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1056',
            'extent_code' => ['1036'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6278' => [
            'name' => 'ITRF2000 to GDA94 (2)',
            'method' => 'urn:ogc:def:method:EPSG::1056',
            'extent_code' => ['1036'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6279' => [
            'name' => 'ITRF97 to GDA94 (2)',
            'method' => 'urn:ogc:def:method:EPSG::1056',
            'extent_code' => ['1036'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6280' => [
            'name' => 'ITRF96 to GDA94 (2)',
            'method' => 'urn:ogc:def:method:EPSG::1056',
            'extent_code' => ['1036'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6281' => [
            'name' => 'ITRF88 to ITRF2000 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent_code' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6283' => [
            'name' => 'ITRF90 to ITRF2000 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent_code' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6284' => [
            'name' => 'ITRF91 to ITRF2000 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent_code' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6285' => [
            'name' => 'ITRF92 to ITRF2000 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent_code' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6286' => [
            'name' => 'ITRF93 to ITRF2000 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent_code' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6287' => [
            'name' => 'ITRF94 to ITRF2000 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent_code' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6288' => [
            'name' => 'ITRF96 to ITRF2000 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent_code' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6289' => [
            'name' => 'ITRF97 to ITRF2000 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent_code' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6291' => [
            'name' => 'ITRF88 to ITRF2008 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent_code' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6292' => [
            'name' => 'ITRF89 to ITRF2008 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent_code' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6293' => [
            'name' => 'ITRF90 to ITRF2008 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent_code' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6294' => [
            'name' => 'ITRF91 to ITRF2008 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent_code' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6295' => [
            'name' => 'ITRF92 to ITRF2008 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent_code' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6296' => [
            'name' => 'ITRF93 to ITRF2008 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent_code' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6297' => [
            'name' => 'ITRF94 to ITRF2008 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent_code' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6298' => [
            'name' => 'ITRF96 to ITRF2008 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent_code' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6299' => [
            'name' => 'ITRF97 to ITRF2008 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent_code' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6300' => [
            'name' => 'ITRF2000 to ITRF2008 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent_code' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6302' => [
            'name' => 'ITRF2000 to ITRF2005 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent_code' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6303' => [
            'name' => 'ED50 / UTM zone 31N to Amersfoort / RD New (1)',
            'method' => 'urn:ogc:def:method:EPSG::9653',
            'extent_code' => ['1275'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6304' => [
            'name' => 'ED50 / UTM zone 31N to Amersfoort / RD New (2)',
            'method' => 'urn:ogc:def:method:EPSG::9653',
            'extent_code' => ['1275'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6305' => [
            'name' => 'ED50 / UTM zone 31N to Belge 72 / Lambert (1)',
            'method' => 'urn:ogc:def:method:EPSG::9652',
            'extent_code' => ['1347'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6306' => [
            'name' => 'ED50 / TM 5 NE to Amersfoort / RD New (1)',
            'method' => 'urn:ogc:def:method:EPSG::9653',
            'extent_code' => ['1275'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6308' => [
            'name' => 'Cyprus Transverse Mercator',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3236'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6313' => [
            'name' => 'ITRF96 to GDA94 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1056',
            'extent_code' => ['1036'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6315' => [
            'name' => 'ITRF2000 to GDA94 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1056',
            'extent_code' => ['1036'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6361' => [
            'name' => 'Mexico LCC',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['1160'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6373' => [
            'name' => 'Mexico ITRF2008 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1160'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6374' => [
            'name' => 'Ukraine TM zone 7',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3906'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6375' => [
            'name' => 'Ukraine TM zone 8',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3907'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6376' => [
            'name' => 'Ukraine TM zone 9',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3908'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6377' => [
            'name' => 'Ukraine TM zone 10',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3909'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6378' => [
            'name' => 'Ukraine TM zone 11',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3910'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6379' => [
            'name' => 'Ukraine TM zone 12',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3912'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6380' => [
            'name' => 'Ukraine TM zone 13',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3913'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6389' => [
            'name' => 'ITRF2005 to ITRF2008 (2)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent_code' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6390' => [
            'name' => 'Cayman Islands LCC (ft)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['1063'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6392' => [
            'name' => 'ITRF97 to GDA94 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1056',
            'extent_code' => ['1036'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6645' => [
            'name' => 'Quebec Albers Projection',
            'method' => 'urn:ogc:def:method:EPSG::9822',
            'extent_code' => ['1368'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6698' => [
            'name' => 'JGD2000 to JGD2011 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['4163'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6699' => [
            'name' => 'JGD2000 (vertical) height to JGD2011 (vertical) height (1)',
            'method' => 'urn:ogc:def:method:EPSG::9616',
            'extent_code' => ['4165'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6701' => [
            'name' => 'GDBD2009 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1055'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6702' => [
            'name' => 'TM 60 SW',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4172'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6710' => [
            'name' => 'RDN2008 to ETRS89 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1127'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6711' => [
            'name' => 'RDN2008 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1127'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6716' => [
            'name' => 'Christmas Island Grid 1992',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4169'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6717' => [
            'name' => 'Christmas Island Grid 1994',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4169'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6718' => [
            'name' => 'Cocos Island Grid 1992',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1069'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6719' => [
            'name' => 'Cocos Island Grid 1994',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1069'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6729' => [
            'name' => 'Map Grid of Australia zone 46',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4189'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6730' => [
            'name' => 'Map Grid of Australia zone 47',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4190'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6731' => [
            'name' => 'Map Grid of Australia zone 59',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4179'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6741' => [
            'name' => 'Oregon Baker zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4180'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6742' => [
            'name' => 'Oregon Baker zone (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4180'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6743' => [
            'name' => 'Oregon Bend-Klamath Falls zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4192'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6744' => [
            'name' => 'Oregon Bend-Klamath Falls zone (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4192'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6745' => [
            'name' => 'Oregon Bend-Redmond-Prineville zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['4195'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6746' => [
            'name' => 'Oregon Bend-Redmond-Prineville zone (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['4195'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6747' => [
            'name' => 'Oregon Bend-Burns zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['4182'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6748' => [
            'name' => 'Oregon Bend-Burns zone (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['4182'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6749' => [
            'name' => 'Oregon Canyonville-Grants Pass zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4199'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6750' => [
            'name' => 'Oregon Canyonville-Grants Pass zone (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4199'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6751' => [
            'name' => 'Oregon Columbia River East zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['4200'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6752' => [
            'name' => 'Oregon Columbia River East zone (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['4200'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6753' => [
            'name' => 'Oregon Columbia River West zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9812',
            'extent_code' => ['4202'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6754' => [
            'name' => 'Oregon Columbia River West zone (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9812',
            'extent_code' => ['4202'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6755' => [
            'name' => 'Oregon Cottage Grove-Canyonville zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4203'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6756' => [
            'name' => 'Oregon Cottage Grove-Canyonville zone (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4203'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6757' => [
            'name' => 'Oregon Dufur-Madras zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4204'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6758' => [
            'name' => 'Oregon Dufur-Madras zone (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4204'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6759' => [
            'name' => 'Oregon Eugene zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4197'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6760' => [
            'name' => 'Oregon Eugene zone (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4197'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6761' => [
            'name' => 'Oregon Grants Pass-Ashland zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4198'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6762' => [
            'name' => 'Oregon Grants Pass-Ashland zone (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4198'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6763' => [
            'name' => 'Oregon Gresham-Warm Springs zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4201'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6764' => [
            'name' => 'Oregon Gresham-Warm Springs zone (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4201'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6765' => [
            'name' => 'Oregon La Grande zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4206'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6766' => [
            'name' => 'Oregon La Grande zone (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4206'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6767' => [
            'name' => 'Oregon Ontario zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4207'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6768' => [
            'name' => 'Oregon Ontario zone (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4207'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6769' => [
            'name' => 'Oregon Coast zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9812',
            'extent_code' => ['4208'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6770' => [
            'name' => 'Oregon Coast zone (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9812',
            'extent_code' => ['4208'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6771' => [
            'name' => 'Oregon Pendleton zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4209'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6772' => [
            'name' => 'Oregon Pendleton zone (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4209'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6773' => [
            'name' => 'Oregon Pendleton-La Grande zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4210'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6774' => [
            'name' => 'Oregon Pendleton-La Grande zone (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4210'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6775' => [
            'name' => 'Oregon Portland zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['4211'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6776' => [
            'name' => 'Oregon Portland zone (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['4211'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6777' => [
            'name' => 'Oregon Salem zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4212'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6778' => [
            'name' => 'Oregon Salem zone (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4212'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6779' => [
            'name' => 'Oregon Santiam Pass zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4213'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6780' => [
            'name' => 'Oregon Santiam Pass zone (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4213'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6864' => [
            'name' => 'ITRF96 to NAD83(CORS96) (1)',
            'method' => 'urn:ogc:def:method:EPSG::1056',
            'extent_code' => ['1511'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6865' => [
            'name' => 'ITRF97 to NAD83(CORS96) (1)',
            'method' => 'urn:ogc:def:method:EPSG::1056',
            'extent_code' => ['1511'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6866' => [
            'name' => 'ITRF2000 to NAD83(CORS96) (1)',
            'method' => 'urn:ogc:def:method:EPSG::1056',
            'extent_code' => ['1511'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6869' => [
            'name' => 'Albania TM 2010',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3212'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6872' => [
            'name' => 'Abidjan 1987 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2296'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6873' => [
            'name' => 'Tananarive to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1149'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6874' => [
            'name' => 'Tananarive (Paris) to WGS 84 (2)',
            'extent_code' => ['3273'],
            'operations' => [
                [
                    'operation' => 'urn:ogc:def:coordinateOperation:EPSG::1265',
                    'source_crs' => 'urn:ogc:def:crs:EPSG::4810',
                    'target_crs' => 'urn:ogc:def:crs:EPSG::4297',
                ],
                [
                    'operation' => 'urn:ogc:def:coordinateOperation:EPSG::6873',
                    'source_crs' => 'urn:ogc:def:crs:EPSG::4297',
                    'target_crs' => 'urn:ogc:def:crs:EPSG::4326',
                ],
            ],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6877' => [
            'name' => 'Italy zone',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1127'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6878' => [
            'name' => 'Italy zone 12',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1127'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6888' => [
            'name' => 'Ocotepeque 1935 to NAD27 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3876'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6889' => [
            'name' => 'Ocotepeque 1935 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::1063',
            'extent_code' => ['3232'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6890' => [
            'name' => 'Ocotepeque 1935 to CR05 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3232'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6891' => [
            'name' => 'Ocotepeque 1935 to WGS 84 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3876'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6895' => [
            'name' => 'Viti Levu 1912 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3195'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6896' => [
            'name' => 'Accra to WGS 84 (4)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3252'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6897' => [
            'name' => 'St. Lucia 1955 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3298'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6898' => [
            'name' => 'Lisbon to WGS 84 (5)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1294'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6899' => [
            'name' => 'Pulkovo 1942 to WGS 84 (21)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3246'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6900' => [
            'name' => 'Observatario to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1329'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6901' => [
            'name' => 'Tete to WGS 84 (6)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3281'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6902' => [
            'name' => 'Timbalai 1948 to WGS 84 (6)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2349'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6903' => [
            'name' => 'Yoff to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1207'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6904' => [
            'name' => 'Arc 1950 to WGS 84 (11)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1150'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6905' => [
            'name' => 'AGD66 to WGS 84 (20)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2575'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6906' => [
            'name' => 'Arc 1950 to WGS 84 (10)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1261'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6907' => [
            'name' => 'Ayabelle Lighthouse to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3238'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6908' => [
            'name' => 'Fahud to WGS 84 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['4009'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6909' => [
            'name' => 'Hjorsey 1955 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6910' => [
            'name' => 'Aden 1925 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1340'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6911' => [
            'name' => 'Bekaa Valley 1920 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3269'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6912' => [
            'name' => 'Bioko to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['4220'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6913' => [
            'name' => 'Gambia to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3250'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6914' => [
            'name' => 'South East Island 1943 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['4183'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6920' => [
            'name' => 'Kansas DOT Lambert (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['1385'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6921' => [
            'name' => 'Kansas DOT Lambert (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['1385'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6926' => [
            'name' => 'South East Island 1943 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['4183'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6928' => [
            'name' => 'US NSIDC EASE-Grid 2.0 Global',
            'method' => 'urn:ogc:def:method:EPSG::9835',
            'extent_code' => ['3463'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6929' => [
            'name' => 'US NSIDC EASE-Grid 2.0 North',
            'method' => 'urn:ogc:def:method:EPSG::9820',
            'extent_code' => ['3475'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6930' => [
            'name' => 'US NSIDC EASE-Grid 2.0 South',
            'method' => 'urn:ogc:def:method:EPSG::9820',
            'extent_code' => ['3474'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6935' => [
            'name' => 'IGS08 to IGRS (1)',
            'method' => 'urn:ogc:def:method:EPSG::1061',
            'extent_code' => ['1124'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6936' => [
            'name' => 'IGS08 to IGRS (2)',
            'method' => 'urn:ogc:def:method:EPSG::1033',
            'extent_code' => ['1124'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6937' => [
            'name' => 'AGD66 to PNG94 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['4214'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6938' => [
            'name' => 'AGD66 to PNG94 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['4214'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6939' => [
            'name' => 'AGD66 to PNG94 (4)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['4013'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6940' => [
            'name' => 'AGD66 to PNG94 (5)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['4013'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6941' => [
            'name' => 'AGD66 to PNG94 (6)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['4216'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6942' => [
            'name' => 'AGD66 to PNG94 (7)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['4216'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6943' => [
            'name' => 'AGD66 to WGS 84 (21)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['4214'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6944' => [
            'name' => 'AGD66 to WGS 84 (22)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['4013'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6945' => [
            'name' => 'AGD66 to WGS 84 (23)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['4216'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6949' => [
            'name' => 'PSAD56 to SIRGAS-Chile 2002 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['4231'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6950' => [
            'name' => 'PSAD56 to SIRGAS-Chile 2002 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['4222'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6951' => [
            'name' => 'PSAD56 to SIRGAS-Chile 2002 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['4221'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6960' => [
            'name' => 'VN-2000 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['3328'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6961' => [
            'name' => 'Albania LCC 2010',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['1025'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6965' => [
            'name' => 'Michigan CS27 North zone',
            'method' => 'urn:ogc:def:method:EPSG::1051',
            'extent_code' => ['1723'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6968' => [
            'name' => 'SAD69 to SIRGAS-Chile 2002 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['4224'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6970' => [
            'name' => 'SAD69 to SIRGAS-Chile 2002 (4)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2805'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6971' => [
            'name' => 'PSAD56 to WGS 84 (15)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['4231'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6972' => [
            'name' => 'PSAD56 to WGS 84 (16)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['4222'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6973' => [
            'name' => 'PSAD56 to WGS 84 (17)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['4221'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6974' => [
            'name' => 'SAD69 to WGS 84 (17)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['4232'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6975' => [
            'name' => 'SAD69 to WGS 84 (18)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['4224'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6976' => [
            'name' => 'SAD69 to WGS 84 (19)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['4221'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6977' => [
            'name' => 'SAD69 to WGS 84 (20)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2805'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6992' => [
            'name' => 'IGD05 to IGD05/12',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['1126'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6993' => [
            'name' => 'IGD05/12 to IG05/12 Intermediate CRS',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['2603'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6998' => [
            'name' => 'Nahrwan 1967 to WGS 84 (11)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['4226'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::6999' => [
            'name' => 'Nahrwan 1967 to WGS 84 (12)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['4225'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7002' => [
            'name' => 'Nahrwan 1967 to WGS 84 (13)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['4229'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7003' => [
            'name' => 'Nahrwan 1967 to WGS 84 (14)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['1850'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7004' => [
            'name' => 'Nahrwan 1967 to WGS 84 (15)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['4227'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7008' => [
            'name' => 'Nahrwan 1934 / UTM zone 37N to Karbala 1979 / UTM zone 37N (1)',
            'method' => 'urn:ogc:def:method:EPSG::9656',
            'extent_code' => ['3714'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7009' => [
            'name' => 'Nahrwan 1934 / UTM zone 38N to Karbala 1979 / UTM zone 38N (2)',
            'method' => 'urn:ogc:def:method:EPSG::9656',
            'extent_code' => ['3717'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7010' => [
            'name' => 'Nahrwan 1934 / UTM zone 38N to Karbala 1979 / UTM zone 38N (3)',
            'method' => 'urn:ogc:def:method:EPSG::9656',
            'extent_code' => ['3719'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7011' => [
            'name' => 'Nahrwan 1934 / UTM zone 38N to Karbala 1979 / UTM zone 38N (4)',
            'method' => 'urn:ogc:def:method:EPSG::9656',
            'extent_code' => ['3719'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7012' => [
            'name' => 'Nahrwan 1934 / UTM zone 38N to Karbala 1979 / UTM zone 38N (5)',
            'method' => 'urn:ogc:def:method:EPSG::9656',
            'extent_code' => ['3701'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7013' => [
            'name' => 'Nahrwan 1934 / UTM zone 38N to Karbala 1979 / UTM zone 38N (6)',
            'method' => 'urn:ogc:def:method:EPSG::9656',
            'extent_code' => ['3715'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7014' => [
            'name' => 'Nahrwan 1934 / UTM zone 38N to Karbala 1979 / UTM zone 38N (7)',
            'method' => 'urn:ogc:def:method:EPSG::9656',
            'extent_code' => ['3718'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7015' => [
            'name' => 'Nahrwan 1934 / UTM zone 37N to Karbala 1979 / UTM zone 37N (8)',
            'method' => 'urn:ogc:def:method:EPSG::9656',
            'extent_code' => ['3722'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7016' => [
            'name' => 'Nahrwan 1934 / UTM zone 37N to Karbala 1979 / UTM zone 37N (9)',
            'method' => 'urn:ogc:def:method:EPSG::9656',
            'extent_code' => ['3723'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7017' => [
            'name' => 'Nahrwan 1934 / UTM zone 38N to Karbala 1979 / UTM zone 38N (10)',
            'method' => 'urn:ogc:def:method:EPSG::9656',
            'extent_code' => ['3724'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7018' => [
            'name' => 'Nahrwan 1934 / UTM zone 38N to Karbala 1979 / UTM zone 38N (11)',
            'method' => 'urn:ogc:def:method:EPSG::9656',
            'extent_code' => ['3725'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7019' => [
            'name' => 'Nahrwan 1934 / UTM zone 37N to Karbala 1979 / UTM zone 37N (12)',
            'method' => 'urn:ogc:def:method:EPSG::9656',
            'extent_code' => ['3728'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7020' => [
            'name' => 'Nahrwan 1934 / UTM zone 37N to Karbala 1979 / UTM zone 37N (13)',
            'method' => 'urn:ogc:def:method:EPSG::9656',
            'extent_code' => ['3729'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7021' => [
            'name' => 'Nahrwan 1934 / UTM zone 37N to Karbala 1979 / UTM zone 37N (14)',
            'method' => 'urn:ogc:def:method:EPSG::9656',
            'extent_code' => ['3728'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7022' => [
            'name' => 'Nahrwan 1934 / UTM zone 38N to Karbala 1979 / UTM zone 38N (15)',
            'method' => 'urn:ogc:def:method:EPSG::9656',
            'extent_code' => ['3709'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7023' => [
            'name' => 'Nahrwan 1934 / UTM zone 38N to Karbala 1979 / UTM zone 38N (16)',
            'method' => 'urn:ogc:def:method:EPSG::9656',
            'extent_code' => ['3695'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7024' => [
            'name' => 'Nahrwan 1934 / UTM zone 38N to Karbala 1979 / UTM zone 38N (17)',
            'method' => 'urn:ogc:def:method:EPSG::9656',
            'extent_code' => ['3704'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7025' => [
            'name' => 'Nahrwan 1934 / UTM zone 38N to Karbala 1979 / UTM zone 38N (18)',
            'method' => 'urn:ogc:def:method:EPSG::9656',
            'extent_code' => ['3704'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7026' => [
            'name' => 'Nahrwan 1934 / UTM zone 38N to Karbala 1979 / UTM zone 38N (19)',
            'method' => 'urn:ogc:def:method:EPSG::9656',
            'extent_code' => ['3706'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7027' => [
            'name' => 'Nahrwan 1934 / UTM zone 38N to Karbala 1979 / UTM zone 38N (20)',
            'method' => 'urn:ogc:def:method:EPSG::9656',
            'extent_code' => ['3708'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7028' => [
            'name' => 'Nahrwan 1934 / UTM zone 38N to Karbala 1979 / UTM zone 38N (21)',
            'method' => 'urn:ogc:def:method:EPSG::9656',
            'extent_code' => ['3710'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7029' => [
            'name' => 'Nahrwan 1934 / UTM zone 38N to Karbala 1979 / UTM zone 38N (22)',
            'method' => 'urn:ogc:def:method:EPSG::9656',
            'extent_code' => ['3706'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7030' => [
            'name' => 'Nahrwan 1934 / UTM zone 38N to Karbala 1979 / UTM zone 38N (23)',
            'method' => 'urn:ogc:def:method:EPSG::9656',
            'extent_code' => ['3708'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7031' => [
            'name' => 'Nahrwan 1934 / UTM zone 38N to Karbala 1979 / UTM zone 38N (24)',
            'method' => 'urn:ogc:def:method:EPSG::9656',
            'extent_code' => ['3711'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7032' => [
            'name' => 'Nahrwan 1934 / UTM zone 38N to Karbala 1979 / UTM zone 38N (25)',
            'method' => 'urn:ogc:def:method:EPSG::9656',
            'extent_code' => ['3712'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7033' => [
            'name' => 'Nahrwan 1934 to WGS 84 (6)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3625'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7043' => [
            'name' => 'Iowa regional zone 1 Spencer',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['4164'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7044' => [
            'name' => 'Iowa regional zone 2 Mason City',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['4219'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7045' => [
            'name' => 'Iowa regional zone 3 Elkader',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4230'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7046' => [
            'name' => 'Iowa regional zone 4 Sioux City-Iowa Falls',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['4233'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7047' => [
            'name' => 'Iowa regional zone 5 Waterloo',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['4234'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7048' => [
            'name' => 'Iowa regional zone 6 Council Bluffs',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4235'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7049' => [
            'name' => 'Iowa regional zone 7 Carroll-Atlantic',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4236'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7050' => [
            'name' => 'Iowa regional zone 8 Ames-Des Moines',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4237'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7051' => [
            'name' => 'Iowa regional zone 9 Newton',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4239'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7052' => [
            'name' => 'Iowa regional zone 10 Cedar Rapids',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['4240'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7053' => [
            'name' => 'Iowa regional zone 11 Dubuque-Davenport',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4241'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7054' => [
            'name' => 'Iowa regional zone 12 Red Oak-Ottumwa',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['4242'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7055' => [
            'name' => 'Iowa regional zone 13 Fairfield',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4243'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7056' => [
            'name' => 'Iowa regional zone 14 Burlington',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4244'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7083' => [
            'name' => 'Perroud 1950 to RGTAAF07 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2817'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7089' => [
            'name' => 'Montana Blackfeet St Mary Valley (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4310'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7090' => [
            'name' => 'Montana Blackfeet St Mary Valley (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4310'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7091' => [
            'name' => 'Montana Blackfeet (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4311'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7092' => [
            'name' => 'Montana Blackfeet (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4311'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7093' => [
            'name' => 'Montana Milk River (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['4312'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7094' => [
            'name' => 'Montana Milk River (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['4312'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7095' => [
            'name' => 'Montana Fort Belknap (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['4313'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7096' => [
            'name' => 'Montana Fort Belknap (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['4313'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7097' => [
            'name' => 'Montana Fort Peck Assiniboine (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['4314'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7098' => [
            'name' => 'Montana Fort Peck Assiniboine (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['4314'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7099' => [
            'name' => 'Montana Fort Peck Sioux (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['4315'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7100' => [
            'name' => 'Montana Fort Peck Sioux (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['4315'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7101' => [
            'name' => 'Montana Crow (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4316'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7102' => [
            'name' => 'Montana Crow (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4316'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7103' => [
            'name' => 'Montana Bobcat (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['4317'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7104' => [
            'name' => 'Montana Bobcat (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['4317'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7105' => [
            'name' => 'Montana Billings (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['4318'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7106' => [
            'name' => 'Montana Billings (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['4318'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7107' => [
            'name' => 'Wyoming Wind River (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4319'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7108' => [
            'name' => 'Wyoming Wind River (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4319'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7129' => [
            'name' => 'City and County of San Francisco CS13 (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4228'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7130' => [
            'name' => 'City and County of San Francisco CS13 (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4228'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7140' => [
            'name' => 'IGD05 to IG05 Intermediate CRS',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['2603'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7141' => [
            'name' => 'Palestine Grid modified',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1356'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7143' => [
            'name' => 'InGCS Adams (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4289'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7144' => [
            'name' => 'InGCS Adams (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4289'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7145' => [
            'name' => 'InGCS Allen (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4285'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7146' => [
            'name' => 'InGCS Allen (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4285'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7147' => [
            'name' => 'InGCS Bartholomew (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4302'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7148' => [
            'name' => 'InGCS Bartholomew (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4302'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7149' => [
            'name' => 'InGCS Benton (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4256'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7150' => [
            'name' => 'InGCS Benton (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4256'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7151' => [
            'name' => 'InGCS Blackford-Delaware (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4291'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7152' => [
            'name' => 'InGCS Blackford-Delaware (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4291'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7153' => [
            'name' => 'InGCS Boone-Hendricks (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4263'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7154' => [
            'name' => 'InGCS Boone-Hendricks (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4263'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7155' => [
            'name' => 'InGCS Brown (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4301'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7156' => [
            'name' => 'InGCS Brown (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4301'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7157' => [
            'name' => 'InGCS Carroll (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4258'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7158' => [
            'name' => 'InGCS Carroll (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4258'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7159' => [
            'name' => 'InGCS Cass (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4286'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7160' => [
            'name' => 'InGCS Cass (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4286'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7161' => [
            'name' => 'InGCS Clark-Floyd-Scott (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4308'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7162' => [
            'name' => 'InGCS Clark-Floyd-Scott (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4308'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7163' => [
            'name' => 'InGCS Clay (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4265'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7164' => [
            'name' => 'InGCS Clay (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4265'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7165' => [
            'name' => 'InGCS Clinton (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4260'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7166' => [
            'name' => 'InGCS Clinton (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4260'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7167' => [
            'name' => 'InGCS Crawford-Lawrence-Orange (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4272'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7168' => [
            'name' => 'InGCS Crawford-Lawrence-Orange (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4272'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7169' => [
            'name' => 'InGCS Daviess-Greene (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4269'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7170' => [
            'name' => 'InGCS Daviess-Greene (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4269'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7171' => [
            'name' => 'InGCS Dearborn-Ohio-Switzerland (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4306'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7172' => [
            'name' => 'InGCS Dearborn-Ohio-Switzerland (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4306'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7173' => [
            'name' => 'InGCS Decatur-Rush (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4299'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7174' => [
            'name' => 'InGCS Decatur-Rush (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4299'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7175' => [
            'name' => 'InGCS DeKalb (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4283'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7176' => [
            'name' => 'InGCS DeKalb (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4283'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7177' => [
            'name' => 'InGCS Dubois-Martin (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4271'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7178' => [
            'name' => 'InGCS Dubois-Martin (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4271'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7179' => [
            'name' => 'InGCS Elkhart-Kosciusko-Wabash (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4280'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7180' => [
            'name' => 'InGCS Elkhart-Kosciusko-Wabash (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4280'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7181' => [
            'name' => 'InGCS Fayette-Franklin-Union (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4300'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7182' => [
            'name' => 'InGCS Fayette-Franklin-Union (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4300'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7183' => [
            'name' => 'InGCS Fountain-Warren (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4259'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7184' => [
            'name' => 'InGCS Fountain-Warren (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4259'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7185' => [
            'name' => 'InGCS Fulton-Marshall-St. Joseph (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4279'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7186' => [
            'name' => 'InGCS Fulton-Marshall-St. Joseph (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4279'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7187' => [
            'name' => 'InGCS Gibson (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4273'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7188' => [
            'name' => 'InGCS Gibson (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4273'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7189' => [
            'name' => 'InGCS Grant (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4290'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7190' => [
            'name' => 'InGCS Grant (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4290'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7191' => [
            'name' => 'InGCS Hamilton-Tipton (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4293'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7192' => [
            'name' => 'InGCS Hamilton-Tipton (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4293'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7193' => [
            'name' => 'InGCS Hancock-Madison (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4294'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7194' => [
            'name' => 'InGCS Hancock-Madison (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4294'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7195' => [
            'name' => 'InGCS Harrison-Washington (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4307'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7196' => [
            'name' => 'InGCS Harrison-Washington (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4307'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7197' => [
            'name' => 'InGCS Henry (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4296'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7198' => [
            'name' => 'InGCS Henry (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4296'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7199' => [
            'name' => 'InGCS Howard-Miami (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4287'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7200' => [
            'name' => 'InGCS Howard-Miami (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4287'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7201' => [
            'name' => 'InGCS Huntington-Whitley (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4284'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7202' => [
            'name' => 'InGCS Huntington-Whitley (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4284'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7203' => [
            'name' => 'InGCS Jackson (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4303'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7204' => [
            'name' => 'InGCS Jackson (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4303'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7205' => [
            'name' => 'InGCS Jasper-Porter (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4254'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7206' => [
            'name' => 'InGCS Jasper-Porter (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4254'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7207' => [
            'name' => 'InGCS Jay (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4292'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7208' => [
            'name' => 'InGCS Jay (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4292'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7209' => [
            'name' => 'InGCS Jefferson (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4309'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7210' => [
            'name' => 'InGCS Jefferson (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4309'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7211' => [
            'name' => 'InGCS Jennings (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4304'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7212' => [
            'name' => 'InGCS Jennings (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4304'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7213' => [
            'name' => 'InGCS Johnson-Marion (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4297'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7214' => [
            'name' => 'InGCS Johnson-Marion (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4297'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7215' => [
            'name' => 'InGCS Knox (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4270'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7216' => [
            'name' => 'InGCS Knox (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4270'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7217' => [
            'name' => 'InGCS LaGrange-Noble (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4281'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7218' => [
            'name' => 'InGCS LaGrange-Noble (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4281'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7219' => [
            'name' => 'InGCS Lake-Newton (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4253'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7220' => [
            'name' => 'InGCS Lake-Newton (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4253'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7221' => [
            'name' => 'InGCS LaPorte-Pulaski-Starke (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4255'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7222' => [
            'name' => 'InGCS LaPorte-Pulaski-Starke (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4255'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7223' => [
            'name' => 'InGCS Monroe-Morgan (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4267'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7224' => [
            'name' => 'InGCS Monroe-Morgan (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4267'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7225' => [
            'name' => 'InGCS Montgomery-Putnam (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7226' => [
            'name' => 'InGCS Montgomery-Putnam (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7227' => [
            'name' => 'InGCS Owen (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4266'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7228' => [
            'name' => 'InGCS Owen (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4266'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7229' => [
            'name' => 'InGCS Parke-Vermillion (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4261'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7230' => [
            'name' => 'InGCS Parke-Vermillion (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4261'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7231' => [
            'name' => 'InGCS Perry (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4278'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7232' => [
            'name' => 'InGCS Perry (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4278'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7233' => [
            'name' => 'InGCS Pike-Warrick (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4274'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7234' => [
            'name' => 'InGCS Pike-Warrick (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4274'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7235' => [
            'name' => 'InGCS Posey (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4275'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7236' => [
            'name' => 'InGCS Posey (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4275'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7237' => [
            'name' => 'InGCS Randolph-Wayne (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4295'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7238' => [
            'name' => 'InGCS Randolph-Wayne (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4295'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7239' => [
            'name' => 'InGCS Ripley (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4305'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7240' => [
            'name' => 'InGCS Ripley (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4305'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7241' => [
            'name' => 'InGCS Shelby (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4298'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7242' => [
            'name' => 'InGCS Shelby (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4298'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7243' => [
            'name' => 'InGCS Spencer (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4277'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7244' => [
            'name' => 'InGCS Spencer (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4277'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7245' => [
            'name' => 'InGCS Steuben (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4282'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7246' => [
            'name' => 'InGCS Steuben (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4282'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7247' => [
            'name' => 'InGCS Sullivan (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4268'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7248' => [
            'name' => 'InGCS Sullivan (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4268'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7249' => [
            'name' => 'InGCS Tippecanoe-White (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4257'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7250' => [
            'name' => 'InGCS Tippecanoe-White (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4257'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7251' => [
            'name' => 'InGCS Vanderburgh (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4276'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7252' => [
            'name' => 'InGCS Vanderburgh (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4276'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7253' => [
            'name' => 'InGCS Vigo (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4264'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7254' => [
            'name' => 'InGCS Vigo (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4264'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7255' => [
            'name' => 'InGCS Wells (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4288'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7256' => [
            'name' => 'InGCS Wells (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4288'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7377' => [
            'name' => 'ONGD14 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1032',
            'extent_code' => ['1183'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7378' => [
            'name' => 'WISCRS Ashland County (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4320'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7379' => [
            'name' => 'WISCRS Ashland County (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4320'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7380' => [
            'name' => 'WISCRS Bayfield County (m)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['4321'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7381' => [
            'name' => 'WISCRS Bayfield County (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['4321'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7382' => [
            'name' => 'WISCRS Burnett County (m)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['4325'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7383' => [
            'name' => 'WISCRS Burnett County (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['4325'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7384' => [
            'name' => 'WISCRS Douglas County (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4326'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7385' => [
            'name' => 'WISCRS Douglas County (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4326'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7386' => [
            'name' => 'WISCRS Florence County (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4327'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7387' => [
            'name' => 'WISCRS Florence County (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4327'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7388' => [
            'name' => 'WISCRS Forest County (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4328'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7389' => [
            'name' => 'WISCRS Forest County (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4328'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7390' => [
            'name' => 'WISCRS Iron County (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4329'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7391' => [
            'name' => 'WISCRS Iron County (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4329'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7392' => [
            'name' => 'WISCRS Oneida County (m)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['4330'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7393' => [
            'name' => 'WISCRS Oneida County (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['4330'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7394' => [
            'name' => 'WISCRS Price County (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4332'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7395' => [
            'name' => 'WISCRS Price County (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4332'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7396' => [
            'name' => 'WISCRS Sawyer County (m)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['4333'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7397' => [
            'name' => 'WISCRS Sawyer County (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['4333'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7398' => [
            'name' => 'WISCRS Vilas County (m)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['4334'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7399' => [
            'name' => 'WISCRS Vilas County (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['4334'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7424' => [
            'name' => 'WISCRS Washburn County (m)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['4335'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7425' => [
            'name' => 'WISCRS Washburn County (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['4335'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7426' => [
            'name' => 'WISCRS Barron County (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4331'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7427' => [
            'name' => 'WISCRS Barron County (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4331'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7428' => [
            'name' => 'WISCRS Brown County (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4336'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7429' => [
            'name' => 'WISCRS Brown County (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4336'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7430' => [
            'name' => 'WISCRS Buffalo County (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4337'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7431' => [
            'name' => 'WISCRS Buffalo County (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4337'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7432' => [
            'name' => 'WISCRS Chippewa County (m)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['4338'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7433' => [
            'name' => 'WISCRS Chippewa County (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['4338'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7434' => [
            'name' => 'WISCRS Clark County (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4339'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7435' => [
            'name' => 'WISCRS Clark County (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4339'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7436' => [
            'name' => 'WISCRS Door County (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4340'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7437' => [
            'name' => 'WISCRS Door County (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4340'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7438' => [
            'name' => 'WISCRS Dunn County (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4341'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7439' => [
            'name' => 'WISCRS Dunn County (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4341'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7440' => [
            'name' => 'WISCRS Eau Claire County (m)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['4342'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7441' => [
            'name' => 'WISCRS Eau Claire County (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['4342'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7442' => [
            'name' => 'Nord Sahara 1959 to WGS 84 (10)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['4382'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7443' => [
            'name' => 'ONGD14 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1183'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7448' => [
            'name' => 'SAD69 to SIRGAS-Chile 2002 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['4232'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7449' => [
            'name' => 'SAD69 to SIRGAS-Chile 2002 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['4221'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7450' => [
            'name' => 'WISCRS Jackson County (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4343'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7451' => [
            'name' => 'WISCRS Jackson County (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4343'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7452' => [
            'name' => 'WISCRS Langlade County (m)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['4344'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7453' => [
            'name' => 'WISCRS Langlade County (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['4344'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7454' => [
            'name' => 'WISCRS Lincoln County (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4345'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7455' => [
            'name' => 'WISCRS Lincoln County (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4345'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7456' => [
            'name' => 'WISCRS Marathon County (m)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['4346'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7457' => [
            'name' => 'WISCRS Marathon County (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['4346'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7458' => [
            'name' => 'WISCRS Marinette County (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4347'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7459' => [
            'name' => 'WISCRS Marinette County (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4347'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7460' => [
            'name' => 'WISCRS Menominee County (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4348'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7461' => [
            'name' => 'WISCRS Menominee County (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4348'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7462' => [
            'name' => 'WISCRS Oconto County (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4349'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7463' => [
            'name' => 'WISCRS Oconto County (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4349'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7464' => [
            'name' => 'WISCRS Pepin and Pierce Counties (m)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['4350'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7465' => [
            'name' => 'WISCRS Pepin and Pierce Counties (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['4350'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7466' => [
            'name' => 'WISCRS Polk County (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4351'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7467' => [
            'name' => 'WISCRS Polk County (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4351'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7468' => [
            'name' => 'WISCRS Portage County (m)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['4352'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7469' => [
            'name' => 'WISCRS Portage County (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['4352'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7470' => [
            'name' => 'WISCRS Rusk County (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4353'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7471' => [
            'name' => 'WISCRS Rusk County (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4353'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7472' => [
            'name' => 'WISCRS Shawano County (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4354'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7473' => [
            'name' => 'WISCRS Shawano County (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4354'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7474' => [
            'name' => 'WISCRS St. Croix County (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4355'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7475' => [
            'name' => 'WISCRS St. Croix County (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4355'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7476' => [
            'name' => 'WISCRS Taylor County (m)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['4356'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7477' => [
            'name' => 'WISCRS Taylor County (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['4356'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7478' => [
            'name' => 'WISCRS Trempealeau County (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4357'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7479' => [
            'name' => 'WISCRS Trempealeau County (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4357'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7480' => [
            'name' => 'WISCRS Waupaca County (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4358'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7481' => [
            'name' => 'WISCRS Waupaca County (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4358'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7482' => [
            'name' => 'WISCRS Wood County (m)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['4359'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7483' => [
            'name' => 'WISCRS Wood County (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['4359'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7484' => [
            'name' => 'WISCRS Adams and Juneau Counties (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4360'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7485' => [
            'name' => 'WISCRS Adams and Juneau Counties (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4360'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7486' => [
            'name' => 'WISCRS Calumet, Fond du Lac, Outagamie and Winnebago Counties (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4361'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7487' => [
            'name' => 'WISCRS Calumet, Fond du Lac, Outagamie and Winnebago Counties (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4361'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7488' => [
            'name' => 'WISCRS Columbia County (m)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['4362'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7489' => [
            'name' => 'WISCRS Columbia County (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['4362'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7490' => [
            'name' => 'WISCRS Crawford County (m)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['4363'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7491' => [
            'name' => 'WISCRS Crawford County (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['4363'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7492' => [
            'name' => 'WISCRS Dane County (m)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['4364'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7493' => [
            'name' => 'WISCRS Dane County (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['4364'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7494' => [
            'name' => 'WISCRS Dodge and Jefferson Counties (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4365'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7495' => [
            'name' => 'WISCRS Dodge and Jefferson Counties (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4365'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7496' => [
            'name' => 'WISCRS Grant County (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4366'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7497' => [
            'name' => 'WISCRS Grant County (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4366'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7498' => [
            'name' => 'WISCRS Green and Lafayette Counties (m)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['4367'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7499' => [
            'name' => 'WISCRS Green and Lafayette Counties (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['4367'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7500' => [
            'name' => 'WISCRS Green Lake and Marquette Counties (m)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['4368'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7501' => [
            'name' => 'WISCRS Green Lake and Marquette Counties (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['4368'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7502' => [
            'name' => 'WISCRS Iowa County (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4369'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7503' => [
            'name' => 'WISCRS Iowa County (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4369'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7504' => [
            'name' => 'WISCRS Kenosha, Milwaukee, Ozaukee and Racine Counties (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4370'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7505' => [
            'name' => 'WISCRS Kenosha, Milwaukee, Ozaukee and Racine Counties (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4370'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7506' => [
            'name' => 'WISCRS Kewaunee, Manitowoc and Sheboygan Counties (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4371'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7507' => [
            'name' => 'WISCRS Kewaunee, Manitowoc and Sheboygan Counties (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4371'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7508' => [
            'name' => 'WISCRS La Crosse County (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4372'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7509' => [
            'name' => 'WISCRS La Crosse County (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4372'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7510' => [
            'name' => 'WISCRS Monroe County (m)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['4373'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7511' => [
            'name' => 'WISCRS Monroe County (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['4373'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7512' => [
            'name' => 'WISCRS Richland County (m)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['4374'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7513' => [
            'name' => 'WISCRS Richland County (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['4374'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7514' => [
            'name' => 'WISCRS Rock County (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4375'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7515' => [
            'name' => 'WISCRS Rock County (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4375'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7516' => [
            'name' => 'WISCRS Sauk County (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4376'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7517' => [
            'name' => 'WISCRS Sauk County (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4376'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7518' => [
            'name' => 'WISCRS Vernon County (m)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['4377'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7519' => [
            'name' => 'WISCRS Vernon County (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['4377'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7520' => [
            'name' => 'WISCRS Walworth County (m)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['4378'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7521' => [
            'name' => 'WISCRS Walworth County (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['4378'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7522' => [
            'name' => 'WISCRS Washington County (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4379'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7523' => [
            'name' => 'WISCRS Washington County (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4379'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7524' => [
            'name' => 'WISCRS Waukesha County (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4380'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7525' => [
            'name' => 'WISCRS Waukesha County (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4380'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7526' => [
            'name' => 'WISCRS Waushara County (m)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['4381'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7527' => [
            'name' => 'WISCRS Waushara County (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['4381'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7653' => [
            'name' => 'EGM96 height to Kumul 34 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::9616',
            'extent_code' => ['4013'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7654' => [
            'name' => 'EGM2008 height to Kiunga height (1)',
            'method' => 'urn:ogc:def:method:EPSG::9616',
            'extent_code' => ['4383'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7666' => [
            'name' => 'WGS 84 (G1762) to ITRF2008 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1032',
            'extent_code' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7667' => [
            'name' => 'WGS 84 (G1674) to WGS 84 (G1762) (1)',
            'method' => 'urn:ogc:def:method:EPSG::1032',
            'extent_code' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7668' => [
            'name' => 'WGS 84 (G1150) to WGS 84 (G1762) (1)',
            'method' => 'urn:ogc:def:method:EPSG::1032',
            'extent_code' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7669' => [
            'name' => 'WGS 84 (G1674) to ITRF2008 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1032',
            'extent_code' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7670' => [
            'name' => 'WGS 84 (G1150) to ITRF2000 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1032',
            'extent_code' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7672' => [
            'name' => 'WGS 84 (G730) to ITRF92 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1032',
            'extent_code' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7675' => [
            'name' => 'MGI 1901 to ETRS89 (6)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['4543'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7676' => [
            'name' => 'MGI 1901 to WGS 84 (11)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['4543'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7687' => [
            'name' => 'Kyrgyzstan zone 1',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4385'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7688' => [
            'name' => 'Kyrgyzstan zone 2',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4386'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7689' => [
            'name' => 'Kyrgyzstan zone 3',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4387'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7690' => [
            'name' => 'Kyrgyzstan zone 4',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4388'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7691' => [
            'name' => 'Kyrgyzstan zone 5',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4389'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7697' => [
            'name' => 'Egypt 1907 to WGS 84 (4)',
            'method' => 'urn:ogc:def:method:EPSG::9636',
            'extent_code' => ['1086'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7698' => [
            'name' => 'NAD27 to WGS 84 (89)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['3290'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7701' => [
            'name' => 'Latvia 2000 height to EVRF2007 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1046',
            'extent_code' => ['3268'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7702' => [
            'name' => 'PZ-90 to PZ-90.02 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1066',
            'extent_code' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7703' => [
            'name' => 'PZ-90.02 to PZ-90.11 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1066',
            'extent_code' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7704' => [
            'name' => 'PZ-90 to PZ-90.11 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1032',
            'extent_code' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7705' => [
            'name' => 'GSK-2011 to PZ-90.11 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1066',
            'extent_code' => ['1198'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7720' => [
            'name' => 'CGRS93 to ETRS89 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['3236'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7721' => [
            'name' => 'CGRS93 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['3236'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7722' => [
            'name' => 'Survey of India Lambert',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['1121'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7723' => [
            'name' => 'Andhra Pradesh NSF LCC',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['4394'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7724' => [
            'name' => 'Arunachal Pradesh NSF LCC',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['4395'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7725' => [
            'name' => 'Assam NSF LCC',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['4396'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7726' => [
            'name' => 'Bihar NSF LCC',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['4397'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7727' => [
            'name' => 'Delhi NSF LCC',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['4422'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7728' => [
            'name' => 'Gujarat NSF LCC',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['4400'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7729' => [
            'name' => 'Haryana NSF LCC',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['4401'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7730' => [
            'name' => 'Himachal Pradesh NSF LCC',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['4402'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7731' => [
            'name' => 'Jammu and Kashmir NSF LCC',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['4403'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7732' => [
            'name' => 'Jharkhand NSF LCC',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['4404'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7733' => [
            'name' => 'Madhya Pradesh NSF LCC',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['4407'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7734' => [
            'name' => 'Maharashtra NSF LCC',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['4408'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7735' => [
            'name' => 'Manipur NSF LCC',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['4409'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7736' => [
            'name' => 'Meghalaya NSF LCC',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['4410'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7737' => [
            'name' => 'Nagaland NSF LCC',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['4412'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7738' => [
            'name' => 'Northeast India NSF LCC',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['4392'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7739' => [
            'name' => 'Orissa NSF LCC',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['4413'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7740' => [
            'name' => 'Punjab NSF LCC',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['4414'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7741' => [
            'name' => 'Rajasthan NSF LCC',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['4415'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7742' => [
            'name' => 'Uttar Pradesh NSF LCC',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['4419'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7743' => [
            'name' => 'Uttaranchal NSF LCC',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['4420'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7744' => [
            'name' => 'Andaman and Nicobar NSF TM',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4423'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7745' => [
            'name' => 'Chhattisgarh NSF TM',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4398'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7746' => [
            'name' => 'Goa NSF TM',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4399'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7747' => [
            'name' => 'Karnataka NSF TM',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4405'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7748' => [
            'name' => 'Kerala NSF TM',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4406'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7749' => [
            'name' => 'Lakshadweep NSF TM',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4424'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7750' => [
            'name' => 'Mizoram NSF TM',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4411'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7751' => [
            'name' => 'Sikkim NSF TM',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4416'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7752' => [
            'name' => 'Tamil Nadu NSF TM',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4417'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7753' => [
            'name' => 'Tripura NSF TM',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4418'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7754' => [
            'name' => 'West Bengal NSF TM',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4421'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7790' => [
            'name' => 'ITRF2008 to ITRF2014 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent_code' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7802' => [
            'name' => 'Cadastral Coordinate System 2005',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['3224'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7806' => [
            'name' => 'Pulkovo 1942(83) to BGS2005 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1063',
            'extent_code' => ['3224'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7807' => [
            'name' => 'ITRF2008 to NAD83(2011) (1)',
            'method' => 'urn:ogc:def:method:EPSG::1056',
            'extent_code' => ['1511'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7808' => [
            'name' => 'ITRF2008 to NAD83(PA11) (1)',
            'method' => 'urn:ogc:def:method:EPSG::1056',
            'extent_code' => ['4162'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7809' => [
            'name' => 'ITRF2008 to NAD83(MA11) (1)',
            'method' => 'urn:ogc:def:method:EPSG::1056',
            'extent_code' => ['4167'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7814' => [
            'name' => 'ITRF89 to ITRF2000 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent_code' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7817' => [
            'name' => 'UCS-2000 to ITRF2000 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1031',
            'extent_code' => ['1242'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7818' => [
            'name' => 'CS63 zone X1',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4435'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7819' => [
            'name' => 'CS63 zone X2',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4429'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7820' => [
            'name' => 'CS63 zone X3',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4430'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7821' => [
            'name' => 'CS63 zone X4',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4431'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7822' => [
            'name' => 'CS63 zone X5',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4432'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7823' => [
            'name' => 'CS63 zone X6',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4433'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7824' => [
            'name' => 'CS63 zone X7',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4434'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7833' => [
            'name' => 'Albanian 1987 to ETRS89 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['3212'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7834' => [
            'name' => 'Albanian 1987 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['3212'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7835' => [
            'name' => 'Pulkovo 1942(58) to WGS 84 (22)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['4446'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7836' => [
            'name' => 'Pulkovo 1942(58) to Albanian 1987 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1025'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7838' => [
            'name' => 'DHHN2016 height to EVRF2007 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::1046',
            'extent_code' => ['3339'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7873' => [
            'name' => 'EGM96 height to POM96 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::9616',
            'extent_code' => ['4425'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7874' => [
            'name' => 'EGM2008 height to POM08 height (1)',
            'method' => 'urn:ogc:def:method:EPSG::9616',
            'extent_code' => ['4425'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7875' => [
            'name' => 'St. Helena Local Grid 1971',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3183'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7876' => [
            'name' => 'St. Helena Local Grid (Tritan)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3183'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7892' => [
            'name' => 'SHGD2015 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3183'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7893' => [
            'name' => 'Astro DOS 71 to SHGD2015 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3183'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7894' => [
            'name' => 'Astro DOS 71 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3183'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7895' => [
            'name' => 'Astro DOS 71 to SHGD2015 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['3183'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7897' => [
            'name' => 'St. Helena Tritan to SHGD2015 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3183'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7898' => [
            'name' => 'St. Helena Tritan to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3183'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7932' => [
            'name' => 'ITRF89 to ETRF89 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent_code' => ['1298'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7933' => [
            'name' => 'ITRF90 to ETRF90 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent_code' => ['1298'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7934' => [
            'name' => 'ITRF91 to ETRF91 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent_code' => ['1298'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7935' => [
            'name' => 'ITRF92 to ETRF92 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent_code' => ['1298'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7936' => [
            'name' => 'ITRF93 to ETRF93 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent_code' => ['1298'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7937' => [
            'name' => 'ITRF94 to ETRF94 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent_code' => ['1298'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7938' => [
            'name' => 'ITRF96 to ETRF96 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent_code' => ['1298'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7939' => [
            'name' => 'ITRF97 to ETRF97 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent_code' => ['1298'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7940' => [
            'name' => 'ITRF2000 to ETRF2000 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent_code' => ['1298'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7941' => [
            'name' => 'ITRF2000 to ETRF2000 (2)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent_code' => ['1298'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7942' => [
            'name' => 'ITRF89 to ETRF2000 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent_code' => ['1298'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7943' => [
            'name' => 'ITRF90 to ETRF2000 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent_code' => ['1298'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7944' => [
            'name' => 'ITRF91 to ETRF2000 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent_code' => ['1298'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7945' => [
            'name' => 'ITRF92 to ETRF2000 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent_code' => ['1298'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7946' => [
            'name' => 'ITRF93 to ETRF2000 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent_code' => ['1298'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7947' => [
            'name' => 'ITRF94 to ETRF2000 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent_code' => ['1298'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7948' => [
            'name' => 'ITRF96 to ETRF2000 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent_code' => ['1298'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7949' => [
            'name' => 'ITRF97 to ETRF2000 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent_code' => ['1298'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7950' => [
            'name' => 'ITRF2005 to ETRF2000 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent_code' => ['1298'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7951' => [
            'name' => 'ITRF2008 to ETRF2000 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent_code' => ['1298'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7960' => [
            'name' => 'PZ-90.11 to ITRF2008 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1066',
            'extent_code' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7961' => [
            'name' => 'WGS 84 (G1150) to PZ-90.02 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1066',
            'extent_code' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7963' => [
            'name' => 'Poolbeg height (ft(Br36)) to Poolbeg height (m)',
            'method' => 'urn:ogc:def:method:EPSG::1069',
            'extent_code' => ['1305'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7964' => [
            'name' => 'Poolbeg height (m) to Malin Head height (1)',
            'method' => 'urn:ogc:def:method:EPSG::9616',
            'extent_code' => ['1305'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7965' => [
            'name' => 'Poolbeg height (ft(Br36)) to Malin Head height (1)',
            'extent_code' => ['1305'],
            'operations' => [
                [
                    'operation' => 'urn:ogc:def:coordinateOperation:EPSG::7963',
                    'source_crs' => null,
                    'target_crs' => null,
                ],
                [
                    'operation' => 'urn:ogc:def:coordinateOperation:EPSG::7964',
                    'source_crs' => 'urn:ogc:def:crs:EPSG::7962',
                    'target_crs' => 'urn:ogc:def:crs:EPSG::5731',
                ],
            ],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7966' => [
            'name' => 'Poolbeg height (m) to Belfast height (1)',
            'method' => 'urn:ogc:def:method:EPSG::9616',
            'extent_code' => ['1305'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7967' => [
            'name' => 'Poolbeg height (ft(Br36)) to Belfast height (1)',
            'extent_code' => ['1305'],
            'operations' => [
                [
                    'operation' => 'urn:ogc:def:coordinateOperation:EPSG::7963',
                    'source_crs' => null,
                    'target_crs' => null,
                ],
                [
                    'operation' => 'urn:ogc:def:coordinateOperation:EPSG::7966',
                    'source_crs' => 'urn:ogc:def:crs:EPSG::7962',
                    'target_crs' => 'urn:ogc:def:crs:EPSG::5732',
                ],
            ],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7972' => [
            'name' => 'NGVD29 height (ftUS) to NGVD29 height (m)',
            'method' => 'urn:ogc:def:method:EPSG::1069',
            'extent_code' => ['1323'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7977' => [
            'name' => 'HKPD depth to HKCD depth (1)',
            'method' => 'urn:ogc:def:method:EPSG::9616',
            'extent_code' => ['3335'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7980' => [
            'name' => 'KOC CD height to KOC WD height (1)',
            'method' => 'urn:ogc:def:method:EPSG::9616',
            'extent_code' => ['3267'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7981' => [
            'name' => 'Kuwait PWD height to KOC WD height (1)',
            'method' => 'urn:ogc:def:method:EPSG::9616',
            'extent_code' => ['3267'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7982' => [
            'name' => 'HKPD height to HKPD depth',
            'method' => 'urn:ogc:def:method:EPSG::1068',
            'extent_code' => ['3334'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7983' => [
            'name' => 'HKPD height to HKCD depth (1)',
            'extent_code' => ['3335'],
            'operations' => [
                [
                    'operation' => 'urn:ogc:def:coordinateOperation:EPSG::7982',
                    'source_crs' => null,
                    'target_crs' => null,
                ],
                [
                    'operation' => 'urn:ogc:def:coordinateOperation:EPSG::7977',
                    'source_crs' => 'urn:ogc:def:crs:EPSG::7976',
                    'target_crs' => 'urn:ogc:def:crs:EPSG::5739',
                ],
            ],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7984' => [
            'name' => 'KOC WD height to KOC WD depth',
            'method' => 'urn:ogc:def:method:EPSG::1068',
            'extent_code' => ['3267'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7985' => [
            'name' => 'KOC WD depth to KOC WD depth (ft)',
            'method' => 'urn:ogc:def:method:EPSG::1069',
            'extent_code' => ['3267'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7986' => [
            'name' => 'KOC CD height to KOC WD depth (1)',
            'extent_code' => ['3267'],
            'operations' => [
                [
                    'operation' => 'urn:ogc:def:coordinateOperation:EPSG::7980',
                    'source_crs' => 'urn:ogc:def:crs:EPSG::5790',
                    'target_crs' => 'urn:ogc:def:crs:EPSG::7979',
                ],
                [
                    'operation' => 'urn:ogc:def:coordinateOperation:EPSG::7984',
                    'source_crs' => null,
                    'target_crs' => null,
                ],
            ],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7987' => [
            'name' => 'KOC CD height to KOC WD depth (ft) (1)',
            'extent_code' => ['3267'],
            'operations' => [
                [
                    'operation' => 'urn:ogc:def:coordinateOperation:EPSG::7980',
                    'source_crs' => 'urn:ogc:def:crs:EPSG::5790',
                    'target_crs' => 'urn:ogc:def:crs:EPSG::7979',
                ],
                [
                    'operation' => 'urn:ogc:def:coordinateOperation:EPSG::7984',
                    'source_crs' => null,
                    'target_crs' => null,
                ],
                [
                    'operation' => 'urn:ogc:def:coordinateOperation:EPSG::7985',
                    'source_crs' => null,
                    'target_crs' => null,
                ],
            ],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7993' => [
            'name' => 'Albany Grid 2020',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4439'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7994' => [
            'name' => 'Barrow Island Grid 2020',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4438'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7995' => [
            'name' => 'Broome Grid 2020',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4441'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7996' => [
            'name' => 'Busselton Coastal Grid',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4437'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7997' => [
            'name' => 'Carnarvon Grid 2020',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4442'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7998' => [
            'name' => 'Christmas Island Grid 2020',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4169'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::7999' => [
            'name' => 'Cocos Island Grid 2020',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1069'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8000' => [
            'name' => 'Collie Grid 2020',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4443'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8001' => [
            'name' => 'Esperance Grid 2020',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4445'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8002' => [
            'name' => 'Exmouth Grid 2020',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4448'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8003' => [
            'name' => 'Geraldton Coastal Grid',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4449'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8004' => [
            'name' => 'Goldfields Grid 2020',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4436'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8005' => [
            'name' => 'Jurien Coastal Grid',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4440'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8006' => [
            'name' => 'Kalbarri Grid 2020',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4444'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8007' => [
            'name' => 'Karratha Grid 2020',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4451'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8008' => [
            'name' => 'Kununurra Grid 2020',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4452'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8009' => [
            'name' => 'Lancelin Coastal Grid',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4453'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8010' => [
            'name' => 'Margaret River Coastal Grid',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4457'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8011' => [
            'name' => 'Perth Coastal Grid',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4462'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8012' => [
            'name' => 'Port Hedland Grid 2020',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4466'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8033' => [
            'name' => 'TM Zone 20N (US survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4467'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8034' => [
            'name' => 'TM Zone 21N (US survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4468'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8040' => [
            'name' => 'Gusterberg Grid',
            'method' => 'urn:ogc:def:method:EPSG::9806',
            'extent_code' => ['4455'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8041' => [
            'name' => 'St. Stephen Grid',
            'method' => 'urn:ogc:def:method:EPSG::9806',
            'extent_code' => ['4456'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8047' => [
            'name' => 'ED50 to WGS 84 (15)',
            'extent_code' => ['2332'],
            'operations' => [
                [
                    'operation' => 'urn:ogc:def:coordinateOperation:EPSG::1147',
                    'source_crs' => 'urn:ogc:def:crs:EPSG::4230',
                    'target_crs' => 'urn:ogc:def:crs:EPSG::4231',
                ],
                [
                    'operation' => 'urn:ogc:def:coordinateOperation:EPSG::1146',
                    'source_crs' => 'urn:ogc:def:crs:EPSG::4231',
                    'target_crs' => 'urn:ogc:def:crs:EPSG::4326',
                ],
            ],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8048' => [
            'name' => 'GDA94 to GDA2020 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['4177'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8049' => [
            'name' => 'ITRF2014 to GDA2020 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1056',
            'extent_code' => ['4177'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8061' => [
            'name' => 'Pima County zone 1 East (ft)',
            'method' => 'urn:ogc:def:method:EPSG::9815',
            'extent_code' => ['4472'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8062' => [
            'name' => 'Pima County zone 2 Central (ft)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4460'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8063' => [
            'name' => 'Pima County zone 3 West (ft)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4450'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8064' => [
            'name' => 'Pima County zone 4 Mt. Lemmon (ft)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['4473'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8069' => [
            'name' => 'ITRF88 to ITRF2014 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent_code' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8070' => [
            'name' => 'ITRF89 to ITRF2014 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent_code' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8071' => [
            'name' => 'ITRF90 to ITRF2014 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent_code' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8072' => [
            'name' => 'ITRF91 to ITRF2014 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent_code' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8073' => [
            'name' => 'ITRF92 to ITRF2014 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent_code' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8074' => [
            'name' => 'ITRF93 to ITRF2014 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent_code' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8075' => [
            'name' => 'ITRF94 to ITRF2014 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent_code' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8076' => [
            'name' => 'ITRF96 to ITRF2014 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent_code' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8077' => [
            'name' => 'ITRF97 to ITRF2014 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent_code' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8078' => [
            'name' => 'ITRF2000 to ITRF2014 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent_code' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8079' => [
            'name' => 'ITRF2005 to ITRF2014 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent_code' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8080' => [
            'name' => 'MTM Nova Scotia zone 4 v2',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1534'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8081' => [
            'name' => 'MTM Nova Scotia zone 5 v2',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1535'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8087' => [
            'name' => 'Iceland Lambert 2016',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['1120'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8094' => [
            'name' => 'NTF (Paris) to WGS 84 (1)',
            'extent_code' => ['3694'],
            'operations' => [
                [
                    'operation' => 'urn:ogc:def:coordinateOperation:EPSG::1763',
                    'source_crs' => 'urn:ogc:def:crs:EPSG::4807',
                    'target_crs' => 'urn:ogc:def:crs:EPSG::4275',
                ],
                [
                    'operation' => 'urn:ogc:def:coordinateOperation:EPSG::1193',
                    'source_crs' => 'urn:ogc:def:crs:EPSG::4275',
                    'target_crs' => 'urn:ogc:def:crs:EPSG::4326',
                ],
            ],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8174' => [
            'name' => 'Bogota 1975 (Bogota) to WGS 84 (1)',
            'extent_code' => ['3229'],
            'operations' => [
                [
                    'operation' => 'urn:ogc:def:coordinateOperation:EPSG::1755',
                    'source_crs' => 'urn:ogc:def:crs:EPSG::4802',
                    'target_crs' => 'urn:ogc:def:crs:EPSG::4218',
                ],
                [
                    'operation' => 'urn:ogc:def:coordinateOperation:EPSG::1125',
                    'source_crs' => 'urn:ogc:def:crs:EPSG::4218',
                    'target_crs' => 'urn:ogc:def:crs:EPSG::4326',
                ],
            ],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8175' => [
            'name' => 'Monte Mario (Rome) to WGS 84 (1)',
            'extent_code' => ['2339'],
            'operations' => [
                [
                    'operation' => 'urn:ogc:def:coordinateOperation:EPSG::1262',
                    'source_crs' => 'urn:ogc:def:crs:EPSG::4806',
                    'target_crs' => 'urn:ogc:def:crs:EPSG::4265',
                ],
                [
                    'operation' => 'urn:ogc:def:coordinateOperation:EPSG::1169',
                    'source_crs' => 'urn:ogc:def:crs:EPSG::4265',
                    'target_crs' => 'urn:ogc:def:crs:EPSG::4326',
                ],
            ],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8176' => [
            'name' => 'Tananarive (Paris) to WGS 84 (1)',
            'extent_code' => ['3273'],
            'operations' => [
                [
                    'operation' => 'urn:ogc:def:coordinateOperation:EPSG::1265',
                    'source_crs' => 'urn:ogc:def:crs:EPSG::4810',
                    'target_crs' => 'urn:ogc:def:crs:EPSG::4297',
                ],
                [
                    'operation' => 'urn:ogc:def:coordinateOperation:EPSG::1227',
                    'source_crs' => 'urn:ogc:def:crs:EPSG::4297',
                    'target_crs' => 'urn:ogc:def:crs:EPSG::4326',
                ],
            ],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8178' => [
            'name' => 'Batavia (Jakarta) to WGS 84 (1)',
            'extent_code' => ['1285'],
            'operations' => [
                [
                    'operation' => 'urn:ogc:def:coordinateOperation:EPSG::1759',
                    'source_crs' => 'urn:ogc:def:crs:EPSG::4813',
                    'target_crs' => 'urn:ogc:def:crs:EPSG::4211',
                ],
                [
                    'operation' => 'urn:ogc:def:coordinateOperation:EPSG::8452',
                    'source_crs' => 'urn:ogc:def:crs:EPSG::4211',
                    'target_crs' => 'urn:ogc:def:crs:EPSG::4326',
                ],
            ],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8186' => [
            'name' => 'NTF (Paris) to ED50 (1)',
            'extent_code' => ['3694'],
            'operations' => [
                [
                    'operation' => 'urn:ogc:def:coordinateOperation:EPSG::1763',
                    'source_crs' => 'urn:ogc:def:crs:EPSG::4807',
                    'target_crs' => 'urn:ogc:def:crs:EPSG::4275',
                ],
                [
                    'operation' => 'urn:ogc:def:coordinateOperation:EPSG::1276',
                    'source_crs' => 'urn:ogc:def:crs:EPSG::4275',
                    'target_crs' => 'urn:ogc:def:crs:EPSG::4230',
                ],
            ],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8188' => [
            'name' => 'NTF (Paris) to WGS 72 (1)',
            'extent_code' => ['3694'],
            'operations' => [
                [
                    'operation' => 'urn:ogc:def:coordinateOperation:EPSG::1763',
                    'source_crs' => 'urn:ogc:def:crs:EPSG::4807',
                    'target_crs' => 'urn:ogc:def:crs:EPSG::4275',
                ],
                [
                    'operation' => 'urn:ogc:def:coordinateOperation:EPSG::1277',
                    'source_crs' => 'urn:ogc:def:crs:EPSG::4275',
                    'target_crs' => 'urn:ogc:def:crs:EPSG::4322',
                ],
            ],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8211' => [
            'name' => 'Voirol 1875 (Paris) to WGS 84 (1)',
            'extent_code' => ['1365'],
            'operations' => [
                [
                    'operation' => 'urn:ogc:def:coordinateOperation:EPSG::1266',
                    'source_crs' => 'urn:ogc:def:crs:EPSG::4811',
                    'target_crs' => 'urn:ogc:def:crs:EPSG::4304',
                ],
                [
                    'operation' => 'urn:ogc:def:coordinateOperation:EPSG::1294',
                    'source_crs' => 'urn:ogc:def:crs:EPSG::4304',
                    'target_crs' => 'urn:ogc:def:crs:EPSG::4326',
                ],
            ],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8241' => [
            'name' => 'Madrid 1870 (Madrid) to WGS 84 (1)',
            'extent_code' => ['2366'],
            'operations' => [
                [
                    'operation' => 'urn:ogc:def:coordinateOperation:EPSG::1026',
                    'source_crs' => 'urn:ogc:def:crs:EPSG::4903',
                    'target_crs' => 'urn:ogc:def:crs:EPSG::4230',
                ],
                [
                    'operation' => 'urn:ogc:def:coordinateOperation:EPSG::1145',
                    'source_crs' => 'urn:ogc:def:crs:EPSG::4230',
                    'target_crs' => 'urn:ogc:def:crs:EPSG::4326',
                ],
            ],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8256' => [
            'name' => 'ITRF92 to NAD83(CSRS96) (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent_code' => ['1061'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8257' => [
            'name' => 'ITRF93 to NAD83(CSRS96) (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent_code' => ['1061'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8258' => [
            'name' => 'ITRF94 to NAD83(CSRS96) (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent_code' => ['1061'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8259' => [
            'name' => 'ITRF96 to NAD83(CSRS)v2 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent_code' => ['1061'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8260' => [
            'name' => 'ITRF97 to NAD83(CSRS)v3 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent_code' => ['1061'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8261' => [
            'name' => 'ITRF2000 to NAD83(CSRS)v4 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent_code' => ['1061'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8264' => [
            'name' => 'ITRF2008 to NAD83(CSRS)v6 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent_code' => ['1061'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8265' => [
            'name' => 'ITRF2014 to NAD83(CSRS)v7 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent_code' => ['1061'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8270' => [
            'name' => 'Saint Pierre et Miquelon 1950 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3299'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8273' => [
            'name' => 'Oregon Burns-Harper zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4459'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8274' => [
            'name' => 'Oregon Burns-Harper zone (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4459'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8275' => [
            'name' => 'Oregon Canyon City-Burns zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4465'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8276' => [
            'name' => 'Oregon Canyon City-Burns zone (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4465'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8277' => [
            'name' => 'Oregon Coast Range North zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['4471'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8278' => [
            'name' => 'Oregon Coast Range North zone (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['4471'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8279' => [
            'name' => 'Oregon Dayville-Prairie City zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4474'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8280' => [
            'name' => 'Oregon Dayville-Prairie City zone (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4474'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8281' => [
            'name' => 'Oregon Denio-Burns zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4475'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8282' => [
            'name' => 'Oregon Denio-Burns zone (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4475'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8283' => [
            'name' => 'Oregon Halfway zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['4476'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8284' => [
            'name' => 'Oregon Halfway zone (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['4476'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8285' => [
            'name' => 'Oregon Medford-Diamond Lake zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['4477'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8286' => [
            'name' => 'Oregon Medford-Diamond Lake zone (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['4477'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8287' => [
            'name' => 'Oregon Mitchell zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['4478'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8288' => [
            'name' => 'Oregon Mitchell zone (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['4478'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8289' => [
            'name' => 'Oregon North Central zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['4479'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8290' => [
            'name' => 'Oregon North Central zone (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['4479'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8291' => [
            'name' => 'Oregon Ochoco Summit zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['4481'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8292' => [
            'name' => 'Oregon Ochoco Summit zone (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['4481'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8293' => [
            'name' => 'Oregon Owyhee zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4482'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8294' => [
            'name' => 'Oregon Owyhee zone (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4482'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8295' => [
            'name' => 'Oregon Pilot Rock-Ukiah zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['4483'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8296' => [
            'name' => 'Oregon Pilot Rock-Ukiah zone (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['4483'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8297' => [
            'name' => 'Oregon Prairie City-Brogan zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['4484'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8298' => [
            'name' => 'Oregon Prairie City-Brogan zone (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['4484'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8299' => [
            'name' => 'Oregon Riley-Lakeview zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4458'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8300' => [
            'name' => 'Oregon Riley-Lakeview zone (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4458'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8301' => [
            'name' => 'Oregon Siskiyou Pass zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['4463'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8302' => [
            'name' => 'Oregon Siskiyou Pass zone (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['4463'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8303' => [
            'name' => 'Oregon Ukiah-Fox zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['4470'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8304' => [
            'name' => 'Oregon Ukiah-Fox zone (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['4470'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8305' => [
            'name' => 'Oregon Wallowa zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4480'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8306' => [
            'name' => 'Oregon Wallowa zone (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4480'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8307' => [
            'name' => 'Oregon Warner Highway zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['4486'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8308' => [
            'name' => 'Oregon Warner Highway zone (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['4486'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8309' => [
            'name' => 'Oregon Willamette Pass zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4488'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8310' => [
            'name' => 'Oregon Willamette Pass zone (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4488'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8365' => [
            'name' => 'ETRS89 to S-JTSK [JTSK03] (1)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['1211'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8366' => [
            'name' => 'ITRF2014 to ETRF2014 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent_code' => ['1298'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8367' => [
            'name' => 'S-JTSK [JTSK03] to ETRS89 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['1211'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8368' => [
            'name' => 'S-JTSK [JTSK03] to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['1211'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8373' => [
            'name' => 'NCRS Las Vegas zone (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4485'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8374' => [
            'name' => 'NCRS Las Vegas zone (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4485'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8375' => [
            'name' => 'NCRS Las Vegas high elevation zone (m)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4487'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8376' => [
            'name' => 'NCRS Las Vegas high elevation zone (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4487'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8389' => [
            'name' => 'WEIPA94',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4491'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8405' => [
            'name' => 'ITRF2014 to ETRF2000 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent_code' => ['1298'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8432' => [
            'name' => 'Macau Grid',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1147'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8435' => [
            'name' => 'Macao 2008 to Macao 1920 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9636',
            'extent_code' => ['1147'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8436' => [
            'name' => 'Macao 2008 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1147'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8437' => [
            'name' => 'Hong Kong 1980 to Hong Kong Geodetic CS (1)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['1118'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8438' => [
            'name' => 'Macao 1920 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9636',
            'extent_code' => ['1147'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8439' => [
            'name' => 'Hong Kong Geodetic CS to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1118'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8440' => [
            'name' => 'Laborde Grid (Greenwich)',
            'method' => 'urn:ogc:def:method:EPSG::9813',
            'extent_code' => ['1149'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8448' => [
            'name' => 'GDA2020 to WGS 84 (G1762) (1)',
            'method' => 'urn:ogc:def:method:EPSG::1056',
            'extent_code' => ['4177'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8450' => [
            'name' => 'GDA2020 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['4177'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8452' => [
            'name' => 'Batavia to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1285'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8458' => [
            'name' => 'Kansas regional zone 1 Goodland (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4495'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8459' => [
            'name' => 'Kansas regional zone 2 Colby (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4496'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8490' => [
            'name' => 'Kansas regional zone 3 Oberlin (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4497'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8491' => [
            'name' => 'Kansas regional zone 4 Hays (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4494'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8492' => [
            'name' => 'Kansas regional zone 5 Great Bend (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4498'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8493' => [
            'name' => 'Kansas regional zone 6 Beliot (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4499'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8494' => [
            'name' => 'Kansas regional zone 7 Salina (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4500'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8495' => [
            'name' => 'Kansas regional zone 8 Manhattan (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['4501'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8498' => [
            'name' => 'Kansas regional zone 9 Emporia (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['4502'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8499' => [
            'name' => 'Kansas regional zone 10 Atchison (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['4503'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8500' => [
            'name' => 'Kansas regional zone 11 Kansas City (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['4504'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8501' => [
            'name' => 'Kansas regional zone 12 Ulysses (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4505'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8502' => [
            'name' => 'Kansas regional zone 13 Garden City (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4506'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8503' => [
            'name' => 'Kansas regional zone 14 Dodge City (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4507'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8504' => [
            'name' => 'Kansas regional zone 15 Larned (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4508'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8505' => [
            'name' => 'Kansas regional zone 16 Pratt (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4509'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8506' => [
            'name' => 'Kansas regional zone 17 Wichita (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['4510'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8507' => [
            'name' => 'Kansas regional zone 18 Arkansas City (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['4511'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8515' => [
            'name' => 'Kansas regional zone 19 Coffeyville (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4512'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8516' => [
            'name' => 'Kansas regional zone 20 Pittsburg (ftUS)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4513'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8517' => [
            'name' => 'Chos Malal 1914 to WGS 84 (1)',
            'extent_code' => ['2325'],
            'operations' => [
                [
                    'operation' => 'urn:ogc:def:coordinateOperation:EPSG::1528',
                    'source_crs' => 'urn:ogc:def:crs:EPSG::4160',
                    'target_crs' => 'urn:ogc:def:crs:EPSG::4221',
                ],
                [
                    'operation' => 'urn:ogc:def:coordinateOperation:EPSG::1527',
                    'source_crs' => 'urn:ogc:def:crs:EPSG::4221',
                    'target_crs' => 'urn:ogc:def:crs:EPSG::4326',
                ],
            ],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8532' => [
            'name' => 'Indian 1960 to WGS 84 (1)',
            'extent_code' => ['1495'],
            'operations' => [
                [
                    'operation' => 'urn:ogc:def:coordinateOperation:EPSG::1541',
                    'source_crs' => 'urn:ogc:def:crs:EPSG::4131',
                    'target_crs' => 'urn:ogc:def:crs:EPSG::4324',
                ],
                [
                    'operation' => 'urn:ogc:def:coordinateOperation:EPSG::1240',
                    'source_crs' => 'urn:ogc:def:crs:EPSG::4324',
                    'target_crs' => 'urn:ogc:def:crs:EPSG::4326',
                ],
            ],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8537' => [
            'name' => 'Egypt 1907 to WGS 84 (2)',
            'extent_code' => ['1086'],
            'operations' => [
                [
                    'operation' => 'urn:ogc:def:coordinateOperation:EPSG::1545',
                    'source_crs' => 'urn:ogc:def:crs:EPSG::4229',
                    'target_crs' => 'urn:ogc:def:crs:EPSG::4322',
                ],
                [
                    'operation' => 'urn:ogc:def:coordinateOperation:EPSG::1237',
                    'source_crs' => 'urn:ogc:def:crs:EPSG::4322',
                    'target_crs' => 'urn:ogc:def:crs:EPSG::4326',
                ],
            ],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8562' => [
            'name' => 'Nord Sahara 1959 to WGS 84 (3)',
            'extent_code' => ['2393'],
            'operations' => [
                [
                    'operation' => 'urn:ogc:def:coordinateOperation:EPSG::1560',
                    'source_crs' => 'urn:ogc:def:crs:EPSG::4307',
                    'target_crs' => 'urn:ogc:def:crs:EPSG::4324',
                ],
                [
                    'operation' => 'urn:ogc:def:coordinateOperation:EPSG::1240',
                    'source_crs' => 'urn:ogc:def:crs:EPSG::4324',
                    'target_crs' => 'urn:ogc:def:crs:EPSG::4326',
                ],
            ],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8568' => [
            'name' => 'Deir ez Zor to WGS 84 (1)',
            'extent_code' => ['2329'],
            'operations' => [
                [
                    'operation' => 'urn:ogc:def:coordinateOperation:EPSG::1584',
                    'source_crs' => 'urn:ogc:def:crs:EPSG::4227',
                    'target_crs' => 'urn:ogc:def:crs:EPSG::4324',
                ],
                [
                    'operation' => 'urn:ogc:def:coordinateOperation:EPSG::1240',
                    'source_crs' => 'urn:ogc:def:crs:EPSG::4324',
                    'target_crs' => 'urn:ogc:def:crs:EPSG::4326',
                ],
            ],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8569' => [
            'name' => 'ED50 to WGS 84 (21)',
            'extent_code' => ['2332'],
            'operations' => [
                [
                    'operation' => 'urn:ogc:def:coordinateOperation:EPSG::1588',
                    'source_crs' => 'urn:ogc:def:crs:EPSG::4230',
                    'target_crs' => 'urn:ogc:def:crs:EPSG::4258',
                ],
                [
                    'operation' => 'urn:ogc:def:coordinateOperation:EPSG::1149',
                    'source_crs' => 'urn:ogc:def:crs:EPSG::4258',
                    'target_crs' => 'urn:ogc:def:crs:EPSG::4326',
                ],
            ],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8571' => [
            'name' => 'Accra to WGS 84 (2)',
            'extent_code' => ['1505'],
            'operations' => [
                [
                    'operation' => 'urn:ogc:def:coordinateOperation:EPSG::1570',
                    'source_crs' => 'urn:ogc:def:crs:EPSG::4168',
                    'target_crs' => 'urn:ogc:def:crs:EPSG::4324',
                ],
                [
                    'operation' => 'urn:ogc:def:coordinateOperation:EPSG::1240',
                    'source_crs' => 'urn:ogc:def:crs:EPSG::4324',
                    'target_crs' => 'urn:ogc:def:crs:EPSG::4326',
                ],
            ],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8581' => [
            'name' => 'PSD93 to WGS 84 (2)',
            'extent_code' => ['3288'],
            'operations' => [
                [
                    'operation' => 'urn:ogc:def:coordinateOperation:EPSG::1616',
                    'source_crs' => 'urn:ogc:def:crs:EPSG::4134',
                    'target_crs' => 'urn:ogc:def:crs:EPSG::4322',
                ],
                [
                    'operation' => 'urn:ogc:def:coordinateOperation:EPSG::1237',
                    'source_crs' => 'urn:ogc:def:crs:EPSG::4322',
                    'target_crs' => 'urn:ogc:def:crs:EPSG::4326',
                ],
            ],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8631' => [
            'name' => 'Garoua to WGS 84 (1)',
            'extent_code' => ['2590'],
            'operations' => [
                [
                    'operation' => 'urn:ogc:def:coordinateOperation:EPSG::1805',
                    'source_crs' => 'urn:ogc:def:crs:EPSG::4197',
                    'target_crs' => 'urn:ogc:def:crs:EPSG::4324',
                ],
                [
                    'operation' => 'urn:ogc:def:coordinateOperation:EPSG::1240',
                    'source_crs' => 'urn:ogc:def:crs:EPSG::4324',
                    'target_crs' => 'urn:ogc:def:crs:EPSG::4326',
                ],
            ],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8632' => [
            'name' => 'Kousseri to WGS 84 (1)',
            'extent_code' => ['2591'],
            'operations' => [
                [
                    'operation' => 'urn:ogc:def:coordinateOperation:EPSG::1806',
                    'source_crs' => 'urn:ogc:def:crs:EPSG::4198',
                    'target_crs' => 'urn:ogc:def:crs:EPSG::4324',
                ],
                [
                    'operation' => 'urn:ogc:def:coordinateOperation:EPSG::1240',
                    'source_crs' => 'urn:ogc:def:crs:EPSG::4324',
                    'target_crs' => 'urn:ogc:def:crs:EPSG::4326',
                ],
            ],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8633' => [
            'name' => 'Yoff to WGS 84 (1)',
            'extent_code' => ['1207'],
            'operations' => [
                [
                    'operation' => 'urn:ogc:def:coordinateOperation:EPSG::1828',
                    'source_crs' => 'urn:ogc:def:crs:EPSG::4310',
                    'target_crs' => 'urn:ogc:def:crs:EPSG::4322',
                ],
                [
                    'operation' => 'urn:ogc:def:coordinateOperation:EPSG::1238',
                    'source_crs' => 'urn:ogc:def:crs:EPSG::4322',
                    'target_crs' => 'urn:ogc:def:crs:EPSG::4326',
                ],
            ],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8634' => [
            'name' => 'Beduaram to WGS 84 (1)',
            'extent_code' => ['2771'],
            'operations' => [
                [
                    'operation' => 'urn:ogc:def:coordinateOperation:EPSG::1839',
                    'source_crs' => 'urn:ogc:def:crs:EPSG::4213',
                    'target_crs' => 'urn:ogc:def:crs:EPSG::4324',
                ],
                [
                    'operation' => 'urn:ogc:def:coordinateOperation:EPSG::1240',
                    'source_crs' => 'urn:ogc:def:crs:EPSG::4324',
                    'target_crs' => 'urn:ogc:def:crs:EPSG::4326',
                ],
            ],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8636' => [
            'name' => 'Carthage (Paris) to WGS 84 (1)',
            'extent_code' => ['1618'],
            'operations' => [
                [
                    'operation' => 'urn:ogc:def:coordinateOperation:EPSG::1881',
                    'source_crs' => 'urn:ogc:def:crs:EPSG::4816',
                    'target_crs' => 'urn:ogc:def:crs:EPSG::4223',
                ],
                [
                    'operation' => 'urn:ogc:def:coordinateOperation:EPSG::1130',
                    'source_crs' => 'urn:ogc:def:crs:EPSG::4223',
                    'target_crs' => 'urn:ogc:def:crs:EPSG::4326',
                ],
            ],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8638' => [
            'name' => 'Makassar (Jakarta) to WGS 84 (1)',
            'extent_code' => ['1316'],
            'operations' => [
                [
                    'operation' => 'urn:ogc:def:coordinateOperation:EPSG::1260',
                    'source_crs' => 'urn:ogc:def:crs:EPSG::4804',
                    'target_crs' => 'urn:ogc:def:crs:EPSG::4257',
                ],
                [
                    'operation' => 'urn:ogc:def:coordinateOperation:EPSG::1837',
                    'source_crs' => 'urn:ogc:def:crs:EPSG::4257',
                    'target_crs' => 'urn:ogc:def:crs:EPSG::4326',
                ],
            ],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8639' => [
            'name' => 'NGO 1948 (Oslo) to WGS 84 (1)',
            'extent_code' => ['1352'],
            'operations' => [
                [
                    'operation' => 'urn:ogc:def:coordinateOperation:EPSG::1762',
                    'source_crs' => 'urn:ogc:def:crs:EPSG::4817',
                    'target_crs' => 'urn:ogc:def:crs:EPSG::4273',
                ],
                [
                    'operation' => 'urn:ogc:def:coordinateOperation:EPSG::1654',
                    'source_crs' => 'urn:ogc:def:crs:EPSG::4273',
                    'target_crs' => 'urn:ogc:def:crs:EPSG::4326',
                ],
            ],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8641' => [
            'name' => 'Segara (Jakarta) to WGS 84 (1)',
            'extent_code' => ['1360'],
            'operations' => [
                [
                    'operation' => 'urn:ogc:def:coordinateOperation:EPSG::1883',
                    'source_crs' => 'urn:ogc:def:crs:EPSG::4820',
                    'target_crs' => 'urn:ogc:def:crs:EPSG::4613',
                ],
                [
                    'operation' => 'urn:ogc:def:coordinateOperation:EPSG::1897',
                    'source_crs' => 'urn:ogc:def:crs:EPSG::4613',
                    'target_crs' => 'urn:ogc:def:crs:EPSG::4326',
                ],
            ],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8642' => [
            'name' => 'S-JTSK (Ferro) to WGS 84 (1)',
            'extent_code' => ['1079'],
            'operations' => [
                [
                    'operation' => 'urn:ogc:def:coordinateOperation:EPSG::1884',
                    'source_crs' => 'urn:ogc:def:crs:EPSG::4818',
                    'target_crs' => 'urn:ogc:def:crs:EPSG::4156',
                ],
                [
                    'operation' => 'urn:ogc:def:coordinateOperation:EPSG::1623',
                    'source_crs' => 'urn:ogc:def:crs:EPSG::4156',
                    'target_crs' => 'urn:ogc:def:crs:EPSG::4326',
                ],
            ],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8643' => [
            'name' => 'Greek to WGS 84 (1)',
            'extent_code' => ['3254'],
            'operations' => [
                [
                    'operation' => 'urn:ogc:def:coordinateOperation:EPSG::1891',
                    'source_crs' => 'urn:ogc:def:crs:EPSG::4120',
                    'target_crs' => 'urn:ogc:def:crs:EPSG::4121',
                ],
                [
                    'operation' => 'urn:ogc:def:coordinateOperation:EPSG::1272',
                    'source_crs' => 'urn:ogc:def:crs:EPSG::4121',
                    'target_crs' => 'urn:ogc:def:crs:EPSG::4326',
                ],
            ],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8644' => [
            'name' => 'Greek (Athens) to WGS 84 (1)',
            'extent_code' => ['3254'],
            'operations' => [
                [
                    'operation' => 'urn:ogc:def:coordinateOperation:EPSG::1761',
                    'source_crs' => 'urn:ogc:def:crs:EPSG::4815',
                    'target_crs' => 'urn:ogc:def:crs:EPSG::4120',
                ],
                [
                    'operation' => 'urn:ogc:def:coordinateOperation:EPSG::1891',
                    'source_crs' => 'urn:ogc:def:crs:EPSG::4120',
                    'target_crs' => 'urn:ogc:def:crs:EPSG::4121',
                ],
                [
                    'operation' => 'urn:ogc:def:coordinateOperation:EPSG::1272',
                    'source_crs' => 'urn:ogc:def:crs:EPSG::4121',
                    'target_crs' => 'urn:ogc:def:crs:EPSG::4326',
                ],
            ],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8648' => [
            'name' => 'Lisbon 1890 (Lisbon) to WGS 84 (1)',
            'extent_code' => ['1294'],
            'operations' => [
                [
                    'operation' => 'urn:ogc:def:coordinateOperation:EPSG::1991',
                    'source_crs' => 'urn:ogc:def:crs:EPSG::4904',
                    'target_crs' => 'urn:ogc:def:crs:EPSG::4666',
                ],
                [
                    'operation' => 'urn:ogc:def:coordinateOperation:EPSG::1986',
                    'source_crs' => 'urn:ogc:def:crs:EPSG::4666',
                    'target_crs' => 'urn:ogc:def:crs:EPSG::4326',
                ],
            ],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8649' => [
            'name' => 'Lisbon 1890 (Lisbon) to WGS 84 (2)',
            'extent_code' => ['1294'],
            'operations' => [
                [
                    'operation' => 'urn:ogc:def:coordinateOperation:EPSG::1991',
                    'source_crs' => 'urn:ogc:def:crs:EPSG::4904',
                    'target_crs' => 'urn:ogc:def:crs:EPSG::4666',
                ],
                [
                    'operation' => 'urn:ogc:def:coordinateOperation:EPSG::1990',
                    'source_crs' => 'urn:ogc:def:crs:EPSG::4666',
                    'target_crs' => 'urn:ogc:def:crs:EPSG::4326',
                ],
            ],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8650' => [
            'name' => 'Palestine 1923 to WGS 84 (2)',
            'extent_code' => ['2603'],
            'operations' => [
                [
                    'operation' => 'urn:ogc:def:coordinateOperation:EPSG::1071',
                    'source_crs' => 'urn:ogc:def:crs:EPSG::4281',
                    'target_crs' => 'urn:ogc:def:crs:EPSG::4141',
                ],
                [
                    'operation' => 'urn:ogc:def:coordinateOperation:EPSG::1073',
                    'source_crs' => 'urn:ogc:def:crs:EPSG::4141',
                    'target_crs' => 'urn:ogc:def:crs:EPSG::4326',
                ],
            ],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8651' => [
            'name' => 'Vientiane 1982 to WGS 84 (1)',
            'extent_code' => ['1138'],
            'operations' => [
                [
                    'operation' => 'urn:ogc:def:coordinateOperation:EPSG::1063',
                    'source_crs' => 'urn:ogc:def:crs:EPSG::4676',
                    'target_crs' => 'urn:ogc:def:crs:EPSG::4678',
                ],
                [
                    'operation' => 'urn:ogc:def:coordinateOperation:EPSG::1065',
                    'source_crs' => 'urn:ogc:def:crs:EPSG::4678',
                    'target_crs' => 'urn:ogc:def:crs:EPSG::4326',
                ],
            ],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8652' => [
            'name' => 'Lao 1993 to WGS 84 (1)',
            'extent_code' => ['1138'],
            'operations' => [
                [
                    'operation' => 'urn:ogc:def:coordinateOperation:EPSG::1064',
                    'source_crs' => 'urn:ogc:def:crs:EPSG::4677',
                    'target_crs' => 'urn:ogc:def:crs:EPSG::4678',
                ],
                [
                    'operation' => 'urn:ogc:def:coordinateOperation:EPSG::1065',
                    'source_crs' => 'urn:ogc:def:crs:EPSG::4678',
                    'target_crs' => 'urn:ogc:def:crs:EPSG::4326',
                ],
            ],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8653' => [
            'name' => 'ED50 to WGS 84 (14)',
            'extent_code' => ['2330'],
            'operations' => [
                [
                    'operation' => 'urn:ogc:def:coordinateOperation:EPSG::15753',
                    'source_crs' => 'urn:ogc:def:crs:EPSG::4230',
                    'target_crs' => 'urn:ogc:def:crs:EPSG::4231',
                ],
                [
                    'operation' => 'urn:ogc:def:coordinateOperation:EPSG::1146',
                    'source_crs' => 'urn:ogc:def:crs:EPSG::4231',
                    'target_crs' => 'urn:ogc:def:crs:EPSG::4326',
                ],
            ],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8654' => [
            'name' => 'ED50 to ETRS89 (2)',
            'extent_code' => ['2330'],
            'operations' => [
                [
                    'operation' => 'urn:ogc:def:coordinateOperation:EPSG::15753',
                    'source_crs' => 'urn:ogc:def:crs:EPSG::4230',
                    'target_crs' => 'urn:ogc:def:crs:EPSG::4231',
                ],
                [
                    'operation' => 'urn:ogc:def:coordinateOperation:EPSG::1146',
                    'source_crs' => 'urn:ogc:def:crs:EPSG::4231',
                    'target_crs' => 'urn:ogc:def:crs:EPSG::4326',
                ],
                [
                    'operation' => 'urn:ogc:def:coordinateOperation:EPSG::1149',
                    'source_crs' => 'urn:ogc:def:crs:EPSG::4258',
                    'target_crs' => 'urn:ogc:def:crs:EPSG::4326',
                ],
            ],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8655' => [
            'name' => 'Manoca 1962 to WGS 84 (2)',
            'extent_code' => ['2555'],
            'operations' => [
                [
                    'operation' => 'urn:ogc:def:coordinateOperation:EPSG::1902',
                    'source_crs' => 'urn:ogc:def:crs:EPSG::4193',
                    'target_crs' => 'urn:ogc:def:crs:EPSG::4324',
                ],
                [
                    'operation' => 'urn:ogc:def:coordinateOperation:EPSG::1240',
                    'source_crs' => 'urn:ogc:def:crs:EPSG::4324',
                    'target_crs' => 'urn:ogc:def:crs:EPSG::4326',
                ],
            ],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8656' => [
            'name' => 'Mhast (offshore) to WGS 84 (1)',
            'extent_code' => ['3180'],
            'operations' => [
                [
                    'operation' => 'urn:ogc:def:coordinateOperation:EPSG::15790',
                    'source_crs' => 'urn:ogc:def:crs:EPSG::4705',
                    'target_crs' => 'urn:ogc:def:crs:EPSG::4324',
                ],
                [
                    'operation' => 'urn:ogc:def:coordinateOperation:EPSG::1240',
                    'source_crs' => 'urn:ogc:def:crs:EPSG::4324',
                    'target_crs' => 'urn:ogc:def:crs:EPSG::4326',
                ],
            ],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8657' => [
            'name' => 'Egypt Gulf of Suez S-650 TL to WGS 84 (1)',
            'extent_code' => ['2341'],
            'operations' => [
                [
                    'operation' => 'urn:ogc:def:coordinateOperation:EPSG::15792',
                    'source_crs' => 'urn:ogc:def:crs:EPSG::4706',
                    'target_crs' => 'urn:ogc:def:crs:EPSG::4324',
                ],
                [
                    'operation' => 'urn:ogc:def:coordinateOperation:EPSG::1240',
                    'source_crs' => 'urn:ogc:def:crs:EPSG::4324',
                    'target_crs' => 'urn:ogc:def:crs:EPSG::4326',
                ],
            ],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8659' => [
            'name' => 'Kertau (RSO) to WGS 84 (1)',
            'extent_code' => ['1309'],
            'operations' => [
                [
                    'operation' => 'urn:ogc:def:coordinateOperation:EPSG::15896',
                    'source_crs' => 'urn:ogc:def:crs:EPSG::4751',
                    'target_crs' => 'urn:ogc:def:crs:EPSG::4245',
                ],
                [
                    'operation' => 'urn:ogc:def:coordinateOperation:EPSG::1158',
                    'source_crs' => 'urn:ogc:def:crs:EPSG::4245',
                    'target_crs' => 'urn:ogc:def:crs:EPSG::4326',
                ],
            ],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8674' => [
            'name' => 'La Canoa to PSAD56 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3327'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8680' => [
            'name' => 'MGI 1901 to ETRS89 (7)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['1050'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8688' => [
            'name' => 'MGI 1901 to WGS 84 (12)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['3307'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8689' => [
            'name' => 'MGI 1901 to Slovenia 1996 (12)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['3307'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8695' => [
            'name' => 'Camacupa 1948 to Camacupa 2015 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['2324'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8696' => [
            'name' => 'Camacupa 1948 to Camacupa 2015 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['2322'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8819' => [
            'name' => 'RSAO13 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1029'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8822' => [
            'name' => 'MTRF-2000 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1206'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8823' => [
            'name' => 'MGI 1901 to WGS 84 (13)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['1050'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8824' => [
            'name' => 'Ain el Abd to MTRF-2000 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['3303'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8825' => [
            'name' => 'Idaho Transverse Mercator',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1381'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8827' => [
            'name' => 'Camacupa 2015 to RSAO13 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['1029'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8828' => [
            'name' => 'RGPF to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['1098'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8829' => [
            'name' => 'Tahiti 79 to RGPF (1)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['3124'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8830' => [
            'name' => 'Tahiti 79 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['3124'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8831' => [
            'name' => 'Moorea 87 to RGPF (2)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['3125'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8832' => [
            'name' => 'Moorea 87 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['3125'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8833' => [
            'name' => 'Tahaa 54 to RGPF (1)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['2812'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8834' => [
            'name' => 'Tahaa 54 to WGS 84 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['2812'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8835' => [
            'name' => 'Fatu Iva 72 to RGPF (1)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['3133'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8842' => [
            'name' => 'Fatu Iva 72 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['3133'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8843' => [
            'name' => 'IGN63 Hiva Oa to RGPF (1)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['3131'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8844' => [
            'name' => 'IGN63 Hiva Oa to WGS 84 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['3131'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8845' => [
            'name' => 'IGN63 Hiva Oa to RGPF (2)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['3132'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8846' => [
            'name' => 'IGN63 Hiva Oa to WGS 84 (4)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['3132'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8847' => [
            'name' => 'IGN72 Nuku Hiva to RGPF (1)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['2810'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8848' => [
            'name' => 'IGN72 Nuku Hiva to WGS 84 (5)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['2810'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8849' => [
            'name' => 'IGN72 Nuku Hiva to RGPF (2)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['3127'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8850' => [
            'name' => 'IGN72 Nuku Hiva to WGS 84 (6)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['3127'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8851' => [
            'name' => 'IGN72 Nuku Hiva to RGPF (3)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['3128'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8852' => [
            'name' => 'IGN72 Nuku Hiva to WGS 84 (7)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['3128'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8853' => [
            'name' => 'Maupiti 83 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['3126'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8854' => [
            'name' => 'Equal Earth Greenwich',
            'method' => 'urn:ogc:def:method:EPSG::1078',
            'extent_code' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8855' => [
            'name' => 'Equal Earth Americas',
            'method' => 'urn:ogc:def:method:EPSG::1078',
            'extent_code' => ['4520'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8856' => [
            'name' => 'Equal Earth Asia-Pacific',
            'method' => 'urn:ogc:def:method:EPSG::1078',
            'extent_code' => ['4523'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8869' => [
            'name' => 'ITRF2008 to ETRF2014 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent_code' => ['1298'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8870' => [
            'name' => 'ITRF2005 to ETRF2014 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent_code' => ['1298'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8871' => [
            'name' => 'ITRF2000 to ETRF2014 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent_code' => ['1298'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8872' => [
            'name' => 'ITRF97 to ETRF2014 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent_code' => ['1298'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8873' => [
            'name' => 'ITRF96 to ETRF2014 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent_code' => ['1298'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8874' => [
            'name' => 'ITRF94 to ETRF2014 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent_code' => ['1298'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8875' => [
            'name' => 'ITRF93 to ETRF2014 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent_code' => ['1298'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8876' => [
            'name' => 'ITRF92 to ETRF2014 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent_code' => ['1298'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8877' => [
            'name' => 'ITRF91 to ETRF2014 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent_code' => ['1298'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8878' => [
            'name' => 'ITRF90 to ETRF2014 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent_code' => ['1298'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8879' => [
            'name' => 'ITRF89 to ETRF2014 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent_code' => ['1298'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8880' => [
            'name' => 'ITRF2014 to ETRF2014 (2)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent_code' => ['1298'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8882' => [
            'name' => 'Camacupa 2015 to WGS 84 (11)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['1029'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8883' => [
            'name' => 'Camacupa 1948 to RSAO13 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2322'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8884' => [
            'name' => 'Camacupa 1948 to RSAO13 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2324'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8886' => [
            'name' => 'SVY21 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1210'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8887' => [
            'name' => 'GDA2020 to WGS 84 (Transit) (1)',
            'method' => 'urn:ogc:def:method:EPSG::1031',
            'extent_code' => ['4177'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8889' => [
            'name' => 'BGS2005 to ETRS89 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1056'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8890' => [
            'name' => 'BGS2005 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1056'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8891' => [
            'name' => 'LKS92 to ETRS89 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1139'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8892' => [
            'name' => 'LKS94 to ETRS89 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1145'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8893' => [
            'name' => 'SRB_ETRS89 to ETRS89 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['4543'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8894' => [
            'name' => 'SRB_ETRS89 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['4543'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8895' => [
            'name' => 'CHTRF95 to ETRS89 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1286'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8952' => [
            'name' => 'ITRF97 to SIRGAS-CON DGF00P01 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1065',
            'extent_code' => ['4530'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8953' => [
            'name' => 'ITRF2000 to SIRGAS-CON DGF01P01 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1065',
            'extent_code' => ['4530'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8954' => [
            'name' => 'ITRF2000 to SIRGAS-CON DGF01P02 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1065',
            'extent_code' => ['4530'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8955' => [
            'name' => 'ITRF2000 to SIRGAS-CON DGF02P01 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1065',
            'extent_code' => ['4530'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8956' => [
            'name' => 'ITRF2000 to SIRGAS-CON DGF04P01 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1065',
            'extent_code' => ['4530'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8957' => [
            'name' => 'ITRF2000 to SIRGAS-CON DGF05P01 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1065',
            'extent_code' => ['4530'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8958' => [
            'name' => 'ITRF2000 to SIRGAS-CON DGF06P01 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1065',
            'extent_code' => ['4530'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8959' => [
            'name' => 'IGS05 to SIRGAS-CON DGF07P01 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1065',
            'extent_code' => ['4530'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8960' => [
            'name' => 'IGS05 to SIRGAS-CON DGF08P01 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1065',
            'extent_code' => ['4530'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8961' => [
            'name' => 'IGS05 to SIRGAS-CON SIR09P01 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1065',
            'extent_code' => ['4530'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8962' => [
            'name' => 'ITRF2008 to SIRGAS-CON SIR10P01 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1065',
            'extent_code' => ['4530'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8963' => [
            'name' => 'ITRF2008 to SIRGAS-CON SIR11P01 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1065',
            'extent_code' => ['4530'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8964' => [
            'name' => 'IGb08 to SIRGAS-CON SIR13P01 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1065',
            'extent_code' => ['4530'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8965' => [
            'name' => 'IGb08 to SIRGAS-CON SIR14P01 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1065',
            'extent_code' => ['4530'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8966' => [
            'name' => 'IGb08 to SIRGAS-CON SIR15P01 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1065',
            'extent_code' => ['4530'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8967' => [
            'name' => 'IGS14 to SIRGAS-CON SIR17P01 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1065',
            'extent_code' => ['4530'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8968' => [
            'name' => 'CR05 to CR-SIRGAS (1)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['1074'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8969' => [
            'name' => 'CR05 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['1074'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8970' => [
            'name' => 'ITRF2014 to NAD83(2011) (1)',
            'method' => 'urn:ogc:def:method:EPSG::1056',
            'extent_code' => ['1511'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::8971' => [
            'name' => 'NAD83 to NAD83(2011) (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3357'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9020' => [
            'name' => 'ITRF88 to ITRF89 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1033',
            'extent_code' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9021' => [
            'name' => 'ITRF89 to ITRF90 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1033',
            'extent_code' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9022' => [
            'name' => 'ITRF90 to ITRF91 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1033',
            'extent_code' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9023' => [
            'name' => 'ITRF91 to ITRF92 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1033',
            'extent_code' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9024' => [
            'name' => 'ITRF92 to ITRF93 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent_code' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9025' => [
            'name' => 'ITRF93 to ITRF94 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent_code' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9026' => [
            'name' => 'ITRF94 to ITRF96 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1065',
            'extent_code' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9027' => [
            'name' => 'ITRF96 to ITRF97 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1065',
            'extent_code' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9028' => [
            'name' => 'ITRF97 to IGS97 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1065',
            'extent_code' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9029' => [
            'name' => 'ITRF2000 to IGS00 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1065',
            'extent_code' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9030' => [
            'name' => 'ITRF2005 to IGS05 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1065',
            'extent_code' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9031' => [
            'name' => 'ITRF2008 to IGS08 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1065',
            'extent_code' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9032' => [
            'name' => 'ITRF2014 to IGS14 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1065',
            'extent_code' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9033' => [
            'name' => 'IGS97 to IGS00 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent_code' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9034' => [
            'name' => 'IGS00 to IGb00 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1065',
            'extent_code' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9035' => [
            'name' => 'IGb00 to IGS05 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent_code' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9036' => [
            'name' => 'IGS05 to IGS08 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent_code' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9037' => [
            'name' => 'IGS08 to IGb08 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1065',
            'extent_code' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9038' => [
            'name' => 'IGb08 to IGS14 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent_code' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9041' => [
            'name' => 'ISN2004 / LAEA Europe to ETRS89-extended / LAEA Europe (1)',
            'method' => 'urn:ogc:def:method:EPSG::9656',
            'extent_code' => ['1120'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9042' => [
            'name' => 'ISN2004 / LCC Europe to ETRS89-extended / LCC Europe (1)',
            'method' => 'urn:ogc:def:method:EPSG::9656',
            'extent_code' => ['1120'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9043' => [
            'name' => 'ISN2016 / LAEA Europe to ETRS89-extended / LAEA Europe (1)',
            'method' => 'urn:ogc:def:method:EPSG::9656',
            'extent_code' => ['1120'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9044' => [
            'name' => 'ISN2016 / LCC Europe to ETRS89-extended / LCC Europe (1)',
            'method' => 'urn:ogc:def:method:EPSG::9656',
            'extent_code' => ['1120'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9045' => [
            'name' => 'PTRA08 / LAEA Europe to ETRS89-extended / LAEA Europe (1)',
            'method' => 'urn:ogc:def:method:EPSG::9656',
            'extent_code' => ['3670'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9046' => [
            'name' => 'PTRA08 / LCC Europe to ETRS89 / LCC Europe (1)',
            'method' => 'urn:ogc:def:method:EPSG::9656',
            'extent_code' => ['3670'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9047' => [
            'name' => 'REGCAN95 / LAEA Europe to ETRS89-extended / LAEA Europe (1)',
            'method' => 'urn:ogc:def:method:EPSG::9656',
            'extent_code' => ['3199'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9048' => [
            'name' => 'REGCAN95 / LCC Europe to ETRS89-extended / LCC Europe (1)',
            'method' => 'urn:ogc:def:method:EPSG::9656',
            'extent_code' => ['3199'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9049' => [
            'name' => 'TUREF / LAEA Europe to ETRS89-extended / LAEA Europe (1)',
            'method' => 'urn:ogc:def:method:EPSG::9656',
            'extent_code' => ['1237'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9050' => [
            'name' => 'TUREF / LCC Europe to ETRS89-extended / LCC Europe (1)',
            'method' => 'urn:ogc:def:method:EPSG::9656',
            'extent_code' => ['1237'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9051' => [
            'name' => 'ITRF94 to SIRGAS 1995 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1065',
            'extent_code' => ['3448'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9052' => [
            'name' => 'ITRF2000 to SIRGAS 2000 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1065',
            'extent_code' => ['3418'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9058' => [
            'name' => 'Vietnam TM-3 103-00',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4541'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9076' => [
            'name' => 'WGS 84 (G873) to ITRF94 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1032',
            'extent_code' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9077' => [
            'name' => 'ITRF2000 to NAD83(MARP00) (1)',
            'method' => 'urn:ogc:def:method:EPSG::1056',
            'extent_code' => ['4167'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9078' => [
            'name' => 'ITRF2000 to NAD83(PACP00) (1)',
            'method' => 'urn:ogc:def:method:EPSG::1056',
            'extent_code' => ['4162'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9079' => [
            'name' => 'ITRF97 to ITRF96 (2)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent_code' => ['1175'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9080' => [
            'name' => 'ITRF2000 to ITRF96 (2)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent_code' => ['1175'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9081' => [
            'name' => 'ITRF2005 to ITRF96 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent_code' => ['1175'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9082' => [
            'name' => 'ITRF2008 to ITRF96 (2)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent_code' => ['1175'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9083' => [
            'name' => 'ITRF2014 to ITRF96 (2)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent_code' => ['1175'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9126' => [
            'name' => 'NAD83(CSRS)v2 to NAD83(CORS96) (1)',
            'method' => 'urn:ogc:def:method:EPSG::1065',
            'extent_code' => ['4544'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9127' => [
            'name' => 'NAD83(CSRS)v3 to NAD83(CORS96) (1)',
            'method' => 'urn:ogc:def:method:EPSG::1065',
            'extent_code' => ['4544'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9128' => [
            'name' => 'NAD83(CSRS)v4 to NAD83(CORS96) (1)',
            'method' => 'urn:ogc:def:method:EPSG::1065',
            'extent_code' => ['4544'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9129' => [
            'name' => 'NAD83(CSRS)v6 to NAD83(2011) (1)',
            'method' => 'urn:ogc:def:method:EPSG::1065',
            'extent_code' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9142' => [
            'name' => 'MGI 1901 to KOSOVAREF01 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['4542'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9143' => [
            'name' => 'MGI 1901 to WGS 84 (14)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['4542'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9144' => [
            'name' => 'KOSOVAREF01 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['4542'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9145' => [
            'name' => 'WGS 84 (Transit) to ITRF90 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1033',
            'extent_code' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9177' => [
            'name' => 'SIRGAS-Chile 2002 to ITRF2000 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1065',
            'extent_code' => ['1066'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9178' => [
            'name' => 'SIRGAS-Chile 2010 to IGS08 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1065',
            'extent_code' => ['1066'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9179' => [
            'name' => 'SIRGAS-Chile 2013 to IGb08 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1065',
            'extent_code' => ['1066'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9180' => [
            'name' => 'SIRGAS-Chile 2016 to IGb08 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1065',
            'extent_code' => ['1066'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9185' => [
            'name' => 'AGD66 to GDA2020 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['2283'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9186' => [
            'name' => 'ITRF2008 to IG05/12 Intermediate CRS',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['2603'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9189' => [
            'name' => 'WGS 84 to IG05/12 Intermediate CRS',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['2603'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9190' => [
            'name' => 'NIWA Albers',
            'method' => 'urn:ogc:def:method:EPSG::9822',
            'extent_code' => ['3508'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9192' => [
            'name' => 'Vietnam TM-3 104-00',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4538'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9193' => [
            'name' => 'Vietnam TM-3 104-30',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4545'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9194' => [
            'name' => 'Vietnam TM-3 104-45',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4546'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9195' => [
            'name' => 'Vietnam TM-3 105-30',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4548'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9196' => [
            'name' => 'Vietnam TM-3 105-45',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4549'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9197' => [
            'name' => 'Vietnam TM-3 106-00',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4550'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9198' => [
            'name' => 'Vietnam TM-3 106-15',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4552'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9199' => [
            'name' => 'Vietnam TM-3 106-30',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4553'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9200' => [
            'name' => 'Vietnam TM-3 107-00',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4554'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9201' => [
            'name' => 'Vietnam TM-3 107-15',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4556'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9202' => [
            'name' => 'Vietnam TM-3 107-30',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4557'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9203' => [
            'name' => 'Vietnam TM-3 108-15',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4559'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9204' => [
            'name' => 'Vietnam TM-3 108-30',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4560'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9219' => [
            'name' => 'South Africa Basic Survey Unit Albers 25E',
            'method' => 'urn:ogc:def:method:EPSG::9822',
            'extent_code' => ['4567'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9220' => [
            'name' => 'South Africa Basic Survey Unit Albers 44E',
            'method' => 'urn:ogc:def:method:EPSG::9822',
            'extent_code' => ['4568'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9224' => [
            'name' => 'ED50 to ETRS89 (15)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['4566'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9225' => [
            'name' => 'WGS 84 to ETRS89 (2)',
            'method' => 'urn:ogc:def:method:EPSG::1065',
            'extent_code' => ['4566'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9226' => [
            'name' => 'SHGD2015 to Astro DOS 71 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['3183'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9227' => [
            'name' => 'ITRF2005 to NAD83(CSRS)v5 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent_code' => ['1061'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9234' => [
            'name' => 'Kalianpur 1962 to WGS 84 (5)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['2983'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9257' => [
            'name' => 'Chos Malal 1914 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['4561'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9258' => [
            'name' => 'Chos Malal 1914 to WGS 84 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1292'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9259' => [
            'name' => 'Pampa del Castillo to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['4572'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9260' => [
            'name' => 'Tapi Aike to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['4569'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9261' => [
            'name' => 'MMN to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2357'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9262' => [
            'name' => 'MMS to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2357'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9263' => [
            'name' => 'Hito XVIII 1963 to WGS 84 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2357'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9264' => [
            'name' => 'POSGAR 2007 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1033'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9268' => [
            'name' => 'Austria West',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1706'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9269' => [
            'name' => 'Austria Central',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1707'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9270' => [
            'name' => 'Austria East',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1708'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9281' => [
            'name' => 'Amersfoort to ETRS89 (8)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['1275'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9291' => [
            'name' => 'ISN2016 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1120'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9298' => [
            'name' => 'ONGD17 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1032',
            'extent_code' => ['1183'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9301' => [
            'name' => 'HS2-TM',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4582'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9334' => [
            'name' => 'ITRF2014 to KSA-GRF17 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1053',
            'extent_code' => ['1206'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9339' => [
            'name' => 'PSAD56 to SIRGAS-Chile 2010 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['4231'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9340' => [
            'name' => 'PSAD56 to SIRGAS-Chile 2010 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['4222'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9341' => [
            'name' => 'PSAD56 to SIRGAS-Chile 2010 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['4221'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9342' => [
            'name' => 'PSAD56 to SIRGAS-Chile 2013 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['4231'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9343' => [
            'name' => 'PSAD56 to SIRGAS-Chile 2013 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['4222'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9344' => [
            'name' => 'PSAD56 to SIRGAS-Chile 2013 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['4221'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9345' => [
            'name' => 'PSAD56 to SIRGAS-Chile 2016 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['4231'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9346' => [
            'name' => 'PSAD56 to SIRGAS-Chile 2016 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['4222'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9347' => [
            'name' => 'PSAD56 to SIRGAS-Chile 2016 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['4221'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9348' => [
            'name' => 'SAD69 to SIRGAS-Chile 2010 (4)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2805'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9349' => [
            'name' => 'SAD69 to SIRGAS-Chile 2013 (4)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2805'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9350' => [
            'name' => 'SAD69 to SIRGAS-Chile 2016 (4)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2805'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9353' => [
            'name' => 'IBCSO Polar Stereographic',
            'method' => 'urn:ogc:def:method:EPSG::9829',
            'extent_code' => ['4586'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9361' => [
            'name' => 'MTRF-2000 to KSA-GRF17 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['1206'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9362' => [
            'name' => 'Ain el Abd to KSA-GRF17 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3303'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9366' => [
            'name' => 'TPEN11-TM',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4583'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9370' => [
            'name' => 'MML07-TM',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4588'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9371' => [
            'name' => 'Vienna height to GHA height (1)',
            'method' => 'urn:ogc:def:method:EPSG::9616',
            'extent_code' => ['4585'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9376' => [
            'name' => 'Colombia Transverse Mercator',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1070'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9381' => [
            'name' => 'ITRF2014 to IGb14 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1065',
            'extent_code' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9382' => [
            'name' => 'IGS14 to IGb14 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1065',
            'extent_code' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9383' => [
            'name' => 'KSA-GRF17 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['1206'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9385' => [
            'name' => 'AbInvA96_2020-TM',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4589'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9455' => [
            'name' => 'GBK19-TM',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4607'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9459' => [
            'name' => 'ATRF2014 to GDA2020 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1056',
            'extent_code' => ['4177'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9460' => [
            'name' => 'ITRF2014 to ATRF2014 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1032',
            'extent_code' => ['4177'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9472' => [
            'name' => 'DGN95 to SRGI2013 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['1122'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9486' => [
            'name' => 'MGI 1901 to WGS 84 (15)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['4543'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9495' => [
            'name' => 'MGI 1901 to SRB-ETRS89 (8)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['4543'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9497' => [
            'name' => 'Gauss-Kruger CABA 2019',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4610'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9548' => [
            'name' => 'Lyon Turin Ferroviaire 2004 (C) ',
            'method' => 'urn:ogc:def:method:EPSG::1102',
            'extent_code' => ['4613'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9551' => [
            'name' => 'Antalya height to EVRF2019 height (2)',
            'method' => 'urn:ogc:def:method:EPSG::9616',
            'extent_code' => ['3322'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9552' => [
            'name' => 'Antalya height to EVRF2019 mean-tide height (2)',
            'method' => 'urn:ogc:def:method:EPSG::9616',
            'extent_code' => ['3322'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9562' => [
            'name' => 'ODN height to EVRF2019 mean-tide height (2)',
            'method' => 'urn:ogc:def:method:EPSG::9616',
            'extent_code' => ['2792'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9673' => [
            'name' => 'US Forest Service region 6 Albers',
            'method' => 'urn:ogc:def:method:EPSG::9822',
            'extent_code' => ['2381'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9676' => [
            'name' => 'Israel 1993 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['2603'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9677' => [
            'name' => 'Bangladesh Transverse Mercator',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3217'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9679' => [
            'name' => 'Gulshan 303 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1041'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9682' => [
            'name' => 'ITRF2014 to GDA94 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1056',
            'extent_code' => ['4177'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9684' => [
            'name' => 'ATRF2014 to GDA94 (1)',
            'method' => 'urn:ogc:def:method:EPSG::1056',
            'extent_code' => ['4177'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9686' => [
            'name' => 'GDA94 to WGS 84 (G1762) (1)',
            'method' => 'urn:ogc:def:method:EPSG::1056',
            'extent_code' => ['4177'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9688' => [
            'name' => 'GDA94 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['4177'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9690' => [
            'name' => 'WGS 84 to GDA2020 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['4177'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::9703' => [
            'name' => 'ETRF2000-PL to ETRS89 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1192'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10085' => [
            'name' => 'Trinidad 1903 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1339'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10086' => [
            'name' => 'JAD69 to WGS 72 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3342'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10087' => [
            'name' => 'Jamaica 1875 / Jamaica (Old Grid) to JAD69 / Jamaica National Grid (1)',
            'method' => 'urn:ogc:def:method:EPSG::9624',
            'extent_code' => ['3342'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10089' => [
            'name' => 'Aratu to WGS 84 (5)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2962'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10090' => [
            'name' => 'Aratu to WGS 84 (6)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2963'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10091' => [
            'name' => 'Aratu to WGS 84 (7)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2964'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10092' => [
            'name' => 'Aratu to WGS 84 (8)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2965'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10093' => [
            'name' => 'Aratu to WGS 84 (9)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2966'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10098' => [
            'name' => 'KKJ to ETRS89 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['3333'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10099' => [
            'name' => 'KKJ to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['3333'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10101' => [
            'name' => 'Alabama CS27 East zone',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2154'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10102' => [
            'name' => 'Alabama CS27 West zone',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2155'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10131' => [
            'name' => 'SPCS83 Alabama East zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2154'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10132' => [
            'name' => 'SPCS83 Alabama West zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2155'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10201' => [
            'name' => 'Arizona Coordinate System East zone',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2167'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10202' => [
            'name' => 'Arizona Coordinate System Central zone',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2166'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10203' => [
            'name' => 'Arizona Coordinate System West zone',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2168'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10231' => [
            'name' => 'SPCS83 Arizona East zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2167'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10232' => [
            'name' => 'SPCS83 Arizona Central zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2166'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10233' => [
            'name' => 'SPCS83 Arizona West zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2168'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10301' => [
            'name' => 'Arkansas CS27 North',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2169'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10302' => [
            'name' => 'Arkansas CS27 South',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2170'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10331' => [
            'name' => 'SPCS83 Arkansas North zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2169'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10332' => [
            'name' => 'SPCS83 Arkansas South zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2170'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10401' => [
            'name' => 'California CS27 zone I',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2175'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10402' => [
            'name' => 'California CS27 zone II',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2176'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10403' => [
            'name' => 'California CS27 zone III',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2177'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10404' => [
            'name' => 'California CS27 zone IV',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2178'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10405' => [
            'name' => 'California CS27 zone V',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2179'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10406' => [
            'name' => 'California CS27 zone VI',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2180'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10408' => [
            'name' => 'California CS27 zone VII',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2181'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10420' => [
            'name' => 'California Albers',
            'method' => 'urn:ogc:def:method:EPSG::9822',
            'extent_code' => ['1375'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10431' => [
            'name' => 'SPCS83 California zone 1 (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2175'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10432' => [
            'name' => 'SPCS83 California zone 2 (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2176'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10433' => [
            'name' => 'SPCS83 California zone 3 (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2177'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10434' => [
            'name' => 'SPCS83 California zone 4 (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2178'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10435' => [
            'name' => 'SPCS83 California zone 5 (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2182'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10436' => [
            'name' => 'SPCS83 California zone 6 (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2180'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10501' => [
            'name' => 'Colorado CS27 North zone',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2184'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10502' => [
            'name' => 'Colorado CS27 Central zone',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2183'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10503' => [
            'name' => 'Colorado CS27 South zone',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2185'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10531' => [
            'name' => 'SPCS83 Colorado North zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2184'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10532' => [
            'name' => 'SPCS83 Colorado Central zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2183'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10533' => [
            'name' => 'SPCS83 Colorado South zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2185'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10600' => [
            'name' => 'Connecticut CS27',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['1377'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10630' => [
            'name' => 'SPCS83 Connecticut zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['1377'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10700' => [
            'name' => 'Delaware CS27',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1378'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10730' => [
            'name' => 'SPCS83 Delaware zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1378'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10901' => [
            'name' => 'Florida CS27 East zone',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2186'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10902' => [
            'name' => 'Florida CS27 West zone',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2188'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10903' => [
            'name' => 'Florida CS27 North zone',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2187'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10931' => [
            'name' => 'SPCS83 Florida East zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2186'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10932' => [
            'name' => 'SPCS83 Florida West zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2188'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10933' => [
            'name' => 'SPCS83 Florida North zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2187'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::10934' => [
            'name' => 'Florida GDL Albers (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9822',
            'extent_code' => ['1379'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::11001' => [
            'name' => 'Georgia CS27 East zone',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2189'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::11002' => [
            'name' => 'Georgia CS27 West zone',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2190'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::11031' => [
            'name' => 'SPCS83 Georgia East zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2189'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::11032' => [
            'name' => 'SPCS83 Georgia West zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2190'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::11101' => [
            'name' => 'Idaho CS27 East zone',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2192'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::11102' => [
            'name' => 'Idaho CS27 Central zone',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2191'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::11103' => [
            'name' => 'Idaho CS27 West zone',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2193'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::11131' => [
            'name' => 'SPCS83 Idaho East zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2192'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::11132' => [
            'name' => 'SPCS83 Idaho Central zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2191'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::11133' => [
            'name' => 'SPCS83 Idaho West zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2193'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::11201' => [
            'name' => 'Illinois CS27 East zone',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2194'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::11202' => [
            'name' => 'Illinois CS27 West zone',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2195'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::11231' => [
            'name' => 'SPCS83 Illinois East zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2194'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::11232' => [
            'name' => 'SPCS83 Illinois West zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2195'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::11301' => [
            'name' => 'Indiana CS27 East zone',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2196'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::11302' => [
            'name' => 'Indiana CS27 West zone',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2197'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::11331' => [
            'name' => 'SPCS83 Indiana East zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2196'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::11332' => [
            'name' => 'SPCS83 Indiana West zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2197'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::11401' => [
            'name' => 'Iowa CS27 North zone',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2198'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::11402' => [
            'name' => 'Iowa CS27 South zone',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2199'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::11431' => [
            'name' => 'SPCS83 Iowa North zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2198'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::11432' => [
            'name' => 'SPCS83 Iowa South zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2199'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::11501' => [
            'name' => 'Kansas CS27 North zone',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2200'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::11502' => [
            'name' => 'Kansas CS27 South zone',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2201'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::11531' => [
            'name' => 'SPCS83 Kansas North zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2200'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::11532' => [
            'name' => 'SPCS83 Kansas South zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2201'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::11601' => [
            'name' => 'Kentucky CS27 North zone',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2202'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::11602' => [
            'name' => 'Kentucky CS27 South zone',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2203'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::11630' => [
            'name' => 'SPCS83 Kentucky Single Zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['1386'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::11632' => [
            'name' => 'SPCS83 Kentucky South zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2203'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::11701' => [
            'name' => 'Louisiana CS27 North zone',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2204'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::11702' => [
            'name' => 'Louisiana CS27 South zone',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2205'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::11703' => [
            'name' => 'Louisiana CS27 Offshore zone',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['1387'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::11731' => [
            'name' => 'SPCS83 Louisiana North zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2204'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::11732' => [
            'name' => 'SPCS83 Louisiana South zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2529'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::11733' => [
            'name' => 'SPCS83 Louisiana Offshore zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['1387'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::11801' => [
            'name' => 'Maine CS27 East zone',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2206'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::11802' => [
            'name' => 'Maine CS27 West zone',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2207'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::11831' => [
            'name' => 'SPCS83 Maine East zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2206'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::11832' => [
            'name' => 'SPCS83 Maine West zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2207'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::11833' => [
            'name' => 'SPCS83 Maine East zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2206'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::11834' => [
            'name' => 'SPCS83 Maine West zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2207'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::11851' => [
            'name' => 'Maine CS2000 East zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2960'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::11853' => [
            'name' => 'Maine CS2000 West zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2958'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::11854' => [
            'name' => 'Maine CS2000 Central zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2959'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::11900' => [
            'name' => 'Maryland CS27',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['1389'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::11930' => [
            'name' => 'SPCS83 Maryland zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['1389'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::12001' => [
            'name' => 'Massachusetts CS27 Mainland zone',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2209'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::12002' => [
            'name' => 'Massachusetts CS27 Island zone',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2208'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::12031' => [
            'name' => 'SPCS83 Massachusetts Mainland zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2209'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::12032' => [
            'name' => 'SPCS83 Massachusetts Island zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2208'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::12101' => [
            'name' => 'Michigan State Plane East zone',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1720'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::12102' => [
            'name' => 'Michigan State Plane Old Central zone',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1721'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::12103' => [
            'name' => 'Michigan State Plane West zone',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3652'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::12141' => [
            'name' => 'SPCS83 Michigan North zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['1723'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::12142' => [
            'name' => 'SPCS83 Michigan Central zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['1724'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::12143' => [
            'name' => 'SPCS83 Michigan South zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['1725'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::12150' => [
            'name' => 'Michigan Oblique Mercator (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9812',
            'extent_code' => ['1391'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::12201' => [
            'name' => 'Minnesota CS27 North zone',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2214'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::12202' => [
            'name' => 'Minnesota CS27 Central zone',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2213'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::12203' => [
            'name' => 'Minnesota CS27 South zone',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2215'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::12231' => [
            'name' => 'SPCS83 Minnesota North zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2214'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::12232' => [
            'name' => 'SPCS83 Minnesota Central zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2213'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::12233' => [
            'name' => 'SPCS83 Minnesota South zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2215'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::12234' => [
            'name' => 'SPCS83 Minnesota North zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2214'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::12235' => [
            'name' => 'SPCS83 Minnesota Central zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2213'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::12236' => [
            'name' => 'SPCS83 Minnesota South zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2215'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::12301' => [
            'name' => 'Mississippi CS27 East zone',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2216'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::12302' => [
            'name' => 'Mississippi CS27 West zone',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2217'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::12331' => [
            'name' => 'SPCS83 Mississippi East zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2216'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::12332' => [
            'name' => 'SPCS83 Mississippi West zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2217'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::12401' => [
            'name' => 'Missouri CS27 East zone',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2219'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::12402' => [
            'name' => 'Missouri CS27 Central zone',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2218'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::12403' => [
            'name' => 'Missouri CS27 West zone',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2220'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::12431' => [
            'name' => 'SPCS83 Missouri East zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2219'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::12432' => [
            'name' => 'SPCS83 Missouri Central zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2218'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::12433' => [
            'name' => 'SPCS83 Missouri West zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2220'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::12501' => [
            'name' => 'Montana CS27 North zone',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2211'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::12502' => [
            'name' => 'Montana CS27 Central zone',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2210'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::12503' => [
            'name' => 'Montana CS27 South zone',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2212'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::12530' => [
            'name' => 'SPCS83 Montana zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['1395'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::12601' => [
            'name' => 'Nebraska CS27 North zone',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2221'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::12602' => [
            'name' => 'Nebraska CS27 South zone',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2222'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::12630' => [
            'name' => 'SPCS83 Nebraska zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['1396'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::12701' => [
            'name' => 'Nevada CS27 East zone',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2224'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::12702' => [
            'name' => 'Nevada CS27 Central zone',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2223'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::12703' => [
            'name' => 'Nevada CS27 West zone',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2225'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::12731' => [
            'name' => 'SPCS83 Nevada East zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2224'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::12732' => [
            'name' => 'SPCS83 Nevada Central zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2223'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::12733' => [
            'name' => 'SPCS83 Nevada West zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2225'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::12800' => [
            'name' => 'New Hampshire CS27',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1398'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::12830' => [
            'name' => 'SPCS83 New Hampshire zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1398'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::12900' => [
            'name' => 'New Jersey CS27',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1399'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::12930' => [
            'name' => 'SPCS83 New Jersey zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1399'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::13001' => [
            'name' => 'New Mexico CS27 East zone',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2228'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::13002' => [
            'name' => 'New Mexico CS27 Central zone',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2229'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::13003' => [
            'name' => 'New Mexico CS27 West zone',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2230'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::13031' => [
            'name' => 'SPCS83 New Mexico East zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2228'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::13032' => [
            'name' => 'SPCS83 New Mexico Central zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2231'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::13033' => [
            'name' => 'SPCS83 New Mexico West zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2232'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::13101' => [
            'name' => 'New York CS27 East zone',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2234'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::13102' => [
            'name' => 'New York CS27 Central zone',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2233'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::13103' => [
            'name' => 'New York CS27 West zone',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2236'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::13131' => [
            'name' => 'SPCS83 New York East zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2234'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::13132' => [
            'name' => 'SPCS83 New York Central zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2233'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::13133' => [
            'name' => 'SPCS83 New York West zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2236'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::13134' => [
            'name' => 'SPCS83 New York Long Island zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2235'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::13200' => [
            'name' => 'North Carolina CS27',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['1402'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::13230' => [
            'name' => 'SPCS83 North Carolina zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['1402'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::13301' => [
            'name' => 'North Dakota CS27 North zone',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2237'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::13302' => [
            'name' => 'North Dakota CS27 South zone',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2238'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::13331' => [
            'name' => 'SPCS83 North Dakota North zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2237'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::13332' => [
            'name' => 'SPCS83 North Dakota South zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2238'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::13401' => [
            'name' => 'Ohio CS27 North zone',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2239'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::13402' => [
            'name' => 'Ohio CS27 South zone',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2240'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::13431' => [
            'name' => 'SPCS83 Ohio North zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2239'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::13432' => [
            'name' => 'SPCS83 Ohio South zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2240'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::13433' => [
            'name' => 'SPCS83 Ohio North zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2239'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::13434' => [
            'name' => 'SPCS83 Ohio South zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2240'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::13501' => [
            'name' => 'Oklahoma CS27 North zone',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2241'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::13502' => [
            'name' => 'Oklahoma CS27 South zone',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2242'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::13531' => [
            'name' => 'SPCS83 Oklahoma North zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2241'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::13532' => [
            'name' => 'SPCS83 Oklahoma South zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2242'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::13601' => [
            'name' => 'Oregon CS27 North zone',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2243'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::13602' => [
            'name' => 'Oregon CS27 South zone',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2244'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::13631' => [
            'name' => 'SPCS83 Oregon North zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2243'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::13632' => [
            'name' => 'SPCS83 Oregon South zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2244'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::13633' => [
            'name' => 'Oregon Lambert (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['1406'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::13701' => [
            'name' => 'Pennsylvania CS27 North zone',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2245'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::13731' => [
            'name' => 'SPCS83 Pennsylvania North zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2245'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::13732' => [
            'name' => 'SPCS83 Pennsylvania South zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2246'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::13800' => [
            'name' => 'Rhode Island CS27',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1408'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::13830' => [
            'name' => 'SPCS83 Rhode Island zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1408'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::13901' => [
            'name' => 'South Carolina CS27 North zone',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2247'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::13902' => [
            'name' => 'South Carolina CS27 South zone',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2248'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::13930' => [
            'name' => 'SPCS83 South Carolina zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['1409'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::14001' => [
            'name' => 'South Dakota CS27 North zone',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2249'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::14002' => [
            'name' => 'South Dakota CS27 South zone',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2250'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::14031' => [
            'name' => 'SPCS83 South Dakota North zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2249'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::14032' => [
            'name' => 'SPCS83 South Dakota South zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2250'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::14130' => [
            'name' => 'SPCS83 Tennessee zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['1411'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::14201' => [
            'name' => 'Texas CS27 North zone',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2253'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::14202' => [
            'name' => 'Texas CS27 North Central zone',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2254'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::14203' => [
            'name' => 'Texas CS27 Central zone',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2252'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::14204' => [
            'name' => 'Texas CS27 South Central zone',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2256'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::14205' => [
            'name' => 'Texas CS27 South zone',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2255'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::14231' => [
            'name' => 'SPCS83 Texas North zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2253'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::14232' => [
            'name' => 'SPCS83 Texas North Central zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2254'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::14233' => [
            'name' => 'SPCS83 Texas Central zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2252'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::14234' => [
            'name' => 'SPCS83 Texas South Central zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2527'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::14235' => [
            'name' => 'SPCS83 Texas South zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2528'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::14251' => [
            'name' => 'Texas State Mapping System (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['1412'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::14252' => [
            'name' => 'Shackleford',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['1412'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::14253' => [
            'name' => 'Texas Centric Lambert Conformal',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['1412'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::14254' => [
            'name' => 'Texas Centric Albers Equal Area',
            'method' => 'urn:ogc:def:method:EPSG::9822',
            'extent_code' => ['1412'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::14301' => [
            'name' => 'Utah CS27 North zone',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2258'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::14302' => [
            'name' => 'Utah CS27 Central zone',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2257'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::14303' => [
            'name' => 'Utah CS27 South zone',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2259'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::14331' => [
            'name' => 'SPCS83 Utah North zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2258'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::14332' => [
            'name' => 'SPCS83 Utah Central zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2257'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::14333' => [
            'name' => 'SPCS83 Utah South zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2259'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::14400' => [
            'name' => 'Vermont CS27',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1414'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::14430' => [
            'name' => 'SPCS83 Vermont zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1414'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::14501' => [
            'name' => 'Virginia CS27 North zone',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2260'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::14502' => [
            'name' => 'Virginia CS27 South zone',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2261'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::14531' => [
            'name' => 'SPCS83 Virginia North zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2260'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::14532' => [
            'name' => 'SPCS83 Virginia South zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2261'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::14601' => [
            'name' => 'Washington CS27 North zone',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::14602' => [
            'name' => 'Washington CS27 South zone',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2263'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::14631' => [
            'name' => 'SPCS83 Washington North zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2273'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::14632' => [
            'name' => 'SPCS83 Washington South zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2274'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::14701' => [
            'name' => 'West Virginia CS27 North zone',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2264'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::14702' => [
            'name' => 'West Virginia CS27 South zone',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2265'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::14731' => [
            'name' => 'SPCS83 West Virginia North zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2264'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::14732' => [
            'name' => 'SPCS83 West Virginia South zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2265'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::14735' => [
            'name' => 'SPCS83 West Virginia North zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2264'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::14736' => [
            'name' => 'SPCS83 West Virginia South zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2265'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::14801' => [
            'name' => 'Wisconsin CS27 North zone',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2267'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::14802' => [
            'name' => 'Wisconsin CS27 Central zone',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2266'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::14803' => [
            'name' => 'Wisconsin CS27 South zone',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2268'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::14811' => [
            'name' => 'Wisconsin Transverse Mercator 27',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1418'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::14831' => [
            'name' => 'SPCS83 Wisconsin North zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2267'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::14832' => [
            'name' => 'SPCS83 Wisconsin Central zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2266'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::14833' => [
            'name' => 'SPCS83 Wisconsin South zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2268'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::14841' => [
            'name' => 'Wisconsin Transverse Mercator 83',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1418'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::14901' => [
            'name' => 'Wyoming CS27 East zone',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2269'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::14902' => [
            'name' => 'Wyoming CS27 East Central zone',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2270'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::14903' => [
            'name' => 'Wyoming CS27 West Central zone',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2272'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::14904' => [
            'name' => 'Wyoming CS27 West zone',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2271'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::14931' => [
            'name' => 'SPCS83 Wyoming East zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2269'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::14932' => [
            'name' => 'SPCS83 Wyoming East Central zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2270'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::14933' => [
            'name' => 'SPCS83 Wyoming West Central zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2272'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::14934' => [
            'name' => 'SPCS83 Wyoming West zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2271'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::14935' => [
            'name' => 'SPCS83 Wyoming East zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2269'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::14936' => [
            'name' => 'SPCS83 Wyoming East Central zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2270'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::14937' => [
            'name' => 'SPCS83 Wyoming West Central zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2272'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::14938' => [
            'name' => 'SPCS83 Wyoming West zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2271'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15001' => [
            'name' => 'Alaska CS27 zone 1',
            'method' => 'urn:ogc:def:method:EPSG::9812',
            'extent_code' => ['2156'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15002' => [
            'name' => 'Alaska CS27 zone 2',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2158'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15003' => [
            'name' => 'Alaska CS27 zone 3',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2159'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15004' => [
            'name' => 'Alaska CS27 zone 4',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2160'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15005' => [
            'name' => 'Alaska CS27 zone 5',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2161'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15006' => [
            'name' => 'Alaska CS27 zone 6',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2162'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15007' => [
            'name' => 'Alaska CS27 zone 7',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2163'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15008' => [
            'name' => 'Alaska CS27 zone 8',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2164'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15009' => [
            'name' => 'Alaska CS27 zone 9',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2165'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15010' => [
            'name' => 'Alaska CS27 zone 10',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2157'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15020' => [
            'name' => 'Alaska Albers',
            'method' => 'urn:ogc:def:method:EPSG::9822',
            'extent_code' => ['1330'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15021' => [
            'name' => 'Alaska Albers (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9822',
            'extent_code' => ['1330'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15031' => [
            'name' => 'SPCS83 Alaska zone 1 (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9812',
            'extent_code' => ['2156'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15032' => [
            'name' => 'SPCS83 Alaska zone 2 (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2158'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15033' => [
            'name' => 'SPCS83 Alaska zone 3 (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2159'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15034' => [
            'name' => 'SPCS83 Alaska zone 4 (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2160'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15035' => [
            'name' => 'SPCS83 Alaska zone 5 (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2161'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15036' => [
            'name' => 'SPCS83 Alaska zone 6 (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2162'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15037' => [
            'name' => 'SPCS83 Alaska zone 7 (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2163'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15038' => [
            'name' => 'SPCS83 Alaska zone 8 (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2164'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15039' => [
            'name' => 'SPCS83 Alaska zone 9 (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2165'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15040' => [
            'name' => 'SPCS83 Alaska zone 10 (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2157'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15101' => [
            'name' => 'Hawaii CS27 zone 1',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1546'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15102' => [
            'name' => 'Hawaii CS27 zone 2',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1547'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15103' => [
            'name' => 'Hawaii CS27 zone 3',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1548'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15104' => [
            'name' => 'Hawaii CS27 zone 4',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1549'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15105' => [
            'name' => 'Hawaii CS27 zone 5',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1550'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15131' => [
            'name' => 'SPCS83 Hawaii zone 1 (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1546'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15132' => [
            'name' => 'SPCS83 Hawaii zone 2 (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1547'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15133' => [
            'name' => 'SPCS83 Hawaii zone 3 (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1548'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15134' => [
            'name' => 'SPCS83 Hawaii zone 4 (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1549'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15135' => [
            'name' => 'SPCS83 Hawaii zone 5 (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1550'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15138' => [
            'name' => 'SPCS83 Hawaii zone 3 (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1548'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15201' => [
            'name' => 'Puerto Rico CS27',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['3294'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15202' => [
            'name' => 'St. Croix CS27',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['3330'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15230' => [
            'name' => 'SPCS83 Puerto Rico & Virgin Islands zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['3634'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15297' => [
            'name' => 'SPCS83 Utah North zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2258'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15298' => [
            'name' => 'SPCS83 Utah Central zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2257'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15299' => [
            'name' => 'SPCS83 Utah South zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2259'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15302' => [
            'name' => 'Tennessee CS27',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['1411'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15303' => [
            'name' => 'SPCS83 Kentucky North zone (meters)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2202'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15304' => [
            'name' => 'SPCS83 Arizona East zone (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2167'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15305' => [
            'name' => 'SPCS83 Arizona Central zone (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2166'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15306' => [
            'name' => 'SPCS83 Arizona West zone (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2168'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15307' => [
            'name' => 'SPCS83 California zone 1 (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2175'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15308' => [
            'name' => 'SPCS83 California zone 2 (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2176'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15309' => [
            'name' => 'SPCS83 California zone 3 (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2177'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15310' => [
            'name' => 'SPCS83 California zone 4 (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2178'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15311' => [
            'name' => 'SPCS83 California zone 5 (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2182'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15312' => [
            'name' => 'SPCS83 California zone 6 (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2180'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15313' => [
            'name' => 'SPCS83 Colorado North zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2184'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15314' => [
            'name' => 'SPCS83 Colorado Central zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2183'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15315' => [
            'name' => 'SPCS83 Colorado South zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2185'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15316' => [
            'name' => 'SPCS83 Connecticut zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['1377'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15317' => [
            'name' => 'SPCS83 Delaware zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1378'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15318' => [
            'name' => 'SPCS83 Florida East zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2186'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15319' => [
            'name' => 'SPCS83 Florida West zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2188'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15320' => [
            'name' => 'SPCS83 Florida North zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2187'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15321' => [
            'name' => 'SPCS83 Georgia East zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2189'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15322' => [
            'name' => 'SPCS83 Georgia West zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2190'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15323' => [
            'name' => 'SPCS83 Idaho East zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2192'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15324' => [
            'name' => 'SPCS83 Idaho Central zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2191'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15325' => [
            'name' => 'SPCS83 Idaho West zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2193'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15328' => [
            'name' => 'SPCS83 Kentucky North zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2202'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15329' => [
            'name' => 'SPCS83 Kentucky South zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2203'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15330' => [
            'name' => 'SPCS83 Maryland zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['1389'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15331' => [
            'name' => 'SPCS83 Massachusetts Mainland zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2209'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15332' => [
            'name' => 'SPCS83 Massachusetts Island zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2208'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15333' => [
            'name' => 'SPCS83 Michigan North zone (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['1723'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15334' => [
            'name' => 'SPCS83 Michigan Central zone (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['1724'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15335' => [
            'name' => 'SPCS83 Michigan South zone (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['1725'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15336' => [
            'name' => 'SPCS83 Mississippi East zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2216'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15337' => [
            'name' => 'SPCS83 Mississippi West zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2217'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15338' => [
            'name' => 'SPCS83 Montana zone (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['1395'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15339' => [
            'name' => 'SPCS83 New Mexico East zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2228'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15340' => [
            'name' => 'SPCS83 New Mexico Central zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2231'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15341' => [
            'name' => 'SPCS83 New Mexico West zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2232'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15342' => [
            'name' => 'SPCS83 New York East zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2234'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15343' => [
            'name' => 'SPCS83 New York Central zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2233'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15344' => [
            'name' => 'SPCS83 New York West zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2236'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15345' => [
            'name' => 'SPCS83 New York Long Island zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2235'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15346' => [
            'name' => 'SPCS83 North Carolina zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['1402'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15347' => [
            'name' => 'SPCS83 North Dakota North zone (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2237'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15348' => [
            'name' => 'SPCS83 North Dakota South zone (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2238'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15349' => [
            'name' => 'SPCS83 Oklahoma North zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2241'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15350' => [
            'name' => 'SPCS83 Oklahoma South zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2242'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15351' => [
            'name' => 'SPCS83 Oregon North zone (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2243'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15352' => [
            'name' => 'SPCS83 Oregon South zone (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2244'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15353' => [
            'name' => 'SPCS83 Pennsylvania North zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2245'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15354' => [
            'name' => 'SPCS83 Pennsylvania South zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2246'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15355' => [
            'name' => 'SPCS83 South Carolina zone (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['1409'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15356' => [
            'name' => 'SPCS83 Tennessee zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['1411'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15357' => [
            'name' => 'SPCS83 Texas North zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2253'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15358' => [
            'name' => 'SPCS83 Texas North Central zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2254'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15359' => [
            'name' => 'SPCS83 Texas Central zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2252'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15360' => [
            'name' => 'SPCS83 Texas South Central zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2527'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15361' => [
            'name' => 'SPCS83 Texas South zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2528'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15362' => [
            'name' => 'SPCS83 Utah North zone (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2258'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15363' => [
            'name' => 'SPCS83 Utah Central zone (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2257'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15364' => [
            'name' => 'SPCS83 Utah South zone (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2259'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15365' => [
            'name' => 'SPCS83 Virginia North zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2260'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15366' => [
            'name' => 'SPCS83 Virginia South zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2261'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15367' => [
            'name' => 'SPCS83 Washington North zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2273'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15368' => [
            'name' => 'SPCS83 Washington South zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2274'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15369' => [
            'name' => 'SPCS83 Wisconsin North zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2267'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15370' => [
            'name' => 'SPCS83 Wisconsin Central zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2266'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15371' => [
            'name' => 'SPCS83 Wisconsin South zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2268'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15372' => [
            'name' => 'SPCS83 Indiana East zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2196'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15373' => [
            'name' => 'SPCS83 Indiana West zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2197'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15374' => [
            'name' => 'Oregon GIC Lambert (International feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['1406'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15375' => [
            'name' => 'SPCS83 Kentucky Single Zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['1386'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15376' => [
            'name' => 'American Samoa Lambert',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['3109'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15377' => [
            'name' => 'SPCS83 Iowa North zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2198'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15378' => [
            'name' => 'SPCS83 Iowa South zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2199'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15379' => [
            'name' => 'SPCS83 Kansas North zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2200'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15380' => [
            'name' => 'SPCS83 Kansas South zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2201'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15381' => [
            'name' => 'SPCS83 Nevada East zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2224'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15382' => [
            'name' => 'SPCS83 Nevada Central zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2223'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15383' => [
            'name' => 'SPCS83 Nevada West zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2225'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15384' => [
            'name' => 'SPCS83 New Jersey zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1399'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15385' => [
            'name' => 'SPCS83 Arkansas North zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2169'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15386' => [
            'name' => 'SPCS83 Arkansas South zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2170'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15387' => [
            'name' => 'SPCS83 Illinois East zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2194'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15388' => [
            'name' => 'SPCS83 Illinois West zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2195'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15389' => [
            'name' => 'SPCS83 New Hampshire zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1398'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15390' => [
            'name' => 'SPCS83 Rhode Island zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1408'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15391' => [
            'name' => 'SPCS83 Louisiana North zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2204'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15392' => [
            'name' => 'SPCS83 Louisiana South zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2529'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15393' => [
            'name' => 'SPCS83 Louisiana Offshore zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['1387'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15394' => [
            'name' => 'SPCS83 South Dakota North zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2249'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15395' => [
            'name' => 'SPCS83 South Dakota South zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2250'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15396' => [
            'name' => 'SPCS83 Nebraska zone (US Survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['1396'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15397' => [
            'name' => 'Great Lakes Albers',
            'method' => 'urn:ogc:def:method:EPSG::9822',
            'extent_code' => ['3467'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15398' => [
            'name' => 'Great Lakes and St Lawrence Albers',
            'method' => 'urn:ogc:def:method:EPSG::9822',
            'extent_code' => ['3468'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15399' => [
            'name' => 'Yap Islands',
            'method' => 'urn:ogc:def:method:EPSG::9832',
            'extent_code' => ['3108'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15400' => [
            'name' => 'Guam SPCS',
            'method' => 'urn:ogc:def:method:EPSG::9831',
            'extent_code' => ['3255'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15483' => [
            'name' => 'Tokyo to JGD2000 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3957'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15484' => [
            'name' => 'Tokyo to WGS 84 (108)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3957'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15485' => [
            'name' => 'SAD69 to SIRGAS 2000 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1053'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15487' => [
            'name' => 'TWD67 / TM2 zone 121 to TWD97 / TM2 zone 121 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9656',
            'extent_code' => ['3982'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15493' => [
            'name' => 'Minna to WGS 84 (15)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3590'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15494' => [
            'name' => 'Kalianpur 1962 to WGS 84 (6)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3589'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15495' => [
            'name' => 'Accra to WGS 84 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['1505'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15496' => [
            'name' => 'Pulkovo 1942(58) to WGS 84 (18)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1197'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15497' => [
            'name' => 'Pulkovo 1942(58) to WGS 84 (9)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1197'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15498' => [
            'name' => 'axis order change (2D)',
            'method' => 'urn:ogc:def:method:EPSG::9843',
            'extent_code' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15499' => [
            'name' => 'axis order change (geographic3D horizontal)',
            'method' => 'urn:ogc:def:method:EPSG::9844',
            'extent_code' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15592' => [
            'name' => 'geocentric to geographic3D',
            'method' => 'urn:ogc:def:method:EPSG::9602',
            'extent_code' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15593' => [
            'name' => 'geographic3D to geographic2D',
            'method' => 'urn:ogc:def:method:EPSG::9659',
            'extent_code' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15596' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (7)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent_code' => ['2426'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15597' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (8)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent_code' => ['2427'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15598' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (9)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent_code' => ['2428'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15599' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (10)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent_code' => ['2429'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15600' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (11)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent_code' => ['2430'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15601' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (12)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent_code' => ['2431'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15602' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (13)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent_code' => ['2432'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15603' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (14)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent_code' => ['2433'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15604' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (15)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent_code' => ['2434'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15605' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (16)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent_code' => ['2435'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15606' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (17)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent_code' => ['2436'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15607' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (18)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent_code' => ['2437'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15608' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (19)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent_code' => ['2438'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15609' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (20)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent_code' => ['2439'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15610' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (21)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent_code' => ['2440'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15611' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (22)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent_code' => ['2441'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15612' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (23)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent_code' => ['2442'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15613' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (24)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent_code' => ['2443'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15614' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (25)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent_code' => ['2444'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15615' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (26)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent_code' => ['2445'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15616' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (27)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent_code' => ['2446'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15617' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (28)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent_code' => ['2447'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15618' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (29)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent_code' => ['2448'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15619' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (30)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent_code' => ['2449'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15620' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (31)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent_code' => ['2450'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15621' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (32)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent_code' => ['2451'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15622' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (33)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent_code' => ['2452'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15623' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (34)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent_code' => ['2453'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15624' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (35)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent_code' => ['2454'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15625' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (36)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent_code' => ['2455'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15626' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (37)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent_code' => ['2456'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15627' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (38)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent_code' => ['2457'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15628' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (39)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent_code' => ['2458'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15629' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (40)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent_code' => ['2459'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15630' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (41)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent_code' => ['2460'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15631' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (42)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent_code' => ['2461'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15632' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (43)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent_code' => ['2462'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15633' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (44)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent_code' => ['2463'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15634' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (45)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent_code' => ['2464'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15635' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (46)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent_code' => ['2465'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15636' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (47)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent_code' => ['2466'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15637' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (48)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent_code' => ['2467'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15638' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (49)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent_code' => ['2468'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15639' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (50)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent_code' => ['2469'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15640' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (51)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent_code' => ['2470'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15641' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (52)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent_code' => ['2471'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15642' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (53)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent_code' => ['2472'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15643' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (54)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent_code' => ['2473'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15644' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (55)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent_code' => ['2474'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15645' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (56)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent_code' => ['2475'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15646' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (57)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent_code' => ['2476'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15647' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (58)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent_code' => ['2477'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15648' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (59)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent_code' => ['2478'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15649' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (60)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent_code' => ['2479'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15650' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (61)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent_code' => ['2480'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15651' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (62)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent_code' => ['2481'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15652' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (63)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent_code' => ['2482'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15653' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (64)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent_code' => ['2483'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15654' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (65)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent_code' => ['2484'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15655' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (66)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent_code' => ['2485'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15656' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (67)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent_code' => ['2486'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15657' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (68)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent_code' => ['2487'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15658' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (69)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent_code' => ['2488'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15659' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (70)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent_code' => ['2489'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15660' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (71)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent_code' => ['2490'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15661' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (72)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent_code' => ['2491'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15662' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (73)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent_code' => ['2492'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15663' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (74)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent_code' => ['2493'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15664' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (75)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent_code' => ['2494'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15665' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (76)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent_code' => ['2495'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15666' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (77)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent_code' => ['2496'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15667' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (78)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent_code' => ['2497'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15668' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (79)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent_code' => ['2498'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15669' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (80)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent_code' => ['2499'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15670' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (81)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent_code' => ['2500'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15671' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (82)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent_code' => ['2501'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15672' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (83)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent_code' => ['2502'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15673' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (84)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent_code' => ['2503'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15674' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (85)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent_code' => ['2504'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15675' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (86)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent_code' => ['2505'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15676' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (87)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent_code' => ['2506'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15677' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (88)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent_code' => ['2507'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15678' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (89)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent_code' => ['2508'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15679' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (90)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent_code' => ['2509'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15680' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (91)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent_code' => ['2510'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15681' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (92)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent_code' => ['2511'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15682' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (93)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent_code' => ['2512'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15683' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (94)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent_code' => ['2513'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15684' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (95)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent_code' => ['2514'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15685' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (96)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent_code' => ['2515'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15686' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (97)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent_code' => ['2516'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15687' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (98)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent_code' => ['2517'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15688' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (99)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent_code' => ['2518'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15689' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (100)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent_code' => ['2519'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15690' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (101)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent_code' => ['2520'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15691' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (102)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent_code' => ['2521'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15692' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (103)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent_code' => ['2522'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15693' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (104)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent_code' => ['2523'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15694' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (105)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent_code' => ['2524'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15695' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (106)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent_code' => ['2525'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15696' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (107)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent_code' => ['2526'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15697' => [
            'name' => 'Tokyo + JSLD height to WGS 84 (6)',
            'method' => 'urn:ogc:def:method:EPSG::9618',
            'extent_code' => ['2425'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15699' => [
            'name' => 'NAD27 to WGS 84 (87)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3462'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15701' => [
            'name' => 'Kalianpur 1962 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2985'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15702' => [
            'name' => 'Kalianpur 1962 to WGS 84 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2984'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15703' => [
            'name' => 'Kalianpur 1962 to WGS 84 (4)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2982'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15705' => [
            'name' => 'Minna to WGS 84 (12)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['3819'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15706' => [
            'name' => 'Minna to WGS 84 (13)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1717'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15707' => [
            'name' => 'ELD79 to WGS 84 (6)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2987'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15708' => [
            'name' => 'PRS92 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['1190'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15709' => [
            'name' => 'Nouakchott 1965 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2972'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15710' => [
            'name' => 'Aratu to WGS 84 (10)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2963'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15711' => [
            'name' => 'Aratu to WGS 84 (11)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2962'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15712' => [
            'name' => 'Aratu to WGS 84 (12)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2964'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15713' => [
            'name' => 'Gan 1970 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3274'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15714' => [
            'name' => 'Bogota 1975 to MAGNA-SIRGAS (1)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['3082'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15715' => [
            'name' => 'Bogota 1975 to WGS 84 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['3082'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15716' => [
            'name' => 'Bogota 1975 to MAGNA-SIRGAS (2)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['3083'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15717' => [
            'name' => 'Bogota 1975 to WGS 84 (4)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['3083'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15718' => [
            'name' => 'Bogota 1975 to MAGNA-SIRGAS (3)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['3084'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15719' => [
            'name' => 'Bogota 1975 to WGS 84 (5)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['3084'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15720' => [
            'name' => 'Bogota 1975 to MAGNA-SIRGAS (4)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['3085'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15721' => [
            'name' => 'Bogota 1975 to WGS 84 (6)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['3085'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15722' => [
            'name' => 'Bogota 1975 to MAGNA-SIRGAS (5)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['3086'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15723' => [
            'name' => 'Bogota 1975 to WGS 84 (7)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['3086'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15724' => [
            'name' => 'Bogota 1975 to MAGNA-SIRGAS (6)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['3087'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15725' => [
            'name' => 'Bogota 1975 to WGS 84 (8)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['3087'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15726' => [
            'name' => 'Bogota 1975 to MAGNA-SIRGAS (7)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['3088'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15727' => [
            'name' => 'Bogota 1975 to WGS 84 (9)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['3088'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15728' => [
            'name' => 'Bogota 1975 to MAGNA-SIRGAS (8)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['3089'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15729' => [
            'name' => 'Bogota 1975 to WGS 84 (10)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['3089'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15730' => [
            'name' => 'Bogota 1975 to MAGNA-SIRGAS (9)',
            'method' => 'urn:ogc:def:method:EPSG::9636',
            'extent_code' => ['3082'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15731' => [
            'name' => 'Bogota 1975 to MAGNA-SIRGAS (10)',
            'method' => 'urn:ogc:def:method:EPSG::9636',
            'extent_code' => ['3083'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15732' => [
            'name' => 'Bogota 1975 to MAGNA-SIRGAS (11)',
            'method' => 'urn:ogc:def:method:EPSG::9636',
            'extent_code' => ['3084'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15733' => [
            'name' => 'Bogota 1975 to MAGNA-SIRGAS (12)',
            'method' => 'urn:ogc:def:method:EPSG::9636',
            'extent_code' => ['3085'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15734' => [
            'name' => 'Bogota 1975 to MAGNA-SIRGAS (13)',
            'method' => 'urn:ogc:def:method:EPSG::9636',
            'extent_code' => ['3086'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15735' => [
            'name' => 'Bogota 1975 to MAGNA-SIRGAS (14)',
            'method' => 'urn:ogc:def:method:EPSG::9636',
            'extent_code' => ['3087'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15736' => [
            'name' => 'Bogota 1975 to MAGNA-SIRGAS (15)',
            'method' => 'urn:ogc:def:method:EPSG::9636',
            'extent_code' => ['3088'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15737' => [
            'name' => 'Bogota 1975 to MAGNA-SIRGAS (16)',
            'method' => 'urn:ogc:def:method:EPSG::9636',
            'extent_code' => ['3089'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15738' => [
            'name' => 'MAGNA-SIRGAS to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1070'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15739' => [
            'name' => 'Amersfoort to ETRS89 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['1275'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15740' => [
            'name' => 'Amersfoort to ETRS89 (4)',
            'method' => 'urn:ogc:def:method:EPSG::9636',
            'extent_code' => ['1275'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15741' => [
            'name' => 'Deir ez Zor to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2329'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15742' => [
            'name' => 'Deir ez Zor to WGS 84 (5)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3314'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15743' => [
            'name' => 'Deir ez Zor to WGS 84 (6)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['2329'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15745' => [
            'name' => 'ED50(ED77) to WGS 84 (6)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3140'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15746' => [
            'name' => 'Nakhl-e Ghanem to WGS 84 (6)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3141'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15750' => [
            'name' => 'St. Kitts 1955 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3297'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15751' => [
            'name' => 'Reunion 1947 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3337'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15752' => [
            'name' => 'ED79 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1297'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15753' => [
            'name' => 'ED50 to ED87 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9651',
            'extent_code' => ['2330'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15754' => [
            'name' => 'Aratu to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2307'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15755' => [
            'name' => 'Minna to WGS 84 (14)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3113'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15759' => [
            'name' => 'Maupiti 83 to RGPF (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3126'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15778' => [
            'name' => 'ELD79 to WGS 84 (7)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3142'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15779' => [
            'name' => 'Gulshan 303 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1041'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15782' => [
            'name' => 'Campo Inchauspe to POSGAR 94 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3215'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15783' => [
            'name' => 'IGN53 Mare to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2819'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15784' => [
            'name' => 'Le Pouce 1934 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3209'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15787' => [
            'name' => 'IGCB 1955 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3171'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15788' => [
            'name' => 'AGD66 to WGS 84 (16)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2575'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15789' => [
            'name' => 'AGD84 to WGS 84 (8)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2576'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15790' => [
            'name' => 'Mhast (offshore) to WGS 72BE (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3180'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15791' => [
            'name' => 'Malongo 1987 to WGS 84 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3180'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15792' => [
            'name' => 'Egypt Gulf of Suez S-650 TL to WGS 72BE (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2341'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15793' => [
            'name' => 'Barbados 1938 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3218'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15794' => [
            'name' => 'Cocos Islands 1965 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1069'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15795' => [
            'name' => 'Tern Island 1961 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3181'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15796' => [
            'name' => 'Iwo Jima 1945 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3200'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15797' => [
            'name' => 'Ascension Island 1958 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3182'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15798' => [
            'name' => 'Astro DOS 71 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3183'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15799' => [
            'name' => 'Marcus Island 1952 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1872'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15800' => [
            'name' => 'Ayabelle Lighthouse to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1081'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15801' => [
            'name' => 'Bellevue to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3193'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15802' => [
            'name' => 'Camp Area Astro to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3205'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15803' => [
            'name' => 'Phoenix Islands 1966 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3196'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15804' => [
            'name' => 'Cape Canaveral to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3206'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15805' => [
            'name' => 'Solomon 1968 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3198'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15806' => [
            'name' => 'Easter Island 1967 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3188'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15807' => [
            'name' => 'Solomon 1968 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3197'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15808' => [
            'name' => 'Diego Garcia 1969 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3189'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15809' => [
            'name' => 'Johnston Island 1961 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3201'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15810' => [
            'name' => 'Kusaie 1951 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3192'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15811' => [
            'name' => 'Antigua 1943 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1273'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15812' => [
            'name' => 'Deception Island to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3204'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15813' => [
            'name' => 'South Georgia 1968 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3529'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15814' => [
            'name' => 'SIGD61 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3186'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15815' => [
            'name' => 'PN84 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3873'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15816' => [
            'name' => 'Tristan 1968 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3184'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15817' => [
            'name' => 'Midway 1961 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3202'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15818' => [
            'name' => 'Midway 1961 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3202'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15819' => [
            'name' => 'Pitcairn 1967 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3208'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15820' => [
            'name' => 'Santo 1965 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3194'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15822' => [
            'name' => 'Marshall Islands 1960 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3191'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15823' => [
            'name' => 'Wake Island 1952 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3190'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15824' => [
            'name' => 'Old Hawaiian to WGS 84 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1334'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15825' => [
            'name' => 'Old Hawaiian to WGS 84 (4)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1546'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15826' => [
            'name' => 'Old Hawaiian to WGS 84 (5)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1549'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15827' => [
            'name' => 'Old Hawaiian to WGS 84 (6)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1547'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15828' => [
            'name' => 'Old Hawaiian to WGS 84 (7)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1548'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15829' => [
            'name' => 'SIGD61 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3186'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15830' => [
            'name' => 'GCGD59 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3185'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15831' => [
            'name' => 'Korea 2000 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1135'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15833' => [
            'name' => 'RGPF to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1098'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15842' => [
            'name' => 'Hong Kong 1963(67) to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1118'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15843' => [
            'name' => 'PZ-90 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['1262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15844' => [
            'name' => 'Pulkovo 1942 to PZ-90 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['2423'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15846' => [
            'name' => 'Egypt Gulf of Suez S-650 TL to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2341'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15847' => [
            'name' => 'MOP78 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2815'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15848' => [
            'name' => 'ST84 Ile des Pins to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2820'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15849' => [
            'name' => 'Beduaram to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2771'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15850' => [
            'name' => 'IGN 1962 Kerguelen to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2816'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15852' => [
            'name' => 'NAD27 to WGS 84 (80)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3358'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15853' => [
            'name' => 'NAD27 to WGS 84 (81)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3359'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15854' => [
            'name' => 'NAD27 to WGS 84 (82)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3360'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15855' => [
            'name' => 'NAD27 to WGS 84 (83)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3361'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15856' => [
            'name' => 'NAD27 to WGS 84 (84)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3357'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15857' => [
            'name' => 'IGN Astro 1960 / UTM zone 28N to Mauritania 1999 / UTM zone 28N (1)',
            'method' => 'urn:ogc:def:method:EPSG::9624',
            'extent_code' => ['2971'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15858' => [
            'name' => 'IGN Astro 1960 / UTM zone 29N to Mauritania 1999 / UTM zone 29N (1)',
            'method' => 'urn:ogc:def:method:EPSG::9624',
            'extent_code' => ['2970'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15859' => [
            'name' => 'IGN Astro 1960 / UTM zone 30N to Mauritania 1999 / UTM zone 30N (1)',
            'method' => 'urn:ogc:def:method:EPSG::9624',
            'extent_code' => ['2969'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15860' => [
            'name' => 'Mauritania 1999 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1157'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15861' => [
            'name' => 'IGN Astro 1960 / UTM zone 28N to WGS 84 / UTM zone 28N (1)',
            'method' => 'urn:ogc:def:method:EPSG::9624',
            'extent_code' => ['2971'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15862' => [
            'name' => 'IGN Astro 1960 / UTM zone 29N to WGS 84 / UTM zone 29N (1)',
            'method' => 'urn:ogc:def:method:EPSG::9624',
            'extent_code' => ['2970'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15863' => [
            'name' => 'IGN Astro 1960 / UTM zone 30N to WGS 84 / UTM zone 30N (1)',
            'method' => 'urn:ogc:def:method:EPSG::9624',
            'extent_code' => ['2969'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15865' => [
            'name' => 'Pulkovo 1942 to WGS 84 (16)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['2423'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15866' => [
            'name' => 'FD54 to ED50 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3248'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15867' => [
            'name' => 'PD/83 to ETRS89 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['2544'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15868' => [
            'name' => 'RD/83 to ETRS89 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['2545'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15869' => [
            'name' => 'DHDN to WGS 84 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['1343'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15870' => [
            'name' => 'Jouik 1961 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2967'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15872' => [
            'name' => 'Karbala 1979 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3397'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15873' => [
            'name' => 'Douala 1948 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2555'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15874' => [
            'name' => 'Nord Sahara 1959 to WGS 84 (7)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3402'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15875' => [
            'name' => 'Fiji 1956 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3398'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15876' => [
            'name' => 'Fiji 1986 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['1094'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15877' => [
            'name' => 'Fiji 1986 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['3398'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15878' => [
            'name' => 'Vanua Levu 1915 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3401'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15879' => [
            'name' => 'GR96 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1107'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15880' => [
            'name' => 'RGNC91-93 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1174'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15881' => [
            'name' => 'ST87 Ouvea to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2813'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15882' => [
            'name' => 'IGN72 Grande Terre to RGNC91-93 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2822'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15883' => [
            'name' => 'IGN56 Lifou to RGNC91-93 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2814'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15884' => [
            'name' => 'IGN53 Mare to RGNC91-93 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2819'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15885' => [
            'name' => 'ST87 Ouvea to RGNC91-93 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2813'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15886' => [
            'name' => 'NEA74 Noumea to RGNC91-93 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2823'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15887' => [
            'name' => 'IGN72 Grande Terre to RGNC91-93 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['2822'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15888' => [
            'name' => 'IGN72 Grande Terre to RGNC91-93 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['2823'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15889' => [
            'name' => 'NEA74 Noumea to RGNC91-93 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['2823'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15890' => [
            'name' => 'IGN56 Lifou to RGNC91-93 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['2814'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15891' => [
            'name' => 'IGN53 Mare to RGNC91-93 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['2819'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15892' => [
            'name' => 'ST87 Ouvea to RGNC91-93 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['2813'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15893' => [
            'name' => 'ST84 Ile des Pins to RGNC91-93 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['2820'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15894' => [
            'name' => 'SIRGAS 2000 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3418'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15896' => [
            'name' => 'Kertau (RSO) to Kertau 1968 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1309'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15897' => [
            'name' => 'Viti Levu 1912 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3195'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15899' => [
            'name' => 'Scoresbysund 1952 to GR96 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['2570'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15900' => [
            'name' => 'Ammassalik 1958 to GR96 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['2571'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15901' => [
            'name' => 'IGN53 Mare to WGS 84 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2819'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15902' => [
            'name' => 'IGN56 Lifou to WGS 84 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2814'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15903' => [
            'name' => 'IGN72 Grande Terre to WGS 84 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2822'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15904' => [
            'name' => 'NEA74 Noumea to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['2823'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15908' => [
            'name' => 'LGD2006 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1143'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15909' => [
            'name' => 'ELD79 to WGS 84 (8)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3271'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15911' => [
            'name' => 'ID74 to DGN95 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['4020'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15912' => [
            'name' => 'DGN95 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1122'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15913' => [
            'name' => 'NAD27 to WGS 84 (86)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3461'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15914' => [
            'name' => 'BLM zone 14N (US survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3637'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15915' => [
            'name' => 'BLM zone 15N (US survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3640'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15916' => [
            'name' => 'BLM zone 16N (US survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3641'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15917' => [
            'name' => 'BLM zone 17N (US survey feet)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3642'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15918' => [
            'name' => 'Beijing 1954 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3466'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15919' => [
            'name' => 'Beijing 1954 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['3469'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15920' => [
            'name' => 'Beijing 1954 to WGS 84 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['3470'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15921' => [
            'name' => 'Beijing 1954 to WGS 84 (4)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3507'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15922' => [
            'name' => 'Kertau 1968 / Singapore Grid to SVY21 / Singapore TM (1)',
            'method' => 'urn:ogc:def:method:EPSG::9656',
            'extent_code' => ['1210'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15923' => [
            'name' => 'ELD79 to WGS 84 (9)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3477'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15924' => [
            'name' => 'ELD79 to LGD2006 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3271'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15925' => [
            'name' => 'JAD2001 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1128'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15926' => [
            'name' => 'JAD69 to JAD2001 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['3342'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15927' => [
            'name' => 'JAD69 to WGS 84 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['3342'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15928' => [
            'name' => 'BD72 to ETRS89 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['1347'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15929' => [
            'name' => 'BD72 to WGS 84 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['1347'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15931' => [
            'name' => 'NAD83(NSRS2007) to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1511'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15934' => [
            'name' => 'Amersfoort to WGS 84 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['1275'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15935' => [
            'name' => 'Beijing 1954 to WGS 84 (5)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['3561'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15936' => [
            'name' => 'Beijing 1954 to WGS 84 (6)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3466'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15937' => [
            'name' => 'Nahrwan 1967 to WGS 84 (7)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3509'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15938' => [
            'name' => 'Nahrwan 1967 to WGS 84 (8)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['3509'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15950' => [
            'name' => 'Viti Levu 1912 / Viti Levu Grid to Fiji 1986 / Fiji Map Grid (1)',
            'method' => 'urn:ogc:def:method:EPSG::9645',
            'extent_code' => ['3195'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15951' => [
            'name' => 'Vanua Levu 1915 / Vanua Levu Grid to Fiji 1986 / Fiji Map Grid (1)',
            'method' => 'urn:ogc:def:method:EPSG::9645',
            'extent_code' => ['3401'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15952' => [
            'name' => 'Nahrwan 1967 to WGS 84 (9)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3530'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15953' => [
            'name' => 'Nahrwan 1967 to WGS 84 (10)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3531'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15957' => [
            'name' => 'Qornoq 1927 to GR96 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9606',
            'extent_code' => ['3362'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15964' => [
            'name' => 'ED50 to WGS 84 (42)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3537'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15965' => [
            'name' => 'S-JTSK to WGS 84 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1306'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15966' => [
            'name' => 'HTRS96 to ETRS89 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1076'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15967' => [
            'name' => 'HTRS96 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1076'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15969' => [
            'name' => 'Bermuda 1957 to BDA2000 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['3221'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15970' => [
            'name' => 'Bermuda 1957 to WGS 84 (2)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['3221'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15971' => [
            'name' => 'BDA2000 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1047'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15972' => [
            'name' => 'Pitcairn 2006 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3208'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15974' => [
            'name' => 'RSRGD2000 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3558'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15975' => [
            'name' => 'NZGD49 to WGS 84 (4)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3285'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15976' => [
            'name' => 'Slovenia 1996 to WGS 84 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1212'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15977' => [
            'name' => 'Slovenia 1996 to ETRS89 (1)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1212'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15978' => [
            'name' => 'NAD27 to WGS 84 (88)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['1077'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15979' => [
            'name' => 'AGD66 to GDA94 (12)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['3559'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15980' => [
            'name' => 'AGD66 to WGS 84 (18)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['3559'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15993' => [
            'name' => 'Pulkovo 1942(58) to ETRS89 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['1197'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15994' => [
            'name' => 'Pulkovo 1942(58) to ETRS89 (4)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['1197'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15995' => [
            'name' => 'Pulkovo 1942(58) to WGS 84 (19)',
            'method' => 'urn:ogc:def:method:EPSG::9607',
            'extent_code' => ['1197'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15996' => [
            'name' => 'Pulkovo 1942(83) to WGS 84 (3)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1119'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15997' => [
            'name' => 'Pulkovo 1942(58) to WGS 84 (4)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3293'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15998' => [
            'name' => 'Pulkovo 1942(83) to WGS 84 (5)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['1306'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::15999' => [
            'name' => 'Pulkovo 1942(58) to WGS 84 (8)',
            'method' => 'urn:ogc:def:method:EPSG::9603',
            'extent_code' => ['3212'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16000' => [
            'name' => 'UTM grid system (northern hemisphere)',
            'method' => 'urn:ogc:def:method:EPSG::9824',
            'extent_code' => ['1998'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16001' => [
            'name' => 'UTM zone 1N',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1873'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16002' => [
            'name' => 'UTM zone 2N',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1875'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16003' => [
            'name' => 'UTM zone 3N',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1877'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16004' => [
            'name' => 'UTM zone 4N',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1879'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16005' => [
            'name' => 'UTM zone 5N',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1881'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16006' => [
            'name' => 'UTM zone 6N',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1883'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16007' => [
            'name' => 'UTM zone 7N',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1885'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16008' => [
            'name' => 'UTM zone 8N',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1887'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16009' => [
            'name' => 'UTM zone 9N',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1889'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16010' => [
            'name' => 'UTM zone 10N',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1891'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16011' => [
            'name' => 'UTM zone 11N',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1893'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16012' => [
            'name' => 'UTM zone 12N',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1895'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16013' => [
            'name' => 'UTM zone 13N',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1897'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16014' => [
            'name' => 'UTM zone 14N',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1899'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16015' => [
            'name' => 'UTM zone 15N',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1901'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16016' => [
            'name' => 'UTM zone 16N',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1903'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16017' => [
            'name' => 'UTM zone 17N',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1905'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16018' => [
            'name' => 'UTM zone 18N',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1907'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16019' => [
            'name' => 'UTM zone 19N',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1909'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16020' => [
            'name' => 'UTM zone 20N',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1911'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16021' => [
            'name' => 'UTM zone 21N',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1913'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16022' => [
            'name' => 'UTM zone 22N',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1915'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16023' => [
            'name' => 'UTM zone 23N',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1917'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16024' => [
            'name' => 'UTM zone 24N',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1919'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16025' => [
            'name' => 'UTM zone 25N',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1921'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16026' => [
            'name' => 'UTM zone 26N',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1923'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16027' => [
            'name' => 'UTM zone 27N',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1925'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16028' => [
            'name' => 'UTM zone 28N',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1927'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16029' => [
            'name' => 'UTM zone 29N',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1929'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16030' => [
            'name' => 'UTM zone 30N',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1931'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16031' => [
            'name' => 'UTM zone 31N',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1933'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16032' => [
            'name' => 'UTM zone 32N',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1935'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16033' => [
            'name' => 'UTM zone 33N',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1937'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16034' => [
            'name' => 'UTM zone 34N',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1939'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16035' => [
            'name' => 'UTM zone 35N',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1941'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16036' => [
            'name' => 'UTM zone 36N',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1943'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16037' => [
            'name' => 'UTM zone 37N',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1945'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16038' => [
            'name' => 'UTM zone 38N',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1947'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16039' => [
            'name' => 'UTM zone 39N',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1949'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16040' => [
            'name' => 'UTM zone 40N',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1951'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16041' => [
            'name' => 'UTM zone 41N',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1953'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16042' => [
            'name' => 'UTM zone 42N',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1955'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16043' => [
            'name' => 'UTM zone 43N',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1957'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16044' => [
            'name' => 'UTM zone 44N',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1959'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16045' => [
            'name' => 'UTM zone 45N',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1961'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16046' => [
            'name' => 'UTM zone 46N',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1963'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16047' => [
            'name' => 'UTM zone 47N',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1965'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16048' => [
            'name' => 'UTM zone 48N',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1967'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16049' => [
            'name' => 'UTM zone 49N',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1969'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16050' => [
            'name' => 'UTM zone 50N',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1971'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16051' => [
            'name' => 'UTM zone 51N',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1973'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16052' => [
            'name' => 'UTM zone 52N',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1975'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16053' => [
            'name' => 'UTM zone 53N',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1977'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16054' => [
            'name' => 'UTM zone 54N',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1979'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16055' => [
            'name' => 'UTM zone 55N',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1981'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16056' => [
            'name' => 'UTM zone 56N',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1983'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16057' => [
            'name' => 'UTM zone 57N',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1985'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16058' => [
            'name' => 'UTM zone 58N',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1987'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16059' => [
            'name' => 'UTM zone 59N',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1989'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16060' => [
            'name' => 'UTM zone 60N',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1991'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16061' => [
            'name' => 'Universal Polar Stereographic North',
            'method' => 'urn:ogc:def:method:EPSG::9810',
            'extent_code' => ['1996'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16065' => [
            'name' => 'TM35FIN',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1095'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16070' => [
            'name' => '3-degree Gauss-Kruger zone 40',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2628'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16071' => [
            'name' => '3-degree Gauss-Kruger zone 41',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2629'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16072' => [
            'name' => '3-degree Gauss-Kruger zone 42',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2630'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16073' => [
            'name' => '3-degree Gauss-Kruger zone 43',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2631'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16074' => [
            'name' => '3-degree Gauss-Kruger zone 44',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2632'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16075' => [
            'name' => '3-degree Gauss-Kruger zone 45',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2633'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16076' => [
            'name' => '3-degree Gauss-Kruger zone 46',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2634'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16077' => [
            'name' => '3-degree Gauss-Kruger zone 47',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2635'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16078' => [
            'name' => '3-degree Gauss-Kruger zone 48',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2636'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16079' => [
            'name' => '3-degree Gauss-Kruger zone 49',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2637'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16080' => [
            'name' => '3-degree Gauss-Kruger zone 50',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2638'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16081' => [
            'name' => '3-degree Gauss-Kruger zone 51',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2639'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16082' => [
            'name' => '3-degree Gauss-Kruger zone 52',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2640'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16083' => [
            'name' => '3-degree Gauss-Kruger zone 53',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2641'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16084' => [
            'name' => '3-degree Gauss-Kruger zone 54',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2642'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16085' => [
            'name' => '3-degree Gauss-Kruger zone 55',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2643'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16086' => [
            'name' => '3-degree Gauss-Kruger zone 56',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2644'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16087' => [
            'name' => '3-degree Gauss-Kruger zone 57',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2645'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16088' => [
            'name' => '3-degree Gauss-Kruger zone 58',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2646'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16089' => [
            'name' => '3-degree Gauss-Kruger zone 59',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2647'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16091' => [
            'name' => '3-degree Gauss-Kruger zone 61',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2649'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16092' => [
            'name' => '3-degree Gauss-Kruger zone 62',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2650'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16093' => [
            'name' => '3-degree Gauss-Kruger zone 63',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2651'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16094' => [
            'name' => '3-degree Gauss-Kruger zone 64',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2652'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16099' => [
            'name' => '3-degree Gauss-Kruger zone 60',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2648'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16100' => [
            'name' => 'UTM grid system (southern hemisphere)',
            'method' => 'urn:ogc:def:method:EPSG::9824',
            'extent_code' => ['1999'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16101' => [
            'name' => 'UTM zone 1S',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1874'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16102' => [
            'name' => 'UTM zone 2S',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1876'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16103' => [
            'name' => 'UTM zone 3S',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1878'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16104' => [
            'name' => 'UTM zone 4S',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1880'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16105' => [
            'name' => 'UTM zone 5S',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1882'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16106' => [
            'name' => 'UTM zone 6S',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1884'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16107' => [
            'name' => 'UTM zone 7S',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1886'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16108' => [
            'name' => 'UTM zone 8S',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1888'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16109' => [
            'name' => 'UTM zone 9S',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1890'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16110' => [
            'name' => 'UTM zone 10S',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1892'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16111' => [
            'name' => 'UTM zone 11S',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1894'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16112' => [
            'name' => 'UTM zone 12S',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1896'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16113' => [
            'name' => 'UTM zone 13S',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1898'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16114' => [
            'name' => 'UTM zone 14S',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1900'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16115' => [
            'name' => 'UTM zone 15S',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1902'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16116' => [
            'name' => 'UTM zone 16S',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1904'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16117' => [
            'name' => 'UTM zone 17S',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1906'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16118' => [
            'name' => 'UTM zone 18S',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1908'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16119' => [
            'name' => 'UTM zone 19S',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1910'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16120' => [
            'name' => 'UTM zone 20S',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1912'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16121' => [
            'name' => 'UTM zone 21S',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1914'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16122' => [
            'name' => 'UTM zone 22S',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1916'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16123' => [
            'name' => 'UTM zone 23S',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1918'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16124' => [
            'name' => 'UTM zone 24S',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1920'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16125' => [
            'name' => 'UTM zone 25S',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1922'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16126' => [
            'name' => 'UTM zone 26S',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1924'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16127' => [
            'name' => 'UTM zone 27S',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1926'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16128' => [
            'name' => 'UTM zone 28S',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1928'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16129' => [
            'name' => 'UTM zone 29S',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1930'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16130' => [
            'name' => 'UTM zone 30S',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1932'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16131' => [
            'name' => 'UTM zone 31S',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1934'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16132' => [
            'name' => 'UTM zone 32S',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1936'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16133' => [
            'name' => 'UTM zone 33S',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1938'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16134' => [
            'name' => 'UTM zone 34S',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1940'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16135' => [
            'name' => 'UTM zone 35S',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1942'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16136' => [
            'name' => 'UTM zone 36S',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1944'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16137' => [
            'name' => 'UTM zone 37S',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1946'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16138' => [
            'name' => 'UTM zone 38S',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1948'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16139' => [
            'name' => 'UTM zone 39S',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1950'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16140' => [
            'name' => 'UTM zone 40S',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1952'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16141' => [
            'name' => 'UTM zone 41S',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1954'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16142' => [
            'name' => 'UTM zone 42S',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1956'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16143' => [
            'name' => 'UTM zone 43S',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1958'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16144' => [
            'name' => 'UTM zone 44S',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1960'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16145' => [
            'name' => 'UTM zone 45S',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1962'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16146' => [
            'name' => 'UTM zone 46S',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1964'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16147' => [
            'name' => 'UTM zone 47S',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1966'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16148' => [
            'name' => 'UTM zone 48S',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1968'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16149' => [
            'name' => 'UTM zone 49S',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1970'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16150' => [
            'name' => 'UTM zone 50S',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1972'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16151' => [
            'name' => 'UTM zone 51S',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1974'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16152' => [
            'name' => 'UTM zone 52S',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1976'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16153' => [
            'name' => 'UTM zone 53S',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1978'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16154' => [
            'name' => 'UTM zone 54S',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1980'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16155' => [
            'name' => 'UTM zone 55S',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1982'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16156' => [
            'name' => 'UTM zone 56S',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1984'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16157' => [
            'name' => 'UTM zone 57S',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1986'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16158' => [
            'name' => 'UTM zone 58S',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1988'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16159' => [
            'name' => 'UTM zone 59S',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1990'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16160' => [
            'name' => 'UTM zone 60S',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1992'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16161' => [
            'name' => 'Universal Polar Stereographic South',
            'method' => 'urn:ogc:def:method:EPSG::9810',
            'extent_code' => ['1997'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16170' => [
            'name' => '3-degree Gauss-Kruger CM 120E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2628'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16172' => [
            'name' => '3-degree Gauss-Kruger CM 126E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2630'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16174' => [
            'name' => '3-degree Gauss-Kruger CM 132E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2632'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16176' => [
            'name' => '3-degree Gauss-Kruger CM 138E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2634'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16178' => [
            'name' => '3-degree Gauss-Kruger CM 144E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2636'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16180' => [
            'name' => '3-degree Gauss-Kruger CM 150E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2638'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16182' => [
            'name' => '3-degree Gauss-Kruger CM 156E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2640'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16184' => [
            'name' => '3-degree Gauss-Kruger CM 162E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2642'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16186' => [
            'name' => '3-degree Gauss-Kruger CM 168E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2644'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16188' => [
            'name' => '3-degree Gauss-Kruger CM 174E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2646'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16190' => [
            'name' => '3-degree Gauss-Kruger CM 180',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2648'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16192' => [
            'name' => '3-degree Gauss-Kruger CM 174W',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2650'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16194' => [
            'name' => '3-degree Gauss-Kruger CM 168W',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2652'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16202' => [
            'name' => '6-degree Gauss-Kruger zone 2',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2741'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16203' => [
            'name' => '6-degree Gauss-Kruger zone 3',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2742'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16204' => [
            'name' => '6-degree Gauss-Kruger zone 4',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2743'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16205' => [
            'name' => '6-degree Gauss-Kruger zone 5',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2744'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16206' => [
            'name' => '6-degree Gauss-Kruger zone 6',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2745'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16207' => [
            'name' => '6-degree Gauss-Kruger zone 7',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2746'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16208' => [
            'name' => '6-degree Gauss-Kruger zone 8',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1947'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16209' => [
            'name' => '6-degree Gauss-Kruger zone 9',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1949'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16210' => [
            'name' => '6-degree Gauss-Kruger zone 10',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1951'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16211' => [
            'name' => '6-degree Gauss-Kruger zone 11',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1953'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16212' => [
            'name' => '6-degree Gauss-Kruger zone 12',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1955'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16213' => [
            'name' => '6-degree Gauss-Kruger zone 13',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1957'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16214' => [
            'name' => '6-degree Gauss-Kruger zone 14',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1959'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16215' => [
            'name' => '6-degree Gauss-Kruger zone 15',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1961'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16216' => [
            'name' => '6-degree Gauss-Kruger zone 16',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1963'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16217' => [
            'name' => '6-degree Gauss-Kruger zone 17',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1965'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16218' => [
            'name' => '6-degree Gauss-Kruger zone 18',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1967'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16219' => [
            'name' => '6-degree Gauss-Kruger zone 19',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1969'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16220' => [
            'name' => '6-degree Gauss-Kruger zone 20',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1971'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16221' => [
            'name' => '6-degree Gauss-Kruger zone 21',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1973'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16222' => [
            'name' => '6-degree Gauss-Kruger zone 22',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1975'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16223' => [
            'name' => '6-degree Gauss-Kruger zone 23',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1977'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16224' => [
            'name' => '6-degree Gauss-Kruger zone 24',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1979'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16225' => [
            'name' => '6-degree Gauss-Kruger zone 25',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1981'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16226' => [
            'name' => '6-degree Gauss-Kruger zone 26',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1983'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16227' => [
            'name' => '6-degree Gauss-Kruger zone 27',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1985'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16228' => [
            'name' => '6-degree Gauss-Kruger zone 28',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1987'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16229' => [
            'name' => '6-degree Gauss-Kruger zone 29',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1989'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16230' => [
            'name' => '6-degree Gauss-Kruger zone 30',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1991'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16231' => [
            'name' => '6-degree Gauss-Kruger zone 31',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1873'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16232' => [
            'name' => '6-degree Gauss-Kruger zone 32',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1875'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16261' => [
            'name' => '3-degree Gauss-Kruger zone 1',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2299'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16262' => [
            'name' => '3-degree Gauss-Kruger zone 2',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2300'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16263' => [
            'name' => '3-degree Gauss-Kruger zone 3',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2301'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16264' => [
            'name' => '3-degree Gauss-Kruger zone 4',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2302'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16265' => [
            'name' => '3-degree Gauss-Kruger zone 5',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2303'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16266' => [
            'name' => '3-degree Gauss-Kruger zone 6',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2304'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16267' => [
            'name' => '3-degree Gauss-Kruger zone 7',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2305'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16268' => [
            'name' => '3-degree Gauss-Kruger zone 8',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2306'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16269' => [
            'name' => '3-degree Gauss-Kruger zone 9',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2534'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16270' => [
            'name' => '3-degree Gauss-Kruger zone 10',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2535'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16271' => [
            'name' => '3-degree Gauss-Kruger zone 11',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2536'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16272' => [
            'name' => '3-degree Gauss-Kruger zone 12',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2537'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16273' => [
            'name' => '3-degree Gauss-Kruger zone 13',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2538'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16274' => [
            'name' => '3-degree Gauss-Kruger zone 14',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2539'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16275' => [
            'name' => '3-degree Gauss-Kruger zone 15',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2540'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16276' => [
            'name' => '3-degree Gauss-Kruger zone 16',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2604'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16277' => [
            'name' => '3-degree Gauss-Kruger zone 17',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2605'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16278' => [
            'name' => '3-degree Gauss-Kruger zone 18',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2606'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16279' => [
            'name' => '3-degree Gauss-Kruger zone 19',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2607'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16280' => [
            'name' => '3-degree Gauss-Kruger zone 20',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2608'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16281' => [
            'name' => '3-degree Gauss-Kruger zone 21',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2609'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16282' => [
            'name' => '3-degree Gauss-Kruger zone 22',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2610'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16283' => [
            'name' => '3-degree Gauss-Kruger zone 23',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2611'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16284' => [
            'name' => '3-degree Gauss-Kruger zone 24',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2612'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16285' => [
            'name' => '3-degree Gauss-Kruger zone 25',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2613'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16286' => [
            'name' => '3-degree Gauss-Kruger zone 26',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2614'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16287' => [
            'name' => '3-degree Gauss-Kruger zone 27',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2615'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16288' => [
            'name' => '3-degree Gauss-Kruger zone 28',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2616'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16289' => [
            'name' => '3-degree Gauss-Kruger zone 29',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2617'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16290' => [
            'name' => '3-degree Gauss-Kruger zone 30',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2618'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16291' => [
            'name' => '3-degree Gauss-Kruger zone 31',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2619'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16292' => [
            'name' => '3-degree Gauss-Kruger zone 32',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2620'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16293' => [
            'name' => '3-degree Gauss-Kruger zone 33',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2621'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16294' => [
            'name' => '3-degree Gauss-Kruger zone 34',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2622'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16295' => [
            'name' => '3-degree Gauss-Kruger zone 35',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2623'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16296' => [
            'name' => '3-degree Gauss-Kruger zone 36',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2624'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16297' => [
            'name' => '3-degree Gauss-Kruger zone 37',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2625'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16298' => [
            'name' => '3-degree Gauss-Kruger zone 38',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2626'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16299' => [
            'name' => '3-degree Gauss-Kruger zone 39',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2627'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16302' => [
            'name' => 'Gauss-Kruger CM 9E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1935'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16304' => [
            'name' => 'Gauss-Kruger CM 21E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1939'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16305' => [
            'name' => 'Gauss-Kruger CM 27E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1941'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16306' => [
            'name' => 'Gauss-Kruger CM 33E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1943'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16307' => [
            'name' => 'Gauss-Kruger CM 39E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1945'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16308' => [
            'name' => 'Gauss-Kruger CM 45E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1947'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16309' => [
            'name' => 'Gauss-Kruger CM 51E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1949'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16310' => [
            'name' => 'Gauss-Kruger CM 57E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1951'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16311' => [
            'name' => 'Gauss-Kruger CM 63E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1953'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16312' => [
            'name' => 'Gauss-Kruger CM 69E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1955'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16313' => [
            'name' => 'Gauss-Kruger CM 75E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1957'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16314' => [
            'name' => 'Gauss-Kruger CM 81E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1959'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16315' => [
            'name' => 'Gauss-Kruger CM 87E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1961'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16316' => [
            'name' => 'Gauss-Kruger CM 93E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1963'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16317' => [
            'name' => 'Gauss-Kruger CM 99E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1965'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16318' => [
            'name' => 'Gauss-Kruger CM 105E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1967'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16319' => [
            'name' => 'Gauss-Kruger CM 111E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1969'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16320' => [
            'name' => 'Gauss-Kruger CM 117E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1971'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16321' => [
            'name' => 'Gauss-Kruger CM 123E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1973'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16322' => [
            'name' => 'Gauss-Kruger CM 129E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1975'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16323' => [
            'name' => 'Gauss-Kruger CM 135E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1977'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16324' => [
            'name' => 'Gauss-Kruger CM 141E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1979'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16325' => [
            'name' => 'Gauss-Kruger CM 147E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1981'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16326' => [
            'name' => 'Gauss-Kruger CM 153E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1983'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16327' => [
            'name' => 'Gauss-Kruger CM 159E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1985'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16328' => [
            'name' => 'Gauss-Kruger CM 165E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1987'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16329' => [
            'name' => 'Gauss-Kruger CM 171E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1989'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16330' => [
            'name' => 'Gauss-Kruger CM 177E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1991'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16331' => [
            'name' => 'Gauss-Kruger CM 177W',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1873'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16332' => [
            'name' => 'Gauss-Kruger CM 171W',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1875'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16368' => [
            'name' => '3-degree Gauss-Kruger CM 24E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2306'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16370' => [
            'name' => '3-degree Gauss-Kruger CM 30E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2535'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16372' => [
            'name' => '3-degree Gauss-Kruger CM 36E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2537'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16374' => [
            'name' => '3-degree Gauss-Kruger CM 42E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2539'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16376' => [
            'name' => '3-degree Gauss-Kruger CM 48E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2604'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16378' => [
            'name' => '3-degree Gauss-Kruger CM 54E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2606'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16380' => [
            'name' => '3-degree Gauss-Kruger CM 60E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2608'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16382' => [
            'name' => '3-degree Gauss-Kruger CM 66E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2610'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16384' => [
            'name' => '3-degree Gauss-Kruger CM 72E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2612'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16386' => [
            'name' => '3-degree Gauss-Kruger CM 78E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2614'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16388' => [
            'name' => '3-degree Gauss-Kruger CM 84E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2616'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16390' => [
            'name' => '3-degree Gauss-Kruger CM 90E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2618'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16392' => [
            'name' => '3-degree Gauss-Kruger CM 96E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2620'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16394' => [
            'name' => '3-degree Gauss-Kruger CM 102E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2622'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16396' => [
            'name' => '3-degree Gauss-Kruger CM 108E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2624'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16398' => [
            'name' => '3-degree Gauss-Kruger CM 114E',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2626'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16400' => [
            'name' => 'TM 0 N',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1629'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16405' => [
            'name' => 'TM 5 NE',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1630'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16406' => [
            'name' => 'TM 6 NE',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3914'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16411' => [
            'name' => 'TM 11 NE',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1489'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16412' => [
            'name' => 'TM 12 NE',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1482'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16413' => [
            'name' => 'TM 13 NE',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2771'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16430' => [
            'name' => 'TM 30 NE',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2546'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16490' => [
            'name' => 'TM 90 NE',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1041', 10 => '3217'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16506' => [
            'name' => 'TM 106 NE',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1495'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16586' => [
            'name' => 'GK 106 NE',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1494'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16611' => [
            'name' => 'TM 11.30 SE',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1605'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16612' => [
            'name' => 'TM 12 SE',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1604'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16636' => [
            'name' => 'TM 36 SE',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1726'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16709' => [
            'name' => 'TM 109 SE',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2577'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16716' => [
            'name' => 'TM 116 SE',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2588'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::16732' => [
            'name' => 'TM 132 SE',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2589'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17001' => [
            'name' => 'TM 1 NW',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1505'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17005' => [
            'name' => 'TM 5 NW',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2296'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17054' => [
            'name' => 'TM 54 NW',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1727'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17204' => [
            'name' => 'SCAR IMW SP19-20',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2991'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17205' => [
            'name' => 'SCAR IMW SP21-22',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2992'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17206' => [
            'name' => 'SCAR IMW SP23-24',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2993'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17207' => [
            'name' => 'SCAR IMW SQ01-02',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2994'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17208' => [
            'name' => 'SCAR IMW SQ19-20',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2995'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17209' => [
            'name' => 'SCAR IMW SQ21-22',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2996'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17210' => [
            'name' => 'SCAR IMW SQ37-38',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2997'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17211' => [
            'name' => 'SCAR IMW SQ39-40',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2998'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17212' => [
            'name' => 'SCAR IMW SQ41-42',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2999'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17213' => [
            'name' => 'SCAR IMW SQ43-44',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['3000'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17214' => [
            'name' => 'SCAR IMW SQ45-46',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['3001'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17215' => [
            'name' => 'SCAR IMW SQ47-48',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['3002'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17216' => [
            'name' => 'SCAR IMW SQ49-50',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['3003'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17217' => [
            'name' => 'SCAR IMW SQ51-52',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['3004'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17218' => [
            'name' => 'SCAR IMW SQ53-54',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['3005'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17219' => [
            'name' => 'SCAR IMW SQ55-56',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['3006'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17220' => [
            'name' => 'SCAR IMW SQ57-58',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['3007'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17221' => [
            'name' => 'SCAR IMW SR13-14',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['3008'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17222' => [
            'name' => 'SCAR IMW SR15-16',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['3009'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17223' => [
            'name' => 'SCAR IMW SR17-18',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['3010'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17224' => [
            'name' => 'SCAR IMW SR19-20',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['3011'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17225' => [
            'name' => 'SCAR IMW SR27-28',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['3012'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17226' => [
            'name' => 'SCAR IMW SR29-30',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['3013'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17227' => [
            'name' => 'SCAR IMW SR31-32',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['3014'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17228' => [
            'name' => 'SCAR IMW SR33-34',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['3015'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17229' => [
            'name' => 'SCAR IMW SR35-36',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['3016'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17230' => [
            'name' => 'SCAR IMW SR37-38',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['3017'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17231' => [
            'name' => 'SCAR IMW SR39-40',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['3018'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17232' => [
            'name' => 'SCAR IMW SR41-42',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['3019'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17233' => [
            'name' => 'SCAR IMW SR43-44',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['3020'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17234' => [
            'name' => 'SCAR IMW SR45-46',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['3021'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17235' => [
            'name' => 'SCAR IMW SR47-48',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['3022'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17236' => [
            'name' => 'SCAR IMW SR49-50',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['3023'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17237' => [
            'name' => 'SCAR IMW SR51-52',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['3024'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17238' => [
            'name' => 'SCAR IMW SR53-54',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['3025'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17239' => [
            'name' => 'SCAR IMW SR55-56',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['3026'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17240' => [
            'name' => 'SCAR IMW SR57-58',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['3027'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17241' => [
            'name' => 'SCAR IMW SR59-60',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['3028'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17242' => [
            'name' => 'SCAR IMW SS04-06',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['3029'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17243' => [
            'name' => 'SCAR IMW SS07-09',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['3030'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17244' => [
            'name' => 'SCAR IMW SS10-12',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['3031'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17245' => [
            'name' => 'SCAR IMW SS13-15',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['3032'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17246' => [
            'name' => 'SCAR IMW SS16-18',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['3033'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17247' => [
            'name' => 'SCAR IMW SS19-21',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['3034'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17248' => [
            'name' => 'SCAR IMW SS25-27',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['3035'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17249' => [
            'name' => 'SCAR IMW SS28-30',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['3036'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17250' => [
            'name' => 'SCAR IMW SS31-33',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['3037'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17251' => [
            'name' => 'SCAR IMW SS34-36',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['3038'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17252' => [
            'name' => 'SCAR IMW SS37-39',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['3039'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17253' => [
            'name' => 'SCAR IMW SS40-42',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['3040'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17254' => [
            'name' => 'SCAR IMW SS43-45',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['3041'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17255' => [
            'name' => 'SCAR IMW SS46-48',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['3042'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17256' => [
            'name' => 'SCAR IMW SS49-51',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['3043'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17257' => [
            'name' => 'SCAR IMW SS52-54',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['3044'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17258' => [
            'name' => 'SCAR IMW SS55-57',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['3045'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17259' => [
            'name' => 'SCAR IMW SS58-60',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['3046'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17260' => [
            'name' => 'SCAR IMW ST01-04',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['3047'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17261' => [
            'name' => 'SCAR IMW ST05-08',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['3048'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17262' => [
            'name' => 'SCAR IMW ST09-12',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['3049'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17263' => [
            'name' => 'SCAR IMW ST13-16',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['3050'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17264' => [
            'name' => 'SCAR IMW ST17-20',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['3051'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17265' => [
            'name' => 'SCAR IMW ST21-24',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['3052'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17266' => [
            'name' => 'SCAR IMW ST25-28',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['3053'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17267' => [
            'name' => 'SCAR IMW ST29-32',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['3054'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17268' => [
            'name' => 'SCAR IMW ST33-36',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['3055'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17269' => [
            'name' => 'SCAR IMW ST37-40',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['3056'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17270' => [
            'name' => 'SCAR IMW ST41-44',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['3057'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17271' => [
            'name' => 'SCAR IMW ST45-48',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['3058'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17272' => [
            'name' => 'SCAR IMW ST49-52',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['3059'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17273' => [
            'name' => 'SCAR IMW ST53-56',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['3060'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17274' => [
            'name' => 'SCAR IMW ST57-60',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['3061'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17275' => [
            'name' => 'SCAR IMW SU01-05',
            'method' => 'urn:ogc:def:method:EPSG::9829',
            'extent_code' => ['3062'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17276' => [
            'name' => 'SCAR IMW SU06-10',
            'method' => 'urn:ogc:def:method:EPSG::9829',
            'extent_code' => ['3063'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17277' => [
            'name' => 'SCAR IMW SU11-15',
            'method' => 'urn:ogc:def:method:EPSG::9829',
            'extent_code' => ['3064'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17278' => [
            'name' => 'SCAR IMW SU16-20',
            'method' => 'urn:ogc:def:method:EPSG::9829',
            'extent_code' => ['3065'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17279' => [
            'name' => 'SCAR IMW SU21-25',
            'method' => 'urn:ogc:def:method:EPSG::9829',
            'extent_code' => ['3066'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17280' => [
            'name' => 'SCAR IMW SU26-30',
            'method' => 'urn:ogc:def:method:EPSG::9829',
            'extent_code' => ['3067'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17281' => [
            'name' => 'SCAR IMW SU31-35',
            'method' => 'urn:ogc:def:method:EPSG::9829',
            'extent_code' => ['3068'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17282' => [
            'name' => 'SCAR IMW SU36-40',
            'method' => 'urn:ogc:def:method:EPSG::9829',
            'extent_code' => ['3069'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17283' => [
            'name' => 'SCAR IMW SU41-45',
            'method' => 'urn:ogc:def:method:EPSG::9829',
            'extent_code' => ['3070'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17284' => [
            'name' => 'SCAR IMW SU46-50',
            'method' => 'urn:ogc:def:method:EPSG::9829',
            'extent_code' => ['3071'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17285' => [
            'name' => 'SCAR IMW SU51-55',
            'method' => 'urn:ogc:def:method:EPSG::9829',
            'extent_code' => ['3072'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17286' => [
            'name' => 'SCAR IMW SU56-60',
            'method' => 'urn:ogc:def:method:EPSG::9829',
            'extent_code' => ['3073'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17287' => [
            'name' => 'SCAR IMW SV01-10',
            'method' => 'urn:ogc:def:method:EPSG::9829',
            'extent_code' => ['3074'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17288' => [
            'name' => 'SCAR IMW SV11-20',
            'method' => 'urn:ogc:def:method:EPSG::9829',
            'extent_code' => ['3075'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17289' => [
            'name' => 'SCAR IMW SV21-30',
            'method' => 'urn:ogc:def:method:EPSG::9829',
            'extent_code' => ['3076'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17290' => [
            'name' => 'SCAR IMW SV31-40',
            'method' => 'urn:ogc:def:method:EPSG::9829',
            'extent_code' => ['3077'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17291' => [
            'name' => 'SCAR IMW SV41-50',
            'method' => 'urn:ogc:def:method:EPSG::9829',
            'extent_code' => ['3078'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17292' => [
            'name' => 'SCAR IMW SV51-60',
            'method' => 'urn:ogc:def:method:EPSG::9829',
            'extent_code' => ['3079'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17293' => [
            'name' => 'SCAR IMW SW01-60',
            'method' => 'urn:ogc:def:method:EPSG::9829',
            'extent_code' => ['3080'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17294' => [
            'name' => 'USGS Transantarctic Mountains',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['3081'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17295' => [
            'name' => 'North Pole Lambert Azimuthal Equal Area (Bering Sea)',
            'method' => 'urn:ogc:def:method:EPSG::9820',
            'extent_code' => ['3480'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17296' => [
            'name' => 'North Pole Lambert Azimuthal Equal Area (Alaska)',
            'method' => 'urn:ogc:def:method:EPSG::9820',
            'extent_code' => ['3480'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17297' => [
            'name' => 'North Pole Lambert Azimuthal Equal Area (Canada)',
            'method' => 'urn:ogc:def:method:EPSG::9820',
            'extent_code' => ['3480'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17298' => [
            'name' => 'North Pole Lambert Azimuthal Equal Area (Atlantic)',
            'method' => 'urn:ogc:def:method:EPSG::9820',
            'extent_code' => ['3480'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17299' => [
            'name' => 'North Pole Lambert Azimuthal Equal Area (Europe)',
            'method' => 'urn:ogc:def:method:EPSG::9820',
            'extent_code' => ['3480'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17300' => [
            'name' => 'North Pole Lambert Azimuthal Equal Area (Russia)',
            'method' => 'urn:ogc:def:method:EPSG::9820',
            'extent_code' => ['3480'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17321' => [
            'name' => 'SWEREF99 12 00',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2833'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17322' => [
            'name' => 'SWEREF99 13 30',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2834'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17323' => [
            'name' => 'SWEREF99 15 00',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2835'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17324' => [
            'name' => 'SWEREF99 16 30',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2836'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17325' => [
            'name' => 'SWEREF99 18 00',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2837'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17326' => [
            'name' => 'SWEREF99 14 15',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2838'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17327' => [
            'name' => 'SWEREF99 15 45',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2839'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17328' => [
            'name' => 'SWEREF99 17 15',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2840'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17329' => [
            'name' => 'SWEREF99 18 45',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2841'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17330' => [
            'name' => 'SWEREF99 20 15',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2842'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17331' => [
            'name' => 'SWEREF99 21 45',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2843'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17332' => [
            'name' => 'SWEREF99 23 15',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2844'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17333' => [
            'name' => 'SWEREF99 TM',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1225'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17334' => [
            'name' => 'Sweden zone 7.5 gon V',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2845'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17335' => [
            'name' => 'Sweden zone 5 gon V',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2846'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17336' => [
            'name' => 'Sweden zone 0 gon',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2848'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17337' => [
            'name' => 'Sweden zone 2.5 gon O',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2849'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17338' => [
            'name' => 'Sweden zone 5 gon O',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2850'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17339' => [
            'name' => 'RT90 zone 7.5 gon V emulation',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2845'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17340' => [
            'name' => 'RT90 zone 5 gon V emulation',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2846'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17341' => [
            'name' => 'RT90 zone 2.5 gon V emulation',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2847'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17342' => [
            'name' => 'RT90 zone 0 gon emulation',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2848'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17343' => [
            'name' => 'RT90 zone 2.5 gon O emulation',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2849'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17344' => [
            'name' => 'RT90 zone 5 gon O emulation',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2850'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17349' => [
            'name' => 'Map Grid of Australia zone 49',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4176'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17350' => [
            'name' => 'Map Grid of Australia zone 50',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4178'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17351' => [
            'name' => 'Map Grid of Australia zone 51',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1559'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17352' => [
            'name' => 'Map Grid of Australia zone 52',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1560'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17353' => [
            'name' => 'Map Grid of Australia zone 53',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1561'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17354' => [
            'name' => 'Map Grid of Australia zone 54',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1562'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17355' => [
            'name' => 'Map Grid of Australia zone 55',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1563'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17356' => [
            'name' => 'Map Grid of Australia zone 56',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1564'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17357' => [
            'name' => 'Map Grid of Australia zone 57',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4196'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17358' => [
            'name' => 'Map Grid of Australia zone 58',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4175'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17359' => [
            'name' => 'South Australia Lambert',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2986'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17360' => [
            'name' => 'Vicgrid66',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2285'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17361' => [
            'name' => 'Vicgrid',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2285'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17362' => [
            'name' => 'Geoscience Australia Standard National Scale Lambert Projection',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2575'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17363' => [
            'name' => 'Brisbane City Survey Grid 02',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2990'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17364' => [
            'name' => 'New South Wales Lambert',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['3139'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17365' => [
            'name' => 'Australian Albers',
            'method' => 'urn:ogc:def:method:EPSG::9822',
            'extent_code' => ['2575'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17412' => [
            'name' => 'Congo Transverse Mercator zone 12',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3937'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17414' => [
            'name' => 'Congo Transverse Mercator zone 14',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3151'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17416' => [
            'name' => 'Congo Transverse Mercator zone 16',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3152'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17418' => [
            'name' => 'Congo Transverse Mercator zone 18',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3153'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17420' => [
            'name' => 'Congo Transverse Mercator zone 20',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3154'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17422' => [
            'name' => 'Congo Transverse Mercator zone 22',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3155'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17424' => [
            'name' => 'Congo Transverse Mercator zone 24',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3156'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17426' => [
            'name' => 'Congo Transverse Mercator zone 26',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3157'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17428' => [
            'name' => 'Congo Transverse Mercator zone 28',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3158'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17430' => [
            'name' => 'Congo Transverse Mercator zone 30',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3159'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17432' => [
            'name' => 'Indonesia TM-3 zone 46.2',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3976'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17433' => [
            'name' => 'Indonesia TM-3 zone 47.1',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3510'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17434' => [
            'name' => 'Indonesia TM-3 zone 47.2',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3511'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17435' => [
            'name' => 'Indonesia TM-3 zone 48.1',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3512'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17436' => [
            'name' => 'Indonesia TM-3 zone 48.2',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3513'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17437' => [
            'name' => 'Indonesia TM-3 zone 49.1',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3514'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17438' => [
            'name' => 'Indonesia TM-3 zone 49.2',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3515'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17439' => [
            'name' => 'Indonesia TM-3 zone 50.1',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3516'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17440' => [
            'name' => 'Indonesia TM-3 zone 50.2',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3517'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17441' => [
            'name' => 'Indonesia TM-3 zone 51.1',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3518'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17442' => [
            'name' => 'Indonesia TM-3 zone 51.2',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3519'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17443' => [
            'name' => 'Indonesia TM-3 zone 52.1',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3520'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17444' => [
            'name' => 'Indonesia TM-3 zone 52.2',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3521'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17445' => [
            'name' => 'Indonesia TM-3 zone 53.1',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3522'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17446' => [
            'name' => 'Indonesia TM-3 zone 53.2',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3523'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17447' => [
            'name' => 'Indonesia TM-3 zone 54.1',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3975'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17449' => [
            'name' => 'Australian Map Grid zone 49',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1557'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17450' => [
            'name' => 'Australian Map Grid zone 50',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1558'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17451' => [
            'name' => 'Australian Map Grid zone 51',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1559'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17452' => [
            'name' => 'Australian Map Grid zone 52',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1560'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17453' => [
            'name' => 'Australian Map Grid zone 53',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1561'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17454' => [
            'name' => 'Australian Map Grid zone 54',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1567'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17455' => [
            'name' => 'Australian Map Grid zone 55',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1568'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17456' => [
            'name' => 'Australian Map Grid zone 56',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2291'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17457' => [
            'name' => 'Australian Map Grid zone 57',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1565'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17458' => [
            'name' => 'Australian Map Grid zone 58',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1566'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17515' => [
            'name' => 'South African Survey Grid zone 15',
            'method' => 'urn:ogc:def:method:EPSG::9808',
            'extent_code' => ['1454'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17517' => [
            'name' => 'South African Survey Grid zone 17',
            'method' => 'urn:ogc:def:method:EPSG::9808',
            'extent_code' => ['1455'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17519' => [
            'name' => 'South African Survey Grid zone 19',
            'method' => 'urn:ogc:def:method:EPSG::9808',
            'extent_code' => ['1456'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17521' => [
            'name' => 'South African Survey Grid zone 21',
            'method' => 'urn:ogc:def:method:EPSG::9808',
            'extent_code' => ['1457'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17523' => [
            'name' => 'South African Survey Grid zone 23',
            'method' => 'urn:ogc:def:method:EPSG::9808',
            'extent_code' => ['1458'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17525' => [
            'name' => 'South African Survey Grid zone 25',
            'method' => 'urn:ogc:def:method:EPSG::9808',
            'extent_code' => ['1459'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17527' => [
            'name' => 'South African Survey Grid zone 27',
            'method' => 'urn:ogc:def:method:EPSG::9808',
            'extent_code' => ['1460'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17529' => [
            'name' => 'South African Survey Grid zone 29',
            'method' => 'urn:ogc:def:method:EPSG::9808',
            'extent_code' => ['1461'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17531' => [
            'name' => 'South African Survey Grid zone 31',
            'method' => 'urn:ogc:def:method:EPSG::9808',
            'extent_code' => ['1462'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17533' => [
            'name' => 'South African Survey Grid zone 33',
            'method' => 'urn:ogc:def:method:EPSG::9808',
            'extent_code' => ['1463'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17611' => [
            'name' => 'South West African Survey Grid zone 11',
            'method' => 'urn:ogc:def:method:EPSG::9808',
            'extent_code' => ['1838'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17613' => [
            'name' => 'South West African Survey Grid zone 13',
            'method' => 'urn:ogc:def:method:EPSG::9808',
            'extent_code' => ['1839'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17615' => [
            'name' => 'South West African Survey Grid zone 15',
            'method' => 'urn:ogc:def:method:EPSG::9808',
            'extent_code' => ['1840'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17617' => [
            'name' => 'South West African Survey Grid zone 17',
            'method' => 'urn:ogc:def:method:EPSG::9808',
            'extent_code' => ['1841'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17619' => [
            'name' => 'South West African Survey Grid zone 19',
            'method' => 'urn:ogc:def:method:EPSG::9808',
            'extent_code' => ['1842'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17621' => [
            'name' => 'South West African Survey Grid zone 21',
            'method' => 'urn:ogc:def:method:EPSG::9808',
            'extent_code' => ['1843'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17623' => [
            'name' => 'South West African Survey Grid zone 23',
            'method' => 'urn:ogc:def:method:EPSG::9808',
            'extent_code' => ['1844'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17625' => [
            'name' => 'South West African Survey Grid zone 25',
            'method' => 'urn:ogc:def:method:EPSG::9808',
            'extent_code' => ['1845'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17701' => [
            'name' => 'MTM zone 1',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2226'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17702' => [
            'name' => 'MTM zone 2',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2227'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17703' => [
            'name' => 'MTM zone 3',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2290'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17704' => [
            'name' => 'MTM zone 4',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2276'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17705' => [
            'name' => 'MTM zone 5',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2277'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17706' => [
            'name' => 'MTM zone 6',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2278'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17707' => [
            'name' => 'MTM zone 7',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1425'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17708' => [
            'name' => 'MTM zone 8',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2279'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17709' => [
            'name' => 'MTM zone 9',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2280'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17710' => [
            'name' => 'MTM zone 10',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2281'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17711' => [
            'name' => 'MTM zone 11',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1432'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17712' => [
            'name' => 'MTM zone 12',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1433'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17713' => [
            'name' => 'MTM zone 13',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1434'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17714' => [
            'name' => 'MTM zone 14',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1435'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17715' => [
            'name' => 'MTM zone 15',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1436'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17716' => [
            'name' => 'MTM zone 16',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1437'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17717' => [
            'name' => 'MTM zone 17',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1438'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17722' => [
            'name' => 'Alberta 3-degree TM reference meridian 111 W',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3543'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17723' => [
            'name' => 'Alberta 3-degree TM reference meridian 114 W',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3542'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17724' => [
            'name' => 'Alberta 3-degree TM reference meridian 117 W',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3541'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17726' => [
            'name' => 'Alberta 3-degree TM reference meridian 120 W',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3540'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17794' => [
            'name' => 'MTM Nova Scotia zone 4',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1534'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17795' => [
            'name' => 'MTM Nova Scotia zone 5',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1535'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17801' => [
            'name' => 'Japan Plane Rectangular CS zone I',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1854'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17802' => [
            'name' => 'Japan Plane Rectangular CS zone II',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1855'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17803' => [
            'name' => 'Japan Plane Rectangular CS zone III',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1856'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17804' => [
            'name' => 'Japan Plane Rectangular CS zone IV',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1857'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17805' => [
            'name' => 'Japan Plane Rectangular CS zone V',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1858'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17806' => [
            'name' => 'Japan Plane Rectangular CS zone VI',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1859'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17807' => [
            'name' => 'Japan Plane Rectangular CS zone VII',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1860'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17808' => [
            'name' => 'Japan Plane Rectangular CS zone VIII',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1861'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17809' => [
            'name' => 'Japan Plane Rectangular CS zone IX',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1862'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17810' => [
            'name' => 'Japan Plane Rectangular CS zone X',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1863'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17811' => [
            'name' => 'Japan Plane Rectangular CS zone XI',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1864'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17812' => [
            'name' => 'Japan Plane Rectangular CS zone XII',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1865'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17813' => [
            'name' => 'Japan Plane Rectangular CS zone XIII',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1866'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17814' => [
            'name' => 'Japan Plane Rectangular CS zone XIV',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1867'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17815' => [
            'name' => 'Japan Plane Rectangular CS zone XV',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1868'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17816' => [
            'name' => 'Japan Plane Rectangular CS zone XVI',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1869'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17817' => [
            'name' => 'Japan Plane Rectangular CS zone XVII',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1870'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17818' => [
            'name' => 'Japan Plane Rectangular CS zone XVIII',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1871'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17819' => [
            'name' => 'Japan Plane Rectangular CS zone XIX',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1872'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17901' => [
            'name' => 'Mount Eden Circuit',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3781'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17902' => [
            'name' => 'Bay of Plenty Circuit',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3779'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17903' => [
            'name' => 'Poverty Bay Circuit',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3780'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17904' => [
            'name' => 'Hawkes Bay Circuit',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3772'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17905' => [
            'name' => 'Taranaki Circuit',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3777'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17906' => [
            'name' => 'Tuhirangi Circuit',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3778'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17907' => [
            'name' => 'Wanganui Circuit',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3776'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17908' => [
            'name' => 'Wairarapa Circuit',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3775'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17909' => [
            'name' => 'Wellington Circuit',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3774'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17910' => [
            'name' => 'Collingwood Circuit',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3782'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17911' => [
            'name' => 'Nelson Circuit',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3784'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17912' => [
            'name' => 'Karamea Circuit',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3783'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17913' => [
            'name' => 'Buller Circuit',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3786'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17914' => [
            'name' => 'Grey Circuit',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3787'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17915' => [
            'name' => 'Amuri Circuit',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3788'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17916' => [
            'name' => 'Marlborough Circuit',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3785'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17917' => [
            'name' => 'Hokitika Circuit',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3789'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17918' => [
            'name' => 'Okarito Circuit',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3791'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17919' => [
            'name' => 'Jacksons Bay Circuit',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3794'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17920' => [
            'name' => 'Mount Pleasant Circuit',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3790'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17921' => [
            'name' => 'Gawler Circuit',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3792'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17922' => [
            'name' => 'Timaru Circuit',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3793'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17923' => [
            'name' => 'Lindis Peak Circuit',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3795'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17924' => [
            'name' => 'Mount Nicholas Circuit',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3797'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17925' => [
            'name' => 'Mount York Circuit',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3799'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17926' => [
            'name' => 'Observation Point Circuit',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3796'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17927' => [
            'name' => 'North Taieri Circuit',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3798'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17928' => [
            'name' => 'Bluff Circuit',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3800'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17931' => [
            'name' => 'Mount Eden 2000',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3781'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17932' => [
            'name' => 'Bay of Plenty 2000',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3779'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17933' => [
            'name' => 'Poverty Bay 2000',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3780'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17934' => [
            'name' => 'Hawkes Bay 2000',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3772'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17935' => [
            'name' => 'Taranaki 2000',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3777'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17936' => [
            'name' => 'Tuhirangi 2000',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3778'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17937' => [
            'name' => 'Wanganui 2000',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3776'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17938' => [
            'name' => 'Wairarapa 2000',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3775'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17939' => [
            'name' => 'Wellington 2000',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3774'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17940' => [
            'name' => 'Collingwood 2000',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3782'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17941' => [
            'name' => 'Nelson 2000',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3784'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17942' => [
            'name' => 'Karamea 2000',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3783'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17943' => [
            'name' => 'Buller 2000',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3786'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17944' => [
            'name' => 'Grey 2000',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3787'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17945' => [
            'name' => 'Amuri 2000',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3788'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17946' => [
            'name' => 'Marlborough 2000',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3785'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17947' => [
            'name' => 'Hokitika 2000',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3789'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17948' => [
            'name' => 'Okarito 2000',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3791'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17949' => [
            'name' => 'Jacksons Bay 2000',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3794'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17950' => [
            'name' => 'Mount Pleasant 2000',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3790'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17951' => [
            'name' => 'Gawler 2000',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3792'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17952' => [
            'name' => 'Timaru 2000',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3793'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17953' => [
            'name' => 'Lindis Peak 2000',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3795'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17954' => [
            'name' => 'Mount Nicholas 2000',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3797'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17955' => [
            'name' => 'Mount York 2000',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3799'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17956' => [
            'name' => 'Observation Point 2000',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3796'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17957' => [
            'name' => 'North Taieri 2000',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3798'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17958' => [
            'name' => 'Bluff 2000',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3800'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17959' => [
            'name' => 'Chatham Island Circuit 2000',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2889'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17960' => [
            'name' => 'Auckland Islands Transverse Mercator 2000',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3554'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17961' => [
            'name' => 'Campbell Island Transverse Mercator 2000',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3555'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17962' => [
            'name' => 'Antipodes Islands Transverse Mercator 2000',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3556'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17963' => [
            'name' => 'Raoul Island Transverse Mercator 2000',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3557'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17964' => [
            'name' => 'New Zealand Continental Shelf Lambert Conformal 2000',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['3593'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17965' => [
            'name' => 'Chatham Islands Transverse Mercator 2000',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2889'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::17966' => [
            'name' => 'Darwin Glacier Lambert Conformal 2000',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['3592'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18001' => [
            'name' => 'Austria Gauss-Kruger West Zone',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1706'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18002' => [
            'name' => 'Austria Gauss-Kruger Central Zone',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1707'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18003' => [
            'name' => 'Austria Gauss-Kruger East Zone',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1708'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18004' => [
            'name' => 'Austria Gauss-Kruger West',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1706'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18005' => [
            'name' => 'Austria Gauss-Kruger Central',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1707'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18006' => [
            'name' => 'Austria Gauss-Kruger East',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1708'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18007' => [
            'name' => 'Austria Gauss-Kruger M28',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1706'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18008' => [
            'name' => 'Austria Gauss-Kruger M31',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1707'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18009' => [
            'name' => 'Austria Gauss-Kruger M34',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1708'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18011' => [
            'name' => 'Nord Algerie (ancienne)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['1728'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18012' => [
            'name' => 'Sud Algerie (ancienne)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['1729'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18021' => [
            'name' => 'Nord Algerie',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['1728'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18022' => [
            'name' => 'Sud Algerie',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['1729'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18031' => [
            'name' => 'Argentina zone 1',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1608'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18032' => [
            'name' => 'Argentina zone 2',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1609'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18033' => [
            'name' => 'Argentina zone 3',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1610'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18034' => [
            'name' => 'Argentina zone 4',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1611'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18035' => [
            'name' => 'Argentina zone 5',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1612'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18036' => [
            'name' => 'Argentina zone 6',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1613'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18037' => [
            'name' => 'Argentina zone 7',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1614'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18041' => [
            'name' => 'Austria West Zone',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1706'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18042' => [
            'name' => 'Austria Central Zone',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1707'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18043' => [
            'name' => 'Austria East Zone',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1708'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18044' => [
            'name' => 'Austria M28',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1706'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18045' => [
            'name' => 'Austria M31',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1707'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18046' => [
            'name' => 'Austria M34',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1708'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18047' => [
            'name' => 'Austria zone M28',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1706'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18048' => [
            'name' => 'Austria zone M31',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1707'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18049' => [
            'name' => 'Austria zone M34',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1708'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18051' => [
            'name' => 'Colombia West zone',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1598'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18052' => [
            'name' => 'Colombia Bogota zone',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1599'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18053' => [
            'name' => 'Colombia East Central zone',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1600'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18054' => [
            'name' => 'Colombia East zone',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1601'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18055' => [
            'name' => 'Colombia MAGNA Far West zone',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3091'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18056' => [
            'name' => 'Colombia MAGNA West zone',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3090'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18057' => [
            'name' => 'Colombia MAGNA Bogota zone',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1599', 5 => '3229'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18058' => [
            'name' => 'Colombia MAGNA East Central zone',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1600'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18059' => [
            'name' => 'Colombia MAGNA East zone',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1601'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18063' => [
            'name' => 'Cuba Norte',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['1487'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18064' => [
            'name' => 'Cuba Sur',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['1488'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18071' => [
            'name' => 'Egypt Blue Belt',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1642'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18072' => [
            'name' => 'Egypt Red Belt',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1643'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18073' => [
            'name' => 'Egypt Purple Belt',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1644'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18074' => [
            'name' => 'Egypt Extended Purple Belt',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1645'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18081' => [
            'name' => 'Lambert zone I',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['1731'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18082' => [
            'name' => 'Lambert zone II',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['1734'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18083' => [
            'name' => 'Lambert zone III',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['1733'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18084' => [
            'name' => 'Lambert zone IV',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['1327'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18085' => [
            'name' => 'Lambert-93',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['1326'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18091' => [
            'name' => 'Lambert Nord France',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['1731'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18092' => [
            'name' => 'Lambert Centre France',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['1734'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18093' => [
            'name' => 'Lambert Sud France',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['1733'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18094' => [
            'name' => 'Lambert Corse',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['1327'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18101' => [
            'name' => 'France Conic Conformal zone 1',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['3545'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18102' => [
            'name' => 'France Conic Conformal zone 2',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['3546'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18103' => [
            'name' => 'France Conic Conformal zone 3',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['3547'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18104' => [
            'name' => 'France Conic Conformal zone 4',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['3548'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18105' => [
            'name' => 'France Conic Conformal zone 5',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['3549'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18106' => [
            'name' => 'France Conic Conformal zone 6',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['3550'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18107' => [
            'name' => 'France Conic Conformal zone 7',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['3551'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18108' => [
            'name' => 'France Conic Conformal zone 8',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['3552'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18109' => [
            'name' => 'France Conic Conformal zone 9',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['3553'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18110' => [
            'name' => 'India zone 0',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['1668'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18111' => [
            'name' => 'India zone I',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['1669'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18112' => [
            'name' => 'India zone IIa',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['1670'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18113' => [
            'name' => 'India zone IIb',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['1671'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18114' => [
            'name' => 'India zone IIIa',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['1672'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18116' => [
            'name' => 'India zone IVa',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['1673'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18121' => [
            'name' => 'Italy zone 1',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1718'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18122' => [
            'name' => 'Italy zone 2',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1719'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18131' => [
            'name' => 'Nord Maroc',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['1703'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18132' => [
            'name' => 'Sud Maroc',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['2787'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18134' => [
            'name' => 'Sahara Nord',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['2788'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18135' => [
            'name' => 'Sahara Sud',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['2789'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18141' => [
            'name' => 'New Zealand North Island National Grid',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1500'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18142' => [
            'name' => 'New Zealand South Island National Grid',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3344'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18151' => [
            'name' => 'Nigeria West Belt',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1715'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18152' => [
            'name' => 'Nigeria Mid Belt',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1714'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18153' => [
            'name' => 'Nigeria East Belt',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1713'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18161' => [
            'name' => 'Peru west zone',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1753'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18162' => [
            'name' => 'Peru central zone',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1752'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18163' => [
            'name' => 'Peru east zone',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1751'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18171' => [
            'name' => 'Philippines zone I',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1698'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18172' => [
            'name' => 'Philippines zone II',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1699'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18173' => [
            'name' => 'Philippines zone III',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1700'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18174' => [
            'name' => 'Philippines zone IV',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1701'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18175' => [
            'name' => 'Philippines zone V',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1702'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18180' => [
            'name' => 'Finland zone 0',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3092'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18181' => [
            'name' => 'Nord Tunisie',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['1619'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18182' => [
            'name' => 'Sud Tunisie',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['1620'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18183' => [
            'name' => 'Finland ETRS-GK19',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3092'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18184' => [
            'name' => 'Finland ETRS-GK20',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3093'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18185' => [
            'name' => 'Finland ETRS-GK21',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3094'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18186' => [
            'name' => 'Finland ETRS-GK22',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3095'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18187' => [
            'name' => 'Finland ETRS-GK23',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3096'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18188' => [
            'name' => 'Finland ETRS-GK24',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3097'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18189' => [
            'name' => 'Finland ETRS-GK25',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3098'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18190' => [
            'name' => 'Finland ETRS-GK26',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3099'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18191' => [
            'name' => 'Finland zone 1',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1536'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18192' => [
            'name' => 'Finland zone 2',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1537'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18193' => [
            'name' => 'Finland Uniform Coordinate System',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1538', 5 => '3333'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18194' => [
            'name' => 'Finland zone 4',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1539'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18195' => [
            'name' => 'Finland ETRS-GK27',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3100'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18196' => [
            'name' => 'Finland ETRS-GK28',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3101'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18197' => [
            'name' => 'Finland ETRS-GK29',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3102'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18198' => [
            'name' => 'Finland ETRS-GK30',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3103'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18199' => [
            'name' => 'Finland ETRS-GK31',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3104'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18201' => [
            'name' => 'Palestine Grid',
            'method' => 'urn:ogc:def:method:EPSG::9806',
            'extent_code' => ['1356'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18202' => [
            'name' => 'Palestine Belt',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1356'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18203' => [
            'name' => 'Israeli CS',
            'method' => 'urn:ogc:def:method:EPSG::9806',
            'extent_code' => ['2603'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18204' => [
            'name' => 'Israeli TM',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2603'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18205' => [
            'name' => 'Finland zone 5',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3385'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18211' => [
            'name' => 'Guatemala Norte',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['2120'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18212' => [
            'name' => 'Guatemala Sur',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['2121'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18221' => [
            'name' => 'NGO zone I',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1741'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18222' => [
            'name' => 'NGO zone II',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1742'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18223' => [
            'name' => 'NGO zone III',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1743'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18224' => [
            'name' => 'NGO zone IV',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1744'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18225' => [
            'name' => 'NGO zone V',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1745'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18226' => [
            'name' => 'NGO zone VI',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1746'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18227' => [
            'name' => 'NGO zone VII',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1747'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18228' => [
            'name' => 'NGO zone VIII',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1748'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18231' => [
            'name' => 'India zone I (1975 metres)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['1676'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18232' => [
            'name' => 'India zone IIa (1975 metres)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['1677'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18233' => [
            'name' => 'India zone IIIa (1975 metres)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['1672'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18234' => [
            'name' => 'India zone IVa (1975 metres)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['1673'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18235' => [
            'name' => 'India zone IIb (1975 metres)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['1678'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18236' => [
            'name' => 'India zone I (1962 metres)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['1685'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18237' => [
            'name' => 'India zone IIa (1962 metres)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['1686'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18238' => [
            'name' => 'India zone IIb (1937 metres)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['3217'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18240' => [
            'name' => 'Libya zone 5',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1470'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18241' => [
            'name' => 'Libya zone 6',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1471'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18242' => [
            'name' => 'Libya zone 7',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1472'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18243' => [
            'name' => 'Libya zone 8',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1473'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18244' => [
            'name' => 'Libya zone 9',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1474'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18245' => [
            'name' => 'Libya zone 10',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1475'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18246' => [
            'name' => 'Libya zone 11',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1476'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18247' => [
            'name' => 'Libya zone 12',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1477'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18248' => [
            'name' => 'Libya zone 13',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1478'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18251' => [
            'name' => 'Korea East Belt',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3726'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18252' => [
            'name' => 'Korea Central Belt',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3716'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18253' => [
            'name' => 'Korea West Belt',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3713'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18260' => [
            'name' => 'Maracaibo Grid (M1)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['1319'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18261' => [
            'name' => 'Maracaibo Grid',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['1319'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18262' => [
            'name' => 'Maracaibo Grid (M3)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['1319'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18263' => [
            'name' => 'Maracaibo La Rosa Grid',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['1319'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18275' => [
            'name' => 'Balkans zone 5',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1709'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18276' => [
            'name' => 'Balkans zone 6',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1710'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18277' => [
            'name' => 'Balkans zone 7',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1711'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18278' => [
            'name' => 'Balkans zone 8',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1712'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18280' => [
            'name' => 'Poland zone I',
            'method' => 'urn:ogc:def:method:EPSG::9809',
            'extent_code' => ['1515'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18282' => [
            'name' => 'Poland zone II',
            'method' => 'urn:ogc:def:method:EPSG::9809',
            'extent_code' => ['1516'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18283' => [
            'name' => 'Poland zone III',
            'method' => 'urn:ogc:def:method:EPSG::9809',
            'extent_code' => ['1517'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18284' => [
            'name' => 'Poland zone IV',
            'method' => 'urn:ogc:def:method:EPSG::9809',
            'extent_code' => ['1518'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18285' => [
            'name' => 'Poland zone V',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1519'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18286' => [
            'name' => 'GUGiK-80',
            'method' => 'urn:ogc:def:method:EPSG::9809',
            'extent_code' => ['1192'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18300' => [
            'name' => 'Poland CS92',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1192'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18305' => [
            'name' => 'Poland CS2000 zone 5',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1520'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18306' => [
            'name' => 'Poland CS2000 zone 6',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1521'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18307' => [
            'name' => 'Poland CS2000 zone 7',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1522'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18308' => [
            'name' => 'Poland CS2000 zone 8',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1523'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18310' => [
            'name' => 'Libya TM zone 5',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1470'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18311' => [
            'name' => 'Libya TM zone 6',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1471'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18312' => [
            'name' => 'Libya TM zone 7',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1472'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18313' => [
            'name' => 'Libya TM zone 8',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1473'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18314' => [
            'name' => 'Libya TM zone 9',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1474'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18315' => [
            'name' => 'Libya TM zone 10',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1475'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18316' => [
            'name' => 'Libya TM zone 11',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1476'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18317' => [
            'name' => 'Libya TM zone 12',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1477'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18318' => [
            'name' => 'Libya TM zone 13',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1478'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18319' => [
            'name' => 'Libya TM',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1143'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18401' => [
            'name' => 'Kp2000 Jylland og Fyn',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2531'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18402' => [
            'name' => 'Kp2000 Sjaelland',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2532'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18403' => [
            'name' => 'Kp2000 Bornholm',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2533'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18415' => [
            'name' => 'French Equatorial Africa west zone',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2552'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18425' => [
            'name' => 'Greenland zone 5 east',
            'method' => 'urn:ogc:def:method:EPSG::9826',
            'extent_code' => ['2560'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18426' => [
            'name' => 'Greenland zone 6 east',
            'method' => 'urn:ogc:def:method:EPSG::9826',
            'extent_code' => ['2561'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18427' => [
            'name' => 'Greenland zone 7 east',
            'method' => 'urn:ogc:def:method:EPSG::9826',
            'extent_code' => ['2562'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18428' => [
            'name' => 'Greenland zone 8 east',
            'method' => 'urn:ogc:def:method:EPSG::9826',
            'extent_code' => ['2569'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18432' => [
            'name' => 'Greenland zone 2 west',
            'method' => 'urn:ogc:def:method:EPSG::9826',
            'extent_code' => ['2563'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18433' => [
            'name' => 'Greenland zone 3 west',
            'method' => 'urn:ogc:def:method:EPSG::9826',
            'extent_code' => ['2564'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18434' => [
            'name' => 'Greenland zone 4 west',
            'method' => 'urn:ogc:def:method:EPSG::9826',
            'extent_code' => ['2565'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18435' => [
            'name' => 'Greenland zone 5 west',
            'method' => 'urn:ogc:def:method:EPSG::9826',
            'extent_code' => ['2566'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18436' => [
            'name' => 'Greenland zone 6 west',
            'method' => 'urn:ogc:def:method:EPSG::9826',
            'extent_code' => ['2567'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18437' => [
            'name' => 'Greenland zone 7 west',
            'method' => 'urn:ogc:def:method:EPSG::9826',
            'extent_code' => ['2568'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18441' => [
            'name' => 'CS63 zone A1',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2772'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18442' => [
            'name' => 'CS63 zone A2',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2773'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18443' => [
            'name' => 'CS63 zone A3',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2774'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18444' => [
            'name' => 'CS63 zone A4',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2775'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18446' => [
            'name' => 'CS63 zone K2',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2776'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18447' => [
            'name' => 'CS63 zone K3',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2777'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18448' => [
            'name' => 'CS63 zone K4',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2778'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18450' => [
            'name' => 'CS63 zone C0',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3173'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18451' => [
            'name' => 'CS63 zone C1',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3174'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::18452' => [
            'name' => 'CS63 zone C2',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3175'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19838' => [
            'name' => 'Rectified Skew Orthomorphic Sarawak LSD (metres)',
            'method' => 'urn:ogc:def:method:EPSG::9812',
            'extent_code' => ['4611'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19839' => [
            'name' => 'Dubai Local Transverse Mercator',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3531'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19840' => [
            'name' => 'IBCAO Polar Stereographic',
            'method' => 'urn:ogc:def:method:EPSG::9829',
            'extent_code' => ['1996'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19841' => [
            'name' => 'Swiss Oblique Mercator 1903C (Greenwich)',
            'method' => 'urn:ogc:def:method:EPSG::9815',
            'extent_code' => ['1144'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19842' => [
            'name' => 'Arctic Polar Stereographic',
            'method' => 'urn:ogc:def:method:EPSG::9829',
            'extent_code' => ['1996'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19843' => [
            'name' => 'Mercator 41',
            'method' => 'urn:ogc:def:method:EPSG::9805',
            'extent_code' => ['3508'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19844' => [
            'name' => 'Ministry of Transport of Quebec Lambert',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['1368'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19845' => [
            'name' => 'Slovene National Grid',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1212'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19848' => [
            'name' => 'Pitcairn TM 2006',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3208'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19849' => [
            'name' => 'Bermuda 2000 National Grid',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1047'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19851' => [
            'name' => 'Croatia Transverse Mercator',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1076'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19852' => [
            'name' => 'Croatia Lambert Conformal Conic',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['1076'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19853' => [
            'name' => 'Portugual TM06',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1294'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19854' => [
            'name' => 'South Georgia Lambert',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['3529'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19856' => [
            'name' => 'TM Reunion',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3337'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19857' => [
            'name' => 'Northwest Territories Lambert',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['3481'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19858' => [
            'name' => 'Yukon Albers',
            'method' => 'urn:ogc:def:method:EPSG::9822',
            'extent_code' => ['2417'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19859' => [
            'name' => 'Fiji Map Grid',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1094'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19860' => [
            'name' => 'Jamaica Metric Grid 2001',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['3342'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19861' => [
            'name' => 'Laborde Grid',
            'method' => 'urn:ogc:def:method:EPSG::9813',
            'extent_code' => ['1149'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19862' => [
            'name' => 'Belgian Lambert 2005',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['1347'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19863' => [
            'name' => 'South China Sea Lambert',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['3470'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19864' => [
            'name' => 'Singapore Transverse Mercator',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1210'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19865' => [
            'name' => 'US NSIDC Sea Ice polar stereographic north',
            'method' => 'urn:ogc:def:method:EPSG::9829',
            'extent_code' => ['1996'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19866' => [
            'name' => 'US NSIDC Sea Ice polar stereographic south',
            'method' => 'urn:ogc:def:method:EPSG::9829',
            'extent_code' => ['1997'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19870' => [
            'name' => 'Faroe Lambert',
            'method' => 'urn:ogc:def:method:EPSG::9826',
            'extent_code' => ['3248'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19871' => [
            'name' => 'Rectified Skew Orthomorphic Malaya Grid (chains)',
            'method' => 'urn:ogc:def:method:EPSG::9812',
            'extent_code' => ['1690'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19872' => [
            'name' => 'Rectified Skew Orthomorphic Malaya Grid (metres)',
            'method' => 'urn:ogc:def:method:EPSG::9812',
            'extent_code' => ['1690'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19873' => [
            'name' => 'Noumea Lambert',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2823'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19874' => [
            'name' => 'Noumea Lambert 2',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2823'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19875' => [
            'name' => 'Ontario MNR Lambert',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['1367'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19876' => [
            'name' => 'ST74',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3408'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19877' => [
            'name' => 'Faroe Lambert fk89',
            'method' => 'urn:ogc:def:method:EPSG::9826',
            'extent_code' => ['3248'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19878' => [
            'name' => 'Vanua Levu Grid',
            'method' => 'urn:ogc:def:method:EPSG::9833',
            'extent_code' => ['3401'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19879' => [
            'name' => 'Viti Levu Grid',
            'method' => 'urn:ogc:def:method:EPSG::9806',
            'extent_code' => ['3195'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19881' => [
            'name' => 'Alberta 10-degree TM (Forest)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2376'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19882' => [
            'name' => 'Alberta 10-degree TM (Resource)',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2376'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19883' => [
            'name' => 'World Mercator',
            'method' => 'urn:ogc:def:method:EPSG::9804',
            'extent_code' => ['3391'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19884' => [
            'name' => 'Caspian Sea Mercator',
            'method' => 'urn:ogc:def:method:EPSG::9805',
            'extent_code' => ['1291'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19885' => [
            'name' => 'Kelantan Grid',
            'method' => 'urn:ogc:def:method:EPSG::9806',
            'extent_code' => ['3384'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19886' => [
            'name' => 'Perak Grid',
            'method' => 'urn:ogc:def:method:EPSG::9806',
            'extent_code' => ['3383'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19887' => [
            'name' => 'Kedah and Perlis Grid',
            'method' => 'urn:ogc:def:method:EPSG::9806',
            'extent_code' => ['3382'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19888' => [
            'name' => 'Pinang Grid',
            'method' => 'urn:ogc:def:method:EPSG::9806',
            'extent_code' => ['3381'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19889' => [
            'name' => 'Terengganu Grid',
            'method' => 'urn:ogc:def:method:EPSG::9806',
            'extent_code' => ['3380'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19890' => [
            'name' => 'Selangor Grid',
            'method' => 'urn:ogc:def:method:EPSG::9806',
            'extent_code' => ['3379'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19891' => [
            'name' => 'Pahang Grid',
            'method' => 'urn:ogc:def:method:EPSG::9806',
            'extent_code' => ['3378'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19892' => [
            'name' => 'Sembilan and Melaka Grid',
            'method' => 'urn:ogc:def:method:EPSG::9806',
            'extent_code' => ['3377'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19893' => [
            'name' => 'Johor Grid',
            'method' => 'urn:ogc:def:method:EPSG::9806',
            'extent_code' => ['3376'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19894' => [
            'name' => 'Borneo RSO',
            'method' => 'urn:ogc:def:method:EPSG::9812',
            'extent_code' => ['1362'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19895' => [
            'name' => 'Peninsular RSO',
            'method' => 'urn:ogc:def:method:EPSG::9812',
            'extent_code' => ['3955'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19896' => [
            'name' => 'Hong Kong 1963 Grid',
            'method' => 'urn:ogc:def:method:EPSG::9806',
            'extent_code' => ['1118'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19897' => [
            'name' => 'Statistics Canada Lambert',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['1061'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19899' => [
            'name' => 'Mauritius Grid',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['3209'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19900' => [
            'name' => 'Bahrain State Grid',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1040'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19901' => [
            'name' => 'Belge Lambert 50',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['1347'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19902' => [
            'name' => 'Belge Lambert 72',
            'method' => 'urn:ogc:def:method:EPSG::9803',
            'extent_code' => ['1347'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19903' => [
            'name' => 'Nord de Guerre',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['1369'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19904' => [
            'name' => 'Ghana Metre Grid',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1104'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19905' => [
            'name' => 'Netherlands East Indies Equatorial Zone',
            'method' => 'urn:ogc:def:method:EPSG::9804',
            'extent_code' => ['4020'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19906' => [
            'name' => 'Iraq zone',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['2294'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19907' => [
            'name' => 'Iraq National Grid',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3625'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19909' => [
            'name' => 'Jamaica (Old Grid)',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['3342'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19910' => [
            'name' => 'Jamaica National Grid',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['3342'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19911' => [
            'name' => 'Laborde Grid approximation',
            'method' => 'urn:ogc:def:method:EPSG::9815',
            'extent_code' => ['1149'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19913' => [
            'name' => 'RD Old',
            'method' => 'urn:ogc:def:method:EPSG::9809',
            'extent_code' => ['1275'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19914' => [
            'name' => 'RD New',
            'method' => 'urn:ogc:def:method:EPSG::9809',
            'extent_code' => ['1275'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19916' => [
            'name' => 'British National Grid',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['4390'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19917' => [
            'name' => 'New Zealand Map Grid',
            'method' => 'urn:ogc:def:method:EPSG::9811',
            'extent_code' => ['3973'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19919' => [
            'name' => 'Qatar National Grid',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1195'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19920' => [
            'name' => 'Singapore Grid',
            'method' => 'urn:ogc:def:method:EPSG::9806',
            'extent_code' => ['1210'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19921' => [
            'name' => 'Spain',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['2366'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19922' => [
            'name' => 'Swiss Oblique Mercator 1903M',
            'method' => 'urn:ogc:def:method:EPSG::9815',
            'extent_code' => ['1286'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19923' => [
            'name' => 'Swiss Oblique Mercator 1903C',
            'method' => 'urn:ogc:def:method:EPSG::9815',
            'extent_code' => ['1286'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19924' => [
            'name' => 'Tobago Grid',
            'method' => 'urn:ogc:def:method:EPSG::9806',
            'extent_code' => ['1322'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19925' => [
            'name' => 'Trinidad Grid',
            'method' => 'urn:ogc:def:method:EPSG::9806',
            'extent_code' => ['1339'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19926' => [
            'name' => 'Stereo 70',
            'method' => 'urn:ogc:def:method:EPSG::9809',
            'extent_code' => ['1197'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19927' => [
            'name' => 'Stereo 33',
            'method' => 'urn:ogc:def:method:EPSG::9809',
            'extent_code' => ['1197'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19929' => [
            'name' => 'Sweden zone 2.5 gon V',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2847', 10 => '3313'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19930' => [
            'name' => 'Greek Grid',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3254'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19931' => [
            'name' => 'Egyseges Orszagos Vetuleti',
            'method' => 'urn:ogc:def:method:EPSG::9815',
            'extent_code' => ['1119'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19933' => [
            'name' => 'Prince Edward Island Stereographic (ATS77)',
            'method' => 'urn:ogc:def:method:EPSG::9809',
            'extent_code' => ['1533'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19934' => [
            'name' => 'Lithuania 1994',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1145'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19936' => [
            'name' => 'Portuguese National Grid',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1294'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19937' => [
            'name' => 'Tunisia Mining Grid',
            'method' => 'urn:ogc:def:method:EPSG::9816',
            'extent_code' => ['1618'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19938' => [
            'name' => 'Estonian National Grid',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['1090'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19939' => [
            'name' => 'TM Baltic 93',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1646'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19940' => [
            'name' => 'Levant Zone',
            'method' => 'urn:ogc:def:method:EPSG::9817',
            'extent_code' => ['1623'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19941' => [
            'name' => 'Brazil Polyconic',
            'method' => 'urn:ogc:def:method:EPSG::9818',
            'extent_code' => ['1053'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19942' => [
            'name' => 'British West Indies Grid',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2295'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19943' => [
            'name' => 'Barbados National Grid',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3218'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19944' => [
            'name' => 'Quebec Lambert Projection',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['1368'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19945' => [
            'name' => 'New Brunswick Stereographic (ATS77)',
            'method' => 'urn:ogc:def:method:EPSG::9809',
            'extent_code' => ['1447'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19946' => [
            'name' => 'New Brunswick Stereographic (NAD83)',
            'method' => 'urn:ogc:def:method:EPSG::9809',
            'extent_code' => ['1447'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19947' => [
            'name' => 'Austria Lambert',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['1037'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19948' => [
            'name' => 'Syria Lambert',
            'method' => 'urn:ogc:def:method:EPSG::9801',
            'extent_code' => ['1623'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19949' => [
            'name' => 'Levant Stereographic',
            'method' => 'urn:ogc:def:method:EPSG::9809',
            'extent_code' => ['1623'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19950' => [
            'name' => 'Swiss Oblique Mercator 1995',
            'method' => 'urn:ogc:def:method:EPSG::9815',
            'extent_code' => ['1286'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19951' => [
            'name' => 'Nakhl e Taqi Oblique Mercator',
            'method' => 'urn:ogc:def:method:EPSG::9815',
            'extent_code' => ['1338'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19952' => [
            'name' => 'Krovak',
            'method' => 'urn:ogc:def:method:EPSG::9819',
            'extent_code' => ['1306'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19953' => [
            'name' => 'Qatar Grid',
            'method' => 'urn:ogc:def:method:EPSG::9806',
            'extent_code' => ['1346'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19954' => [
            'name' => 'Suriname Old TM',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1222'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19955' => [
            'name' => 'Suriname TM',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1222'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19956' => [
            'name' => 'Rectified Skew Orthomorphic Borneo Grid (chains)',
            'method' => 'urn:ogc:def:method:EPSG::9815',
            'extent_code' => ['1362'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19957' => [
            'name' => 'Rectified Skew Orthomorphic Borneo Grid (feet)',
            'method' => 'urn:ogc:def:method:EPSG::9815',
            'extent_code' => ['3977'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19958' => [
            'name' => 'Rectified Skew Orthomorphic Borneo Grid (metres)',
            'method' => 'urn:ogc:def:method:EPSG::9815',
            'extent_code' => ['1362'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19959' => [
            'name' => 'Ghana National Grid',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1104'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19960' => [
            'name' => 'Prince Edward Isl. Stereographic (NAD83)',
            'method' => 'urn:ogc:def:method:EPSG::9809',
            'extent_code' => ['1533'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19961' => [
            'name' => 'Belgian Lambert 72',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['1347'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19962' => [
            'name' => 'Irish Transverse Mercator',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1305'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19963' => [
            'name' => 'Sierra Leone New Colony Grid',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1342'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19964' => [
            'name' => 'New War Office Sierra Leone Grid',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1342'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19966' => [
            'name' => 'Luxembourg Gauss',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1146'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19967' => [
            'name' => 'Slovenia Grid',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1212'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19969' => [
            'name' => 'Portuguese Grid',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1294'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19971' => [
            'name' => 'New Zealand Transverse Mercator 2000',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['3973'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19972' => [
            'name' => 'Irish Grid',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1305'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19973' => [
            'name' => 'Irish National Grid',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2530'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19974' => [
            'name' => 'Modified Portuguese Grid',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1294'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19975' => [
            'name' => 'Trinidad Grid (Clarke\'s feet)',
            'method' => 'urn:ogc:def:method:EPSG::9806',
            'extent_code' => ['1339'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19976' => [
            'name' => 'ICN Regional',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['1251'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19977' => [
            'name' => 'Aramco Lambert',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['3303'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19978' => [
            'name' => 'Hong Kong 1980 Grid',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1118'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19979' => [
            'name' => 'Portugal Bonne',
            'method' => 'urn:ogc:def:method:EPSG::9828',
            'extent_code' => ['1294'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19981' => [
            'name' => 'Lambert New Caledonia',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['3430'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19983' => [
            'name' => 'Terre Adelie Polar Stereographic',
            'method' => 'urn:ogc:def:method:EPSG::9830',
            'extent_code' => ['2818'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19984' => [
            'name' => 'British Columbia Albers',
            'method' => 'urn:ogc:def:method:EPSG::9822',
            'extent_code' => ['2832'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19985' => [
            'name' => 'Europe Conformal 2001',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2881'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19986' => [
            'name' => 'Europe Equal Area 2001',
            'method' => 'urn:ogc:def:method:EPSG::9820',
            'extent_code' => ['2881'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19987' => [
            'name' => 'Iceland Lambert 1900',
            'method' => 'urn:ogc:def:method:EPSG::9826',
            'extent_code' => ['3262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19988' => [
            'name' => 'Iceland Lambert 1955',
            'method' => 'urn:ogc:def:method:EPSG::9826',
            'extent_code' => ['3262'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19989' => [
            'name' => 'Iceland Lambert 1993',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['1120'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19990' => [
            'name' => 'Latvian Transverse Mercator',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1139'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19991' => [
            'name' => 'Jan Mayen Grid',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2869'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19992' => [
            'name' => 'Antarctic Polar Stereographic',
            'method' => 'urn:ogc:def:method:EPSG::9829',
            'extent_code' => ['1031'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19993' => [
            'name' => 'Australian Antarctic Polar Stereographic',
            'method' => 'urn:ogc:def:method:EPSG::9829',
            'extent_code' => ['1278'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19994' => [
            'name' => 'Australian Antarctic Lambert',
            'method' => 'urn:ogc:def:method:EPSG::9802',
            'extent_code' => ['2880'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19995' => [
            'name' => 'Jordan Transverse Mercator',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1130'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19996' => [
            'name' => 'Soldner Berlin',
            'method' => 'urn:ogc:def:method:EPSG::9806',
            'extent_code' => ['2898'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19997' => [
            'name' => 'Kuwait Transverse Mercator',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['1310'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19998' => [
            'name' => 'Guernsey Grid',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2989'],
        ],
        'urn:ogc:def:coordinateOperation:EPSG::19999' => [
            'name' => 'Jersey Transverse Mercator',
            'method' => 'urn:ogc:def:method:EPSG::9807',
            'extent_code' => ['2988'],
        ],
    ];

    public static function getOperationData(string $srid): array
    {
        return static::$sridData[$srid];
    }
}
