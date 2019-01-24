<?php
// 入力内容取得、SQL実行、元の画面に戻る
 require_once('dbconnect.php');

  // 画面に一覧表示する
        // DBから表示したいデータを取得する
          // DB接続　上に記述済み

          // SQL書く
        // 取得したデータを表示する
        $sql = 'SELECT * FROM posts ORDER BY created DESC' ; //order by=並び順　asc=昇順　desc=降順　省略すると昇順になる
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

  <!-- CSS -->
  <link rel="stylesheet" href="assets/css/bootstrap.css">
  <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.css">
  <link rel="stylesheet" href="assets/css/form.css">
  <link rel="stylesheet" href="assets/css/timeline.css">
  <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>
  <!-- ナビゲーションバー -->
  <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header page-scroll">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#page-top"><span class="strong-title"><i class="fa fa-linux"></i> Oneline bbs</span></a>
          </div>
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav navbar-right">
              </ul>
          </div>
          <!-- /.navbar-collapse -->
      </div>
      <!-- /.container-fluid -->
  </nav>

  <!-- Bootstrapのcontainer -->
  <div class="container">
    <!-- Bootstrapのrow -->
    <div class="row">

      <!-- 画面左側 -->
      <div class="col-md-4 content-margin-top">
        <!-- form部分 -->
        <form action="create.php" method="post" enctype="multipart/form-data">
          <!-- nickname -->
          <div class="form-group">
            <div class="input-group">
              <input type="text" name="nickname" class="form-control" id="validate-text" placeholder="nickname" required>
              <span class="input-group-addon danger"><span class="glyphicon glyphicon-remove"></span></span>
            </div>
          </div>
          <!-- comment -->
          <div class="form-group">
            <div class="input-group" data-validate="length" data-length="4">
              <textarea type="text" class="form-control" name="comment" id="validate-length" placeholder="comment" required></textarea>
              <span class="input-group-addon danger"><span class="glyphicon glyphicon-remove"></span></span>
            </div>
            <div class="form-group">
            <input type="file" name="img" accept="image/*">
            
            
            </div>
          </div>
          <!-- つぶやくボタン -->
          <button type="submit" class="btn btn-primary col-xs-12" disabled>つぶやく</button>
        </form>
      </div>

      <!-- 画面右側 -->
      <div class="col-md-8 content-margin-top">
        <div class="timeline-centered">
          <?php foreach ($results as $result): ?>
          <article class="timeline-entry">
              <div class="timeline-entry-inner">
                  <div class="timeline-icon">
                      <img src=<?php echo $result['img'] ; ?> alt="" style="height:40px">
                  </div>
                  <div class="timeline-label">
                      <h2><a href="#"><p><?php echo $result['nickname'] ; ?></p></a> <span><p><?php echo $result['created'] ; ?></p></span></h2>
                      <p><?php echo $result['comment'] ; ?></p>
                      <a href="edit.php?id=<?php echo $result['id'] ?>" class="btn btn-success">編集</a>
                      <a href="delete.php?id=<?php echo $result['id'] ?>" class="btn btn-danger">削除</a>
                  </div>
              </div>
          </article>
          <?php endforeach; ?>

          <article class="timeline-entry begin">
              <div class="timeline-entry-inner">
                  <div class="timeline-icon" style="-webkit-transform: rotate(-90deg); -moz-transform: rotate(-90deg);">
                      <i class="entypo-flight"></i> +
                  </div>
              </div>
          </article>
        </div>
      </div>

    </div>
  </div>

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="assets/js/bootstrap.js"></script>
  <script src="assets/js/form.js"></script>
</body>
</html>