<?php

// セッション開始
session_start();
// セッション変数を全て削除
$_SESSION = array();
// セッションクッキーを削除
if (isset($_COOKIE["PHPSESSID"])) {
    setcookie("PHPSESSID", '', time() - 1800, '/');
}
// セッションの登録データを削除
session_destroy();
header('Location: http://' . $_SERVER['HTTP_HOST'] . '/agent/index.php');
        exit();

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Test</title>

</head>

<body>
</body>

</html>