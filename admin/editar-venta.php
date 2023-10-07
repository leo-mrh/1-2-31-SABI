
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
            Registro de Ventas
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
                  <h3 class="box-title">Llena el formulario para registrar los datos de una Venta</h3>
                </div>
                <div class="box-body">
                <?php 
                    $sql = "SELECT * FROM venta WHERE id_venta = $id ";
                    $resultado = $conn->query($sql);
                    $venta = $resultado->fetch_assoc();
                ?>
                <form role="form" name="guardar-registro" id="guardar-registro" method="post" action="modelo-venta.php">
                      <div class="box-body">

                      <div class="form-group">
                            <label>Fecha Evento:</label>
                            <?php
                                $fecha = $venta['fecha'];
                                $fecha_formato = date('m/d/Y', strtotime($fecha));
                            ?>
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" class="form-control pull-right" id="fecha" name="fecha" value="<?php echo $fecha_formato; ?>">
                            </div>
                                          <!-- /.input group -->
                    </div>
                                    
                            <div class="bootstrap-timepicker">
                                          <div class="form-group">
                                                <label>Hora:</label>
                                                <?php
                                                    $hora = $venta['hora'];
                                                    $hora_formato = date('h:i a', strtotime($hora));
                                                
                                                ?>
                                                <div class="input-group">
                                                      <input type="text" class="form-control timepicker" name="hora" value="<?php echo $hora_formato; ?>">

                                                      <div class="input-group-addon">
                                                          <i class="fa fa-clock-o"></i>
                                                      </div>
                                                </div>
                                                <!-- /.input group -->
                                              </div>
                                          <!-- /.form group -->
                                    </div>
                            <div class="form-group">
                              <label for="subtotal">Subtotal de Venta:</label>
                              <input type="text" class="form-control" id="subtotal" name="subtotal" placeholder="Subtotal" value="<?php echo $venta['subtotal']; ?>">
                            </div>
                            <div class="form-group">
                              <label for="total">Total de Venta:</label>
                              <input type="text" class="form-control" id="total" name="total" placeholder="Total" value="<?php echo $venta['total']; ?>">
                            </div>
                        
                            <div class="form-group">
                                <label for="nombre">Cliente:</label>
                                <select name="nombre" class="form-control seleccionar" >
                                <option value="0">- Seleccione -</option>
                                    <?php
                                        try {
                                            $cliente_actual = $venta['id_clientes'];
                                            $sql = "SELECT id_clientes, nombre, apellido FROM clientes ";
                                            $resultado = $conn->query($sql);
                                            while($clientes = $resultado->fetch_assoc()) { 
                                                if($clientes['id_clientes'] == $cliente_actual) { ?>
                                                    <option value="<?php echo $clientes['id_clientes']; ?>" selected>
                                                            <?php echo $clientes['nombre'] . " " . $clientes['apellido']; ?>
                                                    </option>
                                                <?php } else { ?>
                                                    <option value="<?php echo $clientes['id_clientes']; ?>">
                                                            <?php echo $clientes['nombre'] . " " . $clientes['apellido']; ?>
                                                    </option>
                                                
                                            <?php } //fin del if
                                            }     //fin del while
                                        } catch (Exception $e) {
                                            echo "Error: " . $e->getMessage();
                                        }
                                        
                                    
                                    ?>
                            </select>
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



