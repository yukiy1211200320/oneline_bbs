<?php
require_once('function.php');
$results = getAllPosts();

?>

<!DOCTYPE html>
<html lang="ja">
  <?php include("layouts/head.php"); ?>
<body>
  <!-- ナビゲーションバー -->
  <?php include("layouts/nav.php"); ?>

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
      <?php include("layouts/postsList.php"); ?>

    </div>
  </div>
  <?php include("layouts/footer.php"); ?>
</body>
</html>