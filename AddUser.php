<?php
require_once "./MySqlOperation.php";

/// 入力フォームの値を取得
$name = $_POST["name"];
$age = $_POST["age"];

/// DB接続
$mySqlOperation = new MySqlOperation;
$mySqlOperation->connect();

/// sqlレコードの追加
$mySqlOperation->addSql($name, $age);

/// 受信画像の表示実装
$image = $_FILES['image']['tmp_name'];

$mySqlOperation->resizeImageToSquare($image);


?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>登録完了</title>
</head>

<body>
  <p>登録しました。</p>
</body>

</html>