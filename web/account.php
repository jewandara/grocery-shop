<?php
/*
securePage($_SERVER['PHP_SELF']);

echo "
<body>
<div id='wrapper'>
<div id='top'><div id='logo'></div></div>
<div id='content'>
<h1>UserCake</h1>
<h2>Account</h2>
<div id='left-nav'>";


echo "Hey, $loggedInUser->displayname.";


 This is an example secure page designed to demonstrate some of the basic features of UserCake. Just so you know, your title at the moment is $loggedInUser->title, and that can be changed in the admin panel. You registered this account on " . date("M d, Y", $loggedInUser->signupTimeStamp()) . ".
</div>
<div id='bottom'></div>
</div>
</body>
</html>";
*/
?>




    <script src="<?=$DOMAIN_PATH?>js/Chart.min.js"></script>
  <script src="<?=$DOMAIN_PATH?>js/utils.js"></script>



    <section class="rooms-section spad">
        <div class="container">
            <div class="row">
              <div class="container">
                <h4><?="Hey $loggedInUser->displayname,"?></h4>
                <p><?="($loggedInUser->title)"?> login to administration account.</p>            
                    <div style="width:90%;">
                      <canvas id="canvas"></canvas>
                    </div>
              </div>
            </div>
        </div>
    </section>






  <script>
    var randomScalingFactor = function() {
      return Math.round(Math.random() * 100);
    };

    var config = {
      type: 'line',
      data: {
        labels: [['June', '2015'], 'July', 'August', 'September', 'October', 'November', 'December', ['January', '2016'], 'February', 'March', 'April', 'May'],
        datasets: [{
          label: 'Web Login Members',
          fill: false,
          backgroundColor: window.chartColors.red,
          borderColor: window.chartColors.red,
          data: [
            randomScalingFactor(),
            randomScalingFactor(),
            randomScalingFactor(),
            randomScalingFactor(),
            randomScalingFactor(),
            randomScalingFactor(),
            randomScalingFactor(),
            randomScalingFactor(),
            randomScalingFactor(),
            randomScalingFactor(),
            randomScalingFactor(),
            randomScalingFactor()
          ]
        }, {
          label: 'Web Login Clients',
          fill: false,
          backgroundColor: window.chartColors.blue,
          borderColor: window.chartColors.blue,
          data: [
            randomScalingFactor(),
            randomScalingFactor(),
            randomScalingFactor(),
            randomScalingFactor(),
            randomScalingFactor(),
            randomScalingFactor(),
            randomScalingFactor(),
            randomScalingFactor(),
            randomScalingFactor(),
            randomScalingFactor(),
            randomScalingFactor(),
            randomScalingFactor()
          ],
        }]
      },
      options: {
        responsive: true,
        title: {
          display: true,
          text: 'Number Of User Registration Daily Chart'
        },
      }
    };

    window.onload = function() {
      var ctx = document.getElementById('canvas').getContext('2d');
      window.myLine = new Chart(ctx, config);
    };
  </script>