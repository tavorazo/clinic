<?php
	@session_start();
	if($_SESSION['u']=='')
		header('location: ../index.php');
		$usuario = $_SESSION['u'];
?>
<?php
	/*$dbh = mysql_connect('localhost','root','') or die('Error de conexion: ' . mysql_error() );
	$base = mysql_select_db('Endoperio') or die('Error de seleccion de base: ' . mysql_error() );*/
	include('../php/base.php');
	$id = $_GET['id'];
  $paciente = $_GET['paciente'];
	
	$select = "select * from paciente where id_paciente='$id';";
	$resul = $conn->query($select) or die ("problema con la solicitud");
	$renglon = mysql_fetch_assoc($resul);
?>

<!DOCTYPE html>
<html class="html">
 <head>

  <meta http-equiv="Content-type" content="text/html;charset=UTF-8"/>
  <meta name="generator" content="7.0.314.244"/>
  <title>Modifciar paciente</title>
      <link rel="shortcut icon" type="x-icon" href="../images/icon.png" /><!--para logo en barra-->
  
  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="../css/s1.css"/>
    <link rel="stylesheet" type="text/css" href="../css/texto.css"/>

  <link rel="stylesheet" type="text/css" href="../css/site_global.css?417434784"/>
  <link rel="stylesheet" type="text/css" href="../css/master_panel-master.css?3855693814"/>
  <link rel="stylesheet" type="text/css" href="../css/add-paciente.css?335997060" id="pagesheet"/>
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
       <a class="nonblock nontext clip_frame grpelem" id="u513" href="../index.php"><!-- image --><img class="block" id="u513_img" src="../images/logo-endoperio-dental-center.jpg" alt="" width="134" height="38"/></a>
       <div class="grpelem" id="u516"><!-- simple frame --></div>
       <div class="clearfix grpelem" id="u518-5"><!-- content -->
       <p><?php echo $_SESSION['nombres'];?>&nbsp; | <span id="u518-2"> <a href="../php/logout.php"><h12> cerrar sesion</h12></a></span></p>
       </div>
      </div>
     </div>
     <a href="../panel.php">
      <img class="grpelem" id="u372" alt="servicios" src="../images/blank.gif"/><!-- state-based BG images -->
      </a>
    </div>
    <div class="clearfix colelem" id="pu375"><!-- group -->
     <div class="browser_width grpelem" id="u375"><!-- simple frame --></div>
     <a class="nonblock nontext grpelem" id="u376" href="../agenda.php"><!-- state-based BG images --><img id="u376_states" alt="Registro de consultas" src="../images/blank.gif"/></a>
     <a class="nonblock nontext grpelem" id="u377" href="../buscar-paciente.php"><!-- state-based BG images --><img id="u377_states" alt="Buscar paciente" src="../images/blank.gif"/></a>
     <a class="nonblock nontext MuseLinkActive grpelem" id="u378" href="../add-paciente.php"><!-- state-based BG images --><img id="u378_states" alt="Agregar pacientes" src="../images/blank.gif"/></a>
     <a class="nonblock nontext grpelem" id="u480" href="../add-usuario.php"><!-- state-based BG images --><img id="u480_states" alt="Agregar usuarios" src="../images/blank.gif"/></a>
     <a class="nonblock nontext grpelem" id="u550" href="../almacen.php"><!-- state-based BG images --><img id="u550_states" alt="Almacen" src="../images/blank.gif"/></a>
     <a class="nonblock nontext grpelem" id="u552" href="../contabilidad.php"><!-- state-based BG images --><img id="u552_states" alt="Contabilidad" src="../images/blank.gif"/></a>
    </div>
    <div class="clearfix colelem" id="pu388-4" ><!-- group -->
     <img class="grpelem" id="u388-4" src="../images/u388-4.png" alt="Agregar paciente" width="237" height="29"/>
     <!-- rasterized frame -->
     <div class="clearfix grpelem" id="u397-4" ><!-- content -->
      <!--p>*Esto es un ejemplo</p-->
     </div>
    </div>
    <div class="colelem" id="u464" ><!-- simple frame --></div>
    <div class="verticalspacer" ></div>
 
