
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
    <main class="relative">
    <div class="title-wrapper flex flex-row">
        <h1 class="title">CRAFT</h1>
        <h2 class="subtitle">ー企業管理画面</h2>
    </div>
    <a class="bg-yellow absolute top-1 right-10 rounded-lg text-center  shadow-lg hover:shadow-none p-4 text-sm sm:text-base" href="logout.php">ログアウト</a>
    <div class="agent_login_wrapper">
        <span class="ml-4">企業名：</span><span>HarborS 表参道</span>
        <span class="ml-4">ユーザー名：</span><span>harbors@gmail.com</span>
    </div>
    <div class="tab-panel">
        <!--タブ-->
        <ul class="tab-group">
            <li id="tabA" class="tab tab-A"><a href="./index.php">応募者一覧</a></li>
            <li class="tab tab-B is-active"><a href="./money.php">今月の支払予定額</a></li>
            <li class="tab tab-C"><a href="./manager_info.php">担当者情報</a></li>
        </ul>
        <!--タブを切り替えて表示するコンテンツ-->
        <div class="panel-group">
            <div id="panel" class="panel tab-B is-show">
                <div class="status">
                    <div class="w-full text-center text">
                        <button onclick="prev()">＜</button>
                        <span id="monthText" class="mx-2"></span>
                        <button onclick="next()">＞</button>
                    </div>
                    <div class="w-full flex justify-center mt-10">
                        <div class="flex items-center m-6">エントリー人数</div>
                        <div class="text-center m-6"><span class="text-3xl font-bold">10</span><br>人</div>
                        <div class="flex items-center m-6">報酬予定額</div>
                        <div class="text-center m-6"><span class="text-2xl font-bold">200000</span><br>円</div>
                    </div>
                </div>
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