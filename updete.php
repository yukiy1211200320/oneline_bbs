<?php
// var_dump($_POST['nickname'],$_POST['comment']);die();


// データの更新
// DB接続
$dsn = 'mysql:dbname=onelinebbs;host=localhost';
$user = 'root';
$password='';
$dbh = new PDO($dsn, $user, $password);
$dbh->query('SET NAMES utf8');


// SQL実行
$id = htmlspecialchars($_POST['id']);
$nickname = htmlspecialchars($_POST['nickname']);
$comment = htmlspecialchars($_POST['comment']);

$sql = 'UPDATE posts SET nickname = ?, comment = ? WHERE id = ?';
$data = [$nickname,$comment,$id];
$stmt = $dbh->prepare($sql);
$stmt->execute($data);


// DB切断
$dbh = null;

// リダイレクト処理
header('Location: bbs2.php');
exit();