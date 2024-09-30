let startTime;

function startQuiz() {
    document.getElementById('quiz-form').style.display = 'block';
    document.getElementById('quiz-timer').style.display = 'block';
    document.getElementById('start-button').style.display = 'none';


    startTime = new Date().getTime();

 
    let timeLeft = 60; // seconds
    let countdown = document.getElementById('quiz-timer');
    
    let timer = setInterval(function () {
        let minutes = Math.floor(timeLeft / 60);
        let seconds = timeLeft % 60;

        minutes = String(minutes).padStart(2, "0");
        seconds = String(seconds).padStart(2, "0");

        countdown.textContent = `Time ${minutes}:${seconds}`; 

        if (timeLeft <= 0) {
            clearInterval(timer);
            alert("Time's up! The quiz is over.");
            submitQuiz();
        }

        timeLeft--;
    }, 1000);
}

function submitQuiz() {
    let endTime = new Date().getTime(); 
    let timeTaken = Math.floor((endTime - startTime) / 1000); 

    document.getElementById('time_taken').value = timeTaken;

    document.getElementById('quiz-form').submit();
}