<form action="images_pacientes/proceso_editar_paciente.php" method="POST" enctype="multipart/form-data"  style="margin-top:-50px; z-index:300; background:#FFFFFF; padding:20px; width:90%" >
    <br>
    <input type="hidden" value="<?php echo $id; ?>" name="id">
    <!--<label style="float:left; width:150px; margin-right:15%">Id Expediente:</label> <input type="text" name="expediente" class="campoT" required
    value="<?php echo $renglon['n_registro']?>">--><br>
    <label style="float:left; width:150px; margin-right:15%">Nombre(s):</label> <input type="text" name="nombre"  class="campoT" required
    value="<?php echo $renglon['nombres']?>"><br>
    <label style="float:left; width:150px; margin-right:15%">Apellido Paterno: </label><input type="text" name="a_pat" class="campoT" required
    value="<?php echo $renglon['apellido_paterno']?>"><br>
    <label style="float:left; width:150px; margin-right:15%">Apellido Materno:</label><input type="text" name="a_mat" class="campoT" required
    value="<?php echo $renglon['apellido_materno']?>"><br>

    <!--la fecha cambiarla a un solo campo con atributo date html5-->
    <label style="float:left; margin-right:13%">Fecha de nacimiento: </label>
      <!--label style="float:left">dd </label--> 
      <input type="date" name="fechaNacimiento" class="campoT"  required style="width:200px; float:left;" value="<?php echo $renglon['fecha_nacimiento']?>">
      <!--label style="float:left;">mm </label> <input type="number" name="mes" class="campoT"  required style="width:100px; float:left">
      <label style="float:left;">aa </label> <input type="number" name="ano" class="campoT"  required style="width:100px;"--><br>
    <br><br>
    <label style="float:left; width:150px; margin-right:15%">Sexo:</label>
    <select name="sexo" class="campoT" required>
      <option value="NULL"> selecciona sexo</option>
      <?php
      	if($renglon['sexo']=='Masculino')
      		echo '<option value="Masculino" selected>Mascuino</option>';
      	else
      		echo '<option value="Femenino" seleted>Femenino</option>';
      ?>
      <!--<option value="Masculino" >Masculino</option>
      <option value="Femenino">Femenino</option>-->
    </select><br>
    <label style="float:left; width:150px; margin-right:15%">Estado: </label >
    <input type="text" name="estado" class="campoT" required value="<?php echo $renglon['estado']?>"></br>

    <label style="float:left; width:150px; margin-right:15%">Ciudad: </label>
      <input type="text" name="ciudad" class="campoT" placeholder="ejemplo:Morelia"  required value="<?php echo $renglon['ciudad']?>"></br>
    <label style="float:left; width:150px; margin-right:15%">Calle: </label>
      <input type="text" name="calle" class="campoT" required style=" width:200px; float:left;margin-right:1%" value="<?php echo $renglon['calle']?>"> 
    <label style="float:left; width:150px; ">Numero: </label>
      <input type="number" name="numero" class="campoT" required style=" width:50px;" value="<?php echo $renglon['numero']?>">
    <label style="float:left; width:150px; margin-right:15%">Colonia: </label>
      <input type="text" name="colonia" class="campoT" required value="<?php echo $renglon['colonia']?>">
    <label style="float:left; width:150px; margin-right:15%">Codigo Postal: </label>
      <input type="tel" name="cp" class="campoT" required value="<?php echo $renglon['CP']?>"></br>
