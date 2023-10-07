<?php
        include_once 'funciones/sesiones.php';
        include_once 'funciones/funciones.php';
        include_once 'templates/header.php';
        include_once 'templates/barra.php';
        include_once 'templates/navegacion.php';
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
          <h1>
            Listado de Productos
            <small></small>
          </h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Maneja la información de los productos en existencia en esta sección</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="registros" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Código</th>
                  <th>Nombre del Producto</th>
                  <th>Descripcion</th>
                  <th>Precio de Venta</th>
                  <th>Cantidad Existente</th>
               
                  <th>Operaciones</th>
                </tr>
                </thead>
                <tbody>
                        <?php
                            try {
                                $sql ="SELECT producto.id_producto, producto.codigo, producto.nombre, producto.precio_venta, producto.stock, tipo_producto.descripcion
                                FROM producto
                                INNER JOIN tipo_producto ON tipo_producto.id_tipo_producto=producto.id_tipo_producto";
                                $resultado = $conn->query($sql);
                            } catch (Exception $e) {
                                $error = $e->getMessage();
                                echo $error;
                            }
                            while($producto = $resultado->fetch_assoc() ) { ?>
                                <tr>
                                    <td><?php echo $producto['codigo']; ?></td>
                                    <td><?php echo $producto['nombre']; ?></td>
                                    <td><?php echo $producto['descripcion']; ?></td>
                                    <td><?php echo $producto['precio_venta']; ?></td>
                                    <td><?php echo $producto['stock']; ?></td>
                                   
                                    <td>
                                        <a href="editar-producto.php?id=<?php echo $producto['id_producto'] ?>" class="btn bg-orange btn-flat margin">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <a href="#" data-id="<?php echo $clientes['id_clientes'] ?>" data-tipo="cliente" class="btn bg-maroon bnt-flat margin borrar_registro">
                                            <i class="fa fa-trash"></i>
                                        </a>     
                                </td>
                            </tr>
                          <?php }  ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Código</th>
                  <th>Nombre del Producto</th>
                  <th>Descripcion</th>
                  <th>Precio de Venta</th>
                  <th>Cantidad Existente</th>
                  
                  <th>Operaciones</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php
          include_once 'templates/footer.php';
  ?>

