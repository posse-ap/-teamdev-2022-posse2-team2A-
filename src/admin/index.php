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

$stmt = $db->query('SELECT * FROM customers');
$customers = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../user/style.css">
    <link rel="stylesheet" href="../user/reset.css">
    <script src="../user/script.js"></script>
    <title>応募者一覧</title>
</head>

<body>
    <ul>
        <?php foreach ($customers as $key => $customer) : ?>
            <li>
                <?= $customer["id"]; ?>
                <?= $customer["name"]; ?>
                <?= $customer["name_kana"]; ?>
                <?= $customer["sex"]; ?>
                <?= $customer["birth"]; ?>
                <?= $customer["address"]; ?>
                <?= $customer["email"]; ?>
                <?= $customer["phone_number"]; ?>
                <?= $customer["education"]; ?>
                <?= $customer["major"]; ?>
                <?= $customer["department"]; ?>
                <?= $customer["major_subject"]; ?>
                <?= $customer["comments"]; ?>
            </li>
        <?php endforeach; ?>
    </ul>
    <a href="logout.php">ログアウト</a>
    <div class="tab-panel">
	<!--タブ-->
	<ul class="tab-group">
		<li class="tab tab-A is-active">応募者一覧</li>
		<li class="tab tab-B">今月の支払い予定額</li>
		<li class="tab tab-C">担当者情報</li>
	</ul>
	
	<!--タブを切り替えて表示するコンテンツ-->
    <div class="panel-group">
		<div class="panel tab-A is-show">
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
          <th>学校、学部学科</th>
          <th>卒業年度</th>
          <th>質問等</th>
          <th>非対応の理由</th>
        </tr>
      </table>
    </div>
		<div class="panel tab-B">Content-B</div>
		<div class="panel tab-C">Content-C</div>
	</div>
</div>
</body>

</html>