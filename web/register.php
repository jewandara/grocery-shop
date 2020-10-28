<div class='content'>
    <div class='wrapper'>
        <div class='container'>
            <img alt='Grocery Shop Dashboard Text Logo' src='<?=$_DOMAIN?>images/text-logo-400.png'>
            <?php if(empty($_SUCCESS)){ ?>
              <form class='form' id='register' name='register' action='<?=$_CURRENT_PATH?>' method='post' autocomplete='on'>
  
                <div class='option'>
                  <a class='left' > User First Name :</a> 
                  <input style='text-align:left;' type='text' id='firstname' name='firstname' placeholder='FIRST NAME' autocomplete='on' />
                </div>

                <div class='option'>
                  <a class='left' > User Last Name :</a> 
                  <input style='text-align:left;' type='text' id='lastname' name='lastname' placeholder='LAST NAME' autocomplete='on' />
                </div>

                <div class='option'>
                  <a class='left' > Contact Number :</a> 
                  <input style='text-align:left;' type='tel' id='contact' name='contact' placeholder='CONTACT NUMBER' onkeyup="contactNumberViewInUsername()" autocomplete='on'/>
                  <input style='text-align:left; ' type='text' id='username' name='username' placeholder='USERNAME' autocomplete='off' readonly='true'/>
                </div>

                <div class='option'>
                  <a class='left' > Login Password :</a> 
                  <input style='text-align:left;' type='password' id='password' name='password' placeholder='PASSWORD' autocomplete='on' />
                </div>

                <div class='option'>
                  <a class='left' > Confirm Password :</a> 
                  <input style='text-align:left;' type='password' id='pass_confirm' name='pass_confirm' placeholder='CONFIRM PASSWORD' autocomplete='off' />
                </div>

                <div class='option'>
                  <a class='left' > Email Address :</a> 
                  <input style='text-align:left;' type='email' id='email' name='email' placeholder='EMAIL ADDRESS' autocomplete='on'/>
                </div>

                <div class='option'>
                  <a class='left' > Captcha Code :</a>
                  <br>
                  <img class='captchaImage' id='captchaImage' src='<?=$_DOMAIN?>captcha.php'>
                  <button class='captchaImageRefreshButton' onclick="document.getElementById('captchaImage').src='<?=$_DOMAIN?>captcha.php'; return false;">
                    <i class="fa fa-refresh"></i>
                  </button>
                  <input style='text-align:left;' type='text' id='captcha' name='captcha' placeholder='CAPTCHA' autocomplete='off'/>

                </div>

                <button type='submit' id='submit'>REGISTER</button>
              </form><br>
            <?php } ?>
            <?=($ERROR_MESSAGE != "")?$ERROR_MESSAGE:""?>
            <div class='option'>
              <a class='left tooltip-bottom' href='<?=$_DOMAIN?>resend_activation' data-tooltip='Please click this link to re-send your activation code.' >Resend Activation</a>
              <a class='right tooltip-bottom' href='<?=$_DOMAIN?>login' data-tooltip='Please click this link to login to your account.'>Login</a>
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