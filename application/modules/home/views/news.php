<!--=== Service ===-->
<div class="wrapper service">
    <?php foreach ($news as $index => $article): ?>
    <?php $i = $index + 1; ?>
        <div class="one_third <?php echo $i > 1 && $i % 3 == 0 ? 'service_last' : ''; ?>">
            <div class="infofield">
                <ul>
                    <li><span><?php echo $article->title; ?></span></li>
                    <li>
                        <?php echo $article->summary; ?>
                        <?php echo anchor($this->uri->segment(1) . '/' . mb_strtolower(url_title(removesign($article->title))) . '-i' . $article->id, 'Xem thêm'); ?>
                    </li>
                </ul>
            </div>
        </div>

    <?php endforeach; ?>

    <div class="clear"></div>
</div>
<div id="pagination" style="text-align: center;"><?php echo $pagination; ?></div>
<script>

    function change_page(offset, per_page) {
        var current_uri = '<?php echo '/' . $this->uri->segment(1); ?>';
        var page = offset / per_page + 1;
        var url = current_uri + '/trang-' + page + '<?php echo $this->config->item('url_suffix'); ?>';
        location.href = url;
        return;
    }

</script>
<!--=== /Service ===-->

