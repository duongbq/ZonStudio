<?php echo link_tag('assets/fancybox/jquery.fancybox-1.3.4.css'); ?>
<script src="<?php echo base_url(); ?>assets/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
<script src="<?php echo base_url(); ?>assets/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<script type="text/javascript">
    $(function() {
        $('#slideshow_2').cycle({
            fx: 'fade',
            speed: 900,
            timeout: 5000,
            prev: '.ss2_wrapper .slideshow_prev',
            next: '.ss2_wrapper .slideshow_next',
            before: function(currSlideElement, nextSlideElement) {
                var data = $('.data', $(nextSlideElement)).html();
                $('.ss2_wrapper .slideshow_box').stop(true, true).animate({bottom: '-110px'}, 400, function() {
                    $('.ss2_wrapper .slideshow_box .data').html(data);
                });
                $('.ss2_wrapper .slideshow_box').delay(100).animate({bottom: '0'}, 400);
            }
        });

        $('.ss2_wrapper').mouseenter(function() {
            $('#slideshow_2').cycle('pause');
            $('.ss2_wrapper .slideshow_prev').stop(true, true).animate({left: '20px'}, 200);
            $('.ss2_wrapper .slideshow_next').stop(true, true).animate({right: '20px'}, 200);
        }).mouseleave(function() {
            $('#slideshow_2').cycle('resume');
            $('.ss2_wrapper .slideshow_prev').stop(true, true).animate({left: '-40px'}, 200);
            $('.ss2_wrapper .slideshow_next').stop(true, true).animate({right: '-40px'}, 200);
        });
    });
</script>

<div class="wrapper slide">
    <div class="ss2_wrapper">
        <a href="#" class="slideshow_prev"><span>Previous</span></a>
        <a href="#" class="slideshow_next"><span>Next</span></a>
        <div class="slideshow_box">
            <div class="data"></div>
        </div>
        <div id="slideshow_2" class="slideshow">

            <?php foreach ($images as $image): ?>
                <div class="slideshow_item">
                    <div class="image">

                        <a href="#">
                            <img src="/uploads/portraits/<?php echo $image->file_name; ?>" />
                        </a>
                    </div>
                    <div class="data">
                        <h4><a href="#"><?php //echo $package->package_name;        ?></a></h4>
                        <p><?php //echo $image->summary;       ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="clear"></div>
</div>

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
                        <a rel="fancy_group_<?php echo $portrait->id; ?>" href="<?php echo $img_src; ?>" title="<?php echo $portrait->portrait_name; ?>"></a>
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
                    'titleFormat': function(title, currentArray, currentIndex, currentOpts) {
                        return '<span id="fancybox-title-over">' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? ' &nbsp; ' + title : '') + '</span>';
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