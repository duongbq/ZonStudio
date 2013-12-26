


<?php if (count($home_files) > 0): ?>
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
                <tr id="img_row_<?php echo $image->id; ?>">
                    <td>
                        <a target=" _blank" href="/uploads/home/<?php echo $image->file_name; ?>">
                            <img style="width: 100px; height: 75px;" src="/uploads/home/<?php echo $image->file_name; ?>"/>
                        </a>
                    </td>
                    <td><?php echo $image->uploaded_date; ?></td>
                    <td class="form-inline">
                        <input onclick="set_home_display_index(<?php echo $image->id; ?>, 1);" type="radio" name="home_display_index_1" value="1" <?php echo $image->home_display_index == 1 ? 'checked' : ''; ?>/>Ảnh 1
                        <input onclick="set_home_display_index(<?php echo $image->id; ?>, 2);" type="radio" name="home_display_index_2" value="2" <?php echo $image->home_display_index == 2 ? 'checked' : ''; ?>/>Ảnh 2
                        <input onclick="set_home_display_index(<?php echo $image->id; ?>, 3);" type="radio" name="home_display_index_3" value="3" <?php echo $image->home_display_index == 3 ? 'checked' : ''; ?>/>Ảnh 3

                        <a href="javascript:void(0);" onclick="remove_img(<?php echo $image->id; ?>)">
                            <i class="icon-trash"></i>Xóa
                        </a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>

    </table>

<?php endif; ?>
