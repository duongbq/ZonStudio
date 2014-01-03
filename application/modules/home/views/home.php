<?php
$fashion_img = is_object($fashion_image) ? '/uploads/home/' . $fashion_image->file_name : '/assets/images/noimage.png';
$wedding_img = is_object($wedding_image) ? '/uploads/home/' . $wedding_image->file_name : '/assets/images/noimage.png';
$product_img = is_object($product_image) ? '/uploads/home/' . $product_image->file_name : '/assets/images/noimage.png';
?>

<section class="ib-container" id="ib-container">
    <article class="ib-fashion" >
        <header>
            <a href="<?php echo site_url('thoi-trang'); ?>">
                <img src="<?php echo $fashion_img; ?>"/>
                <span>Fashion</span>
            </a>
        </header>
    </article>
    <article  class="ib-wedding" >
        <header>
            <a href="<?php echo site_url('anh-cuoi'); ?>">
                <img src="<?php echo $wedding_img; ?>"/>
                <span>Wedding</span>
            </a>
        </header>
    </article>
    <article  class="ib-product" >
        <header>
            <a class="product_link" href="<?php echo site_url('chan-dung'); ?>">
                <img src="<?php echo $product_img; ?>"/>
                <span>Portrait</span>
            </a>
        </header>
    </article>
    <article  class="ib-contact" >
        <header>
            <a class="contact_link" href="<?php echo site_url('lien-he'); ?>">
                <img src="/assets/css/img/contact.png"/>
                <span>Contact us</span>
            </a>
        </header>
    </article>
</section>
<script>
    $(function() {

        var $container	= $('#ib-container'),
                $articles	= $container.children('article'),
                timeout;

        $articles.on( 'mouseenter', function( event ) {

            var $article	= $(this);
            clearTimeout( timeout );
            timeout = setTimeout( function() {

                if( $article.hasClass('active') ) return false;

                $articles.not( $article.removeClass('blur').addClass('active') )
                        .removeClass('active')
                        .addClass('blur');

            }, 65 );

        });

        $container.on( 'mouseleave', function( event ) {

            clearTimeout( timeout );
            $articles.removeClass('active blur');

        });

    });
</script>