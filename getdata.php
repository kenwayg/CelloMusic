<?php



class Product{
public $db = null;

public function __construct(DBController $db){
    if (!isset($db->conn)) return null;
    $this->db = $db;
        # code...
}
// }
public function getData($table="album"){
   $result= $this->db->conn->query("SELECT * FROM ($table)  ");

    $resultArray = array();
    
    //fetch data one by one
    while($item=mysqli_fetch_assoc($result)){
        $resultArray[] =  $item;
    }
    return $resultArray;
}
public function getGall($table="songs"){
    $result= $this->db->conn->query("SELECT * FROM ($table) where song_creator = 'admin'  ");
 
     $resultArray = array();
     
     //fetch data one by one
     while($item=mysqli_fetch_array($result,MYSQLI_ASSOC)){
         $resultArray[] =  $item;
     }
     return $resultArray;
 }}

 
