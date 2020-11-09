<div class='gs-popup-window' id='updateCustomer'>
  <div class='gs-popup-window-content'>
    <div class='gs-popup-window-header'>
      <h1 class='gs-large'><span class='gs-popup-close'>&times;</span></h1>
      <h1 class='gs-large'><i class='fa fa-pencil-square'></i> UPDATE CUSTOMER : <i id='recodeId'></i></h5>
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
                <label for='custid'></label>
              </div>
              <div class='col-75'>
                <input type='hidden' name='custid' id='custid' class='form-control' readonly> 
              </div>
            </div>
            <div class='row'>
              <div class='col-25'>
                <label for='cxfirst'>First Name : </label>
              </div>
              <div class='col-75'>
                <input type='text' name='cxfirst' id='cxfirst' placeholder='Type customer first name here' class='form-control' >
              </div>
            </div>
            <div class='row'>
              <div class='col-25'>
                <label for='cxlast'>Last Name : </label>
              </div>
              <div class='col-75'>
                <input type='text' name='cxlast' id='cxlast' placeholder='Type customer last name here' class='form-control' >
              </div>
            </div>
            <div class='row'>
              <div class='col-25'>
                <label for='cxcontact'>Contact : </label>
              </div>
              <div class='col-75'>
                <input type='text' name='cxcontact' id='cxcontact' placeholder='Type customer contact number here' class='form-control' >
              </div>
            </div>
            <div class='row'>
              <div class='col-25'>
                <label for='cxemail'>Email : </label>
              </div>
              <div class='col-75'>
                <input type='text' name='cxemail' id='cxemail' placeholder='Type customer email address here' class='form-control' >
              </div>
            </div>
            <div class='row'>
              <div class='col-25'>
                <label for='cxaddress'>Address : </label>
              </div>
              <div class='col-75'>
                <input type='text' name='cxaddress' id='cxaddress' placeholder='Type customer address here' class='form-control' >
              </div>
            </div>
            <div class='row'>
              <div class='col-25'>
                <label for='cxlongitude'>Longitude : </label>
              </div>
              <div class='col-75'>
                <input type='text' name='cxlongitude' id='cxlongitude' placeholder='Type customer location Longitude here' class='form-control' >
              </div>
            </div>
            <div class='row'>
              <div class='col-25'>
                <label for='cxlatitude'>Latitude : </label>
              </div>
              <div class='col-75'>
                <input type='text' name='cxlatitude' id='cxlatitude' placeholder='Type customer location latitude here' class='form-control' >
              </div>
            </div>
            <div class='row'>
              <div class='col-25'>
                <label for='cxinsert'>Insert Date : </label>
              </div>
              <div class='col-75'>v
                <label for='cxinsert' id='cxinsert' style='float: left;'></label>
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



<script type="text/javascript">

  function loadUpdateForm(id) {
    $("#form-message-update").empty();  
    $("#cxinsert").empty();  
    var formData = '{ '+
          '"id" : "'+id+'",' +
          '"searchBy" : null,' +
          '"orderBy" : null,' +
          '"limitStart" : null,' +
          '"limitLength" : null' +
      '}';
    var jsonData = jQuery.parseJSON(formData);
    $.ajax({
          type        : 'POST',
          contentType : "application/json; charset=utf-8",
          url         : '<?=$_DOMAIN?>api/json/viewCustomer/',
          data        : JSON.stringify(jsonData),
          dataType    : 'json',
          encode      : false,
          success: function (response, status, xhr) {
            console.log(response);
            if((xhr.status==200) && (status=="success")){
              if(response["error"]==false){
                $("#custid").val(response["result"]["data"][0]["id"]);
                $("#cxinsert").append(response["result"]["data"][0]["insert_stamp"]);
                $("#cxfirst").val(response["result"]["data"][0]["first_name"]);
                $("#cxlast").val(response["result"]["data"][0]["last_name"]);
                $("#cxcontact").val(response["result"]["data"][0]["contact"]);
                $("#cxemail").val(response["result"]["data"][0]["email"]);
                $("#cxaddress").val(response["result"]["data"][0]["address"]);
                $("#cxlongitude").val(response["result"]["data"][0]["longitude"]);
                $("#cxlatitude").val(response["result"]["data"][0]["latitude"]);
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
        submitUpdateForm();
      }
    });
  }

  function submitUpdateForm() {
    var formData = '{ '+
          '"cust_id" : "'+$('#custid').val() + '",' +
          '"first_name" : "'+$('#cxfirst').val() + '",' +
          '"last_name" : "'+$('#cxlast').val() + '",' +
          '"contact" : "'+$('#cxcontact').val() + '",' +
          '"email" : "'+$('#cxemail').val() + '",' +
          '"address" : "'+$('#cxaddress').val() + '",' +
          '"longitude" : "'+$('#cxlongitude').val() + '",' +
          '"latitude" : "'+$('#cxlatitude').val() + '"' +
      '}';
    console.log(formData);
    var jsonData = jQuery.parseJSON(formData);
    console.log(jsonData);
    console.log('<?=$_DOMAIN?>api/json/editCustomer/');
    $.ajax({
          type        : 'POST',
          contentType : "application/json; charset=utf-8",
          url         : '<?=$_DOMAIN?>api/json/editCustomer/',
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


</script>
