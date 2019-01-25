<?php

function getAllPosts()
{
    require_once('dbconnect.php');

    $sql = 'SELECT * FROM posts ORDER BY created DESC' ; //order by=並び順　asc=昇順　desc=降順　省略すると昇順になる
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
}

function creatPost()
{
    require_once('dbconnect.php');

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

// 関数の定義
// function plus($a, $b)
// {
//     return $a + $b;
// }

// function hoge($a)
// {
//     if ($a % 2 === 0){
//         echo '偶数です';
//     }
// }


// // 関数の呼び出し
// $res = plus(5, 3);
// hoge($res);
// // plus(5, 10);