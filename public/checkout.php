<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/../boot.php';

echo 'Checkout page';

$discountCalculator = new Up\Catalog\DiscountCalculator();
$shippingCalculator = new Up\Delivery\ShippingCalculator();

var_dump($discountCalculator);
var_dump($shippingCalculator);