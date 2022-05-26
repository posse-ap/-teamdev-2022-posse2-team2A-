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



if (!empty($_POST)) {
    $stmt = $db->prepare('INSERT INTO agent_contents SET 
    agent_name =?,
    feature1 =?,
    feature2 =?,
    feature3 =?,
    feature4 =?,
    feature5 =?,
    recruitment_number =?,
    private_recruitment_number =?,
    target_age =?,
    area =?,
    pr_point =?
    ');
    $stmt->execute(array(
        $_POST['agent_name'],
        $_POST['feature1'],
        $_POST['feature2'],
        $_POST['feature3'],
        $_POST['feature4'],
        $_POST['feature5'],
        $_POST['recruitment_number'],
        $_POST['private_recruitment_number'],
        $_POST['target_age'],
        $_POST['area'],
        $_POST['pr_point']
    ));
    header('Location: http://' . $_SERVER['HTTP_HOST'] . '/admin/index.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>企業情報追加</title>
</head>

<body>
    <section>
        <h1>企業情報追加</h1>
        <form action="/admin/upload.php" method="POST" enctype="multipart/form-data">
            <p> 企業名：<input type="text" name="agent_name" required></p>
            <p> 企業画像：<input type="file" name="image" required></p>
            <p> 特徴：<input type="text" name="feature1" required></p>
            <p> 特徴：<input type="text" name="feature2" required></p>
            <p> 特徴：<input type="text" name="feature3" required></p>
            <p> 特徴：<input type="text" name="feature4" required></p>
            <p> 特徴：<input type="text" name="feature5" required></p>
            <p>求人数：<input type="number" name="recruitment_number"></p>
            <p>非公開求人数：<input type="number" name="private_recruitment_number"></p>
            <p> 対象年代：<input type="number" name="target_age" required></p>
            <p> エリア：<input type="text" name="area" required></p>
            <p> PRポイント：<textarea rows="9" cols="80" name="pr_point" required></textarea></p>
            <p><input type="submit" value="企業を追加する"></p>
        </form>
    </section>
</body>

</html>