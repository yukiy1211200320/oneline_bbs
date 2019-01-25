<?php
require_once("function.php");

// 入力した内容を保存する
  if(!empty($_POST)){
       // ユーザーが入力した内容を取得
       creatPost();
  }

// 画面をbbs2.phpを表示する　リダイレクトする
header('Location: bbs2.php');
exit();


// 呟く→create→bbs2に戻る
