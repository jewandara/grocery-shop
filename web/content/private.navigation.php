<nav class='gs-sidebar gs-bar-block gs-collapse gs-animate-left gs-card' style='z-index:3;width:250px;' id='menuSidebar'>
  <a class='gs-bar-item gs-button gs-border-bottom gs-large' >
    <img src='<?=$_DOMAIN?>images/trans-text-logo.png'> 
    <i class='fa fa-remove' onclick='menuClose()'></i>
  </a>
  <div class="sidenav">
    <button class="dropdown-btn"><i class="fa fa-user-circle-o" ></i> <?=$loggedInUser->username?>
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-container">
      <a href='<?=$_DOMAIN?>settings'><i class='fa fa-cogs'></i> Settings</a>
      <a href='<?=$_DOMAIN?>logout'><i class='fa fa-sign-out'></i> Logout</a>
    </div>
  </div>

<!--
  <a class='gs-bar-item gs-button gs-teal' href='<?=$_DOMAIN."dashboard"?>'>&nbsp;<i class='fa fa-home'></i>&nbsp;&nbsp;  DASHBOARD</a>
  <a class='gs-bar-item gs-button' href='<?=$_DOMAIN."orders"?>'>&nbsp;<i class='fa fa-shopping-cart'></i>&nbsp;&nbsp; ORDERS</a>
  <a class='gs-bar-item gs-button' href='<?=$_DOMAIN."items"?>'>&nbsp;<i class='fa fa-file-text'></i>&nbsp;&nbsp; ITEMS</a>
  <a class='gs-bar-item gs-button' href='<?=$_DOMAIN."users"?>'>&nbsp;<i class='fa fa-users'></i>&nbsp;&nbsp; USERS</a>
  <a class='gs-bar-item gs-button' href='<?=$_DOMAIN."customers"?>'>&nbsp;<i class='fa fa-smile-o'></i>&nbsp;&nbsp; CUSTOMERS</a>
  <a class='gs-bar-item gs-button' href='<?=$_DOMAIN."pages"?>'>&nbsp;<i class='fa fa-file-code-o'></i>&nbsp;&nbsp; PAGES</a>
  <a class='gs-bar-item gs-button' href='<?=$_DOMAIN."permissions"?>'>&nbsp;<i class='fa fa-unlock-alt'></i>&nbsp;&nbsp; PERMISSIONS</a>
  <a class='gs-bar-item gs-button' href='<?=$_DOMAIN."reports"?>'>&nbsp;<i class='fa fa-line-chart'></i>&nbsp;&nbsp; REPORTS</a>
  <a class='gs-bar-item gs-button' href='<?=$_DOMAIN."settings"?>'>&nbsp;<i class='fa fa-cogs'></i>&nbsp;&nbsp; SETTINGS</a>
  <a class='gs-bar-item gs-button' href='<?=$_DOMAIN."configurations"?>'>&nbsp;<i class='fa fa-desktop'></i>&nbsp;&nbsp; CONFIGURATIONS</a> 
