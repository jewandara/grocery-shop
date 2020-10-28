<?php
  securePage($_SERVER['PHP_SELF']); 
  require_once($_FOLDER.'web/popup/add.new.customer.php');
?>
<div class='gs-main' style='margin-left:250px;'>
  <div id='topMenuText' class='gs-container gs-top gs-theme gs-large' style='padding:8.2px 10px'>
    <p>
      <i class='fa fa-bars gs-button gs-teal gs-hide-large gs-xlarge' onclick='menuOpen()'></i>
      <span id='topMenuIntro' class='gs-hide'>GROCERY CUSTOMERS</span>
    </p>
  </div>
  <header class='gs-container gs-theme' style='padding:32px 24px'>
    <h1 class='gs-xxxlarge'><i class='fa fa-smile-o'></i>CUSTOMERS</h1>
  </header>



  <div class='gs-container' style='padding:32px'>
    <div class='gs-row-padding gs-margin-bottom'>
      <h5 style="float:left;box-sizing: border-box; "><b><i class="fa fa-smile-o"></i>  Customer Grid View</b></h5>
      <header class='gs-container' style='padding-top:22px; padding-bottom:20px'>
        <p class='gs-grid-button-add-new'>
          <button class='gs-button-gird gs-button gs-light-grey gs-hover-green' id='popupButton'> <i class='fa fa-plus'></i> Add New</button>
        </p>
        <p class='gs-grid-button-download-excel'>
          <button class='gs-button-gird gs-button gs-light-grey gs-hover-black'><i class='fa fa-download'></i> Download Excel</button>
        </p>
      </header>

      <table id='customers' class='display gs-grid-table' style='width:100%'>
        <thead>
          <tr>
              <th></th>
              <th>Customer Name</th>
              <th>Contact Number</th>
              <th>Email Address</th>
              <th>Customer Address</th>
              <th>GPS Location</th>
              <th><i class='fa fa-braille'></i></th>
          </tr>
        </thead>
      </table>

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