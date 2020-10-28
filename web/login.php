<div class='content'>
  <div class='wrapper'>
    <div class='container'>
      <br>
      <img alt='Grocery Shop Dashboard Text Logo' src='./images/text-logo-400.png'>
      <form class='form' id='login' name='login' action='<?=$_DOMAIN."login"?>' method='post' autocomplete='off'>
          <input type='text' id='user' name='username' placeholder='USERNAME' autocomplete='off'>
          <input type='password' id='pass' name='password' placeholder='PASSWORD' autocomplete='off'>
          <button type='submit' id='submit'>LOGIN</button>
      </form>
      <?=($ERROR_MESSAGE != '')?$ERROR_MESSAGE:''?>
      <div class='option'>
        <a class='left tooltip-bottom' href='<?=$_DOMAIN?>register' data-tooltip='Please click this link for new user .' >New Register</a>
        <a class='right tooltip-bottom' href='<?=$_DOMAIN?>forgot_password' data-tooltip='Please click this link to find your forgotten password.'>Forgot Password</a>
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