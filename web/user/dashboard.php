<?php securePage($_SERVER['PHP_SELF']); ?>


<div class='gs-main' style='margin-left:250px;'>
	<div id='topMenuText' class='gs-container gs-top gs-theme gs-large' style='padding:8.2px 10px'>
		<p>
		  <i class='fa fa-bars gs-button gs-teal gs-hide-large gs-xlarge' onclick='menuOpen()'></i>
		  <span id='topMenuIntro' class='gs-hide'>GROCERY DASHBOARD</span>
		</p>
	</div>
	<header class='gs-container gs-theme' style='padding:32px 24px'>
		<h1 class='gs-xxxlarge'><i class='fa fa-home'></i>DASHBOARD</h1>
	</header>
	<!--  
    	<div class="gs-row-padding" style="padding:22px; margin-bottom:-32px">
			<div class="alert alert-simple alert-warning" style="width: 100%" >
	          <i class="start-icon fa fa-exclamation-triangle faa-times gs-xxlarge"></i>
	          <strong>Warning!</strong> Better check yourself, you'gjfghjghjghjre not looking too good.
	        </div>
	    </div>
	-->
	<?php 
		$OutOfStock = selectOutOfStock();
		if(!empty($OutOfStock)){
			echo "<div class='gs-row-padding' style='padding:22px; margin-bottom:-32px'>
			        <div class='alert alert-simple alert-danger' style='width: 100%' >
			          <i class='start-icon fa fa-times-circle faa-times gs-xxlarge';'></i>
			          <b>Out of Stock Warning!</b>  Bellow Items are unavailable for immediate sale. Please Update Stock.
			          <table style='padding-top:20px; margin-left: auto; margin-right: auto;'>";
						foreach ($OutOfStock as $dt) {
							echo "<tr>
									<td style='padding-right:10px'><i class='fa fa-file-text'></i></td>
									<td style='padding:2px;padding-left:10px;padding-right:15px'>".(string)$dt["category"]."</td>
									<td style='padding:2px;padding-left:10px;padding-right:15px'>".(string)$dt["code"]."</td>
									<td> - ".(string)$dt["name"]."</td>
								</tr>";
						}
			echo "		</table>
					</div>
			    </div>";
		} 
	?>

    <div class="gs-row-padding gs-margin-bottom" style="padding-left:32px;padding-right:32px; padding-top:32px; padding-bottom:5px">
      <div class="gs-half">
        <div class="gs-container gs-red gs-padding-16">
          <div class="gs-left"><i class="fa fa-clock-o gs-xxxlarge"></i></div>
          <div class="gs-right">
            <h3><?=$totalOrdersStatusPending?></h3>
          </div>
          <div class="gs-clear"></div>
          <h4>TOTAL PENDING ORDERS</h4>
        </div>
      </div>
      <div class="gs-half">
        <div class="gs-container gs-green gs-padding-16">
          <div class="gs-left"><i class="fa fa-check-square-o gs-xxxlarge"></i></div>
          <div class="gs-right">
            <h3><?=$totalOrdersStatusClose?></h3>
          </div>
          <div class="gs-clear"></div>
          <h4>TOTAL COMPLETED ORDERS</h4>
        </div>
      </div>
    </div>

    <div class="gs-row-padding gs-margin-bottom" style="padding-left:32px;padding-right:32px; padding-top:5px; padding-bottom:10px">
      <div class="gs-quarter">
        <div class="gs-container gs-deep-purple gs-padding-16">
          <div class="gs-left"><i class="fa fa-shopping-cart gs-xxxlarge"></i></div>
          <div class="gs-right">
            <h3><?=$totalOrders?></h3>
          </div>
          <div class="gs-clear"></div>
          <h4>TOTAL ORDERS</h4>
        </div>
      </div>
      <div class="gs-quarter">
        <div class="gs-container gs-purpole gs-padding-16">
          <div class="gs-left"><i class="fa fa-file-text gs-xxxlarge"></i></div>
          <div class="gs-right">
            <h3><?=$totalItems?></h3>
          </div>
          <div class="gs-clear"></div>
          <h4>TOTAL ITEMS</h4>
        </div>
      </div>
      <div class="gs-quarter">
        <div class="gs-container gs-deep-purple gs-padding-16">
          <div class="gs-left"><i class="fa fa-users gs-xxxlarge"></i></div>
          <div class="gs-right">
            <h3><?=$totalUsers?></h3>
          </div>
          <div class="gs-clear"></div>
          <h4>TOTAL USERS</h4>
        </div>
      </div>
      <div class="gs-quarter">
        <div class="gs-container gs-purpole gs-text-white gs-padding-16">
          <div class="gs-left"><i class="fa fa-smile-o gs-xxxlarge"></i></div>
          <div class="gs-right">
            <h3><?=$totalCustomers?></h3>
          </div>
          <div class="gs-clear"></div>
          <h4>TOTAL CUSTOMERS</h4>
        </div>
      </div>
    </div>

    <div class="gs-row-padding" style="padding:32px">
        <div class="gs-third"  style="margin-top: -40px; margin-bottom: 20px">
          <div id="canvas-holder" style="width: 300px;">
            <h5>Feeds of High Demand Goods</h5>
            <canvas id="chart-area" width="600" height="600" style="display: block; height: 300px; width: 300px;" class="chartjs-render-monitor"></canvas>
          </div>
          <div id="chartjspie-tooltip"> <table></table> </div>
        </div>
        <div class="gs-twothird">
          <h5>Total Revenue of Grocery Shop</h5>
          <table class="gs-table gs-striped gs-white">
            <?=implode(" ", $revenueTableData)?>
          </table>
        </div>
    </div>

    <div class="gs-row-padding gs-margin-bottom" style="padding:32px">
        <div class="chartjs-size-monitor">
          <div class="chartjs-size-monitor-expand">
            <div class=""></div>
          </div>
        </div>
        <canvas id="chart-line" style="display: block; width: 100%;" class="chartjs-render-monitor"></canvas>
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
<script>
	Chart.defaults.global.tooltips.custom = function(tooltip) {
	    var tooltipEl = document.getElementById('chartjspie-tooltip');
	    if (tooltip.opacity === 0) { tooltipEl.style.opacity = 0; return; }
	    tooltipEl.classList.remove('above', 'below', 'no-transform');
	    if (tooltip.yAlign) { tooltipEl.classList.add(tooltip.yAlign); }
	    else { tooltipEl.classList.add('no-transform'); }
	    function getBody(bodyItem) { return bodyItem.lines;  }
	    if (tooltip.body) {
		      var titleLines = tooltip.title || [];
		      var bodyLines = tooltip.body.map(getBody);
		      var innerHtml = '<thead>';
		      titleLines.forEach(function(title) {
		        innerHtml += '<tr><th>' + title + '</th></tr>';
		      });
		      innerHtml += '</thead><tbody>';
		      bodyLines.forEach(function(body, i) {
		        var colors = tooltip.labelColors[i];
		        var style = 'background:' + colors.backgroundColor;
		        style += '; border-color:' + colors.borderColor;
		        style += '; border-width: 2px';
		        var span = '<span class="chartjspie-tooltip-key" style="' + style + '"></span>';
		        innerHtml += '<tr><td>' + span + body + '</td></tr>';
		      });
		      innerHtml += '</tbody>';
		      var tableRoot = tooltipEl.querySelector('table');
		      tableRoot.innerHTML = innerHtml;
	    }
	    var positionY = this._chart.canvas.offsetTop;
	    var positionX = this._chart.canvas.offsetLeft;
	    tooltipEl.style.opacity = 1;
	    tooltipEl.style.left = positionX + tooltip.caretX + 'px';
	    tooltipEl.style.top = positionY + tooltip.caretY + 'px';
	    tooltipEl.style.fontFamily = tooltip._bodyFontFamily;
	    tooltipEl.style.fontSize = tooltip.bodyFontSize;
	    tooltipEl.style.fontStyle = tooltip._bodyFontStyle;
	    tooltipEl.style.padding = tooltip.yPadding + 'px ' + tooltip.xPadding + 'px';
	};
	var configPie = {
		type: 'pie',
		data: {
		  datasets: [{
		    data: [<?=implode(",",$pieChartData)?>], backgroundColor: [<?=implode(",",$revenueTableColors)?>] }],
		    labels: [<?=implode(",",$CategoryNames)?>]
		},
		options: {
		  responsive: true,
		  legend: { display: false },
		  tooltips: { enabled: false }
		}
	};
	var configGraph = {
		type: 'line',
		data: {
			  labels: [<?=implode(",",$OrderLabelArry)?>],
			  datasets: [
			  {
			    label: 'CASH PAYMENT',
			    fill: true,
			    backgroundColor: window.chartColors.green,
			    data: [<?=implode(",",$OrderCashArry)?>]
			  }, 
			  {
			    label: 'VISA PAYMENT',
			    fill: false,
			    backgroundColor: window.chartColors.blue,
			    borderColor: window.chartColors.blue,
			    data: [<?=implode(",",$OrderVisaArry)?>]
			  }, 
			  {
			    label: 'MASTER PAYMENT',
			    fill: false,
			    backgroundColor: window.chartColors.red,
			    borderColor: window.chartColors.red,
			    data: [<?=implode(",",$OrderMasterArry)?>]
			  }]
		},
		options: {
			  responsive: true,
			  title: {
			    display: true,
			    text: 'DAILY TOTAL PAYMENT GRAPH'
			  },
			  scales: { yAxes: [{ ticks: { callback: function(label, index, values) { return 'LKR ' +values[index]+'.00'; } } }] } 
		}
	};
	window.onload = function() {
		var pieChart = document.getElementById('chart-area').getContext('2d');
		var lineChart = document.getElementById('chart-line').getContext('2d');
		window.myPie = new Chart(pieChart, configPie);
		Chart.defaults.global.tooltips.enabled = false;
		window.myLine = new Chart(lineChart, configGraph);
	};
</script>

