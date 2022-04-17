# チーム開発2022サンプル

チーム開発用のサンプルです、これを使ってサクッと開発してください

# Note

ソースの取得
※コマンドを実行したフォルダにサンプルコードがダウンロードされます

```bash
git clone git@github.com:posse-ap/teamdev-2022-sample2.git
```

コンテナ起動

```bash
cd teamdev-2022-sample2
docker-compose build --no-cache
docker-compose up -d
```

ログインURL

```bash
http://localhost/
```

管理者画面ログイン情報

```bash
メールアドレス：test@posse-ap.com
パスワード：password
```

データ初期化

```bash
./mysql/data を削除後、コンテナ再起動
./mysql/docker-entrypoint-initdb.d/init.sql が実行され初期データが投入されます
```



■ルール　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　
わかりやすくて見やすいコードを書く

以下に必要なリンクを貼ってあります

モックアップ https://www.figma.com/files/team/1090155436400889107/%E3%83%81%E3%83%BC%E3%82%AB%E3%82%A42A?fuid=1029352838042404968

要件定義一覧　　https://docs.google.com/spreadsheets/d/1UWQtoMuN85u0DKIpdHiD0SS3gc2ranFmMUXdaJKteII/edit#gid=718830568

業務フロー　https://miro.com/app/board/uXjVOBlbv8g=/

ヒアリングシート　https://docs.google.com/spreadsheets/d/1UWQtoMuN85u0DKIpdHiD0SS3gc2ranFmMUXdaJKteII/edit#gid=0

共有事項　https://docs.google.com/document/d/15WnFupa_4YUMfLi4_9jwk9-RbfRAHHoSijSWyKyB7-k/edit

