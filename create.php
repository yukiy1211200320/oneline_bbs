<?php
date_default_timezone_set('Asia/Manila');
// 投稿の保存
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
        // DBを切断
        $dbh = null;

// 画面をbbs2.phpを表示する　リダイレクトする
header('Location: bbs2.php');
exit();


// 呟く→create→bbs2に戻る
