
    <?php 
      $title = "Egresos";
      include('../+/head.php'); 
      setlocale(LC_MONETARY, 'en_US');
    ?>



<script>
  lightbox= function ()
  {   
              /*en el body agregamos un div con id popup_bg que nos servirá para colocar una capa bloque toda la pagina y con un background oscuro transparente*/
              $("body").append("<div id='popup_bg'></div>");
             /*le damos unos atributos y aqui uno de los mas importantes es ser posicion absoluto ,obtener el ancho, alto del navegador y zindex que le ponemos un numero alto para sobre ponerlo a todos */
                          $("#popup_bg").css({
                                  width : $(window).width() + "px",
                                  height : $(window).height() + "px",
                                  opacity : "0.4",
                                  filter : "alpha(opacity=40)",
                                  position : "absolute",
                                  background : "#000",
                                  left : "0px",
                                  top : "940px",
                                  zIndex : "100000"
                          });
          /*ahora agremamos un div contenedor del contenido y la capa donde carag todo el contenido y le creamos un boton para cerrar*/              
          $("body").append("<div id='popup'><div class='cerrar'><a href='javascript:void(0)'><img src='https://cdn1.iconfinder.com/data/icons/officeicons/PNG/24/Close.png' /></a></div><div id='popup_contenido'>luisrodriguez.pe</div></div>");
          /*si presionan cerrar hacemos que se oculte suavemente y al termino borramos los elementos que son del lightbox*/
          $("#popup div.cerrar,#popup_bg").click(function(){
                $("#popup, #popup_bg").fadeOut(1000,function(){
                   $("#popup, #popup_bg").remove(); 
                })
            })
           /*centramos la capa 700 de ancho en el 50% del left pero con un margin left -350 y por que ? seria la mitad del ancho asi obtenemos un centrado perfecto*/
                 $("#popup").css({
        width : "700px",
        height : "400px", 
        position : "absolute",
        left : "50%",
        top : "1250px",
        zIndex : "100001",
        marginLeft : "-350px",
        marginTop : "-200px",
        background:"#F2F2F2",
        overflow:"auto", 
        paddingRight:"20px"
      });  
           /*colocamos el boton cerrar a la derecha*/
                  $("#popup div.cerrar").css({
        width : "27px",
        height : "25px", 
        position : "absolute",
        marginLeft: "677px",
                          marginTop: "14px"
      });   
                  
           /*la capa donde estara todo el texto o imagen*/        
                  $("#popup div#popup_contenido").css({
        width : "675px",
        height : "330px", 
                          marginLeft: "25px",
                          marginTop: "46px",
                          overflow:"auto",
                          color:"#424242"
      }); 
  }

  $(document).ready(function(){
      /*por ejemplo aqui cargamos el lightbox cuando termina de cargar la pagina sin necesidad de un click*/
       /*al clickear una etiqueta a unos cargara el lightbox con el contenido que agregamos al momento de crear la capa contenido*/      
      $("a.prueba1").click(function(){
           lightbox(); 
           return false
      })
      /*pero el ejemplo de arriba funciona nada bien en un caso practico*/
      /*entonces lo mejoramos y hacemos que al clikear un link obtenemos el href y lo cargamos por ajax y lo mostramos en la capa del contenido*/
      $("a.prueba2").click(function(){
          $.get($(this).attr("href"),function(data){
              lightbox();
              $('#popup div#popup_contenido').html(data); 
          });
           return false
      })
      
      
  })
</script>

    


    <h3>Elije la fecha</h3>
<?php

$mes = $_GET['mes'];
$mes2 = $_GET['mes'];
$dia2 = $_GET['dia'];
$ano = $_GET['ano'];
$tipo_semana = 1;
$tipo_mes = 1;

$doctor = $_POST['doctor'];

