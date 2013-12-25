<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Upload ảnh lên trang chủ</h3>
</div>

<div class="modal-body">
    <form method="post" enctype="multipart/form-data"  action="<?php echo site_url('file/upload_home_image'); ?>" class="form-inline">
        <input type="file" name="userfile" id="userfile" multiple accept="image/*"/>  
        <button type="submit" id="btn">Upload Files!</button>  
    </form> 

    <div id="response"></div>
    <!--    <ul id="image-list">
    
        </ul>-->

    <div id="image-list">
        <?php $this->load->view('home_images_list'); ?>
    </div>
</div>

<!--<div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    <button type="submit" class="btn btn-primary"id="btn">Upload</button>
</div>-->

<script>
    (function() {
        var input = document.getElementById("userfile"), formdata = false;

        function showUploadedItem(source) {

            var list = document.getElementById("image-list");
//            var li = document.createElement("li");
            var img = document.createElement("img");
            img.src = source;
            img.style = 'width: 100px; height: 75px;';
//            li.appendChild(''+img);
            list.appendChild('<tr><td></td></tr>');
        }

        if (window.FormData) {
            formdata = new FormData();
            document.getElementById("btn").style.display = "none";
        }

        input.addEventListener("change", function(evt) {
            document.getElementById("response").innerHTML = "Đang tải ảnh lên..."
            var i = 0, len = this.files.length, img, reader, file;

            for (; i < len; i++) {
                file = this.files[i];

                if (!!file.type.match(/image.*/)) {
                    if (window.FileReader) {
                        reader = new FileReader();
                        reader.onloadend = function(e) {
//                            showUploadedItem(e.target.result, file.fileName);
                        };
                        reader.readAsDataURL(file);
                    }
                    if (formdata) {
                        formdata.append("userfile[]", file);
                    }
                }
            }

            if (formdata) {
                $.ajax({
                    url: "<?php echo site_url('file/upload_home_image'); ?>",
                    type: "POST",
                    data: formdata,
                    processData: false,
                    contentType: false,
                    success: function(res) {
                        document.getElementById("response").innerHTML = res;
                    }
                });
            }
        }, false);
    }());

</script>

