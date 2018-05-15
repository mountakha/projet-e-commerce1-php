

<?php include 'header.php'; ?>




<div id="userLOL" style="background:white;width:100%;height:750px;">

<div class="page-header">
<div class="container" style="padding-top:60px;"> 
<h1>Choisissez votre moyen de payement</h1>

<form action="sandbox.paypal.com/cgi-bin/webscr" method="post"  >
    
<inupt name="amount" type="hidden" value="10" /> 
<inupt name="currency_code" type="hidden" value="EUR" /> 
<inupt name="shipping" type="hidden" value="0.00" /> 
<inupt name="tax" type="hidden" value="0.00" /> 
<inupt name="return" type="hidden" value="http://88.122.237.107/Paypal/success.php" />
<inupt name="cancel_return" type="hidden" value="http://88.122.237.107/Tuto/Paypal/cancel.php" />
<inupt name="notify_url" type="hidden" value="http://88.122.237.107/Tuto/Paypal/ipn.php" /> 
<inupt name="cmd" type="hidden" value="_xclick" /> 
<inupt name="business" type="hidden" value="sell_1303066606_ountakha@hotmail.com" /> 
<inupt name="item_name" type="hidden" value="compte premium" />
   <inupt name="no_note" type="hidden" value="1" />
   <inupt name="lc" type="hidden" value="FR" />
   <inupt name="bn" type="hidden" value="PP-BuyNowBF" />
   <inupt name="custom" type="hidden" value="user_id=1" />
        
    <button  type="submit" value=" "  class="btn primary">validez </button>
    
    
    
</form>
</div>
</div>

</div>

<?php include 'footer.php'; ?>
