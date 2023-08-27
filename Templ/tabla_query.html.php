    <div>
        <table id="example" class="display nowrap" style="width:100%">
            <thead>
                <tr>
                    <th>Select</th>
                    <th># envio</th>
                    <th>fec. ingreso</th>
                    <th>status</th>
                    <th style="display: none;"># cliente</th>
                    <th>nom. cliente</th>
                    <th># venta</th>
                    <th>calle</th>
                    <th>comentario</th>
                    <th>Cod. postal</th>
                    <th>ciudad</th>
                    <th>prov.</th>
                    <th>país</th>
                    <th>nom. recep.</th>
                    <th>descripción</th>
                    <th>fec. 1ra visit</th>
                    <th>fec. entreg.</th>
                    <th>fec. no entr.</th>
                    <th>cadete</th>
                    <th>Status logis.</th>
                    <th>coment. logist.</th>
                </tr>
            </thead>
            <tbody  id="data_table">

                <?php
                $rows = count($packets);
                for ($i=0 ; $i < $rows; $i++) {
                    echo ('<tr>'. PHP_EOL);
                    echo ('    <td><input type="checkbox" class="Checkbox"></td>'. PHP_EOL);
                    foreach ($packets[$i] as $key => $value) {
                        include __DIR__ . './../Templ/modifica_tabla.php';
                        if (($key != 'id_num') && ($key != 'document') && ($key != 'status') && ($key != 'sender_id') && ($key != 'street_name') && ($key != 'street_number') && ($key != 'receiver_phone') && ($key != 'cadete') && ($key != 'created_at') && ($key != 'updated_at') && ($key != 'Latit') && ($key != 'Longit')) {echo ('    <td class="' . $key . '">'. $value.'</td>'. PHP_EOL);}
                        if ($key == 'status') {

                            switch ($value) {
                                case 'En curso':
                                    echo ('    <td style="background-color: green; color: white; text-align: center;">'. $value.'</td>'. PHP_EOL);
                                break;
                                case '1era visita':
                                    echo ('    <td  style="background-color: yellow; color: white; text-align: center;">'. $value.'</td>'. PHP_EOL);
                                break;
                                case 'Completado':
                                    echo ('    <td style="background-color: blue; color: white; text-align: center;">'. $value.'</td>'. PHP_EOL);
                                break;
                                case 'No completado':
                                    echo ('    <td style="background-color: red; color: white; text-align: center;">'. $value.'</td>'. PHP_EOL);
                                break;
                                case 'Cancelado':
                                    echo ('    <td style="background-color: red; color: white; text-align: center;">'. $value.'</td>'. PHP_EOL);
                                break;
                                default:
                                echo ('    <td style="background-color: white; color: black; text-align: center;">'. $value.'</td>'. PHP_EOL);
                                    }
                        }

                        if ($key === 'sender_id')  {
                            echo ('    <td style="display: none;">'. $value.'</td>'. PHP_EOL);
                            foreach ($clients as $cl => $variab) {
                              if ($variab['user_id'] === $value) {
                                $value = $variab['Nombre'];
                                break;
                              }
                            }
                            echo ('    <td>'. $value.'</td>'. PHP_EOL);
                        }

                        if ($key == 'street_name') {
                            echo ('    <td>'. $value.' '.$packets[$i]['street_number'].'</td>'. PHP_EOL);
                        }

                        if ($key === 'cadete')  {
                            foreach ($cadetes as $ct => $variab) {
                              if ($variab['num_cadete'] == $value) {
                                $value = $variab['nombre'] .' ' . $variab['apellido'];
                                break;
                              }
                            }
                            echo ('    <td>'. $value.'</td>'. PHP_EOL);
                        }
                    }
                    echo ('</tr>'. PHP_EOL);
                }
                ?>

            </tbody>
            <tfoot>
                <tr>
                    <th>Select</th>
                    <th class="id_ship"># envio</th>
                    <th class="date_in">fec. ingreso</th>
                    <th class="status">status</th>
                    <th style="display: none;"># cliente</th>
                    <th class="sender_id">nom. cliente</th>
                    <th class="order:id"># venta</th>
                    <th class="street_name">calle</th>
                    <th class="comment">comentario</th>
                    <th class="zip_code">Cod. postal</th>
                    <th class="city">ciudad</th>
                    <th class="state">prov.</th>
                    <th class="country">país</th>
                    <th class="receiver_name">nom. recep.</th>
                    <th class="description">descripción</th>
                    <th class="date_first_visit">fec. 1ra visit</th>
                    <th class="date_delivered">fec. entreg.</th>
                    <th class="date_not_delivered">fec. no entr.</th>
                    <th class="cadete">cadete</th>
                    <th class="status_logistica">Status logis.</th>
                    <th class="comment_logis">coment. logist.</th>
                </tr>
            </tfoot>
        </table>
    </div>