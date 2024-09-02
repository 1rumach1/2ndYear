<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Thank You</h1>
    <p> Thank you for contacting us, <?php echo $_SESSION["name"]; ?>. 
    We have recieved your message and will get back to you at <?php echo $_SESSION["email"]; ?> soon. </p>
    <p> Your message: <?php echo $_SESSION["message"]; ?></p>
    <?php
    session_unset();
    session_destroy();
    ?>
</body>
</html>