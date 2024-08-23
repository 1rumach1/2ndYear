<?php
session_start();
// CONNECTION FILE
include "conn.php";
// QUERY FOR ADMIN LOG IN
if (isset($_POST["user_name"]) && isset($_POST["user_pass"])) {
    $user_name = $_POST["user_name"];
    $user_pass = $_POST["user_pass"];

    // Check for name & pass
    $result = $conn->query("SELECT * FROM users WHERE user='$user_name' AND pass='$user_pass'");
    if ($result->num_rows > 0) {
        // If match, set admin name in session
        $_SESSION['user_name'] = $user_name;

        // Redirect to admin dashboard or appropriate page
        header("Location: ../menu/menu.html");
        exit();
    } else {
        // Wrong credentials
        echo "<script>alert('Invalid username or password. Please try again.');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Form</title>
  <link rel="stylesheet" href="styles.css">
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
</head>
<body>
  <div class="wrapper">
    <form method="post" action="login.php">
      <h1>Login</h1>
      <div class="input-box">
        <input type="text" placeholder="Username" name="user_name" required>
        <i class="bx bxs-user"></i>
      </div>
      <div class="input-box">
        <input type="password" placeholder="Password" name="user_pass" required>
        <i class="bx bxs-lock-alt" ></i>
      </div>
      <div class="remember-forgot">
        <label><input type="checkbox">Remember Me</label>
        <a href="#">Forgot Password</a>
      </div>
      <button type="submit" class="btn">Login</button>
      <div class="register-link">
        <p>Dont have an account? <a href="register.php">Register</a></p>
      </div>
    </form>
  </div>
</body>
</html>