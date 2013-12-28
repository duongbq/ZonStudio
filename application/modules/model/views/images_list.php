


<?php if (count($images) > 0): ?>
    <table class="table table-striped">

        <thead>
            <tr>
                <th>Ảnh</th>
                <th>Tải lên ngày</th>
                <th>Tùy chọn</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($images as $image) { ?>
                <tr id="img_row_<?php echo $image->file_id; ?>">
                    <td>
                        <a target=" _blank" href="/uploads/models/<?php echo $image->file_name; ?>">
                            <img style="width: 100px; height: 75px;" src="/uploads/models/<?php echo $image->file_name; ?>"/>
                        </a>
                    </td>
                    <td><?php echo $image->uploaded_date; ?></td>
                    <td class="form-inline">
                        <input onchange="set_model_slider(<?php echo $image->file_id; ?>, <?php echo $image->model_id; ?>);" type="checkbox" <?php echo $image->is_slide == 1 ? 'checked' : ''; ?>/>Hiện slide
                        &nbsp;
                        <a href="javascript:void(0);" onclick="remove_image(<?php echo $image->file_id; ?>, <?php echo $image->model_id; ?>)">
                            <i class="icon-trash"></i> Xóa ảnh
                        </a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>

    </table>

<?php endif; ?>
