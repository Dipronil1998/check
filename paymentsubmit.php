<?php
require('paymentconfig.php');
\Stripe\Stripe::setVerifySslCerts(false);

$token=$_POST['stripeToken'];

$data=\Stripe\Charge::create(array(
    "amount"=>2000000,
    "currency"=>"inr",
    "description"=>"dipronil",
    "source"=>$token,

));

echo "<pre>";
print_r($data);
?>