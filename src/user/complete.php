<?php
session_start();
require("../dbconnect.php");
// データベース上のemailをとってくる
$stmt_exist_email = $db->prepare('SELECT id FROM customers where email =:email');
$stmt_exist_email->bindValue(":email", $_POST['email'], PDO::PARAM_STR);
$stmt_exist_email->execute();
$customer_exist_id = $stmt_exist_email->fetch();

$stmt = $db->prepare('SELECT * FROM agents WHERE id = ' . $_POST['agent_id']);
$stmt->execute();
$agent_info = $stmt->fetch();

// postに物が入ってきたら
if (!empty($_POST)) {
  // emailが既に登録されているユーザーじゃなければ
  if (empty($customer_exist_id)) {
    $stmt_customers_created_at = $db->prepare('SELECT id
    FROM customers ORDER BY id DESC LIMIT 1');
    $stmt_customers_created_at->execute();
    $customer_id = $stmt_customers_created_at->fetch();
    $customer_id = $customer_id['id'] + 1;
    $stmt_customers = $db->prepare('INSERT INTO customers SET 
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
    graduation_year=?,
    graduation_status=?
    ');
    $stmt_customers->execute(array(
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
      $_POST['graduation_year'],
      $_POST['graduation_status']
    ));

    $email = $_POST['email'];
    // URLはご自身の環境に合わせてください

    $subject =  '申込完了のお知らせ';
    $agent_name = $agent_info['agent_name'];
    $agent_email = $agent_info['email'];

    $body = <<<EOD
            
  
            {$agent_name}様への申し込みが完了しました。
            連絡をお待ちください。
            お問い合わせは
            {$agent_email}
            こちらのメールアドレスまでお願いいたします。

            EOD;

    // Fromはご自身の環境に合わせてください
    $headers = ['From' => 'boozer.jp', 'Content-Type' => 'text/plain; charset=UTF-8', 'Content-Transfer-Encoding' => '8bit'];

    // mb_send_mailは成功したらtrue、失敗したらfalseを返す
    $isSent = mb_send_mail($email, $subject, $body, $headers);
  } else {
    $customer_id = $customer_exist_id['id'];
  }
  $stmt_exist_intermediate = $db->prepare('SELECT * FROM intermediate where agent_id =:agent_id and customer_id = :customer_id');
  $stmt_exist_intermediate->bindValue(":agent_id", $_POST['agent_id'], PDO::PARAM_STR);
  $stmt_exist_intermediate->bindValue(":customer_id", $customer_id, PDO::PARAM_STR);
  $stmt_exist_intermediate->execute();
  $exist_intermediate_id = $stmt_exist_intermediate->fetch();

  if (empty($exist_intermediate_id)) {
    $stmt_agents = $db->prepare('INSERT INTO intermediate SET 
    agent_id = ?,
    customer_id =?,
    comments =?
    ');
    $stmt_agents->execute(array(
      $_POST['agent_id'],
      $customer_id,
      $_POST['comments']
    ));
  };
}
$email = $agent_info['email'];
// URLはご自身の環境に合わせてください
$url = "http://localhost:80/agent/login.php";
$subject =  '新規申込の方がいらっしゃいます';

$body = <<<EOD
        

        新規申込の方がいらっしゃいます。
        ログインしてご確認をお願いいたします
        {$url}


        EOD;

// Fromはご自身の環境に合わせてください
$headers = ['From' => 'boozer.jp', 'Content-Type' => 'text/plain; charset=UTF-8', 'Content-Transfer-Encoding' => '8bit'];

// mb_send_mailは成功したらtrue、失敗したらfalseを返す
$isSent = mb_send_mail($email, $subject, $body, $headers);

?>

<!DOCTYPE html>
<?php
$_TNX = '<span>一週間以内にご連絡しますので、しばらくお待ちください。</span>';
$_TNX2 = 'なお、登録手続き完了のメールを登録していただいたアドレスあてに送信しましたので、そちらの内容もご確認ください。';
$_ENGver = 'The confirmation e-mail has been sent to you. <br><span>We will contact you again in a week.</span> Thank you.';
$_BTP = '一覧に戻る';
?>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./style.css">
  <link rel="stylesheet" href="./reset.css">
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
  <title>ThanksPage</title>
</head>

<body>
  <?php
  require(dirname(__FILE__) . "/components/_header.php");
  ?>
  <main>
    <div class="title-wrapper">
      <h1 class="title">CRAFT</h1>
      <h2 class="subtitle">就活生のための就活情報サイト</h2>
    </div>
    <div class="flex justify-center">
      <div class="progressbar">
        <div class="item">登録</div>
        <div class="item">確認</div>
        <div class="item-last active">お問い合わせ完了</div>
      </div>
    </div>
    <div class="text-center">
      <h1 class="text-3xl font-bold mb-8 ">お問い合わせが完了しました！！</h1>
      <p class="mx-20 line-relaxed mb-1 linetext"><?= $_TNX; ?></p>
      <p class="mx-20 line-relaxed "><?= $_TNX2; ?></p>
      <p class="mx-20 line-relaxed py-4 linetext"><?= $_ENGver; ?></p>
    </div>
    <div class="w-50% h-10 align-center">
      <a href="./top-page.php" class="btn"><span><?= $_BTP ?></span></a>
    </div>
  </main>
</body>

</html>