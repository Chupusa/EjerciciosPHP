<html>
<head>
<title>Ejemplo de PHP</title> //Este es un comentario
</head>

<body>
<font face="Arial, Helvetica, sans-serif">

<?php 
    $N=$_GET['N'];
    print "Los numeros impares menores de $N son: ";
    $i=0;
    while ($i<$N){
          $resto=$i%2;
          if ($resto == 1){
              print "$i ";
           }
          $i++;
    }
?>
</font>
</body>
</html>