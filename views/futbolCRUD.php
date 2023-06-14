<?php
require_once ("../php/conexion.php");
session_start();
error_reporting(0);

$sesion = $_SESSION['token'];
if( $sesion == null || $sesion = ''){
  header('Location: ../views/login.php');
  die();
}
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
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="row" style="margin-top: 20px;">
                            <div class="row">
                                <div class="input-group">
                                  <input type="search" onkeyup="buscar()" id="buscar" class="form-control col-md-6" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                                   <span class="input-group-text border-0" id="search-addon">
                                        <i class="fas fa-search"></i>
                                   </span>
                                </div>
                            </div>
                           <div class="row" style="margin-top: 5px;">
                               <div class="">
                                    <button id="btnAgregarJugadorFutbol" class="btn btn-sm  btn-primary btn-round"><i
                                     class="fas fa-plus"></i>Agregar jugador</button>
                               </div>
                           </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <table cellspacing="0" class="table table-striped table-bordered" id="tabla"
                                style="margin-top: 5px;">
                                <thead class="thead-dark">
                                    <th>Id</th>
                                    <th>Nombre de equipo</th>
                                    <th>Nombre de jugador</th>
                                    <th>Goles</th>
                                    <th>Partidos jugados</th>
                                    <th>Número de jugador</th>
                                    <th>Acciones</th> 
                                </thead>
                                <?php 
                                     $conexion = conection();     
                                     //uso de views          
                                     $sql="SELECT * FROM futbol.jugadores_equipo_view;";
                                     $rows = mysqli_query($conexion, $sql);
                                     if($rows -> num_rows >0){
                                         while($fila=mysqli_fetch_array($rows)){
                                ?>
                                <tr>
                                    <td><?php echo $fila['id_jugador']; ?></td>
                                    <td><?php echo $fila['nombre_equipo']; ?></td>
                                    <td><?php echo $fila['nombre_completo']; ?></td>
                                    <td><?php echo $fila['goles']; ?></td>
                                    <td><?php echo $fila['partidos_jugados']; ?></td>
                                    <td><?php echo $fila['numero_jugador']; ?></td>
                                    <td>
                                        <a class="btn btn-warning" href="editar_jugador.php?id=<?php echo $fila['id_jugador']?>">
                                        <i class="fa fa-edit"></i> </a>
                                    
                                        <a class="btn btn-danger"  href="eliminarJugador.php?id=<?php echo $fila['id_jugador']?>">
                                        <i class="fa fa-trash"></i></a>
                                    </td>
                                      </tr>
                                      <?php
                                        }
                                      }else{
                                      ?>
                                        <tr class="text-center">
                                            <td colspan="16">No existen jugadores.</td>
                                        </tr>
                                        <?php
                                        }
                                        ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<?php include('../index.php'); ?>
<?php include('modales.php'); ?>
<script src="../js/events.js"></script>
<script src="../js/buscador.js"></script>
</html>