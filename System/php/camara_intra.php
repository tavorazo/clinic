<?php
	@session_start();
	if($_SESSION['u']=='')
		header('location: index.php');
	$usuario = $_SESSION['u'];
$id = $_GET["id"];
$enlace = "../pacientes/ficha-paciente.php?id=".$id."";
$titulo ="Camara intra";

include ("../+/head2.php");

?>
 <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
 <script src="//ajax.googleapis.com/ajax/libs/swfobject/2.2/swfobject.js" type="text/javascript"></script>
 <script src="../scriptcam/scriptcam.js" type="text/javascript"></script>
 <script src="../scriptcam/camara.js" type="text/javascript"></script> 

    <h3>Camara intra. </h3><br>
	<div id="container" style="float:left; margin-left:15px; margin-right:15px;">
    </div>
    <img id="foto" style="width:500px;height:375px;" style="float:right;" />
	<p><img src="../scriptcam/webcamlogo.png" style="vertical-align:text-top"/>
	<select id="cameraNames" size="1" onChange="changeCamera()" style="width:245px;font-size:10px;height:25px;">
	</select></p>

    <br><input type="button" value="Capturar" id="save" class="campoT" onclick="base64_tofield_and_image()">
    <br><br> 

  
<?php  include ("../+/footer.php"); ?>