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
    $_SESSION['score'] = $score;

    // record time taken
    if (isset($_POST['time_taken'])) {
        $time_taken = intval($_POST['time_taken']); // Time taken in seconds
        $_SESSION['time_taken'] = $time_taken;
    }

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
    <link rel="stylesheet" href="quiz2.css">
</head>
<body>
    <div class="quiz-container">
        <div class="quiz-header">
            <h1>COMPUTER SCIENCE QUIZ</h1>
            <h4>Instructions: Read each question carefully and identify the correct answer.</h4>
            <h4>Good luck!</h4>
        </div>

        <button id="start-button" onclick="startQuiz()" class="submit-button">Start Quiz</button>
        <div id="quiz-timer">Time 15:00</div><br><br><br><br>

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

            <input type="hidden" name="time_taken" id="time_taken">
            <input class="submit-button" type="button" value="Submit Answers" onclick="submitQuiz()">
        </form>
    </div>
    <script src="quiz.js"></script>
</body>
</html>
