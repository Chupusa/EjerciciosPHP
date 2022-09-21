<?php

// Clases son conjunto de metodos y atributos que estan agrupados 
// metodos son funciones de PHP, solo que dentro de las clases se llaman metodos 
// Atributo en una clase es una Variable de PHP 
// Instanciar una clase 

class calculadora {

    var $op1;   // Atributo 1
    var $op2;   // Atributo 2
    var $res;   // Atributo 3

    function sumar($valor1,$valor2) // Metodo 1
    {
        $this->op1 = $valor1 + $valor2;
    }

    function multiplicar($valor1,$valor2) // Metodo 2
    {
        $this->op2 = $valor1 + $valor2;
    }

    function resultado() // Metodo 3
    {
        $this->res = $this-> op1 + $this->op2;
        echo $this-> res;
    }
}

    // Una herencia es un mecanismo mediante la cual una subclase puede obtener todos los metodos o atributos de una clase principal
    class texto extends calculadora
        {
            var $var1;
            funtion mostrar($par1)
            {
                $this->var1 = $par1;
                echo $this->var1;
            }

        }

// Herencia es un mecanismo mediante el cual una subclase puede heredar todos los metodos de la clase
 $clase = new calculadora;  // Instanciar la forma de guardar una clase para acceder a sus metodos
 $clase-> sumar(2,2);   // Accedemos a cada metodo usando el apuntador (->) 
 $clase-> multiplicar(3,3);
 $clase-> resultado();
 $clase-> mostrar ("Hola esto es un metodo de la sub-clase");
?>