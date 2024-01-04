<?php
session_start();
include("../dbConnection.php");
define('TITLE', 'Add Skill');
define('PAGE', 'addSkill');
include("includes/header.php");

include('./adminInclude/header.php'); 
include('../dbConnection.php'); 

// if(isset($_SESSION['is_admin']))
// {
//     $is_admin= $_SESSION['is_admin'];
// }
// else{
//     echo "<script> location.href='../index.php';</script>";
// }

if(isset($_SESSION['is_admin'])){
    if(isset($_REQUEST['addSkill'])){
       
        if($_REQUEST['skill']=="" || $_REQUEST['percentage']==""){
            $msg= "<div class='alert alert-warning mt-2'>All fields are required.</div>";
        }else{
            $sql = "SELECT skill_name from skills_tb WHERE skill_name = '".$_REQUEST['skill']."' ";
            $result = $conn->query($sql);
            if($result->num_rows==1){
                $msg= "<div class='alert alert-danger mt-2'>Skill is already exist.</div>";
            }else{
                $skill = $_REQUEST['skill'];
                $percentage = $_REQUEST['percentage'];
    
                $sql = "INSERT INTO skills_tb(skill_name,skill_perc) VALUES('$skill','$percentage') ";
                if($conn->query($sql)==TRUE){
                  
                    $msg= "<h4 class='alert alert-success mt-1'>Skill Added Successfully.</h4>";
                }else{
                   
                    $msg= "<div class='alert alert-danger mt-2'>Skill Not Added  Successfully.</div>";
                }
            }
            
        }
    }
}else{
    echo "<script>location.href='../index.php'; </script>";
}



?>

<div class="col-sm-9 col-md-9 mt-5">
    <div class="row align-items-center">
        <div class="col-sm-4 " >
            <form method="POST" class="bg-info p-2">
                <div class="mb-3">
                    <label for="skill" class="form-label">Skill</label>
                    <input type="text" class="form-control" name="skill" >
                </div>
                <div class="mb-3">
                    <label for="percentage" class="form-label">Percentage</label>
                    <input type="text" class="form-control" name="percentage" >
                </div>
                
                <button type="submit" name="addSkill" class="btn btn-primary">Add Skill</button>
                <?php if(isset($msg)) {echo $msg;} ?>
            </form>
        </div>
    </div>
</div>





<?php
include("includes/footer.php")
?>