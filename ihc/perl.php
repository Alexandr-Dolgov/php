<html>

<head>
    <title>ihc homework</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>

<?php
$lines = file('syspass.txt');
$pass = trim($lines[0]);

$pathToJettyLogFile = trim($_POST["jettyLogFile"]);

$output = array();
$returnVar = 0;
//todo fix it
$res = exec("echo '$pass' | sudo -u root -S /usr/bin/perl /home/user9/lessons/perl/hello.pl $pathToJettyLogFile 2>&1", $output, $returnVar);

$preparedJettyLog = file_get_contents('/home/user9/lessons/perl/res.txt');
echo "<pre>$preparedJettyLog</pre>";
?>

</body>

</html>
