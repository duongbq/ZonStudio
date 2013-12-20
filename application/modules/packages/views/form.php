<form method="post" class="form-horizontal">
    <?php
    if (isset($id)) {
        $form_header = 'Chỉnh sửa gói dịch vụ';
        ?>
        <input type="hidden" name="service_id" value="<?php echo $id; ?>"/>
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
                <select name="service_id" id="service_id">
                    <!--                        <option value="0">Chọn dịch vụ</option>-->
                    <?php foreach ($services as $service) { ?>
                        <option value="<?php echo $service->id; ?>"><?php echo $service->service_name; ?></option>
<?php } ?>
                </select>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label">Tên gói dịch vụ</label>
            <div class="controls">
                <input type="text" name="package_name" id="package_name" value="<?php echo isset($package_name) ? $package_name : NULL; ?>">
            </div>
        </div>

        <div class="control-group">

            <label class="control-label">Mô tả tóm tắt</label>

            <div class="controls">
                <textarea name="summary"><?php echo isset($summary) ? $summary : NULL; ?></textarea>
            </div>

        </div>

        <div class="control-group">

            <label class="control-label">Mô tả chi tiết</label>

            <div class="controls">
                <textarea name="description"><?php echo isset($description) ? $description : NULL; ?></textarea>
            </div>

        </div>

        <div class="control-group">
            <label class="control-label">Báo giá</label>
            <div class="controls">
                <input type="text" name="price" id="price" value="<?php echo isset($price) ? $price : NULL; ?>">
            </div>
        </div>

    </div>

</form>