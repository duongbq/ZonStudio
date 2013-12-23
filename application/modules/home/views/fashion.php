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
                            <img src="/uploads/package/<?php echo $image->file_name; ?>" title="<?php echo $image->package_name; ?>" alt="<?php echo $image->package_name; ?>" />
                        </a>
                    </div>
                    <div class="data">
                        <h4><a href="#"><?php //echo $package->package_name;  ?></a></h4>
                        <p><?php //echo $image->summary; ?></p>
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
                    <li>Giá: <span><?php echo number_format($package->price); ?> đ</li>
                </ul>
            </div>
        </div>

    <?php endforeach; ?>

    <div class="clear"></div>
</div>
<!--=== /Service ===-->
