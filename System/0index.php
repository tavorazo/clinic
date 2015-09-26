<?php
/* Navegador */
function obtenerNavegadorWeb()
{
	$agente = $_SERVER['HTTP_USER_AGENT'];
	$navegador = 'Unknown';
	$platforma = 'Unknown';
	$version= "";

	//Obtenemos la Plataforma
	if (preg_match('/linux/i', $agente)) {
		$platforma = 'linux';
	}
	elseif (preg_match('/macintosh|mac os x/i', $agente)) {
		$platforma = 'mac';
	}
	elseif (preg_match('/windows|win32/i', $agente)) {
		$platforma = 'windows';
	}

	//Obtener el UserAgente
	if(preg_match('/MSIE/i',$agente) && !preg_match('/Opera/i',$agente))
	{
		$navegador = 'Internet Explorer';
		$navegador_corto = "MSIE";
	}
	elseif(preg_match('/Firefox/i',$agente))
	{
		$navegador = 'Mozilla Firefox';
		$navegador_corto = "Firefox";
	}
	elseif(preg_match('/Chrome/i',$agente))
	{
		$navegador = 'Google Chrome';
		$navegador_corto = "Chrome";
	}
	elseif(preg_match('/Safari/i',$agente))
	{
		$navegador = 'Apple Safari';
		$navegador_corto = "Safari";
	}
	elseif(preg_match('/Opera/i',$agente))
	{
		$navegador = 'Opera';
		$navegador_corto = "Opera";
	}
	elseif(preg_match('/Netscape/i',$agente))
	{
		$navegador = 'Netscape';
		$navegador_corto = "Netscape";
	}
	$i = count($matches['browser']);
	if ($i != 1) {
	if (strripos($agente,"Version") < strripos($agente,$navegador_corto)){ $version= $matches['version'][0]; } else { $version= $matches['version'][1]; } } else { $version= $matches['version'][0]; } /*Verificamos si tenemos Version*/ if ($version==null || $version=="") 
	{
		$version="?";
	} /*Resultado final del Navegador Web que Utilizamos*/ 

	return array('agente' => $agente,	'nombre' => $navegador, 'platforma' => $platforma	);
}
?>

<!DOCTYPE html>
<html class="html">
 <head>

  <!--meta http-equiv="Content-type" content="text/html;charset=UTF-8"/-->
  <meta name="generator" content="7.0.314.244"/>
  <title>Endoperio Dental Center</title>
  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="css/s1.css"/>
  <link rel="stylesheet" type="text/css" href="css/texto.css"/>

  		<link rel="shortcut icon" type="x-icon" href="images/icon.png" /><!--para logo en barra-->

  <link rel="stylesheet" type="text/css" href="css/site_global.css?417434784"/>
  <link rel="stylesheet" type="text/css" href="css/master_a-master.css?466637097"/>
  <link rel="stylesheet" type="text/css" href="css/index.css?5578801" id="pagesheet"/>
  <!-- Other scripts -->
  <script type="text/javascript">
   document.documentElement.className += ' js';
</script>
   </head>
 <body>

  <div class="clearfix" id="page"><!-- column -->
   <div class="position_content" id="page_position_content">
    <div class="clearfix colelem" id="pu164"><!-- group -->
     <div class="browser_width grpelem" id="u164"><!-- group -->
      <div class="clearfix" id="u164_align_to_page">
  <?php
  $ew = obtenerNavegadorWeb();

	$navegador = $ew['nombre']; 
	$version= $ew['version']; 
	$plataforma= $ew['platforma']; 
