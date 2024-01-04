<?php
session_start(); 
session_destroy(); //destroy the session
define('TITLE','Logout');
define('PAGE','logout');
// include("includes/header.php");


echo "<script>location.href='../index.php';</script>"; //to redirect back to "index.php" after logging out
exit();
?>

<div class="col-sm-9 col-md-9 mt-5">
    log out
</div>





<?php
include("includes/footer.php")
?>