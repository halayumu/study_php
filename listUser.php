<?php
/// 接続設定
$servername = "localhost"; // サーバーのアドレス
$username = "user"; // ユーザー名
$password = ""; // パスワード
$database = "test"; // データベース名

/// DB接続
$mysqli = new mysqli($servername, $username, $password, $database);

/// 接続チェック
if ($mysqli->connect_errno) {
  die("接続失敗: " . $mysqli->connect_error); //実行停止
} else {
  echo "接続成功";
}
