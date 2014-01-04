<?php echo link_tag('assets/fancybox/jquery.fancybox-1.3.4.css'); ?>
<script src="<?php echo base_url(); ?>assets/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
<script src="<?php echo base_url(); ?>assets/fancybox/jquery.fancybox-1.3.4.pack.js"></script>

<div class="wrapper service">
    <?php foreach ($portraits as $index => $portrait): ?>
        <?php $i = $index + 1; ?>

        <div class="one_third <?php echo $i > 1 && $i % 3 == 0 ? 'service_last' : ''; ?>">
            <div class="infofield">
                <ul>
                    <li><span><?php echo $portrait->portrait_name; ?></span></li>
                    <?php
                    $img = get_displayed_image_by_portrait_id($portrait->id);
                    
                    if (is_object($img)) {
                        $img_src = '/uploads/portraits/' . $img->file_name;
                    } else {
                        $img_src = '/assets/images/noimage.png';
                    }
                    $fancy_images = get_fancy_images_by_portrait_id($portrait->id);
                    
                    ?>
                    <li>
                        <a rel="fancy_group_<?php echo $portrait->id; ?>" href="<?php echo $img_src; ?>" title="<?php echo $portrait->portrait_name; ?>">
                            <img src="<?php echo $img_src; ?>" class="portrait" />
                        </a>
                    </li>
                    <?php foreach ($fancy_images as $fancy_image): ?>
                        <a rel="fancy_group_<?php echo $portrait->id; ?>" href="/uploads/portraits/<?php echo $fancy_image->file_name; ?>" title="<?php echo $portrait->portrait_name; ?>"></a>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    
        <script>
            $(function() {
                $("a[rel=fancy_group_<?php echo $portrait->id; ?>]").fancybox({
                    'transitionIn': 'none',
                    'transitionOut': 'none',
                    'titlePosition': 'over',
                    'titleFormat': function(title) {
                        return '<span id="fancybox-title-over">' + (title.length ? ' &nbsp; ' + title : '') + '</span>';
                    }
                });

            });
        </script>

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