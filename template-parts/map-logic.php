<!-- Leaflet -->
<script src="<?= get_template_directory_uri(); ?>/vendor/leaflet/leaflet.js"></script>
<script type="text/javascript">

var statesData = {"type":"FeatureCollection","features":[
{"type":"Feature","id":"05","properties":{"name":"Arkansas","density":56.43},"geometry":{"type":"Polygon","coordinates": [[[17.3755,51.1024],[51.1052,17.3749],[51.1059,17.3728],[51.1104,17.3658],[51.1104,17.3594],[51.1116,17.3557],[51.1114,17.35],[51.1125,17.3436],[51.1175,17.3294],[51.1179,17.3289],[51.1218,17.3293],[51.1275,17.3297],[51.1338,17.33],[51.1393,17.3308],[51.1414,17.3292],[51.1453,17.3243],[51.1442,17.3205],[51.1439,17.3154],[51.138,17.3169],[51.1375,17.3162],[51.1378,17.3131],[51.1377,17.3105],[51.1416,17.3096],[51.1487,17.3063],[51.1482,17.3025],[51.1486,17.3022],[51.1491,17.2958],[51.1503,17.291],[51.1514,17.2908],[51.152,17.2921],[51.1526,17.2922],[51.1536,17.2931],[51.1561,17.295],[51.1594,17.2931],[51.1582,17.3015],[51.161,17.304],[51.16,17.3127],[51.1591,17.318],[51.1613,17.3197],[51.1613,17.321],[51.1602,17.3233],[51.1586,17.3268],[51.159,17.3282],[51.16,17.3304],[51.1609,17.3317],[51.1619,17.3329],[51.1647,17.3361],[51.1656,17.338],[51.1641,17.3455],[51.1672,17.3481],[51.1678,17.3462],[51.1687,17.347],[51.1693,17.333],[51.17,17.3323],[51.1704,17.3251],[51.1672,17.3132],[51.1699,17.3101],[51.1707,17.3112],[51.172,17.3083],[51.1729,17.3062],[51.1723,17.305],[51.1728,17.3045],[51.1727,17.3023],[51.1732,17.2963],[51.1823,17.3043],[51.1826,17.3045],[51.1829,17.3026],[51.1842,17.3036],[51.1859,17.3045],[51.187,17.3045],[51.1876,17.3043],[51.1885,17.3034],[51.1891,17.3031],[51.1901,17.3032],[51.1906,17.3035],[51.1916,17.3046],[51.1932,17.3063],[51.1939,17.3065],[51.1945,17.3068],[51.1945,17.306],[51.1942,17.3046],[51.1931,17.3019],[51.1932,17.301],[51.1936,17.3],[51.1946,17.3002],[51.1955,17.2993],[51.1982,17.3009],[51.2038,17.3023],[51.2082,17.3051],[51.2102,17.307],[51.2118,17.3105],[51.2148,17.3108],[51.2171,17.306],[51.2191,17.3026],[51.2223,17.2974],[51.2236,17.2964],[51.2253,17.2959],[51.2256,17.2956],[51.2259,17.2953],[51.2252,17.2889],[51.225,17.2877],[51.225,17.2872],[51.2248,17.286],[51.2236,17.2756],[51.2244,17.2715],[51.2255,17.2692],[51.2269,17.2685],[51.2276,17.2681],[51.2324,17.2657],[51.2323,17.2638],[51.2325,17.2603],[51.2363,17.2588],[51.238,17.2558],[51.2395,17.251],[51.2407,17.2526],[51.243,17.2559],[51.2444,17.2567],[51.2472,17.2586],[51.2505,17.2607],[51.2527,17.2613],[51.2536,17.2597],[51.2546,17.2592],[51.2571,17.2526],[51.258,17.2518],[51.2593,17.2492],[51.2632,17.2444],[51.2643,17.2385],[51.2673,17.2427],[51.2697,17.2423],[51.2727,17.2263],[51.2742,17.2266],[51.2742,17.2255],[51.2749,17.224],[51.275,17.2232],[51.2751,17.214],[51.2747,17.2126],[51.272,17.2104],[51.2715,17.2089],[51.2708,17.2072],[51.2714,17.2051],[51.268,17.2019],[51.2676,17.2036],[51.2672,17.2038],[51.2666,17.2015],[51.2682,17.2009],[51.2691,17.1991],[51.2701,17.1984],[51.2715,17.1984],[51.2723,17.1981],[51.2743,17.1959],[51.2756,17.1946],[51.276,17.1915],[51.2766,17.19],[51.2754,17.1877],[51.276,17.187],[51.276,17.1862],[51.2759,17.1817],[51.2697,17.18],[51.2631,17.1796],[51.261,17.1789],[51.2601,17.1787],[51.2578,17.1783],[51.2547,17.1764],[51.2518,17.1784],[51.2521,17.1731],[51.2495,17.1728],[51.249,17.1752],[51.2451,17.1739],[51.2437,17.1734],[51.2451,17.1684],[51.2438,17.1605],[51.243,17.1586],[51.2397,17.1576],[51.2419,17.1454],[51.2441,17.1475],[51.2468,17.1416],[51.2515,17.1365],[51.2524,17.1337],[51.2544,17.1345],[51.2554,17.1255],[51.2515,17.1229],[51.2433,17.1189],[51.2444,17.1107],[51.2444,17.1104],[51.2453,17.0966],[51.2456,17.0924],[51.2412,17.0871],[51.2418,17.082],[51.234,17.0753],[51.2307,17.0773],[51.2291,17.0783],[51.2241,17.0813],[51.2245,17.0832],[51.2237,17.0868],[51.2226,17.0855],[51.2226,17.0833],[51.2207,17.0807],[51.2163,17.0859],[51.2138,17.0876],[51.2112,17.0878],[51.2087,17.0893],[51.2041,17.0901],[51.2013,17.0917],[51.1976,17.094],[51.1959,17.0939],[51.1947,17.093],[51.1948,17.0949],[51.194,17.0986],[51.1895,17.0979],[51.186,17.098],[51.1813,17.0991],[51.1797,17.0995],[51.1783,17.0998],[51.1758,17.1003],[51.1745,17.106],[51.1735,17.1091],[51.1767,17.1107],[51.1749,17.1128],[51.174,17.1138],[51.1738,17.1152],[51.1733,17.1166],[51.1722,17.1197],[51.1717,17.1215],[51.1714,17.1224],[51.1707,17.1248],[51.1719,17.125],[51.1729,17.1257],[51.1731,17.1278],[51.1736,17.1284],[51.1738,17.1287],[51.1746,17.1297],[51.1748,17.1294],[51.1754,17.1297],[51.1761,17.13],[51.1767,17.1302],[51.1789,17.131],[51.1799,17.1313],[51.1803,17.133],[51.1802,17.1343],[51.1801,17.1354],[51.1801,17.1356],[51.1801,17.1365],[51.1801,17.1388],[51.1801,17.1408],[51.1803,17.1425],[51.1793,17.1439],[51.1785,17.1447],[51.1772,17.151],[51.178,17.1519],[51.1783,17.1535],[51.1784,17.1546],[51.1783,17.1559],[51.1783,17.1569],[51.1778,17.1575],[51.1774,17.1572],[51.1755,17.156],[51.1743,17.1558],[51.172,17.1553],[51.1702,17.1551],[51.1693,17.1548],[51.1667,17.1541],[51.1649,17.1539],[51.1644,17.1539],[51.1632,17.154],[51.1622,17.1538],[51.1621,17.1546],[51.1607,17.1535],[51.1604,17.1531],[51.1598,17.1524],[51.155,17.1526],[51.154,17.1524],[51.1535,17.1526],[51.1531,17.1527],[51.152,17.1528],[51.1507,17.1526],[51.1491,17.1521],[51.1449,17.1509],[51.1356,17.1442],[51.1333,17.1425],[51.1332,17.1425],[51.1307,17.1407],[51.1313,17.1393],[51.128,17.1369],[51.1276,17.1378],[51.1267,17.139],[51.1262,17.1391],[51.1249,17.1411],[51.1249,17.1417],[51.124,17.1419],[51.1238,17.1426],[51.123,17.1441],[51.1228,17.1451],[51.1228,17.1457],[51.1225,17.1466],[51.1223,17.147],[51.1223,17.1476],[51.1226,17.1481],[51.1231,17.1486],[51.1233,17.1497],[51.1225,17.1504],[51.1224,17.1505],[51.1221,17.152],[51.1213,17.1524],[51.1199,17.155],[51.1191,17.1558],[51.119,17.1582],[51.1181,17.1607],[51.1173,17.1618],[51.1166,17.1632],[51.1162,17.1638],[51.1138,17.1649],[51.1134,17.1645],[51.1131,17.1644],[51.1128,17.1646],[51.1125,17.165],[51.1122,17.1655],[51.1124,17.1667],[51.1119,17.1678],[51.1118,17.1695],[51.1118,17.1699],[51.1117,17.1706],[51.1115,17.172],[51.1103,17.1727],[51.1096,17.1738],[51.1082,17.1745],[51.1071,17.1749],[51.1063,17.1758],[51.1058,17.1751],[51.1046,17.1741],[51.1032,17.1727],[51.1012,17.1705],[51.1004,17.1697],[51.0986,17.1707],[51.0981,17.1708],[51.0975,17.1716],[51.0972,17.1717],[51.0963,17.1716],[51.0954,17.1715],[51.0948,17.1718],[51.0934,17.1723],[51.0896,17.1744],[51.0887,17.1705],[51.0884,17.1706],[51.0883,17.1699],[51.089,17.1693],[51.0892,17.1682],[51.0896,17.168],[51.0905,17.1682],[51.0917,17.1683],[51.0936,17.1677],[51.0952,17.1659],[51.0952,17.1651],[51.0934,17.163],[51.0922,17.1628],[51.0914,17.1626],[51.0905,17.1624],[51.0899,17.1626],[51.0896,17.1616],[51.0889,17.1621],[51.0886,17.1598],[51.0879,17.1574],[51.0857,17.1543],[51.0849,17.1538],[51.0845,17.1536],[51.0837,17.1532],[51.0833,17.1526],[51.0824,17.148],[51.0824,17.1473],[51.0821,17.1448],[51.082,17.1443],[51.0819,17.1425],[51.0825,17.135],[51.0798,17.1324],[51.0828,17.1271],[51.0811,17.1251],[51.0824,17.1216],[51.0816,17.1204],[51.0815,17.1193],[51.081,17.1189],[51.0808,17.117],[51.0801,17.1166],[51.08,17.1146],[51.0793,17.1115],[51.0772,17.1104],[51.0755,17.1083],[51.0747,17.1093],[51.0739,17.1085],[51.0731,17.1069],[51.0721,17.107],[51.0717,17.1062],[51.0703,17.1049],[51.068,17.1039],[51.0672,17.1032],[51.0663,17.1007],[51.0651,17.1014],[51.0639,17.0989],[51.0637,17.0984],[51.0612,17.101],[51.0605,17.0983],[51.0594,17.0957],[51.0568,17.0985],[51.0555,17.1017],[51.0535,17.1033],[51.0528,17.1051],[51.0523,17.1059],[51.0508,17.1069],[51.0481,17.1045],[51.0466,17.1058],[51.0457,17.1043],[51.0453,17.1037],[51.0452,17.1034],[51.0452,17.0988],[51.0452,17.0984],[51.0455,17.0912],[51.0467,17.0854],[51.0482,17.0835],[51.0504,17.0786],[51.0537,17.0766],[51.054,17.0742],[51.0586,17.0719],[51.0588,17.0706],[51.0588,17.0695],[51.059,17.0653],[51.0553,17.0664],[51.0505,17.0657],[51.0502,17.0624],[51.0493,17.0616],[51.0488,17.0605],[51.0486,17.0601],[51.0478,17.0603],[51.0453,17.0609],[51.0461,17.0522],[51.0442,17.0508],[51.0469,17.0439],[51.0477,17.0422],[51.0489,17.0381],[51.049,17.0363],[51.0497,17.0341],[51.0496,17.0334],[51.0497,17.0322],[51.0499,17.0312],[51.0477,17.0303],[51.0439,17.0289],[51.0435,17.0288],[51.0431,17.0277],[51.0458,17.019],[51.0453,17.0188],[51.046,17.015],[51.0462,17.0118],[51.0465,17.0098],[51.0466,17.0098],[51.051,17.0101],[51.0545,17.0118],[51.0549,17.0099],[51.0557,17.0058],[51.0553,17.0052],[51.0523,17.0031],[51.0506,17.0015],[51.0503,17.0013],[51.0492,16.9998],[51.0508,16.9947],[51.0517,16.9925],[51.0519,16.9922],[51.0531,16.9926],[51.0542,16.9928],[51.0554,16.9926],[51.0558,16.9925],[51.057,16.9911],[51.0562,16.9903],[51.0552,16.9893],[51.055,16.9869],[51.0533,16.9867],[51.0534,16.9851],[51.0536,16.984],[51.0542,16.9815],[51.0545,16.9805],[51.0542,16.9797],[51.0545,16.9799],[51.0552,16.9794],[51.0545,16.9781],[51.053,16.9772],[51.0535,16.9759],[51.0546,16.9734],[51.0553,16.9718],[51.0559,16.9703],[51.0549,16.969],[51.0538,16.9676],[51.0532,16.9669],[51.0522,16.9658],[51.0507,16.965],[51.0506,16.9629],[51.0509,16.9622],[51.054,16.9591],[51.0557,16.9589],[51.0562,16.9585],[51.0575,16.9574],[51.0578,16.957],[51.058,16.9565],[51.0586,16.9553],[51.06,16.9552],[51.0609,16.9554],[51.0622,16.9557],[51.0645,16.9571],[51.0664,16.9577],[51.0674,16.9582],[51.068,16.9566],[51.0687,16.9537],[51.0689,16.9534],[51.0697,16.9535],[51.0702,16.9521],[51.0706,16.9507],[51.071,16.9494],[51.0715,16.9488],[51.0728,16.9475],[51.0735,16.9464],[51.0744,16.9431],[51.0745,16.9427],[51.0768,16.9394],[51.0795,16.9391],[51.0809,16.939],[51.0818,16.9381],[51.0822,16.9364],[51.0824,16.9285],[51.0824,16.9264],[51.0826,16.9221],[51.0827,16.9185],[51.0833,16.9196],[51.0892,16.9216],[51.0897,16.9216],[51.0913,16.9224],[51.0915,16.9218],[51.0924,16.9228],[51.0955,16.923],[51.0946,16.9143],[51.097,16.9144],[51.0968,16.9118],[51.0966,16.9107],[51.0962,16.9105],[51.0958,16.9096],[51.0951,16.9084],[51.095,16.9067],[51.095,16.8993],[51.0959,16.8919],[51.0964,16.8891],[51.0932,16.8886],[51.0944,16.8774],[51.0951,16.875],[51.0984,16.8651],[51.1004,16.8591],[51.1072,16.8541],[51.11,16.8565],[51.1124,16.8586],[51.1122,16.8572],[51.1112,16.8568],[51.111,16.8545],[51.1093,16.8519],[51.1101,16.8488],[51.1109,16.8449],[51.111,16.8445],[51.1104,16.8414],[51.1099,16.8394],[51.1099,16.8377],[51.1106,16.8358],[51.1112,16.8348],[51.1113,16.8334],[51.1105,16.8298],[51.1102,16.8258],[51.1087,16.8236],[51.1077,16.8239],[51.106,16.8194],[51.1047,16.8196],[51.1026,16.8218],[51.1027,16.8237],[51.1021,16.8244],[51.1004,16.8223],[51.1004,16.8202],[51.0946,16.8127],[51.093,16.809],[51.094,16.8039],[51.0977,16.7945],[51.1,16.7968],[51.0999,16.7938],[51.1013,16.7918],[51.1006,16.7891],[51.1022,16.7869],[51.1022,16.7841],[51.0998,16.7804],[51.0903,16.7655],[51.088,16.7618],[51.0883,16.7537],[51.0842,16.7536],[51.0774,16.7497],[51.0761,16.7611],[51.0766,16.763],[51.0756,16.7644],[51.0768,16.7681],[51.0755,16.7691],[51.0756,16.768],[51.0741,16.7672],[51.0734,16.7677],[51.0711,16.7668],[51.0694,16.764],[51.0653,16.7628],[51.0658,16.7613],[51.065,16.7605],[51.0641,16.7606],[51.0634,16.7618],[51.0587,16.762],[51.0547,16.7579],[51.0603,16.7446],[51.064,16.7384],[51.0644,16.7287],[51.0634,16.7248],[51.0614,16.721],[51.06,16.72],[51.0515,16.7161],[51.0491,16.714],[51.0476,16.714],[51.0454,16.7182],[51.0424,16.7203],[51.0413,16.7225],[51.0398,16.7206],[51.0378,16.7201],[51.037,16.7158],[51.0331,16.7109],[51.0322,16.7061],[51.0314,16.7052],[51.0322,16.7033],[51.0317,16.6893],[51.0301,16.6866],[51.0291,16.6852],[51.0233,16.6827],[51.0215,16.6833],[51.0186,16.6826],[51.0167,16.6843],[51.016,16.684],[51.0165,16.6801],[51.0159,16.6797],[51.0183,16.675],[51.0193,16.6659],[51.0192,16.6609],[51.0183,16.6585],[51.0128,16.6555],[51.0122,16.6582],[51.0101,16.6551],[51.0107,16.6521],[51.0083,16.6507],[51.0071,16.6462],[51.0072,16.6366],[51.0061,16.6325],[51.0077,16.6306],[51.0131,16.6212],[51.0097,16.608],[51.0087,16.6086],[51.0052,16.6071],[51.0015,16.6042],[51.0019,16.6028],[51.0011,16.6029],[51.0012,16.6047],[51.0001,16.6053],[50.9999,16.6065],[50.9984,16.6068],[50.9979,16.6089],[50.9968,16.6104],[50.9961,16.6103],[50.9952,16.6148],[50.9956,16.6156],[50.9947,16.616],[50.9945,16.6174],[50.9916,16.6179],[50.9911,16.6162],[50.9889,16.6152],[50.9815,16.63],[50.9804,16.6303],[50.9791,16.6271],[50.9802,16.6262],[50.9795,16.6151],[50.9747,16.617],[50.9744,16.6094],[50.9734,16.6054],[50.974,16.6054],[50.9751,16.6034],[50.9753,16.6014],[50.9787,16.6011],[50.9803,16.5968],[50.9794,16.5884],[50.9779,16.588],[50.978,16.5854],[50.9763,16.5839],[50.9755,16.5816],[50.9728,16.5846],[50.9705,16.5846],[50.969,16.5855],[50.9682,16.5871],[50.9676,16.5857],[50.9607,16.5906],[50.9582,16.5905],[50.957,16.5867],[50.956,16.5857],[50.9492,16.5843],[50.9498,16.5798],[50.9486,16.5794],[50.95,16.5772],[50.9514,16.5661],[50.9399,16.5714],[50.9397,16.5756],[50.9367,16.5747],[50.936,16.5794],[50.9374,16.5799],[50.937,16.5831],[50.935,16.5831],[50.9349,16.5818],[50.9343,16.583],[50.9346,16.5808],[50.9341,16.58],[50.9331,16.5812],[50.9328,16.5767],[50.9316,16.5764],[50.9302,16.5792],[50.9261,16.5766],[50.9233,16.5759],[50.923,16.5729],[50.9199,16.5758],[50.9191,16.581],[50.9178,16.5813],[50.9174,16.5905],[50.9159,16.591],[50.9157,16.5921],[50.9152,16.5921],[50.9194,16.6022],[50.9218,16.6013],[50.9239,16.6059],[50.9225,16.6167],[50.9279,16.6179],[50.9267,16.6264],[50.9238,16.6333],[50.9227,16.6427],[50.9228,16.6445],[50.9242,16.6451],[50.9243,16.6462],[50.924,16.6532],[50.9327,16.651],[50.9348,16.6733],[50.9356,16.674],[50.9379,16.6721],[50.9386,16.6789],[50.9394,16.6902],[50.9366,16.6924],[50.9342,16.6891],[50.9338,16.7003],[50.9319,16.7011],[50.9317,16.7003],[50.9299,16.7014],[50.9237,16.6914],[50.921,16.6798],[50.919,16.6768],[50.9169,16.6753],[50.9159,16.6762],[50.9177,16.6832],[50.9167,16.6898],[50.9121,16.6884],[50.9103,16.6871],[50.9081,16.6925],[50.9069,16.6922],[50.9068,16.691],[50.9029,16.6905],[50.9028,16.6934],[50.9001,16.6932],[50.8985,16.6956],[50.8984,16.6952],[50.8983,16.6944],[50.8981,16.6931],[50.8969,16.6933],[50.893,16.6915],[50.8921,16.6933],[50.8917,16.6939],[50.8915,16.6942],[50.8914,16.6946],[50.8894,16.6966],[50.8877,16.6911],[50.8891,16.6893],[50.8885,16.6872],[50.8896,16.6862],[50.8874,16.6811],[50.8853,16.6795],[50.8821,16.6769],[50.8819,16.674],[50.8784,16.6746],[50.8769,16.6735],[50.8768,16.6716],[50.8731,16.6745],[50.8716,16.6776],[50.865,16.676],[50.8531,16.6763],[50.852,16.6758],[50.8503,16.6776],[50.8498,16.6836],[50.8499,16.6858],[50.8436,16.6861],[50.8433,16.688],[50.8412,16.686],[50.8403,16.6873],[50.8411,16.6937],[50.8429,16.6968],[50.8435,16.6981],[50.8448,16.7012],[50.8448,16.7036],[50.8448,16.7072],[50.8406,16.7219],[50.8424,16.7268],[50.8362,16.7402],[50.8367,16.741],[50.8371,16.7427],[50.8405,16.7465],[50.8439,16.7537],[50.8452,16.7662],[50.8446,16.7751],[50.8428,16.775],[50.8408,16.7736],[50.8392,16.7743],[50.8381,16.7765],[50.8352,16.7816],[50.8334,16.7947],[50.8348,16.8059],[50.8323,16.8046],[50.8302,16.8051],[50.829,16.8064],[50.8273,16.8063],[50.8214,16.8041],[50.8211,16.8074],[50.8193,16.8129],[50.8195,16.817],[50.8186,16.819],[50.8201,16.824],[50.8223,16.8249],[50.8223,16.8229],[50.8242,16.8224],[50.8247,16.8235],[50.8255,16.8217],[50.8278,16.8202],[50.8277,16.8292],[50.8322,16.8283],[50.832,16.8309],[50.8338,16.8328],[50.8331,16.8495],[50.8304,16.8507],[50.832,16.8578],[50.8316,16.8684],[50.832,16.8762],[50.8288,16.8808],[50.8256,16.8796],[50.8232,16.8765],[50.8221,16.8766],[50.8211,16.8819],[50.8185,16.8873],[50.814,16.8896],[50.8098,16.8868],[50.8096,16.8888],[50.8112,16.892],[50.8112,16.898],[50.8121,16.8982],[50.8108,16.9051],[50.8116,16.9057],[50.8116,16.9099],[50.8138,16.9109],[50.8189,16.9031],[50.819,16.8983],[50.8238,16.8983],[50.8291,16.8994],[50.8257,16.9139],[50.8307,16.9172],[50.8311,16.9152],[50.8381,16.9228],[50.8398,16.9198],[50.8408,16.9207],[50.8432,16.916],[50.846,16.9205],[50.8541,16.9064],[50.8548,16.9023],[50.8574,16.9022],[50.8603,16.904],[50.864,16.9041],[50.8703,16.9015],[50.8714,16.9121],[50.8693,16.9185],[50.866,16.9232],[50.8655,16.9278],[50.8638,16.9334],[50.8649,16.9423],[50.8659,16.9423],[50.8667,16.9446],[50.8681,16.945],[50.8698,16.9473],[50.8713,16.9451],[50.8747,16.9429],[50.876,16.9444],[50.8778,16.9448],[50.8808,16.9495],[50.8831,16.9513],[50.8849,16.9513],[50.885,16.9571],[50.8855,16.9575],[50.8898,16.9549],[50.8915,16.9515],[50.9022,16.9572],[50.9044,16.9591],[50.9051,16.9672],[50.9,16.9764],[50.9017,16.9765],[50.9074,16.9797],[50.9073,16.977],[50.9081,16.9753],[50.9112,16.9771],[50.9135,16.9797],[50.9108,16.981],[50.9112,16.9832],[50.913,16.9874],[50.9142,16.9882],[50.9141,16.9888],[50.9155,16.9894],[50.913,16.9927],[50.909,16.9937],[50.907,16.997],[50.9087,16.9983],[50.9097,16.9982],[50.9095,16.9998],[50.9109,17.0008],[50.9115,17.0027],[50.9173,17.0035],[50.9206,17.0116],[50.9171,17.0173],[50.9154,17.018],[50.9098,17.0179],[50.9098,17.0196],[50.9087,17.0216],[50.9095,17.0268],[50.9084,17.0324],[50.9166,17.0375],[50.9197,17.0414],[50.917,17.0515],[50.9046,17.0557],[50.9031,17.0693],[50.9049,17.0726],[50.9056,17.0763],[50.9039,17.0808],[50.9037,17.0834],[50.9072,17.0824],[50.9101,17.0768],[50.9118,17.0762],[50.9143,17.0772],[50.918,17.0757],[50.9221,17.0757],[50.923,17.0781],[50.9261,17.0798],[50.9242,17.0893],[50.9226,17.1049],[50.9196,17.1107],[50.9244,17.1113],[50.9251,17.1101],[50.9289,17.1125],[50.9286,17.1144],[50.9316,17.1149],[50.933,17.1143],[50.9361,17.1143],[50.9374,17.1153],[50.9374,17.1128],[50.9382,17.1117],[50.9388,17.1076],[50.9418,17.1079],[50.9438,17.1043],[50.9477,17.1036],[50.9507,17.1047],[50.9522,17.1068],[50.9565,17.1094],[50.9616,17.115],[50.9597,17.1277],[50.957,17.1402],[50.9593,17.1397],[50.9647,17.1366],[50.9649,17.1449],[50.9674,17.1603],[50.9684,17.1604],[50.9704,17.1629],[50.9815,17.1629],[50.9843,17.1667],[50.9872,17.1692],[50.9893,17.168],[50.9951,17.1788],[51.008,17.1979],[51.0054,17.216],[51.0102,17.2311],[51.0141,17.2445],[51.0156,17.2496],[51.029,17.2615],[51.021,17.2754],[51.0162,17.285],[51.0149,17.2883],[51.0155,17.2887],[51.0162,17.2903],[51.0164,17.2906],[51.0168,17.2906],[51.0177,17.2908],[51.018,17.2918],[51.0183,17.2927],[51.019,17.293],[51.0209,17.2934],[51.0229,17.2936],[51.0229,17.2933],[51.0236,17.2927],[51.0234,17.291],[51.0293,17.2805],[51.0317,17.2818],[51.0327,17.2824],[51.0391,17.2946],[51.0465,17.2776],[51.0512,17.2711],[51.0523,17.2714],[51.0568,17.2893],[51.0613,17.2943],[51.0657,17.2993],[51.066,17.3041],[51.0644,17.3211],[51.0787,17.329],[51.0897,17.3422],[51.0923,17.3572],[51.1024,17.3755]]] }},
]};

