<html>
<head>
  <meta charset="utf-8" />
</head>
<body>
  <form action="./mail_test.php" method="post">
    <p>送り先</p><input type="text" name="to" value="kamibayasitaito@keio.jp">
    <p>件名</p><input type="text" name="title" value="こんにtは">
    <p>メッセージ</p><input type="hidden" name="message" value="こんにちは">
    <p><input type="submit" name="send" value="送信"></p>
  </form>
</body>
</html>