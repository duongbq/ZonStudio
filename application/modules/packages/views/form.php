<form method="post" class="form-horizontal">
    <?php
    if (isset($package_id)) {
        $form_header = 'Chỉnh sửa gói dịch vụ';
        ?>
        <input type="hidden" name="package_id" value="<?php echo $package_id; ?>"/>
        <?php
    } else {
        $form_header = 'Thêm gói dịch vụ mới';
    }
    ?>

    <div class="headerbar">
        <h1><?php echo $form_header; ?></h1>
        <?php $this->load->view('layouts/admin/header_buttons'); ?>
    </div>

    <div class="content">

        <?php $this->load->view('layouts/admin/alerts'); ?>

        <div class="control-group">
            <label class="control-label">Dịch vụ</label>
            <div class="controls">
                <?php echo isset($services_combo) ? $services_combo : NULL; ?>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label">Tên gói dịch vụ</label>
            <div class="controls">
                <input type="text" name="package_name" id="package_name" value="<?php echo set_value('package_name', isset($package_name) ? $package_name : NULL); ?>">
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
            <label class="control-label">Báo giá</label>
            <div class="controls">
                <input type="text" name="price" id="price" value="<?php echo set_value('price', isset($price) ? $price : NULL); ?>">
            </div>
        </div>

    </div>

</form>