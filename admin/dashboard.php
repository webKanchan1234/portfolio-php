<?php
session_start();
include("../dbConnection.php");
define('TITLE', 'Dashboard');
define('PAGE', 'dashboard');
include("includes/header.php");
if (isset($_SESSION['is_admin'])) {
} else {
    echo "<script>location.href='../index.php'; </script>";
}
$sql = "SELECT * FROM skills_tb";
$result = $conn->query($sql);
$totalSkills = $result->num_rows;

$sql = "SELECT * FROM projects_tb";
$result = $conn->query($sql);
$totalProjects = $result->num_rows;

?>
<div class="col-sm-9 col-md-9">
    <div class="row text-center mx-5 text-white">
        <div class="col-sm-4 mt-5">
            <div class="card text-center bg-danger mb-3" style="max-width: 18rem;">
                <div class="card-header text-white">Projects</div>
                <div class="card-body">
                    <h4 class="card-title text-white"><?php echo $totalProjects ?></h4>
                    <a href="" class="btn text-white">view</a>
                </div>
            </div>
        </div>
        <div class="col-sm-4 mt-5">
            <div class="card text-center bg-success mb-3" style="max-width: 18rem;">
                <div class="card-header text-white">Skills</div>
                <div class="card-body">
                    <h4 class="card-title text-white"><?php echo $totalSkills ?></h4>
                    <a href="" class="btn text-white">view</a>
                </div>
            </div>
        </div>
        <div class="col-sm-4 mt-5">
            <div class="card text-center bg-info mb-3" style="max-width: 18rem;">
                <div class="card-header text-white">Projects</div>
                <div class="card-body">
                    <h4 class="card-title text-white">5</h4>
                    <a href="" class="btn text-white">view</a>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
include("includes/footer.php")
?>