<h2>Asignar envíos a cadete</h2>

<div class="presentacion"  id="presentacion">
    
    <div class="container-fluid" id="principal">
        <div><p>Selecciona la forma de asignación</p></div>
        
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

                <div class="shared" style="margin: auto">

                    <button class="btn" onclick="select_list()">Asignar por lista</button>

                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

                <div class="shared" style="margin: auto">

                    <button class="btn" onclick="select_scanner()">Asignar por scanner</button>

                </div>
            </div>

        </div>
    </div>
    
    <!********************************************************>
    
    <div class="container-fluid" id="screem-lista" style="display: none;">
        <div><p>Asignación por lista</p></div>
        
            <form action="" method="post">
            
                <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

                    <div class="shared" style="margin: auto">

                        <label for="select_list[list]">Selecciona la lista:</label>
                        <select name="select_list[list]">
                            <?php
                                for ($i=0; $i < count($listas); $i++) {
                                    echo ('<option value="'. $listas[$i]['id_list'] . '">' . $listas[$i]['name'] . '</option>' . PHP_EOL);
                                }
                            ?>
                        </select>

                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

                    <div class="shared" style="margin: auto">

                        <label for="select_list[cadete]">Selecciona un cadete:</label>
                        <select name="select_list[cadete]">
                            <?php
                                echo ('<option value="">(Sin Asignar)</option>' . PHP_EOL);
                                for ($i=0; $i < count($cadetes); $i++) {
                                    echo ('<option value="'. $cadetes[$i]['num_cadete'] . '">' . $cadetes[$i]['nombre'] . ' ' . $cadetes[$i]['apellido'] . '</option>' . PHP_EOL);
                                }
                            ?>
                        </select>

                    </div>
                </div>

            </div>
            
            <button class="btn" type="submit">Asignar envios</button>
                
        </form>
        
    </div>
  
</div>


<!********************************************************>

<div class="container-fluid" id="screem-scanner" style="display: none;">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

            <div class="shared" style="margin: auto">

                <!********************************************************>
                          <h2>Cameras</h2>

                <div class="preview-container">
                    <video id="preview" width="500" height="500"></video>
                </div>
                <!********************************************************>
                <audio id="audio_scan" src="./include_QR/bip-scanner.mpeg"></audio>

            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" style="padding-right: 0;">

            <div class="shared Lista" style="margin: auto">

                <!********************************************************>
                <div id="myDIV" class="header_2">
                    <h1 style="margin:5px">Envíos para asignar</h1>
                    <label for="select_list[cadete]">Selecciona un cadete:</label>
                    <select id="cadete_dummy" name="select_list[cadete]">
                        <?php
                            echo ('<option value="">(Sin Asignar)</option>' . PHP_EOL);
                            for ($i=0; $i < count($cadetes); $i++) {
                                echo ('<option value="'. $cadetes[$i]['num_cadete'] . '">' . $cadetes[$i]['nombre'] . ' ' . $cadetes[$i]['apellido'] . '</option>' . PHP_EOL);
                            }
                        ?>
                    </select>
                    
                    <p style="display: inline-block;">El numero de envios asignado es:</p><p id="num_pack" style="display: inline-block; padding-left: 5px;"></p>
                </div>

                <div class="table-container">
                    <table id="my_ship_in">
                      <tr>
                        <th>Id. Shipping</th>
                      </tr>
                    </table>
                </div>
                <!********************************************************>

                <div id="Envi_manual" class="header_2">
                  <p style="margin: auto; font-size: 30px;">Ingreso manual</p>

                    <table width="15%" align="center">
                        <tr>
                          <td># shipping:</td>
                          <td> <input type="text" id="shipnum" name="shipnum"></td>
                        </tr>
                        <tr>
                          <td colspan="2" align="center"><button class="btn2" onclick="prepare_data_man()">Agregar</button></td>
                        </tr>
                    </table>

                </div>

                <form action="" method="post">
                    <input type="text" id="values_scann" name="select_scanner[values]" style="display: none;">
                    <input type="text" id="cadete_scann" name="select_scanner[cadete]" style="display: none;">
                    <button type="submit" id="submit_scann" style="display: none;">someter scanner</button>
                </form>

                <button class="btn" onclick="submit_array()">Asignar envios</button>

            </div>

        </div>

    </div>
</div>  