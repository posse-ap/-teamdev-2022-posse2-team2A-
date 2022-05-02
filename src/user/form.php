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
    <title>応募フォーム</title>
</head>

<body>
    <section>
        <h1>応募フォーム</h1>
        <form action="/user/form.php?1" method="POST">
            <input type="hidden" value=<?php echo $data[0]; ?> name="agent_id">
            <p> 氏名：<input type="text" name="name" required></p>
            <p> ふりがな：<input type="text" name="name_kana" required></p>
            <p>
                性別
                <input type="radio" name="sex" value="男">男
                <input type="radio" name="sex" value="女">女
                <input type="radio" name="sex" value="その他">無回答
            </p>
            <p> 生年月日：<input type="text" name="birth" required></p>
            <p> 住所：<input type="text" name="address" required></p>
            <p> メールアドレス：<input type="text" name="email" required></p>
            <p> 電話番号：<input type="text" name="phone_number" required></p>
            <p> 最終学歴：<input type="text" name="education" required></p>
            <p>
                <input type="radio" name="major" value="文系">文系
                <input type="radio" name="major" value="理系">理系
            </p>
            <p> 学部：<input type="text" name="department" required></p>
            <p> 学科：<input type="text" name="major_subject" required></p>
            <p> 自由記入欄：<input type="text" name="comments" required></p>
            <input type="submit" value="登録する">
        </form>
        <a href="./index.php">企業一覧に戻る</a>
    </section>
</body>

</html>