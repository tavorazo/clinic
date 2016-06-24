<?php
    /* Empezamos la sesión */
    session_start();

    include('base.php');
    $sql      =   'SELECT * from usuarios where correo="'.$_POST['nombre'].'" AND password="'.$_POST['password'].'";';
    $resul    =   $conn->query($sql);
    $renglon  = $resul->fetch_assoc();

    if($renglon['correo']!=''){
        $_SESSION['u']        = $renglon['id_usuario'];
        $_SESSION['rol']      = $renglon['rol'];
        $_SESSION['nombres']  = $renglon['nombres'];
        $_SESSION['sucursal'] = $renglon['id_sucursal'];

        $msj_r = "<br><h2>Iniciando sesi&oacute;n</h2><br><h2> Bienvenido ".utf8_encode($renglon['nombres'])."</h2>";

        if ($renglon['rol'] == 'merca') 
          $url_r = '1; URL=../merca/';
        else
          $url_r = '1; URL=../panel.php"';
    }
    else{
        $msj_r = '<br><h2>Tu inicio de sesi&oacute;n ha sido incorrecto <br> vuelve a intentar</h2>';
        $url_r = '3; URL=../../log.php';
    }
    
?>
 
<!DOCTYPE html>
<html lang="es">
    <head>
            <title>Endoperio | Iniciando sesión</title>
    </head>
 
    <body>
        <div>
            <section>
              <center>
                <img src="../images/35.gif" alt="">
                <p style="font-family: Arial, Helvetica, sans-serif"> 
                    <?php echo $msj_r; ?>
                    <META HTTP-EQUIV="Refresh" CONTENT="<?php echo $url_r?>">
                </p>
              </center>
            </section>
        </div>
    </body>
</html>