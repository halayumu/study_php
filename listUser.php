<?php
require_once "MySqlOperation.php";

/// DB接続
$mySqlOperation = new MySqlOperation;
$mySqlOperation->connect();

/// レコード全件取得
$allUser = $mySqlOperation->allUserTable();

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
    <?php foreach ($allUser as $user) : ?>
      <tr>
        <td><?= $user['id']; ?></td>
        <td><?= $user['name']; ?></td>
        <td><?= $user['age']; ?></td>
      </tr>
    <?php endforeach; ?>
  </table>
</body>

</html>