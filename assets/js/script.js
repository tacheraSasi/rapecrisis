const pataMsaada = document.getElementById('pata-msaada')
const items = document.querySelectorAll(".item")

items.forEach((item) =>{
    item.addEventListener("click",(e)=>{
        window.location.href = e.target.id
    })
})

pataMsaada.addEventListener("click",()=>{
    window.location.href = "pata-msaada"
    console.log("clicked")
})

