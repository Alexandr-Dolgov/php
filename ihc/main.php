<html>

<head>
    <title>ihc homework</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>

<?php
//------------------------------------PID (из jps)
$lines = file('syspass.txt');
$pass = trim($lines[0]);

$output = array();
$returnVar = 0;
$res = exec("echo '$pass' | sudo -u root -S jps -v | grep '\\-DpanelName=' | cut -d ' ' -f1 2>&1", $output, $returnVar);

$jpsPid = ($returnVar == 0 && $res != "") ? $res : "panel not found from jps";
echo "<p>JPS PID: $jpsPid</p>";

//------------------------------------запрос текущей версии /info/version
$PANEL_URL = 'http://localhost:8080/panel';

$output = array();
$returnVar = 0;
$res = exec("curl --silent '$PANEL_URL/info/version' 2>&1", $output, $returnVar);

$infoVersion = ($returnVar == 0 && $res != "") ? $res : "not found";
echo "<p>/info/version: $infoVersion</p>";

//------------------------------------Лог перезапусков из файла bash-скрипта
echo "<p>Лог перезапусков из файла bash-скрипта:</p>";

$restartLog = file_get_contents('/home/user9/lessons/bash/log', true);
echo "<pre>$restartLog</pre>";

//------------------------------------Список логов jetty

//Список логов jetty
//Запуск и отображение результата perl-скрипта на выбранном файле с логом

/*
 * Файл лога jetty довать выбрать пользователю,
 * т.е. доставать все имена файлов из жестко указанной папки,
 * и для выбранного файла запускать перл скрипт
 * и результаты перл скрипта показывать пользователю
 */

$dir = '/home/user9/lessons/perl/jettylogs/';
$files = scandir($dir);

echo "<form method='post' action='perl.php'>";
echo "<select name='jettyLogFile'>";
for ($i = 0; $i < count($files); $i++) {
    echo "<option>$dir$files[$i]</option>";
}
echo "</select>";
echo "<input type='submit' name='send' value='получить уникальные стектрейсы'>";
echo "</form>";

echo "";
?>

</body>

</html>