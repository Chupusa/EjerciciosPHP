<?php
   try{
    $usuario = "root";
    $contraseña = "";
    
    
    $conexion = new PDO('mysql:host=localhost;dbname=ejercicio',$usuario, $contraseña);
    $SQL = "SELECT nombres, apellidos, telefono FROM ejercicio WHERE id='2'";
    $stmt = $conexion -> prepare($SQL);
    $stmt-> execute();
    $rows = $stmt->fetchAll(\PDO::FETCH_OBJ);
    printf(json_encode($rows));
    }catch (PDOException $e){
        echo "Error de Conexion! ".$e;
        exit;
    }
    ?>
    
   //Configuracion de la conexion a base de datos
   // $bd_host = "localhost";
   //$bd_usuario = "root";
    //$bd_password = "";
    //$bd_base = "ejercicio";
    
    //$con = mysqli_connect($bd_host, $bd_usuario, $bd_password, $bd_base);
    //mysqli_select_db($con, $bd_base);
    //consulta todos los empleados
    
    //$sql=mysqli_query($con, "SELECT idempleado nombres departamento sueldo FROM empleados WHERE idempleado='2'");
        
    //muestra los datos consultados
    //echo "</p>Nombres - Departamento - Sueldo</p> \n";
    //while($row = mysqli_fetch_array($sql)){
    //echo "<p>".$row['nombres']." - ".$row['departamento']." - ".$row['sueldo']."</p> \n";
    //}
