<div class="headerbar">
    <h1>Danh sách ảnh chân dung</h1>

    <div class="pull-right">
        <a class="btn btn-primary" href="<?php echo site_url('portraits/create'); ?>"><i class="icon-plus icon-white"></i> Chân dung mới</a>
    </div>

</div>

<div class="table-content">

    <?php echo $this->load->view('layouts/admin/alerts'); ?>

    <table class="table table-striped">

        <thead>
            <tr>
                <th>Tên</th>
                <th>Tùy chọn</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($portraits as $portrait) { ?>
                <tr>
                    <td><?php echo $portrait->portrait_name; ?></td>
                    <td>
                        <div class="options btn-group">
                            <a class="btn btn-small dropdown-toggle" data-toggle="dropdown" href="#"><i class="icon-cog"></i> <?php echo lang('options'); ?></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="<?php echo site_url('portraits/edit/' . $portrait->id); ?>">
                                        <i class="icon-pencil"></i> Sửa thông tin
                                    </a>
                                </li>
                                <li>
                                    <a href="#modal-placeholder" data-toggle="modal" onclick="load_modal('<?php echo site_url('portraits/upload/' . $portrait->id); ?>');">
                                        <i class="icon-picture"></i> Thêm ảnh
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('portraits/delete/' . $portrait->id); ?>" onclick="return confirm('Chắc chắn xóa?');">
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

