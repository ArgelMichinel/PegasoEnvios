<div class="container screen_mode"> 
            <button id="button_mode" onclick="screen_mode()">Modo<br>pant.</button>
    <div class="row" id="row_screen">
        <div class="table_container col-sm-12 col-md-12" style="padding-bottom: 40px;">
            <h2>Consulta de Paquetes</h2>
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
                            <input type="checkbox" class="switch-1" id="date_in1" checked data-column="2" style="display: none;">
                            <label class="custom-control-label" for="date_in">fec. ingreso</label>
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
                            <input type="checkbox" class="custom-control-input switch" id="doc_rece" checked onclick="$('#doc_rece1').click()">
                            <input type="checkbox" class="switch-1" id="doc_rece1" checked data-column="11" style="display: none;">
                            <label class="custom-control-label" for="doc_rece">doc. recep.</label>
                        </div>
                    </div>
                    <div class="col_selector col-xs-6 col-sm-3 col-md-3 col-lg-2 switch_column">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input switch" id="telf_recep" checked onclick="$('#telf_recep1').click()">
                            <input type="checkbox" class="switch-1" id="telf_recep1" checked data-column="12" style="display: none;">
                            <label class="custom-control-label" for="telf_recep">telf. recep.</label>
                        </div>
                    </div>
                    <div class="col_selector col-xs-6 col-sm-3 col-md-3 col-lg-2 switch_column">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input switch" id="descrip" checked onclick="$('#descrip1').click()">
                            <input type="checkbox" class="switch-1" id="descrip1" checked data-column="13" style="display: none;">
                            <label class="custom-control-label" for="descrip">descripción</label>
                        </div>
                    </div>

                </div>
            </div>
            
            <?php
                include __DIR__ . '/../Templ/tabla_pegaso_orders_client.html.php';
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
