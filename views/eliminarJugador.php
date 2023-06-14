<?php

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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar jugadores</title>
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
        <div class="alert alert-danger text-center">
                     <p>¿Desea confirmar la eliminacion del registro?</p>
                 </div>
                 <div class="row">
                      <div class="col text-center p-1">
                        <form action="../php/funciones.php" method="POST">
                          <input type="hidden" name="acciones" value="eliminar_jugador">
                          <input type="hidden" name="id_jugador" id="id_jugador" value="<?php echo $_GET['id'];?>">
                          <input type="submit" name="" value="Eliminar" class= " btn btn-danger">
                          <a href="futbolCRUD.php" class="btn btn-success">Cancelar</a>     
                        </form>           
                </div>
        </div>
    </div>
</body>
<?php include('../index.php'); ?>
</html>