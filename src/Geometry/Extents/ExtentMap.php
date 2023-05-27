<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\Geometry\Extents;

/**
 * @internal
 */
class ExtentMap
{
    protected static array $sridData = [
        1024 => [
            'name' => 'Afghanistan',
        ],
        1025 => [
            'name' => 'Albania',
        ],
        1026 => [
            'name' => 'Algeria',
        ],
        1029 => [
            'name' => 'Angola',
        ],
        1031 => [
            'name' => 'Antarctica',
        ],
        1033 => [
            'name' => 'Argentina',
        ],
        1036 => [
            'name' => 'Australia - onshore and EEZ',
        ],
        1037 => [
            'name' => 'Austria',
        ],
        1040 => [
            'name' => 'Bahrain',
        ],
        1041 => [
            'name' => 'Bangladesh',
        ],
        1047 => [
            'name' => 'Bermuda',
        ],
        1048 => [
            'name' => 'Bhutan',
        ],
        1049 => [
            'name' => 'Bolivia',
        ],
        1050 => [
            'name' => 'Bosnia and Herzegovina',
        ],
        1051 => [
            'name' => 'Botswana',
        ],
        1053 => [
            'name' => 'Brazil',
        ],
        1055 => [
            'name' => 'Brunei',
        ],
        1056 => [
            'name' => 'Bulgaria',
        ],
        1057 => [
            'name' => 'Burkina Faso',
        ],
        1058 => [
            'name' => 'Burundi',
        ],
        1061 => [
            'name' => 'Canada',
        ],
        1062 => [
            'name' => 'Cape Verde',
        ],
        1063 => [
            'name' => 'Cayman Islands',
        ],
        1066 => [
            'name' => 'Chile',
        ],
        1067 => [
            'name' => 'China',
        ],
        1069 => [
            'name' => 'Cocos (Keeling) Islands - onshore',
        ],
        1070 => [
            'name' => 'Colombia',
        ],
        1072 => [
            'name' => 'Congo',
        ],
        1074 => [
            'name' => 'Costa Rica',
        ],
        1075 => [
            'name' => 'Cote d\'Ivoire (Ivory Coast)',
        ],
        1076 => [
            'name' => 'Croatia',
        ],
        1077 => [
            'name' => 'Cuba',
        ],
        1078 => [
            'name' => 'Cyprus',
        ],
        1079 => [
            'name' => 'Czechia',
        ],
        1081 => [
            'name' => 'Djibouti',
        ],
        1086 => [
            'name' => 'Egypt',
        ],
        1087 => [
            'name' => 'El Salvador',
        ],
        1089 => [
            'name' => 'Eritrea',
        ],
        1090 => [
            'name' => 'Estonia',
        ],
        1091 => [
            'name' => 'Ethiopia',
        ],
        1093 => [
            'name' => 'Faroe Islands',
        ],
        1094 => [
            'name' => 'Fiji - onshore',
        ],
        1095 => [
            'name' => 'Finland',
        ],
        1096 => [
            'name' => 'France',
        ],
        1097 => [
            'name' => 'French Guiana',
        ],
        1098 => [
            'name' => 'French Polynesia',
        ],
        1100 => [
            'name' => 'Gabon',
        ],
        1102 => [
            'name' => 'Georgia',
        ],
        1103 => [
            'name' => 'Germany',
        ],
        1104 => [
            'name' => 'Ghana',
        ],
        1105 => [
            'name' => 'Gibraltar',
        ],
        1107 => [
            'name' => 'Greenland',
        ],
        1114 => [
            'name' => 'Guyana',
        ],
        1118 => [
            'name' => 'China - Hong Kong',
        ],
        1119 => [
            'name' => 'Hungary',
        ],
        1120 => [
            'name' => 'Iceland',
        ],
        1121 => [
            'name' => 'India',
        ],
        1122 => [
            'name' => 'Indonesia',
        ],
        1123 => [
            'name' => 'Iran',
        ],
        1124 => [
            'name' => 'Iraq',
        ],
        1126 => [
            'name' => 'Israel',
        ],
        1127 => [
            'name' => 'Italy',
        ],
        1128 => [
            'name' => 'Jamaica',
        ],
        1129 => [
            'name' => 'Japan',
        ],
        1130 => [
            'name' => 'Jordan',
        ],
        1131 => [
            'name' => 'Kazakhstan',
        ],
        1135 => [
            'name' => 'Korea, Republic of (South Korea)',
        ],
        1137 => [
            'name' => 'Kyrgyzstan',
        ],
        1138 => [
            'name' => 'Laos',
        ],
        1139 => [
            'name' => 'Latvia',
        ],
        1141 => [
            'name' => 'Lesotho',
        ],
        1143 => [
            'name' => 'Libya',
        ],
        1144 => [
            'name' => 'Liechtenstein',
        ],
        1145 => [
            'name' => 'Lithuania',
        ],
        1146 => [
            'name' => 'Luxembourg',
        ],
        1147 => [
            'name' => 'China - Macao',
        ],
        1148 => [
            'name' => 'North Macedonia',
        ],
        1149 => [
            'name' => 'Madagascar - onshore and nearshore',
        ],
        1150 => [
            'name' => 'Malawi',
        ],
        1151 => [
            'name' => 'Malaysia',
        ],
        1153 => [
            'name' => 'Mali',
        ],
        1156 => [
            'name' => 'Martinique',
        ],
        1157 => [
            'name' => 'Mauritania',
        ],
        1159 => [
            'name' => 'Mayotte',
        ],
        1160 => [
            'name' => 'Mexico',
        ],
        1162 => [
            'name' => 'Moldova',
        ],
        1167 => [
            'name' => 'Mozambique',
        ],
        1169 => [
            'name' => 'Namibia',
        ],
        1171 => [
            'name' => 'Nepal',
        ],
        1172 => [
            'name' => 'Netherlands',
        ],
        1174 => [
            'name' => 'New Caledonia',
        ],
        1175 => [
            'name' => 'New Zealand',
        ],
        1177 => [
            'name' => 'Niger',
        ],
        1178 => [
            'name' => 'Nigeria',
        ],
        1183 => [
            'name' => 'Oman',
        ],
        1184 => [
            'name' => 'Pakistan',
        ],
        1186 => [
            'name' => 'Panama',
        ],
        1187 => [
            'name' => 'Papua New Guinea',
        ],
        1188 => [
            'name' => 'Paraguay',
        ],
        1189 => [
            'name' => 'Peru',
        ],
        1190 => [
            'name' => 'Philippines',
        ],
        1192 => [
            'name' => 'Poland',
        ],
        1195 => [
            'name' => 'Qatar',
        ],
        1197 => [
            'name' => 'Romania',
        ],
        1198 => [
            'name' => 'Russia',
        ],
        1206 => [
            'name' => 'Saudi Arabia',
        ],
        1207 => [
            'name' => 'Senegal',
        ],
        1210 => [
            'name' => 'Singapore',
        ],
        1211 => [
            'name' => 'Slovakia',
        ],
        1212 => [
            'name' => 'Slovenia',
        ],
        1213 => [
            'name' => 'Solomon Islands - onshore main islands',
        ],
        1220 => [
            'name' => 'St Pierre and Miquelon',
        ],
        1222 => [
            'name' => 'Suriname',
        ],
        1224 => [
            'name' => 'Eswatini',
        ],
        1225 => [
            'name' => 'Sweden',
        ],
        1228 => [
            'name' => 'Taiwan',
        ],
        1232 => [
            'name' => 'Togo',
        ],
        1234 => [
            'name' => 'Tonga',
        ],
        1236 => [
            'name' => 'Tunisia',
        ],
        1237 => [
            'name' => 'Turkey',
        ],
        1242 => [
            'name' => 'Ukraine',
        ],
        1243 => [
            'name' => 'UAE',
        ],
        1245 => [
            'name' => 'USA',
        ],
        1247 => [
            'name' => 'Uruguay',
        ],
        1251 => [
            'name' => 'Venezuela',
        ],
        1255 => [
            'name' => 'Wallis and Futuna',
        ],
        1257 => [
            'name' => 'Yemen',
        ],
        1260 => [
            'name' => 'Zambia',
        ],
        1261 => [
            'name' => 'Zimbabwe',
        ],
        1262 => [
            'name' => 'World',
        ],
        1264 => [
            'name' => 'UK - Great Britain onshore and nearshore; Isle of Man',
        ],
        1271 => [
            'name' => 'Africa - Eritrea, Ethiopia, South Sudan and Sudan',
        ],
        1272 => [
            'name' => 'Asia - Middle East - Bahrain, Kuwait and Saudi Arabia',
        ],
        1273 => [
            'name' => 'Antigua - onshore',
        ],
        1274 => [
            'name' => 'Brazil - Aratu',
        ],
        1275 => [
            'name' => 'Netherlands - onshore',
        ],
        1276 => [
            'name' => 'Africa - Botswana, Malawi, Zambia, Zimbabwe',
        ],
        1277 => [
            'name' => 'Africa - Burundi, Kenya, Rwanda, Tanzania and Uganda',
        ],
        1278 => [
            'name' => 'Antarctica - Australian sector',
        ],
        1279 => [
            'name' => 'Australasia - Australia and PNG - AGD66',
        ],
        1282 => [
            'name' => 'Australia - Tasmania',
        ],
        1283 => [
            'name' => 'Canada - Maritime Provinces',
        ],
        1285 => [
            'name' => 'Indonesia - Bali, Java and western Sumatra onshore',
        ],
        1286 => [
            'name' => 'Europe - Liechtenstein and Switzerland',
        ],
        1287 => [
            'name' => 'Indonesia - Banga & Belitung Islands',
        ],
        1288 => [
            'name' => 'Angola - Angola proper',
        ],
        1289 => [
            'name' => 'Canada - CGVD28',
        ],
        1290 => [
            'name' => 'Africa - Botswana, Eswatini, Lesotho and South Africa',
        ],
        1291 => [
            'name' => 'Asia - FSU - Caspian Sea',
        ],
        1292 => [
            'name' => 'Argentina - Neuquen province',
        ],
        1293 => [
            'name' => 'Brazil - Corrego Alegre 1970-1972',
        ],
        1294 => [
            'name' => 'Portugal - mainland - onshore',
        ],
        1296 => [
            'name' => 'Europe - ED50 by country',
        ],
        1297 => [
            'name' => 'Europe - west',
        ],
        1298 => [
            'name' => 'Europe - ETRF by country',
        ],
        1299 => [
            'name' => 'Europe - EVRF2000',
        ],
        1300 => [
            'name' => 'Iran - FD58',
        ],
        1301 => [
            'name' => 'Portugal - Azores C - onshore',
        ],
        1302 => [
            'name' => 'Asia - Cambodia and Vietnam - mainland',
        ],
        1303 => [
            'name' => 'South America - Tierra del Fuego',
        ],
        1304 => [
            'name' => 'Asia - Myanmar and Thailand onshore',
        ],
        1305 => [
            'name' => 'Europe - Ireland (Republic and Ulster) - onshore',
        ],
        1306 => [
            'name' => 'Europe - Czechoslovakia',
        ],
        1307 => [
            'name' => 'Asia - Bangladesh; India; Myanmar; Pakistan - onshore',
        ],
        1308 => [
            'name' => 'Asia - Bangladesh; India; Myanmar; Pakistan - onshore',
        ],
        1309 => [
            'name' => 'Asia - Malaysia (west) and Singapore',
        ],
        1310 => [
            'name' => 'Kuwait - Kuwait City',
        ],
        1312 => [
            'name' => 'Venezuela - Lake Maracaibo',
        ],
        1313 => [
            'name' => 'Venezuela - north of 7°45\'N',
        ],
        1314 => [
            'name' => 'Portugal - Madeira archipelago onshore',
        ],
        1315 => [
            'name' => 'Mozambique - west - Tete province',
        ],
        1316 => [
            'name' => 'Indonesia - Sulawesi SW',
        ],
        1318 => [
            'name' => 'Angola - Cabinda',
        ],
        1319 => [
            'name' => 'Venezuela - Maracaibo area',
        ],
        1321 => [
            'name' => 'Europe - Austria and former Yugoslavia onshore',
        ],
        1322 => [
            'name' => 'Trinidad and Tobago - Tobago - onshore',
        ],
        1323 => [
            'name' => 'USA - CONUS - onshore',
        ],
        1325 => [
            'name' => 'North America - Canada and USA (CONUS, Alaska mainland)',
        ],
        1326 => [
            'name' => 'France - mainland onshore',
        ],
        1327 => [
            'name' => 'France - Corsica onshore',
        ],
        1328 => [
            'name' => 'Indonesia - Kalimantan - Mahakam delta',
        ],
        1329 => [
            'name' => 'Mozambique - south',
        ],
        1330 => [
            'name' => 'USA - Alaska',
        ],
        1331 => [
            'name' => 'USA - Alaska - St. George Island',
        ],
        1332 => [
            'name' => 'USA - Alaska - St. Lawrence Island',
        ],
        1333 => [
            'name' => 'USA - Alaska - St. Paul Island',
        ],
        1334 => [
            'name' => 'USA - Hawaii - onshore',
        ],
        1335 => [
            'name' => 'Caribbean - Puerto Rico and Virgin Islands - onshore',
        ],
        1337 => [
            'name' => 'USA - HARN',
        ],
        1338 => [
            'name' => 'Iran - Taheri refinery',
        ],
        1339 => [
            'name' => 'Trinidad and Tobago - Trinidad',
        ],
        1340 => [
            'name' => 'Yemen - South Yemen - mainland',
        ],
        1342 => [
            'name' => 'Sierra Leone - Freetown Peninsula',
        ],
        1343 => [
            'name' => 'Germany - East Germany all states',
        ],
        1344 => [
            'name' => 'Portugal - Azores W - onshore',
        ],
        1345 => [
            'name' => 'Portugal - Azores E - onshore',
        ],
        1346 => [
            'name' => 'Qatar - onshore',
        ],
        1347 => [
            'name' => 'Belgium - onshore',
        ],
        1348 => [
            'name' => 'South America - PSAD56 by country',
        ],
        1349 => [
            'name' => 'North America - NAD27',
        ],
        1350 => [
            'name' => 'North America - NAD83',
        ],
        1351 => [
            'name' => 'Asia - Middle East - Qatar offshore and UAE',
        ],
        1352 => [
            'name' => 'Norway - onshore',
        ],
        1354 => [
            'name' => 'Europe - British Isles - UK and Ireland onshore',
        ],
        1356 => [
            'name' => 'Asia - Middle East - Israel, Jordan and Palestine onshore',
        ],
        1358 => [
            'name' => 'South America - SAD69 by country',
        ],
        1359 => [
            'name' => 'Indonesia - Kalimantan SE',
        ],
        1360 => [
            'name' => 'Indonesia - Kalimantan E',
        ],
        1362 => [
            'name' => 'Asia - Brunei and East Malaysia',
        ],
        1363 => [
            'name' => 'UAE - Abu Dhabi and Dubai - onshore',
        ],
        1364 => [
            'name' => 'Asia - Japan and Korea',
        ],
        1365 => [
            'name' => 'Algeria - north of 32°N',
        ],
        1367 => [
            'name' => 'Canada - Ontario',
        ],
        1368 => [
            'name' => 'Canada - Quebec',
        ],
        1369 => [
            'name' => 'France - Alsace',
        ],
        1375 => [
            'name' => 'USA - California',
        ],
        1377 => [
            'name' => 'USA - Connecticut',
        ],
        1378 => [
            'name' => 'USA - Delaware',
        ],
        1379 => [
            'name' => 'USA - Florida',
        ],
        1381 => [
            'name' => 'USA - Idaho',
        ],
        1385 => [
            'name' => 'USA - Kansas',
        ],
        1386 => [
            'name' => 'USA - Kentucky',
        ],
        1387 => [
            'name' => 'USA - Louisiana',
        ],
        1389 => [
            'name' => 'USA - Maryland',
        ],
        1391 => [
            'name' => 'USA - Michigan',
        ],
        1393 => [
            'name' => 'USA - Mississippi',
        ],
        1395 => [
            'name' => 'USA - Montana',
        ],
        1396 => [
            'name' => 'USA - Nebraska',
        ],
        1398 => [
            'name' => 'USA - New Hampshire',
        ],
        1399 => [
            'name' => 'USA - New Jersey',
        ],
        1402 => [
            'name' => 'USA - North Carolina',
        ],
        1406 => [
            'name' => 'USA - Oregon',
        ],
        1408 => [
            'name' => 'USA - Rhode Island',
        ],
        1409 => [
            'name' => 'USA - South Carolina',
        ],
        1411 => [
            'name' => 'USA - Tennessee',
        ],
        1412 => [
            'name' => 'USA - Texas',
        ],
        1414 => [
            'name' => 'USA - Vermont',
        ],
        1415 => [
            'name' => 'USA - Virginia',
        ],
        1418 => [
            'name' => 'USA - Wisconsin',
        ],
        1419 => [
            'name' => 'USA - Wyoming',
        ],
        1422 => [
            'name' => 'Canada - Quebec - 63°W to 60°W',
        ],
        1423 => [
            'name' => 'Canada - Quebec - 66°W to 63°W',
        ],
        1424 => [
            'name' => 'Canada - Quebec - 69°W to 66°W',
        ],
        1425 => [
            'name' => 'Canada - Quebec - 72°W to 69°W',
        ],
        1426 => [
            'name' => 'Canada - Quebec - 75°W to 72°W',
        ],
        1427 => [
            'name' => 'Canada - Quebec - 78°W to 75°W',
        ],
        1428 => [
            'name' => 'Canada - Quebec - west of 78°W',
        ],
        1429 => [
            'name' => 'Canada - Ontario - east of 75°W',
        ],
        1430 => [
            'name' => 'Canada - Ontario - 78°W to 75°W',
        ],
        1431 => [
            'name' => 'Canada - Ontario - MTM zone 10',
        ],
        1432 => [
            'name' => 'Canada - Ontario - MTM zone 11',
        ],
        1433 => [
            'name' => 'Canada - Ontario - MTM zone 12',
        ],
        1434 => [
            'name' => 'Canada - Ontario - MTM zone 13',
        ],
        1435 => [
            'name' => 'Canada - Ontario - 88.5°W to 85.5°W',
        ],
        1436 => [
            'name' => 'Canada - Ontario - 91.5°W to 88.5°W',
        ],
        1437 => [
            'name' => 'Canada - Ontario - 94.5°W to 91.5°W',
        ],
        1438 => [
            'name' => 'Canada - Ontario - west of 94.5°W',
        ],
        1439 => [
            'name' => 'Canada - Ontario - west of 90°W',
        ],
        1440 => [
            'name' => 'Canada - Ontario - 90°W to 84°W',
        ],
        1441 => [
            'name' => 'Canada - Ontario - 84°W to 78°W',
        ],
        1442 => [
            'name' => 'Canada - Ontario - east of 78°W',
        ],
        1443 => [
            'name' => 'Canada - Quebec - 78°W to 72°W',
        ],
        1444 => [
            'name' => 'Canada - Quebec - 72°W to 66°W',
        ],
        1445 => [
            'name' => 'Canada - Quebec - 66°W to 60°W',
        ],
        1446 => [
            'name' => 'Canada - Quebec - east of 60°W',
        ],
        1447 => [
            'name' => 'Canada - New Brunswick',
        ],
        1450 => [
            'name' => 'Cote d\'Ivoire (Ivory Coast) - east of 6°W',
        ],
        1451 => [
            'name' => 'Cote d\'Ivoire (Ivory Coast) - west of 6°W',
        ],
        1452 => [
            'name' => 'Vietnam - west of 108°E onshore',
        ],
        1453 => [
            'name' => 'Vietnam - east of 108°E onshore',
        ],
        1454 => [
            'name' => 'Namibia - Walvis Bay',
        ],
        1455 => [
            'name' => 'South Africa - west of 18°E',
        ],
        1456 => [
            'name' => 'South Africa - 18°E to 20°E',
        ],
        1457 => [
            'name' => 'South Africa - 20°E to 22°E',
        ],
        1458 => [
            'name' => 'South Africa - 22°E to 24°E',
        ],
        1459 => [
            'name' => 'South Africa - 24°E to 26°E',
        ],
        1460 => [
            'name' => 'South Africa - 26°E to 28°E',
        ],
        1461 => [
            'name' => 'South Africa - 28°E to 30°E',
        ],
        1462 => [
            'name' => 'South Africa - 30°E to 32°E',
        ],
        1463 => [
            'name' => 'South Africa - east of 32°E',
        ],
        1464 => [
            'name' => 'Iran - west of 48°E',
        ],
        1465 => [
            'name' => 'Iran - 48°E to 54°E',
        ],
        1466 => [
            'name' => 'Iran - 54°E to 60°E',
        ],
        1467 => [
            'name' => 'Iran - east of 60°E onshore',
        ],
        1468 => [
            'name' => 'Guinea - west of 12°W',
        ],
        1469 => [
            'name' => 'Guinea - east of 12°W',
        ],
        1470 => [
            'name' => 'Libya - west of 10°E',
        ],
        1471 => [
            'name' => 'Libya - 10°E to 12°E onshore',
        ],
        1472 => [
            'name' => 'Libya - 12°E to 14°E onshore',
        ],
        1473 => [
            'name' => 'Libya - 14°E to 16°E onshore',
        ],
        1474 => [
            'name' => 'Libya - 16°E to 18°E onshore',
        ],
        1475 => [
            'name' => 'Libya - 18°E to 20°E onshore',
        ],
        1476 => [
            'name' => 'Libya - 20°E to 22°E onshore',
        ],
        1477 => [
            'name' => 'Libya - 22°E to 24°E onshore',
        ],
        1478 => [
            'name' => 'Libya - east of 24°E onshore',
        ],
        1479 => [
            'name' => 'Libya - west of 12°E onshore',
        ],
        1480 => [
            'name' => 'Libya - 12°E to 18°E onshore',
        ],
        1481 => [
            'name' => 'Libya - 18°E to 24°E onshore',
        ],
        1482 => [
            'name' => 'Libya - west of 15°E onshore',
        ],
        1483 => [
            'name' => 'Argentina - Mendoza and Neuquen 70.5°W to 67.5°W',
        ],
        1484 => [
            'name' => 'Argentina - 42.5°S to 50.3°S and 70.5°W to 67.5°W',
        ],
        1485 => [
            'name' => 'Argentina - Tierra del Fuego onshore west of 67.5°W',
        ],
        1487 => [
            'name' => 'Cuba - onshore north of 21°30\'N',
        ],
        1488 => [
            'name' => 'Cuba - onshore south of 21°30\'N',
        ],
        1489 => [
            'name' => 'Tunisia - offshore',
        ],
        1490 => [
            'name' => 'Yemen - 42°E to 48°E',
        ],
        1491 => [
            'name' => 'Yemen - 48°E to 54°E',
        ],
        1492 => [
            'name' => 'Yemen - South Yemen - mainland west of 48°E',
        ],
        1493 => [
            'name' => 'Yemen - South Yemen - mainland east of 48°E',
        ],
        1494 => [
            'name' => 'Vietnam - onshore Vung Tau area',
        ],
        1495 => [
            'name' => 'Vietnam - offshore Cuu Long basin',
        ],
        1496 => [
            'name' => 'Korea, Republic of (South Korea) - east of 128°E onshore',
        ],
        1497 => [
            'name' => 'Korea, Republic of (South Korea) - 126°E to 128°E onshore',
        ],
        1498 => [
            'name' => 'Korea, Republic of (South Korea) - 124°E to 126°E onshore',
        ],
        1499 => [
            'name' => 'Venezuela - Maracaibo - blocks I II and III',
        ],
        1500 => [
            'name' => 'New Zealand - North Island',
        ],
        1502 => [
            'name' => 'New Zealand - offshore 162°E to168°E',
        ],
        1503 => [
            'name' => 'New Zealand - offshore 168°E to 174°E',
        ],
        1504 => [
            'name' => 'New Zealand - offshore 174°E to 180°E',
        ],
        1505 => [
            'name' => 'Ghana - offshore',
        ],
        1509 => [
            'name' => 'Sierra Leone - west of 12°W',
        ],
        1510 => [
            'name' => 'Sierra Leone - east of 12°W',
        ],
        1511 => [
            'name' => 'USA - CONUS and Alaska; PRVI',
        ],
        1512 => [
            'name' => 'Germany - East Germany - west of 10.5°E',
        ],
        1513 => [
            'name' => 'Europe - 10.5°E to 13.5°E onshore by country',
        ],
        1514 => [
            'name' => 'Europe - 13.5°E to 16.5°E onshore and S-42(83) by country',
        ],
        1515 => [
            'name' => 'Poland - zone I',
        ],
        1516 => [
            'name' => 'Poland - zone II',
        ],
        1517 => [
            'name' => 'Poland - zone III',
        ],
        1518 => [
            'name' => 'Poland - zone IV',
        ],
        1519 => [
            'name' => 'Poland - zone V',
        ],
        1520 => [
            'name' => 'Poland - west of 16.5°E',
        ],
        1521 => [
            'name' => 'Poland - 16.5°E to 19.5°E',
        ],
        1522 => [
            'name' => 'Poland - 19.5°E to 22.5°E',
        ],
        1523 => [
            'name' => 'Poland - east of 22.5°E',
        ],
        1524 => [
            'name' => 'Turkey - west of 28.5°E onshore',
        ],
        1525 => [
            'name' => 'Turkey - 28.5°E to 31.5°E onshore',
        ],
        1526 => [
            'name' => 'Turkey - 31.5°E to 34.5°E onshore',
        ],
        1527 => [
            'name' => 'Turkey - 34.5°E to 37.5°E onshore',
        ],
        1528 => [
            'name' => 'Turkey - 37.5°E to 40.5°E onshore',
        ],
        1529 => [
            'name' => 'Turkey - 40.5°E to 43.5°E onshore',
        ],
        1530 => [
            'name' => 'Turkey - east of 43.5°E',
        ],
        1531 => [
            'name' => 'Canada - Maritime Provinces - west of 66°W',
        ],
        1532 => [
            'name' => 'Canada - Maritime Provinces - east of 66°W',
        ],
        1533 => [
            'name' => 'Canada - Prince Edward Island',
        ],
        1534 => [
            'name' => 'Canada - Nova Scotia - east of 63°W',
        ],
        1535 => [
            'name' => 'Canada - Nova Scotia - west of 63°W',
        ],
        1536 => [
            'name' => 'Finland - 19.5°E to 22.5°E onshore',
        ],
        1537 => [
            'name' => 'Finland - 22.5°E to 25.5°E onshore',
        ],
        1538 => [
            'name' => 'Finland - 25.5°E to 28.5°E onshore',
        ],
        1539 => [
            'name' => 'Finland - 28.5°E to 31.5°E',
        ],
        1540 => [
            'name' => 'Mozambique - onshore west of 36°E',
        ],
        1541 => [
            'name' => 'Mozambique - onshore east of 36°E',
        ],
        1542 => [
            'name' => 'Asia - Cambodia and Vietnam - west of 108°E',
        ],
        1543 => [
            'name' => 'Austria - Styria',
        ],
        1544 => [
            'name' => 'Oman - onshore west of 54°E',
        ],
        1545 => [
            'name' => 'Oman - onshore east of 54°E',
        ],
        1546 => [
            'name' => 'USA - Hawaii - island of Hawaii - onshore',
        ],
        1547 => [
            'name' => 'USA - Hawaii - Maui; Kahoolawe; Lanai; Molokai - onshore',
        ],
        1548 => [
            'name' => 'USA - Hawaii - Oahu - onshore',
        ],
        1549 => [
            'name' => 'USA - Hawaii - Kauai - onshore',
        ],
        1550 => [
            'name' => 'USA - Hawaii - Niihau - onshore',
        ],
        1551 => [
            'name' => 'Grenada and southern Grenadines - onshore',
        ],
        1552 => [
            'name' => 'Africa - Eritrea, Ethiopia and Sudan - 36°E to 42°E',
        ],
        1553 => [
            'name' => 'Ethiopia - east of 42°E',
        ],
        1554 => [
            'name' => 'Somalia - 42°E to 48°E, N hemisphere onshore',
        ],
        1555 => [
            'name' => 'Somalia - onshore east of 48°E',
        ],
        1557 => [
            'name' => 'Australia - 108°E to 114°E (EEZ)',
        ],
        1558 => [
            'name' => 'Australia - 114°E to 120°E (EEZ)',
        ],
        1559 => [
            'name' => 'Australia - 120°E to 126°E',
        ],
        1560 => [
            'name' => 'Australia - 126°E to 132°E',
        ],
        1561 => [
            'name' => 'Australia - 132°E to 138°E',
        ],
        1562 => [
            'name' => 'Australia - 138°E to 144°E',
        ],
        1563 => [
            'name' => 'Australia - 144°E to 150°E',
        ],
        1564 => [
            'name' => 'Australia - 150°E to 156°E',
        ],
        1565 => [
            'name' => 'Australia - 156°E to 162°E',
        ],
        1566 => [
            'name' => 'Australia - EEZ east of 162°E',
        ],
        1567 => [
            'name' => 'Australasia - Australia and PNG - 138°E to 144°E',
        ],
        1568 => [
            'name' => 'Australasia - Australia and PNG - 144°E to 150°E',
        ],
        1569 => [
            'name' => 'Saudi Arabia - onshore 36°E to 42°E',
        ],
        1570 => [
            'name' => 'Asia - Middle East - Kuwait and Saudi - 48°E to 54°E',
        ],
        1571 => [
            'name' => 'Asia - Middle East - Kuwait and Saudi - 42°E to 48°E',
        ],
        1572 => [
            'name' => 'Brazil - 54°W to 48°W and Aratu',
        ],
        1573 => [
            'name' => 'Brazil - 48°W to 42°W and Aratu',
        ],
        1574 => [
            'name' => 'Brazil - 42°W to 36°W and Aratu',
        ],
        1575 => [
            'name' => 'Africa - Botswana and Zambia - west of 24°E',
        ],
        1576 => [
            'name' => 'Africa - Botswana, Zambia and Zimbabwe - 24°E to 30°E',
        ],
        1577 => [
            'name' => 'Africa - Malawi, Zambia and Zimbabwe - east of 30°E',
        ],
        1578 => [
            'name' => 'Uganda - north of equator and west of 30°E',
        ],
        1579 => [
            'name' => 'Africa - Tanzania and Uganda - south of equator and west of 30°E',
        ],
        1580 => [
            'name' => 'Africa - Kenya and Uganda - north of equator and 30°E to 36°E',
        ],
        1581 => [
            'name' => 'Africa - Kenya, Tanzania and Uganda - south of equator and 30°E to 36°E',
        ],
        1582 => [
            'name' => 'Kenya - north of equator and east of 36°E',
        ],
        1583 => [
            'name' => 'Africa - Kenya and Tanzania - south of equator and east of 36°E',
        ],
        1584 => [
            'name' => 'Indonesia - Java and Java Sea - west of 108°E',
        ],
        1585 => [
            'name' => 'Indonesia - Java and Java Sea - east of 114°E',
        ],
        1586 => [
            'name' => 'Indonesia - Java and Java Sea - 108°E to 114°E',
        ],
        1587 => [
            'name' => 'China - west of 78°E',
        ],
        1588 => [
            'name' => 'China - 78°E to 84°E',
        ],
        1589 => [
            'name' => 'China - 84°E to 90°E',
        ],
        1590 => [
            'name' => 'China - 90°E to 96°E',
        ],
        1591 => [
            'name' => 'China - 96°E to 102°E',
        ],
        1592 => [
            'name' => 'China - 102°E to 108°E onshore',
        ],
        1593 => [
            'name' => 'China - 108°E to 114°E onshore',
        ],
        1594 => [
            'name' => 'China - 114°E to 120°E onshore',
        ],
        1595 => [
            'name' => 'China - 120°E to 126°E onshore',
        ],
        1596 => [
            'name' => 'China - 126°E to 132°E onshore',
        ],
        1597 => [
            'name' => 'China - east of 132°E',
        ],
        1598 => [
            'name' => 'Colombia - west of 75°35\'W',
        ],
        1599 => [
            'name' => 'Colombia - 75°35\'W to 72°35\'W',
        ],
        1600 => [
            'name' => 'Colombia - 72°35\'W to 69°35\'W',
        ],
        1601 => [
            'name' => 'Colombia - east of 69°35\'W',
        ],
        1603 => [
            'name' => 'Colombia - offshore Caribbean west of 72°W',
        ],
        1604 => [
            'name' => 'Angola - Angola proper - offshore',
        ],
        1605 => [
            'name' => 'Angola - offshore block 15',
        ],
        1606 => [
            'name' => 'Angola - Angola proper - offshore - west of 12°E',
        ],
        1607 => [
            'name' => 'Angola - Angola proper - 12°E to 18°E',
        ],
        1608 => [
            'name' => 'Argentina - west of 70.5°W',
        ],
        1609 => [
            'name' => 'Argentina - 70.5°W to 67.5°W onshore',
        ],
        1610 => [
            'name' => 'Argentina - 67.5°W to 64.5°W onshore',
        ],
        1611 => [
            'name' => 'Argentina - 64.5°W to 61.5°W onshore',
        ],
        1612 => [
            'name' => 'Argentina - 61.5°W to 58.5°W onshore',
        ],
        1613 => [
            'name' => 'Argentina - 58.5°W to 55.5°W onshore',
        ],
        1614 => [
            'name' => 'Argentina - east of 55.5°W onshore',
        ],
        1615 => [
            'name' => 'Botswana - west of 24°E',
        ],
        1617 => [
            'name' => 'Botswana - east of 24°E',
        ],
        1618 => [
            'name' => 'Tunisia - onshore',
        ],
        1619 => [
            'name' => 'Tunisia - north of 34°39\'N',
        ],
        1620 => [
            'name' => 'Tunisia - south of 34°39\'N',
        ],
        1623 => [
            'name' => 'Asia - Middle East - Lebanon and Syria onshore',
        ],
        1624 => [
            'name' => 'Germany - West Germany - west of 7.5°E',
        ],
        1625 => [
            'name' => 'Germany - West-Germany - 7.5°E to 10.5°E',
        ],
        1626 => [
            'name' => 'Germany - West Germany - 10.5°E to 13.5°E',
        ],
        1627 => [
            'name' => 'Germany - West Germany - east of 13.5°E',
        ],
        1629 => [
            'name' => 'UK - offshore - North Sea',
        ],
        1630 => [
            'name' => 'Netherlands - offshore',
        ],
        1631 => [
            'name' => 'Europe - 18°W to 12°W and ED50 by country',
        ],
        1632 => [
            'name' => 'Europe - 12°W to 6°W and ED50 by country',
        ],
        1633 => [
            'name' => 'Europe - 6°W to 0°W and ED50 by country',
        ],
        1634 => [
            'name' => 'Europe - 0°E to 6°E and ED50 by country',
        ],
        1635 => [
            'name' => 'Europe - 6°E to 12°E and ED50 by country',
        ],
        1636 => [
            'name' => 'Europe - 12°E to 18°E and ED50 by country',
        ],
        1637 => [
            'name' => 'Europe - 18°E to 24°E and ED50 by country',
        ],
        1638 => [
            'name' => 'Europe - 24°E to 30°E and ED50 by country',
        ],
        1639 => [
            'name' => 'Europe - 30°E to 36°E and ED50 by country',
        ],
        1640 => [
            'name' => 'Europe - 36°E to 42°E and ED50 by country',
        ],
        1641 => [
            'name' => 'Europe - 42°E to 48°E and ED50 by country',
        ],
        1642 => [
            'name' => 'Egypt - east of 33°E onshore',
        ],
        1643 => [
            'name' => 'Egypt - 29°E to 33°E',
        ],
        1644 => [
            'name' => 'Egypt - west of 29°E; north of 28°11\'N',
        ],
        1645 => [
            'name' => 'Egypt - west of 29°E; south of 28°11\'N',
        ],
        1646 => [
            'name' => 'Europe - Estonia; Latvia; Lithuania',
        ],
        1647 => [
            'name' => 'Indonesia - west of 96°E, N hemisphere',
        ],
        1649 => [
            'name' => 'Indonesia - 96°E to 102°E, N hemisphere',
        ],
        1650 => [
            'name' => 'Indonesia - 96°E to 102°E, S hemisphere',
        ],
        1651 => [
            'name' => 'Indonesia - 102°E to 108°E, N hemisphere',
        ],
        1652 => [
            'name' => 'Indonesia - 102°E to 108°E, S hemisphere',
        ],
        1653 => [
            'name' => 'Indonesia - 108°E to 114°E, N hemisphere',
        ],
        1654 => [
            'name' => 'Indonesia - 108°E to 114°E, S hemisphere',
        ],
        1655 => [
            'name' => 'Indonesia - 114°E to 120°E, N hemisphere',
        ],
        1656 => [
            'name' => 'Indonesia - 114°E to 120°E, S hemisphere',
        ],
        1657 => [
            'name' => 'Indonesia - 120°E to 126°E, N hemisphere',
        ],
        1658 => [
            'name' => 'Indonesia - 120°E to 126°E, S hemisphere',
        ],
        1659 => [
            'name' => 'Indonesia - 126°E to 132°E, N hemisphere',
        ],
        1660 => [
            'name' => 'Indonesia - 126°E to 132°E, S hemisphere',
        ],
        1662 => [
            'name' => 'Indonesia - 132°E to 138°E, S hemisphere',
        ],
        1663 => [
            'name' => 'Indonesia - east of 138°E, S hemisphere',
        ],
        1664 => [
            'name' => 'Myanmar (Burma) - onshore west of 96°E',
        ],
        1665 => [
            'name' => 'Asia - Myanmar and Thailand - 96°E to 102°E',
        ],
        1666 => [
            'name' => 'Thailand - east of 102°E',
        ],
        1667 => [
            'name' => 'Thailand - onshore and GoT 96°E to102°E',
        ],
        1668 => [
            'name' => 'Pakistan - north of 35°35\'N',
        ],
        1669 => [
            'name' => 'Asia - India; Pakistan - 28°N to 35°35\'N',
        ],
        1670 => [
            'name' => 'Asia - India; Pakistan - onshore 21°N to 28°N and west of 82°E',
        ],
        1671 => [
            'name' => 'Asia - Bangladesh; India; Myanmar; Pakistan - zone Ilb',
        ],
        1672 => [
            'name' => 'India - onshore 15°N to 21°N',
        ],
        1673 => [
            'name' => 'India - mainland south of 15°N',
        ],
        1674 => [
            'name' => 'Bangladesh - onshore west of 90°E',
        ],
        1675 => [
            'name' => 'Bangladesh - onshore east of 90°E',
        ],
        1676 => [
            'name' => 'India - north of 28°N',
        ],
        1677 => [
            'name' => 'India - onshore 21°N to 28°N and west of 82°E',
        ],
        1678 => [
            'name' => 'India - onshore north of 21°N and east of 82°E',
        ],
        1679 => [
            'name' => 'India - onshore west of 72°E',
        ],
        1680 => [
            'name' => 'India - mainland 72°E to 78°E',
        ],
        1681 => [
            'name' => 'India - onshore 78°E to 84°E',
        ],
        1682 => [
            'name' => 'India - onshore 84°E to 90°E',
        ],
        1683 => [
            'name' => 'India - mainland 90°E to 96°E',
        ],
        1684 => [
            'name' => 'India - east of 96°E',
        ],
        1685 => [
            'name' => 'Pakistan - 28°N to 35°35\'N',
        ],
        1686 => [
            'name' => 'Pakistan - onshore south of 28°N',
        ],
        1687 => [
            'name' => 'Pakistan - onshore west of 66°E',
        ],
        1688 => [
            'name' => 'Pakistan - onshore 66°E to 72°E',
        ],
        1689 => [
            'name' => 'Pakistan - east of 72°E',
        ],
        1690 => [
            'name' => 'Malaysia - West Malaysia - onshore',
        ],
        1691 => [
            'name' => 'Malaysia - West Malaysia - onshore west of 102°E',
        ],
        1692 => [
            'name' => 'Malaysia - West Malaysia - east of 102°E',
        ],
        1693 => [
            'name' => 'Venezuela - west of 72°W',
        ],
        1694 => [
            'name' => 'Venezuela - 72°W and 66°W onshore',
        ],
        1695 => [
            'name' => 'Venezuela - east of 66°W onshore',
        ],
        1696 => [
            'name' => 'Gabon - north of equator and west of 12°E onshore',
        ],
        1697 => [
            'name' => 'Gabon - west of 12°E',
        ],
        1698 => [
            'name' => 'Philippines - zone I',
        ],
        1699 => [
            'name' => 'Philippines - zone II',
        ],
        1700 => [
            'name' => 'Philippines - zone III',
        ],
        1701 => [
            'name' => 'Philippines - zone IV',
        ],
        1702 => [
            'name' => 'Philippines - zone V',
        ],
        1703 => [
            'name' => 'Morocco - north of 31.5°N',
        ],
        1706 => [
            'name' => 'Austria - west of 11°50\'E',
        ],
        1707 => [
            'name' => 'Austria - 11°50\'E to 14°50\'E',
        ],
        1708 => [
            'name' => 'Austria - east of 14°50\'E',
        ],
        1709 => [
            'name' => 'Europe - former Yugoslavia onshore west of 16.5°E',
        ],
        1710 => [
            'name' => 'Europe - former Yugoslavia onshore 16.5°E to 19.5°E',
        ],
        1711 => [
            'name' => 'Europe - former Yugoslavia onshore 19.5°E to 22.5°E',
        ],
        1712 => [
            'name' => 'Europe - former Yugoslavia onshore east of 22.5°E',
        ],
        1713 => [
            'name' => 'Nigeria - east of 10.5°E',
        ],
        1714 => [
            'name' => 'Nigeria - 6.5°E to 10.5°E',
        ],
        1715 => [
            'name' => 'Nigeria - west of 6.5°E',
        ],
        1716 => [
            'name' => 'Nigeria - offshore deep water - west of 6°E',
        ],
        1718 => [
            'name' => 'Italy - west of 12°E',
        ],
        1719 => [
            'name' => 'Italy - east of 12°E',
        ],
        1720 => [
            'name' => 'USA - Michigan - SPCS - E',
        ],
        1721 => [
            'name' => 'USA - Michigan - SPCS - old central',
        ],
        1723 => [
            'name' => 'USA - Michigan - SPCS - N',
        ],
        1724 => [
            'name' => 'USA - Michigan - SPCS - C',
        ],
        1725 => [
            'name' => 'USA - Michigan - SPCS - S',
        ],
        1726 => [
            'name' => 'Mozambique - offshore',
        ],
        1727 => [
            'name' => 'Suriname - offshore',
        ],
        1728 => [
            'name' => 'Algeria - north of 34°39\'N',
        ],
        1729 => [
            'name' => 'Algeria - 31°30\'N to 34°39\'N',
        ],
        1731 => [
            'name' => 'France - mainland north of 48.15°N',
        ],
        1732 => [
            'name' => 'France - mainland 45.45°N to 48.15°N',
        ],
        1733 => [
            'name' => 'France - mainland south of 45.45°N',
        ],
        1734 => [
            'name' => 'France - mainland 45.45°N to 48.15°N. Also all mainland.',
        ],
        1735 => [
            'name' => 'Algeria - west of 6°W',
        ],
        1739 => [
            'name' => 'Kuwait - west of 48°E onshore',
        ],
        1740 => [
            'name' => 'Kuwait - east of 48°E onshore',
        ],
        1741 => [
            'name' => 'Norway - zone I',
        ],
        1742 => [
            'name' => 'Norway - zone II',
        ],
        1743 => [
            'name' => 'Norway - zone III',
        ],
        1744 => [
            'name' => 'Norway - zone IV',
        ],
        1745 => [
            'name' => 'Norway - zone V',
        ],
        1746 => [
            'name' => 'Norway - zone VI',
        ],
        1747 => [
            'name' => 'Norway - zone VII',
        ],
        1748 => [
            'name' => 'Norway - zone VIII',
        ],
        1749 => [
            'name' => 'Asia - Middle East - Qatar offshore and UAE west of 54°E',
        ],
        1750 => [
            'name' => 'UAE - east of 54°E',
        ],
        1751 => [
            'name' => 'Peru - east of 73°W',
        ],
        1752 => [
            'name' => 'Peru - 79°W to 73°W',
        ],
        1753 => [
            'name' => 'Peru - west of 79°W',
        ],
        1754 => [
            'name' => 'Brazil - Amazon cone shelf',
        ],
        1755 => [
            'name' => 'South America - 84°W to 78°W, S hemisphere and PSAD56 by country',
        ],
        1756 => [
            'name' => 'South America - 78°W to 72°W, N hemisphere and PSAD56 by country',
        ],
        1757 => [
            'name' => 'South America - 78°W to 72°W, S hemisphere and PSAD56 by country',
        ],
        1758 => [
            'name' => 'South America - 72°W to 66°W, N hemisphere and PSAD56 by country',
        ],
        1759 => [
            'name' => 'South America - 72°W to 66°W, S hemisphere and PSAD56 by country',
        ],
        1760 => [
            'name' => 'South America - 66°W to 60°W, N hemisphere and PSAD56 by country',
        ],
        1761 => [
            'name' => 'Bolivia - 66°W to 60°W',
        ],
        1762 => [
            'name' => 'South America - 60°W to 54°W, N hemisphere and PSAD56 by country',
        ],
        1763 => [
            'name' => 'Russia - west of 24°E onshore',
        ],
        1764 => [
            'name' => 'Russia - 24°E to 30°E onshore',
        ],
        1765 => [
            'name' => 'Russia - 30°E to 36°E onshore',
        ],
        1766 => [
            'name' => 'Russia - 36°E to 42°E onshore',
        ],
        1767 => [
            'name' => 'Russia - 42°E to 48°E onshore',
        ],
        1768 => [
            'name' => 'Russia - 48°E to 54°E onshore',
        ],
        1769 => [
            'name' => 'Russia - 54°E to 60°E onshore',
        ],
        1770 => [
            'name' => 'Russia - 60°E to 66°E onshore',
        ],
        1771 => [
            'name' => 'Russia - 66°E to 72°E onshore',
        ],
        1772 => [
            'name' => 'Russia - 72°E to 78°E onshore',
        ],
        1773 => [
            'name' => 'Russia - 78°E to 84°E onshore',
        ],
        1774 => [
            'name' => 'Russia - 84°E to 90°E onshore',
        ],
        1775 => [
            'name' => 'Russia - 90°E to 96°E onshore',
        ],
        1776 => [
            'name' => 'Russia - 96°E to 102°E onshore',
        ],
        1777 => [
            'name' => 'Russia - 102°E to 108°E onshore',
        ],
        1778 => [
            'name' => 'Russia - 108°E to 114°E onshore',
        ],
        1779 => [
            'name' => 'Russia - 114°E to 120°E onshore',
        ],
        1780 => [
            'name' => 'Russia - 120°E to 126°E onshore',
        ],
        1781 => [
            'name' => 'Russia - 126°E to 132°E onshore',
        ],
        1782 => [
            'name' => 'Russia - 132°E to 138°E onshore',
        ],
        1783 => [
            'name' => 'Russia - 138°E to 144°E onshore',
        ],
        1784 => [
            'name' => 'Russia - 144°E to 150°E onshore',
        ],
        1785 => [
            'name' => 'Russia - 150°E to 156°E onshore',
        ],
        1786 => [
            'name' => 'Russia - 156°E to 162°E onshore',
        ],
        1787 => [
            'name' => 'Russia - 162°E to 168°E onshore',
        ],
        1788 => [
            'name' => 'Russia - 168°E to 174°E onshore',
        ],
        1789 => [
            'name' => 'Russia - 174°E to 180°E onshore',
        ],
        1790 => [
            'name' => 'Russia - 180° to 174°W onshore',
        ],
        1791 => [
            'name' => 'Russia - east of 174°W onshore',
        ],
        1792 => [
            'name' => 'Europe - 12°E to 18°E onshore and S-42(58) by country',
        ],
        1793 => [
            'name' => 'Europe - FSU onshore 18°E to 24°E and S-42 by country',
        ],
        1794 => [
            'name' => 'Europe - FSU onshore 24°E to 30°E and S-42 by country',
        ],
        1795 => [
            'name' => 'Europe - FSU onshore 30°E to 36°E',
        ],
        1796 => [
            'name' => 'Europe - FSU onshore 36°E to 42°E',
        ],
        1797 => [
            'name' => 'Europe - FSU onshore 42°E to 48°E',
        ],
        1798 => [
            'name' => 'Asia - FSU onshore 48°E to 54°E',
        ],
        1799 => [
            'name' => 'Asia - FSU onshore 54°E to 60°E',
        ],
        1800 => [
            'name' => 'Asia - FSU onshore 60°E to 66°E',
        ],
        1801 => [
            'name' => 'Asia - FSU onshore 66°E to 72°E',
        ],
        1802 => [
            'name' => 'Asia - FSU onshore 72°E to 78°E',
        ],
        1803 => [
            'name' => 'Asia - FSU onshore 78°E to 84°E',
        ],
        1804 => [
            'name' => 'Asia - FSU onshore 84°E to 90°E',
        ],
        1814 => [
            'name' => 'South America - 60°W to 54°W, S hemisphere and SAD69 by country',
        ],
        1815 => [
            'name' => 'South America - 54°W to 48°W, N hemisphere and SAD69 by country',
        ],
        1816 => [
            'name' => 'South America - 54°W to 48°W, S hemisphere and SAD69 by country',
        ],
        1818 => [
            'name' => 'Brazil - 42°W to 36°W onshore',
        ],
        1820 => [
            'name' => 'Falkland Islands - onshore west of 60°W',
        ],
        1821 => [
            'name' => 'Falkland Islands - onshore east of 60°W',
        ],
        1822 => [
            'name' => 'Namibia - offshore',
        ],
        1823 => [
            'name' => 'South America - 84°W to 78°W, N hemisphere and SIRGAS95 by country',
        ],
        1824 => [
            'name' => 'South America - 84°W to 78°W, S hemisphere',
        ],
        1825 => [
            'name' => 'South America - 78°W to 72°W, N hemisphere',
        ],
        1826 => [
            'name' => 'South America - 78°W to 72°W, S hemisphere and SIRGAS 1995 by country',
        ],
        1827 => [
            'name' => 'South America - 72°W to 66°W, N hemisphere',
        ],
        1828 => [
            'name' => 'South America - 72°W to 66°W, S hemisphere',
        ],
        1829 => [
            'name' => 'South America - 66°W to 60°W, N hemisphere',
        ],
        1830 => [
            'name' => 'South America - 66°W to 60°W, S hemisphere',
        ],
        1831 => [
            'name' => 'South America - 60°W to 54°W, N hemisphere',
        ],
        1832 => [
            'name' => 'South America - 60°W to 54°W, S hemisphere',
        ],
        1833 => [
            'name' => 'South America - 54°W to 48°W, N hemisphere',
        ],
        1834 => [
            'name' => 'South America - 54°W to 48°W, S hemisphere',
        ],
        1835 => [
            'name' => 'South America - 48°W to 42°W',
        ],
        1836 => [
            'name' => 'South America - 42°W to 36°W',
        ],
        1837 => [
            'name' => 'South America - 36°W to 30°W',
        ],
        1838 => [
            'name' => 'Namibia - west of 12°E',
        ],
        1839 => [
            'name' => 'Namibia - 12°E to 14°E',
        ],
        1840 => [
            'name' => 'Namibia - 14°E to 16°E',
        ],
        1841 => [
            'name' => 'Namibia - 16°E to 18°E',
        ],
        1842 => [
            'name' => 'Namibia - 18°E to 20°E',
        ],
        1843 => [
            'name' => 'Namibia - 20°E to 22°E',
        ],
        1844 => [
            'name' => 'Namibia - 22°E to 24°E',
        ],
        1845 => [
            'name' => 'Namibia - east of 24°E',
        ],
        1848 => [
            'name' => 'Madagascar - nearshore - west of 48°E',
        ],
        1849 => [
            'name' => 'Madagascar - nearshore - east of 48°E',
        ],
        1850 => [
            'name' => 'UAE - Abu Dhabi - onshore west of 54°E',
        ],
        1852 => [
            'name' => 'Asia - Brunei and East Malaysia - 108°E to 114°E',
        ],
        1853 => [
            'name' => 'Asia - Brunei and East Malaysia - 114°E to 120°E',
        ],
        1854 => [
            'name' => 'Japan - zone I',
        ],
        1855 => [
            'name' => 'Japan - zone II',
        ],
        1856 => [
            'name' => 'Japan - zone III',
        ],
        1857 => [
            'name' => 'Japan - zone IV',
        ],
        1858 => [
            'name' => 'Japan - zone V',
        ],
        1859 => [
            'name' => 'Japan - zone VI',
        ],
        1860 => [
            'name' => 'Japan - zone VII',
        ],
        1861 => [
            'name' => 'Japan - zone VIII',
        ],
        1862 => [
            'name' => 'Japan - zone IX',
        ],
        1863 => [
            'name' => 'Japan - zone X',
        ],
        1864 => [
            'name' => 'Japan - zone XI',
        ],
        1865 => [
            'name' => 'Japan - zone XII',
        ],
        1866 => [
            'name' => 'Japan - zone XIII',
        ],
        1867 => [
            'name' => 'Japan - zone XIV',
        ],
        1868 => [
            'name' => 'Japan - zone XV',
        ],
        1869 => [
            'name' => 'Japan - zone XVI',
        ],
        1870 => [
            'name' => 'Japan - zone XVII',
        ],
        1871 => [
            'name' => 'Japan - zone XVIII',
        ],
        1872 => [
            'name' => 'Japan - Minamitori-shima (Marcus Island) - onshore',
        ],
        1873 => [
            'name' => 'World - N hemisphere - 180°W to 174°W',
        ],
        1874 => [
            'name' => 'World - S hemisphere - 180°W to 174°W',
        ],
        1875 => [
            'name' => 'World - N hemisphere - 174°W to 168°W',
        ],
        1876 => [
            'name' => 'World - S hemisphere - 174°W to 168°W',
        ],
        1877 => [
            'name' => 'World - N hemisphere - 168°W to 162°W',
        ],
        1878 => [
            'name' => 'World - S hemisphere - 168°W to 162°W',
        ],
        1879 => [
            'name' => 'World - N hemisphere - 162°W to 156°W',
        ],
        1880 => [
            'name' => 'World - S hemisphere - 162°W to 156°W',
        ],
        1881 => [
            'name' => 'World - N hemisphere - 156°W to 150°W',
        ],
        1882 => [
            'name' => 'World - S hemisphere - 156°W to 150°W',
        ],
        1883 => [
            'name' => 'World - N hemisphere - 150°W to 144°W',
        ],
        1884 => [
            'name' => 'World - S hemisphere - 150°W to 144°W',
        ],
        1885 => [
            'name' => 'World - N hemisphere - 144°W to 138°W',
        ],
        1886 => [
            'name' => 'World - S hemisphere - 144°W to 138°W',
        ],
        1887 => [
            'name' => 'World - N hemisphere - 138°W to 132°W',
        ],
        1888 => [
            'name' => 'World - S hemisphere - 138°W to 132°W',
        ],
        1889 => [
            'name' => 'World - N hemisphere - 132°W to 126°W',
        ],
        1890 => [
            'name' => 'World - S hemisphere - 132°W to 126°W',
        ],
        1891 => [
            'name' => 'World - N hemisphere - 126°W to 120°W',
        ],
        1892 => [
            'name' => 'World - S hemisphere - 126°W to 120°W',
        ],
        1893 => [
            'name' => 'World - N hemisphere - 120°W to 114°W',
        ],
        1894 => [
            'name' => 'World - S hemisphere - 120°W to 114°W',
        ],
        1895 => [
            'name' => 'World - N hemisphere - 114°W to 108°W',
        ],
        1896 => [
            'name' => 'World - S hemisphere - 114°W to 108°W',
        ],
        1897 => [
            'name' => 'World - N hemisphere - 108°W to 102°W',
        ],
        1898 => [
            'name' => 'World - S hemisphere - 108°W to 102°W',
        ],
        1899 => [
            'name' => 'World - N hemisphere - 102°W to 96°W',
        ],
        1900 => [
            'name' => 'World - S hemisphere - 102°W to 96°W',
        ],
        1901 => [
            'name' => 'World - N hemisphere - 96°W to 90°W',
        ],
        1902 => [
            'name' => 'World - S hemisphere - 96°W to 90°W',
        ],
        1903 => [
            'name' => 'World - N hemisphere - 90°W to 84°W',
        ],
        1904 => [
            'name' => 'World - S hemisphere - 90°W to 84°W',
        ],
        1905 => [
            'name' => 'World - N hemisphere - 84°W to 78°W',
        ],
        1906 => [
            'name' => 'World - S hemisphere - 84°W to 78°W',
        ],
        1907 => [
            'name' => 'World - N hemisphere - 78°W to 72°W',
        ],
        1908 => [
            'name' => 'World - S hemisphere - 78°W to 72°W',
        ],
        1909 => [
            'name' => 'World - N hemisphere - 72°W to 66°W',
        ],
        1910 => [
            'name' => 'World - S hemisphere - 72°W to 66°W',
        ],
        1911 => [
            'name' => 'World - N hemisphere - 66°W to 60°W',
        ],
        1912 => [
            'name' => 'World - S hemisphere - 66°W to 60°W',
        ],
        1913 => [
            'name' => 'World - N hemisphere - 60°W to 54°W',
        ],
        1914 => [
            'name' => 'World - S hemisphere - 60°W to 54°W',
        ],
        1915 => [
            'name' => 'World - N hemisphere - 54°W to 48°W',
        ],
        1916 => [
            'name' => 'World - S hemisphere - 54°W to 48°W',
        ],
        1917 => [
            'name' => 'World - N hemisphere - 48°W to 42°W',
        ],
        1918 => [
            'name' => 'World - S hemisphere - 48°W to 42°W',
        ],
        1919 => [
            'name' => 'World - N hemisphere - 42°W to 36°W',
        ],
        1920 => [
            'name' => 'World - S hemisphere - 42°W to 36°W',
        ],
        1921 => [
            'name' => 'World - N hemisphere - 36°W to 30°W',
        ],
        1922 => [
            'name' => 'World - S hemisphere - 36°W to 30°W',
        ],
        1923 => [
            'name' => 'World - N hemisphere - 30°W to 24°W',
        ],
        1924 => [
            'name' => 'World - S hemisphere - 30°W to 24°W',
        ],
        1925 => [
            'name' => 'World - N hemisphere - 24°W to 18°W',
        ],
        1926 => [
            'name' => 'World - S hemisphere - 24°W to 18°W',
        ],
        1927 => [
            'name' => 'World - N hemisphere - 18°W to 12°W',
        ],
        1928 => [
            'name' => 'World - S hemisphere - 18°W to 12°W',
        ],
        1929 => [
            'name' => 'World - N hemisphere - 12°W to 6°W',
        ],
        1930 => [
            'name' => 'World - S hemisphere - 12°W to 6°W',
        ],
        1931 => [
            'name' => 'World - N hemisphere - 6°W to 0°W',
        ],
        1932 => [
            'name' => 'World - S hemisphere - 6°W to 0°W',
        ],
        1933 => [
            'name' => 'World - N hemisphere - 0°E to 6°E',
        ],
        1934 => [
            'name' => 'World - S hemisphere - 0°E to 6°E',
        ],
        1935 => [
            'name' => 'World - N hemisphere - 6°E to 12°E',
        ],
        1936 => [
            'name' => 'World - S hemisphere - 6°E to 12°E',
        ],
        1937 => [
            'name' => 'World - N hemisphere - 12°E to 18°E',
        ],
        1938 => [
            'name' => 'World - S hemisphere - 12°E to 18°E',
        ],
        1939 => [
            'name' => 'World - N hemisphere - 18°E to 24°E',
        ],
        1940 => [
            'name' => 'World - S hemisphere - 18°E to 24°E',
        ],
        1941 => [
            'name' => 'World - N hemisphere - 24°E to 30°E',
        ],
        1942 => [
            'name' => 'World - S hemisphere - 24°E to 30°E',
        ],
        1943 => [
            'name' => 'World - N hemisphere - 30°E to 36°E',
        ],
        1944 => [
            'name' => 'World - S hemisphere - 30°E to 36°E',
        ],
        1945 => [
            'name' => 'World - N hemisphere - 36°E to 42°E',
        ],
        1946 => [
            'name' => 'World - S hemisphere - 36°E to 42°E',
        ],
        1947 => [
            'name' => 'World - N hemisphere - 42°E to 48°E',
        ],
        1948 => [
            'name' => 'World - S hemisphere - 42°E to 48°E',
        ],
        1949 => [
            'name' => 'World - N hemisphere - 48°E to 54°E',
        ],
        1950 => [
            'name' => 'World - S hemisphere - 48°E to 54°E',
        ],
        1951 => [
            'name' => 'World - N hemisphere - 54°E to 60°E',
        ],
        1952 => [
            'name' => 'World - S hemisphere - 54°E to 60°E',
        ],
        1953 => [
            'name' => 'World - N hemisphere - 60°E to 66°E',
        ],
        1954 => [
            'name' => 'World - S hemisphere - 60°E to 66°E',
        ],
        1955 => [
            'name' => 'World - N hemisphere - 66°E to 72°E',
        ],
        1956 => [
            'name' => 'World - S hemisphere - 66°E to 72°E',
        ],
        1957 => [
            'name' => 'World - N hemisphere - 72°E to 78°E',
        ],
        1958 => [
            'name' => 'World - S hemisphere - 72°E to 78°E',
        ],
        1959 => [
            'name' => 'World - N hemisphere - 78°E to 84°E',
        ],
        1960 => [
            'name' => 'World - S hemisphere - 78°E to 84°E',
        ],
        1961 => [
            'name' => 'World - N hemisphere - 84°E to 90°E',
        ],
        1962 => [
            'name' => 'World - S hemisphere - 84°E to 90°E',
        ],
        1963 => [
            'name' => 'World - N hemisphere - 90°E to 96°E',
        ],
        1964 => [
            'name' => 'World - S hemisphere - 90°E to 96°E',
        ],
        1965 => [
            'name' => 'World - N hemisphere - 96°E to 102°E',
        ],
        1966 => [
            'name' => 'World - S hemisphere - 96°E to 102°E',
        ],
        1967 => [
            'name' => 'World - N hemisphere - 102°E to 108°E',
        ],
        1968 => [
            'name' => 'World - S hemisphere - 102°E to 108°E',
        ],
        1969 => [
            'name' => 'World - N hemisphere - 108°E to 114°E',
        ],
        1970 => [
            'name' => 'World - S hemisphere - 108°E to 114°E',
        ],
        1971 => [
            'name' => 'World - N hemisphere - 114°E to 120°E',
        ],
        1972 => [
            'name' => 'World - S hemisphere - 114°E to 120°E',
        ],
        1973 => [
            'name' => 'World - N hemisphere - 120°E to 126°E',
        ],
        1974 => [
            'name' => 'World - S hemisphere - 120°E to 126°E',
        ],
        1975 => [
            'name' => 'World - N hemisphere - 126°E to 132°E',
        ],
        1976 => [
            'name' => 'World - S hemisphere - 126°E to 132°E',
        ],
        1977 => [
            'name' => 'World - N hemisphere - 132°E to 138°E',
        ],
        1978 => [
            'name' => 'World - S hemisphere - 132°E to 138°E',
        ],
        1979 => [
            'name' => 'World - N hemisphere - 138°E to 144°E',
        ],
        1980 => [
            'name' => 'World - S hemisphere - 138°E to 144°E',
        ],
        1981 => [
            'name' => 'World - N hemisphere - 144°E to 150°E',
        ],
        1982 => [
            'name' => 'World - S hemisphere - 144°E to 150°E',
        ],
        1983 => [
            'name' => 'World - N hemisphere - 150°E to 156°E',
        ],
        1984 => [
            'name' => 'World - S hemisphere - 150°E to 156°E',
        ],
        1985 => [
            'name' => 'World - N hemisphere - 156°E to 162°E',
        ],
        1986 => [
            'name' => 'World - S hemisphere - 156°E to 162°E',
        ],
        1987 => [
            'name' => 'World - N hemisphere - 162°E to 168°E',
        ],
        1988 => [
            'name' => 'World - S hemisphere - 162°E to 168°E',
        ],
        1989 => [
            'name' => 'World - N hemisphere - 168°E to 174°E',
        ],
        1990 => [
            'name' => 'World - S hemisphere - 168°E to 174°E',
        ],
        1991 => [
            'name' => 'World - N hemisphere - 174°E to 180°E',
        ],
        1992 => [
            'name' => 'World - S hemisphere - 174°E to 180°E',
        ],
        1993 => [
            'name' => 'World - N hemisphere - 102°E to 108°E - by country and WGS 72BE',
        ],
        1994 => [
            'name' => 'World - N hemisphere - 108°E to 114°E - by country and WGS 72BE',
        ],
        1995 => [
            'name' => 'World - S hemisphere - 108°E to 114°E - by country and WGS 72BE',
        ],
        1996 => [
            'name' => 'World - N hemisphere - north of 60°N',
        ],
        1997 => [
            'name' => 'World - S hemisphere - south of 60°S',
        ],
        1998 => [
            'name' => 'World - N hemisphere - 0°N to 84°N',
        ],
        1999 => [
            'name' => 'World - S hemisphere - 0°N to 80°S',
        ],
        2000 => [
            'name' => 'World - N hemisphere - 180°W to 174°W - by country',
        ],
        2001 => [
            'name' => 'World - S hemisphere - 180°W to 174°W - by country',
        ],
        2002 => [
            'name' => 'World - N hemisphere - 174°W to 168°W - by country',
        ],
        2003 => [
            'name' => 'World - S hemisphere - 174°W to 168°W - by country',
        ],
        2004 => [
            'name' => 'World - N hemisphere - 168°W to 162°W - by country',
        ],
        2005 => [
            'name' => 'World - S hemisphere - 168°W to 162°W - by country',
        ],
        2006 => [
            'name' => 'World - N hemisphere - 162°W to 156°W - by country',
        ],
        2007 => [
            'name' => 'World - S hemisphere - 162°W to 156°W - by country',
        ],
        2008 => [
            'name' => 'World - N hemisphere - 156°W to 150°W - by country',
        ],
        2009 => [
            'name' => 'World - S hemisphere - 156°W to 150°W - by country',
        ],
        2010 => [
            'name' => 'World - N hemisphere - 150°W to 144°W - by country',
        ],
        2011 => [
            'name' => 'World - S hemisphere - 150°W to 144°W - by country',
        ],
        2012 => [
            'name' => 'World - N hemisphere - 144°W to 138°W - by country',
        ],
        2013 => [
            'name' => 'World - S hemisphere - 144°W to 138°W - by country',
        ],
        2014 => [
            'name' => 'World - N hemisphere - 138°W to 132°W - by country',
        ],
        2015 => [
            'name' => 'World - S hemisphere - 138°W to 132°W - by country',
        ],
        2016 => [
            'name' => 'World - N hemisphere - 132°W to 126°W - by country',
        ],
        2017 => [
            'name' => 'World - S hemisphere - 132°W to 126°W - by country',
        ],
        2018 => [
            'name' => 'World - N hemisphere - 126°W to 120°W - by country',
        ],
        2019 => [
            'name' => 'World - S hemisphere - 126°W to 120°W - by country',
        ],
        2020 => [
            'name' => 'World - N hemisphere - 120°W to 114°W - by country',
        ],
        2021 => [
            'name' => 'World - S hemisphere - 120°W to 114°W - by country',
        ],
        2022 => [
            'name' => 'World - N hemisphere - 114°W to 108°W - by country',
        ],
        2023 => [
            'name' => 'World - S hemisphere - 114°W to 108°W - by country',
        ],
        2024 => [
            'name' => 'World - N hemisphere - 108°W to 102°W - by country',
        ],
        2025 => [
            'name' => 'World - S hemisphere - 108°W to 102°W - by country',
        ],
        2026 => [
            'name' => 'World - N hemisphere - 102°W to 96°W - by country',
        ],
        2027 => [
            'name' => 'World - S hemisphere - 102°W to 96°W - by country',
        ],
        2028 => [
            'name' => 'World - N hemisphere - 96°W to 90°W - by country',
        ],
        2029 => [
            'name' => 'World - S hemisphere - 96°W to 90°W - by country',
        ],
        2030 => [
            'name' => 'World - N hemisphere - 90°W to 84°W - by country',
        ],
        2031 => [
            'name' => 'World - S hemisphere - 90°W to 84°W - by country',
        ],
        2032 => [
            'name' => 'World - N hemisphere - 84°W to 78°W - by country',
        ],
        2033 => [
            'name' => 'World - S hemisphere - 84°W to 78°W - by country',
        ],
        2034 => [
            'name' => 'World - N hemisphere - 78°W to 72°W - by country',
        ],
        2035 => [
            'name' => 'World - S hemisphere - 78°W to 72°W - by country',
        ],
        2036 => [
            'name' => 'World - N hemisphere - 72°W to 66°W - by country',
        ],
        2037 => [
            'name' => 'World - S hemisphere - 72°W to 66°W - by country',
        ],
        2038 => [
            'name' => 'World - N hemisphere - 66°W to 60°W - by country',
        ],
        2039 => [
            'name' => 'World - S hemisphere - 66°W to 60°W - by country',
        ],
        2040 => [
            'name' => 'World - N hemisphere - 60°W to 54°W - by country',
        ],
        2041 => [
            'name' => 'World - S hemisphere - 60°W to 54°W - by country',
        ],
        2042 => [
            'name' => 'World - N hemisphere - 54°W to 48°W - by country',
        ],
        2043 => [
            'name' => 'World - S hemisphere - 54°W to 48°W - by country',
        ],
        2044 => [
            'name' => 'World - N hemisphere - 48°W to 42°W - by country',
        ],
        2045 => [
            'name' => 'World - S hemisphere - 48°W to 42°W - by country',
        ],
        2046 => [
            'name' => 'World - N hemisphere - 42°W to 36°W - by country',
        ],
        2047 => [
            'name' => 'World - S hemisphere - 42°W to 36°W - by country',
        ],
        2048 => [
            'name' => 'World - N hemisphere - 36°W to 30°W - by country',
        ],
        2049 => [
            'name' => 'World - S hemisphere - 36°W to 30°W - by country',
        ],
        2050 => [
            'name' => 'World - N hemisphere - 30°W to 24°W - by country',
        ],
        2051 => [
            'name' => 'World - S hemisphere - 30°W to 24°W - by country',
        ],
        2052 => [
            'name' => 'World - N hemisphere - 24°W to 18°W - by country',
        ],
        2053 => [
            'name' => 'World - S hemisphere - 24°W to 18°W - by country',
        ],
        2054 => [
            'name' => 'World - N hemisphere - 18°W to 12°W - by country',
        ],
        2055 => [
            'name' => 'World - S hemisphere - 18°W to 12°W - by country',
        ],
        2056 => [
            'name' => 'World - N hemisphere - 12°W to 6°W - by country',
        ],
        2057 => [
            'name' => 'World - S hemisphere - 12°W to 6°W - by country',
        ],
        2058 => [
            'name' => 'World - N hemisphere - 6°W to 0°W - by country',
        ],
        2059 => [
            'name' => 'World - S hemisphere - 6°W to 0°W - by country',
        ],
        2060 => [
            'name' => 'World - N hemisphere - 0°E to 6°E - by country',
        ],
        2061 => [
            'name' => 'World - S hemisphere - 0°E to 6°E - by country',
        ],
        2062 => [
            'name' => 'World - N hemisphere - 6°E to 12°E - by country',
        ],
        2063 => [
            'name' => 'World - S hemisphere - 6°E to 12°E - by country',
        ],
        2064 => [
            'name' => 'World - N hemisphere - 12°E to 18°E - by country',
        ],
        2065 => [
            'name' => 'World - S hemisphere - 12°E to 18°E - by country',
        ],
        2066 => [
            'name' => 'World - N hemisphere - 18°E to 24°E - by country',
        ],
        2067 => [
            'name' => 'World - S hemisphere - 18°E to 24°E - by country',
        ],
        2068 => [
            'name' => 'World - N hemisphere - 24°E to 30°E - by country',
        ],
        2069 => [
            'name' => 'World - S hemisphere - 24°E to 30°E - by country',
        ],
        2070 => [
            'name' => 'World - N hemisphere - 30°E to 36°E - by country',
        ],
        2071 => [
            'name' => 'World - S hemisphere - 30°E to 36°E - by country',
        ],
        2072 => [
            'name' => 'World - N hemisphere - 36°E to 42°E - by country',
        ],
        2073 => [
            'name' => 'World - S hemisphere - 36°E to 42°E - by country',
        ],
        2074 => [
            'name' => 'World - N hemisphere - 42°E to 48°E - by country',
        ],
        2075 => [
            'name' => 'World - S hemisphere - 42°E to 48°E - by country',
        ],
        2076 => [
            'name' => 'World - N hemisphere - 48°E to 54°E - by country',
        ],
        2077 => [
            'name' => 'World - S hemisphere - 48°E to 54°E - by country',
        ],
        2078 => [
            'name' => 'World - N hemisphere - 54°E to 60°E - by country',
        ],
        2079 => [
            'name' => 'World - S hemisphere - 54°E to 60°E - by country',
        ],
        2080 => [
            'name' => 'World - N hemisphere - 60°E to 66°E - by country',
        ],
        2081 => [
            'name' => 'World - S hemisphere - 60°E to 66°E - by country',
        ],
        2082 => [
            'name' => 'World - N hemisphere - 66°E to 72°E - by country',
        ],
        2083 => [
            'name' => 'World - S hemisphere - 66°E to 72°E - by country',
        ],
        2084 => [
            'name' => 'World - N hemisphere - 72°E to 78°E - by country',
        ],
        2085 => [
            'name' => 'World - S hemisphere - 72°E to 78°E - by country',
        ],
        2086 => [
            'name' => 'World - N hemisphere - 78°E to 84°E - by country',
        ],
        2087 => [
            'name' => 'World - S hemisphere - 78°E to 84°E - by country',
        ],
        2088 => [
            'name' => 'World - N hemisphere - 84°E to 90°E - by country',
        ],
        2089 => [
            'name' => 'World - S hemisphere - 84°E to 90°E - by country',
        ],
        2090 => [
            'name' => 'World - N hemisphere - 90°E to 96°E - by country',
        ],
        2091 => [
            'name' => 'World - S hemisphere - 90°E to 96°E - by country',
        ],
        2092 => [
            'name' => 'World - N hemisphere - 96°E to 102°E - by country',
        ],
        2093 => [
            'name' => 'World - S hemisphere - 96°E to 102°E - by country',
        ],
        2094 => [
            'name' => 'World - N hemisphere - 102°E to 108°E - by country',
        ],
        2095 => [
            'name' => 'World - S hemisphere - 102°E to 108°E - by country',
        ],
        2096 => [
            'name' => 'World - N hemisphere - 108°E to 114°E - by country',
        ],
        2097 => [
            'name' => 'World - S hemisphere - 108°E to 114°E - by country',
        ],
        2098 => [
            'name' => 'World - N hemisphere - 114°E to 120°E - by country',
        ],
        2099 => [
            'name' => 'World - S hemisphere - 114°E to 120°E - by country',
        ],
        2100 => [
            'name' => 'World - N hemisphere - 120°E to 126°E - by country',
        ],
        2101 => [
            'name' => 'World - S hemisphere - 120°E to 126°E - by country',
        ],
        2102 => [
            'name' => 'World - N hemisphere - 126°E to 132°E - by country',
        ],
        2103 => [
            'name' => 'World - S hemisphere - 126°E to 132°E - by country',
        ],
        2104 => [
            'name' => 'World - N hemisphere - 132°E to 138°E - by country',
        ],
        2105 => [
            'name' => 'World - S hemisphere - 132°E to 138°E - by country',
        ],
        2106 => [
            'name' => 'World - N hemisphere - 138°E to 144°E - by country',
        ],
        2107 => [
            'name' => 'World - S hemisphere - 138°E to 144°E - by country',
        ],
        2108 => [
            'name' => 'World - N hemisphere - 144°E to 150°E - by country',
        ],
        2109 => [
            'name' => 'World - S hemisphere - 144°E to 150°E - by country',
        ],
        2110 => [
            'name' => 'World - N hemisphere - 150°E to 156°E - by country',
        ],
        2111 => [
            'name' => 'World - S hemisphere - 150°E to 156°E - by country',
        ],
        2112 => [
            'name' => 'World - N hemisphere - 156°E to 162°E - by country',
        ],
        2113 => [
            'name' => 'World - S hemisphere - 156°E to 162°E - by country',
        ],
        2114 => [
            'name' => 'World - N hemisphere - 162°E to 168°E - by country',
        ],
        2115 => [
            'name' => 'World - S hemisphere - 162°E to 168°E - by country',
        ],
        2116 => [
            'name' => 'World - N hemisphere - 168°E to 174°E - by country',
        ],
        2117 => [
            'name' => 'World - S hemisphere - 168°E to 174°E - by country',
        ],
        2118 => [
            'name' => 'World - N hemisphere - 174°E to 180°E - by country',
        ],
        2119 => [
            'name' => 'World - S hemisphere - 174°E to 180°E - by country',
        ],
        2120 => [
            'name' => 'Guatemala - north of 15°51\'30"N',
        ],
        2121 => [
            'name' => 'Guatemala - south of 15°51\'30"N',
        ],
        2122 => [
            'name' => 'Europe - 18°W to 12°W and ETRS89 by country',
        ],
        2123 => [
            'name' => 'Europe - 12°W to 6°W and ETRS89 by country',
        ],
        2124 => [
            'name' => 'Europe - 6°W to 0°W and ETRS89 by country',
        ],
        2125 => [
            'name' => 'Europe - 0°E to 6°E and ETRS89 by country',
        ],
        2126 => [
            'name' => 'Europe - 6°E to 12°E and ETRS89 by country',
        ],
        2127 => [
            'name' => 'Europe - 12°E to 18°E and ETRS89 by country',
        ],
        2128 => [
            'name' => 'Europe - 18°E to 24°E and ETRS89 by country',
        ],
        2129 => [
            'name' => 'Europe - 24°E to 30°E and ETRS89 by country',
        ],
        2130 => [
            'name' => 'Europe - 30°E to 36°E and ETRS89 by country',
        ],
        2131 => [
            'name' => 'Europe - 36°E to 42°E and ETRS89 by country',
        ],
        2133 => [
            'name' => 'USA - 168°W to 162°W - AK, OCS',
        ],
        2134 => [
            'name' => 'USA - 162°W to 156°W - AK, OCS',
        ],
        2135 => [
            'name' => 'USA - 156°W to 150°W - AK, OCS',
        ],
        2136 => [
            'name' => 'USA - 150°W to 144°W - AK, OCS',
        ],
        2137 => [
            'name' => 'North America - 144°W to 138°W and NAD27 by country',
        ],
        2138 => [
            'name' => 'North America - 138°W to 132°W and NAD27 by country - onshore',
        ],
        2139 => [
            'name' => 'North America - 132°W to 126°W and NAD27 by country - onshore',
        ],
        2140 => [
            'name' => 'North America - 126°W to 120°W and NAD27 by country - onshore',
        ],
        2141 => [
            'name' => 'North America - 120°W to 114°W and NAD27 by country - onshore',
        ],
        2142 => [
            'name' => 'North America - 114°W to 108°W and NAD27 by country',
        ],
        2143 => [
            'name' => 'North America - 108°W to 102°W and NAD27 by country',
        ],
        2144 => [
            'name' => 'North America - 102°W to 96°W and NAD27 by country',
        ],
        2145 => [
            'name' => 'North America - 96°W to 90°W and NAD27 by country',
        ],
        2146 => [
            'name' => 'North America - 90°W to 84°W and NAD27 by country',
        ],
        2147 => [
            'name' => 'North America - 84°W to 78°W and NAD27 by country',
        ],
        2148 => [
            'name' => 'North America - 78°W to 72°W and NAD27 by country',
        ],
        2149 => [
            'name' => 'North America - 72°W to 66°W and NAD27 by country',
        ],
        2150 => [
            'name' => 'North America - 66°W to 60°W and NAD27 by country',
        ],
        2151 => [
            'name' => 'Canada - 60°W to 54°W',
        ],
        2152 => [
            'name' => 'Canada - 54°W to 48°W',
        ],
        2153 => [
            'name' => 'Canada - 48°W to 42°W',
        ],
        2154 => [
            'name' => 'USA - Alabama - SPCS - E',
        ],
        2155 => [
            'name' => 'USA - Alabama - SPCS - W',
        ],
        2156 => [
            'name' => 'USA - Alaska - Panhandle',
        ],
        2157 => [
            'name' => 'USA - Alaska - Aleutian Islands',
        ],
        2158 => [
            'name' => 'USA - Alaska - 144°W to 141°W',
        ],
        2159 => [
            'name' => 'USA - Alaska - 148°W to 144°W',
        ],
        2160 => [
            'name' => 'USA - Alaska - 152°W to 148°W',
        ],
        2161 => [
            'name' => 'USA - Alaska - 156°W to 152°W',
        ],
        2162 => [
            'name' => 'USA - Alaska - 160°W to 156°W',
        ],
        2163 => [
            'name' => 'USA - Alaska - 164°W to 160°W',
        ],
        2164 => [
            'name' => 'USA - Alaska - north of 54.5°N; 168°W to 164°W',
        ],
        2165 => [
            'name' => 'USA - Alaska - north of 54.5°N; west of 168°W',
        ],
        2166 => [
            'name' => 'USA - Arizona - SPCS - C',
        ],
        2167 => [
            'name' => 'USA - Arizona - SPCS - E',
        ],
        2168 => [
            'name' => 'USA - Arizona - SPCS - W',
        ],
        2169 => [
            'name' => 'USA - Arkansas - SPCS - N',
        ],
        2170 => [
            'name' => 'USA - Arkansas - SPCS - S',
        ],
        2171 => [
            'name' => 'USA - GoM OCS - west of 96°W',
        ],
        2172 => [
            'name' => 'USA - GoM OCS - 96°W to 90°W',
        ],
        2173 => [
            'name' => 'USA - GoM OCS - 90°W to 84°W',
        ],
        2174 => [
            'name' => 'USA - GoM OCS - east of 84°W',
        ],
        2175 => [
            'name' => 'USA - California - SPCS - 1',
        ],
        2176 => [
            'name' => 'USA - California - SPCS - 2',
        ],
        2177 => [
            'name' => 'USA - California - SPCS - 3',
        ],
        2178 => [
            'name' => 'USA - California - SPCS - 4',
        ],
        2179 => [
            'name' => 'USA - California - SPCS27 - 5',
        ],
        2180 => [
            'name' => 'USA - California - SPCS - 6',
        ],
        2181 => [
            'name' => 'USA - California - SPCS27 - 7',
        ],
        2182 => [
            'name' => 'USA - California - SPCS83 - 5',
        ],
        2183 => [
            'name' => 'USA - Colorado - SPCS - C',
        ],
        2184 => [
            'name' => 'USA - Colorado - SPCS - N',
        ],
        2185 => [
            'name' => 'USA - Colorado - SPCS - S',
        ],
        2186 => [
            'name' => 'USA - Florida - SPCS - E',
        ],
        2187 => [
            'name' => 'USA - Florida - SPCS - N',
        ],
        2188 => [
            'name' => 'USA - Florida - SPCS - W',
        ],
        2189 => [
            'name' => 'USA - Georgia - SPCS - E',
        ],
        2190 => [
            'name' => 'USA - Georgia - SPCS - W',
        ],
        2191 => [
            'name' => 'USA - Idaho - SPCS - C',
        ],
        2192 => [
            'name' => 'USA - Idaho - SPCS - E',
        ],
        2193 => [
            'name' => 'USA - Idaho - SPCS - W',
        ],
        2194 => [
            'name' => 'USA - Illinois - SPCS - E',
        ],
        2195 => [
            'name' => 'USA - Illinois - SPCS - W',
        ],
        2196 => [
            'name' => 'USA - Indiana - SPCS - E',
        ],
        2197 => [
            'name' => 'USA - Indiana - SPCS - W',
        ],
        2198 => [
            'name' => 'USA - Iowa - SPCS - N',
        ],
        2199 => [
            'name' => 'USA - Iowa - SPCS - S',
        ],
        2200 => [
            'name' => 'USA - Kansas - SPCS - N',
        ],
        2201 => [
            'name' => 'USA - Kansas - SPCS - S',
        ],
        2202 => [
            'name' => 'USA - Kentucky - SPCS - N',
        ],
        2203 => [
            'name' => 'USA - Kentucky - SPCS - S',
        ],
        2204 => [
            'name' => 'USA - Louisiana - SPCS - N',
        ],
        2205 => [
            'name' => 'USA - Louisiana - SPCS27 - S',
        ],
        2206 => [
            'name' => 'USA - Maine - SPCS - E',
        ],
        2207 => [
            'name' => 'USA - Maine - SPCS - W',
        ],
        2208 => [
            'name' => 'USA - Massachusetts - SPCS - islands',
        ],
        2209 => [
            'name' => 'USA - Massachusetts - SPCS - mainland',
        ],
        2210 => [
            'name' => 'USA - Montana - SPCS27 - C',
        ],
        2211 => [
            'name' => 'USA - Montana - SPCS27 - N',
        ],
        2212 => [
            'name' => 'USA - Montana - SPCS27 - S',
        ],
        2213 => [
            'name' => 'USA - Minnesota - SPCS - C',
        ],
        2214 => [
            'name' => 'USA - Minnesota - SPCS - N',
        ],
        2215 => [
            'name' => 'USA - Minnesota - SPCS - S',
        ],
        2216 => [
            'name' => 'USA - Mississippi - SPCS - E',
        ],
        2217 => [
            'name' => 'USA - Mississippi - SPCS - W',
        ],
        2218 => [
            'name' => 'USA - Missouri - SPCS - C',
        ],
        2219 => [
            'name' => 'USA - Missouri - SPCS - E',
        ],
        2220 => [
            'name' => 'USA - Missouri - SPCS - W',
        ],
        2221 => [
            'name' => 'USA - Nebraska - SPCS27 - N',
        ],
        2222 => [
            'name' => 'USA - Nebraska - SPCS27 - S',
        ],
        2223 => [
            'name' => 'USA - Nevada - SPCS - C',
        ],
        2224 => [
            'name' => 'USA - Nevada - SPCS - E',
        ],
        2225 => [
            'name' => 'USA - Nevada - SPCS - W',
        ],
        2226 => [
            'name' => 'Canada - Newfoundland - east of 54.5°W',
        ],
        2227 => [
            'name' => 'Canada - Newfoundland and Labrador - 57.5°W to 54.5°W',
        ],
        2228 => [
            'name' => 'USA - New Mexico - SPCS - E',
        ],
        2229 => [
            'name' => 'USA - New Mexico - SPCS27 - C',
        ],
        2230 => [
            'name' => 'USA - New Mexico - SPCS27 - W',
        ],
        2231 => [
            'name' => 'USA - New Mexico - SPCS83 - C',
        ],
        2232 => [
            'name' => 'USA - New Mexico - SPCS83 - W',
        ],
        2233 => [
            'name' => 'USA - New York - SPCS - C',
        ],
        2234 => [
            'name' => 'USA - New York - SPCS - E',
        ],
        2235 => [
            'name' => 'USA - New York - SPCS - Long Island',
        ],
        2236 => [
            'name' => 'USA - New York - SPCS - W',
        ],
        2237 => [
            'name' => 'USA - North Dakota - SPCS - N',
        ],
        2238 => [
            'name' => 'USA - North Dakota - SPCS - S',
        ],
        2239 => [
            'name' => 'USA - Ohio - SPCS - N',
        ],
        2240 => [
            'name' => 'USA - Ohio - SPCS - S',
        ],
        2241 => [
            'name' => 'USA - Oklahoma - SPCS - N',
        ],
        2242 => [
            'name' => 'USA - Oklahoma - SPCS - S',
        ],
        2243 => [
            'name' => 'USA - Oregon - SPCS - N',
        ],
        2244 => [
            'name' => 'USA - Oregon - SPCS - S',
        ],
        2245 => [
            'name' => 'USA - Pennsylvania - SPCS - N',
        ],
        2246 => [
            'name' => 'USA - Pennsylvania - SPCS - S',
        ],
        2247 => [
            'name' => 'USA - South Carolina - SPCS27 - N',
        ],
        2248 => [
            'name' => 'USA - South Carolina - SPCS27 - S',
        ],
        2249 => [
            'name' => 'USA - South Dakota - SPCS - N',
        ],
        2250 => [
            'name' => 'USA - South Dakota - SPCS - S',
        ],
        2251 => [
            'name' => 'Caribbean - Puerto Rico and US Virgin Islands',
        ],
        2252 => [
            'name' => 'USA - Texas - SPCS - C',
        ],
        2253 => [
            'name' => 'USA - Texas - SPCS - N',
        ],
        2254 => [
            'name' => 'USA - Texas - SPCS - NC',
        ],
        2255 => [
            'name' => 'USA - Texas - SPCS27 - S',
        ],
        2256 => [
            'name' => 'USA - Texas - SPCS27 - SC',
        ],
        2257 => [
            'name' => 'USA - Utah - SPCS - C',
        ],
        2258 => [
            'name' => 'USA - Utah - SPCS - N',
        ],
        2259 => [
            'name' => 'USA - Utah - SPCS - S',
        ],
        2260 => [
            'name' => 'USA - Virginia - SPCS - N',
        ],
        2261 => [
            'name' => 'USA - Virginia - SPCS - S',
        ],
        2262 => [
            'name' => 'USA - Washington - SPCS27 - N',
        ],
        2263 => [
            'name' => 'USA - Washington - SPCS27 - S',
        ],
        2264 => [
            'name' => 'USA - West Virginia - SPCS - N',
        ],
        2265 => [
            'name' => 'USA - West Virginia - SPCS - S',
        ],
        2266 => [
            'name' => 'USA - Wisconsin - SPCS - C',
        ],
        2267 => [
            'name' => 'USA - Wisconsin - SPCS - N',
        ],
        2268 => [
            'name' => 'USA - Wisconsin - SPCS - S',
        ],
        2269 => [
            'name' => 'USA - Wyoming - SPCS - E',
        ],
        2270 => [
            'name' => 'USA - Wyoming - SPCS - EC',
        ],
        2271 => [
            'name' => 'USA - Wyoming - SPCS - W',
        ],
        2272 => [
            'name' => 'USA - Wyoming - SPCS - WC',
        ],
        2273 => [
            'name' => 'USA - Washington - SPCS83 - N',
        ],
        2274 => [
            'name' => 'USA - Washington - SPCS83 - S',
        ],
        2275 => [
            'name' => 'Canada - Newfoundland and Labrador - 60°W to 57.5°W',
        ],
        2276 => [
            'name' => 'Canada - Quebec and Labrador - 63°W to 60°W',
        ],
        2277 => [
            'name' => 'Canada - Quebec and Labrador - 66°W to 63°W',
        ],
        2278 => [
            'name' => 'Canada - Quebec and Labrador - 69°W to 66°W',
        ],
        2279 => [
            'name' => 'Canada - Quebec and Ontario - 75°W to 72°W',
        ],
        2280 => [
            'name' => 'Canada - Quebec and Ontario - 78°W to 75°W',
        ],
        2281 => [
            'name' => 'Canada - Quebec and Ontario - MTM zone 10',
        ],
        2282 => [
            'name' => 'Cote d\'Ivoire (Ivory Coast) - Abidjan area',
        ],
        2283 => [
            'name' => 'Australia - Australian Capital Territory',
        ],
        2284 => [
            'name' => 'Australia - Northern Territory',
        ],
        2285 => [
            'name' => 'Australia - Victoria',
        ],
        2286 => [
            'name' => 'Australia - New South Wales and Victoria',
        ],
        2288 => [
            'name' => 'American Samoa - Tutuila island',
        ],
        2290 => [
            'name' => 'Canada - Quebec, Newfoundland and Labrador - MTM zone 3',
        ],
        2291 => [
            'name' => 'Australasia - Australia and PNG - 150°E to 156°E',
        ],
        2294 => [
            'name' => 'Asia - Middle East - Iraq zone',
        ],
        2295 => [
            'name' => 'Caribbean - Windward and Leeward Islands',
        ],
        2296 => [
            'name' => 'Cote d\'Ivoire (Ivory Coast) - offshore',
        ],
        2299 => [
            'name' => 'World - N hemisphere - 3-degree CM 003°E',
        ],
        2300 => [
            'name' => 'World - N hemisphere - 3-degree CM 006°E',
        ],
        2301 => [
            'name' => 'World - N hemisphere - 3-degree CM 009°E',
        ],
        2302 => [
            'name' => 'World - N hemisphere - 3-degree CM 012°E',
        ],
        2303 => [
            'name' => 'World - N hemisphere - 3-degree CM 015°E',
        ],
        2304 => [
            'name' => 'World - N hemisphere - 3-degree CM 018°E',
        ],
        2305 => [
            'name' => 'World - N hemisphere - 3-degree CM 021°E',
        ],
        2306 => [
            'name' => 'World - N hemisphere - 3-degree CM 024°E',
        ],
        2311 => [
            'name' => 'Africa - Kenya and Tanzania',
        ],
        2313 => [
            'name' => 'Canada - Nova Scotia',
        ],
        2319 => [
            'name' => 'Angola - offshore block 7',
        ],
        2323 => [
            'name' => 'Angola - offshore blocks 1 16 and 18',
        ],
        2325 => [
            'name' => 'Argentina - Neuquen province Auca Mahuida area',
        ],
        2326 => [
            'name' => 'Germany - West Germany all states',
        ],
        2328 => [
            'name' => 'Syria - Shaddadeh area',
        ],
        2329 => [
            'name' => 'Syria - Deir area',
        ],
        2330 => [
            'name' => 'Europe - North Sea',
        ],
        2332 => [
            'name' => 'Norway - offshore north of 65°N; Svalbard',
        ],
        2334 => [
            'name' => 'Norway - North Sea - offshore south of 62°N',
        ],
        2335 => [
            'name' => 'Spain - Balearic Islands',
        ],
        2336 => [
            'name' => 'Spain - mainland except northwest',
        ],
        2337 => [
            'name' => 'Spain - mainland northwest',
        ],
        2338 => [
            'name' => 'Europe - Portugal and Spain',
        ],
        2339 => [
            'name' => 'Italy - Sardinia onshore',
        ],
        2340 => [
            'name' => 'Italy - Sicily onshore',
        ],
        2341 => [
            'name' => 'Egypt - Gulf of Suez',
        ],
        2342 => [
            'name' => 'Europe - common offshore',
        ],
        2343 => [
            'name' => 'Europe - British Isles and Channel Islands onshore',
        ],
        2344 => [
            'name' => 'Europe - Finland and Norway - onshore',
        ],
        2345 => [
            'name' => 'Asia - Middle East - Iraq; Israel; Jordan; Lebanon; Kuwait; Saudi Arabia; Syria',
        ],
        2350 => [
            'name' => 'Mozambique - A',
        ],
        2351 => [
            'name' => 'Mozambique - B',
        ],
        2352 => [
            'name' => 'Mozambique - C',
        ],
        2353 => [
            'name' => 'Mozambique - D',
        ],
        2355 => [
            'name' => 'Falkland Islands - East Falkland Island',
        ],
        2356 => [
            'name' => 'Ecuador - Galapagos onshore',
        ],
        2357 => [
            'name' => 'Argentina - Tierra del Fuego onshore',
        ],
        2359 => [
            'name' => 'Vietnam - 14°N to 18°N onshore',
        ],
        2360 => [
            'name' => 'Vietnam - Con Son Island',
        ],
        2361 => [
            'name' => 'Myanmar (Burma) - Moattama area',
        ],
        2362 => [
            'name' => 'Iran - Kangan district',
        ],
        2363 => [
            'name' => 'Venezuela - east',
        ],
        2364 => [
            'name' => 'Philippines - onshore excluding Mindanao',
        ],
        2365 => [
            'name' => 'Philippines - Mindanao onshore',
        ],
        2366 => [
            'name' => 'Spain - mainland onshore',
        ],
        2367 => [
            'name' => 'Spain - mainland northeast',
        ],
        2368 => [
            'name' => 'Spain - mainland southwest',
        ],
        2369 => [
            'name' => 'Seychelles - Mahe Island',
        ],
        2370 => [
            'name' => 'Europe - former Yugoslavia onshore',
        ],
        2371 => [
            'name' => 'Nigeria - south',
        ],
        2372 => [
            'name' => 'Italy - mainland',
        ],
        2373 => [
            'name' => 'USA - Alaska including EEZ',
        ],
        2375 => [
            'name' => 'Canada - Saskatchewan',
        ],
        2376 => [
            'name' => 'Canada - Alberta',
        ],
        2381 => [
            'name' => 'USA - Oregon and Washington',
        ],
        2384 => [
            'name' => 'Canada - Alberta and British Columbia',
        ],
        2385 => [
            'name' => 'Panama - Canal Zone',
        ],
        2386 => [
            'name' => 'Greenland - Hayes Peninsula',
        ],
        2387 => [
            'name' => 'USA - Alaska - Aleutian Islands east of 180°E',
        ],
        2388 => [
            'name' => 'USA - Alaska - Aleutian Islands west of 180°W',
        ],
        2389 => [
            'name' => 'USA - CONUS east of Mississippi River - onshore',
        ],
        2390 => [
            'name' => 'USA - CONUS west of Mississippi River - onshore',
        ],
        2392 => [
            'name' => 'UAE - Abu al Bu Khoosh',
        ],
        2393 => [
            'name' => 'Algeria - Hassi Messaoud',
        ],
        2399 => [
            'name' => 'South America - Bolivia; Chile; Ecuador; Guyana; Peru; Venezuela',
        ],
        2400 => [
            'name' => 'Bolivia - Madidi',
        ],
        2401 => [
            'name' => 'Bolivia - Block 20',
        ],
        2404 => [
            'name' => 'Oman - block 4',
        ],
        2405 => [
            'name' => 'Kazakhstan - Caspian Sea',
        ],
        2408 => [
            'name' => 'Japan - Okinawa',
        ],
        2410 => [
            'name' => 'Canada - NWT; Nunavut; Saskatchewan',
        ],
        2412 => [
            'name' => 'USA - Alaska mainland',
        ],
        2413 => [
            'name' => 'Bahamas - main islands onshore',
        ],
        2414 => [
            'name' => 'Bahamas (San Salvador Island) - onshore',
        ],
        2415 => [
            'name' => 'Canada - Manitoba and Ontario',
        ],
        2416 => [
            'name' => 'Canada - eastern provinces',
        ],
        2417 => [
            'name' => 'Canada - Yukon',
        ],
        2418 => [
            'name' => 'Caribbean - central (DMA tfm)',
        ],
        2419 => [
            'name' => 'Central America - Belize to Costa Rica',
        ],
        2420 => [
            'name' => 'Europe - west (DMA ED50 mean)',
        ],
        2421 => [
            'name' => 'Europe - west central (by country)',
        ],
        2423 => [
            'name' => 'Europe - FSU onshore',
        ],
        2425 => [
            'name' => 'Japan - 45°20\'N to 46°N; 141°E to 142°E',
        ],
        2426 => [
            'name' => 'Japan - 45°20\'N to 46°N; 142°E to 143°E',
        ],
        2427 => [
            'name' => 'Japan - 44°40\'N to 45°20\'N; 141°E to 142°E',
        ],
        2428 => [
            'name' => 'Japan - 44°40\'N to 45°20\'N; 142°E to 143°E',
        ],
        2429 => [
            'name' => 'Japan - 44°N to 44°40\'N; 141°E to 142°E',
        ],
        2430 => [
            'name' => 'Japan - 44°N to 44°40\'N; 142°E to 143°E',
        ],
        2431 => [
            'name' => 'Japan - 44°N to 44°40\'N; 143°E to 144°E',
        ],
        2432 => [
            'name' => 'Japan - 44°N to 44°40\'N; 144°E to 145°E',
        ],
        2433 => [
            'name' => 'Japan - 43°20\'N to 44°N; 141°E to 142°E',
        ],
        2434 => [
            'name' => 'Japan - 43°20\'N to 44°N; 142°E to 143°E',
        ],
        2435 => [
            'name' => 'Japan - 43°20\'N to 44°N; 143°E to 144°E',
        ],
        2436 => [
            'name' => 'Japan - 43°20\'N to 44°N; 144°E to 145°E',
        ],
        2437 => [
            'name' => 'Japan - north of 43°20\'N; 145°E to 146°E',
        ],
        2438 => [
            'name' => 'Japan - 42°40\'N to 43°25\'N; 140°E to 141°E',
        ],
        2439 => [
            'name' => 'Japan - 42°40\'N to 43°20\'N; 141°E to 142°E',
        ],
        2440 => [
            'name' => 'Japan - 42°40\'N to 43°20\'N; 142°E to 143°E',
        ],
        2441 => [
            'name' => 'Japan - 42°40\'N to 43°20\'N; 143°E to 144°E',
        ],
        2442 => [
            'name' => 'Japan - 42°40\'N to 43°20\'N; 144°E to 145°E',
        ],
        2443 => [
            'name' => 'Japan - 42°40\'N to 43°20\'N; 145°E to 146°E',
        ],
        2444 => [
            'name' => 'Japan - north of 42°N; west of 140°E',
        ],
        2445 => [
            'name' => 'Japan - 42°N to 42°40\'N; 140°E to 141°E',
        ],
        2446 => [
            'name' => 'Japan - 42°N to 42°40\'N; 141°E to 142°E',
        ],
        2447 => [
            'name' => 'Japan - 42°N to 42°40\'N; 142°E to 143°E',
        ],
        2448 => [
            'name' => 'Japan - south of 42°40\'N; 143°E to 144°E',
        ],
        2449 => [
            'name' => 'Japan - 41°20\'N to 42°N; west of 141°E',
        ],
        2450 => [
            'name' => 'Japan - 41°20\'N to 42°N; 141°E to 142°E',
        ],
        2451 => [
            'name' => 'Japan - 40°40\'N to 41°20\'N; 140°E to 141°E',
        ],
        2452 => [
            'name' => 'Japan - 40°40\'N to 41°20\'N; 141°E to 142°E',
        ],
        2453 => [
            'name' => 'Japan - 40°N to 40°48\'N; 139°E to 140°E',
        ],
        2454 => [
            'name' => 'Japan - 40°N to 40°40\'N; 140°E to 141°E',
        ],
        2455 => [
            'name' => 'Japan - 40°N to 40°40\'N; 141°E to 142°E',
        ],
        2456 => [
            'name' => 'Japan - 39°20\'N to 40°N; 139°E to 140°E',
        ],
        2457 => [
            'name' => 'Japan - 39°20\'N to 40°N; 140°E to 141°E',
        ],
        2458 => [
            'name' => 'Japan - 39°20\'N to 40°N; east of 141°E',
        ],
        2459 => [
            'name' => 'Japan - 38°40\'N to 39°20\'N; 139°E to 140°E',
        ],
        2460 => [
            'name' => 'Japan - 38°40\'N to 39°20\'N; 140°E to 141°E',
        ],
        2461 => [
            'name' => 'Japan - 38°40\'N to 39°20\'N; 141°E to 142°E',
        ],
        2462 => [
            'name' => 'Japan - 38°N to 38°40\'N; 139°E to 140°E',
        ],
        2463 => [
            'name' => 'Japan - 38°N to 38°40\'N; 140°E to 141°E',
        ],
        2464 => [
            'name' => 'Japan - 38°N to 38°40\'N; 141°E to 142°E',
        ],
        2465 => [
            'name' => 'Japan - 37°20\'N to 38°N; 136°E to 137°E',
        ],
        2466 => [
            'name' => 'Japan - 37°20\'N to 38°N; 137°E to 138°E',
        ],
        2467 => [
            'name' => 'Japan - 37°20\'N to 38°N; 138°E to 139°E',
        ],
        2468 => [
            'name' => 'Japan - 37°20\'N to 38°N; 139°E to 140°E',
        ],
        2469 => [
            'name' => 'Japan - 37°20\'N to 38°N; 140°E to 141°E',
        ],
        2470 => [
            'name' => 'Japan - 37°20\'N to 38°N; 141°E to 142°E',
        ],
        2471 => [
            'name' => 'Japan - 36°40\'N to 37°20\'N; 136°E to 137°E',
        ],
        2472 => [
            'name' => 'Japan - 36°40\'N to 37°20\'N; 137°E to 138°E',
        ],
        2473 => [
            'name' => 'Japan - 36°40\'N to 37°20\'N; 138°E to 139°E',
        ],
        2474 => [
            'name' => 'Japan - 36°40\'N to 37°20\'N; 139°E to 140°E',
        ],
        2475 => [
            'name' => 'Japan - 36°40\'N to 37°20\'N; east of 140°E',
        ],
        2476 => [
            'name' => 'Japan - 36°N to 36°40\'N; west of137°E',
        ],
        2477 => [
            'name' => 'Japan - 36°N to 36°40\'N; 137°E to 138°E',
        ],
        2478 => [
            'name' => 'Japan - 36°N to 36°40\'N; 138°E to 139°E',
        ],
        2479 => [
            'name' => 'Japan - 36°N to 36°40\'N; 139°E to 140°E',
        ],
        2480 => [
            'name' => 'Japan - 36°N to 36°40\'N; 140°E to 141°E',
        ],
        2481 => [
            'name' => 'Japan - 35°20\'N to 36°N; 132°E to 133°E',
        ],
        2482 => [
            'name' => 'Japan - 35°20\'N to 36°N; 133°E to 134°E',
        ],
        2483 => [
            'name' => 'Japan - 35°20\'N to 36°N; 134°E to 135°E',
        ],
        2484 => [
            'name' => 'Japan - 35°20\'N to 36°N; 135°E to 136°E',
        ],
        2485 => [
            'name' => 'Japan - 35°20\'N to 36°N; 136°E to 137°E',
        ],
        2486 => [
            'name' => 'Japan - 35°20\'N to 36°N; 137°E to 138°E',
        ],
        2487 => [
            'name' => 'Japan - 35°20\'N to 36°N; 138°E to 139°E',
        ],
        2488 => [
            'name' => 'Japan - 35°20\'N to 36°N; 139°E to 140°E',
        ],
        2489 => [
            'name' => 'Japan - 35°20\'N to 36°N; 140°E to 141°E',
        ],
        2490 => [
            'name' => 'Japan - 34°40\'N to 35°20\'N; 132°E to 133°E',
        ],
        2491 => [
            'name' => 'Japan - 34°40\'N to 35°20\'N; 133°E to 134°E',
        ],
        2492 => [
            'name' => 'Japan - 34°40\'N to 35°20\'N; 134°E to 135°E',
        ],
        2493 => [
            'name' => 'Japan - 34°40N\' to 35°20\'N; 135°E to 136°E',
        ],
        2494 => [
            'name' => 'Japan - 34°40\'N to 35°20\'N; 136°E to 137°E',
        ],
        2495 => [
            'name' => 'Japan - 34°40\'N to 35°20\'N; 137°E to 138°E',
        ],
        2496 => [
            'name' => 'Japan - 34°40\'N to 35°20\'N; 138°E to 139°E',
        ],
        2497 => [
            'name' => 'Japan - 34°40\'N to 35°20\'N; 139°E to 140°E',
        ],
        2498 => [
            'name' => 'Japan - 34°40\'N to 35°20\'N; 140°E to 141°E',
        ],
        2499 => [
            'name' => 'Japan - 34°N to 34°40\'N; 130°E to 131°E',
        ],
        2500 => [
            'name' => 'Japan - north of 34°N; 131°E to 132°E',
        ],
        2501 => [
            'name' => 'Japan - 34°N to 34°40\'N; 132°E to 133°E',
        ],
        2502 => [
            'name' => 'Japan - 34°N to 34°40\'N; 133°E to 134°E',
        ],
        2503 => [
            'name' => 'Japan - 34°N to 34°40\'N; 134°E to 135°E',
        ],
        2504 => [
            'name' => 'Japan - 34°N to 34°40\'N; 135°E to 136°E',
        ],
        2505 => [
            'name' => 'Japan - 34°N to 34°40\'N; 136°E to 137°E',
        ],
        2506 => [
            'name' => 'Japan - 34°N to 34°40\'N; 137°E to 138°E',
        ],
        2507 => [
            'name' => 'Japan - 34°N to 34°40\'N; 138°E to 139°E',
        ],
        2508 => [
            'name' => 'Japan - 33°20\'N to 34°N; 129°E to 130°E',
        ],
        2509 => [
            'name' => 'Japan - 33°20\'N to 34°N; 130°E to 131°E',
        ],
        2510 => [
            'name' => 'Japan - 33°20\'N to 34°N; 131°E to 132°E',
        ],
        2511 => [
            'name' => 'Japan - 33°20\'N to 34°N; 132°E to 133°E',
        ],
        2512 => [
            'name' => 'Japan - 33°20\'N to 34°N; 133°E to 134°E',
        ],
        2513 => [
            'name' => 'Japan - 33°20\'N to 34°N; 134°E to 135°E',
        ],
        2514 => [
            'name' => 'Japan - 33°20\'N to 34°N; 135°E to 136°E',
        ],
        2515 => [
            'name' => 'Japan - 33°20\'N to 34°N; 136°E to 137°E',
        ],
        2516 => [
            'name' => 'Japan - 32°40\'N to 33°20\'N; 129°E to 130°E',
        ],
        2517 => [
            'name' => 'Japan - 32°40\'N to 33°20\'N; 130°E to 131°E',
        ],
        2518 => [
            'name' => 'Japan - 32°40\'N to 33°20\'N; 131°E to 132°E',
        ],
        2519 => [
            'name' => 'Japan - 32°40\'N to 33°20\'N; 132°E to 133°E',
        ],
        2520 => [
            'name' => 'Japan - 32°40\'N to 33°20\'N; 133°E to 134°E',
        ],
        2521 => [
            'name' => 'Japan - 32°40\'N to 33°20\'N; 134°E to 135°E',
        ],
        2522 => [
            'name' => 'Japan - 32°N to 32°40\'N; 129°54\'E to 131°E',
        ],
        2523 => [
            'name' => 'Japan - 32°N to 32°40\'N; 131°E to 132°E',
        ],
        2524 => [
            'name' => 'Japan - 31°20\'N to 32°N; 130°E to 131°E',
        ],
        2525 => [
            'name' => 'Japan - 31°20\'N to 32°N; 131°E to 132°E',
        ],
        2526 => [
            'name' => 'Japan - onshore mainland south of 31°20\'N',
        ],
        2527 => [
            'name' => 'USA - Texas - SPCS83 - SC',
        ],
        2528 => [
            'name' => 'USA - Texas - SPCS83 - S',
        ],
        2529 => [
            'name' => 'USA - Louisiana - SPCS83 - S',
        ],
        2530 => [
            'name' => 'UK - Northern Ireland - onshore',
        ],
        2531 => [
            'name' => 'Denmark - onshore Jutland and Funen',
        ],
        2532 => [
            'name' => 'Denmark - onshore Zealand and Lolland',
        ],
        2533 => [
            'name' => 'Denmark - onshore Bornholm',
        ],
        2534 => [
            'name' => 'World - N hemisphere - 3-degree CM 027°E',
        ],
        2535 => [
            'name' => 'World - N hemisphere - 3-degree CM 030°E',
        ],
        2536 => [
            'name' => 'World - N hemisphere - 3-degree CM 033°E',
        ],
        2537 => [
            'name' => 'World - N hemisphere - 3-degree CM 036°E',
        ],
        2538 => [
            'name' => 'World - N hemisphere - 3-degree CM 039°E',
        ],
        2539 => [
            'name' => 'World - N hemisphere - 3-degree CM 042°E',
        ],
        2540 => [
            'name' => 'World - N hemisphere - 3-degree CM 045°E',
        ],
        2541 => [
            'name' => 'Germany - West Germany N',
        ],
        2542 => [
            'name' => 'Germany - West Germany C',
        ],
        2543 => [
            'name' => 'Germany - West Germany S',
        ],
        2544 => [
            'name' => 'Germany - Thuringen',
        ],
        2545 => [
            'name' => 'Germany - Saxony',
        ],
        2546 => [
            'name' => 'Romania - offshore',
        ],
        2552 => [
            'name' => 'Africa - AEF 9°E to 14°E',
        ],
        2555 => [
            'name' => 'Cameroon - coastal area',
        ],
        2560 => [
            'name' => 'Greenland - east - 69°N to 72°N',
        ],
        2561 => [
            'name' => 'Greenland - east - 66°N to 69°N',
        ],
        2562 => [
            'name' => 'Greenland - east - 63°N to 66°N',
        ],
        2563 => [
            'name' => 'Greenland - west - 78°N to 81°N',
        ],
        2564 => [
            'name' => 'Greenland - west - 75°N to 78°N',
        ],
        2565 => [
            'name' => 'Greenland - west - 72°N to 75°N',
        ],
        2566 => [
            'name' => 'Greenland - west - 69°N to 72°N',
        ],
        2567 => [
            'name' => 'Greenland - west - 66°N to 69°N',
        ],
        2568 => [
            'name' => 'Greenland - west - 63°N to 66°N',
        ],
        2569 => [
            'name' => 'Greenland - south of 63°N',
        ],
        2570 => [
            'name' => 'Greenland - Scoresbysund area',
        ],
        2571 => [
            'name' => 'Greenland - Ammassalik area',
        ],
        2572 => [
            'name' => 'Greenland - southwest coast east of 48°W',
        ],
        2573 => [
            'name' => 'Greenland - southwest coast 54°W to 48°W',
        ],
        2574 => [
            'name' => 'Congo - coastal area and offshore',
        ],
        2575 => [
            'name' => 'Australia - onshore',
        ],
        2576 => [
            'name' => 'Australia - AGD84',
        ],
        2577 => [
            'name' => 'Indonesia - Java Sea - offshore northwest Java',
        ],
        2588 => [
            'name' => 'Indonesia - Bali Sea west',
        ],
        2589 => [
            'name' => 'Indonesia - West Papua - Tangguh',
        ],
        2590 => [
            'name' => 'Cameroon - Garoua area',
        ],
        2591 => [
            'name' => 'Cameroon - N\'Djamena area',
        ],
        2592 => [
            'name' => 'Azerbaijan - offshore and Sangachal',
        ],
        2593 => [
            'name' => 'Asia - FSU - Azerbaijan and Georgia',
        ],
        2594 => [
            'name' => 'Azerbaijan - coastal area Baku to Astara',
        ],
        2595 => [
            'name' => 'Egypt - Western Desert',
        ],
        2596 => [
            'name' => 'Argentina - Tierra del Fuego offshore west of 66°W',
        ],
        2597 => [
            'name' => 'Argentina - Tierra del Fuego offshore east of 66°W',
        ],
        2603 => [
            'name' => 'Asia - Middle East - Israel and Palestine Territory onshore',
        ],
        2604 => [
            'name' => 'World - N hemisphere - 3-degree CM 048°E',
        ],
        2605 => [
            'name' => 'World - N hemisphere - 3-degree CM 051°E',
        ],
        2606 => [
            'name' => 'World - N hemisphere - 3-degree CM 054°E',
        ],
        2607 => [
            'name' => 'World - N hemisphere - 3-degree CM 057°E',
        ],
        2608 => [
            'name' => 'World - N hemisphere - 3-degree CM 060°E',
        ],
        2609 => [
            'name' => 'World - N hemisphere - 3-degree CM 063°E',
        ],
        2610 => [
            'name' => 'World - N hemisphere - 3-degree CM 066°E',
        ],
        2611 => [
            'name' => 'World - N hemisphere - 3-degree CM 069°E',
        ],
        2612 => [
            'name' => 'World - N hemisphere - 3-degree CM 072°E',
        ],
        2613 => [
            'name' => 'World - N hemisphere - 3-degree CM 075°E',
        ],
        2614 => [
            'name' => 'World - N hemisphere - 3-degree CM 078°E',
        ],
        2615 => [
            'name' => 'World - N hemisphere - 3-degree CM 081°E',
        ],
        2616 => [
            'name' => 'World - N hemisphere - 3-degree CM 084°E',
        ],
        2617 => [
            'name' => 'World - N hemisphere - 3-degree CM 087°E',
        ],
        2618 => [
            'name' => 'World - N hemisphere - 3-degree CM 090°E',
        ],
        2619 => [
            'name' => 'World - N hemisphere - 3-degree CM 093°E',
        ],
        2620 => [
            'name' => 'World - N hemisphere - 3-degree CM 096°E',
        ],
        2621 => [
            'name' => 'World - N hemisphere - 3-degree CM 099°E',
        ],
        2622 => [
            'name' => 'World - N hemisphere - 3-degree CM 102°E',
        ],
        2623 => [
            'name' => 'World - N hemisphere - 3-degree CM 105°E',
        ],
        2624 => [
            'name' => 'World - N hemisphere - 3-degree CM 108°E',
        ],
        2625 => [
            'name' => 'World - N hemisphere - 3-degree CM 111°E',
        ],
        2626 => [
            'name' => 'World - N hemisphere - 3-degree CM 114°E',
        ],
        2627 => [
            'name' => 'World - N hemisphere - 3-degree CM 117°E',
        ],
        2628 => [
            'name' => 'World - N hemisphere - 3-degree CM 120°E',
        ],
        2629 => [
            'name' => 'World - N hemisphere - 3-degree CM 123°E',
        ],
        2630 => [
            'name' => 'World - N hemisphere - 3-degree CM 126°E',
        ],
        2631 => [
            'name' => 'World - N hemisphere - 3-degree CM 129°E',
        ],
        2632 => [
            'name' => 'World - N hemisphere - 3-degree CM 132°E',
        ],
        2633 => [
            'name' => 'World - N hemisphere - 3-degree CM 135°E',
        ],
        2634 => [
            'name' => 'World - N hemisphere - 3-degree CM 138°E',
        ],
        2635 => [
            'name' => 'World - N hemisphere - 3-degree CM 141°E',
        ],
        2636 => [
            'name' => 'World - N hemisphere - 3-degree CM 144°E',
        ],
        2637 => [
            'name' => 'World - N hemisphere - 3-degree CM 147°E',
        ],
        2638 => [
            'name' => 'World - N hemisphere - 3-degree CM 150°E',
        ],
        2639 => [
            'name' => 'World - N hemisphere - 3-degree CM 153°E',
        ],
        2640 => [
            'name' => 'World - N hemisphere - 3-degree CM 156°E',
        ],
        2641 => [
            'name' => 'World - N hemisphere - 3-degree CM 159°E',
        ],
        2642 => [
            'name' => 'World - N hemisphere - 3-degree CM 162°E',
        ],
        2643 => [
            'name' => 'World - N hemisphere - 3-degree CM 165°E',
        ],
        2644 => [
            'name' => 'World - N hemisphere - 3-degree CM 168°E',
        ],
        2645 => [
            'name' => 'World - N hemisphere - 3-degree CM 171°E',
        ],
        2646 => [
            'name' => 'World - N hemisphere - 3-degree CM 174°E',
        ],
        2647 => [
            'name' => 'World - N hemisphere - 3-degree CM 177°E',
        ],
        2648 => [
            'name' => 'World - N hemisphere - 3-degree CM 180°E',
        ],
        2649 => [
            'name' => 'World - N hemisphere - 3-degree CM 177°W',
        ],
        2650 => [
            'name' => 'World - N hemisphere - 3-degree CM 174°W',
        ],
        2651 => [
            'name' => 'World - N hemisphere - 3-degree CM 171°W',
        ],
        2652 => [
            'name' => 'World - N hemisphere - 3-degree CM 168°W',
        ],
        2653 => [
            'name' => 'Europe - FSU - 19.5°E to 22.5°E onshore',
        ],
        2654 => [
            'name' => 'Europe - FSU - 22.5°E to 25.5°E onshore',
        ],
        2655 => [
            'name' => 'Europe - FSU - 25.5°E to 28.5°E onshore',
        ],
        2656 => [
            'name' => 'Europe - FSU - 28.5°E to 31.5°E onshore',
        ],
        2657 => [
            'name' => 'Europe - FSU - 31.5°E to 34.5°E onshore',
        ],
        2658 => [
            'name' => 'Europe - FSU - 34.5°E to 37.5°E onshore',
        ],
        2659 => [
            'name' => 'Europe - FSU - 37.5°E to 40.5°E onshore',
        ],
        2660 => [
            'name' => 'Europe - FSU - 40.5°E to 43.5°E onshore',
        ],
        2661 => [
            'name' => 'Europe - FSU - 43.5°E to 46.5°E onshore',
        ],
        2662 => [
            'name' => 'Europe - FSU - 46.5°E to 49.5°E onshore',
        ],
        2663 => [
            'name' => 'Asia - FSU - 49.5°E to 52.5°E onshore',
        ],
        2664 => [
            'name' => 'Asia - FSU - 52.5°E to 55.5°E onshore',
        ],
        2665 => [
            'name' => 'Asia - FSU - 55.5°E to 58.5°E onshore',
        ],
        2666 => [
            'name' => 'Asia - FSU - 58.5°E to 61.5°E onshore',
        ],
        2667 => [
            'name' => 'Asia - FSU - 61.5°E to 64.5°E onshore',
        ],
        2668 => [
            'name' => 'Asia - FSU - 64.5°E to 67.5°E onshore',
        ],
        2669 => [
            'name' => 'Asia - FSU - 67.5°E to 70.5°E onshore',
        ],
        2670 => [
            'name' => 'Asia - FSU - 70.5°E to 73.5°E onshore',
        ],
        2671 => [
            'name' => 'Asia - FSU - 73.5°E to 76.5°E onshore',
        ],
        2672 => [
            'name' => 'Asia - FSU - 76.5°E to 79.5°E onshore',
        ],
        2673 => [
            'name' => 'Asia - FSU - 79.5°E to 82.5°E onshore',
        ],
        2674 => [
            'name' => 'Asia - FSU - 82.5°E to 85.5°E onshore',
        ],
        2675 => [
            'name' => 'Asia - FSU - 85.5°E to 88.5°E onshore',
        ],
        2676 => [
            'name' => 'Russia - 88.5°E to 91.5°E onshore',
        ],
        2677 => [
            'name' => 'Russia - 91.5°E to 94.5°E onshore',
        ],
        2678 => [
            'name' => 'Russia - 94.5°E to 97.5°E onshore',
        ],
        2679 => [
            'name' => 'Russia - 97.5°E to 100.5°E onshore',
        ],
        2680 => [
            'name' => 'Russia - 100.5°E to 103.5°E onshore',
        ],
        2681 => [
            'name' => 'Russia - 103.5°E to 106.5°E onshore',
        ],
        2682 => [
            'name' => 'Russia - 106.5°E to 109.5°E onshore',
        ],
        2683 => [
            'name' => 'Russia - 109.5°E to 112.5°E onshore',
        ],
        2684 => [
            'name' => 'Russia - 112.5°E to 115.5°E onshore',
        ],
        2685 => [
            'name' => 'Russia - 115.5°E to 118.5°E onshore',
        ],
        2686 => [
            'name' => 'Russia - 118.5°E to 121.5°E onshore',
        ],
        2687 => [
            'name' => 'Russia - 121.5°E to 124.5°E onshore',
        ],
        2688 => [
            'name' => 'Russia - 124.5°E to 127.5°E onshore',
        ],
        2689 => [
            'name' => 'Russia - 127.5°E to 130.5°E onshore',
        ],
        2690 => [
            'name' => 'Russia - 130.5°E to 133.5°E onshore',
        ],
        2691 => [
            'name' => 'Russia - 133.5°E to 136.5°E onshore',
        ],
        2692 => [
            'name' => 'Russia - 136.5°E to 139.5°E onshore',
        ],
        2693 => [
            'name' => 'Russia - 139.5°E to 142.5°E onshore',
        ],
        2694 => [
            'name' => 'Russia - 142.5°E to 145.5°E onshore',
        ],
        2695 => [
            'name' => 'Russia - 145.5°E to 148.5°E onshore',
        ],
        2696 => [
            'name' => 'Russia - 148.5°E to 151.5°E onshore',
        ],
        2697 => [
            'name' => 'Russia - 151.5°E to 154.5°E onshore',
        ],
        2698 => [
            'name' => 'Russia - 154.5°E to 157.5°E onshore',
        ],
        2699 => [
            'name' => 'Russia - 157.5°E to 160.5°E onshore',
        ],
        2700 => [
            'name' => 'Russia - 160.5°E to 163.5°E onshore',
        ],
        2701 => [
            'name' => 'Russia - 163.5°E to 166.5°E onshore',
        ],
        2702 => [
            'name' => 'Russia - 166.5°E to 169.5°E onshore',
        ],
        2703 => [
            'name' => 'Russia - 169.5°E to 172.5°E onshore',
        ],
        2704 => [
            'name' => 'Russia - 172.5°E to 175.5°E onshore',
        ],
        2705 => [
            'name' => 'Russia - 175.5°E to 178.5°E onshore',
        ],
        2706 => [
            'name' => 'Russia - 178.5°E to 178.5°W onshore',
        ],
        2707 => [
            'name' => 'Russia - 178.5°W to 175.5°W onshore',
        ],
        2708 => [
            'name' => 'Russia - 175.5°W to 172.5°W onshore',
        ],
        2709 => [
            'name' => 'Russia - 172.5°W to 169.5°W onshore',
        ],
        2710 => [
            'name' => 'Russia - east of 169.5°W onshore',
        ],
        2711 => [
            'name' => 'China - west of 76.5°E',
        ],
        2712 => [
            'name' => 'China - 76.5°E to 79.5°E',
        ],
        2713 => [
            'name' => 'China - 79.5°E to 82.5°E',
        ],
        2714 => [
            'name' => 'China - 82.5°E to 85.5°E',
        ],
        2715 => [
            'name' => 'China - 85.5°E to 88.5°E',
        ],
        2716 => [
            'name' => 'China - 88.5°E to 91.5°E',
        ],
        2717 => [
            'name' => 'China - 91.5°E to 94.5°E',
        ],
        2718 => [
            'name' => 'China - 94.5°E to 97.5°E',
        ],
        2719 => [
            'name' => 'China - 97.5°E to 100.5°E',
        ],
        2720 => [
            'name' => 'China - 100.5°E to 103.5°E',
        ],
        2721 => [
            'name' => 'China - 103.5°E to 106.5°E',
        ],
        2722 => [
            'name' => 'China - 106.5°E to 109.5°E onshore',
        ],
        2723 => [
            'name' => 'China - 109.5°E to 112.5°E onshore',
        ],
        2724 => [
            'name' => 'China - 112.5°E to 115.5°E onshore',
        ],
        2725 => [
            'name' => 'China - 115.5°E to 118.5°E onshore',
        ],
        2726 => [
            'name' => 'China - 118.5°E to 121.5°E onshore',
        ],
        2727 => [
            'name' => 'China - 121.5°E to 124.5°E onshore',
        ],
        2728 => [
            'name' => 'China - 124.5°E to 127.5°E onshore',
        ],
        2729 => [
            'name' => 'China - 127.5°E to 130.5°E',
        ],
        2730 => [
            'name' => 'China - 130.5°E to 133.5°E',
        ],
        2731 => [
            'name' => 'China - east of 133.5°E',
        ],
        2741 => [
            'name' => 'World - 6-degree CM 009°E',
        ],
        2742 => [
            'name' => 'World - 6-degree CM 015°E',
        ],
        2743 => [
            'name' => 'World - 6-degree CM 021°E',
        ],
        2744 => [
            'name' => 'World - 6-degree CM 027°E',
        ],
        2745 => [
            'name' => 'World - 6-degree CM 033°E',
        ],
        2746 => [
            'name' => 'World - 6-degree CM 039°E',
        ],
        2747 => [
            'name' => 'Russia - 19.5°E to 22.5°E onshore',
        ],
        2748 => [
            'name' => 'Russia - 22.5°E to 25.5°E onshore',
        ],
        2749 => [
            'name' => 'Russia - 25.5°E to 28.5°E onshore',
        ],
        2750 => [
            'name' => 'Russia - 28.5°E to 31.5°E onshore',
        ],
        2751 => [
            'name' => 'Russia - 31.5°E to 34.5°E onshore',
        ],
        2752 => [
            'name' => 'Russia - 34.5°E to 37.5°E onshore',
        ],
        2753 => [
            'name' => 'Russia - 37.5°E to 40.5°E onshore',
        ],
        2754 => [
            'name' => 'Russia - 40.5°E to 43.5°E onshore',
        ],
        2755 => [
            'name' => 'Russia - 43.5°E to 46.5°E onshore',
        ],
        2756 => [
            'name' => 'Russia - 46.5°E to 49.5°E onshore',
        ],
        2757 => [
            'name' => 'Russia - 49.5°E to 52.5°E onshore',
        ],
        2758 => [
            'name' => 'Russia - 52.5°E to 55.5°E onshore',
        ],
        2759 => [
            'name' => 'Russia - 55.5°E to 58.5°E onshore',
        ],
        2760 => [
            'name' => 'Russia - 58.5°E to 61.5°E onshore',
        ],
        2761 => [
            'name' => 'Russia - 61.5°E to 64.5°E onshore',
        ],
        2762 => [
            'name' => 'Russia - 64.5°E to 67.5°E onshore',
        ],
        2763 => [
            'name' => 'Russia - 67.5°E to 70.5°E onshore',
        ],
        2764 => [
            'name' => 'Russia - 70.5°E to 73.5°E onshore',
        ],
        2765 => [
            'name' => 'Russia - 73.5°E to 76.5°E onshore',
        ],
        2766 => [
            'name' => 'Russia - 76.5°E to 79.5°E onshore',
        ],
        2767 => [
            'name' => 'Russia - 79.5°E to 82.5°E onshore',
        ],
        2768 => [
            'name' => 'Russia - 82.5°E to 85.5°E onshore',
        ],
        2769 => [
            'name' => 'Russia - 85.5°E to 88.5°E onshore',
        ],
        2770 => [
            'name' => 'Indonesia - northeast Kalimantan',
        ],
        2771 => [
            'name' => 'Niger - southeast',
        ],
        2772 => [
            'name' => 'Asia - FSU - CS63 zone A1',
        ],
        2773 => [
            'name' => 'Asia - FSU - CS63 zone A2',
        ],
        2774 => [
            'name' => 'Asia - FSU - CS63 zone A3',
        ],
        2775 => [
            'name' => 'Asia - FSU - CS63 zone A4',
        ],
        2776 => [
            'name' => 'Asia - FSU - CS63 zone K2',
        ],
        2777 => [
            'name' => 'Asia - FSU - CS63 zone K3',
        ],
        2778 => [
            'name' => 'Asia - FSU - CS63 zone K4',
        ],
        2779 => [
            'name' => 'Portugal - Selvagens onshore',
        ],
        2781 => [
            'name' => 'Iran - Kharg Island',
        ],
        2782 => [
            'name' => 'Iran - Lavan Island and Balal field',
        ],
        2783 => [
            'name' => 'Iran - South Pars blocks 2 and 3',
        ],
        2785 => [
            'name' => 'Libya - Murzuq and En Naga',
        ],
        2786 => [
            'name' => 'Libya - Mabruk',
        ],
        2787 => [
            'name' => 'Morocco - south of 31.5°N',
        ],
        2788 => [
            'name' => 'Western Sahara - north of 24.3°N',
        ],
        2789 => [
            'name' => 'Western Sahara - south of 24.3°N',
        ],
        2790 => [
            'name' => 'Africa - 12th parallel N',
        ],
        2791 => [
            'name' => 'Africa - Burkina Faso and SW Niger',
        ],
        2792 => [
            'name' => 'UK - Great Britain mainland onshore',
        ],
        2793 => [
            'name' => 'UK - Orkney Islands onshore',
        ],
        2794 => [
            'name' => 'UK - Fair Isle onshore',
        ],
        2795 => [
            'name' => 'UK - Shetland Islands onshore',
        ],
        2796 => [
            'name' => 'UK - Foula onshore',
        ],
        2797 => [
            'name' => 'UK - Sule Skerry onshore',
        ],
        2798 => [
            'name' => 'UK - North Rona onshore',
        ],
        2799 => [
            'name' => 'UK - Outer Hebrides onshore',
        ],
        2800 => [
            'name' => 'UK - St. Kilda onshore',
        ],
        2801 => [
            'name' => 'UK - Flannan Isles onshore',
        ],
        2802 => [
            'name' => 'UK - Scilly Isles onshore',
        ],
        2803 => [
            'name' => 'Isle of Man - onshore',
        ],
        2805 => [
            'name' => 'Chile - Tierra del Fuego',
        ],
        2807 => [
            'name' => 'Comoros - Njazidja (Grande Comore)',
        ],
        2810 => [
            'name' => 'French Polynesia - Marquesas Islands - Nuku Hiva',
        ],
        2811 => [
            'name' => 'French Polynesia - Society Islands - Moorea and Tahiti',
        ],
        2812 => [
            'name' => 'French Polynesia - Society Islands - Bora Bora, Huahine, Raiatea, Tahaa',
        ],
        2813 => [
            'name' => 'New Caledonia - Ouvea',
        ],
        2814 => [
            'name' => 'New Caledonia - Lifou',
        ],
        2815 => [
            'name' => 'Wallis and Futuna - Wallis',
        ],
        2816 => [
            'name' => 'French Southern Territories - Kerguelen onshore',
        ],
        2817 => [
            'name' => 'Antarctica - Adelie Land - Petrels island',
        ],
        2818 => [
            'name' => 'Antarctica - Adelie Land coastal area',
        ],
        2819 => [
            'name' => 'New Caledonia - Mare',
        ],
        2820 => [
            'name' => 'New Caledonia - Ile des Pins',
        ],
        2821 => [
            'name' => 'New Caledonia - Belep',
        ],
        2822 => [
            'name' => 'New Caledonia - Grande Terre',
        ],
        2823 => [
            'name' => 'New Caledonia - Grande Terre - Noumea',
        ],
        2824 => [
            'name' => 'Caribbean - French Antilles',
        ],
        2825 => [
            'name' => 'Africa - Ethiopia and Sudan - 30°E to 36°E',
        ],
        2827 => [
            'name' => 'Africa - South Sudan and Sudan - 24°E to 30°E',
        ],
        2828 => [
            'name' => 'Guadeloupe - St Martin and St Barthelemy - onshore',
        ],
        2829 => [
            'name' => 'Guadeloupe - Grande-Terre and surrounding islands - onshore',
        ],
        2831 => [
            'name' => 'Canada - Atlantic offshore',
        ],
        2832 => [
            'name' => 'Canada - British Columbia',
        ],
        2833 => [
            'name' => 'Sweden - 12 00',
        ],
        2834 => [
            'name' => 'Sweden - 13 30',
        ],
        2835 => [
            'name' => 'Sweden - 15 00',
        ],
        2836 => [
            'name' => 'Sweden - 16 30',
        ],
        2837 => [
            'name' => 'Sweden - 18 00',
        ],
        2838 => [
            'name' => 'Sweden - 14 15',
        ],
        2839 => [
            'name' => 'Sweden - 15 45',
        ],
        2840 => [
            'name' => 'Sweden - 17 15',
        ],
        2841 => [
            'name' => 'Sweden - 18 45',
        ],
        2842 => [
            'name' => 'Sweden - 20 15',
        ],
        2843 => [
            'name' => 'Sweden - 21 45',
        ],
        2844 => [
            'name' => 'Sweden - 23 15',
        ],
        2845 => [
            'name' => 'Sweden - 7.5 gon W',
        ],
        2846 => [
            'name' => 'Sweden - 5 gon W',
        ],
        2847 => [
            'name' => 'Sweden - 2.5 gon W',
        ],
        2848 => [
            'name' => 'Sweden - 0 gon',
        ],
        2849 => [
            'name' => 'Sweden - 2.5 gon E',
        ],
        2850 => [
            'name' => 'Sweden - 5 gon E',
        ],
        2851 => [
            'name' => 'Iceland - mainland west of 24°W',
        ],
        2852 => [
            'name' => 'Iceland - mainland 24°W to 18°W',
        ],
        2853 => [
            'name' => 'Iceland - mainland east of 18°W',
        ],
        2860 => [
            'name' => 'Germany - west of 6°E',
        ],
        2861 => [
            'name' => 'Germany - 6°E to 12°E',
        ],
        2862 => [
            'name' => 'Germany - east of 12°E',
        ],
        2869 => [
            'name' => 'Jan Mayen - onshore',
        ],
        2870 => [
            'name' => 'Portugal - Madeira and Porto Santo islands onshore',
        ],
        2871 => [
            'name' => 'Portugal - Azores E - S Miguel onshore',
        ],
        2872 => [
            'name' => 'Portugal - Azores C - Terceira onshore',
        ],
        2873 => [
            'name' => 'Portugal - Azores C - Faial onshore',
        ],
        2874 => [
            'name' => 'Portugal - Azores C - Pico onshore',
        ],
        2875 => [
            'name' => 'Portugal - Azores C - S Jorge onshore',
        ],
        2876 => [
            'name' => 'Asia - Middle East - Iraq-Kuwait boundary',
        ],
        2879 => [
            'name' => 'Germany - offshore North Sea',
        ],
        2880 => [
            'name' => 'Antarctica - Australian sector north of 80°S',
        ],
        2881 => [
            'name' => 'Europe - LCC & LAEA',
        ],
        2889 => [
            'name' => 'New Zealand - Chatham Islands group',
        ],
        2890 => [
            'name' => 'Guadeloupe - St Martin - onshore',
        ],
        2891 => [
            'name' => 'Guadeloupe - St Barthelemy - onshore',
        ],
        2892 => [
            'name' => 'Guadeloupe - Grande-Terre and Basse-Terre - onshore',
        ],
        2893 => [
            'name' => 'Guadeloupe - La Desirade - onshore',
        ],
        2894 => [
            'name' => 'Guadeloupe - Marie-Galante - onshore',
        ],
        2895 => [
            'name' => 'Guadeloupe - Les Saintes - onshore',
        ],
        2898 => [
            'name' => 'Germany - Berlin',
        ],
        2947 => [
            'name' => 'Australia - Tasmania mainland onshore',
        ],
        2948 => [
            'name' => 'USA - CONUS east of 89°W - onshore',
        ],
        2949 => [
            'name' => 'USA - CONUS 89°W-107°W - onshore',
        ],
        2950 => [
            'name' => 'USA - CONUS west of 107°W - onshore',
        ],
        2951 => [
            'name' => 'Japan - 120°E to 126°E onshore',
        ],
        2952 => [
            'name' => 'Japan - 126°E to 132°E onshore',
        ],
        2953 => [
            'name' => 'Japan - 132°E to 138°E onshore',
        ],
        2954 => [
            'name' => 'Japan - 138°E to 144°E onshore',
        ],
        2955 => [
            'name' => 'Japan - 144°E to 150°E onshore',
        ],
        2956 => [
            'name' => 'Kuwait - north of 29.25°N',
        ],
        2957 => [
            'name' => 'Kuwait - south of 29.25°N',
        ],
        2958 => [
            'name' => 'USA - Maine - CS2000 - W',
        ],
        2959 => [
            'name' => 'USA - Maine - CS2000 - C',
        ],
        2960 => [
            'name' => 'USA - Maine - CS2000 - E',
        ],
        2961 => [
            'name' => 'Ireland - Corrib and Errigal',
        ],
        2963 => [
            'name' => 'Brazil - Campos',
        ],
        2964 => [
            'name' => 'Brazil - Espirito Santo and Mucuri',
        ],
        2967 => [
            'name' => 'Mauritania - north coast',
        ],
        2968 => [
            'name' => 'Mauritania - central coast',
        ],
        2969 => [
            'name' => 'Mauritania - east of 6°W',
        ],
        2970 => [
            'name' => 'Mauritania - 12°W to 6°W',
        ],
        2971 => [
            'name' => 'Mauritania - west of 12°W onshore',
        ],
        2972 => [
            'name' => 'Mauritania - Nouakchutt',
        ],
        2981 => [
            'name' => 'Nigeria - offshore',
        ],
        2982 => [
            'name' => 'Pakistan - Karachi',
        ],
        2983 => [
            'name' => 'Pakistan - East Sind',
        ],
        2984 => [
            'name' => 'Pakistan - Badin and Mehran',
        ],
        2985 => [
            'name' => 'Pakistan - offshore Indus',
        ],
        2986 => [
            'name' => 'Australia - SA',
        ],
        2987 => [
            'name' => 'Libya - Amal',
        ],
        2988 => [
            'name' => 'Channel Islands - Jersey, Les Ecrehos and Les Minquiers',
        ],
        2989 => [
            'name' => 'Channel Islands - Guernsey, Alderney, Sark',
        ],
        2990 => [
            'name' => 'Australia - Brisbane',
        ],
        2991 => [
            'name' => 'Antarctica - 60°S to 64°S, 72°W to 60°W (SP19-20)',
        ],
        2992 => [
            'name' => 'Antarctica - 60°S to 64°S, 60°W to 48°W (SP21-22)',
        ],
        2993 => [
            'name' => 'Antarctica - 60°S to 64°S, 48°W to 36°W (SP23-24)',
        ],
        2994 => [
            'name' => 'Antarctica - 64°S to 68°S, 180°W to 168°W (SQ01-02)',
        ],
        2995 => [
            'name' => 'Antarctica - 64°S to 68°S, 72°W to 60°W (SQ19-20)',
        ],
        2996 => [
            'name' => 'Antarctica - 64°S to 68°S, 60°W to 48°W (SQ21-22)',
        ],
        2997 => [
            'name' => 'Antarctica - 64°S to 68°S, 36°E to 48°E (SQ37-38)',
        ],
        2998 => [
            'name' => 'Antarctica - 64°S to 68°S, 48°E to 60°E (SQ39-40)',
        ],
        2999 => [
            'name' => 'Antarctica - 64°S to 68°S, 60°E to 72°E (SQ41-42)',
        ],
        3000 => [
            'name' => 'Antarctica - 64°S to 68°S, 72°E to 84°E (SQ43-44)',
        ],
        3001 => [
            'name' => 'Antarctica - 64°S to 68°S, 84°E to 96°E (SQ45-46)',
        ],
        3002 => [
            'name' => 'Antarctica - 64°S to 68°S, 96°E to 108°E (SQ47-48)',
        ],
        3003 => [
            'name' => 'Antarctica - 64°S to 68°S, 108°E to 120°E (SQ49-50)',
        ],
        3004 => [
            'name' => 'Antarctica - 64°S to 68°S, 120°E to 132°E (SQ51-52)',
        ],
        3005 => [
            'name' => 'Antarctica - 64°S to 68°S, 132°E to 144°E (SQ53-54)',
        ],
        3006 => [
            'name' => 'Antarctica - 64°S to 68°S, 144°E to 156°E (SQ55-56)',
        ],
        3007 => [
            'name' => 'Antarctica - 64°S to 68°S, 156°E to 168°E (SQ57-58)',
        ],
        3008 => [
            'name' => 'Antarctica - 68°S to 72°S, 108°W to 96°W (SR13-14)',
        ],
        3009 => [
            'name' => 'Antarctica - 68°S to 72°S, 96°W to 84°W (SR15-16)',
        ],
        3010 => [
            'name' => 'Antarctica - 68°S to 72°S, 84°W to 72°W (SR17-18)',
        ],
        3011 => [
            'name' => 'Antarctica - 68°S to 72°S, 72°W to 60°W (SR19-20)',
        ],
        3012 => [
            'name' => 'Antarctica - 68°S to 72°S, 24°W to 12°W (SR27-28)',
        ],
        3013 => [
            'name' => 'Antarctica - 68°S to 72°S, 12°W to 0°W (SR29-30)',
        ],
        3014 => [
            'name' => 'Antarctica - 68°S to 72°S, 0°E to 12°E (SR31-32)',
        ],
        3015 => [
            'name' => 'Antarctica - 68°S to 72°S, 12°E to 24°E (SR33-34)',
        ],
        3016 => [
            'name' => 'Antarctica - 68°S to 72°S, 24°E to 36°E (SR35-36)',
        ],
        3017 => [
            'name' => 'Antarctica - 68°S to 72°S, 36°E to 48°E (SR37-38)',
        ],
        3018 => [
            'name' => 'Antarctica - 68°S to 72°S, 48°E to 60°E (SR39-40)',
        ],
        3019 => [
            'name' => 'Antarctica - 68°S to 72°S, 60°E to 72°E (SR41-42)',
        ],
        3020 => [
            'name' => 'Antarctica - 68°S to 72°S, 72°E to 84°E (SR43-44)',
        ],
        3021 => [
            'name' => 'Antarctica - 68°S to 72°S, 84°E to 96°E (SR45-46)',
        ],
        3022 => [
            'name' => 'Antarctica - 68°S to 72°S, 96°E to 108°E (SR47-48)',
        ],
        3023 => [
            'name' => 'Antarctica - 68°S to 72°S, 108°E to 120°E (SR49-50)',
        ],
        3024 => [
            'name' => 'Antarctica - 68°S to 72°S, 120°E to 132°E (SR51-52)',
        ],
        3025 => [
            'name' => 'Antarctica - 68°S to 72°S, 132°E to 144°E (SR53-54)',
        ],
        3026 => [
            'name' => 'Antarctica - 68°S to 72°S, 144°E to 156°E (SR55-56)',
        ],
        3027 => [
            'name' => 'Antarctica - 68°S to 72°S, 156°E to 168°E (SR57-58)',
        ],
        3028 => [
            'name' => 'Antarctica - 68°S to 72°S, 168°E to 180°E (SR59-60)',
        ],
        3029 => [
            'name' => 'Antarctica - 72°S to 76°S, 162°W to 144°W (SS04-06)',
        ],
        3030 => [
            'name' => 'Antarctica - 72°S to 76°S, 144°W to 126°W (SS07-09)',
        ],
        3031 => [
            'name' => 'Antarctica - 72°S to 76°S, 126°W to 108°W (SS10-12)',
        ],
        3032 => [
            'name' => 'Antarctica - 72°S to 76°S, 108°W to 90°W (SS13-15)',
        ],
        3033 => [
            'name' => 'Antarctica - 72°S to 76°S, 90°W to 72°W (SS16-18)',
        ],
        3034 => [
            'name' => 'Antarctica - 72°S to 76°S, 72°W to 54°W (SS19-21)',
        ],
        3035 => [
            'name' => 'Antarctica - 72°S to 76°S, 36°W to 18°W (SS25-27)',
        ],
        3036 => [
            'name' => 'Antarctica - 72°S to 76°S, 18°W to 0°W (SS28-30)',
        ],
        3037 => [
            'name' => 'Antarctica - 72°S to 76°S, 0°E to 18°E (SS31-33)',
        ],
        3038 => [
            'name' => 'Antarctica - 72°S to 76°S, 18°E to 36°E (SS34-36)',
        ],
        3039 => [
            'name' => 'Antarctica - 72°S to 76°S, 36°E to 54°E (SS37-39)',
        ],
        3040 => [
            'name' => 'Antarctica - 72°S to 76°S, 54°E to 72°E (SS40-42)',
        ],
        3041 => [
            'name' => 'Antarctica - 72°S to 76°S, 72°E to 90°E (SS43-45)',
        ],
        3042 => [
            'name' => 'Antarctica - 72°S to 76°S, 90°E to 108°E (SS46-48)',
        ],
        3043 => [
            'name' => 'Antarctica - 72°S to 76°S, 108°E to 126°E (SS49-51)',
        ],
        3044 => [
            'name' => 'Antarctica - 72°S to 76°S, 126°E to 144°E (SS52-54)',
        ],
        3045 => [
            'name' => 'Antarctica - 72°S to 76°S, 144°E to 162°E (SS55-57)',
        ],
        3046 => [
            'name' => 'Antarctica - 72°S to 76°S, 162°E to 180°E (SS58-60)',
        ],
        3047 => [
            'name' => 'Antarctica - 76°S to 80°S, 180°W to 156°W (ST01-04)',
        ],
        3048 => [
            'name' => 'Antarctica - 76°S to 80°S, 156°W to 132°W (ST05-08)',
        ],
        3049 => [
            'name' => 'Antarctica - 76°S to 80°S, 132°W to 108°W (ST09-12)',
        ],
        3050 => [
            'name' => 'Antarctica - 76°S to 80°S, 108°W to 84°W (ST13-16)',
        ],
        3051 => [
            'name' => 'Antarctica - 76°S to 80°S, 84°W to 60°W (ST17-20)',
        ],
        3052 => [
            'name' => 'Antarctica - 76°S to 80°S, 60°W to 36°W (ST21-24)',
        ],
        3053 => [
            'name' => 'Antarctica - 76°S to 80°S, 36°W to 12°W (ST25-28)',
        ],
        3054 => [
            'name' => 'Antarctica - 76°S to 80°S, 12°W to 12°E (ST29-32)',
        ],
        3055 => [
            'name' => 'Antarctica - 76°S to 80°S, 12°E to 36°E (ST33-36)',
        ],
        3056 => [
            'name' => 'Antarctica - 76°S to 80°S, 36°E to 60°E (ST37-40)',
        ],
        3057 => [
            'name' => 'Antarctica - 76°S to 80°S, 60°E to 84°E (ST41-44)',
        ],
        3058 => [
            'name' => 'Antarctica - 76°S to 80°S, 84°E to 108°E (ST45-48)',
        ],
        3059 => [
            'name' => 'Antarctica - 76°S to 80°S, 108°E to 132°E (ST49-52)',
        ],
        3060 => [
            'name' => 'Antarctica - 76°S to 80°S, 132°E to 156°E (ST53-56)',
        ],
        3061 => [
            'name' => 'Antarctica - 76°S to 80°S, 156°E to 180°E (ST57-60)',
        ],
        3062 => [
            'name' => 'Antarctica - 80°S to 84°S, 180°W to 150°W (SU01-05)',
        ],
        3063 => [
            'name' => 'Antarctica - 80°S to 84°S, 150°W to 120°W (SU06-10)',
        ],
        3064 => [
            'name' => 'Antarctica - 80°S to 84°S, 120°W to 90°W (SU11-15)',
        ],
        3065 => [
            'name' => 'Antarctica - 80°S to 84°S, 90°W to 60°W (SU16-20)',
        ],
        3066 => [
            'name' => 'Antarctica - 80°S to 84°S, 60°W to 30°W (SU21-25)',
        ],
        3067 => [
            'name' => 'Antarctica - 80°S to 84°S, 30°W to 0°W (SU26-30)',
        ],
        3068 => [
            'name' => 'Antarctica - 80°S to 84°S, 0°E to 30°E (SU31-35)',
        ],
        3069 => [
            'name' => 'Antarctica - 80°S to 84°S, 30°E to 60°E (SU36-40)',
        ],
        3070 => [
            'name' => 'Antarctica - 80°S to 84°S, 60°E to 90°E (SU41-45)',
        ],
        3071 => [
            'name' => 'Antarctica - 80°S to 84°S, 90°E to 120°E (SU46-50)',
        ],
        3072 => [
            'name' => 'Antarctica - 80°S to 84°S, 120°E to 150°E (SU51-55)',
        ],
        3073 => [
            'name' => 'Antarctica - 80°S to 84°S, 150°E to 180° (SU56-60)',
        ],
        3074 => [
            'name' => 'Antarctica - 84°S to 88°S, 180°W to 120°W (SV01-10)',
        ],
        3075 => [
            'name' => 'Antarctica - 84°S to 88°S, 120°W to 60°W (SV11-20)',
        ],
        3076 => [
            'name' => 'Antarctica - 84°S to 88°S, 60°W to 0°W (SV21-30)',
        ],
        3077 => [
            'name' => 'Antarctica - 84°S to 88°S, 0°E to 60°E (SV31-40)',
        ],
        3078 => [
            'name' => 'Antarctica - 84°S to 88°S, 60°E to 120°E (SV41-50)',
        ],
        3079 => [
            'name' => 'Antarctica - 84°S to 88°S, 120°E to 180°E (SV51-60)',
        ],
        3080 => [
            'name' => 'Antarctica - 88°S to 90°S, 180°W to 180°E (SW01-60)',
        ],
        3081 => [
            'name' => 'Antarctica - Transantarctic mountains north of 80°S',
        ],
        3082 => [
            'name' => 'Colombia region 1',
        ],
        3083 => [
            'name' => 'Colombia region 2',
        ],
        3084 => [
            'name' => 'Colombia region 3',
        ],
        3085 => [
            'name' => 'Colombia region 4',
        ],
        3086 => [
            'name' => 'Colombia region 5',
        ],
        3087 => [
            'name' => 'Colombia region 6',
        ],
        3088 => [
            'name' => 'Colombia region 7',
        ],
        3089 => [
            'name' => 'Colombia region 8',
        ],
        3090 => [
            'name' => 'Colombia - 78°35\'W to 75°35\'W',
        ],
        3091 => [
            'name' => 'Colombia - west of 78°35\'W',
        ],
        3092 => [
            'name' => 'Finland - west of 19.5°E onshore',
        ],
        3093 => [
            'name' => 'Finland - 19.5°E to 20.5°E onshore',
        ],
        3094 => [
            'name' => 'Finland - 20.5°E to 21.5°E onshore',
        ],
        3095 => [
            'name' => 'Finland - 21.5°E to 22.5°E onshore',
        ],
        3096 => [
            'name' => 'Finland - 22.5°E to 23.5°E onshore',
        ],
        3097 => [
            'name' => 'Finland - 23.5°E to 24.5°E onshore',
        ],
        3098 => [
            'name' => 'Finland - 24.5°E to 25.5°E onshore',
        ],
        3099 => [
            'name' => 'Finland - 25.5°E to 26.5°E onshore',
        ],
        3100 => [
            'name' => 'Finland - 26.5°E to 27.5°E onshore',
        ],
        3101 => [
            'name' => 'Finland - 27.5°E to 28.5°E onshore',
        ],
        3102 => [
            'name' => 'Finland - 28.5°E to 29.5°E',
        ],
        3103 => [
            'name' => 'Finland - 29.5°E to 30.5°E',
        ],
        3104 => [
            'name' => 'Finland - east of 30.5°E',
        ],
        3105 => [
            'name' => 'French Guiana - coastal area',
        ],
        3106 => [
            'name' => 'Saudi Arabia - east of 54°E',
        ],
        3107 => [
            'name' => 'Saudi Arabia - onshore west of 36°E',
        ],
        3108 => [
            'name' => 'Micronesia - Yap Islands',
        ],
        3109 => [
            'name' => 'American Samoa - 2 main island groups',
        ],
        3110 => [
            'name' => 'American Samoa - 2 main island groups and Rose Island',
        ],
        3112 => [
            'name' => 'South America - 84°W to 78°W, N hemisphere and PSAD56 by country',
        ],
        3114 => [
            'name' => 'North America - 96°W to 90°W and NAD83 by country',
        ],
        3115 => [
            'name' => 'North America - 90°W to 84°W and NAD83 by country',
        ],
        3116 => [
            'name' => 'North America - 84°W to 78°W and NAD83 by country',
        ],
        3117 => [
            'name' => 'North America - 78°W to 72°W and NAD83 by country',
        ],
        3118 => [
            'name' => 'Grenada - main island - onshore',
        ],
        3120 => [
            'name' => 'French Polynesia - west of 150°W',
        ],
        3121 => [
            'name' => 'French Polynesia - 150°W to 144°W',
        ],
        3122 => [
            'name' => 'French Polynesia - 144°W to 138°W',
        ],
        3123 => [
            'name' => 'French Polynesia - east of 138°W',
        ],
        3124 => [
            'name' => 'French Polynesia - Society Islands - Tahiti',
        ],
        3125 => [
            'name' => 'French Polynesia - Society Islands - Moorea',
        ],
        3126 => [
            'name' => 'French Polynesia - Society Islands - Maupiti',
        ],
        3127 => [
            'name' => 'French Polynesia - Marquesas Islands - Ua Huka',
        ],
        3128 => [
            'name' => 'French Polynesia - Marquesas Islands - Ua Pou',
        ],
        3129 => [
            'name' => 'French Polynesia - Marquesas Islands - Nuku Hiva, Ua Huka and Ua Pou',
        ],
        3130 => [
            'name' => 'French Polynesia - Marquesas Islands - Hiva Oa and Tahuata',
        ],
        3131 => [
            'name' => 'French Polynesia - Marquesas Islands - Hiva Oa',
        ],
        3132 => [
            'name' => 'French Polynesia - Marquesas Islands - Tahuata',
        ],
        3133 => [
            'name' => 'French Polynesia - Marquesas Islands - Fatu Hiva',
        ],
        3134 => [
            'name' => 'French Polynesia - Society Islands - main islands',
        ],
        3135 => [
            'name' => 'French Polynesia - Society Islands - Huahine',
        ],
        3136 => [
            'name' => 'French Polynesia - Society Islands - Raiatea',
        ],
        3137 => [
            'name' => 'French Polynesia - Society Islands - Bora Bora',
        ],
        3138 => [
            'name' => 'French Polynesia - Society Islands - Tahaa',
        ],
        3139 => [
            'name' => 'Australia - New South Wales',
        ],
        3140 => [
            'name' => 'Iran - South Pars block 11',
        ],
        3141 => [
            'name' => 'Iran - Tombak LNG plant',
        ],
        3142 => [
            'name' => 'Libya - Sirte NC192',
        ],
        3143 => [
            'name' => 'Trinidad and Tobago - Trinidad - onshore',
        ],
        3144 => [
            'name' => 'French Guiana - east of 54°W',
        ],
        3145 => [
            'name' => 'French Guiana - west of 54°W',
        ],
        3146 => [
            'name' => 'French Guiana - onshore',
        ],
        3147 => [
            'name' => 'Congo DR (Zaire) - Katanga',
        ],
        3148 => [
            'name' => 'Congo DR (Zaire) - Kasai - SE',
        ],
        3149 => [
            'name' => 'Congo DR (Zaire) - 6th parallel south',
        ],
        3150 => [
            'name' => 'Congo DR (Zaire) - 11°E to 13°E onshore',
        ],
        3151 => [
            'name' => 'Congo DR (Zaire) - 13°E to 15°E',
        ],
        3152 => [
            'name' => 'Congo DR (Zaire) - 15°E to 17°E',
        ],
        3153 => [
            'name' => 'Congo DR (Zaire) - 17°E to 19°E',
        ],
        3154 => [
            'name' => 'Congo DR (Zaire) - 19°E to 21°E',
        ],
        3155 => [
            'name' => 'Congo DR (Zaire) - 21°E to 23°E',
        ],
        3156 => [
            'name' => 'Congo DR (Zaire) - 23°E to 25°E',
        ],
        3157 => [
            'name' => 'Congo DR (Zaire) - 25°E to 27°E',
        ],
        3158 => [
            'name' => 'Congo DR (Zaire) - 27°E to 29°E',
        ],
        3159 => [
            'name' => 'Congo DR (Zaire) - east of 29°E',
        ],
        3160 => [
            'name' => 'Congo DR (Zaire) - 6th parallel south 15°E to 17°E',
        ],
        3161 => [
            'name' => 'Congo DR (Zaire) - 6th parallel south 17°E to 19°E',
        ],
        3162 => [
            'name' => 'Congo DR (Zaire) - 6th parallel south 19°E to 21°E',
        ],
        3163 => [
            'name' => 'Congo DR (Zaire) - 6th parallel south 21°E to 23°E',
        ],
        3164 => [
            'name' => 'Congo DR (Zaire) - 6th parallel south 23°E to 25°E',
        ],
        3165 => [
            'name' => 'Congo DR (Zaire) - 6th parallel south 25°E to 27°E',
        ],
        3166 => [
            'name' => 'Congo DR (Zaire) - 6th parallel south 27°E to 29°E',
        ],
        3167 => [
            'name' => 'Congo DR (Zaire) - 6th parallel south 29°E to 31°E',
        ],
        3171 => [
            'name' => 'Congo DR (Zaire) - Bas Congo',
        ],
        3172 => [
            'name' => 'Pacific Ocean',
        ],
        3173 => [
            'name' => 'Europe - FSU - CS63 zone C0',
        ],
        3174 => [
            'name' => 'Europe - FSU - CS63 zone C1',
        ],
        3175 => [
            'name' => 'Europe - FSU - CS63 zone C2',
        ],
        3176 => [
            'name' => 'Brazil - 54°W to 48°W and south of 15°S',
        ],
        3177 => [
            'name' => 'Brazil - 48°W to 42°W and south of 15°S',
        ],
        3178 => [
            'name' => 'Brazil - east of 36°W onshore',
        ],
        3179 => [
            'name' => 'Africa - Angola (Cabinda) and DR Congo (Zaire) - coastal',
        ],
        3180 => [
            'name' => 'Africa - Angola (Cabinda) and DR Congo (Zaire) - offshore',
        ],
        3181 => [
            'name' => 'USA - Hawaii - Tern Island and Sorel Atoll',
        ],
        3182 => [
            'name' => 'St Helena - Ascension Island',
        ],
        3183 => [
            'name' => 'St Helena - St Helena Island',
        ],
        3184 => [
            'name' => 'St Helena - Tristan da Cunha',
        ],
        3185 => [
            'name' => 'Cayman Islands - Grand Cayman',
        ],
        3186 => [
            'name' => 'Cayman Islands - Little Cayman and Cayman Brac',
        ],
        3188 => [
            'name' => 'Chile - Easter Island onshore',
        ],
        3189 => [
            'name' => 'British Indian Ocean Territory - Diego Garcia',
        ],
        3190 => [
            'name' => 'Wake - onshore',
        ],
        3191 => [
            'name' => 'Pacific - Marshall Islands, Wake - onshore',
        ],
        3192 => [
            'name' => 'Micronesia - Kosrae (Kusaie)',
        ],
        3193 => [
            'name' => 'Vanuatu - southern islands',
        ],
        3194 => [
            'name' => 'Vanuatu - northern islands',
        ],
        3195 => [
            'name' => 'Fiji - Viti Levu',
        ],
        3196 => [
            'name' => 'Kiribati - Phoenix Islands',
        ],
        3197 => [
            'name' => 'Solomon Islands - Guadalcanal Island',
        ],
        3198 => [
            'name' => 'Solomon Islands - New Georgia - Ghizo (Gizo)',
        ],
        3199 => [
            'name' => 'Spain - Canary Islands',
        ],
        3200 => [
            'name' => 'Japan - Iwo Jima',
        ],
        3201 => [
            'name' => 'Johnston Island',
        ],
        3202 => [
            'name' => 'Midway Islands - Sand and Eastern Islands',
        ],
        3204 => [
            'name' => 'Antarctica - Deception Island',
        ],
        3205 => [
            'name' => 'Antarctica - Camp McMurdo area',
        ],
        3206 => [
            'name' => 'North America - Bahamas and USA - Florida - onshore',
        ],
        3207 => [
            'name' => 'Cayman Islands - Cayman Brac',
        ],
        3208 => [
            'name' => 'Pitcairn - Pitcairn Island',
        ],
        3209 => [
            'name' => 'Mauritius - mainland',
        ],
        3212 => [
            'name' => 'Albania - onshore',
        ],
        3213 => [
            'name' => 'Algeria - onshore',
        ],
        3214 => [
            'name' => 'Anguilla - onshore',
        ],
        3215 => [
            'name' => 'Argentina - mainland onshore',
        ],
        3217 => [
            'name' => 'Bangladesh - onshore',
        ],
        3218 => [
            'name' => 'Barbados - onshore',
        ],
        3219 => [
            'name' => 'Belize - onshore',
        ],
        3221 => [
            'name' => 'Bermuda - onshore',
        ],
        3224 => [
            'name' => 'Bulgaria - onshore',
        ],
        3226 => [
            'name' => 'Cameroon - onshore',
        ],
        3228 => [
            'name' => 'China - onshore',
        ],
        3229 => [
            'name' => 'Colombia - mainland',
        ],
        3232 => [
            'name' => 'Costa Rica - onshore',
        ],
        3234 => [
            'name' => 'Croatia - onshore',
        ],
        3235 => [
            'name' => 'Cuba - onshore',
        ],
        3236 => [
            'name' => 'Cyprus - onshore',
        ],
        3237 => [
            'name' => 'Denmark - onshore',
        ],
        3238 => [
            'name' => 'Djibouti - onshore',
        ],
        3239 => [
            'name' => 'Dominica - onshore',
        ],
        3241 => [
            'name' => 'Ecuador - mainland onshore',
        ],
        3242 => [
            'name' => 'Egypt - onshore',
        ],
        3243 => [
            'name' => 'El Salvador - onshore',
        ],
        3246 => [
            'name' => 'Estonia - onshore',
        ],
        3247 => [
            'name' => 'Falkland Islands - onshore',
        ],
        3248 => [
            'name' => 'Faroe Islands - onshore',
        ],
        3249 => [
            'name' => 'Gabon - onshore',
        ],
        3250 => [
            'name' => 'Gambia - onshore',
        ],
        3251 => [
            'name' => 'Georgia - onshore',
        ],
        3252 => [
            'name' => 'Ghana - onshore',
        ],
        3254 => [
            'name' => 'Greece - onshore',
        ],
        3255 => [
            'name' => 'Guam - onshore',
        ],
        3257 => [
            'name' => 'Guinea - onshore',
        ],
        3258 => [
            'name' => 'Guinea-Bissau - onshore',
        ],
        3259 => [
            'name' => 'Guyana - onshore',
        ],
        3262 => [
            'name' => 'Iceland - mainland',
        ],
        3263 => [
            'name' => 'Japan - onshore mainland',
        ],
        3264 => [
            'name' => 'Kenya - onshore',
        ],
        3266 => [
            'name' => 'Korea, Republic of (South Korea) - onshore',
        ],
        3267 => [
            'name' => 'Kuwait - onshore',
        ],
        3268 => [
            'name' => 'Latvia - onshore',
        ],
        3269 => [
            'name' => 'Lebanon - onshore',
        ],
        3270 => [
            'name' => 'Liberia - onshore',
        ],
        3271 => [
            'name' => 'Libya - onshore',
        ],
        3272 => [
            'name' => 'Lithuania - onshore',
        ],
        3273 => [
            'name' => 'Madagascar - onshore',
        ],
        3274 => [
            'name' => 'Maldives - onshore',
        ],
        3275 => [
            'name' => 'Malta - onshore',
        ],
        3276 => [
            'name' => 'Martinique - onshore',
        ],
        3277 => [
            'name' => 'Mauritania - onshore',
        ],
        3278 => [
            'name' => 'Mexico - onshore',
        ],
        3279 => [
            'name' => 'Montserrat - onshore',
        ],
        3280 => [
            'name' => 'Morocco - onshore',
        ],
        3281 => [
            'name' => 'Mozambique - onshore',
        ],
        3285 => [
            'name' => 'New Zealand - onshore and nearshore',
        ],
        3287 => [
            'name' => 'Nigeria - onshore',
        ],
        3288 => [
            'name' => 'Oman - onshore',
        ],
        3290 => [
            'name' => 'Panama - onshore',
        ],
        3292 => [
            'name' => 'Peru - onshore',
        ],
        3293 => [
            'name' => 'Poland - onshore',
        ],
        3294 => [
            'name' => 'Puerto Rico - onshore',
        ],
        3295 => [
            'name' => 'Romania - onshore',
        ],
        3296 => [
            'name' => 'Russia - onshore',
        ],
        3297 => [
            'name' => 'St Kitts and Nevis - onshore',
        ],
        3298 => [
            'name' => 'St Lucia - onshore',
        ],
        3299 => [
            'name' => 'St Pierre and Miquelon - onshore',
        ],
        3300 => [
            'name' => 'St Vincent and the Grenadines - onshore',
        ],
        3303 => [
            'name' => 'Saudi Arabia - onshore',
        ],
        3304 => [
            'name' => 'Senegal - onshore',
        ],
        3306 => [
            'name' => 'Sierra Leone - onshore',
        ],
        3307 => [
            'name' => 'Slovenia - onshore',
        ],
        3308 => [
            'name' => 'Somalia - onshore',
        ],
        3309 => [
            'name' => 'South Africa - onshore',
        ],
        3310 => [
            'name' => 'Sri Lanka - onshore',
        ],
        3311 => [
            'name' => 'Africa - South Sudan and Sudan onshore',
        ],
        3312 => [
            'name' => 'Suriname - onshore',
        ],
        3313 => [
            'name' => 'Sweden - onshore',
        ],
        3314 => [
            'name' => 'Syria - onshore',
        ],
        3315 => [
            'name' => 'Taiwan - onshore - mainland and Penghu',
        ],
        3316 => [
            'name' => 'Tanzania - onshore',
        ],
        3317 => [
            'name' => 'Thailand - onshore',
        ],
        3322 => [
            'name' => 'Turkey - onshore',
        ],
        3326 => [
            'name' => 'Uruguay - onshore',
        ],
        3327 => [
            'name' => 'Venezuela - onshore',
        ],
        3328 => [
            'name' => 'Vietnam - onshore',
        ],
        3329 => [
            'name' => 'Virgin Islands, British - onshore',
        ],
        3330 => [
            'name' => 'Virgin Islands, US - onshore',
        ],
        3333 => [
            'name' => 'Finland - onshore',
        ],
        3334 => [
            'name' => 'China - Hong Kong - onshore',
        ],
        3335 => [
            'name' => 'China - Hong Kong - offshore',
        ],
        3336 => [
            'name' => 'Iran - onshore',
        ],
        3337 => [
            'name' => 'Reunion - onshore',
        ],
        3338 => [
            'name' => 'New Zealand - Stewart Island',
        ],
        3339 => [
            'name' => 'Germany - onshore',
        ],
        3340 => [
            'name' => 'Mayotte - onshore',
        ],
        3341 => [
            'name' => 'India - mainland',
        ],
        3342 => [
            'name' => 'Jamaica - onshore',
        ],
        3343 => [
            'name' => 'Italy - including San Marino and Vatican',
        ],
        3344 => [
            'name' => 'New Zealand - South and Stewart Islands',
        ],
        3355 => [
            'name' => 'Brazil - west of 54°W and south of 18°S',
        ],
        3356 => [
            'name' => 'South America - Brazil - south of 18°S and west of 54°W + DF; N Paraguay',
        ],
        3357 => [
            'name' => 'USA - GoM OCS',
        ],
        3361 => [
            'name' => 'Mexico - offshore GoM - Tampico area',
        ],
        3362 => [
            'name' => 'Greenland - west coast',
        ],
        3363 => [
            'name' => 'Greenland - west coast - 63°N to 66°N',
        ],
        3364 => [
            'name' => 'Greenland - west coast - 66°N to 69°N',
        ],
        3365 => [
            'name' => 'Greenland - west coast - 69°N to 72°N',
        ],
        3366 => [
            'name' => 'Greenland - west coast - 72°N to 75°N',
        ],
        3367 => [
            'name' => 'Greenland - west coast - 75°N to 78°N',
        ],
        3368 => [
            'name' => 'Greenland - west coast - 78°N to 79°N',
        ],
        3369 => [
            'name' => 'Greenland - east coast - 68°N to 69°N',
        ],
        3370 => [
            'name' => 'Greenland - east coast - 69°N to 72°N',
        ],
        3372 => [
            'name' => 'USA - west of 174°E - AK, OCS',
        ],
        3373 => [
            'name' => 'USA - 174°E to 180°E - AK, OCS',
        ],
        3374 => [
            'name' => 'USA - 180°W to 174°W - AK, OCS',
        ],
        3375 => [
            'name' => 'USA - 174°W to 168°W - AK, OCS',
        ],
        3376 => [
            'name' => 'Malaysia - West Malaysia - Johor',
        ],
        3377 => [
            'name' => 'Malaysia - West Malaysia - Sembilan and Melaka',
        ],
        3378 => [
            'name' => 'Malaysia - West Malaysia - Pahang',
        ],
        3379 => [
            'name' => 'Malaysia - West Malaysia - Selangor',
        ],
        3380 => [
            'name' => 'Malaysia - West Malaysia - Terengganu',
        ],
        3381 => [
            'name' => 'Malaysia - West Malaysia - Pulau Pinang',
        ],
        3382 => [
            'name' => 'Malaysia - West Malaysia - Kedah and Perlis',
        ],
        3383 => [
            'name' => 'Malaysia - West Malaysia - Perak',
        ],
        3384 => [
            'name' => 'Malaysia - West Malaysia - Kelantan',
        ],
        3385 => [
            'name' => 'Finland - east of 31.5°E',
        ],
        3387 => [
            'name' => 'Iraq - west of 42°E',
        ],
        3388 => [
            'name' => 'Iraq - 42°E to 48°E',
        ],
        3389 => [
            'name' => 'Iraq - east of 48°E onshore',
        ],
        3390 => [
            'name' => 'Asia - Middle East -SE Iraq and SW Iran',
        ],
        3391 => [
            'name' => 'World - between 80°S and 84°N',
        ],
        3392 => [
            'name' => 'Germany - Thuringen - west of 10.5°E',
        ],
        3393 => [
            'name' => 'Germany - Thuringen - east of 10.5°E',
        ],
        3394 => [
            'name' => 'Germany - Saxony - east of 13.5°E',
        ],
        3395 => [
            'name' => 'Germany - Saxony - west of 13.5°E',
        ],
        3398 => [
            'name' => 'Fiji - main islands',
        ],
        3399 => [
            'name' => 'Fiji - main islands - west of 180°',
        ],
        3400 => [
            'name' => 'Fiji - main islands - east of 180°',
        ],
        3401 => [
            'name' => 'Fiji - Vanua Levu and Taveuni',
        ],
        3404 => [
            'name' => 'North America - 120°W to 114°W and NAD83 by country',
        ],
        3405 => [
            'name' => 'North America - 114°W to 108°W and NAD83 by country',
        ],
        3406 => [
            'name' => 'North America - 108°W to 102°W and NAD83 by country',
        ],
        3407 => [
            'name' => 'North America - 102°W to 96°W and NAD83 by country',
        ],
        3408 => [
            'name' => 'Sweden - Stockholm',
        ],
        3409 => [
            'name' => 'Canada - 144°W to 138°W',
        ],
        3410 => [
            'name' => 'Canada - 138°W to 132°W',
        ],
        3411 => [
            'name' => 'Canada - 132°W to 126°W',
        ],
        3412 => [
            'name' => 'Canada - 126°W to 120°W',
        ],
        3413 => [
            'name' => 'Canada - 102°W to 96°W',
        ],
        3414 => [
            'name' => 'Canada - 96°W to 90°W',
        ],
        3415 => [
            'name' => 'Canada - 90°W to 84°W',
        ],
        3416 => [
            'name' => 'Canada - 84°W to 78°W',
        ],
        3417 => [
            'name' => 'Canada - 78°W to 72°W',
        ],
        3418 => [
            'name' => 'Latin America - SIRGAS 2000 by country',
        ],
        3419 => [
            'name' => 'North America - 72°W to 66°W and NAD83 by country',
        ],
        3420 => [
            'name' => 'North America - 66°W to 60°W and NAD83 by country',
        ],
        3421 => [
            'name' => 'Latin America - 84°W to 78°West; N hemisphere and SIRGAS by country',
        ],
        3422 => [
            'name' => 'Latin America - 78°W to 72°West; N hemisphere and SIRGAS by country',
        ],
        3423 => [
            'name' => 'Mexico - west of 114°W',
        ],
        3424 => [
            'name' => 'Mexico - 114°W to 108°W',
        ],
        3425 => [
            'name' => 'Mexico - 108°W to 102°W',
        ],
        3426 => [
            'name' => 'Mexico - 102°W to 96°W',
        ],
        3427 => [
            'name' => 'Latin America - 96°W to 90°W; N hemisphere and SIRGAS 2000 by country',
        ],
        3428 => [
            'name' => 'Latin America - 90°W to 84°W; N hemisphere and SIRGAS 2000 by country',
        ],
        3430 => [
            'name' => 'New Caledonia - Belep, Grande Terre, Ile des Pins, Loyalty Islands',
        ],
        3431 => [
            'name' => 'New Caledonia - west of 162°E',
        ],
        3432 => [
            'name' => 'New Caledonia - 162°E to 168°E',
        ],
        3433 => [
            'name' => 'New Caledonia - east of 168°E',
        ],
        3434 => [
            'name' => 'New Caledonia - Mare - west of 168°E',
        ],
        3435 => [
            'name' => 'New Caledonia - Mare - east of 168°E',
        ],
        3436 => [
            'name' => 'South America - 72°W to 66°W, N hemisphere and SIRGAS 2000 by country',
        ],
        3437 => [
            'name' => 'South America - 66°W to 60°W, N hemisphere and SIRGAS 2000 by country',
        ],
        3438 => [
            'name' => 'South America - 60°W to 54°W, N hemisphere and SIRGAS 2000 by country',
        ],
        3439 => [
            'name' => 'South America - 54°W to 48°W, N hemisphere and SIRGAS 2000 by country',
        ],
        3440 => [
            'name' => 'South America - 78°W to 72°W, S hemisphere and SIRGAS 2000 by country',
        ],
        3441 => [
            'name' => 'South America - 72°W to 66°W, S hemisphere and SIRGAS 2000 by country',
        ],
        3442 => [
            'name' => 'South America - 66°W to 60°W, S hemisphere and SIRGAS 2000 by country',
        ],
        3443 => [
            'name' => 'South America - 60°W to 54°W, S hemisphere and SIRGAS 2000 by country',
        ],
        3444 => [
            'name' => 'South America - 54°W to 48°W, S hemisphere and SIRGAS 2000 by country',
        ],
        3445 => [
            'name' => 'Brazil - 48°W to 42°W',
        ],
        3446 => [
            'name' => 'Brazil - 42°W to 36°W',
        ],
        3447 => [
            'name' => 'Brazil - 36°W to 30°W',
        ],
        3448 => [
            'name' => 'South America - SIRGAS 1995 by country',
        ],
        3449 => [
            'name' => 'Greenland - west of 72°W',
        ],
        3450 => [
            'name' => 'Greenland - 72°W to 66°W',
        ],
        3451 => [
            'name' => 'Greenland - 66°W to 60°W',
        ],
        3452 => [
            'name' => 'Greenland - 60°W to 54°W',
        ],
        3453 => [
            'name' => 'Greenland - 54°W to 48°W',
        ],
        3454 => [
            'name' => 'Greenland - 48°W to 42°W',
        ],
        3455 => [
            'name' => 'Greenland - 42°W to 36°W',
        ],
        3456 => [
            'name' => 'Greenland - 36°W to 30°W',
        ],
        3457 => [
            'name' => 'Greenland - 30°W to 24°W',
        ],
        3458 => [
            'name' => 'Greenland - 24°W to 18°W',
        ],
        3459 => [
            'name' => 'Greenland - 18°W to 12°W',
        ],
        3460 => [
            'name' => 'Greenland - 12°W to 6°W',
        ],
        3461 => [
            'name' => 'Mexico - offshore GoM - Campeche area N',
        ],
        3462 => [
            'name' => 'Mexico - offshore GoM - Campeche area S',
        ],
        3463 => [
            'name' => 'World - 86°S to 86°N',
        ],
        3464 => [
            'name' => 'World - N hemisphere - 12°E to 18°E - by country and WGS 72BE',
        ],
        3465 => [
            'name' => 'World - N hemisphere - 18°E to 24°E - by country and WGS 72BE',
        ],
        3466 => [
            'name' => 'China - Ordos basin',
        ],
        3467 => [
            'name' => 'North America - Great Lakes basin',
        ],
        3468 => [
            'name' => 'North America - Great Lakes basin and St Lawrence Seaway',
        ],
        3469 => [
            'name' => 'China - offshore - Yellow Sea',
        ],
        3470 => [
            'name' => 'China - offshore - Pearl River basin',
        ],
        3471 => [
            'name' => 'Denmark - onshore west of 12°E',
        ],
        3472 => [
            'name' => 'Denmark - onshore east of 12°E',
        ],
        3474 => [
            'name' => 'World - south of 0°N',
        ],
        3475 => [
            'name' => 'World - north of 0°N',
        ],
        3477 => [
            'name' => 'Libya - Cyrenaica',
        ],
        3478 => [
            'name' => 'Jamaica - west of 78°W',
        ],
        3479 => [
            'name' => 'Jamaica - east of 78°W',
        ],
        3480 => [
            'name' => 'World - north of 45°N',
        ],
        3481 => [
            'name' => 'Canada - NWT',
        ],
        3488 => [
            'name' => 'USA - 162°W to 156°W onshore - HI',
        ],
        3489 => [
            'name' => 'USA - 162°W to 156°W - AK, HI',
        ],
        3491 => [
            'name' => 'USA - 156°W to 150°W onshore - HI',
        ],
        3492 => [
            'name' => 'USA - 156°W to 150°W - AK, HI',
        ],
        3494 => [
            'name' => 'USA - 144°W to 138°W',
        ],
        3495 => [
            'name' => 'USA - 138°W to 132°W',
        ],
        3496 => [
            'name' => 'USA - 132°W to 126°W',
        ],
        3497 => [
            'name' => 'USA - 126°W to 120°W',
        ],
        3498 => [
            'name' => 'USA - 120°W to 114°W',
        ],
        3499 => [
            'name' => 'USA - 114°W to 108°W',
        ],
        3500 => [
            'name' => 'USA - 108°W to 102°W',
        ],
        3501 => [
            'name' => 'USA - 102°W to 96°W',
        ],
        3502 => [
            'name' => 'USA - 96°W to 90°W',
        ],
        3503 => [
            'name' => 'USA - 90°W to 84°W',
        ],
        3504 => [
            'name' => 'USA - 84°W to 78°W',
        ],
        3505 => [
            'name' => 'USA - 78°W to 72°W',
        ],
        3506 => [
            'name' => 'USA - 72°W to 66°W',
        ],
        3507 => [
            'name' => 'China - Tarim - 77.5°E to 88°E and 37°N to 42°N',
        ],
        3508 => [
            'name' => 'New Zealand - offshore Pacific Ocean, Southern Ocean',
        ],
        3510 => [
            'name' => 'Indonesia - 96°E to 99°E onshore',
        ],
        3511 => [
            'name' => 'Indonesia - 99°E to 102°E onshore',
        ],
        3512 => [
            'name' => 'Indonesia - 102°E to 105°E onshore',
        ],
        3513 => [
            'name' => 'Indonesia - 105°E to 108°E onshore',
        ],
        3514 => [
            'name' => 'Indonesia - 108°E to 111°E onshore',
        ],
        3515 => [
            'name' => 'Indonesia - 111°E to 114°E onshore',
        ],
        3516 => [
            'name' => 'Indonesia - 114°E to 117°E onshore',
        ],
        3517 => [
            'name' => 'Indonesia - 117°E to 120°E onshore',
        ],
        3518 => [
            'name' => 'Indonesia - 120°E to 123°E onshore',
        ],
        3519 => [
            'name' => 'Indonesia - 123°E to 126°E onshore',
        ],
        3520 => [
            'name' => 'Indonesia - 126°E to 129°E onshore',
        ],
        3521 => [
            'name' => 'Indonesia - 129°E to 132°E onshore',
        ],
        3522 => [
            'name' => 'Indonesia - 132°E to 135°E onshore',
        ],
        3523 => [
            'name' => 'Indonesia - 135°E to 138°E onshore',
        ],
        3524 => [
            'name' => 'Canada - 72°W to 66°W',
        ],
        3525 => [
            'name' => 'Canada - 66°W to 60°W',
        ],
        3526 => [
            'name' => 'Canada - 108°W to 102°W',
        ],
        3527 => [
            'name' => 'Canada - 114°W to 108°W',
        ],
        3528 => [
            'name' => 'Canada - 120°W to 114°W',
        ],
        3529 => [
            'name' => 'South Georgia - onshore',
        ],
        3531 => [
            'name' => 'UAE - Dubai municipality',
        ],
        3536 => [
            'name' => 'Montenegro - onshore',
        ],
        3537 => [
            'name' => 'Portugal - mainland - offshore',
        ],
        3538 => [
            'name' => 'Croatia - east of 18°E',
        ],
        3539 => [
            'name' => 'Croatia - west of 18°E',
        ],
        3540 => [
            'name' => 'Canada - Alberta - west of 118.5°W',
        ],
        3541 => [
            'name' => 'Canada - Alberta - 118.5°W to 115.5°W',
        ],
        3542 => [
            'name' => 'Canada - Alberta - 115.5°W to 112.5°W',
        ],
        3543 => [
            'name' => 'Canada - Alberta - east of 112.5°W',
        ],
        3544 => [
            'name' => 'World - 85°S to 85°N',
        ],
        3545 => [
            'name' => 'France - mainland south of 43°N and Corsica',
        ],
        3546 => [
            'name' => 'France - mainland south of 44°N',
        ],
        3547 => [
            'name' => 'France - mainland - 43°N to 45°N',
        ],
        3548 => [
            'name' => 'France - mainland - 44°N to 46°N',
        ],
        3549 => [
            'name' => 'France - mainland - 45°N to 47°N',
        ],
        3550 => [
            'name' => 'France - mainland - 46°N to 48°N',
        ],
        3551 => [
            'name' => 'France - mainland - 47°N to 49°N',
        ],
        3552 => [
            'name' => 'France - mainland - 48°N to 50°N',
        ],
        3553 => [
            'name' => 'France - mainland north of 49°N',
        ],
        3554 => [
            'name' => 'New Zealand - Snares and Auckland Islands',
        ],
        3555 => [
            'name' => 'New Zealand - Campbell Island',
        ],
        3556 => [
            'name' => 'New Zealand - Antipodes and Bounty Islands',
        ],
        3557 => [
            'name' => 'New Zealand - Raoul and Kermadec Islands',
        ],
        3558 => [
            'name' => 'Antarctica - Ross Sea Region',
        ],
        3559 => [
            'name' => 'Australia - offshore',
        ],
        3561 => [
            'name' => 'China - offshore - Bei Bu',
        ],
        3562 => [
            'name' => 'Taiwan - 120°E to 122°E',
        ],
        3563 => [
            'name' => 'Taiwan - 118°E to 120°E',
        ],
        3564 => [
            'name' => 'Slovenia - west of 14°30\'E onshore',
        ],
        3565 => [
            'name' => 'Slovenia - NE',
        ],
        3566 => [
            'name' => 'Slovenia - SE',
        ],
        3567 => [
            'name' => 'Slovenia - southeastern',
        ],
        3568 => [
            'name' => 'Slovenia - Dolenjska',
        ],
        3569 => [
            'name' => 'Slovenia - Stajerska',
        ],
        3570 => [
            'name' => 'Slovenia - Pomurje',
        ],
        3571 => [
            'name' => 'Slovenia - Gorenjska and N Primorsko',
        ],
        3572 => [
            'name' => 'Slovenia - Primorska and Notranjska onshore',
        ],
        3573 => [
            'name' => 'Slovenia - central',
        ],
        3574 => [
            'name' => 'Europe - onshore - eastern - S-42(58)',
        ],
        3575 => [
            'name' => 'Germany - East Germany - west of 12°E',
        ],
        3576 => [
            'name' => 'Europe - 12°E to 18°E onshore and S-42(83) by country',
        ],
        3577 => [
            'name' => 'Europe - 18°E to 24°E onshore and S-42(58) by country',
        ],
        3578 => [
            'name' => 'Europe - 18°E to 24°E onshore and S-42(83) by country',
        ],
        3579 => [
            'name' => 'Europe - 24°E to 30°E onshore and S-42(58) by country',
        ],
        3580 => [
            'name' => 'Europe - 13.5°E to 16.5°E onshore and S-42(58) by country',
        ],
        3581 => [
            'name' => 'Europe - 16.5°E to 19.5°E onshore and S-42(58) by country',
        ],
        3582 => [
            'name' => 'Europe - 16.5°E to 19.5°E onshore and S-42(83) by country',
        ],
        3583 => [
            'name' => 'Europe - 19.5°E to 22.5°E onshore and S-42(58) by country',
        ],
        3584 => [
            'name' => 'Europe - 19.5°E to 22.5°E onshore and S-42(83) by country',
        ],
        3585 => [
            'name' => 'Europe - 22.5°E to 25.5°E onshore and S-42(58) by country',
        ],
        3586 => [
            'name' => 'Europe - 22.5°E to 25.5°E onshore and S-42(83) by country',
        ],
        3587 => [
            'name' => 'Europe - 25.5°E to 28.5°E onshore and S-42(58) by country',
        ],
        3588 => [
            'name' => 'Europe - 28.5°E to 31.5°E onshore and S-42(58) by country',
        ],
        3589 => [
            'name' => 'Pakistan - Gambat',
        ],
        3591 => [
            'name' => 'Taiwan - onshore - Penghu',
        ],
        3592 => [
            'name' => 'Antarctica - Darwin Glacier region',
        ],
        3593 => [
            'name' => 'New Zealand - offshore',
        ],
        3594 => [
            'name' => 'Europe - EVRF2007',
        ],
        3595 => [
            'name' => 'Finland - west of 19.5°E onshore nominal',
        ],
        3596 => [
            'name' => 'Finland - 19.5°E to 20.5°E onshore nominal',
        ],
        3597 => [
            'name' => 'Finland - 20.5°E to 21.5°E onshore nominal',
        ],
        3598 => [
            'name' => 'Finland - 21.5°E to 22.5°E onshore nominal',
        ],
        3599 => [
            'name' => 'Finland - 22.5°E to 23.5°E onshore nominal',
        ],
        3600 => [
            'name' => 'Finland - 23.5°E to 24.5°E onshore nominal',
        ],
        3601 => [
            'name' => 'Finland - 24.5°E to 25.5°E onshore nominal',
        ],
        3602 => [
            'name' => 'Finland - 25.5°E to 26.5°E onshore nominal',
        ],
        3603 => [
            'name' => 'Finland - 26.5°E to 27.5°E onshore nominal',
        ],
        3604 => [
            'name' => 'Finland - 27.5°E to 28.5°E onshore nominal',
        ],
        3605 => [
            'name' => 'Finland - 28.5°E to 29.5°E nominal',
        ],
        3606 => [
            'name' => 'Finland - 29.5°E to 30.5°E nominal',
        ],
        3607 => [
            'name' => 'Finland - east of 30.5°E nominal',
        ],
        3608 => [
            'name' => 'Sweden - Stockholm county',
        ],
        3609 => [
            'name' => 'Congo DR (Zaire) - Katanga west of 25.5°E',
        ],
        3610 => [
            'name' => 'Congo DR (Zaire) - Katanga 24.5°E to 27.5°E',
        ],
        3611 => [
            'name' => 'Congo DR (Zaire) - Katanga 26.5°E to 29.5°E',
        ],
        3612 => [
            'name' => 'Congo DR (Zaire) - Katanga east of 28.5°E',
        ],
        3613 => [
            'name' => 'Congo DR (Zaire) - south',
        ],
        3614 => [
            'name' => 'Congo DR (Zaire) - Katanga - Lubumbashi area',
        ],
        3615 => [
            'name' => 'Moldova - west of 30°E',
        ],
        3616 => [
            'name' => 'Moldova - east of 30°E',
        ],
        3617 => [
            'name' => 'Congo DR (Zaire) - south and 15°E to 17°E',
        ],
        3618 => [
            'name' => 'Congo DR (Zaire) - south and 17°E and 19°E',
        ],
        3619 => [
            'name' => 'Brazil - Distrito Federal',
        ],
        3620 => [
            'name' => 'Congo DR (Zaire) - south and 19°E to 21°E',
        ],
        3621 => [
            'name' => 'Congo DR (Zaire) - south and 21°E to 23°E',
        ],
        3622 => [
            'name' => 'Congo DR (Zaire) - south and 23°E to 25°E',
        ],
        3623 => [
            'name' => 'Congo DR (Zaire) - south and 25°E to 27°E',
        ],
        3624 => [
            'name' => 'Congo DR (Zaire) - south and 27°E to 29°E',
        ],
        3625 => [
            'name' => 'Iraq - onshore',
        ],
        3626 => [
            'name' => 'Congo DR (Zaire) - south and 12°E to 18°E',
        ],
        3627 => [
            'name' => 'Congo DR (Zaire) - south and 18°E to 24°E',
        ],
        3628 => [
            'name' => 'Congo DR (Zaire) - south and 24°E to 30°E',
        ],
        3629 => [
            'name' => 'Spain - Canary Islands - west of 18°W',
        ],
        3630 => [
            'name' => 'Spain - Canary Islands - east of 18°W',
        ],
        3631 => [
            'name' => 'Denmark - onshore Jutland west of 10°E',
        ],
        3632 => [
            'name' => 'Denmark - onshore Jutland east of 9°E and Funen',
        ],
        3633 => [
            'name' => 'Mexico - 96°W to 90°W',
        ],
        3634 => [
            'name' => 'Caribbean - Puerto Rico and US Virgin Islands - onshore',
        ],
        3635 => [
            'name' => 'Mexico - east of 90°W',
        ],
        3636 => [
            'name' => 'Norway - onshore - west of 6°E',
        ],
        3637 => [
            'name' => 'USA - 102°W to 96°W and GoM OCS',
        ],
        3638 => [
            'name' => 'South America - 84°W to 78°W, S hemisphere and SIRGAS95 by country',
        ],
        3639 => [
            'name' => 'Norway - onshore - 6°E to 7°E',
        ],
        3640 => [
            'name' => 'USA - 96°W to 90°W and GoM OCS',
        ],
        3641 => [
            'name' => 'USA - 90°W to 84°W and GoM OCS',
        ],
        3642 => [
            'name' => 'USA - 84°W to 78°W and GoM OCS',
        ],
        3645 => [
            'name' => 'Sao Tome and Principe - onshore - Sao Tome',
        ],
        3646 => [
            'name' => 'Sao Tome and Principe - onshore - Principe',
        ],
        3647 => [
            'name' => 'Norway - onshore - 7°E to 8°E',
        ],
        3648 => [
            'name' => 'Norway - onshore - 8°E to 9°E',
        ],
        3649 => [
            'name' => 'Norway - onshore - 9°E to 10°E',
        ],
        3650 => [
            'name' => 'Norway - onshore - 10°E to 11°E',
        ],
        3651 => [
            'name' => 'Norway - onshore - 11°E to 12°E',
        ],
        3652 => [
            'name' => 'USA - Michigan - SPCS - W',
        ],
        3653 => [
            'name' => 'Norway - onshore - 12°E to 13°E',
        ],
        3654 => [
            'name' => 'Norway - onshore - 13°E to 14°E',
        ],
        3655 => [
            'name' => 'Norway - onshore - 14°E to 15°E',
        ],
        3656 => [
            'name' => 'Norway - onshore - 15°E to 16°E',
        ],
        3657 => [
            'name' => 'Norway - onshore - 16°E to 17°E',
        ],
        3658 => [
            'name' => 'Norway - onshore - 17°E to 18°E',
        ],
        3660 => [
            'name' => 'Norway - onshore - 18°E to 19°E',
        ],
        3661 => [
            'name' => 'Norway - onshore - 19°E to 20°E',
        ],
        3662 => [
            'name' => 'Norway - onshore - 20°E to 21°E',
        ],
        3663 => [
            'name' => 'Norway - onshore - 21°E to 22°E',
        ],
        3664 => [
            'name' => 'USA - CONUS and Alaska - onshore',
        ],
        3665 => [
            'name' => 'Norway - onshore - 22°E to 23°E',
        ],
        3666 => [
            'name' => 'Indonesia - Java, Java Sea and western Sumatra',
        ],
        3667 => [
            'name' => 'Norway - onshore - 23°E to 24°E',
        ],
        3668 => [
            'name' => 'Norway - onshore - 24°E to 25°E',
        ],
        3669 => [
            'name' => 'Norway - onshore - 25°E to 26°E',
        ],
        3670 => [
            'name' => 'Portugal - Azores and Madeira',
        ],
        3671 => [
            'name' => 'Norway - onshore - 26°E to 27°E',
        ],
        3672 => [
            'name' => 'Norway - onshore - 27°E to 28°E',
        ],
        3673 => [
            'name' => 'Norway - onshore - 28°E to 29°E',
        ],
        3674 => [
            'name' => 'Norway - onshore - 29°E to 30°E',
        ],
        3676 => [
            'name' => 'Norway - onshore - east of 30°E',
        ],
        3677 => [
            'name' => 'Portugal - Azores 30°W to 24°W',
        ],
        3678 => [
            'name' => 'Portugal - Madeira and EEZ E of 18°W',
        ],
        3679 => [
            'name' => 'Portugal - Madeira island onshore',
        ],
        3680 => [
            'name' => 'Portugal - Porto Santo island onshore',
        ],
        3681 => [
            'name' => 'Portugal - Azores C - Graciosa onshore',
        ],
        3682 => [
            'name' => 'Portugal - Azores - west of 30°W',
        ],
        3683 => [
            'name' => 'Portugal - Azores E - Santa Maria onshore',
        ],
        3684 => [
            'name' => 'Portugal - Azores W - Flores onshore',
        ],
        3685 => [
            'name' => 'Portugal - Azores W - Corvo onshore',
        ],
        3686 => [
            'name' => 'Colombia - mainland and offshore Caribbean',
        ],
        3687 => [
            'name' => 'Australia - SA and WA 126°E to 132°E',
        ],
        3688 => [
            'name' => 'Australia - SA 132°E to 138°E',
        ],
        3689 => [
            'name' => 'Australia - SA and Qld 138°E to 144°E',
        ],
        3690 => [
            'name' => 'Australia - Qld 144°E to 150°E',
        ],
        3691 => [
            'name' => 'Australia - Qld east of 150°E',
        ],
        3692 => [
            'name' => 'Brazil - Reconcavo and Jacuipe',
        ],
        3693 => [
            'name' => 'Brazil - Tucano and Jatoba',
        ],
        3694 => [
            'name' => 'France - onshore - mainland and Corsica',
        ],
        3696 => [
            'name' => 'Brazil - Sergipe and Alagoas',
        ],
        3697 => [
            'name' => 'Brazil - Paraiba-Pernambuco',
        ],
        3698 => [
            'name' => 'Brazil - Potiguar, Ceara and Barreirinhas',
        ],
        3699 => [
            'name' => 'Brazil - Cumuruxatiba, Jequitinhonha and Camamu-Almada',
        ],
        3700 => [
            'name' => 'Brazil - Santos and Pelotas',
        ],
        3713 => [
            'name' => 'Asia - Korea N and S - west of 126°E',
        ],
        3716 => [
            'name' => 'Asia - Korea N and S - 126°E to 128°E',
        ],
        3720 => [
            'name' => 'Korea, Republic of (South Korea) - 130°E to 132°E onshore',
        ],
        3721 => [
            'name' => 'Korea, Republic of (South Korea) - 126°E to 128°E Jeju',
        ],
        3726 => [
            'name' => 'Asia - Korea N and S - 128°E to 130°E',
        ],
        3727 => [
            'name' => 'Asia - Korea N and S - east of 130°E',
        ],
        3730 => [
            'name' => 'Korea, Republic of (South Korea) - 126°E to 128°E mainland',
        ],
        3732 => [
            'name' => 'Spain - Catalonia onshore',
        ],
        3733 => [
            'name' => 'Bolivia - east of 60°W',
        ],
        3734 => [
            'name' => 'Bhutan - Bumthang district',
        ],
        3735 => [
            'name' => 'Thailand - onshore east of 102°E',
        ],
        3736 => [
            'name' => 'Italy - mainland and Sicily',
        ],
        3737 => [
            'name' => 'Bhutan - Chhukha district',
        ],
        3738 => [
            'name' => 'Bhutan - Dagana district',
        ],
        3739 => [
            'name' => 'Korea, Republic of (South Korea) - mainland',
        ],
        3740 => [
            'name' => 'Bhutan - Gasa district',
        ],
        3741 => [
            'name' => 'Thailand - onshore and Gulf of Thailand',
        ],
        3742 => [
            'name' => 'Bhutan - Ha district',
        ],
        3743 => [
            'name' => 'Bhutan - Lhuentse district',
        ],
        3745 => [
            'name' => 'Bhutan - Mongar district',
        ],
        3746 => [
            'name' => 'Bhutan - Paro district',
        ],
        3747 => [
            'name' => 'Bhutan - Pemagatshel district',
        ],
        3748 => [
            'name' => 'Latin America - 120°W to 114°W',
        ],
        3749 => [
            'name' => 'Bhutan - Punakha district',
        ],
        3750 => [
            'name' => 'Bhutan - Samdrup Jongkhar district',
        ],
        3751 => [
            'name' => 'Bhutan - Samtse district',
        ],
        3752 => [
            'name' => 'Bhutan - Sarpang district',
        ],
        3753 => [
            'name' => 'Bhutan - Thimphu district',
        ],
        3754 => [
            'name' => 'Bhutan - Trashigang district',
        ],
        3755 => [
            'name' => 'Bhutan - Trongsa district',
        ],
        3756 => [
            'name' => 'Latin America - 114°W to 108°W',
        ],
        3757 => [
            'name' => 'Bhutan - Tsirang district',
        ],
        3758 => [
            'name' => 'Bhutan - Wangdue Phodrang district',
        ],
        3759 => [
            'name' => 'Latin America - 108°W to 102°W',
        ],
        3760 => [
            'name' => 'Bhutan - Yangtse district',
        ],
        3761 => [
            'name' => 'Bhutan - Zhemgang district',
        ],
        3762 => [
            'name' => 'New Zealand - North Island - One Tree vcrs',
        ],
        3763 => [
            'name' => 'Latin America - 102°W to 96°W',
        ],
        3764 => [
            'name' => 'New Zealand - North Island - Auckland vcrs',
        ],
        3765 => [
            'name' => 'French Guiana - coastal area west of 54°W',
        ],
        3766 => [
            'name' => 'French Guiana - coastal area east of 54°W',
        ],
        3767 => [
            'name' => 'Ireland - onshore',
        ],
        3768 => [
            'name' => 'New Zealand - North Island - Moturiki vcrs',
        ],
        3769 => [
            'name' => 'New Zealand - North Island - Taranaki vcrs',
        ],
        3771 => [
            'name' => 'New Zealand - North Island - Gisborne vcrs',
        ],
        3772 => [
            'name' => 'New Zealand - North Island - Hawkes Bay mc Napier vcrs',
        ],
        3773 => [
            'name' => 'New Zealand - North Island - Wellington vcrs',
        ],
        3774 => [
            'name' => 'New Zealand - North Island - Wellington mc',
        ],
        3775 => [
            'name' => 'New Zealand - North Island - Wairarapa mc',
        ],
        3776 => [
            'name' => 'New Zealand - North Island - Wanganui mc',
        ],
        3777 => [
            'name' => 'New Zealand - North Island - Taranaki mc',
        ],
        3778 => [
            'name' => 'New Zealand - North Island - Tuhirangi mc',
        ],
        3779 => [
            'name' => 'New Zealand - North Island - Bay of Plenty mc',
        ],
        3780 => [
            'name' => 'New Zealand - North Island - Poverty Bay mc',
        ],
        3781 => [
            'name' => 'New Zealand - North Island - Mount Eden mc',
        ],
        3782 => [
            'name' => 'New Zealand - South Island - Collingwood mc',
        ],
        3783 => [
            'name' => 'New Zealand - South Island - Karamea mc',
        ],
        3784 => [
            'name' => 'New Zealand - South Island - Nelson mc',
        ],
        3785 => [
            'name' => 'New Zealand - South Island - Marlborough mc',
        ],
        3786 => [
            'name' => 'New Zealand - South Island - Buller mc',
        ],
        3787 => [
            'name' => 'New Zealand - South Island - Grey mc',
        ],
        3788 => [
            'name' => 'New Zealand - South Island - Amuri mc',
        ],
        3789 => [
            'name' => 'New Zealand - South Island - Hokitika mc',
        ],
        3790 => [
            'name' => 'New Zealand - South Island - Mount Pleasant mc',
        ],
        3791 => [
            'name' => 'New Zealand - South Island - Okarito mc',
        ],
        3792 => [
            'name' => 'New Zealand - South Island - Gawler mc',
        ],
        3793 => [
            'name' => 'New Zealand - South Island - Timaru mc',
        ],
        3794 => [
            'name' => 'New Zealand - South Island - Jacksons Bay mc',
        ],
        3795 => [
            'name' => 'New Zealand - South Island - Lindis Peak mc',
        ],
        3796 => [
            'name' => 'New Zealand - South Island - Observation Point mc',
        ],
        3797 => [
            'name' => 'New Zealand - South Island - Mount Nicholas mc',
        ],
        3798 => [
            'name' => 'New Zealand - South Island - North Taieri mc',
        ],
        3799 => [
            'name' => 'New Zealand - South Island - Mount York mc',
        ],
        3800 => [
            'name' => 'New Zealand - South and Stewart Islands - Bluff mc',
        ],
        3801 => [
            'name' => 'New Zealand - South Island - Bluff vcrs',
        ],
        3802 => [
            'name' => 'New Zealand - South Island - Nelson vcrs',
        ],
        3803 => [
            'name' => 'New Zealand - South Island - Dunedin vcrs',
        ],
        3804 => [
            'name' => 'New Zealand - South Island - Lyttleton vcrs',
        ],
        3806 => [
            'name' => 'New Zealand - South Island - Dunedin-Bluff vcrs',
        ],
        3808 => [
            'name' => 'Brazil - 36°W to 30°W offshore',
        ],
        3811 => [
            'name' => 'Chile - 72°W to 66°W',
        ],
        3812 => [
            'name' => 'Nigeria - offshore deep water - east of 6°E',
        ],
        3818 => [
            'name' => 'New Zealand - North Island - Tararu vcrs',
        ],
        3825 => [
            'name' => 'Caribbean - French Antilles west of 60°W',
        ],
        3826 => [
            'name' => 'Uruguay - west of 54°W',
        ],
        3827 => [
            'name' => 'Bolivia - west of 66°W',
        ],
        3828 => [
            'name' => 'Uruguay - east of 54°W',
        ],
        3829 => [
            'name' => 'Chile - 78°W to 72°W',
        ],
        3830 => [
            'name' => 'South America - 84°W to 78°W, N hemisphere and SAD69 by country',
        ],
        3831 => [
            'name' => 'South America - 84°W to 78°W, S hemisphere and SAD69 by country',
        ],
        3832 => [
            'name' => 'South America - 78°W to 72°W, N hemisphere and SAD69 by country',
        ],
        3833 => [
            'name' => 'South America - 78°W to 72°W, S hemisphere and SAD69 by country',
        ],
        3834 => [
            'name' => 'South America - 72°W to 66°W, N hemisphere onshore',
        ],
        3835 => [
            'name' => 'South America - 72°W to 66°W, S hemisphere onshore',
        ],
        3836 => [
            'name' => 'Peru - east of 72°W',
        ],
        3837 => [
            'name' => 'Peru - 84°W to 78°W',
        ],
        3838 => [
            'name' => 'Peru - 78°W to 72°W',
        ],
        3839 => [
            'name' => 'South America - 66°W to 60°W, N hemisphere and SAD69 by country',
        ],
        3840 => [
            'name' => 'South America - 66°W to 60°W, S hemisphere and SAD69 by country',
        ],
        3841 => [
            'name' => 'South America - 60°W to 54°W, N hemisphere and SAD69 by country',
        ],
        3842 => [
            'name' => 'Brazil - east of 30°W',
        ],
        3843 => [
            'name' => 'Argentina - mainland onshore and offshore TdF',
        ],
        3844 => [
            'name' => 'Nicaragua - onshore north of 12°48\'N',
        ],
        3846 => [
            'name' => 'Greenland - southwest coast south of 63°N',
        ],
        3847 => [
            'name' => 'Nicaragua - onshore south of 12°48\'N',
        ],
        3849 => [
            'name' => 'Costa Rica - onshore and offshore east of 86°30\'W',
        ],
        3852 => [
            'name' => 'USA - 120°W to 114°W onshore',
        ],
        3853 => [
            'name' => 'Antarctica - McMurdo Sound region',
        ],
        3854 => [
            'name' => 'Antarctica - Borchgrevink Coast region',
        ],
        3855 => [
            'name' => 'Antarctica - Pennell Coast region',
        ],
        3856 => [
            'name' => 'Antarctica - Ross Ice Shelf Region',
        ],
        3857 => [
            'name' => 'USA - 126°W to 120°W onshore',
        ],
        3858 => [
            'name' => 'Venezuela - east of 66°W',
        ],
        3859 => [
            'name' => 'Venezuela - 72°W and 66°W',
        ],
        3860 => [
            'name' => 'USA - 102°W to 96°W onshore',
        ],
        3861 => [
            'name' => 'USA - 96°W to 90°W onshore',
        ],
        3862 => [
            'name' => 'USA - 90°W to 84°W onshore',
        ],
        3863 => [
            'name' => 'USA - 84°W to 78°W onshore',
        ],
        3864 => [
            'name' => 'North America - 126°W to 120°W and NAD83 by country',
        ],
        3865 => [
            'name' => 'Canada - Labrador - 66°W to 63°W',
        ],
        3866 => [
            'name' => 'North America - 132°W to 126°W and NAD83 by country',
        ],
        3867 => [
            'name' => 'North America - 138°W to 132°W and NAD83 by country',
        ],
        3868 => [
            'name' => 'USA - 78°W to 72°W onshore',
        ],
        3869 => [
            'name' => 'Costa Rica - onshore north of 9°32\'N',
        ],
        3870 => [
            'name' => 'Costa Rica - onshore south of 9°56\'N',
        ],
        3871 => [
            'name' => 'USA - 72°W to 66°W onshore',
        ],
        3872 => [
            'name' => 'North America - 144°W to 138°W and NAD83 by country',
        ],
        3873 => [
            'name' => 'Spain - Canary Islands onshore',
        ],
        3874 => [
            'name' => 'Brazil - Corrego Alegre 1961',
        ],
        3875 => [
            'name' => 'Canada - Labrador - 63°W to 60°W',
        ],
        3876 => [
            'name' => 'Central America - Guatemala to Costa Rica',
        ],
        3877 => [
            'name' => 'Brazil - 42°W to 36°W and south of 15°S onshore',
        ],
        3878 => [
            'name' => 'Brazil - 54°W to 48°W and SAD69',
        ],
        3879 => [
            'name' => 'Germany - onshore east of 12°E',
        ],
        3880 => [
            'name' => 'Canada - Labrador - west of 66°W',
        ],
        3881 => [
            'name' => 'Brazil - 60°W to 54°W',
        ],
        3882 => [
            'name' => 'Papua New Guinea - west of 144°E',
        ],
        3883 => [
            'name' => 'USA - Hawaii - main islands',
        ],
        3885 => [
            'name' => 'Papua New Guinea - 144°E to 150°E',
        ],
        3887 => [
            'name' => 'Brazil - onshore south of 14°S and east of 53°W',
        ],
        3888 => [
            'name' => 'Papua New Guinea - 150°E to 156°E',
        ],
        3889 => [
            'name' => 'Europe - Fehmarnbelt outer',
        ],
        3890 => [
            'name' => 'Europe - Fehmarnbelt inner',
        ],
        3891 => [
            'name' => 'Canada - 60°W to 54°W and NAD27',
        ],
        3892 => [
            'name' => 'Germany - offshore North Sea west of 4.5°E',
        ],
        3894 => [
            'name' => 'New Zealand - Chatham Island onshore',
        ],
        3895 => [
            'name' => 'Ukraine - west of 24°E',
        ],
        3896 => [
            'name' => 'Brazil - equatorial margin',
        ],
        3897 => [
            'name' => 'France - offshore Mediterranean',
        ],
        3898 => [
            'name' => 'Ukraine - 24°E to 30°E',
        ],
        3899 => [
            'name' => 'Europe - South Permian basin',
        ],
        3900 => [
            'name' => 'Europe - onshore - eastern - S-42(83)',
        ],
        3901 => [
            'name' => 'Germany - onshore west of 6°E',
        ],
        3902 => [
            'name' => 'Reunion',
        ],
        3903 => [
            'name' => 'Ukraine - 30°E to 36°E',
        ],
        3904 => [
            'name' => 'Germany - onshore between 6°E and 12°E',
        ],
        3905 => [
            'name' => 'Ukraine - east of 36°E',
        ],
        3906 => [
            'name' => 'Ukraine - west of 22.5°E',
        ],
        3907 => [
            'name' => 'Ukraine - 22.5°E to 25.5°E',
        ],
        3908 => [
            'name' => 'Ukraine - 25.5°E to 28.5°E',
        ],
        3909 => [
            'name' => 'Ukraine - 28.5°E to 31.5°E',
        ],
        3910 => [
            'name' => 'Ukraine - 31.5°E to 34.5°E',
        ],
        3911 => [
            'name' => 'Reunion - east of 54°E',
        ],
        3912 => [
            'name' => 'Ukraine - 34.5°E to 37.5°E',
        ],
        3913 => [
            'name' => 'Ukraine - east of 37.5°E',
        ],
        3914 => [
            'name' => 'World - N hemisphere - 3°E to 9°E - by country',
        ],
        3915 => [
            'name' => 'Reunion - west of 54°E',
        ],
        3929 => [
            'name' => 'Mozambique - west of 36°E',
        ],
        3931 => [
            'name' => 'Mozambique - 36°E to 42°E',
        ],
        3934 => [
            'name' => 'French Southern Territories - Europa',
        ],
        3937 => [
            'name' => 'Congo DR (Zaire) - 11°E to 13°E',
        ],
        3938 => [
            'name' => 'Mauritania - 18°W to 12°W',
        ],
        3941 => [
            'name' => 'Libya - east of 24°E',
        ],
        3943 => [
            'name' => 'Bahrain - onshore',
        ],
        3944 => [
            'name' => 'China - 102°E to 108°E',
        ],
        3945 => [
            'name' => 'China - 108°E to 114°E',
        ],
        3946 => [
            'name' => 'China - 114°E to 120°E',
        ],
        3947 => [
            'name' => 'China - 120°E to 126°E',
        ],
        3948 => [
            'name' => 'China - 126°E to 132°E',
        ],
        3949 => [
            'name' => 'Libya - west of 12°E',
        ],
        3950 => [
            'name' => 'Libya - 12°E to 18°E',
        ],
        3951 => [
            'name' => 'Libya - 18°E to 24°E',
        ],
        3952 => [
            'name' => 'Algeria - 6°W to 0°W',
        ],
        3953 => [
            'name' => 'Algeria - 0°E to 6°E',
        ],
        3954 => [
            'name' => 'Algeria - east of 6°E',
        ],
        3955 => [
            'name' => 'Malaysia - West Malaysia',
        ],
        3956 => [
            'name' => 'Iraq - east of 48°E',
        ],
        3957 => [
            'name' => 'Japan - onshore',
        ],
        3958 => [
            'name' => 'Philippines - zone I onshore',
        ],
        3959 => [
            'name' => 'Japan - 120°E to 126°E',
        ],
        3960 => [
            'name' => 'Japan - 126°E to 132°E',
        ],
        3961 => [
            'name' => 'Japan - 132°E to 138°E',
        ],
        3962 => [
            'name' => 'Japan - 138°E to 144°E',
        ],
        3963 => [
            'name' => 'Japan - 144°E to 150°E',
        ],
        3964 => [
            'name' => 'Philippines - zone II onshore',
        ],
        3965 => [
            'name' => 'Philippines - zone III onshore',
        ],
        3966 => [
            'name' => 'Philippines - zone IV onshore',
        ],
        3967 => [
            'name' => 'Philippines - zone V onshore',
        ],
        3968 => [
            'name' => 'Saudi Arabia - onshore Gulf coast',
        ],
        3969 => [
            'name' => 'Philippines - onshore',
        ],
        3970 => [
            'name' => 'New Zealand - nearshore west of 168°E',
        ],
        3971 => [
            'name' => 'New Zealand - nearshore 168°E to 174°E',
        ],
        3972 => [
            'name' => 'New Zealand - nearshore east of 174°E',
        ],
        3973 => [
            'name' => 'New Zealand - onshore',
        ],
        3975 => [
            'name' => 'Indonesia - east of 138°E onshore',
        ],
        3976 => [
            'name' => 'Indonesia - west of 96°E onshore',
        ],
        3977 => [
            'name' => 'Malaysia - East Malaysia',
        ],
        3978 => [
            'name' => 'Indonesia - 96°E to 102°E, N hemisphere onshore',
        ],
        3979 => [
            'name' => 'Indonesia - 102°E to 108°E, N hemisphere onshore',
        ],
        3980 => [
            'name' => 'Indonesia - 108°E to 114°E, N hemisphere onshore',
        ],
        3981 => [
            'name' => 'Indonesia - 114°E to 120°E, N hemisphere onshore',
        ],
        3982 => [
            'name' => 'Taiwan - onshore - mainland',
        ],
        3983 => [
            'name' => 'Indonesia - 120°E to 126°E, N hemisphere onshore',
        ],
        3984 => [
            'name' => 'Indonesia - 126°E to 132°E, N hemisphere onshore',
        ],
        3985 => [
            'name' => 'Indonesia - 96°E to 102°E, S hemisphere onshore',
        ],
        3986 => [
            'name' => 'Indonesia - 102°E to 108°E, S hemisphere onshore',
        ],
        3987 => [
            'name' => 'Indonesia - 108°E to 114°E, S hemisphere onshore',
        ],
        3988 => [
            'name' => 'Indonesia - 114°E to 120°E, S hemisphere onshore',
        ],
        3989 => [
            'name' => 'Indonesia - 120°E to 126°E, S hemisphere onshore',
        ],
        3990 => [
            'name' => 'Indonesia - 126°E to 132°E, S hemisphere onshore',
        ],
        3991 => [
            'name' => 'Indonesia - 132°E to 138°E, S hemisphere onshore',
        ],
        3992 => [
            'name' => 'New Zealand - offshore 180°W to 174°W',
        ],
        3993 => [
            'name' => 'Germany - onshore 7.5°E to 10.5°E',
        ],
        3995 => [
            'name' => 'Japan - onshore mainland and adjacent islands',
        ],
        3996 => [
            'name' => 'Germany - onshore 10.5°E to 13.5°E',
        ],
        3998 => [
            'name' => 'Germany - onshore east of 13.5°E',
        ],
        4002 => [
            'name' => 'Yemen - east of 54°E',
        ],
        4005 => [
            'name' => 'Indonesia - Kalimantan W - coastal',
        ],
        4006 => [
            'name' => 'Yemen - west of 42°E',
        ],
        4007 => [
            'name' => 'Asia - Cambodia and Vietnam - onshore & Cuu Long basin',
        ],
        4008 => [
            'name' => 'Oman - mainland east of 54°E',
        ],
        4009 => [
            'name' => 'Oman - mainland',
        ],
        4012 => [
            'name' => 'Congo DR (Zaire) - Bas Congo east of 15°E',
        ],
        4013 => [
            'name' => 'Papua New Guinea - PFTB',
        ],
        4015 => [
            'name' => 'Vietnam - mainland',
        ],
        4016 => [
            'name' => 'South America - onshore north of 45°S',
        ],
        4018 => [
            'name' => 'Congo DR (Zaire) - south and 29°E to 31°E',
        ],
        4019 => [
            'name' => 'Arctic - 87°N to 75°N, 156°W to 66°W',
        ],
        4020 => [
            'name' => 'Indonesia - onshore',
        ],
        4022 => [
            'name' => 'UAE - Abu Dhabi and Dubai - onshore east of 54°E',
        ],
        4023 => [
            'name' => 'Brazil - west of 72°W',
        ],
        4024 => [
            'name' => 'Brazil - 72°W to 66°W',
        ],
        4025 => [
            'name' => 'Angola - offshore north of 8°S',
        ],
        4026 => [
            'name' => 'Brazil - 66°W to 60°W',
        ],
        4027 => [
            'name' => 'Arctic - 87°N to 75°N, 84°W to 6°E',
        ],
        4028 => [
            'name' => 'Arctic - 87°N to 75°N, 12°W to 78°E',
        ],
        4029 => [
            'name' => 'Arctic - 87°N to 75°N, 60°E to 150°E',
        ],
        4030 => [
            'name' => 'Arctic - 84°30\'N to 79°30\'N, 135°W to 95°W',
        ],
        4031 => [
            'name' => 'Arctic - 87°N to 75°N, 132°E to 138°W',
        ],
        4032 => [
            'name' => 'Arctic - 79°N to 67°N, 156°W to 66°W',
        ],
        4033 => [
            'name' => 'Arctic - 79°N to 67°N, 84°W to 6°E',
        ],
        4034 => [
            'name' => 'Arctic - 79°N to 67°N, 12°W to 78°E',
        ],
        4035 => [
            'name' => 'Italy - Emilia-Romagna',
        ],
        4036 => [
            'name' => 'Arctic - 84°30\'N to 79°30\'N, 95°W to 55°W',
        ],
        4037 => [
            'name' => 'Arctic - 79°N to 67°N, 60°E to 150°E',
        ],
        4038 => [
            'name' => 'Arctic - 79°N to 67°N, 132°E to 138°W',
        ],
        4039 => [
            'name' => 'Arctic - 84°30\'N to 79°30\'N, 72°W to 32°W',
        ],
        4040 => [
            'name' => 'Arctic - 71°N to 59°N, 156°W to 66°W',
        ],
        4041 => [
            'name' => 'Arctic - 71°N to 59°N, 84°W to 6°E',
        ],
        4042 => [
            'name' => 'Arctic - 71°N to 59°N, 12°W to 78°E',
        ],
        4043 => [
            'name' => 'Arctic - 71°N to 59°N, 60°E to 150°E',
        ],
        4044 => [
            'name' => 'Arctic - 87°50\'N to 82°50\'N, 180°W to 120°W',
        ],
        4045 => [
            'name' => 'Arctic - 71°N to 59°N, 132°E to 138°W',
        ],
        4046 => [
            'name' => 'Arctic - 84°30\'N to 79°30\'N, 32°W to 8°E',
        ],
        4047 => [
            'name' => 'Arctic - 87°50\'N to 82°50\'N, 120°W to 60°W',
        ],
        4048 => [
            'name' => 'Arctic - 87°50\'N to 82°50\'N, 60°W to 0°E',
        ],
        4049 => [
            'name' => 'Arctic - 87°50\'N to 82°50\'N, 0°E to 60°E',
        ],
        4050 => [
            'name' => 'Arctic - 87°50\'N to 82°50\'N, 60°E to 120°E',
        ],
        4051 => [
            'name' => 'Arctic - 87°50\'N to 82°50\'N, 120°E to 180°E',
        ],
        4052 => [
            'name' => 'Arctic - 84°30\'N to 79°30\'N, 174°W to 135°W',
        ],
        4053 => [
            'name' => 'Arctic - 84°30\'N to 79°30\'N, 4°W to 36°E',
        ],
        4054 => [
            'name' => 'Arctic - 84°30\'N to 79°30\'N, 33°E to 73°E',
        ],
        4055 => [
            'name' => 'Arctic - 84°30\'N to 79°30\'N, 73°E to 113°E',
        ],
        4056 => [
            'name' => 'Arctic - 84°30\'N to 79°30\'N, 113°E to 153°E',
        ],
        4057 => [
            'name' => 'Arctic - 84°30\'N to 79°30\'N, 146°E to 174°W',
        ],
        4058 => [
            'name' => 'Arctic - 81°10\'N to 76°10\'N, 4°W to 38°E',
        ],
        4059 => [
            'name' => 'Arctic - 81°10\'N to 76°10\'N, 35°E to 67°E',
        ],
        4060 => [
            'name' => 'Arctic - 81°10\'N to 76°10\'N, 67°E to 98°E',
        ],
        4061 => [
            'name' => 'Arctic - 81°10\'N to 76°10\'N, 98°E to 129°E',
        ],
        4062 => [
            'name' => 'Arctic - 81°10\'N to 76°10\'N, 129°E to 160°E',
        ],
        4063 => [
            'name' => 'Arctic - 81°10\'N to 76°10\'N, 160°E to 169°W',
        ],
        4064 => [
            'name' => 'Arctic - 81°10\'N to 76°10\'N, 169°W to 138°W',
        ],
        4065 => [
            'name' => 'Arctic - 81°10\'N to 76°10\'N, 144°W to 114°W',
        ],
        4066 => [
            'name' => 'Norway - onshore - 6°E to 12°E',
        ],
        4067 => [
            'name' => 'Norway - onshore - 12°E to 18°E',
        ],
        4068 => [
            'name' => 'Norway - onshore - 18°E to 24°E',
        ],
        4069 => [
            'name' => 'Norway - onshore - 24°E to 30°E',
        ],
        4070 => [
            'name' => 'Arctic - 81°10\'N to 76°10\'N, 114°W to 84°W',
        ],
        4071 => [
            'name' => 'Arctic - 81°10\'N to 76°10\'N, 84°W to 54°W',
        ],
        4072 => [
            'name' => 'Arctic - 81°10\'N to 76°10\'N, Canada east of 84°W',
        ],
        4073 => [
            'name' => 'Arctic - 81°10\'N to 76°10\'N, Greenland west of 54°W',
        ],
        4074 => [
            'name' => 'Arctic - 81°10\'N to 76°10\'N, 54°W to 24°W',
        ],
        4075 => [
            'name' => 'Arctic - 81°10\'N to 76°10\'N, 24°W to 3°E',
        ],
        4076 => [
            'name' => 'Arctic - 77°50\'N to 72°50\'N, 169°W to 141°W',
        ],
        4077 => [
            'name' => 'Arctic - 77°50\'N to 72°50\'N, 141°W to 116°W',
        ],
        4078 => [
            'name' => 'Arctic - 77°50\'N to 72°50\'N, 116°W to 91°W',
        ],
        4079 => [
            'name' => 'Arctic - 77°50\'N to 72°50\'N, 91°W to 67°W',
        ],
        4080 => [
            'name' => 'Arctic - 77°50\'N to 72°50\'N, 76°W to 51°W',
        ],
        4081 => [
            'name' => 'Arctic - 77°50\'N to 72°50\'N, 51°W to 26°W',
        ],
        4082 => [
            'name' => 'Arctic - 77°50\'N to 72°50\'N, 26°W to 2°W',
        ],
        4083 => [
            'name' => 'Arctic - 77°50\'N to 72°50\'N, 2°W to 22°E',
        ],
        4084 => [
            'name' => 'Arctic - 77°50\'N to 72°50\'N, 22°E to 46°E',
        ],
        4085 => [
            'name' => 'Arctic - 77°50\'N to 72°50\'N, 46°E to 70°E',
        ],
        4086 => [
            'name' => 'Arctic - 77°50\'N to 72°50\'N, 70°E to 94°E',
        ],
        4087 => [
            'name' => 'Arctic - 77°50\'N to 72°50\'N, 94°E to 118°E',
        ],
        4088 => [
            'name' => 'Arctic - 77°50\'N to 72°50\'N, 118°E to 142°E',
        ],
        4089 => [
            'name' => 'Arctic - 77°50\'N to 72°50\'N, 142°E to 166°E',
        ],
        4090 => [
            'name' => 'Arctic - 77°50\'N to 72°50\'N, 166°E to 169°W',
        ],
        4091 => [
            'name' => 'Arctic - 74°30\'N to 69°30\'N, 4°E to 24°E',
        ],
        4092 => [
            'name' => 'Arctic - 74°30\'N to 69°30\'N, 24°E to 44°E',
        ],
        4093 => [
            'name' => 'Arctic - 74°30\'N to 69°30\'N, 44°E to 64°E',
        ],
        4094 => [
            'name' => 'Arctic - 74°30\'N to 69°30\'N, 64°E to 85°E',
        ],
        4095 => [
            'name' => 'Arctic - 74°30\'N to 69°30\'N, 85°E to 106°E',
        ],
        4096 => [
            'name' => 'Arctic - 74°30\'N to 69°30\'N, 106°E to 127°E',
        ],
        4097 => [
            'name' => 'Arctic - 74°30\'N to 69°30\'N, 127°E to 148°E',
        ],
        4098 => [
            'name' => 'Arctic - 74°30\'N to 69°30\'N, 148°E to 169°E',
        ],
        4099 => [
            'name' => 'Arctic - 74°30\'N to 69°30\'N, 169°E to 169°W',
        ],
        4100 => [
            'name' => 'Arctic - 74°30\'N to 69°30\'N, 173°W to 153°W',
        ],
        4101 => [
            'name' => 'Arctic - 74°30\'N to 69°30\'N, 157°W to 137°W',
        ],
        4102 => [
            'name' => 'Arctic - 74°30\'N to 69°30\'N, 141°W to 121°W',
        ],
        4103 => [
            'name' => 'Arctic - 74°30\'N to 69°30\'N, 121°W to 101°W',
        ],
        4104 => [
            'name' => 'Arctic - 74°30\'N to 69°30\'N, 101°W to 81°W',
        ],
        4105 => [
            'name' => 'Arctic - 74°30\'N to 69°30\'N, 81°W to 61°W',
        ],
        4106 => [
            'name' => 'Arctic - 74°30\'N to 69°30\'N, 72°W to 52°W',
        ],
        4107 => [
            'name' => 'Arctic - 74°30\'N to 69°30\'N, 52°W to 32°W',
        ],
        4108 => [
            'name' => 'Arctic - 74°30\'N to 69°30\'N, 32°W to 12°W',
        ],
        4109 => [
            'name' => 'Arctic - 74°30\'N to 69°30\'N, 15°W to 5°E',
        ],
        4110 => [
            'name' => 'Arctic - 71°10\'N to 66°10\'N, 174°W to 156°W',
        ],
        4111 => [
            'name' => 'Arctic - 71°10\'N to 66°10\'N, 156°W to 138°W',
        ],
        4112 => [
            'name' => 'Arctic - 71°10\'N to 66°10\'N, 141°W to 122°W',
        ],
        4113 => [
            'name' => 'Arctic - 71°10\'N to 66°10\'N, 122°W to 103°W',
        ],
        4114 => [
            'name' => 'Arctic - 71°10\'N to 66°10\'N, 103°W to 84°W',
        ],
        4115 => [
            'name' => 'Arctic - 71°10\'N to 66°10\'N, 84°W to 65°W',
        ],
        4116 => [
            'name' => 'Arctic - 71°10\'N to 66°10\'N, 65°W to 47°W',
        ],
        4117 => [
            'name' => 'Arctic - 71°10\'N to 66°10\'N, 47°W to 29°W',
        ],
        4118 => [
            'name' => 'Arctic - 71°10\'N to 66°10\'N, 29°W to 11°W',
        ],
        4119 => [
            'name' => 'Arctic - 67°50\'N to 62°50\'N, 59°W to 42°W',
        ],
        4120 => [
            'name' => 'Arctic - 67°50\'N to 62°50\'N, 42°W to 25°W',
        ],
        4121 => [
            'name' => 'Cayman Islands - Little Cayman',
        ],
        4122 => [
            'name' => 'Colombia - Arauca city',
        ],
        4123 => [
            'name' => 'Arctic - 64°30\'N to 59°30\'N, 59°W to 44°W',
        ],
        4124 => [
            'name' => 'Arctic - 64°30\'N to 59°30\'N, 44°W to 29°W',
        ],
        4125 => [
            'name' => 'Portugal - Madeira and Desertas islands onshore',
        ],
        4126 => [
            'name' => 'Portugal - Azores E onshore - Santa Maria and Formigas',
        ],
        4128 => [
            'name' => 'Colombia - Santa Marta city',
        ],
        4129 => [
            'name' => 'Brazil - 48°W to 42°W and north of 0°N',
        ],
        4130 => [
            'name' => 'Colombia - Sucre city',
        ],
        4131 => [
            'name' => 'Colombia - Tunja city',
        ],
        4132 => [
            'name' => 'Colombia - Armenia city',
        ],
        4133 => [
            'name' => 'Brazil - 42°W to 36°W and north of 0°N',
        ],
        4134 => [
            'name' => 'Colombia - Barranquilla city',
        ],
        4135 => [
            'name' => 'Colombia - Bogota city',
        ],
        4136 => [
            'name' => 'Colombia - Bucaramanga city',
        ],
        4137 => [
            'name' => 'Colombia - Cali city',
        ],
        4138 => [
            'name' => 'Colombia - Cartagena city',
        ],
        4139 => [
            'name' => 'Colombia - Cucuta city',
        ],
        4140 => [
            'name' => 'Colombia - Florencia city',
        ],
        4141 => [
            'name' => 'Colombia - Ibague city',
        ],
        4142 => [
            'name' => 'Colombia - Inirida city',
        ],
        4143 => [
            'name' => 'Colombia - Leticia city',
        ],
        4144 => [
            'name' => 'Colombia - Manizales city',
        ],
        4145 => [
            'name' => 'Colombia - Medellin city',
        ],
        4146 => [
            'name' => 'Colombia - Mitu city',
        ],
        4147 => [
            'name' => 'Colombia - Mocoa city',
        ],
        4148 => [
            'name' => 'Colombia - Monteria city',
        ],
        4149 => [
            'name' => 'Colombia - Neiva city',
        ],
        4150 => [
            'name' => 'Colombia - Pasto city',
        ],
        4151 => [
            'name' => 'Colombia - Pereira city',
        ],
        4152 => [
            'name' => 'Colombia - Popayan city',
        ],
        4153 => [
            'name' => 'Colombia - Puerto Carreno city',
        ],
        4154 => [
            'name' => 'Colombia - Quibdo city',
        ],
        4155 => [
            'name' => 'Colombia - Riohacha city',
        ],
        4156 => [
            'name' => 'Colombia - San Andres city',
        ],
        4157 => [
            'name' => 'Colombia - San Jose del Guaviare city',
        ],
        4158 => [
            'name' => 'Colombia - Valledupar city',
        ],
        4159 => [
            'name' => 'Colombia - Villavicencio city',
        ],
        4160 => [
            'name' => 'Colombia - Yopal city',
        ],
        4161 => [
            'name' => 'North America - Mexico and USA - onshore',
        ],
        4162 => [
            'name' => 'Pacific - US interests Pacific plate',
        ],
        4163 => [
            'name' => 'Japan excluding northern main province',
        ],
        4164 => [
            'name' => 'USA - Iowa - Spencer',
        ],
        4165 => [
            'name' => 'Japan - onshore mainland excluding eastern main province',
        ],
        4166 => [
            'name' => 'Japan - onshore - Honshu, Shikoku, Kyushu',
        ],
        4167 => [
            'name' => 'Pacific - US interests Mariana plate',
        ],
        4168 => [
            'name' => 'Japan - onshore - Hokkaido',
        ],
        4169 => [
            'name' => 'Christmas Island - onshore',
        ],
        4170 => [
            'name' => 'Japan - northern Honshu',
        ],
        4171 => [
            'name' => 'Northern Mariana Islands - Rota, Saipan and Tinian',
        ],
        4172 => [
            'name' => 'Falkland Islands - offshore 63°W to 57°W',
        ],
        4175 => [
            'name' => 'Australasia - Australia and Norfolk Island - 162°E to 168°E',
        ],
        4176 => [
            'name' => 'Australasia - Australia and Christmas Island - 108°E to 114°E',
        ],
        4177 => [
            'name' => 'Australia - GDA',
        ],
        4178 => [
            'name' => 'Australia - 114°E to 120°E',
        ],
        4179 => [
            'name' => 'Norfolk Island - east of 168°E',
        ],
        4180 => [
            'name' => 'USA - Oregon - Baker City',
        ],
        4182 => [
            'name' => 'USA - Oregon - Bend-Burns',
        ],
        4183 => [
            'name' => 'Seychelles - Seychelles Bank',
        ],
        4186 => [
            'name' => 'Italy - 12°E to 18°E',
        ],
        4187 => [
            'name' => 'Italy - east of 18°E',
        ],
        4188 => [
            'name' => 'Spain and Gibraltar - onshore',
        ],
        4189 => [
            'name' => 'Cocos (Keeling) Islands - west of 96°E',
        ],
        4190 => [
            'name' => 'Cocos (Keeling) Islands - east of 96°E',
        ],
        4191 => [
            'name' => 'Australasia - Australia and Christmas Island - west of 108°E',
        ],
        4192 => [
            'name' => 'USA - Oregon - Bend-Klamath Falls',
        ],
        4193 => [
            'name' => 'Vietnam - west of 103°30\'E onshore',
        ],
        4194 => [
            'name' => 'Japan onshore excluding northern main province',
        ],
        4195 => [
            'name' => 'USA - Oregon - Bend-Redmond-Prineville',
        ],
        4196 => [
            'name' => 'Australia - 156°E to 162°E including Macquarie',
        ],
        4197 => [
            'name' => 'USA - Oregon - Eugene',
        ],
        4198 => [
            'name' => 'USA - Oregon - Grants Pass-Ashland',
        ],
        4199 => [
            'name' => 'USA - Oregon - Canyonville-Grants Pass',
        ],
        4200 => [
            'name' => 'USA - Oregon - Columbia River East',
        ],
        4201 => [
            'name' => 'USA - Oregon - Gresham-Warm Springs',
        ],
        4202 => [
            'name' => 'USA - Oregon - Columbia River West',
        ],
        4203 => [
            'name' => 'USA - Oregon - Cottage Grove-Canyonville',
        ],
        4204 => [
            'name' => 'USA - Oregon - Dufur-Madras',
        ],
        4206 => [
            'name' => 'USA - Oregon - La Grande',
        ],
        4207 => [
            'name' => 'USA - Oregon - Ontario',
        ],
        4208 => [
            'name' => 'USA - Oregon - Oregon Coast',
        ],
        4209 => [
            'name' => 'USA - Oregon - Pendleton',
        ],
        4210 => [
            'name' => 'USA - Oregon - Pendleton-La Grande',
        ],
        4211 => [
            'name' => 'USA - Oregon - Portland',
        ],
        4212 => [
            'name' => 'USA - Oregon - Salem',
        ],
        4213 => [
            'name' => 'USA - Oregon - Sweet Home-Sisters',
        ],
        4214 => [
            'name' => 'Papua New Guinea - mainland onshore',
        ],
        4215 => [
            'name' => 'Vietnam - 103.5°E to 106.5°E onshore',
        ],
        4216 => [
            'name' => 'Papua New Guinea - North Fly',
        ],
        4217 => [
            'name' => 'Vietnam - east of 106.5°E onshore',
        ],
        4218 => [
            'name' => 'Vietnam - Quang Ninh; Da Nang, Quang Nam; Ba Ria-Vung Tau, Dong Nai, Lam Dong',
        ],
        4219 => [
            'name' => 'USA - Iowa - Mason City',
        ],
        4220 => [
            'name' => 'Equatorial Guinea - Bioko',
        ],
        4221 => [
            'name' => 'Chile - onshore 36°S to 43.5°S',
        ],
        4222 => [
            'name' => 'Chile - onshore 26°S to 36°S',
        ],
        4223 => [
            'name' => 'Asia - Malaysia (west including SCS) and Singapore',
        ],
        4224 => [
            'name' => 'Chile - onshore 32°S to 36°S',
        ],
        4225 => [
            'name' => 'UAE - Abu Dhabi - onshore',
        ],
        4228 => [
            'name' => 'USA - California - San Francisco Bay Area',
        ],
        4230 => [
            'name' => 'USA - Iowa - Elkader',
        ],
        4231 => [
            'name' => 'Chile - onshore north of 26°S',
        ],
        4232 => [
            'name' => 'Chile - onshore north of 32°S',
        ],
        4233 => [
            'name' => 'USA - Iowa - Sioux City-Iowa Falls',
        ],
        4234 => [
            'name' => 'USA - Iowa - Waterloo',
        ],
        4235 => [
            'name' => 'USA - Iowa - Council Bluffs',
        ],
        4236 => [
            'name' => 'USA - Iowa - Carroll-Atlantic',
        ],
        4237 => [
            'name' => 'USA - Iowa - Ames-Des Moines',
        ],
        4238 => [
            'name' => 'Asia - Middle East - Iraq and SW Iran',
        ],
        4239 => [
            'name' => 'USA - Iowa - Newton',
        ],
        4240 => [
            'name' => 'USA - Iowa - Cedar Rapids',
        ],
        4241 => [
            'name' => 'USA - Iowa - Dubuque-Davenport',
        ],
        4242 => [
            'name' => 'USA - Iowa - Red Oak-Ottumwa',
        ],
        4243 => [
            'name' => 'USA - Iowa - Fairfield',
        ],
        4244 => [
            'name' => 'USA - Iowa - Burlington',
        ],
        4245 => [
            'name' => 'French Southern Territories - Crozet west of 48°E',
        ],
        4246 => [
            'name' => 'French Southern and Antarctic Territories',
        ],
        4247 => [
            'name' => 'French Southern Territories - Crozet 48°E to 54°E',
        ],
        4248 => [
            'name' => 'French Southern Territories - Crozet east of 54°E',
        ],
        4249 => [
            'name' => 'French Southern Territories - 60°E to 66°E',
        ],
        4250 => [
            'name' => 'French Southern Territories - 66°E to 72°E',
        ],
        4251 => [
            'name' => 'French Southern Territories - 72°E to 78°E',
        ],
        4252 => [
            'name' => 'French Southern Territories - east of 78°E',
        ],
        4253 => [
            'name' => 'USA - Indiana - Lake and Newton',
        ],
        4254 => [
            'name' => 'USA - Indiana - Jasper and Porter',
        ],
        4255 => [
            'name' => 'USA - Indiana - LaPorte, Pulaski, Starke',
        ],
        4256 => [
            'name' => 'USA - Indiana - Benton',
        ],
        4257 => [
            'name' => 'USA - Indiana - Tippecanoe and White',
        ],
        4258 => [
            'name' => 'USA - Indiana - Carroll',
        ],
        4259 => [
            'name' => 'USA - Indiana - Fountain and Warren',
        ],
        4260 => [
            'name' => 'USA - Indiana - Clinton',
        ],
        4261 => [
            'name' => 'USA - Indiana - Parke and Vermillion',
        ],
        4262 => [
            'name' => 'USA - Indiana - Montgomery and Putnam',
        ],
        4263 => [
            'name' => 'USA - Indiana - Boone and Hendricks',
        ],
        4264 => [
            'name' => 'USA - Indiana - Vigo',
        ],
        4265 => [
            'name' => 'USA - Indiana - Clay',
        ],
        4266 => [
            'name' => 'USA - Indiana - Owen',
        ],
        4267 => [
            'name' => 'USA - Indiana - Monroe and Morgan',
        ],
        4268 => [
            'name' => 'USA - Indiana - Sullivan',
        ],
        4269 => [
            'name' => 'USA - Indiana - Daviess and Greene',
        ],
        4270 => [
            'name' => 'USA - Indiana - Knox',
        ],
        4271 => [
            'name' => 'USA - Indiana - Dubois and Martin',
        ],
        4272 => [
            'name' => 'USA - Indiana - Crawford, Lawrence, Orange',
        ],
        4273 => [
            'name' => 'USA - Indiana - Gibson',
        ],
        4274 => [
            'name' => 'USA - Indiana - Pike and Warrick',
        ],
        4275 => [
            'name' => 'USA - Indiana - Posey',
        ],
        4276 => [
            'name' => 'USA - Indiana - Vanderburgh',
        ],
        4277 => [
            'name' => 'USA - Indiana - Spencer',
        ],
        4278 => [
            'name' => 'USA - Indiana - Perry',
        ],
        4279 => [
            'name' => 'USA - Indiana - Fulton, Marshall, St Joseph',
        ],
        4280 => [
            'name' => 'USA - Indiana - Elkhart, Kosciusko, Wabash',
        ],
        4281 => [
            'name' => 'USA - Indiana - LaGrange and Noble',
        ],
        4282 => [
            'name' => 'USA - Indiana - Steuben',
        ],
        4283 => [
            'name' => 'USA - Indiana - DeKalb',
        ],
        4284 => [
            'name' => 'USA - Indiana - Huntington and Whitley',
        ],
        4285 => [
            'name' => 'USA - Indiana - Allen',
        ],
        4286 => [
            'name' => 'USA - Indiana - Cass',
        ],
        4287 => [
            'name' => 'USA - Indiana - Howard and Miami',
        ],
        4288 => [
            'name' => 'USA - Indiana - Wells',
        ],
        4289 => [
            'name' => 'USA - Indiana - Adams',
        ],
        4290 => [
            'name' => 'USA - Indiana - Grant',
        ],
        4291 => [
            'name' => 'USA - Indiana - Blackford and Delaware',
        ],
        4292 => [
            'name' => 'USA - Indiana - Jay',
        ],
        4293 => [
            'name' => 'USA - Indiana - Hamilton and Tipton',
        ],
        4294 => [
            'name' => 'USA - Indiana - Hancock and Madison',
        ],
        4295 => [
            'name' => 'USA - Indiana - Randolph and Wayne',
        ],
        4296 => [
            'name' => 'USA - Indiana - Henry',
        ],
        4297 => [
            'name' => 'USA - Indiana - Johnson and Marion',
        ],
        4298 => [
            'name' => 'USA - Indiana - Shelby',
        ],
        4299 => [
            'name' => 'USA - Indiana - Decatur and Rush',
        ],
        4300 => [
            'name' => 'USA - Indiana - Fayette, Franklin, Union',
        ],
        4301 => [
            'name' => 'USA - Indiana - Brown',
        ],
        4302 => [
            'name' => 'USA - Indiana - Bartholomew',
        ],
        4303 => [
            'name' => 'USA - Indiana - Jackson',
        ],
        4304 => [
            'name' => 'USA - Indiana - Jennings',
        ],
        4305 => [
            'name' => 'USA - Indiana - Ripley',
        ],
        4306 => [
            'name' => 'USA - Indiana - Dearborn, Ohio, Switzerland',
        ],
        4307 => [
            'name' => 'USA - Indiana - Harrison and Washington',
        ],
        4308 => [
            'name' => 'USA - Indiana - Clark, Floyd, Scott',
        ],
        4309 => [
            'name' => 'USA - Indiana - Jefferson',
        ],
        4310 => [
            'name' => 'USA - Montana - St Mary valley',
        ],
        4311 => [
            'name' => 'USA - Montana - Blackfeet reservation',
        ],
        4312 => [
            'name' => 'USA - Montana - Milk River',
        ],
        4313 => [
            'name' => 'USA - Montana - Fort Belknap',
        ],
        4314 => [
            'name' => 'USA - Montana - Fort Peck higher areas',
        ],
        4315 => [
            'name' => 'USA - Montana - Fort Peck lower areas',
        ],
        4316 => [
            'name' => 'USA - Montana - Crow reservation',
        ],
        4317 => [
            'name' => 'USA - Montana - Three Forks',
        ],
        4318 => [
            'name' => 'USA - Montana - Billings',
        ],
        4319 => [
            'name' => 'USA - Wyoming - Wind River reservation',
        ],
        4320 => [
            'name' => 'USA - Wisconsin - Ashland',
        ],
        4321 => [
            'name' => 'USA - Wisconsin - Bayfield',
        ],
        4322 => [
            'name' => 'Oman - west of 54°E',
        ],
        4323 => [
            'name' => 'Oman - 54°E to 60°E',
        ],
        4324 => [
            'name' => 'Oman - east of 60°E',
        ],
        4325 => [
            'name' => 'USA - Wisconsin - Burnett',
        ],
        4326 => [
            'name' => 'USA - Wisconsin - Douglas',
        ],
        4327 => [
            'name' => 'USA - Wisconsin - Florence',
        ],
        4328 => [
            'name' => 'USA - Wisconsin - Forest',
        ],
        4329 => [
            'name' => 'USA - Wisconsin - Iron',
        ],
        4330 => [
            'name' => 'USA - Wisconsin - Oneida',
        ],
        4331 => [
            'name' => 'USA - Wisconsin - Barron',
        ],
        4332 => [
            'name' => 'USA - Wisconsin - Price',
        ],
        4333 => [
            'name' => 'USA - Wisconsin - Sawyer',
        ],
        4334 => [
            'name' => 'USA - Wisconsin - Vilas',
        ],
        4335 => [
            'name' => 'USA - Wisconsin - Washburn',
        ],
        4336 => [
            'name' => 'USA - Wisconsin - Brown',
        ],
        4337 => [
            'name' => 'USA - Wisconsin - Buffalo',
        ],
        4338 => [
            'name' => 'USA - Wisconsin - Chippewa',
        ],
        4339 => [
            'name' => 'USA - Wisconsin - Clark',
        ],
        4340 => [
            'name' => 'USA - Wisconsin - Door',
        ],
        4341 => [
            'name' => 'USA - Wisconsin - Dunn',
        ],
        4342 => [
            'name' => 'USA - Wisconsin - Eau Claire',
        ],
        4343 => [
            'name' => 'USA - Wisconsin - Jackson',
        ],
        4344 => [
            'name' => 'USA - Wisconsin - Langlade',
        ],
        4345 => [
            'name' => 'USA - Wisconsin - Lincoln',
        ],
        4346 => [
            'name' => 'USA - Wisconsin - Marathon',
        ],
        4347 => [
            'name' => 'USA - Wisconsin - Marinette',
        ],
        4348 => [
            'name' => 'USA - Wisconsin - Menominee',
        ],
        4349 => [
            'name' => 'USA - Wisconsin - Oconto',
        ],
        4350 => [
            'name' => 'USA - Wisconsin - Pepin and Pierce',
        ],
        4351 => [
            'name' => 'USA - Wisconsin - Polk',
        ],
        4352 => [
            'name' => 'USA - Wisconsin - Portage',
        ],
        4353 => [
            'name' => 'USA - Wisconsin - Rusk',
        ],
        4354 => [
            'name' => 'USA - Wisconsin - Shawano',
        ],
        4355 => [
            'name' => 'USA - Wisconsin - St. Croix',
        ],
        4356 => [
            'name' => 'USA - Wisconsin - Taylor',
        ],
        4357 => [
            'name' => 'USA - Wisconsin - Trempealeau',
        ],
        4358 => [
            'name' => 'USA - Wisconsin - Waupaca',
        ],
        4359 => [
            'name' => 'USA - Wisconsin - Wood',
        ],
        4360 => [
            'name' => 'USA - Wisconsin - Adams and Juneau',
        ],
        4361 => [
            'name' => 'USA - Wisconsin - Calumet, Fond du Lac, Outagamie and Winnebago',
        ],
        4362 => [
            'name' => 'USA - Wisconsin - Columbia',
        ],
        4363 => [
            'name' => 'USA - Wisconsin - Crawford',
        ],
        4364 => [
            'name' => 'USA - Wisconsin - Dane',
        ],
        4365 => [
            'name' => 'USA - Wisconsin - Dodge and Jefferson',
        ],
        4366 => [
            'name' => 'USA - Wisconsin - Grant',
        ],
        4367 => [
            'name' => 'USA - Wisconsin - Green and Lafayette',
        ],
        4368 => [
            'name' => 'USA - Wisconsin - Green Lake and Marquette',
        ],
        4369 => [
            'name' => 'USA - Wisconsin - Iowa',
        ],
        4370 => [
            'name' => 'USA - Wisconsin - Kenosha, Milwaukee, Ozaukee and Racine',
        ],
        4371 => [
            'name' => 'USA - Wisconsin - Kewaunee, Manitowoc and Sheboygan',
        ],
        4372 => [
            'name' => 'USA - Wisconsin - La Crosse',
        ],
        4373 => [
            'name' => 'USA - Wisconsin - Monroe',
        ],
        4374 => [
            'name' => 'USA - Wisconsin - Richland',
        ],
        4375 => [
            'name' => 'USA - Wisconsin - Rock',
        ],
        4376 => [
            'name' => 'USA - Wisconsin - Sauk',
        ],
        4377 => [
            'name' => 'USA - Wisconsin - Vernon',
        ],
        4378 => [
            'name' => 'USA - Wisconsin - Walworth',
        ],
        4379 => [
            'name' => 'USA - Wisconsin - Washington',
        ],
        4380 => [
            'name' => 'USA - Wisconsin - Waukesha',
        ],
        4381 => [
            'name' => 'USA - Wisconsin - Waushara',
        ],
        4383 => [
            'name' => 'Papua New Guinea - onshore south of 5°S and west of 144°E',
        ],
        4384 => [
            'name' => 'Papua New Guinea - 0°N to 12°S and 140°E to 158°E',
        ],
        4385 => [
            'name' => 'Kyrgyzstan - west of 70°01\'E',
        ],
        4386 => [
            'name' => 'Kyrgyzstan - 70°01\'E to 73°01\'E',
        ],
        4387 => [
            'name' => 'Kyrgyzstan - 73°01\'E to 76°01\'E',
        ],
        4388 => [
            'name' => 'Kyrgyzstan - 76°01\'E to 79°01\'E',
        ],
        4389 => [
            'name' => 'Kyrgyzstan - east of 79°01\'E',
        ],
        4390 => [
            'name' => 'UK - Britain and UKCS 49°45\'N to 61°N, 9°W to 2°E',
        ],
        4391 => [
            'name' => 'UK - offshore 49°45\'N to 61°N, 9°W to 2°E',
        ],
        4392 => [
            'name' => 'India - northeast',
        ],
        4394 => [
            'name' => 'India - Andhra Pradesh and Telangana',
        ],
        4395 => [
            'name' => 'India - Arunachal Pradesh',
        ],
        4396 => [
            'name' => 'India - Assam',
        ],
        4397 => [
            'name' => 'India - Bihar',
        ],
        4398 => [
            'name' => 'India - Chhattisgarh',
        ],
        4399 => [
            'name' => 'India - Goa',
        ],
        4400 => [
            'name' => 'India - Gujarat',
        ],
        4401 => [
            'name' => 'India - Haryana',
        ],
        4402 => [
            'name' => 'India - Himachal Pradesh',
        ],
        4403 => [
            'name' => 'India - Jammu and Kashmir',
        ],
        4404 => [
            'name' => 'India - Jharkhand',
        ],
        4405 => [
            'name' => 'India - Karnataka',
        ],
        4406 => [
            'name' => 'India - Kerala',
        ],
        4407 => [
            'name' => 'India - Madhya Pradesh',
        ],
        4408 => [
            'name' => 'India - Maharashtra',
        ],
        4409 => [
            'name' => 'India - Manipur',
        ],
        4410 => [
            'name' => 'India - Meghalaya',
        ],
        4411 => [
            'name' => 'India - Mizoram',
        ],
        4412 => [
            'name' => 'India - Nagaland',
        ],
        4413 => [
            'name' => 'India - Odisha',
        ],
        4414 => [
            'name' => 'India - Punjab',
        ],
        4415 => [
            'name' => 'India - Rajasthan',
        ],
        4416 => [
            'name' => 'India - Sikkim',
        ],
        4417 => [
            'name' => 'India - Tamil Nadu',
        ],
        4418 => [
            'name' => 'India - Tripura',
        ],
        4419 => [
            'name' => 'India - Uttar Pradesh',
        ],
        4420 => [
            'name' => 'India - Uttarakhand',
        ],
        4421 => [
            'name' => 'India - West Bengal',
        ],
        4422 => [
            'name' => 'India - Delhi',
        ],
        4423 => [
            'name' => 'India - Andaman and Nicobar Islands',
        ],
        4424 => [
            'name' => 'India - Lakshadweep',
        ],
        4425 => [
            'name' => 'Papua New Guinea - onshore - Central province and Gulf province east of 144°E',
        ],
        4426 => [
            'name' => 'Bulgaria - east of 30°E',
        ],
        4427 => [
            'name' => 'Bulgaria - 24°E to 30°E',
        ],
        4428 => [
            'name' => 'Bulgaria - west of 24°E',
        ],
        4429 => [
            'name' => 'Ukraine - 25°E to 28°E',
        ],
        4430 => [
            'name' => 'Ukraine - 28°E to 31°E onshore',
        ],
        4431 => [
            'name' => 'Ukraine - 31°E to 34°E onshore',
        ],
        4432 => [
            'name' => 'Ukraine - 34°E to 37°E onshore',
        ],
        4433 => [
            'name' => 'Ukraine - 37°E to 40°E onshore',
        ],
        4434 => [
            'name' => 'Ukraine - east of 40°E',
        ],
        4435 => [
            'name' => 'Ukraine - west of 25°E',
        ],
        4436 => [
            'name' => 'Australia - Western Australia - Kalgoorlie',
        ],
        4437 => [
            'name' => 'Australia - Western Australia - Busselton',
        ],
        4438 => [
            'name' => 'Australia - Western Australia - Barrow',
        ],
        4439 => [
            'name' => 'Australia - Western Australia - Albany',
        ],
        4440 => [
            'name' => 'Australia - Western Australia - Jurien Bay',
        ],
        4441 => [
            'name' => 'Australia - Western Australia - Broome',
        ],
        4442 => [
            'name' => 'Australia - Western Australia - Carnarvon',
        ],
        4443 => [
            'name' => 'Australia - Western Australia - Collie',
        ],
        4444 => [
            'name' => 'Australia - Western Australia - Kalbarri',
        ],
        4445 => [
            'name' => 'Australia - Western Australia - Esperance',
        ],
        4446 => [
            'name' => 'Albania - north of 41°18\'N and east of 19°09\'E',
        ],
        4447 => [
            'name' => 'DR Congo (Zaire) - offshore',
        ],
        4448 => [
            'name' => 'Australia - Western Australia - Exmouth',
        ],
        4449 => [
            'name' => 'Australia - Western Australia - Geraldton',
        ],
        4450 => [
            'name' => 'USA - Arizona - Pima county west',
        ],
        4451 => [
            'name' => 'Australia - Western Australia - Karratha',
        ],
        4452 => [
            'name' => 'Australia - Western Australia - Kununurra',
        ],
        4453 => [
            'name' => 'Australia - Western Australia - Lancelin',
        ],
        4454 => [
            'name' => 'Greenland - 58°N to 85°N',
        ],
        4455 => [
            'name' => 'Europe - Upper Austria, Salzburg and Bohemia',
        ],
        4456 => [
            'name' => 'Europe - Lower Austria and Moravia',
        ],
        4457 => [
            'name' => 'Australia - Western Australia - Margaret River',
        ],
        4458 => [
            'name' => 'USA - Oregon - Riley-Lakeview',
        ],
        4459 => [
            'name' => 'USA - Oregon - Burns-Harper',
        ],
        4460 => [
            'name' => 'USA - Arizona - Pima county central',
        ],
        4461 => [
            'name' => 'Greenland - 59°N to 84°N',
        ],
        4462 => [
            'name' => 'Australia - Western Australia - Perth',
        ],
        4463 => [
            'name' => 'USA - Oregon - Siskiyou Pass',
        ],
        4464 => [
            'name' => 'USA - onshore - AZ MI MT ND OR SC',
        ],
        4465 => [
            'name' => 'USA - Oregon - Canyon City-Burns',
        ],
        4466 => [
            'name' => 'Australia - Western Australia - Port Hedland',
        ],
        4467 => [
            'name' => 'Trinidad and Tobago - offshore west of 60°W',
        ],
        4468 => [
            'name' => 'Trinidad and Tobago - offshore east of 60°W',
        ],
        4470 => [
            'name' => 'USA - Oregon - Ukiah-Fox',
        ],
        4471 => [
            'name' => 'USA - Oregon - Coast Range North',
        ],
        4472 => [
            'name' => 'USA - Arizona - Pima county east',
        ],
        4473 => [
            'name' => 'USA - Arizona - Pima county Mt. Lemmon',
        ],
        4474 => [
            'name' => 'USA - Oregon - Dayville-Prairie City',
        ],
        4475 => [
            'name' => 'USA - Oregon - Denio-Burns',
        ],
        4476 => [
            'name' => 'USA - Oregon - Halfway',
        ],
        4477 => [
            'name' => 'USA - Oregon - Medford-Diamond Lake',
        ],
        4478 => [
            'name' => 'USA - Oregon - Mitchell',
        ],
        4479 => [
            'name' => 'USA - Oregon - North Central',
        ],
        4480 => [
            'name' => 'USA - Oregon - Wallowa',
        ],
        4481 => [
            'name' => 'USA - Oregon - Ochoco Summit',
        ],
        4482 => [
            'name' => 'USA - Oregon - Owyhee',
        ],
        4483 => [
            'name' => 'USA - Oregon - Pilot Rock-Ukiah',
        ],
        4484 => [
            'name' => 'USA - Oregon - Prairie City-Brogan',
        ],
        4485 => [
            'name' => 'USA - Nevada - Las Vegas',
        ],
        4486 => [
            'name' => 'USA - Oregon - Warner Highway',
        ],
        4487 => [
            'name' => 'USA - Nevada - Las Vegas high elevation',
        ],
        4488 => [
            'name' => 'USA - Oregon - Willamette Pass',
        ],
        4489 => [
            'name' => 'Antarctica - Adelie Land coastal area west of 138°E',
        ],
        4490 => [
            'name' => 'Germany - Hamburg',
        ],
        4491 => [
            'name' => 'Australia - Queensland - Weipa',
        ],
        4492 => [
            'name' => 'Antarctica - Adelie Land coastal area east of 138°E',
        ],
        4493 => [
            'name' => 'Australia Christmas and Cocos - onshore',
        ],
        4494 => [
            'name' => 'USA - Kansas - Hays',
        ],
        4495 => [
            'name' => 'USA - Kansas - Goodland',
        ],
        4496 => [
            'name' => 'USA - Kansas - Colby',
        ],
        4497 => [
            'name' => 'USA - Kansas - Oberlin',
        ],
        4498 => [
            'name' => 'USA - Kansas - Great Bend',
        ],
        4499 => [
            'name' => 'USA - Kansas - Beloit',
        ],
        4500 => [
            'name' => 'USA - Kansas - Salina',
        ],
        4501 => [
            'name' => 'USA - Kansas - Manhattan',
        ],
        4502 => [
            'name' => 'USA - Kansas - Emporia',
        ],
        4503 => [
            'name' => 'USA - Kansas - Atchison',
        ],
        4504 => [
            'name' => 'USA - Kansas - Kansas City',
        ],
        4505 => [
            'name' => 'USA - Kansas - Ulysses',
        ],
        4506 => [
            'name' => 'USA - Kansas - Garden City',
        ],
        4507 => [
            'name' => 'USA - Kansas - Dodge City',
        ],
        4508 => [
            'name' => 'USA - Kansas - Larned',
        ],
        4509 => [
            'name' => 'USA - Kansas - Pratt',
        ],
        4510 => [
            'name' => 'USA - Kansas - Wichita',
        ],
        4511 => [
            'name' => 'USA - Kansas - Arkansas City',
        ],
        4512 => [
            'name' => 'USA - Kansas - Coffeyville',
        ],
        4513 => [
            'name' => 'USA - Kansas - Pittsburg',
        ],
        4514 => [
            'name' => 'Pacific - Guam and NMI west of 144°E',
        ],
        4515 => [
            'name' => 'USA - FBN',
        ],
        4516 => [
            'name' => 'USA - CONUS and GoM',
        ],
        4517 => [
            'name' => 'Canada - NAD27',
        ],
        4518 => [
            'name' => 'Pacific - Guam and NMI east of 144°E',
        ],
        4519 => [
            'name' => 'Algeria - 32°N to 34°39\'N',
        ],
        4521 => [
            'name' => 'Northern Mariana Islands - onshore',
        ],
        4522 => [
            'name' => 'Finland - mainland south of 66°N',
        ],
        4524 => [
            'name' => 'Saudi Arabia - west of 36°E',
        ],
        4525 => [
            'name' => 'Pacific - Guam and NMI - onshore',
        ],
        4526 => [
            'name' => 'Saudi Arabia - 36°E to 42°E',
        ],
        4527 => [
            'name' => 'Saudi Arabia - 42°E to 48°E',
        ],
        4528 => [
            'name' => 'Saudi Arabia - 48°E to 54°E',
        ],
        4530 => [
            'name' => 'Latin America - Central America and South America',
        ],
        4531 => [
            'name' => 'Costa Rica - offshore Caribbean',
        ],
        4532 => [
            'name' => 'Costa Rica - offshore Pacific',
        ],
        4533 => [
            'name' => 'Canada - British Columbia - CRD',
        ],
        4534 => [
            'name' => 'Canada - British Columbia - north Vancouver Is',
        ],
        4535 => [
            'name' => 'Canada - British Columbia - mainland',
        ],
        4536 => [
            'name' => 'Canada - Ontario - Toronto',
        ],
        4537 => [
            'name' => 'Canada - Ontario ex. Toronto',
        ],
        4538 => [
            'name' => 'Vietnam - Son La',
        ],
        4539 => [
            'name' => 'Angola - east of 18°E',
        ],
        4540 => [
            'name' => 'Africa - South Africa, Lesotho and Eswatini.',
        ],
        4541 => [
            'name' => 'Vietnam - Dien Bien and Lai Chau',
        ],
        4542 => [
            'name' => 'Kosovo',
        ],
        4543 => [
            'name' => 'Serbia',
        ],
        4544 => [
            'name' => 'North America - Canada, US (Conus+AK), PRVI',
        ],
        4545 => [
            'name' => 'Vietnam - Ca Mau and Kien Giang',
        ],
        4546 => [
            'name' => 'Vietnam - An Giang, Lao Cai, Nghe An, Phu Tho, Yen Bai',
        ],
        4547 => [
            'name' => 'Vietnam - 104°20\'E to 106°10\'E by province - Hanoi',
        ],
        4548 => [
            'name' => 'Vietnam - 104°20\'E to 106°40\'E by province',
        ],
        4549 => [
            'name' => 'Vietnam - 105°15\'E to 107°50\'E by province - HCMC',
        ],
        4550 => [
            'name' => 'Vietnam - Hoa Binh, Quang Binh and Tuyen Quang',
        ],
        4551 => [
            'name' => 'Angola - west of 12°E',
        ],
        4552 => [
            'name' => 'Vietnam - Binh Phuoc and Quang Tri',
        ],
        4553 => [
            'name' => 'Vietnam - Bac Kan and Thai Nguyen',
        ],
        4554 => [
            'name' => 'Vietnam - Bac Giang and Thua Thien-Hue',
        ],
        4555 => [
            'name' => 'Angola - 12°E to 18°E',
        ],
        4556 => [
            'name' => 'Vietnam - Lang Son',
        ],
        4557 => [
            'name' => 'Vietnam - Kon Tum',
        ],
        4558 => [
            'name' => 'Vietnam - Quang Ngai',
        ],
        4559 => [
            'name' => 'Vietnam - Binh Dinh, Khanh Hoa, Ninh Thuan',
        ],
        4560 => [
            'name' => 'Vietnam - Binh Thuan, Dak Lak, Dak Nong, Gia Lai, Phu Yen',
        ],
        4561 => [
            'name' => 'Argentina - Mendoza - Cuyo basin',
        ],
        4562 => [
            'name' => 'Argentina - Mendoza and Neuquen',
        ],
        4563 => [
            'name' => 'Argentina - 42.5°S to 50.3°S',
        ],
        4564 => [
            'name' => 'Argentina - 42.5°S to 50.3°S and west of 70.5°W',
        ],
        4565 => [
            'name' => 'Argentina - 42.5°S to 50.3°S and east of 67.5°W',
        ],
        4566 => [
            'name' => 'Europe - offshore North Sea - Germany and Netherlands east of 5°E',
        ],
        4567 => [
            'name' => 'South Africa - mainland - onshore and offshore',
        ],
        4568 => [
            'name' => 'South Africa - Prince Edward islands - onshore and offshore',
        ],
        4569 => [
            'name' => 'Argentina - south Santa Cruz',
        ],
        4570 => [
            'name' => 'Argentina - south Santa Cruz west of 70.5°W',
        ],
        4571 => [
            'name' => 'Argentina - south Santa Cruz east of 70.5°W',
        ],
        4572 => [
            'name' => 'Argentina - 44°S to 47.5°S',
        ],
        4573 => [
            'name' => 'Argentina - onshore',
        ],
        4574 => [
            'name' => 'Brazil - west of 54°W and between 18°S and 27°30\'S',
        ],
        4575 => [
            'name' => 'Denmark - onshore Jutland, Funen, Zealand and Lolland',
        ],
        4576 => [
            'name' => 'Brazil - 54°W to 48°W and 15°S to 27°30\'S',
        ],
        4577 => [
            'name' => 'Argentina - 70.5°W to 67.5°W mainland onshore',
        ],
        4578 => [
            'name' => 'Argentina - 67.5°W to 64.5°W mainland onshore',
        ],
        4579 => [
            'name' => 'Argentina - 64.5°W to 61.5°W mainland onshore',
        ],
        4581 => [
            'name' => 'Africa - Morocco and Western Sahara - onshore',
        ],
        4582 => [
            'name' => 'UK - London to Birmingham and Crewe',
        ],
        4583 => [
            'name' => 'UK - Liverpool to Leeds',
        ],
        4584 => [
            'name' => 'Germany - Saarland',
        ],
        4585 => [
            'name' => 'Austria - Vienna',
        ],
        4586 => [
            'name' => 'World - south of 50°S',
        ],
        4587 => [
            'name' => 'Congo DR (Zaire) - 6th parallel south 21.5°E to 23°E',
        ],
        4588 => [
            'name' => 'UK - London to Sheffield',
        ],
        4589 => [
            'name' => 'UK - Aberdeen to Inverness',
        ],
        4590 => [
            'name' => 'Spain - Ceuta',
        ],
        4591 => [
            'name' => 'Spain - Canary Islands - Lanzarote',
        ],
        4592 => [
            'name' => 'Spain - Canary Islands - Fuerteventura',
        ],
        4593 => [
            'name' => 'Spain - Canary Islands - Gran Canaria',
        ],
        4594 => [
            'name' => 'Spain - Canary Islands - Tenerife',
        ],
        4595 => [
            'name' => 'Spain - Canary Islands - La Gomera',
        ],
        4596 => [
            'name' => 'Spain - Canary Islands - La Palma',
        ],
        4597 => [
            'name' => 'Spain - Canary Islands - El Hierro',
        ],
        4598 => [
            'name' => 'Spain - Canary Islands western',
        ],
        4599 => [
            'name' => 'Spain - Canary Islands - El Hierro west of 18°W',
        ],
        4600 => [
            'name' => 'Spain - Canary Islands onshore east of 18°W',
        ],
        4601 => [
            'name' => 'Spain - Canary Islands western east of 18°W',
        ],
        4602 => [
            'name' => 'Spain - Balearic Islands - Mallorca',
        ],
        4603 => [
            'name' => 'Spain - Balearic Islands - Menorca',
        ],
        4604 => [
            'name' => 'Spain - Balearic Islands - Ibiza and Formentera',
        ],
        4605 => [
            'name' => 'Spain - mainland onshore and Ceuta',
        ],
        4606 => [
            'name' => 'Europe - British Isles - UK and Ireland onshore, UKCS',
        ],
        4607 => [
            'name' => 'UK - Glasgow to Kilmarnock',
        ],
        4608 => [
            'name' => 'Europe - EVRF2019',
        ],
        4609 => [
            'name' => 'Europe - ETRF EVRF2019',
        ],
        4610 => [
            'name' => 'Argentina - Buenos Aires city',
        ],
        4611 => [
            'name' => 'Malaysia - East Malaysia - Sarawak onshore',
        ],
        4612 => [
            'name' => 'Canada - Newfoundland',
        ],
        4613 => [
            'name' => 'Europe - Lyon-Turin',
        ],
        4615 => [
            'name' => 'Norway, Svalbard and Jan Mayen - offshore',
        ],
        4617 => [
            'name' => 'Canada - east of 42°W',
        ],
        4620 => [
            'name' => 'UK - Tweedmouth to Aberdeen',
        ],
        4621 => [
            'name' => 'UK - Newcastle to Ashington',
        ],
        4622 => [
            'name' => 'UK - Oxford to Bedford',
        ],
        4623 => [
            'name' => 'Ukraine - Kyiv city',
        ],
        4624 => [
            'name' => 'Ukraine - Cherkasy oblast',
        ],
        4625 => [
            'name' => 'Ukraine - Chernihiv oblast',
        ],
        4626 => [
            'name' => 'Ukraine - Chernivtsi oblast',
        ],
        4627 => [
            'name' => 'Ukraine - Dnipropetrovsk oblast',
        ],
        4628 => [
            'name' => 'Ukraine - Donetsk oblast',
        ],
        4629 => [
            'name' => 'Ukraine - Ivano-Frankivsk oblast',
        ],
        4630 => [
            'name' => 'Ukraine - Kharkiv oblast',
        ],
        4631 => [
            'name' => 'Ukraine - Kherson oblast',
        ],
        4632 => [
            'name' => 'Ukraine - Khmelnytskyi oblast',
        ],
        4633 => [
            'name' => 'Ukraine - Kyiv oblast',
        ],
        4634 => [
            'name' => 'Ukraine - Kirovohrad oblast',
        ],
        4635 => [
            'name' => 'Ukraine - Luhansk oblast',
        ],
        4636 => [
            'name' => 'Ukraine - Lviv oblast',
        ],
        4637 => [
            'name' => 'Ukraine - Mykolaiv oblast',
        ],
        4638 => [
            'name' => 'Ukraine - Odessa oblast',
        ],
        4639 => [
            'name' => 'Ukraine - Poltava oblast',
        ],
        4640 => [
            'name' => 'Ukraine - Rivne oblast',
        ],
        4641 => [
            'name' => 'Ukraine - Sumy oblast',
        ],
        4642 => [
            'name' => 'Ukraine - Ternopil oblast',
        ],
        4643 => [
            'name' => 'Ukraine - Vinnytsia oblast',
        ],
        4644 => [
            'name' => 'Ukraine - Volyn oblast',
        ],
        4645 => [
            'name' => 'Ukraine - Zakarpattia oblast',
        ],
        4646 => [
            'name' => 'Ukraine - Zaporizhzhia oblast',
        ],
        4647 => [
            'name' => 'Ukraine - Zhytomyr oblast',
        ],
        4648 => [
            'name' => 'Ukraine - Crimea',
        ],
        4649 => [
            'name' => 'Ukraine - Sevastopol',
        ],
        4650 => [
            'name' => 'Ukraine - Kyiv city and oblast',
        ],
        4651 => [
            'name' => 'Ukraine - Rivne and Khmelnytskyi oblasts',
        ],
        4652 => [
            'name' => 'UK - Cardiff to Lincoln',
        ],
        4653 => [
            'name' => 'Papua New Guinea - 156°E to 162°E',
        ],
        4654 => [
            'name' => 'Papua New Guinea - east of 162°E',
        ],
        4655 => [
            'name' => 'UK - Manchester to Dore',
        ],
        4656 => [
            'name' => 'Norway - inshore and nearshore',
        ],
        4661 => [
            'name' => 'UK - Newport to Ebbw Vale',
        ],
        4662 => [
            'name' => 'Iceland - onshore',
        ],
        4663 => [
            'name' => 'UK - Leeds to Hull',
        ],
        4664 => [
            'name' => 'UK - Inverness to Thurso',
        ],
        4665 => [
            'name' => 'UK - Motherwell to Inverness',
        ],
        4666 => [
            'name' => 'UK - Manchester, Wigan and Chester',
        ],
        4667 => [
            'name' => 'Chile - west of 108°W',
        ],
        4668 => [
            'name' => 'Europe - Ireland and UK offshore',
        ],
        4669 => [
            'name' => 'USA - Amtrak NE corridor',
        ],
        4670 => [
            'name' => 'Japan - zone I - onshore mainland',
        ],
        4671 => [
            'name' => 'Japan - zone II - onshore mainland',
        ],
        4672 => [
            'name' => 'Japan - zone III - onshore mainland',
        ],
        4673 => [
            'name' => 'Japan - zone VIII - onshore mainland',
        ],
        4674 => [
            'name' => 'Japan - zone IX - onshore mainland',
        ],
        4675 => [
            'name' => 'Japan - zone XI - onshore mainland',
        ],
        4676 => [
            'name' => 'Japan - zone XII - onshore mainland',
        ],
        4677 => [
            'name' => 'UK - Crewe to Holyhead',
        ],
        4678 => [
            'name' => 'UK - Chester to Shrewsbury',
        ],
        4679 => [
            'name' => 'UK - Shrewsbury to Crewe',
        ],
        4680 => [
            'name' => 'UK - Oxford to Worcester',
        ],
        4681 => [
            'name' => 'UK - Didcot to Banbury',
        ],
        4682 => [
            'name' => 'UK - London to Leamington Spa',
        ],
        4683 => [
            'name' => 'UK - Swansea to Fishguard',
        ],
        4684 => [
            'name' => 'UK - Cardiff and the valleys',
        ],
        4685 => [
            'name' => 'UK - London to Swansea',
        ],
        4686 => [
            'name' => 'UK - Dovey Junction to Pwllheli',
        ],
        4687 => [
            'name' => 'UK - Shrewsbury to Aberystwyth',
        ],
        4688 => [
            'name' => 'UK – Okehampton to Penstone',
        ],
        4689 => [
            'name' => 'UK – Reading to Penzance',
        ],
        4690 => [
            'name' => 'UK - London to Fishguard',
        ],
        4693 => [
            'name' => 'Denmark - Copenhagen',
        ],
        4694 => [
            'name' => 'Denmark - northern Schleswig',
        ],
        4701 => [
            'name' => 'USA - Illinois - Carroll, Jo Daviess, Stephenson',
        ],
        4702 => [
            'name' => 'USA - Illinois - Lee, Ogle, Winnebago',
        ],
        4703 => [
            'name' => 'USA - Illinois - Boone, Dekalb, Kane, Kendall, McHenry',
        ],
        4704 => [
            'name' => 'USA - Illinois - Cook, DuPage, Lake',
        ],
        4705 => [
            'name' => 'USA - Illinois - Rock Island',
        ],
        4706 => [
            'name' => 'USA - Illinois - Henry, Whiteside',
        ],
        4707 => [
            'name' => 'USA - Illinois - Bureau, Grundy, LaSalle, Putnam',
        ],
        4708 => [
            'name' => 'USA - Illinois - Kankakee, Will',
        ],
        4709 => [
            'name' => 'USA - Illinois - Henderson, Mercer, Warren',
        ],
        4710 => [
            'name' => 'USA - Illinois - Fulton, Knox, Stark',
        ],
        4711 => [
            'name' => 'USA - Illinois - Peoria, Tazewell',
        ],
        4712 => [
            'name' => 'USA - Illinois - Marshall, Woodford',
        ],
        4713 => [
            'name' => 'USA - Illinois - McLean',
        ],
        4714 => [
            'name' => 'USA - Illinois - Livingston',
        ],
        4715 => [
            'name' => 'USA - Illinois - Ford, Iroquois',
        ],
        4716 => [
            'name' => 'USA - Illinois - Adams, Hancock',
        ],
        4717 => [
            'name' => 'USA - Illinois - Brown, McDonough, Schuyler',
        ],
        4718 => [
            'name' => 'USA - Illinois - Cass, Logan, Mason, Menard',
        ],
        4719 => [
            'name' => 'USA - Illinois - Dewitt, Macon, Moultrie, Piatt, Shelby',
        ],
        4720 => [
            'name' => 'USA - Illinois - Champaign, Vermilion',
        ],
        4721 => [
            'name' => 'USA - Illinois - Morgan, Pike, Scott',
        ],
        4722 => [
            'name' => 'USA - Illinois - Sangamon',
        ],
        4723 => [
            'name' => 'USA - Illinois - Coles, Douglas, Edgar',
        ],
        4724 => [
            'name' => 'USA - Illinois - Calhoun, Jersey',
        ],
        4725 => [
            'name' => 'USA - Illinois - Greene, Macoupin',
        ],
        4726 => [
            'name' => 'USA - Illinois - Christian, Montgomery',
        ],
        4727 => [
            'name' => 'USA - Illinois - Bond, Effingham, Fayette',
        ],
        4728 => [
            'name' => 'USA - Illinois - Clark, Crawford, Cumberland, Jasper',
        ],
        4729 => [
            'name' => 'USA - Illinois - Madison, Monroe, St Clair',
        ],
        4730 => [
            'name' => 'USA - Illinois - Clinton, Jefferson, Marion, Washington',
        ],
        4731 => [
            'name' => 'USA - Illinois - Olney zone',
        ],
        4732 => [
            'name' => 'USA - Illinois - Carbondale zone',
        ],
        4733 => [
            'name' => 'USA - Illinois - Metropolis zone',
        ],
    ];

    public function __invoke(): array
    {
        return self::$sridData;
    }
}
