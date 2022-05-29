<?php
session_start();
require(dirname(__FILE__) . "../../dbconnect.php");
// ログイン機能
if (isset($_SESSION['agent_id']) && $_SESSION['time'] + 60 * 60 * 24 > time()) {
    $_SESSION['time'] = time();
} else {
    header('Location: http://' . $_SERVER['HTTP_HOST'] . '/admin/login.php');
    exit();
}

$agent_id = $_SESSION['agent_id'];

$stmt = $db->prepare('SELECT * FROM agents where id = ' . $agent_id);
$stmt->execute();
$agent_info = $stmt->fetch();


if (!empty($_POST)) {
    $stmt = $db->prepare(
        'UPDATE agents SET 
    pic_name =?,
    pic_name_kana =?,
    department_name =?,
    email =?,
    phone_number =?
    WHERE id = ' . $agent_id
    );
    $stmt->execute(array(
        $_POST['pic_name'],
        $_POST['pic_name_kana'],
        $_POST['department_name'],
        $_POST['email'],
        $_POST['phone_number']
    ));
    header('Location: /agent/manager_info.php');
}
