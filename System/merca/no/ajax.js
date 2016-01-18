$(document).ready(function() {
  
  $('#form').click(function(event) {
   $(".ajax").submit(function(){
      var data = {action: "test"};        
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
              arr.push(data_parse[i].nombres + " " + data_parse[i].apellido_paterno + "<br>");
            }
            $('.return').html(arr);
        }
      });
      return false;
    });
  });
});