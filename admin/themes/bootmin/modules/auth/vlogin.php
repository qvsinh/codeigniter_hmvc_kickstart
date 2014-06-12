<div class="container">
  <form class="form-signin" role="form"  method="post" action="">
    <h2 class="form-signin-heading">Log in</h2>
    <?php if($_POST['doaction'] == 'login'):?>
        <div class="alert alert-danger">
            <strong>Email</strong> or <strong>password</strong> is incorrect!
        </div>
    <?php endif;?>
    <input type="email" class="form-control" placeholder="Email address" required autofocus name="email" value="<?php echo $_POST['email'];?>" class="input-block-level" placeholder="Email" <?php if($_POST['doaction'] == 'login'):?>style="border-color: red;"<?php endif;?>>
    <input type="password" class="form-control" placeholder="Password" required name="password" <?php if($_POST['doaction'] == 'login'):?>style="border-color: red;"<?php endif;?>>
    <label class="checkbox">
      <input type="checkbox" name="chk_remember" value="1"> Remember me
  </label>
  <input type="hidden" name="doaction" value="login" />
  <button class="btn btn-lg btn-primary btn-block" type="submit">Log in</button>
</form>
</div> <!-- /container -->