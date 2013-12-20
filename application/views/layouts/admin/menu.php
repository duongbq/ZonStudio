<nav class="navbar navbar-inverse">

    <div class="navbar-inner">

        <div class="container">

            <ul class="nav">

                <li><?php echo anchor('dashboard', 'Trang quản trị'); ?></li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Tài khoản<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><?php echo anchor('users/form', 'Tạo tài khoản'); ?></li>
                        <li><?php echo anchor('users/index', 'Danh sách tài khoản'); ?></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dịch vụ<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><?php echo anchor('services/create', 'Mở dịch vụ mới'); ?></li>
                        <li><?php echo anchor('services/index', 'Danh sách dịch vụ'); ?></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Gói dịch vụ<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><?php echo anchor('packages/create', 'Tạo gói dịch vụ');         ?></li>
                        <li><?php echo anchor('packages/index', 'Gói dịch vụ');         ?></li>
                    </ul>
                </li>

                <!--                        <li class="dropdown">-->
                <!--                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">--><?php //echo lang('services');         ?><!--<b class="caret"></b></a>-->
                <!--                            <ul class="dropdown-menu">-->
                <!--                                <li>--><?php //echo anchor('services/form', lang('enter_payment'));         ?><!--</li>-->
                <!--                                <li>--><?php //echo anchor('services/index', lang('view_payments'));         ?><!--</li>-->
                <!--                            </ul>-->
                <!--                        </li>-->

                <!--                        <li class="dropdown">-->
                <!--                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">--><?php //echo lang('reports');         ?><!--<b class="caret"></b></a>-->
                <!--                            <ul class="dropdown-menu">-->
                <!--                                <li>--><?php //echo anchor('reports/invoice_aging', lang('invoice_aging'));         ?><!--</li>-->
                <!--                                <li>--><?php //echo anchor('reports/payment_history', lang('payment_history'));         ?><!--</li>-->
                <!--                                <li>--><?php //echo anchor('reports/sales_by_client', lang('sales_by_client'));         ?><!--</li>-->
                <!--                            </ul>-->
                <!--                        </li>-->

            </ul>

            <!--                    --><?php //if (isset($filter_display) and $filter_display == TRUE) {         ?>
            <!--                        --><?php //$this->layout->load_view('filter/jquery_filter');         ?>
            <!--                        <form class="navbar-search pull-left">-->
            <!--                            <input type="text" class="search-query" id="filter" placeholder="--><?php //echo $filter_placeholder;         ?><!--">-->
            <!--                        </form>-->
            <!--                    --><?php //}         ?>

            <ul class="nav pull-right settings">
                <li>
                    <?php echo anchor('users/form/' . $this->session->userdata('user_id'), $this->session->userdata('full_name')); ?>
                </li>
                <li><a href="<?php echo site_url('settings'); ?>" class="tip icon dropdown-toggle" data-original-title="Thiết lập" data-placement="bottom"><i class="icon-cog"></i></a></li>
                <!--                        <li class="dropdown">
                                            <a href="#" class="tip icon dropdown-toggle" data-toggle="dropdown" data-original-title="Thiết lập" data-placement="bottom"><i class="icon-cog"></i></a>
                                            <ul class="dropdown-menu">
                                                <li><?php //echo anchor('custom_fields/index', lang('custom_fields'));         ?></li>
                                                <li><?php //echo anchor('email_templates/index', lang('email_templates'));         ?></li>
                                                <li><?php //echo anchor('import', lang('import_data'));         ?></li>
                                                <li><?php //echo anchor('invoice_groups/index', lang('invoice_groups'));         ?></li>
                                                <li><?php //echo anchor('item_lookups/index', lang('item_lookups'));         ?></li>
                                                <li><?php //echo anchor('payment_methods/index', lang('payment_methods'));         ?></li>
                                                <li><?php //echo anchor('packages/index', lang('packages'));         ?></li>
                                                <li><?php //echo anchor('users/index', lang('user_accounts'));         ?></li>
                                                <li class="divider"></li>
                                                <li><?php //echo anchor('settings', lang('system_settings'));         ?></li>
                                            </ul>
                                        </li>-->
                <li class="divider-vertical"></li>
                <li><a href="<?php echo site_url('sessions/logout'); ?>" class="tip icon logout" data-original-title="Đăng xuất" data-placement="bottom"><i class="icon-off"></i></a></li>
            </ul>

        </div>

    </div>

</nav>

