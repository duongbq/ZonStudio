<div class="headerbar">

    <h1>Models</h1>

    <div class="pull-right">
        <a class="btn btn-primary" href="/model/create"><i class="icon-plus icon-white"></i> Thêm model</a>
    </div>



</div>

<div class="table-content">

    <table class="table table-striped">

        <thead>
            <tr>
                <th>Tên model</th>
                <th>Sex</th>
                <th>Tùy chọn</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($models as $model) { ?>
                <tr>
                    <td>
                        <?php echo $model->model_name; ?>
                    </td>
                    <td>
                        <?php echo $model->sex == 0 ? 'Nữ' : 'Nam'; ?>
                    </td>
                    <td>
                        <div class="options btn-group">
                            <a class="btn btn-small dropdown-toggle" data-toggle="dropdown" href="#"><i class="icon-cog"></i> <?php echo lang('options'); ?></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="<?php echo site_url('model/edit/' . $model->id); ?>">
                                        <i class="icon-pencil"></i> Sửa thông tin model
                                    </a>
                                </li>
                                
                                <li>
                                    <a href="<?php echo site_url('model/upload/' . $model->id); ?>">
                                        <i class="icon-pencil"></i> Thêm ảnh
                                    </a>
                                </li>

                                <li>
                                    <a href="<?php echo site_url('model/delete/' . $model->id); ?>" onclick="return confirm('Sẽ thực hiện xóa tất cả ảnh thuộc model này. Thực sự muốn xóa k?');">
                                        <i class="icon-trash"></i> Xóa model
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