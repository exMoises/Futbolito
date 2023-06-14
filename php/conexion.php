<?php


function conection(){
    $host = "localhost";
    $user = "root";
    $password = "123456789";
    $database = "futbol";

    $conexion = mysqli_connect($host, $user, $password, $database);
    if(!$conexion){
       echo "Error:".
       mysqli_connect_error();
    }else{
          return $conexion;
    }   
}