$MESCOMPLETO[1] = 'Enero';
$MESCOMPLETO[2] = 'Febrero';
$MESCOMPLETO[3] = 'Marzo';
$MESCOMPLETO[4] = 'Abril';
$MESCOMPLETO[5] = 'Mayo';
$MESCOMPLETO[6] = 'Junio';
$MESCOMPLETO[7] = 'Julio';
$MESCOMPLETO[8] = 'Agosto';
$MESCOMPLETO[9] = 'Septiembre';
$MESCOMPLETO[10] = 'Octubre';
$MESCOMPLETO[11] = 'Noviembre';
$MESCOMPLETO[12] = 'Diciembre';

$MESABREVIADO[1] = 'Ene';
$MESABREVIADO[2] = 'Feb';
$MESABREVIADO[3] = 'Mar';
$MESABREVIADO[4] = 'Abr';
$MESABREVIADO[5] = 'May';
$MESABREVIADO[6] = 'Jun';
$MESABREVIADO[7] = 'Jul';
$MESABREVIADO[8] = 'Ago';
$MESABREVIADO[9] = 'Sep';
$MESABREVIADO[10] = 'Oct';
$MESABREVIADO[11] = 'Nov';
$MESABREVIADO[12] = 'Dic';

$SEMANACOMPLETA[0] = 'Domingo';
$SEMANACOMPLETA[1] = 'Lunes';
$SEMANACOMPLETA[2] = 'Martes';
$SEMANACOMPLETA[3] = 'Miércoles';
$SEMANACOMPLETA[4] = 'Jueves';
$SEMANACOMPLETA[5] = 'Viernes';
$SEMANACOMPLETA[6] = 'Sábado';

$SEMANAABREVIADA[0] = 'Dom';
$SEMANAABREVIADA[1] = 'Lun';
$SEMANAABREVIADA[2] = 'Mar';
$SEMANAABREVIADA[3] = 'Mie';
$SEMANAABREVIADA[4] = 'Jue';
$SEMANAABREVIADA[5] = 'Vie';
$SEMANAABREVIADA[6] = 'Sáb';

////////////////////////////////////
if($tipo_semana == 1){
$ARRDIASSEMANA = $SEMANACOMPLETA;
}elseif($tipo_semana == 0){
$ARRDIASSEMANA = $SEMANAABREVIADA;
}
if($tipo_mes == 0){
$ARRMES = $MESCOMPLETO;
}elseif($tipo_mes == 1){
$ARRMES = $MESABREVIADO;
}

if(!$dia) $dia = date(d);
if(!$mes) $mes = date(n);
if(!$ano) $ano = date(Y);

$TotalDiasMes = date(t,mktime(0,0,0,$mes,$dia,$ano));
$DiaSemanaEmpiezaMes = date(w,mktime(0,0,0,$mes,1,$ano));
$DiaSemanaTerminaMes = date(w,mktime(0,0,0,$mes,$TotalDiasMes,$ano));
$EmpiezaMesCalOffset = $DiaSemanaEmpiezaMes;
$TerminaMesCalOffset = 6 - $DiaSemanaTerminaMes;
$TotalDeCeldas = $TotalDiasMes + $DiaSemanaEmpiezaMes + $TerminaMesCalOffset;


