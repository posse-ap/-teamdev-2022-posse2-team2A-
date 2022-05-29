<?php
require(dirname(__FILE__) . "../../dbconnect.php");

$stmt = $db->prepare("DELETE FROM apply_agents WHERE id = :id");
// (4) 登録するデータをセット
$stmt->bindParam(':id', $_POST['id'], PDO::PARAM_INT);
// (5) SQL実行
$stmt->execute();

header('Location:index.php');
