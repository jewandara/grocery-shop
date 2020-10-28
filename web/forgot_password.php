
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
                        <form name='forgot_password' action='<?=$DOMAIN_CURRENT_PATH?>' method='post' >
                            <div class="input-text">
                                <label for="username">Username :</label>
                                <input type='text' name='username' placeholder='Type your username here' class="form-control" >
                                <i class="icon_profile"></i>
                            </div>
                            <div class="input-text">
                                <label for="email">Email Address :</label>
                                <input type='email' name='email' placeholder='Type your email here' class="form-control" >
                                <i class="icon_mail"></i>
                            </div>
                            <button type="submit" class="col-lg-12 bk-btn">RESET PASSWORD</button>
                            <br>
                            <a href="<?=$DOMAIN_PATH?>register" class="primary-btn" style="color: #19191a;">Register For A New Member Account ?</a>
                            <br><br>
                            <a href="<?=$DOMAIN_PATH?>resend_activation" class="primary-btn" style="color: #19191a;">Activate My Account ?</a>
                            <br><br>
                            <a href="<?=$DOMAIN_PATH?>login" class="primary-btn" style="color: #19191a;">Login ?</a>
                        </form>
                    </div>
                </div>
                <div class="col-xl-3"></div>
            </div>
        </div>
    </section>
