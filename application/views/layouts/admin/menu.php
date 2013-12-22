<nav class="navbar navbar-inverse">

    <div class="navbar-inner">

        <div class="container">

            <ul class="nav">

                <li><?php echo anchor(base_url(), 'Trang chủ', 'target="_blank"'); ?></li>

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
                        <li><?php echo anchor('packages/create', 'Tạo gói dịch vụ'); ?></li>
                        <li><?php echo anchor('packages/index', 'Gói dịch vụ'); ?></li>
                    </ul>
                </li>
                
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Album ảnh<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><?php echo anchor('album/create', 'Tạo album mới'); ?></li>
                        <li><?php echo anchor('album/index', 'Album ảnh'); ?></li>
                    </ul>
                </li>


            </ul>

            <ul class="nav pull-right settings">
                <li>
                    <?php echo anchor('users/form/' . $this->csession->get('user_id'), $this->csession->get('full_name')); ?>
                </li>
                <li><a href="<?php echo site_url('settings'); ?>" class="tip icon dropdown-toggle" data-original-title="Thiết lập" data-placement="bottom"><i class="icon-cog"></i></a></li>
                <li class="divider-vertical"></li>
                <li><a href="<?php echo site_url('sessions/logout'); ?>" class="tip icon logout" data-original-title="Đăng xuất" data-placement="bottom"><i class="icon-off"></i></a></li>
            </ul>

        </div>

    </div>

</nav>

