<nav class="navbar navbar-inverse">

    <div class="navbar-inner">

        <div class="container">

            <ul class="nav">

                <li><?php echo anchor(base_url(), 'Quay lại trang chủ', 'target="_blank"'); ?></li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Gói dịch vụ<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><?php echo anchor('packages/index', 'Danh sách gói dịch vụ'); ?></li>
                        <li><?php echo anchor('packages/create', 'Tạo gói dịch vụ'); ?></li>
                        
                    </ul>
                </li>
                
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Models<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><?php echo anchor('model/index', 'Danh sách model'); ?></li>
                        <li><?php echo anchor('model/create', 'Thêm model'); ?></li>
                    </ul>
                </li>
                
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Sản phẩm<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Danh sách sản phẩm</a></li>
                        <li><a href="#">Thêm sản phẩm</a></li>
                    </ul>
                </li>
                
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Tin tức<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Danh sách tin đã đăng</a></li>
                        <li><a href="#">Đăng tin</a></li>
                    </ul>
                </li>


            </ul>

            <ul class="nav pull-right settings">
                <li>
                    <a href="#modal-placeholder" data-toggle="modal" onclick="load_modal('<?php echo site_url('sessions/profile'); ?>');"><?php echo $this->csession->get('full_name'); ?></a>
                </li>
                <li><a href="<?php echo site_url('settings'); ?>" class="tip icon dropdown-toggle" data-original-title="Thiết lập" data-placement="bottom"><i class="icon-cog"></i></a></li>
                <li class="divider-vertical"></li>
                <li><a href="<?php echo site_url('sessions/logout'); ?>" class="tip icon logout" data-original-title="Đăng xuất" data-placement="bottom"><i class="icon-off"></i></a></li>
            </ul>

        </div>

    </div>

</nav>

