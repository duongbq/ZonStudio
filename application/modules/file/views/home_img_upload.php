<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Upload ảnh lên trang chủ</h3>
</div>
<form method="post" enctype="multipart/form-data" action="<?php echo site_url('file/upload_home_image'); ?>" class="form-inline">

    <div class="modal-body">
        <?php if (count($home_files) < 3): ?>
            <input type="file" name="userfile" accept="image/*"/>
        <?php endif; ?>
        <div style="clear: both;">&nbsp;</div>

        <table class="table table-striped">

            <thead>
                <tr>
                    <th>Ảnh</th>
                    <th>Tải lên ngày</th>
                    <th>Tùy chọn</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($home_files as $image) { ?>
                    <tr>
                        <td>
                            <a target=" _blank" href="/uploads/home/<?php echo $image->file_name; ?>">
                                <img style="width: 100px; height: 75px;" src="/uploads/home/<?php echo $image->file_name; ?>"/>
                            </a>
                        </td>
                        <td><?php echo $image->uploaded_date; ?></td>
                        <td>
                            <a href="<?php echo site_url('file/remove_home_image/' . $image->id); ?>" onclick="return confirm('Chắc chắn xóa?');">
                                <i class="icon-trash"></i> Xóa ảnh
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>

        </table>



    </div>

    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
        <button type="submit" class="btn btn-primary">Upload</button>
    </div>

</form>