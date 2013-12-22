<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <title>ZonStudio | Contact</title>
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
                <nav id="menu">
                    <ul class="clear">
                        <li><a href="index.html" title="Thời trang">Thời trang</a></li>
                        <li class="drop"><a class="drop" href="#" title="Ảnh cưới">Ảnh cưới</a>
                            <ul>
                                <li><a href="#" title="Sản phẩm 1">Sản phẩm 1</a></li>
                                <li><a href="#" title="Sản phẩm 2">Sản phẩm 2</a></li>
                            </ul>
                        </li>
                        <li><a class="drop" href="#" title="Sản phẩm">Sản phẩm</a>
                            <ul>
                                <li><a href="#" title="Sản phẩm 1">Sản phẩm 1</a></li>
                                <li><a href="#" title="Sản phẩm 2">Sản phẩm 2</a></li>
                            </ul>
                        </li>
                        <li><a href="#" title="Người mẫu">Người mẫu</a></li>
                        <li class="last-child active"><a href="#" title="Liên hệ">Liên hệ</a></li>
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