<?php
  securePage($_SERVER['PHP_SELF']); 
  require_once($_FOLDER.'web/popup/add.order.php');
  require_once($_FOLDER.'web/popup/update.order.php');
?>

<div class='gs-main' style='margin-left:250px;'>
  <div id='topMenuText' class='gs-container gs-top gs-theme gs-large' style='padding:8.2px 10px'>
    <p>
      <i class='fa fa-bars gs-button gs-teal gs-hide-large gs-xlarge' onclick='menuOpen()'></i>
      <span id='topMenuIntro' class='gs-hide'>GROCERY ORDERS</span>
    </p>
  </div>
  <header class='gs-container gs-theme' style='padding:32px 24px'>
    <h1 class='gs-xxxlarge'><i class='fa fa-shopping-cart'></i>ORDERS</h1>
  </header>
  <div class='gs-container' style='padding:32px'>
    <div class='gs-row-padding gs-margin-bottom'>
      <h5 style="float:left;box-sizing: border-box; "><b><i class="fa fa-shopping-cart"></i>  Order Grid View</b></h5>
      <header class='gs-container' style='padding-top:22px; padding-bottom:20px'>
        <!--<p class='gs-grid-button-add-new'>
          <button class='gs-button-gird gs-button gs-light-grey gs-hover-green' onclick='addNewOrder()'> <i class='fa fa-plus'></i> Add New</button>
        </p>-->
        <p class='gs-grid-button-download-excel'>
          <button class='gs-button-gird gs-button gs-light-grey gs-hover-black' onclick='downloadToExcel()'><i class='fa fa-download'></i> Download Excel</button>
        </p>
        <p class='gs-grid-button-search-by'>
          <select class='gs-button-gird gs-button gs-light-grey gs-hover-grey' id='dropdownGridSerchBy' onchange='serchByDropDown()'>
            <option class='gs-hover-white' value="all">Search By Status</option>
            <option class='gs-hover-white' value="PENDING">PENDING</option>
            <option class='gs-hover-white' value="OPEN">OPEN</option>
            <option class='gs-hover-white' value="DELIVERY">DELIVERY</option>
            <option class='gs-hover-white' value="PAID">PAID</option>
          </select>
        </p>
      </header>
      <style>
      .label { color: white; padding: 4px; border-radius: 3px; font-family: Arial;}
      .success {background-color: #4CAF50; font-size: 12px; } /* Green */
      .info {background-color: #2196F3; font-size: 12px; } /* Blue */
      .warning {background-color: #ff9800; font-size: 12px; } /* Orange */
      .danger {background-color: #f44336; font-size: 12px; } /* Red */ 
      .other {background-color: #e7e7e7; color: black; font-size: 12px; } /* Gray */ 
      </style>
      <table id='orders' class='display gs-grid-table' style='width:100%'>
        <thead>
          <tr>
              <th></th>
              <th>Order ID</th>
              <th>Delivery Status</th>
              <th>Payment Method</th>
              <th>Customer Name</th>
              <th>Customer Address</th>
              <th>Total Payment</th>
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
  var dt;

  function serchByDropDown() { 
    search = document.getElementById("dropdownGridSerchBy").value;
    dt.destroy();
    loadGridOrders(search);
  }

  function downloadToExcel() { 
    tablesToExcel(['orders'], ['Orders_Sheet'], 'Orders_Data.xls', 'Excel');
  }

  function addNewOrder () {
    loadPopUp("addNewOrder");

  }
  function updateOrder (id) {
    loadPopUp("updateOrder");
    $("#recodeId").empty();
    $("#recodeId").append(" "+id+"");
    loadUpdateForm(id);
  }

  function viewOrderDetails (id) {
    loadPopUp("updateOrderDetail");
    $("#ViewRecodeId").empty();
    $("#ViewRecodeId").append(" "+id+"");
    loadUpdateDetailForm(id);
  }


  function formatOrders (d) {
  return 'Full name: '+d.name+' '+d.code+'<br>'+
      'Salary: '+d.position+'<br>'+
      'The child row can contain any data you wish, including links, images, inner tables etc.';
  }

  function loadGridOrders(search="all") {
    dt = $('#orders').DataTable( {
        "processing": true,
        "serverSide": true,
        "lengthMenu": [[10, 50, 100, 500, 1000, 5000], [10, 50, 100, 500, 1000, 5000]],
        "ajax": { "url": "<?=$_DOMAIN?>api/grid/orders/?search="+search, "type": "POST" },
        "columns": [
            { "class": "details-control", "orderable": false, "data": null, "defaultContent": "" },
            { "data": "id" },
            { "data": "status" },
            { "data": "method" },
            { "data": "first_name" },
            { "data": "address" },
            { "data": "balance" },
            { "data": "link" }
        ],
        "order": [[1, 'asc']]
    } );
    var detailRows = [];
    $('#orders tbody').on( 'click', 'tr td.details-control', function () {
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
            row.child(format(row.data())).show();
            if ( idx === -1 ) { detailRows.push(tr.attr('id')); }
        }
    } );
    dt.on( 'draw', function () {
        $.each( detailRows, function ( i, id ) {
            $('#'+id+' td.details-control').trigger( 'click' );
        } );
    } );
  }

  window.onload = function() { loadGridOrders(); };
</script>