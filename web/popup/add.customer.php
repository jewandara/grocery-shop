<div class='gs-popup-window' id='addNewCustomer'>
  <div class='gs-popup-window-content'>
    <div class='gs-popup-window-header'>
      <h1 class='gs-large'><span class='gs-popup-close'>&times;</span></h1>
      <h1 class='gs-large'><i class='fa fa-plus-square'></i> ADD NEW CUSTOMER</h5>
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
        <form id='add-form'>
            <div class='row'>
              <div class='col-25'>
                <label for='cxfirst'>First Name : </label>
              </div>
              <div class='col-75'>
                <input type='text' name='cxfirst' placeholder='Type customer first name here' class='form-control' >
              </div>
            </div>
            <div class='row'>
              <div class='col-25'>
                <label for='cxlast'>Last Name : </label>
              </div>
              <div class='col-75'>
                <input type='text' name='cxlast' placeholder='Type customer last name here' class='form-control' >
              </div>
            </div>
            <div class='row'>
              <div class='col-25'>
                <label for='cxcontact'>Contact : </label>
              </div>
              <div class='col-75'>
                <input type='text' name='cxcontact' placeholder='Type customer contact number here' class='form-control' >
              </div>
            </div>
            <div class='row'>
              <div class='col-25'>
                <label for='cxemail'>Email : </label>
              </div>
              <div class='col-75'>
                <input type='text' name='cxemail' placeholder='Type customer email address here' class='form-control' >
              </div>
            </div>
            <div class='row'>
              <div class='col-25'>
                <label for='cxaddress'>Address : </label>
              </div>
              <div class='col-75'>
                <input type='text' name='cxaddress' placeholder='Type customer address here' class='form-control' >
              </div>
            </div>
            <div class='row'>
              <div class='col-25'>
                <label for='cxlongitude'>Longitude : </label>
              </div>
              <div class='col-75'>
                <input type='text' name='cxlongitude' placeholder='Type customer location Longitude here' class='form-control' >
              </div>
            </div>
            <div class='row'>
              <div class='col-25'>
                <label for='cxlatitude'>Latitude : </label>
              </div>
              <div class='col-75'>
                <input type='text' name='cxlatitude' placeholder='Type customer location latitude here' class='form-control' >
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

  function onloadAddForm() { 
    $('#form-message-add').prepend(); 
    $("#form-message-add").empty(); 
    console.log("Data Removed");
  }

  function validateAddForm() {
    $("#add-form").validate({
      debug: true,
      rules: {
        cxfirst:{ required: true, minlength: 3 },
        cxlast:{ required: true, minlength: 3 },
        cxcontact:{ required: true, number: true, minlength: 9 },
        cxemail:{ required: true, email: true },
        cxaddress:{ required: true, minlength: 10 },
        cxlongitude:{ number: true },
        cxlatitude:{ number: true }
      },
      messages: {
        cxfirst: { required: "Please type first name", minlength: "Need more than 3 letters" },
        cxlast: { required: "Please type last name", minlength: "Need more than 3 letters" },
        cxcontact: { required: "Please type contact number", number: "Contact number is not a string value", minlength: "Need more than 9 numbers"  },
        cxemail: { required: "Please type email address", email: "Invalid email address" },
        cxaddress: { required: "Please type the address", minlength: "Need more than 10 letters"  },
        cxlongitude: { number: "Need number value"  },
        cxlatitude: { number: "Need number value"  }
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

  function submitAddForm() {
    var formData = '{ '+
          '"first_name" : "'+$('input[name=cxfirst]').val() + '",' +
          '"last_name" : "'+$('input[name=cxlast]').val() + '",' +
          '"contact" : "'+$('input[name=cxcontact]').val() + '",' +
          '"email" : "'+$('input[name=cxemail]').val() + '",' +
          '"address" : "'+$('input[name=cxaddress]').val() + '",' +
          '"longitude" : "'+$('input[name=cxlongitude]').val() + '",' +
          '"latitude" : "'+$('input[name=cxlatitude]').val() + '"' +
      '}';
    console.log(formData);
    var jsonData = jQuery.parseJSON(formData);
    console.log(jsonData);
    console.log('<?=$_DOMAIN?>api/json/addCustomer/');
    $.ajax({
          type        : 'POST',
          contentType : "application/json; charset=utf-8",
          url         : '<?=$_DOMAIN?>api/json/addCustomer/',
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
                $('label.error').css('display', 'none');
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
 
</script>