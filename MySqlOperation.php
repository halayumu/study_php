<?php
class MySqlOperation
{
  private $mysqli;

  /// 接続
  public function connect()
  {
    require "./MySqlSetting.php";

    $this->mysqli = new mysqli($servername, $username, $password, $database);

    if ($mysqli->connect_errno) {
      die("接続失敗: " . $mysqli->connect_error); //実行停止
    }
  }

  /// レコードの追加
  public function addSql($name, $age)
  {
    $stmt = $this->mysqli->prepare("INSERT INTO user (name, age) VALUES (?, ?)");
    $stmt->bind_param('si', $name, $age);
    $success = $stmt->execute();

    if (!$success) {
      die('実行エラー: ' . $stmt->error);
    }
  }


  /// レコード全件取得
  public function allUserTable()
  {
    $tableName = "user";
    $query = "SELECT * FROM {$tableName}";
    $result = $this->mysqli->query($query);

    // 結果セットからデータを取得し、配列に追加
    while ($row = $result->fetch_assoc()) {
      $allRecords[] = $row;
    }

    return $allRecords;
  }
}
