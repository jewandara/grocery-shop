

<?php if(!empty($_GET["deny"])) { ?>
    <section class="hero-section" style="margin-top: -100px;">
        <div class="container">
            <div class="row">
                <div class="col-xl-3"></div>
                <div class="col-xl-6">
                    <div class="login-form" >
                        <span>Holiday Accommodation Agency</span>
                        <h4>Reset Password ?</h4>
                        <br>
                        <?=($ERROR_MESSAGE != "")?$ERROR_MESSAGE:""?>
                    </div>                            <br><br>
                    <a href="<?=$DOMAIN_PATH?>login" class="primary-btn" style="color: #19191a;">Login ?</a>
                </div>
                <div class="col-xl-3"></div>
            </div>
        </div>
    </section>

<?php } else { 
     if(!empty($_GET["reset"])) { ?>

    <section class="hero-section" style="margin-top: -100px;">
        <div class="container">
            <div class="row">
                <div class="col-xl-3"></div>
                <div class="col-xl-6">
                    <div class="login-form" >
                        <span>Holiday Accommodation Agency</span>
                        <h4>Forgot Password ?</h4>
                        <br>
                        <?=($ERROR_MESSAGE != "")?$ERROR_MESSAGE:""?>
                    </div>                            <br><br>
                    <a href="<?=$DOMAIN_PATH?>login" class="primary-btn" style="color: #19191a;">Login ?</a>
                </div>
                <div class="col-xl-3"></div>
            </div>
        </div>
    </section>

<?php } else { 
    if(!empty($_GET["confirm"])) {
        if($ERROR_MESSAGE != ""){ ?>

            <section class="hero-section" style="margin-top: -100px;">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-3"></div>
                        <div class="col-xl-6">
                            <div class="login-form" >
                                <span>Holiday Accommodation Agency</span>
                                <h3>Invalid Reset Password Request</h3>
                                <br>
                                <?=($ERROR_MESSAGE != "")?$ERROR_MESSAGE:""?>
                            </div>
                            <a href="<?=$DOMAIN_PATH?>login" class="primary-btn" style="color: #19191a;">Login ?</a>
                        </div>
                        <div class="col-xl-3"></div>
                    </div>
                </div>
            </section>

<?php } else{  ?>

            <section class="hero-section" style="margin-top: -100px;">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-3"></div>
                        <div class="col-xl-6">
                            <div class="login-form" >
                                <span>Holiday Accommodation Agency</span>
                                <h4><?=$userdetails["display_name"]?> : Reset Password ?</h4>
                                <br>
                                <?=($ERROR_MESSAGE != "")?$ERROR_MESSAGE:""?>

                                <form name='forgot_password' action='<?=$DOMAIN_CURRENT_PATH?>&reset=done' method='post' >
                                    <div class="input-text">
                                        <label for="username">Username :</label>
                                        <input type='text' readonly='true' name='username' class="form-control" value='<?=$userdetails["user_name"]?>' >
                                        <i class="icon_profile"></i>
                                    </div>
                                    <div class="input-text">
                                        <label for="passwordc">New Password : </label>
                                        <input type='password' name='passwordc' placeholder='Type your new password here' class="form-control" >
                                        <i class="icon_lock"></i>
                                    </div>
                                    <div class="input-text">
                                        <label for="passwordcheck">New Confirm password : </label>
                                        <input type='password' name='passwordcheck' placeholder='Retype new confirm password here' class="form-control" >
                                        <i class="icon_lock"></i>
                                    </div>

                                    <button type="submit" class="col-lg-12 bk-btn">RESET PASSWORD</button>
                                    <br>
                                    <a href="<?=$DOMAIN_PATH?>login" class="primary-btn" style="color: #19191a;">Login ?</a>
                                </form>


                            </div>
                        </div>
                        <div class="col-xl-3"></div>
                    </div>
                </div>
            </section>

<?php } } else { ?>

        <section class="hero-section" style="margin-top: -100px;">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3"></div>
                    <div class="col-xl-6">
                        <div class="login-form" >
                            <span>Holiday Accommodation Agency</span>
                            <h3>Invalid Reset Password Request</h3>
                            <br>
                            <?=($ERROR_MESSAGE != "")?$ERROR_MESSAGE:""?>
                        </div>
                        <a href="<?=$DOMAIN_PATH?>login" class="primary-btn" style="color: #19191a;">Login ?</a>
                    </div>
                    <div class="col-xl-3"></div>
                </div>
            </div>
        </section>

<?php } } } ?>