<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Single Blog Post</title>
    <link href="css/main.css" rel="stylesheet">
</head>
<body>


<div class="row">
    <div class="leftcolumn">

<?php
include('config.php');

if (isset($_GET['post_id'])) {
    $post_id = $_GET['post_id'];

    // Fetch the specific blog post using the post ID
    $query = "SELECT * FROM posts WHERE id = $post_id";  
    $result = mysqli_query($conn, $query);

    if ($row = mysqli_fetch_assoc($result)) {
        ?>
    
    <div class="card">
    <h2 style="text-align: center; font-size: 24px; color: #333; font-weight: bold; margin-bottom: 20px; background-color: lightblue; padding: 10px 0;"><?php echo $row['postTitle']; ?></h2>
    
    <br>
     
    
    <!-- Image with border -->
    <div style="display: flex; justify-content: center;">
        <img src="uploads/<?php echo $row['postImage']; ?>" alt="Description of the image" style="width: 500px; height: auto; border: 2px solid #333;">
    </div>

    <div style="text-align: left;">
        <p><?php echo $row['PostDescription']; ?></p>
        <p><?php echo nl2br($row['postContent']); ?></p>
    </div>
</div>

        <?php
    } else {
        echo "No post found";
    }
} else {
    echo "No post ID provided";
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

 

    </div>
</div>

<div class="footer">
    <?php
    include('includes/scripts.php');
    include('includes/footer.php');
    ?>
</div>

</body>
</html>
