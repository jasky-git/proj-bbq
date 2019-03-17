<?php
class ConnectionManager {


    public function getConnection() {
      //Issue
        // include 'configuration.php';
        // // $conn = new PDO("localhost:80","root","") or die(mysql_error());
        // $url  = "mysql:host={$server};dbname={$dbname}";
        // $conn = new PDO($url, $username, $password);
        // // $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // return $conn;

      include 'configuration.php';
      $url  = "mysql:host={$server};dbname={$dbname}";
      $conn = new PDO($url, $username, $password);
      // $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return $conn;
    }

}