<div class='gs-popup-window' id='addNewOrder'>
  <div class='gs-popup-window-content'>
    <div class='gs-popup-window-header'>
      <h1 class='gs-large'><span class='gs-popup-close'>&times;</span></h1>
      <h1 class='gs-large'><i class='fa fa-plus-square'></i> ADD NEW ORDER</h5>
        <hr>
    </div>
    <div class='gs-popup-window-body'>
      <style>
        input[type=password], input[type=email], input[type=text], input[type=password]:focus, input[type=email]:focus, input[type=text]:focus { width: 100%; padding: 12px; border: 1px solid #ccc; border-radius: 4px; resize: vertical; float: left; color: #333; text-align: left; }
        input[type=text]::placeholder { color: #ccc;letter-spacing: 1px}
        input[type=text]:-ms-input-placeholder { color: #ccc;letter-spacing: 1px }
        input[type=text]::-ms-input-placeholder { color: #ccc;letter-spacing: 1px}

        input[type=email]::placeholder { color: #ccc;letter-spacing: 1px}
        input[type=email]:-ms-input-placeholder { color: #ccc;letter-spacing: 1px }
        input[type=email]::-ms-input-placeholder { color: #ccc;letter-spacing: 1px}

        input[type=password]::placeholder { color: #ccc;letter-spacing: 1px}
        input[type=password]:-ms-input-placeholder { color: #ccc;letter-spacing: 1px }
        input[type=password]::-ms-input-placeholder { color: #ccc;letter-spacing: 1px}

        label { padding: 12px 12px 12px 0; display: inline-block; color: #333; }

        input[type=button], input[type=submit] { background-color: #4CAF50; color: white; padding: 12px 20px; border: none; border-radius: 4px; cursor: pointer; float: right; }
        input[type=button], input[type=submit]:hover { background-color: #000; }
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
        <form id='addform'>


            <div class='row'>
              <div class='col-25'> </div>
              <div class='col-75'>
                <p style='color:red'>Can Not Fund the Customer</p>
                <p style='color:green' id=''>dsfsdf sdfsdfsdf</p>
              </div>
            </div>
            <div class='row'>
              <div class='col-25'>
                <label for='customer'>Customer : </label>
              </div>
              <div class='col-75'>
                <input type='text' name='customer' placeholder='Type customer name, email or contact' class='form-control' >
              </div>
            </div>
            <div class='row'>
              <div class='col-25'>
                <label for='method'>Method : </label>
              </div>
              <div class='col-75'>
                <select name='method' class='form-control gs-button gs-grey' style='width: 100%; padding: 10px' >
                  <option class='gs-hover-white' value=''> - select payment method - </option>
                  <option class='gs-hover-white' value='CASH'>CASH</option>
                  <option class='gs-hover-white' value='VISA'>VISA</option>
                  <option class='gs-hover-white' value='MASTER'>MASTER</option>
                </select>
              </div>
            </div>
            <div class='row'>
              <div class='col-25'>
                <label for='discount'>Discount ( % ) : </label>
              </div>
              <div class='col-75'>
                <input type='text' name='discount' placeholder='Type your discount, here' class='form-control' >
              </div>
            </div>



            <div class='row'>
              <div class='col-25'>
                <label for='table'>Item Table : </label>
              </div>
              <div class='col-75'>
                <table class='itemListTable' id='itemListTable'>
                  <thead>
                  <tr>
                    <th>Code </th>
                    <th>Item Name</th>
                    <th>Price per</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td><input type='text' name='code' placeholder='CODE' class='form-control' required></td>
                    <td></td>
                    <td></td>
                    <td><input type='text' name='qty' placeholder='QTY' class='form-control' required></td>
                    <td><input type='button' value='ADD' onclick='addItemToList()' style='width: 150px; background-color:#076582; '></td>
                  </tr>
                  </tbody>
                </table>
              </div>
            </div>



            <div class='row'>
              <div class='col-25'>
                <label for='message'></label>
              </div>
              <div class='col-75' id='form-message-add'>
              </div>
            </div>
            <div class='row'>
              <br>
              <input type='submit' value='SUBMIT' onclick='validateAddForm()'>
            </div>
        </form>
      </div>

    </div>
    <div class='gs-popup-window-footer'></div>
  </div>
  <br><br><br><br>
</div>

<script type="text/javascript">


  function addItemToList() {
    console.log("ggg");
    $("#addform").validate({
      debug: true,
      rules: {
        code:{ required: true },
        qty:{ required: true }
      },
      messages: {
        code: { required: "Please type the item code" },
        qty: { required: "Please add the quantity" }
      },
      errorPlacement: function(error, element) {
        console.log(error);
        var placement = $(element).data('error');
        if (placement) {  $(placement).append(error); } 
        else {  error.insertAfter(element); }
      },
      submitHandler: function(form) { 
        console.log("No Errors of Item Adding");
        addItemToListCallAPI();
      }
    });
  }

  function addItemToListCallAPI() {
    var formData = '{ "id" : null, "code" : "'+$('input[name=code]').val()+'",' +
        '"category" : null, "searchBy" : null, "limitStart" :null, "limitLength" : null }';
    console.log(formData);
    var jsonData = jQuery.parseJSON(formData);
    console.log(jsonData);
    console.log('<?=$_DOMAIN?>api/json/viewItem/');
    $.ajax({
          type        : 'POST',
          contentType : "application/json; charset=utf-8",
          url         : '<?=$_DOMAIN?>api/json/viewItem/',
          data        : JSON.stringify(jsonData),
          dataType    : 'json',
          encode      : false,
          success: function (response, status, xhr) {
            console.log(response);
            var price = parseFloat(response["result"]["data"][0]["price"]);
            var qty = parseFloat(response["result"]["data"][0]["qty"]);
            var code = response["result"]["data"][0]["code"];
            var unit = response["result"]["data"][0]["unit"];
            var name = response["result"]["data"][0]["name"];
            var category = response["result"]["data"][0]["category"];
            var countQty = parseFloat($('input[name=qty]').val());
            var QtyPrice = parseFloat(price/qty);
            var totalPrice = parseFloat(QtyPrice*countQty);
            console.log(totalPrice);
            if((xhr.status==200) && (status=="success")){
              if(response["error"]==false){
                var itemListTable = document.getElementById("itemListTable");
                var row = itemListTable.insertRow(1);
                var cell1 = row.insertCell(0);
                var cell2 = row.insertCell(1);
                var cell3 = row.insertCell(2);
                var cell4 = row.insertCell(3);
                var cell5 = row.insertCell(4);
                cell1.innerHTML = code;
                cell2.innerHTML = name;
                cell3.innerHTML = "LKR " + String(parseFloat(price).toFixed(2));
                cell4.innerHTML = unit + " " + countQty;
                cell5.innerHTML = "LKR " + String(parseFloat(totalPrice).toFixed(2));
              }
            }
          }
      });
    event.preventDefault();
  }

  function validateAddForm() {
    $("#add-form").validate({
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
        submitAddForm();
      }
    });
  }



/*
  function submitAddForm() {
    var formData = '{ '+
          '"category" : "'+$('select[name=category]').val() + '",' +
          '"name" : "'+$('input[name=name]').val() + '",' +
          '"qty" : "'+$('input[name=quantity]').val() + '",' +
          '"unit" : "'+$('select[name=unit]').val() + '",' +
          '"price" : "'+$('input[name=price]').val() + '",' +
          '"stock" : "'+$('input[name=stock]').val() + '",' +
          '"stock_alart" : "'+$('input[name=alert]').val() + '"' +
      '}';
    console.log(formData);
    var jsonData = jQuery.parseJSON(formData);
    console.log(jsonData);
    console.log('<?=$_DOMAIN?>api/json/addItem/');
    $.ajax({
          type        : 'POST',
          contentType : "application/json; charset=utf-8",
          url         : '<?=$_DOMAIN?>api/json/addItem/',
          data        : JSON.stringify(jsonData),
          dataType    : 'json',
          encode      : false,
          success: function (response, status, xhr) {
            console.log(response);
            if((xhr.status==200) && (status=="success")){
              if(response["error"]==false){
                $("#form-message-add").append("<div class='alert alert-simple alert-success' style='width: 100%' >"+
                  "<i class='start-icon fa fa-check-circle-o faa-times gs-xxlarge' ></i>"+
                    "<b>ID</b> "+response['result']+" <br> "+
                    "<b>Successfully !</b>New recode added successfully. "+
                  "</div>");
                document.getElementById("add-form").reset();
              }else{
                $("#form-message-add").append("<div class='alert alert-simple alert-danger' style='width: 100%' >"+
                  "<i class='start-icon fa fa-times-circle-o faa-times gs-xxlarge' ></i>"+
                    "<b>Result Error !</b>New record is not updated. Please call the administrator<br>"+
                  "</div>");
              }
            }else{
              $("#form-message-add").append("<div class='alert alert-simple alert-danger' style='width: 100%' >"+
                  "<i class='start-icon fa fa-times-circle-o faa-times gs-xxlarge' ></i>"+
                    "<b>Result Error !</b>Server error found on the api. Please call the administrator<br>"+
                  "</div>");
            }
          },
          error: function (xhr, status, error) {
            if(xhr.status==200){ 
              $("#form-message-add").append("<div class='alert alert-simple alert-danger' style='width: 100%' >"+
                  "<i class='start-icon fa fa-times-circle-o faa-times gs-xxlarge' ></i>"+
                    "<b>Api Error !</b>Server error found on the api. Please call the administrator<br>"+
                  "</div>");
            }else{ console.log(xhr.responseText); }
          }
      });
    event.preventDefault();
  }

  window.onload = function() { 
    $("#myInput").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("#myTable tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });
  };*/
</script>