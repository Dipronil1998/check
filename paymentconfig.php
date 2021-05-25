<?php
require('stripe-php-master/init.php');
$privatekey="pk_test_51ItDh5SCcDIB6sPAbL8GRwgtPJ0Zd8evJP2E8YdGolIA82XKoE77kPvmsWigzafYl7JcoWCfXGaBUl6RMWQIoAZp00xsqx8mAv";
$secretkey="sk_test_51ItDh5SCcDIB6sPAvm2cKyUlbYmyMOaR2xTko4HLS2c9bS2RREN70VOVkNY8epB2FIQvP5gsYVhslSaZ4lRMSeTE003QYgtOc5";

\Stripe\Stripe::setApiKey($secretkey);
?>