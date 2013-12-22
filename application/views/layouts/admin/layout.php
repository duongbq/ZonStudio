<!doctype html>

<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->

    <head>

        <meta charset="utf-8">

        <!-- Use the .htaccess and remove these lines to avoid edge case issues -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

        <title><?php echo isset($title_for_layout) ? $title_for_layout : 'Zon Studio'; ?></title>
        <?php echo link_tag('assets/default/css/style.css'); ?>
        <?php echo link_tag('assets/fancybox/jquery.fancybox-1.3.4.css'); ?>

        <script src="<?php echo base_url(); ?>assets/default/js/libs/modernizr-2.0.6.js"></script>
        <script src="<?php echo base_url(); ?>assets/default/js/libs/jquery-1.7.1.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/default/js/libs/jquery-ui-1.10.3.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/default/js/libs/bootstrap.min.js"></script>

        <script src="<?php echo base_url(); ?>assets/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
        <script src="<?php echo base_url(); ?>assets/fancybox/jquery.fancybox-1.3.4.pack.js"></script>


        <script type="text/javascript">

            $(function()
            {
                $(".fancybox").fancybox();

                $('.nav-tabs').tab();
                $('.tip').tooltip();

                $('.datepicker').datepicker({format: 'd/m/Y'});

//                $('.create-album').click(function() {
//                    $('#modal-placeholder').load("<?php //echo site_url('album/ajax/modal_create_album');       ?>");
//                });
//
//                $('.create-quote').click(function() {
//                    $('#modal-placeholder').load("<?php //echo site_url('quotes/ajax/modal_create_quote');       ?>");
//                });
//
//                $('#btn_quote_to_invoice').click(function() {
//                    quote_id = $(this).data('quote-id');
//                    $('#modal-placeholder').load("<?php //echo site_url('quotes/ajax/modal_quote_to_invoice');       ?>/" + quote_id);
//                });
//
//                $('#btn_copy_invoice').click(function() {
//                    invoice_id = $(this).data('invoice-id');
//                    $('#modal-placeholder').load("<?php //echo site_url('invoices/ajax/modal_copy_invoice');       ?>", {invoice_id: invoice_id});
//                });
//
//                $('#btn_copy_quote').click(function() {
//                    quote_id = $(this).data('quote-id');
//                    $('#modal-placeholder').load("<?php //echo site_url('quotes/ajax/modal_copy_quote');       ?>", {quote_id: quote_id});
//                });
//
//                $('.client-create-invoice').click(function() {
//                    $('#modal-placeholder').load("<?php //echo site_url('invoices/ajax/modal_create_invoice');       ?>", {
//                        client_name: $(this).data('client-name')
//                    });
//                });
//                $('.client-create-quote').click(function() {
//                    $('#modal-placeholder').load("<?php //echo site_url('quotes/ajax/modal_create_quote');       ?>", {
//                        client_name: $(this).data('client-name')
//                    });
//                });
//                $(document).on('click', '.invoice-add-payment', function() {
//                    invoice_id = $(this).data('invoice-id');
//                    invoice_balance = $(this).data('invoice-balance');
//                    $('#modal-placeholder').load("<?php //echo site_url('services/ajax/modal_add_payment');       ?>", {invoice_id: invoice_id, invoice_balance: invoice_balance});
//                });

            });

        </script>

    </head>

    <body>

        <?php $this->load->view('layouts/admin/menu'); ?>

        <?php $this->load->view('layouts/admin/sidebar'); ?>

        <div class="main-area">

            <div id="modal-placeholder"></div>

            <?php echo $content_for_layout; ?>

        </div><!--end.content-->

        <script defer src="<?php echo base_url(); ?>assets/default/js/plugins.js"></script>
        <script defer src="<?php echo base_url(); ?>assets/default/js/script.js"></script>
        <script src="<?php echo base_url(); ?>assets/default/js/bootstrap-datepicker.js"></script>

        <!--[if lt IE 7 ]>
                <script src="<?php echo base_url(); ?>assets/default/js/dd_belatedpng.js"></script>
                <script type="text/javascript"> DD_belatedPNG.fix('img, .png_bg'); //fix any <img> or .png_bg background-images </script>
        <![endif]-->

        <!-- Prompt IE 6 users to install Chrome Frame. Remove this if you want to support IE 6.
                 chromium.org/developers/how-tos/chrome-frame-getting-started -->
        <!--[if lt IE 7 ]>
          <script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
          <script type="text/javascript">window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
        <![endif]-->

    </body>
</html>