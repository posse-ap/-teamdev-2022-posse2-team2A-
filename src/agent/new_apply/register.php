<?php
session_start();

require_once '../../dbconnect.php';

$request = filter_input_array(INPUT_POST);

// csrf tokenが正しければOK
if (
    empty($request['_csrf_token'])
    || empty($_SESSION['_csrf_token'])
    || $request['_csrf_token'] !== $_SESSION['_csrf_token']
) {
    exit('不正なリクエストです');
}



// 本来はここでpasswordとregister_tokenのバリデーションをする

$sql = 'UPDATE agents SET 
    password = :password,
    register_token_verified_at = :register_token_verified_at,
    status = :status,
    agent_name=:agent_name,
    pic_name=:pic_name,
    pic_name_kana=:pic_name_kana,
    department_name=:department_name,
    phone_number=:phone_number
    WHERE register_token = :register_token';

// テーブルに登録するパスワードをハッシュ化
$hashedPassword = sha1($request['password']);

$pic_name = $_POST['first_name'] . $_POST['last_name'];
$pic_name_kana = $_POST['first_name_kana'] . $_POST['last_name_kana'];

// 仮登録ユーザーを本登録（パスワードを登録し、ステータスを本登録ステータスにする）
$stmt = $db->prepare($sql);
$stmt->bindValue(':password', $hashedPassword, \PDO::PARAM_STR);
$stmt->bindValue(':register_token_verified_at', (new \DateTime())->format('Y-m-d H:i:s'), \PDO::PARAM_STR);
$stmt->bindValue(':status', 'public', \PDO::PARAM_STR);
$stmt->bindValue(':agent_name', $_POST['agent_name'], \PDO::PARAM_STR);
$stmt->bindValue(':pic_name', $pic_name, \PDO::PARAM_STR);
$stmt->bindValue(':pic_name_kana', $pic_name_kana, \PDO::PARAM_STR);
$stmt->bindValue(':department_name', $_POST['department_name'], \PDO::PARAM_STR);
$stmt->bindValue(':phone_number', $_POST['phone_number'], \PDO::PARAM_STR);
$stmt->bindValue(':register_token', $request['register_token'], \PDO::PARAM_STR);

$stmt->execute();

echo '新規登録が完了しました。<br/>　ログイン画面からログインしてください。';
