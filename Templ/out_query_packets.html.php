<div class="container screen_mode"> 
            <button id="button_mode" onclick="screen_mode()">Modo<br>pant.</button>
    <div class="row" id="row_screen">
        <div class="table_container col-sm-12 col-md-12" style="padding-bottom: 40px;">
            <h2>Consulta de Paquetes</h2>
            <div class="filter_container" id="contenedor_filtro" style="margin-bottom: 20px;">
                <?php
                include __DIR__ . '/../Templ/filtros.html.php';
                ?>
            </div>
            <div class="row_selector" style="margin-bottom: 20px;">
                <h2>Selector de columnas</h2>
                <div class="row">

                    <div class="col_selector col-xs-6 col-sm-3 col-md-3 col-lg-2">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input switch" id="date_in" checked onclick="$('#date_in1').click()">
                            <input type="checkbox" class="switch-1" id="date_in1" checked data-column="2" style="display: none;">
                            <label class="custom-control-label" for="date_in">fec. ingreso</label>
                        </div>
                    </div>
                    <div class="col_selector col-xs-6 col-sm-3 col-md-3 col-lg-2">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input switch" id="status" checked onclick="$('#status1').click()">
                            <input type="checkbox" class="switch-1" id="status1" checked data-column="3" style="display: none;">
                            <label class="custom-control-label" for="status">status</label>
                        </div>
                    </div>
                    <div class="col_selector col-xs-6 col-sm-3 col-md-3 col-lg-2">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input switch" id="nom-cliente" checked onclick="$('#nom-cliente1').click()">
                            <input type="checkbox" class="switch-1" id="nom-cliente1" checked data-column="5" style="display: none;">
                            <label class="custom-control-label" for="nom-cliente">nom. cliente</label>
                        </div>
                    </div>
                    <div class="col_selector col-xs-6 col-sm-3 col-md-3 col-lg-2">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input switch" id="num_venta" checked onclick="$('#num_venta1').click()">
                            <input type="checkbox" class="switch-1" id="num_venta1" checked data-column="6" style="display: none;">
                            <label class="custom-control-label" for="num_venta"># venta</label>
                        </div>
                    </div>
                    <div class="col_selector col-xs-6 col-sm-3 col-md-3 col-lg-2">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input switch" id="calle" checked onclick="$('#calle1').click()">
                            <input type="checkbox" class="switch-1" id="calle1" checked data-column="7" style="display: none;">
                            <label class="custom-control-label" for="calle">calle</label>
                        </div>
                    </div>
                    <div class="col_selector col-xs-6 col-sm-3 col-md-3 col-lg-2">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input switch" id="comentario" checked onclick="$('#comentario1').click()">
                            <input type="checkbox" class="switch-1" id="comentario1" checked data-column="8" style="display: none;">
                            <label class="custom-control-label" for="comentario">comentario</label>
                        </div>
                    </div>
                    <div class="col_selector col-xs-6 col-sm-3 col-md-3 col-lg-2">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input switch" id="cod_postal" checked onclick="$('#cod_postal1').click()">
                            <input type="checkbox" class="switch-1" id="cod_postal1" checked data-column="9" style="display: none;">
                            <label class="custom-control-label" for="cod_postal">Cod. postal</label>
                        </div>
                    </div>
                    <div class="col_selector col-xs-6 col-sm-3 col-md-3 col-lg-2">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input switch" id="ciudad" checked onclick="$('#ciudad1').click()">
                            <input type="checkbox" class="switch-1" id="ciudad1" checked data-column="10" style="display: none;">
                            <label class="custom-control-label" for="ciudad">ciudad</label>
                        </div>
                    </div>
                    <div class="col_selector col-xs-6 col-sm-3 col-md-3 col-lg-2">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input switch" id="prov" checked onclick="$('#prov1').click()">
                            <input type="checkbox" class="switch-1" id="prov1" checked data-column="11" style="display: none;">
                            <label class="custom-control-label" for="prov">prov.</label>
                        </div>
                    </div>
                    <div class="col_selector col-xs-6 col-sm-3 col-md-3 col-lg-2">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input switch" id="pais" checked onclick="$('#pais1').click()">
                            <input type="checkbox" class="switch-1" id="pais1" checked data-column="12" style="display: none;">
                            <label class="custom-control-label" for="pais">país</label>
                        </div>
                    </div>
                    <div class="col_selector col-xs-6 col-sm-3 col-md-3 col-lg-2">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input switch" id="nom_rece" checked onclick="$('#nom_rece1').click()">
                            <input type="checkbox" class="switch-1" id="nom_rece1" checked data-column="13" style="display: none;">
                            <label class="custom-control-label" for="nom_rece">nom. recep.</label>
                        </div>
                    </div>
                    <div class="col_selector col-xs-6 col-sm-3 col-md-3 col-lg-2">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input switch" id="descrip" checked onclick="$('#descrip1').click()">
                            <input type="checkbox" class="switch-1" id="descrip1" checked data-column="14" style="display: none;">
                            <label class="custom-control-label" for="descrip">descripción</label>
                        </div>
                    </div>
                    <div class="col_selector col-xs-6 col-sm-3 col-md-3 col-lg-2">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input switch" id="pri_visi" checked onclick="$('#pri_visi1').click()">
                            <input type="checkbox" class="switch-1" id="pri_visi1" checked data-column="15" style="display: none;">
                            <label class="custom-control-label" for="pri_visi">fec. 1era visit</label>
                        </div>
                    </div>
                    <div class="col_selector col-xs-6 col-sm-3 col-md-3 col-lg-2">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input switch" id="fec_ent" checked onclick="$('#fec_ent1').click()">
                            <input type="checkbox" class="switch-1" id="fec_ent1" checked data-column="16" style="display: none;">
                            <label class="custom-control-label" for="fec_ent">fec. entreg.</label>
                        </div>
                    </div>
                    <div class="col_selector col-xs-6 col-sm-3 col-md-3 col-lg-2">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input switch" id="f_no_entre" checked onclick="$('#f_no_entre1').click()">
                            <input type="checkbox" class="switch-1" id="f_no_entre1" checked data-column="17" style="display: none;">
                            <label class="custom-control-label" for="f_no_entre">fec. no entr.</label>
                        </div>
                    </div>
                    <div class="col_selector col-xs-6 col-sm-3 col-md-3 col-lg-2">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input switch" id="cadete" checked onclick="$('#cadete1').click()">
                            <input type="checkbox" class="switch-1" id="cadete1" checked data-column="18" style="display: none;">
                            <label class="custom-control-label" for="cadete">cadete</label>
                        </div>
                    </div>
                    <div class="col_selector col-xs-6 col-sm-3 col-md-3 col-lg-2">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input switch" id="sta_log" checked onclick="$('#sta_log1').click()">
                            <input type="checkbox" class="switch-1" id="sta_log1" checked data-column="19" style="display: none;">
                            <label class="custom-control-label" for="sta_log">status logis.</label>
                        </div>
                    </div>
                    <div class="col_selector col-xs-6 col-sm-3 col-md-3 col-lg-2">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input switch" id="com_log" checked onclick="$('#com_log1').click()">
                            <input type="checkbox" class="switch-1" id="com_log1" checked data-column="20" style="display: none;">
                            <label class="custom-control-label" for="com_log">coment. logist.</label>
                        </div>
                    </div>

                </div>
            </div>
            
            <?php
                include __DIR__ . '/../Templ/tabla_query.html.php';
            ?>
            
        </div>

        <?php
        include __DIR__ . '/../Templ/mapa.html.php'
        ?>

    </div>
</div>

<h2>Crear Lista</h2>

<div class="list_container">
    
    <div style="align-self: center;"><label for="selection_check">Seleccionar todos los registros:</label><input type="checkbox" class="Checkbox" onclick="select_all()" name="selection_check" id="selection_check" value="true"></div>
    
    <form action="" method="post">
        <label for="new_list[name]">Nombre de la lista:</label>
        <input type="text" id="name_list" name="new_list[name]" placeholder="Nombre de la lista" required>
        <input type="text" id="values_list" name="new_list[values]" style="display: none;">
        <button type="submit" id="submit_list" style="display: none;">Crear Lista</button>
    </form>
    <button class="btn" onclick="constr_list()">Crear Lista</button>
    
</div>
