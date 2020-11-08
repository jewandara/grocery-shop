<div class='gs-popup-window' id='updateItem'>
  <div class='gs-popup-window-content'>
    <div class='gs-popup-window-header'>
      <h1 class='gs-large'><span class='gs-popup-close'>&times;</span></h1>
      <h1 class='gs-large'><i class='fa fa-pencil-square'></i> UPDATE ITEM : <i id='recodeId'></i></h5>
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
                <label for='name'></label>
              </div>
              <div class='col-75'>
                <img id='image' src="https://www.w3schools.com/html/pic_trulli.jpg" alt="Item Image" class='form-image'>
              </div>
            </div>
            <div class='row'>
              <div class='col-25'> <label for='name'></label> </div>
              <div class='col-75'> <input type='hidden' name='updateid' id='updateid' class='form-control' readonly> </div>
            </div>
            <div class='row'>
              <div class='col-25'>
                <label for='name'>Code : </label>
              </div>
              <div class='col-75'>
                <input type='text' name='code' id='code' class='form-control' disabled>
              </div>
            </div>
            <div class='row'>
              <div class='col-25'>
                <label for='category'>Category : </label>
              </div>
              <div class='col-75'>
                <select name='category' id='category'class='form-control gs-button gs-grey' style='width: 100%; padding: 10px' >
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
                <input type='text' name='name' id='name' placeholder='Type your item name here' class='form-control' >
              </div>
            </div>
            <div class='row'>
              <div class='col-25'>
                <label for='quantity'>Quantity : </label>
              </div>
              <div class='col-75'>
                <input type='text' name='quantity' id='quantity' placeholder='Type your quantity for a unit, here' class='form-control' >
              </div>
            </div>
            <div class='row'>
              <div class='col-25'>
                <label for='unit'>Unit : </label>
              </div>
              <div class='col-75'>
                <select name='unit' id='unit' class='form-control gs-button gs-grey' style='width: 100%; padding: 10px' >
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
                <input type='text' name='price' id='price' placeholder='Type your price for a unit here' class='form-control' >
              </div>
            </div>
            <div class='row'>
              <div class='col-25'>
                <label for='stock'>Stock : </label>
              </div>
              <div class='col-75'>
                <input type='text' name='stock' id='stock' placeholder='Type your stock value here' class='form-control' >
              </div>
            </div>
            <div class='row'>
              <div class='col-25'>
                <label for='alert'>Stock Alert : </label>
              </div>
              <div class='col-75'>
                <input type='text' name='alert' id='alert' placeholder='Type your minimum stock value for a alert' class='form-control' >
              </div>
            </div>
            <div class='row'>
              <div class='col-25'>
                <label for='insert_stamp'>Insert Date : </label>
              </div>
              <div class='col-75'>
                <label for='insert_stamp' class='form-control' style='float: left' id='insert_stamp'></label>
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
              <input type='submit' value='SUBMIT' onclick='validateUpdateForm()'>
            </div>
        </form>
      </div>
    </div>
    <div class='gs-popup-window-footer'></div>
  </div>
  <br><br><br><br>
</div>


<div class='gs-popup-window' id='updateItemImage'>
  <div class='gs-popup-window-content'>
    <div class='gs-popup-window-header'>
      <h1 class='gs-large'><span class='gs-popup-close'>&times;</span></h1>
      <h1 class='gs-large'><i class='fa fa-pencil-square'></i> UPDATE ITEM IMAGE : <i id='recodeImageId'></i></h5>
        <hr>
    </div>
    <div class='gs-popup-window-body'>
      <div class='container'>
          <div class='row'>
            <div class='col-25'>
              <label for='name'></label>
            </div>
            <div class='col-75'>
              <img id='itemimage' src="https://www.w3schools.com/html/pic_trulli.jpg" alt="Item Image" class='form-image'>
            </div>
          </div>

          <div class='row'>
            <div class='col-25'>
              <label for='itemcode'>Item Code : </label>
            </div>
            <div class='col-75'>
              <input type='text' name='itemcode' id='itemcode' class='form-control' disabled>
            </div>
          </div>

          <div class='row'>
            <div class='col-25'>
              <label for='file'>File Upload : </label>
            </div>
            <div class='col-75'>
              <input type="file" id="file" name="file" class='form-control' >
            </div>
          </div>

          <div class='row'>
            <div class='col-25'>
              <label for='message'></label>
            </div>
            <div class='col-75' id='form-message-update-image'>
            </div>
          </div>
          <div class='row'>
            <br>
            <input type='submit' value='Upload Image' onclick='submitUpdateImageForm()'>
          </div>
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
    //console.log('<?=$_DOMAIN?>api/json/viewItem/');
    $.ajax({
          type        : 'POST',
          contentType : "application/json; charset=utf-8",
          url         : '<?=$_DOMAIN?>api/json/viewItem/',
          data        : JSON.stringify(jsonData),
          dataType    : 'json',
          encode      : false,
          success: function (response, status, xhr) {
            //console.log(response);
            if((xhr.status==200) && (status=="success")){
              if(response["error"]==false){
                //console.log(response["result"]["data"][0]["code"]);
                $("#image").attr("src", "<?=$_DOMAIN?>images/items/"+response["result"]["data"][0]["code"]+".jpg");
                $("#updateid").val(response["result"]["data"][0]["id"]);
                $("#code").val(response["result"]["data"][0]["code"]);
                $("#category").val(response["result"]["data"][0]["category"]);
                $("#name").val(response["result"]["data"][0]["name"]);
                $("#quantity").val(response["result"]["data"][0]["qty"]);
                $("#price").val(response["result"]["data"][0]["price"]);
                $("#stock").val(response["result"]["data"][0]["stock"]);
                $("#alert").val(response["result"]["data"][0]["stock_alart"]);
                $("#unit").val(response["result"]["data"][0]["unit"]);
                $("#insert_stamp").empty();
                $("#insert_stamp").append(response["result"]["data"][0]["insert_stamp"]);
              }else{
                $("#form-message").append("<div class='alert alert-simple alert-danger' style='width: 100%' >"+
                  "<i class='start-icon fa fa-times-circle-o faa-times gs-xxlarge' ></i>"+
                    "<b>Result Error !</b>New record is not updated. Please call the administrator<br>"+
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

  function loadUpdateImageForm(code){
    $("#itemimage").attr("src", "<?=$_DOMAIN?>images/items/thumb/"+code+".jpg");
    $("#itemcode").val(code);
    $("#form-message-update-image").empty();
    $("#file").val("");;
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
</script>
