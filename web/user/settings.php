<?php securePage($_SERVER['PHP_SELF']); ?>
<div class='gs-main' style='margin-left:250px;'>
  <div id='topMenuText' class='gs-container gs-top gs-theme gs-large' style='padding:8.2px 10px'>
    <p>
      <i class='fa fa-bars gs-button gs-teal gs-hide-large gs-xlarge' onclick='menuOpen()'></i>
      <span id='topMenuIntro' class='gs-hide'>USER SETTINGS</span>
    </p>
  </div>
  <header class='gs-container gs-theme' style='padding:32px 24px'>
    <h1 class='gs-xxxlarge'><i class='fa fa-cogs'></i>SETTINGS</h1>
  </header>
  <div class='gs-container' style='padding:32px'>
    <div class='gs-row-padding gs-margin-bottom'>
      <h5 style="float:left;box-sizing: border-box; "><b><i class="fa fa-cogs"></i>  <?=$loggedInUser->firstname?>'s User Settings </b></h5>
      <header class='gs-container' style='padding-top:22px; padding-bottom:20px'></header>
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

<script type="text/javascript">
  function formatCustomers (d) {
    return 'Full name: '+d.name+' '+d.code+'<br>'+
        'Salary: '+d.position+'<br>'+
        'The child row can contain any data you wish, including links, images, inner tables etc.';
  }
                 
  function loadGridCustomers() {
      var dt = $('#customers').DataTable( {
          "processing": true,
          "serverSide": true,
          "ajax": { "url": "<?=$_DOMAIN?>api/grid/customers/", "type": "POST" },
          "columns": [
              { "class": "details-control", "orderable": false, "data": null, "defaultContent": "" },
              { "data": "name" },
              { "data": "contact" },
              { "data": "email" },
              { "data": "address" },
              { "data": "gps" },
              { "data": "link" }
          ],
          "order": [[1, 'asc']]
      } );

      // Array to track the ids of the details displayed rows
      var detailRows = [];
      $('#customers tbody').on( 'click', 'tr td.details-control', function () {
          var tr = $(this).closest('tr');
          var row = dt.row( tr );
          var idx = $.inArray( tr.attr('id'), detailRows );
          if ( row.child.isShown() ) {
              tr.removeClass('details');
              row.child.hide();
              detailRows.splice(idx,1);
          }
          else {
              tr.addClass( 'details' );
              row.child(formatCustomers(row.data())).show();
              if ( idx === -1 ) { detailRows.push(tr.attr('id')); }
          }
      } );
      dt.on( 'draw', function () {
          $.each( detailRows, function ( i, id ) {
              $('#'+id+' td.details-control').trigger( 'click' );
          } );
      } );
  }

  window.onload = function() { loadGridCustomers(); };
</script>