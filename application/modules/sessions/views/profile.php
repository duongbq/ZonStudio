<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Cập nhật thông tin đăng nhập</h3>
</div>

<div class="modal-body">

    <div id="error" style="display: none;"></div>

    <form class="form-horizontal">
        <div class="control-group">
            <label class="control-label">Tên hiển thị</label>
            <div class="controls">
                <input type="text" class="input-small" id="first_name" placeholder="Tên" value="<?php echo $this->csession->get('first_name'); ?>"/>
                <input type="text" id="last_name" placeholder="Họ & tên đệm" value="<?php echo $this->csession->get('last_name'); ?>"/>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Tên đăng nhập</label>
            <div class="controls">
                <input type="text" id="user_name" placeholder="Tên đăng nhập" value="<?php echo $this->csession->get('user_name'); ?>"/>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Mật khẩu hiện tại</label>
            <div class="controls">
                <input type="password" id="old_password" placeholder="Mật khẩu hiện tại">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Mật khẩu mới</label>
            <div class="controls">
                <input type="password" id="new_password" placeholder="Mật khẩu mới">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Xác nhận mật khẩu mới</label>
            <div class="controls">
                <input type="password" id="new_password_conf" placeholder="Xác nhận mật khẩu mới">
            </div>
        </div>

    </form>

</div>

<div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Hủy</button>
    <button type="submit" class="btn btn-primary" onclick="update_info();">Cập nhập</button>
</div>

<script>



    function update_info() {

        var first_name = $('#first_name').val();
        var last_name = $('#last_name').val();
        var user_name = $('#user_name').val();
        var old_password = $('#old_password').val();
        var new_password = $('#new_password').val();
        var new_password_conf = $('#new_password_conf').val();

        $('#error').removeClass('alert alert-error');
        $('#error').attr('style', 'display: none;');
        $('#error').html('');

        if (user_name.length < 5) {

            $('#error').addClass('alert alert-error');
            $('#error').attr('style', 'display: block;');
            $('#error').html('Tên đăng nhập phải lớn hơn 5 kí tự >.<');
            return;
        }

        $.ajax({
            //
            type: 'post',
            url: '/sessions/profile/check_current_password',
            data: {
                'old_password': old_password
            },
            success: function(responseText) {
                if (responseText == '0') {
                    $('#error').addClass('alert alert-error');
                    $('#error').attr('style', 'display: block;');
                    $('#error').html('Mật khẩu hiện tại không đúng >.<');
                    return;
                }
            }
        });

        if (new_password.length < 6 || new_password_conf.length < 6 || new_password_conf != new_password) {
            $('#error').addClass('alert alert-error');
            $('#error').attr('style', 'display: block;');
            $('#error').html('Mật khẩu mới và xác nhập mật khẩu phải khớp nhau và lớn hơn 6 kí tự >.<');
            return;
        }
        
        $.ajax({
            //
            type: 'post',
            url: '/sessions/profile/update_info',
            data: {
                'first_name' : first_name,
                'last_name' : last_name,
                'user_name' : user_name,
                'new_password': new_password_conf
            },
            success: function(responseText) {
                if (responseText == '1') {
                    $('#error').addClass('alert alert-success');
                    $('#error').attr('style', 'display: block;');
                    $('#error').html('Cập nhật thành công ^_^ ');
                    return;
                }
            }
        });
        

    }





</script>

