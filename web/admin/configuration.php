
    <section class="hero-section" style="margin-top: -100px;">
        <div class="container">
            <div class="row">
                <div class="col-xl-2"></div>
                <div class="col-xl-8">
                    <div class="login-form" >
                        <span>Holiday Accommodation Agency</span>
                        <h4>Administrator Login: Web Page Configuration</h4>
                        <br>
                        <?=($ERROR_MESSAGE != "")?$ERROR_MESSAGE:""?>
                        <form name='adminConfiguration' action='<?=$DOMAIN_CURRENT_PATH?>' method='post' >
                            <div class='input-text'>
                                <label for='websiteName'>Website Name : </label>
                                <input type='text' name='<?="settings[".$settings['website_name']['id']."]"?>' value='<?=$websiteName?>' placeholder='Type website name here' class='form-control' >
                                <i class='icon_pencil-edit'></i>
                            </div>
                            <div class="input-text">
                                <label for="websiteUrl">Website Url : </label>
                                <input type='text' name='<?="settings[".$settings['website_url']['id']."]"?>' value='<?=$websiteUrl?>' placeholder='Type web url here' class="form-control" >
                                <i class="icon_link"></i>
                            </div>
                            <div class="input-text">
                                <label for="emailAddress">Web Email Address : </label>
                                <input type='email' name='<?="settings[".$settings['email']['id']."]"?>' value='<?=$emailAddress?>' placeholder='Type web email address here' class="form-control" >
                                <i class="icon_mail"></i>
                            </div>
                            <div class="input-text">
                                <label for="resendActivationThreshold">User Activation Threshold : </label>
                                <input type='text' name='<?="settings[".$settings['resend_activation_threshold']['id']."]"?>' value='<?=$resend_activation_threshold?>' placeholder='Type user activation sending mail threshold' class="form-control" >
                                <i class="icon_pencil-edit"></i>
                            </div>
                            <div class="select-option">
                                <label for="language">Web Language : </label>
                                <select id="language" name='<?="settings[".$settings['language']['id']."]"?>' placeholder='Select web language'>
								<?php
									foreach ($languages as $optLang){
										if ($optLang == $language){
											echo "<option value='".$optLang."' selected>$optLang</option>";
										}
										else {
											echo "<option value='".$optLang."'>$optLang</option>";
										}
									}
								?>
                                </select>
                            </div>
                            <div class="select-option">
                                <label for="userAactivation">Website User Email Activation : </label>
                                <select id="userAactivation" name='<?="settings[".$settings['activation']['id']."]"?>' >
								<?php
									if ($emailActivation == "true"){
										echo "
										<option value='1' selected>True</option>
										<option value='0'>False</option></select>";
									}
									else {
										echo "
										<option value='1'>True</option>
										<option value='0' selected>False</option></select>";
									}
								?>
                            </div>
                            <div class="select-option">
                                <label for="template">Web Template : </label>
                                <select id="template" name='<?="settings[".$settings['template']['id']."]"?>' placeholder='Select web template'>
								<?php
									foreach ($templates as $temp){
										if ($temp == $template){ echo "<option value='".$temp."' selected>$temp</option>"; }
										else { echo "<option value='".$temp."'>$temp</option>"; }
									}
								?>
                                </select>
                            </div>
                            <button type="submit" name='Submit'class="col-lg-12 bk-btn">SUBMIT</button>

                        </form>
                    </div>
                </div>
                <div class="col-xl-2"></div>
            </div>
        </div>
    </section>
