
<?php
$id = $_GET['id'];
if(!filter_var($id, FILTER_VALIDATE_INT)){ //Se niega
    die("Error");
}
include_once('funciones/sesiones.php');
include_once('templates/header.php');
include_once('funciones/funciones.php');
include_once('templates/barra.php');
include_once('templates/navegacion.php');

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Actualizar Administradores
          <small></small>
        </h1>
      </section>


  <div class="row">
      <div class="col-md-8">
      <!-- Main content -->
      <section class="content">
          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Actualizar Información de Usuarios</h3>
            </div>
            <div class="box-body">
                <?php 
                    $sql = "SELECT * FROM usuario WHERE id_usuario = $id";
                    $resultado = $conn->query($sql);
                    $usuario = $resultado->fetch_assoc();
                ?>
            <form role="form" name="guardar-registro" id="guardar-registro-archivo" method="post" action="modelo-admin.php">
              <div class="box-body">
                  <div class="form-group">
                      <label for="usuario">Nombre de Usuario:</label>
                      <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Tu Usuario" value="<?php echo $usuario['nombre_usr']; ?>" >
                  </div>
                  <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Tu Nombre" value="<?php echo $usuario['nombre']; ?>">
                  </div>
                  <div class="form-group">
                    <label for="apellido">Apellido:</label>
                    <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Tu Apellido" value="<?php echo $usuario['apellido']; ?>">
                  </div>
                  <div class="form-group">
                    <label for="nombre">Tipo de Usuario:</label>
                    <select name="tipo_usuario" class="form-control seleccionar">
                      <option value="0">- Seleccione -</option>
                        <?php
                          try {
                              $tipo_actual = $usuario['id_tipo_usuario'];
                              $sql = "SELECT id_tipo_usuario, tipo FROM tipo_usuario ";
                              $resultado = $conn->query($sql);
                              while($tipo_usuario = $resultado->fetch_assoc()) { 
                                if($tipo_usuario['id_tipo_usuario'] == $tipo_actual) {?>
                                  <option value="<?php echo $tipo['id_tipo_usuario']; ?>" selected>
                                        <?php echo $tipo_usuario['tipo']; ?>    
                                  </option>
                          <?php } else {?>
                                  <option value="<?php echo $tipo['id_tipo_usuario']; ?>">
                                  <?php echo $tipo_usuario['tipo']; ?>    
                                  </option>
                              <?php }
                              }    
                              } catch (Exception $e) {
                                  echo "Error: " . $e->getMessage();
                              }
                          ?>
                      </select>
                  </div> <!--.form-gruop-->
                  
                  <div class="form-group">
                    <label for="password">Password: </label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password para Iniciar Sesión">
                  </div>


            </div>
            <div class="box-footer">
                <input type="hidden" name="registro" value="actualizar">
                <input type="hidden" name="id_registro" value="<?php echo $id; ?>">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
            </form>
          </div>
            <!-- /.box-body -->
        </div>
          <!-- /.box -->
      </section>
      <!-- /.content -->
          </div>
          <!--class="col-md-8"-->
      </div>
      <!-- .class-row -->
</div>
  <!-- /.content-wrapper -->

<?php include_once('templates/footer.php'); ?>



