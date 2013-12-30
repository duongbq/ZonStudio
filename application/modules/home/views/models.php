<style>
    .model_show{
        float: left;
    }
</style>


<div class="wrapper model">
    <!--=== Category Model ===-->
    <div class="cate_model">


        <div class="female_model">
            <h3>Nữ</h3>
            <ul>
                <?php foreach ($female_models as $female_model): ?>
                    <li><a href="javascript:void(0);" onclick="display_model(<?php echo $female_model->id; ?>)"><?php echo $female_model->model_name; ?></a></li>
                <?php endforeach; ?>
                <li class="last" ><a href="#" class="model_more"></a></li>
            </ul>
        </div>
        <div class="clear"></div>
        <div class="male_model">
            <h3>Nam</h3>
            <ul>
                <?php foreach ($male_models as $male_model): ?>
                    <!--<li class="active"><a href="#">Thúy An</a></li>-->
                    <li><a href="javascript:void(0);" onclick="display_model(<?php echo $male_model->id; ?>)"><?php echo $male_model->model_name; ?></a></li>
                <?php endforeach; ?>
                <li class="last" ><a href="#" class="model_more"></a></li>
            </ul>
        </div>
        <div class="clear"></div>
    </div>
    <!--=== /Category Model ===-->

    <div id="display_model">

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
                        <div class="image"><a href="#"><img src="/uploads/models/<?php echo $image->file_name; ?>" /></a></div>
                    </div>
                <?php endforeach; ?>

            </div>


        </div>
        <div class="clear"></div>
        <!--=== End Slider Model ===-->

        <!--=== Detail Model ===-->
        <div class="model_detail">
            <?php if (is_object($model_for_slider)): ?>
                <p><span><?php echo $model_for_slider->model_name; ?></span></p>
                <p><?php echo $model_for_slider->sex == 0 ? 'Nữ' : 'Nam'; ?></p>
                <p><?php echo $model_for_slider->description; ?></p>
            <?php endif; ?>
        </div>
        <div class="clear"></div>
        <!--=== /Detail Model ===-->
    </div>

</div>

<script>
    function display_model(model_id) {
        $.ajax({
            type: "post",
            url: "<?php echo site_url('home/models/display_model'); ?>",
            data: {
                model_id: model_id
            },
            success: function(response) {
                $("#display_model").html(response);
            }
        });
    }
</script>