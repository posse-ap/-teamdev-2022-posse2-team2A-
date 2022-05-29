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
                <div class="panel tab-C is-show">
                    <form action="./manager_info_process.php" method="POST" class="m-2 p-2">
                        <!-- <input type="hidden" value=<?php echo $data[0]; ?> name="agent_id"> -->
                        <table class="w-full">
                            <tr>
                                <th class="contact-item">担当者様のお名前<span style="color:red">*</span><br>Name(Kanji)</th>
                                <td class="contact-body">
                                    <span class="inline-block"><input class="m-2 rounded border-solid border-2" pattern="[\u4E00-\u9FFF\u3040-\u309Fー]*" type="text" name="pic_name" placeholder="山本太郎" required value="<?= $agent_info['pic_name'] ?>"></span>
                                </td>
                            </tr>
                            <tr>
                                <th class="contact-item">フリガナ<span style="color:red">*</span><br>Name(Kana)</th>
                                <td class="contact-body">

                                    <span class="inline-block"><input class="m-2 rounded border-solid border-2" pattern="[\u30A1-\u30F6]*" type="text" name="pic_name_kana" placeholder="ヤマモトタロウ" required value="<?= $agent_info['pic_name_kana'] ?>"></span>
                                </td>
                            </tr>
                            <tr>
                                <th class="contact-item">担当者様の部署名<span style="color:red">*</span><br>Department name</th>
                                <td class="contact-body">
                                    <span class="inline-block"><input class="m-2 rounded border-solid border-2" type="text" name="department_name" placeholder="人事部" required value="<?= $agent_info['department_name'] ?>"></span>
                                </td>
                            </tr>
                            <tr>
                                <th class="contact-item">メールアドレス<span style="color:red">*</span><br>E-mail</th>
                                <td class="contact-body">
                                    <span class="inline-block"><input class=" rounded border-solid border-2 m-2" id="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" type="text" name="email" placeholder="△△△△△@ooo.xx" required value="<?= $agent_info['email'] ?>"></span>
                                    <span class="inline-block">確認用：<input class=" rounded border-solid border-2 m-2" id="emailConfirm" type="text" name="email_check" placeholder="△△△△△@ooo.xx" required oninput="CheckEmail(this)"></span>
                                </td>
                            </tr>
                            <tr>
                                <th class="contact-item">電話番号<span style="color:red">*</span><br>Phone</th>
                                <td class="contact-body"><input class=" rounded border-solid border-2" type="text" pattern="^[0-9]+$" name="phone_number" placeholder="半角数字ハイフン無し" required value="<?= $agent_info['phone_number'] ?>"></td>
                            </tr>
                        </table>
                        <div class="text-right">
                            <input class="mt-4 mr-0 ml-auto rounded-lg text-center  shadow-lg hover:shadow-none p-4 text-sm sm:text-base" type="submit" value="編集確定">
                        </div>
                    </form>
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