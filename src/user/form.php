<?php
session_start();
$data = explode(",", $_SERVER['QUERY_STRING']);
error_reporting(0);


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
    <title>応募フォーム</title>
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
        <section class="form-section">
            <div class="flex justify-around w-full">
                <h1 class="font-bold text-2xl">応募フォーム</h1>
                <!-- プログレスバーここから -->
                <!-- プログレスバーここまで -->
            </div>
            <form action="./check.php" method="POST">
                <input type="hidden" value=<?php echo $data[0]; ?> name="agent_id">
                <p> 氏名：<input required type="text" name="name" value=<?php
                                                                        if ($_SESSION['cart']) {
                                                                            echo $_SESSION['cart'][0]['name'];
                                                                        } else {
                                                                            echo "";
                                                                        } ?>></p>
                <p> ふりがな：<input type="text" name="name_kana" required value=<?php
                                                                            if ($_SESSION['cart']) {
                                                                                echo $_SESSION['cart'][0]['name_kana'];
                                                                            } else {
                                                                                echo "";
                                                                            } ?>></p>
                <p>
                    性別
                    <input type="radio" name="sex" value="男" required <?php
                                                                        if ($_SESSION['cart'][0]['sex'] == "男") {
                                                                            echo 'checked';
                                                                        } ?>>男
                    <input type="radio" name="sex" value="女" <?php
                                                                if ($_SESSION['cart'][0]['sex'] == "女") {
                                                                    echo 'checked';
                                                                } ?>>女
                    <input type="radio" name="sex" value="無回答" <?php
                                                                if ($_SESSION['cart'][0]['sex'] == "無回答") {
                                                                    echo 'checked';
                                                                } ?>>無回答
                </p>
                <p> 生年月日：<input type="text" name="birth" required value=<?php
                                                                        if ($_SESSION['cart']) {
                                                                            echo $_SESSION['cart'][0]['birth'];
                                                                        } else {
                                                                            echo "";
                                                                        } ?>></p>
                <p> 住所：<input type="text" name="address" required value=<?php
                                                                        if ($_SESSION['cart']) {
                                                                            echo $_SESSION['cart'][0]['address'];
                                                                        } else {
                                                                            echo "";
                                                                        } ?>></p>
                <p> メールアドレス：<input type="text" name="email" required value=<?php
                                                                            if ($_SESSION['cart']) {
                                                                                echo $_SESSION['cart'][0]['email'];
                                                                            } else {
                                                                                echo "";
                                                                            } ?>></p>
                <p> 電話番号：<input type="text" name="phone_number" required value=<?php
                                                                                if ($_SESSION['cart']) {
                                                                                    echo $_SESSION['cart'][0]['phone_number'];
                                                                                } else {
                                                                                    echo "";
                                                                                } ?>></p>
                <p> 最終学歴：<input type="text" name="education" required value=<?php
                                                                            if ($_SESSION['cart']) {
                                                                                echo $_SESSION['cart'][0]['education'];
                                                                            } else {
                                                                                echo "";
                                                                            } ?>></p>
                <p>
                    <input type="radio" name="major" value="文系" required <?php
                                                                            if ($_SESSION['cart'][0]['major'] == "文系") {
                                                                                echo 'checked';
                                                                            } ?>>文系
                    <input type="radio" name="major" value="理系" <?php
                                                                if ($_SESSION['cart'][0]['major'] == "理系") {
                                                                    echo 'checked';
                                                                } ?>>理系
                </p>
                <p> 学部：<input type="text" name="department" required value=<?php
                                                                            if ($_SESSION['cart']) {
                                                                                echo $_SESSION['cart'][0]['department'];
                                                                            } else {
                                                                                echo "";
                                                                            } ?>></p>
                <p> 学科：<input type="text" name="major_subject" required value=<?php
                                                                                if ($_SESSION['cart']) {
                                                                                    echo $_SESSION['cart'][0]['major_subject'];
                                                                                } else {
                                                                                    echo "";
                                                                                } ?>></p>
                <p> 自由記入欄：<input type="text" name="comments"></p>

                <!-- 企業に送るメール -->
                <input type="hidden" name="mail-title" value="新規申込の方がいらっしゃいます">
                <input type="hidden" name="mail-content" value="新規だよ">
                <a href="./check.php">
                    <input type="submit" value="登録する">
                </a>
            </form>
            <a href="./index.php">企業一覧に戻る</a>
        </section>
    </main>
    <!-- アイコンの部分 -->
    <?php
    require(dirname(__FILE__) . "/components/_mainFooter.php");
    ?>
    <!-- footer -->
    <?php
    require(dirname(__FILE__) . "/components/_footer.php");
    ?>
</body>

</html>