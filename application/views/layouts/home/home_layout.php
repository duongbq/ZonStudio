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

            </div>
            <!--=== End Container ===-->

            <!--=== Scripts ===-->
            <script src="/assets/js/custom.js"></script>
            
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