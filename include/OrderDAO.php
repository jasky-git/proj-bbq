<?php

class OrderDAO {  
  public  function retrieveAll() {
    try {
      $sql = "select * from orders";
      $connMgr = new ConnectionManager();
      $conn = $connMgr->getConnection();
      $stmt = $conn->prepare($sql);
      $stmt->setFetchMode(PDO::FETCH_ASSOC);
      $stmt->execute();

      $result = array();
      while($row = $stmt->fetch()) {
        $result[] = new Order($row['orderid'], $row['cname'], $row['phone'], $row['email'], $row['startpoint'], $row['endpoint'], $row['delivery_date'], $row['delivery_time']);
      }

      return $result;
    } catch (Exception $e) {
      echo 'Caught Exception: ', $e->getMessage(), "\n";
    }
  }
  
  //Retrieve Order details base on Email
  public  function retrieve($email) {
    try {
      $res_array = array();

      $sql = "select * from orders where email=:email";
      $result = array();
      $connMgr = new ConnectionManager();
      $conn = $connMgr->getConnection();

      $stmt = $conn->prepare($sql);
      $stmt->setFetchMode(PDO::FETCH_ASSOC);
      $stmt->bindParam(':email', $email, PDO::PARAM_STR);
      $stmt->execute();

      if($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $result[] = new Order($row['orderid'], $row['cname'], $row['phone'], $row['email'], $row['startpoint'], $row['endpoint'], $row['delivery_date'], $row['delivery_time']);
        // var_dump($row);
        $res_array[] = $row;

        //Retrieve the records from orderdetails base on 'orderid'
        $orderid = $row['orderid'];
        $sql2 = "select * from orderdetails where orderid=:orderid";
        $result2 = array();

        $stmt2 = $conn->prepare($sql2);
        $stmt2->setFetchMode(PDO::FETCH_ASSOC);
        $stmt2->bindParam(':orderid', $orderid, PDO::PARAM_STR);
        $stmt2->execute();

        if($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)) {
          $result2[] = new Order($row2['orderid'], $row2['itemid1'], $row2['qty1'], $row2['itemid2'], $row2['qty2'], $row2['itemid3'], $row2['qty3'], $row2['itemid4'], $row2['qty4'], $row2['itemid5'], $row2['qty5'], $row2['remarks'], $row2['created_on']);

          $res_array[] = $row2;
        }
      }
      // var_dump($res_array);
      return $res_array;
    } catch (Exception $e) {
      echo 'Caught Exception: ', $e->getMessage(), "\n";
    }
  }
  
  //Retrieve Food item base on Name
  public  function retrieveFood($itemid) {
    try {
      $res_array = array();

      $sql = "select * from inventory where itemid=:itemid";
      $result = array();
      $connMgr = new ConnectionManager();
      $conn = $connMgr->getConnection2();

      $stmt = $conn->prepare($sql);
      $stmt->setFetchMode(PDO::FETCH_ASSOC);
      $stmt->bindParam(':itemid', $itemid, PDO::PARAM_STR);
      $stmt->execute();

      if($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $result[] = new Order($row['itemid'], $row['name'], $row['description'], $row['cost'], $row['qty'], $row['updated_on']);
      }
      // var_dump($res_array);
      return $result;
    } catch (Exception $e) {
      echo 'Caught Exception: ', $e->getMessage(), "\n";
    }
  }

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
