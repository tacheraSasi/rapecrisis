const pataMsaada = document.getElementById('pata-msaada')
const daktari = document.getElementById("daktari")
const items = document.querySelectorAll(".item")

//ai therapist
const form = document.getElementById("talk-to-assistant");
const input = document.querySelector(".input-field")
const sendBtn = document.getElementById("send-btn");
const itagSend = document.getElementById("i-send");
const chatContainer = document.querySelector('#chat_container');
const modalBody = document.querySelector('#ekilie-ai-body')
const BASE_API_URL = 'https://ekilie.onrender.com'
console.log(form)

items.forEach((item) =>{
    item.addEventListener("click",(e)=>{
        window.location.href = e.target.id
    })
})

pataMsaada.addEventListener("click",()=>{
    window.location.href = "pata-msaada"
    console.log("clicked")
})

daktari.addEventListener("click",()=>{
    let number = daktari.getAttribute("number")
    window.location.href = "tel:"+number
})

    


form.onsubmit = (e)=>{
    e.preventDefault();

}


let loadInterval

function loader(element) {
    element.textContent = ''

    loadInterval = setInterval(() => {
        // Update the text content of the loading indicator
        element.textContent += '.';

        // If the loading indicator has reached three dots, reset it
        if (element.textContent === '....') {
            element.textContent = '';
        }
    }, 300);
}
function typeText(element, text) {
    let index = 0

    let interval = setInterval(() => {
        if (index < text.length) {
            element.innerHTML += text.charAt(index)
            index++
        } else {
            clearInterval(interval)
        }
    }, 20)
}

function generateUniqueId() {
    const timestamp = Date.now();
    const randomNumber = Math.random();
    const hexadecimalString = randomNumber.toString(16);

    return `id-${timestamp}-${hexadecimalString}`;
}


function chatStripe(isAi, value, uniqueId) {
    return (
        `
        <div class="ekilie-chat ${isAi ? 'ai' : ''}">
          <div class="role ${isAi ? 'assistant' : 'user'}">${isAi ? 'ekilie' : 'me'}</div>
          <span id=${uniqueId}>${value}</span>
        </div>
    `
    )
}

const handleSubmit = async (e)=>{
    e.preventDefault()
    let prompt = input.value
    input.value=''

    
    // user's chatstripe
    chatContainer.innerHTML += chatStripe(false, prompt)
    // bot's chatstripe
    const uniqueId = generateUniqueId()
    chatContainer.innerHTML += chatStripe(true, " ", uniqueId)

    
    modalBody.scrollTop = modalBody.scrollHeight;

    // specific message div 
    const messageDiv = document.getElementById(uniqueId)

    // messageDiv.innerHTML = "..."
    loader(messageDiv)

    const response = await fetch(`${BASE_API_URL}/api/assistant/generate-text`, {
    method: 'POST',
    headers: {
        'Content-Type': 'application/json',
    },
    body: JSON.stringify({ prompt: prompt }),
    })
    clearInterval(loadInterval)
    messageDiv.innerHTML = " "

    if (response.ok) {
        const data = await response.json();
        console.log(data.text)
        const parsedData = data.text.trim() // trims any trailing spaces/'\n' 

        typeText(messageDiv, parsedData)
    } else {
        const err = await response.text()

        messageDiv.innerHTML = "Kunashida imetokea jaribu tena baadae  😿 😿"
        // alert(err)
    }

}

// sendBtn.addEventListener('click',()=>{
//     handleSubmit()
// })

// input.onkeyup = ()=>{
//     if(input.value != ""){
//         sendBtn.classList.add("active");
//         itagSend.classList.add("active");
//     }else{
//         sendBtn.classList.remove("active");
//         itagSend.classList.remove("active");
//     }
// }

form.addEventListener('submit', handleSubmit)
input.addEventListener('keyup', (e) => {
    if(input.value != ""){
        sendBtn.classList.add("active");
        itagSend.classList.add("active");
    }else{
        sendBtn.classList.remove("active");
        itagSend.classList.remove("active");
    }
    
})