if($mes == 1){
$MesAnterior = 12;
$MesSiguiente = $mes + 1;
$AnoAnterior = $ano - 1;
$AnoSiguiente = $ano;
}elseif($mes == 12){
$MesAnterior = $mes - 1;
$MesSiguiente = 1;
$AnoAnterior = $ano;
$AnoSiguiente = $ano + 1;
}else{
$MesAnterior = $mes - 1;
$MesSiguiente = $mes + 1;
$AnoAnterior = $ano;
$AnoSiguiente = $ano;
$AnoAnteriorAno = $ano - 1;
$AnoSiguienteAno = $ano + 1;
}

  print " <table float>";
  print " <tr id='t'>";
  print " <td ><a href=\"$PHP_SELF?mes=$mes&ano=$AnoAnteriorAno\">año anterior</a></td>";
  print " <td ><a href=\"$PHP_SELF?mes=$MesAnterior&ano=$AnoAnterior\">Mes anterior</a></td>";
  print " <td  colspan=\"1\" align=\"center\" nowrap><b>".$ARRMES[$mes]." - $ano</b></td>";
  print " <td ><a href=\"$PHP_SELF?mes=$MesSiguiente&ano=$AnoSiguiente\">Mes siguiente</a></td>";
  print " <td ><a href=\"$PHP_SELF?mes=$mes&ano=$AnoSiguienteAno\">año siguiente</a></td>";
  print " </tr>";
  print " </table>";

  /*print "<table style='border:none'>";
  foreach($ARRDIASSEMANA AS $key){
  print "<th >$key</th>";
  }

  $contador_dia=0;
  for($a=1;$a <= $TotalDeCeldas;$a++){ 
    if(!$b) $b = 0;
    if($b == 7) $b = 0;
    if($b == 0) print '<tr>';
    if(!$c) $c = 1;
    if($a > $EmpiezaMesCalOffset AND $c <= $TotalDiasMes){
      
      if($c == date(d) && $mes == date(m) && $ano == date(Y)){
           print "<td bgcolor=\"#FA5858\"><a href='$PHP_SELF?ano=$ano&mes=$mes&dia=$c&n_dia=$SEMANACOMPLETA[$contador_dia]'>$c</a><br></td>";
      }else if($c < date(d) && $mes == date(m) && $ano == date(Y) ||
               $mes < date(m) && $ano == date(Y) ||
               $ano < date(Y)){
           print "<td bgcolor=\"#A9F5BC\"><a href='$PHP_SELF?ano=$ano&mes=$mes&dia=$c&n_dia=$SEMANACOMPLETA[$contador_dia]'>$c</a><br></td>";
      }elseif($b == 6){
        print "<td bgcolor=#fff><a href='$PHP_SELF?ano=$ano&mes=$mes&dia=$c&n_dia=$SEMANACOMPLETA[$contador_dia]'>$c</a></td>";
      }elseif($b == 0){
        print "<td bgcolor=#D6E2F7>$c</td>";
      }else{
        print "<td bgcolor=\"#fff\"><a href='$PHP_SELF?ano=$ano&mes=$mes&dia=$c&n_dia=$SEMANACOMPLETA[$contador_dia]'>$c</a></td>";
      }
    $c++;
    }else{
      print "<td> </td>";
    }
    if($b == 6) print '</tr>';
    $b++;
    $contador_dia++;
    if($contador_dia==7)  $contador_dia=0;
    //print $SEMANAABREVIADA[$contador_dia];
    }
    print "<tr><td align=center colspan=10></a></td></tr>";
    print "</table>";*/

		include("php/base.php");
		include("php/base2.php");
		include("php/base3.php");
		
    $dia_seleccionable = $_GET['dia'];
    //print "$dia_seleccionable $mes $ano";
    if($dia_seleccionable==1)
    	$dia_seleccionable='01';
    if($dia_seleccionable==2)
    	$dia_seleccionable='02';
    if($dia_seleccionable==3)
    	$dia_seleccionable='03';    	
    if($dia_seleccionable==4)
    	$dia_seleccionable='04';   
    if($dia_seleccionable==5)
    	$dia_seleccionable='05';   
    if($dia_seleccionable==6)
    	$dia_seleccionable='06';       	    	    	
     if($dia_seleccionable==7)
    	$dia_seleccionable='07';   
    if($dia_seleccionable==8)
    	$dia_seleccionable='08';   
     if($dia_seleccionable==9)
    	$dia_seleccionable='09'; 
		
		
    if($mes2==1)
    	$mes2='01';
    if($mes2==2)
    	$mes2='02';
    if($mes2==3)
    	$mes2='03';    	
    if($mes2==4)
    	$mes2='04';   
    if($mes2==5)
    	$mes2='05';   
    if($mes2==6)
    	$mes2='06';       	    	    	
     if($mes2==7)
    	$mes2='07';   
    if($mes2==8)
    	$mes2='08';   
     if($mes2==9)
    	$mes2='09'; 
		
	$fechab = $ano."-".$mes2."-".$dia_seleccionable;
