<?php
  session_start();
  // Correct answers
  $correct_answers = [
      "question1" => "C",
      "question2" => "B",
      "question3" => "B",
      "question4" => "B",
      "question5" => "A",
      "question6" => "A",
      "question7" => "B",
      "question8" => "C",
      "question9" => "C",
      "question10" => "A"
  ];
  
  $score = 0;
  $total_questions = count($correct_answers);
  
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Calculate score
      foreach ($correct_answers as $question => $correct_answer) {
          if (isset($_POST[$question]) && $_POST[$question] === $correct_answer) {
              $score++;
          }
      }
      $_SESSION['score'] = $score;

    // record time taken
    if (isset($_POST['time_taken'])) {
        $time_taken = intval($_POST['time_taken']); // Time taken in seconds
        $_SESSION['time_taken'] = $time_taken;
    }

      header("Location: congrats.php");
      exit();
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Computer Science Quiz</title>
    <link rel="stylesheet" href="quiz2.css" >
</head>
<body>
    <div class="quiz-container">
        <div class="quiz-header">
            <h1>COMPUTER SCIENCE QUIZ</h1>
            <h4>Instructions: Read each question carefully and select the option which you think is the correct answer.</h4>
            <h4>Good luck!</h4>
        </div>

        <button id="start-button" onclick="startQuiz()" class="submit-button">Start Quiz</button>
        <div id="quiz-timer">Time 01:00</div><br><br><br><br>

        <form id="quiz-form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            <div class="quiz-card">
                <label for="question1">1. Which of the following is considered the first mechanical computer?</label>
                <select name="question1" id="question1">
                    <option value="A">a. ENIAC</option>
                    <option value="B">b. UNIVAC</option>
                    <option value="C">c. Analytical Engine</option>
                    <option value="D">d. Z3</option>
                </select>
            </div>

            <div class="quiz-card">
                <label for="question2">2. Who is known as the father of the computer?</label>
                <select name="question2" id="question2">
                    <option value="A">a. Alan Turing</option>
                    <option value="B">b. Charles Babbage</option>
                    <option value="C">c. John von Neumann</option>
                    <option value="D">d. Steve Jobs</option>
                </select>
            </div>

            <div class="quiz-card">
                <label for="question3">3. What is the primary function of a CPU (Central Processing Unit) in a computer?</label>
                <select name="question3" id="question3">
                    <option value="A">a. Store data</option>
                    <option value="B">b. Process data</option>
                    <option value="C">c. Output data</option>
                    <option value="D">d. Input data</option>
                </select>
            </div>

            <div class="quiz-card">
                <label for="question4">4. Which of the following is a non-volatile storage device?</label>
                <select name="question4" id="question4">
                    <option value="A">a. RAM</option>
                    <option value="B">b. ROM</option>
                    <option value="C">c. Cache</option>
                    <option value="D">d. Register</option>
                </select>
            </div>

            <div class="quiz-card">
                <label for="question5">5. What does the acronym "RAM" stand for?</label>
                <select name="question5" id="question5">
                    <option value="A">a. Random Access Memory</option>
                    <option value="B">b. Read Access Memory</option>
                    <option value="C">c. Random Allocation Memory</option>
                    <option value="D">d. Read Allocation Memory</option>
                </select>
            </div>

            <div class="quiz-card">
                <label for="question6">6. Which of the following is a type of software that controls the hardware of a computer?</label>
                <select name="question6" id="question6">
                    <option value="A">a. Operating System</option>
                    <option value="B">b. Word Processor</option>
                    <option value="C">c. Web Browser</option>
                    <option value="D">d. Database</option>
                </select>
            </div>

            <div class="quiz-card">
                <label for="question7">7. In binary code, which digit represents the state of 'on'?</label>
                <select name="question7" id="question7">
                    <option value="A">a. 0</option>
                    <option value="B">b. 1</option>
                    <option value="C">c. 2</option>
                    <option value="D">d. 3</option>
                </select>
            </div>

            <div class="quiz-card">
                <label for="question8">8. What is the name of the first electronic general-purpose computer?</label>
                <select name="question8" id="question8">
                    <option value="A">a. IBM 701</option>
                    <option value="B">b. Apple I</option>
                    <option value="C">c. ENIAC</option>
                    <option value="D">d. Altair 8800</option>
                </select>
            </div>

            <div class="quiz-card">
                <label for="question9">9. Which of the following is an input device?</label>
                <select name="question9" id="question9">
                    <option value="A">a. Monitor</option>
                    <option value="B">b. Printer</option>
                    <option value="C">c. Keyboard</option>
                    <option value="D">d. Speaker</option>
                </select>
            </div>

            <div class="quiz-card">
                <label for="question10">10. What does the term 'URL' stand for in computer science?</label>
                <select name="question10" id="question10">
                    <option value="A">a. Uniform Resource Locator</option>
                    <option value="B">b. Universal Resource Locator</option>
                    <option value="C">c. Uniform Retrieval Locator</option>
                    <option value="D">d. Universal Retrieval Locator</option>
                </select>
            </div>

            <input type="hidden" name="time_taken" id="time_taken">
            <input class="submit-button" type="button" value="Submit Answers" onclick="submitQuiz()">
        </form>
    </div>
    <script src="quiz1.js"></script>
</body>
</html>
