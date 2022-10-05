<?php

//Require Statement
require "./Database/DBController.php";
require "./Database/Product.php";
require "./Database/Cart.php";

// DBController Object
$db = new DBController();

//Product Object
$product = new Product($db);
$product_shuffle = $product->getData();

//Cart Object
$cart = new Cart($db);
