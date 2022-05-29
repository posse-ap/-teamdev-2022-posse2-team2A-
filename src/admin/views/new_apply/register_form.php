<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="/admin/new_apply/register.php" method="POST">
        <p>会員登録</p>
        <input type="hidden" name="_csrf_token" value="<?= $_SESSION['_csrf_token']; ?>">
        <input type="hidden" name="register_token" value="<?= $registerToken; ?>">
        <label>パスワード
            <input type="password" name="password">
        </label>
        <br>
        <label>パスワード（確認用）
            <input type="password" name="password_confirmation">
        </label>
        <br>
        <button type="submit">登録</button>
    </form>
</body>

</html>