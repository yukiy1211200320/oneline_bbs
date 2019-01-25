<?php
  require_once("function.php");
  $user = getPost();

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
        <form action="updete.php" method="post">
          <!-- nickname -->
          <div class="form-group">
            <div class="input-group">
              <input type="text" name="nickname" class="form-control" id="validate-text" placeholder="nickname" required value="<?php echo $user['nickname'] ?>">
              <span class="input-group-addon danger"><span class="glyphicon glyphicon-remove"></span></span>
            </div>
          </div>
          <!-- comment -->
          <div class="form-group">
            <div class="input-group" data-validate="length" data-length="4">
              <textarea type="text" class="form-control" name="comment" id="validate-length" placeholder="comment" required ><?php echo $user['comment'] ?></textarea>
              <span class="input-group-addon danger"><span class="glyphicon glyphicon-remove"></span></span>
            </div>
          </div>
          <input type="hidden" name="id" value="<?php echo $user['id']?>">
          <!-- つぶやくボタン -->
          <button type="submit" class="btn btn-primary col-xs-12" disabled>更新</button>
        </form>
      </div>
      <?php include("layouts/footer.php"); ?>
</body>
</html>