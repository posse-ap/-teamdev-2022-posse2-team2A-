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

$stmt = $db->query('SELECT * FROM agents');
$agents = $stmt->fetchAll(PDO::FETCH_ASSOC);

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
    <a href="logout.php">ログアウト</a>
    <div class="tab-panel">
        <!--タブ-->
        <ul class="tab-group">
            <li id="tabA" class="tab tab-A is-active">企業一覧</li>
            <li class="tab tab-B">企業情報追加</li>
            <li class="tab tab-C">企業情報変更</li>
        </ul>
        <!--タブを切り替えて表示するコンテンツ-->
        <div class="panel-group">
            <div class="panel tab-A is-show" id="tabApanel">
                <div class="w-full mt-3 scroll">
                    <table>
                        <tr>
                            <th>企業名</th>
                            <th>表示ステータス</th>
                            <th>担当者名</th>
                            <th>フリガナ</th>
                            <th>メールアドレス</th>
                            <th>電話番号</th>
                            <th>今月の問い合わせ人数</th>
                            <th>今月の報酬予定額</th>
                            <th>企業情報</th>
                        </tr>
                        <?php foreach ($agents as $key => $agent) : ?>
                            <tr class="white">
                                <td onclick="showInfo({hidden:panel, show:memberDetail})"><?= $agent["agent_name"]; ?> </td>
                                <td>表示</td>
                                <td><?= $agent["pic_name"]; ?>
                                </td>
                                <td><?= $agent["pic_name_kana"]; ?> </td>
                                <td><?= $agent["email"]; ?> </td>
                                <td><?= $agent["phone_number"]; ?> </td>
                                <td><?= $agent["phone_number"]; ?> </td>
                                <td><?= $agent["phone_number"]; ?> </td>
                                <td>
                                    <a href="./add_agents.php?<?= $agent["id"] ?>">
                                        企業情報追加
                                    </a>
                                </td>
                                <td>
                                    <a href="./change_agents.php?<?= $agent["id"] ?>">
                                        企業情報変更
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
            <div id="memberDetail" class="memberDetail">
                <div class="status">
                    <div class="w-full text-center">
                        <button onclick="prev()">＜</button>
                        <span id="monthText" class="mx-2"></span>
                        <button onclick="next()">＞</button>
                    </div>
                    <div class="w-full flex justify-center">
                        <div class="flex items-center m-6">エントリー人数</div>
                        <div class="text-center m-6"><span class="text-3xl font-bold">10</span><br>人</div>
                        <div class="flex items-center m-6">報酬予定額</div>
                        <div class="text-center m-6"><span class="text-2xl font-bold">200000</span><br>円</div>
                    </div>
                </div>
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
                            <th>非対応理由</th>
                        </tr>
                        <tr class="white">
                            <td>対応中</td>
                            <td>Daiso</td>
                            <td>takaharatomoaki</td>
                            <td>タカハラトモアキ</td>
                            <td>2000年9月16日</td>
                            <td>未回答</td>
                            <td>b@gmail.com</td>
                            <td>09098764321</td>
                            <td>〒999-3421沖縄県石垣市大浜9-5</td>
                            <td>琉球大学人文社会学部琉球アジア文化学科</td>
                            <td>23卒</td>
                            <td>なし</td>
                            <td></td>
                        </tr>
                        <tr class="mint">
                            <td>非対応</td>
                            <td>amazon</td>
                            <td>たか</td>
                            <td>タカ</td>
                            <td>1895年4月1日</td>
                            <td>女性</td>
                            <td>a@gmeil.com</td>
                            <td>08012346789</td>
                            <td>〒000-678東京都港区南大山3丁目15-9 MINOWA 3階</td>
                            <td>posse大学Web製作学部フロント学科</td>
                            <td>24卒</td>
                            <td>特になし</td>
                            <td>重複応募のため</td>
                        </tr>
                    </table>
                </div>
                <div class="text-green-600 text-sm text-right mr-2 mt-2" onclick="returninfo({undo:memberDetail, display:panel})">
                    企業一覧に戻る
                </div>
            </div>
            <div id="panel" class="panel tab-B">
                <table>
                    <tr>
                        <th>企業名</th>
                        <th>住所</th>
                        <th>担当者名</th>
                        <th>フリガナ</th>
                        <th>メールアドレス</th>
                        <th>電話番号</th>
                        <th>自由記入欄</th>
                        <th>メール送信</th>
                        <th>削除</th>
                    </tr>
                    <?php
                    $stmt = $db->query('SELECT * FROM apply_agents');
                    $apply_agents = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($apply_agents as $key => $apply_agent) : ?>
                        <tr class="white">
                            <td><?= $apply_agent["agent_name"]; ?> </td>
                            <td><?= $apply_agent["address"]; ?> </td>
                            <td><?= $apply_agent["email"]; ?></td>
                            <td><?= $apply_agent["phone_number"]; ?> </td>
                            <td><?= $apply_agent["pic_name"]; ?> </td>
                            <td><?= $apply_agent["pic_name_kana"]; ?> </td>
                            <td><?= $apply_agent["comments"]; ?> </td>
                            <td>
                                <form action="./new_agent_mail.php" method="post">
                                    <input type="hidden" name="email" value="<?= $apply_agent["email"]; ?>">
                                    <input type="submit" value="この企業に新規登録メールを送る">
                                </form>
                            </td>
                            <td>
                                <form action="./delete_apply_agents.php" method="post">
                                    <input type="hidden" name="id" value="<?= $apply_agent["id"]; ?>">
                                    <input type="submit" value="削除する">
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
            <div class="panel tab-C">Content-C</div>
        </div>
    </div>
    <footer>
        <!-- jquery -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
        <script src="../user/script.js"></script>
    </footer>
</body>

</html>