if($mes2=='')
    	$fechab = $ano;

echo "<div style='width:730px; background: #F2F2F2; min-height:130px; margin-left:-20px; position: absolute; padding:20px; margin-bottom:40px'>
    	<center>
    	<label>";
    if($mes2!='')    
  echo " Historial de  ", $dia_seleccionable," de ",$MESCOMPLETO[$mes]," del ",$ano ,"</label><br><br>";
    else
    	echo "Historial del año: ",$ano ," </label><br><br>";
    	
    echo "<br>
    	<a href='?ano=",$ano,"&S=0'>

    	<div id='botnH' style=''>
    		Ver historial de este año
    	</div>

    	</a>";
    echo "<a href='?mes=",$mes,"&S=0'>
    	<div id='botnH' style='width:170px'>
    		Ver historial de este mes
    	</div>
    	</a>";

    $semana = date(W);
    $ano_s = $ano;

    $S = $_GET['S'];
    $semana_b = $_GET['semana_b'];
        $semana_anterior = $semana_b-1;
        $semana_siguiente = $semana_b+1;


    if($semana_anterior=='-1'){
        $semana_anterior = 51;
        $ano_s = $ano-1;
    }
    if($semana_siguiente=='51'){
        $semana_siguiente = 0;
        $ano_s = $ano+1;
    }

    /*echo "<a href='?semana_b=",$semana,"&ano=",$ano,"&S=1'>
    	<div id='botnH' style=''>
    		Ver hist. por semana
    	</div>
    	</a><br><br><br>";*/

if($S == 1){
    echo "<a href='?semana_b=",$semana_anterior,"&ano=",$ano_s,"&S=1'>
    	<div id='botnH' style='margin-left:180px; border:0px #888 solid; width:140px; border-top-left-radius:30px; border-bottom-left-radius:30px;'>
    		semana anterior
    	</div>
    	</a>";

    echo "<a href='?semana_b=",$semana_siguiente,"&ano=",$ano_s,"&S=1'>
    	<div id='botnH' style='border:0px #888 solid; width:140px; border-top-right-radius:30px; border-bottom-right-radius:30px;'>
    		semana siguiente
    	</div>
    	</a><br><br><br>";
}
$GASTOS_ADMIN = 0;
$GASTOS_PERSO = 0;
$TOTAL_EGRESO = 0;

echo "<br><br><br><br><br><br>";
        $result2 = mysql_query("select * from egresos_otros where fecha like '%$fechab%' and tipo='Proveedores'");
	$proveedores=0;
	echo "Proveedores";
	echo "<table>";
	echo "<tr>
		<td>Fecha</td>
		<td>Responsable de Movimiento</td>
		<td>Descripción</td>
		<td style='text-align: left;'>Cantidad</td>
	</tr>";
		while ($row2 = mysql_fetch_array($result2, MYSQL_NUM)){
			echo "<tr>";
				echo "<td>".$row2[5]."</td>";
				$usuario = $row2[1];
				$select = 'select * from usuarios where id_usuario="'.$usuario.'";';
				$resul = mysql_query($select, $dbh) or die ("problema con la solicitud");
				$renglon = mysql_fetch_assoc($resul);

				echo "<td>".$renglon['nombres']." ". $renglon['a_paterno']." ".$renglon['a_materno']."</td>";
				echo "<td>".$row2[3]."</td>";
				echo "<td style='text-align: left;>".money_format('%(#10n', $row2[4])."</td>";
				$GASTOS_ADMIN = $GASTOS_ADMIN + $row2[4];
				$proveedores = $proveedores + $row2[4];
			echo "</tr>";
      
      		}
echo "<tr><td></td><td></td><td>Total</td><td style='text-align: left;>".money_format('%(#10n', $proveedores)."</td></tr>";
echo "</table>";


