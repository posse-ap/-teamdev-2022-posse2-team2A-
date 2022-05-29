<?php
session_start();
require(dirname(__FILE__) . "../../dbconnect.php");
// ログイン機能
if (isset($_SESSION['admin_id']) && $_SESSION['time'] + 60 * 60 * 24 > time()) {
    $_SESSION['time'] = time();
} else {
    header('Location: http://' . $_SERVER['HTTP_HOST'] . '/admin/login.php');
    exit();
}
$data = explode(",", $_SERVER['QUERY_STRING']);
echo $data[0];


$stmt = $db->prepare(
    'SELECT * FROM
intermediate
LEFT JOIN
agents
ON
intermediate.agent_id = agents.id
RIGHT JOIN
customers
ON
intermediate.customer_id= customers.id
WHERE
agent_id=:agent_id'
);
$stmt->bindValue(':agent_id',  $data[0], PDO::PARAM_STR);
$stmt->execute();
$customer_info = $stmt->fetchAll();
$stmt->execute();
$agent_name = $stmt->fetch();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../user/reset.css">
    <link rel="stylesheet" href="../user/style.css">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <title>応募者一覧</title>
</head>

<body>
    <div class="w-full mt-3 scroll">
        <table>
            <tr>
                <th>対応ステータス</th>
                <th>応募先企業名</th>
                <th>氏名</th>
                <th>氏名カナ</th>
                <th>生年月日</th>
                <th>性別</th>
                <th>メールアドレス</th>
                <th>電話番号</th>
                <th>住所</th>
                <th>学校学部学科</th>
                <th>卒業年度</th>
                <th>質問等</th>
            </tr>
            <?php foreach ($customer_info as $key => $info) {
                $education = $info['education'] . $info['department'] . $info['major_subject'] ?>
                <tr class="white">
                    <td>対応中</td>
                    <td><?= $agent_name['agent_name'] ?></td>
                    <td><?= $info['name'] ?></td>
                    <td><?= $info['name_kana'] ?></td>
                    <td><?= $info['birth'] ?></td>
                    <td><?= $info['sex'] ?></td>
                    <td><?= $info['email'] ?></td>
                    <td><?= $info['phone_number'] ?></td>
                    <td><?= $info['address'] ?></td>
                    <td><?= $education ?></td>
                    <td><?= $info['graduation_year'] ?></td>
                    <td><?= $info['comments'] ?></td>
                </tr>
            <?php } ?>

        </table>
    </div>
    <div class="text-green-600 text-sm text-right mr-2 mt-2">
        <a href="./index.php"> 企業一覧に戻る</a>
    </div>
</body>

</html>