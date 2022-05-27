<?php
session_start();
require(dirname(__FILE__) . "../../dbconnect.php");

$stmt = $db->query('SELECT * FROM customers');
$customers = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../user/reset.css">
    <link rel="stylesheet" href="../user/style.css">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <title>企業情報追加</title>
</head>
<body>
<main>
    <div class="tab-panel">
        <!--タブ-->
        <ul class="tab-group">
            <li id="tabA" class="tab tab-A"><a href="./index.php">企業一覧</a></li>
            <li class="tab tab-B is-active">企業情報追加</li>
            <li class="tab tab-C">企業情報変更</li>
        </ul>
        <!--タブを切り替えて表示するコンテンツ-->
        <div class="panel-group">
            <div class="panel tab-A " id="tabApanel">
                <div class="w-full mt-3 scroll">
                    <table>
                        <tr>
                            <th>企業名</th>
                            <th>表示ステータス</th>
                            <th>担当者名</th>
                            <th>部署名</th>
                            <th>役所名</th>
                            <th>メールアドレス</th>
                            <th>電話番号</th>
                            <th>今月の問い合わせ人数</th>
                            <th>今月の報酬予定額</th>
                            <th>編集</th>
                        </tr>
                        <tr class="white">
                            <td onclick="showInfo({hidden:panel, show:memberDetail})">amazon</td>
                            <td>表示</td>
                            <td>takaharatomoaki</td>
                            <td>a</td>
                            <td>a</td>
                            <td>a</td>
                            <td>a</td>
                            <td>a</td>
                            <td>a</td>
                            <a href="./change_agents.php"><td>企業情報変更</td></a>
                        </tr>
                        <tr class="mint">
                            <td>amazon</td>
                            <td>表示</td>
                            <td>たか</td>
                            <td>aaaaaaaaaaaaaaaaaaaaaaaa</td>
                            <td>aaaaaaaaaaaaaa</td>
                            <td>aaaaaaaaaaaaaaaaaaa</td>
                            <td>a</td>
                            <td>a</td>
                            <td>a</td>
                            <td><a href="./add_agents.php">企業情報追加</a></td>
                        </tr>
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
                <div class="text-green-600 text-sm text-right mr-2 mt-2" onclick="returninfo({undo:memberDetail, display:panel})">企業一覧に戻る</div>
            </div>
            <div id="panel" class="panel tab-B is-show">
                Content-B
                <form class="agent-list-item" action="" method="post" enctype="multipart/form-data">
                    <div class="text-wrapper">
                        <p class="text1"><input type="text" name="agent_name" placeholder="企業名"></p>
                    </div>
                    <div class="agent-pr-wrapper">
                        <div class="flex flex-col">
                            <img class="block w-52 h-48  object-contain" id="preview" src="./スクリーンショット 2022-05-25 0.37.48.png" alt="プレビュー">
                            <input type="file" name="img" onchange="previewFile(this);">
                        </div>
                        <ul class="agent-pr-list">
                            <li class="agent-pr-item strong rounded border-solid border-2 m-2"><input type="text" placeholder="３大アピールポイント"></li>
                            <li class="agent-pr-item strong rounded border-solid border-2 m-2"><input type="text" placeholder="３大アピールポイント"></li>
                            <li class="agent-pr-item strong rounded border-solid border-2 m-2"><input type="text" placeholder="３大アピールポイント"></li>
                        </ul>
                    </div>
                    <table class="agent-info-table mt-4 mb-4">
                        <tbody>
                            <tr>
                                <th>求人数</th>
                                <th>非公開求人数</th>
                                <th>対象年代</th>
                                <th>エリア</th>
                            </tr>
                            <tr>
                                <td><input class="rounded border-solid border-2" type="text"></td>
                                <td><input class="rounded border-solid border-2" type="text"></td>
                                <td><input class="rounded border-solid border-2" type="text"></td>
                                <td><input class="rounded border-solid border-2" type="text"></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="field-wrapper flex flex-row items-center bg-blue-200 mt-4 mb-4">
                        <p class="field-text text-blue-600 w-10 text-xs text-center m-4">得意分野</p>
                        <ul class="field flex flex-wrap text-xs">
                            <li id="fieldItem0" class="field-item text-white bg-gray-500 rounded-2xl m-1 p-1"><input type="checkbox">大手企業</li>
                            <li id="fieldItem1" class="field-item text-white bg-gray-500 rounded-2xl m-1 p-1"><input type="checkbox">外資・海外</li>
                            <li id="fieldItem2" class="field-item text-white bg-gray-500 rounded-2xl m-1 p-1"><input type="checkbox">ベンチャー</li>
                            <li id="fieldItem3" class="field-item text-white bg-gray-500 rounded-2xl m-1 p-1"><input type="checkbox">ハイクラス</li>
                            <li id="fieldItem4" class="field-item text-white bg-gray-500 rounded-2xl m-1 p-1"><input type="checkbox">IT業界</li>
                            <li id="fieldItem5" class="field-item text-white bg-gray-500 rounded-2xl m-1 p-1"><input type="checkbox">女性向け</li>
                            <li id="fieldItem6" class="field-item text-white bg-gray-500 rounded-2xl m-1 p-1"><input type="checkbox">第二新卒</li>
                            <li id="fieldItem7" class="field-item text-white bg-gray-500 rounded-2xl m-1 p-1"><input type="checkbox">フリーター</li>
                            <li id="fieldItem8" class="field-item text-white bg-gray-500 rounded-2xl m-1 p-1"><input type="checkbox">未経験</li>
                            <li id="fieldItem9" class="field-item text-white bg-gray-500 rounded-2xl m-1 p-1"><input type="checkbox">中小企業</li>
                            <li class="field-item m-1 p-1">選択してください</li>
                        </ul>
                    </div>
                    <p class="agent-pr-text border-solid rounded-2xl w-full bg-white mt-4 mb-4 p-2">
                        PRポイント
                        <textarea class="w-full" name="pr_comments" id="" cols="30" rows="10"></textarea>
                    </p>
                    <div class="btn-wrapper">                    
                        <input class="entry-btn bg-red-500 text-white rounded-3xl m-1 p-3 pl-20 pr-20" type="submit" value="企業を追加する"></a>
                    </div>
                </form>
            </div>
            <div class="panel tab-C">Content-C</div>
        </div>
    </div>
    </main>
    
</body>
</html>