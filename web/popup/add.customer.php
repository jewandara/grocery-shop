<div class='gs-popup-window' id='addNewItem'>
  <div class='gs-popup-window-content'>
    <div class='gs-popup-window-header'>
      <h1 class='gs-large'><span class='gs-popup-close'>&times;</span></h1>
      <h1 class='gs-large'><i class='fa fa-plus-square'></i> ADD NEW ITEM</h5>
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
        <form id='item-form'>

            <div class='row'>
              <div class='col-25'>
                <label for='category'>Category : </label>
              </div>
              <div class='col-75'>
                <select name='category' class='form-control gs-button gs-grey' style='width: 100%; padding: 10px' >
                  <option class='gs-hover-white' value=''> - select category - </option>
                  <option class='gs-hover-white' value='Vegetables'>Vegetables</option>
                  <option class='gs-hover-white' value='Fruits'>Fruits</option>
                  <option class='gs-hover-white' value='Dairy'>Dairy</option>
                  <option class='gs-hover-white' value='Foods'>Foods</option>
                  <option class='gs-hover-white' value='Meats'>Meats</option>
                  <option class='gs-hover-white' value='Beverages'>Beverages</option>
                  <option class='gs-hover-white' value='Household'>Household</option>
                  <option class='gs-hover-white' value='Baby'>Baby</option>
                  <option class='gs-hover-white' value='Freezer'>Freezer</option>
                </select>
              </div>
            </div>
            <div class='row'>
              <div class='col-25'>
                <label for='name'>Name : </label>
              </div>
              <div class='col-75'>
                <input type='text' name='name' placeholder='Type your item name here' class='form-control' >
              </div>
            </div>
            <div class='row'>
              <div class='col-25'>
                <label for='quantity'>Quantity : </label>
              </div>
              <div class='col-75'>
                <input type='text' name='quantity' placeholder='Type your quantity for a unit, here' class='form-control' >
              </div>
            </div>
            <div class='row'>
              <div class='col-25'>
                <label for='unit'>Unit : </label>
              </div>
              <div class='col-75'>
                <select name='unit' class='form-control gs-button gs-grey' style='width: 100%; padding: 10px' >
                  <option class='gs-hover-white' value=''> - select unit - </option>
                  <option class='gs-hover-white' value='No'>No</option>
                  <option class='gs-hover-white' value='Kg'>Kg</option>
                  <option class='gs-hover-white' value='g'>g</option>
                  <option class='gs-hover-white' value='Km'>Km</option>
                  <option class='gs-hover-white' value='m'>m</option>
                  <option class='gs-hover-white' value='cm'>cm</option>
                  <option class='gs-hover-white' value='mm'>mm</option>
                  <option class='gs-hover-white' value='l'>l</option>
                  <option class='gs-hover-white' value='ml'>ml</option>
                </select>
              </div>
            </div>
            <div class='row'>
              <div class='col-25'>
                <label for='price'>Price (LKR) : </label>
              </div>
              <div class='col-75'>
                <input type='text' name='price' placeholder='Type your price for a unit here' class='form-control' >
              </div>
            </div>
            <div class='row'>
              <div class='col-25'>
                <label for='stock'>Stock : </label>
              </div>
              <div class='col-75'>
                <input type='text' name='stock' placeholder='Type your stock value here' class='form-control' >
              </div>
            </div>
            <div class='row'>
              <div class='col-25'>
                <label for='alert'>Stock Alert : </label>
              </div>
              <div class='col-75'>
                <input type='text' name='alert' placeholder='Type your minimum stock value for a alert' class='form-control' >
              </div>
            </div>
            <div class='row'>
              <div class='col-25'>
                <label for='message'></label>
              </div>
              <div class='col-75' id='form-message'>
              </div>
            </div>
            <div class='row'>
              <br>
              <input type='submit' value='SUBMIT' onclick='validateForm()'>
            </div>
        </form>
      </div>

    </div>
    <div class='gs-popup-window-footer'></div>
  </div>
  <br><br><br><br>
</div>

<script type="text/javascript">
  function validateForm() {
    $("#item-form").validate({
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
          /* console.log(element); console.log(error); */
          var placement = $(element).data('error');
          if (placement) {  $(placement).append(error); } 
          else {  error.insertAfter(element); }
      },
      submitHandler: function(form) { submitForm(); /*console.log("No Errors, Submitting The Form"); */ }
    });
  }



  function submitForm() {
    var formData = '{ '+
          '"category" : "'+$('input[name=category]').val() + '",' +
          '"name" : "'+$('input[name=name]').val() + '",' +
          '"test" : "trst"' +
      '}';
    //console.log(formData);
    var jsonFormData = jQuery.parseJSON(formData);
    //console.log(jsonFormData);

    $.ajax({
          type        : 'POST',
          url         : '<?=$_DOMAIN?>api/json/item',
          data        : jsonFormData,
          dataType    : 'json',
          encode      : true,
          success: function (response, status, xhr) {
            if((xhr.status==200) && (status=="success")){
              if(response["error"]==false){
                $("#form-message").append("<div class='alert alert-simple alert-success' style='width: 100%' >"+
                  "<i class='start-icon fa fa-check-circle-o faa-times gs-xxlarge' ></i>"+
                    "<b>Successfully !</b>New recode added successfully.<br> "+response['message']+
                  "</div>");
                document.getElementById("item-form").reset();
              }else{
                $("#form-message").append("<div class='alert alert-simple alert-danger' style='width: 100%' >"+
                  "<i class='start-icon fa fa-times-circle-o faa-times gs-xxlarge' ></i>"+
                    "<b>Error !</b>New record is not updated. Please call the administrator<br>"+
                  "</div>");
              }
            }else{
              $("#form-message").append("<div class='alert alert-simple alert-danger' style='width: 100%' >"+
                  "<i class='start-icon fa fa-times-circle-o faa-times gs-xxlarge' ></i>"+
                    "<b>Error !</b>Server error found on the api. Please call the administrator<br>"+
                  "</div>");
            }
          },
          error: function (xhr, status, error) {
            if(xhr.status==200){ 
              $("#form-message").append("<div class='alert alert-simple alert-danger' style='width: 100%' >"+
                  "<i class='start-icon fa fa-times-circle-o faa-times gs-xxlarge' ></i>"+
                    "<b>Error !</b>Server error found on the api. Please call the administrator<br>"+
                  "</div>");
            }else{ console.log(xhr.responseText); }
          }
      });
    event.preventDefault();
  }
 

  //window.onload = function() {  };
</script>