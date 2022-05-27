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
// agent_id取得
$data = explode(",", $_SERVER['QUERY_STRING']);

// 許可する拡張子
$allow = array('jpeg', 'jpg', 'png');

if (isset($_POST['upload'])) { //送信ボタンが押された場合
    $image =  $_POST['agent_id']; //ファイル名
    $image .= '.' . substr(strrchr($_FILES['image']['name'], '.'), 1); //アップロードされたファイルの拡張子を取得
    $file_name = substr(strrchr($_FILES['image']['name'], '.'), 1);
    $file = "images/$image";
    if (!empty($_FILES['image']['name'])) { //ファイルが選択されていれば$imageにファイル名を代入
        if (in_array($file_name, $allow) == true) { //画像ファイルかのチェック
            move_uploaded_file($_FILES['image']['tmp_name'], './images/' . $image); //imagesディレクトリにファイル保存

            $sql = "INSERT INTO images(name) VALUES (:image)";
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':image', $image, PDO::PARAM_STR);
            $stmt->execute();
            $stmt = $db->prepare('INSERT INTO agent_contents SET 
            agent_id=?,
            agent_name =?,
            special_feature=?,
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
                $_POST['agent_id'],
                $_POST['agent_name'],
                $_POST['special_feature'],
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

            header('Location:index.php');
            $alert = "<script type='text/javascript'>alert('画像をアップロードしました');</script>";
            echo $alert;
        } else {
            $alert = "<script type='text/javascript'>alert('画像はpng jpg jpegにしてください');</script>";
            echo $alert;
        }
    }
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
        <form action="/admin/add_agents.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" value=<?= $data[0]; ?> name="agent_id">
            <p> 企業名：<input type="text" name="agent_name" required></p>
            <p> 企業画像：<input type="file" name="image" required></p>
            <p> 推しポイント：<input type="text" name="special_feature" required></p>
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
            <p><input type="submit" value="企業を追加する" name="upload"></p>
        </form>
    </section>
</body>

</html>