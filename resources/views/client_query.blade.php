@extends('layout.layout3')

@section('output','Envíos en la jornada anterior')

@section('inc_head')
        <link rel="stylesheet" type="text/css" href="./Styles/jquery.dataTables.min.css">
        <link rel="stylesheet" type="text/css" href="./Styles/buttons.dataTables.min.css">
        <link rel="stylesheet" type="text/css" href="./Styles/desk_client.css">
        <script type="text/javascript" language="javascript" src="./js/jquery-3.5.1.js"></script>
        <script type="text/javascript" language="javascript" src="./js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" language="javascript" src="./js/dataTables.buttons.min.js"></script>
        <script type="text/javascript" language="javascript" src="./js/jszip.min.js"></script>
        <script type="text/javascript" language="javascript" src="./js/vfs_fonts.js"></script>
        <script type="text/javascript" language="javascript" src="./js/buttons.html5.min.js"></script>
        <script type="text/javascript" language="javascript" src="./js/buttons.print.min.js"></script>
        <script type="text/javascript" language="javascript" src="./js/desk_client.js"></script>
        <script type="text/javascript" class="init">
            $(document).ready(function() {
                $('#example').DataTable( {
                    dom: 'Blfrtip',
                    buttons: [
                        'copyHtml5', 'csvHtml5', 'excelHtml5',  'print' //,'pdf'
                    ],
                    "lengthMenu": [ [5 ,10, 25, 50, -1], [5, 10, 25, 50, "Todos"] ],
                    "pageLength": 5,
                    "scrollX": true
                } );
            } );
        </script>

@endsection


@section('output')
        <h2>Bienvenidos</h2>

        <div class="presentacion"  id="presentacion">
            
            <div class="container-fluid" id="principal">
                <div><p>¿Que desea realizar?</p></div>
                
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

                        <div class="shared" style="margin: auto">

                            <button class="btn" onclick="query_packets()">Consultar envíos</button>

                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

                        <div class="shared" style="margin: auto">

                            <button class="btn" onclick="assing_credential()">Otorgar permisos</button>

                        </div>
                    </div>

                </div>
            </div>
            
            <!********************************************************>
            
            <div class="table_container" id="screem-packets" style="padding-bottom: 40px; display: none;">
                <div class="filter_container" id="contenedor_filtro" style="margin-bottom: 20px;">
                    <?php
                    include app_path() . '/files/filtros_client.html.php';
                    ?>
                </div>

                <div>
                    <table id="example" class="display nowrap" style="width:100%">
                        
                        <thead>
                            <tr>
                                <th># envio</th>
                                <th>fec. ingreso</th>
                                <th>status</th>
                                <th>nom. calle</th>
                                <th>altura</th>
                                <th>comentario</th>
                                <th>Cod. postal</th>
                                <th>ciudad</th>
                                <th>prov.</th>
                                <th>país</th>
                                <th>nom. recep.</th>
                                <th>tel. recep.</th>
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
                                foreach ($packets[$i] as $key => $value) {
                                    include app_path() . '/files/modifica_tabla.php';
                                    if (($key != 'id_num') && ($key != 'status')) {echo ('    <td>'. $value.'</td>'. PHP_EOL);}
                                    if ($key == 'status') {
            
                                        switch ($value) {
                                            case 'En curso':
                                                echo ('    <td style="background-color: blue; color: white; text-align: center;">'. $value.'</td>'. PHP_EOL);
                                            break;
                                            case '1era visita':
                                                echo ('    <td  style="background-color: yellow; color: black; text-align: center;">'. $value.'</td>'. PHP_EOL);
                                            break;
                                            case 'Completado':
                                                echo ('    <td style="background-color: green; color: white; text-align: center;">'. $value.'</td>'. PHP_EOL);
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
                                <th># envio</th>
                                <th>fec. ingreso</th>
                                <th>status</th>
                                <th>nom. calle</th>
                                <th>altura</th>
                                <th>comentario</th>
                                <th>Cod. postal</th>
                                <th>ciudad</th>
                                <th>prov.</th>
                                <th>país</th>
                                <th>nom. recep.</th>
                                <th>tel. recep.</th>
                                <th>fec. 1ra visit</th>
                                <th>fec. entreg.</th>
                                <th>fec. no entr.</th>
                            </tr>
                        </tfoot>
                        
                    </table>
                </div>
            </div>
            
            <input type="password" id="envios" name="envios" value="<?=isset($num_envios)? $num_envios : 0;?>" style="display: none;">
        
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
@endsection


@section('inc_script_end')
        <!*******************************>
@endsection