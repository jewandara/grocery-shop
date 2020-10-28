

    <section class="hero-section" style="margin-top: -100px;">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="login-form" >
                        <span>Holiday Accommodation Agency</span>
                        <h4>Administrator Login: Editing Page Information</h4>
                        <br>
                        <?=($ERROR_MESSAGE != "")?$ERROR_MESSAGE:""?>

                        <form name='adminPage' action='<?=$DOMAIN_CURRENT_PATH?>' method='post' >
							<div class="row">

                				<div class="col-xl-8 table">
		                            <div class='input-text'>
		                                <label for='pageID'>WEB PAGE ID : </label>
		                                <input type='hidden' name='process' value='1'>
		                                <input type='text' readonly='true' value='<?=$pageDetails['id']?>'class='form-control' >
		                                <i class='icon_info_alt'></i>
		                            </div>
		                            <div class="input-text">
		                                <label for="pageName">WEB PAGE NAME : </label>
		                                <input type='text' readonly='true' value='<?=$pageDetails['page']?>' class="form-control" >
		                                <i class='icon_info_alt'></i>
		                            </div>
		                            <div class="input-text">
		                                <label for="fullName" style='display:inline-block;'>WEB PAGE CURRENT ACCESS : </label>
		                                <?php 

		                                	if($pageDetails['private'] == 1){ echo "<a class='btn-danger' style='display:inline-block; padding:5px 10px 5px 10px'>Private</a>"; }
		                                	else{ echo "<a class='btn-success' style='display:inline-block; padding:5px 10px 5px 10px'>Public</a>"; }
		                                ?>
		                            </div>
		                            <div class="input-text">
										<?php
											if ($pageDetails['private'] == 1){ echo "<input type='checkbox' name='private' id='private' value='Yes' style='display: inline-block; width: 25px; height: 25px;' checked >"; }
											else { echo "<input type='checkbox' name='private' id='private' value='Yes' style='display: inline-block; width: 25px; height: 25px;' >"; }
										?>
		                                <label for="fullName" style='display:inline-block;'> SET THIS WEB PAGE TO PRIVATE ACCESS</label>
		                            </div>
									<input type='submit' value='Update'  class='btn-def'/>
								</div>










                				<div class="col-xl-4 table">
									<div class="row" style="border: 1px solid #F5F5DC;" >

                						<div class="col-xl-12">
											<table class="col-xl-12 table table-striped">
												<tr style="background: #98FB98" >
													<th><i class="icon_blocked"></i></th>
													<th>Permission</th>
													<th>Remove</th>
												</tr>
												<?php
													foreach ($permissionData as $v1) {
														if(isset($pagePermissions[$v1['id']])){
															echo "<tr>
																<td><input type='checkbox' name='removePermission[".$v1['id']."]' id='removePermission[".$v1['id']."]' value='".$v1['id']."' ></td>
																<td style='color: #006400' >".$v1['name']."</td>
																<td><input type='submit' name='Submit' value='Remove' class='btn-def' /></td>
															 </tr>";
														}
													}
												?>
											</table>
										</div>









										<br><br><p style="padding:10px;" ><u>Select To Add New User Permissions Bellow : </u></p><br>
										<div class="col-xl-12">
											<table class="col-xl-12" >
												<tr>
													<th><i class="icon_folder-add_alt"></i></th>
													<th>Adding Permission</th>
													<th>. . .</th>
												</tr>
												<?php
													foreach ($permissionData as $v1) {
														if(!isset($pagePermissions[$v1['id']])){

															echo "<tr>
																<td><input type='checkbox' name='addPermission[".$v1['id']."]' id='addPermission[".$v1['id']."]' value='".$v1['id']."'></td>
																<td>".$v1['name']."<td>
																<td><input type='submit' name='Submit' value='Add' class='btn-def' /></td>
															</tr>";
														}
													}
												?>
											</table>
										</div>
									</div>
								</div>







							</div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
