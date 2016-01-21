$(document).ready(function() {
	
	$(".campoT").change(function(){
		var op = $(".campoT option:selected").val();
		var sel;
		if(op == "fecha_nacimiento" || op == "fecha")
			sel = "<input type='date' name='buscar' class='campoT'>";
		else if(op == "edad")
			sel = "<input type='number' name='buscar' class='campoT' placeholder='Años'>";
		else if(op == "sexo")
			sel = "Masculino<input type='radio' name='buscar' value='M'> Femenino<input type='radio' name='buscar' value='F'>";
		else
			sel = "<input type='text' class='campoT' name='buscar' placeholder='Buscar'>";
		$(".sel").html(sel);
	});
 
 
	$("#form").click(function() {
		$(".return").html("Procesando archivo XML, la descarga comenzará automáticamente");
		setTimeout( function(){ 
			$(".return").html("[ - - La lista se descargará en formato XML - - ]");
		}  , 30000 );
	});
});