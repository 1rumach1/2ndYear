<?php
  session_start();
  
  $time_taken = $_SESSION['time_taken'];
  
  $minutes = floor($time_taken / 60);  // compute mminutes
  $seconds = $time_taken % 60;         // compute seconds

  // Retrieve the score from the session
  if (isset($_SESSION['score'])) {
      $score = $_SESSION['score'];
  } else {
      header("Location: quiz2.php");
      exit();
  }
  
  if ($score == 10) {
      $message = "Perfect!";
  } elseif ($score >= 7 && $score <= 9) {
      $message = "Congratulations!";
  } else {
      $message = "Good try!";
  }
  
  unset($_SESSION['score']);
  unset($_SESSION['time_taken']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Congratulations!</title>
    <style>
       body {
           font-family: Arial, sans-serif;
           background-image: url('con.jpg');
           background-size: cover; 
           background-position: center; 
           background-repeat: no-repeat; 
           margin: 0;
           padding: 0;
           display: flex;
           justify-content: center;
           align-items: center;
           height: 100vh;
       }
       
       .container {
           text-align: center;
           background-color: #fee8d6; 
           opacity: 95%;
           padding: 30px;
           border-radius: 10px;
           box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
           max-width: 400px;
           width: 100%;
       }
       
       .container h1 {
           font-size: 2.5em;
           color: #FF8C00; 
           margin-bottom: 20px;
       }
       
       .container p {
           font-size: 1.5em;
           color: #333;
           margin-bottom: 30px;
       }
       
       .container button {
           background-color: #FFA500; 
           color: white;
           padding: 15px 20px;
           border: none;
           border-radius: 5px;
           font-size: 1.2em;
           cursor: pointer;
           margin: 10px;
           width: 100%;
           max-width: 200px;
       }
       
       .container button:hover {
           background-color: #FF8C00; 
       }

    </style>
</head>
<body>
    <div class="container">
        <h1><?php echo $message ?></h1>
        <p>YOU SCORED: <?php echo $score; ?> / 10</p>
        <p>TIME TAKEN: <br> <?php echo $minutes . " minutes & " . $seconds . " seconds"; ?></p>

        <button onclick="location.href='quiz.php'">Retake Quiz</button>
        <button onclick="location.href='../menu/menu.html'">Go to Menu</button>
    </div>
</body>
</html>
