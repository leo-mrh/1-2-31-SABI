
<?php
include_once('funciones/sesiones.php');
include_once('funciones/funciones.php');
include_once('templates/header.php');
include_once('templates/barra.php');
include_once('templates/navegacion.php');
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Alta de Clientes
          <!--  <small>Llena el formulario para crear un Usuario</small>-->
          </h1>
        </section>
        
    <div class="row">
        <div class="col-md-6">
        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Llena el formulario para registrar los datos de un Cliente</h3>
                </div>
                <div class="box-body">
                <form role="form" name="guardar-registro" id="" method="post" action="modelo-cliente.php">
                      <div class="box-body">
                          <div class="form-group">
                              <label for="nombre">Nombre:</label>
                              <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Tu Nombre">
                          </div>
                            <div class="form-group">
                              <label for="apellido">Apellido:</label>
                              <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Tu Apellido">
                            </div>
                            <div class="form-group">
                              <label for="email">Correo Electrónico</label>
                              <input type="text" class="form-control" id="email" name="email" placeholder="example@correo.com">
                            </div>
                            <div class="form-group">
                              <label for="direccion">Dirección:</label>
                              <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Tu Dirección">
                            </div>
                            <div class="form-group">
                              <label for="telefono">Teléfono:</label>
                              <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Tu Teléfono">
                            </div>
                            <div class="form-group">
                              <label for="cp">Código Postal:</label>
                              <input type="text" class="form-control" id="cp" name="cp" placeholder="Tu Código Postal">
                            </div>

                            <div class="form-group">
                              <label for="nombre">Estado:</label>
                                <select name="estado" class="form-control seleccionar">
                                  <option value="0">- Seleccione -</option>
                                    <?php
                                      try {
                                          $sql = "SELECT * FROM estado";
                                          $resultado = $conn->query($sql);
                                          while($nombre_edo = $resultado->fetch_assoc()) { ?>
                                          <option value="<?php echo $nombre_edo['id_edo']; ?>">
                                          <?php echo $nombre_edo['nombre_edo']; ?>    
                                          </option>
                                          <?php }    
                                          } catch (Exception $e) {
                                              echo "Error: " . $e->getMessage();
                                          }
                                      ?>
                                  </select>
                            </div><!--estado-->

                            <div class="form-group">
                              <label for="nombre">Municipio:</label>
                                <select name="municipio" class="form-control seleccionar">
                                  <option value="0">- Seleccione -</option>
                                    <?php
                                      try {
                                          $sql = "SELECT * FROM municipio";
                                          $resultado = $conn->query($sql);
                                          while($nombre_mun = $resultado->fetch_assoc()) { ?>
                                          <option value="<?php echo $nombre_mun['id_mun']; ?>">
                                          <?php echo $nombre_mun['nombre_mun']; ?>    
                                          </option>
                                          <?php }    
                                          } catch (Exception $e) {
                                              echo "Error: " . $e->getMessage();
                                          }
                                      ?>
                                  </select>
                            </div><!--municipío-->
                          <!--Activo
                          <label for="activo">Activo:</label>
                            <div class="form-group">
                              <label>
                                Si:
                                <input type="radio" name="activo" class="flat-red" value="si" checked>
                              </label>
                              <label>
                                No:
                                <input type="radio" name="activo" class="flat-red" value="no">
                              </label>
                          </div>-->

                      </div>
                      <!-- /.box-body -->
                      
                      <div class="box-footer">
                          <input type="hidden" name="registro" value="nuevo">
                          <button type="submit" class="btn btn-primary" id="crear_registro">Añadir</button>
                      </div>
                    </form>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </section>
      <!-- /.content -->
      
          </div>
      </div>
</div>
  <!-- /.content-wrapper -->

<?php include_once('templates/footer.php'); ?>



