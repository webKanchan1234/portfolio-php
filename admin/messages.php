<?php
session_start();
include("../dbConnection.php");
define('TITLE','Messages');
define('PAGE','messages');
include("includes/header.php");

if(isset($_SESSION['is_admin'])){

}else{
    echo "<script>location.href='../index.php'; </script>";
}

if (isset($_REQUEST['delete'])) {
    $sql = "DELETE from messages_tb where message_id = {$_REQUEST['id']}";
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
            $sql = "SELECT * FROM messages_tb";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                echo '<table class="table table-striped table-bordered">
                

                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Mobile</th>
                            <th scope="col">Subject</th>
                            <th scope="col">Message</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>';
                while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td >' . $row["message_id"] .  '</td>';
                    echo '<td >' . $row["message_uname"] . '</td>';
                    echo '<td >' . $row["message_email"] . '</td>';
                    echo '<td >' . $row["message_mobile"] . '</td>';
                    echo '<td >' . $row["message_subject"] . '</td>';
                    echo '<td >' . $row["message_msg"] . '</td>';
                    echo '<td >';
                    echo '<form action="" method="DELETE" class="d-inline mr-2">';
                    echo '<input type="hidden" name="id" value=' . $row["message_id"] . '><button class="btn btn-warning" type="submit" name="delete" value="Delete"> <i class="far fa-eye"></i></buttton>';
                    echo '</form>';
                    echo '<form action="" method="DELETE" class="d-inline">';
                    echo '<input type="hidden" name="id" value=' . $row["message_id"] . '><button class="btn btn-secondary" type="submit" name="delete" value="Delete"> <i class="far fa-trash-alt "></i></buttton>';
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