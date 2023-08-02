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
            Listado de Ventas
            <small></small>
          </h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Maneja la información de las ventas realizadas en esta sección</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="registros" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Clave</th>
                  <th>Fecha</th>
                  <th>Hora</th>
                  <th>Subtotal</th>
                  <th>Total</th>
                  <th>Nombre Cliente</th>
                  <th>Operaciones</th>
                </tr>
                </thead>
                <tbody>
                        <?php
                            try {
                                $sql ="SELECT venta.id_venta, venta.fecha, venta.hora, venta.subtotal, venta.total, clientes.nombre, clientes.apellido
                                FROM venta
                                INNER JOIN clientes ON clientes.id_clientes=venta.id_clientes";
                                $resultado = $conn->query($sql);
                            } catch (Exception $e) {
                                $error = $e->getMessage();
                                echo $error;
                            }
                            while($clientes = $resultado->fetch_assoc() ) { ?>
                                <tr>
                                    <td><?php echo $clientes['id_venta']; ?></td>
                                    <td><?php echo $clientes['fecha']; ?></td>
                                    <td><?php echo $clientes['hora']; ?></td>
                                    <td><?php echo $clientes['subtotal']; ?></td>
                                    <td><?php echo $clientes['total']; ?></td>
                                    <td><?php echo $clientes['nombre']; ?></td>
                                    <td>
                                        <a href="editar-admin.php?id=<?php echo $usuario['id_usuario'] ?>" class="btn bg-orange btn-flat margin">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <a href="#" data-id="<?php echo $usuario['id_usuario']; ?>" data-tipo="admin" class="btn bg-maroon bnt-flat margin borrar_registro">
                                        <i class="fa fa-trash"></i>
                                    </a>       
                                </td>
                            </tr>
                          <?php }  ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Clave</th>
                  <th>Fecha</th>
                  <th>Hora</th>
                  <th>Subtotal</th>
                  <th>Total</th>
                  <th>Nombre Cliente</th>
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

