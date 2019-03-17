<?php
require_once 'include/common.php';

if (isset ($_SESSION['cart'])) {
  $cart = $_SESSION['cart'];
} 
?>

<html>
    <head>
      <title>ProjectBBQ App</title>
      <link
        rel="stylesheet"
        href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
        crossorigin="anonymous"/>
      <link
        rel="stylesheet"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
        crossorigin="anonymous"/>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script
        src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
        integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
        crossorigin="anonymous"></script>
      <script
        src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
        integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
        crossorigin="anonymous"></script>
      <script src="store.js" async></script>
    </head>
    
    <body>
     
    
        <?php include 'include/header.php' ?>
        
        <div class="container">
        <h1>Cart</h1>
  <?php            
      if (isset($cart)) {
  ?>
          <div class="row">
            <div class="col-md-6">
              <table class='table table-striped' id='cart-list' border='1'>
                  <tr>
                      <th>No.</th>
                      <th>Item Id</th>
                      <th>Description</th>
                      <th>Cost</th>
                      <th>Quantity</th>
                      <th>Amount</th>
                  </tr>
  <?php
            $count = 1;
            $total = 0.0;
            foreach($cart as $cartItem) {
                $cur_food = $cartItem->food;
                $amount = ($cur_food->cost)*($cartItem->qty);
                $amount = number_format($amount, 2);
                $total += $amount;
                $total = number_format($total, 2);

                echo "
                <tr>
                    <td>$count</td>
                    <td>$cur_food->itemid</td>
                    <td>$cur_food->description</td>
                    <td>$cur_food->cost</td>
                    <td>$cartItem->qty</td>
                    <td>$amount</td>
                </tr>
                ";
                
                $count++;
            } // foreach
  ?>
                  <tr>
                      <td colspan="4" align="right">Total</td>
                      <td><?=$total?></td>
                  </tr>
              </table>
            </div> <!-- col-md-6 -->
           </div> <!-- row -->
  <?php
          } else {
            // no cart added yet
            echo "
            <div class='row'>
              <div class='col-md-6 alert alert-info' role='alert'>You have not added anything to the cart.</div>
            </div>
            ";
          }

  ?>
  <?php
        //need change this array to foodlist
        if (isset($foodlist)) {
          echo "
          <div class='row'>
            <div class='col-md-6 alert alert-success' role='alert'>$book->title added to cart</div>
          </div>
          ";
        }
  ?>
        <br \>
          <div class="row">
            <!-- checkout page to payment confirmation -->
            <form action="checkout.php"> <!-- need to add checkout page -->
              <input class="btn btn-primary" type="submit" value="Checkout" />
              <input class="btn btn-primary" type="button" value="Continue Shopping" onclick="window.location.href='order.html'" />
            </form>
          </div>
        </div> <!-- container -->
    </body>
</html>
