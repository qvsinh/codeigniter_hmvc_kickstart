<form class="form-forgot" method="post" action="">
    <h2 class="form-heading">Quên mật khẩu</h2>
    <?php if ($view['validate_status'] == 'ok'): ?>
        <div class="alert alert-info text-center">
            Hệ thống đã gửi đường dẫn lấy lại mật khẩu vào email của bạn.
        </div>

        <div class="text-center">
            <a class="btn btn-primary btn-back" href="<?php echo base_url(); ?>"><i class="icon-angle-left"></i> Đăng nhập</a>
        </div>
    <?php else: ?>
        <p>Nhập email của bạn để lấy lại mật khẩu</p>
        <?php if ($view['validate_status'] == 'invalid_email'): ?>
            <?php echo validation_errors('<div class="alert alert-error">', '</div>'); ?>
        <?php endif; ?>
        <div class="input-prepend input-fullwidth">
            <span class="add-on"><i class="icon-envelope-alt"></i></span>
            <div class="input-wrapper">
                <input type="text" name="email" value="<?php echo $_POST['email']; ?>" placeholder="Email"/>
            </div>
        </div>
        <div class="form-actions">
            <a class="btn btn-primary btn-back" href="<?php echo base_url(); ?>"><i class="icon-angle-left"></i> Đăng nhập</a>
            <button class="btn btn-success pull-right" type="submit">Gửi</button>
        </div>
    <?php endif; ?>
</form>
