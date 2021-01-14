$(document).ready(function() {
/*
/* Funcion ajax para traer datos de la factura y buscar por un rango de fecha en facturas 
  $(document).ready(function() {
    $.ajax({
    url: "../Admin/bean/Usuario.php",
    type: "POST",
    dataType:"html",
    data: $("#menu").serialize(),
    success: function (data) {
      console.log(data);
      $('#mostrar').html(data);
    }
    });
  });*/

  $("#Usuario").on("click", function (e) {
    $.ajax({
      url: "../Admin/bean/Usuario.php",
      type: "POST",
      dataType:"html",
      data: $("#menu").serialize(),
      success: function (data) {
        console.log(data);
        $('#mostrar').html(data);
      }
    });
  });

  $("#Registro").on("click", function (e) {
    $.ajax({
      url: "../Admin/bean/Registro.php",
      type: "POST",
      dataType:"html",
      data: $("#menu").serialize(),
      success: function (data) {
        console.log(data);
        $('#mostrar').html(data);
      }
    });
  });

$("#Empresa").on("click", function (e) {
    $.ajax({
      url: "../Admin/bean/Empresa.php",
      type: "POST",
      dataType:"html",
      data: $("#menu").serialize(),
      success: function (data) {
        console.log(data);
        $('#mostrar').html(data);
      }
    });
  });
/* ejectutar botones de liquido y solido corriente*/
$(document).ready( function(){
$("#solido").on("click", function (e) {
    window.location.href = "solido.php";
  });
$("#liquido").on("click", function (e) {
    window.location.href = "liquido.php";
  });
});

$(document).ready(function(){
  $("#Agregar").on("click", function (e) {
    var nombre=$('#nombre').val();
    var nit=$('#nit').val();
    var direccion=$('#direccion').val();
    var area=$('#area').val();
    var ciudad=$('#ciudad').val();
    var sede=$('#sede').val();
    $.get('prove/agregar.php',{nombre:nombre, nit:nit,direccion:direccion,area:area,ciudad:ciudad,sede:sede});
  });
});




});