<form method="post" class="form-horizontal" enctype="multipart/form-data">
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
            <label class="control-label">Ảnh</label>
            <div class="controls">
                <?php if ($file_id > 0 && isset($file_arr[$file_id])) : ?>
                    <img src="/uploads/news/<?php echo $file_arr[$file_id]; ?>" style="width: 100px; height: 75px;"/>
                <?php else : ?>
                    <img src="/assets/images/noimage.png" style="width: 100px; height: 75px;"/>
                <?php endif; ?>
                &nbsp;
                <input type="file" name="userfile" id="userfile" multiple accept="image/*"/>  
                <input type="hidden" name="file_id" value="<?php echo $file_id; ?>"/>
            </div>
        </div>

        <div class="control-group">

            <label class="control-label">Tóm tắt nội dung</label>

            <div class="controls">
                <textarea name="summary" class="input-block-level"><?php echo set_value('summary', isset($summary) ? $summary : NULL); ?></textarea>
            </div>

        </div>

        <div class="control-group">

            <label class="control-label">Nội dung chi tiết</label>

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
//    CKEDITOR.replace('summary', {
//        
//    });
    CKEDITOR.replace('description', {
    });

</script>