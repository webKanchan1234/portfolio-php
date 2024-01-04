<?php
session_start();
include("../dbConnection.php");
define('TITLE','Projects');
define('PAGE','projects');
include("includes/header.php");
if(isset($_SESSION['is_admin'])){

}else{
    echo "<script>location.href='../index.php'; </script>";
}

if (isset($_REQUEST['delete'])) {
    $sql = "DELETE from projects_tb where project_id = {$_REQUEST['id']}";
    if ($conn->query($sql) == TRUE) {
        echo '<meta http-equiv="refresh" content="0;URL=?deleted"/>';
    } else {
        echo "Unable to delete";
    }
}


?>


<div class="col-sm-9 col-md-9 mt-5">
    <div class="row align-items-center">
        <div class="col-sm-12 ">
            <?php
            $sql = "SELECT * FROM projects_tb";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                echo '<table class="table table-striped table-bordered">
                

                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col" col="5">Project Title</th>
                            <th scope="col" col="5">Description</th>
                            <th scope="col">GitHub</th>
                            <th scope="col">Url</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>';
                while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td >' . $row["project_id"] .  '</td>';
                    echo '<td >' . $row["project_title"] . '</td>';
                    echo '<td >' . $row["project_desc"] . '</td>';
                    echo '<td >';
                    echo '<a class="navbar-brand" href="' . $row["project_github"] . '">url</a>' ;
                    echo '</td>';
                    echo '<td >';
                    echo '<a class="navbar-brand" href="' . $row["project_url"] . '">url</a>' ;
                    echo '</td>';
                    
                    echo '<td >';
                    echo '<form action="" method="DELETE" class="d-inline mr-3">';
                    echo '<input type="hidden" name="id" value=' . $row["project_id"] . '><button class="btn btn-warning" type="submit" name="delete" value="Delete"> <i class="far fa-eye"></i></buttton>';
                    echo '</form>';
                    echo '<form action="" method="DELETE" class="d-inline mr-3">';
                    echo '<input type="hidden" name="id" value=' . $row["project_id"] . '><button class="btn btn-secondary" type="submit" name="delete" value="Delete"> <i class="far fa-trash-alt "></i></buttton>';
                    echo '</form>';
                    '</td>';

                    echo '</tr>';
                }
                echo '</tbody>';
                '</table>';
            }

            ?>

        </div>
    </div>
</div>





<?php
include("includes/footer.php")
?>