<?php

// var_dump($_FILES['img']['name']);die();




date_default_timezone_set('Asia/Manila');
// 投稿の保存
        // データベースに接続
        require_once('dbconnect.php');

// 入力した内容を保存する
  if(!empty($_POST)){
       // ユーザーが入力した内容を取得
        $nickname = htmlspecialchars($_POST['nickname']);
        $comment = htmlspecialchars($_POST['comment']);

        if ($_FILES['img']['size'] !== 0) {
            $file_path = 'img/'. $_FILES['img']['name'];
            // 画像
            move_uploaded_file($_FILES['img']['tmp_name'],$file_path);   
        } else {
            $file_path = 'img/dafault.png';
        }

        //　SQL書く
          $sql = 'INSERT INTO posts (nickname, comment, created, img) VALUES (?,?,?,?)';
          $data = [$nickname, $comment, date('Y-m-d H:i:s'), $file_path];
          $stmt = $dbh->prepare($sql);
          $stmt->execute($data);
  }
        // DBを切断
        $dbh = null;

// 画面をbbs2.phpを表示する　リダイレクトする
header('Location: bbs2.php');
exit();


// 呟く→create→bbs2に戻る
