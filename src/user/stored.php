<?php
session_start();
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
    <form method="post">
        <input type="submit" name="button" value="削除する" />
    </form>
    <?php
    if (isset($_POST['button'])) {
        $array = array();
    }
    ?>
    <?php
    foreach ($_SESSION['cart'] as $cart) {
        print_r($cart); ?>
        <div>
            <div>
            </div>
            <div>
                <?= $cart['name'] ?>
            </div>
            <div>
                <?= $cart['agent_id'] ?>
            </div>
            <div>
                <?= $cart['email'] ?>
            </div>
            <a href="./form.php? <?php $cart['agent_id'] ?>">編集</a>

        </div>
    <?php
    }

    ?>

</body>

</html>