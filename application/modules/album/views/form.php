

<form method="post" class="form-horizontal">

    <?php if(isset($id)){
        $form_header = 'Chỉnh sửa album';
        ?>
        <input type="hidden" name="album_id" value="<?php echo $id; ?>"/>
    <?php } else { $form_header = 'Thêm album mới';}?>

    <div class="headerbar">
        <h1><?php echo $form_header; ?></h1>
        <?php $this->load->view('layouts/admin/header_buttons'); ?>
    </div>

    <div class="content">

        <?php $this->load->view('layouts/admin/alerts'); ?>

        <div class="control-group">
            <label class="control-label">Tên album</label>

            <div class="controls">
                <input type="text" name="album_caption" id="album_caption"
                       value="<?php echo isset($album_caption) ? $album_caption : NULL; ?>">
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

    </div>

</form>