<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-type" content="text/html;charset=UTF-8"/>
	
	<title>Listo</title>
	<link rel="stylesheet" type="text/css" href="css/texto.css"/>
	<style type="text/css" media="screen">
	body{
		background: steelblue;
		color: #1C1C1C;
	}
	a, a:hover{
		color: white;
		text-decoration: none;
	}
	</style>
</head>
<body>
	<?php
/*$link = mysql_connect('localhost', 'root', '')
    or die('No se pudo conectar: ' . mysql_error());
    mysql_select_db('Endoperio') or die('No se pudo seleccionar la base de datos');*/
    include('php/base3.php');
    include('php/base.php');
    $a = date(d);
    $b = date(m);
    $c = date(Y);
    $fecha_cumplea = "-$b-$a";
    $pacientes = mysql_query("select fecha_nacimiento, nombres, apellido_paterno, apellido_materno, correo from paciente WHERE fecha_nacimiento like '%$fecha_cumplea%';");
    $i = 0;
    echo '<br><br><br><center><img src="images/endoperio2.png" width="100px" alt=""> <br> ';
    echo "Enviando Correos de Felicitaciones<br><br><br>";
    echo '<div style="  padding:9px; border:1px solid #E6E6E6; height:18px; width:120px; margin-top:12px; text-align:center; margin-right:10px ">';
    echo "<a href='panel.php' > <font color='white'>Regresar </a></center></div>";
    
    while ($r_p = mysql_fetch_array($pacientes, MYSQL_NUM)){
    	print "$r_p[1] $r_p[2], $r_p[4]";
    	$remitente = 'endoperio@endoperio.com';
    	$destino = $r_p[4];
    	$asunto = "Feliz cumpleanos te desea Endoperio";
    	$mensaje = '
    	<html>
    	<head><meta http-equiv="Content-Type" content="text/html; charset=euc-jp">
    	<title>Felicidades</title>
    	</head>
    	<body>
    	<img src="http://www.webox.org.mx/Proyectos/endoperio/images/feliz.png">
    	</body>
    	</html>
    	';
    	$encabezados = 'MIME-Version: 1.0' . "\r\n";
    	$encabezados .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    	$encabezados .= "From: $remitente\nReply-To: $remitente" ;
    	if($destino!=''){
    		mail($destino, $asunto, $mensaje, $encabezados) or die ("No se ha podido enviar tu mensaje. Ha ocurrido un error") ;
    		echo " Enviado<br>";
    	}
    }
    /*usuarios*/
    $pacientes = mysql_query("select fecha_nacimiento, nombres, apellido_paterno, apellido_materno, correo from usuarios WHERE fecha_nacimiento like '%$fecha_cumplea%';");
    $i = 0;
    
    while ($r_p = mysql_fetch_array($pacientes, MYSQL_NUM)){
    	print "$r_p[1] $r_p[2], $r_p[4]";
    	$remitente = 'endoperio@endoperio.com';
    	$destino = $r_p[4];
    	$asunto = "Feliz cumpleanios te desea Endoperio";
    	$mensaje = '
    	<html>
    	<head>
    	<title>Felicidades</title>
    	</head>
    	<body>
    	<img src="http://www.webox.org.mx/Proyectos/endoperio/images/feliz.png">
    	</body>
    	</html>
    	';
    	$encabezados = 'MIME-Version: 1.0' . "\r\n";
    	$encabezados .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    	$encabezados .= "From: $remitente\nReply-To: $remitente" ;
    	if($destino!=''){
    		mail($destino, $asunto, $mensaje, $encabezados) or die ("No se ha podido enviar tu mensaje. Ha ocurrido un error") ;
    		echo " Enviado<br>";
    	}
    }
    echo '<meta http-equiv="Refresh" content="1;url=panel.php">';
    ?>