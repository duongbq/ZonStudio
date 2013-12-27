<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Upload ảnh lên trang chủ</h3>
</div>

<div class="modal-body">

    <form method="post" enctype="multipart/form-data" class="form-inline">
        <input type="file" name="userfile" id="userfile" multiple accept="image/*"/>  
        <button type="submit" id="btn"></button>  
    </form> 

    <div class="clear">&nbsp;</div>

    <div id="response"></div>
    <div id="list">
        <?php $this->load->view('home_images_list'); ?>
    </div>
</div>

<script>

    function set_home_display_index($img_id, $index) {

        $.ajax({
            type: "post",
            url: "<?php echo site_url('file/set_home_display_index'); ?>",
            data: {
                img_id: $img_id,
                index: $index
            },
            success: function(response) {

                $('#list').html(response);
            }
        });
    }

    function remove_img($img_id) {

        if (!confirm('Bạn có thực sự muốn xóa ảnh này không?'))
            return;

        $.ajax({
            type: "post",
            url: "<?php echo site_url('file/remove_home_image'); ?>",
            data: {
                img_id: $img_id
            },
            success: function(response) {
                if (response == '1') {
                    $('#img_row_' + $img_id).hide();
                }

            }
        });


    }

    (function() {


        var input = document.getElementById("userfile");
        var formdata = false;
        var btn = document.getElementById("btn");

        if (window.FormData) {
            formdata = new FormData();
            btn.style.display = "none";
        }

        input.addEventListener("change", function(evt) {
            
            var list = document.getElementById("list");
            var response = document.getElementById("response");
            response.innerHTML = 'Đang tải ảnh lên...';
            response.className = 'alert alert-info';

            var reader;
            var file;
            for (i = 0; i < this.files.length; i++) {

                file = this.files[i];

                if (!!file.type.match(/image.*/)) {
                    if (window.FileReader) {
                        reader = new FileReader();
                        reader.readAsDataURL(file);
                    }
                    if (formdata) {
                        formdata.append("userfile", file);
                    }
                }
            }

            if (formdata) {
                $.ajax({
                    url: '<?php echo site_url('file/upload_home_image'); ?>',
                    type: 'POST',
                    data: formdata,
                    processData: false,
                    contentType: false,
                    beforeSend: function() {
                        $('.form-inline').attr('style', 'display: none;');
                    },
                    success: function(res) {
                        if (res == '0') {
                            response.innerHTML = 'Có lỗi trong quá trình tải ảnh >.<';
                            response.className = 'alert alert-error';
                        } else {
                            response.innerHTML = 'Tải ảnh thành công';
                            response.className = 'alert alert-success';
                            list.innerHTML = res;
                        }
                        $('.form-inline').removeAttr('style');
                    }
                });
            }

        }, false);
    }());



</script>

