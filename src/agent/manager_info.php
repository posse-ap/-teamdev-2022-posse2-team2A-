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
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../user/reset.css">
    <link rel="stylesheet" href="../user/style.css">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <title>担当者情報</title>
</head>


<body>
    <main class="relative">
        <div class="title-wrapper flex flex-row">
            <h1 class="title">CRAFT</h1>
            <h2 class="subtitle">ー企業管理画面</h2>
        </div>
        <a class="bg-yellow absolute top-1 right-10 rounded-lg text-center  shadow-lg hover:shadow-none p-4 text-sm sm:text-base" href="logout.php">ログアウト</a>
        <div class="agent_login_wrapper">
            <span class="ml-4">企業名：</span><span><?= $agent_info['agent_name'] ?></span>
            <span class="ml-4"><?= $agent_info['email'] ?></span><span></span>
        </div>
        <div class="tab-panel">
            <!--タブ-->
            <ul class="tab-group">
                <li id="tabA" class="tab tab-A"><a href="./index.php">応募者一覧</a></li>
                <li class="tab tab-B"><a href="./money.php">今月の支払予定額</a></li>
                <li class="tab tab-C is-active"><a href="./manager_info.php">担当者情報</a></li>
            </ul>
            <!--タブを切り替えて表示するコンテンツ-->
            <div class="panel-group">
                <div class="panel tab-C is-show m-2 p-2">
                    <table class="w-full">

                        <tr>
                            <th class="contact-item">担当者様のお名前<span style="color:red">*</span><br>Name(Kanji)</th>
                            <td class="contact-body">
                                <span class="inline-block m-2 "><?= $agent_info['pic_name']; ?></span>
                            </td>
                        </tr>
                        <tr>
                            <th class="contact-item">フリガナ<span style="color:red">*</span><br>Name(Kana)</th>
                            <td class="contact-body">
                                <span class="inline-block"><?= $agent_info['pic_name_kana'] ?></span>
                            </td>
                        </tr>
                        <tr>
                            <th class="contact-item">担当者様の部署名<span style="color:red">*</span><br>Department name</th>
                            <td class="contact-body">
                                <span class="inline-block"><?= $agent_info['department_name']; ?></span>
                            </td>
                        </tr>
                        <tr>
                            <th class="contact-item">メールアドレス<span style="color:red">*</span><br>E-mail</th>
                            <td class="contact-body">
                                <span class="inline-block"><?= $agent_info['email']; ?></span>
                            </td>
                        </tr>
                        <tr>
                            <th class="contact-item">電話番号<span style="color:red">*</span><br>Phone</th>
                            <td class="contact-body"><?= $agent_info['phone_number']; ?></td>
                        </tr>
                    </table>
                    <div class="w-1/6 mt-4 ml-auto rounded-lg text-center shadow-lg hover:shadow-none text-sm sm:text-base">
                        <a href="./manager_info_change.php" style="display:block; background-color:#e06d2d; border-radius :6px; padding:7%; color:white;">編集する</a>
                    </div>
                </div>

            </div>
        </div>
    </main>
    <footer>
        <!-- jquery -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
        <script src="../user/script.js"></script>
    </footer>

</body>

</html>