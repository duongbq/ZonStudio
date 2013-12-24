<?php
$fashion_img = isset($home_files[0]) && file_exists('./uploads/home/' . $home_files[0]->file_name) ? '/uploads/home/' . $home_files[0]->file_name : '';
$wedding_img = isset($home_files[1]) && file_exists('./uploads/home/' . $home_files[1]->file_name) ? '/uploads/home/' . $home_files[1]->file_name : '';
$product_img = isset($home_files[2]) && file_exists('./uploads/home/' . $home_files[2]->file_name) ? '/uploads/home/' . $home_files[2]->file_name : '';



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
        <a class="product_link" href="<?php echo site_url('san-pham'); ?>" style="background: url(<?php echo $product_img; ?>) no-repeat;">
            <span>Product</span>
        </a>
        <a class="contact_link" href="<?php echo site_url('lien-he'); ?>"><span>Contact</span></a>
    </li>

</ul>