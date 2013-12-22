<!doctype html>

<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->

    <html lang="en" dir="ltr">
        <head>
            <?php
            echo meta(array(
                array('name' => 'description', 'content' => isset($meta_description) ? $meta_description : DEFAULT_DESCRIPTION),
                array('name' => 'keywords', 'content' => isset($meta_keywords) ? $meta_keywords : DEFAULT_KEYWORDS),
                array('name' => 'robots', 'content' => 'index,follow'),
                array('name' => 'viewport', 'content' => 'width=device-width, initial-scale=1.0'),
                array('name' => 'Content-type', 'content' => 'text/html; charset=utf-8', 'type' => 'equiv')
            ));

            echo link_tag('assets/css/main.css');
            echo link_tag('assets/images/favicon.ico', 'shortcut icon', 'image/x-icon');
            ?>

            <title><?php echo isset($title_for_layout) && $title_for_layout != '' ? $title_for_layout : 'Zon Studio'; ?></title>

            <script type="text/javascript" src="/assets/js/jquery.1.7.2.js"></script>

            <!--[if lt IE 9]>
            <link href="/assets/css/ie/ie8.css" rel="stylesheet" type="text/css" media="all">
            <script src="/assets/js/ie/html5shiv.min.js"></script>
            <![endif]-->

            <!--Get library slider-->
            <link rel="stylesheet" href="/assets/js/plugins/jquery-cycle-slideshows/css/slideshows.css" />
            <script src="/assets/js/plugins/jquery-cycle-slideshows/js/jquery.cycle.all.js"></script>
            <script src="/assets/js/plugins/jquery-cycle-slideshows/js/jquery.easing.1.3.js"></script>

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
        </head>
        <body class="">

            <!--=== Container ===-->
            <div id="container">
                <!--=== Header ===-->
                <div class="wrapper social">
                    <!--=== Menu ===-->
                    <?php $this->load->view('layouts/home/home_menu');?>
                    <!--=== /Menu ===-->

                    <!--=== Social Icons ===-->
                    <?php $this->load->view('layouts/home/home_social');?>
                    <div class="clear"></div>
                    <!--=== /Social Icons ===-->
                </div>
                <div class="clear"></div>
                <!--=== End Header ===-->

                <!--=== Logo ===-->
                <div class="wrapper logo">
                    <a href="<?php echo base_url(); ?>"><img src="/assets/images/logo.png" alt="ZonStudio"/></a>
                </div>
                <div class="clear"></div>
                <!--=== End Logo ===-->
                
                
                <?php echo $content_for_layout; ?>
                
                
                <!--=== Slider ===-->
                <?php // $this->load->view('layouts/home/home_slider'); ?>
                <!--=== End Slider ===-->

                <!--=== Service ===-->
<!--                <div class="wrapper service">
                    <div class="one_third">
                        <div class="infofield">
                            <ul>
                                <li><span>Chụp ảnh thời trang trong studio</span></li>
                                <li>Chụp sản phẩm: Quần áo, giầy dép, mũ nón, phụ kiện thời trang, có người mẫu nam - nữ trong studio phông màu</li>
                                <li>Số lượng 25 bộ sản phẩm (tính thêm phụ phí từ bộ sản phẩm thứ 26)</li>
                                <li>Quy cách: 4 ảnh đã qua xử lý hậu kỳ/bộ sản phẩm</li>
                                <li>Kích thước file trả theo mục đích sử dụng của khách hàng</li>
                                <li>Nhận giao đồ tận nơi khách hàng</li>
                                <li><span>1.600.000đ</span> giá đã bao gồm người mẫu và makeup</li>
                            </ul>
                        </div>
                    </div>
                    <div class="one_third">
                        <div class="infofield">
                            <ul>
                                <li><span>Chụp ảnh thời ngoài trời</span></li>
                                <li>Chụp sản phẩm: Quần áo, giầy dép, mũ nón, phụ kiện thời trang, có người mẫu nam - nữ trong studio phông màu</li>
                                <li>Số lượng 25 bộ sản phẩm (tính thêm phụ phí từ bộ sản phẩm thứ 26)</li>
                                <li>Quy cách: 4 ảnh đã qua xử lý hậu kỳ/bộ sản phẩm</li>
                                <li>Kích thước file trả theo mục đích sử dụng của khách hàng</li>
                                <li>Nhận giao đồ tận nơi khách hàng</li>
                                <li><span>1.600.000đ</span> giá đã bao gồm người mẫu và makeup</li>
                            </ul>
                        </div>
                    </div>
                    <div class="one_third service_last">
                        <div class="infofield">
                            <ul>
                                <li><span>Bộ sưu tập thời trang</span></li>
                                <li>Chụp sản phẩm: Quần áo, giầy dép, mũ nón, phụ kiện thời trang, có người mẫu nam - nữ trong studio phông màu</li>
                                <li>Số lượng 25 bộ sản phẩm (tính thêm phụ phí từ bộ sản phẩm thứ 26)</li>
                                <li>Quy cách: 4 ảnh đã qua xử lý hậu kỳ/bộ sản phẩm</li>
                                <li>Kích thước file trả theo mục đích sử dụng của khách hàng</li>
                                <li>Nhận giao đồ tận nơi khách hàng</li>
                                <li><span>1.600.000đ</span> giá đã bao gồm người mẫu và makeup</li>
                            </ul>
                        </div>
                    </div>

                    <div class="clear"></div>
                </div>-->
                <!--=== /Service ===-->

            </div>
            <!--=== End Container ===-->

            <!--=== Scripts ===-->
            <script src="js/custom.js"></script>
            <script type="text/javascript">
                var _gaq = [
                    ['_setAccount', 'UA-XXXXX-X'],
                    ['_trackPageview']
                ];
                (function(d, t) {
                    var g = d.createElement(t), s = d.getElementsByTagName(t)[0];
                    g.src = ('https:' == location.protocol ? '//ssl' : '//www') + '.google-analytics.com/ga.js';
                    s.parentNode.insertBefore(g, s)
                }(document, 'script'));
            </script>
            <!--=== End Scripts ===-->
        </body>
    </html>