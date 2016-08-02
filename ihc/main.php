<html>

<head>
    <title>ihc homework</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>

main page

<?php
$lines = file('syspass.txt');
$pass = trim($lines[0]);

$output = array();
$returnVar = 0;
$res = exec("echo '$pass' | sudo -u root -S jps -v 2>&1", $output, $returnVar);

echo "";
?>



</body>

</html>