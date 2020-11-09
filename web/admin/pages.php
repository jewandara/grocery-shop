<?php
  securePage($_SERVER['PHP_SELF']); 
  //require_once($_FOLDER.'web/popup/add.new.page.php');
?>

<!--     <section class="rooms-section spad">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="login-form" >
                        <span>Holiday Accommodation Agency</span>
                        <h4>Web Pages Configuration</h4>
                        <br>
                        <?=($ERROR_MESSAGE != "")?$ERROR_MESSAGE:""?>
                        <form name='adminPermissions' action='<?=$DOMAIN_CURRENT_PATH?>' method='post' >
							<table class="table table-striped">
								<thead>
								  <tr>
								    <th>Page Id</th>
								    <th>Page Name</th>
								    <th>Page Access</th>
								    <th><b>Edit Access</b></th>
								    <th><b>Visit Link</b></th>
								  </tr>
								</thead>
								<tbody>
								<?php

									foreach ($dbpages as $page){
										echo "
										<tr>
											<td>".$page['id']."</td>
											<td><a href='".$DOMAIN_PATH."admin_page/index.php?id=".$page['id']."'>/".$page['page']."</a></td>";
												if($page['private']==0){ echo "<td><a class='btn btn-success'>Public</a></td>"; }
												else{ echo "<td><a class='btn btn-danger'>Private</a></td>"; }
										echo "<td><a href='".$DOMAIN_PATH."admin_page/index.php?id=".$page['id']."'><i class='icon_pencil-edit'></i></a></td>
											<td><a href='".$DOMAIN_PATH.$page['page']."' target='_blank'><i class='icon_link_alt'></i></a></td>
										</tr>";
									}

								?>
								</tbody>
							</table>
						</form>
					</div>
				</div>
            </div>
        </div>
    </section>
 -->




<div class='gs-main' style='margin-left:250px;'>
  <div id='topMenuText' class='gs-container gs-top gs-theme gs-large' style='padding:8.2px 10px'>
    <p>
      <i class='fa fa-bars gs-button gs-teal gs-hide-large gs-xlarge' onclick='menuOpen()'></i>
      <span id='topMenuIntro' class='gs-hide'>GROCERY PAGES</span>
    </p>
  </div>
  <header class='gs-container gs-theme' style='padding:32px 24px'>
    <h1 class='gs-xxxlarge'><i class='fa fa-file-code-o'></i>PAGES</h1>
  </header>
  <div class='gs-container' style='padding:32px'>
    <div class='gs-row-padding gs-margin-bottom'>
      <h5 style="float:left;box-sizing: border-box; "><b><i class="fa fa-file-code-o"></i>  Page Grid View</b></h5>
	    <style>
	        table { font-family: arial, sans-serif; border-collapse: collapse; width: 100%; }
	        th { border: 1px solid #000; background-color:#000; text-align: left; padding: 8px; color:#fff; }
	        td, th { border: 1px solid #000; text-align: left; padding: 8px;}
	        tr:nth-child(even) { background-color: #dddddd; }
		    .label { color: white; padding: 4px; color:#fff; border-radius: 3px; font-family: Arial;}
		    .success {background-color: #4CAF50; font-size: 12px; } /* Green */
		    .info {background-color: #2196F3; font-size: 12px; } /* Blue */
		    .warning {background-color: #ff9800; font-size: 12px; } /* Orange */
		    .danger {background-color: #f44336; font-size: 12px; } /* Red */ 
		    .other {background-color: #e7e7e7; color: black; font-size: 12px; } /* Gray */ 
		  </style>
      <table id='pages' style='width:100%'>
        <thead>
          <tr>
              <th>Page Id</th>
              <th>Page Name</th>
              <th>Page Security</th>
          </tr>
        </thead>
        <tbody>
          <?=$_TR?>
        </tbody>
      </table>

    </div>
    <hr>
  </div>

  <div class='gs-container gs-padding-16 gs-card' style='background-color:#eee'>
    <h3 class='gs-center'>Grocery Shop Web Application</h3>
    <div class='gs-content' style='max-width:800px'>
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
