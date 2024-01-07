<?php
session_start();

include('includes/header.php');
include('includes/navbar.php');
include('config.php');
?>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-1 font-weight-bold text-primary" style="font-size: 18px;">ADD Post</h6>
        </div>
        <div class="card-body">

        <?php
        if(isset($_SESSION['status']) && $_SESSION['status'] != '') 
        {
         ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert" id="autoCloseAlert">
               <strong>Hey!</strong> <?php echo $_SESSION['status']; ?> 
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                 </button>
            </div>
        <?php
        unset($_SESSION['status']);
        ?>
        <script>
         // Automatically close the alert after 2 seconds
            window.setTimeout(function() {
            $("#autoCloseAlert").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove(); 
            });
            }, 2000);
          </script>
        <?php
        }
          ?>

         

            <form id="ssrForm" method="POST" action="code.php" enctype="multipart/form-data">
                <div class="scrollable-field" style="height: 430px; overflow-y: scroll; overflow-x: hidden;">
                    <div id="postForm">
                        <div class="form-group">
                            <label for="postTitle">Post Title:</label>
                            <input type="text" class="form-control" name="postTitle" id="postTitle" required>
                        </div>

                        <div class="form-group">
                            <label for="postTitle">Post Description</label>
                            <input type="text" class="form-control" name="PostDescription" id="PostDescription" required>
                        </div>

                        <div class="form-group">
                            <label for="postContent">Post Content:</label>
                            <textarea class="form-control" name="postContent" id="postContent" rows="5" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="postImage">Upload Image:</label>
                            <input type="file" class="form-control-file" name="postImage" id="postImage">
                        </div>
                    </div>
                </div>
                <div>
                    <button type="button" class="btn btn-primary" id="exitButton" style="margin-top: 9px;">Exit</button>
                    <button type="submit" name="save" class="btn btn-primary" style="margin-top: 9px;">Add Post</button>
                </div>
            </form>
        </div>
    </div>
</div>
