<?php
require(dirname(__FILE__) . "../../dbconnect.php");

$stmt = $db->query('SELECT * FROM agents');
$customers = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
<!-- 内容確認 -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    mb_language("Japanese");
    mb_internal_encoding("UTF-8");
    $to = "kamibayasitaito@keio.jp";
    $title = $_POST['mail-title'];
    $content = $_POST['mail-content'];
    if (mb_send_mail($to, $title, $content)) {
        echo "メールを送信しました";
    } else {
        echo "メールの送信に失敗しました";
    };
    ?>
</body>

</html>