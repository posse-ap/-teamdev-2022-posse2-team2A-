<?php
require_once("../dbconnect.php");
$allow = array('jpeg', 'jpg', 'png');

if (isset($_POST['upload'])) { //送信ボタンが押された場合
    $image = 1; //ファイル名
    $image .= '.' . substr(strrchr($_FILES['image']['name'], '.'), 1); //アップロードされたファイルの拡張子を取得
    $file_name = substr(strrchr($_FILES['image']['name'], '.'), 1);
    $file = "images/$image";
    if (!empty($_FILES['image']['name'])) { //ファイルが選択されていれば$imageにファイル名を代入
        if (in_array($file_name, $allow) == true) { //画像ファイルかのチェック
            move_uploaded_file($_FILES['image']['tmp_name'], './images/' . $image); //imagesディレクトリにファイル保存

            $sql = "INSERT INTO images(name) VALUES (:image)";
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':image', $image, PDO::PARAM_STR);

            $message = '画像をアップロードしました';
            $stmt->execute();
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



            header('Location:add_agents.php');
        } else {
            $message = '画像ファイルではありません';
        }
    }
}
