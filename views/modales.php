<div class="modal fade" id="modalagregarhorario" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document" style="max-width: 40%;">
        <div class="modal-content">
            <div class="modal-header justify-content-center">

                <h6 class="modal-title" id="modal-title-default">Asociar fechas <span id="tituloS"></span></h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input id="iIDPeriodoAsociar" type="hidden" name="iIDPeriodoAsociar" value="0" />
                <div class="row justify-content-center">
                    <div class=" col-6">
                    <form  action="../php/funciones.php" method="POST">
                        <div class="form-group">
                            <label class="form-control-placeholder" id="start-p" for="start">Equipo</label>
                            <select name="id_equipo" id="id_equipo" class="form-select">
                                <?php
                                $conexion = conection();     
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
                        <div  class="form-group">
                            <label class="form-control-placeholder"  for="nombreJugador">Nombre</label>
                            <input type="text" id="nombreJugador" name="nombreJugador" class="form-control" placeholder="Nombre jugador" pattern="^[a-zA-Z]+\s\D*([a-zA-Z])+$" required />
                        </div>
                        <br>
                        <div class="form-group">
                            <label class="form-control-placeholder"  for="numeroJugador">Número de jugador</label>
                            <input type="number" id="numeroJugador" name="numeroJugador" class="form-control" min="0" pattern="^[0-9]$" required/>
                        </div>
                        <br>
                        <br>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" name="registrar" class="btn btn-primary">Guardar</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
