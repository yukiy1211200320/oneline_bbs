<?php

// データベースに接続
        $dsn = 'mysql:dbname=onelinebbs;host=localhost';
        $user = 'root';
        $password='';
        $dbh = new PDO($dsn, $user, $password);
        $dbh->query('SET NAMES utf8');