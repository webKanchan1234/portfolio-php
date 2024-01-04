<?php
session_start();
include("../dbConnection.php");
define('TITLE', 'Skills');
define('PAGE', 'skills');
include("includes/header.php");

if (isset($_SESSION['is_admin'])) {
} else {
    echo "<script>location.href='../index.php'; </script>";
}

if (isset($_REQUEST['delete'])) {
    $sql = "DELETE from skills_tb where skill_id = {$_REQUEST['id']}";
    if ($conn->query($sql) == TRUE) {
        echo '<meta http-equiv="refresh" content="0;URL=?deleted"/>';
    } else {
        echo "Unable to delete";
    }
}




?>

<div class="col-sm-9 col-md-9 mt-5">
    <div class="row align-items-center">
        <div class="col-sm-4 ">
            <?php
            $sql = "SELECT * FROM skills_tb";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                echo '<table class="table table-striped table-bordered">
                

                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Skill</th>
                            <th scope="col">Percentage</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>';
                while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td >' . $row["skill_id"] .  '</td>';
                    echo '<td >' . $row["skill_name"] . '</td>';
                    echo '<td >' . $row["skill_perc"] . '%</td>';
                    echo '<td >';
                    echo '<form action="" method="DELETE" class="d-inline mr-2">';
                    echo '<input type="hidden" name="id" value=' . $row["skill_id"] . '><button class="btn btn-warning" type="submit" name="delete" value="Delete"> <i class="far fa-eye"></i></buttton>';
                    echo '</form>';
                    echo '<form action="" method="DELETE" class="d-inline">';
                    echo '<input type="hidden" name="id" value=' . $row["skill_id"] . '><button class="btn btn-secondary" type="submit" name="delete" value="Delete"> <i class="far fa-trash-alt "></i></buttton>';
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