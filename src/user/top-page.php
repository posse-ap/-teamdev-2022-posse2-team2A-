<?php
require_once('../dbconnect.php');
$stmt = $db->prepare('SELECT * FROM agent_contents ');
$stmt->execute();
$agent_infos = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./reset.css">
    <link rel="stylesheet" href="./style.css">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <title>ユーザーtop画面</title>
</head>

<body>
    <!-- ユーザー画面の全てにこれを入れる -->
    <!-- header -->
    <?php
    require(dirname(__FILE__) . "/components/_header.php");
    ?>
    <!-- navigation -->
    <?php
    require(dirname(__FILE__) . "/components/_nav.php");
    ?>


    <!-- mainここから -->
    <main>
        <div class="title-wrapper">
            <h1 class="title">CRAFT</h1>
            <h2 class="subtitle">就活生のための就活情報サイト</h2>
        </div>
        <div class="agent-container">
            <span class="agent-container-title">企業一覧</span>
            <ul class="agent-list">
                <!-- 例ここから -->
                <!-- 例1 -->
                <?php foreach ($agent_infos as $key => $agent_info) { ?>
                    <li class="agent-list-item">
                        <div class="text-wrapper">
                            <p class="text1"><?= $agent_info['agent_name'] ?></p>
                            <p class="text2 strong"><?= $agent_info['special_feature'] ?></p>
                        </div>
                        <div class="agent-pr-wrapper">
                            <img class="agent-pr-img" src="./agent-image.png" alt="">
                            <ul class="agent-pr-list">
                                <li class="agent-pr-item strong"><?= $agent_info['feature1'] ?></li>
                                <li class="agent-pr-item strong"><?= $agent_info['feature2'] ?></li>
                                <li class="agent-pr-item strong"><?= $agent_info['feature3'] ?></li>
                                <li class="agent-pr-item"><?= $agent_info['feature4'] ?></li>
                                <li class="agent-pr-item"><?= $agent_info['feature5'] ?></li>
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
                                    <td><?= $agent_info['recruitment_number'] ?></td>
                                    <td><?= $agent_info['private_recruitment_number'] ?></td>
                                    <td><?= $agent_info['target_age'] ?></td>
                                    <td><?= $agent_info['area'] ?></td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="field-wrapper flex flex-row items-center bg-blue-200 mt-4 mb-4">
                            <p class="field-text text-blue-600 w-10 text-xs text-center m-4">得意分野</p>
                            <ul class="field flex flex-wrap text-xs">
                                <li class="field-item text-white bg-blue-600 rounded-2xl m-1 p-1">大手企業</li>
                                <li class="field-item text-white bg-blue-600 rounded-2xl m-1 p-1">外資・海外</li>
                                <li class="field-item text-white bg-blue-600 rounded-2xl m-1 p-1">ベンチャー</li>
                                <li class="field-item text-white bg-blue-600 rounded-2xl m-1 p-1">ハイクラス</li>
                                <li class="field-item text-white bg-blue-600 rounded-2xl m-1 p-1">IT業界</li>
                                <li class="field-item text-white bg-blue-600 rounded-2xl m-1 p-1">女性向け</li>
                                <li class="field-item text-white bg-blue-600 rounded-2xl m-1 p-1">第二新卒</li>
                                <li class="field-item text-white bg-blue-600 rounded-2xl m-1 p-1">フリーター</li>
                                <li class="field-item text-white bg-blue-600 rounded-2xl m-1 p-1">未経験</li>
                                <li class="field-item text-white bg-blue-600 rounded-2xl m-1 p-1">中小企業</li>
                            </ul>
                        </div>
                        <p class="agent-pr-text border-solid rounded-2xl w-full bg-white mt-4 mb-4 p-2">
                            PRポイント
                            <br>
                            <?= $agent_info['pr_point'] ?>
                        </p>
                        <div class="btn-wrapper">
                            <a href="./form.php?1"><button class="entry-btn bg-red-500 text-white rounded-3xl m-1 p-3 pl-20 pr-20">この企業に問い合わせる</button></a>
                        </div>
                    </li>
                <?php } ?>


                <!-- 例ここまで -->
            </ul>
        </div>
    </main>
    <!-- mainここまで -->

    <!-- アイコンの部分 -->
    <?php
    require(dirname(__FILE__) . "/components/_mainFooter.php");
    ?>
    <!-- footer -->
    <?php
    require(dirname(__FILE__) . "/components/_footer.php");
    ?>
    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="./script.js"></script>
</body>

</html>