
<div class='content'>
  <div class='wrapper'>
    <div class='container'>
      <br>
      <img alt='Grocery Shop Dashboard Text Logo' src='./images/text-logo-400.png'>
      <form class='form' id='forgot_password' name='forgot_password' action='<?=$_DOMAIN."forgot_password"?>' method='post'>
        <input type='text' name='username' placeholder='Type your username here' class="form-control" >
        <input type='email' name='email' placeholder='Type your email here' class="form-control" >
        <button type='submit' id='submit'>RESET PASSWORD</button>
      </form>
      <?=($ERROR_MESSAGE != '')?$ERROR_MESSAGE:''?>
      <div class='option'>
       <!--  <a class='left tooltip-bottom' href='<?=$_DOMAIN?>register' data-tooltip='Please click this link for new user .' >New Register</a> -->
        <a class='left tooltip-bottom' href='<?=$_DOMAIN?>login' data-tooltip='Please click this link to login.'>Login</a>
      </div>
    </div>
    <ul class='bg-bubbles'>
      <li></li> <li></li> <li></li> <li></li> <li></li> <li></li> <li></li> <li></li> <li></li> <li></li>
      <li></li> <li></li> <li></li> <li></li> <li></li> <li></li> <li></li> <li></li> <li></li> <li></li>
    </ul>
  </div>
</div>
<script type="text/javascript">
  window.onload = function() { loadBubbles(); };
</script>