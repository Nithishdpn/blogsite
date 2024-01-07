<?php
session_start();
include('config.php'); 

include('includes/header.php'); 
include('includes/navbar.php'); 
?>


 
     
<div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-1 font-weight-bold text-primary" style="font-size: 18px;">Edit Post</h6>
            </div>
            <div class="card-body">

            <?php

            $query = "SELECT * FROM posts";
            $query_run = mysqli_query($conn, $query);

            ?>

                <form id="ssrForm" method="POST" action="display.php">
                    <div class="scrollable-field" style="height: 430px; overflow-y: scroll; overflow-x: hidden;">
                    <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Post ID</th>
                        <th>Post Title</th>
                        <th>Post Description</th>
                        <th>Post Content</th>
                        <th>Image</th>
                        <th>Action</th>
                         
                    </tr>
                </thead>
                <tbody id="postTableBody">
                    <?php
                      if(mysqli_num_rows($query_run) > 0) //record is there or not
                      {
                        foreach($query_run as $row)
                        {
                            //echo $row['id'];
                            ?>

                            <tr>
                                <td><?php echo $row['id'] ?></td>
                                <td><?php echo $row['postTitle'] ?></td>
                                <td><?php echo $row['PostDescription'] ?></td>
                                <td><?php echo $row['postContent'] ?></td>
                                <td>
                                    <img src="<?php echo "uploads/".$row['postImage']; ?>" width="20px" alt="Image">
                                </td>
                                <td>
                                    <a href="editing.php?id=<?php echo $row['id'] ?>" class="btn btn-info">Edit</a>
                                 
                                     
                                </td>
                            </tr>

                            <?php
                        }
                      }
                      else
                      {
                        ?>
                            <tr>
                                <td>No Record Found</td>
                            </tr>
                        <?php
                      }
                    ?>
                
                </tbody>
            </table>
                    </div>
                </form>
                <div>
                    <button type="button" class="btn btn-primary" id="exitButton" style="margin-top: 9px;">Exit</button>
                </div>
            </div>
        </div>
    </div>
    

            

  
<!-- /.container-fluid -->






 