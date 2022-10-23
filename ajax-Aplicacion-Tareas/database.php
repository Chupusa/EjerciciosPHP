<?php
    $connection = mysqli_connect('localhost', 'root', 'password', 'task-app');

        if($connection){
            echo "La Base de Datos esta Conectada";
        }
?>