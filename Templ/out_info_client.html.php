<h2>Lista de clientes</h2>
<div class="table_container" style="padding-bottom: 70px;" id="client-list">
    <table id="example" class="display nowrap" style="width:100%">
        <thead>
            
            <tr>
                <th>Select</th>
                <th># cliente</th>
                <th>nombre MELI</th>
                <th>nombre</th>
                <th>email</th>
                <th>Borrar</th>
            </tr>
            
        </thead>
        <tbody  id="data_table">
            
            <?php
            $rows = count($clients);
            for ($i=0 ; $i < $rows; $i++) {
                echo ('<tr>'. PHP_EOL);
                echo ('    <td style="text-align: center;"><i class="fa fa-user-circle-o" aria-hidden="true" title="ver cliente"
					aria-label="ver cliente"></i></td>'. PHP_EOL);
                echo ('    <td>'. $clients[$i]['user_id'].'</td>'. PHP_EOL);
                echo ('    <td>'. $name[$i].'</td>'. PHP_EOL);
                echo ('    <td>'. $clients[$i]['Nombre'].'</td>'. PHP_EOL);
                echo ('    <td>'. $clients[$i]['email'].'</td>'. PHP_EOL);
                echo ('    <td style="text-align: center; color: black;"><i class="fa fa-trash" aria-hidden="true" title="Eliminar admin."
					aria-label="Eliminar admin."></i></td>'. PHP_EOL);
                echo ('</tr>'. PHP_EOL);
            }
            ?>
                
        </tbody>
        <tfoot>
            
            <tr>
            <th>Select</th>
                <th># cliente</th>
                <th>nombre MELI</th>
                <th>normbre</th>
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
      <h1>Eliminar cliente</h1>
      <p style="font-size: 25px; color: black;">Esta acción no puede ser deshecha. ¿Está seguro de que desea borrar el cliente?</p>

      <div class="clearfix">
        <button type="button" class="btn cancelbtn" onclick="document.getElementById('id01').style.display='none'" style="background-color: #484242;">Cancelar</button>
        <form action="" method="post">  
            <input type="text" name="del_client" id="del_client" style="display: none; background-color: red;">
            <button type="submit" class="btn deletebtn">Eliminar</button>
        </form>
      </div>
    </div>
    </div>
</div>

<div class="data_container" style="display: none;" id="data_container">

    <h2>Datos cliente</h2>
    
    <div style="align-self: center;"><p id="client-selected"></p></div>
    
    <div style="align-self: center;" id="data-client"></div>
    
</div>

