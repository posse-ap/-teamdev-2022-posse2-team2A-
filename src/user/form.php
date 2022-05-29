<?php
session_start();
$data = explode(",", $_SERVER['QUERY_STRING']);
error_reporting(0);

if (!empty($_POST)) {
    $stmt = $db->prepare('INSERT INTO customers SET 
    agent_id =?,
    name =?,
    name_kana =?,
    sex =?,
    birth =?,
    address =?,
    email =?,
    phone_number =?,
    education =?,
    major =?,
    department =?,
    major_subject =?,
    comments =?
    ');
    $stmt->execute(array(
        $_POST['agent_id'],
        $_POST['name'],
        $_POST['name_kana'],
        $_POST['sex'],
        $_POST['birth'],
        $_POST['address'],
        $_POST['email'],
        $_POST['phone_number'],
        $_POST['education'],
        $_POST['major'],
        $_POST['department'],
        $_POST['major_subject'],
        $_POST['comments']
    ));
    header('Location: http://' . $_SERVER['HTTP_HOST'] . '/user/index.php');
    exit();
}
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
    <!-- navigation -->
    <?php
    require(dirname(__FILE__) . "/components/_nav.php");
    ?>
    <main>
        <div class="title-wrapper flex-column">
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
            <form name="inputForm" action="/user/check.php" method="POST" class="m-2 p-2">
                <input type="hidden" value=<?php echo $data[0]; ?> name="agent_id">
                <table class="">
                    <tr>
                        <th class="contact-item">姓名<span style="color:red">*</span><br>Name(Kanji)</th>
                        <td class="contact-body">
                            <span class="inline-block">姓：<input class="m-2 rounded border-solid border-2" pattern="[\u4E00-\u9FFF\u3040-\u309Fー]*" type="text" name="first_name" placeholder="山田" required value=<?php
                                                                                                                                                                                                                    if ($_SESSION['cart']) {
                                                                                                                                                                                                                        echo $_SESSION['cart'][0]['first_name'];
                                                                                                                                                                                                                    } else {
                                                                                                                                                                                                                        echo "";
                                                                                                                                                                                                                    } ?>></span>
                            <span class="inline-block">名：<input class="m-2 rounded border-solid border-2" pattern="[\u4E00-\u9FFF\u3040-\u309Fー]*" type="text" name="last_name" placeholder="太郎" required value=<?php
                                                                                                                                                                                                                if ($_SESSION['cart']) {
                                                                                                                                                                                                                    echo $_SESSION['cart'][0]['last_name'];
                                                                                                                                                                                                                } else {
                                                                                                                                                                                                                    echo "";
                                                                                                                                                                                                                } ?>></span>
                        </td>
                    </tr>
                    <tr>
                        <th class="contact-item">フリガナ<span style="color:red">*</span><br>Name(Kana)</th>
                        <td class="contact-body">
                            <span class="inline-block">セイ：<input class="m-2 rounded border-solid border-2" pattern="[\u30A1-\u30F6]*" type="text" name="first_name_kana" placeholder="ヤマダ" required value=<?php
                                                                                                                                                                                                            if ($_SESSION['cart']) {
                                                                                                                                                                                                                echo $_SESSION['cart'][0]['first_name_kana'];
                                                                                                                                                                                                            } else {
                                                                                                                                                                                                                echo "";
                                                                                                                                                                                                            } ?>></span>
                            <span class="inline-block">カナ：<input class="m-2 rounded border-solid border-2" pattern="[\u30A1-\u30F6]*" type="text" name="last_name_kana" placeholder="タロウ" required value=<?php
                                                                                                                                                                                                            if ($_SESSION['cart']) {
                                                                                                                                                                                                                echo $_SESSION['cart'][0]['last_name_kana'];
                                                                                                                                                                                                            } else {
                                                                                                                                                                                                                echo "";
                                                                                                                                                                                                            } ?>></span>
                        </td>
                    </tr>
                    <tr>
                        <th class="contact-item">生年月日<span style="color:red">*</span><br>Date of Birth</th>
                        <td class="contact-body">
                            <span class="inline-block"><input class=" rounded border-solid border-2" type="text" name="birth_year" list="birth_year" placeholder="選択" size="8" required value=<?php
                                                                                                                                                                                                if ($_SESSION['cart']) {
                                                                                                                                                                                                    echo $_SESSION['cart'][0]['birth_year'];
                                                                                                                                                                                                } else {
                                                                                                                                                                                                    echo "";
                                                                                                                                                                                                } ?>>年　</span>
                            <span class="inline-block"><input class=" rounded border-solid border-2" type="text" name="birth_month" list="birth_month" placeholder="選択" size="8" required value=<?php
                                                                                                                                                                                                if ($_SESSION['cart']) {
                                                                                                                                                                                                    echo $_SESSION['cart'][0]['birth_month'];
                                                                                                                                                                                                } else {
                                                                                                                                                                                                    echo "";
                                                                                                                                                                                                } ?>>月　</span>
                            <span class="inline-block"><input class=" rounded border-solid border-2" type="text" name="birth_day" list="birth_day" placeholder="選択" size="8" required value=<?php
                                                                                                                                                                                            if ($_SESSION['cart']) {
                                                                                                                                                                                                echo $_SESSION['cart'][0]['birth_day'];
                                                                                                                                                                                            } else {
                                                                                                                                                                                                echo "";
                                                                                                                                                                                            } ?>>日</span>
                            <datalist id="birth_year">
                                <option value="2000"></option>
                                <option value="2001"></option>
                                <option value="2002"></option>
                                <option value="2003"></option>
                            </datalist>
                            <datalist id="birth_month">
                                <option value="1"></option>
                                <option value="2"></option>
                                <option value="3"></option>
                                <option value="4"></option>
                                <option value="5"></option>
                                <option value="6"></option>
                                <option value="7"></option>
                                <option value="8"></option>
                                <option value="9"></option>
                                <option value="10"></option>
                                <option value="11"></option>
                                <option value="12"></option>
                            </datalist>
                            <datalist id="birth_day">
                                <option value="1"></option>
                                <option value="2"></option>
                                <option value="3"></option>
                                <option value="4"></option>
                                <option value="5"></option>
                                <option value="6"></option>
                                <option value="7"></option>
                                <option value="8"></option>
                                <option value="9"></option>
                                <option value="10"></option>
                                <option value="11"></option>
                                <option value="12"></option>
                                <option value="13"></option>
                                <option value="14"></option>
                                <option value="15"></option>
                                <option value="16"></option>
                                <option value="17"></option>
                                <option value="18"></option>
                                <option value="19"></option>
                                <option value="20"></option>
                                <option value="21"></option>
                                <option value="22"></option>
                                <option value="23"></option>
                                <option value="24"></option>
                                <option value="25"></option>
                                <option value="26"></option>
                                <option value="27"></option>
                                <option value="28"></option>
                                <option value="29"></option>
                                <option value="30"></option>
                                <option value="31"></option>
                            </datalist>
                        </td>
                    </tr>
                    <tr>
                        <th class="contact-item">性別<span style="color:red">*</span><br>sex</th>
                        <td class="contact-body">
                            <input type="radio" name="sex" value="男" required <?php
                                                                                if ($_SESSION['cart'][0]['sex'] == "男") {
                                                                                    echo 'checked';
                                                                                }  ?>>男性
                            <input type="radio" name="sex" value="女" required <?php
                                                                                if ($_SESSION['cart'][0]['sex'] == "女") {
                                                                                    echo 'checked';
                                                                                }  ?>>女性
                            <input type="radio" name="sex" value="その他" required <?php
                                                                                if ($_SESSION['cart'][0]['sex'] == "その他") {
                                                                                    echo 'checked';
                                                                                }  ?>>無回答
                        </td>
                    </tr>
                    <tr>
                        <th class="contact-item">メールアドレス<span style="color:red">*</span><br>E-mail</th>
                        <td class="contact-body">
                            <span class="inline-block">メール：<input class=" rounded border-solid border-2 m-2" id="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" type="text" name="email" placeholder="△△△△△@ooo.xx" required value=<?php
                                                                                                                                                                                                                                                if ($_SESSION['cart']) {
                                                                                                                                                                                                                                                    echo $_SESSION['cart'][0]['email'];
                                                                                                                                                                                                                                                } else {
                                                                                                                                                                                                                                                    echo "";
                                                                                                                                                                                                                                                } ?>></span>
                            <span class="inline-block">確認用：<input class=" rounded border-solid border-2 m-2" id="emailConfirm" type="text" name="email_check" placeholder="△△△△△@ooo.xx" required oninput="CheckEmail(this)" value=<?php
                                                                                                                                                                                                                                    if ($_SESSION['cart']) {
                                                                                                                                                                                                                                        echo $_SESSION['cart'][0]['email'];
                                                                                                                                                                                                                                    } else {
                                                                                                                                                                                                                                        echo "";
                                                                                                                                                                                                                                    } ?>></span>
                        </td>
                    </tr>
                    <tr>
                        <th class="contact-item">住所<span style="color:red">*</span><br>Address</th>
                        <td class="contact-body">
                            <span class="inline-block">郵便番号<span style="color:red">*</span>：〒<input class="m-2 rounded border-solid border-2" pattern="[0-9]{3}-?[0-9]{4}" type="text" name="address_postal" placeholder="000-0000" required value=<?php
                                                                                                                                                                                                                                                    if ($_SESSION['cart']) {
                                                                                                                                                                                                                                                        echo $_SESSION['cart'][0]['address_postal'];
                                                                                                                                                                                                                                                    } else {
                                                                                                                                                                                                                                                        echo "";
                                                                                                                                                                                                                                                    } ?>></span>
                            <span class="inline-block">都道府県<span style="color:red">*</span>：<input class="m-2 rounded border-solid border-2" type="text" name="address_prefecture" placeholder="東京都" required value=<?php
                                                                                                                                                                                                                    if ($_SESSION['cart']) {
                                                                                                                                                                                                                        echo $_SESSION['cart'][0]['address_prefecture'];
                                                                                                                                                                                                                    } else {
                                                                                                                                                                                                                        echo "";
                                                                                                                                                                                                                    } ?>></span>
                            <span class="inline-block">市区町村・町名・丁目<span style="color:red">*</span>：<input class="m-2 rounded border-solid border-2" type="text" name="address_municipalities" placeholder="港区南青山3丁目" required value=<?php
                                                                                                                                                                                                                                    if ($_SESSION['cart']) {
                                                                                                                                                                                                                                        echo $_SESSION['cart'][0]['address_municipalities'];
                                                                                                                                                                                                                                    } else {
                                                                                                                                                                                                                                        echo "";
                                                                                                                                                                                                                                    } ?>></span>
                            <span class="inline-block">番地・号<span style="color:red">*</span>：<input class="m-2 rounded border-solid border-2" type="text" name="address_number" placeholder="15-9" required value=<?php
                                                                                                                                                                                                                    if ($_SESSION['cart']) {
                                                                                                                                                                                                                        echo $_SESSION['cart'][0]['address_number'];
                                                                                                                                                                                                                    } else {
                                                                                                                                                                                                                        echo "";
                                                                                                                                                                                                                    } ?>></span>
                            <span class="inline-block">建物名等：<input class="m-2 rounded border-solid border-2" type="text" name="address_building" placeholder="MINOWA表参道 3階" value=<?php
                                                                                                                                                                                    if ($_SESSION['cart']) {
                                                                                                                                                                                        echo $_SESSION['cart'][0]['address_building'];
                                                                                                                                                                                    } else {
                                                                                                                                                                                        echo "";
                                                                                                                                                                                    } ?>></span>
                        </td>
                    </tr>
                    <tr>
                        <th class="contact-item">電話番号<span style="color:red">*</span><br>Phone</th>
                        <td class="contact-body"><input class=" rounded border-solid border-2" type="text" pattern="^[0-9]+$" name="phone_number" placeholder="半角数字ハイフン無し" required value=<?php
                                                                                                                                                                                            if ($_SESSION['cart']) {
                                                                                                                                                                                                echo $_SESSION['cart'][0]['phone_number'];
                                                                                                                                                                                            } else {
                                                                                                                                                                                                echo "";
                                                                                                                                                                                            } ?>></td>
                    </tr>
                    <tr>
                        <th class="contact-item">最終学歴<span style="color:red">*</span><br>Education</th>
                        <td class="contact-body"><input class=" rounded border-solid border-2" type="text" name="education" required value=<?php
                                                                                                                                            if ($_SESSION['cart']) {
                                                                                                                                                echo $_SESSION['cart'][0]['education'];
                                                                                                                                            } else {
                                                                                                                                                echo "";
                                                                                                                                            } ?>>大学</td>
                    </tr>
                    <tr>
                        <th class="contact-item">専攻<span style="color:red">*</span><br>Major</th>
                        <td class="contact-body">
                            <input type="radio" name="major" value="文系" <?php
                                                                        if ($_SESSION['cart'][0]['major'] == "文系") {
                                                                            echo 'checked';
                                                                        }  ?>>文系
                            <input type="radio" name="major" value="理系" <?php
                                                                        if ($_SESSION['cart'][0]['major'] == "理系") {
                                                                            echo 'checked';
                                                                        }  ?>>理系
                            <span class="inline-block">学部：<input class="m-2 rounded border-solid border-2" type="text" name="major_department" required value=<?php
                                                                                                                                                                if ($_SESSION['cart']) {
                                                                                                                                                                    echo $_SESSION['cart'][0]['major_department'];
                                                                                                                                                                } else {
                                                                                                                                                                    echo "";
                                                                                                                                                                } ?>></span>
                            <span class="inline-block">学科：<input class="m-2 rounded border-solid border-2" type="text" name="major_subject" required value=<?php
                                                                                                                                                            if ($_SESSION['cart']) {
                                                                                                                                                                echo $_SESSION['cart'][0]['major_subject'];
                                                                                                                                                            } else {
                                                                                                                                                                echo "";
                                                                                                                                                            } ?>></span>
                        </td>
                    </tr>
                    <tr>
                        <th class="contact-item">卒業(見込)年月<span style="color:red">*</span><br>Graduation</th>
                        <td class="contact-body">
                            <span class="inline-block"><input class=" rounded border-solid border-2 p-1" type="text" name="graduation_year" list="year" size="8" placeholder="選択" required value=<?php
                                                                                                                                                                                                    if ($_SESSION['cart']) {
                                                                                                                                                                                                        echo $_SESSION['cart'][0]['graduation_year'];
                                                                                                                                                                                                    } else {
                                                                                                                                                                                                        echo "";
                                                                                                                                                                                                    } ?>>年</span>
                            <span class="inline-block"><span class="m-1">3月</span></span>
                            <span class="inline-block"><input class=" rounded border-solid border-2 p-1" type="text" name="graduation_status" list="status" size="10" placeholder="選択" required value=<?php
                                                                                                                                                                                                        if ($_SESSION['cart']) {
                                                                                                                                                                                                            echo $_SESSION['cart'][0]['graduation_status'];
                                                                                                                                                                                                        } else {
                                                                                                                                                                                                            echo "";
                                                                                                                                                                                                        } ?>></span>
                        </td>
                        <datalist id="year">
                            <option value="2023"></option>
                            <option value="2024"></option>
                            <option value="2025"></option>
                        </datalist>
                        <datalist id="status">
                            <option value="卒業見込"></option>
                            <option value="卒業"></option>
                        </datalist>
                    </tr>
                    <tr>
                        <th class="contact-item">自由記入欄<br>Comments</th>
                        <td class="contact-body">
                            <textarea class=" rounded border-solid border-2" type="text" name="comments" col="50" rows="5"></textarea>
                        </td>
                    </tr>
                </table>
                <div class="flex justify-center w-full mt-10">
                    <input class="bg-orange rounded-lg text-center w-full shadow-lg hover:shadow-none sm:w-2/5 p-4 text-sm sm:text-base" onclick="toCheck()" type="submit" value="入力内容を確認する">
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

</html>