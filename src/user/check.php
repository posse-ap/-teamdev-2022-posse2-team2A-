<?php
session_start();
error_reporting(0);
$agent_id = $_POST['agent_id'];

foreach ($_SESSION['cart'] as $cart) {
    if ($cart['agent_id'] == $_POST['agent_id']) {
        $agent_is = false;
        break;
    } else {
        $agent_is = true;
    }
}


if ($_SESSION['cart'] == NULL) {
    $_SESSION['cart'] = [[
        "agent_id" => $_POST['agent_id'],
        "first_name" => $_POST['first_name'],
        "last_name" => $_POST['last_name'],
        "first_name_kana" => $_POST['first_name_kana'],
        "last_name_kana" => $_POST['last_name_kana'],
        "sex" => $_POST['sex'],
        "birth_year" => $_POST['birth_year'],
        "birth_month" => $_POST['birth_month'],
        "birth_day" => $_POST['birth_day'],
        "address_postal" => $_POST['address_postal'],
        "address_prefecture" => $_POST['address_prefecture'],
        "address_municipalities" => $_POST['address_municipalities'],
        "address_number" => $_POST['address_number'],
        "address_building" => $_POST['address_building'],
        "email" => $_POST['email'],
        "phone_number" => $_POST['phone_number'],
        "education" => $_POST['education'],
        "major" => $_POST['major'],
        "major_department" => $_POST['major_department'],
        "major_subject" => $_POST['major_subject'],
        "graduation_year" => $_POST['graduation_year'],
        "graduation_status" => $_POST['graduation_status'],
        "comments" => $_POST['comments']
    ]];
} else if ($agent_is) {
    $_SESSION['cart'] =
        array_merge(
            $_SESSION['cart'],
            $_SESSION['cart'] = [[
                "agent_id" => $_POST['agent_id'],
                "first_name" => $_POST['first_name'],
                "last_name" => $_POST['last_name'],
                "first_name_kana" => $_POST['first_name_kana'],
                "last_name_kana" => $_POST['last_name_kana'],
                "sex" => $_POST['sex'],
                "birth_year" => $_POST['birth_year'],
                "birth_month" => $_POST['birth_month'],
                "birth_day" => $_POST['birth_day'],
                "address_postal" => $_POST['address_postal'],
                "address_prefecture" => $_POST['address_prefecture'],
                "address_municipalities" => $_POST['address_municipalities'],
                "address_number" => $_POST['address_number'],
                "address_building" => $_POST['address_building'],
                "email" => $_POST['email'],
                "phone_number" => $_POST['phone_number'],
                "education" => $_POST['education'],
                "major" => $_POST['major'],
                "major_department" => $_POST['major_department'],
                "major_subject" => $_POST['major_subject'],
                "graduation_year" => $_POST['graduation_year'],
                "graduation_status" => $_POST['graduation_status'],
                "comments" => $_POST['comments']
            ]]
        );
};
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
    <title>確認ページ</title>
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
                <div class="item">登録</div>
                <div class="item-last active">確認</div>
                <div class="item">お問い合わせ完了</div>
            </div>
        </div>
        <div class="form-section">
            <div class="flex justify-around w-full">
                <h1 class="font-bold text-2xl">応募フォーム</h1>
            </div>
            <p><span style="color:red">*</span>は必須項目です。</p>
            <table class="">
                <tr>
                    <th class="contact-item">姓名<span style="color:red">*</span><br>Name(Kanji)</th>
                    <td class="contact-body">
                        <span class="inline-block">姓：<?= $_POST['first_name']; ?> </span>
                        <span class="inline-block">名：<?= $_POST['last_name']; ?></span>
                    </td>
                </tr>
                <tr>
                    <th class="contact-item">フリガナ<span style="color:red">*</span><br>Name(Kana)</th>
                    <td class="contact-body">
                        <span class="inline-block">セイ：<?= $_POST['first_name_kana']; ?></span>
                        <span class="inline-block">メイ：<?= $_POST['last_name_kana']; ?></span>
                    </td>
                </tr>
                <tr>
                    <th class="contact-item">生年月日<span style="color:red">*</span><br>Date of Birth</th>
                    <td class="contact-body">
                        <span class="inline-block"><?= $_POST['birth_year']; ?>年</span>
                        <span class=" inline-block"><?= $_POST['birth_month']; ?>月</span>
                        <span class=" inline-block"><?= $_POST['birth_day']; ?>日</span>
                    </td>
                </tr>
                <tr>
                    <th class=" contact-item">性別<span style="color:red">*</span><br>sex</th>
                    <td class="contact-body">
                        <?= $_POST['sex']; ?>
                    </td>
                </tr>
                <tr>
                    <th class=" contact-item">メールアドレス<span style="color:red">*</span><br>E-mail</th>
                    <td class="contact-body">
                        <span class="inline-block">メール：<?= $_POST['email']; ?>< /span>
                    </td>
                </tr>
                <tr>
                    <th class=" contact-item">住所<span style="color:red">*</span><br>Address</th>
                    <td class="contact-body">
                        <span class="inline-block">郵便番号<span style="color:red">*</span>：〒<?= $_POST['address_postal']; ?></span>
                        <span class=" inline-block">都道府県<span style="color:red">*</span>：<?= $_POST['address_prefecture']; ?></span>
                        <span class=" inline-block">市区町村・町名・丁目<span style="color:red">*</span>：<?= $_POST['address_municipalities']; ?></span>
                        <span class=" inline-block">番地・号<span style="color:red">*</span>：<?= $_POST['address_number']; ?></span>
                        <span class=" inline-block">建物名等：<?= $_POST['address_building']; ?></span>
                    </td>
                </tr>
                <tr>
                    <th class="contact-item">電話番号<span style="color:red">*</span><br>Phone</th>
                    <td class="contact-body"><?= $_POST['phone_number']; ?></td>
                </tr>
                <tr>
                    <th class=" contact-item">最終学歴<span style="color:red">*</span><br>Education</th>
                    <td class="contact-body"><?= $_POST['education']; ?>大学</td>
                </tr>
                <tr>
                    <th class=" contact-item">専攻<span style="color:red">*</span><br>Major</th>
                    <td class="contact-body">
                        <span class="inline-block"><?= $_POST['major']; ?></span>
                        <span class=" inline-block">学部：<?= $_POST['major_department']; ?></span>
                        <span class=" inline-block">学科：<?= $_POST['major_subject']; ?></span>
                    </td>
                </tr>
                <tr>
                    <th class=" contact-item">卒業(見込)年月<span style="color:red">*</span><br>Graduation</th>
                    <td class="contact-body">
                        <span class="inline-block"><?= $_POST['graduation_year']; ?>年</span>
                        <span class=" inline-block"><span class="m-2">3月</span></span>
                        <span class="inline-block"><?= $_POST['graduation_status']; ?></span>
                    </td>
                </tr>
                <tr>
                    <th class=" contact-item">自由記入欄<br>Comments</th>
                    <td class="contact-body">
                        <?= $_POST['comments']; ?><?= $_POST['comments']; ?>
                    </td>
                </tr>
            </table>
            <div class=" relative">
                <button class="absolute top-1 right-1 green" type="button" onclick="history.back()">修正する</button>
            </div>


            <!-- 裏側で送るデータここから下は変更しないで　to ともあき -->
            <div class="sm:flex justify-around w-full mt-10">
                <?php
                $full_name = $_POST['first_name'] . $_POST['last_name'];
                $full_name_kana = $_POST['first_name_kana'] . $_POST['last_name_kana'];
                $birth = $_POST['birth_year'] . "-" . $_POST['birth_month'] . "-" . $_POST['birth_day'];
                $address = $_POST['address_postal'] . $_POST['address_prefecture'] . $_POST['address_municipalities'] . $_POST['address_number'] . $_POST['address_building'];
                ?>
                <form action="./complete.php" method="post">
                    <input type="hidden" name="agent_id" value="<?= $_POST['agent_id']; ?>">
                    <input type="hidden" name="name" value="<?= $full_name ?>">
                    <input type="hidden" name="name_kana" value="<?= $full_name_kana ?>">
                    <input type="hidden" name="birth" value="<?= $birth ?>">
                    <input type="hidden" name="sex" value="<?= $_POST['sex']; ?>">
                    <input type="hidden" name="email" value="<?= $_POST['email']; ?>">
                    <input type="hidden" name="address" value="<?= $address; ?>">
                    <input type="hidden" name="phone_number" value="<?= $_POST['phone_number']; ?>">
                    <input type="hidden" name="education" value="<?= $_POST['education']; ?>">
                    <input type="hidden" name="major" value="<?= $_POST['major']; ?>">
                    <input type="hidden" name="department" value="<?= $_POST['major_department']; ?>">
                    <input type="hidden" name="major_subject" value="<?= $_POST['major_subject']; ?>">
                    <input type="hidden" name="graduation_year" value="<?= $_POST['graduation_year']; ?>">
                    <input type="hidden" name="graduation_status" value="<?= $_POST['graduation_status']; ?>">
                    <input type="hidden" name="comments" value="<?= $_POST['comments']; ?>">
                    <input class="mt-10 bg-orange rounded-lg text-center w-full shadow-lg hover:shadow-none sm:w-2/5 p-4 text-sm sm:text-base" type="submit" value="お問い合わせ">
                    <input class="mt-10 bg-orange rounded-lg text-center w-full shadow-lg hover:shadow-none sm:w-2/5 p-4 text-sm sm:text-base" type="submit" value="他の企業にも問い合わせる">
                </form>

            </div>
        </div>
    </main>
    <!-- アイコンの部分 -->
    <?php
    require(dirname(__FILE__) . "/components/_mainFooter.php");
    ?>
    <!-- footer -->
    <?php
    require(dirname(__FILE__) . "/components/_footer.php");
    ?>
    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="./script.js"></script>
</body>

</html>