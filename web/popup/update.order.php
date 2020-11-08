<div class='gs-popup-window' id='updateOrder'>
  <div class='gs-popup-window-content'>
    <div class='gs-popup-window-header'>
      <h1 class='gs-large'><span class='gs-popup-close'>&times;</span></h1>
      <h1 class='gs-large'><i class='fa fa-pencil-square'></i> UPDATE ORDER STATUS: <i id='recodeId'></i></h5>
        <hr>
    </div>
    <div class='gs-popup-window-body'>
      <style>
        input[type=file], input[type=password], input[type=email], input[type=text], input[type=file]:focus, input[type=password]:focus, input[type=email]:focus, input[type=text]:focus { width: 100%; padding: 12px; border: 1px solid #ccc; border-radius: 4px; resize: vertical; float: left; color: #333; text-align: left; }
        input[type=text]::placeholder { color: #ccc;letter-spacing: 1px}
        input[type=text]:-ms-input-placeholder { color: #ccc;letter-spacing: 1px }
        input[type=text]::-ms-input-placeholder { color: #ccc;letter-spacing: 1px}

        input[type=email]::placeholder { color: #ccc;letter-spacing: 1px}
        input[type=email]:-ms-input-placeholder { color: #ccc;letter-spacing: 1px }
        input[type=email]::-ms-input-placeholder { color: #ccc;letter-spacing: 1px}

        input[type=password]::placeholder { color: #ccc;letter-spacing: 1px}
        input[type=password]:-ms-input-placeholder { color: #ccc;letter-spacing: 1px }
        input[type=password]::-ms-input-placeholder { color: #ccc;letter-spacing: 1px}

        input[type=file]::placeholder { color: #ccc;letter-spacing: 1px}
        input[type=file]:-ms-input-placeholder { color: #ccc;letter-spacing: 1px }
        input[type=file]::-ms-input-placeholder { color: #ccc;letter-spacing: 1px}

        label { padding: 12px 12px 12px 0; display: inline-block; color: #333; }
        .form-image { float:left; border: 1px solid #ddd; border-radius: 4px; padding: 4px; width: 250px; margin-bottom:15px; }

        input[type=submit] { background-color: #4CAF50; color: white; padding: 12px 20px; border: none; border-radius: 4px; cursor: pointer; float: right; }
        input[type=submit]:hover { background-color: #45a049; }
        .container { border-radius: 5px; background-color: #f2f2f2; padding: 20px; }
        .col-25 { float: left; width: 25%; margin-top: 6px; }
        .col-25 label { float: right; margin-right: 10px; font-weight: bold; }
        .col-75 { float: left; width: 75%; margin-top: 6px; }
        .col-75 p { float: left; margin-top: 12px;  }
        .row:after { content: ''; display: table; clear: both; }
        .error{ margin-top: -5px; color: #ff0303; transition:0.5s; cursor:pointer; animation: blinking-error 1.5s linear infinite;}
        @media screen and (max-width: 732px) { .col-25, .col-75, input[type=submit] {   width: 100%;   margin-top: 0; } .col-25 label { float: left; margin-right: 0px; }}
        @keyframes blinking-error { 0% { opacity: 1;  } 25% { opacity: 0.7; } 50% { opacity: 1; } 75% { opacity: 0.7; } 100% { opacity: 1;} } 
        .alert-simple.alert-success{border: 1px solid rgba(55, 184, 83, 0.81); background-color: rgba(55, 184, 83, 0.16); box-shadow: 0px 0px 2px #0ba32c; color: #0ba32c;    transition:0.5s; cursor:pointer; animation: blinking-message 1.5s linear infinite;}
        .alert-success:hover{ background-color: rgba(55, 184, 83, 0.33);   transition:0.5s;}
        .success{font-size: 18px; color: #0ba32c; text-shadow: none;}
        @keyframes blinking-message { 0% { opacity: 1;  } 25% { opacity: 0.7; } 50% { opacity: 1; } 75% { opacity: 0.7; } 100% { opacity: 1;} } 
      </style>

      <div class='container'>
        <form id='update-form'>
            
            <div class='row'>
              <div class='col-25'>
                <label for='status'>Status : </label>
              </div>
              <div class='col-75'>
                <select name='status' id='status' class='form-control gs-button gs-grey' style='width: 100%; padding: 10px' >
                  <option class='gs-hover-white' value='PENDING'>PENDING</option>
                  <option class='gs-hover-white' value='OPEN'>OPEN</option>
                  <option class='gs-hover-white' value='DELIVERY'>DELIVERY</option>
                  <option class='gs-hover-white' value='PAID'>PAID</option>
                </select>
              </div>
            </div>
            
            <div class='row'>
              <div class='col-25'>
                <label for='method'>Method : </label>
              </div>
              <div class='col-75'>
                <select name='method' id='method' class='form-control gs-button gs-grey' style='width: 100%; padding: 10px' >
                  <option class='gs-hover-white' value='CASH'>CASH</option>
                  <option class='gs-hover-white' value='VISA'>VISA</option>
                  <option class='gs-hover-white' value='MASTER'>MASTER</option>
                </select>
              </div>
            </div>

            <div class='row'>
              <div class='col-25'>
                <label for='message'></label>
              </div>
              <div class='col-75' id='form-message-update'>
              </div>
            </div>

            <div class='row'>
              <br>
              <input type='submit' value='UPDATE' onclick='validateUpdateForm()'>
            </div>

        </form>
      </div>
    </div>
    <div class='gs-popup-window-footer'></div>
  </div>
  <br><br><br><br>
</div>

<div class='gs-popup-window' id='updateOrderDetail'>
  <div class='gs-popup-window-content'>
    <div class='gs-popup-window-header'>
      <h1 class='gs-large'><span class='gs-popup-close'>&times;</span></h1>
      <h1 class='gs-large'><i class='fa fa-pencil-square'></i> VIEW ORDER DETAILS : <i id='ViewRecodeId'></i></h5>
        <hr>
    </div>
    <div class='gs-popup-window-body'>
      <style>
        input[type=file], input[type=password], input[type=email], input[type=text], input[type=file]:focus, input[type=password]:focus, input[type=email]:focus, input[type=text]:focus { width: 100%; padding: 12px; border: 1px solid #ccc; border-radius: 4px; resize: vertical; float: left; color: #333; text-align: left; }
        input[type=text]::placeholder { color: #ccc;letter-spacing: 1px}
        input[type=text]:-ms-input-placeholder { color: #ccc;letter-spacing: 1px }
        input[type=text]::-ms-input-placeholder { color: #ccc;letter-spacing: 1px}

        input[type=email]::placeholder { color: #ccc;letter-spacing: 1px}
        input[type=email]:-ms-input-placeholder { color: #ccc;letter-spacing: 1px }
        input[type=email]::-ms-input-placeholder { color: #ccc;letter-spacing: 1px}

        input[type=password]::placeholder { color: #ccc;letter-spacing: 1px}
        input[type=password]:-ms-input-placeholder { color: #ccc;letter-spacing: 1px }
        input[type=password]::-ms-input-placeholder { color: #ccc;letter-spacing: 1px}

        input[type=file]::placeholder { color: #ccc;letter-spacing: 1px}
        input[type=file]:-ms-input-placeholder { color: #ccc;letter-spacing: 1px }
        input[type=file]::-ms-input-placeholder { color: #ccc;letter-spacing: 1px}

        label { padding: 12px 12px 12px 0; display: inline-block; color: #333; }
        .form-image { float:left; border: 1px solid #ddd; border-radius: 4px; padding: 4px; width: 250px; margin-bottom:15px; }

        input[type=button], input[type=submit] { background-color: #4CAF50; color: white; padding: 12px 20px; border: none; border-radius: 4px; cursor: pointer; float: right; }
        input[type=button], input[type=submit]:hover { background-color: #45a049; }
        .container { border-radius: 5px; background-color: #f2f2f2; padding: 20px; }
        .col-25 { float: left; width: 25%; margin-top: 6px; }
        .col-25 label { float: right; margin-right: 10px; font-weight: bold; }
        .col-75 { float: left; width: 75%; margin-top: 6px; }
        .col-75 p { float: left; margin-top: 12px;  }
        .row:after { content: ''; display: table; clear: both; }
        .error{ margin-top: -5px; color: #ff0303; transition:0.5s; cursor:pointer; animation: blinking-error 1.5s linear infinite;}
        @media screen and (max-width: 732px) { .col-25, .col-75, input[type=submit] {   width: 100%;   margin-top: 0; } .col-25 label { float: left; margin-right: 0px; }}
        @keyframes blinking-error { 0% { opacity: 1;  } 25% { opacity: 0.7; } 50% { opacity: 1; } 75% { opacity: 0.7; } 100% { opacity: 1;} } 
        .alert-simple.alert-success{border: 1px solid rgba(55, 184, 83, 0.81); background-color: rgba(55, 184, 83, 0.16); box-shadow: 0px 0px 2px #0ba32c; color: #0ba32c;    transition:0.5s; cursor:pointer; animation: blinking-message 1.5s linear infinite;}
        .alert-success:hover{ background-color: rgba(55, 184, 83, 0.33);   transition:0.5s;}
        .success{font-size: 18px; color: #0ba32c; text-shadow: none;}
        @keyframes blinking-message { 0% { opacity: 1;  } 25% { opacity: 0.7; } 50% { opacity: 1; } 75% { opacity: 0.7; } 100% { opacity: 1;} } 
        .itemListTable { font-family: arial, sans-serif; border-collapse: collapse; width: 100%; margin-bottom: 5px }
        .itemListTable th { background-color: #666; color:#fff;}
        .itemListTable td, .itemListTable th { border: 1px solid #dddddd; text-align: left; padding: 8px;}
        .itemListTable td { color:#555;}
        .itemListTable tr:nth-child(even) { background-color: #dddddd; color:#555; } 
      </style>
      <div class='container'>
        <form id='update-form-Details'>

            <div class='row'>
                <table class='itemListTable' id='itemListTableView'>
                  <thead>
                  <tr>
                    <th>Code </th>
                    <th>Item Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                  </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
            </div>


            <div class='row'>************************************************************************
            </div>
            <div class='row'>
              <div class='col-50'> <label for='status' style='float: left;'>Delivery Status : </label> </div>
              <div class='col-50'> <label id='view-status' style='float: left;'></label> </div>
            </div>
            <div class='row'>
              <div class='col-50'> <label for='method' style='float: left;'>Payment Method : </label> </div>
              <div class='col-50'> <label id='view-method' style='float: left;'></label> </div>
            </div>
            <div class='row'>
              <div class='col-50'> <label for='amount' style='float: left;'>Total Items Amount : </label> </div>
              <div class='col-50'> <label id='view-amount' style='float: left;'></label> </div>
            </div>
            <div class='row'>
              <div class='col-50'> <label for='discount' style='float: left;'>Total Items Discount : </label> </div>
              <div class='col-50'> <label id='view-discount' style='float: left;'></label> </div>
            </div>
            <div class='row'>
              <div class='col-50'> <label for='balance' style='float: left;'>Total Payble Amount : </label> </div>
              <div class='col-50'> <label id='view-balance' style='float: left;'></label> </div>
            </div>
            <div class='row'>
              <div class='col-50'> <label for='insert' style='float: left;'>Insert Date : </label> </div>
              <div class='col-50'> <label id='view-insert' style='float: left;'></label> </div>
            </div>
            <div class='row'>
              <div class='col-50'> <label for='delivery' style='float: left;'>Delivery Date : </label> </div>
              <div class='col-50'> <label id='view-delivery' style='float: left;'></label> </div>
            </div>
            <div class='row'>
              <div class='col-50'> <label for='paid' style='float: left;'>Paid Date : </label> </div>
              <div class='col-50'> <label id='view-paid' style='float: left;'></label> </div>
            </div>


            <div class='row'>
              <div class='col-50'> <label for='view-cx-name' style='float: left;'>Customer Name : </label> </div>
              <div class='col-50'> <label id='view-cx-name' style='float: left;'></label> </div>
            </div>
            <div class='row'>
              <div class='col-50'> <label for='address' style='float: left;'>Customer Address : </label> </div>
              <div class='col-50'> <label id='view-cx-address' style='float: left;'></label> </div>
            </div>
            <div class='row'>
              <div class='col-50'> <label for='contact' style='float: left;'>Customer Contact : </label> </div>
              <div class='col-50'> <label id='view-cx-contact' style='float: left;'></label> </div>
            </div>


            <div class='row'>
              <div class='col-50'>
                <label for='message'></label>
              </div>
              <div class='col-50' id='form-details-message-update'>
              </div>
            </div>

        </form>

        <input type='button' value='PRINT' id='printOrder'>
      </div>
    </div>
    <div class='gs-popup-window-footer'></div>
  </div>
  <br><br><br><br>
</div>
<script type="text/javascript">
  function loadUpdateForm(id) {
    //console.log(id);
    $("#form-message-update").empty();  
    var formData = '{ '+
          '"id" : "'+id+'",' +
          '"searchBy" : null,' +
          '"orderBy" : null,' +
          '"limitStart" : null,' +
          '"limitLength" : null' +
      '}';
    //console.log(formData);
    var jsonData = jQuery.parseJSON(formData);
    //console.log(jsonData);
    //console.log('<?=$_DOMAIN?>api/json/viewOrder/');
    $.ajax({
          type        : 'POST',
          contentType : "application/json; charset=utf-8",
          url         : '<?=$_DOMAIN?>api/json/viewOrder/',
          data        : JSON.stringify(jsonData),
          dataType    : 'json',
          encode      : false,
          success: function (response, status, xhr) {
            console.log(response);
            if((xhr.status==200) && (status=="success")){
              if(response["error"]==false){
                $("#status").val(response["result"]["data"][0]["status"]);
                $("#method").val(response["result"]["data"][0]["method"]);
              }else{
                $("#form-message").append("<div class='alert alert-simple alert-danger' style='width: 100%' >"+
                  "<i class='start-icon fa fa-times-circle-o faa-times gs-xxlarge' ></i>"+
                    "<b>Result Error !</b>Record is not Loading. Please call the administrator<br>"+
                  "</div>");
              }
            }else{
              $("#form-message").append("<div class='alert alert-simple alert-danger' style='width: 100%' >"+
                  "<i class='start-icon fa fa-times-circle-o faa-times gs-xxlarge' ></i>"+
                    "<b>Result Error !</b>Server error found on the api. Please call the administrator<br>"+
                  "</div>");
            }
          },
          error: function (xhr, status, error) {
            if(xhr.status==200){ 
              $("#form-message").append("<div class='alert alert-simple alert-danger' style='width: 100%' >"+
                  "<i class='start-icon fa fa-times-circle-o faa-times gs-xxlarge' ></i>"+
                    "<b>Loading Data Api Error !</b>Server error found on the api. Please call the administrator<br>"+
                  "</div>");
            }else{ console.log(xhr.responseText); }
          }
      });
    event.preventDefault();
  }

  function loadUpdateDetailForm(id){
    console.log(id);
    $("#form-details-message-update").empty();  
    var formData = '{ '+
          '"id" : "'+id+'",' +
          '"searchBy" : null,' +
          '"orderBy" : null,' +
          '"limitStart" : null,' +
          '"limitLength" : null' +
      '}';
    //console.log(formData);
    var jsonData = jQuery.parseJSON(formData);
    //console.log(jsonData);
    //console.log('<?=$_DOMAIN?>api/json/viewOrder/');
    $.ajax({
          type        : 'GET',
          contentType : "application/json; charset=utf-8",
          url         : '<?=$_DOMAIN?>api/json/viewOrderByID/?id='+id,
          dataType    : 'json',
          encode      : false,
          success: function (response, status, xhr) {
            console.log(response);
            if((xhr.status==200) && (status=="success")){
              if(response["error"]==false){

                var amount = parseFloat(response["order"]["data"][0]["amount"]);
                var discount = parseFloat(response["order"]["data"][0]["discount"]);
                var balance = parseFloat(response["order"]["data"][0]["balance"]);

                $("#view-status").empty();
                $("#view-method").empty();
                $("#view-amount").empty();
                $("#view-discount").empty();
                $("#view-balance").empty();
                $("#view-insert").empty();
                $("#view-delivery").empty();
                $("#view-paid").empty();
                $("#view-cx-name").empty();
                $("#view-cx-contact").empty();
                $("#view-cx-email").empty();
                $("#view-cx-name").empty();
                $("#view-cx-address").empty();

                $("#view-status").append(response["order"]["data"][0]["status"]);
                $("#view-method").append(response["order"]["data"][0]["method"]);
                //$("#view-amount").append("LKR " + String(parseFloat(amount).toFixed(2)));
                $("#view-discount").append("LKR " + String(parseFloat(discount).toFixed(2)));
                //$("#view-balance").append("LKR " + String(parseFloat(balance).toFixed(2)));
                $("#view-insert").append(response["order"]["data"][0]["insert_stamp"]);
                $("#view-delivery").append(response["order"]["data"][0]["delivery_stamp"]);
                $("#view-paid").append(response["order"]["data"][0]["paid_stamp"]);

                $("#view-cx-name").append(response["customer"]["data"][0]["first_name"] + " " + response["customer"]["data"][0]["last_name"]);
                $("#view-cx-contact").append(response["customer"]["data"][0]["contact"]);
                $("#view-cx-email").append(response["customer"]["data"][0]["email"]);
                $("#view-cx-address").append(response["customer"]["data"][0]["address"]);

                var itemListTable = document.getElementById("itemListTableView");
                var itemsData = response["items"]["data"];
                var trueTotalPrice = 0;
                for (i = 0; i < itemsData.length; ++i) {
                  var qty = parseFloat(itemsData[i]["qty"]);
                  var code = itemsData[i]["code"];
                  var name = itemsData[i]["name"];
                  var category = itemsData[i]["category"];
                  var price = parseFloat(itemsData[i]["price"]);
                  trueTotalPrice = trueTotalPrice + price;
                  var row = itemListTable.insertRow(1);
                  var cell1 = row.insertCell(0);
                  var cell2 = row.insertCell(1);
                  var cell3 = row.insertCell(2);
                  var cell4 = row.insertCell(3);
                  cell1.innerHTML = code;
                  cell2.innerHTML = name;
                  cell3.innerHTML = qty;
                  cell4.innerHTML = "LKR " + String(parseFloat(price).toFixed(2));
                }
                balance = trueTotalPrice - discount;
                $("#view-amount").append("LKR " + String(parseFloat(trueTotalPrice).toFixed(2)));
                $("#view-balance").append("LKR " + String(parseFloat(balance).toFixed(2)));

  
              }
            }
          },
          error: function (xhr, status, error) {
            if(xhr.status==200){ 
              $("#form-message").append("<div class='alert alert-simple alert-danger' style='width: 100%' >"+
                  "<i class='start-icon fa fa-times-circle-o faa-times gs-xxlarge' ></i>"+
                    "<b>Loading Data Api Error !</b>Server error found on the api. Please call the administrator<br>"+
                  "</div>");
            }else{ console.log(xhr.responseText); }
          }
      });
    event.preventDefault();
  }

  function validateUpdateForm() {
    $("#update-form").validate({
      debug: true,
      rules: {
        category:{ required: true },
        name:{ required: true, minlength: 3 },
        quantity:{ required: true, number: true },
        unit:{ required: true },
        price:{ required: true, number: true },
        stock:{ required: true, number: true },
        //email: { required: true, email: true },
        //password: { required: true, minlength: 5 }
      },
      messages: {
        category: { required: "Please select the item category" },
        name: { required: "Please type the item name", minlength: "Need more than 3 letters" },
        quantity: { required: "Please add the quantity", number: "Need number value"  },
        unit: { required: "Please select the unit" },
        price: { required: "Please type the price", number: "Need number value"  },
        stock: { required: "Please type the stock value", number: "Need number value"  }
        //password: { required: "Please provide a password", minlength: "Your password must be at least 5 characters long" },
        //email: "Please enter a valid email address"
      },
      errorPlacement: function(error, element) {
        console.log(error);
        var placement = $(element).data('error');
        if (placement) {  $(placement).append(error); } 
        else {  error.insertAfter(element); }
      },
      submitHandler: function(form) { 
        console.log("No Errors, Submitting The Form");
        submitUpdateForm();
      }
    });
  }

  function submitUpdateForm() {
    var formData = '{ '+
          '"id" : "'+$('#updateid').val() + '",' +
          '"code" : null,' +
          '"name" : "'+$('#name').val() + '",' +
          '"category" : "'+$('#category').val() + '",' +
          '"qty" : "'+$('#quantity').val() + '",' +
          '"unit" : "'+$('#unit').val() + '",' +
          '"price" : "'+$('#price').val() + '",' +
          '"stock" : "'+$('#stock').val() + '",' +
          '"stock_alart" : "'+$('#alert').val() + '"' +
      '}';
    console.log(formData);
    var jsonData = jQuery.parseJSON(formData);
    console.log(jsonData);
    console.log('<?=$_DOMAIN?>api/json/editItem/');
    $.ajax({
          type        : 'POST',
          contentType : "application/json; charset=utf-8",
          url         : '<?=$_DOMAIN?>api/json/editItem/',
          data        : JSON.stringify(jsonData),
          dataType    : 'json',
          encode      : false,
          success: function (response, status, xhr) {
            console.log(response);
            if((xhr.status==200) && (status=="success")){
              if(response["error"]==false){
                $("#form-message-update").append("<div class='alert alert-simple alert-success' style='width: 100%' >"+
                  "<i class='start-icon fa fa-check-circle-o faa-times gs-xxlarge' ></i>"+
                    "<b>ID</b> "+response['result']+" <br> "+
                    "<b>Successfully !</b>Recode updated successfully. "+
                  "</div>");
                //document.getElementById("update-form").reset();
              }else{
                $("#form-message-update").append("<div class='alert alert-simple alert-danger' style='width: 100%' >"+
                  "<i class='start-icon fa fa-times-circle-o faa-times gs-xxlarge' ></i>"+
                    "<b>Result Error !</b>Record is not updated. Please call the administrator<br>"+
                  "</div>");
              }
            }else{
              $("#form-message-update").append("<div class='alert alert-simple alert-danger' style='width: 100%' >"+
                  "<i class='start-icon fa fa-times-circle-o faa-times gs-xxlarge' ></i>"+
                    "<b>Result Error !</b>Server error found on the api. Please call the administrator<br>"+
                  "</div>");
            }
          },
          error: function (xhr, status, error) {
            if(xhr.status==200){ 
              $("#form-message-update").append("<div class='alert alert-simple alert-danger' style='width: 100%' >"+
                  "<i class='start-icon fa fa-times-circle-o faa-times gs-xxlarge' ></i>"+
                    "<b>Api Error !</b>Server error found on the api. Please call the administrator<br>"+
                  "</div>");
            }else{ console.log(xhr.responseText); }
          }
      });
    event.preventDefault();
  }

  function submitUpdateImageForm() {
    var id = $('input[name=itemcode]').val();
    console.log(id);
    var fd = new FormData();
    var files = $('#file')[0].files;
    console.log(fd);
    console.log(files);

  
    if(files.length > 0 ){
       fd.append('file',files[0]);
       $.ajax({
          url: '<?=$_DOMAIN?>api/json/addItemImage/?id='+id,
          type: 'POST',
          data: fd,
          contentType: false,
          processData: false,
          success: function (response, status, xhr) {
            console.log(response);
            if((xhr.status==200) && (status=="success")){
              if(response["error"]==false){
                $("#itemimage").attr("src", "<?=$_DOMAIN?>images/items/thumb/"+id+".jpg"); 
                $("#form-message-update-image").append("<div class='alert alert-simple alert-success' style='width: 100%' >"+
                  "<i class='start-icon fa fa-check-circle-o faa-times gs-xxlarge' ></i>"+
                    "<b>Successfully !</b>Recode updated successfully.<br> "+response['result']+
                  "</div>");
                $("#file").empty();
              }else{
                $("#form-message-update-image").append("<div class='alert alert-simple alert-danger' style='width: 100%' >"+
                  "<i class='start-icon fa fa-times-circle-o faa-times gs-xxlarge' ></i>"+
                    "<b>Result Error !</b>Record is not updated. Please call the administrator<br>"+
                  "</div>");
              }
            }else{
              $("#form-message-update-image").append("<div class='alert alert-simple alert-danger' style='width: 100%' >"+
                  "<i class='start-icon fa fa-times-circle-o faa-times gs-xxlarge' ></i>"+
                    "<b>Result Error !</b>Server error found on the api. Please call the administrator<br>"+
                  "</div>");
            }
          },
          error: function (xhr, status, error) {
            if(xhr.status==200){ 
              $("#form-message-update-image").append("<div class='alert alert-simple alert-danger' style='width: 100%' >"+
                  "<i class='start-icon fa fa-times-circle-o faa-times gs-xxlarge' ></i>"+
                    "<b>Api Error !</b>Server error found on the api. Please call the administrator<br>"+
                  "</div>");
            }else{ console.log(xhr.responseText); }
          }
       });
    }
    else{ alert("Please select a file."); }
  }

  var doc = new jsPDF();
  var specialElementHandlers = { '#editor': function (element, renderer) { return true; } };
  $('#printOrder').click(function () {   
      doc.fromHTML($('#update-form-Details').html(), 15, 15, { 'width': 170, 'elementHandlers': specialElementHandlers });
      doc.save('sample-order.pdf');
  });

  //window.onload = function() { loadGridItems(); };
</script>