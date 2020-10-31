

    <section class="hero-section" style="margin-top: -100px;">
        <div class="container">
            <div class="row">
                <div class="col-xl-2"></div>
                <div class="col-xl-8">
                    <div class="login-form" >
                        <span>Holiday Accommodation Agency</span>
                        <h4>Change Login User Settings</h4>
                        <br>
                        <?=($ERROR_MESSAGE != "")?$ERROR_MESSAGE:""?>
                        <form name='updateAccount' action='<?=$DOMAIN_CURRENT_PATH?>' method='post' >
                            <div class='input-text'>
                                <label for='websiteName'>Email Address : </label>
                                <input type='email' readonly='true' name='email' value='<?=$loggedInUser->email?>' class='form-control' >
                                <i class='icon_mail'></i>
                            </div>
                            <div class="input-text">
                                <label for="websiteUrl">Current Password : </label>
                                <input type='password' name='password' placeholder='Type your current password here' class="form-control" >
                                <i class="icon_lock"></i>
                            </div>
                            <div class="input-text">
                                <label for="websiteUrl">New Password : </label>
                                <input type='password' name='passwordc' placeholder='Type your new password here' class="form-control" >
                                <i class="icon_lock"></i>
                            </div>
                            <div class="input-text">
                                <label for="websiteUrl">Confirm New Password : </label>
                                <input type='password' name='passwordcheck' placeholder='Retype your confirm new password here' class="form-control" >
                                <i class="icon_lock"></i>
                            </div>

                            <button type="submit" name='Submit'class="col-lg-12 bk-btn">SUBMIT</button>

                        </form>
                    </div>
                </div>
                <div class="col-xl-2"></div>
            </div>
        </div>
    </section>