<!--localizacion-->
    <label style="float:left; width:150px; margin-right:15%">Telefono: </label>
      <input type="tel" name="telefono" class="campoT" required value="<?php echo $renglon['telefono']?>">
    <label style="float:left; width:150px; margin-right:15%" value="ej:3342098712">Celular: </label>
      <input type="tel" name="celular" class="campoT" required value="<?php echo $renglon['celular']?>"></br>
    <label style="float:left; width:150px; margin-right:15%">Correo: </label>
      <input type="mail" name="correo" class="campoT" required value="<?php echo $renglon['correo']?>"></br>
<!--emergencia-->
    <label style="float:left; width:150px; margin-right:15%">Llamar en emergencia: </label>
      <input type="tel" name="name_emergencia" class="campoT" required value="<?php echo $renglon['name_emergencia']?>"></br>
    <label style="float:left; width:150px; margin-right:15%">Tel de emergencia: </label>
      <input type="tel" name="tel_emergencia" class="campoT" required value="<?php echo $renglon['tel_emergencia']?>"></br>
<!--referencia y empresa-->
    <label style="float:left; width:150px; margin-right:15%">Referencia: </label>
      <input type="text" name="referencia" class="campoT" required value="<?php echo $renglon['referencia']?>"></br>
    <label style="float:left; width:150px; margin-right:15%">Empresa: </label>
      <input type="text" name="empresa" class="campoT" required value="<?php echo $renglon['empresa']?>"></br>
    <!--label style="float:left; width:150px; margin-right:15%">Fecha de alta: </label>
      <input type="date" name="fecha_alta" class="campoT" required value="<?php echo $renglon['fecha_alta']?>"></br-->

    <label style="float:left; width:150px; margin-right:15%">RFC: </label>
      <input type="text" name="RFC" class="campoT" required value="<?php echo $renglon['RFC']?>"></br>
    <label style="float:left; width:150px; margin-right:15%">Observaciones: </label>
      <textarea rows="4" cols="50" name="observaciones"  required ><?php echo $renglon['calle']?>
      </textarea>
      <!--input type="textarea" name="observaciones" class="campoT" required--></br>
   
    <label style="float:left; width:150px; margin-right:15%">Num seguro: </label>
      <input type="number" name="Num_seguro" class="campoT" required value="<?php echo $renglon['Num_seguro']?>"></br>

    <label style="float:left; width:150px; margin-right:15%">Foto de ingreso</label>
    	<?php echo "<img src='images_pacientes/",$renglon['foto_ingreso'],"' style='width:150px; height:150px; border-radius:200px; border: #BDBDBD 1px solid'>"?>
    	<br>
    	<br><br><label>selecciona otra imagen para cambiar o deja el espacio en blanco</label><br><br>
      <input type="file" name="imagen" class="campoT" style="float:left"><br>
    <br><br>
    <input type="hidden" name="paciente" value="<?php echo $paciente; ?>">
    <input type="submit" value="Editar" style="margin-left:0%; float:bottom; ">
    <input type="reset" value="Resetear">
  </form>

    <a class="nonblock nontext clip_frame colelem" id="u405" href="http://www.webox.org.mx"><!-- image --><img class="block" id="u405_img" src="images/completo7.png" alt="" width="62" height="19"/></a>
   </div>
  </div>
  <div class="preload_images">
   <img class="preload" src="../images/u372-r.png" alt=""/>
   <img class="preload" src="../images/u376_states-r.png" alt=""/>
   <img class="preload" src="../images/u376_states-a.png" alt=""/>
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
  <script type="text/javascript">
   if (document.location.protocol != 'https:') document.write('\x3Cscript src="http://musecdn.businesscatalyst.com/scripts/4.0/jquery-1.8.3.min.js" type="text/javascript">\x3C/script>');
</script>
  <script type="text/javascript">
   window.jQuery || document.write('\x3Cscript src="scripts/jquery-1.8.3.min.js" type="text/javascript">\x3C/script>');
</script>
  <script src="../scripts/museutils.js?3865766194" type="text/javascript"></script>
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