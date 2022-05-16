<?php
session_start();
error_reporting(0);
$agent_id = $_POST['agent_id'];


if ($_SESSION['cart'] == NULL) {
    echo "配列がnull";
    $_SESSION['cart'] = [$agent_id => [
        "name" => $_POST['name'],
        "name_kana" => $_POST['name_kana'],
        "sex" => $_POST['sex'],
        "birth" => $_POST['birth'],
        "address" => $_POST['address'],
        "email" => $_POST['email'],
        "phone_number" => $_POST['phone_number'],
        "education" => $_POST['education'],
        "major" => $_POST['major'],
        "department" => $_POST['department'],
        "major_subject" => $_POST['major_subject'],
        "comments" => $_POST['comments']
    ]];
} else {
    $_SESSION['cart'] =
        $_SESSION['cart'] +
        [$agent_id =>
        [
            "name" => $_POST['name'],
            "name_kana" => $_POST['name_kana'],
            "sex" => $_POST['sex'],
            "birth" => $_POST['birth'],
            "address" => $_POST['address'],
            "email" => $_POST['email'],
            "phone_number" => $_POST['phone_number'],
            "education" => $_POST['education'],
            "major" => $_POST['major'],
            "department" => $_POST['department'],
            "major_subject" => $_POST['major_subject'],
            "comments" => $_POST['comments']
        ]];
}



print_r($_SESSION['cart']);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="./complete.php" method="post">
        <input type="hidden" name="agent_id" value="<?= $_POST['agent_id']; ?>">
        <input type="hidden" name="name" value="<?= $_POST['name']; ?>">
        <input type="hidden" name="name_kana" value="<?= $_POST['name_kana']; ?>">
        <input type="hidden" name="sex" value="<?= $_POST['sex']; ?>">
        <input type="hidden" name="birth" value="<?= $_POST['birth']; ?>">
        <input type="hidden" name="address" value="<?= $_POST['address']; ?>">
        <input type="hidden" name="email" value="<?= $_POST['email']; ?>">
        <input type="hidden" name="phone_number" value="<?= $_POST['phone_number']; ?>">
        <input type="hidden" name="education" value="<?= $_POST['education']; ?>">
        <input type="hidden" name="major" value="<?= $_POST['major']; ?>">
        <input type="hidden" name="department" value="<?= $_POST['department']; ?>">
        <input type="hidden" name="major_subject" value="<?= $_POST['major_subject']; ?>">
        <input type="hidden" name="comments" value="<?= $_POST['comments']; ?>">
        <input type="submit" value="問い合わせる">
    </form>

</body>

</html>