<form method="post" enctype="multipart/form-data" action="<?php echo site_url('model/upload/' . $model_id); ?>" class="form-horizontal">

    <div class="headerbar">
        <h1>Upload ảnh cho model <?php echo $model_name; ?></h1>
        <?php $this->load->view('layouts/admin/header_buttons'); ?>
    </div>

    <div class="content">

        <?php $this->load->view('layouts/admin/alerts'); ?>

        <div class="control-group">

            <label class="control-label">Tên ảnh</label>

            <div class="controls">
                <input type="text" name="photo_caption" />
            </div>

        </div>
        
<!--        <div class="control-group">

            <label class="control-label">Tag ảnh</label>

            <div class="controls">
                <input type="text" name="tag" />
            </div>

        </div>-->

        <div class="control-group">

            <label class="control-label">Ảnh</label>

            <div class="controls">
                <input type="file" name="userfile" accept="image/*"/>
            </div>

        </div>

        <div class="control-group">

            <label class="control-label">Hiện Slide</label>

            <div class="controls">
                <input type="checkbox" name="is_slide" value="1" checked="checked"/>
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

        <table class="table table-striped">

            <thead>
                <tr>
                    <th>Ảnh</th>
                    <th>Tải lên ngày</th>
                    <th>Tùy chọn</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($images as $image) { ?>
                    <tr>
                        <td>
                            <a class="fancybox" href="/uploads/model/<?php echo $image->file_name; ?>">
                                <img style="width: 100px; height: 75px;" src="/uploads/model/<?php echo $image->file_name; ?>"/>
                            </a>
                        </td>
                        <td><?php echo $image->uploaded_date; ?></td>
                        <td>
                            <div class="options btn-group">
                                <a class="btn btn-small dropdown-toggle" data-toggle="dropdown" href="#"><i class="icon-cog"></i> <?php echo lang('options'); ?></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="/model/remove_image/<?php echo $model_id . '/' . $image->file_id . '/' . $image->photo_id; ?>" onclick="return confirm('Chắc chắn xóa?');">
                                            <i class="icon-trash"></i> Xóa ảnh
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>

        </table>

    </div>



</form>

