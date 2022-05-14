<?php
require("../dbconnect.php");

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
}
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
  <?php
  mb_language("Japanese");
  mb_internal_encoding("UTF-8");
  $to = "kamibayasitaito@keio.jp";
  $title = $_POST['email'];
  $content = "メール送信しましたご確認ください！";
  $headers = ['From' => 'テスト<foo@example.jp>', 'Content-Type' => 'text/plain; charset=UTF-8', 'Content-Transfer-Encoding' => '8bit'];
  if (mb_send_mail($to, $title, $content, $headers)) {
  } else {
  };
  ?>
</body>

</html>