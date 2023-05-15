$(document).ready(function() {
  // Cargar Regiones desde Base de Datos
  $.ajax({
      url: 'cargar_datos.php',
      type: 'post',
      data: { type: 'regiones' },
      dataType: 'json',
      success: function(response) {
          if (response.status == 'success') {
              var options = '';
              for (var i = 0; i < response.data.length; i++) {
                  options += '<option value="' + response.data[i].id + '">' + response.data[i].nombre + '</option>';
              }
              $('#region').html(options);
          }
      }
  });

  // Cargar Comunas según la Región seleccionada
  $('#region').change(function() {
      var regionId = $(this).val();
      $.ajax({
          url: 'cargar_datos.php',
          type: 'post' ,
          data: { type: 'comunas', regionId: regionId },
          dataType: 'json',
          success: function(response) {
              if (response.status == 'success') {
                  var options = '';
                  for (var i = 0; i < response.data.length; i++) {
                      options += '<option value="' + response.data[i].id + '">' + response.data[i].nombre + '</option>';
                  }
                  $('#comuna').html(options);
              }
          }
      });
  });

  // Cargar Candidatos desde Base de Datos
  $.ajax({
      url: 'cargar_datos.php',
      type: 'post',
      data: { type: 'candidatos' },
      dataType: 'json',
      success: function(response) {
          if (response.status == 'success') {
              var options = '';
              for (var i = 0; i < response.data.length; i++) {
                  options += '<option value="' + response.data[i].id + '">' + response.data[i].nombre + '</option>';
              }
              $('#candidato').html(options);
          }
      }
  });
});

