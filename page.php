<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Speech Recognition</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
    </head>

    <body>
        <div class="words">
            <h1>Transcription APP</h1>
            <textarea id="textbox" rows="6" cols="50" ></textarea><br>
            <button id="start-btn">Start</button>
            <button id="stop">Stop</button>
            <p id="instructions"> Press the start button</p>
        </div>
    <p id="dummy"></p>
    </body>
 
 
 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
   
};
document.getElementById('stop').onclick = function(event){
    recognition.stop();
    $.ajax({ 
	 method: "POST", 
	 url: "transcript.php", 
	 data: {trans: content} 
	}).done(function(html){		
        document.getElementById('dummy').innerHTML=html;			
        //function block runs if Ajax request was successful 
	}).fail(function(html){ 
        // function block runs if Ajax request failed 
});
};
</script>
</html>