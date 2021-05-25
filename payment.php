<?php
require('paymentconfig.php');
?>
<form action="paymentsubmit.php" method="post">
    <script
    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
    data-key="<?php echo $privatekey; ?>"
    data-amount="2000000"
    data-name="dipronil das"
    data-description="dipronil das"
    data-image=""
    data-currency="inr"
    data-email="d@gmail.com"
    ></script>
</form>