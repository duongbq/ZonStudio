
<?php if(count($home_files) > 0): ?>
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

<?php endif; ?>