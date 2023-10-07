
<?php
   $id = $_GET['id'];
   if(!filter_var($id, FILTER_VALIDATE_INT)){ //Se niega
       die("Error");
   }
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
            Modificar datos de Clientes
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
                  <h3 class="box-title">Llena el formulario para modificar los datos de un Cliente</h3>
                </div>
                <div class="box-body">
                <?php 
                    $sql = "SELECT * FROM clientes WHERE id_clientes = $id ";
                    $resultado = $conn->query($sql);
                    $clientes = $resultado->fetch_assoc();
                ?>
                <form role="form" name="guardar-registro" id="guardar-registro" method="post" action="modelo-cliente.php">
                      <div class="box-body">
                          <div class="form-group">
                              <label for="nombre">Nombre:</label>
                              <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Tu Nombre" value="<?php echo $clientes['nombre']; ?>">
                          </div>
                            <div class="form-group">
                              <label for="apellido">Apellido:</label>
                              <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Tu Apellido" value="<?php echo $clientes['apellido']; ?>">
                            </div>
                            <div class="form-group">
                              <label for="email">Correo Electrónico</label>
                              <input type="text" class="form-control" id="email" name="email" placeholder="example@correo.com" value="<?php echo $clientes['telefono']; ?>">
                            </div>
                            <div class="form-group">
                              <label for="direccion">Dirección:</label>
                              <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Tu Dirección" value="<?php echo $clientes['email']; ?>">
                            </div>
                            <div class="form-group">
                              <label for="telefono">Teléfono:</label>
                              <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Tu Teléfono" value="<?php echo $clientes['direccion']; ?>">
                            </div>
                            <div class="form-group">
                              <label for="cp">Código Postal:</label>
                              <input type="text" class="form-control" id="cp" name="cp" placeholder="Tu Código Postal" value="<?php echo $clientes['cp']; ?>">
                            </div>

                          
                            <div class="form-group">
                                <label for="nombre">Estado:</label>
                                <select name="estado" class="form-control seleccionar" >
                                <option value="0">- Seleccione -</option>
                                    <?php
                                        try {
                                            $estado_actual = $clientes['id_edo'];
                                            $sql = "SELECT id_edo, nombre_edo FROM estado ";
                                            $resultado = $conn->query($sql);
                                            while($estado = $resultado->fetch_assoc()) { 
                                                if($estado['id_edo'] == $estado_actual) { ?>
                                                    <option value="<?php echo $estado['id_edo']; ?>" selected>
                                                            <?php echo $estado['nombre_edo']; ?>
                                                    </option>
                                                <?php } else { ?>
                                                  <option value="<?php echo $estado['id_edo']; ?>">
                                                            <?php echo $estado['nombre_edo']; ?>
                                                    </option>
                                                
                                            <?php } //fin del if
                                            }     //fin del while
                                        } catch (Exception $e) {
                                            echo "Error: " . $e->getMessage();
                                        }
                                        
                                    
                                    ?>
                            </select>
                            </div><!---->

                          
                            <div class="form-group">
                                <label for="nombre">  Municipio:</label>
                                <select name="municipio" class="form-control seleccionar" >
                                <option value="0">- Seleccione -</option>
                                    <?php
                                        try {
                                            $municipio_actual = $clientes['id_mun'];
                                            $sql = "SELECT id_mun, nombre_mun FROM municipio ";
                                            $resultado = $conn->query($sql);
                                            while($municipio = $resultado->fetch_assoc()) { 
                                                if($municipio['id_mun'] == $municipio_actual) { ?>
                                                    <option value="<?php echo $municipio['id_mun']; ?>" selected>
                                                            <?php echo $municipio['nombre_mun']; ?>
                                                    </option>
                                                <?php } else { ?>
                                                  <option value="<?php echo $municipio['id_mun']; ?>">
                                                            <?php echo $municipio['nombre_mun']; ?>
                                                    </option>
                                                
                                            <?php } //fin del if
                                            }     //fin del while
                                        } catch (Exception $e) {
                                            echo "Error: " . $e->getMessage();
                                        }
                                        
                                    
                                    ?>
                            </select>
                            </div><!---->
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
                            <input type="hidden" name="registro" value="actualizar">
                            <input type="hidden" name="id_registro" value="<?php  echo $id; ?>">
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
      </div>
</div>
  <!-- /.content-wrapper -->

<?php include_once('templates/footer.php'); ?>



