
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

<!--=== Slider Model ===-->
<div class="ss2_wrapper model_show" style="left: 0px !important;">
    <a href="#" class="slideshow_prev"><span>Previous</span></a>
    <a href="#" class="slideshow_next"><span>Next</span></a>
    <div class="slideshow_box"></div>

    <div id="slideshow_2" class="slideshow">

        <?php foreach ($images_for_slider_model as $image): ?>
            <div class="slideshow_item">
                <div class="image"><a href="#"><img src="/uploads/model/<?php echo $image->file_name; ?>" /></a></div>
            </div>
        <?php endforeach; ?>

    </div>


</div>
<div class="clear"></div>
<!--=== End Slider Model ===-->

<!--=== Detail Model ===-->
<div class="model_detail">
    <p><span><?php echo $model_for_slider->model_name; ?></span></p>
    <p><?php echo $model_for_slider->sex == 0 ? 'Nữ' : 'Nam'; ?></p>
    <p><?php echo $model_for_slider->description; ?></p>
</div>
<div class="clear"></div>
<!--=== /Detail Model ===-->

