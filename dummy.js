<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"type="text/JavaScript"></script>
window.SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;

const recognition = new SpeechRecognition();
var textbox =  $("#textbox");

var instructions = $("#instructions");
 
var content = '';

recognition.continuous = true;

recognition.onstart = function (){
    instructions.text("Recognition Started");
}

recognition.onspeechend = function(){
    instructions.text("No voices heard");
}
recognition.onerror = function(){
    instructions.text("There is a problem");
}
recognition.onresult = function(event){
    var current = event.resultIndex;
    var transcript = event.results[current][0].transcript;
    content += transcript;
    textbox.val(content);
}

$("#start-btn").click(function(event){
    if(content.length){
        content += " ";
    }
    recognition.start();
   
})
$("#stop").click(function(event){
    recognition.stop();
})