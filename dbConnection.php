<?php
$db_host="localhost";
$db_user="u353209250_portfolio";
// $db_user="root";
$db_password="Kanchan@123...";
// $db_password="";
$db_name="u353209250_portfolio";
// $db_name="portfolio";
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