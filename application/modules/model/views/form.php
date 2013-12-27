

<form method="post" class="form-horizontal">

    <?php
    if (isset($model_id)) {
        $form_header = 'Chỉnh sửa thông tin model';
        ?>
        <input type="hidden" name="model_id" value="<?php echo $model_id; ?>"/>
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
            <label class="control-label">Nick</label>

            <div class="controls">
                <input type="text" name="nick_name" id="nick_name"
                       value="<?php echo isset($nick_name) ? $nick_name : NULL; ?>">
            </div>
        </div>

        <div class="control-group">

            <label class="control-label">Thông tin</label>

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
        
        
        <div class="control-group">
            <label class="control-label">Chiều cao</label>

            <div class="controls">
                <input type="text" name="height" id="height"
                       value="<?php echo isset($height) ? $height : NULL; ?>">
            </div>
        </div>
        
        <div class="control-group">
            <label class="control-label">Cân nặng</label>

            <div class="controls">
                <input type="text" name="weight" id="weight"
                       value="<?php echo isset($weight) ? $weight : NULL; ?>">
            </div>
        </div>
        
        <div class="control-group">
            <label class="control-label">Số đo 3 vòng</label>

            <div class="controls">
                <input type="text" name="body_measure" id="body_measure"
                       value="<?php echo isset($body_measure) ? $body_measure : NULL; ?>">
            </div>
        </div>
        
        <div class="control-group">
            <label class="control-label">Size quần</label>

            <div class="controls">
                <input type="text" name="trousers_size" id="trousers_size"
                       value="<?php echo isset($trousers_size) ? $trousers_size : NULL; ?>">
            </div>
        </div>
        
        <div class="control-group">
            <label class="control-label">Size áo</label>

            <div class="controls">
                <input type="text" name="shirt_size" id="shirt_size"
                       value="<?php echo isset($shirt_size) ? $shirt_size : NULL; ?>">
            </div>
        </div>
        
        <div class="control-group">
            <label class="control-label">Size giầy</label>

            <div class="controls">
                <input type="text" name="shoes_size" id="shoes_size"
                       value="<?php echo isset($shoes_size) ? $shoes_size : NULL; ?>">
            </div>
        </div>
        
        <div class="control-group">
            <label class="control-label">Phí chụp hình</label>

            <div class="controls">
                <input type="text" name="photo_shoot_fee" id="photo_shoot_fee"
                       value="<?php echo isset($photo_shoot_fee) ? $photo_shoot_fee : NULL; ?>">
            </div>
        </div>

    </div>

</form>