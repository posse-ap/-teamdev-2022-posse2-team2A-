<?php
session_start();
require('../dbconnect.php');
if (isset($_SESSION['agent_id']) && $_SESSION['time'] + 60 * 60 * 24 > time()) {
    $_SESSION['time'] = time();
} else {
    header('Location: http://' . $_SERVER['HTTP_HOST'] . '/agent/login.php');
    exit();
}
$agent_id = $_SESSION['agent_id'];
$agent = $db->prepare('SELECT * FROM customers WHERE agent_id = ?');
    $agent->execute(array($agent_id));
    $agent_customers = $agent->fetchAll();
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
        <h1>企業ページ</h1>
        <?php 
        foreach($agent_customers as $customer){
            print $customer['name']."<br>";
        }
        ?>
    </div>

</body>

</html>