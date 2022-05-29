<!-- 新規掲載申請フォーム -->
<?php
$data = explode(",", $_SERVER['QUERY_STRING']);
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../user/reset.css">
    <link rel="stylesheet" href="../../user/style.css">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <title>新規掲載申請フォーム</title>
</head>

<body>
    <!-- header -->
    <?php
    require("../../user/components/_header.php");
    ?>
    <!-- navigation -->
    <?php
    require("../../user/components/_nav.php");
    ?>
    <main>
        <div class="title-wrapper">
            <h1 class="title">CRAFT</h1>
            <h2 class="subtitle">就活生のための就活情報サイト</h2>
        </div>
        <div class="flex justify-center">
            <div class="progressbar">
                <div class="item-last active">登録情報入力</div>
                <div class="item">入力内容確認</div>
                <div class="item">登録完了</div>
            </div>
        </div>
        <div class="form-section">
            <div class="flex justify-around w-full">
                <h1 class="font-bold text-2xl">>正式登録フォーム</h1>
            </div>
            <p><span style="color:red">*</span>は必須項目です。</p>
            <form action="/agent/new_apply/register.php" method="POST">
                <input type="hidden" value=<?php echo $data[0]; ?> name="agent_id">
                <input type="hidden" name="_csrf_token" value="<?= $_SESSION['_csrf_token']; ?>">
                <input type="hidden" name="register_token" value="<?= $registerToken; ?>">
                <table class="">
                    <tr>
                        <th class="contact-item">企業名<span style="color:red">*</span><br>Company Name</th>
                        <td class="contact-body">
                            <span class="inline-block"><input class="m-2 rounded border-solid border-2" type="text" name="agent_name" placeholder="リクナビ" required></span>
                        </td>
                    </tr>
                    <tr>
                        <th class="contact-item">担当者様のお名前<span style="color:red">*</span><br>Name(Kanji)</th>
                        <td class="contact-body">
                            <span class="inline-block">姓：<input class="m-2 rounded border-solid border-2" pattern="[\u4E00-\u9FFF\u3040-\u309Fー]*" type="text" name="first_name" placeholder="山田" required></span>
                            <span class="inline-block">名：<input class="m-2 rounded border-solid border-2" pattern="[\u4E00-\u9FFF\u3040-\u309Fー]*" type="text" name="last_name" placeholder="太郎" required></span>
                        </td>
                    </tr>
                    <tr>
                        <th class="contact-item">フリガナ<span style="color:red">*</span><br>Name(Kana)</th>
                        <td class="contact-body">
                            <span class="inline-block">セイ：<input class="m-2 rounded border-solid border-2" pattern="[\u30A1-\u30F6]*" type="text" name="first_name_kana" placeholder="ヤマダ" required></span>
                            <span class="inline-block">カナ：<input class="m-2 rounded border-solid border-2" pattern="[\u30A1-\u30F6]*" type="text" name="last_name_kana" placeholder="タロウ" required></span>
                        </td>
                    </tr>
                    <tr>
                        <th class="contact-item">担当者様の部署名<span style="color:red">*</span><br>Department name</th>
                        <td class="contact-body">
                            <span class="inline-block"><input class="m-2 rounded border-solid border-2" type="text" name="department_name" placeholder="リクナビ" required></span>
                        </td>
                    </tr>
                    <tr>
                        <th class="contact-item">電話番号<span style="color:red">*</span><br>Phone</th>
                        <td class="contact-body"><input class=" rounded border-solid border-2" type="text" pattern="^[0-9]+$" name="phone_number" placeholder="半角数字ハイフン無し" required></td>
                    </tr>
                    <tr>
                        <th class="contact-item">パスワード<span style="color:red">*</span><br>Password</th>
                        <td class="contact-body">
                            <span class="inline-block"><input class="m-2 rounded border-solid border-2" type="password" name="password" required></span>
                        </td>
                    </tr>
                    <tr>
                        <th class="contact-item">パスワード<span style="color:red">*</span><br>Password</th>
                        <td class="contact-body">
                            <span class="inline-block"><input class="m-2 rounded border-solid border-2" type="password" name="department_name" required></span>
                        </td>
                    </tr>
                </table>
                <!-- 利用規約とプライバシーポリシーの遷移先は未作成 -->
                <p class="w-full text-center"><a class="a_link" href="">エージェント利用規約</a>並びに<a class="a_link" href="">プライバシーポリシー</a>に</p>
                <div class="flex justify-center w-full mt-10">
                    <input class="bg-orange rounded-lg text-center w-full shadow-lg hover:shadow-none sm:w-2/5 p-4 text-sm sm:text-base" type="submit" value="同意して申し込む">
                </div>
            </form>
        </div>
    </main>
    <!-- footer -->
    <?php
    require("../../user/components/_footer.php");
    ?>
    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="../../user/script.js"></script>
</body>

</html>