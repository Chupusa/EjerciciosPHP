<?php
    //https://es.stackoverflow.com/questions/227366/validar-campos-vacios-por-metodo-post-en-php
    // Si todos los campos se han enviado, entonces, «$post» será «true»,
    // de lo contrario será «false»:
    $post = (isset($_POST['nombre']) && !empty($_POST['nombre'])) &&
            (isset($_POST['sexo']) && !empty($_POST['sexo'])) &&
            (isset($_POST['year']) && !empty($_POST['year'])) &&
            (isset($_POST['terminos']) && !empty($_POST['terminos']));


    // Si $post es true (verdadero), entonces se mostrarán los resultados:
    if ( $post ) {
        $nombre = htmlspecialchars($_POST["nombre"]);
        $sexo = htmlspecialchars($_POST["sexo"]);
        $year = htmlspecialchars($_POST["year"]);
        $terminos = htmlspecialchars($_POST["terminos"]);

    // Resultado
    echo "Hola <strong>$nombre</strong>, eres <strong>$sexo</strong>";

    }else {
    // Si en cambio, es false (falso), entonces volverá al formulario desde
    // donde se envió la petición:
    header("Location: http://localhost/EjerciciosdePHP/GuardarDatosCompletos/index.php");
}
?>