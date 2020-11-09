
<?php securePage($_SERVER['PHP_SELF']); ?>

<div class='gs-main' style='margin-left:250px;'>
  <div id='topMenuText' class='gs-container gs-top gs-theme gs-large' style='padding:8.2px 10px'>
    <p>
      <i class='fa fa-bars gs-button gs-teal gs-hide-large gs-xlarge' onclick='menuOpen()'></i>
      <span id='topMenuIntro' class='gs-hide'>WEB CONFIGURATIONS</span>
    </p>
  </div>
  <header class='gs-container gs-theme' style='padding:32px 24px'>
    <h1 class='gs-xxxlarge'><i class='fa fa-desktop'></i> CONFIGURATIONS</h1>
  </header>
  <div class='gs-container' style='padding:32px'>
    <div class='gs-row-padding gs-margin-bottom'>
      <h5 style="float:left;box-sizing: border-box; "><b><i class="fa fa-desktop"></i>  Administrator Web Configuration </b></h5>
      <header class='gs-container' style='padding-top:22px; padding-bottom:20px'></header>
      <style>
        form{ z-index: -1; }
        select, input[type=text], input[type=email], input[type=email] { width: 100%; padding: 12px; border: 1px solid #ccc; border-radius: 4px; resize: vertical; }
        label { padding: 12px 12px 12px 0; display: inline-block; }
        input[type=submit] { background-color: #4CAF50; color: white; padding: 12px 20px; border: none; border-radius: 4px; cursor: pointer; float: right; }
        input[type=submit]:hover { background-color: #45a049; }
        .container { border-radius: 5px; background-color: #f2f2f2; padding: 20px; }
        .col-25 { float: left; width: 25%; margin-top: 6px; }
        .col-25 label { float: right; margin-right: 10px; font-weight: bold; }
        .col-75 { float: left; width: 75%; margin-top: 6px; }
        .col-75 p { float: left; margin-top: 12px;  }
        .row:after { content: ""; display: table; clear: both; }
        @media screen and (max-width: 732px) { .col-25, .col-75, input[type=submit] {   width: 100%;   margin-top: 0; } .col-25 label { float: left; margin-right: 0px; }}
      </style>
      <div class="container">

          <div class="row">
            <div class="col-25">
              <label for='site'>Site Name : </label>
            </div>
            <div class="col-75">
              <input type='text' name='<?="settings[".$settings['SITE']['id']."]"?>' value='<?=$CONFIG_SITE?>' placeholder='Website name here' class='form-control'  style="background-color: #cdcccf" readonly>
            </div>
          </div>
          <div class="row">
            <div class="col-25">
              <label for='domain'>Domain Name : </label>
            </div>
            <div class="col-75">
              <input type='text' name='<?="settings[".$settings['DOMAIN']['id']."]"?>' value='<?=$CONFIG_DOMAIN?>' placeholder='Domain name here' class='form-control'  style="background-color: #cdcccf" readonly>
            </div>
          </div>
          <div class="row">
            <div class="col-25">
              <label for='protocol'>Protocol Name : </label>
            </div>
            <div class="col-75">
              <input type='text' name='<?="settings[".$settings['PROTOCOL']['id']."]"?>' value='<?=$CONFIG_PROTOCOL?>' placeholder='Protocol name here' class='form-control'  style="background-color: #cdcccf" readonly>
            </div>
          </div>
          <div class="row">
            <div class="col-25">
              <label for='path'>Path Name : </label>
            </div>
            <div class="col-75">
              <input type='text' name='<?="settings[".$settings['PATH']['id']."]"?>' value='<?=$CONFIG_PATH?>' placeholder='Path name here' class='form-control'  style="background-color: #cdcccf" readonly>
            </div>
          </div>
          <div class="row">
            <div class="col-25">
              <label for='url'>Url Name : </label>
            </div>
            <div class="col-75">
              <input type='text' name='<?="settings[".$settings['URL']['id']."]"?>' value='<?=$CONFIG_URL?>' placeholder='Url name here' class='form-control'  style="background-color: #cdcccf" readonly>
            </div>
          </div>
          <div class="row">
            <div class="col-25">
              <label for='activation'>Email Activation Name : </label>
            </div>
            <div class="col-75">
                <select id="userAactivation" name='<?="settings[".$settings['ACTIVATION']['id']."]"?>' >
                <?php
                    if ($CONFIG_ACTIVATION){
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
          </div>
          <div class="row">
            <div class="col-25">
              <label for="languages">Select languages : </label>
            </div>
            <div class="col-75">
                <select id="language" name='<?="settings[".$settings['LANG']['id']."]"?>' placeholder='Select web language'>
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
          </div>
          <div class="row">
            <div class="col-25">
              <label for="style">Select Web Style Sheet : </label>
            </div>
            <div class="col-75">
                <select id="template" name='<?="settings[".$settings['STYLE']['id']."]"?>' placeholder='Select web template'>
                <?php
                    foreach ($templates as $temp){
                        if ($temp == $template){ echo "<option value='".$temp."' selected>$temp</option>"; }
                        else { echo "<option value='".$temp."'>$temp</option>"; }
                    }
                ?>
                </select>
            </div>
          </div>



          
          <div class="row">
            <div class="col-25">
              <label for="mail">Email Templates Path : </label>
            </div>
            <div class="col-75">
              <input type='text' name='<?="settings[".$settings['MAIL']['id']."]"?>' value='<?=$CONFIG_MAIL?>' placeholder='Type web url here' class="form-control" >
            </div>
          </div>
          
          <div class="row">
            <div class="col-25">
              <label for="gmail">Gmail Address : </label>
            </div>
            <div class="col-75">
              <input type='text' name='<?="settings[".$settings['GMAIL']['id']."]"?>' value='<?=$CONFIG_GMAIL?>' placeholder='Type web url here' class="form-control" >
            </div>
          </div>

          <div class="row">
            <div class="col-25">
              <label for="gmail">Gmail Password : </label>
            </div>
            <div class="col-75">
              <input type='text' name='<?="settings[".$settings['MAILPASS']['id']."]"?>' value='<?=$CONFIG_MAILPASS?>' placeholder='Type web url here' class="form-control" >
            </div>
          </div>

          <div class="row">
            <br>
            <!-- <input type="submit" value="SUBMIT"> -->
          </div>
      </div>
      <?=($ERROR_MESSAGE != "")?$ERROR_MESSAGE:""?>
    </div>
    <hr>
  </div>
  <div class='gs-container gs-padding-16 gs-card' style='background-color:#eee'>
    <h3 class='gs-center'>Grocery Shop Web Application</h3>
    <div class='gs-content' style='max-width:800px'>
      <!-- <img src='./images/footer-image.png' style='width:98%;margin:20px 0' alt='Blog Template'><br> -->
      <div class='gs-row'>
        <div class='gs-col m6'>
          <a class='gs-button gs-padding-large gs-dark-grey' style='width:98.5%'>
            Contact Developer »
            <br>Sasangi Gamage 
            <br>+94 (0)76 853 2889
          </a>
        </div>
        <div class='gs-col m6'>
          <a class='gs-button gs-padding-large gs-dark-grey' style='width:98.5%'>
            Email Developer »
            <br>Sasangi Gamage 
            <br>egsahansigamage@gmail.com
          </a>
        </div>
      </div>
    </div>
  </div>
  <footer class='gs-container gs-theme' style='padding:32px'>
    <p>Grocery Shop Web Application © 2020 <a href='mailto:egsahansigamage@gmail.com' target='_blank'>Sasangi Gamage</a>. 
    All Rights Reserved.</p>
  </footer>
</div>
