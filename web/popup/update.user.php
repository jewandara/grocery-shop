<div class='gs-popup-window' id='updateUser'>
  <div class='gs-popup-window-content'>
    <div class='gs-popup-window-header'>
      <h1 class='gs-large'><span class='gs-popup-close'>&times;</span></h1>
      <h1 class='gs-large'><i class='fa fa-pencil-square'></i> UPDATE LOGIN USER : <i id='recodeId'></i></h5>
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
                <label for='username'>Username : </label>
              </div>
              <div class='col-75'>
                <input type='text' name='username' id='username' placeholder='Type user login username here' class='form-control' style='background-color:#989799' readonly>
              </div>
            </div>
            <div class='row'>
              <div class='col-25'>
                <label for='email'>Email : </label>
              </div>
              <div class='col-75'>
                <input type='text' name='email' id='email' placeholder='Type customer email here' class='form-control' style='background-color:#989799' readonly>
              </div>
            </div>
            <div class='row'>
              <div class='col-25'>
                <label for='contact'>Contact : </label>
              </div>
              <div class='col-75'>
                <input type='text' name='contact' id='contact' placeholder='Type user contact number here' class='form-control' >
              </div>
            </div>
            <div class='row'>
              <div class='col-25'>
                <label for='firstname'>First Name : </label>
              </div>
              <div class='col-75'>
                <input type='text' name='firstname' id='firstname' placeholder='Type user first name here' class='form-control' >
              </div>
            </div>
            <div class='row'>
              <div class='col-25'>
                <label for='lastname'>Last Name : </label>
              </div>
              <div class='col-75'>
                <input type='text' name='lastname' id='lastname' placeholder='Type user last name here' class='form-control' >
              </div>
            </div>
            <div class='row'>
              <div class='col-25'>
                <label for='passrequest'>Lost Password Request : </label>
              </div>
              <div class='col-75'>
                <input type='text' name='passrequest' id='passrequest' placeholder='Type customer email here' class='form-control' >
              </div>
            </div>
            <div class='row'>
              <div class='col-25'>
                <label for='status'>Account Status : </label>
              </div>
              <div class='col-75'>
                <select name='status' id='status' class='form-control gs-button gs-grey' style='width: 100%; padding: 10px' >
                  <option class='gs-hover-white' value='1'>Active User Login Account</option>
                  <option class='gs-hover-white' value='0'>Inactive User Login Account</option>
                </select>
              </div>
            </div>

            <div class='row'>
              <div class='col-25'>
                <label for='permission'>Accout Permission : </label>
              </div>
              <div class='col-75'>
                <select name='permission' id='permission' class='form-control gs-button gs-grey' style='width: 100%; padding: 10px' >
                  <option class='gs-hover-white' value='Administrator'>Administrator</option>
                  <option class='gs-hover-white' value='Manager'>Manager</option>
                  <option class='gs-hover-white' value='User'>User</option>
                  <option class='gs-hover-white' value='Other'>Other</option>
                </select>
              </div>
            </div>
            <div class='row'>
              <div class='col-25'>
                <label for='lastactivation'>Last Activation : </label>
              </div>
              <div class='col-75'>
                <label for='lastactivation' id='lastactivation' style='float:left'></label>
              </div>
            </div>
            <div class='row'>
              <div class='col-25'>
                <label for='lastsignin'>Last Signin : </label>
              </div>
              <div class='col-75'>
                <label for='lastsignin' id='lastsignin' style='float:left'></label>
              </div>
            </div>
            <div class='row'>
              <div class='col-25'>
                <label for='signup'>Signup Stamp : </label>
              </div>
              <div class='col-75'>
                <label for='signup' id='signup' style='float:left'></label>
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
              <input type='submit' value='UPDATE USER' onclick='validateUpdateForm()'>
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
	    //console.log('<?=$_DOMAIN?>api/json/viewUser/');
	    $.ajax({
	          type        : 'POST',
	          contentType : "application/json; charset=utf-8",
	          url         : '<?=$_DOMAIN?>api/json/viewUser/',
	          data        : JSON.stringify(jsonData),
	          dataType    : 'json',
	          encode      : false,
	          success: function (response, status, xhr) {
		        //console.log(response);
	            if((xhr.status==200) && (status=="success")){
		          if(response["error"]==false){
					var last_activation_request = new Date(1000*parseInt(response["result"]["data"][0]["last_activation_request"]));
					var last_sign_in_stamp = new Date(1000*parseInt(response["result"]["data"][0]["last_sign_in_stamp"]));
					var sign_up_stamp = new Date(1000*parseInt(response["result"]["data"][0]["sign_up_stamp"]));
					$("#username").val(response["result"]["data"][0]["username"]);
					$("#contact").val(response["result"]["data"][0]["contact"]);
					$("#firstname").val(response["result"]["data"][0]["first_name"]);
					$("#lastname").val(response["result"]["data"][0]["last_name"]);
					$("#email").val(response["result"]["data"][0]["email"]);
					$("#passrequest").val(response["result"]["data"][0]["lost_password_request"]);
					$("#status").val(response["result"]["data"][0]["active"]);
					$("#permission").val(response["result"]["data"][0]["title"]);
					$("#lastactivation").empty();
					$("#lastsignin").empty();
					$("#signup").empty();
					$("#lastactivation").append(last_activation_request.toUTCString());
					$("#lastsignin").append(last_sign_in_stamp.toUTCString());
					$("#signup").append(sign_up_stamp.toUTCString());
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
	        submitUpdateForm();
	      }
	    });
	}

	function submitUpdateForm() {
	    var formData = '{ '+
	          '"username" : "'+$('#username').val() + '",' +
	          '"first_name" : "'+$('#firstname').val() + '",' +
	          '"last_name" : "'+$('#lastname').val() + '",' +
	          '"contact" : "'+$('#contact').val() + '",' +
	          '"email" : "'+$('#email').val() + '",' +
	          '"title" : "'+$('#permission').val() + '",' +
	          '"lost_password_request" : "'+$('#passrequest').val() + '",' +
	          '"active" : "'+$('#status').val() + '"' +
	      '}';
	    console.log(formData);
	    var jsonData = jQuery.parseJSON(formData);
	    console.log(jsonData);
	    console.log('<?=$_DOMAIN?>api/json/editUser/');
	    $.ajax({
	          type        : 'POST',
	          contentType : "application/json; charset=utf-8",
	          url         : '<?=$_DOMAIN?>api/json/editUser/',
	          data        : JSON.stringify(jsonData),
	          dataType    : 'json',
	          encode      : false,
	          success: function (response, status, xhr) {
	            console.log(response);
	            if((xhr.status==200) && (status=="success")){
	              if(response["error"]==false){
	              	$("#form-message-update").empty();
	                $("#form-message-update").append("<div class='alert alert-simple alert-success' style='width: 100%' >"+
	                  "<i class='start-icon fa fa-check-circle-o faa-times gs-xxlarge' ></i>"+
	                    "<b>ID</b> "+response['result']+" <br> "+
	                    "<b>Successfully !</b>New recode updated successfully. "+
	                  "</div>");
	                $('label.error').css('display', 'none');
	              }else{
	              	$("#form-message-update").empty();
	                $("#form-message-update").append("<div class='alert alert-simple alert-danger' style='width: 100%' >"+
	                  "<i class='start-icon fa fa-times-circle-o faa-times gs-xxlarge' ></i>"+
	                    "<b>Error !</b> "+response['result']+"<br>"+
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
