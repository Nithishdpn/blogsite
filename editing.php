<?php
session_start();

include('includes/header.php');
include('includes/navbar.php');
include('config.php');
?>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-1 font-weight-bold text-primary" style="font-size: 18px;">EDIT Post</h6>
        </div>
        <div class="card-body">
            <?php
            $id = $_GET['id'];
            $query = "SELECT * FROM posts WHERE id='$id' ";
            $query_run = mysqli_query($conn, $query);

            if ($query_run) {
                $row = mysqli_fetch_assoc($query_run);
                if ($row) {
            ?>
                    <form id="ssrForm" method="POST" action="code.php" enctype="multipart/form-data">
                        <div class="scrollable-field" style="height: 430px; overflow-y: scroll; overflow-x: hidden;">
                            <div id="postForm">
                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
                                <div class="form-group">
                                    <label for="postTitle">Post Title:</label>
                                    <input type="text" class="form-control" name="postTitle" value="<?php echo $row['postTitle']; ?>" id="postTitle" required>
                                </div>

                                <div class="form-group">
                                    <label for="postTitle">Post Description</label>
                                    <input type="text" class="form-control" name="PostDescription" value="<?php echo $row['PostDescription']; ?>" id="PostDescription" required>
                                </div>


                                <div class="form-group">
                                    <label for="postContent">Post Content:</label>
                                    <textarea class="form-control" name="postContent" id="postContent" rows="5" required><?php echo $row['postContent']; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="postImage">Upload Image:</label>
                                    <input type="file" class="form-control-file" name="postImage" id="postImage">
                                    <input type="hidden" name="postImage_old" value="<?php echo $row['postImage']; ?>">
                                </div>
                                <img src="<?php echo "uploads/" . $row['postImage']; ?>" width="40px">
                            </div>
                        </div>
                        <div>
                            <button type="button" class="btn btn-primary" id="exitButton" style="margin-top: 9px;">Exit</button>
                            <button type="submit" name="update" class="btn btn-primary" style="margin-top: 9px;">Update Post</button>
                        </div>
                    </form>
            <?php
                } else {
                    echo '<script>window.location.href = "display.php";</script>';

                }
            } else {
                echo "Query failed: " . mysqli_error($conn);
            }
            ?>
        </div>
    </div>
</div>
