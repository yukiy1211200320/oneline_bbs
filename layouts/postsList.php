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