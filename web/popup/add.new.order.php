<div class="gs-popup-window">
  <div class="gs-popup-window-content">
    <div class="gs-popup-window-header">
      <h1 class='gs-large'><span class="gs-popup-close">&times;</span></h1>
      <h1 class='gs-large'><i class='fa fa-plus-square'></i> ADD NEW ORDERS</h5>
        <hr>
    </div>
    <div class="gs-popup-window-body">
                  <form class='form' id='register' name='register' action='<?=$_CURRENT_PATH?>' method='post' autocomplete='on'>
      
                    <div class=''>
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
    </div>
    <div class="gs-popup-window-footer"></div>
  </div>
  <br><br><br><br>
</div>

