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
                <?php foreach ($female_models as $female_model):?>
                <!--<li class="active"><a href="#">Thúy An</a></li>-->
                <li><a href="#"><?php echo $female_model->model_name; ?></a></li>
                <?php endforeach; ?>
                <li class="last" ><a href="#" class="model_more"></a></li>
            </ul>
        </div>
        <div class="clear"></div>
        <div class="male_model">
            <h3>Nam</h3>
            <ul>
                <?php foreach ($male_models as $male_model):?>
                <!--<li class="active"><a href="#">Thúy An</a></li>-->
                <li><a href="#"><?php echo $male_model->model_name; ?></a></li>
                <?php endforeach; ?>
                <li class="last" ><a href="#" class="model_more"></a></li>
            </ul>
        </div>
        <div class="clear"></div>
    </div>
    <!--=== /Category Model ===-->

    <!--=== Slider Model ===-->
    <div class="ss2_wrapper model_show" style="left: 0px !important;">
        <a href="#" class="slideshow_prev"><span>Previous</span></a>
        <a href="#" class="slideshow_next"><span>Next</span></a>
        <div class="slideshow_box"></div>
        <div id="slideshow_2" class="slideshow">
            
            <?php foreach ($images_for_slider_model as $image):?>
            <div class="slideshow_item">
                <div class="image"><a href="#"><img src="/uploads/model/<?php echo $image->file_name; ?>" /></a></div>
            </div>
            <?php endforeach;?>
            
<!--            <div class="slideshow_item">
                <div class="image"><a href="#"><img src="/assets/images/slides/image2.jpg" alt="photo 3" /></a></div>
            </div>
            <div class="slideshow_item">
                <div class="image"><a href="#"><img src="/assets/images/slides/image3.jpg" alt="photo 1" /></a></div>
            </div>
            <div class="slideshow_item">
                <div class="image"><a href="#"><img src="/assets/images/slides/image4.jpg" alt="photo 4" /></a></div>
            </div>-->
        </div>
    </div><!-- .ss2_wrapper -->
    <div class="clear"></div>
    <!--=== End Slider Model ===-->

    <!--=== Detail Model ===-->
    <div class="model_detail">
        <p><span><?php echo $model_for_slider->model_name; ?></span></p>
        <p><?php echo $model_for_slider->sex == 0 ? 'Nữ' : 'Nam';?></p>
        <p><?php echo $model_for_slider->description; ?></p>
    </div>
    <div class="clear"></div>
    <!--=== /Detail Model ===-->
</div>