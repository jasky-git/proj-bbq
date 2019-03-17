<?php

class Order {
    // property declaration
    public $orderid;
    public $cname;
    public $phone;
    public $email;
    public $startpoint;
    public $endpoint;
    public $delivery_date;
    public $delivery_time;
    
    public $itemid1;
    public $qty1;
    public $itemid2;
    public $qty2;
    public $itemid3;
    public $qty3;
    public $itemid4;
    public $qty4;
    public $itemid5;
    public $qty5;
    public $remarks;
    public $created_on;

    public function __construct(){
        $argv = func_get_args();

        switch (func_num_args()){
            // case 1:
                // self::__construct0($argv[0],$argv[1]);
                // break;
            // case 3:
                // self::__construct0($argv[0],$argv[1], $argv[2]);
                // break;
            case 6:
                self::__construct1($argv[0],$argv[1],$argv[2],$argv[3],$argv[4],$argv[5]);
                break;
            case 8:
                self::__construct2($argv[0],$argv[1],$argv[2],$argv[3],$argv[4],$argv[5],$argv[6],$argv[7]);
                break;
            case 13:
                self::__construct3($argv[0],$argv[1],$argv[2],$argv[3],$argv[4],$argv[5],$argv[6],$argv[7],$argv[8],$argv[9],$argv[10],$argv[11],$argv[12]);
                
        }
    }
  
  public function __construct1($itemid='', $name='', $description='', $cost='', $qty='', $updated_on='') {
      $this->itemid = $itemid;
      $this->name = $name;
      $this->description = $description;
      $this->cost = $cost;
      $this->qty = $qty;
      $this->updated_on = $updated_on;
  }

  public function __construct2($orderid='', $cname='', $phone='', $email='', $startpoint='', $endpoint='', $delivery_date='', $delivery_time='') {
      $this->orderid = $orderid;
      $this->cname = $cname;
      $this->phone = $phone;
      $this->email = $email;
      $this->startpoint = $startpoint;
      $this->endpoint = $endpoint;
      $this->delivery_date = $delivery_date;
      $this->delivery_time = $delivery_time;
  }
  
  public function __construct3($orderid='', $itemid1='', $qty1='', $itemid2='', $qty2='', $itemid3='', $qty3='', $itemid4='', $qty4='', $itemid5='', $qty5='', $remarks='', $created_on='') {
      $this->orderid = $orderid;
      $this->itemid1 = $itemid1;
      $this->qty1 = $qty1;
      $this->itemid2 = $itemid2;
      $this->qty2 = $qty2;
      $this->itemid3 = $itemid3;
      $this->qty3 = $qty3;
      $this->itemid4 = $itemid4;
      $this->qty4 = $qty4;
      $this->itemid5 = $itemid15;
      $this->qty5 = $qty5;
      $this->remarks = $remarks;
      $this->created_on = $created_on;
  }
}

?>