echo "<br><br><br>";
        $result2 = mysql_query("select * from egresos_otros where fecha like '%$fechab%' and tipo='Gastos Administrativos'");
	
	echo "Gastos Administrativos";
	echo "<table>";
	echo "<tr>
		<td>Fecha</td>
		<td>Responsable de Movimiento</td>
		<td>Descripción</td>
		<td style='text-align: left;'>Cantidad</td>
	</tr>";
	$g_admin=0;
		while ($row2 = mysql_fetch_array($result2, MYSQL_NUM)){
			echo "<tr>";
				echo "<td>".$row2[5]."</td>";
				$usuario = $row2[1];
				$select = 'select * from usuarios where id_usuario="'.$usuario.'";';
				$resul = mysql_query($select, $dbh) or die ("problema con la solicitud");
				$renglon = mysql_fetch_assoc($resul);

				echo "<td>".$renglon['nombres']." ". $renglon['a_paterno']." ".$renglon['a_materno']."</td>";
				echo "<td>".$row2[3]."</td>";
				echo "<td style='text-align: left;>".money_format('%(#10n', $row2[4])."</td>";
				$GASTOS_ADMIN = $GASTOS_ADMIN + $row2[4];
				$g_admin = $g_admin+$row2[4];
			echo "</tr>";
      
      		}

		$result3 = mysql_query("select * from nomina_historial where fecha like '%$fechab%' and aprobada='1'");

		$nomina = 0;
		while ($row3 = mysql_fetch_array($result3, MYSQL_NUM)){
			$GASTOS_ADMIN = $GASTOS_ADMIN + $row3[5];
			$nomina = $nomina + $row3[5];
			$g_admin = $g_admin + $row3[5];
		}
		echo "<tr>";
			echo "<td>";
			echo "</td>";

			echo "<td>";
			echo "</td>";

			echo "<td>Nomina";
			echo "</td>";

			echo "<td style='text-align: left;>".money_format('%(#10n', $nomina)."</td>";			
		echo "</tr>";
echo "<tr><td></td><td></td><td>Total</td><td style='text-align: left;>".money_format('%(#10n', $g_admin)."</td></tr>";
echo "</table>";


echo "<br><br><br>";
        $result2 = mysql_query("select * from egresos_otros where fecha like '%$fechab%' and tipo='Egresos Laboratorio'");
	
	echo "Egresos Laboratorio";
	echo "<table>";
	echo "<tr>
		<td>Fecha</td>
		<td>Responsable de Movimiento</td>
		<td>Descripción</td>
		<td style='text-align: left;'>Cantidad</td>
	</tr>";
	$lab = 0;
		while ($row2 = mysql_fetch_array($result2, MYSQL_NUM)){
			echo "<tr>";
				echo "<td>".$row2[5]."</td>";
				$usuario = $row2[1];
				$select = 'select * from usuarios where id_usuario="'.$usuario.'";';
				$resul = mysql_query($select, $dbh) or die ("problema con la solicitud");
				$renglon = mysql_fetch_assoc($resul);

				echo "<td>".$renglon['nombres']." ". $renglon['a_paterno']." ".$renglon['a_materno']."</td>";
				echo "<td>".$row2[3]."</td>";
				echo "<td style='text-align: left;>".money_format('%(#10n', $row2[4])."</td>";
				$GASTOS_ADMIN = $GASTOS_ADMIN + $row2[4];
				$lab = $lab + $row2[4];
			echo "</tr>";
      
      		}
echo "<tr><td></td><td></td><td>Total</td><td style='text-align: left;>".money_format('%(#10n', $lab)."</td></tr>";
echo "</table>";

