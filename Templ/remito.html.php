<?php
$remito = '<body>

<header>
	<div id="header" class="header">
		
        <div id="header" class="header1">
                <div class="hero-image">
                    <div class="logo-space">
                        <a class="brand" href="desk_admin.php" title="Pegaso home"
                            aria-label="Tracking Pegaso"><img src="images/remito_logo.png" alt=""></a>
                    </div>
                </div>
        </div>
		
	</div>
</header>

<section>
    <h2>Orden de envíos</h2>
    <div class="filter_container" id="contenedor_filtro" style="margin-bottom: 20px;">
        
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3">

                <table>
                    <tr>
                        <th style="width=auto">Cliente: </th>
                        <th>' . $cliente["Nombre"] . 
                        '</th>
                    </tr>
                    <tr>
                        <th style="width=auto">E-mail: </th>
                        <th>' . $cliente["email"] .
                        '</th>
                    </tr>
                    <tr>
                        <th style="width=auto">Fecha: </th>
                        <th>' . $date ->format("d-m-Y") .
                        '</th>
                    </tr>
                    <!*******************>
                </table>
            </div>
                
        </div>   

    </div>
</section>

<hr/>
<div  class="water_mark" style="position: absolute;">
    <img alt="" src="./images/imagen-contact.png">
</div>
<div  class="water_mark" style="position: absolute; top: 670px;">
    <img alt="" src="./images/imagen-contact.png">
</div>

<section>
<div>
        <table id="example"  class="cell-border stripe zebra" style="width:100%">
            <thead>
                <tr>
                    <th>Select</th>
                    <th># envio</th>
                    <th># venta</th>
                    <th>dirección</th>
                    <th>comentario</th>
                    <th>Cod. postal</th>
                </tr>
            </thead>
            <tbody  id="data_table">';

            
                $rows = count($packets);
                for ($i=0 ; $i < $rows; $i++) {
                    $remito .= '<tr>
                        <td><input type="checkbox" class="Checkbox"></td>
                        <td>'. $packets[$i][0][0] . '</td>
                        <td>'. $packets[$i][0][4] . '</td>
                        <td>'. $packets[$i][1][0] . ' ' . $packets[$i][1][1] . '</td>
                        <td>'. $packets[$i][1][2] . '</td>
                        <td style="text-align: right;">'. $packets[$i][1][3] . '</td>
                    
                    </tr>';
                }

$remito .= '            </tbody>
            <tfoot>
                <tr>
                    <th>Select</th>
                    <th># envio</th>
                    <th># venta</th>
                    <th>dirección</th>
                    <th>comentario</th>
                    <th>Cod. postal</th>
                </tr>
            </tfoot>
        </table>
        <hr/>

        <div style="text-align: right;">
        <b>Total: ' . $num_pack . '</b>

        </div>

        <hr/>

        <div>
        <table class="cell-border stripe" style="width:100%">
            <thead>
                <tr>
                    <th>Nombre Pegaso</th>
                    <th>Firma</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="width: 300px;">__________________________________</td>
                    <td style="width: 300px;">__________________________________</td>
                </tr>
            </tbody>
        </table>

        <hr/>

    </div>
</section>


</body>';