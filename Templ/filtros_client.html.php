    <form action="" method="post">
        
        <div class="row">
                    
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7" style="padding-right: 0;">
                    
                   <table>
                        <tr>
                            <th style="width=auto;"><input type="checkbox" class="Checkbox-filter" onclick="activ_filter()" name="new_query[incl_date]" value="true">Fecha: </th>
                            <th style="display:none">
                                <label for="begin_date">Inicio =></label>
                                <input type="date" id="begin_date" name="new_query[begin_date]">
                                <label for="end_date">Final =></label>
                                <input type="date" id="end_date" name="new_query[end_date]">
                            </th>
                        </tr>
                        <!*******************>
                        <tr>
                            <th style="width=auto"><input type="checkbox" class="Checkbox-filter" onclick="activ_filter()" name="new_query[incl_zona]" value="true">Zona: </th>
                            <th style="display:none">
                                <select name="new_query[zona]">
                                    <option value='Zona 1'>CABA</option>
                                    <option value='Zona 2'>GBA1</option>
                                    <option value='Zona 3'>GBA2/GB3</option>
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