<?php include 'bootstrap.php' ; ?>
<?php
if(isset($_SESSION['name'])){
  $user = $_SESSION['name'];
}

echo "
    <nav class='navbar navbar-dark navbar-expand-sm bg-dark'>
      <a class='navbar-brand' href='index.php'>
        <i class='fas fa-drumstick-bite'></i> BBQ-Pals
      </a>
      <!-- Links -->
      <ul class='navbar-nav'>
        <li class='nav-item'>
          <a class='nav-link' href='index.php'>Home</a>
        </li>
        <li class='nav-item'>
          <a class='nav-link' href='order.html'>Order</a>
        </li>
        <li class='nav-item'>
          <a class='nav-link' href='checkout.php'>Checkout</a>
        </li>
      </ul>
    </nav>
";
?>

