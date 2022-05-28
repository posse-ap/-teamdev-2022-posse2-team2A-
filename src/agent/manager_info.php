
<!DOCTYPE html>
<html lang="ja">

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../user/reset.css">
    <link rel="stylesheet" href="../user/style.css">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <title>担当者情報</title>
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
    <main>
    <div class="tab-panel">
        <!--タブ-->
        <ul class="tab-group">
            <li id="tabA" class="tab tab-A"><a href="./index.php">応募者一覧</a></li>
            <li class="tab tab-B"><a href="./money.php">今月の支払予定額</a></li>
            <li class="tab tab-C is-active"><a href="./manager_info.php">担当者情報</a></li>
        </ul>
        <!--タブを切り替えて表示するコンテンツ-->
        <div class="panel-group">
            <div class="panel tab-A" id="tabApanel">
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
            <div id="panel" class="panel tab-B">
                Content-B
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
            </div>
            <div class="panel tab-C is-show">
                Content-C
                <form action="" method="POST" class="m-2 p-2">
                    <input type="hidden" value=<?php echo $data[0]; ?> name="agent_id">
                    <table class="">
                        <tr>
                            <th class="contact-item">担当者様のお名前<span style="color:red">*</span><br>Name(Kanji)</th>
                            <td class="contact-body">
                                <span class="inline-block">姓：<input class="m-2 rounded border-solid border-2" pattern="[\u4E00-\u9FFF\u3040-\u309Fー]*" type="text" name="first_name" placeholder="山田" required></span>
                                <span class="inline-block">名：<input class="m-2 rounded border-solid border-2"  pattern="[\u4E00-\u9FFF\u3040-\u309Fー]*" type="text" name="last_name" placeholder="太郎" required></span>
                            </td>
                        </tr>
                        <tr>
                            <th class="contact-item">フリガナ<span style="color:red">*</span><br>Name(Kana)</th>
                            <td class="contact-body">
                                <span class="inline-block">セイ：<input class="m-2 rounded border-solid border-2" pattern="[\u30A1-\u30F6]*" type="text" name="first_name_kana" placeholder="ヤマダ" required></span>
                                <span class="inline-block">カナ：<input class="m-2 rounded border-solid border-2" pattern="[\u30A1-\u30F6]*" type="text" name="last_name_kana" placeholder="タロウ" required></span>
                            </td>
                        </tr>
                        <tr>
                            <th class="contact-item">担当者様の部署名<span style="color:red">*</span><br>Department name</th>
                            <td class="contact-body">
                                <span class="inline-block"><input class="m-2 rounded border-solid border-2" type="text" name="department_name" placeholder="リクナビ" required></span>
                            </td>
                        </tr>
                        <tr>
                            <th class="contact-item">メールアドレス<span style="color:red">*</span><br>E-mail</th>
                            <td class="contact-body">
                                <span class="inline-block">メール：<input class=" rounded border-solid border-2 m-2" id="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" type="text" name="email" placeholder="△△△△△@ooo.xx" required></span>
                                <span class="inline-block">確認用：<input class=" rounded border-solid border-2 m-2" id="emailConfirm" type="text" name="email_check" placeholder="△△△△△@ooo.xx" required oninput="CheckEmail(this)"></span>
                            </td>
                        </tr>
                        <tr>
                            <th class="contact-item">電話番号<span style="color:red">*</span><br>Phone</th>
                            <td class="contact-body"><input class=" rounded border-solid border-2" type="text" pattern="^[0-9]+$" name="phone_number" placeholder="半角数字ハイフン無し" required></td>
                        </tr>
                    </table>
                    <div>
                        <input class="bg-yellow rounded-lg text-center w-full shadow-lg hover:shadow-none sm:w-2/5 p-4 text-sm sm:text-base" type="submit" value="編集確定">
                    </div>
                </form>
            </div>
        </div>
    </div>
    </main>
    <footer>
        <!-- jquery -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
        <script src="../user/script.js"></script>
    </footer>

</body>

</html>