var score = 0;
var numberCorrect = 0;
var progress = 0;
var progressIncrement;
var questionArray = null;
var questionObject = null;

function startQuiz() {
    loadQuestion();
    $("#nextButton").off("click");
    $("#nextButton").click(checkAnswer);
    $("#nextButton").text("Next Question");
}

//precondition: progress != 100 so there are still questions to ask
function loadQuestion() {
    var index = Math.floor(Math.random() * (questionArray.length - 1));
    questionObject = questionArray[index];
    questionArray.splice(index,1);
    $("#question").text(questionObject.question);
    var ulElement = document.getElementsByTagName("ul")[0];
    ulElement.innerHTML = '';
    for(var i = 0; i<questionObject.options.length; i++) {
        var optionElement = document.createElement("li");
        var labelElement = document.createElement("label");
        var inputElement = document.createElement("input");
        inputElement.setAttribute("type", "radio");
        inputElement.setAttribute("name", "answers");
        labelElement.appendChild(inputElement);
        labelElement.appendChild(document.createTextNode(questionObject.options[i]));
        optionElement.appendChild(labelElement);
        ulElement.appendChild(optionElement);
    }
}

function checkAnswer() {
    var options = document.getElementsByTagName("label");
    for(var i = 0; i<options.length; i++) {
        var textValue = options[i].childNodes[1].textContent;
        var input = options[i].childNodes[0];
        if(textValue == questionObject.correctAnswer) {
            if(input.checked == true) {
                //show animation for correct answer
                updateScore(questionObject.points);
                numberCorrect++;
            }
            else {
                options[i].style.background='green';
            }
            break;
        }
    }
    setTimeout(updateProgress, 1000);
}

function updateScore(points) {
    score += points;
    $("#score").text("Score: " + score);
}

function updateProgress() {
    progress += progressIncrement;
    if(progress >= 100) {
        $("#progress").animate({width: "100%", "border-top-right-radius": '1em', "border-bottom-right-radius": '1em' }, "slow", finish);
    }
    else {
        $("#progress").animate({width: progress + "%"}, "slow", loadQuestion);
    }
}

function finish() {
    var message = "";
    if(numberCorrect == 0)
        message += "Better luck next time!";
    else 
        message += "Good job!";
    var quizWrapperElement = document.getElementById("quizWrapper")
    quizWrapperElement.innerHTML = '';
    message += " You got " + numberCorrect + " out of ";
    message += progress/progressIncrement + " questions correct. Your score is " + score + ".";
    var textElement = document.createTextNode(message);
    var spanElement = document.createElement("span");
    spanElement.style.fontSize = '1.5em';
    spanElement.style.textAlign = 'center';
    spanElement.appendChild(textElement);
    quizWrapperElement.appendChild(spanElement);
}

$(document).ready(function() {
    updateScore(0);
    var subjectChooser = Math.floor(Math.random() * 2);
    if(subjectChooser == 0) {
        questionArray = frugalQuestions;
        $("#category").text("Frugal Innovation Lab");
    }
    else {
        questionArray = guitarQuestions;
        $("#category").text("Guitar Facts");
    }
    progressIncrement = 100 / questionArray.length;
    $("#question").text("Click \"Start\" to begin the quiz.");
    $("#nextButton").click(startQuiz);
    $("#nextButton").text("Start");
    $("#quitButton").click(finish);
    var date = new Date();
    var dateString = (date.getMonth()+1) + "/" + date.getDate() + "/" + date.getFullYear();
    $("#date").text(dateString);
});