console.log(statesData);

var statesData = {"type":"FeatureCollection","features":[]};

<?php
$counties = array(
  'type' => 'FeatureCollection',
  'features' => array()
);
$args = array(
  'post_type' => 'regionalizmy_county',
  'posts_per_page' => 20,
  'meta_query' => array(
      array(
        'key' => 'koordynaty',
        'compare' => 'EXISTS'
      )
    )
);
$myQuery = new WP_Query($args);
$counter = 1;
while($myQuery->have_posts()): $myQuery->the_post();
  $coordinates = get_field('koordynaty');
  if(!$coordinates){
    continue;
  }

  // $newCoordinates = array();
  // $v0 = json_decode($coordinates);
  // if($v0){
  //   $array1 = array();
  //   foreach($v0 as $v1){
  //                 if(is_array($v1)){
  //                   $array2 = array_reverse($v1);
  //                   // foreach($v1 as $v2){
  //                   //   print_r($v2); exit;
  //                   //               // if(is_array($v2)){
  //                   //                 $array3 = array_reverse($v2);
                                    
  //                   //               // }
  //                   //   $array2[] = $array3;
  //                   // }
  //                 }
  //     $array1[] = $array2;
  //   }


  //   $newCoordinates = json_encode($array1);
  // }

  // print_r($newCoordinates); exit;
  var_dump(substr(trim($coordinates), 0, 4)); exit;
