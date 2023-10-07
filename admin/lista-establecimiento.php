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
            Listado de Tiendas
            <small></small>
          </h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Maneja la información de las tiendas virtuales</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="registros" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Clave</th>
                  <th>Nombre de la Tienda</th>
                  <th>Direccion</th>
                  <th>Telefono</th>
                  <th>Código Postal</th>
                  <th>Estado</th>
                  <th>Municipio</th>
                  <th>Operaciones</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    try {
                        $sql ="SELECT establecimiento.id_establecimiento, establecimiento.nombre, establecimiento.direccion, establecimiento.telefono, establecimiento.cp, estado.nombre_edo, municipio.nombre_mun
                        FROM establecimiento
                        INNER JOIN estado ON establecimiento.id_edo=estado.id_edo
                        INNER JOIN municipio ON establecimiento.id_mun=municipio.id_mun";
                        $resultado = $conn->query($sql);
                    } catch (Exception $e) {
                        $error = $e->getMessage();
                        echo $error;
                    }
                    while($establecimiento = $resultado->fetch_assoc() ) { ?>
                        <tr>
                            <td><?php echo $establecimiento['id_establecimiento']; ?></td>
                            <td><?php echo $establecimiento['nombre']; ?></td>
                            <td><?php echo $establecimiento['direccion']; ?></td>
                            <td><?php echo $establecimiento['telefono']; ?></td>
                            <td><?php echo $establecimiento['cp']; ?></td>
                            <td><?php echo $establecimiento['nombre_edo']; ?></td>
                            <td><?php echo $establecimiento['nombre_mun']; ?></td>
                            
                            <td>
                                <a href="editar-establecimiento.php?id=<?php echo $establecimiento['id_establecimiento'] ?>" class="btn bg-orange btn-flat margin">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <a href="#" data-id="<?php echo $establecimiento['id_establecimiento']; ?>" data-tipo="establecimiento" class="btn bg-maroon bnt-flat margin borrar_registro">
                                <i class="fa fa-trash"></i>
                            </a>       
                        </td>
                    </tr>
                    <?php }  ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Clave</th>
                  <th>Nombre de la Tienda</th>
                  <th>Direccion</th>
                  <th>Telefono</th>
                  <th>Código Postal</th>
                  <th>Estado</th>
                  <th>Municipio</th>
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

