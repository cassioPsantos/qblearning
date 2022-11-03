podeIniciar = 0;
let timerInit;

document.querySelector('body').addEventListener('keyup', (e)=>{
    if(e.code == 'Space' && podeIniciar){
        inicia();
    }else{
        clearInterval(timerInit)
        document.getElementById('tempo').style.color = 'black'
    }
})
document.querySelector('body').addEventListener('keypress', (e)=>{
    if(e.code == "Space"){
        timerInit = setTimeout(()=>{
            podeIniciar = 1;
        },300)
        if(podeIniciar){
            document.getElementById('tempo').style.color = 'green'
        }else{
            document.getElementById('tempo').style.color = 'blue'
        }
    }
    if(crocheck != 1)return;
})
let tempo = 0;
let timer;
let crocheck = 1;

function inicia(){
    if (crocheck == 1) {
    crocheck=0 
    tempo=0
    timer = setInterval(() => {
        tempo += 0.01;
        document.getElementById('tempo').innerHTML = tempo.toFixed(2);
    }, 10);
    document.getElementById('tempo').style.color = 'black'
    document.getElementById('tempo_comeca').style.visibility = 'hidden'
    document.getElementById('tempo_comeca1').style.visibility = 'hidden'
    document.getElementById('tempo_comeca2').style.visibility = 'hidden'
    } else {
    crocheck=1
    clearInterval(timer);
    window.location.href = '/qblearning/cronometro.php?tempo='+tempo.toFixed(2)
    }
}

const button = document.getElementById('embar_botao');

button.addEventListener('click', function handleClick() {
    embar_check=1
    window.location.href = '/qblearning/cronometro.php?embar_check='+embar_check
});