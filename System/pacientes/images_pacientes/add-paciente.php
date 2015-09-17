<?php
	@session_start();
	if($_SESSION['u']=='')
		header('location: index.php');
	//if($_SESSION['rol']!='admin' ||)
	//	header('location: panel.php');
	$usuario = $_SESSION['u'];
?>
<!DOCTYPE html>
<html class="html">
 <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

  
  <meta name="generator" content="7.0.314.244"/>
  <title>add&#45;paciente</title>
      		<link rel="shortcut icon" type="x-icon" href="images/icon.png" /><!--para logo en barra-->
  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="css/texto.css"/>
  <link rel="stylesheet" type="text/css" href="css/s1.css"/>

  <link rel="stylesheet" type="text/css" href="css/site_global.css?417434784"/>
  <link rel="stylesheet" type="text/css" href="css/master_panel-master.css?3855693814"/>
  <link rel="stylesheet" type="text/css" href="css/add-paciente.css?335997060" id="pagesheet"/>
  <style>
      #container {
          margin: 0px auto;
          width: 250px;
          border: 4px #00BFFF solid;
      }
      #videoElement {
          width: 250px;
          background-color: #666;
      }
      #canvas {
          width: 260px;
          
          background-color: #F2F2F2;
      }
      .buttom{
          background: #A4A4A4;
          opacity:  0.8;
          padding: 5px;
          margin-top: -350px;
          margin-left: 40px;
          color: white;
          width: 120px;
          height: 30px;
      }
  </style>

      <!-- Other scripts -->
      <script type="text/javascript">
       document.documentElement.className += ' js';
      </script>
   </head>
 <body>

  <div class="clearfix" id="page"><!-- column -->
   <div class="position_content" id="page_position_content">
    <div class="clearfix colelem" id="pu366"><!-- group -->
     <div class="browser_width grpelem" id="u366"><!-- group -->
      <div class="clearfix" id="u366_align_to_page">
       <a class="nonblock nontext clip_frame grpelem" id="u513" href="index.php"><!-- image --><img class="block" id="u513_img" src="images/logo-endoperio-dental-center.jpg" alt="" width="134" height="38"/></a>
       <div class="grpelem" id="u516"><!-- simple frame --></div>
       <div class="clearfix grpelem" id="u518-5"><!-- content --> 
       <p><?php echo $_SESSION['nombres'];?>&nbsp; | <span id="u518-2"> <a href="php/logout.php"><h12> cerrar sesi贸n</h12></a></span></p>

       </div>
      </div>
     </div>
     <a href="panel.php">
      <img class="grpelem" id="u372" alt="servicios" src="images/blank.gif"/><!-- state-based BG images -->
      </a>
    </div>
    <div class="clearfix colelem" id="pu375"><!-- group -->
     <div class="browser_width grpelem" id="u375"><!-- simple frame --></div>
<?php
if($_SESSION['rol']=='admin' || $_SESSION['rol']=='secretaria' || $_SESSION['rol']=='recepcionista')
echo '<a class="nonblock nontext grpelem" id="u376" href="agenda.php"> <img id="u376_states" alt="Registro de consultas" src="images/blank.gif"/></a>';

if($_SESSION['rol']=='admin' || $_SESSION['rol']=='secretaria' || $_SESSION['rol']=='recepcionista' || $_SESSION['rol']=='dentista')
echo '<a class="nonblock nontext grpelem" id="u377" href="buscar-paciente.php"> <img id="u377_states" alt="Buscar paciente" src="images/blank.gif"/></a>';

if($_SESSION['rol']=='admin' || $_SESSION['rol']=='secretaria' || $_SESSION['rol']=='recepcionista')
echo '<a class="nonblock nontext grpelem" id="u378" href="add-paciente.php"> <img id="u378_states" alt="Agregar pacientes" src="images/blank.gif"/></a>';

if($_SESSION['rol']=='admin')
echo '<a class="nonblock nontext grpelem" id="u480" href="add-usuario.php"> <img id="u480_states" alt="Agregar usuarios" src="images/blank.gif"/></a>';

if($_SESSION['rol']=='admin' || $_SESSION['rol']=='almacen')
echo '<a class="nonblock nontext grpelem" id="u550" href="almacen.php"> <img id="u550_states" alt="Almacen" src="images/blank.gif"/></a>';

if($_SESSION['rol']=='admin')
echo '<a class="nonblock nontext grpelem" id="u552" href="contabilidad.php"> <img id="u552_states" alt="Contabilidad" src="images/blank.gif"/></a>';

