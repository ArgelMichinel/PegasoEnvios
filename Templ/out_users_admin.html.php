<h2>Lista de cadetes</h2>
<div class="table_container" style="padding-bottom: 70px;" id="admin_list">
    <table id="example" class="display nowrap" style="width:100%">
        <thead>
            
            <tr>
                <th>Nombre</th>
                <th>email</th>
                <th>Borrar</th>
            </tr>
            
        </thead>
        <tbody  id="data_table">
            
            <?php
            $rows = count($administra);
            for ($i=1 ; $i < $rows; $i++) {
                echo ('<tr>'. PHP_EOL);
                foreach ($administra[$i] as $key => $value) {
                    if (($key != 'id') && ($key != 'password') && ($key != 'created_at') && ($key != 'updated_at')) {echo ('    <td>'. $value.'</td>'. PHP_EOL);}
                }
                echo ('    <td style="text-align: center; color: black;"><i class="fa fa-trash" aria-hidden="true" title="Eliminar admin."
					aria-label="Eliminar admin."></i></td>'. PHP_EOL);
                echo ('</tr>'. PHP_EOL);
            }
            ?>
                
        </tbody>
        <tfoot>
            
            <tr>
                <th>Nombre</th>
                <th>email</th>
                <th>Borrar</th>
            </tr>
            
        </tfoot>
    </table>
</div>

<div id="id01" class="modal">
  <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
  <div class="modal-content">
    <div class="container">
      <h1>Eliminar administrador</h1>
      <p style="font-size: 25px; color: black;">Esta acción no puede ser deshecha. ¿Está seguro de que desea borrar el administrador?</p>

      <div class="clearfix">
        <button type="button" class="btn cancelbtn" onclick="document.getElementById('id01').style.display='none'" style="background-color: #484242;">Cancelar</button>
        <form action="" method="post">  
            <input type="text" name="del_admin" id="del_admin" style="display: none; background-color: red;">
            <button type="submit" class="btn deletebtn">Eliminar</button>
        </form>
      </div>
    </div>
    </div>
</div>

<button class="btn" onclick="agregar()">Agregar Administrador</button>