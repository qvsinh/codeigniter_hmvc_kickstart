<form class="form-register" method="post" action="">
    <h2 class="form-heading">Đăng ký</h2>
    <p class="text-center">Bạn là ai? Quê ở đâu?</p>
    <div class="alert alert-info hide">
        Hệ thống đã gửi cho bạn <strong>đường dẫn kích hoạt tài khoản</strong> vào mail của bạn.
    </div>
    <?php if ($_POST['doaction'] == 'register'): ?>
        <?php echo validation_errors('<div class="alert alert-error">', '</div>'); ?>
    <?php endif; ?>
    <div id="register-container">

        <div class="input-prepend input-fullwidth">
            <span class="add-on"><i class="icon-user"></i></span>
            <div class="input-wrapper">
                <input type="text" name="fullname" value="<?php echo $_POST['fullname']; ?>" placeholder="Họ và tên"/>
            </div>
        </div>
        <div class="input-prepend input-fullwidth">
            <span class="add-on"><i class="icon-envelope-alt"></i></span>
            <div class="input-wrapper">
                <input type="text" name="email" value="<?php echo $_POST['email']; ?>" placeholder="Email"/>
            </div>
        </div>
        <div class="input-prepend input-fullwidth">
            <span class="add-on"><i class="icon-lock"></i></span>
            <div class="input-wrapper">
                <input type="password" name="password" placeholder="Mật khẩu"/>
            </div>
        </div>
        <div class="input-prepend input-fullwidth">
            <span class="add-on"><i class="icon-ok-sign"></i></span>
            <div class="input-wrapper">
                <input type="password" name="repassword" placeholder="Nhập lại mật khẩu"/>
            </div>
        </div>
        <div class="input-prepend input-fullwidth">
            <div class="select-wrapper">
                <select id="city" name="city" style="width: 100%;">
                    <option value="0">Tỉnh / Thành phố</option>
                    <?php foreach ($view['arr_city'] as $item): ?>
                        <option value="<?php echo $item['id']; ?>" <?php if ($_POST['city'] == $item['id']): ?>selected="selected"<?php endif; ?>><?php echo $item['name']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="input-prepend input-fullwidth">
            <div class="select-wrapper">
                <select id="district" name="district" style="width: 100%;">
                    <option value="0">Quận / Huyện</option>
                    <?php foreach ($view['arr_district'] as $item): ?>
                        <option value="<?php echo $item['id']; ?>" <?php if ($_POST['district'] == $item['id']): ?>selected="selected"<?php endif; ?>><?php echo $item['name']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="input-prepend input-fullwidth">
            <span class="add-on"><i class="icon-user"></i></span>
            <div class="input-wrapper">
                <input type="text" name="security_code" value="" placeholder="Mã bảo mật" style="width: 130px;"/>
                <img id="img_security" src="<?php echo base_url('captcha');?>" alt="security-image" style="margin-left: 10px;">
                <button class="btn btn-info btn-small" type="button" style="margin-left: 10px; outline: none; height: 38px;" onclick="$('#img_security').attr('src', '<?php echo base_url('captcha?img=');?>' + (1 + Math.floor(Math.random() * 999)));"><i class="icon-refresh"></i></button>
            </div>
        </div>
    </div>
    <div class="form-actions">
        <input type="hidden" name="doaction" value="register" />
        <a class="btn btn-primary btn-back" href="<?php echo base_url(); ?>"><i class="icon-angle-left"></i> Đăng nhập</a>
        <button class="btn btn-success pull-right" type="submit" id="btn-register-user">Đăng ký</button>
    </div>
</form>