<?php
  securePage($_SERVER['PHP_SELF']);
?>


<div class="gs-main" style="margin-left:250px;">
    <div id="myTop" class="gs-container gs-top gs-theme gs-large" style="padding:8.2px 10px">
      <p>
        <i class="fa fa-bars gs-button gs-teal gs-hide-large gs-xlarge" onclick="menuOpen()"></i>
        <span id="myIntro" class="gs-hide">GROCERY DASHBOARD</span>
      </p>
    </div>
    <header class="gs-container gs-theme" style="padding:32px 24px">
      <h1 class="gs-xxxlarge"><i class="fa fa-home"></i>DASHBOARD</h1>
    </header>

    <div class="gs-row-padding gs-margin-bottom" style="padding:32px">
      <div class="gs-quarter">
        <div class="gs-container gs-deep-purple gs-padding-16">
          <div class="gs-left"><i class="fa fa-shopping-cart gs-xxxlarge"></i></div>
          <div class="gs-right">
            <h3>52</h3>
          </div>
          <div class="gs-clear"></div>
          <h4>ORDERS</h4>
        </div>
      </div>
      <div class="gs-quarter">
        <div class="gs-container gs-purpole gs-padding-16">
          <div class="gs-left"><i class="fa fa-file-text gs-xxxlarge"></i></div>
          <div class="gs-right">
            <h3>99</h3>
          </div>
          <div class="gs-clear"></div>
          <h4>ITEMS</h4>
        </div>
      </div>
      <div class="gs-quarter">
        <div class="gs-container gs-deep-purple gs-padding-16">
          <div class="gs-left"><i class="fa fa-users gs-xxxlarge"></i></div>
          <div class="gs-right">
            <h3>23</h3>
          </div>
          <div class="gs-clear"></div>
          <h4>USERS</h4>
        </div>
      </div>
      <div class="gs-quarter">
        <div class="gs-container gs-purpole gs-text-white gs-padding-16">
          <div class="gs-left"><i class="fa fa-smile-o gs-xxxlarge"></i></div>
          <div class="gs-right">
            <h3>50</h3>
          </div>
          <div class="gs-clear"></div>
          <h4>CUSTOMERS</h4>
        </div>
      </div>
    </div>

    <div class="gs-row-padding" style="padding:30px">
        <div class="gs-third">
          <div id="canvas-holder" style="width: 300px;">
            <canvas id="chart-area" width="600" height="600" style="display: block; height: 300px; width: 300px;" class="chartjs-render-monitor"></canvas>
          </div>
          <script>
            Chart.defaults.global.tooltips.custom = function(tooltip) {
              // Tooltip Element
              var tooltipEl = document.getElementById('chartjs-tooltip');

              // Hide if no tooltip
              if (tooltip.opacity === 0) {
                tooltipEl.style.opacity = 0;
                return;
              }

              // Set caret Position
              tooltipEl.classList.remove('above', 'below', 'no-transform');
              if (tooltip.yAlign) {
                tooltipEl.classList.add(tooltip.yAlign);
              } else {
                tooltipEl.classList.add('no-transform');
              }

              function getBody(bodyItem) {
                return bodyItem.lines;
              }

              // Set Text
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
                  var span = '<span class="chartjs-tooltip-key" style="' + style + '"></span>';
                  innerHtml += '<tr><td>' + span + body + '</td></tr>';
                });
                innerHtml += '</tbody>';

                var tableRoot = tooltipEl.querySelector('table');
                tableRoot.innerHTML = innerHtml;
              }

              var positionY = this._chart.canvas.offsetTop;
              var positionX = this._chart.canvas.offsetLeft;

              // Display, position, and set styles for font
              tooltipEl.style.opacity = 1;
              tooltipEl.style.left = positionX + tooltip.caretX + 'px';
              tooltipEl.style.top = positionY + tooltip.caretY + 'px';
              tooltipEl.style.fontFamily = tooltip._bodyFontFamily;
              tooltipEl.style.fontSize = tooltip.bodyFontSize;
              tooltipEl.style.fontStyle = tooltip._bodyFontStyle;
              tooltipEl.style.padding = tooltip.yPadding + 'px ' + tooltip.xPadding + 'px';
            };

            var config = {
              type: 'pie',
              data: {
                datasets: [{
                  data: [300, 50, 100, 40, 10],
                  backgroundColor: [
                    window.chartColors.red,
                    window.chartColors.orange,
                    window.chartColors.yellow,
                    window.chartColors.green,
                    window.chartColors.blue,
                  ],
                }],
                labels: [
                  'Red',
                  'Orange',
                  'Yellow',
                  'Green',
                  'Blue'
                ]
              },
              options: {
                responsive: true,
                legend: {
                  display: false
                },
                tooltips: {
                  enabled: false,
                }
              }
            };

            function loadPie() {
              var ctx = document.getElementById('chart-area').getContext('2d');
              window.myPie = new Chart(ctx, config);
            }
          </script>
        </div>
        <div class="gs-twothird">
          <h5>Feeds</h5>
          <table class="gs-table gs-striped gs-white">
            <tr>
              <td><i class="fa fa-user gs-text-blue gs-large"></i></td>
              <td>New record, over 90 views.</td>
              <td><i>10 mins</i></td>
            </tr>
            <tr>
              <td><i class="fa fa-bell gs-text-red gs-large"></i></td>
              <td>Database error.</td>
              <td><i>15 mins</i></td>
            </tr>
            <tr>
              <td><i class="fa fa-users gs-text-yellow gs-large"></i></td>
              <td>New record, over 40 users.</td>
              <td><i>17 mins</i></td>
            </tr>
            <tr>
              <td><i class="fa fa-comment gs-text-red gs-large"></i></td>
              <td>New comments.</td>
              <td><i>25 mins</i></td>
            </tr>
            <tr>
              <td><i class="fa fa-bookmark gs-text-blue gs-large"></i></td>
              <td>Check transactions.</td>
              <td><i>28 mins</i></td>
            </tr>
            <tr>
              <td><i class="fa fa-laptop gs-text-red gs-large"></i></td>
              <td>CPU overload.</td>
              <td><i>35 mins</i></td>
            </tr>
            <tr>
              <td><i class="fa fa-share-alt gs-text-green gs-large"></i></td>
              <td>New shares.</td>
              <td><i>39 mins</i></td>
            </tr>
          </table>
        </div>
    </div>
    <hr>





    <script type="text/javascript">
    function dairlyReport() {
      var dataPoints = [];
      var stockChart = new CanvasJS.StockChart("stockChartContainer",{
        theme: "light4",
        colorSet: "colorSet2",
        exportEnabled: true, //false
        title:{ text:"Monthly Income Chart" },
        charts: [{
          axisX: { crosshair: { enabled: true } },
          axisY: {
            prefix: "LKR ",
            suffix: "K",
            title: "Orders Revenue in LKR",
            titleFontSize: 16
          },
          data: [{
            type: "area",
            xValueFormatString: "DD MMM YYYY",
            yValueFormatString: "LKR #,###.##M",
            dataPoints : dataPoints
          }]
        }],
        navigator: {
          slider: {
            minimum: new Date(2018, 03, 01),
            maximum: new Date(2018, 05, 01)
          }
        }
      });
      $.getJSON("sales.json", function(data) {
        for(var i = 0; i < data.length; i++){
          dataPoints.push({x: new Date(data[i].date), y: Number(data[i].sale)});
        }
        stockChart.render();
      });
    }
    </script>

    <div id="stockChartContainer" style="height: 600px; max-width: 95%; margin: 0px auto;"></div>
    <br>





  <style>
  canvas {
    -moz-user-select: none;
    -webkit-user-select: none;
    -ms-user-select: none;
  }
  .chart-container {
    width: 500px;
    margin-left: 40px;
    margin-right: 40px;
    margin-bottom: 40px;
  }
  .container {
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    justify-content: center;
  }
  </style>

  <div class="container">
  </div>

    <script type="text/javascript">

    function onLoadDairlyReport() {
      var dataPoints = [];
      var stockChart = new CanvasJS.StockChart("stockChartContainer",{
        theme: "light4",
        colorSet: "colorSet2",
        exportEnabled: true, //false
        title:{ text:"Monthly Income Chart" },
        charts: [{
          axisX: { crosshair: { enabled: true } },
          axisY: {
            prefix: "LKR ",
            suffix: "K",
            title: "Orders Revenue in LKR",
            titleFontSize: 16
          },
          data: [{
            type: "area",
            xValueFormatString: "DD MMM YYYY",
            yValueFormatString: "LKR #,###.##M",
            dataPoints : dataPoints
          }]
        }],
        navigator: {
          slider: {
            minimum: new Date(2018, 03, 01),
            maximum: new Date(2018, 05, 01)
          }
        }
      });
      $.getJSON("sales.json", function(data) {
        for(var i = 0; i < data.length; i++){
          dataPoints.push({x: new Date(data[i].date), y: Number(data[i].sale)});
        }
        stockChart.render();
      });
    }

    function createConfig(mode, intersect) {
      return {
        type: 'line',
        data: {
          labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
          datasets: [{
            label: 'My First dataset',
            borderColor: window.chartColors.red,
            backgroundColor: window.chartColors.red,
            data: [10, 30, 46, 2, 8, 50, 0],
            fill: false,
          }, {
            label: 'My Second dataset',
            borderColor: window.chartColors.blue,
            backgroundColor: window.chartColors.blue,
            data: [7, 49, 46, 13, 25, 30, 22],
            fill: false,
          }]
        },
        options: {
          responsive: true,
          title: {
            display: true,
            text: 'Mode: ' + mode + ', intersect = ' + intersect
          },
          tooltips: {
            mode: mode,
            intersect: intersect,
          },
          hover: {
            mode: mode,
            intersect: intersect
          },
        }
      };
    }

    function onLoadReportTables() {
      var container = document.querySelector('.container');

      [{
        mode: 'index',
        intersect: true,
      }, {
        mode: 'index',
        intersect: false,
      }, {
        mode: 'dataset',
        intersect: true,
      }, {
        mode: 'dataset',
        intersect: false,
      }, {
        mode: 'point',
        intersect: true,
      }, {
        mode: 'point',
        intersect: false,
      }, {
        mode: 'nearest',
        intersect: true,
      }, {
        mode: 'nearest',
        intersect: false,
      }, {
        mode: 'x',
        intersect: true
      }, {
        mode: 'x',
        intersect: false
      }, {
        mode: 'y',
        intersect: true
      }, {
        mode: 'y',
        intersect: false
      }].forEach(function(details) {
        var div = document.createElement('div');
        div.classList.add('chart-container');

        var canvas = document.createElement('canvas');
        div.appendChild(canvas);
        container.appendChild(div);

        var ctx = canvas.getContext('2d');
        var config = createConfig(details.mode, details.intersect);
        new Chart(ctx, config);
      });
    }

    window.onload = function() {
      loadPie();
      onLoadDairlyReport();
      onLoadReportTables();
    };
  </script>


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