echo "<br><br><br>";
        $result2 = mysql_query("select * from egresos_otros where fecha like '%$fechab%' and tipo='Gastos de Remodelacion'");
	
	echo "Gastos de Remodelación";
	echo "<table>";
	echo "<tr>
		<td>Fecha</td>
		<td>Responsable de Movimiento</td>
		<td>Descripción</td>
		<td style='text-align: left;'>Cantidad</td>
	</tr>";
	$remo = 0;
		while ($row2 = mysql_fetch_array($result2, MYSQL_NUM)){
			echo "<tr>";
				echo "<td>".$row2[5]."</td>";
				$usuario = $row2[1];
				$select = 'select * from usuarios where id_usuario="'.$usuario.'";';
				$resul = mysql_query($select, $dbh) or die ("problema con la solicitud");
				$renglon = mysql_fetch_assoc($resul);

				echo "<td>".$renglon['nombres']." ". $renglon['a_paterno']." ".$renglon['a_materno']."</td>";
				echo "<td>".$row2[3]."</td>";
				echo "<td style='text-align: left;>".money_format('%(#10n', $row2[4])."</td>";
				$GASTOS_ADMIN = $GASTOS_ADMIN + $row2[4];
				$remo = $remo + $row2[4];
			echo "</tr>";
      
      		}
echo "<tr><td></td><td></td><td>Total</td><td style='text-align: left;>".money_format('%(#10n', $remo)."</td></tr>";
echo "</table>";

echo "<br><br><br>";
        $result2 = mysql_query("select * from egresos_otros where fecha like '%$fechab%' and tipo='Mantenimiento y Mano de Obra'");
	
	echo "Mantenimiento y Mano de Obra";
	echo "<table>";
	echo "<tr>
		<td>Fecha</td>
		<td>Responsable de Movimiento</td>
		<td>Descripción</td>
		<td style='text-align: left;'>Cantidad</td>
	</tr>";
	$mante = 0;
		while ($row2 = mysql_fetch_array($result2, MYSQL_NUM)){
			echo "<tr>";
				echo "<td>".$row2[5]."</td>";
				$usuario = $row2[1];
				$select = 'select * from usuarios where id_usuario="'.$usuario.'";';
				$resul = mysql_query($select, $dbh) or die ("problema con la solicitud");
				$renglon = mysql_fetch_assoc($resul);

				echo "<td>".$renglon['nombres']." ". $renglon['a_paterno']." ".$renglon['a_materno']."</td>";
				echo "<td>".$row2[3]."</td>";
				echo "<td style='text-align: left;>".money_format('%(#10n', $row2[4])."</td>";
				$GASTOS_ADMIN = $GASTOS_ADMIN + $row2[4];
				$mante = $mante + $row2[4];
			echo "</tr>";
      
      		}
echo "<tr><td></td><td></td><td>Total</td><td style='text-align: left;>".money_format('%(#10n', $mante)."</td></tr>";
echo "</table>";

echo "<br><br><br>";
        $result2 = mysql_query("select * from egresos_otros where fecha like '%$fechab%' and tipo='Personales'");
	
	echo "Personales";
	echo "<table>";
	echo "<tr>
		<td>Fecha</td>
		<td>Responsable de Movimiento</td>
		<td>Descripción</td>
		<td style='text-align: left;'>Cantidad</td>
	</tr>";
	$perso = 0;
		while ($row2 = mysql_fetch_array($result2, MYSQL_NUM)){
			echo "<tr>";
				echo "<td>".$row2[5]."</td>";
				$usuario = $row2[1];
				$select = 'select * from usuarios where id_usuario="'.$usuario.'";';
				$resul = mysql_query($select, $dbh) or die ("problema con la solicitud");
				$renglon = mysql_fetch_assoc($resul);

				echo "<td>".$renglon['nombres']." ". $renglon['a_paterno']." ".$renglon['a_materno']."</td>";
				echo "<td>".$row2[3]."</td>";
				echo "<td style='text-align: left;>".money_format('%(#10n', $row2[4])."</td>";
				$GASTOS_PERSO = $GASTOS_PERSO + $row2[4];
				$perso = $perso + $row2[4];
			echo "</tr>";
      
      		}
echo "<tr><td></td><td></td><td>Total</td><td style='text-align: left;>".money_format('%(#10n', $perso)."</td></tr>";
echo "</table>";

