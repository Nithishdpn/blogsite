<?php
session_start();
include('config.php');

if (isset($_POST['save'])) {
    $title = $_POST['postTitle'];
    $description = $_POST['PostDescription'];
    $content = $_POST['postContent'];
    $image = $_FILES['postImage']['name'];

    $allowed_extensions = array('gif', 'png', 'jpg', 'jpeg');
    $filename = $_FILES['postImage']['name'];
    $file_extension = pathinfo($filename, PATHINFO_EXTENSION);

    if (!in_array($file_extension, $allowed_extensions)) {
        $_SESSION['status'] = "You are allowed with only jpg, png, jpeg, and gif";
        header('Location: add_post.php');
        exit();
    }

    $query = "INSERT INTO posts (postTitle, PostDescription, postContent, postImage) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ssss", $title, $description, $content, $image);
        mysqli_stmt_execute($stmt);

        move_uploaded_file($_FILES["postImage"]["tmp_name"], "uploads/" . $_FILES["postImage"]["name"]);
        $_SESSION['status'] = "Data saved..";
        header('Location: add_post.php');
        exit();
    } else {
        $_SESSION['status'] = "Data not saved..";
        header('Location: add_post.php');
        exit();
    }
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $description = $_POST['PostDescription'];
    $title = $_POST['postTitle'];
    $content = $_POST['postContent'];

    $new_image = $_FILES['postImage']['name'];
    $old_image = $_POST['postImage_old'];

    if ($new_image != '') {
        $update_filename = $_FILES['postImage']['name'];
    } else {
        $update_filename = $old_image;
    }

    $query = "UPDATE posts SET postTitle=?, PostDescription=?, postContent=?, postImage=? WHERE id=?";
    $stmt = mysqli_prepare($conn, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ssssi", $title, $description, $content, $update_filename, $id);
        mysqli_stmt_execute($stmt);

        if ($_FILES['postImage']['name'] != '') {
            move_uploaded_file($_FILES["postImage"]["tmp_name"], "uploads/" . $_FILES["postImage"]["name"]);
            unlink("uploads/" . $old_image);
        }
        $_SESSION['status'] = "Post updated..";
        header('Location: editing.php');
        exit();
    } else {
        $_SESSION['status'] = "Post not updated..";
        header('Location: editing.php');
        exit();
    }
}
?>
