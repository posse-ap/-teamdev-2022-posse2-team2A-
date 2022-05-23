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
    <link rel="stylesheet" href="./reset.css">
    <link rel="stylesheet" href="./style.css">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <title>新規掲載申請フォーム</title>
</head>

<body>
    <!-- header -->
    <?php
    require(dirname(__FILE__) . "/components/_header.php");
    ?>
    <!-- navigation -->
    <?php
    require(dirname(__FILE__) . "/components/_nav.php");
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
            <h1 class="font-bold text-2xl">登録フォーム</h1>
        </div>
        <p><span style="color:red">*</span>は必須項目です。</p>
        <form action="/user/newAgentcheck.php" method="POST" class="m-2 p-2">
            <input type="hidden" value=<?php echo $data[0]; ?> name="agent_id">
            <table class="">
                <tr>
                    <th class="contact-item">企業名<span style="color:red">*</span><br>Company Name</th>
                    <td class="contact-body">
                        <span class="inline-block"><input class="m-2 rounded border-solid border-2" type="text" name="company_name" placeholder="リクナビ" required></span>
                    </td>
                </tr>
                <tr>
                    <th class="contact-item">住所<span style="color:red">*</span><br>Address</th>
                    <td class="contact-body">
                        <span class="inline-block">郵便番号<span style="color:red">*</span>：〒<input class="m-2 rounded border-solid border-2" pattern="[0-9]{3}-?[0-9]{4}" type="text" name="address" placeholder="000-0000" required></span>
                        <span class="inline-block">都道府県<span style="color:red">*</span>：<input class="m-2 rounded border-solid border-2" type="text" name="address" placeholder="東京都" required></span>
                        <span class="inline-block">市区町村<span style="color:red">*</span>・町名・丁目：<input class="m-2 rounded border-solid border-2" type="text" name="address" placeholder="港区南青山3丁目" required></span>
                        <span class="inline-block">番地・号<span style="color:red">*</span>：<input class="m-2 rounded border-solid border-2" type="text" name="address" placeholder="15-9" required></span>
                        <span class="inline-block">建物名等：<input class="m-2 rounded border-solid border-2" type="text" name="address" placeholder="MINOWA表参道 3階"></span>
                    </td>
                </tr>
                <tr>
                    <th class="contact-item">担当者様のお名前<span style="color:red">*</span><br>Name(Kanji)</th>
                    <td class="contact-body">
                        <span class="inline-block">姓：<input class="m-2 rounded border-solid border-2" pattern="[\u4E00-\u9FFF\u3040-\u309Fー]*" type="text" name="first_name" placeholder="山田" required></span>
                        <span class="inline-block">名：<input class="m-2 rounded border-solid border-2"  pattern="[\u4E00-\u9FFF\u3040-\u309Fー]*" type="text" name="last_name" placeholder="太郎" required></span>
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
                    <th class="contact-item">メールアドレス<span style="color:red">*</span><br>E-mail</th>
                    <td class="contact-body">
                        <span class="inline-block">メール：<input class=" rounded border-solid border-2 m-2" id="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" type="text" name="email" placeholder="△△△△△@ooo.xx" required></span>
                        <span class="inline-block">確認用：<input class=" rounded border-solid border-2 m-2" id="emailConfirm" type="text" name="email_check" placeholder="△△△△△@ooo.xx" required oninput="CheckEmail(this)"></span>
                    </td>
                </tr>
                <tr>
                    <th class="contact-item">電話番号<span style="color:red">*</span><br>Phone</th>
                    <td class="contact-body"><input class=" rounded border-solid border-2" type="text" pattern="^[0-9]+$" name="phone_number" placeholder="半角数字ハイフン無し" required></td>
                </tr>
                <tr>
                    <th class="contact-item">何かございましたらこちらにお書きください<br>Comments</th>
                    <td class="contact-body">
                        <textarea class=" rounded border-solid border-2" type="text" name="comments" col="30" rows="5"></textarea>
                    </td>
                </tr>
            </table>
            <p class="w-full text-center"><a class="blue-" href="">エージェント利用規約</a>並びに<a href="">プライバシーポリシー</a>に</p>
            <div class="flex justify-center w-full mt-10">
                <input class="bg-orange rounded-lg text-center w-full shadow-lg hover:shadow-none sm:w-2/5 p-4 text-sm sm:text-base" type="submit" value="同意して申し込む">
            </div>
        </form>
    </div>
    </main>
    <!-- footer -->
    <?php
    require(dirname(__FILE__) . "/components/_footer.php");
    ?>
    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="./script.js"></script>
</body>

</html>