?>
    </div>
    <div class="clearfix colelem" id="pu388-4" ><!-- group -->
     <img class="grpelem" id="u388-4" src="images/u388-4.png" alt="Agregar paciente" width="237" height="29"/><!-- rasterized frame -->
     <div class="clearfix grpelem" id="u397-4" ><!-- content -->
      <!--p>*Esto es un ejemplo</p-->
     </div>
    </div>
    <div class="colelem" id="u464" ><!-- simple frame --></div>
    <div class="verticalspacer" ></div>
 
<form action="pacientes/images_pacientes/nuevo_paciente.php" method="POST" enctype="multipart/form-data"  style="margin-top:-50px; z-index:300; background:#FFFFFF; padding:20px; width:90%" >
    <!--a href="menu.php">Regresar</a--><br>
    <label style="float:left; width:150px; margin-right:15%">Id Expediente:</label> <input type="text" name="expediente" class="campoT" required><br><!--n_registro-->
    <label style="float:left; width:150px; margin-right:15%">Nombre(s):</label> <input type="text" name="nombre"  class="campoT" required><br>
    <label style="float:left; width:150px; margin-right:15%">Apellido Paterno: </label><input type="text" name="a_pat" class="campoT" required><br>
    <label style="float:left; width:150px; margin-right:15%">Apellido Materno:</label><input type="text" name="a_mat" class="campoT" required><br>

    <!--la fecha cambiarla a un solo campo con atributo date html5-->
    <label style="float:left; margin-right:13%">Fecha de nacimiento: </label>
      <!--label style="float:left">dd </label--> 
      <input type="date" name="fechaNacimiento" class="campoT"  required style="width:200px; float:left;">
      <!--label style="float:left;">mm </label> <input type="number" name="mes" class="campoT"  required style="width:100px; float:left">
      <label style="float:left;">aa </label> <input type="number" name="ano" class="campoT"  required style="width:100px;"--><br>
    <br><br>
    <label style="float:left; width:150px; margin-right:15%">Sexo:</label>
    <select name="sexo" class="campoT" required>
      <option value="NULL"  > selecciona sexo</option>
      <option value="Masculino" >Masculino</option>
      <option value="Femenino">Femenino</option>
    </select><br>
    <label style="float:left; width:150px; margin-right:15%">Estado: </label >
    <!--input type="text" name="estado" class="campoT" required></br-->
    
    <select name="estado" required class="campoT">
        <option value="NULL" >selecciona estado</option>
        <option value="Aguascalientes">Aguascalientes</option>
        <option value="Baja California">Baja California</option>
        <option value="Baja California Sur">Baja California Sur</option>
        <option value="Campeche">Campeche</option>
        <option value="Chiapas">Chiapas</option>
        <option value="Chihuahua">Chihuahua</option>
        <option value="Coahuila">Coahuila</option>
        <option value="Colima">Colima</option>
        <option value="Distrito Federal">Distrito Federal</option>
        <option value="Durango">Durango</option>
        <option value="Guanajuato">Guanajuato</option>
        <option value="Guerrero">Guerrero</option>
        <option value="Hidalgo">Hidalgo</option>
        <option value="Jalisco">Jalisco</option>
        <option value="Mexico">Mexico</option>
        <option value="Michoacan de Ocampo">Michoacan de Ocampo</option>
        <option value="Morelos">Morelos</option>
        <option value="Nayarit">Nayarit</option>
        <option value="Nuevo Leon">Nuevo Leon</option>
        <option value="Oaxaca">Oaxaca</option>
        <option value="Puebla">Puebla</option>
        <option value="Queretaro">Queretaro</option>
        <option value="Quintana Roo">Quintana Roo</option>
        <option value="San Luis Potosi">San Luis Potosi</option>
        <option value="Sinaloa">Sinaloa</option>
        <option value="Sonora">Sonora</option>
        <option value="Tabasco">Tabasco</option>
        <option value="Tamaulipas">Tamaulipas</option>
        <option value="Tlaxcala">Tlaxcala</option>
        <option value="Veracruz">Veracruz</option>
        <option value="Yucatan">Yucatan</option>
        <option value="Zacatecas">Zacatecas</option>
    </select>

    <label style="float:left; width:150px; margin-right:15%">Ciudad: </label>
      <input type="text" name="ciudad" class="campoT" placeholder="ejemplo:Morelia"  required></br>
    <label style="float:left; width:150px; margin-right:15%">Calle: </label>
      <input type="text" name="calle" class="campoT" required style=" width:200px; float:left;margin-right:1%"> 
    <label style="float:left; width:150px; ">Numero: </label>
      <input type="number" name="numero" class="campoT" required style=" width:50px;">
    <label style="float:left; width:150px; margin-right:15%">Colonia: </label>
      <input type="text" name="colonia" class="campoT" required>
    <label style="float:left; width:150px; margin-right:15%">Codigo Postal: </label>
      <input type="tel" name="cp" class="campoT" required></br>
