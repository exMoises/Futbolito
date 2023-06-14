<?php
require_once ("conexion.php");

if (isset($_POST['acciones'])){ 
    switch ($_POST['acciones']){
        //casos de registros
        
        case 'acceso_usuario';
            accesoSesion();
        break;
        case 'editar_jugador';
            editar_jugador();
        break;
        case 'eliminar_jugador';
            eliminar_jugador();
        break;
        case 'crear_jugador';
            crear_jugador();
        break;
  }
}

function accesoSesion(){
    $nombreSesion = $_POST['idUsuario'];
    $passwordSesion = $_POST['idPassword'];
    session_start();
    $_SESSION['token']=$nombreSesion;

    $conexion = conection();
    $consulta= "SELECT * FROM usuario WHERE nombreUsuario='$nombreSesion' AND contrasena='$passwordSesion'";
    $resultado=mysqli_query($conexion, $consulta);
    $filas=mysqli_fetch_array($resultado);
    mysqli_close($conexion);
    if($filas){ 
        header('Location: ../views/futbolCRUD.php');
    }else{
        session_destroy();
        echo'<script type="text/javascript">
        alert("Credenciales incorrectas.");
        window.location.href="../views/login.php";
        </script>';
    }
}

function eliminar_jugador(){
    $conexion = conection();
    extract($_POST);
    $id_jugador = $_POST['id_jugador'];
    $consulta = "UPDATE jugador SET lactivo = 0 WHERE (id_jugador = '$id_jugador');";
    mysqli_query($conexion, $consulta);
    mysqli_close($conexion);
    echo 'HOLAA'.$id_jugador;
    header('Location: ../views/futbolCRUD.php');
}

function editar_jugador(){
    $conexion = conection();
    extract($_POST);
    $id_equipo = $_POST['id_equipo'];
    $id_jugador = $_POST['id'];
    $goles = $_POST['numeroGoles'];
    $partidos_jugados = $_POST['numeroPartidos'];
    $numero_jugador = $_POST['numeroJugador'];

    $consulta1 = "SELECT * FROM futbol.jugador WHERE id_equipo = '$id_equipo'
    AND numero_jugador = '$numero_jugador' AND lactivo = '1' AND id_jugador != '$id_jugador';";
    //echo $consulta1;
    $resultado=mysqli_query($conexion, $consulta1);
    $filas=mysqli_fetch_array($resultado);
    //print_r( $filas);
   if($filas){
        mysqli_close($conexion);
        echo'<script type="text/javascript">
        alert("El número de jugador ya existe en el equipo.");
        window.location.href="../views/futbolCRUD.php";
        </script>';
   }else{
    $consulta = "UPDATE futbol.jugador SET
    id_equipo = '$id_equipo',
    goles = '$goles',
    partidos_jugados = '$partidos_jugados',
    numero_jugador = '$numero_jugador'
    WHERE (id_jugador = '$id_jugador');";
    echo $consulta;
    mysqli_query($conexion, $consulta);
    mysqli_close($conexion);
    echo'<script type="text/javascript">
        alert("Información actualizada del jugador.");
        window.location.href="../views/futbolCRUD.php";
        </script>';
   }
}

function crear_jugador(){
    $nombreSesion = $_POST['idUsuario'];
    $passwordSesion = $_POST['idPassword'];

    $conexion = conection();
    $consulta= "SELECT * FROM usuario WHERE nombreUsuario='$nombreSesion'";
    $resultado=mysqli_query($conexion, $consulta);
    $filas=mysqli_fetch_array($resultado);
    
    if($filas){
        mysqli_close($conexion); 
        echo'<script type="text/javascript">
        alert("El usuario ya existe.");
        window.location.href="../views/registrarUsuario.php";
        </script>';
    }else{
        $consulta= "INSERT INTO futbol.usuario (nombreUsuario, contrasena) VALUES ('$nombreSesion', '$passwordSesion');";
        $resultado=mysqli_query($conexion, $consulta);
        $filas=mysqli_fetch_array($resultado);
        mysqli_close($conexion); 
        echo'<script type="text/javascript">
        alert("Usuario creado con éxito.");
        window.location.href="../views/login.php";
        </script>';
    }
}


if (isset($_POST['registrar'])){ 
    $idequipo = trim($_POST['id_equipo']);
    $nombre_jugador = trim($_POST['nombreJugador']);
    $numero_jugador = trim($_POST['numeroJugador']);

    $conexion = conection();

    $consulta1 = "SELECT * FROM futbol.jugador WHERE id_equipo = '$idequipo'
     AND numero_jugador = '$numero_jugador' AND lactivo = '1';";
    $resultado=mysqli_query($conexion, $consulta1);
    $filas=mysqli_fetch_array($resultado);
    //echo $filas;
    if($filas){
        mysqli_close($conexion);
        echo'<script type="text/javascript">
        alert("El número de jugador ya existe en el equipo.");
        window.location.href="../views/futbolCRUD.php";
        </script>';
    }else{
        $consulta= "INSERT INTO jugador (nombre_completo, id_equipo, id_seleccion, goles, 
        partidos_jugados, numero_jugador, lactivo) VALUES ('$nombre_jugador', $idequipo, 1, 0, 0, '$numero_jugador', 1);";
    
        mysqli_query($conexion, $consulta);
        mysqli_close($conexion);
        echo'<script type="text/javascript">
        alert("Jugador registrado.");
        window.location.href="../views/futbolCRUD.php";
        </script>';
    }
}


