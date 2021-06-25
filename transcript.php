<?php
echo "hello";
?>
<script>
window.SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;

const recognition = new SpeechRecognition();
 
var content = '';

recognition.continuous = true;

recognition.onstart = function (){
    document.getElementById('instructions').innerHTML="Recognition is on";
}

recognition.onspeechend = function(){
    document.getElementById('instructions').innerHTML="NO voices heard";
}
recognition.onerror = function(){
    document.getElementById('instructions').innerHTML="There is a problem";
}
recognition.onresult = function(event){
    var current = event.resultIndex;
    var transcript = event.results[current][0].transcript;
    content += transcript;
    document.getElementById('textbox').innerHTML= content;
}

document.getElementById('start-btn').onclick = function(event){
    if(content.length){
        content += " ";
    }
    recognition.start();
   
}
document.getElementById('stop').onclick = function(event){
    recognition.stop();
}
</script>
