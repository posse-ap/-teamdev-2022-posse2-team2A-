<!-- フォーム -->
<?php
require(dirname(__FILE__) . "../../dbconnect.php");

$stmt = $db->query('SELECT * FROM agents');
$customers = $stmt->fetchAll(PDO::FETCH_ASSOC);
$data = explode(",", $_SERVER['QUERY_STRING']);

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
    header('Location: http://' . $_SERVER['HTTP_HOST'] . '/admin/index.php');
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
        <form action="/user/form.php?1" method="POST" class="m-2 p-2">
            <input type="hidden" value=<?php echo $data[0]; ?> name="agent_id">
            <table>
                <tr>
                    <th>氏名</th>
                    <td><input type="text" name="name" required></td>
                </tr>
                <tr>
                    <th>ふりがな</th>
                    <td><input type="text" name="name_kana" required></td>
                </tr>
                <tr>
                    <th>性別</th>
                    <td>
                        <input type="radio" name="sex" value="男">男
                        <input type="radio" name="sex" value="女">女
                        <input type="radio" name="sex" value="その他">無回答
                    </td>
                </tr>
                <tr>
                    <th>生年月日</th>
                    <td><input type="text" name="birth" required></td>
                </tr>
                <tr>
                    <th>住所</th>
                    <td>
                        郵便番号<input type="text" name="address" required>
                        都道府県<input type="text" name="address" required>
                        市区町村・町名・丁目<input type="text" name="address" required>
                        番地・号<input type="text" name="address" required>
                        建物名等<input type="text" name="address" required>
                    </td>
                </tr>
                <tr>
                    <th>メールアドレス</th>
                    <td><input type="text" name="email" required></td>
                </tr>
                <tr>
                    <th>電話番号</th>
                    <td><input type="text" name="phone_number" required></td>
                </tr>
                <tr>
                    <th>最終学歴</th>
                    <td><input type="text" name="education" required>大学</td>
                </tr>
                <tr>
                    <th>専攻</th>
                    <td>
                        <input type="radio" name="major" value="文系">文系
                        <input type="radio" name="major" value="理系">理系
                        <p> 学部：<input type="text" name="department" required></p>
                        <p> 学科：<input type="text" name="major_subject" required></p>
                    </td>
                </tr>
                <tr>
                    <th>卒業年度</th>
                    <td>
                        <input type="text" name="year" list="year">年
                        <p>3月</p>
                        <input type="text" name="status" list="status">
                    </td>
                    <datalist id="year">
                        <option value="23"></option>
                        <option value="24"></option>
                        <option value="25"></option>
                    </datalist>
                    <datalist id="status">
                        <option value="卒業見込"></option>
                        <option value="卒業"></option>
                    </datalist>
                </tr>
                <p> 自由記入欄：<input type="text" name="comments" required></p>
            </table>
            <input type="submit" value="登録する">
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