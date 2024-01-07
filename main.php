<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link href="css/main.css" rel="stylesheet">
</head>
<body>

<div class="row">
    <div class="leftcolumn">
        <?php
        // Include your database connection file (config.php)
        include('config.php');

        // Fetch blog posts from the database
        $query = "SELECT * FROM posts"; 
        $result = mysqli_query($conn, $query);

        // Display fetched posts
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <div class="card">
                <h2><?php echo $row['postTitle']; ?></h2>
                <div style="display: flex; justify-content: center; align-items: center; height: 300px;">
                    <img src="uploads/<?php echo $row['postImage']; ?>" alt="Description of the image" style="max-height: 100%; max-width: 100%;">
                </div>

                <p><?php echo $row['PostDescription']; ?></p>
                <a href="submain.php<?php echo isset($row['id']) ? '?post_id=' . $row['id'] : ''; ?>" class="learn-more-btn" id="learnMoreBtn">Read More</a>



            </div>
            <?php
        }
        ?>
    </div>

    <div class="rightcolumn">
        <!-- Your right column content -->
        <div class="card">
            <h2>About Us</h2>
            <img src="img/img1.jpg" alt="image1" style="width: 300px;">

            <p>The Lagori committee passionately preserves the spirit of this traditional game, nurturing its legacy and fostering its joyous play among enthusiasts worldwide.</p>
        </div>
        <div class="card">
            <h3>Popular Post</h3>
            <div class="fakeimg"><img src="img/img2.jpg" alt="Image 1" style="width: 250px; height: auto;"></div><br>
           <div class="fakeimg"><img src="img/img4.jpg" alt="Image 2" style="width: 250px; height: auto;"></div><br>
          <div class="fakeimg"><img src="img/img5.jpg" alt="Image 3" style="width: 250px; height: auto;"></div>


        </div>

        <a href="login.php" class="admin-login-btn">Admin Login</a>

    </div>
</div>

<div class="footer">
    <?php
    include('includes/scripts.php');
    include('includes/footer.php');
    ?>

 
</div>


<style>.learn-more-btn {
    display: inline-block;
    text-align: center;
    padding: 8px 15px; /* Adjust padding to change button size */
    background-color: #3498db;
    color: #fff;
    text-decoration: none;
    border-radius: 3px;
    font-size: 14px; /* Adjust font size */
}

.learn-more-btn:hover {
    background-color: #2980b9;
}

/* Example styling for the admin login button */
.admin-login-btn {
    display: inline-block;
    padding: 8px 15px;
    background-color: #3498db;
    color: #fff;
    text-decoration: none;
    border-radius: 3px;
    font-size: 14px;
    margin-top: 20px; /* Adjust spacing as needed */
}

.admin-login-btn:hover {
    background-color: #2980b9;
}


</style>
</body>
</html>
