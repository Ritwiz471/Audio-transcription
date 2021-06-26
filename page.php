<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Speech Recognition</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet'>
        <link rel="stylesheet" href="dash.css"/>
    </head>

    <body>
    
    <h1 id="title">Transcription</h1>
        <div class="words">
            <textarea id="textbox" rows="10" cols="50"></textarea> 
            <br><br> 
            <button id="start-btn" class="btn">Start</button>
            <button id="stop" class="btn">Stop</button>
            <p id="instructions"> Press the start button</p>
        </div><br><br>
        <button onclick="location.href='login.html'" id='signout'>Sign Out</button>
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