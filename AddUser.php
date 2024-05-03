<?php
require_once "./MySqlOperation.php";

/// 入力フォームの値を取得
$name = $_POST["name"];
$age = $_POST["age"];

/// sqlレコードの追加
$mySqlOperation = new MySqlOperation;
$mySqlOperation->connect();
$mySqlOperation->addSql($name, $age);
