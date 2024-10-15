

  <?php 
 echo view("estructuraDashboard/cabecera");
?>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css"/>

<style>

.pagination{display:flex;padding-left:0;list-style:none}

.page-link{position:relative;display:block;color:#0d6efd;text-decoration:none;background-color:#fff;border:1px solid #dee2e6;transition:color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out}@media (prefers-reduced-motion:reduce){

.page-link{transition:none}}

.page-link:hover{z-index:2;color:#0a58ca;background-color:#e9ecef;border-color:#dee2e6}

.page-link:focus{z-index:3;color:#0a58ca;background-color:#e9ecef;outline:0;box-shadow:0 0 0 .25rem rgba(13,110,253,.25)}

.page-item:not(:first-child) .page-link{margin-left:-1px}

.page-item.active .page-link{z-index:3;color:#fff;background-color:#0d6efd;border-color:#0d6efd}

.page-item.disabled .page-link{color:#6c757d;pointer-events:none;background-color:#fff;border-color:#dee2e6}

.page-link{padding:.375rem .75rem}

.page-item:first-child .page-link{border-top-left-radius:.25rem;border-bottom-left-radius:.25rem}

.page-item:last-child .page-link{border-top-right-radius:.25rem;border-bottom-right-radius:.25rem}


</style>
  <?php 
 echo view("estructuraDashboard/barraLateralDashboard");
?>
  <?php 
 echo view("estructuraDashboard/navbar");
?>

      <section class="container padding-top-3x padding-bottom-3x">
        <h2>Lista de Usuarios</h2>
        <a class="btn btn-outline-warning">Nuevo</a>
      	
      	<table class="table-responsive table table-hover console-log" id="peass">
                <thead class="thead-inverse">

                  <tr>
                    <th width="250">Nombres</th>
                    <th width="200">correo</th>
                    <th>celular</th>
                    <th>Tipo de Usuario</th>
                    <th>fecha de Actualización</th>
                    <th class="text-center">Editar</th>
                    <th class="text-center">Eliminar</th>
                  </tr>
                </thead>
                <tbody>
                  <?php  if (isset($lista)): ?>
                    <?php foreach ($lista as $row){ ?>
                  <tr>
                    <th class="align-middle"><?php echo $row->nombres." ".$row->apellidos; ?></th>
                    <td class="align-middle"><?php echo $row->correo; ?></td>
                    <td class="align-middle"><?php echo $row->celular; ?></td>
                    <td class="align-middle"><?php echo $row->tipo; ?></td>
                    <td class="align-middle"><?php echo $row->fecha_actualizacion; ?></td>
                    <td class="align-middle text-center"><a class="btn btn-outline-primary">
                      <i class="fas fa-edit"></i>
                    </a></td>
                    <td class="align-middle text-center"><a class="btn btn-outline-danger">
                      <i class="fas fa-trash-alt"></i>
                    </a></td>
                  </tr>
                  <?php } ?>
                  <?php endif; ?>
                </tbody>
              </table>

      </section>


      
  <?php 
 echo view("estructuraDashboard/footer");
?>

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>

<script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>

       <script type="text/javascript">

       $(document).ready(function() {

     $('#peass').DataTable({

     //para cambiar el lenguaje a español

         "language": {

                 "lengthMenu": "Mostrar _MENU_ registros",

                 "zeroRecords": "No se encontraron resultados",

                 "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",

                 "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",

                 "infoFiltered": "(filtrado de un total de _MAX_ registros)",

                 "sSearch": "Buscar:",

                 "oPaginate": {

                     "sFirst": "Primero",

                     "sLast":"Último",

                     "sNext":">>",

                     "sPrevious": "<<"

            },

            "sProcessing":"Procesando...",

             }

     });

 });

       </script>

  </body>
</html>
