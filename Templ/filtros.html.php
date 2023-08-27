    <form action="" method="post">
        
        <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3">
    
                    <table>
                        <tr>
                            <th style="width: auto;"><input type="checkbox" class="Checkbox-filter" onclick="activ_filter()" name="new_query[incl_client]" value="true">Cliente: </th>
                            <th style="display: none;"><select name="new_query[client]">
                                    <?php
                                        for ($i=0; $i < count($clients); $i++) {
                                            echo ('<option value="'. $clients[$i]['user_id'] . '">' . $clients[$i]['Nombre'] . '</option>' . PHP_EOL);
                                        }
                                    ?>
                                </select>
                            </th>
                        </tr>
                        <!*******************>

                        <?php
                            
                        if ($title != 'Encomiendas Pegaso') {
                            $primero = '<tr>
                                <th style="width: auto;"><input type="checkbox" class="Checkbox-filter" onclick="activ_filter()" name="new_query[incl_cadete]" value="true">Cadete: </th>
                                <th style="display:none;"><select name="new_query[cadete]">
                                        <option value="none">(Sin Asignar)</option>';
                            echo($primero);
                                        
                                            for ($i=0; $i < count($cadetes); $i++) {
                                                echo ('<option value="'. $cadetes[$i]['num_cadete'] . '">' . $cadetes[$i]['nombre'] . ' ' . $cadetes[$i]['apellido'] . '</option>' . PHP_EOL);
                                            }
                            $segundo = '        </select>
                                </th>
                            </tr>';
                            echo($segundo);
                        }
                        ?>

                        <!*******************>

                        <tr>
                            <th style="width: auto;"><input type="checkbox" class="Checkbox-filter" onclick="activ_filter()" name="new_query[incl_status]" value="true">Status: </th>
                            <th style="display: none;"><select name="new_query[status]">
                                <option value="En_curso">En_curso</option>
                                <option value="delivered">Completado</option>
                                <option value="not_delivered">No Completado</option>
                                <option value="cancelled">Cancelado</option>
                                </select>
                            </th>
                        </tr>
                        <!*******************>

                    </table>
                </div>
                    
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7" style="padding-right: 0;">
                    
                   <table>
                        <tr>
                            <th style="width: auto;"><input type="checkbox" class="Checkbox-filter" onclick="activ_filter()" name="new_query[incl_date]" value="true">Fecha: </th>
                            <th style="display:none">
                                <label for="begin_date">Inicio =></label>
                                <input type="date" id="begin_date" name="new_query[begin_date]">
                                <label for="end_date">Final =></label>
                                <input type="date" id="end_date" name="new_query[end_date]">
                            </th>
                        </tr>
                        <!*******************>
                        <tr>
                            <th style="width:auto;"><input type="checkbox" class="Checkbox-filter" onclick="activ_filter()" name="new_query[incl_zona]" value="true">Zona: </th>
                            <th style="display:none;">
                                <select name="new_query[zona]">
                                    <option value='Zona 1'>CABA</option>
                                    <option value='Zona 2'>GBA1</option>
                                    <option value='Zona 3'>GBA2/GB3</option>
                                    <option value='Norte'>Norte</option>
                                    <option value='Oeste'>Oeste</option>
                                    <option value='Sur'>Sur</option>
                                    <option value='Puerto Madero'>Puerto Madero</option>
                                    <option value='San Telmo'>San Telmo</option>
                                    <option value='Constitucion'>Constitucion</option>
                                    <option value='Monserrat'>Monserrat</option>
                                    <option value='Recoleta'>Recoleta</option>
                                    <option value='Retiro'>Retiro</option>
                                    <option value='San Nicolas'>San Nicolas</option>
                                    <option value='La Boca'>La Boca</option>
                                    <option value='Almagro'>Almagro</option>
                                    <option value='Once'>Once</option>
                                    <option value='San Nicolas'>San Cristobal</option>
                                    <option value='Parque Patricios'>Parque Patricios</option>
                                    <option value='Zona 4'>Sin coincidencia</option>
                                </select>
                            </th>
                        </tr>
                    </table>
                    
                </div>
            
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-2" style="padding-right: 0;">
                    
                   <button type="submit" class="btn btn2">Filtrar</button>
                    
                </div>
                
            </div>
        
    </form>