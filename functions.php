<?php

require ("config/dbh.php");
require ("getdata.php");
// require("index.php");
//DBController
$db =  new DBController();

//fetch object
$prod = new Product($db);
// $gall = new Gall($db);

