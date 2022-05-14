<!-- フォーム -->
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
    <div class="form-section w-2/7">
        <div class="flex justify-around w-full">
            <h1 class="font-bold text-2xl">応募フォーム</h1>
            <!-- プログレスバーここから -->
            <!-- プログレスバーここまで -->
        </div>
        <p><span style="color:red">*</span>は必須項目です。</p>
        <form action="/user/form.php?1" method="POST" class="m-2 p-2">
            <input type="hidden" value=<?php echo $data[0]; ?> name="agent_id">
            <table class="w-full">
                <tr>
                    <th class="contact-item">姓名<span style="color:red">*</span><br>Name(Kanji)</th>
                    <td class="contact-body">
                        姓：<input class="m-2 border-solid border-2" pattern="[\u4E00-\u9FFF\u3040-\u309Fー]*" type="text" name="first_name" placeholder="山田" required>
                        名：<input class="m-2 border-solid border-2"  pattern="[\u4E00-\u9FFF\u3040-\u309Fー]*" type="text" name="last_name" placeholder="太郎" required>
                    </td>
                </tr>
                <tr>
                    <th class="contact-item">フリガナ<span style="color:red">*</span><br>Name(Kana)</th>
                    <td class="contact-body">
                        セイ：<input class="border-solid border-2" pattern="[\u30A1-\u30F6]*" type="text" name="first_name_kana" placeholder="ヤマダ" required>
                        カナ：<input class="border-solid border-2" pattern="[\u30A1-\u30F6]*" type="text" name="last_name_kana" placeholder="タロウ" required>
                    </td>
                </tr>
                <tr>
                    <th class="contact-item">生年月日<span style="color:red">*</span><br>Date of Birth</th>
                    <td class="contact-body">
                        <input class="border-solid border-2" type="text" name="birth" list="birth_year" placeholder="選択" size="8" required>年　
                        <input class="border-solid border-2" type="text" name="birth" list="birth_month" placeholder="選択" size="8" required>月　
                        <input class="border-solid border-2" type="text" name="birth" list="birth_day" placeholder="選択" size="8" required>日
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
                        <input type="radio" name="sex" value="男" required>男
                        <input type="radio" name="sex" value="女" required>女
                        <input type="radio" name="sex" value="その他" required>無回答
                    </td>
                </tr>
                <tr>
                    <th class="contact-item">メールアドレス<span style="color:red">*</span><br>E-mail</th>
                    <td class="contact-body">
                        <input class="border-solid border-2 m-2"  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" type="text" name="email" placeholder="△△△△△@ooo.xx" required><br>
                        確認用：<input class="border-solid border-2 m-2" type="text" name="email-check" placeholder="△△△△△@ooo.xx" required>
                    </td>
                </tr>
                <tr>
                    <th class="contact-item">住所<span style="color:red">*</span><br>Address</th>
                    <td class="contact-body">
                        郵便番号<span style="color:red">*</span>：〒<input class="m-2 border-solid border-2" pattern="[0-9]{3}-?[0-9]{4}" type="text" name="address" placeholder="000-0000" required><br>
                        都道府県<span style="color:red">*</span>：<input class="m-2 border-solid border-2" type="text" name="address" placeholder="東京都" required><br>
                        市区町村<span style="color:red">*</span>・町名・丁目：<input class="m-2 border-solid border-2" type="text" name="address" placeholder="港区南青山3丁目" required><br>
                        番地・号<span style="color:red">*</span>：<input class="m-2 border-solid border-2" type="text" name="address" placeholder="15-9" required><br>
                        建物名等：<input class="m-2 border-solid border-2" type="text" name="address" placeholder="MINOWA表参道 3階">
                    </td>
                </tr>
                <tr>
                    <th class="contact-item">電話番号<span style="color:red">*</span><br>Phone</th>
                    <td class="contact-body"><input class="border-solid border-2" type="text" pattern="^[0-9]+$" name="phone_number" placeholder="半角数字ハイフン無し" required></td>
                </tr>
                <tr>
                    <th class="contact-item">最終学歴<span style="color:red">*</span><br>Education</th>
                    <td class="contact-body"><input class="border-solid border-2" type="text" name="education" required>　大学</td>
                </tr>
                <tr>
                    <th class="contact-item">専攻<span style="color:red">*</span><br>Major</th>
                    <td class="contact-body">
                        <input type="radio" name="major" value="文系">文系　
                        <input type="radio" name="major" value="理系">理系
                        <p> 学部：<input class="m-2 border-solid border-2" type="text" name="department" required></p>
                        <p> 学科：<input class="m-2 border-solid border-2" type="text" name="major_subject" required></p>
                    </td>
                </tr>
                <tr>
                    <th class="contact-item">卒業(見込)年月<span style="color:red">*</span><br>Graduation</th>
                    <td class="contact-body">
                        <input class="border-solid border-2 p-1" type="text" name="year" list="year" size="8" placeholder="選択" required>年
                        <span class="m-1">3月</span>
                        <input class="border-solid border-2 p-1" type="text" name="status" list="status" size="10" placeholder="選択" required>
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
                        <textarea class="border-solid border-2" type="text" name="comments" col="30" rows="5"></textarea>
                    </td>
                </tr>
            </table>
            <div class="flex justify-around w-full mt-10">
                <input class="bg-orange rounded-lg text-center w-2/5 p-4" type="submit" value="入力内容を確認する">
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
</body>

</html>