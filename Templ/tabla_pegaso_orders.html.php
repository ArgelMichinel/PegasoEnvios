    <div>
        <table id="example" class="display nowrap" style="width:100%">
            <thead>
                <tr>
                    <th>Selec</th>
                    <th>Etiqu</th>
                    <th># envio</th>
                    <th>fec. ingreso</th>
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
                    <th>doc. recep.</th>
                    <th>telf. recep.</th>
                    <th>descripción</th>
                </tr>
            </thead>
            <tbody  id="data_table">

                <?php
                $rows = count($pegaso_entrust);
                //print_r($pegaso_entrust);
                $indi = ['id_ship', 'date_in', 'sender_id', 'order_id', 'street_name', 'comment', 'zip_code', 'city', 'state', 'country', 'receiver_name', 'document', 'receiver_phone', 'description'];  //Matriz de índices para poder ordenar la impresión en el órden que quiero
                for ($i=0 ; $i < $rows; $i++) {
                    echo ('<tr>'. PHP_EOL);
                    echo ('    <td style="text-align: center;"><input type="checkbox" class="Checkbox"></td>'. PHP_EOL);
                    echo ('    <td style="text-align: center;"><i class="fa fa-qrcode" aria-hidden="true" title="ver cliente"
                    aria-label="Etiqueta de envío"></i></td>'. PHP_EOL);
                    for ($j=0; $j < count($indi); $j++) { 
                        $key = $indi[$j];

                        if ($key === 'country')  {
                            switch ($pegaso_entrust[$i][$key]) {
                              case 1:
                                $pegaso_entrust[$i][$key] = "Argentina";
                                break;
                              case 2:
                                $pegaso_entrust[$i][$key] = "Brasil";
                                break;
                              case 3:
                                $pegaso_entrust[$i][$key] = "Chile";
                                break;
                              case 4:
                                $pegaso_entrust[$i][$key] = "Perú";
                                break;
                              case 5:
                                $pegaso_entrust[$i][$key] = "Venezuela";
                                break;
                              default:
                              $pegaso_entrust[$i][$key] = "Argentina";
                                    }
                        }

                        if (($key != 'sender_id') && ($key != 'street_name')) {echo ('    <td class="' . $key . '">'. $pegaso_entrust[$i][$key].'</td>'. PHP_EOL);}

                        if ($key === 'sender_id')  {
                            echo ('    <td style="display: none;">'. $pegaso_entrust[$i][$key].'</td>'. PHP_EOL);
                            foreach ($clients as $cl => $variab) {
                              if ($variab['user_id'] === $pegaso_entrust[$i][$key]) {
                                $pegaso_entrust[$i][$key] = $variab['Nombre'];
                                break;
                              }
                            }
                            echo ('    <td>'. $pegaso_entrust[$i][$key].'</td>'. PHP_EOL);
                        }

                        if ($key == 'street_name') {
                            echo ('    <td>'. $pegaso_entrust[$i][$key].' '.$pegaso_entrust[$i]['street_number'].'</td>'. PHP_EOL);
                        }
                    }
                    echo ('</tr>'. PHP_EOL);
                }
                ?>

            </tbody>
            <tfoot>
                <tr>
                    <th>Selec</th>
                    <th>Etiqu</th>
                    <th class="id_ship"># envio</th>
                    <th class="date_in">fec. ingreso</th>
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
                    <th>doc. recep.</th>
                    <th>telf. recep.</th>
                    <th class="description">descripción</th>
                </tr>
            </tfoot>
        </table>
    </div>
<?php
 $packets = $pegaso_entrust;
?>