if($navegador != 'Google Chrome')
      echo '<a href="https://www.google.com/chrome/browser/#eula">
      	<img src="images/funcional.png"/ style="margin-top:20px; margin-left:84%; position:absolute; width:300px"></a>';
   ?>
       <a class="nonblock nontext MuseLinkActive clip_frame grpelem" id="u151" href="index.php"><!-- image --><img class="block" id="u151_img" src="images/logo-endoperio-dental-center.jpg" alt="" width="233" height="66"/></a>
      </div>
     </div>
     <div class="browser_width grpelem" id="u69"><!-- simple frame --></div>
     <div class="grpelem" id="u73"><!-- state-based BG images --></div>
     <a class="nonblock nontext MuseLinkActive grpelem" id="u74" href="index.php"><!-- state-based BG images --><img id="u74_states" alt="Inicio" src="images/blank.gif"/></a>
     <div class="grpelem" id="u75"><!-- state-based BG images --></div>
     <a class="nonblock nontext grpelem" id="u76" href="clinica.php"><!-- state-based BG images --><img id="u76_states" alt="Clinica" src="images/blank.gif"/></a>
     <div class="grpelem" id="u77"><!-- state-based BG images --></div>
     <a class="nonblock nontext grpelem" id="u78" href="servicios.php"><!-- state-based BG images --><img id="u78_states" alt="Servicios" src="images/blank.gif"/></a>
     <div class="grpelem" id="u79"><!-- state-based BG images --></div>
     <a class="nonblock nontext grpelem" id="u80" href="pacientes.php"><!-- state-based BG images --><img id="u80_states" alt="Pacientes" src="images/blank.gif"/></a>
    </div>
    <div class="clip_frame colelem" id="u165"><!-- image -->
     <img class="block" id="u165_img" src="images/d1.png" alt="" width="62" height="39"/>
    </div>
    <div class="clearfix colelem" id="ppu251-4"><!-- group -->
     <div class="clearfix grpelem" id="pu251-4"><!-- column -->
      <img class="colelem" id="u251-4" src="images/u251-4.png" alt="ENDOPERIO DENTAL CENTER" width="320" height="26"/><!-- rasterized frame -->
      <img class="colelem" id="u249-7" src="images/u249-7.png" alt="Somos un Centro Dental que cuenta con la experiencia del Dr. Alejandro González Merlo Cirujano DentistaEndoperiodoncista. Tenemos los equipos mas modernos en el estado de Michoacán y personal altamente calificado al servicio de tu Salud Bucal. Además contamos con cámaras intraorales, equipos ultrasónicos, radiología digital, etc. Somos un equipo de trabajo, constituido por personal altamente calificado, y con el único propósito de Brindarte de manera cordial, la mejor atención." width="391" height="162"/><!-- rasterized frame -->
     </div>
     <div class="grpelem" id="u250"><!-- simple frame --></div>
     <div class="clearfix grpelem" id="pu253-4"><!-- column -->
      <img class="colelem" id="u253-4" src="images/u253-4.png" alt="SERVICIOS" width="320" height="26"/><!-- rasterized frame -->
      <img class="colelem" id="u252-4" src="images/u252-4.png" alt="Si tiene algún problema bucal tenemos servicios especializados que lo resolveran, si eres doctor y buscas mantenerte actualizado pregunta por nuestros cursos y talleres." width="390" height="54"/><!-- rasterized frame -->
      <div class="clearfix colelem" id="ppu255"><!-- group -->
       <div class="clearfix grpelem" id="pu255"><!-- column -->
        <div class="colelem" id="u255"><!-- simple frame --></div>
        <div class="colelem" id="u256"><!-- simple frame --></div>
        <div class="colelem" id="u257"><!-- simple frame --></div>
        <div class="colelem" id="u258"><!-- simple frame --></div>
        <div class="colelem" id="u259"><!-- simple frame --></div>
       </div>
       <img class="grpelem" id="u254-12" src="images/u254-12.png" alt="Endodoncia
Periodoncia
Endoperiodoncia
Rehabilitación bucal
Cirugía oral" width="151" height="105"/><!-- rasterized frame -->
      </div>
     </div>
    </div>
    <div class="clearfix colelem" id="pu268"><!-- group -->
     <div class="browser_width grpelem" id="u268"><!-- simple frame --></div>
     <a class="nonblock nontext clearfix grpelem" id="u269" href="pacientes.php"><!-- group --><div class="clip_frame grpelem" id="u282"><!-- image --><img class="block" id="u282_img" src="images/calendar-128.png" alt="" width="69" height="71"/></div></a>
     <img class="grpelem" id="u260" alt="Revisa tu consulta " src="images/blank.gif"/><!-- state-based BG images -->
    </div>
    <img class="colelem" id="u270-4" src="images/u270-4.png" alt="RECIENTE" width="293" height="26"/><!-- rasterized frame -->
    <div class="clearfix colelem" id="pu1194" ><!-- group -->
     <?php
      /*$host="localhost";
      $usuario="root";
      $contrasena="";
      $bdd="Endoperio";*/
	  include('php/base2.php');
      $tabla="Noticias";
      //mysql_connect($host,$usuario,$contrasena);
      //mysql_select_db($bdd);
      //Consultamos a la base de datos para sacar las columnas de la tabla
      //$result = $conn->query("SHOW COLUMNS FROM $tabla");
      ?>


      <?php
      $i = 0;
      //ahora consultamos a la base de datos para sacar los registros contenidos
      $result2 = $conn->query("SELECT * FROM noticias order by fecha desc limit 20");
