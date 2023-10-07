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
            Listado de Usuarios
            <small></small>
          </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Maneja la información de los usuarios en esta sección</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="registros" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Clave</th>
                  <th>Nombre</th>
                  <th>Apellido</th>
                  <th>Tipo de Usuario</th>
                  <th>Nombre de Usuario</th>
                  <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                        <?php
                            try {
                                $sql ="SELECT usuario.id_usuario, usuario.usuario, usuario.nombre ,usuario.apellido ,tipo_usuario.tipo
                                FROM usuario
                                INNER JOIN tipo_usuario ON usuario.id_tipo_usuario=tipo_usuario.id_tipo_usuario";
                                $resultado = $conn->query($sql);
                            } catch (Exception $e) {
                                $error = $e->getMessage();
                                echo $error;
                            }
                            while($usuario = $resultado->fetch_assoc() ) { ?>
                                <tr>
                                    <td><?php echo $usuario['id_usuario']; ?></td>
                                    <td><?php echo $usuario['nombre']; ?></td>
                                    <td><?php echo $usuario['apellido']; ?></td>
                                    <td><?php echo $usuario['tipo']; ?></td>
                                    <td><?php echo $usuario['usuario']; ?></td>
                                    <td>
                                        <a href="editar-admin.php?id=<?php echo $usuario['id_usuario'] ?>" class="btn bg-orange btn-flat margin">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <a href="#" data-id="<?php echo $usuario['id_usuario']; ?>" data-tipo="barberia" class="btn bg-maroon bnt-flat margin borrar_registro">
                                        <i class="fa fa-trash"></i>
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
                    <th>Tipo de Usuario</th>
                    <th>Nombre de Usuario</th>
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