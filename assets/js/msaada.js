const responses = {};
let currentQuestion = 0;

document.addEventListener('DOMContentLoaded', () => {
    showQuestion(currentQuestion);

    document.querySelectorAll('input[type="radio"]').forEach(input => {
        input.addEventListener('click', () => navigate(1));
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
        <li><i class="bi bi-check-circle"></i> Je, tukio lilitokea kwako au kwa mtu unayemjua?<br>
          <span style="color:var(--accent-color)">${responses.question1}</span>
        </li>
        <li><i class="bi bi-check-circle"></i> Tukio lilitokea lini?<br>
          <span style="color:var(--accent-color)">${responses.question2}</span>
        </li>
        <li><i class="bi bi-check-circle"></i> Je, unahitaji ushauri wa kisaikolojia?<br>
          <span style="color:var(--accent-color)">${responses.question3}</span>
        </li>
        <li><i class="bi bi-check-circle"></i> Je, tukio liliripotiwa kwa mamlaka?<br>
          <span style="color:var(--accent-color)">${responses.question4}</span>
        </li>
        <li><i class="bi bi-check-circle"></i> Je, unajua mshukiwa?<br>
          <span style="color:var(--accent-color)">${responses.question5}</span>
        </li>
    `;
    if(responses.location){
        console.log(responses)
    }
    document.getElementById('questionnaire').classList.add('hidden');
    resultsContainer.classList.remove('hidden');
    setTimeout(() => {
        showActions()
    }, 5000);//2416-YC95-PJ23
}

function showActions() {
    const actionContainer =document.querySelector('.action')
    const resultsContainer = document.getElementById('results');
    resultsContainer.classList.add('hidden')
    actionContainer.style.display = "flex"

    
}

function getUserLocation() {
    return new Promise((resolve, reject) => {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(resolvePosition, showError);
        } else {
            reject("Geolocation is not supported by this browser.");
        }

        function resolvePosition(position) {
            const latitude = position.coords.latitude;
            const longitude = position.coords.longitude;
            const positionReturned = {
                latitude,
                longitude
            };
            resolve(positionReturned);
        }

        function showError(error) {
            switch (error.code) {
                case error.PERMISSION_DENIED:
                    reject("User denied the request for Geolocation.");
                    break;
                case error.POSITION_UNAVAILABLE:
                    reject("Location information is unavailable.");
                    break;
                case error.TIMEOUT:
                    reject("The request to get user location timed out.");
                    break;
                case error.UNKNOWN_ERROR:
                    reject("An unknown error occurred.");
                    break;
            }
        }
    });
}

getUserLocation()
.then(location => {
    console.log('Location:', location);
    responses.location = location
    //sending the response to a php backend
    fetch('your-backend-url.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(responses)
    })
    .then(response => response.json())
    .then(data => {
        console.log('Response from backend:', data);
    })
    .catch(error => {
        console.error('Error:', error);
    });
    console.log(responses)
})
.catch(error => {
    console.error('Error:', error);
    responses.location = "user denied"
});