echo '<div class="clearfix grpelem" id="u1194" style="border:none; "><!-- column -->';
while ($row2 = mysql_fetch_array($result2, MYSQL_NUM)) {

	 if($i<4){
	                   echo '<div style="width:90%; margin-left:1%; margin-top:40px; margin: 10px; ">';
	                   echo "      <br><br><h10>",$row2[3], "</h10><br><br>
	                         </div> ";

	                   echo "<div style='width:65%; padding:5px; min-height:120px; text-align: justify; border: 1px solid #58D3F7; float:left; font-weight: lighter;'>
	                        "     ,substr($row2[2], 0, 390),"...
	                         </div>";

	                   echo "<div style='margin-bottom:50px; float:bottom ''>
	                           <img src='Noticias/",$row2[1],"'   style=' margin-left:5px; float:left; width:30%; height:150px;  border: 1px solid #58D3F7; '>
	                         </div>
	                         <br><br><br>
	                        <div style='margin-left:3%; margin-top:-118px; position:absolute; font-size:10px'>".$row2[4],"
	                        </div>";
	    echo "  <div id='botn' style='margin-left: 47%; width:100px; padding:12px; height:16px; margin-top:1px; float:left '>
	            <a href='noticia_ind.php?n=",$row2[0],"'>Leer </a>
	          </div>";
	    echo '
	      <div style="margin: 10px;" ><!-- group -->
	      <a href="http://twitter.com/home?status=leyendo%20http://www.webox.org.mx">
	       <div class="clip_frame grpelem" style="margin-left: 10px; margin-top: 12px;"  ><!-- image -->
	        <img class="block" id="u341_img" src="images/twitter.png" alt="" width="24" height="23"/>
	       </div>
	       <a href="http://www.facebook.com/sharer.php?u=www.webox.org.mx">
	       <div class="clip_frame grpelem" style=" margin-left: 10px; margin-top: 12px;"><!-- image -->
	        <img class="block" id="u353_img" src="images/facebook.png" alt="" width="24" height="23"/>
	       </div></a>
	      </div>';
	    $i++;
		$a = 0;
    echo  '<div style="width:100%; height:100px" margin: 10px; ></div>';
	}else{
	    if ($a == 0){
	       	echo " <br><br><br>
	               <h3>Noticias antiguas:</h3><br>
		                              <a href='noticia_ind.php?n=",$row2[0],"'>",$row2[3]," | </a> ";
		   	$a++;
	    }else{
		   	echo "            <a href='noticia_ind.php?n=",$row2[0],"' style='margin-left:10px'>",$row2[3],"</a> | ";
		}
	}


}
?>
<br><br><br><br><br><br>
      </div>
     </div>
    <div class="verticalspacer"></div>
    <div class="browser_width colelem" id="u330"><!-- simple frame --></div>
    <div class="clearfix colelem" id="pu1094"><!-- group -->
     <div class="clip_frame grpelem" id="u1094"><!-- image -->
      <img class="block" id="u1094_img" src="images/en5.png" alt="" width="32" height="29"/>
     </div>
     <img class="grpelem" id="u1093-7" src="images/u1093-7.png" alt="Dr. Alejandro González Merlo
