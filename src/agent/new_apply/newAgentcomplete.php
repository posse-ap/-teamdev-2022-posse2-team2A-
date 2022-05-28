<!DOCTYPE html>
<?php
$_REGJP = 'お問い合わせが完了しました。';
$_REG = 'Registration completed.';
$_TNX = '一週間以内にご連絡しますので、しばらくお待ちください。';
$_TNX2 = 'なお、<span>登録手続き完了のメールを登録していただいたアドレスあてに送信しましたので</span>、そちらの内容もご確認ください。';
$_ENGver = '<span>The confirmation e-mail has been sent to you.</span><br>We will contact you again in a week. Thank you.';
?>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../user/reset.css">
  <link rel="stylesheet" href="../../user/style.css">
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
  <title>ThanksPage</title>
</head>

<body>
  <!-- header -->
  <?php
  require("../../user/components/_header.php");
  ?>
  <!-- navigation -->
  <?php
  require("../../user/components/_nav.php");
  ?>
  <main>
    <div class="title-wrapper flex-column">
      <h1 class="title">CRAFT</h1>
      <h2 class="subtitle">就活生のための就活情報サイト</h2>
    </div>
    <div class="flex justify-center mr-3">
      <div class="progressbar">
        <div class="item">登録情報入力</div>
        <div class="item">入力内容確認</div>
        <div class="item-last active">登録完了</div>
      </div>
    </div>
    <div class="text-center">
      <h1 class="text-2xl font-bold sm:text-3xl"><?= $_REGJP ?></h1>
      <h2 class="text-base font-bold mb-7"><?= $_REG ?></h2>
      <p class="mx-20 line-relaxed mb-1 text-sm sm:text-base"><?= $_TNX; ?></p>
      <p class="mx-20 line-relaxed text-sm sm:text-base linetext"><?= $_TNX2; ?></p>
      <p class="mx-20 line-relaxed py-4 text-sm sm:text-base linetext"><?= $_ENGver; ?></p>
    </div>
    <!-- footer -->
    <?php
    require("../../user/components/_footer.php");
    ?>
    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="../../user/script.js"></script>
  </main>
</body>

</html>