echo "<br><br><br>";
        $result2 = mysql_query("select * from egresos_otros where fecha like '%$fechab%' and tipo='Gastos Medicos'");
	
	echo "Gastos Medicos";
	echo "<table>";
	echo "<tr>
		<td>Fecha</td>
		<td>Responsable de Movimiento</td>
		<td>Descripción</td>
		<td style='text-align: left;'>Cantidad</td>
	</tr>";
		$med = 0;
	
		while ($row2 = mysql_fetch_array($result2, MYSQL_NUM)){
			echo "<tr>";
				echo "<td>".$row2[5]."</td>";
				$usuario = $row2[1];
				$select = 'select * from usuarios where id_usuario="'.$usuario.'";';
				$resul = mysql_query($select, $dbh) or die ("problema con la solicitud");
				$renglon = mysql_fetch_assoc($resul);

				echo "<td>".$renglon['nombres']." ". $renglon['a_paterno']." ".$renglon['a_materno']."</td>";
				echo "<td>".$row2[3]."</td>";
				echo "<td style='text-align: left;>".money_format('%(#10n', $row2[4])."</td>";
				$GASTOS_PERSO = $GASTOS_PERSO + $row2[4];
				$med = $med + $row2[4];
			echo "</tr>";
      
      		}
echo "<tr><td></td><td></td><td>Total</td><td style='text-align: left;>".money_format('%(#10n', $med)."</td></tr>";
echo "</table>";

echo "<br><br><br>";
        $result2 = mysql_query("select * from egresos_otros where fecha like '%$fechab%' and tipo='Inbursa'");
	
	echo "Inbursa";
	echo "<table>";
	echo "<tr>
		<td>Fecha</td>
		<td>Responsable de Movimiento</td>
		<td>Descripción</td>
		<td style='text-align: left;'>Cantidad</td>
	</tr>";
	$inbu = 0;
		while ($row2 = mysql_fetch_array($result2, MYSQL_NUM)){
			echo "<tr>";
				echo "<td>".$row2[5]."</td>";
				$usuario = $row2[1];
				$select = 'select * from usuarios where id_usuario="'.$usuario.'";';
				$resul = mysql_query($select, $dbh) or die ("problema con la solicitud");
				$renglon = mysql_fetch_assoc($resul);

				echo "<td>".$renglon['nombres']." ". $renglon['a_paterno']." ".$renglon['a_materno']."</td>";
				echo "<td>".$row2[3]."</td>";
				echo "<td style='text-align: left;>".money_format('%(#10n', $row2[4])."</td>";
				$GASTOS_PERSO = $GASTOS_PERSO + $row2[4];
				$inbu = $inbu + $row2[4];
			echo "</tr>";
      
      		}
echo "<tr><td></td><td></td><td>Total</td><td style='text-align: left;>".money_format('%(#10n', $inbu)."</td></tr>";
echo "</table>";

echo "<br><br><br>";
        $result2 = mysql_query("select * from egresos_otros where fecha like '%$fechab%' and tipo='Pagos de Tarjeta de Credito'");
	
	echo "Pagos de Tarjeta de Credito";
	echo "<table>";
	echo "<tr>
		<td>Fecha</td>
		<td>Responsable de Movimiento</td>
		<td>Descripción</td>
		<td style='text-align: left;'>Cantidad</td>
	</tr>";

	$cre = 0;
		while ($row2 = mysql_fetch_array($result2, MYSQL_NUM)){
			echo "<tr>";
				echo "<td>".$row2[5]."</td>";
				$usuario = $row2[1];
				$select = 'select * from usuarios where id_usuario="'.$usuario.'";';
				$resul = mysql_query($select, $dbh) or die ("problema con la solicitud");
				$renglon = mysql_fetch_assoc($resul);

				echo "<td>".$renglon['nombres']." ". $renglon['a_paterno']." ".$renglon['a_materno']."</td>";
				echo "<td>".$row2[3]."</td>";
				echo "<td style='text-align: left;>".money_format('%(#10n', $row2[4])."</td>";
				$GASTOS_PERSO = $GASTOS_PERSO + $row2[4];
				$cre = $cre + $row2[4];
			echo "</tr>";
      
      		}
echo "<tr><td></td><td></td><td>Total</td><td style='text-align: left;>".money_format('%(#10n', $cre)."</td></tr>";
echo "</table>";

