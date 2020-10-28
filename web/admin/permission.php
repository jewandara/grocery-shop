
  

<form name='adminPermission' action='<?=$DOMAIN_CURRENT_PATH?>' method='post' >


	<div class="modal fade" id="popUpWindow" role="dialog" >
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
				  <span class="modal-title">Administrator Login: Adding User To This Permission Membership<br>
				  	<u>Select To Add New User To This Permissions Bellow : </u>
				  </span>
				</div>
				<div class="modal-body">

					<input type="text" id="searchPermissionUsers" class="form-control" onkeyup="searchUsers('searchPermissionUsers','searchPermissionUsersTable', 1,2)" placeholder="Table Search for user.." title="Type in a name" style="margin-bottom: 15px;">

					<table id="searchPermissionUsersTable" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%" >
						<tr>
							<th><i class="icon_folder-add_alt"></i></th>
							<th>Adding Members</th>
							<th>Email Address</th>
							<th>. . .</th>
						</tr>
						<?php	
							foreach ($userData as $v1) {
								if(!isset($permissionUsers[$v1['id']])){
									echo "<tr>
											<td><input type='checkbox' name='addPermission[".$v1['id']."]' id='addPermission[".$v1['id']."]' value='".$v1['id']."'></td>
											<td>".$v1['display_name']."</td>
											<td>".$v1['email']."</td>
											<td><input type='submit' name='Submit' value='Add' class='btn-def' /></td>
										</tr>";
								}
							}
						?>
					</table>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-info btn-lg" data-dismiss="modal" style="padding: -10px;"> X </button>
				</div>
			</div>
		</div>
	</div>







    <section class="hero-section" style="margin-top: -100px;">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="login-form" >
                        <span>Holiday Accommodation Agency</span>
                        <h4>Administrator Login: Editing User Permission Membership Details</h4>
                        <br>
                        <?=($ERROR_MESSAGE != "")?$ERROR_MESSAGE:""?>

							<div class="row">
                				<div class="col-xl-3 table" style="padding-top: 10px">
		                            <div class='input-text'>
		                                <label for='permissionID'>PERMISSION ID : </label>
		                                <input type='text' readonly='true' value='<?=$permissionDetails['id']?>'class='form-control' >
		                            </div>
		                            <div class="input-text" style="padding-top: 10px">
		                                <label for="permissionName">PERMISSION NAME : </label>
		                                <input type='text' name='name' value='<?=$permissionDetails['name']?>' placeholder='Type user permission name' class="form-control" >
		                            </div>
		                            <div class="input-text" style="padding-top: 20px; padding-bottom: 20px;">
		                            	<input type='checkbox' name='<?="delete[".$permissionDetails['id']."]"?>' id='<?="delete[".$permissionDetails['id']."]"?>' value='<?=$permissionDetails['id']?>' style='display: inline-block; width: 25px; height: 25px;'>
		                                <label for="delete"  style='display: inline-block;'>  DELETE THIS PERMISSION </label>
		                                <span style='color:#f44336;'><strong >Warning !</strong>  You will lose all user permission data</span>
		                            </div>
                            		<input type='submit' name='Submit' value='Update' class='btn-def' />
								</div>

                				<div class="col-xl-9 table">
									<div class="row" >
										<input type="text" id="searchRemoveUsers" class="form-control" onkeyup="searchUsers('searchRemoveUsers','searchRemoveUserTable', 2,3)" placeholder="Table Search for user.." title="Type in a name" style="margin-bottom: 15px; margin-top: 42px;">

										<table id="searchRemoveUserTable" class="table table-striped table-bordered dt-responsive nowrap">
											<tr style="background: #98FB98" >
												<th><i class="icon_blocked"></i></th>
												<th>User Login Name</th>
												<th>User Full Name</th>
												<th>User Email Address</th>
												<th>Remove Permission</th>
											</tr>
											<?php
												foreach ($userData as $v1) {
													if(isset($permissionUsers[$v1['id']])){
														echo "<tr>
																<td><input type='checkbox' name='removePermission[".$v1['id']."]' id='removePermission[".$v1['id']."]' value='".$v1['id']."' ></td>
																<td style='color: #006400' >".$v1['user_name']."</td>
																<td style='color: #006400' >".$v1['display_name']."</td>
																<td style='color: #006400' >".$v1['email']."</td>
																<td><input type='submit' name='Submit' value='REMOVE' class='btn-def' /></td>
															 </tr>";
													}
												}
											?>
										</table>
										<button type="button" class="btn-def" data-toggle="modal" data-target="#popUpWindow">
											<i class="icon_folder-add"></i> ADD USERS TO THIS PERMISSION
										</button>
										<!--
											<p style="padding:10px;" ><u>Select To Add New User Permissions Bellow : </u></p>
											<div class="col-xl-6">
												<table class="col-xl-12" >
													<tr>
														<th><i class="icon_folder-add_alt"></i></th>
														<th>Adding Members</th>
														<th>. . .</th>
													</tr>
													<?php	
														foreach ($userData as $v1) {
															if(!isset($permissionUsers[$v1['id']])){
																echo "<tr>
																		<td><input type='checkbox' name='addPermission[".$v1['id']."]' id='addPermission[".$v1['id']."]' value='".$v1['id']."'></td>
																		<td>".$v1['display_name']."<td>
																		<td><input type='submit' name='Submit' value='Add' class='btn-def' /></td>
																	</tr>";
															}
														}
													?>
												</table>
											</div>
										-->
									</div>
								</div>
							</div>








							<div class="row">



                				<div class="col-xl-12 table">
									<div class="row" style="border: 1px solid #F5F5DC;" >




                						<div class="col-xl-2">
											<table class="col-xl-12 table table-striped">
												<tr style='background: #98FB98; border-left:1px solid #ccc5ba;border-right:1px solid #ccc5ba;' >
													<th>Public Permission Access For All Users</th>
												</tr>
												<?php
													foreach ($pageData as $v1) {
														if($v1['private'] != 1){ echo "<tr><td style='border-left:1px solid #ccc5ba;border-right:1px solid #ccc5ba;'>".$v1['page']."</td></tr>"; }
													}
												?>
											</table>
										</div>


										<div class="col-xl-5">
											<table class="col-xl-12" >
												<tr>
													<th style="background: #98FB98;"><i class="icon_folder-add_alt"></i></th>
													<th style="background: #98FB98; border-left: 1px solid #ccc5ba;">Remove Access</th>
													<th style="background: #98FB98; border-left: 1px solid #ccc5ba;">. . .</th>
												</tr>
												<?php
													foreach ($pageData as $v1) {
														if(isset($pagePermissions[$v1['id']]) AND $v1['private'] == 1){
															echo "<tr>
																	<td><input type='checkbox' name='removePage[".$v1['id']."]' id='removePage[".$v1['id']."]' value='".$v1['id']."'></td>
																	<td>".$v1['page']."</td>
																	<td><input type='submit' name='Submit' value='Remove' class='btn-def' /></td>
																</tr>";
														}
													}
												?>
											</table>
										</div>

										<div class="col-xl-5">
											<table class="col-xl-12" >
												<tr>
													<th style='background: #e39c88; border-left:1px solid #ccc5ba;'><i class="icon_folder-add_alt"></i></th>
													<th style='background: #e39c88;'>Add Access</th>
													<th style='background: #e39c88; border-right:1px solid #ccc5ba;'>. . .</th>
												</tr>
												<?php
													foreach ($pageData as $v1) {
														if(!isset($pagePermissions[$v1['id']]) AND $v1['private'] == 1){
															echo "<tr>
																	<td style='border-left:1px solid #ccc5ba;'><input type='checkbox' name='addPage[".$v1['id']."]' id='addPage[".$v1['id']."]' value='".$v1['id']."'></td>
																	<td>".$v1['page']."</td>
																	<td style='border-right:1px solid #ccc5ba;'><input type='submit' name='Submit' value='Add' class='btn-def' /></td>
																</tr>";
														}
													}
												?>
											</table>
										</div>



									</div>
								</div>
							</div>





                    </div>
                </div>
            </div>
        </div>
    </section>





</form>