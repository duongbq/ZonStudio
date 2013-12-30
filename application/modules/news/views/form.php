<form method="post" class="form-horizontal">
    <?php
    if (isset($news_id)) {
        $form_header = 'Chỉnh sửa tin tức';
        $checked = isset($is_active) && $is_active == 1 ? 'checked' : NULL;
        ?>
        <input type="hidden" name="news_id" value="<?php echo $news_id; ?>"/>
        <?php
    } else {
        $form_header = 'Đăng tin mới mới';
        $checked = 'checked';
    }
    ?>

    <div class="headerbar">
        <h1><?php echo $form_header; ?></h1>
        <?php $this->load->view('layouts/admin/header_buttons'); ?>
    </div>

    <div class="content">

        <?php $this->load->view('layouts/admin/alerts'); ?>

        <div class="control-group">
            <label class="control-label">Tiêu đề</label>
            <div class="controls">
                <input type="text" name="title" id="title" class="input-block-level" value="<?php echo set_value('title', isset($title) ? $title : NULL); ?>">
            </div>
        </div>

        <div class="control-group">

            <label class="control-label">Mô tả tóm tắt</label>

            <div class="controls">
                <textarea name="summary"><?php echo set_value('summary', isset($summary) ? $summary : NULL); ?></textarea>
            </div>

        </div>

        <div class="control-group">

            <label class="control-label">Mô tả chi tiết</label>

            <div class="controls">
                <textarea name="description"><?php echo set_value('description', isset($description) ? $description : NULL); ?></textarea>
            </div>

        </div>

        <div class="control-group">
            <label class="control-label">Publish</label>
            <div class="controls">
                <input type="checkbox" name="is_active" id="is_active" value="1" <?php echo $checked; ?>>
            </div>
        </div>

    </div>

</form>

<script src="/assets/ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace('summary', {
        filebrowserBrowseUrl: '/assets/kcfinder/browse.php?type=files',
        filebrowserImageBrowseUrl: '/assets/kcfinder/browse.php?type=images',
        filebrowserFlashBrowseUrl: '/assets/kcfinder/browse.php?type=flash',
        filebrowserUploadUrl: '/assets/kcfinder/upload.php?type=files',
        filebrowserImageUploadUrl: '/assets/kcfinder/upload.php?type=images',
        filebrowserFlashUploadUrl: '/assets/kcfinder/upload.php?type=flash'
    });
    CKEDITOR.replace('description', {
        filebrowserBrowseUrl: '/assets/kcfinder/browse.php?type=files',
        filebrowserImageBrowseUrl: '/assets/kcfinder/browse.php?type=images',
        filebrowserFlashBrowseUrl: '/assets/kcfinder/browse.php?type=flash',
        filebrowserUploadUrl: '/assets/kcfinder/upload.php?type=files',
        filebrowserImageUploadUrl: '/assets/kcfinder/upload.php?type=images',
        filebrowserFlashUploadUrl: '/assets/kcfinder/upload.php?type=flash'
    });
    
</script>