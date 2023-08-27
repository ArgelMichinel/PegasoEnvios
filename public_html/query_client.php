<?php
session_start();
try {
    include __DIR__ . '/../include/DatabaseConnection.php';
	
    if (isset($_SESSION['user']) && isset($_SESSION['password'])) {
        
        include __DIR__ . '/../include/Access_functions.php';
        
        IsLogged_client($pdo);
        
	} else {
        header('location: access_client.php');
    }
    
    //echo($_SESSION['user'] . ' ' . $_SESSION['password'] . PHP_EOL);
    
    include __DIR__ . '/../include/Meli_functions.php';
	
    if (isset($_POST['new_query'])) {
        
        $title='Envíos en periodo consultado';
        $_POST['new_query']['incl_client'] = true;
        $dat_user = $_SESSION;
        $dat_user = checkValdTok($pdo,$dat_user['user_id']);
        $_POST['new_query']['client'] = $dat_user['user_id'];
        $data = query_customized($pdo,$_POST['new_query']);
        //echo($dat_user['user_id'] . PHP_EOL);
        //print_r($data);
        $packets = [];
        
        for ($i=0 ; $i<count($data) ; $i++ ){
            $ship_mat = print_answer ($data[$i]['id_ship'],$dat_user['access_tok'],$dat_user['user_id']);
            usleep(10*10000); //10 envíos por seg 
            
            $packets[$i] = [];
            $packets[$i]['id_ship'] = $ship_mat[0][0];
            $packets[$i]['date_in'] = $data[$i]['date_in'];
            $packets[$i]['status'] = $ship_mat[0][2];
            $packets[$i]['order_id'] = $ship_mat[0][4];
            $packets[$i]['street_name'] = $ship_mat[1][0] . ' ' . $ship_mat[1][1];
            $packets[$i]['comment'] = $ship_mat[1][2];
            $packets[$i]['zip_code'] = $ship_mat[1][3];
            $packets[$i]['city'] = $ship_mat[1][4];
            $packets[$i]['state'] = $ship_mat[1][5];
            $packets[$i]['country'] = $ship_mat[1][6];
            $packets[$i]['Latit'] = $ship_mat[1][7];
            $packets[$i]['Longit'] = $ship_mat[1][8];
            $packets[$i]['receiver_name'] = $ship_mat[2][0];
            $packets[$i]['description'] = $ship_mat[3][0];
            $packets[$i]['date_first_visit'] = $ship_mat[4][0];
            $packets[$i]['date_delivered'] = $ship_mat[4][1];
            $packets[$i]['date_not_delivered'] = $ship_mat[4][2];
        }
        
        ///////////////////////////////////////////////////////////////////////////////////
        ob_start();
        ?>

        <link rel="stylesheet" type="text/css" href="./Styles/jquery.dataTables.min.css">
        <link rel="stylesheet" type="text/css" href="./Styles/buttons.dataTables.min.css">
        <link rel="stylesheet" type="text/css" href="./Styles/query_packets.css">
        <script type="text/javascript" language="javascript" src="./js/jquery-3.5.1.js"></script>
        <script type="text/javascript" language="javascript" src="./js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" language="javascript" src="./js/dataTables.buttons.min.js"></script>
        <script type="text/javascript" language="javascript" src="./js/jszip.min.js"></script>
        <script type="text/javascript" language="javascript" src="./js/vfs_fonts.js"></script>
        <script type="text/javascript" language="javascript" src="./js/buttons.html5.min.js"></script>
        <script type="text/javascript" language="javascript" src="./js/buttons.print.min.js"></script>
        <script type="text/javascript" language="javascript" src="./js/query_packets.js"></script>
        <script src="./js/leaflet.js"></script>
        <link rel="stylesheet" href="./Styles/leaflet.css" />
        <script type="text/javascript" class="init">
            $(document).ready(function() {
                var table = $('#example').DataTable( {
                    dom: 'Blfrtip',
                    buttons: [
                        'copyHtml5', 'csvHtml5', 'excelHtml5',  'print' //,'pdf'
                    ],
                    "lengthMenu": [ [5 ,10, 25, 50, -1], [5, 10, 25, 50, "Todos"] ],
                    "pageLength": 5,
                    "scrollX": true
                } );

                $('.switch-1').on( 'click', function (e) {
                    e.preventDefault();

                    // Get the column API object
                    var column = table.column( $(this).attr('data-column') );
                    // Toggle the visibility
                    column.visible( ! column.visible() );
                } );

            } );
        </script>

        <?php
        
        $num_envios = count($packets);

        $inc_head = ob_get_clean();
        ///////////////////////////////////////////////////////////////////////////////////
        ///////////////////////////////////////////////////////////////////////////////////
        ob_start();

        include __DIR__ . '/../Templ/out_query_client.html.php';

        $output = ob_get_clean();
        ///////////////////////////////////////////////////////////////////////////////////
        ///////////////////////////////////////////////////////////////////////////////////
        $inc_script_end = '<!*******************************>';
        ///////////////////////////////////////////////////////////////////////////////////
        
	} else {
        $title='Envíos en la jornada anterior';
        $num_envios = 0;
        $_POST['new_query']['incl_client'] = true;
        $_POST['new_query']['incl_date'] = True;
        $dat_user = $_SESSION;
        $dat_user = checkValdTok($pdo,$dat_user['user_id']);
        $fecha2 = new DateTime();
        $fecha = new DateTime();
        $fecha = $fecha->modify('-2 day');
        $fecha2 = $fecha2->modify('+1 day');
        $_POST['new_query']['client'] = $dat_user['user_id'];
        $_POST['new_query']['begin_date'] = $fecha->format('Y-m-d');
        $_POST['new_query']['end_date'] = $fecha2->format('Y-m-d');
        $data = query_customized($pdo,$_POST['new_query']);
        //echo($dat_user['user_id'] . PHP_EOL);
        //print_r($_POST);
        $packets = [];
        
        for ($i=0 ; $i<count($data) ; $i++ ){
            if ($data[$i]['id_ship'][0] === 'p') {
                $resultado = findById($pdo,'envios','id_ship',$data[$i]['id_ship']);

                $packets[$i] = [];
                $packets[$i]['id_ship'] = $resultado['id_ship'];
                $packets[$i]['date_in'] = $resultado['date_in'];
                $packets[$i]['status'] = $resultado['status'];
                $packets[$i]['order_id'] = $resultado['order_id'];
                $packets[$i]['street_name'] = $resultado['street_name'] . ' ' . $resultado['street_number'];
                $packets[$i]['comment'] = $resultado['comment'];
                $packets[$i]['zip_code'] = $resultado['zip_code'];
                $packets[$i]['city'] = $resultado['city'];
                $packets[$i]['state'] = $resultado['state'];
                $packets[$i]['country'] = $resultado['country'];
                $packets[$i]['Latit'] = $resultado['Latit'];
                $packets[$i]['Longit'] = $resultado['Longit'];
                $packets[$i]['receiver_name'] = $resultado['receiver_name'];
                $packets[$i]['description'] = $resultado['description'];
                $packets[$i]['date_first_visit'] = $resultado['date_first_visit'];
                $packets[$i]['date_delivered'] = $resultado['date_delivered'];
                $packets[$i]['date_not_delivered'] = $resultado['date_not_delivered'];

            } else {
                $ship_mat = print_answer ($data[$i]['id_ship'],$dat_user['access_tok'],$dat_user['user_id']);
                usleep(10*10000); //10 envíos por seg 
                
                $packets[$i] = [];
                $packets[$i]['id_ship'] = $ship_mat[0][0];
                $packets[$i]['date_in'] = $data[$i]['date_in'];
                $packets[$i]['status'] = $ship_mat[0][2];
                $packets[$i]['order_id'] = $ship_mat[0][4];
                $packets[$i]['street_name'] = $ship_mat[1][0] . ' ' . $ship_mat[1][1];
                $packets[$i]['comment'] = $ship_mat[1][2];
                $packets[$i]['zip_code'] = $ship_mat[1][3];
                $packets[$i]['city'] = $ship_mat[1][4];
                $packets[$i]['state'] = $ship_mat[1][5];
                $packets[$i]['country'] = $ship_mat[1][6];
                $packets[$i]['Latit'] = $ship_mat[1][7];
                $packets[$i]['Longit'] = $ship_mat[1][8];
                $packets[$i]['receiver_name'] = $ship_mat[2][0];
                $packets[$i]['description'] = $ship_mat[3][0];
                $packets[$i]['date_first_visit'] = $ship_mat[4][0];
                $packets[$i]['date_delivered'] = $ship_mat[4][1];
                $packets[$i]['date_not_delivered'] = $ship_mat[4][2];
            }
        }
        
        ///////////////////////////////////////////////////////////////////////////////////
        
        ///////////////////////////////////////////////////////////////////////////////////
        ob_start();
        ?>

        <link rel="stylesheet" type="text/css" href="./Styles/jquery.dataTables.min.css">
        <link rel="stylesheet" type="text/css" href="./Styles/buttons.dataTables.min.css">
        <link rel="stylesheet" type="text/css" href="./Styles/query_packets.css">
        <script type="text/javascript" language="javascript" src="./js/jquery-3.5.1.js"></script>
        <script type="text/javascript" language="javascript" src="./js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" language="javascript" src="./js/dataTables.buttons.min.js"></script>
        <script type="text/javascript" language="javascript" src="./js/jszip.min.js"></script>
        <script type="text/javascript" language="javascript" src="./js/vfs_fonts.js"></script>
        <script type="text/javascript" language="javascript" src="./js/buttons.html5.min.js"></script>
        <script type="text/javascript" language="javascript" src="./js/buttons.print.min.js"></script>
        <script type="text/javascript" language="javascript" src="./js/query_packets.js"></script>
        <script src="./js/leaflet.js"></script>
        <link rel="stylesheet" href="./Styles/leaflet.css" />
        <script type="text/javascript" class="init">
            $(document).ready(function() {
                var table = $('#example').DataTable( {
                    dom: 'Blfrtip',
                    buttons: [
                        'copyHtml5', 'csvHtml5', 'excelHtml5',  'print' //,'pdf'
                    ],
                    "lengthMenu": [ [5 ,10, 25, 50, -1], [5, 10, 25, 50, "Todos"] ],
                    "pageLength": 5,
                    "scrollX": true
                } );

                $('.switch-1').on( 'click', function (e) {
                    e.preventDefault();

                    // Get the column API object
                    var column = table.column( $(this).attr('data-column') );
                    // Toggle the visibility
                    column.visible( ! column.visible() );
                } );

            } );
        </script>

        <?php
        $inc_head = ob_get_clean();
        ///////////////////////////////////////////////////////////////////////////////////
        ///////////////////////////////////////////////////////////////////////////////////
        ob_start();

        include __DIR__ . '/../Templ/out_query_client.html.php';

        $output = ob_get_clean();
        ///////////////////////////////////////////////////////////////////////////////////
        ///////////////////////////////////////////////////////////////////////////////////
        $inc_script_end = '<!*******************************>';
        ///////////////////////////////////////////////////////////////////////////////////

		
	}
} catch (PDOException $e) {

	echo ('Problema durante la consulta ' . $e);
}

include __DIR__ . '/../Templ/layout3.html.php';