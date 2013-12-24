<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <title>ZonStudio | Product</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/main.css" rel="stylesheet" type="text/css" media="all">
    <!--Get jQuery-->
    <script type="text/javascript" src="js/jquery.1.7.2.js"></script>
    <!--[if lt IE 9]>
    <link href="css/ie/ie8.css" rel="stylesheet" type="text/css" media="all">
    <script src="js/ie/html5shiv.min.js"></script>
    <![endif]-->

    <!--Get library slider-->
    <link rel="stylesheet" href="js/plugins/jquery-cycle-slideshows/css/slideshows.css" />
    <script src="js/plugins/jquery-cycle-slideshows/js/jquery.cycle.all.js"></script>
    <script src="js/plugins/jquery-cycle-slideshows/js/jquery.easing.1.3.js"></script>

    <script type="text/javascript">
        $(function() {
            $('#slideshow_2').cycle({
                fx: 'fade',
                speed:  900,
                timeout: 5000,
                prev: '.ss2_wrapper .slideshow_prev',
                next: '.ss2_wrapper .slideshow_next',
                before: function(currSlideElement, nextSlideElement) {
                    var data = $('.data', $(nextSlideElement)).html();
                    $('.ss2_wrapper .slideshow_box').stop(true, true).animate({ bottom:'-110px'}, 400, function(){
                        $('.ss2_wrapper .slideshow_box .data').html(data);
                    });
                    $('.ss2_wrapper .slideshow_box').delay(100).animate({ bottom:'0'}, 400);
                }
            });

            $('.ss2_wrapper').mouseenter(function(){
                $('#slideshow_2').cycle('pause');
                $('.ss2_wrapper .slideshow_prev').stop(true, true).animate({ left:'20px'}, 200);
                $('.ss2_wrapper .slideshow_next').stop(true, true).animate({ right:'20px'}, 200);
            }).mouseleave(function(){
                $('#slideshow_2').cycle('resume');
                $('.ss2_wrapper .slideshow_prev').stop(true, true).animate({ left:'-40px'}, 200);
                $('.ss2_wrapper .slideshow_next').stop(true, true).animate({ right:'-40px'}, 200);
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
        <nav id="menu">
            <ul class="clear">
                <li><a href="index.html" title="Thời trang">Thời trang</a></li>
                <li class="drop"><a class="drop" href="#" title="Ảnh cưới">Ảnh cưới</a>
                    <ul>
                        <li><a href="#" title="Sản phẩm 1">Sản phẩm 1</a></li>
                        <li><a href="#" title="Sản phẩm 2">Sản phẩm 2</a></li>
                    </ul>
                </li>
                <li><a class="drop active" href="#" title="Sản phẩm">Sản phẩm</a>
                    <ul>
                        <li><a href="#" title="Sản phẩm 1">Sản phẩm 1</a></li>
                        <li><a href="#" title="Sản phẩm 2">Sản phẩm 2</a></li>
                    </ul>
                </li>
                <li><a href="#" title="Người mẫu">Người mẫu</a></li>
                <li class="last-child"><a href="#" title="Liên hệ">Liên hệ</a></li>
            </ul>
        </nav>
        <!--=== /Menu ===-->

        <!--=== Social Icons ===-->
        <ul class="social-icons">
            <li><a class="social_rss" data-original-title="Feed" href="#"></a></li>
            <li><a class="social_facebook" data-original-title="Facebook" href="#"></a></li>
            <li><a class="social_twitter" data-original-title="Twitter" href="#"></a></li>
            <li><a class="social_googleplus" data-original-title="Goole Plus" href="#"></a></li>
            <li><a class="social_youtube" data-original-title="Youtube" href="#"></a></li>
            <li class="last" ><a class="social_pintrest" data-original-title="Pinterest" href="#"></a></li>
        </ul>
        <div class="clear"></div>
        <!--=== /Social Icons ===-->
    </div>
    <div class="clear"></div>
    <!--=== End Header ===-->

    <!--=== Logo ===-->
    <div class="wrapper logo">
        <a href="#"><img src="images/logo.png" alt="ZonStudio"/></a>
    </div>
    <div class="clear"></div>
    <!--=== End Logo ===-->

    <!--=== Slider ===-->
    <div class="wrapper slide">
        <div class="ss2_wrapper">
            <a href="#" class="slideshow_prev"><span>Previous</span></a>
            <a href="#" class="slideshow_next"><span>Next</span></a>
            <div class="slideshow_box">
                <div class="data"></div>
            </div>
            <div id="slideshow_2" class="slideshow">
                <div class="slideshow_item">
                    <div class="image"><a href="#"><img src="images/slides/image1.jpg" alt="photo 2" width="900" height="400" /></a></div>
                    <div class="data">
                        <h4><a href="#">Donec sollicitudin enim sit</a></h4>
                        <p>Sed mollis tristique lectus vitae aliquet. Quisque vitae metus ut velit varius feugiat. Maecenas luctus pulvinar elit et viverra. Aenean vel est nulla. </p>
                    </div>
                </div>
                <div class="slideshow_item">
                    <div class="image"><a href="#"><img src="images/slides/image2.jpg" alt="photo 3" width="900" height="400" /></a></div>
                    <div class="data">
                        <h4><a href="#">Pellentesque lacinia metus</a></h4>
                        <p>Integer pretium volutpat ligula sit amet pretium. Morbi nisi dui, rutrum ut bibendum sit amet, gravida eget dui. </p>
                    </div>
                </div>
                <div class="slideshow_item">
                    <div class="image"><a href="#"><img src="images/slides/image3.jpg" alt="photo 1" width="900" height="400" /></a></div>
                    <div class="data">
                        <h4><a href="#">Lorem ipsum dolor sit amet</a></h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sollicitudin enim sit amet dolor posuere dictum. Pellentesque lacinia metus non erat auctor vehicula.</p>
                    </div>
                </div>
                <div class="slideshow_item">
                    <div class="image"><a href="#"><img src="images/slides/image4.jpg" alt="photo 4" width="900" height="400" /></a></div>
                    <div class="data">
                        <h4><a href="#">Morbi nisi dui bibendum sit amet</a></h4>
                        <p>Aliquam feugiat lorem at massa pulvinar interdum. Ut nulla est, vulputate eget facilisis vel, cursus nec sapien. Quisque tincidunt adipiscing lorem, tincidunt sodales lorem imperdiet quis.</p>
                    </div>
                </div>
            </div>
        </div><!-- .ss2_wrapper -->
        <div class="clear"></div>
    </div>
    <!--=== End Slider ===-->

    <!--=== Service ===-->
    <div class="wrapper service">
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
    </div>
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
    (function (d, t) {
        var g = d.createElement(t), s = d.getElementsByTagName(t)[0];
        g.src = ('https:' == location.protocol ? '//ssl' : '//www') + '.google-analytics.com/ga.js';
        s.parentNode.insertBefore(g, s)
    }(document, 'script'));
</script>
<!--=== End Scripts ===-->
</body>
</html>