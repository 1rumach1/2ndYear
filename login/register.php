<?php
// CONNECTION FILE
include "conn.php";

// QUERY FOR Register
if (isset($_POST["create_name"]) && isset($_POST["create_pass"])) {
    $create_name = $_POST["create_name"];
    $create_pass = $_POST["create_pass"];

    // Start transaction
    $conn->begin_transaction();

    try {
        // Insert user
        $query = "INSERT INTO users (user, pass) 
                  VALUES ('$create_name', '$create_pass')";
        $result = $conn->query($query);

        if ($result === TRUE) {
            
            $conn->commit();

            echo "<script>
                    if (confirm('Account successfully created. Click OK to continue.')) {
                        window.location.href = '../index.php';
                    }
                  </script>";
        } else {
            
            throw new Exception("Error: " . $query . "<br>" . $conn->error);
        }
    } catch (Exception $e) {
        $conn->rollback();
        echo $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register Form</title>
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
  <style>
    *{
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Poppins", sans-serif;
    }
    body{
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      background: url(bg2.jpg) no-repeat;
      background-size: cover;
      background-position: center;
    }
    .wrapper{
      width: 420px;
      background: transparent;
      border: 2px solid rgba(255, 255, 255, .2);
      backdrop-filter: blur(9px);
      color: #fff;
      border-radius: 20px;
      padding: 30px 40px;
    }
    .wrapper h1{
      font-size: 36px;
      text-align: center;
    }
    .wrapper .input-box{
      position: relative;
      width: 100%;
      height: 50px;
      margin: 30px 0;
      
    }
    .input-box input{
      width: 100%;
      height: 100%;
      background: transparent;
      border: none;
      outline: none;
      border: 2px solid rgba(255, 255, 255, .2);
      border-radius: 30px;
      font-size: 16px;
      color: #fff;
      padding: 20px 45px 20px 20px;
    }
    .input-box input::placeholder{
      color: #fff;
    }
    .input-box i{
      position: absolute;
      right: 20px;
      top: 30%;
      transform: translate(-50%);
      font-size: 20px;  
    }
    .wrapper {
      display: flex;
      justify-content: center;
      font-size: 14.5px;
      margin: -15px 0 15px;
    }

    .wrapper .btn{
      width: 100%;
      height: 45px;
      background: #fff;
      border: none;
      outline: none;
      border-radius: 40px;
      box-shadow: 0 0 10px rgba(0, 0, 0, .1);
      cursor: pointer;
      font-size: 16px;
      color: #333;
      font-weight: 600;
      margin-bottom: 20px;
    }
    .wrapper {
      font-size: 14.5px;
      text-align: center;
      margin: 20px 0 15px;   
    }
    .register-link p a{
      color: #fff;
      text-decoration: none;
      font-weight: 600;
    }
    .register-link p a:hover{
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="wrapper">
    <form method="post" action="register.php">
      <h1>Register</h1>
      <div class="input-box">
        <input type="text" placeholder="Create Username" name="create_name" required>
        <i class="bx bxs-user"></i>
      </div>
      <div class="input-box">
        <input type="password" placeholder="Create Password" name="create_pass" required>
        <i class="bx bxs-lock-alt" ></i>
      </div>
      <button type="submit" class="btn">Register</button>
      <div class="register-link">
        <p>Have an account? <a href="../index.php">Login</a></p>
      </div>
    </form>
  </div>
</body>
</html>