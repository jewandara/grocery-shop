<div class='gs-popup-window' id='addNewUser'>
  <div class='gs-popup-window-content'>
    <div class='gs-popup-window-header'>
      <h1 class='gs-large'><span class='gs-popup-close'>&times;</span></h1>
      <h1 class='gs-large'><i class='fa fa-plus-square'></i> ADD NEW LOGIN USER</h5>
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
                <label for='username'>Username : </label>
              </div>
              <div class='col-75'>
                <input type='text' name='username' placeholder='Type user login username here' class='form-control' >
              </div>
            </div>
            <div class='row'>
              <div class='col-25'>
                <label for='contact'>Contact : </label>
              </div>
              <div class='col-75'>
                <input type='text' name='contact' placeholder='Type user contact number here' class='form-control' >
              </div>
            </div>
            <div class='row'>
              <div class='col-25'>
                <label for='firstname'>First Name : </label>
              </div>
              <div class='col-75'>
                <input type='text' name='firstname' placeholder='Type user first name here' class='form-control' >
              </div>
            </div>
            <div class='row'>
              <div class='col-25'>
                <label for='lastname'>Last Name : </label>
              </div>
              <div class='col-75'>
                <input type='text' name='lastname' placeholder='Type user last name here' class='form-control' >
              </div>
            </div>
            <div class='row'>
              <div class='col-25'>
                <label for='email'>Email : </label>
              </div>
              <div class='col-75'>
                <input type='text' name='email' placeholder='Type customer email here' class='form-control' >
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
        username:{ required: true, minlength: 4 },
        contact:{ required: true, number: true, minlength: 9 },
        firstname:{ required: true, minlength: 3 },
        lastname:{ required: true, minlength: 3 },
        email:{ required: true, email: true }
      },
      messages: {
        username: { required: "Please type username", minlength: "Need more than 4 letters" },
        contact: { required: "Please type contact number", number: "Contact number is not a string value", minlength: "Need more than 9 letters" },
        firstname: { required: "Please type first name", minlength: "Need more than 3 letters" },
        lastname: { required: "Please type last name", minlength: "Need more than 3 letters" },
        email: { required: "Please type the email address", email: "Invalid email address" }
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
  	$("#form-message-add").append("<img src='<?=$_DOMAIN?>images/loader.gif'>");
    var formData = '{ '+
          '"username" : "'+$('input[name=username]').val() + '",' +
          '"contact" : "'+$('input[name=contact]').val() + '",' +
          '"first_name" : "'+$('input[name=firstname]').val() + '",' +
          '"last_name" : "'+$('input[name=lastname]').val() + '",' +
          '"email" : "'+$('input[name=email]').val() + '"' +
      '}';
    console.log(formData);
    var jsonData = jQuery.parseJSON(formData);
    console.log(jsonData);
    console.log('<?=$_DOMAIN?>api/json/addUser/');
    $.ajax({
          type        : 'POST',
          contentType : "application/json; charset=utf-8",
          url         : '<?=$_DOMAIN?>api/json/addUser/',
          data        : JSON.stringify(jsonData),
          dataType    : 'json',
          encode      : false,
          success: function (response, status, xhr) {
            console.log(response);
            if((xhr.status==200) && (status=="success")){
              if(response["error"]==false){
              	$("#form-message-add").empty();
                $("#form-message-add").append("<div class='alert alert-simple alert-success' style='width: 100%' >"+
                  "<i class='start-icon fa fa-check-circle-o faa-times gs-xxlarge' ></i>"+
                    "<b>ID</b> "+response['result']+" <br> "+
                    "<b>Successfully !</b>New recode added successfully. "+
                  "</div>");
                document.getElementById("add-form").reset();
                $('label.error').css('display', 'none');
              }else{
              	$("#form-message-add").empty();
                $("#form-message-add").append("<div class='alert alert-simple alert-danger' style='width: 100%' >"+
                  "<i class='start-icon fa fa-times-circle-o faa-times gs-xxlarge' ></i>"+
                    "<b>Error !</b> "+response['result']+"<br>"+
                  "</div>");
              }
            }else{
            	$("#form-message-add").empty();
              	$("#form-message-add").append("<div class='alert alert-simple alert-danger' style='width: 100%' >"+
                  "<i class='start-icon fa fa-times-circle-o faa-times gs-xxlarge' ></i>"+
                    "<b>Result Error !</b>Server error found on the api. Please call the administrator<br>"+
                  "</div>");
            }
          },
          error: function (xhr, status, error) {
            if(xhr.status==200){ 
            	$("#form-message-add").empty();
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