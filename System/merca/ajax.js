$(document).ready(function() {
	
	function exportTableToCSV($table, filename) {

        var $rows = $table.find('tr:has(td)'),

            // Temporary delimiter characters unlikely to be typed by keyboard
            // This is to avoid accidentally splitting the actual contents
            tmpColDelim = String.fromCharCode(11), // vertical tab character
            tmpRowDelim = String.fromCharCode(0), // null character

            // actual delimiter characters for CSV format
            colDelim = '","',
            rowDelim = '"\r\n"',

            // Grab text from table into CSV formatted string
            csv = '"' + $rows.map(function (i, row) {
                var $row = $(row),
                    $cols = $row.find('td');

                return $cols.map(function (j, col) {
                    var $col = $(col),
                        text = $col.text();

                    return text.replace(/"/g, '""'); // escape double quotes

                }).get().join(tmpColDelim);

            }).get().join(tmpRowDelim)
                .split(tmpRowDelim).join(rowDelim)
                .split(tmpColDelim).join(colDelim) + '"',

            // Data URI
            csvData = 'data:application/csv;charset=utf-8,' + encodeURIComponent(csv);

        $(this)
            .attr({
            'download': filename,
                'href': csvData,
                'target': '_blank'
        });
    }
  
  $('#form').click(function(event) {
   $(".ajax").submit(function(){
	  $("html, body").animate({ scrollTop: 0 }, "slow");
	  $(".export").html("Procesando...")
      var data = {action: "get"};        
      data = $(this).serialize() + "&" + $.param(data);
      $.ajax({
        type: "POST",
        dataType: "json",
        url: "query.php", //Relative or absolute path to response.php file
        data: data,
        success: function(data) {
            data_parse = JSON.parse(data);
            var arr = [];
            for (var i in data_parse) {
              arr.push( "<tr><td>" + data_parse[i].nombre_completo +"</td><td> "
                        + data_parse[i].estado + "</td><td>"
                        + data_parse[i].ciudad + "</td><td> "
                        + data_parse[i].fecha_nacimiento + "</td><td> "
                        + data_parse[i].edad + "</td><td> "
                        + data_parse[i].sexo + "</td><td> "
						+ data_parse[i].correo + "</td><td> "
						+ data_parse[i].observacion + "</td><td> "
                        + data_parse[i].fecha_consulta + "</td></tr> ");
            }
            i = parseInt(i) + 1;
            $('.return').html( "<br><h2> Filtro  " +i+ " pacientes </h2> <br><table id='tablaQuery'><tr><th>Nombre completo</th><th>Estado</th><th>Ciudad</th><th>Fecha de nacimiento</th><th>Edad</th>"
							+ "<th>Genero</th><th>Correo</th><th>Ultima consulta</th><th>Fecha</th></tr>" + arr + "</table>");
			$(".export").html('Click para descargar');
        }
      });
      return false;
    });
  });
  
  $(".export").on('click', function (event) {
        // CSV
        exportTableToCSV.apply(this, [$('#tablaQuery'), 'export.csv']);
        
        // IF CSV, don't do event.preventDefault() or return false
        // We actually need this to be a typical hyperlink
    });
  
});