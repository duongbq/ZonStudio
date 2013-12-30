<form method="post" class="form-horizontal">
    <?php
    if (isset($portrait_id)) {
        $form_header = 'Chỉnh sửa';
        ?>
        <input type="hidden" name="portrait_id" value="<?php echo $portrait_id; ?>"/>
        <?php
    } else {
        $form_header = 'Thêm mới';
    }
    ?>

    <div class="headerbar">
        <h1><?php echo $form_header; ?></h1>
        <?php $this->load->view('layouts/admin/header_buttons'); ?>
    </div>

    <div class="content">

        <?php $this->load->view('layouts/admin/alerts'); ?>

        <div class="control-group">
            <label class="control-label">Tên chân dung</label>
            <div class="controls">
                <input type="text" name="portrait_name" id="portrait_name" value="<?php echo set_value('portrait_name', isset($portrait_name) ? $portrait_name : NULL); ?>">
            </div>
        </div>

    </div>

</form>