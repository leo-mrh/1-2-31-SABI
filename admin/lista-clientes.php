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
            Listado de Clientes
            <small></small>
          </h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Maneja la información de clientes en esta sección</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="registros" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Clave</th>
                  <th>Nombre</th>
                  <th>Apellido</th>
                  <th>Teléfono</th>
                  <th>Correo</th>
                  <th>Dirección</th>
                  <th>Código Postal</th>
                  <th>Estado</th>
                  <th>Municipio</th>
                  <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                        <?php
                            try {
                                $sql ="SELECT clientes.id_clientes, clientes.nombre, clientes.apellido, clientes.telefono, clientes.email, clientes.direccion, clientes.cp, estado.nombre_edo, 
                                municipio.nombre_mun
                                FROM clientes
                                INNER JOIN estado ON clientes.id_edo=estado.id_edo
                                INNER JOIN municipio ON clientes.id_mun=municipio.id_mun";
                                $resultado = $conn->query($sql);
                            } catch (Exception $e) {
                                $error = $e->getMessage();
                                echo $error;
                            }
                            while($clientes = $resultado->fetch_assoc() ) { ?>
                                <tr>
                                    <td><?php echo $clientes['id_clientes']; ?></td>
                                    <td><?php echo $clientes['nombre']; ?></td>
                                    <td><?php echo $clientes['apellido']; ?></td>
                                    <td><?php echo $clientes['telefono']; ?></td>
                                    <td><?php echo $clientes['email']; ?></td>
                                    <td><?php echo $clientes['direccion']; ?></td>
                                    <td><?php echo $clientes['cp']; ?></td>
                                    <td><?php echo $clientes['nombre_edo']; ?></td>
                                    <td><?php echo $clientes['nombre_mun']; ?></td>
                                    <td>
                                        <a href="editar-cliente.php?id=<?php echo $clientes['id_clientes'] ?>" class="btn bg-orange btn-flat margin">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <a href="#" data-id="<?php echo $clientes['id_clientes'] ?>" data-tipo="cliente" class="btn bg-maroon bnt-flat margin borrar_registro">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </a>       
                                </td>
                            </tr>
                          <?php }  ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Clave</th>
                  <th>Nombre</th>
                  <th>Apellido</th>
                  <th>Teléfono</th>
                  <th>Correo</th>
                  <th>Dirección</th>
                  <th>Código Postal</th>
                  <th>Estado</th>
                  <th>Municipio</th>
                  <th>Acciones</th>
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

