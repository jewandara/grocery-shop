<div class='content'>
    <div class='wrapper'>
        <div class='container'>
            <img alt='Grocery Shop Dashboard Text Logo' src='<?=$_DOMAIN?>images/text-logo-400.png'>
            <h4>Activate Account</h4>
            <?=($ERROR_MESSAGE != "")?$ERROR_MESSAGE:""?>
            <div class='option'>
              <a class='left tooltip-bottom' href='./resend_activation' data-tooltip='Please click this link to re-send your activation code.' >Resend Activation</a>
              <a class='right tooltip-bottom' href='./login' data-tooltip='Please click this link to login to your account.'>Login</a>
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