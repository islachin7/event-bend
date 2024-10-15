

  <?php 
 echo view("estructuraDashboard/cabecera");
?>
  <?php 
 echo view("estructuraDashboard/barraLateralDashboard");
?>
  <?php 
 echo view("estructuraDashboard/navbar");
?>

      <section class="container padding-top-3x padding-bottom-3x">

        <a class="btn btn-outline-warning">Nuevo</a>
      	
      	<div class="table-responsive">
              <table class="table">
                <thead class="thead-inverse">

                  <tr>
                    <th>Nombres</th>
                    <th>correo</th>
                    <th>celular</th>
                    <th>fecha de Creación</th>
                    <th colspan="2" class="text-center">Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  <?php  if (isset($lista)): ?>
                    <?php foreach ($lista as $row){ ?>
                  <tr>
                    <th class="align-middle"><?php echo $row->nombres." ".$row->apellidos; ?></th>
                    <td class="align-middle"><?php echo $row->correo; ?></td>
                    <td class="align-middle"><?php echo $row->celular; ?></td>
                    <td class="align-middle"><?php echo $row->fecha_creacion; ?></td>
                    <td class="align-middle text-right"><a class="btn btn-outline-primary">
                      <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
</svg>
                    </a></td>
                    <td class="align-middle text-left"><a class="btn btn-outline-danger"><i class="icon-trash"></i></a></td>
                  </tr>
                  <?php } ?>
                  <?php endif; ?>
                </tbody>
              </table>
            </div>
      </section>
  <?php 
 echo view("estructuraDashboard/footer");
?>
