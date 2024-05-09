<?php
require_once "MySqlOperation.php";

/// DB接続
$mySqlOperation = new MySqlOperation;
$mySqlOperation->connect();

/// レコード全件取得
$allUser = $mySqlOperation->allUserTable();

/// 表示件数処理
define('MAX', '3');

$count = count($allUser);

if (!isset($_GET['pageId'])) {
  $now = 1;
} else {
  $now = $_GET['pageId'];
  var_dump($now);
}

$startNo = ($now - 1) * MAX; // 配列の何番目から取得すればよいか
$dispData = array_slice($allUser, $startNo, MAX, true); // 配列の何番目から何番目(MAX)まで切り取る

/// ページングの数を設定する処理
$maxPage = ceil($count / MAX);

?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>一覧表示</title>
</head>

<body>
  <table border="1">
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Age</th>
    </tr>
    <?php foreach ($dispData as $user) : ?>
      <tr>
        <td><?= $user['id']; ?></td>
        <td><?= $user['name']; ?></td>
        <td><?= $user['age']; ?></td>
      </tr>
    <?php endforeach; ?>
  </table>

  <?php for ($i = 1; $i <= $maxPage; $i++) : ?>
    <?php if ($i == $now) : ?>
      <p><?= $now . ' ' ?></p>
    <?php else : ?>
      <p><a href="./listUser.php?pageId=<?= $i ?>"><?= $i ?></a>　</p>
    <?php endif; ?>
  <?php endfor; ?>

</body>

</html>