<?php
// 日本語が文字化けしないよう、設定。php.iniで設定してあれば不要

mb_language("Japanese");
mb_internal_encoding("UTF-8");

if ($_POST['email']) {

    $email = $_POST['email'];
    // URLはご自身の環境に合わせてください

    $url = "http://localhost:80/agent/new_apply/show_tmp_register_form.php";
    $subject =  '新規掲載承認のお知らせ';

    $body = <<<EOD
            新規掲載をさせていただくことになりました。こちらのURLからログイン情報の登録をお願いいたします
    
            {$url}
            EOD;

    // Fromはご自身の環境に合わせてください
    $headers = ['From' => 'boozer.jp', 'Content-Type' => 'text/plain; charset=UTF-8', 'Content-Transfer-Encoding' => '8bit'];

    // mb_send_mailは成功したらtrue、失敗したらfalseを返す
    $isSent = mb_send_mail($email, $subject, $body, $headers);

    header('Location:index.php');
    if (!$isSent) throw new \Exception('メール送信に失敗しました。');
}
