<?php

function getAllPosts()
{
    require_once('dbconnect.php');

    $sql = 'SELECT * FROM posts ORDER BY created DESC' ; //order by=並び順　asc=昇順　desc=降順　省略すると昇順になる
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
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