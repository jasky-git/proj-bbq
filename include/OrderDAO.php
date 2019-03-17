<?php
require_once "ConnectionManager.php";

class OrderDAO {

  public  function retrieveAll() {
    try {
      $sql = "select * from orders";

      $connMgr = new ConnectionManager();
      $conn = $connMgr->getConnection();

      // $connx = new mysqli("localhost", "root", "");
      // if ($connx->connect_error) {
          // die("Connection failed: " . $connx->connect_error);
      // }
      // echo "Connected successfully";

      $stmt = $conn->prepare($sql);
      $stmt->setFetchMode(PDO::FETCH_ASSOC);
      $stmt->execute();
      // var_dump($stmt);
      $result = array();
      while($row = $stmt->fetch()) {
        $result[] = new Order($row['orderid'], $row['cname'], $row['phone'], $row['email'], $row['startpoint'], $row['endpoint'], $row['delivery_date'], $row['delivery_time']);
      }
      // var_dump($result);
      return $result;
    } catch (Exception $e) {
      echo 'Caught Exception: ', $e->getMessage(), "\n";
    }
  }



    // $conn1 = mysqli_connect("localhost","root","") or die(mysql_error());
    // if (mysqli_connect_errno()){
      // echo "Failed to connect to MySQL: " . mysqli_connect_error();
    // }
    // mysqli_select_db($conn1, "bbqorder");
    // $query = "SELECT * FROM order";
    // $result = mysqli_query($conn1,$query);

    // var_dump($result);
    // mysqli_query()




      // $sql = 'SELECT * FROM orders';

      // $connMgr = new ConnectionManager();
      // $conn = $connMgr->getConnection();

      // mysql_select_db("bbqorder",$conn);
      // $query = "SELECT * FROM orderdetails";
      // // $result = array();
      // $stmt = mysql_query($query,$conn);
      // // var_dump($result);

      // // $stmt = $conn->prepare($sql);
      // $stmt->setFetchMode(PDO::FETCH_ASSOC);
      // $stmt->execute();
      // $result = array();
      // while($row = $stmt->fetch()) {
          // $result[] = new Order($row['orderid'], $row['cname'], $row['phone'], $row['email'], $row['startpoint'], $row['endpoint'], $row['delivery_date'], $row['delivery_time']);
      // }




      // $conn1 = mysql_connect("localhost","root","passw0rd") or die(mysql_error());
      // $conn2 = mysql_connect("localhost","root","passw0rd") or die(mysql_error());

      // mysql_select_db("asteriskcdrdb",$conn1);
      // mysql_select_db("pj8v2",$conn2);

      // $query = "SELECT * FROM cdr";
      // $result = mysql_query($query,$conn1);

      // var_dump($result);

      // $query2 = "SELECT * FROM tb_did_avalaible";
      // $result2 = mysql_query($query2,$conn2);

      // var_dump($result2);
      // return $result;
  // }



        // mysql_select_db("bbqorder",$conn);
        // $query = "SELECT * FROM bbqorder";
        // $result = mysql_query($query,$conn);

        // mysql_select_db("bbqinventory",$conn);
        // $query = "SELECT * FROM bbqinventory";
        // $result = mysql_query($query,$conn);

        // mysql_select_db("bbqpayment",$conn);
        // $query = "SELECT * FROM bbqpayment";
        // $result = mysql_query($query,$conn);



    // public function add($order) {
        // // insert into order db
        // $sql = 'insert into orders (customer_id) values (:customer_id)';

        // $connMgr = new ConnectionManager();
        // $conn = $connMgr->getConnection();

        // $stmt = $conn->prepare($sql);

        // $stmt->bindParam(':customer_id', $order->customerId, PDO::PARAM_STR);

        // $isAddOK = False;
        // if ($stmt->execute()) {
          // $isAddOK = True;
          // // obtain autoincrement order id from successful insert
          // $order->id = $conn->lastInsertId();
          // foreach ($order->cartItems as $cartItem) {
            // $sql = 'insert into order_items (order_id, book_id, quantity) values (:order_id, :book_id, :quantity)';

            // $stmt = $conn->prepare($sql);

            // $stmt->bindParam(':order_id', $order->id, PDO::PARAM_INT);
            // $stmt->bindParam(':book_id', $cartItem->isbn13, PDO::PARAM_STR);
            // $stmt->bindParam(':quantity', $cartItem->quantity, PDO::PARAM_STR);

            // $isAddOK = False;
            // if ($stmt->execute()) {
                // $isAddOK = True;
            // }
          // }

        // } // if insert into order successful
        // return $isAddOK;
    // }


    // not implemented as yet
/*

    public  function retrieveAll() {
        $sql = 'SELECT * FROM orders';


        $connMgr = new ConnectionManager();
        $conn = $connMgr->getConnection();

        $stmt = $conn->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();

        $result = array();

        while($row = $stmt->fetch()) {
            $result[] = new Order($row['id'], $row['customer_id']);
        }


        return $result;
    }

    public  function retrieve($isbn13) {
        $sql = 'select title, isbn13, price from orders where isbn13=:isbn13';
        $result = array();

        $connMgr = new ConnectionManager();
        $conn = $connMgr->getConnection();

        $stmt = $conn->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->bindParam(':isbn13', $isbn13, PDO::PARAM_STR);
        $stmt->execute();

        if($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $result = new Order($row['title'], $row['isbn13'], $row['price']);
        }

        return $result;
    }



    public function modify($order) {
        $sql = 'update orders set title=:title, price=:price where isbn13=:isbn13';

        $connMgr = new ConnectionManager();
        $conn = $connMgr->getConnection();

        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':title', $order->title, PDO::PARAM_STR);
        $stmt->bindParam(':isbn13', $order->isbn13, PDO::PARAM_STR);
        $stmt->bindParam(':price', $order->price, PDO::PARAM_STR);

        $stmt->execute();

    }


    public function remove($isbn13) {
        $sql = 'delete from orders where isbn13=:isbn13';

        $connMgr = new ConnectionManager();
        $conn = $connMgr->getConnection();

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':isbn13', $isbn13, PDO::PARAM_STR);

        $stmt->execute();
        $count = $stmt->rowCount();
    }

    */
} // class OrderDAO



?>
