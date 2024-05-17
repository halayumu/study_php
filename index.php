<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DB登録</title>
</head>

<body>
  <header>
    <h1>登録画面</h1>
  </header>

  <main>
    <form action="./AddUser.php" method="post" enctype="multipart/form-data">
      <label for="name">名前</label><br>
      <input type="text" id="name" name="name"><br>

      <label for="age">年齢</label><br>
      <input type="text" id="age" name="age"><br>

      <input type="file" name="image"><br>

      <input type="submit" value="送信">
    </form>

    <input type="button" onclick="location.href='./listUser.php'" value=" 一覧画面">
  </main>

</body>

</html>