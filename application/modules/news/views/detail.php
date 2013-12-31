<h3><?php echo $article->title; ?></h3>
<small>
    <?php echo $article->is_active == 1 ? 'Đã đăng lên trang chủ' : 'Chưa đăng'; ?>
    <?php echo get_vndate_string($article->created_at); ?>
</small>
<strong>
    <p><?php echo $article->summary; ?></p>
</strong>
<div class="clearfix"></div>
<p class="lead">
    <?php echo $article->description; ?>
</p>


