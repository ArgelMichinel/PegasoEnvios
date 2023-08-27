
<div class="container" >
    <div class="row">

        <div class="status_image col-sm-12 col-md-12">
            <img
            <?php
            if ($pack_status == 0) {
                echo (' src="images/Status_tracking3.png"');
            } elseif ($pack_status == 1) {
                echo (' src="images/Status_tracking1.png"');
            } elseif ($pack_status == 2) {
                echo (' src="images/Status_tracking2.png"');
            } elseif ($pack_status == 3) {
                echo (' src="images/Status_tracking2.png"');
            } elseif ($pack_status == 4) {
                echo (' src="images/Status_tracking1.png"');
            }
            ?>
             id='img_status'>
        </div>
    </div>
    
    <div class="row" id="row_screen">
        <div class="table_container col-sm-12 col-md-6" style="padding-bottom: 40px;">
                <h2>Información de destino</h2>

            <table id="example" class="display nowrap" style="width:70%">
                <thead>
                    
                    <tr>
                        <th>Parámetro</th>
                        <th>Respuesta</th>
                    </tr>
                    
                </thead>
                <tbody  id="data_table">
                    
                    <?php
                    //echo ('El estatus es:' . $pack_status);
                    //print_r($pack_locat);
                    //print_r($packets);
                    foreach ($packets as $key => $value) {
                        
                        if (($key != 'sender_id') && ($key != 'street_name') && ($key != 'street_number') && ($key != 'latit') && ($key != 'longit')) {
                            echo ('<tr>'. PHP_EOL);
                            echo ('    <th>'. $key.'</th>'. PHP_EOL);
                            if ($value instanceof DateTime) {
                                echo( '<td>' . $value->format('Y-m-d H:i:s') . '</td>');
                            } else {
                                echo ('    <td>'. $value.'</td>'. PHP_EOL);
                            }
                            echo ('</tr>'. PHP_EOL);
                        }

                        if ($key == 'sender_id')  {
                            echo ('<tr>'. PHP_EOL);
                            echo ('    <th>'. $key.'</th>'. PHP_EOL);
                            foreach ($clients as $cl => $variab) {
                              if ($variab['user_id'] == $value) {
                                $value = $variab['Nombre'];
                                break;
                              }
                            }
                            echo ('    <td>'. $value.'</td>'. PHP_EOL);
                            echo ('</tr>'. PHP_EOL);
                        }

                        if ($key == 'street_name') {
                            echo ('<tr>'. PHP_EOL);
                            echo ('    <th>'. $key.'</th>'. PHP_EOL);
                            echo ('    <td>'. $value.' '.$packets['street_number'].'</td>'. PHP_EOL);
                            echo ('</tr>'. PHP_EOL);
                        }
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

        <?php
        include __DIR__ . '/../Templ/mapa_tracking.html.php'
        ?>

    </div>
</div>
