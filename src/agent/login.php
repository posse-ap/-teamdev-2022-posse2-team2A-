<?php
session_start();
require('../dbconnect.php');

if (!empty($_POST)) {
    $login = $db->prepare('SELECT * FROM agents WHERE email=? AND password=?');
    $login->execute(array(
        $_POST['email'],
        sha1($_POST['password'])
    ));
    $user = $login->fetch();

    if ($user) {
        $_SESSION = array();
        $_SESSION['agent_id'] = $user['id'];
        $_SESSION['time'] = time();
        header('Location: http://' . $_SERVER['HTTP_HOST'] . '/agent/index.php');
        exit();
    } else {
        $error = 'fail';
    }
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>企業ログイン</title>
</head>

<body>
    <div>
        <h1>企業ログイン</h1>
        <form action="/agent/login.php" method="POST">
            <p>メールアドレス：<input type="email" name="email" required></p>
            <p>パスワード：<input type="password" required name="password"></p>
            <input type="submit" value="ログイン">
        </form>
        <a href="/agent/password_reset/show_request_form.php">パスワードを忘れた方へ</a>
    </div>
</body>

</html>