var questions = new Array();
var questionsUsed = new Array();
var questionAmount = 10;
var correct = 0;
var start;
var htmlString;
var backgroundImageURL = 'https://st2.depositphotos.com/3268541/11064/v/950/depositphotos_110642286-stock-illustration-basketball-seamless-pattern.jpg';

function createQuestions() {
	questions.push(["Who invented the game in 1891?", "James Naismith"]);
	questions.push(["How many players in total are on a basketball court at the same time?", "10"]);
	questions.push(["The United States men's Olympic basketball team, nicknamed the 'Dream Team', competed in which year at the Olympics?", "1992"]);
	questions.push(["Which tune has been adopted as the theme song of the Harlem Globetrotters basketball team?", "Sweet Georgia Brown"]);
	questions.push(["Who won the NBA's Most Valuable Player a record six times, between 1971 and 1980, while playing for the Milwaukee Bucks and the Los Angeles Lakers?", "Kareem Abdul-Jabbar"]);
	questions.push(["Which small European country, with a population of under 3 million, is a traditional force of the sport in Europe?", "Lithuania"]);
	questions.push(["In feet, what is the height of a basketball rim?", "Ten feet"]);
questions.push(["Michael Jordan's leaping ability earned him which nickname?", "Air ball"]);
questions.push(["What term is given to an unblocked shot which misses the basket, the rim, and the backboard entirely?", "Air Jordan"]);
questions.push(["The American professional basketball team based in Miami are normally known as 'the ... what?'", "The Heat"]);
questions.push(["Who won the National Basketball Association Most Valuable Player Award (MVP) in 2009, 2010, 2012, and 2013?", "LeBron James"]);
questions.push(["In the UK, which city is home to the British Basketball League's head offices, and also won the league in 2016 and 2017?", "Leicester"]);
questions.push(["Who was known for his fierce defensive and rebounding abilities, and was nicknamed 'the worm'?", "Dennis Rodman"]);
questions.push(["What is it called when a player from either team retrieves the ball and gains possession after a missed shot?", "Rebound"]);
questions.push(["Which cities does this current British basketball team represent: The Giants?", "Manchester"]);
}


function getRandom(min, max) {
    return Math.random() * ((max + 1) - min) + min;
}

//Question, Answer, User Input

function getQuestion() {
  var index = Math.floor(Math.random() * (questions.length));
    questionsUsed.push([questions[index][0], questions[index][1], ""]);
}

function askQuestion(questionIndex) {
  questionsUsed[questionIndex][2] = prompt("Question " + (questionIndex + 1) + "\n\n" + "" + questionsUsed[questionIndex][0] + "\n\nPlease enter the answer below...");
}

function resetVars() {
    correct = 0;
    start = new Date().getTime();
    htmlString = "";
}

function printResults() {


    for (var x = 0; x < questionAmount; x++) {
        htmlString += returnHTMLString(x);
        correct += wasCorrect(questionsUsed[x][1], questionsUsed[x][2], "int");
    }

    var end = new Date().getTime();
    document.getElementById("time").innerHTML =
        "<b>Time: " + (end - start) + " ms</b>";
    document.getElementById("score").innerHTML =
        "<b>Score: " + correct + "/" + (questionAmount*2) + "</b>";
    document.getElementById("questionArea").innerHTML = htmlString;
    document.getElementById("quiz-button").innerHTML = "Play Again!";
    if ((correct / questionAmount) * 100 > 70) {
        //If above 70%, green background tint
        document.getElementById("quizBackground").style.background =
            'linear-gradient(to bottom right,rgb(0, 0, 0, 0.1),rgb(0, 255, 0)),url("' + backgroundImageURL + '")';
    } else if ((correct / questionAmount) * 100 < 40) {
        //If below 40%, red background tint
        document.getElementById("quizBackground").style.background =
            'linear-gradient(to bottom right,rgb(0, 0, 0, 0.1),rgb(255, 0, 0)),url("' + backgroundImageURL + '")';
    } else {
        //If below 40%, red background tint
        document.getElementById("quizBackground").style.background =
            'linear-gradient(to bottom right,rgb(0, 0, 0, 0.1),rgb(255, 165, 0)),url("' + backgroundImageURL + '")';
    }
}


//test
function startQuiz() {
    //gather questions, print each, check score and time, display.
    resetQuestionArea();
    resetVars();
    //createQuestions is called in updateQuestionCount and here because resetQuestionArea clears the question array
    createQuestions();
    for (var x = 0; x < questionAmount; x++) {
        getQuestion(x);
    }
    for (var x = 0; x < questionAmount; x++) {
        askQuestion(x);
    }



    printResults();


}

function wasCorrect(answer, userAnswer, format) {
    //alert("User Input: " + user + " correct was: " + correct);

    if (!(answer.toUpperCase() === userAnswer.toUpperCase())) {
        if (format !== "html") {
            return -1;
        } else {
            return (
                ' <b style="color: red;">not correct! X</b> should\'ve been <b style="color: red;">' +
                answer +
                "</b>!"
            );
        }
    } else {
        if (format !== "html") {
            return 2;
        } else {
            return ' <b style="color: #7ab20a;">correct! &checkmark;</b>';
        }
    }
    /*return correct === user
      ? ' <b style="color: green;">correct! &checkmark</b>'
      : ' <b style="color: red;">not correct! X</b>';
      */
}


function returnHTMLString(index) {
    return (
        '<div class="question">' +
        "<h2>Question " +
        (index + 1) +
        "</h2>" +
        "<hr>" +
        "<p>The question was</p>" +
        "<h3><b>" +
        questionsUsed[index][0] +
        "</b></h3>" +
        "<p>You guessed <b>" +
        questionsUsed[index][2] +
        "</b></p>" +
        "<h3>This is " +
        wasCorrect(questionsUsed[index][1], questionsUsed[index][2], "html") +
        "</h3>" +
        "</div>"
    );
}

function updateQuestionCount() {
    createQuestions();
    document.getElementById("questionCount").innerHTML = "Questions Loaded: " + questions.length;
}


function resetQuestionArea() {
    document.getElementById("questionArea").innerHTML = "";
    questions = [];
}