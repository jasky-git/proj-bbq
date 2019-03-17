<?php
// require_once 'include/common.php';
require_once 'include/Order.php';
require_once 'include/OrderDAO.php';
$dao = new OrderDAO();
$result = $dao->retrieveAll();

// var_dump($result);
// foreach($result as $detail) {
  // $detail;
// }

?>

<?php
  
  // $host = array('http://localhost:80/bbqorder');
  // $server = "localhost";
  // $username = "root";
  // $password = "";
  // $dbname = "bbqorder";
  // $port = 3306;
  // $url  = "mysql:host={$server};dbname={$dbname}";
  // $conn = new PDO($url, $username, $password);
  // $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // include 'include/ConnectionManager.php';
  // $sql = 'SELECT * FROM order';

  // $connMgr = new ConnectionManager();
  // $connx = $connMgr->getConnection();
  
  // // $connx = new mysqli("localhost", "root", "");
  // // if ($connx->connect_error) {
      // // die("Connection failed: " . $connx->connect_error);
  // // }
  // // echo "Connected successfully";

  // $stmt = $connx->prepare($sql);
  // $stmt->setFetchMode(PDO::FETCH_ASSOC);
  
  // $stmt->execute();
  // var_dump($stmt);
  // $result = array();
  
  // while($row = $stmt->fetch()) {
    // var_dump($row);
    // $result[] = new Order($row['orderid'], $row['cname'], $row['phone'], $row['email'], $row['startpoint'], $row['endpoint'], $row['delivery_date'], $row['delivery_time']);
  // }
  // var_dump($result);
  // return $result;
?>


<?php
  // $servername = "localhost";
  // $username = "root";
  // $password = "";

  // // Create connection
  // $conn = new mysqli($servername, $username, $password);

  // // Check connection
  // if ($conn->connect_error) {
      // die("Connection failed: " . $conn->connect_error);
  // }
  // echo "Connected successfully";
?>

<?php
  // $mysqli = new mysqli("localhost", "root", "");

  // /* check connection */
  // if (mysqli_connect_errno()) {
      // printf("Connect failed: %s\n", mysqli_connect_error());
      // exit();
  // }

  // $mysqli->select_db("bbqorder");
  // var_dump($mysqli);
  // /* return name of current default database */
  // if ($result = $mysqli->query("SELECT * FROM order")) {
    // $result = $mysqli->query("SELECT * FROM order");
    // var_dump($result);
    // $row = $result->fetch_row();
    // var_dump($row);
    // $i = 0;
    // while($i < 7){
      // $i++;
      // var_dump($row[i]);
    // }
    // $result->close();
  // }

      // printf("Default database is %s.\n", $row[0]);

  // } else {
    // var_dump("It failed...");
  // }

  // $mysqli->close();
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




          <table class="table table-striped">
            <!-- <thead> -->
              <tr>
                <th>Order Id</th>
                <th>Contact</th>
                <th>Email</th>
                <th>Startpoint</th>
                <th>Destination</th>
                <th>Delivery Date</th>
                <th>Delivery Time</th>
                <th></th>
              </tr>
            <!-- </thead> -->
            <?php
              // echo $result;
              foreach($result as $detail) {
                $detail;
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
