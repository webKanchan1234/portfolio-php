<?php
$db_host="localhost";
// $db_user="root";
// $db_password="";
// $db_name="portfolio";
$db_user="u353209250_portfolio";
$db_name="u353209250_portfolio";
$db_password="Kanchan@123...";
$db_port=3306;

// create connection
$conn = new mysqli($db_host,$db_user,$db_password,$db_name,$db_port);

// checking connection
if($conn->connect_error){
    die("Db connection error");
}else{
    // echo "Connected";
}


?>