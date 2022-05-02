<?php
session_start();
require(dirname(__FILE__) . "../../dbconnect.php");
// ログイン機能
if (isset($_SESSION['admin_id']) && $_SESSION['time'] + 60 * 60 * 24 > time()) {
    $_SESSION['time'] = time();
} else {
    header('Location: http://' . $_SERVER['HTTP_HOST'] . '/admin/login.php');
    exit();
}

$stmt = $db->query('SELECT * FROM customers');
$customers = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>応募者一覧</title>
</head>

<body>
    <ul>
        <?php foreach ($customers as $key => $customer) : ?>
            <li>
                <?= $customer["id"]; ?>
                <?= $customer["name"]; ?>
                <?= $customer["name_kana"]; ?>
                <?= $customer["sex"]; ?>
                <?= $customer["birth"]; ?>
                <?= $customer["address"]; ?>
                <?= $customer["email"]; ?>
                <?= $customer["phone_number"]; ?>
                <?= $customer["education"]; ?>
                <?= $customer["major"]; ?>
                <?= $customer["department"]; ?>
                <?= $customer["major_subject"]; ?>
                <?= $customer["comments"]; ?>
            </li>
        <?php endforeach; ?>
    </ul>
    <a href="logout.php">ログアウト</a>
</body>

</html>