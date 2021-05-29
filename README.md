<!--- 画像URLの変数定義 --->
[ER図]: https://user-images.githubusercontent.com/81066421/120074032-d5a72480-c0d5-11eb-9452-5263ac27ce17.png
[チェック]: https://user-images.githubusercontent.com/81066421/120052611-131d9a80-c061-11eb-9e86-f323d6cb2b41.png
[外部]: https://user-images.githubusercontent.com/81066421/120052614-13b63100-c061-11eb-8b16-a679f6241f26.png
[キー]: https://user-images.githubusercontent.com/81066421/120052616-144ec780-c061-11eb-9efc-0ab2224081ab.png

<!-- 本文はこちらから -->
# [ToDo App](http://todo-list-777.herokuapp.com/)

## アプリ概要
やるべきタスクを追加して状態管理ができるようにするWEBアプリケーションです。
<br><br>

## 使用した技術
以下を使用してWEBアプリケーションを作成しました。
- **[Laravel](https://laravel.com/)**
- **[Laravel Valet](https://laravel.com/docs/8.x/valet/)**
- **[axios](https://axios-http.com/)**
<br><br>

## URL一覧
URLの一覧は以下表の通りです。
| URL                                         | メソッド | 処理                           |
|---------------------------------------------|:--------:|--------------------------------|
| /folders/{フォルダID}/tasks                 | GET      | タスク一覧ページを表示する。   |
| /folders/create                             | GET      | フォルダ作成ページを表示する。 |
| /folders/create                             | POST     | フォルダ作成処理を実行する。   |
| /folders/{フォルダID}/tasks/create          | GET      | タスク作成ページを表示する。   |
| /folders/{フォルダID}/tasks/create          | POST     | タスク作成処理を実行する。     |
| /folders/{フォルダID}/tasks/{タスクID}/edit | GET      | タスク編集ページを表示する。   |
| /folders/{フォルダID}/tasks/{タスクID}/edit | POST     | タスク編集処理を実行する。     |

<br><br>

## ER図
ER図は以下画像の通りです。

![ER図][ER図]
<br><br>

## テーブル定義
テーブル定義は以下表の通りです。
<br>

> ### usersテーブル
- タスクを作成するユーザを管理します。

|     カラム論理名     |        カラム物理名       |          型         | PRIMARY | UNIQUE | NOT NULL | FOREIGN |
|:--------------------|:-------------------------|:-------------------:|:-------:|:------:|:--------:|:-------:|
| ユーザID             | id                        |        SERIAL       |![キー][キー]|![チェック][チェック]|![チェック][チェック]|         |
| ユーザ名             | name                      |     VARCHAR(255)    |         |        |![チェック][チェック]|         |
| メールアドレス       | email                     |     VARCHAR(255)    |         |![チェック][チェック]|![チェック][チェック]|         |
| メール確認日         | email_verified_at         |      TIMESTAMP      |         |        |          |         |
| パスワード           | password                  |     VARCHAR(255)    |         |        |![チェック][チェック]|         |
| リメンバートークン   | remember_token            |     VARCHAR(100)    |         |        |          |         |
| 作成日               | created_at                |      TIMESTAMP      |         |        |          |         |
| 更新日               | updated_at                |      TIMESTAMP      |         |        |          |         |

<br>

> ### foldersテーブル
- タスクを格納するフォルダを管理します。

|     カラム論理名     |        カラム物理名       |          型         | PRIMARY | UNIQUE | NOT NULL | FOREIGN |
|:--------------------|:-------------------------|:-------------------:|:-------:|:------:|:--------:|:-------:|
| フォルダID             | id                        |        SERIAL       |![キー][キー]|![チェック][チェック]|![チェック][チェック]|         |
| ユーザID              | user_id                  |     INTEGER    |         |        |![チェック][チェック]|![外部][外部]users(id)|
| タイトル             | name                      |     VARCHAR(20)    |         |        |![チェック][チェック]|         |
| 作成日               | created_at                |      TIMESTAMP      |         |        |          |         |
| 更新日               | updated_at                |      TIMESTAMP      |         |        |          |         |

<br>

> ### tasksテーブル
- タスクを管理します。

|     カラム論理名     |        カラム物理名       |          型         | PRIMARY | UNIQUE | NOT NULL | FOREIGN |
|:--------------------|:-------------------------|:-------------------:|:-------:|:------:|:--------:|:-------:|
| タスクID             | id                        |        SERIAL       |![キー][キー]|![チェック][チェック]|![チェック][チェック]|         |
| フォルダID           | folder_id                      |     INTEGER    |         |        |![チェック][チェック]|![外部][外部]folders(id)|
| タイトル             | title                      |     VARCHAR(100)    |         |        |![チェック][チェック]|         |
| 状態                | status                     |     INTEGER         |         |        |![チェック][チェック]|         |
| 期限日               | due_date                  |     DATE            |         |        |![チェック][チェック]|         |
| 作成日               | created_at                |      TIMESTAMP      |         |        |          |         |
| 更新日               | updated_at                |      TIMESTAMP      |         |        |          |         |

<br>