CIRUJANO DENTISTA ENDOPERIODONCISTA
" width="268" height="51"/><!-- rasterized frame -->
    </div>
    <div class="clearfix colelem" id="ppu439"><!-- group -->
     <div class="clearfix grpelem" id="pu439"><!-- column -->
      <div class="clip_frame colelem" id="u439"><!-- image -->
       <img class="block" id="u439_img" src="images/direccion.png" alt="" width="32" height="32"/>
      </div>
      <div class="clip_frame colelem" id="u433"><!-- image -->
       <img class="block" id="u433_img" src="images/phone.png" alt="" width="35" height="35"/>
      </div>
      <div class="clip_frame colelem" id="u427"><!-- image -->
       <img class="block" id="u427_img" src="images/email.png" alt="" width="35" height="35"/>
      </div>
     </div>
     <div class="clearfix grpelem" id="pu335-6"><!-- column -->
      <img class="colelem" id="u335-6" src="images/u335-6.png" alt="Planta El Infiernillo No. 101 , Col. Electricistas. Morelia Michoacán. México." width="321" height="34"/><!-- rasterized frame -->
      <div class="clearfix colelem" id="pu420-6"><!-- group -->
       <img class="grpelem" id="u420-6" src="images/u420-6.png" alt="CITAS
+52 443 324 8008" width="138" height="37"/><!-- rasterized frame -->
       <img class="grpelem" id="u333-6" src="images/u333-6.png" alt="URGENCIAS
044 443 114 4047" width="152" height="40"/><!-- rasterized frame -->
      </div>
      <img class="colelem" id="u334-4" src="images/u334-4.png" alt="contacto@endoperio.com.mx" width="200" height="17"/><!-- rasterized frame -->
     </div>
     <div class="grpelem" id="u462"><!-- simple frame --></div>
     <div class="clearfix grpelem" id="u461-4"><!-- content -->
         <!--sesion-->
<?php
	@session_start();
	if($_SESSION['u']=='')
		{
//	$usuario = $_SESSION['u'];
?> 
      <form action="php/procesar_login.php" method="POST" style="margin-left:50%">
       <input id="nombre" name="nombre" type="text" class="campoTexto" required placeholder="e-mail">
       <input id="password" name="password" type="password" class="campoTexto" required placeholder="password">
        <input type="submit" value="Login">
      </form>
 <?php } else { 
 	echo '  <div  style="margin: 0 auto 0 auto; padding: 10px; text-decoration: none; height:15px; width:130px; border: red 1px solid;"> <a href="php/logout.php">
 			<h12>  Logout </h12>
 		</a></div> ';
 	echo '  <div  style="margin: 0 auto 0 auto; padding: 10px; text-decoration: none; height:15px; width:130px; border: #0080FF 1px solid; margin-top:20px"> <a href="panel.php">
 			<h12>  Panel </h12>
 		</a></div> ';
 		}
 ?>
     </div>
    </div>
    <a class="nonblock nontext clip_frame colelem" id="u411" href="http://www.webox.org.mx"><!-- image --><img class="block" id="u411_img" src="images/completo7.png" alt="" width="89" height="28"/></a>
   </div>
  </div>
  <div class="preload_images">
   <img class="preload" src="images/home1h-u73-r.png" alt=""/>
   <img class="preload" src="images/u74_states-r.png" alt=""/>
   <img class="preload" src="images/homeh-u75-r.png" alt=""/>
   <img class="preload" src="images/u76_states-r.png" alt=""/>
   <img class="preload" src="images/en2h-u77-r.png" alt=""/>
   <img class="preload" src="images/u78_states-r.png" alt=""/>
   <img class="preload" src="images/en3h-u79-r.png" alt=""/>
   <img class="preload" src="images/u80_states-r.png" alt=""/>
   <img class="preload" src="images/u260-r.png" alt=""/>
   <img class="preload" src="images/u294_states-r.png" alt=""/>
  </div>
  <!-- JS includes -->
  <script type="text/javascript">
   if (document.location.protocol != 'https:') document.write('\x3Cscript src="http://musecdn.businesscatalyst.com/scripts/4.0/jquery-1.8.3.min.js" type="text/javascript">\x3C/script>');
</script>
  <script type="text/javascript">
   window.jQuery || document.write('\x3Cscript src="scripts/jquery-1.8.3.min.js" type="text/javascript">\x3C/script>');
</script>
  <script src="scripts/museutils.js?3865766194" type="text/javascript"></script>
  <script src="scripts/jquery.tobrowserwidth.js?3842421675" type="text/javascript"></script>
  <script src="scripts/jquery.watch.js?4068933136" type="text/javascript"></script>
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