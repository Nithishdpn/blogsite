<?php
session_start();
include('config.php'); 


if(isset($_POST['save']))
{
    $title = $_POST['postTitle'];
    $content = $_POST['postContent'];
    $image = $_FILES['postImage']['name'];

    $allowed_exttension = array('gif', 'png', 'jpg', 'jpeg');
    $filename = $_FILES['postImage']['name'];
    $file_extension = pathinfo($filename, PATHINFO_EXTENSION);

    if(!in_array($file_extension, $allowed_exttension))
    {
        $_SESSION['status'] = "You are allowed with only jpg, png, jpeg and gif";
    }
    else
    {
        if(file_exists("uploads/" .$_FILES['postImage']['name']))
        {
            $filename = $_FILES['postImage']['name'];
            $_SESSION['status'] = "Image alredy Exists" .$filename;
            header('Location: editing.php');
        }
    else{

    $query = "INSERT INTO posts (postTitle, postContent, postImage) VALUES (' $title', '$content', '$image')";

    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        move_uploaded_file($_FILES["postImage"]["tmp_name"], "uploads/".$_FILES["postImage"]["name"]);
        $_SESSION['status'] = "Data saved..";
        header('Location: add_post.php');
    }

    else
    {
        $_SESSION['status'] = "Data not saved..";
        header('Location: add_post.php');
    }
}

    }

} 


if(isset($_POST['update']))
{
    $id = $_POST['id'];
    $title = $_POST['postTitle'];
    $content = $_POST['postContent'];

    $new_image = $_FILES['postImage']['name'];
    $old_image = $_FILES['postImage_old'];

    if($new_image != '')
    {
        $update_filename = $_FILES['postImage']['name'];
    }
    else
    {
        $update_filename = $old_image;  
    }

    if(file_exists("uploads/" .$_FILES['postImage']['name']))
    {
        $filename = $_FILES['postImage']['name'];
        $_SESSION['status'] = "Image alredy Exists" .$filename;
        header('Location: editing.php');
    }
    else
    {
        $query = "UPDATE posts SET postTitle='$title', postContent='$content', postImage='$update_filename' WHERE id='$id' ";
        $query_run = mysqli_query($conn, $query);

        if($query_run)
        {
            if($_FILES['postImage']['name'] != '')
            {
                move_uploaded_file($_FILES["postImage"]["tmp_name"], "uploads/".$_FILES["postImage"]["name"]);
                unlink("uploads/".$old_image);
            }
            $_SESSION['status'] = "Image updated..";
            header('Location: editing.php');
        }
        else{
            $_SESSION['status'] = "Image not updated..";
            header('Location: editing.php');
        }
    }

}






?>