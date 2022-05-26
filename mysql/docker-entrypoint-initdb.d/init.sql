DROP SCHEMA IF EXISTS shukatsu;

CREATE SCHEMA shukatsu;

USE shukatsu;

DROP TABLE IF EXISTS admin;

CREATE TABLE admin (
    id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO
    admin
SET
    email = 'test@posse-ap.com',
    password = sha1('password');

DROP TABLE IF EXISTS agents;

CREATE TABLE agents (
    id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    name VARCHAR(255) UNIQUE NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO
    agents
SET
    email = 'agent@posse-ap.com',
    password = sha1('password2'),
    name = "リクルート";

INSERT INTO
    agents
SET
    email = 'jobTV@posse-ap.com',
    password = sha1('password3'),
    name = "jobTV";

DROP TABLE IF EXISTS passwords_reset;

CREATE TABLE password_resets (
    email varchar(50) PRIMARY KEY,
    token varchar(80) NOT NULL,
    token_sent_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

DROP TABLE IF EXISTS customers;

CREATE TABLE customers (
    id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    name_kana VARCHAR(255) NOT NULL,
    sex VARCHAR(255) NOT NULL,
    birth VARCHAR(255) NOT NULL,
    address VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    phone_number VARCHAR(255) NOT NULL,
    education VARCHAR(255) NOT NULL,
    major VARCHAR(255) NOT NULL,
    department VARCHAR(255) NOT NULL,
    major_subject VARCHAR(255) NOT NULL,
    graduation_year INT NOT NULL,
    graduation_status VARCHAR(80) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

DROP TABLE IF EXISTS intermediate;

CREATE TABLE intermediate (
    id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    agent_id INT NOT NULL,
    customer_id INT,
    comments VARCHAR(80)
);

INSERT INTO
    customers
SET
    name = "渡邉瑛貴",
    name_kana = "わたなべえいき",
    sex = "男",
    birth = "2001-10-12",
    address = "神奈川県横浜市港北区",
    email = "test@com",
    phone_number = "000-0000-1111",
    education = "慶應義塾大学",
    major = "文系",
    department = "経済学科",
    major_subject = "渡邉瑛貴",
    graduation_year = 2023,
    graduation_status = "卒業見込み";

INSERT INTO
    customers
SET
    name = "多田和樹",
    name_kana = "ただかずき",
    sex = "男",
    birth = "2002-09-12",
    address = "神奈川県横浜市港北区",
    email = "test@com",
    phone_number = "000-0000-1111",
    education = "慶應義塾大学",
    major = "文系",
    department = "経済学部",
    major_subject = "経済学科",
    graduation_year = 2023,
    graduation_status = "卒業見込み";

INSERT INTO
    customers
SET
    name = "鈴木楓花",
    name_kana = "すずきかのか",
    sex = "女",
    birth = "2002-01-06",
    address = "神奈川県横浜市港北区",
    email = "test@com",
    phone_number = "000-0000-1111",
    education = "昭和音楽大学",
    major = "文系",
    department = "ミュージカル学部",
    major_subject = "ミュージカル学科",
    graduation_year = 2025,
    graduation_status = "卒業見込み";

DROP TABLE IF EXISTS agent_contents;

CREATE TABLE agent_contents (
    id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    agent_id INT NOT NULL,
    agent_name VARCHAR(255) NOT NULL,
    feature1 VARCHAR(255) NOT NULL,
    feature2 VARCHAR(255) NOT NULL,
    feature3 VARCHAR(255) NOT NULL,
    feature4 VARCHAR(255) NOT NULL,
    feature5 VARCHAR(255) NOT NULL,
    recruitment_number VARCHAR(255) NOT NULL,
    private_recruitment_number VARCHAR(255) NOT NULL,
    target_age VARCHAR(255) NOT NULL,
    area VARCHAR(255) NOT NULL,
    pr_point VARCHAR(255) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO
    agent_contents
SET
    agent_id = 1,
    agent_name = "リクルートダイレクトスカウト",
    feature1 = "年収750万以上の方向け！",
    feature2 = "ハイクラス転職後平均年収950万以上",
    feature3 = "担当コンサルタントを自分で選べる",
    feature4 = "3,000名以上のヘッドハンター数",
    feature5 = "企業から直接スカウトが届く",
    recruitment_number = "103,000件以上",
    private_recruitment_number = "非公開",
    target_age = "全年齢",
    area = "全国対応",
    pr_point = "〜〜と〜〜が強みで、〜〜のような形で力になってくれる転職サイトです。〜〜なら必ず登録するべきサイトになります。";

INSERT INTO
    agent_contents
SET
    agent_id = 2,
    agent_name = "ジョブオファーダイレクトスカウト",
    feature1 = "年収750万以上の方向け！",
    feature2 = "ハイクラス転職後平均年収950万以上",
    feature3 = "担当コンサルタントを自分で選べる",
    feature4 = "3,000名以上のヘッドハンター数",
    feature5 = "企業オカラ直接スカウトが届く",
    recruitment_number = "103,000件以上",
    private_recruitment_number = "非公開",
    target_age = "全年齢",
    area = "全国対応",
    pr_point = "〜〜と〜〜が強みで、〜〜のような形で力になってくれる転職サイトです。〜〜なら必ず登録するべきサイトになります。";

CREATE TABLE images (
    image_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    image_name VARCHAR(255) NOT NULL,
    image_type varchar(64) NOT NULL,
    image_content mediumblob,
    image_size int NOT NULL,
    created_at DATETIME
) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_unicode_ci;