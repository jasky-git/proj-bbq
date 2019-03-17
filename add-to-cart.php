<?php

require_once 'include/common.php';
require_once 'include/protect.php';

$dao = new OrderDAO();
$food = new Order();

if (isset($_GET['itemid'])) {
    $food = $dao->retrieveFood($_GET['itemid']);
} else if (isset($_POST['name'])) {
    $food->name = $_REQUEST['name'];
    $food->description = $_REQUEST['description'];
    $food->cost = $_REQUEST['cost'];
    $food->qty = $_REQUEST['quantity'];
}

// creating new cart item
$cartItem = new Order(); //Need to change this to cartitem also, create itemcart.php
$cartItem->itemid = $food->itemid;
$cartItem->name = $name;
$cartItem->description = $description;
$cartItem->cost = $cost;
// $cartItem->qty = $qty;
$cartItem->qty = 1;
$cartItem->updated_on = $updated_on;


if (isset ($_SESSION['cart'])) {
  $cart = $_SESSION['cart'];
  if (isset($cart[$food->itemid])) {
    // obtain existing cartItem and increase quantity
    $cartItem = $cart[$food->name];
    $cartItem->qty += 1;
  } else {
    // add new cart item to cart array
    $cart[$food->itemid] = $cartItem;
  }
} else {
  // creating new array of cart item to represent the shopping cart, and add
  // item into array
  // array is represented by isbn => cartItem, with the isbn as the key for
  // searching
  $cart = array ($food->itemid=>$cartItem);

}
// put the cart into the session
$_SESSION['cart'] = $cart;
$_REQUEST['food-item-added'] = $food;

include 'cart.php';
?>
