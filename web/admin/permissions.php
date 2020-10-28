
<!--     <section class="rooms-section spad">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="login-form" >
                        <span>Holiday Accommodation Agency</span>
                        <h4>Administrator Login: User Permission Configuration</h4>
                        <br>
                        <?=($ERROR_MESSAGE != "")?$ERROR_MESSAGE:""?>
                        <form name='adminPermissions' action='<?=$DOMAIN_CURRENT_PATH?>' method='post' >
							<table class="table table-striped">
								<thead>
								  <tr>
								    <th>Delete</th>
								    <th>Permission Role</th>
								    <th><b>. . .</b></th>
								  </tr>
								</thead>
								<tbody>
								<?php
									foreach ($permissionData as $v1) {
										echo "
										<tr>
											<td><input type='checkbox' name='delete[".$v1['id']."]' id='delete[".$v1['id']."]' value='".$v1['id']."'></td>
											<td><a href='".$DOMAIN_PATH."admin_permission/index.php?id=".$v1['id']."'>".$v1['name']."</a></td>
											<td><a href='".$DOMAIN_PATH."admin_permission/index.php?id=".$v1['id']."'><i class='icon_pencil-edit'></i></a></td>
										</tr>";
									}
								?>
								</tbody>
							</table><hr>
								<input type='submit' name='Submit' value='DELETE' class='btn-def'/>
							<br><br><br>
								<label><u>Add A New User Permission Name :</u></label><br>
								<input type='text' name='newPermission' style="padding:4px; margin-left: 10px; margin-right: 10px;" />                            
								<input type='submit' name='Submit' value='ADD NEW' class='btn-def'/>
						</form>
					</div>
				</div>
            </div>
        </div>
    </section> -->


<?php
  securePage($_SERVER['PHP_SELF']); 
  require_once($_FOLDER.'web/popup/add.new.permission.php');
?>
<div class='gs-main' style='margin-left:250px;'>
  <div id='topMenuText' class='gs-container gs-top gs-theme gs-large' style='padding:8.2px 10px'>
    <p>
      <i class='fa fa-bars gs-button gs-teal gs-hide-large gs-xlarge' onclick='menuOpen()'></i>
      <span id='topMenuIntro' class='gs-hide'>GROCERY PERMISSIONS</span>
    </p>
  </div>
  <header class='gs-container gs-theme' style='padding:32px 24px'>
    <h1 class='gs-xxxlarge'><i class='fa fa-unlock-alt'></i>PERMISSIONS</h1>
  </header>



  <div class='gs-container' style='padding:32px'>
    <div class='gs-row-padding gs-margin-bottom'>
      <h5 style="float:left;box-sizing: border-box; "><b><i class="fa fa-unlock-alt"></i>  Permission Grid View</b></h5>
      <header class='gs-container' style='padding-top:22px; padding-bottom:20px'>
        <p class='gs-grid-button-add-new'>
          <button class='gs-button-gird gs-button gs-light-grey gs-hover-green' id='popupButton'> <i class='fa fa-plus'></i> Add New</button>
        </p>
        <p class='gs-grid-button-download-excel'>
          <button class='gs-button-gird gs-button gs-light-grey gs-hover-black'><i class='fa fa-download'></i> Download Excel</button>
        </p>
        <p class='gs-grid-button-search-by'>
          <select class='gs-button-gird gs-button gs-light-grey gs-hover-grey' >
            <option class='gs-hover-white' value="0">Search By</option>
            <option class='gs-hover-white' value="Vegetables">Vegetables</option>
            <option class='gs-hover-white' value="Fruits">Fruits</option>
            <option class='gs-hover-white' value="Dairy">Dairy</option>
            <option class='gs-hover-white' value="Foods">Foods</option>
            <option class='gs-hover-white' value="Meats">Meats</option>
            <option class='gs-hover-white' value="Beverages">Beverages</option>
            <option class='gs-hover-white' value="Household">Household</option>
            <option class='gs-hover-white' value="Baby">Baby</option>
            <option class='gs-hover-white' value="Freezer">Freezer</option>
          </select>
        </p>
      </header>

      <table id='permissions' class='display gs-grid-table' style='width:100%'>
        <thead>
          <tr>
              <th></th>
              <th>First name</th>
              <th>Last name</th>
              <th>Position</th>
              <th>Office</th>
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
