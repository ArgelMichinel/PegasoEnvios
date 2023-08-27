<div class="container screen_mode"> 
        <button id="button_mode" onclick="screen_mode()">Modo<br>pant.</button>
    <div class="row" id="row_screen">
        
        <!********************************************************>
        
        <div class="table_container col-sm-12 col-md-12" id="screem-packets" style="padding-bottom: 40px;">
            <h2>Consulta de envíos</h2>
            <div class="filter_container" id="contenedor_filtro" style="margin-bottom: 20px;">
                <?php
                include __DIR__ . '/../Templ/filtros_client.html.php';
                ?>
            </div>

            <div class="row_selector" style="margin-bottom: 20px;">
                <h2>Selector de columnas</h2>
                <div class="row">

                    <div class="col_selector col-xs-6 col-sm-3 col-md-3 col-lg-2 switch_column">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input switch" id="date_in" checked onclick="$('#date_in1').click()">
                            <input type="checkbox" class="switch-1" id="date_in1" checked data-column="1" style="display: none;">
                            <label class="custom-control-label" for="date_in">fec. ingreso</label>
                        </div>
                    </div>
                    <div class="col_selector col-xs-6 col-sm-3 col-md-3 col-lg-2 switch_column">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input switch" id="status" checked onclick="$('#status1').click()">
                            <input type="checkbox" class="switch-1" id="status1" checked data-column="2" style="display: none;">
                            <label class="custom-control-label" for="status">status</label>
                        </div>
                    </div>
                    <div class="col_selector col-xs-6 col-sm-3 col-md-3 col-lg-2 switch_column">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input switch" id="num_venta" checked onclick="$('#num_venta1').click()">
                            <input type="checkbox" class="switch-1" id="num_venta1" checked data-column="3" style="display: none;">
                            <label class="custom-control-label" for="num_venta"># venta</label>
                        </div>
                    </div>
                    <div class="col_selector col-xs-6 col-sm-3 col-md-3 col-lg-2 switch_column">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input switch" id="calle" checked onclick="$('#calle1').click()">
                            <input type="checkbox" class="switch-1" id="calle1" checked data-column="4" style="display: none;">
                            <label class="custom-control-label" for="calle">calle</label>
                        </div>
                    </div>
                    <div class="col_selector col-xs-6 col-sm-3 col-md-3 col-lg-2 switch_column">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input switch" id="comentario" checked onclick="$('#comentario1').click()">
                            <input type="checkbox" class="switch-1" id="comentario1" checked data-column="5" style="display: none;">
                            <label class="custom-control-label" for="comentario">comentario</label>
                        </div>
                    </div>
                    <div class="col_selector col-xs-6 col-sm-3 col-md-3 col-lg-2 switch_column">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input switch" id="cod_postal" checked onclick="$('#cod_postal1').click()">
                            <input type="checkbox" class="switch-1" id="cod_postal1" checked data-column="6" style="display: none;">
                            <label class="custom-control-label" for="cod_postal">Cod. postal</label>
                        </div>
                    </div>
                    <div class="col_selector col-xs-6 col-sm-3 col-md-3 col-lg-2 switch_column">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input switch" id="ciudad" checked onclick="$('#ciudad1').click()">
                            <input type="checkbox" class="switch-1" id="ciudad1" checked data-column="7" style="display: none;">
                            <label class="custom-control-label" for="ciudad">ciudad</label>
                        </div>
                    </div>
                    <div class="col_selector col-xs-6 col-sm-3 col-md-3 col-lg-2 switch_column">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input switch" id="prov" checked onclick="$('#prov1').click()">
                            <input type="checkbox" class="switch-1" id="prov1" checked data-column="8" style="display: none;">
                            <label class="custom-control-label" for="prov">prov.</label>
                        </div>
                    </div>
                    <div class="col_selector col-xs-6 col-sm-3 col-md-3 col-lg-2 switch_column">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input switch" id="pais" checked onclick="$('#pais1').click()">
                            <input type="checkbox" class="switch-1" id="pais1" checked data-column="9" style="display: none;">
                            <label class="custom-control-label" for="pais">país</label>
                        </div>
                    </div>
                    <div class="col_selector col-xs-6 col-sm-3 col-md-3 col-lg-2 switch_column">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input switch" id="nom_rece" checked onclick="$('#nom_rece1').click()">
                            <input type="checkbox" class="switch-1" id="nom_rece1" checked data-column="10" style="display: none;">
                            <label class="custom-control-label" for="nom_rece">nom. recep.</label>
                        </div>
                    </div>
                    <div class="col_selector col-xs-6 col-sm-3 col-md-3 col-lg-2 switch_column">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input switch" id="descrip" checked onclick="$('#descrip1').click()">
                            <input type="checkbox" class="switch-1" id="descrip1" checked data-column="11" style="display: none;">
                            <label class="custom-control-label" for="descrip">descripción</label>
                        </div>
                    </div>
                    <div class="col_selector col-xs-6 col-sm-3 col-md-3 col-lg-2 switch_column">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input switch" id="pri_visi" checked onclick="$('#pri_visi1').click()">
                            <input type="checkbox" class="switch-1" id="pri_visi1" checked data-column="12" style="display: none;">
                            <label class="custom-control-label" for="pri_visi">fec. 1era visit</label>
                        </div>
                    </div>
                    <div class="col_selector col-xs-6 col-sm-3 col-md-3 col-lg-2 switch_column">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input switch" id="fec_ent" checked onclick="$('#fec_ent1').click()">
                            <input type="checkbox" class="switch-1" id="fec_ent1" checked data-column="13" style="display: none;">
                            <label class="custom-control-label" for="fec_ent">fec. entreg.</label>
                        </div>
                    </div>
                    <div class="col_selector col-xs-6 col-sm-3 col-md-3 col-lg-2 switch_column">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input switch" id="f_no_entre" checked onclick="$('#f_no_entre1').click()">
                            <input type="checkbox" class="switch-1" id="f_no_entre1" checked data-column="14" style="display: none;">
                            <label class="custom-control-label" for="f_no_entre">fec. no entr.</label>
                        </div>
                    </div>

                </div>
            </div>

            <div>
                <table id="example" class="display nowrap" style="width:100%">
                    
                    <thead>
                        <tr>
                            <th>Tracking</th>
                            <th># envio</th>
                            <th>fec. ingreso</th>
                            <th>status</th>
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
                        </tr>
                    </thead>
                    
                    <tbody  id="data_table">

                        <?php
                        $rows = count($packets);
                        for ($i=0 ; $i < $rows; $i++) {
                            echo ('<tr>'. PHP_EOL);
                            echo ('    <td style="text-align: center;">' . '<a onclick="window.open(\'https://pegasoenvios.com/tracking.php?track_id='. $packets[$i]['id_ship'] . '\')"><i class="fa fa-map" aria-hidden="true" title="Tracking"
                            aria-label="tracking"></i></a>' . '</td>');
                            foreach ($packets[$i] as $key => $value) {
                                include __DIR__ . './../Templ/modifica_tabla.php';
                                if (($key != 'id_num') && ($key != 'status') && ($key != 'Latit') && ($key != 'Longit')) {echo ('    <td>'. $value.'</td>'. PHP_EOL);}
                                if ($key == 'status') {
        
                                    switch ($value) {
                                        case 'En curso':
                                            echo ('    <td style="background-color: green; color: white; text-align: center;">'. $value.'</td>'. PHP_EOL);
                                        break;
                                        case '1era visita':
                                            echo ('    <td  style="background-color: yellow; color: black; text-align: center;">'. $value.'</td>'. PHP_EOL);
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
                            }
                            echo ('</tr>'. PHP_EOL);
                        }
                        ?>

                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Tracking</th>
                            <th># envio</th>
                            <th>fec. ingreso</th>
                            <th>status</th>
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
                        </tr>
                    </tfoot>
                    
                </table>
            </div>
        </div>

        <?php
        include __DIR__ . '/../Templ/mapa.html.php'
        ?>
    
    </div>
        
</div>

<div id="id01" class="modal">
  <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
  <div class="modal-content">
    <div class="container">
      <h1>Mensaje</h1>

        <p>Para visualizar los envíos asignados a la compañía primero debe seleccionar un periodo o una localidad que desee consultar.</p>

      <div class="clearfix">
        <button type="button" class="btn3 cancelbtn" onclick="document.getElementById('id01').style.display='none'" style="background-color: #484242;">Aceptar</button>
      </div>
    </div>
    </div>
</div>