<!--localizacion-->
    <label style="float:left; width:150px; margin-right:15%">Telefono: </label>
      <input type="tel" name="telefono" class="campoT" required>
    <label style="float:left; width:150px; margin-right:15%" value="ej:3342098712">Celular: </label>
      <input type="tel" name="celular" class="campoT" required></br>
    <label style="float:left; width:150px; margin-right:15%">Correo: </label>
      <input type="mail" name="correo" class="campoT" required></br>
<!--emergencia-->
    <label style="float:left; width:150px; margin-right:15%">Llamar en emergencia: </label>
      <input type="tel" name="name_emergencia" class="campoT" required></br>
    <label style="float:left; width:150px; margin-right:15%">Tel de emergencia: </label>
      <input type="tel" name="tel_emergencia" class="campoT" required></br>
<!--referencia y empresa-->
    <label style="float:left; width:150px; margin-right:15%">Referencia: </label>
      <input type="text" name="referencia" class="campoT" required></br>
    <label style="float:left; width:150px; margin-right:15%">Empresa: </label>
      <input type="text" name="empresa" class="campoT" required></br>
    <!--label style="float:left; width:150px; margin-right:15%">Fecha de alta: </label>
      <input type="date" name="fecha_alta" class="campoT" required></br--!>

    <label style="float:left; width:150px; margin-right:15%">RFC: </label>
      <input type="text" name="RFC" class="campoT" required></br>
    <label style="float:left; width:150px; margin-right:15%">Observaciones: </label>
      <textarea rows="4" cols="50" name="observaciones"  required>
      </textarea>
      <!--input type="textarea" name="observaciones" class="campoT" required--></br>
   
    <label style="float:left; width:150px; margin-right:15%">N. seguro: </label>
      <input type="number" name="Num_seguro" class="campoT" required></br>

    <br><br>
    <div id="container" style="float:left; margin-left:15px; margin-right:15px;">
        <video autoplay id="videoElement" >
         
        </video>
    </div>

    <canvas id="canvas" width="500" height="375"  ></canvas>

    <input type="button" value="Capturar" id="save" class="buttom" />
    <br><br>    
    <label style="float:left; width:150px; margin-right:15%">Foto de ingreso</label>
    <input type="file" name="imagen" class="campoT" style="float:left"><br>


<br><br><br>
	<input type="checkbox" name="validar" value="aceptados" required/> <a href="">Acepto los terminos</a><br><br>
    <input type="submit" value="Guardar" style="margin-left:0%; float:bottom; ">
    <input type="reset" value="Resetear">
     
  </form>
 


    <a class="nonblock nontext clip_frame colelem" id="u405" href="http://www.webox.org.mx"><!-- image --><img class="block" id="u405_img" src="images/completo7.png" alt="" width="62" height="19"/></a>
   </div>
  </div>
  <div class="preload_images">
   <img class="preload" src="images/u372-r.png" alt=""/>
   <img class="preload" src="images/u376_states-r.png" alt=""/>
   <img class="preload" src="images/u376_states-a.png" alt=""/>
   <img class="preload" src="images/u377_states-r.png" alt=""/>
   <img class="preload" src="images/u377_states-a.png" alt=""/>
   <img class="preload" src="images/u378_states-r.png" alt=""/>
   <img class="preload" src="images/u378_states-a.png" alt=""/>
   <img class="preload" src="images/u480_states-r.png" alt=""/>
   <img class="preload" src="images/u480_states-a.png" alt=""/>
   <img class="preload" src="images/u550_states-r.png" alt=""/>
   <img class="preload" src="images/u550_states-a.png" alt=""/>
   <img class="preload" src="images/u552_states-r.png" alt=""/>
   <img class="preload" src="images/u552_states-a.png" alt=""/>
  </div>
  <!-- JS includes -->
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
    </script>

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