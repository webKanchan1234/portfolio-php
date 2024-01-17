<div class='projects' id='project1'>
    <h3 id='about'>Projects</h3>
    <div class="project">
        <?php
        $sql = "SELECT * FROM projects_tb";
        $result = $conn->query($sql);
        if ($result->num_rows > 0){
            while ($row = $result->fetch_assoc()){
                echo '<div class="card">';
                echo '<img src="images.php/'.$row["project_image"].'" style="height: 10rem;" class="card-img-top" alt="...">';
                echo '<div class="card-body">';
                echo '<div class="icons">';
                echo '<h5 id="title">'.$row["project_title"].'</h5>';
                echo '<div class="icon">';
                echo '<a href="'.$row["project_github"].'">';
                echo '<i id="icon1" class="fa-brands fa-github"></i>';
                echo '</a>';
                echo '<a href="'.$row["project_url"].'">';
                echo '<i id="icon1" class="fa-solid fa-globe"></i>';
                echo '</a>';
                echo '</div>';
                echo '</div>';
    
                echo '<p class="card-text">'.$row["project_desc"].' </p>';
                // echo '<button onclick="myFunction()" id="myBtn">Read more</button>';
                echo '</div>
            </div>';
            }
        }
        ?>
        
    </div>
</div>