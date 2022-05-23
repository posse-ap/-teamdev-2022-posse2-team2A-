<!-- 内容確認 -->
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
    <main>
    <div class="title-wrapper">
        <h1 class="title">CRAFT</h1>
        <h2 class="subtitle">就活生のための就活情報サイト</h2>
    </div>
    <div class="flex justify-center">
        <div class="progressbar">
            <div class="item-last active">登録</div>
            <div class="item">確認</div>
            <div class="item">お問い合わせ完了</div>
        </div>
    </div>
    <div class="form-section">
        <div class="flex justify-around w-full">
            <h1 class="font-bold text-2xl">応募フォーム</h1>
        </div>
        <p><span style="color:red">*</span>は必須項目です。</p>
        <?= $_POST['agent_id'] ?>
        <form action="./complete.php" method="post">
        <input type="hidden" name="agent_id" value="<?= $_POST['agent_id']; ?>">
            <table class="">
                <tr>
                    <th class="contact-item">姓名<span style="color:red">*</span><br>Name(Kanji)</th>
                    <td class="contact-body">
                        <span class="inline-block">姓：<span class="m-2 rounded border-solid border-2"  type="text" name="first_name" value="<?= $_POST['first_name']; ?>"></span></span>
                        <span class="inline-block">名：<span class="m-2 rounded border-solid border-2"  type="text" name="last_name" value="<?= $_POST['last_name']; ?>"></span></span>
                    </td>
                </tr>
                <tr>
                    <th class="contact-item">フリガナ<span style="color:red">*</span><br>Name(Kana)</th>
                    <td class="contact-body">
                        <span class="inline-block">セイ：<span class="m-2 rounded border-solid border-2" type="text" name="first_name_kana" value="<?= $_POST['first_name_kana']; ?>"></span></span>
                        <span class="inline-block">カナ：<span class="m-2 rounded border-solid border-2" type="text" name="last_name_kana" value="<?= $_POST['last_name_kana']; ?>"></span></span>
                    </td>
                </tr>
                <tr>
                    <th class="contact-item">生年月日<span style="color:red">*</span><br>Date of Birth</th>
                    <td class="contact-body">
                        <span class="inline-block"><span class=" rounded border-solid border-2" type="text" name="birth_year" list="birth_year" size="8" value="<?= $_POST['birth_year']; ?>">年　</span></span>
                        <span class="inline-block"><span class=" rounded border-solid border-2" type="text" name="birth_month" list="birth_month" size="8" value="<?= $_POST['birth_month']; ?>">月　</span></span>
                        <span class="inline-block"><span class=" rounded border-solid border-2" type="text" name="birth_day" list="birth_day" size="8" value="<?= $_POST['birth_day']; ?>">日</span></span>
                    </td>
                </tr>
                <tr>
                    <th class="contact-item">性別<span style="color:red">*</span><br>sex</th>
                    <td class="contact-body">
                        <span type="text" name="sex" value="<?= $_POST['sex']; ?>"></span>
                    </td>
                </tr>
                <tr>
                    <th class="contact-item">メールアドレス<span style="color:red">*</span><br>E-mail</th>
                    <td class="contact-body">
                        <span class="inline-block">メール：<span class=" rounded border-solid border-2 m-2" type="text" name="email" value="<?= $_POST['email']; ?>"></span></span>
                    </td>
                </tr>
                <tr>
                    <th class="contact-item">住所<span style="color:red">*</span><br>Address</th>
                    <td class="contact-body">
                        <span class="inline-block">郵便番号<span style="color:red">*</span>：〒<span class="m-2 rounded border-solid border-2" type="text" name="address_postal" value="<?= $_POST['address_postal']; ?>"></span></span>
                        <span class="inline-block">都道府県<span style="color:red">*</span>：<span class="m-2 rounded border-solid border-2" type="text" name="address_prefecture" value="<?= $_POST['address_prefecture']; ?>"></span></span>
                        <span class="inline-block">市区町村<span style="color:red">*</span>・町名・丁目：<span class="m-2 rounded border-solid border-2" type="text" name="address_municipalities" value="<?= $_POST['address_prefecture']; ?>"></span></span>
                        <span class="inline-block">番地・号<span style="color:red">*</span>：<span class="m-2 rounded border-solid border-2" type="text" name="address_number" value="<?= $_POST['address_number']; ?>"></span></span>
                        <span class="inline-block">建物名等：<span class="m-2 rounded border-solid border-2" type="text" name="address_building" value="<?= $_POST['address_building']; ?>"></span></span>
                    </td>
                </tr>
                <tr>
                    <th class="contact-item">電話番号<span style="color:red">*</span><br>Phone</th>
                    <td class="contact-body"><span class=" rounded border-solid border-2" type="text" name="phone_number" value="<?= $_POST['phone_number']; ?>"></span></td>
                </tr>
                <tr>
                    <th class="contact-item">最終学歴<span style="color:red">*</span><br>Education</th>
                    <td class="contact-body"><span class=" rounded border-solid border-2" type="text" name="education" value="<?= $_POST['education']; ?>">　大学</span></td>
                </tr>
                <tr>
                    <th class="contact-item">専攻<span style="color:red">*</span><br>Major</th>
                    <td class="contact-body">
                        <p type="text" name="major" value="<?= $_POST['major']; ?>"></p>
                        <span class="inline-block">学部：<span class="m-2 rounded border-solid border-2" type="text" name="major_department" value="<?= $_POST['major_department']; ?>"></span></span>
                        <span class="inline-block">学科：<span class="m-2 rounded border-solid border-2" type="text" name="major_subject" value="<?= $_POST['major_subject']; ?>"></span></span>
                    </td>
                </tr>
                <tr>
                    <th class="contact-item">卒業(見込)年月<span style="color:red">*</span><br>Graduation</th>
                    <td class="contact-body">
                        <span class="inline-block"><span class=" rounded border-solid border-2 p-1" type="text" name="graduation_year" size="8" value="<?= $_POST['graduation_year']; ?>">年</span></span>
                        <span class="inline-block"><span class="m-1">3月</span></span>
                        <span class="inline-block"><span class=" rounded border-solid border-2 p-1" type="text" name="graduation_status" size="10" value="<?= $_POST['graduation_status']; ?>"></span></span>
                    </td>
                </tr>
                <tr>
                    <th class="contact-item">自由記入欄<br>Comments</th>
                    <td class="contact-body">
                        <textarea class=" rounded border-solid border-2" type="text" name="comments" col="30" rows="5" value="<?= $_POST['comments']; ?>" readonly></textarea>
                    </td>
                </tr>
            </table>
            <div class="flex justify-center w-full mt-10">
                <input class="bg-orange rounded-lg text-center w-full shadow-lg hover:shadow-none sm:w-2/5 p-4 text-sm sm:text-base" type="submit" value="他の企業にも問い合わせる">
                <input class="bg-orange rounded-lg text-center w-full shadow-lg hover:shadow-none sm:w-2/5 p-4 text-sm sm:text-base" type="submit" value="お問い合わせ">
            </div>
        </form>
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
<body>
    <?= $_POST['agent_id'] ?>
    <form action="./complete.php" method="post">
        <input type="hidden" name="agent_id" value="<?= $_POST['agent_id']; ?>">
        <input type="text" name="name" value="<?= $_POST['first_name']; ?>">
        <input type="text" name="name" value="<?= $_POST['last_name']; ?>">
        <input type="text" name="name" value="<?= $_POST['first_name_kana']; ?>">
        <input type="text" name="name" value="<?= $_POST['last_name_kana']; ?>">
        <input type="text" name="name_kana" value="<?= $_POST['birth_year']; ?>">
        <input type="text" name="name_kana" value="<?= $_POST['birth_month']; ?>">
        <input type="text" name="name_kana" value="<?= $_POST['birth_day']; ?>">
        <input type="text" name="sex" value="<?= $_POST['sex']; ?>">
        <input type="text" name="email" value="<?= $_POST['email']; ?>">
        <input type="text" name="address" value="<?= $_POST['address_postal']; ?>">
        <input type="text" name="address" value="<?= $_POST['address_prefecture']; ?>">
        <input type="text" name="address" value="<?= $_POST['address_municipalities']; ?>">
        <input type="text" name="address" value="<?= $_POST['address_number']; ?>">
        <input type="text" name="address" value="<?= $_POST['address_building']; ?>">
        <input type="text" name="phone_number" value="<?= $_POST['phone_number']; ?>">
        <input type="text" name="education" value="<?= $_POST['education']; ?>">
        <input type="text" name="major" value="<?= $_POST['major']; ?>">
        <input type="text" name="department" value="<?= $_POST['major_department']; ?>">
        <input type="text" name="major_subject" value="<?= $_POST['major_subject']; ?>">
        <input type="text" name="graduation_year" value="<?= $_POST['graduation_year']; ?>">
        <input type="text" name="graduation_status" value="<?= $_POST['graduation_status']; ?>">
        <input type="text" name="comments" value="<?= $_POST['comments']; ?>">
        <input type="submit" value="おせ！！ï￥">
    </form>
</body>
</html>