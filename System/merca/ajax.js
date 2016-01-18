$(document).ready(function() {
  
  $('#form').click(function(event) {
   $(".ajax").submit(function(){
      var data = {action: "get"};        
      data = $(this).serialize() + "&" + $.param(data);
      $.ajax({
        type: "POST",
        dataType: "json",
        url: "consulta.php", //Relative or absolute path to response.php file
        data: data,
        success: function(data) {
            data_parse = JSON.parse(data);
            var arr = [];
            for (var i in data_parse) {
              arr.push( "<tr><td>" + i +"</td><td> "
                        + data_parse[i].nombres + "</td><td> "
                        + data_parse[i].apellido_paterno + " "
                        + data_parse[i].apellido_materno + "</td><td> "
                        + data_parse[i].sexo + "</td><td> "
                        + data_parse[i].fecha_nacimiento + "</td><td> "
                        + data_parse[i].edad + "</td><td> "
                        + data_parse[i].correo + "</td></tr> ");
            }
            i = parseInt(i) + 1;
            $('.return').html( "<h2> Filtro de " +i+ " pacientes </h2> <br><table><th><td>Nombre</td><td>Apellidos</td><td>Sexo</td><td>Fecha_nacimiento</td><td>Edad</td><td>Correo</td></th>" + arr + "</table>");
        }
      });
      return false;
    });
  });
});