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
            header('Location:index.php');
            unlink('./images/' . $_POST['agent_id'] . '.png');
            unlink('./images/' . $_POST['agent_id'] . '.jpg');
            unlink('./images/' . $_POST['agent_id'] . '.jpeg');
            move_uploaded_file($_FILES['image']['tmp_name'], './images/' . $image); //imagesディレクトリにファイル保存
            $sql = 'UPDATE  images SET name=:image WHERE id =:id';
            $stmt = $db->prepare($sql);
            $stmt->execute(
                array(
                    ':image' => $image,
                    ':id' => $_POST['agent_id'],
                )
            );
            $stmt = $db->prepare('UPDATE agent_contents SET 
            agent_id=:agent_id,
            agent_name = :agent_name,
            special_feature= :special_feature,
            feature1 = :feature1,
            feature2 = :feature2,
            feature3 = :feature3,
            feature4 = :feature4,
            feature5 = :feature5,
            recruitment_number = :recruitment_number,
            private_recruitment_number = :private_recruitment_number,
            target_age = :target_age,
            area = :area,
            pr_point = :pr_point
            WHERE agent_id=:agent_id
            ');
            $stmt->execute(array(
                ':agent_id' => $_POST['agent_id'],
                ':agent_name' => $_POST['agent_name'],
                ':special_feature' => $_POST['special_feature'],
                ':feature1' => $_POST['feature1'],
                ':feature2' => $_POST['feature2'],
                ':feature3' => $_POST['feature3'],
                ':feature4' => $_POST['feature4'],
                ':feature5' => $_POST['feature5'],
                ':recruitment_number' => $_POST['recruitment_number'],
                ':private_recruitment_number' => $_POST['private_recruitment_number'],
                ':target_age' => $_POST['target_age'],
                ':area' => $_POST['area'],
                ':pr_point' => $_POST['pr_point'],
                ':agent_id' => $_POST['agent_id']
            ));
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
    <link rel="stylesheet" href="../user/style.css">
    <link rel="stylesheet" href="../user/reset.css">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <title>企業情報変更</title>
</head>

<body class="mt-20 p-2">
<?php
    $stmt = $db->query('SELECT *FROM agent_contents WHERE id =' . $data[0]);
    $agent_contents = $stmt->fetchAll(); ?>

    <section class="w-4/5 ml-auto mr-auto mt-0 mb-10">
        <h1 class="text-4xl">企業情報変更</h1>
        <form class="agent-list-item mt-8 pt-4 pl-8 pr-8 pb-8 rounded border-solid border-2" action="/admin/change_agents.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" value=<?= $data[0]; ?> name="agent_id">
            <div class="text-wrapper">
                <p class="">企業名：<input class="rounded border-solid border-2 m-2" type="text" name="agent_name" placeholder="企業名" required value="<?= $agent_contents[0]['agent_name'] ?>"></p>
                <p class=""> 推しポイント：<input class="rounded border-solid border-2 m-2" type="text" name="special_feature" required value="<?= $agent_contents[0]['special_feature'] ?>"></p>
            </div>
            <div class="agent-pr-wrapper">
                <div class="flex flex-col">
                    企業画像：
                    <img class="block w-60 h-56  object-contain" id="preview" src="" alt="ここにプレビューを表示します">
                    <p><input type="file" name="image" onchange="previewFile(this);" required></p>
                </div>

                <ul class="agent-pr-list">
                    <li class="agent-pr-item"> 特徴：<input class="rounded border-solid border-2 m-2" type="text" name="feature1" required value="<?= $agent_contents[0]['feature1'] ?>"></li>
                    <li class="agent-pr-item"> 特徴：<input class="rounded border-solid border-2 m-2" type="text" name="feature1" required value="<?= $agent_contents[0]['feature2'] ?>"></li>
                    <li class="agent-pr-item"> 特徴：<input class="rounded border-solid border-2 m-2" type="text" name="feature2" required value="<?= $agent_contents[0]['feature3'] ?>"></li>
                    <li class="agent-pr-item"> 特徴：<input class="rounded border-solid border-2 m-2" type="text" name="feature3" required value="<?= $agent_contents[0]['feature4'] ?>"></li>
                    <li class="agent-pr-item"> 特徴：<input class="rounded border-solid border-2 m-2" type="text" name="feature4" required value="<?= $agent_contents[0]['feature5'] ?>"></li>
                </ul>
            </div>
            <table class="agent-info-table mt-4 mb-4">
                <tbody>
                    <tr>
                        <th>求人数</th>
                        <th>非公開求人数</th>
                        <th>対象年代</th>
                        <th>エリア</th>
                    </tr>
                    <tr>
                        <td><input class="rounded border-solid border-2" type="text" name="recruitment_number" require value="<?= $agent_contents[0]['recruitment_number'] ?>"></td>
                        <td><input class="rounded border-solid border-2" type="text" name="private_recruitment_number" required value="<?= $agent_contents[0]['private_recruitment_number'] ?>"></td>
                        <td><input class="rounded border-solid border-2" type="text" name="target_age" required value="<?= $agent_contents[0]['target_age'] ?>"></td>
                        <td><input class="rounded border-solid border-2" type="text" name="area" required value="<?= $agent_contents[0]['area'] ?>"></td>
                    </tr>
                </tbody>
            </table>
            <p class="agent-pr-text border-solid rounded-2xl w-full bg-white mt-4 mb-4 p-2">
                PRポイント
                <textarea class="w-full" rows="9" cols="80" name="pr_point" required value="<?= $agent_contents[0]['pr_point'] ?>"><?= $agent_contents[0]['pr_point'] ?></textarea>
            </p>
            <div class="relative h-10">
                <a class="absolute top-1 right-4" href="./index.php">戻る</a>
            </div>
            <div class="btn-wrapper">                    
                <input class="entry-btn bg-red-500 text-white rounded-3xl m-1 p-3 pl-20 pr-20" type="submit" value="変更する" name="upload">
            </div>
        </form>
    </section>
    
    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="../user/script.js"></script>
</body>

<!-- <body>
    <?php
    $stmt = $db->query('SELECT *FROM agent_contents WHERE id =' . $data[0]);
    $agent_contents = $stmt->fetchAll(); ?>
    <section>
        <h1>企業情報変更</h1>
        <form action="/admin/change_agents.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" value=<?= $data[0]; ?> name="agent_id">
            <p> 企業名：<input type="text" name="agent_name" required value="<?= $agent_contents[0]['agent_name'] ?>"></p>
            <p> 企業画像：<input type="file" name="image" required></p>
            <p> 推しポイント：<input type="text" name="special_feature" required value="<?= $agent_contents[0]['special_feature'] ?>"></p>
            <p> 特徴：<input type="text" name="feature1" required value="<?= $agent_contents[0]['feature1'] ?>"></p>
            <p> 特徴：<input type="text" name="feature2" required value="<?= $agent_contents[0]['feature2'] ?>"></p>
            <p> 特徴：<input type="text" name="feature3" required value="<?= $agent_contents[0]['feature3'] ?>"></p>
            <p> 特徴：<input type="text" name="feature4" required value="<?= $agent_contents[0]['feature4'] ?>"></p>
            <p> 特徴：<input type="text" name="feature5" required value="<?= $agent_contents[0]['feature5'] ?>"></p>
            <p>求人数：<input type="text" name="recruitment_number" required value="<?= $agent_contents[0]['recruitment_number'] ?>"></p>
            <p>非公開求人数：<input type="text" name="private_recruitment_number" required value="<?= $agent_contents[0]['private_recruitment_number'] ?>"></p>
            <p> 対象年代：<input type="text" name="target_age" required value="<?= $agent_contents[0]['target_age'] ?>"></p>
            <p> エリア：<input type="text" name="area" required value="<?= $agent_contents[0]['area'] ?>"></p>
            <p> PRポイント：<textarea rows="9" cols="80" name="pr_point" required value="<?= $agent_contents[0]['pr_point'] ?>"></textarea></p>
            <p><input type="submit" value="変更する" name="upload"></p>
        </form>
        <a href="./index.php">戻る</a>
    </section>
</body> -->

</html>