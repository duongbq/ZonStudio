

<form method="post" class="form-horizontal">

    <?php
    if (isset($id)) {
        $form_header = 'Chỉnh sửa thông tin model';
        ?>
        <input type="hidden" name="model_id" value="<?php echo $id; ?>"/>
<?php } else {
    $form_header = 'Thêm model mới';
} ?>

    <div class="headerbar">
        <h1><?php echo $form_header; ?></h1>
<?php $this->load->view('layouts/admin/header_buttons'); ?>
    </div>

    <div class="content">

<?php $this->load->view('layouts/admin/alerts'); ?>

        <div class="control-group">
            <label class="control-label">Tên model</label>

            <div class="controls">
                <input type="text" name="model_name" id="model_name"
                       value="<?php echo isset($model_name) ? $model_name : NULL; ?>">
            </div>
        </div>

        <div class="control-group">

            <label class="control-label">Thông tin tóm tắt</label>

            <div class="controls">
                <textarea name="summary"><?php echo set_value('summary', isset($summary) ? $summary : NULL); ?></textarea>
            </div>

        </div>

        <div class="control-group">

            <label class="control-label">Thông tin chi tiết</label>

            <div class="controls">
                <textarea name="description"><?php echo set_value('description', isset($description) ? $description : NULL); ?></textarea>
            </div>

        </div>

        <div class="control-group">

            <label class="control-label">Sex</label>

            <div class="controls">
                <input type="radio" name="sex" value="1" <?php echo isset($sex) && $sex == 1 ? 'checked="checked"': NULL?>> Nam
                <input type="radio" name="sex" value="0" <?php echo isset($sex) && $sex == 0 ? 'checked="checked"': NULL?>> Nữ
            </div>

        </div>

    </div>

</form>