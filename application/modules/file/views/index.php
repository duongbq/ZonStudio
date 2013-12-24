<div class="headerbar">

    <h1>Album ảnh</h1>

    <div class="pull-right">
        <a class="btn btn-primary" href="/file/create"><i class="icon-plus icon-white"></i> Upload ảnh</a>
    </div>



</div>

<div class="table-content">

    <table class="table table-striped">

        <thead>
            <tr>
                <th>Ảnh</th>
                <th>Ngày tải lên</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($files as $file) { ?>
                <tr>
                    <td>
                        <?php echo $file->album_caption; ?>
                    </td>
                    <td>
                        <div class="options btn-group">
                            <a class="btn btn-small dropdown-toggle" data-toggle="dropdown" href="#"><i class="icon-cog"></i> <?php echo lang('options'); ?></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="<?php echo site_url('album/edit/' . $file->id); ?>">
                                        <i class="icon-pencil"></i> Sửa
                                    </a>
                                </li>
                                
                                <li>
                                    <a href="<?php echo site_url('album/upload/' . $file->id); ?>">
                                        <i class="icon-pencil"></i> Thêm ảnh
                                    </a>
                                </li>

                                <li>
                                    <a href="<?php echo site_url('album/delete/' . $file->id); ?>" onclick="return confirm('Sẽ thực hiện xóa tất cả ảnh thuộc album này. Thực sự muốn xóa k?');">
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