
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
            Alta de Usuarios
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
                  <h3 class="box-title">Llena el formulario para crear un Usuario</h3>
                </div>
                <div class="box-body">
                <form role="form" name="guardar-registro" id="" method="post" action="modelo-admin.php">
                      <div class="box-body">
                          <div class="form-group">
                              <label for="usuario">Nombre de Usuario:</label>
                              <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Tu Usuario">
                          </div>
                            <div class="form-group">
                              <label for="nombre">Nombre:</label>
                              <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Tu Nombre">
                            </div>
                            <div class="form-group">
                              <label for="apellido">Apellido:</label>
                              <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Tu Apellido">
                            </div>
                            <div class="form-group">
                              <label for="nombre">Tipo de Usuario:</label>
                                <select name="tipo_usuario" class="form-control seleccionar">
                                  <!--  <option value="0">- Seleccione -</option>-->
                                    <?php
                                      try {
                                          $sql = "SELECT * FROM tipo_usuario ";
                                          $resultado = $conn->query($sql);
                                          while($tipo = $resultado->fetch_assoc()) { ?>
                                          <option value="<?php echo $tipo['id_tipo_usuario']; ?>">
                                          <?php echo $tipo['tipo']; ?>    
                                          </option>
                                          <?php }    
                                          } catch (Exception $e) {
                                              echo "Error: " . $e->getMessage();
                                          }
                                      ?>
                                  </select>
                            </div>
                            <div class="form-group">
                              <label for="password">Password:</label>
                              <input type="password" class="form-control" id="password" name="password" placeholder="Tu Password">
                            </div>
                            <div class="form-group">
                              <label for="password">Repetir Password:</label>
                              <input type="password" class="form-control" id="repetir_password" name="repetir_password" placeholder="Tu Password">
                              <span id="resultado_password" class="help-block"></span>
                            </div>
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



