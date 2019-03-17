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
    
    
    // public function __construct(){
        // $argv = func_get_args();

        // switch (func_num_args()){
            // // case 2:
                // // self::__construct0($argv[0],$argv[1]);
                // // break;
            // // case 3:
                // // self::__construct0($argv[0],$argv[1], $argv[2]);
                // // break;
            // case 7:
                // self::__construct($argv[0],$argv[1],$argv[2],$argv[3],$argv[4],$argv[5],$argv[6]);
                // break;
            // case 8:
                // self::__construct($argv[0],$argv[1],$argv[2],$argv[3],$argv[4],$argv[5],$argv[6],$argv[7]);
        // }
    // }

    // public function __construct0($customerId='', $cartItems='') {
        // $this->customerId = $customerId;
        // $this->cartItems = $cartItems;
    // }

    // public function __construct1($id='', $customerId='', $cartItems='') {
        // $this->id = $id;
        // $this->customerId = $customerId;
        // $this->cartItems = $cartItems;
    // }
    public function __construct($orderid='', $cname='', $phone='', $email='', $startpoint='', $endpoint='', $delivery_date='', $delivery_time='') {
        $this->orderid = $orderid;
        $this->cname = $cname;
        $this->phone = $phone;
        $this->email = $email;
        $this->startpoint = $startpoint;
        $this->endpoint = $endpoint;
        $this->delivery_date = $delivery_date;
        $this->delivery_time = $delivery_time;
    }
    
    // public function __construct2($orderid='', $cname='', $phone='', $email='', $startpoint='', $endpoint='', $delivery_date='', $delivery_time='') {
        // $this->orderid = $orderid;
        // $this->cname = $cname;
        // $this->phone = $phone;
        // $this->email = $email;
        // $this->startpoint = $startpoint;
        // $this->endpoint = $endpoint;
        // $this->delivery_date = $delivery_date;
        // $this->delivery_time = $delivery_time;
    // }
}

?>
