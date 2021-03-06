<?php

require(__DIR__ . "/../cron.php");

ini_set('display_errors', 'On');
date_default_timezone_set('Asia/Shanghai');
error_reporting(E_ALL | E_STRICT);


// 百家赔率比赛ID
$match_ids = [1523407, 518421, 518420, 518422, 518423, 518424, 518425, 518426, 518427, 518428, 518429, 1510776, 518418, 518419, 521751, 510185, 518619, 518624, 518620, 518621, 518622, 518626, 518623, 512250, 1501434, 1310379, 1310376, 1489727, 1501430, 1501427, 1501428, 1511320, 1514772, 1310173, 1490985, 518388, 518633, 518990, 518065, 517974, 1512213, 1523459, 1516630, 1501429, 517912, 518393, 510180, 1523463, 1520289, 1197546, 1520285, 1197510, 1519313, 1523468, 1506929, 1519156, 1521081, 511329, 1501348, 517981, 1522288, 518549, 518550, 1501431, 1501432, 1510013, 518632, 1486600, 1514488, 1522745, 1511307, 1497427, 517902, 1517334, 1310174, 1521080, 1521083, 1521084, 517991, 518083, 518387, 518389, 1521082, 1508114, 518381, 1509023, 1509024, 1519155, 518988, 518991, 518994, 1509953, 518672, 518667, 518671, 518664, 518669, 518668, 518773, 518778, 518770, 1519151, 518563, 1516870, 518401, 518560, 1197516, 1523473, 1523467, 1523472, 569163, 573028, 1519261, 518398];

// 篮球当前赛季ID
$lanqiu_season_id = [2709, 8389, 8403, 8416, 8430, 8441, 8454, 8467, 8480, 8491, 8499, 8512, 8525, 8538, 8541, 8553, 8559, 8570, 8583, 8596, 8608, 8613, 8616, 8619, 8622, 10883, 8649, 8659, 8670, 8682, 8693, 8704, 8718, 8724, 8731, 8734, 8740, 8747, 8758, 8768, 8778, 8793, 8808, 8820, 8826, 8837, 8848, 8859, 8870, 8881, 8892, 8898, 8908, 8918, 8924, 8930, 8931, 8937, 8940, 8944, 10819, 8966, 10820, 8980, 8987, 8991, 9003, 9007, 9011, 9021, 9033, 9046, 9053, 9063, 9073, 9084, 9097, 9104, 9114, 9123, 9136, 9144, 9150, 9162, 9171, 9182, 9191, 9197, 9206, 9219, 9228, 9238, 9251, 9262, 9276, 9283, 10707, 9305, 9316, 9325, 9330, 9333, 9336, 9341, 9350, 9358, 9362, 9372, 9380, 9390, 9398, 9410, 9419, 9430, 9437, 9443, 9447, 9451, 9455, 9465, 9467, 9468, 9478, 9491, 9501, 9512, 9523, 9528, 9531, 9539, 9547, 9554, 9560, 9566, 9577, 10725, 9599, 9600, 9601, 9602, 9603, 9604, 9612, 9619, 9621, 9627, 9628, 9629, 9634, 9637, 9640, 9644, 9656, 9658, 9660, 10657, 9675, 9678, 9681, 9685, 9698, 9699, 9713, 9722, 9724, 9726, 9727, 9739, 9750, 9752, 9754, 9755, 9759, 9760, 9771, 9783, 9796, 9799, 9804, 9808, 9809, 9810, 9821, 9831, 9842, 9850, 9860, 9871, 10723, 9892, 10810, 9904, 9905, 9910, 9915, 9923, 9924, 9927, 9929, 9931, 9933, 9945, 9954, 9964, 9972, 9977, 9981, 9986, 9992, 9997, 10002, 10007, 10014, 10019, 10026, 10030, 10036, 10037, 10040, 10048, 10057, 10068, 10073, 10082, 10091, 10097, 10100, 10103, 10105, 10110, 10116, 10119, 10120, 10121, 10122, 10126, 10130, 10131, 10132, 10133, 10134, 10138, 10143, 10144, 10146, 10148, 10151, 10155, 10157, 10164, 10166, 10169, 10171, 10174, 10177, 10178, 10182, 10190, 10194, 10195, 10198, 10201, 10204, 10205, 10213, 10219, 10225, 10226, 10231, 10677, 10239, 10245, 10250, 10251, 10252, 10253, 10255, 10261, 10263, 10267, 10271, 10275, 10279, 10283, 10287, 10291, 10292, 10294, 10297, 10299, 10300, 10302, 10303, 10304, 10305, 10306, 10708, 10709, 10695, 10694, 10315, 10316, 10318, 10320, 10321, 10323, 10325, 10563, 10327, 10328, 10384, 10743, 10746, 10829, 10830, 10877, 10876];

// var_dump($match_ids);
$zip = new ZipArchive();

$lanqiu_match_ids = [];

$filePath = __DIR__ . '/result';
$historyPath = $filePath . '/history';

$data = file_get_contents('/Applications/MAMP/htdocs/haoliao/backend-api/cron/threedata/result/历史数据.json');
$data = json_decode($data);

$string = '"matchs"';

foreach ($data as $one) {
    list($name, $ext) = explode('.', basename($one->path));
    list($id, $season_id, $time) = explode('_', $name);

    if (in_array($season_id, $lanqiu_season_id)) {
        $zipfile = $historyPath . '/' . $name . '.zip';
        $txtfile = $historyPath . '/' . $name . '.txt';

        if (!file_exists($txtfile)) {
            if (!file_exists($zipfile)) {
                file_put_contents($zipfile, fopen($one->path, 'r'));
                echo $zipfile . "   已下载\n";
            }

            if ($zip->open($zipfile) === true) {
                $zip->extractTo($historyPath);
                rename($historyPath . '/data.txt', $txtfile);
                echo $zipfile . "解压成功\n";
            } else {
                throw new Exception($zipfile . '解压失败');
            }
        }
        $dataFile = fopen($txtfile, 'r');

        while (!feof($dataFile)) {
            $substr = fgets($dataFile, 1000);
            $isHas = strpos($substr, $string);

            if ($isHas) {
                $pos = ftell($dataFile) - strlen($substr) + $isHas;
                $start = $pos + strlen($string) + 2;
                fseek($dataFile, $start);
                $a = 0;
                $b = 1;
                $matchInfo = '';
                while ($a < 1) {
                    $c = fgetc($dataFile);
                    if ($c === '[') {
                        $a--;
                    }
                    if ($c === ']') {
                        $a++;
                    }
                    $matchInfo .= $c;
                    if ($c === '{') {
                        $b--;
                    }
                    if ($c === '}') {
                        $b++;
                    }
                    if ($b >= 1){
                        $info = json_decode($matchInfo);
                        if (empty($info)) {
                            break;
                        }
                        if (in_array($info->id, $match_ids)) {
                            echo $info->id . "\n";
                            file_put_contents($filePath . '/match.json', $matchInfo . "\n", FILE_APPEND);
                        }
                        $matchInfo = '';
                        $b = 1;
                        fgetc($dataFile);
                    }
                    if ($a >= 1) {
                        $end = ftell($dataFile);
                    }
                }
                break;
            }
        }

        fclose($dataFile);
        echo $zipfile . "读取完成\n";
    }
}
