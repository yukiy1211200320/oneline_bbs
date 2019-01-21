<?php
  // ここにDBに登録する処理を記述する

        // データベースに接続
        $dsn = 'mysql:dbname=onelinebbs;host=localhost';
        $user = 'root';
        $password='';
        $dbh = new PDO($dsn, $user, $password);
        $dbh->query('SET NAMES utf8');

// 入力した内容を保存する
  if(!empty($_POST)){
       // ユーザーが入力した内容を取得
        $nickname = htmlspecialchars($_POST['nickname']);
        $comment = htmlspecialchars($_POST['comment']);
        // var_dump($nickname,$comment);

        //　SQL書く
          $sql = 'INSERT INTO posts (nickname, comment, created) VALUES (?,?,?)';
          $data = [$nickname,$comment,date('Y-m-d H:i:s')];
          $stmt = $dbh->prepare($sql);
          $stmt->execute($data);
  }
// 画面に一覧表示する
        // DBから表示したいデータを取得する
          // DB接続　上に記述済み

          // SQL書く
        // 取得したデータを表示する
        $sql = 'SELECT * FROM posts';
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll();
        // echo '<pre>';
        // var_dump($results);
        // echo'<pre>';

        // DBを切断
        $dbh = null;
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>セブ掲示版</title>
</head>
<body>
    <form method="post" action="">
      <p><input type="text" name="nickname" placeholder="nickname"></p>
      <p><textarea type="text" name="comment" placeholder="comment"></textarea></p>
      <p><button type="submit" >つぶやく</button></p>
    </form>
    <!-- ここにニックネーム、つぶやいた内容、日付を表示する -->

     <?php foreach($results as $result): ?>
    <p><?php echo $result['nickname'] ; ?></p>
    <p><?php echo $result['comment'] ; ?></p>
    <p><?php echo $result['created'] ; ?></p>
    <?php endforeach; ?> 

</body>
</html>