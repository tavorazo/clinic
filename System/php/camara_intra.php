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

  

    </div>
    <div class="verticalspacer"></div>
  </div>
</div>
<div class="preload_images">
 <img class="preload" src="../images/u372-r.png" alt=""/>
 <img class="preload" src="../images/u376-r.png" alt=""/>
 <img class="preload" src="../images/u377_states-r.png" alt=""/>
 <img class="preload" src="../images/u377_states-a.png" alt=""/>
 <img class="preload" src="../images/u378_states-r.png" alt=""/>
 <img class="preload" src="../images/u378_states-a.png" alt=""/>
 <img class="preload" src="../images/u480_states-r.png" alt=""/>
 <img class="preload" src="../images/u480_states-a.png" alt=""/>
 <img class="preload" src="../images/u550_states-r.png" alt=""/>
 <img class="preload" src="../images/u550_states-a.png" alt=""/>
 <img class="preload" src="../images/u552_states-r.png" alt=""/>
 <img class="preload" src="../images/u552_states-a.png" alt=""/>
</div>
<!-- JS includes -->

<script src="../scripts/museutils.js?3840766194" type="text/javascript"></script>
<script src="../scripts/jquery.tobrowserwidth.js?3842421675" type="text/javascript"></script>
<script src="../scripts/jquery.watch.js?4068933136" type="text/javascript"></script>
<!-- Other scripts -->
<script type="text/javascript">
$(document).ready(function() { try {
  Muse.Utils.transformMarkupToFixBrowserProblemsPreInit();/* body */
  $('.browser_width').toBrowserWidth();/* browser width elements */
  Muse.Utils.prepHyperlinks(true);/* body */
  Muse.Utils.fullPage('#page');/* 100% height page */
  Muse.Utils.showWidgetsWhenReady();/* body */
  Muse.Utils.transformMarkupToFixBrowserProblems();/* body */
} catch(e) { Muse.Assert.fail('Error calling selector function:' + e); }});
</script>
   </body>
</html>
