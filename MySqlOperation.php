<?php
class MySqlOperation
{
  private $mysqli;

  /// 接続
  public function connect()
  {
    require "./MySqlSetting.php";

    $this->mysqli = new mysqli($servername, $username, $password, $database);

    if ($this->mysqli->connect_errno) {
      die("接続失敗: " . $this->mysqli->connect_error); //実行停止
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

  /// 画像のリサイズ
  public function resizeImageToSquare($srcImagePath, $newSize = 300)
  {
    // 元の画像サイズを取得
    list($width, $height) = getimagesize($srcImagePath);
    $srcImage = imagecreatefromjpeg($srcImagePath);

    // 新しい正方形のキャンバスを作成
    $dstImage = imagecreatetruecolor($newSize, $newSize);
    $white = imagecolorallocate($dstImage, 255, 255, 255);
    imagefill($dstImage, 0, 0, $white);

    // 画像の縦横比を保持してリサイズ
    if ($width > $height) {
      $newHeight = $newSize;
      $newWidth = intval($width * ($newSize / $height));
      $srcX = intval(($newWidth - $newSize) / 2);
      $srcY = 0;
    } else {
      $newWidth = $newSize;
      $newHeight = intval($height * ($newSize / $width));
      $srcX = 0;
      $srcY = intval(($newHeight - $newSize) / 2);
    }

    // 元の画像を新しいキャンバスにコピーしてリサイズ
    imagecopyresampled($dstImage, $srcImage, 0, 0, $srcX, $srcY, $newWidth, $newHeight, $width, $height);

    // 画像表示をサーバ側に教える
    header("Content-Type: image/jpeg");

    // 新しい画像をJPEG形式で保存（品質指定）
    imagejpeg($dstImage);
  }
}
