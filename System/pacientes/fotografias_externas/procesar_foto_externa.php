<html>
<head>
  <title>Panel Administrador</title>
</head>
<body>
  <?php
  include('../../php/base.php');
  date_default_timezone_set("Mexico/General");

  $a = $_POST['id'];
  $b = $_POST['descripcion'];
  $c = $_POST['img_num'];

  $total = count($_FILES['imagen']['name']);
  
  if($_FILES['imagen']['name'][0]!=""){

    for($i=0; $i<$total; $i++){

      copy($_FILES['imagen']['tmp_name'][$i],$_FILES['imagen']['name'][$i]);
      $imagen=$_FILES['imagen']['name'][$i];
      $imagen=htmlspecialchars($imagen);

      $nombre_foto = "e_".$a."_".$c.".jpg";

      $insertar = "insert into fotografias_externas (id_paciente, fecha_foto, descripcion, nombre_foto) values ('$a', now(),'$b', '$nombre_foto')";
      if(!$conn->query($insertar))
        die('Error de consulta: '.mysqli_error($conn));
        /****************************************/
      
      rename($imagen,"imagenes/$nombre_foto");
      chmod("imagenes/$nombre_foto", 0777);

      $c++;
      // echo $nombre_foto;
    }
        /****************************************/
    mysqli_close($conn);
    $a = '../ficha-paciente.php?id='.$a;
    echo '<br><br><br><center><img src="../../images/endoperio2.png" width="100px" alt=""> <br> ';
    echo "Foto(s) subida(s) con exito<br><br><br>";
    echo '<div style="  padding:9px; border:1px solid #E6E6E6; height:18px; width:120px; margin-top:12px; text-align:center; margin-right:10px ">';
    //header('location: ../ficha-paciente.php?id='.$ficha);
    echo "<a href='",$a,"' > <font color='white'>Regresar </a></center></div>";
    echo '<META HTTP-EQUIV="Refresh" CONTENT="3; URL=',$a,'">';
    
  }
  
  else{
    echo '<br><br><br><center><img src="../../images/endoperio2.png" width="100px" alt=""> <br> ';
    echo "Error: No ha seleccionado ninguna imagen, regrese<br><br><br>";
    echo '<div style="  padding:9px; border:1px solid #E6E6E6; height:18px; width:120px; margin-top:12px; text-align:center; margin-right:10px ">';
  }
    
  ?>
</body>
</html>