?>
    statesData.features.push({
      'type': 'Feature',
      // 'id': <?= get_the_ID(); ?>,
      'id': '<?= $counter++; ?>',
      'properties': {'name': '<?= get_the_title(); ?>', 'density': <?= intval(rand(1, 100)); ?>},
      'geometry': {
        'type': '<?= (substr(trim($coordinates), 0, 4) == '[[[[')?'MultiPolygon':'Polygon'; ?>',
        'coordinates': [<?= $coordinates; ?>]
      }
    });
<?php
endwhile; wp_reset_postdata();
?>

console.log(statesData);


var map = L.map('rgm-map').setView([51.759445, 19.457216], 7);

L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
  maxZoom: 18,
  attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
    '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
    'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
  id: 'mapbox/light-v9',
  tileSize: 512,
  zoomOffset: -1
}).addTo(map);


// control that shows state info on hover
var info = L.control();

info.onAdd = function (map) {
  this._div = L.DomUtil.create('div', 'info');
  this.update();
  return this._div;
};

info.update = function (props) {
  this._div.innerHTML = '<h4>US Population Density</h4>' +  (props ?
    '<b>' + props.name + '</b><br />' + props.density + ' people / mi<sup>2</sup>'
    : 'Hover over a state');
};

info.addTo(map);


// get color depending on population density value
function getColor(d) {
  return d > 1000 ? '#800026' :
      d > 500  ? '#BD0026' :
      d > 200  ? '#E31A1C' :
      d > 100  ? '#FC4E2A' :
      d > 50   ? '#FD8D3C' :
      d > 20   ? '#FEB24C' :
      d > 10   ? '#FED976' :
            '#FFEDA0';
}

function style(feature) {
  return {
    weight: 2,
    opacity: 1,
    color: 'white',
    dashArray: '3',
    fillOpacity: 0.7,
    fillColor: getColor(feature.properties.density)
  };
}

function highlightFeature(e) {
  var layer = e.target;

  layer.setStyle({
    weight: 5,
    color: '#666',
    dashArray: '',
    fillOpacity: 0.7
  });

  if (!L.Browser.ie && !L.Browser.opera && !L.Browser.edge) {
    layer.bringToFront();
  }

  info.update(layer.feature.properties);
}

var geojson;

function resetHighlight(e) {
  geojson.resetStyle(e.target);
  info.update();
}

function zoomToFeature(e) {
  map.fitBounds(e.target.getBounds());
}

function onEachFeature(feature, layer) {
  layer.on({
    mouseover: highlightFeature,
    mouseout: resetHighlight,
    click: zoomToFeature
  });
}

geojson = L.geoJson(statesData, {
  style: style,
  onEachFeature: onEachFeature
}).addTo(map);

map.attributionControl.addAttribution('Population data &copy; <a href="http://census.gov/">US Census Bureau</a>');


var legend = L.control({position: 'bottomright'});

legend.onAdd = function (map) {

  var div = L.DomUtil.create('div', 'info legend'),
    grades = [0, 10, 20, 50, 100, 200, 500, 1000],
    labels = [],
    from, to;

  for (var i = 0; i < grades.length; i++) {
    from = grades[i];
    to = grades[i + 1];

    labels.push(
      '<i style="background:' + getColor(from + 1) + '"></i> ' +
      from + (to ? '&ndash;' + to : '+'));
  }

  div.innerHTML = labels.join('<br>');
  return div;
};

legend.addTo(map);

</script>