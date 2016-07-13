<html>

<head>
    <title>ihc homework</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>

<?php
$actualLogin = $_POST["login"];
$actualPassword = $_POST["password"];

$lines = file('pass.txt');
$expectedLogin = trim($lines[0]);
$expectedPassword = trim($lines[1]);

echo "{$actualLogin} actualLogin <br>";
echo "{$expectedLogin} expectedLogin <br>";
echo "{$actualPassword} actualPassword <br>";
echo "{$expectedPassword} expectedPassword <br>";

if ((strcmp($actualLogin, $expectedLogin) == 0) and (strcmp($actualPassword, $expectedPassword) == 0)) {
    echo "верно";
    //нужно открыть страницу с инфой
} else {
    echo '<script type="text/javascript">',
        'window.location.replace("http://localhost/");',
        'window.alert("логин/пароль неверные, попробуйте ещё раз");',
        '</script>';
}
?>

</body>

</html>