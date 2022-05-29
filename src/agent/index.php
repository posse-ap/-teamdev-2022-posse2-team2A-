<?php
session_start();
require('../dbconnect.php');
// ログイン機能
if (isset($_SESSION['agent_id']) && $_SESSION['time'] + 60 * 60 * 24 > time()) {
    $_SESSION['time'] = time();
    $_SESSION['agent_login'] = true;
} else {
    header('Location: http://' . $_SERVER['HTTP_HOST'] . '/agent/login.php');
    exit();
}

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
$stmt->bindValue(':agent_id', $_SESSION["agent_id"], PDO::PARAM_STR);
$stmt->execute();
$customer_info = $stmt->fetchAll();


// agent_id=各企業のid
$agent_id = $_SESSION['agent_id'];
$agent = $db->prepare('SELECT * FROM customers ');
?>
<!DOCTYPE html>
<html lang="ja">



<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../user/reset.css">
    <link rel="stylesheet" href="../user/style.css">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <title>応募者一覧</title>
</head>

<body>
    <main class="relative">
        <div class="title-wrapper flex flex-row">
            <h1 class="title">CRAFT</h1>
            <h2 class="subtitle">ー企業管理画面</h2>
        </div>
        <a class="bg-yellow absolute top-1 right-10 rounded-lg text-center  shadow-lg hover:shadow-none p-4 text-sm sm:text-base" href="logout.php">ログアウト</a>
        <div class="agent_login_wrapper">
            <span class="ml-4">企業名：</span><span>HarborS 表参道</span>
            <span class="ml-4">ユーザー名：</span><span>harbors@gmail.com</span>
        </div>
        <div class="tab-panel">
            <!--タブ-->
            <ul class="tab-group">
                <li id="tabA" class="tab tab-A is-active"><a href="./index.php">応募者一覧</a></li>
                <li class="tab tab-B"><a href="./money.php">今月の支払予定額</a></li>
                <li class="tab tab-C"><a href="./manager_info.php">担当者情報</a></li>
            </ul>
            <!--タブを切り替えて表示するコンテンツ-->
            <div class="panel-group">
                <div class="panel tab-A is-show" id="tabApanel">
                    <div class="w-full mt-3 scroll">
                        <table>
                            <tr>
                                <th>対応ステータス</th>
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
                </div>
            </div>
        </div>
    </main>
        <!-- jquery -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
        <script src="../user/script.js"></script>
</body>

</html>
</div>

</body>

</html>