echo "<br><br><br>";
        $result2 = mysql_query("select * from egresos_otros where fecha like '%$fechab%' and tipo='Rentas'");
	
	echo "Rentas";
	echo "<table>";
	echo "<tr>
		<td>Fecha</td>
		<td>Responsable de Movimiento</td>
		<td>Descripción</td>
		<td style='text-align: left;'>Cantidad</td>
	</tr>";
	$ren = 0;
		while ($row2 = mysql_fetch_array($result2, MYSQL_NUM)){
			echo "<tr>";
				echo "<td>".$row2[5]."</td>";
				$usuario = $row2[1];
				$select = 'select * from usuarios where id_usuario="'.$usuario.'";';
				$resul = mysql_query($select, $dbh) or die ("problema con la solicitud");
				$renglon = mysql_fetch_assoc($resul);

				echo "<td>".$renglon['nombres']." ". $renglon['a_paterno']." ".$renglon['a_materno']."</td>";
				echo "<td>".$row2[3]."</td>";
				echo "<td style='text-align: left;>".money_format('%(#10n', $row2[4])."</td>";
				$GASTOS_PERSO = $GASTOS_PERSO + $row2[4];
				$ren = $ren + $row2[4];
			echo "</tr>";
      
      		}
echo "<tr><td></td><td></td><td>Total</td><td style='text-align: left;>".money_format('%(#10n', $ren)."</td></tr>";
echo "</table>";

echo "<br><br><br>";
        $result2 = mysql_query("select * from inventario_historial_entradas where fecha like '%$fechab%'");
  echo "Compras de productos";
  echo "<table>";
  echo "<tr>
    <td>Fecha</td>
    <td>Responsable de Movimiento</td>
    <td>Descripción</td>
    <td style='text-align: left;'>Cantidad</td>
  </tr>";
  $c_in = 0;
    while ($row2 = mysql_fetch_array($result2, MYSQL_NUM)){
      echo "<tr>";
        echo "<td>".$row2[5]."</td>";
        $usuario = $row2[4];
        $select = 'select * from usuarios where id_usuario="'.$usuario.'";';
        $resul = mysql_query($select, $dbh) or die ("problema con la solicitud");
        $renglon = mysql_fetch_assoc($resul);

        echo "<td>".$renglon['nombres']." ". $renglon['a_paterno']." ".$renglon['a_materno']."</td>";
        $producto_inventario = $row2[1];

        $select = 'select * from inventario where id_producto="'.$producto_inventario.'";';
        $resul = mysql_query($select, $dbh) or die ("problema con la solicitud");
        $renglon = mysql_fetch_assoc($resul);

        echo "<td>".$renglon['nombre']."</td>";
        echo "<td style='text-align: left;'>".money_format('%(#10n', $row2[3])."</td>";
        //$GASTOS_PERSO = $GASTOS_PERSO + $row2[4];
        $c_in = $c_in + $row2[3];
      echo "</tr>";
      
          }
echo "<tr><td></td><td></td><td>Total</td><td style='text-align: left;'>".money_format('%(#10n', $c_in)."</td></tr>";
echo "</table>";

echo "<br><br><br>";

echo "<BR>Total de Gastos Administrativos: ". money_format('%(#10n', $GASTOS_ADMIN)."<hr>";
echo "<BR>Total de Gastos Personales: ". money_format('%(#10n', $GASTOS_PERSO)."<hr>";
echo "<BR>Total de Gastos Inventario: ". money_format('%(#10n', $c_in);
$TOTAL_EGRESO = $GASTOS_ADMIN + $GASTOS_PERSO;

echo "<br><br><br><BR><hr><hr>Total de Egresos Administrativos y Personales: ". money_format('%(#10n', $TOTAL_EGRESO)."<hr><hr>";
$TOTAL_EGRESO = $TOTAL_EGRESO + $c_in;
echo "<br>Total General de Egresos: ". money_format('%(#10n', $TOTAL_EGRESO)."<hr>";
?>






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

   </body>
</html>
