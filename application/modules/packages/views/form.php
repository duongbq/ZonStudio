<form method="post" class="form-horizontal">

	<div class="headerbar">
		<h1><?php echo lang('tax_rate_form'); ?></h1>
		<?php $this->layout->load_view('layout/header_buttons'); ?>
	</div>

	<div class="content">

		<?php $this->layout->load_view('layout/alerts'); ?>

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
					<input type="text" name="package_name" id="package_name" value="<?php echo $this->mdl_packages->form_value('package_name'); ?>">
				</div>
			</div>

        <div class="control-group">

            <label class="control-label">Mô tả tóm tắt</label>

            <div class="controls">
                <textarea name="summary"><?php echo $this->mdl_packages->form_value('summary'); ?></textarea>
            </div>

        </div>

        <div class="control-group">

            <label class="control-label">Mô tả chi tiết</label>

            <div class="controls">
                <textarea name="description"><?php echo $this->mdl_packages->form_value('description'); ?></textarea>
            </div>

        </div>

        <div class="control-group">
            <label class="control-label">Báo giá</label>
            <div class="controls">
                <input type="text" name="price" id="price" value="<?php echo $this->mdl_packages->form_value('price'); ?>">
            </div>
        </div>

	</div>

</form>