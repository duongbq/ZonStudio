<div class="headerbar">
    <h1>Gói dịch vụ</h1>

    <div class="pull-right">
        <a class="btn btn-primary" href="<?php echo site_url('packages/create'); ?>"><i class="icon-plus icon-white"></i> Tạo gói dịch vụ mới</a>
    </div>

</div>

<div class="table-content">

    <?php echo $this->load->view('layouts/admin/alerts'); ?>

    <table class="table table-striped">

        <thead>
            <tr>
                <th>Tên dịch vụ</th>
                <th>Tên gói dịch vụ</th>
                <th>Báo giá</th>
                <th>Tùy chọn</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($packages as $package) { ?>
                <tr>
                    <td><?php echo $package->service_name; ?></td>
                    <td><?php echo $package->package_name; ?></td>
                    <td><?php echo $package->price; ?></td>
                    <td>
                        <div class="options btn-group">
                            <a class="btn btn-small dropdown-toggle" data-toggle="dropdown" href="#"><i class="icon-cog"></i> <?php echo lang('options'); ?></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="<?php echo site_url('packages/edit/' . $package->id); ?>">
                                        <i class="icon-pencil"></i> Sửa thông tin
                                    </a>
                                </li>
                                <li>
                                    <a href="#modal-placeholder" data-toggle="modal" onclick="load_modal('<?php echo site_url('packages/upload/' . $package->id); ?>');">
                                        <i class="icon-picture"></i> Thêm ảnh slider
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('packages/delete/' . $package->id); ?>" onclick="return confirm('Chắc chắn xóa?');">
                                        <i class="icon-trash"></i> Xóa
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
            <?php } ?>
        </tbody>

    </table>

</div>