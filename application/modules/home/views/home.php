<?php
$fashion_img = isset($home_files[0]) && file_exists('./uploads/home/' . $home_files[0]->file_name) ? '/uploads/home/' . $home_files[0]->file_name : '';
$wedding_img = isset($home_files[1]) && file_exists('./uploads/home/' . $home_files[1]->file_name) ? '/uploads/home/' . $home_files[1]->file_name : '';
$product_img = isset($home_files[2]) && file_exists('./uploads/home/' . $home_files[2]->file_name) ? '/uploads/home/' . $home_files[2]->file_name : '';



?>

<ul class="nav">

    <li class="nav_fashion" >

        <a href="<?php echo site_url('thoi-trang'); ?>">
            <span>Fashion</span>
            <img src="<?php echo $fashion_img; ?>" />
        </a>

    </li>

    <li class="nav_weeding">
        <a href="<?php echo site_url('anh-cuoi'); ?>">
            <span>Wedding</span>
            <img src="<?php echo $wedding_img; ?>" />
        </a>
    </li>

    <li class="nav_product">
        <a class="product_link" href="<?php echo site_url('san-pham'); ?>">
            <span>Product</span>
            <img src="<?php echo $product_img; ?>" />
        </a>
        <a class="contact_link" href="<?php echo site_url('lien-he'); ?>"><span>Contact</span></a>
    </li>

</ul>