

<form method="post" class="form-horizontal">

    <?php if(isset($id)){
        $form_header = 'Chỉnh sửa dịch vụ';
        ?>
        <input type="hidden" name="service_id" value="<?php echo $id; ?>"/>
    <?php } else { $form_header = 'Thêm dịch vụ mới';}?>

    <div class="headerbar">
        <h1><?php echo $form_header; ?></h1>
        <?php $this->load->view('layouts/admin/header_buttons'); ?>
    </div>

    <div class="content">

        <?php $this->load->view('layouts/admin/alerts'); ?>

        <div class="control-group">
            <label class="control-label">Tên dịch vụ</label>

            <div class="controls">
                <input type="text" name="service_name" id="service_name"
                       value="<?php echo isset($service_name) ? $service_name : NULL; ?>">
            </div>
        </div>

    </div>

</form>