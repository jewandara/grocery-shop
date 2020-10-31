
<?php
  securePage($_SERVER['PHP_SELF']); 
  //require_once($_FOLDER.'web/popup/add.new.item.php');
  //require_once($_FOLDER.'web/popup/add.new.item.php');
  //require_once($_FOLDER.'web/popup/add.new.item.php');
  //require_once($_FOLDER.'web/popup/add.new.item.php');
  //require_once($_FOLDER.'web/popup/add.new.item.php');
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


    <div id="pdf-section" style="display:none; font-family:'Segoe UI';float: left;padding: 10px;color:black">  
        <h2>London</h2>  
        <p>  
            London is the capital city of England. It is the most populous city in the United Kingdom,  
            with a metropolitan area of over 13 million inhabitants.  
        </p>  
        <p>  
            Standing on the River Thames, London has been a major settlement for two millennia,  
            its history going back to its founding by the Romans, who named it Londinium.  
        </p>  
    </div>  

  <div class="gs-panel">
    <div class="gs-row-padding" style="margin:0 -16px">
      <div class="gs-twothird">
        <table class="gs-table gs-white">
          <tr>
            <td><i class="fa fa-user gs-text-blue gs-large"></i></td>
            <td>User Report Monthly</td>
            <td><button class="gs-button-gird gs-button gs-light-grey gs-hover-black"><i class="fa fa-download"></i> Download Report</button></td>
          </tr>
          <tr>
            <td><i class="fa fa-bell gs-text-red gs-large"></i></td>
            <td>User Report Monthly</td>
            <td><div class="gs-button-gird gs-button gs-light-grey gs-hover-black"><i class="fa fa-download"></i> Download Report</div></td>
          </tr>
          <tr>
            <td><i class="fa fa-users gs-text-yellow gs-large"></i></td>
            <td>User Report Monthly</td>
            <td><div class="gs-button-gird gs-button gs-light-grey gs-hover-black"><i class="fa fa-download"></i> Download Report</div></td>
          </tr>
          <tr>
            <td><i class="fa fa-comment gs-text-red gs-large"></i></td>
            <td>User Report Monthly</td>
            <td><div class="gs-button-gird gs-button gs-light-grey gs-hover-black"><i class="fa fa-download"></i> Download Report</div></td>
          </tr>
          <tr>
            <td><i class="fa fa-bookmark gs-text-blue gs-large"></i></td>
            <td>User Report Monthly</td>
            <td><div class="gs-button-gird gs-button gs-light-grey gs-hover-black"><i class="fa fa-download"></i> Download Report</div></td>
          </tr>
          <tr>
            <td><i class="fa fa-laptop gs-text-red gs-large"></i></td>
            <td>User Report Monthly</td>
            <td><div class="gs-button-gird gs-button gs-light-grey gs-hover-black"><i class="fa fa-download"></i> Download Report</div></td>
          </tr>
          <tr>
            <td><i class="fa fa-share-alt gs-text-green gs-large"></i></td>
            <td>User Report Monthly</td>
            <td><div class="gs-button-gird gs-button gs-light-grey gs-hover-black"><i class="fa fa-download"></i> Download Report</div></td>
          </tr>
        </table>
      </div>
    </div>
  </div>


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
<script type="text/javascript">

  var doc = new jsPDF();
  var specialElementHandlers = {
      '#editor': function (element, renderer) {
          return true;
      }
  };

  $('.gs-button-gird').click(function () {   
      doc.fromHTML($('#pdf-section').html(), 15, 15, { 'width': 170, 'elementHandlers': specialElementHandlers });
      doc.save('sample-file.pdf');
  });


  //window.onload = function() { loadGridItems(); };
</script>
