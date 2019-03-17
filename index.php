<?php
require_once 'include/common.php';


if(isset($_POST['search'])) {
  $searchEmail = $_POST['search'];
  $dao = new OrderDAO();
  $result = $dao->retrieve($searchEmail);

  // var_dump($result);
  
  if($result == null) {
    $res = false;
    $searchResult = "No Record Found.";
  } else {
    $res = true;
  }
}

?>

<html>
  <head>
    <title>ProjectBBQ App</title>
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
      integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
      crossorigin="anonymous"
    />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
      integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
      integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
      crossorigin="anonymous"
    ></script>
    <script src="store.js" async></script>
  </head>

  <body>
    <?php include 'include/header.php';?>
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="text-center">
            <h1 class="display-4 text-center">
              <i class="fas fa-clipboard-list"></i>
              <span class="text-primary">Home</span>
            </h1>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col">
          <table class="table table-striped mt-5" id="foodTable"></table>
        </div>
      </div>

      <div class="row">
        <div class="col">
          <h2 class="mt-3">Order Details</h2>

          <!-- TEST -->

          <form action="index.php" method="post">
            <input type="text" name="search" placeholder="Search by Email"/>
            <input type="submit" name="submit" value=">>"/>
          </form>
          
          <?php
            echo $searchResult;
          ?>

          <table class="table table-striped">
            <tr>
              <th>Order Id</th>
              <th>Name</th>
              <th>Phone</th>
              <th>Email</th>
              <th>Startpoint</th>
              <th>Destination</th>
              <th>Delivery Date</th>
              <th>Delivery Time</th>
              <th></th>
            </tr>
            <?php
              if($res == true){
                //Retrieval of record
                foreach($result as $detail) {
                  echo "
                    <tr>
                        <td>$detail->orderid</td>
                        <td>$detail->cname</td>
                        <td>$detail->phone</td>
                        <td>$detail->email</td>
                        <td>$detail->startpoint</td>
                        <td>$detail->endpoint</td>
                        <td>$detail->delivery_date</td>
                        <td>$detail->delivery_time</td>
                    </tr>
                  ";
                }
              }
            ?>


            <tbody class="food-list">
              <div class="food-row">
                  <td><button class="btn btn-danger">Remove</button></td>
              </div>
            </tbody>
          </table>
          <div class="text-right">Total Price: $</div>
        </div>
      </div>
    </div>


  </body>
</html>
