<?php
require_once('../dbconnect.php');

$sql = "SELECT * FROM images WHERE id = :id";
$stmt = $db->prepare($sql);
$stmt->bindValue(':id', $id);
$stmt->execute();
$image = $stmt->fetch();
?>

<h1>画像表示</h1>
<img src="images/<?php echo $image['name']; ?>" width="300" height="300">
<a href="upload.php">画像アップロード</a>