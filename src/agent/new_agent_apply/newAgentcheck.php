<!-- 新規エージェントフォーム確認 -->
<?php
require_once '../../dbconnect.php';
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
    <title>新規掲載確認</title>
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
        <div class="title-wrapper flex-column">
            <h1 class="title">CRAFT</h1>
            <h2 class="subtitle">就活生のための就活情報サイト</h2>
        </div>
        <div class="flex justify-center">
            <div class="progressbar">
                <div class="item">登録情報入力</div>
                <div class="item-last active">入力内容確認</div>
                <div class="item">登録完了</div>
            </div>
        </div>
        <div class="form-section">
            <div class="flex justify-around w-full">
                <h1 class="font-bold text-2xl">登録フォーム</h1>
            </div>
            <p><span style="color:red">*</span>は必須項目です。</p>
            <form action="/agent/new_agent_apply/newAgentcomplete.php" method="POST" class="m-2 p-2">
                <input type="hidden" value=<?php echo $data[0]; ?> name="agent_id">
                <table class="">
                    <tr>
                        <th class="contact-item">企業名<span style="color:red">*</span><br>Company Name</th>
                        <td class="contact-body">
                            <span class="inline-block"><input class="m-2 outline-none" type="text" name="agent_name" value="<?= $_POST['agent_name']; ?>" readonly></span>
                        </td>
                    </tr>
                    <tr>
                        <th class="contact-item">住所<span style="color:red">*</span><br>Address</th>
                        <td class="contact-body">
                            <span class="inline-block">郵便番号<span style="color:red">*</span>：〒<input class="m-2 outline-none" type="text" name="address_postal" value="<?= $_POST['address_postal']; ?>" readonly></span>
                            <span class="inline-block">都道府県<span style="color:red">*</span>：<input class="m-2 outline-none" type="text" name="address_prefecture" value="<?= $_POST['address_prefecture']; ?>" readonly></span>
                            <span class="inline-block">市区町村・町名・丁目<span style="color:red">*</span>：<input class="m-2 outline-none" type="text" name="address_municipalities" value="<?= $_POST['address_municipalities']; ?>" readonly></span>
                            <span class="inline-block">番地・号<span style="color:red">*</span>：<input class="m-2 outline-none" type="text" name="address_number" value="<?= $_POST['address_number']; ?>" readonly></span>
                            <span class="inline-block">建物名等：<input class="m-2 outline-none" type="text" name="address_building" value="<?= $_POST['address_building']; ?>" readonly></span>
                        </td>
                    </tr>
                    <tr>
                        <th class="contact-item">担当者様のお名前<span style="color:red">*</span><br>Name(Kanji)</th>
                        <td class="contact-body">
                            <span class="inline-block">姓：<input class="m-2 outline-none" type="text" name="first_name" value="<?= $_POST['first_name']; ?>" readonly></span>
                            <span class="inline-block">名：<input class="m-2 outline-none" type="text" name="last_name" value="<?= $_POST['last_name']; ?>" readonly></span>
                        </td>
                    </tr>
                    <tr>
                        <th class="contact-item">フリガナ<span style="color:red">*</span><br>Name(Kana)</th>
                        <td class="contact-body">
                            <span class="inline-block">セイ：<input class="m-2 outline-none" type="text" name="first_name_kana" value="<?= $_POST['first_name_kana']; ?>" readonly></span>
                            <span class="inline-block">カナ：<input class="m-2 outline-none" type="text" name="last_name_kana" value="<?= $_POST['last_name_kana']; ?>" readonly></span>
                        </td>
                    </tr>
                    <tr>
                        <th class="contact-item">担当者様の部署名<span style="color:red">*</span><br>Department name</th>
                        <td class="contact-body">
                            <span class="inline-block"><input class="m-2 outline-none" type="text" name="department_name" value="<?= $_POST['department_name']; ?>" readonly></span>
                        </td>
                    </tr>
                    <tr>
                        <th class="contact-item">メールアドレス<span style="color:red">*</span><br>E-mail</th>
                        <td class="contact-body">
                            <span class="inline-block">メール：<input class="m-2 outline-none" id="email" type="text" name="email" value="<?= $_POST['email']; ?>" readonly></span>
                        </td>
                    </tr>
                    <tr>
                        <th class="contact-item">電話番号<span style="color:red">*</span><br>Phone</th>
                        <td class="contact-body"><input class="m-2 outline-none" type="text" name="phone_number" value="<?= $_POST['phone_number']; ?>" readonly></td>
                    </tr>
                    <tr>
                        <th class="contact-item">何かございましたらこちらにお書きください<br>Comments</th>
                        <td class="contact-body">
                            <textarea class="m-2 outline-none" type="text" name="comments" col="50" rows="5" value="<?= $_POST['comments']; ?>" readonly><?= $_POST['comments']; ?></textarea>
                        </td>
                    </tr>
                </table>
                <div class="relative">
                    <button class="absolute top-1 right-1 green" type="button" onclick="history.back()">修正する</button>
                </div>
                <div class="flex justify-center w-full mt-10">
                    <input class="bg-orange rounded-lg text-center w-full shadow-lg hover:shadow-none sm:w-2/5 p-4 text-sm sm:text-base" type="submit" value="掲載依頼を申し込む">
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