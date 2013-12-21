<table class="table table-striped">

    <thead>
        <tr>
            <th>Tên dịch vụ</th>
            <th>Tùy chọn</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($services as $service) { ?>
            <tr>
                <td><?php echo $service->service_name; ?></td>
                <td>
                    <div class="options btn-group">
                        <a class="btn btn-small dropdown-toggle" data-toggle="dropdown" href="#"><i class="icon-cog"></i> <?php echo lang('options'); ?></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="<?php echo site_url('services/edit/' . $service->id); ?>">
                                    <i class="icon-pencil"></i> Sửa
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('services/delete/' . $service->id); ?>" onclick="return confirm('Thực sự muốn xóa không?');">
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