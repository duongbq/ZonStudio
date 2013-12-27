<?php
$fashion_img = is_object($fashion_image) && file_exists('./uploads/home/' . $fashion_image->file_name) ? '/uploads/home/' . $fashion_image->file_name : '';
$wedding_img = is_object($wedding_image) && file_exists('./uploads/home/' . $wedding_image->file_name) ? '/uploads/home/' . $wedding_image->file_name : '';
$product_img = is_object($product_image) && file_exists('./uploads/home/' . $product_image->file_name) ? '/uploads/home/' . $product_image->file_name : '';



?>

<ul class="nav">

    <li class="nav_fashion" >

        <a href="<?php echo site_url('thoi-trang'); ?>" style="background: url(<?php echo $fashion_img; ?>) no-repeat;">
            <span>Fashion</span>
        </a>

    </li>

    <li class="nav_weeding">
        <a href="<?php echo site_url('anh-cuoi'); ?>" style="background: url(<?php echo $wedding_img; ?>) no-repeat;">
            <span>Wedding</span>
        </a>
    </li>

    <li class="nav_product">
        <a class="product_link" href="<?php echo site_url('chan-dung'); ?>" style="background: url(<?php echo $product_img; ?>) no-repeat;">
            <span>Portrait</span>
        </a>
        <a class="contact_link" href="<?php echo site_url('lien-he'); ?>"><span>Contact us</span></a>
    </li>

</ul>