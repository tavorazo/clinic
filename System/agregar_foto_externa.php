<?php
@session_start();
if($_SESSION['u']=='')
  header('location: index.php');
    //echo'<META HTTP-EQUIV="Refresh" CONTENT="0; URL=index.php">';
$usuario = $_SESSION['u'];
?>
<!DOCTYPE html>
<html class="html">
<head>
  <meta http-equiv="Content-type" content="text/html;charset=UTF-8"/>
  <meta name="generator" content="7.0.314.244"/>
  <title>agregar_foto_externa</title>
  <link rel="shortcut icon" type="x-icon" href="images/icon.png" /><!--para logo en barra-->
  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="css/s1.css"/>
  <link rel="stylesheet" type="text/css" href="css/texto.css"/>
  
  <link rel="stylesheet" type="text/css" href="css/site_global.css?417434784"/>
  <link rel="stylesheet" type="text/css" href="css/master_modif-master.css?3789319557"/>
  <link rel="stylesheet" type="text/css" href="css/agregar_receta.css?4008918636" id="pagesheet"/>
  <!-- Other scripts -->
  <script type="text/javascript">
  document.documentElement.className += ' js';
  </script>
</head>
<body>
  <div class="clearfix" id="page"><!-- column -->
   <div class="position_content" id="page_position_content">
    <div class="clearfix colelem" id="pu1145"><!-- group -->
     <div class="browser_width grpelem" id="u1145"><!-- group -->
      <div class="clearfix" id="u1145_align_to_page">
       <a class="nonblock nontext clip_frame grpelem" id="u1147" href="index.php"><!-- image --><img class="block" id="u1147_img" src="images/logo-endoperio-dental-center.jpg" alt="" width="134" height="38"/></a>
       <div class="grpelem" id="u1149"><!-- simple frame --></div>
       <div class="clearfix grpelem" id="u1150-5"><!-- content -->
        <p><?php echo $_SESSION['nombres'];?>&nbsp; | <span id="u518-2"> <a href="php/logout.php"><h12> cerrar sesion</h12></a></span></p>
      </div>
    </div>
  </div>
  <img class="grpelem" id="u1154" alt="Agregar " src="images/blank.gif"/><!-- state-based BG images -->
</div>
<div class="clearfix colelem" id="pu1132-5"><!-- group -->
 <div class="clearfix grpelem" id="u1132-5"><!-- content -->
 </div>
 <div class="clearfix grpelem" id="u1134-4">
   <!-- formulario agregar foto clinica -->
   <div class="wrapper">
    <?php
    $id_paciente = $_GET['id'];
    $img_num = $_GET['count'];
    echo " <h1><a href='pacientes/ficha-paciente.php?id=",$id_paciente,"'> < Regresar </a>  |";
    $nombre_foto = "e_".$id_paciente."_".$img_num;
    ?>
    Agregar Foto Externa</h1> <hr><br><br><br>
    <form method="POST" action="pacientes/fotografias_externas/procesar_foto_externa.php" enctype="multipart/form-data">
      <label>Imagen: </label>
      <input type="file" name="imagen" id="archivo" accept="image/jpeg"><br><br><br>
      <label>Descripcion: </label>
      <textarea name="descripcion" id="descripcion"></textarea><br>
      <input type="hidden" value="<?php echo $id_paciente; ?>" name="id" id="id_paciente">
      <!-- <input type="hidden" value="" name="val" id="val"> -->
      <input type="hidden" value="<?php echo $nombre_foto; ?>.jpg" name="nombre_foto" id="nombre_foto">
      <!-- <input type="hidden" value="externas/<?php echo $nombre_foto; ?>.jpg" name="ruta"> -->
      <input type="submit" value="Enviar"><input type="reset" value="borrar">
    </form>
  </div>
</div>
</div>
<div class="verticalspacer"></div>
</div>
</div>
<div class="preload_images">
 <img class="preload" src="images/u1154-r.png" alt=""/>
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

var request;
// $("#ajax").submit(function(event){
//   var values = $(this).serialize();
//   var url = "pacientes/fotografias_externas/procesar_foto_externa.php?id="+ $("#id_paciente").val()+ 
//   "&descripcion="+ $("#descripcion").val() + "&nombre_foto="+ $("#nombre_foto").val();

//   $.ajax({
//         url: "http://192.168.1.200/imagenes/NOEOCTAVIOABURTOINCLAN690/guardarb64.php",
//         type: "post",
//         data: values ,
//         success: function (response) {
//           window.location.href = url;
//         },
//         error: function(jqXHR, textStatus, errorThrown) {
//             $.ajax({
//               url: url,
//               type: "get"
//             });

//             alert("Guardado!");
//         }
//     });
// });

// File.prototype.convertToBase64 = function(callback){
//   var FR= new FileReader();
//   FR.onload = function(e) {
//       callback(e.target.result)  //convierte a base64
//   };       
//   FR.readAsDataURL(this);
// }

// $("#archivo").on('change',function(){
//       var selectedFile = this.files[0];
//       selectedFile.convertToBase64(function(base64){
//            var result = base64.split('base64,'); //divide la cadena para que sólo quede el código base 64
//            $('#val').attr( "value", result[1] );
//            //alert($("#descripcion").val());
//       }) 
// });

} catch(e) { Muse.Assert.fail('Error calling selector function:' + e); }});
</script>
</body>
</html>