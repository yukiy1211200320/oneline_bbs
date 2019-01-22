<?php

// var_dump(123);
// die();

$id = htmlspecialchars($_GET['id']);
// var_dump($id);die();

// 削除処理
// DB接続
    $dsn = 'mysql:dbname=onelinebbs;host=localhost';
    $user = 'root';
    $password='';
    $dbh = new PDO($dsn, $user, $password);
    $dbh->query('SET NAMES utf8');


// SQL実行
    $sql = 'DELETE FROM posts WHERE id = ?';
    $data = [$id];
    $stmt = $dbh->prepare($sql);
    $stmt->execute($data);


// DB切断
    $dbh = null;

// 元の画面に戻る（リダイレクト）
header("location:bbs2.php");