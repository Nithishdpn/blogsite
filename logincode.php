<?php
session_start();

include('config.php'); // Your database connection file

if (isset($_POST['login_btn'])) {
    $email = $_POST['emaill'];
    $password = $_POST['passwordd'];

    // To prevent SQL injection, you can use prepared statements
    $query = "SELECT * FROM users WHERE email=? AND password=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $email, $password); // Assuming password is stored in plaintext (unsafe)

    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // Valid login, set session and redirect
        $_SESSION['user'] = $email;
        header("Location: dashboard.php"); // Redirect to the dashboard after successful login
        exit();
    } else {
        $_SESSION['status'] = "Invalid credentials. Please try again.";
        header("Location: login.php"); // Redirect back to login page if login fails
        exit();
    }
} else {
    $_SESSION['status'] = "Login button not clicked.";
    header("Location: login.php"); // Redirect back to login page if form not submitted
    exit();
}
?>
