<div class='content'>
    <div class='wrapper'>
        <div class='container'>
            <img alt='Grocery Shop Dashboard Text Logo' src='<?=$_DOMAIN?>images/text-logo-400.png'>

<?php if(!empty($_GET["deny"])) { ?>
    <div class="row">
        <div class="col-xl-3"></div>
        <div class="col-xl-6">
            <div class="login-form" >
                <h4>Deny Reset Password ?</h4>
            </div>
        </div>
        <div class="col-xl-3"></div>
    </div>
<?php } else { 
     if(!empty($_GET["reset"])) { ?>
        <div class="row">
            <div class="col-xl-3"></div>
            <div class="col-xl-6">
                <div class="login-form" >
                    <h4>Forgot Password ?</h4>
                </div>
            </div>
            <div class="col-xl-3"></div>
        </div>
<?php } else { 
    if(!empty($_GET["confirm"])) {
        if($ERROR_MESSAGE != ""){ ?>
            <div class="row">
                <div class="col-xl-3"></div>
                <div class="col-xl-6">
                    <div class="login-form" >
                        <h3>Invalid Reset Password Request</h3>
                    </div>
                </div>
                <div class="col-xl-3"></div>
            </div>
<?php } else{  ?>
        <div class="row">
            <div class="col-xl-3"></div>
            <div class="col-xl-6">
                <div class="login-form" >
                    <h4><b>Hellow <?=$userdetails["first_name"]." ".$userdetails["last_name"]?> !</b></h4>
                    <form name='forgot_password' action='<?=$_DOMAIN?>reset_password/?confirm=<?=$_GET["confirm"]?>&reset=done' method='post' >
                        <div class="input-text">
                            <label for="username">Username :</label>
                            <input type='text' readonly='true' name='username' class="form-control" value='<?=$userdetails["username"]?>' >
                            <i class="icon_profile"></i>
                        </div>
                        <div class="input-text">
                            <label for="passwordc">New Password : </label>
                            <input type='password' name='passwordc' placeholder='Type new password' class="form-control" >
                            <i class="icon_lock"></i>
                        </div>
                        <div class="input-text">
                            <label for="passwordcheck">New Confirm password : </label>
                            <input type='password' name='passwordcheck' placeholder='Retype new password' class="form-control" >
                            <i class="icon_lock"></i>
                        </div>

                        <button type="submit" class="col-lg-12 bk-btn">RESET PASSWORD</button>
                    </form>
                </div>
            </div>
            <div class="col-xl-3"></div>
        </div>
<?php } } else { ?>
        <div class="row">
            <div class="col-xl-3"></div>
            <div class="col-xl-6">
                <div class="login-form" >
                    <h3>Invalid Reset Password Request</h3>
                </div>
            </div>
            <div class="col-xl-3"></div>
        </div>
<?php } } } ?>


            <?=($ERROR_MESSAGE != "")?$ERROR_MESSAGE:""?>
            <div class='option'>
              <!-- <a class='left tooltip-bottom' href='<?=$_DOMAIN?>resend_activation' data-tooltip='Please click this link to re-send your activation code.' >Resend Activation</a> -->
              <a class='left tooltip-bottom' href='<?=$_DOMAIN?>login' data-tooltip='Please click this link to login to your account.'>Login</a>
            </div>
        </div>
        <ul class='bg-bubbles'>
            <li></li> <li></li> <li></li> <li></li> <li></li> <li></li> <li></li> <li></li> <li></li> <li></li>
            <li></li> <li></li> <li></li> <li></li> <li></li> <li></li> <li></li> <li></li> <li></li> <li></li>
        </ul>
    </div>
</div>
<script type="text/javascript">
  window.onload = function() { loadBubbles(); };
</script>