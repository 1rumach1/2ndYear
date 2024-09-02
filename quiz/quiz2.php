<?php
session_start();
// Correct answers
$correct_answers = [
    "question1" => "Central Processing Unit",
    "question2" => "Binary",
    "question3" => "Algorithm",
    "question4" => "HTML",
    "question5" => "RAM",
    "question6" => "Operating System",
    "question7" => "Cloud Computing",
    "question8" => "IP Address",
    "question9" => "JavaScript",
    "question10" => "Firewall"
];

$score = 0;
$total_questions = count($correct_answers);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Calculate score
    foreach ($correct_answers as $question => $correct_answer) {
        if (isset($_POST[$question]) && strtolower(trim($_POST[$question])) === strtolower($correct_answer)) {
            $score++;
        }
    }

    // Store the score in a session
    $_SESSION['score'] = $score;

    // Redirect to congrats.php
    header("Location: congrats2.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Computer Science Quiz</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('tech.jpg');
            background-size: cover; 
            background-position: center; 
            background-repeat: no-repeat; 
            color: #333;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
        }
        .quiz-container {
            max-width: 600px;
            width: 100%;
            background: rgba(255, 255, 255, 0.2); 
            padding: 20px;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1); 
            border-radius: 8px;
            backdrop-filter: blur(10px); 
            -webkit-backdrop-filter: blur(10px); 
            border: 1px solid rgba(255, 255, 255, 0.3);
            
        }
        .quiz-header {
            text-align: center;
            margin-bottom: 20px;
        }
        .quiz-header h1 {
            margin: 0;
            font-size: 2em;
            color: #FDFFC2;
        }
        .quiz-header h4 {
            margin: 5px 0;
            color: #FDFFC2;
        }
        .quiz-card {
            background-color: #FDFFC2;
            border: 2px solid #000000;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .quiz-card label {
            font-size: 1.2em;
            color: #000000;
            display: block;
            margin-bottom: 10px;
        }
        .quiz-card input {
            width: 95%;
            background-color: #FDFFC2;
            color: #000000; 
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #000000;
            font-size: 1.2em;
        }
        .submit-button {
            background-color: #ff0000;
            color: white;
            padding: 15px 20px;
            border: none;
            border-radius: 5px;
            font-size: 1.2em;
            cursor: pointer;
            width: 40%;
            float: right;
        }
        .submit-button:hover {
            background-color: #ea0000;
        }
        #quiz-form {
            display: none;
        }
    </style>
    <script>
        function startQuiz() {
            document.getElementById('start-button').style.display = 'none';
            document.getElementById('quiz-form').style.display = 'block';
        }
    </script>
</head>
<body>
    <div class="quiz-container">
        <div class="quiz-header">
            <h1>COMPUTER SCIENCE QUIZ</h1>
            <h4>Instructions: Read each question carefully and identify the correct answer.</h4>
            <h4>Good luck!</h4>
        </div>

        <button id="start-button" onclick="startQuiz()" class="submit-button">Start Quiz</button>

        <form id="quiz-form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
            <div class="quiz-card">
                <label for="question1">1. What does CPU stand for?</label>
                <input type="text" name="question1" id="question1">
            </div>
            <div class="quiz-card">
                <label for="question2">2. What number system does a computer use?</label>
                <input type="text" name="question2" id="question2">
            </div>
            <div class="quiz-card">
                <label for="question3">3. A step-by-step procedure to solve a problem is called?</label>
                <input type="text" name="question3" id="question3">
            </div>
            <div class="quiz-card">
                <label for="question4">4. What language is used to create web pages?</label>
                <input type="text" name="question4" id="question4">
            </div>
            <div class="quiz-card">
                <label for="question5">5. What does RAM stand for?</label>
                <input type="text" name="question5" id="question5">
            </div>
            <div class="quiz-card">
                <label for="question6">6. What is the software that manages computer hardware?</label>
                <input type="text" name="question6" id="question6">
            </div>
            <div class="quiz-card">
                <label for="question7">7. What is the term for storing and accessing data over the internet?</label>
                <input type="text" name="question7" id="question7">
            </div>
            <div class="quiz-card">
                <label for="question8">8. What is a unique string of numbers separated by periods that identifies each computer?</label>
                <input type="text" name="question8" id="question8">
            </div>
            <div class="quiz-card">
                <label for="question9">9. What programming language is known as the language of the web?</label>
                <input type="text" name="question9" id="question9">
            </div>
            <div class="quiz-card">
                <label for="question10">10. What is a network security system that monitors and controls incoming and outgoing network traffic?</label>
                <input type="text" name="question10" id="question10">
            </div>
            <input class="submit-button" type="submit" value="Submit Answers">
        </form>
    </div>
</body>
</html>
