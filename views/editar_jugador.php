<?php include('../index.php'); ?>
<?php
require_once ("../php/conexion.php");
session_start();
error_reporting(0);

$sesion = $_SESSION['token'];
if( $sesion == null || $sesion = ''){
  header('Location: ../views/login.php');
  die();
}

$id_jugador = $_GET['id'];
//echo '<p>Hola'.$id_jugador.'</p>';
$conexion = conection();
$consulta = "SELECT jugador.id_equipo, equipos.nombre_equipo, jugador.goles, jugador.partidos_jugados, jugador.numero_jugador
FROM futbol.jugador, futbol.equipos WHERE jugador.id_jugador = '$id_jugador' AND jugador.id_equipo = equipos.id_equipo";
$resultado = mysqli_query($conexion, $consulta);
$jugador = mysqli_fetch_assoc($resultado);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-11">
            <h4 class="text-uppercase font-weight-bold">Futbolito</h4>
        </div>
        <div class="col-1">
            <a class="btn btn-warning" href="../php/cerrarSesion.php"><i class="fas fa-power-off"></i></a>
        </div>
    </div>
</div>
<div class="container-fluid" style="height: 150%; width: 40%; margin-top:100px;">
        <div class="card">
            <div class="card-header">
                Editar jugador
            </div>
            <div class="card-body">
            <div class="row justify-content-center">
                    <div class=" col-6">
                    <form  action="../php/funciones.php" method="POST">
                        <div class="form-group">
                            <label class="form-control-placeholder"  id="start-p" for="start">Equipo</label>
                            <select  name="id_equipo" id="id_equipo"  class="form-select">
                                <option value="<?php echo $jugador['id_equipo'];?>"><?php echo $jugador['nombre_equipo'];?></option>
                                <?php
                                
                                //uso de views          
                                $sql="SELECT id_equipo,nombre_equipo FROM futbol.equipos;";
                                $rows = mysqli_query($conexion, $sql);
                                while ($valores = mysqli_fetch_array($rows)) {
                                    echo '<option  value="'.$valores['id_equipo'].'">'.$valores['nombre_equipo'].'</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <br>
                        <div class="form-group">
                            <label class="form-control-placeholder"  for="numeroGoles">Número de goles</label>
                            <input type="number" id="numeroGoles" value="<?php echo $jugador['goles'];?>" name="numeroGoles" min="0" pattern="^[0-9]$" class="form-control" required/>
                       </div>
                       <br>
                       <div class="form-group">
                           <label class="form-control-placeholder"  for="numeroPartidos">Número de partidos jugados</label>
                           <input type="number" value="<?php echo $jugador['partidos_jugados'];?>" id="numeroPartidos" name="numeroPartidos" min="0" pattern="^[0-9]$" class="form-control" required/>
                      </div>
                      <br>
                      <div class="form-group">
                          <label class="form-control-placeholder"  for="numeroJugador">Número de jugador</label>
                          <input type="number" value="<?php echo $jugador['numero_jugador'];?>" id="numeroJugador" name="numeroJugador" min="0" pattern="^[0-9]$" class="form-control" required/>
                          <input type="hidden" name="acciones" value="editar_jugador">
                          <input type="hidden" name="id" value="<?php echo $id_jugador;?>">
                        </div>
                      <div class="text-center p-2">
                            <button type="submit" class="btn btn-success" >Confirmar</button>
                            <a href="futbolCRUD.php" class="btn btn-danger">Cancelar</a>
                      </div>
                    </form>
                    </div>
            </div>  
        </div>
    </div>
</body>

</html>