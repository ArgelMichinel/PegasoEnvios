<h2>Consulta de Paquete</h2>
<div class="table_container" id="screem-respuesta">
    <table id="example" class="display nowrap" style="width:70%">
        <thead>
            
            <tr>
                <th>Parámetro</th>
                <th>Respuesta</th>
            </tr>
            
        </thead>
        <tbody  id="data_table">
            
            <?php
            $rows = count($packets);
            
            foreach ($packets as $key => $value) {
                echo ('<tr>'. PHP_EOL);
                echo ('    <th>'. $key.'</th>'. PHP_EOL);
                if ($value instanceof DateTime) {
                    echo( '<td>' . $value->format('Y-m-d H:i:s') . '</td>');
                } else {
                    echo ('    <td>'. $value.'</td>'. PHP_EOL);
                }
                echo ('</tr>'. PHP_EOL);
            }
            
            ?>
                
        </tbody>
        <tfoot>
            
            <tr>
                <th>Parámetro</th>
                <th>Respuesta</th>
            </tr>
            
        </tfoot>
    </table>
</div>
