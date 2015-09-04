<?php
	@session_start();
	if($_SESSION['u']=='')
		header('location: index.php');
	$usuario = $_SESSION['u'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	
	<div id="container" style="float:left; margin-left:15px; margin-right:15px;">
        <video autoplay id="videoElement" >
         
        </video>
    </div>

    <canvas id="canvas" width="500" height="375"  ></canvas>

    <input type="button" value="Capturar" id="save" class="buttom" />
    <br><br>    
    <label style="float:left; width:150px; margin-right:15%">Foto de ingreso</label>
    <input type="file" name="imagen" class="campoT" style="float:left; witdh:200px"><br>
	<a href="#" class="button" id="btn-download">Download</a>

   <script>
        var video = document.querySelector("#videoElement");

        navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia || navigator.oGetUserMedia;
         
        if (navigator.getUserMedia) {       
            navigator.getUserMedia({video: true}, handleVideo, videoError);
        }
         
        function handleVideo(stream) {
            video.src = window.URL.createObjectURL(stream);
        }
         
        function videoError(e) {
        }
        var v,canvas,context,w,h;
        var sel = document.getElementById('fileselect'); // get reference to file select input element

        document.addEventListener('DOMContentLoaded', function(){
            v = document.getElementById('videoElement');
            canvas = document.getElementById('canvas');
            context = canvas.getContext('2d');
            w = canvas.width;
            h = canvas.height;

        },false);

        function draw(v,c,w,h) {
            if(v.paused || v.ended) return false; // if no video, exit here
            context.drawImage(v,0,0,w,h); // draw video feed to canvas      
           var uri = canvas.toDataURL("image/png"); // convert canvas to data URI
        }

        document.getElementById('save').addEventListener('click',function(e){
            
            draw(v,context,w,h); // when save button is clicked, draw video feed to canvas
            
        });

        var fr;

        sel.addEventListener('change',function(e){
            var f = sel.files[0]; // get selected file (camera capture)
            
            fr = new FileReader();
            fr.onload = receivedData; // add onload event
            fr.readAsDataURL(f); // get captured image as data URI
        })

        var button = document.getElementById('btn-download');
		button.addEventListener('click', function (e) {
    		var dataURL = canvas.toDataURL('image/png');
    			button.href = dataURL;
		});
    </script>
</body>
</html>