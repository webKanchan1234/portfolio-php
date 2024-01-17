<?php
include("./dbConnection.php");
error_reporting(E_ALL);
ini_set('display_errors', 1);


if (isset($_REQUEST['submitMessage'])) {
    $us_name = $_REQUEST['name'];
    $u_email = $_REQUEST['email'];
    $u_mobile = $_REQUEST['mobile'];
    $u_subject = $_REQUEST['subject'];
    $u_message = $_REQUEST['message'];

    if ($us_name = "" || $u_email == "" || $u_mobile == "" || $u_subject == "" || $u_message == "") {
        $msg = "<div class='alert alert-warning mt-2'>All fields are required.</div>";
    } else {
        // $sql = "INSERT INTO messages_tb(message_name,message_email,message_mobile,message_subject,message_msg) VALUES('$u_name','$u_email', '$u_mobile', '$u_subject', '$u_message')";
        $sql = "INSERT INTO messages_tb (`message_uname`, `message_email`, `message_mobile`, `message_subject`, `message_msg`) VALUES ('$us_name', '$u_email', '$u_mobile', '$u_subject', '$u_message')";

        // $result = $connection->query($sql);

        $result = $conn->query($sql);

        if (!$result) {
            die('Error executing query: ' . $sql . ' - ' . $conn->error);
        }

        // Flush the output
        flush();



        if ($conn->query($sql) == TRUE) {

            $msg = "<h4 class='alert alert-success mt-1'>Message Send Successfully.</h4>";
        } else {

            $msg = "<div class='alert alert-danger mt-2'>Message Not Added  Successfully.</div>";
        }
    }
}

?>
<div class="container-fluid my-4" id="contact1">
    <div class='contacts'>
        <h3 id='about'> Contact us</h3>
        <div class="row justify-content-center">
            <div class="col col-lg-4">
                <form method="POST" class="bg p-2">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="area" class="form-control" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="mobile" class="form-label">Mobile</label>
                        <input type="text" class="form-control" name="mobile">
                    </div>
                    <div class="mb-3">
                        <label for="subject" class="form-label">Subject</label>
                        <input type="text" class="form-control" name="subject">
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Message</label>
                        <input type="area" class="form-control" name="message">
                    </div>

                    <button type="submit" name="submitMessage" class="btn btn-primary">Send Message</button>
                    <?php if (isset($msg)) {
                        echo $msg;
                    } ?>
                </form>
            </div>


        </div>
    </div>
</div>