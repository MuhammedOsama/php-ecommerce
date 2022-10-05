<!--Header-->
<?php
ob_start();

//Include Header
include "./header.php";
?>

<!--Main-->
<?php

count($product->getData('cart')) ? include('Template/_cart-template.php') : include('Template/notFound/_cart_notFound.php');
count($product->getData('wishlist')) ? include('Template/_wishilist_template.php') : include('Template/notFound/_wishlist_notFound.php');

//Include New Phones
include "./Template/_new-phones.php";
?>

<!--Footer-->
<?php

//Include Footer
include "./footer.php";
?>
