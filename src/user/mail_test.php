<html>
<head>
  <meta charset="utf-8" />
</head>
<body>
<?php
  mb_language("Japanese");
  mb_internal_encoding("UTF-8");

  $to = $_POST['to'];
  $title = $_POST['title'];
  $message = $_POST['message'];
  $headers = "From: from@example.com";

  print_r($message);
  print_r($headers);

  if(mb_send_mail($to, $title, $message, $headers))
  {
    echo "メール送信成功です";
  }
  else
  {
    echo "メール送信失敗です";
  }
 ?>
</body>
</html>