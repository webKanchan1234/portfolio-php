<?php
session_start();
include("../dbConnection.php");
define('TITLE','Add Projects');
define('PAGE','addProject');
include("includes/header.php");

if(isset($_SESSION['is_admin'])){

}else{
    echo "<script>location.href='../index.php'; </script>";
}

if(isset($_REQUEST['addProject'])){
    $title = $_REQUEST['title'];
    $github = $_REQUEST['github'];
    $url = $_REQUEST['url'];
    $description = $_REQUEST['description'];
    $image = $_FILES['image']['name'];
    $image_temp = $_FILES['image']['tmp_name'];
    $image_folder = "../images.php/".$image;
    move_uploaded_file($image_temp,$image_folder);


    if($title=="" || $github=="" || $url=="" || $description==""){
        $msg= "<div class='alert alert-warning mt-2'>All fields are required.</div>";
    }else{
        $sql = "INSERT INTO projects_tb(project_title,project_github,project_url,project_desc,project_image) VALUES('$title','$github', '$url', '$description', '$image' )";

        if($conn->query($sql)==TRUE){
            $msg= "<h4 class='alert alert-success mt-1'>Project Added Successfully.</h4>";
        }else{
            $msg= "<h4 class='alert alert-warning mt-1'>Project Not Added Successfully.</h4>";
        }
    }
}


?>


<div class="col-sm-9 col-md-9 mt-5">
    <div class="row align-items-center">
        <div class="col-sm-4 " >
            <form method="POST" class="bg-info p-2" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="title" class="form-label">Project Title</label>
                    <input type="text" class="form-control" name="title" >
                </div>
                <div class="mb-3">
                    <label for="github" class="form-label">GitHub URL</label>
                    <input type="text" class="form-control" name="github" >
                </div>
                <div class="mb-3">
                    <label for="url" class="form-label">Live URL</label>
                    <input type="text" class="form-control" name="url" >
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Project Description</label>
                    <input type="text" class="form-control" name="description" >
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Project Image</label>
                    <input type="file" class="form-control" name="image" >
                </div>
                
                <button type="submit" name="addProject" class="btn btn-primary">Add Project</button>
                <?php if(isset($msg)) {echo $msg;} ?>
            </form>
        </div>
    </div>
</div>





<?php
include("includes/footer.php")
?>