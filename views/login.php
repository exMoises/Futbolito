<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


<form  action="../php/funciones.php" method="POST">
<section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <div class="mb-md-5 mt-md-4 pb-5">
              <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
              <p class="text-white-50 mb-5">Please enter your login and password!</p>
              
              <!-- inputs -->
              <div class="form-outline form-white mb-4">
                <input type="text" id="idUsuario" name="idUsuario" class="form-control form-control-lg" pattern="^[a-zA-Z0-9]{8,16}$"required/>
                <label class="form-label" for="idUsuario">Nombre de usuario</label>
              </div>

              <div class="form-outline form-white mb-2">
                <input type="password" id="idPassword" name="idPassword" class="form-control form-control-lg" pattern="^[a-zA-Z0-9]{8}$" required/>
                <label class="form-label" for="idPassword">Password</label>
              </div>
              <button class="btn btn-outline-light btn-lg px-5" type="submit">Login</button>
            </div>
            <!-- Registrate -->
            <div>
              <p class="mb-0">Don't have an account? <a href="registrarUsuario.php" class="text-white-50 fw-bold">Sign Up</a></p>
            </div>
            <input type="hidden" name="acciones" value="acceso_usuario">
          </div>
        </div>
      </div>
    </div>
  </div> 
</form>
</section>
</body>

<?php include('../index.php'); ?>
</html>