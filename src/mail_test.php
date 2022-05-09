<?php

$to      = "hoge@localhost.local";
$subject = "TEST";
$message = "メールテスト";
$headers = "From: from@example.com";

var_dump(mb_send_mail($to, $subject, $message, $headers));
