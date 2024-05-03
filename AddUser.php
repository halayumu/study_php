<?php
require_once "./MySqlOperation.php";

/// フォームの値を取得
$name = $_POST["name"];
$age = $_POST["age"];

/// sql追加処理
$mySqlOperation = new MySqlOperation;
$mySqlOperation->connect();
$mySqlOperation->addSql($name, $age);
