<?php

    $fail = false;
    $producto = null;
    $cantidad = null;
    $precComp = null;
    $precVent = null;
    $errors = [];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (empty($_POST["producto"])) {
            $errors[]="Ingrese nombre de producto";
            $fail=true;
        } 
        else {
            $producto = ($_POST["producto"]);
        }
        if (empty($_POST["cantidad"])) {
            $errors[] ="Ingrese cantidad del producto";
            $fail=true;
        } 
        elseif ($_POST["cantidad"] < 99) {
            $cantidad = ($_POST["cantidad"]);
        }
        else {
            $errors[] ="Ingrese una cantidad valida 1-99";
            $fail=true;
        }
        if (empty($_POST["precComp"])) {
            $errors[] ="Ingrese un número";
            $fail=true;
        } 
        else {
            $precComp = ($_POST["precComp"]);
        }
        if (empty($_POST["precVent"])) {
            $errors[] ="Ingrese un número";
            $fail=true;
        } 
        else {
            $precVent = ($_POST["precVent"]);
        }
        if (!$fail) {
            fopen($myfile, "a");
            fwrite($myfile, "Producto: " .$producto. PHP_EOL ."Cantidad: ".$cantidad. PHP_EOL ."Precio Compra: " .$precComp. PHP_EOL  ."Precio Venta: " .$precVent);

            fclose($myfile);
        }       
        else {
        echo var_dump(errors);
        } 
    }
?>