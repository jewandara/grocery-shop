
<?php
  securePage($_SERVER['PHP_SELF']); 
	require_once($_FOLDER.'web/report/daily.income.php');
	require_once($_FOLDER.'web/report/monthly.income.php');
	require_once($_FOLDER.'web/report/highest.sales.items.php');
?>

<div class='gs-main' style='margin-left:250px;'>
  <div id='topMenuText' class='gs-container gs-top gs-theme gs-large' style='padding:8.2px 10px'>
    <p>
      <i class='fa fa-bars gs-button gs-teal gs-hide-large gs-xlarge' onclick='menuOpen()'></i>
      <span id='topMenuIntro' class='gs-hide'>GROCERY REPORTS</span>
    </p>
  </div>
  <header class='gs-container gs-theme' style='padding:32px 24px'>
    <h1 class='gs-xxxlarge'><i class='fa fa fa-line-chart'></i>REPORTS</h1>
  </header>
  <div class='gs-container' style='padding:32px'>
    <div class='gs-row-padding gs-margin-bottom'>
      <h5 style="float:left;box-sizing: border-box; "><b><i class="fa fa fa-line-chart"></i>  Download Grocery Shop Reports</b></h5>
	  <div class="gs-panel">
	    <div class="gs-row-padding" style="margin:0 -16px">
	        <table class="gs-table gs-white" >
	          <tr>
	            <td><i class="fa fa-bookmark gs-text-red gs-xxlarge"></i></td>
	            <td>Grocery Shop Daily Income Report</td>
	            <td><input type="date" id="DailyIncomeDate" name="DailyIncome"></td>
	            <td><button class="gs-button-gird gs-button gs-light-grey gs-hover-black" id='DailyIncome'><i class="fa fa-download"></i> Download Report</button></td>
	          </tr>
	          <tr>
	            <td><i class="fa fa-flag gs-text-orange gs-xxlarge"></i></td>
	            <td>Grocery Shop Forecast Income Report (Daily)</td>
	            <td><input type="date" id="DailyForecastIncomeDate" name="DailyForecastIncome" value=""></td>
	            <td><button class="gs-button-gird gs-button gs-light-grey gs-hover-black" id='DailyForecastIncome'><i class="fa fa-download"></i> Download Report</button></td>
	          </tr>

	          <tr>
	            <td><i class="fa fa-calendar gs-text-blue gs-xxlarge"></i></td>
	            <td>Grocery Shop Monthly Income Report</td>
	            <td><input type="month" id="MonthlyIncomeMonth" name="MonthlyIncome"></td>
	            <td><div class="gs-button-gird gs-button gs-light-grey gs-hover-black" id='MonthlyIncome'><i class="fa fa-download"></i> Download Report</div></td>
	          </tr>

	          <tr>
	            <td><i class="fa fa-flag-checkered gs-text-yellow gs-xxlarge"></i></td>
	            <td>Grocery Shop Forecast Income Report (Monthly)</td>
	            <td><input type="month" id="MonthlyForecastIncomeMonth" name="MonthlyForecastIncome" value=""></td>
	            <td><button class="gs-button-gird gs-button gs-light-grey gs-hover-black" id='MonthlyForecastIncome'><i class="fa fa-download"></i> Download Report</button></td>
	          </tr>

	          <tr>
	            <td><i class="fa fa-bar-chart gs-text-yellow gs-xxlarge"></i></td>
	            <td>Highest Sales Items Report</td>
	            <td></td>
	            <td><div class="gs-button-gird gs-button gs-light-grey gs-hover-black" id='HighestSalesItemsDailyByCatagory'><i class="fa fa-download"></i> Download Report</div></td>
	          </tr>
	        </table>
	    </div>
	  </div>
    </div>
    <hr>
  </div>
  <div class='gs-container gs-padding-16 gs-card' style='background-color:#eee'>
    <h3 class='gs-center'>Grocery Shop Web Application</h3>
    <div class='gs-content' style='max-width:800px'>
      <img src='./images/footer-image.png' style='width:98%;margin:20px 0' alt='Blog Template'><br>
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
<script type="text/javascript">


  $('#DailyIncome').on('click',function(){
  	var DailyIncome = $('input[name=DailyIncome]').val();
  	console.log(DailyIncome);
  	if(DailyIncome!=""){ 
  		callJsonPDFDailyIncome(DailyIncome);
  	}
  });

  $('#DailyForecastIncome').on('click',function(){
  	var DailyForecastIncome = $('input[name=DailyForecastIncome]').val();
  	console.log(DailyForecastIncome);
  	if(DailyForecastIncome!=""){ 
  		callJsonPDFDailyForecastIncome(DailyForecastIncome);
  	}
  });

  $('#MonthlyIncome').on('click',function(){
  	var MonthlyIncome = $('input[name=MonthlyIncome]').val();
  	console.log(MonthlyIncome);
  	if(MonthlyIncome!=""){ 
  		callJsonPDFMonthlyIncome(MonthlyIncome);
  	}
  });

  $('#MonthlyForecastIncome').on('click',function(){
  	var MonthlyForecastIncome = $('input[name=MonthlyForecastIncome]').val();
  	console.log(MonthlyForecastIncome);
  	if(MonthlyForecastIncome!=""){ 
  		callJsonPDFForecastMonthlyIncome(MonthlyForecastIncome);
  	}
  });

  $('#HighestSalesItemsDailyByCatagory').on('click',function(){
  	callJsonPDFHighestSalesItemsDailyByCatagory();
  });
</script>
