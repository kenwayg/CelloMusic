<?php

class DBController
{


 protected $serverName = 'localhost';
 protected $userName = 'root';
 protected $password = '';
 protected $dbName = 'kenny';

 public $conn = null;

 public function __construct()
 {
$this->conn = mysqli_connect($this->serverName,$this->userName,$this->password,$this->dbName);
    if($this->conn->connect_error){
        echo "Fail".$this->conn->connect_error;
    }
  
}
public function __destruct(){
    $this->closeConnection();
}

//mysqli closing connection
protected function closeConnection(){
    if($this->conn != null){
        $this->conn->close();
        $this->conn = null;
        
    }
}
}