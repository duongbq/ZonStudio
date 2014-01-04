<h3><?php echo $article->title; ?></h3>
<small>
    <?php echo $article->is_active == 1 ? 'Đã đăng lên trang chủ' : 'Chưa đăng'; ?>
    <?php echo get_vndate_string($article->created_at); ?>
</small>
<strong>
    <p>
        <?php if ($article->file_id > 0 && isset($file_arr[$article->file_id])) : ?>
            <img src="/uploads/news/<?php echo $file_arr[$article->file_id]; ?>" style="width: 150px; height: 100px;"/>
        <?php else : ?>
            <img src="/assets/images/noimage.png" style="width: 150px; height: 100px;"/>
        <?php endif; ?>
        &nbsp;
        <?php echo $article->summary; ?>
    </p>
</strong>
<div class="clearfix"></div>
<p class="lead">
    <?php echo $article->description; ?>
</p>


