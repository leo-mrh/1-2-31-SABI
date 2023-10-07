
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
                <form role="form" name="guardar-registro" id="" method="post" action="modelo-venta.php">
                      <div class="box-body">

                          <div class="form-group">
                              <label>Fecha Venta:</label>
                              <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control pull-right" id="fecha" name="fecha">
                              </div>
                              <!-- /.input group -->
                            </div>
                                    
                            <div class="bootstrap-timepicker">
                                <div class="form-group">
                                    <label>Hora Venta:</label>
                                    <div class="input-group">
                                          <input type="text" class="form-control timepicker" id="hora" name="hora">
                                          <div class="input-group-addon">
                                              <i class="fa fa-clock-o"></i>
                                          </div>
                                    </div>
                                    <!-- /.input group -->
                                </div>
                              <!-- /.form group -->
                            </div>
                            <div class="form-group">
                              <label for="subtotal">Subtotal de Venta</label>
                              <input type="text" class="form-control" id="subtotal" name="subtotal" placeholder="Subtotal">
                            </div>
                            <div class="form-group">
                              <label for="total">Total de Venta</label>
                              <input type="text" class="form-control" id="total" name="total" placeholder="Total">
                            </div>
                        
                            <div class="form-group">
                              <label for="nombre">Nombre del cliente que realizo la venta:</label>
                                <select name="nombre" class="form-control seleccionar">
                                  <option value="0">- Seleccione -</option>
                                    <?php
                                      try {
                                          $sql = "SELECT * FROM clientes";
                                          $resultado = $conn->query($sql);
                                          while($cliente = $resultado->fetch_assoc()) { ?>
                                          <option value="<?php echo $cliente['id_clientes']; ?>">
                                          <?php echo $cliente['nombre']; ?>  
                                          <?php echo $cliente['apellido']; ?>    
                                          </option>
                                          <?php }    
                                          } catch (Exception $e) {
                                              echo "Error: " . $e->getMessage();
                                          }
                                      ?>
                                  </select>
                            </div><!--estado-->

 
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
                          <button type="submit" class="btn btn-primary" >Añadir</button>
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



