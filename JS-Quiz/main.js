//Functions

//kreira ID za prasanjeto preku hash
function getId() {
  let id = location.hash;
  id = parseInt(id.replace("#question-", ""));
  return id;
}

// printa podatoci za prasanjeto
function getQuestionInfo(question, id) {
  questionInfo.style.display = "block";
  document.querySelector("#questionTitle").innerHTML = question.question;
  document.querySelector("#questionCount").innerHTML = `Question ${id + 1}/20`;
  category.style.display = "block";
  category.innerHTML = `Category: <span class="font-weight-bold">${question.category}</span>`;
}

//Go kreira prasanjeto vo zavisnost od TYPE, multiple ili boolean
function buildQuestion(questions) {
  questionM.style.display = "block";
  questionM.classList.add("animate__animated", "animate__fadeIn");
  questionB.classList.add("animate__animated", "animate__fadeIn");
  let id = getId() - 1;
  getQuestionInfo(questions[id], id);

  if (questions[id].type == "multiple") {
    questionB.style.display = "none";
    let answers = questions[id].incorrect_answers;

    //tocniot odgovor go stava na random mesto
    answers.splice(
      Math.floor(Math.random() * 4),
      0,
      questions[id].correct_answer
    );

    button1.innerHTML = answers[0];
    button2.innerHTML = answers[1];
    button3.innerHTML = answers[2];
    button4.innerHTML = answers[3];
    return;
  }

  questionM.style.display = "none";
  questionB.style.display = "block";
}

//kreira hash za slednoto prasanje
function createHash() {
  return `question-${getId() + 1}`;
}

//proveruva dali prasanjeto od tip Multiple e tocno
function checkAnswerMultiple(button, question) {
  button.addEventListener("click", () => {
    let id = getId();
    if (button.innerHTML == question[id - 1].correct_answer) {
      correctAnswer++;
      location.hash = createHash();
      return;
    }
    location.hash = createHash();
    return;
  });
}

//proveruva dali prasanjeto od tip Boolean e tocno
function checkAnswerBoolean(button, question) {
  button.addEventListener("click", () => {
    let id = getId();
    if (button.value == question[id - 1].correct_answer) {
      correctAnswer++;
      location.hash = createHash();
      return;
    }
    location.hash = createHash();
    return;
  });
}

let loadScreen = document.querySelector("#loadScreen");
let startQuiz = document.querySelector("#startQuiz");
let questionM = document.querySelector("#questionMultiple");
let questionB = document.querySelector("#questionBool");
let questionInfo = document.querySelector("#question");
let score = document.querySelector("#scoreDiv");
let category = document.querySelector("#questionCategory");
let questionCount = document.querySelector("#questionsCount");
let restart = document.querySelector("#restart");
let button1 = document.getElementById("mult0");
let button2 = document.getElementById("mult1");
let button3 = document.getElementById("mult2");
let button4 = document.getElementById("mult3");
let button5 = document.getElementById("true");
let button6 = document.getElementById("false");

startQuiz.style.display = "none";
questionM.style.display = "none";
questionB.style.display = "none";
questionInfo.style.display = "none";
score.style.display = "none";
category.style.display = "none";
questionCount.style.display = "none";
restart.style.display = "none";

location.hash = "";
let correctAnswer = 0;

fetch("https://opentdb.com/api.php?amount=20")
  .then((response) => response.json())
  .then((data) => {
    let questions = data.results;
    console.log(questions);
    setTimeout(() => {
      loadScreen.style.display = "none";
      startQuiz.style.display = "block";
    }, 750); // Set Timeout za da zavrsi animacijata. Inace mnogu brzo se menuva.

    document.querySelector("#startBtn").addEventListener("click", () => {
      startQuiz.style.display = "none";
      location.hash = "question-1";
      questionCount.style.display = "block";
      restart.style.display = "block";
    });

    window.addEventListener("hashchange", () => {
      if (getId() <= 20) {
        buildQuestion(questions);
        return;
      } else {
        location.hash = "Finished";
        questionM.style.display = "none";
        questionB.style.display = "none";
        questionInfo.innerHTML = "";
        score.style.display = "block";
        document.querySelector("#goodLuck").innerHTML = "Thank you for playing";
        score.innerHTML = `<div class="col-12 text-center p-3 bg-light"><h1>Your score: ${correctAnswer}/20</h1></div>`;
        document.querySelector("#questionsCount").style.display = "none";
        category.style.display = "none";
      }
    });
    checkAnswerMultiple(button1, questions);
    checkAnswerMultiple(button2, questions);
    checkAnswerMultiple(button3, questions);
    checkAnswerMultiple(button4, questions);
    checkAnswerBoolean(button5, questions);
    checkAnswerBoolean(button6, questions);
  });
