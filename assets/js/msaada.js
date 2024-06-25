const responses = {};
        let currentQuestion = 0;

document.addEventListener('DOMContentLoaded', () => {
    showQuestion(currentQuestion);

    document.querySelectorAll('input[type="radio"]').forEach(input => {
        input.addEventListener('change', () => navigate(1));
    });

    document.querySelector('input[type="date"]').addEventListener('change', () => navigate(1));
});

function showQuestion(index) {
    const questions = document.querySelectorAll('.question');
    const progressBar = document.getElementById('progressBar');

    questions.forEach((question, i) => {
        question.classList.toggle('active', i === index);
    });

    progressBar.style.width = ((index + 1) / questions.length) * 100 + '%';

    hideValidationMessages();
}

function navigate(direction) {
    const questions = document.querySelectorAll('.question');

    if (direction === 1 && !validateAnswer(currentQuestion)) {
        showValidationMessage(currentQuestion);
        return;
    }

    currentQuestion += direction;

    if (currentQuestion >= questions.length) {
        displayResults();
        return;
    }

    showQuestion(currentQuestion);
}

function validateAnswer(index) {
    const question = document.querySelectorAll('.question')[index];
    const input = question.querySelector('input:checked, input[type="date"]');
    return !!input;
}
function showValidationMessage(index) {
    document.getElementById(`validation-message-${index + 1}`).style.display = 'block';
}

function hideValidationMessages() {
    document.querySelectorAll('.validation-message').forEach(message => {
        message.style.display = 'none';
    });
}

function displayResults() {
    const resultsContainer = document.getElementById('results');
    const resultsList = document.getElementById('resultsList');

    responses.question1 = document.querySelector('input[name="question1"]:checked').value;
    responses.question2 = document.getElementById('question2').value;
    
    responses.question3 = document.querySelector('input[name="question3"]:checked').value;
    responses.question4 = document.querySelector('input[name="question4"]:checked').value;
    responses.question5 = document.querySelector('input[name="question5"]:checked').value;
    resultsList.innerHTML = `
        <li>1. Je, tukio lilitokea kwako au kwa mtu unayemjua? ${responses.question1}</li>
        <li>2. Tukio lilitokea lini? ${responses.question2}</li>
        <li>3. Je, unahitaji ushauri wa kisaikolojia? ${responses.question3}</li>
        <li>4. Je, tukio liliripotiwa kwa mamlaka? ${responses.question4}</li>
        <li>5. Je, unajua mshukiwa? ${responses.question5}</li>
    `;
    console.log(responses)
    document.getElementById('questionnaire').classList.add('hidden');
    resultsContainer.classList.remove('hidden');
}