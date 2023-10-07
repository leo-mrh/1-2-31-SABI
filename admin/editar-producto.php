
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
            Editar información de Productos
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
                  <h3 class="box-title">Llena el formulario para modificar los datos de un Producto</h3>
                </div>
                <div class="box-body">
                <?php 
                    $sql = "SELECT * FROM producto WHERE id_producto = $id ";
                    $resultado = $conn->query($sql);
                    $producto = $resultado->fetch_assoc();
                ?>
                <form role="form" name="guardar-registro" id="guardar-registro" method="post" action="modelo-producto.php">
                      <div class="box-body">
                          <div class="form-group">
                              <label for="codigo">Código del producto:</label>
                              <input type="text" class="form-control" id="codigo" name="codigo" placeholder="Código del producto" value="<?php echo $producto['codigo']; ?>">
                          </div>
                            <div class="form-group">
                              <label for="producto">Nombre del Producto:</label>
                              <input type="text" class="form-control" id="producto" name="producto" placeholder="Nombre del Producto" value="<?php echo $producto['nombre']; ?>">
                            </div>
                            <div class="form-group">
                              <label for="precio">Precio del Producto:</label>
                              <input type="text" class="form-control" id="precio" name="precio" placeholder="Precio del Producto" value="<?php echo $producto['precio_venta']; ?>">
                            </div>
                            <div class="form-group">
                              <label for="cantidad">Cantidad:</label>
                              <input type="text" class="form-control" id="cantidad" name="cantidad" placeholder="Cantidad de piezas" value="<?php echo $producto['stock']; ?>">
                            </div>

                       
                            <div class="form-group">
                                <label for="nombre">Descripción del Producto:</label>
                                <select name="descripcion" class="form-control seleccionar" >
                                <option value="0">- Seleccione -</option>
                                    <?php
                                        try {
                                            $descripcion_actual = $producto['id_tipo_producto'];
                                            $sql = "SELECT id_tipo_producto, descripcion FROM tipo_producto";
                                            $resultado = $conn->query($sql);
                                            while($descripcion = $resultado->fetch_assoc()) { 
                                                if($descripcion['id_tipo_producto'] == $descripcion_actual) { ?>
                                                    <option value="<?php echo $descripcion['id_tipo_producto']; ?>" selected>
                                                            <?php echo $descripcion['descripcion']; ?>
                                                    </option>
                                                <?php } else { ?>
                                                    <option value="<?php echo $descripcion['id_tipo_producto']; ?>" >
                                                            <?php echo $descripcion['descripcion']; ?>
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



