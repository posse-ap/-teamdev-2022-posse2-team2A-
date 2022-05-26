<?php
require_once '../dbconnect.php';


$sql = 'SELECT * FROM images WHERE image_id = :image_id LIMIT 1';
$stmt = $db->prepare($sql);
$stmt->bindValue(':image_id', (int)$_GET['id'], PDO::PARAM_INT);
$stmt->execute();
$image = $stmt->fetch();

header('Content-type: ' . $image['image_type']);
echo $image['image_content'];
exit();
