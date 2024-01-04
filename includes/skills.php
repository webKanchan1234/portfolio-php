<?php
include("./dbConnection.php")
?>

<div class="container-fluid " id="skill1">
    <div class='skills' id='skills'>
        <h3 id='about'> Skills</h3>
        <div class="skill">
            <?php
            $sql = "SELECT * FROM skills_tb";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div id="skill">';
                    echo  '<div class="progress-stacked">';
                    echo '<div class="progress" role="progressbar" aria-label="Segment one" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100" style="width: '.$row["skill_perc"].'%">';
                    echo '<div class="progress-bar">'.$row["skill_name"].'</div>';
                    echo '</div>
    
                    </div>
                </div>';
                }
            }

            ?>
            
            

        </div>
    </div>
</div>