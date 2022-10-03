<?php
    class calculadora
    {

/* Metodos son funciones de PHP  solo que dentro de clases se llaman metodos*/
/* Atributos dentro de una clase es una Variable de PHP */

        var $op1;
        var $op2;
        var $res;


        function sumar($valor1,$valor2)
        {
            $this->op1 = $valor1 + $valor2;
         
        }

        function multiplicar($valor1,$valor2)
        {
            $this->op1 = $valor1 - $valor2;
         
        }

        function resultado($valor1,$valor2)
        {

         
        }

    }

?>