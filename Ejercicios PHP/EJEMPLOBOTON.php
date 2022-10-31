<?php 

// include "config.php"; 

if(isset($_POST['btn_guardar'])){

  $planta = $_POST['planta'];
  $solicitante = $_POST['codigoUsu'];

  $cod_PT = $_POST['cod_PT'];
  $descripcion_PT = $_POST['desc_PT'];    
  $lote = $_POST['lote'];

  $ff = $_POST['ffab'];
  $fv = $_POST['fven'];
  $Vu = $_POST['vida_util'];

  $cod_etq = $_POST['cod_etq'];
  $desc_etq = $_POST['desc_etq'];
  $cant = $_POST['cantidad'];


  $validarUsuario = mysqli_query($con,"select codigo from usuarios where codigo='$solicitante'");

  if(mysqli_num_rows($validarUsuario)==0 ) {
    echo "<script>alert(' Este usuario no existe.')</script>";
  }else{


    $insertSQL = "INSERT INTO solicitudes (id_solicitud, planta, solicitante, codigo_PT, descripcion_PT,lote, ffab_prod, fven_prod, vida_util, cod_etq, descripcion_etq, cantidad) VALUES (null,
    '$planta',
    '$solicitante',

    '$cod_PT',
    '$descripcion_PT',
    '$lote',

    '$ff',                    
    '$fv',
    '$Vu',                  

    '$cod_etq', 
    '$desc_etq',
    '$cant')";

    $ejecutarSQL = mysqli_query($con, $insertSQL);
  }

  if ($ejecutarSQL) {
    echo "<script>alert('Solicitud exitosa.')</script>";

  }else {
    echo "<script>alert('Por favor intente de nuevo.')</script>";
  }
}

?>

<!doctype html>
<html>
<head>

  <title>Ens Mod Etq</title>
  <link href="style.css" rel="stylesheet" type="text/css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--script src="jquery-1.12.0.min.js" type="text/javascript"></script-->

  <link href='jquery-ui.min.css' type='text/css' rel='stylesheet' >
  <script src="jquery-3.2.1.min.js" type="text/javascript"></script>
  <script src="jquery-ui.min.js" type="text/javascript"></script>
  <!--script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script-->

  <script type="text/javascript">
    //Inicialice autocompletar en el cuadro de texto del nombre de usuario cuando se active el keydownevento.
     //Definir source y select opciones en el autocomplete()método.

     $(document).ready(function(){


      $(document).on('keydown', '.codigoP', function producto() {//el evento keydown se aplica sobre el elemento con la calse "sites"

        var id = this.id;
        var splitid = id.split('_');
        var index = splitid[1];

      // Inicializar jQuery UI autocompletar
      $( '#'+id ).autocomplete({
        source: function( request, response ) {
          $.ajax({
            url: "getProducts.php",
            type: 'post',
            dataType: "json",
            data: {
              search: request.term,request:1
            },
            success: function( data ) {
              response( data );

            }
          });
        },

        //seleccione: función (evento, interfaz de usuario)
        select: function (event, ui) {
          $(this).val(ui.item.label); //  muestra el texto seleccionado
          var regid = ui.item.value; // valor seleccionado

          // AJAX
          $.ajax({
            url: 'getProducts.php',
            type: 'post',
            data: {regid:regid,request:2},
            dataType: 'json',
            success:function(response){

              var len = response.length;

              if(len > 0){
                var id = response[0]['idProd'];
                var descripcion = response[0]['descripcionProd'];
                var vida = response[0]['vidaUtil'];


                // Establecer valor en cuadros de texto
                document.getElementById('descripcion_'+index).value = descripcion;
                document.getElementById('vidaUtil_'+index).value = vida;

              }

            }
          });

          return false;
        }
      });
    });

      function guardar() {

        var _planta = document.getElementById("pl_1").value;
        var _solicitante = document.getElementById("solicitante_1").value;
        var _codPT = document.getElementById("codigoP_1").value;
        var _descPT = document.getElementById("descripcion_1").value;
        var _lote = document.getElementById("lote_1").value;

        var _ff = document.getElementById("ffab_1").value;
        var _fv = document.getElementById("fv_1").value;
        var _vida = document.getElementById("vidaUtil_1").value;

        var _codE = document.getElementById("codigoE_1").value;
        var _descE = document.getElementById("descripcionE_1").value;
        var _cant = document.getElementById("cant_1").value;

        var i = 1; 
          //contador para asignar id al boton que borrara la fila

          var fila = '<tr id="row' + i + '"><td>' + _planta + '</td><td>' + _solicitante + '</td><td>' + _codPT + '</td><td>' + _descPT + '</td><td>' + _lote + '</td><td>' + _ff + '</td><td>' + _fv + '</td><td>' + _vida + '</td><td>' + _codE + '</td><td>' + _descE + '</td><td>' + _cant + '</td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">Borrar</button></td></tr>'; 

          i++;

          var btn = document.createElement("TR");
          btn.innerHTML=fila;
          document.getElementById("mytable").appendChild(btn);

          document.getElementById("pl_1").value ="";
          document.getElementById("solicitante_1").value = "";

          document.getElementById("codigoP_1").value ="";
          document.getElementById("descripcion_1").value = "";
          document.getElementById("lote_1").value = "";

          document.getElementById("ffab_1").value ="";
          document.getElementById("fv_1").value = "";
          document.getElementById("vidaUtil_1").value = "";

          document.getElementById("codigoE_1").value = "";
          document.getElementById("descripcionE_1").value ="";
          document.getElementById("cant_1").value = "";

          document.getElementById("codigoP_1").focus();

        };        

        $(document).on('click', '.btn_remove', function (event) {
          event.preventDefault();
          $(this).closest('tr').remove();
        });

      </script>
    </head>
    <body>

  </html>