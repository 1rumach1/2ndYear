<?php
session_start();

$name = $email= $message = "";
$nameErr = $emailErr= $messageErr ="";

if ($_SERVER["REQUEST_METHOD"] == "POST"){

    if (empty($_POST["name"])){
        $nameErr = "Name is required";
    } else {
        $name = htmlspecialchars($_POST["name"]);
    }

    if (empty($_POST["email"])){
        $emailErr = "Email is required";
    } elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
        $emailErr = "Invalid Email Format";
    } else {
        $email = htmlspecialchars($_POST["email"]);
    }

    if (empty($_POST["message"])){
        $messageErr = "Message is required";
    } else {
        $message = htmlspecialchars($_POST["message"]);
    }

    if (empty($nameErr) && empty($emailErr) && empty($messageErr)){
        $_SESSION["name"] = $name;
        $_SESSION["email"] = $email;
        $_SESSION["message"] = $message;
        header("Location: thankyou.php");
        exit();
    }


}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Contact Us</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        Name: <input type="text" name="name" value="<?php echo $name; ?>">
        <span style="color : red;">* <?php echo $nameErr; ?></span> <br><br>

        Email: <input type="text" name="email" value="<?php echo $email; ?>">
        <span style="color : red;">* <?php echo $emailErr; ?></span> <br><br>

        Message: <br>
        <textarea name="message" rows="5" cols="40" ><?php echo $message; ?></textarea>
        <span style="color : red;">* <?php echo $messageErr; ?></span> <br><br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>