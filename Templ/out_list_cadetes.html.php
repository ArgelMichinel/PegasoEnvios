<h2>Lista de cadetes</h2>
<div class="table_container" style="padding-bottom: 70px;" id="cadetes-list">
    <table id="example" class="display nowrap" style="width:100%">
        <thead>
            
            <tr>
                <th>Editar</th>
                <?php
                foreach ($cadetes[0] as $key => $value) {
                    if ($key != 'id') {echo ('    <th>'. $key.'</th>'. PHP_EOL);}
                }
                ?>
                
            </tr>
            
        </thead>
        <tbody  id="data_table">
            
            <?php
            $rows = count($cadetes);
            for ($i=0 ; $i < $rows; $i++) {
                echo ('<tr>'. PHP_EOL);
                echo ('    <td style="text-align: center;"><i class="fa fa-pencil-square-o" aria-hidden="true" title="ver cliente"
					aria-label="ver cliente"></i></td>'. PHP_EOL);
                foreach ($cadetes[$i] as $key => $value) {
                    if ($key === 'status')  {
                            switch ($value) {
                              case 0:
                                $value = "Inactivo";
                                break;
                              case 1:
                                $value = "Activo";
                                break;
                                    }
                    }
                    if (($key === 'Lati1') && ($key === 'Lati2') && ($key === 'Lati3') && ($key === 'Longi1') && ($key === 'Longi2') && ($key === 'Longi3'))  {
                        $value = $value/10000000;
                    }
                    if ($key != 'id') {echo ('    <td>'. $value.'</td>'. PHP_EOL);}
                }
                echo ('</tr>'. PHP_EOL);
            }
            ?>
                
        </tbody>
        <tfoot>
            
            <tr>
                <th>Editar</th>
                <?php
                foreach ($cadetes[0] as $key => $value) {
                    if ($key != 'id') {echo ('    <th>'. $key.'</th>'. PHP_EOL);}
                }
                ?>
                
            </tr>
            
        </tfoot>
    </table>
</div>

<form action="regis_cadete.php" method="get" style="display: none;">

    <input type="text" name="num_cadete" id="field_cadete">

    <button type="submit" id="cadete_edit">Registrar</button>
</form>

