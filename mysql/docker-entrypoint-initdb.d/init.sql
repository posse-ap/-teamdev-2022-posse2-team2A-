DROP SCHEMA IF EXISTS shukatsu;

CREATE SCHEMA shukatsu;

USE shukatsu;

DROP TABLE IF EXISTS admin;

CREATE TABLE admin (
    id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255),
    register_token VARCHAR(255),
    register_token_sent_at DATETIME,
    register_token_verified_at DATETIME,
    status ENUM('tentative', 'public') DEFAULT 'tentative',
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
    password VARCHAR(255),
    agent_name VARCHAR(255),
    pic_name VARCHAR(80),
    pic_name_kana VARCHAR(80),
    email VARCHAR(255) UNIQUE NOT NULL,
    department_name VARCHAR(80),
    phone_number VARCHAR(80),
    register_token VARCHAR(255),
    register_token_sent_at DATETIME,
    register_token_verified_at DATETIME,
    status ENUM('tentative', 'public') DEFAULT 'tentative'
);

INSERT INTO
    agents
SET
    password = sha1('password2'),
    agent_name = "リクルート",
    pic_name = '渡邉瑛貴',
    pic_name_kana = 'ワタナベエイキ',
    email = 'agent@posse-ap.com',
    department_name = '人事部',
    phone_number = '090-0000-0000',
    status = 'public';

INSERT INTO
    agents
SET
    password = sha1('password3'),
    agent_name = "jobTV",
    pic_name = '渡邉瑛貴',
    pic_name_kana = 'ワタナベエイキ',
    email = 'jobTV@posse-ap.com',
    department_name = '経理',
    phone_number = '090-0000-0000',
    status = 'public';

INSERT INTO
    agents
SET
    password = sha1('password'),
    agent_name = "アンチパターン株式会社",
    pic_name = '渡邉瑛貴',
    pic_name_kana = 'ワタナベエイキ',
    email = 'jober@posse-ap.com',
    department_name = '人事部',
    phone_number = '090-0000-0000',
    status = 'public';

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
    graduation_status VARCHAR(80) NOT NULL
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

DROP TABLE IF EXISTS intermediate;

CREATE TABLE intermediate (
    id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    agent_id INT NOT NULL,
    customer_id INT,
    comments VARCHAR(80),
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO
    intermediate
SET
    agent_id = 1,
    customer_id = 1,
    comments = 'こんにちは';

INSERT INTO
    intermediate
SET
    agent_id = 2,
    customer_id = 1,
    comments = 'こんにちは';

INSERT INTO
    intermediate
SET
    agent_id = 2,
    customer_id = 2,
    comments = 'こんにちは';

DROP TABLE IF EXISTS agent_contents;

CREATE TABLE agent_contents (
    id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    agent_id INT NOT NULL,
    agent_name VARCHAR(255) NOT NULL,
    special_feature VARCHAR(255) NOT NULL,
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
    agent_name = "リクルート",
    special_feature = '紹介率No.1!!',
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
    agent_name = "jobTV",
    special_feature = '紹介率No.1!!',
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
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    agent_id INT NOT NULL,
    name VARCHAR(255) NOT NULL
);

INSERT INTO images SET id=1, agent_id=1 ,name='1.jpeg';

INSERT INTO images SET id=2, agent_id=2, name='2.png';

DROP TABLE IF EXISTS apply_agents;

CREATE TABLE apply_agents (
    id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    agent_name VARCHAR(255) NOT NULL,
    address VARCHAR(255) NOT NULL,
    pic_name VARCHAR(80) NOT NULL,
    pic_name_kana VARCHAR(80) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    phone_number VARCHAR(80) NOT NULL,
    comments VARCHAR(255),
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO
    apply_agents
SET
    agent_name = 'amazonJapan',
    address = '東京都大田区大森西',
    email = 'test@posse-ap.com',
    pic_name = '渡邉瑛貴',
    pic_name_kana = 'ワタナベエイキ',
    phone_number = '090-0000-0000',
    comments = '是非お願いします！';

INSERT INTO
    apply_agents
SET
    agent_name = 'YahooJapan',
    address = '東京',
    email = 'test2@posse-ap.com',
    pic_name = '渡邉瑛貴',
    pic_name_kana = 'ワタナベエイキ',
    phone_number = '060-0000-0000',
    comments = '是非お願い';