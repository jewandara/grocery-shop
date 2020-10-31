<div class='gs-popup-window' id='addNewOrder'>
  <div class='gs-popup-window-content'>
    <div class='gs-popup-window-header'>
      <h1 class='gs-large'><span class='gs-popup-close'>&times;</span></h1>
      <h1 class='gs-large'><i class='fa fa-plus-square'></i> ADD NEW ORDER</h5>
        <hr>
    </div>
    <div class='gs-popup-window-body'>













      <style>
        form{ z-index: -1; }
        input[type=password], input[type=email] { width: 100%; padding: 12px; border: 1px solid #ccc; border-radius: 4px; resize: vertical; }
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
              <label for='Email'>UserName : </label>
            </div>
            <div class="col-75">
              <p><?=$loggedInUser->username?></p>
            </div>
          </div>
          <div class="row">
            <div class="col-25">
              <label for='Email'>Account Holder : </label>
            </div>
            <div class="col-75">
              <p><?=$loggedInUser->firstname?> <?=$loggedInUser->lastname?></p>
            </div>
          </div>
          <div class="row">
            <div class="col-25">
              <label for='Email'>Email Address : </label>
            </div>
            <div class="col-75">
              <input type='email' readonly='true' name='email' value='<?=$loggedInUser->email?>' class='form-control' placeholder="Your name..">
            </div>
          </div>
          <div class="row">
            <div class="col-25">
              <label for="websiteUrl">Current Password : </label>
            </div>
            <div class="col-75">
              <input type='password' name='password' placeholder='Type your current password here' class="form-control" placeholder="Your last name..">
            </div>
          </div>
          <div class="row">
            <div class="col-25">
              <label for="websiteUrl">New Password : </label>
            </div>
            <div class="col-75">
              <input type='password' name='passwordc' placeholder='Type your new password here' class="form-control" >
            </div>
          </div>
          <div class="row">
            <div class="col-25">
              <label for="websiteUrl">Confirm New Password : </label>
            </div>
            <div class="col-75">
              <input type='password' name='passwordcheck' placeholder='Retype your confirm new password here' class="form-control" >
            </div>
          </div>
          <div class="row">
            <br>
            <input type="submit" value="SUBMIT">
          </div>
      </div>























    </div>
    <div class='gs-popup-window-footer'></div>
  </div>
  <br><br><br><br>
</div>
