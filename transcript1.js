window.SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;

const recognition = new SpeechRecognition();
recognition.interimResults = true;

let p = document.createElement('p');
const words = document.querySelector('.words');
words.appendChild(p);

recognition.addEventListener('result',e=> {
console.log(e.results);
const transcript = Array.from(e.results)
    .map(result =>result[0])
    .map(result =>result.transcript)
    .join(' ') 
    p.textContent= transcript;
    if(e.results[0].isFinal)
    {
        p=document.createElement('p');
        words.appendChild(p);
    }
    console.log(transcript);
});

recognition.addEventListener('end',recognition.start); 
recognition.start();
 