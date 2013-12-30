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
                            <img src="/uploads/packages/<?php echo $image->file_name; ?>" />
                        </a>
                    </div>
                    <div class="data">
                        <h4><a href="#"><?php //echo $package->package_name;   ?></a></h4>
                        <p><?php //echo $image->summary;  ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="clear"></div>
</div>


<!--=== Service ===-->
<div class="wrapper service">
    <?php foreach ($packages as $index => $package): ?>
        <?php $i = $index + 1; ?>

        <div class="one_third <?php echo $i > 1 && $i % 3 == 0 ? 'service_last' : ''; ?>">
            <div class="infofield">
                <ul>
                    <li><span><?php echo $package->package_name; ?></span></li>
                    <li><?php echo $package->summary; ?> <a href="#">Xem thêm</a></li>
                    <li>Giá: <span><?php echo $package->price; ?></span></li>
                </ul>
            </div>
        </div>

    <?php endforeach; ?>

    <div class="clear"></div>
</div>
<!--=== /Service ===-->