-->
 
  <?php
    $set = 1;
    foreach ($_MENU as $link => $code) {
      if( ($set) and ( 
        (empty($_URL[$_PATH_ARRY_COUNT])) or 
        ($_URL[$_PATH_ARRY_COUNT] =="") or 
        ($_URL[$_PATH_ARRY_COUNT] =="index") or 
        ($_URL[$_PATH_ARRY_COUNT] =="home") or 
        ($_URL[$_PATH_ARRY_COUNT] =="account") 
      ) ){
        $set = 0;
        echo "<a class='gs-bar-item gs-button gs-teal' href='".$_DOMAIN."dashboard'>&nbsp;<i class='fa fa-home'></i>&nbsp;&nbsp;  DASHBOARD</a>";
      }
      else if( ($_URL[$_PATH_ARRY_COUNT] == $link) or ($_URL[$_PATH_ARRY_COUNT] == $link.'s') ){
        switch ($_URL[$_PATH_ARRY_COUNT]) {
          case 'dashboard': echo "<a class='gs-bar-item gs-button gs-teal' href='".$_DOMAIN."dashboard'>&nbsp;<i class='fa fa-home'></i>&nbsp;&nbsp;  DASHBOARD</a>"; break;
          case 'orders': echo "<a class='gs-bar-item gs-button gs-teal' href='".$_DOMAIN."orders'>&nbsp;<i class='fa fa-shopping-cart'></i>&nbsp;&nbsp;  ORDERS</a>"; break;
          case 'order': echo "<a class='gs-bar-item gs-button gs-teal' href='".$_DOMAIN."orders'>&nbsp;<i class='fa fa-shopping-cart'></i>&nbsp;&nbsp;  ORDERS</a>"; break;
          case 'items': echo "<a class='gs-bar-item gs-button gs-teal' href='".$_DOMAIN."items'>&nbsp;<i class='fa fa-file-text'></i>&nbsp;&nbsp;  ITEMS</a>"; break;
          case 'item': echo "<a class='gs-bar-item gs-button gs-teal' href='".$_DOMAIN."items'>&nbsp;<i class='fa fa-file-text'></i>&nbsp;&nbsp;  ITEMS</a>"; break;
          case 'customers': echo "<a class='gs-bar-item gs-button gs-teal' href='".$_DOMAIN."customers'>&nbsp;<i class='fa fa-smile-o'></i>&nbsp;&nbsp; CUSTOMERS</a>"; break;
          case 'customer': echo "<a class='gs-bar-item gs-button gs-teal' href='".$_DOMAIN."customers'>&nbsp;<i class='fa fa-smile-o'></i>&nbsp;&nbsp; CUSTOMERS</a>"; break;
          case 'users': echo "<a class='gs-bar-item gs-button gs-teal' href='".$_DOMAIN."users'>&nbsp;<i class='fa fa-users'></i>&nbsp;&nbsp;  USERS</a>"; break;
          case 'user': echo "<a class='gs-bar-item gs-button gs-teal' href='".$_DOMAIN."users'>&nbsp;<i class='fa fa-users'></i>&nbsp;&nbsp;  USERS</a>"; break;
          case 'reports': echo "<a class='gs-bar-item gs-button gs-teal' href='".$_DOMAIN."reports'>&nbsp;<i class='fa fa-line-chart'></i>&nbsp;&nbsp; REPORTS</a>"; break;
          case 'report': echo "<a class='gs-bar-item gs-button gs-teal' href='".$_DOMAIN."reports'>&nbsp;<i class='fa fa-line-chart'></i>&nbsp;&nbsp; REPORTS</a>"; break;
          case 'permissions': echo "<a class='gs-bar-item gs-button gs-teal' href='".$_DOMAIN."permissions'>&nbsp;<i class='fa fa-unlock-alt'></i>&nbsp;&nbsp; PERMISSIONS</a>"; break;
          case 'permission': echo "<a class='gs-bar-item gs-button gs-teal' href='".$_DOMAIN."permissions'>&nbsp;<i class='fa fa-unlock-alt'></i>&nbsp;&nbsp; PERMISSIONS</a>"; break;
          case 'pages': echo "<a class='gs-bar-item gs-button gs-teal' href='".$_DOMAIN."pages'>&nbsp;<i class='fa fa-file-code-o'></i>&nbsp;&nbsp; PAGES</a>"; break;
          case 'page': echo "<a class='gs-bar-item gs-button gs-teal' href='".$_DOMAIN."pages'>&nbsp;<i class='fa fa-file-code-o'></i>&nbsp;&nbsp; PAGES</a>"; break;
          case 'configurations': echo "<a class='gs-bar-item gs-button gs-teal' href='".$_DOMAIN."configurations'>&nbsp;<i class='fa fa-desktop'></i>&nbsp;&nbsp; CONFIGURATIONS</a>"; break;
          case 'configuration': echo "<a class='gs-bar-item gs-button gs-teal' href='".$_DOMAIN."configurations'>&nbsp;<i class='fa fa-desktop'></i>&nbsp;&nbsp; CONFIGURATIONS</a>"; break;
          case 'settings': echo "<a class='gs-bar-item gs-button gs-teal' href='".$_DOMAIN."settings'>&nbsp;<i class='fa fa-cogs'></i>&nbsp;&nbsp; SETTINGS</a>"; break;
          case 'setting': echo "<a class='gs-bar-item gs-button gs-teal' href='".$_DOMAIN."settings'>&nbsp;<i class='fa fa-cogs'></i>&nbsp;&nbsp; SETTINGS</a>"; break;
          default:
            echo "$code";
            break;
        }
      }
      else{ echo "$code"; }
    }
  ?>


  <a class='gs-bar-item gs-button gs-hide-large gs-large' href='javascript:void(0)' style='border-top: 1px solid #ccc' onclick='menuClose()'>
    Close <i class='fa fa-remove'></i>
  </a>
</nav>
<script type="text/javascript"> loadSideBarUserFunction(); </script>
<div class='gs-overlay gs-hide-large gs-animate-opacity' onclick='menuClose()' style='cursor:pointer' id='menuOverlay'></div>
